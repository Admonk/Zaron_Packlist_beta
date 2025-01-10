<?php  include "header.php"; ?>
<style>
  /* Style for the toggle switch */
  .toggle-switch {
    display: inline-block;
    position: relative;
  }

  .toggle-switch input[type="checkbox"] {
    display: none;
  }

  .toggle-label {
    display: block;
    width: 30px;
    /* Width of the switch */
    height: 15px;
    /* Height of the switch */
    background-color: #ccc;
    border-radius: 25px;
    /* Make it round */
    cursor: pointer;
    position: relative;
  }

  .toggle-label::before {
    content: '';
    width: 15px;
    /* Width of the knob */
    height: 15px;
    /* Height of the knob */
    background-color: #fff;
    border-radius: 50%;
    /* Make it round */
    position: absolute;
    top: 0;
    left: 0;
    transition: 0.4s;
    /* Add transition for smooth animation */
  }

  .toggle-switch input[type="checkbox"]:checked+.toggle-label {
    background-color: #4CAF50;
    /* Background color when switched on */
  }

  .toggle-switch input[type="checkbox"]:checked+.toggle-label::before {
    transform: translateX(15px);
    /* Move the knob to the right */
  }
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp"
  ng-controller="crudController">

  <div id="layout-wrapper">
    <?php echo $top_nav; ?>

    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Rectification/Alternative Action Master</h4>

                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Rectification/Alternative Action Master</li>
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
                  <div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="success">
                    <i class="mdi mdi-check-all me-2"></i>
                    {{ successMessage }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert" ng-show="error">
                    <i class="mdi mdi-block-helper me-2"></i>
                    {{ errorMessage }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <form id="pristine-valid-example" novalidate method="post"></form>

                  <form id="pristine-valid-common" ng-submit="submitForm()" method="post">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-5 col-form-label">Rectification/Alternative Action Option</label>
                          <div class="col-sm-7">
                            <input id="name" class="form-control" required ng-model="name" name="name" type="text">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">

                          <div class="col-sm-3">
                            <input type="hidden" name="hidden_id" value="{{ hidden_id }}" />
                            <input class="btn btn-success w-lg waves-effect waves-light" style="float: right;"
                              type="submit" value="{{ submit_button }}">
                          </div>

                          <?php $usergroup = array(1, 15);
                          if (in_array($this->session->userdata['logged_in']['access'], $usergroup)) { ?>
                              <div class="col-md-9">
                                  <div class="form-group row">
                                      
                                      <div class="col-md-4 d-flex">
                                      <div class="toggle-switch">
                                          <input type="checkbox" id="toggle" ng-model="toggleValue" ng-change="toggleChanged()" />
                                          <label for="toggle" class="toggle-label"></label>
                                      </div>
                                      <div class="col-md-6">
                                          <label for="" class="" style="margin-left: 10px;">Others Option</label>
                                      </div>
                                      </div>
                                  </div>
                              </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>

                    
                  </form>

                  <hr>
                  </hr>

                  <h4 class="mb-sm-0 font-size-18">Option List</h4>
                  <br>
                  <div ng-init="fetchData()">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng"
                      dt-options="vm.dtOptions">
                      <thead>
                        <tr>
                          <th>ID #</th>
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData" ng-if="name.name">
                          <td>{{ name.no }}</td>
                          <td>{{ name.name }}</td>
                          <td>
                            <button type="button" ng-click="fetchSingleData(name.id)"
                              class="btn btn-outline-primary">Edit</button>
                            <?php
                              // Shop Team
                              $usergroup=array(1,2); 
                              if(in_array($this->session->userdata['logged_in']['access'],$usergroup))
                              {
                                                              
                              ?>

                            <button type="button" ng-click="deleteData(name.id)" class="btn btn-outline-danger"><i
                                class="mdi mdi-delete menu-icon"></i></button>


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
    var app = angular.module('crudApp', ['datatables']);
    app.controller('crudController', function ($scope, $http) {

      $scope.success = false;
      $scope.error = false;



      $scope.submit_button = 'Add';


      $scope.fetchData = function () {
        $scope.submit_button = 'Add';
        $http.get('<?php echo base_url() ?>index.php/master/fetch_data?tablename=rectification_alt_action_master&togglename="rect_ait_action_master"')
          .success(function (data) {
            $scope.namesData = data;
            $scope.toggleValue = data.other_option === '1' ? true : false;
            // $scope.success = false;
          });
      };



      $scope.submitForm = function () {
        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/master/insertandupdate",
          data: {
            'name': $scope.name,
            'id': $scope.hidden_id,
            'action': $scope.submit_button,
            'tablename': 'rectification_alt_action_master'
          }
        }).success(function (data) {

          if (data.error != '1') {
            $scope.success = true;
            $scope.error = false;
            $scope.name = "";
            $scope.hidden_id = "";
            $scope.successMessage = "Option name successfully " + $scope.submit_button;
            $scope.fetchData();
          }



        });
      };


      $scope.fetchSingleData = function (id) {
        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/master/fetch_single_data",
          data: {
            'id': id,
            'action': 'fetch_single_data',
            'tablename': 'rectification_alt_action_master'
          }
        }).success(function (data) {
          $scope.name = data.name;
          $scope.hidden_id = id;
          $scope.submit_button = 'Update';

        });
      };



      $scope.deleteData = function (id) {
        if (confirm("Are you sure you want to remove it?")) {
          $http({
            method: "POST",
            url: "<?php echo base_url() ?>index.php/master/insertandupdate",
            data: {
              'id': id,
              'action': 'Delete',
              'tablename': 'rectification_alt_action_master'
            }
          }).success(function (data) {
            $scope.success = false;
            $scope.error = false;
            $scope.fetchData();
          });
        }
      };

      $scope.toggleChanged = function() {
            if ($scope.toggleValue) {
                // Switch is ON
                console.log('Switch is ON');
            } else {
                // Switch is OFF
                console.log('Switch is OFF');
            }
            $http({
                method:"POST",
                url:"<?php echo base_url() ?>index.php/master/updatetoggle",
                data:{'label':'rect_ait_action_master', 'value':$scope.toggleValue}
                }).success(function(data){
                  $scope.fetchData();
                });
            };


    });
  </script>
  <?php include ('footer.php'); ?>
</body>
