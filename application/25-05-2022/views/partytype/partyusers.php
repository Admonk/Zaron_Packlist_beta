<?php  include "header.php"; ?>
<style>
     #pristine-valid-common .row .col-md-12 {
             /* line-height: 44px; */
             margin-bottom: 14px;
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
                                    <h4 class="mb-sm-0 font-size-18">Party Users </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Party Users</li>
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



    <a href="#" class="btn btn-success"  data-bs-toggle="modal" data-bs-target=".exampleModalToggleLabel" >Add New Party Users</a>
  
 <div class="modal fade exampleModalToggleLabel" id="firstmodalcommison" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Party User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                        

<form id="pristine-valid-example" novalidate method="post"></form>

                    <form id="pristine-valid-common" ng-submit="submitForm()" method="post">
                      



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




 <div class="row">

                         <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Name </label>
                            <div class="col-sm-7">
                              <input id="bank_name" class="form-control" required  ng-model="name"  name="name" type="text">

                            </div>
                          </div>
                        </div>
                        
                        
                          <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Phone</label>
                            <div class="col-sm-7">
                              <input id="account_no" class="form-control" required  ng-model="phone"  name="phone" type="text">

                            </div>
                          </div>
                        </div>
                        
                        
                        
                        
                        
                          <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Type</label>
                            <div class="col-sm-7">
                            
                              <select class="form-control typeset" required  ng-model="type">
                                  <option value=""> Select Type</option>
                                  
                                  <?php
                                  foreach($partytype as $val)
                                  {
                                      if($val->id!='1' && $val->id!='2' && $val->id!='3' && $val->id!='4')
                                      {
                                          
                                      
                                      ?>
                                        <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                      <?php
                                      
                                      }
                                  }
                                  
                                  ?>
                                
                                  
                              </select>

                            </div>
                          </div>
                        </div>
                        
                         
                        

                       <div class="col-md-12">
                          <div class="form-group row">
                          
                            <div class="col-sm-12">
                                  
                                  <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                                  <input class="btn btn-success w-lg waves-effect waves-light" style="float: right;" type="submit" value="{{submit_button}}">

                            </div>
                          </div>
                        </div>
</div>
                        



            
                      
                      
                    
                    </form>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>













<h4 class="mb-sm-0 font-size-18">Party User List</h4>      

                       


                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>


                          <th>ID #</th>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Type</th>
                          <th>Action</th>
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          <td>{{name.no}}</td>
                          <td>{{name.name}}</td>
                          <td>{{name.phone}}</td>
                          <td>{{name.type}}</td>
                         
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
    $http.get('<?php echo base_url() ?>index.php/partytype/fetch_data_users').success(function(data){
      $scope.namesData = data;
    });
  };




 

 
  $scope.submitForm = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/partytype/insertandupdate",
      data:{'name':$scope.name,'phone':$scope.phone,'type':$scope.type,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'partyusers'}
    }).success(function(data){
       
      if(data.error != '1')
      {
        $scope.success = true;
        $scope.error = false;
        $scope.name = "";
        $scope.type = "";
        $scope.phone = "";
       
        $scope.successMessage = "Users successfully "+$scope.submit_button;
        $scope.fetchData();
      }



    });
  };


$scope.fetchSingleData = function(id){
    
    
     $('#firstmodalcommison').modal('toggle');
    
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/partytype/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'partyusers'}
    }).success(function(data){
        
        
         $scope.name = data.name;
         $scope.type = data.type;
         $scope.phone = data.phone;
         
         $scope.hidden_id = id;
         $scope.submit_button = 'Update';
     
    });
};



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/bankaccount/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'bankaccount'}
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



