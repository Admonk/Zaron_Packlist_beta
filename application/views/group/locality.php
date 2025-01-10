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
                                    <h4 class="mb-sm-0 font-size-18">Locality Form</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Locality Form</li>
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



<a href="<?php echo base_url(); ?>index.php/group/exportlocality" style="float: right;">Export</a>



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
     
     
                  <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sales Route</label>
                            <div class="col-sm-8">
                             <select class="form-control" name="route_id" required ng-model="route_id"  ng-model="seletvendor" 
                                                            id="choices-single-default"
                                                            placeholder="This is a search">

                              <option value=""> Select Route</option>

                              <?php
                                foreach ($route as $value) {

                                  ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>

                         <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Locality name</label>
                            <div class="col-sm-8">
                              <input id="name" class="form-control" required  ng-model="name" name="name" type="text">
                               <small style="color:red;">Add multiple locality use ( , ) comma symbol</small>
                            </div>
                          </div>
                        </div>

                       

                       <div class="col-md-4">
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





<hr></hr>
<h4 class="mb-sm-0 font-size-18">Locality List</h4>      
<br>
                       


                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>


                         <th>ID #</th>
                          <th>Route </th>
                          <th>Locality Name</th>
                         
                          <th>Action</th>
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          <td>{{name.no}}</td>
                          <td>{{name.route_id}}</td>
                          <td>{{name.name}}</td>
                         
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
    $http.get('<?php echo base_url() ?>index.php/group/fetch_data_route').success(function(data){
      $scope.namesData = data;
    });
  };

 
 
  $scope.submitForm = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/group/insertandupdate_locality",
      data:{'name':$scope.name,'id':$scope.hidden_id,'route_id':$scope.route_id,'action':$scope.submit_button,'tablename':'locality'}
    }).success(function(data){

      if(data.error != '1')
      {
        $scope.success = true;
        $scope.error = false;
        $scope.route_id = "";
        
        $scope.name = "";
        $scope.hidden_id = "";
        $scope.successMessage = "Route name successfully "+$scope.submit_button;
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
      url:"<?php echo base_url() ?>index.php/group/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'locality'}
    }).success(function(data){
      $scope.name = data.name;
      $scope.route_id = data.route_id;
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
        data:{'id':id, 'action':'Delete','tablename':'locality'}
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



