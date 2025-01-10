<?php  include "header.php"; ?>
<style>
.form-group.row {
   
    margin-bottom: 10px;
}
</style>
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>











<?php
$groupingset=0;
if(isset($_GET['grouping']))
{
    $groupingset=$_GET['grouping'];
}

?>




 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Additional information Form</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Additional information Form</li>
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

                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Lable name <small style="color:red;">(No Space OR Use Space to _ ) ( Don't use DOT. )</small></label>
                            <div class="col-sm-7">
                              <input id="name" class="form-control" required  ng-model="label_name" placeholder="name_value" name="label_name" type="text">

                            </div>
                          </div>
                        </div>
                        
                        
                          <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Type</label>
                            <div class="col-sm-7">
                            
                              <select class="form-control typeset" required  ng-model="type">
                                  <option value=""> Select Type</option>
                                  <option value="Input Open field">Input Open field</option>
                                  <option value="Multiple Options">Multiple Options</option>
                                  <option value="Date">Date</option>
                              </select>

                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-6" id="optionset" style="display:none;">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Maulti Option <small>Input value with (,)</small></label>
                            <div class="col-sm-7">
                                
                                <textarea rows="4" class="form-control" ng-model="option" name="option"></textarea>
                             

                            </div>
                          </div>
                        </div>
                        
                            <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Required Type</label>
                            <div class="col-sm-7">
                            
                              <select class="form-control required" required  ng-model="required">
                                
                                  <option value="0">Not Required</option>
                                  <option value="1">Required</option>
                                  
                              </select>

                            </div>
                          </div>
                        </div>
                        
                                  <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Sort Order</label>
                            <div class="col-sm-7">
                              <input id="name" class="form-control"   ng-model="sort_order_id" placeholder="sort_order_id" name="sort_order_id" type="text">

                            </div>
                          </div>
                        </div>

                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Grouping</label>
                            <div class="col-sm-7">
                            
                              <select class="form-control" required id="Grouping" ng-model="grouping">
                                  <option value=""> Select Grouping</option>
                                  <?php 
                                  foreach($grouping as $val)
                                  {  
                                     
                                          
                                      if($groupingset==$val->id)
                                      {
                                          ?>
                                            <option value="<?php echo $val->id; ?>"> <?php echo $val->name; ?></option> 
                                          <?php
                                      }
                                      if($groupingset==0)
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
                        
                          <div class="col-md-6" id="setshow" style="display:none;">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">If Categories </label>
                            <div class="col-sm-7">
                               <select class="form-control category_id"  name="category_id"  ng-model="category_id">

                              <option value=""> Select Categories</option>

                              <?php
                                foreach ($Categories as $value) {

                                  ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->categories; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>

                         <div class="col-md-6" id="setshow1" style="display:none;">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Heading </label>
                            <div class="col-sm-7">
                               <select class="form-control heading"  name="heading"  ng-model="heading">

                              <option value=""> Select heading</option>

                            
                               <option value="CUSTOMER DETAILS">CUSTOMER DETAILS</option>
                               <option value="CUSTOMER ADDITIONAL DETAILS">CUSTOMER ADDITIONAL DETAILS</option>
                               <option value="TAX DETAILS">TAX DETAILS</option>
                               <option value="E-WAY BILLING DETAILS">E-WAY BILLING DETAILS</option>
                               <option value="BANK DETAILS">BANK DETAILS</option>
                               <option value="CUSTOMER PREFERENCE">CUSTOMER PREFERENCE</option>
                               <option value="CUSTOMER FEEDBACK">CUSTOMER FEEDBACK</option>
                               <option value="CREDIT DETAILS">CREDIT DETAILS</option>
                               <option value="FAMILY DETAILS">FAMILY DETAILS</option>
                               <option value="OTHERS">OTHERS</option>
                              

                              

                              </select>
                            </div>
                          </div>
                        </div>

                        

                       <div class="col-md-6">
                          <div class="form-group row">
                          
                            <div class="col-sm-3">
                                 <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                         <input class="btn btn-success w-lg waves-effect waves-light" style="float: right;" type="submit" value="{{submit_button}}">

                            </div>
                          </div>
                        </div>
</div>
                        



            
                      
                      
                    
                    </form>





<hr></hr>
               


                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>


                         <th>ID #</th>
                         <th>Lable Name</th>
                         <th>Product_Category</th>
                         <th>Type</th>
                         <!--<th style="width:150px;">Options</th>-->
                         <th>Group</th>
                         <th>Required</th>
                         <th>Sort Order</th>
                         <th>Action</th>
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          <td>{{name.no}}</td>
                          <td>{{name.label_name}}</td>
                          <td>{{name.category}}</td>
                          <td>{{name.type}}</td>
                          <!--<td>{{name.option}}</td>-->
                          <td>{{name.grouping}}</td>
                          
                          <td>{{name.required}}</td>
                          <td>{{name.sort_order_id}}</td>
                         
                          <td style="display: flex;">
                         

                            <button type="button" ng-click="fetchSingleData(name.id)" class="btn btn-outline-primary">Edit</button>
                         

                          


                        <?php
                        // Shop Team
                        $usergroup=array(1,2); 
                        if(in_array($this->session->userdata['logged_in']['access'],$usergroup))
                        {
                                                        
                        ?> 

                           <button type="button" ng-click="deleteData(name.id)" class="btn btn-outline-danger"><i class="mdi mdi-delete menu-icon"></i></button>

                           
                        <?php
                        }
                        ?>


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


<script>
$(document).ready(function(){
  $("#Grouping").change(function(){
   
   var a= $(this).val();
   
   if(a=='1')
   {     
       $('#setshow').show();
       $('#setshow1').hide();
       
   }
   else if(a=='3')
   {     
       $('#setshow1').show();
        $('#setshow').hide();
       
   }
   else
   {
        $('#setshow').hide();
        $('#setshow1').hide();
   }
    
    
  });

});

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;

 $scope.required = 0;
  $scope.sort_order_id = 0;

  $scope.submit_button = 'Add';


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/additional_information/fetch_data?grouping=<?php echo $groupingset; ?>').success(function(data){
      $scope.namesData = data;
    });
  };

 
 
  $scope.submitForm = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/additional_information/insertandupdate",
      data:{'label_name':$scope.label_name,'type':$scope.type,'heading':$scope.heading,'option':$scope.option,'sort_order_id':$scope.sort_order_id,'category_id':$scope.category_id,'required':$scope.required,'grouping':$scope.grouping,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'additional_information'}
    }).success(function(data){
       
      if(data.error != '1')
      {
        $scope.success = true;
        $scope.error = false;
        $scope.label_name = "";
        $scope.option = "";
        $scope.hidden_id = "";
        $scope.successMessage = "Data successfully "+$scope.submit_button;
        
        
        $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
        
        
        
        $scope.fetchData();
        $('#optionset').hide();
        $scope.submit_button = 'Add';
        
      }



    });
  };


$scope.fetchSingleData = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/additional_information/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'additional_information'}
    }).success(function(data){
       $scope.label_name = data.label_name;
       $scope.type = data.type;
       
       if(data.type=='Multiple Options')
       {
            $('#optionset').show();
       }
       
         if(data.grouping==1)
         {
              $('#setshow').show();
                $scope.category_id = data.category_id;
         }
       
         if(data.grouping==3)
         {
           $('#setshow1').show();
         }

          $scope.sort_order_id = data.sort_order_id;
          $scope.required = data.required;
       
       $scope.option = data.option;
        $scope.heading = data.heading;
       $scope.grouping = data.grouping;
       $scope.hidden_id = id;
       $scope.submit_button = 'Update';
     
    });
};



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/additional_information/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'additional_information'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        $scope.fetchData();
      }); 
    }
};




});


$(document).ready(function(){
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
  
    $("#name").on('input',function(){
  
      $(this).val($(this).val().replace(/\s/g, ""));
    
  });
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>


