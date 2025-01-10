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

  /*  .tbody-tr-head {
        background-color: #cfcfcf50;
    }
*/
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

    .tbody-tr:hover {
        background-color: #cfcfcf4e;
        transition: all 0.2s;
    }

    .column1 {
        background-color: #fff;
        /* Set background color for first column */
    }

    .column2 {
        background-color: #fff;
        /* Set background color for second column */
    }

    .heads {
        min-width: 150px;
    }

    .first-cell {
        min-width: 50px;
    }

    .second-cell {
        min-width: 150px;
        position: sticky;
        left: 50px;
    }
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
                                        <li class="breadcrumb-item active">Area Consolidated Report</li>
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
                                            <h4 class="mb-sm-0 font-size-18">Area Consolidated Report</h4>
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

                                                <div class="col">
                                                    <input type="month" class="form-control" id="from-date" min="<?php echo date('2023-08'); ?>"  max="<?php echo date('Y-m'); ?>" value="<?php echo date('Y-04'); ?>">
                                                </div>
                                                <div class="col">
                                                    <input type="month" class="form-control" id="to-date" max="<?php echo date('Y-m'); ?>" value="<?php echo date('Y')+1; ?>-03">
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

                                                                <thead style="position: sticky;top: 0px;z-index: 3;">
                                                                    <tr>

                                                                        <th class="first-cell" style="position: sticky;left: 0px;" colspan="2">Month</th>

                                                                        <th colspan="4" ng-repeat="head in monthNameHeads track by $index" class="heads">{{head.str}} </th>


                                                                    </tr>

                                                                </thead>
                                                                <thead style="position: sticky;top: 50px;z-index: 3;">
                                                                    <tr>
                                                                        <th class="first-cell" style="position: sticky;left: 0px;">S.no</th>
                                                                        <th class="second-cell" style="">Area</th>

                                                                        <th ng-repeat="head in monthHeads track by $index" class="heads">
                                                                            {{head}}
                                                                        </th>

                                                                    </tr>
                                                                    <tr>

                                                                        <th class="first-cell" style="position: sticky;left: 0px;" colspan="2">Total</th>

                                                                        <th ng-repeat="val in totals track by $index">{{val}}</th>

                                                                    </tr>
                                                                </thead>

                                                                <tbody>
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




        app.filter('number', function() {
            return function(input) {
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

            $scope.monthHeads = [];
            $scope.monthNameHeads = [];
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
                let url = '<?php echo base_url() ?>index.php/other_reports/fetch_data_customer_yes_or_no_area_export?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&sales_person=' + cateid;
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
                $http.get('<?php echo base_url() ?>index.php/other_reports/fetch_data_customer_yes_or_no_area?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&sales_person=' + cateid).success(function(data) {
                    $('table tbody').empty();
                    $scope.monthHeads = [];
                    // $('tbody[data-sales-id]').html('');
                    // $('tbody').last().html('');
                    $scope.query = {}
                    $scope.queryBy = '$';
                    $scope.salesData = data['data'];
                    $scope.totals = [];
                    // Object.keys(data['totals']).map((el) => {
                    //     $scope[el] = Math.round(data['totals'][el] * Math.pow(10, 2)) / Math.pow(10, 2);
                    // })

                      function formatNumber(input) {
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


                    }

                    $scope.monthNameHeads = data['months'];

                    let counts = data['months'].length;
                    // let counts = data['months'].length;

                    let monthHeads = ['Billed Customers', 'Total Customers', 'No. of Bills', 'Percentage (Billed Customers / Overall Customers)'];
                    let totalKeys = ['customers', 'customers_create', 'bill_count', 'percentage'];

                     $scope.monthNameHeads.map((val) => {
                        monthHeads.map((el) => {
                              $scope.monthHeads.push(el)
                        });
                        totalKeys.map((el) => {
                            console.log("el",el+'_'+val['no'])
                            let indName = el+'_'+val['no'];
                            if(el == 'percentage'){
                                 $scope.totals.push(formatNumber(data['totals'][indName])+' %');
                            }else{
                                $scope.totals.push(data['totals'][indName])

                            }
                        })
                     })  
                       

                   

                  
                    let htmlData;
                    let inn = 1;
                    // console.log(data['data'])
                    Object.keys(data['data']) && Object.keys(data['data']).map((el, i) => {
                        htmlData += `<tr class="tbody-tr-head" style=" box-shadow: inset 1px 0px 0px 2px #e0e0e0;">
                          
                                               <td class="column2 first-cell" style="position: sticky;left: 0px;">${inn}</td>

                                               <td  class="column2 second-cell" ><b>${el  ? el : 'No Area'}</b></td>`;

console.log("data['data']", data['data'][el]);
                        for (var i = 0; i < $scope.monthNameHeads.length; i++) {
                                 htmlData += `<td class="text-center column2"> ${data['data'][el]['customers_'+($scope.monthNameHeads[i].no)]} </td>
                                               <td class="text-center column2"> ${data['data'][el]['customers_create_'+($scope.monthNameHeads[i].no)]} </td>
                                               <td class="text-center column2"> ${data['data'][el]['total_orders_'+($scope.monthNameHeads[i].no)]} </td>
                                               <td class="text-center column2"> ${formatNumber(data['data'][el]['percentage_'+($scope.monthNameHeads[i].no)])} % </td>`;
                        }

                        htmlData += `</tr>`;

                        inn++;
                       



                    })

                    $('table tbody').append(htmlData);



                });



            }



        });
    </script>




    <?php include('footer.php'); ?>
</body>