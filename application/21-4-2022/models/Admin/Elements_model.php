<?php
class Elements_model extends CI_Model {
	
	    public function save_country($data)
        {
              



                       if(isset($data['id']))
                       {
                                    $id=$data['id'];
                       	            $data=array(
										'country_name'=>$data['country_name']
									);
									$this->db->where('id',$id);
									$this->db->update('tr_country',$data);
									return true;
                       }
                       else
                       {

                       	   $data=array(
										'country_name'=>$data['country_name']
									);
							  $this->db->insert('tr_country',$data);
							  return true;

                       }

                             


									
						
						
        }
        	    public function save_state($data)
        {
              



                       if(isset($data['id']))
                       {
                                    $id=$data['id'];
                       	            $data=array(
                       	            	'country_id'=>$data['country_id'],
										'state_name'=>$data['state_name'],
										'region_id'=>$data['region_id']
									);
									$this->db->where('id',$id);
									$this->db->update('tr_state',$data);
									return true;
                       }
                       else
                       {

                       	   $data=array(
                       	            	'country_id'=>$data['country_id'],
										'state_name'=>$data['state_name']
									);
							  $this->db->insert('tr_state',$data);
							  return true;

                       }


						
        }
        public function save_city($data)
        {
              





                       if(isset($data['id']))
                       {
                                    $id=$data['id'];
                       	            $data=array(
                       	            	        'country_id'=>$data['country_id'],
												'state_id'=>$data['state_id'],
												'city_name'=>$data['city_name']
									);
									$this->db->where('id',$id);
									$this->db->update('tr_city',$data);
									return true;
                       }
                       else
                       {


             

		                       	   $data=array(
		                       	            	'country_id'=>$data['country_id'],
												'state_id'=>$data['state_id'],
												'city_name'=>$data['city_name']
											);
								   $this->db->insert('tr_city',$data);
								   return true;

                       }


						
        }
         public function imagedelete($id,$update_image)
        {
                       	            $data=array('image'=>$update_image);
									$this->db->where('id',$id);
									$this->db->update('tr_city',$data);
									return true;
        }

       public function save_testimonials($data)
        {
              


	                    $data_input=array(
	                       	            	      
													'name'=>$data['name'],
													
													'description'=>$data['description'],
													
													'image'=>$data['image'],
													'sort_order'=>$data['sort_order']
						);
                       if(isset($data['id']))
                       {
                                    $id=$data['id'];
                       	     		$this->db->where('id',$id);
									$this->db->update('tr_testimonials',$data_input);
									return true;
                       }
                       else
                       {
								   $this->db->insert('tr_testimonials',$data_input);
								   return true;

                       }


						
        }

  public function save_blog($data)
        {
              


	                    $data_input=array(
	                       	            	      
													'name'=>$data['name'],
													
													'description'=>$data['description'],
													
													'image'=>$data['image'],
													'related_post'=>$data['related_post'],
													'sort_order'=>$data['sort_order']
						);
                       if(isset($data['id']))
                       {
                                    $id=$data['id'];
                       	     		$this->db->where('id',$id);
									$this->db->update('tr_blog',$data_input);
									return true;
                       }
                       else
                       {
								   $this->db->insert('tr_blog',$data_input);
								   return true;

                       }


						
        }
        public function country_view($id) 
        {


								        	if($id=="")
								        	{

								        		                 	$this->db->select('*');
																	$this->db->from('tr_country');
																	$this->db->order_by("id", "ASC");
																	$query = $this->db->get();
																	return $query->result();


								        	}
								        	else
								        	{
								        		 	                $this->db->select('*');
																	$this->db->from('tr_country');
																	$this->db->where('id',$id);
																	$this->db->order_by("id", "DESC");
																	$query = $this->db->get();
																	return $query->result();

								        	}

									
								


        }



              public function testimonials_view($id) 
        {


								        	if($id=="")
								        	{

								        		                 	$this->db->select('*');
																	$this->db->from('tr_testimonials');
																	$this->db->order_by("id", "DESC");
																	$query = $this->db->get();
																	return $query->result();


								        	}
								        	else
								        	{
								        		 	                $this->db->select('*');
																	$this->db->from('tr_testimonials');
																	$this->db->where('id',$id);
																	$this->db->order_by("id", "DESC");
																	$query = $this->db->get();
																	return $query->result();

								        	}

									
								


        }
           public function state_view($id) 
        {


								        	if($id=="")
								        	{

								        		                 	$this->db->select('*');
																	$this->db->from('tr_state');
																	$this->db->order_by("state_name", "ASC");
																	$query = $this->db->get();
																	return $query->result();


								        	}
								        	else
								        	{
								        		 	                $this->db->select('*');
																	$this->db->from('tr_state');
																	$this->db->order_by("state_name", "ASC");
																	$this->db->where('id',$id);
																	$query = $this->db->get();
																	return $query->result();

								        	}

									
								


        }
              public function city_view($id) 
        {


								        	if($id=="")
								        	{

								        		                 	$this->db->select('*');
																	$this->db->from('tr_city');
																	$this->db->order_by("city_name", "ASC");
																	$query = $this->db->get();
																	return $query->result();


								        	}
								        	else
								        	{
								        		 	                $this->db->select('*');
																	$this->db->from('tr_city');
																	$this->db->order_by("city_name", "ASC");
																	$this->db->where('id',$id);
																	$query = $this->db->get();
																	return $query->result();

								        	}

									
								


        }
        public function delete($data)
        {

        	                        $this->db->where_in('id',$data['id']);
									$this->db->delete($data['tablename']);
									return true;

        }
        public function select_state($country_id)
        {
        	                                                        $this->db->select('*');
																	$this->db->from('tr_state');
																	$this->db->where('country_id',$country_id);
																	$this->db->order_by("state_name", "ASC");
																	$query = $this->db->get();
																	return $query->result();

        }
        
         public function select_city($state_id)
        {
        	                                                        $this->db->select('*');
																	$this->db->from('tr_city');
																	$this->db->where('state_id',$state_id);
																	$this->db->order_by("city_name", "ASC");
																	$query = $this->db->get();
																	return $query->result();

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
     
    
}