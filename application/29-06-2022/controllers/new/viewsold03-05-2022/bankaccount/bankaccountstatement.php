<?php  include "header.php"; ?>
<style>
     #pristine-valid-common .row .col-md-12 {
             /* line-height: 44px; */
             margin-bottom: 14px;
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
                                    <h4 class="mb-sm-0 font-size-18">Bank Account Statement </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Bank Account Statement</li>
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
                                                            <option value="">Search Bank</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($bankaccount as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->bank_name; ?></option>
                                                          
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
                            
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" id="exportdata" class="btn btn-success waves-effect waves-light"  >Export</button>
                            </div>
                           
                          </div>
                      </form>
                       
                   
                   
                        
                    </div>
                    
                </div>








<div class="row my-5">
                            <div class="col-xl-12">
                                <div class="text-center">
                                    <h4 class="card-title font-size-18">Bank Accounts & Transactions <br> {{bank_name}}</h4>
                                
                                </div>
                                <div class="row">
                                    

                                    <div class="col-xl-12" >
                                        
                                        
                                             
<button type="button" ng-click="onviewparty()"  class="btn btn-soft-danger  waves-effect waves-light" style="float: right;margin: 0px 12px;">Bank to Bank Transfer</button>
            
                
                </div>
                
                </div>
                </div>  
               </div>    
               
               
               
               
                <div class="row" >
                         
                          
                            
                            <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Total Credit</h3>
                                                <h4 class="mb-3">
                                                    Rs. <span class="ng-binding">{{amounttotalcredits}}</span>
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
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Total Debit</h3>
                                                <h4 class="mb-3">
                                                    Rs.  <span class="ng-binding">{{amounttotaldebits}}</span>
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
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Current Closing Balance

</h3>
                                                <h4 class="mb-3">
                                                
                                                    <span ng-if="totalblance>=0" style="color:green" class="ng-binding ng-scope">{{amounttotalcredits-amounttotaldebits}}</span>
                                                    <span ng-if="totalblance<0" style="color:red" class="ng-binding ng-scope">{{amounttotalcredits-amounttotaldebits}}</span>
                                                    
                                                </h4>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
        
                        
        
        
                           
                        </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
               
                
                
                
                
                
                
                
                                        <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                                        <!--<i class="bx bx-search search-icon"></i>-->
                                        
                                        <div class="tab-content text-muted mt-4 mt-xl-0" id="v-pills-tabContent" ng-init="fetchDatadetails(<?php echo $bank_id; ?>)">
                                            <div class="tab-pane fade active show" id="v-price-one" role="tabpanel" aria-labelledby="v-pills-tab-one">
                                                <div class="table-responsive text-center pricing-table-bg">
                                                    <table class="table table-bordered mb-0 table-centered align-middle" style="font-size:11.5px;">
                                                        <tbody>
                                                            <tr>
                                                                <td><b>Transactions</b></td>
                                                                <td style="width: 20%;">
                                                                    <div class="py-3">
                                                                        <h5 class="font-size-14 mb-0">Status By</h5>
                                                                    </div>
                                                                </td>
                                                                <td style="width: 20%;text-align: right;">
                                                                    <div class="py-3">
                                                                        <h5 class="font-size-14 mb-0">Debit</h5>
                                                                    </div>
                                                                </td>
                                                                <td style="width: 20%;text-align: right;">
                                                                    <div class="py-3">
                                                                        <h5 class="font-size-14 mb-0">Credit</h5>
                                                                    </div>
                                                                </td>
                                                                <td style="width: 20%;">
                                                                    <div class="py-3">
                                                                        <h5 class="font-size-14 mb-0">Date</h5>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td style="width: 20%;">
                                                                    <div class="py-3">
                                                                        <h5 class="font-size-14 mb-0">Action</h5>
                                                                    </div>
                                                                </td>
                                                               
                                                            </tr>
                                                            
                                                            <tr ng-repeat="namess in namesDatadetails | filter:query">
                                                                <th scope="row" style="text-align: left;">
                                                                    {{namess.name}} {{namess.ex_code}}
                                                                  
                                                                
                                                                </th>
                                                                <td style="text-align: left;">
                                                                    {{namess.status_by}}
                                                                </td>
                                                                <td style="text-align: right;">
                                                                    {{namess.debit}}
                                                                </td>
                                                                <td style="text-align: right;">
                                                                    {{namess.credit}}
                                                                </td >
                                                                 <td>{{namess.create_date}}</td>
                                                                 
                                                                 
                                                                 
                                                                 <td>
                                                                     
                                                                     
                           <button type="button" ng-click="editData(namess.id)" class="btn btn-outline-danger"><i class="mdi mdi-pencil menu-icon"></i></button>
                           <button type="button" ng-click="deleteData(namess.id)" class="btn btn-outline-danger"><i class="mdi mdi-delete menu-icon"></i></button></td>
     
                                                      
                                                                 </td>
                                                                </tr>
                                                            
                                                              <tr ng-show="namesDatadetails.length==0">
                                                               <td colspan="4"> No Transactions </td>           
                                                             </tr>
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             <tr>
                                                                  <td></td>
                                                                  <td></td>
                                                                 <td id="d_tot" style="font-weight:800;text-align: right;"></td>
                                                                 <td id="c_tot" style="font-weight:800;text-align: right;"></td>
                                                                 <td></td>
                                                             </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                           
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <!-- end col -->
                        </div>





                        
                    </div>
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->

            







        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <div class="modal fade" id="firstmodalcommisonparty" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Bank To Bank Payment</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                            
                                                            
                                                            
                                                             <div class="col-md-12" >
                                     <div class="form-group row">
                                          <label class="col-sm-12 col-form-label"><b>Accounts Head</b> <span style="color:red;">*</span> </label>
                                                                 <div class="col-sm-12">
                                                                     <select  class="form-control" required  name="accountshead"  ng-model="account_head_id" >
                                             
                                                                     <option value="">Select Accounts Head</option>
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
                                                                <label class="col-sm-12 col-form-label">Bank 1 <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                    
                                                                    
                                                                    
                                                                      <select class="form-control" data-trigger name="party1"
                                                            id="party1"
                                                            placeholder="This is a search"  ng-change="Getbankaccount1()" ng-model="getbank1">
                                                            <option value="">Search Bank</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($bankaccount as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->bank_name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                                                        </select>
                                                                    
                                                           
                                                                  
                                                                  <br>
                                                                  <span ng-if="opening_balance1"><b>Current Balance : {{opening_balance1}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                                 
                                                              <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Bank 2 <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                            
                                                                      <select class="form-control" data-trigger name="party2"
                                                            id="party2"
                                                            placeholder="This is a search"  ng-change="Getbankaccount2()" ng-model="getbank2">
                                                            <option value="">Search Bank</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($bankaccount as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->bank_name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                                                        </select>
                                                                         <br>
                                                                  <span ng-if="opening_balance2"><b>Current Balance : {{opening_balance2}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                               
                                                              
                                                              
                                                               <div class="form-group row" id="res_no" >
                                                                <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="number" id="amount" name="amount" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                            
                                                             
                                                              <div class="form-group row" style="display:none;">
                                                                <label class="col-sm-12 col-form-label">Notes </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="notes_r" class="form-control">
                                                                  
                                                                  
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
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Edit Bank Statement</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                                <div class="col-md-12" >
                                     <div class="form-group row">
                                          <label class="col-sm-12 col-form-label"><b>Accounts Head</b> <span style="color:red;">*</span> </label>
                                                                 <div class="col-sm-12">
                                                                     <select  class="form-control" required  name="accountshead"  ng-model="account_head_id" >
                                             
                                                                     <option value="">Select Accounts Head</option>
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
                                                                <label class="col-sm-12 col-form-label">Bank Name <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                    
                                                                    
                                                                    
                                                           <select class="form-control"  ng-change="Getbankaccount1()" ng-model="bankname">
                                                            <option value="">Search Bank</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($bankaccount as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->bank_name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                                                        </select>
                                                                    
                                                           
                                                                  
                                                                  <br>
                                                                  <span ng-if="opening_balance1"><b>Current Balance : {{opening_balance1}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                                 
                                                            
                                                              
                                                              
                                                              
                                                               
                                                              
                                                              
                                                               <div class="form-group row" id="res_no" >
                                                                <label class="col-sm-12 col-form-label">Debit Amount </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="debit" name="debit" ng-model="debit" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              <input type="hidden"  ng-model="hidden_id">
                                                              
                                                              
                                                              
                                                              <div class="form-group row" id="res_no" >
                                                                <label class="col-sm-12 col-form-label">Credit Amount </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="credit" name="credit" ng-model="credit" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                            
                                                             
                                                              <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Status By </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="status_by" ng-model="status_by" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                                <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Transactions</label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="name" ng-model="name" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                               <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Date</label>
                                                               
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
$('#exportdata').on('click', function() {
  
  
    var id= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
   
  
    url = '<?php echo base_url() ?>index.php/bankaccount/export_bank_statement?limit=10&account_id='+id+'&formdate='+fromdate+'&todate='+fromto;

 
    location = url;

});
});

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;

   $('#choices-single-default').val(<?php echo $bank_id; ?>);
   
   $scope.bank_name = '<?php echo $name; ?>';
   

  $scope.submit_button = 'Create';


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/bankaccount/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };
  
  
  
  
  $scope.Getbankaccount1 = function () {
      
      
      
      
      
           $http({
		      method:"POST",
		      url:"<?php echo base_url(); ?>index.php/bankaccount/fetch_single_data",
		      data:{'id':$scope.getbank1, 'action':'fetch_single_data','tablename':'bankaccount'}
		    }).success(function(data){
		        
		        
		         $scope.opening_balance1 = data.current_amount;
		         
		        
		     
		    });
      
      
      
};   

  
  
  $scope.Getbankaccount2 = function () {
      
      
      
      
      
           $http({
		      method:"POST",
		      url:"<?php echo base_url(); ?>index.php/bankaccount/fetch_single_data",
		      data:{'id':$scope.getbank2, 'action':'fetch_single_data','tablename':'bankaccount'}
		    }).success(function(data){
		        
		        
		         $scope.opening_balance2 = data.current_amount;
		         
		        
		     
		    });
      
      
      
};   

  
  
$scope.search = function(){
    
    var userid= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    
    
    var name=$("#choices-single-default option:selected"). text();
    
    $scope.bank_name = name;
    
    $scope.fetchDatadetails(userid,fromdate,fromto);
   
    
    
};



$scope.onviewparty = function(){
     $('#firstmodalcommisonparty').modal('toggle');
    
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

                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/bankdeposit/save_to_pay_transfer",
                        data:{'notes':notes,'enteramount':enteramount,'bank1':party1,'bank2':party2,'account_head_id':$scope.account_head_id}
                        }).success(function(data){
                          
                         
                    
                        });

};



$scope.saveTransfer1 = function(party1,party2,fromdate,fromto,enteramount,notes){

                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/bankdeposit/save_to_pay_transfer1",
                        data:{'notes':notes,'enteramount':enteramount,'bank1':party1,'bank2':party2,'account_head_id':$scope.account_head_id}
                        }).success(function(data){
                          
                          
                           $scope.fetchDatadetails(data.id,fromdate,fromto);
   
                           $('#firstmodalcommisonparty').modal('toggle');
                    
                        });

};


$scope.bankstatementupdate = function(){

                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/bankdeposit/updatebankset",
                        data:{'bank_account_id':$scope.bankname,'account_head_id':$scope.account_head_id,'id':$scope.hidden_id,'debit':$scope.debit,'credit':$scope.credit,'status_by':$scope.status_by,'name':$scope.name,'create_date':new Date($scope.create_date)}
                        }).success(function(data){
                          
                          
                          
                                  $('#editdata').modal('toggle');
                                var fromdate= $('#from-date').val();
                                var fromto= $('#to-date').val();
                                var userid= $('#choices-single-default').val();
                                $scope.fetchDatadetails(userid,fromdate,fromto);
                                
                                
                    
                        });

};




$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
        
     
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/payment_received/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'bankaccount_manage'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        
        var fromdate= $('#from-date').val();
        var fromto= $('#to-date').val();
        var userid= $('#choices-single-default').val();
        $scope.fetchDatadetails(userid,fromdate,fromto);
        
        
        
      }); 
    }
};




 $scope.editData = function(id){
     
     
    $http({
      method:"POST",
      url:"<?php echo base_url(); ?>index.php/bankaccount/fetch_single_data_by",
      data:{'id':id, 'action':'fetch_single_data','tablename':'bankaccount_manage'}
    }).success(function(data){
       $scope.name = data.name; 
       $scope.bankname = data.bank_account_id; 
       $scope.account_head_id = data.account_head_id;
       $scope.debit = data.debit; 
       $scope.credit = data.credit; 
       $scope.create_date = new Date(data.create_date); 
       $scope.status_by = data.status_by; 
       
      $scope.hidden_id = data.id;
      $scope.submit_button = 'Update';
     
    });
    
       $('#editdata').modal('toggle');
    
};              















 $scope.fetchDatadetails = function(id,fromdate,fromto){
    $http.get('<?php echo base_url() ?>index.php/bankaccount/fetch_data_details?account_id='+id+'&fromdate='+fromdate+'&fromto='+fromto).success(function(data){
     
     
      $scope.query = {}
      $scope.queryBy = '$';
      
     
     
     
     $scope.namesDatadetails = data;
      
                var amounttotaldebits = 0;
                for(var i = 0; i < data.length; i++){
                    var debit = parseInt(data[i].debit);
                    amounttotaldebits += debit;
                }
                
                
                $scope.amounttotaldebits =amounttotaldebits;
                
               $("#d_tot").text(amounttotaldebits);
               
               
               
                var amounttotalcredits = 0;
                for(var i = 0; i < data.length; i++){
                    var credit = parseInt(data[i].credit);
                  
                    amounttotalcredits += credit;
                }
                
               
               $("#c_tot").text(amounttotalcredits);
      
       $scope.amounttotalcredits =amounttotalcredits;
       
       
       $scope.totalblance=amounttotalcredits-amounttotaldebits;
      
    });
  };
 




});

</script>
    <?php include ('footer.php'); ?>
</body>




