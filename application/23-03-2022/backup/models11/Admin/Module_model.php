<?php
class Module_model extends CI_Model {
	
	    public function insert($data)
        {
              

						// unset($data['unit']);
						// unset($data['category']);
						// unset($data['max_unit']);
						// unset($data['rate']);


					   if(isset($data['amenities']))
					   {
					   	  $data['amenities'] = implode('|', $data['amenities']);
					   }

                       if(isset($data['id']))
                       {
                                    $id=$data['id'];
                       	          
									$this->db->where('id',$id);
									$this->db->update('tr_package',$data);
									return true;
                       }
                       else
                       {

									$this->db->insert('tr_package',$data);
									return true;

                       }

                             


									
						
						
        }
         public function insert_commen($data,$tablename)
        {
          
          
       
                                    unset($data['pagename']);
                                    unset($data['tablename']);
                        if(isset($data['id']))
                       {
                                    $id=$data['id'];
                                    
									$this->db->where('id',$id);
									$this->db->update($tablename,$data);
									return true;
                       }
                       else
                       {

									$this->db->insert($tablename,$data);
									return true;

                       }
        }

        	
        public function modules_list() 
        {

								        		 	                $this->db->select('*');
																	$this->db->from('tr_package');
																	$this->db->order_by("id", "DESC");
																	$query = $this->db->get();
																	return $query->result();


        }


        public function contactUs() 
        {


								                                  
								        		 	                $this->db->select('*');
																	$this->db->from('tr_contactus');
																	$this->db->order_by("id", "DESC");
																	$query = $this->db->get();
																	return $query->result();


        }

           public function leads() 
        {


								                                  
																	
																	
																	$this->db->select('*');
																	$this->db->from('tr_leads');
																	$this->db->order_by("id", "DESC");
																	$query = $this->db->get();
																	return $query->result();


									
								


        }

           public function view($id) 
        {


								                                    
								        		 	                $this->db->select('*');
																	$this->db->from('tr_package');
																	$this->db->where('id',$id);
																	$query = $this->db->get();
																	return $query->result();


									
								


        }
        public function imagedelete_p($id,$update_image)
        {
                       	            $data=array('images'=>$update_image);
									$this->db->where('id',$id);
									$this->db->update('tr_package',$data);
									return true;
        }
        
         public function imagedelete_b($id,$update_image,$tablename,$f_name)
        {
                       	            $data=array($f_name=>$update_image);
									$this->db->where('id',$id);
									$this->db->update($tablename,$data);
									return true;
        }
     
       
     
        public function delete($data)
        {

								        	                        $this->db->where_in('id',$data['id']);
																	$this->db->delete($data['tablename']);
																	return true;

        }

           public function active($data)
        {                         


          

        	                                                       $tablename= $data['tablename'];
        	                                                       unset($data['tablename']);
								        	                        $status=array(
																		'status'=>1
																	);



								        	                        $this->db->where_in('id',$data['id']);
																	$this->db->update($tablename,$status);
																	return true;

        }
     

        public function block($data)
        {
                                                                    $tablename= $data['tablename'];
        	                                                        unset($data['tablename']);
				        	                                        $status=array(
																		'status'=>0
																	);

								        	                        $this->db->where_in('id',$data['id']);
																	$this->db->update($tablename,$status);
																	return true;

        }
        public function modules_view($id) 
        {


								        	if($id=="")
								        	{

								        		                 	$this->db->select('*');
																	$this->db->from('tr_modules');
																	$this->db->order_by("id", "DESC");
																	$query = $this->db->get();
																	return $query->result();


								        	}
								        	else
								        	{
								        		 	                $this->db->select('*');
																	$this->db->from('tr_modules');
																	$this->db->where('id',$id);
																	$this->db->order_by("id", "DESC");
																	$query = $this->db->get();
																	return $query->result();

								        	}

									
								


        }
          public function module_cate($data)
        {
              



                       if(isset($data['id']))
                       {
                                    $id=$data['id'];
                       	            $data=array(
										'module_name'=>$data['module_name']
									);
									$this->db->where('id',$id);
									$this->db->update('tr_modules',$data);
									return true;
                       }
                       else
                       {

                       	   $data=array(
										'module_name'=>$data['module_name']
									);
							  $this->db->insert('tr_modules',$data);
							  return true;

                       }

                             


									
						
						
        }
        public function commen_select($tablename,$id)
        {

        		                            if($id=="")
								        	{
                                                                    $this->db->select('*');
																	$this->db->from($tablename);
																	$this->db->order_by("sort_order", "ASC");
																	$query = $this->db->get();
																	return $query->result();

								        	}
								        	else
								        	{
                                                                    $this->db->select('*');
																	$this->db->from($tablename);
																	$this->db->where('id',$id);
																	$this->db->order_by("sort_order", "ASC");
																	$query = $this->db->get();
																	return $query->result();

								        	}
            
        	                                                        
        }
     

       public function commen_delete($data)
        {

								        	                        $this->db->where_in('id',$data['id']);
																	$this->db->delete($data['tablename']);
																	return true;

        }

   public function where_names($table_name,$where,$id){

									//$condition = "city_name ='".$id."'";
									$this->db->select('*');
									$this->db->from($table_name);
									$this->db->where($where,$id);
									$this->db->order_by("sort_order", "ASC");
									$query = $this->db->get();
									return $query->result();
									



        }
     
    
}