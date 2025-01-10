<?php include "header.php"; ?>

<style>
    * {
        transition: all 0.35s cubic-bezier(0.075, 0.82, 0.165, 1);
    }

    .trpoint {
        cursor: pointer;
    }

    .getview {
        /* background: #ffe998; */
    }

    .transform-icon {
        transform: rotate(180deg);
        color: #ff5e14 !important;
    }

    .border-none {
        border: none !important;
    }

    .primary,
    .secondchild {
        width: 100%;
        display: contents;
    }

    .chriedchild {
        cursor: pointer;
        width: 100%;
        display: contents;
    }

    .page-title-box {
        padding-bottom: 8px;
    }

    .sales_name {
        font-size: 12px !important;
        /* font-family: Arial, Helvetica, sans-serif; */
    }

    .chri-ch {
        color: rgb(0, 0, 0);
        /* background-color: #ffffff; */
        /* font-family: system-ui; */
        font-weight: 700;
        cursor: pointer;
    }

    .pri-main {
        color: #e76529;
        font-family: sans-serif;
        font-size: 17px !important;
    }

    .sales_table_head {
        /* background-color: rgb(245 234 234); */
        color: rgb(0 0 0);
    }

    .card-body {
        padding: 10px 8px;
    }

    #resp-table {
        width: 100%;
        display: table;
    }

    #resp-table-body {
        display: table-row-group;
        font-size: 8px;
    }

    .resp-table-row {
        display: table-row;


    }

    .table-body-cell {
        display: table-cell;
        border: 1px solid #e0e0e0;
        padding: 0px 4.5px;
        line-height: 2.428571;
        margin-left: 0px;
        vertical-align: middle;
        font-size: 12px;
        text-align: center;
        /* height: 50px; */
    }


    .loading {
        text-align: center;
    }



    .card-header {
        display: block;
        text-align: center;
        border-bottom: none;
    }

    b.ng-binding.ng-scope {
        font-size: 12px;
        /* padding: 5px; */
    }

    .table-responsive {
        max-height: 750px;
    }

    b.ng-binding {
        font-size: 11px;
    }

    td a {
        color: black;
    }

    .shownullvalue {
        display: none;
    }

    .choices__inner {
        padding: 0px 9px;
    }

    .choices__input {
        /* background-color: #fff; */
    }

    .choices__list--multiple .choices__item {
        display: inline-block;
        vertical-align: middle;
        border-radius: 20px;
        padding: 3px 8px;
        font-size: 12px;
        font-weight: 500;
        margin-right: 3.75px;
        margin-bottom: -2.25px;
        /* background-color: #00bcd4; */
        border: 1px solid #fff;
        color: #fff;
        word-break: break-all;
        box-sizing: border-box;
    }


    .custom-header {
        color: #000;
        height: 50px;
        font-weight: 500;
        font-size: 11px;
        background-color: #f2f2f2;
        text-align: center;
        /* border: 1px solid #ffffff; */
        /* backdrop-filter: blur(3px) brightness(0.5); */
        width: 80px;
        /* backdrop-filter: blur(2px) brightness(1); */
    }

    .table-body-cell.custom-header {
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

    .custom-header-tot {
        color: #000;
        height: 50px;
        font-size: 16px;
        background-color: #ffffffa3;
        text-align: right;
        font-weight: bold;
        /* border: 1px solid #ffffff; */
        backdrop-filter: blur(3px) brightness(0.5)
            /* box-shadow: 3px 0px 3px 2px #3535353b; */
        ;
        font-family: sans-serif;
    }

    .price-main {
        /* color: cadetblue; */
        text-align: center;
    }

    .price-sl {
        text-align: center;
        font-size: 12px;
        color: cadetblue;
    }

    .price-c {
        text-align: right;
        font-size: 12px;
    }

    .price-sl b {
        color: cadetblue;
        font-size: 12px !important;
    }

    .price-c b {
        color: #000;
        font-size: 12px !important;
    }

    .table-responsive {
        background: radial-gradient(circle at left, rgb(255 255 255 / 38%) -153%, rgb(255 255 255) 45%);
    }

    .resp-table-row.trpoint {
        background: #f0f0f0;
        text-align: center;
        color: #666666;
        font-weight: 600;
    }

    .choices__list {
        z-index: 2;
    }

    .btn-check:active+.btn-outline-danger,
    .btn-check:checked+.btn-outline-danger,
    .btn-outline-danger.active,
    .btn-outline-danger.dropdown-toggle.show,
    .btn-outline-danger:active {
        color: #fff;
        background-color: #ff5e14;
        border-color: #ff5e14;
    }

    .btn-outline-danger:hover {
        color: #fff;
        background-color: #d74400;
        border-color: #ff5e14;
    }

    .setload .table-body-cell {
        border-left: none !important;
        border-right: none !important;
    }

    .blue-section {
        background-color: #e5f6ff !important;
    }
    .totals div {
    font-size: 12px !important;
    font-weight: bold;
}
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp"
    ng-controller="crudController">
    <div id="layout-wrapper">
        <?php echo $top_nav; ?>
        <?php
        $customer_id = 0;
        if (isset($_GET['customer_id'])) {
            $customer_id = $_GET['customer_id'];
        }

        ?>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Enquiry report</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a
                                                href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Enquiry report !</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card1">
                                <div class="card-body1">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form>
                                                <div class="row">
                                                    <div class="col"> <!--data-trigger -->
                                                        <select class="form-control" data-trigger
                                                            name="choices-single-default" id="choices-single-default">
                                                            <option value="ALL">All Sales Team</option>
                                                            <?php
                                                            foreach ($sales_team as $val) {
                                                                ?>
                                                                <option value="<?php echo $val->id; ?>">
                                                                    <?php echo $val->name; ?>
                                                                </option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="col">
                                                        <select class="form-control" id="sales_group"
                                                            ng-model="sales_group" ng-change="salesgroupChanged()">
                                                            <option value="ALL">All Sales Group</option>

                                                            <?php

                                                            foreach ($sales_group as $vals) {
                                                                ?>
                                                                <option value="<?php echo $vals->id; ?>">
                                                                    <?php echo $vals->name; ?>
                                                                </option>

                                                                <?php
                                                            }

                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <input type="date" class="form-control" id="from-date"
                                                            value="<?php echo date('Y-m-d'); ?>">
                                                    </div>
                                                    <div class="col" style="display:none;">
                                                        <input type="date" class="form-control" id="to-date"
                                                            value="<?php echo $this->session->userdata['logged_in']['to_date']; ?>">
                                                    </div>
                                                    <div class="col">
                                                        <button type="button"
                                                            class="btn btn-secondary waves-effect waves-light"
                                                            ng-click="search()">Search</button>

                                                        <button type="button"
                                                            class="btn btn-success waves-effect waves-light"
                                                            id="exportdata">Export</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-sm-4" style="display:none;">
                                                    <div class="dataTables_length" id="example_length">

                                                        <input type="hidden" id="nextnumber" value="0">
                                                        <input type="hidden" id="prenumber" value="1">
                                                        <input type="hidden" id="pageSize" value="1">
                                                        <select name="example_length" aria-controls="example"
                                                            class="form-control input-sm" ng-model="pageSize"
                                                            ng-change="pageSizeChanged()">
                                                            <option value=""> Group Length</option>
                                                            <option value="1">1</option>
                                                            <option value="4">4</option>
                                                            <option value="8">8</option>
                                                            <option value="12">12</option>
                                                            <option value="20"> 12 and above</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive" style="background: #fff;">
                                                <div class="resp-table-row" style="position: sticky;top: 0px;z-index:1;"
                                                    class="table table-bordered" ng-init="fetchDatagetlegderGroup(0)">

                                                    <div class="table-body-cell  custom-header"> </div>
                                                    <div class="table-body-cell custom-header"
                                                        style="width: 150px; border-top:none;"
                                                        >

                                                    </div>


                                                    <div class="table-body-cell custom-header blue-section border-none">
                                                        
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section border-none">
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section border-none">
                                                    <span style="font-size: 16px;font-weight: bold;">OLD</span>

                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section border-none">
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section border-none">
                                                    </div>
                                                    <div class="table-body-cell custom-header border-none">
                                                    </div>
                                                    <div class="table-body-cell custom-header border-none">

                                                    </div>
                                                    <div class="table-body-cell custom-header border-none">
                                                    <span style="font-size: 16px;font-weight: bold;position: relative;left: 40px;">TODAY</span>

                                                    </div>
                                                    <div class="table-body-cell custom-header border-none">
                                                    </div>
                                                    <div class="table-body-cell custom-header border-none">
                                                    </div>
                                                    <div class="table-body-cell custom-header border-none">
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section border-none">

                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section border-none">

                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section border-none">
                                                    <span style="font-size: 16px;font-weight: bold;">TOTAL</span>

                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section border-none">
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section border-none">
                                                    </div>
                                                    <div class="table-body-cell custom-header border-none">

                                                    </div>
                                                    <div class="table-body-cell custom-header border-none">
                                                    <span style="font-size: 16px;font-weight: bold;position: relative;left: 50px;">PERC %</span>

                                                    </div>
                                                    <div class="table-body-cell custom-header border-none">
                                                    </div>
                                                    <div class="table-body-cell custom-header border-none">
                                                    </div>
                                                </div>

                                                <div class="resp-table-row"
                                                    style="position: sticky;top: 50px;z-index:1;"
                                                    class="table table-bordered">

                                                    <div class="table-body-cell  custom-header">No</div>
                                                    <div class="table-body-cell custom-header"
                                                        style="width: 200px;" ng-click="resetCollapse()">
                                                        Name</div>
                                                    <div class="table-body-cell custom-header blue-section">
                                                        ENQUIRY
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section">
                                                        CONVERTED ENQUIRY
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section">
                                                        PENDING ENQUIRY
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section">
                                                        MISSING
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section">
                                                        BILLS
                                                    </div>
                                                    <div class="table-body-cell custom-header ">
                                                        ENQUIRY
                                                    </div>
                                                    <div class="table-body-cell custom-header ">
                                                        CONVERTED ENQUIRY
                                                    </div>
                                                    <div class="table-body-cell custom-header ">
                                                        OLD CONVERTED ENQUIRY
                                                    </div>
                                                    <div class="table-body-cell custom-header">
                                                        PENDING ENQUIRY</div>
                                                    <div class="table-body-cell custom-header">
                                                        MISSING ENQUIRY</div>
                                                      
                                                    <div class="table-body-cell custom-header">
                                                        BILLS</div>

                                                   
                                                   
                                                    <div class="table-body-cell custom-header blue-section">
                                                        ENQUIRY</div>
                                                    <div class="table-body-cell custom-header blue-section">
                                                        CONVERTED ENQUIRY</div>
                                                    <div class="table-body-cell custom-header blue-section">
                                                        PENDING ENQUIRY</div>
                                                    <div class="table-body-cell custom-header blue-section">
                                                        MISSING</div>
                                                    <div class="table-body-cell custom-header blue-section">
                                                        BILLS</div>
                                                    <div class="table-body-cell custom-header">
                                                        CONVERTED </div>
                                                   
                                                    <div class="table-body-cell custom-header">
                                                        PENDING </div>
                                                        <div class="table-body-cell custom-header">
                                                        MISSING </div>
                                                    <div class="table-body-cell custom-header">
                                                        BILLING </div>
                                                </div>
                                                <div class="resp-table-row totals"style="position: sticky;top: 118px;box-shadow: 0px 5px 5px 0px #e7e7e7;z-index:1;"
                                                    class="table table-bordered">
                                                    <div class="table-body-cell  custom-header"> </div>
                                                    <div class="table-body-cell custom-header"
                                                        style="position: sticky;top: 118px;box-shadow: 0px 4px 12px 2px #e7e7e7;z-index:1; cursor:pointer"
                                                        ng-click="expandAll()">
                                                        Totals:
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section totalcount">
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section totalconvert">
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section totalbillingpending">
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section totalmissed">
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section totalbilling">
                                                    </div>
                                                    <div class="table-body-cell custom-header today_totalcount">
                                                    </div>
                                                    <div class="table-body-cell custom-header today_totalconvert">
                                                    </div>
                                                    <div class="table-body-cell custom-header today_old_convert">
                                                    </div>
                                                    <div class="table-body-cell custom-header today_totalbillingpending">
                                                    </div>
                                                    <div class="table-body-cell custom-header today_totalmissed">
                                                    </div>
                                                   
                                                    <div class="table-body-cell custom-header today_totalbilling">
                                                        
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section total_totalcount">
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section total_totalconvert">
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section total_totalbillingpending">
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section total_totalmissed">
                                                    </div>
                                                    <div class="table-body-cell custom-header blue-section total_totalbilling">
                                                    </div>
                                                    <div class="table-body-cell custom-header convertion">
                                                    </div>
                                                    <div class="table-body-cell custom-header pending">
                                                    </div>
                                                    <div class="table-body-cell custom-header missed">
                                                    </div>
                                                   
                                                    <div class="table-body-cell custom-header billing">
                                                    </div>
                                                </div>
                                                <div class="primary" ng-repeat="data in namesDataledgergroup">
                                                               <div class="resp-table-row trpoint" style=" box-shadow: inset -1px 0px 0px 3px #f0f0f0f7;" ng-click="toggleCollapse($event,data.teamGroupIndex,data.groupIndex,data.index)">
                                                                  <div class="table-body-cell"> </div>
                                                                  <div class="table-body-cell " style="width: 150px; text-align:start;">
                                                                     {{ data.key }} <i style="color:#cfcfcf;float: right;margin: 7px;" class="mdi mdi-arrow-up-thick float-right"></i>
                                                                  </div>
                                                                  <div class="table-body-cell  blue-section">
                                                                    {{ data.totalcount }}
                                                                  </div>
                                                                  <div class="table-body-cell  blue-section" >
                                                                    {{ data.totalconvert }}
                                                                  </div>
                                                                  <div class="table-body-cell    blue-section" >
                                                                    {{ data.totalbillingpending }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section">
                                                                    {{ data.totalmissed }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section" >
                                                                    {{ data.totalbilling }}
                                                                  </div>
                                                                  <div class="table-body-cell  " >
                                                                    {{ data.today_totalcount }}
                                                                  </div>
                                                                  <div class="table-body-cell  ">
                                                                    {{ data.today_totalconvert }}
                                                                  </div>
                                                                  <div class="table-body-cell  " >
                                                                    {{ data.today_old_convert }}
                                                                  </div>
                                                                  <div class="table-body-cell    " >
                                                                    {{ data.today_totalbillingpending }}
                                                                  </div>
                                                                  <div class="table-body-cell   " >
                                                                    {{ data.today_totalmissed }}
                                                                  </div>
                                                                  
                                                                  <div class="table-body-cell  " >
                                                                    {{ data.today_totalbilling }}
                                                                  </div>
                                                                  <div class="table-body-cell    blue-section" >
                                                                    {{ data.total_totalcount }}
                                                                  </div>
                                                                  <div class="table-body-cell    blue-section" >
                                                                    {{ data.total_totalconvert }}
                                                                  </div>
                                                                  <div class="table-body-cell    blue-section" >
                                                                    {{ data.total_totalbillingpending }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section" >
                                                                    {{ data.total_totalmissed }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section" >
                                                                    {{ data.total_totalbilling }}
                                                                  </div>
                                                                  <div class="table-body-cell  text-end" >
                                                                    {{ data.convertion }}&nbsp;%
                                                                  </div>
                                                                  <div class="table-body-cell  text-end" >
                                                                    {{ data.pending }}&nbsp;%
                                                                  </div>
                                                                  <div class="table-body-cell  text-end" >
                                                                    {{ data.missed }}&nbsp;%
                                                                  </div>
                                                                 
                                                                  <div class="table-body-cell  text-end" >
                                                                    {{ data.billing }}&nbsp;%
                                                                  </div>
                                                               </div>
                                                               <div class="primary" ng-repeat="names in data.values">
                                                                  <div class="resp-table-row trpoint" style="background: #ffffff;" ng-if="(!names.collapsed)" ng-click="toggleCollapse($event,names.teamGroupIndex,names.groupIndex,names.index)">
                                                                     <div class="table-body-cell"> </div>
                                                                     <div class="table-body-cell " style="width: 150px; text-align:center;">
                                                                        {{ names.sales_group_name }} <i style="color:#cfcfcf;float: right;margin: 7px;" class="mdi mdi-arrow-up-thick float-right"></i>
                                                                     </div>
                                                                     <div class="table-body-cell blue-section">
                                                                        {{ names.totalcount }}
                                                                     </div>
                                                                 
                                                                  <div class="table-body-cell blue-section" >
                                                                    {{ names.totalconvert }}
                                                                  </div>
                                                                  <div class="table-body-cell    blue-section" >
                                                                    {{ names.totalbillingpending }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section">
                                                                    {{ names.totalmissed }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section" >
                                                                    {{ names.totalbilling }}
                                                                  </div>
                                                                  <div class="table-body-cell  " >
                                                                    {{ names.today_totalcount }}
                                                                  </div>
                                                                  <div class="table-body-cell  ">
                                                                    {{ names.today_totalconvert }}
                                                                  </div>
                                                                  <div class="table-body-cell  " >
                                                                    {{ names.today_old_convert }}
                                                                  </div>
                                                                  <div class="table-body-cell  " >
                                                                    {{ names.today_totalbillingpending }}
                                                                  </div>
                                                                  <div class="table-body-cell  " >
                                                                    {{  names.today_totalmissed }}
                                                                  </div>
                                                                 
                                                                  <div class="table-body-cell  " >
                                                                    {{ names.today_totalbilling }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section" >
                                                                    {{ names.total_totalcount }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section" >
                                                                    {{ names.totalconvert }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section" >
                                                                    {{ names.total_totalbillingpending }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section" >
                                                                    {{ names.total_totalmissed }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section" >
                                                                    {{ names.total_totalbilling }}
                                                                  </div>
                                                                  <div class="table-body-cell  text-end" >
                                                                    {{ names.convertion }} &nbsp;%
                                                                  </div>
                                                                  <div class="table-body-cell  text-end" >
                                                                    {{  names.pending }}&nbsp;%
                                                                  </div>
                                                                  <div class="table-body-cell  text-end" >
                                                                    {{ names.missed }}&nbsp;%
                                                                  </div>
                                                                 
                                                                  <div class="table-body-cell  text-end" >
                                                                    {{ names.billing }}&nbsp;%
                                                                  </div>
                                                                  </div>
                                                                  <div class="secondchild" ng-repeat="namesvvssget in names.subarray">
                                                                     <div class="resp-table-row sales_table_head slide" ng-if="!namesvvssget.collapsed" ng-click="toggleCollapse($event,namesvvssget.teamGroupIndex,namesvvssget.groupIndex,namesvvssget.index)" style="background-color: #f9f9f9;">
                                                                        <div class="table-body-cell price-sl">{{ namesvvssget.no }}</div>
                                                                        <div class="table-body-cell" style="width: 150px; text-align:right;">
                                                                           {{ namesvvssget.sales_team }}
                                                                        </div>
                                                                       <div class="table-body-cell blue-section">
                                                                        {{ namesvvssget.totalcount }}
                                                                  </div>
                                                                  <div class="table-body-cell blue-section" >
                                                                    {{ namesvvssget.totalconvert }}
                                                                  </div>
                                                                  <div class="table-body-cell    blue-section" >
                                                                    {{ namesvvssget.totalbillingpending }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section">
                                                                    {{ namesvvssget.totalmissed }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section" >
                                                                    {{ namesvvssget.totalbilling }}
                                                                  </div>
                                                                  <div class="table-body-cell  " >
                                                                    {{ namesvvssget.today_totalcount }}
                                                                  </div>
                                                                  <div class="table-body-cell  ">
                                                                    {{ namesvvssget.today_totalconvert }}
                                                                  </div>
                                                                  <div class="table-body-cell  " >
                                                                    {{ namesvvssget.today_old_convert }}
                                                                  </div>
                                                                 
                                                                  <div class="table-body-cell  " >
                                                                    {{ namesvvssget.today_totalbillingpending }}
                                                                  </div>
                                                                  <div class="table-body-cell  " >
                                                                    {{  namesvvssget.today_totalmissed }}
                                                                  </div>
                                                                  <div class="table-body-cell  " >
                                                                    {{ namesvvssget.today_totalbilling }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section" >
                                                                    {{ namesvvssget.total_totalcount }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section" >
                                                                    {{ namesvvssget.totalconvert }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section" >
                                                                    {{ namesvvssget.total_totalbillingpending }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section" >
                                                                    {{ namesvvssget.total_totalmissed }}
                                                                  </div>
                                                                  <div class="table-body-cell   blue-section" >
                                                                    {{ namesvvssget.total_totalbilling }}
                                                                  </div>
                                                                  <div class="table-body-cell  text-end" >
                                                                    {{ namesvvssget.convertion }}&nbsp;%
                                                                  </div>
                                                                  <div class="table-body-cell  text-end" >
                                                                    {{  namesvvssget.pending }}&nbsp;%
                                                                  </div>
                                                                  <div class="table-body-cell  text-end" >
                                                                    {{ namesvvssget.missed }}&nbsp;%
                                                                  </div>
                                                                 
                                                                  <div class="table-body-cell  text-end" >
                                                                    {{ namesvvssget.billing }}&nbsp;%
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
            <!-- End Page-content -->
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $('#payment_mode_payoff').on('change', function () {

                var val = $(this).val();

                if (val == 'Cash') {
                    $('#res_no').hide();
                } else {
                    $('#res_no').show();
                }

            });
            $(".Uncheck").on('click', function () {


                var val = $(this).val();
                if ($(this).is(':checked')) {
                    $('.checkdata_' + val).show();
                    var status = 1;
                } else {
                    $('.checkdata_' + val).hide();
                    var status = 0;
                }

                $.ajax({
                    url: '<?php echo base_url() ?>index.php/report/table_customize',
                    type: "get", //send it through get method
                    data: {
                        status_id: status,
                        status_val: val
                    }
                });



            });

             

        });
    </script>
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

        app.filter('number', function () {
            return function (input) {
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
        app.controller('crudController', function ($scope, $http) {

            $scope.success = false;
            $scope.error = false;
            $scope.getproductval = 'ALL';
            $scope.sales_group = 'ALL';

            $scope.currentPage = 1;
            $scope.totalItems = 0;
            $scope.pageSize = 1;
            $scope.searchText = '';


            $scope.formdate = '<?php echo date('d-m-Y'); ?>';
            $scope.pageSizeChanged = function () {


                $scope.fetchDatagetlegderGroup();

            }

            $scope.salesgroupChanged = function () {

                $scope.fetchDatagetlegderGroup();
            }


            $scope.search = function () {

                $scope.currentPage = 1;

                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();

                $scope.formdate = fromdate;
                $scope.todate = fromto;

                $('#search-view').show();
                $('#search-view1').hide();
                //   $('#exportdata').show();

                $scope.fetchDatagetlegderGroup();



            };

            $scope.searchTextChanged = function () {

                $scope.fetchDatagetlegderGroup();
            }



            $scope.onviewparty = function () {
                $('#firstmodalcommisonparty').modal('toggle');

            };
            $scope.toggleCollapse = function(e, teamGroupIndex, headIndex, spIndex) {

                        console.log(teamGroupIndex, headIndex, spIndex)
                        let ref = $scope.namesDataledgergroup;
                        //subarray's
                        // ref[headIndex].collapsed = !ref[headIndex].collapsed;
                        $(e.currentTarget).find('.mdi').toggleClass('transform-icon');
                        if (headIndex == undefined && spIndex == undefined) {
                           ref[teamGroupIndex].values.map((el) => {
                              if (ref[teamGroupIndex].key != el.sales_group_name) {
                                 el.collapsed = !el.collapsed;
                                 // console.log("ref[teamGroupIndex].collapsed",el.collapsed)
                                 if (el.collapsed) {
                                    el.subarray.map((el) => {
                                       el.collapsed = true;
                                       // el['subarray'].map((el) => {
                                       //    el.collapsed = true;
                                       // })
                                    })
                                 }
                              } else {
                                 el.subarray.map((el) => {
                                    el.collapsed = !el.collapsed;
                                    // el['subarray'].map((el) => {
                                    //    el.collapsed = true;
                                    // })
                                 })
                              }
                           })
                        } else if (spIndex == undefined) {
                           // console.log(" ref[teamGroupIndex].values", )
                           // ref[teamGroupIndex].values[headIndex].collapsed = !ref[teamGroupIndex].values[headIndex].collapsed;
                           ref[teamGroupIndex].values[headIndex]['subarray'].map((el) => {
                              el.collapsed = !el.collapsed;
                              // el['subarray'].map((el) => {
                              //    el.collapsed = true;
                              // })
                              // if(ref[teamGroupIndex].key !=  ref[teamGroupIndex].values[headIndex].sales_group_name){
                              //    el.collapsed = !el.collapsed;
                              // }else{
                              //    el.subarray.map((el) => {
                              //    el.collapsed = !el.collapsed;
                              //    })
                              // }

                           })
                        }
                        // else{
                        // ref[teamGroupIndex].values[headIndex]['subarray'][spIndex]['subarray'].map((el) => {
                        //    el.collapsed = !el.collapsed;
                        // })
                        // }
                  }
                  $scope.colState = true;
                  $scope.expandAll = function(){
                   console.log("click")
                   $scope.colState = !$scope.colState;
                     let dataCurrent =  $scope.namesDataledgergroup ;
                     dataCurrent && dataCurrent.map((el,i) => {
                           el.collapsed =  $scope.colState;
                           el.values && el.values.map((el1,i2) => {
                            if (dataCurrent[i].key != el1.sales_group_name) {
                              el1.collapsed =  $scope.colState;
                            }
                              el1.subarray && el1.subarray.map((el2) => {
                                 el2.collapsed =  $scope.colState;
                              })
                           })
                        })
                        setTimeout(() => {
                            !$scope.colState ? $('.mdi-arrow-up-thick').addClass('transform-icon') : $('.mdi-arrow-up-thick').removeClass('transform-icon');
                        },200)

                  }

                  $('#exportdata').on('click', function () {
                    var customer_id = '<?php echo $customer_id; ?>';
                    var order_status = 1;
                    var payment_mode = 1;
                    var productid = 1
                    var cateid = $('#choices-single-default').val();
                    var productid = 1;
                    var fromdate = $('#from-date').val();
                    var fromto = $('#to-date').val();
                    var sales_group = $('#sales_group').val();



                        url = '<?php echo base_url() ?>index.php/report/enquiry_report_export?limit=10&customer_id=' + customer_id + '&formdate=' + fromdate + '&page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&todate=' + fromto + '&sales_group=' + sales_group + '&order_status=' + cateid + '&payment_mode=' + payment_mode;
                        location = url;

                        });
            $scope.fetchDatagetlegderGroup = function () {

                $scope.loading = true;
                var customer_id = '<?php echo $customer_id; ?>';
                var order_status = 1;
                var payment_mode = 1;
                var productid = 1
                var cateid = $('#choices-single-default').val();
                var productid = 1;
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var sales_group = $('#sales_group').val();

                $http.get('<?php echo base_url() ?>index.php/report/fetch_data_enquiry_report_a?limit=10&customer_id=' + customer_id + '&formdate=' + fromdate + '&page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&todate=' + fromto + '&sales_group=' + sales_group + '&order_status=' + cateid + '&payment_mode=' + payment_mode).success(function (data) {


                    let groupNames = [];
                    let MasterData;
                    data[0].map((el, headIndex) => {
                        // console.log("sales_group_name",el.sales_group_name)
                        groupNames.push(el);
                        // console.log(groupNames)
                        const groupedTeams = {};
                        // Loop through the team names and group them
                        groupNames.forEach(teamName => {
                            const firstTwoWords = teamName.sales_group_name.split(' ').slice(0, 2).join(' ');
                            if (!groupedTeams[firstTwoWords]) {
                                groupedTeams[firstTwoWords] = [];
                            }
                            groupedTeams[firstTwoWords].push(teamName);
                        });

                        // console.log(groupedTeams);
                        MasterData = groupedTeams;

                    })
                    if (!(MasterData && MasterData)) {
                        alert('No data found');
                        $('.setload').hide();
                        return;
                    }
                    let keys = Object.keys(MasterData);
                    let sample = Object.keys(MasterData[keys[0]][0]);
                    console.log("sam",sample)
                    $scope.groupedArray = Object.keys(MasterData).map((key) => {
                        let ex = {
                            key,
                            values: MasterData[key]
                        };
                         sample.forEach((head) => {
                                 ex[head] = 0;

                                 MasterData[key].forEach((item) => {
                                    item.subarray.forEach((el) => {
                                       if(! (head == 'conversion' || head == 'missing' || head == 'pending')){
                                          if (typeof input === 'string') {
                                             ex[head] = el[head] ? Number(el[head].replace(/[^0-9]/g, '')) + ex[head] :  ex[head];
                                             ex[head] =   parseFloat(Number(ex[head]).toFixed(2));

                                          } else {
                                             ex[head]  =  el[head] ? Number(el[head])+ ex[head] :  ex[head];
                                             ex[head] =   parseFloat(Number(ex[head]).toFixed(2));

                                          }
                                          
                                       }

                                    });
                                 });
                              });


                        return ex;
                    });

                       let totals = data[1];
                       for (const key in totals) {
                          if (totals.hasOwnProperty(key)) {
                            let val = parseFloat(totals[key].toFixed(2));
                            if(key == 'convertion' || key == 'missed' || key == 'pending' || key == 'billing'){
                            val = val + ' %';
                          }
                          $('.totals').find('.'+key).html(val);
                       }
                    }

                    let dataNew = $scope.groupedArray;

                    function ifFloat(value) {
                        if(isNaN(value)){
                            return 0;
                        }
                        return parseFloat(Number(value).toFixed(2));
                    }
                    console.log("dataNew", dataNew)
                    dataNew.map((eltop, teamGroupIndex) => {
                        eltop.teamGroupIndex = teamGroupIndex;
                        eltop.collapsed = true;
                          eltop.convertion = ifFloat((eltop.total_totalconvert / eltop.total_totalcount) * 100);
                          eltop.missed = ifFloat((eltop.total_totalmissed / eltop.total_totalcount) * 100);
                          eltop.pending = ifFloat((eltop.total_totalbillingpending / eltop.total_totalcount) * 100);
                          eltop.billing = ifFloat((eltop.total_totalbilling / eltop.total_totalcount) * 100);
                        eltop.values.map((el, headIndex) => {

                            el.teamGroupIndex = teamGroupIndex;
                            el.groupIndex = headIndex;
                            el.collapsed = true;
                            if (el.subarray && el.subarray[0]) {
                                el.subarray.map((el1, salespIndex) => {
                                    el1.collapsed = true;
                                    el1.index = salespIndex;
                                    el1.groupIndex = headIndex;
                                })
                            }

                        })
                    })

                    // data.map((el,headIndex) => {
                    //    el.groupIndex = headIndex;
                    //    if (el.subarray && el.subarray[0]) {
                    //       el.subarray.map((el1, salespIndex) => {
                    //          el1.collapsed = true;
                    //          el1.index = salespIndex;
                    //          el1.groupIndex = headIndex;
                    //          if (el1.subarray && el1.subarray[0]) {
                    //             el1.subarray.map((el2, i) => {
                    //                el2.collapsed = true;
                    //             })
                    //          }
                    //       })
                    //    }
                    // })

                    // $scope.namesDataledgergroup = dataNew;
                    $scope.namesDataledgergroup = dataNew;
                    $scope.loading = false;


                });
            };
        });
    </script>
    <?php include('footer.php'); ?>
</body>