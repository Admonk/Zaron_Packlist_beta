<?php
include "header.php";
$access=0;
$disabled='disabled';
$usergroup = array(1, 15);
if (in_array($this->session->userdata['logged_in']['access'], $usergroup)) 
{

  $access=1;

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

  .star-rating {
    line-height: 32px;
    font-size: 1.25em;
  }

  label.col-sm-12.col-form-label {
    text-transform: uppercase;
  }

  label.form-check-label {
    font-weight: 800;
    font-size: 15px;
  }

  .card-title {
    background: #7ea2c73d;
    padding: 11px;
  }

  .val {
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
    border: 2px solid #58748e;
    /* Change to your desired background color */
    margin-left: auto;
    display: inline-block;
    left: 92%;
    top: 7%;
    z-index: 999;
  }

  .accordion-header {
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
    background-color: #007bff;
    /* Change to your desired fill color */
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

  .form-control1 {
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

  .form-control-custom {
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

  .reasonValidate {
    display: none;
  }

  .customer-error{
          border-color:#ef6767 !important;
         }
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">SHIPPING ADDRESS</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card table-editable-info h-auto">
            <div class="card-body p-0">
              <div class="table-rep-plugin">
                <div class="table-responsive mb-0" style="max-height: 650px;" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th data-priority="1">CONTACT NAME </th>
                        <th data-priority="1">CONTACT PHONE </th>
                        <th data-priority="3">GST STATUS</th>
                        <th data-priority="1">GST</th>
                        <th data-priority="3">ADDRESS LINE1</th>
                        <th data-priority="6">ADDRESS LINE2</th>
                        <th data-priority="1">PINCODE</th>
                        <th data-priority="1">LANDMARK</th>
                        <th data-priority="1">ZONE</th>
                        <th data-priority="1">CITY</th>
                        <th data-priority="1">LOCALITY</th>
                        <th data-priority="1">STATE</th>
                        <th data-priority="1">GOOGLE LOCATION-LINK</th>

                      </tr>
                    </thead>
                    <tbody id="updaterecord">

                      <?php
                      $i = 1;
                      if (count($shipping_address_details) > 0) {


                        foreach ($shipping_address_details as  $value) {
                          # code...

                      ?>
                          <tr>

                            <th><?php echo $i; ?></th>
                            <td><a href="<?php echo base_url(); ?>index.php/customer/customer_add?add_id=<?php echo $value->id; ?>" target="_blank"><?php echo $value->name; ?></a></td>
                            <td><?php echo $value->phone; ?></td>
                            <td><?php
                                if ($value->gst_status == 1) {
                                  echo 'GST HOLDER';
                                } elseif ($value->gst_status == 2) {
                                  echo 'NON GST HOLDER';
                                } else {
                                  echo "";
                                }
                                ?>
                            </td>
                            <td><?php echo $value->gstno; ?></td>
                            <td><?php echo $value->address1; ?></td>
                            <td><?php echo $value->address2; ?></td>
                            <td><?php echo $value->pincode; ?></td>
                            <td><?php echo $value->landmark; ?></td>
                            <td><?php echo $value->zone; ?></td>
                            <td><?php echo $value->city; ?></td>
                            <td><?php echo $value->locality; ?></td>
                            <td><?php echo $value->state; ?></td>
                            <td><?php echo $value->google_map_link; ?></td>
                          </tr>

                      <?php
                          $i++;
                        }
                      }
                      ?>
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
  <div id="layout-wrapper">
    <?php echo $top_nav; ?>






    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Customer Edit</h4>

                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/customer/customer_list">Customer list</a></li>
                    <li class="breadcrumb-item active"> Customer Forms Edit</li>
                  </ol>
                </div>

              </div>
            </div>
          </div>
          <!-- end page title -->

          <div class="row">
            <div class="col-lg-12">
              <div class="card">

                <!--  <div class="card-header1">
                   <a href="#" class="btn btn-success"  data-bs-toggle="modal" data-bs-target=".exampleModalToggleLabel" style="float:right;margin: 5px 10px;">Add new field</a>
                   </div> -->
                <div class="card-body" ng-init="fetchData()">
                  <form id="pristine-valid-example" novalidate method="post"></form>
                  <div class="progress">
                    <div id="overall-progress-bar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                  </div>






                  <form class="needs-validation was-validated" id="needs-validation" novalidate="" ng-submit="submitForm()" method="post">



                    <div class="row mb-4 mt-4">


                        <div class="col-md-4">

                        <label class="col-sm-12 col-form-label">Customer & Vendor > inactive feature</label>
                        <label class="radio-inline">

                          <input type="radio" ng-click="onClick(2)" name="optradio" ng-checked="mark_vendor_id_check>0" value="2" id="active"> Both

                        </label>
                        <label class="radio-inline">
                          <input type="radio" ng-click="onClick(0)" name="optradio" ng-checked="mark_vendor_id_check==0" value="0" id="inactive"> Customer
                        </label>

                        <label class="radio-inline">
                          <input type="radio" ng-click="onClick(-1)" name="optradio" ng-checked="mark_vendor_id_check==-1" value="-1"> Vendor
                        </label>

                        <label class="radio-inline d-none">
                          <input type="radio" ng-click="onClick(-2)" name="optradio" ng-checked="mark_vendor_id_check==-2" value="-2"> Driver Rent
                        </label>

                        <label class="radio-inline d-none">
                          <input type="radio" ng-click="onClick(-3)" name="optradio" ng-checked="mark_vendor_id_check==-3" value="-3"> Driver Collection
                        </label>


                        <label class="radio-inline d-none">
                          <input type="radio" ng-click="onClick(-4)" name="optradio" ng-checked="mark_vendor_id_check==-4" value="-4"> Other Ledger
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

                    <?php

                    $usergroup = array(1, 15);
                    if (!(in_array($this->session->userdata['logged_in']['access'], $usergroup))) {
                    ?>
                      <div class="alert alert-danger reject_reason_text" role="alert" style="display:none;">
                        <h4 class="alert-heading">Customer Verification Rejected</h4>
                        <hr />
                        <p class="reject_reason_text_section"></p>

                      </div>

                    <?php
                    }
                    ?>
                    <p class="text-end"><a class="btn btn-primary btn-closed" href="#" role="button" id="close">Collapse
                        All</a></p>
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
                            <label class="col-sm-12 col-form-label">Phone <span style="color:red;">*</span>
                              <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i>
                            </label>
                            <div class="col-sm-12">
                              <input id="phone" data-section="29" class="form-control input-field ng-pristine ng-untouched ng-invalid ng-invalid-required" name="phone" ng-blur="Phonenumberchech()" required="" ng-model="phone" type="text">
                              <div class="invalid-feedback">Please provide a valid phone number.</div>
                            </div>
                          </div>
                        </div>



                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Company name <span style="color:red;">*</span><i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                            <div class="col-sm-12">
                              <input id="company_name" class="form-control checkallbox" data-section="20" required name="company_name" ng-model="company_name" type="text">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">PRINT NAME <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                            <div class="col-sm-12">
                              <input id="print_name" data-section="20" class="form-control checkallbox" name="print_name" ng-model="print_name" type="text">
                              <small id="error_name" style="color:red;"></small>
                            </div>
                          </div>
                        </div>






                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">GST Status <span style="color:red;">*</span><i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                            <div class="col-sm-12">

                              <select class="form-control checkallbox" required name="gst_status" data-section="20" id="gst_status" required ng-model="gst_status">

                                <option value="1">GST Holder</option>
                                <option value="2">NON GST Holder</option>

                              </select>


                            </div>
                            <div class="error-message-gst-status" style="display: none;">This field is required</div>

                          </div>
                        </div>

                        <div class="col-md-3" id="gst_view">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">GST <span style="color:red;">*</span><i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                            <div class="col-sm-12">
                              <input id="gst" required class="form-control checkallbox" name="gst" data-section="20" ng-model="gst" type="gst">
                            </div>
                            <div class="error-message" style="display: none;">This field is required</div>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Office Address line 1 <span style="color:red;">*</span><i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                            <div class="col-sm-12">
                              <input id="address1" class="form-control checkallbox" data-section="20" name="address1" required ng-model="address1" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Office Address line 2<i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                            <div class="col-sm-12">
                              <input id="address2" class="form-control checkallbox" data-section="20" name="address2" ng-model="address2" type="address2">
                            </div>
                          </div>
                        </div>

                        <!--  <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Pincode <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="pincode" class="form-control checkallbox" data-section="20" ng-blur="getpencodeDetails($event)" name="pincode" required ng-model="pincode" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Landmark </label>
                            <div class="col-sm-12">
                             <input id="landmark" class="form-control checkallbox" data-section="20" name="landmark"    ng-model="landmark" type="landmark">
                            </div>
                          </div>
                        </div> -->




                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">State <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                            <div class="col-sm-12">


                              <select class="form-control checkallbox" data-section="20" ng-model="state" name="state" id="state">


                                <option value="">Select State</option>

                                <?php

                                foreach ($state as $val) {
                                ?>
                                  <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>

                                <?php
                                }

                                ?>




                              </select>



                            </div>
                          </div>
                        </div>




                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Zone <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                            <div class="col-sm-12">


                              <select class="form-control checkallbox" data-section="20"   ng-model="zone" name="zone" id="zone" ng-init="dateGET2('zone')">
                                                            
                      
                        <option ng-repeat="mmsetsst in availableProductsmmval2" ng-selected="mmsetsst.name==zone"  value="{{mmsetsst.name}}"> {{mmsetsst.name}} </option>
                                                   

                                                           
                                                           
                                                            
                                </select>

                            </div>
                          </div>
                        </div>



                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">District <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                            <div class="col-sm-12">


                             <select class="form-control checkallbox"    data-section="20" ng-model="district" name="district" id="district" ng-init="dateGET3('district')">
                                                            
                                                          
                   
                                                            
                          <option ng-repeat="mmsetsst in availableProductsmmval3" ng-selected="mmsetsst.name==district" value="{{mmsetsst.name}}"> {{mmsetsst.name}} </option>
                                          
                                                           
                                                           
                                                            
                                                        </select>



                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Taluk - ({{city}})<i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                            <div class="col-sm-12">

                                <select class="form-control checkallbox" data-section="20"    ng-model="city" name="city" id="city" ng-init="dateGET4('city')">
                                                            
                                                          
                                              
                                                            
                          <option ng-repeat="mmsetsst in availableProductsmmval4" ng-selected="mmsetsst.name==city" value="{{mmsetsst.name}}"> {{mmsetsst.name}} </option>
                                          
                                                           
                                                           
                                                           
                                                            
                                                        </select>



                            </div>
                          </div>
                        </div>





                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Locality <span style="color:red;">*</span><i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                            <div class="col-sm-12">



                              <input type="text" class="form-control checkallbox" data-section="20" ng-model="locality" ng-keyup="completeLocalty()" ng-blur="Getroute()" required placeholder="Search locality" id="localitybase">


                              <p ng-if="route_name" style="color: red;text-align: right;">{{route_name}}</p>



                            </div>
                          </div>
                        </div>


                        <?php
                        $kk = 19;
                        foreach ($setion as $key => $value) {

                          $kk++;

                          if ($key != 'CUSTOMER DETAILS') {


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


                              foreach ($value as $vvl) {

                                $required = $vvl['required'];
                                $rrs = "";
                                $span = "";
                                if ($required == 1) {
                                  $rrs = "required";
                                  $span = '<span style="color:red;">*</span>';
                                }

                                $label_name = str_replace('_', ' ', ucfirst($vvl['label_name']));
                                $str_name = strtolower($vvl['label_name']);

                                if ($vvl['type'] == 'Multiple Options') {


                                  $option = $vvl['option'];
                                  $option = explode(',', $option);

                                  $s_m = "";
                                  $multiselect = $vvl['multiselect'];
                                  if ($multiselect == 1) {
                                    $s_m = "data-trigger multiple";
                                  }



                                ?>
                                  <div class="col-md-3 <?php echo strtolower($vvl['label_name']); ?>">

                                    <div class="form-group row">

                                      <label class="col-sm-12 col-form-label"><?php echo $label_name; ?> <?php echo $span; ?><i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                                      <div class="col-sm-12">
                                        <select <?php echo $s_m; ?> data-section="<?php echo $kk; ?>" class="form-control checkallbox <?php echo $str_name; ?>" name="<?php echo $str_name; ?>" <?php echo $rrs; ?> id="<?php echo $str_name; ?>" ng-model="<?php echo $str_name; ?>">

                                          <option value="">Select</option>
                                          <?php
                                          for ($i = 0; $i < count($option); $i++) {

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

                                } else {

                                  $tpebase = $vvl['type'];

                                  if ($tpebase == 'Date') {
                                    $vv = 'date';
                                  } else {
                                    $vv = 'text';
                                  }


                                  if ($approved_status > 0) {
                                    $box_hide = "";
                                  } else {
                                    $box_hide = $vvl['box_hide'];
                                  }

                                  if ($label_name == 'F NAME') {
                                    $label_name = 'NAME';
                                  }
                                ?>

                                  <div class="col-md-3 <?php echo $box_hide; ?> <?php echo $str_name; ?>">


                                    <div class="form-group row">

                                      <label class="col-sm-12 col-form-label"><?php echo $label_name; ?> <?php echo $span; ?><i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                                      <div class="col-sm-12">


                                        <input type="<?php echo $vv; ?>" data-section="<?php echo $kk; ?>" class="form-control checkallbox <?php echo $str_name; ?>" name="<?php echo $str_name; ?>" <?php echo $rrs; ?> id="<?php echo $str_name; ?>" ng-model="<?php echo $str_name; ?>">

                                      </div>

                                    </div>



                                  </div>

                                <?php
                                        if($str_name=='pan_no')
                                         {
                                            ?>

                                             <div class="col-md-3 pan_image"  >
                                              
                                              
                                                   <div class="form-group row">
                                                     
                                                         <label class="col-sm-12 col-form-label">Pan Image <a href="<?php echo base_url(); ?>{{pan_image}}" ng-if="pan_image" target="_blank">Pan Link</a></label>
                                                         <div class="col-sm-12">
                                                           
                                                           
                                                           <input type="file"  class="form-control" multiple file-input="files"  >

                                                           
                                                         </div>
                                                      
                                                   </div>
                                                
                                                
                                                
                                            </div>

                                            <?php
                                         }
                                }
                              }

                              if ($key == 'CUSTOMER ADDITIONAL DETAILS') {
                                ?>

                                <h4><br>EMERGENCY CONTACT DETAILS</h4>
                                <div class="card table-editable-info h-auto">
                                  <div class="card-body p-0">
                                    <div class="table-rep-plugin">
                                      <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table">
                                          <thead>
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

                                            <?php
                                            $i = 1;
                                            if (count($customer_emergency_details) > 0) {


                                              foreach ($customer_emergency_details as  $value) {
                                                # code...

                                            ?>
                                                <tr>

                                                  <th><?php echo $i; ?></th>
                                                  <td><input type="text" class="e_name" value="<?php echo $value->name; ?>"></td>
                                                  <td><input type="text" class="e_title" value="<?php echo $value->title; ?>"></td>
                                                  <td><input type="text" class="e_address" value="<?php echo $value->address; ?>"></td>
                                                  <td><input type="text" class="e_phone" value="<?php echo $value->phone; ?>"></td>
                                                  <td>
                                                    <i class="mdi mdi-plus-circle font-size-18 right-bar-toggle" style="cursor: pointer;" onclick="return add_rowprice();"></i>
                                                    <i class="mdi mdi-delete font-size-18 right-bar-toggle" style="cursor: pointer;" onclick="return remove();"></i>
                                                  </td>
                                                </tr>

                                              <?php
                                                $i++;
                                              }
                                            } else {
                                              ?>

                                              <tr>

                                                <th>1</th>
                                                <td><input type="text" class="e_name"></td>
                                                <td><input type="text" class="e_title"></td>
                                                <td><input type="text" class="e_address"></td>
                                                <td><input type="text" class="e_phone"></td>
                                                <td>
                                                  <i class="mdi mdi-plus-circle font-size-18 right-bar-toggle" style="cursor: pointer;" onclick="return add_rowprice();"></i>
                                                </td>
                                              </tr>

                                            <?php
                                            }

                                            ?>


                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              <?php
                              }

                              if ($key == 'E-WAY BILLING DETAILS') {
                              ?>
                                <div class="col-md-3 d-flex align-items-center justify-content-start">
                                  <div class="btn btn-primary addresses-box" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 100px;height: 35px;align-self: end;">Addresses</div>
                                </div>


                              <?php
                              }

                              if ($key == 'FAMILY DETAILS') {
                              ?>

                                <h4>GREETINGS</h4>
                                <div class="card table-editable-info h-auto">
                                  <div class="card-body p-0">
                                    <div class="table-rep-plugin">
                                      <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table">
                                          <thead>
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
                                            <?php
                                            if (count($customer_greetings_details) > 0) {

                                              $i = 1;
                                              foreach ($customer_greetings_details as  $value) {
                                                # code...

                                            ?>
                                                <tr>
                                                  <th><?php echo $i; ?></th>
                                                  <td>
                                                    <select class="select relationship">
                                                      <option value="<?php echo $value->relationship; ?>"><?php echo $value->relationship; ?></option>
                                                      <option value="CHILD">CHILD</option>
                                                      <option value="WIFE">WIFE</option>
                                                      <option value="PARENTS">PARENTS</option>
                                                      <option value="FRIEND">FRIEND</option>

                                                    </select>

                                                  </td>
                                                  <td>

                                                    <select class="select greetings_for">
                                                      <option value="<?php echo $value->greetings_for; ?>"><?php echo $value->greetings_for; ?></option>
                                                      <option value="BIRTHDAY">BIRTHDAY</option>
                                                      <option value="WEDDING DAY">WEDDING DAY</option>

                                                    </select>

                                                  </td>
                                                  <td><input type="text" class="g_name" value="<?php echo $value->g_name; ?>"></td>
                                                  <td><input type="date" class="date g_date" value="<?php echo $value->g_date; ?>"></td>
                                                  <td>


                                                    <select class="select gender">
                                                      <option value="<?php echo $value->gender; ?>"><?php echo $value->gender; ?></option>
                                                      <option value="MALE">MALE</option>
                                                      <option value="FEMALE">FEMALE</option>

                                                    </select>
                                                  </td>
                                                  <td><input type="text" class="age" value="<?php echo $value->age; ?>"></td>
                                                  <td><input type="text" class="blood_group" value="<?php echo $value->blood_group; ?>"></td>
                                                  <td>

                                                    <select class="select religion">
                                                      <option value="<?php echo $value->religion; ?>"><?php echo $value->religion; ?></option>
                                                      <option value="HINDHU">HINDHU</option>
                                                      <option value="MUSLIM">MUSLIM</option>
                                                      <option value="CHRISTIAN">CHRISTIAN</option>
                                                    </select>




                                                  </td>
                                                  <td><input type="text" value="<?php echo $value->other_details; ?>" class="other_details"></td>

                                                  <td>
                                                    <i class="mdi mdi-plus-circle font-size-18 right-bar-toggle" style="cursor: pointer;" onclick="return add_rowprice1();"></i>
                                                    <i class="mdi mdi-delete font-size-18 right-bar-toggle" style="cursor: pointer;" onclick="return remove1();"></i>
                                                  </td>
                                                </tr>




                                              <?php
                                                $i++;
                                              }
                                            } else {
                                              ?>


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
                                                <td><input type="text" ng-model="g_name" class="g_name"></td>
                                                <td><input type="date" ng-model="g_date" class="date g_date"></td>
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


                                            <?php
                                            }

                                            ?>






                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>



                              <?php
                              }

                              if ($key != 'CUSTOMER DETAILS') {

                                echo '</div></div>';
                              }
                              if ($key == 'CUSTOMER DETAILS') {

                              ?>

                                <div class="col-md-3">
                                  <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Sales Group <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                                    <div class="col-sm-12">
                                      <select class="form-control checkallbox" name="sales_group" id="sales_group" data-section="29" ng-model="sales_group">

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
                                    <label class="col-sm-12 col-form-label">Sales Team <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                                    <div class="col-sm-12">
                                      <select class="form-control checkallbox" name="sales_team_id" data-section="29" ng-model="sales_team_id" id="sales_team_id">

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
                                    <label class="col-sm-12 col-form-label">Sales Sub Team <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                                    <div class="col-sm-12">
                                      <select class="form-control checkallbox" name="sales_team_sub_id" id="sales_team_sub_id" data-section="29" ng-model="sales_team_sub_id">

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
<span ng-click="editop()" style="color:red;cursor: pointer;">Edit</span>
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

                                      <select class="form-control checkallbox"  <?php echo $disabled_last; ?> data-section="20" name="cnn_payment_status" id="cnn_payment_status" ng-model="cnn_payment_status" style="width: 40%">

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

                                <label class="col-sm-12 col-form-label">Sub Group <span style="color:red;">*</span><i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                                <div class="col-sm-12">
                                  <select class="form-control1" name="account_heads_id" ng-model="account_heads_id">

                                    <?php
                                    foreach ($accounttype as $val) {

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
                                          <input type="checkbox" class="form-check-input d-none" ng-model="feedback1" id="membershipRadios1" value="Price" checked> Price </label>
                                        <div class="col-sm-8">

                                          <div class="star-rating">


                                            <span class="fa fa-star" data-rating="1" data-value="feedback1"></span>
                                            <span class="fa fa-star" data-rating="2" data-value="feedback1"></span>
                                            <span class="fa fa-star" data-rating="3" data-value="feedback1"></span>
                                            <span class="fa fa-star" data-rating="4" data-value="feedback1"></span>
                                            <span class="fa fa-star" data-rating="5" data-value="feedback1"></span>
                                            <input type="hidden" id="feedback1" data-section="30" class="rating-value form-control checkallbox" value="0">
                                          </div>

                                        </div>


                                      </div>
                                    </div>
                                    <div class="col-sm-3">
                                      <div class="form-check">
                                        <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input d-none" ng-model="feedback2" id="membershipRadios2" value="Delivery Time"> Delivery Time </label>
                                        <div class="col-sm-8">
                                          <div class="star-rating">
                                            <span class="fa fa-star" data-rating="1" data-value="feedback2"></span>
                                            <span class="fa fa-star" data-rating="2" data-value="feedback2"></span>
                                            <span class="fa fa-star" data-rating="3" data-value="feedback2"></span>
                                            <span class="fa fa-star" data-rating="4" data-value="feedback2"></span>
                                            <span class="fa fa-star" data-rating="5" data-value="feedback2"></span>
                                            <input type="hidden" id="feedback2" data-section="30" class="rating-value form-control checkallbox" value="0">
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                    <div class="col-sm-2">
                                      <div class="form-check">
                                        <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input d-none" ng-model="feedback3" id="membershipRadios3" value="quality"> Quality </label>
                                        <div class="col-sm-8">
                                          <div class="star-rating">
                                            <span class="fa fa-star" data-rating="1" data-value="feedback3"></span>
                                            <span class="fa fa-star" data-rating="2" data-value="feedback3"></span>
                                            <span class="fa fa-star" data-rating="3" data-value="feedback3"></span>
                                            <span class="fa fa-star" data-rating="4" data-value="feedback3"></span>
                                            <span class="fa fa-star" data-rating="5" data-value="feedback3"></span>
                                            <input type="hidden" id="feedback3" data-section="30" class="rating-value form-control checkallbox" value="0">
                                          </div>
                                        </div>

                                      </div>
                                    </div>


                                    <div class="col-sm-2">
                                      <div class="form-check">
                                        <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input d-none" ng-model="feedback4" id="membershipRadios3" value="quality"> Response </label>
                                        <div class="col-sm-8">
                                          <div class="star-rating">
                                            <span class="fa fa-star" data-rating="1" data-value="feedback4"></span>
                                            <span class="fa fa-star" data-rating="2" data-value="feedback4"></span>
                                            <span class="fa fa-star" data-rating="3" data-value="feedback4"></span>
                                            <span class="fa fa-star" data-rating="4" data-value="feedback4"></span>
                                            <span class="fa fa-star" data-rating="5" data-value="feedback4"></span>
                                            <input type="hidden" id="feedback4" data-section="30" class="rating-value form-control checkallbox" value="0">
                                          </div>
                                        </div>
                                      </div>
                                    </div>


                                    <div class="col-sm-2">
                                      <div class="form-check">
                                        <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input d-none" ng-model="feedback5" id="membershipRadios3" value="quality"> Commission </label>
                                        <div class="col-sm-8">
                                          <div class="star-rating">
                                            <span class="fa fa-star" data-rating="1" data-value="feedback5"></span>
                                            <span class="fa fa-star" data-rating="2" data-value="feedback5"></span>
                                            <span class="fa fa-star" data-rating="3" data-value="feedback5"></span>
                                            <span class="fa fa-star" data-rating="4" data-value="feedback5"></span>
                                            <span class="fa fa-star" data-rating="5" data-value="feedback5"></span>
                                            <input type="hidden" id="feedback5" data-section="30" class="rating-value form-control checkallbox" value="0">
                                          </div>
                                        </div>
                                      </div>
                                    </div>



                                    <div class="col-sm-2">
                                      <div class="form-check">
                                        <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input d-none" ng-model="feedback5" id="membershipRadios3" value="quality"> Customer Rating </label>
                                        <div class="col-sm-8">
                                          <div class="star-rating">
                                            <span class="fa fa-star" data-rating="1" data-value="ratings"></span>
                                            <span class="fa fa-star" data-rating="2" data-value="ratings"></span>
                                            <span class="fa fa-star" data-rating="3" data-value="ratings"></span>
                                            <span class="fa fa-star" data-rating="4" data-value="ratings"></span>
                                            <span class="fa fa-star" data-rating="5" data-value="ratings"></span>
                                            <input type="hidden" id="ratings" data-section="31" class="rating-value form-control checkallbox" value="0">
                                          </div>
                                        </div>
                                      </div>
                                    </div>



                                  </div>
                                </div>




                                <div class="col-md-12">
                                  <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">FeedBack<i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                                    <div class="col-sm-12">
                                      <textarea class="form-control checkallbox" rows="6" data-section="30" ng-model="feedback_details" name="feedback_details"></textarea>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-12" style="margin-top: 5px; margin-bottom: 3px;">
                                  <div class="form-group row">
                                    <label class="col-sm-12 col-form-label" style="font-weight: 800; font-size: 15px;">Inter Link<i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                                    <div class="col-sm-12">
                                      <?php
                                      $customer_links = array(); // Create an array to store the links
                                      $count = 0; // Initialize a count variable

                                      foreach ($customer_link as $val) {
                                        $link = ($this->session->userdata['logged_in']['access'] == '11' ||
                                          $this->session->userdata['logged_in']['access'] == '12' ||
                                          $this->session->userdata['logged_in']['access'] == '15')
                                          ? base_url() . 'index.php/customer/customer_edit/' . $val['id']
                                          : base_url() . 'index.php/customer/customer_edit/' . $val['id'] . '?viewState=false';

                                        // Add each value as a <td> element
                                        $customer_links[] = '<td style="padding: 5px 15px 5px 15px;
                                                background-color: #f1f1f1;"><a href="' . $link . '" target="_blank" style="color: #495057;">' . $val['name'] . '</a></td>';

                                        $count++;

                                        // Check if 8 records have been added
                                        if ($count % 9 == 0) {
                                          // Close the current row and start a new row
                                          $customer_links[] = '</tr><tr>';
                                        }
                                      }

                                      // Wrap the <td> elements in a <table> element
                                      echo '<table><tr>' . implode('', $customer_links) . '</tr></table>';
                                      ?>
                                    </div>


                                  </div>
                                </div>



                              </div>

                            </div>





                            <div class="row">
                              <?php
                              $usergroup = array(1, 15);
                              if (in_array($this->session->userdata['logged_in']['access'], $usergroup)) {
                              ?>

                                <div class="col-10">


                                  <input placeholder="Type Reason here " class="form-control-custom reason-box m-1 w-50 approvalsOLD">
                                  <p class="text-danger mx-2 reasonValidate">
                                    Please provide a valid Reason.
                                  </p>

                                </div>

                                <div class="col text-center">
                                  <!-- <div class="btn btn-success approvals" data-selection="1" ng-click="changepaystatusdd_1('<?= $id ?>','2')">Approve</div> -->
                                  <!-- <div class="btn btn-danger approvals" data-selection="0" ng-click="changepaystatusdd_1('<?= $id ?>','-1')">Reject</div>
                                <input placeholder="Type Reason here" class="form-control-custom reason-box m-1" style="display:none;"> -->
                                </div>

                              <?php
                              }
                              ?>




                            </div>

                            <div class="row col-md-12 mt-4">

                              <div class="col-md-6">
                                <?php
                                $usergroup = array(1, 15);
                                if (in_array($this->session->userdata['logged_in']['access'], $usergroup)) {
                                ?>

                                  <div class="btn btn-danger approvals approvalsOLD" data-selection="0" ng-click="changepaystatusdd_1('<?= $id ?>','-1')">Reject</div>
                                <?php
                                }
                                if (in_array($this->session->userdata['logged_in']['access'], $usergroup)) {
                                ?>

                                  <div data-id="{{  cus_id  }}" ng-click="setStatus(cus_id, $event )" title=" {{archive_status == 'Archived' ? 'Retrive' : 'Archive'  }}" data-status=" {{archive_status == 'Archived' ? 1 : 0 }}" class="archive_button btn {{archive_status == 'Archived' ? 'btn-outline-success' : 'btn-outline-danger' }} ">{{archive_status == 'Archived' ? 'Retrive' : 'Archive' }}</div>

                                <?php } ?>
                                
                              </div>


                              <div class="col-md-6">


                                <div class="form-group flaot-end text-end">







                                  <?php
                                  // Shop Team
                                  $usergroup = array(1, 15);
                                  if (in_array($this->session->userdata['logged_in']['access'], $usergroup)) {

                                  ?>


                                    <label class="form-check-label" for="stop_billing">
                                      <span ng-if="stop_billing=='YES'">

                                        <input type="checkbox" class="form-check-input" checked name="stop_billing" id="stop_billing" value="YES"> STOP BILLING

                                      </span>

                                      <span style="font-size:large;" ng-if="stop_billing!='YES'">

                                        <input type="checkbox" class="form-check-input" id="stop_billing" name="stop_billing" value="YES"> STOP BILLING

                                      </span>

                                      <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>


                                  <?php


                                  }


                                  ?>






                                  <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                                  <input type="hidden" name="mark_vendor_id" id="mark_vendor_id" value="0" />

                                  <!-- <div class="btn btn-success approvals" data-selection="1" ng-click="changepaystatusdd_1('<?= $id ?>','2')" type="submit">Approve</div> -->
                                  <?php
                                  $usergroup = array(1, 15);
                                  if (in_array($this->session->userdata['logged_in']['access'], $usergroup)) {
                                  ?>
                                    <input class="btn btn-success approvals approvalsOLD" data-selection="1" ng-click="changepaystatusdd_1('<?= $id ?>','2')" type="submit" value="{{submit_button == 'Update' ? 'Approve' : 'Update' }}">

                                  <?php


                                  } else {
                                  ?>
                                    <input class="btn btn-success approvals approvalsOLD " data-selection="1" ng-click="changepaystatusdd_1('<?= $id ?>','1')" type="submit" value="Update">

                                  <?php
                                  }


                                  ?>
                                    <input class="btn btn-success approvalsNew" data-selection="1" type="submit" value="Update">

                                  <!--<input style="font-size: large;" class="btn btn-secondary font-bold w-lg btn-rounded waves-effect waves-light d-none" type="submit" value="{{submit_button}}"> -->

                                </div>
                              </div>
                            </div>


<br><h3>.Exe install details</h3>


 <table class="table">
             

             <tr>
              
               <th>Divice Name</th>
               <th>Version</th>
               <th>City</th>
               <th>Time</th>
               
             </tr>
              <tr>
              
               <td>{{deviceName}}</td>
               <th>{{deviceversion}}</td>
               <th>{{devicecity}}</td>
               <th>{{installationTime}}</td>
                
               
             </tr>
           <?php
   
           foreach ($customer_exe_update_version as  $values) 
           {
             ?>

              <tr>
              
               <td><?php echo $values->deviceName; ?></td>
               <th><?php echo $values->version; ?></td>
               <th><?php echo $values->city; ?></td>
               <th><?php echo $values->installationTime; ?></td>

               
             </tr>


             <?php
            
           }

           ?>
               

          </table>



<br><h3>ADDRESS</h3>
                               <table class="table">
             

             <tr>
               <th>No</th>
               <th>Address</th>
               <th>Locality</th>
               <th>Lat,Log</th>
               <th>Create Date</th>
               <th>Created BY</th>
             </tr>

           <?php
           $i=1;
           foreach ($customer_location_save as  $value) {
             ?>

              <tr>
               <td><?php echo $i; ?></td>
               <td><?php echo $value->map_address; ?></td>
               <th><?php echo $value->locality_map; ?></td>
               <td><?php echo $value->latitude; ?>, <?php echo $value->longtitude; ?></td>
               <td><?php echo date('d-m-Y',strtotime($value->create_date)); ?></td>
               <td><?php

                 $username="";
                 foreach ($admin_users as $key) {
                  if($key->id==$value->user_id)
                  {
                      $username=$key->username;
                  }
                 }



                echo $username; ?></td>
             </tr>


             <?php
             $i++;
           }

           ?>
               

          </table>

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
                  <label class="col-sm-5 col-form-label">Lable name <small style="color:red;">(No Space OR Use Space to _ )</small><i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                  <div class="col-sm-7">
                    <input id="name" class="form-control1" required ng-model="label_name" placeholder="name_value" name="label_name" type="text">

                  </div>
                </div>
              </div>


              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-5 col-form-label">Type<i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                  <div class="col-sm-7">

                    <select class="form-control1 typeset" required ng-model="typebase">
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
                  <label class="col-sm-5 col-form-label">Maulti Option <small>Input value with (,)</small><i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                  <div class="col-sm-7">
                    <input id="name" class="form-control1" ng-model="option" name="option" type="text">

                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-5 col-form-label">Grouping<i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></label>
                  <div class="col-sm-7">

                    <select class="form-control1" required ng-model="grouping">

                      <?php
                      foreach ($grouping as $val) {
                        if ($val->id == 3) {


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



<input type="hidden" id="op_status" value="0" />
<input type="hidden" id="cnn_op_status" value="0" />

  <script>
    $(document).ready(function() {
      // Handle button click event
      $(".btn-closed").click(function() {
        var buttonText = $(this).html();

        // Check the current button text
        if (buttonText === "Expand All") {
          // Expand all collapsed items
          $(".collapse:not(.show)").collapse('show');
          $(this).html("Collapse All");
        } else {
          // Collapse all items
          $(".collapse.show").collapse('hide');
          $(this).html("Expand All");
        }
      });


      setTimeout(() => {
        $('input.checkallbox,select.checkallbox').trigger('input');
      }, 2000)





      $('div.approvals').on('click', () => {
        console.log("enter", $(this).attr('data-selection'))

      })
    });

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    var count_value_dyeing = 1;
    var count_value_dyeing1 = 1;


    function add_rowprice() {


      $('#updaterecord').show();

      var all = count_value_dyeing++;

      var data = '<tr > <th>' + count_value_dyeing + '</th> <td><input type="text" ng-model="e_name" class="e_name" ></td> <td><input type="text" ng-model="e_title" class="e_title"></td> <td><input type="text" ng-model="e_address" class="e_address"></td> <td><input type="text" ng-model="e_phone" class="e_phone"></td> <td> <i class="mdi mdi-plus-circle font-size-18 right-bar-toggle" style="cursor: pointer;" onclick="return add_rowprice();"></i><i class="mdi mdi-delete font-size-18 right-bar-toggle" style="cursor: pointer;" onclick="return remove();"></i> </td> </tr>';

      $('#updaterecord').append(data);

    }

    function remove() {

      $('#updaterecord tr:last').remove();

    }



    function add_rowprice1() {


      $('#updaterecord1').show();

      var all = count_value_dyeing1++;

      var data = '<tr> <th>' + count_value_dyeing1 + '</th>  <td> <select ng-model="relationship" class="select relationship"> <option value="">SELECT</option> <option value="CHILD">CHILD</option> <option value="WIFE">WIFE</option> <option value="PARENTS">PARENTS</option> <option value="FRIEND">FRIEND</option> </select> </td> <td> <select ng-model="greetings_for" class="select greetings_for"> <option value="">SELECT</option> <option value="BIRTHDAY">BIRTHDAY</option> <option value="WEDDING DAY">WEDDING DAY</option> </select> </td> <td><input type="text" ng-model="g_name" class="g_name"></td> <td><input type="date" ng-model="g_date" class="date g_date" ></td> <td> <select ng-model="gender" class="select gender"> <option value="">SELECT</option> <option value="MALE">MALE</option> <option value="FEMALE">FEMALE</option> </select> </td> <td><input type="text" class="age" ng-model="age" ></td> <td><input type="text" ng-model="blood_group" class="blood_group"></td> <td> <select ng-model="religion" class="select religion"> <option value="">SELECT</option> <option value="HINDHU">HINDHU</option> <option value="MUSLIM">MUSLIM</option> <option value="CHRISTIAN">CHRISTIAN</option> </select> </td> <td><input type="text" ng-model="other_details" class="other_details"></td> <td> <i class="mdi mdi-plus-circle font-size-18 right-bar-toggle" style="cursor: pointer;" onclick="return add_rowprice1();"></i><i class="mdi mdi-delete font-size-18 right-bar-toggle" style="cursor: pointer;" onclick="return remove1();"></i></td> </tr>';

      $('#updaterecord1').append(data);

    }

    function remove1() {

      $('#updaterecord1 tr:last').remove();

    }

    // Function to update the progress circle and text based on completed input fields
    function updateProgress(sectionId) {
      const accordion = $(`#section${sectionId}`);
      const sectionName = $('#section' + sectionId).next();
      const progressCircleFill = accordion.find('.progress-circle-fill[data-progress]');
      const progressCircleText = accordion.find('.progress-circle-text');
      // let oldNumber =   progressCircleFill.attr('data-progress');
      let oldText = progressCircleText.text();
      let fields = $(sectionName).find(`.col-md-3:not(.d-none) input.checkallbox:not(:hidden) ,  .col-md-3:not(.d-none) select.checkallbox:not(:hidden) , .star-rating input`);
      let fieldsNotFilled = fields.filter(function() {
        var value = $(this).val();
        // console.log("val", value)
        return value != "" && value != 0;
      });
      // console.log("fielsssssssssssds", fieldsNotFilled.length , fields.length)



      //       const totalInputsInSection = $('.checkallbox[data-section="' + sectionId + '"]').length;
      var getsetion = $('.checkallbox[data-section="' + sectionId + '"]').val();
      // 
      // 
      //       const completedInputsInSection = $('.checkallbox[data-section="' + sectionId + '"]').filter(function() {
      //         return $(this).val() != '';
      //       }).length;



      var progressPercentage = ((fieldsNotFilled.length / fields.length) * 100).toFixed();


      // console.log("e", '#section' + sectionId)


      //const progressPercentage = (completedInputsInSection / totalInputsInSection) * 100;
      // Update the data-progress attribute and text with the rounded progressPercentage value
      progressCircleFill.attr('data-progress', Number(progressPercentage));
      progressCircleText.text(Number(progressPercentage) + '%');

      // Update overall progress
      updateOverallProgress();
    }

    // Function to calculate and update overall progress
    function updateOverallProgress() {
      const allInputFields = $(document).find(`.col-md-3:not(.d-none):not(:hidden) input.checkallbox:not(:hidden),  .col-md-3:not(.d-none):not(:hidden) select.checkallbox:not(:hidden) `);
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

    $('.checkallbox,.star-rating,.rating-value').on('change input click mouseenter', function() {
      var inputValue = $(this).val();
      var uppercaseValue = inputValue.toUpperCase();
      $(this).val(uppercaseValue);
      const sectionId = $(this).data('section');
      updateProgress(sectionId);
    });




    $('.star-rating').on('click mousemove', () => {
      // setTimeout(()=> {
      let price_rateings = $('#feedback1').val();
      let delivery_time_rateings = $('#feedback2').val();
      let quality_rateings = $('#feedback3').val();
      let response_commission = $('#feedback4').val();
      let commission_feed_back = $('#feedback5').val();
      let totals = Number(price_rateings) + Number(delivery_time_rateings) + Number(quality_rateings) + Number(response_commission) + Number(commission_feed_back);
      // console.log("=========",totals / 5)

      let perc = Math.ceil(totals / 5);
      $('#ratings').val(perc);
      // $('#ratings').val(perc);
      // },200)

    })
  </script>


  <script type="text/javascript">
    $(document).ready(function() {





 document.getElementById("needs-validation").addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault(); // Prevent the default behavior
                return false;
            }
        });




      $(".typeset").click(function() {

        var a = $(this).val();

        if (a == 'Multiple Options') {
          $('#optionset').show();

        } else {
          $('#optionset').hide();
        }


      });


      $("#gst_status").on('change', function() {

        var a = $(this).val();

        if (a == '1') {
          $('#gst_view').show();

        } else {
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






   
     
      $("#credit").on('change', function() {

        var a = $(this).val();

        if (a == 'YES') {
          $('.credit_limit').show();
          $('.credit_period').show();
          $('.credit_bill_by_bill').show();

        } else {
          $('.credit_limit').hide();
          $('.credit_period').hide();
          $('.credit_bill_by_bill').hide();
        }


      });



      $('.form-control').on('input', function() {
        var inputValue = $(this).val();
        if (inputValue && inputValue) {
          if (isNaN(inputValue)) {
            var uppercaseValue = inputValue.toUpperCase();

            $(this).val(uppercaseValue);
          }
        }

      });

      $("#gst").change(function() {
        var inputvalues = $(this).val();
        var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}');
        if (gstinformat.test(inputvalues)) {
          return true;
        } else {
          alert('Please Enter Valid GSTIN Number');
          //$("#gst").val('');    
          //$("#gst").focus();    
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
    app.controller('crudController', function($scope, $http) {

      $scope.success = false;
      $scope.error = false;


      $scope.account_heads_id = 104;
      $scope.submit_button = 'Update';

      $scope.grouping = 3;
      $scope.gst_status = 1;
      $scope.sales_group = 0;


      $scope.touched = false;




      $("#state").on('change', function() {


        var value = $(this).val();

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



        var arrval = ["TAMILNADU"];
        var value = $(this).val();
        var sst = 0;

        if (jQuery.inArray(value, arrval) !== -1) {


          $scope.gst_class = 'CGST_AND_SGST';
          $("#gst_class").prop('disabled', true);

          var sst = 1;

        }


        var arrval2 = ["ANDAMAN AND NICOBAR ISLANDS", "CHANDIGARH", "DADRA AND NAGAR HAVELI AND DAMAN AND DIU", "DELHI", "JAMMU AND KASHMIR", "LADAKH", "LAKSHADWEEP", "PUDUCHERRY"];


        if (jQuery.inArray(value, arrval2) !== -1) {


          $scope.gst_class = 'UTGST';
          $("#gst_class").prop('disabled', true);

          var sst = 1;

        }


        if (sst == 0) {


          $scope.gst_class = 'IGST';
          $("#gst_class").prop('disabled', true);



        }







        $scope.tax_percentage = '18%';






      });

      $("#district").on('change', function() {


        var value = $(this).val();



        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/customer/city_find_data",
          data: {
            'tablename': 'city',
            'value': value
          }
        }).success(function(data) {

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




      $("#customer_type").on('change', function() {


        var arrval = ["FABRICATOR", " FABRICATOR(LARGESCALE)", "ENGINEERS", "CONTRACTOR", "SHOP", "TRADERS", "CONSTRUCTION,SOLAR CONTRACTORS", "PROFILERS", "PEB MANUFACTURERS", "WAREHOUSE", "HARDWARES", "BUILDING MATERIAL SUPPLIER"];
        var value = $(this).val();

        if (jQuery.inArray(value, arrval) !== -1) {


          $("#regular").prop('disabled', true);



          $scope.regular = 'YES';



        } else {

          $scope.regular = 'NO';
          $("#regular").prop('disabled', false);

        }


      });


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
      $scope.getpencodeDetails = function(event) {







        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/customer/pincode",
          data: {
            'pincode': $scope.pincode
          }
        }).success(function(data) {

          //$scope.city = data.city;
          //$scope.state =  data.state;
          //$scope.zone =  data.locality;

        });





      }


      $scope.submitFormmaster = function() {
        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/additional_information/insertandupdate",
          data: {
            'label_name': $scope.label_name,
            'account_heads_id': $scope.account_heads_id,
            'type': $scope.typebase,
            'option': $scope.option,
            'grouping': $scope.grouping,
            'id': 1,
            'action': 'Add',
            'tablename': 'additional_information'
          }
        }).success(function(data) {

          if (data.error != '1') {


            alert('Created..');
            location.reload();

          }



        });
      };

      $scope.Getroute = function() {


        var localitybase = $('#localitybase').val();


        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/customer/fetch_route",
          data: {
            'id': localitybase
          }
        }).success(function(data) {



          $scope.route_name = data.route_name;



        });




      };

      $scope.changepaystatusdd_1 = function(id, bb) {
        $scope.approved_status = bb;
        if (bb == '-1') {
          let value = $('.reason-box').val();

          if (value !== '') {
            $('.reasonValidate').hide();
            $scope.submitForm();
          } else {
            $('.reasonValidate').show();
          }
        }
      }
      // $scope.approved_status = 2;
      $scope.submitForm = function() {




 var form_data = new FormData();
                                      angular.forEach($scope.files, function(file) {
                                        form_data.append('file[]', file);
                                      });
                                      $http.post('<?php echo base_url() ?>index.php/customer/fileuplaodimgsave?id=' + $scope.hidden_id, form_data, {
                                        transformRequest: angular.identity,
                                        headers: {
                                          'Content-Type': undefined,
                                          'Process-Data': false
                                        }
                                      }).success(function(response) {


        });







        if($('#pincode').val() == '' || isNaN($('#gst_status').val())){
      if(isNaN($('#gst_status').val())){
        $('.error-message-gst-status').css('color','#ef6767').show()
        $('select#gst_status').addClass('customer-error');

      }else{
        $('.error-message-gst-status').css('color','#ef6767').hide()
        $('select#gst_status').removeClass('customer-error');

      }

      // console.log(" $('#gst').val()", $('#gst').val())
      if($('#gst_status').val() == 1){
        if( $('#gst').value == null){
          $('input#gst').addClass('customer-error');
          $('.error-message').css('color','#ef6767').show();
          // $('.error-message-gst-status').css('color','#ef6767').show()
        alert('Please Fill GST Number');
        // return;
        }else{
          $('input#gst').removeClass('customer-error');
          $('.error-message').hide();
          $('.error-message-gst-status').hide();

        }
        return;

      } 
      if($('#pincode').val() == ''){
        alert('Please Fill All required fields');
        return;
      }

      return;
          } 


        var mark_vendor_id = $('#mark_vendor_id').val();

        var price_rateings = $('#feedback1').val();
        var delivery_time_rateings = $('#feedback2').val();
        var quality_rateings = $('#feedback3').val();
        var response_commission = $('#feedback4').val();
        var commission_feed_back = $('#feedback5').val();
        var gst_status = $('#gst_status').val();

        var ratings = $('#ratings').val();
        var active = $('input[name="optradio"]:checked').val();
        var e_name = $(".e_name");
        var e_name_value = [];
        for (var i = 0; i < e_name.length; i++) {

          e_name_value.push($(e_name[i]).val());

        }
        var e_name = e_name_value.join("|");


        var e_title = $(".e_title");
        var e_title_value = [];
        for (var i = 0; i < e_title.length; i++) {

          e_title_value.push($(e_title[i]).val());

        }
        var e_title = e_title_value.join("|");


        var e_address = $(".e_address");
        var e_address_value = [];
        for (var i = 0; i < e_address.length; i++) {

          e_address_value.push($(e_address[i]).val());

        }
        var e_address = e_address_value.join("|");



        var e_phone = $(".e_phone");
        var e_phone_value = [];
        for (var i = 0; i < e_phone.length; i++) {

          e_phone_value.push($(e_phone[i]).val());

        }
        var e_phone = e_phone_value.join("|");
        var relationship = $(".relationship");
        var relationship_value = [];
        for (var i = 0; i < relationship.length; i++) {

          relationship_value.push($(relationship[i]).val());

        }
        var relationship = relationship_value.join("|");



        var greetings_for = $(".greetings_for");
        var greetings_for_value = [];
        for (var i = 0; i < greetings_for.length; i++) {

          greetings_for_value.push($(greetings_for[i]).val());

        }
        var greetings_for = greetings_for_value.join("|");



        var g_name = $(".g_name");
        var g_name_value = [];
        for (var i = 0; i < g_name.length; i++) {

          g_name_value.push($(g_name[i]).val());

        }
        var g_name = g_name_value.join("|");


        var g_date = $(".g_date");
        var g_date_value = [];
        for (var i = 0; i < g_date.length; i++) {

          g_date_value.push($(g_date[i]).val());

        }
        var g_date = g_date_value.join("|");


        var gender = $(".gender");
        var gender_value = [];
        for (var i = 0; i < gender.length; i++) {

          gender_value.push($(gender[i]).val());

        }
        var gender = gender_value.join("|");


        var age = $(".age");
        var age_value = [];
        for (var i = 0; i < age.length; i++) {

          age_value.push($(age[i]).val());

        }
        var age = age_value.join("|");


        var blood_group = $(".blood_group");
        var blood_group_value = [];
        for (var i = 0; i < blood_group.length; i++) {

          blood_group_value.push($(blood_group[i]).val());

        }
        var blood_group = blood_group_value.join("|");



        var religion = $(".religion");
        var religion_value = [];
        for (var i = 0; i < religion.length; i++) {

          religion_value.push($(religion[i]).val());

        }
        var religion = religion_value.join("|");


        var other_details = $(".other_details");
        var other_details_value = [];
        for (var i = 0; i < other_details.length; i++) {

          other_details_value.push($(other_details[i]).val());

        }
        var other_details = other_details_value.join("|");







        var res = 1;


        if ($('#phone').val() == '') {
          var nametatus = "phone";
          var res = 0;

        } else if ($('#company_name').val() == '') {
          var nametatus = "company_name";
          var res = 0;

        }
        else if ($('#pincode').val() == '') {
          var nametatus = "pincode";
          var res = 0;

        } else if ($('#address1').val() == '') {


          var nametatus = "address1";
          var res = 0;

        } else if ($('#localitybase').val() == '') {
          var nametatus = "localitybase";
          var res = 0;

        } else if ($scope.customer_type === undefined) {
          var nametatus = "customer_type";
          var res = 0;

        } else {

          if (gst_status == 1) {


            var gst = $('#gst').val();
            if (gst == '') {

              var nametatus = "gst";
              var res = 0;
            }

          }


        }

        var stop_billing = $('input[name="stop_billing"]:checked').val();

        if (res == 1) {

        
            var op_status = $('#op_status').val();
            var cnn_op_status = $('#cnn_op_status').val();


          $http({
            method: "POST",
            url: "<?php echo base_url() ?>index.php/customer/insertandupdate",
            data: {
              'status': '1',
              'op_status': op_status,
              'cnn_op_status': cnn_op_status,
              'sales_team_id': $scope.sales_team_id,
              'opening_balance': $scope.opening_balance,
              'opening_balance_status': $scope.opening_balance_status,
              'cnn_opening_balance': $scope.cnn_opening_balance,
              'cnn_payment_status': $scope.cnn_payment_status,
              'stop_billing': stop_billing,
              'sales_team_sub_id': $scope.sales_team_sub_id,
              'e_name': e_name,
              'e_title': e_title,
              'e_address': e_address,
              'e_phone': e_phone,
              'relationship': relationship,
              'greetings_for': greetings_for,
              'g_name': g_name,
              'g_date': g_date,
              'gender': gender,
              'age': age,
              'blood_group': blood_group,
              'religion': religion,
              'other_details': other_details,

              <?php
              foreach ($additional_information as $vl) {
                $label_name = strtolower($vl->label_name);
              ?> '<?php echo $label_name; ?>': $scope.<?php echo $label_name; ?>,
              <?php
              }
              ?> 'google_map_link': $scope.google_map_link,
              'commission_feed_back': commission_feed_back,
              'mark_vendor_id': mark_vendor_id,
              'active': active,
              'gst_status': $scope.gst_status,
              'feedback_details': $scope.feedback_details,
              // 'reject_reason': ,
              'zone': $scope.zone,
              'district': $scope.district,
              'price_rateings': price_rateings,
              'delivery_time_rateings': delivery_time_rateings,
              'quality_rateings': quality_rateings,
              'response_commission': response_commission,
              'ratings': ratings,
              'feedback': $scope.feedback,
              'phone': $scope.phone,
              'city': $scope.city,
              'locality': $scope.locality,
              'state': $scope.state,
              'pincode': $scope.pincode,
              'landmark': $scope.landmark,
              'address1': $scope.address1,
              'address2': $scope.address2,
              'company_name': $scope.company_name,
              'print_name': $scope.print_name,
              'gst': $scope.gst,
              'landline': $scope.landline,
              'email': $scope.email,
              'sales_group': $scope.sales_group,
              'id': $scope.hidden_id,
              'action': $scope.submit_button,
              'tablename': 'customers'
            }
          }).success(function(data) {

            if (data.error != '1') {
              if (data.error == '3') {

                $scope.success = false;
                $scope.error = true;
                $scope.hidden_id = "";
                $scope.errorMessage = data.massage;

              }
              <?php
              $usergroup = array(1, 15);
              if (!(in_array($this->session->userdata['logged_in']['access'], $usergroup))) {

              ?>

                if($scope.approved_status < 2) {
                  $scope.approved_status = 0;
                }
                $http({
                  method: "POST",
                  url: "<?php echo base_url() ?>index.php/customer/insertandupdate",
                  data: {
                    'id': <?= $id ?>,
                    'val': $scope.approved_status,
                    'action': 'updatevalue',
                    'lab': 'approved_status_approve',
                    'tablename': 'customers'
                  }
                }).success(function(data) {
                  $scope.success = false;
                  $scope.error = false;
                })
              <?php
              }
              else 
              {
              ?>

                $http({
                  method: "POST",
                  url: "<?php echo base_url() ?>index.php/customer/insertandupdate",
                  data: {
                    'id': <?= $id ?>,
                    'val': $scope.approved_status,
                    'action': 'updatevalue',
                    'lab': 'approved_status',
                    'tablename': 'customers'
                  }
                }).success(function(data) {
                  $scope.success = false;
                  $scope.error = false;
                })
                if ($scope.approved_status == -1) {
                  $http({
                    method: "POST",
                    url: "<?php echo base_url() ?>index.php/customer/insertandupdate",
                    data: {
                      'id': <?= $id ?>,
                      'val': $('.reason-box').val(),
                      'action': 'updatevalue',
                      'lab': 'reject_reason',
                      'tablename': 'customers'
                    }
                  }).success(function(data) {
                    $scope.success = false;
                    $scope.error = false;

                  })
                }
              <?php
              }
              ?>
              setTimeout(function() {
                alert(data.massage);
                window.close();
              }, 300)








              $http.get('https://erp.zaron.in/customer_balance_cron.php?customer_id=' + $scope.hidden_id).success(function(datass) {});



            }


          });

        } else {

          $('#' + nametatus).css("border-color", "red");
          $('#' + nametatus).trigger("focus");

        }





      };


      $("#company_name").on('input', function() {
        var company_name = $(this).val();
        $scope.print_name = company_name;
      });





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






      

      $scope.Seletvendor = function() {


        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/vendor/fetch_single_data",
          data: {
            'id': $scope.seletvendor,
            'action': 'fetch_single_data',
            'tablename': 'vendor'
          }
        }).success(function(data) {

          $scope.company_name = data.name;

          $scope.email = data.email;
          $scope.phone = data.phone;


          $('#mark_vendor_id').val(data.id);

          $scope.gst = data.gst;
          $scope.approved_status = data.approved_status;
          $scope.address1 = data.address1;
          $scope.address2 = data.address2;
          $scope.landmark = data.landmark;
          $scope.pincode = data.pincode;
          $scope.city = data.city;
          $scope.state = data.state;
          $scope.landline = data.landline;



        });


      };


 $scope.setStatus = function(id, e) {

        let statusVar = $(e.currentTarget).attr('data-status');
        let newStatus = statusVar == 0 ? 1 : 0;
        let deleteid = newStatus == 1 ? -1 : 0;
        console.log(statusVar, newStatus);

        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/customer/insertandupdate",
          data: {
            'id': id,
            'status': newStatus,
            'deleteid': deleteid,
            'action': 'Archive',
            'tablename': 'customers'
          }
        }).success(function(data) {
          $(e.currentTarget).attr('data-status', newStatus);

          if (statusVar == 1) {
            $(e.currentTarget).removeClass('btn-outline-danger');
            $(e.currentTarget).addClass('btn-outline-success');
            massage = "Customer Retrived";
          } else {
            $(e.currentTarget).removeClass('btn-outline-success');
            $(e.currentTarget).addClass('btn-outline-danger');
            massage = "Customer Archived";
          }
          setTimeout(function() {
                alert(massage);
                window.close();
              }, 300)

        })


        }


      $scope.completeLocalty = function() {
        $("#localitybase").autocomplete({
          source: $scope.availableTags
        });

        $http({
          method: "POST",
          url: "<?php echo base_url(); ?>index.php/customer/customer_search_full_locality",
          data: {
            'action': 'fetch_single_data',
            'order_no': 'SU120/E/2/2022',
            'tablename_sub': 'order_product_list'
          }
        }).success(function(data) {

          $scope.availableTags = data;

        });

      };




      $scope.fetchData = function() {
        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/customer/fetch_single_data",
          data: {
            'id': <?php echo $id; ?>,
            'action': 'fetch_single_data',
            'tablename': 'customers'
          }
        }).success(function(data) {




          $scope.deviceName = data.deviceName;
          $scope.installationTime = data.installationTime;
          $scope.devicecity = data.devicecity;
          $scope.deviceversion = data.deviceversion;

          $scope.name = data.name;
          $scope.email = data.email;
          $scope.cus_id = data.id;
          $scope.archive_status = data.archive_status;
          $scope.phone = data.phone;
          $scope.company_name = data.company_name;
          $scope.print_name = data.print_name;
          $scope.gst = data.gst;
          $scope.gst_status = data.gst_status;
  $scope.pan_image = data.pan_image;
          $scope.cnn_opening_balance = data.cnn_opening_balance;
          $scope.cnn_payment_status = data.cnn_payment_status;

          if(data.approved_status == 2 || data.approved_status == 1){
            $('.approvalsOLD').hide();
            $('.approvalsNew').show();
          } else{
            $('.approvalsOLD').show();
            $('.approvalsNew').hide();
          }


          let addBox = $('.addresses-box');
          let parent = $('#shipping_address').parent();
          $('#shipping_address').remove();
          parent.append(addBox);
          parent.parent().find('label').append('<span style="position:relative;bottom:5px;" class="badge rounded-pill bg-primary ng-binding"><?=count($shipping_address_details)?></span>')
          let gstParent = $('#gst').parent();
          gstParent.parent().find('label').append('<a target="_blank" style="text-transform:none !important;" href="https://services.gst.gov.in/services/searchtp" > &nbsp;&nbspClick to validate GST </a>');



          if (data.cnn == 'YES') {
            $('#CNNVIEW').show();
          }


          if (data.gst_status == 2) {
            $('#gst_view').hide();
          }


          if (data.credit == 'YES') {
            $('#credit_view').show();
            $('.credit_bill_by_bill').show();
            $('.credit_period').show();
            $('.credit_limit').show();
          }
          else
          {

             $('.credit_period').hide();
            $('.credit_limit').hide();
            $('.credit_bill_by_bill').hide();

          }

          $('#ratings').val(data.ratings);
          $('#feedback1').val(data.price_rateings);
          $('#feedback2').val(data.delivery_time_rateings);
          $('#feedback3').val(data.quality_rateings);
          $('#feedback4').val(data.response_commission);
          $('#feedback5').val(data.commission_feed_back);


          $scope.approved_status = data.approved_status;
          $scope.reject_reason = data.reject_reason;
          if (data.approved_status == '-1') {
            $('.reject_reason_text').show();

            if (data.reject_reason != '')
            {
              $('.reject_reason_text_section').text(data.reject_reason);

            }

          }


          $scope.mark_vendor_id_check = data.mark_vendor_id;
          $scope.active_value = data.active_value;




          $('#mark_vendor_id').val(data.mark_vendor_id);
          $scope.sales_group = data.sales_group;
          $scope.sales_team_id = data.sales_team_id;

          $scope.sales_team_sub_id = data.sales_team_sub_id;

          $scope.hidden_id = data.id;


          $scope.credit_period = data.credit_period;

          $scope.pin = data.pin;
          $scope.address1 = data.address1;
          $scope.address2 = data.address2;
          $scope.landmark = data.landmark;
          $scope.pincode = data.pincode;
          $scope.google_map_link = data.google_map_link;


          SetRatingStar();







          <?php
          foreach ($additional_information as $vl) {
            $label_name = strtolower($vl->label_name);

            if ($label_name == 'mdbirthday') {
          ?>
              $scope.<?php echo $label_name; ?> = new Date(data.<?php echo $label_name; ?>);
            <?php
            } else  if ($label_name == 'customer_type') {
          ?>
          console.log("data.<?php echo $label_name; ?>",data.<?php echo $label_name; ?>)
              $scope.<?php echo $label_name; ?> = (data.<?php echo $label_name; ?>).toUpperCase();
            <?php
            } else {
            ?>
              $scope.<?php echo $label_name; ?> = data.<?php echo $label_name; ?>;

                    var access='<?php echo $access; ?>';

                    if(access==0)
                    {
                           if(data.approved_status>0)
                            {

                                     var labelid=data.<?php echo $label_name; ?>;
                                     var labelid_name='<?php echo $label_name; ?>';



                                     
                                     if(labelid!='')
                                     {
                                         $('#'+labelid_name).prop('disabled', true);
                                         if(labelid==null)
                                         {
                                             $('#'+labelid_name).prop('disabled', false);
                                         }
                                         
                                     }
                                  
                                    
                                     
                            }

                   }

          <?php
            }
          }
          ?>


          $scope.zone = data.zone;
          $scope.district = data.district;
          $scope.feedback_details = data.feedback_details;
          $scope.feedback = data.feedback_sub;
          $scope.credit_limit = data.credit_limit;
          $scope.stop_billing = data.stop_billing;

          $scope.opening_balance_status = data.opening_balance_status;
          $scope.opening_balance = data.opening_balance;


          $scope.locality = data.locality;


          $scope.city = data.city;
          $scope.state = data.state;
          $scope.landline = data.landline;


 var access='<?php echo $access; ?>';
 if(access==0)
 {
          if(data.approved_status>0)
        {
                           if(data.zone!=null)
                           {
                             $('#zone').prop('disabled', true);
                           }
                            if(data.district!=null)
                           {
                             $('#district').prop('disabled', true);
                           }
                            if(data.feedback_details!=null)
                           {
                             $('#feedback_details').prop('disabled', true);
                           }
                            if(data.credit_limit!=null)
                           {
                             $('#credit_limit').prop('disabled', true);
                           }

                            if(data.city!=null)
                           {
                             $('#city').prop('disabled', true);
                           }

                           if(data.locality!=null)
                           {
                             $('#localitybase').prop('disabled', true);
                           }

                            if(data.state!=null)
                           {
                             $('#state').prop('disabled', true);
                           }

                           if(data.print_name!=null)
                           {
                             $('#print_name').prop('disabled', true);
                           }

                         
                             if(data.company_name!=null)
                           {
                             $('#company_name').prop('disabled', true);
                           }


                              if(data.phone!=null)
                           {
                             $('#phone').prop('disabled', true);
                           }


                           // if(data.opening_balance!=null)
                           // {
                           //   $('#opening_balance').prop('disabled', true);
                           //   $('#opening_balance_status').prop('disabled', true);
                           // }
                          



                           // if(data.cnn_opening_balance!=null)
                           // {
                           //   $('#cnn_opening_balance').prop('disabled', true);
                           //   $('#cnn_payment_status').prop('disabled', true);
                           // }




                             if(data.sales_team_id!=null)
                           {
                             $('#sales_team_id').prop('disabled', true);
                           }

                             if(data.sales_team_sub_id!=null)
                           {
                             $('#sales_team_sub_id').prop('disabled', true);
                           }


                           if(data.sales_group!=null)
                           {
                             $('#sales_group').prop('disabled', true);
                           }
                           




                             if(data.address1!=null)
                            {
                             $('#address1').prop('disabled', true);
                            }


                           if(data.address2!=null)
                            {
                             $('#address2').prop('disabled', true);
                            }

                            if(data.gst!=null)
                            {
                             $('#gst').prop('disabled', true);
                            }

                            if(data.gst_status!=null)
                            {
                             $('#gst_status').prop('disabled', true);
                            }

          }
}



 


          var sectionId = 20;
          updateProgress(sectionId);



          <?php

          $usergroup = array(1, 15);
          if (!(in_array($this->session->userdata['logged_in']['access'], $usergroup))) {

          ?>
            <?php
            if ($_GET['viewState'] && $_GET['viewState'] == 'false') {
            ?>

          setTimeout(() => {
            document.querySelectorAll('input').forEach(function(element) {
              if ((element.value && element.value != null && element.type !== 'submit')) {
                  element.disabled = true;
              }else{
                element.disabled = false;
              }
          });

          document.querySelectorAll('select').forEach(function(selectElement) {
           let El = $scope[$(selectElement).attr('id')];
           console.log($scope[$(selectElement).attr('id')],$(selectElement).attr('id'));
            if (El == null || El == undefined ) {
              selectElement.disabled = false;
            }else{
              selectElement.disabled = true;

            }
            if($(selectElement).attr('ng-model') == 'sales_group' || $(selectElement).attr('ng-model') == 'sales_team_sub_id'){
              if((selectElement.value).trim() != '') {
                selectElement.disabled = true;
              }
            }
            
//             if($(selectElement).find( el => el.attr('value') == '')){
//               selectElement.disabled = false;
// 
//             } 
          });

         
          }, 2000);

            <?php
            }elseif($_GET['viewState'] && $_GET['viewState'] == 'readOnly'){
              ?>

              setTimeout(() => {
                document.querySelectorAll('input').forEach(function(element) {
                      element.disabled = true;
              });
    
              document.querySelectorAll('select').forEach(function(selectElement) {
                  selectElement.disabled = true;
              });
    
             
              }, 2000);
    
                <?php

            }
            ?>
          <?php
          }
          ?>
        });
      };

 document.getElementById('virtual_accountno').disabled = true;
 document.getElementById('customer_id').disabled = true;
    


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
          data:{'tablename':tablename,'value': '<?php echo $state_val; ?>'}
          }).success(function(data){
    
              $scope.availableProductsmmval2 = data;
         
          });
          
      
      }


       $scope.dateGET3 = function (tablename) 
        {
    
    
    
   
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/customer/state_find_data",
          data:{'tablename':tablename,'value': '<?php echo $state_val; ?>'}
          }).success(function(data){
    
              $scope.availableProductsmmval3 = data;
         
          });
          
      
      }




       $scope.dateGET4 = function (tablename) 
        {
    
    
    
   
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/customer/state_find_data",
          data:{'tablename':tablename,'value': '<?php echo $state_val; ?>'}
          }).success(function(data){
    
              $scope.availableProductsmmval4 = data;
         
          });
          
      
      }



    });
  </script>



  <script>
    var $star_rating = $('.star-rating .fa');

    var SetRatingStar = function() {
      return $star_rating.each(function() {
        if (parseInt($star_rating.siblings('#' + $(this).data('value')).val()) >= parseInt($(this).data('rating'))) {

          return $(this).removeClass('val').addClass('fa-star val');

        } else {

          return $(this).removeClass('val').addClass('fa-star');

        }
      });
    };

    $star_rating.on('click', function() {


      var sectionId = $(this).data('section');
      updateProgress(sectionId);


      $star_rating.siblings('#' + $(this).data('value')).val($(this).data('rating'));
      return SetRatingStar();
    });

    SetRatingStar();
  </script>

  <?php include('footer.php'); ?>
</body>

<script src="<?php echo base_url(); ?>assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/pristinejs/pristine.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/form-advanced.init.js"></script>