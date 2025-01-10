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
                                    <h4 class="mb-sm-0 font-size-18">Vendor  Edit</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/vendor/vendor_list">Vendor list</a></li>
                                            <li class="breadcrumb-item active"> Vendor  Edit </li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card">

                    
                  <div class="card-body" ng-init="fetchData()">

                       
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



                                        










                    
                    <form id="pristine-valid-common" ng-submit="submitForm()" method="post">
                    



                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Vendor Name <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="name" class="form-control" required name="name" ng-model="name" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">GST <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="gst" class="form-control" name="gst"  required  ng-model="gst" type="gst">
                            </div>
                          </div>
                        </div>
                      </div>


                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Address line 1 <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="address1" class="form-control" required name="address1" ng-model="address1" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Address line 2</label>
                            <div class="col-sm-12">
                             <input id="address2" class="form-control"  name="address2"   ng-model="address2" type="address2">
                            </div>
                          </div>
                        </div>
                      </div>



                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Pincode <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="pincode" class="form-control" ng-blur="getpencodeDetails($event)" required name="pincode" ng-model="pincode" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Landmark <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="landmark" class="form-control" required name="landmark"   ng-model="landmark" type="landmark">
                            </div>
                          </div>
                        </div>
                      </div>



                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">City <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="city" class="form-control" required name="city" ng-model="city" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">State <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="state" class="form-control"  required name="state"   ng-model="state" type="text">
                            </div>
                          </div>
                        </div>
                      </div>











                 



                        

                   <h4 class="card-title mt-3">Contact Details </h4>
                     <div class="row">


                    
                        
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Phone <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="phone" class="form-control" required name="phone" ng-model="phone" type="text">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Landline No</label>
                            <div class="col-sm-12">
                              <input id="landline" class="form-control" ng-model="landline" name="landline" type="text">
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

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Status</label>
                            <div class="col-sm-12">
                             <select class="form-control" name="status" ng-model="status" >
                               
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                              </select>
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
           

    });





}




 
 
  $scope.submitForm = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/vendor/insertandupdate",
      data:{'phone':$scope.phone,'city':$scope.city,'state':$scope.state,'pincode':$scope.pincode,'landmark':$scope.landmark,'address1':$scope.address1,'address2':$scope.address2,'name':$scope.name,'gst':$scope.gst,'landline':$scope.landline,'email':$scope.email,'status':$scope.status,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'vendor'}
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
      url:"<?php echo base_url() ?>index.php/vendor/fetch_single_data",
      data:{'id':<?php echo $id; ?>, 'action':'fetch_single_data','tablename':'vendor'}
    }).success(function(data){

        $scope.name = data.name;
        $scope.email = data.email;
        $scope.phone = data.phone;
        $scope.company_name = data.company_name;
        $scope.gst = data.gst;
        $scope.status = data.status;
        $scope.hidden_id = data.id;

        $scope.pin = data.pin;
        $scope.address1 = data.address1;
        $scope.address2 = data.address2;
        $scope.landmark = data.landmark;
        $scope.pincode = data.pincode;
        $scope.city = data.city;
        $scope.state = data.state;
        $scope.landline = data.landline;
      


     
    });
};




});

</script>
    <?php include ('footer.php'); ?>
</body>


