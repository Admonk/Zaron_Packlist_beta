<?php
class Banner_model extends CI_Model {
	
	    public function insert($data)
        {
              

              
																  $this->db->insert('tr_banner',$data);
																  return true;

									
						
						
        }
        
         public function insert_pagebanner($data)
        {
              

              
																  $this->db->insert('tr_page_banner',$data);
																  return true;

									
						
						
        }
        
        public function insert1($data)
        {
              

              
																  $this->db->insert('tr_about',$data);
																  return true;

									
						
						
        }
        	
        public function view() 
        {


					$id="1";
					$this->db->select('*');
					$this->db->from('tr_banner');
					$this->db->order_by("id", "DESC");
																	$query = $this->db->get();
																	return $query->result();



        }
        
         public function page_banner() 
        {


					$id="1";
					$this->db->select('*');
					$this->db->from('tr_page_banner');
					$this->db->order_by("id", "DESC");
					$query = $this->db->get();
					return $query->result();



        }



        public function view1() 
        {


								                                    $id="1";
								        		 	                $this->db->select('*');
																	$this->db->from('tr_about');
																	$this->db->order_by("id", "DESC");
																	$query = $this->db->get();
																	return $query->result();



        }



     
       
     
        public function delete($id)
        {

								        	                        $this->db->where_in('id',$id);
																	$this->db->delete('tr_banner');
																	return true;

        }


  public function delete_pagebanner($id)
        {

								        	                        $this->db->where_in('id',$id);
																	$this->db->delete('tr_page_banner');
																	return true;

        }

     
        public function delete_about($id)
        {

								        	                        $this->db->where_in('id',$id);
																	$this->db->delete('tr_about');
																	return true;

        }


      
     
    
}