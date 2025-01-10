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
                                        <li class="breadcrumb-item active">Sale Product Area wise Customer Report</li>
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
                                            <h4 class="mb-sm-0 font-size-18">Sale Product Area wise Customer Report (<?=$_GET['sales_area'] == 'null' ? 'No Area' :  $_GET['sales_area']?>)</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <form>
                                            <div class="row">


 

                                                <div class="col">
                                                    <input type="date" class="form-control" id="from-date"  value="<?=$_GET['formdate']?>">
                                                </div>
                                                <div class="col">
                                                    <input type="date" class="form-control" id="to-date" min="<?php echo date('2023-07-01'); ?>"  value="<?=$_GET['todate']?>">
                                                </div>
 <div class="col">
                                                    <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>

                                                    <button ng-click="fetchSalesProductReportDataExport()" type="button" class="btn btn-success waves-effect waves-light" id="exportdata">Export</button>
                                                </div>

<!-- 
                                                        <div class="form-check">
                                                            <input type="checkbox" name="status" id="filterStatus" class="primary">
                                                            <label class="control-label" for="filterStatus">Show All Customers</label>

                                                        </div> -->
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
                                        <div class="row" >
                                            <div class="col-12">
                                                <div class="card shadow-none">
                                                    <div class="card-body">

                                                        <div class="table-responsive table-container" style="height: 700px;" ng-init="fetchSalesProductReportData(0,0)">
                                                            <table class="main" style="width:100%">
                                                                <!-- tHead -->
                                                                <thead style="position: sticky;top: 0px;">
                                                                    <tr>
                                                                        <th>S.no</th>
                                                                        <th>Customer</th>
                                                                         <th>Target</th>
                                                                       
                                                                        <th>Orders</th>
                                                                        <th>Sale Qty</th>
                                                                        <th>Sale Value</th>
                                                                        <th>Return Qty</th>
                                                                        <th>Return Value</th>
                                                                        <th>Net Sale Qty</th>
                                                                        <th>Net Sale Value</th>

                                                                        <?php 
                                                                         if(isset($_GET['test']) && $_GET['test'] == true){
                                                                        ?>
                                                                        <th>Required<br> Target</th>
                                                                        <th rowspan="2">Percentage</th>
                                                                        <th rowspan="2">Status</th>
                                                                        <?php
                                                                         }
                                                                         ?>


                                                                    </tr>
                                                                    <tr>
                                                                         <?php 
                                                                         if(isset($_GET['test']) && $_GET['test'] == true){
                                                                        ?>
                                                                        <th colspan="2">Total</th>

                                                                        <?php
                                                                         }else{
                                                                        ?>
                                                                        <th colspan="2">Total</th>
                                                                         <?php
                                                                         }
                                                                         ?>
                                                                        <th>{{target_value_wise_total ? (target_value_wise | number) : 0}}</th>
                                                                       
                                                                        <th>{{orders_count ? (orders_count) : 0}}</th>
                                                                        <th>{{qty ? (qty | number) : 0}}</th>
                                                                        <th>{{value ? (value | number) : 0}}</th>
                                                                        <th>{{ret_qty ? (ret_qty | number) : 0}}</th>
                                                                        <th>{{ret_value ? (ret_value | number) : 0}}</th>
                                                                        <th>{{actual_qty ? (actual_qty | number) : 0}}</th>
                                                                        <th>{{actual_value ? (actual_value | number) : 0}}</th>


                                                                        <?php 
                                                                        if(isset($_GET['test']) && $_GET['test'] == true){
                                                                        ?>
                                                                    <th>{{target_value_wise_total ? (target_value_wise_total | number) : 0}}</th>
                                                                        
                                                                        <?php
                                                                         } else{
                                                                            ?>

                                                                            <?php
                                                                         }
                                                                        ?>
                                                                         


                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr ng-repeat="row in salesData" >
                                                                    <td>{{row.sno}}</td>
                                                                    <td class="cursor-pointer" ng-click="viewCustomer(row.customer_id)">{{row.company_name ? row.company_name : 'No Name'}}  </td>
                                                                     <td class="text-end">{{row.target_value_wise_total ? (row.target_value_wise_total | number) : 0}}</td>
                                                                   
                                                                    <td class="text-end">{{row.orders_count ? (row.orders_count ) : 0}}</td>
                                                                    <td class="text-end">{{row.qty ? (row.qty | number) : 0}}</td>
                                                                    <td class="text-end">{{row.value ? (row.value | number) : 0}}</td>
                                                                    <td class="text-end">{{row.ret_qty ? (row.ret_qty | number) : 0}}</td>
                                                                    <td class="text-end">{{row.ret_value ? (row.ret_value | number) : 0}}</td>
                                                                    <td class="text-end">{{row.actual_qty ? (row.actual_qty | number) : 0}}</td>
                                                                    <td class="text-end">{{row.actual_value ? (row.actual_value | number) : 0}}</td>

                                                                     <?php 
                                                                         if(isset($_GET['test']) && $_GET['test'] == true){
                                                                        ?>
                                                                    <td class="text-end">{{row.target_value ? (row.target_value | number) : 0}}</td>
                                                                    <td class="text-end">{{row.perc ? (row.perc | number) : 0}} %</td>
                                                                    <td class="text-end {{row.target_status == 'AHEAD' ? 'text-success' : 'text-danger'}}">{{row.target_value ? (row.target_status) : ''}}</td>
                                                                         
                                                                        <?php
                                                                         }
                                                                         ?>
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

            // $('#exportdata').on('click', function() {
            //     var fromdate = $('#from-date').val();
            //     var fromto = $('#to-date').val();
            //     $scope.formdate = fromdate;
            //     $scope.todate = fromto;
            //     var sales_brand = $('#sales_brand').val();
            //     $scope.fetchSalesProductReportDataExport(sales_brand);
            // })
            $scope.viewCustomer = function (customer){
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                let sales_customer = customer;
                let url = '<?php echo base_url() ?>index.php/other_reports/sale_product_area_cate_report?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&sales_customer=' + sales_customer
                window.open(url,'_blank');
            // window.location.reload();

            }
            $scope.fetchSalesProductReportDataExport = function() {
              var getJson = function (b) {
                var result = $.fn.filterMultiSelect.applied.map((e) => JSON.parse(e.getSelectedOptionsAsJson(b)));
                    if(result.length > 0) {
                        result.reduce((prev,curr) => {
                        prev = {
                        ...prev,
                        ...curr,
                        };
                        return prev;
                    });
                return result;
                    }else{
                        let res ;
                        res = [{'states[]' : ['All']}];
                        return res;
                    }
                   
                }
                // $('.setload').show();
                $scope.loading = true;

                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var sales_brand = getJson(true);
                if(sales_brand[0]['states[]'] && sales_brand[0]['states[]'].includes('All')){
                    cateid = 'All';
                } else{
                    cateid = sales_brand[0]['states[]'] && sales_brand[0]['states[]'].map((el) => {
                        return '"' + encodeURIComponent(el) + '"';
                    }).join(',');
                }
                 var filterStatus = $('#filterStatus').is(':checked');
                let sales_area = '<?=$_GET['sales_area']?>' !== '' && '<?=$_GET['sales_area']?>' !== 'null' ?  '"' +encodeURIComponent('<?=$_GET['sales_area']?>')+ '"' : '';
                let url = '<?php echo base_url() ?>index.php/other_reports/fetch_data_sales_product_area_wise_customer_report_export?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&area=' + sales_area +'&filterStatus=' + filterStatus;
                window.location = url;
            }


 
            $scope.fetchSalesProductReportData = function() {
                var getJson = function (b) {
                var result = $.fn.filterMultiSelect.applied.map((e) => JSON.parse(e.getSelectedOptionsAsJson(b)));
                    if(result.length > 0) {
                        result.reduce((prev,curr) => {
                        prev = {
                        ...prev,
                        ...curr,
                        };
                        return prev;
                    });
                return result;
                    }else{
                        let res ;
                        res = [{'states[]' : ['All']}];
                        return res;
                    }
                   
                }
                // $('.setload').show();
                $scope.loading = true;

                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var sales_brand = getJson(true);
                var filterStatus = $('#filterStatus').is(':checked');
                console.log("filterStatus",filterStatus)
                if(sales_brand[0]['states[]'] && sales_brand[0]['states[]'].includes('All')){
                    cateid = 'All';
                } else{
                    cateid = sales_brand[0]['states[]'] && sales_brand[0]['states[]'].map((el) => {
                        return '"' + encodeURIComponent(el) + '"';
                    }).join(',');
                }
                let sales_area = '<?=$_GET['sales_area']?>' !== '' && '<?=$_GET['sales_area']?>' !== 'null' ?  '"' +encodeURIComponent('<?=$_GET['sales_area']?>')+ '"' : '';
                $http.get('<?php echo base_url() ?>index.php/other_reports/fetch_data_sales_product_area_wise_customer_report?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&area=' + sales_area +'&filterStatus=' + filterStatus ).success(function(data) {

                    // $('tbody[data-sales-id]').html('');
                    // $('tbody').last().html('');
                    $scope.query = {};
                    $scope.queryBy = '$';
                    $scope.salesData = data['data'];
                    Object.keys(data['totals']).map((el) => {
                        $scope[el] = Math.round(data['totals'][el] * Math.pow(10, 2)) / Math.pow(10, 2);
                    })
                    


                });



            }



        });
    </script>




    <?php include('footer.php'); ?>
</body>