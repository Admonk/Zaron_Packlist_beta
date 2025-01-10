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
                                    <h4 class="mb-sm-0 font-size-18">Sub Group</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Sub Group Form</li>
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


<h4 class="mb-sm-0 font-size-18">Opening Balance Settings</h4>      
<br>
                       


                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>


                        
                       
                           
                          <th style="width: 100px;">Sub Account Name</th>
                         
                          <th style="width: 550px;">Opening Balance <b>0</b> ON </th>
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                         
                        
                            
                            <td>{{name.name}}</td>
                          <td>


                                                              <div class="form-check form-switch pointer-hover">
                                                                   
                                                            
            <input class="form-check-input pointer-hover" style="width: 45px;margin-left: -2.5em;height: 25px;" type="checkbox" role="switch"  ng-checked="{{ name.opeing_balance_status == 1 }}" value="{{name.opeing_balance_status}}" id="active_{{name.id}}" ng-click="clickActive(name.id)">

                                                                </div>

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

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



  $scope.submit_button = 'Add';


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/accountheads_sub/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };

 
 
  $scope.submitForm = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/accountheads_sub/insertandupdate",
      data:{'name':$scope.name,'balance':$scope.balance,'spilt_status':$scope.spilt_status,'account_type':$scope.account_type,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'accountheads_sub_group'}
    }).success(function(data){
       
      if(data.error != '1')
      {
        $scope.success = true;
        $scope.error = false;
        $scope.name = "";
        $scope.hidden_id = "";
        $scope.successMessage = "Account Type name successfully "+$scope.submit_button;
        
        
         $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
        
        
        $scope.fetchData();
      }



    });
  };


$scope.fetchSingleData = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/accountheads_sub/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'accountheads_sub_group'}
    }).success(function(data){
      $scope.name = data.name;
      
       $scope.spilt_status = data.spilt_status;
       
         $scope.account_type = data.account_type;
         $scope.balance = data.balance;
      
      $scope.hidden_id = id;
      $scope.submit_button = 'Update';
     
    });
};



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/accountheads_sub/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'accountheads_sub_group'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        $scope.fetchData();
      }); 
    }
};
$scope.clickActive = function(id){
    

        if($('#active_'+id).is(':checked'))
        {

            var status=1;

        }
        else
        {
             var status=0;
        }


         $http({
            method:"POST",
            url:"<?php echo base_url() ?>index.php/accountheads_sub/insertandupdate",
            data:{'id':id,'status':status,'field':'opeing_balance_status', 'action':'Activestatus','tablename':'accountheads_sub_group'}
          }).success(function(data){
           
          });
      
    
};



});

</script>
    <?php include ('footer.php'); ?>
</body>


