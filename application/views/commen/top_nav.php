 <header id="page-topbar">
            <div class="navbar-header sliderMenuTop">
               <div class="d-flex sliderMenuTopFlex">
                  <!-- LOGO -->
                  <div class="navbar-brand-box sliderMenuTopBox">
                     <a href="<?php echo base_url(); ?>index.php/dashboard" class="logo logo-dark">
                     <span class="logo-sm">
                     <img src="<?php echo LOGO; ?>" alt="" height="24">
                     </span>
                     <span class="logo-lg">
                     <img src="<?php echo LOGO; ?>" alt="" height="24">
                     </span>
                     </a>
                     <a href="<?php echo base_url(); ?>index.php/dashboard" class="logo logo-light">
                     <span class="logo-sm">
                     <img src="<?php echo LOGO; ?>" alt="" height="24">
                     </span>
                     <span class="logo-lg">
                     <img src="<?php echo LOGO; ?>" alt="" height="24">
                     </span>
                     </a>
                  </div>
                  <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light sliderMenuTopToggle" 
                  data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                  <i class="fa fa-fw fa-bars"></i>
                  </button>
               </div>
               <div class="d-flex">
                  <div class="topnav">
                     <div class="">
                         
                          
                       <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                           <div class="collapse navbar-collapse" id="topnav-menu-content">
                              <ul class="navbar-nav">
                                  
                                  
                                  
                                  <?php
                                  
                                 $result_check=$this->db->query("SELECT b.* FROM `menu_primary_save_user` as a JOIN menu_group as b ON a.sub_menu_id=b.id WHERE  a.user_id='".$this->session->userdata['logged_in']['userid']."' ORDER BY b.sort_order  ASC");
                                 $result_check=$result_check->result();
                                 
                                 
                                 
                                 
                                 $result_sub_check=$this->db->query("SELECT b.* FROM `menu_save_user` as a JOIN menu_sub_list as b ON a.sub_menu_id=b.id WHERE  a.user_id='".$this->session->userdata['logged_in']['userid']."' AND b.deleteid=0 ORDER BY b.sort_order ASC");
                                 $result_sub_check=$result_sub_check->result();


                                 if(count($result_check)==0)
                                 {

                                 


                                     $result_check=$this->db->query("SELECT b.* FROM `menu_primary_save` as a JOIN menu_group as b ON a.sub_menu_id=b.id WHERE  a.group_id='".$this->session->userdata['logged_in']['access']."' ORDER BY b.sort_order  ASC");
                                     $result_check=$result_check->result();
                                 
                                 
                                 
                                 
                                     $result_sub_check=$this->db->query("SELECT b.* FROM `menu_save` as a JOIN menu_sub_list as b ON a.sub_menu_id=b.id WHERE  a.group_id='".$this->session->userdata['logged_in']['access']."' AND b.deleteid=0 ORDER BY b.sort_order ASC");
                                     $result_sub_check=$result_sub_check->result();

                                 }
                               
                                  
                                  ?>
                                  
                                  <?php
                                  foreach($result_check as $pvalue)
                                  {
                                      
                                      if($pvalue->link=='#'){ $plink='#'; }else{ $plink=base_url().$pvalue->link; }
                                      
                                      ?>
                                      <?php
                                      if($pvalue->sub_status==0)
                                      {
                                          ?>
                                          
                                             <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle arrow-none" href="<?php echo $plink; ?>" id="topnav-<?php echo $pvalue->name; ?>" role="button">
                                                <i data-feather="<?php echo $pvalue->icon; ?>"></i><span data-key="t-<?php echo $pvalue->name; ?>"><?php echo $pvalue->name; ?></span>
                                                </a>
                                             </li>



                                             <?php

                                             if($this->session->userdata['logged_in']['userid']=='1744')
                                             {

                                               ?>


                                   <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-products" role="button">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg><span data-key="t-extra-products">Purchase</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-products">
                                        
                                    
                                                                             
                                                                               
                                                                           
                                                                                  
                                                                                  <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/purchase/purchase_list">Purchase &amp; inventory Create</a>
                                                                                  
                                                                                <!--   <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/purchase/purchase_invoice">Purchase Invoice</a>
                                                                                  
                                                                            
                                                                                  
                                                                                  <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/purchase/purchase_return_list">Purchase Return</a> -->
                                                                                  
                                                                                
                                    
                                        
                                     





                                    </div>
                                 </li>

                                               <?php
                                             }
                                             ?>
                                      
                                          
                                          <?php
                                      }
                                      else
                                      {
                                         
                                          ?>
                                           <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-products" role="button">
                                       <i data-feather="box"></i><span data-key="t-extra-products"><?php echo $pvalue->name; ?></span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-products">
                                        
                                    
                                    <?php
                                     foreach($result_sub_check as $svalue)
                                     {
                                        if($svalue->menu_group_id==$pvalue->id) 
                                        {
                                            
                                       
                                         if($svalue->link=='#'){ $slink='#'; }else{ $slink=base_url().$svalue->link; }
                                         ?>
                                         
                                         <?php
                                         if($svalue->id==1)
                                         {
                                             ?>
                                             
                                              <div class="dropdown">
                                              <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-authmaster" role="button">
                                                 <span data-key="t-authentication"><?php echo $svalue->sub_menu; ?></span> 
                                                 <div class="arrow-down"></div>
                                              </a>
                                              <div class="dropdown-menu" aria-labelledby="topnav-authmaster">



                    
                                                        <!-- <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/brand">Brand</a>
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/uom">UOM</a>
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/color">Color</a>
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/gsm">GSM</a>
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/thickness">Thickness</a>
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/ys">YS</a>-->
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/products/tile">Tile Calculation</a>
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/grouping">Grouping</a>
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/pricemaster">Price Master</a>
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/additional_information">Additional Information</a>
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/remarks">Remarks</a>
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/layoutplan">Base Name & Range</a>

                                              </div>
                                           </div>
                                           
                                             
                                             <?php
                                         }
                                         elseif($svalue->id==45)
                                         {
                                             ?>
                                             
                                            <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-accountsmaster" role="button">
                                             <span data-key="t-authentication"><?php echo $svalue->sub_menu; ?></span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-accountsmaster">
                                                         
                                                         
                                                         <!--<a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/partytype">Party Type</a>-->
                                                         <!--<a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/partytype/partyusers">Party Users</a>-->
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/accounttype">Primary Group</a>
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/accountheads_sub">Sub Group </a>
                                                         
                                                       
                                                         
                                          
                                          </div>
                                       </div>
                                             
                                             <?php
                                         }
                                         elseif($svalue->id==36)
                                         {
                                             
                                             ?>
                                             <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication"><?php echo $svalue->sub_menu; ?></span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">

                                                 <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/group/user_group">Users Group</a>
                                                 <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/users/usersindex">Users Creation</a>
                                                 <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/users/user_list">Users List</a>
                                                 
                                   


                                          
                                          </div>
                                       </div>
                                             <?php
                                             
                                         }
                                         elseif($svalue->id==37)
                                         {
                                             
                                               ?>
                                             <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication"><?php echo $svalue->sub_menu; ?></span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">

                   
                   
                   
                   <?php
                   
                   if($this->session->userdata['logged_in']['access']!='16')
                   {
                       
                 
                   
                   ?>
                   
                   <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/users/user_list_by_group?group_base=16">Sales GM</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/group/sales_group">Sales Group</a>
                   
                   <?php
                    }
                   ?>
                   
                   
                   
                   <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/users/usersindex?sales_head=11">Sales Head Creation</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/users/user_list_by_group?group_base=11">Sales Head List</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/salesteam/sales_team_add">Sales Member Creation</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/salesteam/sales_team_list">Sales Member List</a>
                   
                   <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/salesteamsub/sales_team_sub_add">Sales Member Sub Creation</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/salesteamsub/sales_team_sub_list">Sales Member Sub List</a>
   


                                          
                                          </div>
                                       </div>
                                             <?php
                                             
                                         }
                                         elseif($svalue->id==38)
                                         {
                                             
                                              
                                           
                                                     $usergroup=array(10,1,2,3,15,11,12); 
                                                     if(in_array($this->session->userdata['logged_in']['access'],$usergroup))
                                                     {
                                                      
                                                      ?>
                                                      
                                                      
                                                            <div class="dropdown">
                                                              <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                                                 <span data-key="t-authentication"><?php echo $svalue->sub_menu; ?></span> 
                                                                 <div class="arrow-down"></div>
                                                              </a>
                                                              <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/customer_add">Customer Creation</a>
                                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/customer_list">Customer List</a>
                                                               <?php 
                                                                $usergroup = array(1, 15);
                                                                if ((in_array($this->session->userdata['logged_in']['access'], $usergroup))) {
                                                                  ?>
                                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/customer_inter_link">Customer Inter Link</a>
                                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/customer_master_control">Customer Master Control</a>
                                                               <?php 
                                                                }
                                                                ?>
                                                             </div>
                                                           </div>
                                                                          
                                                      
                                                      <?php
                                                         
                                                     }
                                                     else
                                                     {
                                                         
                                                         ?>
                                                           <div class="dropdown">
                                                              <a class="dropdown-item dropdown-toggle arrow-none" href="<?php echo base_url(); ?>index.php/customer/customer_list" id="topnav-auth" role="button">
                                                                 <span data-key="t-authentication"><?php echo $svalue->sub_menu; ?></span> 
                                                               </a>
                                                           </div>
                                                         <?php
                                                     }
                       
                 
                   
                                             
                                         }
                                          elseif($svalue->id==46)
                                         {
                                             
                                              
                                             ?>
                                             <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication"><?php echo $svalue->sub_menu; ?></span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                                
                                                
                                              <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/day_book_report">Day Book Report </a> -->
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/day_book_report_cash">Day Book Report </a>          
                                              <!--<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/balancereport?type=3">Non Cash  Report </a>-->
                                              
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/accountsreport">Non Cash Report</a>
                                              <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bankaccount/report_cash">Cash Report</a> -->
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bankaccount/report_cash_beta">Cash Report</a>
                                              
                                              <!--<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/balancereport?type=1">Cash Report</a>-->
                                              
                                              <!-- 
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/accountsreport">Bank Account Report</a> -->
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/profit_and_loss">Profit Or Loss</a>  
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/trial_balance">Balance Sheet</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/trial_balance_full">Trial Balance</a>
                                              <!--<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/salesreport"> Day Book </a>-->  


                                          
                                          </div>
                                       </div>
                                             <?php
                                             
                                         }
                                         elseif($svalue->id==39)
                                         {
                                             
                                             ?>
                                             <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication"><?php echo $svalue->sub_menu; ?></span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">

              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/vendor/vendor_add">Vendor Creation</a>
                                  <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/vendor/vendor_list">Vendor List</a>


                                          
                                          </div>
                                       </div>
                                             <?php
                                             
                                         }
                                         elseif($svalue->id==40 || $svalue->id==73)
                                         {
                                             
                                             ?>
                                             
                                       <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication"><?php echo $svalue->sub_menu; ?></span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">

                 <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/vehicle/vehicle_view">Vehicle List</a>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/driver/driverview">Driver List</a>

                  

                                          
                                          </div>
                                       </div>
                                             <?php
                                             
                                         }
                                         else
                                         {
                                         ?>
                                         <a class="dropdown-item"  href="<?php echo $slink; ?>"><?php echo $svalue->sub_menu; ?></a>
                                         <?php
                                         }
                                         
                                         
                                         
                                         
                                         
                                         
                                        }
                                     }
                                     ?>
                                        
                                    
                                        
                                     





                                    </div>
                                 </li>
                                          
                                          <?php
                                        
                                        
                                      }
                                      ?>
                                  
                                      <?php
                                  }
                                  ?>
                                  
                              
                                 
                                 
                                 
                                 
                                  
                               
                              </ul>
                           </div>
                        </nav>
                        
                           
                           
                        
                         
                        
                        
                        
                     </div>
                  </div>
               </div>
               <div class="d-flex">
                  <div class="dropdown d-inline-block d-lg-none ms-2">
                     <button type="button" class="btn header-item" id="page-header-search-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i data-feather="search" class="icon-lg"></i>
                     </button>
                     <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                           <div class="form-group m-0">
                              <div class="input-group">
                                 <input type="text" class="form-control" placeholder="Search ..." aria-label="Search Result">
                                 <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               
                  
          
                  
                  
                  <div class="dropdown  d-sm-inline-block">
                     <button type="button" class="btn header-item" id="clicknav">
                    
                     <i class="fa fa-bars" aria-hidden="true"></i>

                     </button>
                  </div>
                  


                    <?php
                   $usergroup=array(10,1,2,15,11,12); 
                   if(in_array($this->session->userdata['logged_in']['access'],$usergroup))
                   {
                   ?>
                    <div class="dropdown  d-sm-inline-block">
                      
                                                   
                                                      




                     <button type="button" class="header-item noti-icon position-relative" id="page-header-notifications-dropdown-1"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i data-feather="bell" class="icon-lg"></i>
                     <span class="badge bg-success rounded-pill" id="countsetval" style="color:black;font-weight: 800;">0</span>
                     </button>


                   <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown-1">
                        <div class="p-3">
                           <div class="row align-items-center">
                              <div class="col">
                                 <h6 class="m-0"> Confirm the date of delivery </h6>
                              </div>
                             </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                          
                    
                           
                        
                        <div class="Notifications_view">
                           


                        </div>
                           
                         
                         
                        </div>
                        <div class="p-2 border-top d-grid">
                           <a class="btn btn-sm btn-link font-size-14 text-center" href="<?php echo base_url(); ?>index.php/order/delivery_orders_list">
                           <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span> 
                           </a>
                        </div>
                     </div>
                  
                  
                  </div>

                  <?php

                  }


                  ?>
                  
                  
                  
                  
                  <div class="dropdown d-inline-block">
                   
                   
                    <?php
                                 $userid=$this->session->userdata['logged_in']['userid'];
                                $totalcount=0;      
                               if($this->session->userdata['logged_in']['userid']=='23' || $this->session->userdata['logged_in']['userid']=='1')
                               {
                                   
                                          
                                        $result_check=$this->db->query("SELECT * FROM `tickets`  WHERE  user='1' AND status=0 ORDER BY id  DESC");
                                     
                                        
                               }
                               else
                               {
                                        $result_check=$this->db->query("SELECT * FROM `tickets`  WHERE  user='".$userid."' AND status=0 ORDER BY id  DESC");
                                       
                                      
                               }
                                  
                                  
                                 $result_check=$result_check->result();
                                 $totalcount=count($result_check);
                                 
                                
                               
                                  
                   ?>
                   
                         
                          <?php
                         
                   if($this->session->userdata['logged_in']['userid']=='1')
                   {
                       
                           
                           $result=$this->db->query("SELECT * FROM `tickets`  WHERE  user='1'  ORDER BY id  DESC");
                           $result=$result->result();
                           $resultcount=0;
                           if(count($result)==0)
                           {
                               
                               $result=$this->db->query("SELECT * FROM `tickets`  WHERE  user_id=1 AND reply=1  ORDER BY id  DESC");
                              $result=$result->result();
                              
                           }
                            
                   }
                   else
                   {
                            
                           
                           $result=$this->db->query("SELECT * FROM `tickets`  WHERE  user='".$userid."'  ORDER BY id  DESC");
                           $result=$result->result();
                           $resultcount=0;
                           if(count($result)==0)
                           {
                               
                               $result=$this->db->query("SELECT * FROM `tickets`  WHERE  user_id='".$userid."' AND reply=1  ORDER BY id  DESC");
                              $result=$result->result();
                              
                           }
                           
                           
                   }
                    
                    
                  
                  $ticket_id=array();
                    $resultdelete=$this->db->query("SELECT * FROM `tickets_delete`  WHERE  user_id='".$userid."' ORDER BY id  DESC");
                    $resultdelete=$resultdelete->result();
                    
                    foreach ($resultdelete as  $valuedelete) {
                        $ticket_id[]=$valuedelete->ticket_id;
                    }
                    
                                               $ticket_id_bal=array();
                                               foreach ($result as  $values)
                                             {
                                                 $ticket_id_bal[]=  $values->id;
                                             }
                                                
                                                
                                                $array=array();
                                                $findreplay_tikets= implode(',',$ticket_id_bal);
                    
                                                $replycountotal=0;
                                                $resultcount_replay=$this->db->query("SELECT * FROM `tickets_sub`  WHERE  ticket_id IN ('".$findreplay_tikets."') AND status=0 AND user_id!='".$userid."'  ORDER BY id  DESC");
                                                $resultcount_replay=$resultcount_replay->result();
                                                
                                                if(count($resultcount_replay)!=0)
                                                {
                                                    
                                                    
                                                    $replycountotal=count($resultcount_replay);
                                                    
                                                    
                                                    
                                                     foreach ($resultcount_replay as  $revalue)
                                                    {
                                                        
                                                        
                                                                         
                                                                           
                                                                               $resultpending=$this->db->query("SELECT * FROM `admin_users`  WHERE  id='".$revalue->user_id."' AND deleteid=0 ORDER BY id  DESC");
                                                                                $resultpending=$resultpending->result();
                                                                               
                                                                              
                                                                                foreach ($resultpending as  $valuess) {
                                                                                  
                                                                                   $username= $valuess->name;
                                                                                    
                                                                                }
                                                                               
                                                                                 $message = substr($revalue->message, 0, 35); 
                                                                           
                                                                                 $array[] = array(
                                                                
                                                                                          'ticket_id' => $revalue->ticket_id, 
                                                                                          'id' => $revalue->ticket_id, 
                                                                                          'sub_id' => $revalue->id, 
                                                                                           'username' => $username,
                                                                                          'lable' => 'Reply By',
                                                                                          'title' => $message.'...', 
                                                                                          'priority' => 'Low', 
                                                                                          'dateset' => date('M',strtotime($revalue->create_date)).' '.date('d',strtotime($revalue->create_date)), 
                                                                                           'status' => $revalue->status
                                                                                          
                                                                
                                                                            );
                                                                           
                                                                           
                                                        
                                                        
                                                    }
                                                    
                                                    
                                                   
                                                    
                                                }

                   
                                     
                                                 foreach ($result as  $value)
                                                 {
                                                   
                                                   
                                                    
                                                                           if($value->status=='1')
                                                                           {
                                                                              $status='bgcolorgray';
                                                                           }
                                                                           else
                                                                           {
                                                                              $status='bgcolorwhite';
                                                                           }
                                                                        
                                                                        
                                                                        
                                                                           if($value->user==$this->userid)
                                                                           {
                                                                               $resultpending=$this->db->query("SELECT * FROM `admin_users`  WHERE  id='".$value->user_id."' AND deleteid=0 ORDER BY id  DESC");
                                                                                $resultpending=$resultpending->result();
                                                                               
                                                                              
                                                                                foreach ($resultpending as  $valuess) {
                                                                                  
                                                                                   $username= $valuess->name;
                                                                                    
                                                                                }
                                                                               
                                                                               
                                                                           }
                                                                           else
                                                                           {
                                                                                $resultpending=$this->db->query("SELECT * FROM `admin_users`  WHERE  id='".$value->user."' AND deleteid=0 ORDER BY id  DESC");
                                                                                 $resultpending=$resultpending->result();
                                                                                foreach ($resultpending as  $valuess) {
                                                                                  
                                                                                   $username= $valuess->name;
                                                                                    
                                                                                 }
                                                                               
                                                                           }
                                                   
                                                                                          
                                                                                             
                                                                            if($value->ticket_type==2)
                                                                            {
                                                                                $username="External Support Team";
                                                                            }
                                                 
                                                                            $message = substr($value->message, 0, 35); 
                                                                            
                                                                            $replaycount="";
                                                                            $resultcount=$this->db->query("SELECT * FROM `tickets_sub`  WHERE  ticket_id='".$value->id."'  ORDER BY id  DESC");
                                                                            $resultcount=$resultcount->result();
                                                                            
                                                                            if(count($resultcount)!=0)
                                                                            {
                                                                                $replaycount="(".count($resultcount).")";
                                                                            }
                                                                            
                                                                             if(!in_array($value->id, $ticket_id))
                                                                             {
                                                                                 
                                                                                 
                                                                                 if($value->status=='0')
                                                                              {
                                                                                          $array[] = array(
                                                                
                                                                                          'ticket_id' => $value->ticket_id, 
                                                                                          'id' => $value->id, 
                                                                                          'title' => $value->title, 
                                                                                          'username' => $username,
                                                                                          'lable' => 'From',
                                                                                          'category' => $value->category,
                                                                                          'bgcolor' => $status,
                                                                                          'sub_id' => 0, 
                                                                                          'replaycount' => $replaycount,
                                                                                          'message' => $message.'...', 
                                                                                          'priority' => $value->priority, 
                                                                                          'dateset' => date('M',strtotime($value->create_date)).' '.date('d',strtotime($value->create_date)), 
                                                                                          'status' => $status,
                                                                                          'status' => $value->status
                                                                                          
                                                                
                                                                                           );
                                                                                           
                                                                              }
                                                                                  
                                                                                  
                                                                             }
                            
                            
                            
                            
                                                 }
                                  
                                  ?>
                   
                   
                   
                    <button type="button" class="header-item noti-icon position-relative" id="page-header-notifications-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i data-feather="mail" class="icon-lg"></i>
                     <span class="badge bg-danger rounded-pill"><?php echo $totalcount+$replycountotal; ?></span>
                     </button>
                     
                     
                     <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                           <div class="row align-items-center">
                              <div class="col">
                                 <h6 class="m-0"> Ticket Notifications </h6>
                              </div>
                              <div class="col-auto">
                                 <a href="#!" class="small text-reset text-decoration-underline"> Unread (<?php echo $totalcount+$replycountotal; ?>)</a>
                              </div>
                           </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                          
                    
                           
                           <?php
                           foreach($array as $vl)
                           {
                               ?>
                               
                               <a href="<?php echo base_url(); ?>index.php/ticket/ticket_view/<?php echo $vl['id']; ?>/0/<?php echo $vl['sub_id']; ?>" class="text-reset notification-item">
                                  <div class="d-flex">
                                     <div class="avatar-sm me-3">
                                        <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="bx bx-badge-check"></i>
                                        </span>
                                     </div>
                                     <div class="flex-grow-1">
                                        <h6 class="mb-1"><?php echo $vl['title']; ?></h6>
                                        <div class="font-size-13 text-muted">
                                            <p class="mb-1"><?php echo $vl['message']; ?>  
                                            <p class="mb-1"><b><?php echo $vl['lable']; ?> : <?php echo $vl['username']; ?></b>  </p>
                                            
                                                       
                                                        
                                                     
                                           
                                           <p class="mb-0 pull-right" style="text-align:right;">
                                               
                                                <?php
                                                        if($vl['priority']=='Low'){ $clas='success'; }
                                                        if($vl['priority']=='High'){ $clas='danger'; }
                                                        if($vl['priority']=='Medium'){ $clas='primary'; }
                                                        ?>
                                                        <span  class="bg-<?php echo $clas; ?> badge me-2" ><?php echo $vl['priority']; ?></span>
                                               
                                               <i class="mdi mdi-clock-outline"></i> <span><?php echo $vl['dateset']; ?></span></p>
                                        </div>
                                     </div>
                                  </div>
                               </a>
                               
                               <hr></hr>
                           
                               
                               <?php
                           }
                           
                           ?>
                           
                           
                         
                         
                        </div>
                        <div class="p-2 border-top d-grid">
                           <a class="btn btn-sm btn-link font-size-14 text-center" href="<?php echo base_url(); ?>index.php/ticket/inbox">
                           <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span> 
                           </a>
                        </div>
                     </div>
                  </div>
                 
                  <div class="dropdown d-inline-block">
                    
                     <button type="button" class="header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span><?php echo $this->session->userdata['logged_in']['username']; ?></span>
                   
                    
                     <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        
                        
                        <?php
                   
                         if($this->session->userdata['logged_in']['access']=='1')
                       {
                       
                 
                   
                       ?>


                         <!-- <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-data-clear"><i class="mdi mdi-database-minus font-size-16 align-middle me-1"></i> Database Backup Clear</a> -->
                         
                         <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center-charge"><i class="mdi mdi-van-utility font-size-16 align-middle me-1"></i> Driver Charge Setup</a>
                      
                      
                      <?php
                      }
                      
                      ?>
                      
                      
                       <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center-date"><i class="mdi mdi-pen font-size-16 align-middle me-1"></i> Date Settings</a>
                        <!--<div class="dropdown-divider"></div>-->
                        <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/adminmain/logout"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>
         


                                            <div class="modal fade bs-example-modal-data-clear" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Database Backup Clear</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                         <form  action="<?php echo base_url();  ?>index.php/brand/backupclear" method="POST" >
                                                        <div class="modal-body">
                                                           
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">Select the date : </label>
                                                                    <input type="date" name="from_date" class="form-control"  required>
                                                                </div>
                                                                
                                                              
                                                               
                                                            
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="sumnit" class="btn btn-primary">Clear</button>
                                                        </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->



         <div class="modal fade bs-example-modal-center-charge" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Driver Charge Setup</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                         <form  action="<?php echo base_url();  ?>index.php/brand/update_driver_charges" method="POST" >
                                                        <div class="modal-body">
                                                           
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">FIXED KM:</label>
                                                                    <input type="texts" name="fixed_km" class="form-control" value="<?php echo FIXED_KM; ?>" required>
                                                                </div>
                                                                
                                                                 <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">FIXED  CHARGE:</label>
                                                                    <input type="amount" name="amount" class="form-control" value="<?php echo FIXED_AMOUNT; ?>" required id="date2">
                                                                </div>
                                                              
                                                               
                                                            
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="sumnit" class="btn btn-primary">Save</button>
                                                        </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->



         
         <div class="modal fade bs-example-modal-center-date" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Date Settings</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                         <form  action="<?php echo base_url();  ?>index.php/brand/adddate" method="POST" >
                                                        <div class="modal-body">
                                                           
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">From Date:</label>
                                                                    <input type="date" name="date1" class="form-control" value="<?php echo $this->session->userdata['logged_in']['from_date']; ?>" required id="date1">
                                                                </div>
                                                                
                                                                 <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">To Date:</label>
                                                                    <input type="date" name="date2" class="form-control" value="<?php echo $this->session->userdata['logged_in']['to_date']; ?>" required id="date2">
                                                                </div>
                                                              
                                                               
                                                            
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="sumnit" class="btn btn-primary">Save</button>
                                                        </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->


  <?php
                   $usergroup=array(10,1,2,15,11,12); 
                   if(in_array($this->session->userdata['logged_in']['access'],$usergroup))
                   {
                   ?>


<script>

    // enable this if you want to make only one call and not repeated calls automatically
    // pushNotify();

    // following makes an AJAX call to PHP to get notification every 10 secs
    setInterval(function(){pushNotify();}, 5000);

        function pushNotify() {
         if (!("Notification" in window)) {
                // checking if the user's browser supports web push Notification
                alert("Web browser does not support desktop notification");
            }
            if (Notification.permission !== "granted")
                Notification.requestPermission();
            else {
                $.ajax({
                url : "<?php echo base_url(); ?>index.php/order/fetch_data_table_delivery?page=1&size=10&tablename=orders_process&order_base=1&from_date=&to_date=",
                type: "POST",
                success: function(data, textStatus, jqXHR) {
                    // if PHP call returns data process it and show notification
                    // if nothing returns then it means no notification available for now
                    if($.trim(data))
                    {


                        var data = jQuery.parseJSON(data);
                        $('#countsetval').text(data.totalCount);

                         $('.Notifications_view').html('');
                         $.each(data.PortalActivity, function (index, val) {
                         

                         var Notifications='<a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id='+val.base_id+'" class="text-reset notification-item"> <div class="d-flex"><div class="avatar-sm me-3"><span class="avatar-title bg-danger rounded-circle font-size-15"><i class="bx bx-badge-check"></i></span></div> <div class="flex-grow-1"> <h6 class="mb-1">'+val.order_no+' | Bill Amount '+val.totalamount+'</h6> <div class="font-size-13 text-muted"><p class="mb-1">'+val.name+'<p class="mb-0" style="font-weight: 800;font-size: 11px;"><span>Delivery Date </span><i class="mdi mdi-clock-outline"></i> <span>'+val.create_date_new+'</span></p></div></div></div></a><hr></hr>';
                            $('.Notifications_view').append(Notifications);

                         });

                        



                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {}
                });
            }
        };

        

    </script>
<?php
}
?>



