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
    padding: 3px 10px;
    border-radius: 11px;
    margin: 0px 6px;
}
.active {
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
                              <h5 class="font-size-14 mb-3">Vehicle No <!--<span class="route-count float-end">(8)</span>--></h5>
                           </div>
                           <ul class="list-unstyled chat-list" ng-init="fetchVehicle(4)" >
                              
                                <li  ng-repeat="namesvehicle in namesDatavehicle" ng-class="{active : activeMenuf === namesvehicle.vehicle_id}">
                                    <a href="#" ng-click="routeOrder(namesvehicle.vehicle_id,namesvehicle.vehicle_number)" >
                                        <div class="d-flex align-items-start">
                                            
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-13 mb-1">{{namesvehicle.no}} . {{namesvehicle.vehicle_number}}</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <span class="badge bg-success rounded-pill">{{namesvehicle.count}}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                               
                           </ul>
                     </div>
                  </div>

                 
                  
                  
                  
                  
                  
                  
                  
                  
                  
                    <div class="col-md-5" ng-if="vehicle_number">
                     <div class="active-order-sidebar h-100">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="px-3">
                                <h5 class="font-size-14 mb-3">Orders <b style="color:#ff5e14;float:right;">{{vehicle_number}}</b></h5>
                              </div>
                             
                           </div>
                        </div>


                        <div class="row">
                           <div class="col-12">
                              <div class="active-trip-tracking p-3" >

                                    <div class="card" ng-repeat="names in namesData">
                                          <div class="card-body" ng-click="getorderid(names.order_id,names.order_no)" ng-class="{active : activeMenu === names.order_id}">
                                              
                                              
                                            <a href="#">
                                              
                                             <h5 class="card-title font-size-13">{{names.no}} . Order ID : {{names.order_no}}  <small class="text-truncate mb-0 midtext"> Full Delivery</small>
                                               
                                             </h5>
                                             
                                             <p class="text-muted float-end">Trip End : {{names.trip_end_date}} {{names.trip_end_time}} </p>
                                             <p class="text-muted "><b>Route Name : {{names.route_name}} </b></p>
                                             <p class="text-muted "><b>Driver Name : {{names.driver_name}} </b></p>
                                             <p class="text-muted "><b>Driver Phone : {{names.driver_phone}} </b></p>
                                            
                                             </a>
                                             
                                          </div>
                                    </div>

                              </div>
                           </div>
                        </div>
                     </div>
                   </div>
                 
                 
                 
                 <div class="col-md-4" ng-if="orderno_number">
                     
                      <div class="active-order-sidebar h-100">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="px-3" >
                                <h5 class="font-size-14 mb-3">Orders Id: <b style="color:#ff5e14;float:right;">{{orderno_number}}</b></h5>
                              </div>
                             
                           </div>
                        </div>


                        <div class="row">
                           <div class="col-12">
                              <div class="active-trip-tracking p-3" >

                                    <div class="card" >
                                          <div class="card-body" ng-repeat="namesorderid in namesDataorderid">
                                              
                                                <p>Total Bill Amount : <b style="font-size:18px;">{{namesorderid.totalamount}}</b></p>
                                                <p>Payment Mode : {{namesorderid.payment_mode}}</p>
                                              
                                               <span ng-if="namesorderid.payment_mode=='Cash'">
                                                   
                                                       <table  class="table">
                                                       <tr><td><b>Denomination</b></td><td></td><td></td></tr>
                                                       <tr><td>50 * </td><td>{{c50rs}}</td><td>{{c50rs_s}}</td></tr>
                                                       <tr><td>100 *</td><td> {{c100rs}}</td><td>{{c100rs_s}}</td></tr>
                                                       <tr><td>200 * </td><td>{{c200rs}}</td><td>{{c200rs_s}}</td></tr>
                                                       <tr><td>500 * </td><td>{{c500rs}}</td><td>{{c500rs_s}}</td></tr>
                                                       <tr><td>2000 * </td><td>{{c2000rs}}</td><td>{{c2000rs_s}}</td></tr>
                                                       <tr><td>Total </td><td></td><td><span  >{{namesorderid.totalamount}}</tr>
                                                       </table>
                                                   
                                               </span>
                                               
                                               <span ng-if="namesorderid.payment_mode!='Cash'">
                                                   <p>Reference NO : {{namesorderid.reference_no}}</p>
                                               </span>
                                              
                                              
                                              
                                             
                                              <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">Collect The Payment <span style="color:red;">*</span></label>
                                                <div class="col-sm-12">
                                                 <input  class="form-control" placeholder="Enther The Amount" value="{{namesorderid.totalamount}}" name="collectamount" id="collectamount" type="text">
                                                </div>
                                              </div>
                                              
                                              
                                              
                                               <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">Driver Charge <span style="color:red;">*</span></label>
                                                <div class="col-sm-12">
                                                 <input  class="form-control" placeholder="Enther The Amount"  name="drivercharge" id="drivercharge" type="text">
                                                 <br>
                                                <label class="form-check-label">
                                                  <input type="checkbox"  id="paid_driver" value="1" > Paid to the driver </label>
                                                </div>
                                               </div>
                                          
                                            
                                              <br>
                                                    
                                              <div class="form-group row">
                                                      <input type="hidden" name="hidden_id" id="hidden_id" value="{{namesorderid.order_id}}">
                                                      <input type="hidden" name="driver_id" id="driver_id" value="{{namesorderid.driver_id}}">
                                                      <input type="hidden" name="customer_id" id="customer_id" value="{{namesorderid.customer_id}}">
                                                      <input type="hidden" name="fulltotal" id="fulltotal" value="{{namesorderid.totalamount}}">
                                                      <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" ng-click="paymentrecived()" type="submit" value="Payment Received">
                                              </div>
                                                       
                                                          
                                             
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


  

  
  
  

  
 $scope.routeOrder = function(id,name) {
  
   $scope.activeMenuf = id
   $scope.fetchRouteorder('orders_process',2,id);
   $scope.vehicle_number = name;
  
  
 }
 
   $scope.getorderid = function(id,name) {
  
 
 
   $scope.activeMenu = id
   $scope.fetchorderidDetails('orders_process',2,id);
   $scope.cashmode('orders_process',2,id);
   $scope.orderno_number = name;
  
  
 }
 
 
  $scope.fetchRouteorder = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_delivered_order_list?tablename='+tabelename+'&order_base='+status+'&vehicle_id='+id).success(function(data){
      $scope.namesData = data;
    });
  };
  
 
 
   $scope.fetchVehicle = function(id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_delivered?status='+id).success(function(data){
      $scope.namesDatavehicle = data;
    });
  };
  
  
  $scope.fetchDriver = function(){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_driver').success(function(data){
      $scope.namesDataDriver = data;
    });
  };
  
 

 
 
 
 
  $scope.fetchorderidDetails = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_delivered_order_list_by_id?tablename='+tabelename+'&order_base='+status+'&order_id='+id).success(function(data){
      $scope.namesDataorderid = data;
    });
  };
  
  $scope.cashmode = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/cash_mode?tablename='+tabelename+'&order_base='+status+'&order_id='+id).success(function(data){
     
     
  
     
      $scope.c50rs = data.c50rs;
      $scope.c100rs = data.c100rs;
      $scope.c200rs = data.c200rs;
      $scope.c500rs = data.c500rs;
      $scope.c2000rs = data.c2000rs;
      
      
      
      $scope.c50rs_s = data.c50rs_s;
      $scope.c100rs_s = data.c100rs_s;
      $scope.c200rs_s = data.c200rs_s;
      $scope.c500rs_s = data.c500rs_s;
      $scope.c2000rs_s = data.c2000rs_s;
      
      
      
    });
  };
  
 
 
 
 
 $scope.paymentrecived = function(){
     
     
     
     
     
    var collectamount= $('#collectamount').val();
    var drivercharge= $('#drivercharge').val();
    var order_id= $('#hidden_id').val();
    
    var driver_id= $('#driver_id').val();
    var customer_id= $('#customer_id').val();
    var fulltotal= $('#fulltotal').val();
   
      var paid_driver = $("#paid_driver");
      var paid_driver_value = [];
      for(var i = 0; i < paid_driver.length; i++){
          
          if($(paid_driver[i]).is(':checked')) {
              
           paid_driver_value.push($(paid_driver[i]).val());
           
          }
         
       }
       var checkid= paid_driver_value.join("|");
      
      
      
    
        $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/payment_collected",
        data:{'order_id':order_id,'collectamount':collectamount,'checkid':checkid,'drivercharge':drivercharge,'driver_id':driver_id,'customer_id':customer_id,'fulltotal':fulltotal}
        }).success(function(data){
    
          alert('Payment Collected');
          $scope.fetchRouteorder('orders_process',2,order_id);
          $scope.fetchorderidDetails('orders_process',2,order_id);
    
        });

    
    
    
    
    
     
     
 };
   
     
     
 $scope.fetchRoute = function(){
    $http.get('<?php echo base_url() ?>index.php/order/group_gy_route').success(function(data){
      $scope.namesRoute = data;
    });
  };





});




$(document).ready(function(){
  $("#onview").click(function(){
   $('#firstmodalcommison').modal('toggle');
  });
});
</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>


