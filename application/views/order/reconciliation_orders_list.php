<?php 
include "table_header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
.flex-grow-overflow-hidden {
    width: 100%;
}  
label {
    width: 100%;
}
.hided {
    display: none;
}
p {
    margin-top: 0;
    margin-bottom: 3px;
}
.midtext{
    background: #ee5c17;
    color: #fff;
    padding: 3px 10px;
    border-radius: 11px;
    margin: 0px 6px;
    text-transform: capitalize;
}
.activess {
    background: aliceblue;
}
img.img-responsive {
    width: 100%;
}
p.ng-binding {
    margin-bottom: 4px;
}
p.text-muted {
    margin-bottom: 7px;
}
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     
     <?php echo $top_nav; ?>
     
     
     <div class="main-content">
         
         
            <div class="page-content pe-0 ps-0 pb-0">
                
                
                    <div class="row">
                                       <div class="col-m-12">
                                          <div class="card mb-1">
                                             <div class="card-header align-items-start d-flex p-3">
                                                <div class="flex-shrink-0">
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('orders_process')">
                                                     
                                               
                                                      <li class="nav-item">
                                                         <a class="nav-link active"  href="<?php echo base_url(); ?>index.php/order/reconciliation_orders_list"  >
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">Reconciliation  &nbsp;&nbsp;<span class="badge rounded-pill bg-primary float-end"> {{delivered}} </span></span> 
                                                         </a>
                                                      </li>
                                                      
                                                      <li class="nav-item ">
                                                         <a class="nav-link"  href="<?php echo base_url(); ?>index.php/order/reconciliation_orders_list_trip_group"  >
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
                                                      
                                                      
                                                      <!-- <li class="nav-item">
                                                         <a class="nav-link" href="<?php echo base_url(); ?>index.php/order/finance_orders_list?status=6"  >
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
                                                      
                                                      
                                                      <!--<li class="nav-item">
                                                         <a class="nav-link "  href="<?php echo base_url(); ?>index.php/order/reconciliation_material_return_list"  >
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">Material Return Reconciliation  &nbsp;&nbsp;<span class="badge rounded-pill bg-primary float-end"> {{delivered}} </span></span> 
                                                         </a>
                                                      </li>-->
                                                      
                                                     
                                               </li>
                                                  
                                                      
                                                   </ul>
                               

                                                </div>
                                             </div>
                                             <!-- end card header -->
                                             <!-- end card-body -->
                                          </div>
                                       </div>
                                    </div>
                
                
               <div class="flex-row-grow">
                   
                   
                  <div class="col-md-3">
                     <div class="route-sidebar w-100" style="min-width: unset;">  
                           <div class="px-3">
                              <h5 class="font-size-14 mb-3">Vehicle No <!--<span class="route-count float-end">(8)</span>--></h5>
                              <input type="text" placeholder="Search Vehicle" class="form-control" ng-model="queryv[queryByv]">
                              <br>
                           </div>
                          
                           <ul class="list-unstyled chat-list" ng-init="fetchVehicle(4)" >
                              
                                <li  ng-repeat="namesvehicle in namesDatavehicle | filter:queryv" ng-class="{activess : activeMenuf === namesvehicle.vehicle_id}">
                                    <a href="#" ng-click="routeOrder(namesvehicle.vehicle_id,namesvehicle.vehicle_number)" >
                                        <div class="d-flex align-items-start">
                                            
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-13 mb-1">{{namesvehicle.no}} . {{namesvehicle.vehicle_name}} | {{namesvehicle.vehicle_number}}</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <span class="badge bg-success rounded-pill">{{namesvehicle.count}}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                               
                           </ul>
                     </div>
                  </div>

                 
                  <input type="hidden" id="v_id">
                  
                  
                    <div class="col-md-5" ng-init="fetchRouteorder('orders_process',2,0,0,0)">
                     <div class="active-order-sidebar h-100">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="px-3">
                                <h5 class="font-size-14 mb-3">Orders <b style="color:#ff5e14;float:right;">{{vehicle_number}}</b></h5>
                              </div>
                             
                           </div>
                           
                           
                           <div class="row px-3" style="margin: 0px 0px;">
                            <div class="col-md-6">
                            <label>From Date: </label><input type="date" class="form-control" id="from_date" ng-model="from_date" ng-change="DateFilter()">
                          </div>
                          
                           <div class="col-md-6">
                           <label>To Date:</label><input type="date" class="form-control" id="to_date" ng-model="to_date" ng-change="DateFilter()">
                           </div>
                          </div>
                          
                          
                           <div class="col-md-12">
                              <div class="px-3">
                               <input type="text" placeholder="search" class="form-control" ng-model="query[queryBy]">
                               </div>
                           </div>
                           
                           
                        </div>


                        <div class="row" >
                           <div class="col-12">
                              <div class="active-trip-tracking p-3" >

                                    <div class="card" ng-repeat="names in namesData | filter:query">
                                          <div class="card-body" ng-click="getorderid(names.order_id,names.order_no,names.randam_id)" ng-class="{activess : activeMenu === names.randam_id}">
                                              
                                              
                                            <a href="#">
                                              
                                             <h5 class="card-title font-size-13">{{names.no}} . Order ID : {{names.order_no}}  <small class="text-truncate mb-0 midtext"> {{names.delivery_mode}} Delivery</small>
                                               
                                             </h5>

                                             <p>  DC NO  : {{names.randam_id}}</p>
                                             
                                             <p class="text-muted float-end" ng-if="names.delivery_status_no==2">




                                                Trip End : {{names.trip_end_date}} {{names.trip_end_time}} 


                                                <br></p>
                                             
                                             <p class="text-muted float-end" ng-if="names.delivery_status_no==1">Assign Date : {{names.assign_date}} {{names.assign_time}} <br></p>
                                             
                                            
                                             <p class="text-muted "><b>Company Name : {{names.company_name_data}}</b></p>
                                             <p class="text-muted "><b>Contact Person & phone : {{names.company_name}} | {{names.phone}}</b></p>
                                              
                                             <p class="text-muted ">Address : {{names.address}} </p>
                                             <p class="text-muted ">Route Name : {{names.route_name}} </p>
                                             <p class="text-muted ">Locality Name : {{names.loc_name}} </p>
                                             <p class="text-muted ">Driver Name & Phone: {{names.driver_name}} | {{names.driver_phone}} </p>
                                            
                                          
                                             <p class="text-muted "><b>Sales Person :</b> {{names.sales_name}} | {{names.sales_phone}}</p>
                                             <p class="text-muted "><b>Scope :</b> {{names.delivery_status}}  </p>
                                             <p class="text-muted "><b>Create Date & Time :</b> {{names.create_date}} {{names.create_time}}  </p>
                                             <p class="text-muted "><b>Status :</b> {{names.reason}}   </p>
                                             </a>
                                             
                                          </div>
                                    </div>

                              </div>
                           </div>
                        </div>
                     </div>
                   </div>
                 
                 
                 <div class="col-md-4" ng-if="orderno_number">
                     
                      <div class="active-order-sidebar h-100">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="px-3" >
                                <h5 class="font-size-14 mb-3">Orders Id: <b style="color:#ff5e14;float:right;">{{orderno_number}}</b></h5>
                              </div>
                             
                           </div>
                        </div>


                        <div class="row">
                           <div class="col-12">
                              <div class="active-trip-tracking p-3" >
                                  
                                  
                                    <div class="card" >
                                          <div class="card-body" ng-repeat="namesorderid in namesDataorderid">
                                               
                                               
                                              <span ng-if="namesorderid.payment_mode=='Cash'">   
                                                        <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" style="float: right;margin: -6px -20px;" id="paymentrecived" ng-click="paymentrecived()" type="submit" value="Reconcile Completed">
                                                        </span>
                                             
                                                        <span ng-if="namesorderid.payment_mode!='Cash'">   
                                                        <input class="btn btn-danger w-lg btn-rounded waves-effect waves-light" style="float: right;margin: -6px -20px;" id="paymentrecived" ng-click="paymentrecived()" type="submit" value="Reconcile Pending">
                                              </span>
                                               
                                                <p>Company  name : {{namesorderid.company_name_data}}</p>
                                                <p>Contact person : {{namesorderid.company_name}}</p>
                                                <p>Phone : {{namesorderid.phone}}</p>
                                                <p>Address : {{namesorderid.address}}</p>
                                                <p>Locality : {{namesorderid.loc_name}}</p>
                                                <p>Route : {{namesorderid.route_name}}</p>
                                                <p ng-if="namesorderid.tcsamount>0">TCS (+) : <b style="font-size:14px;">{{namesorderid.tcsamount}}</b></p>
                                                
                                                <input type="hidden" id="commision_value" value="{{namesorderid.commision_value}}">
                                                <p ng-if="namesorderid.commision_value>0">Commission   (+) : <b style="font-size:14px;">{{namesorderid.commision_value | number:2}}</b></p>
                                                <p ng-if="namesorderid.delivery_charge>0">Delivery Charge  : <b style="font-size:12px;">{{namesorderid.delivery_charge}} </b></p>

                                        <p ng-if="namesorderid.collection_remarks"><b style="font-size:14px;" >Amount to collect : Rs. {{namesorderid.collection_remarks - namesorderid.return_amount | number:2}}</b></p>

                                                <p> <b style="font-size:14px;" id="totamountval">Total Bill Amount : Rs. {{namesorderid.totalamount | number:2}}</b></p>

                                                <p> <b style="font-size:14px;" id="totalamountload">Load Bill Amount : Rs. {{namesorderid.totalamountload | number:2}}</b></p>
                                                
                                               
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
                                                       <tr ng-if="alreadycollected>0"><td><b>Befor Cash Collected</b></td><td>{{alreadycollected}}</td><td></td></tr>     
                                                       <tr><td><b>Denomination</b></td><td></td><td></td></tr>
                                                        <tr><td>1 * </td><td><input type="number"  style="width: 80px;" value="{{c1rs}}" id="1_rs" ng-keyup="added(1)"></td><td> <input type="number" value="{{c1rs_s}}" readonly style="width: 80px;border: none;" id="1_total"></td></tr>
                                                        <tr><td>2 * </td><td><input type="number"  style="width: 80px;" value="{{c2rs}}" id="2_rs" ng-keyup="added(2)"></td><td><input type="number" value="{{c2rs_s}}" readonly style="width: 80px;border: none;" id="2_total"></td></tr>
                                                        <tr><td>5 * </td><td><input type="number"  style="width: 80px;" value="{{c5rs}}" id="5_rs" ng-keyup="added(5)"></td><td> <input type="number" value="{{c5rs_s}}" readonly style="width: 80px;border: none;" id="5_total"></td></tr>
                                                       
                                                       <tr><td>10 * </td><td><input type="number"  style="width: 80px;" value="{{c10rs}}" id="10_rs" ng-keyup="added(10)"></td><td> <input type="number" value="{{c10rs_s}}" readonly style="width: 80px;border: none;" id="10_total"></td></tr>
                                                       <tr><td>20 * </td><td><input type="number"  style="width: 80px;" value="{{c20rs}}" id="20_rs" ng-keyup="added(20)"></td><td><input type="number" value="{{c20rs_s}}" readonly style="width: 80px;border: none;" id="20_total"></td></tr>
                                                       <tr><td>50 * </td><td><input type="number"  style="width: 80px;" value="{{c50rs}}" id="50_rs" ng-keyup="added(50)"></td><td> <input type="number" value="{{c50rs_s}}" readonly style="width: 80px;border: none;" id="50_total"></td></tr>
                                                       <tr><td>100 *</td><td><input type="number"  style="width: 80px;" value="{{c100rs}}" id="100_rs" ng-keyup="added(100)"></td><td> <input type="number" value="{{c100rs_s}}" readonly style="width: 80px;border: none;" id="100_total"></td></tr>
                                                       <tr><td>200 * </td><td><input type="number"  style="width: 80px;" value="{{c200rs}}" id="200_rs" ng-keyup="added(200)"></td><td> <input type="number" value="{{c200rs_s}}" readonly style="width: 80px;border: none;" id="200_total"></td></tr>
                                                       <tr><td>500 * </td><td><input type="number"  style="width: 80px;" value="{{c500rs}}" id="500_rs" ng-keyup="added(500)"></td><td><input type="number" value="{{c500rs_s}}" readonly style="width: 80px;border: none;" id="500_total"></td></tr>
                                                       <tr><td>2000 * </td><td><input type="number"  style="width: 80px;" value="{{c2000rs}}" id="2000_rs" ng-keyup="added(2000)"></td><td> <input type="number" value="{{c2000rs_s}}" readonly style="width: 80px;border: none;" id="2000_total"></td></tr>
                                                       <tr><td>Denomination Total </td><td></td><td><span  > <input type="number" id="fulltotal_edit"  value="{{denomination_total}}" readonly style="width: 80px;border: none;"></tr>
                                                       <tr style="color:red;font-weight:700;" ><td>Difference  </td><td></td><td><span  id="bal">{{namesorderid.collection_remarks-denomination_totalexe-namesorderid.return_amount | number : 0}}</tr>
                                                       
                                                       
                                                       <tr style="font-weight:700;" ng-if="namesorderid.collecttion_id==1"><td>Return the excess  </td><td></td><td><span  id="return_excess">{{namesorderid.return_excess}}</tr>
                                                       <tr style="font-weight:700;" ng-if="namesorderid.collecttion_id==2"><td>Collect the excess  </td><td></td><td><span  id="return_excess1">{{namesorderid.return_excess}}</tr>
                                                       <input type="hidden" value="{{namesorderid.fulltotalamount-denomination_total}}" id="difference">
                                                      
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
                                  <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="payment_date">
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
                                                 <input  class="form-control" placeholder="Enther The Amount" value="0" name="collectamount" id="collectamount" type="text">
                                                 </span>
                                                 
                                                 
                                                 <span ng-if="namesorderid.payment_mode=='Cash'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="{{denomination_total}}" name="collectamount" id="collectamount" type="text">
                                                 </span>
                                                 
                                                </div>
                                              </div>
                                              
                                              
                                                <br>
                                                 <span ng-if="namesorderid.payment_mode=='Cash'">    
                                                <label class="form-check-label"><input type="checkbox" checked  disabled id="paid_customer" value="1"  ng-click="checkCustomerpay()">  If Customer Paid </label>
                                                  </span>
                                                  
                                                    <span ng-if="namesorderid.payment_mode!='Cash'">    
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
                                                    
                                                   <!--<span ng-if="namesorderid.delivery_fixced!='0'"> 
                                                   
                                                   
                                                    <input  class="form-control" placeholder="Enther The Amount" value="{{namesorderid.delivery_fixced}}"  name="drivercharge" id="drivercharge" type="text">
                                                    <br>
                                                   
                                                   </span>-->
                                                   
                                                   
                                                   <span > 
                                                   
                                                     <lable>Total KM : <b>{{namesorderid.totalkm}}  </b> Per KM Charge : <b>{{namesorderid.km_base_charge}}</b></lable>
                                                      <lable>Total KG : <b>{{namesorderid.total_driver_kg}}  </b></lable>
                                                     
                                                     <input  class="form-control" placeholder="Enther The Amount" value="{{namesorderid.total_drver_charge}}"  name="drivercharge" id="drivercharge" type="text">
                                                    <br>
                                                   
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
                                              
                                              
                                              <br>
                                                    
                                              <div class="form-group row" id="displayset">
                                                      <input type="hidden" name="hidden_id" id="hidden_id" value="{{namesorderid.order_id}}">
                                                      <input type="hidden" name="hidden_id" id="order_no" value="{{namesorderid.order_no}}">
                                                      <input type="hidden" name="driver_id" id="driver_id" value="{{namesorderid.driver_id}}">
                                                      <input type="hidden" name="customer_id" id="customer_id" value="{{namesorderid.customer_id}}">
                                                      <input type="hidden" name="fulltotal" id="fulltotal" value="{{namesorderid.totalamount}}">
                                                      
                                                      
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
   
 <input type="hidden" id="randam_id">
 <script>
 

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;

 $scope.from_date=new Date();
 $scope.to_date=new Date();

  $scope.modechangess='0';

   $scope.modechange = function() {
  
  
    var mode= $('#cashmode').val();
    
      if(mode=='NEFT/RTGS')
      {
          
         
          $('#base_title').html('Bank Account');
          var data='<option value="0">Select Bank</option> <?php foreach($bankaccount as $val) { if($val->id!=25 && $val->id!=24) { ?> <option value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
           $('#reference_no_view').show();
           $('#bankaccountshow').show();
      }
      if(mode=='Petty Cash')
      {
          
          $('#base_title').html('Cash Account');
          var data='<option value="0">Select Petty Cash</option> <?php foreach($bankaccount as $val) { if($val->id==24) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
          $('#reference_no_view').show();
          $('#bankaccountshow').show();
          
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
     $('#collectamount').val(amount_data);           
                               
      var allam= parseInt($('#totamountval').text());
      
   
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
                        url:"<?php echo base_url() ?>index.php/order/denominationsave_edit",
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
  
  
$scope.DateFilter = function()
{
  
   var from_date = $('#from_date').val();
   var to_date = $('#to_date').val();
   $scope.fetchRouteorder('orders_process',2,0,from_date,to_date);
  
  
 }
  
  
 $scope.routeOrder = function(id,name) {
  
   $scope.activeMenuf = id
   $scope.fetchRouteorder('orders_process',2,id,0,0);
   $scope.vehicle_number = name;
   var v_id= $('#v_id').val(id);
  
 }
 
 
 $scope.checkDriverpay = function() {
     
         if($("#paid_driver").is(':checked')) {
              
                $('#showpaymentmode').show();
           
          }
          else
          {
                 $('#showpaymentmode').hide();
                 $('#reference_no_view').hide();
                 $('#bankaccountshow').hide();
                 
          }
          
          
 }

  
 $scope.checkCustomerpay = function() {
     
         if($("#paid_customer").is(':checked')) {
              
                $('#bankaccount_customer_view').show();
           
          }
          else
          {
                 $('#bankaccount_customer_view').hide();
                 
                 
          }
          
          
 }

 
   $scope.getorderid = function(id,name,randam_id)
   {
  
 
           $('#displayset').show();
           $scope.activeMenu = randam_id;
           $('#randam_id').val(randam_id);
           $scope.fetchorderidDetails('orders_process',2,id,randam_id);
           $scope.cashmode('orders_process',2,id,randam_id);
           $scope.orderno_number = name;
           $('#paymentrecived').show();
  
  }
 

  $scope.fetchRouteorder = function(tabelename,status,id,from_date,to_date){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_delivered_order_list?tablename='+tabelename+'&order_base='+status+'&vehicle_id='+id+'&from_date='+from_date+'&to_date='+to_date).success(function(data){
      
      
      $scope.query = {}
      $scope.queryBy = '$';
      $scope.namesData = data;
      
    });
  };
  
 
   $scope.fetchVehicle = function(id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_delivered?status='+id).success(function(data){
      
      $scope.queryv = {};
      $scope.queryByv = '$';
      
      $scope.namesDatavehicle = data;
    });
  };
  
  
  $scope.fetchDriver = function(){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_driver').success(function(data){
      $scope.namesDataDriver = data;
    });
  };
  
 
 $('#cash_payment_mode').hide();
  $scope.fetchorderidDetails = function(tabelename,status,id,randam_id){

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
       $scope.namesDataorderid = data;
       $scope.payment_mode_by =dataval;
      
      
    });
  };
  
  $scope.cashmode = function(tabelename,status,id,randam_id){

    $http.get('<?php echo base_url() ?>index.php/order/cash_mode_reconciliation?tablename='+tabelename+'&order_base='+status+'&order_id='+id+'&randam_id='+randam_id).success(function(data){
     
     
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
      $scope.denomination_totalexe = data.denomination_totalexe;
      
       $scope.alreadycollected = data.alreadycollected;
      
    });
  };
  
 
 $scope.paymentrecived = function(){
     
     
     var v_id= $('#v_id').val();
    var collectamount= $('#collectamount').val();
    var drivercharge= $('#drivercharge').val();
    var order_id= $('#hidden_id').val();
    var order_no= $('#order_no').val();
    var payment_mode_edit= $('#payment_mode').val();
    var randam_id= $('#randam_id').val();
    
    
     var payment_date= $('#payment_date').val();
    
    var driver_id= $('#driver_id').val();
    var customer_id= $('#customer_id').val();
    var fulltotal= $('#fulltotal').val();
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
           
        $('#paymentrecived').hide();
        $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/payment_collected",
        data:{'order_id':order_id,'randam_id':randam_id,'difference':difference,'commision_value':commision_value,'payment_date':payment_date,'customer_paid':customer_paid,'bankaccount_customer':bankaccount_customer,'collectamount':collectamount,'bankaccount':bankaccount,'reference_no':reference_no,'payment_mode':payment_mode_edit,'checkid':checkid,'drivercharge':drivercharge,'driver_id':driver_id,'customer_id':customer_id,'fulltotal':fulltotal}
        }).success(function(data)
        {
           
           
          alert('Payment Collected');
          $scope.fetchRouteorder('orders_process',2,v_id,0,0);
          $scope.fetchorderidDetails('orders_process',2,v_id);
          
          $('#displayset').hide();
    
        });
          
          
       }
    
       $http.get('https://erp.zaron.in/customer_balance_cron.php?customer_id='+customer_id).success(function(datass){});
    
    
 };
   
     
 $scope.fetchRoute = function(){
    $http.get('<?php echo base_url() ?>index.php/order/group_gy_route').success(function(data){
      $scope.namesRoute = data;
    });
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


});


</script>  
   
   
<?php include ('table_footer.php'); ?>
</body>


