<?php 
include "table_header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
.flex-grow-overflow-hidden {
    width: 100%;
}  
label {
    width: 100%;
}
.midtext{
    background: #ee5c17;
    color: #fff;
    padding: 3px 4px;
    border-radius: 11px;
    margin: 0px 6px;
    font-size: 8px;
}
.activess {
    background: aliceblue;
}
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     
     <?php echo $top_nav; ?>
     
     
     <div class="main-content">
            <div class="page-content pe-0 ps-0 pb-0">
               <div class="flex-row-grow">
                   
                   
                  <div class="col-md-3">
                     <div class="route-sidebar w-100" style="min-width: unset;">  
                           <div class="px-3">
                              <h5 class="font-size-14 mb-3">Routes <!--<span class="route-count float-end">(8)</span>--></h5>
                           </div>
                           
                           
                           <div class="search-box position-relative">
                                        <input type="text" class="form-control rounded border" placeholder="Search Vehicle..." ng-model="queryvv[queryByvv]">
                                        <i class="bx bx-search search-icon"></i>
                           </div> 
                           
                           <ul class="list-unstyled chat-list" ng-init="fetchRoute()" >
                              
                                <li  ng-repeat="names in namesRoute | filter:queryvv"  ng-class="{activess : activeMenur === names.name}" ng-click="routeOrder(names.id,names.name)">
                                    <a href="#">
                                        <div class="d-flex align-items-start">
                                            
                                            <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                <i class="mdi mdi-google-maps font-size-24"></i>
                                            </div>
                                            
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-13 mb-1">{{names.name}}</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <span class="badge bg-success rounded-pill">{{names.count}}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                               
                           </ul>
                     </div>
                  </div>
                  
                  <input type="hidden" id="r_id">

                  <div class="col-md-3">
                     <div class="tripset-sidebar w-100 ms-1" style="min-width: unset;">  
                        <div class="row">
                           <div class="col-12">
                              <div class="px-3">
                              <h5 class="font-size-14 mb-3">Unassign Orders <b style="color:#ff5e14;float:right;">{{route_name}}</b></h5>
                           </div>
                           
                           
                            <div class="search-box position-relative">
                                        <input type="text" class="form-control rounded border" placeholder="Search Vehicle..." ng-model="queryvvv[queryByvvv]">
                                        <i class="bx bx-search search-icon"></i>
                           </div> 
                         
                           <ul class="list-unstyled chat-list" ng-init="fetchRouteorder('orders_process',2,0)">
                                
                                
                                <li ng-repeat="names in namesData | filter:queryvvv"  >
                                   
                                        <div class="d-flex align-items-start">
                                            <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                <input type="text" ng-model="names.no" class="sortingInput">
                                               
                                            </div>
                                            
                                            
                                            <div class="flex-grow-overflow-hidden" >
                                                <label for="{{names.id}}_data" style="cursor: pointer;">
                                                
                                                <h5 class="text-truncate font-size-13 mb-1">{{names.order_no}}</h5>
                                                <p class="text-truncate mb-0">{{names.name}}</p>
                                                <p class="text-truncate mb-0">{{names.phone}}</p>
                                                <small class="text-truncate mb-0"><b>Route Name: {{names.route_names_val}}</b></small>
                                                <small class="text-truncate mb-0 midtext" style="text-transform: capitalize;">{{names.delivery_mode}} delivery</small>
                                                 <input type="checkbox" class="orderid" id="{{names.id}}_data" value="{{names.id}}" style="float: right;width: 15px;height: 15px;">
                                                </label>
                                               
                                                <a href="<?php echo base_url(); ?>index.php/order/overviewtrans?order_id={{names.id}}&old_tablename=<?php echo 'orders_process'; ?>&old_tablename_sub=<?php echo 'order_product_list_process'; ?>&tablename=<?php echo 'orders_process'; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&movetablename=<?php echo 'orders_process'; ?>&movetablename_sub=<?php echo 'order_product_list_process'; ?>" target="_blank" class="font-size-12 mb-3" style="cursor: pointer;"  ><i class="mdi mdi-arrow-right text-primary me-1"></i> View</a>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="font-size-11">{{names.create_date}}</div>
                                                
                                            </div>
                                            
                                        </div>
                                    
                                </li>
                               
                                
                           </ul>
                           
                           
                           
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  
                  <div class="col-md-2">
                      <div class="tripset-sidebar w-100 ms-1" style="min-width: unset;background: #ffeee6;">  
                           <div class="px-3">
                              <h5 class="font-size-14 mb-3">Vehicles <button type="button" id="onview" class="btn btn-soft-info btn-sm waves-effect waves-light" style="float: right;">Change</button></h5>
                           </div>
                          
                               
                               
                               <div class="search-box position-relative">
                                        <input type="text" class="form-control rounded border" placeholder="Search Vehicle..." ng-model="queryv[queryByv]">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                               
                                <ul class="list-unstyled chat-list" ng-init="fetchVehicle(0)">
                                
                                
                                <li  ng-repeat="namesvehicle in namesDatavehicle | filter:queryv">
                                   
                                        <div class="d-flex align-items-start">
                                           
                                            <div class="flex-grow-overflow-hidden" >
                                                <label for="{{namesvehicle.vehicle_id}}_datav" style="cursor: pointer;">
                                                
                                                <h5 class="text-truncate font-size-13 mb-1">{{namesvehicle.vehicle_number}}</h5>
                                                <p class="text-truncate mb-0">{{namesvehicle.driver_name}}</p>
                                                <p class="text-truncate mb-0">{{namesvehicle.driver_phone}}</p>
                                                <small class="text-truncate mb-0"><b>Route Name: {{namesvehicle.route_name}}</b></small>
                                                
                                                  <input type="radio" class="vehicle_id" name="vehicle_id" id="{{namesvehicle.vehicle_id}}_datav" value="{{namesvehicle.vehicle_id}}" style="float: right;width: 15px;height: 15px;">
                                             
                                                
                                               </label>
                                               
                                            </div>
                                           
                                            
                                        </div>
                                    
                                </li>
                               
                                
                           </ul>
                              
                             
                            
                             
                           
                           
                             <a href="javascript: void(0);" class="btn btn-secondary waves-effect mt-4" ng-click="assign()" style="float: right;margin: 0px 15px;"><i class="mdi mdi-forward me-1"></i> Assign</a>
                            
                           
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="active-order-sidebar h-100">
                        <div class="row">
                           
                              <div class="px-3 col-md-4">
                                 <h5 class="font-size-14" style="margin: 0px 9px;">{{statuslable}}</h5>
                              </div>
                              <div class="px-3 col-md-5">
                                  <input type="date" id="filter_date" ng-click="routeassignOrderclick('orders_process',3,0,1)" value="<?php echo date('Y-m-d'); ?>" class="form-control">&nbsp;&nbsp;&nbsp;
                              </div>
                               <div class="px-3 col-md-3" >
                                <div class="btn-group">
                                    
                                    <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Order Status <i class="mdi mdi-dots-vertical ms-2"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        
                                        <a class="dropdown-item" href="#" ng-click="routeassignOrderclick('orders_process',3,0,1)">Assigned</a>
                                        <a class="dropdown-item" href="#" ng-click="routeassignOrderclick('orders_process',3,0,2)">Transported </a>
                                        <a class="dropdown-item" href="#" ng-click="routeassignOrderclick('orders_process',4,0,3)">Delivered</a>
                                        <a class="dropdown-item" href="#" ng-click="routeassignOrderclick('orders_process',5,0,3)">Reconciliation</a>
                                        <a class="dropdown-item" href="#" ng-click="routeassignOrderclick('orders_process',3,0,8)">Reschedule Orders</a>
                                       
                                    </div>
                                </div>
                                
                                </div>

                        </div>
                        
                        
                         <div class="pe-3 ps-3 pt-1 pb-1" style="margin:-21px 0px;">
                                    <div class="search-box position-relative">
                                        <input type="text" class="form-control rounded border" placeholder="Search..." ng-model="query[queryBy]">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                         </div>


                        <div class="row" style="margin: 22px 0px;">
                           <div class="col-12">
                              <div class="active-trip-tracking p-3" >

                                    <div class="card" ng-repeat="names in namesDataassign | filter:query">
                                          <div class="card-body">
                                              
                                             <h5 class="card-title font-size-13">Order ID : {{names.order_no}}  <small class="text-truncate mb-0 midtext" style="text-transform: capitalize;">{{names.delivery_mode}} delivery</small>
                                                 <span class="badge rounded-pill badge-soft-secondary font-size-11 float-end" id="task-status">{{names.statusval}} </span>
                                               
                                                 
                                             </h5>
                                             <p class="text-muted float-end"><b>Assign Date : {{names.create_date}}</b> </p>
                                             <p class="text-muted "><b>Route Name : {{names.route_name}} </b></p>
                                             <p class="text-muted "><b>Driver Name : {{names.driver_name}} </b></p>
                                             <p class="text-muted "><b>Driver Phone : {{names.driver_phone}} </b></p>
                                             <p class="text-muted "><b>Vehicle Number : {{names.vehicle_number}}</b> </p>
                                             <p class="text-muted ">Customer Address : {{names.address}} </p>
                                             
                                          </div>
                                    </div>

                              </div>
                           </div>
                        </div>
                     </div>
                   </div>
                   
                   
                   

               </div>
            </div>
            <!-- End Page-content -->
         </div>


   </div>
   
   
   
    <div class="modal fade" id="firstmodalcommison" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Vehicle To Driver Point</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                            
                                                            <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Vehicle  NO <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12" ng-init="fetchVehicle(0)">
                                                               
                                                                    <select class="form-control" required="" name="vehicle_id" ng-model="vehicle_id" >
                                    
                                                                 
                                                                   <option ng-repeat="namesvehicle in namesDatavehicle" value="{{namesvehicle.vehicle_id}}">{{namesvehicle.vehicle_number}} - Route Name : {{namesvehicle.route_name}}</option>
                                                                                                            
                                                                  
                                    
                                                                  </select>
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                                <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Driver Name <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12" ng-init="fetchDriver()">
                                                               
                                                                  <select class="form-control" required="" name="driver_id" ng-model="driver_id" >
                                                                       <option ng-repeat="namesdriver in namesDataDriver" value="{{namesdriver.id}}">{{namesdriver.name}} - {{namesdriver.phone}}</option>
                                                                                                            
                                                                  
                                    
                                                                  </select>
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                            
                                                            
                                                            
                                                           
                                                            <div class="row" style="margin: 20px -9px;">
                                                          
                                                            
                                                            <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                    
                                                                 <button type="submit" class="btn btn-primary w-md" style="float: right;" ng-click="pointtodriver()">Change</button>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>


   
 <script>
 

 
 

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;


  $scope.fetchRouteorder = function(tabelename,status,id){
      
      
      
    $('#r_id').val(id);

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot?tablename='+tabelename+'&order_base='+status+'&route_id='+id).success(function(data){
        
        $scope.queryvvv = {};
      $scope.queryByvvv = '$';
        
      $scope.namesData = data;
    });
  };
  
  
    $scope.fetchRouteorderassignorder = function(tabelename,status,id,assaignstates,dateval){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_assign_data?tablename='+tabelename+'&order_base='+status+'&route_id='+id+'&assaignstates='+assaignstates+'&dateval='+dateval).success(function(data){
      
      $scope.query = {}
      $scope.queryBy = '$';
      
      $scope.namesDataassign = data;
    });
  };
  
  
  
  
  $scope.fetchVehicle = function(id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle?route_id='+id).success(function(data){
        
         $scope.queryv = {};
      $scope.queryByv = '$';
      
        
      $scope.namesDatavehicle = data;
    });
  };
  
  
    $scope.fetchDriver = function(){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_driver').success(function(data){
      $scope.namesDataDriver = data;
    });
  };
  
  
 $scope.routeOrder = function(id,name) {
  
   $scope.activeMenur = name
 
   $scope.fetchRouteorder('orders_process',2,id);
   $scope.fetchRouteorderassignorder('orders_process',3,id,1,0);
   $scope.fetchVehicle(id);
   $scope.route_name = name;
  
  
 }
 
 
 
 
 
 
 
 
 
 
 $scope.pointtodriver = function () {





        $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/pointtodriver",
        data:{'driver_id':$scope.driver_id,'vehicle_id':$scope.vehicle_id}
        }).success(function(data){
    
          $scope.fetchVehicle(0);
          $('#firstmodalcommison').modal('toggle');
    
        });




}

 
 
 
 
 
  
  
  
  $scope.statuslable="Assigned Orders";
  
 $scope.routeassignOrderclick = function(tablename,status1,status2,status3) {
  
   
   
   if(status3==1)
   {
       $scope.statuslable="Assigned Orders";
   }
  
   if(status3==2)
   {
       $scope.statuslable="Pick Start Orders";
   }
   if(status3==3)
   {
       $scope.statuslable="Delivered Orders";
   }
   
   if(status1==5)
   {
       $scope.statuslable="Reconciliation Orders";
   }
   
    
   if(status1==8)
   {
       $scope.statuslable="Reschedule Orders";
   }
  
    
   var status2=$('#r_id').val();
   var filter_date=$('#filter_date').val();
  
   $scope.fetchRouteorderassignorder(tablename,status1,status2,status3,filter_date);

 }
  

 $scope.fetchRoute = function(){
    $http.get('<?php echo base_url() ?>index.php/order/group_gy_route').success(function(data){
        
            $scope.queryvv = {};
      $scope.queryByvv = '$';
        
      $scope.namesRoute = data;
    });
  };


$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        $scope.fetchData('orders_process','2');
         $scope.fetchRouteorderassignorder('orders_process',3,0,1,0);
      }); 
    }
};

$scope.cancelData = function(id){
    if(confirm("Are you sure you want to Cancel it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Cancelfinance','tablename':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        $scope.fetchData('orders_process','2');
         $scope.fetchRouteorderassignorder('orders_process',3,0,1,0);
      }); 
    }
};



$scope.pageTab = function(tabelename,status){
    
    
$scope.fetchData(tabelename,status);
$scope.getcount(tabelename);


    
    
};



$scope.assign = function () {


      var sortingInput = $(".sortingInput");
      var sortingInput_value = [];
      for(var i = 0; i < sortingInput.length; i++){
          
           sortingInput_value.push($(sortingInput[i]).val());
         
      }
      var sortingInput_data= sortingInput_value.join("|");
      
     
     
      var orderid = $(".orderid");
      var orderid_value = [];
      for(var i = 0; i < orderid.length; i++){
          
          if($(orderid[i]).is(':checked')) {
              
           orderid_value.push($(orderid[i]).val());
           
          }
         
      }
      var orderid_data= orderid_value.join("|");
      
      
      
      
      
      var vehicle_id = $(".vehicle_id");
      var vehicle_id_value = [];
      for(var i = 0; i < vehicle_id.length; i++){
          
          if($(vehicle_id[i]).is(':checked')) {
              
           vehicle_id_value.push($(vehicle_id[i]).val());
           
          }
         
      }
      var vehicle_id_data= vehicle_id_value.join("|");
      
      
      
      var r_id=$('#r_id').val();
      
      
      
    if(vehicle_id_data=="")
    {
          alert('Driver and Vehicle not selected');
    }
    else
    {
        
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/orderassign",
              data:{'sortingInput_data':sortingInput_data,'vehicle_id_data':vehicle_id_data,'orderid_data':orderid_data,'tablenamemain':'orders_process'}
            }).success(function(data){
               
             
              $scope.fetchRouteorder('orders_process',2,r_id);
              $scope.fetchRouteorderassignorder('orders_process',3,r_id,1,0);
             
            });
             
        
        
    }
      
  
      
      
     
     
      

}

$scope.getcount = function (tabelename) {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/getcount_finance?tablename="+tabelename,
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.pending = data.pending;
            $scope.cancel =  data.cancel;
            $scope.proceed =  data.proceed;
            $scope.request =  data.request;

    });



}




});




$(document).ready(function(){
  $("#onview").click(function(){
   $('#firstmodalcommison').modal('toggle');
  });
});
</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>



