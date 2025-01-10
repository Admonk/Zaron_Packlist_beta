<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
$arr=array('1','5','14','4','22');
$none="";
if(isset($_GET['sales_request']))
{
    
    
    if($_GET['sales_request']==1)
    {
        $none="d-none";
    }
    
    
}

 ?>
<style type="text/css">
table.table.border {
    line-height: 15px;
    font-size: 11px;
    
}
.pobtn{
    background: #7a7b7c;
    border: none;
    padding: 3px 12px;
    border-radius: 64px;
    color: white;
    font-size: 11px;
}
input#price_details {
    width: 65%;
}
select#availability {
    width: 65px;
}

u {
    cursor: pointer;
   
}


.progress-barr-wrapper {
   
   padding: 16px;
    margin: 12px 0px;
}

.price-table {
    width: 100%;
    border-collapse: collapse;
    border: 0 none;
    line-height: 35px;
    
}
.price-table tr:not(:last-child) {
    border-bottom: 1px solid rgb(199 199 199 / 27%)
}
.price-table tr td {
    border-left: 1px solid rgba(0, 0, 0, 0.05);
    padding: 4px 14px;
    font-size: 13px;
}
.price-table tr td:first-child {
    border-left: 0 none;
}

.price-table .fa-check {
    color: #1c84ee;
}
.price-table .fa-times {
    color: #D8D6E3;
}


/**/

.price-table tr.price-table-head td {
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
}
.price-table tr.price-table-head {
    background-color: #50a7ff;
    color: #FFFFFF;
}
.price-table td.price {
    color: #f43f54;
        padding: 0;
    font-size: 20px;
    font-weight: 600;
}
.price a {
    background-color: #1c84ee;
    color: #FFFFFF;
    padding: 5px 13px;
    margin-top: 5px;
    font-size: 10px;
    line-height: 15px;
    font-weight: 600;
    text-transform: uppercase;
    display: inline-block;
    border-radius: 64px;
    margin-left: 10px;
}
.price-table td.price-table-popular {
    border-top: 3px solid #1c84ee;
    color: #1c84ee;
    text-transform: uppercase;
    font-size: 12px;
    padding: 12px 48px;
    font-weight: 700;
}
.price-table .price-blank {
    background-color: #fafafa;
    border: 0 none;
}

.price-table svg {
    width: 90px;
    fill: #1c84ee;
}

table.price-table td {
    height: 45px;
}






.ui-widget.ui-widget-content {
    border: 1px solid #d3d3d3;
    z-index: 9999;
    height: 95px;
    overflow-y: scroll;
    overflow-x: hidden;
    margin-left: -230px !important;
}

.customer-bill-info {
    background: none;
   
}
.search-info.mb-1.border-bottom
{
    background: none;
}

 .draggable {
            color: white;
            border-radius: 0.75em;
            touch-action: none;
            user-select: none;
            transform: translate(0px, 0px);
            font-size: 20px;
            position: absolute;
            color: #000;
            top: 10%;
          }
         div#show_details2 {
    margin-bottom: 10px;
        display: none;
}

.floater-options1 .form-check p {
    margin-bottom: 0px !important;
}


     .top-left-doble-one
     {
             position: absolute;
    top: 13%;
    left: 14.2%;
     }

     .top-left-doble-two
     {


     position: absolute;
    top: 15%;
    left: 42%;

     }



         .top-left-doble-three
     {


   position: absolute;
    top: 131px;
    right: 24%;

     }



          .top-left-doble-four
     {


  position: absolute;
    bottom: 51%;
    left: 31%;

     }


              .top-left-doble-five
     {


   position: absolute;
    bottom: 40%;
    left: 49%;

     }


           .top-left-doble-six
     {


  position: absolute;
    bottom: 27%;
    left: 69%;

     }


           .top-left-doble-seven
     {

position: absolute;
    bottom: 57%;
    left: 12%;

     }
     
     
     
     
.vendorSelection.mb-5 {
    height: 280px;
    overflow: auto;
}

.fixed-sidebar {
    background-color: #ffffff !important;
    position: absolute;
    right: 0;
    top: 40px;
    height: auto;
    overflow-y: scroll;
    padding-bottom: 0vh;
}

#showhelptext {
    font-size: 11px;
    margin-left: 41px;
    font-weight: 600;
    color: #ee5c17;
}
span.btn.btn-soft-secondary.btn-sm.onclick.acitve {
    background: #ee5c17;
    color: #fff;
}

.bottom-left-sub {
   position: absolute;
    bottom: 46%;
    left: 9%;
}



.roundoff
{
    width: 25%;
    font-size: 11px;
    margin: 4px 0px;
    padding: 3px;
    border: #ff1a00 solid 1px;
    border-radius: 5px;
}

.top-left-profile {
   position: absolute;
    top: 11%;
    left: 29%;
}
.top-left-last-profile {
       position: absolute;
    top: 14.2%;
    left: 57%;
}

.bottom-right-sub {
   position: absolute;
    bottom: 44%;
    right: 21%;
}
.table-scroll thead th
{
        vertical-align: middle;
}
th {
    cursor: pointer;
}
i.fa.fa-sort {
    float: right;
    font-size: 7px;
    color: #e1e1e1;
}
h6.mb-sm-0.font-size-12.ng-binding {
    line-height: 20px;
}
span.set-padding {
    line-height: 25px;
}
img.img-responsive {
    width: 100%;
}

.row.twoBoxInput {
    line-height: 40px;
}
.selectbox
{
    font-size: 10px;
    border: none;
    padding: 3px;
   
    /* text-align-last: right; */
    /* padding-right: 29px; */
    width: 100%;
    border: none;
    border-radius: 10px;   
}
.scoreTick {
    height: 16px;
    width: 16px;
    border-radius: 50px;
    margin: -3px -15px;
}
.imageset {
    background: white;
    margin-bottom: 20px;
}
.chageimgbtn{
    
    color: white;
    text-align: right;
    float: right;
  
    
}

div#inputtext_container {
    background: #fff;
   
    display: block;
    margin-top: 50px;
    margin-bottom: 50px;
}

.col-md-4.twoBoxInput {
    float: left;
    padding: 0px 3px;
}

.form-floating-custom>label {
    left: 48px;
    margin-top: -2px;
   padding: 10px 1.75rem;
}
.imageid { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
.imageid + img {
  cursor: pointer;
}

/* CHECKED STYLES */
.imageid:checked + img {
  outline: 2px solid #f00;
}

img.img-responsive.border-set {
    padding: 8px;
    border: #f3f3f3 solid 2px;
    border-radius: 10px;
}

         canvas {
         display: block;
         touch-action: none;
         width: 1120px !important;
         padding: 12px;
         }
         
.bottom-right-sub-profile {
   position: absolute;
    bottom: 44%;
    right: 18%;
}

.bottom-left-profile {
      position: absolute;
    bottom: 10%;
    left: 40%;
}

.top-right-profile {
   
   position: absolute;
    top: 144px;
    right: 52%;
}
         div#canvas {
            margin: 18px 0px;
        }
         
         fieldset > * {
         display: inline-block;
         vertical-align: middle;
         }
         legend {
         font-weight: bold;
         font-size: 1.5rem;
         }
        
         input[type=color] {
         height: 0;
         position: absolute;
         top: -800px;
         width: 0;
         }
         .toolbar {
         color: var(--primary);
         display: flex;
         flex-wrap: wrap;
         left: 0;
         position: absolute;
         top: 0;
         width: 100%;
         display: none;
         }
         .toolbar__group {
         background-color: rgba(0, 0, 0, 0.85);
         flex-grow: 1;
         padding: 10px 15px 20px;
         }
         .toolbar__heading {
         margin-bottom: 0.5em;
         }
         .toolbar__option {
         margin-right: 1rem;
         }
         .toolbar__button {
         --dimension: 3rem;
         border: 1px solid currentColor;
         color: var(--static);
         cursor: pointer;
         display: inline-block;
         height: var(--dimension);
         line-height: 1;
         position: relative;
         overflow: hidden;
         text-indent: 60px;
         vertical-align: middle;
         width: var(--dimension);
         }
         .toolbar__button::before {
         background-color: currentColor;
         content: "";
         display: block;
         left: 50%;
         position: absolute;
         top: 50%;
         }
         .toolbar__option--color .toolbar__button {
         border: none;
         }
         .toolbar__button[for=line]::before {
         height: 70%;
         transform: translate(-50%, -50%) rotate(45deg);
         width: 2px;
         }
         .toolbar__button[for=rectangle]::before {
         height: 45%;
         transform: translate(-50%, -50%);
         width: 45%;
         }
         .toolbar__button[for=circle]::before {
         border-radius: 100%;
         height: 50%;
         transform: translate(-50%, -50%);
         width: 50%;
         }
         .toolbar__button[for=polygon]::before {
         background-color: transparent;
         border-bottom: 1.3rem solid currentColor;
         border-left: 0.75rem solid transparent;
         border-right: 0.75rem solid transparent;
         display: block;
         height: 0;
         transform: translate(-50%, -54%);
         width: 0;
         }
         input:checked + .toolbar__button {
         background-color: #777;
         color: var(--active);
         }
         .toolbar__label {
         margin-right: 0.5rem;
         }
         .toolbar__sub-group {
         margin-left: 1rem;
         opacity: 0.3;
         }
         input:checked + .toolbar__button + .toolbar__sub-group {
         opacity: 1;
         }
         #clear {
         position: absolute;
         right: 30px;
         top: 10px;
         }
         #saveServer
         {
         position: absolute;
         right: 100px;
         top: 10px;
         }
         .table-rep-plugin tr td:last-child {
    display: flex;
      }








.inputtext_container {
  position: relative;
  text-align: center;
  color: white;
}



.bottom-left {
 position: absolute;
    bottom: 33%;
    left: 30%;
}

.top-left {
  position: absolute;
  top: -1px;
    left: 171px;
}

.top-right {
  position: absolute;
  top: 17px;
    right: 52%
}

input.inputtext {
    border: 1px solid #efefef;
    border-radius: 4px;
    text-align:center;
}

.bottom-right {
  position: absolute;
      bottom: 33%;
    right: 41%;
}

.centered {
  position: absolute;
    top: 77%;
    left: 43%;
  transform: translate(-50%, -50%);
}



.center-rotate {
  position: absolute;
  top: 29%;
    left: 81%;
  transform: translate(-50%, -50%);
  ?
}



.inputtext{
    width: 100px;
}



.buttonright
{
    position: absolute;
    margin: 13px 17px;
    right: 0;
}


.btn-success {
    color: #fff;
    background-color: #1870ca;
    border-color: #1870ca;
}
.topnav .navbar-nav .nav-link {
  
    color: #fff;
}

#page-topbar {background: #1c84ee !important;color: white !important;}


.topnav .navbar-nav .nav-link svg {
   
    color: #ffffff;
    
}






/*Accordian css*/


.accordion_base {
  border: 1px solid white;
  padding: 0 10px;
  margin: 0 auto;
  list-style: none outside;
}

.accordion_base > * + * { border-top: 1px solid white; }

.accordion-item-hd {
    display: block;
    padding: 10px 11px 8px 32px;
    position: relative;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 0px;
}

.accordion-item-input:checked ~ .accordion-item-bd {
  max-height: 1000px;
  padding-top: 15px;
  margin-bottom: 15px;
  -webkit-transition: max-height 1s ease-in, margin .3s ease-in, padding .3s ease-in;
  transition: max-height 1s ease-in, margin .3s ease-in, padding .3s ease-in;
  padding:6px;
}

.accordion-item-input:checked ~ .accordion-item-hd > .accordion-item-hd-cta {
  -webkit-transform: rotate(0);
  -ms-transform: rotate(0);
  transform: rotate(0);
}

.accordion-item-hd-cta {
  display: block;
  width: 30px;
  position: absolute;
  top: calc(50% - 6px );
  /*minus half font-size*/
  right: 0;
  pointer-events: none;
  -webkit-transition: -webkit-transform .3s ease;
  transition: transform .3s ease;
  -webkit-transform: rotate(-180deg);
  -ms-transform: rotate(-180deg);
  transform: rotate(-180deg);
  text-align: center;
  font-size: 12px;
  line-height: 1;
}

.accordion-item-bd {
  max-height: 0;
  margin-bottom: 0;
  overflow: hidden;
  -webkit-transition: max-height .15s ease-out, margin-bottom .3s ease-out, padding .3s ease-out;
  transition: max-height .15s ease-out, margin-bottom .3s ease-out, padding .3s ease-out;
}

.accordion-item-input {
  clip: rect(0 0 0 0);
  width: 1px;
  height: 1px;
  margin: -1;
  overflow: hidden;
  position: absolute;
  left: -9999px;
}











.accordion-item
{
    border-right: 0px;
    border-left: 0px;
    border-top: 0px;
}

ul.progress-barr {
    width: 100%;
   
    padding: 0;
    font-size: 0;
    list-style: none;
}

.progress-barr li.section {
    display: inline-block;
    padding-top: 45px;
    font-size: 11px;
    line-height: 16px;
    color: gray;
    vertical-align: top;
    position: relative;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
}

.progress-barr li.section:before {
    content: 'x';
    position: absolute;
    top: 2px;
    left: calc(50% - 15px);
    z-index: 1;
    width: 30px;
    height: 30px;
    color: white;
    border: 2px solid white;
    border-radius: 17px;
    line-height: 30px;
    background: gray;
}
.status-bar {
    height: 2px;
    background: gray;
    position: relative;
    top: 20px;
    margin: 0 auto;
}
.current-status {
    height: 2px;
    width: 0;
    border-radius: 1px;
    background: mediumseagreen;
}

@keyframes changeBackground {
    from {background: gray}
    to {background: mediumseagreen}
}

.progress-barr li.section.visited:before {
    content: '\2714';
    animation: changeBackground .5s linear;
    animation-fill-mode: forwards;
}

.progress-barr li.section.visited.current:before {
    box-shadow: 0 0 0 2px mediumseagreen;
}

 .tooltip {
  position: relative;
  display: contents;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
         visibility: hidden;
    /* width: 120px; */
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 19px;
    position: absolute;
    z-index: 1;
    /* bottom: 100%; */
    /* left: 100%; */
    margin-top: 0px;
    /* margin-left: -50px; */
    opacity: 0;
    transition: opacity 0.3s;
}



.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

   
     <?php echo $top_nav; ?>
     
     
     <?php
      $read='';
      $disabled='';
    
     ?>






   <div id="layout-wrapper">
         
         <div class="main-content">
             <div class="page-content min-vh-100 white-bg">
               <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-9 col-12">

                        <div class="customer-bill-info mb-1" ng-init="fetchVendor()">
                           <div class="row">
                               
                               
                                 <div class="d-flex inlineFlexBox">
                               
                                  <div class="d-inline col-2 pe-3 border-end">
                                     <label><b><?php echo $order_title; ?> </b></label>
                                   
                                     <h4 class="mb-sm-0 font-size-12 text-primary">Order No : {{order_no_id}}</h4>
                                     <h4 class="mb-sm-0 font-size-12 text-default" ng-if="po_number">Po No : {{po_number}}</h4>
                                     <input type="hidden" id="po_no" value="{{po_number}}">
                                     <input type="hidden" id="vendor_id_fix" value="{{vendor_id_fix}}">
                                     <input type="hidden" id="invoice_no" value="{{invoice_no}}">
                                     <input type="hidden" id="invoice_id" value="{{invoice_id}}">
                                     <!--<h4 class="mb-sm-0 font-size-12 text-default" ng-if="invoice_no">Invoice No : {{invoice_no}}</h4>-->
                                     <h4 class="mb-sm-0 text-muted mt-2 font-size-10">{{create_date}} <span class="text-muted font-size-10">{{create_time}}</span></h4>
                                     <h4 class="mb-sm-0 font-size-11 text-primary" ng-if="mark_request_to_sales!=0">Quotation  No : <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_quotation?order_id={{qutation_orders_id}}" target="_blank">{{mark_request_to_sales}}</a></h4>
                                    
                                     
                                  </div>
                                  
                                
                                <div  class="d-inline border-end"  >
                                         
                                    <div class="col invoice-details" ng-if="vendorname">
                                   
                                        
                                    <label><b>Selected Vendor</b></label>
                                    
                                                <p class="mb-sm-0 font-size-11  ng-binding">{{vendorname}} </p>
                                                <p  class="mb-sm-0 font-size-11 ng-binding" ng-if="vendorphone"><span ng-if="vendorphone!='1'">{{vendorphone}}</span> </p>
                                                <p  class="mb-sm-0 font-size-11  ng-binding" ng-if="gst">GST : {{gst}} </p>
                                                <p class="invo-addr-1">   
                                              
                                                <input type="hidden" id="pourl">
                                                
                                                
                                                
                                                <button   class="pobtn" ng-click="seletGenrate('<?php echo base_url(); ?>index.php/purchase/po?order_id=<?php echo $enable_order; ?>&old_tablename=<?php echo $old_tablename; ?>&old_tablename_sub=<?php echo $old_tablename_sub; ?>&tablename=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&movetablename=<?php echo $movetablename; ?>&movetablename_sub=<?php echo $movetablename_sub; ?>')">PO</button>
                                                
                                                
                                                
                                                <!--<a target="_blank" ng-if="invoice_no" style="padding: 0px 4px;" class="btn btn-outline-success" href="<?php echo base_url(); ?>index.php/purchase/invoice?order_id=<?php echo $enable_order; ?>&invoice_id={{invoice_id}}&invoice_no={{invoice_no}}&old_tablename=0&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process"  ><i class="mdi mdi-map font-size-16 text-success"></i> Invoice</a>
                                                <a target="_blank" ng-if="invoice_extra_unit_id!=0" style="padding: 0px 4px;" class="btn btn-outline-success" href="<?php echo base_url(); ?>index.php/purchase/invoice_extra?order_id=<?php echo $enable_order; ?>&invoice_id={{invoice_extra_unit_id}}&invoice_no={{invoice_no}}&old_tablename=0&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process"  ><i class="mdi mdi-map font-size-16 text-success"></i>Freight Invoice</a>-->
                                             
                                             
                                                
                                                <button type="button" style="padding: 3px;"  class="btn btn-outline-primary" data-bs-toggle="offcanvas" ng-click="getcompare()" data-bs-target="#offcanvasCompare" aria-controls="offcanvasRight"><i class="mdi mdi-compare"></i> 
                                                <span ng-if="vendorcount==1">Select PO</span>
                                                <span ng-if="vendorcount>1">Compare</span>
                                                </button>
                                                
                                                
                                                
                                                 
                                                 </p>
                                     </div>  
                                     
                                     
                                     
                                     <div class="col invoice-details" >
                                      <span ng-init="getcompareProduct()"  ng-if="selected_status==0">
                                        
                                        <!-- <div class="tooltip" ng-show="getcomparedata.length>0">
                                    <i class="fa fa-info-circle"  data-toggle="tooltip" data-placement="top" ></i>
                                   <span class="tooltiptext">Compare the PO with another vendor</span>
                                    </div>-->
                      
                                        
                                   <button type="button" style="padding: 3px;" ng-show="getcomparedata.length>0" class="btn btn-outline-primary" data-bs-toggle="offcanvas" ng-click="getcompare()" data-bs-target="#offcanvasCompare" aria-controls="offcanvasRight"><i class="mdi mdi-compare"></i> 
                                    
                                    <span ng-if="vendorcount==1">Select PO</span>
                                    <span ng-if="vendorcount>1">Compare</span>
                                    </button>
                                    </span>
                                    
                                    
                                    
                                    <?php
                                    if (in_array($this->session->userdata['logged_in']['access'],$arr)) { 
                                    ?>
                                    <button type="button" style="padding: 3px;display:none;" ng-if="order_base>=2" class="btn btn-outline-primary" ng-click="openupload()" ><i class="mdi mdi-upload"></i> Invoice Upload </button>
                                    <?php
                                    }
                                    ?>
                                                        
         
                                                                              
                                </div>
                                </div>
                               
    
                               <input type="hidden" value="{{checkalready}}" id="vendorcheck">
                                <div class="d-inline col-2 pe-2 <?php echo $none; ?>" ng-if="order_base<1">

                                 <label >Vendors ({{vendorcount}})</label>
                                
                                 <div class="d-flex gap-2 flex-wrap">
                                    <div class="btn-group">
                                       <button type="button" style="padding: 3px;" class="btn btn-success btn-rounded rounded-1 waves-effect waves-light mb-2 me-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="far fa-address-book me-1"></i>Select Vendor</button>
                                    
                                    
                                    </div>
                                 </div>
                              </div>
                              
                             
                               
                              
                              
                              <span ng-init="getPurchaserequest()">
                              <div class="d-inline col-2 pe-3" ng-if="arrival_date">
                            
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    
                                    
                                   <table class="table">
                                                                      <tr>
                                                                           <td>Customer </td>
                                                                           <td> {{customer_name}} {{customer_phone}}</td>
                                                                      </tr>
                                                                     
                                                                      <tr>
                                                                           <td>Expected Date </td>
                                                                           <td><input type="date" ng-blur="onSave('arrival_date')" id="arrival_date" value="{{arrival_date}}"></td>
                                                                      </tr>
                                                                      
                                                                      
        
                                                                     
                                                                      
                                                                  </table>
                                   
      
                                    
                                 </div>
                              </div>
                              </span>
                              
                               <div class="d-inline" >
                               <span ng-init="getPurchaserequest()" ng-if="arrival_date">
                             
                            
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    
                                    
                                   <table class="table">
                                                                    
                                                                        
                                                                      <tr>
                                                                           <td>Availability Warehouse : </td>
                                                                                 <td> 
                                                                                 
                                                                                 <select  id="availability" ng-change="onSave('availability')"  ng-model="availability" name="availability">
                                                                                    <option value="">SELECT</option>
                                                                                    <option value="YES">YES</option>
                                                                                    <option value="NO">NO</option>
                                                                                    
                                                                           </select></td>
                                                                      </tr>
                                                                      
                                                                  </table>
                                   
                                    
                                
                              </div>
                              </span>
                             
                             
                              </div>
                                
                                     
                                 
                                 </div>
                              

                           </div>
                        </div>
                        
                        
                        
                        <div class="search-info mb-1 border-bottom">
                            
                       
                               
                            
                            <div class="row">
                              <div class="col-lg-12 col-12">
                                    <div class="search-box position-relative" id="normalview" >
                                        
                                        
                                        
                                       <input type="text" ng-model="profile" ng-disabled="po_number"  id="autocomplete" <?php echo $read; ?> ng-keyup="completeProduct()"  ng-keypress="saveDetails($event)" name="profile" class="form-control rounded border autocomplete" placeholder="Product">
                                       <i class="bx bx-subdirectory-right search-icon"></i>
                                       
                                       
                                    </div>
                                     
                                    
                              </div>
                          
                           </div>
                           
                             
                        </div>
                        
                     
                        
                        <div class="card table-editable-info" navigatable ng-init="fetchData('1')">
                            
                           <div class="card-body p-0"  >
                              <div class="table-rep-plugin" >
                                  
                                
                               
                                  <div class="table-responsive  customTableDesign mb-0" data-pattern="priority-columns" >
                                    <table id="datatable_1" class="table table-bordered dt-responsive  nowrap w-100 salestable" >
                                     
                                     
                                       <thead class="bg-gray text-red" >
                                         
                                         
                                        
                                          <tr>
                                             
                                              <th class="table-width-18" rowspan="2" data-priority="1" ng-click='sortColumn("product_name_tab")' ng-class='sortClass("product_name_tab")'>Products <i class="fa fa-sort" aria-hidden="true"></i></th>
                                              <th class="table-width-18" data-priority="3">Specifications</th>
                                              <th class="table-width-8" data-priority="3">UNIT</th>
                                             
                                              
                                              
                                                
                                                  <th class="table-width-8" data-priority="3" style="display:none;">PRICE</th>
                                                  <th class="table-width-10" data-priority="6" >QTY </th>
                                             
                                              
                                              
                                             
                                              
                                              <th class="table-width-8" data-priority="3" style="display:none;">AMOUNT</th>
                                              
                                             <?php
                                              if($status_base!=6)
                                              {
                                               ?>
                                               
                                               <th class="table-width-10" data-priority="6" rowspan="2" >Action</th>
                                             
                                               <?php
                                              }   
                                              ?>
                                             
                                          </tr>
                                          
                                          
                                          
                                       </thead>
                                       
                                       <tbody  ng-repeat="name in namesData|orderBy:column:reverse" >
                                           
                                           
                                           

                                          <tr class="view" >
                                           
                                           
                                             <td title="{{name.categories}}"  data-label="Products">
                                                 <input type="text"  readonly   id="product_name_{{name.id}}" value="{{name.product_name_tab}}">
                                             </td>
                                              
                                              
                                            <td title="{{name.categories}}"  data-label="Products">
                                                 <input type="text" <?php echo $read; ?>  ng-disabled="po_number" class="makeinput" ng-blur="inputsave_1(name.id,'specifications',1,1)"   id="specifications_{{name.id}}" value="{{name.specifications}}">
                                             </td>
                                              <td  data-priority="3" data-label="UOM" >
                                                
                                                  <select class="selectbox makeinput"  ng-disabled="po_number" ng-change="inputsave_1(name.id,'uom',1,1)" id="uom_{{name.id}}"  ng-model="calulation">
                                                      <option value="1" ng-selected="{{name.uom == 1}}">TON</option>
                                                       <option value="2" ng-selected="{{name.uom == 2}}">SQ.MTR</option>
                                                        <option value="3" ng-selected="{{name.uom == 3}}">FEET</option>
                                                         <option value="4" ng-selected="{{name.uom == 4}}">MM</option>
                                                        <option value="5" ng-selected="{{name.uom == 5}}">MTR</option>
                                                         <option value="6" ng-selected="{{name.uom == 6}}">INCH</option>
                                                       <option value="7" ng-selected="{{name.uom == 7}}">KG</option>
                                                      <option value="8" ng-selected="{{name.uom == 8}}">SQ.FT</option>
                                                      
                                                      <option value="9" ng-selected="{{name.uom == 9}}">NOS</option>
                                                     
                                                     
                                                      
                                                      
                                                  </select>
                                                   
                                               
                                                   
                                                   
                                            </td>
                                             <td  data-label="Rate" style="display:none;"> 
                                             
                                                <span ng-if="order_base==2">
                                                 
                                                  <?php if (in_array($this->session->userdata['logged_in']['access'],$arr)) { ?>
                                              <input type="text"  ng-keyup="inputsave_1(name.id,'rate',1,1)"    id="rate_{{name.id}}" value="{{name.rate_tab}}">
                                              <?php }else{ ?> {{name.rate_tab}} <?php } ?>
                                                 
                                                 
                                                 </span>
                                             <span ng-if="order_base!=2"><input type="text"  ng-keyup="inputsave_1(name.id,'rate',1,1)"    id="rate_{{name.id}}" value="{{name.rate_tab}}"></span>
                                             
                                             
                                                 
                                             
                                             </td>
                                             
                                             
                                             
                                             <td  data-label="Qty"> 
                                             
                                             <span ng-if="order_base==2">
                                                 
                                               <?php if (in_array($this->session->userdata['logged_in']['access'],$arr)) { ?>
                                              <input type="text" class="makeinput" ng-disabled="po_number"  ng-keyup="inputsave_1(name.id,'qty',1,1)"    id="qty_{{name.id}}" value="{{name.qty_tab}}">
                                              <?php }else{ ?> {{name.qty_tab}} <?php } ?>
                                                 </span>
                                             <span ng-if="order_base!=2"><input type="text" ng-disabled="po_number" class="makeinput"  ng-keyup="inputsave_1(name.id,'qty',1,1)"    id="qty_{{name.id}}" value="{{name.qty_tab}}"> </span>
                                             
                                             
                                             
                                             </td>
                                             <td id="amount_{{name.id}}" data-label="Amount" style="display:none;">{{name.amount_tab}}</td>
                                             
                                             
                                             <td data-label="Action" class="last-colorchange" >
                                           
                                                
                                                
                                                 <span ng-if="!po_number">
                                                      <i class="mdi mdi-delete font-size-16" <?php echo $disabled;  ?> ng-disabled="po_number" ng-click="deleteData(name.id)" title="Delete" style="cursor: pointer;"></i>
                                               
                                                 </span>
                                                
                                                   
                                                <span ng-if="order_base>2" style="display:none;">
                                                    
                                                    
                                                  &nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" ng-if="order_base!=10"  ng-click="fetchSingleData(name.id,name.product_name_tab,name.qty_tab)" style="padding: 3px;font-size: 11px;" class="btn btn-outline-primary" title="Click to udpate the Coil no Bay and bin info">  <i class="fa fa-info-circle" data-placement="top"></i> COIL UPDATE</a>
                                               
                                                </span>
                                                
                                               
                                             </td>
                                             
                                          </tr>
                                        
                                       

                                          
                                          
                                       </tbody>
                                            
                                   
                                       
                                    </table>
                                 </div>
                              
                              
                                
                                
                              
                              
                              
                              
                              
                              </div>
                           </div>
                        </div>
                        
                        
                        
                        
               
                           
      
      
      
      
      
      
           
                        
                        
                        <div class="floater-options1"    ng-init="fetchSingleDatatotal('1')">
                            
                            
                            
                            
                            
                            <div class="row">
                                
                                <div class="billing-summary-details">
                               <div class="row">
                                   
                                   
                              <div class="col-8 <?php echo $none; ?>" >
                                 
                                
                                
                                
                                
                                    <div class="mt-3" ng-if="vendorcount>0" >
                                     
                                    
                                     <span ng-if="order_base==0 || order_base==-1">
                                     <input type="checkbox" class="form-check-input"  style="background: #f4f5f8;border: none;"  ng-click="approved(<?php echo $order_id; ?>,1,'Purchase Enquiry Requested')" name="checkboxEl" value="0" id="formrow-customCheck">
                                     <label class="form-check-label btn btn-success" for="formrow-customCheck">Request Enquiry
                                     
                                     
                                     
                                     </label>
                                     
                                                     
                                       <!-- <div class="tooltip">
                                                <i class="fa fa-info-circle"  data-toggle="tooltip" data-placement="top" ></i>
                                               <span class="tooltiptext">Click to send the enquiry to the vendor</span>
                                       </div>-->
                      
                                     </span>
                                     
                                      <span ng-if="order_base>=1">
                                         <h6 style="color:green;" ng-if="reason"><i class="fa fa-check" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; {{reason}}</h6>
                                      </span> 
                                      
                                                  <div class="vr" ng-if="order_base==1"></div> 
                                                  <span ng-if="order_base==1">
                                                      <button type="button" style="padding: 3px;" class="btn btn-danger w-md" ng-click="genratelink(<?php echo $order_id; ?>)">Generate Link </button>
                                                        <!-- <div class="tooltip">
                                                                <i class="fa fa-info-circle"  data-toggle="tooltip" data-placement="top" ></i>
                                                               <span class="tooltiptext">Generate link</span>
                                                       </div>-->
                                                      
                                                  </span>  
                                                       
                                   
                                                  <div class="vr" ></div>
                                    
                                                <span ng-if="order_base==0">
                                                    <button type="button"  class="btn btn-primary w-md" ng-click="approved(<?php echo $order_id; ?>,-1,'Purchase Enquiry Canceled')"> Cancel</button> </span> 
                                                 <span ng-if="order_base==0">
                                      
                                                   <h6 style="color:red;" ng-if="reason"><i class="fa fa-times" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; {{reason}}</h6>
                                                       
                                                </span> 
                                                
                                                
                                               
                                     
                                                <a href="javascript:void(0)" ng-if="order_base>=2" ng-click="newComplaintcreate()" class="btn btn-secondary dropdown-toggle"><i class="mdi mdi-plus"></i> Create Invoice</a>
                                                
                                                 
                                                 <span ng-if="totalextra_total>0">
                                                     
                                                      <span ng-if="order_base>1">
                                                       <a href="javascript:void(0)" ng-if="invoice_extra_unit_id==0" ng-click="newComplaintcreate_extra()" class="btn btn-secondary dropdown-toggle"><i class="mdi mdi-plus"></i> Create Freight</a>
                                                     </span>  
                                                     
                                                 </span>  
                                                
                                                
                                               
                                                <a href="javascript:void(0)" ng-if="order_base>=2" ng-click="viewallInvoices()" class="btn btn-success dropdown-toggle">VIEW INVOICES</a>
                                                 
                                              
                                                
                                                <span ng-if="order_base>2">
                                                  
                                                  <!-- <a href="javascript:void(0)" ng-if="order_base!=10" ng-click="newComplaintcreate1()" class="btn btn-secondary dropdown-toggle"><i class="mdi mdi-plus"></i> Complaint</a>-->
                                                
                                                
                                                 <a href="javascript:void(0)" ng-if="order_base!=10" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDelivery" ng-Click="onClickDelivery(vendor_id_fix)" class="btn btn-outline-danger"><i class="mdi mdi-map"></i> Delivery Status</a>
                                                
                                                  
                                                </span>
                                                
                                                  
                                 </div>
                                 
                                 
                                 
                                 
                               
                                 
                                 
                                 
                                 
                                 
                                 
                              </div>
                              
                              
                              
                              
                              
                              <div class="col-4 ">
                                 
                                <div class="d-flex align-items-center">
                                                  
                                                   <div class="flex-grow-1 settotal" ng-if="order_base>=2">
                                                       
                                                       
                                                      <h5>Total QTY : {{fullqty}}</h5>
                                                      <h5 class="ng-binding font-size-11">SubTotal : Rs. {{fulltotal | number : 2}}</h5>
                                                      <h5 class="ng-binding font-size-11"><b>GST 18 % : {{totalamountgat | number : 2}}</b></h5>
                                                      <h5 class="ng-binding font-size-11" ng-if="tcsamount>0">TCS (+) : Rs. {{tcsamount | number : 2}}</h5>
                                                      <h5 class="ng-binding font-size-11" ng-if="totalamounttds>0"><b>TDS 5 % : Rs. {{totalamounttds | number : 2}}</b></h5>    
                                                      <h5 class="text-primary font-size-13 ng-binding"> TOTAL AMOUNT: {{discountfulltotal | number : 2}} </h5>
                                                      
                                                      
                                                   </div>
                                                   
                                                  
                          </div>
                                     
                                      
                              </div>
                              
                             </div>
                           
                           
                        </div>
                                
                                
                               
                            </div>
                            
                            
                            
                            
                            
                            
                            
                          
                            
                            
                        </div>
                        
                    </div>
                     
                     
                     <div class="col-3 bg-soft-light fixed-sidebar <?php echo $none; ?>" >
                        <!-- Settings -->
                        <div class="p-3">
                            
                            
                            
                            
                            
                            
                           <div class="row mt-3 ">
                             

                            


                               <div class="vendorSelection mb-5" ng-init="fetchDatavendorsdata()">
                              <h5 class="mb-3">Vendor List ({{vendorcount}})</h5>
                              <hr>
                              
                              
                              
                              
                              
                              
                              
                              
                              <div class="row border-bottom mt-2" ng-repeat="datavendors in namesVendor" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="cursor:pointer">
                                 <div class="col-12" ng-click="onClickgetvendor(datavendors.vendor_id)">
                                    <div class="avatar-sm d-inline-block align-middle me-2">
                                       <div class="avatar-title bg-soft-primary text-primary font-size-20 m-0 rounded-circle">
                                          {{datavendors.cap}}
                                       </div>
                                    </div>
                                    <b >{{datavendors.name}}</b>
                                    <!--<p class="mb-0 ms-5">{{datavendors.address}}</p>-->
                                    <p class="mb-0 ms-5"><b><i class="fa fa-phone" aria-hidden="true"></i> {{datavendors.phone}}</b></p>
                                    <div class="report-column tinycol fifty mt-3">
                                       <ul data-animate="colorScale" data-value="55" class="scaleColors">
                                          <li></li>
                                          <li></li>
                                          <li></li>
                                          <li></li>
                                          <div class="scoreTick" style="left: {{datavendors.rateings}}"></div>
                                       </ul>
                                       <ul class="scaleTicks">
                                          <li>Poor</li>
                                          <li>Not Bad</li>
                                          <li>Good</li>
                                          <li>Excellent</li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              
                              
                              
                             
                         
                         
                         
                         
                         
                         
                         
                         
                           </div>
                              
                              
                              
                              
                              
                           </div>


                         

                            
                            
                            
                            
                            
                           <h6><i class="far fa-address-book pe-2"></i><?php echo $missed; ?> History <span class="float-end font-size-12 text-success text-decoration-underline history-toggle-tab">View Logs</span></h6>
                           <hr class="m-1">
                           
                           
                           <div class="history-tl-container">
                               
                             
                             <ul class="tl" ng-init="fetchCustomerororderhistroy('purchase_orders_process')" ng-show="namesHistory.length>0">
                              <li class="tl-item" ng-repeat="namesh in namesHistory">
                                 
                                 <div class="item-title">{{namesh.lab}} {{namesh.user_name}}. 
                                 <p>Status : {{namesh.status}}</p>
                                 </div>
                                 <div class="item-detail">on {{namesh.create_date}} {{namesh.create_time}}</div>
                               </li>
                               
                             </ul>
                             
                             
                             
                           </div>

                          
                           
                         
                          
                           





                          
                           
                           
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- End Page-content -->
         </div>
      </div>
    
    
    
    
    
    
    
    
    
    



























 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Vendor List</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                      
                                        <select class="form-control" data-trigger name="choices-single-default"
                                                            id="choices-single-default"
                                                            placeholder="This is a search" multiple>
                                                            <option value="">Search Vendor</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($vendor as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                                                        </select>
                                  </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click="saveVendor()">Add Vendor</button>
                    </div>
                </div>
            </div>
        </div>



 <div class="modal fade" id="firstmodal2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Success</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Canceled <?php echo $order_title; ?>  : <b><?php echo $order_no; ?> </b></p>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>






































  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDelivery" aria-labelledby="offcanvasRightLabel" style="width: 1000px;" >
         
         
         <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">
                 &nbsp;&nbsp;&nbsp;
            </h5>
           
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         
         
         
         <div class="offcanvas-body pt-0" >
            <div class="card bg-transparent pt-0" style="box-shadow: none !important;">
               <div class="card-body pt-0" >
                  <div class="col-12" >
                      
                                                <h5 id="offcanvasRightLabel"><p class="mb-sm-0 font-size-14  ng-binding">{{vendorname}}</p></h5>
                                                     
                                                <p  class="mb-sm-0 font-size-11  ng-binding">{{vendorphone}} </p>
                                                <p  class="mb-sm-0 font-size-11  ng-binding"></p>{{vendoremail}} </p>
                                                <p class="invo-addr-1">GST : {{gst}}   
                                                
                                                
                     
                  </div>
                  <hr>
                 
                   <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" ng-show="success">
                                                                                                                <i class="mdi mdi-check-all me-2"></i>
                                                                                                               {{successMessage}}
                                                                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>  
                                                                           
                                                                          
                  <form ng-submit="submitDelivery()" method="post" class="ng-pristine ng-invalid ng-invalid-required">

                         
                      
                         <input type="hidden" id="vendor_id_fix_delivery" value="{{vendor_id_fix}}">
                           <div class="row">
                           
                             
                             
                             <div class="form-group col-md-12">
                              <label class="col-sm-12 col-form-label">Delivery Status <span style="color:red;">*</span></label>
                              <div class="col-sm-12">
                              <select class="form-control" name="delivery_status" required id="delivery_status_d">
                                                             
                                         <option value="">Select</option>     
                                         <option value="3">Partial Payout & Dispatch</option>
                                         <option value="5">Dispatch</option>
                                         <option value="6">Delivered</option>                               
                                                                              
                                </select>                          
                            </div>
                             </div>
                             
                             
                             
                             <div class="form-group col-md-12">
                              <label class="col-sm-12 col-form-label">Date <span style="color:red;">*</span></label>
                              <div class="col-sm-12">
                                <input type="date" id="delivery_date" class="form-control">                      
                            </div>
                             </div>
                        
                       </div>
                       
                       
                       
                     
                       
                      
                  <br>  
                  <h6 class="mb-3">Notes</h6>
                  <div class="w-100 user-chat mt-4 mt-sm-0 ms-lg-1">
                     <div class="card">
                        
                        <div class="p-3 border-top">
                           <div class="row">
                              <div class="col">
                                 <div class="position-relative">
                                    <input type="text" class="form-control border bg-soft-light" required id="notes_delivery" placeholder="Enter Notes...">
                                 </div>
                              </div>
                              <div class="col-auto">
                                 <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2" id="saveDelivery">Save</span> <i class="mdi mdi-save float-end"></i></button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  </form>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                 
                  
                        <h3>Delivery History</h3>
                                 
                                 
                                 <div class="row" style="padding: 20px;">
                                     
                                       <table class="table">
                                          <tr>
                                              <td>No</td>
                                             
                                              <td>Status</td>
                                              
                                              <td>Notes</td>
                                              <td>Date</td>
                                              
                                          </tr>
                                          <tr ng-repeat="selectDel in deleveryHistory" style="vertical-align: baseline;">
                                               <td>{{selectDel.no}}</td>
                                               <td>{{selectDel.status}}</td>
                                                <td>{{selectDel.notes}}</td>
                                               <td>{{selectDel.create_date}}</td>
                                               
                                               
                                          </tr>
                                      </table>
                  
                               
                                     
                                 </div>
                  
                              
                                <h3>Order Status History</h3>
                  
                <div class="row">
                           
                           
                               <div class="progress-barr-wrapper">
                                  <div class="status-bar" >
                                     <div class="current-status" style="width: 100%; transition: width 9000ms linear 0s;"></div>
                                  </div>
                                 
                                      
                                      
                                      
                                       <span ng-if="order_base==0">
                                            <ul class="progress-barr">
                                             <li class="section visited"  style="width: 14.2%;">Create </li>
                                             <li class="section"  style="width: 14.2%;">Enquiry to Vendor</li>
                                             <li class="section"  style="width: 14.2%;">PO</li>
                                             <li class="section"  style="width: 14.2%;">Partial Payout & Dispatch</li>
                                             <li class="section "  style="width: 14.2%;">Partial </li>
                                             <li class="section"  style="width: 14.2%;">Full Payout</li>
                                            
                                             <li class="section"  style="width: 14.2%;">Dispatch</li>
                                            
                                             <li class="section" style="width: 14.2%;">Delivered</li>
                                            
                                            </ul>
                                       </span>
                                       
                                       <span ng-if="order_base==1">
                                            <ul class="progress-barr">
                                             <li class="section visited"  style="width: 14.2%;">Create </li>
                                             <li class="section visited"  style="width: 14.2%;">Enquiry to Vendor</li>
                                             <li class="section"  style="width: 14.2%;">PO</li>
                                             <li class="section"  style="width: 14.2%;">Partial Payout & Dispatch</li>
                                             <li class="section"  style="width: 14.2%;">Full Payout</li>
                                              
                                             <li class="section"  style="width: 14.2%;">Dispatch</li>
                                            
                                             <li class="section" style="width: 14.2%;">Delivered</li>
                                            
                                            </ul>
                                       </span>
                                       
                                       
                                       <span ng-if="order_base==2">
                                            <ul class="progress-barr">
                                             <li class="section visited"  style="width: 14.2%;">Create </li>
                                             <li class="section visited"  style="width: 14.2%;">Enquiry to Vendor</li>
                                             <li class="section visited"  style="width: 14.2%;">PO</li>
                                             <li class="section"  style="width: 14.2%;">Partial Payout & Dispatch</li>
                                             <li class="section"  style="width: 14.2%;">Full Payout</li>
                                              
                                             <li class="section"  style="width: 14.2%;">Dispatch</li>
                                            
                                             <li class="section" style="width: 14.2%;">Delivered</li>
                                            
                                            </ul>
                                       </span>
                                       
                                       <span ng-if="order_base==3">
                                            <ul class="progress-barr">
                                             <li class="section visited"  style="width: 14.2%;">Create </li>
                                             <li class="section visited"  style="width: 14.2%;">Enquiry to Vendor</li>
                                             <li class="section visited"  style="width: 14.2%;">PO</li>
                                             <li class="section visited"  style="width: 14.2%;">Partial Payout & Dispatch</li>
                                             <li class="section"  style="width: 14.2%;">Full Payout</li>
                                              
                                             <li class="section"  style="width: 14.2%;">Dispatch</li>
                                            
                                             <li class="section" style="width: 14.2%;">Delivered</li>
                                            
                                            </ul>
                                       </span>
                                       
                                       
                                        <span ng-if="order_base==4">
                                            <ul class="progress-barr">
                                             <li class="section visited"  style="width: 14.2%;">Create </li>
                                             <li class="section visited"  style="width: 14.2%;">Enquiry to Vendor</li>
                                             <li class="section visited"  style="width: 14.2%;">PO</li>
                                             <li class="section visited"  style="width: 14.2%;">Partial Payout & Dispatch</li>
                                             <li class="section visited"  style="width: 14.2%;">Full Payout</li>
                                              
                                             <li class="section"  style="width: 14.2%;">Dispatch</li>
                                            
                                             <li class="section" style="width: 14.2%;">Delivered</li>
                                            
                                            </ul>
                                       </span>
                                       
                                       
                                          <span ng-if="order_base==7">
                                            <ul class="progress-barr">
                                             <li class="section visited"  style="width: 14.2%;">Create </li>
                                             <li class="section visited"  style="width: 14.2%;">Enquiry to Vendor</li>
                                             <li class="section visited"  style="width: 14.2%;">PO</li>
                                             <li class="section visited"  style="width: 14.2%;">Partial Payout & Dispatch</li>
                                             <li class="section visited"  style="width: 14.2%;">Full Payout</li>
                                              
                                             <li class="section"  style="width: 14.2%;">Dispatch</li>
                                             <li class="section" style="width: 14.2%;">Delivered</li>
                                            
                                            </ul>
                                       </span>
                                      
                                      
                                      
                                        <span ng-if="order_base==5">
                                            <ul class="progress-barr">
                                             <li class="section visited"  style="width: 14.2%;">Create </li>
                                             <li class="section visited"  style="width: 14.2%;">Enquiry to Vendor</li>
                                             <li class="section visited"  style="width: 14.2%;">PO</li>
                                             <li class="section visited"  style="width: 14.2%;">Partial Payout & Dispatch</li>
                                             <li class="section visited"  style="width: 14.2%;">Full Payout</li>
                                              
                                             <li class="section visited"  style="width: 14.2%;">Dispatch</li>
                                            
                                             <li class="section" style="width: 14.2%;">Delivered</li>
                                            
                                            </ul>
                                       </span>
                                       
                                       
                                        <span ng-if="order_base==6">
                                            <ul class="progress-barr">
                                             <li class="section visited"  style="width: 14.2%;">Create </li>
                                             <li class="section visited"  style="width: 14.2%;">Enquiry to Vendor</li>
                                             <li class="section visited"  style="width: 14.2%;">PO</li>
                                             <li class="section visited"  style="width: 14.2%;">Partial Payout & Dispatch</li>
                                             <li class="section visited"  style="width: 14.2%;">Full Payout</li>
                                             
                                             <li class="section visited"  style="width: 14.2%;">Dispatch</li>
                                             <li class="section visited" style="width: 14.2%;">Delivered</li>
                                            
                                            </ul>
                                       </span>
                                       
                                       
                                
                                     
                                     
                                     
                                     
                                  
                               </div>
                               
                               
                           
                               
                               
                               
                               
                               
                               
                               
                          
                                                    
                       </div>
                  
                  
                  
                  
                  
               </div>
            </div>
         </div>
      </div>











  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="width: 1400px;" >
         <div class="offcanvas-header" ng-repeat="selectvendor in namesVendorselect">
            <h5 id="offcanvasRightLabel">
               <div class="avatar-sm d-inline-block align-middle me-2">
                  <div class="avatar-title bg-soft-primary text-primary font-size-20 m-0 rounded-circle">
                     {{selectvendor.cap}}
                  </div>
               </div>
              {{selectvendor.name}}
            </h5>
            <input type="hidden" id="vendor_id" value="{{selectvendor.vendor_id}}">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body pt-0" >
            <div class="card bg-transparent pt-0" style="box-shadow: none !important;">
               <div class="card-body pt-0" >
                   
                   
                   
                  <div class="col-6" ng-repeat="selectvendor in namesVendorselect">
                    
                     <p class="mb-0">  {{selectvendor.address}}</p>
                     <p class="mb-0"><b>Phone : {{selectvendor.phone}}</b></p>
                     
                     
                     <p class="mb-0">
                           <?php
                        
                        foreach($additional_information as $vvl)
                        {
                                     if($vvl->type=='Multiple Options')
                                     {
                                         
                                         
                                           $option=$vvl->option;
                                           $option=explode(',', $option);
                                         
                            ?>
                                               <div class="col-md-12" >
                                              
                                                 <div class="form-group row">
                                                      
                                                         <label class="col-sm-12 col-form-label <?php echo strtolower($vvl->label_name); ?> set_<?php echo strtolower($vvl->label_name); ?>"><b><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?></b> <?php if($vvl->required==1) { ?><span style="color:red;">*</span> <?php } ?></label>
                                                         <div class="col-sm-12">
                                                            <select <?php if($vvl->required==1) { ?> required <?php } ?> ng-blur="onSavereason()" class="form-control <?php echo strtolower($vvl->label_name); ?>"  name="<?php echo strtolower($vvl->label_name); ?>"  id="<?php echo strtolower($vvl->label_name); ?>">
                                                              <option value="{{selectvendor.reason_for_choosing_suppliers}}">{{selectvendor.reason_for_choosing_suppliers}}</option>
                                                             
                                                              <?php
                                                              for ($i=0; $i <count($option) ; $i++)
                                                              { 

                                                              ?>
                                                                    <option value="<?php echo $option[$i] ?>"><?php echo $option[$i] ?></option>
                                                              
                                                              <?php
                                                              
                                                              }

                                                              ?>
                                                            </select>
                                                           
                                                         </div>
                                                    
                                                   </div>
                                             
                                                
                                            </div>
                            <?php
                            
                                     }
                                     else if($vvl->type=='Text Area')
                                     {
                                         
                                         
                                          
                                         
                            ?>
                                                <div class="col-md-12" >
                                              
                                              
                                                   <div class="form-group row">
                                                     
                                                         <label class="col-sm-12 col-form-label <?php echo strtolower($vvl->label_name); ?>"><b><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?></b> <?php if($vvl->required==1) { ?><span style="color:red;">*</span> <?php } ?></label>
                                                         <div class="col-sm-12">
                                                           
                                                           
                                                           <textarea rows="4" <?php if($vvl->required==1) { ?> required <?php } ?> ng-blur="onSavereason()" class="form-control <?php echo strtolower($vvl->label_name); ?>" name="<?php echo strtolower($vvl->label_name); ?>" id="<?php echo strtolower($vvl->label_name); ?>">{{selectvendor.reason_for_choosing_suppliers}}</textarea>
                                                           
                                                           
                                                           
                                                         </div>
                                                      
                                                   </div>
                                                
                                                
                                                
                                            </div>
                            <?php
                            
                                     }
                                     else
                                     {
                                         
                                         $tpebase= $vvl->type;
                                         
                                         if($tpebase=='Date')
                                         {
                                             $vv='date';
                                              $max="max='".date('Y-m-d')."'";
                                         }
                                         else
                                         {
                                             $vv='text';
                                              $max="";
                                         }
                                         
                                         ?>
                                         
                                           <div class="col-md-12"  >
                                              
                                              
                                                   <div class="form-group row">
                                                     
                                                         <label class="col-sm-12 col-form-label <?php echo strtolower($vvl->label_name); ?>"><b><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?></b> <?php if($vvl->required==1) { ?><span style="color:red;">*</span> <?php } ?></label>
                                                         <div class="col-sm-12">
                                                           
                                                           
                                                           <input type="<?php echo $vv; ?>" <?php if($vvl->required==1) { ?> required <?php } ?> ng-blur="onSavereason()" class="form-control <?php echo strtolower($vvl->label_name); ?>" <?php echo $max; ?>  name="<?php echo strtolower($vvl->label_name); ?>" value="{{selectvendor.reason_for_choosing_suppliers}}"  id="<?php echo strtolower($vvl->label_name); ?>">
                                                           
                                                         </div>
                                                      
                                                   </div>
                                                
                                                
                                                
                                            </div>
                                         
                                         <?php
                                     }
                            
                        }
                        ?>
                     </p>
                     
                     
                     <div class="report-column tinycol fifty mt-3">
                        <ul data-animate="colorScale" data-value="55" class="scaleColors">
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <div class="scoreTick" style="left: {{datavendors.rateings}}"></div>
                        </ul>
                        <ul class="scaleTicks">
                           <li>Poor</li>
                           <li>Not Bad</li>
                           <li>Good</li>
                           <li>Excellent</li>
                        </ul>
                     </div>
                  </div>
                  
                  
                  
                  <hr>
                 
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" ng-show="success">
                                                                                                                <i class="mdi mdi-check-all me-2"></i>
                                                                                                               {{successMessage}}
                                                                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>  
                                                                           
                  <form ng-submit="submitCallBack()" method="post" class="ng-pristine ng-invalid ng-invalid-required">





                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
















                                                       <div  class="col-md-12"  ng-show="namesDataproduct.length>0" style="margin-top:20px;">
                                                              
                                                                <h3>Product Details</h3>
                                                                <table class="table" style="font-size: 11px;">
                                                                    <tr>
                                                                         <th>#</th>
                                                                         <th style="width:200px;">Product Name</th>
                                                                         <td>UNIT</td>
                                                                        
                                                                         <th>Price</th>
                                                                         <td>PO</td>
                                                                         <td>Received	</td>
                                                                         <td>Shipping</td>
                                                                         <th>Truck/Rake/Vess</th>
                                                                         <th>Despatch date	</th>
                                                                         <th>Char. Value</th>
                                                                         <th>Description</th>
                                                                         <th>Remarks</th>
                                                                        
                                                                     </tr>
                                                                     <tr  ng-repeat="namesp in namesDataproduct" >
                                                                     
                                                                          <td>{{namesp.no}}</td>
                                                                         <td>{{namesp.product_name}}</td>
                                                                         <td>{{namesp.unit}}</td>
                                                                         <td>{{namesp.rate}}</td>
                                                                         <td>{{namesp.qty}} </td>
                                                                         <td><b style="color:green;">{{namesp.modify_qty}}</b></td>
                                                                         <td>
                                                                             
                                                                             <input type="hidden" value="{{namesp.id}}" class="purchase_order_product_ids">
                                                                             
                                                                             <b><input type="textt"  ng-blur="inputsave_inward_1(namesp.id,'modify_qty',1,1)"  data-set="{{namesp.modify_qty}}"  data-total="{{namesp.qty}}"  id="modify_qty_{{namesp.id}}"  class="form-control qty_invoice_make"   name="purchase_qty_make" >
                                                                             
                                                                         </td>
                                                                         <td><input type="textt" class="form-control vehicle_no_make"  ng-blur="inputsave_inward_1(namesp.id,'vehicle_no',1,1)"    id="vehicle_no_{{namesp.id}}"></td>
                                                                         <td><input type="date"  class="form-control dispath_date_make"   ng-model="d_date" ng-blur="inputsave_inward_1(namesp.id,'dispath_date',1,1)" id="dispath_date_{{namesp.id}}"></td>
                                                                         <td><input type="textt" class="form-control char_value_make"   ng-blur="inputsave_inward_1(namesp.id,'char_value',1,1)" id="char_value_{{namesp.id}}"></td>
                                                                         <td><input type="textt" class="form-control description_make"  ng-blur="inputsave_inward_1(namesp.id,'description',1,1)" id="description_{{namesp.id}}"></td>
                                                                         <td><input type="textt" class="form-control remarks_data_make"  ng-blur="inputsave_inward_1(namesp.id,'remarks_data',1,1)" id="remarks_data_{{namesp.id}}"></td>
                                     
                                                                     </tr>
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                       </div>



























                  <div>
                       <div class="mb-1 align-items-center d-flex">
                           
                         
                           
                           
                                        <h4 class="card-title mb-0 flex-grow-1">Upload Document </h4>
                                        <div class="flex-shrink-0">
                                            <p class="mb-1">File Type</p>
                                            <select class="form-select form-select-sm mb-2" id="filetype">
                                                <option value="" selected="">Select Type</option>
                                                <option value="image">IMAGE</option>
                                                <option value="pfd">PDF</option>
                                                <option value="doc">DOC</option>
                                            </select>
                                        </div>
                       </div>
                  
                        <div class="dz-message needsclick p-2 text-center">
                           <input type="file" style="padding:9px;" file-input="files" class="form-control"  id="fileupload">
                        </div>
                        
                        
                         
                        
                        
                    
                  </div>
                 
                  <hr>
                  <h6 class="mb-3">Remarks</h6>
                  <div class="w-100 user-chat mt-4 mt-sm-0 ms-lg-1">
                     <div class="card">
                        
                        <div class="p-3 border-top">
                           <div class="row">
                              <div class="col">
                                 <div class="position-relative">
                                    <input type="text" class="form-control border bg-soft-light" required id="remarks" placeholder="Enter Remarks...">
                                 </div>
                              </div>
                              <div class="col-auto">
                                 <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2" id="savecallback">Save</span> <i class="mdi mdi-save float-end"></i></button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  </form>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  <h3>Remarks History</h3>
                  
                  <table class="table">
                      <tr>
                          <td>No</td>
                          <td>Remarks</td>
                          <td>Attachment</td>
                          <td>Date</td>
                          <td style="display:none;">Action</td>
                      </tr>
                      <tbody  ng-repeat="selecthistory in remarksHistory">
                          
                     
                      <tr  style="vertical-align: baseline;">
                         
                          <td>{{selecthistory.no}}</td>
                          <td>{{selecthistory.remarks}}</td>
                          <td><a href="{{selecthistory.attachement}}" ng-if="selecthistory.attachement" target="_blank"><i class="mdi mdi-file font-size-20"  title="Attachement" style="cursor: pointer;"></i></a></td>
                          <td>{{selecthistory.create_date}}</td>
                           
                           
                          <td >
                              
                              <a href="#" ng-if="selecthistory.payment_status_id==0" ng-click="deleteData1(selecthistory.id,selecthistory.vendor_id,selecthistory.order_id)" ><i class="mdi mdi-delete menu-icon font-size-18"></i> Delete</a>
                          </td>
                          
                      </tr>
                      
                      
                      
                         <tr  style="vertical-align: baseline;" >
                          <th >#</th>
                          <th style="width:300px;">Product name</th>
                          <th>Inward Qty</th>
                          <th>Dispatch date</th>
                          <th>Char. Value</th>
                          <th>Description</th>
                          <th>Remarks</th>
                          <th>Status</th>
                          <th>Action</th>
                          
                     </tr> 
                      <tr  style="vertical-align: baseline;" ng-repeat="set in selecthistory.subarray">
                          
                          <td>{{set.no}}</td>
                          <td>{{set.product_name}}</td>
                          <td><input type="textt"  value="{{set.inward_qty}}" ng-blur="changelandline(set.id,'inward_qty')" class="form-control" id="inward_qty_{{set.id}}"></td>
                          <td> <input type="textt"  value="{{set.inward_date}}"  ng-blur="changelandline(set.id,'inward_date')" class="form-control" id="inward_date_{{set.id}}"></td>
                          <td><input type="textt"  value="{{set.char_value_make}}" ng-blur="changelandline(set.id,'char_value_make')" class="form-control" id="char_value_make_{{set.id}}"></td>
                          <td><input type="textt"  value="{{set.description}}" ng-blur="changelandline(set.id,'description')" class="form-control" id="description_set_{{set.id}}"></td>
                          <td><input type="textt"  value="{{set.remarks}}" ng-blur="changelandline(set.id,'remarks')" class="form-control" id="remarks_{{set.id}}"></td>
                          <td>{{set.payment_status}}</td>
                          <td><a href="#" ng-if="set.payment_status_id==0" ng-click="deleteData_histrory(set.id)" ><i class="mdi mdi-delete menu-icon font-size-20"></i> </a>
                                                                             </td>
                     </tr>      
                      
                       </tbody>
                      
                  </table>
                  
                  
                  
                  
                  
               </div>
            </div>
         </div>
      </div>

   





    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCompare" aria-labelledby="offcanvasRightLabel" style="width: 95%;">
         <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel"> Quotation </h5>
               
               
           
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body pt-0">
            <div class="card bg-transparent pt-0" style="box-shadow: none !important;">
               <div class="card-body pt-0 row">
                
                
                
                 <div class="col-4" ng-repeat="comparevendor in getcomparedatavendor" style="margin-bottom:20px;">
                    
                    
                    
                    
                    
        
        
        
                    
                    
                   <h5>{{comparevendor.no}}. {{comparevendor.vendor_name}} </h5>
                 
                   
                   <table class="table border">
                    <tbody >
                                      <tr>
                                      <th style="width:200px;"><b>Product Name</b></th>
                                      <th><b>QTY</b></th>
                                      <th><b>Base price </b></th>
                                      <th><b>Amount</b></th>
                                      </tr>
                                      <tr ng-repeat="compare in getcomparedata" ng-if="compare.vendor_id==comparevendor.vendor_id" >
                                      <td>{{compare.product_name}} </td>
                                          
                                      
                                     
                                      
                                     
                                      <td>{{compare.qty}} {{compare.uom}}</td>
                                      <td>{{compare.price}}</td>
                                      <td> {{compare.total}}</td>
                                      </tr>
                                      
                      </tbody>
                   </table>
                   
                   
                   
                   
               <table style="width: 100%;" class="collpostd">
       
             
           
                <tr ng-repeat="compareunc in getcomparedataunc" ng-if="compareunc.vendor_id==comparevendor.vendor_id" >
                <td>
                <table class="price-table" style="background: #f7f7f7;">
               
              
               
                <tr ><td> Delivery time</td></tr>
               
                <tr ><td> Payment Terms</td></tr>
                <tr ng-if="compareunc.payment_terms!='Advance'"><td> Due Date</td></tr>
                
                <tr ng-if="compareunc.remarks!=''"><td> Remarks</td></tr>
                <tr ><td> File</td></tr>
               
                <tr ><td> <b>Sub Total</b></td></tr>
                <tr ><td> <b>GST 18 %</b></td></tr>
                
                <tr ng-if="compareunc.totaltds!=0"><td> <b>TDS 5 %</b></td></tr>
                <tr ng-if="compareunc.tcsamount>0"><td> <b>TCS</b></td></tr>
                
                <tr ><td> <b>Total Amount</b></td></tr>
                
                
                <tr ng-if="compareunc.extra_included=='Extra'"><td> Freight</td></tr>
                <tr ng-if="compareunc.extra_included=='Extra'"><td> Extra per unit (KG/ton)</td></tr>
                <tr ng-if="compareunc.extra_included=='Extra'"><td> Freight GST 18 %</td></tr>
                <tr ng-if="compareunc.extra_included=='Extra'"><td> Freight Total</td></tr>
                
                <tr ><td> Action</td></tr>
                </table>
                </td>
                
                <td ng-style="compareunc.selected_status == 1 && {'background-color':'#ffe0e0'}">
               
               
               
               
               
                <table class="price-table">
             
            
                
                <tr><td> {{compareunc.timeline}}</td></tr>
                
                <tr><td> {{compareunc.payment_terms}}</td></tr>
                
                <tr ng-if="compareunc.payment_terms!='Advance'"><td > 
                  <span ng-if="compareunc.payment_terms!='Advance'">{{compareunc.due_date}}</span>
                 </td></tr>
                
                <tr ng-if="compareunc.remarks!=''"><td style="height: 40px;"> {{compareunc.remarks}} </td></tr>
                <tr>
                    
                    
                    <td data-bs-toggle="modal" ng-if="compareunc.attachement!=''" ng-click="seletQutationfile(compareunc.attachement)" data-bs-target="#previewPdf"><u><i class="mdi mdi-file-outline text-muted font-size-16  me-1"></i><span style="margin:3px;"> QUOTE </span></u></td>
                    <td  ng-if="compareunc.attachement==''" ><span style="margin:3px;"> No attachment </span></td>
                    
                    
                </tr>
               
                
                 
                 
                  <tr><td><b>Rs {{compareunc.totalamount | number : 2}}</b></td></tr>
                 
                 
                <tr><td><b>Rs {{compareunc.gstamount | number : 2}}</b></td></tr>
                
                
                 <tr ng-if="compareunc.totaltds!=0"><td><b>Rs {{compareunc.totaltds | number : 2}}</b></td></tr>
                 <tr ng-if="compareunc.tcsamount>0"><td><b>Rs {{compareunc.tcsamount | number : 2}}</b></td></tr>
                
                <tr><td><b>Rs {{compareunc.totalgst | number : 2}}</b></td></tr>
                
               
                
                 <tr ng-if="compareunc.extra_included=='Extra'"><td> {{compareunc.extra_included}} <span ng-if="compareunc.extra_unit>0">({{compareunc.extra_unit}})</span></td></tr>
                 <tr ng-if="compareunc.extra_included=='Extra'"><td > 
                 <span ng-if="compareunc.extra!=''">Rs {{compareunc.extra | number : 2}}</span>
                 
                 </td>
                 </tr>
                 
                 <tr ng-if="compareunc.extra_included=='Extra'"><td > 
                 <span ng-if="compareunc.extra_gst!=''">Rs {{compareunc.extra_gst | number : 2 }}</span>
                 
                 </td>
                 </tr>
                 
                 
                 <tr ng-if="compareunc.extra_included=='Extra'">
                     <td > 
                 <span ng-if="compareunc.extra_total!=''">Rs {{compareunc.extra_total | number : 2}}</span>
                 
                 </td>
                 </tr>
                
                
                <tr><td class="price" >
                    
                    
                    <span ng-if="order_base==1">
                          <a href="javascript:void(0);" ng-click="seletQutation(compareunc.id,compareunc.order_id,compareunc.vendor_id,compareunc.totalgst)">Select</a>
                   </span>
                   
                    
                      <span ng-if="compareunc.selected_status == 1">
                          
                            
                        <button   class="pobtn"  style="background: #ff1800;padding: 0px 10px;line-height: 24px;
                        ." ng-click="seletGenrate('<?php echo base_url(); ?>index.php/purchase/po?order_id=<?php echo $enable_order; ?>&old_tablename=<?php echo $old_tablename; ?>&old_tablename_sub=<?php echo $old_tablename_sub; ?>&tablename=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&movetablename=<?php echo $movetablename; ?>&movetablename_sub=<?php echo $movetablename_sub; ?>')">Generate PO</button>
                                 

<button type="button" ng-click="viewAddressCompany()" title="Select Address" class="btn btn-outline-primary"><i class="fa fa-address-card" aria-hidden="true"></i>

</button>

<button type="button" ng-click="addAddress()" title="Address Add" class="btn btn-outline-primary"><i class="fa fa-map-marker" aria-hidden="true"> + </i>
</button>



                          
                          </span>
                    
                    </td></tr>
                </table>
                </td>
                      
             </tr>
               
           
            
      
          <tbody>
            
        </tbody>
    </table>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
                
      

                  </div>
                  
                  
                  
                  
                  
               </div>
            </div>
         </div>
      </div>















 <div class="modal fade" id="firstmodal1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Success</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Requested To Purchase Enquiry <?php echo $order_title; ?>  : <b><?php echo $order_no; ?> </b></p>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>


 <div class="modal fade" id="firstmodal2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Success</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Purchase Enquiry Canceled <?php echo $order_title; ?>  : <b><?php echo $order_no; ?> </b></p>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>


 <div class="modal fade" id="firstmodal3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Success</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body table-responsive">
                                                            
                                                            
                     <table class="table table-bordered">
                      <tr>
                          <td>No</td>
                          <td>Vendor Name</td>
                          <td>Page Link</td>
                          
                      </tr>
                      <tr ng-repeat="datavendors in namesVendor" style="vertical-align: baseline;">
                          <td>{{datavendors.no}}</td>
                          <td>{{datavendors.name}}</td>
                        
                          <td><?php echo base_url(); ?>{{datavendors.link}}</td>
                          
                      </tr>
                  </table>
                                                          
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>


















 <div class="modal fade" id="perchaserequest" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Upload Invoice </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        
                                                        <form   ng-submit="submitPurchaseinvoice()" method="post">
                                                        <div class="modal-body">
                                                            
                                                                   <div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="successcc">
                                                                            <i class="mdi mdi-check-all me-2"></i>
                                                                           {{successMessagec}}
                                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                   </div>
                                                                   
                                                                   
                                                                   
                                                                    <div class="row">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group row">
                                                                       
                                                                        <div class="col-sm-12">
                                                                            <label>Invoice No</label>
                                                                          <input type="test2" style="padding:9px;" plaseholder="Enter the invoice no" required class="form-control"  id="invoiceno">
                                                                        <br>
                                                                        
                                                                
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                    
                                                                   
                                                                    
                                                                    </div>
                                                                             
                            
                                                                    <div class="row">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group row">
                                                                       
                                                                        <div class="col-sm-12">
                                                                          <input type="file" style="padding:9px;" file-input="files" required class="form-control"  id="fileupload2">
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                    
                                                                
                                                                    
                                                                    </div>
                                                                                                       
                                                           
                                                           
                                                            
                                                     
                                                       
                                                    </div>
                                                    
                                                                <div class="modal-footer">
                                                                
                                                                <button type="submit" class="btn btn-primary" id="uploadinvoice">Upload</button>
                                                              </div>
                                                    </form>
                                                </div>
                                              </div>

</div>








 <div class="modal fade" id="seetmode" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Priority </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        
                                                        <form   ng-submit="submitPriyarity()" method="post">
                                                        <div class="modal-body">
                                                            
                                                                   
                            
                                                                    <div class="row">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group row">
                                                                       
                                                                        <div class="col-sm-12">
                                                                         
                                                                         <lable>Priority option for payment</lable>
                                                                         <select class="form-control" id="priority">
                                                                             <option value="3">High</option>
                                                                             <option value="1">Medium</option>
                                                                             <option value="2">Low</option>
                                                                             
                                                                         </select>
                                                                         
                                                                         
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                    
                                                                
                                                                    
                                                                    </div>
                                                                                                       
                                                           
                                                           
                                                            
                                                     
                                                       
                                                    </div>
                                                    
                                                                <div class="modal-footer">
                                                                
                                                                <button type="submit" class="btn btn-primary" id="uploadinvoice">Save</button>
                                                              </div>
                                                    </form>
                                                </div>
                                              </div>

</div>












        <div id="previewPdf" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Purchase Quotation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <embed src="assets/invoice-sample.pdf" width="800px" id="embed" style="width:100%;min-height:70vh" />
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                            








































<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Create Invoice</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               
                                                               
                                                                <!--<form id="pristine-valid-example" novalidate method="post"></form>-->
                                                                
                                                                 <form id="pristine-valid-common" ng-submit="submitForm()" method="post" enctype="multipart/form-data">
                    
                    
                    
                    
                    
                    <div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="success">
                                            <i class="mdi mdi-check-all me-2"></i>
                                           {{successMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<div class="alert alert-danger alert-dismissible fade show" role="alert" ng-show="error">
                                            <i class="mdi mdi-block-helper me-2"></i>
                                            {{errorMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>



                       <div class="row">
                           
                        
                       
                      
                        
                      
                        
                          <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice No <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="inovice_no" class="form-control" plaseholder="Enter the invoice no"  name="inovice_no" required ng-model="inovice_no" type="test3">
                            </div>
                          </div>
                        </div>
                        
                        
                          <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice Attachment <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                            <input type="file" style="padding:9px;" file-input="files" required class="form-control"  id="fileupload2">
                            </div>
                          </div>
                        </div>
                      
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice Date <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="create_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="create_date" required  type="date">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice Amount <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="invoice_amount" class="form-control" readonly name="invoice_amount" required ng-model="invoice_amount" type="text">
                            </div>
                          </div>
                        </div>
                        
                         <div  class="col-md-12" id="showdata" ng-show="namesDataproduct.length>0" style="margin-top:20px;">
                                                              
                                                                <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         <th>#</th>
                                                                        
                                                                         <th>Product Name</th>
                                                                         <td>UNIT</td>
                                                                         <td>QTY</td>
                                                                         <th>Base Price</th>
                                                                         <th>Total_Amount
                                                                         
                                                                         
                                                                         <input type="hidden" id="totalextra" value="{{totalextra}}">
                                                                         
                                                                         </th>
                                                                     </tr>
                                                                     <tr  ng-repeat="namesp in namesDataproduct">
                                                                     
                                                                         <td><input type="checkbox" checked class="purchase_order_product_id" name="purchase_order_product_id" value="{{namesp.inward_id}}" data-set="{{namesp.inward_id}}" data-stock="{{namesp.id}}"></td>
                                                                         <td>{{namesp.product_name}}</td>
                                                                         <td>{{namesp.unit}}</td>
                                                                         <td><input type="textt" value="{{namesp.totalqty}}" id="qty_invoice_{{namesp.inward_id}}"  class="form-control purchase_qty" data-set="{{namesp.inward_id}}"  name="purchase_qty" ></td>
                                                                         <td><input type="textt" value="{{namesp.rate}}" id="price_invoice_{{namesp.inward_id}}"  class="form-control price"  data-set="{{namesp.inward_id}}" name="price" ></td>
                                                                         <td  class="totalv" id="dd_{{namesp.inward_id}}"> {{namesp.rowtotal}}</td>
                                     
                                     
                                     <script>
                                     $(document).ready(function()
                                     {
                                          
                                                           $('.price').on('input',function () {
          
                                                                                        var val= $(this).val();
                                                                                        var id= $(this).data('set');
                                                                                        var qty= $('#qty_invoice_'+id).val();
                                                                                        var totl=qty*val;
                                                                                        var totl=totl.toFixed(2);
                                                                                        $('#dd_'+id).html(totl);
                                                                                        
                                                                                          //var totalextra= parseFloat($('#totalextra').val());
                                                                                        var totalextra= 0;
                                                                                         var sum = 0
                                                                                         $('.totalv').each(function () {
                                                                                             
                                                                                                    
                                                                                                if($(this).html()=='')
                                                                                                {
                                                                                                    var combat = 0;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                     var combat = parseFloat($(this).html());
                                                                                                }
                                                                                                    
                                                                                               sum += parseFloat(combat);
                                                                                               
                                                                                             
                                                                                       });
                                                                                       
                                                                                        var totalsum=sum+totalextra;
                                                                                       var totalgst=totalsum*18/100;
                                                                                       var totalgst=totalgst;
                                                                                       var sumva=totalsum.toFixed(2);
                                                                                       $('#totalamount').html(sumva);
                                                                                       
                                                                                      
                                                                                       var Totalss=totalgst.toFixed(2);
                                                                                       
                                                                                       $('#gst').html(Totalss);
                                                                                       
                                                                                       
                                                                                     
                                                                                       
                                                                                       var Total=totalgst+totalsum;
                                                                                       
                                                                                       var Total=Total.toFixed(2);
                                                                                       
                                                                                       $('#totalamountgst').html(Total);
                                                                                        $('#invoice_amount').val(Total);
            
           
                                                                                    
                                                           });
                                                           
                                                           $('.purchase_qty').on('input',function () {
          
                                                                                        var val= $(this).val();
                                                                                        var id= $(this).data('set');
                                                                                        var qty= $('#price_invoice_'+id).val();
                                                                                        var totl=qty*val;
                                                                                        var totl=totl.toFixed(2);
                                                                                        $('#dd_'+id).html(totl);
                                                                                        //var totalextra= parseFloat($('#totalextra').val());
                                                                                        var totalextra= 0;
                                                                                         var sum = 0
                                                                                         $('.totalv').each(function () {
                                                                                             
                                                                                                    
                                                                                                if($(this).html()=='')
                                                                                                {
                                                                                                    var combat = 0;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                     var combat = parseFloat($(this).html());
                                                                                                }
                                                                                                    
                                                                                               sum += parseFloat(combat);
                                                                                               
                                                                                             
                                                                                       });
                                                                                       
                                                                                       var totalsum=sum+totalextra;
                                                                                       var totalgst=totalsum*18/100;
                                                                                       var totalgst=totalgst;
                                                                                       var sumva=totalsum.toFixed(2);
                                                                                       $('#totalamount').html(sumva);
                                                                                       
                                                                                      
                                                                                       var Totalss=totalgst.toFixed(2);
                                                                                       
                                                                                       $('#gst').html(Totalss);
                                                                                       
                                                                                       
                                                                                       
                                                                                       var Total=totalgst+totalsum;
                                                                                       
                                                                                       
                                                                                       
                                                                                       var Total=Total.toFixed(2);
                                                                                       
                                                                                       $('#totalamountgst').html(Total);
                                                                                       $('#invoice_amount').val(Total);
            
           
                                                                                    
                                                           });
                                                           
                                                           
                                    });
                                     </script>
                                                                     </tr>
                                                                     
                                                                     
                                                                     
                                                                     <tr ng-if="totalextra!=0" style="display:none;">
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Extra per unit (KG/ton) </td>
                                                                         <td >Rs.  {{totalextra  | number : 2}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Sub Total </td>
                                                                         <td id="totalamount">Rs.  {{subtotal  | number : 2}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                     
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>GST 18 % </td>
                                                                         <td id="gst">Rs.  {{gstamount  | number : 2}}</td>
                                                                     </tr>
                                                                     
                                                                      <tr ng-if="tcsamountinvoice">
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>TCS  </td>
                                                                         <td >Rs.  {{tcsamountinvoice  | number : 2}}</td>
                                                                     </tr>
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Total </td>
                                                                         <td id="totalamountgst">Rs. {{fulltotalinvoice  | number : 2}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>


                                          <div class="col-md-12" style="text-align: right;">
                                                <div class="d-flex align-items-center">
                                                   <div class="flex-grow-1">
                                                       <p>Round Off :<input type="text"  class="roundoff" id="roundoff" >
                                                                                    
                                                          <label for="set1"><input type="radio" name="convertPlus" checked value="1" id="set1"> <b style="font-size: 20px;">+</b> </label>
                                                          <label for="set2"><input type="radio" name="convertPlus" value="0" id="set2"> <b style="font-size: 20px;">-</b> </label>
                                                                                     
                                                      </p>
                                                   </div>
                                                </div>
                                             </div>
                          

                           <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Loading Charges</label>
                            <div class="col-sm-12">
                                <input type="texts" rows="4"  id="loading_charges" class="form-control"  name="loading_charges" >
                            
                            </div>
                          </div>
                        </div>

                       <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Remarks</label>
                            <div class="col-sm-12">
                                <textarea rows="4"  id="remarks" class="form-control"  name="remarks"    ng-model="remarks"></textarea>
                            
                            </div>
                          </div>
                        </div>

                    
                      
                     
                        
                        

                        
                     
                  
                        
                     
                        
                               
                        
                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                            
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" id="payment_create" value="CREATE">
                            </div>
                        </div>



                      </div>



                       






                      


                    </form>


                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->



        </div>
</div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    








<div class="modal fade" id="exampleModalScrollable_extra" tabindex="-1" role="dialog"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Create Freight Invoice</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               
                                                               
                                                                <!--<form id="pristine-valid-example" novalidate method="post"></form>-->
                                                                
                                                                 <form id="pristine-valid-common" ng-submit="submitFormextra()" method="post" enctype="multipart/form-data">
                    
                    
                    
                    
                    
                    <div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="success">
                                            <i class="mdi mdi-check-all me-2"></i>
                                           {{successMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<div class="alert alert-danger alert-dismissible fade show" role="alert" ng-show="error">
                                            <i class="mdi mdi-block-helper me-2"></i>
                                            {{errorMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>



                       <div class="row">
                           
                        
                       
                      
                        
                      
                        
                          <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice No <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="inovice_no_2" class="form-control" plaseholder="Enter the invoice no"  name="inovice_no_2" required ng-model="inovice_no_2" type="test3">
                            </div>
                          </div>
                        </div>
                        
                        
                          <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice Attachment <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                            <input type="file" style="padding:9px;" file-input="files" required class="form-control"  id="fileupload_2">
                            </div>
                          </div>
                        </div>
                      
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice Date <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="create_date_2" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="create_date" required  type="date">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice Amount <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="invoice_amount_2" class="form-control"  readonly name="invoice_amount_2" required ng-model="invoice_amount_2" type="text">
                            </div>
                          </div>
                        </div>
                        
                         <div  class="col-md-12"  ng-show="namesDataproduct.length>0" style="margin-top:20px;">
                                                              
                                                                <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         
                                                                         <th>Vehicle number</th>
                                                                         <th>Total Amount </th>
                                                                         
                                                                         
                                                                        
                                                                         
                                                                        
                                                                     </tr>
                                                                     <tr  >
                                                                     
                                                                         
                                                                         
                                                                        
                                                                        <td><input type="texts"    class="form-control vehicle_no" id="vehicle_no_extra"   name="vehicle_no" ></td>
                                                                        
                                                                        <td><input type="textt" style="text-align: right;" value="{{totalextra}}" id="totalextra_price"  class="form-control totalextraprice"   name="totalextraprice" ></td>
                                                                    
                                     
                                     
                                     
                                                                     </tr>
                                                                     
                                                                   
                                                                     
                                                                     <tr>
                                                                        
                                                                         
                                                                         <td style="text-align: right;">Sub Total </td>
                                                                         <td id="totalamount_2" style="text-align: right;">{{totalextra}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                     
                                                                     <tr>
                                                                        
                                                                         <td style="text-align: right;">GST 18 % </td>
                                                                         <td style="text-align: right;" id="gst_2">{{gstamount_extra}}</td>
                                                                     </tr>
                                                                     <tr>
                                                                        
                                                                         <td style="text-align: right;" >Total </td>
                                                                         <td style="text-align: right;" id="totalamountgst_2">{{fulltotal_extra}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                  <script>
                                     $(document).ready(function()
                                     {
                                          
                                                          
                                                           $('#totalextra_price').on('input',function () {
          
                                                                                        var val= parseFloat($(this).val());
                                                                                        var totalsum=val;
                                                                                        var totalgst=totalsum*18/100;
                                                                                        var totalgst=totalgst;
                                                                                        var sumva=totalsum.toFixed(2);
                                                                                        $('#totalamount_').html(sumva);
                                                                                       
                                                                                      
                                                                                       var Totalss=totalgst.toFixed(2);
                                                                                       $('#gst_2').html(Totalss);
                                                                                       var Total=totalgst+totalsum;
                                                                                       
                                                                                       
                                                                                       
                                                                                       var Total=Total.toFixed(2);
                                                                                       
                                                                                       $('#totalamount_2').html(sumva);
                                                                                       $('#totalamountgst_2').html(Total);
                                                                                       $('#invoice_amount_2').val(Total);
            
           
                                                                                    
                                                           });
                                                           
                                                           
                                    });
                                     </script>
                                                                 
                                                                </div>

                        
                       <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Remarks</label>
                            <div class="col-sm-12">
                                <textarea rows="4"  id="remarks_2" class="form-control"  name="remarks"    ng-model="remarks"></textarea>
                            
                            </div>
                          </div>
                        </div>

                    
                      
                     
                        
                        

                        
                     
                  
                        
                     
                        
                               
                        
                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                            
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" id="payment_create_2" value="CREATE">
                            </div>
                        </div>



                      </div>



                       






                      


                    </form>


                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->



        </div>
</div>


















 <div class="modal fade" id="exampleModalScrollable_1" tabindex="-1" role="dialog"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Invoice Payout</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               
                                                               
                                                              
                                                                
                                                                 <form  ng-submit="submitForm_1()" method="post" enctype="multipart/form-data">
                    
                    
                    
                    
                    
                    <div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="success">
                                            <i class="mdi mdi-check-all me-2"></i>
                                           {{successMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<div class="alert alert-danger alert-dismissible fade show" role="alert" ng-show="error">
                                            <i class="mdi mdi-block-helper me-2"></i>
                                            {{errorMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

   <div ng-init="fetchDataaddress()" ng-show="namesDataaddress.length>0">
                                                      <h3>Product View</h3>
                                                                
                                                                <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         <th>No</th>
                                                                         <th>Product Name</th>
                                                                          <td>UNIT</td>
                                                                         <td>QTY</td>
                                                                         <td>Price</td>
                                                                         <td>Total Amount</td>
                                                                     </tr>
                                                                     <tr  ng-repeat="names in namesDataaddress">
                                                                         <th>{{names.no}}</th>
                                                                         <th>{{names.product_name}}</th>
                                                                         <th>{{names.unit}}</th>
                                                                         <td>{{names.qty}}</td>
                                                                         <td>{{names.price}}</td>
                                                                         <td>{{names.row_total}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                     
                                                                       <tr ng-if="invoice_totalextra!=0" style="display:none;">
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Extra per unit (KG/ton) </td>
                                                                         <td>Rs. {{invoice_totalextra | number : 2}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Sub Total </td>
                                                                         <td>Rs. {{invoice_subtotal | number : 2}}</td>
                                                                     </tr>
                                                                     
                                                                   <tr ng-if="loading_charges>0">
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Loading Charges </td>
                                                                         <td>Rs. {{loading_charges | number : 2}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>GST 18 % </td>
                                                                         <td>Rs. {{invoice_gstamount | number : 2}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr ng-if="invoice_tcsamount>0">
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>TCS </td>
                                                                         <td>Rs. {{invoice_tcsamount | number : 2}}</td>
                                                                     </tr>

                                                                       <tr ng-if="roundoffset>0">
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Round Off </td>
                                                                         <td>Rs. {{roundoffset | number : 2}} {{convert_status}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Total </td>
                                                                         <td>Rs. {{invoice_fulltotal | number : 2}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>



                       <div class="row">
                           
                           
                        
            
                           <div class="form-group col-md-6">
                           <label class="col-sm-12 col-form-label">Amount <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                            <input type="text"   style="padding:9px;" class="form-control" required  id="vendor_amount">                            
                            </div>
                             </div>
                             
                             
                             <div class="form-group col-md-6">
                                   <label class="col-sm-12 col-form-label">Payment Type <span style="color:red;">*</span></label>
                                    <div class="col-sm-12">
                                     <select class="form-control" name="payment_type" required id="payment_type">
                                     <option value="Full">Full</option>
                                     <option value="Partial">Partial Payment</option>
                                     <option value="Schedule Payment">Schedule Payment</option>
                                     </select>                          
                                    </div>
                             </div>
                       
                           <div class="form-group col-md-6" id="displaySchedule" style="display:none;">
                           <label class="col-sm-12 col-form-label">Schedule Date <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                            <input type="date"   style="padding:9px;" class="form-control"   id="schedule_date">                            
                            </div>
                             </div>
                             
                             
                              <div class="form-group col-md-6 schedule">
                           <label class="col-sm-12 col-form-label">Payment Mode <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                           <select class="form-control" name="payment_mode_payoff"  id="payment_mode_payoff">
                                                                      
                                                                        <option value="">Select Mode</option>
                                                                       <option value="Petty Cash">Petty Cash</option>
                                                                       <option value="Cheque">Cheque</option>
                                                                       <option value="NEFT/RTGS">NEFT/RTGS</option>
                                                                      
                         </select>                   
                            </div>
                             </div>
                             
                             
                             
                               <div id="bankaccountshow" class="form-group col-md-6 schedule" style="display:none;">
                           <label class="col-sm-12 col-form-label" id="base_title">Bank Account <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             
                                                                  <select class="form-control" name="bankaccount"  ng-change="Getbankaccount()" ng-model="getbank" id="bankaccount">
                                                                      
                                                                      
                                                                      <option value="0">Select Account</option>
                                                                      
                                                                  </select>
                                                                  
                                                                   <span ng-if="account_no"> <b> Available Balance : {{current_amount | number}}</b></span>                    
                            </div>
                             </div>
                             
                             
                               <div class="form-group col-md-6 schedule">
                              <label class="col-sm-12 col-form-label">Delivery Status <span style="color:red;">*</span></label>
                              <div class="col-sm-12">
                              <select class="form-control" name="delivery_status"  id="delivery_status">
                                                             
                                         <option value="">Select</option>     
                                         <option value="3">Partial Dispatch</option>
                                         <option value="5">Dispatch</option>
                                         <option value="6">Delivered</option> 
                                        
                                                                              
                                </select>                          
                            </div>
                  </div>
                  
                  
                                <div class="form-group col-md-6 schedule">
                              <label class="col-sm-12 col-form-label">PayOut Date <span style="color:red;">*</span></label>
                              <div class="col-sm-12">
                                <input type="date" id="payout_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">                      
                            </div>
                   </div> 



                           <div class="form-group col-md-6" style="display:none;">
                                  <label class="col-sm-12 col-form-label">Coil Number </label>
                                  <div class="col-sm-12">
                                    <input type="text" id="coil_no" class="form-control">                      
                                </div>
                           </div> 

                        
                           <div class="col-md-12">
                              <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Narration <span style="color:red;">*</span></label>
                                <div class="col-sm-12">
                                    <textarea rows="4"  id="remarks_2" class="form-control"  name="remarks_2"   required ng-model="remarks_2"></textarea>
                                
                                </div>
                              </div>
                            </div>

                    
                      
                     
                        
                        

                        
                     
                  
                        
                     
                        
                               
                        
                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                              <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light"  id="payoutbutton" type="submit" value="PAYOUT">
                            </div>
                        </div>



                      </div>



                       



                                               
                      


                    </form>


                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->



        </div>
















<div class="modal fade" id="exampleModalScrollable_C" tabindex="-1" role="dialog"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Create Complaint</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               
                                                               
                                                                <!--<form id="pristine-valid-example" novalidate method="post"></form>-->
                                                                
                                                                 <form id="pristine-valid-common" ng-submit="submitFormC()" method="post" enctype="multipart/form-data">
                    
                    
                    
                    
                    
                    <div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="success">
                                            <i class="mdi mdi-check-all me-2"></i>
                                           {{successMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<div class="alert alert-danger alert-dismissible fade show" role="alert" ng-show="error">
                                            <i class="mdi mdi-block-helper me-2"></i>
                                            {{errorMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>



                       <div class="row">
                           
                  
                      
                        
                      
                        
                        
                      
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Create Date <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="complient_date" class="form-control"  value="<?php echo date('Y-m-d'); ?>" name="create_date" required  type="date">
                            </div>
                          </div>
                        </div>
                        
                         <div  class="col-md-12" id="showdataC" ng-show="namesDataproductC.length>0" style="margin-top:20px;">
                                                              
                                                                <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         <th>#</th>
                                                                        
                                                                         <th>Product Name</th>
                                                                         <td>Coil NO</td>
                                                                         <td>QTY</td>
                                                                         <!--<td>Rate</td>-->
                                                                         <td>Complaint</td>
                                                                        
                                                                     </tr>
                                                                     <tr  ng-repeat="namespp in namesDataproductC">
                                                                     
                                                                         <td><input type="checkbox" class="purchase_order_product_id_c" name="purchase_order_product_id_c" value="{{namespp.id}}_{{namespp.baseid}}"></td>
                                                                         
                                                                         <td>{{namespp.product_name}}</td>
                                                                         <td>{{namespp.coil_no}}</td>
                                                                         <td><input type="textt" value="{{namespp.qty}}" class="form-control purchase_qty_c" name="purchase_qty_c" ></td>
                                                                         <!--<td>{{namesp.rate}}</td>-->
                                                                         
                                                                          <td><input type="textt" class="form-control purchase_notes" name="purchase_notes" ></td>
                                                                         
                                                                       
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>

                        
                       <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Remarks</label>
                            <div class="col-sm-12">
                                <textarea rows="4"  id="remarks_c" class="form-control"  name="remarks"    ></textarea>
                            
                            </div>
                          </div>
                        </div>

                    
                      
                     
                        
                        

                        
                     
                  
                        
                     
                        
                               
                        
                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                            
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="CREATE">
                            </div>
                        </div>



                      </div>



                       






                      


                    </form>


                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->



        </div>









<div class="modal fade" id="allinvoice" tabindex="-1" role="dialog"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-lg" style="max-width: 80%;">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Invoice List</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               
                                                               
                                                              
                                                             
                    
                   

   <div  ng-show="namesDatainvoice.length>0">
                                                              
                                                                <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         <th>No</th>
                                                                         <th>PO No</th>
                                                                         <th>Invoice NO</th>
                                                                         <!--<td>Vendor</td>-->
                                                                         <th>Invoice Amount</th>
                                                                         <th>Paid Amount</th>
                                                                         <th>Pending Amount</th>
                                                                         <th>Invoice Date</th>
                                                                         
                                                                         <th>Attachment</th>
                                                                         <th>Status</th>
                                                                         <th>Remarks</th>
                                                                         <th>Action</th>
                                                                     </tr>
                                                                     <tr  ng-repeat="names in namesDatainvoice">
                                                                         <th>{{names.no}}</th>
                                                                          <th>{{names.po_number}}</th>
                                                                         <th>{{names.invoice_no}}</th>
                                                                         <!--<th>{{names.vendor_name}}</th>-->
                                                                         <td>{{names.invoice_amount}}</td>
                                                                         <td>{{names.payout_amount}}</td>
                                                                         <td><span style="color:red;">{{names.pending_amount}}</span></td>
                                                                         <td>{{names.invoice_date}}</td>
                                                                         <td><a href="{{names.attachment}}" target="_blank"> File </a></td>
                                                                         <td>{{names.status_data}}  </td>
                                                                         <td>{{names.remarks}} {{names.schedule_date_value}}</td>
                                                                         <td>
                                                                             
                                                                             <span ng-if="names.extra_invoice_status==0">
                                                                                
                                                                                 <a href=" <?php echo base_url(); ?>index.php/purchase/invoice?order_id={{names.base_id}}&invoice_id={{names.id}}&invoice_no={{names.invoice_no}}&old_tablename=0&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process" class="btn btn-soft-secondary  btn-sm onclick" target="_blank"> Invoice </a>
                                                                             
                                                                             </span>
                                                                             
                                                                             
                                                                             <span ng-if="names.extra_invoice_status==1">
                                                                                
                                                                                 <a href=" <?php echo base_url(); ?>index.php/purchase/invoice_extra?order_id={{names.base_id}}&invoice_id={{names.id}}&invoice_no={{names.invoice_no}}&old_tablename=0&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process" class="btn btn-soft-secondary  btn-sm onclick" target="_blank"> Freight Invoice </a>
                                                                             
                                                                             </span>
                                                                             
                                                                             <a href="javascript:void(0)" class="btn btn-soft-primary  btn-sm onclick" ng-click="viewAddress(names.id)"> Payout </a>
                                                                             
                                                                             
                                                                             </td>
                                                                     </tr>
                                                                     
                                                                     
                                                                     
                                                                    
                                                                    
                                                                   
                                                                     
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>



                       
                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->



        </div>






















                                                                    <?php
                                                                           
                                                                                foreach($racksetup as $set)
                                                                                {
                                                                                   $rack= $set->rack;
                                                                                   $bin_col= $set->bin_col;
                                                                                   $bin_row= $set->bin_row;
                                                                                   $val= $bin_col*$bin_row;
                                                                                   $alpha=explode(',',$rack);
                                                                                }
                                                                                
                                                                            ?>


 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Update Product Coil Number</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               
                                                               
                                                                
                                                                 <form id="pristine-valid-common" ng-submit="submitFormCoil()" method="post" enctype="multipart/form-data">
                    
                    
                    
                    
                    
                    <div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="success">
                                            <i class="mdi mdi-check-all me-2"></i>
                                           {{successMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<div class="alert alert-danger alert-dismissible fade show" role="alert" ng-show="error">
                                            <i class="mdi mdi-block-helper me-2"></i>
                                            {{errorMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>



                       <div class="row">
                           
                           
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Product Name <span style="color:red;">*</span></label>
                            <input type="hidden" id="product_purcahse_id">
                            
                            <b class="col-sm-12" id="product_id">
                               
                            </b>
                          </div>
                        </div>
                        
                         
                        
                        <div class="col-md-6" style="display:none;">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">PO Number <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="invoice_po_no" class="form-control" required name="invoice_po_no" readonly ng-model="invoice_po_no" type="text">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row" style="display:none;">
                            <label class="col-sm-12 col-form-label">Purchase Price <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="invoice_price" class="form-control" name="invoice_price" readonly   required ng-model="invoice_price" type="text">
                            </div>
                          </div>
                        </div>
                        
                          <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">QTY : <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              
                              <input id="invoice_qty"   class="form-control"  name="invoice_qty"   type="text">
                              
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6" style="display:none;">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Total Amount <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="invoice_total_amount" class="form-control" readonly name="invoice_total_amount"   required ng-model="invoice_total_amount" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        
                      
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">COIL NO <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="invoice_coil_no" class="form-control" name="invoice_coil_no" required  ng-model="invoice_coil_no" type="text">
                            </div>
                          </div>
                        </div>

                          <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Vehicle No <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="vehicle_no" class="form-control" name="vehicle_no" required  ng-model="vehicle_no" type="text">
                            </div>
                          </div>
                        </div>

                      
                     
                        
                           <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Inward Date</label>
                            <div class="col-sm-12">
                              <input id="inward_date" class="form-control"  name="inward_date"  ng-model="inward_date" type="date" >
                            </div>
                          </div>
                        </div>
                        
                        

                        
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Bay info</label>
                            <div class="col-sm-12">
                             <select class="form-control" name="rack_info" ng-model="rack_info" id="rack_info">
                                                                              <option value="">SELECT</option>
                                                                              <?php
                                                                                  for($i=0;$i<count($alpha);$i++)
                                                                                   {
                                                                                       ?>
                                                                                      
                                                                                             <option value="<?php echo $alpha[$i]; ?>" ><?php echo $alpha[$i]; ?></option>
                                                                                    
                                                                                       <?php
                                                                                    
                                                                                   }
                                                                              ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Bin info</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="bin_info" ng-model="bin_info" id="bin_info">
                                                                              <option value="">SELECT</option>
                                                                              <?php
                                                                                  for($j=0;$j<$val;$j++)
                                                                                   {
                                                                                       ?>
                                                                                      
                                                                                             <option value="<?php echo $j+1; ?>"><?php echo $j+1; ?></option>
                                                                                    
                                                                                       <?php
                                                                                    
                                                                                   }
                                                                              ?>
                                                                            </select>
                              
                            </div>
                          </div>
                        </div>
                        
                        
                        
                     
                        
                               
                        
                         <div class="col-md-12 mt-4" >
                          <div class="form-group flaot-end text-end">
                              
                              
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" id="coinupdatebutton" type="submit" value="UPDATE">
                            </div>
                        </div>



                      </div>



                       






                      


                    </form>


                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->



        </div>
        
        


















































                                    
             

  <div class="modal fade" id="exampleModalScrollable1" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Address Add</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                              <div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="success">
                                            <i class="mdi mdi-check-all me-2"></i>
                                           {{successMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<div class="alert alert-danger alert-dismissible fade show" role="alert" ng-show="error">
                                            <i class="mdi mdi-block-helper me-2"></i>
                                            {{errorMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

                      
  
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                <form id="pristine-valid-example" novalidate method="post"></form>
                                                                
                                                                <form id="pristine-valid-common" ng-submit="submitFormAddress()" method="post">
                    



                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Contact name <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="name" class="form-control" required name="name" ng-model="name" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Contact Phone <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="phone" class="form-control" name="phone"   required ng-model="phone" type="phone">
                            </div>
                          </div>
                        </div>
                      
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label"> Address line 1 <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="address1" class="form-control" name="address1" required ng-model="address1" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label"> Address line 2</label>
                            <div class="col-sm-12">
                             <input id="address2" class="form-control" name="address2"   ng-model="address2" type="address2">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Locality <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                               <select class="form-control" name="locality" required ng-model="locality">

                              <option value=""> Select locality</option>

                              <?php
                                foreach ($locality as $value) {

                                  ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                      
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Pincode <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="pincode" class="form-control" ng-blur="getpencodeDetails($event)" name="pincode" required ng-model="pincode" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Landmark </label>
                            <div class="col-sm-12">
                             <input id="landmark" class="form-control" name="landmark"    ng-model="landmark" type="landmark">
                            </div>
                          </div>
                        </div>

                       
                     
                         

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Zone <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="locality" class="form-control" name="zone" required   ng-model="zone" type="zone">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">City <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="city" class="form-control" name="city" required ng-model="city" type="text">
                            </div>
                          </div>
                        </div>
                        
                      
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">State <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="state" class="form-control" name="state"  required  ng-model="state" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                         <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Google Location (Lat,Long) </label>
                            <div class="col-sm-12">
                             <input id="google_map_link" class="form-control" name="google_map_link"    ng-model="google_map_link" type="text">
                            </div>
                          </div>
                        </div>

                        
                      </div>

                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                       
                                                     
                                                                
                                                                
                                                              
                                                                
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="{{submit_button}}">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                               
                                                            </div>
                                                            
                                                               </form>  
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                
                                      
                                                
                                                
                    

  <div class="modal fade" id="fetchDataaddresscompany" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Address View</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                              
                                                                
                                                                <div ng-init="fetchDataaddresscompany()">
                                                                
                                 <table class="table" ng-repeat="names in namesDataaddresscompany" ng-style="names.checked == 1 && {'background':'#ffcda9'}">
                                                                    
                                                                     <tr style="background: #f1f1f1;">
                                                                        
                                                                         <td colspan="3" ><label for="set_{{names.id}}" style="cursor: pointer;margin-bottom: 0px;"><b>{{names.no}} .</b> Select Address </label> 

 <input type="radio" id="set_{{names.id}}" name="selecaddress"  ng-checked="names.checked==1" ng-click="pointDataaddress(names.id)" class="btn btn--danger">


                                                                          <button type="button" ng-click="deleteDataaddress(names.id,hidden_id)" style="float:right;" class="btn btn--danger"><i class="mdi mdi-delete menu-icon"></i></button>


                                                                 

                                                                         </td>
                                                                     </tr>
                                                                    
                                                                     <tr>
                                                                         <th>Contact Name</th>
                                                                         <th>:</th>
                                                                         <td>{{names.name}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <th>Contact Phone </th>
                                                                         <th>:</th>
                                                                         <td>{{names.phone}} </td>
                                                                     </tr>
                                                                     
                                                                      <tr>
                                                                         <th>Address  </th>
                                                                         <th>:</th>
                                                                         <td>{{names.address}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                      <tr>
                                                                         <th>Google Location (Lat,Long)  </th>
                                                                         <th>:</th>
                                                                         <td>{{names.google_map_link}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                    
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                               
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                










<script>

$(document).ready(function(){
    
$('#bankaccountshow').show();    
$("#autocomplete").focus();




 $('#payment_type').on('change',function(){
      
      var val=$(this).val();
      
      if(val=='Schedule Payment')
      {
          
          $('#displaySchedule').show();
          $('#rowdisplayset').hide();
          $('.schedule').hide();
          $('#payment_mode_payoff').prop('required',false);
          
          
      }
      else if(val=='Partial')
      {
          
            $('#displaySchedule').hide();
            $('#rowdisplayset').show();
            $('.schedule').show();
            $('#payment_mode_payoff').prop('required',true);
            $('#displayParicelqty').show();
          
      }
      else
      {
            $('#displaySchedule').hide();
            $('#rowdisplayset').show();
             $('.schedule').show();
            $('#payment_mode_payoff').prop('required',true);
      }

});
      



  $('#payment_mode_payoff').on('change',function(){
      
      var val=$(this).val();
      
       if(val=='NEFT/RTGS' ||  val=='Cheque')
      {
          
         
          $('#base_title').html('Bank Account');
          var data='<option value="0">Select Bank</option> <?php foreach($bankaccount as $val) { if($val->id!=25 && $val->id!=24) { ?> <option value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
           $('#res_no').show();
           $('#bankaccountshow').show();
      }
      if(val=='Petty Cash')
      {
          
          $('#base_title').html('Cash Account');
          var data='<?php foreach($bankaccount as $val) { if($val->id==24) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
          $('#res_no').show();
          $('#bankaccountshow').show();
          
      }
      
  });


});



var app = angular.module('crudApp', ['datatables']);

app.directive("fileInput", function($parse){  
                    return{  
                         link: function($scope, element, attrs){  
                              element.on("change", function(event){  
                                   var files = event.target.files;  
                                   $parse(attrs.fileInput).assign($scope, element[0].files);  
                                   $scope.$apply();  
                              });  
                         }  
                    }  
});  



app.controller('crudController', function($scope, $http){
    
    
    
    
     
      $scope.openupload=function(){
          
           $('#perchaserequest').modal('toggle');
      }; 
     
     $scope.completeProduct=function()
     {
                 
                    $( "#autocomplete" ).autocomplete({
                      source: $scope.availableProducts
                    });
                     
                    
                    
                        $http({
                           
                                  method:"POST",
                                  url:"<?php echo base_url() ?>index.php/order/fetchproduct_full_purchase_name",
                                  data:{'action':'fetch_single_data','cateid':0,'order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                  }).success(function(data){
                            
                                      $scope.availableProducts = data;
                                 
                          });
    
                    
            
            
     }; 
     
     
      $scope.seletQutationfile=function(srcfile){ 
           
           
           $('#embed').attr('src',srcfile);
           
     };
     
     
      $scope.seletQutation=function(id,order_id,vendor_id,amount){ 
           
           
                           $http({
                            method:"POST",
                            url:"<?php echo base_url() ?>index.php/purchase/order_quotation_request_select",
                            data:{'purchase_order_quotation_id':id,'order_id':'<?php echo $order_id; ?>','vendor_id':vendor_id,'amount':amount}
                            }).success(function(data){
                                
                                
                                
                                $scope.getcompare();
                                $scope.fetchVendor();
                                $scope.fetchData('1');
                                $scope.fetchSingleDatatotal(1);
                                $scope.inserthistory(4,'Vendor Seleted',vendor_id);
                                
                             
                           }); 
           
     };
     
     
     
      $scope.seletGenrate=function(url){ 
          
          
          
           $('#pourl').val(url);
        
           $('#seetmode').modal('toggle');
           
        
           
     };
     
     
     
     
    $scope.getcompareProduct=function(){  
        
        
            $http.get('<?php echo base_url() ?>index.php/purchase/fetchcomapredata?order_id=<?php echo $order_id; ?>').success(function(data){
            $scope.getcomparedata = data;
            $scope.product_name_compare=data[0].product_name;
            $scope.compare_qty=data[0].qty;
            $scope.compare_uom=data[0].uom;
          
           });
    };
           
     $scope.getcompareold=function(){ 
         
        
           
           
            $http.get('<?php echo base_url() ?>index.php/purchase/fetchcomapredata?order_id=<?php echo $order_id; ?>').success(function(data){
            $scope.getcomparedata = data;
            
             $scope.product_name_compare=data[0].product_name;
             $scope.compare_qty=data[0].qty;
             $scope.compare_uom=data[0].uom;
            
            
            });
            
            
          
           
           
           
         
     };
     
     
     
          $scope.getcompare=function(){ 
         
         
           $http.get('<?php echo base_url() ?>index.php/purchase/fetchcomapredata_vendor?order_id=<?php echo $order_id; ?>').success(function(data){
           $scope.getcomparedatavendor = data;
           });
           
           
           
            $http.get('<?php echo base_url() ?>index.php/purchase/fetchcomapredata?order_id=<?php echo $order_id; ?>').success(function(data){
            $scope.getcomparedata = data;
            });
            
            
            $http.get('<?php echo base_url() ?>index.php/purchase/fetchcomapredata_unic_vendor?order_id=<?php echo $order_id; ?>').success(function(data){
            $scope.getcomparedataunc = data;
            });
           
           
           
         
     };
     
     
     
     
      $scope.onClickgetvendor=function(vendorid){ 
          
         
         
          $http.get('<?php echo base_url() ?>index.php/purchase/fetchDatavendorsdataseletet?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&vendorid='+vendorid).success(function(data){
      
      
           $scope.namesVendorselect = data;
          
        
          
          });
          
          
          
          
          
          
          $scope.fetchhistory(vendorid,'<?php echo $order_id; ?>');  
          $scope.getProductlist_get(vendorid);

         
          
      }; 
     
     
     
     
     
      $scope.onClickPayment=function(vendorid){ 
          
         
          $scope.fetchpaymenthistory(vendorid,'<?php echo $order_id; ?>');  
          
          
          
      }; 
     
           $scope.onClickDelivery=function(vendorid){ 
          
         
          $scope.fetchdeleveryhistory(vendorid,'<?php echo $order_id; ?>');  
          
          
          
      }; 
     
     
     
     
     $scope.fetchhistory=function(vendorid,orderid){
          
          
           
           $http.get('<?php echo base_url() ?>index.php/purchase/purchase_order_remarks_history?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&vendorid='+vendorid).success(function(data){
      
      
           $scope.remarksHistory = data;
          
        
          
          });
          
          
      };
      
      
      
      
      
      
 $scope.deleteData_histrory = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/purchase/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'purchase_order'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        var vendor_id=$('#vendor_id_fix').val();
        $scope.fetchhistory(vendor_id,'<?php echo $order_id; ?>');  
      }); 
    }
};
      
      
      
       $scope.fetchpaymenthistory=function(vendorid,orderid){
          
          
           
           $http.get('<?php echo base_url() ?>index.php/purchase/purchase_order_payment_history?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&vendorid='+vendorid).success(function(data){
      
      
           $scope.paymentHistory = data;
          
          
          
             var amounttotal = 0;
            for(var i = 0; i < data.length; i++){
                var amount = parseInt(data[i].amount);
                amounttotal += amount;
            }
             $scope.amounttotal = amounttotal;
      
        
          
          });
          
          
      };
      
      
      $scope.fetchdeleveryhistory=function(vendorid,orderid){
          
          
           
           $http.get('<?php echo base_url() ?>index.php/purchase/purchase_order_delevery_history?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&vendorid='+vendorid).success(function(data){
      
      
            $scope.deleveryHistory = data;
          
          
          
          });
          
          
      };
      
      
      
      
          
        
 
  
    
   
   
    
    
   
    
 
    
    
    
   
    
 
  $scope.vendorcount=0;
    
  $scope.success = false;
  $scope.error = false;



       

// search end










































$scope.inputsave_1 = function (id,inputname,categories_id,type) {


                     
                     
                       var fieds=inputname+'_'+id;
                       var values=$('#'+fieds).val();
                          
                         
            
                       $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/purchase/insertandupdate?order_id=<?php echo $order_id; ?>",
                          data:{'inputname':inputname,'values':values,'id':id,'action':'InputUpdate','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                        }).success(function(data){
                    
                          
                             
                       });
                       
                       
                       
                       var ratetotal=parseFloat($('#rate_'+id).val());
                       var qtytotal=parseFloat($('#qty_'+id).val());
                       
                       
                       var toatlamt=ratetotal*qtytotal;
                       
                       var toatlamtamm=toatlamt.toFixed(2);
                       $('#amount_'+id).html(toatlamtamm);
                       
                       
                       
                       if(inputname=='qty')
                       {
                           $scope.fetchSingleDatatotal(1);
            
                       }
                      

}








$scope.inputsave_inward_1 = function (id,inputname,categories_id,type) {

                    
                    
                    
                     var dataset=parseFloat($('#modify_qty_'+id).data('set'));
                     var datatotal=parseFloat($('#modify_qty_'+id).data('total'));
                     var getval=parseFloat($('#modify_qty_'+id).val());
                     var totalvalidation=datatotal-dataset;
                     
                      if(inputname=='modify_qty')
                      {
                             if(totalvalidation>=getval)
                             {
                                 
                                 var status=1;
                                  $('#modify_qty_'+id).css("background-color","#fff");
                             }
                             else
                             {
                                var status=1;
                                
                                //$('#modify_qty_'+id).val('');
                                //$('#modify_qty_'+id).css("background-color","#ffc8c8");
                                
                             }
                          
                      }
                      else
                      {
                           var status=1;
                      }
                        
                         
                         var fieds=inputname+'_'+id;
                         var values=$('#'+fieds).val();
                          
                    
                    if(status==1)
                    {
                        
                        
                    
            
                       $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/purchase/insertandupdate?order_id=<?php echo $order_id; ?>",
                          data:{'inputname':inputname,'values':values,'id':id,'action':'inwardupdate_data','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                        }).success(function(data){
                    
                          
                             
                       });
                       
                       
                    }
                       
                       
                       
                      

};











$scope.saveVendor = function () {



var vendor_id=$('#choices-single-default').val();

 if(vendor_id!="")
 {
     
     
    
    
    
    var vendorcheck=$('#vendorcheck').val();

    
    if(vendorcheck>0)
    {
        
        
              $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/purchase/vendorupdate?order_id=<?php echo $order_id; ?>",
              data:{'vendor_ids':vendor_id,'order_id':'<?php echo $order_id; ?>','count_id':'<?php echo $count_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
               }).success(function(data){
        
              if(data.error != '1')
              {
                  
                  $('#choices-single-default').val('');
                  $('#exampleModal').modal('toggle');
                  $scope.fetchDatavendorsdata();
                  $scope.fetchSingleDatatotal(1);
        
              }
        
            });
    
    
    
        
    }
    else
    {
        
        
        
              $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/purchase/vendorupdateinsert?order_id=<?php echo $order_id; ?>",
              data:{'vendor_ids':vendor_id,'order_id':'<?php echo $order_id; ?>','count_id':'<?php echo $count_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
               }).success(function(data){
        
              if(data.error != '1')
              {
                  
                 
                  
                     window.location.href=location.pathname+'?order_id='+data.id;
                 
                  $('#choices-single-default').val('');
                  $('#exampleModal').modal('toggle');
                  $scope.fetchDatavendorsdata();
                  $scope.fetchSingleDatatotal(1);
        
              }
        
            });
        
    }
     
     
     
  
    
    
    
    
    
    
    
    
    
    
     
 }
 else
 {
     alert('Please fill Vendor');
 }




};































$scope.approved = function(id,status,reason){
    
    
                    if(status==-1)
                    {
                        
                             $('#firstmodal2').modal('toggle');
                             var result=1;
                        
                         
                    }
                    else
                    {
                        
                            $('#firstmodal1').modal('toggle');
                            var result=1;
                           
                        
                         
                    }
                    
                   
    
                   if(result==1)
                   {
                          $http({
                            method:"POST",
                            url:"<?php echo base_url() ?>index.php/order/order_quotation_request",
                            data:{'order_id':id,'reason':reason,'order_no':'<?php echo $order_no; ?>','status':status,'deleteid':status, 'action':'Deletesub','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                          }).success(function(data){
                           
                             
                               $scope.fetchData('1');
                               $scope.fetchSingleDatatotal('1');
                                
                             
                          }); 
                          
                          
                          
                          
                         
                          $scope.inserthistory(1,'Requested Enquiry',0);
                                     
                                     
                              
                          
                          
                          
                          
                          
                          
                   }
                   
                   
                   
                   
                   
                   
                   
                   
                   
};




$scope.inserthistory = function(order_process,processtext,vendor_id){
    
                           $http({
                            method:"POST",
                            url:"<?php echo base_url() ?>index.php/purchase/order_process_history",
                            data:{'order_id':'<?php echo $order_id; ?>','order_process':order_process,'processtext':processtext,'vendor_id':vendor_id}
                           }).success(function(data){
                           
                          }); 
                          
    
}










$scope.addAddress = function(){
    
    
   $('#exampleModalScrollable1').modal('toggle');
    $scope.submit_button = 'ADD ADDRESS';


};














$scope.viewAddressCompany = function(){
    
    
   $('#fetchDataaddresscompany').modal('toggle');
    

   $scope.fetchDataaddresscompany();
  
    
};

$scope.pointDataaddress= function(id){
    if(confirm("Are you sure you want to update the address?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/purchase/addresspoint",
        data:{'address_id':id,'order_id':'<?php echo $order_id; ?>','tablenamemain':'purchase_orders_process'}
      }).success(function(data){
          
           $scope.fetchDataaddresscompany();
            
      }); 
    }
};


$scope.deleteDataaddress= function(id,hidden_id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'purchase_adddrss'}
      }).success(function(data){
         $scope.fetchDataaddresscompany();
      }); 
    }
};




   $scope.fetchDataaddresscompany = function(){
      
     $http.get('<?php echo base_url() ?>index.php/purchase/fetch_data_address?order_id='+<?php echo $order_id; ?>).success(function(dataaddress){
      
      
       $scope.namesDataaddresscompany = dataaddress;
      
       
     });
        
   };
   
   

   
   
   $scope.submitFormAddress = function(){
      
 
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/addressadd",
       data:{'status':'1','zone':$scope.zone,'locality':$scope.locality,'google_map_link':$scope.google_map_link,'phone':$scope.phone,'city':$scope.city,'state':$scope.state,'pincode':$scope.pincode,'landmark':$scope.landmark,'address1':$scope.address1,'address2':$scope.address2,'name':$scope.name,'action':$scope.submit_button,'tablename':'purchase_adddrss'}
    }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

                          $scope.success = false;
                          $scope.error = true;
                          $scope.hidden_id = "";
                          $scope.errorMessage = data.massage;

          }
          else
          {
              
                        $scope.locality ="";
                        $scope.name ="";
                        $scope.phone = "";
                        $scope.hidden_id = "";
                        $scope.address1 = "";
                        $scope.address2 = "";
                        $scope.landmark = "";
                        $scope.pincode = "";
                        $scope.zone = "";
                        $scope.city = "";
                        $scope.state = "";
                        $scope.google_map_link = "";
                       
                       $('#exampleModalScrollable1').modal('toggle');
                        $scope.success = true;
                        $scope.error = false;
                        $scope.successMessage = data.massage;

                         $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                         });
                                                                
            
          

          }

          

      }

       
    });
  };
   
   
   
   
























$scope.genratelink = function(id){
    
    
                    
                    
                   
    
                      $http({
                            method:"POST",
                            url:"<?php echo base_url() ?>index.php/purchase/genratelink",
                            data:{'order_id':id}
                          }).success(function(data){
                           
                              $scope.fetchDatavendorsdata();
                              $('#firstmodal3').modal('toggle');
                              
                              $scope.inserthistory(2,'Link Generated',0);
                             
                      }); 
                
                   
};









 $scope.vendorcount=0;

 $scope.fetchDatavendorsdata = function(){


    $http.get('<?php echo base_url() ?>index.php/purchase/fetchDatavendorsdata?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>').success(function(data){
      
      
      $scope.namesVendor = data;
      
      $scope.vendorcount=data[0].venodrcount;
      
    });
    
 };


$scope.fetchData = function(id){
   


    $http.get('<?php echo base_url() ?>index.php/purchase/fetch_data_purchase?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&convert='+id).success(function(data){
      
      
      $scope.namesData = data;
      
      
      
    });
    
   
  
   
  };
  
  
  
  
  
  
  
  
  

  
$scope.calulation=1;
$scope.order_base=0;
$scope.reason="";
$scope.order_date=new Date();
 
$scope.onSave = function(name){

    var value=$('#'+name).val();
    
    
     $http.get('<?php echo base_url() ?>index.php/purchase/fetch_data_purchase_details_save?order_id=<?php echo $order_id; ?>&name='+name+'&value='+value).success(function(data){
      
     $scope.getPurchaserequest();
      
     });
   
   
   

};


$scope.onSavereason = function(){

     var value=$('#reason_for_choosing_suppliers').val();
     
     var vendor_id=$('#vendor_id').val();
    
     $http.get('<?php echo base_url() ?>index.php/purchase/saveresonchosevendor?order_id=<?php echo $order_id; ?>&vendor_id='+vendor_id+'&value='+value).success(function(data){
      
     
      
     });
   
   
   

};

$scope.getPurchaserequest = function(){
    
    
      $http.get('<?php echo base_url() ?>index.php/purchase/fetch_data_purchase_details?order_id=<?php echo $order_id; ?>').success(function(data){
      
      $scope.arrival_date=data.arrival_date1;
      $scope.price_details=data.price_details;
      $scope.availability=data.availability;
      $scope.customer_name=data.company_name;
      $scope.customer_phone=data.phone;
      
     
      $scope.invoice=data.invoice;
      
      
      
     });
  
    
};



$scope.fetchSingleDatatotal = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/fetch_single_data_total?order_id=<?php echo $order_id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>','convert':id}
      }).success(function(data){

       $scope.fulltotal = data.fulltotal;
       
       $scope.commission = data.commission;
       $scope.totalextra = data.totalextra;
       $scope.po_number = data.po_number;
       $scope.selected_status = data.selected_status;
       $scope.checkalready = data.checkalready;
       
       
       
       $scope.mark_request_to_sales = data.mark_request_to_sales;
       
       $scope.qutation_orders_id = data.qutation_orders_id;
       
       
      
       
       $scope.invoice_no = data.invoice_no;
       $scope.invoice_id = data.invoice_id;
       
       
       $scope.invoice_extra_unit_id = data.invoice_extra_unit_id;
        $scope.totalextra_total = data.totalextra;
        
       
       if(!data.order_no_id)
       {
              $scope.order_no_id = '<?php echo $order_no; ?>';
              $scope.order_no_new = '<?php echo $order_no; ?>';
              $scope.order_no_new_old = '<?php echo $order_no; ?>';
              $scope.po_no='<?php echo $order_no; ?>';
       }
       else
       {
              $scope.order_no_id = data.order_no_id;
              $scope.order_no_new = data.order_no_id;
              $scope.order_no_new_old = data.order_no_id;
              $scope.po_no=data.order_no_id;
          
       }
       
       if(!data.create_date)
       {
             $scope.create_date = '<?php echo date('d/m/Y'); ?>';
       }
       else
       {
           $scope.create_date = data.create_date;
          
       }
       
       if(!data.create_time)
       {
             $scope.create_time = '<?php echo date('h:i A'); ?>';
       }
       else
       {
           $scope.create_time = data.create_time;
          
       }
       
       if(data.user_id)
       {
            $scope.user_id = data.user_id;
       }
       if(data.reason)
       {
            $scope.reason = data.reason;
       }
       
        $scope.priority = data.priority;
       
       $scope.paricel_mode = data.paricel_mode;
       
       
       $scope.order_base=data.order_base;
       $scope.reason=data.reason;
       
       
       $scope.totalitems = data.totalitems;
       $scope.discounttotal = data.discount;
       $scope.discountfulltotal = data.discountfulltotal;
        $scope.totalamountgat = data.totalamountgat;
         $scope.totalamounttds = data.totalamounttds;
       $scope.tcsamount = data.tcsamount;
       $scope.minisroundoff = data.minisroundoff;
       
       $scope.Meter_to_Sqr_feet = data.Meter_to_Sqr_feet;
     
     
       $scope.fullqty = data.fullqty;
       $scope.FACT = data.FACT;
       $scope.UNIT = data.UNIT;
       $scope.NOS = data.NOS;
     
    });
};











$scope.saveDetails = function (event) {





if(event.keyCode==13)
{
    
      var autocomplete =$('#autocomplete').val();
 
      var checkboxformula=$('input[name="checkboxformula"]:checked').val();
         
        

    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
      data:{'product_id':$scope.product_id,'checkboxformula':checkboxformula,'profile':autocomplete,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','count_id':'<?php echo $count_id; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {
                
                
        $scope.profile = "";
       
        $scope.fetchData('1');
       
        $('#autocomplete').val('');
        
        $scope.fetchSingleDatatotal(1);
        


      }

    });
    
    
    
    
    
     

}



}









  
  
$scope.savebutton = 'Saved';


$scope.deleteData = function(id){
    //if(confirm("Are you sure you want to remove it?"))
    //{
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Deletesub','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){
       
         $scope.fetchData('1');
         $scope.fetchSingleDatatotal(1);
         
      }); 
    //}
};

$scope.deleteData1 = function(id,vendor_id,order_id){
    if(confirm("Are you sure you want to remove it?"))
    {
    
       $http({
         method:"POST",
        url:"<?php echo base_url() ?>index.php/purchase/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'purchase_order_remarks'}
      }).success(function(data){
       
         
         $scope.fetchhistory(vendor_id,order_id);
         
      }); 
    
      
    }
};








 $scope.changelandline = function(id,name){
     
     
     
     if(name=='description')
     {
          var value=$('#description_set_'+id).val();
     }
     else
     {
          var value=$('#'+name+'_'+id).val();
     }
     
     
     
    
     
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/purchase/insertandupdate",
        data:{'id':id,'value':value, 'action':'updatevalue','name':name,'tablename':'purchase_order'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };
 



$scope.fetchCustomerororderhistroy = function(table)
{
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/fetchCustomerororderhistroy_vendor",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','tablenamemain':table}
    }).success(function(data)
    {

            $scope.namesHistory = data;
          
    });
};










$scope.Getbankaccount = function () {
      
      
      
      
      
           $http({
		      method:"POST",
		      url:"<?php echo base_url() ?>index.php/bankaccount/fetch_single_data",
		      data:{'id':$scope.getbank, 'action':'fetch_single_data','tablename':'bankaccount'}
		    }).success(function(data){
		        
		        
		         $scope.bank_name = data.bank_name;
		         $scope.type = data.type;
		         $scope.account_no = data.account_no;
		         $scope.ifsc_code = data.ifsc_code;
		         $scope.current_amount = data.current_amount;
		         
		        
		     
		    });
      
      
       
};  


$scope.getbank=0;

  $scope.submitCallBack = function(){


      

 var filetype=$('#filetype').val();
 var remarks=$('#remarks').val();
 var vendor_id=$('#vendor_id').val();





  
      
      var label_option2_qty = $(".qty_invoice_make");
      var product_ids = $(".purchase_order_product_ids");
      var vehicle_no_make = $(".vehicle_no_make");
      
      var dispath_date_make = $(".dispath_date_make");
      var char_value_make = $(".char_value_make");
      var description_make = $(".char_value_make");
      var remarks_data_make = $(".char_value_make");
      
      
      
      
      
      
      
      
      
      var label_option2_value_qty = [];
      var product_ids_data = [];
      var vehicle_no_make_data = [];
      var dispath_date_make_data = [];
      var char_value_make_data = [];
      var description_make_data = [];
      var remarks_data_make_data = [];
      
       
      for(var i = 0; i < label_option2_qty.length; i++){
          
           label_option2_value_qty.push($(label_option2_qty[i]).val());
           
           product_ids_data.push($(product_ids[i]).val());
           
           vehicle_no_make_data.push($(vehicle_no_make[i]).val());
           dispath_date_make_data.push($(dispath_date_make[i]).val());
           char_value_make_data.push($(char_value_make[i]).val());
           description_make_data.push($(description_make[i]).val());
           remarks_data_make_data.push($(remarks_data_make[i]).val());
         
      }
      
      var qty= label_option2_value_qty.join("|");
      var product_ids_value= product_ids_data.join("|");
      
      var vehicle_no_make_value= vehicle_no_make_data.join("|");
      var dispath_date_make_value= dispath_date_make_data.join("|");
      var char_value_make_value= char_value_make_data.join("|");
      var description_make_value= description_make_data.join("|");
      var remarks_data_make_value= remarks_data_make_data.join("|");
      
      
      
      
    
 
 
 if(remarks!='')
 {
     
    $('#savecallback').html('Loading...');
 
 
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/callbacksave",
      data:{'remarks':remarks,
      'filetype':filetype,
      'qty':qty,
      'product_ids_value':product_ids_value,
      'vehicle_no_make_value':vehicle_no_make_value,
      'dispath_date_make_value':dispath_date_make_value,
      'char_value_make_value':char_value_make_value,
      'description_make_value':description_make_value,
      'remarks_data_make_value':remarks_data_make_value,
      'vendor_id':vendor_id,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','tablenamemain':'purchase_order_remarks'}
      }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

              $scope.success = false;
              $scope.error = true;
              $scope.hidden_id = "";
              $scope.errorMessage = data.massage;

          }
          else
          {


            
           

                               var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file', file);  
                               });  
                               
                               
                               $http.post('<?php echo base_url() ?>index.php/purchase/fileuplaodbyorder?id='+data.insert_id+'filetype='+filetype, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                    
                               });  
                               
                               
                               
                                $scope.success = true;
                                $('#savecallback').html('Save');
                                $scope.error = false;
                                $('#remarks').val('');
                                $('#filetype').val('');
                                $('#fileupload').val('');
                                $scope.successMessage = data.massage;
                                
                                
                                $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });

                                 
                               $scope.fetchhistory(vendor_id,'<?php echo $order_id; ?>');  

          

          }

          

      }

       
    });
    };



}





$scope.submitPayment = function(){


var payment_type=$('#payment_type').val(); 
var schedule_date=$('#schedule_date').val(); 


var payment_mode_payoff=$('#payment_mode_payoff').val();
var bankaccount=$('#bankaccount').val();



     
var vendor_amount=$('#vendor_amount').val();
var notes=$('#notes').val();
var vendor_id=$('#vendor_id_fix').val();


 var partial_qty=$('#partial_qty').val();
 var payment_date=$('#payment_date').val();
 var delivery_status=$('#delivery_status').val();




 
 if(vendor_amount!='')
 {
     
    $('#savePayment').html('Loading...');
 
 
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/payment_save",
      data:{'notes':notes,'payment_type':payment_type,'partial_qty':partial_qty,'payment_date':payment_date,'delivery_status':delivery_status,'schedule_date':schedule_date,'payment_mode_payoff':payment_mode_payoff,'amount':vendor_amount,'bankaccount':bankaccount,'vendor_id':vendor_id,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','tablenamemain':'purchase_order_remarks'}
    }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='2')
          {
               
               
              var st=  'Payment '+payment_type;
              $scope.inserthistory(7,st,vendor_id); 
              
              
              $('#savePayment').html('Payout');
              $scope.success = true;
              $scope.error = false;
              $scope.hidden_id = "";
              $scope.successMessage = data.massage;
              
              $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });
              
              
              $scope.fetchpaymenthistory(vendor_id,'<?php echo $order_id; ?>');  
              $scope.fetchSingleDatatotal(1);

          }
         
      }

       
    });
    };



}











$scope.submitDelivery = function(){


var delivery_status=$('#delivery_status_d').val(); 
var notes=$('#notes_delivery').val();
var vendor_id=$('#vendor_id_fix_delivery').val();

var delivery_date=$('#delivery_date').val();
 
 
 if(delivery_status!='')
 {
     
    $('#saveDelivery').html('Loading...');
 
 
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/delivery_save",
      data:{'notes':notes,'delivery_status':delivery_status,'vendor_id':vendor_id,'delivery_date':delivery_date,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','tablenamemain':'purchase_order_remarks'}
    }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='2')
          {
              
              $scope.inserthistory(8,'Delivery Updated',vendor_id);  
               
              $('#saveDelivery').html('Save');
              $scope.success = true;
              $scope.error = false;
              $scope.hidden_id = "";
              $scope.successMessage = data.massage;
              
              $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });
              
              
              $scope.fetchSingleDatatotal(1);
              $scope.fetchdeleveryhistory(vendor_id,'<?php echo $order_id; ?>'); 

          }
         
      }

       
    });
    };



}























$scope.submitPurchaseinvoice = function(){



                              $('#uploadinvoice').html('Loading...');
 
                              var invoiceno=$('#invoiceno').val();
 
                               var filetype=0
                               var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file', file);  
                               });  
                               
                               
                               $http.post('<?php echo base_url() ?>index.php/purchase/fileuplaodbyorder_invoice?id=<?php echo $order_id; ?>&invoiceno='+invoiceno+'&filetype='+filetype, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                        $('#uploadinvoice').html('Upload');
                                        
                                        
                                        $scope.inserthistory(6,'Purchase Invoice Uploaded',0);    
                                    
                                    
                                        $scope.successcc = true;
                                        $('#fileupload2').val('');
                                        $scope.successMessagec = 'Invoice Uploaded';
                                        $scope.getPurchaserequest();
                                        
                                        
                                        $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });
                                        
                                    
                               });  
                               
                               
                               
                             

                                 
                             


};





$scope.submitPriyarity = function(){


                            var priority=$('#priority').val();
                           var pourl=$('#pourl').val();
                              
                            $http({
                            method:"POST",
                            url:"<?php echo base_url() ?>index.php/purchase/order_quotation_request_po",
                            data:{'order_id':'<?php echo $order_id; ?>','priority':priority}
                            }).success(function(data)
                            {
                                
                               $scope.inserthistory(5,'Po Genrated',0);    
                                
                               $scope.fetchSingleDatatotal(1);
                               $('#seetmode').modal('toggle');
                               window.open(pourl, "_blank");
        
                            });
                           
                        

};





$scope.fetchVendor = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/fetchVendor?order_id=<?php echo $order_id; ?>",
      data:{'order_id':'<?php echo $order_id; ?>'}
      }).success(function(data){

      
       $scope.vendorname=data.name;
       $scope.vendorphone=data.phone;
       $scope.vendoremail=data.email;
       $scope.vendor_id_fix=data.vendor_id;
       $scope.gst=data.gst;
       $scope.address=data.address;
      
     
    });
};

























$scope.newComplaintcreate = function(){
  
   $('#exampleModalScrollable').modal('toggle');
   
   $scope.getProductlist();
};


$scope.newComplaintcreate_extra = function(){
  
   $('#exampleModalScrollable_extra').modal('toggle');
   
   $scope.getProductlist_extra();
};








$scope.getProductlist_extra = function(){
      
      
      var po_no= $('#po_no').val();
      var vendor_id_fix=$('#vendor_id_fix').val();
       var id='<?php echo $order_id; ?>';
       
     $http.get('<?php echo base_url() ?>index.php/purchase/get_purchase_product_list_po_number_extra?po_no='+po_no+'&vendor_id_fix='+vendor_id_fix+'&order_id='+id).success(function(data){
      
      
       $scope.namesDataproduct = data;
      
       
     });
     
     
     
     
     
       $http.get('<?php echo base_url() ?>index.php/purchase/get_purchase_product_list_po_number_gst_total_extra?po_no='+po_no+'&order_id='+id).success(function(data){
      
     
      
         $scope.totalextra = data.totalextra;
         $scope.gstamount = data.gstamount;
         $scope.subtotal = data.totalamount;
         $scope.fulltotal = data.fulltotal;
         $scope.gstamount_extra = data.gstamount_extra;
         
         $scope.fulltotal_extra = data.fulltotal_extra;
         
         $('#invoice_amount_2').val(data.fulltotal_extra);
         
         $('#invoice_amount').val(data.fulltotal);
         
         if(data.fulltotal==0)
         {
             $('#payment_create_2').hide();
         }
         else
         {
             $('#payment_create_2').show();
         }
        
       
     });
     
     
         
     
        
   };



 $scope.getProductlist = function(){
      
      
      var po_no= $('#po_no').val();
      var vendor_id_fix=$('#vendor_id_fix').val();
        var id='<?php echo $order_id; ?>';
        
        
     $http.get('<?php echo base_url() ?>index.php/purchase/get_purchase_product_list_po_number?po_no='+po_no+'&vendor_id_fix='+vendor_id_fix+'&order_id='+id).success(function(data){
      
      
       $scope.namesDataproduct = data;
      
       
     });
     
     
     
     
     
       $http.get('<?php echo base_url() ?>index.php/purchase/get_purchase_product_list_po_number_gst_total?po_no='+po_no+'&order_id='+id).success(function(data){
      
     
      
         $scope.totalextra = data.totalextra;
         $scope.gstamount = data.gstamount;
         $scope.subtotal = data.totalamount;
         $scope.fulltotalinvoice = data.fulltotal;
          $scope.tcsamountinvoice = data.tcsamount;
         $scope.gstamount_extra = data.gstamount_extra;
         
         $scope.fulltotal_extra = data.fulltotal_extra;
         
         $('#invoice_amount_2').val(data.fulltotal_extra);
         
         $('#invoice_amount').val(data.fulltotal);
         
         if(data.fulltotal==0)
         {
             $('#payment_create').hide();
         }
         else
         {
             $('#payment_create').show();
         }
        
       
     });
     
     
         
     
        
   };
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
 $scope.getProductlist_get = function(vendor_id)
 {
      
      
      var po_no= $('#po_no').val();
      var vendor_id_fix=vendor_id;
      var id='<?php echo $order_id; ?>';
      
     $http.get('<?php echo base_url() ?>index.php/purchase/get_purchase_product_list_po_number_get_vendor?po_no='+po_no+'&vendor_id_fix='+vendor_id_fix+'&order_id='+id).success(function(data){
      
      
       $scope.namesDataproduct = data;
      
       
     });
     
     
     
        
   };
   
   
   
   
   
   
   
   $scope.submitForm = function()
{
      
            var purchase_order_product_id = [];
            var inward_id = [];
             var stock_id = [];
            var purchase_qty = [];
            var purchase_price = [];
             $('input[name="purchase_order_product_id"]:checked').each(function(){
                 
                    
                     var id=$(this).val();
                     purchase_order_product_id.push($(this).val());
                     
                     inward_id.push($(this).data('set'));
                     stock_id.push($(this).data('stock'));
                     
                     purchase_qty.push($('#qty_invoice_'+id).val()); 
                     purchase_price.push($('#price_invoice_'+id).val()); 
                
            });
            
             var checkinsert= purchase_order_product_id.join("|");
             
             var inward_ids= inward_id.join("|");
              var stock_ids= stock_id.join("|");
             
             var purchase_qty_data= purchase_qty.join("|");
             
            
             
             var purchase_price_data= purchase_price.join("|");
      
          
              var validation=$('input[name="purchase_order_product_id"]:checked').val();
                    
              if (typeof validation === "undefined") {
                       var validation=0;
              }
              
              
          
        
         var vendor_names=$('#autocomplete').val();
         var invoice_amount=$('#invoice_amount').val();
         var po_no=$('#po_no').val();
         var vendor_id_fix=$('#vendor_id_fix').val();
         var create_date=$('#create_date').val();


         var roundoff=$('#roundoff').val();
          var convert=$('input[name="convertPlus"]:checked').val();
         
         
          var loading_charges=$('#loading_charges').val();
         
    var inovice_no=$('#inovice_no').val();

          var gst_amount=$('#gst').text();

    if(validation!=0)
    {
        
    
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/purchase_invoice_data",
      data:{'create_date':create_date,'stock_ids':stock_ids,'gst_amount':gst_amount,'roundoff':roundoff,'convert':convert,'loading_charges':loading_charges,'inward_ids':inward_ids,'invoice_amount':invoice_amount,'vendor_names':vendor_id_fix,'remarks':$scope.remarks,'order_id':'<?php echo $order_id; ?>','inovice_no':inovice_no,'purchase_order_product_id':checkinsert,'purchase_qty_data':purchase_qty_data,'purchase_price_data':purchase_price_data,'action':'Inward','tablename':'purchase_invoice'}
    }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

              $scope.success = false;
              $scope.error = true;
              $scope.errorMessage = data.massage;

          }
          else
          {
              
              
              
             $scope.remarks="";
             $scope.success = true;
             $scope.error = false;
             $scope.successMessage = data.massage;
             $('#showdata').hide();
            
             $scope.inserthistory(6,'Invoice Generated',0);    
             $scope.fetchSingleDatatotal(1);
            
            
            
            
            
            
            
                               var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file', file);  
                               });  
                               
                               var filetype=0;
                               
                               $http.post('<?php echo base_url() ?>index.php/purchase/fileuplaodbyorder_invoice?id='+data.insert_id+'filetype='+filetype, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                    
                               });  
                               
            
            
            
            
            
            
            
            
            
            
            
            
            
                                                                $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });
                                                                
                                                                
                                                                 $('#exampleModalScrollable').modal('toggle');
            

          }

          

      }

       
    });
   
 

    }
    else
    {
        alert('Select Product..');
    }
      
      
      
      
  
      
      
      
    
  };
   
   
   

   $scope.submitFormextra = function()
{
      
         
            
              
           
         var vehicle_no_extra=$('#vehicle_no_extra').val();
         var vendor_names=$('#autocomplete').val();
         var invoice_amount=$('#invoice_amount_2').val();
         var po_no=$('#po_no').val();
         var vendor_id_fix=$('#vendor_id_fix').val();
         var create_date=$('#create_date_2').val();
         var remarks_2=$('#remarks_2').val();
         var inovice_no_2=$('#inovice_no_2').val();
   
         var gst_amount=$('#gst_2').html();

     
    if(vehicle_no_extra!='')
    {
        
    
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/purchase_invoice_data_extra",
      data:{'create_date':create_date,'vehicle_no':vehicle_no_extra,'gst_amount':gst_amount,'invoice_amount':invoice_amount,'vendor_names':vendor_id_fix,'remarks':remarks_2,'po_number':po_no,'inovice_no':inovice_no_2,'action':'Inward','tablename':'purchase_invoice'}
    }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

              $scope.success = false;
              $scope.error = true;
              $scope.errorMessage = data.massage;

          }
          else
          {
              
              
              
             $scope.remarks="";
             $scope.success = true;
             $scope.error = false;
             $scope.successMessage = data.massage;
             $('#showdata').hide();
            
             $scope.inserthistory(6,'Invoice Generated',0);    
             $scope.fetchSingleDatatotal(1);
            
            
            
            
            
            
            
                               var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file', file);  
                               });  
                               
                               var filetype=0;
                               
                               $http.post('<?php echo base_url() ?>index.php/purchase/fileuplaodbyorder_invoice?id='+data.insert_id+'filetype='+filetype, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                    
                               });  
                               
            
            
            
            
            
            
            
            
            
            
            
            
            
                                                                $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });
                                                                
                                                                
                                                                 $('#exampleModalScrollable_extra').modal('toggle');
            

          }

          

      }

       
    });
   
 

    }
    else
    {
        alert('input the vehicle no');
    }
      
      
      
      
  
      
      
      
    
  };

$scope.viewAddress = function(id)
{
    
   $scope.hidden_id=id;
   $('#allinvoice').modal('toggle');
   $('#exampleModalScrollable_1').modal('toggle');
   $scope.fetchDataaddress(id);
   $scope.invoicepayment(id);
  
    
};

$scope.viewAddress_2 = function(id)
{
    
   $scope.hidden_id=id;
   $('#allinvoice').modal('toggle');
   $('#exampleModalScrollable_1').modal('toggle');
   $scope.fetchDataaddress(id);
   $scope.invoicepayment_2(id);
  
    
};

  
  
  
  $scope.viewallInvoices = function()
  {
      
      
       $('#allinvoice').modal('toggle');
       
        var id='<?php echo $order_id; ?>';
        
     
      
        $http.get('<?php echo base_url() ?>index.php/purchase/getpurchaseorerinvoice?id='+id).success(function(datainvoice){
      
      
            $scope.namesDatainvoice = datainvoice;
      
       
        });
        
   };
  

  $scope.fetchDataaddress = function(id){
      
     $http.get('<?php echo base_url() ?>index.php/purchase/purchase_fetch_cp_invoice_product?id='+id).success(function(dataaddress){
      
      
       $scope.namesDataaddress = dataaddress;
      
       
     });
        
   };
   
   
   
     $scope.invoicepayment = function(id){
      
     $http.get('<?php echo base_url() ?>index.php/purchase/fetch_invoicetotal?id='+id).success(function(dataaddress){
      
      
         $scope.invoice_totalextra = dataaddress.invoice_totalextra;
         $scope.invoice_gstamount = dataaddress.invoice_gstamount;
         $scope.invoice_subtotal = dataaddress.invoice_totalamount;
         $scope.invoice_fulltotal = dataaddress.invoice_fulltotal;

              $scope.roundoffset = dataaddress.roundoffset;
           $scope.convert_status = dataaddress.convert_status;
         
          $scope.invoice_tcsamount = dataaddress.tcsamount;
         
         
          $scope.loading_charges = dataaddress.loading_charges;
         $('#vendor_amount').val(dataaddress.invoice_amount);
         
           
        if(dataaddress.invoice_amount>0)
        {
             $('#payoutbutton').show();
             $('#vendor_amount').attr('readonly', false);

        }
        else
        {
            $('#payoutbutton').hide();
            $('#vendor_amount').attr('readonly', true);
        }
         
         
       
     });
     
     
     

     
        
   };
   
   
   
     $scope.invoicepayment_2 = function(id){
      
     $http.get('<?php echo base_url() ?>index.php/purchase/fetch_invoicetotal_get?id='+id).success(function(dataaddress){
      
      
         $scope.invoice_totalextra = dataaddress.invoice_totalextra;
         $scope.invoice_gstamount = dataaddress.invoice_gstamount;
         $scope.invoice_subtotal = dataaddress.invoice_totalamount;
         $scope.invoice_fulltotal = dataaddress.invoice_fulltotal;
        $('#vendor_amount').val(dataaddress.invoice_amount);
        
        
        if(dataaddress.invoice_amount>0)
        {
             $('#payoutbutton').show();
             $('#vendor_amount').attr('readonly', false);

        }
        else
        {
            $('#payoutbutton').hide();
            $('#vendor_amount').attr('readonly', true);
        }
       
     });
     
     
     

     
        
   };
   
   
   
   $scope.submitForm_1 = function(){
      
      
       
        
       var invoice_amount=$('#vendor_amount').val();
       var payment_type=$('#payment_type').val();
       var schedule_date=$('#schedule_date').val();
       var payment_mode_payoff=$('#payment_mode_payoff').val();
      
       var bankaccount=$('#bankaccount').val();
       var delivery_status=$('#delivery_status').val();
       var payout_date=$('#payout_date').val();
       var coil_no=$('#coil_no').val();

       
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/purchase_invoice_payout",
      data:{'notes':$scope.remarks_2,'id':$scope.hidden_id,'invoice_amount':invoice_amount,'coil_no':coil_no,'payment_type':payment_type,'schedule_date':schedule_date,'payment_mode_payoff':payment_mode_payoff,'bankaccount':bankaccount,'delivery_status':delivery_status,'payout_date':payout_date}
      }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

              $scope.success = false;
              $scope.error = true;
              $scope.hidden_id = "";
              $scope.errorMessage = data.massage;

          }
          else
          {
              
              
              
            $scope.remarks_2="";
            $scope.success = true;
            $scope.error = false;
            $scope.inserthistory(7,payment_type,0);  
            $scope.successMessage = data.massage;
            $scope.fetchDataaddress($scope.hidden_id);
            $scope.fetchSingleDatatotal(1);
            
            
                                                                $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });
                                                                
                                                                
                                                                
                                                                $('#exampleModalScrollable_1').modal('toggle');


          }

          

      }

       
    });
   
 

      
      
      
      
      
  
      
      
      
    
  };
   
   
   
   






































$scope.newComplaintcreate1 = function(){
  
   $('#exampleModalScrollable_C').modal('toggle');
    $scope.getProductlist2();
};







  $scope.getProductlist2 = function(){
      
    $scope.getProductlistdata2();
      
    };
  
   $scope.getProductlistdata2 = function(){
      
      
     var po_no= $('#invoice_no').val();
     
    
      
     $http.get('<?php echo base_url() ?>index.php/purchase/get_purchase_product_list?po_no='+po_no).success(function(data){
      
      
       $scope.namesDataproductC = data;
       
       $('#showdataC').show();
      
       
     });
        
   };



$scope.submitFormC = function(){
      
            var purchase_order_product_id = [];
      
             $('input[name="purchase_order_product_id_c"]:checked').each(function(){
               
                    purchase_order_product_id.push($(this).val()); 
                
            });
            
             var checkinsert= purchase_order_product_id.join("|");
      
      
          var validation=$('input[name="purchase_order_product_id_c"]:checked').val();
                
          if (typeof validation === "undefined") {
                   var validation=0;
          }
        
        
         
             var purchase_notes = [];
      
             $('input[name="purchase_notes"]').each(function(){
                    
                    if($(this).val()!="")
                    {
                        purchase_notes.push($(this).val()); 
                    }
                    
                
            });
            
             var purchase_notes_data= purchase_notes.join("|");
         
       
       
        var purchase_qty = [];
      
             $('input[name="purchase_qty_c"]').each(function(){
                    
                    if($(this).val()!="")
                    {
                        purchase_qty.push($(this).val()); 
                    }
                    
                
            });
            
             var purchase_qty_data= purchase_qty.join("|");
            var remarks= $('#remarks_c').val();
            var create_date= $('#complient_date').val();
            var invoice_no= $('#invoice_no').val();

     
    if(validation!=0)
    {
        
    
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/purchase_complaints_data",
      data:{'create_date':create_date,'remarks':remarks,'po_number':invoice_no,'purchase_order_product_id':checkinsert,'purchase_qty_data':purchase_qty_data,'purchase_notes_data':purchase_notes_data,'action':'Inward','tablename':'purchase_complaints'}
      }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

              $scope.success = false;
              $scope.error = true;
              $scope.hidden_id = "";
             
              $scope.errorMessage = data.massage;

          }
          else
          {
              
              
              
             $('#remarks_c').val('');
             $scope.success = true;
             $scope.error = false;
             $scope.successMessage = data.massage;
             $('#showdataC').hide();
                                                                 $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });
                                                                
                                                                $('#exampleModalScrollable_C').modal('toggle');  
            

          }

          

      }

       
    });
   
 

    }
    else
    {
        alert('Select Product..');
    }
      
      
      
      
  
      
      
      
    
  };
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  $scope.fetchSingleData = function(id,product_name,qty){
    
    
     $('#modelid').modal('show');
     
      $('#product_id').html(product_name);
      $('#product_purcahse_id').val(id);
      $('#invoice_qty').val(qty);
      $scope.inward_date = new Date();
    
    
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/fetch_single_data_product_burchase_base",
      data:{'id':id, 'action':'fetch_single_data','tablename':'purchase_order'}
    }).success(function(data){
        
        
            
               
            var qtydata=data.qty;
            if(qtydata.length === 0)
            {
                
                $('#coinupdatebutton').show();
                $('#invoice_qty').val(qty);
                $('#invoice_qty').attr('readonly', false);
                
                
            } 
            else 
            {
                        if(data.qty>0)
                        {
                             $('#coinupdatebutton').show();
                             $('#invoice_qty').attr('readonly', false);
                             $('#invoice_qty').val(data.qty);
                             $scope.invoice_qty = data.qty;
                
                        }
                        else
                        {
                            
                            $('#coinupdatebutton').hide();
                            $('#invoice_qty').val('0');
                            $('#invoice_qty').attr('readonly', true);
                            
                            
                        }
            } 
                
               
                     
            $('#vehicle_no').val('');
            $('#invoice_coil_no').val('');
            
            
              
             
          
     
    });
};
  
  
  
  
  
  
   $scope.submitFormCoil = function(){
      
      
      
        
      var total_amount=  $('#invoice_total_amount').val();
  
      var id=  $('#invoice_id').val();
  
      var invoice_qty=  $('#invoice_qty').val();

      var product_purcahse_id= $('#product_purcahse_id').val();
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/insertandupdateinward",
      data:{'total_amount':total_amount,'product_purcahse_id':product_purcahse_id,'vehicle_no':$scope.vehicle_no,'product_id':$scope.product_id,'rack_info':$scope.rack_info,'coil_no':$scope.invoice_coil_no,'bin_info':$scope.bin_info,'inward_date':$scope.inward_date,'po_number':$scope.invoice_po_no,'qty':invoice_qty,'price':$scope.invoice_price,'id':id,'action':'Inwardinsert','tablename':'purchase_order'}
    }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

              $scope.success = false;
              $scope.error = true;
              $scope.hidden_id = "";
             
              $scope.errorMessage = data.massage;

          }
          else
          {
              
              
              
           
              
            $scope.success = true;
            $scope.error = false;
            $scope.product_id = "";
            $scope.invoice_price = "";
            
            $scope.invoice_total_amount="";
            $scope.invoice_po_no = "";
            $scope.invoice_inward_date = "";
            $scope.invoice_qty = "";
           
           
            $scope.successMessage = data.massage;
            
            
            $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });
                                                                
                                                                
                                                                $('#modelid').modal('hide');
            

          }

          

      }

       
    });
   
 

      
      
      
      
      
  
      
      
      
    
  };
  
  
  
  




});


    
</script>

    <?php include ('footer.php'); ?>
</body>
</html>















