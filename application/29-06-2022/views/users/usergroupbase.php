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
                                    <h4 class="mb-sm-0 font-size-18">Users List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/users/usersindex">Users Create</a></li>
                                            <li class="breadcrumb-item active"> Users List</li>
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
                         
                         
                         
                        <a href="<?php echo base_url(); ?>index.php/users/usersindex" class="btn btn-success">Users Create</a>
                        <br><br>
                      <div class="row">
                      <?php 
                    
                      foreach($user_group as $value)
                      {  
                          ?>
                          
                                   <div class="col-sm-6 col-lg-4" >
                                       <a href="<?php echo base_url(); ?>index.php/users/user_list_by_group?group_base=<?php echo $value->id;  ?>">
                                        <div class="card">
                                            <div class="card-body">
                                            <h5 class="card-title center"><?php echo $value->name; ?></h5>
                                           
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    
                          <?php
                      }
                      
                      
                      ?>
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
    $http.get('<?php echo base_url() ?>index.php/users/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };

 
 



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/group/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'admin_users'}
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


