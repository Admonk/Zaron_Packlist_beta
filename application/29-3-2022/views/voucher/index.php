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
                                    <h4 class="mb-sm-0 font-size-18">Voucher</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/products/productscreate">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Voucher</li>
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
 <a href="<?php echo base_url(); ?>index.php/voucher/newcreate" class="btn btn-success"   style="float:right;margin: 5px 10px;">Add New Voucher</a>
</div>
                  <div class="card-body" >

      
                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>


                          <th>ID</th>
                          <th>Type</th>
                          <th>Name</th>
                          <th>Voucher Id</th>
                          <th>Reference NO</th>
                          <th>Notes</th>
                          <th>Date</th>
                          <th>Action</th>
                         
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          
                          
                             <td>{{name.id}}</td>
                             <td>{{name.type}}</td>
                             <td>{{name.name}}</td>
                             <td>{{name.voucher_id}}</td>
                             <td>{{name.reference_no}}</td>
                             <td>{{name.notes}}</td>
                             <td>{{name.voucher_date}}</td>
                        
                        
                         
                          <td>
                              
                               <a href="<?php echo base_url(); ?>index.php/voucher/invoice/{{name.id}}" target="_blank"  class="btn btn-outline-success"><i class="mdi mdi-file menu-icon"></i></a>
                           
                           <!-- <a href="<?php echo base_url(); ?>index.php/manual_journals/edit/{{name.id}}" target="_blank"  class="btn btn-outline-primary"><i class="mdi mdi-pencil menu-icon"></i></a>-->
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
    $http.get('<?php echo base_url() ?>index.php/voucher/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };

 
 



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/voucher/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'voucher'}
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


