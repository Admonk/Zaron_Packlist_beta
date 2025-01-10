<?php
class Main_model extends CI_Model {
	
	 
       
    
        public function view_order_by($table_name,$order_name,$orderkey){

									
									$this->db->select('*');
									$this->db->from($table_name);
									
									$this->db->order_by($order_name,$orderkey);
									$query = $this->db->get();
									return $query->result();
									



        }
          public function order_last_count_mounth_year_customer($tablename)
        {
                                    
                                   $month=date('M');
                                   $year=date('Y');
                                   $query = $this->db->query("SELECT MAX(count) as id FROM $tablename  WHERE month='".$month."' AND year='".$year."' AND deleteid=0 AND order_base='-2'");
                                   $res= $query->num_rows();
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


 public function order_last_count_customer($tablename)
        {
          
                    $query = $this->db->query("SELECT MAX(customer_id) as customer_id FROM $tablename");
                    $res= $query->num_rows();
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
        
        public function order_last_count_mounth_year($tablename)
        {
                                    
                                   $month=date('M');
                                   $year=date('Y');
                                   $query = $this->db->query("SELECT MAX(count) as id FROM $tablename  WHERE month='".$month."' AND year='".$year."' AND order_base NOT IN ('-2') AND deleteid=0");
                                   $res= $query->num_rows();
                                   return $query->result();

                      
        }
        
        public function order_last_count_users($tablename,$userid)
        {
          
          
                                   $query = $this->db->query("SELECT count_id,id FROM $tablename  WHERE user_id='".$userid."' ORDER BY id DESC LIMIT 0,1");
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
        
        
          public function update_commen_where_two($data,$where,$where1,$id1,$tablename)
        {
          


									$id=$data['get_id'];
                       	            unset($data['get_id']);
									$this->db->where($where,$id);
									$this->db->where($where1,$id1);
									$this->db->update($tablename,$data);
									return true;

                      
        }
        
        
           public function update_commen_where_three($data,$where,$where1,$id1,$where2,$id2,$tablename)
        {
          


									$id=$data['get_id'];
                       	            unset($data['get_id']);
									$this->db->where($where,$id);
									$this->db->where($where1,$id1);
									$this->db->where($where2,$id2);
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

                
              $update = $this->db->query("UPDATE $tablename SET deleteid='25' WHERE id='".$id."'");
              return true;

        }
        
	public function approvalupdate($id,$tablename,$status)
        {

                
              $update = $this->db->query("UPDATE $tablename SET order_base='".$status."' WHERE id='".$id."'");
              return true;

        }
        
        
         public function cancelupdate($id,$tablename)
        {

                
              $update = $this->db->query("UPDATE $tablename SET order_base='-1',reason='Cancelled', cancelled_date = '".date('Y-m-d')."'  WHERE id='".$id."'");
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

								//	$this->db->where_in('id',$id);
								//	$this->db->delete($tablename);
									return true;

        }
        
         public function delete_where($tablename,$where,$id)
        {

								//	$this->db->where_in($where,$id);
								//	$this->db->delete($tablename);
									return true;

        }
        
         public function delete_where_new($tablename,$where,$id)
        {

									$this->db->where_in($where,$id);
									$this->db->delete($tablename);
									return true;

        }
        
         public function delete_where_by($tablename,$where,$id)
        {


                                   
									//$this->db->where($where,$id);
									//$this->db->delete($tablename);
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
        
        
        public function where_names($table_name,$where,$id)
        {

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
        
        
        
        public function where_three_names_limit($table_name,$where,$id,$where1,$id1,$where2,$id2,$limit){

									//$condition = "city_name ='".$id."'";
									$this->db->select('*');
									$this->db->from($table_name);
									$this->db->where($where,$id);
									$this->db->where($where1,$id1);
									$this->db->where($where2,$id2);
									$this->db->order_by('id','DESC');
									if($limit!=0)
									{
									    	$this->db->limit($limit);
									}
								    $query = $this->db->get();
									return $query->result();
									



        }
        
        

   
        public function where_names_limit_base($table_name,$where,$id,$limit){

									//$condition = "city_name ='".$id."'";
									$this->db->select('*');
									$this->db->from($table_name);
									$this->db->where($where,$id);
									$this->db->where('deleteid','0');
									$this->db->order_by('id','DESC');
									$this->db->limit($limit);
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
        
        
        public function where_names_five_order_by_new($table_name,$where,$id,$where1,$id1,$where2,$id2,$where3,$id3,$where4,$id4,$order,$asc){

                  //$condition = "city_name ='".$id."'";
                  $this->db->select('*');
                  $this->db->from($table_name);
                  $this->db->where($where,$id);
                  $this->db->where($where1,$id1);
                  $this->db->where($where2,$id2);
                  $this->db->where($where3,$id3);
                  $this->db->where($where4,$id4);
                  $this->db->order_by($order,$asc);
                  $query = $this->db->get();
                  return $query->result();
                  



        }

 public function where_names_six_order_by_new($table_name,$where,$id,$where1,$id1,$where2,$id2,$where3,$id3,$where4,$id4,$where5,$id5,$order,$asc){

                  //$condition = "city_name ='".$id."'";
                  $this->db->select('*');
                  $this->db->from($table_name);
                  $this->db->where($where,$id);
                  $this->db->where($where1,$id1);
                  $this->db->where($where2,$id2);
                  $this->db->where($where3,$id3);
                  $this->db->where($where4,$id4);
                  $this->db->where($where5,$id5);
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
                  
                 
                  
                 
                      
                
                  
                  $this->db->select('*');
                  $this->db->from($table_name);
                  $this->db->where($where,$id);
                  $this->db->where($where1,$id1);
                  $this->db->where_in($where2,$id2);
                  $this->db->order_by($order,$asc);
                  $query = $this->db->get();
                  return $query->result();
                  
                 
                  



        }
        
         public function where_names_four_forth_where_in_order_by($table_name,$where,$id,$where1,$id1,$where2,$id2,$where3,$id3,$order,$asc){

                  //$condition = "city_name ='".$id."'";
                  
                 
                  
                 
                      
                
                  
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
         
         
         
         public function where_names_three_forth_where_in_order_by($table_name,$where,$id,$where1,$id1,$where2,$id2,$where3,$id3,$order,$asc){

                  //$condition = "city_name ='".$id."'";
                  
                 
                  
                  
                
                  
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


 public function where_names_three_order_by_betweendate($table_name,$where,$id,$where1,$id1,$where2,$id2,$formdate,$todate){

                  //$condition = "city_name ='".$id."'";
                  $this->db->select('*');
                  $this->db->from($table_name);
                  //$this->db->where($where,$id);
                  $this->db->where($where1,$id1);
                  $this->db->where($where2,$id2);
                  $this->db->where('create_date >=', $formdate);
                  $this->db->where('create_date <=', $todate);
                 
                  $query = $this->db->get();
                  return $query->result();
                  



        }



        public function where_names_three_thried_where_in_order_by_betweendate($table_name,$where,$id,$where1,$id1,$where2,$id2,$order,$asc,$formdate,$todate){

                  //$condition = "city_name ='".$id."'";
                  
                 
                  
                  
                
                  
                  $this->db->select('*');
                  $this->db->from($table_name);
                 // $this->db->where($where,$id);
                  $this->db->where($where1,$id1);
                  $this->db->where_in($where2,$id2);
                  $this->db->where('create_date >=', $formdate);
                  $this->db->where('create_date <=', $todate);
                  $this->db->order_by($order,$asc);
                  $query = $this->db->get();
                  return $query->result();
                  
                



        }


          public function where_names_two_order_by_betweendate($table_name,$where,$id,$where1,$id1,$order,$asc,$formdate,$todate){

                  //$condition = "city_name ='".$id."'";
                  $this->db->select('*');
                  $this->db->from($table_name);
                 // $this->db->where($where,$id);
                  $this->db->where($where1,$id1);
                  $this->db->where('create_date >=', $formdate);
                  $this->db->where('create_date <=', $todate);
                  $this->db->order_by($order,$asc);
                  $query = $this->db->get();
                  return $query->result();
                  



        }
        

         public function where_names_two_order_by_limit_page($table_name,$where,$id,$where1,$id1,$order,$asc,$page,$limit,$search, $category_ser){


            // $limit = 10; // Number of records per page
            $offset = ($page - 1) * $limit;
            
            $this->db->select('*');
            $this->db->from($table_name);
            $this->db->where($where, $id);
            $this->db->where($where1, $id1);
            if(isset($page) && $page>0){
                $this->db->limit($limit, $offset); 
            }

            if(isset($category_ser) && $category_ser > 0){
                if(isset($search) && !empty($search)){
                    $this->db->like('categories', $search); 
                }
            }else{
                if(isset($search) && !empty($search)){
                    $this->db->like('product_name', $search); 
                }
            }
           
           // Applying the correct offset and limit
            $this->db->order_by($order, $asc);
            $query = $this->db->get();
            
        return $query->result();

        }

      public function get_total_product_count($table_name, $where, $id, $where1, $id1, $search, $category_ser)
        {
            $this->db->select('COUNT(*) as total_count');
            $this->db->from($table_name);
            $this->db->where($where, $id);
            $this->db->where($where1, $id1);

            // if(isset($search) && !empty($search)){
            //     $this->db->like('product_name', $search); 
            // }
            if(isset($category_ser) && $category_ser > 0){
                if(isset($search) && !empty($search)){
                    $this->db->like('categories', $search); 
                }
            }else{
                if(isset($search) && !empty($search)){
                    $this->db->group_start();
                    $this->db->like('product_name', $search);
                    // $this->db->or_like('categories', $search);
                    $this->db->group_end();
                }
                
            }

            $query = $this->db->get();
            $result = $query->row_array();

            return $result['total_count'];
        }

         public function insert_commen_return_id($data, $tablename)
        {

            unset($data['pagename']);
            unset($data['tablename']);

            $this->db->where('id', $data['id']);
            $query = $this->db->get($tablename);

            if ($query->num_rows() > 0) {
                $id = $data['id'];

                $this->db->where('id', $id);
                $this->db->update($tablename, $data);
                return $id;
            } else {

                $this->db->insert($tablename, $data);
                return $this->db->insert_id();
            }
        }

        // public function where_sub_categories_product_mapping($table_name, $where, $id, $where1, $id1, $order, $asc, $page, $search) {
        //     $limit = 10; // Number of records per page
        //     $page = isset($page) ? $page : 1; 
        //     $offset = ($page - 1) * $limit;
        
        //     $this->db->select('a.*, IF(b.sub_categories IS NOT NULL, b.sub_categories, a.product_name) AS display_name');
        //     $this->db->from($table_name . ' AS a');
        //     $this->db->where($where, $id);
        //     $this->db->where($where1, $id1);
        
        //     $this->db->join('(SELECT DISTINCT sub_categories AS sub_categories FROM product_list WHERE sub_categories IS NOT NULL) AS b', 'a.sub_categories = b.sub_categories', 'left');
        //     // $this->db->where('a.deleteid', '0');
        //     // $this->db->where('a.status', '1');
        
        //     // Additional condition from $resultinw
        //     $this->db->join('order_product_list_process AS c', 'c.product_id = a.id', 'left');
        //     $this->db->where('(c.sub_product_id = 0 OR c.sub_product_id IS NULL)');
        //     $this->db->where('(c.tile_material_id = 0 OR c.tile_material_id IS NULL)');
        
        //     if (isset($search) && !empty($search)) {
        //         // Apply the CASE logic in a WHERE condition rather than in LIKE directly
        //         $this->db->where('(b.sub_categories IS NOT NULL AND b.sub_categories LIKE "%' . $search . '%") OR (b.sub_categories IS NULL AND a.product_name LIKE "%' . $search . '%")');
        //     }
        //     // echo $offset;exit();
        
        //     if (isset($page) && $page > 0) {
        //         $this->db->limit($limit, $offset);
        //     }
        
        //     $this->db->group_by('display_name'); // Group by display_name to get distinct display names
        
        //     $this->db->order_by('a.' . $order, $asc);
        //     $query = $this->db->get();
        
        //     return $query->result();
        //     // SELECT `a`.*, IF(b.sub_categories IS NOT NULL, `b`.`sub_categories`, a.product_name) AS display_name FROM `product_list` AS `a` LEFT JOIN (SELECT DISTINCT sub_categories AS sub_categories FROM product_list WHERE sub_categories IS NOT NULL) AS b ON `a`.`sub_categories` = `b`.`sub_categories` LEFT JOIN `order_product_list_process` AS `c` ON `c`.`product_id` = `a`.`id` WHERE `a`.`deleteid` = '0' AND `a`.`status` = '1' AND `a`.`deleteid` = '0' AND `a`.`status` = '1' AND (`c`.`sub_product_id` =0 OR `c`.`sub_product_id` IS NULL) AND (`c`.`tile_material_id` =0 OR `c`.`tile_material_id` IS NULL) GROUP BY `display_name` ORDER BY `a`.`id` DESC LIMIT 10

        //     //  echo $this->db->last_query();
        //     //  exit();

        // }

         public function where_sub_categories_product_mapping($table_name, $where, $id, $where1, $id1, $order, $asc, $page, $search) {
            $limit = 10; // Number of records per page
            $page = isset($page) ? $page : 1; 
            $offset = ($page - 1) * $limit;
        
            $this->db->select('a.*, IF(b.sub_categories IS NOT NULL AND b.sub_categories != "" , b.sub_categories, a.product_name) AS display_name');
            $this->db->from($table_name . ' AS a');
            $this->db->where($where, $id);
            $this->db->where($where1, $id1);
        
            $this->db->join('(SELECT DISTINCT sub_categories AS sub_categories FROM product_list WHERE deleteid = 0 AND sub_categories IS NOT NULL AND sub_categories != "") AS b', 'a.sub_categories = b.sub_categories', 'left');
        
            // Additional condition from $resultinw
            $this->db->join('order_product_list_process AS c', 'c.product_id = a.id', 'left');
            $this->db->where('(c.sub_product_id = 0 OR c.sub_product_id IS NULL)');
            $this->db->where('(c.tile_material_id = 0 OR c.tile_material_id IS NULL)');
        
            if (isset($search) && !empty($search)) {
                // Apply the CASE logic in a WHERE condition rather than in LIKE directly
                $this->db->where('(b.sub_categories IS NOT NULL AND b.sub_categories LIKE "%' . $search . '%") OR (b.sub_categories IS NULL AND a.product_name LIKE "%' . $search . '%")');
            }
        
            if (isset($page) && $page > 0) {
                $this->db->limit($limit, $offset);
            }
        
            $this->db->group_by('display_name'); // Group by display_name to get distinct display names
        
            $this->db->order_by('a.' . $order, $asc);
            $query = $this->db->get();
        
            return $query->result();
        }
        
        

        public function get_ExistingProduct($type,$id,$subCategoryName, $products) {
            $validate = 0;
            foreach ($products as $product) {
                if($type == 'add'){

                    $query = "SELECT id FROM sub_categories WHERE deleteid=0 AND FIND_IN_SET(?, product)";
                    $result = $this->db->query($query, array($product));
                    
                    if ($result && $result->num_rows() > 0) {
                        $validate++;
                    }

                }else if($type == 'update'){

                    $query = "SELECT id FROM sub_categories WHERE NOT id = ? AND deleteid=0 AND FIND_IN_SET(?, product)";
                    $result = $this->db->query($query, array($id, $product));
                    
                    if ($result && $result->num_rows() > 0) {
                        $validate++;
                    }

                }else{
                    $validate = 0;
                }
            }
            return $validate;
        }


 
 public function select_where_names_row($select,$table_name,$where,$id,$where1,$deleteid)
        {

                  //$condition = "city_name ='".$id."'";
                  $this->db->select($select);
                  $this->db->from($table_name);
                  $this->db->where($where,$id);
                  $this->db->where($where1,$deleteid);
                  $this->db->order_by('id','DESC');
                  $query = $this->db->get();
                  return $query->row();
                  

        } 

        public function where_names_row($select,$table_name,$where,$id)
        {

                  //$condition = "city_name ='".$id."'";
                  $this->db->select($select);
                  $this->db->from($table_name);
                  $this->db->where($where,$id);
                  $this->db->order_by('id','DESC');
                  $query = $this->db->get();
                  return $query->row();
                  

        } 

          public function update_where($tablename,$where,$id,$data)
        {
          

                $this->db->where($where,$id);
                $this->db->update($tablename,$data);
                return true;

                      
        }

        public function insert_vehicle_category_routes($vehicle_category_id, $route_ids)
        {
            $vehicle_category = $this->db->get_where('vehicle_categories', ['id' => $vehicle_category_id])->row();
            if ($vehicle_category) {
                $existing_route_ids = json_decode($vehicle_category->route_ids, true);
                $new_route_ids = array_merge($existing_route_ids, $route_ids);
                $this->db->where('id', $vehicle_category_id)->update('vehicle_categories', ['route_ids' => json_encode($new_route_ids)]);
            }
        }

        public function update_vehicle_category_routes($vehicle_category_id, $route_ids)
        {
            $this->db->where('id', $vehicle_category_id)->update('vehicle_categories', ['route_ids' => json_encode($route_ids)]);
        }

        public function get_localValueByRoutesId($deleteid, $route, $cate) {
            $query = "SELECT local_rate FROM vehicle_categories WHERE deleteid = ? AND id = ?";
            $result = $this->db->query($query, array($deleteid, $cate));
            if ($result && $result->num_rows() > 0) {
                $row = $result->row();
                return $row->local_rate;
            } else {
                return null;
            }
        }

        public function get_longValueByRoutesId($deleteid, $route, $cate) {
            $query = "SELECT long_rate FROM vehicle_categories WHERE deleteid = ? AND id = ? ";
            $result = $this->db->query($query, array($deleteid, $cate));
            if ($result && $result->num_rows() > 0) {
                $row = $result->row();
                return $row->long_rate;
            } else {
                return null;
            }
        }
        
        // AA-Rent Module

        public function two_where_in_names($table_name,$where,$id,$where1,$id1){

            //$condition = "city_name ='".$id."'";
            $this->db->select('*');
            $this->db->from($table_name);
            $this->db->where_in($where,$id);
            $this->db->where($where1,$id1);
            $this->db->order_by('id','DESC');
            $query = $this->db->get();
            return $query->result();
          }
        
}
