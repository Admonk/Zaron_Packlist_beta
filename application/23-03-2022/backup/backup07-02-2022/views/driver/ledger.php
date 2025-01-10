<?php  include "header.php"; ?>

<style>
.trpoint {
    
    cursor: pointer;
   
}
.trpoint:hover {
    background: antiquewhite;
}
</style>
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>
       <div class="main-content">
                <div class="page-content1">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Driver ledger View</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Driver ledger View!</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                    
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body min-vh-100">
                               <h4 class="mb-sm-0 font-size-18">Driver Table List</h4>  
                               <br>
                                <div  ng-init="fetchData()">
                                 <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng" dt-options="vm.dtOptions" >
                                  <thead>
                                    <tr>
            
            
                                       <th>ID #</th>
                                       <th>Driver name</th>
                                       <th>Vehicle No</th>
                                       <th>Phone</th>
                                       
                        
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr ng-repeat="name in namesData" ng-click="viewAddress(name.id,name.name)" id="show_{{name.id}}"  class="trpoint">
                                      <td>{{name.id}}</td>
                                      <td>{{name.name}}</td>
                                      <td>{{name.vehicle_id}}</td>
                                      <td>{{name.phone}}</td>
                                    
                                      
                                    </tr>
                                    
                                  
                                  </tbody>
                    </table>
                                </div>
                                </div>
                            </div>
                    </div>
                    
                    <div class="col-lg-8" ng-init="fetchDatagetlegder()">
                        <div class="card">
                            <div class="card-body">
                           <h4 class="mb-sm-0 font-size-18">Driver Name :  {{sname}}</h4>  
                           <br>
                           <table  class="table table-bordered dt-responsive  nowrap w-100" >
                              <thead>
                                <tr>
        
        
                                  <th> No</th>
                                  <th>Date</th>
                                  <th>Bill No</th>
                                  <!--<th>PayRef</th>-->
                                  <th>Charges</th>
                                  <th>Payable</th>
                                  <th>Paid</th>
                                  <th>Status</th>
                    
                                </tr>
                              </thead>
                                <tbody>
                                <tr ng-repeat="names in namesDataledger"   class="trpoint" >
                                  
                                  
                                   <td>{{names.no}}</td>
                                   <td>{{names.payment_date}} {{names.payment_time}}</td>
                                   <td>{{names.order_no}}</td>
                                   <!--<td>{{names.payment_mode}}</td>-->
                                   <td>{{names.amount}}</td>
                                   <td>{{names.Payoff}}</td>
                                   <td>{{names.Payout}}</td>
                                   <td> 
                                   <span ng-if="names.paid_status=='Paid'">
                                           <span style="color:green">Completed</span>
                                       </span>
                                       
                                       <span ng-if="names.paid_status=='Un-Paid'">
                                           <span style="color:red">In Completed</span>
                                       </span>
                                       
                                    </td>
                                  
                                </tr>
                                
                                 <tr >
                                <td ng-show="namesDataledger.length==0">
                                    No data Found.                
                                </td>
                               </tr>
                                
                                
                                <tr ng-show="namesDataledger.length>0">
                                    <td>Total</td>
                                    <td></td>
                                    <td></td>
                                    <td><b>{{amounttotal}}</b></td>
                                    <td><b>{{Payofftotal}}</b></td>
                                    <td><b>{{Payouttotal}}</b></td>
                                    <td></td>
                                </tr>
                                
                                
                                
                                
                                 <tr ng-show="namesDataledger.length>0">
                                    <td colspan="6"></td>
                                   
                                    <td><a href="<?php echo base_url(); ?>driver/ledger_view?driver_id={{snameid}}" class="btn btn-info btn-rounded waves-effect waves-light">View More</a></td>
                                </tr>
                                
                              
                              </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    
                </div>
                
                
                        <div class="row d-none">
                            <div class="col-md-3">
                                <ul class="list-unstyled chat-list ledgerListChat">
                                    <li class="active">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                        <div class="avatar-sm align-self-center">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-13 mb-0">Raja</h5>
                                                        <p class="text-truncate mb-0">TNQ38D2589</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">9005263147</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                        <div class="avatar-sm align-self-center">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-13 mb-0">Raja</h5>
                                                        <p class="text-truncate mb-0">TNQ38D2589</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">9005263147</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                        <div class="avatar-sm align-self-center">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-13 mb-0">Raja</h5>
                                                        <p class="text-truncate mb-0">TNQ38D2589</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">9005263147</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                        <div class="avatar-sm align-self-center">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-13 mb-0">Raja</h5>
                                                        <p class="text-truncate mb-0">TNQ38D2589</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">9005263147</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                        <div class="avatar-sm align-self-center">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-13 mb-0">Raja</h5>
                                                        <p class="text-truncate mb-0">TNQ38D2589</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">9005263147</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                        <div class="avatar-sm align-self-center">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-13 mb-0">Raja</h5>
                                                        <p class="text-truncate mb-0">TNQ38D2589</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">9005263147</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                        <div class="avatar-sm align-self-center">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-13 mb-0">Raja</h5>
                                                        <p class="text-truncate mb-0">TNQ38D2589</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">9005263147</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                        <div class="avatar-sm align-self-center">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-13 mb-0">Raja</h5>
                                                        <p class="text-truncate mb-0">TNQ38D2589</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">9005263147</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                        <div class="avatar-sm align-self-center">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-13 mb-0">Raja</h5>
                                                        <p class="text-truncate mb-0">TNQ38D2589</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">9005263147</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                        <div class="avatar-sm align-self-center">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-13 mb-0">Raja</h5>
                                                        <p class="text-truncate mb-0">TNQ38D2589</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">9005263147</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                        <div class="avatar-sm align-self-center">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-13 mb-0">Raja</h5>
                                                        <p class="text-truncate mb-0">TNQ38D2589</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">9005263147</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        
                                        <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                        <div class="avatar-sm align-self-center">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-13 mb-0">Raja</h5>
                                                        <p class="text-truncate mb-0">TNQ38D2589</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">9005263147</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                        <div class="avatar-sm align-self-center">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-13 mb-0">Raja</h5>
                                                        <p class="text-truncate mb-0">TNQ38D2589</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">9005263147</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                        <div class="avatar-sm align-self-center">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-13 mb-0">Raja</h5>
                                                        <p class="text-truncate mb-0">TNQ38D2589</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">9005263147</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                        <div class="avatar-sm align-self-center">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-13 mb-0">Raja</h5>
                                                        <p class="text-truncate mb-0">TNQ38D2589</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">9005263147</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <li class="">
                                            <a href="#">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                        <div class="avatar-sm align-self-center">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-13 mb-0">Raja</h5>
                                                        <p class="text-truncate mb-0">TNQ38D2589</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="font-size-11">9005263147</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                </ul>
                            </div>
                            
                            <div class="col-md-9">
                                <div class="table-responsive mb-4">
                                            <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                                <thead>
                                                <tr>
                                                  <th> No</th>
                                                  <th>Date</th>
                                                  <th>Bill No</th>
                                                  <th>Charges</th>
                                                  <th>Payable</th>
                                                  <th>Paid</th>
                                                  <th>Status</th>
                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                       <td>1</td>
                                                       <td>28-Dec-2021 12:19 PM</td>
                                                       <td>SU120/1/2021</td>
                                                       <td>1500</td>
                                                       <td>0</td>
                                                       <td>1500</td>
                                                       <td>
                                                           <span ng-if="names.paid_status=='Paid'" class="ng-scope">
                                                               <span style="color:green">Completed</span>
                                                           </span>
                                                           
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                       <td>1</td>
                                                       <td>28-Dec-2021 12:19 PM</td>
                                                       <td>SU120/1/2021</td>
                                                       <td>1500</td>
                                                       <td>0</td>
                                                       <td>1500</td>
                                                       <td>
                                                           <span>
                                                               <span style="color:green">Completed</span>
                                                           </span>
                                                           
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                       <td>1</td>
                                                       <td>28-Dec-2021 12:19 PM</td>
                                                       <td>SU120/1/2021</td>
                                                       <td>1500</td>
                                                       <td>0</td>
                                                       <td>1500</td>
                                                       <td>
                                                           <span>
                                                               <span style="color:green">Completed</span>
                                                           </span>
                                                           
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                       <td>1</td>
                                                       <td>28-Dec-2021 12:19 PM</td>
                                                       <td>SU120/1/2021</td>
                                                       <td>1500</td>
                                                       <td>0</td>
                                                       <td>1500</td>
                                                       <td>
                                                           <span>
                                                               <span style="color:green">Completed</span>
                                                           </span>
                                                           
                                                        </td>
                                                    </tr>
                                                    
                                                    
                                                    <tr>
                                                       <td>1</td>
                                                       <td>28-Dec-2021 12:19 PM</td>
                                                       <td>SU120/1/2021</td>
                                                       <td>1500</td>
                                                       <td>0</td>
                                                       <td>1500</td>
                                                       <td>
                                                           <span>
                                                               <span style="color:green">Completed</span>
                                                           </span>
                                                           
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                       <td>1</td>
                                                       <td>28-Dec-2021 12:19 PM</td>
                                                       <td>SU120/1/2021</td>
                                                       <td>1500</td>
                                                       <td>0</td>
                                                       <td>1500</td>
                                                       <td>
                                                           <span>
                                                               <span style="color:green">Completed</span>
                                                           </span>
                                                           
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                       <td>1</td>
                                                       <td>28-Dec-2021 12:19 PM</td>
                                                       <td>SU120/1/2021</td>
                                                       <td>1500</td>
                                                       <td>0</td>
                                                       <td>1500</td>
                                                       <td>
                                                           <span>
                                                               <span style="color:green">Completed</span>
                                                           </span>
                                                           
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- end table -->
                                        </div>
                            </div>
                        </div>
                    </div>
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->
        </div>
    </div>




<script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



  $scope.submit_button = 'Add';


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/driver/fetch_data_sales_group').success(function(data){
      $scope.namesData = data;
    });
  };

 
 
  $scope.submitForm = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/driver/insertandupdate",
      data:{'name':$scope.name,'vehicle_id':$scope.vehicle_id,'phone':$scope.phone,'pin':$scope.pin,'status':$scope.status,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'driver'}
    }).success(function(data){
       
      if(data.error != '1')
      {
        $scope.success = true;
        $scope.error = false;
        $scope.name = "";
        $scope.vehicle_id = "";
        $scope.phone = "";
        $scope.pin = "";
        
        $scope.hidden_id = "";
        $scope.successMessage = "Driver successfully "+$scope.submit_button;
        $scope.fetchData();
      }



    });
  };


$scope.fetchSingleData = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/driver/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'driver'}
    }).success(function(data){

          $scope.name = data.name;
          $scope.vehicle_id = data.vehicle_id;
          $scope.phone = data.phone;
          $scope.pin = data.pin;
          $scope.status = data.status;
          $scope.hidden_id = id;
          $scope.submit_button = 'Update';
     
    });
};



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/driver/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'driver'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        $scope.fetchData();
      }); 
    }
};

$scope.viewAddress = function(id,name){
     $scope.sname=name;
     $scope.snameid=id;
     
    $('.trpoint').css("background-color", "white");
    $('#show_'+id).css("background-color", "yellow");
       $scope.fetchDatagetlegder(id);
};



 $scope.fetchDatagetlegder = function(id){
    $http.get('<?php echo base_url() ?>index.php/driver/fetch_data_get_ledger?limit=10&customer_id='+id).success(function(data){
      $scope.namesDataledger = data;
      
      
      
        var amounttotal = 0;
        for(var i = 0; i < data.length; i++){
            var amount = parseInt(data[i].amount);
            amounttotal += amount;
        }
      
      
      
        $scope.amounttotal = amounttotal;
      
      
      
      
      
         var payofftotal = 0;
        for(var i = 0; i < data.length; i++){
            var Payoff = parseInt(data[i].Payoff);
            payofftotal += Payoff;
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
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>


