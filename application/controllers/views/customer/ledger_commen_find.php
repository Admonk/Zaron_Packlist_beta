<?php  include "header.php"; ?>

<style>
.trpoint {
    
    cursor: pointer;
   
}

tbody, td, tfoot, th, thead, tr {
    border: #e9e9e9 solid 1px;
    font-size: 11px;
}

.trpoint:hover {
    background: antiquewhite;
}
.card-header {
    display: block;
    text-align: center;
}
         .loading {
    text-align: center;
}
td a {
    color: black;
}
::-webkit-scrollbar {
    height: 10px !important;
    width: 10px !important;
    cursor: pointer;
}
.table-responsive {
    height: 500px;
    cursor: grab;
}


.ui-widget.ui-widget-content {
    border: 1px solid #d3d3d3;
    z-index: 999999;
}


.table>tbody {
    vertical-align: middle;
}
</style>
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>













<?php

$date=$this->session->userdata['logged_in']['from_date'];
if(isset($_GET['months']))
{
   $mm= date('m',strtotime($_GET['months']));
   $date=date("Y-".$mm."-01");  
}

?>


 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between pb-2">
                                    <h4 class="mb-sm-0 font-size-14">Customer & Vendor Ledger (Common)</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Customer ledger !</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card">

                  
                  <div class="card-body" >


                <div class="row">
                   
                    
                    <div class="col-lg-12" >  
                      <form>
                          <div class="row">
                              <div class="col-md-4" >
                               <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-model="customer" ng-keyup="completeCustomer()" placeholder="Search Customer Or Phone"  id="choices-single-default">
          
           
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="from-date" min="<?php echo date('Y-07-01'); ?>" value="<?php echo date('Y-m-01'); ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" min="<?php echo date('Y-07-01'); ?>"  value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col" style="display:none;">
                             <select class="form-control" id="payment_status">
                                 <option value="All">All</option>
                                 <option value="1">Paid</option>
                                 <option value="0">Un-Paid</option>
                             </select>
                            </div>
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata" >Export</button>
                             
                             
                             
                               <a href="<?php echo base_url(); ?>index.php/customer/ledger_find_delete_log_commen?customer_id={{customer_id_data}}" target="_blank">Delete Log</a>
                               
                               
                            </div>
                           
                          </div>
                      </form>
                     
                     <div class="row" ng-init="fetchDatagetlegderGroupTotal('<?php echo $customer_id; ?>')">
                         
                           
                            <div class="col-xl-3 col-md-3" >
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Opening Balance :
                                                    <span  ng-if="getstatus_op==1" style="color:red">{{total_op | number}}</span>
                                                    <span  ng-if="getstatus_op==0" style="color:green">{{total_op | number}}</span>
                                                </h3>
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
                            
                            <div class="col-xl-3 col-md-3">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Total Debit : <span >{{totaldebit | number}}</span></h3>
                                            </div>
        
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-3">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Total Credit: <span >{{totalcridit | number}}</span></h3>
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
                            
                            
                           
        
                            <div class="col-xl-3 col-md-3" >
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Closing  Balance :
                                                    <span  ng-if="getstatus1==1" style="color:red">{{outstanding | number}}</span>
                                                    <span  ng-if="getstatus1==0" style="color:green">{{outstanding | number}}</span>
                                                </h3>
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
        
        
                           
                        </div>
                     
              <!--              <button type="button" ng-click="onviewparty()"  class="btn btn-soft-danger  waves-effect waves-light" style="float: right;margin: 24px 12px;">Internal Transaction</button>-->
            
                          
              <!--<button type="button" ng-click="onview()"  class="btn btn-soft-success  waves-effect waves-light" style="float: right;margin: 24px 12px;">Receive Payment</button>-->
            
                     
                     
                     <?php
                     $customer_id=0;
                     if(isset($_GET['customer_id']))
                     {
                        $customer_id= $_GET['customer_id'];
                     }
                     ?>
                     
                     <hr>
                     
                  <div id="search-view" >
                                    <div   ng-init="fetchSingleData('<?php echo $customer_id; ?>')">
                                          <h4 class="card-title">{{name}} - {{phone}} | GST: <span class="card-title" ng-if="gst!=0">{{gst}}</span></h4>
                                          
                                          <!-- <a href="<?php echo base_url(); ?>index.php/report/customer_balance_report?customer_id={{customer_id_data}}" target="_blank">View Balance Report</a> -->
                                     </div>
                  </div>
                
                 

            
            
                                        <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                                        <!--<i class="bx bx-search search-icon"></i>-->
                   
            
                        <div class="table-responsive mt-3">
              
          
                   <table id="datatable" class="table table-striped table-bordered" style="position: relative;" width="100%" ng-init="fetchDatagetlegderGroup('<?php echo $customer_id; ?>')" >
                      <thead>
                        <tr style="position: sticky;top: 0;background: #dfdfdf;">

                           <th style="width:50px;"><h5 class="font-size-12 mb-0">No</h5></th>
                          <th style="width:200px;"><h5 class="font-size-12 mb-0">Name</th>
                          <th style="width:130px;"><h5 class="font-size-12 mb-0">Date</h5></th>
                          <th style="width:130px;"><h5 class="font-size-12 mb-0">Ref.No</h5></th>
                             
                        
                          <th style="width:150px;"><h5 class="font-size-12 mb-0">Debit</h5></th>
                          <th style="width:150px;"><h5 class="font-size-12 mb-0">Credit</h5></th>
                          <th style="width:200px;"><h5 class="font-size-12 mb-0">Balance</h5></th>
                           <th style="width:200px;"><h5 class="font-size-12 mb-0">Mode</h5></th>
                            <th style="width:200px;"><h5 class="font-size-12 mb-0">User</h5></th>
                          <th style="width:100px;"><h5 class="font-size-12 mb-0">Narration</h5></th>
    <?php
  
   if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='14' || $this->session->userdata['logged_in']['access']=='2'  || $this->session->userdata['logged_in']['access']=='5')
   {
       
       ?>

                         <th style="width:100px;"><h5 class="font-size-12 mb-0">Action</h5></th>



    <?php
                                                
   }
  
  ?>

            
                        </tr>
                      </thead>
                      
                       <tr class="setload" ><td colspan="9"><loading></loading></td></tr>
                        <tbody   ng-repeat="names in namesDataledgergroup | filter:query">
                            
                            
                        <tr   class="trpoint" ng-if="names.no=='#'" style="font-weight: 800;vertical-align: baseline;">
                            
                           <td>{{names.no}}</td>
                           <td>Opening Balance</td>
                           <td>{{names.payment_date}}</td>
                        
                           <td></td>
                          
                           <td><span ng-if="names.debits!=0">{{names.debits | number}}</span></td>
                           <td><span ng-if="names.credits!=0">{{names.credits | number}}</span></td>
                           <td>
                               
                                
                                   <span  ng-if="names.getstatus==1" style="color:red">{{names.balance | number}}</span>
                                   <span  ng-if="names.getstatus==0" style="color:green">{{names.balance | number}}</span>
                                  
                               
                          </td>
                          <td></td>
                          <td></td>
                           
                            
                        </tr>
                        
                        
                     
                      
                      </tbody>
                       
                      
                         <tbody  ng-repeat="names in namesDataledgergroup | filter:query" >
                            
                            
                       
                         <tr  class="trpoint" ng-if="names.no!='#'">
                            
                           <td>{{names.no}}</td>
                           <td>
                              
                               <a href="<?php echo base_url(); ?>index.php/order/overview?order_id={{names.order_id}}&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process" ng-if="names.order_id!='#'" target="_blank">{{names.name}}</a>
                               
                               <a href="#" ng-if="names.order_id=='#'">{{names.name}}</a>
                               
                               
                               
                               </td>
                          
                          
                           <td>{{names.payment_date}} </td>
                        
                           <td>
                               
                              <a href="<?php echo base_url(); ?>index.php/order/overview?order_id={{names.order_id}}&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process" ng-if="names.order_id!='#'" target="_blank">{{names.reference_no}}</a>
                              <a href="#" ng-if="names.order_id=='#'">{{names.reference_no}}</a>
                             
                              
                           <td>
                               
                              <a href="<?php echo base_url(); ?>index.php/order/overview?order_id={{names.order_id}}&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process" ng-if="names.order_id!='#'" target="_blank">  <span ng-if="names.debits!=0">{{names.debits | number}}</span></a>
                              <a href="#" ng-if="names.order_id=='#'">  <span ng-if="names.debits!=0">{{names.debits | number}}</span></a>
                               
                           </td>
                           <td>
                               
                               
                                <a href="<?php echo base_url(); ?>index.php/order/overview?order_id={{names.order_id}}&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process" ng-if="names.order_id!='#'" target="_blank"> <span ng-if="names.credits!=0">{{names.credits | number}}</span></a>
                                <a href="#" ng-if="names.order_id=='#'">  <span ng-if="names.credits!=0">{{names.credits | number}}</span></a>
                              
                              
                            </td>
                           <td>
                               
                               
                                <a href="<?php echo base_url(); ?>index.php/order/overview?order_id={{names.order_id}}&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process" ng-if="names.order_id!='#'" target="_blank"> 
                                <span  ng-if="names.getstatus==1" style="color:red">{{names.balance | number}}</span>
                                <span  ng-if="names.getstatus==0" style="color:green">{{names.balance | number}}</span>
                                </a>
                                <a href="#" ng-if="names.order_id=='#'"> 
                                
                                 <span  ng-if="names.getstatus==1" style="color:red">{{names.balance | number}}</span>
                                 <span  ng-if="names.getstatus==0" style="color:green">{{names.balance | number}}</span>
                                
                                </a>
                              
                               
                                
                                   
                                  
                               
                               </td>
                           <td>
                               
                                  <a href="<?php echo base_url(); ?>index.php/order/overview?order_id={{names.order_id}}&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process" ng-if="names.order_id!='#'" target="_blank"> 
                              <span  ng-if="names.payment_mode=='Cash'">{{names.payment_mode}}</span>
                               
                                  <span  ng-if="names.payment_mode!='Cash'">
                                   {{names.payment_mode}}
                                   <br>
                                   {{names.bank_name}}
                                   </span>
                                </a>
                                <a href="#" ng-if="names.order_id=='#'"> 
                                
                                  <span  ng-if="names.payment_mode=='Cash'">{{names.payment_mode}}</span>
                               
                                  <span  ng-if="names.payment_mode!='Cash'">
                                   {{names.payment_mode}}
                                   <br>
                                   {{names.bank_name}}
                                   </span>
                                
                                </a>
                              
                               
                              
                               
                           
                           </td>
                              <td>{{names.username_base}} </td>
                           <td>
                                 <a href="<?php echo base_url(); ?>index.php/order/overview?order_id={{names.order_id}}&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process" ng-if="names.order_id!='#'" target="_blank"> 
                                {{names.notes}}
                               
                                </a>
                                <a href="#" ng-if="names.order_id=='#'">{{names.notes}} </a>
                                <samll ng-if="names.org_amount!=0"><br>changed By  : {{names.username}} {{names.org_amount}}</samll>
                               
                             
                               
                               </td>
                               
                               
                              
                                <?php
  
   if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='14' || $this->session->userdata['logged_in']['access']=='2'  || $this->session->userdata['logged_in']['access']=='5')
   {
       
       ?>
                               
                               <td style="display:flex;">
                                     <button type="button" ng-click="editData(names.id)" class="btn btn-outline-danger btn-sm"><i class="mdi mdi-pencil menu-icon"></i></button>
                                   <button type="button" ng-click="deleteData(names.id)" class="btn btn-outline-danger btn-sm"><i class="mdi mdi-delete menu-icon"></i></button></td>
                           
                               </td>

                               <?php
                                                
   }
  
  ?>
                           
                            
                        </tr>
                        
                      
                      </tbody>
                      
                    
                      
                      
                      
                      
                      
                    </table>
              </div> 
                   </div> 
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                        
                    </div>
                    
                </div>




                  



                  </div>
                </div>
              </div>
            </div>

                        
                    </div>
                    <!-- container-fluid -->


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
                                                               
                                                                 <input type="number" min="0" oninput="this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" id="pendingamount" class="form-control">
                                                                 <input type="hidden"   value="{{totalblance}}" id="payamount" class="form-control">
                                                                 
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              <p class="mb-3">
                                                          <span  ng-if="getstatus==1" style="color:red">Balance : {{outstanding | number}}</span>
                                                         <span  ng-if="getstatus==0" style="color:green">Balance : {{outstanding | number}}</span>
                                                         </p>
                                                              
                                                              
                                                               <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Discount Amount </label>
                                                               
                                                                <div class="col-sm-12">
                                                               
                                                                 <input type="number" min="0" oninput="this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" id="discountamount" class="form-control">
                                                                
                                                                  
                                                                </div>
                                                              </div>
                                                            
                                                             
                                                              <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Notes <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="notes" class="form-control" required>
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                               <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Payment Date </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="date" id="payment_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              <br>
                                                             <div class="form-group " style="display:none;">
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







    <div class="modal fade" id="firstmodalcommisonparty" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Internal Transaction</h5>
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
                                                                <label class="col-sm-12 col-form-label">Payer <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance1()" ng-keyup="completeCustomer1()" placeholder="Search Customer"  id="party1">
          
                                                                  
                                                                  <br>
                                                                  <span ng-if="opening_balance1"><b>Available Balance : {{opening_balance1 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                                 
                                                              <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Payee <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance2()"  ng-keyup="completeCustomer2()" placeholder="Search Customer"  id="party2">
          
                                                                         <br>
                                                                  <span ng-if="opening_balance2"><b>Available Balance : {{opening_balance2 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                               
                                                              
                                                              
                                                               <div class="form-group row" id="res_no" >
                                                                <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="number" min="0" oninput="this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" id="amount" name="amount" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                            
                                                             
                                                              <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Notes </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="notes_r" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                               <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Payment Date </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="date" id="payment_date_1" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                            
                                                           
                                                            <div class="row" style="margin: 20px -9px;">
                                                          
                                                            
                                                            <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                    
                                                                 <button type="submit" class="btn btn-primary w-md" style="float: right;" ng-click="transfer()">Payment Transfer</button>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>









   
    <div class="modal fade" id="editdata" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Edit Record</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                     
                                                               <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">{{lable}} <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                              <input type="text" class="form-control"  ng-keyup="completeCustomer3()" placeholder="Search {{lable}}"  id="customerdata">
          
                                                                  
                                                                 
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                               
                                                              
                                                              
                                                                <input type="hidden" id="customer_id" name="customer_id"  class="form-control">
                                                              <input type="hidden" id="party_type_data" name="party_type_data"  class="form-control">
                                                              <input type="hidden"  ng-model="hidden_id">
                                                              
                                                              
                                                              
                                                              <div class="form-group row" id="credit_data" >
                                                                <label class="col-sm-12 col-form-label">Credit Amount </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="credit" name="credit" ng-model="credit" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              <div class="form-group row" id="debit_data" >
                                                                <label class="col-sm-12 col-form-label">Debit Amount </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="debit" name="debit" ng-model="debit" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                               <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Payment Mode <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  
                                                                  <select class="form-control" name="payment_mode_payoff" id="payment_mode_payoff2">
                                                                      
                                                                       <option value="">Select Mode</option>
                                                                       <option value="Cash">Cash</option>
                                                                       <option value="Cheque">Cheque</option>
                                                                       <option value="NEFT/RTGS">NEFT/RTGS</option>
                                                                       <option value="Petty Cash">Petty Cash</option>
                                                                      
                                                                      
                                                                  </select>
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                                
                                                              <div class="form-group row" id="bankaccountshow2" style="display:none;">
                                                                <label class="col-sm-12 col-form-label" id="base_title2">Bank Account </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  
                                                                  <select class="form-control" name="bankaccount"  ng-change="Getbankaccount()" ng-model="getbank" id="bankaccount2">
                                                                      
                                                                      
                                                                  </select>
                                                                   <span ng-if="account_no"> <b> Available Balance : {{current_amount | number}}</b></span>
                                                             
                                                                  
                                                                </div>
                                                              </div>
                                                            
                                                                <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Notes</label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="name" ng-model="name" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                               <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Payment Date</label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="date" id="date" ng-model="create_date" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                            
                                                           
                                                            <div class="row" style="margin: 20px -9px;">
                                                          
                                                            
                                                            <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                    
                                                                 <button type="submit" class="btn btn-primary w-md" style="float: right;" ng-click="bankstatementupdate()">Update</button>
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
    
    
 $('#from-date').blur(function() 
 {

    
    var date = $(this).val();
     
     var valdationdate='<?php echo date("Y-07-01"); ?>';

     if(valdationdate>date)
     {
         $('#from-date').val(valdationdate);
     }

});
    
  $("#exportdatadata").hide();
   
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
      if(val=='Petty Cash')
      {
         
          $('#base_title').html('Petty Cash Account');
          var data='<?php foreach($bankaccount as $val) { if($val->id==24) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
          $('#reference_no').show();
          $('#bankaccountshow').show();
          
          
          
      }
      
      
  });
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
   $('#payment_mode_payoff2').on('change',function(){
      
      
     
      var val=$(this).val();
      
      if(val=='NEFT/RTGS' ||  val=='Cheque')
      {
          
         
          $('#base_title2').html('Bank Account');
          var data='<option value="0">Select Bank</option> <?php foreach($bankaccount as $val) { if($val->id!=25 && $val->id!=24) { ?> <option value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount2').html(data);
          $('#res_no').show();
          $('#bankaccountshow2').show();
      }
      if(val=='Cash')
      {
          
          $('#base_title2').html('Cash Account');
          var data='<?php foreach($bankaccount as $val) { if($val->id==25) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount2').html(data);
          $('#res_no').show();
          $('#bankaccountshow2').show();
          
      }
      if(val=='Petty Cash')
      {
         
          $('#base_title2').html('Petty Cash Account');
          var data='<?php foreach($bankaccount as $val) { if($val->id==24) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount2').html(data);
          $('#reference_no').show();
          $('#bankaccountshow2').show();
          
          
          
      }
      
      
  });
   
      
 
      
  $('#choices-single-default').on('change',function(){
      
      
      
      
       $("#exportdatadata").show();
        
      
  });
  
$('#exportdata').on('click', function() {
  
     var id= <?php echo $customer_id; ?>;
            
            if(id==0)
            {
                 var id= $('#choices-single-default').val();
            }
            
    
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
  
    url = '<?php echo base_url() ?>index.php/customer/fetch_data_get_ledger_view_export_commen?limit=10&deleteid=0&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status;

 
    location = url;

});


});
</script>
<script>

var app = angular.module('crudApp', ['datatables']);


app.directive('loading', function () {
      return {
        restrict: 'E',
        replace:true,
        template: '<div class="loading"><img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" width="20" height="20" /> LOADING...</div>',
        link: function (scope, element, attr) {
              scope.$watch('loading', function (val) {
                  if (val)
                      $(element).show();
                  else
                      $(element).hide();
              });
        }
      }
})

app.filter('number', function () {        
    return function (input) {
        if (! isNaN(input)) {
            var currencySymbol = '';
            //var output = Number(input).toLocaleString('en-IN');   <-- This method is not working fine in all browsers!           
            var result = input.toString().split('.');

            var lastThree = result[0].substring(result[0].length - 3);
            var otherNumbers = result[0].substring(0, result[0].length - 3);
            if (otherNumbers != '')
                lastThree = ',' + lastThree;
            var output = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
            
            if (result.length > 1) {
                output += "." + result[1];
            }            

            return currencySymbol + output;
        }
    }
});

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;
 $scope.getbank=0
    $scope.customer_id_data= <?php echo $customer_id; ?>;

$scope.fetchSingleData = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'customers'}
    }).success(function(data){

          $scope.name = data.company_name;
          $scope.phone = data.phone;
          $scope.email = data.email;
          $scope.gst = data.gst;
          
          $scope.fulladdress = data.fulladdress;
        
         
     
    });
};


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

$scope.search = function(){
    
    
          
            var userid= $('#choices-single-default').val();
            if(userid=='')
            {
                 var userid= <?php echo $customer_id; ?>;
                 $scope.customer_id_data= userid;
            }
            else
            {
                  var result = userid.split('-');
                  $scope.customer_id_data= result[0];
            }
            
            
            
            
            

    var fromdate= $('#from-date').val();



      var valdationdate='<?php echo date("Y-07-01"); ?>';

     if(valdationdate>fromdate)
     {
         var fromdate= valdationdate;
         $('#from-date').val(valdationdate);
     }


    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
   
      $('#search-view').show();
     $('#exportdatadata').show();
     $scope.fetchSingleData(userid);
   
     $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status);
     $scope.fetchDatagetlegderGroupTotal(userid,fromdate,fromto,payment_status);
    
    
    
    
};

$scope.onview = function(id,billno,pendingamount,resno){
     
     
     $('#firstmodalcommison').modal('toggle');
     
     
     $scope.bill_no=billno;
     $scope.payid=id;
     $scope.pendingamount=pendingamount;
     $scope.payamount=pendingamount;
     
     
     $('#reference_no').val(resno);
     
    
  
    
};









 $scope.Getbalance1 = function () {
      
      
        var party=  $('#party1').val();
      
      
           $http({
		      method:"POST",
		      url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
		      data:{'id':party, 'action':'fetch_single_data','tablename':'customers'}
		    }).success(function(data){
		        
		        
		      
		         $scope.opening_balance1 = data.opening_balance;
		         
		        
		     
		    });
      
      
      
};   












 $scope.Getbalance2 = function () {
      
      
        var party=  $('#party2').val();
      
      
           $http({
		      method:"POST",
		      url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
		      data:{'id':party, 'action':'fetch_single_data','tablename':'customers'}
		    }).success(function(data){
		        
		        
		      
		         $scope.opening_balance2 = data.opening_balance;
		         
		        
		     
		    });
      
      
      
};   




$scope.onviewparty = function(){
     $('#firstmodalcommisonparty').modal('toggle');
    
};


                 
  
    
    
     $scope.completeCustomer1=function(){
       
        
      
        var search=  $('#party1').val();
        
        
        
        $( "#party1" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget_commen",
          data:{'search':search,'party_type':'1'}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 
    
    
    
    
    
     $scope.completeCustomer2=function(){
       
        
      
        var search=  $('#party2').val();
        
        
        
        $( "#party2" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget_commen",
          data:{'search':search,'party_type':'1'}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 
    
  
    


 $scope.pointtodriver = function () {
           
           
           
            var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();
            var payment_status= $('#payment_status').val();
            
            var payment_mode_payoff= $('#payment_mode_payoff').val();
            var reference_no= $('#reference_no').val();
             var payment_date= $('#payment_date').val();

            var enteramount= parseInt($('#pendingamount').val());
            
            
            
            
            var customer_id= <?php echo $customer_id; ?>;
            
            if(customer_id==0)
            {
                 var customer_id= $('#choices-single-default').val();
            }
            
            
            
            
            var payamount= parseInt($('#payamount').val());
             var notes= $('#notes').val();
               var discountamount= $('#discountamount').val();
             
              var bankaccount= $('#bankaccount').val();
              var payment_type= $('#payment_type').val();
              
              
              
            
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
                        url:"<?php echo base_url() ?>index.php/customer/save_to_pay",
                        data:{'notes':notes,'discountamount':discountamount,'payment_date':payment_date,'account_head_id':$scope.account_head_id,'enteramount':enteramount,'payment_type':payment_type,'bankaccount':bankaccount,'writeoff':writeoff,'customer_id':customer_id,'payamount':payamount,'payment_mode_payoff':payment_mode_payoff,'reference_no':reference_no}
                        }).success(function(data){
                          
                          
                           
                           $scope.fetchDatagetlegderGroup(data.id,fromdate,fromto,payment_status);
                           $scope.fetchDatagetlegderGroupTotal(data.id,fromdate,fromto,payment_status);
    
                           $('#firstmodalcommison').modal('toggle');
                           
                           
                               $('#payment_mode_payoff').val('');
                               $('#reference_no').val('');
                               $('#pendingamount').val('');
                                $('#discountamount').val('');
                               $('#notes').val('');
                               $('#bankaccount').val('');
                           
                    
                        });
                        
                     }

                
           
           


}















 $scope.transfer = function () {
           
           
            var party1= $('#party1').val();
            var party2= $('#party2').val();
            var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();
            var enteramount= parseInt($('#amount').val());
            var notes= $('#notes_r').val();
             
              
              
            
       

           $scope.saveTransfer(party1,party2,fromdate,fromto,enteramount,notes);
           $scope.saveTransfer1(party2,party1,fromdate,fromto,enteramount,notes);
                          
                
                
                
                
           
           


};


$scope.saveTransfer = function(party1,party2,fromdate,fromto,enteramount,notes){


 var payment_date= $('#payment_date_1').val();
 
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer",
                        data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id}
                        }).success(function(data){
                          
                         
                    
                        });

};



$scope.saveTransfer1 = function(party1,party2,fromdate,fromto,enteramount,notes){


 var payment_date= $('#payment_date_1').val();
 
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer1",
                        data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id}
                        }).success(function(data){
                          
                          
                           
                           $scope.fetchDatagetlegderGroup(data.id);
                           $scope.fetchDatagetlegderGroupTotal(data.id);
    
                           $('#firstmodalcommisonparty').modal('toggle');
                    
                        });

};









 $scope.completeCustomer=function(){
       
        
      
        var search=  $('#choices-single-default').val();
        
        
        
        $( "#choices-single-default" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget_commen",
          data:{'search':search,'party_type':'1'}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 
    
    
    
    
    
    
    
    
    
   
   
   
   

$scope.fetchDatagetlegderGroup = function(id,fromdate,fromto,payment_status){
    
     
     $scope.loading = true;
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
    $http.get('<?php echo base_url() ?>index.php/customer/fetch_data_get_ledger_view_commen?limit=10&deleteid=0&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status).success(function(data){
      
      $scope.loading = false;
         $scope.query = {}
      $scope.queryBy = '$';
      
      
      $scope.namesDataledgergroup = data;
      
      
      
        var amounttotal = 0;
        for(var i = 0; i < data.length; i++){
            var amount = parseInt(data[i].amount);
            amounttotal += amount;
        }
      
      
      
        $scope.amounttotal = amounttotal;
      
      
      
      
      
         var payofftotal = 0;
        for(var i = 0; i < data.length; i++){
            var balance = parseInt(data[i].balance);
            payofftotal += balance;
        }
      
      
      
     
      
        $scope.Payofftotal = payofftotal;
        
        
        
        
        var payouttotal = 0;
        for(var i = 0; i < data.length; i++){
            var Payout = parseInt(data[i].Payout);
            payouttotal += Payout;
        }
      
      
      
        $scope.Payouttotal = payouttotal;
      
      
      
      
     
      
      
      
      
    });
  };
  
  
   
  
  
  
$scope.fetchDatagetlegderGroupTotal = function(id,fromdate,fromto,payment_status){
    
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
    $http.get('<?php echo base_url() ?>index.php/customer/fetch_data_get_ledger_view_total_commen?limit=10&deleteid=0&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status).success(function(data){
      
      
      
      
        $scope.totalpayment = data.totalpayment;
        $scope.totalpaid = data.totalpaid;
        $scope.totalblance = data.totalblance;
        
        
        $scope.totaldebit = data.totaldebit;
        $scope.totalcridit = data.totalcridit;
        
        $scope.outstanding = data.outstanding;
         $scope.total_op = data.total_op;
      
    $scope.getstatus = data.getstatus;
    $scope.getstatus_op = data.getstatus_op;
    $scope.getstatus1 = data.getstatus1;
      
    });
  };
  
  
 $scope.editData = function(id){
     
     $('#debit_data').show();
     $('#credit_data').show();
     
      $http({
      method:"POST",
      url:"<?php echo base_url(); ?>index.php/report/fetch_single_data_by",
      data:{'id':id, 'action':'fetch_single_data','tablename':'all_ledgers'}
      }).success(function(data){
      
      
      
      
       
       $('#customerdata').val(data.party_name);
       $('#payment_mode_payoff2').val(data.payment_mode);
      $('#customer_id').val(data.customer_id);
      $('#name').val(data.notes);
      
       $('#payment_mode_payoff2').change();
      
       
       
       
       
       if(data.debit=='0')
       {
          // $('#debit_data').hide();
       }
       
         
        
       if(data.credit=='0')
       {
           //$('#credit_data').hide();
       }
       $('#party_type_data').val(data.party_type);
       
        $scope.debit = data.debit; 
        $scope.credit = data.credit; 
        $scope.lable = data.lable; 
       
        $scope.create_date = new Date(data.create_date); 
      
        $scope.hidden_id = data.id;
        $scope.submit_button = 'Update';
        
        
         $('#bankaccount2').val(data.bank_id);
     
       });
    
       $('#editdata').modal('toggle');
       
       
       
       
    
};       
  
  
$scope.completeCustomer3=function(){
       
        
      
        var search=  $('#customerdata').val();
        
        var party_type_data=  $('#party_type_data').val();
        
        $("#customerdata" ).autocomplete({
        source: $scope.availableTags
        });
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget_commen",
          data:{'search':search,'party_type':party_type_data}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 
  
  
$scope.bankstatementupdate = function(){


                        var customerdata=$('#customerdata').val();
                        var customer_id=$('#customer_id').val();
                        var party_type_data=$('#party_type_data').val();
                        var bankaccount=$('#bankaccount2').val();
                        var payment_mode_payoff=$('#payment_mode_payoff2').val();
                         var notes=$('#name').val();
                         
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/report/updaterecord",
                        data:{'credit':$scope.credit,'customerdata':customerdata,'customer_id':customer_id,'bankaccount':bankaccount,'payment_mode_payoff':payment_mode_payoff,'party_type_data':party_type_data,'id':$scope.hidden_id,'debit':$scope.debit,'notes':notes,'create_date':new Date($scope.create_date)}
                        }).success(function(data)
                        {
                          
                                    $('#editdata').modal('toggle');
                                    var userid= <?php echo $customer_id; ?>;
                                    var fromdate= $('#from-date').val();
                                    var fromto= $('#to-date').val();
                                    var payment_status='<?php echo $_GET['type']; ?>';  
                                    var party_type= $('#party_type').val();
                                    $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status,party_type);



                                      var customer_id1=customerdata.split("-")[0];
   

                                       if(customer_id1>0)
                                       {


                                          $http.get('https://erp.zaron.in/customer_balance_cron.php?customer_id='+customer_id1).success(function(datass){});

                                       }

                                                        
                    
                        });

};
$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
        
   
     
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/products/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'all_ledgers'}
      }).success(function(data){
        
        
            var userid= <?php echo $customer_id; ?>;
            var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();
            var payment_status='<?php echo $_GET['type']; ?>';  
            var party_type= $('#party_type').val();
   
    
             $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status,party_type);
             $http.get('https://erp.zaron.in/customer_balance_cron.php?customer_id='+userid).success(function(datass){});
    
        
      }); 
    }
};

  

});

</script>
           <script src="<?php echo base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="<?php echo base_url(); ?>assets/libs/pace-js/pace.min.js"></script>

        <!-- Required datatable js -->
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
       
                 <script src="<?php echo base_url(); ?>assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

         <script src="<?php echo base_url(); ?>assets/libs/pristinejs/pristine.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/pages/form-validation.init.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/pages/form-advanced.init.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
 
    
 </html>



</body>



