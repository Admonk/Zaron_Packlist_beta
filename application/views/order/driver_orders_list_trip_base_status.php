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
.bgyellow {
    background: #fff38b;
}
/*.search-table-outter {
 overflow-x: scroll;
padding: 0;

 }*/
 td input[type="text"] {
    display: block;
    border: 0;
    top: 0px;
    outline: none;
 position: initial;
    left: 0;
 width: 60%;
    padding: 8px 7px;
    height: unset;
    
}
th {
    cursor: pointer;
}
  
/*th, td { min-width: 115px; }*/


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
.driver-app-details p,.driver-app-details span
{
              font-size:13px;
              font-weight:600;
}
tr.tr_nav_link {
    cursor: pointer;
}
.tr_active {
    background: antiquewhite;
    /* padding: 21px; */
    cursor: pointer;
}

h5.ng-binding {
    text-align: center;
}

.ss-show-table 
{
     font-size: 9.5px; 
  
}



.customTabFilter ul li {
    float: left;
}


i.fa.fa-shopping-cart
{
       
        font-size: 15px;
        margin: 4px 0px;
        cursor: pointer;
}



button.accordion-button {
    color: white;
     background:none;
}
.accordion-button:not(.collapsed) {
   color: white;
    background: none;
    /* -webkit-box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%); */
    /* box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%); */
}
.btn-group-xs>.btn, .btn-xs {
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
    background:#919191;
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
.driver-app-details p,.driver-app-details span
{
              font-size:13px;
              font-weight:600;
}
.formta 
{
     width: 100px;
    font-size: 11px;
    

    border: #f3f3f3 solid 1px;
   
    border-radius: 5px;
   
}
 .card-footer-bigtext span
{
              font-size:15px;
              font-weight:bold;
              color: #ff6835;
 }
          
.card-footer-bigtext i
{
              padding-right:5px;
              font-size:18px;
}
.page-content
{
              padding:0px !important;
              margin:0px !important;
}
.card-footer-bigtext button
{
              
                font-weight: 500;
                padding: 5px 20px;
}
.card-footer-bigtext button span
{
                animation: blink 1s linear infinite;
                font-size:16px;
                color:#fff;
                font-weight: 500;
}
@keyframes blink{
            0%{opacity: 0;}
            50%{opacity: .5;}
            100%{opacity: 1;}
            }

.goog-te-gadget-simple {
    border: none !important;
}
.goog-te-banner-frame {
    display: none !important;
}


@media screen and (min-device-width: 320px) and (max-device-width: 767px)  {
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

.tooltip-inner {
      /* white-space: nowrap; Prevent text from wrapping */
    /* display: inline-block; Make the text appear on the same line */
    vertical-align: middle; /* Vertically align the text in the middle */
    font-size: 16px;
    font-weight: 600;
    max-width: 1400px;
    color: #000;
    background-color:#e6e6e6!important;
    padding-right: 15px;
    padding-left: 15px;
    padding-top: 8px;
    padding-bottom: 8px;
}
.bs-tooltip-auto[data-popper-placement^=bottom] .tooltip-arrow::before, .bs-tooltip-bottom .tooltip-arrow::before {
    bottom: -1px;
    border-width: 0 0.4rem 0.4rem;
    border-bottom-color: #e8e8e8;
}
.checkdata_1_hide,.checkdata_2_hide,.checkdata_3_hide,.checkdata_4_hide,.checkdata_5_hide,.checkdata_6_hide,.checkdata_7_hide,.checkdata_8_hide,.checkdata_9_hide,.checkdata_10_hide,.checkdata_11_hide,.checkdata_12_hide,.checkdata_13_hide,.checkdata_14_hide,.checkdata_15_hide
{
     display: none;
}
</style>

<?php

$checked1="checked";
$checked2="checked";
$checked3="checked";
$checked4="checked";
$checked5="checked";
$checked6="checked";
$checked7="checked";
$checked8="checked";
$checked9="checked";
$checked10="checked";
$checked11="checked";
$checked12="checked";
$checked13="checked";
$checked14="checked";
$checked15="checked";
           
$checkdata_1_hide="";
$checkdata_2_hide="";
$checkdata_3_hide="";
$checkdata_4_hide="";
$checkdata_5_hide="";
$checkdata_6_hide="";
$checkdata_7_hide="";
$checkdata_8_hide="";
$checkdata_9_hide="";
$checkdata_10_hide="";
$checkdata_11_hide="";
$checkdata_12_hide="";
$checkdata_13_hide="";
$checkdata_14_hide=""; 
$checkdata_15_hide="";

if(count($table_cust_transport)>0)
{
  
  
  foreach($table_cust_transport as $vl)
  {
      
      $label_id=$vl->label_id;
      $status=$vl->status;
      
      
      if($label_id==1)
      {
          if($status==0)
          {
              $checkdata_1_hide="checkdata_1_hide";
              $checked1="";
          }
      }
      
      if($label_id==2)
      {
          if($status==0)
          {
              $checkdata_2_hide="checkdata_2_hide";
               $checked2="";
          }
      }
      
      if($label_id==3)
      {
          if($status==0)
          {
              $checkdata_3_hide="checkdata_3_hide";
               $checked3="";
          }
      }
      
      if($label_id==4)
      {
          if($status==0)
          {
              $checkdata_4_hide="checkdata_4_hide";
               $checked4="";
          }
      }
      
      if($label_id==5)
      {
          if($status==0)
          {
              $checkdata_5_hide="checkdata_5_hide";
               $checked5="";
          }
      }
      
      if($label_id==6)
      {
          if($status==0)
          {
              $checkdata_6_hide="checkdata_6_hide";
               $checked6="";
          }
      }
      
      if($label_id==7)
      {
          if($status==0)
          {
              $checkdata_7_hide="checkdata_7_hide";
               $checked7="";
          }
      }
      
      if($label_id==8)
      {
          if($status==0)
          {
              $checkdata_8_hide="checkdata_8_hide";
               $checked8="";
          }
      }
      
      if($label_id==9)
      {
          if($status==0)
          {
              $checkdata_9_hide="checkdata_9_hide";
               $checked9="";
          }
      }
      
      if($label_id==10)
      {
          if($status==0)
          {
              $checkdata_10_hide="checkdata_10_hide";
               $checked10="";
          }
      }
      
      if($label_id==11)
      {
          if($status==0)
          {
              $checkdata_11_hide="checkdata_11_hide";
               $checked11="";
          }
      }
      
      if($label_id==12)
      {
          if($status==0)
          {
              $checkdata_12_hide="checkdata_12_hide";
               $checked12="";
          }
      }
      
      if($label_id==13)
      {
          if($status==0)
          {
              $checkdata_13_hide="checkdata_13_hide";
               $checked13="";
          }
      }
      
     
      
      if($label_id==14)
      {
          if($status==0)
          {
               $checkdata_14_hide="checkdata_14_hide";
               $checked14="";
          }
      }
      
       if($label_id==15)
      {
          if($status==0)
          {
               $checkdata_15_hide="checkdata_15_hide";
               $checked15="";
          }
      }
      
  }
  
   
}



?>


<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>





  <div id="layout-wrapper">
     
         <div class="main-content">
            <div class="page-content">
               <div class="container-fluid">
                 
                 
                 
                  <!-- start page title -->
                  <div class="row">
                     <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                           <h4 class="mb-sm-0 font-size-18"><?php echo $delivery_text; ?>  Trip Orders</h4>
                           <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item"><a href="javascript: void(0);">Trips</a></li>
                                 <li class="breadcrumb-item active">Driver Trip Orders </li>
                              </ol>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end page title -->
                 
                 
                 <div class="container-fluid">
                  <div class="row">
                   
                        <div class="card">
                        <div class="card-body">


                     

                       <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                           <h4 class="mb-sm-0 font-size-18">Driver Trip Management</h4>
                           <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item"><a href="javascript: void(0);">Trips</a></li>
                                 <li class="breadcrumb-item active">Trip Orders </li>
                              </ol>
                           </div>
                        </div>
                        <div class="row">
                      <div class="col-md-3 d-none">
                        <table class="table">
                          <tr>
                            <th>No</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle No</th>
                            <th>Type</th>
                          </tr>
                                    <?php
                                    $i=1;
                                    $vehicle_id=$_GET['vehicle_id'];
                                    foreach($vehicle as $rs)
                                    {
                                       
                                        $b="";
                                        if($i==1)
                                        {
                                           
                                            $b="tr_active";
                                            $vehicle_id=$rs->vehicle_id;
                                            $v_number=$rs->vehicle_number;
                                            $v_name=$rs->vehicle_name.' '.$rs->vehicle_type;
                                        }
                                        ?>
    <tr class="tr_nav_link tr_<?php echo $i; ?> <?php echo $b; ?>" ng-click="routeassignOrderclick('<?php echo $rs->vehicle_id; ?>','<?php echo $i; ?>','<?php echo $rs->countnumber; ?>','<?php echo $rs->vehicle_number; ?>','<?php echo $rs->vehicle_name; ?>')">

        <td><?php echo $i; ?></td>
        <td><?php echo $rs->vehicle_name; ?> </td>
        <td><?php echo $rs->vehicle_number; ?></td>
        <td><?php echo $rs->vehicle_type; ?> </td>

       
  </tr> 
                                <?php
                                        $i++;
                                    }
                                    
                                    ?>
                                    
                        </table>
                      </div>

                       <div class="col-md-12">


                                                            <input type="hidden" id="nextnumber" value="0">   
                                                            <input type="hidden" id="prenumber" value="3">  
                                                            <input type="hidden" id="pageSize" value="6">  
                                                            <input type="hidden" id="order_base" value="3">
                                                            <input type="hidden" id="route_id" value="0">
                                                            <input type="hidden" id="assign" value="12">

                         

                          <div class="row" style="margin-bottom: 10px;">                                    
                         
                          <div class="col-sm-3">
                          <label>From Date: </label><input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="from_date" ng-model="from_date" ng-change="DateFilter()">
                          </div>
                          
                           <div class="col-sm-3">
                           <label>To Date:</label><input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="to_date" ng-model="to_date" ng-change="DateFilter()">
                           </div>
                           
                           
                         <div class="col-sm-3">
                        <div id="example_filter" class="dataTables_filter">
                            <label>Search:</label><input type="search" class="form-control input-sm ng-pristine ng-untouched ng-valid" placeholder="Order No,Trip ID" aria-controls="example" ng-model="searchText" ng-change="searchTextChanged()">
                        </div>
                        </div>

                             <div class="col-sm-3">
                        <div id="example_filter" class="dataTables_filter" >
                            <label>Status :</label>

                            <select class="form-control" ng-model="searchText_status" ng-change="searchTextChanged_status()">

                              <option value="0">Pending</option>
                              <option value="1">Completed</option>
                              <option value="ALL">ALL</option>
                              
                            </select>



                        </div>
                    </div>

                       </div>

                       <div class="row">
                        <div class="col-md-9 text-center">
                            <h5 class="trip-detail">
                                <span id="viewtext"></span> TRIP DETAIL 
              <a type="" class="tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title=" Assign Trip >> Sequence >>  Dispatch Loaded  >>  Driver PickUp  >>  Trip Started  >>  Payment Collection  >>  Trip End  >>  Reconcilation" style="color: #000;">
                                <i class="fa fa-info-circle"></i></a>
                            </h5>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end align-items-center">
                        <button type="button" ng-click="onviewparty()" class="btn btn-soft-danger  waves-effect waves-light" style="margin-right: 5px;">Customize table</button>
                         <h5 style="text-align:right">Total Weight: {{weighttotal}}</h5>

                        </div>


                       </div>





















       <div class="row"  >
                            
                      
                                      

                                         
<div class="search-table-outter wrapper">
   <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                      
                                         <table class="table ss-show-table">
                                           
                                          <tr  style="background: #000;color: #fff;">
                                             <th ng-click="sortBy('no')" >#<i class="fa fa-sort" aria-hidden="true"></i></th>

                                            <th ng-click="sortBy('vehicle_number')" >VEHICLE NAME & NO  <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            <?php
                                            if($vehicle_id>0)
                                            {
                                              ?>


                                              <th ng-click="sortBy('trip_id')" >TRIP ID <i class="fa fa-sort" aria-hidden="true"></i></th>

                                              <?php
                                            }
                                            ?>
                                            
                                            <th class=" checkdata_1 <?php echo $checkdata_1_hide; ?>" ng-click="sortBy('assign_date')">DELIVERY DATE <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            <th class=" checkdata_2 <?php echo $checkdata_2_hide; ?>" ng-click="sortBy('loc_name')">LOCALITY  <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            <th class=" checkdata_3 <?php echo $checkdata_3_hide; ?>" ng-click="sortBy('driver_name')">DRIVER & NO  <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            <th class=" checkdata_4 <?php echo $checkdata_4_hide; ?>" ng-click="sortBy('trip_status')">TRIP STATUS  <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            <th ng-click="sortBy('start_reading')" class=" checkdata_5 <?php echo $checkdata_5_hide; ?>">START KM  <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            <th class=" checkdata_6 <?php echo $checkdata_6_hide; ?>" ng-click="sortBy('km_reading_end')">END KM  <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            <th class=" checkdata_7 <?php echo $checkdata_7_hide; ?>" ng-click="sortBy('totalkm')">TRIP KM <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            <th class=" checkdata_8 <?php echo $checkdata_8_hide; ?>" ng-click="sortBy('lengeth_total')">MAX.LEN  <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            <th class=" checkdata_9 <?php echo $checkdata_9_hide; ?>" ng-click="sortBy('weighttotal')">TOT.WT   <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            <th class=" checkdata_10 <?php echo $checkdata_10_hide; ?>" ng-click="sortBy('bill_total')">BILL AMT <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            <th class=" checkdata_11 <?php echo $checkdata_11_hide; ?>" ng-click="sortBy('load_amt')">LOAD AMT <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            <th class=" checkdata_12 <?php echo $checkdata_12_hide; ?>" ng-click="sortBy('collectable_amount_tot')">COLA. AMT <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            <th class=" checkdata_13 <?php echo $checkdata_13_hide; ?>" ng-click="sortBy('collected_amount')">COL. AMT <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            <th class=" checkdata_14 <?php echo $checkdata_14_hide; ?>" ng-click="sortBy('diff_amt')">DIFF AMT <i class="fa fa-sort" aria-hidden="true"></i></th>
                                           <th class=" checkdata_15 <?php echo $checkdata_15_hide; ?>" ng-click="sortBy('re_status')">RECONCI. STATUS <i class="fa fa-sort" aria-hidden="true"></i></th>

                                           <th class=" checkdata_15 <?php echo $checkdata_15_hide; ?>" ng-click="sortBy('sq_status')">SQ. STATUS <i class="fa fa-sort" aria-hidden="true"></i></th>

                                          </tr>


                                          <tr>

                                           <td colspan="15"><loading></loading></td>

                                          </tr>

 
                          <tbody ng-repeat="namesd in namesDataassign | filter:query | orderBy:orderKey:reverse" id="heading{{namesd.trip_id}}" class="{{namesd.collapsed}}"  >
                                          <tr style="cursor: pointer;font-weight: 800;" class="bgnone {{namesd.bgnone}}">


                                           <td><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.no}}</a></td>


                                            <td><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.vehicle_number}}</a></td>

                                            <!-- <td><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.vehicle_number}}</a></td> -->

                                             <?php
                                            if($vehicle_id>0)
                                            {
                                              ?>


                                             <td><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.trip_id}}</a></td>


                                              <?php
                                            }
                                            ?>
                                            
                                            


                                            <td class=" checkdata_1 <?php echo $checkdata_1_hide; ?>"><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.assign_date}}</a></td>
                                            <td class=" checkdata_2 <?php echo $checkdata_2_hide; ?>"><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.loc_name}}</a></td>
                                            <td class=" checkdata_3 <?php echo $checkdata_3_hide; ?>"><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.driver_name}} {{namesd.driver_phone}}</a></td>
                                             <td class=" checkdata_4 <?php echo $checkdata_4_hide; ?>"><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.trip_status}}</a></td>
                                            <td class=" checkdata_5 <?php echo $checkdata_5_hide; ?>"><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.start_reading}}</a></td>
                                            <td class=" checkdata_6 <?php echo $checkdata_6_hide; ?> {{namesd.emptycolor}}"><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.km_reading_end}}</a></td>
                                            <td class=" checkdata_7 <?php echo $checkdata_7_hide; ?>"><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.totalkm}}</a></td>
                                             <td class=" checkdata_8 <?php echo $checkdata_8_hide; ?>"><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.lengeth_total}}</a></td>
                                            <td class=" checkdata_9 <?php echo $checkdata_9_hide; ?>"><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.weighttotal}}</a></td>
                                            <td class=" checkdata_10 <?php echo $checkdata_10_hide; ?>"><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.bill_total | indianCurrency}}</a></td>
                                            <td class=" checkdata_11 <?php echo $checkdata_11_hide; ?>"><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.load_amt | indianCurrency}}</a></td>
                                            <td class=" checkdata_12 <?php echo $checkdata_12_hide; ?>"><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.collectable_amount_tot | indianCurrency}}</a></td>
                                            <td class=" checkdata_13 <?php echo $checkdata_13_hide; ?>"><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.collected_amount | indianCurrency}}</a></td>
                                            <td class=" checkdata_14 <?php echo $checkdata_14_hide; ?>"><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.diff_amt | indianCurrency}}</a></td>
                                            <td class=" checkdata_15 <?php echo $checkdata_15_hide; ?>"><a href="javascript:void(0);" ng-click="viewOrder(namesd.vehicle_id,namesd.trip_id)">{{namesd.re_status}}</a></td>



                                             <td class=" checkdata_15 <?php echo $checkdata_15_hide; ?>">


                <a herf="#" ng-click="statusChange_seq(namesd.trip_id)"  ng-if="namesd.seq_status==0">Save Sequence</a>
 <a herf="#"  ng-if="namesd.seq_status==1" style="color: green;">Sequence Completed</a>

                                            </td>
                                       
                                          </tr>




                                          <tr>
                                          <td colspan="30">
                                            
<div  class="row collapse">

<div class="changeColDyn col-md-6" ng-repeat="names in namesd.subarray"  >


                              <div class="card task-box" id="uptask-2">
                                 <div class="card-body p-0">
                                    <!-- end dropdown -->
                                    <div class="p-3 {{names.color}}">
                                       <h5 class="font-size-14 mb-0" style="text-transform: uppercase;"><a href="javascript: void(0);" class="text-dark" id="task-name" style="display: flex;">  <input type="text" value="{{names.no}}" style="width: 70px;margin: -10px 8px;text-align: center;" class="setsort_id" id="sort_id_{{names.id}}" ng-keyup="sortidchange(names.id)"> <i class="mdi mdi-play font-size-13"></i> {{names.company_name}} ({{names.order_no}})</a></h5>
                                    </div>


                                    <table class="table">

                                      <tr>

                                        <th>CONTACT   : </th><th>{{names.name}} {{names.phone}}</th>
                                        <th>BILL. AMOUNT :</th><th>{{names.bill_amount | number}}</th>
                                      
                                      <tr>

                                      <tr>
                                        <th>ADDRESS   : </th><th style="width: 35%;">{{names.address}}</th>
                                         <th>LOAD AMOUNT :</th><th>{{names.loadamount | number}}</th>
                                      <tr>
                                      
                                       <tr>
                                        <th>LOCALITY   : </th><th>{{names.loc_name}}</th>
                                        <th>COLL. AMOUNT :</th><th>{{names.driver_recived_payment | number}}</th>
                                       <tr> 

                                       <tr>
                                        <th>ROUTE   : </th><th>{{names.route_name}}</th>
                                        <th>DIFF. AMOUNT :</th><th>{{names.diff | number}}</th>
                                      <tr> 

                                       <tr>
                                        <th>SALESMAN   : </th><th>{{names.sales_name}} | {{names.sales_phone}}</th>
                                        <th>DELIVERY :</th><th>{{names.delivery_mode}}</th>
                                      <tr>
                                       <tr>
                                        <th>MAX L   : </th><th>{{names.lengeth}} <i class="fa fa-info-circle" aria-hidden="true" title="Product Type" ng-click="showProducttype(names.id,names.order_no)"></i></th>
                                        <th>MAX W :</th><th>{{names.weight}}</th>
                                      <tr>  


                                      <tr>
                                        <th>ORDER DATE  : </th><th>{{names.create_date}}</th>
                                        <th>DELIVERY DATE :</th><th>{{names.delivery_date}}</th>
                                      <tr>  



                                      <tr ng-if="names.start_reading>0">
                                        <th ng-if="names.start_reading>0">START KM   : </th><th>{{names.start_reading}} | {{names.trip_start_date}} {{names.trip_start_time}} </th>
                                        <th ng-if="names.km_reading_end>0">END KM :</th><th>{{names.km_reading_end}} | {{names.trip_end_date}} {{names.trip_end_time}}</th>
                                      <tr> 

                                      <tr ng-if="names.start_reading>0">
                                        <th>TOTAL KM  : </th><th>{{names.totkm}}</th>
                                        <th>PAYMENT MODE : </th><th>{{names.payment_mode}}</th>
                                      <tr> 

                                       <tr>
                                       
                                        <th>STATUS : </th>
                                        <th>
                                                 {{names.reason}}


                                                 <span ng-if="names.rescheduling_delivery=='Rescheduling'">
                                                  <small><b>Rescheduling Date : {{ names.rescheduling_date }}</b></small>
                                                  <br>
                                                  <small><b>Remarks : {{ names.rescheduling_remarks }}</b></small>
                                                 </span>
                                      
 

                                        </th>

                                        <th colspan="2">


                                            <span ng-if="names.assign_status==12">
                                                <a href="<?php echo base_url(); ?>index.php/order/pickup_orders_list_view?id={{names.id}}&driver_pickip=1" class="btn btn-danger waves-effect waves-light float-end">
                                                <i class="fas fa-truck font-size-18 align-middle me-2"></i> <span>Pickup</span>
                                                </a>
                                           </span>


                                            <span ng-if="names.assign_status==2 || names.assign_status==8">  
                                                <a href="<?php echo base_url(); ?>index.php/order/driver_orders_list_view?id={{names.id}}" class="btn btn-primary float-end">
                                                <i class="fas fa-eye font-size-18 align-middle me-2"></i> View
                                                </a>
                                            </span>

                                             <span ng-if="names.assign_status==1">
                                               <div ng-if="names.first_sort_id==names.no">
                                                      
                                                      <button type="button" class="btn btn-outline-success waves-effect waves-light float-end" ng-click="statusChange(names.id)">
                                                      <i class="fas fa-truck font-size-14 align-middle me-3"></i> Start
                                                      </button>
                                                      <input type="text" maxlength="6" id="start_reading_{{names.id}}" class="formta" placeholder="Start Reading">
                                                </div>
                                           </span>
                                           
                                           


                                     

                                        </th> 
                                       <tr>     
  

                                      
                                    </table>
                                   
                                    
                                 </div>

                                   </div>







</div>
</div>



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

                        <!-- end card -->
                     </div>

                     </div>

                  <!-- end row -->
               </div>
               <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <!-- Modal -->
         </div>
         <!-- end main content-->
      </div>
      <!-- END layout-wrapper -->
     
   

<div class="modal fade" id="producttype" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Order Product Types {{namesordernoVal}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                            
                                                            <div class="form-group row" ng-repeat="namesp in namesProducttype">
                                                                <label class="col-sm-12 col-form-label">{{namesp.no}}. {{namesp.categories_name}}</label>
                                                                </div>
                                                          
                                                              
                                                              
                                                             
                                                            
                                                           
                                                   
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>








<div class="modal fade" id="producttypeview" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog  modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Order Product Details {{namesordernoVal}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                         
                                                              <div class="table-responsive" >
                                                                                            <table class="table mb-0" >
                                                    
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                    <th>S No</th>
                                                                                                    <th>Product</th>
                                                                                                    <th >Basic Price (INR)</th>
                                                                                                    <th >Quantity</th>
                                                                                                    <th >Amount</th>
                                                                                                    
                                                                                                   </tr>
                                                                                                </thead>
                                                                                                <tbody >
                                                                                                 <tr ng-repeat="name in namesData|orderBy:column:reverse">
                                                                                                    <td >{{name.no}}</td>
                                                                                                    <td>
                                                                                                        <div class="item-desc-1">
                                                                                                            <span>{{name.product_name_tab}}</span>
                                                                                                            <small>{{name.description}}</small>
                                                                                                            
                                                                                                        </div>
                                                                                                    </td>
                                                                                                  
                                                                                                    <td >{{name.rate_tab}}  </td>
                                                                                                    <td >{{name.qty_tab}} 
                                                                                                   
                                                                                                    <small ng-if="approx_id==1">(approx.)</small>
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    </td>
                                                                                                    <td >Rs. {{name.amount_tab}}</td>
                                                                                                    <td  style="width:15%;" ng-if="name.paricel_mode==1" >{{name.addresstopariel}}</td>
                                                                                                </tr>
                                                                                                
                                                                                                
                                                                                                <!--EDIT VAL-->
                                                                                                
                                                                                                
                                                                                                
                                                                                                <tr>
                                                                                                    <td colspan="4" class="text-end">SubTotal</td>
                                                                                                    <td class="text-right">Rs. {{fulltotal}} </td>
                                                                                                </tr>
                                                                                                
                                                                                                <tr ng-if="tcsamount>0">
                                                                                                    <td colspan="4" class="text-end">TCS (+)</td>
                                                                                                    <td class="text-right">Rs. {{tcsamount}} </td>
                                                                                                </tr>
                                                                                                
                                                                                              
                                                                                                <tr>
                                                                                                    <td colspan="4" class="text-end">Discount</td>
                                                                                                    <td class="text-right">Rs. {{discounttotal}} </td>
                                                                                                </tr>
                                                                                                <tr ng-if="roundoff>0">
                                                                                                    <td colspan="4" class="text-end">Round off</td>
                                                                                                    <td class="text-right">Rs. {{roundoff}} ({{roundoffstatus}}) </td>
                                                                                                </tr>



                                                                                                <tr>
                                                                                                    <td colspan="4" class="text-end fw-bold">Grand Total</td>
                                                                                                    <td class="text-right fw-bold">Rs. {{discountfulltotal}} </td>
                                                                                                </tr>
                                                                                                
                                                                                                
                                                                                                
                                                                                                
                                                                                                
                                                                                                
                                                                                                
                                                                                                
                                                                                                
                                                                                                
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>  
                                                              
                                                             
                                                            
                                                           
                                                   
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>


<div class="modal fade" id="firstmodalcustomisetable" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Customize table</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input Uncheck" value="1" <?php echo $checked1; ?>
                                    type="checkbox" id="flexSwitchCheckDefault1">
                                <label class="form-check-label" for="flexSwitchCheckDefault1"> DELIVERY DATE </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input Uncheck" value="2" <?php echo $checked2; ?>
                                    type="checkbox" id="flexSwitchCheckDefault2">
                                <label class="form-check-label" for="flexSwitchCheckDefault2"> LOCALITY </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input Uncheck" value="3" <?php echo $checked3; ?>
                                    type="checkbox" id="flexSwitchCheckDefault3">
                                <label class="form-check-label" for="flexSwitchCheckDefault3"> DRIVER & NO </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input Uncheck" value="4" <?php echo $checked4; ?>
                                    type="checkbox" id="flexSwitchCheckDefault4">
                                <label class="form-check-label" for="flexSwitchCheckDefault4"> TRIP STATUS </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input Uncheck" value="5" <?php echo $checked5; ?>
                                    type="checkbox" id="flexSwitchCheckDefault5">
                                <label class="form-check-label" for="flexSwitchCheckDefault5">START KM </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input Uncheck" value="6" <?php echo $checked6; ?>
                                    type="checkbox" id="flexSwitchCheckDefault6">
                                <label class="form-check-label" for="flexSwitchCheckDefault6">END KM</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input Uncheck" value="7" <?php echo $checked7; ?>
                                    type="checkbox" id="flexSwitchCheckDefault7">
                                <label class="form-check-label" for="flexSwitchCheckDefault7">TRIP KM</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input Uncheck" value="8" <?php echo $checked8; ?>
                                    type="checkbox" id="flexSwitchCheckDefault8">
                                <label class="form-check-label" for="flexSwitchCheckDefault8">MAX.LEN</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input Uncheck" value="9" <?php echo $checked9; ?>
                                    type="checkbox" id="flexSwitchCheckDefault9">
                                <label class="form-check-label" for="flexSwitchCheckDefault9">TOT.WT</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input Uncheck" value="10" <?php echo $checked10; ?>
                                    type="checkbox" id="flexSwitchCheckDefault10">
                                <label class="form-check-label" for="flexSwitchCheckDefault10">BILL AMT</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input Uncheck" value="11" <?php echo $checked11; ?>
                                    type="checkbox" id="flexSwitchCheckDefault11">
                                <label class="form-check-label" for="flexSwitchCheckDefault14">LOAD AMT</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input Uncheck" value="12" <?php echo $checked12; ?>
                                    type="checkbox" id="flexSwitchCheckDefault12">
                                <label class="form-check-label" for="flexSwitchCheckDefault11">COLA. AMT</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input Uncheck" value="13" <?php echo $checked13; ?>
                                    type="checkbox" id="flexSwitchCheckDefault13">
                                <label class="form-check-label" for="flexSwitchCheckDefault12">COL AMT</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input Uncheck" value="14" <?php echo $checked14; ?>
                                    type="checkbox" id="flexSwitchCheckDefault14">
                                <label class="form-check-label" for="flexSwitchCheckDefault13">DIFF AMT</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input Uncheck" value="15" <?php echo $checked15; ?>
                                    type="checkbox" id="flexSwitchCheckDefault15">
                                <label class="form-check-label" for="flexSwitchCheckDefault13">RECONCI. STATUS</label>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>



   
   <input type="hidden" id="vehicle_id" value="<?php echo $vehicle_id_data; ?>">
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

app.directive('loading', function () {
      return {
        restrict: 'E',
        replace:true,
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

app.filter('indianCurrency', function () {
    return function (input) {
        if (isNaN(input)) return input;
        return input.toLocaleString('en-IN', { maximumFractionDigits: 0 });
    };
});

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;


 
 
    $scope.namesDataassign = []; // Your data here
    $scope.orderKey = ''; // Default sorting column
    $scope.reverse = false; // Default sorting direction
 
    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 3;
    $scope.searchText = '';
    
    $scope.tablename='orders_process';
    getData();
    
    $scope.searchTextChanged = function() {
        $scope.currentPage = 1;
        getData();
    }

         $scope.searchTextChanged_status = function() {
        $scope.currentPage = 1;
        getData();
    }
    
    
    
    $scope.sortBy = function (key) {
        if ($scope.orderKey === key) {
            $scope.reverse = !$scope.reverse;
        } else {
            $scope.orderKey = key;
            $scope.reverse = false;
        }
    };
    
    $scope.onviewparty = function(){
     $('#firstmodalcustomisetable').modal('toggle');
    
};
    
    
    
    
    
    
    
    
    $scope.onNext = function(currentPage,pageSize){
     
     
      var nextnumber= parseInt($('#nextnumber').val());
      var pageSize= parseInt($('#pageSize').val());
     
      var currentPage=nextnumber+pageSize;
      
       $('#nextnumber').val(currentPage);
       $('#prenumber').val(currentPage);
      
        getDataPage(currentPage,pageSize);
      
      
 };



$scope.onPre = function(currentPage,pageSize){
     
     
       var nextnumber= parseInt($('#prenumber').val());
       var pageSize= parseInt($('#pageSize').val());
       var currentPage=nextnumber-pageSize;
      
       $('#prenumber').val(currentPage);
       $('#nextnumber').val(currentPage);
       getDataPage(currentPage,pageSize);
      
      
 };



$scope.DateFilter = function(){
    
    getData();
    
};








function getDataPage(currentPage,pageSize) {
         
     
            
            
        var order_base = $('#order_base').val();
        var route_id = $('#route_id').val();
        var assign = $('#assign').val();
        var vehicle_id = $('#vehicle_id').val();

        var delivery_status = '<?php echo $delivery_status; ?>';
      
      $scope.loading = true;
     $('#hidedata').hide();
      
         var from_date = $('#from_date').val();
       var to_date = $('#to_date').val();
      

     $http.get('<?php echo base_url() ?>index.php/order_second/fetch_data_table_transpot_assign_data_driver_list_limit?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&route_id='+route_id+'&assaignstates='+assign+'&vehicle_id='+vehicle_id+'&from_date='+from_date+'&to_date='+to_date+'&delivery_status='+delivery_status)
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
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            
            
            angular.forEach(data.PortalActivity, function(temp)
            {
             
             
               $scope.namesDataassign.push(temp);
                
                
            });
            
           
            
        });
        
        
        
        
        
    }





  $scope.from_date = new Date();
  $scope.to_date = new Date();




$scope.viewOrder = function(base_id,trip_id){
    
  var from_date = $('#from_date').val();
var delivery_status = '<?php echo $delivery_status; ?>';

  window.open(
  '<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?from_date='+from_date+'&vehicle_id='+base_id+'&trip_id='+trip_id+'&delivery_status='+delivery_status,
  '_blank' // <- This is what makes it open in a new window.
 );

    
};


$scope.searchText_status=0;
     
   function getData()
   {
       
      var order_base = $('#order_base').val();
      var route_id = $('#route_id').val();
      var assign = $('#assign').val();
      var vehicle_id = $('#vehicle_id').val();
       var pageSize = $('#pageSize').val();

       var from_date = $('#from_date').val();
       var to_date = $('#to_date').val();
       var delivery_status = '<?php echo $delivery_status; ?>';
      $scope.loading = true;
     $('#hidedata').hide();

        if($scope.searchText_status==undefined) 
        {
          var status = 0;
        }
        else
        {
          var status = $scope.searchText_status;
        }
      
      
     $http.get('<?php echo base_url() ?>index.php/order_second/fetch_data_table_transpot_assign_data_driver_list_limit?page=' + $scope.currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&route_id='+route_id+'&assaignstates='+assign+'&vehicle_id='+vehicle_id+'&from_date='+from_date+'&to_date='+to_date+'&delivery_status='+delivery_status+'&status='+status)
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
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            
            
            angular.forEach(data.PortalActivity, function(temp)
            {
             
             
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
  
  
  
  
  $scope.statusChange_seq = function(trip_id){
    
    
    
    
 
        
     
      
       
        
                      $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                        data:{'trip_id':trip_id, 'action':'statusChange_seq','tablenamemain':'orders_process'}
                      }).success(function(data)
                      {

                        $scope.success = false;
                        $scope.error = false;
                        
                         alert('Sequence Updated');
                         getData();
                         
                         
                         
                      }); 
      
    
      
      
    
    
    
};
  
  
  
  
  
  
 $scope.routeOrder = function(id,name) {
  
  
   
   $scope.fetchRouteorderassignorder('orders_process',3,id,1);
   $scope.route_name = name;
  
  
 }
  
  
  
  $scope.statuslable="Assigned Orders";
  
   $scope.getorders = function()
   {
  

      var vehicle_id=$scope.v_id;
      $('#vehicle_id').val(vehicle_id);
   
  
       $scope.currentPage = 1;
       getData();
      

   }
  
  
 $scope.routeassignOrderclick = function(vehicle_id,active,count,v_name,v_number) {
  
   $('#hidedata').hide();
   
   
      $('#vehicle_id').val(vehicle_id);
      //$('#pageSize').val(count);
      
   
      $('.tr_nav_link').removeClass('tr_active');
  
      $('.tr_'+active).addClass('tr_active');

      $('#viewtext').text(v_name+' | '+v_number);
  
      $scope.currentPage = 1;
      getData();
      $scope.getcount(tablename);

 }
  

 $scope.fetchRoute = function(){
    $http.get('<?php echo base_url() ?>index.php/order/group_gy_route').success(function(data){
      $scope.namesRoute = data;
    });
  };


$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
       
         $scope.fetchRouteorderassignorder('orders_process',3,0,1);
      }); 
    }
};

$scope.cancelData = function(id){
    if(confirm("Are you sure you want to Cancel it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Cancelfinance','tablename':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
       
         $scope.fetchRouteorderassignorder('orders_process',3,0,1);
      }); 
    }
};







$scope.statusChangepickup = function(trip_id,vehicle_id){
    
    
    
    
    
    
    if(confirm("Are you sure you want to Pickup All?"))
    {
        
        
       
        
                      $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                        data:{'action':'statuschangepickupall','trip_id':trip_id,'tablenamemain':'orders_process'}
                      }).success(function(data){
                    
                        
                        
                        
                             $scope.currentPage = 1;
                             getData();
                         
                         
                         
                         
                      }); 
      
      
      
      
      
      
    }
    
    
    
};

$scope.statusChange = function(id){
    
    
    
    
    
    
    if(confirm("Are you sure you want to Start?"))
    {
        
        
        var start_reading=$('#start_reading_'+id).val();
        
        
        if(start_reading!='')
        {
            
       
        
                      $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                        data:{'id':id, 'action':'statuschange','start_reading':start_reading,'tablenamemain':'orders_process'}
                      }).success(function(data){
                        $scope.success = false;
                        $scope.error = false;
                        
                        
                         window.location.replace("<?php echo base_url(); ?>index.php/order/driver_orders_list_view?id="+id);
                
                       
                         $scope.fetchRouteorderassignorder('orders_process',3,0,1);
                         
                         
                         
                         
                      }); 
      
        }
        else
        {
            alert('Please Fill Start Reading..');
        }
      
      
      
      
      
      
      
    }
    
    
    
};





$scope.assign = function () {


      var sortingInput = $(".sortingInput");
      var sortingInput_value = [];
      for(var i = 0; i < sortingInput.length; i++){
          
           sortingInput_value.push($(sortingInput[i]).val());
         
      }
      var sortingInput_data= sortingInput_value.join("|");
      
     
     
      var orderid = $(".orderid");
      var orderid_value = [];
      for(var i = 0; i < orderid.length; i++){
          
           orderid_value.push($(orderid[i]).val());
         
      }
      var orderid_data= orderid_value.join("|");
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/orderassign",
      data:{'sortingInput_data':sortingInput_data,'orderid_data':orderid_data,'tablenamemain':'orders_process'}
    }).success(function(data){
       
      alert('Order Assined');
      
      $scope.fetchRouteorderassignorder('orders_process',3,id,1);
     
    });
     
      

}


$scope.showProducttype = function (orderid,orderno) {
    
        $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/fetch_single_data_product_type",
        data:{'orderid':orderid}
        }).success(function(data){
    
          $scope.namesProducttype = data;
          $scope.namesordernoVal = orderno;
          $('#producttype').modal('toggle');
    
        });
    
};




$scope.showProducttypeview = function (orderid,orderno) 
{

          $scope.namesordernoVal = orderno;

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_delivery_data_driver_view?order_id='+orderid+'&tablenamemain=<?php echo 'orders_process'; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert=1').success(function(data){
      $scope.namesData = data;
    });



    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_totaldel_driver_view?order_id="+orderid,
      data:{'action':'fetch_single_data','tablenamemain':'orders_process','tablename_sub':'order_product_list_process'}
      }).success(function(data){

       $scope.fulltotal = data.fulltotal;
       $scope.roundoff = data.roundoff;
        $scope.roundoffstatus = data.roundoffstatus;
       
       
       $scope.order_no_id = data.order_no_id;
       $scope.start_reading = data.start_reading;
       
      $scope.last_trip_sort_id = data.last_trip_sort_id;
      $scope.sort_id = data.sort_id;
      $scope.trip_id = data.trip_id;
      
       
       if(data.user_id)
       {
            $scope.user_id = data.user_id;
       }
       if(data.reason)
       {
            $scope.reason = data.reason;
       }
       
       if(data.salesphone)
       {
            $scope.salesphone = data.salesphone;
       }
       
       
       if(data.salesname)
       {
            $scope.salesname = data.salesname;
       }
       
                               
      
       $scope.totalitems = data.totalitems;
       $scope.discounttotal = data.discount;
       $scope.discountfulltotal = data.discountfulltotal;
       $scope.Meter_to_Sqr_feet = data.Meter_to_Sqr_feet;
       $scope.return_amount = data.return_amount;
     
       $scope.fullqty = data.fullqty;
       $scope.FACT = data.FACT;
       $scope.UNIT = data.UNIT;
       $scope.NOS = data.NOS;
     
    });
    

    $('#producttypeview').modal('toggle');
       
    
};







    $scope.pending = 0;
            $scope.cancel =  0;
            $scope.proceed =  0;
            $scope.request =  0;
            $scope.transpot =  0;
            $scope.opentrip =  0;
            $scope.delivered =  0;
            $scope.reconciliation =  0;
            $scope.party_not_found =  0;
            $scope.re_sudule =  0;
            $scope.tripstart =  0;
            $scope.ready_for_delivery =  0;
            $scope.ready_for_driver =  0;

$scope.getcount = function (tabelename) {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/getcount_transpotcount_driver?tablename="+tabelename,
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.pending = data.pending;
            $scope.cancel =  data.cancel;
            $scope.proceed =  data.proceed;
            $scope.request =  data.request;
            $scope.transpot =  data.transpot;
            $scope.opentrip =  data.opentrip;
            $scope.delivered =  data.delivered;
            $scope.reconciliation =  data.reconciliation;
            $scope.party_not_found =  data.party_not_found;
            $scope.re_sudule =  data.re_sudule;
            $scope.tripstart =  data.tripstart;
            $scope.ready_for_delivery =  data.ready_for_delivery;
            $scope.ready_for_driver =  data.ready_for_driver;
             

    });



}







$scope.sortidchange = function (id) {



//if(event.keyCode==13)
//{
  
 
  var sort_id=$('#sort_id_'+id).val();
  
  


 if(sort_id>0)
 {
     


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/sort_no_update?order_id="+id,
      data:{'id':id,'tablenamemain':'orders_process','sort_no':sort_id}
    }).success(function(data)
    {

       
      
          if(data.error == '2')
          {

            
            alert(data.msg);
               
         

          }

          

    });
    
    
 }


//}



}





$scope.saveReading = function (id) {



//if(event.keyCode==13)
//{
  
 
  var end_reading=$('#end_reading_'+id).val();
  
  


 if(end_reading!="")
 {
     


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/reading_update?order_id="+id,
      data:{'order_id':id,'tablenamemain':'orders_process','end_reading':end_reading}
    }).success(function(data){

   

    });
    
    
 }
 else
 {
     alert('Please input end reading value');
 }
    

//}



}




$scope.saveReadingfact = function (id) {



//if(event.keyCode==13)
//{
  
 
  var end_reading=$('#end_reading_factory_'+id).val();
  
  


 if(end_reading!="")
 {
     


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/reading_update_fact?order_id="+id,
      data:{'order_id':id,'tablenamemain':'orders_process','end_reading':end_reading}
    }).success(function(data){

   

    });
    
    
 }
 else
 {
     alert('Please input end reading value');
 }
    

//}



}

$scope.saveReadingfactStart = function (id) {



//if(event.keyCode==13)
//{
  
 
  var end_reading=$('#start_reading_factory_'+id).val();
  
  


 if(end_reading!="")
 {
     


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/reading_update_fact_start?order_id="+id,
      data:{'order_id':id,'tablenamemain':'orders_process','end_reading':end_reading}
    }).success(function(data){

   

    });
    
    
 }
 else
 {
     alert('Please input Start reading value');
 }
    

//}



}








});

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip({
    html: true 
  });   
});

$(".Uncheck").on('click',function(){
      
      
      var val=$(this).val();
       if($(this).is(':checked'))
       {
            $('.checkdata_'+val).css('display','table-cell');
            var status=1;
       }
       else
       {
           $('.checkdata_'+val).css('display','none');
            var status=0;
       }
       
       
       $.ajax({
       url: '<?php echo base_url() ?>index.php/order_second/table_cust_transport',
       type: "get", //send it through get method
       data: { 
         status_id: status, 
         status_val: val
       }
     });
       
       
       
   });
</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>
<!-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
        window.onload = function googleTranslateElementInit() {
         new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ta,en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
</script>
 -->
