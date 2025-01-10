<?php  include "header.php"; ?>

<style>
    .some-class1 {
    margin: 0 50%;
}
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
.bgcolorchange {
    background: #ededed;
}
</style>
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>







  <?php
                     $customer_id=0;
                     if(isset($_GET['customer_id']))
                     {
                        $customer_id= $_GET['customer_id'];
                     }
                     ?>








 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Others ledger  Log</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Others ledger  Log!</li>
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
                        <p class="mb-sm-0 font-size-18">Search</p>  
                      <form>
                          <div class="row">
                              <div class="col-md-4" >
                              <select class="form-control" data-trigger name="choices-single-default"
                                                            id="choices-single-default"
                                                            placeholder="This is a search">
                                                            <option value="">Search Others Ledger</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($accountheads as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>" <?php if($customer_id==$val->id) { echo 'selected'; } ?>><?php echo $val->name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                                                        </select>
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="from-date" min="<?php echo date('2024-04-01'); ?>" value="<?php echo date('2024-04-01'); ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" min="<?php echo date('2024-04-01'); ?>" value="<?php echo date('Y-m-d'); ?>">
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
                             
                             
                            </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     <br>
                     
                     <div class="row" ng-init="fetchDatagetlegderGroupTotal('<?php echo $customer_id; ?>')" style="display:none;">
                         
                          
                            
                            <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Total Debit</h3>
                                                <h4 class="mb-3">
                                                     <span >{{totaldebit | number}}</span>
                                                </h4>
                                               
                                            </div>
        
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card card-h-50">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Total Credit</h3>
                                                <h4 class="mb-3">
                                                     <span >{{totalcridit | number}}</span>
                                                </h4>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
                            
                       
        
                            <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card card-h-50">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Balance</h3>
                                                <h4 class="mb-3">
                                                     <span  ng-if="getstatus1==1" style="color:red">{{outstanding | number}}</span>
                                                     <span  ng-if="getstatus1==0" style="color:green">{{outstanding | number}}</span>
                                                </h4>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
        
                           
        
                           
                        </div>
                     
                     
                     
                     
                     
                     
                  <div id="search-view" >
                      
                     
                         
                                     <div  ng-init="fetchSingleData('<?php echo $customer_id; ?>')" >
                                        
                                        <h4 class="card-title">{{name}} | {{phone}}</h4>
                                         
                                        </p>
                                    </div>
                  
                       
                    <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                                        <!--<i class="bx bx-search search-icon"></i>-->
                    <div class="table-responsive">
                   
                    <table id="datatable"  class="table table-striped table-bordered" style="position: relative;" width="100%" ng-init="fetchDatagetlegderGroup('<?php echo $customer_id; ?>')" >
                      <thead>
                        <tr style="position: sticky;top: 0;background: #dfdfdf;">


                          <th style="width:50px;"><h5 class="font-size-14 mb-0">No</h5></th>
                          <th style="width:250px;"><h5 class="font-size-14 mb-0">Name</th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0">Date</h5></th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0">Ref.No</h5></th>
                             
                         
                          <th style="width:100px;"><h5 class="font-size-14 mb-0">Debit</h5></th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0">Credit</h5></th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0">Balance</h5></th>
                           <th style="width:200px;"><h5 class="font-size-14 mb-0">Mode</h5></th>
                          <th style="width:200px;"><h5 class="font-size-14 mb-0">Narration</h5></th>
                          <th style="width:200px;"><h5 class="font-size-14 mb-0">User</h5></th>
                           

                        <?php
  
   if($this->session->userdata['logged_in']['access']=='1' ||  $this->session->userdata['logged_in']['access']=='2')
   {
       
       ?>
                               <th style="width:100px;"><h5 class="font-size-14 mb-0">Action</h5></th>
           <?php
           
   }
   ?>
        
                        </tr>
                      </thead>
                      
                      
                      
                      
                           <tr class="setload" ><td colspan="9"><loading></loading></td></tr>
                        
                      
                      
                        <tbody  ng-repeat="names in namesDataledgergroup | filter:query" >
                            
                            
                        <tr  class="trpoint {{names.addclass}}" ng-if="names.no!='#'">
                          
                           <td>{{names.no}}</td>
                           <td>
                               
                              
                            <a href="<?php echo base_url(); ?>index.php/purchase/po?order_id={{names.order_id}}&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process" ng-if="names.order_id!='#'" target="_blank">{{names.name}}</a>
                               
                               <a href="#" ng-if="names.order_id=='#'">{{names.name}}</a>
                                   
                               
                               
                               </td>
                           <td>{{names.payment_date}} </td>
                        
                           <td>
                               
                               <a href="<?php echo base_url(); ?>index.php/purchase/po?order_id={{names.order_id}}&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process" ng-if="names.order_id!='#'" target="_blank">{{names.reference_no}}</a>
                               
                               <a href="#" ng-if="names.order_id=='#'">{{names.reference_no}}</a>
                           </td>
                         
                           <td >
                               
                               <a href="<?php echo base_url(); ?>index.php/purchase/po?order_id={{names.order_id}}&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process" ng-if="names.order_id!='#'" target="_blank">
                                   
                                   <span ng-if="names.debits!=0">{{names.debits | number}}</span>
                                   
                                   </a>
                               
                               <a href="#" ng-if="names.order_id=='#'">
                                   
                                  <span ng-if="names.debits!=0">{{names.debits | number}}</span>
                                   
                                   </a>
                               
                               
                               
                               
                               </td>
                           <td >
                               
                                   <a href="<?php echo base_url(); ?>index.php/purchase/po?order_id={{names.order_id}}&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process" ng-if="names.order_id!='#'" target="_blank">
                                   
                                  <span ng-if="names.credits!=0">{{names.credits | number}}</span>
                               
                                   
                                   </a>
                               
                               <a href="#" ng-if="names.order_id=='#'">
                                   
                                   <span ng-if="names.credits!=0">{{names.credits | number}}</span>
                               
                                   
                                   </a>
                               
                             
                               
                               </td>
                           <td >
                               
                                  <a href="<?php echo base_url(); ?>index.php/purchase/po?order_id={{names.order_id}}&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process" ng-if="names.order_id!='#'" target="_blank">
                                   
                                   <span  ng-if="names.getstatus==1" style="color:red">{{names.balance | number}}</span>
                                   <span  ng-if="names.getstatus==0" style="color:green">{{names.balance | number}}</span>
                                  
                                   
                                   </a>
                               
                                  <a href="#" ng-if="names.order_id=='#'">
                                   
                                   <span  ng-if="names.getstatus==1" style="color:red">{{names.balance | number}}</span>
                                   <span  ng-if="names.getstatus==0" style="color:green">{{names.balance | number}}</span>
                                  
                                   
                                   </a>
                                 
                                  
                               
                               </td>
                           <td>
                               
                               
                                  <a href="<?php echo base_url(); ?>index.php/purchase/po?order_id={{names.order_id}}&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process" ng-if="names.order_id!='#'" target="_blank">
                                   
                                   <span  ng-if="names.payment_mode=='Cash'">{{names.payment_mode}}</span>
                               
                                  <span  ng-if="names.payment_mode!='Cash'">
                                   {{names.payment_mode}}
                                   <br>
                                   <small>{{names.bank_name}}</small>
                                   </span>
                                   
                                   </a>
                               
                                  <a href="#" ng-if="names.order_id=='#'">
                                   
                                    <span  ng-if="names.payment_mode=='Cash'">{{names.payment_mode}}</span>
                               
                                  <span  ng-if="names.payment_mode!='Cash'">
                                   {{names.payment_mode}}
                                   <br>
                                   <small>{{names.bank_name}}</small>
                                   </span>
                                   
                                   </a>
                               
                               
                               </td>
                           <td>
                               
                               <a href="<?php echo base_url(); ?>index.php/purchase/po?order_id={{names.order_id}}&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process" ng-if="names.order_id!='#'" target="_blank">
                                   
                                  {{names.notes}}
                                   
                                   </a>
                               
                                  <a href="#" ng-if="names.order_id=='#'">
                                   {{names.notes}}
                                   </a>
                                <samll ><br><b> {{names.username}}</b></samll>
                               
                               </td>


                               <td>{{names.username_base}}</td>
                               
                               
                               
                                  <?php
  
   if($this->session->userdata['logged_in']['access']=='1' ||  $this->session->userdata['logged_in']['access']=='2')
   {
       
       ?>
                    <td style="display:flex;">

                     <!-- <button type="button" ng-click="deleteDataRevart(names.id)" class="btn btn-outline-danger btn-sm">Revert</button> -->

  <button type="button" ng-if="names.commission_customer>0" ng-click="onviewparty_edit_new(names.id,names.customer_id,names.name,names.debits,names.credits)"  class="btn btn-outline-danger btn-sm">VIEW</button>



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
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Payout To Vendor</h5>
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
                                                               
                                                                 <input type="number"  min="0" oninput="this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" value="{{totalblance}}"  id="pendingamount" class="form-control">
                                                                 <input type="hidden" value="{{totalblance}}" id="payamount" class="form-control">
                                                                  
                                                                  
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
                                                                    
                                                                 <button type="submit" class="btn btn-primary w-md" style="float: right;" ng-click="pointtodriver()">Payment Save</button>
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
                                                                  
                                                              <input type="text" class="form-control"  ng-blur="Getbalance3()"  ng-keyup="completeCustomer3()" placeholder="Search {{lable}}"  id="customerdata">
          
                                                                  <br>
                                                                  <span ng-if="opening_balance3"><b>Available Balance : {{opening_balance3 | number}}</b></span>
                                                                 
                                                                 
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








     <div class="modal fade" id="firstmodalcommisonparty" aria-hidden="true" aria-labelledby="exampleModalToggleLabelset" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabelset">Pay  commission view</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                            
                                                              <div class="form-group row">
                                                               
                                                                
                                                                <div class="some-class1">
                                                                    <input type="radio" class="radio" name="Payer_1"  ng-model="party_type1" value="1" id="Customer_1" />
                                                                    <label for="Customer_1">Customer</label>
                                                                    <input type="radio" class="radio" name="Payer_1" ng-model="party_type1" value="3" id="Vendor_1" />
                                                                    <label for="Vendor_1">Vendor</label>
                                                                     <?php
  
                                                               if($this->session->userdata['logged_in']['access']!='12')
                                                               {
                                                                   
                                                               ?>


                                                                    <input type="radio" class="radio" name="Payer_1" ng-model="party_type1"value="2" id="Driver_1" />
                                                                    <label for="Driver_1">Driver</label>
                                                                    <input type="radio" class="radio" name="Payer_1" ng-model="party_type1" value="5" id="Other_1" />
                                                                    <label for="Other_1">Others Ledger</label>



                                                                <?php

                                                                }

                                                                ?>
                                                                  </div>
                                                                    
                                                            <div class="col-md-3">
                                                                <label class="col-sm-12 col-form-label" style="font-weight: 600;">CASH </label>
                                                            </div>

                                                             <div class="col-md-3">
                                                               <div class="form-group row" >
                                                                
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="value1" readonly placeholder="Value" class="form-control sum">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                            </div>


                                                                <div class="col-md-6">



                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance11()" readonly ng-keyup="completeCustomer11()" placeholder="Search Names"  id="remarks1">
          
                                                                  
                                                                  <br>
                                                                  <span ng-if="opening_balance11"><b>Avilable Balance : {{opening_balance11 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                           




















  <div class="form-group row">
                                                               
                                                                
                                                                
                                                                <div class="some-class1">
                                                                    <input type="radio" class="radio" name="Payer_2"  ng-model="party_type2" value="1" id="Customer_2" />
                                                                    <label for="Customer_2">Customer</label>
                                                                    <input type="radio" class="radio" name="Payer_2" ng-model="party_type2" value="3" id="Vendor_2" />
                                                                    <label for="Vendor_2">Vendor</label>
                                                                     <?php
  
                                                               if($this->session->userdata['logged_in']['access']!='12')
                                                               {
                                                                   
                                                               ?>

                                                                    <input type="radio" class="radio" name="Payer_2" ng-model="party_type2" value="2" id="Driver_2" />
                                                                    <label for="Driver_2">Driver</label>
                                                                    <input type="radio" class="radio" name="Payer_2" ng-model="party_type2" value="5" id="Other_2" />
                                                                    <label for="Other_2">Others Ledger</label>



                                                                <?php

                                                                }

                                                                ?>
                                                                  </div>
                                                                    
                                                            <div class="col-md-3">
                                                                <label class="col-sm-12 col-form-label" style="font-weight: 600;">CASH  DEPOSIT</label>
                                                            </div>

                                                             <div class="col-md-3">
                                                               <div class="form-group row" >
                                                                
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="value2"  readonly placeholder="Value" class="form-control sum">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                            </div>


                                                                <div class="col-md-6">



                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance222()" readonly  ng-keyup="completeCustomer222()" placeholder="Search Names"  id="remarks2">
          
                                                                  
                                                                  <br>
                                                                  <span ng-if="opening_balance222"><b>Avilable Balance : {{opening_balance222 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              























                                                          <div class="form-group row">
                                                               
                                                                
                                                                
                                                                <div class="some-class1">
                                                                    <input type="radio" class="radio" name="Payer_3"  ng-model="party_type3" value="1" id="Customer_3" />
                                                                    <label for="Customer_3">Customer</label>
                                                                    <input type="radio" class="radio" name="Payer_3"  ng-model="party_type3" value="3" id="Vendor_3" />
                                                                    <label for="Vendor_3">Vendor</label>
                                                                    <?php
  
                                                               if($this->session->userdata['logged_in']['access']!='12')
                                                               {
                                                                   
                                                               ?>

                                                                    <input type="radio" class="radio" name="Payer_3" ng-model="party_type3" value="2" id="Driver_3" />
                                                                    <label for="Driver_3">Driver</label>
                                                                    <input type="radio" class="radio" name="Payer_3" ng-model="party_type3" value="5" id="Other_3" />
                                                                    <label for="Other_3">Others Ledger</label>


                                                                <?php

                                                                }

                                                                ?>
                                                                  </div>
                                                                    
                                                            <div class="col-md-3">
                                                                <label class="col-sm-12 col-form-label" style="font-weight: 600;">LEDGER</label>
                                                            </div>

                                                             <div class="col-md-3">
                                                               <div class="form-group row" >
                                                                
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="value3" readonly placeholder="Value" class="form-control sum">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                            </div>


                                                                <div class="col-md-6">



                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance33()" readonly ng-keyup="completeCustomer33()" placeholder="Search Names"  id="remarks3">
          
                                                                  
                                                                  <br>
                                                                  <span ng-if="opening_balance33"><b>Avilable Balance : {{opening_balance33 | number}}</b></span>
                                                                </div>
                                                              </div>




















<div class="form-group row">
                                                               
                                                                
                                                                
                                                                <div class="some-class1">
                                                                    <input type="radio" class="radio" name="Payer_4"  ng-model="party_type4"  value="1" id="Customer_4" />
                                                                    <label for="Customer_4">Customer</label>
                                                                    <input type="radio" class="radio" name="Payer_4"  ng-model="party_type4"  value="3" id="Vendor_4" />
                                                                    <label for="Vendor_4">Vendor</label>
                                                                     <?php
  
                                                               if($this->session->userdata['logged_in']['access']!='12')
                                                               {
                                                                   
                                                               ?>

                                                                    <input type="radio" class="radio" name="Payer_4" ng-model="party_type4"  value="2" id="Driver_4" />
                                                                    <label for="Driver_4">Driver</label>
                                                                    <input type="radio" class="radio" name="Payer_4" ng-model="party_type4"  value="5" id="Other_4" />
                                                                    <label for="Other_4">Others Ledger</label>

                                                                    
                                                                <?php

                                                                }

                                                                ?>



                                                                  </div>
                                                                    
                                                            <div class="col-md-3">
                                                                <label class="col-sm-12 col-form-label" style="font-weight: 600;">CNN</label>
                                                            </div>

                                                             <div class="col-md-3">
                                                               <div class="form-group row" >
                                                                
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="value4" readonly placeholder="Value" class="form-control sum">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                            </div>


                                                                <div class="col-md-6">



                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance44()"  readonly ng-keyup="completeCustomer44()" placeholder="Search Names"  id="remarks4">
          
                                                                  
                                                                  <br>
                                                                  <span ng-if="opening_balance44"><b>Avilable Balance : {{opening_balance44 | number}}</b></span>
                                                                </div>

<div class="col-md-3">
                                                                <label class="col-sm-12 col-form-label" style="font-weight: 600;">GST</label>
                                                            </div>

                                                             <div class="col-md-3">
                                                               <div class="form-group row" >
                                                                
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  
                                                                  <input type="number" id="gst" readonly class="form-control sum" placeholder="GST Amount">
                                                                  
                                                                </div>
                                                              </div>
                                                            </div>


                                                                <div class="col-md-6">


                                                                </div>


v


                                                              </div>
                                                              















                                                              







                                                                     <div class="row" >
                                                            
                                                            <div class="col-md-3">
                                                                <label class="col-sm-12 col-form-label" style="font-weight: 600;">Total</label>
                                                            </div>

                                                             <div class="col-md-3">
                                                               
                                                                <label class="col-sm-12 col-form-label"   style="font-weight: 600;"id="totalsum">0</label>
                                                               
                                                               
                                                             
                                                            </div>

                                                             <div class="col-md-6">
                                                               
                                                            </div>

                                                            </div>



                                                            <span ng-if="consider_gst==0"  style="display:none;">
                                                            
                                                           <label class="form-check-label" for="formrow-excess-val">Consider GST  &nbsp;&nbsp;</label>
                                                           <input type="checkbox" class="form-check-input"  name="consider_gst" value="0" id="formrow-excess-val"> 
                                                           
                                                        </span>



                                                        <span ng-if="consider_gst==1" style="display:none;">
                                                            
                                                           <label class="form-check-label" for="formrow-excess-val">Consider GST  &nbsp;&nbsp;</label>
                                                           <input type="checkbox" class="form-check-input" checked name="consider_gst" value="1" id="formrow-excess-val"> 
                                                           
                                                        </span>


                                                              
                                                              
                                                               <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label" id="aria-label-set">Commission Amount <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text"  min="0" readonly onkeypress="return isNumberKey(event)" id="amount_set" name="amount" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                          




                                                     


                                                              
                                                              
                                                               <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Payment Date </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="date" id="payment_date_2" readonly value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                            
                                                           
                                                            <div class="row" style="margin: 20px -9px;">
                                                          
                                                            
                                                            <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                     <input type="hidden" id="l_id" >
                            

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
     
     var valdationdate='2024-01-01';

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
      if(val=='Petty Cash')
      {
          
          $('#base_title').html('Cash Account');
          var data='<?php foreach($bankaccount as $val) { if($val->id==24) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
          $('#res_no').show();
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
  
  
    var id= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
  
    url = '<?php echo base_url() ?>index.php/accountheads/fetch_data_get_ledger_view_export_new?limit=10&deleteid=1&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status;

 
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
      url:"<?php echo base_url() ?>index.php/accountheads/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'accountheads'}
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

$scope.onviewparty_edit_new = function(l_id,id,name,dc,cc)
{
 

      $('#UpdateCommsision').show();
    
    if(dc>0)
    {
        var amount=dc;
    }
    else
    {
        var amount=cc;
    }

   
    $('#amount_set').val(amount);
    $('#l_id').val(l_id);
    
    $('#firstmodalcommisonparty').modal('toggle');



     $http({
      method:"POST",
      url:"<?php echo base_url(); ?>index.php/report/fetch_single_data_by",
      data:{'id':l_id, 'action':'fetch_single_data','tablename':'all_ledgers'}
      }).success(function(data){
      
     

     $('#payment_date_2').val(data.c_payment_date);
     
        

               $scope.party_type1=data.party_type1;
               $scope.party_type2=data.party_type2;
               $scope.party_type3=data.party_type3;
               $scope.party_type4=data.party_type4;
               $scope.consider_gst = data.consider_gst;
            $('#gst').val(data.gstamount);
            $('#value1').val(data.value1);
            $('#value2').val(data.value2);
            $('#value3').val(data.value3);
            $('#value4').val(data.value4);
     $('#gst').val(data.gstamount);
           $('#remarks1').val(data.remarks1);
           $('#remarks3').val(data.remarks3);
           $('#remarks2').val(data.remarks2);
           $('#remarks4').val(data.remarks4);

           $('#totalsum').text(data.totalsum);



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
            
            var payment_date= $('#payment_date').val();
            
            var payment_mode_payoff= $('#payment_mode_payoff').val();
            var reference_no= $('#reference_no').val();
            var notes= $('#notes').val();

            var enteramount= parseInt($('#pendingamount').val());
            var vendor_id= $('#choices-single-default').val();
            var payamount= parseInt($('#payamount').val());
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
                        data:{'enteramount':enteramount,'payment_date':payment_date,'account_head_id':$scope.account_head_id,'notes':notes,'bankaccount':bankaccount,'vendor_id':vendor_id,'payamount':payamount,'payment_mode_payoff':payment_mode_payoff,'reference_no':reference_no}
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
  var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
  
    
    $http.get('<?php echo base_url() ?>index.php/accountheads/fetch_data_get_ledger_view_new?limit=10&deleteid=1&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status).success(function(data){
      
       $scope.query = {}
      $scope.queryBy = '$';
     
       $scope.loading = false;
      
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
    

    var payment_status= $('#payment_status').val();
   $http.get('<?php echo base_url() ?>index.php/accountheads/fetch_data_get_ledger_view_total_new?limit=10&deleteid=1&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status).success(function(data){
      
      
      
      
        
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
  
  
  
    
  $scope.deleteDataRevart = function(id)
  {
    if(confirm("Are you sure you want to Revert it?"))
    {
        
   
     
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/products/insertandupdate",
        data:{'id':id, 'action':'DeleteRevart','tablename':'all_ledgers'}
      }).success(function(data){
        
        
            var userid= <?php echo $customer_id; ?>;
            var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();
            var payment_status='<?php echo $_GET['type']; ?>';  
            var party_type= $('#party_type').val();
   
    
             $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status,party_type);
    
        
      }); 
    }
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
                                                        
                    
                        });

};







$scope.completeCustomer3=function(){
       
        
      
        var search=  $('#customerdata').val();
        
        var party_type_data=  $('#party_type_data').val();
        
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






  
    $scope.Getbalance3 = function () {
      
      
        var party=  $('#customerdata').val();
      
      
           $http({
		      method:"POST",
		      url:"<?php echo base_url(); ?>index.php/customer/fetch_balance_by_data",
		      data:{'id':party, 'action':'fetch_single_data','tablename':'5'}
		    }).success(function(data){
		        
		        
		      
		         $scope.opening_balance3 = data.opening_balance;
		         
		        
		     
		    });
		    
		      if(party!='')
            {
		       $http({
		      method:"POST",
		      url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
		      data:{'id':party, 'action':'fetch_single_data','tablename':'5'}
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


  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>


