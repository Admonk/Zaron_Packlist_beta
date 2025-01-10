<?php  include "header.php"; ?>
<body ng-app="crudApp" ng-controller="crudController">

    <div class="container-scroller">
     <?php echo $top_nav; ?>
     <div class="container-fluid page-body-wrapper">
   
     <?php echo $side_nav; ?>

       
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> User Form Edit </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User Form Edit</li>
                </ol>
              </nav>
            </div>
         
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body" ng-init="fetchData()">

                        <div class="alert alert-success alert-dismissible" ng-show="success" >
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          {{successMessage}}
                        </div>

                          <div class="alert alert-danger alert-dismissible" ng-show="error" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{errorMessage}}
                          </div>
                    
                    <form class="cmxform" id="signupForm" ng-submit="submitForm()" method="post">
                      <fieldset>



                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input id="name" class="form-control"  name="name" ng-model="name" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                             <input id="email" class="form-control"  name="email"   ng-model="email" type="email">
                            </div>
                          </div>
                        </div>
                      </div>





                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                              <input id="phone" class="form-control"  name="phone" ng-model="phone" type="text">
                            </div>
                          </div>
                        </div>


                            <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">User Group</label>
                            <div class="col-sm-8">
                             <select class="form-control" name="customer_group" ng-model="customer_group">

                              <option value=""> Select User Group</option>

                              <?php
                                foreach ($user_group as $value) {

                                  ?>
                                       <option value="<?php echo $value->id; ?>" ><?php echo $value->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>


                    

                      </div>



                 



                        

                   <h4 class="card-title">Login Details </h4>
                     <div class="row">
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                             <input id="username" class="form-control"  ng-model="username" name="username" type="text">
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                              <input id="password" class="form-control" ng-model="password" name="password" type="text">
                            </div>
                          </div>
                        </div>
                      </div>
                      


                       <input type="hidden" name="hidden_id" value="{{hidden_id}}"  />
                         <input class="btn btn-primary" type="submit" value="{{submit_button}}">
                      </fieldset>
                    </form>





                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
            <?php include('footer_copyrights.php'); ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
   
  
<script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



  $scope.submit_button = 'Update';




 
 
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
           
            $scope.successMessage = data.massage;
          

          }

          

      }

       
    });
  };


$scope.fetchData = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/users/fetch_single_data",
      data:{'id':<?php echo $id; ?>, 'action':'fetch_single_data','tablename':'admin_users'}
    }).success(function(data){

        $scope.name = data.name;
        $scope.email = data.email;
        $scope.phone = data.phone;
        $scope.username = data.username;
        $scope.password = data.password;
        $scope.customer_group = data.access;
        $scope.hidden_id = data.id;
     
    });
};








});

</script>

<?php include ('footer.php'); ?>
</body>


