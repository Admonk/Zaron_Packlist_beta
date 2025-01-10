<?php  include "header.php"; ?>
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>
















 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        
 <div class="row">
              <div class="col-lg-12">
                <div class="card">

                   
                  <div class="card-body" >



<h4 class="mb-sm-0 font-size-18"><?php echo $_GET['user_name']; ?> <button type="button" ng-click="savePermission('<?php echo $_GET["user_id"]; ?>')" style="float: right;" class="btn btn-outline-success">Save</button></h4>      
<br>
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


                    <div  ng-init="fetchData()">
                
                   <table class="table table-bordered dt-responsive  nowrap w-100" >
                      <thead>
                        <tr>
                          <th>Menu Name</th>
                          <th>Action</th>
                          <td style="display: none;">Edit</td>
                          <td style="display: none;">Delete</td>
                        </tr>
                      </thead>
                      <tbody ng-repeat="name in namesData">
                        <tr >
                         
                           <td><h5>{{name.name}}</h5></td>
                           <td>
                              
                            <h5 ><input type="checkbox" ng-checked="name.checked==1"  ng-click="fetchSingleData(name.id)" name="primary-menu" value="{{name.id}}" class="btn btn-outline-primary primary-menu all_{{name.id}}"> ALL</h5>



                           
                           </td>
                           <td style="display: none;"></td>
                           <td style="display: none;"></td>
                           
                           
                           
                        </tr>
                        
                           <tr ng-repeat="namesvv in name.sub_menu">
       
       <td>  {{namesvv.sub_menu}}  </td>
   
       <td > <input type="checkbox" ng-checked="namesvv.checkedv==1" value="{{namesvv.sub_id}}" name="sub-menu" class="btn btn-outline-primary sub-menu checkgetall_{{namesvv.menu_group_id}}"> </td>
                           
       


         <td style="display: none;">


            <input type="checkbox" ng-checked='namesvv.check_edit==1'   name="check_edit" value="{{namesvv.sub_id}}" class="btn btn-outline-primary primary-menu checkgetall_{{namesvv.menu_group_id}}"> 


        </td>
                          

       <td style="display: none;"><input type="checkbox" ng-checked='namesvv.check_delete==1'  name="check_delete" value="{{namesvv.sub_id}}" class="btn btn-outline-primary primary-menu checkgetall_{{namesvv.menu_group_id}}"> </td>
       
   
   </tr>
                        
                      
                      </tbody>
                    </table>
                 <button type="button" ng-click="savePermission('<?php echo $_GET["user_id"]; ?>')" style="float: right;" class="btn btn-outline-success">Save</button>
                  </div>


<br><br><br>
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
    $http.get('<?php echo base_url() ?>index.php/group/fetch_data_user_group_menu_user?user_id=<?php echo $_GET["user_id"]; ?>').success(function(data){
      $scope.namesData = data;
    });
  };

 
   $scope.fetchSingleData = function(cateid){
      
       if ($('.all_'+cateid).is(':checked'))
       {
           
            $('.checkgetall_'+cateid).prop('checked',true);
        }
        else
        {
            $('.checkgetall_'+cateid).prop('checked',false);
            
        }
      
  };
  $scope.savePermission = function(user_id){
      
      
            var primary_menu_id = [];
      
            $('input[name="primary-menu"]:checked').each(function(){
               
                    primary_menu_id.push($(this).val()); 
                
            });
            
            var primary_menu= primary_menu_id.join("|");
            
            
            
            
            var sub_menu_id = [];
      
            $('input[name="sub-menu"]:checked').each(function(){
               
                    sub_menu_id.push($(this).val()); 
                
            });
            
            var sub_menu= sub_menu_id.join("|");




            var sub_menu_id_check_edit = [];
      
            $('input[name="check_edit"]:checked').each(function(){
               
                    sub_menu_id_check_edit.push($(this).val()); 
                
            });
            
            var check_edit= sub_menu_id_check_edit.join("|");



            var sub_menu_id_check_delete = [];
      
            $('input[name="check_delete"]:checked').each(function(){
               
                    sub_menu_id_check_delete.push($(this).val()); 
                
            });
            
            var check_delete= sub_menu_id_check_delete.join("|");

             
             
            if(sub_menu!="")
            {
                
                    $http({
                      method:"POST",
                      url:"<?php echo base_url() ?>index.php/group/insertandupdate_user",
                      data:{'sub_menu':sub_menu,'check_edit':check_edit,'check_delete':check_delete,'primary_menu':primary_menu,'id':user_id,'action':'menu_save','tablename':'menu_save_user'}
                    }).success(function(data){
                       
                       if(data.error != '1')
                      {
                            $scope.success = true;
                            $scope.error = false;
                           
                            $scope.successMessage = "User Menu Updated successfully "+$scope.submit_button;
                            $scope.fetchData();
                            
                            
                            $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                                    $(".alert-success").slideUp(500);
                                                                                });
                            
                
                      }
                
                
                
                    });
                
            }
            else
            {
                alert("Select Primary Menu Checkbox");
            }
            
            
   
  };





});

</script>
    <?php include ('footer.php'); ?>
</body>


