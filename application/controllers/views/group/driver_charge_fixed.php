<?php  include "header.php"; ?>
<link href="<?php echo base_url(); ?>assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />
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
                                    <h4 class="mb-sm-0 font-size-18">Driver Fixed Charge Setup</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Driver Fixed Charge Setup</li>
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




<div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="success">
                                            <i class="mdi mdi-check-all me-2"></i>
                                           {{successMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<div class="alert alert-danger alert-dismissible fade show" role="alert" ng-show="error">
                                            <i class="mdi mdi-block-helper me-2"></i>
                                            {{errorMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<form id="pristine-valid-example" novalidate method="post"></form>

                    <form id="pristine-valid-common" ng-submit="submitForm()" method="post">
                      








 <div class="row">
     
                  <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label">FIXED KM FORM</label>
                            <div class="col-sm-6">
                              <input id="fixed_km_from" class="form-control" required  ng-model="fixed_km_from" name="fixed_km_from" type="text">
                            </div>
                          </div>
                  </div>
                  <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label">FIXED KM TO</label>
                            <div class="col-sm-6">
                              <input id="fixed_km" class="form-control" required  ng-model="fixed_km" name="fixed_km" type="text">
                            </div>
                          </div>
                        </div>

                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label">FIXED CHARGE:</label>
                            <div class="col-sm-6">
                              <input id="fixed_charge" class="form-control" required  ng-model="fixed_charge" name="fixed_charge" type="text">
                              
                            </div>
                          </div>
                        </div>

                       

                       <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label"></label>
                            <div class="col-sm-3">
                            
                                 <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                                 <input class="btn btn-success w-lg waves-effect waves-light" style="float: right;" type="submit" value="{{submit_button}}">

                            </div>
                          </div>
                        </div>
</div>
                        



            
                      
                      
                    
                    </form>



               
               <br><br>


                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>


                         <th>ID #</th>
                          <th>FIXED KM FROM</th>
                          <th>FIXED KM TO</th>
                          <th>FIXED CHARGE</th>
                         
                          <th>Action</th>
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          <td>{{name.no}}</td>
                           <td>{{name.fixed_km_from}}</td>
                          <td>{{name.fixed_km}}</td>
                          <td>{{name.fixed_charge}}</td>
                         
                          <td>
                            <button type="button" ng-click="fetchSingleData(name.id)" class="btn btn-outline-primary">Edit</button>
                           <button type="button" ng-click="deleteData(name.id)" class="btn btn-outline-danger">Delete</button></td>
                        </tr>
                        
                      
                      </tbody>
                    </table>
                 
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


<script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



  $scope.submit_button = 'Add';


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/group/fetch_data_charges').success(function(data){
      $scope.namesData = data;
    });
  };

 
 
  $scope.submitForm = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/group/insertandupdate_charges",
      data:{'fixed_charge':$scope.fixed_charge,'id':$scope.hidden_id,'fixed_km_from':$scope.fixed_km_from,'fixed_km':$scope.fixed_km,'action':$scope.submit_button,'tablename':'driver_charge_fixed'}
    }).success(function(data){

      if(data.error != '1')
      {
        $scope.success = true;
        $scope.error = false;
        $scope.fixed_charge = "";
        
        $scope.fixed_km = "";
        $scope.fixed_km_from = "";
        $scope.hidden_id = "";
        $scope.successMessage = "Date successfully "+$scope.submit_button;
        $scope.fetchData();
        
        
        $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
        
        
      }

    });
  };


$scope.fetchSingleData = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/group/fetch_single_data_charges",
      data:{'id':id, 'action':'fetch_single_data','tablename':'driver_charge_fixed'}
    }).success(function(data){
      $scope.fixed_charge = data.fixed_charge;
      $scope.fixed_km = data.fixed_km;
      $scope.fixed_km_from = data.fixed_km_from;
      $scope.hidden_id = id;
      $scope.submit_button = 'Update';
     
    });
};



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/group/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'driver_charge_fixed'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        $scope.fetchData();
      }); 
    }
};




});

</script>
    <?php include ('footer.php'); ?>
</body>

<script src="<?php echo base_url(); ?>assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/pristinejs/pristine.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/form-advanced.init.js"></script>



