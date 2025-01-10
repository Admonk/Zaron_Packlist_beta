<?php  include "header.php"; ?>
<style>
        #pristine-valid-common2 .row .col-md-12 {
             /* line-height: 44px; */
             margin-bottom: 14px;
         }
.star-rating {
  line-height:32px;
  font-size:1.25em;
}

.val{color: #ee5c17;}
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
                    
                   <div class="card-header1">
                   <a href="#" class="btn btn-success"  data-bs-toggle="modal" data-bs-target=".exampleModalToggleLabel" style="float:right;margin: 5px 10px;">Add new field</a>
                   </div>
                    
                  <div class="card-body" >

                       
























<form id="pristine-valid-example" novalidate method="post"></form>



                                        










                    
                    <form id="pristine-valid-common" ng-submit="submitForm()" method="post">
                    


                       <div class="row">
                           
                            <div class="col-md-4" >
                                 <label class="col-sm-12 col-form-label">Choose Vendor </label>
                              <select class="form-control"  ng-change="Seletvendor()" data-trigger ng-model="seletvendor" name="choices-single-default"
                                                            id="choices-single-default"
                                                            placeholder="This is a search">
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
                           
                       </div>
                       
                       
                       <div class="row">
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Company name <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="company_name" class="form-control" required name="company_name" ng-model="company_name" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">GST Status <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                                
                                 <select class="form-control" name="gst_status" id="gst_status" required ng-model="gst_status">

                                 <option value="1">GST Holder</option>
                                 <option value="2">NON GST Holder</option>

                              </select>
                                
                            
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-3" id="gst_view">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">GST <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="gst" class="form-control" name="gst" ng-model="gst" type="gst">
                            </div>
                          </div>
                        </div>
                      
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Office Address line 1 <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="address1" class="form-control" name="address1" required ng-model="address1" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Office Address line 2</label>
                            <div class="col-sm-12">
                             <input id="address2" class="form-control" name="address2"   ng-model="address2" type="address2">
                            </div>
                          </div>
                        </div>
                      
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Pincode <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="pincode" class="form-control" ng-blur="getpencodeDetails($event)" name="pincode" required ng-model="pincode" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Landmark</label>
                            <div class="col-sm-12">
                             <input id="landmark" class="form-control" name="landmark"    ng-model="landmark" type="landmark">
                            </div>
                          </div>
                        </div>

                       
                     
                         

                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Zone </span></label>
                            <div class="col-sm-12">
                             <input id="locality" class="form-control" name="zone"    ng-model="zone" type="zone">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">City <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="city" class="form-control" name="city" required ng-model="city" type="text">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Locality <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                                
                                
                                
                 <input type="text" class="form-control" ng-model="locality" ng-keyup="completeLocalty()" required placeholder="Search locality"  id="localitybase">
          
                                
                             
                                
                            
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">State <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="state" class="form-control" name="state"  required  ng-model="state" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        
                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Google Location (Lat,Long)</label>
                            <div class="col-sm-12">
                             <input id="google_map_link" class="form-control" name="google_map_link"    ng-model="google_map_link" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        
                              
                        <?php
                        
                        foreach($additional_information as $vvl)
                        {
                                     if($vvl->type=='Multiple Options')
                                     {
                                         
                                         
                                           $option=$vvl->option;
                                           $option=explode(',', $option);
                                         
                            ?>
                                               <div class="col-md-3" >
                                              
                                                 <div class="form-group row">
                                                      
                                                         <label class="col-sm-12 col-form-label"><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?></label>
                                                         <div class="col-sm-12">
                                                            <select class="form-control <?php echo strtolower($vvl->label_name); ?>"  name="<?php echo strtolower($vvl->label_name); ?>"  ng-model="<?php echo strtolower($vvl->label_name); ?>">
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
                                         
                                           <div class="col-md-3" >
                                              
                                              
                                                   <div class="form-group row">
                                                     
                                                         <label class="col-sm-12 col-form-label"><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?></label>
                                                         <div class="col-sm-12">
                                                           
                                                           
                                                           <input type="<?php echo $vv; ?>" class="form-control <?php echo strtolower($vvl->label_name); ?>"  name="<?php echo strtolower($vvl->label_name); ?>"  ng-model="<?php echo strtolower($vvl->label_name); ?>">
                                                           
                                                         </div>
                                                      
                                                   </div>
                                                
                                                
                                                
                                            </div>
                                         
                                         <?php
                                     }
                            
                        }
                        ?>
                        
                         <div class="col-md-3" style="display:none;">
                                              
                                                 <div class="form-group row">
                                                      
                                                         <label class="col-sm-12 col-form-label">Sub Group <span style="color:red;">*</span></label>
                                                         <div class="col-sm-12">
                                                            <select class="form-control"   name="account_heads_id"  ng-model="account_heads_id">
                                                               
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

                        
                      </div>








                   

                 



                        

                      <h4 class="card-title mt-3">Contact Details </h4>
                     <div class="row">


                       <div class="col-md-3" style="display:none;">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Sales Group <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <select class="form-control" name="sales_group" required ng-model="sales_group">

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
                            <label class="col-sm-12 col-form-label">Sales Team <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <select class="form-control" name="sales_team_id" required ng-model="sales_team_id">

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
                            <label class="col-sm-12 col-form-label">Phone <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="phone" class="form-control" name="phone" ng-blur="Phonenumberchech()" required ng-model="phone" type="number" >
                              <small id="error_phone" style="color:red;"></small>
                            </div>
                          </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Landline No</label>
                            <div class="col-sm-12">
                              <input id="landline" class="form-control" ng-model="landline" name="landline" type="number">
                            </div>
                          </div>
                        </div>


                           <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Email</label>
                            <div class="col-sm-12">
                              <input id="email" class="form-control" name="email" ng-model="email" type="email">
                            </div>
                          </div>
                        </div>


                        
                      </div>
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                     <h4 class="card-title mt-3">Customer FeedBack</h4>
                     <div class="row">

                         <div class="col-md-12">
                          <div class="form-group row">
                            
                            <div class="col-sm-3">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" ng-model="feedback1"  id="membershipRadios1" value="Price" checked> Price <i class="input-helper"></i></label>
                             
                               
                                            <!-- end col -->
                                            <div class="col-sm-6" >
                                             
                                                
                                                          <div class="star-rating">
                                                             
                                                              
                                                            <span class="fa fa-star" data-rating="1" data-value="feedback1"></span>
                                                            <span class="fa fa-star" data-rating="2" data-value="feedback1"></span>
                                                            <span class="fa fa-star" data-rating="3" data-value="feedback1"></span>
                                                            <span class="fa fa-star" data-rating="4" data-value="feedback1"></span>
                                                            <span class="fa fa-star" data-rating="5" data-value="feedback1"></span>
                                                            <input type="hidden"  id="feedback1"  class="rating-value" value="0">
                                                          </div>
                                                       
                                                   
                                               
                                            </div>
                                           
                             
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" ng-model="feedback2"  id="membershipRadios2" value="Delivery Time"> Delivery Time <i class="input-helper"></i></label>
                              
                                         <div class="col-sm-6" >
                                                           <div class="star-rating">
                                                            <span class="fa fa-star" data-rating="1" data-value="feedback2"></span>
                                                            <span class="fa fa-star" data-rating="2" data-value="feedback2"></span>
                                                            <span class="fa fa-star" data-rating="3" data-value="feedback2"></span>
                                                            <span class="fa fa-star" data-rating="4" data-value="feedback2"></span>
                                                            <span class="fa fa-star" data-rating="5" data-value="feedback2"></span>
                                                            <input type="hidden"  id="feedback2"  class="rating-value" value="0">
                                                          </div>
                                            </div>
                              
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" ng-model="feedback3" id="membershipRadios3" value="quality"> Quality <i class="input-helper"></i></label>
                              <div class="col-sm-6" >
                             
                                                           <div class="star-rating">
                                                            <span class="fa fa-star" data-rating="1" data-value="feedback3"></span>
                                                            <span class="fa fa-star" data-rating="2" data-value="feedback3"></span>
                                                            <span class="fa fa-star" data-rating="3" data-value="feedback3"></span>
                                                            <span class="fa fa-star" data-rating="4" data-value="feedback3"></span>
                                                            <span class="fa fa-star" data-rating="5" data-value="feedback3"></span>
                                                            <input type="hidden"  id="feedback3"  class="rating-value" value="0">
                                                          </div>
                                            
                              </div>
                              </div>
                            </div>
                            
                            
                            <div class="col-sm-3">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" ng-model="feedback4" id="membershipRadios3" value="quality"> Response / Commission. <i class="input-helper"></i></label>
                              <div class="col-sm-6" >
                                                         <div class="star-rating">
                                                            <span class="fa fa-star" data-rating="1" data-value="feedback4"></span>
                                                            <span class="fa fa-star" data-rating="2" data-value="feedback4"></span>
                                                            <span class="fa fa-star" data-rating="3" data-value="feedback4"></span>
                                                            <span class="fa fa-star" data-rating="4" data-value="feedback4"></span>
                                                            <span class="fa fa-star" data-rating="5" data-value="feedback4"></span>
                                                            <input type="hidden"  id="feedback4"  class="rating-value" value="0">
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
                              <textarea class="form-control" rows="6" ng-model="feedback_details" name="feedback_details"></textarea>
                            </div>
                          </div>
                        </div>

                        
                      </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                          
                     
                     <div class="row">

                         <div class="col-md-4">
                             
                                               <h4 class="card-title mt-3">Cutomer Ratings</h4>
                                          
                                           
                                            <div class="col-sm-6">
                                                <div class="mt-3" dir="ltr">
                                                    
                                                     <div class="star-rating">
                                                            <span class="fa fa-star" data-rating="1" data-value="ratings"></span>
                                                            <span class="fa fa-star" data-rating="2" data-value="ratings"></span>
                                                            <span class="fa fa-star" data-rating="3" data-value="ratings"></span>
                                                            <span class="fa fa-star" data-rating="4" data-value="ratings"></span>
                                                            <span class="fa fa-star" data-rating="5" data-value="ratings"></span>
                                                            <input type="hidden"  id="ratings"   class="rating-value" value="0">
                                                    </div>
                                                </div>
                                            </div>
                                            
                               
                                           
                        </div>
                        
                         <div class="row">
                        
                         <div class="col-md-6">
                             <h4 class="card-title mt-3">Credit limit</h4>
                          <div class="form-group flaot-end text-end">
                               <input id="credit_limit" class="form-control" name="credit_limit" ng-model="credit_limit" type="text">
                            </div>
                        </div>
                        
                         <div class="col-md-6">
                             <h4 class="card-title mt-3">Credit Period</h4>
                          <div class="form-group flaot-end text-end">
                               <input id="credit_period" class="form-control" name="credit_period" ng-model="credit_period" type="text">
                            </div>
                        </div>
                       
                       </div>

                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                              <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="{{submit_button}}">
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
                              <input id="name" class="form-control" required  ng-model="label_name" placeholder="name_value" name="label_name" type="text">

                            </div>
                          </div>
                        </div>
                        
                        
                          <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Type</label>
                            <div class="col-sm-7">
                            
                              <select class="form-control typeset" required  ng-model="typebase">
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
                              <input id="name" class="form-control"   ng-model="option" name="option" type="text">

                            </div>
                          </div>
                        </div>

                         <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Grouping</label>
                            <div class="col-sm-7">
                            
                              <select class="form-control" required  ng-model="grouping">
                                 
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
   $star_rating.siblings('#'+$(this).data('value')).val($(this).data('rating'));
   return SetRatingStar();
});

SetRatingStar();











$(document).ready(function () { 
    
    
    
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
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;

  $scope.account_heads_id= 104;

  $scope.submit_button = 'Save';
$scope.grouping=3;
$scope.gst_status=1;
 $scope.sales_group=0;
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

      $scope.completeLocalty=function(){
    $( "#localitybase" ).autocomplete({
      source: $scope.availableTags
    });
    }; 
    




    $http({
      method:"POST",
      url:"<?php echo base_url(); ?>index.php/customer/customer_search_full_locality",
      data:{'action':'fetch_single_data','order_no':'SU120/E/2/2022','tablename_sub':'order_product_list'}
    }).success(function(data){

          $scope.availableTags = data;
     
    });
   

$scope.Phonenumberchech = function()
{
    
$http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/phone_no_find",
      data:{'phone':$scope.phone}
    }).success(function(data){
       
       
       if(data.error==1)
       {
           $('#error_phone').html('Phone No already exists');
       }
       else
       {
           $('#error_phone').html('');
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
  
  
  
  
  
  
  
  
  
  
  
  
 $scope.Seletvendor = function () {
      
      
           $http({
           method:"POST",
           url:"<?php echo base_url() ?>index.php/vendor/fetch_single_data",
           data:{'id':$scope.seletvendor,'action':'fetch_single_data','tablename':'vendor'}
           }).success(function(data){
    
             $scope.company_name = data.name;
             $scope.email = data.email;
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
  
  
  
  

 
 
  $scope.submitForm = function(){
      
      
  
    var price_rateings=  $('#feedback1').val();
    var delivery_time_rateings=  $('#feedback2').val();
    var quality_rateings=  $('#feedback3').val();
    var response_commission=  $('#feedback4').val();
    
    var ratings=  $('#ratings').val();
    
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
      data:{'status':'1',
      'sales_team_id':$scope.sales_team_id,
      <?php
      foreach($additional_information as $vl)
      {
             $label_name=strtolower($vl->label_name);
             ?>
             '<?php echo $label_name; ?>' : $scope.<?php echo $label_name; ?>,
             <?php
       }
      ?>
      'google_map_link':$scope.google_map_link,'gst_status':$scope.gst_status,'feedback_details':$scope.feedback_details,'price_rateings':price_rateings,'delivery_time_rateings':delivery_time_rateings,'quality_rateings':quality_rateings,'response_commission':response_commission,'ratings':ratings,'credit_period':$scope.credit_period,'credit_limit':$scope.credit_limit,'feedback':$scope.feedback,'phone':$scope.phone,'zone':$scope.zone,'locality':$scope.locality,'city':$scope.city,'state':$scope.state,'pincode':$scope.pincode,'landmark':$scope.landmark,'address1':$scope.address1,'address2':$scope.address2,'company_name':$scope.company_name,'gst':$scope.gst,'landline':$scope.landline,'email':$scope.email,'sales_group':$scope.sales_group,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'customers'}
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
            $scope.credit_limit = "";
            $scope.credit_period = "";
            $scope.google_map_link = "";
            $scope.sales_team_id="";
            
            
             
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
          

          }

          

      }

       
    });
  };




});

</script>
    <?php include ('footer.php'); ?>
</body>
<script src="<?php echo base_url(); ?>assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/pristinejs/pristine.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/form-advanced.init.js"></script>


