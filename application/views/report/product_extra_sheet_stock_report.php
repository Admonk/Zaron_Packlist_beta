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
                                    <h4 class="mb-sm-0 font-size-18">Product Extra Sheet Stock Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/products/productscreate">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Product Extra Sheet Stock Report</li>
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
                                        <h4 class="card-title">Product Stock</h4>
                                        
                    </div>
                    
                    
                    
<div class="col-lg-12" style="display:none;">
    
    
      <button type="button" style="float: right;margin: 7px 20px;"  class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center2">Import Stock</button>
      <a href="<?php echo base_url(); ?>export_product_stock.php" style="float: right;margin: 7px 20px;"  class="btn btn-success waves-effect waves-light" >Export Stock</a>
      
              
</div>  






















                    
                    
                  <div class="card-body" >

                       


                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered dt-responsive  " datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>


                          <th>ID</th>
                          <th >Return Order No</th>
                          <th >Category</th>
                          <th style="width:450px;">Product Name</th>
                           <th>NOS</th>
                          <th>QTY</th>
                          <th>RACK</th>
                          <th>BIN</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          
                          
                          <td>{{name.no}}</td>
                          <td>{{name.order_no}}</td>
                          <td>{{name.categories}}</td>
                          <td>{{name.product_name}}</td>
                          <td>{{name.nos}}</td>
                          <td>{{name.qty}}</td>
                          <td>{{name.rack_info}}</td>
                          <td>{{name.bin_info}}</td>
                          
                        
                        
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
    $http.get('<?php echo base_url() ?>index.php/order_second/fetch_data_stock_extra_sheet').success(function(data){
      $scope.namesData = data;
    });
  };




});

</script>
    <?php include ('footer.php'); ?>
</body>


