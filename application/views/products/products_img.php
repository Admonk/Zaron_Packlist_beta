<?php include "header.php"; ?>

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
                <h4 class="mb-sm-0 font-size-18">Product List</h4>

                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/products/productscreate">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Product List</li>
                  </ol>
                </div>

              </div>
            </div>
          </div>
          <!-- end page title -->

          <div class="row">
            <div class="col-lg-12">
              <div class="card">

             




                <div class="card-body">
                  <!-- <div class="form-check text-end m-2">
                    <input type="checkbox" name="status" checked="false" id="filterStatus" class="primary" ng-model="filterStatus">
                    <label class="control-label" for="filterStatus">Show Archived Products</label>

                  </div> -->

                  <div >
                   
                    <div class="tab-content" id="pills-tabContent">
                    <div class="row" style="margin-bottom: 10px;">  
                            <input type="hidden" id="pageSize" value="10"> 
                    <div class="col-sm-3">
                            <div class="dataTables_length" id="example_length">
                                <label>
                                    Records
                                <select name="example_length" aria-controls="example" class="form-control input-sm" ng-model="pageSize" ng-change="pageSizeChanged()">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="1000">1000</option>
                                </select> </label>
                            </div>
                         </div>
                         <div class="col-sm-9">
                      <div class='d-flex justify-content-end mx-4 mb-3'>
                        <input class="form-control input-sm" type="text" value="" style="width: 250px;" ng-blur="" id="search">
                      </div>
                         </div>
                    </div>
                      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" >
                        <table id="datatable" class="table table-bordered dt-responsive  " >
                          <thead>
                            <tr>

 <th>ID</th>
                              <th>Image</th>
                              
                              <th>Action</th>


                            </tr>
                          </thead>
                          <tbody>


                            <?php

                                 foreach ($product_images as $value) {
                                   ?>
                                      
                                        <tr >


                           
                                         <td><?php echo $value->id; ?></td>
                              <td><img src="https://erp.zaron.in/<?php echo $value->product_image; ?>" width="250px;" ></td>
                             

                          
                              <td>
                               
<button type="button" 
                              ng-click="deleteData('<?php echo $value->id; ?>')"
                               class="btn btn-outline-danger"><i class="mdi mdi-delete menu-icon"></i></button>


                              </td>

                            </tr>

                                     
                                   <?php
                                 }
                             ?>
                          


                          </tbody>
                        </table>
                     
                      </div>
                   
                    </div>


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
    app.controller('crudController', function($scope, $http) {
      $scope.currentPage = 1;
      $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
   




      $scope.deleteData = function(id) {
       
          $http({
            method: "POST",
            url: "<?php echo base_url() ?>index.php/products/insertandupdate",
            data: {
              'id': id,
              'action': 'IMG_Delete',
              'tablename': 'product_images'
            }
          }).success(function(data) 
          {
            
            location.reload();

          });
      
      };








    


    });
  </script>
  <?php include('footer.php'); ?>
</body>