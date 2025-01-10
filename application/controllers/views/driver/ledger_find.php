<?php include "header.php";
   $driver_collection_status = 1;
   
   $driver_collection_status_text1 = " Rent & Collection Payment";
   
   
   $ch="";
   $ch1="";
   if (isset($_GET['driver_collection_status'])) {
   
   
   
     $driver_collection_status = $_GET['driver_collection_status'];
     if ($driver_collection_status == 1) {
       $driver_collection_status_text1 = " Driver Rent Payment";
       $text = "RENT";
       $ch="checked";
     } else {
       $driver_collection_status_text1 = " Driver Collection Payment";
       $text = "COLLECTION";
       $ch1="checked";
     }
   
   
   
   
   }
   
   
   
   ?>
<style>
   .trpoint {
   cursor: pointer;
   }
   .radio-segment {
   display: inline-block;
   background-color: #e0e0e0;
   /* padding: 1px; */
   border-radius: 1px;
   width: 95%;
   margin-left: 12px;
   margin-bottom: 6px;
   border-radius: 16px;
   }
   .radio-button {
   display: inline-block;
   padding: 3px 12px; /* Adjust padding to control button size */
   font-size: 12px; /* Adjust font size */
   background-color: #e0e0e0;
   border: 1px solid #ccc;
   border-radius: 10px;
   cursor: pointer;
   user-select: none;
   margin-top: 6px;
   margin-right: 6px; /* Add some spacing between the buttons */
   }
   .radio:checked + .radio-button {
   background-color: #4caf50; /* Change background color when selected */
   color: white;
   border-color: #4caf50;
   }
   .table>tbody {
   vertical-align: middle;
   }
   .trpoint:hover {
   background: antiquewhite;
   }
   .card-header {
   display: block;
   text-align: center;
   }
   ::-webkit-scrollbar {
   height: 10px !important;
   width: 10px !important;
   cursor: pointer;
   }
   td {
   font-size: 11px;
   color: black;
   }
   .loading {
   text-align: center;
   }
   .table-responsive {
   height: 500px;
   cursor: grab;
   }
   .ui-widget.ui-widget-content {
   border: 1px solid #d3d3d3;
   z-index: 999999;
   }
   .table-bordered {
   border: 1px solid #e9e9ef;
   }
   .bgcolorchange {
   background: #ededed;
   }
</style>
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">
   <div id="layout-wrapper">
   <?php echo $top_nav; ?>
   <?php
      $customer_id = 0;
      if (isset($_GET['customer_id'])) {
        $customer_id = $_GET['customer_id'];
      }
      ?>
   <div class="main-content">
      <div class="page-content">
         <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
               <div class="col-12">
                  <div class="page-title-box d-sm-flex align-items-center justify-content-between pb-2">
                     <h4 class="mb-sm-0 font-size-14">Driver ledger</h4>
                     <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                           <li class="breadcrumb-item active">Driver ledger !</li>
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
                           <h4><?php echo $driver_collection_status_text1; ?></h4>
                           <div class="col-lg-12" >
                              <form>
                                 <div class="row">
                                    <div class="col-md-4" >
                                       <select class="form-control" data-trigger name="choices-single-default"
                                          id="choices-single-default"
                                          placeholder="This is a search">
                                          <option value="">Search Driver</option>
                                          <?php
                                             foreach ($driver as $val) {
                                               ?>
                                          <option  value="<?php echo $val->id; ?>" <?php if ($customer_id == $val->id) {
                                             echo 'selected';
                                             } ?>><?php echo $text; ?> - <?php echo $val->name; ?></option>
                                          <?php
                                             }
                                             
                                             ?>
                                       </select>
                                    </div>
                                    <div class="col">
                                       <input type="date" class="form-control" id="from-date" min="<?php echo date('Y-07-01'); ?>" value="<?php echo date('Y-m-01'); ?>">
                                    </div>
                                    <div class="col">
                                       <input type="date" class="form-control" id="to-date" min="<?php echo date('Y-07-01'); ?>" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                    <div class="col" style="display:none;">
                                       <select class="form-control" id="payment_status">
                                          <option value="All">All</option>
                                          <option value="Paid">Paid</option>
                                          <option value="Un-Paid">Un-Paid</option>
                                       </select>
                                    </div>
                                    <div class="col">
                                       <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                                       <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata" >Export</button>
                                       <a href="<?php echo base_url(); ?>index.php/driver/ledger_find_delete_log?customer_id={{customer_id_data}}" target="_blank">Delete Log</a>
                                    </div>
                                 </div>
                              </form>
                              <div class="row" ng-init="fetchDatagetlegderGroupTotal('<?php echo $customer_id; ?>')">
                                 <div class="col-xl-3 col-md-3">
                                    <!-- card -->
                                    <div class="card shadow-none card-h-50 mb-0">
                                       <!-- card body -->
                                       <div class="card-body">
                                          <div class="d-flex align-items-center">
                                             <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Opening  Balance:  
                                                   <span  ng-if="opstatus==1" style="color:red">{{openingbalance | number}}</span>
                                                   <span  ng-if="opstatus==0" style="color:green">{{openingbalance | number}}</span>
                                                </h3>
                                                <small id="dateview"><?php echo date('01-m-Y'); ?></small>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                 </div>
                                 <!-- end col -->
                                 <div class="col-xl-3 col-md-3">
                                    <!-- card -->
                                    <div class="card shadow-none card-h-50 mb-0">
                                       <!-- card body -->
                                       <div class="card-body">
                                          <div class="d-flex align-items-center">
                                             <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate"> Debit: <span >{{totaldebit | number}}</span></h3>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                 </div>
                                 <!-- end col -->
                                 <div class="col-xl-3 col-md-3">
                                    <!-- card -->
                                    <div class="card shadow-none card-h-50 mb-0">
                                       <!-- card body -->
                                       <div class="card-body">
                                          <div class="d-flex align-items-center">
                                             <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate"> Credit: <span >{{totalcridit | number}}</span></h3>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                 </div>
                                 <!-- end col-->
                                 <div class="col-xl-3 col-md-3" >
                                    <!-- card -->
                                    <div class="card shadow-none card-h-50 mb-0">
                                       <!-- card body -->
                                       <div class="card-body">
                                          <div class="d-flex align-items-center">
                                             <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Closing Balance:
                                                   <span  ng-if="getstatus1==1" style="color:red">{{outstanding | number}}</span>
                                                   <span  ng-if="getstatus1==0" style="color:green">{{outstanding | number}}</span>
                                                </h3>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                 </div>
                                 <!-- end col-->
                              </div>
                              <hr>
                              <div id="search-view" >
                                 <div class="card-header py-0"  ng-init="fetchSingleData('<?php echo $customer_id; ?>')">
                                    <div class="row">
                                       <div class="col-md-8">
                                          <h4 class="card-title text-start">{{name}} | {{phone}}</h4>
                                       </div>
                                       <div class="col-md-4">
                                          <?php
                                             if ($this->session->userdata['logged_in']['access'] == '1' || $this->session->userdata['logged_in']['access'] == '14' || $this->session->userdata['logged_in']['access'] == '2') {
                                             
                                               ?>
                                          <button type="button" ng-click="onviewparty()"  class="btn btn-soft-danger  waves-effect waves-light" style="float: right;margin: 4px 12px;">Internal Transaction</button>
                                          <button type="button" ng-click="onview()"   class="btn btn-soft-success  waves-effect waves-light" style="float: right;margin: 4px 12px;">Payout</button>
                                          <?php
                                             }
                                             
                                             ?>
                                       </div>
                                    </div>
                                 </div>
                                 <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched mt-3" placeholder="Search..." ng-model="query[queryBy]">
                                 <div class="table-responsive">
                                    <table id="datatable"  class="table table-striped table-bordered" style="position: relative;" width="100%" ng-init="fetchDatagetlegderGroup(<?php echo $customer_id; ?>)" >
                                       <thead>
                                          <tr style="position: sticky;top: 0;background: #dfdfdf;">
                                             <th style="width:50px;">
                                                <h5 class="font-size-12 mb-0">No</h5>
                                             </th>
                                             <th style="width:100px;">
                                                <h5 class="font-size-12 mb-0">
                                                Particular
                                             </th>
                                             <th style="width:180px;">
                                                <h5 class="font-size-12 mb-0">Create Date</h5>
                                             </th>
                                             <th style="width:180px;">
                                                <h5 class="font-size-12 mb-0">Modified Date</h5>
                                             </th>
                                             <th style="width:130px;">
                                                <h5 class="font-size-12 mb-0">Ref.No</h5>
                                             </th>
                                             <th style="width:100px;">
                                                <h5 class="font-size-12 mb-0">Debit</h5>
                                             </th>
                                             <th style="width:100px;">
                                                <h5 class="font-size-12 mb-0">Credit</h5>
                                             </th>
                                             <th style="width:100px;">
                                                <h5 class="font-size-12 mb-0">Balance</h5>
                                             </th>
                                             <th style="width:200px;">
                                                <h5 class="font-size-12 mb-0">Mode</h5>
                                             </th>
                                             <th style="width:200px;">
                                                <h5 class="font-size-12 mb-0">Narration</h5>
                                             </th>
                                             <th style="width:200px;">
                                                <h5 class="font-size-12 mb-0">User</h5>
                                             </th>
                                             <?php
                                                if ($this->session->userdata['logged_in']['access'] == '1' || $this->session->userdata['logged_in']['access'] == '14' || $this->session->userdata['logged_in']['access'] == '2' || $this->session->userdata['logged_in']['access'] == '5') {
                                                
                                                  ?>
                                             <th style="width:100px;">
                                                <h5 class="font-size-12 mb-0">Action</h5>
                                             </th>
                                             <?php
                                                }
                                                
                                                ?>
                                          </tr>
                                       </thead>
                                       <tr class="setload" >
                                          <td colspan="9">
                                             <loading></loading>
                                          </td>
                                       </tr>
                                       <tbody  ng-repeat="names in namesDataledgergroup | filter:query" >
                                          <tr  class="trpoint" ng-if="names.no=='#'" style="background: #e3e3e3;font-weight: 800;vertical-align: baseline;">
                                             <td>{{names.no}}</td>
                                             <td>Opening Balance</td>
                                             <td>{{names.payment_date}} </td>
                                             <td></td>
                                             <td></td>
                                             <td ><span ng-if="names.debits!=0">{{names.debits | number}}</span></td>
                                             <td ><span ng-if="names.credits!=0">{{names.credits | number}}</span></td>
                                             <td >
                                                <!-- <span  ng-if="names.getstatus==1" style="color:red">{{names.balance | number}}</span> -->
                                                <!-- <span  ng-if="names.getstatus==0" style="color:green">{{names.balance | number}}</span> -->
                                             </td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                          </tr>
                                       </tbody>
                                       <tbody  ng-repeat="names in namesDataledgergroup | filter:query" >
                                          <tr  class="trpoint {{names.addclass}}" ng-if="names.no!='#'">
                                             <td>{{names.no}}</td>
                                             <td> {{names.account_head_name}}</td>
                                             <td>{{names.payment_date}} {{names.payment_time}}</td>
                                             <td>{{names.update_date}} </td>
                                             <td><b ng-if="names.order_no">{{names.order_no}}</b></td>
                                             <td ><span ng-if="names.debits!=0">{{names.debits | number}}</span></td>
                                             <td ><span ng-if="names.credits!=0">{{names.credits | number}}</span></td>
                                             <td >
                                                <span  ng-if="names.getstatus==1" style="color:red">{{names.balance | number}}</span>
                                                <span  ng-if="names.getstatus==0" style="color:green">{{names.balance | number}}</span>
                                             </td>
                                             <td >
                                                <p ng-if="names.payment_mode!=0">
                                                   <span  ng-if="names.payment_mode=='Cash'">{{names.payment_mode}}</span>
                                                   <span  ng-if="names.payment_mode!='Cash'">
                                                   {{names.payment_mode}}
                                                   <br>
                                                   <small>{{names.bank_name}}</small>
                                                   </span>
                                                </p>
                                             </td>
                                             <td>
                                                {{names.notes}}
                                                <samll ng-if="names.org_amount!=0"><br> {{names.username}} {{names.org_amount}}</samll>
                                             </td>
                                             <td>
                                                {{names.username_base}}
                                             </td>
                                             <?php
                                                if ($this->session->userdata['logged_in']['access'] == '1' || $this->session->userdata['logged_in']['access'] == '14' || $this->session->userdata['logged_in']['access'] == '2' || $this->session->userdata['logged_in']['access'] == '5') {
                                                
                                                  ?>
                                             <td style="display: contents;">
                                                <button type="button" ng-click="editData(names.id)" class="btn btn-outline-danger btn-sm"><i class="mdi mdi-pencil menu-icon"></i></button>
                                                <button type="button" ng-click="deleteData(names.id)" class="btn btn-outline-danger btn-sm"><i class="mdi mdi-delete menu-icon"></i></button>
                                                <button type="button" ng-click="onviewparty_edit(names.id,names.customer_id,names.name,names.debits,names.credits,names.dummy_customer_id,names.dummy_customer_name,names.dummy_party_type,names.dummy_amount)"  class="btn btn-outline-danger btn-sm"><i class="mdi mdi-ray-start-arrow menu-icon"></i></button>
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
            <!-- container-fluid -->
         </div>
         <!-- End Page-content -->
      </div>
   </div>
   <div class="modal fade" id="firstmodalcommison" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalToggleLabel">Payout To Driver</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="col-md-12" style="display:none;">
                  <div class="form-group row">
                     <label class="col-sm-12 col-form-label"><b>Ledger Account</b> <span style="color:red;">*</span> </label>
                     <div class="col-sm-12">
                        <select  class="form-control" data-trigger required  name="accountshead"  ng-model="account_head_id" >
                           <option value="">Select Ledger Account</option>
                           <?php
                              foreach ($accountheads as $val) {
                              
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
                        <option value="Petty Cash">Petty Cash</option>
                        <option value="Cheque">Cheque</option>
                        <option value="NEFT/RTGS">NEFT/RTGS</option>
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
                     <input type="textt"  min="0" onkeypress="return isNumberKey(event)"   id="pendingamount" class="form-control">
                     <input type="hidden"   value="{{totalblance}}" id="payamount" class="form-control">
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
               <div class="row" style="margin: 20px -9px;">
                  <div class="col-md-12">
                     <div class="form-group row">
                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary w-md" id="pointtodriver" style="float: right;" ng-click="pointtodriver()">Payment Save</button>
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
                  <label class="col-sm-12 col-form-label">Payer <span style="color:red;">*</span></label>
                  <div class="some-class">
                     <input type="radio" class="radio" name="Payer12"  value="1" id="Customer12" ng-click="selectOption('Other')"/>
                     <label for="Customer12">Customer</label>
                     <input type="radio" class="radio" name="Payer12" value="3" id="Vendor12" ng-click="selectOption('Other')"/>
                     <label for="Vendor12">Vendor</label>
                     <input type="radio" class="radio" checked name="Payer12" value="2" id="Driver12" ng-click="selectOption('Driver')"/>
                     <label for="Driver12">Driver</label>
                     <input type="radio" class="radio"  name="Payer12"  value="5" id="Other12" ng-click="selectOption('Other')"/>
                     <label for="Other12">Others Ledger</label>
                  </div>
                  <!-- Display driver options when showDriverOptionsedit is true -->
                  <div ng-show="showDriverOptionsedit" class="radio-segment">
                     <input type="radio" class="radio" name="DriverOptionedit" <?php echo $ch; ?> value="1" id="rentdriver" />
                     <label class="radio-button" for="rentdriver">Rent</label>
                     <input type="radio" class="radio" name="DriverOptionedit" value="0" <?php echo $ch1; ?> id="collectdriver" />
                     <label class="radio-button" for="collectdriver">Collection</label>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-sm-12 col-form-label">{{lable}} <span style="color:red;">*</span></label>
                  <div class="col-sm-12">
                     <input type="text" class="form-control"  ng-keyup="completeCustomer9()"  ng-blur="Getbalance9()" placeholder="Search {{lable}}"  id="customerdata">
                     <br>
                     <span ng-if="opening_balance9"><b>Available Balance : {{opening_balance9 | number}}</b></span>
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
                           <button type="submit" class="btn btn-primary w-md" id="editSave" style="float: right;" ng-click="bankstatementupdate()">Update</button>
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
                        <select  class="form-control" required data-trigger name="accountshead"  ng-model="account_head_id" >
                           <option value="">Select Ledger Account</option>
                           <?php
                              foreach ($accountheads as $val) {
                              
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
                  <label class="col-sm-12 col-form-label">Payer  <span style="color:red;">*</span></label>
                  <div class="some-class">
                     <input type="radio" class="radio" name="Payer1"  value="1" id="Customer" ng-click="selectOption('Other1')"/>
                     <label for="Customer">Customer</label>
                     <input type="radio" class="radio" name="Payer1"  value="3" id="Vendor" ng-click="selectOption('Other1')"/>
                     <label for="Vendor">Vendor</label>
                     <input type="radio" class="radio" name="Payer1" checked value="2" id="Driver" ng-click="selectOption('Driver1')" />
                     <label for="Driver">Driver</label>
                     <input type="radio" class="radio" name="Payer1" value="5" id="Other" ng-click="selectOption('Other1')" />
                     <label for="Other">Others Ledger</label>
                  </div>
                  <!-- Display driver options when showDriverOptions is true -->
                  <div ng-show="showDriverOptions1" class="radio-segment">
                     <input type="radio" class="radio" name="DriverOption1" <?php echo $ch; ?> value="1" id="rentdriver1" />
                     <label class="radio-button" for="rentdriver1">Rent</label>
                     <input type="radio" class="radio" name="DriverOption1" value="0" <?php echo $ch1; ?> id="collectdriver1" />
                     <label class="radio-button" for="collectdriver1">Collection</label>
                  </div>
                  <div class="col-sm-12">
                     <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance1()" ng-keyup="completeCustomer1()" placeholder="Search Names"  id="party1">
                     <br>
                     <span ng-if="opening_balance1"><b>Avilable Balance : {{opening_balance1 | number}}</b></span>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-sm-12 col-form-label">Payee 1  <span style="color:red;">*</span>  <button type="button" style="float: right;" ng-click="Payee2(2)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-plus menu-icon"></i></button>
                  </label>
                  <div class="some-class">
                     <input type="radio" class="radio" name="Payee1"  value="1" id="Customer1" ng-click="selectOption('Other2')"/>
                     <label for="Customer1">Customer</label>
                     <input type="radio" class="radio" name="Payee1"  value="3" id="Vendor1" ng-click="selectOption('Other2')"/>
                     <label for="Vendor1">Vendor</label>
                     <input type="radio" class="radio" name="Payee1" checked value="2" id="Driver1" ng-click="selectOption('Driver2')" />
                     <label for="Driver1">Driver</label>
                     <input type="radio" class="radio" name="Payee1" value="5" id="Other1" ng-click="selectOption('Other2')"/>
                     <label for="Other1">Others Ledger</label>
                  </div>
                  <!-- Display driver options when showDriverOptions1 is true -->
                  <div ng-show="showDriverOptions2" class="radio-segment">
                     <input type="radio" class="radio" name="DriverOption2" value="1" <?php echo $ch; ?> id="rentdriver2" />
                     <label class="radio-button"for="rentdriver2">Rent</label>
                     <input type="radio" class="radio" name="DriverOption2" value="0" <?php echo $ch1; ?> id="collectdriver2" />
                     <label class="radio-button" for="collectdriver2">Collection</label>
                  </div>
                  <div class="col-sm-12">
                     <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance2(2)"  ng-keyup="completeCustomer2(2)" placeholder="Search Names"  id="party2">
                     <br>
                     <span ng-if="opening_balance2"><b>Avilable Balance : {{opening_balance2 | number}}</b></span>
                  </div>
               </div>
               <div class="form-group row" id="res_no" >
                  <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                  <div class="col-sm-12">
                     <input type="text"  min="0" onkeypress="return isNumberKey(event)" id="amount1" name="amount1" class="form-control">
                  </div>
               </div>
               <div class="show2" style="display:none;">
                  <div class="form-group row">
                     <label class="col-sm-12 col-form-label">Payee 2 <span style="color:red;">*</span>  
                     <button type="button" style="float: right;" ng-click="removeDiv(2)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-minus menu-icon"></i></button>
                     <button type="button" style="float: right;" ng-click="Payee2(3)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-plus menu-icon"></i></button> 
                     </label>
                     <div class="some-class">
                        <input type="radio" class="radio" name="Payee2"  value="1" id="Customer2" ng-click="selectOption('Other3')"/>
                        <label for="Customer2">Customer</label>
                        <input type="radio" class="radio" name="Payee2"  value="3" id="Vendor2" ng-click="selectOption('Other3')"/>
                        <label for="Vendor2">Vendor</label>
                        <input type="radio" class="radio" name="Payee2" checked value="2" id="Driver2" ng-click="selectOption('Driver3')" />
                        <label for="Driver2">Driver</label>
                        <input type="radio" class="radio" name="Payee2" value="5" id="Other2" ng-click="selectOption('Other3')"/>
                        <label for="Other2">Others Ledger</label>
                     </div>
                     <!-- Display driver options when showDriverOptions2 is true -->
                     <div ng-show="showDriverOptions3" class="radio-segment">
                        <input type="radio" class="radio" name="DriverOption3" value="1" id="rentdriver3" />
                        <label class="radio-button" for="rentdriver3">Rent</label>
                        <input type="radio" class="radio" name="DriverOption3" value="0" id="collectdriver3" />
                        <label class="radio-button" for="collectdriver3">Collection</label>
                     </div>
                     <div class="col-sm-12">
                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance2(3)"  ng-keyup="completeCustomer2(3)" placeholder="Search Names"  id="party3">
                        <br>
                        <span ng-if="opening_balance3"><b>Avilable Balance : {{opening_balance3 | number}}</b></span>
                     </div>
                  </div>
                  <div class="form-group row" id="res_no" >
                     <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                     <div class="col-sm-12">
                        <input type="text"  min="0" onkeypress="return isNumberKey(event)" id="amount2" name="amount2" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="show3" style="display:none;">
                  <div class="form-group row">
                     <label class="col-sm-12 col-form-label">Payee 3 <span style="color:red;">*</span>  
                     <button type="button" style="float: right;" ng-click="removeDiv(3)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-minus menu-icon"></i></button>
                     <button type="button" style="float: right;" ng-click="Payee2(4)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-plus menu-icon"></i></button>
                     </label>
                     <div class="some-class">
                        <input type="radio" class="radio" name="Payee3"  value="1" id="Customer3" ng-click="selectOption('Other4')"/>
                        <label for="Customer3">Customer</label>
                        <input type="radio" class="radio" name="Payee3"  value="3" id="Vendor3"ng-click="selectOption('Other4')"/>
                        <label for="Vendor3">Vendor</label>
                        <input type="radio" class="radio" name="Payee3" checked value="2" id="Driver3" ng-click="selectOption('Driver4')" />
                        <label for="Driver3">Driver</label>
                        <input type="radio" class="radio" name="Payee3" value="5" id="Other3"ng-click="selectOption('Other4')" />
                        <label for="Other3">Others Ledger</label>
                     </div>
                     <!-- Display driver options when showDriverOptions4 is true -->
                     <div ng-show="showDriverOptions4" class="radio-segment">
                        <input type="radio" class="radio" name="DriverOption4" value="1" id="rentdriver4" />
                        <label class="radio-button" for="rentdriver4">Rent</label>
                        <input type="radio" class="radio" name="DriverOption4" value="0" id="collectdriver4" />
                        <label class="radio-button" for="collectdriver4">Collection</label>
                     </div>
                     <div class="col-sm-12">
                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance2(4)"  ng-keyup="completeCustomer2(4)" placeholder="Search Names"  id="party4">
                        <br>
                        <span ng-if="opening_balance4"><b>Avilable Balance : {{opening_balance4 | number}}</b></span>
                     </div>
                  </div>
                  <div class="form-group row" id="res_no" >
                     <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                     <div class="col-sm-12">
                        <input type="text"  min="0" onkeypress="return isNumberKey(event)" id="amount3" name="amount3" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="show4" style="display:none;">
                  <div class="form-group row">
                     <label class="col-sm-12 col-form-label">Payee 4 <span style="color:red;">*</span>  
                     <button type="button" style="float: right;" ng-click="removeDiv(4)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-minus menu-icon"></i></button>
                     <button type="button" style="float: right;" ng-click="Payee2(5)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-plus menu-icon"></i></button>
                     </label>
                     <div class="some-class">
                        <input type="radio" class="radio" name="Payee4"  value="1" id="Customer4" ng-click="selectOption('Other5')"/>
                        <label for="Customer4">Customer</label>
                        <input type="radio" class="radio" name="Payee4"  value="3" id="Vendor4" ng-click="selectOption('Other5')"/>
                        <label for="Vendor4">Vendor</label>
                        <input type="radio" class="radio" name="Payee4" checked value="2" id="Driver4" ng-click="selectOption('Driver5')" />
                        <label for="Driver4">Driver</label>
                        <input type="radio" class="radio" name="Payee4" value="5" id="Other4" ng-click="selectOption('Other5')"/>
                        <label for="Other4">Others Ledger</label>
                     </div>
                     <!-- Display driver options when showDriverOptions5 is true -->
                     <div ng-show="showDriverOptions5" class="radio-segment">
                        <input type="radio" class="radio" name="DriverOption5" value="1" id="rentdriver5" />
                        <label class="radio-button" for="rentdriver5">Rent</label>
                        <input type="radio" class="radio" name="DriverOption5" value="0" id="collectdriver5" />
                        <label class="radio-button" for="collectdriver5">Collection</label>
                     </div>
                     <div class="col-sm-12">
                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance2(5)"  ng-keyup="completeCustomer2(5)" placeholder="Search Names"  id="party5">
                        <br>
                        <span ng-if="opening_balance5"><b>Avilable Balance : {{opening_balance5 | number}}</b></span>
                     </div>
                  </div>
                  <div class="form-group row" id="res_no" >
                     <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                     <div class="col-sm-12">
                        <input type="text"  min="0" onkeypress="return isNumberKey(event)" id="amount4" name="amount4" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="show5" style="display:none;">
                  <div class="form-group row">
                     <label class="col-sm-12 col-form-label">Payee 5 <span style="color:red;">*</span>  
                     <button type="button" style="float: right;" ng-click="removeDiv(5)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-minus menu-icon"></i></button>
                     <button type="button" style="float: right;" ng-click="Payee2(6)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-plus menu-icon"></i></button>
                     </label>
                     <div class="some-class">
                        <input type="radio" class="radio" name="Payee5"  value="1" id="Customer5" ng-click="selectOption('Other6')"/>
                        <label for="Customer5">Customer</label>
                        <input type="radio" class="radio" name="Payee5"  value="3" id="Vendor5" ng-click="selectOption('Other6')"/>
                        <label for="Vendor5">Vendor</label>
                        <input type="radio" class="radio" name="Payee5" checked value="2" id="Driver5" ng-click="selectOption('Driver6')" />
                        <label for="Driver5">Driver</label>
                        <input type="radio" class="radio" name="Payee5" value="5" id="Other5" ng-click="selectOption('Other6')"/>
                        <label for="Other5">Others Ledger</label>
                     </div>
                     <!-- Display driver options when showDriverOptions6 is true -->
                     <div ng-show="showDriverOptions6" class="radio-segment">
                        <input type="radio" class="radio" name="DriverOption6" value="1" id="rentdriver6" />
                        <label class="radio-button" for="rentdriver6">Rent</label>
                        <input type="radio" class="radio" name="DriverOption6" value="0" id="collectdriver6" />
                        <label class="radio-button" for="collectdriver6">Collection</label>
                     </div>
                     <div class="col-sm-12">
                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance2(6)"  ng-keyup="completeCustomer2(6)" placeholder="Search Names"  id="party6">
                        <br>
                        <span ng-if="opening_balance6"><b>Avilable Balance : {{opening_balance6 | number}}</b></span>
                     </div>
                  </div>
                  <div class="form-group row" id="res_no" >
                     <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                     <div class="col-sm-12">
                        <input type="text"  min="0" onkeypress="return isNumberKey(event)" id="amount5" name="amount5" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="show6" style="display:none;">
                  <div class="form-group row">
                     <label class="col-sm-12 col-form-label">Payee 6 <span style="color:red;">*</span>  
                     <button type="button" style="float: right;" ng-click="removeDiv(6)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-minus menu-icon"></i></button>
                     <button type="button" style="float: right;" ng-click="Payee2(7)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-plus menu-icon"></i></button>
                     </label>
                     <div class="some-class">
                        <input type="radio" class="radio" name="Payee6"  value="1" id="Customer6" ng-click="selectOption('Other7')"/>
                        <label for="Customer6">Customer</label>
                        <input type="radio" class="radio" name="Payee6"  value="3" id="Vendor6" ng-click="selectOption('Other7')"/>
                        <label for="Vendor6">Vendor</label>
                        <input type="radio" class="radio" name="Payee6" checked value="2" id="Driver6" ng-click="selectOption('Driver7')" />
                        <label for="Driver6">Driver</label>
                        <input type="radio" class="radio" name="Payee6" value="5" id="Other6" ng-click="selectOption('Other7')"/>
                        <label for="Other6">Others Ledger</label>
                     </div>
                     <!-- Display driver options when showDriverOptions7 is true -->
                     <div ng-show="showDriverOptions7" class="radio-segment">
                        <input type="radio" class="radio" name="DriverOption7" value="1" id="rentdriver7" />
                        <label class="radio-button" for="rentdriver7">Rent</label>
                        <input type="radio" class="radio" name="DriverOption7" value="0" id="collectdriver7" />
                        <label class="radio-button" for="collectdriver7">Collection</label>
                     </div>
                     <div class="col-sm-12">
                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance2(7)"  ng-keyup="completeCustomer2(7)" placeholder="Search Names"  id="party7">
                        <br>
                        <span ng-if="opening_balance7"><b>Avilable Balance : {{opening_balance7 | number}}</b></span>
                     </div>
                  </div>
                  <div class="form-group row" id="res_no" >
                     <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                     <div class="col-sm-12">
                        <input type="text"  min="0" onkeypress="return isNumberKey(event)" id="amount6" name="amount6" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="show7" style="display:none;">
                  <div class="form-group row">
                     <label class="col-sm-12 col-form-label">Payee 7 <span style="color:red;">*</span>  
                     <button type="button" style="float: right;" ng-click="removeDiv(7)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-minus menu-icon"></i></button>
                     <button type="button" style="float: right;" ng-click="Payee2(8)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-plus menu-icon"></i></button>
                     </label>
                     <div class="some-class">
                        <input type="radio" class="radio" name="Payee7"  value="1" id="Customer7" ng-click="selectOption('Other8')"/>
                        <label for="Customer7">Customer</label>
                        <input type="radio" class="radio" name="Payee7"  value="3" id="Vendor7" ng-click="selectOption('Other8')"/>
                        <label for="Vendor7">Vendor</label>
                        <input type="radio" class="radio" name="Payee7" checked value="2" id="Driver7" ng-click="selectOption('Driver8')" />
                        <label for="Driver7">Driver</label>
                        <input type="radio" class="radio" name="Payee7" value="5" id="Other7" ng-click="selectOption('Other8')"/>
                        <label for="Other7">Others Ledger</label>
                     </div>
                     <!-- Display driver options when showDriverOptions8 is true -->
                     <div ng-show="showDriverOptions8" class="radio-segment">
                        <input type="radio" class="radio" name="DriverOption8" value="1" id="rentdriver8" />
                        <label class="radio-button" for="rentdriver8">Rent</label>
                        <input type="radio" class="radio" name="DriverOption8" value="0" id="collectdriver8" />
                        <label class="radio-button" for="collectdriver8">Collection</label>
                     </div>
                     <div class="col-sm-12">
                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance2(8)"  ng-keyup="completeCustomer2(8)" placeholder="Search Names"  id="party8">
                        <br>
                        <span ng-if="opening_balance8"><b>Avilable Balance : {{opening_balance8 | number}}</b></span>
                     </div>
                  </div>
                  <div class="form-group row" id="res_no" >
                     <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                     <div class="col-sm-12">
                        <input type="text"  min="0" onkeypress="return isNumberKey(event)" id="amount7" name="amount7" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="show8" style="display:none;">
                  <div class="form-group row">
                     <label class="col-sm-12 col-form-label">Payee 8 <span style="color:red;">*</span>  
                     <button type="button" style="float: right;" ng-click="removeDiv(8)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-minus menu-icon"></i></button>
                     <button type="button" style="float: right;" ng-click="Payee2(9)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-plus menu-icon"></i></button>
                     </label>
                     <div class="some-class">
                        <input type="radio" class="radio" name="Payee8"  value="1" id="Customer8" ng-click="selectOption('Other9')"/>
                        <label for="Customer8">Customer</label>
                        <input type="radio" class="radio" name="Payee8"  value="3" id="Vendor8"ng-click="selectOption('Other9')" />
                        <label for="Vendor8">Vendor</label>
                        <input type="radio" class="radio" name="Payee8" checked value="2" id="Driver8" ng-click="selectOption('Driver9')" />
                        <label for="Driver8">Driver</label>
                        <input type="radio" class="radio" name="Payee8" value="5" id="Other8" ng-click="selectOption('Other9')"/>
                        <label for="Other8">Others Ledger</label>
                     </div>
                     <!-- Display driver options when showDriverOptions9 is true -->
                     <div ng-show="showDriverOptions9" class="radio-segment">
                        <input type="radio" class="radio" name="DriverOption9" value="1" id="rentdriver9" />
                        <label class="radio-button" for="rentdriver9">Rent</label>
                        <input type="radio" class="radio" name="DriverOption9" value="0" id="collectdriver9" />
                        <label class="radio-button" for="collectdriver9">Collection</label>
                     </div>
                     <div class="col-sm-12">
                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance2(9)"  ng-keyup="completeCustomer2(9)" placeholder="Search Names"  id="party9">
                        <br>
                        <span ng-if="opening_balance9"><b>Avilable Balance : {{opening_balance9 | number}}</b></span>
                     </div>
                  </div>
                  <div class="form-group row" id="res_no" >
                     <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                     <div class="col-sm-12">
                        <input type="text"  min="0" onkeypress="return isNumberKey(event)" id="amount8" name="amount8" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="show9" style="display:none;">
                  <div class="form-group row">
                     <label class="col-sm-12 col-form-label">Payee 9 <span style="color:red;">*</span>  
                     <button type="button" style="float: right;" ng-click="removeDiv(9)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-minus menu-icon"></i></button>
                     <button type="button" style="float: right;" ng-click="Payee2(10)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-plus menu-icon"></i></button>
                     </label>
                     <div class="some-class">
                        <input type="radio" class="radio" name="Payee9"  value="1" id="Customer9"ng-click="selectOption('Other10')" />
                        <label for="Customer9">Customer</label>
                        <input type="radio" class="radio" name="Payee9"  value="3" id="Vendor9" ng-click="selectOption('Other10')"/>
                        <label for="Vendor9">Vendor</label>
                        <input type="radio" class="radio" name="Payee9" checked value="2" id="Driver9" ng-click="selectOption('Driver10')" />
                        <label for="Driver9">Driver</label>
                        <input type="radio" class="radio" name="Payee9" value="5" id="Other9" ng-click="selectOption('Other10')"/>
                        <label for="Other9">Others Ledger</label>
                     </div>
                     <!-- Display driver options when showDriverOptions10 is true -->
                     <div ng-show="showDriverOptions10" class="radio-segment">
                        <input type="radio" class="radio" name="DriverOption10" value="1" id="rentdriver10" />
                        <label class="radio-button" for="rentdriver10">Rent</label>
                        <input type="radio" class="radio" name="DriverOption10" value="0" id="collectdriver10" />
                        <label class="radio-button" for="collectdriver10">Collection</label>
                     </div>
                     <div class="col-sm-12">
                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance2(10)"  ng-keyup="completeCustomer2(10)" placeholder="Search Names"  id="party10">
                        <br>
                        <span ng-if="opening_balance10"><b>Avilable Balance : {{opening_balance10 | number}}</b></span>
                     </div>
                  </div>
                  <div class="form-group row" id="res_no" >
                     <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                     <div class="col-sm-12">
                        <input type="text"  min="0" onkeypress="return isNumberKey(event)" id="amount9" name="amount9" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="show10" style="display:none;">
                  <div class="form-group row">
                     <label class="col-sm-12 col-form-label">Payee 10 <span style="color:red;">*</span>  
                     <button type="button" style="float: right;" ng-click="removeDiv(10)" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-minus menu-icon"></i></button>
                     </label>
                     <div class="some-class">
                        <input type="radio" class="radio" name="Payee10"  value="1" id="Customer10" ng-click="selectOption('Other11')"/>
                        <label for="Customer10">Customer</label>
                        <input type="radio" class="radio" name="Payee10"  value="3" id="Vendor10" ng-click="selectOption('Other11')"/>
                        <label for="Vendor10">Vendor</label>
                        <input type="radio" class="radio" name="Payee10" checked value="2" id="Driver10" ng-click="selectOption('Driver11')" />
                        <label for="Driver10">Driver</label>
                        <input type="radio" class="radio" name="Payee10" value="5" id="Other10"ng-click="selectOption('Other11')" />
                        <label for="Other10">Others Ledger</label>
                     </div>
                     <!-- Display driver options when showDriverOptions11 is true -->
                     <div ng-show="showDriverOptions11"  class="radio-segment">
                        <input type="radio" class="radio" name="DriverOption11" value="1" id="rentdriver11" />
                        <label class="radio-button" for="rentdriver11">Rent</label>
                        <input type="radio" class="radio" name="DriverOption11" value="0" id="collectdriver11" />
                        <label class="radio-button" for="collectdriver11">Collection</label>
                     </div>
                     <div class="col-sm-12">
                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance2(11)"  ng-keyup="completeCustomer2(11)" placeholder="Search Names"  id="party11">
                        <br>
                        <span ng-if="opening_balance11"><b>Avilable Balance : {{opening_balance11 | number}}</b></span>
                     </div>
                  </div>
                  <div class="form-group row" id="res_no" >
                     <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                     <div class="col-sm-12">
                        <input type="text"  min="0" onkeypress="return isNumberKey(event)" id="amount10" name="amount10" class="form-control">
                     </div>
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
                           <input type="hidden" id="l_id" >
                           <button type="submit" class="btn btn-primary w-md" style="float: right;" id="savebutton" ng-click="transfer()">Payment Transfer</button>
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
      
      
       
      
      $('#payment_date').blur(function() 
      {
      
          
          var date = $(this).val();
           
             var valdationdate='<?php echo date("Y-07-01"); ?>';
            var valdationdate1='<?php echo date("Y-m-d"); ?>';
      
           if(valdationdate>date)
           {
               $('#payment_date').val(valdationdate1);
           }
      
      });
      
      
      $('#payment_date_1').blur(function() 
      {
      
          
          var date = $(this).val();
           
             var valdationdate='<?php echo date("Y-07-01"); ?>';
            var valdationdate1='<?php echo date("Y-m-d"); ?>';
      
           if(valdationdate>date)
           {
               $('#payment_date_1').val(valdationdate1);
           }
      
      });
      
      
      $('#date').blur(function() 
      {
      
          
          var date = $(this).val();
           
             var valdationdate='<?php echo date("Y-07-01"); ?>';
            var valdationdate1='<?php echo date("Y-m-d"); ?>';
      
           if(valdationdate>date)
           {
               $('#date').val(valdationdate1);
           }
      
      });
      
          
        $("#exportdatadata").hide();
         
      $('#payment_mode_payoff').on('change',function(){
            
            var val=$(this).val();
            
            if(val=='NEFT/RTGS' ||  val=='Cheque')
            {
                
               
                $('#base_title').html('Bank Account');
                var data='<option value="0">Select Bank</option> <?php foreach ($bankaccount as $val) {
         if ($val->id != 25 && $val->id != 24) { ?> <option value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php }
         } ?>';
                $('#bankaccount').html(data);
                 $('#res_no').show();
                 $('#bankaccountshow').show();
            }
            if(val=='Cash')
            {
                
                $('#base_title').html('Cash Account');
                var data='<?php foreach ($bankaccount as $val) {
         if ($val->id == 25) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php }
         } ?>';
                $('#bankaccount').html(data);
                $('#res_no').show();
                $('#bankaccountshow').show();
                
            }
            if(val=='Petty Cash')
            {
               
                $('#base_title').html('Petty Cash Account');
                var data='<?php foreach ($bankaccount as $val) {
         if ($val->id == 24) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php }
         } ?>';
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
                var data='<option value="0">Select Bank</option> <?php foreach ($bankaccount as $val) {
         if ($val->id != 25 && $val->id != 24) { ?> <option value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php }
         } ?>';
                $('#bankaccount2').html(data);
                $('#res_no').show();
                $('#bankaccountshow2').show();
            }
            if(val=='Cash')
            {
                
                $('#base_title2').html('Cash Account');
                var data='<?php foreach ($bankaccount as $val) {
         if ($val->id == 25) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php }
         } ?>';
                $('#bankaccount2').html(data);
                $('#res_no').show();
                $('#bankaccountshow2').show();
                
            }
            if(val=='Petty Cash')
            {
               
                $('#base_title2').html('Petty Cash Account');
                var data='<?php foreach ($bankaccount as $val) {
         if ($val->id == 24) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php }
         } ?>';
                $('#bankaccount2').html(data);
                $('#reference_no').show();
                $('#bankaccountshow2').show();
                
                
                
            }
            
            
        });
         
            
        
        
        
        $('#choices-single-default').on('change',function(){
            
             $("#exportdatadata").show();
              
            
        });
        
      $('#exportdata').on('click', function() {
        
        
          var id= $('#choices-single-default').val();
          var fromdate= $('#from-date').val();
          var fromto= $('#to-date').val();
          var payment_status= $('#payment_status').val();
        
      
        var driver_collection_status= '<?php echo $driver_collection_status; ?>';
          url = '<?php echo base_url() ?>index.php/driver/fetch_data_get_ledger_view_export?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status+'&driver_collection_status='+driver_collection_status;
      
       
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
          
          $scope.showDriverOptionsedit  = true;
          $scope.showDriverOptions1 = false;
          $scope.showDriverOptions2 = true;
          $scope.showDriverOptions3 = true;
          $scope.showDriverOptions4 = true;
          $scope.showDriverOptions5 = true;
          $scope.showDriverOptions6 = true;
          $scope.showDriverOptions7 = true;
          $scope.showDriverOptions8 = true;
          $scope.showDriverOptions9 = true;
          $scope.showDriverOptions10 = true;
          $scope.showDriverOptions11 = true;
      
          $scope.selectOption = function(option) {
            if (option === 'Driver1') {
                  $scope.showDriverOptions1 = true;
              }
              else if (option === 'Driver2') {
                  $scope.showDriverOptions2 = true;
              } 
              else if (option === 'Driver3') {
                  $scope.showDriverOptions3 = true;
              } 
              else if (option === 'Driver4') {
                  $scope.showDriverOptions4 = true;
              } 
              else if (option === 'Driver5') {
                  $scope.showDriverOptions5 = true;
              } 
              else if (option === 'Driver6') {
                  $scope.showDriverOptions6 = true;
              } 
              else if (option === 'Driver7') {
                  $scope.showDriverOptions7 = true;
              } 
              else if (option === 'Driver8') {
                  $scope.showDriverOptions8 = true;
              } 
              else if (option === 'Driver9') {
                  $scope.showDriverOptions9 = true;
              } 
              else if (option === 'Driver10') {
                  $scope.showDriverOptions10 = true;
              }
              else if (option === 'Driver11') {
                  $scope.showDriverOptions11 = true;
              } 
              else if (option === 'Driver') {
                $scope.showDriverOptionsedit  = true;
              } 
              // else {
              //   $scope.showDriverOptions1 = false;$scope.showDriverOptions2 = false;
              //   $scope.showDriverOptions3 = false;$scope.showDriverOptions4 = false;
              //   $scope.showDriverOptions5 = false;$scope.showDriverOptions6 = false;
              //   $scope.showDriverOptions7 = false;$scope.showDriverOptions8 = false;
              //   $scope.showDriverOptions9 = false;$scope.showDriverOptions10 = false;
              //   $scope.showDriverOptions11 = false;
              // }
              if (option === 'Other1'){
                  $scope.showDriverOptions1 = false;
              } else if (option === 'Other2'){
                  $scope.showDriverOptions2 = false;
              } else if (option === 'Other3'){
                  $scope.showDriverOptions3 = false;
              } else if (option === 'Other4'){
                  $scope.showDriverOptions4 = false;
              } else if (option === 'Other5'){
                  $scope.showDriverOptions5 = false;
              } else if (option === 'Other6'){
                  $scope.showDriverOptions6 = false;
              } else if (option === 'Other7'){
                  $scope.showDriverOptions7 = false;
              } else if (option === 'Other8'){
                  $scope.showDriverOptions8 = false;
              } else if (option === 'Other9'){
                  $scope.showDriverOptions9 = false;
              } else if (option === 'Other10'){
                  $scope.showDriverOptions10 = false;
              } else if (option === 'Other11'){
                  $scope.showDriverOptions11 = false;
              } 
               else if (option === 'Other'){
                $scope.showDriverOptionsedit  = false;
              } 
          };
        $scope.success = false;
        $scope.error = false;
        $scope.customer_id_data= <?php echo $customer_id; ?>;
        $scope.getbank=0
        $scope.fetchSingleData = function(id){
          
          
          
          $http({
            method:"POST",
            url:"<?php echo base_url() ?>index.php/driver/fetch_single_data",
            data:{'id':id, 'action':'fetch_single_data','tablename':'driver'}
          }).success(function(data){
      
                $scope.name = data.name;
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



          var date = $('#from-date').val();
           
          var valdationdate='<?php echo date("Y-07-01"); ?>';
      
           if(valdationdate>date)
           {
               $('#from-date').val(valdationdate);
           }

           
          
          var userid= $('#choices-single-default').val();
          var fromdate= $('#from-date').val();
          var fromto= $('#to-date').val();
          var payment_status= $('#payment_status').val();
          $scope.customer_id_data= userid;
            $('#search-view').show();
           $('#exportdata').show();
           $scope.fetchSingleData(userid);
          $('#dateview').text(fromdate);
           $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status);
           $scope.fetchDatagetlegderGroupTotal(userid,fromdate,fromto,payment_status);
          
          
          
          
      };
      
      $scope.onview = function(id,billno,pendingamount){
           $('#firstmodalcommison').modal('toggle');
           
           $('#pointtodriver').show();  
           $scope.bill_no=billno;
           $scope.payid=id;
           $scope.pendingamount=pendingamount;
           $scope.payamount=pendingamount;
           
        
          
      };
      
      
       $scope.pointtodriver = function () {
                 
                 
                 $('#pointtodriver').hide();  
                  var fromdate= $('#from-date').val();
                  var fromto= $('#to-date').val();
                  var payment_status= $('#payment_status').val();
                  
                  var payment_mode_payoff= $('#payment_mode_payoff').val();
                  var reference_no= $('#reference_no').val();
                  
                  
                   var payment_date= $('#payment_date').val();
      
                  var enteramount= parseFloat($('#pendingamount').val());
                  var driver_id= '<?php echo $customer_id; ?>';
                 
                 
                   
                  
                  var driver_id= <?php echo $customer_id; ?>;
                  
                  if(driver_id==0)
                  {
                       var driver_id= $('#choices-single-default').val();
                  }
                 
                  var payamount= parseFloat($('#payamount').val());
                  var bankaccount= $('#bankaccount').val();
                  
                  
                  var notes= $('#notes').val();
                  //if(enteramount>payamount)
                  //{
                      //alert('Your amount too high! change the amount');
                  //}
                  //else
                  //{
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
                              if(enteramount>0)
                              {
                                  
                                  
                              
                              $http({
                              method:"POST",
                              url:"<?php echo base_url() ?>index.php/driver/save_to_pay",
                              data:{'payment_date':payment_date,'enteramount':enteramount,'account_head_id':$scope.account_head_id,'driver_id':driver_id,'payamount':payamount,'bankaccount':bankaccount,'payment_mode_payoff':payment_mode_payoff,'reference_no':reference_no,'notes':notes}
                              }).success(function(data){
                                
                                
                                 
                                 $scope.fetchDatagetlegderGroup(driver_id,fromdate,fromto,payment_status);
                                  $scope.fetchDatagetlegderGroupTotal(driver_id,fromdate,fromto,payment_status);
                                 $('#firstmodalcommison').modal('toggle');
                                 
                                  $('#payment_mode_payoff').val('');
                                     $('#reference_no').val('');
                                     $('#pendingamount').val('');
                                     $('#notes').val('');
                                     $('#bankaccount').val('');
                                 
                          
                              });
                              
                              }
                              else
                              {
                                  alert('Enter the amount');
                              }
                              
                           }
      
                      
                  //}
                 
      
      
      
      }
      
      
      $scope.fetchDatagetlegderGroup = function(id,fromdate,fromto,payment_status){
          
       $scope.loading = true;
            var fromdate= $('#from-date').val();
          var fromto= $('#to-date').val();
          var payment_status= $('#payment_status').val();
      
      
        var driver_collection_status= '<?php echo $driver_collection_status; ?>';
        
          $http.get('<?php echo base_url() ?>index.php/driver/fetch_data_get_ledger_view?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status+'&driver_collection_status='+driver_collection_status).success(function(data){
            
            $scope.query = {}
            $scope.queryBy = '$';
            $scope.loading = false;
            $scope.namesDataledgergroup = data;
            
            
            
              var amounttotal = 0;
              for(var i = 0; i < data.length; i++){
                  var amount = parseFloat(data[i].amount);
                  amounttotal += amount;
              }
            
            
            
              $scope.amounttotal = amounttotal;
            
            
            
            
            
               var payofftotal = 0;
              for(var i = 0; i < data.length; i++){
                  var balance = parseFloat(data[i].balance);
                  payofftotal += balance;
              }
            
            
            
           
            
              $scope.Payofftotal = payofftotal;
              
              
              
              
              var payouttotal = 0;
              for(var i = 0; i < data.length; i++){
                  var Payout = parseFloat(data[i].Payout);
                  payouttotal += Payout;
              }
            
            
            
              $scope.Payouttotal = payouttotal;
            
            
            
            
           
            
            
            
            
          });
        };
        
        
        
        
        
        
      $scope.fetchDatagetlegderGroupTotal = function(id,fromdate,fromto,payment_status){
          
       
          var payment_status= $('#payment_status').val();
        
          
          var fromdate= $('#from-date').val();
          var fromto= $('#to-date').val();
      
              var driver_collection_status= '<?php echo $driver_collection_status; ?>';
      
      
          $http.get('<?php echo base_url() ?>index.php/driver/fetch_data_get_ledger_view_total?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status+'&driver_collection_status='+driver_collection_status).success(function(data){
            
            
            
            
              $scope.totalpayment = data.totalpayment;
              $scope.totalpaid = data.totalpaid;
              $scope.totalblance = data.totalblance;
              
             $scope.getstatus = data.getstatus;
            $scope.totaldebit = data.totaldebit;
              $scope.totalcridit = data.totalcridit;
              $scope.getstatus1 = data.getstatus1;
              $scope.outstanding = data.outstanding;
      
      
               $scope.openingbalance = data.openingbalance;
              $scope.opstatus = data.opstatus;
            
            
            
          });
        };
        
        
        
        
        
         $scope.editData = function(id){
           
           $('#debit_data').show();
           $('#credit_data').show();
            $('#editSave').show();
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
            
             
      
      
             
             if(data.process_by=='Party Transfer')
             {
                 $('#customerdata').prop('disabled', false);
             }
             else
             {
                 $('#customerdata').prop('disabled', false);
             }
             
             
             
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
        
        
      $scope.completeCustomer9=function(){
             
              
            
              var search=  $('#customerdata').val();
              
              var party_type_data= $("input[name='Payer12']:checked").val();
              
              $("#customerdata" ).autocomplete({
              source: $scope.availableTags
              });
          
          
              $http({
                method:"POST",
                url:"<?php echo base_url() ?>index.php/manual_journals/userget",
                data:{'search':search,'party_type':party_type_data}
              }).success(function(data){
          
                    $scope.availableTags = data;
               
              });
          
          
          
          
          }; 
        
        
        
        
        
        
        
        
        
        
        $scope.Getbalance9 = function () {
            
            
              var party=  $('#customerdata').val();
            var party_type= $("input[name='Payer12']:checked").val();
            
                 $http({
                method:"POST",
                url:"<?php echo base_url(); ?>index.php/customer/fetch_balance_by_data",
                data:{'id':party, 'action':'fetch_single_data','tablename':party_type}
              }).success(function(data){
                  
                  
                
                   $scope.opening_balance9 = data.opening_balance;
                   
                  
               
              });
              
                if(party!='')
                  {
                 $http({
                method:"POST",
                url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
                data:{'id':party, 'action':'fetch_single_data','tablename':party_type}
               }).success(function(data){
                  
                     if(data.error=='0')
                     {
                          $('#editSave').hide();
                          alert('Name Not Found'); 
                          $('#customerdata').css("border-color", "red");
                     }
                     else
                     {
                          
                           $('#editSave').show();
                           $('#customerdata').css("border-color", "green");
                     }
                  
                  
               
              });
              
                  }
              
              
              
            
            
            
      };   
      
      
        
        
        
        
        
        
        
        
      $scope.bankstatementupdate = function(){
      
      $('#editSave').hide();
                              var customerdata=$('#customerdata').val();
                              var customer_id=$('#customer_id').val();
                              var party_type_data=$('#party_type_data').val();
                              var bankaccount=$('#bankaccount2').val();
                              var payment_mode_payoff=$('#payment_mode_payoff2').val();
                              var notes=$('#name').val();
                              var party_type_data= $("input[name='Payer12']:checked").val();
      
                              var DriverOptionedit= $("input[name='DriverOptionedit']:checked").val();
      
      
      
                              $http({
                              method:"POST",
                              url:"<?php echo base_url() ?>index.php/report/updaterecord",
                              data:{'credit':$scope.credit,'DriverOptionedit':DriverOptionedit,'customerdata':customerdata,'customer_id':customer_id,'bankaccount':bankaccount,'payment_mode_payoff':payment_mode_payoff,'party_type_data':party_type_data,'id':$scope.hidden_id,'debit':$scope.debit,'notes':notes,'create_date':new Date($scope.create_date)}
                              }).success(function(data)
                              {
                                
                                          $('#editdata').modal('toggle');
                                          var userid= $('#choices-single-default').val();
                                          var fromdate= $('#from-date').val();
                                          var fromto= $('#to-date').val();
                                          var payment_status='<?php echo $_GET['type']; ?>';  
                                          var party_type= $('#party_type').val();
                                          $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status,party_type);
                                                              
                          
                              });
      
      };
      
      
      $scope.onviewparty_edit = function(l_id,id,name,dc,cc,d_cid,d_cname,d_party_type,d_amount)
      {
        // $("input[name='Payer1']").prop("checked", false);
        var amount=0;
          $('#savebutton').show(); 
          if(d_cid>0)
          {
              $('#party1').val(d_cid+'-'+d_cname);
              $('#party2').val(id+'-'+name);
       
              $("input[name='Payer1'][value='" + d_party_type + "']").attr("checked", "checked");
        
          }else{
      
      
              $('#party1').val(id+'-'+name);
              $("input[name='Payer1'][value='" + 2 + "']").attr("checked", "checked");
              
            
          }
          
            if(dc>0)
          {
               amount=dc;
          }
          else
          {
               amount=cc;
          }
            $('#amount1').val(amount);
          
          $('#ordeget').show();
          $('#setc').hide();
           $('#l_id').val(l_id);
          $('#firstmodalcommisonparty').modal('toggle');
          
      };
      
      
      
      $scope.deleteData = function(id){
          if(confirm("Are you sure you want to remove it?"))
          {
              
         
           
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/products/insertandupdate",
              data:{'id':id, 'action':'Delete','tablename':'all_ledgers'}
            }).success(function(data){
              
              
                  var userid= $('#choices-single-default').val();
                  var fromdate= $('#from-date').val();
                  var fromto= $('#to-date').val();
                  var payment_status='<?php echo $_GET['type']; ?>';  
                  var party_type= $('#party_type').val();
         
          
                   $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status,party_type);
          
              
            }); 
          }
      };
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      $scope.Payee2 = function(id){
          
        switch(id){
            case 2:
              $('.show2').toggle();
            break;
            case 3:
              $('.show3').toggle();
            break;
            case 4:
              $('.show4').toggle();
            break;
            case 5:
              $('.show5').toggle();
            break;
            case 6:
              $('.show6').toggle();
            break;
            case 7:
            $('.show7').toggle();
            break;
            case 8:
            $('.show8').toggle();
            break;
            case 9:
            $('.show9').toggle();
            break;
            case 10:
            $('.show10').toggle();
            break;
        }
      };
      
      
      $scope.onviewparty = function(){
      
          $('#l_id').val('0');
          $('#savebutton').show();
           $('#firstmodalcommisonparty').modal('toggle');
          
      };
      
      $scope.completeCustomer1=function(){
             
              
            
              var search=  $('#party1').val();
              
              
              
             var party= $("input[name='Payer1']:checked").val();
             
             
            
              
              $( "#party1" ).autocomplete({
               
                source: $scope.availableTags
                
                
              });
          
          
          
          
              $http({
                method:"POST",
                url:"<?php echo base_url() ?>index.php/manual_journals/userget",
                data:{'search':search,'party_type':party}
              }).success(function(data){
          
                    $scope.availableTags = data;
               
              });
          
          
          
          
          }; 
          
          
          
          
          
      $scope.completeCustomer2=function(id){
             
        var search='';
        var party='';
        switch(id){
            case 2:
              search=  $('#party2').val();
              party= $("input[name='Payee1']:checked").val();
              
            break;
            case 3:
              search=  $('#party3').val();
              party= $("input[name='Payee2']:checked").val();
            break;
            case 4:
              search=  $('#party4').val();
              party= $("input[name='Payee3']:checked").val();
            break;
            case 5:
              search=  $('#party5').val();
              party= $("input[name='Payee4']:checked").val();
            break;
            case 6:
              search=  $('#party6').val();
              party= $("input[name='Payee5']:checked").val();
            break;
            case 7:
              search=  $('#party7').val();
              party= $("input[name='Payee6']:checked").val();
            break;
            case 8:
              search=  $('#party8').val();
              party= $("input[name='Payee7']:checked").val();
            break;
            case 9:
              search=  $('#party9').val();
              party= $("input[name='Payee8']:checked").val();
            break;
            case 10:
              search=  $('#party10').val();
              party= $("input[name='Payee9']:checked").val();
            break;
            case 11:
              search=  $('#party11').val();
              party= $("input[name='Payee10']:checked").val();
            break;
        }
            
          
      
            $( "#party2" ).autocomplete({
               source: $scope.availableTags
             });
          
             $( "#party3" ).autocomplete({
               source: $scope.availableTags
             });
      
             $( "#party4" ).autocomplete({
               source: $scope.availableTags
             });
      
             $( "#party5" ).autocomplete({
               source: $scope.availableTags
             });
      
             $( "#party6" ).autocomplete({
               source: $scope.availableTags
             });
      
             $( "#party7" ).autocomplete({
               source: $scope.availableTags
             });
      
             $( "#party8" ).autocomplete({
               source: $scope.availableTags
             });
             $( "#party9" ).autocomplete({
               source: $scope.availableTags
             });
             $( "#party10" ).autocomplete({
               source: $scope.availableTags
             });
             $( "#party11" ).autocomplete({
               source: $scope.availableTags
             });
          
          
              $http({
                method:"POST",
                url:"<?php echo base_url() ?>index.php/manual_journals/userget",
                data:{'search':search,'party_type':party}
              }).success(function(data){
          
                    $scope.availableTags = data;
               
              });
          
          
          
          
          }; 
          
          
          
      
       $scope.Getbalance1 = function () {
            
            
              var party=  $('#party1').val();
              var party_type= $("input[name='Payer1']:checked").val();
            
                 $http({
                method:"POST",
                url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
                data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
              }).success(function(data){
                  
                  
                
                   $scope.opening_balance1 = data.opening_balance;
                   
                  
               
              });
              
              
            if(party!='')
                  {       
              $http({
                method:"POST",
                url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
                data:{'id':party, 'action':'fetch_single_data','tablename':party_type}
               }).success(function(data){
                  
                     if(data.error=='0')
                     {
                          $('#savebutton').hide();
                         // alert('Name Not Found'); 
                          $('#party1').css("border-color", "red");
                     }
                     else
                     {
                          $scope.accountshead = data;
                           $('#savebutton').show();
                           $('#party1').css("border-color", "green");
                     }
                  
                  
               
              });
              
                  }
            
            
            
      };   
      
      
      
      
      
      
      
      
      
      
      
      
       $scope.Getbalance2 = function (id) {
      
        var party='';
        var party_type='';
        switch(id){
            case 2:
              party = $('#party2').val();
              party_type= $("input[name='Payee1']:checked").val();
              
            break;
            case 3:
              party = $('#party3').val();
              party_type= $("input[name='Payee2']:checked").val();
            break;
            case 4:
              party = $('#party4').val();
              party_type= $("input[name='Payee3']:checked").val();
            break;
            case 5:
              party = $('#party5').val();
              party_type= $("input[name='Payee4']:checked").val();
            break;
            case 6:
              party = $('#party6').val();
              party_type= $("input[name='Payee5']:checked").val();
            break;
            case 7:
              party = $('#party7').val();
              party_type= $("input[name='Payee6']:checked").val();
            break;
            case 8:
              party = $('#party8').val();
              party_type= $("input[name='Payee7']:checked").val();
            break;
            case 9:
              party = $('#party9').val();
              party_type= $("input[name='Payee8']:checked").val();
            break;
            case 10:
              party = $('#party10').val();
              party_type= $("input[name='Payee9']:checked").val();
            break;
            case 11:
              party = $('#party11').val();
              party_type= $("input[name='Payee10']:checked").val();
            break;
        }
            
              // var party=  $('#party2').val();
              // var party_type= $("input[name='Payee1']:checked").val();
            
                 $http({
                method:"POST",
                url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
                data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
              }).success(function(data){
                  
                  
                switch(id){
            case 2:
              $scope.opening_balance2 = data.opening_balance;
            break;
            case 3:
              $scope.opening_balance3 = data.opening_balance;
            break;
            case 4:
              $scope.opening_balance4 = data.opening_balance;
            break;
            case 5:
              $scope.opening_balance5 = data.opening_balance;
            break;
            case 6:
              $scope.opening_balance6 = data.opening_balance;
            break;
            case 7:
              $scope.opening_balance7 = data.opening_balance;
            break;
            case 8:
              $scope.opening_balance8 = data.opening_balance;
            break;
            case 9:
              $scope.opening_balance9 = data.opening_balance;
            break;
            case 10:
              $scope.opening_balance10 = data.opening_balance;
            break;
            case 11:
              $scope.opening_balance11 = data.opening_balance;
            break;
        }
                 
                   
                   
                  
               
              });
              
              
              
              
              
                  if(party!='')
                  {
                      
                  
               $http({
                method:"POST",
                url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
                data:{'id':party, 'action':'fetch_single_data','tablename':party_type}
               }).success(function(data){
                  
                     if(data.error=='0')
                     {
                          $('#savebutton').hide();
                          //alert('Name Not Found'); 
                          $('#party2').css("border-color", "red");
                     }
                     else
                     {
                          
                           $('#savebutton').show();
                           $('#party2').css("border-color", "green");
                     }
                  
                  
               
              });
              
                  }
            
            
            
      };   
      
      
      
      
       $scope.Getbalance3 = function () {
            
            
              var party=  $('#party3').val();
              var party_type= $("input[name='Payer3']:checked").val();
            
                 $http({
                method:"POST",
                url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
                data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
              }).success(function(data){
                  
                  
                
                   $scope.opening_balance3 = data.opening_balance;
                   
                  
               
              });
              
              
              
              
              
                  if(party!='')
                  {
                      
                  
               $http({
                method:"POST",
                url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
                data:{'id':party, 'action':'fetch_single_data','tablename':party_type}
               }).success(function(data){
                  
                     if(data.error=='0')
                     {
                          $('#savebutton').hide();
                          //alert('Name Not Found'); 
                          $('#party3').css("border-color", "red");
                     }
                     else
                     {
                          
                           $('#savebutton').show();
                           $('#party3').css("border-color", "green");
                     }
                  
                  
               
              });
              
                  }
            
            
            
      };   
      
      
      
      
      $scope.removeDiv = function(index){
        switch(index){
            case 2:
            $('.show2').hide();
            break;
            case 3:
            $('.show3').hide();
            break;
            case 4:
            $('.show4').hide();
            break;
            case 5:
            $('.show5').hide();
            break;
            case 6:
            $('.show6').hide();
            break;
            case 7:
            $('.show7').hide();
            break;
            case 8:
            $('.show8').hide();
            break;
            case 9:
            $('.show9').hide();
            break;
            case 10:
            $('.show10').hide();
            break;
        }
       
      
        // index.remove()
      // $scope.divs.splice(index, 1);
      }
      
      $scope.completeCustomer3=function(){
             
              
            
              var search=  $('#party3').val();
              
                 var party= $("input[name='Payer3']:checked").val();
              
              $( "#party3" ).autocomplete({
               
                source: $scope.availableTags
                
                
              });
          
          
          
          
              $http({
                method:"POST",
                url:"<?php echo base_url() ?>index.php/manual_journals/userget",
                data:{'search':search,'party_type':party}
              }).success(function(data){
          
                    $scope.availableTags = data;
               
              });
          
          
          
          
          }; 
          
          
      $scope.transfer = function () {
                  // $('#savebutton').hide(); 
                  var party1= $('#party1').val();
                  var party2= $('#party2').val();
                  var party3= $('#party3').val();
                  var party4= $('#party4').val();
                  var party5= $('#party5').val();
                  var party6= $('#party6').val();
                  var party7= $('#party7').val();
                  var party8= $('#party8').val();
                  var party9= $('#party9').val();
                  var party10= $('#party10').val();
                  var party11= $('#party11').val();
                  var fromdate= $('#from-date').val();
                  var fromto= $('#to-date').val();
                  var amount1 = parseFloat($('#amount1').val()) ? parseFloat($('#amount1').val()) :0;
                  var amount2 = parseFloat($('#amount2').val()) ? parseFloat($('#amount2').val()) :0;
                  var amount3 = parseFloat($('#amount3').val()) ? parseFloat($('#amount3').val()) :0;
                  var amount4 = parseFloat($('#amount4').val()) ? parseFloat($('#amount4').val()) :0;
                  var amount5 = parseFloat($('#amount5').val()) ? parseFloat($('#amount5').val()) :0;
                  var amount6 = parseFloat($('#amount6').val()) ? parseFloat($('#amount6').val()) :0;
                  var amount7 = parseFloat($('#amount7').val()) ? parseFloat($('#amount7').val()) :0;
                  var amount8 = parseFloat($('#amount8').val()) ? parseFloat($('#amount8').val()) :0;
                  var amount9 = parseFloat($('#amount9').val()) ? parseFloat($('#amount9').val()) :0;
                  var amount10 = parseFloat($('#amount10').val()) ? parseFloat($('#amount10').val()):0;
                  var notes= $('#notes_r').val();
                  var party_type1= $("input[name='Payer1']:checked").val();
                  var party_type2= $("input[name='Payee1']:checked").val();
                  var party_type3= $("input[name='Payee2']:checked").val();
                  var party_type4= $("input[name='Payee3']:checked").val();
                  var party_type5= $("input[name='Payee4']:checked").val();
                  var party_type6= $("input[name='Payee5']:checked").val();
                  var party_type7= $("input[name='Payee6']:checked").val();
                  var party_type8= $("input[name='Payee7']:checked").val();
                  var party_type9= $("input[name='Payee8']:checked").val();
                  var party_type10= $("input[name='Payee9']:checked").val();
                  var party_type11= $("input[name='Payee10']:checked").val();
                  
                  var selectedop1 = $("input[name='DriverOption1']:checked").val();
                  var selectedop2 = $("input[name='DriverOption2']:checked").val();
                  var selectedop3 = $("input[name='DriverOption3']:checked").val();
                  var selectedop4 = $("input[name='DriverOption4']:checked").val();
                  var selectedop5 = $("input[name='DriverOption5']:checked").val();
                  var selectedop6 = $("input[name='DriverOption6']:checked").val();
                  var selectedop7 = $("input[name='DriverOption7']:checked").val();
                  var selectedop8 = $("input[name='DriverOption8']:checked").val();
                  var selectedop9 = $("input[name='DriverOption9']:checked").val();
                  var selectedop10 = $("input[name='DriverOption10']:checked").val();
                  var selectedop11 = $("input[name='DriverOption10']:checked").val();
      
      
                 if(party1!='' && party2!='')
                 {
                  if(amount1>0)
                           {       
                                if(amount1>0)
                                {
                                    var totalamount= amount1+amount2+amount3+amount4+amount5+amount6+amount7+amount8+amount9+amount10;
                                    $scope.saveTransfer(party1,party2,fromdate,fromto,totalamount,notes,party_type1,party_type2,selectedop1,selectedop2);
                                    $scope.saveTransfer1(party2,party1,fromdate,fromto,amount1,notes,party_type2,party_type1,selectedop2,selectedop1);
                                  }
                                if(amount2>0)
                                {
                                  $scope.saveTransfer2(party3,party1,fromdate,fromto,amount2,notes,party_type3,party_type1,selectedop3,selectedop1);
                                }
                                if(amount3>0)
                                {
                                  $scope.saveTransfer3(party4,party1,fromdate,fromto,amount3,notes,party_type4,party_type1,selectedop4,selectedop1);
                                }
                                if(amount4>0)
                                {
                                  $scope.saveTransfer4(party5,party1,fromdate,fromto,amount4,notes,party_type5,party_type1,selectedop5,selectedop1);
                                }
                                if(amount5>0)
                                {
                                  $scope.saveTransfer5(party6,party1,fromdate,fromto,amount5,notes,party_type6,party_type1,selectedop6,selectedop1);
                                }
                                if(amount6>0)
                                {
                                  $scope.saveTransfer6(party7,party1,fromdate,fromto,amount6,notes,party_type7,party_type1,selectedop7,selectedop1);
                                }
                                if(amount7>0)
                                {
                                  $scope.saveTransfer7(party8,party1,fromdate,fromto,amount7,notes,party_type8,party_type1,selectedop8,selectedop1);
                                }
                                if(amount8>0)
                                {
                                  $scope.saveTransfer8(party9,party1,fromdate,fromto,amount8,notes,party_type9,party_type1,selectedop9,selectedop1);
                                }
                                if(amount9>0)
                                {
                                  $scope.saveTransfer9(party10,party1,fromdate,fromto,amount9,notes,party_type10,party_type1,selectedop10,selectedop1);
                                }
                                if(amount10>0)
                                {
                                 $scope.saveTransfer10(party11,party1,fromdate,fromto,amount10,notes,party_type11,party_type1,selectedop11,selectedop1);
                                }
                                // var party3= $('#party3').val();
                                // var enteramount2= parseFloat($('#amount2').val());
                                // var party_type3= $("input[name='Payer3']:checked").val();
                                // if(enteramount2>0)
                                // {
                                //       $scope.saveTransfer1(party3,party1,fromdate,fromto,enteramount2,notes,party_type3,party_type1);
                                // }
                               
                           
                              $('#party1').val('');
                              $('#party2').val('');
                              $('#party3').val('');
                              $('.show2').hide();
                              $('#amount2').val('');
                              $('#amount').val('');
                              $('#notes_r').val('');
                              $('#firstmodalcommisonparty').modal('toggle');
                              var userid= $('#choices-single-default').val();






                                    var userid= $('#choices-single-default').val();
                                    var fromdate= $('#from-date').val();
                                    var fromto= $('#to-date').val();
                                    var payment_status='<?php echo $_GET['type']; ?>';  
                                    var party_type= $('#party_type').val();
                           
                            
                                     $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status,party_type);
                                     $scope.fetchDatagetlegderGroupTotal(userid,fromdate,fromto,payment_status);




                           }
                           else
                           {
                               alert('Enther The Amount');
                           }           
              }
                  else
                       {
                        alert('Select The Names');
                 }
      };
      
      $scope.saveTransfer = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2,selectedop1,selectedop1){
      var payment_date= $('#payment_date_1').val();
      var l_id= $('#l_id').val();
      
                              $http({
                              method:"POST",
                              url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer",
                              data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'l_id':l_id,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2,'selectedop':selectedop1,'selectedoptiondriver':selectedop1}
                              }).success(function(data){
                                
                               
                          
                              });
      
      };
      
      
      
      $scope.saveTransfer1 = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2,selectedop2,selectedop1){
      
      var payment_date= $('#payment_date_1').val();
      var l_id= $('#l_id').val();
                              $http({
                              method:"POST",
                              url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer1",
                              data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'l_id':l_id,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2,'selectedop':selectedop2,'selectedoptiondriver':selectedop1}
                              }).success(function(data){
                                
      
                                  // location.reload();
                          
                              });
      
      };
      
      $scope.saveTransfer2 = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2,selectedop3,selectedop1){
      
      var payment_date= $('#payment_date_1').val();
      var l_id= $('#l_id').val();
                              $http({
                              method:"POST",
                              url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer1",
                              data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'l_id':l_id,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2,'selectedop':selectedop3,'selectedoptiondriver':selectedop1}
                              }).success(function(data){
                                
      
                                  // location.reload();
                          
                              });
      
      };
      
      $scope.saveTransfer3 = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2,selectedop4,selectedop1){
      
      var payment_date= $('#payment_date_1').val();
      var l_id= $('#l_id').val();
                              $http({
                              method:"POST",
                              url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer1",
                              data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'l_id':l_id,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2,'selectedop':selectedop4,'selectedoptiondriver':selectedop1}
                              }).success(function(data){
                                
      
                                  // location.reload();
                          
                              });
      
      };
      
      $scope.saveTransfer4 = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2,selectedop5,selectedop1){
      
      var payment_date= $('#payment_date_1').val();
      var l_id= $('#l_id').val();
                              $http({
                              method:"POST",
                              url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer1",
                              data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'l_id':l_id,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2,'selectedop':selectedop5,'selectedoptiondriver':selectedop1}
                              }).success(function(data){
                                
      
                                  // location.reload();
                          
                              });
      
      };
      
      $scope.saveTransfer5 = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2,selectedop6,selectedop1){
      
      var payment_date= $('#payment_date_1').val();
      var l_id= $('#l_id').val();
                              $http({
                              method:"POST",
                              url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer1",
                              data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'l_id':l_id,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2,'selectedop':selectedop6,'selectedoptiondriver':selectedop1}
                              }).success(function(data){
                                
      
                                  // location.reload();
                          
                              });
      
      };
      
      $scope.saveTransfer6 = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2,selectedop7,selectedop1){
      
      var payment_date= $('#payment_date_1').val();
      var l_id= $('#l_id').val();
                              $http({
                              method:"POST",
                              url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer1",
                              data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'l_id':l_id,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2,'selectedop':selectedop7,'selectedoptiondriver':selectedop1}
                              }).success(function(data){
                                
      
                                  // location.reload();
                          
                              });
      
      };
      
      $scope.saveTransfer7 = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2,selectedop8,selectedop1){
      
      var payment_date= $('#payment_date_1').val();
      var l_id= $('#l_id').val()
                              $http({
                              method:"POST",
                              url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer1",
                              data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'l_id':l_id,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2,'selectedop':selectedop8,'selectedoptiondriver':selectedop1}
                              }).success(function(data){
                                
      
                                  // location.reload();
                          
                              });
      
      };
      
      $scope.saveTransfer8 = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2,selectedop9,selectedop1){
      
      var payment_date= $('#payment_date_1').val();
      var l_id= $('#l_id').val();
                              $http({
                              method:"POST",
                              url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer1",
                              data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'l_id':l_id,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2,'selectedop':selectedop9,'selectedoptiondriver':selectedop1}
                              }).success(function(data){
                                
      
                                  // location.reload();
                          
                              });
      
      };
      
      
      $scope.saveTransfer9 = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2,selectedop10,selectedop1){
      
      var payment_date= $('#payment_date_1').val();
      var l_id= $('#l_id').val();
                              $http({
                              method:"POST",
                              url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer1",
                              data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'l_id':l_id,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2,'selectedop':selectedop10,'selectedoptiondriver':selectedop1}
                              }).success(function(data){
                                
      
                                  // location.reload();
                          
                              });
      
      };
      
      
      $scope.saveTransfer10 = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2,selectedop11,selectedop1){
      
      var payment_date= $('#payment_date_1').val();
      var l_id= $('#l_id').val();
                              $http({
                              method:"POST",
                              url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer1",
                              data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'l_id':l_id,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2,'selectedop':selectedop11,'selectedoptiondriver':selectedop1}
                              }).success(function(data){
                                
      
                                  // location.reload();
                          
                              });
      
      };
      
      
      
      
      
      
        
        
      
      });
      
   </script>
   <script language=Javascript>
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : evt.keyCode;
         if (charCode != 46 && charCode > 31 
           && (charCode < 48 || charCode > 57))
            return false;
      
         return true;
      }
      
   </script>
   <?php include('footer.php'); ?>
</body>