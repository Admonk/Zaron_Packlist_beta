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
                                    <h4 class="mb-sm-0 font-size-18">Users  Create</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Users Forms </li>
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
                    

 <h4 class="card-title mt-3">Contact Details </h4>

                      
                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Name <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="name" class="form-control" name="name" required ng-model="name" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Email</label>
                            <div class="col-sm-12">
                             <input id="email" class="form-control" name="email"   ng-model="email" type="email">
                            </div>
                          </div>
                        </div>
                      </div>



                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Phone <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="phone" class="form-control" name="phone" required ng-model="phone" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                         <?php
                       $na="d-none";
                       $sd="";
                      if(isset($_GET['sales_head']))
                      {
                          if($_GET['sales_head']==11)
                         {
                             $na="ng-data";
                             
                            
                         }
                         else
                         {
                             $na="d-none";
                         }
                          $sd= $_GET['sales_head'];
                      }
                      
                      ?>


                            <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">User Group <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                            <?php
                            if($na=='ng-data')
                            {
                                ?>
                                <select class="form-control"  ng-init="customer_group=<?php echo $sd; ?>" name="customer_group" id="customer_group"  required ng-model="customer_group">

                            

                              <?php
                                foreach ($user_group as $value) {
                                   
                                   if($value->id=="11")
                                   {
                                       
                                   
                                  ?>
                                       <option value="<?php echo $value->id; ?>" selected><?php echo $value->name; ?></option>
                                  <?php
                                  }
                                  
                                }
                              ?>
                            
                              

                              </select>
                                <?php
                            }
                            else
                            {
                                 ?>
                                <select class="form-control" ng-init="customer_group=<?php echo $sd; ?>" name="customer_group" id="customer_group"  required ng-model="customer_group">

                              <option value=""> Select User Group</option>

                              <?php
                                foreach ($user_group as $value) {
                                   
                                   if($value->id!="13" && $value->id!="12")
                                   {
                                       
                                   
                                  ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  }
                                  
                                }
                              ?>
                            
                              

                              </select>
                                <?php
                            }
                            ?>
                                
                             
                            </div>
                          </div>
                        </div>
                        
                        
                        
                         

                    

                      </div>
                      
                      
                      
                      <?php
                       $na="d-none";
                      if(isset($_GET['sales_head']))
                      {
                          if($_GET['sales_head']==11)
                         {
                             $na="ng-data";
                         }
                         else
                         {
                             $na="d-none";
                         }
                          
                      }
                      
                      ?>
                      
                      
                      <div class="row <?php echo $na; ?>"  id="showslaesgroup">
                          <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Sales Group <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <select class="form-control" id="choices-multiple-default"  data-trigger  
                                                            placeholder="This is a placeholder" multiple name="sales_group" ng-model="sales_group">

                              <option value=""> Select Sales Group</option>

                              <?php
                                foreach ($sales_group as $value) {

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
                             <select class="form-control" ng-init="status=1" name="status" required ng-model="status" >
                               
                             
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



  $scope.submit_button = 'Save';

$scope.pin = '<?php echo substr(time(), 4); ?>';

 
 
  $scope.submitForm = function(){
      
      
      
    
      
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/users/insertandupdate",
      data:{'name':$scope.name,'sales_group':$scope.sales_group,'status':$scope.status,'marital_status':$scope.marital_status,'dob':$scope.dob,'fathername':$scope.fathername,'mothername':$scope.mothername,'spouse_details':$scope.spouse_details,'spouse_name':$scope.spouse_name,'sdob':$scope.sdob,'wedding_anniversary':$scope.wedding_anniversary,'pin':$scope.pin,'phone':$scope.phone,'email':$scope.email,'customer_group':$scope.customer_group,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'admin_users'}
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
            $scope.error = false;
            $scope.name = "";
            $scope.email = "";
            $scope.phone = "";
            
            
            $scope.marital_status = "";
            $scope.fathername = "";
            $scope.mothername = "";
          
            $scope.password = "";
            $scope.customer_group = "";
            $scope.successMessage = data.massage;
          

          }

          

      }

       
    });
  };




});
$(document).ready(function(){
  $("#customer_group").on('change',function(){
   var setval= $(this).val();
   
   if(setval=='11')
   {
       $('#showslaesgroup').removeClass('d-none');
       $("#choices-multiple-default").attr("required", "true");

   }
   else
   {
       $('#showslaesgroup').addClass('d-none');
       $("#choices-multiple-default").attr("required", "false");
   }
   
   
  });
  
  
  
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



