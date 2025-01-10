<?php  include "header.php"; ?>
<body ng-app="crudApp" ng-controller="crudController">

    <div class="container-scroller">
     <?php echo $top_nav; ?>
     <div class="container-fluid page-body-wrapper">
   
     <?php echo $side_nav; ?>
       
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Route Group Form  </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Route Group</li>
                </ol>
              </nav>
            </div>
         
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body" >

      <div class="alert alert-success alert-dismissible" ng-show="success" >
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{successMessage}}
      </div>
                    
                    <form class="cmxform" id="formnames" ng-submit="submitForm()" method="post">
                      <fieldset>



                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Route name</label>
                            <div class="col-sm-9">
                              <input id="name" class="form-control"  ng-model="name" name="name" type="text">

                            </div>
                          </div>
                        </div>

                           <div class="col-md-6">
                          <div class="form-group row">
                          
                            <div class="col-sm-9">
                                <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                             <input class="btn btn-primary" type="submit" value="{{submit_button}}">

                            </div>
                          </div>
                        </div>

                      </div>
                        





                        
                      
                      
                      </fieldset>
                    </form>










                <h4 class="card-title">Route  table</h4>
                <div class="row" >
                  <div class="col-12" ng-init="fetchData()">
                    <table id="order-listing"  datatable="ng" dt-options="vm.dtOptions" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID #</th>
                          <th>Route Name</th>
                         
                          <th>Action</th>
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          <td>{{name.id}}</td>
                          <td>{{name.name}}</td>
                         
                          <td>
                            <button type="button" ng-click="fetchSingleData(name.id)" class="btn btn-outline-primary">Edit</button>
                           <button type="button" ng-click="deleteData(name.id)" class="btn btn-outline-danger">Delete</button></td>
                        </tr>
                        
                      
                      </tbody>
                    </table>
                  </div>
                </div>








                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
            <?php include('footer_copyrights.php'); ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
   
  
<script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



  $scope.submit_button = 'Add';


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/group/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };

 
 
  $scope.submitForm = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/group/insertandupdate",
      data:{'name':$scope.name,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'route'}
    }).success(function(data){

      if(data.error != '1')
      {
        $scope.success = true;
        $scope.error = false;
        $scope.name = "";
        $scope.hidden_id = "";
        $scope.successMessage = "Route name successfully "+$scope.submit_button;
        $scope.fetchData();
      }

    });
  };


$scope.fetchSingleData = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/group/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'route'}
    }).success(function(data){
      $scope.name = data.name;
      $scope.hidden_id = id;
      $scope.submit_button = 'Update';
     
    });
};



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/group/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'route'}
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


