<?php
class Auth extends CI_Model {
	
	    public function login($data)
        {
              

						 $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . md5($data['password']) . "'";
					     $this->db->select('*');
						 $this->db->from('admin_users');
						 $this->db->where($condition);
						 $this->db->limit(1);
						 $query = $this->db->get();

						 if ($query->num_rows() == 1)
						 {
						    return true;
						 }
						 else
						 {
						 	return false;
						 } 
						
						
        }
        
           public function userlogin($data)
        {
              

						 $condition = "password =" . "'" .  md5($data['password']) . "'";
					     $this->db->select('*');
						 $this->db->from('admin_users');
						 $this->db->where($condition);
						 $this->db->limit(1);
						 $query = $this->db->get();

						 if ($query->num_rows() == 1)
						 {
						    return true;
						 }
						 else
						 {
						 	return false;
						 } 
						
						
        }
       
        public function read_user_information($email) {

									$condition = "email =" . "'" . $email . "'";
									$this->db->select('*');
									$this->db->from('admin_users');
									$this->db->where($condition);
									$this->db->limit(1);
									$query = $this->db->get();
									if ($query->num_rows() == 1) {
									return $query->result();
									} else {
									return false;
									}



        }
        
        
         public function read_user_information_pin($pin) {

									$condition = "password =" . "'" .  md5($pin) . "'";
									$this->db->select('*');
									$this->db->from('admin_users');
									$this->db->where($condition);
									$this->db->limit(1);
									$query = $this->db->get();
									if ($query->num_rows() == 1) {
									return $query->result();
									} else {
									return false;
									}



        }
        public function log_update($id,$value)
        {

        	    $data=array('login_status'=>$value,'login_ip'=>$_SERVER['REMOTE_ADDR']);
				$this->db->where('id',$id);
				$this->db->update('admin_users',$data);
				return true;


        }

         public function update_data_value($id,$value)
        {

        	    $data=array('name'=>$value['user_name'],'phone'=>$value['phone'],'address'=>$value['address'],'profile'=>$value['profile']);
				$this->db->where('id',$id);
				$this->db->update('admin_users',$data);
				return true;


        }

           public function passwordupdate($id,$value)
        {

        	    $data=array('password'=>md5($value['new_password']));
				$this->db->where('id',$id);
				$this->db->update('admin_users',$data);
				return true;


        }
}