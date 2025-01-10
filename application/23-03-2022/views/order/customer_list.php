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
                                    <h4 class="mb-sm-0 font-size-18">Customer List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active"> Customer List !</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">
                                        <h4 class="card-title">Customer List Table</h4>
                                        
                    </div>
                  <div class="card-body" >

                       


                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>
                          <th>ID</th>
                         
                          <th>Company Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Address</th>


                       

                          <th>City</th>
                          <th>State</th>
                          <th>GST</th>
                          <th>Pin</th>
                          <th>Access</th>
                          <th>Status</th>
                           <th>Action</th>
                         
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          
                          
                          <td>{{name.id}}</td>
                         
                          <td>{{name.company_name}}</td>
                          <td>{{name.email}}</td>
                          <td>{{name.phone}}</td>
                          <td>{{name.address}}</td>




                          
                          <td>{{name.city}}</td>
                          <td>{{name.state}}</td>
                          <td>{{name.gst}}</td>
                          <td>{{name.pin}}</td>
                          <td>{{name.access}}</td>
                          <td>{{name.status}}</td>
                           <td>
                            <a href="<?php echo base_url(); ?>index.php/customer/customer_edit/{{name.id}}"  class="btn btn-outline-primary"><i class="mdi mdi-pencil menu-icon"></i></a>
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



 


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/customer/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };

 
 



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'customers'}
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


