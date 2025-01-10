<?php 
include "table_header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
   
 div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
}
.card {
    margin-bottom: 0;
}
p {
    margin-top: 0;
    margin-bottom: 5px;
}
table {
    font-size: 11px;
}
.hided {
    display: none;
}
input[type="number"] {
    border: none;
}
@media print 
{
    .hideprint {
        display:none;
    }


}

</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>
     
     
     <?php
     $status=6;
     $active='active';
   
     
     ?>
     
     
       <div class="main-content">
            <div class="page-content">
               <div class="container-fluid">
                   
                   
                         <div class="row">
                            <div class="col-12">
                                          <div class="row hideprint">
                                       <div class="col-m-12">
                                          <div class="card mb-1">
                                             <div class="card-header align-items-start d-flex p-3">
                                                <div class="flex-shrink-0">
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('orders_process')">
                                                    
                                                   
                                                       <li class="nav-item">
                                                         <a class="nav-link "  href="<?php echo base_url(); ?>index.php/order/reconciliation_orders_list"  >
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">Reconciliation  &nbsp;&nbsp;<span class="badge rounded-pill bg-primary float-end"> {{delivered}} </span></span> 
                                                         </a>
                                                      </li>
                                                      
                                                      <li class="nav-item ">
                                                         <a class="nav-link <?php echo $active; ?>"  href="<?php echo base_url(); ?>index.php/order/reconciliation_orders_list_trip_group"  >
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Reconciliation Trip Group &nbsp;&nbsp;<span class="badge rounded-pill bg-primary float-end"> {{delivered}} </span></span>   
                                                         </a>
                                                      </li> 
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link " href="<?php echo base_url(); ?>index.php/order/reconciliation_orders_list_self"  >
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Reconciliation Shop &nbsp;&nbsp;<span class="badge rounded-pill bg-primary float-end"> {{Self}} </span></span>   
                                                         </a>
                                                      </li> 
                                                      
                                                      
                                                      <!-- <li class="nav-item ">
                                                         <a class="nav-link <?php echo $active; ?>" href="<?php echo base_url(); ?>index.php/order/finance_orders_list?status=6"  >
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Bank Transfer & Cheque Payment Pending  &nbsp;&nbsp;<span class="badge rounded-pill bg-danger float-end"> {{b_c_pending}} </span></span>   
                                                         </a>
                                                       </li>-->
                                                      
                                                      
                                                       <li class="nav-item ">
                                                         <a class="nav-link"  href="<?php echo base_url(); ?>index.php/order/finance_orders_list?status=5"  >
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Reconciliation Completed Orders &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{reconciliation}} </span></span>   
                                                         </a>
                                                      </li> 
                                                      
                                                      
                                                   <li class="nav-item ">
                                                         <a class="nav-link"  href="<?php echo base_url(); ?>index.php/order/finance_reconciliation_orders_list"  >
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Weight update</span>   
                                                         </a>
                                                      </li> 
                                                      
                                                      
                                                      <li class="nav-item ">
                                                         <a class="nav-link"  href="<?php echo base_url(); ?>index.php/order/reconciliation_material_return_list"  >
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Material Return Reconciliation &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{reconciliation}} </span></span>   
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
                                                            <input type="hidden" id="prenumber" value="1000">  
                                                            <input type="hidden" id="pageSize" value="1000">  
                                                            <input type="hidden" id="order_base" value="4">
                                                          
                                                           <div class="row hideprint" style="margin-bottom: 10px;">                                    
                            <div class="col-sm-3 ">
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
                                
                                     <input type="button" onclick="window.print()" value="Print" class="btn btn-info">
                            </div>
                            
                            
                         </div>
                           <div class="col-sm-3 ">
                          <label>From Date: </label><input type="date" class="form-control" id="from_date" ng-model="from_date" ng-change="DateFilter()">
                          </div>
                          
                           <div class="col-sm-3 ">
                           <label>To Date:</label><input type="date" class="form-control" id="to_date" ng-model="to_date" ng-change="DateFilter()">
                           </div>
                           
                         
                         <div class="col-sm-3 ">
                        <div id="example_filter" class="dataTables_filter">
                            <label>Search:</label><input type="search" class="form-control input-sm" placeholder="Trip ID | Order NO" aria-controls="example" ng-model="searchText" ng-change="searchTextChanged()">
                        </div>
                    </div>
                       </div>

                                                          <div class="table-responsive">
                                                              <table class="table align-middle table-nowrap newBorderedTable" >
                                                                  <thead>
                                                                      <tr>
                                                                          <th># Trip ID</th>
                                                                         
                                                                          <th style="width:200px;">Name</th>
                                                                          <th>Order No</th>
                                                                          <th>Driver</th>
                                                                          <th>Vehicle No</th>
                                                                          <th>Bill Amount</th>
                                                                          <th>Amount to collect </th>
                                                                          <th>Received Amount</th>
                                                                          <th>Payment Mode</th>
                                                                          <th>Order Date</th>
                                                                          <th>Trip End Date<select id="sortFilter" ng-model="sortFilter_val" ng-change="sortFilter()">
                                                                              <option value="1">Latest</option>
                                                                              <option value="0">Oldest</option>
                                                                          </select></th>
                                                                          <td>Delivery Scope</td>
                                                                          <td>Delivery</td>
                                                                          <td style="width:150px;">Status</td>
                                                                          <td></td>
                                                                         
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody ng-repeat="name in namesData">
                                                                      
                                                                      
                                                                       <tr  >
                                                                       <td ><b> {{name.trim_id}}</b></td>
                                                                       <td colspan="10"></td>
                                                                       <td class="hideprint">
                                                                           
                                                                         
                                                                      <input class="btn btn-success w-lg btn-rounded waves-effect waves-light"   id="paymentrecived" ng-click="paymentrecived(name.trim_id)" type="submit" value="Reconcile">
                                                                                 
                                                                            </td>
                                                                       </tr>
                                                                      
                                                                       <tr ng-repeat="names in name.subarray">
                                                                          <td></td>
                                                                          <td>{{names.name}}</td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process_finance_verification?order_id={{names.base_id}}">{{names.order_no}} ({{names.randam_id}})</a></td>
                                                                          <td>{{names.order_byd}} </td>
                                                                          <td>{{names.vehicle_number}} </td>
                                                                          <td>{{names.totalamount}}</td>
                                                                          <td>{{names.collection_remarks - names.return_amount}}</td>
                                                                          <td>{{names.driver_recived_payment}}</td>
                                                                          <td>{{names.payment_mode}}</td>
                                                                          <td>{{names.create_date_c}} {{names.create_time_c}}</td>
                                                                          <td >

                                                                            <span ng-if="names.create_date=='01-01-1970'">
                                                                              {{names.create_date_c}} {{names.create_time_c}}
                                                                            </span>
                                                                            <span ng-if="names.create_date!='01-01-1970'">{{names.create_date}} {{names.create_time}}</span>
                                                                          

                                                                        </td>
                                                                           <td>{{names.delivery_status}}</td>
                                                                            <td>{{names.full_delivery}}</td>
                                                                           <td>{{names.reason}}</td>
                                                                          <td class="hideprint">
                                                                              
                                                                                  <input class="btn btn-outline-success w-lg btn-rounded waves-effect waves-light"   ng-click="getorderid(names.id,names.order_no,names.randam_id)" type="submit" value="View">
                                                                   
                                                                              
                                                                          </td>
                                                                          
                                                                        
                                                                      </tr>
                                                                      
                                                                      
                                                                       <tr ng-show="namesData.length==0"><td style="text-align: center;" colspan="11">No Data Found..</td></tr>
                                                                    
                                                                  </tbody>
                                                              </table>
                                                          </div>
                                                             <div class="row hideprint" style="margin-top: 10px;">
                                                               <div class="col-md-6">
                                                                    <div class="dataTables_length" ole="alert" aria-live="polite" aria-relevant="all">Showing <b>{{startItem}}</b> to <b>{{endItem}}</b> of <b>{{delivered}}</b> entries   </div>
                     
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
                        
                        
               </div>
            </div>
            <!-- End Page-content -->
         </div>
     
     
   </div>
   
   
    <div class="modal fade" id="firstmodalcommison" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Payment Receive</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                             <div class="col-md-12" style="display:none;">
                                     <div class="form-group row">
                                          <label class="col-sm-12 col-form-label"><b>Ledger Account</b> <span style="color:red;">*</span> </label>
                                                                 <div class="col-sm-12">
                                                                     <select  class="form-control" required  data-trigger name="accountshead"  ng-model="account_head_id" >
                                             
                                                                     <option value="">Select Ledger Account</option>
                                                                      <?php
                                                                      foreach ($accountheads as $val)
                                                                      { 
        
                                                                      ?>
                                                                            <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                                      
                                                                      <?php
                                                                      
                                                                      }
        
                                                                      ?>
                                                                    </select>
                                                                 </div>
                                        </div>                            
                                    </div>
                             
                                                               
                                                              <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Payment Mode <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  
                                                                  <select class="form-control" name="payment_mode_payoff" id="payment_mode_payoff">
                                                                      
                                                                       <option value="">Select Mode</option>
                                                                       <option value="Cash">Cash</option>
                                                                       <option value="Cheque">Cheque</option>
                                                                       <option value="NEFT/RTGS">NEFT/RTGS</option>
                                                                       <option value="Petty Cash">Petty Cash</option>
                                                                      
                                                                      
                                                                  </select>
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              <div class="form-group row" style="display:none;">
                                                                <label class="col-sm-12 col-form-label">Payment Type <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  
                                                                  <select class="form-control" name="payment_type" id="payment_type">
                                                                      
                                                                       <option value="Credit">Credit</option>
                                                                       <option value="Debit">Debit</option>
                                                                       
                                                                  </select>
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              <div class="form-group row" id="bankaccountshow" style="display:none;">
                                                                <label class="col-sm-12 col-form-label" id="base_title">Bank Account </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  
                                                                  <select class="form-control" name="bankaccount"  ng-change="Getbankaccount()" ng-model="getbank" id="bankaccount">
                                                                      
                                                                      
                                                                  </select>
                                                                   <span ng-if="account_no"> <b> Available Balance : {{current_amount | number}}</b></span>
                                                             
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                               <div class="form-group row" id="res_no" style="display:none;">
                                                                <label class="col-sm-12 col-form-label">Reference No <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="reference_no" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                               <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Enter Amount <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                               
                                                                 <input type="number" min="0" oninput="this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"  id="pendingamount"  value="{{pendingamount}}" class="form-control">
                                                                 <input type="hidden"   value="{{pendingamount}}" id="payamount" class="form-control">
                                                                 <input type="hidden"   value="{{order_no}}" id="order_no" class="form-control">
                                                                 <input type="hidden"   value="{{order_id}}" id="order_id" class="form-control">
                                                                  <input type="hidden"   value="{{customer_id}}" id="customer_id" class="form-control">
                                                                 <input type="hidden"    id="payment_id_base" class="form-control">
                                                                 
                                                                </div>
                                                              </div>
                                                              
                                                                 
                                                              <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Notes </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="notes" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                               <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Payment Date </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                              <input type="date" id="payment_date_1" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              <br>
                                                             <div class="form-group" style="display:none;">
                                                                <label  for="writeoff">Write Off </label>
                                                                <input type="checkbox" id="writeoff" >
                                                                
                                                              </div>
                                                           
                                                            <div class="row" style="margin: 20px -9px;">
                                                          
                                                            
                                                            <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                    
                                                                 <button type="submit" class="btn btn-primary w-md" style="float: right;" ng-click="pointtodriver()">Payment Save</button>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>


    <div class="modal fade" id="firstmodalcommison1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Trip Id: {{trip_id_get}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body1">
                                                            
                                                            
    <h4 ng-show="namesDataorderid.length==0" style="text-align: center;padding: 15px;">Denomination Not Found</h4>
                                                                    
                                                            <div class="card1" >
                                          <div class="card-body" ng-repeat="namesorderid in namesDataorderid">
                                                
                                                <h5 ng-if="namesorderid.commision_value>0">Commission (+) : <b >Rs. {{namesorderid.commision_value | number:2}}</b></h5>
                                                <h5>Amount to collect : <b >Rs. {{namesorderid.collection_remarks  - namesorderid.return_amount | number:2}}</b></h5>
                                                <h5>Total Bill Amount : <b >{{namesorderid.totalamount | number:2}}</b></h5>
                                                <h5 ng-if="namesorderid.delivery_charge>0">Delivery Charge  : <b >Rs {{namesorderid.delivery_charge | number:2}} </b></h5>
                                                <h5>Payment Mode : <b >ALL</b></p>
                                                <h6 ng-if="namesorderid.drivename">Driver Name : {{namesorderid.drivename}} Vehicle No : {{namesorderid.vichalnumber}}</h6>
                                             
                                                   
                                                <table  class="table" ng-if="denomination_total>0">
                                                       <tr><td><b>Denomination</b></td><td></td><td></td></tr>
                                                       <tr><td>1 * </td><td>{{c1rs}}</td><td>{{c1rs_s}}</td></tr>
                                                       <tr><td>2 * </td><td>{{c2rs}}</td><td>{{c2rs_s}}</td></tr>
                                                       <tr><td>5 * </td><td>{{c5rs}}</td><td>{{c5rs_s}}</td></tr>
                                                       <tr><td>10 * </td><td>{{c10rs}}</td><td>{{c10rs_s}}</td></tr>
                                                       <tr><td>20 * </td><td>{{c20rs}}</td><td>{{c20rs_s}}</td></tr>
                                                       <tr><td>50 * </td><td>{{c50rs}}</td><td>{{c50rs_s}}</td></tr>
                                                       <tr><td>100 *</td><td> {{c100rs}}</td><td>{{c100rs_s}}</td></tr>
                                                       <tr><td>200 * </td><td>{{c200rs}}</td><td>{{c200rs_s}}</td></tr>
                                                       <tr><td>500 * </td><td>{{c500rs}}</td><td>{{c500rs_s}}</td></tr>
                                                       <tr><td>2000 * </td><td>{{c2000rs}}</td><td>{{c2000rs_s}}</td></tr>
                                                       <tr><td>Denomination Total </td><td></td><td><span  >{{denomination_total}}</tr>
                                                      

                                                       <tr style="color:red;font-weight:700;" ng-if="namesorderid.return_excess==0"><td>Difference  </td><td></td><td><span  >{{namesorderid.collection_remarks-denomination_total-namesorderid.return_amount | number : 0}}</tr>


                                                        
                                                       <tr style="font-weight:700;" ng-if="namesorderid.return_excess!=0"><td>Return the excess  </td><td></td><td><span  >{{namesorderid.return_excess}}</tr>
                                                  </table>
                                          
                                             
                                                    <label class="col-sm-12 col-form-label">Date <span style="color:red;">*</span>
                                                <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="payment_date">
                                                </label>
                                                
                                             
                                              <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">Received  Payment <span style="color:red;">*</span></label>
                                                <div class="col-sm-12">
                                                    
                                                <input  class="form-control" readonly value="{{namesorderid.driver_recived_payment}}"  name="collectamount" id="collectamount" type="text">
                                                
                                                 
                                                </div>
                                              </div>
                                              
                                              
                                                <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">Driver Charge <span style="color:red;">*</span></label>
                                                <div class="col-sm-12">
                                                  
                                                   
                                                   <span > 
                                                   
                                                     <!-- <lable>Total KM : <b>{{namesorderid.totalkm}}  </b> Per KM Charge : <b>{{namesorderid.km_base_charge}}</b></lable>
                                                      <lable>Total KG : <b>{{namesorderid.total_driver_kg}}  </b></lable> -->
                                                      
                                                      <input type="hidden" id="total_km" value="{{namesorderid.totalkm}}">
                                                      <input type="hidden" id="per_kg_amount" value="{{namesorderid.km_base_charge}}">
                                                      <input type="hidden" id="total_kg" value="{{namesorderid.total_driver_kg}}">
                                                     
                                                     <input  class="form-control" placeholder="Enther The Amount" value="{{namesorderid.total_drver_charge}}"  name="drivercharge" id="drivercharge" type="text">
                                                    <br>
                                                   
                                                   </span>
                                                 
                                                </div>
                                                
                                                 <input class="btn btn-success w-lg btn-rounded waves-effect waves-light"  id="paymentaccepted" ng-click="paymentaccepted(trip_id_get)" type="submit" value="Reconcile Completed">
                                              
                                               </div>
                                               
                                              
                                          </div>
                                    </div>  
                                                            
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>
   
   
     <div class="modal fade" id="firstmodalcommison2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="font-size-14 mb-3">Order Id: <b style="color:#ff5e14;float:right;">{{orderno_number}}</b></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body1">
                                       
                                              
                                             <div class="card" >
                                          <div class="card-body" ng-repeat="namesorderid in namesDataorderidSingle">
                                               
                                                
                <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" style="float: right;margin: -6px -20px;" id="paymentrecivedSingle" ng-click="paymentrecivedSingle()" type="submit" value="Update">
                                                        
                                           
                                                <p>Company  name : {{namesorderid.company_name_data}} | {{namesorderid.phone}}</p>
                                                <!-- <p>Contact person : {{namesorderid.company_name}}</p> -->
                                            
                                                <p>Address : {{namesorderid.address}}</p>
                                                <p>Locality : {{namesorderid.loc_name}}</p>
                                                <p>Route : {{namesorderid.route_name}}</p>
                                                <p ng-if="namesorderid.tcsamount>0">TCS (+) : <b style="font-size:14px;">{{namesorderid.tcsamount}}</b></p>
                                                
                                                <input type="hidden" id="commision_value" value="{{namesorderid.commision_value}}">
                                                <p ng-if="namesorderid.commision_value>0">Commission   (+) : <b style="font-size:14px;">{{namesorderid.commision_value}}</b></p>
                                                <p ng-if="namesorderid.delivery_charge>0">Delivery Charge  : <b style="font-size:12px;">{{namesorderid.delivery_charge}} </b></p>
                                                <p><b >Amount to collect : Rs. {{namesorderid.collection_remarks - namesorderid.return_amount | number:2}}</b></p>
                                                <p><b >Total Bill Amount : Rs. {{namesorderid.totalamount | number:2}}</b></p>

                                                <input type="hidden" id="totamountval" value="{{namesorderid.totalamount}}">
                                                
                                               
                                                <p ng-if="namesorderid.gate_weight>0">Gate Weight  : <b style="font-size:12px;">{{namesorderid.gate_weight}} </b></p>
                                                
                                                <p>Sales Person : <b style="font-size:12px;">{{namesorderid.sales_name}} | {{namesorderid.sales_phone}}</b></p>
                                                <p><b>Status :</b> {{namesorderid.reason}}</p>
                                                <p><b>Driver :</b> {{namesorderid.driver_name}} | {{namesorderid.vehicle_number}}</p>
                                                
                                                
                                                <p>Customer Payment Mode : 
                                                    
                                                   
                                                                        <select class="form-select" id="payment_mode" ng-change="payment_modemodechange()" ng-model="payment_modemodechangess">
                                                                           
                                                                            <option value="Cash" ng-selected="{{namesorderid.payment_mode == 'Cash'}}">Cash</option>
                                                                            <option value="Cheque" ng-selected="{{namesorderid.payment_mode == 'Cheque'}}">Cheque</option>
                                                                            <option value="Bank Transfer" ng-selected="{{namesorderid.payment_mode == 'Bank Transfer'}}">Bank Transfer / Online</option>
                                                                            <option  value="No Collection" ng-selected="{{namesorderid.payment_mode == 'No Collection'}}">No Collection</option>
                                                                        </select>
                                                    
                                                    
                                               </p>
                                               
                                               
                                               <span  id="cash_payment_mode" class="{{payment_mode_by}}" >
                                                     
                                                       <table  class="table">
                                                       <tr ng-if="alreadycollected>0"><td><b>Befor Cash Collected</b></td><td>{{s_alreadycollected}}</td><td></td></tr>     
                                                       <tr><td><b>Denomination</b></td><td></td><td></td></tr>
                                                        <tr><td>1 * </td><td><input type="number"  style="width: 80px;" value="{{s_c1rs}}" id="1_rs" ng-keyup="added(1)"></td><td> <input type="number" value="{{s_c1rs_s}}" disabled style="width: 80px;border: none;" id="1_total"></td></tr>
                                                        <tr><td>2 * </td><td><input type="number"  style="width: 80px;" value="{{s_c2rs}}" id="2_rs" ng-keyup="added(2)"></td><td><input type="number" value="{{s_c2rs_s}}" disabled style="width: 80px;border: none;" id="2_total"></td></tr>
                                                        <tr><td>5 * </td><td><input type="number"  style="width: 80px;" value="{{s_c5rs}}" id="5_rs" ng-keyup="added(5)"></td><td> <input type="number" value="{{s_c5rs_s}}" disabled style="width: 80px;border: none;" id="5_total"></td></tr>
                                                       
                                                       <tr><td>10 * </td><td><input type="number"  style="width: 80px;" value="{{s_c10rs}}" id="10_rs" ng-keyup="added(10)"></td><td> <input type="number" value="{{s_c10rs_s}}" disabled style="width: 80px;border: none;" id="10_total"></td></tr>
                                                       <tr><td>20 * </td><td><input type="number"  style="width: 80px;" value="{{s_c20rs}}" id="20_rs" ng-keyup="added(20)"></td><td><input type="number" disabled value="{{s_c20rs_s}}" disabled style="width: 80px;border: none;" id="20_total"></td></tr>
                                                       <tr><td>50 * </td><td><input type="number"  style="width: 80px;" value="{{s_c50rs}}" id="50_rs" ng-keyup="added(50)"></td><td> <input type="number" value="{{s_c50rs_s}}" disabled style="width: 80px;border: none;" id="50_total"></td></tr>
                                                       <tr><td>100 *</td><td><input type="number"  style="width: 80px;" value="{{s_c100rs}}" id="100_rs" ng-keyup="added(100)"></td><td> <input type="number" value="{{s_c100rs_s}}" disabled style="width: 80px;border: none;" id="100_total"></td></tr>
                                                       <tr><td>200 * </td><td><input type="number"  style="width: 80px;" value="{{s_c200rs}}" id="200_rs" ng-keyup="added(200)"></td><td> <input type="number" value="{{s_c200rs_s}}" disabled style="width: 80px;border: none;" id="200_total"></td></tr>
                                                       <tr><td>500 * </td><td><input type="number"  style="width: 80px;" value="{{s_c500rs}}" id="500_rs" ng-keyup="added(500)"></td><td><input type="number" value="{{s_c500rs_s}}" disabled style="width: 80px;border: none;" id="500_total"></td></tr>
                                                       <tr><td>2000 * </td><td><input type="number"  style="width: 80px;" value="{{s_c2000rs}}" id="2000_rs" ng-keyup="added(2000)"></td><td> <input type="number" value="{{s_c2000rs_s}}" disabled style="width: 80px;border: none;" id="2000_total"></td></tr>
                                                       <tr><td>Denomination Total </td><td></td><td><span  > <input type="number" id="fulltotal_edit"  value="{{s_denomination_total}}" readonly style="width: 80px;border: none;"></tr>
                                                       <tr style="color:red;font-weight:700;" ng-if="namesorderid.return_excess==0"> <td>Difference  </td><td></td><td><span  id="bal">{{namesorderid.collection_remarks-s_denomination_totalexe-namesorderid.return_amount | number : 0}}</tr>
                                                       
                                                       
                                                       <tr style="font-weight:700;" ng-if="namesorderid.collecttion_id==1"><td>Return the excess  </td><td></td><td><span  id="return_excess">{{namesorderid.return_excess}}</tr>
                                                       <tr style="font-weight:700;" ng-if="namesorderid.collecttion_id==2"><td>Collect the excess  </td><td></td><td><span  id="return_excess1">{{namesorderid.return_excess}}</tr>
                                                       <input type="hidden" value="{{namesorderid.fulltotalamount-s_denomination_total}}" id="difference">
                                                      
                                                 </table>
                                                   
                                               </span>
                                               
                                               
                                               <span ng-if="namesorderid.payment_mode!='Cash'">
                                                   <p ng-if="namesorderid.reference_no">Reference NO : {{namesorderid.reference_no}}</p>
                                               </span>
                                              
                                              <span ng-if="namesorderid.payment_mode!='Cash'">
                                                                             <div class="imageset" <div class="mb-3" ng-if="namesorderid.payment_image!=0">
                                                                             <img src="{{namesorderid.payment_image}}" class="img-responsive">
                                                                             </div>
                                               </span>
                                               
                                               
                                              <div class="form-group row">
                                                  
                                                <label class="col-sm-12 col-form-label">Date <span style="color:red;">*</span>
                                                <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="payment_date_single">
                                                </label>
                                                
                                                 
                                                <label class="col-sm-12 col-form-label">Collected  Payment <span style="color:red;">*</span></label>
                                                <div class="col-sm-12">
                                                    
                                                    
                                                 <!--<span ng-if="namesorderid.payment_mode=='Cheque'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="0" name="collectamount" id="collectamount" type="text">
                                                 </span>
                                                 
                                                 <span ng-if="namesorderid.payment_mode=='Bank Transfer'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="0" name="collectamount" id="collectamount" type="text">
                                                 </span>-->
                                                 
                                                 <span ng-if="namesorderid.payment_mode!='Cash'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="0" name="collectamount" id="collectamount_single" type="text">
                                                 </span>
                                                 
                                                 
                                                 <span ng-if="namesorderid.payment_mode=='Cash'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="{{s_denomination_total}}" name="collectamount" id="collectamount_single" type="text">
                                                 </span>
                                                 
                                                </div>
                                              </div>
                                              
                                              
                                                <br>
                                                 <span ng-if="namesorderid.payment_mode=='Cash'" style="display:none;">    
                                                <label class="form-check-label"><input type="checkbox" checked  disabled id="paid_customer" value="1"  ng-click="checkCustomerpay()">  If Customer Paid </label>
                                                  </span>
                                                  
                                                    <span ng-if="namesorderid.payment_mode!='Cash'" style="display:none;">    
                                                <label class="form-check-label"><input type="checkbox" checked  disabled  id="paid_customer" value="1"  ng-click="checkCustomerpay()">  If Customer Paid </label>
                                                  </span>
                                              
                                              
                                               <div class="form-group row" id="bankaccount_customer_view" style='display:none;'ng-if="namesorderid.payment_mode!='Cash'">
                                                                <label class="col-sm-12 col-form-label">Bank Account </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  
                                                                  <select class="form-control" name="bankaccount" id="bankaccount_customer">
                                                                      
                                                                      
                                                                      <option value="0">Select Bank</option>
                                                                       <?php
                                                                       
                                                                       foreach($bankaccount as $val)
                                                                       {
                                                                           ?>
                                                                           <option value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option>
                                                                           <?php
                                                                       }
                                                                       
                                                                       ?>
                                                                      
                                                                  </select>
                                                                  
                                                                  
                                                                </div>
                                                </div>
                                                        
                                              
                                               <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">Driver Charge <span style="color:red;">*</span></label>
                                                <div class="col-sm-12">
                                                    
                                                  
                                                   <span > 
                                                   
                                                    <lable>Total KM : <b>{{namesorderid.totalkm}}  </b> Per KM Charge : <b>{{namesorderid.km_base_charge}}</b></lable>
                                                    <lable>Total KG : <b>{{namesorderid.total_driver_kg}}  </b></lable>
                                                    <p>Driver Amount : <b> Rs. {{namesorderid.total_drver_charge | number}}<b><p>
                                                     
                                                   
                                                   </span>
                                                 
                                                
                                                <label class="form-check-label" style="display:none;">
                                                  <input type="checkbox"  id="paid_driver" value="1"  ng-click="checkDriverpay()"> Paid to the driver
                                                  </label>
                                                </div>
                                               </div>
                                                 
                                               <div class="form-group row" id="showpaymentmode" style="display:none;">
                                                <label class="col-sm-12 col-form-label">Payment Mode<span style="color:red;">*</span></label>
                                                <div class="col-sm-12">
                                                <select class="form-select" id="cashmode" ng-change="modechange()" ng-model="modechangess">
                                                                           
                                                                            <option value="0">Select Payment</option>
                                                                            <option value="Petty Cash">Petty Cash</option>
                                                                           <option value="NEFT/RTGS">NEFT/RTGS</option>
                                                                           
                                                 </select>
                                                </div>
                                              </div>
                                              
                                              
                                               <div class="form-group row" id="bankaccountshow" style="display:none;">
                                                                <label class="col-sm-12 col-form-label" id="base_title">Bank Account </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  
                                                                  <select class="form-control" name="bankaccount" id="bankaccount">
                                                                      
                                                                      
                                                                  </select>
                                                                  
                                                                  
                                                                </div>
                                                </div>
                                                              
                                                              
                                               <div class="form-group row" id="reference_no_view" style="display:none">
                                                <label class="col-sm-12 col-form-label">Reference No <span style="color:red;">*</span></label>
                                                <div class="col-sm-12">
                                                 <input class="form-control" type="text"  id="reference_no">
                                                 </div>
                                              </div>
                                              
                                              
                                              <div class="form-group row" id="displayset">
                                                      <input type="hidden" name="hidden_id" id="hidden_id" value="{{namesorderid.order_id}}">
                                                      <input type="hidden" name="hidden_id" id="order_no_single" value="{{namesorderid.order_no}}">
                                                      <input type="hidden" name="driver_id" id="driver_id" value="{{namesorderid.driver_id}}">
                                                      <input type="hidden" name="customer_id" id="customer_id_single" value="{{namesorderid.customer_id}}">
                                                      <input type="hidden" name="fulltotal" id="fulltotal" value="{{namesorderid.totalamount}}">
                                                      
                                                      
                                              </div>
                                                       
                                                          
                                          </div>
                                    </div>
                                              
                                              
                                                      </div>
                                                </div>  
                                                            
                                                            
                                                        </div>
                                                       
                                                    </div>

   <input type="hidden" id="randam_id">
 <script>
 
 
 $(document).ready(function(){
 
 
    $('#payment_mode_payoff').on('change',function(){
      
      var val=$(this).val();
      
      if(val=='NEFT/RTGS' ||  val=='Cheque')
      {
          
         
          $('#base_title').html('Bank Account');
          var data='<option value="0">Select Bank</option> <?php foreach($bankaccount as $val) { if($val->id!=25 && $val->id!=24) { ?> <option value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
           $('#res_no').show();
           $('#bankaccountshow').show();
      }
      if(val=='Cash')
      {
          
          $('#base_title').html('Cash Account');
          var data='<option value="0">Select Bank</option><?php foreach($bankaccount as $val) { if($val->id==25) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
          $('#res_no').show();
          $('#bankaccountshow').show();
          
      }
      if(val=='Petty Cash')
      {
         
          $('#base_title').html('Petty Cash Account');
          var data='<option value="0">Select Bank</option><?php foreach($bankaccount as $val) { if($val->id==24) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
          $('#reference_no').show();
          $('#bankaccountshow').show();
          
          
      }
      
      
  });
 
 
 });
 
 
var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;


   $scope.sortFilter = function(){
    

     getData();
    
   };


    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 1000;
    $scope.searchText = '';
    
 $scope.sortFilter_val = 1;

    $scope.tablename='orders_process';
    getData();


   function getData() {
       
      var order_base = $('#order_base').val();
       var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
       var sortFilter = $('#sortFilter').val();
      
     $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_finance_trip_grouped?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date+'&sortFilter='+sortFilter)
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
    
    
     $scope.pointtodriver = function () {
           payment_date
           
           
            var payment_status= 1;
            
            
            var payment_id_base= $('#payment_id_base').val();
            var payment_mode_payoff= $('#payment_mode_payoff').val();
            var reference_no= $('#reference_no').val();
            var payment_date= $('#payment_date_1').val();
            var enteramount= parseInt($('#pendingamount').val());
            var customer_id= $('#customer_id').val();
            var payamount= parseInt($('#payamount').val());
            var notes= $('#notes').val();
             
            var bankaccount= $('#bankaccount').val();
            var payment_type= $('#payment_type').val();
            var order_no= $('#order_no').val();
            var order_id= $('#order_id').val();
              
              
            if($("#writeoff").prop('checked') == true)
            {
                 var writeoff=1;
            }
            else
            {
                 var writeoff=0;
            }


                  var valuses=0;
                  var valuses1=0;
                  if(bankaccount!=0)
                   {
                       
                     
                    var valuses=1;
                        
                  } 
                  else
                  {
                      alert('Select Payment Account');
                  }
                  
                  
                   if(payment_mode_payoff!=0)
                   {
                       
                     var valuses1=1;
                   
                   } 
                   else
                   {
                      alert('Select Payment');
                   }
                 
                 
                     if(valuses1!=0 && valuses!=0)
                     {
                         
                         
                            $http({
                            method:"POST",
                            url:"<?php echo base_url() ?>index.php/customer/save_to_pay_bank_and_check",
                            data:{'notes':notes,'payment_id_base':payment_id_base,'payment_date':payment_date,'account_head_id':$scope.account_head_id,'order_no':order_no,'order_id':order_id,'enteramount':enteramount,'payment_type':payment_type,'bankaccount':bankaccount,'writeoff':writeoff,'customer_id':customer_id,'payamount':payamount,'payment_mode_payoff':payment_mode_payoff,'reference_no':reference_no}
                            }).success(function(data){
                              
                               $('#firstmodalcommison').modal('toggle');
                               
                               
                               $('#payment_mode_payoff').val('');
                               $('#reference_no').val('');
                               $('#pendingamount').val('');
                               $('#notes').val('');
                               $('#bankaccount').val('');
                               
                               alert('Payment received');
                               getData();
                        
                        
                            });
                             
                     }
                 
                
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
         var sortFilter = $('#sortFilter').val();
        
        $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_finance_trip_grouped?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date+'&sortFilter='+sortFilter)
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


 $scope.Getbankaccount = function () {
      
      
           $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/bankaccount/fetch_single_data",
              data:{'id':$scope.getbank, 'action':'fetch_single_data','tablename':'bankaccount'}
            }).success(function(data){
                
                
                 $scope.bank_name = data.bank_name;
                 $scope.type = data.type;
                 $scope.account_no = data.account_no;
                 $scope.ifsc_code = data.ifsc_code;
                 $scope.current_amount = data.current_amount;
                 
                
            });
      
      
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
        data:{'id':id, 'action':'Cancelfinance','tablenamemain':'orders_process'}
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
      url:"<?php echo base_url() ?>index.php/order/getcount_finance?tablename="+tabelename,
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.pending = data.pending;
            $scope.cancel =  data.cancel;
            $scope.proceed =  data.proceed;
            $scope.request =  data.request;
            $scope.transpot =  data.transpot;
            $scope.delivered =  data.km_delivered;
            $scope.reconciliation =  data.reconciliation;
             $scope.b_c_pending =  data.b_c_pending;
              $scope.Self =  data.Self;
             

    });


}

 
  $scope.paymentrecived = function(tripid)
  {
   
   $scope.trip_id_get=tripid;
   $scope.fetchorderidDetails(tripid);
   $scope.cashmode(tripid);
   $('#firstmodalcommison1').modal('toggle');
  
  };
 

$scope.fetchorderidDetails = function(tripid){

    $http.get('<?php echo base_url() ?>index.php/order/reconciliation_trip_group_details?tripid='+tripid).success(function(data){
      
    $scope.namesDataorderid = data;
   });
};
  
  $scope.cashmode = function(tripid)
  {

    $http.get('<?php echo base_url() ?>index.php/order/cash_mode_reconciliation_group?tripid='+tripid).success(function(data){
     
     
      $scope.c1rs = data.c1rs;
      $scope.c2rs = data.c2rs;
      $scope.c5rs = data.c5rs;
      $scope.c10rs = data.c10rs;
      $scope.c20rs = data.c20rs;
      $scope.c50rs = data.c50rs;
      $scope.c100rs = data.c100rs;
      $scope.c200rs = data.c200rs;
      $scope.c500rs = data.c500rs;
      $scope.c2000rs = data.c2000rs;
      $scope.c1rs_s = data.c1rs_s;
      $scope.c2rs_s = data.c2rs_s;
      $scope.c5rs_s = data.c5rs_s;
      $scope.c10rs_s = data.c10rs_s;
      $scope.c20rs_s = data.c20rs_s;
      $scope.c50rs_s = data.c50rs_s;
      $scope.c100rs_s = data.c100rs_s;
      $scope.c200rs_s = data.c200rs_s;
      $scope.c500rs_s = data.c500rs_s;
      $scope.c2000rs_s = data.c2000rs_s;

      $scope.denomination_total = data.denomination_total;
      $scope.collection_remarks = data.collection_remarks;
      $scope.denomination_totalexe = data.denomination_totalexe;
      $scope.alreadycollected = data.alreadycollected;
      
    });
  };


$scope.paymentaccepted = function(tripid){
     
     
      $('#paymentaccepted').hide();
       var drivercharge= $('#drivercharge').val();
       var payment_date= $('#payment_date').val();
       var collectamount= $('#collectamount').val();
     
        var total_km= $('#total_km').val();
        var per_kg_amount= $('#per_kg_amount').val();
        var total_kg= $('#total_kg').val();
  
        
        $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/payment_collected_group",
        data:{'tripid':tripid,'drivercharge':drivercharge,'collectamount':collectamount,'total_km':total_km,'per_kg_amount':per_kg_amount,'total_kg':total_kg,'payment_date':payment_date}
        }).success(function(data)
        {
           
           
            alert('Payment Collected');
            getData();
            $('#firstmodalcommison1').modal('toggle');
          
      
        });

    
 };


$scope.DateFilter = function(){
    
    getData();
    
};

$scope.onview = function(amount,customer_id,order_no,order_id,payment_id_base){
    
    
     $('#firstmodalcommison').modal('toggle');
     
     
     $scope.order_no=order_no;
     $scope.order_id=order_id;
     $scope.pendingamount=amount;
     $scope.customer_id=customer_id;
     
     $('#payment_id_base').val(payment_id_base);
   
  
};


 $scope.getorderid = function(id,name,randam_id) {
  

 $('#randam_id').val(randam_id);
  $('#displayset').show();
  $scope.activeMenu = id
  $scope.fetchorderidDetailsSingle('orders_process',2,id,randam_id);
  $scope.cashmodeSingle('orders_process',2,id,randam_id);
  $scope.orderno_number = name;
  $('#paymentrecivedSingle').hide();
  $('#firstmodalcommison2').modal('toggle');
  
  
 };
 
 
  $('#cash_payment_mode').hide();
 
 $scope.fetchorderidDetailsSingle = function(tabelename,status,id,randam_id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_delivered_order_list_by_id?tablename='+tabelename+'&order_base='+status+'&order_id='+id+'&randam_id='+randam_id).success(function(data){
      
      
      if(data[0].payment_mode=='Cash')
      {
        
          
           var dataval="showed";
      }
      else
      {
          
           var dataval="hided";
      }
      
       $scope.payment_modemodechangess =data[0].payment_mode;
       $scope.namesDataorderidSingle = data;
       $scope.payment_mode_by =dataval;
       $scope.return_amount =data[0].return_amount;
      
    });
  };
  
 $scope.cashmodeSingle = function(tabelename,status,id,randam_id){

    $http.get('<?php echo base_url() ?>index.php/order/cash_mode_reconciliation?tablename='+tabelename+'&order_base='+status+'&order_id='+id+'&randam_id='+randam_id).success(function(data){
     
     
      $scope.s_c1rs = data.c1rs;
      $scope.s_c2rs = data.c2rs;
      $scope.s_c5rs = data.c5rs;
  
      $scope.s_c10rs = data.c10rs;
      $scope.s_c20rs = data.c20rs;
     
      $scope.s_c50rs = data.c50rs;
      $scope.s_c100rs = data.c100rs;
      $scope.s_c200rs = data.c200rs;
      $scope.s_c500rs = data.c500rs;
      $scope.s_c2000rs = data.c2000rs;
      
      
      $scope.s_c1rs_s = data.c1rs_s;
      $scope.s_c2rs_s = data.c2rs_s;
      $scope.s_c5rs_s = data.c5rs_s;
      
      $scope.s_c10rs_s = data.c10rs_s;
      $scope.s_c20rs_s = data.c20rs_s;
      
      $scope.s_c50rs_s = data.c50rs_s;
      $scope.s_c100rs_s = data.c100rs_s;
      $scope.s_c200rs_s = data.c200rs_s;
      $scope.s_c500rs_s = data.c500rs_s;
      $scope.s_c2000rs_s = data.c2000rs_s;
      
      $scope.s_denomination_total = data.denomination_total;
      $scope.s_denomination_totalexe = data.denomination_totalexe;
      $scope.s_alreadycollected = data.alreadycollected;
      
    });
  };
  
 
  $scope.paymentrecivedSingle = function(){
     
     
    var collectamount= $('#collectamount_single').val();
    var drivercharge= $('#drivercharge_single').val();
    var order_id= $('#hidden_id').val();
    var order_no= $('#order_no_single').val();
    var payment_mode_edit= $('#payment_mode').val();
    var randam_id= $('#randam_id').val();
    
    
     var payment_date= $('#payment_date_single').val();
    
    var driver_id= $('#driver_id').val();
    var customer_id= $('#customer_id_single').val();
    var fulltotal= $('#fulltotal').val();
    
  
    var payment_mode= $('#cashmode').val();
    var reference_no= $('#reference_no').val();
    
    var difference= $('#difference').val();
      var commision_value= $('#commision_value').val();
    
        var bankaccount= $('#bankaccount').val();
    
         var bankaccount_customer= $('#bankaccount_customer').val();
        
        if (bankaccount_customer == null){
           var bankaccount_customer=0;
        }
    
    
        if($('#paid_customer').is(':checked')) {
            
            var customer_paid=1;
        }
        else
        {
            var customer_paid=0;
        }
    
    
      var paid_driver = $("#paid_driver");
      var paid_driver_value = [];
      for(var i = 0; i < paid_driver.length; i++){
          
          if($(paid_driver[i]).is(':checked')) {
              
           paid_driver_value.push($(paid_driver[i]).val());
           
          }
         
       }
       var checkid= paid_driver_value.join("|");
      
    
         var res=1;
         if(payment_mode_edit=='Cash')
         {

                var res=$scope.denomoniationsave(order_id,order_no,randam_id);
         }
         
    
       if(res==1)
       {
           
        $('#paymentrecivedSingle').hide();
        $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/collection_payment_update",
        data:{'order_id':order_id,'difference':difference,'commision_value':commision_value,'payment_date':payment_date,'customer_paid':customer_paid,'randam_id':randam_id,'bankaccount_customer':bankaccount_customer,'collectamount':collectamount,'bankaccount':bankaccount,'reference_no':reference_no,'payment_mode':payment_mode_edit,'checkid':checkid,'drivercharge':drivercharge,'driver_id':driver_id,'customer_id':customer_id,'fulltotal':fulltotal}
        }).success(function(data)
        {
           
           
          alert('Updated');
          getData();
          $('#displayset').hide();
          $('#firstmodalcommison2').modal('toggle');
    
        });
          
          
       }
    
    
 };
   
 
   $scope.denomoniationsave = function(order_id,order_no,randam_id)
     {
         
         
             var c1_rs= $('#1_rs').val();
             var c2_rs= $('#2_rs').val();
             var c5_rs= $('#5_rs').val();
            
            
             var c10_rs= $('#10_rs').val();
             var c20_rs= $('#20_rs').val();
             
             var c50_rs= $('#50_rs').val();
             var c100_rs= $('#100_rs').val();
             var c200_rs= $('#200_rs').val();
             var c500_rs= $('#500_rs').val();
             var c2000_rs= $('#2000_rs').val();
             var validation_amount= $('#fulltotal').data('value');
             var amount_data= $('#fulltotal_edit').val();
             var return_excess= $('#return_excess').text();
             var return_excess1= $('#return_excess1').text();
             var payment_mode= $('#payment_mode').val();
           
             if(amount_data>0)
             {
                 
    
                       $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/denominationsave_trip_update",
                        data:{'c1_rs':c1_rs,'c2_rs':c2_rs,'c5_rs':c5_rs,'c10_rs':c10_rs,'c20_rs':c20_rs,'c50_rs':c50_rs,'c100_rs':c100_rs,'c200_rs':c200_rs,'c500_rs':c500_rs,'c2000_rs':c2000_rs,'randam_id':randam_id,'paymentmode':payment_mode,'order_id':order_id,'order_no':order_no}
                        }).success(function(data){
                    
                          
                        });
                        
                        return 1;
                        
             }
             else
             {
                     alert('Fill The Denomination');
                      return 0;
             }
         
         
     }
 
 
     $scope.payment_modemodechange = function() {
  
  
    var payment_mode= $('#payment_mode').val();
    
     
      if(payment_mode=='Cash')
     {
         $('#cash_payment_mode').removeClass('hided');
         $('.btn-danger').val('Reconcile Complete');
     }
     else
     {
         $('#cash_payment_mode').addClass('hided');
         $('#collectamount').val(0);
          $('.btn-danger').val('Reconcile Pending');
     }
  
  
   }
  
 
    $scope.added = function(val) { 
  
     
                      var num=$('#'+val+'_rs').val();
                      var basetotal=  num*val;
                      $('#'+val+'_total').val(basetotal);
                      
                            var c1_total= $('#1_total').val();
                            var c2_total= $('#2_total').val();
                            var c5_total= $('#5_total').val();
                         
                            var c10_total= $('#10_total').val();
                            var c20_total= $('#20_total').val();
                           
                            var c50_total= $('#50_total').val();
                            var c100_total= $('#100_total').val();
                            var c200_total= $('#200_total').val();
                            var c500_total= $('#500_total').val();
                            var c2000_total= $('#2000_total').val();
                         
                         
                            if(c1_total=='')
                            {
                                 var c1_total=0;
                            }
                             
                             
                              if(c2_total=='')
                             {
                                 var c2_total=0;
                             }
                             
                             
                             if(c5_total=='')
                             {
                                var c5_total=0;
                             }
                             
                             
                             if(c10_total=='')
                             {
                                 var c10_total=0;
                             }
                             
                              if(c20_total=='')
                             {
                                 var c20_total=0;
                             }
                             
                             
                             if(c50_total=='')
                             {
                                 var c50_total=0;
                             }
                             if(c100_total=='')
                             {
                                 var c100_total=0;
                             }
                             if(c200_total=='')
                             {
                                 var c200_total=0;
                             }
                             if(c500_total=='')
                             {
                                 var c500_total=0;
                             }
                             
                             if(c2000_total=='')
                             {
                                 var c2000_total=0;
                             }
                             
                             
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal_edit').val(amount_data);
     $('#collectamount_single').val(amount_data);           
                               
      var allam= parseInt($('#totamountval').val());
      

   
      var totbal=allam-amount_data
      $('#bal').text(totbal); 
      
      
      if (totbal < 0) {
    
           
            $('#return_excess').text(totbal);
             $('#return_excess1').text(totbal);
           
       }
       else
       {
            $('#return_excess').text('0');
            $('#return_excess1').text('0');
         
       }
      
      
    }
  
  
});

</script>  
   
   
<?php include ('table_footer.php'); ?>
</body>


