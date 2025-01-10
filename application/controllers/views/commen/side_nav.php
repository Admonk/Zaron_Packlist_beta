    <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $this->session->userdata['logged_in']['username']; ?></span>
                  <span class="text-secondary text-small">


                    <?php 

                    if($this->session->userdata['logged_in']['access']=='1')
                    {
                       echo 'Super Admin';
                    }



                     ?>
                    



                  </span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>index.php/dashboard">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
                <span class="menu-title">Customers</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
              <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                  
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>index.php/customer/customer_add">Customer Add</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>index.php/customer/customer_list">Customer List</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#apps" aria-expanded="false" aria-controls="apps">
                <span class="menu-title">Vendors</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-cart-arrow-down menu-icon"></i>
              </a>
              <div class="collapse" id="apps">
                <ul class="nav flex-column sub-menu">

                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>index.php/vendor/vendor_add">Vendor Add</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>index.php/vendor/vendor_list">Vendor List</a></li>
                  
                </ul>
              </div>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
                <span class="menu-title">Sales Team</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="sidebar-layouts">
                <ul class="nav flex-column sub-menu">
                 
                
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>index.php/sales/sales_head">Sales Head</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>index.php/salesteam/sales_team_add">Sales Member Add</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>index.php/salesteam/sales_team_list">Sales Member List</a></li>

                </ul>
              </div>
            </li>





            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#maps" aria-expanded="false" aria-controls="maps">
                <span class="menu-title">Vehicle & Driver</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-map-marker-radius menu-icon"></i>
              </a>
              <div class="collapse" id="maps">
                <ul class="nav flex-column sub-menu">

                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>index.php/vehicle/vehicle_view">Vehicle List</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>index.php/driver/driverview">Driver List</a></li>

                  
                </ul>
              </div>
            </li>


         

         <li class="nav-item sidebar-actions">
             
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-bold mb-2">Accounts</h6>
                </div>
               
              </span>
            </li> 


            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">New Order</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>



             <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <span class="menu-title">Order Management</span>
                <i class="menu-arrow"></i>
               <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
              <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">

                  <li class="nav-item"> <a class="nav-link" href="#">All Orders</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#">Pending Orders</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#">Processing Orders</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#">Delivered Orders</a></li>
                 
                </ul>
              </div>
            </li>




            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#icons_set" aria-expanded="false" aria-controls="icons_set">
                <span class="menu-title">Customers Accounts</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
              <div class="collapse" id="icons_set">
                <ul class="nav flex-column sub-menu">
                 <li class="nav-item"> <a class="nav-link" href="#">Billing history</a></li>
                   <li class="nav-item"> <a class="nav-link" href="#">Payment history</a></li>
                </ul>
              </div>
            </li>

          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#e-commerce" aria-expanded="false" aria-controls="e-commerce">
                <span class="menu-title">Vendor POS</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-shopping menu-icon"></i>
              </a>
              <div class="collapse" id="e-commerce">
                <ul class="nav flex-column sub-menu">
                   <li class="nav-item"> <a class="nav-link" href="#">Add Pos</a></li>
                   <li class="nav-item"> <a class="nav-link" href="#">Billing history</a></li>
                   <li class="nav-item"> <a class="nav-link" href="#">Payment history</a></li>
                </ul>
              </div>
            </li>





            
          
             <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-bold mb-2">Site Settings</h6>
                </div>
               
               
              </span>
            </li> 


            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
                <span class="menu-title">Users Management</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-cards-variant menu-icon"></i>
              </a>
              <div class="collapse" id="ui-advanced">
                <ul class="nav flex-column sub-menu">

                  
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>index.php/users/usersindex">Users Add</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>index.php/users/user_list">Users List</a></li>
                 
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
                <span class="menu-title">Group Management</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-group menu-icon"></i>
              </a>
              <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                  
                   <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>index.php/group/user_group">Users Group</a></li>
                   <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>index.php/group/sales_group">Sales Group</a></li>
                   <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>index.php/group/route">Route</a></li>
                 
                </ul>
              </div>
            </li>








           <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-bold mb-2">Ticket Management</h6>
                </div>
              </span>
            </li> 



             <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-advanced-set" aria-expanded="false" aria-controls="ui-advanced-set">
                <span class="menu-title">Tickets</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-ticket-account menu-icon"></i>
              </a>
              <div class="collapse" id="ui-advanced-set">
                <ul class="nav flex-column sub-menu">

                  
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>index.php/ticket/ticketcreate">Create Ticket</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>index.php/ticket/ticket_history">Ticket History</a></li>
                 
                </ul>
              </div>
            </li>




          </ul>
        </nav>