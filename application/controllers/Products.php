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


    public function findimages_cate()
	{
                     
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     $array=array();
                     $array1=array();

                     
                     $cate_id=$form_data->cate_id;
                     $order_id=$form_data->order_id;
                     $status=$form_data->status;
                     $tablename=$form_data->tablename;
                     
                     
                     $i=0;
                 	 $result= $this->Main_model->where_names_four_order_by_new('competitor_images','cate_id',$cate_id,'order_id',$order_id,'status',$status,'deleteid','0','id','DESC');
                 	 foreach ($result as  $value)
                 	 {

                 	 	            

                                 if($value->table_name==$tablename)
                                 {



							                     $files=$value->product_image;


							                     $file_parts = pathinfo($files);

													switch($file_parts['extension'])
													{
													    case "jpg":
													    $exe="jpg";
													    break;

													    case "png":
													    $exe="png";
													    break;

													    case "pdf":
													    $exe="pdf";
													    break;

													    case "": // Handle file extension for files ending in '.'
													    case NULL: // Handle no file extension
													    break;
													}


							                     if($files!='')
							                     {


			                        
					                                    $array[] = array(
						    
						                     	 	    'id' => $value->id,
						                     	 	    'exe' => $exe,
						                     	 		'product_image' => base_url().$files,
						                     	 		
						    
						                     	    	);


				                     	    	}

                                         $i++;
				               }      	    	

	                     	    	

                      
                 	 }
                 	 
                 	  echo json_encode($array);
                 	 

                    

	}
    
     
        public function fileuplaodimgsave_c()
    {



        
       if(!empty($_FILES))  
        { 
            
           

            $path=array();
            for ($i=0; $i <count($_FILES['file']) ; $i++) { 

                   if($_FILES['file']['name'][$i]!='')
                   {

                          $order_id=$_GET['order_id'];
                          $cate_id=$_GET['id'];
                          $status=$_GET['status'];
                          $tablename=$_GET['tablename'];
                         
                      

                         $path = 'uploads/competitor/' .time(). $_FILES['file']['name'][$i]; 
                         if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $path))  
                         {  


                         	if($status=='1')
                         	{
                         		$filess='c_file_1';
                         $this->db->query("UPDATE $tablename SET c_file_1='".$path."' WHERE categories_id=$cate_id AND order_id=$order_id");
      $this->db->query("INSERT INTO competitor_images  (`cate_id`,`order_id`,`status`,`product_image`,`table_name`)VALUES('".$cate_id."','".$order_id."','".$status."','".$path."','".$tablename."')");

                         	}


                         	if($status=='2')
                         	{
                         		$filess='c_file_2';
                         		   $this->db->query("UPDATE $tablename SET c_file_2='".$path."' WHERE categories_id=$cate_id AND order_id=$order_id");
                         		    $this->db->query("INSERT INTO competitor_images  (`cate_id`,`order_id`,`status`,`product_image`,`table_name`)VALUES('".$cate_id."','".$order_id."','".$status."','".$path."','".$tablename."')");
                         	}


                         	if($status=='3')
                         	{
                         		$filess='c_file_3';
                         		  $this->db->query("UPDATE $tablename SET c_file_3='".$path."' WHERE categories_id=$cate_id AND order_id=$order_id");
                     $this->db->query("INSERT INTO competitor_images  (`cate_id`,`order_id`,`status`,`product_image`,`table_name`)VALUES('".$cate_id."','".$order_id."','".$status."','".$path."','".$tablename."')");
                         	}

             

                         }


                   }
                   
            }
             
            

             
 
         }
         
             $output=array('1');
             echo json_encode($output);


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
							            $product_ordervalue = $this->Main_model->where_names_two_order_by('order_product_list_process', 'product_id', $id, 'deleteid', '0', 'id', 'ASC');



                                        $amount = 0; $qty = 0;
                                        foreach($product_ordervalue as $vl)
							            {
							                $amount += $vl->amount;
							                $qty += $vl->qty;
							            }
                                  
                                        $data['average_value'] = round($amount/$qty,2);
                                        $data['total_value'] = round($amount,2);
                                        $data['total_qty'] = round($qty,2);
							            
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
							            	 //$data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
$data['categories']= $this->Main_model->where_names_two_order_by('categories', 'id!=', 0, 'deleteid',0, 'categories', 'ASC');


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


	public function categories_list_json()
	{
        
		                              

	
							            
							            	 
$categories= $this->Main_model->where_names_two_order_by('categories', 'tally_syn', 0, 'deleteid',0, 'categories', 'ASC');
$array=array();
foreach ($categories as  $value) {



	if($value->uom=='1')
	{
		$value->uom='FEET';
	}
	if($value->uom=='3')
	{
		$value->uom='FEET';
	}
	if($value->uom=='2')
	{
		$value->uom='SQMTR';
	}
	if($value->uom=='6')
	{
		$value->uom='INCH';
	}
	if($value->uom=='7')
	{
		$value->uom='KG';
	}
	if($value->uom=='8')
	{
		$value->uom='SFT';
	}
	if($value->uom=='5')
	{
		$value->uom='MTR';
	}
	if($value->uom=='4')
	{
		$value->uom='MM';
	}
	$array[]=array(

          'categories_name'=>$value->categories,
          'uom'=>$value->uom
	);
}
                    $result = ["data" => $array];
        

                echo json_encode($result); 
                exit;               
	     

	}

	public function products_list_json()
	{
        
		                              


$categories= $this->Main_model->where_names_two_order_by('product_list', 'tally_syn', 0, 'deleteid',0, 'product_name', 'ASC');
$array=array();
foreach ($categories as  $value) 
{

	if($value->product_name!='')
	{

		$array[]=array(

	          'product_id'=>$value->id,
	          'product_name'=>trim($value->product_name),
	          'categories_id'=>$value->categories_id,
	          'categories_name'=>$value->categories,
	          'rate'=>$value->price,
	          'closeing_stock'=>round($value->stock,2),
	          'gst'=>$value->gst,
	          'uom'=>$value->uom
		);
	}

}
                            
  $result = ["data" => $array];
                echo json_encode($result); 
                exit; 




	}
	public function products_img()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['product_images'] = $this->Main_model->where_names('product_images','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Products List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('products/products_img',$data);
										
										
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
                                            
                                                                $data[$label_name]= $form_data->$label_name; 
	                                                            if($label_name=='length' || $label_name=='width' || $label_name=='standard_weight' ||$label_name=='kg_rmtr_weight')
	                                                    	     {
	                                                    	     	unset($form_data->$label_name);
	                                                    	     }
                                                    
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
			                                                    elseif($label_name=='brand')
			                                                    {
			                                                        if($form_data->$label_name=='NO BRAND')
			                                                        {
			                                                            $dataval[]= '';
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
			                                                    
                                            
                                            
                                          
                                     }
                                     
                                    //  echo $dataval;exit();
                                     
                                     $data['product_name']=implode(' ',$dataval);

                                    // Removing spaces from the input product name
                                    $cleaned_product_name = str_replace(' ', '', $data['product_name']);

                                    // Query to check for a product with the same name (without spaces)
                                    $checkproduct_name = $this->db->query("SELECT * FROM `product_list` WHERE REPLACE(product_name, ' ', '') = '".$cleaned_product_name."'")->result();

                                     $data['source_name']=implode(' ',$data['product_name']);
    			                           
                                   
                                     
                                     $data['categories']=$categories_name;
                                     $data['categories_id']=$categories_id;
                                     $data['status']=$form_data->status;
                                     $data['description']=$form_data->description;
                                     $data['opening_val']=$form_data->opening_val;
                                     $data['opening_qty']=$form_data->opening_qty;


                                     $data['link_to_purchase']=$form_data->link_to_purchase;
                                     $result= $this->Main_model->where_names_two_order_by($tablename, 'product_name', $data['product_name'], 'deleteid', '0', 'id', 'ASC');
                                      
				                      if(count($result)>0)
				                      {

				                        	 $array=array('error'=>'3','massage'=>'Product Name already exists '.$data['product_name']);
                                             echo json_encode($array);

				                      } else if(count($checkproduct_name)>0)
				                      {

				                        	 $array=array('error'=>'3','massage'=>'Product Name already exists '.$data['product_name']);
                                             echo json_encode($array);

				                      }
				                      else
				                      {
				                      	    
				                      	    $insert_id=$this->Main_model->insert_commen($data,$tablename);

                                            //   $datastock['product_id']=$insert_id;
                                            //   $datastock['product_name']=implode(' ',$dataval);
                                            //   $datastock['user_id']=$this->userid;
                                            //   $datastock['stock_date']=date('Y-m-d');
                                            //   $datastock['stock']=$form_data->stock;
                                            //   $datastock['optimal_stock']=$form_data->optimal_stock;
                                            //   $datastock['production_stock']=$form_data->production_stock;
                                            //   $datastock['product_name']=implode(' ',$dataval);
                                            //   $datastock['opening_qty']=$form_data->opening_qty;

				                      	    // // $insert_id=$this->Main_model->insert_commen($datastock,'daywise_stock');
                                            //   $this->db->where('product_id', $insert_id);
                                            //   $this->db->where('stock_date', date('Y-m-d'));
                                            //   $query = $this->db->get('daywise_stock');
                              
                                            //   if ($query->num_rows() > 0) {
                                            //       $this->db->where('product_id', $insert_id);
                                            //       $this->db->where('stock_date', date('Y-m-d'));
                                            //       $this->db->update('daywise_stock', $datastock);
                                            //   } else {
                                            //       // If no record exists, perform an insert
                                            //       $this->db->insert('daywise_stock', $datastock);
                                             $this->daywisestock($insert_id);
                                            //   }
				                      	    
				                      	    
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
                                                 $purchase_data['purchase_price']=$form_data->purchase_price;
                                                 $purchase_data['create_date']=date('Y-m-d');
                                                 $this->Main_model->insert_commen($purchase_data,'purchase_price');
                                                 
                                                 
                                                 
                                                 $average_price=0;
                                                 $resultmain = $this->db->query("SELECT * FROM `purchase_price` WHERE deleteid=0 AND product_id='".$form_data->id."' AND purchase_price >0 ");
                                                 $layout_planselete = $resultmain->result();
                                                 $diviedcount=count($layout_planselete);
                                                 foreach($layout_planselete as $vl)
                                                 {
                                                     $average_price+=$vl->purchase_price;
                                                 }

                                                 if($diviedcount > 0){
                                                    $average_price_finale=round($average_price/$diviedcount);
                                                 }else {
                                                    $average_price_finale=0;
                                                 }
                                         
                                         
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



                                                                $data[$label_name]= $form_data->$label_name; 
	                                                            if($label_name=='length' || $label_name=='width' || $label_name=='standard_weight' || $label_name=='kg_rmtr_weight')
	                                                    	     {
	                                                    	     	unset($form_data->$label_name);
	                                                    	     }
                                                    
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
			                                                    elseif($label_name=='brand')
			                                                    {
			                                                        if($form_data->$label_name=='NO BRAND')
			                                                        {
			                                                            $dataval[]= '';
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


                                
                                        
                                      $resultsts= $this->Main_model->where_names('product_list','id',$form_data->id);
                                      foreach($resultsts as $cat)
                                      {
                                        $status=$cat->status;
                                      }
                                 
                                     
                                        $data['categories']=$categories_name;
                                        $data['categories_id']=$categories_id;
                                        
                                        
                                        $data['status']=$status;
                                        $data['side_label']=$form_data->side_label;
                                        $data['input_label']=$form_data->input_label;
                                        $data['description']=$form_data->description;
                                        $data['opening_val']=$form_data->opening_val;
                                        $data['opening_qty']=$form_data->opening_qty;
                                        
                                        
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

                                              $datastock['stock']=$form_data->stock;
                                              $datastock['user_id']=$this->userid;
                                              $datastock['optimal_stock']=$form_data->optimal_stock;
                                              $datastock['production_stock']=$form_data->production_stock;
                                              $datastock['stock_date']=date('Y-m-d');
                                              $datastock['opening_qty']=$form_data->opening_qty;
                                              $datastock['product_id']= $form_data->id;
                                              $datastock['product_name']= $data['product_name'];
                       
                   
		             $resultcat= $this->Main_model->where_names('product_list','id',$form_data->id);
		               
                 	   $this->Main_model->update_commen($data,$tablename); 
                       
                    //    $this->Main_model->insert_commen($datastock,'daywise_stock');

                    //    $this->db->where('product_id', $form_data->id);
                    //    $this->db->where('stock_date', date('Y-m-d'));
                    //    $query = $this->db->get('daywise_stock');
       
                    //    if ($query->num_rows() > 0) {
                    //        $this->db->where('product_id', $form_data->id);
                    //        $this->db->where('stock_date', date('Y-m-d'));
                    //        $this->db->update('daywise_stock', $datastock);
                    //    } else {
                    //        // If no record exists, perform an insert
                    //        $this->db->insert('daywise_stock', $datastock);
                    //    }
                    // $this->daywisestock($form_data->id);
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
                 if($form_data->action == 'Archive'){
                    
                    $tablename=$form_data->tablename;

                    $this->db->query("UPDATE $tablename SET status= $form_data->status , deleteid = $form_data->deleteid WHERE id='".$form_data->id."'");


                 }
                 if($form_data->action == 'IMG_Delete'){
                    
                    $tablename=$form_data->tablename;

                    $this->db->query("UPDATE $tablename SET deleteid =104 WHERE id='".$form_data->id."'");


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
                        
                        if($form_data->open_stock != 0 || $form_data->actual_stock != 0 || $form_data->stock_on_hold != 0 || $form_data->stock_production != 0){
                            $data['get_id']=$id;
                            $data['opening_qty']=$form_data->open_stock;
                            $data['stock']=$form_data->actual_stock;
                            $data['optimal_stock']=$form_data->stock_on_hold;
                            $data['production_stock']=$form_data->stock_production;
                            $data['weight']=$form_data->weight;
                            $this->Main_model->update_commen($data,$tablename);
                        }


                        
                        // $datastock['get_id']=$id;      
                        $datastock['product_id']=$id;       
                        $datastock['user_id']=$this->userid;            
                        $datastock['opening_qty']=$form_data->open_stock;
                        $datastock['stock']=$form_data->actual_stock;
                        $datastock['optimal_stock']=$form_data->stock_on_hold;
                        $datastock['production_stock']=$form_data->stock_production;
                        $datastock['stock_date']=date('Y-m-d');
                        // $this->Main_model->insert_commen($datastock,'daywise_stock');

                        // $this->db->where('product_id', $id);
                        // $this->db->where('stock_date', date('Y-m-d'));
                        // $query = $this->db->get('daywise_stock');
        
                        // if ($query->num_rows() > 0) {
                        //     $this->db->where('product_id', $id);
                        //     $this->db->where('stock_date', date('Y-m-d'));
                        //     $this->db->update('daywise_stock', $datastock);
                        // } else {
                        //     // If no record exists, perform an insert
                        //     $this->db->insert('daywise_stock', $datastock);
                        // }
                    // $this->daywisestock($id);

                        	
                       

                 }
                 
                 
                 
                 
                 if($form_data->action=='updatelayputplan')
                 {
                         $tablename=$form_data->tablename;
                         $tablename_sub=$form_data->tablename_sub;
                        
                         $layout_plan_id=0;
                        //  $resultmain = $this->db->query("SELECT * FROM `layout_plan` WHERE deleteid=0 AND name='".$form_data->layout_plan."' AND `rangeform` <= ".$form_data->lengthvalset." AND `rangeto` >=".$form_data->lengthvalset."  ORDER BY `layout_plan`.`id` DESC");



        $resultmain = $this->db->query("SELECT * FROM `layout_plan` WHERE deleteid=0 AND name='".$form_data->layout_plan."'   ORDER BY `layout_plan`.`id` DESC");



                         $layout_planselete = $resultmain->result();
                         foreach($layout_planselete as $vl)
                         {
                             $layout_plan_id=$vl->id;
                         }

                         if($layout_plan_id){
                            $layout_plan_id = $layout_plan_id;
                         }else{
                            $layout_plan_id = $form_data->base_id_val;
                         }
                       
                       
                 	    $id=$form_data->id;
                 	    $data['get_id']=$id;
                 	    $data['image_layout_plan']=$layout_plan_id;
                 	    $data['length']=$form_data->lengthvalset;
                        $this->Main_model->update_commen($data,$tablename);
                       
                       
                       
                        $point['get_id']=$form_data->order_product_id;
                        $point['image_length']=$form_data->lengthvalset;
                        $point['img_width']=$form_data->img_width;                        
                        // $point['uom']=$form_data->uom;
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
                


	}	public function fetch_data()
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


                        $attachment="";
                           

                       $resultventat = $this->Main_model->where_names_two_order_by('product_images', 'product_id', $value->id, 'deleteid', '0', 'id', 'ASC');
                          
                        if(count($resultventat)>0)
                        {
                        	$attachment="YES";
                        }
                        
                 	 	$array[] = array(
                               
                               
                               'no' => $i, 
                 	 		'id' => $value->id, 
                 	 		'attachment' => $attachment, 
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

                    if($product_id == 1029)
                     {
                        //   $nopcs=2;
                          $min = 1000000;
                      }


                    //  }else{
                    //    $min = 25;
                    //  }
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
                                    
                            if($values->uom_image==3) //feet
                            {
                                $img_width = $values->img_width;
                            }
                            if($values->uom_image==6) //inch
                            {
                                $img_width = $values->img_width*12;
                            }
                            if($values->uom_image==4) // mm 
                            {
                                $img_width = $values->img_width*304.8;
                            }
                            if($values->uom_image==5) //mtr
                            {
                                $img_width = $values->img_width/ 3.281;
                            }
                                    
                                     $array['color_side']= $values->color_side; 
                                     $array['img_widthn']= $img_width;                                     
                                     $array['img_width']=$values->img_width;
                                     $array['img_length']=$values->image_length;
                                     $array['uom_image']= $values->uom_image; 
                                     $array['base_id']= $values->base_id; 
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
                       
                        
                      
                 	 if($value->deleted==0)
                     	{
                     		if($value->status!=-1)
                     	    {
			                 	 	$array[] = array(

			                 	 		'id' => $value->id, 
			                 	 		
			                 	 		'name' => $value->product_name
			                 	 		

			                 	 	);

                 	 }


                 	}




                 	 }

                    echo json_encode($array);

	}
	
	
	
	// public function fetchiornproducts_base_product()
	// {
                     
 //            $form_data = json_decode(file_get_contents("php://input"));
 //                    $catid = $form_data->cat_id;
 //                        if($catid == '626'){
 //                            $searchbase = '34';
 //                        }else{
 //                            $searchbase = '3';
 //                        }

 //                    $array = array();
 //                    $result = $this->Main_model->where_names('product_list', 'categories_id', $searchbase);
 //                    foreach ($result as $value) {
 //                        $array[] = trim($value->id.'-'.$value->product_name);
 //                    }
 //                    echo json_encode($array);

	// }

	public function fetchiornproducts_base_product()
	{
                     
                    $form_data = json_decode(file_get_contents("php://input"));
                    $catid = $form_data->cat_id;
                        if($catid == '626' || $catid == '628' || $catid == '627' || $catid == '611'){
                            $searchbase = '34';
                        }else{
                            $searchbase = array(3,36,34);
                        }

                     $ss = array(3,36,34);
                     $array = array();
                     $result = $this->Main_model->two_where_in_names('product_list', 'categories_id',$searchbase,'deleteid','0');
                     foreach ($result as $value) {
                     	if($value->deleted==0)
                     	{
                     		if($value->status!=-1)
                     	    {
                     		     $array[] = trim($value->id.'-'.$value->product_name);
                     	     }
                     	}
                        
                     }
                     echo json_encode($array);

	}
	
	
	public function findimages()
	{
                     
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     $array=array();
                     $array1=array();
                                  

                     $product_id=$form_data->product_id;
                     
                 	  if($product_id==9 || $product_id==1070)
                     {

                     	     // '8503','8502', gutter images mapped against gutter closer
                     	     $pp_id=array('9147','7938','7937','7936','10880','10879','10878','10877','10876','10875','10874','10873','10872','9146','9145');
                     	     
	                     	 $resultss= $this->Main_model->where_names_order_by('product_images','product_id',$product_id,'id','DESC');
	                     	 foreach ($resultss as $valueset) 
	                     	 {

	                     	 	if($value->deleteid==0)
	                            {

	                              $pp_id[]=$valueset->id;
	                            }
	                     	 	
	                     	 }

                            $pp_id=implode("','",$pp_id);

			               $resultmain = $this->db->query("SELECT * FROM `product_images` WHERE deleteid=0 AND id IN('$pp_id')  ORDER BY `id` DESC");
			               $result = $resultmain->result();

			               

                     }
                     else
                     {

                            $result= $this->Main_model->where_names_order_by('product_images','product_id',$product_id,'id','DESC');

                     }
                     
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
	                     	 		'delete_view' => $value->delete_view,
	                     	 		'view_base' => $value->view_base,
	                     	 		'lengthlab'=>$length,
	                     	 		'html_img'=>$value->html_img,
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
	                     	 		'delete_view' => $value->delete_view,
	                     	 		'view_base' => $value->view_base,
	                     	 		'lengthlab'=>$length,
	                     	 		'html_img'=>$value->html_img,
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
                     $data = date('Y-m-d');
                    //  //sales stock get
                    //  $sales="";
                    //  $resultsales= $this->db->query(" SELECT SUM(a.weight) as sales
                    //  FROM order_product_list_process AS a 
                    //  JOIN orders_process AS b ON a.order_id = b.id 
                    //  WHERE a.product_id = '".$id."' AND b.deleteid = 0 AND DATE(a.create_date) = '".$data."' ORDER BY a.id DESC")->result();
                     
                    //  foreach ($resultsales as  $valuess) {
                    //      $sales= $valuess->sales/1000; 
                    //   }
                    $from_date = $data;
                    $product_id = $id;

                       //sales stock get
                    $sales1 = 0;
                    $resultsales1 = $this->db->query("SELECT SUM(a.weight) as sales
                                FROM order_product_list_process AS a 
                                JOIN orders_process AS b ON a.order_id = b.id 
                                JOIN product_list as c ON c.id = a.product_id
                                WHERE b.deleteid = 0 AND a.deleteid = 0 AND DATE(a.create_date) = '" . $from_date . "' AND (a.sub_product_id = 0 OR a.sub_product_id IS NULL) AND (a.tile_material_id = 0 OR a.tile_material_id IS NULL) AND a.product_id = '".$product_id."' ORDER BY a.id DESC")->result();

                    foreach ($resultsales1 as  $valuess1) {
                        $sales1 = $valuess1->sales > 0 ? $valuess1->sales : 0;
                    }

                    //sales stock get
                    $sales_sub = 0;
                    $resultsales2 = $this->db->query("SELECT SUM(a.weight) as sales
                                FROM order_product_list_process AS a 
                                JOIN orders_process AS b ON a.order_id = b.id 
                                JOIN product_list as c ON c.id = a.sub_product_id
                                WHERE b.deleteid = 0 AND a.deleteid = 0 AND DATE(a.create_date) = '" . $from_date . "' AND a.sub_product_id = '".$product_id."' ORDER BY a.id DESC")->result();

                    foreach ($resultsales2 as  $valuess2) {
                        $sales_sub = $valuess2->sales > 0 ? $valuess2->sales : 0;
                    }

                    //sales stock get
                    $sales_tile_mat = 0;
                    $resultsales3 = $this->db->query("SELECT SUM(a.weight) as sales
                                FROM order_product_list_process AS a 
                                JOIN orders_process AS b ON a.order_id = b.id 
                                JOIN product_list as c ON c.id = a.tile_material_id
                                WHERE b.deleteid = 0 AND a.deleteid = 0 AND DATE(a.create_date) = '" . $from_date . "' AND a.tile_material_id = '".$product_id."' ORDER BY a.id DESC")->result();
        
                    foreach ($resultsales3 as  $valuess3) {
                        $sales_tile_mat = $valuess3->sales > 0 ? $valuess3->sales : 0;
                    }
        

                    $sales = ($sales1+$sales_sub+$sales_tile_mat) /1000;

                      //inward stock total
                      $inward_tot="";
                      $data = date('Y-m-d');
                      $resulti= $this->db->query("SELECT SUM(inward_qty) as inward_tot FROM purchase_order_coilupdate WHERE product_id = '".$id."' ORDER BY id DESC")->result();
                      foreach ($resulti as  $values) {
                          $inward_tot= $values->inward_tot; 
                       }

                    //inward stock get
                    $inward_stock = "";
                    $resultinw = $this->db->query("SELECT SUM(a.inward_qty) as inward_qty FROM purchase_order_coilupdate as a JOIN product_list as b ON b.id = a.product_id WHERE a.deleteid != 1 AND DATE(a.inward_date) = '" . $data . "' AND product_id = '".$product_id."' ORDER BY a.id DESC")->result();
                    foreach ($resultinw as  $valuess) {
                        $inward_stock = $valuess->inward_qty;
                    }


                    $opening_qty = "";
                    $resultop = $this->db->query("SELECT SUM(a.opening_qty) as opening_qty FROM product_list as a  WHERE id = '".$id."' AND DATE(a.create_date) = '" . $from_date . "' ORDER BY a.id DESC")->result();
                    foreach ($resultop as  $resulopen) {
                        $opening_qty = $resulopen->opening_qty;
                    }
                        
                    if($opening_qty > 0){
                        $opening_qty = $opening_qty;
                    }else{
                        $resultcs = $this->db->query("SELECT * FROM daywise_stock WHERE product_id = '".$id."' AND DATE(create_date) != '" . $data . "' ORDER BY id DESC LIMIT 1")->result();
                        foreach ($resultcs as  $valuecs) {
                            $opening_qty = $valuecs->closing_stock;
                        }
                    }


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
                      $output['sub_categories_id']= $value->sub_categories_id;
                      $output['categories']= $value->categories;
                      $output['uom']= $value->uom;
                      $output['formula']= $value->formula;
                      $output['formula2']= $value->formula2;
                      $output['HSN_SAC']= $value->HSN_SAC;
                      $output['description']= $value->description;
                      $output['opening_val']= $value->opening_val;
                      $output['opening_qty']= $opening_qty;
                      $output['side_label']= $value->side_label;
                      $output['input_label']= $value->input_label;
                      $output['link_to_purchase']= $value->link_to_purchase;
                      $output['production_stock']= $value->production_stock;
                      $output['min_order_stock']= $value->min_order_stock;
                    //   $output['stock']= round($value->stock);
                      $output['optimal_stock']= $value->optimal_stock;
                      $output['status']= $value->status;

                        //    AStockUpdate-live-01/07
                      
                    $from_date = date('Y-m-d');
                    $to_date = date('Y-m-d');
                    $product_id = $id;

                    $res_open = $this->db->query("SELECT * FROM stockreport WHERE product_id = '".$product_id."' AND DATE(create_date) < '" . $from_date . "' ORDER BY id DESC LIMIT 1")->row();

                    $today_open = $this->db->query("SELECT * FROM stockreport WHERE product_id = '".$product_id."' AND order_no = 'open' AND DATE(create_date) = '" . $from_date . "' ORDER BY id DESC LIMIT 1")->row();

                    $open = $this->db->query("SELECT * FROM stockreport WHERE product_id = '".$product_id."' AND order_no = 'open' ORDER BY id DESC LIMIT 1")->row();

                    $res_in = $this->db->query("SELECT SUM(inward) as inward FROM stockreport WHERE product_id = '".$product_id."' AND DATE(create_date) BETWEEN '".$from_date."' AND '".$to_date."' ORDER BY id DESC")->row();

                    $res_bil = $this->db->query("SELECT SUM(billed_stock) as billed_stock FROM stockreport WHERE product_id = '".$product_id."' AND DATE(create_date) BETWEEN '".$from_date."' AND '".$to_date."' ORDER BY id DESC LIMIT 1")->row();

                    $res_ret = $this->db->query("SELECT SUM(return_stock) as return_stock FROM stockreport WHERE product_id = '".$product_id."' AND DATE(create_date) BETWEEN '".$from_date."' AND '".$to_date."' ORDER BY id DESC LIMIT 1")->row();


                    if($res_open->actual_closing != 0){
                        $opening_stock = $res_open->actual_closing;
                        if($today_open->opening_stock > 0){
                            $opening_stock = $today_open->opening_stock;
                        }    
                    }else{
                        $opening_stock = $open->opening_stock;    
                    }
                    $inward = $res_in->inward;
                    $billed_stock = $res_bil->billed_stock;
                    $actual_closing = (($opening_stock + $res_in->inward) - $res_bil->billed_stock)  + $res_ret->return_stock;

                    $stock =  $actual_closing;
                    $output['sales']= $actual_closing;
                    $output['opening_qty']= $opening_stock;
                        
                        $journal = $this->journalstock($actual_closing,$product_id);
                        $actual_closing = $journal[0];            
                        $stock_journal_left = $journal[1];
                        $stock_journal_rgt = $journal[2];

                        $output['stock'] = round($actual_closing,3);
                        $output['stock_journal_left'] = round($stock_journal_left,3);
                        $output['stock_journal_rgt'] = round($stock_journal_rgt,3);
                    //    AStockUpdate-live-01/07

                      $output['selling_average_price']= $value->selling_average_price;
                      
                      $actual_selling_price = $this->db->query("SELECT SUM(rate) as totalrate, COUNT(rate) as trcount FROM order_product_list_process WHERE deleteid=0  AND product_id = '".$value->id."'")->row();
                            $avg = 0;
                            if($actual_selling_price->trcount != 0){
                            $avg =  $actual_selling_price->totalrate / $actual_selling_price->trcount;
                            }
                            $output['actual_selling_price']= round($avg ,2);

                    $current_selling_price = $this->db->query("SELECT rate as latest_rate FROM order_product_list_process WHERE deleteid = 0 AND product_id = '".$value->id."' ORDER BY create_date DESC LIMIT 1;")->row();

                    $output['current_selling_price']= round($current_selling_price ,2);     
                    //   $profile_and_loss=$avg-$value->purchase_price;   avg commented 
                    // $profile_and_loss = 0;
                    // if($current_selling_price->latest_rate > 0){                    
                    //     $profile_and_loss=$current_selling_price->latest_rate-$value->purchase_price;
                    // }

                    //   $output['profile_and_loss']= round($profile_and_loss ,2);
                      if($value->average_price >0 && $value->average_price != "0"){

                        $profit_and_loss = 0;
                        if($value->price > 0 || $value->average_price > 0){                    
                            $profit_and_loss=$value->price-$value->average_price;
                        }
                        $profit_and_loss = round($profit_and_loss ,2);
                    }else {
                        $profit_and_loss = 'NA';
                    }
        
                    $output['profile_and_loss'] = $profit_and_loss;
                      
                      
                      
                                      
                                      
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



    
public function fileuplaodimgsave_order_product()
    {



        
       if(!empty($_FILES))  
        { 
            
           

            $path=array();
            for ($i=0; $i <count($_FILES['file']) ; $i++) { 

                   if($_FILES['file']['name'][$i]!='')
                   {

                         $id=$_GET['order_product_id'];
                         $tablename_sub=$_GET['tablename_sub'];
                      

                         $path = 'uploads/' .time(). $_FILES['file']['name'][$i]; 
                         if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $path))  
                         {  


                         	
                            $this->db->query("UPDATE $tablename_sub SET reference_image='".$path."' WHERE id='".$id."'");

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

    
    public function findimages_gate()
	{
                     
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     $array=array();
                     $array1=array();

                     
                    
                     $order_id=$form_data->order_id;
                   
                     
                     
                     $i=0;
                     $result= $this->Main_model->where_names_two_order_by('gate_order_images','order_id',$order_id,'deleteid','0','id','DESC');
                 	 foreach ($result as  $value)
                 	 {

                 	 	            

                              



							                     $files=$value->product_image;


							                     $file_parts = pathinfo($files);

													switch($file_parts['extension'])
													{
													    case "jpg":
													    $exe="jpg";
													    break;

													    case "png":
													    $exe="png";
													    break;

													    case "pdf":
													    $exe="pdf";
													    break;

													    case "": // Handle file extension for files ending in '.'
													    case NULL: // Handle no file extension
													    break;
													}


							                     if($files!='')
							                     {


			                        
					                                    $array[] = array(
						    
						                     	 	    'id' => $value->id,
						                     	 	    'exe' => $exe,
						                     	 		'product_image' => base_url().$files,
						                     	 		'remarks'=>$value->remarks
						                     	 		
						    
						                     	    	);


				                     	    	}

                                         $i++;
				            
                      
                 	 }
                 	 
                 	  echo json_encode($array);
                 	 

                    

	}

     public function fileuplaodimgsave_gate()
    {



        
       if(!empty($_FILES))  
        { 
            
           

            $path=array();
            for ($i=0; $i <count($_FILES['file']); $i++) { 

                   if($_FILES['file']['name'][$i]!='')
                   {

                         $order_id=$_GET['id'];
                         $remarks=$_GET['remarks'];
                        
                      

                         $path = 'uploads/' .time(). $_FILES['file']['name'][$i]; 
                         if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $path))  
                         {  

                           $this->db->query("INSERT INTO gate_order_images  (`order_id`,`product_image`,`remarks`)VALUES('".$order_id."','".$path."','".$remarks."')");      

               
                         }


                   }
                   
            }
             
            

             
 
         }
         
             $output=array('1');
             echo json_encode($output);


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
    
	
	
   
public function fetch_data_report_product()
{



        $pagenum = $_GET['page'];
        $pagesize = $_GET['size'];
        $offset = ($pagenum - 1) * $pagesize;
        $search = $_GET['search'];
        if (isset($_GET['page_next'])) {
            $offset = $_GET['page_next'];
        }
        $where = "";
        $where1 = "";
     
        $tablename = $_GET['tablename'];
        $status = $_GET['order_base'];
       
        $where .= " AND status = '".$status."'";
   

    if (isset($_GET['search'])) {
        $search = urldecode($_GET['search']);
        if($search!='')
        {
                $where .=" AND product_name LIKE '%" . $search . "%'";
        }
    } 
    if (isset($_GET['search_cat'])) {
        $search_cat = $_GET['search_cat'];
        if($search_cat>0)
        {
            $where .=" AND categories_id='" . $search_cat . "'";
        }
    } 


    if($status==1)
    {
        $del=0;
    }
    else
    {
    	$del=1;
    }
    $i_count = 0;
$array=array();

            $querycount = $this->db->query("SELECT COUNT(id) as countid FROM $tablename  WHERE deleteid='".$del."'  $where ORDER BY id DESC");
            $resultcount = $querycount->result();
            foreach ($resultcount as  $valuess) {
            $count=$valuess->countid;
            }
            
            
            $query = $this->db->query("SELECT * FROM $tablename   WHERE deleteid='".$del."' $where ORDER BY id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
  
    foreach ($result as  $value) {


        if ($value->status == '1') {
            $status = 'Active';
        } elseif ($value->status == '-1') {
            $status = 'Archived';
        } else {
            $status = 'InActive';
        }

        $create_by = "";
        $resultvent = $this->Main_model->where_names('admin_users', 'id', $value->create_by);
        foreach ($resultvent as  $valuess) {
            $create_by = $valuess->name;
        }

        $update_by = "";
        $resultvent = $this->Main_model->where_names('admin_users', 'id', $value->update_by);
        foreach ($resultvent as  $valuess) {
            $update_by = $valuess->name;
        }



        $attachment = "";


        $resultventat = $this->Main_model->where_names_two_order_by('product_images', 'product_id', $value->id, 'deleteid', '0', 'id', 'ASC');

        if (count($resultventat) > 0) {
            $attachment = "YES";
        }

        //inward stock get
        $inward_stock = "";
        $data = date('Y-m-d');
        $resultinw = $this->db->query("SELECT SUM(a.inward_qty) as inward_qty FROM purchase_order_coilupdate as a JOIN product_list as b ON b.id = a.product_id WHERE a.product_id = '" . $value->id . "' AND a.deleteid != 1 AND DATE(a.inward_date) BETWEEN '".$data."' AND '".$data."' ORDER BY a.id DESC")->result();
        foreach ($resultinw as  $valuess) {
            $inward_stock = $valuess->inward_qty;
        }

        //sales stock get
        $sales = $this->salesvalget($value->uom,$data,$data,$value->sub_categories_id,$value->id);
       
            $opening_qty = "";
            $resultop = $this->db->query("SELECT SUM(a.opening_qty) as opening_qty FROM product_list as a  WHERE a.id = '".$value->id."'  AND DATE(a.create_date) BETWEEN '".$data."' AND '".$data."' ORDER BY a.id DESC")->result();
            foreach ($resultop as  $resulopen) {
                $opening_qty = $resulopen->opening_qty;
            }

            if($opening_qty > 0){
                $opening_qty = $opening_qty;
            }else{
                $resultcs = $this->db->query("SELECT * FROM daywise_stock WHERE product_id = '".$value->id."' AND DATE(create_date) != '" . $data . "' ORDER BY create_date DESC LIMIT 1")->result();
                foreach ($resultcs as  $valuecs) {
                    $opening_qty = $valuecs->closing_stock;
                }
            }

        $stock = ($opening_qty + $inward_stock) - ($value->optimal_stock + $value->production_stock + $sales);

         // AStockUpdate-live-01/07
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');
            $product_id = $value->id;
    
            $res_open = $this->db->query("SELECT * FROM stockreport WHERE product_id = '".$product_id."' AND DATE(create_date) < '" . $from_date . "' ORDER BY id DESC LIMIT 1")->row();
    
            $today_open = $this->db->query("SELECT * FROM stockreport WHERE product_id = '".$product_id."' AND order_no = 'open' AND DATE(create_date) = '" . $from_date . "' ORDER BY id DESC LIMIT 1")->row();
    
            $open = $this->db->query("SELECT * FROM stockreport WHERE product_id = '".$product_id."' AND order_no = 'open' ORDER BY id DESC LIMIT 1")->row();
    
            $res_in = $this->db->query("SELECT SUM(inward) as inward FROM stockreport WHERE product_id = '".$product_id."' AND DATE(create_date) BETWEEN '".$from_date."' AND '".$to_date."' ORDER BY id DESC")->row();
    
            $res_bil = $this->db->query("SELECT SUM(billed_stock) as billed_stock FROM stockreport WHERE product_id = '".$product_id."' AND DATE(create_date) BETWEEN '".$from_date."' AND '".$to_date."' ORDER BY id DESC LIMIT 1")->row();
    
            $res_ret = $this->db->query("SELECT SUM(return_stock) as return_stock FROM stockreport WHERE product_id = '".$product_id."' AND DATE(create_date) BETWEEN '".$from_date."' AND '".$to_date."' ORDER BY id DESC LIMIT 1")->row();
    
            if($res_open->actual_closing != 0){
                $opening_stock = $res_open->actual_closing;    
                if($today_open->opening_stock > 0){
                    $opening_stock = $today_open->opening_stock;
                }  
            }else{
                $opening_stock = $open->opening_stock;    
            }
            $inward = $res_in->inward;
            $billed_stock = $res_bil->billed_stock;
            $actual_closing = (($opening_stock + $res_in->inward) - $res_bil->billed_stock)  + $res_ret->return_stock;
    
            //stock journal
            $journal = $this->journalstock($actual_closing,$value->id);
            $actual_closing = $journal[0];            
            $stock_journal_left = $journal[1];
            $stock_journal_rgt = $journal[2];
            // AStockUpdate-live-01/07

	        //stock journal
	        $journal = $this->journalstock($stock,$value->id);
	        $stock = $journal[0];            
	        $stock_journal_left = $journal[1];
	        $stock_journal_rgt = $journal[2];
        
        $array[] = array(

            'no' => $i,
            'id' => $value->id,
            'attachment' => $attachment,
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
            'description' => $value->description,
            'opening_val' => $value->opening_val,
            'opening_qty' => $opening_qty,
            'input_label' => $value->input_label,
            'color' => $value->color,
            'gsm' => $value->gsm,
            'ys' => $value->ys,
            'gst' => $value->gst,
            'weight' => $value->weight,
            'thickness' => $value->thickness,
            'stock_journal_left' => round($stock_journal_left,3),
            'stock_journal_rgt' => round($stock_journal_rgt,3),
            'open_stock' => round($opening_stock, 3), 
            'inward_stock' => round($inward_stock, 3),
            'inward_tot' => round($inward_tot, 3),
            'sales_stock' => round($sales, 3),
            'stock' => round($actual_closing, 3),   // AStockUpdate-live-01/07 some of added
            'optimal_stock' => round($value->optimal_stock, 3), 
            'production_stock' => round($value->production_stock, 3),
            'min_order_stock' => round($value->min_order_stock, 2),
            'create_by' => $create_by,
            'update_by' => $update_by,
            'status' => $status

        );



        $i++;
    }

    // echo json_encode($array);
    $myData = array('PortalActivity' => $array, 'totalCount' => $count);
    
    
    echo json_encode($myData);
}

	 public function fetch_data_report_product_new()
    {
        $page = $_GET['page'];
        $page = ($page !== false && is_numeric($page) && $page > 0) ? $page : 1;

        if (isset($_GET['product'])) {
            $search = urldecode($_GET['product']);
        } else {
            $search = '';
        }

        $data = date('Y-m-d');
        $from_date = $_GET['from_date'];        
        $to_date = $_GET['to_date'];

        $i = 1;

        $result = $this->Main_model->where_sub_categories_product_mapping('product_list', 'a.deleteid', '0', 'a.status', '1', 'id', 'DESC', $page, $search);

        if (!empty($result)) {
            foreach ($result as  $value) {
                
                $attachment = "";
                $product_id = $value->id;
                

                    if($value->sub_categories_id > 0){
                        $were = " AND b.sub_categories_id = '".$value->sub_categories_id."'";
                        $whereopen = " a.sub_categories_id  = '".$value->sub_categories_id."'";
                    }else{
                        $were = " AND a.product_id = '".$product_id."'";
                        $whereopen = " a.id  = '".$product_id."'";
                    }

                        
                        if ($value->status == '1') {
                            $status = 'Active';
                        } elseif ($value->status == '-1') {
                            $status = 'Archived';
                        } else {
                            $status = 'InActive';
                        }
                    

                        if ($value->uom == 'Nos' || $value->uom == 'nos') {
                            $uom = 'Nos';
                        } else {
                            $uom = 'Ton';
                        }

                        
                        $res_open = $this->db->query("SELECT * FROM stockreport WHERE product_id = '".$product_id."' AND DATE(create_date) < '" . $from_date . "' ORDER BY id DESC LIMIT 1")->row();

                        $today_open = $this->db->query("SELECT * FROM stockreport WHERE product_id = '".$product_id."' AND order_no = 'open' AND DATE(create_date) = '" . $from_date . "' ORDER BY id DESC LIMIT 1")->row();

                        $open = $this->db->query("SELECT * FROM stockreport WHERE product_id = '".$product_id."' AND order_no = 'open' ORDER BY id DESC LIMIT 1")->row();


                        $res_in = $this->db->query("SELECT SUM(inward) as inward FROM stockreport WHERE product_id = '".$product_id."' AND DATE(create_date) BETWEEN '".$from_date."' AND '".$to_date."' ORDER BY id DESC")->row();

                        $res_bil = $this->db->query("SELECT SUM(billed_stock) as billed_stock FROM stockreport WHERE product_id = '".$product_id."' AND DATE(create_date) BETWEEN '".$from_date."' AND '".$to_date."' ORDER BY id DESC LIMIT 1")->row();

                        $res_ret = $this->db->query("SELECT SUM(return_stock) as return_stock FROM stockreport WHERE product_id = '".$product_id."' AND DATE(create_date) BETWEEN '".$from_date."' AND '".$to_date."' ORDER BY id DESC LIMIT 1")->row();

                    if($res_open->actual_closing != 0){
                        $opening_stock = $res_open->actual_closing;
                        if($today_open->opening_stock > 0){
                            $opening_stock = $today_open->opening_stock;
                        }      
                    }else{
                        $opening_stock = $open->opening_stock;    
                    }
                                        
                        $inward = $res_in->inward;
                        $billed_stock = $res_bil->billed_stock;                    
                        $return_stock = $res_ret->return_stock;
                        $actual_closing = (($opening_stock + $res_in->inward) - $res_bil->billed_stock) + $res_ret->return_stock;

                        //stock journal
                        $journal = $this->journalstock($actual_closing,$value->id);
                        $actual_closing = $journal[0];            
                        $stock_journal_left = $journal[1];
                        $stock_journal_rgt = $journal[2];
    


                        $create_by = "";
                        $resultvent = $this->Main_model->where_names('admin_users', 'id', $value->create_by);
                        foreach ($resultvent as  $valuess) {
                            $create_by = $valuess->name;
                        }


                        $update_by = "";
                        $resultvent = $this->Main_model->where_names('admin_users', 'id', $value->update_by);
                        foreach ($resultvent as  $valuess) {
                            $update_by = $valuess->name;
                        }

                        
                        $resultventat = $this->Main_model->where_names_two_order_by('product_images', 'product_id', $value->id, 'deleteid', '0', 'id', 'ASC');
                        if (count($resultventat) > 0) {
                            $attachment = "YES";
                        }

                        //inward stock get
                        $inward_stock = "";
                        $resultinw = $this->db->query("SELECT SUM(a.inward_qty) as inward_qty FROM purchase_order_coilupdate as a JOIN product_list as b ON b.id = a.product_id WHERE a.deleteid != 1 AND DATE(a.inward_date) BETWEEN '".$from_date."' AND '".$to_date."' $were ORDER BY a.id DESC")->result();
                        foreach ($resultinw as  $valuess) {
                            $inward_stock = $valuess->inward_qty;
                        }

                        //sales stock get
                        $sales = $this->salesvalget($value->uom,$from_date,$to_date,$value->sub_categories_id,$value->id);

                        if($from_date == $data){
                            $opening_qty = "";
                            $resultop = $this->db->query("SELECT SUM(a.opening_qty) as opening_qty FROM product_list as a  WHERE $whereopen AND DATE(a.create_date) BETWEEN '".$from_date."' AND '".$to_date."' ORDER BY a.id DESC")->result();
                            foreach ($resultop as  $resulopen) {
                                $opening_qty = $resulopen->opening_qty;
                            }

                            if($opening_qty > 0){
                                $opening_qty = $opening_qty;
                            }else{
                                $resultcs = $this->db->query("SELECT * FROM daywise_stock WHERE product_id = '".$value->id."' AND DATE(create_date) != '" . $from_date . "' ORDER BY create_date DESC LIMIT 1")->result();
                                foreach ($resultcs as  $valuecs) {
                                    $opening_qty = $valuecs->closing_stock;
                                }
                            }
                        }else{
                            $resultcs = $this->db->query("SELECT * FROM daywise_stock WHERE product_id = '".$value->id."' AND DATE(create_date) < '" . $from_date . "' ORDER BY create_date DESC LIMIT 1")->result();
                            foreach ($resultcs as  $valuecs) {
                                $opening_qty = $valuecs->closing_stock;
                            }
                        }

                        $result_opt_prod  = $this->db->query("SELECT * FROM product_list  as a WHERE a.id = '".$value->id."'  AND DATE(a.create_date) BETWEEN '".$from_date."' AND '".$to_date."' ORDER BY a.id DESC")->result();
                        foreach ($result_opt_prod as  $vv) {
                            $optimal_stock = $vv->optimal_stock;
                            $production_stock = $vv->production_stock;
                        }
                        
                        
                        $stock = ($opening_qty + $inward_stock) - ($optimal_stock + $production_stock + $sales);

                    
                        //current value
                        $current_value = $actual_closing * $value->selling_average_price;
                        // $current_value =  $currentvalue > 0 ? $currentvalue : $value->current_value; 

                        $open_stock_val = round($opening_stock * $value->selling_average_price,3);
                        $inward_stock_val = round($inward * $value->selling_average_price,3);
                        $sales_stock_val = round($billed_stock * $value->selling_average_price,3);
                        $return_stock_val = round($return_stock * $value->selling_average_price,3);
                        $optimal_stock_val = round($optimal_stock * $value->selling_average_price,3);
                        $production_stock_val = round($production_stock * $value->selling_average_price,3);

                        $array[] = array(
                            'no' => $i,
                            'id' => $value->id,
                            'uom' => $uom,
                            'attachment' => $attachment,
                            'product_name' => $value->display_name,
                            'price' => $value->price,
                            'kg_price' => $value->kg_price,
                            'brand' => $value->brand,
                            'categories' => $value->categories,
                            'formula' => $value->formula,
                            'formula2' => $value->formula2,
                            'HSN_SAC' => $value->HSN_SAC,
                            'side_label' => $value->side_label,
                            'description' => $value->description,
                            'opening_val' => $opening_stock,
                            'opening_qty' => $opening_qty,
                            'input_label' => $value->input_label,
                            'color' => $value->color,
                            'gsm' => $value->gsm,
                            'ys' => $value->ys,
                            'gst' => $value->gst,
                            'weight' => $value->weight,
                            'thickness' => $value->thickness,
                            'open_stock' => round($opening_stock, 3),
                            'inward_stock' => round($inward, 3),
                            'sales_stock' => round($billed_stock, 3),                        
                            'return_stock' => round($return_stock, 3),
                            'return_stock_val' => $return_stock_val,
                            'stock' => round($actual_closing, 3),
                            'optimal_stock' => round($optimal_stock, 3),
                            'production_stock' => round($production_stock, 3),
                            'open_stock_val' => $open_stock_val,
                            'inward_stock_val' => $inward_stock_val,
                            'sales_stock_val' => $sales_stock_val,
                            'optimal_stock_val' => $optimal_stock_val,
                            'production_stock_val' => $production_stock_val,
                            'stock_journal_left' => round($stock_journal_left,3),
                            'stock_journal_rgt' => round($stock_journal_rgt,3),
                            'current_value' => round($current_value, 3),
                            'min_order_stock' => round($value->min_order_stock, 3),
                            'create_by' => $create_by,
                            'update_by' => $update_by,
                            'status' => $status,                        

                        );
                        $i++;

            }
            echo json_encode($array);
        }
    }
        function daywisestock($product_id){
            if($product_id>0)
            {
            $result = $this->Main_model->where_names('product_list','id', $product_id);
    
            foreach ($result as $value) {
    
                $data = date('Y-m-d');
                $from_date = date('Y-m-d');
    
                if($value->sub_categories_id > 0){
                    $were = " AND b.sub_categories_id = '".$value->sub_categories_id."'";
                    $where1 = " AND c.sub_categories_id = '".$value->sub_categories_id."'";
                    $where2 = " AND c.sub_categories_id = '".$value->sub_categories_id."'";
                    $where3 = " AND c.sub_categories_id = '".$value->sub_categories_id."'";
                    $whereopen = " a.sub_categories_id = '".$value->sub_categories_id."'";
                }else{
                    $were = " AND a.product_id = '".$product_id."'";
                    $where1 = " AND a.product_id = '".$product_id."'";
                    $where2 = " AND a.sub_product_id = '".$product_id."'";
                    $where3 = " AND a.tile_material_id = '".$product_id."'";
                    $whereopen = " a.id = '".$product_id."'";
                }
    
            //inward stock get
            $inward_stock = "";
            $resultinw = $this->db->query("SELECT SUM(a.inward_qty) as inward_qty FROM purchase_order_coilupdate as a
            JOIN product_list as b ON b.id = a.product_id WHERE a.deleteid != 1 AND DATE(a.inward_date) = '" . $data .
            "' $were ORDER BY a.id DESC")->result();
            foreach ($resultinw as $valuess) {
            $inward_stock = $valuess->inward_qty;
            }
    
            // //sales stock get
            // $sales1 = 0;
            // $resultsales1 = $this->db->query("SELECT SUM(a.weight) as sales
            // FROM order_product_list_process AS a
            // JOIN orders_process AS b ON a.order_id = b.id
            // JOIN product_list as c ON c.id = a.product_id
            // WHERE b.deleteid = 0 AND a.deleteid = 0 AND DATE(a.create_date) = '" . $from_date . "' AND (a.sub_product_id = 0 OR
            // a.sub_product_id IS NULL) AND (a.tile_material_id = 0 OR a.tile_material_id IS NULL) $where1 ORDER BY a.id
            // DESC")->result();
    
            // foreach ($resultsales1 as $valuess1) {
            // $sales1 = $valuess1->sales > 0 ? $valuess1->sales : 0;
            // }
    
            // //sales stock get
            // $sales_sub = 0;
            // $resultsales2 = $this->db->query("SELECT SUM(a.weight) as sales
            // FROM order_product_list_process AS a
            // JOIN orders_process AS b ON a.order_id = b.id
            // JOIN product_list as c ON c.id = a.sub_product_id
            // WHERE b.deleteid = 0 AND a.deleteid = 0 AND DATE(a.create_date) = '" . $from_date . "' $where2 ORDER BY a.id DESC")->result();
    
            // foreach ($resultsales2 as $valuess2) {
            // $sales_sub = $valuess2->sales > 0 ? $valuess2->sales : 0;
            // }
    
            // //sales stock get
            // $sales_tile_mat = 0;
            // $resultsales3 = $this->db->query("SELECT SUM(a.weight) as sales
            // FROM order_product_list_process AS a
            // JOIN orders_process AS b ON a.order_id = b.id
            // JOIN product_list as c ON c.id = a.tile_material_id
            // WHERE b.deleteid = 0 AND a.deleteid = 0 AND DATE(a.create_date) = '" . $from_date . "' $where3 ORDER BY a.id DESC")->result();
    
            // foreach ($resultsales3 as $valuess3) {
            // $sales_tile_mat = $valuess3->sales > 0 ? $valuess3->sales : 0;
            // }
    
    
            // $sales = ($sales1+$sales_sub+$sales_tile_mat) /1000;

             //sales stock get
             $sales = $this->salesvalget($value->uom,$from_date,'',$value->sub_categories_id,$value->id);
    
    
            $opening_qty = "";
            $data = date('Y-m-d');
            $resulti = $this->db->query("SELECT SUM(a.opening_qty) as opening_qty FROM product_list as a WHERE 
            $whereopen AND DATE(a.create_date) = '" . $from_date . "' ORDER BY a.id DESC")->result();
            foreach ($resulti as $resulti) {
            $opening_qty = $resulti->opening_qty;

                if($opening_qty>0){
                    $opening_qty = $resulti->opening_qty;
                }else{
                    $resultcs = $this->db->query("SELECT * FROM daywise_stock WHERE product_id = '".$value->id."' AND DATE(create_date) != '" . $from_date . "' ORDER BY create_date DESC LIMIT 1")->result();
                    foreach ($resultcs as  $valuecs) {
                        $opening_qty = $valuecs->closing_stock;
                    }
                }

            }
    
            $stock = ($opening_qty + $inward_stock) - ($value->optimal_stock + $value->production_stock + $sales);
    
            $datastock['product_id']=$product_id;
            $datastock['user_id']=$this->userid;
            $datastock['opening_qty']=round($opening_qty,2);
            $datastock['stock']=round($stock,2);
            $datastock['inward_qty'] = $inward_stock;
            $datastock['sales'] = round($sales,2);
            $datastock['optimal_stock']=round($value->optimal_stock,2);
            $datastock['production_stock']=round($value->production_stock,2);
            $datastock['stock_date']=date('Y-m-d');
            $datastock['closing_stock']=round($stock,2);
            $datastock['create_date']=date('Y-m-d H:i:s');
            }
            $this->Main_model->insert_commen($datastock,'daywise_stock');
            }
    }

    function salesvalget($uom,$from_date,$to_date,$sub_categories_id,$product_id){


                if($sub_categories_id > 0){

                    $were = " AND b.sub_categories_id = '".$sub_categories_id."'";
                    $where1 = " AND c.sub_categories_id = '".$sub_categories_id."'";
                    $where2 = " AND c.sub_categories_id = '".$sub_categories_id."'";
                    $where3 = " AND c.sub_categories_id = '".$sub_categories_id."'";
                    $whereopen = " a.sub_categories_id  = '".$sub_categories_id."'";

                }else{

                    $were = " AND a.product_id = '".$product_id."'";
                    $where1 = " AND a.product_id = '".$product_id."'";
                    $where2 = " AND a.sub_product_id = '".$product_id."'";
                    $where3 = " AND a.tile_material_id = '".$product_id."'";
                    $whereopen = " a.id  = '".$product_id."'";

                }


                $sales = 0;
                // echo $uom;
                if($uom === 'Nos' || $uom === 'nos'){

                    if($product_id == 20   ){

                        $resultsales_nos = $this->db->query("SELECT SUM(a.nos) as sales
                        FROM order_product_list_process AS a 
                        JOIN orders_process AS b ON a.order_id = b.id 
                        JOIN product_list as c ON c.id = a.product_id
                        WHERE b.deleteid = 0 AND a.deleteid = 0 AND DATE(a.create_date) BETWEEN '".$from_date."' AND '".$to_date."' $where1 ORDER BY a.id DESC")->result();
        
                        foreach ($resultsales_nos as  $value_nos) {
                            $sales = $value_nos->sales > 0 ? $value_nos->sales : 0;
                        }
        
                    }else{
                        
        
                        $resultsales_nos = $this->db->query("SELECT SUM(a.qty) as sales
                        FROM order_product_list_process AS a 
                        JOIN orders_process AS b ON a.order_id = b.id 
                        JOIN product_list as c ON c.id = a.product_id
                        WHERE b.deleteid = 0 AND a.deleteid = 0 AND DATE(a.create_date) BETWEEN '".$from_date."' AND '".$to_date."' $where1 ORDER BY a.id DESC")->result();
        
                        foreach ($resultsales_nos as  $value_nos) {
                            $sales = $value_nos->sales > 0 ? $value_nos->sales : 0;
                        }
                    }

                }else{

                    // echo "else two";
                    //sales stock get
                    if( $product_id == 1068 || $product_id == 1017 || $product_id == 1067){

                        $resultsales_nos = $this->db->query("SELECT SUM(a.nos) as sales
                        FROM order_product_list_process AS a 
                        JOIN orders_process AS b ON a.order_id = b.id 
                        JOIN product_list as c ON c.id = a.product_id
                        WHERE b.deleteid = 0 AND a.deleteid = 0 AND DATE(a.create_date) BETWEEN '".$from_date."' AND '".$to_date."' $where1 ORDER BY a.id DESC")->result();
        
                        foreach ($resultsales_nos as  $value_nos) {
                            $sales = $value_nos->sales > 0 ? $value_nos->sales : 0;
                        }
        
                    }else{
                    $sales1 = 0;
                    $resultsales1 = $this->db->query("SELECT SUM(a.weight) as sales
                                FROM order_product_list_process AS a 
                                JOIN orders_process AS b ON a.order_id = b.id 
                                JOIN product_list as c ON c.id = a.product_id
                                WHERE b.deleteid = 0 AND a.deleteid = 0 AND DATE(a.create_date) BETWEEN '".$from_date."' AND '".$to_date."' AND (a.sub_product_id = 0 OR a.sub_product_id IS NULL) AND (a.tile_material_id = 0 OR a.tile_material_id IS NULL) $where1 ORDER BY a.id DESC")->result();

                    foreach ($resultsales1 as  $valuess1) {
                        $sales1 = $valuess1->sales > 0 ? $valuess1->sales : 0;
                    }
                   
                    //sales stock get
                    $sales_sub = 0;
                    $resultsales2 = $this->db->query("SELECT SUM(a.weight) as sales
                                FROM order_product_list_process AS a 
                                JOIN orders_process AS b ON a.order_id = b.id 
                                JOIN product_list as c ON c.id = a.sub_product_id
                                WHERE b.deleteid = 0  AND a.deleteid = 0 AND DATE(a.create_date) BETWEEN '".$from_date."' AND '".$to_date."'$where2 ORDER BY a.id DESC")->result();


                    foreach ($resultsales2 as  $valuess2) {
                        $sales_sub = $valuess2->sales > 0 ? $valuess2->sales : 0;
                    }
                  
                    //sales stock get
                    $sales_tile_mat = 0;
                    $resultsales3 = $this->db->query("SELECT SUM(a.weight) as sales
                                FROM order_product_list_process AS a 
                                JOIN orders_process AS b ON a.order_id = b.id 
                                JOIN product_list as c ON c.id = a.tile_material_id
                                WHERE b.deleteid = 0  AND a.deleteid = 0 AND DATE(a.create_date) BETWEEN '".$from_date."' AND '".$to_date."' $where3 ORDER BY a.id DESC")->result();

                    foreach ($resultsales3 as  $valuess3) {
                        $sales_tile_mat = $valuess3->sales > 0 ? $valuess3->sales : 0;
                    }
        
                    $sales = ($sales1+$sales_sub+$sales_tile_mat) /1000;
                }

                }
                // echo $sales;exit();

                return $sales;
               
    }

    function journalstock($stock,$id){
                
            $stock_journal_left = ""; //debit
            $stock_journal_rgt = "";  //credit
            $stockJournal = $this->db->query("SELECT 
            COALESCE(SUM(CASE WHEN debit > 0 THEN quantity ELSE 0 END), 0) as debits,
            COALESCE(SUM(CASE WHEN credit > 0 THEN quantity ELSE 0 END), 0) as credits
            FROM stock_journal 
            WHERE product_id = $id AND deleteid = 0 ")->row();

            $stock_journal_left = round($stockJournal->debits,2);
            $stock_journal_rgt = round($stockJournal->credits,2);

            $stock =  $stock - $stock_journal_left;
            $stock =  $stock + $stock_journal_rgt;

            // Return the values as an array
            return array($stock, $stock_journal_left, $stock_journal_rgt);
    }

}
