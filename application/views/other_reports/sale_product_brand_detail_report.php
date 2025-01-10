<?php include "header.php"; ?>



<style>
    .trpoint {

        cursor: pointer;

    }

    .trpoint:hover {
        background: antiquewhite;
    }

    .card-header {
        display: block;
        text-align: center;
    }

    td {
        display: table-cell;
        border: 1px solid #e0e0e0;
        padding: 0px 4.5px;
        line-height: 2.428571;
        margin-left: 0px;
        vertical-align: middle;
        font-size: 15px;
        /* text-align: center; */
        /* height: 50px; */
    }


    .loading {
        text-align: center;
    }


    .filter-multi-select .dropdown-item .custom-checkbox:checked~.custom-control-label::after {
        background-color: #ff5e14 !important;
    }

    .filter-multi-select>.viewbar>.selected-items>.item {
        background-color: cadetblue;
    }

    .placeholder {
        /* display: inline-block; */
        /* min-height: 1em; */
        /* vertical-align: middle; */
        /* cursor: wait; */
        background-color: #fff !important;
        opacity: .5;
        cursor: pointer !important;
    }

    th {
        color: #000;
        height: 50px;
        font-weight: 500;
        font-size: 14px;
        background-color: #f2f2f2;
        text-align: center;
        /* border: 1px solid #ffffff; */
        /* backdrop-filter: blur(3px) brightness(0.5); */
        /* width: 80px; */
        /* backdrop-filter: blur(2px) brightness(1); */
        vertical-align: middle;
    }

    th.totals {
        display: table-cell;
        border: 1px solid #e0e0e0;
        padding: 0px 4.5px;
        line-height: 2;
        margin-left: 0px;
        vertical-align: middle;
        font-size: 11px;
        text-align: center;
        /* height: 50px;*/
    }

    .choices__list--dropdown {
        /* visibility: hidden; */
        z-index: 5 !important;
    }

    td input[type="text"] {
        position: inherit !important;
        text-align: right !important;
        border: 1px solid !important;
        /* width: 100%; */
        left: 0;
        height: 100%;
        float: right;
    }

    th.popup {
        font-size: 12px !important;
    }

    body::-webkit-scrollbar,
    div::-webkit-scrollbar {
        width: 0.2em;
        height: 1.4em !important;
    }
       tbody tr:hover {
  background-color: #cfcfcf4e;
  transition: all 0.2s;
}
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
        <?php echo $top_nav; 

        $testMode = (isset($_GET['test']) && $_GET['test']);


        ?>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18"></h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Sale Product Brand Detail Report</li>
                                    </ol>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="container-fluid">

                                <div class="row" style="margin: 13px 0px;">
                                    <div class="col-6 mb-2">
                                        <div class="page-title-box d-sm-flex align-items-center justify-content-between p-0">
                                            <h4 class="mb-sm-0 font-size-18">Sale Product Brand Detail Report (<?=$_GET['sales_brand']?> - <?=$_GET['category']?>)  <?=$testMode ? '- (Order Detailed View)' : ''?></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <form>
                                            <div class="row">



                                                <div class="col">
                                                <label class="col-sm-12 col-form-label">From Date</label>
                                                    <input type="date" class="form-control" id="from-date" value="<?php echo $_GET['formdate'] != '' ? $_GET['formdate'] : date('Y-m-d'); ?>">
                                                </div>
                                                <div class="col">
                                                <label class="col-sm-12 col-form-label">To Date</label>
                                                    <input type="date" class="form-control" id="to-date" min="<?php echo date('2023-07-01'); ?>" value="<?php echo $_GET['todate'] != '' ? $_GET['todate'] : date('Y-m-d'); ?>">
                                                </div>
                                                <div class="col-md-2">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label">UOM</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="uom" id="uom">
                                  <option value="" selected>All</option>
                                  <?php
                                  foreach ($uom as $value) {
                                  ?>
                                    <option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          

                          <div class="col-md-2">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label">Material type</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="material_type" id="material_type">
                                  <option value="">All </option>
                                  <?php
                                  function sortByOption($a, $b)
                                  {
                                    return strcmp($a['option'], $b['option']);
                                  }

                                  $matTypes = $material_type->result_array();
                                  usort($matTypes, 'sortByOption');

                                  $uniqueMatTypes = [];
                                  $seenOptions = [];

                                  foreach ($matTypes as $type) {
                                    if (!in_array($type['option'], $seenOptions)) {
                                      $uniqueMatTypes[] = $type;
                                      $seenOptions[] = $type['option'];
                                    }
                                  }

                                  foreach ($uniqueMatTypes as $row) {
                                    if ($row['option'] !== '') {
                                  ?>
                                      <option value="<?php echo $row['option']; ?>"><?php echo $row['option']; ?></option>
                                  <?php
                                    }
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label">Color</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="color" id="color">
                                  <option value="">All </option>
                                  <?php

                                  function sortByName($a, $b)
                                  {
                                    return strcmp($a->name, $b->name);
                                  }
                                  usort($color, 'sortByName');


                                  foreach ($color as $value) {

                                  ?>
                                    <option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                                  <?php

                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>


                          <div class="col-md-2">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label">Thickness</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="thickness" id="thickness">
                                  <option value="">All </option>
                                  <?php

                                  usort($thickness, 'sortByName');


                                  foreach ($thickness as $value) {

                                  ?>
                                    <option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                                  <?php

                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label">Coating mass</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="gsm" id="gsm">
                                  <option value="">All </option>
                                  <?php
                                  foreach ($gsm as $value) {

                                  ?>
                                    <option value="<?= preg_replace("/[^0-9]/", "", $value->name) ?>"><?php echo $value->name; ?></option>
                                  <?php

                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label">Yield strength</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="ys" id="ys">
                                  <option value="">All </option>
                                  <?php
                                  foreach ($ys as $value) {

                                  ?>
                                    <option value="<?php echo str_replace("YS ", '', str_replace("MPA", '', $value->name)); ?>"><?php echo $value->name; ?></option>
                                  <?php

                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          
                                                <div class="col text-end" style="align-self: self-end;">
                                                    <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>

                                                    <button type="button" ng-click="fetchSalesProductReportDataExport()" class="btn btn-success waves-effect waves-light" id="exportdata">Export</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <hr>



                                <div class="row" id="brandDetailsTable">
                                    <div class="col-12">
                                        <div class="row">

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card shadow-none">
                                                    <div class="card-body">

                                                        <div class="table-responsive table-container" style="height: 700px;" ng-init="fetchSalesProductDetailReportData(0,0)">
                                                            <table class="main" style="width:100%">
                                                                <!-- tHead -->
                                                                <thead style="position: sticky;top: 0px;">
                                                                    <tr>
                                                                        <th>S.no</th>
                                                                        <th>Product Name</th>
                                                                        <th>Order No</th>
                                                                        <th>Sale Qty</th>
                                                                        <th>Sale Value</th>
                                                                        <th>Return Qty</th>
                                                                        <th>Return Value</th>
                                                                        <th>Net Sale Qty</th>
                                                                        <th>Net Sale Value</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="3">Total</th>
                                                                        <th>{{brand_qty ? (brand_qty | number) : 0}}</th>
                                                                        <th>{{brand_value ? (brand_value | number) : 0}}</th>
                                                                        <th>{{brand_ret_qty ? (brand_ret_qty | number) : 0}}</th>
                                                                        <th>{{brand_ret_value ? (brand_ret_value | number) : 0}}</th>
                                                                        <th>{{brand_actual_qty ? (brand_actual_qty | number) : 0}}</th>
                                                                        <th>{{brand_actual_value ? (brand_actual_value | number) : 0}}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr ng-repeat="(index, row) in salesDataDetail">
                                                                        <td>{{index + 1}}</td>
                                                                        <td class="text-start">{{row.product_name ? row.product_name : 'No Name'}}</td>
                                                                        <td ng-click="viewOrder(row.order_id)" class="text-end cursor-pointer">{{row.order_no}}</td>
                                                                        <td class="text-end">{{row.qty ? (row.qty | number) : 0}}</td>
                                                                        <td class="text-end">{{row.value ? (row.value | number) : 0}}</td>
                                                                        <td class="text-end">{{row.ret_qty ? (row.ret_qty | number) : 0}}</td>
                                                                        <td class="text-end">{{row.ret_value ? (row.ret_value | number) : 0}}</td>
                                                                        <td class="text-end">{{row.actual_qty ? (row.actual_qty | number) : 0}}</td>
                                                                        <td class="text-end">{{row.actual_value ? (row.actual_value | number) : 0}}</td>
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
                    </div>
                </div>
            </div>
        </div>



    </div>
    <script>
        $(document).ready(() => {


            $('#sales_group_target').on('click', () => {
                $('input.custom-control-input[value=""]').parent().remove();
            })
        })


        var app = angular.module('crudApp', []);

        app.directive("fileInput", function($parse) {
            return {
                link: function($scope, element, attrs) {
                    element.on("change", function(event) {
                        var files = event.target.files;
                        $parse(attrs.fileInput).assign($scope, element[0].files);
                        $scope.$apply();
                    });
                }
            }
        });
        app.directive('loading', function() {
            return {
                restrict: 'E',
                replace: true,
                template: '<div class="loading"><img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" width="20" height="20" /> LOADING...</div>',
                link: function(scope, element, attr) {
                    scope.$watch('loading', function(val) {
                        if (val)
                            $(element).show();
                        else
                            $(element).hide();
                    });
                }
            }
        })




        app.filter('number', function () {
    return function (input) {
        if (!isNaN(input)) {
            if (input != 0 && input != null) {
                if (isNaN(input)) return input;

                var isNegative = false;
                if (input < 0) {
                    isNegative = true;
                    input = Math.abs(input);
                }

                var formattedValue = parseFloat(input);
                var decimal = formattedValue.toLocaleString('en-IN', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                });

                if (isNegative) {
                    decimal = '-' + decimal;
                }

                return decimal;
            } else {
                return '0';
            }
        }
    };
});


        app.controller('crudController', function($scope, $http) {
            $scope.salesData = [];
            $scope.section = 'primary';

            $scope.search = function() {
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();

                $scope.formdate = fromdate;
                $scope.todate = fromto;
                $scope.fetchSalesProductDetailReportData();
            };

           

           $scope.fetchSalesProductReportDataExport = function() {
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var brand = encodeURIComponent('<?= $_GET['sales_brand'] ?>');
                var category = encodeURIComponent('<?= $_GET['category'] ?>');
                var uom = $('#uom').val();

                // Adding additional form data dynamically if available
                var categorie_type = $('#categorie_type').val();
                var material_type = $('#material_type').val();
                var color = $('#color').val();
                var thickness = $('#thickness').val();
                var coating_mass = $('#gsm').val();
                var yield_strength = $('#ys').val();

                 <?php
                    $url_name = $testMode ? 'fetch_data_brand_wise_details_report_export?test=true&':'fetch_data_brand_wise_details_report_export?';
                ?>


                let url = '<?php echo base_url() ?>index.php/other_reports/<?=$url_name?>limit=10&formdate=' + fromdate + '&todate=' + fromto + '&brand=' + brand + '&category=' + category + '&uom=' + uom  +
          '&material_type=' + material_type + '&color=' + color + '&thickness=' + thickness + '&coating_mass=' +
          coating_mass + '&yield_strength=' + yield_strength;
                window.location = url;
            }



            $scope.viewOrder = function(order_id) {
                let order = btoa(order_id);
                let url = '<?php echo base_url() ?>index.php/order/ordercreate_product_process?order_id=' + order;
                window.open(url, '_blank');
            }


            $scope.fetchSalesProductDetailReportData = function(brand) {

                // $('.setload').show();
                $scope.loading = true;
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var brand = encodeURIComponent('<?= $_GET['sales_brand'] ?>');
                var category = encodeURIComponent('<?= $_GET['category'] ?>');
                var uom = $('#uom').val();

                // Add your additional form data dynamically if available
                var categorie_type = $('#categorie_type').val();
                var material_type = $('#material_type').val();
                var color = $('#color').val();
                var thickness = $('#thickness').val();
                var coating_mass = $('#gsm').val();
                var yield_strength = $('#ys').val();

                  <?php
                    $url_name = $testMode ? 'fetch_data_brand_wise_details_report?test=true&':'fetch_data_brand_wise_details_report?';
                ?>


                $http.get('<?php echo base_url() ?>index.php/other_reports/<?= $url_name?>limit=10&formdate=' + fromdate + '&todate=' + fromto + '&brand=' + brand + '&category=' + category + '&uom=' + uom  +
          '&material_type=' + material_type + '&color=' + color + '&thickness=' + thickness + '&coating_mass=' +
          coating_mass + '&yield_strength=' + yield_strength ).success(function(data) {
                    $scope.query = {}
                    $scope.queryBy = '$';
                    $scope.salesDataDetail = data['data'];
                    Object.keys(data['totals']).map((el) => {
                        $scope[el] = Math.round(data['totals'][el] * Math.pow(10, 2)) / Math.pow(10, 2);
                    })

                    function formatNumber(number) {
                        if (number != null) {
                            var result = number.toString().split('.');
                            var lastThree = result[0].substring(result[0].length - 3);
                            var otherNumbers = result[0].substring(0, result[0].length - 3);
                            if (otherNumbers != '')
                                lastThree = ',' + lastThree;
                            var output = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;

                            if (result.length > 1) {
                                output += "." + result[1];
                            }

                            return output;
                        }
                        if (number == null) {
                            return 0;
                        }
                    }
                });
            }
        });
    </script>
    <?php include('footer.php'); ?>
</body>