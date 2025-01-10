<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
             error_reporting(0);
             parent::__construct();
             $this->load->model('Admin/Auth');
               $this->load->model('Main_model');

             if(isset($this->session->userdata['logged_in']))
             {


	           $sess_array =$this->session->userdata['logged_in'];
			   $userid=$sess_array['userid'];
			   $email=$sess_array['email'];
			   $this->userid=$userid;
			   $this->user_mail=$email;

			   
			}
          
    }
   
	public function index()
	{
		          

		         
                  
							            if(isset($this->session->userdata['logged_in']))
							            {
							                
							            	 
                                             $data['active_base']='dashboard';
										     $data['active']='dashboard';
								             $data['title']    = 'Dashboard';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
								             
								              $formdate=date('Y-m-d');
                                              $todate=date('Y-m-d');
								              
								             
								              $lastmonthfrom= date('Y-m-d', strtotime("-1 days"));
								              $lastmonthto=date('Y-m-d', strtotime("-1 days"));
								              
								              
								              
								              
								              
								              
								              
                    	                   $sql="";
                                          if($this->session->userdata['logged_in']['access']=='16')
                    					  {
                    							            	     
                    							            $sales_group_id=array();	     
                    							            $sales_group = $this->Main_model->where_names_two_order_by('sales_group','sales_group_head',$this->userid,'deleteid','0','id','ASC'); 	
                    							            foreach($sales_group as $val)
                    							            {
                    							                $sales_group_id[]=$val->id;
                    							            }
                    							            
                    							            
                    							            $sales_group_idval="'".implode("','",$sales_group_id)."'";
                    							            $sql=' AND a.sales_group IN ('.$sales_group_idval.')';
                    							          
                    							            	     
                    					  }
                    					  
                    					  
                    					  if($this->session->userdata['logged_in']['access']=='17')
                    					  {
                    							            	     
                    							            
                    							            $sql=' AND a.user_id="'.$this->userid.'"';
                    							          
                    							            	     
                    					  }
                    					  
                    					  
                    					  if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                    					  {
                    							            	     
                    							                $sales_team_id = array($this->userid);
                                                                $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                                                                foreach ($resultsales_team as $values) {
                                                                    $sales_team_id[] = $values->sales_member_id;
                                                                }
                                                               
                                                                $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
                                                               
                                                                $sql = ' AND  a.user_id IN (' . $sales_team_id . ')';
                    							            
                    							            	     
                    					  }
                                     
								              
								              



                                              $data['toatalvalue']=0;
								              $resulttotalsale=$this->db->query("SELECT SUM(a.bill_total) as toatalvalue FROM orders_process as a   WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0   AND a.order_base>0 $sql");
                 	                          
                 	                          $resulttotalsale=$resulttotalsale->result();
                 	                          foreach($resulttotalsale as $totsale)
                 	                          {
                 	                               $data['toatalvalue']=round($totsale->toatalvalue+$totsale->tcsamount);
                 	                          }
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          $data['toatalvalueenc']=0;
								              $resulttotalsale=$this->db->query("SELECT SUM(a.bill_total) as toatalvalue FROM orders as a   WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0  AND a.order_base>0 $sql");
                 	                          
                 	                          $resulttotalsale=$resulttotalsale->result();
                 	                          foreach($resulttotalsale as $totsale)
                 	                          {
                 	                               $data['toatalvalueenc']=round($totsale->toatalvalue+$totsale->tcsamount);
                 	                          }
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          $data['toatalvaluelsenc']=0;
                 	                          $resulttotalsalels=$this->db->query("SELECT SUM(a.bill_total) as toatalvalue FROM orders as a   WHERE a.create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."'  AND a.deleteid=0    AND a.order_base>0 $sql");
                 	                          
                 	                          $resulttotalsalels=$resulttotalsalels->result();
                 	                          foreach($resulttotalsalels as $totsalels)
                 	                          {
                 	                               $data['toatalvaluelsenc']=round($totsalels->toatalvalue+$totsalels->tcsamount);
                 	                          }
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          $data['toatalvalueqty']=0;
								              $resulttotalsale=$this->db->query("SELECT SUM(a.bill_total) as toatalvalue FROM orders_quotation as a   WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0   AND a.order_base>0 $sql");
                 	                          
                 	                          $resulttotalsale=$resulttotalsale->result();
                 	                          foreach($resulttotalsale as $totsale)
                 	                          {
                 	                               $data['toatalvalueqty']=round($totsale->toatalvalue+$totsale->tcsamount);
                 	                          }
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          $data['toatalvaluelsqty']=0;
                 	                          $resulttotalsalels=$this->db->query("SELECT SUM(a.bill_total) as toatalvalue FROM orders_quotation as a   WHERE a.create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."'  AND a.deleteid=0   AND a.order_base>0 $sql");
                 	                          
                 	                          $resulttotalsalels=$resulttotalsalels->result();
                 	                          foreach($resulttotalsalels as $totsalels)
                 	                          {
                 	                               $data['toatalvaluelsqty']=round($totsalels->toatalvalue+$totsalels->tcsamount);
                 	                          }
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          $data['toatalvaluels']=0;
                 	                          $resulttotalsalels=$this->db->query("SELECT SUM(a.bill_total) as toatalvalue FROM orders_process as a   WHERE a.create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."'  AND a.deleteid=0  AND a.order_base>0 $sql");
                 	                          
                 	                          $resulttotalsalels=$resulttotalsalels->result();
                 	                          foreach($resulttotalsalels as $totsalels)
                 	                          {
                 	                               $data['toatalvaluels']=round($totsalels->toatalvalue+$totsalels->tcsamount);
                 	                          }
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                           $data['toatalvaluedd']=0;
                 	                           $resulttotalsaledd=$this->db->query("SELECT SUM(a.bill_total) as toatalvalue FROM orders_process as a   WHERE a.trip_end_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0  AND a.order_base>0  $sql");
                 	                          
                 	                          $resulttotalsaledd=$resulttotalsaledd->result();
                 	                          foreach($resulttotalsaledd as $totsaledd)
                 	                          {
                 	                               $data['toatalvaluedd']=round($totsaledd->toatalvalue+$totsaledd->tcsamount);
                 	                          }
                 	                          
                 	                          $data['toatalvaluelsdd']=0;
                 	                          $resulttotalsalelsdd=$this->db->query("SELECT SUM(a.bill_total) as toatalvalue FROM orders_process as a   WHERE a.trip_end_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."'  AND a.deleteid=0   AND a.order_base>0 $sql");
                 	                          
                 	                          $resulttotalsalelsdd=$resulttotalsalelsdd->result();
                 	                          foreach($resulttotalsalelsdd as $totsalelsdd)
                 	                          {
                 	                               $data['toatalvaluelsdd']=round($totsalelsdd->toatalvalue+$totsalelsdd->tcsamount);
                 	                          }
								              
								              
								              
								              
								             
								              $data['totalcount']=0;
								              $resulttotalcount=$this->db->query("SELECT COUNT(a.id) as totalcount FROM orders_process as a WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0  AND a.order_base>0 $sql");
                 	                          $resulttotalcount=$resulttotalcount->result();
                 	                          foreach($resulttotalcount as $totcount)
                 	                          {
                 	                               $data['totalcount']=$totcount->totalcount;
                 	                          }
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          $data['totalcountenc']=0;
								              $resulttotalcount=$this->db->query("SELECT COUNT(a.id) as totalcount FROM orders as a WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0  AND a.order_base>0 $sql");
                 	                          $resulttotalcount=$resulttotalcount->result();
                 	                          foreach($resulttotalcount as $totcount)
                 	                          {
                 	                               $data['totalcountenc']=$totcount->totalcount;
                 	                          }
								             
								             
								             
								             
								              $data['totalcountlastmonthenc']=0;
								              $resulttotalcountlm=$this->db->query("SELECT COUNT(a.id) as totalcount FROM orders as a WHERE a.create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."'  AND a.deleteid=0 AND a.order_base>0 $sql");
                 	                          $resulttotalcountlm=$resulttotalcountlm->result();
                 	                          foreach($resulttotalcountlm as $totcountm)
                 	                          {
                 	                               $data['totalcountlastmonthenc']=$totcountm->totalcount;
                 	                          }
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                            $data['totalcountqty']=0;
								              $resulttotalcount=$this->db->query("SELECT COUNT(a.id) as totalcount FROM orders_quotation as a WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0 AND a.order_base>0 $sql");
                 	                          $resulttotalcount=$resulttotalcount->result();
                 	                          foreach($resulttotalcount as $totcount)
                 	                          {
                 	                               $data['totalcountqty']=$totcount->totalcount;
                 	                          }
								             
								             
								             
								             
								              $data['totalcountlastmonthqty']=0;
								              $resulttotalcountlm=$this->db->query("SELECT COUNT(a.id) as totalcount FROM orders_quotation as a WHERE a.create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."'  AND a.deleteid=0 AND a.order_base>0 $sql");
                 	                          $resulttotalcountlm=$resulttotalcountlm->result();
                 	                          foreach($resulttotalcountlm as $totcountm)
                 	                          {
                 	                               $data['totalcountlastmonthqty']=$totcountm->totalcount;
                 	                          }
                 	                          
                 	                          
								             
								             
								              $data['totalcountlastmonth']=0;
								              $resulttotalcountlm=$this->db->query("SELECT COUNT(a.id) as totalcount FROM orders_process as a WHERE a.create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."'  AND a.deleteid=0 AND a.order_base>0 $sql");
                 	                          $resulttotalcountlm=$resulttotalcountlm->result();
                 	                          foreach($resulttotalcountlm as $totcountm)
                 	                          {
                 	                               $data['totalcountlastmonth']=$totcountm->totalcount;
                 	                          }
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          $data['totalcountdd']=0;
								              $resulttotalcount=$this->db->query("SELECT COUNT(a.id) as totalcount FROM orders_process as a WHERE a.trip_end_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0 AND a.order_base>0 $sql");
                 	                          $resulttotalcount=$resulttotalcount->result();
                 	                          foreach($resulttotalcount as $totcount)
                 	                          {
                 	                               $data['totalcountdd']=$totcount->totalcount;
                 	                          }
								             
								             
								             
								              $data['totalcountlastmonthdd']=0;
								              $resulttotalcountlm=$this->db->query("SELECT COUNT(a.id) as totalcount FROM orders_process as a WHERE a.trip_end_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."'  AND a.deleteid=0 AND a.order_base>0 $sql");
                 	                          $resulttotalcountlm=$resulttotalcountlm->result();
                 	                          foreach($resulttotalcountlm as $totcountm)
                 	                          {
                 	                               $data['totalcountlastmonthdd']=$totcountm->totalcount;
                 	                          }
								             
								             
								             
								             
								               
								             
								             
								             
								            
								         $formdate=date('Y-m-d');           
								         $resultoverall=$this->db->query("SELECT COUNT(a.id) as totalcount  FROM orders as a  WHERE  a.create_date < '".$formdate."' AND a.order_base>0 AND a.deleteid=0 $sql");
                                         $resultoverall=$resultoverall->result();
                                         foreach($resultoverall as $valdoo)
                                         { 
                                             $totalcount=$valdoo->totalcount;
                                             
                                         }
                                         
                                         
                                         $convetedtotal=$this->db->query("SELECT COUNT(a.id) as totalcount  FROM orders_process as a  WHERE  a.create_date <'".$formdate."' AND a.order_base>0 AND a.deleteid=0 $sql");
                                         $convetedtotal=$convetedtotal->result();
                                         foreach($convetedtotal as $con)
                                         { 
                                             $totalconvert=$con->totalcount;
                                             
                                         }
                                         
                                         
                                         $billingtotal=$this->db->query("SELECT COUNT(a.id) as totalcount  FROM orders_process as a  WHERE  a.order_base>0  AND a.create_date <'".$formdate."' AND a.deleteid=0 $sql");
                                         $billingtotal=$billingtotal->result();
                                         foreach($billingtotal as $bill)
                                         { 
                                             $totalbilling=$bill->totalcount;
                                             
                                         }
                                         
                                         
                                          $totalmissing=$totalconvert-$totalcount;
                                          $totalbillingpending=$totalconvert-$totalbilling;
                                          
								             
								             
								             
								             
								             
								             
								             
								             
								         $today_resultoverall=$this->db->query("SELECT COUNT(a.id) as totalcount  FROM orders as a WHERE  a.create_date='".$formdate."' AND a.order_base>0 AND a.deleteid=0 $sql");
                                         $today_resultoverall=$today_resultoverall->result();
                                         foreach($today_resultoverall as $today_valdoo)
                                         { 
                                             $today_totalcount=$today_valdoo->totalcount;
                                             
                                         }
                                         
                                         
                                         $today_convetedtotal=$this->db->query("SELECT COUNT(a.id) as totalcount  FROM orders_process as a WHERE  a.create_date='".$formdate."' AND a.order_base>0 AND a.deleteid=0 $sql");
                                         $today_convetedtotal=$today_convetedtotal->result();
                                         foreach($today_convetedtotal as $today_con)
                                         { 
                                             $today_totalconvert=$today_con->totalcount;
                                             
                                         }
                                         
                                         
                                         $today_billingtotal=$this->db->query("SELECT COUNT(a.id) as totalcount  FROM orders_process as a  WHERE  a.create_date='".$formdate."' AND a.order_base>0  AND a.deleteid=0 $sql");
                                         $today_billingtotal=$today_billingtotal->result();
                                         foreach($today_billingtotal as $today_bill)
                                         { 
                                             $today_totalbilling=$today_bill->totalcount;
                                             
                                         }
                                         
                                         
                                          $today_totalmissing=$today_totalcount-$today_totalconvert;
                                          $today_totalbillingpending=$today_totalconvert-$today_totalbilling;
                                          
                                          
                                          
                                          
                                         
                                          
                                         $overalltotalcount= $totalcount+$today_totalcount;
                                         $overalltotalconvert= $totalconvert+$today_totalconvert;
                                         $overalltotalmissing= $totalmissing+$today_totalmissing;
                                         $overalltotalbilling= $totalbilling+$today_totalbilling;
                                         $overalltotalbillingpending= $totalbillingpending+$today_totalbillingpending;
                                         
                                          
                                          
                                          
                                          $convertion=0;
                                          $missed=0;
                                          $pending=0;
                                          $billing=0;
                                          
                                          
                                          
                                          if($overalltotalcount!=0 && $overalltotalconvert!=0)
                                          {
                                              
                                              
                                               $convertion=round($overalltotalcount/$overalltotalconvert*100,1);
                                          
                                              
                                          }
                                          
                                          
                                         
                                          
                                          if($overalltotalmissing!=0 && $overalltotalcount!=0)
                                          {
                                            if($overalltotalcount==1)
                                            {
                                                $missed=99;
                                            }
                                            else
                                            {
                                                $missed=round($overalltotalmissing/$overalltotalcount*100,1);
                                            }
                                            
                                            
                                          }
                                          if($overalltotalbillingpending!=0 && $overalltotalcount!=0)
                                          {
                                            
                                           $pending=round($overalltotalbillingpending/$overalltotalcount*100,1);
                                          }
                                         
                                          if($overalltotalbilling!=0 && $overalltotalcount!=0)
                                          {
                                            
                                           $billing=round($overalltotalbilling/$overalltotalcount*100,1);
                                          }
                                            
								             
								             
								             
								        $data['missed']=str_replace('-','',$missed);     
								        $data['won']=$convertion;       
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
								             
						                     
						                    if($this->session->userdata['logged_in']['access']=='12' || $this->session->userdata['logged_in']['access']=='11') // Sales Team
							                {
							                     $this->load->view('dashboard/sales_dashboard',$data);
							                }
							                else if($this->session->userdata['logged_in']['access']=='17') // Sales Team Sub
							                {
							                       $this->load->view('dashboard/sales_dashboard',$data);
							                }
							                else if($this->session->userdata['logged_in']['access']=='20') //Sales Head
							                {
							                      redirect('index.php/order/orders_list');
							                }
							                else if($this->session->userdata['logged_in']['access']=='6') // Transpot
							                {
							                      redirect('index.php/order/transport_orders_list');
							                }
							                else if($this->session->userdata['logged_in']['access']=='4') // purchase
							                {
							                      redirect('index.php/purchase/purchase_list');
							                }
							                else if($this->session->userdata['logged_in']['access']=='13') // Driver
							                {
							                      redirect('index.php/order/driver_orders_list');
							                }
                                            else if($this->session->userdata['logged_in']['access']=='30') // Driver
                                            {
                                                  redirect('index.php/order/driver_orders_list');
                                            }
							                else if($this->session->userdata['logged_in']['access']=='7') // Production
							                {
							                      redirect('index.php/order/production_orders_list');
							                }
							                else if($this->session->userdata['logged_in']['access']=='10') // md
							                {
							                      $this->load->view('dashboard/index',$data);
							                }
							                else if($this->session->userdata['logged_in']['access']=='21') // md
							                {
							                      redirect('index.php/order/pick_up_loading');
							                }
							                else if($this->session->userdata['logged_in']['access']=='25') // md
							                {
							                      redirect('index.php/order/driver_open_orders_list');
							                }
							                else
							                {
							                      $this->load->view('dashboard/index',$data);
							                }
						                     
						                     
						                     
						                     
						                     
						                     
						                   


										}
										else
										{

										      redirect('index.php/adminmain');

										}                    

                  


	}
    public function monthlysaleschart()
	{
	    
	    
	    $year = date('Y'); 
	    $out = array();
	    
	    
	                   $sql="";
                      if($this->session->userdata['logged_in']['access']=='16')
					  {
							            	     
							            $sales_group_id=array();	     
							            $sales_group = $this->Main_model->where_names_two_order_by('sales_group','sales_group_head',$this->userid,'deleteid','0','id','ASC'); 	
							            foreach($sales_group as $val)
							            {
							                $sales_group_id[]=$val->id;
							            }
							            
							            
							            $sales_group_idval="'".implode("','",$sales_group_id)."'";
							            $sql=' AND a.sales_group IN ('.$sales_group_idval.')';
							          
							            	     
					  }
					  
					  
					  if($this->session->userdata['logged_in']['access']=='17')
					  {
							            	     
							            
							            $sql=' AND a.user_id="'.$this->userid.'"';
							          
							            	     
					  }
					  
					  
					  if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
					  {
							            	     
							                                     $sales_team_id = array($this->userid);
                                                                $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                                                                foreach ($resultsales_team as $values) {
                                                                    $sales_team_id[] = $values->sales_member_id;
                                                                }
                                                               
                                                                $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
                                                               
                                                                $sql = ' AND  a.user_id IN (' . $sales_team_id . ')';
							          
							            	     
					  }
                 
	    
	    
	    
	    for ($month = 1; $month <= 12; $month ++)
	    {
	        
	            
	        
				 $resulttotalcountlm=$this->db->query("SELECT SUM(a.bill_total) as total  FROM orders_process as a  WHERE month(a.create_date)='$month' AND year(a.create_date)='$year'  AND a.deleteid=0  AND a.order_base>0  $sql");
                 $resulttotalcountlm=$resulttotalcountlm->result();
                 $out[]=round($resulttotalcountlm[0]->total,2);
                	                        
	    
	    }
	    
	    echo json_encode($out);
	    
	    
	}
	
	public function monthlysaleschartpie()
	{
	    
 	           
	                   $formdate=$_GET['fromdate'];
                       $todate=$_GET['todate'];
                 
                 
                 $out=array();
                 
                    $sql="";
                      if($this->session->userdata['logged_in']['access']=='16')
					  {
							            	     
							            $sales_group_id=array();	     
							            $sales_group = $this->Main_model->where_names_two_order_by('sales_group','sales_group_head',$this->userid,'deleteid','0','id','ASC'); 	
							            foreach($sales_group as $val)
							            {
							                $sales_group_id[]=$val->id;
							            }
							            
							            
							            $sales_group_idval="'".implode("','",$sales_group_id)."'";
							            $sql=' AND sales_group IN ('.$sales_group_idval.')';
							          
							            	     
					  }
					  
					  
					  if($this->session->userdata['logged_in']['access']=='17')
					  {
							            	     
							            
							            $sql=' AND user_id="'.$this->userid.'"';
							          
							            	     
					  }
					  
					  
					   if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
					  {
							            	     
							                                     $sales_team_id = array($this->userid);
                                                                $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                                                                foreach ($resultsales_team as $values) {
                                                                    $sales_team_id[] = $values->sales_member_id;
                                                                }
                                                               
                                                                $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
                                                               
                                                                $sql = ' AND  user_id IN (' . $sales_team_id . ')';
							          
							            	     
					  }
                 
                 
                 

                 $orders_process_count=$this->db->query("SELECT id as orders_process_count  FROM orders_process  WHERE  create_date BETWEEN '".$formdate."' AND '".$todate."'  AND order_base>0 AND deleteid=0 $sql");
                 $orders_process_count=$orders_process_count->result();
                 
                 $orders_count=$this->db->query("SELECT id as orders_count  FROM orders WHERE create_date BETWEEN '".$formdate."' AND '".$todate."' AND order_base>0 AND deleteid=0 $sql");
                 $orders_count=$orders_count->result();
                 
                 
                 $orders_quotation_count=$this->db->query("SELECT id as orders_quotation_count  FROM orders_quotation WHERE  create_date BETWEEN '".$formdate."' AND '".$todate."' AND order_base>0 AND deleteid=0 $sql");
                 $orders_quotation_count=$orders_quotation_count->result();
                 
                 
                  
                 $out=array('total'=>array(count($orders_count),count($orders_quotation_count),count($orders_process_count)),'name'=>array('Enquiry '.count($orders_count),'Quotation '.count($orders_quotation_count),'Orders '.count($orders_process_count))); 
                  
            

             	echo json_encode($out);
	    
	    
	}
     public function fetch_localitybase()
	{
	                  
	                  
	                  $formdate=date('Y-m-01');
                       $todate=date('Y-m-t');
	                   $array=array();
                      $sql="";
                      if($this->session->userdata['logged_in']['access']=='16')
					  {
							            	     
							            $sales_group_id=array();	     
							            $sales_group = $this->Main_model->where_names_two_order_by('sales_group','sales_group_head',$this->userid,'deleteid','0','id','ASC'); 	
							            foreach($sales_group as $val)
							            {
							                $sales_group_id[]=$val->id;
							            }
							            
							            
							            $sales_group_idval="'".implode("','",$sales_group_id)."'";
							            $sql=' AND o.sales_group IN ('.$sales_group_idval.')';
							          
							            	     
					  }
					  
					  
					  if($this->session->userdata['logged_in']['access']=='17')
					  {
							            	     
							            
							            $sql=' AND o.user_id="'.$this->userid.'"';
							          
							            	     
					  }
					  
					  
					  if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
					  {
							            	     
							                                     $sales_team_id = array($this->userid);
                                                                $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                                                                foreach ($resultsales_team as $values) {
                                                                    $sales_team_id[] = $values->sales_member_id;
                                                                }
                                                               
                                                                $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
                                                               
                                                                $sql = ' AND  o.user_id IN (' . $sales_team_id . ')';
							          
							            	     
					  }
                       
                    
                     $result=$this->db->query("SELECT *  FROM locality WHERE deleteid=0  ORDER BY name ASC");
                     $result=$result->result();
                     
                     
                     
                     
                     
                 
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	     $resultss=$this->db->query("SELECT a.company_name  FROM customers as a JOIN orders_process as o ON a.id=o.customer_id WHERE o.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.deleteid=0 AND a.locality='".$value->id."' AND a.order_base>0 $sql");
                 	     
                 	     
                 	     
                 	     $resultss=$resultss->result();
                        
                        
                        if($value->name!='')
                        {
                            
                        
                                       if(count($resultss)>0)
                                       {
                                           
                                            $array[] = array(
                                            
                                     	 		'name' => $value->name, 
                                     	 		'count' => count($resultss), 
                                     	 	
                                     	 	);
                                           
                                       }
                                 	 	
                 	 	
                        }


                 	 }

                    echo json_encode($array);

	}
	
	
	public function fetch_localitybase_bychart()
	{
	                  
                       $formdate=$_GET['fromdate'];
                       $todate=$_GET['todate'];
                       
                       
	                   $array=array();
                      $sql="";
                      if($this->session->userdata['logged_in']['access']=='16')
					  {
							            	     
							            $sales_group_id=array();	     
							            $sales_group = $this->Main_model->where_names_two_order_by('sales_group','sales_group_head',$this->userid,'deleteid','0','id','ASC'); 	
							            foreach($sales_group as $val)
							            {
							                $sales_group_id[]=$val->id;
							            }
							            
							            
							            $sales_group_idval="'".implode("','",$sales_group_id)."'";
							            $sql=' AND o.sales_group IN ('.$sales_group_idval.')';
							          
							            	     
					  }
					  
					  
					  if($this->session->userdata['logged_in']['access']=='17')
					  {
							            	     
							            
							            $sql=' AND o.user_id="'.$this->userid.'"';
							          
							            	     
					  }
					  
					  
					  if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
					  {
							            	     
							                                     $sales_team_id = array($this->userid);
                                                                $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                                                                foreach ($resultsales_team as $values) {
                                                                    $sales_team_id[] = $values->sales_member_id;
                                                                }
                                                               
                                                                $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
                                                               
                                                                $sql = ' AND  o.user_id IN (' . $sales_team_id . ')';
							          
							            	     
					  }
                       
                    
                     $result=$this->db->query("SELECT a.name,COUNT(o.id) as ordercount FROM locality as a JOIN customers as b ON a.id=b.locality JOIN orders_process as o ON b.id=o.customer_id WHERE   o.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.deleteid=0 AND o.order_base>0  $sql GROUP BY a.id HAVING ordercount > 0  
ORDER BY `ordercount`  DESC LIMIT 5");
                     $result=$result->result();
                     
                     
                     
                     
                     
                     $location=array();
                     $locationcount=array();
                 	 foreach ($result as  $value) {
                 	     
                 	    
                                if($value->name!='')
                                {
                                       
                                                   
                                                   
                                                  $location[]= $value->name.' : '.$value->ordercount;
                                                  $locationcount[]= $value->ordercount;
                                              
                         	 	
                                }


                 	 }



                    $out=array(
                        
                        'total'=>$locationcount,
                        'name'=>$location
                        
                        ); 
                  
            

                    echo json_encode($out);

	}
	
	
	public function fetchDataTopproduct()
	{
	                   
	                 
	                  
	                   $formdate=$_GET['fromdate'];
                       $todate=$_GET['todate'];
	                  
	                  $array=array();
	                  $sql="";
                      if($this->session->userdata['logged_in']['access']=='16')
					  {
							            	     
							            $sales_group_id=array();	     
							            $sales_group = $this->Main_model->where_names_two_order_by('sales_group','sales_group_head',$this->userid,'deleteid','0','id','ASC'); 	
							            foreach($sales_group as $val)
							            {
							                $sales_group_id[]=$val->id;
							            }
							            
							            
							            $sales_group_idval="'".implode("','",$sales_group_id)."'";
							            $sql=' AND o.sales_group IN ('.$sales_group_idval.')';
							          
							            	     
					  }
					  
					  
					  if($this->session->userdata['logged_in']['access']=='12')
					  {
							            	     
							            
							            $sql=' AND o.user_id="'.$this->userid.'"';
							          
							            	     
					  }
					  
					  
					  if($this->session->userdata['logged_in']['access']=='11')
					  {
							            	     
							              $sales_team_id=array();
                                          $query = $this->db->query("SELECT id FROM `admin_users`  WHERE define_saleshd_id='".$this->userid."'");
                                          $resultsales_team=$query->result();
                                          foreach ($resultsales_team as  $values) {
                                              
                                              $sales_team_id[]=$values->id;
                                              
                                          }
                         
							            
							            
							             $sales_team_id_idval="'".implode("','",$sales_team_id)."'";
							             $sql=' AND o.user_id IN ('.$sales_team_id_idval.')';
							          
							            	     
					  }
	    
	    

                    
                     $result=$this->db->query("SELECT  a.product_name,COUNT(a.product_id) as product_id_count  FROM order_product_list_process as a  JOIN orders_process as o ON a.order_id=o.id WHERE o.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0 AND o.deleteid=0 AND o.order_base>0  AND a.product_id!='0' $sql  GROUP BY a.product_id  HAVING product_id_count > 30  ORDER BY product_id_count DESC");
                     $result=$result->result();
                 
                 	 foreach ($result as  $value) {
                 	     
                 	     

                 	 	$array[] = array(
                            
                 	 		'name' => $value->product_name, 
                 	 		'count' => $value->product_id_count 
                 	 	
                 	 	);


                 	 }

                    echo json_encode($array);

	}
	
		public function fetchDataRemainder()
	{
	                   
	                 
	                  
	                   $todate=$_GET['todate'];
                       if($todate=='')
                       {
                         $todate=date('Y-m-d');
                       }
	                  
	                  $array=array();
	                  $sql="";
                      if($this->session->userdata['logged_in']['access']=='16')
					  {
							            	     
							            $sales_group_id=array();	     
							            $sales_group = $this->Main_model->where_names_two_order_by('sales_group','sales_group_head',$this->userid,'deleteid','0','id','ASC'); 	
							            foreach($sales_group as $val)
							            {
							                $sales_group_id[]=$val->id;
							            }
							            
							            
							            $sales_group_idval="'".implode("','",$sales_group_id)."'";
							            $sql=' AND o.sales_group IN ('.$sales_group_idval.')';
							          
							            	     
					  }
					  
					  
					  if($this->session->userdata['logged_in']['access']=='12')
					  {
							            	     
							            
							            $sql=' AND o.user_id="'.$this->userid.'"';
							          
							            	     
					  }
					  
					  
					  if($this->session->userdata['logged_in']['access']=='11')
					  {
							            	     
							              $sales_team_id=array();
                                          $query = $this->db->query("SELECT id FROM `admin_users`  WHERE define_saleshd_id='".$this->userid."'");
                                          $resultsales_team=$query->result();
                                          foreach ($resultsales_team as  $values) {
                                              
                                              $sales_team_id[]=$values->id;
                                              
                                          }
                         
							            
							            
							             $sales_team_id_idval="'".implode("','",$sales_team_id)."'";
							             $sql=' AND o.user_id IN ('.$sales_team_id_idval.')';
							          
							            	     
					  }
	    
	    

                    
                 
                        
   $result=$this->db->query("SELECT  o.id,o.order_no,o.table_name,o.order_id,o.status_data,o.remarks,a.company_name,a.phone,o.call_back_date,o.call_back_date_only  FROM call_history as o  JOIN customers as a ON o.customer_id=a.id WHERE o.call_back_date_only<='".$todate."' AND o.status_data='Call Back' AND o.deleteid=0 $sql ORDER BY o.call_back_date_only DESC");

                    
                     $result=$result->result();
                 
                 	 foreach ($result as  $value)
                 	 {
                 	     
                 	     
                 	     if($value->table_name=='orders_quotation')
                         {


                             $lable='Quotation';

                             $order_id=$value->order_id;
                           
                           
                             $order_id=base64_encode($order_id);
                             $url=base_url().'index.php/order/ordercreate_product_quotation?order_id='.$order_id;


                         }
                         
                         if($value->table_name=='orders')
                         {
                             $lable='Enquiry';
                             $order_id=$value->order_id;
                            
                             $order_id=base64_encode($order_id);
                             $url=base_url().'index.php/order/ordercreate_product?order_id='.$order_id.'&viewbase=1';
                         }
                         
                         if($value->table_name=='orders_process')
                         {
                             $lable='Orders';
                             $order_id=$value->order_id;
                           
                             $order_id=base64_encode($order_id);
                             $url=base_url().'index.php/order/ordercreate_product_process?order_id='.$order_id;
                         }
                         
                         
                             
                         

                              $status = $this->Main_model->where_names($value->table_name, 'id', $value->order_id);
                              foreach ($status as $valuew) 
                              {

                                $order_base=$valuew->order_base;
                                $call_back_date=$valuew->call_back_date;
                                $user_id=$valuew->user_id;
                                if($order_base>0)
                                {


                        $this->db->query("UPDATE call_history SET deleteid='99' WHERE id='".$value->id."'");


                                }
                                $create_date=$valuew->create_date;


                              }

                 	          

                              if($order_base=='-4')
                              {


                                  if($call_back_date==$value->call_back_date_only)
                                 {



                                    if($value->remarks!='')
                                    {


                                       if($this->session->userdata['logged_in']['access']!='12')
                                            {

                                                 $array[] = array(
                                                
                                                        'order_no' => $value->order_no, 
                                                        'name' => $value->company_name, 
                                                        'phone' => $value->phone, 
                                                        'create_date' => date('d-m-Y',strtotime($create_date)), 
                                                        'call_back_date' => $value->call_back_date, 
                                                        'remarks' => $value->remarks,
                                                        'lable' => $lable,
                                                        'url' => $url,
                                                        'table_name' => $value->table_name, 
                                                    
                                                      );

                                            }
                                            else
                                            {



                                                             if($user_id==$this->userid)
                                                             {



                                                                  $array[] = array(
                                                                
                                                                        'order_no' => $value->order_no, 
                                                                        'name' => $value->company_name, 
                                                                        'phone' => $value->phone, 
                                                                        'create_date' => date('d-m-Y',strtotime($create_date)), 
                                                                        'call_back_date' => $value->call_back_date, 
                                                                        'remarks' => $value->remarks,
                                                                        'lable' => $lable,
                                                                        'url' => $url,
                                                                        'table_name' => $value->table_name, 
                                                                    
                                                                      );


                                                             }

                                                             

                                            }


                                    }

                                  }

                              }

                          
                        


                 	 }

                    echo json_encode($array);

	}
	

}	
