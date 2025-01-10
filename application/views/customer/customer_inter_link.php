<?php  include "header.php"; ?>
<style>
    form#pristine-valid-common {
    margin-bottom: 20px;
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
                                    <h4 class="mb-sm-0 font-size-18">Customer Inter Link </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Customer Inter Link </li>
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

                    <form id="pristine-valid-common" ng-submit="submitForm()" method="post" >
                      

                          <div class="row">
                      

                        
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Customer From  <span style="color:red;">*</span></label>
                            <div class="col-sm-8">
                              <input id="name1" class="form-control" name="name1" ng-keyup="completeCustomer1()" required ng-model="name" type="text">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Customer To <span style="color:red;">*</span></label>
                            <div class="col-sm-8">
                              <input id="name2" class="form-control" name="name2" ng-keyup="completeCustomer2()" required ng-model="phone" type="text">
                            </div>
                          </div>
                        </div>


                           <div class="col-md-4">
                          <div class="form-group row">
                          
                            <div class="col-sm-9">
                             
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="{{submit_button}}">


                            </div>
                          </div>
                        </div>

                        </div>
                        

                        


                    </form>

                


                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>


                          <th>ID #</th>
                          
                           <th>Customer From</th>
                           <th>Customer To</th>
                           <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          <td>{{name.no}}</td>
                          <td>{{name.customer_from_name}}</td>
                          <td>{{name.customer_to_name}}</td>
                         <td>
                            
                           <button type="button" ng-click="deleteData(name.id)" class="btn btn-outline-danger"><i class="mdi mdi-delete menu-icon"></i></button></td>
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
  $(".clickshow").click(function(){
   $('#pristine-valid-common').toggle();
  });
});
</script>
<script>

var app = angular.module('crudApp', ['datatables']);

app.directive('autoComplete', function($timeout) {
    return function(scope, iElement, iAttrs) {
            iElement.autocomplete({
                source: scope[iAttrs.uiItems],
                select: function() {
                    $timeout(function() {
                      iElement.trigger('input');
                    }, 0);
                }
            });
        };
    });

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;
$scope.account_heads_id= 52;

$scope.pin = '<?php echo substr(time(), 4); ?>';
  $scope.submit_button = 'Add';


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/customer/fetch_data_inter_link').success(function(data){
      $scope.namesData = data;
    });
  };

 
 
$scope.submitForm = function(){

   var  name1=$('#name1').val();
    var  name2=$('#name2').val();


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/customerlink",
      data:{'name1':name1,'name2':name2,}
    }).success(function(data){
       
      if(data.error != '1')
      {
        $scope.success = true;
        $scope.error = false;
       $scope.successMessage = "Linked successfully "+$scope.submit_button;
       
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


 
$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/driver/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'customer_inter_link'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        $scope.fetchData();
      }); 
    }
};

     $scope.completeCustomer1=function(){
       
        
      
        var search=  $('#name1').val();
         
      
        
        $( "#name1" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':1}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 
    
    
    
    
    
     $scope.completeCustomer2=function(){
       
        
      
        var search=  $('#name2').val();
        
          
        
        $( "#name2" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':1}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 
    


});

</script>
    <?php include ('footer.php'); ?>
</body>


