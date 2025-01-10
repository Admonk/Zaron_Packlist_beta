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

    .numbers {
        width: 155px;
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
                                        <div class="col-10">
                                            <div class="btn-group-horizontal mx-2" role="group" aria-label="Horizontal radio toggle button group">
                                                <input type="radio" class="btn-check" ng-click="showMode = ''" name="vbtn-radio" id="vbtn-radio12" value="1" autocomplete="off" checked>
                                                <label class="btn btn-outline-danger" for="vbtn-radio12">Salesperson Name</label>
                                                <input type="radio" class="btn-check" ng-click="showMode = 'phone'" name="vbtn-radio" id="vbtn-radio22" value="L" autocomplete="off">
                                                <label class="btn btn-outline-danger" for="vbtn-radio22">Salesperson Phone </label>

                                            </div>
                                        </div>
                                        <?php
                                        if($this->session->userdata['logged_in']['access'] == '1' || $this->session->userdata['logged_in']['access'] == '15'){
                                        ?>
                                        <div class="col-2">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Target Sheet
                                            </button>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                      
                                        <div class="col-lg-12">
                                            <p class="mb-sm-0 font-size-18">Search</p>
                                            <form>
                                                <div class="row">

                                      <?php
    if($this->session->userdata['logged_in']['access'] == '1' || $this->session->userdata['logged_in']['access'] == '15'){
    ?>
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
                                                    <?php 
                                                }
                                                ?>

                                                    <div class="col">
                                                        <input type="date" class="form-control" id="from-date" value="<?php echo   date('Y-m-01'); ?>">
                                                    </div>
                                                    <div class="col">
                                                        <input type="date" class="form-control" id="to-date" value="<?php echo  date('Y-m-d'); ?>">
                                                    </div>
                                                    <div class="col" style="align-self: end;">

                                                        <div class="form-check">
                                                            <input type="checkbox" name="status" id="filterStatus" class="primary">
                                                            <label class="control-label" for="filterStatus">Show Inactive</label>

                                                        </div>

                                                    </div>
                                                    <div class="col">
                                                        <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>

                                                        <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata">Export</button>
                                                    </div>


                                                    <!-- Modal -->

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
                                            <div class="table-container" style="height: 700px;overflow-y: scroll;">
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" ng-init="fetchDatagetlegderGroup(0)">
                                                    <thead style="position:sticky;top:0;">
                                                        <tr>


                                                            <th style="width:20px">No</th>
                                                            <th>Name</th>
                                                            <th>Target</th>
                                                            <th> Sales</th>
                                                            <th> Return </th>
                                                            <th> Actual </th>
                                                            <th>Required Target</th>
                                                            <th class="numbers">Status</th>
                                                            <th>%</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody ng-repeat="names in namesDataledgergroup | filter:query">
                                                        <tr>
                                                            <td colspan="9" class="text-center fw-bold">{{names.sales_group_name}}</td>
                                                        </tr>
                                                        <tr class="trpoint" ng-repeat="entry in names.subarray">
                                                            <td style="width:20px"> {{entry.no}}</td>
                                                            <td>{{showMode == '' ? entry.sales_team : entry.phone+ ' ('+entry.sales_team+')' }} </td>
                                                            <td class="text-center">
                                                                <div data-team-id="{{entry.id}}" class="editable">{{entry.target | number}}</div>
                                                            </td>
                                                            <td class="text-center"> {{entry.bill_total | number}}</td>
                                                            <td class="text-center">{{entry.bill_returns | number}}</td>
                                                            <td class="text-center">{{entry.bill_actual | number}}</td>
                                                            <td class="text-center">{{ entry.required_target | number}}</td>
                                                            <td class=" {{entry.status == 'UNDER TARGET' ? 'text-danger bg-gradient' : 'text-success bg-gradient'}} "><b>{{entry.status}}</b></td>
                                                            <td>
                                                                {{ entry.perc }}%
                                                            </td>
                                                        </tr>

                                                        <tr style="background-color: #efefef;">
                                                            <td style="width:20px"> </td>
                                                            <td class="text-center fw-bold text-danger">TOTAL</td>
                                                            <td class="text-center">{{names.team_total['target'] | number}} </td>
                                                            <td class="text-center">{{names.team_total['bill_total'] | number}}</td>
                                                            <td class="text-center">{{names.team_total['bill_returns'] | number}}</td>
                                                            <td class="text-center">{{names.team_total['bill_actual'] | number}}</td>
                                                            <td class="text-center">{{names.team_total['required_target'] | number}}</td>
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
                                                            <td class="text-center">-</td>
                                                            <td class="text-center">{{topaaz.bill_total | number}}</td>
                                                            <td class="text-center">{{topaaz.bill_returns | number}} </td>
                                                            <td class="text-center">{{topaaz.bill_actual | number}} </td>
                                                            <td class="text-center">-</td>
                                                            <td>-</td>
                                                            <td>-</td>

                                                        </tr>

                                                        <tr class="trpoint">
                                                            <td style="width:20px"> </td>
                                                            <td class="text-center fw-bold text-danger">Arasfirma</td>
                                                            <td class="text-center">-</td>
                                                            <td class="text-center">{{arasf.bill_total | number}}</td>
                                                            <td class="text-center">{{arasf.bill_returns | number}} </td>
                                                            <td class="text-center">{{arasf.bill_actual | number}} </td>
                                                            <td class="text-center">-</td>
                                                            <td>-</td>
                                                            <td>-</td>

                                                        </tr>

                                                        <tr class="trpoint" style="background-color: #efefef;">
                                                            <td style="width:20px"> </td>
                                                            <td class="text-center fw-bold text-info">GRAND TOTAL</td>
                                                            <td class="text-center">{{totals.target | number}}</td>
                                                            <td class="text-center">{{totals.bill_total | number}}</td>
                                                            <td class="text-center">{{totals.bill_returns | number}} </td>
                                                            <td class="text-center">{{totals.bill_actual | number}} </td>
                                                            <td class="text-center">{{totals.required_target | number}}</td>
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


                </div>
                <!-- container-fluid -->


            </div>
            <!-- End Page-content -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Salesperson's Monthlty Target Sheet </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body month-target">

                            <section class="container">
                                <div class="row">
                                      <?php
    if($this->session->userdata['logged_in']['access'] == '1' || $this->session->userdata['logged_in']['access'] == '15'){
    ?>
                                    <div class="col-md-4">
                                        <select class="filter-multi-select" name="states[]" multiple="multiple" id="sales_group_target">
                                            <option value="ALL">All Sale Team</option>
                                            <?php

                                            function sortByName($a, $b)
                                            {
                                                return strcmp($a->name, $b->name);
                                            }
                                            usort($sales_team, 'sortByName');

                                            foreach ($sales_team as $val) {
                                            ?>
                                                <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <?php
                                }
                                ?>
                                    <!-- <div class="col-md-4">
                                        <select class="form-control" name="states1[]"   id="sales_group_target_1">
                                           
                                            <?php

                                            function sortByCat($a, $b)
                                            {
                                                return strcmp($a->categories, $b->categories);
                                            }
                                            usort($categories, 'sortByName');

                                            foreach ($categories as $val) {
                                            ?>
                                                <option value="<?php echo $val->id; ?>"><?php echo $val->categories; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div> -->

                                    <div class="col-md-3">
                                        <input type="month" class="form-control" id="from-month" value="<?php echo   date('Y-m'); ?>">
                                    </div>
                                    <!-- <div class="col text-end">
                                        <div class="btn btn-secondary change-view">Category Targets</div>

                                    </div> -->

                                </div>

                            </section>
                            <section class="container mt-2" style="max-height: 650px;overflow-y: scroll;">
                                <table id="datatable-targets" class="table table-bordered dt-responsive  nowrap w-100" ng-init="fetchTargets()">
                                    <thead style="position:sticky;top:0;">
                                        <tr>


                                            <th style="width:20px;font-size: 12px;">No</th>
                                            <th style="width:20px;font-size: 12px;">Name</th>
                                            <th style="font-size: 12px;">Yearly Target </th>
                                            <?php
                                            for ($i = 0; $i <= 11; $i++) {

                                            ?>
                                                <th data-field="month-head" data-month-index="<?= $i ?>" style="font-size: 12px;"><?= date('M', strtotime('+' . $i . ' month')); ?>-<?= date('y', strtotime('+' . $i . ' month')); ?>
                                                </th>
                                            <?php
                                            }
                                            ?>

                                        </tr>
                                    </thead>
                                    <tbody ng-repeat="names in targets">
                                        <tr>
                                            <td colspan="2" style="font-size: 12px;" class="text-start fw-bold">{{names.sales_group_name}}</td>
                                            <td colspan="13"></td>
                                        </tr>

                                        <tr class="trpoint" ng-repeat="entry in names.salesperson">
                                            <td style="width:20px;font-size: 12px;"> {{entry.no}}</td>
                                            <td style="font-size: 12px;" class="text-start"> {{ entry.sales_person_name   }} </td>
                                            <td class="year-editable" data-team-id="{{ entry.sales_team_id }}" data-sl-id="{{ entry.sales_team_id }}" style="font-size: 12px;">
                                                {{formatVal(entry.yearTotal)}}
                                            </td>
                                            <?php
                                            for ($i = 0; $i <= 11; $i++) {
                                            ?>
                                                <td class="editable" data-team-id="{{ entry.sales_team_id }}" data-sl-id="{{ entry.sales_team_id }}" data-month-index="<?= $i ?>" style="font-size: 12px;">
                                                    -
                                                </td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </section>
                        </div>

                        <div class="modal-body category-target">

                            <section class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="filter-multi-select" name="sl[]" multiple="multiple" id="select_sl">

                                            <?php


                                            usort($sales_team, 'sortByName');

                                            foreach ($sales_team as $val) {
                                            ?>
                                                <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="filter-multi-select" name="cat[]" multiple="multiple" id="select_cat">
                                            <option value="ALL">All Categories</option>
                                            <?php


                                            usort($categories, 'sortByName');

                                            foreach ($categories as $val) {
                                            ?>
                                                <option value="<?php echo $val->id; ?>"><?php echo $val->categories; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>



                                    <div class="col-md-3">
                                        <input type="month" class="form-control" id="from-month-cat" value="<?php echo   date('Y-m'); ?>">
                                    </div>
                                    <div class="col">
                                        <div class="btn btn-secondary change-view">Back</div>

                                    </div>
                                </div>

                            </section>
                            <section class="container mt-2" style="max-height: 650px;overflow-y: scroll;">
                                <table id="datatable-category" class="table table-bordered dt-responsive  nowrap w-100" ng-init="fetchCatTargets()">
                                    <thead style="position:sticky;top:0;">
                                        <tr>


                                            <th style="width:20px;font-size: 12px;">No</th>
                                            <th style="width:20px;font-size: 12px;">Name</th>
                                            <th style="font-size: 12px;">Yearly Target </th>
                                            <?php
                                            for ($i = 0; $i <= 11; $i++) {

                                            ?>
                                                <th data-field="month-head-cat" data-month-index="<?= $i ?>" style="font-size: 12px;"><?= date('M', strtotime('+' . $i . ' month')); ?>-<?= date('y', strtotime('+' . $i . ' month')); ?>
                                                </th>
                                            <?php
                                            }
                                            ?>

                                        </tr>
                                    </thead>
                                    <tbody ng-repeat="names in catTargets">
                                        <tr>
                                            <td colspan="2" style="font-size: 12px;" class="text-start fw-bold">{{names.sales_person_name}}</td>
                                            <td colspan="13"></td>
                                        </tr>

                                        <tr class="trpoint" ng-repeat="entry in names.cats">
                                            <td style="width:20px;font-size: 12px;"> {{entry.no}}</td>
                                            <td style="font-size: 12px;" class="text-start"> {{ entry.categories }} </td>
                                            <td class="year-editable-cat" data-cat-id="{{entry.cat_id}}" data-team-id="{{ names.id }}" data-sl-id="{{ names.id }}" style="font-size: 12px;">
                                                {{formatVal(entry.yearTotal)}}
                                            </td>
                                            <?php
                                            for ($i = 0; $i <= 11; $i++) {
                                            ?>
                                                <td class="editable" data-cat-id="{{entry.cat_id}}"  data-team-id="{{ names.id }}" data-sl-id="{{ names.id }}" data-month-index="<?= $i ?>" style="font-size: 12px;">
                                                    -
                                                </td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script>
        $(document).ready(function() {

            $('#sales_group_target').on('click', () => {
                $('input.custom-control-input[value=""]').parent().remove();

            })
            $('#sales_group_target_1').on('click', () => {
                $('input.custom-control-input[value=""]').parent().remove();

            })
            $('#select_sl').on('click', () => {
                $('input.custom-control-input[value=""]').parent().remove();

            })
            $('#select_cat').on('click', () => {
                $('input.custom-control-input[value=""]').parent().remove();

            })

            var getJson = function(b) {
                var result = $.fn.filterMultiSelect.applied
                    .map((e) => JSON.parse(e.getSelectedOptionsAsJson(b)))
                    .reduce((prev, curr) => {
                        prev = {
                            ...prev,
                            ...curr,
                        };
                        return prev;
                    });
                return result;
            }
            $('#sales_group_target').on("optionselected", function(e) {
                console.log("e", getJson(true)["states[]"])
                //Check for if array having 'All' in selected items
                if (getJson(true)["states[]"].indexOf("ALL") != -1) {
                    $('select[name="states[]"]').val('All').change();
                }
            });


            $('#payment_mode_payoff').on('change', function() {

                var val = $(this).val();

                if (val == 'Cash') {
                    $('#res_no').hide();
                } else {
                    $('#res_no').show();
                }

            });


            $('.category-target').hide()
            // $('.change-view').on('click', function() {
            //     $('.category-target').toggle();
            //     $('.month-target').toggle();
            // });
        });
    </script>
    <script>
        var app = angular.module('crudApp', ['datatables']);
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

            $scope.success = false;
            $scope.error = false;
            $scope.getproductval = 'ALL';


  <?php
    if($this->session->userdata['logged_in']['access'] == '1' || $this->session->userdata['logged_in']['access'] == '15'){
    ?>

            // let fromdate = ;
            $(document).on("dblclick", ".editable", function(e) {
                var $this = $(this);
                let catId = $(this).attr('data-cat-id');

                let dateState = new Date($('#from-month').val() + '-01');
                if (!isNaN($(this).attr('data-month-index'))) {
                    let index = 0;
                    index = $this.attr('data-month-index');
                    dateState.setMonth(dateState.getMonth() + parseInt(index));
                    var formattedDate = dateState.toISOString().slice(0, 10);
                    fromdate = formattedDate
                } else {
                    fromdate = $('#from-date').val();
                }

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
                        field_name:catId,
                        report_name: 'sales_team_target',
                        for_date: fromdate
                    }

                    console.log("formdata", formdata);
                    if (prevVal.replace(/,/g, '') != newValue) {
                        $http.post('<?php echo base_url() ?>index.php/salesteam/updateTarget', formdata)
                            .then(function(response) {
                                // Success callback
                                $scope.search();
                                $scope.fetchTargets();
                                $scope.fetchCatTargets();

                                console.log('POST request successful:', response.data);
                            })
                            .catch(function(error) {
                                // Error callback
                                console.error('POST request error:', error);
                            });
                    }
                    $this.html(newValue);
                });
                // fromdate = $('#from-month').val()+ '-01';

            });



            $(document).on("dblclick", ".year-editable", function(e) {
                var $this = $(this);
                let dateState = new Date($('#from-month').val() + '-01');




                const currentDate = dateState;

            const currentYear = currentDate.getFullYear();
            const financialYearStart = new Date(currentDate.getMonth() >= 3 ? currentYear : currentYear - 1, 3, 1);
            var year = financialYearStart.getFullYear();
            var month = (financialYearStart.getMonth() + 1).toString().padStart(2, '0');
            var day = financialYearStart.getDate().toString().padStart(2, '0');

            var formattedDate = year + '-' + month + '-' + day;
                let prevVal = $this.text().trim();
                // Create an input element
                var $input = $('<input>', {
                    type: 'text',
                    value: $this.text().replace(/,/g, '').trim(),
                    style: 'position: inherit;',
                    class: ''
                });
                $this.html($input);

                $input.focus();
                let fromdate = dateState;
                $input.on('blur', function() {
                    var newValue = $input.val();

                    const formdata = {
                        id: $this.attr('data-team-id'),
                        target: newValue,
                        report_name: 'sales_team_target',
                        for_date: formattedDate
                    }

                    console.log("formdata", formdata);
                    if (prevVal.replace(/,/g, '') != newValue) {
                        $http.post('<?php echo base_url() ?>index.php/other_reports/setYearTarget', formdata)
                            .then(function(response) {
                                $scope.search();
                                $scope.fetchTargets();
                                // $scope.fetchCatTargets();
                                console.log('POST request successful:', response.data);
                            })
                            .catch(function(error) {
                                console.error('POST request error:', error);
                            });
                    }
                    $this.html(newValue);
                });

            });


            

            $(document).on("dblclick", ".year-editable-cat", function(e) {
                var $this = $(this);
                let catId = $(this).attr('data-cat-id');
                let dateState = new Date($('#from-month-cat').val() + '-01');

                const currentDate = dateState;

                const currentYear = currentDate.getFullYear();
                const financialYearStart = new Date(currentDate.getMonth() >= 3 ? currentYear : currentYear - 1, 3, 1);
                var year = financialYearStart.getFullYear();
                var month = (financialYearStart.getMonth() + 1).toString().padStart(2, '0');
                var day = financialYearStart.getDate().toString().padStart(2, '0');

                var formattedDate = year + '-' + month + '-' + day;



                let prevVal = $this.text().trim();
                // Create an input element
                var $input = $('<input>', {
                    type: 'text',
                    value: $this.text().replace(/,/g, '').trim(),
                    style: 'position: inherit;',
                    class: ''
                });
                $this.html($input);

                $input.focus();
                let fromdate = dateState;
                $input.on('blur', function() {
                    var newValue = $input.val();

                    const formdata = {
                        id: $this.attr('data-team-id'),
                        target: newValue,
                        field_name:catId,
                        report_name: 'sales_team_target',
                        for_date: formattedDate
                    }

                    // console.log("formdata", formdata);
                    // if (prevVal.replace(/,/g, '') != newValue) {
                        $http.post('<?php echo base_url() ?>index.php/other_reports/setYearTarget', formdata)
                            .then(function(response) {
                                // $scope.search();
                                // $scope.fetchTargets();
                                $scope.fetchCatTargets();
                                // console.log('POST request successful:', response.data);
                            })
                            .catch(function(error) {
                                // console.error('POST request error:', error);
                            });
                    // }
                    $this.html(newValue);
                });

            });

<?php 
}
?>
            $scope.search = function() {
                // $('.spinnerCls').show();

                var cateid = $('#choices-single-default').val();
                var productid = $('#choices-single-default-1').val();
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                // var order_status = $('#payment_status').val();
                var sales_group = $('#sales_group').val();
                var status = $('#filterStatus') && $('#filterStatus').is(':checked') ? $('#filterStatus').is(':checked') : false;
                console.log("status", status)
                $scope.formdate = fromdate;
                $scope.todate = fromto;

                $('#search-view').show();
                $('#exportdata').show();

                $scope.fetchDatagetlegderGroup(cateid, productid, fromdate, fromto, sales_group, status);
            };

            $scope.showMode = '';


            $scope.fetchDatagetlegderGroup = function(cateid, productid, fromdate, fromto, sales_group, status) {

                var sales_group = $('#sales_group').val();
                var cateid = $('#choices-single-default').val();
                var productid = $('#choices-single-default-1').val();
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var order_status = $('#payment_status').val();
                var showMode = $scope.showMode;
                var url = 'index.php/other_reports/fetch_data_sales_team_report';
                $http.get('<?php echo base_url() ?>' + url + '?limit=10&formdate=' + fromdate + '&todate=' + fromto +
                    // '&order_status=' + order_status + 
                    '&sales_group=' + sales_group + '&active_status=' + status + '&showMode=' + showMode).success(function(data) {
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
            $scope.formatVal = function(input) {
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
            // $scope.targets = [];

              <?php
    if($this->session->userdata['logged_in']['access'] == '1' || $this->session->userdata['logged_in']['access'] == '15'){
    ?>
            $scope.fetchTargets = function() {

                var getJson = function(b) {
                    var result = $.fn.filterMultiSelect.applied.map((e) => JSON.parse(e.getSelectedOptionsAsJson(b)));
                     if(result.length  && result[0]["states[]"]){
                        return result[0]["states[]"];
                     }else{
                        return ['All'];
                     }
                }
                var cateid = $('#sales_group_target').val();
                var fromMonth = $('#from-month').val();
                var sales_group = $('#sales_group').val();
                var status = $('#filterStatus') && $('#filterStatus').is(':checked') ? $('#filterStatus').is(':checked') : false;
                var url = 'index.php/other_reports/fetch_data_sales_product_targets';
                var salepersonArr = getJson(true);
                if (salepersonArr.includes('All')) {
                    cateid = 'All';
                } else {
                    cateid = salepersonArr.join(',');
                }
                var mar24Index = $("#datatable-targets th:contains('Mar-')").index();
                $("#datatable-targets th:gt(" + mar24Index + ")").show();
                $("#datatable-targets tbody tr.trpoint").find("td:gt(" + mar24Index + ")").show();

                $http.get('<?php echo base_url() ?>' + url + '?limit=10&formMonth=' + fromMonth + '&sales_group=' + sales_group +
                    '&order_status=' + cateid +
                    '&active_status=' + status).success(function(data) {

                    $scope.query = {}
                    $scope.queryBy = '$';
                    $scope.targets = data[0];


                    setTimeout(function() {

                        data[0].map((el) => {
                            el.salesperson && el.salesperson.map((el1) => {
                                <?php
                                for ($i = 0; $i <= 11; $i++) {
                                ?>
                                    $(`td[data-sl-id="${el1.sales_team_id}"][data-month-index="<?= $i ?>"]`).html($scope.formatVal(el1.data.find(el => el.index == '<?= $i ?>').target));
                                <?php
                                }
                                ?>

                            })
                        })
                        mar24Index = $("#datatable-targets th:contains('Mar-')").index();
                        $("#datatable-targets th:gt(" + mar24Index + ")").hide();
                        $("#datatable-targets tbody tr.trpoint").find("td:gt(" + mar24Index + ")").hide();


                    }, 500)

                });

            }



            $scope.fetchCatTargets = function() {

                var getJson = function(b) {
                    var result = $.fn.filterMultiSelect.applied.map((e) => JSON.parse(e.getSelectedOptionsAsJson(b)));
                    if(result.length  && result[1]["sl[]"]){
                        return result[1]["sl[]"];
                     }else{
                        return ['All'];
                     }
                    
                }

                var getJsonCats = function(b) {
                    var result = $.fn.filterMultiSelect.applied.map((e) => JSON.parse(e.getSelectedOptionsAsJson(b)));
                    if(result.length  && result[2]["cat[]"]){
                        return result[2]["cat[]"];
                     }else{
                        return ['All'];
                     }
                }
                var cateid = $('#sales_group_target').val();
                var fromMonth = $('#from-month-cat').val();
                var sales_group = $('#sales_group').val();
                var status = $('#filterStatus') && $('#filterStatus').is(':checked') ? $('#filterStatus').is(':checked') : false;
                var url = 'index.php/other_reports/fetch_data_sales_category_targets';
                var salepersonArr = getJson(true);
                var categories = getJsonCats(true);
                // console.log("salepersonArr",salepersonArr)
                if (salepersonArr.includes('All')) {
                    cateid = 'All';
                } else {
                    cateid = salepersonArr.join(',');
                }

                if (categories.includes('All')) {
                    categoriesId = 'All';
                } else {
                    categoriesId = categories.join(',');
                }
                var mar24Index = $("#datatable-category th:contains('Mar-')").index();
                $("#datatable-category th:gt(" + mar24Index + ")").show();
                $("#datatable-category tbody tr.trpoint").find("td:gt(" + mar24Index + ")").show();

                $http.get('<?php echo base_url() ?>' + url + '?limit=10&formMonth=' + fromMonth + '&order_status=' + cateid +
                    '&active_status=' + status + '&cats=' +categoriesId).success(function(data) {

                    $scope.query = {}
                    $scope.queryBy = '$';
                    $scope.catTargets = data[0];

                        
                    setTimeout(function() {

                        data[0].map((el) => {
                            el.cats && el.cats.map((el1) => {
                                <?php
                                for ($i = 0; $i <= 11; $i++) {
                                ?>
                                // console.log("el1.sales_team_id",el.id,<?=$i?>,el1.cat_id)
                                    $(`[data-sl-id="${el.id}"][data-month-index="<?= $i ?>"][data-cat-id=${el1.cat_id}]`).html($scope.formatVal(el1.data.find(el => el.index == '<?= $i ?>').target));
                                <?php
                                }
                                ?>

                            })
                        })
                        mar24Index = $("#datatable-category th:contains('Mar-')").index();
                        $("#datatable-category th:gt(" + mar24Index + ")").hide();
                        $("#datatable-category tbody tr.trpoint").find("td:gt(" + mar24Index + ")").hide();


                    }, 500)

                });

            }

            <?php
        }
        ?>



            $(function() {

                $('#sales_group_target, #from-month').on('change optionselected optiondeselected', function() {
                    $scope.fetchTargets();
                    let dateState = new Date($('#from-month').val() + '-01');
                    let headings = $('th[data-field="month-head"]');
                    headings = headings.sort((a, b) => {
                        const indexA = parseInt($(a).attr('data-month-index'));
                        const indexB = parseInt($(b).attr('data-month-index'));
                        return indexA - indexB;
                    });
                    for (let i = 0; i < headings.length; i++) {
                        let dateInfo = dateState.setMonth(dateState.getMonth() + parseInt(i));
                        var formattedDate = dateState.toISOString().slice(0, 10);
                        $(headings[i]).html(dateState.toLocaleString('en-US', {
                            month: 'short'
                        }) + '-' + dateState.toLocaleString('en-US', {
                            year: '2-digit'
                        }));
                        dateState = new Date($('#from-month').val() + '-01');

                    }

                });



                $('#select_cat, #select_sl, #from-month-cat').on('change optionselected optiondeselected', function() {
                    // console.log($(this).val());
                    $scope.fetchCatTargets();
                    let dateState = new Date($('#from-month-cat').val() + '-01');
                    let headings = $('th[data-field="month-head-cat"]');
                    headings = headings.sort((a, b) => {
                        const indexA = parseInt($(a).attr('data-month-index'));
                        const indexB = parseInt($(b).attr('data-month-index'));
                        return indexA - indexB;
                    });
                    for (let i = 0; i < headings.length; i++) {
                        let dateInfo = dateState.setMonth(dateState.getMonth() + parseInt(i));
                        var formattedDate = dateState.toISOString().slice(0, 10);
                        $(headings[i]).html(dateState.toLocaleString('en-US', {
                            month: 'short'
                        }) + '-' + dateState.toLocaleString('en-US', {
                            year: '2-digit'
                        }));
                        dateState = new Date($('#from-month-cat').val() + '-01');

                    }

                });
            })
            $('#exportdata').on('click', function() {
                var sales_group = $('#sales_group').val();
                var cateid = $('#choices-single-default').val();
                var productid = $('#choices-single-default-1').val();
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var order_status = $('#payment_status').val();
                var status = $('#filterStatus') && $('#filterStatus').is(':checked') ? $('#filterStatus').is(':checked') : false;
                var showMode = $scope.showMode;
                url = '<?php echo base_url() ?>index.php/other_reports/fetch_data_sales_team_report_export?limit=10&formdate=' + fromdate + '&todate=' + fromto +
                    '&sales_group=' + sales_group + '&active_status=' + status + '&showMode=' + showMode;
                location = url;

            });



        });
    </script>
    <?php include('footer.php'); ?>
</body>