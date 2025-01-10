<?php
include "header.php";
date_default_timezone_set("Asia/Kolkata");

?>
<style>
    tr.bgnone {
        border: #9d9d9d21 solid 2px;
    }

    .emptycolor {

        background: #edaeae !important;
    }

    i.fa.fa-sort {
        float: right;
    }

    .bggreen {
        background: #d1f5ec;
    }

    .bggray {
        background: #ededed;
    }

    .hidden {
        display: none;
    }

    .bgyellow {
        background: #fff38b;
    }

    td input[type="text"] {
        display: block;
        border: 0;
        top: 0px;
        outline: none;
        position: initial;
        left: 0;
        width: 35%;
        padding: 8px 7px;
        height: unset;

    }

    .justify-content-between.p-3 {
        margin-bottom: -22px;
    }

    .card.task-box:hover {
        background: #e1e1e1;
    }

    .loading {
        text-align: center;
    }

    .st {

        font-size: 10px;
        color: black;

    }

    .driver-app-details p,
    .driver-app-details span {
        font-size: 13px;
        font-weight: 600;
    }

    tr.tr_nav_link {
        cursor: pointer;
    }

    .tr_active {
        background: antiquewhite;
        cursor: pointer;
    }

    h5.ng-binding {
        text-align: center;
    }

    .ss-show-table {
        font-size: 9.5px;

    }



    .customTabFilter ul li {
        float: left;
    }


    i.fa.fa-shopping-cart {

        font-size: 15px;
        margin: 4px 0px;
        cursor: pointer;
    }



    button.accordion-button {
        color: white;
        background: none;
    }

    .accordion-button:not(.collapsed) {
        color: white;
        background: none;
    }

    .btn-group-xs>.btn,
    .btn-xs {
        padding: 1px 5px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
    }

    .badge-soft-yellow {
        background: #ffe001;
    }

    i.fa.fa-info-circle {
        cursor: pointer;
    }

    .badge-soft-primary {
        color: #ff5e14;
        background-color: #ff5e1459;
    }

    .Tripidcalss {
        background: #919191;
        padding: 5px 12px;
        font-size: 11px;
        text-transform: uppercase;
        color: #fff;
        line-height: 30px;
    }

    p {
        margin-top: 0;
        margin-bottom: 3px;
    }

    .customTabFilter ul li.activeTab {
        background: #ff5e14;
        color: #fff;
    }

    a.nav-link.active {
        color: white;
    }

    .nav-link {

        padding: 4px 0px;

    }

    .setsort_id {
        border: none;
        width: 40px;
        padding: 6px 5px;
    }

    .customTabFilter ul li {
        display: flow-root;
        background: #fff;
        padding: 5px 10px;
        justify-content: right;
        align-items: center;
        margin-bottom: 15px;

    }

    .customTabFilter ul {
        padding-left: 0rem !important;
    }


    .customTabFilter ul li i {
        font-size: 12px;
        margin-right: 13px;
        padding: 3px;
    }

    .st {

        font-size: 10px;
        color: black;

    }

    .driver-app-details p,
    .driver-app-details span {
        font-size: 13px;
        font-weight: 600;
    }

    .formta {
        width: 100px;
        font-size: 11px;


        border: #f3f3f3 solid 1px;

        border-radius: 5px;

    }

    .card-footer-bigtext span {
        font-size: 15px;
        font-weight: bold;
        color: #ff6835;
    }

    .card-footer-bigtext i {
        padding-right: 5px;
        font-size: 18px;
    }

    .page-content {
        padding: 0px !important;
        margin: 0px !important;
    }

    .card-footer-bigtext button {

        font-weight: 500;
        padding: 5px 20px;
    }

    .card-footer-bigtext button span {
        animation: blink 1s linear infinite;
        font-size: 16px;
        color: #fff;
        font-weight: 500;
    }

    @keyframes blink {
        0% {
            opacity: 0;
        }

        50% {
            opacity: .5;
        }

        100% {
            opacity: 1;
        }
    }

    .goog-te-gadget-simple {
        border: none !important;
    }

    .goog-te-banner-frame {
        display: none !important;
    }


    @media screen and (min-device-width: 320px) and (max-device-width: 767px) {
        li.nav-item {
            width: 165px;
            float: left;
        }

        .customTabFilter ul {
            display: inline;



        }

        span.badge.rounded-pill.bg-success.ng-binding {
            float: right;
        }

        span.badge.rounded-pill.bg-danger.ng-binding {
            float: right;
        }

        .customTabFilter ul li {

            margin: 13px 0px;
        }

        ul.nav.justify-content-end.nav-tabs-custom.rounded.card-header-tabs {
            display: block;
        }

        .card-header.align-items-center.d-flex {
            width: 100%;
            display: inline-block !important;
        }

        ol.breadcrumb.m-0 {
            margin-top: 30px !important;
        }

    }

    .checkdata_1_hide,
    .checkdata_2_hide,
    .checkdata_3_hide,
    .checkdata_4_hide,
    .checkdata_5_hide,
    .checkdata_6_hide,
    .checkdata_7_hide,
    .checkdata_8_hide,
    .checkdata_9_hide,
    .checkdata_10_hide,
    .checkdata_11_hide,
    .checkdata_12_hide,
    .checkdata_13_hide,
    .checkdata_14_hide,
    .checkdata_15_hide {
        display: none;
    }

    .tooltip-inner {
        display: inline-block;
        vertical-align: middle;
        font-size: 16px;
        font-weight: 600;
        max-width: 1400px;
        color: #000;
        background-color: #e6e6e6 !important;
        padding-right: 15px;
        padding-left: 15px;
        padding-top: 8px;
        padding-bottom: 8px;
    }


    @media screen and (max-width:767px) {


        td .btn {
            padding: 6px 5px;
            font-size: 12px;
        }



        .mbheader {
            display: none;
        }

        .mbbody .mbfirsttr {
            padding: 0px;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            hidden -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-justify-content: flex-start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            -webkit-align-content: flex-start;
            -ms-flex-line-pack: start;
            align-content: flex-start;
            -webkit-align-items: stretch;
            -ms-flex-align: stretch;
            align-items: stretch;
            margin-bottom: 3px;
        }


        .mbbody .mbfirsttr td {
            display: block;
            width: 50%;
            border: 1px solid #ccc;
            font-size: 10px !important;
            padding: 3px 5px;
        }

        .mbbody .mbfirsttr th {
            display: block;
            width: 50%;
            border: 1px solid #ccc;
            font-size: 9px !important;
            padding: 3px 5px;
        }

        tbody.contentrow td {
            display: block;
            width: 100%;
        }

        tbody.contentrow th {
            display: block;
            width: 50% !important;
            border-bottom: 1px solid #ccc;
        }


        tbody.contentrow tr {
            display: flex;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-justify-content: flex-start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            -webkit-align-content: flex-start;
            -ms-flex-line-pack: start;
            align-content: flex-start;
            -webkit-align-items: stretch;
            -ms-flex-align: stretch;
            align-items: stretch;
            width: 100%;
            padding: 0px;
            font-size: 9px !important;
        }

        .mbbody .mbfirsttr td span {}

        tbody.contentrow th div {
            max-height: unset !important;
            height: unset !important;
        }

        .ss-show-table {
            font-size: 9.5px;
            margin-bottom: 100%;
        }

        .search-table-outter.wrapper {
            margin-bottom: 50%;
        }

        .table {
            margin-bottom: inherit;
        }

        .card {
            margin-bottom: 0;
        }

    }

    .table>:not(caption)>*>* {
        padding: 2px 8px;
    }



    .filter-bottom-sheet {
        display: flex !important;
        margin-bottom: 22px !important;
    }

    .bottom-nav,
    .profile-bottom-sheet {
        display: none;
    }

    @media screen and (max-width:767px) {

        div#layout-wrapper>.main-content {
            padding-top: 50px;
        }

        .ost>tbody {
            border: none;
            background: #ffff;
            border-radius: 8px !important;
            padding: 10px !important;
            display: flex;
            margin-bottom: 10px;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        .ost>tbody tr {
            border: none;
        }

        .ost>tbody tr td {
            border: none !important;
            border-bottom: 1px solid #e6e6e6 !important;
        }

        .ost>tbody:first-child {
            border-radius: 0px !important;
        }

        .ost>tbody tr {
            border-radius: 0px;

        }

        /* CSS for the bottom sheet */
        .filter-bottom-sheet {
            display: none;
            position: fixed;
            bottom: -100%;
            /* Initially hidden */
            left: 0;
            width: 100%;
            height: auto;
            background-color: #fff;
            padding: 20px;
            border-top: 1px solid #ccc;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            transition: bottom 0.3s ease;
            /* Animation */
        }

        /* CSS for the profile bottom sheet */
        .profile-bottom-sheet {
            display: none;
            position: fixed;
            bottom: -100%;
            /* Initially hidden */
            left: 0;
            width: 100%;
            height: auto;
            background-color: #fff;
            padding: 20px;
            border-top: 1px solid #ccc;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            transition: bottom 0.3s ease;
            /* Animation */
        }



        /* Show the bottom sheet when it has the .active class */
        .filter-bottom-sheet.bactive {
            bottom: 50px !important;
            display: block !important;
            width: 100%;
            left: 0;
            margin: 0px !important;
        }

        .profile-bottom-sheet.bactive {
            bottom: 60px !important;
            display: block !important;
            width: 100%;
            left: 0;
            margin: 0px;
        }

        /* Backdrop overlay */
        .backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9998;
        }

        /* Show the backdrop when the bottom sheet is active */
        .backdrop.bactive {
            display: block;
        }

        .bottom-nav .icon {
            cursor: pointer;
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            height: 60px;
            box-shadow: 2px 0px 10px 4px #dadada;
            padding: 0 10px;
            z-index: 999999;
        }

        header,
        .customize-table {
            display: none;
        }

        .totalWeightLabel,
        .trip-detail {
            text-align: left !important;
            width: 100%;
            background: #ffffff;
            padding: 10px 10px;
            margin: 0px;
            border: 1px solid #e6e6e6;
        }

        .main-content {
            padding-top: 20px !important
        }
    }

    div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
  }

  table.table.align-middle.table-nowrap.newBorderedTable {
    font-size: 11px;
  }

  .some-class1 {
    margin: 0 50%;
  }

  .trpoint {

    cursor: pointer;

  }

  .nav-tabs-custom.card-header-tabs .nav-link {
    padding: 1.25rem 6px;
    font-weight: 500;
  }

  .table>tbody {
    vertical-align: middle;
  }

  .trpoint:hover {
    background: antiquewhite;
  }

  .loading {
    text-align: center;
  }

  td {
    font-size: 11px;
    color: black;
  }

  td a {
    color: black;
  }

  .card-header {
    display: block;
    text-align: center;
  }

  ::-webkit-scrollbar {
    height: 10px !important;
    width: 10px !important;
    cursor: pointer;
  }

  .table-responsive {
    /*height: 500px;*/
    cursor: grab;
  }


  .ui-widget.ui-widget-content {
    border: 1px solid #d3d3d3;
    z-index: 999999;
  }

  .table-bordered {
    border: 1px solid #e9e9ef;

  }

  .bgcolorchange {
    background: #ededed;
  }

  #balance_view {
    color: blue;
  }
</style>



<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">
<div id="layout-wrapper">
    <?php echo $top_nav; ?>

    <div class="main-content">
      <div class="page-content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-m-12">
                  <div class="card mb-1">
                    <div class="card-header align-items-start d-flex p-3">
                      <div class="flex-shrink-0">
                        <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" >


                        </ul>

                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="row">

                <div class="col-12">
                  <div class="card shadow-none">

                          <!-- <div class="row <?php echo $view; ?>" id="open_sub_tabs">
                            <div class="col-m-12">
                              <div class="card mb-1">
                                <div class="card-header align-items-start d-flex p-3">
                                  <div class="flex-shrink-0">
                                    <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                                      
                                        <li class="nav-item" >
                                            <a class="nav-link active" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders','order_product_list','1')" id="">
                                              <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                              <span class="d-none d-sm-block">Pending Trips&nbsp;&nbsp;</span>
                                            </a>
                                          </li>

                                          <li class="nav-item" >
                                            <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_quotation','order_product_list_quotation','2')" id="">
                                              <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                              <span class="d-none d-sm-block">Approved&nbsp;&nbsp;</span>
                                            </a>
                                          </li>

                                         
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> -->
                          


                          <div class="">
                                <div class="card-body px-0 pt-0 pt-md-5">



                                <input type="hidden" class="hidden" id="tabsec" value="1">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0 font-size-18">Transport Reconciliation
                                        </h4>
                                        <div class="page-title-right d-none d-sm-flex">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Trips</a>
                                                </li>
                                                <li class="breadcrumb-item active">Transport Reconciliation </li>
                                            </ol>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <?php
                                        $i = 1;
                                        $vehicle_id = 0;
                                        foreach ($vehicle as $rs) {

                                            $b = "";


                                            $b = "tr_active";
                                            $vehicle_id = $rs->vehicle_id;
                                            $v_number = $rs->vehicle_number;
                                            $v_name = $rs->vehicle_name . ' ' . $rs->vehicle_type;

                                        ?>

                                        <?php
                                            $i++;
                                        }

                                        ?>



                                        <div class="col-md-12">


                                            <input type="hidden" class="hidden" id="nextnumber" value="0">
                                            <input type="hidden" class="hidden" id="prenumber" value="3">
                                            <input type="hidden" class="hidden" id="pageSize" value="6">
                                            <input type="hidden" class="hidden" id="order_base" value="3">
                                            <input type="hidden" class="hidden" id="route_id" value="0">
                                            <input type="hidden" class="hidden" id="assign" value="12">



                                            <div class="row filter-bottom-sheet" style="margin-bottom: 10px;">

                                                <div class="col-sm-3">
                                                    <label>From Date: </label><input type="date" class="form-control ng-pristine ng-valid ng-touched" id="from_date" ng-model="from_date" ng-change="DateFilter()">
                                                </div>

                                                <div class="col-sm-3">
                                                    <label>To Date:</label><input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control ng-pristine ng-untouched ng-valid" id="to_date" ng-model="to_date" ng-change="DateFilter()">
                                                </div>


                                                <div class="col-sm-3">
                                                    <div id="example_filter" class="dataTables_filter">
                                                        <label>Search:</label><input type="search" class="form-control input-sm ng-pristine ng-untouched ng-valid" placeholder="Order No,Trip ID" aria-controls="example" ng-model="searchText" ng-change="searchTextChanged()">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="backdrop"></div>


                                            <div class="row">
                                                <div class="col-md-9 text-center">
                                                    <h5 class="trip-detail">
                                                    </h5>
                                                </div>

                                            </div>




                                            <div class="row">

                                                <div class="search-table-outter wrapper">
                                                    <table class="table ss-show-table mbbody ost">

                                                        <tr style="background: #000;color: #fff;" class="mbfirsttr">

                                                            <th ng-click="sortBy('id')">#</th>
                                                            <th ng-click="sortBy('vehicle_number')">VEHICLE NAME & NO
                                                            </th>
                                                            <th ng-click="sortBy('trip_id')">TRIP ID</th>


                                                            <th>DELIVERY DATE</th>
                                                            <th>DRIVER & NO </th>
                                                            <th>TRIP STATUS </th>
                                                            <th>TRIP KM</th>
                                                            <th>TOLL CHARGE</th>
                                                            <th>RENT</th>
                                                            <th>ATTACHMENT</th>
                                                            <th>STATUS</th>
                                                            <th>ACTION</th>
                                                        </tr>


                                                        <tr>

                                                            <td colspan="14">
                                                                <loading></loading>
                                                            </td>

                                                        </tr>


                                                        <tbody ng-repeat="namesd in namesDataassign" id="heading{{ namesd.trip_id }}" class="{{ namesd.collapsed }}" data-bs-toggle="collapse" data-bs-target="#collapse{{ namesd.trip_id }}" aria-expanded="{{ namesd.expended }}" aria-controls="collapse{{ namesd.trip_id }}">
                                                            <tr style="cursor: pointer;font-weight: 800;" class="bgnone {{ namesd.bgnone }} mbfirsttr">


                                                                <td>{{ namesd.no }}</td>
                                                                <td>{{ namesd.vehicle_number }}</td>
                                                                <td>{{ namesd.trip_id }}</td>
                                                                <td>{{ namesd.assign_date }}</td>
                                                                <td>{{ namesd.driver_name }} {{ namesd.driver_phone }}</td>
                                                                <td>{{ namesd.trip_status }}</td>
                                                                <td>{{ namesd.trip_km }}</td>
                                                                <td>{{ namesd.toll_charge }}</td>
                                                                <td>{{ namesd.rent }} </td>
                                                                <td>
                                                                    <div ng-if="namesd.product_image != '' && namesd.product_image != null">
                                                                        <a href="{{ namesd.toll_image }}" target="_blank">
                                                                            <img ng-src="{{ namesd.toll_image }}" style="max-width: 100px; max-height: 100px;">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                                <td>{{ namesd.status }} </td>
                                                                <td class="ng-binding" data-label="Action" style="display: flex;justify-content: space-around;">
                                                                    <a href="#" ng-show="activeTab !== 'approved'" class=" text-primary edit-option" ng-click="openEditModal(namesd)">View</a>
                                                                    <!-- <a href="#" ng-show="activeTab !== 'approved'"  ng-click="approveRentCharges_new(namesd.trip_id,namesd.rent,names.localorlong,names.no_order_delivery,namesd.trip_km,namesd.driver_id)" class="text-primary approve-option">Approve</a> -->

                                                                    <!-- <a href="#" ng-show="activeTab !== 'pending'" ng-click="approveRentCharges(namesd.trip_id,namesd.rent,names.localorlong,names.no_order_delivery,namesd.trip_km,namesd.driver_id)" class="text-primary approve-option">Reconcile</a> -->
                                                                </td>
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
    <!-- Edit popup content  starts here-->
            <div class="modal fade" id="details_edit" tabindex="-1" role="dialog" aria-labelledby="save_edit_details" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="save_edit_details">Edit Details</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" ng-click="closemodal()"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body" >
                    <!-- style="height: 500px;overflow: auto;" -->
                        <form ng-submit="saveedited_details()" method="post" id="editdetails">
                            <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-12">
                                <input type="hidden" id="driver_category" value="{{ driver_category }}" />
                                <label for="driver_category_name">Vehicle Category : <span>{{ driver_category_name }}</span></label>
                            </div>
                                <div class="col-md-6">
                                    <label for="startkm">Trip Km</label>
                                    <div class="input-group">
                                        <input type="text" id="startkm" class="form-control" ng-model="trip_km" ng-change="handleEdit()" readonly>
                                        <span class="input-group-append"> 
                                            <button class="btn btn-outline-secondary editBtn" data-target="startkm"> <i class="fas fa-pencil-alt" ></i> </button> 
                                        </span>
                                    </div>
                                </div> 
                                <div class="col-md-6" ng-show="distance === 'local' && (driver_category === '7' || driver_category === '8')">
                                    <label for="local_rate">Local Rate</label>
                                    <div class="input-group">
                                        <input type="text" id="local_rate" class="form-control" ng-model="local_rate" ng-change="handleEdit()" readonly>
                                        <span class="input-group-append"> 
                                            <button class="btn btn-outline-secondary editBtn" data-target="local_rate"> <i class="fas fa-pencil-alt"></i> </button> 
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6" ng-show="distance === 'long' && (driver_category === '7' || driver_category === '8')">
                                    <label for="long_rate">Long Rate</label>
                                    <div class="input-group">
                                        <input type="text" id="long_rate" class="form-control" ng-model="long_rate" ng-change="handleEdit()" readonly>
                                        <span class="input-group-append"> 
                                            <button class="btn btn-outline-secondary editBtn" data-target="long_rate"> <i class="fas fa-pencil-alt"></i> </button> 
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6" ng-show="distance === 'local' && (driver_category === '7' || driver_category === '8')">
                                    <label for="perdelivery_charge">Per Delivery Charge</label>
                                    <div class="input-group">
                                        <input type="text" id="perdelivery_charge" class="form-control" ng-model="perdelivery_charge" ng-change="handleEdit()" readonly>
                                        <span class="input-group-append"> 
                                            <button class="btn btn-outline-secondary editBtn" data-target="perdelivery_charge"> <i class="fas fa-pencil-alt"></i> </button> 
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6" ng-show="distance === 'local' && (driver_category === '7' || driver_category === '8')">
                                    <label for="no_of_deliveries">No. of Deliveries</label>
                                    <div class="input-group">
                                        <input type="text" id="no_of_deliveries" class="form-control" ng-model="no_order_delivery" ng-change="handleEdit()" readonly>
                                        <span class="input-group-append"> 
                                            <button class="btn btn-outline-secondary editBtn" data-target="no_of_deliveries"> <i class="fas fa-pencil-alt"></i> </button> 
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="tollChargePopup">Toll Charge</label>
                                    <div class="input-group">
                                        <input type="text" id="tollChargePopup" class="form-control" ng-model="toll_charge" ng-change="handleEdit()" readonly>
                                        <span class="input-group-append"> 
                                            <button class="btn btn-outline-secondary editBtn" data-target="tollChargePopup"> <i class="fas fa-pencil-alt"></i> </button>  
                                        </span>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <label for="sum_of_categories">Category Charge</label>
                                    <div class="input-group">
                                        <input type="text" id="sum_of_categories" class="form-control" ng-model="sum_of_categories" ng-change="handleEdit()" readonly >
                                        <span class="input-group-append"> 
                                            <button class="btn btn-outline-secondary editBtn" data-target="sum_of_categories"> <i class="fas fa-pencil-alt"></i> </button> 
                                        </span>
                                    </div>
                                </div> -->
                                <div class="col-md-6" ng-show="driver_category === '11' && driver_category !== null">
                                    <label for="length_charge">Length Charge</label>
                                    <div class="input-group">
                                        <input type="text" id="length_charge" class="form-control" ng-model="length_charge" ng-change="handleEdit()" readonly>
                                        <span class="input-group-append"> 
                                            <button class="btn btn-outline-secondary editBtn" data-target="length_charge"> <i class="fas fa-pencil-alt"></i> </button>  
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6" ng-show="driver_category === '11' && driver_category !== null" >
                                    <label for="weight_charge">Weight Charge</label>
                                    <div class="input-group">
                                        <input type="text" id="weight_charge" class="form-control" ng-model="weight_charge" ng-change="handleEdit()" readonly>
                                        <span class="input-group-append"> 
                                            <button class="btn btn-outline-secondary editBtn" data-target="weight_charge"> <i class="fas fa-pencil-alt"></i> </button> 
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Additional Charges</label>
                                    <div>
                                        <label>
                                            <input type="radio" ng-model="showAdditionalFields" ng-checked="additional_charge" ng-click="showAdditionalFields = !showAdditionalFields">
                                            Additional Charges
                                        </label>
                                    </div>
                                </div>

                                <!-- Additional Fields -->
                                <div class="col-md-6" ng-show="showAdditionalFields || additional_charge">
                                    <label for="additional_charge">Charge</label>
                                    <div class="input-group">
                                        <input type="text" id="additional_charge" class="form-control" ng-model="additional_charge" ng-change="showAdditionalFields = additional_charge">
                                    </div>
                                </div>


                                <div class="col-md-6" ng-show="showAdditionalFields || additional_charge">
                                    <!-- <label for="additional_remarks">Remarks</label>
                                    <div class="input-group">
                                        <input type="text" id="additional_remarks" class="form-control" ng-model="additional_remarks">
                                    </div> -->
                                    
                    
                      <label class="col-sm-12 col-form-label">Remarks</label>
                      <div class="col-sm-12">
                        <select ng-model="additional_remarks" id="additional_remarks" class="form-select remark_option remark_{{ name.id }}" ng-hide="additional_remarks === 'other'">
                          <option value="">Select</option>                          
                          <option value="test1">test1</option>
                          <option value="test2">test2</option>

                          
                          <option value="other">Others</option>
                        </select>
                        <input class="form-control remark_{{ name.id }}" type="text" ng-model="rec_other" id="rec_other" ng-show="additional_remarks === 'other'" value="" />
                      </div>
                    
                  
                                </div>
                                <input type="hidden" class="hidden" id="trip_id" value="<?php echo $trip_id; ?>" ng-model="trip_id" >
                            </div>
                            <div class="col-md-6">
                                <label for="rent">Total rent :  </label><span ng-if="additional_charge > 0" style="color:red;">Including additional charges</span>

                                <input type="text" id="rent" name="rent" class="form-control" ng-model="rent" ng-change="handleEdit()" readonly>
                            </div><br>
                            <button class="btn btn-success" id="saveedited_Changes" >Save</button>
                        </form>
                        <div class="row"></div>
                    </div>
                    <div class="modal-footer ">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" ng-show="alert_driveredit == 0">
                            Driver is not mapped to any vehicle category!
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Edit popup content  Ends here-->
        </div>
        <!-- End Page-content -->
        <input type="hidden" class="hidden" id="vehicle_id" value="<?php echo $vehicle_id_data; ?>">
    </div>


    <script>
        const slider = document.querySelector('.search-table-outter');
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.classList.add('active');
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });
        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.classList.remove('active');
        });
        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('active');
        });
        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 3; //scroll-fast
            slider.scrollLeft = scrollLeft - walk;
            console.log(walk);
        });


        var app = angular.module('crudApp', ['datatables']);

        app.directive("fileInput", function($parse) {
            return {
                link: function(scope, element, attrs) {
                    element.on("change", function(event) {
                        var files = event.target.files;
                        $parse(attrs.fileInput).assign(scope, files);
                        scope.$apply();
                    });
                }
            };
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

        app.filter('indianCurrency', function() {
            return function(input) {
                if (input === "" || input === 0) {
                    return input;
                }
                if (typeof input === 'string') {
                    // Try to convert the string to a number
                    input = parseFloat(input.replace(/,/g, ''));
                }
                if (!isNaN(input) && input != null) {
                    return input.toLocaleString('en-IN', {
                        maximumFractionDigits: 0
                    });
                } else {
                    return input;
                }
            };
        });

        app.controller('crudController', function($scope, $http) {

                    $scope.success = false;
                    $scope.error = false;
                    $scope.tab = 1;





                    $scope.currentPage = 1;
                    $scope.totalItems = 0;
                    $scope.pageSize = 3;
                    $scope.searchText = '';

                    $scope.activeTab = 'pending'; 

                    $scope.tablename = 'orders_process';
                    getData();

                    $scope.pageTab = function(tablename,tablename_sub, status) {
                        console.log("clicked");
                        console.log(status);
                        
                        if(status === 1 || status === '1'){
                            $scope.activeTab = 'pending';
                            $scope.tab = 1;
                            $('#tabsec').val('1');
                          
                        }else if(status === 2 || status === '2'){
                            $scope.activeTab = 'approved';
                            $scope.tab = 2;
                            $('#tabsec').val('2');
                           
                        }


                        if(status === 2 || status === '2'){
                            $scope.activeTab = 'approved';
                            $scope.tab = 2;
                            $('#tabsec').val('2');
                           
                        }
                        getData();
                    };

                    $scope.searchTextChanged = function() {
                        $scope.currentPage = 1;
                        getData();
                    }


                    $scope.searchTextChanged_status = function() {
                        $scope.currentPage = 1;
                        getData();
                    }

                    



                    $scope.formatIndianCurrency = function(amount) {
                        console.log("Input to formatIndianCurrency:", amount);
                        if (!isNaN(amount)) {
                            const formattedAmount = amount.toLocaleString('en-IN', {
                                style: 'currency',
                                currency: 'INR',
                                maximumFractionDigits: 0,
                            });
                            console.log("Formatted amount:", formattedAmount);
                            return formattedAmount;
                        }
                        console.log("Input to :", amount);
                        return amount;
                    };

                    $scope.onNext = function(currentPage, pageSize) {
                        var nextnumber = parseInt($('#nextnumber').val());
                        var pageSize = parseInt($('#pageSize').val());

                        var currentPage = nextnumber + pageSize;

                        $('#nextnumber').val(currentPage);
                        $('#prenumber').val(currentPage);

                        getDataPage(currentPage, pageSize);
                    };

                    $scope.onPre = function(currentPage, pageSize) {

                        var nextnumber = parseInt($('#prenumber').val());
                        var pageSize = parseInt($('#pageSize').val());
                        var currentPage = nextnumber - pageSize;

                        $('#prenumber').val(currentPage);
                        $('#nextnumber').val(currentPage);
                        getDataPage(currentPage, pageSize);
                    };

                    $scope.DateFilter = function() {
                        getData();
                    };

                    $scope.clikcCollpes = function(trip_id) {
                        $('#collapse' + trip_id).addClass('show');
                    };
                    /** To display the details pefilled*/
                    $scope.openEditModal = function(data) {
                        $scope.trip_id = data.trip_id;
                        $scope.start_km = data.start_km;
                        $scope.end_km = data.end_km;
                        $scope.trip_km = data.trip_km;
                        $scope.perdelivery_charge = data.local_price;
                        $scope.no_order_delivery = data.no_order_delivery;
                        $scope.toll_charge = data.toll_charge;
                        $scope.sum_of_categories = data.fixed_deliverycharge;
                        $scope.rent = data.rent;
                        $scope.trip_km_charge = data.km_based_p;
                        $scope.length_charge = data.length_v;
                        $scope.weight_charge = data.weight_v;
                        $scope.driver_category_name = data.driver_category_name;
                        $scope.driver_category = data.driver_category;
                        $scope.distance = data.distance;
                        $scope.localorlong = data.localorlong;
                        $scope.alert_driveredit = data.alert_driveredit;
                        $scope.long_rate = data.long_rate;
                        $scope.local_rate = data.local_rate;
                        $scope.additional_charge = data.additional_charge;
                        $scope.remarks = data.remarks;
                        $('#details_edit').modal('show');
                    };
                    $scope.isLocalRate = function() {
                        return $scope.distance === 'local';
                    };
                    /** To close the Popup*/
                    $scope.closemodal= function() {
                        $('#details_edit').modal('hide');
                    };
                    function getDataPage(currentPage, pageSize) {
                        var order_base = $('#order_base').val();
                        var route_id = $('#route_id').val();
                        var assign = $('#assign').val();
                        var vehicle_id = $('#vehicle_id').val();
                        var trip_id = '<?php echo $trip_id; ?>';
                        var delivery_status = '<?php echo $delivery_status; ?>';

                        $scope.loading = true;
                        $('#hidedata').hide();

                        var from_date = $('#from_date').val();
                        var to_date = $('#to_date').val();


                        $http.get('<?php echo base_url() ?>index.php/order_second/fetch_data_table_transpot_assign_data_driver_list_limit_rent?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename + '&order_base=' + order_base + '&route_id=' + route_id + '&assaignstates=' + assign + '&vehicle_id=' + vehicle_id + '&from_date=' + from_date + '&to_date=' + to_date + '&trip_id=' + trip_id + '&delivery_status=' + delivery_status)
                            .success(function(data) {

                                $scope.query = {}
                                $scope.queryBy = '$';
                                $scope.loading = false;
                                $('#hidedata').show();

                                $scope.namesDataassign = [];

                                $scope.totalItems = data.totalCount;
                                $scope.weighttotal = data.weighttotal;


                                $scope.startItem = ($scope.currentPage - 1) * $scope.pageSize + 1;
                                $scope.endItem = $scope.currentPage * $scope.pageSize;
                                if ($scope.endItem > $scope.totalCount) {
                                    $scope.endItem = $scope.totalCount;
                                }
                                angular.forEach(data.PortalActivity, function(temp) {
                                    $scope.namesDataassign.push(temp);
                                });
                            });
                    }

                    $scope.from_date = new Date('<?php echo $from_date; ?>');
                    $scope.to_date = new Date();

                    $scope.searchText_status = 1;

                    function getData() {
                        var order_base = $('#order_base').val();
                        var tabsec = $('#tabsec').val();
                        var route_id = $('#route_id').val();
                        var assign = $('#assign').val();
                        var vehicle_id = $('#vehicle_id').val();
                        var vehicle_id = $('#vehicle_id').val();
                        var pageSize = $('#pageSize').val();
                        var from_date = $('#from_date').val();
                        var to_date = $('#to_date').val();
                        var trip_id = '<?php echo $trip_id; ?>';
                        var delivery_status = '<?php echo $delivery_status; ?>';

                        if ($scope.searchText_status == undefined) {
                            var status = 1;
                        } else {
                            var status = $scope.searchText_status;
                        }

                        if (from_date == '') {
                            var from_date = '<?php echo $from_date; ?>';
                        }

                        $scope.loading = true;
                        $('#hidedata').hide();

                        $http.get('<?php echo base_url() ?>index.php/order_second/fetch_data_table_transpot_assign_data_driver_list_limit_rent?page=' + $scope.currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename + '&order_base=' + order_base + '&route_id=' + route_id + '&assaignstates=' + assign + '&vehicle_id=' + vehicle_id + '&from_date=' + from_date + '&to_date=' + to_date + '&trip_id=' + trip_id + '&delivery_status=' + delivery_status + '&status=' + status +'&tabsec=' + tabsec +'&tabsec1=' + $scope.tab)
                            .success(function(data) {

                                $scope.query = {}
                                $scope.queryBy = '$';
                                $scope.loading = false;
                                $('#hidedata').show();

                                $scope.namesDataassign = [];

                                $scope.totalItems = data.totalCount;
                                $scope.weighttotal = data.weighttotal;

                                $scope.startItem = ($scope.currentPage - 1) * $scope.pageSize + 1;
                                $scope.endItem = $scope.currentPage * $scope.pageSize;
                                if ($scope.endItem > $scope.totalCount) {
                                    $scope.endItem = $scope.totalCount;
                                }

                                angular.forEach(data.PortalActivity, function(temp) {
                                    $scope.namesDataassign.push(temp);
                                });
                            });
                    }

                    $scope.pageChanged = function() {
                        getData();
                    }
                    $scope.pageSizeChanged = function() {
                        $scope.currentPage = 1;
                        $('#pageSize').val($scope.pageSize);
                        getData();
                    }

                    $scope.approveRentCharges = function(trip_id , rent, longorlocal ,delivery_count,trip_km,driver_id) {
                       $http({
                            method:"POST",
                            url:"<?php echo base_url() ?>index.php/order_second/approveRentCharges",
                            data:{'trip_id':trip_id,'rent':rent,'longorlocal':longorlocal,'delivery_count':delivery_count,'trip_km':trip_km,'driver_id':driver_id}
                            }).success(function(data){
                                alert("Charges Reconciled!");
                            });
                    }
                    $scope.approveRentCharges_new = function(trip_id , rent, longorlocal ,delivery_count,trip_km,driver_id) {
                       $http({
                            method:"POST",
                            url:"<?php echo base_url() ?>index.php/order_second/approveRentCharges_new",
                            data:{'trip_id':trip_id,'rent':rent,'longorlocal':longorlocal,'delivery_count':delivery_count,'trip_km':trip_km,'driver_id':driver_id}
                            }).success(function(data){
                                alert("Charges Approved!");
                                getData();
                            });
                    }
                    /**Updating Edited Values in Driver panel Edit */
                    $scope.dataEdited = false;

                    $scope.handleEdit = function() {
                        $scope.dataEdited = true;

                        var trip_id = $scope.trip_id;
                        var trip_km = parseFloat($scope.trip_km) || 0;
                        var tripkm_based_charge = parseFloat($scope.trip_km_charge) || 0;
                        var local_rate = parseFloat($scope.local_rate) || 0;
                        var distance = parseFloat($scope.distance) || '';
                        var long_rate = parseFloat($scope.long_rate) || 0;
                        var perdelivery_charge = parseFloat($scope.perdelivery_charge) || 0;
                        var no_of_deliveries = parseFloat($scope.no_order_delivery) || 0;
                        var toll_charge = parseFloat($scope.toll_charge) || 0;
                        var length_charge = parseFloat($scope.length_charge) || 0;
                        var weight_charge = parseFloat($scope.weight_charge) || 0;
                        var localorlong = parseFloat($scope.localorlong) || 0;
                        var rent = parseFloat($scope.rent) || 0;
                        var driver_category = $('#driver_category').val();
                        var additional_charge = parseFloat($scope.additional_charge) || 0;

                        console.log("trip_id ---"+ trip_id + " ---trip_km---"+trip_km+ " ---tripkm_based_charge--- "+tripkm_based_charge+"---local_rate---"+local_rate+"---long_rate---"+long_rate+"---distance---"+distance+"---perdelivery_charge---"+perdelivery_charge+"---no_of_deliveries---"+no_of_deliveries+"---toll_charge---"+toll_charge+"---driver_category---"+driver_category+"---localorlong---"+localorlong+"---rent---"+rent+"---length_charge---"+length_charge+"---weight_charge---"+weight_charge+"---additional_charge---"+additional_charge);

                       

                            function calculateRent() {
                                if(driver_category == 7 || driver_category == 8) {
                                    if (distance === 'local') {
                                        localorlong = local_rate;
                                        rent = ((trip_km * localorlong) + (no_of_deliveries * perdelivery_charge) + toll_charge);
                                    } else {
                                        localorlong = long_rate;
                                        rent = ((trip_km * localorlong) + toll_charge);
                                    }
                                    if(additional_charge) {
                                        rent += additional_charge;
                                    }
                                } else if (driver_category == 11) {
                                    if(trip_km >= 0 && trip_km <= 15) {
                                        rent = (1500 + (no_of_deliveries * perdelivery_charge) + toll_charge + length_charge + weight_charge);
                                    } else if(trip_km >= 16 && trip_km <= 20) {
                                        rent = (1750 + (no_of_deliveries * perdelivery_charge) + toll_charge + length_charge + weight_charge);
                                    } else if(trip_km >= 21 && trip_km <= 25) {
                                        rent = (2000 + (no_of_deliveries * perdelivery_charge) + toll_charge + length_charge + weight_charge);
                                    } else if(trip_km > 25) {
                                        var excess_km = (trip_km - 25) * 26;
                                        var rent_first = (2000 + (no_of_deliveries * perdelivery_charge) + toll_charge + length_charge + weight_charge);
                                        rent = (rent_first + excess_km);
                                    }
                                    if(additional_charge) {
                                        rent += additional_charge;
                                    }
                                }
                            }

                            calculateRent();

                            // alert(rent);
                            $scope.rent = rent;
                        }

                    $scope.saveedited_details = function(){
                        if (!$scope.dataEdited) {
                        alert("No data edited.");
                        }

                        var trip_id = $scope.trip_id;
                        var start_km = $scope.start_km;
                        var end_km = $scope.end_km;
                        var trip_km = $scope.trip_km;
                        var tripkm_based_charge = $scope.trip_km_charge;
                        var local_rate = $scope.local_rate;
                        var distance = $scope.distance;
                        var long_rate = $scope.long_rate;
                        var perdelivery_charge = $scope.perdelivery_charge;
                        var no_of_deliveries = $scope.no_order_delivery;
                        var toll_charge = $scope.toll_charge;
                        var sum_of_categories = $scope.sum_of_categories;
                        var length_charge = $scope.length_charge;
                        var weight_charge = $scope.weight_charge;
                        var tablename = $scope.tablename
                        var vehicle_id = $scope.vehicle_id;
                        var delivery_status = '<?php echo $delivery_status; ?>';
                        var localorlong = $scope.localorlong;
                        var rent = $scope.rent;
                        var driver_category = $('#driver_category').val();
                        var assign_date = $scope.assign_date;
                        var driver_phone = $scope.driver_phone;
                        var additional_charge = $scope.additional_charge;
                        var additional_remarks = $scope.additional_remarks;
                        var postData = {
                            'trip_id': trip_id,
                            'start_km': start_km,
                            'end_km': end_km,
                            'trip_km': trip_km,
                            'tripkm_based_charge': tripkm_based_charge,
                            'local_rate': local_rate,
                            'long_rate': long_rate,
                            'distance': distance,
                            'perdelivery_charge': perdelivery_charge,
                            'no_of_deliveries': no_of_deliveries,
                            'toll_charge': toll_charge,
                            'sum_of_categories': sum_of_categories,
                            'length_charge': length_charge,
                            'weight_charge': weight_charge,
                            'tablename': tablename,
                            'vehicle_id':vehicle_id,
                            'delivery_status': delivery_status,
                            'driver_category':driver_category,
                            'distance':distance,
                            'rent':rent,
                            'assign_date':assign_date,
                            'driver_phone':driver_phone,
                            'additional_charge':additional_charge,
                            'additional_remarks':additional_remarks
                        };
                        $('#saveedited_Changes').html('Updating...');
                        $http.post("<?php echo base_url() ?>index.php/order_second/update_driverslist", postData)
                            .then(function(response) {
                                if (response.data.success) {
                                    alert("Changes Updated Successfully");
                                    $('#saveedited_Changes').html('Save');
                                    $('#details_edit').modal('hide');
                                }
                            })
                            .catch(function(error) {
                                console.error('Error updating data:', error);
                                alert("Error updating data. Please try again.");
                                $('#saveedited_Changes').html('Save');
                            });
                    }
                });

                    $(document).ready(function() {
                        $('[data-toggle="tooltip"]').tooltip();
                    });
                    /*For Enable the input field when click on edit icon*/
                    document.addEventListener('DOMContentLoaded', function() {
                        const editBtns = document.querySelectorAll('.editBtn');

                        editBtns.forEach(btn => {
                            btn.addEventListener('click', function(event) {
                                event.preventDefault(); 
                                
                                const targetId = btn.getAttribute('data-target');
                                const inputField = document.getElementById(targetId);
                                
                                if (inputField.getAttribute('readonly') === 'readonly') {
                                    inputField.removeAttribute('readonly');
                                    inputField.focus();
                                } else {
                                    inputField.setAttribute('readonly', 'readonly');
                                }
                            });
                        });
                    });
    </script>

    <?php include('table_footer.php'); ?>
</body>