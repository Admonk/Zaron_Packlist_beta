<?php  include "header.php"; ?>
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
                                    <h4 class="mb-sm-0 font-size-18">Category Form</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Category Form</li>
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

                         <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Category name</label>
                            <div class="col-sm-7">
                              <input id="name" class="form-control" required  ng-model="name" name="name" type="text">

                            </div>
                          </div>
                        </div>

                         <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">UOM Type</label>
                            <div class="col-sm-7">
                             <select class="form-control"  ng-model="uom">
                                                    <option value="">Select UOM</option>
                                                      <option value="1">TON</option>
                                                      <option value="2" >KG</option>
                                                      <option value="3">SQ.MTR</option>
                                                      <option value="4">MTR</option>
                                                      <option value="5">SQ.FT</option>
                                                      <option value="6">NOS</option>
                                                      <option value="7" >FT</option>
                                                  </select>

                            </div>
                          </div>
                        </div>

                       <div class="col-md-4">
                          <div class="form-group row">
                          
                            <div class="col-sm-6">
                                 <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                         <input class="btn btn-success w-lg waves-effect waves-light" style="float: right;" type="submit" value="{{submit_button}}">

                            </div>
                          </div>
                        </div>
</div>
                        



            
                      
                      
                    
                    </form>





<hr></hr>
<h4 class="mb-sm-0 font-size-18">Category List</h4>      
<br>
                       


                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>


                         <th>ID #</th>
                          <th>Category Name</th>
                         <th>UOM</th>
                          <th>Action</th>
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          <td>{{name.no}}</td>
                          <td>{{name.name}}</td>
                         <td>{{name.uom}}</td>
                          <td>
                            <button type="button" ng-click="fetchSingleData(name.id)" class="btn btn-outline-primary">Edit</button>
                          


                        <?php
                        // Shop Team
                        $usergroup=array(1,2); 
                        if(in_array($this->session->userdata['logged_in']['access'],$usergroup))
                        {
                                                        
                        ?> 

                           <button type="button" ng-click="deleteData(name.id)" class="btn btn-outline-danger"><i class="mdi mdi-delete menu-icon"></i></button>

                           
                        <?php
                        }
                        ?>


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
    $http.get('<?php echo base_url() ?>index.php/categories/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };

 
 
  $scope.submitForm = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/categories/insertandupdate",
      data:{'name':$scope.name,'uom':$scope.uom,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'categories'}
    }).success(function(data){
       
      if(data.error != '1')
      {
        $scope.success = true;
        $scope.error = false;
        $scope.name = "";
        $scope.uom = "";
        $scope.hidden_id = "";
        $scope.successMessage = "Category name successfully "+$scope.submit_button;
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
      url:"<?php echo base_url() ?>index.php/categories/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'categories'}
    }).success(function(data){
      $scope.name = data.name;
      $scope.uom = data.uom;
      $scope.hidden_id = id;
      $scope.submit_button = 'Update';
     
    });
};



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/categories/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'categories'}
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


