<?php 
include "table_header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
   
 div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
}
p {
    margin-top: 0;
    margin-bottom: 5px;
}
span.badge.rounded-pill {
    margin: 0px 7px;
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
                            <div class="col-12">
                                          <div class="row">
                                       <div class="col-m-12">
                                          <div class="card mb-1">
                                             <div class="card-header align-items-start d-flex p-3">
                                                <div class="flex-shrink-0">
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('orders_process')">
                                                    
                                                   
                                               
                                                   
                                                    
                                                    

                                                     <li class="nav-item ">
                                                         <a class="nav-link active"  data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('orders_process',50)" >
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Weight Update Pending <span class="badge rounded-pill bg-danger  float-end"> {{w_update_pending}} </span></span>   
                                                         </a>
                                                      </li> 



                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('orders_process',3)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">Weight Updated
                                                          <span class="badge rounded-pill bg-success  float-end"> {{w_update}} </span>
                                                         </a>
                                                      </li>




                                                      <li class="nav-item">
                                                         <a class="nav-link " data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('orders_process',1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">Weight Approved

                                                           <span class="badge rounded-pill bg-success  float-end"> {{w_update_approved}} </span>
                                                         </a>
                                                      </li>



                                                       <li class="nav-item">
                                                         <a class="nav-link " data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('orders_process',2)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">Weight Rejected 

                                                           <span class="badge rounded-pill bg-danger  float-end"> {{w_update_rejected}} </span>


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
                                                            <input type="hidden" id="order_base" value="50"> 

                                                 
                                                      
                                                          
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

                           
                            <label>Search:</label> 
                                                    <a href="#" ng-click="withoutKG(1)" id="withoutkg" style="float: right;">View Orders WithOut Kg</a>
                                                    <a href="#" ng-click="withoutKG(0)" id="withkg" style="display:none;float: right;">View Orders With Kg</a>      
                                                    
                                                    <input type="hidden" id="getviewstatus" value="0">


<label for="lable2"> <input type="checkbox" value="1" name="checkinsert" class="checkall" id="lable2" title="Weightnm update filter"> Weight </label>
    <label for="lable3"> <input type="checkbox" value="1" name="checkinsert1" class="checkall" id="lable3" title="Partial Delivery filter"> Partial</label> 
                                                
                            
                            <input type="search" class="form-control input-sm" placeholder="Order No,Name,phone,Sales Person,Driver,Vehicle_No" aria-controls="example" ng-model="searchText" id="searchText" ng-change="searchTextChanged()">
                        </div>
                    </div>
                       </div>

                                                          <div class="table-responsive">
                                                              <table class="table align-middle table-nowrap newBorderedTable" >
                                                                  <thead>
                                                                      <tr>
                                                                          <th><input class="form-check-input " type="checkbox" id="checkall" ng-click="allCheck()" style="width: 16px;height: 16px;"></th>
                                                                          <th>Order No</th>
                                                                          <th style="width:200px;">Name</th>
                                                                        
                                                                          <!--<th>Commission</th>-->
                                                                          <th>Total</th>
                                                                          <th>Delivery_Charge</th>
                                                                          <!--<th>Status</th>-->
                                                                          <th style="width: 150px;">Status</th>
                                                                          <th>Order By</th>
                                                                           <th>Driver</th>
                                                                          <th>Vehicle_No</th>
                                                                          <th>Create Date</th>
                                                                          <th >Action</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData">
                                                                          <td>
                                                                              <div class="form-check font-size-16">
                                                                                  <input class="form-check-input customerlistcheck" name="customerlistcheck" value="{{name.id}}" type="checkbox" id="customerlistcheck01">
                                                                                 
                                                                              </div>
                                                                          </td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process_finance_verification?order_id={{name.base_id}}&convertion=2">{{name.order_no}}</a></td>
                                                                          <td>{{name.name}}
                                                                          <br>
                                                                          {{name.phone}}
                                                                          </td>
                                                                          
                                                                          
                                                                          <!--<td>{{name.commission}}</td>-->
                                                                           <td>{{name.totalamount  | number}}</td>
                                                                           <td>{{name.delivery_charge}}</td>
                                                                       
                                                                       
                                                                          <td>

                                                                            {{name.reason}}

                                                  <p ng-if="name.gate_login_view_status==0" style="color: red;">{{name.status}}</p>
                                                  <p ng-if="name.gate_login_view_status==1" style="color: green;">{{name.status}}</p>
                                                  <p ng-if="name.gate_login_view_status==2" style="color: red;">{{name.status}}</p>


                                                                           </td>
                                                                           <td>{{name.order_by}} </td>
                                                                            <td>{{name.order_byd}} </td>
                                                                            <td>{{name.vehicle_number}} </td>
                                                                          <td>{{name.create_date}} {{name.create_time}}</td>
                                                                          <td >
                                                                              
                                                                                    <!-- <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process_finance_verification?order_id={{name.base_id}}" ><i class="mdi mdi-eye font-size-16 text-success me-1"></i> Order View</a>
                                                                                      <a href="#"   ng-click="deleteData(name.id)"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Delete</a>-->
                                                                                     
                                                                       
                                                                  <?php 
                                                                   if($this->session->userdata['logged_in']['access']==14 || $this->session->userdata['logged_in']['access']==1)
                                                                   {

                                                                    ?>


                                                                      <span ng-if="name.convertion==2">
                                                                     <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}&convertion=2" style="color: green;font-weight: 600;" target="_blank">Weight Updated</a>
                                                                  
                                                                  </span>                   
                                                                  <span ng-if="name.convertion!=2">
                                                                     <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}&convertion=2" target="_blank">Weight Updated Pending</a>
                                                                  
                                                                  </span> 



                                                                    <?php

                                                                   }
                                                                   else
                                                                   {


                                                                    ?>


                                                                  <span ng-if="name.convertion==2">
                                                                     <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}&convertion=2" style="color: green;font-weight: 600;" target="_blank">Weight Updated</a>
                                                                  
                                                                  </span>                   
                                                                  <span ng-if="name.convertion!=2">
                                                                     <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}&convertion=2" target="_blank">Weight Updated Pending</a>
                                                                  
                                                                  </span> 


                                                                    <?php


                                                                   }
       
                                                                  ?>

                                                                  






                                                                 
                                                                 
                                                                                      
                                                                                  
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

            
                         <?php 
                         if($this->session->userdata['logged_in']['access']==14)
                         {

                         ?>  
                        <div class="showbtn" ng-if="order_base==50">
                             
                             <button type="button"  ng-click="coniformed()" class="btn btn-success waves-effect waves-light" >Approve</button>
                           
                          
                        </div>  

                          <?php 
                          }
                          ?>
                       
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
                                                                  
                                                                  <input type="date" id="payment_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                                                  
                                                                  
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
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Orders Id: {{orderno_number}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body1">
                                                            
                                                            
                                                            <div class="card1" >
                                          <div class="card-body" ng-repeat="namesorderid in namesDataorderid">
                                              
                                                <p><b>Customer name :</b> {{namesorderid.company_name}}</p>
                                                <p><b>Phone :</b> {{namesorderid.phone}}</p>
                                                <p><b> Address :</b>  {{namesorderid.address}}</p>
                                               
                                                <p>Total Bill Amount : <b style="font-size:18px;">{{namesorderid.totalamount  | number}}</b></p>
                                                <p>Delivery Charge  : <b style="font-size:12px;">{{namesorderid.delivery_charge  | number}} </b></p>
                                                <p>Customer Payment Mode : <b style="font-size:12px;">{{namesorderid.payment_mode}}</b></p>
                                                <p>Sales Person : <b style="font-size:12px;">{{namesorderid.sales_name}}</b></p>
                                                <p ng-if="drivename">Driver Name : {{drivename}} Vehicle No : {{vichalnumber}}</p>
                                               
                                              
                                                <p ng-if="namesorderid.lengeth>0"><b>Max Length : {{namesorderid.lengeth}} </b></p>
                                                <p ><b> 
                                                
                                                
                                               Weight Edit :  <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{namesorderid.base_id}}" target="_blank">Link</a>
                                                
                                                <input type="text" class="form-control" style="display:none;" id="weight" ng-blur="updateWeight(namesorderid.order_id)" value="{{namesorderid.weight}}"> </b></p>
                                              
                                               <span ng-if="namesorderid.payment_mode=='Cash'">
                                                   
                                                       <table  class="table">
                                                       <tr><td><b>Denomination</b></td><td></td><td></td></tr>
                                                       
                                                         <tr><td>1 * </td><td>{{c1rs}}</td><td>{{c1rs_s | number}}</td></tr>
                                                         <tr><td>2 * </td><td>{{c2rs}}</td><td>{{c2rs_s | number}}</td></tr>
                                                         <tr><td>5 * </td><td>{{c5rs}}</td><td>{{c5rs_s | number}}</td></tr>
                                                       <tr><td>10 * </td><td>{{c10rs}}</td><td>{{c10rs_s | number}}</td></tr>
                                                       <tr><td>20 * </td><td>{{c20rs}}</td><td>{{c20rs_s | number}}</td></tr>
                                                       <tr><td>50 * </td><td>{{c50rs}}</td><td>{{c50rs_s | number }}</td></tr>
                                                       <tr><td>100 *</td><td> {{c100rs}}</td><td>{{c100rs_s | number }}</td></tr>
                                                       <tr><td>200 * </td><td>{{c200rs}}</td><td>{{c200rs_s | number }}</td></tr>
                                                       <tr><td>500 * </td><td>{{c500rs}}</td><td>{{c500rs_s | number}}</td></tr>
                                                       <tr><td>2000 * </td><td>{{c2000rs}}</td><td>{{c2000rs_s | number}}</td></tr>
                                                       <tr><td>Denomination Total </td><td></td><td><span  >{{denomination_total | number}}</tr>
                                                       <tr style="color:red;font-weight:700;"><td>Difference  </td><td></td><td><span  >{{namesorderid.totalamount-denomination_total | number : 0}}</tr>
                                                       
                                                       
                                              <tr style="font-weight:700;" ng-if="namesorderid.return_excess!=0"><td>Return the excess  </td><td></td><td><span  >{{namesorderid.return_excess}}</tr>
                                                       
                                                       
                                                       <input type="hidden" value="{{namesorderid.totalamount-denomination_total}}" id="difference">
                                                      
                                                 </table>
                                                   
                                               </span>
                                               
                                               <span ng-if="namesorderid.payment_mode!='Cash'">
                                                   <p>Reference NO : {{namesorderid.reference_no}}</p>
                                               </span>
                                              
                                              <span ng-if="namesorderid.payment_mode!='Cash'">
                                                                             <div class="imageset" <div class="mb-3" ng-if="namesorderid.payment_image!=0">
                                                                             <img src="{{namesorderid.payment_image}}" style="width:100%" class="img-responsive">
                                                                             </div>
                                               </span>
                                              
                                             
                                              <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">Collected  Payment <span style="color:red;">*</span></label>
                                                <div class="col-sm-12">
                                                    
                                                 <span ng-if="namesorderid.payment_mode!='Cash'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="{{namesorderid.totalamountload}}" readonly name="collectamount" id="collectamount" type="text">
                                                 </span>
                                                 <span ng-if="namesorderid.payment_mode=='Cash'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="{{denomination_total}}" readonly name="collectamount" id="collectamount" type="text">
                                                 </span>
                                                 
                                                </div>
                                              </div>
                                              
                                              
                                          </div>
                                    </div>  
                                                            
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>
   
   
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
          var data='<?php foreach($bankaccount as $val) { if($val->id==25) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
          $('#res_no').show();
          $('#bankaccountshow').show();
          
      }
      
      
  });
 
 
 });
 
 
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
                return '0';
            }
        }
    };
});

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;

 $scope.order_base = 50;
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
      var viewstatus= $('#getviewstatus').val();
    var searchText= $('#searchText').val();

         var order_base_id = [];
            $('input[name="checkinsert"]:checked').each(function(){
               
                    order_base_id.push($(this).val()); 
                
             });
            
             var order_base_data= order_base_id.join("|");
             

            var checkinsert1 = [];
            $('input[name="checkinsert1"]:checked').each(function(){
               
                    checkinsert1.push($(this).val()); 
                
             });
            
             var delivery_p= checkinsert1.join("|");
             

     $http.get('<?php echo base_url() ?>index.php/order_check/fetch_data_table_finance_with_uom?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date+'&viewstatus='+viewstatus+'&filter='+order_base_data+'&filter_parcel='+delivery_p)
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

 
  $scope.withoutKG = function(viewstatus) {
       
       $('#getviewstatus').val(viewstatus);
       
     
      if(viewstatus==0)
      {
          $('#withoutkg').show()
          $('#withkg').hide()
      }
      if(viewstatus==1)
      {
          $('#withoutkg').hide()
          $('#withkg').show()
      }
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
    
  $scope.coniformed = function(){
      
        if($('.customerlistcheck').is(':checked'))
        {
           
             if (confirm("Are you sure confirm!") == true) 
             {
                 
                 
                   var product_order_id = [];
      
                   $('input[name="customerlistcheck"]:checked').each(function(){
                       
                            product_order_id.push($(this).val()); 
                        
                    });
                    
                     var checkinsert= product_order_id.join("|");



                     
                        $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/order_check/gate_approved_for_finance",
                          data:{'order_id':checkinsert}
                        }).success(function(data){
                           
                           
                          
                            alert('Approved success');
                            getData();
                            
                            
                            
                        });
    
    
                 
              
                
                
              } 
            
            
        }
        else
        {
             alert('Select the orders');
            
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


    
     $scope.pointtodriver = function () {
           payment_date
           
           
            var payment_status= 1;
            
            var payment_mode_payoff= $('#payment_mode_payoff').val();
            var reference_no= $('#reference_no').val();
var payment_date= $('#payment_date').val();
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
                            data:{'notes':notes,'payment_date':payment_date,'account_head_id':$scope.account_head_id,'order_no':order_no,'order_id':order_id,'enteramount':enteramount,'payment_type':payment_type,'bankaccount':bankaccount,'writeoff':writeoff,'customer_id':customer_id,'payamount':payamount,'payment_mode_payoff':payment_mode_payoff,'reference_no':reference_no}
                            }).success(function(data){
                              
                               $('#firstmodalcommison').modal('toggle');
                               
                               
                               $('#payment_mode_payoff').val('');
                               $('#reference_no').val('');
                               $('#pendingamount').val('');
                               $('#notes').val('');
                               $('#bankaccount').val('');
                               
                               
                               getData();
                        
                        
                            });
                             
                     }
                 
                
 $http.get('https://erp.zaron.in/customer_balance_cron.php?customer_id='+customer_id).success(function(datass){});     
           

}
 
 
 $scope.pageTab = function(tabelename,status){
    
  
          $scope.order_base=status;
    

      $('#order_base').val(status);
      $scope.currentPage = 1;
      //$scope.order_base = 1;
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


 $('.checkall').change(function() {
      
         
           getData();


  });
        

$scope.DateFilter = function(){
    
    getData();
    
};


  function getDataPage(currentPage,pageSize) {
         
         
        $scope.tablename='orders_process';
        var order_base = $('#order_base').val();
        
           var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
            var viewstatus= $('#getviewstatus').val();


                var order_base_id = [];
            $('input[name="checkinsert"]:checked').each(function(){
               
                    order_base_id.push($(this).val()); 
                
             });
            
             var order_base_data= order_base_id.join("|");
             

            var checkinsert1 = [];
            $('input[name="checkinsert1"]:checked').each(function(){
               
                    checkinsert1.push($(this).val()); 
                
             });
            
             var delivery_p= checkinsert1.join("|");
             
             var searchText= $('#searchText').val();

            
        $http.get('<?php echo base_url() ?>index.php/order_check/fetch_data_table_finance_with_uom?page_next=' + currentPage + '&size=' + pageSize + '&search=' + searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date+'&viewstatus='+viewstatus+'&filter='+order_base_data+'&filter_parcel='+delivery_p)
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
$scope.updateWeight = function(id){
    
        
     var weight=$('#weight').val();    
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id,'weight':weight, 'action':'updateWeight','tablenamemain':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
         getData();
      }); 
    
};


$scope.getcount = function (tabelename) {


 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order_second/gatelogin_count?tablename="+tabelename,
      data:{'pincode':$scope.pincode}
    }).success(function(data){

                                                        $scope.w_update_pending = data.w_update_pending;
                                                        $scope.w_update =  data.w_update;
                                                        $scope.w_update_approved =  data.w_update_approved;
                                                        $scope.w_update_rejected =  data.w_update_rejected;
           
                                                
   
    });


}

  $scope.getorderid = function(id,name,selforder,drivename,vichalnumber) {
  
   
   $scope.drivename = drivename;
   $scope.vichalnumber = vichalnumber;
 
   if(selforder==1)
   {
       $scope.fetchorderidDetails('orders_process',10000,id);
   }
   else
   {
       $scope.fetchorderidDetails('orders_process',2,id);
   }
   
   
   $scope.cashmode('orders_process',2,id);
   $scope.orderno_number = name;
   $('#firstmodalcommison1').modal('toggle');
  
 };
 
  $scope.fetchorderidDetails = function(tabelename,status,id){


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_delivered_order_list_by_id_by_view?tablename='+tabelename+'&order_base='+status+'&order_id='+id).success(function(data){
      $scope.namesDataorderid = data;
    });
    
    
  };
  
  
  $scope.cashmode = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/cash_mode?tablename='+tabelename+'&order_base='+status+'&order_id='+id).success(function(data){
     
     $scope.c1rs = data.c1rs;
  $scope.c2rs = data.c2rs;
  $scope.c5rs = data.c5rs;
  $scope.c1rs_s = data.c1rs_s;
  $scope.c2rs_s = data.c2rs_s;
  $scope.c5rs_s = data.c5rs_s;
  
  
     $scope.c10rs = data.c10rs;
     $scope.c20rs = data.c20rs;
     
      $scope.c50rs = data.c50rs;
      $scope.c100rs = data.c100rs;
      $scope.c200rs = data.c200rs;
      $scope.c500rs = data.c500rs;
      $scope.c2000rs = data.c2000rs;
      
      
      $scope.c10rs_s = data.c10rs_s;
      $scope.c20rs_s = data.c20rs_s;
      
      $scope.c50rs_s = data.c50rs_s;
      $scope.c100rs_s = data.c100rs_s;
      $scope.c200rs_s = data.c200rs_s;
      $scope.c500rs_s = data.c500rs_s;
      $scope.c2000rs_s = data.c2000rs_s;
      
      $scope.denomination_total = data.denomination_total;
      
      
    });
  };
 

$scope.onview = function(amount,customer_id,order_no,order_id){
    
    
     $('#firstmodalcommison').modal('toggle');
     
     
     $scope.order_no=order_no;
     $scope.order_id=order_id;
     $scope.pendingamount=amount;
     $scope.customer_id=customer_id;
     
     
};


});

</script>  
   
   
<?php include ('table_footer.php'); ?>
</body>


