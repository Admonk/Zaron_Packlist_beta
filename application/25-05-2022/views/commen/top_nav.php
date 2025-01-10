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
                         
                           <?php
                             if($this->session->userdata['logged_in']['access']=='1')
                            {
                                
                             ?>
                              <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                           <div class="collapse navbar-collapse" id="topnav-menu-content">
                              <ul class="navbar-nav">
                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo base_url(); ?>index.php/dashboard" id="topnav-dashboard" role="button">
                                    <i data-feather="home"></i><span data-key="t-dashboard">Dashboard</span>
                                    </a>
                                 </li>
                                 
                                 
                                 
                                 
                                  

                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-products" role="button">
                                       <i data-feather="box"></i><span data-key="t-extra-products">Products</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-products">
                                        
                                        
                                        
                                     <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-authmaster" role="button">
                                             <span data-key="t-authentication">Master</span> 
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
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/layoutplan">Sheet Layout Plan Master</a>
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/grouping">Grouping</a>
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/additional_information">Additional Information</a>
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/pricemaster">Price Master</a>
                                                         
                    
                 
                                          
                                          </div>
                                       </div>
                                    
                                        
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/categories">Product Categories</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/products/productscreate">Product Creation</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/products/products_list">Product List</a>
                                       





                                    </div>
                                 </li>
                                 
                                 
                                   <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-purchase" role="button">
                                       <i data-feather="box"></i><span data-key="t-extra-products">Purchase</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-purchase">
                                        
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/storage">Storage Create</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/racksetup">Rack & Bin SetUp</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/purchase/purchase_list">Purchase & inventory Create</a>
                                     <!--<a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/purchase/purchase_inward_list">Inward List</a>-->
                                     
                                    

                                    </div>
                                 </li>
                                 
                                 
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-production" role="button">
                                       <i data-feather="tool"></i><span data-key="t-extra-production">Production</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-production">
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/production">Production Plan</a>
                                    
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/production_orders_list">Production Orders</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/production_panel_list">Production Process List</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/production_quality_check_panel_list">Quality Check</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/warehouse_panel_list">Warehouse</a>
                                    
                                    
                                    </div>
                                 </li>
                                 
                                 
                                 
                                 


                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button">
                                       <i data-feather="file-text"></i><span data-key="t-extra-pages">Sales</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-more">

                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/ordercreate">Sales Creation</a>
                                       
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/enquiries_list">Enquiry List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/quotation_list">Quotation List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list">Order List</a>
                                       
                                       
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/overall_list">OverAll List</a>
                                       
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/purchase/clinet_inward_list">Clinet inward List</a>
                                     
                                       
                                       
                                       <!--<a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list_sales_head">Sales Head Order List</a>
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list_sales_head">TL Verification Order List</a>-->
                                       
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/finance_orders_list">Finance Order List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/reconciliation_orders_list">Reconciliation Order List</a>
                                       
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/transport_orders_list">Client Scope Transport Order List</a>
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/transport_orders_list_own">Own Scope Transport Order List</a>
                                       
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/pick_up_loading">PickUP / Loading</a>
                                       
                                       
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/vehicle_wise_assigned">Vehicle Wise Assigned Status</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/transport_complated_list">Transport Completed List</a>
                                    
                                       
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/driver_orders_list">Driver Panel</a>
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list_purchase">Purchase Verification Order List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list_md">MD Verification Order List</a>
                                       
                                       
                                       
                                      
              

                                     <!--  <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-utility" role="button">
                                             <span data-key="t-utility">Customers Accounts</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-utility">
                                              <a class="dropdown-item" href="#">Billing history</a>
                                              <a class="dropdown-item" href="#">Payment history</a>
                                             
                                          </div>
                                       </div>-->





                                        <!-- <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-utility" role="button">
                                             <span data-key="t-utility">Vendor POS</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-utility">
                                               <a class="dropdown-item" href="#">Create Pos</a>
                                             <a class="dropdown-item" href="#">Billing history</a>
                                              <a class="dropdown-item" href="#">Payment history</a>
                                             
                                          </div>
                                       </div>-->












                                    </div>
                                 </li>









   <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-user" role="button">
                                       <i data-feather="users"></i><span data-key="t-extra-pages">Users </span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-user">
                                     
                                     
                                      <?php
                                        if($this->session->userdata['logged_in']['userid']=='23' || $this->session->userdata['logged_in']['userid']=='1')
                                        {
                                                        
                                        ?>
                                          <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication">Internal Users</span> 
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
                                       ?>
                                       
                                       
                                       
                                       
                                       
                                       
                                       <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication">Sales Users</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/users/user_list_by_group?group_base=16">Sales GM</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/group/sales_group">Sales Group</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/users/usersindex?sales_head=11">Sales Head Creation</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/users/user_list_by_group?group_base=11">Sales Head List</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/salesteam/sales_team_add">Sales Member Creation</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/salesteam/sales_team_list">Sales Member List</a>
                   
                   <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/salesteamsub/sales_team_sub_add">Sales Member Sub Creation</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/salesteamsub/sales_team_sub_list">Sales Member Sub List</a>



                                          
                                          </div>
                                       </div>
                                       
                                       
                                       
                                      
                                       
                                       
                                       <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication">Customers</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">

             <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/customer_add">Customer Creation</a>
             <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/customer_list">Customer List</a>
                  

                                          
                                          </div>
                                       </div>






<div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication">Vendors</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">

              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/vendor/vendor_add">Vendor Creation</a>
                                  <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/vendor/vendor_list">Vendor List</a>


                                          
                                          </div>
                                       </div>


 <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication">Vehicle & Driver</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">

                 <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/vehicle/vehicle_view">Vehicle List</a>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/driver/driverview">Driver List</a>

                  

                                          
                                          </div>
                                       </div>


                                       
                                       
                               
                                      






                                    </div>
                                 </li>
                                 
                                 
                                 
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-route" role="button">
                                       <i data-feather="map"></i><span data-key="t-tasks">Route</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-route">
                                
                                            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/group/route">Route Creation</a>
                                            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/group/locality">Locality</a>
                                              
                                                             
                                     
                                       
                                    
                                    </div>
                                 </li>
                                 
                                 
                                   <li class="nav-item dropdown">
                                   
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-ledger" role="button">
                                       <i data-feather="map"></i><span data-key="t-ledger">Finance</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    
                                     <div class="dropdown-menu" aria-labelledby="topnav-ledger">
                                         
                                         
                                               
                                     <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-accountsmaster" role="button">
                                             <span data-key="t-authentication">Master</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-accountsmaster">
                                                         
                                                         
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/partytype">Party Type</a>
                                                         <!--<a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/partytype/partyusers">Party Users</a>-->
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/accounttype">Group</a>
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/accountheads">Ledger</a>
                                                       
                                                         
                                          
                                          </div>
                                       </div>
                                       
                                       
                                               <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-accountsmaster" role="button">
                                             <span data-key="t-authentication">Accounts</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-accountsmaster">
                                                         
                                                         
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/balancereport?type=3">Non Cash Balance Report </a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/balancereport?type=1">Cash In Head Report</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/accountsreport">Accounts Report</a>
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/trial_balance">Balance Sheet</a>
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/trial_balance_full">Trial Balance</a>
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/salesreport"> Day Book </a>
                                                         
                                          
                                          </div>
                                       </div>
                                    
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bankaccount">Bank Account</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bankdeposit">Bank Deposit</a>
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bankaccount/statement">Bank Statement</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/manual_journals">Manual Journals</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/voucher">Voucher</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/payment_received">Receivable / Payout</a>
                                            
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/balancereport_base_ledger">All Ledger</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/ledger">Customer Ledger</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/vendor/ledger">Vendor Ledger</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/driver/ledger">Driver Ledger</a>
                                              
                                              
                                             
                                              
                                      
                                              
                                              
                                              
                                             

                                    </div>


                                    
                                 </li>
                                
                                
                                <li class="nav-item dropdown">
                                   
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-report" role="button">
                                       <i data-feather="file"></i><span data-key="t-report">Reports</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    
                                     <div class="dropdown-menu" aria-labelledby="topnav-report">

                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/salesreport">Sales Day Book </a>
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/vendor_purchase_report">Purchase Day Book</a>
                                               
                                               
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/order_balance_report">Order Balance Report </a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/sales_product_report">Sales Product Report</a>
                                              
                                              
                                              
                                              <!--<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/customer_order_report">Customer Order Report</a>-->
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/customer_yes_or_no_report">Customer YES or NO Report</a>
                                               
                                             
                                               
                                               
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/salse_group_order_report">Sales Group Report</a>
                                              
                                             
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/vendor_purchase_product_report">Purchase Product Report</a>
                                          
                                    </div>


                                    
                                 </li>




                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-driver" role="button">
                                       <i data-feather="trello"></i><span data-key="t-tasks">Tickets</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-driver">
                                
                                     <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/ticket/inbox">Compose</a>
               
                                 
                                    
                                    </div>
                                 </li>



                               

                               
                              </ul>
                           </div>
                        </nav>
                        
                             <?php
                            }
                           ?>
                           
                           
                           
                           
                            <?php
                             if($this->session->userdata['logged_in']['access']=='15')
                            {
                                
                             ?>
                              <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                           <div class="collapse navbar-collapse" id="topnav-menu-content">
                              <ul class="navbar-nav">
                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo base_url(); ?>index.php/dashboard" id="topnav-dashboard" role="button">
                                    <i data-feather="home"></i><span data-key="t-dashboard">Dashboard</span>
                                    </a>
                                 </li>
                                 
                                 
                                 
                                 
                                 


                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button">
                                       <i data-feather="file-text"></i><span data-key="t-extra-pages">Sales</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-more">

                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/ordercreate">Sales Creation</a>
                                       
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/enquiries_list">Enquiry List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/quotation_list">Quotation List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list">Order List</a>
                                       
                                       
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/purchase/clinet_inward_list">Clinet inward List</a>
                                     
                                       
                                       
                                       <!--<a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list_sales_head">Sales Head Order List</a>
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list_sales_head">TL Verification Order List</a>-->
                                       
                                       
                                        <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/finance_orders_list">Finance Order List</a>
                                       
                                       
                                        <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/reconciliation_orders_list">Reconciliation Order List</a>
                                       
                                       
                                        <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/transport_orders_list">Client Scope Transport Order List</a>
                                        <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/transport_orders_list_own">Own Scope Transport Order List</a>
                                      
                                      
                                      <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/pick_up_loading">PickUP / Loading</a>
                                       
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/driver_orders_list">Driver Panel</a>
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list_purchase">Purchase Verification Order List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list_md">MD Verification Order List</a>
                                       
                                       
                                       
                                      
              

                                     <!--  <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-utility" role="button">
                                             <span data-key="t-utility">Customers Accounts</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-utility">
                                              <a class="dropdown-item" href="#">Billing history</a>
                                              <a class="dropdown-item" href="#">Payment history</a>
                                             
                                          </div>
                                       </div>-->





                                        <!-- <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-utility" role="button">
                                             <span data-key="t-utility">Vendor POS</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-utility">
                                               <a class="dropdown-item" href="#">Create Pos</a>
                                             <a class="dropdown-item" href="#">Billing history</a>
                                              <a class="dropdown-item" href="#">Payment history</a>
                                             
                                          </div>
                                       </div>-->












                                    </div>
                                 </li>









                          <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-user" role="button">
                                       <i data-feather="users"></i><span data-key="t-extra-pages">Users </span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-user">
                                     
                                     
                                     
                                       
                                       <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication">Customers</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">

             <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/customer_add">Customer Creation</a>
             <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/customer_list">Customer List</a>
                  

                                          
                                          </div>
                                       </div>


                                       
                                       
                               
                                      






                                    </div>
                                 </li>
                                 
                                 
                                 
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-route" role="button">
                                       <i data-feather="map"></i><span data-key="t-tasks">Route</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-route">
                                
                                            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/group/route">Route Creation</a>
                                            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/group/locality">Locality</a>
                                              
                                                             
                                     
                                       
                                    
                                    </div>
                                 </li>
                                 
                                 
                                
                                <li class="nav-item dropdown">
                                   
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-report" role="button">
                                       <i data-feather="file"></i><span data-key="t-report">Reports</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    
                                     <div class="dropdown-menu" aria-labelledby="topnav-report">

                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/salesreport">Sales Day Book</a>
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/vendor_purchase_report">Purchase Day Book</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/order_balance_report">Order Balance Report </a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/sales_product_report">Sales Product Report</a>
                                              <!--<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/customer_order_report">Customer Order Report</a>-->
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/customer_yes_or_no_report">Customer YES or NO Report</a>
                                               
                                             
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/salse_group_order_report">Sales Group Report</a>
                                            
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/vendor_purchase_product_report">Purchase Product Report</a>
                                          
                                    </div>


                                    
                                 </li>




                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-driver" role="button">
                                       <i data-feather="trello"></i><span data-key="t-tasks">Tickets</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-driver">
                                
               
                                             <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/ticket/inbox">Compose</a>
               
                                 
                
                  
                                 
                                     
                                       
                                    
                                    </div>
                                 </li>



                               

                               
                              </ul>
                           </div>
                        </nav>
                        
                             <?php
                            }
                           ?>
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                            <?php
                             if($this->session->userdata['logged_in']['access']=='16')
                            {
                                
                             ?>
                              <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                           <div class="collapse navbar-collapse" id="topnav-menu-content">
                              <ul class="navbar-nav">
                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo base_url(); ?>index.php/dashboard" id="topnav-dashboard" role="button">
                                    <i data-feather="home"></i><span data-key="t-dashboard">Dashboard</span>
                                    </a>
                                 </li>
                                 
                                 
                                 
                                 
                                 


                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button">
                                       <i data-feather="file-text"></i><span data-key="t-extra-pages">Sales</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-more">

                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/ordercreate">Sales Creation</a>
                                       
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/enquiries_list">Enquiry List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/quotation_list">Quotation List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list">Order List</a>
                                       
                                       
                                      <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/vehicle_wise_assigned">Vehicle Wise Assigned Status</a>
                                      <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/reconciliation_orders_list">Reconciliation Order List</a>
                                      <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/transport_complated_list">Transport Completed List</a>

                                     <!--  <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-utility" role="button">
                                             <span data-key="t-utility">Customers Accounts</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-utility">
                                              <a class="dropdown-item" href="#">Billing history</a>
                                              <a class="dropdown-item" href="#">Payment history</a>
                                             
                                          </div>
                                       </div>-->





                                        <!-- <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-utility" role="button">
                                             <span data-key="t-utility">Vendor POS</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-utility">
                                               <a class="dropdown-item" href="#">Create Pos</a>
                                             <a class="dropdown-item" href="#">Billing history</a>
                                              <a class="dropdown-item" href="#">Payment history</a>
                                             
                                          </div>
                                       </div>-->












                                    </div>
                                 </li>









                          <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-user" role="button">
                                       <i data-feather="users"></i><span data-key="t-extra-pages">Users </span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-user">
                                     
                                     
                                     
                                         
                                       <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication">Sales Users</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">
                     
                      
                                      <?php
                                        if($this->session->userdata['logged_in']['userid']=='23' || $this->session->userdata['logged_in']['userid']=='1')
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
                                       
                                       <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication">Customers</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">

             <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/customer_add">Customer Creation</a>
             <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/customer_list">Customer List</a>
                  

                                          
                                          </div>
                                       </div>


                                       
                                       
                               
                                      






                                    </div>
                                 </li>
                                 
                                 
                                 
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-route" role="button">
                                       <i data-feather="map"></i><span data-key="t-tasks">Route</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-route">
                                
                                            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/group/route">Route Creation</a>
                                            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/group/locality">Locality</a>
                                              
                                                             
                                     
                                       
                                    
                                    </div>
                                 </li>
                                 
                                 
                                
                                <li class="nav-item dropdown">
                                   
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-report" role="button">
                                       <i data-feather="file"></i><span data-key="t-report">Reports</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    
                                     <div class="dropdown-menu" aria-labelledby="topnav-report">

                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/salesreport">Sales Day Book</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/vendor_purchase_report">Purchase Day Book</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/order_balance_report">Order Balance Report </a>
                                             
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/sales_product_report">Sales Product Report</a>
                                              <!--<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/customer_order_report">Customer Order Report</a>-->
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/customer_yes_or_no_report">Customer YES or NO Report</a>
                                               
                                               
                                               
                                               
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/salse_group_order_report">Sales Group Report</a>
                                              
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/vendor_purchase_product_report">Purchase Product Report</a>
                                          
                                    </div>


                                    
                                 </li>




                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-driver" role="button">
                                       <i data-feather="trello"></i><span data-key="t-tasks">Tickets</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-driver">
                                
               
                                             <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/ticket/inbox">Compose</a>
               
                                 
                
                  
                                 
                                     
                                       
                                    
                                    </div>
                                 </li>



                               

                               
                              </ul>
                           </div>
                        </nav>
                        
                             <?php
                            }
                           ?>
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           <?php
                             if($this->session->userdata['logged_in']['access']=='7')
                            {
                                
                             ?>
                              <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                           <div class="collapse navbar-collapse" id="topnav-menu-content">
                              <ul class="navbar-nav">
                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo base_url(); ?>index.php/dashboard" id="topnav-dashboard" role="button">
                                    <i data-feather="home"></i><span data-key="t-dashboard">Dashboard</span>
                                    </a>
                                 </li>
                                 
                                 
                                 
                                 
                                  

                                
                                 
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-production" role="button">
                                       <i data-feather="tool"></i><span data-key="t-extra-production">Production</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-production">
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/production">Production Plan</a>
                                    
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/production_orders_list">Production Orders</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/production_panel_list">Production Process List</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/production_quality_check_panel_list">Quality Check</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/warehouse_panel_list">Warehouse</a>
                                    
                                    
                                    </div>
                                 </li>
                                 
                                 
                                 
                                 

                                 
                                 




                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-driver" role="button">
                                       <i data-feather="trello"></i><span data-key="t-tasks">Tickets</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-driver">
                                
               
               
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/ticket/inbox">Compose</a>
               
                                 
                  
                                 
                                     
                                       
                                    
                                    </div>
                                 </li>



                               

                               
                              </ul>
                           </div>
                        </nav>
                        
                             <?php
                            }
                           ?>
                           
                           
                           
                           
                           <?php
                            // MD Verification
                             if($this->session->userdata['logged_in']['access']=='10')
                            {
                                
                             ?>
                              <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                           <div class="collapse navbar-collapse" id="topnav-menu-content">
                              <ul class="navbar-nav">
                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo base_url(); ?>index.php/dashboard" id="topnav-dashboard" role="button">
                                    <i data-feather="home"></i><span data-key="t-dashboard">Dashboard</span>
                                    </a>
                                 </li>
                                 
                                 
                                 
                                 
                                  
                                 
                                 

                                 
                                 
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-purchase" role="button">
                                       <i data-feather="box"></i><span data-key="t-extra-products">Purchase</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-purchase">
                                        
                                        
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/purchase/purchase_list">Purchase & inventory Create</a>
                                     <!--<a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/purchase/purchase_inward_list">Inward List</a>-->
                                     

                                    </div>
                                 </li>
                                 
                                 


                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button">
                                       <i data-feather="file-text"></i><span data-key="t-extra-pages">Sales</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-more">

                                     
                                          <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/enquiries_list_md">Enquiry Price Request List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list_md">MD Verification Order List</a>
                                       
                                       
                                       



                                    </div>
                                 </li>









                                
                              
                                 
                                 
                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="" id="topnav-products" role="button">
                                       <i data-feather="box"></i><span data-key="t-extra-products">Ledger</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    
                                    
                                     <div class="dropdown-menu" aria-labelledby="topnav-products">
                                         
                                         
                                              <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-accountsmaster" role="button">
                                             <span data-key="t-authentication">Accounts</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-accountsmaster">
                                                         
                                                         
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/balancereport?type=3">Non Cash Balance Report </a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/balancereport?type=1">Cash In Head Report</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/accountsreport">Accounts Report</a>
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/trial_balance"> Balance Sheet</a>
                                                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/trial_balance_full">Trial Balance</a>
                                                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/salesreport"> Day Book </a>         
                                          
                                          </div>
                                       </div>
                                              
                                              
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/balancereport_base_ledger">All Ledger</a>
 
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/ledger">Customer Ledger</a>
                                              
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/vendor/ledger">Vendor Ledger</a>
                                              
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/driver/ledger">Driver Ledger</a>
                                              
                                             
                                    </div>


                                    
                                 </li>





                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-driver" role="button">
                                       <i data-feather="trello"></i><span data-key="t-tasks">Tickets</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-driver">
                                
               
               
                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/ticket/inbox">Compose</a>
               
                                 
                  
                                 
                                     
                                       
                                    
                                    </div>
                                 </li>



                               

                               
                              </ul>
                           </div>
                        </nav>
                        
                             <?php
                            }
                           ?>
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                            <?php
                            // Salest Team
                             if($this->session->userdata['logged_in']['access']=='12' || $this->session->userdata['logged_in']['access']=='17')
                            {
                                
                             ?>
                              <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                                 <div class="collapse navbar-collapse" id="topnav-menu-content">
                                 <ul class="navbar-nav">
                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo base_url(); ?>index.php/order/ordercreate" id="topnav-dashboard" role="button">
                                    <i data-feather="home"></i><span data-key="t-dashboard">Dashboard</span>
                                    </a>
                                 </li>
                                 
                                 
                                 
                                 
                                  
                                 
                                 

                                 


                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button">
                                       <i data-feather="file-text"></i><span data-key="t-extra-pages">Sales</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-more">

                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/ordercreate">Sales Creation</a>
                                       
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/enquiries_list">Enquiry List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/quotation_list">Quotation List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list">Order List</a>
                                       
                                       
                                        
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/purchase/clinet_inward_list">Clinet inward List</a>
                                     
                                      <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/vehicle_wise_assigned">Vehicle Wise Assigned Status</a>
                                      <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/transport_complated_list">Transport Completed List</a>
                                    


                                    </div>
                                 </li>








                               
                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-user" role="button">
                                       <i data-feather="users"></i><span data-key="t-extra-pages">Customer </span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-user">
                                     
                                     
                                     
                                     
             <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/customer_list">Customer List</a>
                  




                                    </div>
                                 </li>
                                 
                                 
                                     <li class="nav-item dropdown">
                                   
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-report" role="button">
                                       <i data-feather="file"></i><span data-key="t-report">Reports</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    
                                     <div class="dropdown-menu" aria-labelledby="topnav-report">

                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/salesreport">Sales Day Book </a>
                                              <!--<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/vendor_purchase_report">Purchase Day Book</a>-->
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/order_balance_report">Order Balance Report </a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/sales_product_report">Sales Product Report</a>
                                              <!--<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/customer_order_report">Customer Order Report</a>-->
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/customer_yes_or_no_report">Customer YES or NO Report</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/salse_group_order_report">Sales Group Report</a>
                                              <!--<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/vendor_purchase_product_report">Purchase Product Report</a>-->
                                          
                                    </div>


                                    
                                 </li>
                               




                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-driver" role="button">
                                       <i data-feather="trello"></i><span data-key="t-tasks">Tickets</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-driver">
                                
               
                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/ticket/inbox">Compose</a>
               
                                 
                
                  
                                       
                                    
                                    </div>
                                 </li>



                               

                               
                              </ul>
                           </div>
                        </nav>
                        
                             <?php
                            }
                           ?>
                           
                           
                           
                           
                           
                               <?php
                               
                               // Sales Head
                               
                             if($this->session->userdata['logged_in']['access']=='11')
                            {
                                
                             ?>
                              <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                                 <div class="collapse navbar-collapse" id="topnav-menu-content">
                                 <ul class="navbar-nav">
                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo base_url(); ?>index.php/order/orders_list" id="topnav-dashboard" role="button">
                                    <i data-feather="home"></i><span data-key="t-dashboard">Dashboard</span>
                                    </a>
                                 </li>
                                 
                                 
                                 
                                 
                                  
                                 
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button">
                                       <i data-feather="file-text"></i><span data-key="t-extra-pages">Sales</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-more">

                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/ordercreate">Sales Creation</a>
                                       
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/enquiries_list">Enquiry List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/quotation_list">Quotation List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list">Order List</a>
                                       
                                       
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/purchase/clinet_inward_list">Clinet inward List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/vehicle_wise_assigned">Vehicle Wise Assigned Status</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/reconciliation_orders_list">Reconciliation Order List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/transport_complated_list">Transport Completed List</a>
                                    

                                    </div>
                                 </li>

                                 


                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button">
                                       <i data-feather="file-text"></i><span data-key="t-extra-pages">Sales Price Request</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-more">

                                       <!--<a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list">Order List</a>-->
                                       
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/enquiries_price_request_list">Enquiry  Price Request List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/quotation_price_request_list">Quotation Price Request List</a>
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list_sales_head">Order Price Request List</a>
                                       
                                    </div>
                                 </li>



  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-user" role="button">
                                       <i data-feather="users"></i><span data-key="t-extra-pages">Customer </span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-user">
                                     
                                     
                                     
             <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/customer_add">Customer Creation</a>        
             <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/customer_list">Customer List</a>
                  




                                    </div>
                                 </li>




                               
                               

    <li class="nav-item dropdown">
                                   
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-report" role="button">
                                       <i data-feather="file"></i><span data-key="t-report">Reports</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    
                                     <div class="dropdown-menu" aria-labelledby="topnav-report">

                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/salesreport">Sales Day Book </a>
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/vendor_purchase_report">Purchase Day Book</a>
                                               
                                               
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/order_balance_report">Order Balance Report </a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/sales_product_report">Sales Product Report</a>
                                              
                                              
                                              
                                              <!--<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/customer_order_report">Customer Order Report</a>-->
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/customer_yes_or_no_report">Customer YES or NO Report</a>
                                               
                                             
                                               
                                               
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/salse_group_order_report">Sales Group Report</a>
                                              
                                             
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/vendor_purchase_product_report">Purchase Product Report</a>
                                          
                                    </div>


                                    
                                 </li>


                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-driver" role="button">
                                       <i data-feather="trello"></i><span data-key="t-tasks">Tickets</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-driver">
                                
               
               
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/ticket/inbox">Compose</a>
               
                                 
                
                  
                                       
                                    
                                    </div>
                                 </li>



                               

                               
                              </ul>
                           </div>
                        </nav>
                        
                             <?php
                            }
                           ?>
                           
                           
                           
                           
                           
                             <?php
                             if($this->session->userdata['logged_in']['access']=='5')
                            {
                                
                             ?>
                              <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                                 <div class="collapse navbar-collapse" id="topnav-menu-content">
                                 <ul class="navbar-nav">
                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo base_url(); ?>index.php/order/finance_orders_list" id="topnav-dashboard" role="button">
                                    <i data-feather="home"></i><span data-key="t-dashboard">Dashboard</span>
                                    </a>
                                 </li>
                                 
                                 
                                 
                                 
                                  
                                 
                                 

                                 


                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button">
                                       <i data-feather="file-text"></i><span data-key="t-extra-pages">Finance Sales</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-more">

                                       
                                       
                                        <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/enquiries_list">Enquiry List</a>
                                        <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/quotation_list">Quotation List</a>
                                        <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list">Order List</a>
                                        
                                        
                                         
                                       <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/purchase/clinet_inward_list">Clinet inward List</a>
                                     
                                        <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/finance_orders_list">Finance Order List</a>
                                        <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/reconciliation_orders_list">Reconciliation Order List</a>
                                       
                                       
                                    


                                    </div>
                                 </li>





  


                               
                                    


   <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-user" role="button">
                                       <i data-feather="users"></i><span data-key="t-extra-pages">Users </span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-user">
                                     
                                 
                                       
                                       
                                         <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication">Internal Users</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">

                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/group/user_group">Users Group</a>
                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/users/usersindex">Users Creation</a>
                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/users/user_list">Users List</a>
                 
                                          
                                          </div>
                                       </div>
                                      
                                       
                                       
                                      
                                       
                                       
                                       <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication">Customers</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">

             <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/customer_add">Customer Creation</a>
             <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/customer_list">Customer List</a>
                  

                                          
                                          </div>
                                       </div>






<div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication">Vendors</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">

              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/vendor/vendor_add">Vendor Creation</a>
                                  <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/vendor/vendor_list">Vendor List</a>


                                          
                                          </div>
                                       </div>





                                       
                                       
                               
                                      






                                    </div>
                                 </li>





                                   <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-purchase" role="button">
                                       <i data-feather="box"></i><span data-key="t-extra-products">Purchase</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-purchase">
                                        
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/storage">Storage Create</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/racksetup">Rack & Bin SetUp</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/purchase/purchase_list">Purchase & inventory Create</a>
                                     <!--<a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/purchase/purchase_inward_list">Inward List</a>-->
                                     

                                    </div>
                                 </li>





   <li class="nav-item dropdown">
                                   
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-ledger" role="button">
                                       <i data-feather="map"></i><span data-key="t-ledger">Finance</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    
                                     <div class="dropdown-menu" aria-labelledby="topnav-ledger">
                                         
                                         
                                               
                                     <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-accountsmaster" role="button">
                                             <span data-key="t-authentication">Master</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-accountsmaster">
                                                      
                                                            <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/partytype">Party Type</a>
                                                            <!--<a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/partytype/partyusers">Party Users</a>-->
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/accounttype">Ledger Type</a>
                                                          <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/accountheads">Ledger Account Heads</a>
                                                         
                                          
                                          </div>
                                       </div>
                                       
                                       
                                         <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-accountsmaster" role="button">
                                             <span data-key="t-authentication">Accounts</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-accountsmaster">
                                                         
                                                         
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/balancereport?type=3">Non Cash Balance Report </a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/balancereport?type=1">Cash In Head Report</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/accountsreport">Accounts Report</a>
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/trial_balance">Balance Sheet</a>
                                                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/trial_balance_full">Trial Balance</a>
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/salesreport"> Day Book </a>
                                                         
                                          
                                          </div>
                                       </div>
                                    
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bankaccount">Bank Account</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bankdeposit">Bank Deposit</a>
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bankaccount/statement">Bank Statement</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/manual_journals">Manual Journals</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/voucher">Voucher</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/payment_received">Receivable / Payout</a>
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/balancereport_base_ledger">All Ledger</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/ledger">Customer Ledger</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/vendor/ledger">Vendor Ledger</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/driver/ledger">Driver Ledger</a>
                                              

                                    </div>


                                    
                                 </li>

 


                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-driver" role="button">
                                       <i data-feather="trello"></i><span data-key="t-tasks">Tickets</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-driver">
                                
               
               
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/ticket/inbox">Compose</a>
               
                                 
                                       
                                    
                                    </div>
                                 </li>



                               

                               
                              </ul>
                           </div>
                        </nav>
                        
                             <?php
                            }
                           ?>
                           
                           
                                <?php
                             if($this->session->userdata['logged_in']['access']=='14')
                            {
                                
                             ?>
                              <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                                 <div class="collapse navbar-collapse" id="topnav-menu-content">
                                 <ul class="navbar-nav">
                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo base_url(); ?>index.php/order/finance_orders_list" id="topnav-dashboard" role="button">
                                    <i data-feather="home"></i><span data-key="t-dashboard">Dashboard</span>
                                    </a>
                                 </li>
                                 
                                 
                                 
                                 
                                  
                                 
                                 

                                 


                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button">
                                       <i data-feather="file-text"></i><span data-key="t-extra-pages">Finance Sales</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-more">

                                       
                                        <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/reconciliation_orders_list">Reconciliation Order List</a>
                                       
                                       
                                    


                                    </div>
                                 </li>





  


                            




   <li class="nav-item dropdown">
                                   
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-bank" role="button">
                                       <i data-feather="map"></i><span data-key="t-ledger">Bank Accounts</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    
                                     <div class="dropdown-menu" aria-labelledby="topnav-bank">
                                         
                                         
                                               
                                  
                                    
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bankaccount">Add Bank Account</a>
                                              
                                    </div>


                                    
                                 </li>


                                   <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-purchase" role="button">
                                       <i data-feather="box"></i><span data-key="t-extra-products">Purchase</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-purchase">
                                        
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/storage">Storage Create</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/racksetup">Rack & Bin SetUp</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/purchase/purchase_list">Purchase & inventory Create</a>
                                     <!--<a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/purchase/purchase_inward_list">Inward List</a>-->
                                     

                                    </div>
                                 </li>

   <li class="nav-item dropdown">
                                   
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-ledger" role="button">
                                       <i data-feather="map"></i><span data-key="t-ledger">Finance</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    
                                     <div class="dropdown-menu" aria-labelledby="topnav-ledger">
                                         
                                        
                                    
                                                <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-accountsbank" role="button">
                                             <span data-key="t-authentication">Master</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-accountsbank">
                                              
                                              
                                                 <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/partytype">Party Type</a>
                                                 <!--<a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/partytype/partyusers">Party Users</a>-->
 
                                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/accounttype">Ledger Type</a>
                                                          <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/accountheads">Ledger Account Heads</a>
                                                          
                                                        
                                          
                                          </div>
                                       </div>
                                       
                                       
                                        <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-accountsmaster" role="button">
                                             <span data-key="t-authentication">Accounts</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-accountsmaster">
                                                         
                                                         
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/balancereport?type=3">Non Cash Balance Report </a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/balancereport?type=1">Cash In Head Report</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/accountsreport">Accounts Report</a>
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/trial_balance">Balance Sheet</a>
                                                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/trial_balance_full">Trial Balance</a>
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/salesreport"> Day Book </a>
                                                         
                                          
                                          </div>
                                       </div>
                                       
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bankdeposit">Bank Deposit</a>    
                                                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bankaccount/statement">Bank Statement</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/manual_journals">Manual Journals</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/voucher">Voucher</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/payment_received">Receivable / Payout</a>
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/report/balancereport_base_ledger">All Ledger</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/customer/ledger">Customer Ledger</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/vendor/ledger">Vendor Ledger</a>
                                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/driver/ledger">Driver Ledger</a>
                                              

                                    </div>


                                    
                                 </li>

  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-user" role="button">
                                       <i data-feather="users"></i><span data-key="t-extra-pages">Users </span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-user">
                                     
                                     
                                     
                                          <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication">Internal Users</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">

                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/group/user_group">Users Group</a>
                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/users/usersindex">Users Creation</a>
                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/users/user_list">Users List</a>
                 
                                          
                                          </div>
                                       </div>
                                       
                                       

                                    </div>
                                 </li>


                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-driver" role="button">
                                       <i data-feather="trello"></i><span data-key="t-tasks">Tickets</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-driver">
                                
               
                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/ticket/inbox">Compose</a>
               
                                 
                
                  
                                       
                                    
                                    </div>
                                 </li>



                               

                               
                              </ul>
                           </div>
                        </nav>
                        
                             <?php
                            }
                           ?>
                           
                           
                           
                             <?php
                             if($this->session->userdata['logged_in']['access']=='6')
                            {
                                
                             ?>
                              <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                                 <div class="collapse navbar-collapse" id="topnav-menu-content">
                                 <ul class="navbar-nav">
                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo base_url(); ?>index.php/order/transport_orders_list" id="topnav-dashboard" role="button">
                                    <i data-feather="home"></i><span data-key="t-dashboard">Dashboard</span>
                                    </a>
                                 </li>
                                 
                                 
                                 
                                 
                                  
                                 
                                 

                                 


                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button">
                                       <i data-feather="file-text"></i><span data-key="t-extra-pages">Transport</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-more">

                                       
                                       
                                      
                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/transport_orders_list">Client Scope Transport Order List</a>
                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/transport_orders_list_own">Own Scope Transport Order List</a>
                                         
                                         
                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/pick_up_loading">PickUP / Loading</a>
                                       
                                         
                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/driver_orders_list">Driver Panel</a>
                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/vehicle_wise_assigned">Vehicle Wise Assigned Status</a>
                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/transport_complated_list">Transport Completed List</a>
                                    


                                    </div>
                                 </li>








                               
                               
   <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-user" role="button">
                                       <i data-feather="truck"></i><span data-key="t-extra-pages">Vehicle Management </span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-user">
                                     
                                     

 <div class="dropdown">
                                          <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                             <span data-key="t-authentication">Vehicle & Driver</span> 
                                             <div class="arrow-down"></div>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="topnav-auth">

                 <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/vehicle/vehicle_view">Vehicle List</a>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/driver/driverview">Driver List</a>

                  

                                          
                                          </div>
                                       </div>


                                       
                                       
                               
                                      






                                    </div>
                                 </li>
                                 
                                 
                                 
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-route" role="button">
                                       <i data-feather="map"></i><span data-key="t-tasks">Route</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-route">
                                
                                            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/group/route">Route Creation</a>
                                            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/group/locality">Locality</a>
                                              
                                                             
                                     
                                       
                                    
                                    </div>
                                 </li>




                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-driver" role="button">
                                       <i data-feather="trello"></i><span data-key="t-tasks">Tickets</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-driver">
                                
               
               
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/ticket/inbox">Compose</a>
               
                                 
                
                  
                                       
                                    
                                    </div>
                                 </li>



                               

                               
                              </ul>
                           </div>
                        </nav>
                        
                             <?php
                            }
                           ?>
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                            <?php
                             if($this->session->userdata['logged_in']['access']=='13')
                            {
                                
                             ?>
                              <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                                 <div class="collapse navbar-collapse" id="topnav-menu-content">
                                 <ul class="navbar-nav">
                                 
                                 
                                 
                                 
                                 
                                  
                                 
                                 

                                 


                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button">
                                       <i data-feather="file-text"></i><span data-key="t-extra-pages">Transport</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-more">

                                       
                                       
                                      
                                        
                                         <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/driver_orders_list">Driver Panel</a>
                                    


                                    </div>
                                 </li>








                               
                               




                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-driver" role="button">
                                       <i data-feather="trello"></i><span data-key="t-tasks">Tickets</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-driver">
                                
               
               
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/ticket/inbox">Compose</a>
               
                                 
                  
                                       
                                    
                                    </div>
                                 </li>



                               

                               
                              </ul>
                           </div>
                        </nav>
                        
                             <?php
                            }
                           ?>
                           
                           
                           
                         
                           <?php
                             if($this->session->userdata['logged_in']['access']=='4')
                            {
                                
                             ?>
                              <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                                 <div class="collapse navbar-collapse" id="topnav-menu-content">
                                 <ul class="navbar-nav">
                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo base_url(); ?>index.php/order/orders_list_purchase" id="topnav-dashboard" role="button">
                                    <i data-feather="home"></i><span data-key="t-dashboard">Dashboard</span>
                                    </a>
                                 </li>
                                 
                                 
                                 
                                 
                                  
                                 

                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-products" role="button">
                                       <i data-feather="box"></i><span data-key="t-extra-products">Products</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-products">
                                        
                                        
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/categories">Categories</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/brand">Brand</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/uom">UOM</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/products/productscreate">Product Creation</a>
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/products/products_list">Product List</a>
                                       

                                    </div>
                                 </li>
                                 
                                 
                                   <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-purchase" role="button">
                                       <i data-feather="box"></i><span data-key="t-extra-products">Purchase</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-purchase">
                                        
                                        
                                     <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/purchase/purchase_list">Purchase & inventory Create</a>
                                     <!--<a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/purchase/purchase_inward_list">Inward List</a>-->
                                     

                                    </div>
                                 </li>
                                 
                                 

                                 


                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button">
                                       <i data-feather="file-text"></i><span data-key="t-extra-pages">Sales</span> 
                                       <div class="arrow-down"></div>
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="topnav-more">

                                       
                                           <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/enquiries_list_purchase">Enquiry Price Request List</a>
                                           <!--<a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/quotation_price_request_list">Quotation Price Request List</a>-->
                                           <a class="dropdown-item"  href="<?php echo base_url(); ?>index.php/order/orders_list_purchase">Purchase Verification Order List</a>


                                    </div>
                                 </li>








                               
                               




                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-driver" role="button">
                                       <i data-feather="trello"></i><span data-key="t-tasks">Tickets</span> 
                                       <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-driver">
                                
               
               
                                               <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/ticket/inbox">Compose</a>
               
                                 
                
                  
                                       
                                    
                                    </div>
                                 </li>



                               

                               
                              </ul>
                           </div>
                        </nav>
                        
                             <?php
                            }
                           ?>
                           
                         
                        
                        
                        
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
                  <div class="dropdown d-none d-sm-inline-block">
                     <button type="button" class="btn header-item" id="mode-setting-btn">
                     <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                     <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                     </button>
                  </div>
                  <div class="dropdown d-inline-block">
                   <!--   <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i data-feather="bell" class="icon-lg"></i>
                     <span class="badge bg-danger rounded-pill">5</span>
                     </button> -->
                     <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                           <div class="row align-items-center">
                              <div class="col">
                                 <h6 class="m-0"> Notifications </h6>
                              </div>
                              <div class="col-auto">
                                 <a href="#!" class="small text-reset text-decoration-underline"> Unread (3)</a>
                              </div>
                           </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                           <a href="#!" class="text-reset notification-item">
                              <div class="d-flex">
                                 <img src="<?php echo base_url(); ?>assets/images/users/avatar-3.jpg"
                                    class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                 <div class="flex-grow-1">
                                    <h6 class="mb-1">James Lemire</h6>
                                    <div class="font-size-13 text-muted">
                                       <p class="mb-1">It will seem like simplified English.</p>
                                       <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hours ago</span></p>
                                    </div>
                                 </div>
                              </div>
                           </a>
                           <a href="#!" class="text-reset notification-item">
                              <div class="d-flex">
                                 <div class="avatar-sm me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                    <i class="bx bx-cart"></i>
                                    </span>
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="mb-1">Your order is placed</h6>
                                    <div class="font-size-13 text-muted">
                                       <p class="mb-1">If several languages coalesce the grammar</p>
                                       <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                    </div>
                                 </div>
                              </div>
                           </a>
                           <a href="#!" class="text-reset notification-item">
                              <div class="d-flex">
                                 <div class="avatar-sm me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                    <i class="bx bx-badge-check"></i>
                                    </span>
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="mb-1">Your item is shipped</h6>
                                    <div class="font-size-13 text-muted">
                                       <p class="mb-1">If several languages coalesce the grammar</p>
                                       <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                    </div>
                                 </div>
                              </div>
                           </a>
                           <a href="#!" class="text-reset notification-item">
                              <div class="d-flex">
                                 <img src="<?php echo base_url(); ?>assets/images/users/avatar-6.jpg"
                                    class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                 <div class="flex-grow-1">
                                    <h6 class="mb-1">Salena Layfield</h6>
                                    <div class="font-size-13 text-muted">
                                       <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                       <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hours ago</span></p>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>
                        <div class="p-2 border-top d-grid">
                           <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                           <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span> 
                           </a>
                        </div>
                     </div>
                  </div>
                 
                  <div class="dropdown d-inline-block">
                    
                     <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span><?php echo $this->session->userdata['logged_in']['username']; ?></span>
                   
                    
                     <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                      
                        <!--<a class="dropdown-item" href=""><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> View Log</a>-->
                        <!--<div class="dropdown-divider"></div>-->
                        <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/adminmain/logout"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>
