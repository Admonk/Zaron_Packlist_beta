<?php  include "header.php"; ?>
<body ng-app="crudApp" ng-controller="crudController">

    <div class="container-scroller">
     <?php echo $top_nav; ?>
     <div class="container-fluid page-body-wrapper">
   
     <?php echo $side_nav; ?>
       
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Ticket  List   </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Ticket List</li>
                </ol>
              </nav>
            </div>
         
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body" >

        




                <h4 class="card-title">Ticket List table</h4>
                <div class="row" >
                  <div class="col-12" ng-init="fetchData()">
                    <table id="order-listing"  datatable="ng" dt-options="vm.dtOptions" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Ticlet ID #</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Priority</th>
                          <th>Create Date</th>
                       
                          <th>Status</th>
                          <th>Action</th>
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          <td>{{name.ticket_id}}</td>
                          <td>{{name.title}}</td>
                          <td>{{name.category}}</td>
                          <td>{{name.priority}}</td>
                          <td>{{name.create_date}}</td>
                        
                          <td>{{name.status}}</td>
                          <td>
                            <a href="<?php echo base_url(); ?>index.php/ticket/ticket_view/{{name.id}}"  class="btn btn-outline-primary">ViEW</a>
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
    $http.get('<?php echo base_url() ?>index.php/ticket/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };

 
 



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/ticket/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'admin_users'}
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


