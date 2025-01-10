<?php  include "header.php"; ?>
<style>
span.badge.bg-soft-success.text-danger 
{
    font-size: 11px;
    padding: 6px 9px;
}
canvas{
            margin:auto;
        }
canvas#dvCanvas {
    height: 270px !important;
}
span.badge.bg-soft-danger.text-danger {
    font-size: 11px;
    padding: 6px 9px;
}
table.table.align-middle.table-nowrap.newBorderedTable {
    font-size: 11px;
}
#setheigt
{
   height: 357px !important;
    padding: 69px 0px;
}
canvas#dvCanvas2 {
    height: 240px;
        margin-left: -29px;
    margin-bottom: 10.2%;
}
h3.test-color-1 {
    color: #008dc3;
    font-size: 40px;
}
span.make-color-up {
    font-size: 50px;
    color: green;
    font-weight: 800;
    margin: -1% 10%;
    position: absolute;
}
span.make-color-down {
    font-size: 50px;
    color: red;
    font-weight: 800;
    margin: -1% 10%;
    position: absolute;
}
</style>
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>
















 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                  

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Zaron</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                       <div class="row">
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Enquiry Value</span>
                                                <h4 class="mb-3">
                                                    Rs.<span class="counter-value" data-target="<?php echo round($toatalvalueenc,2); ?>"><?php echo round($toatalvalueenc,2); ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-danger text-danger"><b><?php echo round($toatalvaluelsenc,2); ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday  Enquiry</span>
                                                </div>
                                            </div>
        
                                            <div class="flex-shrink-0 text-end dash-widget">
                                                <div id="mini-chart5" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Enquiry Count</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo round($totalcountenc,2); ?>"><?php echo round($totalcountenc,2); ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-danger text-danger"><b><?php echo $totalcountlastmonthenc; ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday  Enquiry</span>
                                                </div>
                                            </div>
        
                                            <div class="flex-shrink-0 text-end dash-widget">
                                                <div id="mini-chart6" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Quotation value</span>
                                                <h4 class="mb-3">
                                                    Rs.<span class="counter-value" data-target="<?php echo round($toatalvalueqty,2); ?>"><?php echo round($toatalvalueqty,2); ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-danger text-danger"><b><?php echo round($toatalvaluelsqty,2); ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday  Quotation </span>
                                                </div>
                                            </div>
        
                                            <div class="flex-shrink-0 text-end dash-widget">
                                                <div id="mini-chart7" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Quotation Count</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo round($totalcountqty,2); ?>"><?php echo round($totalcountqty,2); ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-danger text-danger"><b><?php echo round($totalcountlastmonthqty,2); ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday  Quotation </span>
                                                </div>
                                            </div>
        
                                            <div class="flex-shrink-0 text-end dash-widget">
                                                <div id="mini-chart8" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
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

                      
                      
                        
                        
                          <div class="row">
                             
                             
                              
      















<div class="modal fade bs-example-modal-center" id="re_date" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Reschedule Date</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                         <form   ng-submit="Dateupdate()" method="post">
                                                        <div class="modal-body">
                                                           
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">Delivery Date:</label>
                                                                    <input type="date" class="form-control" required name="date" id="delivery_date">
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














          
                            <div class="col-12">
                                
                      
                                          <div class="row">
                                       <div class="col-m-12">
                                          <div class="card mb-1">
                                             <div class="card-header align-items-start d-flex p-3">
                                                <div class="flex-shrink-0">
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" >
                                                     
                                                    
                                                         
                                                       <li class="nav-item ">
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',1)">
                                                        
                                                         <span class="d-sm-block">Confirm the Date of delivery </span>   
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
                                                                          <th><input class="form-check-input " type="checkbox" id="checkall" ng-click="allCheck()" style="width: 16px;height: 16px;"> </th>
                                                                          <th>Order No</th>
                                                                          <th>Name</th>
                                                                          <th>Phone</th>
                                                                          <th>Commission</th>
                                                                          <th>Total</th>
                                                                          <th>Ledger </th>
                                                                          <!--<th>Delivery</th>-->
                                                                          <th>Delivery Scope</th>
                                                                          <th>Payment Mode</th>
                                                                         
                                                                          <th>Status</th>
                                                                          <?php
                                                                          if($this->session->userdata['logged_in']['access']!='12')
                                                                          {
                                                                           ?>
                                                                           
                                                                           
                                                                           
                                                                          <th>Order By</th>
                                                                          
                                                                           
                                                                           <?php
                                                                              
                                                                          }
                                                                          
                                                                          ?>
                                                                          <th>Delivery Date</th>
                                                                          <th>Create Date</th>
                                                                          <th>Action</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData" >
                                                                          <td>
                                                                              <div class="form-check font-size-16">
                                                                                  <input class="form-check-input customerlistcheck" name="customerlistcheck" value="{{name.id}}" type="checkbox" id="customerlistcheck01">
                                                                                 
                                                                              </div>
                                                                          </td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.order_no}}</a></td>
                                                                          <td style="width: 150px;font-size: 11px;"><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.name}}</a></td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.phone}}</a>
                                                                          </td>
                                                                          
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                              
                                                                              <span ng-if="name.commission>0">YES</span>
                                                                              
                                                                          </a></td>
                                                                           <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.totalamount}}</a></td>
                                                                        
                                                                        
                                                                        <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.le_amount}}</a></td>
                                                                        
                                                                       <!-- <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                            {{name.delivery_charge}}
                                                                            
                                                                            </a></td>-->
                                                                            
                                                                             <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                              {{name.delivery_status}}
                                                                            </a></td>
                                                                        <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                              {{name.payment_mode}}
                                                                            </a></td>
                                                                            
                                                                            
                                                                       
                                                                        
                                                                          <td style="font-size: 10px;"><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                              
                                                                               <span ng-if="name.order_base==0">
                                                                             
                                                                               {{name.reason}}
                                                                         
                                                                               </span>
                                                                               
                                                                               <span ng-if="name.order_base==1">
                                                                             
                                                                               {{name.reason}}
                                                                         
                                                                               </span>
                                                                               
                                                                               <span ng-if="name.order_base>1" style="color:#008dc3;font-weight:600;">
                                                                             
                                                                               {{name.reason}}
                                                                         
                                                                               </span>
                                                                               
                                                                               
                                                                               <span ng-if="name.pending_amount">{{name.pending_amount}}</span>
                                                                              
                                                                              
                                                                              
                                                                              </a></td>
                                                                          
                                                                           <?php
                                                                          if($this->session->userdata['logged_in']['access']!='12')
                                                                          {
                                                                           ?>
                                                                           
                                                                           
                                                                           
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.order_by}}</a></td>
                                                                          
                                                                           
                                                                           <?php
                                                                              
                                                                          }
                                                                          
                                                                          ?>
                                                                          
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}" style="color:#000;">
                                                                              
                                                                              <span ng-if="name.create_date=='01-01-1970'">NA</span>
                                                                              <span ng-if="name.create_date!='01-01-1970'">{{name.create_date}}</span>
                                                                              
                                                                              
                                                                              </td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.create_date_new}} {{name.create_time}}  </td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}" ><i class="mdi mdi-eye font-size-16 text-success me-1"></i> View</a>
                                                                           
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
                        
                        
                        <button type="button"  ng-click="coniformDate()" class="btn btn-success waves-effect waves-light" >Confirm</button>
                        <button type="button"  ng-click="rescheduleDate()" class="btn btn-primary waves-effect waves-light" >Reschedule</button>
                        
                        
                        
                        
                        
                        <div class="row">
                             <div class="col-xl-12">
                                <div class="card" ng-init="fetchDataRemainder()">
                                    <h5 class="page-header text-center mt-3">Remainder  <span class="monthtxt"><?php echo date('d-m-Y'); ?></span></h5>
                                     <div class="pe-3 ps-3 pt-1 pb-1">
                                    <div class="search-box position-relative">
                                        <input type="text" class="form-control" placeholder="Search..." ng-model="queryv1[queryByv1]">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                                     </div>
                                    
                                    <div class="card-body" style="height: 450px;overflow: auto;">
                                           
                                        <table class="table align-middle table-nowrap">
                                                    <tr>
                                                       
                                                         <th style="width: 100px;">Base</th>
                                                        <th style="width: 100px;">No</th>
                                                        <th style="width: 250px;">Customer Name</th>
                                                        <th style="width: 100px;">Phone</th>
                                                        <th style="width: 100px;">Create_Date</th>
                                                        <th style="width: 175px;">Remainder</th>
                                                        <th style="width: 175px;">Remarks</th>
                                                      
                                                    </tr> 
                                                    <tbody>
                                                        <tr ng-repeat="names in namesRemailder | filter:queryv1">
                                                           
                                                           
                                                           <td>
                                                               
                                                                    <a href="{{names.url}}" target="_blank" class="text-dark">{{names.lable}}</a>
                                                                
                                                            </td>

                                                            <td>
                                                               
                                                                    <a href="{{names.url}}" target="_blank" class="text-dark">{{names.order_no}}</a>
                                                                
                                                            </td>
                                                               <td>
                                                               
                                                                    <a href="{{names.url}}" target="_blank" class="text-dark">{{names.name}}</a>
                                                                
                                                            </td>
                                                              <td>
                                                               
                                                                    <a href="{{names.url}}" target="_blank" class="text-dark">{{names.phone}}</a>
                                                                
                                                            </td>

                                                            <td>
                                                                
                                                                <a href="{{names.url}}" target="_blank" class="text-dark"> <span class="text-muted"><b>{{names.create_date}}</b></span></a>
                                                            </td>

                                                            <td>
                                                                
                                                                <a href="{{names.url}}" target="_blank" class="text-dark"> <span class="text-muted"><b>{{names.call_back_date}}</b></span></a>
                                                            </td>
                                                            <td>
                                                                
                                                                <a href="{{names.url}}" target="_blank" class="text-dark"> <span class="text-muted"><b>{{names.remarks}}</b></span></a>
                                                            </td>


                                                            
                                                        </tr>


                                                    </tbody>
                                                </table>
                                        
                                      
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            
                        </div>
                        
                        
                        
                         
                        <div class="row">
                             <div class="col-xl-12" >
                                 <div class="col-xl-4" style="float:right;">
                            <input type="date"  class="form-control" id="todate" ng-model="txtdate_2" ng-change="searchMonth()">
                            </div>
                                 <div class="col-xl-4" style="float:right;">
                            <input type="date"  class="form-control" id="fromdate" ng-model="txtdate_1" ng-change="searchMonth()">
                            </div>
                            
                            </div>
                        </div>
                        <br>
                        
                         <div class="row">
                             
                          
                            <div class="col-xl-6">
                                <div class="card" ng-init="fetchsales()">
                                     <h5 class="page-header text-center mt-3">Monthly Sales Chart <?php echo date('Y'); ?></h5>
                                    <div class="card-body">
                                       
                                        <canvas id="dvCanvas" height="200" width="300"></canvas>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            
                                 <!-- end col -->
                             <div class="col-xl-3">
                                <div class="card" ng-init="fetchsales2()">
                                    <h5 class="page-header text-center mt-3">Order Conversion Chart - <span class="monthtxt"><?php echo date('M'); ?></span></h5>
                                    <div class="card-body">
                                         
                                        <canvas id="dvCanvas2" height="200" width="300"></canvas>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                             <div class="col-xl-3" >
                                <div class="card" >
                                    
                                    <div class="card-body" id="setheigt">
                                       <h3 class="page-header text-center mt-3">WON OPPORTUNITY<h3>
                                       
                                        <h3 class="test-color-1 text-center mt-3"><?php echo $won; ?> % <span class="make-color-up"> <i class="fa fa-caret-up" ></i></span></h3> 
                                        
                                        <hr></hr>
                                        
                                        <h3 class="page-header text-center mt-3">LOST OPPORTUNITY<h3>
                                       
                                        <h3 class="test-color-1 text-center mt-3"><?php echo $missed; ?>% <span class="make-color-down"> <i class="fa fa-caret-down"></i></span></h3> 
                                      
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                              
                          
                            <!-- end col -->
                        </div>
                        
                        
                        
                          <div class="row">
                            <div class="col-xl-6">
                                <!--<div class="card" ng-init="fetchData()">-->
                               
                                <div class="card" ng-init="fetchsales3()">
                                     <h5 class="page-header text-center mt-3">Top Performing Locality - <span class="monthtxt"><?php echo date('M'); ?></span></h5>
                                     
                                     <!--<div class="pe-3 ps-3 pt-1 pb-1">
                                    <div class="search-box position-relative">
                                        <input type="text" class="form-control" placeholder="Search..." ng-model="query[queryBy]">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                                     </div>-->
                                    <div class="card-body" style="height: 490px;overflow: auto;">
                                        
                                        
                                       <!-- <table class="table align-middle table-nowrap">
                                                    <tbody>
                                                        <tr ng-repeat="name in namesData | orderBy:'count':true | filter:query">
                                                          

                                                            <td>
                                                                <div>
                                                                    <h5 class="font-size-15"><a href="#" class="text-dark">{{name.name}}</a></h5>
                                                                   
                                                                </div>
                                                            </td>

                                                            <td>
                                                                
                                                                <span class="text-muted"><b>{{name.count}}</b></span>
                                                            </td>

                                                            
                                                        </tr>


                                                    </tbody>
                                                </table>-->
                                                
                             
                                        <canvas id="dvCanvas3" height="350" width="450"></canvas>
                                    
                                      
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                             <div class="col-xl-6">
                                <div class="card" ng-init="fetchDataTopproduct()">
                                    <h5 class="page-header text-center mt-3">Top Selling Products - <span class="monthtxt"><?php echo date('M'); ?></span></h5>
                                     <div class="pe-3 ps-3 pt-1 pb-1">
                                    <div class="search-box position-relative">
                                        <input type="text" class="form-control" placeholder="Search..." ng-model="queryv[queryByv]">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                                     </div>
                                    
                                    <div class="card-body" style="height: 450px;overflow: auto;">
                                           
                                        <table class="table align-middle table-nowrap">
                                                    <tbody>
                                                        <tr ng-repeat="names in namesDatatop | filter:queryv">
                                                          

                                                            <td>
                                                                <div>
                                                                    <h5 class="font-size-15"><a href="#" class="text-dark">{{names.name}}</a></h5>
                                                                   
                                                                </div>
                                                            </td>

                                                            <td>
                                                                
                                                                <span class="text-muted"><b>{{names.count}}</b></span>
                                                            </td>

                                                            
                                                        </tr>


                                                    </tbody>
                                                </table>
                                        
                                      
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                            
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                       
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <!-- end row-->

                    </div>
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->

            










































        </div>
    </div>
    
   <script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){
    
    
   
    $scope.txtdate_1=new Date("<?php echo $this->session->userdata['logged_in']['from_date']; ?>");
    $scope.txtdate_2=new Date("<?php echo $this->session->userdata['logged_in']['to_date']; ?>");
  
  

  
    $scope.searchMonth = function(){
        
        const monthNames = ["January", "February", "March", "April", "May", "June",
          "July", "August", "September", "October", "November", "December"
        ];
        
         var month=$('#todate').val(); 
        var moonLanding= new Date(month);
        var datamonth=monthNames[moonLanding.getMonth()];
        $('.monthtxt').html(datamonth);
 $scope.fetchDataRemainder();
        
        $scope.fetchsales2();
        $scope.fetchsales3();
        $scope.fetchDataTopproduct();
       
    };
    
    
    
    $scope.fetchData = function(){
    $http.get('<?php echo base_url(); ?>index.php/dashboard/fetch_localitybase').success(function(data){
        
           $scope.query = {}
      $scope.queryBy = '$';
        
      $scope.namesData = data;
    });
  };

    
        $scope.fetchDataTopproduct = function()
        {
             var todate=$('#todate').val(); 
               var fromdate=$('#fromdate').val();
               
               if(fromdate=='')
              {
                   
                   var fromdate="<?php echo $this->session->userdata['logged_in']['from_date']; ?>"; 
              }
              if(todate=='')
              {
                  var todate="<?php echo $this->session->userdata['logged_in']['to_date']; ?>"; 
              }
               
            $http.get('<?php echo base_url(); ?>index.php/dashboard/fetchDataTopproduct?todate='+todate+'&fromdate='+fromdate).success(function(data){
                
                 $scope.queryv = {};
              $scope.queryByv = '$';
                
              $scope.namesDatatop = data;
            });
  };

    
$scope.fetchDataRemainder = function()
  {
               
              var todate=$('#todate').val();    
               $http.get('<?php echo base_url(); ?>index.php/dashboard/fetchDataRemainder?todate='+todate).success(function(data){
                
                  $scope.queryv1 = {};
                  $scope.queryByv1 = '$';
                  $scope.namesRemailder = data;
              });
  };
  
  
  
 
    $scope.error = false;
    $scope.success = false;

    $scope.fetchsales = function(){
        $http.get('<?php echo base_url(); ?>index.php/dashboard/monthlysaleschart').success(function(data){

            var ctx = document.getElementById("dvCanvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: 'Total Sale',
                        data: data,
                        backgroundColor: ['gray', 'orange', 'green'],
                        borderWidth: 3
                    }],
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

        });
    }

 $scope.fetchsales2 = function()
 {
        
        var todate=$('#todate').val(); 
               var fromdate=$('#fromdate').val();
               
              if(fromdate=='')
              {
                   
                   var fromdate="<?php echo $this->session->userdata['logged_in']['from_date']; ?>"; 
              }
              if(todate=='')
              {
                  var todate="<?php echo $this->session->userdata['logged_in']['to_date']; ?>"; 
              }
     
        $http.get('<?php echo base_url(); ?>index.php/dashboard/monthlysaleschartpie?todate='+todate+'&fromdate='+fromdate).success(function(data){
            var ctx = document.getElementById("dvCanvas2").getContext('2d');
            var myChart = new Chart(ctx, {
                
                type: 'pie', // change the value of pie to doughtnut for doughnut chart
                data: {
                    datasets: [{
                        data: data.total,
                        backgroundColor: ['red', 'blue', 'green']
                    }],
                    labels: data.name
                },
                options: {
                    responsive: false
                }
                
                
                
            });

        });
 }

 $scope.fetchsales3 = function()
 {
     
        var todate=$('#todate').val(); 
        var fromdate=$('#fromdate').val();
        
         if(fromdate=='')
              {
                   
                   var fromdate="<?php echo $this->session->userdata['logged_in']['from_date']; ?>"; 
              }
              if(todate=='')
              {
                  var todate="<?php echo $this->session->userdata['logged_in']['to_date']; ?>"; 
              }
              
              
        $http.get('<?php echo base_url(); ?>index.php/dashboard/fetch_localitybase_bychart?todate='+todate+'&fromdate='+fromdate).success(function(data){
            var ctx = document.getElementById("dvCanvas3").getContext('2d');
            var myChart = new Chart(ctx, {
                
                type: 'polarArea', // change the value of pie to doughtnut for doughnut chart
                data: {
                    datasets: [{
                        data: data.total,
                        backgroundColor: ['yellow', 'gray', 'green','red','black']
                    }],
                    labels: data.name
                },
                options: {
                    responsive: false
                }
                
                
                
            });

        });
 }
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
   var date = new Date();

  //$scope.from_date = new Date(date.getFullYear(), date.getMonth(), 1);
  //$scope.to_date = new Date();



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
      
    
      
     $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_delivery?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date)
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
      
        
        $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date)
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
$scope.allCheck = function(){
      
       if ($('#checkall').is(':checked'))
       {
           
            $('.customerlistcheck').prop('checked',true);
        }
        else
        {
            $('.customerlistcheck').prop('checked',false);
            
        }
      
  };
$scope.coniformDate = function(){
      
        if($('.customerlistcheck').is(':checked'))
        {
           
             var product_order_id = [];
      
             $('input[name="customerlistcheck"]:checked').each(function(){
               
                    product_order_id.push($(this).val()); 
                
              });
            
                var checkinsert= product_order_id.join("|");
             
             
                $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order/delivery_date_coniform",
                  data:{'order_id':checkinsert,'delivery_date':0}
                }).success(function(data){
                   
                   
                  
                    alert('Date Confirmed..');
                    getData();
                    
                    
                    
                });
    
        }
        else
        {
             alert('Select the orders');
            
        }
      
  };
$scope.rescheduleDate = function(){
      
        if($('.customerlistcheck').is(':checked'))
        {
            $('#re_date').modal('toggle');
           
        }
        else
        {
             alert('Select the orders');
            
        }
      
  };
$scope.Dateupdate = function(){
      
      
      
          var product_order_id = [];
      
           $('input[name="customerlistcheck"]:checked').each(function(){
               
                    product_order_id.push($(this).val()); 
                
            });
            
             var checkinsert= product_order_id.join("|");
             var delivery_date= $('#delivery_date').val();
             
                $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order/delivery_date_update",
                  data:{'order_id':checkinsert,'delivery_date':delivery_date}
                }).success(function(data){
                   
                   
                    $('#re_date').modal('toggle');
                    alert('Date Updated..');
                    getData();
                    
                    
                    
                });
    
    
             
             
             
           
    
    
  };

 
 
 
 
 
 
 
 
 
 
 
 
 



});

</script>
    <?php include ('footer.php'); ?>
</body>




