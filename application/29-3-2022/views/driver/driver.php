<?php  include "header.php"; ?>
<style>
    form#pristine-valid-common {
    margin-bottom: 20px;
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
                                    <h4 class="mb-sm-0 font-size-18">Driver List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Driver List!</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card">

                  <div class="col-lg-12">
     
                         <button type="button" style="float: right;margin: 7px 20px;" class="btn btn-primary waves-effect waves-light clickshow" >Add Driver</button>
                    
                                            
                    </div>
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

                    <form id="pristine-valid-common" ng-submit="submitForm()" method="post" style="display:none;">
                      

                          <div class="row">
                      




                        
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Driver name <span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                              <input id="name" class="form-control" name="name" required ng-model="name" type="text">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone <span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                              <input id="phone" class="form-control" name="phone" required ng-model="phone" type="text">
                            </div>
                          </div>
                        </div>


                             <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Vehicle No <span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                             <select class="form-control"    name="vehicle_id" required ng-model="vehicle_id">

                              <option value=""> Select Vehicle No</option>

                              <?php
                                foreach ($vehicle as $value) {

                                  ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->vehicle_number; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                        
                        
                     




                        </div>
                        
                        
                           <h4 class="card-title mt-3">Delivery Charges </h4>
                           <div class="row">
                            
                            
                          <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Delivery Fixed Charge  <span style="color:red;">*</span></label>
                            <div class="col-sm-6">
                              <input id="delivery_fixced" class="form-control" name="delivery_fixced" required ng-model="delivery_fixced" type="text"> 
                            </div>
                          </div>
                        </div>
                        
                    
                    
                        
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label">KM Base Charge  </label>
                            <div class="col-sm-6">
                              <input id="km_base_charge" class="form-control" name="km_base_charge"  ng-model="km_base_charge" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        </div>
                        

                          <h4 class="card-title mt-3">Login Details </h4>

                          <div class="row">

                         <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Login Pin <span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                             <input id="pin" class="form-control" required  ng-model="pin" name="pin" type="text">
                            </div>
                          </div>
                        </div>


                       <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status <span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                             <select class="form-control"  ng-init="status=1" required name="status" ng-model="status" >
                                   
                                
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                              </select>
                            </div>
                          </div>
                        </div>


                           <div class="col-md-4">
                          <div class="form-group row">
                          
                            <div class="col-sm-9">
                               <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                         <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="{{submit_button}}">


                            </div>
                          </div>
                        </div>

                      </div>         
                  




                    </form>





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
                           <th>Fixed Charge</th>
                           <th>KM Base Charge</th>
                           <th>Pin</th>
                           <th>Sataus</th>
                           <th>Action</th>
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          <td>{{name.no}}</td>
                          <td>{{name.name}}</td>
                          <td>{{name.vehicle_id}}</td>
                          <td>{{name.phone}}</td>
                          <td>{{name.delivery_fixced}}</td>
                          <td>{{name.km_base_charge}}</td>
                          <td>{{name.pin}}</td>
                          <td>{{name.status}}</td>
                         
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
$(document).ready(function(){
  $(".clickshow").click(function(){
   $('#pristine-valid-common').toggle();
  });
});
</script>
<script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;


$scope.pin = '<?php echo substr(time(), 4); ?>';
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
      data:{'name':$scope.name,'delivery_fixced':$scope.delivery_fixced,'km_base_charge':$scope.km_base_charge,'name':$scope.name,'vehicle_id':$scope.vehicle_id,'phone':$scope.phone,'pin':$scope.pin,'status':$scope.status,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'driver'}
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
         $('#pristine-valid-common').toggle();
      }
      else
      {
            $scope.success = false;
            $scope.error = true;
            $scope.errorMessage = data.massage;
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
          $scope.delivery_fixced = data.delivery_fixced;
          $scope.km_base_charge = data.km_base_charge;
          $scope.phone = data.phone;
          $scope.pin = data.pin;
          $scope.status = data.status;
          $scope.hidden_id = id;
          $scope.submit_button = 'Update';
           $('#pristine-valid-common').toggle();
     
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




});

</script>
    <?php include ('footer.php'); ?>
</body>


