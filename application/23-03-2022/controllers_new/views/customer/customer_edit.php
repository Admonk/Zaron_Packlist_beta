<?php  include "header.php"; ?>
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
                                    <h4 class="mb-sm-0 font-size-18">Customer  Edit</h4>

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

                    <div class="card-header">
                                        <h4 class="card-title">Customer Edit Form</h4>
                                        
                                    </div>
                  <div class="card-body" ng-init="fetchData()">


            



































<form id="pristine-valid-example" novalidate method="post"></form>



                                        










                   
                    <form id="pristine-valid-common" ng-submit="submitForm()" method="post">
                    



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
                            <label class="col-sm-12 col-form-label">GST <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="gst" class="form-control" name="gst"   required ng-model="gst" type="gst">
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
                      </div>



                        <div class="row">
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
                            <label class="col-sm-12 col-form-label">Landmark/Area/Road </label>
                            <div class="col-sm-12">
                             <input id="landmark" class="form-control" name="landmark"    ng-model="landmark" type="landmark">
                            </div>
                          </div>
                        </div>

                       
                     
                         

                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Zone <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="locality" class="form-control" name="zone" required   ng-model="zone" type="zone">
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
                            <label class="col-sm-12 col-form-label">Google Location Link </label>
                            <div class="col-sm-12">
                             <input id="google_map_link" class="form-control" name="google_map_link"    ng-model="google_map_link" type="text">
                            </div>
                          </div>
                        </div>

                        
                      </div>








                   

                 



                        

                      <h4 class="card-title mt-3">Contact Details </h4>
                     <div class="row">


                       <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Sales Group <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <select class="form-control" name="sales_group" required ng-model="sales_group">

                              <option value=""> Select Sales Group</option>

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
                              <input id="phone" class="form-control" name="phone" required ng-model="phone" type="text" >
                            </div>
                          </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Landline No</label>
                            <div class="col-sm-12">
                              <input id="landline" class="form-control" ng-model="landline" name="landline" type="text">
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
                               <div class="col-sm-6" >
                                             
                                                    <div id="rater-message"></div>
                                                   
                                               
                                            </div>
                             
                             
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" ng-model="feedback2"  id="membershipRadios2" value="Delivery Time"> Delivery Time <i class="input-helper"></i></label>
                              <div class="col-sm-6" >
                                                 <div id="basic-rater"></div>
                                            </div>
                              
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" ng-model="feedback3" id="membershipRadios3" value="quality"> Quality <i class="input-helper"></i></label>
                                   <div class="col-sm-6" >
                                 <div id="rater-step"></div>
                                  </div>
                             
                              </div>
                            </div>
                            
                            
                            <div class="col-sm-3">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" ng-model="feedback4" id="membershipRadios3" value="quality"> Response / Commission. <i class="input-helper"></i></label>
                              <div class="col-sm-6" >
                                <div id="raterreset" class="align-middle"></div>
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
                                           
                                            <!-- end col -->
                                            <div class="col-sm-6" style="display:none;">
                                                <div class="p-lg-5 p-4 text-center" dir="ltr">
                                                    <h5 class="font-size-15 mb-4">Example with unlimited number of stars. readOnly option is set to true.</h5>
                                                    <div id="rater-unlimitedstar"></div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="mt-3" dir="ltr">
                                                    
                                                    <div id="rater-onhover" class="align-middle"></div>
                                                    <span class="ratingnum badge bg-info align-middle ms-2"></span>
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

<script type="text/javascript">      
$(document).ready(function () {      
$("#gst").change(function () {    
                var inputvalues = $(this).val();    
                var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}');    
                if (gstinformat.test(inputvalues)) {    
                    return true;    
                } else {    
                    alert('Please Enter Valid GSTIN Number');    
                    $("#gst").val('');    
                    $("#gst").focus();    
                }    
            });          
 });          
</script> 

<script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



  $scope.submit_button = 'Update';



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


 
 
  $scope.submitForm = function(){
      
       var ratings=  $('.ratingnum').text();
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
       data:{'status':'1','sales_team_id':$scope.sales_team_id,'google_map_link':$scope.google_map_link,'feedback_details':$scope.feedback_details,'zone':$scope.zone,'ratings':ratings,'credit_period':$scope.credit_period,'credit_limit':$scope.credit_limit,'feedback':$scope.feedback,'phone':$scope.phone,'city':$scope.city,'locality':$scope.locality,'state':$scope.state,'pincode':$scope.pincode,'landmark':$scope.landmark,'address1':$scope.address1,'address2':$scope.address2,'company_name':$scope.company_name,'gst':$scope.gst,'landline':$scope.landline,'email':$scope.email,'sales_group':$scope.sales_group,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'customers'}
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
            

            //$scope.success = true;
           // $scope.error = false;
            //$scope.successMessage = data.massage;
            
            
              alert(data.massage);
              window.close();
            
          

          }

          

      }

       
    });
  };


$scope.fetchData = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/fetch_single_data",
      data:{'id':<?php echo $id; ?>, 'action':'fetch_single_data','tablename':'customers'}
    }).success(function(data){

        $scope.name = data.name;
        $scope.email = data.email;
        $scope.phone = data.phone;
        $scope.company_name = data.company_name;
        $scope.gst = data.gst;
        $scope.sales_group = data.sales_group;
        $scope.sales_team_id = data.sales_team_id;
        $scope.hidden_id = data.id;
        
        
        $scope.credit_period = data.credit_period;

        $scope.pin = data.pin;
        $scope.address1 = data.address1;
        $scope.address2 = data.address2;
        $scope.landmark = data.landmark;
        $scope.pincode = data.pincode;
        
         $scope.google_map_link = data.google_map_link;
        
        
        
        $scope.zone = data.zone;
        $scope.feedback_details = data.feedback_details;
        $scope.feedback = data.feedback_sub;
        $scope.credit_limit = data.credit_limit;
        $scope.ratings = data.ratings+'%';
        
       
        
         $('.star-value').css('background-size','22px;');
         $('.star-value').css('width', $scope.ratings);
        

        $scope.locality = data.locality;


        $scope.city = data.city;
        $scope.state = data.state;
        $scope.landline = data.landline;
      


     
    });
};




});

</script>

    <?php include ('footer.php'); ?>
</body>


