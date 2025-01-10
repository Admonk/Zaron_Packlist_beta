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

         public function customerlogin($data)
        {



				        	    $user_id=$data['user_id'];
				             $password=$data['password'];

				          	 if(isset($data['newpassword']))
				             {


						                 if($data['newpassword']!='')
						                 {


								                                         
												$datas=array('password'=>$data['conpassword']);
												$this->db->where('id',$user_id);
												$this->db->update('customers',$datas);   
												$password=$data['conpassword'];


										     }


				              }

				              
				              

							 $condition = "password =" . "'" .$password."' AND id IN ('".$user_id."') AND customer_login=1";
						    $this->db->select('*');
							 $this->db->from('customers');
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


             public function read_customer_information_pin($user_id,$pin) {

									$condition = "id =" . "'" .$user_id. "'";
									$this->db->select('*');
									$this->db->from('customers');
									$this->db->where($condition);
									$this->db->limit(1);
									$query = $this->db->get();
									if ($query->num_rows() == 1) {
									return $query->result();
									} else {
									return false;
									}



        }


          public function transportlogin($data)
        {
              

						 $condition = "password =" . "'" .  md5($data['password']) . "' AND access IN ('13','31')";
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
              

						 $condition = "LOWER(org_password) =" . "'" . strtolower($data['password']) . "'";
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

									$condition = "LOWER(org_password) =" . "'" .  strtolower($pin) . "'";
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

public function userlogin_otp($data)
		{
			$this->db->select('*');
			$this->db->from('admin_users au');
			$this->db->where('au.otp', $data['password']);
			$this->db->where('au.phone', $this->session->userdata['temp_mobile']);
			$this->db->where('au.org_password', $this->session->userdata['temp_password']);
			// print_r($this->session->userdata('temp_password'));
			// exit;
			$this->db->where('au.otp_validity >= NOW()');
			$this->db->where('lt.is_logged', 0);
			$this->db->group_by('lt.otp');
			$this->db->join('login_tries lt', 'lt.otp = au.otp', 'inner');
			$this->db->limit(1);
			$query = $this->db->get();
			$queryRes = $query->result();
		
			if ($query->num_rows() == 1) {
				$this->db->where('phone', $this->session->userdata['temp_mobile']);
				$this->db->where('org_password', $this->session->userdata['temp_password']);
				$this->db->update('admin_users', array('login_attempt' => 0, 'login_status' => 1));
		
				$this->session->unset_userdata('temp_mobile');
				return $queryRes;
			} else {
				$userData = $this->db->query("SELECT name, login_attempt, access FROM admin_users WHERE phone = '".$this->session->userdata['temp_mobile']."' AND org_password = '".$this->session->userdata['temp_password']."'")->row();
				$user_name = $userData->name;
				$login_attempt_count = $userData->login_attempt;
				$access = $userData->access;
		
				$this->recordFailedAttempt($this->session->userdata['temp_mobile'], $user_name, $login_attempt_count+1);
		
				$this->db->set('login_attempt', 'login_attempt + 1', FALSE);
				// $this->db->set('login_attempt', 'login_attempt =0', FALSE);
				$this->db->where('phone', $this->session->userdata['temp_mobile']);
				$this->db->where('org_password', $this->session->userdata['temp_password']);
				$this->db->update('admin_users');
		
				if (($access == 1 || $access == 15) && $login_attempt_count == 4) {
					$this->session->set_flashdata('warning', "This is your last failed attempt. After one more failed attempt, your account will be locked.");
					redirect('index.php/adminmain/otp');
				} elseif (($access != 1 && $access != 15) && $login_attempt_count == 1) {
					$this->session->set_flashdata('warning', "This is your last failed attempt. After one more failed attempt, your account will be locked.");
					redirect('index.php/adminmain/otp');
				} else {
					if (($access == 1 && $login_attempt_count >= 5) || ($access == 15 && $login_attempt_count >= 5)) {
						$this->db->query("UPDATE admin_users SET status = 0, login_attempt = 0 WHERE phone = '".$this->session->userdata['temp_mobile']."' AND org_password = '".$this->session->userdata['temp_password']."'");
						$this->session->set_flashdata('warning', BLOCK_ACCOUNT);
						redirect('index.php/adminmain/otp');
					}
					 elseif (($access != 1 && $access != 15) && $login_attempt_count >= 2) {
						$this->db->query("UPDATE admin_users SET status = 0, login_attempt = 0 WHERE phone = '".$this->session->userdata['temp_mobile']."' AND org_password = '".$this->session->userdata['temp_password']."'");
						$this->db->query("UPDATE sales_team SET status = 0 WHERE phone = '".$this->session->userdata['temp_mobile']."' AND pin = '".$this->session->userdata['temp_password']."'");
						$this->session->set_flashdata('warning', BLOCK_ACCOUNT);
						redirect('index.php/adminmain/otp');
					}
					 else {
						return false;
					}
				}
			}
		}

		public function recordFailedAttempt($phone, $name, $login_attempt)
		{
			
			$data = array(
				'phone' => $phone,
				'name' => $name,
				'login_attempt' => $login_attempt,
				'attempt_time' => date('Y-m-d H:i:s')
			
			);
			$this->db->insert('failed_login_attempts', $data);
		}
public function getFailedLoginAttempts()
{
  
    return $this->db->get('failed_login_attempts')->result();
}

    public function read_user_information_otp($pin) {

									$condition = "otp =" . "'" .$pin. "' AND id='".$this->session->userdata['temp_id']."'";
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


}