<?php
class Main_model extends CI_Model {
	
	 
       
    
        public function view_order_by($table_name,$order_name,$orderkey){

									
									$this->db->select('*');
									$this->db->from($table_name);
									
									$this->db->order_by($order_name,$orderkey);
									$query = $this->db->get();
									return $query->result();
									



        }
        
           public function total_commen_update_plusset_ltr($tablename,$id,$total)
        {
          


                
              $update = $this->db->query("UPDATE $tablename SET ltr=ltr+'".$total."' WHERE id='".$id."'");
              return true;

                      
        }
          public function where_id_like_group_by($table_name,$name,$id)
         {

                
                  $this->db->select('*');
                  $this->db->from($table_name);
                  $this->db->like($name, $id);
                  $this->db->group_by('batch_no');
                  $query = $this->db->get();
                  return $query->result();
                  



        }

          public function where_id_like_and_where($table_name,$name,$id,$wh,$vl)
         {

                
                  $this->db->select('*');
                  $this->db->from($table_name);
                  $this->db->like($name, $id);
                  $this->db->where($wh,$vl);
                  $query = $this->db->get();
                  return $query->result();
                  



        }
        
        

           public function total_commen_update_mines_sku_lltr($data,$tablename)
        {
          


              $id=$data['id'];    
              $update = $this->db->query("UPDATE $tablename SET ltr=ltr-'".$data['total']."' WHERE id='".$id."'");
              return true;

                      
        }

          public function list_view_month($f_name,$id)
        {
        		                    $condition = "status =1";
									$this->db->select('*');
									$this->db->from("tr_package");
									$this->db->like($f_name,$id);
									$this->db->limit(20,0);
									$this->db->where($condition);
									$this->db->order_by('sort_order','RANDOM');
								
									$query = $this->db->get();
									return $query->result();
        }


       
        public function insert_commen($data,$tablename)
        {
          


									$this->db->insert($tablename,$data);
									return $insert_id = $this->db->insert_id(); 

                      
        }
        
         public function insert_commen_set_check($data,$tablename)
        {
          
                                   $query = $this->db->query("SELECT * FROM $tablename  WHERE name='".$data['name']."'");
                                   $res= $query->num_rows();
                                  
                                 
                                   if($res==0)
                                   {
                                       return 1;
									
                                   }
                                   else
                                   {
                                       return 0;
                                   }

                      
        }
        
        
        public function order_last_count($tablename)
        {
          
                                   $query = $this->db->query("SELECT id FROM $tablename  ORDER BY id DESC LIMIT 0,1");
                                   $res= $query->num_rows();
                                   return $query->result();

                      
        }
        
        
          public function insert_commen_set($data,$tablename)
        {
          
                                   $query = $this->db->query("SELECT * FROM $tablename  WHERE name='".$data['name']."'");
                                   $res= $query->num_rows();
                                 
                                   if($res==0)
                                   {

									$this->db->insert($tablename,$data);
									return true;
									
                                   }

                      
        }
        
           public function insert_commen_data_cutomer($data,$tablename)
        {
                                 
                                   $query = $this->db->query("SELECT * FROM $tablename  WHERE email='".$data['email']."' OR phone='".$data['phone']."'");
                                   $res= $query->num_rows();
                                 
                                   if($res==0)
                                   {


									$this->db->insert($tablename,$data);
									return true;
									
                                   }

                      
        }
        
         public function insert_commen_id_cutomer($data,$tablename)
        {
                                
                                 $query = $this->db->query("SELECT * FROM $tablename  WHERE email='".$data['email']."' OR phone='".$data['phone']."'");
                                 $result=$query->result();
                                 $res= $query->num_rows();
                               
                                 
                                 
                                 if($res==0)
                                 {
                                    	$this->db->insert($tablename,$data);
								        return $insert_id = $this->db->insert_id(); 
                                     
                                 }
                                 else
                                 {
                                       
                                         foreach($result as $val)
                                         {
                                              return  $id=$val->id;
                                         }
                                     
                                 }
  
								

                      
        }
        
         public function where_check($data,$tablename)
        {
                                
                                 $query = $this->db->query("SELECT * FROM $tablename  WHERE email='".$data['email']."' OR phone='".$data['phone']."'");
                                 $result=$query->result();
                                 $res= $query->num_rows();
                               
                                 if($res==0)
                                 {
                                    
								        return 1; 
                                     
                                 }
                                 else
                                 {
                                       
                                        return  0;
                                     
                                 }
  
								

                      
        }
        
        
        
        public function insert_commen_id($data,$tablename)
        {
          


									$this->db->insert($tablename,$data);
								    return $insert_id = $this->db->insert_id();

                      
        }
        
         
         
            public function update_commen($data,$tablename)
        {
          


									$id=$data['get_id'];
                                     unset($data['get_id']);
									$this->db->where('id',$id);
									$this->db->update($tablename,$data);
									return true;

                      
        }
            public function update_commen_where($data,$where,$tablename)
        {
          


									$id=$data['get_id'];
                       	            unset($data['get_id']);
									$this->db->where($where,$id);
									$this->db->update($tablename,$data);
									return true;

                      
        }
        
          
            public function update_commen_product($data,$tablename)
        {
          


									$id=$data['get_id'];
                       	            unset($data['get_id']);
									$this->db->where('product_name',$id);
									$this->db->update($tablename,$data);
									return true;

                      
        }
        
        
            public function update_commen_phone($data,$tablename)
        {
          


									$id=$data['phone'];
									$this->db->where('phone',$id);
									$this->db->update($tablename,$data);
									return true;

                      
        }
        
            public function update_commen_id($data,$tablename)
        {
          


									$id=$data['id'];
									$this->db->where('customer_and_executive_id',$id);
									$this->db->update($tablename,$data);
									return true;

                      
        }
        
        
          public function total_commen_update_plusset($data,$tablename)
        {
          


							$id=$data['get_id'];		
                            $update = $this->db->query("UPDATE $tablename SET total=total+'".$data['total']."' WHERE m_id='".$id."'");
							return true;

                      
        }



        public function total_commen_update_plusset_sku($data,$tablename)
        {
          


							$id=$data['get_id'];		
                            $update = $this->db->query("UPDATE $tablename SET total=total+'".$data['total']."' WHERE m_id='".$id."' AND sku='".$data['sku']."' ");
							return true;

                      
        }
        




        
          public function total_commen_update_plusset_inc($data,$tablename)
        {
          

							$id=$data['get_id'];		
                            $update = $this->db->query("UPDATE $tablename SET inward_quantity=inward_quantity+'".$data['total']."' WHERE material_id='".$id."'");
							return true;

                      
        }
        
         public function total_commen_update_plusset_inc_cc($data,$tablename)
        {
          

							$id=$data['get_id'];		
                            $update = $this->db->query("UPDATE $tablename SET ltr=ltr+'".$data['ltr']."' WHERE product_name='".$id."'");
							return true;

                      
        }
        
        
        
         public function total_commen_update_minesset($data,$tablename)
        {
          


							$id=$data['get_id'];		
                            $update = $this->db->query("UPDATE $tablename SET total=total-'".$data['total']."' WHERE m_id='".$id."'");
							return true;

                      
        }
        
        public function total_commen_update_plus($data,$tablename)
        {
          


							$id=$data['get_id'];		
                            $update = $this->db->query("UPDATE $tablename SET total=total+'".$data['total']."' WHERE id='".$id."'");
							return true;

                      
        }
        public function total_commen_update_mines($data,$tablename)
        {
          


							$id=$data['get_id'];		
                            $update = $this->db->query("UPDATE $tablename SET total=total-'".$data['total']."' WHERE id='".$id."'");
							return true;

                      
        }



         public function total_commen_update_mines_sku($data,$tablename)
        {
          


              $id=$data['get_id'];    
              $update = $this->db->query("UPDATE $tablename SET total=total-'".$data['total']."' WHERE id='".$id."' AND sku='".$data['sku']."' ");
              return true;

                      
        }

        public function deleteupdate($id,$tablename)
        {

                
              $update = $this->db->query("UPDATE $tablename SET deleteid='1' WHERE id='".$id."'");
              return true;

        }
        
        
        
         public function cancelupdate($id,$tablename)
        {

                
              $update = $this->db->query("UPDATE $tablename SET order_base='-1' WHERE id='".$id."'");
              return true;

        }
        
        
           public function cancelupdatefinance($id,$tablename)
        {

                
              $update = $this->db->query("UPDATE $tablename SET finance_status='-1' WHERE id='".$id."'");
              return true;

        }
        
        
        

        public function close($id,$tablename,$status)
        {

                
              $update = $this->db->query("UPDATE $tablename SET status='".$status."' WHERE id='".$id."'");
              return true;

        }

        public function delete($id,$tablename)
        {

									$this->db->where_in('id',$id);
									$this->db->delete($tablename);
									return true;

        }
        
         public function delete_where($tablename,$where,$id)
        {

									$this->db->where_in($where,$id);
									$this->db->delete($tablename);
									return true;

        }
        
         public function delete_where_by($tablename,$where,$id)
        {

									$this->db->where($where,$id);
									$this->db->delete($tablename);
									return true;

        }

         public function where_id($table_name,$id)
         {

									$condition = "id ='".$id."'";
									$this->db->select('*');
									$this->db->from($table_name);
									$this->db->where($condition);
									$query = $this->db->get();
									return $query->result();
									



        }
        
        
            public function where_id_like($table_name,$name,$id)
         {

								
									$this->db->select('*');
									$this->db->from($table_name);
								    $this->db->like($name, $id);
									$query = $this->db->get();
									return $query->result();
									



        }
        
        
        public function where_names($table_name,$where,$id){

									//$condition = "city_name ='".$id."'";
									$this->db->select('*');
									$this->db->from($table_name);
									$this->db->where($where,$id);
									$this->db->order_by('id','DESC');
									$query = $this->db->get();
									return $query->result();
									



        }
         
         
         public function where_in_names($table_name,$where,$id){

									//$condition = "city_name ='".$id."'";
									$this->db->select('*');
									$this->db->from($table_name);
									$this->db->where_in($where,$id);
									$this->db->order_by('id','DESC');
									$query = $this->db->get();
									return $query->result();
									



        }
         
         
         
         
        public function where_names_limit($table_name,$where,$id,$limit){

									//$condition = "city_name ='".$id."'";
									$this->db->select('*');
									$this->db->from($table_name);
									$this->db->where($where,$id);
									$this->db->order_by('id','DESC');
									if($limit!=0)
									{
									    	$this->db->limit($limit);
									}
								    $query = $this->db->get();
									return $query->result();
									



        }



        
         public function where_names_order_by($table_name,$where,$id,$order,$asc){

									//$condition = "city_name ='".$id."'";
									$this->db->select('*');
									$this->db->from($table_name);
									$this->db->where($where,$id);
									$this->db->order_by($order,$asc);
									$query = $this->db->get();
									return $query->result();
									



        }
        
        
          public function where_names_order_by_limit($table_name,$where,$id,$order,$asc){

									//$condition = "city_name ='".$id."'";
									$this->db->select('*');
									$this->db->from($table_name);
									$this->db->where($where,$id);
									$this->db->limit(3,0);
									$this->db->order_by($order,$asc);
									$query = $this->db->get();
									return $query->result();
									



        }
        
        public function where_names_two_order_by_limit($table_name,$where,$id,$where1,$id1,$order,$asc){

									//$condition = "city_name ='".$id."'";
									$this->db->select('*');
									$this->db->from($table_name);
									$this->db->where($where,$id);
									$this->db->where($where1,$id1);
									$this->db->limit(3,0);
									$this->db->order_by($order,$asc);
									$query = $this->db->get();
									return $query->result();
									



        }
    
       public function where_names_two_order_by($table_name,$where,$id,$where1,$id1,$order,$asc){

                  //$condition = "city_name ='".$id."'";
                  $this->db->select('*');
                  $this->db->from($table_name);
                  $this->db->where($where,$id);
                  $this->db->where($where1,$id1);
                  $this->db->order_by($order,$asc);
                  $query = $this->db->get();
                  return $query->result();
                  



        }

           public function where_names_three_order_by_new($table_name,$where,$id,$where1,$id1,$where2,$id2,$order,$asc){

                  //$condition = "city_name ='".$id."'";
                  $this->db->select('*');
                  $this->db->from($table_name);
                  $this->db->where($where,$id);
                  $this->db->where($where1,$id1);
                  $this->db->where($where2,$id2);
                  $this->db->order_by($order,$asc);
                  $query = $this->db->get();
                  return $query->result();
                  



        }
        
        
        
           public function where_names_four_order_by_new($table_name,$where,$id,$where1,$id1,$where2,$id2,$where3,$id3,$order,$asc){

                  //$condition = "city_name ='".$id."'";
                  $this->db->select('*');
                  $this->db->from($table_name);
                  $this->db->where($where,$id);
                  $this->db->where($where1,$id1);
                  $this->db->where($where2,$id2);
                  $this->db->where($where3,$id3);
                  $this->db->order_by($order,$asc);
                  $query = $this->db->get();
                  return $query->result();
                  



        }



          public function where_names_three_order_by($table_name,$where,$id,$where1,$id1,$where2,$id2){

                  //$condition = "city_name ='".$id."'";
                  $this->db->select('*');
                  $this->db->from($table_name);
                  $this->db->where($where,$id);
                  $this->db->where($where1,$id1);
                  $this->db->where($where2,$id2);
                 
                  $query = $this->db->get();
                  return $query->result();
                  



        }

        public function where_names_three_thried_where_in_order_by($table_name,$where,$id,$where1,$id1,$where2,$id2,$order,$asc){

                  //$condition = "city_name ='".$id."'";
                  
                 
                  
                  if(count($id2)>0)
                  {
                      
                
                  
                  $this->db->select('*');
                  $this->db->from($table_name);
                  $this->db->where($where,$id);
                  $this->db->where($where1,$id1);
                  $this->db->where_in($where2,$id2);
                  $this->db->order_by($order,$asc);
                  $query = $this->db->get();
                  return $query->result();
                  
                  }
                  else
                  {
                      return array();
                  }
                  



        }
         
         
         
         public function where_names_three_forth_where_in_order_by($table_name,$where,$id,$where1,$id1,$where2,$id2,$where3,$id3,$order,$asc){

                  //$condition = "city_name ='".$id."'";
                  
                 
                  
                  if(count($id2)>0)
                  {
                      
                
                  
                  $this->db->select('*');
                  $this->db->from($table_name);
                  $this->db->where($where,$id);
                  $this->db->where($where1,$id1);
                  $this->db->where_in($where2,$id2);
                  $this->db->where_in($where3,$id3);
                  $this->db->order_by($order,$asc);
                  $query = $this->db->get();
                  return $query->result();
                  
                  }
                  else
                  {
                      return array();
                  }
                  



        }



         public function where_names_two_order_by_where_in($table_name,$where,$id,$where1,$id1,$order,$asc){

                  //$condition = "city_name ='".$id."'";
                  $this->db->select('*');
                  $this->db->from($table_name);
                  $this->db->where($where,$id);
                  $this->db->where_in($where1,$id1);
                  $this->db->order_by($order,$asc);
                  $query = $this->db->get();
                  return $query->result();
                  



        }



        

       


        
        
}
