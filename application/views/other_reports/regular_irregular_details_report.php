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
     .tbody-tr:hover{
        background-color: #cfcfcf4e;
        transition: all 0.2s;
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
                                <h4 class="mb-sm-0 font-size-18"></h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Sale Regular Irregular Details Report</li>
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
                                            <h4 class="mb-sm-0 font-size-18">Sale Regular Irregular Details Report (<span id="salesPerson"></span>)</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <form>
                                            <div class="row">



                                                

                                                <div class="col">
                                                    <input type="date" class="form-control" id="from-date" value="<?=$_GET['formdate']?>">
                                                </div>
                                                <div class="col">
                                                    <input type="date" class="form-control" id="to-date" min="<?php echo date('2023-10-01'); ?>" value="<?=$_GET['todate']?>">
                                                </div>

                                                <div class="col">

                                                <?php $selectedValue = isset($_GET['regular_filter']) ? $_GET['regular_filter'] : ''; ?>

                                                <select data-section="21" class="form-control checkallbox regular_filter ng-pristine ng-valid ng-touched" name="regular_filter" id="regular_filter" ng-model="regular_filter">
                                                    <option value="" <?= $selectedValue === '' ? 'selected' : '' ?>>Select Regular or Irregular</option>
                                                    <option value="ALL" <?= $selectedValue === 'ALL' ? 'selected' : '' ?>>ALL</option>
                                                    <option value="YES" <?= $selectedValue === 'YES' ? 'selected' : '' ?>>YES</option>
                                                    <option value="NO" <?= $selectedValue === 'NO' ? 'selected' : '' ?>>NO</option>
                                                    <option value="NULL" <?= $selectedValue === 'NULL' ? 'selected' : '' ?>>NULL</option>
                                                </select>


                                                    
                                                </div>


                                                <div class="col">
                                                    <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>

                                                    <button ng-click="fetchSalesProductReportDataExport()" type="button" class="btn btn-success waves-effect waves-light" id="exportdata"  >Export</button>
                                                </div>
                                                <div class="col" style="align-self: center;justify-self: auto;display: flex;justify-content: flex-end;">
    <div class="form-check form-switch">
  <input class="form-check-input" ng-click="search()" style="width: 45px;margin-left: -2.5em;height: 25px;" type="checkbox" role="switch"  id="filterStatus">
  &nbsp<label class="form-check-label  mt-2" for="filterStatus">Show Zero Sales Customers</label>
</div>
                                                    </div> 

                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <hr>



                                <div class="row" id="brandTable">
                                    <div class="col-12">
                                        <div class="row">

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card shadow-none">
                                                    <div class="card-body">

                                                        <div class="table-responsive table-container" style="height: 700px;" ng-init="fetchSalesProductReportData(0,0)">
                                                            <table class="main" style="width:100%">
                                                                <!-- tHead -->
                                                                <thead style="position: sticky;top: 0px;">
                                                                    <tr>
                                                                        <th>S.no</th>
                                                                        <th  style="width:30%">Customer Name</th>
                                                                       <!-- gg changes for regular irregular task -->
                                                                       <th  style="width:10%">Regular or Irregular</th>
                                                                        <th style="width:10%;">Regular Sales</th>
                                                                        <th style="width:10%;">Irregular Sales</th>
                                                                        <th style="width:10%;">Not Filled Sales</th>
                                                                        <th style="width:10%;">Regular Returns</th>
                                                                        <th style="width:10%;">Irregular Returns</th>
                                                                        <th style="width:10%;">Not Filled Returns</th>
                                                                        <th style="width:10%;">Net Sales</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="3">Total</th>
                                                                        <th>{{regular_customers_bill ? (regular_customers_bill | number) : 0}}</th>
                                                                        <th>{{irregular_customers_bill ? (irregular_customers_bill | number) : 0}}</th>
                                                                        <th>{{not_filled_customers_bill ? (not_filled_customers_bill | number) : 0}}</th>
                                                                        <th>{{regular_customers_return ? (regular_customers_return | number) : 0}}</th>
                                                                        <th>{{irregular_customers_return ? (irregular_customers_return | number) : 0}}</th>
                                                                        <th>{{not_filled_customers_return ? (not_filled_customers_return | number) : 0}}</th>
                                                                        <th>{{net_sales ? (net_sales | number) : 0}}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="tbody-tr" ng-repeat="(index, row) in salesData">
                                                                        <td>{{index + 1}}</td>
                                                                        <!-- <td class="cursor-pointer" ng-click="viewSalePerson(row.area)">{{row.name ? row.name : 'No Name'}} </td> -->
                                                                        <td   class="text-start cursor-pointer" ng-click="viewCustomer(row.customer_id)">{{row.name}}</td>
                                                                        <td class="text-end">{{row.regular ? (row.regular ) : 'NULL'}}</td>

                                                                       
                                                                        <td class="text-end">{{row.regular_customers_bill ? (row.regular_customers_bill | number) : 0}}</td>
                                                                        <td class="text-end">{{row.irregular_customers_bill ? (row.irregular_customers_bill | number) : 0}}</td>
                                                                         <td class="text-end">{{row.not_filled_customers_bill ? (row.not_filled_customers_bill | number) : 0}}</td>
                                                                        <td class="text-end">{{row.regular_customers_return ? (row.regular_customers_return | number) : 0}}</td>
                                                                        <td class="text-end">{{row.irregular_customers_return ? (row.irregular_customers_return | number) : 0}}</td>
                                                                         <td class="text-end">{{row.not_filled_customers_return ? (row.not_filled_customers_return | number) : 0}}</td>
                                                                        <td class="text-end">{{row.net_sales ? (row.net_sales | number) : 0}}</td>
                                                                    </tr>

                                                                    <tr ng-if="salesData.length == 0">
                                                                        <td colspan="9" class="text-center">No results</td>
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
                $scope.fetchSalesProductReportData();
            };

 

            $scope.fetchSalesProductReportDataExport = function() {
                var getJson = function(b) {
                    var result = $.fn.filterMultiSelect.applied.map((e) => JSON.parse(e.getSelectedOptionsAsJson(b)));
                    if (result.length > 0) {
                        result.reduce((prev, curr) => {
                            prev = {
                                ...prev,
                                ...curr,
                            };
                            return prev;
                        });
                        return result;
                    } else {
                        let res;
                        res = [{
                            'states[]': ['All']
                        }];
                        return res;
                    }

                }
                // $('.setload').show();
                $scope.loading = true;
                var filterStatus = $('#filterStatus').is(':checked');

                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var sales_person = '<?=$_GET['sales_person']?>';

                 // GG CHANGES FOR SCOPE TASK 
                 var regular_filter = $('#regular_filter').val();

                 let url = '<?php echo base_url() ?>index.php/other_reports/fetch_data_regular_irregular_details_report_export?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&sales_person=' + sales_person+'&filterStatus=' + filterStatus+'&regular_filter='+regular_filter;
                 window.location = url;
            }

            $scope.viewCustomer = function(customer_id){
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                let url = '<?php echo base_url() ?>index.php/other_reports/regular_irregular_orders_report?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&customer_id=' + customer_id;
                // console.log("url",url);
                window.open(url,'_blank');
            }

            $scope.fetchSalesProductReportData = function() {
                var getJson = function(b) {
                    var result = $.fn.filterMultiSelect.applied.map((e) => JSON.parse(e.getSelectedOptionsAsJson(b)));
                    if (result.length > 0) {
                        result.reduce((prev, curr) => {
                            prev = {
                                ...prev,
                                ...curr,
                            };
                            return prev;
                        });
                        return result;
                    } else {
                        let res;
                        res = [{
                            'states[]': ['All']
                        }];
                        return res;
                    }

                }
                // $('.setload').show();
                $scope.loading = true;

                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var sales_person = '<?=$_GET['sales_person']?>';
                var filterStatus = $('#filterStatus').is(':checked');

                var regular_filter= $('#regular_filter').val();

                $http.get('<?php echo base_url() ?>index.php/other_reports/fetch_data_regular_irregular_details_report?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&sales_person=' + sales_person+'&filterStatus=' + filterStatus +'&regular_filter='+regular_filter).success(function(data) {
                    // $('tbody[data-sales-id]').html('');
                    // $('tbody').last().html('');
                    $scope.query = {}
                    $scope.queryBy = '$';
                    $scope.salesData = data['data'];
                    $('span#salesPerson').html($scope.salesData[0]['sales_name']);
                    Object.keys(data['totals']).map((el) => {
                    // $scope['customers'] = salesData.length;

                        $scope[el] = Math.round(data['totals'][el] * Math.pow(10, 2)) / Math.pow(10, 2);
                    })
                    $scope['customers'] = $scope['regular_customers'] + $scope.irregular_customers + $scope.not_filled_customers;

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