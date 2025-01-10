<?php include "header.php"; ?>

<head>
   <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/css/components/customer_balance_report.css"> -->
   <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.min.css">


   <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
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
         max-height: 550px;
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
         font-size: 12px;
         background-color: #ffffffa3;
         text-align: center;
         /* border: 1px solid #ffffff; */
         backdrop-filter: blur(3px) brightness(0.5);
         white-space: nowrap;
         /* box-shadow: 3px 0px 3px 2px #3535353b; */

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

      .setload1 .table-body-cell {
         border-left: none !important;
         border-right: none !important;
      }

      .popover-container {
         position: relative;
         border-left: 0;
         display: inline-block;
         font-size: 12px;
      }

      .popover-content {
         display: none;
         /* opacity:0; */
         position: absolute;
         background-color: #fff;
         box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
         border: 1px solid #ccc;
         border-radius: 5px;
         padding: 10px;
         z-index: 1;
         /* min-width: 250px; */
         width: max-content;
      }


      .popover-content-left {
         display: none;
         /* opacity: 0; */
         right: 0;
         position: absolute;
         background-color: #fff;
         box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
         border: 1px solid #ccc;
         border-radius: 5px;
         padding: 10px;
         z-index: 1;
         /* min-width: 250px; */
         width: max-content;
      }

      .popover-content::before {
         content: "";
         position: absolute;
         top: 100%;
         left: 15px;
         /* left: 13px; */
         /* transform: translateX(-50%); */
         border-width: 10px;
         border-style: solid;
         border-color: #fff transparent transparent transparent;
      }

      .popover-content-left::before {
         content: "";
         position: absolute;
         top: 100%;
         right: 0;
         transform: translateX(-50%);
         border-width: 10px;
         border-style: solid;
         border-color: #fff transparent transparent transparent;
      }

      .popover-container:hover .popover-content {
         display: block;
         bottom: 35px;
         opacity: 1;
         left: -20px;
      }

      .popover-container:hover .popover-content-left {
         display: block;
         opacity: 1;
         bottom: 35px;
      }

      .message {
         color: gray !important;
         text-align: start;
      }

      .editedCol {
         /* background: #ffc7b1 !important; */
         width: 90% !important;
         border-right: none;
      }

      /* .resp-table-row :hover{
         background-color: #ffe6dd;
        } */
      .red {
         color: red;
      }

      .green {
         color: green;
      }

      * {
         transition: opacity 0.5s ease-in-out;
      }

      .lines {
         /* border-right: 2px dotted;
         position: relative;
         left: -10px;
         top: 14px; */
      }
   </style>
</head>


<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">
   <div id="layout-wrapper">
      <?php echo $top_nav; ?>
      <?php
      $customer_id = 0;
      if (isset($_GET['customer_id'])) {
         $customer_id = $_GET['customer_id'];
      }
$testMode = true;

      ?>

      <body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">
         <div id="layout-wrapper">
            <?php echo $top_nav; ?>
            <?php
            $customer_id = isset($_GET['customer_id']) ? $_GET['customer_id'] : 0;
            ?>
            <div class="main-content">
               <div class="page-content">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-12">
                           <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                              <h4 class="mb-sm-0 font-size-18">Balance Report</h4>
                              <div class="page-title-right">
                                 <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Balance Report !</li>
                                 </ol>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="card">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <br><br>
<h4 style="display: none;">File updates are being processed in this page. The report data will be back in few hours. </h4>


                                       <div class="row">

                                       </div>
                                       <div class="row" style="margin-bottom: 10px;">
                                          <ul class="nav nav-pills m-3" id="pills-tab" role="tablist">
                                             <?php 
                                              $usergroup = array(1, 15, 11,12);
                                              if (in_array($this->session->userdata['logged_in']['access'], $usergroup)) {
                                             
                                             
                                             ?>
                                             <li class="nav-item" role="presentation">
                                                <button ng-click="redirectSection('abstract')" class="nav-link  <?= isset($_GET['section']) ? ($_GET['section']  == 'abstract' ? 'active  btn-primary ' : ' btn-transparent ') : 'active  btn-primary ' ?>"  aria-selected="true">Abstract Report</button>
                                             </li>
                                             <?php 
                                              }
                                               $usergroup = array(1, 15, 11);
                                               $allow = in_array($this->session->userdata['logged_in']['access'], $usergroup);
                                               if ($allow) {
                                             ?>
                                             <li class="nav-item" role="presentation">
                                                <button ng-click="redirectSection('target_vs_actual')" class="nav-link <?= $_GET['section']  == 'target_vs_actual' ? 'active  btn-primary ' : ' btn-transparent' ?>"   data-bs-target="#pills-profile" type="button" aria-selected="false">Target vs Actual</button>
                                             </li>
                                             <?php 
                                             
                                          
                                        
                                             
                                             ?>
                                             <li class="nav-item" role="presentation">
                                                <button ng-click="redirectSection('balance_increase')" class="nav-link  <?= $_GET['section']   == 'balance_increase' ? 'active  btn-primary ' : ' btn-transparent' ?>" id="pills-increase-tab"    aria-selected="false">Balance Increase</button>
                                             </li>
                                             <?php 
                                          }
                                             ?>
                                          </ul>

                                         
                                       </div>
                                       <div class="tab-content" id="pills-tabContent">

                                          <div class="tab-pane fade  <?= isset($_GET['section']) ? ($_GET['section'] == 'abstract' ? 'show active' : '') : 'show active' ?>" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">

                                             <div class="row">
                                                <div class="col-12">


                                                   <div class="row">
                                                      <div id="search-view" style="display: none;">
                                                         <div class="card-header" ng-init="fetchSingleData(0)">
                                                            <h4 class="card-title">Abstract Report {{formdate}}
                                                               With {{todate}}</h4>
                                                         </div>
                                                      </div>
                                                      <div id="search-view1">
                                                         <div class="card-header" ng-init="fetchSingleData(0)">
                                                            <h4 class="card-title">Abstract Report
                                                               <?php echo date('d-m-Y', strtotime('-1 day')); ?> With
                                                               <?php echo date('d-m-Y'); ?>
                                                            </h4>
                                                         </div>
                                                      </div>
                                                      <div class="row">
                                                         <div class="col-11">
                                                            <div class="row" style=" white-space: nowrap;">
                                                               <div class="col-3">
                                                                  <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                                                            
                                                            
                                                          <?php
                                                                 if($this->session->userdata['logged_in']['access']!='12')
                                                                 {
                                                                     
                                                                     ?>
                                                                      <option value="ALL">All Sales Team</option>
                                                                     <?php
                                                                     
                                                                 }
                                                            ?>
                                                            
                                                            <?php
                                                            
                                                            foreach($customers as $val)
                                                            {
                                                                
                                                                 if($val->status==1)
                                                                {
                                                                    
                                                                
                                                                         if($this->session->userdata['logged_in']['access']=='12')
                                                                         {
                                                                             if($this->session->userdata['logged_in']['userid']==$val->id)
                                                                             {
                                                                                
                                                                             ?>
                                                                             
                                                                             <option   value="<?php echo $val->id; ?>" seletced><?php echo $val->name; ?></option>
                                                                      
                                                                             <?php 
                                                                            
                                                                             }
                                                                             
                                                                         }
                                                                         else
                                                                         {
                                                                             ?>
                                                                             
                                                                             <option <?= $val->id == $sales_team_id ? 'selected' : '' ?>  value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                                  
                                                                             <?php
                                                                         }
                                                                         
                                                                 
                                                                }
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                                                               </div>
                                                               <div class="col-3">
                                                                  <select class="form-control" id="sales_group">
                                                                     <option value="ALL">All Sales Group</option>
                                                                     <?php foreach ($sales_group as $vals) : ?>
                                                                        <option value="<?php echo $vals->id; ?>">
                                                                           <?php echo $vals->name; ?></option>
                                                                     <?php endforeach; ?>
                                                                  </select>
                                                               </div>
                                                               <div class="col">
                                                                  <input type="date" class="form-control" id="from-date" value="<?php echo date('Y-m-d', strtotime("-1 days")); ?>">
                                                               </div>
                                                               <div class="col text-center" style="align-self: center;white-space: nowrap;">
                                                                  <b>With</b>
                                                               </div>
                                                               <div class="col">
                                                                  <input type="date" class="form-control" id="to-date" value="<?php echo date('Y-m-d'); ?>">
                                                               </div>
                                                               <div class="col text-center">
                                                                  <button type="button" class="btn btn-secondary waves-effect waves-light p-1" ng-click="search()">Search</button>
                                                                  <button type="button" class="btn btn-success waves-effect waves-light p-1" id="exportdata_comparision">Export</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-1">
                                                            <div class="btn-group-horizontal mb-2 mx-2" role="group" aria-label="Vertical radio toggle button group">
                                                               <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio12" value="1" autocomplete="off" ng-click="dividentKey = 1">
                                                               <label class="btn btn-outline-danger" for="vbtn-radio12">1</label>
                                                               <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio22" value="L" autocomplete="off" checked ng-click="dividentKey = 'L'">
                                                               <label class="btn btn-outline-danger" for="vbtn-radio22">L </label>
                                                               <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio32" value="C" autocomplete="off" ng-click="dividentKey = 'C'">
                                                               <label class="btn btn-outline-danger" for="vbtn-radio32">C </label>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="table-responsive">
                                                      <div id="resp-table">
                                                         <div id="resp-table-body" style="position: relative;">
                                                            <div class="resp-table-row" style="position: sticky;top: 0;z-index:1;" class="table table-bordered" ng-init="fetchDatagetlegderGroup(0,0)">
                                                               <div class="table-body-cell  custom-header">No</div>
                                                               <div class="table-body-cell custom-header" style="width: 200px; cursor:pointer" ng-click="resetCollapse()">
                                                                  Name</div>
                                                               <div class="table-body-cell custom-header com-first-date">
                                                                  com-first-date</div>
                                                               <div class="table-body-cell custom-header com-second-date" style="border-right:1px solid #9d9d9d">
                                                                  com-second-date</div>
                                                               <div class="table-body-cell custom-header com-first-date" style="border-left:1px solid #9d9d9d">
                                                                  com-first-date</div>
                                                               <div class="table-body-cell custom-header com-first-date">
                                                                  com-first-date</div>
                                                               <div class="table-body-cell custom-header com-first-date" style="border-right:1px solid #9d9d9d">
                                                                  com-first-date</div>
                                                               <div class="table-body-cell custom-header com-second-date" style="border-left:1px solid #9d9d9d">
                                                                  com-second-date</div>
                                                               <div class="table-body-cell custom-header com-second-date">
                                                                  com-second-date</div>
                                                               <div class="table-body-cell custom-header com-second-date" style="border-right:1px solid #9d9d9d">
                                                                  com-second-date</div>
                                                               <div class="table-body-cell custom-header" style="border-left:1px solid #9d9d9d">
                                                                  Total</div>

                                                            </div>
                                                            <div class="resp-table-row" style="position: sticky;top: 50px;z-index:1;" class="table table-bordered">
                                                               <div class="table-body-cell  custom-header"> </div>
                                                               <div class="table-body-cell custom-header" style="width: 150px; cursor:pointer;border-top:none;" ng-click="resetCollapse()">
                                                               </div>
                                                               <div class="table-body-cell custom-header">
                                                                  BAL.LED</div>
                                                               <div class="table-body-cell custom-header" style="border-right:1px solid #9d9d9d">
                                                                  BAL.LED</div>
                                                               <div class="table-body-cell custom-header" style="border-left:1px solid #9d9d9d">
                                                                  ACT.BAL</div>
                                                               <div class="table-body-cell custom-header">
                                                                  SHEET</div>
                                                               <div class="table-body-cell custom-header" style="border-right:1px solid #9d9d9d">
                                                                  TOT</div>
                                                               <div class="table-body-cell custom-header" style="border-left:1px solid #9d9d9d">
                                                                  ACT.BAL</div>
                                                               <div class="table-body-cell custom-header">
                                                                  SHEET</div>
                                                               <div class="table-body-cell custom-header" style="border-right:1px solid #9d9d9d">
                                                                  TOT</div>
                                                               <div class="table-body-cell custom-header" style="border-left:1px solid #9d9d9d">
                                                               </div>

                                                            </div>
                                                            <div class="resp-table-row totals1" style="position: sticky;top: 100px;z-index:1;" class="table table-bordered">
                                                               <div class="table-body-cell  custom-header"> </div>
                                                               <div class="table-body-cell custom-header" style="width: 150px;cursor: n-resize;border-top:none;" ng-click="expandAll(1)">
                                                                  Totals:
                                                               </div>
                                                               <div class="table-body-cell custom-header balance_ledger">
                                                               </div>
                                                               <div class="table-body-cell custom-header balance_ledger2" style="border-right:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header net_balance" style="text-align: end;border-left:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header sheet_total" style="text-align: end;">
                                                               </div>
                                                               <div class="table-body-cell custom-header total" style="text-align: end;border-right:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header net_balance2" style="text-align: end;border-left:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header sheet_total2" style="text-align: end;">
                                                               </div>
                                                               <div class="table-body-cell custom-header total2" style="text-align: end;border-right:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header totalMain" style="text-align: end;border-left:1px solid #9d9d9d">
                                                               </div>

                                                            </div>
                                                             <div class="resp-table-row totals1" style="position: sticky;top: 100px;z-index:1;" class="table table-bordered">
                                                               <div class="table-body-cell  custom-header"> </div>
                                                               <div class="table-body-cell custom-header" style="width: 150px;cursor: n-resize;border-top:none;" ng-click="expandAll(1)">
                                                                  
                                                               </div>
                                                               <div class="table-body-cell custom-header  ">
                                                               </div>
                                                               <div class="table-body-cell custom-header  " style="border-right:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header net_balance_nd" style="text-align: end;border-left:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header sheet_total_nd" style="text-align: end;">
                                                               </div>
                                                               <div class="table-body-cell custom-header total_nd" style="text-align: end;border-right:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header net_balance2_nd" style="text-align: end;border-left:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header sheet_total2_nd" style="text-align: end;">
                                                               </div>
                                                               <div class="table-body-cell custom-header total2_nd" style="text-align: end;border-right:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header totalMain_nd" style="text-align: end;border-left:1px solid #9d9d9d">
                                                               </div>

                                                            </div>

                                                            <div class="resp-table-row setload">
                                                               <div class="table-body-cell"></div>
                                                               <div class="table-body-cell"></div>
                                                               <div class="table-body-cell"></div>
                                                               <div class="table-body-cell"></div>
                                                               <div class="table-body-cell  ">
                                                                  <loading></loading>
                                                               </div>
                                                               <div class="table-body-cell"></div>

                                                               <div class="table-body-cell"></div>
                                                               <div class="table-body-cell"></div>
                                                               <div class="table-body-cell"></div>
                                                               <div class="table-body-cell"></div>
                                                               <div class="table-body-cell"></div>


                                                            </div>
                                                            <div class="primary" ng-repeat="data in namesDataledgergroup">
                                                               <div class="resp-table-row trpoint" style=" box-shadow: inset -1px 0px 0px 3px #f0f0f0f7;" ng-click="toggleCollapse($event,data.teamGroupIndex,data.groupIndex,data.index)">
                                                                  <div class="table-body-cell"> </div>
                                                                  <div class="table-body-cell " style="width: 150px; text-align:start;">
                                                                     {{ data.key }} <i style="color:#cfcfcf;float: right;margin: 7px;" class="mdi mdi-arrow-up-thick float-right"></i>
                                                                  </div>
                                                                  <div class="table-body-cell">
                                                                     {{ data.balance_ledger }}
                                                                  </div>
                                                                  <div class="table-body-cell" style="border-right:1px solid #9d9d9d">
                                                                     {{ data.balance_ledger2 }}
                                                                  </div>
                                                                  <div class="table-body-cell   text-end" style="border-left:1px solid #9d9d9d">
                                                                     {{ data.net_balance | indianCurrency }}
                                                                  </div>
                                                                  <div class="table-body-cell  text-end">
                                                                     {{ data.sheet | indianCurrency  }}
                                                                  </div>
                                                                  <div class="table-body-cell text-end " style="border-right:1px solid #9d9d9d">
                                                                     {{ data.total | indianCurrency }}
                                                                  </div>
                                                                  <div class="table-body-cell  text-end" style="border-left:1px solid #9d9d9d">
                                                                     {{ data.net_balance2 | indianCurrency }}
                                                                  </div>
                                                                  <div class="table-body-cell  text-end">
                                                                     {{ data.sheet2 | indianCurrency }}
                                                                  </div>
                                                                  <div class="table-body-cell text-end " style="border-right:1px solid #9d9d9d">
                                                                     {{ data.total2 | indianCurrency }}
                                                                  </div>
                                                                  <div class="table-body-cell  text-end" style="border-left:1px solid #9d9d9d">
                                                                     {{ data.totalMain | indianCurrency }}
                                                                  </div>
                                                               </div>
                                                               <div class="primary" ng-repeat="names in data.values">
                                                                  <div class="resp-table-row trpoint" style="background: #ffffff;" ng-if="(!names.collapsed)" ng-click="toggleCollapse($event,names.teamGroupIndex,names.groupIndex,names.index)">
                                                                     <div class="table-body-cell"> </div>
                                                                     <div class="table-body-cell " style="width: 150px; text-align:center;">
                                                                        {{ names.sales_group_name }} <i style="color:#cfcfcf;float: right;margin: 7px;" class="mdi mdi-arrow-up-thick float-right"></i>
                                                                     </div>
                                                                     <div class="table-body-cell price-main ">
                                                                        {{ names.balance_ledger }}
                                                                     </div>
                                                                     <div class="table-body-cell  price-main " style="border-right:1px solid #9d9d9d">
                                                                        {{ names.balance_ledger2 }}
                                                                     </div>
                                                                     <div class="table-body-cell  price-main text-end" style="border-left:1px solid #9d9d9d">
                                                                        {{ names.net_balance | indianCurrency }}
                                                                     </div>
                                                                     <div class="table-body-cell  price-main text-end">
                                                                        {{ names.sheet_total | indianCurrency }}
                                                                     </div>
                                                                     <div class="table-body-cell  price-main text-end" style="border-right:1px solid #9d9d9d">
                                                                        {{ names.total | indianCurrency }}
                                                                     </div>
                                                                     <div class="table-body-cell  price-main text-end" style="border-left:1px solid #9d9d9d">
                                                                        {{ names.net_balance2 | indianCurrency }}
                                                                     </div>
                                                                     <div class="table-body-cell  price-main text-end">
                                                                        {{ names.sheet_total2 | indianCurrency  }}
                                                                     </div>
                                                                     <div class="table-body-cell  price-main text-end" style="border-right:1px solid #9d9d9d">
                                                                        {{ names.total2 | indianCurrency  }}
                                                                     </div>
                                                                     <div class="table-body-cell  price-main text-end" style="border-left:1px solid #9d9d9d">
                                                                        {{ names.totalMain | indianCurrency }}
                                                                     </div>
                                                                  </div>
                                                                  <div class="secondchild" ng-repeat="namesvvssget in names.salesperson">
                                                                     <div class="resp-table-row sales_table_head slide" ng-if="!namesvvssget.collapsed"  style="background-color: #f9f9f9;">
                                                                        <div class="table-body-cell price-sl">{{ namesvvssget.no }}</div>
                                                                        <div class="table-body-cell" style="width: 150px; text-align:right;cursor:pointer"  ng-click="redirectSalesPerson(names.sales_person_id,namesvvssget.sales_team_id,todate)">
                                                                           {{ namesvvssget.sales_person_name }}
                                                                        </div>
                                                                        <div class="table-body-cell price-sl">
                                                                           {{ namesvvssget.balance_ledger }}
                                                                        </div>
                                                                        <div class="table-body-cell price-sl" style="border-right:1px solid #9d9d9d">
                                                                           {{ namesvvssget.balance_ledger2 }}
                                                                        </div>
                                                                        <div class="table-body-cell price-sl text-end" style="border-left:1px solid #9d9d9d">
                                                                           {{ namesvvssget.balance | indianCurrency }}
                                                                        </div>
                                                                        <div class="table-body-cell price-sl text-end">
                                                                           {{ namesvvssget.sheet | indianCurrency }}
                                                                        </div>
                                                                        <div class="table-body-cell price-sl text-end" style="border-right:1px solid #9d9d9d">
                                                                           {{ namesvvssget.total | indianCurrency  }}
                                                                        </div>
                                                                        <div class="table-body-cell price-sl text-end" style="border-left:1px solid #9d9d9d">
                                                                           {{ namesvvssget.balance2 | indianCurrency }}
                                                                        </div>
                                                                        <div class="table-body-cell price-sl text-end">
                                                                           {{ namesvvssget.sheet2 | indianCurrency }}
                                                                        </div>
                                                                        <div class="table-body-cell price-sl text-end" style="border-right:1px solid #9d9d9d">
                                                                           {{ namesvvssget.total2 | indianCurrency }}
                                                                        </div>
                                                                        <div class="table-body-cell price-sl text-end" style="border-left:1px solid #9d9d9d">
                                                                           {{ namesvvssget.totalMain | indianCurrency  }}
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
                                          <div class="tab-pane fade <?= $_GET['section']  == 'target_vs_actual'  && $allow ? 'show active' : '' ?>" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                             <div class="row">
                                                <div class="col-12">
                                                   <div class="row">
                                                      <div id="search-view2" style="display: none;">
                                                         <div class="card-header" ng-init="fetchSingleData(0)">
                                                            <h4 class="card-title"> Target vs Actual {{formdate1}}
                                                               With {{todate1}}</h4>
                                                         </div>
                                                      </div>
                                                      <div id="search-view3">
                                                         <div class="card-header" ng-init="fetchSingleData(0)">
                                                            <h4 class="card-title">Target vs Actual
                                                               <?php echo date('d-m-Y', strtotime($benchmark_date)); ?> With
                                                               <?php echo date('d-m-Y') ?>
                                                            </h4>
                                                         </div>
                                                      </div>
                                                      <div class="row">
                                                         <div class="col-11"  style=" white-space: nowrap;">
                                                            <div class="row">
                                                               <div class="col-3">
                                                                   <select class="form-control" data-trigger name="choices-single-default1" id="choices-single-default1">
                                                            
                                                            
                                                          <?php
                                                                 if($this->session->userdata['logged_in']['access']!='12')
                                                                 {
                                                                     
                                                                     ?>
                                                                      <option value="ALL">All Sales Team</option>
                                                                     <?php
                                                                     
                                                                 }
                                                            ?>
                                                            
                                                            <?php
                                                            
                                                            foreach($customers as $val)
                                                            {
                                                                
                                                                 if($val->status==1)
                                                                {
                                                                    
                                                                
                                                                         if($this->session->userdata['logged_in']['access']=='12')
                                                                         {
                                                                             if($this->session->userdata['logged_in']['userid']==$val->id)
                                                                             {
                                                                                
                                                                             ?>
                                                                             
                                                                             <option   value="<?php echo $val->id; ?>" seletced><?php echo $val->name; ?></option>
                                                                      
                                                                             <?php 
                                                                            
                                                                             }
                                                                             
                                                                         }
                                                                         else
                                                                         {
                                                                             ?>
                                                                             
                                                                             <option <?= $val->id == $sales_team_id ? 'selected' : '' ?>  value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                                  
                                                                             <?php
                                                                         }
                                                                         
                                                                 
                                                                }
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                                                               </div>
                                                               <div class="col-3">
                                                                  <select class="form-control" id="sales_group1">
                                                                     <option value="ALL">All Sales Group</option>
                                                                     <?php foreach ($sales_group as $vals) : ?>
                                                                        <option value="<?php echo $vals->id; ?>">
                                                                           <?php echo $vals->name; ?></option>
                                                                     <?php endforeach; ?>
                                                                  </select>
                                                               </div>
                                                             
                                                               <div class="col">

                                                                  <input type="date" class="form-control" id="from-date1" value="<?php echo  $benchmark_date; ?>">
                                                               </div>
                                                               <div class="col text-center" style="align-self: center;white-space: nowrap;">
                                                                  <b>With</b>
                                                               </div>
                                                               <div class="col">
                                                                  <input type="date" class="form-control" id="to-date1" value="<?php echo date('Y-m-d'); ?>">
                                                               </div>
                                                               <div class="col text-center">
                                                                  <button type="button" class="btn btn-secondary waves-effect waves-light p-1" ng-click="search2()">Search</button>
                                                                  <button type="button" class="btn btn-success waves-effect waves-light p-1" id="exportdata_with_credit">Export</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-1">
                                                            <div class="btn-group-horizontal mb-2 mx-2" role="group" aria-label="Vertical radio toggle button group">
                                                               <input type="radio" class="btn-check" name="vbtn-radio1" id="vbtn-radio11" value="1" autocomplete="off">
                                                               <label class="btn btn-outline-danger" for="vbtn-radio11"> 1</label>
                                                               <input type="radio" class="btn-check" name="vbtn-radio1" id="vbtn-radio21" value="L" autocomplete="off" checked>
                                                               <label class="btn btn-outline-danger" for="vbtn-radio21"> L </label>
                                                               <input type="radio" class="btn-check" name="vbtn-radio1" id="vbtn-radio31" value="C" autocomplete="off">
                                                               <label class="btn btn-outline-danger" for="vbtn-radio31"> C </label>
                                                            </div>
                                                         </div>
                                                      </div>



                                                   </div>
                                                   <div class="table-responsive">
                                                      <div id="resp-table">
                                                         <div id="resp-table-body" style="position: relative;">
                                                            <div class="resp-table-row" style="position: sticky;top: 0;z-index:1;" class="table table-bordered" ng-init="fetchDatagetlegderGroup2(0,0)">
                                                               <div class="table-body-cell  custom-header">No</div>
                                                               <div class="table-body-cell custom-header" style="width: 150px; cursor:pointer" ng-click="resetCollapse()">
                                                                  Name</div>
                                                               <div class="table-body-cell custom-header com-first-date1" style="border-right:1px solid #9d9d9d">
                                                                  com-first-date</div>
                                                               <div class="table-body-cell custom-header com-second-date1" style="border-left:1px solid #9d9d9d">
                                                                  com-second-date</div>
                                                               <div class="table-body-cell custom-header com-second-date1">
                                                                  com-second-date</div>
                                                               <div class="table-body-cell custom-header com-second-date1" style="border-right:1px solid #9d9d9d">
                                                                  com-second-date</div>
                                                               <div class="table-body-cell custom-header com-first-date1" style="border-left:1px solid #9d9d9d">
                                                                  com-first-date</div>
                                                               <div class="table-body-cell custom-header com-first-date1">
                                                                  com-first-date</div>
                                                               <div class="table-body-cell custom-header com-first-date1" style="border-right:1px solid #9d9d9d">
                                                                  com-first-date</div>
                                                               <div class="table-body-cell custom-header com-second-date1" style="border-left:1px solid #9d9d9d">
                                                                  com-second-date</div>
                                                               <div class="table-body-cell custom-header com-second-date1">
                                                                  com-second-date</div>
                                                               <div class="table-body-cell custom-header com-second-date1" style="border-right:1px solid #9d9d9d">
                                                                  com-second-date</div>
                                                               <div class="table-body-cell custom-header" style="border-left:1px solid #9d9d9d">
                                                                  Total</div>
                                                            </div>
                                                            <div class="resp-table-row" style="position: sticky;top: 50px;z-index:1;" class="table table-bordered">
                                                               <div class="table-body-cell  custom-header"> </div>
                                                               <div class="table-body-cell custom-header" style="width: 150px; cursor:pointer;border-top:none;" ng-click="resetCollapse()">
                                                               </div>
                                                               <div class="table-body-cell custom-header" style="border-right:1px solid #9d9d9d">
                                                                  BAL.LED</div>
                                                               <div class="table-body-cell custom-header" style="border-left:1px solid #9d9d9d">
                                                                  BAL.LED</div>
                                                               <div class="table-body-cell custom-header">
                                                                  S.LED</div>
                                                               <div class="table-body-cell custom-header" style="border-right:1px solid #9d9d9d">
                                                                  C.LED</div>
                                                               <div class="table-body-cell custom-header" style="border-left:1px solid #9d9d9d">
                                                                  ACT.BAL</div>
                                                               <div class="table-body-cell custom-header">
                                                                  SHEET</div>
                                                               <div class="table-body-cell custom-header" style="border-right:1px solid #9d9d9d">
                                                                  Total</div>
                                                               <div class="table-body-cell custom-header" style="border-left:1px solid #9d9d9d">
                                                                  ACT.BAL</div>
                                                               <div class="table-body-cell custom-header">
                                                                  SHEET</div>
                                                               <div class="table-body-cell custom-header" style="border-right:1px solid #9d9d9d">
                                                                  TOT</div>
                                                               <div class="table-body-cell custom-header" style="border-left:1px solid #9d9d9d">
                                                               </div>

                                                            </div>
                                                            <div class="resp-table-row totals2" style="position: sticky;top: 100px;z-index:1;" class="table table-bordered">
                                                               <div class="table-body-cell  custom-header"> </div>
                                                               <div class="table-body-cell custom-header" style="width: 150px; cursor:n-resize;border-top:none;" ng-click="expandAll(2)">
                                                                  Totals:
                                                               </div>
                                                               <div class="table-body-cell custom-header balance_ledger" style="border-right:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header balance_ledger2" style="border-left:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header sheet_ledger">
                                                               </div>
                                                               <div class="table-body-cell custom-header credit_ledger" style=" border-right:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header net_balance" style="text-align: end;border-left:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header sheet_total" style="text-align: end;">
                                                               </div>
                                                               <div class="table-body-cell custom-header total" style="text-align: end;border-right:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header net_balance2" style="text-align: end;border-left:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header sheet_total2" style="text-align: end;">
                                                               </div>
                                                               <div class="table-body-cell custom-header total2" style="text-align: end;border-right:1px solid #9d9d9d">
                                                               </div>
                                                               <div class="table-body-cell custom-header totalMain" style="text-align: end;border-left:1px solid #9d9d9d">
                                                               </div>

                                                            </div>
                                                            <div class="resp-table-row setload1">
                                                               <div class="table-body-cell"></div>
                                                               <div class="table-body-cell"></div>
                                                               <div class="table-body-cell"></div>
                                                               <div class="table-body-cell"></div>
                                                               <div class="table-body-cell  ">
                                                                  <loading></loading>
                                                               </div>
                                                               <div class="table-body-cell"></div>

                                                               <div class="table-body-cell"></div>
                                                               <div class="table-body-cell"></div>
                                                               <div class="table-body-cell"></div>
                                                               <div class="table-body-cell"></div>
                                                               <div class="table-body-cell"></div>


                                                            </div>
                                                            <div class="primary" ng-repeat="data in namesDataledgergroup2">
                                                               <div class="resp-table-row trpoint" style=" box-shadow: inset -1px 0px 0px 3px #f0f0f0f7;" ng-click="toggleCollapse2($event,data.teamGroupIndex,data.groupIndex,data.index)">
                                                                  <div class="table-body-cell"> </div>
                                                                  <div class="table-body-cell " style="width: 150px; text-align:start;">
                                                                     {{ data.key }}<i style="color:#cfcfcf;float: right;margin: 7px;" class="mdi mdi-arrow-up-thick float-right"></i>
                                                                  </div>
                                                                  <div class="table-body-cell " style="border-right:1px solid #9d9d9d">
                                                                     {{ data.balance_ledger }}
                                                                  </div>
                                                                  <div class="table-body-cell" style="border-left:1px solid #9d9d9d">
                                                                     {{ data.balance_ledger2 }}
                                                                  </div>
                                                                  <div class="table-body-cell ">
                                                                     {{ data.sheet_ledger }}
                                                                  </div>
                                                                  <div class="table-body-cell " style="border-right:1px solid #9d9d9d">
                                                                     {{ data.credit_ledger }}
                                                                  </div>
                                                                  <div class="table-body-cell text-end" style="border-left:1px solid #9d9d9d">
                                                                     {{ data.net_balance | indianCurrency  }}
                                                                  </div>
                                                                  <div class="table-body-cell text-end">
                                                                     {{ data.sheet | indianCurrency  }}
                                                                  </div>
                                                                  <div class="table-body-cell text-end" style="border-right:1px solid #9d9d9d">
                                                                     {{ data.total | indianCurrency  }}
                                                                  </div>
                                                                  <div class="table-body-cell text-end" style="border-left:1px solid #9d9d9d">
                                                                     {{ data.net_balance2 | indianCurrency  }}
                                                                  </div>
                                                                  <div class="table-body-cell text-end">
                                                                     {{ data.sheet2 | indianCurrency  }}
                                                                  </div>
                                                                  <div class="table-body-cell text-end" style="border-right:1px solid #9d9d9d">
                                                                     {{ data.total2 | indianCurrency  }}
                                                                  </div>
                                                                  <div class="table-body-cell text-end" style="border-left:1px solid #9d9d9d">
                                                                     {{ data.totalMain | indianCurrency  }}
                                                                  </div>

                                                               </div>
                                                               <div class="primary" ng-repeat="names in data.values">
                                                                  <div class="resp-table-row trpoint" style="background: #ffffff;" ng-if="(!names.collapsed)" ng-click="toggleCollapse2($event,names.teamGroupIndex,names.groupIndex,names.index)">
                                                                     <div class="table-body-cell"> </div>
                                                                     <div class="table-body-cell " style="width: 150px; text-align:center;">
                                                                        {{ names.sales_group_name }}<i style="color:#cfcfcf;float: right;margin: 7px;" class="mdi mdi-arrow-up-thick float-right"></i>
                                                                     </div>
                                                                     <div class="table-body-cell price-main" style="border-right:1px solid #9d9d9d">
                                                                        {{ names.balance_ledger }}
                                                                     </div>
                                                                     <div class="table-body-cell  price-main " style="border-left:1px solid #9d9d9d">
                                                                        {{ names.balance_ledger2 }}
                                                                     </div>
                                                                     <div class="table-body-cell ">
                                                                        {{ names.sheet_ledger }}
                                                                     </div>
                                                                     <div class="table-body-cell " style="border-right:1px solid #9d9d9d">
                                                                        {{ names.credit_ledger }}
                                                                     </div>
                                                                     <div class="table-body-cell price-sl text-end" style="border-left:1px solid #9d9d9d">
                                                                        {{ names.net_balance | indianCurrency }}
                                                                     </div>
                                                                     <div class="table-body-cell  price-sl text-end">
                                                                        {{ names.sheet_total | indianCurrency }}
                                                                     </div>
                                                                     <div class="table-body-cell  price-sl text-end" style="border-right:1px solid #9d9d9d">
                                                                        {{ names.total | indianCurrency }}
                                                                     </div>
                                                                     <div class="table-body-cell price-sl text-end" style="border-left:1px solid #9d9d9d">
                                                                        {{ names.net_balance2 | indianCurrency }}
                                                                     </div>
                                                                     <div class="table-body-cell  price-sl text-end">
                                                                        {{ names.sheet_total2 | indianCurrency }}
                                                                     </div>
                                                                     <div class="table-body-cell  price-sl text-end" style="border-right:1px solid #9d9d9d">
                                                                        {{ names.total2 | indianCurrency }}
                                                                     </div>
                                                                     <div class="table-body-cell  price-sl text-end" style="border-left:1px solid #9d9d9d">
                                                                        {{ names.totalMain | indianCurrency }}
                                                                     </div>

                                                                  </div>
                                                                  <div class="secondchild" ng-repeat="namesvvssget in names.salesperson">
                                                                     <div class="resp-table-row sales_table_head slide" ng-if="!namesvvssget.collapsed"  style="background-color: #f9f9f9;">
                                                                        <div class="table-body-cell price-sl">{{ namesvvssget.no }}
                                                                        </div>
                                                                        <div class="table-body-cell " style="width: 150px; text-align:right;cursor:pointer;"  ng-click="redirectSalesPerson(names.id,namesvvssget.sales_person_id,todate1)">

                                                                           {{ namesvvssget.sales_person_name }}


                                                                        </div>
                                                                        <div class="table-body-cell" ng-if=" namesvvssget.updates_bal_led.length > 0" style="border-right: 1px solid #9d9d9d;">

                                                                           <div style="display:table-row">
                                                                              <div class="table-body-cell price-sl editable border-none" ng-class="{'editedCol' : namesvvssget.updates_bal_led.length > 0}" data-field="bal_led" data-team-id="{{names.sales_team_id}}" data-salesman-id="{{namesvvssget.sales_person_id}}">
                                                                                 {{ namesvvssget.balance_ledger }}
                                                                              </div>
                                                                              <div ng-if="namesvvssget.updates_bal_led.length > 0" class="popover-container table-body-cell border-none" style="border:none;border-right:1px solid #9d9d9d;">
                                                                                 <i class="fas fa-sort-up"></i>
                                                                                 <div class="popover-content">
                                                                                    <div class="message" ng-repeat=" items in namesvvssget.updates_bal_led">
                                                                                       <i class="fa fa-clock"></i>
                                                                                       <span class="lines"></span>
                                                                                       &nbsp; {{ items.message }}<br />
                                                                                    </div>
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                        <div class="table-body-cell price-sl editable" data-field="bal_led" data-team-id="{{names.sales_team_id}}" data-salesman-id="{{namesvvssget.sales_person_id}}" style="border-right:1px solid #9d9d9d;" ng-if="namesvvssget.updates_bal_led.length == 0">
                                                                           {{ namesvvssget.balance_ledger }}
                                                                        </div>

                                                                        <div class="table-body-cell price-sl" style="border-left:1px solid #9d9d9d">
                                                                           {{ namesvvssget.balance_ledger2 }}
                                                                        </div>
                                                                        <div class="table-body-cell price-sl">
                                                                           {{ namesvvssget.sheet_ledger }}
                                                                        </div>
                                                                        <div class="table-body-cell price-sl" style="border-right:1px solid #9d9d9d">
                                                                           {{ namesvvssget.credit_ledger }}
                                                                        </div>
                                                                        <div class="table-body-cell" ng-if=" namesvvssget.updates_act_bal.length > 0" style="border-left:1px solid #9d9d9d;">
                                                                           <div style="display:table-row">
                                                                              <div class="table-body-cell price-sl editable text-end border-none" ng-class="{'editedCol' : namesvvssget.updates_act_bal.length > 0}" data-field="act_bal" data-team-id="{{names.sales_team_id}}" data-salesman-id="{{namesvvssget.sales_person_id}}">
                                                                                 {{ namesvvssget.balance | indianCurrency }}
                                                                              </div>
                                                                              <div ng-if="namesvvssget.updates_act_bal.length > 0" class="popover-container table-body-cell border-none">
                                                                                 <i class="fas fa-sort-up"></i>
                                                                                 <div class="popover-content-left">
                                                                                    <div class="message" ng-repeat=" items in namesvvssget.updates_act_bal">
                                                                                       <i class="fa fa-clock"></i><span class="lines"></span> &nbsp; {{ items.message }}<br />
                                                                                    </div>
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                        <div class="table-body-cell price-sl editable text-end" data-field="act_bal" data-team-id="{{names.sales_team_id}}" data-salesman-id="{{namesvvssget.sales_person_id}}" style="border-left:1px solid #9d9d9d;" ng-if="namesvvssget.updates_act_bal.length == 0">
                                                                           {{ namesvvssget.balance | indianCurrency }}
                                                                        </div>



                                                                        <div class="table-body-cell" ng-if=" namesvvssget.updates_sheet.length > 0">
                                                                           <div style="display:table-row">
                                                                              <div class="table-body-cell price-sl editable text-end border-none" ng-class="{'editedCol' : namesvvssget.updates_sheet.length > 0}" data-field="sheet" data-team-id="{{names.sales_team_id}}" data-salesman-id="{{namesvvssget.sales_person_id}}">
                                                                                 {{ namesvvssget.sheet | indianCurrency }}
                                                                              </div>
                                                                              <div ng-if="namesvvssget.updates_sheet.length > 0" class="popover-container table-body-cell border-none">
                                                                                 <i class="fas fa-sort-up"></i>
                                                                                 <div class="popover-content-left">
                                                                                    <div class="message" ng-repeat=" items in namesvvssget.updates_sheet">
                                                                                       <i class="fa fa-clock"></i><span class="lines"></span> &nbsp; {{ items.message }}<br />
                                                                                    </div>
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                        <div class="table-body-cell price-sl editable text-end" data-field="sheet" data-team-id="{{names.sales_team_id}}" data-salesman-id="{{namesvvssget.sales_person_id}}" ng-if="namesvvssget.updates_sheet.length == 0">
                                                                           {{ namesvvssget.sheet | indianCurrency }}
                                                                        </div>




                                                                        <div class="table-body-cell  price-sl text-end " style="border-right:1px solid #9d9d9d">
                                                                           {{ namesvvssget.total | indianCurrency }}
                                                                        </div>
                                                                        <div class="table-body-cell price-sl text-end" style="border-left:1px solid #9d9d9d">
                                                                           {{ namesvvssget.balance2 | indianCurrency }}
                                                                        </div>
                                                                        <div class="table-body-cell  price-sl text-end">
                                                                           {{ namesvvssget.sheet2 | indianCurrency }}
                                                                        </div>
                                                                        <div class="table-body-cell  price-sl text-end" style="border-right:1px solid #9d9d9d">
                                                                           {{ namesvvssget.total2 | indianCurrency }}
                                                                        </div>
                                                                        <div class="table-body-cell  price-sl text-end" style="border-left:1px solid #9d9d9d">
                                                                           {{ namesvvssget.totalMain | indianCurrency }}
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

                                          <div class="tab-pane fade <?= $_GET['section'] == 'balance_increase'  && $allow ? 'show active' : '' ?>" id="pills-increase" role="tabpanel" aria-labelledby="pills-increase-tab" tabindex="0">
                                             <div class="row">
                                                <div id="search-view4" style="display: none;">
                                                   <div class="card-header" ng-init="fetchSingleData(0)">
                                                      <h4 class="card-title text-center ">Balance Increase Report {{formdate2}}
                                                         With {{todate2}}</h4>
                                                   </div>
                                                </div>
                                                <div id="search-view5">
                                                   <div class="card-header" ng-init="fetchSingleData(0)">
                                                      <h4 class="card-title text-center ">Balance Increase Report
                                                         <?php echo date('d-m-Y', strtotime("-1 day")); ?> With
                                                         <?php echo  date('d-m-Y'); ?>
                                                      </h4>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-11">
                                                      <div class="row" style="align-self: center;white-space: nowrap;">
                                                         <div class="col-3">
                                                              <select class="form-control" data-trigger name="choices-single-default2" id="choices-single-default2">
                                                            
                                                            
                                                          <?php
                                                                 if($this->session->userdata['logged_in']['access']!='12')
                                                                 {
                                                                     
                                                                     ?>
                                                                      <option value="ALL">All Sales Team</option>
                                                                     <?php
                                                                     
                                                                 }
                                                            ?>
                                                            
                                                            <?php
                                                            
                                                            foreach($customers as $val)
                                                            {
                                                                
                                                                 if($val->status==1)
                                                                {
                                                                    
                                                                
                                                                         if($this->session->userdata['logged_in']['access']=='12')
                                                                         {
                                                                             if($this->session->userdata['logged_in']['userid']==$val->id)
                                                                             {
                                                                                
                                                                             ?>
                                                                             
                                                                             <option   value="<?php echo $val->id; ?>" seletced><?php echo $val->name; ?></option>
                                                                      
                                                                             <?php 
                                                                            
                                                                             }
                                                                             
                                                                         }
                                                                         else
                                                                         {
                                                                             ?>
                                                                             
                                                                             <option <?= $val->id == $sales_team_id ? 'selected' : '' ?>  value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                                  
                                                                             <?php
                                                                         }
                                                                         
                                                                 
                                                                }
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                                                         </div>
                                                         <div class="col-3">
                                                            <select class="form-control" id="sales_group2">
                                                               <option value="ALL">All Sales Group</option>
                                                               <?php foreach ($sales_group as $vals) : ?>
                                                                  <option value="<?php echo $vals->id; ?>">
                                                                     <?php echo $vals->name; ?></option>
                                                               <?php endforeach; ?>
                                                            </select>
                                                         </div>
                                                         <div class="col">
                                                            <input type="date" class="form-control" id="from-date2" value="<?php echo date('Y-m-d', strtotime("-1 days")); ?>">
                                                         </div>
                                                         <div class="col text-center" style="align-self: center;white-space: nowrap;">
                                                            <b>With</b>
                                                         </div>
                                                         <div class="col">
                                                            <input type="date" class="form-control" id="to-date2" value="<?php echo date('Y-m-d'); ?>">
                                                         </div>
                                                         <div class="col text-center">
                                                            <button type="button" class="btn btn-secondary waves-effect waves-light p-1" ng-click="search3()">Search</button>
                                                            <button type="button" class="btn btn-success waves-effect waves-light p-1" id="exportdata_increase">Export</button>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-1">
                                                      <div class="btn-group-horizontal mb-2 mx-2" role="group" aria-label="Vertical radio toggle button group">
                                                         <input type="radio" class="btn-check" name="vbtn-radio2" id="vbtn-radio1" value="1" autocomplete="off">
                                                         <label class="btn btn-outline-danger" for="vbtn-radio1">1</label>
                                                         <input type="radio" class="btn-check" name="vbtn-radio2" id="vbtn-radio2" value="L" autocomplete="off" checked>
                                                         <label class="btn btn-outline-danger" for="vbtn-radio2">L </label>
                                                         <input type="radio" class="btn-check" name="vbtn-radio2" id="vbtn-radio3" value="C" autocomplete="off">
                                                         <label class="btn btn-outline-danger" for="vbtn-radio3">C </label>
                                                      </div>
                                                   </div>
                                                </div>


                                             </div>
                                             <div class="table-responsive">
                                                <div id="resp-table">
                                                   <div id="resp-table-body" style="position: relative;">
                                                      <div class="resp-table-row" style="position: sticky;top: 0;z-index:1;" class="table table-bordered" ng-init="fetchDatagetlegderGroup3(0,0)">
                                                         <div class="table-body-cell  custom-header">No</div>
                                                         <div class="table-body-cell custom-header" style="width: 200px; cursor:pointer" ng-click="resetCollapse()">
                                                            Name</div>
                                                         <div class="table-body-cell custom-header com-first-date2">
                                                            com-first-date</div>
                                                         <div class="table-body-cell custom-header com-second-date2" style="border-right:1px solid #9d9d9d">
                                                            com-second-date</div>
                                                         <div class="table-body-cell custom-header com-first-date2" style="border-left:1px solid #9d9d9d">
                                                            com-first-date</div>
                                                         <div class="table-body-cell custom-header com-first-date2">
                                                            com-first-date</div>
                                                         <div class="table-body-cell custom-header com-first-date2" style="border-right:1px solid #9d9d9d">
                                                            com-first-date</div>
                                                         <div class="table-body-cell custom-header com-second-date2" style="border-left:1px solid #9d9d9d">
                                                            com-second-date</div>
                                                         <div class="table-body-cell custom-header com-second-date2">
                                                            com-second-date</div>
                                                         <div class="table-body-cell custom-header com-second-date2" style="border-right:1px solid #9d9d9d">
                                                            com-second-date</div>
                                                         <div class="table-body-cell custom-header" style="border-left:1px solid #9d9d9d">
                                                            Total</div>

                                                      </div>
                                                      <div class="resp-table-row" style="position: sticky;top: 50px;z-index:1;" class="table table-bordered">
                                                         <div class="table-body-cell  custom-header"> </div>
                                                         <div class="table-body-cell custom-header" style="width: 150px; cursor:pointer;border-top:none;" ng-click="resetCollapse()">
                                                         </div>
                                                         <div class="table-body-cell custom-header">
                                                            BAL.LED</div>
                                                         <div class="table-body-cell custom-header" style="border-right:1px solid #9d9d9d">
                                                            BAL.LED</div>
                                                         <div class="table-body-cell custom-header" style="border-left:1px solid #9d9d9d">
                                                            ACT.BAL</div>
                                                         <div class="table-body-cell custom-header">
                                                            SHEET</div>
                                                         <div class="table-body-cell custom-header" style="border-right:1px solid #9d9d9d">
                                                            Total</div>
                                                         <div class="table-body-cell custom-header" style="border-left:1px solid #9d9d9d">
                                                            ACT.BAL</div>
                                                         <div class="table-body-cell custom-header">
                                                            SHEET</div>
                                                         <div class="table-body-cell custom-header" style="border-right:1px solid #9d9d9d">
                                                            TOT</div>
                                                         <div class="table-body-cell custom-header" style="border-left:1px solid #9d9d9d">
                                                         </div>

                                                      </div>
                                                      <div class="resp-table-row totals3" style="position: sticky;top: 100px;z-index:1;" class="table table-bordered">
                                                         <div class="table-body-cell  custom-header"> </div>
                                                         <div class="table-body-cell custom-header" style="width: 150px; cursor:n-resize;border-top:none;" ng-click="expandAll(3)">
                                                            Totals:
                                                         </div>
                                                         <div class="table-body-cell custom-header balance_ledger">
                                                         </div>
                                                         <div class="table-body-cell custom-header balance_ledger2" style="border-right:1px solid #9d9d9d">
                                                         </div>
                                                         <div class="table-body-cell custom-header net_balance" style="text-align: end;border-left:1px solid #9d9d9d">
                                                         </div>
                                                         <div class="table-body-cell custom-header sheet_total" style="text-align: end;">
                                                         </div>
                                                         <div class="table-body-cell custom-header total" style="text-align: end;border-right:1px solid #9d9d9d">
                                                         </div>
                                                         <div class="table-body-cell custom-header net_balance2" style="text-align: end;border-left:1px solid #9d9d9d">
                                                         </div>
                                                         <div class="table-body-cell custom-header sheet_total2" style="text-align: end;">
                                                         </div>
                                                         <div class="table-body-cell custom-header total2" style="text-align: end;border-right:1px solid #9d9d9d">
                                                         </div>
                                                         <div class="table-body-cell custom-header totalMain" style="text-align: end;border-left:1px solid #9d9d9d">
                                                         </div>

                                                      </div>
                                                      <div class="resp-table-row setload2">
                                                         <div class="table-body-cell"></div>
                                                         <div class="table-body-cell"></div>
                                                         <div class="table-body-cell"></div>
                                                         <div class="table-body-cell"></div>
                                                         <div class="table-body-cell">
                                                            <loading></loading>
                                                         </div>
                                                         <div class="table-body-cell"></div>

                                                         <div class="table-body-cell"></div>
                                                         <div class="table-body-cell"></div>
                                                         <div class="table-body-cell"></div>
                                                         <div class="table-body-cell"></div>
                                                         <div class="table-body-cell"></div>



                                                      </div>
                                                      <div class="primary" ng-repeat="data in namesDataledgergroup3">
                                                         <div class="resp-table-row trpoint" style=" box-shadow: inset -1px 0px 0px 3px #f0f0f0f7;" ng-click="toggleCollapse3($event,data.teamGroupIndex,data.groupIndex,data.index)">
                                                            <div class="table-body-cell"> </div>
                                                            <div class="table-body-cell " style="width: 150px; text-align:start;">
                                                               {{ data.key }} <i style="color:#cfcfcf;float: right;margin: 7px;" class="mdi mdi-arrow-up-thick float-right"></i>
                                                            </div>
                                                            <div class="table-body-cell">
                                                               {{ data.balance_ledger }}
                                                            </div>
                                                            <div class="table-body-cell" style="border-right:1px solid #9d9d9d">
                                                               {{ data.balance_ledger2 }}
                                                            </div>
                                                            <div class="table-body-cell   text-end" style="border-left:1px solid #9d9d9d">
                                                               {{ data.net_balance | indianCurrency }}
                                                            </div>
                                                            <div class="table-body-cell  text-end">
                                                               {{ data.sheet | indianCurrency }}
                                                            </div>
                                                            <div class="table-body-cell text-end " style="border-right:1px solid #9d9d9d">
                                                               {{ data.total | indianCurrency }}
                                                            </div>
                                                            <div class="table-body-cell  text-end" style="border-left:1px solid #9d9d9d">
                                                               {{ data.net_balance2 | indianCurrency }}
                                                            </div>
                                                            <div class="table-body-cell  text-end">
                                                               {{ data.sheet2 | indianCurrency }}
                                                            </div>
                                                            <div class="table-body-cell text-end " style="border-right:1px solid #9d9d9d">
                                                               {{ data.total2 | indianCurrency }}
                                                            </div>
                                                            <div class="table-body-cell  text-end" style="border-left:1px solid #9d9d9d">
                                                               {{ data.totalMain | indianCurrency }}
                                                            </div>
                                                         </div>
                                                         <div class="primary" ng-repeat="names in data.values">
                                                            <div class="resp-table-row trpoint" style="background: #ffffff;" ng-if="(!names.collapsed)" ng-click="toggleCollapse3($event,names.teamGroupIndex,names.groupIndex,names.index)">
                                                               <div class="table-body-cell"> </div>
                                                               <div class="table-body-cell " style="width: 150px; text-align:center;">
                                                                  {{ names.sales_group_name }} <i style="color:#cfcfcf;float: right;margin: 7px;" class="mdi mdi-arrow-up-thick float-right"></i>
                                                               </div>
                                                               <div class="table-body-cell price-main ">
                                                                  {{ names.balance_ledger }}
                                                               </div>
                                                               <div class="table-body-cell  price-main " style="border-right:1px solid #9d9d9d">
                                                                  {{ names.balance_ledger2 }}
                                                               </div>
                                                               <div class="table-body-cell  price-main text-end" style="border-left:1px solid #9d9d9d">
                                                                  {{ names.net_balance | indianCurrency }}
                                                               </div>
                                                               <div class="table-body-cell  price-main text-end">
                                                                  {{ names.sheet_total | indianCurrency }}
                                                               </div>
                                                               <div class="table-body-cell  price-main text-end" style="border-right:1px solid #9d9d9d">
                                                                  {{ names.total | indianCurrency  }}
                                                               </div>
                                                               <div class="table-body-cell  price-main text-end" style="border-left:1px solid #9d9d9d">
                                                                  {{ names.net_balance2 | indianCurrency }}
                                                               </div>
                                                               <div class="table-body-cell  price-main text-end">
                                                                  {{ names.sheet_total2 | indianCurrency }}
                                                               </div>
                                                               <div class="table-body-cell  price-main text-end" style="border-right:1px solid #9d9d9d">
                                                                  {{ names.total2 | indianCurrency }}
                                                               </div>
                                                               <div class="table-body-cell  price-main text-end" style="border-left:1px solid #9d9d9d">
                                                                  {{ names.totalMain | indianCurrency }}
                                                               </div>
                                                            </div>
                                                            <div class="secondchild" ng-repeat="namesvvssget in names.salesperson">
                                                               <div class="resp-table-row sales_table_head slide" ng-if="(!namesvvssget.collapsed)" style="background-color: #f9f9f9;">
                                                                  <div class="table-body-cell price-sl"  >{{ namesvvssget.no }}</div>
                                                                  <div class="table-body-cell" style="width: 150px; text-align:right;cursor:pointer;"  ng-click="redirectSalesPerson(names.id,namesvvssget.sales_person_id,todate2)">
                                                                     {{ namesvvssget.sales_person_name }}
                                                                  </div>
                                                                  <div class="table-body-cell price-sl">
                                                                     {{ namesvvssget.balance_ledger }}
                                                                  </div>
                                                                  <div class="table-body-cell price-sl" style="border-right:1px solid #9d9d9d">
                                                                     {{ namesvvssget.balance_ledger2 }}
                                                                  </div>
                                                                  <div class="table-body-cell price-sl text-end" style="border-left:1px solid #9d9d9d">
                                                                     {{ namesvvssget.balance | indianCurrency }}
                                                                  </div>
                                                                  <div class="table-body-cell price-sl text-end">
                                                                     {{ namesvvssget.sheet | indianCurrency }}
                                                                  </div>
                                                                  <div class="table-body-cell price-sl text-end" style="border-right:1px solid #9d9d9d">
                                                                     {{ namesvvssget.total | indianCurrency }}
                                                                  </div>
                                                                  <div class="table-body-cell price-sl text-end" style="border-left:1px solid #9d9d9d">
                                                                     {{ namesvvssget.balance2 | indianCurrency  }}
                                                                  </div>
                                                                  <div class="table-body-cell price-sl text-end">
                                                                     {{ namesvvssget.sheet2 | indianCurrency  }}
                                                                  </div>
                                                                  <div class="table-body-cell price-sl text-end" style="border-right:1px solid #9d9d9d">
                                                                     {{ namesvvssget.total2  | indianCurrency}}
                                                                  </div>
                                                                  <div class="table-body-cell price-sl text-end" style="border-left:1px solid #9d9d9d">
                                                                     {{ namesvvssget.totalMain | indianCurrency  }}
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
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <script>
               //datepicker function

               const slider = document.querySelector('.table-responsive');
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
                  const walk = (x - startX) * 3;
                  slider.scrollLeft = scrollLeft - walk;
                  // console.log(walk);
               });
               $(document).ready(function() {
                  $('#from-date').on('change', (e) => {
                     $('#from-date2').val(e.target.value)
                  })
                  $('#to-date').on('change', (e) => {
                     $('#to-date2').val(e.target.value)
                  })
                  // $('.nav-link').on('click', function(e) {
                  //    $('.tab-pane').fadeOut(200);
                  //    $('.tab-pane').removeClass('show');
                  //    let target = $(this).attr('data-bs-target');
                  //    // target = target + '-tab';
                  //    // console.log("target",target)
                  //    $(target).fadeIn(200);
                  //    $(target).addClass('show');
                  // })

                  $('#payment_mode_payoff').on('change', function() {
                     var val = $(this).val();
                     if (val == 'Cash') {
                        $('#res_no').hide();
                     } else {
                        $('#res_no').show();
                     }
                  });
                  $('#showhiddenrow').on('click', function() {
                     if ($(this).is(':checked')) {
                        var val = 1;
                        $('.getview').addClass('shownullvalue');
                     } else {
                        var val = 0;
                        $('.getview').removeClass('shownullvalue');
                     }
                     var status = '120';
                     $.ajax({
                        url: '<?php echo base_url() ?>index.php/report/table_customize',
                        type: "get",
                        data: {
                           status_id: val,
                           status_val: status
                        }
                     });
                  });
                  $(".Uncheck").on('click', function() {
                     var val = $(this).val();
                     if ($(this).is(':checked')) {
                        $('.checkdata_' + val).css('display', 'table-cell');
                        var status = 1;
                     } else {
                        $('.checkdata_' + val).css('display', 'none');
                        var status = 0;
                     }
                     $.ajax({
                        url: '<?php echo base_url() ?>index.php/report/table_customize',
                        type: "get",
                        data: {
                           status_id: status,
                           status_val: val
                        }
                     });
                  });

               });

               var app = angular.module('crudApp', ['datatables']);
                app.filter('indianCurrency', function () {
         return function (input) {
          if(input != 0 && input != null){
              if (isNaN(input)) return input;
        var formattedValue = parseFloat(input);
        // console.log(input.toLocaleString('en-IN').toFixed(2));
         var decimal =  formattedValue.toLocaleString('en-IN', {   minimumFractionDigits: 2, maximumFractionDigits: 2 });

        return decimal
      }else{
        return '0';
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

               app.filter('number', function() {
                  return function(input) {
                     if (!isNaN(input)) {
                        var currencySymbol = '';
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
                  $scope.success = false;
                  $scope.error = false;
                  $scope.getproductval = 'ALL';
                  $scope.sales_group = 'ALL';
                  $scope.currentPage = 1;
                  $scope.totalItems = 0;
                  $scope.pageSize = 1;
                  $scope.searchText = '';
                                     <?php

     // if($_GET['test'] && $_GET['test'] == 'true'){

          $retUrl = 'list_ret_resale?test=true&';
          $ledUrl = 'ledger_find?test=true&';

     // }else{

     //      $retUrl = 'list_ret_resale?';
     //      $ledUrl = 'ledger_find?';

     // }

    ?>
                  $scope.handleClick = function(namesvv) {
                     var customer_id = namesvv.id;
                     var url = "<?php echo base_url(); ?>index.php/customer/</=$ledUrl?>customer_id=" +
                        customer_id;
                     window.open(url, '_blank');
                  };
                  $scope.customerHasProduction = function(customer) {
                     return customer.production > 0;
                  };
                  $scope.toggleInProductionCustomers = function(salesperson) {
                     salesperson.showInProductionCustomers = !salesperson.showInProductionCustomers;
                  };
                  $scope.pageSizeChanged = function() {
                     var cateid = $('#choices-single-default').val();
                     var sales_group = $('#sales_group').val();
                     $scope.fetchDatagetlegderGroup(cateid, sales_group);
                  }
                  $scope.salesgroupChanged = function() {
                     var cateid = $('#choices-single-default').val();
                     var sales_group = $('#sales_group').val();
                     $scope.fetchDatagetlegderGroup(cateid, sales_group);
                  }
                  $scope.coniformed = function(customer_id, amount, closing) {
                     if (confirm("Are you sure confirm!") == true) {
                        $http({
                           method: "POST",
                           url: "<?php echo base_url() ?>index.php/report/discount_approval",
                           data: {
                              'id': customer_id,
                              'amount': amount,
                              'closing': closing,
                           }
                        }).success(function(data) {
                           alert('MD Request success');
                        });
                     }
                  };

                  // $('.nav-link').on('click', (e) => {
                  //    $(e.currentTarget).removeClass('active')
                  // })
                  function formatNumber(input) {
                     if (!isNaN(input) && input != 0) {
                        var currencySymbol = '';
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
                     }else{
                        return 0;
                     }
                  }

                  $('#exportdata_comparision').on('click', function() {
                     var payment_mode = 1;
                     var cateid = $('#choices-single-default').val();
                     var customer_id = '<?php echo $customer_id; ?>';
                     var productid = 1;
                     var fromdate = $('#from-date').val();
                     var fromto = $('#to-date').val();

                     var order_status = 1;
                     var sales_group = $('#sales_group').val();
                     // var payment_mode = $('#payment_mode').val();
                     url =
                        '<?php echo base_url() ?>index.php/report/fetch_data_customer_balance_comparision_export?limit=10&customer_id=' +
                        customer_id + '&formdate=' + fromdate + '&todate=' + fromto + '&page=' + $scope.currentPage + '&dividend=' + $scope.dividentKey +
                        '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&sales_group=' + sales_group + '&order_status=' + cateid +
                        '&payment_mode=' + payment_mode;
                     location = url;
                  });

                  $('#exportdata_increase').on('click', function() {
                     var payment_mode = 1;
                     var cateid = $('#choices-single-default2').val();
                     var customer_id = '<?php echo $customer_id; ?>';
                     var productid = 1;
                     var fromdate = $('#from-date2').val();
                     var fromto = $('#to-date2').val();

                     var order_status = 1;
                     var sales_group = $('#sales_group2').val();
                     // var payment_mode = $('#payment_mode').val();
                        <?php
                    $url_name =   'fetch_data_customer_balance_increase_export?test=true&';
                ?>
                     url =
                        '<?php echo base_url() ?>index.php/report/<?=$url_name?>limit=10&customer_id=' +
                        customer_id + '&formdate=' + fromdate + '&todate=' + fromto + '&page=' + $scope.currentPage + '&dividend=' + $scope.dividentKey2 +
                        '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&sales_group=' + sales_group + '&order_status=' + cateid +
                        '&payment_mode=' + payment_mode;
                     location = url;
                  });

                  $('#exportdata_with_credit').on('click', function() {
                     var payment_mode = 1;
                     var cateid = $('#choices-single-default1').val();
                     var customer_id = '<?php echo $customer_id; ?>';
                     var productid = 1;
                     var fromdate = $('#from-date1').val();
                     var fromto = $('#to-date1').val();

                     var order_status = 1;
                     var sales_group = $('#sales_group1').val();
                     // var payment_mode = $('#payment_mode').val();
                       <?php
                    $url_name =   'fetch_data_credit_balance_comparision_export?test=true&'  ;
                ?>
                     url =
                        '<?php echo base_url() ?>index.php/report/<?=$url_name?>limit=10&customer_id=' +
                        customer_id + '&formdate=' + fromdate + '&todate=' + fromto + '&page=' + $scope.currentPage + '&dividend=' + $scope.dividentKey1 +
                        '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&sales_group=' + sales_group + '&order_status=' + cateid +
                        '&payment_mode=' + payment_mode;
                     location = url;
                  });


                  $scope.search = function() {
                     $scope.currentPage = 1;
                     var fromdate = $('#from-date').val();
                     var fromto = $('#to-date').val();
                     if (fromdate.includes('-')) {
                        var split = fromdate.split('-');
                        var fromDateFormated = split[2] + '/' + split[1] + '/' + split[0];
                     } else {
                        var split = fromdate.split('/');
                        var fromDateFormated = split[1] + '/' + split[0] + '/' + split[2];


                     }
                     if (fromto.includes('-')) {
                        var split = fromto.split('-');
                        var toDateFormated = split[2] + '/' + split[1] + '/' + split[0];

                     } else {
                        var split = fromto.split('/');
                        var toDateFormated = split[1] + '/' + split[0] + '/' + split[2];


                     }

                     $scope.formdate = fromDateFormated;
                     $scope.todate = toDateFormated;

                     $('#search-view').show();
                     $('#search-view1').hide();
                     $('#exportdata').show();
                     var cateid = $('#choices-single-default').val();
                     var sales_group = $('#sales_group').val();
                     $scope.fetchDatagetlegderGroup(cateid, sales_group);
                  };

                   <?php

     // if($_GET['test'] && $_GET['test'] == 'true'){

          $retUrl = 'list_ret_resale?test=true&';
          $ledUrl = 'ledger_find?test=true&';

     // }else{

     //      $retUrl = 'list_ret_resale?';
     //      $ledUrl = 'ledger_find?';

     // }

    ?>
                    $scope.handleClick = function(namesvv,status) {
                  var fromdate = $('#from-date').val();
                  var fromto = $('#to-date').val();
                if(status == '4'){
                var customer_id = namesvv.id;
                     var url = "<?php echo base_url(); ?>index.php/other_reports/<?=$retUrl?>customer_id=" + customer_id +'&formdate='+fromdate+'&todate='+fromto;
                                   
                                 window.open(url, '_blank');
                               }else{
                                  var customer_id = namesvv.id;
                     var url = "<?php echo base_url(); ?>index.php/customer/<?=$ledUrl?>customer_id=" + customer_id +"&filter=" + status;
                                   
                                 window.open(url, '_blank');
                               }





                 
               };
                  $scope.search2 = function() {
                     let benchmarkDate = '<?= $benchmark_date ?>';
                     $scope.currentPage = 1;
                     var fromdate = $('#from-date1').val();
                     var fromto = $('#to-date1').val();
                     if (benchmarkDate != fromdate) {
                        const formdata = {
                           report_name: 'balance_increase_report',
                           modified_value: fromdate,
                        }
                        $http.post('<?php echo base_url() ?>index.php/report/changeReportBenchmark', formdata)
                           .then(function(response) {
                              // Success callback
                              console.log('POST request successful:', response.data);
                              // $scope.search2()
                           })
                           .catch(function(error) {
                              // Error callback
                              console.error('POST request error:', error);
                           });
                     }
                     if (fromdate.includes('-')) {
                        var split = fromdate.split('-');
                        var fromDateFormated = split[2] + '/' + split[1] + '/' + split[0];
                     } else {
                        var split = fromdate.split('/');
                        var fromDateFormated = split[1] + '/' + split[0] + '/' + split[2];


                     }
                     if (fromto.includes('-')) {
                        var split = fromto.split('-');
                        var toDateFormated = split[2] + '/' + split[1] + '/' + split[0];

                     } else {
                        var split = fromto.split('/');
                        var toDateFormated = split[1] + '/' + split[0] + '/' + split[2];


                     }

                     $scope.formdate1 = fromDateFormated;
                     $scope.todate1 = toDateFormated;

                     $('#search-view2').show();
                     $('#search-view3').hide();
                     $('#exportdata').show();
                     var cateid = $('#choices-single-default1').val();
                     var sales_group = $('#sales_group1').val();
                     $scope.fetchDatagetlegderGroup2(cateid, sales_group);
                  };

                  $scope.search3 = function() {
                     $scope.currentPage = 1;
                     var fromdate = $('#from-date2').val();
                     var fromto = $('#to-date2').val();
                     if (fromdate.includes('-')) {
                        var split = fromdate.split('-');
                        var fromDateFormated = split[2] + '/' + split[1] + '/' + split[0];
                     } else {
                        var split = fromdate.split('/');
                        var fromDateFormated = split[1] + '/' + split[0] + '/' + split[2];


                     }
                     if (fromto.includes('-')) {
                        var split = fromto.split('-');
                        var toDateFormated = split[2] + '/' + split[1] + '/' + split[0];

                     } else {
                        var split = fromto.split('/');
                        var toDateFormated = split[1] + '/' + split[0] + '/' + split[2];


                     }

                     $scope.formdate2 = fromDateFormated;
                     $scope.todate2 = toDateFormated;

                     $('#search-view4').show();
                     $('#search-view5').hide();
                     $('#exportdata').show();
                     var cateid = $('#choices-single-default2').val();
                     var sales_group = $('#sales_group2').val();
                     $scope.fetchDatagetlegderGroup3(cateid, sales_group);
                  };


                  $scope.searchTextChanged = function() {
                     var cateid = $('#choices-single-default').val();
                     var sales_group = $('#sales_group').val();
                     $scope.fetchDatagetlegderGroup(cateid, sales_group);
                  }
                  $scope.onviewparty = function() {
                     $('#firstmodalcommisonparty').modal('toggle');
                  };
                  $scope.memKey = '';
                  $scope.namesDataledgergroup2 = [];
                  $scope.resetCollapse = function() {
                     $scope.memKey = ''
                     let data = $scope.namesDataledgergroup;
                     data.map((entry, i) => {
                        entry.collapsed = true;
                        entry['values'].map((el, i) => {
                           el.collapsed = true;
                           if (el.salesperson && el.salesperson[0]) {
                              el.salesperson.map((el1, salespIndex) => {
                                 el1.collapsed = true;

                              })
                           }
                        })
                     })

                     setTimeout(() => {
                        $('.mdi').removeClass('transform-icon')
                        $scope.namesDataledgergroup = data;
                     }, 250)
                     // console.log("data", data)

                  }
                  $scope.toggleCollapse = function(e, teamGroupIndex, headIndex, spIndex) {
                     if ($scope.memKey == '') {

                        console.log(teamGroupIndex, headIndex, spIndex)
                        let ref = $scope.namesDataledgergroup;
                        //salesperson's
                        // ref[headIndex].collapsed = !ref[headIndex].collapsed;
                        $(e.currentTarget).find('.mdi').toggleClass('transform-icon');
                        if (headIndex == undefined && spIndex == undefined) {
                           ref[teamGroupIndex].values.map((el) => {
                              if (ref[teamGroupIndex].key != el.sales_group_name) {
                                 el.collapsed = !el.collapsed;
                                 // console.log("ref[teamGroupIndex].collapsed",el.collapsed)
                                 if (el.collapsed) {
                                    el.salesperson.map((el) => {
                                       el.collapsed = true;
                                       // el['subarray'].map((el) => {
                                       //    el.collapsed = true;
                                       // })
                                    })
                                 }
                              } else {
                                 el.salesperson.map((el) => {
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
                           ref[teamGroupIndex].values[headIndex]['salesperson'].map((el) => {
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
                        // ref[teamGroupIndex].values[headIndex]['salesperson'][spIndex]['subarray'].map((el) => {
                        //    el.collapsed = !el.collapsed;
                        // })
                        // }
                     }
                  }
                  $scope.dividentKey = 'L';



                  $scope.toggleCollapse3 = function(e, teamGroupIndex, headIndex, spIndex) {
                     if ($scope.memKey == '') {

                        console.log(teamGroupIndex, headIndex, spIndex)
                        let ref = $scope.namesDataledgergroup3;
                        //salesperson's
                        // ref[headIndex].collapsed = !ref[headIndex].collapsed;
                        $(e.currentTarget).find('.mdi').toggleClass('transform-icon');
                        if (headIndex == undefined && spIndex == undefined) {
                           ref[teamGroupIndex].values.map((el) => {
                              if (ref[teamGroupIndex].key != el.sales_group_name) {
                                 el.collapsed = !el.collapsed;
                                 // console.log("ref[teamGroupIndex].collapsed",el.collapsed)
                                 if (el.collapsed) {
                                    el.salesperson.map((el) => {
                                       el.collapsed = true;
                                       // el['subarray'].map((el) => {
                                       //    el.collapsed = true;
                                       // })
                                    })
                                 }
                              } else {
                                 el.salesperson.map((el) => {
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
                           ref[teamGroupIndex].values[headIndex]['salesperson'].map((el) => {
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
                        // ref[teamGroupIndex].values[headIndex]['salesperson'][spIndex]['subarray'].map((el) => {
                        //    el.collapsed = !el.collapsed;
                        // })
                        // }
                     }
                  }


                  $scope.toggleCollapse2 = function(e, teamGroupIndex, headIndex, spIndex) {
                     if ($scope.memKey == '') {

                        console.log(teamGroupIndex, headIndex, spIndex)
                        let ref = $scope.namesDataledgergroup2;
                        //salesperson's
                        // ref[headIndex].collapsed = !ref[headIndex].collapsed;
                        $(e.currentTarget).find('.mdi').toggleClass('transform-icon');
                        if (headIndex == undefined && spIndex == undefined) {
                           ref[teamGroupIndex].values.map((el) => {
                              if (ref[teamGroupIndex].key != el.sales_group_name) {
                                 el.collapsed = !el.collapsed;
                                 // console.log("ref[teamGroupIndex].collapsed",el.collapsed)
                                 if (el.collapsed) {
                                    el.salesperson.map((el) => {
                                       el.collapsed = true;
                                       // el['subarray'].map((el) => {
                                       //    el.collapsed = true;
                                       // })
                                    })
                                 }
                              } else {
                                 el.salesperson.map((el) => {
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
                           ref[teamGroupIndex].values[headIndex]['salesperson'].map((el) => {
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
                        // ref[teamGroupIndex].values[headIndex]['salesperson'][spIndex]['subarray'].map((el) => {
                        //    el.collapsed = !el.collapsed;
                        // })
                        // }
                     }
                  }



                  $scope.dividentKey1 = 'L';
                  $scope.dividentKey2 = 'L';
                  $scope.expandState = [false, false, false];
                              <?php

     // if($_GET['test'] && $_GET['test'] == 'true'){

          $customer_balance_report = 'customer_balance_report?test=true&';
          // $ledUrl = 'ledger_find?test=true&';

     // }else{

          // $customer_balance_report = 'customer_balance_report?';
          // $ledUrl = 'ledger_find?';

     // }

    ?>
                  $scope.redirectSalesPerson = function(grpId, slId, date) {
                     url = `<?php echo base_url() ?>index.php/report/<?=$customer_balance_report?>sales_group_id=${grpId}&sales_team_id=${slId}&forDate=${date}`;
                     window.open(url, '_blank');
                  }
                  $scope.redirectSection = function(section) {
                     url = `<?php echo base_url() ?>index.php/report/customer_balance_comparision?section=${section}`;
                     window.open(url, '_blank');
                  }
                  $scope.expandAll = function(tableNO) {
                     let sample = $scope.expandState;
                     sample[tableNO - 1] = !sample[tableNO - 1];
                     // $scope.expandState[tableNO - 1] = !$scope.expandState[tableNO - 1];

                     console.log("hi", $scope.expandState)
                     let dataCurrent = tableNO == 1 ? $scope.namesDataledgergroup : (tableNO == 2 ? $scope.namesDataledgergroup2 : $scope.namesDataledgergroup3);
                     dataCurrent && dataCurrent.map((el) => {
                        el.collapsed = $scope.expandState[tableNO - 1].expandAll;
                        el.values && el.values.map((el1) => {
                           el1.collapsed = $scope.expandState[tableNO - 1].expandAll;
                           el1.salesperson && el1.salesperson.map((el2) => {
                              el2.collapsed = $scope.expandState[tableNO - 1].expandAll;
                           })
                        })
                     })

                  }
                  $scope.fetchDatagetlegderGroup = function(cateid, sales_group) {
                     $('.setload').show();
                     $scope.loading = true;
                     $scope.memKey = '';
                     var customer_id = '<?php echo $customer_id; ?>';
                     var order_status = 1;
                     var payment_mode = 1;
                     var productid = 1;
                     var fromdate = $('#from-date').val();
                     var fromto = $('#to-date').val();
                     const options = {
                        month: 'short',
                        day: 'numeric'
                     };

                     $('.com-first-date').html(new Date(fromdate).toLocaleDateString('en-US', options));
                     $('.com-second-date').html(new Date(fromto).toLocaleDateString('en-US', options));
                     if (fromdate.includes('-')) {
                        var split = fromdate.split('-');
                        $scope.formdate = split[2] + '-' + split[1] + '-' + split[0];
                     }
                     if (fromto.includes('-')) {
                        var split = fromto.split('-');
                        $scope.todate = split[2] + '-' + split[1] + '-' + split[0];

                     }
                       <?php
                    $url_name =  'fetch_data_customer_balance_comparision?test=true&';
                ?>
 
                     if (cateid != 0) {
                        $http.get(
                           '<?php echo base_url() ?>index.php/report/<?=$url_name?>limit=10&customer_id=' +
                           customer_id + '&formdate=' + fromdate + '&todate=' + fromto + '&page=' + $scope.currentPage + '&dividend=' + $scope.dividentKey +
                           '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&sales_group=' + sales_group + '&order_status=' + cateid +
                           '&payment_mode=' + payment_mode).success(function(data) {

                           $scope.query = {}
                           $scope.queryBy = '$';

                           let groupNames = [];
                           let MasterData;
                           data[0] && data[0].map((el, headIndex) => {
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
                           // console.log("sam",sample)
                           $scope.groupedArray = Object.keys(MasterData).map((key) => {
                              let ex = {
                                 key,
                                 values: MasterData[key]
                              };

                              // sample.forEach((head) => {
                              //    ex[head] = 0;

                              //    MasterData[key].forEach((item) => {
                              //       item.salesperson.forEach((el) => {
                              //          if(head == 'balance_ledger' || head == 'sheet' || head == 'total'){
                              //             if (typeof input === 'string') {
                              //                ex[head] = el[head] ? Number(el[head].replace(/[^0-9]/g, '')) + ex[head] :  ex[head];
                              //             } else {
                              //                ex[head]  =  el[head] ? Number(el[head])+ ex[head] :  ex[head];
                              //             }

                              //          }

                              //       });
                              //    });
                              // });

                              return ex;
                           });
                           groupNames = [];
                           MasterData;
                           data[1].map((el, headIndex) => {
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
                           let totals = data[2];
                           for (const key in totals) {
                              if (totals.hasOwnProperty(key)) {
                                 if(key == 'balance_ledger' || key == 'balance_ledger2' ){
                                 $('.totals1').find('.' + key).html(parseFloat(totals[key].toFixed(2)));
                                 }else{
                                 $('.totals1').find('.' + key).html(formatNumber(totals[key].toFixed(2)));

                                 }
                              }
                           }
                           keys = Object.keys(MasterData);
                           sample = Object.keys(MasterData[keys[0]][0]);
                           // console.log("sam",sample)
                           $scope.groupedArray2 = Object.keys(MasterData).map((key) => {
                              let ex = {
                                 key,
                                 values: MasterData[key]
                              };

                              // sample.forEach((head) => {
                              //    ex[head] = 0;

                              //    MasterData[key].forEach((item) => {
                              //       item.salesperson.forEach((el) => {
                              //          if(head == 'balance_ledger' || head == 'sheet' || head == 'total'){
                              //             if (typeof input === 'string') {
                              //                ex[head] = el[head] ? Number(el[head].replace(/[^0-9]/g, '')) + ex[head] :  ex[head];
                              //             } else {
                              //                ex[head]  =  el[head] ? Number(el[head])+ ex[head] :  ex[head];
                              //             }

                              //          }

                              //       });
                              //    });
                              // });

                              return ex;
                           });
                           // console.log("groupedArray", $scope.groupedArray)

                           let dataNew = $scope.groupedArray;

                           function ifFloat(value) {
                              return parseFloat(Number(value).toFixed(2));
                           }
                           dataNew.map((eltop, teamGroupIndex) => {
                              eltop.teamGroupIndex = teamGroupIndex;
                              eltop.collapsed = true;
                              eltop.balance_ledger2 = 0;
                              eltop.balance_ledger = 0;
                              eltop.sheet = 0;
                              eltop.sheet2 = 0;
                              eltop.total = 0;
                              eltop.total2 = 0;
                              eltop.totalMain = 0;
                              eltop.net_balance = 0;
                              eltop.net_balance2 = 0;
                              eltop.values.map((el, headIndex) => {
                                 // console.log("ELEL" ,el);
                                 el.balance_ledger2 = $scope.groupedArray2[teamGroupIndex].values[headIndex].balance_ledger;
                                 el.net_balance2 = $scope.groupedArray2[teamGroupIndex].values[headIndex].net_balance;
                                 el.sheet_total2 = $scope.groupedArray2[teamGroupIndex].values[headIndex].sheet_total;
                                 el.total2 = $scope.groupedArray2[teamGroupIndex].values[headIndex].total;
                                 el.totalMain = Number(el.net_balance).toFixed(2) - Number(el.net_balance2);
                                 eltop.balance_ledger2 += Number(el.balance_ledger2);
                                 eltop.balance_ledger += Number(el.balance_ledger);
                                 eltop.sheet2 += Number(el.sheet_total2);
                                 eltop.sheet += Number(el.sheet_total);
                                 eltop.total += Number(el.total);
                                 eltop.total2 += Number(el.total2);
                                 eltop.totalMain += Number(el.totalMain);
                                 //round off eltop.totalMain
                                 eltop.totalMain = ifFloat(eltop.totalMain);
                                 eltop.net_balance2 += Number(el.net_balance2);
                                 eltop.net_balance += el.net_balance;
                                 el.net_balance2 = ifFloat(el.net_balance2);
                                 el.sheet_total2 = ifFloat(el.sheet_total2);
                                 el.total2 = ifFloat(el.total2);
                                 el.totalMain = ifFloat(el.totalMain);
                                 el.teamGroupIndex = teamGroupIndex;
                                 el.groupIndex = headIndex;
                                 el.collapsed = true;
                                 if (el.salesperson && el.salesperson[0]) {
                                    el.salesperson.map((el1, salespIndex) => {
                                       el1.collapsed = true;
                                       el1.index = salespIndex;
                                       el1.groupIndex = headIndex;
                                       el1.balance_ledger2 = $scope.groupedArray2[teamGroupIndex].values[headIndex]['salesperson'][salespIndex].balance_ledger;
                                       el1.balance2 = $scope.groupedArray2[teamGroupIndex].values[headIndex]['salesperson'][salespIndex].balance;
                                       el1.sheet2 = $scope.groupedArray2[teamGroupIndex].values[headIndex]['salesperson'][salespIndex].sheet;
                                       el1.total2 = $scope.groupedArray2[teamGroupIndex].values[headIndex]['salesperson'][salespIndex].total;
                                       el1.totalMain = Number(el1.balance) - Number($scope.groupedArray2[teamGroupIndex].values[headIndex]['salesperson'][salespIndex].balance);




                                       el1.balance2 = ifFloat(el1.balance2);
                                       el1.totalMain = ifFloat(el1.totalMain);
                                       el1.sheet2 = ifFloat(el1.sheet2);
                                       el1.total2 = ifFloat(el1.total2);

                                       // el1.totalMain = Number.isInteger(el1.totalMain) ? el1.totalMain : parseFloat(el1.totalMain.toFixed(2));
                                       // if (el1.subarray && el1.subarray[0]) {
                                       //    el1.subarray.map((el2, i) => {
                                       //       el2.collapsed = true;
                                       //    })
                                       // }
                                    })
                                 }

                              })
                           })
                           dataNew.map((eltop, teamGroupIndex) => {

                              eltop.balance_ledger2 = ifFloat(eltop.balance_ledger2);
                              eltop.balance_ledger = ifFloat(eltop.balance_ledger);
                              eltop.sheet = ifFloat(eltop.sheet);
                              eltop.sheet2 = ifFloat(eltop.sheet2);
                              eltop.total = ifFloat(eltop.total);
                              eltop.total2 = ifFloat(eltop.total2);
                              eltop.totalMain = ifFloat(eltop.totalMain);
                              eltop.net_balance = ifFloat(eltop.net_balance);
                              eltop.net_balance2 = ifFloat(eltop.net_balance2);
                           })
                           // data.map((el,headIndex) => {
                           //    el.groupIndex = headIndex;
                           //    if (el.salesperson && el.salesperson[0]) {
                           //       el.salesperson.map((el1, salespIndex) => {
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
                           // console.log("dataNew",dataNew)
                           // Initialize showInProductionCustomers property for each salesperson
                           $scope.namesDataledgergroup.forEach(function(salesperson) {
                              salesperson.showInProductionCustomers = false;
                           });






                           $scope.loading = false;
                           $('.setload').hide();
                        });

                     } else {
                        if (customer_id > 0) {
                           $http.get(
                                 '<?php echo base_url() ?>index.php/report/fetch_data_customer_balance_comparision?limit=10&customer_id=' +
                                 customer_id + '&formdate=' + fromdate + '&page=' + $scope.currentPage +
                                 '&size=' + $scope.pageSize + '&search=' + $scope.searchText +
                                 '&todate=' + fromto +
                                 '&sales_group=ALL&order_status=ALL&payment_mode=' + payment_mode)
                              .success(function(data) {
                                 $scope.query = {}
                                 $scope.queryBy = '$';
                                 $scope.namesDataledgergroup = data;
                                 // Initialize showInProductionCustomers property for each salesperson
                                 $scope.namesDataledgergroup.forEach(function(salesperson) {
                                    salesperson.showInProductionCustomers = false;
                                 });

                                 $scope.loading = false;
                                 $('.setload').hide();
                              });
                        } else {
                           $scope.loading = false;
                           $('.setload').hide();
                        }
                     }

                  };



                  $scope.fetchDatagetlegderGroup2 = function(cateid, sales_group) {
                     $('.setload1').show();
                     $scope.loading2 = true;
                     $scope.memKey = '';
                     var customer_id = '<?php echo $customer_id; ?>';
                     var order_status = 1;
                     var payment_mode = 1;
                     var productid = 1;
                     var fromdate = $('#from-date1').val();
                     var fromto = $('#to-date1').val();
                     const options = {
                        month: 'short',
                        day: 'numeric'
                     };

                     $('.com-first-date1').html(new Date(fromdate).toLocaleDateString('en-US', options));
                     $('.com-second-date1').html(new Date(fromto).toLocaleDateString('en-US', options));
                     if (fromdate.includes('-')) {
                        var split = fromdate.split('-');
                        $scope.formdate1 = split[2] + '-' + split[1] + '-' + split[0];
                     }
                     if (fromto.includes('-')) {
                        var split = fromto.split('-');
                        $scope.todate1 = split[2] + '-' + split[1] + '-' + split[0];

                     }
                       <?php
                    $url_name =  'fetch_data_credit_balance_comparision?test=true&'  ;
                ?>
                     if (cateid != 0) {
                        $http.get(
                           '<?php echo base_url() ?>index.php/report/<?=$url_name?>limit=10&customer_id=' +
                           customer_id + '&formdate=' + fromdate + '&todate=' + fromto + '&page=' + $scope.currentPage + '&dividend=' + $scope.dividentKey1 +
                           '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&sales_group=' + sales_group + '&order_status=' + cateid +
                           '&payment_mode=' + payment_mode).success(function(data) {

                           $scope.query = {}
                           $scope.queryBy = '$';

                           let groupNames = [];
                           let MasterData;
                           data[0] && data[0].map((el, headIndex) => {
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
                              $('.setload1').hide();
                              return;
                           }
                           let totals = [];
                           totals = data[2];
                           for (const key in totals) {
                              if (totals.hasOwnProperty(key)) {
                                 if(key == 'balance_ledger' || key == 'balance_ledger2' || key == 'sheet_ledger' || key == 'credit_ledger'  ){
                                 $('.totals2').find('.' + key).html(parseFloat(totals[key].toFixed(2)));
                                 }else{
                                 $('.totals2').find('.' + key).html(formatNumber(totals[key].toFixed(2)));

                                 }
                              }
                           }
                           let keys = Object.keys(MasterData);

                           let sample = Object.keys(MasterData[keys[0]][0]);
                           // console.log("sam",sample)
                           $scope.groupedArray = Object.keys(MasterData).map((key) => {
                              let ex = {
                                 key,
                                 values: MasterData[key]
                              };

                              // sample.forEach((head) => {
                              //    ex[head] = 0;

                              //    MasterData[key].forEach((item) => {
                              //       item.salesperson.forEach((el) => {
                              //          if(head == 'balance_ledger' || head == 'sheet' || head == 'total'){
                              //             if (typeof input === 'string') {
                              //                ex[head] = el[head] ? Number(el[head].replace(/[^0-9]/g, '')) + ex[head] :  ex[head];
                              //             } else {
                              //                ex[head]  =  el[head] ? Number(el[head])+ ex[head] :  ex[head];
                              //             }

                              //          }

                              //       });
                              //    });
                              // });

                              return ex;
                           });

                           let dataNew = $scope.groupedArray;
                           console.log("groupedArray2", $scope.groupedArray)

                           function ifFloat(value) {
                              return parseFloat(Number(value).toFixed(2));
                           }
                           dataNew.map((eltop, teamGroupIndex) => {
                              eltop.teamGroupIndex = teamGroupIndex;
                              eltop.collapsed = true;
                              eltop.balance_ledger2 = 0;
                              eltop.balance_ledger = 0;
                              eltop.sheet = 0;
                              eltop.sheet2 = 0;
                              eltop.total = 0;
                              eltop.total2 = 0;
                              eltop.totalMain = 0;
                              eltop.net_balance = 0;
                              eltop.net_balance2 = 0;
                              eltop.credit_ledger = 0;
                              eltop.sheet_ledger = 0;
                              eltop.values.map((el, headIndex) => {
                                 eltop.balance_ledger2 += ifFloat(el.balance_ledger2);
                                 eltop.balance_ledger += ifFloat(el.balance_ledger);
                                 eltop.sheet2 += ifFloat(el.sheet_total2);
                                 eltop.sheet += ifFloat(el.sheet_total);
                                 eltop.total += ifFloat(el.total);
                                 eltop.total2 += ifFloat(el.total2);
                                 eltop.credit_ledger += ifFloat(el.credit_ledger);
                                 eltop.sheet_ledger += ifFloat(el.sheet_ledger);
                                 eltop.totalMain += ifFloat(el.totalMain);
                                 eltop.totalMain = ifFloat(eltop.totalMain);
                                 eltop.net_balance2 += ifFloat(el.net_balance2);
                                 eltop.net_balance += ifFloat(el.net_balance);
                                 el.teamGroupIndex = teamGroupIndex;
                                 el.groupIndex = headIndex;
                                 el.collapsed = true;
                                 if (el.salesperson && el.salesperson[0]) {
                                    el.salesperson.map((el1, salespIndex) => {
                                       el1.collapsed = true;
                                       el1.index = salespIndex;
                                       el1.groupIndex = headIndex;
                                    })
                                 }

                              })
                           })
                           dataNew.map((eltop, teamGroupIndex) => {

                              eltop.balance_ledger2 = ifFloat(eltop.balance_ledger2);
                              eltop.balance_ledger = ifFloat(eltop.balance_ledger);
                              eltop.sheet = ifFloat(eltop.sheet);
                              eltop.sheet2 = ifFloat(eltop.sheet2);
                              eltop.total = ifFloat(eltop.total);
                              eltop.total2 = ifFloat(eltop.total2);
                              eltop.totalMain = ifFloat(eltop.totalMain);
                              eltop.net_balance = ifFloat(eltop.net_balance);
                              eltop.net_balance2 = ifFloat(eltop.net_balance2);
                           })

                           // data.map((el,headIndex) => {
                           //    el.groupIndex = headIndex;
                           //    if (el.salesperson && el.salesperson[0]) {
                           //       el.salesperson.map((el1, salespIndex) => {
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
                           $scope.namesDataledgergroup2 = dataNew;
                           console.log("dataNew", dataNew)
                           // Initialize showInProductionCustomers property for each salesperson
                           $scope.namesDataledgergroup2.forEach(function(salesperson) {
                              salesperson.showInProductionCustomers = false;
                           });






                           $scope.loading2 = false;
                           $('.setload1').hide();
                        });

                     } else {
                        if (customer_id > 0) {
                           $http.get(
                                 '<?php echo base_url() ?>index.php/report/<?=$url_name?>?limit=10&customer_id=' +
                                 customer_id + '&formdate=' + fromdate + '&page=' + $scope.currentPage +
                                 '&size=' + $scope.pageSize + '&search=' + $scope.searchText +
                                 '&todate=' + fromto +
                                 '&sales_group=ALL&order_status=ALL&payment_mode=' + payment_mode)
                              .success(function(data) {
                                 $scope.query = {}
                                 $scope.queryBy = '$';
                                 $scope.namesDataledgergroup = data;
                                 // Initialize showInProductionCustomers property for each salesperson
                                 $scope.namesDataledgergroup.forEach(function(salesperson) {
                                    salesperson.showInProductionCustomers = false;
                                 });

                                 $scope.loading = false;
                                 $('.setload1').hide();
                              });
                        } else {
                           $scope.loading = false;
                           $('.setload1').hide();
                        }
                     }

                  };


                  $scope.fetchDatagetlegderGroup3 = function(cateid, sales_group) {
                     $('.setload2').show();
                     $scope.loading = true;
                     $scope.memKey = '';
                     var customer_id = '<?php echo $customer_id; ?>';
                     var order_status = 1;
                     var payment_mode = 1;
                     var productid = 1;
                     var fromdate = $('#from-date2').val();
                     var fromto = $('#to-date2').val();
                     const options = {
                        month: 'short',
                        day: 'numeric'
                     };

                     $('.com-first-date2').html(new Date(fromdate).toLocaleDateString('en-US', options));
                     $('.com-second-date2').html(new Date(fromto).toLocaleDateString('en-US', options));
                     if (fromdate.includes('-')) {
                        var split = fromdate.split('-');
                        $scope.formdate2 = split[2] + '-' + split[1] + '-' + split[0];
                     }
                     if (fromto.includes('-')) {
                        var split = fromto.split('-');
                        $scope.todate2 = split[2] + '-' + split[1] + '-' + split[0];

                     }

                       <?php
                    $url_name =  'fetch_data_customer_balance_increase?test=true&'  ;
                ?>


                     if (cateid != 0) {
                        $http.get(
                           '<?php echo base_url() ?>index.php/report/<?=$url_name?>limit=10&customer_id=' +
                           customer_id + '&formdate=' + fromdate + '&todate=' + fromto + '&page=' + $scope.currentPage + '&dividend=' + $scope.dividentKey2 +
                           '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&sales_group=' + sales_group + '&order_status=' + cateid +
                           '&payment_mode=' + payment_mode).success(function(data) {

                           $scope.query = {}
                           $scope.queryBy = '$';
                           $scope.groupedArray = [];
                           $scope.groupedArray2 = [];
                           let groupNames = [];
                           let MasterData;
                           data[0] && data[0].map((el, headIndex) => {
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
                              $('.setload2').hide();
                              return;
                           }
                           let keys = Object.keys(MasterData);

                           let sample = Object.keys(MasterData[keys[0]][0]);
                           // console.log("sam",sample)
                           $scope.groupedArray = Object.keys(MasterData).map((key) => {
                              let ex = {
                                 key,
                                 values: MasterData[key]
                              };

                              // sample.forEach((head) => {
                              //    ex[head] = 0;

                              //    MasterData[key].forEach((item) => {
                              //       item.salesperson.forEach((el) => {
                              //          if(head == 'balance_ledger' || head == 'sheet' || head == 'total'){
                              //             if (typeof input === 'string') {
                              //                ex[head] = el[head] ? Number(el[head].replace(/[^0-9]/g, '')) + ex[head] :  ex[head];
                              //             } else {
                              //                ex[head]  =  el[head] ? Number(el[head])+ ex[head] :  ex[head];
                              //             }

                              //          }

                              //       });
                              //    });
                              // });

                              return ex;
                           });
                           groupNames = [];
                           MasterData;
                           data[1].map((el, headIndex) => {
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
                           let totals = [];
                           totals = data[2];
                           for (const key in totals) {
                              if (totals.hasOwnProperty(key)) {
                                 if(key == 'balance_ledger' || key == 'balance_ledger2' ){
                                 $('.totals3').find('.' + key).html(parseFloat(totals[key].toFixed(2)));
                                 }else{
                                 $('.totals3').find('.' + key).html(formatNumber(totals[key].toFixed(2)));

                                 }
                              }
                           }
                           keys = Object.keys(MasterData);
                           sample = Object.keys(MasterData[keys[0]][0]);
                           // console.log("sam",sample)
                           $scope.groupedArray2 = Object.keys(MasterData).map((key) => {
                              let ex = {
                                 key,
                                 values: MasterData[key]
                              };

                              // sample.forEach((head) => {
                              //    ex[head] = 0;

                              //    MasterData[key].forEach((item) => {
                              //       item.salesperson.forEach((el) => {
                              //          if(head == 'balance_ledger' || head == 'sheet' || head == 'total'){
                              //             if (typeof input === 'string') {
                              //                ex[head] = el[head] ? Number(el[head].replace(/[^0-9]/g, '')) + ex[head] :  ex[head];
                              //             } else {
                              //                ex[head]  =  el[head] ? Number(el[head])+ ex[head] :  ex[head];
                              //             }

                              //          }

                              //       });
                              //    });
                              // });

                              return ex;
                           });
                           // let groupedArray =  $scope.groupedArray2;
                           let dataNew = $scope.groupedArray;
                           console.log("groupedArray2", $scope.groupedArray2)

                           function ifFloat(value) {
                              return parseFloat(Number(value).toFixed(2));
                           }
                           dataNew.map((eltop, teamGroupIndex) => {
                              eltop.teamGroupIndex = teamGroupIndex;
                              eltop.collapsed = true;
                              eltop.balance_ledger2 = 0;
                              eltop.balance_ledger = 0;
                              eltop.sheet = 0;
                              eltop.sheet2 = 0;
                              eltop.total = 0;
                              eltop.total2 = 0;
                              eltop.totalMain = 0;
                              eltop.net_balance = 0;
                              eltop.net_balance2 = 0;
                              eltop.credit_ledger = 0;
                              eltop.sheet_ledger = 0;
                              eltop.values.map((el, headIndex) => {
                                 // console.log("ELEL" ,el);
                                 el.totalMain = ifFloat(el.net_balance) - ifFloat(el.net_balance2);
                                 // el.totalMain = el.totalMain.toFixed(2);
                                 eltop.balance_ledger2 += Number(el.balance_ledger2);
                                 eltop.balance_ledger += Number(el.balance_ledger);
                                 eltop.sheet2 += Number(el.sheet_total2);
                                 eltop.sheet += Number(el.sheet_total);
                                 eltop.total += Number(el.total);
                                 eltop.total2 += Number(el.total2);
                                 eltop.credit_ledger += Number(el.credit_ledger);
                                 eltop.sheet_ledger += Number(el.sheet_ledger);
                                 eltop.totalMain += el.totalMain;
                                 //round off eltop.totalMain
                                 eltop.net_balance2 += Number(el.net_balance2);
                                 eltop.net_balance += Number(el.net_balance);
                                 eltop.totalMain = ifFloat(eltop.totalMain);
                                 eltop.net_balance = ifFloat(eltop.net_balance);
                                 eltop.sheet = ifFloat(eltop.sheet);
                                 eltop.total = ifFloat(eltop.total);

                                 el.net_balance2 = ifFloat(el.net_balance2);
                                 el.sheet_total2 = ifFloat(el.sheet_total2);
                                 el.total2 = ifFloat(el.total2);
                                 el.totalMain = ifFloat(el.totalMain);
                                 el.teamGroupIndex = teamGroupIndex;
                                 el.groupIndex = headIndex;
                                 el.collapsed = true;
                                 if (el.salesperson && el.salesperson[0]) {
                                    el.salesperson.map((el1, salespIndex) => {
                                       el1.collapsed = true;
                                       el1.index = salespIndex;
                                       el1.groupIndex = headIndex;


                                       // el1.totalMain = Number.isInteger(el1.totalMain) ? el1.totalMain : parseFloat(el1.totalMain.toFixed(2));
                                       // if (el1.subarray && el1.subarray[0]) {
                                       //    el1.subarray.map((el2, i) => {
                                       //       el2.collapsed = true;
                                       //    })
                                       // }
                                    })
                                 }

                              })
                           })
                           dataNew.map((eltop, teamGroupIndex) => {

                              eltop.balance_ledger2 = ifFloat(eltop.balance_ledger2);
                              eltop.balance_ledger = ifFloat(eltop.balance_ledger);
                              eltop.sheet = ifFloat(eltop.sheet);
                              eltop.sheet2 = ifFloat(eltop.sheet2);
                              eltop.total = ifFloat(eltop.total);
                              eltop.total2 = ifFloat(eltop.total2);
                              eltop.totalMain = ifFloat(eltop.totalMain);
                              eltop.net_balance = ifFloat(eltop.net_balance);
                              eltop.net_balance2 = ifFloat(eltop.net_balance2);
                           })

                           $scope.namesDataledgergroup3 = dataNew;
                           console.log("dataNew", dataNew)
                           // Initialize showInProductionCustomers property for each salesperson
                           $scope.namesDataledgergroup3.forEach(function(salesperson) {
                              salesperson.showInProductionCustomers = false;
                           });






                           $scope.loading = false;
                           $('.setload2').hide();
                        });

                     } else {
                        if (customer_id > 0) {
                           $http.get(
                                 '<?php echo base_url() ?>index.php/report/<?=$url_name?>limit=10&customer_id=' +
                                 customer_id + '&formdate=' + fromdate + '&page=' + $scope.currentPage +
                                 '&size=' + $scope.pageSize + '&search=' + $scope.searchText +
                                 '&todate=' + fromto +
                                 '&sales_group=ALL&order_status=ALL&payment_mode=' + payment_mode)
                              .success(function(data) {
                                 $scope.query = {}
                                 $scope.queryBy = '$';
                                 $scope.namesDataledgergroup = data;
                                 // Initialize showInProductionCustomers property for each salesperson
                                 $scope.namesDataledgergroup.forEach(function(salesperson) {
                                    salesperson.showInProductionCustomers = false;
                                 });

                                 $scope.loading = false;
                                 $('.setload2').hide();
                              });
                        } else {
                           $scope.loading = false;
                           $('.setload2').hide();
                        }
                     }
                  }



                  $('[name="vbtn-radio"]').on('change', function(e) {
                     $('[name="vbtn-radio"]').val($(e.target).val());
                     let dividentKey = $(e.target).val()
                     $scope.dividentKey = $(e.target).val();
                     // var cateid = $('#choices-single-default').val();
                     // var sales_group = $('#sales_group').val();
                     // $scope.fetchDatagetlegderGroup(cateid,   sales_group);


                  })


                  $('[name="vbtn-radio1"]').on('change', function(e) {
                     let dividentKey = $(e.target).val()
                     $scope.dividentKey1 = $(e.target).val();
                     // var cateid = $('#choices-single-default1').val();
                     // var sales_group = $('#sales_group1').val();
                     // $scope.fetchDatagetlegderGroup2(cateid, sales_group);


                  })


                  $('[name="vbtn-radio2"]').on('change', function(e) {
                     let dividentKey = $(e.target).val()
                     $scope.dividentKey2 = $(e.target).val();
                     // var cateid = $('#choices-single-default2').val();
                     // var sales_group = $('#sales_group2').val();
                     // $scope.fetchDatagetlegderGroup3(cateid, sales_group);


                  })



                  $(document).on("dblclick", ".editable", function(e) {
                     var $this = $(this);
                     let prevVal = $this.text().trim();
                     // Create an input element
                     var $input = $('<input>', {
                        type: 'text',
                        value: $this.text().trim(),
                        style: 'width: 50px;margin: 5px;',
                        class: 'newIp'
                     });

                     // Replace the div content with the input
                     $this.html($input);

                     // Focus on the input
                     $input.focus();

                     // Attach a blur event handler to the input
                     $input.on('blur', function() {
                        // Replace the input with the div and update its content
                        var newValue = $input.val();
                        $this.text(newValue);
                        if ($this.attr('data-field') != 'bal_led') {
                           if ($scope.dividentKey1 == 1) {
                              newValue = newValue;
                              prevVal = prevVal;
                           } else if ($scope.dividentKey1 == 'L') {
                              newValue = newValue * 100000;
                              prevVal = prevVal * 100000;
                           } else if ($scope.dividentKey1 == 'C') {
                              newValue = newValue * 10000000;
                              prevVal = prevVal * 10000000;
                           }
                        }


                        console.log($('#from-date1').val(), $this.attr('data-team'))
                        // $http.post()
                        const formdata = {
                           for_date: $('#from-date1').val(),
                           team_id: $this.attr('data-team-id'),
                           field: $this.attr('data-field'),
                           salesman_id: $this.attr('data-salesman-id'),
                           previous_value: prevVal,
                           modified_value: newValue,
                        }

                        console.log("formdata", formdata);
                        if (prevVal != newValue) {
                           $http.post('<?php echo base_url() ?>index.php/report/handleReportUpdates', formdata)
                              .then(function(response) {
                                 // Success callback
                                 console.log('POST request successful:', response.data);
                                 $scope.search2()
                              })
                              .catch(function(error) {
                                 // Error callback
                                 console.error('POST request error:', error);
                              });
                        }

                     });




                  });

               })
            </script>
         </div>
         <?php include('footer.php'); ?>
      </body>
   </div>
   </div>