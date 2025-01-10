<?php
include "table_header.php";
date_default_timezone_set("Asia/Kolkata");
?>
<style type="text/css">
  div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
  }

  table.table.align-middle.table-nowrap.newBorderedTable {
    font-size: 11px;
  }
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

  <div id="layout-wrapper">
    <?php echo $top_nav; ?>












    <div class="main-content">
      <div class="page-content">
        <div class="container-fluid">


          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-m-12">
                  <div class="card mb-1">
                    <div class="card-header align-items-start d-flex p-3">
                      <div class="flex-shrink-0">
                        <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('orders')">





                          <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders','today_total','today')">
                              <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                              <span class="d-none d-sm-block">Today Total <span class="badge rounded-pill bg-danger  float-end"> {{today_total}} </span></span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders','today_convert','today')">
                              <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                              <span class="d-none d-sm-block"> Converted <span class="badge rounded-pill bg-danger  float-end"> {{today_converted}} </span></span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders','old_convert','today')">
                              <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                              <span class="d-none d-sm-block"> Old Converted <span class="badge rounded-pill bg-danger  float-end"> {{today_old_convert}} </span></span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders','today_bills','today')">
                              <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                              <span class="d-none d-sm-block"> Bills <span class="badge rounded-pill bg-danger  float-end"> {{today_bills}} </span></span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders','pending','today')">
                              <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                              <span class="d-none d-sm-block"> Pending <span class="badge rounded-pill bg-danger  float-end"> {{today_pending}} </span></span>
                            </a>
                          </li>


                          <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders','pending_missing','today')">
                              <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                              <span class="d-none d-sm-block">Old Pending Missing <span class="badge rounded-pill bg-danger  float-end"> {{today_pending_missing}} </span></span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders','missing','today')">
                              <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                              <span class="d-none d-sm-block"> Missing <span class="badge rounded-pill bg-danger  float-end"> {{today_missing}} </span></span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders','pending_cancel','today')">
                              <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                              <span class="d-none d-sm-block">Old Pending Cancel <span class="badge rounded-pill bg-danger  float-end"> {{today_pending_cancel}} </span></span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders','old_cancel','today')">
                              <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                              <span class="d-none d-sm-block">Order Cancel <span class="badge rounded-pill bg-danger  float-end"> {{today_order_cancel}} </span></span>
                            </a>
                          </li>

                        </ul>



                      </div>
                    </div>
                    <!-- end card header -->
                    <!-- end card-body -->
                  </div>
                </div>
              </div>
              <div class="row">

                <div class="col-12">
                  <div class="card shadow-none">
                    <div class="card-body">




                      <!--datatable="ng" dt-options="vm.dtOptions"-->
                      <input type="hidden" id="nextnumber" value="0">
                      <input type="hidden" id="prenumber" value="10">
                      <input type="hidden" id="pageSize" value="10">
                      <input type="hidden" id="order_base" value="0">



                      <div class="row" style="margin-bottom: 10px;">
                        
                        <div class="col-sm-3">
                          <label>For Date: </label><input type="date" class="form-control" id="from_date" ng-model="from_date" ng-change="DateFilter()">
                        </div>

                        <div class="col-sm-3">
                            <label>Sales :</label>
                            <select class="form-control" name="sales_team" id="sales_team" ng-model="sales_team" ng-change="DateFilter()" >
                                                            <option selected value="ALL">All Sales Team</option>
                                                            <?php
                                                            foreach ($sales_team as $val) {
                                                            ?>
                                                                <option value="<?php echo $val->id; ?>">
                                                                    <?php echo $val->name; ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                             </div>
                        
                      </div>


                      <h4>Enquiries - {{enq_count}}</h4>
                      <div class="table-responsive"  style="max-height: 500px;">





                        <table class="table align-middle table-nowrap newBorderedTable">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Enquiry No</th>
                              <?php
                              if ($this->session->userdata['logged_in']['access'] != '12') {
                              ?>
                                <th>Enquiry By</th>
                              <?php
                              }
                              ?>
                              <th>Enquiry Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr ng-repeat="name in namesDataEnquiries">
                              <td>
                                <div class="form-check font-size-16">
                                  <input class="form-check-input" type="checkbox" id="customerlistcheck01">
                                  <label class="form-check-label" for="customerlistcheck01"></label>
                                </div>
                              </td>
                              <td>
                                <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.order_no}}</a>
                              </td>
                              <?php
                              if ($this->session->userdata['logged_in']['access'] != '12') {
                              ?>
                                <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.order_by}}</a></td>
                              <?php
                              }
                              ?>
                              <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.create_date}} {{name.create_time}}</a></td>
                            </tr>
                            <tr ng-show="namesData.length==0">
                              <td style="text-align: center;" colspan="11">No Data Found..</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>








                    </div>

                    <div class="card-body">





                      <h4>Quotations - {{quot_count}}</h4>
                      <div class="table-responsive" style="max-height: 500px;">
                        <table class="table align-middle table-nowrap newBorderedTable">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Enquiry No</th>
                              <?php
                              if ($this->session->userdata['logged_in']['access'] != '12') {
                              ?>
                                <th>Enquiry By</th>
                              <?php
                              }
                              ?>
                              <th>Quotation Date</th>
                            </tr>
                          </thead>
                          <tbody>


                            <tr ng-repeat="name in namesDataQuotations">
                              <td>
                                <div class="form-check font-size-16">
                                  <input class="form-check-input" type="checkbox" id="customerlistcheck01">
                                  <label class="form-check-label" for="customerlistcheck01"></label>
                                </div>
                              </td>


                              <td>


                                <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.order_no}}</a>



                              </td>



                              <?php
                              if ($this->session->userdata['logged_in']['access'] != '12') {
                              ?>



                                <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.order_by}}</a></td>


                              <?php

                              }

                              ?>

                              <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.create_date}} {{name.create_time}}</a></td>
                            </tr>
                            <tr ng-show="namesData.length==0">
                              <td style="text-align: center;" colspan="11">No Data Found..</td>
                            </tr>

                          </tbody>
                        </table>
                      </div>








                    </div>

                    <div class="card-body">





                      <h4>Orders - {{order_count}}</h4>
                      <div class="table-responsive"  style="max-height: 500px;">
                        <table class="table align-middle table-nowrap newBorderedTable">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Enquiry No</th>
                              <?php
                              if ($this->session->userdata['logged_in']['access'] != '12') {
                              ?>
                                <th>Enquiry By</th>
                              <?php
                              }
                              ?>
                              <th>Enquiry Date</th>
                              <th>Quotation Date</th>
                              <th>Order Date</th>
                            </tr>
                          </thead>
                          <tbody>


                            <tr ng-repeat="name in namesDataOrders">
                              <td>
                                <div class="form-check font-size-16">
                                  <input class="form-check-input" type="checkbox" id="customerlistcheck01">
                                  <label class="form-check-label" for="customerlistcheck01"></label>
                                </div>
                              </td>


                              <td>


                                <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.order_no}}</a>



                              </td>


                              <?php
                              if ($this->session->userdata['logged_in']['access'] != '12') {
                              ?>



                                <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.order_by}}</a></td>


                              <?php

                              }

                              ?>

                              <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.enquiry_date}} {{name.enquiry_time}}</a></td>
                              <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.quotation_date}} {{name.quotation_time}}</a></td>
                              <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.create_date}} {{name.create_time}}</a></td>
                            </tr>
                            <tr ng-show="namesData.length==0">
                              <td style="text-align: center;" colspan="11">No Data Found..</td>
                            </tr>

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
      </div>
      <!-- End Page-content -->
    </div>









  </div>





  <script>
    var app = angular.module('crudApp', ['datatables']);
    app.controller('crudController', function($scope, $http) {

      $scope.success = false;
      $scope.error = false;





      $scope.currentPage = 1;
      $scope.totalItems = 0;
      $scope.pageSize = 10;
      $scope.searchText = '';

      $scope.tablename = 'orders';
      getData();



      function getData(type = '') {

        var order_base = $('#order_base').val();
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        var sl = $('#sales_team').val();
        if(isNaN(sl)){
          sl = 'All';
        }
        $http.get('<?php echo base_url() ?>index.php/order_check/fetch_data_table_new?order_base=' + order_base + '&from_date=' + from_date + '&sales_team=' + sl )
          .success(function(data) {
            console.log('data', data);
            $scope.namesDataEnquiries = data.enquiries;
            $scope.namesDataQuotations = data.quotations;
            $scope.namesDataOrders = data.orders;
            $scope.enq_count = data.enq_count;
            $scope.quot_count = data.quot_count;
            $scope.order_count = data.order_count;
            // $scope.totalItems = data.totalCount;
          });


      }

      $('#choices-single-default').on('change', () => {
        getData();
      })







      $scope.pageChanged = function() {
        getData();
      }
      $scope.pageSizeChanged = function() {

        $scope.currentPage = 1;

        $('#pageSize').val($scope.pageSize);

        getData();



      }
      $scope.searchTextChanged = function() {
        $scope.currentPage = 1;
        getData();
      }







      $scope.pageTab = function(tabelename, status, type) {


        $('#order_base').val(status);
        $scope.currentPage = 1;
        getData(type);
        $scope.getcount(tabelename, type);


      };



      $scope.onNext = function(currentPage, pageSize) {


        var nextnumber = parseInt($('#nextnumber').val());
        var pageSize = parseInt($('#pageSize').val());

        var currentPage = nextnumber + pageSize;

        $('#nextnumber').val(currentPage);
        $('#prenumber').val(currentPage);

        getDataPage(currentPage, pageSize);


      };



      $scope.onPre = function(currentPage, pageSize) {


        var nextnumber = parseInt($('#prenumber').val());
        var pageSize = parseInt($('#pageSize').val());
        var currentPage = nextnumber - pageSize;

        $('#prenumber').val(currentPage);
        $('#nextnumber').val(currentPage);
        getDataPage(currentPage, pageSize);


      };





     





















      $scope.deleteData = function(id) {
        if (confirm("Are you sure you want to remove it?")) {
          $http({
            method: "POST",
            url: "<?php echo base_url() ?>index.php/order/insertandupdate",
            data: {
              'id': id,
              'action': 'Delete',
              'tablename': 'orders'
            }
          }).success(function(data) {
            $scope.success = false;
            $scope.error = false;
            getData();
          });
        }
      };

      $scope.cancelData = function(id) {
        if (confirm("Are you sure you want to Cancel it?")) {
          $http({
            method: "POST",
            url: "<?php echo base_url() ?>index.php/order/insertandupdate",
            data: {
              'id': id,
              'action': 'Cancel',
              'tablenamemain': 'orders'
            }
          }).success(function(data) {
            $scope.success = false;
            $scope.error = false;
            getData();
          });
        }
      };

      $scope.DateFilter = function() {

        getData();
        $scope.getcount();
      };




      $scope.getcount = function(tabelename, type = '') {

        // var from_date = $('#from_date').val();
        var from_date = $('#from_date').val();
        var sl = $('#sales_team').val();
        if(isNaN(sl)){
          sl = 'All';
        }

        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/order_check/getcount_list_new?tablename=" + tabelename + '&from_date=' + from_date + '&sales_team=' + sl ,
          
        }).success(function(data) {

          Object.keys(data).forEach((el) => {
            $scope[el] = data[el];
          })

        });



      }




    });
  </script>



  <?php include('table_footer.php'); ?>
</body>