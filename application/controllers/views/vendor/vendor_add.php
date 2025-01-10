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
                                    <h4 class="mb-sm-0 font-size-18">Vendor  Create</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Vendor  Create</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card">

                   
                  <div class="card-body" >

                       
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
                           
                           

                              <div class="col-md-4">
                                
                                   <label class="col-sm-12 col-form-label">Customer & Vendor > inactive feature</label>
                                 <label class="radio-inline">
                                  
                                
                                  <input type="radio" name="optradio" ng-click="onClick(2)" value="1" id="active"> Both
                                  
                                  
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="optradio" ng-click="onClick(0)" value="0" id="inactive"> Customer
                                </label>
                                
                                <label class="radio-inline">
                                  <input type="radio" name="optradio" ng-click="onClick(-1)" checked value="-1" id="inactive"> Vendor
                                </label>


                        <label class="radio-inline d-none">
                          <input type="radio" ng-click="onClick(-2)" name="optradio" > Driver Rent
                        </label>

                        <label class="radio-inline d-none">
                          <input type="radio" ng-click="onClick(-3)" name="optradio" > Driver Collection
                        </label>


                        <label class="radio-inline d-none">
                          <input type="radio" ng-click="onClick(-4)" name="optradio" > Other Ledger
                        </label>

                               
                            </div>


                             <div class="col-md-4 sasa" id="customer" style="display:none;">
                                 <label class="col-sm-12 col-form-label">Choose Customer </label>
                                                      
                                                              
                                  <input type="text" class="form-control" ng-model="seletccustomer" ng-blur="Seletccustomer()" ng-keyup="completeCustomer()" placeholder="Search Customer Or Phone"  id="choices-single-default">
          
                                
                                                        
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

                       <div class="row">
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Supplier name <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="name" class="form-control" required name="name" ng-model="name" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
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
                        
                        <div class="col-md-4" id="gst_view">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">GST </label>
                            <div class="col-sm-12">
                             <input id="gst" class="form-control" name="gst"    ng-model="gst" type="gst">
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                      
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Company Address line 1 <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="address1" class="form-control" required name="address1" ng-model="address1" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Address line 2</label>
                            <div class="col-sm-12">
                             <input id="address2" class="form-control"  name="address2"   ng-model="address2" type="address2">
                            </div>
                          </div>
                        </div>
                     
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Pincode <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="pincode" class="form-control" ng-blur="getpencodeDetails($event)" required name="pincode" ng-model="pincode" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Landmark </label>
                            <div class="col-sm-12">
                             <input id="landmark" class="form-control"  name="landmark"   ng-model="landmark" type="landmark">
                            </div>
                          </div>
                        </div>
                      
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">City </label>
                            <div class="col-sm-12">
                              <input id="city" class="form-control"  name="city" ng-model="city" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">State </label>
                            <div class="col-sm-12">
                             <input id="state" class="form-control"   name="state"   ng-model="state" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                         <div class="col-md-4" style="display:none;">
                                              
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










                      <h4 class="card-title mt-3">Additional  Details </h4>
                     <div class="row">


                    
                        
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Warehouse address</label>
                            <div class="col-sm-12">
                              <input id="warehouse_address" class="form-control"  name="warehouse_address" ng-model="warehouse_address" type="text">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Accounts Person Contact</label>
                            <div class="col-sm-12">
                              <input id="accounts_person_contact" class="form-control" ng-model="accounts_person_contact" name="accounts_person_contact" type="text">
                            </div>
                          </div>
                        </div>


                           <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Account Details</label>

                            <div class="col-sm-12">
                              <input id="account_details" class="form-control" name="account_details" ng-model="account_details" type="text">
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Supplier Referred by</label>
                            <div class="col-sm-12">
                              <input id="referred_by" class="form-control" name="referred_by" ng-model="referred_by" type="text">
                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Default mode of communication</label>
                            <div class="col-sm-12">
                             <select class="form-control" ng-init="communication_mode='PHONE'" name="communication_mode" ng-model="communication_mode" >
                               
                               
                                <option value="PHONE">PHONE</option>
                                <option value="EMAIL">EMAIL</option>
                                <option value="WHATSAPP">WHATSAPP</option>

                              </select>
                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Ratings</label>
                            <div class="col-sm-12">
                                <div class="form-check" style="padding-left: 0;">
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
                          </div>
                        </div>
                        
                      
                        
                      </div>



                 





                   <h4 class="card-title mt-3">Contact Details </h4>
                     <div class="row">


                    
                        
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Phone <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="phone" class="form-control" required name="phone" ng-model="phone" type="number">
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

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Status</label>
                            <div class="col-sm-12">
                             <select class="form-control" ng-init="status=1" name="status" ng-model="status" >
                               
                               
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                              </select>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                              <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                               <input type="hidden" name="mark_customer_id" id="mark_customer_id" value="0" />
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="{{submit_button}}">
                            </div>
                        </div>
                        
                      </div>





                      


                         
                      
                    </form>
<br>
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
                 if(inputvalues!='')
                {
                  
                var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}');    
                if (gstinformat.test(inputvalues)) {    
                    return true;    
                } else {    
                    alert('Please Enter Valid GSTIN Number');    
                    $("#gst").val('');    
                    $("#gst").focus();    
                }  
                
                }
                
                
                
            }); 
            
            
            $('input[type=text]').on('input', function()
         {

                
                 var inputValue = $(this).val();
                 var uppercaseValue = inputValue.toUpperCase();
                 $(this).val(uppercaseValue);


                 const sectionId = $(this).data('section');
                 updateProgress(sectionId);



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
            
            
            
 });          
</script> 
<script>











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














var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){
$scope.gst_status=1;
  $scope.success = false;
  $scope.error = false;
$scope.account_heads_id=104;
$scope.submit_button = 'Save';





$('.sasa').hide();
$scope.onClick = function(id) {
 
    $('.sasa').hide();
     if(id==0)
     {
       var base='customer';
     }

     if(id==2)
     {
       var base='customer';
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


          $('#mark_customer_id').val(data.id);

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


          $('#mark_customer_id').val(data.id);

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















$scope.getpencodeDetails = function (event) {







 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/pincode",
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.city = data.city;
            $scope.state =  data.state;
           

    });





};   



$scope.completeCustomer=function(){
       
        
      
        var search=  $('#choices-single-default').val();
        
        
        
        $( "#choices-single-default" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':'1'}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    };





 $scope.Seletccustomer = function () {
      
      
           $http({
           method:"POST",
           url:"<?php echo base_url() ?>index.php/vendor/fetch_single_data_customer",
           data:{'id':$scope.seletccustomer}
           }).success(function(data){
    
             $scope.name = data.name;
             $scope.email = data.email;
             $scope.phone = data.phone;
             $scope.company_name = data.company_name;
             $scope.gst = data.gst;
              $scope.gst_status = data.gst_status;
              $('#mark_customer_id').val(data.id);
            
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
      
      var feedback1=$('#feedback1').val();
      var mark_customer_id=  $('#mark_customer_id').val();
       var active=$('input[name="optradio"]:checked').val();
       
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/vendor/insertandupdate",
      data:{'phone':$scope.phone,'mark_customer_id':mark_customer_id,'active':active,'feedback1':feedback1,'gst_status':$scope.gst_status,'warehouse_address':$scope.warehouse_address,'accounts_person_contact':$scope.accounts_person_contact,'account_details':$scope.account_details,'communication_mode':$scope.communication_mode,'referred_by':$scope.referred_by,'account_heads_id':$scope.account_heads_id,'city':$scope.city,'state':$scope.state,'pincode':$scope.pincode,'landmark':$scope.landmark,'address1':$scope.address1,'address2':$scope.address2,'status':$scope.status,'name':$scope.name,'gst':$scope.gst,'landline':$scope.landline,'email':$scope.email,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'vendor'}
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
           
            $scope.address1 = "";
            $scope.address2 = "";
            
            $scope.warehouse_address = "";
            $scope.accounts_person_contact = "";
            $scope.account_details = "";
            $scope.communication_mode = "";
            $scope.referred_by = "";
          
            $scope.gst = "";
            $scope.landline = "";
            $scope.landmark = "";

            $scope.pincode = "";


            $scope.sales_group = "";
            $scope.successMessage = data.massage;
            
            
                                                                $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                                 location.reload();
            

          }

          

      }

       
    });
  };




});

</script>
    <?php include ('footer.php'); ?>
</body>



