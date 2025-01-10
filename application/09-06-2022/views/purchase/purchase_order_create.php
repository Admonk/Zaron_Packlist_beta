<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 

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


input#price_details {
    width: 65%;
}
select#availability {
    width: 65%;
}

u {
    cursor: pointer;
   
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
    left: 14%;
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
    height: 325px;
    overflow: auto;
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
    top: 14%;
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
                                     <label><?php echo $order_title; ?> </label>
                                     <h4 class="mb-sm-0 font-size-10 text-primary">{{order_no_id}}</h4>
                                     <h4 class="mb-sm-0 text-muted mt-2 font-size-10">{{create_date}} <span class="text-muted font-size-10">{{create_time}}</span></h4>
                                     
                                     
                                  </div>
                                  
                                
                                <div  class="d-inline col-3 pe-3 border-end  "  >
                                    <div class="col invoice-details" ng-if="vendorname">
                                    <label>Selected Vendor</label>
                                    
                                                <p class="mb-sm-0 font-size-11  ng-binding">{{vendorname}} </p>
                                                <p  class="mb-sm-0 font-size-11  ng-binding">{{vendorphone}} </p>
                                                <!--<p  class="mb-sm-0 font-size-11  ng-binding"></p>{{vendoremail}} </p>-->
                                                <p class="invo-addr-1">GST : {{gst}}   
                                                <a href="<?php echo base_url(); ?>index.php/purchase/po?order_id=<?php echo $enable_order; ?>&old_tablename=<?php echo $old_tablename; ?>&old_tablename_sub=<?php echo $old_tablename_sub; ?>&tablename=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&movetablename=<?php echo $movetablename; ?>&movetablename_sub=<?php echo $movetablename_sub; ?>" target="_blank" style="background: #ff1800;padding: 4px;color: white;" ng-click="seletGenrate()">PO</a>
                                                <a href="{{invoice}}" target="_blank" style="background: #ff1800;padding: 4px;color: white;"  ng-if="invoice!=0">Invoice</a>
                                    
                                    
                                     </p>
                                     </div>     
                                     <div class="col invoice-details" >
                                    <span ng-init="getcompareProduct()">
                                   <button type="button" ng-show="getcomparedata.length>0" class="btn btn-outline-primary" data-bs-toggle="offcanvas" ng-click="getcompare()" data-bs-target="#offcanvasCompare" aria-controls="offcanvasRight"><i class="mdi mdi-compare"></i> 
                                    
                                    <span ng-if="vendorcount==1">Select PO</span>
                                    <span ng-if="vendorcount>1">Compare</span>
                                    
                                    
                                    </button>
                                    </span>
                                    
                                   
                                   <button type="button" ng-if="order_base==2" class="btn btn-outline-primary" ng-click="openupload()" ><i class="mdi mdi-upload"></i> Invoice Upload </button>
                                                        
                                   
                                </div>
                                </div>
                               
    
    
                                <div class="d-inline col-2 pe-2 <?php echo $none; ?>" ng-if="order_base!=2">

                                 <label >Vendors ({{vendorcount}})</label>
                                
                                 <div class="d-flex gap-2 flex-wrap">
                                    <div class="btn-group">
                                       <button type="button" class="btn btn-success btn-rounded rounded-1 waves-effect waves-light mb-2 me-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="far fa-address-book me-1"></i>Select Vendor</button>
                                    </div>
                                 </div>
                              </div>
                              
                             
                               
                              
                              
                              
                              <span ng-init="getPurchaserequest()">
                              <div class="d-inline col-2 pe-3" ng-if="arrival_date">
                            
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    
                                    
                                   <table class="table">
                                                                      <tr>
                                                                           <td>Customer : </td>
                                                                           <td> {{customer_name}} {{customer_phone}}</td>
                                                                      </tr>
                                                                     
                                                                      <tr>
                                                                           <td>Expected Date : </td>
                                                                           <td><input type="date" ng-blur="onSave('arrival_date')" id="arrival_date" value="{{arrival_date}}"></td>
                                                                      </tr>
                                                                     
                                                                      
                                                                  </table>
                                   
                                    
                                 </div>
                              </div>
                              </span>
                              
                              
                               <span ng-init="getPurchaserequest()">
                              <div class="d-inline col-2 pe-3" ng-if="arrival_date">
                            
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    
                                    
                                   <table class="table">
                                                                    
                                                                           <td>Price : </td>
                                                                           <td> <input type="texte" ng-blur="onSave('price_details')"  id="price_details"  value="{{price_details}}"></td>
                                                                      </tr>
                                                                      <tr>
                                                                           <td>Availability in the warehouse : </td>
                                                                           <td>  <select  id="availability" ng-change="onSave('availability')"  ng-model="availability" name="availability">
                                                                                    <option value="YES">YES</option>
                                                                                    <option value="NO">NO</option>
                                                                                    
                                                                                </select></td>
                                                                      </tr>
                                                                      
                                                                  </table>
                                   
                                    
                                 </div>
                              </div>
                              </span>
                              
                            
                                
                                     
                                 
                                 </div>
                              

                           </div>
                        </div>
                        
                        
                        
                        <div class="search-info mb-1 border-bottom">
                            
                       
                               
                            
                            <div class="row">
                              <div class="col-lg-12 col-12">
                                    <div class="search-box position-relative" id="normalview" >
                                        
                                        
                                        
                                       <input type="text" ng-model="profile"  id="autocomplete" <?php echo $read; ?> ng-keyup="completeProduct()"  ng-keypress="saveDetails($event)" name="profile" class="form-control rounded border autocomplete" placeholder="Product">
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
                                              <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'>QTY <i class="fa fa-sort" aria-hidden="true"></i></th>
                                             
                                              
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
                                                 <input type="text" <?php echo $read; ?>  ng-keyup="completeProduct2(name.id)" <?php echo $read; ?>  ng-blur="inputsave_1(name.id,'product_name',1,1)"   id="product_name_{{name.id}}" value="{{name.product_name_tab}}">
                                             </td>
                                              
                                              
                                            <td title="{{name.categories}}"  data-label="Products">
                                                 <input type="text" <?php echo $read; ?>   ng-blur="inputsave_1(name.id,'specifications',1,1)"   id="specifications_{{name.id}}" value="{{name.specifications}}">
                                             </td>
                                              <td  data-priority="3" data-label="UOM" >
                                                
                                                  <select class="selectbox"  ng-change="inputsave_1(name.id,'uom',1,1)" id="uom_{{name.id}}"  ng-model="calulation"><option value="1" ng-selected="{{name.uom == 1}}">TON</option><option value="2" ng-selected="{{name.uom == 2}}">KG</option></select>
                                                   
                                               
                                                   
                                                   
                                            </td>
                                             <td  data-label="Qty"> <input type="text"  ng-keyup="inputsave_1(name.id,'qty',1,1)"  class="qtyfind_{{namecate.categories_id}}"  id="qty_{{name.id}}" value="{{name.qty_tab}}"> </td>
                                             <td data-label="Action" class="last-colorchange">
                                             <?php
                                                if($disabled!='disabled')
                                                {
                                                    ?>
                                                     <i class="mdi mdi-delete font-size-16" <?php echo $disabled;  ?> ng-click="deleteData(name.id)" title="Delete" style="cursor: pointer;"></i>
                                               
                                                    <?php
                                                }
                                                
                                                ?>
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
                                 
                                
                                
                                
                                
                                 <div class="mt-3 hstack gap-3">
                                     
                                    
                                     <span ng-if="order_base==0 || order_base==-1">
                                     <input type="checkbox" class="form-check-input"  style="background: #f4f5f8;border: none;"  ng-click="approved(<?php echo $order_id; ?>,1,'Purchase Enquiry Requested')" name="checkboxEl" value="0" id="formrow-customCheck">
                                     <label class="form-check-label btn btn-success" for="formrow-customCheck">Request Enquiry</label>
                                     </span>
                                     
                                      <span ng-if="order_base==1">
                                         <h6 style="color:green;" ng-if="reason"><i class="fa fa-check" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; {{reason}}</h6>
                                      </span> 
                                      
                                                  <div class="vr" ng-if="order_base==1 || order_base==2 || order_base==3"></div> 
                                                  <span ng-if="order_base==1 || order_base==2 || order_base==3">
                                                      <button type="button" class="btn btn-danger w-md" ng-click="genratelink(<?php echo $order_id; ?>)">Generate Link</button>
                                                  </span>  
                                                       
                                   
                                                  <div class="vr" ></div>
                                    
                                                <span ng-if="order_base==0">
                                                    <button type="button" class="btn btn-primary w-md" ng-click="approved(<?php echo $order_id; ?>,-1,'Purchase Enquiry Canceled')"> Cancel</button> </span> 
                                                 <span ng-if="order_base==0">
                                      
                                                   <h6 style="color:red;" ng-if="reason"><i class="fa fa-times" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; {{reason}}</h6>
                                                       
                                                </span> 
                                                 
                                                  
                                 </div>
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                              </div>
                              
                              
                              <div class="col-4 ">
                                 
                                 <div class="mt-3 hstack gap-3">
                                     
                                     <h4>Total QTY : {{fullqty}}</h4>
                                                       
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
                                          <div class="scoreTick" style="left: 55%;"></div>
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


                         

                            
                            
                            
                            
                            
                           <h6><i class="far fa-address-book pe-2"></i><?php echo $missed; ?> History <span class="float-end font-size-12 text-success text-decoration-underline history-toggle-tab">Last 10 <?php echo $missed; ?></span></h6>
                           <hr class="m-1">
                           
                           
                           <div class="history-tl-container">
                               
                             
                             <ul class="tl" ng-init="fetchCustomerororderhistroy('purchase_orders_process')" ng-show="namesHistory.length>0">
                              <li class="tl-item" ng-repeat="namesh in namesHistory">
                                 
                                 <div class="item-title">{{namesh.lable}} received and attend by <a href="{{namesh.url}}" target="_blank">{{namesh.user_name}}</a>. {{namesh.lable}} reference number <a href="{{namesh.url}}" target="_blank">{{namesh.order_no}}</a></div>
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
















  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="width: 800px;" >
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
                  <div class="col-12" ng-repeat="selectvendor in namesVendorselect">
                    
                     <p class="mb-0">  {{selectvendor.address}}</p>
                     <p class="mb-0"><b>Phone : {{selectvendor.phone}}</b></p>
                     <div class="report-column tinycol fifty mt-3">
                        <ul data-animate="colorScale" data-value="55" class="scaleColors">
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <div class="scoreTick" style="left: 55%;"></div>
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
                      <tr ng-repeat="selecthistory in remarksHistory" style="vertical-align: baseline;">
                          <td>{{selecthistory.no}}</td>
                          <td>{{selecthistory.remarks}}</td>
                        
                          <td><a href="<?php echo base_url(); ?>{{selecthistory.attachement}}" target="_blank"><i class="mdi mdi-file font-size-20"  title="Attachement" style="cursor: pointer;"></i></a></td>
                         
                           <td>{{selecthistory.create_date}}</td>
                          <td style="display:none;">
                              
                               <i class="mdi mdi-delete font-size-20" <?php echo $disabled;  ?> ng-click="deleteData1(selecthistory.id,selecthistory.vendor_id,selecthistory.order_id)" title="Delete" style="cursor: pointer;"></i>
                               
                          </td>
                      </tr>
                  </table>
                  
                  
                  
                  
                  
               </div>
            </div>
         </div>
      </div>

   





    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCompare" aria-labelledby="offcanvasRightLabel" style="width: 70%;">
         <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel"> Quotation </h5>
               
               
           
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body pt-0">
            <div class="card bg-transparent pt-0" style="box-shadow: none !important;">
               <div class="card-body pt-0">
                  <div class="col-12">
                    
                    
                    <h5>{{product_name_compare}} </h5>

  <table style="width: 100%;">
       
             
             
             <tr>
                 
                 <td>
                <table class="price-table" style="background: #f7f7f7;">
               
                <tr > <td>&nbsp;&nbsp;&nbsp;</td></tr>
                 <tr ><td>Price ({{compare_qty}})  {{compare_uom}} </td></tr>
                <tr ><td> Time Line</td></td>
                <tr ><td> Freight included or extra</td></td>
                <tr ><td> Extra</td></td>
                <tr ><td> Payment Terms</td></td>
                <tr ><td> Due Date</td></td>
                
                <tr ><td> Remarks</td></td>
                <tr ><td> File</td></td>
                <tr ><td> Action</td></td></tr>
                </table>
                </td>
                
                <td ng-repeat="compare in getcomparedata" ng-style="compare.selected_status == 1 && {'background-color':'#ffe0e0'}">
                <table class="price-table">
                <tr><td><b>{{compare.name}}</b></td></tr>
                <tr><td>{{compare.price}} INR</td></tr>
                
                <tr><td> {{compare.timeline}}</td></tr>
                <tr><td> {{compare.extra_included}}</td></tr>
                 <tr><td> {{compare.extra}}</td></tr>
                <tr><td> {{compare.payment_terms}}</td></tr>
                <tr><td> {{compare.due_date}}</td></tr>
                
                <tr><td> {{compare.remarks}}</td></tr>
                <tr><td data-bs-toggle="modal" ng-click="seletQutationfile(compare.attachement)" data-bs-target="#previewPdf"><u><i class="mdi mdi-file-outline text-muted font-size-16  me-1"></i><span style="margin:3px;"> QUOTE </span></u></td></td>
                <tr><td class="price" >
                    
                    
                    <span ng-if="order_base==1">
                          <a href="javascript:void(0);" ng-click="seletQutation(compare.id,compare.order_id,compare.vendor_id)">Select</a>
                   </span>
                   
                    
                      <span ng-if="compare.selected_status == 1">
                          
                                                          
                          
                          <a href="<?php echo base_url(); ?>index.php/purchase/po?order_id=<?php echo $enable_order; ?>&old_tablename=<?php echo $old_tablename; ?>&old_tablename_sub=<?php echo $old_tablename_sub; ?>&tablename=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&movetablename=<?php echo $movetablename; ?>&movetablename_sub=<?php echo $movetablename_sub; ?>" target="_blank" style="background: #ff1800;" ng-click="seletGenrate()">PO</a>
                          
                          
                          
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
                                            





<script>

$(document).ready(function(){
$("#autocomplete").focus();





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
     
     $scope.completeProduct=function(){
                 
                    $( "#autocomplete" ).autocomplete({
                      source: $scope.availableProducts
                    });
                    
            
            
     }; 
     
     
      $scope.seletQutationfile=function(srcfile){ 
           
           
           $('#embed').attr('src',srcfile);
           
     };
     
     
      $scope.seletQutation=function(id,order_id,vendor_id){ 
           
           
                           $http({
                            method:"POST",
                            url:"<?php echo base_url() ?>index.php/purchase/order_quotation_request_select",
                            data:{'purchase_order_quotation_id':id,'order_id':'<?php echo $order_id; ?>','vendor_id':vendor_id}
                            }).success(function(data){
                                
                                
                                
                                $scope.getcompareProduct();
                                $scope.fetchVendor();
                             
                           }); 
           
     };
     
     
     
      $scope.seletGenrate=function(){ 
           
         if(confirm("Are you sure you want to Genrate PO?"))
        {
                           $http({
                            method:"POST",
                            url:"<?php echo base_url() ?>index.php/purchase/order_quotation_request_po",
                            data:{'order_id':'<?php echo $order_id; ?>'}
                            }).success(function(data){
                               $scope.fetchSingleDatatotal(1);
        
                           }); 
                           
         }
           
     };
     
     
     
     
    $scope.getcompareProduct=function(){   
     $http.get('<?php echo base_url() ?>index.php/purchase/fetchcomapredata?order_id=<?php echo $order_id; ?>').success(function(data){
           $scope.getcomparedata = data;
           
           
            $scope.product_name_compare=data[0].product_name;
            $scope.compare_qty=data[0].qty;
            $scope.compare_uom=data[0].uom;
          
           });
    };
           
     $scope.getcompare=function(){ 
         
           $http.get('<?php echo base_url() ?>index.php/purchase/fetchcomapredata?order_id=<?php echo $order_id; ?>').success(function(data){
           $scope.getcomparedata = data;
           
           
            $scope.product_name_compare=data[0].product_name;
            $scope.compare_qty=data[0].qty;
            $scope.compare_uom=data[0].uom;
          
           });
         
     };
     
     
     
     
      $scope.onClickgetvendor=function(vendorid){ 
          
         
         
          $http.get('<?php echo base_url() ?>index.php/purchase/fetchDatavendorsdataseletet?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&vendorid='+vendorid).success(function(data){
      
      
           $scope.namesVendorselect = data;
          
        
          
          });
          
          
          
          
          
          
           $http.get('<?php echo base_url() ?>index.php/purchase/purchase_order_remarks_history?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&vendorid='+vendorid).success(function(data){
      
      
           $scope.remarksHistory = data;
          
        
          
          });
             
          
          
             
         
          
      }; 
     
     
     
     $scope.fetchhistory=function(vendorid,orderid){
          
          
           
           $http.get('<?php echo base_url() ?>index.php/purchase/purchase_order_remarks_history?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&vendorid='+vendorid).success(function(data){
      
      
           $scope.remarksHistory = data;
          
        
          
          });
          
          
      };
          
        
    $scope.completeProduct2=function(id){
        
        
    $( "#product_name_"+id ).autocomplete({
      source: $scope.availableProducts
    });
    
    
    }; 
             
    
     $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/fetchproduct_full",
              data:{'action':'fetch_single_data','cateid':0,'order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
              }).success(function(data){
        
                  $scope.availableProducts = data;
             
      });
    
    
   
   
    
    
   
    
 
    
    
    
   
    
 
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
                       
                       
                       if(inputname=='qty')
                       {
                           $scope.fetchSingleDatatotal(1);
            
                       }
                      

}



















$scope.saveVendor = function () {




var vendor_id=$('#choices-single-default').val();

 if(vendor_id!="")
 {
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/vendorupdate?order_id=<?php echo $order_id; ?>",
      data:{'vendor_ids':vendor_id,'order_id':'<?php echo $order_id; ?>','count_id':'<?php echo $count_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
       }).success(function(data){

      if(data.error != '1')
      {
          
         
          
         //window.location.href=location.pathname+'?order_id='+data.id;
         $('#choices-single-default').val('');
         $('#exampleModal').modal('toggle');
         $scope.fetchDatavendorsdata();
         $scope.fetchSingleDatatotal(1);

      }

    });
     
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
                   }
                   
                   
                   
                   
};









$scope.genratelink = function(id){
    
    
                    
                    
                   
    
                      $http({
                            method:"POST",
                            url:"<?php echo base_url() ?>index.php/purchase/genratelink",
                            data:{'order_id':id}
                          }).success(function(data){
                           
                              $scope.fetchDatavendorsdata();
                              $('#firstmodal3').modal('toggle');
                             
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
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&convert='+id).success(function(data){
      
      
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
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_total?order_id=<?php echo $order_id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>','convert':id}
      }).success(function(data){

       $scope.fulltotal = data.fulltotal;
       
       $scope.commission = data.commission;
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
       
       $scope.paricel_mode = data.paricel_mode;
       
       
       $scope.order_base=data.order_base;
       $scope.reason=data.reason;
       
       
       $scope.totalitems = data.totalitems;
       $scope.discounttotal = data.discount;
       $scope.discountfulltotal = data.discountfulltotal;
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
    //if(confirm("Are you sure you want to remove it?"))
    //{
    
       $http({
         method:"POST",
        url:"<?php echo base_url() ?>index.php/purchase/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'purchase_order_remarks'}
      }).success(function(data){
       
         
         $scope.fetchhistory(vendor_id,order_id);
         
      }); 
    
      
    //}
};
 



$scope.fetchCustomerororderhistroy = function(table)
{
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroy",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablenamemain':table}
    }).success(function(data)
    {

            $scope.namesHistory = data;
          
    });
};















  $scope.submitCallBack = function(){


      

 var filetype=$('#filetype').val();
 var remarks=$('#remarks').val();
 var vendor_id=$('#vendor_id').val();


 
 
 if(remarks!='')
 {
     
    $('#savecallback').html('Loading...');
 
 
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/callbacksave",
      data:{'remarks':remarks,'filetype':filetype,'vendor_id':vendor_id,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','tablenamemain':'purchase_order_remarks'}
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

                                 
                               $scope.fetchhistory(vendor_id,'<?php echo $order_id; ?>');  

          

          }

          

      }

       
    });
    };



}









  $scope.submitPurchaseinvoice = function(){



                              $('#uploadinvoice').html('Loading...');
 
                               var filetype=0
                               var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file', file);  
                               });  
                               
                               
                               $http.post('<?php echo base_url() ?>index.php/purchase/fileuplaodbyorder_invoice?id=<?php echo $order_id; ?>&filetype='+filetype, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                        $('#uploadinvoice').html('Upload');
                                    
                                    
                                        $scope.successcc = true;
                                        $('#fileupload2').val('');
                                        $scope.successMessagec = 'Invoice Uploaded';
                                        $scope.getPurchaserequest();
                                        
                                    
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
       $scope.gst=data.gst;
       $scope.address=data.address;
      
     
    });
};



});


    
</script>

    <?php include ('footer.php'); ?>
</body>
</html>

