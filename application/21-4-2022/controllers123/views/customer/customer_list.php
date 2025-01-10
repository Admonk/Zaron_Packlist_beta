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
                                    <h4 class="mb-sm-0 font-size-18">Customer List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/customer/customer_add">Customer Form</a></li>
                                            <li class="breadcrumb-item active"> Customer List </li>
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
                                        <h4 class="card-title">Customer List Table</h4>
                                        
                    </div>
                    
                    
                                        
                    <div class="col-lg-12">
                         
                         <button type="button" style="float: right;margin: 7px 20px;"  class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Import Customer</button>
                    
                                            
                    </div>  





<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Import Customer</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                         <form enctype='multipart/form-data' action="<?php echo base_url(); ?>customer_import.php" method="POST" >
                                                        <div class="modal-body">
                                                           
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">File:</label>
                                                                    <input type="file" class="form-control" required name="file" id="recipient-name">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="message-text" class="col-form-label">Sample Format : </label>
                                                                    <a href="<?php echo base_url(); ?>Sample_Customer_import.xlsx">Download</a>
                                                                </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="sumnit" class="btn btn-primary">Import</button>
                                                        </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->







                    
                  <div class="card-body" >

                       


                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>
                          <th>ID</th>
                         
                          <th>Company Name</th>
                          <!--<th>Email</th>-->
                          <th>Phone</th>
                          <!--<th>City</th>-->
                          <!--<th>State</th>-->
                          <th>Route</th>
                          <th>Locality</th>
                          <th>GST</th>
                          <!--<th>Pin</th>-->
                          <th>Sales Group</th>
                          <th>Sales Team</th>
                          <th>Status</th>
                          <th>Action</th>
                         
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          
                          
                          <td>{{name.no}}</td>
                          <td>{{name.company_name}}</td>
                          <!--<td>{{name.email}}</td>-->
                          <td>{{name.phone}}</td>
                          <!--<td>{{name.city}}</td>-->
                          <!--<td>{{name.state}}</td>-->
                          <td>{{name.route}}</td>
                          <td>{{name.locality}}</td>
                          <td>{{name.gst}}</td>
                          <!--<td>{{name.pin}}</td>-->
                          <td>{{name.access}}</td>
                          <td>{{name.sales_team_name}}</td>
                          <td>{{name.status}}</td>
                          <td>
                          <button type="button" ng-click="viewAddress(name.id)"  title="View" class="btn btn-outline-primary"><i class="mdi mdi-eye menu-icon"></i></button> 
                          <button type="button" ng-click="addAddress(name.id)"  title="Address Add" class="btn btn-outline-primary"><i class="mdi mdi-plus menu-icon"></i></button>
                          <a href="<?php echo base_url(); ?>index.php/customer/customer_edit/{{name.id}}"  target="_blank" class="btn btn-outline-primary"><i class="mdi mdi-pencil menu-icon"></i></a>
                          <button type="button" ng-click="deleteData(name.id)" class="btn btn-outline-danger"><i class="mdi mdi-delete menu-icon"></i></button>
                          </td>
                          
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












  <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Customer Details</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                              
                                                                <div >
                                                                    
                                                                 <table class="table" ng-init="fetchDataelight()">
                                                                     <tr>
                                                                         <th>Company Name</th>
                                                                         <th>:</th>
                                                                         <td>{{company_name}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <th>Office Contact</th>
                                                                         <th>:</th>
                                                                         <td>{{phone_view}} , {{email}}</td>
                                                                     </tr>
                                                                     
                                                                      <tr>
                                                                         <th>Office Address</th>
                                                                         <th>:</th>
                                                                         <td>{{address_view}}</td>
                                                                     </tr>
                                                                     
                                                                         <tr>
                                                                         <th>Google Location (Lat,Long)</th>
                                                                         <th>:</th>
                                                                         <td>{{google_map_link}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                     <tr>
                                                                         <th>GST</th>
                                                                         <th>:</th>
                                                                         <td>{{gst}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <th>Sales Group</th>
                                                                         <th>:</th>
                                                                         <td>{{sales_group_name}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                     <tr>
                                                                         <th>Feedback</th>
                                                                         <th>:</th>
                                                                         <td><b>{{feedback}}</b> <br> {{feedback_details}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                      <tr>
                                                                         <th>Ratings</th>
                                                                         <th>:</th>
                                                                         <td>
                                                                             
                                                                             <div class="col-sm-6" style="display:none;">
                                                <div class="p-lg-5 p-4 text-center" dir="ltr">
                                                    <h5 class="font-size-15 mb-4">Basic Rater</h5>
                                                    <div id="basic-rater"></div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-sm-6" style="display:none;">
                                                <div class="p-lg-5 p-4 text-center" dir="ltr">
                                                    <h5 class="font-size-15 mb-4">Rater with Step</h5>
                                                    <div id="rater-step"></div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-sm-6" style="display:none;">
                                                <div class="p-lg-5 p-4 text-center" dir="ltr">
                                                    <h5 class="font-size-15 mb-4">Custom Messages</h5>
                                                    <div id="rater-message"></div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-sm-6" style="display:none;">
                                                <div class="p-lg-5 p-4 text-center" dir="ltr">
                                                    <h5 class="font-size-15 mb-4">Example with unlimited number of stars. readOnly option is set to true.</h5>
                                                    <div id="rater-unlimitedstar"></div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                          
                                                    
                                                    <div id="rater-onhover" class="align-middle"></div>
                                                    <span class="ratingnum badge bg-info align-middle ms-2"></span>
                                               
                                            
                                            </td>
                                                                     </tr>
                                                                     
                                                                     
                                                                     <tr>
                                                                         <th>Credit limit</th>
                                                                         <th>:</th>
                                                                         <td>{{credit_limit}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                      
                                                                     <tr>
                                                                         <th>Credit Period</th>
                                                                         <th>:</th>
                                                                         <td>{{credit_period}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                     
                                                                 </table>        
                                                                    
                                                                
                                                                </div>
                                                                
                                                                <div ng-init="fetchDataaddress()">
                                                                
                                                                <table class="table" ng-repeat="names in namesDataaddress">
                                                                    
                                                                     <tr style="background: #f1f1f1;">
                                                                        
                                                                         <td colspan="3" ><label for="set_{{names.id}}" style="cursor: pointer;margin-bottom: 0px;"><b>{{names.no}} .</b>  Address</label>  <button type="button" ng-click="deleteDataaddress(names.id,hidden_id)" style="float:right;" class="btn btn--danger"><i class="mdi mdi-delete menu-icon"></i></button></td>
                                                                     </tr>
                                                                    
                                                                     <tr>
                                                                         <th>Contact Name</th>
                                                                         <th>:</th>
                                                                         <td>{{names.name}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <th>Contact Phone </th>
                                                                         <th>:</th>
                                                                         <td>{{names.phone}} </td>
                                                                     </tr>
                                                                     
                                                                      <tr>
                                                                         <th>Address  </th>
                                                                         <th>:</th>
                                                                         <td>{{names.address}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                      <tr>
                                                                         <th>Google Location (Lat,Long)  </th>
                                                                         <th>:</th>
                                                                         <td>{{names.google_map_link}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                    
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                               
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                
                                                
                                                
                                                
                                                
                                                
                                                
             

  <div class="modal fade" id="exampleModalScrollable1" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Address Add</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
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
                             <input id="landmark" class="form-control" name="landmark"    ng-model="landmark" type="landmark">
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

                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                       
                                                     
                                                                
                                                                
                                                              
                                                                
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="{{submit_button}}">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                               
                                                            </div>
                                                            
                                                               </form>  
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                
                                      
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                

<script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



 


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/customer/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };

 
 



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        $scope.fetchData();
      }); 
    }
};

$scope.deleteDataaddress= function(id,hidden_id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'customers_adddrss'}
      }).success(function(data){
         $scope.fetchDataaddress(hidden_id);
      }); 
    }
};





 $scope.fetchDataelight = function(id){
     
     
     
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'customers'}
    }).success(function(data){

        $scope.name =  data.name;
        $scope.email = data.email;
        $scope.phone_view = data.phone;
        $scope.company_name = data.company_name;
        $scope.gst = data.gst;
        $scope.sales_group = data.sales_group;
        $scope.sales_team_id = data.sales_team_id;
        $scope.hidden_id = data.id;
        
        
        
        $scope.sales_group_name = data.sales_group_name;
        

        $scope.pin = data.pin;
     
        $scope.address_view = data.address;
        $scope.landmark = data.landmark;
        
        
        
        $scope.zone = data.zone;
        $scope.feedback_details = data.feedback_details;
        $scope.feedback = data.feedback_sub;
        $scope.credit_limit = data.credit_limit;
        $scope.credit_period = data.credit_period;
        $scope.ratings = data.ratings+'%';
        
       
        
        $('.star-value').css('background-size','22px;');
        $('.star-value').css('width', $scope.ratings);
        

        $scope.locality = data.locality;


        $scope.city = data.city;
        $scope.state = data.state;
        $scope.landline = data.landline;
        $scope.google_map_link = data.google_map_link;
      


     
    });
     
     
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



$scope.viewAddress = function(id){
    
    
   $('#exampleModalScrollable').modal('toggle');
    
   $scope.fetchDataelight(id);
   $scope.fetchDataaddress(id);
  
    
};

$scope.addAddress = function(id){
    
    
   $('#exampleModalScrollable1').modal('toggle');
    
    $scope.hidden_id = id;
    $scope.submit_button = 'ADD ADDRESS';
};






   $scope.fetchDataaddress = function(id){
      
     $http.get('<?php echo base_url() ?>index.php/customer/fetch_data_address?id='+id).success(function(dataaddress){
      
      
       $scope.namesDataaddress = dataaddress;
      
       
     });
        
   };
   
   
   
   
   
   
   
   
   
   
   
    $scope.success = false;
  $scope.error = false;
   
   
   
   
   
   
   
   
   $scope.submitForm = function(){
      
       var ratings=  $('.ratingnum').text();
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/addressadd",
       data:{'status':'1','zone':$scope.zone,'locality':$scope.locality,'google_map_link':$scope.google_map_link,'phone':$scope.phone,'city':$scope.city,'state':$scope.state,'pincode':$scope.pincode,'landmark':$scope.landmark,'address1':$scope.address1,'address2':$scope.address2,'name':$scope.name,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'customers_adddrss'}
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
              
                        $scope.locality ="";
                        $scope.name ="";
                        $scope.phone = "";
                        $scope.hidden_id = "";
                        $scope.address1 = "";
                        $scope.address2 = "";
                        $scope.landmark = "";
                        $scope.pincode = "";
                        $scope.zone = "";
                        $scope.city = "";
                        $scope.state = "";
                        $scope.google_map_link = "";
                       

                        $scope.success = true;
                        $scope.error = false;
                        $scope.successMessage = data.massage;
            
          

          }

          

      }

       
    });
  };
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   






});

</script>
    <?php include ('footer.php'); ?>
</body>


