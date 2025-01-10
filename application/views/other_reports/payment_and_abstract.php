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
                                        <li class="breadcrumb-item active">Payment and Abstract View</li>
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
                                            <h4 class="mb-sm-0 font-size-18">Payment and Abstract View</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <form>
                                            <div class="row">


   
                                                 <div class="col-md-4" > <!--data-trigger -->
                                                <label class="col-sm-12 col-form-label">Vehicle</label>

                              <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default"   ng-model="getproductval">
                                                          
                                                            <?php
                                                                 if($this->session->userdata['logged_in']['access']!='12')
                                                                 {
                                                                     
                                                                     ?>
                                                                      <option value="ALL">Select Vehicle</option>
                                                                     <?php
                                                                     
                                                                 }
                                                            ?>
                                                           
                                                            
                                                            <?php
                                                            
                                                            foreach($customers as $val)
                                                            {
                                                                ?>
                                                                   
                                                                    
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->name."-". $val->vehicle_number; ?></option>
                                                          
                                                                    <?php
                                                                 }
                                                                
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                            </div>
                                                <div class="col">
                                                <label class="col-sm-12 col-form-label">Date</label>
                                                    <input type="date" class="form-control" id="from-date" value="<?php echo $_GET['formdate'] != '' ? $_GET['formdate'] : date('Y-m-d'); ?>">
                                                </div>
                                             

                          
                                                <div class="col text-end" style="align-self: self-end;">
                                                    <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>

                                                    <!-- <button type="button"  disabled ng-click="fetchSalesProductReportDataExport()" class="btn btn-success waves-effect waves-light" id="exportdata">Export</button> -->
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
                                                                        <th >S.no</th>
                                                                        <th >Name</th>
                                                                        <th >Order no.</th>
                                                                        <th >Trip ID</th>
                                                                        <th >Payment Mode (RTGS / Cash) </th>
                                                                        <th >Total Amount</th>
                                                                        <th >Party Amount</th>
                                                                        <th >Party Phone</th>
                                                                    </tr>
                                                                    
                                                                </thead>
                                                                <tbody>
                                                                    <tr ng-repeat="row in salesDataDetail track by $index">
                                                                        <td>{{$index + 1}}</td>
                                                                        <td class="text-start ">{{row.name}}</td>
                                                                        <td class="text-start">{{row.order_no}}</td>
                                                                        <td class="text-start">{{row.trip_id}}</td>
                                                                        <td class="text-start">{{row.payment_mode}}</td>
                                                                        <td class="text-end">{{row.bill_total | number}}</td>
                                                                        <td class="text-end">{{row.collectamount | number}}</td>
                                                                        <td class="text-end">{{row.phone }}</td>
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
            $scope.loading = true;
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var customer_id = encodeURIComponent('<?= $_GET['customer_id'] ?>');
                let url = '<?php echo base_url() ?>index.php/other_reports/fetch_data_payment_and_abstract_export?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&customer_id=' + customer_id  ;

                window.location = url;
            }



            $scope.viewOrder = function(order_id) {
                // let order = btoa(order_id);
                // let url = '<?php echo base_url() ?>index.php/order/ordercreate_product_process?order_id=' + order;
                // window.open(url, '_blank');
            }


            $scope.fetchSalesProductDetailReportData = function(brand) {

                // $('.setload').show();
                $scope.loading = true;
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var customer_id = $('#choices-single-default').val();
                $http.get('<?php echo base_url() ?>index.php/other_reports/fetch_data_payment_and_abstract?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&vId=' + customer_id  ).success(function(data) {
                    $scope.query = {}
                    $scope.queryBy = '$';
                    $scope.salesDataDetail = data;
                    
                });
            }
        });
    </script>
    <?php include('footer.php'); ?>
</body> 