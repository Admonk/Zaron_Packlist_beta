<?php include "header.php";


$theads = ["S.NO", "NAME", "ACCESSORIES", "ALUMINIUM", "CLEAT & SAGROD & L ANGLE & Z ANGLE", "DECKING SHEET", "EXTRA SHEET & ARCH", "FAN & BASE", "SHEET", "MULTI WALL", "POLY CARBONATE", "POLYNUM & XLPE", "PROFILE RIDGE & ARCH", "PUFF PANELS", "PURLIN", "SCREW", "SCREWS ACCESSORIES", "TILE SHEETS", "UPVC ITEMS", "STANDING SEAM", "STANDING SEAM CLIPS", "ROCK WOOL", "CONVERSION", "RENT", "HR PLATE", "LINER SHEET", "WALL SHEET","STEEL COIL","PUFF PANEL ACCESSORIES","PURLIN ACCESSORIES","ROLL SHEET","SPANISH RIDGE"];

$uoms = "R.FT, SQ.MTR, KG, SQ.MTR, SQ.MTR, NOS, SQ.MTR, SQ.MTR, SQ.MTR, SQ.FT, SQ.MTR, SQ.MTR, KG, NOS, NOS, SQ.MTR, NOS, SQ.MTR, NOS, SQ.MTR,, NOS, KG, SQ.MTR, SQ.MTR,KG,NOS,KG,KG,SQ.MTR";
$uoms = explode(",", $uoms);

$lineData = array(
    array("field_name" => "accessories", "cat_id" => 1),
    array("field_name" => "aluminium", "cat_id" => 36),
    array("field_name" => "cleat", "cat_id" => 41),
    array("field_name" => "decking_sheet", "cat_id" => 34),
    array("field_name" => "extra_sheet_arch", "cat_id" => 582),
    array("field_name" => "fan_base", "cat_id" => 17),
    array("field_name" => "sheet", "cat_id" => 3),
    array("field_name" => "multi_wall", "cat_id" => 20),
    array("field_name" => "poly_corbonate", "cat_id" => 19),
    array("field_name" => "polynum", "cat_id" => 13),
    array("field_name" => "profile_ridge_arch", "cat_id" => 32),
    array("field_name" => "puff_panels", "cat_id" => 30),
    array("field_name" => "purlin", "cat_id" => 5),
    array("field_name" => "screw", "cat_id" => 7),
    array("field_name" => "screw_accessories", "cat_id" => 9),
    array("field_name" => "tile_sheet", "cat_id" => 26),
    array("field_name" => "upvc_item", "cat_id" => 15),
    array("field_name" => "standing_seam", "cat_id" => 603),
    array("field_name" => "standing_seam_clips", "cat_id" => 604),
    array("field_name" => "rock_wool", "cat_id" => 11),
    array("field_name" => "conversion", "cat_id" => 581),
    array("field_name" => "rent", "cat_id" => 584),
    array("field_name" => "hr_plate", "cat_id" => 613),
    array("field_name" => "liner_sheet", "cat_id" => 590),
    array("field_name" => "wall_sheet", "cat_id" => 607),
    array("field_name" => "roll_sheet", "cat_id" => 593),
    array("field_name" => "puff_panel_accessories", "cat_id" => 618),
    array("field_name" => "purlin_accessories", "cat_id" => 616),
     array("field_name" => "roll_sheet_add", "cat_id" => 591),
                    array("field_name" => "spanish_ridge_add", "cat_id" => 599),
)
?>



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
    th.popup{
        font-size: 12px !important;
    }
    body::-webkit-scrollbar, div::-webkit-scrollbar {
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
                                        <li class="breadcrumb-item active">Sale Product Report</li>
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
                                            <h4 class="mb-sm-0 font-size-18">Sale Product Report</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <form>
                                            <div class="row">

                                                <div class="col"> <!--data-trigger -->
                                                    <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                                                        <?php
                                                        if ($this->session->userdata['logged_in']['access'] != '12') {
                                                        ?>
                                                            <option value="ALL">All Sales Team</option>
                                                        <?php
                                                        }
                                                        ?>

                                                        <?php

                                                        function sortByName($a, $b)
                                                        {
                                                        return strcmp($a->name, $b->name);
                                                        }
                                                        usort($customers, 'sortByName');          



                                                        foreach ($customers as $val) {
                                                            if ($val->status == 1) {
                                                                if ($this->session->userdata['logged_in']['access'] == '12') {
                                                                    if ($this->session->userdata['logged_in']['userid'] == $val->id) {

                                                        ?>
                                                                        <option value="<?php echo $val->id; ?>" seletced><?php echo $val->name; ?></option>
                                                                    <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                        <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col">
                                                    <select class="form-control" id="sales_group">
                                                        <option value="ALL">All Sales Group</option>
                                                             <?php
                                        if($this->session->userdata['logged_in']['access'] == '1' || $this->session->userdata['logged_in']['access'] == '15'){
                                        ?>
                                                        <?php
                                                        foreach ($sales_group as $vals) {
                                                        ?>
                                                            <option value="<?php echo $vals->id; ?>"><?php echo $vals->name; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                         <?php
                                            }
                                            ?>
                                                    </select>
                                                </div>
                                               

                                                <div class="col">
                                                    <input type="date" class="form-control" id="from-date" value="<?php echo date('Y-m-01'); ?>">
                                                </div>
                                                <div class="col">
                                                    <input type="date" class="form-control" id="to-date"  value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                                <div class="col"  style="align-self: center;">
                                                <div class="form-check">
                                                        <input type="checkbox" ng-click='search()'  name="status" id="filterStatus" class="primary">
                                                      <label class="control-label" for="filterStatus">Show Inactive</label>

                                                        </div>
                                                </div>
                                                <div class="col">
                                                    <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>

                                                    <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata">Export</button>
                                                </div>
                                                 <?php
                                        if($this->session->userdata['logged_in']['access'] == '1' || $this->session->userdata['logged_in']['access'] == '15'){
                                        ?>
                                                <div class="col">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Target Sheet
                                            </button>
                                        </div>

                                        <?php
                                    }
                                        ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card shadow-none">
                                                    <div class="card-body">

                                                        <div class="table-responsive table-container" style="height: 700px;" ng-init="fetchSalesProductReportData(0,0)">
                                                            <table class="main">
                                                                <!-- tHead -->
                                                                <thead>
                                                                    <tr>
                                                                        <?php
                                                                        foreach ($theads as $key => $heading) {
                                                                            $styles = '';
                                                                            if ($key == 0) {
                                                                                $styles = "position: sticky; left: 0; z-index: 2; top: 0;";
                                                                            } elseif ($key == 1) {
                                                                                $styles = "padding: 0px 100px;position: sticky; left: 150px; z-index: 2;top: 0;";
                                                                            }
                                                                        ?>
                                                                            <th style="position: sticky;min-width: 150px;<?= $styles ?> top:0px;">
                                                                                <?php echo $heading; ?>
                                                                            </th>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </tr>
                                                                    <tr>
                                                                        <th style="position: sticky; left: 0; z-index: 3; top: 50px;"></th>
                                                                        <th style="min-width: 150px;position: sticky; left: 150px; z-index: 3;top: 50px;">Unit of Measures</th>
                                                                        <?php
                                                                        foreach ($uoms as $key => $item) {

                                                                        ?>
                                                                            <th style="position: sticky;min-width: 150px;white-space: nowrap;top: 50px;"><?= $item ?></th>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </tr>
                                                                </thead>
                                                                <!-- tHead -->
                                                                <!-- tbody All Sales Group -->
                                                                <!-- <tbody ng-repeat="entry in salesData" data-sales-id="{{entry['id']}}">
                                                                </tbody> -->
                                                                
                                                                <!-- <tbody data-sales-id="topaaz">
                                                                </tbody>

                                                                <tbody  data-sales-id="arasf">
                                                                </tbody> -->
                                                                <tbody>
                                                                
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

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Salesperson's Monthlty Target Sheet (Unit wise)  </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body month-target">
                            <section class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="filter-multi-select" name="states[]" multiple="multiple" id="sales_group_target">
                                            <option value="ALL">All Sale Team</option>
                                            <?php

                                         
                                            foreach ($customers as $val) {
                                            ?>
                                                <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <input type="month" class="form-control" id="from-month" value="<?php echo   date('Y-m'); ?>">
                                    </div>
                                    <div class="col text-end">
                                        <div class="btn btn-secondary change-view">Category Targets</div>

                                    </div>
                                </div>

                            </section>
                            <section class="  mt-2" style="max-height: 650px;overflow-y: scroll;">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" ng-init="fetchTargets()">
                                <thead>
                                                                    <tr>
                                                                        <?php
                                                                        foreach ($theads as $key => $heading) {
                                                                            $styles = '';
                                                                            if ($key == 0) {
                                                                                $styles = "position: sticky; left: 0; z-index: 2; top: 0;background-color: #fff;";
                                                                            } elseif ($key == 1) {
                                                                                $styles = " position: sticky; left: 120px; z-index: 2;top: 0; background-color: #fff;";
                                                                            }else{
                                                                                $styles = 'background-color:#f1f1f1;';
                                                                            }
                                                                        ?>
                                                                            <th class="popup" style="position: sticky;min-width: 120px;<?= $styles ?> top:0px;">
                                                                                <?php echo $heading; ?>
                                                                            </th>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </tr>
                                                                    <tr>
                                                                        <th  class="popup"  style="position: sticky; left: 0; z-index: 3; top: 61px; background-color:#fff;"></th>
                                                                        <th  class="popup"  style="min-width: 120px;position: sticky; left: 120px; z-index: 3;top: 61px;background-color:#fff">Unit of Measures</th>
                                                                        <?php
                                                                        foreach ($uoms as $key => $item) {

                                                                        ?>
                                                                            <th  class="popup"  style="position: sticky;min-width: 120px;white-space: nowrap;top: 61px;background-color:#f1f1f1;"><?= $item ?></th>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </tr>
                                                                </thead>
                                    <tbody ng-repeat="names in targets">
                                        <tr>
                                            <td colspan="2" style="font-size: 12px;position: sticky;left: 0;background-color:#fff;" class="text-start fw-bold">{{names.sales_group_name}}</td>
                                            <td colspan="12"></td>
                                        </tr>

                                        <tr class="trpoint" ng-repeat="entry in names.salesperson">
                                            <td style="font-size: 12px;position: sticky;left: 0;background-color:#fff;"colspan="2" class="text-start"> {{ entry.sales_person_name   }} </td>
                                            <?php
                                                                        foreach ($lineData as $key => $item) {
                                                                        ?>
                                                <td class="editable" data-team-id="{{ entry.sales_team_id }}" data-sales-id="{{ entry.sales_team_id }}" data-field="<?= $item['cat_id'] ?>" style="font-size: 12px;">
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


                // usort($sales_team, 'sortByName');

                foreach ($customers as $val) {
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

                foreach ($lineData as $val) {
                ?>
                    <option value="<?php echo $val['cat_id']; ?>"><?php echo ucfirst(str_replace('_',' ',$val['field_name'])); ?></option>
                <?php
                }
                ?>
            </select>
        </div>



        <div class="col-md-3">
            <input type="month" class="form-control" id="from-month-cat" value="<?php echo date('Y-m'); ?>">
        </div>
        <!-- <div class="col ">
            <div class="btn btn-secondary change-view">Back</div>

        </div> -->
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
                    <td class="editable" data-cat-id="{{entry.cat_id}}" data-field="{{entry.cat_id}}" data-sales-id="{{ names.id }}" data-team-id="{{ names.id }}" data-sl-id="{{ names.id }}" data-month-index="<?= $i ?>" style="font-size: 12px;">
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
                        <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> -->
                    </div>
                </div>
            </div>


    </div>
    <script>
        $(document).ready(() => {
            $('#select_sl').on('click', () => {
                $('input.custom-control-input[value=""]').parent().remove();

            })
            $('#select_cat').on('click', () => {
                $('input.custom-control-input[value=""]').parent().remove();

            })

            $('.category-target').show()
            $('.month-target').hide()
        //     $('.change-view').on('click', function() {
        //         $('.category-target').toggle();
        //         $('.month-target').toggle();
        //     });
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


        app.directive('salesBlock', function($parse) {

            console.log("$parse", $parse)

            return {
                // restrict: 'E',
                // replace: true,
                // transclude: true,
                template: component,
            }
        })


        app.filter('number', function() {
            return function(input) {
                if (!isNaN(input)) {
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
                }
            }
        });

        app.controller('crudController', function($scope, $http) {

              <?php
    if($this->session->userdata['logged_in']['access'] == '1' || $this->session->userdata['logged_in']['access'] == '15'){
    ?>
            $(document).on("dblclick", ".editable", function(e) {
                var $this = $(this);
                let prevVal = $this.text().trim();
                // Create an input element
                var $input = $('<input>', {
                    type: 'text',
                    value:  $this.text().replace(/,/g, '').trim(),
                    style: 'width: 50px;margin: 5px;',
                    class: 'newIp form-control'
                });
                let fromdate = $('#from-date').val();

                $this.html($input);

                $input.focus();

                $input.on('blur', function() {
                    var newValue = $input.val();
                    $this.text(newValue);
                    
                    const formdata = {
                        id: $this.attr('data-sales-id'),
                        target: newValue,
                        field_name: $this.attr('data-field'),
                        report_name: 'sales_product_unit_wise',
                        for_date: fromdate
                    }

                    console.log("formdata", formdata);
                    if (prevVal != newValue) {
                        $http.post('<?php echo base_url() ?>index.php/salesteam/updateTarget', formdata)
                            .then(function(response) {
                                console.log('POST request successful:', response.data);
                                 $scope.search()
                                $scope.fetchTargets();
                                $scope.fetchCatTargets();

                            })
                            .catch(function(error) {
                                console.error('POST request error:', error);
                            });
                    }

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
                // console.log("formattedDate", formattedDate);
                // return;
                let prevVal = $this.text().trim();
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
                        report_name: 'sales_product_unit_wise',
                        for_date: formattedDate
                    }

                    console.log("formdata", formdata);
                    if (prevVal.replace(/,/g, '') != newValue) {
                        $http.post('<?php echo base_url() ?>index.php/other_reports/setYearTarget', formdata)
                            .then(function(response) {
                                $scope.search();
                                $scope.fetchTargets();
                                $scope.fetchCatTargets();
                                console.log('POST request successful:', response.data);
                            })
                            .catch(function(error) {
                                console.error('POST request error:', error);
                            });
                    }
                    $this.html(newValue);
                });

            });

            <?php 
        }
        ?>
            // $scope.salesData = ['TUP Team', 'Sales Team', 'Shop Team', 'Cbe Team', 'Project Team A', 'Project Team B'];
            $scope.salesData = [];
            $scope.search = function() {
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var status = $('#filterStatus') && $('#filterStatus').is(':checked') ?   $('#filterStatus').is(':checked') : false;

                $scope.formdate = fromdate;
                $scope.todate = fromto;

                // $('#search-view').show();
                // $('#search-view1').hide();
                // $('#exportdata').show();
                var cateid = $('#choices-single-default').val();
                var sales_group = $('#sales_group').val();



                $scope.fetchSalesProductReportData(cateid, sales_group,status);
            };
            $('#exportdata').on('click', function () {
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var status = $('#filterStatus') && $('#filterStatus').is(':checked') ?   $('#filterStatus').is(':checked') : false;

                $scope.formdate = fromdate;
                $scope.todate = fromto;

                // $('#search-view').show();
                // $('#search-view1').hide();
                // $('#exportdata').show();
                var cateid = $('#choices-single-default').val();
                var sales_group = $('#sales_group').val();



                $scope.fetchSalesProductReportDataExport(cateid, sales_group,status);
            })
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
            $scope.fetchSalesProductReportDataExport = function(cateid, sales_group,status) {

         
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();

                let url = '<?php echo base_url() ?>index.php/other_reports/fetch_data_sales_product_report_export?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&sales_group=' + sales_group + '&order_status=' + cateid+'&active_status=' + status 
                window.location = url;
                }
                $scope.fetchTargets = function() {
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
                var cateid = $('#sales_group_target').val();
                var fromMonth = $('#from-month').val();
                var sales_group = $('#sales_group').val();
                var status = $('#filterStatus') && $('#filterStatus').is(':checked') ? $('#filterStatus').is(':checked') : false;
                var url = 'index.php/other_reports/fetch_data_sales_product_unit_targets';
                var salepersonArr = getJson(true);
                if(salepersonArr[0]['states[]'] && salepersonArr[0]['states[]'].includes('All')){
                    cateid = 'All';
                } else{
                    cateid = salepersonArr[0]['states[]'].join(',');
                }
                function formatVal(input) {
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
                                 foreach ($lineData as $key => $item) {
                                ?>
                                    $(`td[data-sales-id="${el1.sales_team_id}"][data-field="<?= $item['cat_id'] ?>"]`).html(formatVal(el1.data.find(el => el['cat_id'] == '<?= $item['cat_id'] ?>').target));
                                <?php
                                }
                                ?>

                            })
                        })
                    }, 500)
                });

            }

                $(function () {
               
               $('#sales_group_target, #from-month').on('change optionselected optiondeselected', function() {
                   $scope.fetchTargets();
                   let dateState = new Date($('#from-month').val() + '-01');
                   let headings = $('th[data-field="month-head"]');
                   headings = headings.sort((a, b) => {
                       const indexA = parseInt($(a).attr('data-month-index'));
                       const indexB = parseInt($(b).attr('data-month-index'));
                       return indexA - indexB;
                   });
                  
   
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
              <?php
    if($this->session->userdata['logged_in']['access'] == '1' || $this->session->userdata['logged_in']['access'] == '15'){
    ?>
            $scope.fetchCatTargets = function() {

                var getJson = function(b) {
                    var result = $.fn.filterMultiSelect.applied.map((e) => JSON.parse(e.getSelectedOptionsAsJson(b)));
                    if(result.length  && result[0]["states[]"]){
                        return result[1]["sl[]"];
                     }else{
                        return ['All'];
                     }
                    
                }

                var getJsonCats = function(b) {
                    var result = $.fn.filterMultiSelect.applied.map((e) => JSON.parse(e.getSelectedOptionsAsJson(b)));
                    if(result.length  && result[0]["states[]"]){
                        return result[2]["cat[]"];
                     }else{
                        return ['All'];
                     }
                }
                var cateid = $('#sales_group_target').val();
                var fromMonth = $('#from-month-cat').val();
                var sales_group = $('#sales_group').val();
                var status = $('#filterStatus') && $('#filterStatus').is(':checked') ? $('#filterStatus').is(':checked') : false;
                var url = 'index.php/other_reports/fetch_data_sales_category_unit_targets';
                var salepersonArr = getJson(true);
                var categories = getJsonCats(true);
                console.log("salepersonArr",salepersonArr)
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
            $scope.fetchSalesProductReportData = function(cateid, sales_group,status) {

                // $('.setload').show();
                $scope.loading = true;
                var order_status = 1;
                var payment_mode = 1;
                var productid = 1

                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();

                $http.get('<?php echo base_url() ?>index.php/other_reports/fetch_data_sales_product_report?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&sales_group=' + sales_group + '&order_status=' + cateid+'&active_status=' + status).success(function(data) {

                    // $('tbody[data-sales-id]').html('');
                    // $('tbody').last().html('');
                    $scope.query = {}
                    $scope.queryBy = '$';
                    $scope.salesData = data[0];
                        function formatNumber(number) {
                            if(number){
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
                            }else{
                                return 0;
                            }
                           
                        }
                    let gTotalsData = data['totals'];
                    let arasf = data['arasf'];
                    let topaaz = data['topaaz'];
                    $('table.main tbody').html('');

                    data[0].map((el) => {
                        let teamGroupId = el.sales_team_id;
                        let component = '';
                        let newTbody = $("<tbody></tbody>");

                        component += `<tr class="primary" style="overflow:scroll;background-color:#FFD966;">
                                                                        <td colspan="2" style="position: sticky; left: 0; top: 0; z-index: 1;background-color:#FFD966;box-shadow: inset 1px 0px 0px 2px #e0e0e0;"><b>${el.sales_group_name}</b></td>
                                                                        <td colspan="<?= count($lineData) ?> ">
                                                                            
                                                                        </td>
                                                                    </tr>`



                                                        el.salesperson && el.salesperson.map((el1, i) => {
                                                            // console.log("el1: ",el1.sales_data.find((el) => { el.field_name == 'accessories' }).field_name);
                                                            component += `<tr>

                                <td class="bg-white" style="position: sticky; left: 0; z-index: 1;"></td>
                                <td class="bg-white text-danger text-bold" style="min-width: 150px;position: sticky; left: 150px; z-index: 1;">
                                    <b>  Target</b>
                                </td>
                                <?php
                                foreach ($lineData as $item) {

                                ?>
                                    
                                    <td ><div data-sales-id="${el1.sales_team_id}" data-field="<?= $item['cat_id'] ?>" class="editable">${formatNumber(el1.sales_data.find(item => item.field_name == "<?= $item['field_name'] ?>" )['target'])}</div></td>
                                <?php
                                }
                                ?>

                                </tr>
                                <tr>
                                <td class="bg-white" style="position: sticky; left: 0; z-index: 1;"></td>
                                <td class="bg-white" style="min-width: 150px;position: sticky; left: 150px; z-index: 1;"> <b>${el1.sales_person_name}</b></td>
                                <?php
                                foreach ($lineData as $key => $item) {

                                ?>
                                    <td style="min-width: 150px;white-space: nowrap;">${formatNumber(el1.sales_data.find(item => item.field_name == '<?= $item['field_name'] ?>' )['overall'])}</td>
                                <?php
                                }
                                ?>

                                </tr>

                                <tr>
                                <td class="bg-white" style="position: sticky; left: 0; z-index: 1;"></td>
                                <td class="bg-white text-end text-danger" style="min-width: 150px;position: sticky; left: 150px; z-index: 1;"> Returns </td>
                                <?php
                                foreach ($lineData as $key => $item) {

                                ?>
                                    <td style="min-width: 150px;white-space: nowrap;">${formatNumber(el1.sales_data.find(item => item.field_name == '<?= $item['field_name'] ?>' )['returns'])}</td>
                                <?php
                                }
                                ?>

                                </tr>

                                <tr>
                                <td class="bg-white" style="position: sticky; left: 0; z-index: 1;"></td>
                                <td class="bg-white text-end" style="min-width: 150px;position: sticky; left: 150px; z-index: 1;"> <b>Actual<b/> </td>
                                <?php
                                foreach ($lineData as $key => $item) {

                                ?>
                                    <td style="min-width: 150px;white-space: nowrap;">${formatNumber(el1.sales_data.find(item => item.field_name == '<?= $item['field_name'] ?>' )['actual'])}</td>
                                <?php
                                }
                                ?>

                                </tr>

                                <tr>
                                <td class="bg-white" style="position: sticky; left: 0; z-index: 1;"></td>
                                <td class="bg-white" style="min-width: 150px;position: sticky; left: 150px; z-index: 1;">Required Target</td>
                                <?php
                                foreach ($lineData as $key => $item) {

                                ?>
                                    <td class="text-info" style="min-width: 150px;white-space: nowrap;">${formatNumber(el1.sales_data.find(item => item.field_name == '<?= $item['field_name'] ?>' )['required_target'])}</td>
                                <?php
                                }
                                ?>

                                </tr>
                                <tr>
                                <td class="bg-white" style="position: sticky; left: 0; z-index: 1; border-bottom:1px solid #000;"></td>
                                <td class="bg-white" style="min-width: 150px;position: sticky; left: 150px; z-index: 1; border-bottom:1px solid #000;"></td>
                                <?php
                                foreach ($lineData as $key => $item) {
                                   
                                ?>
                                    <td class="${el1.sales_data.find(item => item.field_name == '<?= $item['field_name'] ?>' )['status'] ? 'text-success' : 'text-danger'}" style="min-width: 150px;white-space: nowrap; border-bottom:1px solid #000;">${el1.sales_data.find(item => item.field_name == '<?= $item['field_name'] ?>' )['status'] ? 'AHEAD' : 'UNDER TARGET'}</td>
                                <?php
                                }
                                ?>

                                </tr>`;


                            // console.log(el)

                        })




                        component += `<tr style="overflow:scroll;background-color:#cbffd3">
                                                                            <td style="position: sticky; left: 0; z-index: 1;background-color:#cbffd3"></td>
                                                                            <td style="min-width: 150px;position: sticky; left: 150px; z-index: 1;background-color:#cbffd3">TARGET TOTAL</td>
                                                                            <?php
                                                                            foreach ($lineData as $key => $item) {

                                                                            ?>
                                                                                <td class="text-dark" style="min-width: 150px;white-space: nowrap;">
                                                                                ${formatNumber(el.totals.find(item => item.cat_id == '<?= $item['cat_id'] ?>' )['target_total'])}
                                                                                </td>
                                                                            <?php
                                                                            }
                                                                            ?>

                                                                        </tr>
                                                                        <tr style="overflow:scroll;background-color:#efefef">
                                                                            <td   style="background-color:#efefef;position: sticky; left: 0; z-index: 1; border-bottom:1px solid #000;"></td>
                                                                            <td  style="background-color:#efefef;min-width: 150px;position: sticky; left: 150px; z-index: 1; border-bottom:1px solid #000;">TOTAL</td>
                                                                            <?php
                                                                            foreach ($lineData as $key => $item) {
                                                                            ?>
                                                                                <td style="min-width: 150px;white-space: nowrap; border-bottom:1px solid #000;">
                                                                                ${formatNumber(el.totals.find(item => item.cat_id == '<?= $item['cat_id'] ?>' )['actual_total'])}
                                                                                 </td>
                                                                            <?php
                                                                            }
                                                                            ?>

                                                                        </tr>`;

                                                                        newTbody.append(component);
                                                                        $('table.main').append(newTbody)

                    })

                    // }, 1000)
                    let gTotals = `<tr style="overflow:scroll;background-color:#efefef">
                                                                        <td style="background-color:#efefef;position: sticky; left: 0; z-index: 1; border-bottom:1px solid #000;"></td>
                                                                        <td style="background-color:#efefef;min-width: 150px;position: sticky; left: 150px; z-index: 1; border-bottom:1px solid #000;"><b>GRAND TOTAL</b></td>
                                                                        <?php
                                                                        foreach ($lineData as $key => $item) {
                                                                        ?>
                                                                            <td class="text-danger" style="min-width: 150px;white-space: nowrap; border-bottom:1px solid #000;"><b>
                                                                            ${formatNumber(gTotalsData.length && gTotalsData.find(item => item.cat_id == '<?= $item['cat_id'] ?>' )['actual_total'])}
                                                                            
                                                                            </b></td>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </tr>`;
                                                                    let topaazRow = `<tr style="overflow:scroll;background-color:#efefef">
                                                                        <td style="background-color:#efefef;position: sticky; left: 0; z-index: 1; border-bottom:1px solid #000;"></td>
                                                                        <td style="background-color:#efefef;min-width: 150px;position: sticky; left: 150px; z-index: 1; border-bottom:1px solid #000;"><b>Topaaz</b></td>
                                                                        <?php
                                                                        foreach ($lineData as $key => $item) {
                                                                        ?>
                                                                            <td class="text-danger" style="min-width: 150px;white-space: nowrap; border-bottom:1px solid #000;"><b>
                                                                            ${formatNumber(topaaz.find(item => item.cat_id == '<?= $item['cat_id'] ?>' )['actual'])}
                                                                            
                                                                            </b></td>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </tr>`;
                                                                    let arasfRow = `<tr style="overflow:scroll;background-color:#efefef">
                                                                        <td style="background-color:#efefef;position: sticky; left: 0; z-index: 1; border-bottom:1px solid #000;"></td>
                                                                        <td style="background-color:#efefef;min-width: 150px;position: sticky; left: 150px; z-index: 1; border-bottom:1px solid #000;"><b>Arasfirma</b></td>
                                                                        <?php
                                                                        foreach ($lineData as $key => $item) {
                                                                        ?>
                                                                            <td class="text-danger" style="min-width: 150px;white-space: nowrap; border-bottom:1px solid #000;"><b>
                                                                            ${formatNumber(arasf.find(item => item.cat_id == '<?= $item['cat_id'] ?>' )['actual'])}
                                                                            
                                                                            </b></td>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </tr>`;

                  

                    let secTbody = $('<tbody class="totals"></tbody>');
                    let commonTbody = $('<tbody></tbody>');
                    commonTbody.append($(topaazRow));
                    commonTbody.append($(arasfRow));
                    $('table.main').last('tbody').after().append(commonTbody);
                   secTbody.append(gTotals);
                    $('table.main').last('tbody').after().append(secTbody);
                   
                  
                    // $('tbody').attr('data-sales-id', 'arasf').append(arasfRow);
                    // $('tbody[data-section="arasf"]').append(arasfRow);
                    $scope.loading = false;
                    $('.setload').hide();

                });

                

            }
            

        });
    </script>
  



    <?php include('footer.php'); ?>
</body>