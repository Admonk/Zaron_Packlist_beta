<?php
class Site_settings extends CI_Model {
	
	    public function update_data_value($data)
        {
              

									$data=array(
										'site_name'=>$data['site_name'],
										'email'=>$data['email'],
										'phone'=>$data['phone'],
										'logo'=>$data['logo']
									);
									$this->db->where('id',1);
									$this->db->update('site_settings',$data);
									return true;

						
						
        }
        public function site_information()
        {

									
									$this->db->select('*');
									$this->db->from('site_settings');
									$this->db->limit(1);
									$query = $this->db->get();
									if ($query->num_rows() == 1) {
									return $query->result();
									} else {
									return false;
									}



        }
    
}