<?php  include "header.php"; ?>
<style type="text/css">
  .pristine-error {
    margin-top: 2px;
    color: #ef6767;
    text-align: left;
}
table#datatable {
    font-size: 11px;
}
 .loading {
    text-align: center;
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
                                    <h4 class="mb-sm-0 font-size-18">Vehicle  Form</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Vehicle  Form</li>
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




                          <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Vehicle Owner</label>
                            <div class="col-sm-9">
                            <input id="vehicle_owner" class="form-control" required name="vehicle_owner" ng-model="vehicle_owner"  type="text">
                          <!--  <select class="form-control" name="vehicle_owner"  ng-model="vehicle_owner">

                              <option value=""> Select Name</option>

                              <?php
                                foreach ($v_owners as $v_o) {

                                  ?>
                                       <option value="<?php echo $v_o->id; ?>"><?php echo $v_o->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              </select> -->
 
                            </div>
                          </div>
                        </div>
                      




                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Vehicle Name</label>
                            <div class="col-sm-9">
                              <input id="name" class="form-control" required name="vehicle_name" ng-model="vehicle_name" placeholder="TATA" type="text">
                            </div>
                          </div>
                        </div>


                          <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Vehicle Type</label>
                            <div class="col-sm-9">
                              <input id="name" class="form-control" required name="vehicle_type" ng-model="vehicle_type" placeholder="AUTO" type="text">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Vehicle Number</label>
                            <div class="col-sm-9">
                              <input id="vehicle_number" class="form-control" required name="vehicle_number" ng-model="vehicle_number" placeholder="TN00@000" type="text">
                            </div>
                              <?php
                         $class="";
                        if($this->session->userdata['logged_in']['access']=='12' || $this->session->userdata['logged_in']['access']=='11')
                        {

                         $class="style='display:none;'";


                         ?>

                         <a href="#" id="fill">Fill additional details</a>

                         <?php
                        }


                        ?>
                          </div>
                        </div>
                      

                        <div class="row" id="setshow" <?php echo $class; ?> > 
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Purchased Date</label>
                            <div class="col-sm-9">
                              <input id="purchased_date" class="form-control"  name="purchased_date" ng-model="purchased_date" type="date">
                            </div>
                          </div>
                        </div>


                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Insurance Date</label>
                            <div class="col-sm-9">
                              <input id="insurance_date" class="form-control"  name="insurance_date" ng-model="insurance_date" type="date">
                            </div>
                          </div>
                        </div>



                       

                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Fc Date</label>
                            <div class="col-sm-9">
                              <input id="fc_date" class="form-control" name="fc_date" ng-model="fc_date" type="date">
                            </div>
                          </div>
                        </div>


                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">National Permit Date</label>
                            <div class="col-sm-9">
                              <input id="national_permit_date" class="form-control" name="national_permit_date" ng-model="national_permit_date" type="date">
                            </div>
                          </div>
                        </div>


                           <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Pollution Date</label>
                            <div class="col-sm-9">
                              <input id="pollution_date" class="form-control" name="pollution_date" ng-model="pollution_date" type="date">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">State tax</label>
                            <div class="col-sm-9">
                              <input id="state_tax" class="form-control" name="state_tax" ng-model="state_tax" type="text" placeholder="2000">
                            </div>
                          </div>
                        </div>


                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Road Tax</label>
                            <div class="col-sm-9">
                              <input id="road_tax" class="form-control" name="road_tax" ng-model="road_tax" type="text" placeholder="2000">
                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Route</label>
                            <div class="col-sm-9">
                            
                           <select class="form-control" name="route_id"  ng-model="route_id">

                              <option value=""> Select Route</option>

                              <?php
                                foreach ($route as $value) {

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





                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <div class="col-sm-9">
                             <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                       <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="{{submit_button}}">

                            </div>
                          </div>
                        </div>


                        </div>


                      
                    
                    </form>





<hr></hr>
<h4 class="mb-sm-0 font-size-18">Vehicle Table List</h4>      
<br>
                       

  <input type="hidden" id="nextnumber" value="0">   
                                                            <input type="hidden" id="prenumber" value="10">  
                                                            <input type="hidden" id="pageSize" value="10">  
                                                            <input type="hidden" id="order_base" value="0">
                    <div  >


                         <div class="row" style="margin-bottom: 10px;">                                    
                            <div class="col-sm-3">
                            <div class="dataTables_length" id="example_length">
                                <label>
                                    Records
                                <select name="example_length" aria-controls="example" class="form-control input-sm" ng-model="pageSize" ng-change="pageSizeChanged()">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="1000">1000</option>
                                </select> </label>
                            </div>
                         </div>
                           <div class="col-sm-3">
                        
                          </div>
                          
                           <div class="col-sm-3">
                         
                           </div>
                           
                          <div class="col-sm-3">
                        <div id="example_filter" class="dataTables_filter">
                            <label>Search:</label><input type="search" class="form-control input-sm" placeholder="Search" aria-controls="example" ng-model="searchText" ng-change="searchTextChanged()">
                        </div> 
                    </div>
                       </div>
                
                   <table id="datatable" class="table table-bordered"  >
                      <thead>
                        <tr>


                           <th>ID #</th>
                           <th>Owner Name </th>
                           <th>Vehicle </th>
                           <th>Type </th>
                           <th>Number</th>
                           <th>Route</th>
                          <!--  <th>Purchased_Date</th> -->
                          <!--  <th>Insurance_Date</th>
                           <th>FC_Date</th>
                           <th>N_Permit_Date</th>
                           <th>Pollution_Date</th>
                           <th>State_Tax</th>
                           <th>Road_Tax</th> -->
                           
                                 
                           <th>Approved_Status</th>
                           
                           <th>Created_By</th>
                           <th>Approved / Un-Approved </th>

                           <?php
                           if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='15' || $this->session->userdata['logged_in']['access']=='6')
                        {

                              ?>
                                      <th>Action</th>
                              <?php
                        }
                           ?>

                         
            
                        </tr>
                      </thead>
                      <tbody>
                         <tr class="setload" ><td colspan="8"><loading></loading></td></tr>
                        <tr ng-repeat="name in namesData">
                          <td>{{name.id}}</td>
                          <td>{{name.vehicle_owner}}</td>
                          <td>{{name.vehicle_name}}</td>
                           <td>{{name.vehicle_type}}</td>
                          <td>{{name.vehicle_number}}</td>
                          <td>{{name.routename}}</td>
                         <!--  <td>{{name.purchased_date}}</td> -->
                         <!--  <td>{{name.insurance_date}}</td>
                          <td>{{name.fc_date}}</td>
                          <td>{{name.national_permit_date}}</td>
                          <td>{{name.pollution_date}}</td>
                          <td>{{name.state_tax}}</td>
                          <td>{{name.road_tax}}</td> -->


                          
                          
                            <td >
                           <?php
                           if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='15')
                           {
                           ?>
                          
                            
 <select  style="width: 100px;margin: 8px 0px;" ng-model="name.approved_status" ng-change="changepaystatusdd_1(name.v_id)" id="approved_status{{name.v_id}}" >
                                  
                        
                                       <option value="2"  ng-selected="{{name.approved_status == '2'}}">Approved</option>
                                     
                          
                                       <option value="0"   ng-selected="{{name.approved_status == '0'}}">Un Approved</option>

                            
                                 
                                  
                              </select>

                          
                          <?php
                           }
                           elseif($this->session->userdata['logged_in']['access']=='12')
                           {
                           ?>
                          <span ng-if="name.approved_status == '2'">Approved</span>
                          <span ng-if="name.approved_status == '0'">Un-Approved</span>
                            
                          <?php
                           }
                           else
                           {
                            ?>
                            <span  ng-if="name.approved_status == '0'" >
                            <select  style="width: 100px;margin: 8px 0px;" ng-model="name.approved_status" ng-change="changepaystatusdd_1(name.v_id)" id="approved_status{{name.v_id}}" >
                                  
                         
                                       <option value="2"  ng-selected="{{name.approved_status == '2'}}">Approved</option>
                                     
                                 
                                  
                              </select>
                            </span>

                            <span ng-if="name.approved_status == '2'">Approved</span>
                                     

                            <?php
                           }
                           ?>
                           </td>
                           <td>{{name.username}}</td>
                        
                            <td>{{name.approved_by}}</td>
                        
                           <?php
                       
                           if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='15' || $this->session->userdata['logged_in']['access']=='6')
                        {


                              ?>
                          <td style="display: flex;">
                            <button type="button" ng-click="fetchSingleData(name.v_id)" class="btn btn-outline-primary"><i class="mdi mdi-pencil menu-icon"></i></button>
                           

                           <?php

                           if($this->session->userdata['logged_in']['access']=='15' || $this->session->userdata['logged_in']['access']=='6')
                           {


                           }
                           else
                           {
                            ?>
<button type="button" ng-click="deleteData(name.v_id)" class="btn btn-outline-danger"><i class="mdi mdi-delete menu-icon"></i></button>

                            <?php
                           }
                           ?>

                           </td>
                            <?php
                        }
                           ?>
                        </tr>
                        
                      
                      </tbody>
                    </table>
                     <div class="row" style="margin-top: 10px;">
                                                               <div class="col-md-6">
                                                                    <div class="dataTables_length" ole="alert" aria-live="polite" aria-relevant="all">Showing <b>{{startItem}}</b> to <b>{{endItem}}</b> of <b>{{totalItems}}</b> entries   </div>
                     
                                                               </div>
                                                               
                                                               <div class="col-md-6">
                                                                    <div class="dataTables_length" style="float: right;" ole="alert" aria-live="polite" aria-relevant="all"><button type="button" class="btn btn-outline-primary" ng-Click="onPre(1,10)">PRE</button><button type="button" class="btn btn-outline-primary" ng-Click="onNext(1,10)">NEXT</button></div>
                     
                                                               </div>
                                                               
                                                           </div>
                                                           
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




$('.form-control').on('input', function()
{

                
                 var inputValue = $(this).val();
                 var uppercaseValue = inputValue.toUpperCase();
                 $(this).val(uppercaseValue);


                 const sectionId = $(this).data('section');
                 updateProgress(sectionId);



 });

  
});
</script>

<script>

var app = angular.module('crudApp', ['datatables']);

app.directive('loading', function () {
      return {
        restrict: 'E',
        replace:true,
        template: '<div class="loading"><img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" width="20" height="20" /> LOADING...</div>',
        link: function (scope, element, attr) {
              scope.$watch('loading', function (val) {
                  if (val)
                      $(element).show();
                  else
                      $(element).hide();
              });
        }
      }
})

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



  $scope.submit_button = 'Add';


   $scope.approved_status = '0';

    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    
    $scope.tablename='vehicle';
    getData();




   function getData() {
       
      var order_base = $('#order_base').val();
      var from_date = '';
      var to_date = '';
      
      $scope.loading = true;
       $http.get('<?php echo base_url() ?>index.php/vehicle/fetch_data_sales_group?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date)
        .success(function(data) {
            $scope.namesData = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = ($scope.currentPage - 1) * $scope.pageSize + 1;
            $scope.endItem = $scope.currentPage * $scope.pageSize;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
            //   console.log(temp.order_no)
            //   var order_split=temp.order_no.split('/');
            //  order_split[0]=order_split[0]+'/E/O'
            //   temp.order_no=order_split.toString().replace(/,/g,'/')
            //   console.log(temp)
                $scope.namesData.push(temp);
                
                
            });

            $scope.loading = false;
        });
        
       
    }

       function getDataPage(currentPage,pageSize) {
         
          $scope.loading = true;
         
        $scope.tablename='vehicle';
        var order_base = $('#order_base').val();

      var from_date = '';
      var to_date = '';
      
        
        $http.get('<?php echo base_url() ?>index.php/vehicle/fetch_data_sales_group?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date)
        .success(function(data) {
            $scope.namesData = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = currentPage-pageSize+1;
            $scope.endItem = currentPage;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
                $scope.namesData.push(temp);
                
                
            });
             $scope.loading = false;
        });
        
        
        
        
        
        
    }



 
  $scope.pageChanged = function() {
        getData();
    }
    $scope.pageSizeChanged = function() {
        
        $scope.currentPage = 1;
        
        $('#pageSize').val($scope.pageSize);
        
        getData();
        
        
        
    }
    $scope.searchTextChanged = function() {
        $scope.currentPage = 1;
        getData();
    }
    
    
     $scope.pageTab = function(tabelename,status){
    
    
      $('#order_base').val(status);
      $scope.currentPage = 1;
      getData();
      

    
};
 
 
 
$scope.onNext = function(currentPage,pageSize){
     
     
      var nextnumber= parseInt($('#nextnumber').val());
      var pageSize= parseInt($('#pageSize').val());
     
      var currentPage=nextnumber+pageSize;
      
       $('#nextnumber').val(currentPage);
       $('#prenumber').val(currentPage);
      
      getDataPage(currentPage,pageSize);
      
      
 };



$scope.onPre = function(currentPage,pageSize){
     
     
      var nextnumber= parseInt($('#prenumber').val());
      var pageSize= parseInt($('#pageSize').val());
      var currentPage=nextnumber-pageSize;
      
       $('#prenumber').val(currentPage);
       $('#nextnumber').val(currentPage);
       getDataPage(currentPage,pageSize);
      
      
 };


    

 
 
  $scope.submitForm = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/vehicle/insertandupdate",
      data:{
        'vehicle_name':$scope.vehicle_name,
        'vehicle_owner':$scope.vehicle_owner,
        'vehicle_number':$scope.vehicle_number,
        'vehicle_type':$scope.vehicle_type,
        'purchased_date':$scope.purchased_date,
        'insurance_date':$scope.insurance_date,
        'route_id':$scope.route_id,
        'national_permit_date':$scope.national_permit_date,
        'pollution_date':$scope.pollution_date,
        'fc_date':$scope.fc_date,
        'state_tax':$scope.state_tax,
        'road_tax':$scope.road_tax,
        'status':'1',
        'id':$scope.hidden_id,
        'action':$scope.submit_button,
        'tablename':'vehicle'
      }
    }).success(function(data){
       
      if(data.error != '1')
      {
        $scope.success = true;
        $scope.error = false;
        $scope.vehicle_name = "";
        $scope.vehicle_number = "";
        $scope.vehicle_type = "";
        $scope.purchased_date = "";
        $scope.route_id = "";
        $scope.insurance_date = "";
        $scope.national_permit_date = "";
        $scope.pollution_date = "";
        $scope.state_tax = "";
        $scope.road_tax = "";
        $scope.fc_date = "";
        $scope.hidden_id = "";
        $scope.successMessage = "Vehicle successfully "+$scope.submit_button;
        getData();
        
        
        
         $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
        
        
        
        
        
        
        
        
      }



    });
  };


$scope.fetchSingleData = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/vehicle/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'vehicle'}
    }).success(function(data){

          $scope.vehicle_name = data.vehicle_name;
          $scope.vehicle_owner = data.vehicle_owner;

          
          $scope.vehicle_number = data.vehicle_number;
          $scope.vehicle_type = data.vehicle_type;
          
          $scope.purchased_date = new Date(data.purchased_date);
          $scope.insurance_date = new Date(data.insurance_date);
          $scope.national_permit_date = new Date(data.national_permit_date);
          $scope.fc_date = new Date(data.fc_date);
          $scope.route_id = data.route_id;
          $scope.pollution_date = new Date(data.pollution_date);
          $scope.state_tax = data.state_tax;
          $scope.road_tax = data.road_tax;


          $scope.hidden_id = id;
          $scope.submit_button = 'Update';
     
    });
};


  $scope.changepaystatusdd_1 = function(id){
     
     
     
     var bb=$('#approved_status'+id).val();
     
     

  
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/vehicle/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'approved_status','tablename':'vehicle'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
    // keepGoing = false;
     
 }



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/sales/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'vehicle'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        getData();
      }); 
    }
};




});
$(document).ready(function(){
$('#fill').on('click',function(){

 $('#setshow').toggle();

 $('#setshow').removeClass('d-none');


});
});
</script>
    <?php include ('footer.php'); ?>
</body>



