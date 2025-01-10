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
th.badge-soft-dangerred {
    color: red;
    font-weight: 800;
}
.bggreen {
    background: #d1f5ec;
}
.bggray {
    background: #ededed;
}    
.hidden
{
    display: none;
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
 width: 35%;
    padding: 8px 7px;
    height: unset;
    
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

@media screen and (max-width:398px) { 


    .ost > tbody tr {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
}

.ost > tbody tr th {
    width: 50%;
}


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

.checkdata_1_hide,.checkdata_2_hide,.checkdata_3_hide,.checkdata_4_hide,.checkdata_5_hide,.checkdata_6_hide,.checkdata_7_hide,.checkdata_8_hide,.checkdata_9_hide,.checkdata_10_hide,.checkdata_11_hide,.checkdata_12_hide,.checkdata_13_hide,.checkdata_14_hide,.checkdata_15_hide
{
     display: none;
}

.tooltip-inner {
      /* white-space: nowrap; Prevent text from wrapping */
    display: inline-block;  /*Make the text appear on the same line */
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


@media screen and (max-width:767px)
      {


td .btn {
    padding: 6px 5px;
    font-size: 12px;
}



       .mbheader
      {
          display: none;
      }
          .mbbody .mbfirsttr {
              padding:0px;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: row;
    -ms-flex-direction: row;
    flex-direction: row;hidden
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

.mbbody .mbfirsttr td span
{
    
}

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
.card 
{
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

.bottom-nav,.profile-bottom-sheet {
    display: none;
}

@media screen and (max-width:767px)
          {

            div#layout-wrapper > .main-content {
    padding-top: 50px;
}
              .ost > tbody {
                border: none;
                background: #ffff;
                border-radius: 8px !important;
                padding: 10px !important;
                display: flex;
                margin-bottom:10px;
                margin-top: 10px;
                flex-wrap:wrap;
            }
            
            .ost > tbody tr {
                border: none;
            }
            
            .ost > tbody tr td {
                border: none !important;
                border-bottom: 1px solid #e6e6e6 !important;
            }
            .ost > tbody:first-child {
                border-radius: 0px !important;
            }
            .ost > tbody tr {
                border-radius: 0px;
                
            }

            /* CSS for the bottom sheet */
        .filter-bottom-sheet {
            display: none;
            position: fixed;
            bottom: -100%; /* Initially hidden */
            left: 0;
            width: 100%;
            height: auto;
            background-color: #fff;
            padding: 20px;
            border-top: 1px solid #ccc;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            transition: bottom 0.3s ease; /* Animation */
        }
        
        /* CSS for the profile bottom sheet */
        .profile-bottom-sheet {
            display: none;
            position: fixed;
            bottom: -100%; /* Initially hidden */
            left: 0;
            width: 100%;
            height: auto;
            background-color: #fff;
            padding: 20px;
            border-top: 1px solid #ccc;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            transition: bottom 0.3s ease; /* Animation */
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
        
        header,.customize-table
        {
            display:none;
        }

       .totalWeightLabel, .trip-detail {
          text-align: left !important;
          width: 100%;
          background: #ffffff;
          padding: 10px 10px;
          margin: 0px;
          border: 1px solid #e6e6e6;
      }
        .main-content
        {
           padding-top: 20px !important
        }
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
                        <div class="page-title-box d-none d-sm-flex align-items-center justify-content-between">
                           <h4 class="mb-sm-0 font-size-18">Driver Trip Orders</h4>
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
                 
             </div>
                 <div class="container-fluid">
                  <div class="row">
                   
                        <div class="">
                        <div class="card-body px-0 pt-0 pt-md-5">


                     

                       <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                           <h4 class="mb-sm-0 font-size-18"><?php echo $delivery_text; ?> Trip Management</h4>
                           <div class="page-title-right d-none d-sm-flex">
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
                                    $vehicle_id=0;
                                    foreach($vehicle as $rs)
                                    {
                                       
                                        $b="";
                                        
                                           
                                            $b="tr_active";
                                            $vehicle_id=$rs->vehicle_id;
                                            $v_number=$rs->vehicle_number;
                                            $v_name=$rs->vehicle_name.' '.$rs->vehicle_type;
                                        
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


                                                            <input type="hidden" class="hidden" id="nextnumber" value="0">   
                                                            <input type="hidden" class="hidden" id="prenumber" value="3">  
                                                            <input type="hidden" class="hidden" id="pageSize" value="6">  
                                                            <input type="hidden" class="hidden" id="order_base" value="3">
                                                            <input type="hidden"  class="hidden" id="route_id" value="0">
                                                            <input type="hidden"  class="hidden" id="assign" value="12">

                         

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

                       <div class="backdrop"></div>


                          <div class="row">
                        <div class="col-md-9 text-center">
                            <h5 class="trip-detail">
                                    <span id="viewtext">
                                        <?php echo $v_name; ?> | <?php echo $v_number; ?>
                                    </span>
          <a type="" class="tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title=" Assign Trip  >> Sequence >> Dispatch Loaded  >>  Driver PickUp  >>  Trip Started  >>  Payment Collection  >>  Trip End  >>  Reconcilation " style="color: #000;">
                                    <i class="fa fa-info-circle"></i></a>
                                </h5>
                        </div>
                        <div class="col-12 col-md-3 d-flex justify-content-end align-items-center">
                        <button type="button" ng-click="onviewparty()" class="btn btn-soft-danger customize-table waves-effect waves-light" style="margin-right: 5px;">Customize table</button>
                         <h5 style="text-align:right" class="totalWeightLabel">Total Weight: {{weighttotal}}</h5>

                        </div>


                       </div>


                      




















       <div class="row"  >
                            
                      
                                      
                                         
<div class="search-table-outter wrapper">
                                         <table class="table ss-show-table mbbody ost">
                                           
                                          <tr  style="background: #000;color: #fff;" class="mbfirsttr">

                                            <th ng-click="sortBy('id')" >#</th>
                                            <th ng-click="sortBy('vehicle_number')" >VEHICLE NAME & NO </th>
                                            <th ng-click="sortBy('trip_id')" >TRIP ID</th>

                                            
                                            <th class="checkdata_1 <?php echo $checkdata_1_hide; ?>" >DELIVERY DATE</th>
                                            <th class="checkdata_2 <?php echo $checkdata_2_hide; ?>" >LOCALITY </th> 
                                            <th class="checkdata_3 <?php echo $checkdata_3_hide; ?>" >DRIVER & NO </th>
                                            <th class="checkdata_4 <?php echo $checkdata_4_hide; ?>" >TRIP STATUS </th>
                                            <th ng-click="sortBy('start_reading')" class="checkdata_5 <?php echo $checkdata_5_hide; ?>">START KM </th>
                                            <th class="checkdata_6 <?php echo $checkdata_6_hide; ?>">END KM </th>
                                            <th class="checkdata_7 <?php echo $checkdata_7_hide; ?>" >TRIP KM</th>
                                            <th class="checkdata_8 <?php echo $checkdata_8_hide; ?>" >MAX.LEN </th>
                                            <th class="checkdata_9 <?php echo $checkdata_9_hide; ?>" >TOT.WT  </th>
                                            <th class="checkdata_10 <?php echo $checkdata_10_hide; ?>" >BILL AMT</th>
                                            <th class="checkdata_11 <?php echo $checkdata_11_hide; ?>" >LOAD AMT</th>
                                            <th class="checkdata_12 <?php echo $checkdata_12_hide; ?>" >COLA. AMT</th>
                                            <th class="checkdata_13 <?php echo $checkdata_13_hide; ?>">COL. AMT</th>
                                            <th class="checkdata_14 <?php echo $checkdata_14_hide; ?>" >DIFF AMT</th>
                                           <th class="checkdata_15 <?php echo $checkdata_15_hide; ?>">RECONCI. STATUS</th>

                                           <th>SQ.STATUS</th>


                                          </tr>


                                          <tr>

                                           <td colspan="14"><loading></loading></td>

                                          </tr>

 
                                        <tbody ng-repeat="namesd in namesDataassign" id="heading{{namesd.trip_id}}" class="{{namesd.collapsed}}"  data-bs-toggle="collapse" data-bs-target="#collapse{{namesd.trip_id}}" aria-expanded="{{namesd.expended}}" aria-controls="collapse{{namesd.trip_id}}">
                                          <tr style="cursor: pointer;font-weight: 800;" class="bgnone {{namesd.bgnone}} mbfirsttr">


                                             <td>{{namesd.no}}</td>
 
                                            <td>{{namesd.vehicle_number}}</td>
                                            <td>{{namesd.trip_id}}</td>
                                            <td class="checkdata_1 <?php echo $checkdata_1_hide; ?>">{{namesd.assign_date}}</td>
                                           <td class="checkdata_2 <?php echo $checkdata_2_hide; ?>">{{namesd.loc_name}}</td> 
                                            <td class="checkdata_3 <?php echo $checkdata_3_hide; ?>">{{namesd.driver_name}} {{namesd.driver_phone}}</td>
                                             <td class="checkdata_4 <?php echo $checkdata_4_hide; ?>">{{namesd.trip_status}}</td>
                                          
                                            <td class="checkdata_5 <?php echo $checkdata_5_hide; ?>">{{namesd.start_reading}}</td>
                                            <td class="checkdata_6 <?php echo $checkdata_6_hide; ?> {{namesd.emptycolor}}" >{{namesd.km_reading_end}}</td>
                                            <td class="checkdata_7 <?php echo $checkdata_7_hide; ?>">{{namesd.totalkm}}</td>
                                             <td class="checkdata_8 <?php echo $checkdata_8_hide; ?>">{{namesd.lengeth_total}}</td>
                                            <td class="checkdata_9 <?php echo $checkdata_9_hide; ?>">{{namesd.weighttotal}}</td>

                                            <td class="checkdata_10 <?php echo $checkdata_10_hide; ?>">{{namesd.bill_total | indianCurrency}}</td>
                                            <td class="checkdata_11 <?php echo $checkdata_11_hide; ?>">{{namesd.load_amt | indianCurrency}}</td>
                                            <td class="checkdata_12 <?php echo $checkdata_12_hide; ?>">{{namesd.collectable_amount_tot | indianCurrency}}</td>
                                            <td class="checkdata_13 <?php echo $checkdata_13_hide; ?>">{{namesd.collected_amount | indianCurrency}}</td>
                                           
                                          
                                            <td class="checkdata_14 <?php echo $checkdata_14_hide; ?>">{{namesd.diff_amt | indianCurrency}}</td>
                                            <td class="checkdata_15 <?php echo $checkdata_15_hide; ?>">{{namesd.re_status}}</td>


                                           <td>

                          <a herf="#" ng-click="statusChange_seq(namesd.trip_id)" id="ch_{{namesd.trip_id}}" ng-if="namesd.seq_status==0">Save Sequence</a>
 <a herf="#"  ng-if="namesd.seq_status==1" style="color: green;">Sequence Completed</a>

                                           </td>
                                       
                                          </tr>




                                          <tr>
                                          <td colspan="30" class="collapse {{namesd.sh}}"  id="collapse{{namesd.trip_id}}" ng-click="clikcCollpes(namesd.trip_id)" aria-expanded="false">
                                            
<div  class="row">

<div class="changeColDyn col-md-6" ng-repeat="names in namesd.subarray"  >


                              <div class="card task-box" id="uptask-2">
                                 <div class="card-body p-0">
                                    <!-- end dropdown -->
                                    <!-- <div class="p-4 {{names.color}}">



                                      

                                       <h5 class="font-size-12 mb-0" style="text-transform: uppercase;">
                                          
                                    

                                       <i class="mdi mdi-play font-size-15"></i> 

                                       {{names.company_name}} 

                                       <b>
                                         <a href="javascript:void(0);" ng-click="viewOrder(names.base_id)">({{names.order_no}})</a>
                                       </b>

                                     

                                     </h5>


                                       <input type="text" value="{{names.no}}" style="width: 70px;margin: -30px 0px;text-align: center;" class="setsort_id" id="sort_id_{{names.id}}" ng-keyup="sortidchange(names.id)"> 




                                   

                                    </div> -->

                                    <div class="p-2 {{ names.color }} ">
                                        <div class="row dolheader">
                                            <div class="col-md-1 col-2">
                                                <input type="number" value="{{ names.no }}"
                                                    style="width: 70px; text-align: center;" class="setsort_id "
                                                    id="sort_id_{{ names.id }}" ng-keyup="sortidchange(names.id,names.randam_id)">
                                                </div>
                                            <div class="col-md-10 col-10 text-align-center">
                                                <h5 class="font-size-12 mb-0" style="text-transform: uppercase;">
                                                    <i class="mdi mdi-play font-size-15"></i> {{ names.company_name }}
                                                    <b><a href="javascript:void(0);"
                                                            ng-click="viewOrder(names.base_id)">({{ names.order_no }})</a></b>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                <!-- <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tollCharge" class="col-form-label">Toll Charge:</label>
                                                <input type="text" class="form-control" id="tollCharge" ng-model="names.toll_charge" style="background-color:#f2f2f2; margin-bottom: 10px; width: 85%;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div ><label>&nbsp;</label><input type="file" id="fileInput_{{namesd.trip_id}}" multiple class="form-control"></div>
                                                <div><label><br></label><button class="btn btn-success" id="uploadbutton" ng-click="toll_attachment(namesd.trip_id)">Upload</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div> -->

                                    <table class="table {{names.bodycolor}}" style="color: #000;">


                                      <tr>
                                        <th>DC NO   : </th><th>{{names.randam_id}} </th>
                                       
                                      
                                      <tr>  

                                      <tr>
                                        <th>CONTACT   : </th><th>{{names.name}} {{names.phone}}</th>
                                        <th>BILL. AMOUNT :</th><th>{{names.bill_amount | indianCurrency}}</th>
                                      
                                      <tr>

                                      <tr class="doladdress">
                                        <th>ADDRESS : </th>
                                        <th style="width: 35%;">
                                            <div style="height: 3.5em; max-height: 4em; overflow-y: auto; padding: 5px;">{{names.address}}</div>
                                        </th>
                                        <th>LOAD AMOUNT :</th>
                                        <th>{{names.loadamount | indianCurrency}}</th>
                                    </tr>


                                  <tr>
                                        <tr>
                                        <th></th><th></th>
                                       
                                        <th>COLLA. AMOUNT :</th><th>{{names.collectable_amount_tot | indianCurrency}}</th>
                                       </tr> 

                                       <tr>
                                        <th>LOCALITY   : </th><th>{{names.loc_name}}</th>
                                        <th>COLL. AMOUNT :</th><th>{{names.driver_recived_payment | indianCurrency}}</th>
                                       </tr> 


                                       <tr>
                                        <th>ROUTE   : </th><th>{{names.route_name}}</th>
                                        <th>DIFF. AMOUNT :</th><th>{{names.diff | indianCurrency}}</th>
                                      </tr> 

                                       <tr>
                                        <th>SALESMAN   : </th><th>{{names.sales_name}} | {{names.sales_phone}}</th>
                                        <th>DELIVERY :</th><th>{{names.delivery_mode}}</th>
                                      </tr>
                                       <tr>
                                        <th>MAX L   : </th><th>{{names.lengeth}} <i class="fa fa-info-circle" aria-hidden="true" title="Product Type" ng-click="showProducttype(names.id,names.order_no)"></i></th>
                                        <th>MAX W :</th><th>{{names.weight}}</th>
                                      </tr>  


                                      <tr>
                                        <th>ORDER DATE  : </th><th>{{names.create_date}}</th>
                                        <th>DELIVERY DATE :</th><th>{{names.delivery_date}}</th>
                                      </tr>  



                                      <tr >
                                        <th>START KM   : </th><th>


                                        <span ng-if="names.start_reading>0">
                                          

                                            {{names.start_reading}} | {{names.trip_start_date}} {{names.trip_start_time}}

                                        </span>  

                                      

                                         </th>
                                        <th>END KM :</th>
                                        <th>

                                        <span ng-if="names.km_reading_end>0">
                                           {{names.km_reading_end}} | {{names.trip_end_date}} {{names.trip_end_time}}
                                        </span>  


                                        </th>
                                      </tr> 

                                      <tr>
                                        <th>TOTAL KM  : </th><th>
                                        
                                        <span ng-if="names.totkm>0">
                                        {{names.totkm}}
                                       </span>

                                      </th>
                                        <th>PAYMENT MODE : </th><th>
                                         

                                         <span ng-if="names.payment_mode_order==names.payment_mode">
                                         {{names.payment_mode}}
                                         </span>

                                         <span ng-if="names.payment_mode_order!='Cash'">
                                         <span ng-if="names.payment_mode=='Cash'" style="color:green;">{{names.payment_mode}}</span>
                                         </span>

                                         <span ng-if="names.payment_mode_order=='Cash'">
                                         <span ng-if="names.payment_mode!='Cash'" style="color:red;">{{names.payment_mode}}</span>
                                         </span>

                                         <!------->
                                        <span ng-if="names.payment_mode_order">
                                        <span ng-if="names.payment_mode_order=='Cash'">
                                        <span ng-if="names.payment_mode!=names.payment_mode_order">
                                        <span ng-if="names.payment_mode!='Cash'" style="float: right;">({{names.payment_mode_order}})</span>
                                        </span>
                                        </span>

                                        <span ng-if="names.payment_mode_order!='Cash'">
                                        <span ng-if="names.payment_mode!=names.payment_mode_order">
                                        <span ng-if="names.payment_mode=='Cash'" style="float: right;">({{names.payment_mode_order}})</span>
                                        </span>
                                        </span>
                                        </span>

                                      </th>
                                      </tr> 

                                       <tr >
                                       
                                        <th>STATUS : </th>
                                        <th style="height: 4.5em!important; max-height: 4.5em!important;" class="{{ names.color }}red">
                                                 {{names.reason}}


                                                 <span ng-if="names.rescheduling_delivery=='Rescheduling'">
                                                  <small><b>Rescheduling Date : {{ names.rescheduling_date }}</b></small>
                                                  <br>
                                                  <small><b>Remarks : {{ names.rescheduling_remarks }}</b></small>
                                                 </span>
                                      
 

                                        </th>

                                        <th colspan="2" style="height: 4.5em!important; max-height: 4.5em!important;">

                                            

                                            <span ng-if="names.assign_status==12">
                                                <button ng-click="statusChange_view1(names.id,names.randam_id)" class="btn btn-danger waves-effect waves-light float-end" ng-if="names.seq_status==1 && names.pickup==1">
                                                <i class="fas fa-truck font-size-18 align-middle me-2"></i> <span>Pickup</span>
                                                </button>
                                           </span>

                                              
                                            <span ng-if="names.assign_status==2 || names.assign_status==8">  
                                                <button ng-click="statusChange_view(names.id,names.return_id,names.randam_id)" class="btn btn-primary float-end">
                                                <i class="fas fa-eye font-size-18 align-middle me-2"></i> View
                                                </button>
                                            </span>

                                             <span ng-if="names.assign_status==1">
                                               <div ng-if="names.first_sort_id==names.no" class="dolstart">
                                                      
                                                      <button type="button" class="btn btn-outline-success waves-effect waves-light float-end" ng-click="statusChange(names.id,names.return_id,names.randam_id)">
                                                      <i class="fas fa-truck font-size-14 align-middle me-3"></i> Start
                                                      </button>
                                                      <input type="text" maxlength="6" oninput="this.value = this.value.replace(/[^0-9]/g, '')" id="start_reading_{{names.id}}" class="formta" placeholder="Start Reading">
                                                </div>
                                           </span>



                                             <span ng-if="names.assign_status==3">
                                            
                                            <div ng-if="names.last_sort_id==names.no">
                                                      
                                                    
                                                      <input type="text" style="width: 100%;"  maxlength="6" id="end_reading_{{names.id}}" value="{{names.km_reading_end}}" ng-keyup="saveReading(names.id,names.return_id,names.randam_id)" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="formta" placeholder="End Reading">

                                                      <div class="container d-none">
                                                        <div class="row" style="display:flex;">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="tollCharge" class="col-form-label">Toll Charge:</label>
                                                                    <input type="text" class="form-control" id="tollCharge_{{names.id}}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" ng-model="names.toll_charge"  ng-keyup="saveTollCharge(names.id,names.return_id,names.randam_id,names.trip_id)" value="{{names.toll_charge}}" style="background-color:#f2f2f2; margin-bottom: 10px; width: 85%;">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="row" style="display:flex; margin-top:8px;">
                                                                    <div class="col-md-10"><label>&nbsp;</label><input type="file" id="fileInput_{{namesd.trip_id}}" multiple class="form-control"></div>
                                                                    <div class="col-md-2"><label><br></label><button class="btn btn-success" id="uploadbutton" ng-click="toll_attachment(namesd.trip_id)"><i class="fa fa-upload" aria-hidden="true"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                
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

   
   <input type="hidden" class="hidden" id="vehicle_id" value="<?php echo $vehicle_id_data; ?>">

   <div class="bottom-sheet profile-bottom-sheet">
            <p class="text-center">Are you sure you want to logout, <span id="customerName"><?php echo $this->session->userdata['logged_in']['username']; ?></span>?</p>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="<?php echo base_url(); ?>index.php/adminmain/transpotlogout" class="btn btn-danger mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="#ffffff">
                        <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 
                        102-102H360v-80h327L585-622l55-58 200 200-200 200Z" fill="#ffffff"/></svg>Yes,Logout</a>
                    <button type="button" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#ffffff">
                          <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" fill="#ffffff"/>
                        </svg>Cancel</button>
                </div>
            </div>
       </div>
      
      <div class="bottom-nav">
        <div class="icon" id="home">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
               <path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/>
            </svg>
            Home
        </div>
        
         <div class="icon" id="ctable" ng-click="onviewparty()">
            <!-- SVG icon for Profile -->
            <!-- Replace this with your Google icon SVG code for Profile -->
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path d="M360-120q-33 0-56.5-23.5T280-200v-400q0-33 23.5-56.5T360-680h400q33 0 56.5 23.5T840-600v400q0 33-23.5 56.5T760-120H360Zm0-400h400v-80H360v80Zm160 
                160h80v-80h-80v80Zm0 160h80v-80h-80v80ZM360-360h80v-80h-80v80Zm320 0h80v-80h-80v80ZM360-200h80v-80h-80v80Zm320 0h80v-80h-80v80Zm-480-80q-33 0-56.5-23.5T120-360v-400q0-33
                23.5-56.5T200-840h400q33 0 56.5 23.5T680-760v40h-80v-40H200v400h40v80h-40Z"/></svg>
                Customize
        </div>
        
        <div class="icon" id="filter">
            <!-- SVG icon for Filter -->
            <!-- Replace this with your Google icon SVG code for Filter -->
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path d="M80-200v-80h400v80H80Zm0-200v-80h200v80H80Zm0-200v-80h200v80H80Zm744 400L670-354q-24 17-52.5 
                25.5T560-320q-83 0-141.5-58.5T360-520q0-83 58.5-141.5T560-720q83 0 141.5 58.5T760-520q0 29-8.5 57.5T726-410l154 
                154-56 56ZM560-400q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Z"/></svg>
            Filter
        </div>
        
       
        
        <div class="icon" id="profile">
            <!-- SVG icon for Profile -->
            <!-- Replace this with your Google icon SVG code for Profile -->
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 
                47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 
                18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58
                18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5
                15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm40-120q33 
                0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240ZM400-560q33
                0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Zm12 400Z"/></svg>
                Profile
        </div>
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
        if (input === "" || input === 0) {
            return input;
        }
        if (typeof input === 'string') {
            // Try to convert the string to a number
            input = parseFloat(input.replace(/,/g, ''));
        }
        if (!isNaN(input) && input != null) {
            return input.toLocaleString('en-IN', { maximumFractionDigits: 0 });
        } else {
            return input;
        }
    };
});

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;


 
 
 
 
    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 3;
    $scope.searchText = '';
    
    $scope.tablename='orders_process';
    getData();

    $scope.toll_attachment = function(id) {
    var table = 'orders';
    $('#uploadbutton').html('Loading..');

    var files = $('#fileInput_'+id)[0].files;
    console.log(files);
    var form_data = new FormData();  

    // Append each file to the FormData object
    for (var i = 0; i < files.length; i++) {
        form_data.append('file[]', files[i]);
    }  

    $http.post('<?php echo base_url() ?>index.php/order_second/upload_tollattachment?id=' + id + '&tablename=' + table, form_data, {  
        transformRequest: angular.identity,  
        headers: {
            'Content-Type': undefined,
            'Process-Data': false
        }  
    }).then(function(response) {
        // Handle success
        console.log('File uploaded successfully', response.data);
        // Additional actions if needed
    }).catch(function(error) {
        // Handle error
        console.error('Error uploading file', error);
        // Additional error handling if needed
    }).finally(function() {
        // Reset button text after upload attempt
        $('#uploadbutton').html('Upload');
    });
};

    
    $scope.searchTextChanged = function() {
        $scope.currentPage = 1;
        getData();
    }


     $scope.searchTextChanged_status = function() {
        $scope.currentPage = 1;
        getData();
    }
    
 
    $scope.formatIndianCurrency = function (amount) {
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

$scope.clikcCollpes = function(trip_id){
    
    
     $('#collapse'+trip_id).addClass('show');

    
};



$scope.viewOrder = function(base_id){
    
    
  window.open(
  '<?php echo base_url(); ?>index.php/order/order_overview?base=3&Content_view=1&order_id='+base_id,
  '_blank' // <- This is what makes it open in a new window.
 );

    
};




            // $scope.toll_attachmentddd = function (tripid) {
            //     var trip_id = '<?php echo $trip_id; ?>';
            //     $('#uploadbutton').html('Loading..');

            //     var form_data = new FormData();
            //     angular.forEach($scope.files, function(file) {
            //         form_data.append('file[]', file);
            //     });
            //     console.log(form_data);
            //     $http.post('<?php echo base_url() ?>index.php/order_second/upload_tollattachment?id=' + tripid, form_data, {
            //         transformRequest: angular.identity,
            //         headers: {'Content-Type': undefined}
            //     }).then(function(response) {
            //         alert(response.data.success ? "File submitted successfully." : "File submission failed.");
            //         $('#uploadbutton').html('Upload');
            //     }).catch(function(error) {
            //         alert("An error occurred while uploading the file.");
            //         console.error(error);
            //         $('#uploadbutton').html('Upload');
            //     });
            // };



function getDataPage(currentPage,pageSize) {
         
     
            
            
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
      

     $http.get('<?php echo base_url() ?>index.php/order_second/fetch_data_table_transpot_assign_data_driver_list_limit?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&route_id='+route_id+'&assaignstates='+assign+'&vehicle_id='+vehicle_id+'&from_date='+from_date+'&to_date='+to_date+'&trip_id='+trip_id+'&delivery_status='+delivery_status)
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







  $scope.from_date = new Date('<?php echo $from_date; ?>');
  $scope.to_date = new Date();


     
     $scope.searchText_status=0;
   function getData()
   {
       
      var order_base = $('#order_base').val();
      var route_id = $('#route_id').val();
      var assign = $('#assign').val();
      var vehicle_id = $('#vehicle_id').val();
      var vehicle_id = $('#vehicle_id').val();





       var pageSize = $('#pageSize').val();

       var from_date = $('#from_date').val();
       var to_date = $('#to_date').val();
        var trip_id = '<?php echo $trip_id; ?>';
        var delivery_status = '<?php echo $delivery_status; ?>';
        
        if($scope.searchText_status==undefined) 
        {
          var status = 0;
        }
        else
        {
          var status = $scope.searchText_status;
        }
        
      
      
       if(from_date=='')
      {
          var from_date= '<?php echo $from_date; ?>';
          
      }

      $scope.loading = true;
     $('#hidedata').hide();
      
      
     $http.get('<?php echo base_url() ?>index.php/order_second/fetch_data_table_transpot_assign_data_driver_list_limit?page=' + $scope.currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&route_id='+route_id+'&assaignstates='+assign+'&vehicle_id='+vehicle_id+'&from_date='+from_date+'&to_date='+to_date+'&trip_id='+trip_id+'&delivery_status='+delivery_status+'&status='+status)
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

$scope.statusChange = function(id,return_id,randam_id){
    
    
    
    
    
    
    if(confirm("Are you sure you want to Start?"))
    {
        
        
        var start_reading=$('#start_reading_'+id).val();
        
        
        if(start_reading!='')
        {
            
       
        
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                        data:{'id':id, 'action':'statuschange','start_reading':start_reading,'randam_id':randam_id,'tablenamemain':'orders_process'}
                        }).success(function(data){
                        $scope.success = false;
                        $scope.error = false;
                        
                        
                         if(return_id>0)
                         {

                             window.location.replace("<?php echo base_url(); ?>index.php/order/driver_orders_list_view_return?id="+return_id+"&DC_id="+randam_id);
                
                         }
                         else
                         {
                              window.location.replace("<?php echo base_url(); ?>index.php/order/driver_orders_list_view?id="+id+"&DC_id="+randam_id);
                
                         }
                         //$scope.fetchRouteorderassignorder('orders_process',3,0,1);
                       }); 
      
        }
        else
        {
            alert('Please Fill Start Reading..');
        }
      
      
      
      
      
      
      
    }
    
    
    
};

$scope.statusChange_view1 = function(id,randam_id){
    
    
    
    
    
    
    window.location.replace("<?php echo base_url(); ?>index.php/order/pickup_orders_list_view?id="+id+"&DC_id="+randam_id+"&driver_pickip=1");
                
                       
    
    
};



$scope.statusChange_view = function(id,return_id,randam_id){
    

    
                         if(return_id>0)
                         {

                      window.location.replace("<?php echo base_url(); ?>index.php/order/driver_orders_list_view_return?id="+return_id+"&DC_id="+randam_id);
                
                         }
                         else
                         {


                             window.location.replace("<?php echo base_url(); ?>index.php/order/driver_orders_list_view?id="+id+"&DC_id="+randam_id);
                         
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





        $scope.saveTollCharge = function (id,return_id,randam_id,trip_id) {
        
            var toll=$('#tollCharge_'+id).val();

            if(toll!="")
            {
                $http({
                method:"POST",
                url:"<?php echo base_url() ?>index.php/order/tollcharge_update?order_id="+id,
                data:{'order_id':id,'randam_id':randam_id,'tablenamemain':'orders_process','toll':toll,"trip_id":trip_id}
                }).success(function(data){});
            }
        }

$scope.sortidchange = function (id,randam_id) {



//if(event.keyCode==13)
//{
  
 
  var sort_id=$('#sort_id_'+id).val();
  
  


 if(sort_id>0)
 {
     


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/sort_no_update?order_id="+id,
      data:{'id':id,'randam_id':randam_id,'tablenamemain':'orders_process','sort_no':sort_id}
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





$scope.saveReading = function (id,return_id,randam_id) {



//if(event.keyCode==13)
//{
  
 
  var end_reading=$('#end_reading_'+id).val();
  
  




 if(end_reading!="")
 {
     


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/reading_update?order_id="+id,
      data:{'order_id':id,'randam_id':randam_id,'tablenamemain':'orders_process','end_reading':end_reading}
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


$scope.onviewparty = function(){
     $('#firstmodalcustomisetable').modal('toggle');
    
};

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
  $('[data-toggle="tooltip"]').tooltip();   
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

<style type="text/css">
  
  @media screen and (max-width: 767px)
  {
    .dolheader .col-10 > * {text-align: left !important;}

    .row.dolheader {
    align-items: center;
}

tr.doladdress th div {
    height: unset !important;
}
  }



</style>
   
<?php include ('table_footer.php'); ?>
</body>
<!-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
        window.onload = function googleTranslateElementInit() {
         new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ta,en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
</script>
 -->

<script type="text/javascript">
  
  $(document).ready(function () {
    function checkWidth() {
        var windowSize = $(window).width();
        if (windowSize <= 768) { // Change this value to your desired breakpoint
            // Show bottom sheet on mobile
            $(".filter-bottom-sheet").hide(); // Initially hide the bottom sheet
            $(".container").css("position", "static"); // Remove relative positioning on container
        } else {
            // Revert to default view for desktop
            $(".container").css("position", "relative"); // Set back to relative positioning on container
            $(".filter-bottom-sheet").hide(); // Initially hide the bottom sheet for desktop
        }
    }

    // Check width on page load
    checkWidth();

    // Check width on window resize
    $(window).resize(function () {
        checkWidth();
    });
});

   
$(document).ready(function () {
    let filterActive = false;
    let profileActive = false;

    // Show/hide bottom sheet for Profile icon click
    $("#profile").on("click", function () {
        if (!profileActive) {
            $(".filter-bottom-sheet").removeClass("bactive").css("bottom", "-100%");
            $(".profile-bottom-sheet").addClass("bactive");
            profileActive = true;
            filterActive = false;
            $(".backdrop").fadeIn();
        } else {
            $(".profile-bottom-sheet").removeClass("bactive").css("bottom", "-100%");
            profileActive = false;
            if (!filterActive) $(".backdrop").fadeOut();
        }
    });

    // Show/hide bottom sheet for Filter icon click
    $("#filter").on("click", function () {
        if (!filterActive) {
            $(".profile-bottom-sheet").removeClass("bactive").css("bottom", "-100%");
            $(".filter-bottom-sheet").addClass("bactive");
            filterActive = true;
            profileActive = false;
            $(".backdrop").fadeIn();
        } else {
            $(".filter-bottom-sheet").removeClass("bactive").css("bottom", "-100%");
            filterActive = false;
            if (!profileActive) $(".backdrop").fadeOut();
        }
    });

    // Close bottom sheets and backdrop when clicking outside of them
    $(document).on("click", function (event) {
        if (!$(event.target).closest(".filter-bottom-sheet, #filter, .profile-bottom-sheet, #profile").length) {
            $(".filter-bottom-sheet, .profile-bottom-sheet").removeClass("bactive").css("bottom", "-100%");
            $(".backdrop").fadeOut();
            filterActive = false;
            profileActive = false;
        }
    });
});
</script>