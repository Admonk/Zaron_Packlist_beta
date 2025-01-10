<?php  include "header.php"; ?>
<style>
  table {
    width: 100%; /* Set the width to 100% of its container */
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
                  <form id="pristine-valid-common" ng-submit="submitForm()" name="pristine_valid_common" method="post">
                    <div class="row">
                      <div class="col-md-5" style="margin: 5px; padding: 10px;">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Sub Category name <span style="color:red;">*</span></label>
                            <div class="col-sm-8">
                              <input id="sub_categories" class="form-control" required  ng-model="sub_categories" name="sub_categories" type="text">

                            </div>
                          </div>
                      </div>

                      <div class="col-md-5" style="margin: 5px; padding: 10px;">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Categories <span style="color:red;">*</span></label>
                            <div class="col-sm-8">
                              <select class="form-control categories" required name="categories"  ng-model="categories">
                                <option value=""> Select Categories</option>
                                  <?php
                                    foreach ($Categories as $value) {

                                      ?>
                                          <option value="<?php echo $value->id; ?>" data-id="<?php echo $value->id; ?>"><?php echo $value->categories; ?></option>
                                      <?php
                                    }
                                  ?>
                                </select>
                              </div>
                          </div>
                      </div>

                      <div class="col-md-5" style="margin: 5px; padding: 10px;">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Products <span style="color:red;">*</span></label>
                            <div class="col-sm-8">
                              <select class="select2 form-control multiple-select" required multiple="multiple" name="products[]" id="products" ng-model="selectedProducts">
                                  <option ng-repeat="product in productslist" value="{{product.productid}}" data-id="{{product.productid}}">{{ product.productname }}</option>
                              </select>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-5" style="margin: 5px; padding: 10px;">
                          <div class="form-group row">
                            <div class="col-sm-3">
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
                  <table id="datatable" class="table table-bordered dt-responsive w-100" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>
                          <th style="width:10%;">ID #</th>
                          <th style="width:14%;">Categories</th>
                          <th style="width:10%;">Sub Category Name</th>
                          <th style="width:28%;">Products Name</th>
                          <th style="width:28%;">Purchase Name</th>
                          <th style="width:10%;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData" ng-if="name.no > 0 || name.no !== '' ">
                          <td>{{name.no}}</td>
                          <td>{{name.categories}}</td>
                          <td>{{name.name}}</td>
                          <td>{{name.products}}</td>
                          <td>{{name.purchasename}}</td>
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
  $(document).ready(function() {
    $('.multiple-select').select2();
  });

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){
  $scope.success = false;
  $scope.error = false;
  $scope.productslist = '<?php echo $products; ?>';
  $scope.submit_button = 'Add';
  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/sub_categories/fetch_data').success(function(data){
      console.log(data.data);
      console.log(data.productlist);

      $scope.namesData = data.data;
      $scope.productslist = data.productlist;
    });
  };

  /*$scope.submitForm = function(){
    var selectedValues = $('#products').val();
    console.log(selectedValues);
    $http({
      method:"POST",
      url:"<?php //echo base_url() ?>index.php/sub_categories/insertandupdate",
      data:{'sub_categories':$scope.sub_categories,'categories':$scope.categories,'products':selectedValues,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'sub_categories'}
    }).success(function(data){
      if(data.error != '1')
      {
        $scope.success = true;
        $scope.error = false;
        $scope.sub_categories = "";
        $scope.categories = "";
        $scope.products = "";
        $scope.hidden_id = "";
        $scope.successMessage = "Sub category name successfully "+$scope.submit_button;
        $scope.fetchData();
        $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert-success").slideUp(500);
        });
      }
      else
      {
        alert('This product is already mapped with a subcategory.');
      }
    });
  };*/

  $scope.submitForm = function() {
    if ($scope.pristine_valid_common.$valid) {
        var selectedValues = $('#products').val();
        console.log(selectedValues);
        $http({
            method: "POST",
            url: "<?php echo base_url() ?>index.php/sub_categories/insertandupdate",
            data: {
                'sub_categories': $scope.sub_categories,
                'categories': $scope.categories,
                'products': selectedValues,
                'id': $scope.hidden_id,
                'action': $scope.submit_button,
                'tablename': 'sub_categories'
            }
        }).success(function(data) {
          console.log(data);          
          console.log(data.error);

            if (data.error != '1') {
              console.log("if"+data.error);
                $scope.success = true;
                $scope.error = false;
                $scope.sub_categories = "";
                $scope.categories = "";
                $scope.products = "";
                $scope.submit_button = 'Add';
                $scope.hidden_id = "";
                $scope.successMessage = "Sub category name successfully " + $scope.submit_button;
                $scope.fetchData();
                $(".alert-success").fadeTo(2000, 500).slideUp(500, function() {
                    $(".alert-success").slideUp(500);
                });
            } else {
              console.log("else"+data.error);
              alert(data.message);
                //alert('This product is already mapped with a subcategory.');
            }
        });
    } else {
        alert('Please fill in all required fields.');
    }
  };

$scope.fetchSingleData = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/sub_categories/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'sub_categories'}
    }).success(function(data){
      console.log(data.productss);
      $scope.sub_categories = data.sub_categories;
      $scope.categories = data.categories;
      $scope.selectedProducts = data.productss;
      $scope.hidden_id = id;
      $scope.submit_button = 'Update';
    });
};

$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/sub_categories/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'sub_categories'}
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


