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
                                    <h4 class="mb-sm-0 font-size-18">Users List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/users/usersindex">Users Create</a></li>
                                            <li class="breadcrumb-item active"> Users List</li>
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



 <?php
if($_GET['group_base']==13)
{
    ?>
    <a href="<?php echo base_url(); ?>index.php/driver/driverview" style="float: right;" class="btn btn-success">Users Create</a>
  
    <?php
    
}
elseif($_GET['group_base']==12)
{
    ?>
    <a href="<?php echo base_url(); ?>index.php/salesteam/sales_team_add" style="float: right;" class="btn btn-success">Users Create</a>
  
    <?php
    
}
elseif($_GET['group_base']==17)
{
    ?>
    <a href="<?php echo base_url(); ?>index.php/salesteamsub/sales_team_sub_add" style="float: right;" class="btn btn-success">Users Create</a>
  
    <?php
    
}
else
{
    ?>
    <a href="<?php echo base_url(); ?>index.php/users/usersindex?sales_head=<?php echo $_GET['group_base']; ?>" style="float: right;" class="btn btn-success">Users Create</a>
  
    <?php
}

?>


                        <br><br>

                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered dt-responsive" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>
                          <th>ID #</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <?php
                          if($_GET['group_base']==11)
                          {
                              ?>
                             <th>Sales Group</th>
                              <?php
                          }
                          ?>
                         
                          <th>Password</th>
                          <th>Access</th>
                          <th>Status</th>
                          <th>Action</th>
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          <td>{{name.no}}</td>
                          <td>{{name.name}}</td>
                          <td>{{name.email}}</td>
                          <td>{{name.phone}}</td>
                           <?php
                          if($_GET['group_base']==11)
                          {
                              ?>
                             <td>{{name.sales_group}}</td>
                              <?php
                          }
                          ?>
                         
                          <td>{{name.org_password}}</td>

                          <td>{{name.access}}</td>
                          <td>{{name.status}}</td>
                          <td style="display:flex;">
                           
                           
                            <?php
                            if($_GET['group_base']==12)
                            {
                                ?>
                                 <a href="<?php echo base_url(); ?>index.php/salesteam/sales_team_edit/{{name.define_salesteam_id}}"  target="_blank" class="btn btn-outline-primary"><i class="mdi mdi-pencil menu-icon"></i></a>
                           
                                <?php
                                
                            }
                            else
                            {
                                ?>
                                <a href="<?php echo base_url(); ?>index.php/users/user_edit/{{name.id}}"  target="_blank" class="btn btn-outline-primary"><i class="mdi mdi-pencil menu-icon"></i></a>
                           
                                <?php
                            }
                            
                            ?>
                           
                           
                           
                           
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

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



  $scope.submit_button = 'Add';


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/users/fetch_data?group_base=<?php echo $_GET['group_base']; ?>').success(function(data){
      $scope.namesData = data;
    });
  };

 
 



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/group/insertandupdate",
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

