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
    thead tr:nth-child(2) th {
      background-color: lightgray;
      color: black;
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
                                        <li class="breadcrumb-item active">Sale Regular Irregular Report</li>
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
                                            <h4 class="mb-sm-0 font-size-18">Sale Regular Irregular Report</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <form>
                                            <div class="row">



                                                <div class="col">
                                                    <select class="filter-multi-select" name="states[]" multiple="multiple" id="sales_group_target">
                                                        <option value="All">All</option>
                                                        <?php
                                                        function sortByName($a, $b)
                                                        {
                                                            return strcmp($a->name, $b->name);
                                                        }
                                                        usort($customers, 'sortByName');


                                                        foreach ($customers as $val) {
                                                        ?>
                                                            <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
 <div class="col" style="align-self: end;">

                                                        <div class="form-check">
                                                            <input type="checkbox" name="status" id="filterStatus" class="primary" ng-click="fetchSalesProductReportData()">
                                                            <label class="control-label" for="filterStatus">Show Inactive</label>

                                                        </div>

                                                    </div>
                                                <div class="col">
                                                    <input type="date" class="form-control" id="from-date" value="<?php echo date('Y-m-01'); ?>">
                                                </div>
                                                <div class="col">
                                                    <input type="date" class="form-control" id="to-date" min="<?php echo date('2023-07-01'); ?>" value="<?php echo date('Y-m-d'); ?>">
                                                </div>

                                                <div class="col">
                                                    <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>

                                                    <button   ng-click="fetchSalesProductReportDataExport()" type="button" class="btn btn-success waves-effect waves-light" id="exportdata">Export</button>
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
                                                                        <th style="width: 4%;">S.no</th>
                                                                        <th>Salesman</th>
                                                                        <th>Overall Customers</th>
                                                                        <th>Billed Customers</th>
                                                                        <!-- <th>New Customers</th> -->
                                                                        <th colspan="2" style="width: 10%;">No. of Regular Customers </th>
                                                                        <th colspan="2" style="width: 10%;">No. of Irregular Customers  </th>
                                                                        <th colspan="2" style="width: 10%;">No. of Customers Not Filled </th>
                                                                        <th>Regular Sales</th>
                                                                        <th>Irregular Sales</th>
                                                                        <th>Not Filled Sales</th>
                                                                        <th>Total Sales</th>
                                                                        <th>Total Returns</th>
                                                                        <th>Actual Sales</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="2">Total</th>
                                                                        <th>{{overall_customers ? (overall_customers) : 0}}</th>
                                                                        <th>{{customers ? (customers) : 0}}</th>
                                                                        <!-- <th>{{new_customers ? (new_customers | number) : 0}}</th> -->
                                                                        <th><span style="position: relative;bottom: 8px;right: 24px;font-size: 10px;">Overall</span><br/>{{overall_regular_customers ? (overall_regular_customers) : 0}}</th>

                                                                        <th><span style="position: relative;bottom: 8px;right: 17px;font-size: 10px;">Billed</span><br/>{{regular_customers ? (regular_customers) : 0}}</th>
                                                                        <th><span style="position: relative;bottom: 8px;right: 28px;font-size: 10px;">Overall</span><br/>{{overall_irregular_customers ? (overall_irregular_customers) : 0}}</th>

                                                                        <th><span style="position: relative;bottom: 8px;right: 12px;font-size: 10px;">Billed</span><br/>{{irregular_customers ? (irregular_customers) : 0}}</th>

                                                                         <th style="width: 5%"> <span style="position: relative;bottom: 8px;right: 24px;font-size: 10px;">Overall</span><br/>{{overall_not_filled_customers ? (overall_not_filled_customers ) : 0}}</th>

                                                                        <th style="width: 5%"> <span style="position: relative;bottom: 8px;right: 12px;font-size: 10px;">Billed</span><br/>{{not_filled_customers ? (not_filled_customers ) : 0}}</th>


                                                                        <th>{{regular_customers_bill ? (regular_customers_bill | number) : 0}}</th>
                                                                        <th>{{irregular_customers_bill ? (irregular_customers_bill | number) : 0}}</th>
                                                                        <th>{{not_filled_customers_bill ? (not_filled_customers_bill | number) : 0}}</th>
                                                                        <th>{{total_bill ? (total_bill | number) : 0}}</th>
                                                                        <th>{{total_return ? (total_return | number) : 0}}</th>
                                                                        <th>{{total_actual ? (total_actual | number) : 0}}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="tbody-tr" ng-repeat="(index, row) in salesData" >
                                                                        <td>{{index + 1}}</td>
                                                                        <td class="cursor-pointer" ng-click="viewSalePerson(row.id)">{{row.name ? row.name : 'No Name'}} </td>
                                                                        <td class="text-end cursor-pointer" ng-click="viewSalePerson(row.id)">{{row.overall_customers ? (row.overall_customers ) : 0}}</td>
                                                                        <td class="text-end cursor-pointer" ng-click="viewSalePerson(row.id)">{{row.customers ? (row.customers) : 0}}</td>
                                                                        <!-- <td class="text-end cursor-pointer" ng-click="viewSalePerson(row.id)">{{row.new_customers ? (row.new_customers | number) : 0}}</td> -->
                                                                        <td class="text-end cursor-pointer" ng-click="viewSalePerson(row.id)">{{row.overall_regular_customers ? (row.overall_regular_customers ) : 0}}</td>
                                                                        <td class="text-end cursor-pointer" ng-click="viewSalePerson(row.id)">{{row.regular_customers ? (row.regular_customers ) : 0}}</td>
                                                                         <td class="text-end cursor-pointer" ng-click="viewSalePerson(row.id)">{{row.overall_irregular_customers ? (row.overall_irregular_customers ) : 0}}</td>
                                                                        <td class="text-end cursor-pointer" ng-click="viewSalePerson(row.id)">{{row.irregular_customers ? (row.irregular_customers ) : 0}}</td>
                                                                        <td class="text-end cursor-pointer" ng-click="viewSalePerson(row.id)">{{row.overall_not_filled_customers ? (row.overall_not_filled_customers ) : 0}}</td>
                                                                        <td class="text-end cursor-pointer" ng-click="viewSalePerson(row.id)">{{row.not_filled_customers ? (row.not_filled_customers ) : 0}}</td>
                                                                        <td class="text-end cursor-pointer" ng-click="viewSalePerson(row.id)">{{row.regular_customers_bill ? (row.regular_customers_bill | number) : 0}}</td>
                                                                        <td class="text-end cursor-pointer" ng-click="viewSalePerson(row.id)">{{row.irregular_customers_bill ? (row.irregular_customers_bill | number) : 0}}</td>
                                                                         <td class="text-end cursor-pointer" ng-click="viewSalePerson(row.id)">{{row.not_filled_customers_bill ? (row.not_filled_customers_bill | number) : 0}}</td>
                                                                        <td class="text-end cursor-pointer" ng-click="viewSalePerson(row.id)">{{row.total_bill ? (row.total_bill | number) : 0}}</td>
                                                                        <td class="text-end cursor-pointer" ng-click="viewSalePerson(row.id)">{{row.total_return ? (row.total_return | number) : 0}}</td>
                                                                        <td class="text-end cursor-pointer" ng-click="viewSalePerson(row.id)">{{row.total_actual ? (row.total_actual | number) : 0}}</td>
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

            $scope.viewSalePerson = function(sl) {
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                let sales_person = sl;
                let url = '<?php echo base_url() ?>index.php/other_reports/regular_irregular_details_report?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&sales_person=' + sales_person
                window.open(url, '_blank');
            }



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

                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var sales_brand = getJson(true);
                if (sales_brand[0]['states[]'] && sales_brand[0]['states[]'].includes('All')) {
                    cateid = 'All';
                } else {
                    cateid = sales_brand[0]['states[]'] && sales_brand[0]['states[]'].map((el) => {
                        return '"' + encodeURIComponent(el) + '"';
                    }).join(',');
                }
                let url = '<?php echo base_url() ?>index.php/other_reports/fetch_data_regular_irregular_report_export?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&sales_person=' + cateid;
                window.location = url;
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
                var sales_brand = getJson(true);
                if (sales_brand[0]['states[]'] && sales_brand[0]['states[]'].includes('All')) {
                    cateid = 'All';
                } else {
                    cateid = sales_brand[0]['states[]'] && sales_brand[0]['states[]'].map((el) => {
                        return '"' + encodeURIComponent(el) + '"';
                    }).join(',');
                }
                 var status = $('#filterStatus') && $('#filterStatus').is(':checked') ? $('#filterStatus').is(':checked') : false;
                $http.get('<?php echo base_url() ?>index.php/other_reports/fetch_data_regular_irregular_report?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&sales_person=' + cateid +'&status=' + status).success(function(data) {

                    // $('tbody[data-sales-id]').html('');
                    // $('tbody').last().html('');
                    $scope.query = {}
                    $scope.queryBy = '$';
                    $scope.salesData = data['data'];
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