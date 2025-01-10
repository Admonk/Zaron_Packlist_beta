<?php
class Users_model extends CI_Model {
	
	    public function insert($data)
        {
              



                       if(isset($data['id']))
                       {
                                    $id=$data['id'];
                       	          
									$this->db->where('id',$id);
									$this->db->update('tr_admin_panel',$data);
									return true;
                       }
                       else
                       {

							  $this->db->insert('tr_admin_panel',$data);
							  return true;

                       }

                             


									
						
						
        }
        	
        public function users_view() 
        {


								                                    $id="1";
								        		 	                $this->db->select('*');
																	$this->db->from('tr_admin_panel');
																	$this->db->where('id !=',$id);
																	$this->db->order_by("id", "DESC");
																	$query = $this->db->get();
																	return $query->result();


									
								


        }

           public function edit($id) 
        {


								                                    
								        		 	                $this->db->select('*');
																	$this->db->from('tr_admin_panel');
																	$this->db->where('id',$id);
																	$this->db->order_by("id", "DESC");
																	$query = $this->db->get();
																	return $query->result();


									
								


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
     
     
    
}