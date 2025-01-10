<?php  include "header.php"; ?>

<style>
.trpoint {
    
    cursor: pointer;
   
}

td a {
    color: black;
}
th {
    padding: 10px 5px;
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

.table>tbody {
    vertical-align: middle;
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
                                  
                                  
                                  <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-model="customer" ng-keyup="completeCustomer()" readonly placeholder="Search Customer Or Phone"  id="choices-single-default">
          
           
                                  <?php 

                               $party_type=0;
                              if(isset($_GET['party_type']))
                                                {
                                                   $party_type= $_GET['party_type'];
                                                }

                                                $dateset=date('2024-04-01');
                                                 if(isset($_GET['from_date']))
                                                {
                                                   $dateset= $_GET['from_date'];
                                                }
                                                $to_date=date('Y-m-d');

                                                if(isset($_GET['to_date']))
                                                {
                                                   $to_date= $_GET['to_date'];
                                                }
                                      
                              ?>
                           
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="from-date" min="<?php echo date('2024-04-01'); ?>" value="<?php echo $dateset; ?>">
                            </div>
                            <div class="col">
                               <input type="date" class="form-control" id="to-date" min="<?php echo date('2024-04-01'); ?>" value="<?php echo $to_date; ?>">
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
                            </div>
                           
                          </div>
                      </form>
                         
         
                     
                     <div class="row" ng-init="fetchDatagetlegderGroupTotal(0)">
                         
                          
                            
                            <div class="col-xl-2 col-md-2">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                               <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Total Debit <span >{{totaldebit | number}}</span></h3>
                                            </div>
        
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-2 col-md-2">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Total Credit:  <span >{{totalcridit | number}}</span></h3>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->






                            <div class="col-xl-2 col-md-2">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                               <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Balance DR: <span >{{balancedr | number}}</span></h3>
                                            </div>
        
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-2 col-md-2">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Balance CR:  <span >{{balancecr | number}}</span></h3>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
                            
                            
                            
                            
        
                            <div class="col-xl-2 col-md-2" >
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Balance: 
                                                <span  ng-if="getstatus1==1" style="color:red"> {{outstanding | number}}</span>
                                                <span  ng-if="getstatus1==0" style="color:green"> {{outstanding | number}}</span>
                                                </h3>
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
        
        
                           
                        </div>
                     
                     
                     
                   
                     
                  <div id="search-view" style="display:none;">
                      
                     
                         
                                     <div class="card-header py-0"  ng-init="fetchSingleData(0)">
                                        <h4 class="card-title text-start">{{name}} <span>{{phone}}</span>
                                        <!--<span class="card-title-desc">{{fulladdress}}</span>-->
                                        </h4>
                                    </div>
                 
                  </div>
               
    <hr>
                  
<!--<button type="button" ng-click="onviewparty()"  class="btn btn-soft-danger  waves-effect waves-light" style="float: right;margin: 24px 12px;">Internal Transaction</button>-->
            
                          
              <!--<button type="button" ng-click="onview()" id="exportdatadata" class="btn btn-soft-success  waves-effect waves-light" style="float: right;margin: 24px 12px;">Receive Payment</button>-->
            
                       
                   
                   
                                        <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" style="display:none;" placeholder="Search..." ng-model="query[queryBy]">
                                        <!--<i class="bx bx-search search-icon"></i>-->
                   
                   <div class="table-responsive">
                   
                   <table id="datatable"  class="table table-striped table-bordered" style="position: relative;" width="100%" ng-init="fetchDatagetlegderGroup(0)" >
                      <thead>
                        <tr style="position: sticky;top: 0;background: #dfdfdf;">


                          <th style="width:50px;"><h5 class="font-size-14 mb-0">No</h5></th>
                          <!-- <th style="width:50px;"><h5 class="font-size-14 mb-0">Base</h5></th> -->
                          <th style="width:200px;"><h5 class="font-size-14 mb-0">Name</th>
                          <th style="width:130px;"><h5 class="font-size-14 mb-0">Opening Balance</h5></th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0">Debit</h5></th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0">Credit</h5></th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0">Balance</h5></th>
                          
                        </tr>
                      </thead>
                      
                        <tr class="setload" ><td colspan="6"><loading></loading></td></tr>
                      
                        <tbody  ng-repeat="namesvv in namesDataledgergroup | filter:query" >
                            
                            
                        <tr  class="trpoint" >
                          
                           <td>{{namesvv.no}}</td>
                           <!--  <td>{{namesvv.vl}}</td> -->
                           <td><a href="{{namesvv.url}}" target="_blank">{{namesvv.name}}</a></td>
                           <td><a href="{{namesvv.url}}" target="_blank"><span ng-if="namesvv.opening_balance!=0">{{namesvv.opening_balance | number}} {{namesvv.payment_status}}</span></a></td>
                           <td><a href="{{namesvv.url}}" target="_blank"><span ng-if="namesvv.debits!=0">{{namesvv.debits | number}}</span></a></td>
                           <td><a href="{{namesvv.url}}" target="_blank"><span ng-if="namesvv.credits!=0">{{namesvv.credits | number}}</span></a></td>
                           <td>
                             <a href="{{namesvv.url}}" target="_blank"><span  ng-if="namesvv.getstatus==1" style="color:red">{{namesvv.balance | number}}</a></span>
                             <span  ng-if="namesvv.getstatus==0" style="color:green">{{namesvv.balance | number}}</span></a>
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
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Payment Receive</h5>
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
                                                                  
                                                                  
                                                                  <select class="form-control" name="bankaccount"   ng-change="Getbankaccount()" ng-model="getbank" id="bankaccount">
                                                                      
                                                                      
                                                                      
                                                                      
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
                                                            
                                                             
                                                              <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Notes </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="notes" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              <br>
                                                             <div class="form-group " >
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
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance1()" ng-keyup="completeCustomer1()" placeholder="Search Customer"  id="party1">
          
                                                                  
                                                                  <br>
                                                                  <span ng-if="opening_balance1"><b>Avilable Balance : {{opening_balance1 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                                 
                                                              <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Payee  <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance2()"  ng-keyup="completeCustomer2()" placeholder="Search Customer"  id="party2">
          
                                                                         <br>
                                                                  <span ng-if="opening_balance2"><b>Avilable Balance : {{opening_balance2 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                               
                                                              
                                                              
                                                               <div class="form-group row" id="res_no" >
                                                                <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="number"  min="0" oninput="this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" id="amount" name="amount" class="form-control">
                                                                  
                                                                  
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



































<script>
$(document).ready(function(){

 $('#from-date').blur(function() 
 {

    
    var date = $(this).val();
     
    var valdationdate='<?php echo date("2024-04-01"); ?>';

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
      
      
      
      
  });
   
      
 
      
  $('#choices-single-default').on('change',function(){
      
      
      
      
       $("#exportdatadata").show();
        
      
  });
  
$('#exportdata').on('click', function() {
  
  
    var id= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
  
    url = '<?php echo base_url() ?>index.php/customer/fetch_data_get_ledger_view_export_group_commen?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status;

 
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
          if(input != 0 && input != null){
              if (isNaN(input)) return input;
        var formattedValue = parseFloat(input);
        // console.log(input.toLocaleString('en-IN').toFixed(2));
         var decimal =  formattedValue.toLocaleString('en-IN', {   minimumFractionDigits: 2, maximumFractionDigits: 2 });

        return decimal
      }else{
        return '0';
      }
      

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
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
   
      $('#search-view').show();
     $('#exportdatadata').show();
     $scope.fetchSingleData(userid);
   
     $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status);
     $scope.fetchDatagetlegderGroupTotal(userid,fromdate,fromto,payment_status);
    
    
    
    
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









$scope.onview = function(id,billno,pendingamount,resno){
     $('#firstmodalcommison').modal('toggle');
     
     
     $scope.bill_no=billno;
     $scope.payid=id;
     $scope.pendingamount=pendingamount;
     $scope.payamount=pendingamount;
     
     
     $('#reference_no').val(resno);
     
    
  
    
};



               
$scope.onviewparty = function(){
     $('#firstmodalcommisonparty').modal('toggle');
    
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
                          
                          
                           
                           $scope.fetchDatagetlegderGroup(0);
                           $scope.fetchDatagetlegderGroupTotal(0);
    
                           $('#firstmodalcommisonparty').modal('toggle');
                    
                        });

};









 $scope.pointtodriver = function () {
           
           
            var userid= $('#choices-single-default').val();
            var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();
            var payment_status= $('#payment_status').val();
            
            var payment_mode_payoff= $('#payment_mode_payoff').val();
            var reference_no= $('#reference_no').val();

            var enteramount= parseInt($('#pendingamount').val());
            var customer_id= $('#choices-single-default').val();
            var payamount= parseInt($('#payamount').val());
             var notes= $('#notes').val();
               var notes= $('#notes').val();
             
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
                        data:{'notes':notes,'account_head_id':$scope.account_head_id,'enteramount':enteramount,'payment_type':payment_type,'bankaccount':bankaccount,'writeoff':writeoff,'customer_id':customer_id,'payamount':payamount,'payment_mode_payoff':payment_mode_payoff,'reference_no':reference_no}
                        }).success(function(data){
                          
                          
                           
                           $scope.fetchDatagetlegderGroup(data.id,fromdate,fromto,payment_status);
                           $scope.fetchDatagetlegderGroupTotal(data.id,fromdate,fromto,payment_status);
    
                           $('#firstmodalcommison').modal('toggle');
                           
                            $('#payment_mode_payoff').val('');
                               $('#reference_no').val('');
                               $('#pendingamount').val('');
                               $('#notes').val('');
                               $('#bankaccount').val('');
                           
                    
                        });
                        
                     }

                
           
           


}


$scope.fetchDatagetlegderGroup = function(id,fromdate,fromto,payment_status){
    
    
    
$scope.loading = true;
    
    $http.get('<?php echo base_url() ?>index.php/customer/fetch_data_get_ledger_view_group_commen?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status).success(function(data){
     
     $scope.loading = false;
      $scope.query = {}
      $scope.queryBy = '$';
      
     
      $scope.namesDataledgergroup = data;
      
      
       $('#choices-single-default').attr('readonly',false);
     
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




        var balancedr = 0;
        for(var i = 0; i < data.length; i++){
           
            if(data[i].getstatus==1)
            {


            var balance = parseFloat(data[i].balance);
            balancedr += balance;


          }

        }
        $scope.balancedr = balancedr.toFixed(2);



         var balancecr = 0;
        for(var i = 0; i < data.length; i++){
           
            if(data[i].getstatus==0)
            {


            var balance = parseFloat(data[i].balance);
            balancecr += balance;


          }

        }
        $scope.balancecr = balancecr.toFixed(2);
        
        
        
        
        var payouttotal = 0;
        for(var i = 0; i < data.length; i++){
            var Payout = parseInt(data[i].Payout);
            payouttotal += Payout;
        }
      
      
      
        $scope.Payouttotal = payouttotal;
      
      
      
      
     
      
      
      
      
    });
  };
  
  
  
  
  
  
$scope.fetchDatagetlegderGroupTotal = function(id,fromdate,fromto,payment_status){
    

    
    $http.get('<?php echo base_url() ?>index.php/customer/fetch_data_get_ledger_view_total_group_commen?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status).success(function(data){
      
      
      
      
        $scope.totalpayment = data.totalpayment;
        $scope.totalpaid = data.totalpaid;
        $scope.totalblance = data.totalblance;
        
        
        $scope.totaldebit = data.totaldebit;
        $scope.totalcridit = data.totalcridit;
        
        $scope.outstanding = data.outstanding;
        $scope.getstatus = data.getstatus;
        $scope.getstatus1 = data.getstatus1;
    
      
    });
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
 
    




</body>

 </html>

