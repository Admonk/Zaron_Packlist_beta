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
    text-transform: capitalize;
}
.activess {
    background: aliceblue;
}
img.img-responsive {
    width: 100%;
}
p.ng-binding {
    margin-bottom: 4px;
}
p.text-muted {
    margin-bottom: 7px;
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
                              <input type="text" placeholder="Search Vehicle" class="form-control" ng-model="queryv[queryByv]">
                              <br>
                           </div>
                          
                           <ul class="list-unstyled chat-list" ng-init="fetchVehicle(4)" >
                              
                                <li  ng-repeat="namesvehicle in namesDatavehicle | filter:queryv" ng-class="{activess : activeMenuf === namesvehicle.vehicle_id}">
                                    <a href="#" ng-click="routeOrder(namesvehicle.vehicle_id,namesvehicle.vehicle_number)" >
                                        <div class="d-flex align-items-start">
                                            
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-13 mb-1">{{namesvehicle.no}} . {{namesvehicle.vehicle_name}} | {{namesvehicle.vehicle_number}}</h5>
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

                 
                  
                  
                  
                  
                  
                  
                  <input type="hidden" id="v_id">
                  
                  
                    <div class="col-md-5" ng-if="vehicle_number">
                     <div class="active-order-sidebar h-100">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="px-3">
                                <h5 class="font-size-14 mb-3">Orders <b style="color:#ff5e14;float:right;">{{vehicle_number}}</b></h5>
                              </div>
                             
                           </div>
                           <div class="col-md-12">
                              <div class="px-3">
                               <input type="text" placeholder="search" class="form-control" ng-model="query[queryBy]">
                               </div>
                           </div>
                           
                           
                           
                        </div>


                        <div class="row">
                           <div class="col-12">
                              <div class="active-trip-tracking p-3" >

                                    <div class="card" ng-repeat="names in namesData | filter:query">
                                          <div class="card-body" ng-click="getorderid(names.order_id,names.order_no)" ng-class="{activess : activeMenu === names.order_id}">
                                              
                                              
                                            <a href="#">
                                              
                                             <h5 class="card-title font-size-13">{{names.no}} . Order ID : {{names.order_no}}  <small class="text-truncate mb-0 midtext"> {{names.delivery_mode}} Delivery</small>
                                               
                                             </h5>
                                             
                                             <p class="text-muted float-end">Assign Date  : {{names.trip_end_date}} {{names.trip_end_time}} </p>
                                             <p class="text-muted "><b>Customer Name & phone : {{names.company_name}} | {{names.phone}}</b></p>
                                            
                                             <p class="text-muted ">Route Name : {{names.route_name}} </p>
                                             <p class="text-muted ">Driver Name & Phone: {{names.driver_name}} | {{names.driver_phone}} </p>
                                            
                                            
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
                                              
                                                <p>Customer name : {{namesorderid.company_name}}</p>
                                                <p>Phone : {{namesorderid.phone}}</p>
                                                <p>Address : {{namesorderid.address}}</p>
                                               
                                                <p>Total Bill Amount : <b style="font-size:18px;">{{namesorderid.totalamount}}</b></p>
                                                <p>Delivery Charge  : <b style="font-size:12px;">{{namesorderid.delivery_charge}} </b></p>
                                                <p>Customer Payment Mode : <b style="font-size:12px;">{{namesorderid.payment_mode}}</b></p>
                                                <p>Sales Person : <b style="font-size:12px;">{{namesorderid.sales_name}}</b></p>
                                              
                                              
                                              
                                              
                                              
                                              
                                             
                                           
                                              
                                            
                                              
                                             
                                                
                                                  
                                              
                                            
                                              
                                                 
                                              
                                            
                                              <br>
                                                    
                                              
                                                          
                                             
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
   
   

   
 <script>
 

 

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;


  $scope.modechangess='Cash';

   $scope.modechange = function() {
  
  
  
    var mode= $('#cashmode').val();
  
    if(mode=='Cash')
    {
        $('#bankaccountshow').hide();
        $('#reference_no_view').hide();
    }
    else
    {   
         $('#bankaccountshow').show();
        $('#reference_no_view').show();
    }
  
   }
  

 $scope.routeOrder = function(id,name) {
  
   $scope.activeMenuf = id
   $scope.fetchRouteorder('orders_process',2,id);
   $scope.vehicle_number = name;
   var v_id= $('#v_id').val(id);
  
 }
 
 
 $scope.checkDriverpay = function() {
     
         if($("#paid_driver").is(':checked')) {
              
                $('#showpaymentmode').show();
           
          }
          else
          {
                 $('#showpaymentmode').hide();
                 $('#reference_no_view').hide();
                 $('#bankaccountshow').hide();
                 
          }
          
          
          
 }

  
 $scope.checkCustomerpay = function() {
     
         if($("#paid_customer").is(':checked')) {
              
                $('#bankaccount_customer_view').show();
           
          }
          else
          {
                 $('#bankaccount_customer_view').hide();
                 
                 
          }
          
          
          
 }

 
 
 
   $scope.getorderid = function(id,name) {
  
 
 
   $scope.activeMenu = id
   $scope.fetchorderidDetails('orders_process',2,id);
   $scope.cashmode('orders_process',2,id);
   $scope.orderno_number = name;
  
  
 }
 


  $scope.fetchRouteorder = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_delivered_order_list_assign?tablename='+tabelename+'&order_base='+status+'&vehicle_id='+id).success(function(data){
      
      
      $scope.query = {}
      $scope.queryBy = '$';
      $scope.namesData = data;
      
    });
  };
  
 
 
   $scope.fetchVehicle = function(id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_assign?status='+id).success(function(data){
      
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
  
 

 
 
 
 
  $scope.fetchorderidDetails = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_delivered_order_list_by_id_assign?tablename='+tabelename+'&order_base='+status+'&order_id='+id).success(function(data){
      $scope.namesDataorderid = data;
    });
  };
  
  $scope.cashmode = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/cash_mode?tablename='+tabelename+'&order_base='+status+'&order_id='+id).success(function(data){
     
     
  
     $scope.c10rs = data.c10rs;
     $scope.c20rs = data.c20rs;
     
      $scope.c50rs = data.c50rs;
      $scope.c100rs = data.c100rs;
      $scope.c200rs = data.c200rs;
      $scope.c500rs = data.c500rs;
      $scope.c2000rs = data.c2000rs;
      
      
      $scope.c10rs_s = data.c10rs_s;
      $scope.c20rs_s = data.c20rs_s;
      
      $scope.c50rs_s = data.c50rs_s;
      $scope.c100rs_s = data.c100rs_s;
      $scope.c200rs_s = data.c200rs_s;
      $scope.c500rs_s = data.c500rs_s;
      $scope.c2000rs_s = data.c2000rs_s;
      
      $scope.denomination_total = data.denomination_total;
      
      
      
    });
  };
  
 
 
 
 
 $scope.paymentrecived = function(){
     
     
     
     
     var v_id= $('#v_id').val();
    var collectamount= $('#collectamount').val();
    var drivercharge= $('#drivercharge').val();
    var order_id= $('#hidden_id').val();
    
    var driver_id= $('#driver_id').val();
    var customer_id= $('#customer_id').val();
    var fulltotal= $('#fulltotal').val();
    var fulltotal= $('#fulltotal').val();
  
    var payment_mode= $('#cashmode').val();
    var reference_no= $('#reference_no').val();
    
    var difference= $('#difference').val();
    
    
        var bankaccount= $('#bankaccount').val();
    
         var bankaccount_customer= $('#bankaccount_customer').val();
        
        if (bankaccount_customer == null){
           var bankaccount_customer=0;
        }
    
    
 
        if($('#paid_customer').is(':checked')) {
            
            var customer_paid=1;
        }
        else
        {
            var customer_paid=0;
        }
    
    
       
    
   
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
        data:{'order_id':order_id,'difference':difference,'customer_paid':customer_paid,'bankaccount_customer':bankaccount_customer,'collectamount':collectamount,'bankaccount':bankaccount,'reference_no':reference_no,'payment_mode':payment_mode,'checkid':checkid,'drivercharge':drivercharge,'driver_id':driver_id,'customer_id':customer_id,'fulltotal':fulltotal}
        }).success(function(data){
    
          alert('Payment Collected');
          $scope.fetchRouteorder('orders_process',2,v_id);
          $scope.fetchorderidDetails('orders_process',2,v_id);
    
        });

    
    
    
    
    
     
     
 };
   
     
     
 $scope.fetchRoute = function(){
    $http.get('<?php echo base_url() ?>index.php/order/group_gy_route').success(function(data){
      $scope.namesRoute = data;
    });
  };





});





</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>


