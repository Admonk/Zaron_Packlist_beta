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
                                    <h4 class="mb-sm-0 font-size-18">Bank Deposit</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/products/productscreate">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Deposit</li>
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
 <a href="<?php echo base_url(); ?>index.php/bankdeposit/newcreate" class="btn btn-success"   style="float:right;margin: 5px 10px;">Add New Deposit</a>
</div>
                  <div class="card-body" >

      
                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>

                         <th>#</th>
                          <th>ID</th>
                          <th>Bank Name</th>
                          <th>Accounts Head</th>
                          <th>Amount</th>
                          <th>Payment Status</th>
                          <th>Deposit Date</th>
                        
                          <th>Action</th>
                         
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          
                             <td></td>
                             <td>{{name.id}}</td>
                             
                             <td>{{name.name}}</td>
                             <td>{{name.account_head_name}}</td>
                             <td>{{name.amount}}</td>
                             
                             
                             <td>
                                 
                               <span ng-if="name.payment_status==1">Cr</span>
                               <span ng-if="name.payment_status==2">Dr</span>
                             
                             
                             </td>
                             <td>{{name.deposit_date}}</td>
                        
                        
                         
                          <td>
                              
                          <a href="<?php echo base_url(); ?>index.php/bankdeposit/edit/{{name.id}}" target="_blank"  class="btn btn-outline-primary"><i class="mdi mdi-pencil menu-icon"></i></a>
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
    $http.get('<?php echo base_url() ?>index.php/bankdeposit/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };

 
 



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/bankdeposit/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'bank_deposit'}
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




