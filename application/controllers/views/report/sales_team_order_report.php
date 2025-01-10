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
        text-align: center;
        /* height: 50px; */
    }


    .loading {
        text-align: center;
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
        width: 80px;
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
                                <h4 class="mb-sm-0 font-size-18">Sales Team Target Sheet</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Sales Team Target Sheet !</li>
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


                                    <div class="row">


                                        <div class="col-lg-12">
                                            <p class="mb-sm-0 font-size-18">Search</p>
                                            <form>
                                                <div class="row">


                                                    <div class="col-md-4">
                                                        <select class="form-control" name="choices-single-default" data-trigger id="sales_group">
                                                            <option value="ALL">All Sale Team</option>
                                                            <?php
                                                            foreach ($sales_team as $val) {
                                                            ?>
                                                                <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="col">
                                                        <input type="date" class="form-control" id="from-date" value="<?php echo   date('Y-m-01'); ?>">
                                                    </div>
                                                    <div class="col">
                                                        <input type="date" class="form-control" id="to-date" value="<?php echo  date('Y-m-d'); ?>">
                                                    </div>
                                                    <div class="col">
                                                        <select class="form-control" id="payment_status">
                                                            <option value="ALL">All</option>
                                                            <option value="3">Approved </option>
                                                            <option value="4">Delivered </option>
                                                            <option value="5">Reconciliation </option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>

                                                        <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata">Export</button>
                                                    </div>

                                                </div>
                                            </form>
                                            <div id="search-view" style="display:none;">

                                                <div class="card-header" ng-init="fetchSingleData(0)">

                                                    <h4 class="card-title">{{formdate}} To {{todate}}</h4>

                                                    </p>
                                                </div>
                                            </div>
                                            <br><br>




                                            <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched mb-2" placeholder="Search..." ng-model="query[queryBy]">
                                            <div class="text-center spinnerCls" style="display:none;">
                                            <div class="spinner-border text-secondary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                            </div>
                                            </div>
                                           
                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" ng-init="fetchDatagetlegderGroup(0)">
                                                <thead>
                                                    <tr>


                                                        <th style="width:20px">No</th>
                                                        <th>Name</th>
                                                        <th>Target</th>
                                                        <th><?= date('F', strtotime("2023-" . date('m') . "-01")) ?> Sales</th>
                                                        <th><?= date('F', strtotime("2023-" . date('m') . "-01")) ?> Return </th>
                                                        <th><?= date('F', strtotime("2023-" . date('m') . "-01")) ?> Actual </th>
                                                        <th>Required Target</th>
                                                        <th>Status</th>
                                                        <th>%</th>

                                                    </tr>
                                                </thead>
                                                <tbody ng-repeat="names in namesDataledgergroup | filter:query">
                                                    <tr>
                                                        <td colspan="9" class="text-center fw-bold">{{names.sales_group_name}}</td>
                                                    </tr>
                                                    <tr class="trpoint" ng-repeat="entry in names.subarray">
                                                        <td style="width:20px"> {{entry.no}}</td>
                                                        <td>{{entry.sales_team}}</td>
                                                        <td class="text-end">
                                                            <div data-team-id="{{entry.id}}" class="editable">{{entry.target | number}}</div>
                                                        </td>
                                                        <td class="text-end"> {{entry.bill_total | number}}</td>
                                                        <td class="text-end">{{entry.bill_returns | number}}</td>
                                                        <td class="text-end">{{entry.bill_actual | number}}</td>
                                                        <td class="text-end">{{ entry.required_target | number}}</td>
                                                        <td class=" {{entry.status == 'UNDER TARGET' ? 'text-danger bg-gradient' : 'text-success bg-gradient'}} "><b>{{entry.status}}</b></td>
                                                        <td>
                                                            {{ entry.perc }}%
                                                        </td>
                                                    </tr>

                                                    <tr style="background-color: #efefef;">
                                                        <td style="width:20px"> </td>
                                                        <td class="text-center fw-bold text-danger">TOTAL</td>
                                                        <td class="text-end">{{names.team_total['target'] | number}} </td>
                                                        <td class="text-end">{{names.team_total['bill_total'] | number}}</td>
                                                        <td class="text-end">{{names.team_total['bill_returns'] | number}}</td>
                                                        <td class="text-end">{{names.team_total['bill_actual'] | number}}</td>
                                                        <td class="text-end">{{names.team_total['required_target'] | number}}</td>
                                                        <td></td>
                                                        <td>
                                                            {{ names.team_total['perc'] }}%
                                                        </td>
                                                    </tr>




                                                </tbody>

                                                <tbody>


                                                    <tr>

                                                        <td colspan="9" class="text-center fw-bold">OTHERS</td>

                                                    </tr>

                                                    <tr class="trpoint">
                                                        <td style="width:20px"></td>
                                                        <td class="text-center fw-bold text-danger">Topaaz</td>
                                                        <td class="text-end">-</td>
                                                        <td class="text-end">{{topaaz.bill_total | number}}</td>
                                                        <td class="text-end">{{topaaz.bill_returns | number}} </td>
                                                        <td class="text-end">{{topaaz.bill_actual | number}} </td>
                                                        <td class="text-end">-</td>
                                                        <td>-</td>
                                                        <td>-</td>

                                                    </tr>

                                                    <tr class="trpoint">
                                                        <td style="width:20px"> </td>
                                                        <td class="text-center fw-bold text-danger">Arasfirma</td>
                                                        <td class="text-end">-</td>
                                                        <td class="text-end">{{arasf.bill_total | number}}</td>
                                                        <td class="text-end">{{arasf.bill_returns | number}} </td>
                                                        <td class="text-end">{{arasf.bill_actual | number}} </td>
                                                        <td class="text-end">-</td>
                                                        <td>-</td>
                                                        <td>-</td>

                                                    </tr>

                                                    <tr class="trpoint" style="background-color: #efefef;">
                                                        <td style="width:20px"> </td>
                                                        <td class="text-center fw-bold text-info">GRAND TOTAL</td>
                                                        <td class="text-end">{{totals.target | number}}</td>
                                                        <td class="text-end">{{totals.bill_total | number}}</td>
                                                        <td class="text-end">{{totals.bill_returns | number}} </td>
                                                        <td class="text-end">{{totals.bill_actual | number}} </td>
                                                        <td class="text-end">{{totals.required_target | number}}</td>
                                                        <td>-</td>
                                                        <td>{{totals.perc | number}}%</td>

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
                <!-- container-fluid -->


            </div>
            <!-- End Page-content -->

        </div>
    </div>




    <script>
        $(document).ready(function() {
            $('#payment_mode_payoff').on('change', function() {

                var val = $(this).val();

                if (val == 'Cash') {
                    $('#res_no').hide();
                } else {
                    $('#res_no').show();
                }

            });
            $('#exportdata').on('click', function() {
                var sales_group = $('#sales_group').val();
                var cateid = $('#choices-single-default').val();
                var productid = $('#choices-single-default-1').val();
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var order_status = $('#payment_status').val();
                url = '<?php echo base_url() ?>index.php/report/fetch_data_sales_team_report_export?limit=10&cate_id=' + cateid + '&productid=' + productid + '&formdate=' + fromdate + '&todate=' + fromto + '&order_status=' + order_status + '&sales_group=' + sales_group;
                location = url;

            });


        });
    </script>
    <script>
        var app = angular.module('crudApp', ['datatables']);
        app.filter('number', function() {
            return function(input) {
                if (input && (!isNaN(input))) {
                    var currencySymbol = '';
                    //var output = Number(input).toLocaleString('en-IN');   <-- This method is not working fine in all browsers!           
                    var result = input.toString().split('.');

                    var lastThree = result[0].substring(result[0].length - 3);
                    var otherNumbers = result[0].substring(0, result[0].length - 3);
                    if (otherNumbers != '')
                        lastThree = ',' + lastThree;
                    var output = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;

                    if (result.length > 1) {
                        output += "." + result[1];
                    }

                    return currencySymbol + output;
                } else {
                    return 0;
                }
            }
        });
        app.controller('crudController', function($scope, $http) {

            $scope.success = false;
            $scope.error = false;
            $scope.getproductval = 'ALL';
            $(document).on("dblclick", ".editable", function(e) {
                var $this = $(this);

                let prevVal = $this.text().trim();
                // Create an input element
                var $input = $('<input>', {
                    type: 'text',
                    value: $this.text().replace(/,/g, '').trim(),
                    style: 'position: inherit;',
                    class: ''
                });
                // Replace the div content with the input
                $this.html($input);

                // Focus on the input
                $input.focus();

                // Attach a blur event handler to the input
                $input.on('blur', function() {
                    var newValue = $input.val();

                    const formdata = {
                        id: $this.attr('data-team-id'),
                        target: newValue,
                    }

                    console.log("formdata", formdata);
                    if (prevVal.replace(/,/g, '') != newValue) {
                        $http.post('<?php echo base_url() ?>index.php/salesteam/updateTartget', formdata)
                            .then(function(response) {
                                // Success callback
                                $scope.search();
                                console.log('POST request successful:', response.data);
                            })
                            .catch(function(error) {
                                // Error callback
                                console.error('POST request error:', error);
                            });
                    }
                    $this.html(newValue);
                });
            });

            $scope.search = function() {
                // $('.spinnerCls').show();
                
                var cateid = $('#choices-single-default').val();
                var productid = $('#choices-single-default-1').val();
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var order_status = $('#payment_status').val();
                var sales_group = $('#sales_group').val();

                $scope.formdate = fromdate;
                $scope.todate = fromto;

                $('#search-view').show();
                $('#exportdata').show();

                $scope.fetchDatagetlegderGroup(cateid, productid, fromdate, fromto, order_status, sales_group);
            };




            $scope.fetchDatagetlegderGroup = function(cateid, productid, fromdate, fromto, order_status, sales_group) {

                var sales_group = $('#sales_group').val();
                var cateid = $('#choices-single-default').val();
                var productid = $('#choices-single-default-1').val();
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var order_status = $('#payment_status').val();

                $http.get('<?php echo base_url() ?>index.php/report/fetch_data_sales_team_report_a?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&order_status=' + order_status + '&sales_group=' + sales_group).success(function(data) {
                    // $('.spinnerCls').hide();
                    $scope.query = {}
                    $scope.queryBy = '$';
                    $scope.namesDataledgergroup = data[0];
                    $scope.totals = data['totals'];
                    $scope.topaaz = data['topaaz'];
                    $scope.arasf = data['arasf'];
                    var totalamount = 0;
                    for (var i = 0; i < data.length; i++) {
                        var balance = parseInt(data[i].total);
                        totalamount += balance;
                    }

                    $scope.totalamount = totalamount;



                });


            };



        });
    </script>
    <?php include('footer.php'); ?>
</body>