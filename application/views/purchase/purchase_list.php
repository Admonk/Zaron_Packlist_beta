<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
      div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
}

div#showdata {
    margin: 15px 0px;
}
.nav-tabs-custom.card-header-tabs .nav-link {
    padding: 1.25rem 12px;
    font-weight: 500;
}
table.table.align-middle.table-nowrap.newBorderedTable {
    font-size: 11px;
}
.col-xl-3 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    width: 20%;
}
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>
     
     
     
     
     
     
     
     
     
     
     
     
       <div class="main-content">
            <div class="page-content">
               <div class="container-fluid">
                   
                   <div class="row">
                                    <div class="col-6">
                                         <div class="page-title-box d-sm-flex align-items-center justify-content-between p-0">
                                            <h4 class="mb-sm-0 font-size-18">Requisition List</h4>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        
                                       
                                            
                                            
                                        <div class="d-flex justify-content-end gap-2 flex-wrap">
                                            
                                            
                                          
                                            <div class="btn-group">
                                                <a href="<?php echo base_url(); ?>index.php/purchase/purchase_ordercreate_product?order_id=<?php echo $neworder_id; ?>&sales_request=0" class="btn btn-secondary dropdown-toggle"><i class="mdi mdi-plus"></i> Create New</a>
                                                
                                            </div><!-- /btn-group -->
                                           
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                
                         <div class="row">
                            <div class="col-12">
                                          <div class="row">
                                       <div class="col-m-12">
                                          <div class="card mb-1">
                                             <div class="card-header align-items-start d-flex p-3">
                                                <div class="flex-shrink-0">
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('purchase_orders_process')">
                                                      <li class="nav-item">
                                                         <a class="nav-link"  href="<?php echo base_url(); ?>index.php/purchase/purchase_ordercreate_product?order_id=<?php echo $neworder_id; ?>&sales_request=0" role="tab">
                                                         <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                         <span class="d-none d-sm-block">New Requisition </span> 
                                                         </a>

                                                      </li>
                                                      <li class="nav-item">
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('purchase_orders_process',0)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">Open Requisition <span class="badge rounded-pill bg-warning  float-end"> {{pending}} </span></span> 
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('purchase_orders_process',1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Enquiry  List<span class="badge rounded-pill bg-success float-end"> {{proceed}} </span></span>   
                                                         </a>
                                                      </li>
                                                     
                                                       
                                                       
                                                       
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('purchase_orders_process',2)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">PO<span class="badge rounded-pill bg-success float-end"> {{po}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('purchase_orders_process',10)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Invoice Created<span class="badge rounded-pill bg-success float-end"> {{payment_vendor_invoice}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('purchase_orders_process',3)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Partial Payout & Dispatched<span class="badge rounded-pill bg-success float-end"> {{payment_vendor}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('purchase_orders_process',9)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Schedule Payment<span class="badge rounded-pill bg-danger float-end"> {{payment_vendor_res}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('purchase_orders_process',4)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Payout<span class="badge rounded-pill bg-success float-end"> {{payment_vendor_f}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('purchase_orders_process',5)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Dispatched<span class="badge rounded-pill bg-success float-end"> {{dispath}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                        <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('purchase_orders_process',6)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Delivered<span class="badge rounded-pill bg-success float-end"> {{deliverd}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      <!--<li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('purchase_orders_process',8)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Inward <span class="badge rounded-pill bg-success float-end"> {{inward}} </span></span>   
                                                         </a>
                                                      </li>-->
                                                     
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('purchase_orders_process',-1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Cancelled<span class="badge rounded-pill bg-danger  float-end"> {{cancel}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      
                                                      
                                                      
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
                                                            <input type="hidden" id="order_base" value="0">
                                                          
                                                          
                                                          
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
                            <label>Search:</label><input type="search" class="form-control input-sm" aria-controls="example" ng-model="searchText" ng-change="searchTextChanged()">
                        </div>
                    </div>
                       </div>

                                                          <div class="table-responsive" >
                                                              
                                                              
                                                       
                                                              
                                                              
                                                              <table class="table align-middle table-nowrap newBorderedTable" >
                                                                  <thead>
                                                                      <tr>
                                                                          <th>#</th>
                                                                          <th id="settext">Order No</th>
                                                                          <th>Vendors</th>
                                                                          
                                                                        
                                                                          <th>Total QTY</th>
                                                                          <th>Total Amount</th>
                                                                          <th>Queries</th>
                                                                          
                                                                           
                                                                          <?php
                                                                          if($this->session->userdata['logged_in']['access']!='12')
                                                                          {
                                                                           ?>
                                                                           
                                                                           
                                                                           
                                                                          <th>Enquiry By</th>
                                                                          
                                                                           
                                                                           <?php
                                                                              
                                                                          }
                                                                          
                                                                          ?>
                                                     
                                                                          <th id="distext">Create Date</th>
                                                                          <th>Action</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData">
                                                                          <td>
                                                                              <div class="form-check font-size-16">
                                                                                  <input class="form-check-input" type="checkbox" id="customerlistcheck01">
                                                                                  <label class="form-check-label" for="customerlistcheck01"></label>
                                                                              </div>
                                                                          </td>
                                                                          
                                                                          
                                                                          <td>
                                                                              
                                                                             
                                                                              <a href="<?php echo base_url(); ?>index.php/purchase/purchase_ordercreate_product?order_id={{name.base_id}}">{{name.order_no}}</a>
                                                                              
                                                                             
                                                                              
                                                                         </td>
                                                                          
                                                                          
                                                                          
                                                                          
                                                                          <td style="width:150px;font-size:10px;"><a href="<?php echo base_url(); ?>index.php/purchase/purchase_ordercreate_product?order_id={{name.base_id}}">{{name.vendors_names}}</a></td>
                                                                         
                                                                          
                                                                           <td><a href="<?php echo base_url(); ?>index.php/purchase/purchase_ordercreate_product?order_id={{name.base_id}}">{{name.totalqty}}</a></td>
                                                                       
                                                                      <td><a href="<?php echo base_url(); ?>index.php/purchase/purchase_ordercreate_product?order_id={{name.base_id}}">{{name.totalamount | number}}</a></td>
                                                                       
                                                                      
                                                                           <td> <a href="<?php echo base_url(); ?>index.php/purchase/purchase_ordercreate_product?order_id={{name.base_id}}">
                                                                               
                                                                               
                                                                              
                                                                                 <span ng-if="name.order_base==0">
                                                                             
                                                                               Open Requisition
                                                                         
                                                                               </span>
                                                                               
                                                                               <span ng-if="name.order_base!=0">
                                                                             
                                                                               {{name.reason}}
                                                                         
                                                                               </span>
                                                                               
                                                                               
                                                                               <span ng-if="name.order_base==-1">
                                                                             
                                                                                
                                                                         
                                                                               </span>
                                                                               
                                                                               
                                                                               
                                                                               </a></td>
                                                                           
                                                                             <?php
                                                                              if($this->session->userdata['logged_in']['access']!='12')
                                                                              {
                                                                               ?>
                                                                               
                                                                               
                                                                               
                                                                              <td><a href="<?php echo base_url(); ?>index.php/purchase/purchase_ordercreate_product?order_id={{name.base_id}}">
                                                                                  
                                                                                  <span ng-if="name.mark_request_to_sales!=0"><small style="color:red;">{{name.mark_request_to_sales}}</small><br></span>
                                                                                  {{name.order_by}}
                                                                                  
                                                                                  
                                                                                  </a></td>
                                                                              
                                                                               
                                                                               <?php
                                                                                  
                                                                              }
                                                                              
                                                                              ?>
                                                                           
                                                                          <td><a href="<?php echo base_url(); ?>index.php/purchase/purchase_ordercreate_product?order_id={{name.base_id}}">
                                                                              
                                                                              {{name.create_date}} {{name.create_time}}</a>
                                                                              
                                                                              <span ng-if="name.order_base==0">
                                                                                
                                                                                 <span ng-if="name.totalmimis<60" style="color:green;"><b> ({{60-name.totalmimis}} Min Left)</b></span>
                                                                                 <span ng-if="name.totalmimis>60" style="color:red;"><b> ({{name.totalmimishrs}} Hrs)</b></span>
                                                                                
                                                                               </span>  
                                                                              
                                                                              </td>
                                                                          <td>
                                                                             
                                                                              
                                                                             <a href="<?php echo base_url(); ?>index.php/purchase/purchase_ordercreate_product?order_id={{name.base_id}}" ><i class="mdi mdi-eye font-size-16 text-success me-1"></i> View</a>
                                                                                     
                                                                              
                                                                               <span ng-if="name.order_base>=2">
                                                                               <a href="<?php echo base_url(); ?>index.php/purchase/po?order_id={{name.base_id}}&old_tablename=0&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process"  target="_blank"><i class="mdi mdi-file font-size-16 text-success me-1"></i> PO</a>
                                                                               </span>   
                                                                               
                                                                               
                                                                               
                                                                               
                                                                               <span ng-if="name.order_base>=3" style="display:none;">
                                                                                   
                                                                               <a href="<?php echo base_url(); ?>index.php/purchase/invoice?order_id={{name.base_id}}&invoice_id={{name.invoice_id}}&invoice_no={{name.invoice_no}}&old_tablename=0&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process"  target="_blank"><i class="mdi mdi-file font-size-16 text-success me-1"></i> Invoice</a>
                                                                               <a ng-if="name.invoice_extra_unit_id>0" href="<?php echo base_url(); ?>index.php/purchase/invoice_extra?order_id={{name.base_id}}&invoice_id={{name.invoice_extra_unit_id}}&invoice_no={{name.invoice_no}}&old_tablename=0&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process"  target="_blank"><i class="mdi mdi-file font-size-16 text-success me-1"></i> Freight Invoice </a>
                                                                            
                                                                               </span> 
                                                                               
                                                                               
                                                                               <span ng-if="name.order_base==0">
                                                                               <a href="#"  ng-click="cancelData(name.id)"><i class="mdi mdi-account-off font-size-16 text-danger me-1"></i> Cancel</a>
                                                                               </span>
                                                                               
                                                                                      
                                                                               <span ng-if="name.order_base==1">
                                                                                
                                                                                <span ng-if="name.requestcount!=0">filled ({{name.requestcount}})</span>
                                                                                
                                                                               </span> 
                                                                               
                                                                               <span ng-if="name.order_base==1">
                                                                               <a href="#" ng-click="deleteData(name.id)" ><i class="mdi mdi-delete menu-icon"></i> Delete</a>
                                                                               </span> 
                                                                                 
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Requisition  Count</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo $totalcount; ?>"><?php echo $totalcount; ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b><?php echo $totalcountlastmonth; ?></b> </span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday Requisition</span>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today PO  Count</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo $totalcountp; ?>"><?php echo $totalcountp; ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b><?php echo $totalcountlastmonthp; ?></b> </span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday PO</span>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today PO  Value</span>
                                                <h4 class="mb-3">
                                                    Rs.<span  >{{ <?php echo round($toatalvalue,2); ?> | number }}</span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b>{{ <?php echo round($toatalvaluels,2); ?> | number }}</b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday  PO</span>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Invoice Value</span>
                                                <h4 class="mb-3">
                                                    Rs. <span >{{ <?php echo round($toatalvaluedd,2); ?> | number }}</span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b>{{ <?php echo round($toatalvaluelsdd,2); ?> | number }}</b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday Invoice</span>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today  Invoice Count</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo $totalcountdd; ?>"><?php echo $totalcountdd; ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b><?php echo $totalcountlastmonthdd; ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday Invoice Count</span>
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
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Create Invoice</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               
                                                               
                                                                <!--<form id="pristine-valid-example" novalidate method="post"></form>-->
                                                                
                                                                 <form id="pristine-valid-common" ng-submit="submitForm()" method="post" enctype="multipart/form-data">
                    
                    
                    
                    
                    
                    <div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="success">
                                            <i class="mdi mdi-check-all me-2"></i>
                                           {{successMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<div class="alert alert-danger alert-dismissible fade show" role="alert" ng-show="error">
                                            <i class="mdi mdi-block-helper me-2"></i>
                                            {{errorMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>



                       <div class="row">
                           
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label"> Vendor <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="autocomplete" class="form-control" readonly required name="autocomplete"    type="text">
                            </div>
                          </div>
                        </div>
                      
            
                       
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">PO No <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                                
                                <input type="text" class="form-control" readonly  id="po_no" required name="po_no"  ng-model="po_no">
                                 
                            </div>
                          </div>
                        </div>
                      
                        
                      
                        
                          <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice No <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="inovice_no" class="form-control" plaseholder="Enter the invoice no"  name="inovice_no" required ng-model="inovice_no" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                          <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice Attachment <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                            <input type="file" style="padding:9px;" file-input="files" required class="form-control"  id="fileupload2">
                            </div>
                          </div>
                        </div>
                      
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice Date <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="return_date" class="form-control"  name="create_date" required ng-model="create_date" type="date">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice Amount <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="invoice_amount" class="form-control"  name="invoice_amount" required ng-model="invoice_amount" type="number">
                            </div>
                          </div>
                        </div>
                        
                         <div  class="col-md-12" id="showdata" ng-show="namesDataproduct.length>0">
                                                              
                                                                <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         <th>#</th>
                                                                        
                                                                         <th>Product Name</th>
                                                                         <td>UNIT</td>
                                                                         <td>QTY</td>
                                                                         <th>Base Price</th>
                                                                         <th>Total Amount</th>
                                                                     </tr>
                                                                     <tr  ng-repeat="namesp in namesDataproduct">
                                                                     
                                                                         <td><input type="checkbox" class="purchase_order_product_id" name="purchase_order_product_id" value="{{namesp.id}}"></td>
                                                                         
                                                                         <td>{{namesp.product_name}}</td>
                                                                          <td>{{namesp.unit}}</td>
                                                                         <td><input type="textt" value="{{namesp.qty}}" id="qty_{{namesp.id}}"  class="form-control purchase_qty" ng-input="Qty(namesp.id)" name="purchase_qty" ></td>
                                                                        
                                                                        <td><input type="textt" value="{{namesp.rate}}" id="price_{{namesp.id}}"  class="form-control price" ng-input="Price(namesp.id)" name="price" ></td>
                                                                        <td  id="dd_{{namesp.id}}"> {{namesp.rowtotal | number}}</td>
                                     
                                                                     </tr>
                                                                     
                                                                     
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Sub Total </td>
                                                                         <td>{{subtotal | number}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>GST 5 % </td>
                                                                         <td>{{gstamount | number}}</td>
                                                                     </tr>
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Total </td>
                                                                         <td>{{fulltotal | number}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>

                        
                       <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Remarks</label>
                            <div class="col-sm-12">
                                <textarea rows="4"  id="remarks" class="form-control"  name="remarks"    ng-model="remarks"></textarea>
                            
                            </div>
                          </div>
                        </div>

                    
                      
                     
                        
                        

                        
                     
                  
                        
                     
                        
                               
                        
                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                            
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="CREATE">
                            </div>
                        </div>



                      </div>



                       






                      


                    </form>


                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->



        </div>
    </div>

   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
 <script>

var app = angular.module('crudApp', ['datatables']);


app.filter('number', function () {
    return function (input) {
        if (!isNaN(input)) {
            if (input != 0 && input != null) {
                if (isNaN(input)) return input;

                var isNegative = false;
                if (input < 0) {
                    isNegative = true;
                    input = Math.abs(input);
                }

                var formattedValue = parseFloat(input);
                var decimal = formattedValue.toLocaleString('en-IN', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                });

                if (isNegative) {
                    decimal = '-' + decimal;
                }

                return decimal;
            } else {
                return '0.00';
            }
        }
    };
});
app.directive("fileInput", function($parse){  
                    return{  
                         link: function($scope, element, attrs){  
                              element.on("change", function(event){  
                                   var files = event.target.files;  
                                   $parse(attrs.fileInput).assign($scope, element[0].files);  
                                   $scope.$apply();  
                              });  
                         }  
                    }  
});  




app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;


$scope.from_date = new Date();
  $scope.to_date = new Date();
  


    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    
    $scope.tablename='purchase_orders_process';
    getData();



   function getData() {
       
      var order_base = $('#order_base').val();
       var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      
      
     $http.get('<?php echo base_url() ?>index.php/purchase/fetch_data_table?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date)
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

 
 
 
 $scope.DateFilter = function(){
    
    getData();
    
};
 
 
 
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
    
      if(status==9)
      {
           $('#distext').text('Schedule Date');
      }
      else
      {
          $('#distext').text('Create Date');
      }
     
      if(status==1)
      {
          $('#settext').text('Order No');
          
      }
      else if(status==0)
      {
          $('#settext').text('Order No');
          
      }
      else
      {
           $('#settext').text('PO No');
      }
     
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
         
         
         
        $scope.tablename='purchase_orders_process';
        var order_base = $('#order_base').val();
         var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
        
        $http.get('<?php echo base_url() ?>index.php/purchase/fetch_data_table?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date)
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



 

 
 
 
 
 
 






 
 



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/purchase/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'purchase_orders_process'}
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
        data:{'id':id, 'action':'Cancel','tablenamemain':'purchase_orders_process'}
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
      url:"<?php echo base_url() ?>index.php/purchase/getcount?tablename="+tabelename,
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.pending = data.pending;
            $scope.cancel =  data.cancel;
            $scope.po =  data.po;
            $scope.proceed =  data.proceed;
            
            
            $scope.payment_vendor =  data.payment_vendor;
            $scope.payment_vendor_f =  data.payment_vendor_f;
            
            $scope.payment_vendor_res =  data.payment_vendor_res;
            $scope.payment_vendor_invoice =  data.payment_vendor_invoice;
            
            $scope.archive =   data.$archive;
            
              $scope.dispath =  data.dispath;
            $scope.deliverd =  data.deliverd;
            
             $scope.deliverd =  data.deliverd;
            $scope.inward =  data.inward;

    });



}













$scope.newComplaintcreate = function(name,pono){
  
   $('#autocomplete').val(name);
   $('#po_no').val(pono);
   $('#exampleModalScrollable').modal('toggle');
   $scope.getProductlist();
   
};


 $scope.getProductlist = function(){
      
      
     var po_no= $('#po_no').val();
      
     $http.get('<?php echo base_url() ?>index.php/purchase/get_purchase_product_list_po_number?po_no='+po_no).success(function(data){
      
      
       $scope.namesDataproduct = data;
      
       
     });
     
     
       $http.get('<?php echo base_url() ?>index.php/purchase/get_purchase_product_list_po_number_gst_total?po_no='+po_no).success(function(data){
      
      
         $scope.gstamount = data.gstamount;
         $scope.subtotal = data.totalamount;
         $scope.fulltotal = data.fulltotal;
         $('#invoice_amount').val(data.fulltotal);
        
       
     });
     
     
        
   };




$scope.submitForm = function()
{
      
            var purchase_order_product_id = [];
            var purchase_qty = [];
            var purchase_price = [];
             $('input[name="purchase_order_product_id"]:checked').each(function(){
                 
                    purchase_order_product_id.push($(this).val()); 
                    
                    var id=$(this).val();
                    
                     purchase_order_product_id.push($(this).val()); 
                     purchase_qty.push($('#qty_'+id).val()); 
                     purchase_price.push($('#price_'+id).val()); 
                
            });
            
             var checkinsert= purchase_order_product_id.join("|");
             var purchase_qty_data= purchase_qty.join("|");
             var purchase_price_data= purchase_price.join("|");
      
          
              var validation=$('input[name="purchase_order_product_id"]:checked').val();
                    
              if (typeof validation === "undefined") {
                       var validation=0;
              }
        
        
         var vendor_names=$('#autocomplete').val();
         var invoice_amount=$('#invoice_amount').val();
var po_no=$('#po_no').val();
     
    if(validation!=0)
    {
        
    
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/purchase_invoice_data",
      data:{'create_date':$scope.create_date,'invoice_amount':invoice_amount,'vendor_names':vendor_names,'remarks':$scope.remarks,'po_number':po_no,'inovice_no':$scope.inovice_no,'purchase_order_product_id':checkinsert,'purchase_qty_data':purchase_qty_data,'purchase_price_data':purchase_price_data,'action':'Inward','tablename':'purchase_invoice'}
    }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

              $scope.success = false;
              $scope.error = true;
              $scope.hidden_id = "";
             
              $scope.errorMessage = data.massage;

          }
          else
          {
              
              
              
             $scope.remarks="";
             $scope.po_no="";
            
              
            $scope.success = true;
            $scope.error = false;
            //$('#exampleModalScrollable').modal('toggle');
            $scope.successMessage = data.massage;
            getData();
            $scope.getcount('purchase_invoice');
            $('#showdata').hide();
            
            
            
            
            
            
            
            
            
                               var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file', file);  
                               });  
                               
                               var filetype=0;
                               
                               $http.post('<?php echo base_url() ?>index.php/purchase/fileuplaodbyorder_invoice?id='+data.insert_id+'filetype='+filetype, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                    
                               });  
                               
            
            
            
            
            
            
            
            
            
            
            
            
            
                                                                $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });
            

          }

          

      }

       
    });
   
 

    }
    else
    {
        alert('Select Product..');
    }
      
      
      
      
  
      
      
      
    
  };



});

</script>  
   
   
   
<?php include ('footer.php'); ?>
</body>



