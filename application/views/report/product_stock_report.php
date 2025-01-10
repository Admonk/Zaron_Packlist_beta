<?php include "header.php"; ?>

<style>
  .loading {
    text-align: center;
  }


  .tableinput {
    width: 100px !important;
    pointer-events: none !important;
    margin-right: 1px !important;
  }

  .form-control {
    display: block !important;
  }
  .scrollable-div {
            height: 100%; /* Set the height of the div */
            overflow-x: auto;
            overflow-y: hidden;
        }
        
        table {
            width: 100%; /* Make the table take full width of the div */
            /* table-layout: fixed; Fix table layout to respect column widths */
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            word-wrap: break-word; /* Ensure content wraps within the cell */
        }
        
        th {
            background-color: #f2f2f2;
        }
        th:nth-child(3), /* Ensure the 3rd column (Product Name) has a fixed width */
        td:nth-child(3) {
            width: 200px !important;
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
                <h4 class="mb-sm-0 font-size-18">Product Stock Report</h4>

                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a
                        href="<?php echo base_url(); ?>index.php/products/productscreate">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Product Stock Report</li>
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


                  <button type="button" style="float: right;margin: 7px 20px;"
                    class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                    data-bs-target=".bs-example-modal-center2">Import Stock</button>
                  <a href="<?php echo base_url(); ?>export_product_stock.php" style="float: right;margin: 7px 20px;"
                    class="btn btn-success waves-effect waves-light">Export Stock</a>


                </div>













                <div class="modal fade bs-example-modal-center2" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Import Stock</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form enctype='multipart/form-data' action="<?php echo base_url(); ?>product_import_stock.php"
                        method="POST">
                        <div class="modal-body">

                          <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">File:</label>
                            <input type="file" class="form-control" required name="file" id="recipient-name">
                          </div>
                          <div class="mb-1">
                            <label for="message-text" class="col-form-label">Export : </label>
                            <a href="<?php echo base_url(); ?>export_product_stock.php">Download</a>
                          </div>



                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="sumnit" class="btn btn-primary">Import</button>
                        </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->










                <div class="modal fade bs-example-modal-center" id="editdata" tabindex="-1" role="dialog"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Stock</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <form ng-submit="submitForm()" method="POST">
                        <div class="modal-body">
                          <h4 id="product_name"></h4>
                          <div class="mb-3">
                            <label for="actual_stock" class="col-form-label">Actual Stock:</label>
                            <input type="text" class="form-control" required name="actual_stock" id="actual_stock">
                          </div>

                          <div class="mb-3">
                            <label for="stock_on_hold" class="col-form-label">Stock On Hold:</label>
                            <input type="text" class="form-control" required name="stock_on_hold" id="stock_on_hold">
                          </div>

                          <div class="mb-3">
                            <label for="stock_production" class="col-form-label">Stock Poduction:</label>
                            <input type="text" class="form-control" required name="stock_production"
                              id="stock_production">
                          </div>

                          <input type="hidden" class="form-control" name="hidden_id" id="hidden_id">
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="sumnit" class="btn btn-primary">Save</button>
                        </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->









                <div class="card-body">

                  <form class="ng-pristine ng-valid">
                    <div class="row">





                      <div class="col">
                        <label>From date</label>
                        <input type="date" class="form-control" id="from-date" value="<?php echo date('Y-m-d'); ?>">
                      </div>
                      <div class="col">
                        <label>To date</label>
                        <input type="date" class="form-control" id="to-date" value="<?php echo date('Y-m-d'); ?>">
                      </div>





                      <div class="col">

                        <button type="button" style="margin: 27px 0px;"
                          class="btn btn-secondary waves-effect waves-light" ng-click="fetchData()">Search</button>



                      </div>

                    </div>
                  </form>



                  <div ng-init="fetchData()">
                    <div class='d-flex justify-content-end mx-4 mb-3'>
                      <input class="form-control" type="text" value="" style="width: 250px;" ng-blur="" id="search">
                    </div>
                    <div  class="scrollable-div">
                      <table id="datatable" class="table table-bordered dt-responsive  " datatable="ng"
                        dt-options="vm.dtOptions">
                        <thead>
                          <tr>


                            <th>ID</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>UOM</th>
                            <th>Opening Stock</th>
                            <!-- <th>Opening value</th> -->
                            <th>Inward &nbsp;&nbsp;</th>
                            <!-- <th>Inward value</th> -->
                            <th>Billed Stock</th>
                            <!-- <th>Billed value</th> -->
                            <th>Return Stock</th>
                            <!-- <th>Return value</th> -->
                            <th>Closing Stock</th>
                            <!-- <th>Closing value</th> -->
                            <th>Stock Hold</th>
                            <!-- <th>Hold value</th> -->
                            <th>Stock Production</th>
                            <!-- <th>Production value</th> -->
                            <th>Weight Formula</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td colspan="10">
                              <loading></loading>
                            </td>
                          </tr>
                          <tr ng-if="namesData.length === 0">
                              <td colspan="12" class="text-center">No data found</td>
                          </tr>
                          <tr ng-repeat="name in namesData" ng-if="name.product_name != ''">


                            <td>{{ (currentPage - 1) * 10 + $index + 1 }}</td>
                            <td>{{ name.categories }}</td>
                            <td>{{ name.product_name }}</td>
                            <td>{{ name.uom }}</td>
                            <td class="splitforvalue">

                              <input class="form-control  tableinput" type="textt" value="{{ name.open_stock }}" readonly
                                style="width: 100px; pointer-events: none;"
                                ng-blur="changeopening_balance('opening_qty',name.id)" id="openstock_{{ name.id }}">



                            </td>
                            <!-- <td>
                              <input class="form-control  tableinput" type="textt" value="{{ name.open_stock_val }}"
                                readonly style="width: 100px; pointer-events: none;"
                                ng-blur="changeopening_balance('opening_qty_val',name.id)"
                                id="openstock_val_{{ name.id }}">
                            </td> -->

                            <td class="splitforvalue">

                              <input class="form-control  tableinput" type="textt" value="{{ name.inward_stock }}"
                                readonly style="width: 100px;  pointer-events: none;"
                                ng-blur="changeopening_balance('inward_qty',name.id)" id="inwardstock_{{ name.id }}">



                            </td>
                            <!-- <td>
                              <input class="form-control  tableinput" type="textt" value="{{ name.inward_stock_val }}"
                                readonly style="width: 100px;  pointer-events: none;"
                                ng-blur="changeopening_balance('inward_qty_val',name.id)" id="inwardstock_{{ name.id }}">
                            </td> -->

                            <td class="splitforvalue">

                              <input class="form-control  tableinput" type="textt" value="{{ name.sales_stock }}" readonly
                                style="width: 100px;  pointer-events: none;" id="inwardtot_{{ name.id }}">

                            </td>

                            <!-- <td>
                              <input class="form-control  tableinput" type="textt" value="{{ name.sales_stock_val }}"
                                readonly style="width: 100px;  pointer-events: none;" id="inwardtot_val_{{ name.id }}">
                            </td> -->
                            <td class="splitforvalue">

                              <input class="form-control  tableinput" type="textt" value="{{ name.return_stock }}"
                                readonly style="width: 100px;  pointer-events: none;" id="return_{{ name.id }}">

                            </td>

                            <!-- <td>
                              <input class="form-control  tableinput" type="textt" value="{{ name.return_stock_val }}"
                                readonly style="width: 100px;  pointer-events: none;" id="return_val_{{ name.id }}">
                            </td> -->



                            <td class="splitforvalue">

                              <input class="form-control  tableinput" type="textt" value="{{ name.stock }}" readonly
                                style="width: 100px; pointer-events: none;"
                                ng-blur="changeopening_balance('stock',name.id)" id="stock_{{ name.id }}">



                            </td>
                            <!-- <td>

                              <input class="form-control  tableinput" type="textt" value="{{ name.current_value }}"
                                readonly style="width: 100px; pointer-events: none;"
                                ng-blur="changeopening_balance('current_value',name.id)" id="current_value_{{ name.id }}">




                            </td> -->
                            <td class="splitforvalue">
                              <input class="form-control  tableinput" type="textt" value="{{ name.optimal_stock }}"
                                readonly style="width: 100px; pointer-events: none;"
                                ng-blur="changeopening_balance('optimal_stock',name.id)" id="optimal_stock_{{ name.id }}">



                            </td>
                            <!-- <td>
                              <input class="form-control  tableinput" type="textt" value="{{ name.optimal_stock_val }}"
                                readonly style="width: 100px; pointer-events: none;"
                                ng-blur="changeopening_balance('optimal_stock_val',name.id)"
                                id="optimal_stock_val_{{ name.id }}">
                            </td> -->
                            <td class="splitforvalue">

                              <input class="form-control  tableinput" type="textt" value="{{ name.production_stock }}"
                                readonly style="width: 100px; pointer-events: none;"
                                ng-blur="changeopening_balance('production_stock',name.id)"
                                id="production_stock_{{ name.id }}">





                            </td>
                            <!-- <td>
                              <input class="form-control  tableinput" type="textt" value="{{ name.production_stock_val }}"
                                readonly style="width: 100px; pointer-events: none;"
                                ng-blur="changeopening_balance('production_stock_val',name.id)"
                                id="production_stock_val_{{ name.id }}">
                            </td> -->

                            <td>

                              <input class="form-control  tableinput" type="textt" value="{{ name.weight }}" readonly
                                style="width: 100px; pointer-events: none;"
                                ng-blur="changeopening_balance('weight',name.id)" id="weight_{{ name.id }}">




                            </td>



                          </tr>


                        </tbody>


                      </table>
                    </div>
                    <tfoot>
                      <div class="d-flex justify-content-end">
                        <button id="prevBtn">Previous</button>
                        <button id="nextBtn">Next</button>
                      </div>
                    </tfoot>
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

    app.directive('loading', function () {
      return {
        restrict: 'E',
        replace: true,
        template: '<div class="loading"><img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" width="20" height="20" /> LOADING...</div>',
        link: function (scope, element, attr) {
          scope.$watch('loading', function (val) {
            if (val)
              $(element).show();
            else
              $(element).hide();
          });
        }
      }
    })
    app.controller('crudController', function ($scope, $http) {
      $scope.currentPage = 1;
      const itemsPerPage = 10; // 
      var searchProduct;
      var countProduct;

      $scope.success = false;
      $scope.error = false;
      document.getElementById("prevBtn").addEventListener("click", function () {
        if ($scope.currentPage > 1) {
          $scope.currentPage--;
          $scope.fetchData();
        }
      });

      document.getElementById("nextBtn").addEventListener("click", function () {

        $scope.currentPage++;
        $scope.fetchData();
      });



      document.getElementById("search").addEventListener("input", function () {
        countProduct = this.value
        if (this.value.length >= 1) {

          $scope.currentPage = 1;
          searchProduct = this.value
          $scope.fetchDataSearch();

        } else {
          searchProduct = null
        }




      });


      $scope.fetchDataSearch = function () {

        $scope.loading = true;
        var from_date = $('#from-date').val();
        var to_date = $('#to-date').val();

          var res = $http.get(
            '<?php echo base_url() ?>index.php/products/fetch_data_report_product_new?filterStatus=1&from_date=' +
            from_date + '&to_date=' + to_date + '&&page=' + $scope.currentPage + "&product=" +
            encodeURIComponent(searchProduct))

            res.success(function (data) {
              console.log(data);
              if (data != null) {
                $scope.namesData = data;
              } else {
                $scope.namesData = [];
              }
              $scope.loading = false;
            });
        };

      $scope.fetchData =

        function () {

          $scope.loading = true;
          var from_date = $('#from-date').val();
          var to_date = $('#to-date').val();

          if (countProduct != null && countProduct.length >= 1) {


            var res = $http.get(
              '<?php echo base_url() ?>index.php/products/fetch_data_report_product_new?filterStatus=1&from_date=' +
              from_date + '&to_date=' + to_date + '&&page=' + $scope.currentPage + "&product=" +
              encodeURIComponent(searchProduct))
          } else {
            searchProduct = null
            var res = $http.get(
              '<?php echo base_url() ?>index.php/products/fetch_data_report_product_new?filterStatus=1&from_date=' +
              from_date + '&to_date=' + to_date + '&&page=' + $scope.currentPage)
          }

          //  var res= $http.get('<?php echo base_url() ?>index.php/products/fetch_data_report_product?filterStatus=1&&page='+ $scope.currentPage)

          res.success(function (data) {
            console.log(data);
            if (data != null) {
              $scope.namesData = data;
            } else {
              $scope.namesData = [];
            }
            $scope.loading = false;
          });
        };


      // $scope.fetchData = function() {
      //   $scope.loading = true;
      //   $http({
      //     method: "POST",
      //     url: "<?php echo base_url() ?>index.php/products/fetch_data",
      //     data: {
      //       'filterStatus': '1'
      //     }
      //   }).success(function(data) {
      //     $scope.namesData = data;
      //     $scope.loading = false;

      //   });
      // };

      $scope.viewEdit = function (id) {




        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/products/fetch_single_data",
          data: {
            'id': id,
            'action': 'fetch_single_data',
            'tablename': 'product_list'
          }
        }).success(function (data) {



          $('#product_name').html(data.product_name);

          $('#actual_stock').val(data.stock);
          $('#hidden_id').val(data.id);
          $('#stock_on_hold').val(data.optimal_stock);
          $('#stock_production').val(data.production_stock);




        });












      };



      $scope.submitForm = function () {

        var actual_stock = $('#actual_stock').val();
        var hidden_id = $('#hidden_id').val();
        var stock_on_hold = $('#stock_on_hold').val();
        var stock_production = $('#stock_production').val();



        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/products/insertandupdate",
          data: {
            'actual_stock': actual_stock,
            'stock_on_hold': stock_on_hold,
            'stock_production': stock_production,
            'id': hidden_id,
            'action': 'updatestock',
            'tablename': 'product_list'
          }
        }).success(function (data) {


          if (data.error != '1') {

            $('#editdata').modal('toggle');
            alert('Updated');

            $scope.fetchData();

          }



        });
      };




      $scope.deleteData = function (id) {
        if (confirm("Are you sure you want to remove it?")) {
          $http({
            method: "POST",
            url: "<?php echo base_url() ?>index.php/products/insertandupdate",
            data: {
              'id': id,
              'action': 'Delete',
              'tablename': 'product_list'
            }
          }).success(function (data) {
            $scope.success = false;
            $scope.error = false;
            $scope.fetchData();
          });
        }
      };



      $scope.changeopening_balance = function (name, id) {




        var open_stock = $('#openstock_' + id).val();
        var actual_stock = $('#stock_' + id).val();
        var stock_on_hold = $('#optimal_stock_' + id).val();
        var stock_production = $('#production_stock_' + id).val();
        var current_value = $('#current_value_' + id).val();
        var weight = $('#weight_' + id).val();



        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/products/insertandupdate",
          data: {
            'open_stock': open_stock,
            'actual_stock': actual_stock,
            'stock_on_hold': stock_on_hold,
            'weight': weight,
            'current_value': current_value,
            'stock_production': stock_production,
            'id': id,
            'action': 'updatestock',
            'tablename': 'product_list'
          }
        }).success(function (data) {
          $scope.success = false;
          $scope.error = false;
          $scope.fetchData();
        });

        keepGoing = false;

      };



    });
  </script>
  <?php include('footer.php'); ?>
</body>