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
                                    <h4 class="mb-sm-0 font-size-18">Sales Team  Edit</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/salesteam/sales_team_list">Sales Team List</a></li>
                                            <li class="breadcrumb-item active"> Sales Team Edit</li>
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
                        


                            <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Sales Group <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <select class="form-control" required name="sales_group" ng-model="sales_group">

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


                          <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Sales Head <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <select class="form-control" required name="sales_head" ng-model="sales_head">

                              <option value=""> Select Sales Head</option>

                              <?php
                                foreach ($sales_head as $value) {

                                  ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>



                         <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Route</label>
                            <div class="col-sm-12">
                             <select class="form-control"  name="route" ng-model="route">

                              <option value=""> Select Route</option>

                              <?php
                                foreach ($route as $value) {

                                  ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
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


                    
                        
                          <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Sales Id <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="sales_id" class="form-control" name="sales_id" required ng-model="sales_id" type="text">
                            </div>
                          </div>
                        </div>
                        
                       <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Name <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="name" class="form-control" name="name" required ng-model="name" type="text">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Mobile No <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="phone" class="form-control" ng-model="phone" required name="phone" type="text">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Alternate no </label>
                            <div class="col-sm-12">
                              <input id="phone2" class="form-control" ng-model="phone2"  name="phone2" type="text">
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
                 







      <h4 class="card-title mt-3">Presonal Info </h4>

                      
                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">DOB </label>
                            <div class="col-sm-12">
                              <input id="name" class="form-control" name="dob"  ng-model="dob" type="date">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Marital status</label>
                            <div class="col-sm-12">
                            <select class="form-control" name="marital_status" id="marital_status"  ng-model="marital_status">

                             
  <option value="">Select Status</option>
                             <option value="Single"> Single</option>
                             <option value="Married"> Married</option>
                            
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                      </div>



                     
                      
                      
                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Father Name </label>
                            <div class="col-sm-12">
                              <input id="fathername" class="form-control" name="fathername"  ng-model="fathername" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Mother Name</label>
                            <div class="col-sm-12">
                             <input id="mothername" class="form-control" name="mothername"   ng-model="mothername" type="text">
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                   


                     <div id="ssp" style="display:none;">
                         
                  
                      
                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Spouse details </label>
                            <div class="col-sm-12">
                                
                                
                               <input class="form-check-input" name="spouse_details" ng-model="spouse_details" type="radio" id="formCheck1">
                               <label class="form-check-label" for="formCheck1"  value="Wife">&nbsp;&nbsp;&nbsp;Wife</label>
                               
                               
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               
                                <input class="form-check-input" name="spouse_details" ng-model="spouse_details" type="radio" id="formCheck2">
                               <label class="form-check-label" for="formCheck2"  value="Wife">&nbsp;&nbsp;&nbsp;Husband</label>
                                                            
                               
                               
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Spouse Name</label>
                            <div class="col-sm-12">
                             <input id="spouse_name" class="form-control" name="spouse_name"  ng-model="spouse_name" type="text">
                            </div>
                          </div>
                        </div>
                      </div>



                     
                      
                      
                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">DOB </label>
                            <div class="col-sm-12">
                              <input id="sdob" class="form-control" name="sdob"  ng-model="sdob" type="date">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Wedding Anniversary</label>
                            <div class="col-sm-12">
                             <input id="wedding_anniversary" class="form-control" name="wedding_anniversary"   ng-model="wedding_anniversary" type="date">
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      
                         </div>
                      
                      












                      <h4 class="card-title mt-3">Login Details </h4>




                    <div class="row">

                         <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Login Pin <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="pin" class="form-control"  ng-model="pin" required name="pin" type="text">
                            </div>
                          </div>
                        </div>


                       <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Status <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <select class="form-control" name="status" required ng-model="status" >
                               
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


<script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



  $scope.submit_button = 'Update';




 
 
  $scope.submitForm = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/salesteam/insertandupdate",
      data:{'status':$scope.status,'marital_status':$scope.marital_status,'dob':$scope.dob,'fathername':$scope.fathername,'mothername':$scope.mothername,'spouse_details':$scope.spouse_details,'spouse_name':$scope.spouse_name,'sdob':$scope.sdob,'wedding_anniversary':$scope.wedding_anniversary,'sales_id':$scope.sales_id,'phone2':$scope.phone2,'phone':$scope.phone,'pin':$scope.pin,'name':$scope.name,'email':$scope.email,'sales_head':$scope.sales_head,'route':$scope.route,'sales_group':$scope.sales_group,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'sales_team'}
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
             //$scope.error = false;
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
      url:"<?php echo base_url() ?>index.php/salesteam/fetch_single_data",
      data:{'id':<?php echo $id; ?>, 'action':'fetch_single_data','tablename':'sales_team'}
    }).success(function(data){

        $scope.name = data.name;
        $scope.email = data.email;
        $scope.phone = data.phone;
        $scope.phone2 = data.phone2;
        $scope.status = data.status;

        $scope.sales_group = data.sales_group;
        $scope.sales_head = data.sales_head;
        $scope.route = data.route;
        $scope.hidden_id = data.id;
        $scope.sales_id = data.sales_id;
        
        
        
        
        
        
        
        
        
          $scope.marital_status = data.marital_status;
        
           $scope.sales_group = data.sales_group;
           
          
           
           if(data.marital_status=='Married')
           {
                $('#ssp').show();
           }



        $scope.dob = data.dob;
        

        
        $scope.fathername = data.fathername;
        $scope.mothername = data.mothername;
        $scope.spouse_name = data.spouse_name;
        $scope.spouse_details = data.spouse_details;
        $scope.sdob = data.sdob;
        $scope.wedding_anniversary = data.wedding_anniversary;
        
        
        
        
        
        
        
        
        

        $scope.pin = data.pin;
       
      

     
    });
};




});
$(document).ready(function(){
 
  
  $("#marital_status").on('change',function(){
   var setval= $(this).val();
   
   if(setval=='Married')
   {
       $('#ssp').show();
      

   }
   else
   {
       $('#ssp').hide();
      
   }
   
   
  });
  
});
</script>
    <?php include ('footer.php'); ?>
</body>


