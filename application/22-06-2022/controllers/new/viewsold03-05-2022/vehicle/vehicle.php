<?php  include "header.php"; ?>
<style type="text/css">
  .pristine-error {
    margin-top: 2px;
    color: #ef6767;
    text-align: left;
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
                                    <h4 class="mb-sm-0 font-size-18">Vehicle  Form</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Vehicle  Form</li>
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
                            <label class="col-sm-7 col-form-label">Vehicle Name</label>
                            <div class="col-sm-9">
                              <input id="name" class="form-control" required name="vehicle_name" ng-model="vehicle_name" placeholder="TATA" type="text">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Vehicle Number</label>
                            <div class="col-sm-9">
                              <input id="vehicle_number" class="form-control" required name="vehicle_number" ng-model="vehicle_number" placeholder="TN00@000" type="text">
                            </div>
                          </div>
                        </div>



                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Purchased Date</label>
                            <div class="col-sm-9">
                              <input id="purchased_date" class="form-control" required name="purchased_date" ng-model="purchased_date" type="date">
                            </div>
                          </div>
                        </div>


                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Insurance Date</label>
                            <div class="col-sm-9">
                              <input id="insurance_date" class="form-control" required name="insurance_date" ng-model="insurance_date" type="date">
                            </div>
                          </div>
                        </div>



                       

                           <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Fc Date</label>
                            <div class="col-sm-9">
                              <input id="fc_date" class="form-control" name="fc_date" ng-model="fc_date" type="date">
                            </div>
                          </div>
                        </div>


                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">National Permit Date</label>
                            <div class="col-sm-9">
                              <input id="national_permit_date" class="form-control" name="national_permit_date" ng-model="national_permit_date" type="date">
                            </div>
                          </div>
                        </div>


                           <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Pollution Date</label>
                            <div class="col-sm-9">
                              <input id="pollution_date" class="form-control" name="pollution_date" ng-model="pollution_date" type="date">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">State tax</label>
                            <div class="col-sm-9">
                              <input id="state_tax" class="form-control" name="state_tax" ng-model="state_tax" type="text" placeholder="2000">
                            </div>
                          </div>
                        </div>


                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Road Tax</label>
                            <div class="col-sm-9">
                              <input id="road_tax" class="form-control" name="road_tax" ng-model="road_tax" type="text" placeholder="2000">
                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Route</label>
                            <div class="col-sm-9">
                            
                           <select class="form-control" name="route_id" required ng-model="route_id">

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
                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <div class="col-sm-9">
                             <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                       <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="{{submit_button}}">

                            </div>
                          </div>
                        </div>


                        </div>


                      
                    
                    </form>





<hr></hr>
<h4 class="mb-sm-0 font-size-18">Vehicle Table List</h4>      
<br>
                       


                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>


                           <th>ID #</th>
                           <th>Vehicle name</th>
                           <th>Vehicle Number</th>
                           <th>Route</th>
                           <th>Purchased Date</th>
                           <th>Insurance Date</th>
                           <th>FC Date</th>
                           <th>N Permit Date</th>
                           <th>Pollution Date</th>
                           <th>State Tax</th>
                           <th>Road Tax</th>
                           
                         

                           <th>Action</th>
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          <td>{{name.id}}</td>
                          <td>{{name.vehicle_name}}</td>
                          <td>{{name.vehicle_number}}</td>
                          <td>{{name.routename}}</td>
                          <td>{{name.purchased_date}}</td>
                          <td>{{name.insurance_date}}</td>
                          <td>{{name.fc_date}}</td>
                          <td>{{name.national_permit_date}}</td>
                          <td>{{name.pollution_date}}</td>
                          <td>{{name.state_tax}}</td>
                          <td>{{name.road_tax}}</td>
                        
                         
                          <td>
                            <button type="button" ng-click="fetchSingleData(name.id)" class="btn btn-outline-primary"><i class="mdi mdi-pencil menu-icon"></i></button>
                           <button type="button" ng-click="deleteData(name.id)" class="btn btn-outline-danger"><i class="mdi mdi-delete menu-icon"></i></button></td>
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
    $http.get('<?php echo base_url() ?>index.php/vehicle/fetch_data_sales_group').success(function(data){
      $scope.namesData = data;
    });
  };

 
 
  $scope.submitForm = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/vehicle/insertandupdate",
      data:{
        'vehicle_name':$scope.vehicle_name,
        'vehicle_number':$scope.vehicle_number,
        'purchased_date':$scope.purchased_date,
        'insurance_date':$scope.insurance_date,
        'route_id':$scope.route_id,
        'national_permit_date':$scope.national_permit_date,
        'pollution_date':$scope.pollution_date,
        'fc_date':$scope.fc_date,
        'state_tax':$scope.state_tax,
        'road_tax':$scope.road_tax,
        'status':'1',
        'id':$scope.hidden_id,
        'action':$scope.submit_button,
        'tablename':'vehicle'
      }
    }).success(function(data){
       
      if(data.error != '1')
      {
        $scope.success = true;
        $scope.error = false;
        $scope.vehicle_name = "";
        $scope.vehicle_number = "";
        $scope.purchased_date = "";
        $scope.route_id = "";
        $scope.insurance_date = "";
        $scope.national_permit_date = "";
        $scope.pollution_date = "";
        $scope.state_tax = "";
        $scope.road_tax = "";
        $scope.fc_date = "";
        $scope.hidden_id = "";
        $scope.successMessage = "Vehicle successfully "+$scope.submit_button;
        $scope.fetchData();
      }



    });
  };


$scope.fetchSingleData = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/vehicle/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'vehicle'}
    }).success(function(data){

          $scope.vehicle_name = data.vehicle_name;
          $scope.vehicle_number = data.vehicle_number;
          $scope.purchased_date = new Date(data.purchased_date);
          $scope.insurance_date = new Date(data.insurance_date);
          $scope.national_permit_date = new Date(data.national_permit_date);
          $scope.fc_date = new Date(data.fc_date);
          $scope.route_id = data.route_id;
          $scope.pollution_date = new Date(data.pollution_date);
          $scope.state_tax = data.state_tax;
          $scope.road_tax = data.road_tax;


          $scope.hidden_id = id;
          $scope.submit_button = 'Update';
     
    });
};



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/sales/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'vehicle'}
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



