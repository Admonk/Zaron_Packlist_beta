<?php  include "header.php"; ?>

<style>
.trpoint {
    
    cursor: pointer;
   
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
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Vendor ledger</h4>

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
                        <p class="mb-sm-0 font-size-18">Search</p>  
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
                                                                 <option  value="<?php echo $val->id; ?>" <?php if($customer_id==$val->id) { echo 'selected'; } ?>><?php echo $val->name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                                                        </select>
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="from-date" value="<?php echo date("Y-m-d", strtotime('monday this week')); ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" value="<?php echo date("Y-m-d", strtotime('sunday this week')); ?>">
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
                         
                         
                         
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     <br>
                     
                     <div class="row" ng-init="fetchDatagetlegderGroupTotal('<?php echo $customer_id; ?>')">
                         
                          
                            
                            <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Total Payments</h3>
                                                <h4 class="mb-3">
                                                    Rs. <span >{{totalpayment | number}}</span>
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
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Total Bill Amount</h3>
                                                <h4 class="mb-3">
                                                    Rs.  <span >{{totalcridit | number}}</span>
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
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Pending</h3>
                                                <h4 class="mb-3">
                                                    <span  ng-if="totalblance<0" style="color:red">Rs. {{totalblance | number}}</span>
                                                      <span  ng-if="totalblance>=0" style="color:green">Rs. {{totalblance | number}}</span>
                                                </h4>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
        
                           
        
                           
                        </div>
                     
                     
                     
                     
                     
                     
                  <div id="search-view" >
                      
                     
                         
                                     <div class="card-header"  ng-init="fetchSingleData('<?php echo $customer_id; ?>')">
                                        <h4 class="card-title">{{name}}</h4>
                                           <h4 class="card-title">{{phone}}</h4>
                                           <h4 class="card-title">{{gst}}</h4>
                                           <p class="card-title-desc">{{fulladdress}}
                                        </p>
                                    </div>
                  
                        <button type="button" ng-click="onview()"  class="btn btn-soft-success  waves-effect waves-light"  style="float: right;margin: 24px 12px;">Payout</button>
          
                    <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                                        <!--<i class="bx bx-search search-icon"></i>-->
                    <div class="table-responsive">
                   
                   <table id="datatable"  class="table table-striped table-bordered" width="100%" ng-init="fetchDatagetlegderGroup('<?php echo $customer_id; ?>')" >
                      <thead>
                        <tr>


                          <th>No</th>
                          <th>Name</th>
                          <th>Date</th>
                          <th>Reference</th>
                          <!--<th>PayRef</th>-->
                          <th>Bill Amount</th>
                         
                          <th style="font-weight:800;text-align: right;">Debit</th>
                          <th style="font-weight:800;text-align: right;">Credit</th>
                          <th style="font-weight:800;text-align: right;">Balance</th>
                          <th>Payment Mode</th>
                          <th>Notes</th>
                         
                        </tr>
                      </thead>
                          <tbody  ng-repeat="names in namesDataledgergroup | filter:query" >
                            
                            
                        <tr  class="trpoint" >
                          
                           <td>{{names.no}}</td>
                         <td><a href="<?php echo base_url(); ?>index.php/vendor/ledger_find?vendor_id={{names.customer_id}}" target="_blank">{{names.name}}</a></td>
                           <td>{{names.payment_date}} </td>
                           <td><b>{{names.order_no}}</b></td>
                           <td>{{names.amount}}</td>
                           <td style="font-weight:800;text-align: right;">{{names.debits | number}}</td>
                           <td style="font-weight:800;text-align: right;">{{names.credits | number}}</td>
                           <td style="font-weight:800;text-align: right;">
                               
                               
                                <span  ng-if="names.no==1">
                                    
                                   <span  ng-if="totalblance<0" style="color:red">{{totalblance | number}}</span>
                                   <span  ng-if="totalblance>=0" style="color:green">{{totalblance | number}}</span>
                                    
                                </span>
                                             
                               
                               
                               
                               </td>
                           <td>{{names.payment_mode}} <small ng-if="names.reference_no"> Ref NO :  {{names.reference_no}}</small></td>
                           <td>{{names.notes}}</td>
                           
                            
                        </tr>
                        
                     
                        
                      
                      </tbody>
                      
                      
                        <tr>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td id="d_tot" style="font-weight:800;text-align: right;">{{totaldebit | number}}</td>
                                                                  <td id="c_tot" style="font-weight:800;text-align: right;">{{totalcridit | number}}</td>
                                                                  <td id="o_tot" style="font-weight:800;text-align: right;"></td>
                                                                  <td></td>
                                                                  <td></td>
                        </tr>
                     
                      
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
                                                                      
                                                                       <option value="Cash">Cash</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                       <option value="Bank Transfer">Bank Transfer</option>
                                                                       <option value="Online Payment">Online Payment</option>
                                                                      
                                                                  </select>
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                                     <div class="form-group row" id="bankaccountshow" style="display:none;">
                                                                <label class="col-sm-12 col-form-label">Bank Account </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  
                                                                  <select class="form-control" name="bankaccount"  data-trigger ng-change="Getbankaccount()" ng-model="getbank" id="bankaccount">
                                                                      
                                                                      
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
                                                               
                                                                 <input type="text"    id="pendingamount" class="form-control">
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



<script>
$(document).ready(function(){
    
  $("#exportdatadata").hide();
   
  $('#payment_mode_payoff').on('change',function(){
      
      var val=$(this).val();
      
      if(val=='Cash')
      {
          $('#res_no').hide();
          $('#bankaccountshow').hide();
      }
      else
      {
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
  
    url = '<?php echo base_url() ?>index.php/vendor/fetch_data_get_ledger_view_export?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status;

 
    location = url;

});


});
</script>
<script>

var app = angular.module('crudApp', ['datatables']);

app.filter('number', function () {        
    return function (input) {
        if (! isNaN(input)) {
            var currencySymbol = '₹ ';
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
                
                
                
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/vendor/save_to_pay",
                        data:{'enteramount':enteramount,'account_head_id':$scope.account_head_id,'notes':notes,'bankaccount':bankaccount,'vendor_id':vendor_id,'payamount':payamount,'payment_mode_payoff':payment_mode_payoff,'reference_no':reference_no}
                        }).success(function(data){
                          
                          
                           
                           $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status);
                           $scope.fetchDatagetlegderGroupTotal(userid,fromdate,fromto,payment_status);
                           $('#firstmodalcommison').modal('toggle');
                    
                        });

                
            //}
           



}


$scope.fetchDatagetlegderGroup = function(id,fromdate,fromto,payment_status){
    

    
    $http.get('<?php echo base_url() ?>index.php/vendor/fetch_data_get_ledger_view?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status).success(function(data){
      
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
    

    
    $http.get('<?php echo base_url() ?>index.php/vendor/fetch_data_get_ledger_view_total?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status).success(function(data){
      
      
      
      
        $scope.totalpayment = data.totalpayment;
        $scope.totalpaid = data.totalpaid;
         $scope.totalblance = data.totalcridit-data.totaldebit;
        
      
        $scope.totaldebit = data.totaldebit;
        $scope.totalcridit = data.totalcridit;
        
        $scope.outstanding = data.outstanding;
      
      
    });
  };
  
  
  
  
  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>


