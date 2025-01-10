<?php 

 include "header.php";

$disabled='disabled';
 if($this->session->userdata['logged_in']['access']=='15'   || $this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='10')
 {
    $userid='';
     $disabled='disabled_1';

 }

if($this->session->userdata['logged_in']['userid']=='1562' || $this->session->userdata['logged_in']['userid']=='1541')
{
  $disabled='disabled_1';
}

 ?>
<style>
#pristine-valid-common2 .row .col-md-12 {
             /* line-height: 44px; */
             margin-bottom: 14px;
}
.select {
    display: block;
    border: 0;
    top: 0px;
    outline: none;
    position: absolute;
    left: 0;
    width: 100%;
    padding: 0px 7px;
    height: 100%;
}
.date {
 
    border: 0;

    outline: none;
  
}
.form-control1
{
    display: block;
    width: 100%;
    padding: 0.47rem 0.75rem;
    font-size: 12px;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    -webkit-transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;

}
.star-rating {
  line-height:32px;
  font-size:1.25em;
}
label.col-sm-12.col-form-label {
    text-transform: uppercase;
}
label.form-check-label {
    font-weight: 800;
    font-size: 15px;
}
.card-title{
  background: #7ea2c73d;padding: 11px;
}
.val
{
   color: #ee5c17;
}


/* Custom CSS for Progress Circles */
.accordion-collapse {
    margin-top: 20px;
    margin-bottom: 20px;
}
         .progress-circle-container {
         position: absolute;
         width: 40px;
         height: 40px;
         border-radius: 50%;
         border: 2px solid #58748e; /* Change to your desired background color */
         margin-left: auto;
         display: inline-block;
         left: 92%;
         top: 7%;
         z-index: 999;
         }
         .accordion-header
         {
         position: relative;
             border: 1px solid rgb(88 116 142) !important;
             border-radius: 3px;
         }
         .progress-circle-fill {
         position: absolute;
         width: 0;
         height: 100%;
         clip: rect(0, 15px, 30px, 0);
         border-radius: 50%;
         background-color: #007bff; /* Change to your desired fill color */
         transform: rotate(90deg);
         }
         .progress-circle-text {
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         font-weight: bold;
         color: #58748e;
         font-size: 12px;
         }
         /* Optional styling for the "Next" button */
         .next-section {
         margin-top: 10px;
         }
         .accordion-item .accordion-button {
                border-top-left-radius: calc(0.25rem - 1px) !important;
                border-top-right-radius: calc(0.25rem - 1px) !important;
            }
            
            .accordion-item {
                background-color: transparent;
                border: 1px solid rgb(88 116 142) !important;
            }


.accordion-button {
 /* margin-top: 15px;
    margin-bottom: 15px;*/
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    width: 100%;
    padding: 1rem 1.25rem;
    font-size: .8125rem;
    color: #495057;
    text-align: left;
    background-color: transparent;
    border: 0;
    border-radius: 3px;
    overflow-anchor: none;
    -webkit-transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, border-radius .15s ease, -webkit-box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, border-radius .15s ease, -webkit-box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out, border-radius .15s ease;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out, border-radius .15s ease, -webkit-box-shadow .15s ease-in-out;
}

 .statusProgressBar {
         width: 100%;
         display: flex;
         }
         .statusProgressBar .spb-layer {
         height: 10px;
         border-radius: 3px;
         margin: 2px;
         }
         .status-completed {
         background: #75cead;
         }
         .status-progress {
         background: #7f80e9;
         }
         .status-pending {
         background: #f3a23a;
         }
         .status-cancelled {
         background: #f33a3a;
         }
         .colorDetailing .statusColor {
         width: 15px;
         height: 15px;
         display: inline-block;
         margin-right: 4px;
         line-height: 0;
         border-radius: 3px;
         }
         .colorDetailing p {
         margin: 0px;
         margin-bottom: 5px;
         }
         .colorDetailing {
         margin-top: 20px;
         }
         .colorDetailing .colorDetailLayer {
         margin-right: 10px;
         }
         .spb-heading h2,
         .spb-heading h4 {
         margin-bottom: 0px;
         }
         .spb-heading h4 {
         padding-left: 14px;
         font-size: 16px;
         }
         .spb-heading h2 {
         font-size: 24px;
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
                                    <h4 class="mb-sm-0 font-size-18">Customer  Create</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Customer Forms </li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card">
                    
                   <!-- <div class="card-header1">
                   <a href="#" class="btn btn-success"  data-bs-toggle="modal" data-bs-target=".exampleModalToggleLabel" style="float:right;margin: 5px 10px;">Add new field</a>
                   </div> -->
                    
                  <div class="card-body" >

                       
























<form id="pristine-valid-example" novalidate method="post"></form>



                                        







<div class="progress">
                              <div id="overall-progress-bar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" 
                                 aria-valuemin="0" aria-valuemax="100">0%</div>
</div>


                    
                    <form id="pristine-valid-common" ng-submit="submitForm()" method="post">
                    


                       <div class="row mb-4 mt-4">




                         <div class="col-md-4">

                        <label class="col-sm-12 col-form-label">Customer & Vendor > inactive feature</label>
                        <label class="radio-inline">

                          <input type="radio" ng-click="onClick(2)" name="optradio"  value="2" id="active"> Both

                        </label>
                        <label class="radio-inline">
                          <input type="radio" ng-click="onClick(0)" name="optradio" checked value="0" id="inactive"> Customer
                        </label>

                        <label class="radio-inline">
                          <input type="radio" ng-click="onClick(-1)" name="optradio"  value="-1"> Vendor
                        </label>

                        <label class="radio-inline d-none">
                          <input type="radio" ng-click="onClick(-2)" name="optradio"  value="-2"> Driver Rent
                        </label>

                        <label class="radio-inline d-none">
                          <input type="radio" ng-click="onClick(-3)" name="optradio"  value="-3"> Driver Collection
                        </label>


                        <label class="radio-inline d-none">
                          <input type="radio" ng-click="onClick(-4)" name="optradio"  value="-4"> Other Ledger
                        </label>


                      </div>


                       
                      <div class="col-md-4 sasa" id="vendor" style="display:none;">
                        <label class="col-sm-12 col-form-label">Choose Vendor </label>
                        <select class="form-control1 choices-single-default" ng-change="Seletvendor()" data-trigger ng-model="seletvendor" name="choices-single-default" id="choices-single-default" placeholder="This is a search">
                          <option value="">Search Vendor</option>

                          <?php

                          foreach ($vendor as $val) {
                          ?>
                            <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>

                          <?php
                          }

                          ?>
                        </select>
                      </div>


                      <div class="col-md-4 sasa" id="driver" style="display:none;">
                        <label class="col-sm-12 col-form-label">Choose Driver </label>
                        <select class="form-control1 choices-single-default" ng-change="Seletdriver()" data-trigger ng-model="seletdriver" name="choices-single-default" id="choices-single-default" placeholder="This is a search">
                          <option value="">Search Driver</option>

                          <?php

                          foreach ($driver as $val) {
                          ?>
                            <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>

                          <?php
                          }

                          ?>
                        </select>
                      </div>


                         <div class="col-md-4 sasa" id="other" style="display:none;">
                        <label class="col-sm-12 col-form-label">Choose Other </label>
                        <select class="form-control1 choices-single-default" ng-change="Seletother()" data-trigger ng-model="seletother" name="choices-single-default" id="choices-single-default" placeholder="This is a search">
                          <option value="">Search Other</option>

                          <?php

                          foreach ($accountheads as $val) {
                          ?>
                            <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>

                          <?php
                          }

                          ?>
                        </select>
                      </div>




                              
                           
                       </div>
                       
                    


                               <div id="section20">
                               <h2 class="accordion-header" id="section1Header">
                                       <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#section1Content" aria-expanded="true" aria-controls="section1Content">
                                         CUSTOMER DETAILS
                                       </button>
                                       <div class="progress-circle-container">
                                          <div class="progress-circle-fill" data-progress="0"></div>
                                          <span class="progress-circle-text">0%</span>
                                       </div>
                                    </h2>
                                </div>    

<div id="section1Content" class="accordion-collapse collapse show" aria-labelledby="section1Header" data-bs-parent="#section1Content" style="">

                       <div class="row">
                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Phone <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="phone" data-section="20" class="form-control checkallbox" name="phone" ng-blur="Phonenumberchech()" required ng-model="phone" type="text" >
                             
                            </div>
                          </div>
                        </div>



                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Company name <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="company_name" data-section="20" class="form-control checkallbox" required name="company_name" ng-blur="Namefetch()" ng-model="company_name" type="text">
                               <small id="error_name" style="color:red;"></small>
                            </div>
                          </div>
                        </div>



                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">PRINT NAME  </label>
                            <div class="col-sm-12">
                              <input id="print_name" data-section="20" class="form-control checkallbox"   name="print_name"  ng-model="print_name" type="text">
                               <small id="error_name" style="color:red;"></small>
                            </div>
                          </div>
                        </div>












                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">GST Status <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                                
                                 <select data-section="20" class="form-control checkallbox" name="gst_status" id="gst_status" required ng-model="gst_status">

                                 <option value="1">GST Holder</option>
                                 <option value="2">NON GST Holder</option>

                              </select>
                                
                            
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-3" id="gst_view">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">GST <span style="color:red;">*</span>
                            <span class="text-right" style="float: right;">
                                <a href="https://services.gst.gov.in/services/searchtp" target="_blank">Verify GST</a>
                            </span></label>
                            <div class="col-sm-12">
                             <input id="gst" data-section="20" class="form-control checkallbox" name="gst" ng-model="gst" type="gst">
                            </div>
                          </div>
                        </div>
                      
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Office Address line 1 <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="address1" data-section="20" class="form-control checkallbox" name="address1" required ng-model="address1" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Office Address line 2</label>
                            <div class="col-sm-12">
                             <input id="address2" data-section="20" class="form-control checkallbox" name="address2"   ng-model="address2" type="address2">
                            </div>
                          </div>
                        </div>
                      
                    

                       
                     
                            <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">State  </label>
                            <div class="col-sm-12">
                             

  <select class="form-control checkallbox"   data-section="20"  ng-model="state" name="state" id="state"   ng-init="dateGET1('state')">
                                                            
                                                          
                                                            <option value="">Select State</option>
                                                            
                                                       
                                           <option ng-repeat="mmsetsst in availableProductsmmval1" value="{{mmsetsst.name}}"> {{mmsetsst.name}} </option>
                                                   

                                                           
                                                            
                                                        </select>
                              


                            </div>
                          </div>
                        </div>


                        



                          <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Zone  </label>
                            <div class="col-sm-12">
                             

                                                          <select class="form-control checkallbox" data-section="20"   ng-model="zone" name="zone" id="zone" ng-init="dateGET2('zone')">
                                                            
                                                          
                                                                      
                                           <option ng-repeat="mmsetsst in availableProductsmmval2" value="{{mmsetsst.name}}"> {{mmsetsst.name}} </option>
                                                   

                                                           
                                                           
                                                            
                                                        </select>

                            </div>
                          </div>
                        </div>


                        

                       
                      

                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">District </label>
                            <div class="col-sm-12">
                             

  <select class="form-control checkallbox"    data-section="20" ng-model="district" name="district" id="district" ng-init="dateGET3('district')">
                                                            
                                                          
                                                            <option value="">Select district</option>
                                                            
                          <option ng-repeat="mmsetsst in availableProductsmmval3" value="{{mmsetsst.name}}"> {{mmsetsst.name}} </option>
                                          
                                                           
                                                           
                                                            
                                                        </select>
                              


                            </div>
                          </div>
                        </div>

                        

                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Taluk  </label>
                            <div class="col-sm-12">

                                                          <select class="form-control checkallbox" data-section="20"    ng-model="city" name="city" id="city" ng-init="dateGET4('city')">
                                                            
                                                          
                                                            <option value="">Select Taluk</option>
                                                            
                                                            
                          <option ng-repeat="mmsetsst in availableProductsmmval4" value="{{mmsetsst.name}}"> {{mmsetsst.name}} </option>
                                          
                                                           
                                                           
                                                           
                                                            
                                                        </select>
                              
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Locality <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                                
                                
                                
                 <input type="text" class="form-control checkallbox" data-section="20" ng-model="locality" ng-keyup="completeLocalty()" ng-blur="Getroute()" required placeholder="Search locality"  id="localitybase">
          
                                <p ng-if="route_name" style="color: red;text-align: right;">{{route_name}}</p>
                             
                                
                            
                            </div>
                          </div>
                        </div>
                        
                     <!--     <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Pincode </label>
                            <div class="col-sm-12">
                              <input id="pincode" data-section="20" class="form-control checkallbox" ng-blur="getpencodeDetails($event)" name="pincode"   ng-model="pincode" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Landmark</label>
                            <div class="col-sm-12">
                             <input id="landmark" data-section="20" class="form-control checkallbox" name="landmark"    ng-model="landmark" type="landmark">
                            </div>
                          </div>
                        </div> -->

                        
                        
                      
                        
                     
                              
                     <?php
                     $kk=19;
                     foreach($setion as $key => $value)
                     {

                       $kk++;
                      
                      if($key!='CUSTOMER DETAILS')
                      {


                        ?>

                                   <div id="section<?php echo $kk; ?>">
                                   <h2 class="accordion-header" id="section1Header">
                                       <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#section1Content<?php echo $kk; ?>" aria-expanded="true" aria-controls="section1Content<?php echo $kk; ?>">
                                        <?php echo $key; ?>
                                       </button>
                                       <div class="progress-circle-container">
                                          <div class="progress-circle-fill" data-progress="0"></div>
                                          <span class="progress-circle-text">0%</span>
                                       </div>
                                    </h2>
                                    </div>


                       <div id="section1Content<?php echo $kk; ?>" class="accordion-collapse collapse show" aria-labelledby="section1Header" data-bs-parent="#section1Content<?php echo $kk; ?>" style="">
                       <div class="row"> 



                        <?php


                          
                     


                      }


                        foreach($value as $vvl)
                          {

                                    $required=$vvl['required'];
                                    $rrs="";
                                    $span="";
                                    if($required==1)
                                    {
                                        $rrs="required";
                                        $span='<span style="color:red;">*</span>';
                                    }

                                      $label_name=str_replace('_',' ',ucfirst($vvl['label_name']));
                                     $str_name=strtolower($vvl['label_name']);

                                     if($vvl['type']=='Multiple Options')
                                     {
                                         
                                         
                                           $option=$vvl['option'];
                                           $option=explode(',', $option);
                                           
                                           $s_m="";
                                           $multiselect=$vvl['multiselect'];
                                           if($multiselect==1)
                                           {
                                             $s_m="data-trigger multiple";
                                           }


                                         
                             ?>
                                               <div class="col-md-3 <?php echo strtolower($vvl['label_name']); ?>" >
                                              
                                                 <div class="form-group row">
                                                      
                                                         <label class="col-sm-12 col-form-label"><?php echo $label_name; ?> <?php echo $span; ?></label>
                                                         <div class="col-sm-12">
                                                            <select <?php echo $s_m; ?> data-section="<?php echo $kk; ?>" class="form-control checkallbox <?php echo $str_name; ?>"  name="<?php echo $str_name; ?>" <?php echo $rrs; ?> id="<?php echo $str_name; ?>" ng-model="<?php echo $str_name; ?>">

                                                              <option value="">Select</option>
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
                                     else
                                     {
                                         
                                         $tpebase= $vvl['type'];
                                         
                                         if($tpebase=='Date')
                                         {
                                             $vv='date';
                                         }
                                         else
                                         {
                                             $vv='text';
                                         }
                                         
                                         $box_hide= $vvl['box_hide'];
                                         if($label_name=='F NAME')
                                         {
                                            $label_name='NAME';
                                         }
                                         ?>
                                         
                                           <div class="col-md-3 <?php echo $box_hide; ?> <?php echo $str_name; ?>"  >
                                              
                                              
                                                   <div class="form-group row">
                                                     
                                                         <label class="col-sm-12 col-form-label"><?php echo $label_name; ?> <?php echo $span; ?></label>
                                                         <div class="col-sm-12">
                                                           
                                                           
                                                           <input type="<?php echo $vv; ?>" data-section="<?php echo $kk; ?>" class="form-control checkallbox <?php echo $str_name; ?>"  name="<?php echo $str_name; ?>" <?php echo $rrs; ?> id="<?php echo $str_name; ?>" ng-model="<?php echo $str_name; ?>">
                                                           
                                                         </div>
                                                      
                                                   </div>
                                                
                                                
                                                
                                            </div>
                                         
                                         <?php
                                         if($str_name=='pan_no')
                                         {
                                            ?>

                                             <div class="col-md-3 pan_image"  >
                                              
                                              
                                                   <div class="form-group row">
                                                     
                                                         <label class="col-sm-12 col-form-label">Pan Image</label>
                                                         <div class="col-sm-12">
                                                           
                                                           
                                                            <input type="file"  class="form-control" multiple file-input="files"  >
                                                           
                                                         </div>
                                                      
                                                   </div>
                                                
                                                
                                                
                                            </div>

                                            <?php
                                         }



                                     }

                        }

                       
                        if($key=='CUSTOMER ADDITIONAL DETAILS')
                        {
                            ?>

                             <h4><br>EMERGENCY CONTACT DETAILS</h4>
                        <div class="card table-editable-info h-auto">
                           <div class="card-body p-0">
                              <div class="table-rep-plugin">
                                 <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table">
                                       <thead >
                                          <tr>
                                             <th>S.No</th>
                                             <th data-priority="1">NAME </th>
                                             <th data-priority="3">TITLE</th>
                                             <th data-priority="1">ADDRESS</th>
                                             <th data-priority="3">PHONE NUMBER</th>
                                             <th data-priority="6">ACTION</th>
                                          </tr>
                                       </thead>
                                       <tbody id="updaterecord">
                                         

                                          <tr >
                                             <th>1</th>
                                             <td><input type="text" class="e_name" ng-model="e_name" ></td>
                                             <td><input type="text" class="e_title" ng-model="e_title" ></td>
                                             <td><input type="text" class="e_address" ng-model="e_address" ></td>
                                             <td><input type="text" class="e_phone" ng-model="e_phone" ></td>
                                             <td>
    <i class="mdi mdi-plus-circle font-size-18 right-bar-toggle" style="cursor: pointer;" onclick="return add_rowprice();"></i>
                                             </td>
                                          </tr>
                                         
                                         
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>

                            <?php
                        }


                        if($key=='FAMILY DETAILS')
                        {
                            ?>

                               <h4>GREETINGS</h4>
                        <div class="card table-editable-info h-auto">
                           <div class="card-body p-0">
                              <div class="table-rep-plugin">
                                 <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table">
                                       <thead >
                                          <tr>
                                             <th>S.No</th>
                                             <th data-priority="1">RELATIONSHIP </th>
                                             <th data-priority="3">GREETINGS FOR</th>
                                             <th data-priority="1">NAME</th>
                                             <th data-priority="3">DATE</th>
                                             <th data-priority="3">GENDER</th>
                                             <th data-priority="3">AGE</th>
                                             <th data-priority="3">BLOOD GROUP</th>
                                             <th data-priority="3">RELIGION</th>
                                             <th data-priority="3">OTHER DETAILS</th>
                                             <th data-priority="6">Action</th>
                                          </tr>
                                       </thead>
                                       <tbody id="updaterecord1">

                                           <tr>
                                             <th>1</th>
                                             <td>
                                               <select ng-model="relationship" class="select relationship">
                                                    <option value="">SELECT</option>
                                                    <option value="CHILD">CHILD</option>
                                                    <option value="WIFE">WIFE</option>
                                                    <option value="PARENTS">PARENTS</option>
                                                    <option value="FRIEND">FRIEND</option>
                                                    
                                                </select>

                                             </td>
                                             <td>

                                                <select ng-model="greetings_for" class="select greetings_for">
                                                    <option value="">SELECT</option>
                                                    <option value="BIRTHDAY">BIRTHDAY</option>
                                                    <option value="WEDDING DAY">WEDDING DAY</option>
                                                    
                                                </select>

                                             </td>
                                             <td><input type="text" ng-model="g_name" class="g_name" ></td>
                                             <td><input type="date" ng-model="g_date" class="date g_date" ></td>
                                             <td>


                                                 <select ng-model="gender" class="select gender">
                                                    <option value="">SELECT</option>
                                                    <option value="MALE">MALE</option>
                                                    <option value="FEMALE">FEMALE</option>
                                                    
                                                </select>
                                             </td>
                                             <td><input type="text" ng-model="age" class="age"></td>
                                             <td><input type="text" ng-model="blood_group" class="blood_group"></td>
                                             <td>

                                                <select ng-model="religion" class="select religion">
                                                    <option value="">SELECT</option>
                                                    <option value="HINDHU">HINDHU</option>
                                                    <option value="MUSLIM">MUSLIM</option>
                                                    <option value="CHRISTIAN">CHRISTIAN</option>
                                                </select>




                                             </td>
                                             <td><input type="text" ng-model="other_details" class="other_details"></td>
                                             
                                             <td>
                          <i class="mdi mdi-plus-circle font-size-18 right-bar-toggle" style="cursor: pointer;" onclick="return add_rowprice1();"></i>
                                             </td>
                                          </tr>
                                         

                                        

                                         

                                         

                                         
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>



                            <?php
                        }


                         if($key!='CUSTOMER DETAILS')
                        {
                            
                            echo '</div></div>';
                        }


                        if($key=='CUSTOMER DETAILS')
                        {

                            ?>

                       <div class="col-md-3" >
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Sales Group </label>
                            <div class="col-sm-12">
                             <select class="form-control checkallbox" data-section="29" name="sales_group"   ng-model="sales_group">

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
                        
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Sales Team </label>
                            <div class="col-sm-12">
                             <select class="form-control checkallbox" name="sales_team_id" data-section="29" ng-model="sales_team_id"  id="sales_team_id">

                              <option value=""> Select Sales Team</option>

                              <?php
                                foreach ($sales_team as $value) {

                                  ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        
                            <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Sales Sub Team  </label>
                            <div class="col-sm-12">
                             <select class="form-control checkallbox" name="sales_team_sub_id" data-section="29" ng-model="sales_team_sub_id">

                              <option value=""> Select Sales Sub Team</option>

                              <?php
                                foreach ($sales_sub_team as $value) {

                                  ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                        
                   

<div class="col-md-3">
                                              
                                              
                                                   <div class="form-group row">
                                                     
                                                         <label class="col-sm-12 col-form-label">OPENING BALANCE 



<?php
                                      $disabled_last=$disabled;
                                       if($disabled=='disabled_1')
                                       {
                                        $disabled_last='disabled';
                                          ?>
<span ng-click="editop()" style="color:red;cursor: pointer;">Add</span>
                                          <?php
                                       }

                                      ?>

                                                         </label>
                                                         <div class="col-sm-12" style="display: flex;">
                                                           
                                                           
                                                           <input type="text" data-section="20" <?php echo $disabled_last; ?> class="form-control opening_balance ng-pristine ng-valid ng-touched" name="opening_balance" id="opening_balance" ng-model="opening_balance" style="width: 60%">

                                                        <select class="form-control checkallbox" <?php echo $disabled_last; ?> data-section="20" name="opening_balance_status" id="opening_balance_status" ng-model="opening_balance_status" style="width: 40%">

                                                              <option value="">Select</option>
                                                                                                                                  <option value="CR">CR</option>
                                                              
                                                                                                                                  <option value="DR">DR</option>
                                                              
                                                                                                                          </select>
                                                           
                                                           
                                                         </div>
                                                      
                                                   </div>
                                                
                                                
                                                
                                            </div>





                                             <div class="col-md-3" id="CNNVIEW" style="display: none;">


                                  <div class="form-group row">

                                    <label class="col-sm-12 col-form-label">CNN OPENING BALANCE




 <?php

                                       if($disabled=='disabled_1')
                                       {

                                        
                                          ?>
<span ng-click="editopcnn()" style="color:red;cursor: pointer;">Edit</span>


                                          <?php
                                       }

                                      ?>

                                    </label>
                                    <div class="col-sm-12" style="display: flex;">


                                      <input type="text" data-section="20" <?php echo $disabled_last; ?> class="form-control cnn_opening_balance" name="cnn_opening_balance" id="cnn_opening_balance" ng-model="cnn_opening_balance" style="width: 60%">

                                      <select class="form-control checkallbox" <?php echo $disabled_last; ?> data-section="20" name="cnn_payment_status" id="cnn_payment_status" ng-model="cnn_payment_status" style="width: 40%">

                                        <option value="">Select</option>
                                        <option value="CR">CR</option>
                                        <option value="DR">DR</option>

                                      </select>


                                    </div>

                                  </div>



                                </div>

                            <?php
                            
                            echo '</div></div>';
                        }
                      
                           
                      }
                        ?>
                        
                         <div class="col-md-3" style="display:none;">
                                              
                                                 <div class="form-group row">
                                                      
                                                         <label class="col-sm-12 col-form-label">Sub Group <span style="color:red;">*</span></label>
                                                         <div class="col-sm-12">
                                                            <select class="form-control1"   name="account_heads_id"  ng-model="account_heads_id">
                                                               
                                                              <?php
                                                              foreach ($accounttype as $val)
                                                              { 

                                                              ?>
                                                                    <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                              
                                                              <?php
                                                              
                                                              }

                                                              ?>
                                                            </select>
                                                           
                                                         </div>
                                                    
                                                   </div>
                                             
                                                
                                            </div>

                        
              
                        

                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      <div id="section30">
                 <h2 class="accordion-header" id="section1Header">
                                       <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#section1Content30" aria-expanded="true" aria-controls="section1Content30">
                                        CUSTOMER FEEDBACK
                                       </button>
                                       <div class="progress-circle-container">
                                          <div class="progress-circle-fill" data-progress="0"></div>
                                          <span class="progress-circle-text">0%</span>
                                       </div>
                   </h2>
</div>
                    <div id="section1Content30" class="accordion-collapse collapse show" aria-labelledby="section1Header" data-bs-parent="#section1Content30" style=""> 
                     <div class="row">

                         <div class="col-md-12">
                          <div class="form-group row">
                            
                            <div class="col-sm-3">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input d-none" ng-model="feedback1"  id="membershipRadios1" value="Price" checked> Price <i class="input-helper"></i></label>
                             
                               
                                            <!-- end col -->
                                            <div class="col-sm-8" >
                                             
                                                
                                                          <div class="star-rating">
                                                             
                                                              
                                                            <span class="fa fa-star" data-rating="1" data-value="feedback1"></span>
                                                            <span class="fa fa-star" data-rating="2" data-value="feedback1"></span>
                                                            <span class="fa fa-star" data-rating="3" data-value="feedback1"></span>
                                                            <span class="fa fa-star" data-rating="4" data-value="feedback1"></span>
                                                            <span class="fa fa-star" data-rating="5" data-value="feedback1"></span>
                                                            <input type="hidden" data-section="30"   id="feedback1"  class="rating-value form-control checkallbox" value="0">
                                                          </div>
                                                       
                                                   
                                               
                                            </div>
                                           
                             
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input d-none" ng-model="feedback2"  id="membershipRadios2" value="Delivery Time"> Delivery Time <i class="input-helper"></i></label>
                              
                                         <div class="col-sm-8" >
                                                           <div class="star-rating">
                                                            <span class="fa fa-star" data-rating="1" data-value="feedback2"></span>
                                                            <span class="fa fa-star" data-rating="2" data-value="feedback2"></span>
                                                            <span class="fa fa-star" data-rating="3" data-value="feedback2"></span>
                                                            <span class="fa fa-star" data-rating="4" data-value="feedback2"></span>
                                                            <span class="fa fa-star" data-rating="5" data-value="feedback2"></span>
                                                            <input type="hidden" data-section="30"  id="feedback2"  class="rating-value form-control checkallbox" value="0">
                                                          </div>
                                            </div>
                              
                              </div>
                            </div>
                            <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input d-none" ng-model="feedback3" id="membershipRadios3" value="quality"> Quality <i class="input-helper"></i></label>
                              <div class="col-sm-8" >
                             
                                                           <div class="star-rating">
                                                            <span class="fa fa-star" data-rating="1" data-value="feedback3"></span>
                                                            <span class="fa fa-star" data-rating="2" data-value="feedback3"></span>
                                                            <span class="fa fa-star" data-rating="3" data-value="feedback3"></span>
                                                            <span class="fa fa-star" data-rating="4" data-value="feedback3"></span>
                                                            <span class="fa fa-star" data-rating="5" data-value="feedback3"></span>
                                                            <input type="hidden" data-section="30" id="feedback3"  class="rating-value form-control checkallbox" value="0">
                                                          </div>
                                            
                              </div>
                              </div>
                            </div>
                            
                            
                            <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input d-none" ng-model="feedback4" id="membershipRadios3" value="quality"> Response  <i class="input-helper"></i></label>
                              <div class="col-sm-8" >
                                                         <div class="star-rating">
                                                            <span class="fa fa-star" data-rating="1" data-value="feedback4"></span>
                                                            <span class="fa fa-star" data-rating="2" data-value="feedback4"></span>
                                                            <span class="fa fa-star" data-rating="3" data-value="feedback4"></span>
                                                            <span class="fa fa-star" data-rating="4" data-value="feedback4"></span>
                                                            <span class="fa fa-star" data-rating="5" data-value="feedback4"></span>
                                                            <input type="hidden"  data-section="30" id="feedback4"  class="rating-value form-control checkallbox" value="0">
                                                          </div>
                              </div>
                              </div>
                            </div>



                            <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input d-none" ng-model="feedback5" id="membershipRadios3" value="quality"> Commission <i class="input-helper"></i></label>
                              <div class="col-sm-8" >
                                                         <div class="star-rating">
                                                            <span class="fa fa-star" data-rating="1" data-value="feedback5"></span>
                                                            <span class="fa fa-star" data-rating="2" data-value="feedback5"></span>
                                                            <span class="fa fa-star" data-rating="3" data-value="feedback5"></span>
                                                            <span class="fa fa-star" data-rating="4" data-value="feedback5"></span>
                                                            <span class="fa fa-star" data-rating="5" data-value="feedback5"></span>
                                                            <input type="hidden" data-section="30" id="feedback5"  class="rating-value form-control checkallbox" value="0">
                                                          </div>
                              </div>
                              </div>
                            </div>


                              <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input d-none" ng-model="feedback5" id="membershipRadios3" value="quality"> Customer Rating <i class="input-helper"></i></label>
                              <div class="col-sm-8" >
                                                         <div class="star-rating">
                                                              <span class="fa fa-star" data-rating="1" data-value="ratings"></span>
                                                            <span class="fa fa-star" data-rating="2" data-value="ratings"></span>
                                                            <span class="fa fa-star" data-rating="3" data-value="ratings"></span>
                                                            <span class="fa fa-star" data-rating="4" data-value="ratings"></span>
                                                            <span class="fa fa-star" data-rating="5" data-value="ratings"></span>
                                                            <input type="hidden"  id="ratings"   data-section="31" class="rating-value form-control checkallbox" value="0">
                                                          </div>
                              </div>
                              </div>
                            </div>



                            
                            
                            
                            
                        
                            
                          </div>
                        </div>
                       
                      


                           <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">FeedBack</label>
                            <div class="col-sm-12">
                              <textarea class="form-control checkallbox" rows="6" data-section="30" ng-model="feedback_details" name="feedback_details"></textarea>
                            </div>
                          </div>
                        </div>

                        
                      </div>
                        
                       </div> 
                        
                        
                        
                        
                        
















































































                        
                        
                     
                          
                   
                     <div class="row">

                        
                

                         <div class="row col-md-12 mt-4">


                           
                            <div class="col-md-8"></div>
                                           

                         <div class="col-md-4">
                          <div class="form-group flaot-end text-end">


                               <?php
                                    // Shop Team
                                   $usergroup=array(1,15); 
                                   if(in_array($this->session->userdata['logged_in']['access'],$usergroup))
                                   {
                                                                    
                                   ?>  

                                  <label class="form-check-label" for="stop_billing">
                                  <input type="checkbox" class="form-check-input" id="stop_billing" name="stop_billing" value="YES"> STOP BILLING
                                   </label>


                                      <?php


                                   }


                                   ?>



                              <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                              <input type="hidden" name="mark_vendor_id" id="mark_vendor_id" value="0" />
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" id="buttonsave" type="submit" value="{{submit_button}}">
                            </div>
                            </div>
                        </div>
                        
                   


                    </div>  
</div> 

                       
                      
                    </form>

<br><br>
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


                  </div>
                </div>
              </div>
            </div>

                        
                    </div>
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->

            







        </div>
    </div>
    
    


     <div class="modal fade exampleModalToggleLabel1" id="firstmodal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Verify</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                             <h5 id="error_phone" style="color:red;"></h5>
                                                        </div>

                                                        <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="hidebtn">Not Proceed</button>
                                                      <button type="button" class="btn btn-primary" id="showbtn">Proceed</button>
                                                    </div>
                                                       
                                                    </div>

                                                     
                                                </div>
   </div>

  

 <div class="modal fade exampleModalToggleLabel" id="firstmodalcommison" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Add new field</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                           <form id="pristine-valid-common2" ng-submit="submitFormmaster()" method="post">
                      








 <div class="row">

                         <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Lable name <small style="color:red;">(No Space OR Use Space to _ )</small></label>
                            <div class="col-sm-7">
                              <input id="name" class="form-control1" required  ng-model="label_name" placeholder="name_value" name="label_name" type="text">

                            </div>
                          </div>
                        </div>
                        
                        
                          <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Type</label>
                            <div class="col-sm-7">
                            
                              <select class="form-control1 typeset" required  ng-model="typebase">
                                  <option value=""> Select Type</option>
                                  <option value="Input Open field">Input Open field</option>
                                  <option value="Multiple Options">Multiple Options</option>
                                  <option value="Date">Date</option>
                              </select>

                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-12" id="optionset" style="display:none;">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Maulti Option <small>Input value with (,)</small></label>
                            <div class="col-sm-7">
                              <input id="name" class="form-control1"   ng-model="option" name="option" type="text">

                            </div>
                          </div>
                        </div>

                         <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Grouping</label>
                            <div class="col-sm-7">
                            
                              <select class="form-control1" required  ng-model="grouping">
                                 
                                  <?php 
                                  foreach($grouping as $val)
                                  {  
                                      if($val->id==3)
                                      {
                                          
                                      
                                      ?>
                                      <option value="<?php echo $val->id; ?>"> <?php echo $val->name; ?></option> 
                                      <?php
                                      
                                      }
                                  }
                                  
                                  ?>
                              </select>

                            </div>
                          </div>
                        </div>

                       <div class="col-md-12">
                          <div class="form-group row">
                          
                            <div class="col-sm-12">
                                
                                  <input class="btn btn-success w-lg waves-effect waves-light" style="float: right;" type="submit" value="Create">

                            </div>
                          </div>
                        </div>
</div>
                        



            
                      
                      
                    
                    </form>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>


  
    
     <!--<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places&language=en-AU&key=AIzaSyCjEh3MbrfcHihXg8eO5TnnwfAD35xSnHc"></script>
        <script>
            var autocomplete = new google.maps.places.Autocomplete($("#address1")[0], {});

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place.address_components);
            });
      </script>-->
    
    
    
    <input type="hidden" id="op_status" value="0" />
<input type="hidden" id="cnn_op_status" value="0" />
    
     <script>

        var count_value_dyeing = 1;
        var count_value_dyeing1 = 1;



function add_rowprice()
{
        
        
      $('#updaterecord').show();

      var all =count_value_dyeing++;
      
      var data='<tr > <th>'+ count_value_dyeing +'</th> <td><input type="text" ng-model="e_name" class="e_name" ></td> <td><input type="text" ng-model="e_title" class="e_title"></td> <td><input type="text" ng-model="e_address" class="e_address"></td> <td><input type="text" ng-model="e_phone" class="e_phone"></td> <td> <i class="mdi mdi-plus-circle font-size-18 right-bar-toggle" style="cursor: pointer;" onclick="return add_rowprice();"></i><i class="mdi mdi-delete font-size-18 right-bar-toggle" style="cursor: pointer;" onclick="return remove();"></i> </td> </tr>';
      
      $('#updaterecord').append(data);
      
}
function remove()
{

      $('#updaterecord tr:last').remove();
                 
}



function add_rowprice1()
{
        
        
      $('#updaterecord1').show();

      var all =count_value_dyeing1++;
      
      var data='<tr> <th>'+ count_value_dyeing1 +'</th>  <td> <select ng-model="relationship" class="select relationship"> <option value="">SELECT</option> <option value="CHILD">CHILD</option> <option value="WIFE">WIFE</option> <option value="PARENTS">PARENTS</option> <option value="FRIEND">FRIEND</option> </select> </td> <td> <select ng-model="greetings_for" class="select greetings_for"> <option value="">SELECT</option> <option value="BIRTHDAY">BIRTHDAY</option> <option value="WEDDING DAY">WEDDING DAY</option> </select> </td> <td><input type="text" ng-model="g_name" class="g_name"></td> <td><input type="date" ng-model="g_date" class="date g_date" ></td> <td> <select ng-model="gender" class="select gender"> <option value="">SELECT</option> <option value="MALE">MALE</option> <option value="FEMALE">FEMALE</option> </select> </td> <td><input type="text" class="age" ng-model="age" ></td> <td><input type="text" ng-model="blood_group" class="blood_group"></td> <td> <select ng-model="religion" class="select religion"> <option value="">SELECT</option> <option value="HINDHU">HINDHU</option> <option value="MUSLIM">MUSLIM</option> <option value="CHRISTIAN">CHRISTIAN</option> </select> </td> <td><input type="text" ng-model="other_details" class="other_details"></td> <td> <i class="mdi mdi-plus-circle font-size-18 right-bar-toggle" style="cursor: pointer;" onclick="return add_rowprice1();"></i><i class="mdi mdi-delete font-size-18 right-bar-toggle" style="cursor: pointer;" onclick="return remove1();"></i></td> </tr>';
      
      $('#updaterecord1').append(data);
      
}
function remove1()
{

      $('#updaterecord1 tr:last').remove();
                 
}



         
         // Function to update the progress circle and text based on completed input fields
         function updateProgress(sectionId) {



         const accordion = $(`#section${sectionId}`);
         const progressCircleFill = accordion.find('.progress-circle-fill[data-progress]');
         const progressCircleText = accordion.find('.progress-circle-text');


         const totalInputsInSection = $('.checkallbox[data-section="' + sectionId + '"]').length;
         var getsetion = $('.checkallbox[data-section="' + sectionId + '"]').val();


         const completedInputsInSection = $('.checkallbox[data-section="' + sectionId + '"]').filter(function() {
            return $(this).val()!= '';
         }).length;


       if(getsetion=='NO' && sectionId==28)
       {
         
           var  progressPercentage = (4 / totalInputsInSection) * 100;
       }
       else
       {

           var  progressPercentage = (completedInputsInSection / totalInputsInSection) * 100;

       }



         //const progressPercentage = (completedInputsInSection / totalInputsInSection) * 100;
         // Update the data-progress attribute and text with the rounded progressPercentage value
         progressCircleFill.attr('data-progress', Math.round(progressPercentage));
         progressCircleText.text(Math.round(progressPercentage) + '%');
         
         // Update overall progress
         updateOverallProgress();
         }
         
         // Function to calculate and update overall progress
         function updateOverallProgress() {
         const allInputFields = $('.checkallbox');
         const totalInputs = allInputFields.length;



         const completedInputs = allInputFields.filter(function() {

            return $(this).val() != '';
         }).length;

// alert(completedInputs);

         const overallProgressPercentage = (completedInputs / totalInputs) * 100;
         
         // Update the overall progress bar with the rounded percentage
         $('#overall-progress-bar').css('width', Math.round(overallProgressPercentage) + '%');
         $('#overall-progress-bar').text(Math.round(overallProgressPercentage) + '%');
         }
         
         // Event listener for input field changes
         $('.checkallbox').on('input', function()
         {

                
                 var inputValue = $(this).val();
                 var uppercaseValue = inputValue.toUpperCase();
                 $(this).val(uppercaseValue);


                 const sectionId = $(this).data('section');
                 updateProgress(sectionId);



         });

          $('.checkallbox').on('change', function()
         {

                
                 var inputValue = $(this).val();
                 var uppercaseValue = inputValue.toUpperCase();
                 $(this).val(uppercaseValue);


                 const sectionId = $(this).data('section');
                 updateProgress(sectionId);



         });
        
         
         
      </script>
    
    
<script type="text/javascript">      








var $star_rating = $('.star-rating .fa');

var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('#'+$(this).data('value')).val()) >= parseInt($(this).data('rating'))) {
        
      return $(this).removeClass('val').addClass('fa-star val');
      
    } else {
        
      return $(this).removeClass('val').addClass('fa-star');
      
    }
  });
};

$star_rating.on('click', function() {

        
          var sectionId=$(this).data('section');
          updateProgress(sectionId);
       

         $star_rating.siblings('#'+$(this).data('value')).val($(this).data('rating'));
         return SetRatingStar();
});

SetRatingStar();











$(document).ready(function () { 
    
     let cnnSec = $('#CNNVIEW');
let cnnFirst = $('div.cnn');
    
     $(".typeset").click(function(){
   
   var a= $(this).val();
   
   if(a=='Multiple Options')
   {     
       $('#optionset').show();
       
   }
   else
   {
        $('#optionset').hide();
   }
    
    
  });
    

     $("#hidebtn").click(function(){
   
       $('#buttonsave').hide();
       $('#firstmodal').modal('toggle');
    
    
  });
    
 $("#showbtn").click(function(){
   
       $('#buttonsave').show();
       $('#firstmodal').modal('toggle');
    
    
  });

    
        $("#gst_status").on('change',function(){
   
              var a= $(this).val();
   
                   if(a=='1')
                   {     
                       $('#gst_view').show();
                       
                   }
                   else
                   {
                        $('#gst_view').hide();
                   }
                    
    
       });


       


           
     $("#cnn").on('change', function() {

        var a = $(this).val();

        if (a == 'YES') {
          $('#CNNVIEW').show();

        } else {
          $('#CNNVIEW').hide();
        }


      });


      
          $('.credit_limit').hide();
          $('.credit_period').hide();
          $('.credit_bill_by_bill').hide();
          $("#credit").on('change',function(){
         
                        var a= $(this).val();
         
                         if(a=='YES')
                         {     
                              $('.credit_limit').show();
                              $('.credit_period').show();
                             $('.credit_bill_by_bill').show();
                             
                         }
                         else
                         {
                              $('.credit_limit').hide();
                              $('.credit_period').hide();
                              $('.credit_bill_by_bill').hide();
                         }
                          
    
          });
    
    
$("#gst").change(function () {    
                var inputvalues = $(this).val();    
                var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}');    
                if (gstinformat.test(inputvalues)) {    
                    return true;    
                } else {    
                    alert('Please Enter Valid GSTIN Number');    
                    //$("#gst").val('');    
                   // $("#gst").focus();    
                }    
            });          
 });          
  </script> 


<script>

var app = angular.module('crudApp', ['datatables']);
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

app.controller('crudController', function($scope, $http){

$scope.success = false;
$scope.error = false;

$scope.account_heads_id= 104;

$scope.submit_button = 'Save';
$scope.grouping=3;
$scope.gst_status=1;
$scope.sales_group=0;
$scope.customer_id="<?php echo $customers_last_id; ?>";
$scope.virtual_accountno="<?php echo $virtual_accountno; ?>";








        $scope.dateGET1 = function (tablename) 
        {
    
    
    
   
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/customer/state_find_data",
          data:{'tablename':tablename}
          }).success(function(data){
    
              $scope.availableProductsmmval1 = data;
         
          });
          
      
      }
           

          $scope.dateGET2 = function (tablename) 
        {
    
    
    
   
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/customer/state_find_data",
          data:{'tablename':tablename}
          }).success(function(data){
    
              $scope.availableProductsmmval2 = data;
         
          });
          
      
      }


       $scope.dateGET3 = function (tablename) 
        {
    
    
    
   
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/customer/state_find_data",
          data:{'tablename':tablename}
          }).success(function(data){
    
              $scope.availableProductsmmval3 = data;
         
          });
          
      
      }



$scope.onClick = function(id) {
 
    $('.sasa').hide();
     if(id==-1)
     {
       var base='vendor';
     }

     if(id==2)
     {
       var base='vendor';
     }

      if(id==-2 || id==-3)
     {
       var base='driver';
     }

     if(id==-4)
     {
       var base='other';
     }

        $('#'+base).show();

}

       $scope.dateGET4 = function (tablename) 
        {
    
    
    
   
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/customer/state_find_data",
          data:{'tablename':tablename}
          }).success(function(data){
    
              $scope.availableProductsmmval4 = data;
         
          });
          
      
      }

$("#company_name").on('input',function()
{
    var company_name=$(this).val();
    $scope.print_name = company_name;
});

  $("#state").on('change',function()
  {


          var value= $(this).val();

          $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/customer/state_find_data",
          data:{'tablename':'zone','value':value}
          }).success(function(data){
    
              $scope.availableProductsmmval2 = data;
         
          });

            $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/customer/state_find_data",
          data:{'tablename':'district','value':value}
          }).success(function(data){
    
              $scope.availableProductsmmval3 = data;
         
          });

            $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/customer/state_find_data",
          data:{'tablename':'city','value':value}
          }).success(function(data){
    
              $scope.availableProductsmmval4 = data;
         
          });




                  var arrval=["TAMILNADU"];
                  var value= $(this).val();
                  var sst=0;
  
                   if(jQuery.inArray(value,arrval)!== -1)
                   {   


                     $scope.gst_class='CGST_AND_SGST';
                     $("#gst_class").prop('disabled', true);

                      var sst=1;
                       
                   }


      var arrval2=["ANDAMAN AND NICOBAR ISLANDS","CHANDIGARH","DADRA AND NAGAR HAVELI AND DAMAN AND DIU","DELHI","JAMMU AND KASHMIR","LADAKH","LAKSHADWEEP","PUDUCHERRY"];
                  
  
                   if(jQuery.inArray(value,arrval2)!== -1)
                   {   


                    $scope.gst_class='UTGST';
                    $("#gst_class").prop('disabled', true);

                      var sst=1;
                       
                   }
                    
                  
                   if(sst==0)
                   {   


                    $scope.gst_class='IGST';
                    $("#gst_class").prop('disabled', true);

                      
                       
                   }
                    



  
               

                   // $scope.tax_percentage='18%';






  });


    $("#district").on('change',function()
  {


          var value= $(this).val();

        

          $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/customer/city_find_data",
          data:{'tablename':'city','value':value}
          }).success(function(data){
    
              $scope.availableProductsmmval4 = data;
         
          });



          $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/customer/zone_find_data",
          data:{'tablename':'zone','value':value}
          }).success(function(data){
    
              $scope.availableProductsmmval2 = data;

            

               $scope.zone=data[0].name;


         
          });




          $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/customer/state_find_value_find_data",
          data:{'tablename':'state','value':value}
          }).success(function(data){
    
                
                 $scope.state=data[0].name;


         
          });




  });




    
    $("#city").on('change',function()
  {


          var value= $(this).val();

        

          $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/customer/find_all_city_dateils",
          data:{'tablename':'city','value':value}
          }).success(function(data){
    
               $scope.state=data[0].state;
               $scope.district=data[0].district;


                            
                              $http({
                              method:"POST",
                              url:"<?php echo base_url() ?>index.php/customer/zone_find_data",
                              data:{'tablename':'zone','value':data[0].district}
                              }).success(function(data){
                        
                                  $scope.availableProductsmmval2 = data;

                                

                                   $scope.zone=data[0].name;


                             
                              });


         
          });



        

          



  });



  $("#customer_type").on('change',function()
         {


               var arrval=["FABRICATOR"," FABRICATOR(LARGESCALE)","ENGINEERS","CONTRACTOR","SHOP","TRADERS","CONSTRUCTION,SOLAR CONTRACTORS","PROFILERS","PEB MANUFACTURERS","WAREHOUSE","HARDWARES","BUILDING MATERIAL SUPPLIER"];
              var value= $(this).val();
  
                   if(jQuery.inArray(value,arrval)!== -1)
                   {   


                    $scope.regular='YES';
                    $("#regular").prop('disabled', true);

                      
                       
                   }
                   else
                   {

                     $scope.regular='NO';
                     $("#regular").prop('disabled', false);
                        
                   }
                    
    
         });











$scope.getpencodeDetails = function (event) 
{







 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/pincode",
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            //$scope.city = data.city;
            //$scope.state =  data.state;
            //$scope.zone =  data.locality;

    });





}







    $scope.completeLocalty=function()
    {
    $( "#localitybase" ).autocomplete({
      source: $scope.availableTags
    });
    
    
        $http({
      method:"POST",
      url:"<?php echo base_url(); ?>index.php/customer/customer_search_full_locality",
      data:{'action':'fetch_single_data','order_no':'SU120/E/2/2022','tablename_sub':'order_product_list'}
    }).success(function(data){

          $scope.availableTags = data;
     
    });
    
    }; 
    





$scope.Namefetch = function()
{
    
     var company_name= $scope.company_name;
     
$http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/company_name_find",
      data:{'company_name':$scope.company_name}
    }).success(function(data){
       
       if(data.error==1)
       {
            //$('#error_name').html('Name already exists');

            $('#error_phone').html('Name already exists <br> '+company_name);
            
            $('#firstmodal').modal('toggle');
            $('#buttonsave').hide();
            $('#showbtn').hide();
          

       }
       else
       {
           $('#error_name').html('');
           $('#buttonsave').show();
       }



    });

};

$scope.Phonenumberchech = function()
{
    
$http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/phone_no_find",
      data:{'phone':$scope.phone}
    }).success(function(data){
       
       
       if(data.error==1)
       {
           $('#error_phone').html('Phone Number already exists <br> '+data.url);
           $('#buttonsave').hide();
            $('#firstmodal').modal('toggle');
       }
       else
       {
           $('#error_phone').html('');
           $('#buttonsave').show();
       }


    });

};



$scope.submitFormmaster = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/additional_information/insertandupdate",
      data:{'label_name':$scope.label_name,'account_heads_id':$scope.account_heads_id,'type':$scope.typebase,'option':$scope.option,'grouping':$scope.grouping,'id':1,'action':'Add','tablename':'additional_information'}
    }).success(function(data){
       
      if(data.error != '1')
      {
       
       
         alert('Created..');
         location.reload();
        
      }



    });
  };
  
  
  
  $scope.editop = function() 
{
 

    $("#op_status").val(1);
    $("#opening_balance").prop("disabled", false);
    $("#opening_balance_status").prop("disabled", false);


};
$scope.editopcnn = function()
{


   $("#cnn_op_status").val(1);
   $("#cnn_opening_balance").prop("disabled", false);
   $("#cnn_payment_status").prop("disabled", false);

};
  
  
  
 $scope.Seletdriver = function() {


        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/driver/fetch_single_data",
          data: {
            'id': $scope.seletdriver,
            'action': 'fetch_single_data',
            'tablename': 'driver'
          }
        }).success(function(data) {

          //$scope.company_name = data.name;

          //$scope.email = data.email;
          //$scope.phone = data.phone;


          $('#mark_vendor_id').val(data.id);

          //$scope.gst = data.gst;
          //$scope.approved_status = data.approved_status;
          //$scope.address1 = data.address1;
          //$scope.address2 = data.address2;
          //$scope.landmark = data.landmark;
          //$scope.pincode = data.pincode;
          //$scope.city = data.city;
          //$scope.state = data.state;
          //$scope.landline = data.landline;

                              
                           
                                  



        });


      };




 $scope.Seletother = function() {


        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/accountheads/fetch_single_data",
          data: {
            'id': $scope.seletother,
            'action': 'fetch_single_data',
            'tablename': 'accountheads'
          }
        }).success(function(data) {

          //$scope.company_name = data.name;

          //$scope.email = data.email;
          //$scope.phone = data.phone;


          $('#mark_vendor_id').val(data.id);

          //$scope.gst = data.gst;
          $scope.approved_status = data.approved_status;
          //$scope.address1 = data.address1;
          //$scope.address2 = data.address2;
          //$scope.landmark = data.landmark;
          //$scope.pincode = data.pincode;
          //$scope.city = data.city;
          //$scope.state = data.state;
          //$scope.landline = data.landline;

                              
                           
                                  



        });


      };

  
  
  
  
  
 $scope.Seletvendor = function () {
      
      
           $http({
           method:"POST",
           url:"<?php echo base_url() ?>index.php/vendor/fetch_single_data",
           data:{'id':$scope.seletvendor,'action':'fetch_single_data','tablename':'vendor'}
           }).success(function(data){
    
             $scope.company_name = data.name;
             $scope.email = data.email;
              
              
              $('#mark_vendor_id').val(data.id);
              
              
             $scope.phone = data.phone;
             $scope.gst = data.gst;
             $scope.status = data.status;
             $scope.address1 = data.address1;
             $scope.address2 = data.address2;
             $scope.landmark = data.landmark;
             $scope.pincode = data.pincode;
             $scope.city = data.city;
             $scope.state = data.state;
             $scope.landline = data.landline;
         
          });
      
      
};   
  
  
  
  
 $scope.Getroute = function () {
      
      
          var localitybase=  $('#localitybase').val();
       
      
           $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/customer/fetch_route",
              data:{'id':localitybase}
            }).success(function(data){
                
                
              
                 $scope.route_name = data.route_name;
                 
                
             
            });
            
           
      
      
};   


  $scope.sales_team_id='<?php echo $userid; ?>';
 
  $scope.submitForm = function(){
      
      
  var mark_vendor_id=  $('#mark_vendor_id').val();
    var price_rateings=  $('#feedback1').val();
    var delivery_time_rateings=  $('#feedback2').val();
    var quality_rateings=  $('#feedback3').val();
    var response_commission=  $('#feedback4').val();
    var commission_feed_back=  $('#feedback5').val();
    var gst_status=  $('#gst_status').val();



    var ratings=  $('#ratings').val();
   var active=$('input[name="optradio"]:checked').val();




      var e_name = $(".e_name");
      var e_name_value = [];
      for(var i = 0; i < e_name.length; i++){
          
           e_name_value.push($(e_name[i]).val());
         
      }
      var e_name= e_name_value.join("|");


      var e_title = $(".e_title");
      var e_title_value = [];
      for(var i = 0; i < e_title.length; i++){
          
          e_title_value.push($(e_title[i]).val());
         
      }
      var e_title= e_title_value.join("|");


      var e_address = $(".e_address");
      var e_address_value = [];
      for(var i = 0; i < e_address.length; i++){
          
          e_address_value.push($(e_address[i]).val());
         
      }
      var e_address= e_address_value.join("|");



      var e_phone = $(".e_phone");
      var e_phone_value = [];
      for(var i = 0; i < e_phone.length; i++){
          
          e_phone_value.push($(e_phone[i]).val());
         
      }
      var e_phone= e_phone_value.join("|");









      var relationship = $(".relationship");
      var relationship_value = [];
      for(var i = 0; i < relationship.length; i++){
          
          relationship_value.push($(relationship[i]).val());
         
      }
      var relationship= relationship_value.join("|");



      var greetings_for = $(".greetings_for");
      var greetings_for_value = [];
      for(var i = 0; i < greetings_for.length; i++){
          
          greetings_for_value.push($(greetings_for[i]).val());
         
      }
      var greetings_for= greetings_for_value.join("|");



       var g_name = $(".g_name");
      var g_name_value = [];
      for(var i = 0; i < g_name.length; i++){
          
          g_name_value.push($(g_name[i]).val());
         
      }
      var g_name= g_name_value.join("|");


       var g_date = $(".g_date");
      var g_date_value = [];
      for(var i = 0; i < g_date.length; i++){
          
          g_date_value.push($(g_date[i]).val());
         
      }
      var g_date= g_date_value.join("|");


       var gender = $(".gender");
      var gender_value = [];
      for(var i = 0; i < gender.length; i++){
          
          gender_value.push($(gender[i]).val());
         
      }
      var gender= gender_value.join("|");


       var age = $(".age");
      var age_value = [];
      for(var i = 0; i < age.length; i++){
          
          age_value.push($(age[i]).val());
         
      }
      var age= age_value.join("|");


       var blood_group = $(".blood_group");
      var blood_group_value = [];
      for(var i = 0; i < blood_group.length; i++){
          
          blood_group_value.push($(blood_group[i]).val());
         
      }
      var blood_group= blood_group_value.join("|");



      var religion = $(".religion");
      var religion_value = [];
      for(var i = 0; i < religion.length; i++){
          
          religion_value.push($(religion[i]).val());
         
      }
      var religion= religion_value.join("|");


      var other_details = $(".other_details");
      var other_details_value = [];
      for(var i = 0; i < other_details.length; i++){
          
          other_details_value.push($(other_details[i]).val());
         
      }
      var other_details= other_details_value.join("|");




   var res=1;

     if($('#phone').val()=='')
    {
             var nametatus="phone";
             var res=0;
  
    }
    else if($('#company_name').val()=='')
    {
             var nametatus="company_name";
             var res=0;
  
    }
    else if($('#pincode').val()=='')
    {
             var nametatus="pincode";
             var res=0;
  
    }
    else if($('#address1').val()=='')
    {


             var nametatus="address1";
             var res=0;
  
    }
    else if($('#localitybase').val()=='')
    {
             var nametatus="localitybase";
             var res=0;
  
    }
    else if($scope.customer_type===undefined)
    {
             var nametatus="customer_type";
             var res=0;
  
    }
    
    else
    {

           if(gst_status==1)
          {


                var gst=  $('#gst').val();
                if(gst=='')
                {

                   var nametatus="gst";
                   var res=0;
                }
               
          }
        

    }


var stop_billing=$('input[name="stop_billing"]:checked').val();



    if(res==1)
    {

      
    $('#buttonsave').hide();
    var op_status = $('#op_status').val();
            var cnn_op_status = $('#cnn_op_status').val();

    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
      data:{'status':'1',
      'op_status': op_status,
      'cnn_op_status': cnn_op_status,
      'sales_team_id':$scope.sales_team_id,
      'opening_balance':$scope.opening_balance,
      'opening_balance_status':$scope.opening_balance_status,
      'cnn_opening_balance': $scope.cnn_opening_balance,
      'cnn_payment_status': $scope.cnn_payment_status,
      'stop_billing':stop_billing,
      'e_name':e_name,
      'e_title':e_title,
      'e_address':e_address,
      'e_phone':e_phone,
      'relationship':relationship,
      'greetings_for':greetings_for,
      'g_name':g_name,
      'g_date':g_date,
      'gender':gender,
      'age':age,
      'blood_group':blood_group,
      'religion':religion,
      'print_name': $scope.print_name,
      'other_details':other_details,
      <?php
      foreach($additional_information as $vl)
      {
             $label_name=strtolower($vl->label_name);
             ?>
             '<?php echo $label_name; ?>' : $scope.<?php echo $label_name; ?>,
             <?php
       }
      ?>
      'google_map_link':$scope.google_map_link,'commission_feed_back':commission_feed_back,'mark_vendor_id':mark_vendor_id,'active':active,'gst_status':$scope.gst_status,'feedback_details':$scope.feedback_details,'price_rateings':price_rateings,'delivery_time_rateings':delivery_time_rateings,'quality_rateings':quality_rateings,'response_commission':response_commission,'ratings':ratings,'feedback':$scope.feedback,'phone':$scope.phone,'zone':$scope.zone,'locality':$scope.locality,'city':$scope.city,'state':$scope.state,'pincode':$scope.pincode,'district':$scope.district,'landmark':$scope.landmark,'address1':$scope.address1,'address2':$scope.address2,'company_name':$scope.company_name,'gst':$scope.gst,'landline':$scope.landline,'email':$scope.email,'sales_group':$scope.sales_group,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'customers'}
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
              $('#buttonsave').show();
              
               $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });
            
              

          }
          else
          {

            $scope.success = true;
            $scope.error = false;
            $scope.name = "";
            $scope.email = "";
            $scope.phone = "";
            $scope.city = "";
            $scope.state = "";
             $scope.district = "";
            $('#mark_vendor_id').val('0');
            $scope.zone="";
            $scope.address1 = "";
            $scope.address2 = "";
            $scope.company_name = "";
            $scope.locality = "";
            
            $scope.google_map_link = "";
            $scope.sales_team_id="";
             $scope.sales_team_sub_id="";
            
             
                                 <?php
                                 foreach($additional_information as $vl)
                                 {
                                   $label_name=strtolower($vl->label_name);
                                  ?>
                                    $scope.<?php echo $label_name; ?> = "";
                                  <?php
                                 }
                                 ?>
                                 
            $scope.feedback_details = "";
            
            $scope.gst = "";
            $scope.landline = "";
            $scope.landmark = "";

            $scope.pincode = "";


            $scope.sales_group = "";
            $scope.successMessage = data.massage;
            
            
              $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });



                var form_data = new FormData();  
                                       angular.forEach($scope.files, function(file){  
                                            form_data.append('file[]', file);  
                                       });  
                                       $http.post('<?php echo base_url() ?>index.php/customer/fileuplaodimgsave?id='+data.insert_id, form_data,  
                                       {  
                                            transformRequest: angular.identity,  
                                            headers: {'Content-Type': undefined,'Process-Data': false}  
                                       }).success(function(response){  
                                           
                                             
                                       });  

                                                                
                                                               
            
              location.reload();
            
          

          }

          

      }

       
    });

    }
    else
    {

          $('#'+nametatus).css("border-color", "red");
          $('#'+nametatus).trigger("focus");

    }


  };

 


});

</script>
    <?php include ('footer.php'); ?>
</body>
<script src="<?php echo base_url(); ?>assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/pristinejs/pristine.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/form-advanced.init.js"></script>


