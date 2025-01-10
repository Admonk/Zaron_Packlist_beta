<?php  include "header.php"; ?>
<style>
    form#pristine-valid-common {
    margin-bottom: 20px;
}
table#datatable {
    font-size: 11px;
}


.select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
  width: 300px;
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
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
                                    <h4 class="mb-sm-0 font-size-18">Driver List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Driver List!</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <?php
                  if($this->session->userdata['logged_in']['access']!='11')
                  {
                  ?>
                  <div class="col-lg-12">
     
                         <button type="button" style="float: right;margin: 7px 20px;" class="btn btn-primary waves-effect waves-light clickshow" >Add Driver</button>
                    
                                            
                    </div>


                    <?php
                  }
                  ?>




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

                    <form id="pristine-valid-common" ng-submit="submitForm()" method="post" style="display:none;">
                      

                          <div class="row">
                      




                        
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Driver name <span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                              <input id="name" class="form-control" name="name" required ng-model="name" type="text">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone <span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                              <input id="phone" class="form-control" name="phone" required ng-model="phone" type="text">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Vehicle No <span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                             <select class="form-control select2"  name="vehicle_id" required ng-model="vehicle_id">

                              <!-- <option value=""> Select Vehicle No</option> -->

                              <?php
                                foreach ($vehicle as $value) {

                                  ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->vehicle_name; ?> <?php echo $value->vehicle_number; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                                              
                        
                     




                        </div>
                        
                        
                           <h4 class="card-title mt-3">Delivery Charges </h4>
                           <div class="row">
                            
                            
                          <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Delivery Fixed Charge  </label>
                            <div class="col-sm-6">
                              <input id="delivery_fixced" class="form-control" name="delivery_fixced"   type="number"> 
                            </div>
                          </div>
                        </div>
                        
                    
                    
                        
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label">KM Base Charge  </label>
                            <div class="col-sm-6">
                              <input id="km_base_charge" class="form-control" name="km_base_charge"   type="number">
                            </div>
                          </div>
                        </div>
                        
                        
                        
                         <div class="col-md-4" style="display:none;">
                                              
                                                 <div class="form-group row">
                                                      
                                                         <label class="col-sm-3 col-form-label">Sub Group <span style="color:red;">*</span></label>
                                                         <div class="col-sm-9">
                                                            <select class="form-control" data-trigger  required  name="account_heads_id"  ng-model="account_heads_id">
                                                                 
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
                        

                          <h4 class="card-title mt-3">Login Details </h4>

                          <div class="row">

                         <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Login Pin <span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                             <input id="pin" class="form-control" required  ng-model="pin" name="pin" type="text">
                            </div>
                          </div>
                        </div>


                       <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status <span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                             <select class="form-control"  ng-init="status=1" required name="status" ng-model="status" >
                                   
                                
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                              </select>
                            </div>
                          </div>
                        </div>


                           <div class="col-md-4">
                          <div class="form-group row">
                          
                            <div class="col-sm-9">
                               <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                         <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="{{submit_button}}">


                            </div>
                          </div>
                        </div>

                      </div>         
                  




                    </form>




<?php
if($this->session->userdata['logged_in']['access']=='11')
{
?>

<h4 class="mb-sm-0 font-size-18">Driver Verification List</h4>   

<?php
}
else
{
  ?>
  <h4 class="mb-sm-0 font-size-18">Driver Table List</h4>   
  <?php
}
                         ?>

   


<br>
                       


                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>


                          <th>ID #</th>
                           <th>Driver name</th>
                           <th>Vehicle No</th>
                           <th>Phone</th>
                           <th>Fixed Charge</th>
                           <th>KM Base Charge</th>
                          <!--  <th>Pin</th> -->
                           <th>Status</th>
                            <?php
                            if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='15')
                            {
                            ?>
                           <th style="display: none;">Rent Date</th>
                           <th>Opening BL Rent</th>
                           <th>Rent Ledger</th>
                           <th style="display: none;">Collection Date</th>
                           <th>Opening BL Collection</th>
                           <th>Collection Ledger</th>
                           <?php
                          }
                          ?>

                           
                            <?php
                           if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='15' || $this->session->userdata['logged_in']['access']=='6')
                           {
                           ?>
                          
                           <th>Approved Status</th>
                           <?php
                           }
                           ?>

                           <th>Created By</th>
                           <th>Approved By</th>
                          


                           <?php
                            if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='15' || $this->session->userdata['logged_in']['access']=='6')
                        {

                              ?>
  <th>Action</th>
                              <?php
                        }
                           ?>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          <td>{{name.no}}</td>
                          <td>{{name.name}}</td>
                          <td>{{name.vehicle_id}}</td>
                          <td>{{name.phone}}</td>
                          <td>{{name.delivery_fixced}}</td>
                          <td>{{name.km_base_charge}}</td>
                          <!-- <td>{{name.pin}}</td> -->
                          <td>{{name.status}}</td>
 <?php
                            if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='15')
                            {
                            ?>

                          <td style="display: none;"><input type="date" class="form-control" min="<?php echo date('Y-04-01'); ?>" name="ob-rent_date" id="ob-rent_date_{{name.id}}" value="{{name.payment_date_rent }}"></td>
                          <td><input  type="number" value="{{name.opening_balance_rent}}" style="width: 70px;"  id="oo_rent_{{name.id}}"></td>
                          <td>
                               <select  style="width: 60px;margin: 8px 0px;" ng-blur="opening_bl_rent(name.id)" id="pay_rent_{{name.id}}" >
                                        <option value="">Select</option>
                                        <option value="1"  ng-selected="{{name.payment_type_rent == 1}}">CR</option>
                                        <option value="2"  ng-selected="{{name.payment_type_rent == 2}}">DR</option>
                                </select>
                            </td>

                          <td style="display: none;"><input type="date" class="form-control" min="<?php echo date('Y-04-01'); ?>" name="ob-collection_date"  id="ob-collection_date_{{name.id}}" value="{{name.payment_date_collection }} "></td>
                          <td><input  type="number" value="{{name.opening_balance_collection}}" style="width: 70px;"  id="oo_collection_{{name.id}}"></td>
                           
                            <td>
                               <select  style="width: 60px;margin: 8px 0px;" ng-blur="opening_bl_collection(name.id)" id="pay_collection_{{name.id}}" >
                                        <option value="">Select</option>
                                        <option value="1"  ng-selected="{{name.payment_type_collection == 1}}">CR</option>
                                        <option value="2"  ng-selected="{{name.payment_type_collection == 2}}">DR</option>
                                </select>
                            </td>

  <?php
                          }
                          ?>




                            <?php
                           if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='15' || $this->session->userdata['logged_in']['access']=='6')
                           {
                           ?>
                          
                          <td>
                            
 <select  style="width: 85px;margin: 8px 0px;" ng-model="approved_driver_status" ng-change="changepaystatusdd_1(name.id)" id="approved_driver_status{{name.id}}" >
                                  
                                       
                                        <option value="">Select</option>
                                       <option value="2"  ng-selected="{{name.approved_driver_status == '2'}}">Approved</option>
                                       <option value="0"  ng-selected="{{name.approved_driver_status == '0'}}">Un Approved</option>
                                       
                                 
                                 
                                  
                              </select>

                          </td>
                          <?php
                           }
                           ?>
                          <td>{{name.username}}</td>
                          <td>{{name.approved_by}}</td>
                         
                         
  <?php
    if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='15' || $this->session->userdata['logged_in']['access']=='6')
         {
                              ?>
                          <td>
                            <button type="button" ng-click="fetchSingleData(name.id)" class="btn btn-outline-primary"><i class="mdi mdi-pencil menu-icon"></i></button>
                           
   <?php

                           if($this->session->userdata['logged_in']['access']=='15' || $this->session->userdata['logged_in']['access']=='6')
                           {


                           }
                           else
                           {
                            ?>
                           <button type="button" ng-click="deleteData(name.id)" class="btn btn-outline-danger"><i class="mdi mdi-delete menu-icon"></i></button>

                            <?php
                           }
                           ?>
                         </td>

    <?php
                        }
                           ?>
                           
                        </tr>
                        
                      
                      </tbody>
                    </table>
                 
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


    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
$(document).ready(function(){

  $('.select2').select2();
  $(".clickshow").click(function(){
   $('#pristine-valid-common').toggle();
  });

$('input[type=text]').on('input', function()
         {

                
                 var inputValue = $(this).val();
                 var uppercaseValue = inputValue.toUpperCase();
                 $(this).val(uppercaseValue);


                 const sectionId = $(this).data('section');
                 updateProgress(sectionId);



 });

  
});
</script>
<script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;
$scope.account_heads_id= 52;

$scope.pin = '<?php echo substr(time(), 4); ?>';
  $scope.submit_button = 'Add';


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/driver/fetch_data_sales_group').success(function(data){
      $scope.namesData = data;
    });
  };

 
 
  $scope.submitForm = function(){

   var  km_base_charge=$('#km_base_charge').val();
var  delivery_fixced=$('#delivery_fixced').val();



    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/driver/insertandupdate",
      data:{'name':$scope.name,'account_heads_id':$scope.account_heads_id,'delivery_fixced':delivery_fixced,'km_base_charge':km_base_charge,'name':$scope.name,'vehicle_id':$scope.vehicle_id,'phone':$scope.phone,'pin':$scope.pin,'status':$scope.status,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'driver'}
    }).success(function(data){
       
      if(data.error != '1')
      {
        $scope.success = true;
        $scope.error = false;
        $scope.name = "";
        $scope.vehicle_id = "";
        $scope.phone = "";
        $scope.pin = "";
        
        $scope.hidden_id = "";
        $scope.successMessage = "Driver successfully "+$scope.submit_button;
        $scope.fetchData();
         $('#pristine-valid-common').toggle();
         
         
         
          $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                               

         
           location.reload();
         
         
         
      }
      else
      {
            $scope.success = false;
            $scope.error = true;
            $scope.errorMessage = data.massage;
             $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });
            
            
            
      }



    });
  };





  $scope.changepaystatusdd_1 = function(id){
     
     
     
     var bb=$('#approved_driver_status'+id).val();
     
     
 
  
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/driver/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'approved_driver_status','tablename':'driver'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 }


 $scope.opening_bl_rent = function(id){
     
     var pay_rent=$('#pay_rent_'+id).val();
     var obalance_rent=$('#oo_rent_'+id).val();
     var obrent_date= '2023-07-01';
 
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/driver/insertandupdate",
        data:{
          'id':id,
          'action':'updatevalue',
          'lab':'payment_status',
          'status':'rent',
          'pay_rent':pay_rent,
          'obrent_date':obrent_date,
          'obalance_rent':obalance_rent,
          'tablename':'driver'
        }
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
       // alert("Opening Balance Added");
        //getData();
      }); 
    
     keepGoing = false;
     
 };

 $scope.opening_bl_collection = function(id){
     
    
      var pay_collection=$('#pay_collection_'+id).val();
      var obalance_collention=$('#oo_collection_'+id).val();
      var obcollection_date= '2023-07-01';
  
      $http({
         method:"POST",
         url:"<?php echo base_url() ?>index.php/driver/insertandupdate",
         data:{
           'id':id,
           'action':'updatevalue',
           'lab':'payment_status',
           'status':'collection',
           'pay_collection':pay_collection,
           'obcollection_date':obcollection_date,
           'obalance_collention':obalance_collention,
           'tablename':'driver'
         }
       }).success(function(data){
         $scope.success = false;
         $scope.error = false;
         //alert("Opening Balance Added");
         //getData();
       }); 
     
      keepGoing = false;
      
  };
$scope.fetchSingleData = function(id){


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/driver/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'driver'}
    }).success(function(data){


           $scope.editData = data;
            $scope.vehicle_id = data.vehicle_id;

          $scope.name = data.name;
          $('#km_base_charge').val(data.km_base_charge);
         $('#delivery_fixced').val(data.delivery_fixced);

         
          $scope.phone = data.phone;
          $scope.pin = data.pin;
           
          $scope.status = data.status;
          $scope.hidden_id = id;
          $scope.submit_button = 'Update';
           $('#pristine-valid-common').show();
     
    });
};

 
$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/driver/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'driver'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        $scope.fetchData();
      }); 
    }
};




});

</script>
    <?php include ('footer.php'); ?>
</body>


