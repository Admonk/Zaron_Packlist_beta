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
                <h4 class="mb-sm-0 font-size-18">Standard Reason Master</h4>

                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Standard Reason Master</li>
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
                          <label class="col-sm-5 col-form-label">Standard Reason Option</label>
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
                    <div class="row">
                      <div class="col-md-12">
                       
                          <label class="col-sm-5 col-form-label">Detailed Reason Option <small>Input value with (,)</small></label>
                          
                       
                            <div class="col-sm-7">
                                
                                <textarea rows="4" class="form-control" ng-model="option" name="option"></textarea>
                             

                           
                          </div>
                       <!--   <div id="education-details-container" >
                            <div class="row education-details-row col-md-6" style="align-items: center" ng-repeat="educationDetail in educationDetails">
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Name of Institute" ng-model="educationDetail.institute_name">
                                </div>
                                <div class="col-sm-3">
                                    <a class="btn btn-danger delete-education" style="margin: 5px; padding: 0.375rem 0.89rem;" ng-click="deleteEducationRow($index)">-</a>
                                </div>
                            </div>
                            <div class="col-sm-3">
                              <a class="btn btn-primary add-education-row" style="margin: 5px; padding: 0.375rem 0.89rem;" ng-click="addEducationRow()">+</a>
                          </div>

                        </div>     -->
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
                          <th>Detailed Reason Options</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData" ng-if="name.name">
                          <td>{{ name.no }}</td>
                          <td>{{ name.name }}</td>
                          <td>{{ name.option }}</td>
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
    $(document).ready(function() {
    // Maximum number of rows allowed
    var maxRows = 3;
    // var i = {{ isset($employee->additionalInformation->education) ? count($employee->additionalInformation->education) - 1 : 0 }};
    var i =  0;

// Add new education detail
$(document).on("click", ".add-education-row", function() {
    ++i;
    var rowCount = $(".education-details-row").length;
    if (rowCount < maxRows) {
        var new_education_detail = `
            <div class="row education-details-row col-md-6" style= "align-items: center">
                <div class="col-sm-3">
                    <input type="text" class="form-control" placeholder="Name of Institute" name="education_detail[${i}][institute_name]">
                </div>
                <div class="col-sm-3">
                    <a class="btn btn-danger delete-education" style="margin: 5px; padding: 0.375rem 0.89rem;">-</a>
                </div>
            </div>
        `;
        $("#education-details-container").append(new_education_detail);
    }
});

// Delete the education details row
$(document).on("click", ".delete-education", function() {
                var rowCount = $(".education-details-row").length;
                if (rowCount > 1) {
                    // Find the parent row and remove it
                    $(this).closest(".education-details-row").remove();
                }
            });
    });
</script>
  <script>
    var app = angular.module('crudApp', ['datatables']);
    app.controller('crudController', function ($scope, $http) {

      $scope.success = false;
      $scope.error = false;

      // // Initialize an empty array to store education details
      // $scope.educationDetails = [];

      // // Function to add a new education detail row
      // $scope.addEducationRow = function () {
      //     $scope.educationDetails.push({});
      // };

      // // Function to delete an education detail row
      // $scope.deleteEducationRow = function (index) {
      //     $scope.educationDetails.splice(index, 1);
      // };

      $scope.submit_button = 'Add';


      $scope.fetchData = function () {
        $scope.submit_button = 'Add';
        $http.get('<?php echo base_url() ?>index.php/master/fetch_data?tablename=standard_reason_master&togglename="standard_reason"')
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
            'option':$scope.option,
            'tablename': 'standard_reason_master'
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
            'tablename': 'standard_reason_master'
          }
        }).success(function (data) {
          $scope.name = data.name;
          $scope.hidden_id = id;
          $scope.option = data.option;
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
              'tablename': 'standard_reason_master'
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
                data:{'label':'standard_reason', 'value':$scope.toggleValue}
                }).success(function(data){
                    
                });
            };


    });
  </script>
  <?php include ('footer.php'); ?>
</body>
