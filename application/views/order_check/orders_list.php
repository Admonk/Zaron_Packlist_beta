<?php 
include "table_header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
   div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
}
table.table.align-middle.table-nowrap.newBorderedTable {
    font-size: 11px;
}
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>
     
     
     
     
     
     
     
     
     
     
     
     
       <div class="main-content">
            <div class="page-content">
               <div class="container-fluid">
                   
                                      

                         <div class="row">
                             
                             
                              
      















<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Import Products</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                         <form enctype='multipart/form-data' action="<?php echo base_url(); ?>sale_import.php" method="POST" >
                                                        <div class="modal-body">
                                                           
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">File:</label>
                                                                    <input type="file" class="form-control" required name="file" id="recipient-name">
                                                                </div>
                                                                <div class="mb-1">
                                                                    <label for="message-text" class="col-form-label">Sample : </label>
                                                                    <a href="<?php echo base_url(); ?>sales_import.xlsx">Download</a>
                                                                </div>
                                                                
                                                                <!--<small style="color:red">If create new product mention the  <b>PRODUCT ID 0</b></small>
                                                                <br>
                                                                <small style="color:red">If create new category mention the <b>CATEGORY ID 0</b></small>-->
                                                            
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="sumnit" class="btn btn-primary">Import</button>
                                                        </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->














          
                            <div class="col-12">
                                
                      
                                          <div class="row">
                                       <div class="col-m-12">
                                          <div class="card mb-1">
                                             <div class="card-header align-items-start d-flex p-3">
                                                <div class="flex-shrink-0">
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('orders_process')">
                                                     
                                                       <?php
                                                        // Shop Team
                                                        if($this->session->userdata['logged_in']['access']=='20')
                                                        {
                                                        
                                                        ?>
                                                     
                                                         <li class="nav-item" >
                                                         <a class="nav-link"  href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id=<?php echo $neworder_id; ?>" role="tab">
                                                         <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                         <span class="d-none d-sm-block">New Order </span> 
                                                         </a>
                                                         </li>
                                                       
                                                        
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link " data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('orders_process',0)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">Open Order <span class="badge rounded-pill bg-warning  float-end"> {{pending}} </span></span> 
                                                         </a>
                                                      </li>
                                                      
                                                         
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',4)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Purchase Requisition Sent<span class="badge rounded-pill bg-success float-end"> {{requestp}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      
                                                       <li class="nav-item active">
                                                         <a class="nav-link " data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Completed Order <span class="badge rounded-pill bg-success  float-end"> {{proceed}} </span></span>   
                                                         </a>
                                                      </li> 
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',28)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Approvel Request List <span class="badge rounded-pill bg-primary  float-end"> {{request_order}} </span></span>   
                                                         </a>
                                                       </li>
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link " data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',110)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Partial Orders <span class="badge rounded-pill bg-success  float-end"> {{p_completed}} </span></span>   
                                                         </a>
                                                      </li> 
                                                     

                                                         <li class="nav-item">
                                                         <a class="nav-link " data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',111)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Partial Delivery <span class="badge rounded-pill bg-success  float-end"> {{p_d_completed}} </span></span>   
                                                         </a>
                                                      </li> 
                                                     
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',-1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Canceled <span class="badge rounded-pill bg-danger  float-end"> {{cancel}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                       <!--  <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',-2)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Re-Assigned <span class="badge rounded-pill bg-danger  float-end"> {{reassign}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                         <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',27)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Approvel Rejected List <span class="badge rounded-pill bg-danger  float-end"> {{rejected_order}} </span></span>   
                                                         </a>
                                                       </li>-->
                                                      
                                                      <?php
                                                     
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            
                                                            <li class="nav-item">
                                                         <a class="nav-link " data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('orders_process',0)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">Open Order <span class="badge rounded-pill bg-warning  float-end"> {{pending}} </span></span> 
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link " data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',156)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">New Customer <span class="badge rounded-pill bg-success  float-end"> {{missing}} </span></span>   
                                                         </a>
                                                      </li> 
                                                      
                                                      
                                                       <li class="nav-item" style="display:none;">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',4)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Purchase Requisition Sent<span class="badge rounded-pill bg-success float-end"> {{requestp}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                       <li class="nav-item ">
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Completed Order <span class="badge rounded-pill bg-success  float-end"> {{proceed}} </span></span>   
                                                         </a>
                                                      </li> 
                                                      
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',28)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Approvel Request List <span class="badge rounded-pill bg-primary  float-end"> {{request_order}} </span></span>   
                                                         </a>
                                                       </li>
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link " data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',110)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Partial Orders <span class="badge rounded-pill bg-success  float-end"> {{p_completed}} </span></span>   
                                                         </a>
                                                      </li> 
                                                     
                                                       <li class="nav-item">
                                                         <a class="nav-link " data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',111)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Partial Delivery <span class="badge rounded-pill bg-success  float-end"> {{p_d_completed}} </span></span>   
                                                         </a>
                                                      </li> 
                                                     
                                                     

                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',3)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Request To TL Approvel <span class="badge rounded-pill bg-danger  float-end"> {{request}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                       
                                                      
                                                      
                                                      <!--  <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',4)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Request To Purchase Team <span class="badge rounded-pill bg-danger  float-end"> {{purchase_team}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',5)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Purchase Team Price  Request To MD <span class="badge rounded-pill bg-success  float-end"> {{md_team}} </span></span>   
                                                         </a>
                                                      </li>-->
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',-1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Canceled <span class="badge rounded-pill bg-danger  float-end"> {{cancel}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      <!--   <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',-2)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Re-Assigned <span class="badge rounded-pill bg-danger  float-end"> {{reassign}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',27)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Approvel Rejected List <span class="badge rounded-pill bg-danger  float-end"> {{rejected_order}} </span></span>   
                                                         </a>
                                                       </li>-->
                                                      
                                                      <li class="nav-item">&nbsp;&nbsp;&nbsp;&nbsp;</li>
                                                      <li class="nav-item">&nbsp;&nbsp;&nbsp;&nbsp;</li>
                                                      <li class="nav-item">&nbsp;&nbsp;&nbsp;&nbsp;</li>
                                                      <li class="nav-item">
                                                                       
                             
                                                          
     
     <button type="button" style="float: right;margin: 12px -25px;"  class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Import</button>
                 


                                               </li>
                                                            
                                                            <?php
                                                        }
                                                    
                                                        ?>
                                                      
                                                   </ul>
                               


                                                </div>
                                             </div>
                                             <!-- end card header -->
                                             <!-- end card-body -->
                                          </div>
                                       </div>
                                    </div>
                                          <div class="row">
                                              
                                              <div class="col-12">
                                                  <div class="card shadow-none">
                                                      <div class="card-body">
                                                          
                                                          
                                                          
                                                          <!--datatable="ng" dt-options="vm.dtOptions"-->
                                                            <input type="hidden" id="nextnumber" value="0">   
                                                            <input type="hidden" id="prenumber" value="10">  
                                                            <input type="hidden" id="pageSize" value="10">  
                                                            <input type="hidden" id="order_base" value="1">
                                                          
                                 
                                                         
                          <div class="row" style="margin-bottom: 10px;">                                    
                            <div class="col-sm-3">
                            <div class="dataTables_length" id="example_length">
                                <label>
                                    Records
                                <select name="example_length" aria-controls="example" class="form-control input-sm" ng-model="pageSize" ng-change="pageSizeChanged()">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="1000">1000</option>
                                </select> </label>
                            </div>
                         </div>
                          <div class="col-sm-3">
                          <label>From Date: </label><input type="date" class="form-control" id="from_date" ng-model="from_date" ng-change="DateFilter()">
                          </div>
                          
                           <div class="col-sm-3">
                           <label>To Date:</label><input type="date" class="form-control" id="to_date" ng-model="to_date" ng-change="DateFilter()">
                           </div>
                           
                           
                         <div class="col-sm-3">
                        <div id="example_filter" class="dataTables_filter">
                            <label>Search:</label><input type="search" class="form-control input-sm" placeholder="Order No,Name,phone,Sales Person" aria-controls="example" ng-model="searchText" ng-change="searchTextChanged()">
                        </div>
                    </div>
                       </div>
                                                <div class="table-responsive" >               
                                                              <table class="table align-middle table-nowrap newBorderedTable" >
                                                                  <thead>
                                                                      <tr>
                                                                          <th>#</th>
                                                                          <th>Order No</th>
                                                                          <th>Name</th>
                                                                          <th>Phone</th>
                                                                          <th>Commission</th>
                                                                          <th>Total</th>
                                                                          <th>Ledger </th>
                                                                          <!-- <th>Delivery</th> -->
                                                                         
                                                                          <th>Delivery_Scope</th>
                                                                         
                                                                          <th>Delivery_Date</th>
                                                                           <th>Confirm_By</th>
                                                                          <th>Payment_Mode</th>
                                                                          
                                                                          <th>Payment_Reconciliation</th>

                                                                          <th>Status</th>
                                                                          <th>Additional Status</th>
                                                                          <?php
                                                                          if($this->session->userdata['logged_in']['access']!='12')
                                                                          {
                                                                           ?>
                                                                           
                                                                           
                                                                           
                                                                          <th>Order By</th>
                                                                          
                                                                           
                                                                           <?php
                                                                              
                                                                          }
                                                                          
                                                                          ?>
                                                                          <th>Order Date (Created)</th>
                                                                          <th>Additional Date</th>

                                                                          <th>Action</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                    <tr  ng-repeat="name in namesData" ng-style="name.colorcount > 1 && {'background':'antiquewhite'}">
                                                                          <td>
                                                                              <div class="form-check font-size-16">
                                                                                  <input class="form-check-input" type="checkbox" id="customerlistcheck01">
                                                                                  <label class="form-check-label" for="customerlistcheck01"></label>
                                                                              </div>
                                                                          </td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.order_no}}</a></td>
                                                                          <td style="width: 150px;font-size: 11px;"><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.name}}</a></td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.phone}}</a>
                                                                          </td>
                                                                          
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                              
                                                                              <span ng-if="name.commission>0">{{name.commission}}</span>
                                                                              
                                                                          </a></td>
                                                                           <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.totalamount}}</a></td>
                                                                        
                                                                        
                                                                        <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.le_amount}}</a></td>
                                                                        
                                                                      <!--   <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                            {{name.delivery_charge}}
                                                                            
                                                                            </a></td> -->
                                                                            
                                                                             <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                              {{name.delivery_status}}
                                                                            </a></td>
                                                                           
                                                                           <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}" style="color:#000;">
                                                                              <span ng-if="name.delivery_date=='01-01-1970'">NA</span>
                                                                              <span ng-if="name.delivery_date!='01-01-1970'">{{name.delivery_date}}</span>
                                                                             
                                                                            </a></td>  


                                                                             <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}" style="color:#000;">
                                                                            
                                                                              <span >{{name.delivery_confirm_person}}</span>
                                                                              <br>
                                                                               <span >{{name.delivery_confirm_date_time}}</span>
                                                                             
                                                                            </a></td>  
                                                                            
                                                                            
                                                                        <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                              {{name.payment_mode}}
                                                                            </a></td>
                                                                            
                                                                            
                                                                            <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                              {{name.payment_mode_re}}
                                                                            </a></td>

                                                                         <!--<td> 
                                                                         
                                                                         
                                                                         
                                                                         
                                                                         <span ng-if="name.order_base==0">
                                                                             
                                                                               <button type="button" class="btn btn-outline-warning waves-effect waves-light">Pending</button>
                                                                         
                                                                         </span>
                                                                         
                                                                         <span ng-if="name.order_base==1">
                                                                             
                                                                               <button type="button" class="btn btn-outline-success waves-effect waves-light">Approved</button>
                                                                         
                                                                         </span>
                                                                         
                                                                         <span ng-if="name.order_base==3">
                                                                             
                                                                               <button type="button" class="btn btn-outline-success waves-effect waves-light">Requested</button>
                                                                         
                                                                         </span>
                                                                         
                                                                         <span ng-if="name.order_base==-1">
                                                                             
                                                                               <button type="button" class="btn btn-outline-danger waves-effect waves-light">Rejected</button>
                                                                         
                                                                         </span>
                                                                       
                                                                         
                                                                         
                                                                         
                                                                         
                                                                         
                                                                         
                                                                         </td>-->
                                                                          <td style="font-size: 10px;"><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                              
                                                                               <span ng-if="name.order_base==0">
                                                                             
                                                                               {{name.reason}} Open Order
                                                                         
                                                                               </span>
                                                                               
                                                                               <span ng-if="name.order_base==1">
                                                                             
                                                                               {{name.reason}}
                                                                         
                                                                               </span>
                                                                               <span ng-if="name.order_base==-1">
                                                                             
                                                                               {{name.reason}}
                                                                         
                                                                               </span>

                                                                               
                                                                               <span ng-if="name.order_base>1" style="color:#008dc3;font-weight:600;">
                                                                             
                                                                               {{name.reason}}
                                                                         
                                                                               </span>
                                                                               
                                                                               
                                                                               <span ng-if="name.pending_amount">{{name.pending_amount}}</span>
                                                                               
                                                                              
                                                                              
                                                                              </a>
                                                                              <span style="color:balck;"><br>{{name.delivery_date_status}}</span>
                                                                              </td>
                                                                          
                                                                              <td style="font-size: 10px;"><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                              
                                                                              {{ name.new_status }}
                                                                             </td>
                                                                          
                                                                          
                                                                           <?php
                                                                          if($this->session->userdata['logged_in']['access']!='12')
                                                                          {
                                                                           ?>
                                                                           
                                                                           
                                                                           
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.order_by}}</a></td>
                                                                          
                                                                           
                                                                           <?php
                                                                              
                                                                          }
                                                                          
                                                                          ?>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.create_date}} {{name.create_time}}</a></td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.new_date}}</a></td>
                                                                         
                                                                          <td>
                                                                              
                                                                                      <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}" ><i class="mdi mdi-eye font-size-16 text-success me-1"></i> View</a>
                                                                                      <!--<a href="#" class="dropdown-item"  ng-click="deleteData(name.id)"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Delete</a>-->
                                                                                     
                                                                                     <span ng-if="name.order_base==0 || name.order_base==1">
                                                                                          
                                                                                          
                                                                                         <span ng-if="name.finance_status==2">
                                                                                          
                                                                                         
                                                                                          
                                                                                          
                                                                                     <!--<a href="#"  ng-click="cancelData(name.id)"><i class="mdi mdi-account-off font-size-16 text-danger me-1"></i> Cancel</a>-->
                                                                                       
                                                                                         
                                                                                      </span>
                                                                                       
                                                                                       
                                                                                       
                                                                                      </span>
                                                                                  
                                                                              </div>
                                                                          </td>
                                                                      </tr>
                                                                      
                                                                      
                                                                      <tr ng-show="namesData.length==0"><td style="text-align: center;" colspan="11">No Data Found..</td></tr>
                                                                     
                                                                  </tbody>
                                                              </table>
                                                              
                                                                 
                       
                        
                                                              
                                                          </div>
                                                          
                                                           
                                                           
                                                           <div class="row" style="margin-top: 10px;">
                                                               <div class="col-md-6">
                                                                    <div class="dataTables_length" ole="alert" aria-live="polite" aria-relevant="all">Showing <b>{{startItem}}</b> to <b>{{endItem}}</b> of <b>{{totalItems}}</b> entries   </div>
                     
                                                               </div>
                                                               
                                                               <div class="col-md-6">
                                                                    <div class="dataTables_length" style="float: right;" ole="alert" aria-live="polite" aria-relevant="all"><button type="button" class="btn btn-outline-primary" ng-Click="onPre(1,10)">PRE</button><button type="button" class="btn btn-outline-primary" ng-Click="onNext(1,10)">NEXT</button></div>
                     
                                                               </div>
                                                               
                                                           </div>
                                                           
                                                           
                                                           
                                                             
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                        
                     </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                         <div class="row">
                             <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Sales Value</span>
                                                <h4 class="mb-3">
                                                    Rs.<span class="counter-value" data-target="<?php echo round($toatalvalue,2); ?>"><?php echo round($toatalvalue,2); ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b><?php echo round($toatalvaluels,2); ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday  Sales</span>
                                                </div>
                                            </div>
        
                                            <div class="flex-shrink-0 text-end dash-widget">
                                                <div id="mini-chart1" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Orders Count</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo $totalcount; ?>"><?php echo $totalcount; ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b><?php echo $totalcountlastmonth; ?></b> </span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday Orders</span>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 text-end dash-widget">
                                                <div id="mini-chart2" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
        
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Delivery</span>
                                                <h4 class="mb-3">
                                                    Rs. <span class="counter-value" data-target="<?php echo round($toatalvaluedd,2); ?>"><?php echo round($toatalvaluedd,2); ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b><?php echo round($toatalvaluelsdd,2); ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday Delivery</span>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 text-end dash-widget">
                                                <div id="mini-chart3" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today  Delivery Count</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo $totalcountdd; ?>"><?php echo $totalcountdd; ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b><?php echo $totalcountlastmonthdd; ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday Delivery Count</span>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 text-end dash-widget">
                                                <div id="mini-chart4" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->    
                        </div><!-- end row-->

                        
                        
                        
                        
                        
                        
                        
                        
                       
                        
                 
               </div>
            </div>
            <!-- End Page-content -->
         </div>
     
     
     
     
     
     



   </div>
   
   
   
   
   
 <script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;




   var date = new Date();

  $scope.from_date = new Date();
  $scope.to_date = new Date();



    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    
    $scope.tablename='orders_process';
    getData();



   function getData() {
       
       
       
      var order_base = $('#order_base').val();
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      
    
      
     $http.get('<?php echo base_url() ?>index.php/order_check/fetch_data_table?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date)
        .success(function(data) {
            $scope.namesData = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = ($scope.currentPage - 1) * $scope.pageSize + 1;
            $scope.endItem = $scope.currentPage * $scope.pageSize;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
                $scope.namesData.push(temp);
                
                
            });
        });
        
       
    }

 
 
 
 
 
 
 
  $scope.pageChanged = function() {
        getData();
    }
    $scope.pageSizeChanged = function() {
        
        $scope.currentPage = 1;
        
        $('#pageSize').val($scope.pageSize);
        
        getData();
        
        
        
    }
    $scope.searchTextChanged = function() {
        $scope.currentPage = 1;
        getData();
    }
    
    
    
    
    
 
 
 $scope.pageTab = function(tabelename,status){
    
    
      $('#order_base').val(status);
      $scope.currentPage = 1;
      getData();
      $scope.getcount(tabelename);

    
};
 
 
 
$scope.onNext = function(currentPage,pageSize){
     
     
      var nextnumber= parseInt($('#nextnumber').val());
      var pageSize= parseInt($('#pageSize').val());
     
      var currentPage=nextnumber+pageSize;
      
       $('#nextnumber').val(currentPage);
       $('#prenumber').val(currentPage);
      
      getDataPage(currentPage,pageSize);
      
      
 };



$scope.onPre = function(currentPage,pageSize){
     
     
      var nextnumber= parseInt($('#prenumber').val());
      var pageSize= parseInt($('#pageSize').val());
      var currentPage=nextnumber-pageSize;
      
       $('#prenumber').val(currentPage);
       $('#nextnumber').val(currentPage);
       getDataPage(currentPage,pageSize);
      
      
 };




    
  function getDataPage(currentPage,pageSize) {
         
         
         
        $scope.tablename='orders_process';
        var order_base = $('#order_base').val();
          
    
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      
        
        $http.get('<?php echo base_url() ?>index.php/order_check/fetch_data_table?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date)
        .success(function(data) {
            $scope.namesData = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = currentPage-pageSize+1;
            $scope.endItem = currentPage;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
                $scope.namesData.push(temp);
                
                
            });
        });
        
        
        
        
        
        
    }



 

 
 
 
 
 
 





































$scope.DateFilter = function(){
    
    getData();
    
};










$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
         getData();
      }); 
    }
};

$scope.cancelData = function(id){
    if(confirm("Are you sure you want to Cancel it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Cancel_by_order','tablenamemain':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
         getData();
      }); 
    }
};








$scope.getcount = function (tabelename) {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/getcount?tablename="+tabelename,
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.pending = data.pending;
            $scope.cancel =  data.cancel;
            $scope.proceed =  data.proceed;
            $scope.request =  data.request;
            $scope.reassign =  data.reassign;
           
            $scope.p_completed =  data.p_completed;
             $scope.p_d_completed =  data.p_d_completed;
            
            
             $scope.purchase_team =  data.purchase_team;
              $scope.md_team =  data.md_team;
            
             $scope.missing =  data.missing;
             
              $scope.requestp =  data.requestp;
              $scope.rejected_order =  data.rejected_order;
              $scope.request_order =  data.request_order;
              

    });



}




});

</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>


