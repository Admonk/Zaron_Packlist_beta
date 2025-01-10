<?php include "header.php"; ?>

<head>
   <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/css/components/customer_balance_report.css"> -->
   <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.min.css">
   <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
   <style>
      * {
         transition: transform 0.35s cubic-bezier(0.075, 0.82, 0.165, 1);
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
.table-body-cell {
    cursor: pointer;
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
         font-size: 13px !important;
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
      }

      .loading {
         text-align: center;
      }

      .trpoint:hover {
         /* background: antiquewhite; */
      }

      .setload {
         /* background: #fff1e7; */
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
      .checkdata_14_hide {
         display: none;
      }

      .custom-header {
         color: #000;
         height: 50px;
         font-size: 12px;
         background-color: #e9e9e9;
         text-align: center;
         /* border: 1px solid #ffffff; */
         backdrop-filter: blur(3px) brightness(0.5)
            /* box-shadow: 3px 0px 3px 2px #3535353b; */
      }
      .custom-header-tot {
    color: #000;
    height: 50px;
    font-size: 14px;
    background-color: #ffffffa3;
    text-align: right;
    font-weight: bold;
    /* border: 1px solid #ffffff; */
    backdrop-filter: blur(3px) brightness(0.5) /* box-shadow: 3px 0px 3px 2px #3535353b; */;
    font-family: sans-serif;
      }
      .price-main {
         color: #000;
         text-align: right;
      }

      .price-sl {
         text-align: right;
         font-size: 12px;
      }

      .price-c {
         text-align: right;
         font-size: 12px;
      }

      .price-sl b {
         color: #000;
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
         background: #fff;
      }

      .choices__list {
         z-index: 2;
      }
      
   </style>
</head>
<?php
$defaultCheckedStatus = "checked";
$labelStatusMapping = [];

if (count($table_customize) > 0) {
   foreach ($table_customize as $vl) {
      $label_id = $vl->label_id;
      $status = $vl->status;

      $labelStatusMapping[$label_id] = $status;
   }
}
$labelIds = range(1, 120);

foreach ($labelIds as $label_id) {
   $variableName = "checked{$label_id}";
   ${$variableName} = isset($labelStatusMapping[$label_id]) && $labelStatusMapping[$label_id] == 0 ? "" : $defaultCheckedStatus;

   $hideVariableName = "checkdata_{$label_id}_hide";
   ${$hideVariableName} = isset($labelStatusMapping[$label_id]) && $labelStatusMapping[$label_id] == 0 ? "checkdata_{$label_id}_hide" : "";
}
?>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">
   <div id="layout-wrapper">
      <?php echo $top_nav; ?>
      <?php
      $customer_id = 0;
      if (isset($_GET['customer_id'])) {
         $customer_id = $_GET['customer_id'];
      }

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
                              <h4 class="mb-sm-0 font-size-18">Customer Balance Report</h4>
                              <div class="page-title-right">
                                 <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Customer Balance Report !</li>
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
                                       <form>
                                          <div class="row">
                                             <div class="col">
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
                                                                             
                                                                             <option  value="<?php echo $val->id; ?>" seletced><?php echo $val->name; ?></option>
                                                                      
                                                                             <?php 
                                                                            
                                                                             }
                                                                             
                                                                         }
                                                                         else
                                                                         {
                                                                             ?>
                                                                             
                                                                             <option  value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                                  
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
                                                   <?php foreach ($sales_group as $vals): ?>
                                                                                 <option value="<?php echo $vals->id; ?>">
                                                                                    <?php echo $vals->name; ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                             </div>
                                             <div class="col">
                                                <input type="date" class="form-control" id="from-date" value="<?php echo date('Y-m-d', strtotime("-1 days")); ?>">
                                             </div>
                                             <div class="col">
                                                <input type="date" class="form-control" id="to-date" value="<?php echo date('Y-m-d'); ?>">
                                             </div>
                                             <div class="col">
                                                <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                                                <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata">Export</button>
                                             </div>
                                          </div>
                                       </form>
                                       <div id="search-view" style="display: none;">
                                          <div class="card-header" ng-init="fetchSingleData(0)">
                                             <h4 class="card-title">Customer Balance Report {{formdate}}
                                                To {{todate}}</h4>
                                          </div>
                                       </div>
                                       <div id="search-view1">
                                          <div class="card-header" ng-init="fetchSingleData(0)">
                                             <h4 class="card-title">Customer Balance Report
                                                <?php echo date('Y-04-01', strtotime("-1 year")); ?> To
                                                <?php echo $this->session->userdata['logged_in']['to_date']; ?>
                                             </h4>
                                          </div>
                                       </div>
                                       <div class="row" style="margin-bottom: 10px;">
                                          <div class="col-sm-12">
                                             <label for="showhiddenrow" style="float: right; margin: 9px 9px;">
                                                <input type="checkbox" id="showhiddenrow" <?php echo $checked120; ?>>
                                                Show null balance
                                             </label>
                                             <button type="button" ng-click="onviewparty()" class="btn btn-soft-danger waves-effect waves-light" style="float: right;">Customize
                                                table</button>
                                             <div id="example_filter" class="dataTables_filter">
                                                <input type="search" class="form-control input-sm" aria-controls="example" placeholder="Search By Customer" ng-model="searchText" ng-change="searchTextChanged()">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="table-responsive">
                                          <div id="resp-table">
                                             <div id="resp-table-body" style="position: relative;">
                                                <div class="resp-table-row" style="position: sticky;top: 0;z-index:1; " class="table table-bordered" ng-init="fetchDatagetlegderGroup(0,0)">
                                                   <div class="table-body-cell  custom-header">No</div>
                                                   <div class="table-body-cell custom-header" style="width: 150px; cursor:pointer" ng-click="resetCollapse()">
                                                      Customer Name</div>
                                                   <div class="table-body-cell custom-header checkdata_16 <?php echo $checkdata_16_hide; ?>">
                                                      Customer phone</div>
                                                   <div class="table-body-cell custom-header checkdata_17 <?php echo $checkdata_17_hide; ?>" style="width: 150px;">Area</div>
                                                   <div class="table-body-cell custom-header checkdata_1 <?php echo $checkdata_1_hide; ?>">
                                                      Open Dr </div>
                                                   <div class="table-body-cell custom-header checkdata_2 <?php echo $checkdata_2_hide; ?>">
                                                      Open Cr </div>
                                                   <div class="table-body-cell custom-header checkdata_3 <?php echo $checkdata_3_hide; ?>">
                                                      Open Bal </div>
                                                   <div class="table-body-cell custom-header checkdata_4 <?php echo $checkdata_4_hide; ?>">
                                                      Tran Dr</div>
                                                   <div class="table-body-cell custom-header checkdata_5 <?php echo $checkdata_5_hide; ?>">
                                                      Tot Dr</div>
                                                   <div class="table-body-cell custom-header checkdata_6 <?php echo $checkdata_6_hide; ?>">
                                                      Tran Cr</div>
                                                   <div class="table-body-cell custom-header checkdata_7 <?php echo $checkdata_7_hide; ?>">
                                                      Tot Cr</div>
                                                   <div class="table-body-cell custom-header checkdata_8 <?php echo $checkdata_8_hide; ?>">
                                                      Debit</div>
                                                   <div class="table-body-cell custom-header checkdata_9 <?php echo $checkdata_9_hide; ?>">
                                                      Credit</div>
                                                   <div class="table-body-cell custom-header checkdata_10 <?php echo $checkdata_10_hide; ?>">
                                                      Closing</div>
                                                   <div ng-if="memKey == 'inproduction_total_return'" class="table-body-cell custom-header checkdata_14 <?php echo $checkdata_14_hide; ?>" style="cursor: n-resize;background:white;" ng-click="fetchValueRows('inproduction_total_return')">
                                                      In Production
                                                      Return
                                                   </div>
                                                   <div ng-if="memKey != 'inproduction_total_return'" style="cursor: n-resize;" class="table-body-cell custom-header checkdata_14 <?php echo $checkdata_14_hide; ?>" ng-click="fetchValueRows('inproduction_total_return')">
                                                      In Production
                                                      Return
                                                   </div>
                                                   <div ng-if="memKey == 'production'"  class="table-body-cell custom-header checkdata_14 <?php echo $checkdata_14_hide; ?>" style="cursor: n-resize;background:white;" ng-click="fetchValueRows('production')">
                                                      In Production
                                                   </div>
                                                   <div ng-if="memKey != 'production'" class="table-body-cell custom-header checkdata_14 <?php echo $checkdata_14_hide; ?>" style="cursor: n-resize;" ng-click="fetchValueRows('production')">
                                                      In Production
                                                   </div>
                                                   <div ng-if="memKey == 'sheet_in_factory'" class="table-body-cell custom-header checkdata_11 <?php echo $checkdata_11_hide; ?>" style="cursor: n-resize;background:white;" ng-click="fetchValueRows('sheet_in_factory')">
                                                      Sheet in Factory
                                                   </div>
                                                   <div ng-if="memKey != 'sheet_in_factory'"  class="table-body-cell custom-header checkdata_11 <?php echo $checkdata_11_hide; ?>" style="cursor: n-resize;" ng-click="fetchValueRows('sheet_in_factory')">
                                                      Sheet in Factory
                                                   </div>
                                                   <div ng-if="memKey == 'transit'" class="table-body-cell custom-header checkdata_12 <?php echo $checkdata_12_hide; ?>" style="cursor: n-resize;background:white;" ng-click="fetchValueRows('transit')">
                                                      Transit</div>
                                                   <div  ng-if="memKey != 'transit'" class="table-body-cell custom-header checkdata_12 <?php echo $checkdata_12_hide; ?>" style="cursor: n-resize;" ng-click="fetchValueRows('transit')">
                                                   Transit</div>
                                                   
                                                   <div  class="table-body-cell custom-header checkdata_13 <?php echo $checkdata_13_hide; ?>" >
                                                      Net Balance
                                                   </div>
                                                   <!-- <div style="width:90px;" class="table-body-cell ">Action</div> -->
                                                   
                           <div  class="table-body-cell  custom-header <?php echo $checkdata_14_hide; ?>"  > Sheet</div>
                           <div  class="table-body-cell  custom-header <?php echo $checkdata_14_hide; ?>"  > Action</div>                         

                                                </div>
                                                <div class="resp-table-row" style="position: sticky;top: 50px;z-index:1; " class="table table-bordered" ng-init="fetchDatagetlegderGroup(0,0)">
                                                   <div class="table-body-cell  custom-header-tot">Total :</div>
                                                   <div class="table-body-cell custom-header-tot" style="width: 150px; cursor:pointer" ng-click="resetCollapse()">
                                                      </div>
                                                   <div class="table-body-cell custom-header-tot checkdata_16 <?php echo $checkdata_16_hide; ?>">
                                                       </div>
                                                   <div class="table-body-cell custom-header-tot checkdata_17 <?php echo $checkdata_17_hide; ?>" style="width: 150px;"> </div>
                                                   <div class="table-body-cell custom-header-tot checkdata_1 <?php echo $checkdata_1_hide; ?>">
                                                     {{totalVals.Open_Dr | number}}</div>
                                                   <div class="table-body-cell custom-header-tot checkdata_2 <?php echo $checkdata_2_hide; ?>">
                                                     {{totalVals.Open_Cr | number}} </div>
                                                   <div class="table-body-cell custom-header-tot checkdata_3 <?php echo $checkdata_3_hide; ?>">
                                                   {{totalVals.Open_Bal | number}} </div>
                                                   <div class="table-body-cell custom-header-tot checkdata_4 <?php echo $checkdata_4_hide; ?>">
                                                   {{totalVals.Tran_Dr | number}} </div>
                                                   <div class="table-body-cell custom-header-tot checkdata_5 <?php echo $checkdata_5_hide; ?>">
                                                   {{totalVals.Tran_Dr | number}} </div>
                                                   <div class="table-body-cell custom-header-tot checkdata_6 <?php echo $checkdata_6_hide; ?>">
                                                   {{totalVals.Tran_Cr | number}}</div>
                                                   <div class="table-body-cell custom-header-tot checkdata_7 <?php echo $checkdata_7_hide; ?>">
                                                   {{totalVals.Tot_Cr | number}} </div>
                                                   <div class="table-body-cell custom-header-tot checkdata_8 <?php echo $checkdata_8_hide; ?>">
                                                   {{totalVals.debit | number}}   </div>
                                                   <div class="table-body-cell custom-header-tot checkdata_9 <?php echo $checkdata_9_hide; ?>">
                                                   {{totalVals.credit | number}}  </div>
                                                   <div class="table-body-cell custom-header-tot checkdata_10 <?php echo $checkdata_10_hide; ?>">
                                                   {{totalVals.closeing | number}}  </div>
                                                   <div ng-if="memKey == 'inproduction_total_return'" class="table-body-cell custom-header-tot checkdata_14 <?php echo $checkdata_14_hide; ?>" style="cursor: n-resize;background:white;" ng-click="fetchValueRows('inproduction_total_return')">
                                                   {{totalVals.production_return | number}} 
                                                      
                                                   </div>
                                                   <div ng-if="memKey != 'inproduction_total_return'" style="cursor: n-resize;" class="table-body-cell custom-header-tot checkdata_14 <?php echo $checkdata_14_hide; ?>" ng-click="fetchValueRows('inproduction_total_return')">
                                                   {{totalVals.production_return | number}}  
                                                      
                                                   </div>
                                                   <div ng-if="memKey == 'production'"  class="table-body-cell custom-header-tot checkdata_14 <?php echo $checkdata_14_hide; ?>" style="cursor: n-resize;background:white;" ng-click="fetchValueRows('production')">
                                                   {{totalVals.production | number}}  
                                                   </div>
                                                   <div ng-if="memKey != 'production'" class="table-body-cell custom-header-tot checkdata_14 <?php echo $checkdata_14_hide; ?>" style="cursor: n-resize;" ng-click="fetchValueRows('production')">
                                                   {{totalVals.production | number}}  
                                                   </div>
                                                   <div ng-if="memKey == 'sheet_in_factory'" class="table-body-cell custom-header-tot checkdata_11 <?php echo $checkdata_11_hide; ?>" style="cursor: n-resize;background:white;" ng-click="fetchValueRows('sheet_in_factory')">
                                                   {{totalVals.sheet_in_factory | number}} 
                                                   </div>
                                                   <div ng-if="memKey != 'sheet_in_factory'"  class="table-body-cell custom-header-tot checkdata_11 <?php echo $checkdata_11_hide; ?>" style="cursor: n-resize;" ng-click="fetchValueRows('sheet_in_factory')">
                                                   {{totalVals.sheet_in_factory | number}} 
                                                   </div>
                                                   <div ng-if="memKey == 'transit'" class="table-body-cell custom-header-tot checkdata_12 <?php echo $checkdata_12_hide; ?>" style="cursor: n-resize;background:white;" ng-click="fetchValueRows('transit')">
                                                   {{totalVals.transit | number}}  </div>
                                                   <div  ng-if="memKey != 'transit'" class="table-body-cell custom-header-tot checkdata_12 <?php echo $checkdata_12_hide; ?>" style="cursor: n-resize;" ng-click="fetchValueRows('transit')">
                                                   {{totalVals.transit | number}}  </div>
                                                   
                                                   <div  class="table-body-cell custom-header-tot checkdata_13 <?php echo $checkdata_13_hide; ?>" >
                                                   {{totalVals.net_balance | number}}  
                                                   </div>
                                                   <!-- <div style="width:90px;" class="table-body-cell ">Action</div> -->
                                                   
                                                      <div  class="table-body-cell  custom-header-tot <?php echo $checkdata_14_hide; ?>"  >
                                                      {{totalVals.sheet_total | number}}  </div>

                              <div  class="table-body-cell  custom-header-tot <?php echo $checkdata_14_hide; ?>"  ></div>

                                                </div>
                                                <div class="resp-table-row setload">
                                                   <div class="table-body-cell"></div>
                                                   <div class="table-body-cell"></div>
                                                   <div class="table-body-cell checkdata_16 <?php echo $checkdata_16_hide; ?>">
                                                   </div>
                                                   <div class="table-body-cell checkdata_17 <?php echo $checkdata_17_hide; ?>">
                                                   </div>
                                                   <div class="table-body-cell checkdata_1 <?php echo $checkdata_1_hide; ?>">
                                                   </div>
                                                   <div class="table-body-cell checkdata_2 ">
                                                      <loading></loading>
                                                   </div>
                                                   <div class="table-body-cell checkdata_3 <?php echo $checkdata_3_hide; ?>">
                                                   </div>
                                                   <div class="table-body-cell checkdata_4 <?php echo $checkdata_4_hide; ?>">
                                                   </div>
                                                   <div class="table-body-cell checkdata_5 <?php echo $checkdata_5_hide; ?>">
                                                   </div>
                                                   <div class="table-body-cell checkdata_6 <?php echo $checkdata_6_hide; ?>">
                                                   </div>
                                                   <div class="table-body-cell checkdata_7 <?php echo $checkdata_7_hide; ?>">
                                                   </div>
                                                   <div class="table-body-cell checkdata_8 <?php echo $checkdata_8_hide; ?>">
                                                   </div>
                                                   <div class="table-body-cell checkdata_9 <?php echo $checkdata_9_hide; ?>">
                                                   </div>
                                                   <div class="table-body-cell checkdata_10 <?php echo $checkdata_10_hide; ?>">
                                                   </div>
                                                   <div class="table-body-cell checkdata_14 <?php echo $checkdata_14_hide; ?>">
                                                   </div>
                                                   <div class="table-body-cell checkdata_14 <?php echo $checkdata_14_hide; ?>">
                                                   </div>
                                                   <div class="table-body-cell checkdata_11 <?php echo $checkdata_11_hide; ?>">
                                                   </div>
                                                   <div class="table-body-cell checkdata_12 <?php echo $checkdata_12_hide; ?>">
                                                   </div>
                                                   <div class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>">
                                                   </div>
                                                   <div class="table-body-cell checkdata_14 <?php echo $checkdata_14_hide; ?>">
                                                   </div>

                                                    <div class="table-body-cell checkdata_14 <?php echo $checkdata_14_hide; ?>">
                                                   </div>
                                                  
                                                </div>
                                                <div class="primary" ng-repeat="data in namesDataledgergroup" >
                                                      <div class="resp-table-row trpoint" style=" box-shadow: inset -1px 0px 0px 3px #f0f0f0f7;background: #ffdfdf;" ng-click="toggleCollapse($event,data.teamGroupIndex,data.groupIndex,data.index)">
                                                         <div class="table-body-cell pri-main ">
                                                            
                                                         </div>
                                                         <div class="table-body-cell "><b class="pri-main">
                                                               {{data.key}}</b>
                                                            <i style="color:#fff;float: right;" class="mdi mdi-arrow-up-thick float-right"></i>

                                                         </div>
                                                         <div class="table-body-cell checkdata_16 <?php echo $checkdata_16_hide; ?> ">
                                                         </div>
                                                         <div class="table-body-cell checkdata_17 <?php echo $checkdata_17_hide; ?>">
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_1 <?php echo $checkdata_1_hide; ?>">
                                                            <b class="pri-main" ng-if="data.Open_Dr!=0">{{data.Open_Dr | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_2 <?php echo $checkdata_2_hide; ?>">
                                                            <b class="pri-main" ng-if="data.Open_Cr!=0">{{data.Open_Cr | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_3 <?php echo $checkdata_3_hide; ?>">
                                                            <b class="pri-main" ng-if="data.Open_Bal!=0">{{data.Open_Bal | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_4 <?php echo $checkdata_4_hide; ?>">
                                                            <b class="pri-main" ng-if="data.Tran_Dr!=0">{{data.Tran_Dr | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_5 <?php echo $checkdata_5_hide; ?>">
                                                            <b class="pri-main" ng-if="data.Tot_Dr!=0">{{data.Tot_Dr | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_6 <?php echo $checkdata_6_hide; ?>">
                                                            <b class="pri-main" ng-if="data.Tran_Cr!=0">{{data.Tran_Cr | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_7 <?php echo $checkdata_7_hide; ?>">
                                                            <b class="pri-main" ng-if="data.Tot_Cr!=0">{{data.Tot_Cr | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_8 <?php echo $checkdata_8_hide; ?>">
                                                            <b class="pri-main" ng-if="data.debit!=0">{{data.debit | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_9 <?php echo $checkdata_9_hide; ?>">
                                                            <b class="pri-main" ng-if="data.credit!=0">{{data.credit | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_10 <?php echo $checkdata_10_hide; ?>">
                                                            <b class="pri-main" ng-if="data.closeing!=0">{{data.closeing | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_14 <?php echo $checkdata_14_hide; ?>">
                                                            <b class="pri-main" ng-if="data.production_return!=0">{{data.production_return
                                                         | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_14 <?php echo $checkdata_14_hide; ?>">
                                                            <b class="pri-main" ng-if="data.production!=0">{{data.production | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_11 <?php echo $checkdata_11_hide; ?>">
                                                            <b class="pri-main" ng-if="data.sheet_in_factory!=0">{{data.sheet_in_factory | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_12 <?php echo $checkdata_12_hide; ?>">
                                                            <b class="pri-main" ng-if="data.transit!=0">{{data.transit | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_13 <?php echo $checkdata_13_hide; ?>">
                                                            <b class="pri-main" ng-if="data.net_balance!=0">{{data.net_balance | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_15 <?php echo $checkdata_15_hide; ?>">
                                                            <b class="pri-main" ng-if="data.sheet_total!=0">{{data.sheet_total | number}}</b>
                                                         </div>

                                                           <div class="table-body-cell price-main checkdata_15 <?php echo $checkdata_15_hide; ?>"> 
                                                         </div>



                                                         
                                                      </div>
                                                   <div class="primary" ng-repeat="names in data.values">
                                                      <div class="resp-table-row trpoint" style="background: #e7e7e7;"  ng-if="(!names.collapsed)"  ng-click="toggleCollapse($event,names.teamGroupIndex,names.groupIndex,names.index)">
                                                         <div class="table-body-cell pri-main ">
                                                            <!-- {{names.no}} -->
                                                         </div>
                                                         <div class="table-body-cell " style="text-align:center;" ><b class="pri-main" >{{names.sales_group_name}}</b>
                                                            
                                                            <i style="color:#9d9d9d;float: right;" class="mdi mdi-arrow-up-thick float-right"></i>

                                                         </div>
                                                         <div class="table-body-cell checkdata_16 <?php echo $checkdata_16_hide; ?> ">
                                                         </div>
                                                         <div class="table-body-cell checkdata_17 <?php echo $checkdata_17_hide; ?>">
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_1 <?php echo $checkdata_1_hide; ?>">
                                                            <b class="pri-main" ng-if="names.Open_Dr!=0">{{names.Open_Dr | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_2 <?php echo $checkdata_2_hide; ?>">
                                                            <b class="pri-main" ng-if="names.Open_Cr!=0">{{names.Open_Cr | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_3 <?php echo $checkdata_3_hide; ?>">
                                                            <b class="pri-main" ng-if="names.Open_Bal!=0">{{names.Open_Bal | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_4 <?php echo $checkdata_4_hide; ?>">
                                                            <b class="pri-main" ng-if="names.Tran_Dr!=0">{{names.Tran_Dr | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_5 <?php echo $checkdata_5_hide; ?>">
                                                            <b class="pri-main" ng-if="names.Tot_Dr!=0">{{names.Tot_Dr | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_6 <?php echo $checkdata_6_hide; ?>">
                                                            <b class="pri-main" ng-if="names.Tran_Cr!=0">{{names.Tran_Cr | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_7 <?php echo $checkdata_7_hide; ?>">
                                                            <b class="pri-main" ng-if="names.Tot_Cr!=0">{{names.Tot_Cr | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_8 <?php echo $checkdata_8_hide; ?>">
                                                            <b class="pri-main" ng-if="names.debit!=0">{{names.debit | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_9 <?php echo $checkdata_9_hide; ?>">
                                                            <b class="pri-main" ng-if="names.credit!=0">{{names.credit | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_10 <?php echo $checkdata_10_hide; ?>">
                                                            <b class="pri-main" ng-if="names.closeing!=0">{{names.closeing | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_14 <?php echo $checkdata_14_hide; ?>">
                                                            <b class="pri-main" ng-if="names.production_return!=0">{{names.production_return
                                                         | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_14 <?php echo $checkdata_14_hide; ?>">
                                                            <b class="pri-main" ng-if="names.production!=0">{{names.production | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_11 <?php echo $checkdata_11_hide; ?>">
                                                            <b class="pri-main" ng-if="names.sheet_in_factory!=0">{{names.sheet_in_factory |
                                                         number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_12 <?php echo $checkdata_12_hide; ?>">
                                                            <b class="pri-main" ng-if="names.transit!=0">{{names.transit | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_13 <?php echo $checkdata_13_hide; ?>">
                                                            <b class="pri-main" ng-if="names.net_balance!=0">{{names.net_balance | number}}</b>
                                                         </div>
                                                         <div class="table-body-cell price-main checkdata_15 <?php echo $checkdata_15_hide; ?>">
                                                            <b class="pri-main" ng-if="names.sheet_total!=0">{{names.sheet_total | number}}</b>
                                                         </div>


                                                         <div class="table-body-cell price-main checkdata_15 <?php echo $checkdata_15_hide; ?>">
                                                            <b class="pri-main" ></b> 
                                                         </div>
                                                          
                                                      </div>
                                                      <div class="secondchild" ng-repeat="namesvvssget in names.salesperson">
                                                         <div class="resp-table-row sales_table_head slide" ng-if="!namesvvssget.collapsed" ng-click="toggleCollapse($event,namesvvssget.teamGroupIndex,namesvvssget.groupIndex,namesvvssget.index)" style="background-color: #f9f9f9;">
                                                            <div class="table-body-cell"></div>
                                                            <div class="table-body-cell"><b class="sales_name">{{namesvvssget.sales_person_name}}</b>
                                                               <!-- <i style="color:#9d9d9d;float: right;margin: 3px;" ng-if="!namesvvssget.collapsed"  class="mdi mdi-arrow-up float-right"></i> -->
                                                               <i style="color:#9d9d9d;float: right;margin: 3px;" class="mdi mdi-arrow-up-thick float-right"></i>
                                                            </div>
                                                            <div class="table-body-cell checkdata_16 <?php echo $checkdata_16_hide; ?>">
                                                            </div>
                                                            <div class="table-body-cell checkdata_17 <?php echo $checkdata_17_hide; ?>">
                                                            </div>
                                                            <div class="table-body-cell price-sl checkdata_1 <?php echo $checkdata_1_hide; ?>">
                                                               <b class="sales_name">{{namesvvssget.Open_Dr | number}}</b>
                                                            </div>
                                                            <div class="table-body-cell price-sl checkdata_2 <?php echo $checkdata_2_hide; ?>">
                                                               <b class="sales_name">{{namesvvssget.Open_Cr | number}}</b>
                                                            </div>
                                                            <div class="table-body-cell price-sl checkdata_3 <?php echo $checkdata_3_hide; ?>">
                                                               <b class="sales_name">{{namesvvssget.Open_Bal | number}}</b>
                                                            </div>
                                                            <div class="table-body-cell price-sl checkdata_4 <?php echo $checkdata_4_hide; ?>">
                                                               <b class="sales_name">{{namesvvssget.Tran_Dr | number}}</b>
                                                            </div>
                                                            <div class="table-body-cell price-sl checkdata_5 <?php echo $checkdata_5_hide; ?>">
                                                               <b class="sales_name">{{namesvvssget.Tot_Dr | number}}</b>
                                                            </div>
                                                            <div class="table-body-cell price-sl checkdata_6 <?php echo $checkdata_6_hide; ?>">
                                                               <b class="sales_name">{{namesvvssget.Tran_Cr | number}}</b>
                                                            </div>
                                                            <div class="table-body-cell price-sl checkdata_7 <?php echo $checkdata_7_hide; ?>">
                                                               <b class="sales_name">{{namesvvssget.Tot_Cr | number}}</b>
                                                            </div>
                                                            <div class="table-body-cell price-sl checkdata_8 <?php echo $checkdata_8_hide; ?>">
                                                               <b class="sales_name">{{namesvvssget.debit | number}}</b>
                                                            </div>
                                                            <div class="table-body-cell price-sl checkdata_9 <?php echo $checkdata_9_hide; ?>">
                                                               <b class="sales_name">{{namesvvssget.credit | number}}</b>
                                                            </div>
                                                            <div class="table-body-cell price-sl checkdata_10 <?php echo $checkdata_10_hide; ?>">
                                                               <b class="sales_name" ng-if="namesvvssget.closeing!=0">{{namesvvssget.closeing | number}}</b>
                                                            </div>
                                                            <div class="table-body-cell price-sl checkdata_14 <?php echo $checkdata_14_hide; ?>">
                                                               <b class="sales_name">{{ namesvvssget.production_return  | number}}</b>
                                                            </div>
                                                            <div class="table-body-cell price-sl checkdata_14 <?php echo $checkdata_14_hide; ?>">
                                                               <b class="sales_name" ng-if="namesvvssget.production !== 0">{{namesvvssget.production | number}}</b>
                                                            </div>
                                                            <div class="table-body-cell price-sl checkdata_11 <?php echo $checkdata_11_hide; ?>">
                                                               <b class="sales_name">{{ namesvvssget.sheet_in_factory  | number}}</b>
                                                            </div>
                                                            <div class="table-body-cell price-sl checkdata_12 <?php echo $checkdata_12_hide; ?>">
                                                               <b class="sales_name">{{ namesvvssget.transit | number}}</b>
                                                            </div>
                                                            <div class="table-body-cell price-sl checkdata_13 <?php echo $checkdata_13_hide; ?>">
                                                               <b class="sales_name">{{ namesvvssget.net_balance  | number}}</b>
                                                            </div>
                                                            <div class="table-body-cell price-sl checkdata_13 <?php echo $checkdata_15_hide; ?>">
                                                               <b class="sales_name">{{ namesvvssget.sheet  | number}}</b>
                                                            </div>

                                                            <div class="table-body-cell price-sl checkdata_13 <?php echo $checkdata_15_hide; ?>">
                                                               <b class="sales_name"></b>
                                                            </div>
                                                         </div>
                                                         <div class="chriedchild chri-ch slide" ng-repeat="namesvv in namesvvssget.subarray | filter:query" ng-show="namesvvssget.showInProductionCustomers || customerHasProduction(namesvv)">
                                                            <div class="resp-table-row {{ namesvv.hidestatus }}" ng-if="!namesvv.collapsed">
                                                               <div class="chri-ch table-body-cell">
                                                                  {{namesvv.no}}
                                                               </div>
                                                               <div class="chri-ch table-body-cell" ng-click="handleClick(namesvv,0)">
                                                                  {{namesvv.customername}}
                                                               </div>
                                                               <div class="chri-ch table-body-cell checkdata_16 <?php echo $checkdata_16_hide; ?>" ng-click="handleClick(namesvv,0)">
                                                                  {{namesvv.customerphone}}
                                                               </div>
                                                               <div class="chri-ch table-body-cell table-body-cell checkdata_17 <?php echo $checkdata_17_hide; ?>" ng-click="handleClick(namesvv,0)">
                                                                  {{namesvv.route_name}}
                                                               </div>
                                                               <div class="chri-ch table-body-cell price-c checkdata_1 <?php echo $checkdata_1_hide; ?>" ng-click="handleClick(namesvv,0)">
                                                                  <b ng-if="namesvv.opening_balance_dr!=0">{{namesvv.opening_balance_dr | number}}
                                                                  </b>
                                                               </div>
                                                               <div class="chri-ch table-body-cell price-c checkdata_2 <?php echo $checkdata_2_hide; ?>" ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.opening_balance_cr!=0">{{namesvv.opening_balance_cr | number}}
                                                                  </b>
                                                               </div>
                                                               <div class="chri-ch table-body-cell price-c checkdata_3 <?php echo $checkdata_3_hide; ?>" ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.opening_balance!=0">
                                                                     {{namesvv.opening_balance
                                                               | number}} {{ namesvv.payment_status}}</b>
                                                               </div>
                                                               <div class="chri-ch table-body-cell price-c checkdata_4 <?php echo $checkdata_4_hide; ?>" ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.trnDr!=0">
                                                                     {{namesvv.trnDr | number}} </b>
                                                               </div>
                                                               <div class="chri-ch table-body-cell price-c checkdata_5 <?php echo $checkdata_5_hide; ?>" ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.trnDrtotal!=0">
                                                                     {{namesvv.trnDrtotal | number}}
                                                                  </b>
                                                               </div>
                                                               <div class="chri-ch table-body-cell price-c checkdata_6 <?php echo $checkdata_6_hide; ?>" ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.trnCr!=0">
                                                                     {{namesvv.trnCr | number}} </b>
                                                               </div>
                                                               <div class="chri-ch table-body-cell price-c checkdata_7 <?php echo $checkdata_7_hide; ?>" ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.trnCrtotal!=0">
                                                                     {{namesvv.trnCrtotal | number}}
                                                                  </b>
                                                               </div>
                                                               <div class="chri-ch table-body-cell price-c checkdata_8 <?php echo $checkdata_8_hide; ?>" ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.debit!=0">
                                                                     {{namesvv.debit | number}}</b>
                                                               </div>
                                                               <div class="chri-ch table-body-cell price-c checkdata_9 <?php echo $checkdata_9_hide; ?>" ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.credit!=0">
                                                                     {{namesvv.credit | number}}</b>
                                                               </div>
                                                               <div class="chri-ch table-body-cell price-c checkdata_10 <?php echo $checkdata_10_hide; ?>" ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.closeing!=0">
                                                                     {{namesvv.closeing | number}}
                                                                     {{namesvv.payment_status_bu_closeing}}</b>
                                                               </div>
                                                               <div class="chri-ch table-body-cell price-c checkdata_14 <?php echo $checkdata_14_hide; ?>" ng-click="handleClick(namesvv,4)"><b ng-if="namesvv.inproduction_total_return!=0">
                                                                     {{namesvv.inproduction_total_return | number}}</b>
                                                               </div>
                                                               <div class="chri-ch table-body-cell price-c checkdata_14 <?php echo $checkdata_14_hide; ?>" ng-click="handleClick(namesvv,1)"><b ng-if="namesvv.production!=0">
                                                                     {{namesvv.production | number}}</b>
                                                               </div>
                                                               <div class="chri-ch table-body-cell price-c checkdata_11 <?php echo $checkdata_11_hide; ?>" ng-click="handleClick(namesvv,2)"><b ng-if="namesvv.sheet_in_factory!=0">{{namesvv.sheet_in_factory |number}}</b>
                                                               </div>
                                                               <div class="chri-ch table-body-cell price-c checkdata_12 <?php echo $checkdata_12_hide; ?>" ng-click="handleClick(namesvv,3)"><b ng-if="namesvv.transit!=0">
                                                                     {{namesvv.transit | number}}</b>
                                                               </div>
                                                               <div class="chri-ch table-body-cell price-c checkdata_13 <?php echo $checkdata_13_hide; ?>" ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.balance!=0">
                                                                     <span ng-if="namesvv.getstatus==0" style="color:red;">{{namesvv.balance | number}}</span>
                                                                     <span ng-if="namesvv.getstatus==1" style="color:green;">{{namesvv.balance | number}}</span>

                                                                  </b>
                                                               </div>
                                                               <div class="chri-ch table-body-cell price-c checkdata_15 <?php echo $checkdata_15_hide; ?>" ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.sheet!=0">
                                                                     <span style="color:red;">{{namesvv.sheet | number}}</span>
                                                                     <span style="color:green;"></span>
                                                                  </b>
                                                               </div>


                            <div   class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>">

                  <button type="button" ng-click="editData(namesvv.customername,namesvv.id,namesvv.closeing,namesvv.payment_status_bu_closeing,namesvv.balance)" style="display: none;" class="btn btn-outline-danger btn-sm">DISCOUNT</button>


                            </div>      
                             




                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                             </div>
                                                                     </div>
                                             <div class="modal fade" id="firstmodalcommisonparty" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                   <div class="modal-content">
                                                      <div class="modal-header">
                                                         <h5 class="modal-title" id="exampleModalToggleLabel">Customize
                                                            table</h5>
                                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>
                                                      <div class="modal-body">
                                                         <table class="table">
                                                            <tr>
                                                               <td>
                                                                  <div class="form-check form-switch form-check-inline">
                                                                     <input class="form-check-input Uncheck" value="16" <?php echo $checked16; ?> type="checkbox" id="flexSwitchCheckDefaultnum">
                                                                     <label class="form-check-label" for="flexSwitchCheckDefaultnum">
                                                                        Phone Num
                                                                     </label>
                                                                  </div>
                                                               </td>
                                                               <td>
                                                                  <div class="form-check form-switch form-check-inline">
                                                                     <input class="form-check-input Uncheck" value="17" <?php echo $checked17; ?> type="checkbox" id="flexSwitchCheckDefaultar">
                                                                     <label class="form-check-label" for="flexSwitchCheckDefaultar">
                                                                        Area
                                                                     </label>
                                                                  </div>
                                                               </td>
                                                               <td>
                                                                  <div class="form-check form-switch form-check-inline">
                                                                     <input class="form-check-input Uncheck" value="1" <?php echo $checked1; ?> type="checkbox" id="flexSwitchCheckDefault1">
                                                                     <label class="form-check-label" for="flexSwitchCheckDefault1">
                                                                        Open Dr
                                                                     </label>
                                                                  </div>
                                                               </td>
                                                               <td>
                                                                  <div class="form-check form-switch form-check-inline">
                                                                     <input class="form-check-input Uncheck" value="2" <?php echo $checked2; ?> type="checkbox" id="flexSwitchCheckDefault2">
                                                                     <label class="form-check-label" for="flexSwitchCheckDefault2">
                                                                        Open Cr
                                                                     </label>
                                                                  </div>
                                                               </td>
                                                               <td>
                                                                  <div class="form-check form-switch form-check-inline">
                                                                     <input class="form-check-input Uncheck" value="3" <?php echo $checked3; ?> type="checkbox" id="flexSwitchCheckDefault3">
                                                                     <label class="form-check-label" for="flexSwitchCheckDefault3">Open
                                                                        Bal</label>
                                                                  </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td>
                                                                  <div class="form-check form-switch form-check-inline">
                                                                     <input class="form-check-input Uncheck" value="4" <?php echo $checked4; ?> type="checkbox" id="flexSwitchCheckDefault4">
                                                                     <label class="form-check-label" for="flexSwitchCheckDefault4">
                                                                        Tran Dr
                                                                     </label>
                                                                  </div>
                                                               </td>
                                                               <td>
                                                                  <div class="form-check form-switch form-check-inline">
                                                                     <input class="form-check-input Uncheck" value="5" <?php echo $checked5; ?> type="checkbox" id="flexSwitchCheckDefault5">
                                                                     <label class="form-check-label" for="flexSwitchCheckDefault5">Tot
                                                                        Dr</label>
                                                                  </div>
                                                               </td>
                                                               <td>
                                                                  <div class="form-check form-switch form-check-inline">
                                                                     <input class="form-check-input Uncheck" value="6" <?php echo $checked6; ?> type="checkbox" id="flexSwitchCheckDefault6">
                                                                     <label class="form-check-label" for="flexSwitchCheckDefault6">Tran
                                                                        Cr</label>
                                                                  </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td>
                                                                  <div class="form-check form-switch form-check-inline">
                                                                     <input class="form-check-input Uncheck" value="7" <?php echo $checked7; ?> type="checkbox" id="flexSwitchCheckDefault7">
                                                                     <label class="form-check-label" for="flexSwitchCheckDefault7">Tot
                                                                        Cr</label>
                                                                  </div>
                                                               </td>
                                                               <td>
                                                                  <div class="form-check form-switch form-check-inline">
                                                                     <input class="form-check-input Uncheck" value="8" <?php echo $checked8; ?> type="checkbox" id="flexSwitchCheckDefault8">
                                                                     <label class="form-check-label" for="flexSwitchCheckDefault8">Debit</label>
                                                                  </div>
                                                               </td>
                                                               <td>
                                                                  <div class="form-check form-switch form-check-inline">
                                                                     <input class="form-check-input Uncheck" value="9" <?php echo $checked9; ?> type="checkbox" id="flexSwitchCheckDefault9">
                                                                     <label class="form-check-label" for="flexSwitchCheckDefault9">Credit</label>
                                                                  </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td>
                                                                  <div class="form-check form-switch form-check-inline">
                                                                     <input class="form-check-input Uncheck" value="10" <?php echo $checked10; ?> type="checkbox" id="flexSwitchCheckDefault10">
                                                                     <label class="form-check-label" for="flexSwitchCheckDefault10">Closing</label>
                                                                  </div>
                                                               </td>
                                                               <td>
                                                                  <div class="form-check form-switch form-check-inline">
                                                                     <input class="form-check-input Uncheck" value="14" <?php echo $checked14; ?> type="checkbox" id="flexSwitchCheckDefault14">
                                                                     <label class="form-check-label" for="flexSwitchCheckDefault14">Production</label>
                                                                  </div>
                                                               </td>
                                                               <td>
                                                                  <div class="form-check form-switch form-check-inline">
                                                                     <input class="form-check-input Uncheck" value="11" <?php echo $checked11; ?> type="checkbox" id="flexSwitchCheckDefault11">
                                                                     <label class="form-check-label" for="flexSwitchCheckDefault11">Sheet
                                                                        in
                                                                        Factory</label>
                                                                  </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td>
                                                                  <div class="form-check form-switch form-check-inline">
                                                                     <input class="form-check-input Uncheck" value="12" <?php echo $checked12; ?> type="checkbox" id="flexSwitchCheckDefault12">
                                                                     <label class="form-check-label" for="flexSwitchCheckDefault12">Transit</label>
                                                                  </div>
                                                               </td>
                                                               <td>
                                                                  <div class="form-check form-switch form-check-inline">
                                                                     <input class="form-check-input Uncheck" value="13" <?php echo $checked13; ?> type="checkbox" id="flexSwitchCheckDefault13">
                                                                     <label class="form-check-label" for="flexSwitchCheckDefault13">Net
                                                                        Balance</label>
                                                                  </div>
                                                               </td>
                                                            </tr>
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
            </div>
         </div>



   <div class="modal fade" id="editdata" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalToggleLabel_find"></h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              
              
               <input type="hidden" id="customer_id" name="customer_id"  class="form-control">

  <input type="hidden" id="closeing" name="closeing"  class="form-control">


               <div class="form-group row" id="credit_data" >
                  <label class="col-sm-12 col-form-label">Discount Amount </label>
                  <div class="col-sm-12">
                    <div class="some-class">
                     <input type="txt" class="form-control" name="amount"  id="amount" >
                    

                  </div>
                  </div>
               </div>
              
              
               <div class="form-group row" >
                  <label class="col-sm-12 col-form-label">Notes</label>
                  <div class="col-sm-12">
                    <textarea class="form-control" rows="4" id="notes"></textarea>
                  </div>
               </div>
               
               <div class="row" style="margin: 20px -9px;">
                  <div class="col-md-12">
                     <div class="form-group row">
                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary w-md" style="float: right;" id="editSave" ng-click="bankstatementupdate()">Request Verification</button>
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
               $('#exportdata').on('click', function() {
                  var payment_mode = 1;
                  var cateid = $('#choices-single-default').val();
                  var customer_id = '<?php echo $customer_id; ?>';
                  var productid = 1;
                  var fromdate = $('#from-date').val();
                  var fromto = $('#to-date').val();
                
                  var order_status = 1;
                  var sales_group = $('#sales_group').val();
                  var payment_mode = $('#payment_mode').val();
                  url =
                     '<?php echo base_url() ?>index.php/report/fetch_data_customer_balance_report_export?limit=10&customer_id=' +
                     customer_id + '&cate_id=' + cateid + '&sales_group=' + sales_group +
                     '&productid=' + productid + '&formdate=' + fromdate + '&todate=' + fromto +
                     '&order_status=' + order_status + '&payment_mode=' + payment_mode;
                  location = url;
               });
            });

            var app = angular.module('crudApp', ['datatables']);
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
               


               $scope.handleClick = function(namesvv,status) {
                  var customer_id = namesvv.id;
      var url = "<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id=" + customer_id +"&filter=" + status;
                    
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



               $scope.search = function() {
                  $scope.currentPage = 1;
                  var fromdate = $('#from-date').val();
                  var fromto = $('#to-date').val();
                  if(fromdate.includes('-')){
                     var split = fromdate.split('-');
                     var fromDateFormated = split[2]+'/'+split[1]+'/'+split[0];
                  }else{
                     var split = fromdate.split('/');
                     var fromDateFormated = split[1]+'/'+split[0]+'/'+split[2];


                  }
                  if(fromto.includes('-')){
                     var split = fromto.split('-');
                     var toDateFormated = split[2]+'/'+split[1]+'/'+split[0];

                  }else{
                     var split = fromto.split('/');
                     var toDateFormated = split[1]+'/'+split[0]+'/'+split[2];


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






               $scope.searchTextChanged = function() {
                  var cateid = $('#choices-single-default').val();
                  var sales_group = $('#sales_group').val();
                  $scope.fetchDatagetlegderGroup(cateid, sales_group);
               }
               $scope.onviewparty = function() {
                  $('#firstmodalcommisonparty').modal('toggle');
               };
               $scope.memKey = '';
               $scope.fetchValueRows = function(key) {
                  $scope.memKey = key;
                 
                 
                 // console.log(key);
                 let data = $scope.namesDataledgergroup;
                 data.map((item,i) => {
                  if(key == 'inproduction_total_return'){
                    key = 'production_return';
                 }
                 console.log("item[key]",item[key])
                    if (((item[key] == 0) || item[key] == undefined)) {
                       item.collapsed = true;
                       } else {
                          item.collapsed = false;

                       }
                      
                 item.values.map((el, headIndex) => {
                  if(item.key != el.sales_group_name){
                     if (((el[key]  == 0))  || el[key] == undefined) {
                       el.collapsed = true;
                       } else {
                          el.collapsed = false;

                       }
                  }else{
                     el.collapsed = true;
                  }
                   
                      
                    el.salesperson.map((el1, i) => {
                      
                       if (((el1[key]  == 0))  || el1[key] == undefined) {
                          el1.collapsed = true;
                       } else {
                          el1.collapsed = false;
                       }
                       el1['subarray'].map((el2, i) => {
                        if(key == 'production_return'){
                    key = 'inproduction_total_return';
                 }
                        if (((el2[key]  == 0))  || el2[key] == undefined) {
                           el2.collapsed = true;
                       } else {
                        el2.collapsed = false;
                       }
                       })

                   
                    })
                     
                 })
              })
              setTimeout(()=>{
                 $('.mdi').addClass('transform-icon')

              },250)

               }
               $scope.resetCollapse = function() {
                  $scope.memKey = ''
                  let data = $scope.namesDataledgergroup;
                  data.map((entry,i) => {
                     entry.collapsed = true;
                     entry['values'].map((el,index) => {

                         if(entry.key != el.sales_group_name){
                           el.collapsed = true;
                        // console.log("ref[teamGroupIndex].collapsed",el.collapsed)
                        if(el.collapsed){
                           el.salesperson.map((el) => {
                              el.collapsed = true;
                                 el['subarray'].map((el) => {
                                    el.collapsed = true;
                                 })
                              })
                        }
                        // el.collapsed = true;

                        }else{
                           el.collapsed = true;
                           el.salesperson.map((el) => {
                              el.collapsed = true;
                                 el['subarray'].map((el) => {
                                    el.collapsed = true;
                                 })
                              })
                        }
                        
                        // el.collapsed = true;
                     //  if (el.salesperson && el.salesperson[0]) {
                     //    el.salesperson.map((el1, salespIndex) => {
                     //       el1.collapsed = true;
                     //       if (el1.subarray && el1.subarray[0]) {
                     //          el1.subarray.map((el2, i) => {
                     //             el2.collapsed = true;
                     //          })
                     //       }
                     //    })
                     // }
                   })
                  })
                  $scope.namesDataledgergroup = data;
                 
                  setTimeout(()=>{
                  $('.mdi').removeClass('transform-icon')
               },250)
                  // console.log("data", data)

               }
               $scope.toggleCollapse = function(e,teamGroupIndex, headIndex, spIndex) {
                  if($scope.memKey == ''){
                    
                  console.log(teamGroupIndex,headIndex, spIndex)
                  console.log($scope.namesDataledgergroup)
                  let ref = $scope.namesDataledgergroup;
                  //salesperson's
                  // ref[headIndex].collapsed = !ref[headIndex].collapsed;
                  $(e.currentTarget).find('.mdi').toggleClass('transform-icon');
                  if(headIndex == undefined && spIndex == undefined){
                     ref[teamGroupIndex].values.map((el) => {
                        if(ref[teamGroupIndex].key != el.sales_group_name){
                           el.collapsed = !el.collapsed;
                        // console.log("ref[teamGroupIndex].collapsed",el.collapsed)
                        if(el.collapsed){
                           el.salesperson.map((el) => {
                              el.collapsed = true;
                                 el['subarray'].map((el) => {
                                    el.collapsed = true;
                                 })
                              })
                        }
                        }else{
                           el.salesperson.map((el) => {
                              el.collapsed = !el.collapsed;
                                 el['subarray'].map((el) => {
                                    el.collapsed = true;
                                 })
                              })
                        }
                     })
                  } else if(spIndex == undefined){
                     // console.log(" ref[teamGroupIndex].values", )
                     // ref[teamGroupIndex].values[headIndex].collapsed = !ref[teamGroupIndex].values[headIndex].collapsed;
                     ref[teamGroupIndex].values[headIndex]['salesperson'].map((el) => {
                        el.collapsed = !el.collapsed;
                        el['subarray'].map((el) => {
                           el.collapsed = true;
                        })
                        // if(ref[teamGroupIndex].key !=  ref[teamGroupIndex].values[headIndex].sales_group_name){
                        //    el.collapsed = !el.collapsed;
                        // }else{
                        //    el.subarray.map((el) => {
                        //    el.collapsed = !el.collapsed;
                        //    })
                        // }
                        
                     })
                  }else{
                     ref[teamGroupIndex].values[headIndex]['salesperson'][spIndex]['subarray'].map((el) => {
                        el.collapsed = !el.collapsed;
                     })
                  }
                     }
                  }
           
               $scope.fetchDatagetlegderGroup = function(cateid, sales_group){
                  $('.setload').show();
                  $scope.loading = true;
                  $scope.memKey = '';
                  var customer_id = '<?php echo $customer_id; ?>';
                  var order_status = 1;
                  var payment_mode = 1;
                  var productid = 1;
                  var fromdate = $('#from-date').val();
                  var fromto = $('#to-date').val();
                 
                  if (cateid != 0) {
                     $http.get(
                        '<?php echo base_url() ?>index.php/report/fetch_data_customer_balance_report_color?limit=10&customer_id=' +
                        customer_id + '&formdate=' + fromdate + '&page=' + $scope.currentPage +
                        '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&todate=' +
                        fromto + '&sales_group=' + sales_group + '&order_status=' + cateid +
                        '&payment_mode=' + payment_mode).success(function(data) {
                  
                     $scope.query = {};
                     $scope.queryBy = '$';
                     
                     let groupNames = [];
                     let MasterData;
                     data.map((el, headIndex) => {
                        // console.log("sales_group_name",el.sales_group_name)
                        groupNames.push(el);
                        console.log(groupNames)
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


                     console.log("MasterData", MasterData)

                     let keys =  MasterData &&Object.keys(MasterData);
                     let sample =MasterData && Object.keys(MasterData[keys[0]][0]);
                     console.log("sam",sample)
                     $scope.groupedArray = MasterData &&  Object.keys(MasterData).map((key) => {
                        let ex = {
                           key,
                           values: MasterData[key]
                        };

                        sample.forEach((head) => {

                          
                           ex[head] = 0;  

                           MasterData[key].forEach((item) => {
                              // console.log("item",item)
                              if (typeof input === 'string') {
                                         ex[head] = item[head] ? Number(item[head].replace(/[^0-9]/g, '')) + ex[head] :  ex[head];
                                          } else {
                                              ex[head]  =  item[head] ? Number(item[head])+ ex[head] :  ex[head];
                                            }
                           
                           });
                        });

                        return ex;
                     });

                     console.log("groupedArray", $scope.groupedArray)

                     let dataNew = $scope.groupedArray;
                     if(dataNew == undefined ){
                        alert("No Data Found !");
                        $('.setload').hide();
                        return;
                     }
                     $scope.totalVals = {};
                     let totalVals = $scope.totalVals;
                    
                     dataNew && dataNew.map((el0, teamGroupIndex) => {
                      
                        sample.forEach((head) => {
                           console.log("el0",el0[head])
                           if((!isNaN(el0[head])) && el0[head]){
                              totalVals[head] = totalVals[head] ? totalVals[head] + el0[head] : el0[head];
                           }
                        })
                        el0.teamGroupIndex = teamGroupIndex;
                        el0.Open_Cr = Math.round(el0.Open_Cr)
                        el0.Tot_Cr = Math.round(el0.Tot_Cr)
                        // if(el0.key == el0.values[0].sales_group_name){
                        //    el0.collapsed = true;
                        // }else{
                           el0.collapsed = true;
                        // }

                        el0.values.map((el, headIndex) => {
                          
                           el.teamGroupIndex = teamGroupIndex;
                           el.groupIndex = headIndex;
                           el.collapsed = true;
                           if(el.salesperson && el.salesperson[0]){
                              el.salesperson.map((el1, salespIndex) => {
                                 el1.collapsed = true;
                                 el1.index = salespIndex;
                                 el1.groupIndex = headIndex;
                                 el1.teamGroupIndex = teamGroupIndex;
                                 if (el1.subarray && el1.subarray[0]) {
                                    el1.subarray.map((el2, i) => {
                                       el2.collapsed = true;
                                    })
                                 }
                              })
                           }
                        })
                     })
                     console.log("$scope.totalVals",$scope.totalVals)
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
                     console.log("dataNew",dataNew)
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
                              '<?php echo base_url() ?>index.php/report/fetch_data_customer_balance_report_color?limit=10&customer_id=' +
                              customer_id + '&formdate=' + fromdate + '&page=' + $scope.currentPage +
                              '&size=' + $scope.pageSize + '&search=' + $scope.searchText +
                              '&todate=' + fromto +
                              '&sales_group=ALL&order_status=ALL&payment_mode=' + payment_mode)
                           .success(function(data) {
                              $scope.query = {};
                     $scope.queryBy = '$';
                     
                     let groupNames = [];
                     let MasterData;
                     data.map((el, headIndex) => {
                        // console.log("sales_group_name",el.sales_group_name)
                        groupNames.push(el);
                        console.log(groupNames)
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


                     console.log("MasterData", MasterData)

                     let keys =  MasterData &&Object.keys(MasterData);
                     let sample =MasterData && Object.keys(MasterData[keys[0]][0]);
                     console.log("sam",sample)
                     $scope.groupedArray = MasterData &&  Object.keys(MasterData).map((key) => {
                        let ex = {
                           key,
                           values: MasterData[key]
                        };

                        sample.forEach((head) => {

                          
                           ex[head] = 0;  

                           MasterData[key].forEach((item) => {
                              // console.log("item",item)
                              if (typeof input === 'string') {
                                         ex[head] = item[head] ? Number(item[head].replace(/[^0-9]/g, '')) + ex[head] :  ex[head];
                                          } else {
                                              ex[head]  =  item[head] ? Number(item[head])+ ex[head] :  ex[head];
                                            }
                           });
                        });

                        return ex;
                     });

                     console.log("groupedArray", $scope.groupedArray)

                     let dataNew = $scope.groupedArray;
                     if(dataNew == undefined ){
                        alert("No Data Found !");
                        $('.setload').hide();
                        return;
                     }
                     $scope.totalVals = {};
                     let totalVals = $scope.totalVals;
                    
                     dataNew && dataNew.map((el0, teamGroupIndex) => {
                      
                        sample.forEach((head) => {
                           console.log("el0",el0[head])
                           if((!isNaN(el0[head])) && el0[head]){
                              totalVals[head] = totalVals[head] ? totalVals[head] + el0[head] : el0[head];
                           }
                        })
                        el0.teamGroupIndex = teamGroupIndex;
                        el0.Open_Cr = Math.round(el0.Open_Cr)
                        el0.Tot_Cr = Math.round(el0.Tot_Cr)
                        // if(el0.key == el0.values[0].sales_group_name){
                        //    el0.collapsed = true;
                        // }else{
                           el0.collapsed = true;
                        // }

                        el0.values.map((el, headIndex) => {
                          
                           el.teamGroupIndex = teamGroupIndex;
                           el.groupIndex = headIndex;
                           el.collapsed = true;
                           if(el.salesperson && el.salesperson[0]){
                              el.salesperson.map((el1, salespIndex) => {
                                 el1.collapsed = true;
                                 el1.index = salespIndex;
                                 el1.groupIndex = headIndex;
                                 el1.teamGroupIndex = teamGroupIndex;
                                 if (el1.subarray && el1.subarray[0]) {
                                    el1.subarray.map((el2, i) => {
                                       el2.collapsed = true;
                                    })
                                 }
                              })
                           }
                        })
                     })
                     console.log("$scope.totalVals",$scope.totalVals)
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
                     console.log("dataNew",dataNew)
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

















      $scope.editData = function(customername,customer_id,amount,status,net_balance){
         
             var net_balance_set=net_balance.toLocaleString('ta-IN');
             $('#exampleModalToggleLabel_find').text(customername+' | Net Balance : '+net_balance_set);
             $('#customer_id').val(customer_id);
             //$('#amount').val(net_balance);
             $('#closeing').val(amount);
             $('#editdata').modal('toggle');
             
           
          
      };       




 $scope.bankstatementupdate = function()
   {


 var amount= $("#amount").val();

if(amount>0)
{



      if (confirm("Are you sure confirm!") == true) 
      {

          

           var amount= $("#amount").val();

           var customer_id=$('#customer_id').val();
           var notes=$('#notes').val();
           var closeing=$('#closeing').val();

            $http({
            method:"POST",
            url:"<?php echo base_url() ?>index.php/manual_journals/insertandupdate",
            data:    {
            'get_users': customer_id,
            'party_type':1,
            'credits_value_data': amount,
            'closeing': closeing,
            'notes': notes,
            'action': 'discount_request',
         }
      }).success(function(data){
           alert('Approvel Request success');
           $('#editdata').modal('toggle');
          });
      }

}
else
{
   alert('Enter The amount');
}




    };




























               

            });
         </script>
         <?php include('footer.php'); ?>
      </body>