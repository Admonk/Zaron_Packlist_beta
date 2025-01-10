<?php  include "header.php"; ?>
<style type="text/css">
    tbody, td, tfoot, th, thead, tr {
    border: #e9e9e9 solid 1px;
    font-size: 11px;
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
                                    <h4 class="mb-sm-0 font-size-18">Vendor List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/vendor/vendor_add">Vendor Form</a></li>
                                            <li class="breadcrumb-item active"> Vendor List</li>
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
                                        <h4 class="card-title">Vendor List Table</h4>
                                        
                    </div>
                  <div class="card-body" >

                       


                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>
                          <th>ID #</th>
                          <th style="width:230px;">Name</th>
                          <th>Email</th>
                          <th>Phone</th>

                          <th>Opening Balance</th>
                          <th></th>

                          
                          <th>Address</th>
                          <th >TCS</th>
                          <th>GST</th>
                          <!--<th>Pin</th>-->
                        
                          <th>Status</th>
                          <th>Commen</th>
                          <th>Action</th>
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          <td>{{name.no}}</td>
                          <td>{{name.name}}</td>
                          <td>{{name.email}}</td>
                          <td>{{name.phone}}</td>
                          
                           <td><input class="form-control" type="number" value="{{name.opening_balance}}" style="width: 150px;"  id="oo_{{name.id}}">
                            </td>
                      
                          
                          
                          <td>
                                     
                                     
                                 
                              
                                 
                             <select  style="width: 70px;margin: 8px 0px;" ng-blur="changepaystatus(name.id)" id="pay_{{name.id}}" >
                                  
                                       
                                        <option value="">Select</option>
                                       <option value="1"  ng-selected="{{name.payment_status == 1}}">CR</option>
                                       <option value="2"  ng-selected="{{name.payment_status == 2}}">DR</option>
                                       
                                 
                                 
                                  
                              </select>
                                 
                                 
                                 
                                 </td>
                          
                          
                          
                          <td>{{name.address}}</td>
                          
                          
                            <td>
                           <select  style="width: 70px;margin: 8px 0px;" ng-model="tcs_status" ng-change="changepaystatusdd_1(name.id)" id="tcs_status_{{name.id}}" >
                                  
                                       
                                        <option value="">Select</option>
                                       <option value="1"  ng-selected="{{name.tcs_status == '1'}}">Active</option>
                                       <option value="0"  ng-selected="{{name.tcs_status == '0'}}">In Active</option>
                                       
                                 
                                 
                                  
                              </select>
                      </td>
                          
                          <td>{{name.gst}}</td>
                          <!--<td>{{name.pin}}</td>-->
                          
                          <td>{{name.status}}</td>
                           <td>
                               
                                 <span ng-if="name.mark_customer_id>0">YES</span>

                           </td>


                          <td style="display: flex;">
                            <a href="<?php echo base_url(); ?>index.php/vendor/vendor_edit/{{name.id}}"    target="_blank"  class="btn btn-outline-primary"><i class="mdi mdi-pencil menu-icon"></i></a>
                       


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

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



 


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/vendor/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };

 
 $scope.changepaystatusdd_1 = function(id){
     
     
     
     var bb=$('#tcs_status_'+id).val();
     
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/vendor/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'tcs_status','tablename':'vendor'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 } 


  $scope.changepaystatus = function(id){
     
     
     
     var bb=$('#pay_'+id).val();
     var obalance=$('#oo_'+id).val();
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/vendor/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'payment_status','obalance':obalance,'tablename':'vendor'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };

$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/vendor/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'vendor'}
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



