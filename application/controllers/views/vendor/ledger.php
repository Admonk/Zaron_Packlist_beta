<?php  include "header.php"; ?>

<style>
.trpoint {
    
    cursor: pointer;
   
}
.table>tbody {
    vertical-align: middle;
}
.trpoint:hover {
    background: antiquewhite;
}

         .loading {
    text-align: center;
}
td a {
    color: black;
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
    table-layout: fixed;
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
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between pb-2">
                                    <h4 class="mb-sm-0 font-size-14">Vendor ledger</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Vendor ledger !</li>
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
                              <select class="form-control" data-trigger name="choices-single-default"
                                                            id="choices-single-default"
                                                            placeholder="This is a search">
                                                            <option value="">Search Vendor</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($vendor as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                                                        </select>
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="from-date" min="<?php echo date('Y-07-01'); ?>" value="<?php echo date('Y-07-01'); ?>">
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
                             
                             <button type="button" id="exportdata" class="btn btn-success waves-effect waves-light"  >Export</button>
                            </div>
                           
                          </div>
                      </form>
                         
                     <div class="row" ng-init="fetchDatagetlegderGroupTotal(0)">
                         
                          
                            
                            <div class="col-xl-4 col-md-4">
                                <!-- card -->
                               <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate"> Debit : <span >{{totaldebit | number}}</span></h3>
                                            </div>
        
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate"> Credit : <span >{{totalcridit | number}}</span></h3>
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
                            
                            
                           
        
                             <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Balance : 
                                                    <span  ng-if="getstatus==1" style="color:red"> {{outstanding | number}}</span>
                                                    <span  ng-if="getstatus==0" style="color:green"> {{outstanding | number}}</span>
                                                </h3>
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
        
        
                           
                        </div>
                     
                     
                     
                     
                     
                   
                  <div id="search-view" >
                      
                     
                         
                                     <div class="card-header py-0"  ng-init="fetchSingleData(0)">
                                        <h4 class="card-title text-start" ng-if="name">{{name}} | {{phone}}</h4>
                                          
                                           <!--<h4 class="card-title">{{gst}}</h4>
                                           <p class="card-title-desc">{{fulladdress}}
                                        </p>-->
                                        
                                    </div>
                </div>
                
                <div>
                  <?php
  
   if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='14' || $this->session->userdata['logged_in']['access']=='2')
   {
       
       ?>
       
   <!--     <button type="button" ng-click="onviewparty()"  class="btn btn-soft-danger  waves-effect waves-light" style="float: right;margin: 4px 12px;">Internal Transaction</button> -->
  
       <?php
                                                
   }
  
  ?>
                        <!--<button type="button" ng-click="onview()"  class="btn btn-soft-success  waves-effect waves-light" id="exportdatadata" style="float: right;margin: 24px 12px;">Payout</button>-->
          
                     <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                                        <!--<i class="bx bx-search search-icon"></i>-->
                    <div class="table-responsive mt-2">
                   
                   <table id="datatable"  class="table table-striped table-bordered" style="position: relative;" width="100%" ng-init="fetchDatagetlegderGroup(0)" >
                      <thead>
                        <tr style="position: sticky;top: 0;background: #dfdfdf;">


                          <th style="width:75px;"><h5 class="font-size-14 mb-0">No</h5></th>
                          <th style="width:250px;"><h5 class="font-size-14 mb-0">Name</th>
                          
                          <th ><h5 class="font-size-14 mb-0">Opening Balance</h5></th>
                          <th ><h5 class="font-size-14 mb-0">Debit</h5></th>
                          <th ><h5 class="font-size-14 mb-0">Credit</h5></th>
                          <th ><h5 class="font-size-14 mb-0">Balance</h5></th>
                         
                        </tr>
                      </thead>
                           <tr class="setload" ><td colspan="6"><loading></loading></td></tr>
                        <tbody  ng-repeat="names in namesDataledgergroup | filter:query" >
                            
                            
                        <tr  class="trpoint" >
                          
                           <td>{{names.no}}</td>
                           <td><a href="<?php echo base_url(); ?>index.php/vendor/ledger_find?customer_id={{names.customer_id}}" target="_blank">{{names.name}}</a></td>
                          
                          <td >

                            <span ng-if="names.opening_balance>0">
                            <a href="<?php echo base_url(); ?>index.php/vendor/ledger_find?customer_id={{names.customer_id}}" target="_blank"><span ng-if="names.opening_balance!=0">{{names.opening_balance | number}} {{names.payment_status}}</span></a>
                            </span>

                                 
                          </td>
                          
                          <td ><a href="<?php echo base_url(); ?>index.php/vendor/ledger_find?customer_id={{names.customer_id}}" target="_blank"><span ng-if="names.debits!=0">{{names.debits | number}}</span></a></td>
                           <td ><a href="<?php echo base_url(); ?>index.php/vendor/ledger_find?customer_id={{names.customer_id}}" target="_blank"><span ng-if="names.credits!=0">{{names.credits | number}}</span></a></td>
                           <td >
                               
                                
                                <span ng-if="names.balance>0">
                                 <a href="<?php echo base_url(); ?>index.php/vendor/ledger_find?customer_id={{names.customer_id}}" target="_blank"> 
                                   <span  ng-if="names.getstatus==1" style="color:red">{{names.balance | number}}</span>
                                   <span  ng-if="names.getstatus==0" style="color:green">{{names.balance | number}}</span>
                                </a>  
                                </span>


                               </td>
                          
                            
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
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Payout To Vendor</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                       
                                                               
                                                    
                                                             <div class="col-md-12" style="display:none;">
                                     <div class="form-group row">
                                          <label class="col-sm-12 col-form-label"><b>Ledger Account</b> <span style="color:red;">*</span> </label>
                                                                 <div class="col-sm-12">
                                                                     <select  class="form-control"  data-trigger required  name="accountshead"  ng-model="account_head_id" >
                                             
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
                                                                       <option value="Petty Cash">Petty Cash</option>
                                                                       <option value="Cheque">Cheque</option>
                                                                       <option value="NEFT/RTGS">NEFT/RTGS</option>
                                                                      
                                                                      
                                                                  </select>
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                                     <div class="form-group row" id="bankaccountshow" style="display:none;">
                                                                <label class="col-sm-12 col-form-label" id="base_title">Bank Account </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  
                                                                  <select class="form-control" name="bankaccount" ng-change="Getbankaccount()" ng-model="getbank" id="bankaccount">
                                                                      
                                                                      
                                                                     
                                                                      
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
                                                               
                                                                 <input type="number" min="0" oninput="this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"   id="pendingamount" class="form-control">
                                                                 <input type="hidden" value="{{totalblance}}" id="payamount" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Notes </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="notes" class="form-control">
                                                                  
                                                                  
                                                                </div>
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
                                                                     <select  class="form-control" required data-trigger name="accountshead"  ng-model="account_head_id" >
                                             
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
                                                                <label class="col-sm-12 col-form-label">Payer  <span style="color:red;">*</span></label>
                                                                
                                                                
                                                                <div class="some-class">
                                                                    <input type="radio" class="radio" name="Payer1"  value="1" id="Customer" />
                                                                    <label for="Customer">Customer</label>
                                                                    <input type="radio" class="radio" name="Payer1" checked value="3" id="Vendor" />
                                                                    <label for="Vendor">Vendor</label>
                                                                    <input type="radio" class="radio" name="Payer1" value="2" id="Driver" />
                                                                    <label for="Driver">Driver</label>
                                                                    <input type="radio" class="radio" name="Payer1" value="5" id="Other" />
                                                                    <label for="Other">Others Ledger</label>
                                                                  </div>
                                                                                                                           
                                                                <div class="col-sm-12">
                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance1()" ng-keyup="completeCustomer1()" placeholder="Search Names"  id="party1">
          
                                                                  
                                                                  <br>
                                                                  <span ng-if="opening_balance1"><b>Avilable Balance : {{opening_balance1 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                                 
                                                              <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Payee 1  <span style="color:red;">*</span>  <button type="button" style="float: right;" ng-click="Payee2()" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-plus menu-icon"></i></button>
                                                               </label>
                                                                
                                                                 
                                                                <div class="some-class">
                                                                    <input type="radio" class="radio" name="Payer2"  value="1" id="Customer2" />
                                                                    <label for="Customer2">Customer</label>
                                                                    <input type="radio" class="radio" name="Payer2" checked value="3" id="Vendor2" />
                                                                    <label for="Vendor2">Vendor</label>
                                                                    <input type="radio" class="radio" name="Payer2" value="2" id="Driver2" />
                                                                    <label for="Driver2">Driver</label>
                                                                     <input type="radio" class="radio" name="Payer2" value="5" id="Other2" />
                                                                     <label for="Other2">Others Ledger</label>
                                                                     
                                                                  </div>
                                                                <div class="col-sm-12">
                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance2()"  ng-keyup="completeCustomer2()" placeholder="Search Names"  id="party2">
          
                                                                         <br>
                                                                  <span ng-if="opening_balance2"><b>Avilable Balance : {{opening_balance2 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                               
                                                              
                                                              
                                                               <div class="form-group row" id="res_no" >
                                                                <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text"  min="0" onkeypress="return isNumberKey(event)" id="amount" name="amount" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              <div class="show2" style="display:none;">
                                                                  
                                                                    <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Payee 2 <span style="color:red;">*</span>  
                                                               </label>
                                                                
                                                                 
                                                                <div class="some-class">
                                                                    <input type="radio" class="radio" name="Payer3"  value="1" id="Customer3" />
                                                                    <label for="Customer3">Customer</label>
                                                                    <input type="radio" class="radio" name="Payer3" checked value="3" id="Vendor3" />
                                                                    <label for="Vendor3">Vendor</label>
                                                                    <input type="radio" class="radio" name="Payer3" value="2" id="Driver3" />
                                                                    <label for="Driver3">Driver</label>
                                                                    
                                                                      <input type="radio" class="radio" name="Payer3" value="5" id="Other3" />
                                                                     <label for="Other3">Others Ledger</label>
                                                                     
                                                                     
                                                                  </div>
                                                                <div class="col-sm-12">
                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance3()"  ng-keyup="completeCustomer3()" placeholder="Search Names"  id="party3">
          
                                                                         <br>
                                                                  <span ng-if="opening_balance2"><b>Avilable Balance : {{opening_balance3 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                               
                                                              
                                                              
                                                               <div class="form-group row" id="res_no" >
                                                                <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text"  min="0" onkeypress="return isNumberKey(event)" id="amount2" name="amount" class="form-control">
                                                                  
                                                                  
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
  
  
    
  $('#choices-single-default').on('change',function(){
      
       $("#exportdatadata").show();
        
      
  });
  
  
  
$('#exportdata').on('click', function() {
  
  
    var id= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
  
    url = '<?php echo base_url() ?>index.php/vendor/fetch_data_get_ledger_view_export_group?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status;

 
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
    
 



$scope.fetchSingleData = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/vendor/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'vendor'}
    }).success(function(data){

          $scope.name = data.name;
          $scope.phone = data.phone;
          $scope.email = data.email;
          $scope.gst = data.gst;
          
          $scope.fulladdress = data.fulladdress;
        
         
     
    });
};


























$scope.onviewparty = function(){
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
    
    
    
    
    
$scope.completeCustomer2=function(){
       
        
      
        var search=  $('#party2').val();
        
           var party= $("input[name='Payer2']:checked").val();
        
        $( "#party2" ).autocomplete({
         
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












 $scope.Getbalance2 = function () {
      
      
        var party=  $('#party2').val();
        var party_type= $("input[name='Payer2']:checked").val();
      
           $http({
		      method:"POST",
		      url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
		      data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
		    }).success(function(data){
		        
		        
		      
		         $scope.opening_balance2 = data.opening_balance;
		         
		        
		     
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
           
           
            var party1= $('#party1').val();
            var party2= $('#party2').val();
            var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();
            var enteramount= parseFloat($('#amount').val());
            var notes= $('#notes_r').val();
             
             var party_type1= $("input[name='Payer1']:checked").val();
             var party_type2= $("input[name='Payer2']:checked").val();
              
            
           if(party1!='' && party2!='')
           {        
               
                     if(enteramount>0)
                     {       
                          var enteramount2= parseFloat($('#amount2').val());
                          if(enteramount2>0)
                          {
                              var totalamount= enteramount+enteramount2;
                              
                          }
                          else
                          {
                              var totalamount= enteramount;
                          }
                           
                          
                          
                          
                          
                          
                          $scope.saveTransfer(party1,party2,fromdate,fromto,totalamount,notes,party_type1,party_type2);
                          $scope.saveTransfer1(party2,party1,fromdate,fromto,enteramount,notes,party_type2,party_type1);
                          
                          
                          var party3= $('#party3').val();
                          var enteramount2= parseFloat($('#amount2').val());
                          var party_type3= $("input[name='Payer3']:checked").val();
                          if(enteramount2>0)
                          {
                                $scope.saveTransfer1(party3,party1,fromdate,fromto,enteramount2,notes,party_type3,party_type1);
                          }
                         
                         
                        $('#party1').val('');
                        $('#party2').val('');
                        $('#party3').val('');
                        $('.show2').hide();
                        $('#amount2').val('');
                        $('#amount').val('');
                        $('#notes_r').val('');
                          
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


$scope.saveTransfer = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2){



 var payment_date= $('#payment_date_1').val();
 
 
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer",
                        data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2}
                        }).success(function(data){
                          
                         
                    
                        });

};



$scope.saveTransfer1 = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2){

var payment_date= $('#payment_date_1').val();

                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer1",
                        data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2}
                        }).success(function(data){
                          
                          
                           
                           $scope.fetchDatagetlegderGroup(0);
                           $scope.fetchDatagetlegderGroupTotal(0);
    
                           $('#firstmodalcommisonparty').modal('toggle');
                    
                        });

};




$scope.Payee2 = function(){
    
    $('.show2').toggle();
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
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
   
      $('#search-view').show();
     $('#exportdatadata').show();
     $scope.fetchSingleData(userid);
   
     $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status);
     $scope.fetchDatagetlegderGroupTotal(userid,fromdate,fromto,payment_status);
    
    
    
    
};

$scope.onview = function(id,billno,pendingamount){
     $('#firstmodalcommison').modal('toggle');
     
     
     $scope.bill_no=billno;
     $scope.payid=id;
     $scope.pendingamount=pendingamount;
     $scope.payamount=pendingamount;
     
  
    
};


 $scope.pointtodriver = function () {
           
           
            var userid= $('#choices-single-default').val();
            var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();
            var payment_status= $('#payment_status').val();
            
            var payment_mode_payoff= $('#payment_mode_payoff').val();
            var reference_no= $('#reference_no').val();
            var notes= $('#notes').val();

            var enteramount= parseFloat($('#pendingamount').val());
            var vendor_id= $('#choices-single-default').val();
            var payamount= parseFloat($('#payamount').val());
            var bankaccount= $('#bankaccount').val();
            
           // if(enteramount>payamount)
            //{
                //alert('Your amount too high! change the amount');
            //}
            //else
           // {
                
                        
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
                        url:"<?php echo base_url() ?>index.php/vendor/save_to_pay",
                        data:{'enteramount':enteramount,'account_head_id':$scope.account_head_id,'notes':notes,'bankaccount':bankaccount,'vendor_id':vendor_id,'payamount':payamount,'payment_mode_payoff':payment_mode_payoff,'reference_no':reference_no}
                        }).success(function(data){
                          
                          
                           
                           $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status);
                           $scope.fetchDatagetlegderGroupTotal(userid,fromdate,fromto,payment_status);
                           $('#firstmodalcommison').modal('toggle');
                           
                            $('#payment_mode_payoff').val('');
                               $('#reference_no').val('');
                               $('#pendingamount').val('');
                               $('#notes').val('');
                               $('#bankaccount').val('');
                           
                    
                        });
                        
                        
                     }

                
            //}
           



}


$scope.fetchDatagetlegderGroup = function(id,fromdate,fromto,payment_status){
    
     
    
    
$scope.loading = true;
    
    $http.get('<?php echo base_url() ?>index.php/vendor/fetch_data_get_ledger_view_group?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status).success(function(data){
     
     
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
    

    
    $http.get('<?php echo base_url() ?>index.php/vendor/fetch_data_get_ledger_view_total?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status).success(function(data){
      
      
      
      
        $scope.totalpayment = data.totalpayment;
        $scope.totalpaid = data.totalpaid;
        $scope.totalblance = data.totalblance;
        
       $scope.getstatus = data.getstatus;
       $scope.totaldebit = data.totaldebit;
        $scope.totalcridit = data.totalcridit;
        $scope.getstatus1 = data.getstatus1;
        $scope.outstanding = data.outstanding;
      
    });
  };
  
  
  
  
  
  
  
  

});


 function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
</script>
    <?php include ('footer.php'); ?>
</body>


