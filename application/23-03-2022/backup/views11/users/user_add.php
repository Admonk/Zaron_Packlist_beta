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
                                    <h4 class="mb-sm-0 font-size-18">Users  Create</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Users Forms </li>
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
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Name</label>
                            <div class="col-sm-12">
                              <input id="name" class="form-control" name="name" required ng-model="name" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Email</label>
                            <div class="col-sm-12">
                             <input id="email" class="form-control" name="email"   ng-model="email" type="email">
                            </div>
                          </div>
                        </div>
                      </div>



                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Phone</label>
                            <div class="col-sm-12">
                              <input id="phone" class="form-control" name="phone" required ng-model="phone" type="text">
                            </div>
                          </div>
                        </div>


                            <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">User Group</label>
                            <div class="col-sm-12">
                             <select class="form-control" name="customer_group"  required ng-model="customer_group">

                              <option value=""> Select User Group</option>

                              <?php
                                foreach ($user_group as $value) {

                                  ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>


                    

                      </div>



                          <h4 class="card-title mt-3">Login Details </h4>
                     <div class="row">
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Username</label>
                            <div class="col-sm-12">
                             <input id="username" class="form-control" required ng-model="username" name="username" type="text">
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Password</label>
                            <div class="col-sm-12">
                              <input id="password" class="form-control" required ng-model="password" name="password" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        
                        
                          <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                              <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="{{submit_button}}">
                            </div>
                        </div>
                        
                        
                        
                      </div>






                      


                   
                    </form>





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



  $scope.submit_button = 'Save';




 
 
  $scope.submitForm = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/users/insertandupdate",
      data:{'name':$scope.name,'username':$scope.username,'password':$scope.password,'phone':$scope.phone,'email':$scope.email,'customer_group':$scope.customer_group,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'admin_users'}
    }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

              $scope.success = false;
              $scope.error = true;
              $scope.hidden_id = "";
              $scope.errorMessage = data.massage;

          }
          else
          {

            $scope.success = true;
            $scope.error = false;
            $scope.name = "";
            $scope.email = "";
            $scope.phone = "";
            $scope.username = "";
            $scope.password = "";
            $scope.customer_group = "";
            $scope.successMessage = data.massage;
          

          }

          

      }

       
    });
  };




});

</script>



    <?php include ('footer.php'); ?>
</body>


