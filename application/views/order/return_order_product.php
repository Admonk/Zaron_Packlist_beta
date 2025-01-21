<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 




 ?>
<style type="text/css">
.ui-widget.ui-widget-content {
    border: 1px solid #d3d3d3;
    z-index: 9999;
    height: 95px;
    overflow-y: scroll;
    overflow-x: hidden;
    margin-left: -230px !important;
}
header#page-topbar {
    background: #e3e3e3 !important;
}
i.mdi.mdi-check.font-size-16.ng-scope {
    position: absolute;
    margin: -3px 5px;
}
.editvalue {
    position: absolute;
    color: red;
    z-index: 999;
    margin: -15px -4%;
    text-align: right;
    width: 100%;
    font-size:9px;
    font-weight:600;
}

.setInputtotal {
    border: none;
    width: 60px;
}

.editvaluerate {
    position: absolute;
    color: red;
    z-index: 999;
   
   
    text-align: right;
    width: 50%;
    font-size: 9px;
    font-weight: 600;
    margin-left: 40%;
}


.draggable
{
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
.time
{
    border-bottom: none;
}


.top-left-doble-two-special {
    position: absolute;
    top: 0%;
    left: 36%;
}

.top-left-doble-three-special {
    position: absolute;
    top: 8%;
    left: 62%;
}
.top-left-doble-five-special {
    position: absolute;
       top: 32%;
    left: 40%;
}

.top-left-doble-seven-special {
    position: absolute;
    top: 43%;
    left: 34%;
}


.top-left-doble-six-special {
    position: absolute;
    top: 48%;
    left: 46%;
}


.top-left-doble-one-special {
    position: absolute;
    top: 75%;
    left: 34%;
}

.top-left-doble-four-special {
    
    position: absolute;
    top: 64%;
    left: 58%;
}


.top-left-doble-two-reverse {
    position: absolute;
    top: 22%;
    left: 48%;
}

.top-left-doble-three-reverse {
    position: absolute;
    top: 44%;
    left: 55%;
}

.top-left-doble-five-reverse {
    position: absolute;
    top: 73%;
    left: 37%;
}
.top-left-doble-six-reverse {
    position: absolute;
    top: 22%;
    left: 77%;
}

.top-left-doble-seven-reverse {
    position: absolute;
    top: 59%;
    left: 73%;
}
div#show_details2 
{
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
     
     
     
     
     
     
.floater-options1 {
position: fixed;
/*bottom: 0px;*/
background: #efefef;
padding: 4px;
border: 1px solid #cbcbcb;
z-index: 999;
left: 0px;
right: 0px;
 bottom: 0%;
height: auto;
}
.fixed-sidebar {
height: 85% !important;
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
   top: 13%;
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
    text-align: center;
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
      bottom: 55%;
    right: 15%;
}

.bottom-left-profile {
      position: absolute;
        bottom: 22%;
    left: 41%;
}

.top-right-profile {
   
  position: absolute;
    top: 186px;
    right: 50%;
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







.search-box .search-icon {
   
    margin: -8px 0px;
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
     $read1='';
     $disabled='';
     $access=array('11','12','17');
     if(in_array($this->session->userdata['logged_in']['access'], $access))
     {
         
     
         
         if($status_base==6)
         {
             $read='disabled';
             $read1='disabled';
             $disabled='disabled';
         }
         if($status_base==1)
         {
             
             
             if(isset($order_base))
             {
                 if($order_base==1)
                 {
                      $read='disabled';
                      $read1='disabled';
                      $disabled='disabled';
                 }
             }
             
             
         }
      
     }
     
     
     if(isset($_GET['convertion']))
     {
             
          if($_GET['convertion']==2)
          {
                      $read='disabled';
                      $read1='';
                      $disabled='disabled';
               
          }
              
           
     }
     
     //  $classviewweight="d-none";
     // if($this->session->userdata['logged_in']['access']==1)
     // {
         
         $classviewweight="";
         
         
     // }
     ?>

     <?php
       if($optionid == '2'){

        $read1 = '';
       }else {
        $read1 = $read1;
       }
      ?>






   <div id="layout-wrapper">
         
         <div class="main-content">
             <div class="page-content min-vh-100 white-bg">
               <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-9 col-12 leftpan-bar fullWidthPan">

                        <div class="customer-bill-info mb-1">
                           <div class="row">
                               
                               
                                 <div class="d-flex inlineFlexBox">
                               
                                  <div class="d-inline col-2 pe-3 border-end">
                                     <label><?php echo $order_title; ?> <span class="badge bg-primary"><?php echo $order_lable; ?></span></label>
                                     <h4 class="mb-sm-0 font-size-10 text-primary">{{order_no_id}}</h4>
                                     <h4 class="mb-sm-0 text-muted mt-2 font-size-10">{{create_date}} <span class="text-muted font-size-10">{{create_time}}</span></h4>
                                     <input type="date" ng-if="order_base==0" class="form-control" id="create_date_set" ng-model="create_date_set" ng-change="saveDate()">
                                     
                                  </div>
                                  
                                  
                                 
    
                                  <div class="d-none col-3 pe-2 ps-2 border-end">
                                     
                                     <span style="font-size:11px;margin-bottom: 0;">Behalf of </span>
                                      
                                      
                                      <input type="hidden" id="userdataget" value="{{user_id}}">
                                     
                                       <select class="form-control" name="user_id" ng-change="saveSales()" <?php echo $disabled;  ?>  ng-model="user_id">
    
                                              <option value=""> Select Sales</option>
                
                                              <?php
                                                foreach ($sales_team as $valued) {
                                                    
                                                    if($this->session->userdata['logged_in']['userid']!=$valued->id)
                                                    {
                                                      
                                                      if($valued->deleteid==0)
                                                      {
                                                         if($valued->status==1)
                                                         {  
                                                     
                                                  ?>
                                                       <option value="<?php echo $valued->id; ?>"><?php echo $valued->name; ?></option>
                                                  <?php

                                                         }
                                                  
                                                      }
                                                  
                                                    }
                                                  
                                                  
                                                  
                                                }
                                              ?>
                                          
                                     </select>
                                                           
                                  </div>
                                  
                                  
                             
                                  
                                  
                                  
                                  <div class="d-inline col-3 pe-2 ps-2 border-end" ng-init="fetchCustomerorderdata()">
                                   
                                    
                                      <div class="dropdown float-end">
                                         
                                          <?php
                                             if($status_base!=6)
                                             {
                                             ?> 
                                            <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </a>
                                             <?php
                                             }
                                             ?>
                                           
                                           
                                            
                                            
                                            
                                            
                                            <div class="dropdown-menu dropdown-menu-end" >
                                                
                                                
                                                
                                                
                                                <a class="dropdown-item" id="clikcustomerbox" href="#" ng-if="customername" ng-click="editcustomre(name.id)" >Change Customer</a>
                                               
                                               
                                                <?php
                                              
                                                if($this->session->userdata['logged_in']['access']=='20')
                                                {
                                                                                
                                                ?> 
                                                <a class="dropdown-item right-bar-toggle" ng-click="addon(name.id)" href="#"  >New Customer</a>
                                                
                                                <?php
                                                }
                                                ?>
                                                
                                                
                                                
                                                
                                               
                                            </div>
                                         </div>
                                        
                                            
                                              
                                           <span ng-if="customername" class="text-muted d-block font-size-10"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;  {{customername}}</span>
                                        
                                          <span  ng-if="customerphone" class="text-muted d-block font-size-10"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp;{{customerphone}} </span> 
                                          
                                          
                                     
                                     
                                      
                                       <div class="align-items-center" id="showcustomeredit" ng-if="customername" style="display:none;">
                                                    <div class="mb-3">
                                                      
                                                      <input type="text" class="form-control border-bottom-input" ng-model="customer"  ng-keyup="completeCustomer()" ng-keypress="saveCustomer($event)"  placeholder="Search Customer"  id="autocomplete_customer" >
                                                    </div>
                                       </div>
                                       
                                        <div class="align-items-center"  ng-if="!customername" >
                                                    <div class="mb-3">
                                                     
                                                      <input type="text" class="form-control border-bottom-input" ng-model="customer" ng-keyup="completeCustomer()"  placeholder="Search Customer" ng-keypress="saveCustomer($event)" id="autocomplete_customer">
                                                    </div>
                                       </div>
                                       
                                       
                                      
                                      
                                                
                                                
                                  </div>
                                  
                                  
                                  <div class="d-inline col-4 ps-2" >
                                      
                                     
                                      <div class="dropdown float-end" ng-if="customername">
                                           
                                      
                                             <?php
                                             if($status_base!=6)
                                             {
                                             ?> 
                                             <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                             </a>
                                             <?php
                                             }
                                             ?>
                                            
                                            
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item"   data-bs-toggle="offcanvas" data-bs-target="#offcanvasSpec-address" aria-controls="offcanvasSpec-address" href="#">Choose Address</a>
                                                
                                            </div>
                                        </div>
                                    
                                      
                                         <span ng-if="delivery_address" class="text-muted d-block font-size-10"><b> <i class="mdi mdi-truck-delivery font-size-14 pe-1" ng-if="delivery_address"></i></b>&nbsp;&nbsp;&nbsp {{delivery_address}} 
                                        </span>
                                         
                                         
                                         
                                          <h6 ng-if="locality_name" class="text-muted d-block font-size-12 mt-1 mb-1"><i class="fa fa-map" aria-hidden="true"></i> &nbsp;<b>  Locality : </b> {{locality_name}} </h6> 
                                         
                                                    
                                           
                                         
                                           <?php
                                                           
                                                           if($tablename=='orders_process')
                                                           {
                                                               ?>
                                                               
                                                                <h6  ng-if="paricel_mode" class="text-muted d-block font-size-12 mt-1 mb-1"><i class="mdi mdi-truck-delivery font-size-15 pe-1"></i> Delivery Mode : &nbsp; 
                                                                
                                                                
                                                                 <span ng-if="paricel_mode==0">Full</span>
                                                                 <span ng-if="paricel_mode==1">Partial / Spilt</span>
                                                                 <span ng-if="paricel_mode==2">Self Pickup</span>
                                                               
                                                                
                                                                
                                                                </h6>
                                                               
                                                               <?php
                                                           }
                                                           
                                                           ?>
                                                           
                                                           
                                         
                                         
                                         
                                             
                                       
                                     
                                  </div>
                                     
                                 
                                 </div>
                              

                           </div>
                        </div>
                        
                        
                         <?php
                                $classrow="";
                                if($order_status==1)
                                {
                                     $classrow="d-none";
                                     $read='readonly';
                                      $read1='readonly';
                                    
                                }  
                                if($optionid == '2')   {
                                        $read1='';
                                        $read ='';
                                }else {
                                        $read1='readonly';
                                  }
                               ?>
                        <div class="search-info mb-1 border-bottom <?php echo $classrow; ?>">
                              
                             <div class="row" >
                             <div class="col-12">
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="1" ng-click="fethcProduct(1)" style="cursor: pointer;" data-value="Accesories1">Accesories 1</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="1" ng-click="fethcProduct(1)" style="cursor: pointer;" data-value="Accesories2">Accesories 2</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="1" ng-click="fethcProduct(1)" style="cursor: pointer;" data-value="Accesories3">Accesories 3</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="40"  ng-click="fethcProduct(40)" style="cursor: pointer;" data-value="Sag_Road">Sag Rod</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="41" ng-click="fethcProduct(41)" style="cursor: pointer;" data-value="Cleat"> Cleat</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="3"  ng-click="fethcProduct(3)" style="cursor: pointer;" data-value="Iron And Steel Gar Sheet-zaron">Iron And Steel Gar Sheet-zaron</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="32" ng-click="fethcProduct(32)" style="cursor: pointer;" data-value="Arch">Arch</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="34" ng-click="fethcProduct(34)" style="cursor: pointer;" data-value="Decking sheet">Decking sheet</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="5" ng-click="fethcProduct(5)" style="cursor: pointer;" data-value="Purlin">Purlin</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="36" ng-click="fethcProduct(36)" style="cursor: pointer;" data-value="Aluminium">Aluminium</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="9" ng-click="fethcProduct(9)" style="cursor: pointer;" data-value="Screw accesories">Screw accesories</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="26" ng-click="fethcProduct(26)" style="cursor: pointer;" data-value="Tile sheet">Tile sheet</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="24" ng-click="fethcProduct(24)" style="cursor: pointer;" data-value="L Angle">L Angle</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="39" ng-click="fethcProduct(39)" style="cursor: pointer;" data-value="Z Angle">Z Angle</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="15" ng-click="fethcProduct(15)" style="cursor: pointer;" data-value="UPVC">UPVC</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="20" ng-click="fethcProduct(20)" style="cursor: pointer;" data-value="Multiwall">Multiwall</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="13" ng-click="fethcProduct(13)" style="cursor: pointer;" data-value="Polynum">Polynum</span>
                                   <span class="btn btn-soft-secondary  btn-sm onclick" data-id="17" ng-click="fethcProduct(17)" style="cursor: pointer;" data-value="Fan & Base">Fan & Base</span>
                                   
                                 
                                 
                                    <span class="btn btn-soft-secondary  btn-sm onclick" data-id="590" ng-click="fethcProduct(590)" style="cursor: pointer;" data-value="Liner Sheets">Liner Sheets</span>
                                    <span class="btn btn-soft-secondary  btn-sm onclick" data-id="591" ng-click="fethcProduct(591)" style="cursor: pointer;" data-value="Roll Sheet">Roll Sheet</span>
                                    <span class="btn btn-soft-secondary  btn-sm onclick" data-id="592" ng-click="fethcProduct(592)" style="cursor: pointer;" data-value="Rent Bill">Rent&charges</span>
                                    <span class="btn btn-soft-secondary  btn-sm onclick" data-id="593" ng-click="fethcProduct(593)" style="cursor: pointer;" data-value="Steel Coil">Steel Coil</span>
                                   
                                   
                                
                                </div>   
                            </div>
                            
                            
                          
                            <div class="row <?php echo $classrow; ?>">
                             
                             <div class="col-md-2"><span style="color:red;">*  all inputs are in feet </span></div>
                             <div class="col-md-10">
                            
                              
                                       
                                         <input type="radio" class="form-check-input calculationsum" checked ng-click="changeConvert()"  name="checkboxformula" value="3" id="FEET"> 
                                         <label class="form-check-label" for="FEET">FEET&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        
                                         <input type="radio" class="form-check-input calculationsum"  name="checkboxformula" ng-click="changeConvert()" value="4" id="MM"> 
                                         <label class="form-check-label" for="MM">MM&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                         
                                         <input type="radio" class="form-check-input calculationsum"  name="checkboxformula" ng-click="changeConvert()"  value="5" id="MTR"> 
                                         <label class="form-check-label" for="MTR">MTR&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                         
                                         
                                          <input type="radio" class="form-check-input calculationsum"  name="checkboxformula" ng-click="changeConvert()" value="6" id="INCH"> 
                                         <label class="form-check-label" for="INCH">INCH&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                         
                                         
                            
                               </div>
                               
                             </div>  
                             
                               
                           
                            <div class="row <?php echo $classrow; ?>" style="margin-bottom: -1%;">
                              <div class="col-lg-7 col-12">
                                    <div class="search-box position-relative" id="normalview" ng-if="customername">
                                        
                                        
                                        
                                       <input type="text" ng-model="profile"  id="autocomplete" <?php echo $read; ?> ng-keyup="completeProduct()"  ng-keypress="saveDetails($event)" name="profile" class="form-control rounded border autocomplete" placeholder="Product/Profile/Crimp/Nos/Unit">
                                       <i class="bx bx-subdirectory-right search-icon"></i>
                                       
                                       
                                        
                                        
                                        
                                         <select class="form-select form-inline border" style="display:none !important;">
                                             <option>Select</option>
                                             <option>Accessories</option>
                                             <option>Products</option>
                                         </select>
                                            <span id="showhelptext"></span>
                                    </div>
                                    
                                    
                                    
                                     
                                    <div class="search-box position-relative"   id="tielview" style="display:none;">
                                       
                                       
                                       <div class="row">
                                           <div class="col-md-4">
                                                 <input type="text"  id="autocomplete3"  <?php echo $read; ?> ng-keyup="completeProductNa()" ng-blur="getproductbasefact()"   class="form-control rounded border autocomplete" placeholder="Product">
                                                   <i class="bx bx-subdirectory-right search-icon" style="margin: 0px 12px;"></i>
                                         
                                           </div>
                                           
                                           <div class="col-md-4">
                                                <select class="form-control" id="mmfact" ng-init="productMMbaseproduct(1,1)">
                                                    
                             <option ng-repeat="mmsetsst in availableProductsmmval" value="{{mmsetsst.length_mm}}"> {{mmsetsst.length_mm}} </option>
                                                                          
                                            
                                         </select>
                                           </div>
                                           
                                           <div class="col-md-4">
                                                 <input type="text" placeholder="Nos" ng-keypress="saveDetails2($event)" class="form-control" id="nnom">
                                           </div>
                                       </div>
                                      
                                         
                                         
                                          
                                        
                                    </div>
                                    
                                    
                             
                                    
                                    
                                    
                              </div>
                              <div class="col-lg-5 col-12">
                                  <div class="row d-flex justify-content-start minformControl">
                           
                           
                             <?php
                            if($status_base!=6)
                            {
                            ?>
                           
                            <div class="col-lg-4 col-4 text-end">
                                <div class="input-group">
                                    <div class="input-group-text small-inputbox">Insert</div>
                                    <input type="text" class="form-control small-inputbox" <?php echo $read; ?> ng-keypress="rowincress($event)" id="rowincress" placeholder="23">
                                </div>
                            </div>
                            
                            <?php

                            }

                            ?>
                            
                             <?php
                                                      
                                                      if($status_base==10)
                                                      {
                                                          
                                                          ?>
                            
                            <div class="col-lg-2 col-2">
                                <div class="btn-group btn-group-sm">
                                   
                                    <button type="button" class="btn btn-outline-danger" ng-click='appprox(1)' ng-if="approx_id==0">Approx</button>
                                    <button type="button" class="btn btn-success" ng-click='appprox(0)' ng-if="approx_id==1">Approxed</button>
                                    
                                </div>
                            </div>
                            
                            <?php
                            
                                                      }
                                                      
                              ?>
                              
                              
                              
                             <?php
                            if($status_base!=6)
                            {
                            ?>  
                              
                              
                            <div class="col-lg-3 col-3">
                                <div class="btn-group btn-group-sm">
                                    
                                    <span ng-if="commission_check==0" style="display: flex;">
                                        
                                       <label class="form-check-label" for="formrow-customCheck-val">Commission &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                       <input type="checkbox" class="form-check-input" ng-click="checkValCommission()" <?php echo $disabled;  ?> name="checkboxcommision" value="0" id="formrow-customCheck-val"> 
                                       
                                    </span>
                                    
                                     <span ng-if="commission_check==1" style="display: flex;">
                                        
                                       <label class="form-check-label" for="formrow-customCheck-val">Commission &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                       <input type="checkbox" class="form-check-input" ng-click="checkValCommission()" <?php echo $disabled;  ?> checked name="checkboxcommision" value="1" id="formrow-customCheck-val"> 
                                       
                                    </span>
                                    
                                    
                                   
                                    
                                </div>
                            </div>
                            
                            
                             <?php

                              }

                            ?>
                            <div class="col-lg-3 col-3 text-end" ng-init="fetchDataCategorybase(1)">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                   
                                      <button type="button" class="btn btn-danger" id="setbg1" ng-click='convert(1)'>MTR</button>
                                     <button type="button" class="btn btn-outline-danger" id="setbg2" ng-click='convert(2)'>SQFT</button>
                                </div>
                            </div>
                            
                            
                        </div>
                              </div>
                           </div>
                           
                             
                            
                              
                              
                        </div>
                        
                     
                        
                        
                        
                        
                
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="card table-editable-info" navigatable ng-init="fetchData('1')">
                            
                            
                            
  
                        
                           <input type="hidden" id="order_product_id_base_define">
                           <input type="hidden" id="product_id_base_define">
                           <input type="hidden" id="clickcateid">
                                                    
                        
                      
                        
                            
                            
                           <div class="card-body p-0"  >
                              <div class="table-rep-plugin" ng-repeat="namecate in namesDatacate" >
                                  
                                
                                 <h5 class="customTableHeading" > <input type="checkbox" class="allcheck_{{namecate.categories_id}}" ng-click="loadProductAll(namecate.categories_id)"> {{namecate.no}}. {{namecate.categories_name}}</h5>
                                 
                                  <div class="table-responsive  customTableDesign mb-0" data-pattern="priority-columns" >
                                    <table id="datatable_{{namecate.categories_id}}" class="table table-bordered dt-responsive  nowrap w-100 salestable" >
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                       <thead class="bg-gray text-red" ng-if="namecate.categories_id==1">
                                         
                                         
                                        
                                          <tr>
                                              <th class="table-width-3" rowspan="2">&nbsp;&nbsp;&nbsp;S.No&nbsp;&nbsp;&nbsp;</th>
                                              <th class="table-width-3" rowspan="2" style="display:none;">Return Status</th>
                                             <th class="table-width-18" rowspan="2" data-priority="1" ng-click='sortColumn("product_name_tab")' ng-class='sortClass("product_name_tab")'>Products <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            
                                            
                                             <th class="table-width-8" data-priority="3">UOM</th>
                                             
                                             
                                             <th class="table-width-8" ng-if="namecate.labletype==2 || namecate.labletype==1"  style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("profile_tab")' ng-class='sortClass("profile_tab")'>{{namecate.lable}} <i class="fa fa-sort" aria-hidden="true"></i></th>
                                             <th class="table-width-8" ng-if="namecate.labletype==2" data-priority="1" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>Length <i class="fa fa-sort" aria-hidden="true"></i></th>
                                             <th class="table-width-6" ng-if="namecate.labletype==2 || namecate.labletype==1" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>{{namecate.lablenos}} <i class="fa fa-sort" aria-hidden="true"></i></th>
                                             
                                             
                                             
                                            
                                             <!--<th class="table-width-6" data-priority="3">Unit</th>-->
                                             <!--<th class="table-width-8" data-priority="6"  ng-click='sortColumn("Meter_to_Sqr_feet")' ng-class='sortClass("Meter_to_Sqr_feet")'>Sqft <i class="fa fa-sort" aria-hidden="true"></i></th>-->
                                             <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("rate_tab")' ng-class='sortClass("rate_tab")'>Basic Rate <i class="fa fa-sort" aria-hidden="true"></i></th>
                                             <th class="table-width-10 comdisplay" rowspan="2" ng-if="commission_check==1" data-priority="6" ng-click='sortColumn("commission_tab")' ng-class='sortClass("commission_tab")'> Commission <i class="fa fa-sort" aria-hidden="true"></i></th>
                                             <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'>{{namecate.uom}} <i class="fa fa-sort" aria-hidden="true"></i></th>
                                             
                                              <?php
                                            //  if(isset($_GET['convertion']))
                                            //  {
                                              ?>
                                               <th class="table-width-10" data-priority="6" ng-if="namecate.uom=='Kg' || namecate.categories_id==34 || namecate.categories_id==36 || namecate.categories_id==626" rowspan="2" ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'>Actual Kg <i class="fa fa-sort" aria-hidden="true"></i></th>
                                             
                                              <?php
                                            //  }
                                              ?>
                                            
                                             <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("amount_tab")' ng-class='sortClass("amount_tab")'>Amount <i class="fa fa-sort" aria-hidden="true"></i></th>
                                             
                                             
                                              <th class="table-width-10 <?php echo $classviewweight; ?>" data-priority="6" rowspan="2"  ng-click='sortColumn("weight_tab")' ng-class='sortClass("weight_tab")'>Weight <i class="fa fa-sort" aria-hidden="true"></i></th>
                                              
                                    
                                               
                                               <th class="table-width-10 <?php echo $classrow ?>" data-priority="6" rowspan="2" >Action</th>
                                             
                                              
                                              
                                               <th class="table-width-10" data-priority="6" colspan="2" style="text-align: center;">Attachment</th>
                                             
                                          </tr>
                                          
                                          
                                          
                                       </thead>
                                       
                                       
                                       
                                        <thead class="bg-gray text-red" ng-if="namecate.categories_id!=1">
                                         
                                       
                                         
                                          <tr>
                                              <th class="table-width-3" rowspan="2">&nbsp;&nbsp;&nbsp;S.No&nbsp;&nbsp;&nbsp;</th>
                                              <th class="table-width-3" rowspan="2" style="display:none;">Return Status</th>
                                             <th class="table-width-18" rowspan="2" data-priority="1" ng-click='sortColumn("product_name_tab")' ng-class='sortClass("product_name_tab")'>Products <i class="fa fa-sort" aria-hidden="true"></i></th>

                                              <th class="table-width-18" ng-if="namecate.categories_id!=590 && (namecate.labletype==16 || namecate.labletype==19)" rowspan="2"
                            data-priority="1" ng-click='sortColumn("product_name_tab")'
                            ng-class='sortClass("product_name_tab")'>Categories <i class="fa fa-sort"
                              aria-hidden="true"></i></th>
                                            
                                             <th class="table-width-18" ng-if="(namecate.labletype==4 && namecate.tile_check == 0) || namecate.categories_id==599" rowspan="2" data-priority="1" ng-click='sortColumn("product_name_tab")' ng-class='sortClass("product_name_tab")'>Tile Material <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            
                                            
                                            
                                            <th class="table-width-18" ng-if="(namecate.labletype==16 || namecate.labletype==19) && namecate.tile_check == 0"rowspan="2" data-priority="1">Material Specfication
 <i class="fa fa-sort" aria-hidden="true"></i></th>
 
 
 
 <th class="table-width-15" ng-if="namecate.labletype==19" rowspan="2" data-priority="1" >Remarks
 <i class="fa fa-sort" aria-hidden="true"></i></th>
 
 
  <th class="table-width-15" ng-if="namecate.labletype==19" rowspan="2" data-priority="1" >Coil_no 
 <i class="fa fa-sort" aria-hidden="true"></i></th>
 
 
 
 
 
  <th class="table-width-18" ng-if="namecate.categories_id==592" rowspan="2" data-priority="1" >Description
 <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            
                                            
                                            
                                            
                                              <th class="table-width-8" data-priority="3" ng-if="namecate.labletype!=9">UOM</th>
                                              
                                              
                                                <th class="table-width-15" ng-if="namecate.labletype==19" rowspan="2" data-priority="1" ng-click='sortColumn("product_name_tab")' ng-class='sortClass("product_name_tab")'>Coil_Status 
 <i class="fa fa-sort" aria-hidden="true"></i></th>
                                              
                                              <th class="table-width-8" ng-if="namecate.labletype==5 || namecate.labletype==6 || namecate.categories_id == 611 || namecate.categories_id == 627" >Billing Option</th>
                                             
                                              <th class="table-width-8" ng-if="namecate.labletype==11 || namecate.labletype==12" >Dim 1</th>
                                              <th class="table-width-8" ng-if="namecate.labletype==11 || namecate.labletype==12" >Dim 2</th>
                                              <th class="table-width-8" ng-if="namecate.labletype==12" >Dim 3</th>
                                             
                                             
                                              <th class="table-width-8"   data-priority="3" ng-if="namecate.labletype==8 || namecate.labletype==1 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==4 || namecate.labletype==15" style="padding-bottom:0px" ng-click='sortColumn("profile_tab")' ng-class='sortClass("profile_tab")'>{{namecate.lable}} <i class="fa fa-sort" aria-hidden="true"></i></th>
                                              
                                              
                                              <th class="table-width-10" ng-if="namecate.labletype==8" data-priority="3" style="padding-bottom:0px" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>Extra {{namecate.lable}} <i class="fa fa-sort" aria-hidden="true"></i></th>
                                              <th class="table-width-8" ng-if="namecate.labletype==8" style="display:none;" data-priority="3" style="padding-bottom:0px" ng-click='sortColumn("back_crimp_tab")' ng-class='sortClass("back_crimp_tab")'>Back {{namecate.lable}} <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            
                                              <th class="table-width-8" ng-if="(namecate.labletype==11 || namecate.labletype==7 || namecate.labletype==12 || namecate.labletype==1 || namecate.labletype==6 || namecate.labletype==15) && namecate.categories_id!=611 && namecate.categories_id != 5 && namecate.categories_id !=627 && namecate.categories_id !=628" data-priority="1" style="padding-bottom:0px" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>{{namecate.lable2}} <i class="fa fa-sort" aria-hidden="true"></i></th>

                                              
                                             
                                            
                                              <th class="table-width-6"  data-priority="3" ng-if="namecate.labletype!=9" rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>{{namecate.lablenos}}<i class="fa fa-sort" aria-hidden="true"></i></th>
                                            
                                            
                                            
                                            
                                             <!--<th class="table-width-6" data-priority="3">Unit</th>-->
                                             <th class="table-width-6"  ng-if="(namecate.labletype==1 || namecate.labletype==2 || namecate.labletype==3 || namecate.labletype==4 || namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==8 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==13 || namecate.labletype==14) && namecate.categories_id!=611"   data-priority="6"  rowspan="2" ng-click='sortColumn("fact_tab")' ng-class='sortClass("fact_tab")'> {{namecate.lablefact1}}  {{namecate.lablefact2}} <i class="fa fa-sort" aria-hidden="true"></i></th>
                                            
                                            
                                            
                                             <!--<th class="table-width-8" data-priority="6"  ng-click='sortColumn("Meter_to_Sqr_feet")' ng-class='sortClass("Meter_to_Sqr_feet")'>Sqft <i class="fa fa-sort" aria-hidden="true"></i></th>-->
                                             <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("rate_tab")' ng-class='sortClass("rate_tab")'>Basic Rate <i class="fa fa-sort" aria-hidden="true"></i></th>
                                             <th class="table-width-10 comdisplay"        rowspan="2" ng-if="commission_check==1" data-priority="6" ng-click='sortColumn("commission_tab")' ng-class='sortClass("commission_tab")'> Commission <i class="fa fa-sort" aria-hidden="true"></i></th>
                                             <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'>{{namecate.uom}} <i class="fa fa-sort" aria-hidden="true"></i></th>
                                             
                                              
                                             <?php
                                             if(isset($_GET['convertion']))
                                             {
                                              ?>
                                               <th class="table-width-10" data-priority="6" ng-if="namecate.uom=='Kg' || namecate.categories_id==34 || namecate.categories_id==36 || namecate.categories_id==626" rowspan="2" ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'>Actual Kg <i class="fa fa-sort" aria-hidden="true"></i></th>
                                             
                                              <?php
                                             }
                                              ?>
                                            
                                              <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("amount_tab")' ng-class='sortClass("amount_tab")'>Amount <i class="fa fa-sort" aria-hidden="true"></i></th>
                                             
                                             
                                              <th class="table-width-10 <?php echo $classviewweight; ?>" data-priority="6" rowspan="2" ng-click='sortColumn("weight_tab")' ng-class='sortClass("weight_tab")'>Weight <i class="fa fa-sort" aria-hidden="true"></i></th>
                                              
                                             
                                              <th class="table-width-10 <?php echo $classrow ?>" data-priority="6" rowspan="2" >Action</th>
                                             
                                             
                                             
                                               <th class="table-width-10"  ng-if="namecate.cate_status==1" data-priority="6" colspan="2" style="text-align: center;">Attachment</th>
                                             
                                          </tr>
                                          
                                          
                                          
                          
                                          
                                          
                                       </thead>
                                       
                                       
                                       
                                       
                                       
                                       
                                       <tbody  ng-repeat="name in namesData|orderBy:column:reverse" ng-if="namecate.categories_id==1">
                                           
                                           
                                           

                                          <tr  ng-style="name.rate_edit == 1 && {'color':'red'}"    class="view" ng-if="namecate.categories_id==name.categories_id_get && namecate.type==name.type">
                                           
                                           
                                             <td data-label="S No"><label for="nn_{{name.id}}" style="margin-bottom:0px;">

                                                <input type="checkbox" name="checkinsert" ng-if="name.disabled==0" class="checkinsert fill_{{namecate.categories_id}}"  alt="{{name.product_id}}" ng-click="checkhidesortid(name.sorthide,name.id)"  value="{{name.id}}" id="nn_{{name.id}}"  ng-checked="name.picked_status == 1">


<input type="checkbox" name="checkinsert"  ng-if="name.disabled==1" disabled  class="checkinsert fill_{{namecate.categories_id}}"  alt="{{name.product_id}}" ng-click="checkhidesortid(name.sorthide,name.id)"  value="{{name.id}}" id="nn_{{name.id}}"  ng-checked="name.picked_status == 1">






                                            &nbsp;&nbsp;&nbsp;   {{name.no}}</label>   <span class="td-info-icons" ng-if="name.same==1">&nbsp;&nbsp;&nbsp; <i class="mdi mdi-chevron-down" title="Similar Price List" style="font-size: 20px;font-weight: 800;color: #ee5c17;margin: 0px -10px;cursor: pointer;display:none;" ng-click="similarenq(name.product_id,name.product_name_tab,namecate.categories_id)"></i></span> 
                                             
                                             
                                             
                                             
                                               <i class="mdi mdi-check  font-size-16"  ng-if="name.purchase_request==1" ng-click="getPurchaserequest(name.id,name.purchase_id,name.product_name_tab)" title="Purchase requested" style="cursor: pointer;"></i>
                                             
                                             
                                             
                                             
                                             </td>
                                             
                                             
                                             
                                             <td style="display:none;">
                                                 
                                                 <select class="return_complaint" ng-change="inputsave_1(name.id,'return_complaint',namecate.categories_id,namecate.type)" ng-model="return_complaint" id="return_complaint_{{name.id}}" name="return_complaint">
                                                 <option value="">Select Status</option>
                                                 <option value="Yes"  ng-selected="{{name.return_complaint == 'Yes'}}">Yes</option>
                                                 <option value="No"  ng-selected="{{name.return_complaint == 'No'}}">No</option>
                                                 <option value="No issue"  ng-selected="{{name.return_complaint == 'No issue'}}">No issue</option>
                                                 </select>
                                             </td>
                                           
                                           
                                           
                                            <input type="hidden"  value="{{namecate.categories_id}}"  id="cateid_{{name.id}}">
                                            <input type="hidden"  value="{{namecate.type}}"  id="cateidtype_{{name.id}}">
                                            <input type="hidden"  value="{{name.product_id}}"  id="ppid_{{name.id}}">
                                          
                                            
                                                 <td title="{{name.categories}}"  data-label="Products">
                                                 <input type="text"   ng-keyup="completeProduct2(name.id)" <?php echo $read1; ?>  ng-blur="inputsave_1(name.id,'product_name',namecate.categories_id,namecate.type)"   id="product_name_{{name.id}}" value="{{name.product_name_tab}}">
                                                      
                                                       <span class="td-info-icons td-competitor-price tdStockPos" title="Current Stock" style="display:none;">
                                                         <small style="color:green;" ng-if="name.stock!=0" ><b>Stock : {{name.stock}}</b></small>
                                                         <small style="color:red;" ng-if="name.stock==0"><b>Stock : {{name.stock}}</b></small>
                                                       </span>
                                                       
                                                 </td>
                                             
                                             
                                              <td  data-priority="3" data-label="UOM" >
                                                
                                                  <select class="selectbox" disabled  ng-change="inputsavecal_1(name.id,name.uom,'uom',namecate.categories_id,namecate.type)" id="uom_{{name.id}}"  ng-model="calulation"><option value="3" ng-selected="{{name.uom == 3}}">FEET</option><option value="4" ng-selected="{{name.uom == 4}}">MM</option><option value="5" ng-selected="{{name.uom == 5}}">MTR</option><option value="6" ng-selected="{{name.uom == 6}}">INCH</option></select>
                                                   
                                                  
                                                   <input type="hidden"  value="{{name.profile_tab}}"  id="profiless_{{name.id}}"> 
                                                   <input type="hidden"  value="{{name.crimp_tab}}"  id="crimpss_{{name.id}}"> 
                                                   <input type="hidden"  value="{{name.uom}}"  id="uomss_{{name.id}}">
                                                   
                                                   
                                                   
                                                   
                                            </td>
                                            
                                           
                                             
                                             <td data-label="{{namecate.lable}}">
                                                 
                                                 <input type="text" <?php echo $read1; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}"  value="{{name.profile_tab}}"></td>
                                            
                                            
                                             <td ng-if="namecate.labletype==2" data-label="Crimp">
                                                 
                                                  
                                                 <input type="text" <?php echo $read1; ?> ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)" id="crimp_{{name.id}}" value="{{name.crimp_tab}}"></td>
                                             
                                             
                                             <td data-label="Nos">


                                                 <input type="text"  ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.nos_tab}}"></td>
                                             <!--<td><input type="text" <?php echo $read1; ?>  ng-keyup="inputsave_1(name.id,'unit',namecate.categories_id)"  id="unit_{{name.id}}" value="{{name.unit_tab}}"></td>-->
                                            
                                             <td style="display:none;">
                                                 
                                                 <input type="text" <?php echo $read1; ?>  ng-keyup="inputsave_1(name.id,'fact',namecate.categories_id,namecate.type)" id="fact_{{name.id}}" value="{{name.fact_tab}}"></td>
                                            
                                             <!--<td><input type="text"  ng-keyup="inputsave_1(name.id,'Meter_to_Sqr_feet',namecate.categories_id)" id="Meter_to_Sqr_feet_{{name.id}}" value="{{name.Meter_to_Sqr_feet}}"></td>-->
                                             <td data-label="Rate">
                                                 
                                                 <?php 
                                                    if($optionid == '2'){
                                                      $read1op = '';
                                                    }else{
                                                      $read1op = $read1;
                                                    }
                                                 ?>
                                   
                                                 <input type="text" <?php echo $read1op; ?>  ng-keyup="inputsaverate_1(name.id,'rate',namecate.categories_id,namecate.type)"  id="rate_{{name.id}}" value="{{name.rate_tab}}">
                                            
                                             <span class="td-info-icons td-competitor-price" >
                                                 
                                                 
                                                 <button class="btn dropdown-toggle p-0 font-size-12" type="button" ng-click="pricelist(name.product_id,name.product_name_tab)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSpec-pricelist" aria-controls="offcanvasSpec-pricelist">
                                                    <i class="fas fa-rupee-sign"></i>
                                                </button>
                                                
                                                
                                                
                                             </span>
                                             </td>
                                           
                                             <td ng-if="commission_check==1" data-label="Commission" class="comdisplay"><input type="text"  ng-keyup="inputsave_1(name.id,'commission',namecate.categories_id,namecate.type)"  id="commission_{{name.id}}" value="{{name.commission_tab}}"></td>
                                             
                                            
                                           
                                              <td  data-label="Qty"    > 
                                                  <?php if($optionid ==  '2'){ ?>
                                            <input type="text"  ng-disabled="name.disabled == 1"  ng-blur="nos_on_change(name.id)"  ng-keyup="inputsaveqty_1(name.id,'qty',namecate.categories_id,namecate.type)"  class="qtyfind_{{namecate.categories_id}}"  id="qty_{{name.id}}" value="{{name.qty_tab}}" data-val="{{name.org_qty}}">
                                            <?php }else{ ?>
                                              <input type="text"  ng-disabled="name.disabled == 1"  ng-blur="nos_on_change(name.id)"  ng-disabled="namecate.uom !='Kg' && name.billing_options !='2'" ng-keyup="inputsaveqty_1(name.id,'qty',namecate.categories_id,namecate.type)"  class="qtyfind_{{namecate.categories_id}}"  id="qty_{{name.id}}" value="{{name.qty_tab}}" data-val="{{name.org_qty}}">
                                             <?php } ?>
                                                 
                                              </td>
                                            
                                             <?php
                                             if(isset($_GET['convertion']))
                                             {
                                              ?>
                                              <td data-label="Qty" ng-if="namecate.uom=='Kg' || namecate.categories_id==34 || namecate.categories_id==36 || namecate.categories_id==626">{{name.activel_qty}}</td>
                                               <?php
                                             }
                                              ?>
                                            
                                             <td id="amount_{{name.id}}" data-label="Amount" class="amounttot_{{namecate.categories_id}}">{{name.amount_tab}}</td>
                                              <td class="sd <?php echo $classviewweight; ?>">
                                                  
                                                <input type="hidden" id="default_weight_{{ name.id }}" value="{{ name.default_weight }}">
                                                <input type="hidden" id="default_thickness_{{ name.id }}" value="{{ name.thickness }}">
                                                <input type="hidden" id="standard_weight_{{ name.id }}" value="{{ name.standard_weight }}">
                                                <input type="hidden" id="default_fact_{{ name.id }}" value="{{ name.default_fact }}">
                                                <input type="hidden" id="basefact_{{ name.id }}" value="{{ name.basefact }}">
                                                <input type="hidden" id="basecat_{{ name.id }}" value="{{ name.basecat }}">
                                                <input type="hidden" id="thickness_tile_prod_{{ name.id }}" value="{{ name.thickness_tile_prod }}">
                                                <input type="hidden" id="kg_rmtr_weight_{{ name.id }}" value="{{ name.kg_rmtr_weight }}">
                                                <input type="hidden" id="product_name_sub_thick_{{ name.id }}" value="{{ name.product_name_sub_thick }}">
                                                
                                              <input type="text" readonly  ng-keyup="inputsave_1(name.id,'weight',namecate.categories_id,namecate.type)"  id="weight_{{name.id}}"   value="{{name.weight}}"></td>
                                              </td>
                                            
                                            
                                             <td data-label="Action" class="last-colorchange <?php echo $classrow ?>" style="display: flex;">
                                                
                                                <?php
                                                if($disabled!='disabled')
                                                {
                                                    ?>
                                                     <!-- <i class="mdi mdi-group  font-size-16 hidebysort_{{name.id}}"  ng-if="name.sorthide==0"  ng-click="grouping(name.id,name.product_name_tab)" <?php echo $disabled;  ?> title="Grouping"   style="cursor: pointer;"></i> -->
                                                     <i class="mdi mdi-delete font-size-16" ng-if="finance_status<=2" <?php echo $disabled;  ?> ng-click="deleteData(name.id)" title="Delete" style="cursor: pointer;"></i>
                                                     
                                                    <?php
                                                }
                                                
                                                ?>
                                                
                                               
                                                
                                                <!--<i class="bx bx-duplicate font-size-18" ng-click="copyData(name.id)" title="Copy" style="cursor: pointer;"></i>-->
                                              
                                               
                                                <input type="hidden"  value="{{name.image_length}}"  id="image_length_{{name.id}}"> 
                                                 
                                             
                                                <!--ng-click="addon(name.id)"-->
                                             </td>
                                             
                                         
                                             
                                             
                                              <td ng-if="name.cate_status==1" >
                                                  
                                                                                   
                                                 <input type="textt" value="{{name.sub_product_name_tab}}"  <?php echo $read1; ?> ng-keyup="completeProduct12(name.id)" style="width: auto;" placeholder="Base Product Search"   class="form-control"  id="sub_product_id_{{name.id}}" value="{{name.product_name_tab}}" ng-blur="inputsave_1(name.id,'sub_product_id',namecate.categories_id,namecate.type)">
                                                 

                                                                                      
                                                                                
                                             </td>
                                             
                                             <?php if($optionid == '2'){ ?>
                                             
                                               <td ng-if="name.cate_status==1">
                                               <span ng-if="name.product_id!=1540">
                                                  <?php 
                                                 if($read1=='disabled')
                                                 {
                                                  ?>

                                                    <a href="#" class="btn btn-light <?php echo $nnone; ?>" style="width: 120px;" id="imgbtn_{{ name.id }}" <?php echo $read1;  ?> >Choose Image</a>
                                                  <?php
                                                 }
                                                 else
                                                 {
                                                  ?>
                                                  <a href="#" class="btn btn-light <?php echo $nnone; ?>" style="width: 120px;"
                                                      ng-click="imgpreview(name.product_id,namecate.categories_id,name.id)"
                                                      id="imgbtn_{{ name.id }}" <?php echo $read1;  ?> >Choose Image</a>
                                                  <?php
                                                 }
                                                ?>

                                               </span>
                                            </td>
                                          <?php } ?>
                                             
                                             <td  ng-if="name.reference_image!=0">
                                                 
                                                 
                                                 
                                                 
                                                 <a href="{{name.reference_image}}" style="margin: 15px 5px;" target="_blank"> <img src="{{name.reference_image}}" style="width: 200px;border: #4a4a4a solid 1px;" > </a>
                                                 
                                                                                         
                                             </td>
                                             
                                             
                                             
                                          </tr>
                                        
                                       

                                          
                                          
                                       </tbody>
                                            
                                       <tfoot ng-if="namecate.categories_id==1">
                                           <tr >
                                             <td ></td>
                                             <td  style="display:none;"></td>
                                             <td class="table-width-6 hidmob"></td>
                                             <td class="table-width-6 hidmob" > </td>
                                              <td class="table-width-6 hidmob" > </td>
                                                 
                                                 
                                             <!--<th class="table-width-8"><b style="font-size:12px;">Round Off : </b></th>
                                             <th class="table-width-8" colspan="2"><b style="font-size:12px;"><input type="text" id="" value="" class="w-100"> </b></th>-->
                                             <!--<th ><b style="font-size:12px;"></b></th>-->
                                             <td class="hidmob" ng-if="namecate.labletype==2"><b style="font-size:12px;"></b></td>
                                             <td data-label="Toatl:"><b style="font-size:12px;" id="nostot_{{namecate.categories_id}}">{{namecate.nos_total}}</b></td>
                                             <!--<th ><b style="font-size:12px;">{{UNIT}}</b></th>-->
                                            
                                             <!--<th ><b style="font-size:12px;">{{Meter_to_Sqr_feet}}</b></th>-->
                                             <td class="hidmob"><b style="font-size:12px;"></b></td>
                                             <td ng-if="commission_check==1" class="comdisplay"><b style="font-size:12px;" >{{namecate.commission_total}}</b></td>
                                             
                                         
                                             
                                             
                                            <?php
                                             if(isset($_GET['convertion']))
                                             {
                                             ?>
                                             
                                               <td ><b style="font-size:12px;" >{{namecate.activel_qty_total_set_overall}}</b></td>
                                               
                                              
                                             <?php
                                             
                                             }
                                             else
                                             {
                                                 ?>
                                                 <td ><b style="font-size:12px;" id="fullqty_{{namecate.categories_id}}">{{namecate.activel_qty_total_set}}</b></td>
                                                 <?php
                                             }
                                             ?>
                                              <?php
                                             if(isset($_GET['convertion']))
                                             {
                                              ?>

                                             <td data-label="Qty" ng-if="namecate.uom=='Kg' || namecate.categories_id==34 || namecate.categories_id==36 || namecate.categories_id==626" id="afullqty_{{namecate.categories_id}}"><input type="text1" readonly class="setInputtotal" id="saveactqty_{{namecate.categories_id}}" ng-blur="inputsaveTotalWeight(namecate.categories_id)" value="{{namecate.weg_total}}"></td>
                                              <?php
                                             }
                                             ?>
                                             
                                             <td ><b style="font-size:12px;" id="fulltotal_{{namecate.categories_id}}">{{namecate.amount_total}} </b></td>
                                             <td ><b style="font-size:12px;" id="fullweight_{{namecate.categories_id}}">{{namecate.weg_total}} </b></td>
                                             
                                              <?php
                                              if($status_base!=6)
                                              {
                                              ?> 
                                             <td class="hidmob"></td>
                                             <?php
                                              }
                                              ?>
 
                                          </tr>
                                       </tfoot>
                                       
                                       
                                       
                                       <tbody  ng-repeat="name in namesData|orderBy:column:reverse" ng-if="namecate.categories_id!=1">
                                           
                                           
                                           
                                          
                                          <tr  ng-style="name.rate_edit == 1 && {'color':'red'}" class="view" ng-if="namecate.categories_id==name.categories_id_get">
                                             
                                             
                                              <td data-label="S No">
                                                  <label for="nn_{{name.id}}" style="margin-bottom:0px;">


                                        <input type="checkbox" name="checkinsert"  ng-if="name.disabled==0" class="checkinsert fill_{{namecate.categories_id}}" alt="{{name.product_id}}"     value="{{name.id}}" ng-click="checkhidesortid(name.sorthide,name.id)"  id="nn_{{name.id}}"  ng-checked="name.picked_status == 1">
                                        <input type="hidden" id="id_{{name.id}}" value="{{name.oid}}" class="oid">

                                          <input type="checkbox" name="checkinsert"  ng-if="name.disabled==1" disabled class="checkinsert fill_{{namecate.categories_id}}" alt="{{name.product_id}}"     value="{{name.id}}" ng-click="checkhidesortid(name.sorthide,name.id)"  id="nn_{{name.id}}"  ng-checked="name.picked_status == 1">





                                                &nbsp;&nbsp;&nbsp;   {{name.no}}  </label>   <span class="td-info-icons" ng-if="name.same==1">&nbsp;&nbsp;&nbsp; <i class="mdi mdi-chevron-down" title="Similar Price List" style="font-size: 20px;font-weight: 800;color: #ee5c17;margin: 0px -10px;cursor: pointer;display:none;" ng-click="similarenq(name.product_id,name.product_name_tab,namecate.categories_id)"></i></span>  
                                                  
                                                  
                                                  
                                                  <i class="mdi mdi-check  font-size-16"  ng-if="name.purchase_request==1" ng-click="getPurchaserequest(name.id,name.purchase_id,name.product_name_tab)" title="Purchase requested" style="cursor: pointer;"></i>
                                                  
                                                  </td>
                                            <td style="display:none;">
                                                 
                                                 <select class="return_complaint" ng-model="return_complaint" ng-change="inputsave_1(name.id,'return_complaint',namecate.categories_id,namecate.type)" id="return_complaint_{{name.id}}" name="return_complaint">
                                                 <option value="">Select Status</option>
                                                 <option value="Yes"  ng-selected="{{name.return_complaint == 'Yes'}}">Yes</option>
                                                 <option value="No"  ng-selected="{{name.return_complaint == 'No'}}">No</option>
                                                 <option value="No issue"  ng-selected="{{name.return_complaint == 'No issue'}}">No issue</option>
                                                 </select>
                                             </td>
                                           
                                           
                                            <input type="hidden"  value="{{namecate.categories_id}}"  id="cateid_{{name.id}}"> 
                                             <input type="hidden"  value="{{namecate.type}}"  id="cateidtype_{{name.id}}">
                                             <input type="hidden"  value="{{name.product_id}}"  id="ppid_{{name.id}}">
                                             <td title="{{name.categories}}" data-label="Products">
                                                 <input type="text" <?php echo $read1; ?> ng-keyup="completeProduct2(name.id)"  ng-blur="inputsave_1(name.id,'product_name',namecate.categories_id,namecate.type)"   id="product_name_{{name.id}}" value="{{name.product_name_tab}}">
                                                 
                                                 
                                                  
                                             <span class="td-info-icons td-competitor-price tdStockPos" title="Current Stock" style="display:none;">
                                                         <small style="color:green;" ng-if="name.stock!=0"><b>Stock : {{name.stock}}</b></small>
                                                         <small style="color:red;" ng-if="name.stock==0"><b>Stock : {{name.stock}}</b></small>
                                                       </span>
                                                  
                                                 </td>
                                                 
                                                 
                                              <td ng-if="namecate.categories_id!=590 && (namecate.labletype==19 || namecate.labletype==16)" data-label="Categories">
                                                  <select class="inputtext-select1"  disabled style="width: 200px; font-size: 10px; padding: 6px 6px; border-radius: 3px;"  <?php echo $read1; ?>
                                                  ng-change="inputsave_1(name.id,'meterial_category',namecate.categories_id,namecate.type)" ng-model="category_sub" id="meterial_category_{{ name.id }}" > 
                                                    <option value="34" ng-selected="{{ name.meterial_category == '34' }}">Decking Sheet</option>
                                                    <option value="5" ng-selected="{{ name.meterial_category == '5' }}">Purlin</option>
                                                    <option value="3" ng-selected="{{ name.meterial_category == '3' }}">Iron And Steel Corrugated Sheet</option>
                                                  </select>
                                              </td>
                                                                 
                                             <td  ng-if="(namecate.labletype==4 && namecate.tile_check == 0 ) || namecate.categories_id ==599 "  data-label="Sub Products" ><input type="text" <?php echo $read1; ?> placeholder="Search Product" ng-keyup="completeProductSUb(name.id)"  ng-blur="inputsave_1(name.id,'tile_material_name',namecate.categories_id,namecate.type)"   id="tile_material_name_{{name.id}}" value="{{name.tile_material_name}}"></td>
                                        
                                        
                                        
                                         <td  ng-if="namecate.labletype==16 && namecate.tile_check == 0" data-label="Sub Products" ><input type="text" <?php echo $read1; ?> placeholder="Search Product" ng-keyup="completeProductSUb(name.id)"  ng-blur="inputsave_1(name.id,'tile_material_name',namecate.categories_id,namecate.type)"   id="tile_material_name_{{name.id}}" value="{{name.tile_material_name}}"></td>
                                        
                                        
                                         <td  ng-if="namecate.labletype==19 && namecate.tile_check == 0" data-label="Sub Products" ><input type="text" <?php echo $read1; ?> placeholder="Search Product" ng-keyup="completeProductSUb3(name.id)"  ng-blur="inputsave_1(name.id,'tile_material_name',namecate.categories_id,namecate.type)"   id="tile_material_name_{{name.id}}" value="{{name.tile_material_name}}"></td>
                                        
                                         
                                        
                                        
                                             <td  ng-if="namecate.categories_id==592" data-label="Sub Products" ><input type="text" <?php echo $read1; ?>    ng-blur="inputsave_1(name.id,'tile_material_name',namecate.categories_id,namecate.type)"   id="tile_material_name_{{name.id}}" value="{{name.tile_material_name}}"></td>
                                      
                                          <td  ng-if="namecate.labletype==19" data-label="Remarks" ><input type="text" <?php echo $read1; ?>   ng-blur="inputsave_1(name.id,'dim_one',namecate.categories_id,namecate.type)"   id="dim_one_{{name.id}}" value="{{name.dim_one}}"></td>
                                          <td  ng-if="namecate.labletype==19" data-label="Coil No" ><input type="text" <?php echo $read1; ?>   ng-blur="inputsave_1(name.id,'dim_two',namecate.categories_id,namecate.type)"   id="dim_two_{{name.id}}" value="{{name.dim_two}}"></td>
                                      
                                        
                                            <td  data-priority="3" ng-if="namecate.labletype!=9" data-label="UOM">
                                                  
                                                  
                                                    <span ng-if="namecate.labletype!=14">

                                               
                                                    <select class="selectbox" disabled  ng-change="inputsavecal_1(name.id,name.uom,'uom',namecate.categories_id,namecate.type)" id="uom_{{name.id}}"  ng-model="calulation">
                                                      <option value="3" ng-selected="{{name.uom == 3}}" ng-style="namecate.categories_id == 13 && {'display':'none'}">FEET</option>
                                                      <option value="4" ng-selected="{{name.uom == 4}}" ng-style="namecate.categories_id == 13 && {'display':'none'}">MM</option>
                                                      <option value="2" ng-selected="{{name.uom == 2}}" ng-style="namecate.categories_id != 13 && {'display':'none'}" >SQMTR</option>
                                                      <option value="5" ng-selected="{{name.uom == 5}}">MTR</option>
                                                      <option value="6" ng-selected="{{name.uom == 6}}" ng-style="namecate.categories_id == 13 && {'display':'none'}">INCH</option>
                                                       <option value="7" ng-selected="{{ name.uom == 7 }}" ng-style="namecate.type != 19 && {'display':'none'}">KG</option>
                                                      <option value="8" ng-selected="{{ name.uom == 8 }}" ng-style="namecate.categories_id != 13 && {'display':'none'}">SFT</option>
                                                   </select>


                                                   <input type="hidden"  value="{{name.profile_tab}}"  id="profiless_{{name.id}}"> 
                                                   <input type="hidden"  value="{{name.crimp_tab}}"  id="crimpss_{{name.id}}">
                                                   <input type="hidden"  value="{{name.uom}}"  id="uomss_{{name.id}}"> 
                                                   
                                                    <input type="hidden"  value="{{name.dim_one}}"    id="dim_oness_{{name.id}}"> 
                                                    <input type="hidden"  value="{{name.dim_two}}"    id="dim_twoss_{{name.id}}">
                                                    <input type="hidden"  value="{{name.dim_three}}"  id="dim_threess_{{name.id}}">
                                                    
                                                    
                                                    <input type="hidden"  value="{{name.og_formula}}"  id="formula_{{name.id}}">
                                                    <input type="hidden"  value="{{name.kg_formula2}}"  id="formula2_{{name.id}}">
                                                    
                                                    </span>
                                                   
                                                   <span ng-if="namecate.labletype==14">
                                                         NOS
                                                    
                                                    </span>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                   
                                            </td>
                                            
                                            
                                            
                                            
                                            <td  ng-if="namecate.labletype==19" data-label="Coil No" >
                                                
                                                
                                                
                                                
                                                <select   ng-change="inputsave_1(name.id,'dim_three',namecate.categories_id,namecate.type)"  ng-model="dim_three" style="padding: 0px 0px;border: none;"  id="dim_three_{{name.id}}">
                                                     
                                                      <option  value="OPEN COIL"     ng-selected="{{name.dim_three == 'OPEN COIL'}}" >OPEN COIL</option>
                                                      <option  value="CLOSED COIL"  ng-selected="{{name.dim_three == 'CLOSED COIL'}}" >CLOSED COIL</option>
                                                       
                                                   </select>
                                                
                                                </td>
                                      
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                             <td ng-if="namecate.labletype==11 || namecate.labletype==12" data-label="Dim 1"><input type="text" <?php echo $read1; ?>  ng-keyup="inputsave_1(name.id,'dim_one',namecate.categories_id,namecate.type)"  id="dim_one_{{name.id}}" data-title="{{name.cul}}" value="{{name.dim_one}}"></td>
                                             <td ng-if="namecate.labletype==11 || namecate.labletype==12" data-label="Dim 2"><input type="text" <?php echo $read1; ?>  ng-keyup="inputsave_1(name.id,'dim_two',namecate.categories_id,namecate.type)"  id="dim_two_{{name.id}}" data-title="{{name.cul}}" value="{{name.dim_two}}"></td>
                                             <td ng-if="namecate.labletype==12" data-label="Dim 3"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'dim_three',namecate.categories_id,namecate.type)"  id="dim_three_{{name.id}}" data-title="{{name.cul}}" value="{{name.dim_three}}"></td>
                                            
                                        
                                          <td ng-if="namecate.labletype==5 || namecate.labletype==6 || namecate.categories_id==611 || namecate.categories_id==627" data-label="Billing Options">
                                                 
                                                 <?php 
                                                    if($optionid == '2'){
                                                      $read1op = '';
                                                    }else{
                                                      $read1op = 'disabled';
                                                    }
                                                 ?>
                                                 
                                                 <select class="selectbox" ng-if="namecate.labletype==5 || namecate.categories_id==611 || namecate.categories_id==627" ng-change="inputsave_1(name.id,'billing_options',namecate.categories_id,namecate.type)" id="billing_options_{{name.id}}" ng-model="billing_options" <?php echo $read1op; ?> >
                                                    <option value="1" ng-selected="{{ name.billing_options == 1 }}"  ng-if="namecate.categories_id==611 || namecate.categories_id != 627 && namecate.categories_id != 628">Running MTR</option>
                                                    <option value="4" ng-selected="{{ name.billing_options == 4 }}" ng-if="namecate.categories_id==611 || namecate.categories_id == 627">Running Ft</option>
                                                    <option value="2" ng-selected="{{ name.billing_options == 2 }}">KG</option>
                                                    <option value="3" ng-selected="name.billing_options == 3" ng-if="namecate.categories_id==34 ||  name.categories_id == 626">SQM MTR</option>
                                                    <option value="5" ng-selected="{{ name.billing_options == 5 }}" ng-if="namecate.categories_id==627">NOS</option>
                                                  </select>
                                                  <select class="selectbox" ng-if="namecate.labletype==6"  ng-change="inputsave_1(name.id,'billing_options',namecate.categories_id,namecate.type)" id="billing_options_{{name.id}}"  ng-model="billing_options" <?php echo $read1op; ?> ><option value="3" ng-selected="{{name.billing_options == 3}}">SQM  MTR</option><option value="2" ng-selected="{{name.billing_options == 2}}">KG</option></select>
                                                  
                                                  <input type="hidden"  value="{{name.kg_price}}"  id="kg_price_{{name.id}}">
                                                  <input type="hidden"  value="{{name.og_price}}"  id="rate_tab_get_{{name.id}}">
                                                  
                                                  
                                                   <input type="hidden"  value="{{name.kg_formula2}}"  id="kg_formula_{{name.id}}">
                                                   <input type="hidden"  value="{{name.og_formula}}"  id="og_formula_get_{{name.id}}">
                                                   
                                                   
                                                   
                                             </td>
                                             
                                        
                                             <td ng-if="namecate.labletype==4" ng-init="productMM(name.product_id,name.uom)" data-label="{{namecate.lable}}">
                                                 
                                                     
                                                   <select  ng-change="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)" <?php echo $read1; ?> ng-model="mmt" style="padding: 0px 0px;border: none;"  id="profile_{{name.id}}">
                                                   <option  value="0" ng-if="name.profile_tab==0"> Select </option>
                                                   <option ng-repeat="mmset in availableProductsmm" value="{{mmset.length_mm}}"  ng-selected="{{mmset.length_mm == name.profile_tab}}"> {{mmset.length_mm}} </option>
                                                   </select>
                                                   
                                                   
                                                   <!--<input type="text" <?php echo $read1; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}"  value="{{name.profile_tab}}">-->
                                               
                                                   
                                                
                                                 
                                            </td>
                                            
                                            
                                            
                                            
                                             <td ng-if="namecate.labletype==8 || namecate.labletype==1 ||  namecate.labletype==5 || namecate.labletype==6  || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12" data-label="{{namecate.lable}}">


                                                  <span ng-if="namecate.categories_id==13">

                                                    <input type="text"   ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}" value="{{name.profile_tab}}">
                                                    
                                                  </span>  


                                                  <span ng-if="namecate.categories_id!=13">

                                                    <input type="text" <?php echo $read1; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}" value="{{name.profile_tab}}">
                                                    
                                                  </span>  
                                                 



                                               </td>
                                            
                                             <td ng-if="namecate.labletype==8" data-label="{{namecate.lable2}}">
                                               
                                                 <input type="text" <?php echo $read1; ?>  ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"  id="crimp_{{name.id}}"  value="{{name.crimp_tab}}"></td>
                                             
                                             
                                               <td ng-if="namecate.labletype==15">
                                                 
                                                  
                                                  
                                                 
                                                  
                                                  <select ng-if="name.uom==4 || name.uom==5" <?php echo $read1; ?> ng-change="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  ng-model="profilewall" style="padding: 0px 0px;border: none;"  id="profile_{{name.id}}">
                                                     
                                                      <option  value="11800"   ng-selected="{{name.profile_tab == '11800'}}" >11800</option>
                                                      <option  value="5900"    ng-selected="{{name.profile_tab == '5900'}}" >5900</option>
                                                     
                                                     
                                                       
                                                   </select>
                                                   
                                                   
                                                   <select ng-if="name.uom==3" <?php echo $read1; ?> ng-change="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  ng-model="profilewall" style="padding: 0px 0px;border: none;"  id="profile_{{name.id}}">
                                                     
                                                      <option  value="38.716"  ng-selected="{{name.profile_tab == '38.716'}}" >38.716</option>
                                                      <option  value="19.358"  ng-selected="{{name.profile_tab == '19.358'}}" >19.358</option>
                                                      
                                                     
                                                   </select>
                                                   
                                                   
                                                   
                                                   
                                                   
                                                     <select ng-if="name.uom==6" ng-change="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  ng-model="profilewall" style="padding: 0px 0px;border: none;"  id="profile_{{name.id}}">
                                                     
                                                      
                                                      <option  value="464.60"  ng-selected="{{name.profile_tab == '464.60'}}" >464.60</option>
                                                      <option  value="232.30"  ng-selected="{{name.profile_tab == '232.30'}}" >232.30</option>
                                                       
                                                   </select>
                                                   
                                                   
                                                   
                                                   
                                                   
                                                
                                                </td>
                                             
                                             
                                             <td ng-if="namecate.labletype==8" style="display:none;" data-label="Back {{namecate.lable2}}">
                                                 
                                                  <select  ng-change="inputsave_1(name.id,'back_crimp',namecate.categories_id,namecate.type)"  ng-model="backcripm" style="padding: 0px 0px;border: none;"  id="back_crimp_{{name.id}}">
                                                     <option  value="Yes" ng-selected="{{name.back_crimp == 'Yes'}}" > Yes </option>
                                                     <option  value="No"  ng-selected="{{name.back_crimp == 'No'}}" > No </option>
                                                   </select>
                                                
                                                 </td>
                                                 
                                                 
                                                  <td ng-if="namecate.labletype==15">
                                                  
                                                  <select ng-if="name.uom==4 || name.uom==5"  ng-change="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"  ng-model="crimpwall" style="padding: 0px 0px;border: none;"  id="crimp_{{name.id}}">
                                                     
                                                      <option  value="1220"   ng-selected="{{name.crimp_tab == '1220'}}" >1220</option>
                                                      <option  value="2100"   ng-selected="{{name.crimp_tab == '2100'}}" >2100</option>
                                                     
                                                      <option  value="1200"   ng-selected="{{name.crimp_tab == '1200'}}" >1200</option>
                                                      
                                                       
                                                   </select>
                                                   
                                                   
                                                    <select ng-if="name.uom==3"  ng-change="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"  ng-model="crimpwall" style="padding: 0px 0px;border: none;"  id="crimp_{{name.id}}">
                                                     
                                                     
                                                    
                                                      <option  value="6.90"   ng-selected="{{name.crimp_tab == '6.90'}}" >6.90</option>
                                                      <option  value="4"      ng-selected="{{name.crimp_tab == '4'}}" >4</option>
                                                     
                                                     
                                                       
                                                   </select>
                                                   
                                                   
                                                    <select ng-if="name.uom==6"  ng-change="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"  ng-model="crimpwall" style="padding: 0px 0px;border: none;"  id="crimp_{{name.id}}">
                                                     
                                                      <option  value="48"     ng-selected="{{name.crimp_tab == '48'}}" >48</option>
                                                      <option  value="82.80"  ng-selected="{{name.crimp_tab == '82.80'}}" >82.80</option>
                                                       
                                                   </select>
                                                
                                                </td>
                                                 
                                            
                                            
                                             <td ng-if="(namecate.labletype==11 || namecate.labletype==7 || namecate.labletype==12 || namecate.labletype==1 || namecate.labletype==6 || namecate.labletype==15) && namecate.categories_id !=5 && namecate.categories_id !=611  && namecate.categories_id !=627 && namecate.categories_id !=628" data-label="{{namecate.lable2}}">
                                                 
                                                 <input type="text" <?php echo $read1; ?>  ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)" id="crimp_{{name.id}}" value="{{name.crimp_tab}}"></td>
                                            
                                             <td data-label="Nos" ng-if="namecate.labletype!=9">
                                                 
                                                  <input type="text"    ng-disabled="name.disabled == 1"   data-val="{{name.org_nos}}" ng-blur="nos_on_change(name.id)"     ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.nos_tab}}"></td>
                                             <!--<td><input type="text"  ng-keyup="inputsave_1(name.id,'unit',namecate.categories_id)"  id="unit_{{name.id}}" value="{{name.unit_tab}}"></td>-->
                                            
                                              <td
                                                  ng-if="(namecate.labletype==1 || namecate.labletype==2 || namecate.labletype==3 || namecate.labletype==4 || namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==8 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==13 || namecate.labletype==14) && namecate.categories_id !=611"
                                                  data-label="Fact">

                                                  <input type="hidden" id="old_fact_{{name.id}}" value="{{ name.commission_fact }}">

                                                  <span class="editvalue" ng-if="name.fact_edit>0">{{ name.fact_edit }}</span>
                                                  <input type="text" <?php echo $read1; ?>
                                                    ng-keyup="inputsave_1(name.id,'fact',namecate.categories_id,namecate.type)"
                                                    id="fact_{{ name.id }}" value="{{ name.fact_tab }}" ng-disabled="namecate.categories_id == 34 || namecate.categories_id == 36 || name.categories_id == 626">
                                                    <!-- fact2 changes -->
                                                    <input type="text" <?php echo $read1; ?>
                                                    ng-keyup="inputsave_1(name.id,'fact2',namecate.categories_id,namecate.type)"
                                                    id="fact2_{{ name.id }}" value="{{ name.fact2 }}" style="display:none">
                                                    <input type="hidden" id="fact_val_{{name.id}}" value="{{ name.fact1 }}">

                                                  </td>
                                             
                                             <!--<td><input type="text"  ng-keyup="inputsave_1(name.id,'Meter_to_Sqr_feet'),namecate.categories_id" id="Meter_to_Sqr_feet_{{name.id}}" value="{{name.Meter_to_Sqr_feet}}"></td>-->
                                             <td data-label="Rate">
                                                 <?php 
                                                    if($optionid == '2'){
                                                      $read1op = '';
                                                    }else{
                                                      $read1op = $read1;
                                                    }
                                                 ?>
                                   
                                                 <input type="text"   <?php echo $read1op; ?> ng-keyup="inputsaverate_1(name.id,'rate',namecate.categories_id,namecate.type)"  id="rate_{{name.id}}" value="{{name.rate_tab}}">
                                            
                                             <span class="td-info-icons td-competitor-price">
                                                 <button class="btn dropdown-toggle p-0 font-size-12" type="button" ng-click="pricelist(name.product_id,name.product_name_tab)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSpec-pricelist" aria-controls="offcanvasSpec-pricelist">
                                                    <i class="fas fa-rupee-sign"></i>
                                                </button>
                                                
                                             </span>
                                             </td>
                                           
                                             <td ng-if="commission_check==1" data-label="Commission" class="comdisplay"><input type="text"  ng-keyup="inputsave_1(name.id,'commission',namecate.categories_id,namecate.type)"  id="commission_{{name.id}}" value="{{name.commission_tab}}"></td>
                                             
                                            
                                             <!-- <td data-label="Qty" ng-if="namecate.uom=='Kg' || namecate.categories_id==34 || namecate.categories_id==36 || namecate.categories_id==626">{{name.activel_qty}}</td> -->
                                             
                                            
                                          
                                                   
                                               <!--<td id="qty_{{name.id}}"  data-label="Qty" class="qtyfind_{{namecate.categories_id}}" >{{name.qty_tab}}</td>-->
                                                   
                                               <!--<td id="qty_{{name.id}}"  data-label="Qty" class="qtyfind_{{namecate.categories_id}}" >{{name.qty_tab}}</td>-->

                                              <!--    <?php
                                             if(isset($_GET['convertion']))
                                             {
                                                 
                                              ?>
                                              
                                              
                                              <td  data-label="Qty"><input type="text"  ng-keyup="inputsaveqty_1(name.id,'qty',namecate.categories_id,namecate.type)"  class="qtyfind_{{namecate.categories_id}}"  id="qty_{{name.id}}" value="{{name.qty_tab}}"> </td>
                                            
                                               <?php
                                             }
                                             else
                                             {
                                                 ?> -->
                                           <td  data-label="Qty"    > 
                                            
                                            <?php if($optionid ==  '2'){ ?>
                                             <input type="text"  ng-disabled="name.disabled == 1"  ng-blur="nos_on_change(name.id)"  ng-keyup="inputsaveqty_1(name.id,'qty',namecate.categories_id,namecate.type)"  class="qtyfind_{{namecate.categories_id}}"  id="qty_{{name.id}}" value="{{name.qty_tab}}" data-val="{{name.org_qty}}">
                                            <?php }else{ ?>
                                               <input type="text"  ng-disabled="name.disabled == 1"  ng-blur="nos_on_change(name.id)"  ng-disabled="namecate.type != '9'"  ng-keyup="inputsaveqty_1(name.id,'qty',namecate.categories_id,namecate.type)"  class="qtyfind_{{namecate.categories_id}}"  id="qty_{{name.id}}" value="{{name.qty_tab}}" data-val="{{name.org_qty}}">
                                             <?php } ?>
                                           
                                            
                                            </td>

                                         <!--  <?php } ?> -->

                                           <?php
                                             if(isset($_GET['convertion']))
                                             {
                                              ?>

                                            <td data-label="Qty" ng-if="namecate.uom=='Kg' || namecate.categories_id==34 || namecate.categories_id==36 || namecate.categories_id==626">  <input type="text"  ng-disabled="namecate.uom !='Kg' && name.billing_options !='2'" ng-keyup="inputsaveqty_1(name.id,'activel_qty',namecate.categories_id,namecate.type)"  class="qtyfind_{{namecate.categories_id}}"  id="activel_qty_{{name.id}}" value="{{name.activel_qty}}" data-val="{{name.activel_qty}}"></td>
                                            
                                            
                                                 <?php
                                             }
                                             ?>
                                             
                                             
                                             
                                             
                                            
                                             
                                             <td id="amount_{{name.id}}" data-label="Amount" class="amounttot_{{namecate.categories_id}}">{{name.amount_tab}}</td>
                                                <td class="sd <?php echo $classviewweight; ?>">

                                                <input type="hidden" id="default_weight_{{ name.id }}" value="{{ name.default_weight }}">
                                                <input type="hidden" id="default_thickness_{{ name.id }}" value="{{ name.thickness }}">
                                                <input type="hidden" id="standard_weight_{{ name.id }}" value="{{ name.standard_weight }}">
                                                <input type="hidden" id="default_fact_{{ name.id }}" value="{{ name.default_fact }}">
                                                <input type="hidden" id="basefact_{{ name.id }}" value="{{ name.basefact }}">
                                                <input type="hidden" id="basecat_{{ name.id }}" value="{{ name.basecat }}">
                                                <input type="hidden" id="thickness_tile_prod_{{ name.id }}" value="{{ name.thickness_tile_prod }}">
                                                <input type="hidden" id="kg_rmtr_weight_{{ name.id }}" value="{{ name.kg_rmtr_weight }}">
                                                <input type="hidden" id="product_name_sub_thick_{{ name.id }}" value="{{ name.product_name_sub_thick }}">
                                                
                                                <input type="text" readonly  ng-keyup="inputsave_1(name.id,'weight',namecate.categories_id,namecate.type)"  id="weight_{{name.id}}"   value="{{name.weight}}"></td>
                                              </td>
                                            
                                               <td data-label="Action" class="last-colorchange <?php echo $classrow ?>" style="display: flex;">
                                                 
                                                 
                                                  <?php
                                                if($disabled!='disabled')
                                                {
                                                    ?>

                                               <!-- <i class="mdi mdi-group  font-size-16 hidebysort_{{name.id}}" ng-if="name.sorthide==0" <?php echo $disabled;  ?> ng-click="grouping(name.id,name.product_name_tab)"  title="Grouping"   style="cursor: pointer;"></i> -->
                                                <!--<i class="bx bx-duplicate font-size-18" ng-click="copyData(name.id)" title="Copy" style="cursor: pointer;"></i>-->
                                                <i class="mdi mdi-delete font-size-16" <?php echo $disabled;  ?> ng-if="finance_status<=2" ng-click="deleteData(name.id)" title="Delete" style="cursor: pointer;"></i>
                                                
                                                <?php
                                                
                                                }
                                                
                                                ?>
                                               
                                               
                                               
                                                <input type="hidden"  value="{{name.image_length}}"  id="image_length_{{name.id}}"> 
                                               
                                                
                                            
                                                <!--ng-click="addon(name.id)"-->
                                             </td>
                                             
                                            
                                             
                                             
                                             <td ng-if="name.cate_status==1" >
                                                  
                                              <input type="textt" <?php echo $read1; ?> value="{{name.sub_product_name_tab}}" class="form-control" style="width: auto;"  ng-keyup="completeProduct12(name.id)" placeholder="Base Product Search"     id="sub_product_id_{{name.id}}" value="{{name.product_name_tab}}" ng-blur="inputsave_1(name.id,'sub_product_id',namecate.categories_id,namecate.type)">
                                                 
                                                                                      
                                                                                
                                             </td>
                                             <?php if($optionid == '2'){ ?>
                                          <td ng-if="name.cate_status==1 ">
                              
                                              <span  ng-if="namecate.categories_id != '626'">
                                                <?php 
                                                 if($read1=='disabled')
                                                 {
                                                  ?>
                                                    <a href="#" class="btn btn-light <?php echo $nnone; ?>" style="width: 120px;"  id="imgbtn_{{ name.id }}" >Choose Image</a>
                                                
                                               
                                                  <?php
                                                 }
                                                 else
                                                 {
                                                  ?>
                                                  <a href="#" class="btn btn-light <?php echo $nnone; ?>" style="width: 120px;"
                                                  ng-click="imgpreview(name.product_id,namecate.categories_id,name.id)"
                                                  id="imgbtn_{{ name.id }}" >Choose Image</a>
                                                  <?php
                                                 }
                                                ?>

                                             
                                              </span>



                                            </td>
                                          <?php } ?> 
                                             
                                             <td  ng-if="name.reference_image!=0">
                                                 
                                                 
                                                 <a href="{{name.reference_image}}" style="margin: 15px 5px;" target="_blank"> <img src="{{name.reference_image}}" style="width: 200px;border: #4a4a4a solid 1px;" > </a>
                                                 
                                                                                         
                                             </td>
                                             
                                             
                                          </tr>
                                        
                                     
                                          
                                          
                                          
                                       </tbody>
                                            
                                       <tfoot ng-if="namecate.categories_id!=1">
                                           <tr >
                                             <td class="hidmob" ></td>
                                             <td class="hidmob" ng-if="namecate.labletype==1" ></td>
                                              <td class="hidmob" style="display:none;"></td>
                                             <td class="table-width-6 hidmob" ng-if="namecate.labletype!=14"></td>
                                             
                                              <td class="table-width-6 hidmob" ng-if="(namecate.labletype==11 || namecate.labletype==12) && namecate.tile_check == 0">
                                              </td>
                                              <td class="table-width-6 hidmob" ng-if="(namecate.labletype==11 || namecate.labletype==12) && namecate.tile_check == 0">
                                              </td>
                                            <td class="table-width-6 hidmob" ng-if="namecate.labletype==12 && namecate.tile_check == 0"></td>
                         
                          <td class="table-width-6 hidmob" ng-if="namecate.labletype==19 && namecate.tile_check == 0 "></td>
                                             <td class="table-width-6 hidmob" ng-if="namecate.labletype==19"></td>
                                             <td class="table-width-6 hidmob" ng-if="namecate.labletype==19"></td>
                                             <td class="table-width-6 hidmob" ng-if="namecate.labletype==19"></td>
                                             <td class="table-width-6 hidmob" ng-if="namecate.labletype==19"></td>

                                              <td class="table-width-6 hidmob" ng-if="namecate.categories_id==593 || namecate.categories_id==28"></td>
                                             
                                             <td class="table-width-6 hidmob" ng-if="namecate.labletype==6 || namecate.labletype==11 || namecate.labletype==12"> </td> 
                                             
                                             <td class="table-width-6 hidmob" ng-if="(namecate.labletype==1 || namecate.labletype==2 || namecate.labletype==3 || namecate.labletype==4  || namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==8 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==13 || namecate.labletype==14 || namecate.labletype==15  || namecate.categories_id==599) && namecate.categories_id !=628"> </td>
                                             <td class="table-width-6 hidmob" ng-if="namecate.labletype==1 || namecate.labletype==2 || namecate.labletype==3 || namecate.labletype==4 || namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==8 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==13 || namecate.labletype==14 || namecate.labletype==15"> </td>
                                             <td class="table-width-6 hidmob" ng-if="namecate.labletype==15"> </td>

                                              <td class="table-width-6 hidmob" ng-if="namecate.labletype==7 && namecate.categories_id != 5"> </td>
                           
                          <td class="table-width-6 hidmob" ng-if="(namecate.labletype==19 && namecate.categories_id == 5)"> </td>
                                             
                                             
                                             <td class="table-width-6 hidmob" ng-if="namecate.labletype==8" style="display:none;"> </td>
                                             <td class="table-width-6 hidmob" ng-if="namecate.labletype==8 && namecate.categories_id != 32"> </td>
                                             <td class="table-width-6 hidmob" ng-if="(namecate.labletype==5 || namecate.labletype==6) && (namecate.categories_id!=611 || namecate.categories_id!=627)" > </td>   
                                             <td class="table-width-6 hidmob" ng-if="(namecate.labletype==4 || namecate.labletype==16  || namecate.categories_id==592)  && namecate.tile_check == 0"> </td>    
                                              
                                            
                                             <td ng-if="(namecate.labletype==1 || namecate.labletype==7) && namecate.categories_id != 611 && namecate.categories_id == 611 && namecate.categories_id !=627 && namecate.categories_id !=628" class="hidmob"><b style="font-size:12px;"></b></td>
                                             <td data-label="Toatl:" ng-if="namecate.labletype!=9"><b style="font-size:12px;" id="nostot_{{namecate.categories_id}}">{{namecate.nos_total}}</b></td>
                                            
                                             <td  ng-if="(namecate.labletype==1 || namecate.labletype==2 || namecate.labletype==3 || namecate.labletype==4 || namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==8 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==13 || namecate.labletype==14) && namecate.categories_id != 611"><b style="font-size:12px;" >{{namecate.fact_total}}</b></td>
                                             
                                             <td class="hidmob"><b style="font-size:12px;" ></b></td>
                                             <td ng-if="commission_check==1" class="comdisplay"><b style="font-size:12px;" >{{namecate.commission_total}}</b></td>
                                            
                                             
                                            
                                             
                                               <?php
                                             if(isset($_GET['convertion']))
                                             {
                                             ?>
                                             
                                                 <td><b style="font-size:12px;" >{{namecate.activel_qty_total_set_overall}}</b></td>
                                                
                                              
                                             <?php
                                             
                                             }
                                             else
                                             {
                                                 ?>
                                                  <td><b style="font-size:12px;" id="fullqty_{{namecate.categories_id}}">{{namecate.activel_qty_total_set}}</b></td>
                                                 <?php
                                             }
                                             ?>
                                               <?php
                                             if(isset($_GET['convertion']))
                                             {
                                              ?>

                                              <td data-label="Qty" ng-if="namecate.uom=='Kg' || namecate.categories_id==34 || namecate.categories_id==36 || namecate.categories_id==626" id="afullqty_{{namecate.categories_id}}"><input type="text1"  readonly class="setInputtotal" id="saveactqty_{{namecate.categories_id}}" ng-blur="inputsaveTotalWeight(namecate.categories_id)" value="{{namecate.weg_total}}"></td>
                                                <?php
                                             }
                                              ?>
                                             
                                             <td><b style="font-size:12px;" id="fulltotal_{{namecate.categories_id}}">{{namecate.amount_total}} </b></td>
                                             <td><b style="font-size:12px;" id="fullweight_{{namecate.categories_id}}">{{namecate.weg_total}} </b></td>
                                              <?php
                                              if($status_base!=6)
                                              {
                                              ?> 
                                             <td class="hidmob"></td>
                                             <?php
                                              }
                                              ?>
 
                                          </tr>
                                       </tfoot>
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                    </table>
                                 </div>
                              
                              
                                
                                
                              
                              
                              
                              
                              
                              </div>
                           </div>
                        </div>
                        
                        
                        
                        
               
                           
      
      
      
      
      
      
           
                        
                        
                        <div class="floater-options1"    ng-init="fetchSingleDatatotal('1')">
                            
                            
                            
                            
                            
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12 d-flex floaterOptionLeft">
        
                                       <?php
                                        if($status_base!=6)
                                        {
                                        ?>



                              <div class="d-done pe-1 pe-md-3 pe-sm-1">
                                 <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                       <input type="text" ng-model="discount" <?php echo $read; ?> placeholder="Discount" class="form-control" id="saveDiscount" ng-keyup="saveDiscount($event)" style="
                                          padding: 5px 5px;" >
                                    </div>
                                 </div>
                              </div>


                                       <?php
            
                                        }
            
                                        ?>
         <div class="d-none pe-1 pe-md-1 pe-sm-1">
            <div class="d-flex align-items-center">
               <div class="flex-grow-1" style="
                  display: inline-flex;
                  margin-top: 8px;
                  ">
                  <span class="text-muted lh-1 d-block pe-lg-1"> Discount  </span>
                  <h5 class="text-success ng-binding" style="width: 64px;">&#8377; {{discounttotal}}</h5>
                    
                  
               </div>
            </div>
         </div>
         <div class="d-none pe-1" style="width: 200px;">
            <div class="d-flex align-items-center">
               <div class="flex-grow-1">
                   <p>Round Off : <span ng-if="minisroundoff>0"> ({{roundoff_val}}) </span> <input type="text"  value="{{minisroundoff}}" <?php echo $read; ?> class="roundoff" id="roundoff" ng-blur="saveRoundoff($event)" >
                                                
                                                      <button type="button" class="btn btn-outline-success" style="padding:2px;width:22px;"  ng-click="convertPlus(1)">+</button>
                                                     <button type="button" class="btn btn-outline-danger"  style="padding:2px;width:22px;" ng-click="convertPlus(0)">-</button>
                                                     
                 <span ng-if="minisroundoff>0"> Original value : <b>{{org_fulltotal}}</b> </span>
                                                </p>
               </div>
            </div>
         </div>
         <div class="d-inline pe-1 pe-md-5 pe-sm-1">
            <div class="d-flex align-items-center">
               <div class="flex-grow-1" >
                   
                   
              
                   
                                   
                  
               </div>
               
              
            </div>
         </div>
         
      </div>




                                
                                
                                <div class="col-lg-8 col-md-8 col-sm-12 col-12 d-flex floaterOptionLeft">
                                    
                                  
                                       
                                     <div  class="col-md-4" >
                                            <h5 class="text-primary font-size-11 ng-binding">TOTAL ITEMS :  {{totalitems}}</h5>
                                     
                                     <h5 class="ng-binding font-size-11" ng-if="tcsamount>0"> TCS (+): {{tcsamount}} </h5>
                                      <h5 class="ng-binding font-size-11">SubTotal : Rs. {{ fulltotal+DiscountAmount  }}</h5>
                    <h5 class="ng-binding font-size-11" ng-if="DiscountAmount>0">Discount {{discount}} % : Rs.{{ DiscountAmount  }}</h5> 
                                        <div ng-if="gsttotal>0">
                                                                              
                                                                              <h5  class="ng-binding font-size-11" ng-if="gst_check==1">CGST 9 % : Rs. {{gsttotal }}</h5>
                                                                              <h5  class="ng-binding font-size-11" ng-if="gst_check==1">SGST 9 % : Rs. {{gsttotal  }}</h5>
                                              </div>
                                              <h5 class="ng-binding font-size-11" ng-if="roundoffstatusval_data !==''"><span class="ng-binding font-size-11"
                    >Round : Rs.  {{ roundoffstatusval_data }}</span>
                    </h5>
                                     <h5 class="ng-binding font-size-11" ng-if="minisroundoff>0 && roundoffstatus==1">Manual Round : Rs. (+) {{ minisroundoff  }}</h5>
                                     <h5 class="ng-binding font-size-11" > TOTAL AMOUNT: Rs. {{discountfulltotal}} </h5>
                                     <input type="hidden" id="discountfulltotal" value="{{discountfulltotal}}">     
                                     
                                     </div>
                                    <div  class="col-md-2" >
                                         
                                      
                                                            <input type="checkbox" class="form-check-input"  ng-click='Purchaserequest()' name="Purchaserequest" value="1" id="formrow-purchase-request">
                                                            <label class="form-check-label" for="formrow-purchase-request"> Return Product</label> 
                                             
                                     
                                    
                                     </div>
                                     <div  class="col-md-2" >
                                         
                                             
                                     <a herf="<?php echo base_url(); ?>index.php/order/sales_return"   class="btn btn-outline-danger"><i class="mdi mdi-account-off font-size-14 text-danger me-1"></i> Back </a>
                                    
                                     </div>
                                   
                                    
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                          
                            
                            
                        </div>
                        
                    </div>
                     
                     
                     <div class="col-3 bg-soft-light fixed-sidebar switchRight" >
                        <!-- Settings -->
                        <div class="p-3">
                           <h6><i class="far fa-address-book pe-2"></i><?php echo $missed; ?> History <span class="float-end font-size-12 text-success text-decoration-underline history-toggle-tab">Last 10 <?php echo $missed; ?></span></h6>
                           <hr class="m-1">
                           
                           
                           
                           <?php  $actual_link = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];  ?>
                           
                           
                              
                           <div class="history-tl-container">
                               
                             
                             <ul class="tl" ng-init="fetchCustomerororderhistroy('orders')" ng-show="namesHistory.length>0">
                              <li class="tl-item" ng-repeat="namesh in namesHistory">
                                 
                                 <div class="item-title">{{namesh.lable}} received and attend by <a href="{{namesh.url}}" target="_blank">{{namesh.user_name}}</a>. {{namesh.lable}} reference number <a href="{{namesh.url}}" target="_blank">{{namesh.order_no}}</a></div>
                                 <div class="item-detail">on {{namesh.create_date}} {{namesh.create_time}}</div>
                               </li>
                               
                             </ul>
                             
                             
                             
                             
                             <ul class="tl" ng-init="fetchCustomerororderhistroy_qq('orders_quotation')" ng-show="namesHistoryqq.length>0">
                              <li class="tl-item" ng-repeat="nameshqq in namesHistoryqq">
                                 
                                 <div class="item-title">{{nameshqq.lable}} received and attend by <a href="{{nameshqq.url}}" target="_blank">{{nameshqq.user_name}}</a>. {{nameshqq.lable}} reference number <a href="{{nameshqq.url}}" target="_blank">{{nameshqq.order_no}}</a></div>
                                 <div class="item-detail">on {{nameshqq.create_date}} {{nameshqq.create_time}}</div>
                               </li>
                               
                             </ul>
                             
                             
                              <ul class="tl" ng-init="fetchCustomerororderhistroy_oo('orders_process')" ng-show="namesHistoryoo.length>0">
                              <li class="tl-item" ng-repeat="nameshoo in namesHistoryoo">
                                 
                                 <div class="item-title">{{nameshoo.lable}} received and attend by <a href="{{nameshoo.url}}" target="_blank">{{nameshoo.user_name}}</a>. {{nameshoo.lable}} reference number <a href="{{nameshoo.url}}" target="_blank">{{nameshoo.order_no}}</a></div>
                                 <div class="item-detail">on {{nameshoo.create_date}} {{nameshoo.create_time}}</div>
                               </li>
                               
                             </ul>
                             
                             
                             
                          
                              
                           
                             
                             
                           </div>

                           <div class="row mt" ng-show="namesHistoryre.length>0">

                              <!--Set details-->
                              
                              <h6><i class="far fa-address-book pe-2"></i>Returns Order</span></h6>
                              <hr class="m-1">
                              
                              <ul class="tl" ng-init="fetchCustomerororderhistroy_returns('orders_process')" ng-show="namesHistoryre.length>0">
                              <li class="tl-item" ng-repeat="nameshre in namesHistoryre">
                                 
                                 <div class="item-title">Order NO <a href="{{nameshoo.url}}" target="_blank">{{nameshre.order_no}}</a></div>
                                 <div class="item-detail">on {{nameshre.create_date}} {{nameshre.create_time}}</div>
                               </li>
                               
                             </ul>
                             
                              
                           </div>
                           
                         
                          
                           

                           <div class="row mt-3 d-none">
                              <div class="col-xl-6 col-md-6">
                                 <div class="card mb-3 bg-soft-danger">
                                    <div class="card-body pb-1">
                                       <div class="d-flex align-items-center">
                                          <div class="flex-grow-1">
                                             <span class="text-muted mb-2 lh-1 d-block text-truncate">Total Sales <span class="badge bg-soft-success text-success">+$20.9k</span></span>
                                             <h4 class="mb-1">
                                                $<span class="counter-value" data-target="354.5">354.5</span>k
                                             </h4>
                                             <div class="text-nowrap">
                                                
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-xl-6 col-md-6">
                                 <div class="card mb-3 bg-soft-success">
                                    <div class="card-body pb-1">
                                       <div class="d-flex align-items-center">
                                          <div class="flex-grow-1">
                                             <span class="text-muted mb-2 lh-1 d-block text-truncate">Total Sales <span class="badge bg-soft-success text-success">+$20.9k</span></span>
                                             <h4 class="mb-1">
                                                $<span class="counter-value" data-target="354.5">354.5</span>k
                                             </h4>
                                             <div class="text-nowrap">
                                                
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>


                              <div class="col-xl-6 col-md-6">
                                 <div class="card mb-3 bg-soft-secondary">
                                    <div class="card-body pb-1">
                                       <div class="d-flex align-items-center">
                                          <div class="flex-grow-1">
                                             <span class="text-muted mb-2 lh-1 d-block text-truncate">Total Sales <span class="badge bg-soft-success text-success">+$20.9k</span></span>
                                             <h4 class="mb-1">
                                                $<span class="counter-value" data-target="354.5">354.5</span>
                                             </h4>
                                             <div class="text-nowrap">
                                                
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>


                           <h6 class="mt-5"><i class="far fa-address-book pe-2"></i> Customer Rating</h6>
                           <hr class="m-1">
                           <div class="row mt-3">
                              <div class="col-xl-12 col-md-6">
                                 <div class="report-column tinycol fifty">
                                   <ul data-animate="colorScale" data-value="{{ratings}}" class="scaleColors">
                                     <li></li><li></li><li></li><li></li>
                                     <div class="scoreTick" style="left: {{ratings}}%;"></div>
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


                           <h6 class="mt-3"><i class="far fa-address-book pe-2"></i> Credits Limit <span class="float-end"><b>{{credit_limit}}</b></span></h6>
                           <h6 class="mt-3"><i class="far fa-address-book pe-2"></i> Usage <span class="float-end"><b>{{fulltotal_usage}}</b></span></h6>
                           <hr class="m-1">
                           <div class="row mt-3">
                              <div class="col-xl-12 col-md-6">
                                  <div class="skills">
                                     <div class="details">
                                         <span>0</span>
                                         <span>{{useage}}%</span>
                                     </div>
                                     <div class="bar">
                                         <div  style="width: {{useage}}%;"></div>
                                     </div>
                                 </div>
                              </div>
                              <div class="col-12">
                                  
                                  <p class="text-muted mt-3">Credits Period <b>{{credit_period}}</b></p>
                                  
                              </div>
                           </div>
                           
                           
                           
                           
                            <?php
                            if($status_base!=6)
                            {
                            ?> 
                                            <div class="customer-call-history mt-3">
                               <div class="row">
                                   <div class="col-12">
                                       <h6><i class="mdi mdi-file-phone pe-2 font-size-14"></i>Call History   <span class="float-end text-success text-decoration-underline cursor-pointer view-log-tab">View logs</span></h6>
                                       <hr class="m-1">
                                       
                                        <form  ng-submit="submitCallBack()" method="post">
                                            
<div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="success">
                                            <i class="mdi mdi-check-all me-2"></i>
                                           {{successMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>




                                            
                                        <div class="call-history-details">
                                            <div class="d-block pe-3">
                                            <div class="form-group row">
                                               <div class="flex-shrink">
                                                    <label class="col-sm-12 col-form-label">Select Status</label>
                                                    <div class="col-sm-12">
                                                     <select class="form-control" id="call_status" required="" ng-model="call_status">
                                                             <option value=""> Select Status</option>
                                                             <option value="Not Interested">Not Interested</option>
                                                             <option value="Call Back">Call Back</option>
                                                             <option value="No Response">No Response</option>
                                                             <option value="Just enquiry">Just enquiry</option>
                                                             <option value="Closed">Closed</option>
                                                             <option value="Others">Others</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pe-3 mt-2" id="showdate" style="display:none;">
                                            <div class="form-group row">
                                               <div class="flex-shrink">
                                                    <label class="col-sm-12 col-form-label">Call Back Date & Time</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" type="datetime-local" ng-model="call_back_date" value="2019-08-19T13:45:00" id="example-datetime-local-input">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                         <div class="pe-3 mt-2" >
                                            <div class="form-group row">
                                               <div class="flex-shrink">
                                                    <label class="col-sm-12 col-form-label">Audio Link</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" type="text" ng-model="audiolink"  id="audiolink">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="d-block pe-3 mt-2">
                                            <label class="col-sm-12 col-form-label"><b> Or </b> Upload Audio</label>
                                            <audio id="audio" controls style="width:100%;display:none;">
                                              Your browser does not support the audio element.</audio>
                                            <br />
                                            
                                             <input type="file"  style="padding:9px;"   file-input="files" class="form-control" accept="audio/*" id="fileupload">
                              
                                            <ul id="fileList" class="drag-sort-enable">
                                            </ul>
                                            <div id="analyserOut">
                                            </div>
                                            
                                           
                                        </div>
                                        
                                        <div class="pe-3 mt-2" >
                                            <div class="form-group row">
                                               <div class="flex-shrink">
                                                    <label class="col-sm-12 col-form-label">Remarks</label>
                                                    <div class="col-sm-12">
                                                        <textarea class="form-control" rows="4" ng-model="remarks"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pe-3 mt-2" >
                                            <div class="form-group row">
                                                <button type="submit" class="btn btn-primary w-md" style="float:right;" id="savecallback">Save</button>
                                            
                                            </div>
                                        </div>
                                        
                                          
                                            
                                        
                                        </div>
                                        </form>
                                        
                                       
                                       
                                       
                                       
                                        <div class="call-history-logs">
                                            <div class="d-block pe-3">
                                            
                                            
                                            <div class="row call-log-row mt-2" ng-init="fetchCustomerorcallbackhistroy()">
                                                
                                                
                                              
                                              
                                                <div class="call-history-col col-12" ng-repeat="names in namesCallback">
                                                    <p><b>{{names.create_date}} {{names.create_time}}</b></p>
                                                    <ul>
                                                        <li><small>{{names.order_no}}</small></li>
                                                        <li>{{names.status_data}}</li>
                                                        <li>{{names.remarks}}</li>
                                                        
                                                       <li style="list-style: none;"><audio id="audio" src="{{names.audio}}" controls style="width:100%;height: 25px;margin: 7px 0px;"></audio></li>
                                                       
                                                        
                                                    </ul>
                                                </div>
                                                
                                                
                                                 <span ng-show="namesCallback.length==0">
                                                   <p class="text-muted pt-3">No Data Found</p>             
                                                </span>
                                                
                                                
                                                
                                                
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                        </div>
                                        
                                        
                                        
                                        
                                   </div>
                               </div>
                           </div>
                           
                                             <?php
                                              }
                                              ?>
                           
                           
                           
                           
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- End Page-content -->
         </div>
      </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
      <div class="right-bar">
         <div data-simplebar class="h-100">
            <div class="rightbar-title d-flex align-items-center bg-dark p-3">
               <h5 class="m-0 me-2 text-white">{{titleView}}</h5>
               <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
               <i class="mdi mdi-close noti-icon closeaddon" ></i>
               </a>
            </div>
            <!-- Settings -->
            <hr class="m-0" />
            <div class="p-3">
                
                
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
                
                
                
                           <h5><i class="far fa-address-book pe-2"></i> {{titleView}}</h5>
                           <hr>
                           
                           <form id="pristine-valid-common" ng-submit="submitForm()" method="post" >
                               
                               
                               
                                <div class="row">
                        <div class="col-md-6" >
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Company name <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="company_name" class="form-control" required name="company_name" ng-model="company_name" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">GST <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="gst" class="form-control" name="gst"   required ng-model="gst" type="gst">
                            </div>
                          </div>
                        </div>
                      
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Office Address line 1 <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="address1" class="form-control" name="address1" required ng-model="address1" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Office Address line 2</label>
                            <div class="col-sm-12">
                             <input id="address2" class="form-control" name="address2"   ng-model="address2" type="address2">
                            </div>
                          </div>
                        </div>
                      </div>
                                <div class="row">
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
                             <input id="landmark" class="form-control" name="landmark"   ng-model="landmark" type="landmark">
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
                                <h4 class="card-title mt-3">Contact Details </h4>
                                <div class="row">
        
        
                               <div class="col-md-6" style="display:none;">
                                  <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Sales Group <span style="color:red;">*</span></label>
                                    <div class="col-sm-12">
                                     <select class="form-control" name="sales_group"  ng-model="sales_group">
        
                                      <option value="0"> Select Sales Group</option>
        
                                      <?php
                                        foreach ($user_group as $value) {
        
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
                                    <label class="col-sm-12 col-form-label">Sales Team <span style="color:red;">*</span></label>
                                    <div class="col-sm-12">
                                     <select class="form-control" name="sales_team_id" required ng-model="sales_team_id">
        
                                      <option value=""> Select Sales Team</option>
        
                                      <?php
                                        foreach ($sales_team as $valued) {
        
                                          ?>
                                               <option value="<?php echo $valued->id; ?>"><?php echo $valued->name; ?></option>
                                          <?php
                                          
                                        }
                                      ?>
                                    
                                      
        
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                
                               <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Phone <span style="color:red;">*</span></label>
                                    <div class="col-sm-12">
                                      <input id="phone" class="form-control" name="phone" required ng-model="phone" type="number" >
                                    </div>
                                  </div>
                                </div>
        
        
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Landline No</label>
                                    <div class="col-sm-12">
                                      <input id="landline" class="form-control" ng-model="landline" name="landline" type="number">
                                    </div>
                                  </div>
                                </div>
        
        
                                   <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Email</label>
                                    <div class="col-sm-12">
                                      <input id="email" class="form-control" name="email" ng-model="email" type="email">
                                    </div>
                                  </div>
                                </div>
                                
                            
        
        
                                
                              </div>
                                <div class="row" style="margin: 20px -9px;">
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    
                                    <div class="col-sm-12">
                                        <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                                     <button type="submit" class="btn btn-primary w-md">Add Customer</button>
                                    </div>
                                  </div>
                                </div>
                                
                                
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    
                                    <div class="col-sm-12">
                                      <button type="reset" class="btn btn-outline-danger w-md ms-2">Reset</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              
                                   
                           
                           </form>
                        </div>
         </div>
         <!-- end slimscroll-menu-->
      </div>














 <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasSpec-address" aria-labelledby="offcanvasSpecLabel">
        <div class="offcanvas-header" style="background: #dddddd;">
          <h5 id="offcanvasSpecLabel"><a href="#" id="addressclick" class="btn btn-outline-success "><i class="mdi mdi-plus-circle font-size-12"  title="Add New Address"></i> &nbsp;Add New Address
                          </a></h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
         
         
         
         
         
         
         
                       <span id="addaddress" style="display:none;">
                
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
                            
                 
                
                           <h5><i class="far fa-address-book pe-2"></i> Add Customer Addess</h5>
                           <hr> 


                          
                           
                           <form   ng-submit="submitFormaddress()" method="post">
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
                      </div>
                                <div class="row">
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
                             <input id="landmark" class="form-control" name="landmark"   ng-model="landmark" type="landmark">
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
                            <label class="col-sm-12 col-form-label">State <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="state" class="form-control" name="state"  required  ng-model="state" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                          <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Google Location Link </label>
                            <div class="col-sm-12">
                             <input id="google_map_link" class="form-control" name="google_map_link"    ng-model="google_map_link" type="text">
                            </div>
                          </div>
                        </div>

                        
                      </div>
                      
                      
                    
                          
                       <div class="row" style="margin: 20px -9px;">
                        <div class="col-md-6">
                          <div class="form-group row">
                            
                            <div class="col-sm-12">
                                <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                             <button type="submit" class="btn btn-primary w-md">Add Address</button>
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            
                            <div class="col-sm-12">
                              <button type="reset" class="btn btn-outline-danger w-md ms-2">Reset</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      
                           
                           
                           </form>
               
            
                      </span>
                      
                      
                      <span id="addressshow">
                          
                          <div ng-init="fetchCustomerorderdelevieryaddress()">
                                                                
                                                                <table class="table" ng-repeat="names in namesDataaddress">
                                                                    
                                                                    
                                                                     <tr style="background: #f1f1f1;">
                                                                        
                                                                         <td colspan="3" style="padding: 10px 5px;"><label for="set_{{names.id}}" style="cursor: pointer;margin-bottom: 0px;"><b>{{names.no}} .</b> Choose Address</label>  <input type="radio" id="set_{{names.id}}" name="selecaddress" ng-click="pointDataaddress(names.id)" style="float:right;" class="btn btn--danger"></td>
                                                                     </tr>
                                                                    
                                                                     <tr>
                                                                         <th> Name</th>
                                                                         <th>:</th>
                                                                         <td>{{names.name}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <th> Phone </th>
                                                                         <th>:</th>
                                                                         <td>{{names.phone}} </td>
                                                                     </tr>
                                                                     
                                                                      <tr>
                                                                         <th>Address  </th>
                                                                         <th>:</th>
                                                                         <td>{{names.address}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                      <tr>
                                                                         <th>Google Location   </th>
                                                                         <th>:</th>
                                                                         <td>{{names.google_map_link}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                    
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>
                          
                      </span>
         
         
         
         
         
         
         
         
        </div>
    </div>













 <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasSpec-pricelist" aria-labelledby="offcanvasSpecLabel">
        <div class="offcanvas-header" style="background: #dddddd;">
          <h5 id="offcanvasSpecLabel"> Competitor Price List
                          </h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
         
         
         
         
                          
                                                                 <h3>{{pricelist_title}}</h3>
                                                                
                                                                <table class="table" ng-init="fetchpricelist()">
                                                                    
                                                                    
                                                                   
                                                                     <tr>
                                                                         <th>Competitor Name</th>
                                                                         <th>SQFT</th>
                                                                         <td>Price</td>
                                                                         <td style="text-align:right;">Updated By</td>
                                                                     </tr>
                                                                     
                                                                     <tr ng-repeat="namesprice in namesDataprice">
                                                                         <th>{{namesprice.vendor_name}}</th>
                                                                         <th>{{namesprice.sqft}}</th>
                                                                         <th>Rs. {{namesprice.price}}.00</th>
                                                                         <th><span class="float-end font-size-12 text-success text-decoration-underline history-toggle-tab">{{namesprice.updated_by}}</span></th>
                                                                     </tr>
                                                                    
                                                                     
                                                                     
                                                                     
                                                                    
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                  
                                                  
                                                  
                                                  
                                                  
                                                  
                    <!-- <div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="success">
                                                    <i class="mdi mdi-check-all me-2"></i>
                                                   {{successMessage}}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                            
                            
                     <div class="alert alert-danger alert-dismissible fade show" role="alert" ng-show="error">
                                                                        <i class="mdi mdi-block-helper me-2"></i>
                                                                        {{errorMessage}}
                                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>-->
                                                                         
                      <form ng-submit="addprice()" method="post" class="ng-pristine ng-invalid ng-invalid-required">
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">SQFT <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                               <input id="csqft" class="form-control" required="" name="csqft" ng-model="csqft" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                             <label class="col-sm-12 col-form-label">Price <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="cprice" class="form-control" name="cprice" required="" ng-model="cprice" type="cprice">
                            </div>
                          </div>
                        </div>
                      
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label"> Competitor Name <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="cname" class="form-control" name="cname" required="" ng-model="cname" type="text">
                            </div>
                          </div>
                        </div>
                       
                      </div>
                          

                      
                      
                      
                    
                          
                       <div class="row" style="margin: 20px -9px;">
                        <div class="col-md-6">
                          <div class="form-group row">
                            
                            <div class="col-sm-12">
                              
                             <button type="submit" class="btn btn-primary w-md">Add Price</button>
                            </div>
                          </div>
                        </div>
                        
                        
                        <input type="hidden" id="product_id" name="product_id">
                        
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            
                            <div class="col-sm-12">
                              <button type="reset" class="btn btn-outline-danger w-md ms-2">Reset</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      
                           
                           
                           </form>
                      
         
         
         
         
         
         
         
         
        </div>
    </div>


























 <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasSpec-Specification" aria-labelledby="offcanvasSpecLabel">
        <div class="offcanvas-header" style="background: #dddddd;">
          <h5 id="offcanvasSpecLabel">Additional information
                          </h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
         
         
         
         
                          
                                <div class="row">
                                
                                
                                  <h3>{{product_name_data}}</h3>
                                
                                
                                
                                
                                <?php
                                
                                foreach($additional_information as $vvl)
                                {
                                    
                                     if($vvl->type=='Multiple Options')
                                     {
                                         
                                          $option=$vvl->option;
                                          $option=explode(',', $option);
                                         ?>
                                         
                                         
                                         
                                          <div class="col-md-12" >
                                              
                                               <div class="d-inline pe-12">
                                                   <div class="form-group row">
                                                      <div class="flex-shrink">
                                                         <label class="col-sm-12 col-form-label"><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?></label>
                                                         <div class="col-sm-12">
                                                            <select class="form-control <?php echo strtolower($vvl->label_name); ?>" ng-change="saveRemarks('<?php echo strtolower($vvl->label_name); ?>')" name="<?php echo strtolower($vvl->label_name); ?>"  ng-model="<?php echo strtolower($vvl->label_name); ?>">
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
                                         }
                                         else
                                         {
                                             $vv='text';
                                         }
                                         
                                         
                                         ?>
                                         
                                          <div class="col-md-12" >
                                              
                                               <div class="d-inline pe-12">
                                                   <div class="form-group row">
                                                      <div class="flex-shrink">
                                                         <label class="col-sm-12 col-form-label"><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?></label>
                                                         <div class="col-sm-12">
                                                           
                                                           
                                                           <input type="<?php echo $vv; ?>" class="form-control <?php echo strtolower($vvl->label_name); ?>" ng-blur="saveRemarks('<?php echo strtolower($vvl->label_name); ?>')" name="<?php echo strtolower($vvl->label_name); ?>"  ng-model="<?php echo strtolower($vvl->label_name); ?>">
                                                           
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                
                                                
                                            </div>
                                         
                                         <?php
                                     }
                                    
                                    ?>
                                    
                                   
                                    
                                    
                                    <?php
                                }
                                
                                
                                ?>
                                
                                
                                 
                                
                                
                                
                                
                                
                                
                            </div>
         
         
         
         
         
         
         
        </div>
    </div>































 <div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Success</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?php echo $order_title; ?>  : <b><?php echo $order_no; ?> Move to <?php echo $move; ?> </b></p>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>






 <div class="modal fade" id="firstmodal_price_request" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Success</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?php echo $order_title; ?>  : <b><?php echo $order_no; ?> Price has requested </b></p>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>



 <div class="modal fade" id="firstmodalcommison" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Input Commission</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                            <input type="number" class="form-control"  ng-model="commissionval">
                                                            <div class="row" style="margin: 20px -9px;">
                                                          
                                                            
                                                            <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                     <input type="hidden" name="order_product_id" id="order_product_id" value="133">
                                                                 <button type="submit" class="btn btn-primary w-md" style="float: right;" ng-click="savecommissionval()">Save</button>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>




















 <div class="modal fade" id="archiveOpen" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Order NO</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                            <input type="text" class="form-control"   ng-model="order_no_new">
                                                            <small style="color:red">Please change order id</small>
                                                             <input type="hidden" class="form-control"  ng-model="order_no_new_old">
                                                            <div class="row" style="margin: 20px -9px;">
                                                          
                                                            
                                                            <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                     <input type="hidden" name="order_product_id" id="order_product_id" value="133">
                                                                 <button type="submit" class="btn btn-primary w-md" style="float: right;" ng-click="saveArchive()">Save</button>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>










 <div class="modal fade" id="competitorprice" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Input Competitor Details</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        
                                                        <form   ng-submit="submitCompetitor()" method="post">
                                                        <div class="modal-body">
                                                            
                                                             <div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="successcc">
                                                                        <i class="mdi mdi-check-all me-2"></i>
                                                                       {{successMessage_c}}
                                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                               </div>
                            
                            
                          
                            
                                                             
                                                                    <div class="row">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group row">
                                                                        <label class="col-sm-12 col-form-label">Competitor Name <span style="color:red;">*</span></label>
                                                                        <div class="col-sm-12">
                                                                           <input id="competitorname" class="form-control" required name="name" ng-model="competitorname" type="text">
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                      <div class="form-group row">
                                                                         <label class="col-sm-12 col-form-label">Price / Details <span style="color:red;">*</span></label>
                                                                        <div class="col-sm-12">
                                                                          <textarea class="form-control" ng-model="details" required rows="5"></textarea>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                    
                                                                      </div>
                                                                                                       
                                                           
                                                           
                                                            
                                                     
                                                       
                                                    </div>
                                                    
                                                                <div class="modal-footer">
                                                                
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                              </div>
                                                    </form>
                                                </div>
                                              </div>

</div>





 <div class="modal fade" id="competitorpriceview" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel"> Competitor Details</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        
                                                        <form   ng-submit="submitCompetitor()" method="post">
                                                        <div class="modal-body">
                                                            
                                                            
                                                                    <div class="row">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group row">
                                                                        <p class="col-sm-12 col-form-label">Competitor Name :    <b>{{competitorname}}</b> </p>
                                                                       
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                      <div class="form-group row">
                                                                         <p class="col-sm-12 col-form-label">Price / Details :  <b>{{details}}</b></p>
                                                                       
                                                                      </div>
                                                                    </div>
                                                                    
                                                                      </div>
                                                                                                       
                                                           
                                                    </div>
                                                    
                                                               
                                                    </form>
                                                </div>
                                              </div>

</div>





 <div class="modal fade" id="firstmodal4" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Grouping for {{grouping_title}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                           
                                                           <div class="col-md-12">
                                                                  <div class="form-group row">
                                                                   
                                                                    <div class="col-sm-12">
                                                                     <input id="rows_input" class="form-control" name="rows_input"  type="number">
                                                                    </div>
                                                                  </div>
                                                           </div>
                                                           
                                                           
                                                           
                                                           <div class="row" style="margin: 20px -9px;">
                                                          
                                                            
                                                            <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                     <input type="hidden" name="order_product_id" id="order_product_id">
                                                                 <button type="submit" class="btn btn-primary w-md" style="float: right;" ng-click="groupadd()">Save</button>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                           
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>













 <div class="modal fade" id="firstmodal5" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalToggleLabel">Purchase Request  for {{grouping_title}}</h6>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                           
                                                           <div class="col-md-12">
                                                                  
                                                                  
                                                                  <table class="table">
                                                                      
                                                                      <tr>
                                                                           <td>Expected material arrival date</td>
                                                                           <td>{{arrival_date}}</td>
                                                                      </tr>
                                                                      <tr>
                                                                           <td>Price</td>
                                                                           <td>{{price_details}}</td>
                                                                      </tr>
                                                                      <tr>
                                                                           <td>Availability in the warehouse</td>
                                                                           <td>{{availability}}</td>
                                                                      </tr>
                                                                      
                                                                  </table>
                                                                  
                                                               
                                                                  
                                                                  
                                                           </div>
                                                           
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>
























 <div class="modal fade" id="perchaserequest" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Material return</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        
                                                        <form   ng-submit="submitPurchaserequest()" method="post">
                                                        <div class="modal-body">
                                                            
                                                                   <div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="successcc">
                                                                            <i class="mdi mdi-check-all me-2"></i>
                                                                           {{successMessage_c}}
                                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                   </div>
                                                                   
                            
                                                                    <div class="row">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group row">
                                                                        <label class="col-sm-12 col-form-label">Return Date </label>
                                                                        <div class="col-sm-12">
                                                                           <input id="arrival_date" class="form-control" value="<?php echo $return_date; ?>" required name="arrival_date"  type="date">
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-12" >
                                                                      <div class="form-group row">
                                                                         <label class="col-sm-12 col-form-label">Remarks  </label>
                                                                        <div class="col-sm-12">
                                                                            <textarea id="return_remarks" class="form-control"  name="return_remarks"  rows="6"><?php echo $remarks; ?></textarea>
                                                                        
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                    
                                                                    
                                                                    
                                                                    </div>
                                                                                                       
                                                           
                                                           
                                                            
                                                     
                                                       
                                                    </div>
                                                    
                                                                <div class="modal-footer">
                                                                
                                                                <button type="submit" class="btn btn-primary">Return</button>
                                                              </div>
                                                    </form>
                                                </div>
                                              </div>

</div>










































 <div class="modal fade" id="firstmodal3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Success</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?php echo $order_title; ?>  : <b><?php echo $order_no; ?> Request submitted </b></p>
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
                                                            <p>Approved <?php echo $order_title; ?>  : <b><?php echo $order_no; ?> </b></p>
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
                                                            <p>Rejected <?php echo $order_title; ?>  : <b><?php echo $order_no; ?> </b></p>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>




























  <!-- Modal Draw Image-->
<div class="modal fade bs-example-modal-xl" id="imagesizemodel" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" >Draw Image</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                              <input type="text"  class="numgen"  style="margin-left: 20px">
     <button id="undo" class="btn btn-outline-success">Add value</button>
      <button id="deleteText" class="btn btn-outline-danger">Clear Values</button>
                                                                
                                                       
                                                                
                                                                
                                                                  <ul class="toolbar">
                                             <li class="toolbar__group">
                                                <fieldset>
                                                   <legend class="toolbar__heading">Tools</legend>
                                                   <input id="line" type="radio" name="tools" value="line" checked="checked"/>
                                                   <label class="toolbar__button" for="line"><span>Line</span></label>
                                                   <div style="display: none;">
                                                      <input id="rectangle" type="radio" name="tools" value="rectangle"/>
                                                      <label class="toolbar__button" for="rectangle"><span>Rectangle</span></label>
                                                      <input id="circle" type="radio" name="tools" value="circle"/>
                                                      <label class="toolbar__button" for="circle"><span>Circle</span></label>
                                                      <input id="polygon" type="radio" name="tools" value="polygon"/>
                                                      <label class="toolbar__button" for="polygon"><span>Polygon</span></label>
                                                      <div class="toolbar__sub-group">
                                                         <label class="toolbar__label" for="sides">Polygon Sides:</label>
                                                         <input id="sides" type="number" min="3" max="10" value="3" data-setting="polygonSides"/>
                                                      </div>
                                                   </div>
                                                </fieldset>
                                             </li>
                                             <li class="toolbar__group">
                                                <fieldset>
                                                   <legend class="toolbar__heading">Options</legend>
                                                   <div class="toolbar__option toolbar__option--color">
                                                      <label for="stroke-color"><span class="toolbar__label">Stroke</span><span class="toolbar__button"></span></label>
                                                      <input id="stroke-color" type="color" value="#ff5e14" data-setting="strokeColor"/>
                                                   </div>
                                                   <div class="toolbar__option toolbar__option--color">
                                                      <label for="fill-color"><span class="toolbar__label">Fill</span><span class="toolbar__button"></span></label>
                                                      <input id="fill-color" type="color" value="#87EBA6" data-setting="fillColor"/>
                                                   </div>
                                                   <div class="toolbar__option">
                                                      <label class="toolbar__label" for="stroke-weight">Stroke Weight</label>
                                                      <input id="stroke-weight" type="number" min="0" max="300" value="25" data-setting="strokeWeight"/>
                                                   </div>
                                                   <div class="toolbar__option">
                                                      <label class="toolbar__label" for="line-cap">Line Cap:</label>
                                                      <select id="line-cap" data-setting="lineCap">
                                                         <option  value="round">Round</option>
                                                         <option value="square">Square</option>
                                                         <option selected="selected" value="butt">Butt</option>
                                                      </select>
                                                   </div>
                                                   <div class="toolbar__option">
                                                      <label class="toolbar__label" for="line-join">Line Join:</label>
                                                      <select id="line-join" data-setting="lineJoin">
                                                         <option selected="selected" value="miter">Miter</option>
                                                         <option value="round">Round</option>
                                                         <option value="bevel">Bevel</option>
                                                      </select>
                                                   </div>
                                                   <div class="toolbar__option">
                                                      <label class="toolbar__toggle" for="guides">Guides</label>
                                                      <input id="guides" type="checkbox" checked data-setting="guides"/>
                                                   </div>
                                                </fieldset>
                                             </li>
                                          </ul>
      <button id="clear" class="btn btn-outline-danger">Clear</button>
      <button id="saveServer" ng-click="saveImagesize()" class="btn btn-success w-lg waves-effect waves-light" >Save Image</button>
      
      
                                                                
                                                              <div id="canvas"></div>
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



  <!-- Modal End-->


























  <!-- Modal Draw Image to Arch-->
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

  <!-- Modal Draw Image-->
<div class="modal fade bs-example-modal-xl-arch"  id="imagesizemodelarch" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" >Input number on Image</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body" id="inputtext_container">
                                                                
                                                                
                                                                
                                                                
                                                         
                                                          
                                                          <div class="container inputtext_container" >
  <img src="http://erp.zaron.in/image.jpg" id="showimageclick" alt="Snow" style="width: 70%;
    display: block;
    margin: auto;">
    
 <div id="arch">
     

  <div class="bottom-left">
 <input type="text" alt="text-1" class="inputtext" id="set_5" placeholder="No5">
  </div>
   <div class="bottom-left-sub">
 <input type="text" alt="text-1" class="inputtext" id="set_4" placeholder="No4">
  </div>
  <div class="top-left">
  <input type="text" alt="text-1" class="inputtext" id="set_1" placeholder="No1"></div>
  <div class="top-right">
  <input type="text" alt="text-1" class="inputtext" id="set_2" placeholder="No2"></div>
  <div class="bottom-right">
  <input type="text" alt="text-1" class="inputtext" id="set_6" placeholder="No6"></div>
  <div class="bottom-right-sub">
  <input type="text" alt="text-1" class="inputtext" id="set_7" placeholder="No7"></div>
  <div class="centered">
  <input type="text" alt="text-1" class="inputtext" id="set_8" placeholder="No8"></div>
  
  <div class="center-rotate">
      <input type="text" alt="text-1" class="inputtext" id="set_3" placeholder="No3">
  </div>
  
   </div> 
   
 <div id="profile_ridge">
     

  <div class="bottom-left-profile">
 <input type="text" alt="text-1" class="inputtext" id="set_44" placeholder="No4">
  </div>
   
  <div class="top-left-profile">
  <input type="text" alt="text-1" class="inputtext" id="set_11" placeholder="No1"></div>
  
    <div class="top-left-last-profile">
  <input type="text" alt="text-1" class="inputtext" id="set_22" placeholder="No2"></div>
  
  
  <div class="top-right-profile">
  <input type="text" alt="text-1" class="inputtext" id="set_33" placeholder="No3"></div>

  <div class="bottom-right-sub-profile">
  <input type="text" alt="text-1" class="inputtext" id="set_55" placeholder="No5"></div>

  
   </div>  
   
   
   
   
 <div id="double_crimp">
     

  <div class="top-left-doble-four">
 <input type="text" alt="text-1" class="inputtext" id="set_444" placeholder="No5">
  </div>
   
  <div class="top-left-doble-one">
  <input type="text" alt="text-1" class="inputtext" id="set_111" placeholder="No1"></div>
  
    <div class="top-left-doble-two">
  <input type="text" alt="text-1" class="inputtext" id="set_222" placeholder="No2"></div>
  
  
  <div class="top-left-doble-three">
  <input type="text" alt="text-1" class="inputtext" id="set_333" placeholder="No3"></div>

  <div class="top-left-doble-five">
  <input type="text" alt="text-1" class="inputtext" id="set_555" placeholder="No6"></div>


    <div class="top-left-doble-six">
  <input type="text" alt="text-1" class="inputtext" id="set_666" placeholder="No7"></div>

  <div class="top-left-doble-seven">
  <input type="text" alt="text-1" class="inputtext" id="set_777" placeholder="No4"></div>

  
   </div>  
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   <div id="reverse_crimp">
     


  
  <div class="top-left-doble-two-reverse">
  <input type="text" alt="text-1" class="inputtext" id="set_r_222" placeholder="No1">
  </div>
  
  
  <div class="top-left-doble-three-reverse">
  <input type="text" alt="text-1" class="inputtext" id="set_r_333" placeholder="No2"></div>

  <div class="top-left-doble-five-reverse">
  <input type="text" alt="text-1" class="inputtext" id="set_r_555" placeholder="No3"></div>


    <div class="top-left-doble-six-reverse">
  <input type="text" alt="text-1" class="inputtext" id="set_r_666" placeholder="No5"></div>

  <div class="top-left-doble-seven-reverse">
  <input type="text" alt="text-1" class="inputtext" id="set_r_777" placeholder="No4">
  </div>

  
   </div>  
   
   
   
   
   <div id="spacial_crimp">
     


   <div class="top-left-doble-one-special">
  <input type="text" alt="text-1" class="inputtext" id="set_rs_666" placeholder="No6"></div>
 
  <div class="top-left-doble-two-special">
  <input type="text" alt="text-1" class="inputtext" id="set_rs_222" placeholder="No1">
  </div>
  
  
  <div class="top-left-doble-three-special">
  <input type="text" alt="text-1" class="inputtext" id="set_rs_333" placeholder="No2"></div>

   <div class="top-left-doble-four-special">
  <input type="text" alt="text-1" class="inputtext" id="set_rs_666" placeholder="No7"></div>
 

  <div class="top-left-doble-five-special">
  <input type="text" alt="text-1" class="inputtext" id="set_rs_555" placeholder="No3"></div>


    <div class="top-left-doble-six-special">
  <input type="text" alt="text-1" class="inputtext" id="set_rs_666" placeholder="No5"></div>

  <div class="top-left-doble-seven-special">
  <input type="text" alt="text-1" class="inputtext" id="set_rs_777" placeholder="No4">
  
  </div>

  
   </div>  
   
   
   
   
   
   
  
  
  
</div> 
                                                                
                                                                
                                                                
                                                                
                                                            </div>
                                                            
                                                            <div class="modal-footer">
                                                                 
                                                               <div class="col-md-12" >
                                                                    <button type="button" class="btn btn-light" style="float: right;" ng-click="backToclick()">Back</button>
                                                                    <button type="button" class="btn btn-light" style="float: right;" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" id="saveImagesizeinputimage" ng-click="saveImagesizeinputimage()" style="float: right;" class="btn btn-success">Save Image</button>
                                                               </div>
                                                        </div>
                                                            
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



  <!-- Modal End-->
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <!-- Modal Draw Image-->
<div class="modal fade bs-example-modal-md-arch"  id="imagesizelength" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" >Image Length</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body" id="inputtext_container">
                                                                
                                                                
                                                                
                                                               
                                                                                <div class="col-md-12 mt-4">
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                       <div  class="row showhide">
                                                                                   
                                                                                    
                                                                                       <div class="col-md-6" style="display:none;">
                                                                                        <lable class="card-title mt-3">Enter Length</lable>
                                                                                  
                                                                                       <input type="text" class="form-control"  id="enterlengthval" ng-blur="sizedefindbylayoutInputlength()"  placeholder="Enter Length">
                                                                            
                                                                                      
                                                                                       </div>
                                                                                       
                                                                                       
                                                                                        <div class="col-md-6" style="display:none;">
                                                                                        <lable class="card-title">Base No</lable>
                                                                                  
                                                                                   


                                                                                              <select class="form-control form-select"  ng-change="sizedefindbylayoutInputbaseno()" ng-model="base_id_set"  name="enthernobase" id="enthernobase" >
                                                                                                                
                                                                                                                
                                                                                                                <option value="0">Select base</option>
                                                                                                                <option ng-repeat="nameBasesize in fetchDataBaseSizeDATA" value="{{nameBasesize.id}}">{{nameBasesize.name}} - {{nameBasesize.values}}</option>
                                                                                           
                                                                                             </select>
                                                                                      
                                                                                       </div>
                                                                                       
                                                                                       </div>
                                                                                       
                                                                                       
                                                                                       
                                                                                       
                                                                                          <table class="table">
                                                                                              <tr ng-repeat="nameoptioninput in namesDataoptons">
                                                                                                  <td>
                                                                                                       <span ng-if="nameoptioninput.checkstatus==1">
                                                                                                           
                                                                                                                  <input type="radio" class="label_option_id" ng-click="getLenthandno(nameoptioninput.calculation,nameoptioninput.id)" checked name="idset" value="{{nameoptioninput.id}}" >
                                                                                             </span>
                                                                                            
                                                                                              <span ng-if="nameoptioninput.checkstatus==0">
                                                                                                           
                                                                                                                  <input type="radio" class="label_option_id" ng-click="getLenthandno(nameoptioninput.calculation,nameoptioninput.id)" name="idset" value="{{nameoptioninput.id}}" >
                                                                                             </span>
                                                                                                  </td>
                                                                                                  <td>
                                                                                                      <b class="baseProfile" >{{nameoptioninput.profilevalsize}}</b>
                                                                                                  </td>
                                                                                                  
                                                                                                  <td>
                                                                                                      /
                                                                                                  </td>
                                                                                                  
                                                                                                  <td>
                                                                                                      <b>{{nameoptioninput.id}}</b>
                                                                                         <input type="hidden" name="base_id" id="base_id" value="{{nameoptioninput.base_id}}">
                                                                                                  </td>
                                                                                                  
                                                                                                  <td>
                                                                                                      =
                                                                                                  </td>
                                                                                                  
                                                                                                  <td>
                                                                                                       <b>{{nameoptioninput.calculation}}</b>
                                                                                                  </td>
                                                                                                  
                                                                                              </tr>
                                                                                              
                                                                                          </table>
                                                                                         
                                                                                    
                                                                                       
                                                                                       
                                                                                       
                                                                                       
                                                                                        
                                                                                       <div ng-init="fetchDatasizebase()" class="row" style="display:none;">
                                                                                   
                                                                                    
                                                                                       <div class="col-md-6">
                                                                                        <lable class="card-title mt-3">Length</lable>
                                                                                  
                                                                                       <input type="text" class="form-control"  id="lengthval" ng-keyup="saveLength()" placeholder="Length">
                                                                            
                                                                                      
                                                                                       </div>
                                                                                       
                                                                                       
                                                                                        <div class="col-md-6">
                                                                                        <lable class="card-title">Nos</lable>
                                                                                  
                                                                                       <input type="text" class="form-control"  id="nobase" ng-keyup="saveNo()" placeholder="Nos">
                                                                            
                                                                                      
                                                                                       </div>
                                                                                
                                                                                
                                                                                      
                                                                                  
                                                                                                </div>
                                                                                        
                                                                                    </div>
                                                                                     
                                                                             
                                                                                
                                                                
                                                                
                                                                
                                                            </div>
                                                            
                                                            <div class="modal-footer">
                                                                 
                                                               <div class="col-md-12" >
                                                                   
                                                                    <button type="button" class="btn btn-light" style="float: right;" data-bs-dismiss="modal">Close</button>
                                                                   
                                                               </div>
                                                        </div>
                                                            
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



  <!-- Modal End-->
  




  <!-- Modal End Arch-->























































 <!-- Modal Draw Image-->
<div class="modal fade bs-example-modal-xl-seq" id="imagesizemodel-sqg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" >{{produttitleview}} - Similar Price List</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body" ng-init="fetchDatasimilerproduct('1','1100000')">
                                                                
                                                                      <table id="datatable1" class="table table-bordered dt-responsive  nowrap w-100" >
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                         <thead class="bg-gray text-red" ng-if="categories_idview==1">
                                         
                                         
                                        
                                          <tr>
                                              
                                             <th class="table-width-3" rowspan="2">&nbsp;&nbsp;&nbsp;S.No&nbsp;&nbsp;&nbsp;</th>
                                            
                                             <th class="table-width-6"  data-priority="3" >Length</th>
                                             <th class="table-width-6"  data-priority="3" >Nos </th>
                                             <th class="table-width-10" data-priority="6" rowspan="2">Rate </th>
                                            
                                             <th class="table-width-10" data-priority="6" rowspan="2" >QTY  <small>{{defaultvalue}}</small> </th>
                                             <th class="table-width-10" data-priority="6" rowspan="2" >Amount </th>
                                            
                                          </tr>
                                          
                                         
                                          
                                       </thead>
                                       
                                       
                                       
                                        <thead class="bg-gray text-red" ng-if="categories_idview!=1">
                                         
                                       
                                         
                                          <tr>
                                             <th class="table-width-3" rowspan="2">&nbsp;&nbsp;&nbsp;S.No&nbsp;&nbsp;&nbsp;</th>
                                            
                                             <th class="table-width-6" data-priority="3" >Profile </th>
                                             <th class="table-width-6" data-priority="1" >Crimp </th>
                                             <th class="table-width-6" data-priority="3" rowspan="2" >Nos </th>
                                             <th class="table-width-6" data-priority="6"  rowspan="2" >Fact</th>
                                             <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("rate_tab")' ng-class='sortClass("rate_tab")'>Rate <i class="fa fa-sort" aria-hidden="true"></i></th>
                                        
                                             <th class="table-width-10" data-priority="6" rowspan="2" >QTY  <small>{{defaultvalue}}</small> </th>
                                             <th class="table-width-10" data-priority="6" rowspan="2" >Amount </th>
                                            
                                          </tr>
                                          
                                        
                                                  
                                                     
                                                       
                                          </tr>
                                          
                                          
                                       </thead>
                                       
                                       
                                       
                                       <tbody  ng-repeat="nameview in namesDatasimile" ng-if="categories_idview==1">
                                           
                                           
                                           

                                          <tr  class="view" >
                                             <th>{{nameview.no}}</th>
                                             <td>{{nameview.profile_tab}}</td>
                                             <td>{{nameview.nos_tab}}</td>
                                             <td>{{nameview.rate_tab}}</td>
                                             <td >{{nameview.qty_tab}}</td>
                                             <td >{{nameview.amount_tab}}</td>
  
                                          </tr>
                                        
                                       

                                          
                                          
                                       </tbody>
                                      










<tbody  ng-repeat="nameview in namesDatasimile" ng-if="categories_idview!=1">

                                           
                                           
                                           

                                          <tr  class="view" >
                                             <th>{{nameview.no}}</th>
                                            
                                           
                                             <td>{{nameview.profile_tab}}</td>
                                             <td>{{nameview.crimp_tab}}</td>
                                             <td>{{nameview.nos_tab}}</td>
                                             <td>{{nameview.fact_tab}}</td>
                                             <td>{{nameview.rate_tab}} </td>
                                             <td >{{nameview.qty_tab}} </td>
                                             <td >{{nameview.amount_tab}}</td>
                                            
                                          </tr>
                                        
                                     
                                          
                                          
                                          
                                       </tbody>
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                      </table>
                                       
                                
                                                                
                                                              
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->













  <!-- Modal Draw Image-->
<div class="modal fade bs-example-modal-center"  id="imagesizemodel1" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" >Choose Image <small>(multiple)</small></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body" style="height: 500px;overflow: auto;">
                                                                
                                                                <form  ng-submit="imageuploadInproduct()" method="post" id="productupload" style="display:none;">
                                                                  <div class="row" style="margin-bottom: 10px;">
                                                                    <div class="col-md-4" >
                                                                        <label>If New Image Upload Select Plan</label>
                                                                        <select class="form-control" name="layout_plan" id="layout_plan">
                                                                            
                                                                            <option value="0">Select Layout Plan</option>
                                                                            <?php
                                                                            foreach($layout_plan as $val)
                                                                            {
                                                                                ?>
                                                                                
                                                                                 <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?> | (<?php echo $val->values; ?>)</option>
                                                                                <?php
                                                                            }
                                                                            
                                                                            ?>
                                                                            
                                                                        </select>
                                                                        
                                                                        </div>
                                                                        
                                                                   <div class="col-md-2" ><label>&nbsp;</label><input type="text" class="form-control " id="lengthvalset" placeholder="length"></div>
                                                                     
                                                                   <div class="col-md-4"><label>&nbsp;</label><input type="file" file-input="files" multiple class="form-control"></div>
                                                                   <div class="col-md-2"><label><br></label><button  style="margin: 27px 0px;" class="btn btn-success" id="uploadbutton">Upload</button></div>
                                                                   
                                                                   
                                                                   
                                                                   
                                                                   </div>
                                                                </form>
                                                                
                                                                 
                                                         
                                                            <div class="row" ng-init="imgpreviewimages()">
                                                                
                                                                
                                                                <div class="col-md-6" ng-repeat="nameimage in namesDataoptonsimages">
                                                                     <!--<button type="button"  ng-click="deleteDataimage(nameimage.id)" class="btn btn-outline-danger buttonright"><i class="mdi mdi-delete menu-icon"></i></button>-->
                                                                    <label> <input type="radio" name="imageid" class="imageid" value="{{nameimage.id}}" >
                                                                    <img class="border-set" alt="200x200" style="width:100%;border: #959595 solid 2px;padding: 20px" ng-click="sizedefindbylayout(nameimage.image_layout_plan,nameimage.id,nameimage.length,nameimage.valuseset)"  id="select_image_{{nameimage.id}}"  src="{{nameimage.product_image}}" data-holder-rendered="true">
                                                                    </label>
                                                                    <p>{{nameimage.valuseset}}</p>
                                                                    </div><!-- end col -->
                                                                
                                                                     <span ng-show="namesDataoptonsimages.length==0">
                                                                     No Image Found 
                                                               </span>
                                                                
                                                               
                                                            </div>
                                                            
                                                                                   
                                                                
                                                                
                                                                
                                                                
                                                            </div>
                                                            
                                                            <div class="modal-footer">
                                                                
                                                                  
                                                               
                                                                
                                                                
                                                               <div class="col-md-12" >
                                                                   <div class="row">
                                                                    <div class="col-md-3"></div>
                                                                    <div class="col-md-4">
                                                                        <span id="productupdate2" style="display:none;">
                                                                          <select class="form-control" name="layout_plan1" id="layout_plan1" >
                                                                            
                                                                            <option value="0">Select Base Name</option>
                                                                            <?php
                                                                            foreach($layout_plan as $val)
                                                                            {
                                                                                ?>
                                                                                
                                                                                 <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                                                                                <?php
                                                                            }
                                                                            
                                                                            ?>
                                                                            
                                                                        </select>
                                                                        </span>
                                                                        
                                                                    </div>
                                                                    <div class="col-md-3" >
                                                                        <span id="productupdate" style="display:none;">
                                                                        <input type="text" ng-blur="imageuploadInproductupdate()" class="form-control " id="lengthvalset1" placeholder="length">
                                                                         <input  type="hidden" id="image_plan_id">
                                                                         </span>
                                                                    </div>
                                                                   <div class="col-md-2">
                                                                    <button type="button" class="btn btn-light" style="float: right;" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" ng-click="imgchoose()" style="float: right;" class="btn btn-success">Select Image</button>
                                                                    </div>
                                                                    </div>
                                                               </div>
                                                        </div>
                                                            
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



  <!-- Modal End-->




















 <!-- Modal Draw Image-->
<div class="modal fade bs-example-modal-xl-seq" id="imagesizemodel-delivery-setup" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" >Order Confirmation</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                  <div class="card-body" ng-init="fetchCustomerdetails()">

                                            <div id="progrss-wizard" class="twitter-bs-wizard">
                                                <ul class="twitter-bs-wizard-nav nav nav-pills nav-justified">
                                                    <li class="nav-item">
                                                        <a href="#progress-seller-details" class="nav-link" data-toggle="tab">
                                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Seller Details">
                                                                <i class="bx bx-list-ul"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#progress-company-document" class="nav-link" data-toggle="tab">
                                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Company Document">
                                                                <i class="bx bx-book-bookmark"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    
                                                    
                                                    <!-- <li class="nav-item" style="display:none;">-->
                                                    <!--    <a href="#return-process-detail" class="nav-link" data-toggle="tab">-->
                                                    <!--        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Return Details">-->
                                                    <!--            <i class="fas fa-exchange-alt"></i>-->
                                                    <!--        </div>-->
                                                    <!--    </a>-->
                                                    <!--</li>-->
                                                    
                                                    
                                                    <li class="nav-item">
                                                        <a href="#progress-bank-detail" class="nav-link" data-toggle="tab">
                                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Bank Details">
                                                                <i class="bx bxs-bank"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    
                                                    
                                                </ul>
                                                <!-- wizard-nav -->

                                                <div id="bar" class="progress mt-4">
                                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                                                </div>
                                                <div class="tab-content twitter-bs-wizard-tab-content">
                                                    <div class="tab-pane" id="progress-seller-details">
                                                
                                                
                                                
                                               
                                                        
                                                        
                                                         <div class="text-start mb-2">
                                                           
                                                            <div class="ticket-inner">
                                                               
                                                               
                                                               <div class="accordion accordion-flush" id="accordionFlushExample" >
                                                                    <div class="accordion-item">
                                                                        <h5 class="accordion-header" > Delivery Mode </h5>
                                                                        
                                                                        
                                                                        <br>
                                                                        
                                                                 <div class="row">
                                                                     
                                                                        
                                                               <div class="col-md-4">
                                                                    <label>Date & Time in delivery <span ng-if="delivery_date_time">({{delivery_date_time}})</span></label>
                                                           <input class="form-control" type="datetime-local" id="delivery_date_time" <?php echo $disabled;  ?>>
                                                           
                                                               </div>         
                                                              <div class="col-md-3">
                                                                  
                                           
                                                        <span ng-if="SSD_check==0" style="display: flex;">
                                                            
                                                           <label class="form-check-label" for="formrow-ssd-val">SDP &nbsp;&nbsp;</label>
                                                           <input type="checkbox" class="form-check-input" ng-click="checkValSSD()" <?php echo $disabled;  ?> name="ssdmark"  value="0" id="formrow-ssd-val"> 
                                                           
                                                        </span>
                                                        
                                                         <span ng-if="SSD_check==1" style="display: flex;">
                                                         
                                                           <label class="form-check-label" for="formrow-ssd-val">SDP &nbsp;&nbsp;  <input type="checkbox" <?php echo $disabled;  ?> class="form-check-input" ng-click="checkValSSD()" name="ssdmark" checked  value="1" id="formrow-ssd-val"> 
                                                          </label>
                                                           
                                                        </span>  
                                                          
                                                           </div>  
                                                           </div>
                                                           
                                                           <br>
                                                           <br>


                                                                        
                                                                       
                                                                         <select class="form-control col-md-4" id="delivery_mode" <?php echo $disabled;  ?>>
                                                                             
                                                                                <?php
                                    
                                                                                if($this->session->userdata['logged_in']['access']=='20')
                                                                                {
                                                                                                        
                                                                                ?> 
                                                                             
                                                                                 <option value="Self Pickup">Self Pickup</option>
                                                                                 
                                                                                <?php
                                                                                }
                                                                                else
                                                                                {
                                                                                    ?>
                                                                                    
                                                                                     <option value="full" selected >Full</option>
                                                                                     <option value="Partial/Spilt">Partial / Spilt</option>
                                                                                    
                                                                                    <?php
                                                                                }
                                                                        
                                                                                ?>
                                                                         </select>
                                                                        
                                                                       
                                                                        <br>
                                                                            
                                                                             
                                                                            
                                                                       
                                                                        <div id="flush-collapseOne" >
                                                                            <div class="accordion-body p-1 text-muted">
                                                                                
                                                                                <div class="talbe-productList">
                                                                                          
                                                                                          <div class="table-responsive" style="height: 270px;overflow: auto;">
                                                                                            <table class="table mb-0" ng-init="fetchDataget()">
                                                    
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                    <!--<th>#</th>-->
                                                                                                    <th style="width:20px;">S_No</th>
                                                                                                    <th style="width:200px;">Item_Name</th>
                                                                                                   
                                                                                                    
                                                                                                    <th >Basic_Price (INR)</th>
                                                                                                    <th >Quantity</th>
                                                                                                    <th class="paricel" style="display:none;">Modify QTY</th>
                                                                                                    <th >Amount</th>
                                                                                                    
                                                                                                    
                                                                                                    <th class="paricel" style="display:none;">Choose Address <a id="openaddress" title="Add Address" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSpec-address" aria-controls="offcanvasSpec-address" href="#"><i class="fa fa-plus"></i></a></th>
                                                                                                    <th class="paricel" style="display:none;">Choose Product</th>
                                                                                                    <th style="display:none;"></th>
                                                                                                    
                                                                                                   </tr>
                                                                                                </thead>
                                                                                                <tbody >
                                                                                                 <tr ng-repeat="name in namesDatadel|orderBy:column:reverse">
                                                                                                     
                                                                                                     
                                                                                                     <!--<td ><input type="checkbox" value="{{name.id}}" class="spilt"></td>-->
                                                                                                    <td >{{name.no}}</td>
                                                                                                    <td>
                                                                                                        <div class="item-desc-1">
                                                                                                            <span>{{name.product_name_tab}}</span>
                                                                                                            <small>{{name.description}}</small>
                                                                                                            
                                                                                                        </div>
                                                                                                    </td>
                                                                                                   
                                                                                                   
                                                                                                    <td id="modify_rate_{{name.id}}">{{name.rate_tab}}</td>
                                                                                                    
                                                                                                    
                                                                                                    <td >{{name.qty_tab}} <small ng-if="approx_id==1">(approx.)</small></td>
                                                                                                       
                                                                                                       
                                                                                                    
                                                                                                    <td class="paricel"  ng-if="paricel_mode_del==1">
                                                                                                        
                                                                                                        
                                                                                                           
                                                                                                           <input type="number" ng-blur="inputmodeifiy_qty(name.id,'modify_qty')"  max="{{name.modify_qty}}" id="modify_qty_{{name.id}}" style="width:50%" value="0">
                                                                                                          
                                                                                                           <span style="color:red;">{{name.modify_qty_data}}</span>
                                                                                                    
                                                                                                    </td>
                                                                                                    
                                                                                                    
                                                                                                    <td class="paricel" style="display:none;" ng-if="paricel_mode_del==0">
                                                                                                        
                                                                                                        
                                                                                                           
                                                                                                           <input typed="text" ng-blur="inputmodeifiy_qty(name.id,'modify_qty')" id="modify_qty_{{name.id}}" style="width:50%" value="{{name.modify_qty}}">
                                                                                                          
                                                                                                         
                                                                                                    
                                                                                                    </td>
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    <td id="modify_amount_{{name.id}}">Rs. {{name.amount_tab}}</td>
                                                                                                    
                                                                                                    
                                                                                                     <td class="paricel"  ng-if="paricel_mode_del==1">
                                                                                                         
                                                                                                         <select class="form-control address_set"  style="width: 150px;" >
                                                                                                                 
                                                                                                                 <option value="0" data-value="0" data-id="{{name.id}}">Select Address</option>
                                                                                                                 <option  ng-repeat="names in namesDataaddress" ng-selected="{{names.id == name.address_id}}"  data-value="{{names.id}}"  data-id="{{name.id}}"  >{{names.name}} {{names.address}}</option>
                                                                                                                 
                                                                                                            </select>
                                                                        
                                                                                                      </td>
                                                                                                  
                                                                                                  
                                                                                                  <td class="paricel" style="display:none;" ng-if="paricel_mode_del==0">
                                                                                                         
                                                                                                         <select class="form-control address_set"  style="width: 150px;" >
                                                                                                                 
                                                                                                                 <option value="0" data-value="0" data-id="{{name.id}}">Select Address</option>
                                                                                                                 <option  ng-repeat="names in namesDataaddress"  data-value="{{names.id}}"  data-id="{{name.id}}"  >{{names.address}}</option>
                                                                                                                 
                                                                                                            </select>
                                                                        
                                                                                                      </td>
                                                                                                      
                                                                                                      
                                                                                                 <td class="paricel" style="text-align: center;padding: 10px;" ng-if="paricel_mode_del==1">
                                                                                                       
                                                                                                       <span ng-if="name.paricel_mode==1">
                                                                                                           <lable for="ssp">Spilt</lable>
                                                                                                            <input type="checkbox" checked value="{{name.id}}" id="ssp" class="spiltparicel">
                                                                                                       </span>
                                                                                                       
                                                                                                       
                                                                                                        <span ng-if="name.paricel_mode==0">
                                                                                                              <lable for="ssp">Spilt</lable>
                                                                                                            <input type="checkbox" value="{{name.id}}" id="ssp" class="spiltparicel">
                                                                                                       </span>
                                                                                                    
                                                                                                     
                                                                                                     
                                                                                                     </td>
                                                                                                  
                                                                                                 <td class="paricel" style="display:none;text-align: center;padding: 10px;" ng-if="paricel_mode_del==0"><lable for="ssp">Spilt</lable> <input type="checkbox" id="ssp" value="{{name.id}}" class="spiltparicel"></td>
                                                                                               
                                                                                               
                                                                                               
                                                                                                  <td ng-if="name.categories_id==1 || name.categories_id==15" style="display:none;">
                                                                                                       
                                                                                                     
                                                                                                       <span ng-if="name.loadstatus_by_cate==0">
                                                                                                            
                                                                                                            <label for="set_id{{name.id}}"><input type="checkbox" checked value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Load</span></label>
                                                                                                         
                                                                                                         </span>
                                                                                                        
                                                                                                         <span ng-if="name.loadstatus_by_cate==1">
                                                                                                            
                                                                                                            <label for="set_id{{name.id}}"><input type="checkbox"  value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Load</span></label>
                                                                                                         
                                                                                                         </span>
                                                                                                       
                                                                                                     
                                                                                                  </td>
                                                                                               
                                                                                               
                                                                                                </tr>
                                                                                                
                                                                                                <tr>
                                                                                                    <td class="paricel" style="display:none;"></td>
                                                                                                      
                                                                                                    <td colspan="4" class="text-end">SubTotal</td>
                                                                                                    <td class="text-right">Rs. {{fulltotal}} </td>
                                                                                                      <td class="paricel" style="display:none;"></td>
                                                                                                        <td class="paricel" style="display:none;"></td>
                                                                                                   
                                                                                                </tr>
                                                                                                
                                                                                                
                                                                                                <tr ng-if="minisroundoff>0">
                                                                                                    <td class="paricel" style="display:none;"></td>
                                                                                                      
                                                                                                    <td colspan="4" class="text-end">RoundOff : </td>
                                                                                                    <td class="text-right">Rs. ({{roundoff_val}}) {{minisroundoff}} </td>
                                                                                                      <td class="paricel" style="display:none;"></td>
                                                                                                        <td class="paricel" style="display:none;"></td>
                                                                                                   
                                                                                                </tr>
                                                                                               
                                                                                                
                                                                                                
                                                                                                
                                                                                                <tr>
                                                                                                    <td class="paricel" style="display:none;"></td>
                                                                                                    
                                                                                                    <td colspan="4" class="text-end">Discount</td>
                                                                                                    <td class="text-right">Rs. {{discounttotaldel}} </td>
                                                                                                    <td class="paricel" style="display:none;"></td>
                                                                                                    <td class="paricel" style="display:none;"></td>
                                                                                                    
                                                                                                </tr>
                                                                                                
                                                                                                 <tr ng-if="tcsamount>0">
                                                                                                    <td class="paricel" style="display:none;"></td>
                                                                                                    
                                                                                                    <td colspan="4" class="text-end">TCS (+)</td>
                                                                                                    <td class="text-right">Rs. {{tcsamount}} </td>
                                                                                                    <td class="paricel" style="display:none;"></td>
                                                                                                    <td class="paricel" style="display:none;"></td>
                                                                                                    
                                                                                                </tr>
                                                                                                
                                                                                                
                                                                                                 <tr ng-if="roundoffstatusval_data">
                                                                                                    <td class="paricel" style="display:none;"></td>
                                                                                                      
                                                                                                    <td colspan="4" class="text-end">Round : </td>
                                                                                                    <td class="text-right">Rs. ({{roundoffstatusval_data}}) </td>
                                                                                                    <td class="paricel" style="display:none;"></td>
                                                                                                     <td class="paricel" style="display:none;"></td>
                                                                                                   
                                                                                                </tr>
                                                                                                
                                                                                                
                                                                                                <tr>
                                                                                                    
                                                                                                      <td class="paricel" style="display:none;"></td>
                                                                                                    <td colspan="4" class="text-end fw-bold">Net Total</td>
                                                                                                    <td class="text-right fw-bold">Rs. {{discountfulltotaldel}} </td>
                                                                                                     <td class="paricel" style="display:none;"></td>
                                                                                                     <td class="paricel" style="display:none;"></td>
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
                                                        
                                                        
                                                        
                                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            <li class="next"><a href="javascript: void(0);" class="btn btn-primary" ng-click="markDeliveryaddress()" onclick="nextTab()">Next <i
                                                                        class="bx bx-chevron-right ms-1"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane" id="progress-company-document">
                                                      <div>
                                                       
                                                        
                                                         <div class="text-start mb-4">
                                                          
                                                            <div class="ticket-inner">
                                                                 <?php
                                                                    $displn="";
                                                                    if($this->session->userdata['logged_in']['access']=='20')
                                                                    {
                                                                        $displn="d-none";
                                                                    }
                                                                                
                                                                    ?> 
                                                                
                                                                
                                                                <div class="row <?php echo $displn; ?>">
                                                                   
                                                                    <div class="col-md-3">
                                                                        <div class="mt-4 mt-md-0">
                                                                            <h5 class="font-size-14 mb-3"><i class="mdi mdi-arrow-right text-primary me-1"></i>Delivery Scope</h5>
                                                                            
                                                                            <div>
                                                                                <div class="form-check form-check mb-3">
                                                                                    <input class="form-check-input" type="radio" value="2" name="formRadios" id="formRadiosRight1" >
                                                                                    <label class="form-check-label" for="formRadiosRight1">
                                                                                       Own Scope
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                        
                                                                        </div>
                                                                    </div>
                                                                    
                                                                     <div class="col-md-3">
                                                                        <div>
                                                                            <h5 class="font-size-14 mb-3">&nbsp;&nbsp;</h5>
                                                                            <div class="form-check mb-3">
                                                                                <input class="form-check-input" type="radio" value="1" name="formRadios"  id="formRadios1">
                                                                                <label class="form-check-label" for="formRadios1">
                                                                                     Clinet Scope
                                                                                </label>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                             </div>
                                                                    <div class="row">
                                                                    <div class="col-md-6 <?php echo $displn; ?>">
                                                                        <div>
                                                                            <h5 class="font-size-14 mb-3"><i class="mdi mdi-arrow-right text-primary me-1"></i>Delivery charge</h5>
                                                                            <div class="form-check mb-3">
                                                                                <input class="form-control" type="number" value="{{delivery_charge}}" <?php echo $disabled;  ?> id="delivery_charge" name="delivery_charge">
                                                                              
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div>
                                                                            <h5 class="font-size-14 mb-3"><i class="mdi mdi-arrow-right text-primary me-1"></i>Payment mode <span style="color:red;">*</span></h5>
                                                                            <div class="form-check mb-3">
                                                                            <select class="form-select" id="cashmode" <?php echo $disabled;  ?>>
                                                                            <option value="">Select Mode</option>
                                                                            <option  value="Cash">Cash</option>
                                                                            <option  value="Cheque">Cheque</option>
                                                                            <option  value="Bank Transfer">Bank Transfer / Online</option>
                                                                            <option  value="No Collection">No Collection</option>
                                                                        </select>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <?php
                                    
                                                                    if($this->session->userdata['logged_in']['access']=='20')
                                                                    {
                                                                                                    
                                                                    ?>  
                                                                    
                                                                    

                                                         <div class="col-lg-12" id="dinomainitionview" style="display:none">        
                                                                
                                                                 <table  class="table">
                          <tr><td><b>Denomination</b></td></tr>
                            
                            
                            
                           <tr><td>1 * </td><td><input type="number"  style="width: 80px;" id="1_rs"></td><td><input type="number"      readonly style="width: 80px;border: none;" id="1_total"></td></tr>
                           <tr><td>2 * </td><td><input type="number"  style="width: 80px;" id="2_rs"></td><td><input type="number"      readonly style="width: 80px;border: none;" id="2_total"></td></tr>
                           <tr><td>5 * </td><td><input type="number"  style="width: 80px;" id="5_rs"></td><td><input type="number"      readonly style="width: 80px;border: none;" id="5_total"></td></tr>
                           
                            
                           <tr><td>10 * </td><td><input type="number"  style="width: 80px;" id="10_rs"></td><td><input type="number"      readonly style="width: 80px;border: none;" id="10_total"></td></tr>
                           <tr><td>20 * </td><td><input type="number"  style="width: 80px;" id="20_rs"></td><td><input type="number"      readonly style="width: 80px;border: none;" id="20_total"></td></tr>
                           
                           <tr><td>50 * </td><td><input type="number"  style="width: 80px;" id="50_rs"></td><td><input type="number"      readonly style="width: 80px;border: none;" id="50_total"></td></tr>
                           <tr><td>100 *</td><td> <input type="number"  style="width: 80px;" id="100_rs"></td><td><input type="number"    readonly style="width: 80px;border: none;" id="100_total"></td></tr>
                           <tr><td>200 * </td><td><input type="number"  style="width: 80px;" id="200_rs"></td><td><input type="number"    readonly style="width: 80px;border: none;" id="200_total"></td></tr>
                           <tr><td>500 * </td><td><input type="number"  style="width: 80px;" id="500_rs"></td><td><input type="number"    readonly style="width: 80px;border: none;" id="500_total"></td></tr>
                           <tr><td>2000 * </td><td><input type="number"  style="width: 80px;" id="2000_rs"></td><td><input type="number"  readonly style="width: 80px;border: none;" id="2000_total"></td></tr>
                           
                           
                           
                             <tr><td>Total Amount </td><td><span  ><input type="number" id="fulltotal" data-value="{{discountfulltotaldel}}"  readonly style="width: 80px;border: none;"></span></td><td></td></tr>
                          
                          
                          <tr style="color: red;font-weight: 800;"><td>Balance Amount :</td> <td><span id="bal"></span></td><td></td></tr>
                          
                          <tr id="accessshow" style="display:none;"><td><label for="set1"><input type="radio" class="selectcollection" name="selectcollection" id="set1" value="1"> Return the excess :</label></td> <td><input type="number" readonly style="width: 80px;" value="0" id="return_excess" ></td><td></td></tr>
                          <tr id="accessshow1" style="display:none;"><td><label for="set2"><input type="radio" class="selectcollection" name="selectcollection" checked id="set2" value="2"> Collect the excess :</label></td> <td><input type="number" readonly style="width: 80px;" value="0" id="return_excess1" ></td><td></td></tr>
                          
                      </table>
                      
                      </div>
                                                                    
                                                                    
                                                                    <?php
                                                                    }
                                                                    
                                                                    ?>
                                                                    
                                                                   
                                                                   
                                                             </div>
                                                             
                                                            
                                                              
                                                                
                                                              
                                                            </div>
                                                            
                                                        </div>
                                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i
                                                                        class="bx bx-chevron-left me-1"></i> Previous</a></li>
                                                            <li class="next"><a href="javascript: void(0);" class="btn btn-primary" ng-click="deliveryChareg()" onclick="nextTab()">Next <i
                                                                        class="bx bx-chevron-right ms-1"></i></a></li>
                                                        </ul>
                                                      </div>
                                                    </div>
                                                    
                                                    
                             <!--                       <div class="tab-pane" id="return-process-detail" style="display:none;">-->
                             <!--                         <div>-->
                                                       
                                                        
                             <!--                            <div class="text-start mb-4">-->
                                                          
                             <!--                               <div class="ticket-inner">-->
                                                                
                             <!--                                   <h5>If Any Return Products</h5>-->
                                                                
                                                                
                                                                
                             <!--                                   <div class="row">-->
                             <!--                                       <div class="col-md-3">-->
                                                                     
                                                                            
                             <!--                                               <div class="form-check mb-3">-->
                             <!--                                                   <input class="form-check-input" type="radio" value="1" name="orderbase" checked id="exieingorder">-->
                             <!--                                                   <label class="form-check-label" for="exieingorder">-->
                             <!--                                                       Previous order-->
                             <!--                                                   </label>-->
                             <!--                                               </div>-->
                                                                            
                                                                        
                             <!--                                       </div>-->
                                                                    
                                                                    
                                                                    
                             <!--                                       <div class="col-md-3" id="showorderbase" style="display:none;">-->
                             <!--                                           <div class="mt-4 mt-md-0">-->
                                                                           
                                                                       
                             <!--                                                   <div class="form-check form-check mb-3">-->
                             <!--                                                       <input class="form-check-input" type="radio" value="2" name="orderbase" id="currentorder" >-->
                             <!--                                                       <label class="form-check-label" for="currentorder">-->
                             <!--                                                           Current Order-->
                             <!--                                                       </label>-->
                             <!--                                                   </div>-->
                                                                          
                        
                             <!--                                           </div>-->
                             <!--                                       </div>-->
                                                                    
                                                                    
                             <!--                                </div>-->
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                              
                             <!-- <ul class="tl" ng-init="fetchCustomerororderhistroy()"  id="exitinforderview" style="display:block;">-->
                                  
                                  
                             <!-- <li class="tl-item" ng-repeat="namesh in namesHistory">-->
                                 
                             <!--    <div class="item-title">Order No : <b>{{namesh.order_no}}</b></div>-->
                             <!--    <div class="item-detail">on {{namesh.create_date}} {{namesh.create_time}}</div>-->
                                 
                                 
                                 
                                 
                             <!--       <table class="table mb-0" >-->
                                                    
                             <!--                                                                   <thead>-->
                             <!--                                                                       <tr>-->
                             <!--                                                                       <th>#</th>-->
                             <!--                                                                       <th>S No</th>-->
                             <!--                                                                       <th>Item Item</th>-->
                             <!--                                                                       <th >Basic Price (INR)</th>-->
                             <!--                                                                       <th >Quantity</th>-->
                             <!--                                                                       <th >Amount</th>-->
                                                                                                    
                             <!--                                                                      </tr>-->
                             <!--                                                                   </thead>-->
                             <!--                                                                   <tbody ng-init="fetchCustomerororderhistroyorderlist()">-->
                             <!--                                                                    <tr ng-repeat="nameho in namesHistoryorder" ng-if="namesh.order_no==nameho.order_no">-->
                                                                                                     
                                                                                                     
                                                                                                     
                             <!--                                                                          <td>-->
                                                                                                           
                             <!--                                                                              <span ng-if="nameho.return_status==1">-->
                                                                                                               
                             <!--                                                                                   <input type="checkbox" checked value="{{nameho.id}}" class="returnid">-->
                                                                                                               
                             <!--                                                                              </span>-->
                                                                                                           
                             <!--                                                                              <span ng-if="nameho.return_status==0">-->
                                                                                                               
                             <!--                                                                                   <input type="checkbox"  value="{{nameho.id}}" class="returnid">-->
                                                                                                               
                             <!--                                                                              </span>-->
                                                                                                        
                                                                                                       
                                                                                                        
                             <!--                                                                           </td>-->
                                                                                                    
                                                                                                    
                             <!--                                                                       <td >{{nameho.no}}</td>-->
                             <!--                                                                       <td>{{nameho.product_name_tab}}-->
                             <!--                                                                       </td>-->
                                                                                                   
                                                                                                   
                             <!--                                                                       <td >{{nameho.rate_tab}}  </td>-->
                             <!--                                                                       <td >{{nameho.qty_tab}} </td>-->
                             <!--                                                                       <td >Rs. {{nameho.amount_tab}}</td>-->
                                                                                                    
                                                                                                   
                                                                                                
                             <!--                                                                   </tr>-->
                                                                                                
                                                                                              
                                                                                                
                             <!--                                                                   </tbody>-->
                             <!--                                                               </table> -->
                                 
                                 
                             <!--  </li>-->
                               
                             <!--  <li class="tl-item" ng-show="namesHistory.length==0">-->
                                   
                             <!--          <p class="text-muted pt-3">No Data Found</p>             -->
                                    
                             <!--   </li>-->
                                
                                
                                
                                 
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                               
                             <!--</ul>-->
                             
                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                       
                             <!--                     <div class="table-responsive" id="currentorderview" style="display:none;">-->
                                                      
                                                              
                             <!--                       <div class="item-title">Order No : <b>{{order_no_id}}</b></div>-->
                             <!--                       <div class="item-detail">on {{create_date}} {{create_time}}</div>-->
                                 
                             <!--                                                               <table class="table mb-0" ng-init="fetchData()">-->
                                                    
                             <!--                                                                   <thead>-->
                             <!--                                                                       <tr>-->
                             <!--                                                                       <th>#</th>-->
                             <!--                                                                       <th>S No</th>-->
                             <!--                                                                       <th>Item Item</th>-->
                                                                                                   
                                                                                                    
                             <!--                                                                       <th >Basic Price (INR)</th>-->
                             <!--                                                                       <th >Quantity</th>-->
                             <!--                                                                       <th >Amount</th>-->
                                                                                                    
                                                                                                    
                                                                                                  
                             <!--                                                                      </tr>-->
                             <!--                                                                   </thead>-->
                             <!--                                                                   <tbody ng-init="fetchSingleDatatotal()">-->
                             <!--                                                                    <tr ng-repeat="name in namesData|orderBy:column:reverse">-->
                                                                                                     
                                                                                                     
                             <!--                                                                        <td>-->
                                                                                                         
                             <!--                                                                              <span ng-if="name.return_status==1">-->
                                                                                                               
                             <!--                                                                                   <input type="checkbox" checked value="{{name.id}}" class="returnid">-->
                                                                                                               
                             <!--                                                                              </span>-->
                                                                                                           
                             <!--                                                                              <span ng-if="name.return_status==0">-->
                                                                                                               
                             <!--                                                                                   <input type="checkbox"  value="{{name.id}}" class="returnid">-->
                                                                                                               
                             <!--                                                                              </span>-->
                                                                                                        
                                                                                                       
                                                                                                         
                                                                                                         
                             <!--                                                                       </td>-->
                             <!--                                                                       <td >{{name.no}}</td>-->
                             <!--                                                                       <td>{{name.product_name_tab}} </td>-->
                                                                                                   
                                                                                                   
                                                                                                   
                             <!--                                                                       <td >{{name.rate_tab}}  </td>-->
                             <!--                                                                       <td >{{name.qty_tab}}</td>-->
                             <!--                                                                       <td >Rs. {{name.amount_tab}}</td>-->
                                                                                                     
                             <!--                                                                       </tr>-->
                                                                                                
                                                                                                
                             <!--                                                                   </tbody>-->
                             <!--                                                               </table>-->
                             <!--                                                           </div>           -->
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                              
                             <!--                               </div>-->
                                                            
                             <!--                           </div>-->
                             <!--                           <ul class="pager wizard twitter-bs-wizard-pager-link">-->
                             <!--                               <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i-->
                             <!--                                           class="bx bx-chevron-left me-1"></i> Previous</a></li>-->
                             <!--                               <li class="next"><a href="javascript: void(0);" class="btn btn-primary" ng-click='returnfinsh()'  onclick="nextTab()">Next <i-->
                             <!--                                           class="bx bx-chevron-right ms-1"></i></a></li>-->
                             <!--                           </ul>-->
                             <!--                         </div>-->
                             <!--                       </div>-->
                                                    
                                                    <div class="tab-pane" id="progress-bank-detail">
                                                        <div>
                                                             <div class="text-start mb-4">
                                                            <h5>Customer Details</h5>
                                                            
                                                            <div class="ticket-inner">
                                                               <div class="route">
                                                                  <p> <span>{{customernamefinal}}</span>
                                                                  <span>{{customerphonefinal}}</span>
                                                                  <span>Route: {{routenamefinal}}</span>
                                                                  <span>{{address}}</span></p>
                                                                  <p class="">
                                                                      
                                                                      <span class="font-size-12">{{orderno}}</span><a href="tel::{{customerphone}}"><span><i class="mdi-phone mdi font-size-20 me-1"></i> Call Customer</span></a> <b class="<?php echo $displn; ?>">{{delivery_status_name}}</b>
                                                                      
                                                                      
                                                                     <b ng-if="lengeth>0">Max Length : {{lengeth}}</b>
                                                                  
                                                                      
                                                                      </p>
                                                                 
                                                                 
                                                                  

                                                               
                                                               </div>
                                                               <div class="time">
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  <p  ng-repeat="invoice in fetchInvoiceloopval">
                                                                      
                                                                      <a  target="_blank" href="<?php echo base_url(); ?>index.php/order/overview?order_id=<?php echo $enable_order; ?>&old_tablename=<?php echo $old_tablename; ?>&old_tablename_sub=<?php echo $old_tablename_sub; ?>&tablename=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&movetablename=<?php echo $movetablename; ?>&movetablename_sub=<?php echo $movetablename_sub; ?>" >
                                                          
                                                                      <span >Invoice {{invoice.no}}</span><br><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span>
                                                                      
                                                                      </a>
                                                                  </p>
                                                                  
                                                                   
                                                                 
                                                                 <!-- <p>
                                                                       <a  target="_blank" href="<?php echo base_url(); ?>index.php/order/overview?order_id=<?php echo $enable_order; ?>&old_tablename=<?php echo $old_tablename; ?>&old_tablename_sub=<?php echo $old_tablename_sub; ?>&tablename=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&movetablename=<?php echo $movetablename; ?>&movetablename_sub=<?php echo $movetablename_sub; ?>" >
                                                          
                                                                      <span>DC</span><br><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span>
                                                                      </a>
                                                                 </p>-->
                                                                 
                                                                  <p><span>SubTotal</span><span> Rs. {{fulltotal}}</span></p>
                                                                  <p ng-if="tcsamount>0"><span>TCS (+)</span><span>Rs. {{tcsamount}}</span></p>
                                                                  <p><span>Delivery Charge</span><span> Rs. {{delivery_charge}}</span></p>


                                                                   

                                                                  <p><span>Total Amount</span><span> Rs. {{discountfulltotaldel+delivery_charge}}</span></p>
                                                               </div>
                                                               <div class="time">
                                                                  <p><span>Started Time</span><span>{{create_date}} <span class="text-muted font-size-12">{{create_time}}</span></p>
                                                                  <p><span>Payment Mode</span><span>{{payment_mode}}</span></p>
                                                               </div>
                                                               
                                                                
                                                                 <?php
                                                                if($this->session->userdata['logged_in']['access']!='20')
                                                                {
                                                                ?>
                                                                
                                                               <div class="flight">
                                                                  <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d250577.849036318!2d76.98661947811352!3d11.092579967087119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d11.0231552!2d76.96875519999999!4m5!1s0x3ba9038baebcbb59%3A0x65ea405423a60cf4!2szaron%20industries!3m2!1d11.185958!2d77.28320699999999!5e0!3m2!1sen!2sin!4v1638435938932!5m2!1sen!2sin" style="border:0;width:100%; height:30vh;" allowfullscreen="" loading="lazy"></iframe>
                                                               </div>
                                                               
                                                                <?php
                                                                }
                                                                ?>
                                                               
                                                               
                                                              </div>
                                                        </div>
                                                         
                                                          <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i
                                                                        class="mdi mdi-arrow-left me-1"></i> Previous</a></li>
                                                            
                                                            
                                                            
                                                               <?php
                                                               
                                                               
                                                                 
                                                                if($disabled!='disabled')
                                                                {
                                                                    ?>
                                                                   
                                                                  

                                                            
                                                            
                                                                            <?php
                                                                             // TL Q Page status
                                                                             if($status_base==12)
                                                                             {
                                                                                 
                                                                                 ?>
                                                                                 <li class="float-end"><a href="javascript: void(0);" class="btn btn-primary" id="btncom" ng-click='checkfinishValff()'   data-bs-toggle="modal"
                                                                                    data-bs-target=".confirmModal"><i class="mdi mdi-thumb-up pe-1"></i> Save & Completed </a></li>
                                                                             
                                                                             <?php    
                                                                            }
                                                                            elseif($status_base==1)
                                                                            {
                                                                                ?>
                                                                               <li class="float-end"><a href="javascript: void(0);" class="btn btn-primary" ng-click='checkfinishValfinish()' id="btncom"  data-bs-toggle="modal"
                                                                                    data-bs-target=".confirmModal"><i class="mdi mdi-thumb-up pe-1"></i> Save & Completed </a></li>
                                                                              
                                                                                <?php
                                                                            }
                                                                            elseif($status_base==13)
                                                                            {
                                                                                ?>
                                                                               <li class="float-end"><a href="javascript: void(0);" class="btn btn-primary" ng-click='checkfinishValfinish()' id="btncom"   data-bs-toggle="modal"
                                                                                    data-bs-target=".confirmModal"><i class="mdi mdi-thumb-up pe-1"></i> Save & Completed </a></li>
                                                                              
                                                                                <?php
                                                                            }
                                                                            else
                                                                            {
                                                                                ?>
                                                                               <li class="float-end"><a href="javascript: void(0);" class="btn btn-primary" ng-click='checkfinishVal()' id="btncom"   data-bs-toggle="modal"
                                                                                    data-bs-target=".confirmModal"><i class="mdi mdi-thumb-up pe-1"></i> Save & Completed </a></li>
                                                                              
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                            
                                                                     
                                                            
                                                            
                                                              <?php
                                                                }
                                                                else
                                                                {
                                                                    
                                                                    
                                                                    if($status_base==1)
                                                                    {
                                                                        
                                                                   
                                                                    ?>
                                                                    
                                                                    <li class="float-end" ng-if="paricel_mode==1"><a href="javascript: void(0);" class="btn btn-primary" ng-click='checkfinishValfinishparicel()'   data-bs-toggle="modal"
                                                                                    data-bs-target=".confirmModal"><i class="mdi mdi-thumb-up pe-1"></i> Proceed to Complete </a></li>
                                                                    <?php
                                                                    
                                                                    
                                                                    }
                                                                    
                                                                }
                                                                
                                                                ?>
                                                                   
                                                                    
                                                                    
                                                                    
                                                        </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                     
                                                              
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



































































 <div class="modal fade bs-example-modal-lg-conversion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Inward Notes</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               
                                                               
                                                              
                                 <form  ng-submit="submitFormconversion()" method="post" enctype="multipart/form-data">
                    
                    
                    
                    
                    
                    <div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="success_c">
                                            <i class="mdi mdi-check-all me-2"></i>
                                           {{successMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<div class="alert alert-danger alert-dismissible fade show" role="alert" ng-show="error_c">
                                            <i class="mdi mdi-block-helper me-2"></i>
                                            {{errorMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>



                       <div class="row">
                           
                          
                        
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Customer Name <span style="color:red;">*</span></label>
                            <div class="col-sm-12" >
                               <select class="form-control vendor_id" required name="vendor_id"  id="vendor_id">

                               <option value="{{customer_id}}"> {{customername}}</option>

                            
                              </select>
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Order Number <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="po_no" class="form-control" required readonly name="po_no" ng-model="po_no" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">QTY: <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="qty" class="form-control" name="c_qty" required  ng-model="c_qty" type="text">
                            </div>
                          </div>
                        </div>
                      


   
                           
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">COIL NO <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="coil_no" class="form-control" name="coil_no" required  ng-model="coil_no" type="text">
                            </div>
                          </div>
                        </div>


                        
                        
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Order Date</label>
                            <div class="col-sm-12">
                              <input id="order_date" class="form-control" name="order_date"  ng-model="order_date" type="date" >
                            </div>
                          </div>
                        </div>
                        
                        
                       
                               
                        
                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                             
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="{{submit_button}}">
                            </div>
                        </div>



                      </div>



                       






                      


                    </form>


                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->



        </div>
        
        
        
        






























 <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script type="text/javascript">
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     $("#cashmode").change(function(){
   
   
     var val= $(this).val();
     
     
    
     
     if(val=='Cash')
     {
          $('#dinomainitionview').show();
          
     }
     else
     {
          $('#dinomainitionview').hide();
         
     }
     
     
    
   
   
  });





















 $('#1_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*1
       $('#1_total').val(tot);
       
       
       
       var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
      if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }

      
       
       
       
   });





 $('#2_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*2
       $('#2_total').val(tot);
       
       
       
       var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
      if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }

      
       
       
       
   });


 $('#5_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*5
       $('#5_total').val(tot);
       
       
       
       var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
      if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }

      
       
       
       
   });








   $('#10_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*10
       $('#10_total').val(tot);
       
       
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
                            var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }

      
       
       
       
   });
  
  $('#20_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*20
       $('#20_total').val(tot);
       
       
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
     
     
                              var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
     
     
     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }
       
       
   });
  
  $('#50_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*50
       $('#50_total').val(tot);
       
       
       
       
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
     
     

                              var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }





     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
        if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }
       
       
   });


   $('#100_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*100
       $('#100_total').val(tot);
       
       
        var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
     
                              var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }





     
     
      if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }
       
       
   });


   $('#200_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*200
       $('#200_total').val(tot);
       
       
       
       
 var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
      var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }

     
     
     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
            $('#return_excess').val('0');
            $('#return_excess1').val('0');
       }
       
       
       
   });

   $('#500_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*500
       $('#500_total').val(tot);
       
       
        var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
         var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
     
     
                              var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
     
       if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }
       
   });
   $('#2000_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*2000
       $('#2000_total').val(tot);
       
       
        var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
       var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
       if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       if(totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
            $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }
     
   });
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
  
  

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        $('#undo').click(function(){
          var text_val = $(".numgen").val();
            $('#canvas').append('<div id="drag-3" class="draggable"><p>'+text_val+'</p></div>');
          $(".numgen").val('');
        });


        $('#deleteText').click(function(){

            $('.draggable').remove();
            $(".numgen").val('');
        });


        
        $(document).on("click", ".draggable" , function() {
            $('.draggable').css({'padding':'0px','border':'none'});
            $(this).css({'padding':'0px 0px'});
            var textPara_ = $(this).find('p').html();
            $(".numgen").val(textPara_);
        });

      </script>   
   <script type="text/javascript">
         const canvas = document.createElement('canvas'),
              ctx = canvas.getContext('2d'),
              grid = true,
              gridSpacing = 20,
              guidesBtn = document.getElementById('guides'),
              rubberBandRect = {},
              pointerDownLocation = {},
              tools = document.querySelectorAll('input[type="radio"]'),
              optionInputs = {
                sidesSelect: document.getElementById('sides'),
                strokeSelect: document.getElementById('stroke-color'),
                fillSelect: document.getElementById('fill-color'),
                lineCapSelect: document.getElementById('line-cap'),
                lineJoinSelect: document.getElementById('line-join'),
                weightSelect: document.getElementById('stroke-weight')
              },
              settings = {
                shape: 'line',
                strokeColor: optionInputs.strokeSelect.value,
                fillColor: optionInputs.fillSelect.value,
                strokeWeight: optionInputs.weightSelect.value,
                lineCap: optionInputs.lineCapSelect.value,
                polygonSides: optionInputs.sidesSelect.value
              },
              clearBtn = document.getElementById('clear'),
              saveBtn = document.getElementById('saveServer'),
              debug = true,
              polygons = []
         
          let imgData = null,
              dragging = false;
         
          function Point(x, y) {
            this.x = x;
            this.y = y; 
              }
         
         function Polygon(x, y, radius, sides) {
          this.x = x;
          this.y = y;
          this.radius = radius;
          this.sides = sides;
         }
         
         Polygon.prototype = {
          getPoints: function() {
            let points = [],
            angle = 0,
            i;
          
            for (i = 1; i <= this.sides; i++) {
              let point = new Point(this.x + this.radius * Math.cos(angle),
                                    this.y - this.radius * Math.sin(angle));
              points.push(point);
              angle += 2*Math.PI / this.sides;
            }
         
            return points;
          },
          createPath: function(context) {
            let points = this.getPoints();
            
            ctx.moveTo(points[0].x, points[0].y);
         
            for (let i = 1; i < points.length; i++) {
              ctx.lineTo(points[i].x, points[i].y);
            }
         
            ctx.closePath();
          },
          move: function(x, y) {
            this.x = x;
            this.y = y;
          }
         }
         
         function setCanvasSize(width, height) {
          if (width && height) {
            ctx.canvas.width = width;
            ctx.canvas.height = height;    
          } else {
            ctx.canvas.width = window.innerWidth;
            ctx.canvas.height = window.innerHeight;
          }
         }
         
         function unifyCoordinates(x, y) {
          let rect = canvas.getBoundingClientRect();
          return {
            x: Math.floor( (x - rect.left) * (canvas.width / rect.width) ) + 0.5,
            y: Math.floor( (y - rect.top) * (canvas.height / rect.height) ) + 0.5
          }
         }
         
         function saveData() {
          imgData = ctx.getImageData(0, 0, ctx.canvas.width, ctx.canvas.height);
          console.log(imgData);
         }
         
         function restoreData() {
          ctx.putImageData(imgData, 0, 0);
         }
         
         function drawGrid(spacing) {
          let canvasWidth = ctx.canvas.width,
              canvasHeight = ctx.canvas.height,
              start = spacing + 0.5,
              iVertLines = Math.floor(canvasWidth / spacing),
              iHorizLines = Math.floor(canvasHeight / spacing),
              i;
          
          ctx.save();
          ctx.strokeStyle = 'rgba(255, 94, 20, 0.1)';
          
          // draw vertical lines
          for (i = start; i < canvasWidth; i += spacing) {
            ctx.beginPath();
            ctx.moveTo(i, 0);
            ctx.lineTo(i, canvasHeight);
            ctx.closePath();
            ctx.stroke();
          }
          
          // draw horizontal lines
          for (i = start; i < canvasHeight; i += spacing) {
            ctx.beginPath();
            ctx.moveTo(0, i);
            ctx.lineTo(canvasWidth, i);
            ctx.closePath();
            ctx.stroke();
          }
          
          ctx.restore();
         }
         
         function clearCanvas() {
          ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
          drawGrid(gridSpacing);
         }
         
         function drawGuides(location) {
          ctx.save();
          ctx.strokeStyle = 'rgb(255, 94, 20, 0.8)';
          ctx.lineWidth = 1;
          
          ctx.beginPath();
          ctx.moveTo(0, location.y);
          ctx.lineTo(ctx.canvas.width, location.y);
          ctx.closePath();
          ctx.stroke();
          
          ctx.beginPath();
          ctx.moveTo(location.x, 0);
          ctx.lineTo(location.x, ctx.canvas.height);
          ctx.closePath();
          ctx.stroke();
          
          ctx.restore();
         }
         
         function drawPointerDownArc() {
          ctx.save();
          ctx.fillStyle = 'rgba(255,0,0,0.5)';
          ctx.beginPath();
          ctx.arc(pointerDownLocation.x,
                  pointerDownLocation.y,
                  10, 0, Math.PI * 2);
          ctx.fill();
         }
         
         function makeRubberBandRect(location) {
          if (pointerDownLocation.x < location.x) {
            rubberBandRect.left = pointerDownLocation.x;
          } else {
            rubberBandRect.left = location.x;
          }
          
          if (pointerDownLocation.y < location.y) {
            rubberBandRect.top = pointerDownLocation.y;
          } else {
            rubberBandRect.top = location.y;
          }
          
          rubberBandRect.width = Math.abs(pointerDownLocation.x - location.x);
          rubberBandRect.height = Math.abs(pointerDownLocation.y - location.y);
         }
         
         function drawRubberBandReference() {
          ctx.save();
          ctx.strokeStyle = 'black';
          ctx.lineWidth = 1;
          
          ctx.beginPath();
          ctx.arc(rubberBandRect.left,
                  rubberBandRect.top,
                  4, 0, Math.PI * 2);
          ctx.closePath();  
          ctx.stroke();
          
          ctx.beginPath();
          ctx.arc(rubberBandRect.left + rubberBandRect.width,
                  rubberBandRect.top,
                  4, 0, Math.PI * 2);
          ctx.closePath();
          ctx.stroke();
          
          ctx.beginPath();
          ctx.arc(rubberBandRect.left, 
                  rubberBandRect.top + rubberBandRect.height,
                  4, 0, Math.PI * 2);
          ctx.closePath();
          ctx.stroke();
          
          ctx.beginPath();
          ctx.arc(rubberBandRect.left + rubberBandRect.width,
                  rubberBandRect.top + rubberBandRect.height,
                  4, 0, Math.PI * 2);
          ctx.closePath();
          ctx.stroke();
          
          ctx.restore();
         }
         
         function drawRubberBandShape(location, shape) {
          ctx.save();  
          ctx.beginPath();
          
          let polygon;
          
          switch (shape) {
            case 'line':
              ctx.moveTo(pointerDownLocation.x,
                         pointerDownLocation.y);
              ctx.lineTo(location.x, location.y);
              break;
            
            case 'rectangle':
              ctx.rect(rubberBandRect.left,
                       rubberBandRect.top,
                       rubberBandRect.width,
                       rubberBandRect.height);
              break;
              
            case 'circle':
              ctx.arc(pointerDownLocation.x,
                      pointerDownLocation.y,
                      rubberBandRect.width * 0.5,
                      0,
                      Math.PI * 2,
                      false);
              break;
              
            case 'polygon':
              polygon = new Polygon(pointerDownLocation.x,
                                    pointerDownLocation.y,
                                    rubberBandRect.width * 0.5,
                                    settings.polygonSides);
              polygon.createPath(ctx);
              break;
          }
          
          ctx.lineCap = settings.lineCap;
          ctx.lineJoin = settings.lineJoin;
          
          if (settings.strokeWeight > 0) {
            ctx.strokeStyle = settings.strokeColor;
            ctx.lineWidth = settings.strokeWeight;
            ctx.stroke();
          }
          
          if (settings.fillColor && settings.shape !== 'line') {
            ctx.fillStyle = settings.fillColor;
            ctx.fill();
          }
          
          ctx.closePath();
          ctx.restore();
          
          if (!dragging && shape === 'polygon') {
            polygons.push(polygon);
          }
         }
         
         function onResize() {
          saveData();
          setCanvasSize();
          if (grid) drawGrid(gridSpacing);
          restoreData();
         }
         
         function onPointerDown(e) {
          let location = unifyCoordinates(e.clientX, e.clientY);
          pointerDownLocation.x = location.x;
          pointerDownLocation.y = location.y;
          dragging = true;
          saveData();
          
          if (debug) drawPointerDownArc();
          if (guidesBtn.checked) drawGuides(location);
         }
         
         function onPointerMove(e) {
          if (dragging) {
            let location = unifyCoordinates(e.clientX, e.clientY);
            restoreData();
            if (guidesBtn.checked) drawGuides(location);
            makeRubberBandRect(location);
            drawRubberBandShape(location, settings.shape);
            if (debug) {
              drawPointerDownArc();
              drawRubberBandReference();
            }
          }
         }
         
         function onPointerUp(e) {
          if (dragging) {
            let location = unifyCoordinates(e.clientX, e.clientY);
            dragging = false;
            restoreData();
            makeRubberBandRect(location);
            drawRubberBandShape(location, settings.shape);
          }
         }
         
         function onToolChange(e) {
          this.checked = true;
          settings.shape = this.value;
         }
         
         function onOptionChange(e) {
          let option = this.dataset.setting;
          
          if (option === 'strokeColor' || option === 'fillColor') {
            let label = this.previousElementSibling;
            let button = label.querySelector('.toolbar__button');
            button.style.backgroundColor = this.value;
            settings[option] = this.value;
          } else {
            settings[option] = this.value;
          }
         }
         
         window.addEventListener('resize', onResize);
         canvas.addEventListener('pointerdown', onPointerDown);
         canvas.addEventListener('pointermove', onPointerMove);
         canvas.addEventListener('pointerup', onPointerUp);
         clearBtn.addEventListener('click', clearCanvas);
         saveBtn.addEventListener('click', saveData);
         
         for (let tool of tools) {
          tool.addEventListener('click', onToolChange);
         }
         
         for (let i of Object.keys(optionInputs)) {
          optionInputs[i].addEventListener('change', onOptionChange);
          
          // set inital styles
          if (i === 'strokeSelect' || i === 'fillSelect') {
            optionInputs[i].previousElementSibling
              .querySelector('.toolbar__button')
              .style.backgroundColor = optionInputs[i].value;
          }
         }
         
         canvas.setAttribute('touch-action', 'none');
         
        
         document.getElementById("canvas").appendChild(canvas);
         
         
         onResize();
         clearCanvas();
         saveData();
      </script>



<script type="text/javascript">
        interact('.draggable')
  .draggable({
    // enable inertial throwing
    inertia: true,
    // keep the element within the area of it's parent
    modifiers: [
      interact.modifiers.restrictRect({
        restriction: 'parent',
        endOnly: true
      })
    ],
    // enable autoScroll
    autoScroll: true,

    listeners: {
      // call this function on every dragmove event
      move: dragMoveListener,

      // call this function on every dragend event
      
    }
  })

function dragMoveListener (event) {
  var target = event.target
  // keep the dragged position in the data-x/data-y attributes
  var x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx
  var y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy

  // translate the element
  target.style.transform = 'translate(' + x + 'px, ' + y + 'px)'

  // update the posiion attributes
  target.setAttribute('data-x', x)
  target.setAttribute('data-y', y)
}

// this function is used later in the resizing and gesture demos
window.dragMoveListener = dragMoveListener













function nextTab()
{
    $('.tab-pane').removeAttr( 'style' );

}


 </script>




 <script type='text/javascript' >
    $( function() {
        
        
        $('.table-editable-info').scroll(function() {
          if ($(this).scrollTop() > 0) {
       
             //$('#item1').prop('checked',false);
             
          } else {
             //$('#item1').prop('checked',true);
          }
        });
        
        
        
        
        
        
        $('#openaddress').on('click',function(){
            
             $('#imagesizemodel-delivery-setup').modal('toggle');
             $('#addaddress').show();
            
        });
              
        
        
        
        
        
        
        $('#call_status').on('change',function(){
            
            var data=$(this).val();
            
            if(data=='Call Back')
            {
                $('#showdate').show();
            }
            else
            {
                $('#showdate').hide();
            }
            
        });
        
       
        
        $('#save').on('click',function(){
            
            $('#firstmodal').modal('toggle');
            
        });
        
        
        $('#imagechange').on('click',function(){
            
            $('#showdraw').toggle();
            
        });
        
  
       $('#setbg1').on('click',function(){
            
             $('#setbg1').addClass('btn btn-danger');
             $('#setbg2').removeClass('btn btn-danger');
             $('#setbg1').removeClass('btn btn-outline-danger');
             $('#setbg2').addClass('btn btn-outline-danger');
            
        });
        
        
        $('#setbg2').on('click',function(){
            
             $('#setbg2').addClass('btn btn-danger');
             $('#setbg1').removeClass('btn btn-danger');
             $('#setbg2').removeClass('btn btn-outline-danger');
             $('#setbg1').addClass('btn btn-outline-danger');
            
        });
        

        
       
    });

   

</script>
    




<script>

$(document).ready(function(){


    
    
    
    
    $('.onclick').on('click',function(){
        
     $('.onclick').removeClass('acitve');   
     var  val=  $(this).data('value'); 
     var  valid=  $(this).data('id'); 
     
     
      
     $(this).addClass('acitve'); 
     
     if(val=='Accesories1' || val=='Sag_Road')
     {
          $('#autocomplete').attr("placeholder", "Product/Length/Nos");
          
          $('#showhelptext').html('Product/Length/Nos');
          
     }
     if(val=='Accesories2')
     {
          $('#autocomplete').attr("placeholder", "Product/Height/Length/Nos");
          $('#showhelptext').html('Product/Height/Length/Nos');
     }
     if(val=='Accesories3')
     {
          $('#autocomplete').attr("placeholder", "Product/Length/Nos");
          $('#showhelptext').html('Product/Length/Nos');
     }
     
      if(val=='Iron And Steel Gar Sheet-zaron')
     {
          $('#autocomplete').attr("placeholder", "Product/Profile/Crimp/Nos");
          $('#showhelptext').html('Product/Profile/Crimp/Nos');
     }
     
     
      if(val=='Arch')
     {
          $('#autocomplete').attr("placeholder", "Product/Crimp/Nos");
          $('#showhelptext').html('Product/Crimp/Nos');
     }
      if(val=='Decking sheet')
     {
          $('#autocomplete').attr("placeholder", "Product/Length/Nos");
          $('#showhelptext').html('Product/Length/Nos');
     }
     
     if(val=='Tile sheet')
     {
          $('#tielview').show();
          $('#normalview').hide();
     }
     else
     {
         $('#tielview').hide();
         $('#normalview').show();
     }
    
    
     if(val=='Purlin')
     {
          $('#autocomplete').attr("placeholder", "Product/Length/Nos");
          $('#showhelptext').html('Product/Length/Nos');
     }
      if(val=='Aluminium')
     {
          $('#autocomplete').attr("placeholder", "Product/Length/Crimp/Nos");
           $('#showhelptext').html('Product/Length/Crimp/Nos');
     }
      if(val=='Screw accesories' || val=='Cleat')
     {
          $('#autocomplete').attr("placeholder", "Product/Nos");
          $('#showhelptext').html('Product/Nos');
     }
      if(val=='L Angle')
     {
          $('#autocomplete').attr("placeholder", "Product/dim - 1/dim - 2/Length/thickness/Nos");
          
           $('#showhelptext').html('Product/dim - 1/dim - 2/Length/thickness/Nos');
          
     }
    
        if(val=='Z Angle')
     {
            $('#autocomplete').attr("placeholder", "Product/dim - 1/dim - 2/dim - 3/Length/thickness/Nos");
            $('#showhelptext').html('Product/dim - 1/dim - 2/dim - 3/Length/thickness/Nos');
     }
     
     if(val=='UPVC')
     {
          $('#autocomplete').attr("placeholder", "Product/");
          $('#showhelptext').html('Product/');
     }
     
     if(val=='Multiwall')
     {
           $('#autocomplete').attr("placeholder", "Product/Length/Width/Nos");
           $('#showhelptext').html('Product/Length/Width/Nos');
          
     }
      if(val=='Polynum')
     {
           $('#autocomplete').attr("placeholder", "Product/Length");
           $('#showhelptext').html('Product/Length');
          
     }
     
     
     
     if(val=='Liner Sheets')
     {
           $('#autocomplete').attr("placeholder", "Product/Profile/No");
           $('#showhelptext').html('Product/Profile/No');
          
     }
     
     if(val=='Roll Sheet')
     {
           $('#autocomplete').attr("placeholder", "Product/Profile/No'");
           $('#showhelptext').html('Product/Profile/No');
          
     }
     
     if(val=='Rent Bill')
     {
           $('#autocomplete').attr("placeholder", "Product/QTY");
           $('#showhelptext').html('Product/QTY');
          
     }
     
     if(val=='Steel Coil')
     {
           $('#autocomplete').attr("placeholder", "Product/No");
           $('#showhelptext').html('Product/No');
          
     }
     
     
     
     
      if(val=='Fan & Base')
     {
          $('#autocomplete').attr("placeholder", "Product/No");
          $('#showhelptext').html('Product/No');
     }
    });
    
    
    
   $("#autocomplete").focus();
  
    
  $(".closeaddon").click(function(){
    $('.right-bar').css("right", "-395px");
    $('.right-bar-2').css("right", "-395px");
  });
  
  
  
  $("#delivery_mode").on('change',function(){
    var val= $(this).val();
    
    if(val=='full')
    {
       $('.normal').show();
       $('.paricel').hide();
    }
    else if(val=='Self Pickup')
    {
       
       $('.normal').show();
       $('.paricel').hide();
   
    }
    else 
    {
         $('.normal').hide();
         $('.paricel').show();
    }
   
    
    
  });
  
  
    $('input:radio[name="orderbase"]').change(function(){
   
   
  
        if ($(this).is(':checked') && $(this).val() == '1') {
             $('#exitinforderview').show();
             $('#currentorderview').hide();
        }
        else
        {
             $('#exitinforderview').hide();
             $('#currentorderview').show();
        }
    });


  
   $("#clikcustomerbox").click(function(){
    $('#showcustomeredit').toggle();
  });
  
  
   $("#addressclick").click(function(){
    $('#addaddress').toggle();
    
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

app.directive('autoComplete', function($timeout) {
    return function(scope, iElement, iAttrs) {
            iElement.autocomplete({
                source: scope[iAttrs.uiItems],
                select: function() {
                    $timeout(function() {
                      iElement.trigger('input');
                    }, 0);
                }
            });
        };
 });

app.controller('crudController', function($scope, $http){
    
    
    
    
    
    
   
    
    
    
  
  
   
  
$scope.checkhidesortid=function(status,id)
{
       
                
          if(status==1)
          {
                $('#rowincress').attr('readonly', true);
                $('.hidebysort_'+id).hide();   
          }
          else
          {
                $('#rowincress').attr('readonly', false);
                $('.hidebysort_'+id).show();
          }
          
         
                
             
          var checkedValues = [];
    angular.forEach(document.querySelectorAll('input.checkinsert:checked'), function (element) {
        checkedValues.push(element.value);
    });

    console.log(checkedValues); 
    
    $scope.update_status_material_return(id);    

    

// gg changes
      var categories_id=$('#cateid_'+id).val();
      var type=$('#cateidtype_'+id).val();
     
      $scope.inputsave_1(id,'profile',categories_id,type);
      $scope.inputsave_1(id,'nos',categories_id,type);



    $scope.fetchSingleDatatotal(id);    
            
    
    
}; 



$scope.update_status_material_return=function(id)
{
     
                        if ($('#nn_'+id).is(':checked'))
                        {
                          
                              var status_value=1;
                          }
                          else
                          {
                              var status_value=0;
                              
                          }

                          $http({
                                method: "POST",
                                url: "<?php echo base_url() ?>index.php/order_second/update_status_material_return",
                                data: { 'id': id, 'status': status_value }
                            }).success(function (data) {
                                $scope.fetchSingleDatatotal();
                                $scope.fetchData();
                            });

}



    
$scope.completeCustomer=function(){
       
        
      
        var search=  $('#autocomplete_customer').val();
        
        
        
        $( "#autocomplete_customer" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
         $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/customer_search_full_by_single",
      data:{'action':'fetch_single_data','search':search,'order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

          $scope.availableTags = data;
     
    });
    
    
    
    }; 
    
  
  
  
  
  
  
  
  
    
    
        
    $scope.oninputstatus=function(){
        
        
            var input=$('#number').val();
            $('#appendTwobox .twoBoxInput').empty();
            if(input!="")
            {
                
            $('#show_details').before(data);
            
            for (let i = 0; i < input; i++) {
                
             var datalt=  (i+10).toString(36);
                
            // var data='<div class="col-md-4 twoBoxInput" > <label style="text-transform: uppercase;">'+datalt+'</label> <div class="d-flex small-input-group"> <div class="form-floating form-floating-custom small-input-float mb-4"> <input type="text" class="form-control p-2 label1 totalget" id="input-email" > <div class="invalid-feedback"> Please Enter Email </div> <label for="input-email" style="left:0">Size</label> </div> <div class="form-floating form-floating-custom small-input-float mb-4"> <input type="text" class="form-control p-2 label2" id="input-email" > <div class="invalid-feedback"> Please Enter Email </div> <label for="input-email" style="left:0">Deg</label> </div> </div> </div>';
            
            
            var data='<div class="row twoBoxInput"> <div class="col-md-6"> <div class="form-group row"> <div class="col-sm-12"> <input class="form-control label1" placeholder="Size" name="label1[]" type="text"> </div> </div> </div>    <div class="col-md-6"> <div class="form-group row"> <div class="col-sm-12"> <input class="form-control degree" placeholder="Degree" name="degree[]" type="text"> </div> </div> </div> </div>';
            
             $('#show_details').append(data);
             
             
             
             
             
            }
            
            
            
            
            
            
            }
            
            
            
            
            
                $(".totalget").on('input',function(){
                 
                                                                                      var sum = 0
                                                                                      $('.totalget').each(function () {
                                                                                             
                                                                                                    
                                                                                                if($(this).val()=='')
                                                                                                {
                                                                                                    var combat = 0;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                     var combat = $(this).val();
                                                                                                }
                                                                                                    
                                                                                               sum += parseFloat(combat);
                                                                                               
                                                                                             
                                                                                      });
                 
                                                                                      $('#sizetotal').html('Size Total : '+sum);
                 
                });
        
    
    } 
    
    
    
    
    
     $scope.fethcProduct=function(id){
            
            
             $scope.completeProduct=function(){
                 
                    $( "#autocomplete" ).autocomplete({
                      source: $scope.availableProducts
                    });
                    
                    
                    
                     $http({
                      method:"POST",
                      url:"<?php echo base_url() ?>index.php/order/fetchproduct_full",
                      data:{'action':'fetch_single_data','cateid':id,'order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                      }).success(function(data){
                
                          $scope.availableProducts = data;
                     
                      });
                    
            
            
             } 
             
             
              
      
             
      
     } 
     
     
     
     $scope.completeProduct=function(){
                 
                    $( "#autocomplete" ).autocomplete({
                      source: $scope.availableProducts
                    });
                    
                    
                     $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/fetchproduct_full",
              data:{'action':'fetch_single_data','cateid':0,'order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
              }).success(function(data){
        
                  $scope.availableProducts = data;
             
      });
    
                    
            
            
     } 
             
    
    
    
     
      
      
      
      
      
       
      
   
     
   
   
     $scope.mmt = 0;
     $scope.mmt1 = 0;
     
     
     
    
    
   
    
    
    
      $scope.completeProductNa=function(){
        $( "#autocomplete3" ).autocomplete({
          source: $scope.availableProducts3
        });
        
         $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchproduct_full_tile_products",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){

          $scope.availableProducts3 = data;
     
      });
        
        
     } 
    
    
    
    $scope.completeProduct2=function(id){
    $( "#product_name_"+id ).autocomplete({
      source: $scope.availableProducts2
    });
    
     $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchproduct_full2",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){

          $scope.availableProducts2 = data;
     
      });
    
    } 
    
    
    
    $scope.completeProduct12=function(id)
    {
        $( "#sub_product_id_"+id ).autocomplete({
          source: $scope.availableProducts12
        });
        
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/products/fetchiornproducts_base_product",
          data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
          }).success(function(data){
    
              $scope.availableProducts12 = data;
         
          });
        
    }
    
    
    
    
    
    
    
    $scope.completeProductSUb=function(id){
    $( "#tile_material_name_"+id ).autocomplete({
      source: $scope.availableProductssub
    });
    
    
       $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchproduct_full2_basecaetgary",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){

          $scope.availableProductssub = data;
     
      });
    
    
    
    } 
    
    
    
     $scope.completeProductSUb3=function(id){
         
         
    $( "#tile_material_name_"+id ).autocomplete({
      source: $scope.availableProductssub3
    });
    
       $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchproduct_full2_basecaetgary_3",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){

          $scope.availableProductssub3 = data;
     
      });
    
    
    
    } 
    
    
    
    
    
 
    
    
    

    
     $scope.productMM = function (id,convert) {
    
    
    
   
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/order/fetchproduct_fullmm",
          data:{'action':'fetch_single_data','id':id,'convert':convert,'tablename_sub':'<?php echo $tablename_sub; ?>'}
          }).success(function(data){
    
              $scope.availableProductsmm = data;
         
          });
          
      
     }

    
    
    
  $scope.success = false;
  $scope.error = false;



     $scope.submit_button = 'Create';
     $scope.defaultvalue = '(MTR)';
     
      $scope.backcripm = 'Yes';
     
     $scope.base_id_set="0";
     $scope.reason = 0;
     
    
     
$scope.imageuploadInproduct = function(){
              
                  var layout_plan= $('#layout_plan').val();
                   var lengthval= $('#lengthvalset').val();        
                               
                              var product_id=$('#order_product_id_base_define').val();
                              var cate_id= $('#clickcateid').val();
                              var order_product_id=$('#product_id_base_define').val();
                              
                              $('#uploadbutton').html('Loading..');
              
                              var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file[]', file);  
                               });  
                               $http.post('<?php echo base_url() ?>index.php/products/fileuplaodimgsave?id='+product_id+'&lengthval='+lengthval+'&layout_plan='+layout_plan, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                  $scope.imgpreviewimages(product_id,cate_id,order_product_id);
                                 
                                  $('#uploadbutton').html('Upload');
                                   
                                    
                               });  

     
 };
       
       
       
       
       
       
$scope.imageuploadInproductupdate = function(){
           
                              var layout_plan= $('#layout_plan1').val();
                              var lengthvalset1= $('#lengthvalset1').val();
                              var image_plan_id= $('#image_plan_id').val();
                              
                              var product_id=$('#order_product_id_base_define').val();
                              var cate_id= $('#clickcateid').val();
                              var order_product_id=$('#product_id_base_define').val();
                              
                               $('#uploadbutton1').html('Loading..');
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/products/insertandupdate",
                                data:{'layout_plan':layout_plan,'id':image_plan_id,'lengthvalset':lengthvalset1,'order_product_id':order_product_id,'tablename_sub':'<?php echo $tablename_sub; ?>','action':'updatelayputplan','tablename':'product_images'}
                                }).success(function(data){
                                    
                                   // alert('Updated');
                                   //$scope.imgpreviewimages(product_id,cate_id,order_product_id);
                                    
                                 
                               }); 
            
            
 };

       
       
       
       
       
       
       
       
       
       
       
       
       
       

  $scope.submitCallBack = function(){


      



 $('#savecallback').html('Loading...');
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/callbacksave",
      data:{'audiolink':$scope.audiolink,'remarks':$scope.remarks,'call_status':$scope.call_status,'call_back_date':$scope.call_back_date,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','tablenamemain':'<?php echo $tablename; ?>'}
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
            $('#savecallback').html('Save');
            $scope.fetchCustomerorcallbackhistroy();
            $scope.error = false;
            $scope.title = "";
            $scope.message = "";
            $scope.audiolink = "";
            $scope.remarks = "";
            $scope.attachment = "";
            $scope.successMessage = data.massage;





           
                              
                               var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file', file);  
                               });  
                               $http.post('<?php echo base_url() ?>index.php/order/fileuplaod?id='+data.insert_id, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                    $scope.select();  
                                    
                                   
                                    
                               });  


          

          }

          

      }

       
    });
  };
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
 $scope.fetchCustomerdetails = function () {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerdetails_view_order",
      data:{'id':'<?php echo $order_id; ?>','tablename':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){
        
        
   

            $scope.customernamefinal = data.name;
            $scope.routenamefinal= data.route_name;
            $scope.address = data.address;
            $scope.orderno = data.order_no;
            $scope.customerphonefinal = data.phone;
            $scope.starttime = data.create_date;
            
            $scope.payment_mode = data.payment_mode;
            $scope.deliverystatus = data.delivery_status;
            
            
            
            
            $('#cashmode').val(data.payment_mode);
            
            
            
            
            $('input[name="formRadios"]').each(function(e){
                if($(this).val() == data.delivery_status){
                    $(this).attr("checked", "checked");
                }
            });
            
            
            
           
            
            if(data.delivery_mode!=null)
            {
                $('#delivery_mode').val(data.delivery_mode);
            }
            
            
            
            $scope.delivery_status_name = data.delivery_status_name;
            
            $scope.delivery_charge = data.delivery_charge;
            $scope.totalamount = data.totalamount;
            $scope.map = data.map;

    });



}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

 
 // column to sort
 $scope.column = 'sno';
 
 // sort ordering (Ascending or Descending). Set true for desending
 $scope.reverse = false; 
 
 // called on header click
 $scope.sortColumn = function(col){
  $scope.column = col;
  if($scope.reverse){
   $scope.reverse = false;
   $scope.reverseclass = 'arrow-up';
  }else{
   $scope.reverse = true;
   $scope.reverseclass = 'arrow-down';
  }
 };
 
 // remove and change class
 $scope.sortClass = function(col){
  if($scope.column == col ){
   if($scope.reverse){
    //return 'arrow-down'; 
   }else{
    //return 'arrow-up';
   }
  }else{
   return '';
  }
 } 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


               $scope.addon = function(id) {
                        $('.right-bar').css("right", "0px");
                        
                        
                         $scope.titleView = "Add Customer";
                         $scope.titleButton = "";
                         
                         $scope.mode = "1";
                        
                        
               }
               
               
               
               
               
            
               
               
               
               
                $scope.editcustomre = function(id) {
                        $('#showcustomeredit').toggle();
               }







               $scope.fetchUsers = function(){


                         var searchText_len = $scope.product_id.trim().length;

                         // Check search text length
                         if(searchText_len > 0){
                             $http({
                             method: 'post',
                             url: '<?php echo base_url() ?>index.php/order/fetchproduct',
                             data: {product_id:$scope.product_id}
                             }).then(function successCallback(response) {
                                 $scope.searchResult = response.data;
                             });
                         }else{
                             $scope.searchResult = {};
                         }
                         
             }

            $scope.setValue = function(index,$event){
                $scope.product_id = $scope.searchResult[index].name;
                $scope.searchResult = {};
                $event.stopPropagation();
            }

            $scope.searchboxClicked = function($event){
                $event.stopPropagation();
            }

            $scope.containerClicked = function(){
                $scope.searchResult = {};
            }


// search end

$scope.inputmodeifiy_qty = function (id,inputname) {
    
                               var fieds=inputname+'_'+id;
                               var values=parseFloat($('#'+fieds).val());
                              
                               var rate=parseFloat($('#modify_rate_'+id).text());
                               var Total=rate*values;
                               var Total=Total.toFixed(3);
                               
                               $('#modify_amount_'+id).text('Rs.'+ Total);
                          
                                $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                                data:{'id':id,'qty':values, 'action':'qtymodifiy','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                 }).success(function(data){
                           
                            
                                }); 
    
}
 
$scope.getproductbasefact = function () {
     
         var convert=$('input[name="checkboxformula"]:checked').val();
         
         
         var product_name=$('#autocomplete3').val();
         
        $scope.productMMbaseproduct(product_name,convert);
         
    
}
$scope.changeConvert = function () {
    
     var convert=$('input[name="checkboxformula"]:checked').val();
     var product_name=$('#autocomplete3').val();
     $scope.productMMbaseproduct(product_name,convert);
    
}


 $scope.productMMbaseproduct = function (id,convert) {
    
    
    
   
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/order/fetchproduct_fullmm_val",
          data:{'action':'fetch_single_data','id':id,'convert':convert,'tablename_sub':'<?php echo $tablename_sub; ?>'}
          }).success(function(data){
    
              $scope.availableProductsmmval = data;
         
          });
          
      
     }
















$scope.inputsaveqty_1 = function (id,inputname,categories_id,type) {


                     
                     
                          var fieds=inputname+'_'+id;
                           var values=$('#'+fieds).val();
                          
                            var checkval = $('#' + fieds).data('val');
                       
                            if (checkval < values || values==0) {
                                alert('input max value of order');
                                $('#' + fieds).val(checkval);
                                var values=$('#'+fieds).val();

                            }
                            


                       
                        
                          var rate= parseFloat($('#rate_'+id).val());
                          
                          
                       
                          var toatlamt=rate*values;
                          var toatlamtamm=toatlamt.toFixed(2);
                          $('#amount_'+id).html(toatlamtamm);
                        
                      
                      
                      
                         var nostotsum = 0;
                          $('.nos_'+categories_id).each(function(){
                            nostotsum += parseFloat($(this).val());  
                         });
                         var nostotsumtot=nostotsum.toFixed(2);
                         $('#nostot_'+categories_id).html(nostotsumtot);
                        
                        
                        
                        
                      
                      
                      
                        var cattotsum = 0;
                        $('.amounttot_'+categories_id).each(function(){
                            cattotsum += parseFloat($(this).text());  
                        });
                        var alltotalcat=cattotsum.toFixed(2);
                        $('#fulltotal_'+categories_id).html(alltotalcat);
                        
                        
                       
                        
                        var cattotsumqty = 0;
                        $('.qtyfind_'+categories_id).each(function(){
                            
                            if($(this).val()>0)
                            {
                                cattotsumqty += parseFloat($(this).val());  
                            }
                            
                            
                        });
                        
                        
                        var alltotalcatqty=cattotsumqty.toFixed(3);
                        $('#fullqty_'+categories_id).html(alltotalcatqty);
                        $('#saveactqty_'+categories_id).val(alltotalcatqty);
                    
                        
                         // var weight=0;    
                         // var default_weight= parseFloat($('#default_weight_'+id).val());
                         
                         // if(default_weight>0)
                         // {
                             
                         
                         // var weight_data=values*default_weight;
                         // var weight=weight_data.toFixed(3);
                         // $('#weight_'+id).val(weight);
                        
                         // }

                          var weight = 0;
                                  var weight = $scope.weight_Calculation(categories_id,'', id, inputname, values);
                                  $('#weight_'+id).val(weight);
                      
                     
            
                       $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
                          data:{'inputname':inputname,'values':values,'weight':weight,'id':id,'action':'convertionqty','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                        }).success(function(data){

                            $http({
                                  method:"POST",
                                  url:"<?php echo base_url() ?>index.php/order/return_weight_update?order_id=<?php echo $order_id; ?>",
                                  data:{'order_id':<?php echo $order_id; ?>,'id':id,'action':'InputUpdate','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>','inputname': inputname,'categories_id':categories_id}
                                }).success(function(data){
                                  $('#weight_'+id).val(data.weight);
                                  if(categories_id != 1 && categories_id != 32){
                                  var weight = 0;
                                  var weight = $scope.weight_Calculation(categories_id,'', id, inputname, values);
                                  $('#weight_'+id).val(weight);
                                }

                                  $scope.fetchSingleDatatotal('1');

                                });
                    
                          if(data.error != '1')
                          {
                              
                              
                                  $scope.fetchSingleDatatotal('1');
                              
                               
                          }
                             
                       });
                       
           
           
  

      

}








$scope.inputsaverate_1 = function (id,inputname,categories_id,type) {


                     
                     
                           var fieds=inputname+'_'+id;
                           var values=$('#'+fieds).val();
                          
                     
                       
                        
                          var qty= parseFloat($('#qty_'+id).val());
                          if(isNaN(qty)) {
                                var qty= parseFloat($('#qty_'+id).text());
                          }
                       
                       
                          var toatlamt=qty*values;
                          var toatlamtamm=toatlamt.toFixed(2);
                          $('#amount_'+id).html(toatlamtamm);
                      
                      
                      
                         var nostotsum = 0;
                          $('.nos_'+categories_id).each(function(){
                            nostotsum += parseFloat($(this).val());  
                         });
                         var nostotsumtot=nostotsum.toFixed(2);
                         $('#nostot_'+categories_id).html(nostotsumtot);
                        
                        
                        
                        
                      
                      
                      
                        var cattotsum = 0;
                        $('.amounttot_'+categories_id).each(function(){
                            cattotsum += parseFloat($(this).text());  
                        });
                        var alltotalcat=cattotsum.toFixed(2);
                        $('#fulltotal_'+categories_id).html(alltotalcat);
                        
                        
                        
                        
                        var cattotsumqty = 0;
                        $('.qtyfind_'+categories_id).each(function(){
                            if($(this).text()>0)
                            {
                            cattotsumqty += parseFloat($(this).text());  
                            }
                        });
                        var alltotalcatqty=cattotsumqty.toFixed(3);
                        //$('#fullqty_'+categories_id).html(alltotalcatqty);
                      
                    
                      
                      
                      
            
                       $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
                          data:{'inputname':inputname,'values':values,'id':id,'action':'convertionqty','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                        }).success(function(data){
                    
                          if(data.error != '1')
                          {
                              
                              
                                  $scope.fetchSingleDatatotal('1');
                              
                               
                          }
                             
                       });
                       
           
           
  

      

}


















$scope.cancelData = function(id){
    if(confirm("Are you sure you want to Cancel it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Cancel','tablenamemain':'<?php echo $tablename; ?>'}
      }).success(function(data){
        
        alert('Success');
        $scope.fetchSingleDatatotal('1');
        
      }); 
    }
};


$scope.nos_on_change = function(id){

              $('#nn_'+id).prop('checked',true);
              $scope.update_status_material_return(id);    



     };



$scope.inputsave_1 = function (id,inputname,categories_id,type) {
 

                          var fieds=inputname+'_'+id;
                          var values=$('#'+fieds).val();
                          
                          var checkval = $('#' + fieds).data('val');
                       
                          if (checkval < values) {
                              alert('input max value of order');
                              $('#' + fieds).val(checkval);
                              var values=$('#'+fieds).val();

                          }
                          
                       
                          var cul=$('#cal_'+categories_id+type).val();
                          var uom=$('#uom_'+id).val();
                          var profile= parseFloat($('#profile_'+id).val());
                          
                           // Make SQM MTR fact editable // fact2 changes
                          if (inputname == 'billing_options') { 
                            // alert(categories_id);                            
                            // alert(values);

                            if (categories_id == 34 || categories_id == 36 || categories_id == 591 || categories_id == 626) {
                                if (values == '3') {
                                    $('#fact2_' + id).show();
                                    $('#fact_' + id).hide();
                                } else {
                                    $('#fact_' + id).show();
                                    $('#fact2_' + id).hide();
                                }
                              }
                            } else {
                              var billing_options= parseFloat($('#billing_options_'+id).val());
                              // alert("billing_options"+billing_options);
                              if (billing_options == '3') {
                                    $('#fact2_' + id).show();
                                    $('#fact_' + id).hide();
                                } else {
                                    $('#fact_' + id).show();
                                    $('#fact2_' + id).hide();
                                }

                                  // $('#fact2_' + id).hide();
                                
                            }
                          
                           
                          
                          if(type==11)
                          {
                              
                          
                                  var dim_one= parseFloat($('#dim_one_'+id).val());
                                  var dim_two= parseFloat($('#dim_two_'+id).val());
                                  var dim= parseFloat($('#dim_one_'+id).val())+parseFloat($('#dim_two_'+id).val());
                                  $('#dim_oness_'+id).val(dim_one);
                                  $('#dim_twoss_'+id).val(dim_two);
                          
                          
                          }
                          else if(type==12)
                          {
                              
                          
                                  var dim_one= parseFloat($('#dim_one_'+id).val());
                                  var dim_two= parseFloat($('#dim_two_'+id).val());
                                  var dim_three= parseFloat($('#dim_two_'+id).val());
                                  var dim= parseFloat($('#dim_one_'+id).val())+parseFloat($('#dim_two_'+id).val())+parseFloat($('#dim_three_'+id).val());
                                  $('#dim_oness_'+id).val(dim_one);
                                  $('#dim_twoss_'+id).val(dim_two);
                                  $('#dim_threess_'+id).val(dim_three);
                          
                          
                          }
                          else
                          {
                                  var dim=0;
                          }
                          
                          
                          
                          var crimp= parseFloat($('#crimp_'+id).val());
                          
                          $('#profiless_'+id).val(profile);
                          $('#crimpss_'+id).val(crimp);
                          $('#uomss_'+id).val(uom);
                          
                         
                          
                          
                          if(uom==3)
                                              {
                                                         
                                                         
                                                         
                                                  
                                                          
                                                           if(type==0)
                                                           {
                                                             var profile= parseFloat(profile)+parseFloat(crimp); 
                                                             
                                                           }
                                                           else if(type==6)
                                                           {
                                                                   var profile= parseFloat(profile)+parseFloat(crimp); 
                                                           }
                                                           else if(type==15)
                                                           {
                                                              var profile= parseFloat(profile)*parseFloat(crimp); 
                                                             
                                                           }
                                                           else if(type==13)
                                                           {
                                                                   var profile= parseFloat(profile)+parseFloat(crimp); 
                                                           }
                                                           else if(type==8)
                                                           {
                                                             var profile = profile > 0 ? profile : 0; 
                                                var crimp = crimp > 0 ? crimp : 0; 
                                                                   var profile= parseFloat(profile)+parseFloat(crimp); 
                                                           }
                                                           else if(type==4)
                                                           {
                                                                   var profile= parseFloat(profile); 

                                                           }
                                                           else
                                                           {
                                                             var profile= parseFloat($('#profile_'+id).val());  
                                                           }
                                                          
                                                           if(categories_id==40)
                                                           {
                                                                  var profile= parseFloat(profile)+parseFloat(crimp); 
                                                           }
                                                          
                                                           
                                                      
                                                           if(categories_id==613)
                                                            {
                                                                   var pro = parseFloat(profile*0.305);
                                                                   var crimp = parseFloat(crimp*0.305);
                                                                   var profile = pro * crimp; 
                                                            }else{

                                                              var profile= parseFloat(profile*0.305);
                                                              var profile=profile;
                                                            }
                                                          
                                                         
                                                          var dim= parseFloat(dim*0.305);
                                                          var dim=dim.toFixed(3);
                                                          
                                                          
                                                          
                                                           
                                                          
                                                  
                                              }
                                             
                                              if(uom==4)
                                              {
                                                  
                                                           if(type==0)
                                                           {
                                                             var profile= parseFloat(profile)+parseFloat(crimp); 
                                                             
                                                           }
                                                           if(type==6)
                                                           {
                                                                     var profile= parseFloat(profile)+parseFloat(crimp); 
                                                           }
                                                           if(type==15)
                                                           {
                                                              var profile= parseFloat(profile)*parseFloat(crimp); 
                                                             
                                                           }
                                                           if(type==13)
                                                           {
                                                                     var profile= parseFloat(profile)+parseFloat(crimp); 
                                                           }
                                                           if(type==8)
                                                           {
                                                             var profile = profile > 0 ? profile : 0; 
                                                var crimp = crimp > 0 ? crimp : 0; 
                                                                     var profile= parseFloat(profile)+parseFloat(crimp); 
                                                           }
                                                            if(categories_id==40)
                                                           {
                                                                  var profile= parseFloat(profile)+parseFloat(crimp); 
                                                           }
                                                  
                                                              if(categories_id==613)
                                                            {
                                                                   var pro = parseFloat(profile/1000);
                                                                   var crimp = parseFloat(crimp/1000);
                                                                   var profile = pro * crimp; 
                                                            }
                                                            else{
                                                  
                                                             var profile= parseFloat(profile/1000);
                                                             var profile=profile;
                                                           }
                                                  
                                                              
                                                              
                                                            var dim= parseFloat(dim/1000);
                                                            var dim=dim.toFixed(3);
                                                          
                                                  
                                                  
                                              }
                                              if(uom==5)
                                              {
                                                  
                                                           if(type==0)
                                                           {
                                                              var profile= parseFloat(profile)+parseFloat(crimp); 
                                                             
                                                           }
                                                           else if(type==6)
                                                           {
                                                                     var profile= parseFloat(profile)+parseFloat(crimp); 
                                                           }
                                                           else if(type==15)
                                                           {
                                                              var profile= parseFloat(profile)*parseFloat(crimp); 
                                                             
                                                           }
                                                           else if(type==13)
                                                           {
                                                                     var profile= parseFloat(profile)+parseFloat(crimp); 
                                                           }
                                                           else if(type==8)
                                                           {
                                                             var profile = profile > 0 ? profile : 0; 
                                                var crimp = crimp > 0 ? crimp : 0; 
                                                                     var profile= parseFloat(profile)+parseFloat(crimp); 
                                                           }
                                                           else
                                                           {
                                                              var profile= parseFloat($('#profile_'+id).val());
                                                           }
                                                  
                                                 if(categories_id==40)
                                                           {
                                                                  var profile= parseFloat(profile)+parseFloat(crimp); 
                                                           }
                                                           
                                                  if(categories_id==613)
                                                            {
                                                                   var pro = parseFloat(profile);
                                                                   var crimp = parseFloat(crimp);
                                                                   var profile = pro * crimp; 
                                                            }
                                                  
                                                  
                                              }
                                              if(uom==6)
                                              {
                                                  
                                                            if(type==0)
                                                           {
                                                              var profile= parseFloat(profile)+parseFloat(crimp); 
                                                             
                                                           }
                                                           if(type==6)
                                                           {
                                                              var profile= parseFloat(profile)+parseFloat(crimp); 
                                                             
                                                           }
                                                           if(type==15)
                                                           {
                                                              var profile= parseFloat(profile)*parseFloat(crimp); 
                                                             
                                                           }
                                                            if(type==13)
                                                           {
                                                              var profile= parseFloat(profile)+parseFloat(crimp); 
                                                             
                                                           }
                                                           if(type==8)
                                                           {
                                                             var profile = profile > 0 ? profile : 0; 
                                                var crimp = crimp > 0 ? crimp : 0; 
                                                                     var profile= parseFloat(profile)+parseFloat(crimp); 
                                                           }
                                                  
                                                          if(categories_id==40)
                                                           {
                                                                  var profile= parseFloat(profile)+parseFloat(crimp); 
                                                           }

                                                            if(categories_id==613)
                                                            {
                                                                   var pro = parseFloat(profile/39.37);
                                                                   var crimp = parseFloat(crimp/39.37);
                                                                   var profile = pro * crimp; 
                                                            }else{

                                                           var profile= parseFloat(profile/39.37);
                                                           var profile=profile;
                                                         }
                                                           
                                                           
                                                           
                                                            var dim= parseFloat(dim/39.37);
                                                            var dim=dim.toFixed(3);
                                                          
                                                  
                                                  
                                              }
                     
                   
            
                    
                       
                        var fact= parseFloat($('#fact_'+id).val());
                        var nos= parseFloat($('#nos_'+id).val());
                        var old_fact = 0;
                        
                     
                       
                        
                        
                        if(inputname=='billing_options')
                        {
                               if(values=='2')
                               {
                                    var rate= parseFloat($('#kg_price_'+id).val());
                                   
                                    var ratechange= parseFloat($('#kg_price_'+id).val());
                                    if(rate > 0){
                                    $('#rate_'+id).val(rate);
                                  }
                                    
                                    
                                     var fact= parseFloat($('#kg_formula_'+id).val());
                                     var fact=fact.toFixed(3);
                                     var factchange= parseFloat($('#kg_formula_'+id).val());
                                     $('#fact_'+id).val(fact);
                                    
                                    
                               }
                               else
                               {
                                   
                                    var rate= parseFloat($('#rate_tab_get_'+id).val());
                                    var ratechange= parseFloat($('#rate_tab_get_'+id).val());
                                    $('#rate_'+id).val(rate);
                                    
                                    
                                     var fact= parseFloat($('#og_formula_get_'+id).val());
                                     var fact=fact.toFixed(3);
                                     var factchange= parseFloat($('#og_formula_get_'+id).val());
                                     $('#fact_'+id).val(fact);
                               }
                               
                        }
                        else
                        {
                             var rate= parseFloat($('#rate_'+id).val());
                             var ratechange=0;
                             var factchange=0;
                        }
                        
                        
                        
                           // AStockUpdate-live-01/07
                            var billing_options= parseFloat($('#billing_options_'+id).val());
                            if (billing_options > 0){}
                            else {
                              var billing_options = 1;
                            }
                         console.log("billing_options"+ billing_options);
                                            
                     
                     
                     
                          if(categories_id==1)
                          {
                              var crimp=0; 
                          }
                          
                        
                          if(type==1)
                                               {
                                                   
                                                   
                                                     var profile= parseFloat($('#profile_'+id).val());


                                                     if(uom==4)
                                                     {
                                                        var profile= parseFloat(profile / 304.8);
                                                     }
                                                      if(uom==5)
                                                     {
                                                        var profile= parseFloat(profile * 3.281);
                                                     }
                                                      if(uom==6)
                                                     {
                                                        var profile= parseFloat(profile / 12);
                                                     }


                                                      var sqt_qty=profile*nos;
                                                      var sqt_qty=sqt_qty.toFixed(3);
                                                   
                                                  
                                                   
                                                   
                                               }
                                               
                                               
                                                if(type==4)
                                               {
                                                  
                                                    
                                                   var sqt_qty=profile*nos*fact;
                                                   var old_sqt_qty=profile*nos*old_fact;
                                                   var sqt_qty=sqt_qty.toFixed(3);
                                                  
                                               }
                                              
                                           
                                             
                                               
                                               if(type==2)
                                               {


                                                
                                                   
                                                               var profile= parseFloat($('#profile_'+id).val());
                                                               var crimp= parseFloat($('#crimp_'+id).val());


                                                                 if(uom==4)
                                                                 {
                                                                    var profile= parseFloat(profile / 304.8);
                                                                 }
                                                                  if(uom==5)
                                                                 {
                                                                    var profile= parseFloat(profile * 3.281);
                                                                 }
                                                                  if(uom==6)
                                                                 {
                                                                    var profile= parseFloat(profile / 12);
                                                                 }



                                                   
                                                               if(uom==4)
                                                              {

                                                                   var crimp= parseFloat(crimp/ 304.8);
                                                                   var crimp=crimp.toFixed(3);
                                                                  
                                                                  
                                                                  
                                                                  
                                                              }
                                                              if(uom==5)
                                                              {
                                                                   var crimp= parseFloat(crimp * 3.281);
                                                                   var crimp=crimp.toFixed(3);
                                                                  
                                                                  
                                                                  
                                                              }
                                                              if(uom==6)
                                                              {
                                                                  var crimp= parseFloat(crimp / 12);
                                                                  var crimp=crimp.toFixed(3);
                                                                  
                                                                  
                                                              }
                                                         
                                                   
                                                   
                                                 
                                                  // var crimp= parseFloat($('#crimp_'+id).val());
                                                   var sqt_qty=profile*nos*crimp;
                                                   var sqt_qty=sqt_qty.toFixed(3);
                                                   
                                                  
                                               }
                                                 
                                               if(type==3)
                                               {
                                                    var sqt_qty=nos;
                                                    var sqt_qty=sqt_qty.toFixed(3);
                                               }
                                               
                                               
                                                if(type==14)
                                               {
                                                   
                                                    var sqt_qty=nos*fact;
                                                    var old_sqt_qty=nos*old_fact;
                                                    var sqt_qty=sqt_qty.toFixed(3);
                                                    
                                               }
                                               
                                               if(type==9)
                                               {
                                                   
                                                    
                                                      var nos= parseFloat($('#qty_'+id).val());
                                                      if(isNaN(nos)) {
                                                            var nos= parseFloat($('#qty_'+id).text());
                                                      }
                                           
                                                    
                                                    
                                                    var sqt_qty=nos;
                                                    var sqt_qty=sqt_qty.toFixed(3);
                                                    
                                               }
                                               
                                               
                                               if(type==19)
                                               {
                                                      var nos= parseFloat($('#qty_'+id).val());
                                                      if(isNaN(nos)) {
                                                            var nos= parseFloat($('#qty_'+id).text());
                                                      }
                                                    
                                                    
                                                    var sqt_qty=nos;
                                                    var sqt_qty=sqt_qty.toFixed(3);
                                                    
                                               }
                                               
                                               
                                                
                                               if(type==5)
                                               {
                                                    // AStockUpdate-live-01/07
                                                if(categories_id==34){
                                                  var profile= parseFloat($('#profile_'+id).val());
                                                  var fact2= parseFloat($('#fact2_'+id).val()); // fact2 changes
                                                  var uom=$('#uom_'+id).val();

                                                    if(uom==4)
                                                    {
                                                      var profile= parseFloat(profile / 304.8);
                                                    }
                                                    if(uom==5)
                                                    {
                                                      var profile= parseFloat(profile * 3.281);
                                                    }
                                                    if(uom==6)
                                                    {
                                                      var profile= parseFloat(profile / 12);
                                                    }

                                                  if(billing_options == 2){
                                                      var sqt_qty=profile*0.305*nos*fact;
                                                   }else if(billing_options == 3){
                                                      var sqt_qty=profile*0.305*nos*fact2;
                                                   }else{
                                                    var sqt_qty=profile*0.305*nos;
                                                   }
                                                   var old_sqt_qty=profile*nos*old_fact;
                                                   var sqt_qty=sqt_qty.toFixed(3);

                                                }else{
                                                  var fact2= parseFloat($('#fact2_'+id).val()); // fact2 changes
                                                    var nos1= parseFloat($('#nos_'+id).val())
                                                    if(billing_options == 2){
                                                      // ength/1000*nos*fact
                                                      var sqt_qty=profile*nos*fact;
                                                    
                                                     }else if(billing_options == 3){
                                                      var sqt_qty=profile*nos*fact2;
                                                   }else{
                                                      var sqt_qty=profile*nos;
                                                     }
                                                   var old_sqt_qty=profile*nos*old_fact;
                                                   var sqt_qty=sqt_qty.toFixed(3);

                                                  }
                                               }
                                               
                                               
                                               // if(type==5)
                                               // {
                                                   
                                                
                                               //    //  var sqt_qty=profile*nos*fact;
                                                   
                                               //     if(billing_options == 1){
                                               //       console.log("billing no"+nos);
                                               //      // ength/1000*nos*fact
                                               //      // var sqt_qty=profile*0.305*nos*fact;
                                               //      if(uom == 3){
                                               //        var sqt_qty=(profile)*nos*fact;
                                               //      }
                                               //      if(uom == 4){
                                               //        var sqt_qty=(profile/1000)*nos*fact;
                                               //      }
                                               //     }else{
                                               //      var sqt_qty=profile*0.305*nos;
                                               //     }
                                               //     var old_sqt_qty=profile*nos*old_fact;
                                               //     var sqt_qty=sqt_qty.toFixed(3);
                                                   
                                                  
                                              
                                                   
                                                  
                                               // }
                                               if(type==8)
                                               {
                                                   var profile = profile > 0 ? profile : 0; 
                                                var nos = nos > 0 ? nos : 0; 
                                                   var sqt_qty=profile*nos*fact;
                                                   var old_sqt_qty=profile*nos*old_fact;
                                                   
                                                  
                                                   var sqt_qty=sqt_qty.toFixed(3);
                                                   
                                                  
                                               }
                                               if(type==6)
                                               {
                                                   
                                                   var subqty = parseFloat(profile);
                                                   
                                                 
                                                   
                                                   var sqt=subqty*fact;
                                                   // var sqt_qty=sqt*nos;

                                                  var fact2= parseFloat($('#fact2_'+id).val()); // fact2 changes
                                                   if(billing_options > 0){
                                                    if(billing_options == 3)
                                                    {
                                                      var sqt_qty=subqty*nos*fact2;
                                                    }else if(billing_options == 2){
                                                      var fact = $('#fact_val_'+id).val();
                                                      var sqt_qty=subqty*nos*fact;
                                                    }else{
                                                      var sqt_qty=subqty*nos*fact;
                                                    }
                                                   }

                                                   var old_sqt_qty=profile*nos*old_fact;

                                                   var sqt_qty = sqt_qty.toFixed(3);
                                                    
                                                    
                                                    
                                                   
                                                  
                                               }
                                                if(type==15)
                                               {
                                                   
                                                var profile = parseFloat($('#profile_' + id).val()) * parseFloat($('#crimp_' + id).val());
                                                var subqty = parseFloat(profile);
                                                var sqt = subqty;
                                                if (uom == 4) {
                                                    var sqtcell = sqt / 1000;
                                                    var sqt_qty = (sqtcell * nos / 1000).toFixed(5);;

                                                }
                                                else {
                                                    var sqt_qty = (sqt * nos).toFixed(5);;
                                                }
                                                // gg changes


                                                // Check if the value has more than 3 decimal places
                                                if (sqt_qty.toString().indexOf('.') !== -1 && sqt_qty.toString().split('.')[1].length > 3) {
                                                    sqt_qty = Math.floor(sqt_qty * 1000) / 1000;  // Truncate to 3 decimal places
                                                }
                                                 
                                               }
                                               
                                               if(type==7)
                                               {
                                                   
                                                   if(categories_id==13)
                                                   {           
                                                            
                                                               var formula=parseFloat($('#formula_'+id).val());
                                                               var formula2= parseFloat($('#formula2_'+id).val());
                                                               var profile= parseFloat($('#profile_'+id).val());
                                                               var setformula=formula*formula2;
                                         
                                                               if(uom==2)
                                                               {
                                                                     var toat=profile/setformula;
 
                                                               }

                                                               if(uom==8)
                                                               {
                                                                     var toat=profile/10.765;
                                                                     var toat=toat/setformula;
                                                               }
                                                               var toatvalsetval= Math.floor(toat);
                                                             
                                                         
                                                           
                                                               if(uom==2)
                                                               {


                                                                     var p_roll=profile/formula2;

                                                                     var p_roll2=toatvalsetval*formula;
                                                                     var pp_roll_tot=p_roll-p_roll2;
                                                                     var pp_roll_tot=pp_roll_tot.toFixed(2);
                                                                     $('#fact_'+id).val(pp_roll_tot.replace("-", ""));
                                                                     $('#nos_'+id).val(toatvalsetval);
                                                                     var factval=1;
                                                                     
                                                               }

                                                                if(uom==8)
                                                               {
                                                                     var convert=profile/10.765;

                                                                     var p_roll=convert/formula2;
                                                                     var p_roll2=toatvalsetval*formula;
                                                                     var pp_roll_tot=p_roll-p_roll2;
                                                                     var pp_roll_tot=pp_roll_tot.toFixed(2);
                                                                     $('#fact_'+id).val(pp_roll_tot.replace("-", ""));
                                                                     $('#nos_'+id).val(toatvalsetval);
                                                                     var factval=1;

                                                               }
                                                               
                                                                 
                                                             
                                                             var sqt_qty=profile;
                                                   }
                                                   else
                                                   {
                                                         console.log("profile7 >"+profile);

                                                          if(categories_id==613)
                                                           {   
                                                              let thicknessValue = $('#default_thickness_'+id).val(); 
                                                              let numericValue = parseFloat(thicknessValue.replace(/[^0-9.]/g, ''));  
                                                                console.log(numericValue);  

                                                                var sqt_qty=profile*fact*nos*numericValue;
                                                                var old_sqt_qty=profile*nos*old_fact;
                                                                var sqt_qty=sqt_qty.toFixed(3);

                                                           }else{

                                                                  var sqt_qty=profile*fact*nos;
                                                                    var old_sqt_qty=profile*nos*old_fact;
                                                                  var sqt_qty=sqt_qty.toFixed(3);
                                                           }
                                                   }
                                                   
                                                
                                                   
                                                  
                                               }
                                               if(type==16 || type==17)
                                               {
                                                   
                                                   var sqt_qty=profile*fact*nos;
                                                     var old_sqt_qty=profile*nos*old_fact;
                                                   var sqt_qty=sqt_qty.toFixed(3);
                                                   
                                                   
                                                 
                                                   
                                                  
                                               }
                                               if(type==10)
                                               {
                                                   
                                                   var sqt_qty=profile*fact*nos;
                                                     var old_sqt_qty=profile*nos*old_fact;
                                                   var sqt_qty=sqt_qty.toFixed(3);
                                                   
                                                  
                                               }
                                               
                                               if(type==0)
                                               {
                                                  
                                                  //  var subqty = parseFloat(profile);
                                                  //  var sqt=subqty*fact;
                                                  //  var sqt_qty=sqt*nos;
                                                  //  var old_sqt_qty=profile*nos*old_fact;
                                                  //  var sqt_qty = sqt_qty.toFixed(3);

                                                              // gg changes
                                                  var subqty = parseFloat(profile);
                                                  var fact = parseFloat(fact);
                                                  var nos = parseFloat(nos);

                                                  // Multiply the values
                                                  var sqt = (subqty * fact).toFixed(5); // Use 5 decimal places to handle intermediate values
                                                  var sqt_qty = (sqt * nos).toFixed(5); // Same for this step


                                                  if (sqt_qty.toString().indexOf('.') !== -1 && sqt_qty.toString().split('.')[1].length > 3) {
                                                      sqt_qty = Math.floor(sqt_qty * 1000) / 1000;  // Truncate to 3 decimal places
                                                  }

                                                            
                                               }
                                               
                                               if(type==13)
                                               {
                                                  
                                                   var subqty = parseFloat(profile);
                                                   var sqt=subqty*fact;
                                                   var sqt_qty=sqt*nos;
                                                   var old_sqt_qty=profile*nos*old_fact;
                                                   var sqt_qty = sqt_qty.toFixed(3);
                                                            
                                               }
                                               
                                               
                                               if(type==11 || type==12)
                                               {
                                                 


                                                    var subqty = parseFloat(profile);
                                                   var sqt=subqty*dim*crimp*fact;
                                                   var sqt_qty=sqt*nos;

                                                   var sqts=subqty*dim*crimp*old_fact;
                                                   var old_sqt_qty=sqts*nos;


                                                   var sqt_qty = sqt_qty.toFixed(3);
                                                            
                                               }
                                               
                           
                     
                         
                         
                      
                      
                      
                      
                      
                      
                     
                      $('#qty_'+id).html(sqt_qty);
                      $('#qty_'+id).val(sqt_qty);
                      
                      if(type==14)
                      {
                           var total=Math.round(rate*sqt_qty);
                           
                           
                          
                           
                      }
                      else
                      {
                          var total = rate * sqt_qty;
                      }
                      
                      
                      
                      
                       var totalammt=total.toFixed(2);
                       $('#amount_'+id).html(totalammt);
                      
                      
                      
                      
                      
                      
                      
                      
                       var nostotsum = 0;
                        $('.nos_'+categories_id).each(function(){
                            nostotsum += parseFloat($(this).val());  
                        });
                        var nostotsumtot=nostotsum.toFixed(2);
                        $('#nostot_'+categories_id).html(nostotsumtot);
                        
                        
                        
                        
                      
                      
                      
                        var cattotsum = 0;
                        $('.amounttot_'+categories_id).each(function(){
                            cattotsum += parseFloat($(this).text());  
                        });
                        var alltotalcat=cattotsum.toFixed(2);
                        $('#fulltotal_'+categories_id).html(alltotalcat);
                        
                        
                        
                        
                        var cattotsumqty = 0;
                        $('.qtyfind_'+categories_id).each(function(){
                             if($(this).text()>0)
                            {
                            cattotsumqty += parseFloat($(this).text());  
                            }
                        });
                        
                         var cattotsumqtyval = 0;
                         $('.qtyfind_'+categories_id).each(function(){
                             if($(this).val()>0)
                            {
                               cattotsumqtyval += parseFloat($(this).val());  
                            }
                         });
                       
                    
                            var alltotalcatqty=cattotsumqty.toFixed(3);
                            var cattotsumqtyval=cattotsumqtyval.toFixed(3);
                            
                           
                          
                           
                            $('#fullqty_'+categories_id).html(alltotalcatqty);
                            $('#saveactqty_'+categories_id).val(cattotsumqtyval);
                      
                           var weight=0;
                           if(categories_id==3)
                           {
                              
                                 var default_weight= parseFloat($('#default_weight_'+id).val());
                                 var thickness= $('#default_thickness_'+id).val();


                                if(uom==3)
                                                     { 


                                                        var profile=parseFloat($('#profile_'+id).val());
                                                        var crimp=parseFloat($('#crimp_'+id).val());
                                                

                                                     }


                                                     if(uom==4)
                                                     { 


                                                        var profile=parseFloat($('#profile_'+id).val())/304.8;
                                                        var crimp=parseFloat($('#crimp_'+id).val())/304.8;
                                                

                                                     }


                                                     if(uom==5)
                                                     { 


                                                        var profile=parseFloat($('#profile_'+id).val())*3.281;
                                                        var crimp=parseFloat($('#crimp_'+id).val())*3.281;
                                                

                                                     }


                                                      if(uom==6)
                                                      { 


                                                        var profile=parseFloat($('#profile_'+id).val())/12;
                                                        var crimp=parseFloat($('#crimp_'+id).val())/12;
                                                

                                                      }



                                                     var count= profile+crimp;




                                 var nos_data= parseFloat($('#nos_'+id).val());
                                 if(thickness=='0.40 MM')
                                 {
                                            
                                     var weight=count*0.305*3.3*nos_data;
                                 }
                                 
                                 if(thickness=='0.60 MM')
                                 {
                                            
                                     var weight=count*0.305*5.4*nos_data;
                                 }
                                 
                                 if(thickness=='0.50 MM')
                                 {
                                            
                                     var weight=count*0.305*4.2*nos_data;
                                 }
                                 
                                  if(thickness=='0.47 MM')
                                 {
                                            
                                     var weight=count*4*nos_data;
                                 }
                                 
                                 if(thickness=='0.45 MM')
                                 {
                                            
                                     var weight=count*0.305*3.8*nos_data;
                                 }
                                 if(thickness=='0.37 MM')
                                 {
                                            
                                     var weight=count*0.305*2.8*nos_data;
                                 }
                                 
                                 
                                
                                 
                                
                           }
                           else if(categories_id==36)
                           {
                                 var default_weight= parseFloat($('#default_weight_'+id).val());
                                 var thickness= $('#default_thickness_'+id).val();


                                                      if(uom==3)
                                                     { 


                                                        var profile=parseFloat($('#profile_'+id).val());
                                                        var crimp=parseFloat($('#crimp_'+id).val());
                                                

                                                     }


                                                     if(uom==4)
                                                     { 


                                                        var profile=parseFloat($('#profile_'+id).val())/304.8;
                                                        var crimp=parseFloat($('#crimp_'+id).val())/304.8;
                                                

                                                     }


                                                     if(uom==5)
                                                     { 


                                                        var profile=parseFloat($('#profile_'+id).val())*3.281;
                                                        var crimp=parseFloat($('#crimp_'+id).val())*3.281;
                                                

                                                     }


                                                      if(uom==6)
                                                      { 


                                                        var profile=parseFloat($('#profile_'+id).val())/12;
                                                        var crimp=parseFloat($('#crimp_'+id).val())/12;
                                                

                                                      }



                                                     var count= profile+crimp;



                                                     var nos_data= parseFloat($('#nos_'+id).val());
                                                     var weight=count*0.305*2.3*nos_data;
                                 
                               
                           }
                           else
                           {
                               
                                var default_weight= parseFloat($('#default_weight_'+id).val());
                                if(default_weight>0)
                                {
                                     
                                     if(inputname=='nos')
                                     {
                                        var weight=values*default_weight;
                                     }
                                      
                                 
                                
                                 }   
                               
                           }
                      
                      
                          var weight=weight.toFixed(2);
                          $('#weight_'+id).val(weight);

                          if(inputname == 'activel_qty'){
                              $('#weight_'+id).val(values);
                              var weight1 = values;
                            }else{

                              var weight1 = $('#weight_'+id).val();
                            }
                      
            
                       $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
                          data:{'inputname':inputname,'values':values,'weight':weight1,'sqt_qty':sqt_qty,'totalammt':totalammt,'ratechange':ratechange,'factchange':factchange,'id':id,'action':'InputUpdate','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                        }).success(function(data){
                                $http({
                                  method:"POST",
                                  url:"<?php echo base_url() ?>index.php/order/return_weight_update?order_id=<?php echo $order_id; ?>",
                                  data:{'order_id':<?php echo $order_id; ?>,'id':id,'action':'InputUpdate','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>','inputname': inputname}
                                }).success(function(data){
                                  $('#weight_'+id).val(data.weight);
                                   if(categories_id != 1 && categories_id != 32){
                                   var weight = 0;
                                  var weight = $scope.weight_Calculation(categories_id,uom, id, inputname, values);
                                  $('#weight_'+id).val(weight);
                                }
                                  $scope.fetchSingleDatatotal('1');

                                });
                    
                          if(data.error != '1')
                          {
                              
                              
                                  $scope.fetchSingleDatatotal('1');
                              
                               
                          }
                             
                       });
                       
           
           
  

      

}



$scope.inputsavecal_1 = function (id,uom,inputname,categories_id,type) {

                           
                           
                           
                     
                           
                         
                        
                     
                          var fieds=inputname+'_'+id;
                          var values=$('#'+fieds).val();
                          
                          
                        
                         
                         
                      
                          var crimp= parseFloat($('#crimpss_'+id).val());
                          var uombase=$('#uom_'+id).val();
                          var profile= parseFloat($('#profiless_'+id).val());
                          var uom= parseFloat($('#uomss_'+id).val());
                          
                         if(type==11)
                         {
                           var dim_one= parseFloat($('#dim_oness_'+id).val());
                           var dim_two= parseFloat($('#dim_twoss_'+id).val());
                           var dim_total=  parseFloat($('#dim_oness_'+id).val())+parseFloat($('#dim_twoss_'+id).val());
                           
                         }
                         else if(type==12)
                         {
                           var dim_one= parseFloat($('#dim_oness_'+id).val());
                           var dim_two= parseFloat($('#dim_twoss_'+id).val());
                           var dim_three= parseFloat($('#dim_threess_'+id).val());
                           var dim_total=  parseFloat($('#dim_oness_'+id).val())+parseFloat($('#dim_twoss_'+id).val())+parseFloat($('#dim_threess_'+id).val());
                           
                         }
                         else
                         {
                             var dim_one=0;
                             var dim_two=0;
                             var dim_three=0;
                             var dim_total=0;
                         }
                           
                         
                         if(categories_id==26)
                         {  
                              
                               var ppid= parseFloat($('#ppid_'+id).val());
                               $scope.productMM(ppid,values);
     
                         }
                         
                         var factval=0;
                         var nosval=0;
                         
                          if(categories_id==13)
                         { 
                                         
                                         
                                         if(uombase==2)
                                         {
                                              var formula=parseFloat($('#formula_'+id).val());
                                         }
                                         else
                                         {
                                               var formula= parseFloat($('#formula2_'+id).val());
                                         }
                                        
                                         var profile= parseFloat($('#profile_'+id).val());
                                         if(formula>0)
                                         {
                                            var toat=profile/formula;
                                         }
                                         else
                                         {

                                            var toat=0;

                                         }
                                        
                                         if(uombase==2)
                                         {
                                          
                                           var toatvalsetval= Math.round(toat);
                                         }
                                         else
                                         {
                                             var toatvalsetval=toat.toFixed(1);
                                         }
                                        
                                         $('#nos_'+id).val(toatvalsetval);
                                         
                                         
                                         var nosval=toatvalsetval;
                                          
                                         var toattt= Math.round(toat);


                                         var factset=profile-toattt;
                                         var factset=factset*formula;



                                         if(uombase==2)
                                         {
                                              let textfactset = factset.toFixed(3);
                                              $('#fact_'+id).val(textfactset.replace("-", ""));
                                              var factval=factset;
                                         }
                                         else
                                         {
                                              $('#fact_'+id).val(0);
                                              var factval=1;
                                         }
                                        
                                         
                                         
                                        
                          
                         }
                            
                       
                         if(uom==3)
                         {
                             
                         
                         
                                      if(values==3)
                                      {
                                         var profile= parseFloat($('#profiless_'+id).val());
                                         var crimp= parseFloat($('#crimpss_'+id).val());
                                         
                                      }
                                      
                                      if(values==4)
                                      {
                                          var profile= parseFloat(profile*304.8);
                                          var profile=profile.toFixed(3);
                                          
                                          var crimp= parseFloat(crimp*304.8);
                                          var crimp=crimp.toFixed(3);
                                          
                                          var dim_one= parseFloat(dim_one*304.8);
                                          var dim_one=dim_one.toFixed(3);
                                          
                                          var dim_two= parseFloat(dim_two*304.8);
                                          var dim_two=dim_two.toFixed(3);
                                          
                                          
                                          var dim_three= parseFloat(dim_three*304.8);
                                          var dim_three=dim_three.toFixed(3);
                                          
                                          
                                      }
                                      if(values==5)
                                      {
                                          var profile= parseFloat(profile*0.305);
                                          var profile=profile.toFixed(3);
                                          
                                          
                                           var crimp= parseFloat(crimp*0.305);
                                           var crimp=crimp.toFixed(3);
                                           
                                           
                                          var dim_one= parseFloat(dim_one*0.305);
                                          var dim_one=dim_one.toFixed(3);
                                          
                                          var dim_two= parseFloat(dim_two*0.305);
                                          var dim_two=dim_two.toFixed(3);
                                          
                                          
                                          var dim_three= parseFloat(dim_three*0.305);
                                          var dim_three=dim_three.toFixed(3);
                                          
                                         
                                      }
                                      if(values==6)
                                      {
                                          var profile= parseFloat(profile*12);
                                          var profile=profile.toFixed(3);
                                          
                                           var crimp= parseFloat(crimp*12);
                                           var crimp=crimp.toFixed(3);
                                           
                                           
                                           
                                          var dim_one= parseFloat(dim_one*12);
                                          var dim_one=dim_one.toFixed(3);
                                          
                                          var dim_two= parseFloat(dim_two*12);
                                          var dim_two=dim_two.toFixed(3);
                                          
                                          
                                          var dim_three= parseFloat(dim_three*12);
                                          var dim_three=dim_three.toFixed(3);
                                          
                                         
                                      }
                          
                          
                         }
                         
                          
                          
                          
                          if(uom==4)
                         {
                             
                         
                        
                                      if(values==4)
                                      {
                                         var profile= parseFloat($('#profiless_'+id).val());
                                         var crimp= parseFloat($('#crimpss_'+id).val());
                                      }
                                      
                                      if(values==3)
                                      {
                                          var profile= parseFloat(profile/304.8);
                                          var profile=profile.toFixed(3);
                                          var crimp= parseFloat(crimp/304.8);
                                          var crimp=crimp.toFixed(3);
                                          
                                          
                                          var dim_one= parseFloat(dim_one/304.8);
                                          var dim_one=dim_one.toFixed(3);
                                          
                                          var dim_two= parseFloat(dim_two/304.8);
                                          var dim_two=dim_two.toFixed(3);
                                          
                                          
                                          var dim_three= parseFloat(dim_three/304.8);
                                          var dim_three=dim_three.toFixed(3);
                                          
                                          
                                      }
                                      if(values==5)
                                      {
                                          var profile= parseFloat(profile/1000);
                                          var profile=profile.toFixed(3);
                                          
                                          var crimp= parseFloat(crimp/1000);
                                          var crimp=crimp.toFixed(3);
                                          
                                          
                                          var dim_one= parseFloat(dim_one/1000);
                                          var dim_one=dim_one.toFixed(3);
                                          
                                          var dim_two= parseFloat(dim_two/1000);
                                          var dim_two=dim_two.toFixed(3);
                                          
                                          
                                          var dim_three= parseFloat(dim_three/1000);
                                          var dim_three=dim_three.toFixed(3);
                                          
                                      }
                                      if(values==6)
                                      {
                                          var profile= parseFloat(profile/25.4);
                                          var profile=profile.toFixed(3);
                                          
                                          var crimp= parseFloat(crimp/25.4);
                                          var crimp=crimp.toFixed(3);
                                          
                                          
                                          
                                          var dim_one= parseFloat(dim_one/25.4);
                                          var dim_one=dim_one.toFixed(3);
                                          
                                          var dim_two= parseFloat(dim_two/25.4);
                                          var dim_two=dim_two.toFixed(3);
                                          
                                          var dim_three= parseFloat(dim_three/25.4);
                                          var dim_three=dim_three.toFixed(3);
                                          
                                          
                                        
                                      }
                          
                          
                         }
                         
                         
                         
                          if(uom==5)
                         {
                             
                         
                         
                                      if(values==5)
                                      {
                                         var profile= parseFloat($('#profiless_'+id).val());
                                         var crimp= parseFloat($('#crimpss_'+id).val());
                                      }
                                      
                                      if(values==3)
                                      {
                                          var profile= parseFloat(profile*3.281);
                                          var profile=profile.toFixed(3);
                                          var crimp= parseFloat(crimp*3.281);
                                          var crimp=crimp.toFixed(3);
                                          
                                          
                                          var dim_one= parseFloat(dim_one*3.281);
                                          var dim_one=dim_one.toFixed(3);
                                          
                                          var dim_two= parseFloat(dim_two*3.281);
                                          var dim_two=dim_two.toFixed(3);
                                          
                                          var dim_three= parseFloat(dim_three*3.281);
                                          var dim_three=dim_three.toFixed(3);
                                          
                                          
                                      }
                                      if(values==4)
                                      {
                                          var profile= parseFloat(profile*1000);
                                          var profile=profile.toFixed(3);
                                          
                                          var crimp= parseFloat(crimp*1000);
                                          var crimp=crimp.toFixed(3);
                                          
                                          
                                          var dim_one= parseFloat(dim_one*1000);
                                          var dim_one=dim_one.toFixed(3);
                                          
                                          var dim_two= parseFloat(dim_two*1000);
                                          var dim_two=dim_two.toFixed(3);
                                          
                                          
                                          var dim_three= parseFloat(dim_three*1000);
                                          var dim_three=dim_three.toFixed(3);
                                          
                                          
                                      }
                                      if(values==6)
                                      {
                                          var profile= parseFloat(profile*39.37);
                                          var profile=profile.toFixed(3);
                                          
                                          var crimp= parseFloat(crimp*39.37);
                                          var crimp=crimp.toFixed(3);
                                          
                                          
                                          
                                          var dim_one= parseFloat(dim_one*39.37);
                                          var dim_one=dim_one.toFixed(3);
                                          
                                          var dim_two= parseFloat(dim_two*39.37);
                                          var dim_two=dim_two.toFixed(3);
                                          
                                          var dim_three= parseFloat(dim_three*39.37);
                                          var dim_three=dim_three.toFixed(3);
                                          
                                        
                                      }
                          
                          
                         }
                         
                         
                          if(uom==6)
                         {
                             
                         
                         
                                      if(values==6)
                                      {
                                         var profile= parseFloat($('#profiless_'+id).val());
                                         var crimp= parseFloat($('#crimpss_'+id).val());
                                      }
                                      
                                      if(values==3)
                                      {
                                          var profile= parseFloat(profile/12);
                                          var profile=profile.toFixed(3);
                                          var crimp= parseFloat(crimp/12);
                                          var crimp=crimp.toFixed(3);
                                          
                                          
                                          var dim_one= parseFloat(dim_one/12);
                                          var dim_one=dim_one.toFixed(3);
                                          
                                          var dim_two= parseFloat(dim_two/12);
                                          var dim_two=dim_two.toFixed(3);
                                          
                                          var dim_three= parseFloat(dim_three/12);
                                          var dim_three=dim_three.toFixed(3);
                                          
                                          
                                          
                                      }
                                      if(values==4)
                                      {
                                          var profile= parseFloat(profile*25.4);
                                          var profile=profile.toFixed(3);
                                          
                                          var crimp= parseFloat(crimp*25.4);
                                          var crimp=crimp.toFixed(3);
                                          
                                          
                                          
                                          var dim_one= parseFloat(dim_one*25.4);
                                          var dim_one=dim_one.toFixed(3);
                                          
                                          var dim_two= parseFloat(dim_two*25.4);
                                          var dim_two=dim_two.toFixed(3);
                                          
                                          
                                          var dim_three= parseFloat(dim_three*25.4);
                                          var dim_three=dim_three.toFixed(3);
                                          
                                          
                                          
                                      }
                                      if(values==5)
                                      {
                                          
                                          var profile= parseFloat(profile/39.37);
                                          var profile=profile;
                                          
                                          var crimp= parseFloat(crimp/39.37);
                                          var crimp=crimp.toFixed(3);
                                          
                                          
                                          var dim_one= parseFloat(dim_one/39.37);
                                          var dim_one=dim_one.toFixed(3);
                                          
                                          var dim_two= parseFloat(dim_two/39.37);
                                          var dim_two=dim_two.toFixed(3);
                                          
                                          
                                          var dim_three= parseFloat(dim_three/39.37);
                                          var dim_three=dim_three.toFixed(3);
                                          
                                        
                                      }
                          
                          
                         }
                         
                         
                         
                         
                         
                         
                                   
                          
                       
                         
                       
                         
                         if(type==2)
                         {
                             
                             $('#crimp_'+id).val(crimp);
                             var profile= parseFloat($('#profiless_'+id).val());
                         }
                         else if(type==11)
                         {
                               var crimp= parseFloat($('#crimpss_'+id).val());
                               
                               $('#dim_one_'+id).val(dim_one);
                               $('#dim_two_'+id).val(dim_two);
                               
                               $('#crimp_'+id).val(crimp);
                               $('#profile_'+id).val(profile);
                         }
                         else if(type==12)
                         {
                               var crimp= parseFloat($('#crimpss_'+id).val());
                               
                               $('#dim_one_'+id).val(dim_one);
                               $('#dim_two_'+id).val(dim_two);
                               $('#dim_three_'+id).val(dim_three);
                               
                               $('#crimp_'+id).val(crimp);
                               $('#profile_'+id).val(profile);
                         }
                         else
                         {
                             
                               $('#crimp_'+id).val(crimp);
                               $('#profile_'+id).val(profile);
                         }
                         
                         
                         if(categories_id==26)
                         {
                             $scope.mmt=profile;
                         }
                       
                         
                        
                         
                         $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
                          data:{'profile':profile,'crimp':crimp,'factval':factval,'nosval':nosval,'dim_one':dim_one,'dim_two':dim_two,'dim_three':dim_three,'values':values,'id':id,'action':'actioncalculation','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                         }).success(function(data){
                    
                          if(data.error != '1')
                          {
                              
                               
                          }
                             
                       });
                       
       
                         if(categories_id==13)
                         { 
                                          
                                          //var type=$('#cateidtype_'+id).val();
                                          //$scope.inputsave_1(id,'profile',categories_id,type);
                                      
                         }

                         if(categories_id==1)
                         { 
                                          
                                          //var type=$('#cateidtype_'+id).val();
                                          //$scope.inputsave_1(id,'profile',categories_id,type);
                                      
                         }
                         $scope.inputsave_1(id,'profile',categories_id,type);
                         if(categories_id==20)
                         {
                               
                                  $scope.fetchData('1');
                         }
                        

      

}











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
        $scope.fetchDataCategorybase(1);
        $scope.fetchData('1');
        $scope.fetchSingleDatatotal('1');
        $('#autocomplete').val('');
        
        
        if(data.cate_status==1)
        {
              $scope.sizedefind(data.id,data.product_id,data.cateid,1,1);
        }
        else
        {
              var setheight= $('#datatable_'+data.cateid).get(0).scrollHeight;
              
              var setheight=parseInt(setheight)+50;
              
              $('.table-editable-info').scrollTop(setheight);
    
        }
        
       


      }

    });
    
    
    
    
    
     

}



}






$scope.saveDetails2 = function (event) {



if(event.keyCode==13)
{

         
         var checkboxformula=$('input[name="checkboxformula"]:checked').val();
         
         
         
        var product_name=$('#autocomplete3').val();
        var fact=$('#mmfact').val();
        
        
        var nos=$('#nnom').val();
        var profile=product_name+'/'+fact+'/'+nos;
        
        
        
        

    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
      data:{'product_id':$scope.product_id,'checkboxformula':checkboxformula,'profile':profile,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {

        
      
        $scope.profile = "";
        $scope.fetchDataCategorybase(1);
        $scope.fetchData('1');
        $scope.fetchSingleDatatotal('1');
        
        
        $('#autocomplete3').val('');
        $('#mmfact').val('');
        $('#nnom').val('');


      }

    });
         
      

}



}




$scope.savecommissionval = function () {





         $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
        data:{'commissionval':$scope.commissionval,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','action':'Commission','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
        }).success(function(data){
    
             
           location.reload();

    
    
    
        });




}


$scope.deliveryChareg = function () {

        
        
         $scope.fetchDataget();
         $scope.fetchSingleDatatotaldel('1');
        
        var deliverystatus=$('input[name="formRadios"]:checked').val();
        
       
        
        var delivery_charge=$('#delivery_charge').val();
        
         var delivery_mode=$('#delivery_mode').val();
         var cashmode=$('#cashmode').val();
         
         
                                                var selforder=0;
                                                  <?php
                                                if($this->session->userdata['logged_in']['access']=='20')
                                                {
                                                   ?>
                                                   
                                                   $('input[name="formRadios"]').prop('checked',true);
                                                    var selforder=1;
                                                   <?php
                                                    
                                                }
                                                                                
                                                ?> 
         
         
        if ($('input[name="formRadios"]').is(':checked'))
        {
        
        if(cashmode!='')
        {
            
            
            
                         var result=1;
                         if(selforder==1)
                        {
                            
                                 if(cashmode=='Cash')
                                 {
                                     var result=  $scope.denomoniationsave();  
                                
                                 }
                         
                         
                        }
                        
            
                      if(result==1)
                      {
                          
                      
                        $('#progress-company-document').hide();
                       // $("#progress-company-document").css("display", "block");
                        $('#progress-bank-detail').show();
                
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
                        data:{'payment_mode':cashmode,'delivery_mode':delivery_mode,'deliverystatus':deliverystatus,'delivery_charge':delivery_charge,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','action':'deliverystatus','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                        }).success(function(data){
                            
                            
                            $scope.fetchCustomerdetails();
                    
                        });
                        
                        
                      }
                        
                        
                        
                        
                        
                        
                        
                
        }
        else
        {
            
            
           
           
            
            alert('Select Payment Mode');
            $('#progress-company-document').show();
            $("#progress-company-document").css("display", "block");
            $('#progress-bank-detail').hide();
            
            return false;
            
        }
        
        
        
        
        
        
        
        }
        else
        {
            
            
            alert('Select Delivery Scope');
            $('#progress-company-document').show();
            $("#progress-company-document").css("display", "block");
            $('#progress-bank-detail').hide();
            
            return false;
            
        }
        
        
        





        


}









$scope.saveCustomer = function (event) {


if(event.keyCode==13)
{
  
  
  var autocomplete_customer=$('#autocomplete_customer').val();
 

 if(autocomplete_customer!="")
 {
     
      
      
   var userdataget=$('#userdataget').val();
 

   if(userdataget>0)
   {
        
        
        
    


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/customerupdate?order_id=<?php echo $order_id; ?>",
      data:{'customer':autocomplete_customer,'order_id':'<?php echo $order_id; ?>','count_id':'<?php echo $count_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {
          
         
          
         window.location.href=location.pathname+'?order_id='+data.id;
         

         $('#showcustomeredit').hide();
         $scope.customer = "";
         
         $('#autocomplete_customer').val('');
           
         $scope.fetchCustomerorderdata();
         $scope.fetchCustomerorderdelevieryaddress();
         $scope.fetchCustomerorcallbackhistroy();
         
         
         $scope.fetchCustomerororderhistroy('orders');
         $scope.fetchCustomerororderhistroy_qq('orders_quotation');
         $scope.fetchCustomerororderhistroy_oo('orders_process');
         $scope.fetchCustomerororderhistroy_return('orders_process');        
                 
         

      }

    });
    
    
    }
    else
    {
        
        
           $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/customerinsert?order_id=<?php echo $order_id; ?>",
              data:{'customer':autocomplete_customer,'order_id':'<?php echo $order_id; ?>','count_id':'<?php echo $count_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
        
              if(data.error != '1')
              {
                  
                 
                  
                 window.location.href=location.pathname+'?order_id='+data.id;
                 
        
                 $('#showcustomeredit').hide();
                 $scope.customer = "";
                 
                 $('#autocomplete_customer').val('');
                   
                 $scope.fetchCustomerorderdata();
                 $scope.fetchCustomerorderdelevieryaddress();
                 $scope.fetchCustomerorcallbackhistroy();
                 
                 
                 $scope.fetchCustomerororderhistroy('orders');
                 $scope.fetchCustomerororderhistroy_qq('orders_quotation');
                 $scope.fetchCustomerororderhistroy_oo('orders_process');
                 $scope.fetchCustomerororderhistroy_return('orders_process');        
                         
                 
        
              }
        
            });
                
        
    }
    
    
    
    
    
 }
 else
 {
     alert('Please fill Customer');
 }
    

}



}


$scope.saveCustomerupdate = function (event) {


if(event.keyCode==13)
{
  
  
  var autocomplete_customer=$('#autocomplete_customer').val();
 

 if(autocomplete_customer!="")
 {
     



    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/customerupdate?order_id=<?php echo $order_id; ?>",
      data:{'customer':autocomplete_customer,'order_id':'<?php echo $order_id; ?>','count_id':'<?php echo $count_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {
          
         
          
         window.location.href=location.pathname+'?order_id='+data.id;
         

         $('#showcustomeredit').hide();
         $scope.customer = "";
         
         $('#autocomplete_customer').val('');
           
         $scope.fetchCustomerorderdata();
         $scope.fetchCustomerorderdelevieryaddress();
         $scope.fetchCustomerorcallbackhistroy();
         
         
         $scope.fetchCustomerororderhistroy('orders');
         $scope.fetchCustomerororderhistroy_qq('orders_quotation');
         $scope.fetchCustomerororderhistroy_oo('orders_process');
         $scope.fetchCustomerororderhistroy_return('orders_process');        
                 
         

      }

    });
    
    
 }
 else
 {
     alert('Please fill Customer');
 }
    

}



}












$scope.saveLength = function () {
      
      
      var order_product_id=  $('#product_id_base_define').val();
      var base_id=  $("#base_id").val();
      var lengthval=$('#lengthval').val();
      //$('.baseProfile').text(lengthval);
      $('#profile_'+order_product_id).val(lengthval);
      
      var categories_id=$('#cateid_'+order_product_id).val();
      var type=$('#cateidtype_'+order_product_id).val();
     
      $scope.inputsave_1(order_product_id,'profile',categories_id,type);
      
      
      $scope.fetchDatasizeoptions(order_product_id,1,base_id,0);
      
    
}


$scope.saveNo = function () {
      
      
      var order_product_id=  $('#product_id_base_define').val();
      var base_id=  $("#base_id").val();
      var nobase=$('#nobase').val();
      //$('.baseProfile').text(nobase);
      $('#nos_'+order_product_id).val(nobase);
      
      var categories_id=$('#cateid_'+order_product_id).val();
      var type=$('#cateidtype_'+order_product_id).val();
     
      $scope.inputsave_1(order_product_id,'nos',categories_id,type);
      $scope.fetchDatasizeoptions(order_product_id,1,base_id,0);
      
    
}


$scope.getLenthandno = function (length,nos) {
      
      
      var order_product_id=  $('#product_id_base_define').val();
      var base_id=  $("#base_id").val();
      var lengthval=$('#lengthval').val(length);
      var nobase=$('#nobase').val(nos);
      
      //$('.baseProfile').text(lengthval);
      $('#profile_'+order_product_id).val(length);
      $('#nos_'+order_product_id).val(nos);
      
      var categories_id=$('#cateid_'+order_product_id).val();
      var type=$('#cateidtype_'+order_product_id).val();
     
      $scope.inputsave_1(order_product_id,'profile',categories_id,type);
      $scope.inputsave_1(order_product_id,'nos',categories_id,type);
      
      
    
}




$scope.saveSales = function (event) {


        
        var userdataget=$('#userdataget').val();
 


   if($scope.user_id!='')
   {
       
   

   if(userdataget>0)
   {
       
       
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/order/salesteamupdate?order_id=<?php echo $order_id; ?>",
          data:{'user_id':$scope.user_id,'order_id':'<?php echo $order_id; ?>','count_id':'<?php echo $count_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
        }).success(function(data){
    
          if(data.error != '1')
          {
    
            window.location.href=location.pathname+'?order_id='+data.id;
            $scope.fetchSingleDatatotal('1');
    
          }
    
        });
        
    
       
   }
   else
   {
       
       
          $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/order/salesteam?order_id=<?php echo $order_id; ?>",
          data:{'user_id':$scope.user_id,'order_id':'<?php echo $order_id; ?>','count_id':'<?php echo $count_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
        }).success(function(data){
    
          if(data.error != '1')
          {
    
            window.location.href=location.pathname+'?order_id='+data.id;
            $scope.fetchSingleDatatotal('1');
    
          }
    
        });
        
       
       
       
   }
   
   }
   else
   {
       alert('Select Behalf of');
   }




}

$scope.saveDate = function (event) {



   var create_date_set=$('#create_date_set').val();


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
      data:{'user_id':$scope.user_id,'create_date':create_date_set,'order_id':'<?php echo $order_id; ?>','count_id':'<?php echo $count_id; ?>','order_no':'<?php echo $order_no; ?>','action':'DateUpdate','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {

        $scope.fetchSingleDatatotal('1');

      }

    });
    
    





}



$scope.saveReason = function (event) {


 var reasonset=$('.reasonset').val();


if(reasonset)
{
    


 if(reasonset==1)
 {
     
            <?php 
            
            if($status_base=='1')
            {
                ?>
                
                
                 $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order/order_quotation_request",
                  data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','status':'3','deleteid':'3','movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                 }).success(function(data){
                     
                      alert('Order Moved');  
                      $scope.fetchCustomerorderdata();
                      $scope.fetchSingleDatatotal('1');
                      $scope.fetchCustomerorderdelevieryaddress();
                      $scope.fetchCustomerorcallbackhistroy();
                     
                });
                
                
                <?php
            }
            else
            {
                ?>
                
                
                   $http({
                      method:"POST",
                      url:"<?php echo base_url() ?>index.php/order/order_quotation_move",
                      data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':'0','movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                     }).success(function(data){
                        
                     alert('Order Moved');      
                     $scope.fetchCustomerorderdata();
                     $scope.fetchSingleDatatotal('1');
                     $scope.fetchCustomerorderdelevieryaddress();
                     $scope.fetchCustomerorcallbackhistroy();
                       
                    });
            
            
                
                <?php
            } ?>
            
      
           
        
     
     
 }
 else if(reasonset=='Competitor')
 {
     
     
     
     
     
     
     
         $('#competitorprice').modal('toggle');
          
          
        
     
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/order/savereason?order_id=<?php echo $order_id; ?>",
          data:{'reason':reasonset,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','movetablename':'<?php echo $movetablename; ?>','old_tablename':'<?php echo $old_tablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
         }).success(function(data){
    
          if(data.error != '1')
          {
    
            
             $scope.fetchSingleDatatotal('1');
             $scope.fetchCustomerorderdata();
             $scope.fetchCustomerorderdelevieryaddress();
             $scope.fetchCustomerorcallbackhistroy();
            
            
    
          }
    
        });
        
     
     
     
 }
 else
 {
     
     
     
     
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/order/savereason?order_id=<?php echo $order_id; ?>",
          data:{'reason':reasonset,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','movetablename':'<?php echo $movetablename; ?>','old_tablename':'<?php echo $old_tablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
        }).success(function(data){
    
          if(data.error != '1')
          {
    
            
         
             alert('Reason updated');   
             $scope.fetchSingleDatatotal('1');
             $scope.fetchCustomerorderdata();
             $scope.fetchCustomerorderdelevieryaddress();
             $scope.fetchCustomerorcallbackhistroy();
            
            
    
          }
    
        });
        
     
     
     
     
 }


 
    
    
    
    
    
    
    
    
} 





}

































$scope.saveRemarks = function (fieldset) {


               if(fieldset)
                {
                    
                    
                        var  order_product_id=$('#product_id_base_define').val();
                        var  fieldsetval=$('.'+fieldset).val();
                           
                        
                       $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/order/saveRemarks?order_id=<?php echo $order_id; ?>",
                          data:{'fieldset':fieldset,'fieldsetval':fieldsetval,'order_product_id':order_product_id,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','movetablename':'<?php echo $movetablename; ?>','old_tablename':'<?php echo $old_tablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                          }).success(function(data){
                    
                          
                    
                         });
                        
                
                    
                } 



}
















$scope.saveDiscount = function (event) {



//if(event.keyCode==13)
//{
  
 
  var saveDiscount=$('#saveDiscount').val();
  
  


 if(saveDiscount!="")
 {
     


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/discountupdate?order_id=<?php echo $order_id; ?>",
      data:{'discount':saveDiscount,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {

        
        //$scope.discount = "";
           
        $scope.fetchSingleDatatotal('1');

      }

    });
    
    
 }
 else
 {
     alert('Please input discount value');
 }
    

//}



}







$scope.saveRoundoff = function (event) {



//if(event.keyCode==13)
//{
  
 
  var roundoff=$('#roundoff').val();
  
  


 if(roundoff!="")
 {
       var discountfulltotal=$('#discountfulltotal').val();


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/roundoff?order_id=<?php echo $order_id; ?>",
      data:{'roundoff':roundoff,'discountfulltotal':discountfulltotal,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {

        
        //$scope.discount = "";
           
        $scope.fetchSingleDatatotal('1');

      }

    });
    
    
 }
 else
 {
     alert('Please input roundoff value');
 }
    

//}



}


















  $scope.fetchDatacalulation = function(id,type,convert){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_calculation?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&convert='+convert+'&type='+type+'&cid='+id).success(function(data){
      
      
      $scope.namesData = data;
      
      
      
    });
    
   
  
   
  };
  





  $scope.fetchDataget = function(id){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_get?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&convert='+id).success(function(data){
      
      
      $scope.namesDatadel = data;
      
      
      
    });
    
   
  
   
  };
  


  $scope.fetchData = function(id){
   


    $http.get('<?php echo base_url() ?>index.php/order_second/fetch_data?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&convert='+id).success(function(data){
      
      
      $scope.namesData = data;
      setTimeout(additionalLogic, 500);
      
      
      
    });
    
   
  
   
  };
  
   function additionalLogic() { // fact2 changes
    // Place your loop logic here
    angular.forEach($scope.namesData, function(item) {
        // Example: Alert each item's ID
        // alert(item.id);
        
        // Additional processing
        if (item.categories_id == 34 || item.categories_id == 36 || item.product_id == 1047) {
            var id = item.id;
            if (item.billing_options == '3') {
                $('#fact2_' + id).show();
                $('#fact_' + id).hide();
            } else {
                $('#fact_' + id).show();
                $('#fact2_' + id).hide();
            }
        }

        //$scope.allCheck(item.categories_id);

        // gg changes for loadall check
        
       // $scope.loadProductAll(item.categories_id);



    });
}
  
  
  
  
  
  
  
  
  
  
  $scope.fetchDataCategorybase = function(id){
   


    $http.get('<?php echo base_url() ?>index.php/order_second/fetchDataCategorybase?order_id=<?php echo $order_id; ?>&tablename_sub=<?php echo $tablename_sub; ?>&convert='+id).success(function(data){
      
      
      
      
      $scope.namesDatacate = data;
      
      
      
      
      
      
      
      
    });
    
   
  
   
  };

  
  $scope.markDeliveryaddress = function()
  {
      
       //$scope.fetchDataget();
      //$scope.fetchSingleDatatotaldel('1');
      
      var delivery_mode= $('#delivery_mode').val();
      var delivery_date_time= $('#delivery_date_time').val();
      
     
      
       var sum=0;
      
      if(delivery_mode=='full')
      {
              
              var partial = 0;
              var address_set = $(".address_set option:selected");
              var address_set_value = [];
              var order_product_id_set_value = [];
              for(var i = 0; i < address_set.length; i++){
                  
                   address_set_value.push(0);
                   order_product_id_set_value.push($(address_set[i]).data('id'));
                   sum += parseFloat(order_product_id_set_value);
              }
              var sum = 20;
              var address_id= address_set_value.join("|");
              var order_product_id= order_product_id_set_value.join("|");
              
      
          
      }
      else if(delivery_mode=='Self Pickup')
      {
         
              var partial = 2;
              var address_set = $(".address_set option:selected");
              var address_set_value = [];
              var order_product_id_set_value = [];
              for(var i = 0; i < address_set.length; i++){
                  
                   address_set_value.push(0);
                   order_product_id_set_value.push($(address_set[i]).data('id'));
                   sum += parseFloat(order_product_id_set_value);
              }
              
              var sum = 20;
              var address_id= address_set_value.join("|");
              var order_product_id= order_product_id_set_value.join("|");
     
      }
      else
      {
          
               var partial = 1;
               
              
              var address_set = $(".address_set option:selected");
              var address_set_value = [];
              var order_product_id_set_value = [];
              for(var i = 0; i < address_set.length; i++){
                  
                   address_set_value.push($(address_set[i]).data('value'));
                   order_product_id_set_value.push($(address_set[i]).data('id'));
                 
              }
              var address_id= address_set_value.join("|");
              var order_product_id= order_product_id_set_value.join("|");
              
              
            
              
           
              var spiltparicel = $(".spiltparicel");
               var order_product_id_set_value = [];
               for(var i = 0; i < spiltparicel.length; i++){
                  
                  if($(spiltparicel[i]).is(':checked')) {
                     order_product_id_set_value.push($(spiltparicel[i]).val());
                  }
                  else
                  {
                    order_product_id_set_value.push(0);
                  }
                   sum += parseFloat(order_product_id_set_value);
               }
            
               var order_product_id= order_product_id_set_value.join("|");
      
               
          
      }
      
      
  
     if(sum>0)
     {
         
    
        $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'delivery_mode':delivery_mode,'id':order_product_id,'address_id':address_id,'delivery_date_time':delivery_date_time,'order_id':'<?php echo $order_id; ?>','count_id':'<?php echo $count_id; ?>','partial':partial, 'action':'markDeliveryaddress','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
        }).success(function(data){
        
         $scope.fetchInvoiceloop();
         
      }); 
      
      
         $("#progress-seller-details").css("display", "none");
         $('#progress-company-document').css("display", "block");
         $('#progress-bank-detail').css("display", "none");
         
     }
     else
     {
         alert('Select Product Partial / Spilt fill the Modify QTY');
         $("#progress-seller-details").css("display", "block");
         $('#progress-bank-detail').css("display", "none");
         $('#progress-seller-details').show();
         $('#progress-company-document').hide();
         
         
     }
       
       
  
  };
  
  

 $scope.fetchInvoiceloop = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchInvoiceloop?order_id=<?php echo $order_id; ?>",
      data:{'action':'fetch_single_data','id':'<?php echo $order_id; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

          $scope.fetchInvoiceloopval = data;
     
    });
};


$scope.order_date=new Date();
 
// $scope.fetchSingleDatatotal = function(id){
//     $http({
//       method:"POST",
//       url:"<?php echo base_url() ?>index.php/order_second/fetch_single_data_total?order_id=<?php echo $order_id; ?>",
//       data:{'action':'fetch_single_data','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>','convert':id}
//       }).success(function(data){

//        $scope.fulltotal = data.fulltotal;
//   $scope.org_fulltotal = data.org_fulltotal;
       
//        $scope.commission = data.commission;
//        if(!data.order_no_id)
//        {
//               $scope.order_no_id = '<?php echo $order_no; ?>';
//               $scope.order_no_new = '<?php echo $order_no; ?>';
//               $scope.order_no_new_old = '<?php echo $order_no; ?>';
//               $scope.po_no='<?php echo $order_no; ?>';
//        }
//        else
//        {
//               $scope.order_no_id = data.order_no_id;
//               $scope.order_no_new = data.order_no_id;
//               $scope.order_no_new_old = data.order_no_id;
//               $scope.po_no=data.order_no_id;
          
//        }
       
//        if(!data.create_date)
//        {
//              $scope.create_date = '<?php echo date('d/m/Y'); ?>';
//        }
//        else
//        {
//            $scope.create_date = data.create_date;
          
//        }
       
//        if(!data.create_time)
//        {
//              $scope.create_time = '<?php echo date('h:i A'); ?>';
//        }
//        else
//        {
//            $scope.create_time = data.create_time;
          
//        }
       
//        if(data.user_id)
//        {
//             $scope.user_id = data.user_id;
//        }
//        if(data.reason)
//        {
//             $scope.reason = data.reason;
//        }
       
//        $scope.paricel_mode = data.paricel_mode;
        
//        $scope.totalitems = data.totalitems;
//        $scope.discounttotal = data.discount;
       
//        $scope.tcsamount = data.tcsamount;
       
//        $scope.discountfulltotal = data.discountfulltotal;
       
//        if(data.minisroundoff>0)
//        {
//            $scope.minisroundoff = data.minisroundoff;
//        }
//        $scope.roundoff_val=data.roundoff_val;
//        $scope.Meter_to_Sqr_feet = data.Meter_to_Sqr_feet;
     
//        $scope.roundoffstatusval_data = data.roundoffstatusval_data;
     
//        $scope.statusview = data.statusview;
     
//        $scope.fullqty = data.fullqty;
//        $scope.FACT = data.FACT;
//        $scope.UNIT = data.UNIT;
//        $scope.NOS = data.NOS;
     
//     });
// };


$scope.fetchSingleDatatotal = function(id){

     var checkedValues = [];
    angular.forEach(document.querySelectorAll('input.checkinsert:checked'), function (element) {
        checkedValues.push(element.value);
    });

    console.log(checkedValues);

    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order_second/fetch_single_data_total?order_id=<?php echo $order_id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>','convert':id,'type': 'check_return','checkedids':checkedValues}
      }).success(function(data){

        $scope.fulltotal = data.fulltotal;
        $scope.org_fulltotal = data.org_fulltotal;
        $scope.discount = data.discountPre;
        $scope.convertion = data.convertion;
        $scope.gsttotal = data.gsttotal;
        $scope.print_status = data.print_status;
        $scope.commission = data.commission;
        $scope.amounttotal_with_out_commission = data.amounttotal_with_out_commission;

        $scope.credit_limit_status = data.credit_limit_status;

        $scope.gate_login_view_status = data.gate_login_view_status;

        $('#gstview').val(data.gst_view);

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
        //For GST Task, Creating SGST and CGST from july 1
        if(!data.create_date_formatted)
        {
        $scope.create_date_formatted = '<?php echo date('d/m/Y'); ?>';
        }
        else
        {
        $scope.create_date_formatted = data.create_date_formatted;

        }

        console.log("data.create_date_formatted",data.create_date_formatted,'2024-05-31');
        if($scope.create_date_formatted > '2024-05-31'){
        $scope.gst_input = 0;
        }else{
        $scope.gst_input = 1;

        }



        if(!data.create_time)
        {
        $scope.create_time = '<?php echo date('h:i A'); ?>';
        }
        else
        {
        $scope.create_time = data.create_time;

        }


        //For GST Task, Creating SGST and CGST from july 1
        if(!data.create_time)
        {
        $scope.create_time = '<?php echo date('h:i A'); ?>';
        }
        else
        {
        $scope.create_time = data.create_time;

        }
        $scope.mark_date = data.mark_date;
        if(data.user_id)
        {
        $scope.user_id = data.user_id;
        }
        if(data.reason)
        {
        $scope.reason = data.reason;
        }



        if(data.delivery_status_check==1)
        {
        // $('#client_scope').show();
        // $('#own_scope').hide();
        //$("#formRadios1").prop("checked", true);
        }


        if(data.delivery_status_check==2)
        {
        //$('#own_scope').show();
        //$('#client_scope').hide();
        // $("#formRadiosRight1").prop("checked", true);

        }



        $scope.paricel_mode = data.paricel_mode;

        $scope.totalitems = data.totalitems;
        $scope.discounttotal = data.discount;
        $scope.DiscountAmount = data.discount;


        $scope.tcsamount = data.tcsamount;
        $scope.tcs_status = data.tcs_status;
        $scope.discountfulltotal = data.discountfulltotal;

        //for GST Subtotal
        // $scope.discountfulltotaldel = data.discountfulltotal;

        $scope.commissiontotal = data.commissiontotal;

        if(data.minisroundoff>0)
        {
        $scope.minisroundoff = data.minisroundoff;
        }

        $scope.roundoffstatus = data.roundoffstatus;
        $scope.roundoff_val=data.roundoff_val;
        $scope.Meter_to_Sqr_feet = data.Meter_to_Sqr_feet;

        $scope.roundoffstatusval_data = data.roundoffstatusval_data;
        $scope.symble = data.symble;

        $scope.statusview = data.statusview;

        $scope.fullqty = data.fullqty;
        $scope.FACT = data.FACT;
        $scope.UNIT = data.UNIT;
        $scope.NOS = data.NOS;
     
    });
};













$scope.fetchSingleDatatotaldel = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_totaldel_view_base?order_id=<?php echo $order_id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>','convert':id}
      }).success(function(data){

       $scope.fulltotaldel = data.fulltotal;
       
       $scope.commissiondel = data.commission;
       
       
       $scope.paricel_mode_del = data.paricel_mode;
       
       
       if(data.paricel_mode==1)
       {
           $('#delivery_mode').val('Partial/Spilt');
           $('.paricel').show();
           $('.normal').hide();
       }
       
      
       $scope.totalitemsdel = data.totalitems;
       $scope.discounttotaldel = data.discount;
        $scope.tcsamount = data.tcsamount;
       $scope.discountfulltotaldel = data.discountfulltotal;
       
       if(data.minisroundoff>0)
       {
       $scope.minisroundoff = data.minisroundoff;
       
       }
       
       $scope.lengeth = data.lengeth;
       $scope.fullqtydel = data.fullqty;
      
    });
};












$scope.fetchCustomerorderdata = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchcustomerorderdata?order_id=<?php echo $order_id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

       $scope.customername = data.company_name;
       $scope.customerphone = data.phone;
       
       
       $scope.locality_name = data.locality_name;
       $scope.customer_id = data.customer_id;
      
       $scope.credit_limit = data.credit_limit;
       $scope.fulltotal_usage = data.fulltotal_usage;
       $scope.credit_period = data.credit_period;
       
       $scope.ratings = data.ratings;
       $scope.useage = data.useage;
       $scope.approx_id = data.approx;
       
       
      
       
       $scope.order_base = data.order_base;
       $scope.finance_status = data.finance_status;
       
       if(data.finance_status==5)
       {
            $('#showorderbase').show();
       }
      
       
       $scope.commission_check = data.commission_check;
       $scope.gst_check = data.gst_check;
       $scope.SSD_check = data.SSD_check;
       
       $('#delivery_date_time').val(data.delivery_date_time);
       $scope.delivery_date_time = data.delivery_date_time;
       $scope.competitorname = data.competitorname;
       $scope.details = data.details;
       
       $scope.delivery_address = data.delivery_address;
     
    });
};





$scope.fetchCustomerorderdelevieryaddress = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerorderdelevieryaddress?order_id=<?php echo $order_id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

          $scope.namesDataaddress = data;
     
    });
};






$scope.fetchCustomerorcallbackhistroy = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerorcallbackhistroy",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

          $scope.namesCallback = data;
     
    });
};




$scope.fetchCustomerororderhistroy = function(table){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroy",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablenamemain':table}
    }).success(function(data){

                $scope.namesHistory = data;
          
    });
};



$scope.fetchCustomerororderhistroy_qq = function(table){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroy",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablenamemain':table}
    }).success(function(data){

                $scope.namesHistoryqq = data;
          
    });
};



$scope.fetchCustomerororderhistroy_oo = function(table){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroy",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablenamemain':table}
    }).success(function(data){

                $scope.namesHistoryoo = data;
          
    });
};


$scope.fetchCustomerororderhistroy_returns = function(table){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroy_return",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablenamemain':table}
    }).success(function(data){

                $scope.namesHistoryre = data;
          
    });
};


$scope.fetchCustomerororderhistroyorderlist = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroyorderlist",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablenamemain':'orders_process','tablename_sub':'order_product_list_process'}
    }).success(function(data){

          $scope.namesHistoryorder = data;
          
         
    });
};




  $scope.sales_group = "0";
$scope.billing_options=1;
$scope.calulation =3;
$scope.calulationmm =4;
$scope.changeCalulation = function(id,type){
   
   var convert=$('#cal_'+id+type).val();
   $scope.fetchDatacalulation(id,type,convert);

};





$scope.changeCalulationINC = function(id,type){
   
    var convert=$('#cal_'+id+type).val();
    
    $scope.fetchDatacalulation(id,type,convert);

};




$scope.changeCalulationMM = function(id,type){
   
    var convert=$('#cal_'+id+type).val();
    $scope.productMM(15,convert);
    $scope.fetchDatacalulation(id,type,convert);
 
};




$scope.fetchpricelist = function(id){
    

    
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchpricelist?order_id=<?php echo $order_id; ?>",
      data:{'product_id':id}
    }).success(function(data){

          $scope.namesDataprice= data;
          
     
    });
};
















$scope.submitForm = function(){
      
      
      
      
    var ratings=  $('.ratingnum').text();
    
  
      
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/customeradd",
      data:{'status':'1','sales_team_id':$scope.sales_team_id,'google_map_link':$scope.google_map_link,'order_id':'<?php echo $order_id; ?>','count_id':'<?php echo $count_id; ?>','phone':$scope.phone,'zone':$scope.zone,'locality':$scope.locality,'city':$scope.city,'state':$scope.state,'pincode':$scope.pincode,'landmark':$scope.landmark,'address1':$scope.address1,'address2':$scope.address2,'company_name':$scope.company_name,'gst':$scope.gst,'landline':$scope.landline,'email':$scope.email,'sales_group':$scope.sales_group,'id':$scope.hidden_id,'action':'Save','tablename':'customers','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

              $scope.success = false;
              $scope.error = true;
              $scope.hidden_id = "";
               $scope.phone = "";
              $scope.errorMessage = data.massage;

          }
          else
          {
             
          
              
              
            $scope.fetchCustomerorderdata();
            $scope.fetchCustomerorderdelevieryaddress();
            $scope.fetchCustomerorcallbackhistroy();
            $scope.success = true;
            $scope.error = false;
            $scope.name = "";
            $scope.email = "";
            $scope.phone = "";
            $scope.city = "";
            $scope.state = "";
            $scope.zone="";
            $scope.address1 = "";
            $scope.address2 = "";
            $scope.company_name = "";
            $scope.locality = "";
            $scope.sales_team_id="";
           
            $scope.google_map_link = "";
            $scope.gst = "";
            $scope.landline = "";
            $scope.landmark = "";

            $scope.pincode = "";


            $scope.sales_group = "";
            $scope.successMessage = data.massage;
          

          }

          

      }

       
    });
  };



$scope.submitFormaddress = function(){
      
      
      
      
      var table='<?php echo $tablename; ?>';
 
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/customeradd_address",
      data:{'status':'1','google_map_link':$scope.google_map_link,'order_id':'<?php echo $order_id; ?>','phone':$scope.phone,'zone':$scope.zone,'locality':$scope.locality,'city':$scope.city,'state':$scope.state,'pincode':$scope.pincode,'landmark':$scope.landmark,'address1':$scope.address1,'address2':$scope.address2,'name':$scope.name,'id':$scope.hidden_id,'action':'Save','tablename':'customers','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

              $scope.success = false;
              $scope.error = true;
              $scope.hidden_id = "";
               $scope.phone = "";
              $scope.errorMessage = data.massage;

          }
          else
          {
             
            $('#addaddress').hide(); 
             
            $scope.fetchCustomerorderdata();
            $scope.fetchCustomerorderdelevieryaddress();
            $scope.fetchCustomerorcallbackhistroy();
            
            
            
            if(table!='orders')
            {
                $('#imagesizemodel-delivery-setup').modal('toggle');
            }
            
            
            
            $scope.success = true;
            $scope.error = false;
            $scope.name = "";
         
            $scope.phone = "";
            $scope.city = "";
            $scope.state = "";
            $scope.zone="";
            $scope.address1 = "";
            $scope.address2 = "";
            $scope.name = "";
            $scope.locality = "";
            $scope.sales_team_id="";
           
            $scope.google_map_link = "";
            $scope.gst = "";
            $scope.landline = "";
            $scope.landmark = "";

            $scope.pincode = "";


            $scope.successMessage = data.massage;
          

          }

          

      }

       
    });
  };
  
  
  
  
/*
  $scope.allCheck = function(cateid){
      
       if ($('.allcheck_'+cateid).is(':checked'))
       {
           
            $('.fill_'+cateid).prop('checked',true);
        }
        else
        {
            $('.fill_'+cateid).prop('checked',false);
            
        }
      
  };
  
*/






$scope.loadProductAll = function (cate_id) {

 
  if ($('.allcheck_'+ cate_id).is(':checked')) {

                  $('.fill_'+ cate_id).each(function () {

                    var id = $(this).val();
                    $('.fill_'+ cate_id).prop('checked', true);
                    $scope.update_status_material_return(id);  

                  });

      }else {

        
                  $('.fill_'+ cate_id).each(function () {

                  var id = $(this).val();
                  $('.fill_'+ cate_id).prop('checked', false);
                  $scope.update_status_material_return(id);  

                  });

      }

};










 $scope.submitPurchaserequest = function(){
      
      
         var optionid='<?php echo $optionid; ?>';
               
          var product_order_id = [];
      
           $('input[name="checkinsert"]:checked').each(function(){
               
                    product_order_id.push($(this).val()); 
                
            });
            
             var checkinsert= product_order_id.join("|");


             var op_id = [];
      
           $(".oid").each(function(){
               
                    op_id.push($(this).val()); 
                
            });
            
             var opid= op_id.join("|");
             
             
             $('#perchaserequest').modal('toggle');
             
             
             var arrival_date=$('#arrival_date').val();
             var return_remarks=$('#return_remarks').val();
             var billamount=$('#discountfulltotal').val();
      
               $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order_second/sales_return_data",
                  data:{'order_product_id':checkinsert,'optionid':optionid,'return_remarks':return_remarks,'billamount':billamount,'arrival_date':arrival_date,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>','opid': opid}
                }).success(function(data){
                   
                   
                   
                   alert(data.massage);
                   
                   if(optionid=='3')
                   {
                       window.location.replace("<?php echo base_url(); ?>index.php/order/sales_return?view=1");
                   }
                   else
                   {
                       window.location.replace("<?php echo base_url(); ?>index.php/order/sales_return");
                   }
                    
                   
                   
                });
    
    
    
    
  };
  
  
  $scope.submitCompetitor = function(){
      
  
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/saveCompetitor",
      data:{'order_id':'<?php echo $order_id; ?>','competitorname':$scope.competitorname,'details':$scope.details,'tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){
       
              $scope.successcc = true;
            
             
              $scope.competitorname = "";
              $scope.details = "";
              $scope.successMessage_c = 'Competitor Details Updated';

       
    });
  };
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  $scope.addprice = function(){
      
      
      
   var product_id= $('#product_id').val();
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/addprice",
      data:{'product_id':product_id,'name':$scope.cname,'price':$scope.cprice,'sqft':$scope.csqft}
    }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

              $scope.success = false;
              $scope.error = true;
              $scope.hidden_id = "";
              $scope.phone = "";
              $scope.errorMessage = data.massage;

          }
          else
          {
             
           
            $scope.success = true;
            $scope.error = false;
            $scope.cname = "";
         
            $scope.cprice = "";
            $scope.csqft = "";
        
            $scope.fetchpricelist(product_id);

            $scope.successMessage = data.massage;
          

          }

          

      }

       
    });
  };
  
  
  
$scope.savebutton = 'Saved';

   
   
   
   
   
   
   
   
   
    $scope.checkVal = function(){
        
        
         var status=$('input[name="checkboxEl"]:checked').val();
         
         
           if($('input[name="checkboxEl"]').prop("checked") == true)
           {
                        var deleteid=0;
                        $('#firstmodal').modal('toggle');
                        $scope.savebutton = 'Saved';
            }
            else
            {
                 var deleteid=1;
                 $scope.savebutton = 'Save';
            }


          if(deleteid==0)
          {
              
          
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_move",
              data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
               
               
            
              $scope.fetchCustomerorderdata();
              $scope.fetchSingleDatatotal('1');
              
             var orderstatustable='<?php echo $tablename; ?>';
              
              if(orderstatustable=='orders')
              {
                  window.location.replace("<?php echo base_url(); ?>index.php/order/quotation_list");
              }
              
              
              
               
            });
            
            
          }
        
        
     
    }
    
    
    
    
    
    
    
    
    
    
    
    $scope.saveArchive = function(){
        
        
       
           

          if($scope.order_no_new!='')
          {
              
          
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_archive",
              data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no_new':$scope.order_no_new,'order_no_old':$scope.order_no_old,'movetablename_sub':'<?php echo $tablename_sub; ?>','movetablename':'<?php echo $tablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
               
               
               
               alert('Save To Archive');
                $('#archiveOpen').modal('toggle');
             
               
            });
            
            
          }
        
        
     
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    $scope.checkValRequiestpurchaseteam = function(orderstatus,namestatus){
        
        
         
                 
                        var deleteid=0;
                        $('#firstmodal').modal('toggle');
                        $scope.savebutton = 'Saved';
                       
                       
                       $http({
                       method:"POST",
                       url:"<?php echo base_url() ?>index.php/order/order_quotation_move_status",
                       data:{'status':'1','orderstatus':orderstatus,'namestatus':namestatus,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                       }).success(function(data){
                       
                       
                    
                        $scope.fetchCustomerorderdata();
                        $scope.fetchSingleDatatotal('1');
                       
                        });
                 
        
     
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     $scope.checkfinishVal = function(){
         $('#btncom').hide();
        
                var status=$('input[name="checkboxEl"]:checked').val();
             
             
                if($('input[name="checkboxEl"]').prop("checked") == true)
                {
                            var deleteid=0;
                            $('#firstmodal').modal('toggle');
                            $scope.savebutton = 'Saved';
                }
                else
                {
                             var deleteid=1;
                             $scope.savebutton = 'Save';
                }
                
                
                
                
                                                var selforder=0;
             
             
                                                <?php
                                                if($this->session->userdata['logged_in']['access']=='20')
                                                {
                                                   ?>
                                                   
                                                    var selforder=1;
                                                   <?php
                                                    
                                                }
                                                                                
                                                ?> 
                                                


       
              $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_move_finish",
              data:{'status':'1','order_id':'<?php echo $order_id; ?>','selforder':selforder,'order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
              }).success(function(data){
               
                 
            
                  $scope.fetchCustomerorderdata();
                  $scope.fetchSingleDatatotal('1');
                 
                 
                    var payment_mode=$('#cashmode').val();
                    if(selforder==1)
                    {
                        
                    
                    
                                 if(payment_mode=='Cash')
                                 {
                                       //$scope.denomoniationsave();  
                                
                                 }
                            
                
                    }
                 
                  var orderstatustable='<?php echo $tablename; ?>';
                  
                  if(orderstatustable=='orders_quotation')
                  {
                      window.location.replace("<?php echo base_url(); ?>index.php/order/orders_list");
                  }
                 
                 
               
            });
            
            
            
            
          
        
     
    }
    
    
    
        
     $scope.checkfinishValfinish = function(){
           
           $('#btncom').hide();
        
             var deleteid=0;
             var selforder=0;
             
             
                                                <?php
                                                if($this->session->userdata['logged_in']['access']=='20')
                                                {
                                                   ?>
                                                   
                                                    var selforder=1;
                                                   <?php
                                                    
                                                }
                                                                                
                                                ?> 
                                                
                                                
                                                
                                                
          

       
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_move_finish_by_deilvered",
              data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','selforder':selforder,'deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
               
               
            $scope.fetchCustomerorderdata();
             $scope.fetchSingleDatatotal('1');  
               
            });
            
            
            
            
            
            
            
            
             var payment_mode=$('#cashmode').val();
            
            if(selforder==1)
            {
                
             if(payment_mode=='Cash')
             {
                   //$scope.denomoniationsave();  
            
             }
             
             
            }
            
             
            
            
        
     
    }
    
    
    
     $scope.denomoniationsave = function()
     {
         
         
             var c1_rs= $('#1_rs').val();
             var c2_rs= $('#2_rs').val();
             var c5_rs= $('#5_rs').val();
            
            
             var c10_rs= $('#10_rs').val();
             var c20_rs= $('#20_rs').val();
             
             var c50_rs= $('#50_rs').val();
             var c100_rs= $('#100_rs').val();
             var c200_rs= $('#200_rs').val();
             var c500_rs= $('#500_rs').val();
             var c2000_rs= $('#2000_rs').val();
             var validation_amount= $('#fulltotal').data('value');
             var amount_data= $('#fulltotal').val();
             var return_excess= $('#return_excess').val();
             var return_excess1= $('#return_excess1').val();
             var payment_mode=$('#cashmode').val();
             if(amount_data>0)
             {
                 
    
                       $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/denominationsave_self",
                        data:{'c1_rs':c1_rs,'c2_rs':c2_rs,'c5_rs':c5_rs,'c10_rs':c10_rs,'c20_rs':c20_rs,'c50_rs':c50_rs,'c100_rs':c100_rs,'c200_rs':c200_rs,'c500_rs':c500_rs,'c2000_rs':c2000_rs,'paymentmode':payment_mode,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>'}
                        }).success(function(data){
                    
                          
                    
                        });
                        
                        return 1;
                        
             }
             else
             {
                      alert('Fill The Denomination');
                      $('#imagesizemodel-delivery-setup').css("display", "block");
                      $('#dinomainitionview').css("display", "block");
                      
                        $('#progress-company-document').show();
                        $("#progress-company-document").css("display", "block");
                        $('#progress-bank-detail').hide();
                      return 0;
             }
         
         
     }
    
    
    
    
    
    
    
    
    
     $scope.checkfinishValfinishparicel = function(){
        
        
         var deleteid=0;
          

       
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_move_finish_by_paricel",
              data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
               
               
             $scope.fetchCustomerorderdata();
             $scope.fetchSingleDatatotal('1');  
               
            });
        
        
     
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     $scope.checkfinishValff = function(){
         $('#btncom').hide();
        
         var status=$('input[name="checkboxEl"]:checked').val();
         
         
           if($('input[name="checkboxEl"]').prop("checked") == true)
           {
                        var deleteid=0;
                        $('#firstmodal').modal('toggle');
                        $scope.savebutton = 'Saved';
            }
            else
            {
                 var deleteid=1;
                 $scope.savebutton = 'Save';
            }


       
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_move_finish_sh",
              data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
               
               
              $scope.fetchCustomerorderdata();
               $scope.fetchSingleDatatotal('1');
               
            });
        
        
     
    }
    
    
    $scope.Purchaserequest = function(){
        
        
         var checkinsert=$('input[name="checkinsert"]:checked').val();
                
          if (typeof checkinsert === "undefined") {
                   var checkinsert=0;
          }
                
              
          if(checkinsert!=0)
          {
              
              var rate=$('#rate_'+checkinsert).val();
              $('#price_details').val(rate);
              
              $('#perchaserequest').modal('toggle');
                
          }
          else
          {
              alert('Select Checkbox Button');
          }
                
            
    
    };
    
    
     $scope.checkValset = function(){
        
        
            var status=$('input[name="checkValset"]:checked').val();
            if($('input[name="checkValset"]').prop("checked") == true)
            {
                        var deleteid=3;
                        $('#firstmodal_price_request').modal('toggle');
            }
            else
            {
                        var deleteid=0;
                        $scope.savebutton = 'Save';
            }


       
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_price_request",
              data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
               
               
               $scope.fetchCustomerorderdata();
               $scope.fetchSingleDatatotal('1');
               
            });
        
        
     
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     $scope.showCompetitor = function(){
    
    
         $('#competitorpriceview').modal('toggle');
    
     }
    
    
     $scope.checkValCommission = function(){
        
        
        
         
         
           if($('input[name="checkboxcommision"]').prop("checked") == true){
                  
              
                 
                  var value=1
                  
                  $('#firstmodalcommison').modal('toggle');
                  
                  
                  
            }
            else
            {
                  var value=0
                  $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order/checkValCommission",
                  data:{'status':value,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                  }).success(function(data){
                    
                    location.reload();
                    
                   
                 });
                  
            }

            
            
            
            
        


           
        
     
    }
    
    
    
    
    
    
    $scope.checkValGST = function(){
        
        
        
         
         
           if($('input[name="gstmark"]').prop("checked") == true){
                 
                  var value=1
                  
            }
            else
            {
                  var value=0
                 
            }

            
            
            
            
                 $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order/checkValGST",
                  data:{'status':value,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                  }).success(function(data){
                    
                  
               });


           
        
     
    }
    
    $scope.checkValSSD = function(){
        
        
        
         
         
           if($('input[name="ssdmark"]').prop("checked") == true){
                 
                  var value=1
                  
            }
            else
            {
                  var value=0
                 
            }

            
            
            
            
                 $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order/checkValSSD",
                  data:{'status':value,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                  }).success(function(data){
                    
                  
               });


           
        
     
    }
    
    
    
     $scope.archiveOpen = function(){
        
        
        
         
                  
                  $('#archiveOpen').modal('toggle');
            
            
        
        
     
    }
    
    
    
    
    
    
    
    
    
    
    
    $scope.checkValRequiest = function(){
        
        
             var status=$('input[name="checkapproved"]:checked').val();
             
             
           
         
         
            if($('input[name="checkapproved"]').prop("checked") == true){
               
                   var deleteid=3;
                   $('#firstmodal3').modal('toggle');
                   $scope.savebutton = 'Saved';
               
                
            }
            else
            {
                var deleteid=0;
                $scope.savebutton = 'Save';
            }


       
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_request",
              data:{'status':status,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
                
                
                
            });
        
        
     
    }















$scope.checkValRequiesttl = function(){
        
           
           
           
           $scope.fetchDataget();
           $scope.fetchSingleDatatotaldel('1');
             
           $('#imagesizemodel-delivery-setup').modal('toggle');
       
            
     
}













$scope.getpencodeDetails = function (event) {







 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/pincode",
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.city = data.city;
            $scope.state =  data.state;
            $scope.zone =  data.locality;

    });





}



$scope.deleteData = function(id){
    //if(confirm("Are you sure you want to remove it?"))
    //{
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Deletesub','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){
       
         $scope.fetchData('1');
         $scope.fetchSingleDatatotal('1');
         $scope.fetchDataCategorybase('1');
         
         
      }); 
    //}
};


 
 $scope.deleteDataimage = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
        
       var product_id=$('#order_product_id_base_define').val();   
       var cate_id= $('#clickcateid').val();
       var order_product_id=$('#product_id_base_define').val();
        
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/products/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'product_images'}
      }).success(function(data){
         
          $scope.imgpreviewimages(product_id,cate_id,order_product_id);
          
      }); 
    }
};
 



$scope.appprox = function(st){ 
    //if(confirm("Are you sure you want to remove it?"))
    //{
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'action':'appprox','appprox_status':st,'tablenamemain':'<?php echo $tablename; ?>','order_id':'<?php echo $order_id; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){
       
         $scope.fetchData('1');
         $scope.fetchSingleDatatotal('1');
         $scope.fetchCustomerorderdata();
         
      }); 
    //}
};






$scope.returnfinsh = function(){
   
        
              var returnid = $(".returnid");
              var order_product_id_set_value = [];
              var status = [];
               for(var i = 0; i < returnid.length; i++){
                  
                  if($(returnid[i]).is(':checked'))
                  {
                      
                   order_product_id_set_value.push($(returnid[i]).val());
                   status.push(1);
                   
                  }
                  else
                  {
                      order_product_id_set_value.push($(returnid[i]).val());
                      status.push(0);
                  }
                 
               }
            
               var order_product_id= order_product_id_set_value.join("|");
                var status_id= status.join("|");
      
        
                $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                    data:{'action':'returnproduct','status':status_id,'order_product_id':order_product_id,'tablename_sub':'order_product_list_process '}
                  }).success(function(data){
                   
                }); 
         
};


$scope.convertPlus = function(num){
    
    
    
     var discountfulltotal=$('#discountfulltotal').val();
                $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order/convertPlus?order_id=<?php echo $order_id; ?>",
                  data:{'num':num,'discountfulltotal':discountfulltotal,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                }).success(function(data){
            
                  if(data.error != '1')
                  {
            
                       
                    $scope.fetchSingleDatatotal('1');
            
                  }
            
                });
    
    
}; 


$scope.convert = function(id){
    
          $scope.fetchData(id);
          //$scope.fetchDataCategorybase(id);
          $scope.fetchSingleDatatotal(id);
         
         if(id==1)
         {
             $scope.defaultvalue = '(MTR)';
         }
         else
         {
             $scope.defaultvalue = '(SQFT)'; 
         }
        
};

$scope.sizedefind = function(id,product_id,cateid,profile_val,base_id){
       
       
       
        $('#item1').prop('checked',true);
       
       
        $('#product_id_base_define').val(id);
        $('#order_product_id_base_define').val(product_id);
        $('#clickcateid').val(cateid);
         
       
        
       $('.table-editable-info').scrollTop(0);
        
        if(cateid==32)
        {
            $('.showhide').hide();
            $('#imagedraw1').hide();
            $('#imagedraw2').hide();
            $('#productupload').hide();
            
        }
        else
        {
            $('.showhide').show(); 
            $('#imagedraw2').hide();
            $('#imagedraw1').show();
           
        }
        
      
        
        
        if(cateid==32)
        {
             $('#defaultattacmentrow').hide();
             
             var data='<div class="row twoBoxInput"> <div class="col-md-4"> <div class="form-group row"> <div class="col-sm-12"> <input class="form-control label1" placeholder="Center" name="label1[]" type="text"> </div> </div> </div> <div class="col-md-4"> <div class="form-group row"> <div class="col-sm-12"> <input class="form-control label2" placeholder="Side Bottom" name="label2[]" type="text"> </div> </div> </div>   <div class="col-md-4"> <div class="form-group row"> <div class="col-sm-12"> <input class="form-control degree" placeholder="Degree" name="degree[]" type="text"> </div> </div> </div> </div>';
            
             $('#show_details2').html(data);
             $('#show_details').html('');
             
             
             
            
        }
        else
        {
             $('#defaultattacmentrow').show();
             
             $('#show_details2').html('');
            
        }
        
       
        
        
        var image_length=$('#image_length_'+id).val();
        $('#enterlengthval').val(image_length);
        
        
        
        $scope.fetchDatasizeoptions(id,product_id,1,0);
        $scope.fetchDatasizeoptionsvalue(id,product_id);
        $scope.fetchDatasizeoptionsvalueTotal(id,product_id);
        $scope.fetch_single_data(id);
        
        
        $scope.fetchDataBaseSize(image_length,base_id);
       
        
};




$scope.specificationFind = function(id,product_id){
    
        $('#product_id_base_define').val(id);
        $('#order_product_id_base_define').val(product_id);
        
        $scope.specificationFinddata(id,product_id);
     
};




 $scope.specificationFinddata = function(id,product_id){
           
            
                                $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/specificationFind",
                                data:{'product_id':product_id,'order_product_id':id,'tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                }).success(function(data){
                                    
                                <?php
                                foreach($additional_information as $vl)
                              {
                                   $label_name=strtolower($vl->label_name);
                                  ?>
                                    $scope.<?php echo $label_name; ?> = data.<?php echo $label_name; ?>;
                                  <?php
                              }
                                
                                ?>
                                $scope.product_name_data = data.product_name;
                                 
                               }); 
            
            
 };



$scope.fetch_single_data = function(id){



                              $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/fetch_single_data",
                                data:{'order_product_id':id,'tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                               }).success(function(data){
                                
                                    if(data.sub_product_id)
                                    {
                                        $('#sub_product').val(data.sub_product_id);
                                    }
                                 
                                
                                    $scope.imagestatus = data.imagestatus;
                                    $scope.reference_image = data.reference_image;
                                 
                              }); 

};







$scope.imgpreview = function(product_id__set,cate_id,order_product_id){
        
        $('#productupdate').hide();
        
        if(cate_id==32)
        {
            $('#productupload').hide();
        }
        var product_id=product_id__set;
        $scope.imgpreviewimages(product_id,cate_id,order_product_id);
   
};


$scope.imgresult = '';

 $scope.imgpreviewimages = function(product_id,cate_id,order_product_id){
           
            
                               $('#clickcateid').val(cate_id);
                               $('#order_product_id_base_define').val(product_id);
                               $('#product_id_base_define').val(order_product_id);
            
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/products/findimages",
                                data:{'product_id':product_id}
                                }).success(function(data){
                                  
                                   $scope.namesDataoptonsimages = data;
                                  
                                 
                                 
                               }); 
            
            
 };


















 $scope.success1 = false;
 $scope.error1 = false;

  $scope.submitSizeguid = function(){
      
      
      
      
      var enthernobase=$('#enthernobase').val();
      
      
     
      
      
      var label1 = $(".label1");
      var label1_value = [];
      for(var i = 0; i < label1.length; i++){
          
           label1_value.push($(label1[i]).val());
         
      }
      var lab1= label1_value.join("|");
      
      
      
      
      
      
      var label2 = $(".label2");
      var label2_value = [];
      for(var i = 0; i < label2.length; i++){
          
           label2_value.push($(label2[i]).val());
         
      }
      var lab2= label2_value.join("|");
      
      
      
      
       var degree = $(".degree");
      var degree_value = [];
      for(var i = 0; i < degree.length; i++){
          
           degree_value.push($(degree[i]).val());
         
      }
      var degreeset= degree_value.join("|");
      
      
     
      
      
      var sub_product= $('#sub_product').val();
      
     
      
     var order_product_id=  $('#product_id_base_define').val();
    
      
      
      
      var label_option_id = $(".label_option_id:checked");
      var label_option_id_value = [];
      for(var i = 0; i < label_option_id.length; i++){
          
           label_option_id_value.push($(label_option_id[i]).val());
         
      }
      
      
      var value_id= label_option_id_value.join("|");
      
      
      
      if(enthernobase=='')
      {
          var base_id=  $("#base_id").val();
      }
      else
      {
          var base_id= enthernobase;
      }
       
       var base_length=$('#enterlengthval').val();
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/insertandupdate",
      data:{'action':'sizesave','lab1':lab1,'base_id':base_id,'lab2':lab2,'degree':degreeset,'image_length':base_length,'value_id':value_id,'sub_product':sub_product,'order_product_id':order_product_id,'tablenamemain':'<?php echo $tablename; ?>','order_id':'<?php echo $order_id; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){ 
       
                  
                  
             $scope.fetchDatasizeoptionsvalue(order_product_id,sub_product);      
             $('#show_details').hide();
                   
            
             $scope.success1 = false;
             $scope.error1 = false;
             $scope.successMessage1 = 'Size Details Updated.';
            
             $scope.fetchData('1');
       
    });
      
      
    
  };










 $scope.fetchDatasizeoptionsvalue = function(id,product_id){
           
            
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/fetch_data_size_options_values",
                                data:{'product_id':product_id,'order_product_id':id,'tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                }).success(function(data){
                               
                                  $scope.namesDataoptonsvalues = data;
                                 
                               }); 
            
            
 };

 $scope.fetchDatasizeoptionsvalueTotal = function(id,product_id){
           
            
                                $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/fetch_data_size_options_values_total",
                                data:{'product_id':product_id,'order_product_id':id,'tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                }).success(function(data){
                               
                                 $('#sizetotal').html('Size Total : '+data.sizetotal);
                                 
                               }); 
            
            
 };








 $scope.fetchDatasizeoptions = function(id,product_id,base_id,click){
           
            
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/products/fetch_data_size_options",
                                data:{'base_id':base_id,'product_id':product_id,'click':click,'order_product_id':id,'tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                }).success(function(data){
                               
                                  $scope.namesDataoptons = data;
                                 
                               }); 
            
            
 };


 $scope.fetchDatasizebase = function(){
           
            
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/products/fetch_data_base",
                                data:{'tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                }).success(function(data){
                               
                                  $scope.namesDataoptonsbase = data;
                                 
                               }); 
            
            
 };
 
 
 $scope.sizedefindbylayout = function(base_id,id,length,base_name)
 {
       
       
         
        $('#layout_plan1').val(base_name);
        var cateid= $('#clickcateid').val();
        var product_id=   $('#order_product_id_base_define').val();
        
                         
      
        if(cateid!=32)
        {
            
            
            
            
                          $('#productupload').hide();
                          $('#productupdate').show();
                         
                          
                          //$('#layout_plan1').val(base_id);
                          //$('#lengthvalset1').val(length);
                          $('#image_plan_id').val(id);   
                          var order_product_id=  $('#product_id_base_define').val();
                          
                         
        
                           $('#profile_'+order_product_id).val(length);
                           var categories_id=$('#cateid_'+order_product_id).val();
                           var type=$('#cateidtype_'+order_product_id).val();
                           $scope.inputsave_1(order_product_id,'profile',categories_id,type);
                             $http({
                              method:"POST",
                              url:"<?php echo base_url() ?>index.php/order/image_length_update",
                              data:{'image_length':length,'base_no':base_id,'order_product_id':order_product_id,'order_no':'<?php echo $order_no; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                              }).success(function(data){
                                $scope.fetchDatasizeoptions(order_product_id,product_id,base_id,1);
                            });

       
        }
        
        
        if(cateid==32)
        {
            
                           if(product_id=='489')
                           {
                               $('#arch').hide();
                               $('#profile_ridge').show();
                                $('#double_crimp').hide();
                                $('#reverse_crimp').hide();
                                $('#spacial_crimp').hide();
                                
                           }
                           
                           if(product_id=='488')
                           {
                               $('#arch').show();
                               $('#profile_ridge').hide();
                               $('#double_crimp').hide();
                               $('#reverse_crimp').hide();
                               $('#spacial_crimp').hide();
                           }
                           
                           
                           if(product_id=='600')
                           {
                               $('#arch').hide();
                               $('#profile_ridge').hide();
                               $('#double_crimp').show();
                               $('#reverse_crimp').hide();
                               $('#spacial_crimp').hide();
                           }
                           
                           
                             if(product_id=='710')
                           {
                               $('#arch').hide();
                               $('#profile_ridge').hide();
                               $('#reverse_crimp').show();
                               $('#double_crimp').hide();
                               $('#spacial_crimp').hide();
                           }
                           
                             if(product_id=='711')
                           {
                               $('#arch').hide();
                               $('#profile_ridge').hide();
                               $('#reverse_crimp').hide();
                               $('#double_crimp').hide();
                               $('#spacial_crimp').show();
                           }
                           
                             if(product_id=='798')
                           {
                               $('#arch').show();
                               $('#profile_ridge').hide();
                               $('#reverse_crimp').hide();
                               $('#double_crimp').hide();
                               $('#spacial_crimp').hide();
                           }
                     
                          $('#set_1').hide();
                          if(id=='325' || id=='326')
                         {
                             $('#set_4').hide();
                             $('#set_7').hide();
                             
                             
                         }
                         else
                         {
                             $('#set_4').show();
                             $('#set_7').show();
                         }
                         
                         
                         
                         
                         if(id=='394')
                         {
                             
                             $('#set_r_666').hide();
                            
                         }
                         else
                         {
                             $('#set_r_666').show();
                             
                         }
      
                          if(id=='333')
                         {
                             $('#set_666').hide();
                             $('#set_777').hide();
                         }
                         else
                         {
                             $('#set_666').show();
                             $('#set_777').show();
                         }
                         
                         
                         
            
           var img=  $('#select_image_'+id).attr('src');
           $('#showimageclick').attr('src',img);
             
           $('#imagesizemodel1').modal('toggle');
           $('#imagesizemodelarch').modal('toggle');
            
        }
      
        
        
 };
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  $scope.sizedefindbylayoutInputlength = function()
 {
     
        
        var length=$('#enterlengthval').val();
        var base_no=$('#enthernobase').val();
        var order_product_id=  $('#product_id_base_define').val();
        
               $http({
                              method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/image_length_update",
                                data:{'image_length':length,'base_no':base_no,'order_product_id':order_product_id,'order_no':'<?php echo $order_no; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                }).success(function(data){
                                
                                $scope.fetchDataBaseSize(length,1);
               });
        
        
        
 };
 
  $scope.sizedefindbylayoutInputbaseno= function()
 {
     
        
     
             var length=$('#enterlengthval').val();
             var base_no=$('#enthernobase').val();
             var order_product_id=  $('#product_id_base_define').val();
              var product_id=   $('#order_product_id_base_define').val();
          
               $http({
                              method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/image_length_update",
                                data:{'image_length':length,'base_no':base_no,'order_product_id':order_product_id,'order_no':'<?php echo $order_no; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                }).success(function(data){
                                
                                $scope.fetchDatasizeoptions(order_product_id,product_id,base_no,0);
                                
                                
               });
        
 };
 
 
  $scope.fetchDatasizeoptionsoninput = function(length,base_no,order_product_id){
           
            
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/products/fetch_data_size_options_input",
                                data:{'length':length,'base_no':base_no,'order_product_id':order_product_id,'tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                }).success(function(data){
                               
                                  $scope.namesDataoptonsinput = data;
                                 
                               }); 
            
            
 };

 
 
 
 
 
 
   $scope.fetchDataBaseSize = function(length,baseid){
           
            
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/products/fetchDataBaseSize",
                                data:{'length':length}
                                }).success(function(data){
                               
                                  $scope.fetchDataBaseSizeDATA = data;
                                  
                                
                                 
                               }); 
            
 };

 
 
 
 
 
 
 





$scope.grouping = function(id,product_name){
    
    
    $('#firstmodal4').modal('toggle');
    
    $('#order_product_id').val(id);
    
    $scope.grouping_title=product_name;
    
    
    
};



$scope.getPurchaserequest = function(product_order_id,purchase_id,product_name){
    
    
    $('#firstmodal5').modal('toggle');
    
      $scope.grouping_title=product_name;
    
    
      $http.get('<?php echo base_url() ?>index.php/purchase/fetch_data_purchase_details_by_sales?product_order_id='+product_order_id).success(function(data){
      
      $scope.arrival_date=data.arrival_date;
      $scope.price_details=data.price_details;
      $scope.availability=data.availability;
      
     });
  
    
};


$scope.pricelist = function(id,product_name){
    
    
    
    $scope.pricelist_title=product_name;
    
    
    $('#product_id').val(id);
    $scope.fetchpricelist(id);
    
    
};




$scope.similarenq = function(id,product_name,categories_id){
    
    
 
     $scope.produttitleview=product_name;
     $scope.categories_idview=categories_id;
     $('#imagesizemodel-sqg').modal('toggle');
     
     
     
      $scope.fetchDatasimilerproduct(1,id);
     
     
    
};




  $scope.fetchDatasimilerproduct = function(id,product_id){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_similer?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&convert='+id+'&product_id='+product_id).success(function(data){
      $scope.namesDatasimile = data;
    });
    
   
  
   
  };
  





$scope.groupadd = function(){
    
    
   
    
    var order_product_id=$('#order_product_id').val();
    var rows_input=$('#rows_input').val();
   

   
   if(rows_input!="")
   {
       
   
    
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':order_product_id,'rows_input':rows_input, 'action':'Copygroup','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){
       
          $scope.fetchData('1');
          $scope.fetchSingleDatatotal('1');
         $('#firstmodal4').modal('toggle');

      }); 
   }
   else
   {
       alert('Please fill number');
   }
    
    
    
};






$scope.rowincress = function (event) {
    
    
if(event.keyCode==13)
{
    
                var checkinsert=$('input[name="checkinsert"]:checked').val();
                
                if (typeof checkinsert === "undefined") {
                   var checkinsert=0;
                }
                
    
               var rowincress=$('#rowincress').val();
           
               if(rowincress!="")
               {
                   
               
                          if(checkinsert!=0)
                          {
                                  $http({
                                    method:"POST",
                                    url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                                    data:{'rows_input':rowincress,'checkinsert':checkinsert,'order_id':'<?php echo $order_id ?>','order_no':'<?php echo $order_no ?>','action':'Copyempty','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                  }).success(function(data){
                                   
                                      $scope.fetchData('1');
                                      $scope.fetchSingleDatatotal('1');
                                     
                            
                                  }); 
                                  
                          
                          }
                          else
                          {
                               alert('Click on the radio button');
                          }
                           
                           
                           
               }
               else
               {
                   alert('Please fill number');
               }


}

};




$scope.approvedFinance = function(id,status,reason){
    
                    var result=0;
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
                                url:"<?php echo base_url() ?>index.php/order/order_quotation_request_finance",
                                data:{'order_id':id,'reason':reason,'order_no':id,'deleteid':status, 'action':'Deletesub','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                               }).success(function(data){
                               
                                $scope.fetchData('1');
                                 $scope.fetchSingleDatatotal('1');
                                 
                              }); 
                        
                        
                    }
                    
                    
                    
                   
                    
                    
                      
          
};


$scope.approved = function(id,status,reason){
    
    
                    if(status==-1)
                    {
                             $('#firstmodal2').modal('toggle');
                             var result=1;
                        
                         
                    }
                    else if(status==4 || status==5)
                    {
                             $('#firstmodal3').modal('toggle');
                             var result=1;
                        
                         
                    }
                    else
                    {
                        
                            $('#firstmodal1').modal('toggle');
                            var result=1;
                           
                        
                         
                    }
                    
                    //firstmodal3
    
                    if(result==1)
                   {
                      $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/order_quotation_request",
                        data:{'order_id':id,'reason':reason,'order_no':'<?php echo $order_no; ?>','status':status,'deleteid':status, 'action':'Deletesub','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                      }).success(function(data){
                       
                           $scope.fetchCustomerorderdata();
                           $scope.fetchData('1');
                           $scope.fetchSingleDatatotal('1');
                            
                         
                      }); 
                   }
};


$scope.mdapproved = function(id,status,reason,mdstatus){
    
    
                    if(mdstatus==1)
                    {
                        
                             $('#firstmodal1').modal('toggle');
                             var result=1;
                        
                         
                    }
                    else
                    {
                        
                            $('#firstmodal2').modal('toggle');
                            var result=1;
                           
                        
                         
                    }
                    
                    
                    var discountfulltotal=$('#discountfulltotal').val();
                    //firstmodal3
    
                    if(result==1)
                   {
                      $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/order_md_approved",
                        data:{'order_id':id,'reason':reason,'discountfulltotal':discountfulltotal,'order_no':'<?php echo $order_no; ?>','status':status,'mdstatus':mdstatus,'deleteid':status, 'action':'Deletesub','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                      }).success(function(data){
                       
                           $scope.fetchCustomerorderdata();
                           $scope.fetchData('1');
                           $scope.fetchSingleDatatotal('1');
                            
                         
                      }); 
                   }
};




  $scope.loadProduct = function(id) {
  
  
  
    var status=0;
    $('#textchange_'+id).text('Load');
    if($('#set_id'+id).is(':checked'))
    {
        var status=0;
        
    }
    else
    {
        var status=1;
        $('#textchange_'+id).text('Load');
    }
   
   
    
    
    
    $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id,'status':status, 'action':'loadstatus_by_cate','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){
       
       
      }); 
  
  
  
 };
 


 $scope.inputsaveTotalWeight = function(id) {
  
  
  
    var value=$('#saveactqty_'+id).val();
    
   
    $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id,'value':value,'order_id':'<?php echo $order_id; ?>', 'action':'Updatetotalqty','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){
       
        $scope.fetchData('1');
         $scope.fetchSingleDatatotal('1');
      }); 
  
  
  
 };


$scope.saveImagesize = function () {



$('#saveServer').html('Loading...');


 var order_product_id=  $('#product_id_base_define').val();
  var product_id=   $('#order_product_id_base_define').val();

 html2canvas($("#canvas"), {
          onrendered: function(canvas) {
          var imgsrc = canvas.toDataURL("image/png");
          
          
                var dataURL = canvas.toDataURL();
                $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order/productimagesave",
                  data:{'order_product_id':order_product_id,'product_id':product_id,'order_no':'<?php echo $order_no; ?>','imgBase64':dataURL,'order_id':'<?php echo $order_id; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                }).success(function(data){
                    
                    // alert('Image Saved'); 
                    $('#imagesizemodel').modal('toggle');
                    
                    $('#saveServer').html('Select Image');
                   
                 
                    $scope.fetchDatasizeoptions(order_product_id,product_id,1,0);
                    $scope.fetch_single_data(order_product_id);
                 
            
                });

 }
});




}


$scope.backToclick = function () {
            $('#imagesizemodel1').modal('toggle');
            $('#imagesizemodelarch').modal('toggle');    
}


$scope.saveImagesizeinputimage = function () {



$('#saveImagesizeinputimage').html('Loading...');


  var order_product_id=  $('#product_id_base_define').val();
  var product_id=   $('#order_product_id_base_define').val();

         html2canvas($("#inputtext_container"), {
          onrendered: function(canvas) {
          var imgsrc = canvas.toDataURL("image/png");
          
          
                var dataURL = canvas.toDataURL();
                $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order/productimagesave",
                  data:{'order_product_id':order_product_id,'product_id':product_id,'order_no':'<?php echo $order_no; ?>','imgBase64':dataURL,'order_id':'<?php echo $order_id; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                }).success(function(data){
                    
                    // alert('Image Saved'); 
                    $('#imagesizemodelarch').modal('toggle');
                    $scope.fetchData('1');
                    $scope.fetchDatasizeoptions(order_product_id,product_id,1,0);
                    $scope.fetch_single_data(order_product_id);
                 
            
                });

 }
});




}

















$scope.imgchoose = function () {



    $('#show_details2').show();


    var order_product_id=  $('#product_id_base_define').val();
    var product_id=   $('#order_product_id_base_define').val();
    var image_id=$('input[name="imageid"]:checked').val();
    var base_id= $('#layout_plan1').val();
        
            
                $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order/productimagesavechoose",
                  data:{'order_product_id':order_product_id,'order_no':'<?php echo $order_no; ?>','image_id':image_id,'order_id':'<?php echo $order_id; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                }).success(function(data){
                    
                    
                    $('#imagesizemodel1').modal('toggle'); 
                    $('#imagesizelength').modal('toggle');
                    $scope.fetchData('1');
                    
                    $scope.fetch_single_data(order_product_id);
                    $scope.fetchDatasizeoptions(order_product_id,1,base_id,1);
            
                });






}





















$scope.copyData = function(id){
    //if(confirm("Are you sure you want to copy it?"))
    //{
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Copy','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){
       
         $scope.fetchData('1');
         $scope.fetchSingleDatatotal('1');

      }); 
    //}
};


$scope.pointDataaddress= function(id){
    if(confirm("Are you sure you want to update the address?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/addresspoint",
        data:{'address_id':id,'order_id':'<?php echo $order_id; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){
          
            $scope.fetchCustomerorderdata();
            $scope.fetchSingleDatatotal('1');
            
      }); 
    }
};








  $scope.submitFormconversion = function(){
      
      
      
      
      var vendor_id=$('#vendor_id').val();
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/insertandupdateinward",
      data:{'total_amount':'0','product_id':'0','vendor_id':vendor_id,'coil_no':$scope.coil_no,'po_number':$scope.po_no,'qty':$scope.c_qty,'price':'0','order_date':$scope.order_date,'id':'0','action':'Save','tablename':'purchase_order'}
      }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

              $scope.success_c = false;
              $scope.error_c = true;
              $scope.hidden_id = "";
             
              $scope.errorMessage = data.massage;

          }
          else
          {
              
              
              
           
              
            $scope.success_c = true;
            $scope.error_c = false;
            $scope.coil_no = "";
            $scope.c_qty = "";
            $scope.successMessage = data.massage;
            $('#modelid').modal('show');
            

          }

          

      }

       
    });
  };
  
  
  
$scope.weight_Calculation = function(categories_id,uom, id, inputname, values){

    var weight = 0;
    
    
    if(uom >0){
      var uom = uom;
    }else{
      var uom = $('#default_'+id).val();
    }

    var single_we = 0; // single weight update
    console.log("weight calculation starts > categories_id --> " + categories_id + " /uom --> " + uom);

    if(categories_id==3 || categories_id==19) //cat-condition
    { 
      
      console.log("if condition --> 01  SQM formula");
          var default_weight= parseFloat($('#default_weight_'+id).val());
          var thickness= $('#default_thickness_'+id).val();
          var kg_rmtr_weight= $('#kg_rmtr_weight_'+id).val();
          var profile = 0;
          var crimp = 0;

          if(uom==3)
          { 
            var profile=parseFloat($('#profile_'+id).val());
            var crimp=parseFloat($('#crimp_'+id).val());
          }

          if(uom==4)
          { 
            var profile=parseFloat($('#profile_'+id).val())/304.8;
            var crimp=parseFloat($('#crimp_'+id).val())/304.8;
          }

          if(uom==5)
          { 
            var profile=parseFloat($('#profile_'+id).val())* 3.281;
            var crimp=parseFloat($('#crimp_'+id).val())* 3.281;
          }

          if(uom==6)
          { 
            var profile=parseFloat($('#profile_'+id).val())/12;
            var crimp=parseFloat($('#crimp_'+id).val())/12;
          }

          profile = profile > 0 ? profile : 0;
          crimp = crimp > 0 ? crimp : 0;
          var count = profile + crimp;
          var nos_data = parseFloat($('#nos_' + id).val());

          console.log('polycorbanate ====>> uom --> ' + uom + ' Profile --> ' + profile + ' crimp --> ' + crimp + ' nos --> ' + nos_data + ' thickness --> ' + thickness + ' kg_rmtr_weight --> ' + kg_rmtr_weight + ' >> count --> ' + count);

         if(kg_rmtr_weight != 0 || kg_rmtr_weight != ''){
          var single_we = count * 0.305 * kg_rmtr_weight;  // single weight update
            var weight = single_we * nos_data;
          // var weight=count*0.305*kg_rmtr_weight*nos_data;
          }else{
          var val = 0;
            switch (thickness) {
                case '0.40 MM':
                    val = count * 0.305 * 3.3;
                    break;
                case '0.60 MM':
                    val = count * 0.305 * 5.4;
                    break;
                case '0.50 MM':
                    val = count * 0.305 * 4.2;
                    break;
                case '0.47 MM':
                    val = count * 0.305 * 4;
                    break;
                case '0.45 MM':
                    val = count * 0.305 * 3.8;
                    break;
                case '0.37 MM':
                    val = count * 0.305 * 2.8;
                    break;
                case '0.35 MM':
                    val = count * 0.305 * 2.8;
                    break;
                default:
                    console.log('Invalid thickness');
            }
            var weight = val * nos_data;
            var single_we = val; // single weight update
          }
          
    }
    else if(categories_id==5 || categories_id==24  || categories_id==34 || categories_id==38 ||  categories_id==39 || categories_id==40 || categories_id==41  || categories_id==613 ) //cat-condition || categories_id==616
    { 
      // AStockUpdate-live-01/07
      //KG
     var billing_options= parseFloat($('#billing_options_'+id).val());
      var fact=$('#fact_'+id).val();
      var kg_rmtr_weight= $('#kg_rmtr_weight_'+id).val();
      var standard_weight= parseFloat($('#standard_weight_'+id).val());
      console.log("qty --"+ kg_rmtr_weight); 

      // single weight update
      var nos_data= parseFloat($('#nos_'+id).val());
              
              if(uom==3)
              { 
                var profile=parseFloat($('#profile_'+id).val());
              }

              if(uom==4)
              { 
                var profile=parseFloat($('#profile_'+id).val())/304.8;
              }

              if(uom==5)
              { 
                var profile=parseFloat($('#profile_'+id).val())* 3.281;
              }

              if(uom==6)
              { 
                var profile=parseFloat($('#profile_'+id).val())/12;
              }

              var profile = profile > 0 ? profile : '0';

              // var weight =  profile * 0.305 * nos_data * fact;

      if(billing_options > 0){
          if(billing_options == 1){
            var single_we = profile * 0.305 * fact;
            var weight =  single_we * nos_data;
            // var weight =  profile * 0.305 * nos_data * fact;
            // var weight = $('#qty_'+id).text() * fact;
          }else{
            var single_we = profile * 0.305;
            var weight =  single_we * nos_data;
            // var weight =  profile * 0.305 * nos_data * fact;
            // var weight = $('#qty_'+id).text();
          } //single weight update
      }else{
          var weight = $('#qty_'+id).text();
      }

         if(categories_id==34){ //Decking sheet
        var fact=$('#fact_val_'+id).val();
          if(billing_options > 0){
            if(billing_options == 1){
              var weight = $('#qty_'+id).text() * fact;
            }else if(billing_options == 3){
              var nos_data= parseFloat($('#nos_'+id).val());
              
              if(uom==3)
              { 
                var profile=parseFloat($('#profile_'+id).val());
              }

              if(uom==4)
              { 
                var profile=parseFloat($('#profile_'+id).val())/304.8;
              }

              if(uom==5)
              { 
                var profile=parseFloat($('#profile_'+id).val())* 3.281;
              }

              if(uom==6)
              { 
                var profile=parseFloat($('#profile_'+id).val())/12;
              }

              var profile = profile > 0 ? profile : '0';

              var weight =  profile * 0.305 * nos_data * fact;
            }else{
              var weight = $('#qty_'+id).text();
            }
          }else{
              var weight = $('#qty_'+id).text();
          }
      }

      
      console.log("KG Formula qty --"+ weight + "  fact >> " + fact + " > billing_option" + billing_options);

     
    }
  
    else if(categories_id==1) //cat-condition
    { 
          //Accessories
          var thickness= $('#product_name_sub_thick_'+id).val();
          var product_id=parseFloat($('#ppid_'+id).val());

          if(product_id == 3){
            var nos_data= parseFloat($('#nos_'+id).val());
            var weight = nos_data;
          }
          else if(product_id == 10){
            var kg_rmtr_weight= $('#kg_rmtr_weight_'+id).val();
            var base_cate= $('#basecat_'+id).val();
            if(base_cate == '36' || base_cate == '34'){
              var basefact= $('#basefact_'+id).val();
              var kg_rmtr_weight= basefact * 1.22;
            }
            var nos_data= parseFloat($('#nos_'+id).val());
            var profile, crimp;

                  if(uom==3)
                  { 
                    var profile=parseFloat($('#profile_'+id).val());
                    var crimp=parseFloat($('#crimp_'+id).val());
                  }

                  if(uom==4)
                  { 
                    var profile=parseFloat($('#profile_'+id).val())/304.8;
                    var crimp=parseFloat($('#crimp_'+id).val())/304.8;
                  }

                  if(uom==5)
                  { 
                    var profile=parseFloat($('#profile_'+id).val())* 3.281;
                    var crimp=parseFloat($('#crimp_'+id).val())* 3.281;
                  }

                  if(uom==6)
                  { 
                    var profile=parseFloat($('#profile_'+id).val())/12;
                    var crimp=parseFloat($('#crimp_'+id).val())/12;
                  }
                  var kg_rmt_val = kg_rmtr_weight;
                  var val = profile * crimp * nos_data * 4;
                  var sqm = val/10.765;
                  var r_mt = sqm/1.22;
                  var kg = r_mt * kg_rmt_val;
                  var weight=kg;

                  console.log("pri"+ profile);
                  console.log("cri"+ crimp);                  
                  console.log("no"+ nos_data);
                  console.log("kg_rmt_val"+ kg_rmt_val);

          } 
          else if(product_id == 9){

            var image_id=$('input[name="imageid"]:checked').val();
            var kg_rmtr_weight= $('#kg_rmtr_weight_'+id).val();
            var base_cate= $('#basecat_'+id).val();
            if(base_cate == '36' || base_cate == '34'){
              var basefact= $('#basefact_'+id).val();
              var kg_rmtr_weight= basefact * 1.22;
            }
            var nos_data= parseFloat($('#nos_'+id).val());

            if(image_id == 9147){
              var width = $('#set_b_215').val();
              var len1 = $('#set_b_220').val();
              var len2 = $('#set_b_214').val();
            }

            if(image_id == 8503){
              var width = $('#set_b_103').val();
              var len1 = $('#set_b_105').val() > 0 ? $('#set_b_105').val() : 0;
              var len2 = $('#set_b_102').val() > 0 ? $('#set_b_102').val() : 0;
            }

            if(image_id == 8502){
              var width = $('#set_b_115').val();
              var len1 = $('#set_b_107').val() > 0 ? $('#set_b_107').val() : 0;
              var len2 = parseFloat($('#set_b_108').val()) +
                  parseFloat($('#set_b_112').val()) +
                  parseFloat($('#set_b_113').val()) +
                  parseFloat($('#set_b_110').val()) +
                  parseFloat($('#set_b_114').val());

            }

            if(image_id == 7938){
              var width = $('#set_b_28').val();
              var len1 = $('#set_b_27').val() > 0 ? $('#set_b_27').val() : 0;
              var len2 = $('#set_b_31').val() > 0 ? $('#set_b_31').val() : 0;
            }

            if(image_id == 7937){
              var width = $('#set_b_10').val();
              var len1 = $('#set_b_9').val() > 0 ? $('#set_b_9').val() : 0;
              var len2 = $('#set_b_13').val() > 0 ? $('#set_b_13').val() : 0;
            }

            if(image_id == 7936){
              var width = $('#set_b_17').val();
              var len1 = $('#set_b_16').val() > 0 ? $('#set_b_16').val() : 0;
              var len2 = $('#set_b_19').val() + $('#set_b_23').val() + $('#set_b_21').val() + $('#set_b_20').val() + $('#set_b_24').val();
            }

            

          
            var highestValue = Math.max(len1, len2);
            var val = width*highestValue;
            var sqm = val/10.765;
            var r_mt = sqm/1.22;
            var kg = r_mt * 2.8;
            var weight=kg;

          } 
           else if(product_id == 5){
            var kg_rmtr_weight= $('#kg_rmtr_weight_'+id).val();
            var base_cate= $('#basecat_'+id).val();
            if(base_cate == '36' || base_cate == '34'){
              var basefact= $('#basefact_'+id).val();
              var kg_rmtr_weight= basefact * 1.22;
            }
            var nos_data= parseFloat($('#nos_'+id).val());
            var profile, width;

                var image_id=parseFloat($('#image_id_'+id).val());
                var width_val = $('#img_width_'+id).val();
                if(uom==3) //feet
                {


                   var profile=parseFloat($('#profile_'+id).val())/3.281;
                   var r_ft=parseFloat($('#image_length_'+id).val());
                   
                   var width=width_val/3.281;   
                  
      

                }else if (uom == 4){ //mm

                  var profile=parseFloat($('#profile_'+id).val())/1000;
                  var r_ft=parseFloat($('#image_length_'+id).val());
                  var width=$('#img_width_'+id).val();                 

                  var width=width_val/1000;
                 


                    
                }
                else if (uom == 5){ //mtr
                  var profile=parseFloat($('#profile_'+id).val());
                  var r_ft=parseFloat($('#image_length_'+id).val());
                  var width_mm=$('#img_width_'+id).val();

                  var width=width_val;
                  
                }
                  
                else if (uom == 6){ //inch

                  var profile=parseFloat($('#profile_'+id).val())/39.37;          
                  var r_ft=parseFloat($('#image_length_'+id).val());
                  var width_mm=$('#img_width_'+id).val();                  
                  var width=width_val/39.37;
                  
                }

                var r_ft = profile;
                if(width > 0){

                   
                    var r_mt = width*profile*nos_data;
                    var r_mt_val = r_mt/1.22;
                    var kg_rmt_val1 = kg_rmtr_weight;
                    var weight=r_mt_val*kg_rmt_val1;
               
                }


            
            $http({
            method:"POST",
            url:"<?php echo base_url() ?>index.php/order/image_weight_length_update",
                                                          data:{'weight':weight,'order_product_id':id,'order_no':'<?php echo $order_no; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                                          }).success(function(data){
                                                            
            });


          }
         

 
           else if(product_id == 13){

                var kg_rmtr_weight= $('#kg_rmtr_weight_'+id).val();
                var base_cate= $('#basecat_'+id).val();
                if(base_cate == '36' || base_cate == '34'){
                  var basefact= $('#basefact_'+id).val();
                  var kg_rmtr_weight= basefact * 1.22;
                }
                var nos_data= parseFloat($('#nos_'+id).val());
                var profile, width;
                var image_id=parseFloat($('#image_id_'+id).val());

                 // console.log(image_id+ "image_id");


                if(uom==3) //feet to mtr
                {


                   var profile=parseFloat($('#profile_'+id).val())*0.305;
                   
                  var width=$('#img_width_'+id).val();   
                  if(image_id=='10853')    
                  {
                     var width=0.410*0.305;
                  }
                  else
                  {
                    var width=parseFloat($('#img_width_'+id).val())*0.305;
                    //  var width=width/304.8;
                  }          
                   

      

                }else if (uom == 4){ //mm

                  var profile=parseFloat($('#profile_'+id).val());
                  var width_mm=$('#img_width_'+id).val();

                  if(image_id=='10853')    
                  {
                     var width=125/1000;
                  }
                  else
                  {
                      var width=width_mm/1000;
                  }    
                  
                  var profile = profile/1000;

                    
                }
                else if (uom == 5){ //mtr
                  var profile=parseFloat($('#profile_'+id).val());
                  var width_mm=$('#img_width_'+id).val();

                   if(image_id=='10853')    
                  {
                     var width=0.125;
                  }
                  else
                  {
                       var width=width_mm;
                  }   
                  
                  
                }
                  
                else if (uom == 6){ //inch

                  var profile=parseFloat($('#profile_'+id).val())*0.0254;   
                  var width_mm=$('#img_width_'+id).val();
                  

                   if(image_id=='10853')    
                  {
                      var width=4.921*0.0254;
                  }
                  else
                  {
                      // var width_mm=width_mm/25.4; 
                       var width=width_mm*0.0254;
                  }   
                  
                  
                }

                var r_ft = profile;
                
                   console.log(width + "stiffner" + uom);
                   console.log(profile + "stiffner");          
                  console.log($('#profile_'+id).val() + "stiffner");
                

                        if(width > 0){

                          
                            var r_mt = (width*profile)*nos_data;
                            var r_mt_val = r_mt/1.22;
                            var kg_rmt_val1 = kg_rmtr_weight;
                            var weight=r_mt_val*kg_rmt_val1;
                            console.log(kg_rmt_val1 + "kg_rmt_val1");
                            
                      
                        }


                    
                    $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/image_weight_length_update",
                                                                  data:{'weight':weight,'order_product_id':id,'order_no':'<?php echo $order_no; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                                                  }).success(function(data){
                                                                    
                    });


            }
            else if(product_id == 20){
                var kg_rmtr_weight= $('#kg_rmtr_weight_'+id).val();
                var base_cate= $('#basecat_'+id).val();
                if(base_cate == '36' || base_cate == '34'){
                  var basefact= $('#basefact_'+id).val();
                  var kg_rmtr_weight= basefact * 1.22;
                }
                var nos_data= parseFloat($('#nos_'+id).val());
                var weight = nos_data*kg_rmtr_weight;
            }
          else{
                var kg_rmtr_weight= $('#kg_rmtr_weight_'+id).val();
                var base_cate= $('#basecat_'+id).val();
                if(base_cate == '36' || base_cate == '34'){
                  var basefact= $('#basefact_'+id).val();
                  var kg_rmtr_weight= basefact * 1.22;
                }
                var nos_data= parseFloat($('#nos_'+id).val());
                var profile, width;
                var image_id=parseFloat($('#image_id_'+id).val());
                var widthval=$('#img_width_cl_'+id).val(); 

               if(uom==3) 
                {
                  var profile=parseFloat($('#profile_'+id).val())*0.305;
                  var width=widthval*0.305;
                }else if (uom == 4){ 
                  var profile=parseFloat($('#profile_'+id).val())/1000;
                  var width=widthval/1000;
                }
                else if (uom == 5){ 
                  var profile=parseFloat($('#profile_'+id).val());
                  var width=widthval;
                }
                else if (uom == 6){ //inch
                  var profile=parseFloat($('#profile_'+id).val())*0.0254;
                  var width=widthval*0.0254;
                }

                
                        if(width > 0){
                            var r_mt = (width*profile)*nos_data;
                            var r_mt_val = r_mt/1.22;
                            var kg_rmt_val1 = kg_rmtr_weight;
                            var weight=r_mt_val*kg_rmt_val1;

                            console.log(kg_rmt_val1 + "kg_rmtr_weight");
                            console.log(width + "width");                    
                            console.log(profile + "profile");                    
                            console.log(nos_data + "nos");                    
                            console.log(r_mt + "kg_rmt_val1");                    
                            console.log(r_mt_val + "kg_rmt_val1");
                        }
             
         
                
           
            }
              
    }
   

            else if(categories_id==611) {
            var nos = parseFloat($("#nos_"+id).val()); 
            var image_id=parseFloat($('#image_id_'+id).val());
            var basefact=$('#basefact_'+id).val(); 

             var widthval=$('#img_width_cl_'+id).val(); 
            if(widthval > 0){
               var widthval=$('#img_width_cl_'+id).val(); 
             }else{
               var widthval=$('#img_width_'+id).val(); 
             }


            if(uom==3) 
            {
              var profile=parseFloat($('#profile_'+id).val())*0.305;
              var width=widthval*0.305;
            }else if (uom == 4){ 
              var profile=parseFloat($('#profile_'+id).val())/1000;
              var width=widthval/1000;
            }
            else if (uom == 5){ 
              var profile=parseFloat($('#profile_'+id).val());
              var width=widthval;
            }
            else if (uom == 6){ //inch
              var profile=parseFloat($('#profile_'+id).val())*0.0254;
              var width=widthval*0.0254;
            }

            var width=width.toFixed(3);

            console.log("nos > "+ nos);
            console.log("profile > "+ profile);
            console.log("width > "+ width);
            console.log("basefact > "+ basefact);

            if(width > 0){
                var r_mt = (width*profile)*nos;
                var r_mt_val = r_mt/1.22;
                var kg_rmt_val1 = basefact;
                var weight=r_mt_val*kg_rmt_val1;
            }
           
        }
        else if(categories_id == 627){

                var kg_rmtr_weight= $('#kg_rmtr_weight_'+id).val();
                var base_cate= $('#basecat_'+id).val();
                // if(base_cate == '36' || base_cate == '34'){
                  var basefact= $('#basefact_'+id).val();
                  var kg_rmtr_weight= basefact;
                // }
                var nos_data= parseFloat($('#nos_'+id).val());
                var profile, width;
                var image_id=parseFloat($('#image_id_'+id).val());

                 // console.log(image_id+ "image_id");


                if(uom==3) //feet to mtr
                {


                   var profile=parseFloat($('#profile_'+id).val())*0.305;
                   
                  var width=$('#img_width_'+id).val();   
                  if(image_id=='11229')    
                  {
                     var width=0.410*0.305;
                  }
                  else
                  {
                    var width=parseFloat($('#img_width_'+id).val())*0.305;
                    //  var width=width/304.8;
                  }          
                   

      

                }else if (uom == 4){ //mm

                  var profile=parseFloat($('#profile_'+id).val());
                  var width_mm=$('#img_width_'+id).val();

                  if(image_id=='11229')    
                  {
                     var width=125/1000;
                  }
                  else
                  {
                      var width=width_mm/1000;
                  }    
                  
                  var profile = profile/1000;

                    
                }
                else if (uom == 5){ //mtr
                  var profile=parseFloat($('#profile_'+id).val());
                  var width_mm=$('#img_width_'+id).val();

                   if(image_id=='11229')    
                  {
                     var width=0.125;
                  }
                  else
                  {
                       var width=width_mm;
                  }   
                  
                  
                }
                  
                else if (uom == 6){ //inch

                  var profile=parseFloat($('#profile_'+id).val())*0.0254;   
                  var width_mm=$('#img_width_'+id).val();
                  

                   if(image_id=='11229')    
                  {
                      var width=4.921*0.0254;
                  }
                  else
                  {
                      // var width_mm=width_mm/25.4; 
                       var width=width_mm*0.0254;
                  }   
                  
                  
                }

                var r_ft = profile;
                
                   console.log(width + "stiffner" + uom);
                   console.log(profile + "stiffner");          
                  console.log($('#profile_'+id).val() + "stiffner");
                

                        if(width > 0){

                          
                            var r_mt = (width*profile)*nos_data;
                            var r_mt_val = r_mt/1.22;
                            var kg_rmt_val1 = kg_rmtr_weight;
                            var weight=r_mt_val*kg_rmt_val1;
                            console.log(kg_rmt_val1 + "kg_rmt_val1");
                            
                      
                        }


                    
                    $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/image_weight_length_update",
                                                                  data:{'weight':weight,'order_product_id':id,'order_no':'<?php echo $order_no; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                                                  }).success(function(data){
                                                                    
                    });


            }
    else if(categories_id==608 || categories_id==583 ||categories_id==590 || categories_id==32 ){ 

      console.log("if > 04  Base Product or tile product formula(608/583/590/32");

          //Base product
          var product_id=parseFloat($('#ppid_'+id).val());
          var default_weight= parseFloat($('#default_weight_'+id).val());
          var thickness= $('#thickness_tile_prod_'+id).val();        
          var thickness1= $('#product_name_sub_thick_'+id).val();

          
          var profile, crimp;
        
          if(uom==3)
          { 
            var profile=parseFloat($('#profile_'+id).val());
            var crimp=parseFloat($('#crimp_'+id).val());
          }

          if(uom==4)
          { 
            var profile=parseFloat($('#profile_'+id).val())/304.8;
            var crimp=parseFloat($('#crimp_'+id).val())/304.8;
          }

          if(uom==5)
          { 
            var profile=parseFloat($('#profile_'+id).val())* 3.281;
            var crimp=parseFloat($('#crimp_'+id).val())* 3.281;
          }

          if(uom==6)
          { 
            var profile=parseFloat($('#profile_'+id).val())/12;
            var crimp=parseFloat($('#crimp_'+id).val())/12; 
          }

          if(profile >= 0){
            var profile1 = profile;
          }else{
            var profile1 = 0;
          }

          if(crimp >= 0){
          var crimp1 = crimp;
          }else{
          var crimp1 = 0;
          }

          var count= profile1+crimp1;
          var nos= parseFloat($('#nos_'+id).val());
          var qty_data= parseFloat($('#qty_'+id).val());
          if(nos>0){
            var nos_data=nos;
          }else if(qty_data>0){
            var nos_data= qty_data;
          }else{
            var nos_data= parseFloat($('#nos_'+id).val());
          }

          var kg_rmtr_weight= $('#kg_rmtr_weight_'+id).val();
          if(categories_id==32){
            var base_cate= $('#basecat_'+id).val();
            if(base_cate == '36' || base_cate == '34'){
              var basefact= $('#basefact_'+id).val();
              var kg_rmtr_weight= basefact * 1.22;
            }
          }
          console.log("profile1 --> " + profile1 +" crimp1 --> "+ crimp1 + " nos_data --> " + nos_data + " thickness --> " + thickness + " thickness1 --> "+ thickness1 + " kg_mtr -->" +kg_rmtr_weight+ " count --> " + count + " thickness --> " + thickness);
          var single_we = count*0.305*kg_rmtr_weight;
          var weight=single_we*nos_data;
         
          
    }else if(categories_id==30) { //cat-condition
          console.log("Puff panel");
          var thickness= $('#default_thickness_'+id).val();
          var standard_weight= parseFloat($('#standard_weight_'+id).val());
          var fact= $('#fact_'+id).val();
          var profile, crimp;
        
          if(uom==3)
          { 
            var profile=parseFloat($('#profile_'+id).val());
            var crimp=parseFloat($('#crimp_'+id).val());
          }

          if(uom==4)
          { 
            var profile=parseFloat($('#profile_'+id).val())/304.8;
            var crimp=parseFloat($('#crimp_'+id).val())/304.8;
          }

          if(uom==5)
          { 
            var profile=parseFloat($('#profile_'+id).val())* 3.281;
            var crimp=parseFloat($('#crimp_'+id).val())* 3.281;
          }

          if(uom==6)
          { 
            var profile=parseFloat($('#profile_'+id).val())/12;
            var crimp=parseFloat($('#crimp_'+id).val())/12;
          }

          var count= profile+crimp;
          var nos_data= parseFloat($('#nos_'+id).val());
          console.log("profile --> " + profile + " crimp --> " + crimp + " nos_data --> " + nos_data + " fact --> " + fact + "thickness --> " + thickness+ "standard_weight "+ standard_weight);
          var single_we=count*0.305*standard_weight;
          var weight = single_we*nos_data;


    }

    else if(categories_id==603) { //cat-condition

      console.log("standing seeam if contidion > 05 nos formula");
      var nos = parseFloat($('#qty_'+id).val());
      console.log("standing seam-->"+ nos );

      if(nos != 0){
        var weight = (1*nos)/0.61;
      }else{
        var weight = 0;
      }   

    }
      else if(categories_id==591) { //cat-condition

      console.log("Decking sheet if contidion > 05 nos formula"+product_id);
      if(product_id == 687){
        var sqm = $('#qty_'+id).text();
        console.log("dec running mtr -->"+ rmt );
        var kg_rmtr_weight= $('#kg_rmtr_weight_'+id).val();

          var sqmval = (sqm/10.765);        
          var weight = (sqmval/1.22)*kg_rmtr_weight;

      }

      var billing_options= parseFloat($('#billing_options_'+id).val());
      var fact=$('#fact_'+id).val();
      var kg_rmtr_weight= $('#kg_rmtr_weight_'+id).val();
      var standard_weight= parseFloat($('#standard_weight_'+id).val());
      var nos_data= parseFloat($('#nos_'+id).val());

       if(uom==3)
              { 
                var profile=parseFloat($('#profile_'+id).val());
              }

              if(uom==4)
              { 
                var profile=parseFloat($('#profile_'+id).val())/304.8;
              }

              if(uom==5)
              { 
                var profile=parseFloat($('#profile_'+id).val())* 3.281;
              }

              if(uom==6)
              { 
                var profile=parseFloat($('#profile_'+id).val())/12;
              }

              var profile = profile > 0 ? profile : '0';

        var sqm = profile * 0.305 * fact;
        var single_we = (sqm/1.22) * kg_rmtr_weight;
        var weight =  single_we * nos_data;
        

    }
    else if(categories_id==626) { //cat-condition

        console.log("Decking sheet if contidion > 05 nos formula"+product_id);

        if(product_id == 687){
          var sqm = $('#qty_'+id).text();
          console.log("dec running mtr -->"+ rmt );

            var sqmval = (sqm/10.765);        
            var weight = (sqmval/1.22)*2.8;

        }

        var billing_options= parseFloat($('#billing_options_'+id).val());
        var fact=$('#fact_'+id).val();
        var kg_rmtr_weight= $('#kg_rmtr_weight_'+id).val();
        var standard_weight= parseFloat($('#standard_weight_'+id).val());
        var nos_data= parseFloat($('#nos_'+id).val());
         var fact2=$('#fact_val_'+id).val();

         if(uom==3)
                { 
                  var profile=parseFloat($('#profile_'+id).val());
                }

                if(uom==4)
                { 
                  var profile=parseFloat($('#profile_'+id).val())/304.8;
                }

                if(uom==5)
                { 
                  var profile=parseFloat($('#profile_'+id).val())* 3.281;
                }

                if(uom==6)
                { 
                  var profile=parseFloat($('#profile_'+id).val())/12;
                }

                var profile = profile > 0 ? profile : '0';

                // var weight =  profile * 0.305 * nos_data * fact;

        if(billing_options > 0){
            if(billing_options == 2){
              var single_we = profile * 0.305 * fact;
              var weight =  single_we * nos_data;
            }else{
              var single_we = profile * 0.305 * fact;
              var weight =  single_we * nos_data;
            } //single weight update
        }else{
            var weight = $('#qty_'+id).text();
        }


      }

      
  

      else if(categories_id==11) { //cat-condition

        var fact= parseFloat($('#default_fact_'+id).val());      
        var density= $('#density_'+id).val();
        var qty= $('#qty_'+id).val();
        var dimensions= $('#dimensions_'+id).val();
        var thickness= $('#default_thickness_'+id).val();
      

        console.log('Rockwool  fact' + fact + " density --> " + density + " dimensions --> " + dimensions + " thickness " + thickness);

          let thicknessValue = thickness;  // The default value as a string with the unit
          let thick_val = parseFloat(thicknessValue.replace(/[^0-9.]/g, '')); 
          console.log(thick_val);  // Output: 5


          var den_val = 0;
          var dimen_val = 0;

          if(density =='48 kg/m3')
          {
            var den_val = 48/1000;
          }
          if(density =='16kg/m3')
          {
            var den_val = 16/1000;
          }
          if(density =='96 kg/m3')
          {
            var den_val = 96/1000;
          }
          if(density =='60kg/m3')
          {
            var den_val = 60/1000;
          }
          if(density =='80kg/m3')
          {
            var den_val = 80/1000;
          }
          if(density =='100kg/m3')
          {
            var den_val = 100/1000;
          }
          

          
          if(dimensions =='7.7*1.1Mtr')
          {
            var dimen_val = 7.7*1.1;
          }
          if(dimensions =='20*1.25Mtr')
          {
            var dimen_val = 20*1.25;
          }
          if(dimensions =='500*1000mm')
          {
            var dimen_val = 0.5*1;
          }
          if(dimensions =='600*1220 mm')
          {
            var dimen_val = 0.6*1.22;
          }
          if(dimensions =='1190*100 mm')
          {
            var dimen_val = 1.19*0.1;
          }
                 
            // var sqmtr = $('#qty_'+id).val(); 
            console.log("sqmtr"+qty);
        console.log( " thick val --> " + thick_val + " den val --> "+ den_val + "dimen val --> " + dimen_val);

        var weight = dimen_val * den_val * thick_val * fact * qty;

      }
    else if(categories_id==36) //cat-condition
    { 
      // console.log("if condition 06 Aluminum");
      
      //Aluminium
          var default_weight= parseFloat($('#default_weight_'+id).val());
          var thickness= $('#default_thickness_'+id).val();
          var fact= $('#fact_val_'+id).val();
          var kg_rmtr_weight= $('#kg_rmtr_weight_'+id).val();

          console.log("Aluminium thickness" + thickness)

          if(uom==3)
          { 


            var profile=parseFloat($('#profile_'+id).val());
            var crimp=parseFloat($('#crimp_'+id).val());


          }


          if(uom==4)
          { 


            var profile=parseFloat($('#profile_'+id).val())/304.8;
            var crimp=parseFloat($('#crimp_'+id).val())/304.8;


          }


          if(uom==5)
          { 


            var profile=parseFloat($('#profile_'+id).val())* 3.281;
            var crimp=parseFloat($('#crimp_'+id).val())* 3.281;


          }


          if(uom==6)
          { 


            var profile=parseFloat($('#profile_'+id).val())/12;
            var crimp=parseFloat($('#crimp_'+id).val())/12;


          }


          var count= profile+crimp;
          var nos_data= parseFloat($('#nos_'+id).val());
          console.log("kg meter value "+kg_rmtr_weight );
          console.log("nos value and "+nos_data );
          console.log("fact meter value and"+fact );
           

          if(billing_options == 2){
            var single_we=count*0.305*fact;
            var weight=single_we*nos_data;
          }else{
            var single_we=count*0.305*fact;
            var weight=single_we*nos_data;
          }
        
    }
    else if ( categories_id==7 || categories_id==9 ||  categories_id==13 || categories_id==15 || categories_id==620 || categories_id==17 || categories_id==20 || categories_id==26 || categories_id==582 || categories_id==595 || categories_id==606 || categories_id==607 ||   categories_id==609 ||  categories_id==614 ||  categories_id==618 ||  categories_id==612 ||  categories_id==616 || categories_id==599){ 

      var product_id=parseFloat($('#ppid_'+id).val());
      
      var qtytext= $('#qty_'+id).text();
      var qtyval= $('#qty_'+id).val();

       if (qtytext>0){
        var qty = qtytext;
      }else{
        var qty = qtyval;
      }

      var nos= parseFloat($('#nos_'+id).val());
      if (qty>0){
        var qty_data = qty;
      }else{
        var qty_data = nos;
      }
      var standard_weight= $('#standard_weight_'+id).val();
       var kg_rmtr_weight= $('#kg_rmtr_weight_'+id).val();
      console.log(" default weight "+ standard_weight + " qty " + qty + " nos " + nos + " qty_data " + qty_data + " kg_rmtr_weight" +kg_rmtr_weight);
      if(qty_data>0)
        {
            var weight=qty_data;
        }

        if(categories_id==582 || categories_id==20 || categories_id==614 || categories_id==17 || categories_id==7 ||categories_id==9 || categories_id==595 || categories_id==15 ||categories_id==620 || categories_id==609 || categories_id==618 ||categories_id==618 || categories_id==616 || categories_id==612 ){
          var weight = qty_data * standard_weight;
        }

        if(categories_id==599){
          var weight = qty_data * kg_rmtr_weight;
        }
        
        if(product_id == 983 || product_id == 1114 ||product_id == 1113 || product_id == 1412 || product_id == 599 || categories_id==26 ){
          var profile = 0;
          var crimp = 0;

          if(uom==3)
          { 
            var profile=parseFloat($('#profile_'+id).val());
            var crimp=parseFloat($('#crimp_'+id).val());
          }

          if(uom==4)
          { 
            var profile=parseFloat($('#profile_'+id).val())/304.8;
            var crimp=parseFloat($('#crimp_'+id).val())/304.8;
          }

          if(uom==5)
          { 
            var profile=parseFloat($('#profile_'+id).val())* 3.281;
            var crimp=parseFloat($('#crimp_'+id).val())* 3.281;
          }

          if(uom==6)
          { 
            var profile=parseFloat($('#profile_'+id).val())/12;
            var crimp=parseFloat($('#crimp_'+id).val())/12;
          }

          var profile = profile > 0 ? profile : 0;
          var crimp = crimp > 0 ? crimp : 0;
          var count= profile+crimp;
          var nos_data= parseFloat($('#nos_'+id).val());
          var standard_weight= parseFloat($('#standard_weight_'+id).val());
          var kg_rmtr_weight= $('#kg_rmtr_weight_'+id).val();

          console.log("tile specified "+ profile + " crimp " + crimp + " nos "+nos_data+" standard_weight " +standard_weight+ "  kg_rmtr_weight" + kg_rmtr_weight);

          var weight = count * 0.305 * nos_data * kg_rmtr_weight;
          
             }
    
      $http({
            method:"POST",
            url:"<?php echo base_url() ?>index.php/order/image_weight_length_update",
                                                          data:{'weight':weight,'order_product_id':id,'order_no':'<?php echo $order_no; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                                          }).success(function(data){
                                                            
            });

    }
    else if(categories_id==583  || categories_id==593 || categories_id==28 ){
      var qty_data= $('#qty_'+id).text();
      if(qty_data > 0){
        var weight=qty_data;
      }else {
         var weight= $('#qty_'+id).val();
      }
      $http({
            method:"POST",
            url:"<?php echo base_url() ?>index.php/order/image_weight_length_update",
            data:{'weight':weight,'order_product_id':id,'order_no':'<?php echo $order_no; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
              
            });
    }
    else
    {
      var nos_data= parseFloat($('#nos_'+id).val());
      var qty_data= parseFloat($('#qty_'+id).val());
        
      console.log("else condition > 09 nos as weight");
      console.log(" nos_data "+nos_data+ " qty_data " + qty_data);
      
        if(nos_data > 0)
        {
          var weight=nos_data;
        }else {
          
          var weight=qty_data;
        }
    }

    if (typeof weight === 'number') {
    var weight = weight.toFixed(3);
    }else{
      var weight =  weight;
    }

    // single weg update
    $http({
            method:"POST",
            url:"<?php echo base_url() ?>index.php/order/image_weight_length_update",
                                                          data:{'weight':weight,'order_product_id':id,'order_no':'<?php echo $order_no; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                                          }).success(function(data){
                                                            
            });

    if (typeof weight === 'number') {
    return weight.toFixed(3);
    }else{
      return weight;
    }

  }
  
  
  
  
  
  








});


app.directive('navigatable', function(){
        return function(scope, element, attr) {
      
      element.on('keydown', 'input[type="text"]', handleNavigation);
            
            
      function handleNavigation(e){
        
        var key = e.keyCode ? e.keyCode : e.which;
        if(key === 13){
          var focusedElement = $(e.target);
          var nextElement = focusedElement.parent().next();
          if (nextElement.find('input').length>0){
            nextElement.find('input').focus();
          }else{
            nextElement = nextElement.parent().next().find('input').first();
            nextElement.focus();
          }
        }
        
        var arrow = { left: 37, up: 38, right: 39, down: 40 };

        if ($.inArray(e.which, [arrow.left, arrow.up, arrow.right, arrow.down]) < 0) { return; }

        var input = e.target;
        var td = $(e.target).closest('td');
        var moveTo = null;

        switch (e.which) {

            case arrow.left: {
                if (input.selectionStart == 0) {
                    moveTo = td.prev('td:has(input,textarea)');
                }
                break;
            }
            case arrow.right: {
                if (input.selectionEnd == input.value.length) {
                    moveTo = td.next('td:has(input,textarea)');
                }
                break;
            }

            case arrow.up:
            case arrow.down: {
                
               

                var tr = td.closest('tr');
                var pos = td[0].cellIndex;
                
                
              

                var moveToRow = null;
                if (e.which == arrow.down) {
                    moveToRow = tr.next('tr');
                }
                else if (e.which == arrow.up) {
                    moveToRow = tr.prev('tr');
                }

                if (moveToRow.length) {
                    moveTo = $(moveToRow[0].cells[pos]);
                }

                break;
            }

        }

        if (moveTo && moveTo.length) {

            e.preventDefault();

            moveTo.find('input,textarea').each(function (i, input) {
                input.focus();
                input.select();
            });

        }

        
      }
        };
    });
    
    
    
    $(document).ready(function(){
        
    });
    
    
    $('#clicknav').click(function(){
        
        $(this).toggleClass('btnActive');
        $('.fixed-sidebar').toggleClass('switchRight');
        $('.leftpan-bar').toggleClass('fullWidthPan');
    });

    
    
</script>

<style type="text/css">
    .fullWidthPan
    {
        width:100%;
    }
    .switchRight
    {
        visibility:hidden;
    }
    #clicknav.btnActive
    {
        color:#ff5e14 !important;
    }
</style>

    <?php include ('footer.php'); ?>
</body>
</html>

