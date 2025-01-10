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
p.ng-binding {
    margin-bottom: 4px;
}
.chat-list li .user-img {
    position: relative;
    margin: -10px 0px;
}


</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     
     <?php echo $top_nav; ?>
     
     
     <div class="main-content">
            <div class="page-content pe-0 ps-0 pb-0">
               <div class="flex-row-grow">
                   
                   
                  <div class="col-md-3" ng-init="fetchVehicle(0)">
                     <div class="route-sidebar w-100" style="min-width: unset;">  
                           <div class="px-3">
                              <h5 class="font-size-14 mb-3">Routes <!--<span class="route-count float-end">(8)</span>--></h5>
                           </div>
                           
                           
                               <div class="row" style="margin-top: 30px;">
                               
                             <div class="col-md-6">
                             <input type="date" class="form-control" id="filter-date3" value="<?php echo date('Y-m-d'); ?>" ng-model="filter_date3" ng-change="filterDateroute()">    
                              </div>
                              
                               <div class="col-md-6">
                                <input type="date" class="form-control" id="filter-date4" value="<?php echo date('Y-m-d'); ?>" ng-model="filter_date4" ng-change="filterDateroute()">    
                                
                            </div>
                            </div>
                           
                           <div class="search-box position-relative">
                                        <input type="text" class="form-control rounded border" placeholder="Search " ng-model="queryvv[queryByvv]">
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
                             
                                    <input type="hidden" id="route_id_set">
                                <h5 class="font-size-14 mb-3">Unassign Client Scope Orders   <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata">Export</button><br> <b style="color:#ff5e14;font-size: 11px;">{{route_name}}</b></h5>
                              <div class="col-md-6">
                              <input type="date" class="form-control" id="filter-date1" value="<?php echo date('Y-m-d'); ?>" ng-model="filter_date1" ng-change="filterDate()"> 
                              </div>
                              
                               <div class="col-md-6">
                                <input type="date" class="form-control" id="filter-date2" value="<?php echo date('Y-m-d'); ?>" ng-model="filter_date2" ng-change="filterDate()">    
                                <div class="dataTables_length" id="example_length" style="display:none;">
                                    
                                    <select name="example_length" aria-controls="example" class="form-control input-sm" ng-model="pageSize" ng-change="pageSizeChanged()">
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="500">500</option>
                                        <option value="800">800</option>
                                        <option value="1000">1000</option>
                                    </select>
                                </div>
                            </div>
                           
                           
                             
                           
                            <div class="search-box position-relative">
                                        <input type="text" class="form-control rounded border" placeholder="Search"  ng-model="searchText" ng-change="searchTextChanged()">
                                        <i class="bx bx-search search-icon"></i>
                           </div> 
                         
                           <ul class="list-unstyled chat-list" >
                                
                                
                                
                                
                                
                                
                                
                                
                                <li ng-repeat="names in namesData | filter:queryvv2"  >
                                   
                                        <div class="d-flex align-items-start">
                                            <div class="flex-shrink-0 user-img online align-self-center me-1">
                                                <input type="text" ng-model="names.no" style="display:none;" class="sortingInput">
                                               
                                            </div>
                                            
                                            
                                            <div class="flex-grow-overflow-hidden" >
                                                <label for="{{names.id}}_data" style="cursor: pointer;">
                                                
                                                <h5 class="text-truncate font-size-13 mb-1">{{names.no}} .{{names.order_no}} | Bill Amount : {{names.totalamount}}</h5>
                                                <p class="text-truncate mb-1">{{names.name}}</p>
                                                <p class="text-truncate mb-1" ng-if="names.phone>0">{{names.phone}}</p>
                                                <small class="text-truncate mb-0" ng-if="names.route_names_val"><b>Route : {{names.route_names_val}}</b><br></small>
                                                
                                                <small class="text-truncate mb-0"  ng-if="names.loc_name"><b>Locality : {{names.loc_name}}</b></small>
                                                
                                                <p ng-if="names.lengeth>0">Max Length : {{names.lengeth}} &nbsp;&nbsp;&nbsp;<i class="fa fa-info-circle" aria-hidden="true" title="Product Type" ng-click="showProducttype(names.id,names.order_no)"></i></p>
                                                <p ng-if="names.weight>0">Weight : {{names.weight }} </p>
                                                
                                                
                                                <input type="checkbox" class="orderid" id="{{names.id}}_data" value="{{names.id}}" style="float: right;width: 15px;height: 15px;">
                                                </label>
                                               
                                             
                                                <div class="font-size-10"><b><span ng-if="names.SSD_check==1" style="color:red;">SDP</span> {{names.create_date}} {{names.create_time}} </b><small class="text-truncate mb-0 midtext" style="text-transform: capitalize;">{{names.delivery_mode}} delivery</small>
                                                <a href="<?php echo base_url(); ?>index.php/order/overviewtrans?order_id={{names.id}}&old_tablename=<?php echo 'orders_process'; ?>&old_tablename_sub=<?php echo 'order_product_list_process'; ?>&tablename=<?php echo 'orders_process'; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&movetablename=<?php echo 'orders_process'; ?>&movetablename_sub=<?php echo 'order_product_list_process'; ?>" target="_blank" class="font-size-12 mb-3" style="cursor: pointer;"  ><i class="mdi mdi-arrow-right text-primary me-1"></i> View</a>
                                                 <!-- <span class="badge rounded-pill badge-soft-secondary font-size-11" >
                                                 <a href="#"  ng-click="cancelData(names.id)"><i class="mdi mdi-account-off font-size-16 text-danger me-1"></i> Cancel</a></span>-->
                                                </div>
                                                
                                                 <p class="text-truncate mb-2 font-size-10"  ><b ng-if="names.delivery_date_time">Delivery Date Time: {{names.delivery_date_time}} </b>
                                                 </p> 
                                          
                                         
                                                 <p class="text-truncate mb-2" ><b>Sales Person : </b>{{names.sales_name}} | {{names.sales_phone}} </p>
                                                  <p class="text-truncate mb-2" ><b>Payment Mode : </b>{{names.payment_mode}}  </p>
                                                  <p class="text-truncate mb-2" ng-if="names.pending_amount"><b>{{names.pending_amount}} </b>  </p>
                                                  <p class="text-truncate mb-2" ><b>Status : </b>{{names.reason}}  </p>
                                                <p class="text-truncate mb-2" ><b>Scope : </b>{{names.delivery_status}} <span ng-if="names.excess_payment_status==1" style="color:red;">Excess payment</span> </p>
                                             </div>
                                            
                                        </div>
                                    
                                </li>
                                
                                
                                
                                
                                
                               
                                
                           </ul>
                           
                           
                           
                         
                        </div>
                     </div>
                  </div>
                  
                  
                  <div class="col-md-2">
                      <div class="tripset-sidebar w-100 ms-1" style="min-width: unset;background: #ffeee6;">  
                           <div class="px-3">
                              <h5 class="font-size-14 mb-3">Vehicles <button type="button" id="onview" class="btn btn-soft-info btn-sm waves-effect waves-light" style="float: right;">Change</button></h5>
                           </div>
                          
                               
                               
                               <div class="search-box position-relative">
                                        <input type="text" class="form-control rounded border" placeholder="Search" ng-model="queryv[queryByv]">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                                   <a href="javascript: void(0);" class="btn btn-secondary waves-effect mt-1" ng-click="assign()" style="float: right;"><i class="mdi mdi-forward me-1"></i> Assign</a>
                         
                                <ul class="list-unstyled chat-list" >
                                
                                
                                <li  ng-repeat="namesvehicle in namesDatavehicle | filter:queryv" ng-click="getDriverOrderData(namesvehicle.vehicle_id,namesvehicle.driver_id)">
                                   
                                        <div class="d-flex align-items-start">
                                           
                                            <div class="flex-grow-overflow-hidden" >
                                                <label for="{{namesvehicle.vehicle_id}}_datav" style="cursor: pointer;">
                                                 <h5 class="text-truncate font-size-13 mb-1">{{namesvehicle.vehicle_name}}</h5>
                                                <h5 class="text-truncate font-size-13 mb-1">{{namesvehicle.vehicle_number}}</h5>
                                                <p class="text-truncate mb-0" ng-if="namesvehicle.driver_name">{{namesvehicle.driver_name}} | {{namesvehicle.driver_phone}}</p>
                                                
                                               
                                                <small class="text-truncate mb-0" ng-if="namesvehicle.route_name"><b>Route : {{namesvehicle.route_name}}</b></small>
                                               
                                                  <input type="radio" class="vehicle_id" name="vehicle_id" id="{{namesvehicle.vehicle_id}}_datav" value="{{namesvehicle.vehicle_id}}" style="float: right;width: 15px;height: 15px;">
                                             
                                                
                                               </label>
                                                <p ><a href="#" ng-click="getDriverOrder(namesvehicle.driver_id)" style="color:#f70000">Sequencing <i class="mdi mdi-arrow-right text-primary me-1"></i></a> </p>
                                            </div>
                                           
                                            
                                        </div>
                                    
                                </li>
                               
                                
                           </ul>
                              
                             
                            
                             
                           
                           
                            
                           
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="active-order-sidebar h-100">
                        <div class="row">
                           
                              
                              <div class="col-md-3" style="margin: 0px 15px;">
                              
                                  <input type="date" style="width: 125px;" id="filter_date_from" ng-click="routeassignOrderclick('orders_process',3,0,11)" value="<?php echo date('Y-m-d'); ?>" class="form-control">&nbsp;&nbsp;&nbsp;
                              </div>
                              <div class="col-md-3">
                                  <input type="date" style="width: 125px;" id="filter_date_to" ng-click="routeassignOrderclick('orders_process',3,0,11)" value="<?php echo date('Y-m-d'); ?>" class="form-control">&nbsp;&nbsp;&nbsp;
                              </div>
                               <div class="px-3 col-md-4" >
                                <div class="btn-group">
                                    
                                    <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Order Status <i class="mdi mdi-dots-vertical ms-2"></i>
                                    </button>
                                    
                                    <button type="button" class="btn btn-danger waves-effect waves-light" id="exportdata1">Export</button>
                                    
                                    <div class="dropdown-menu">
                                        
                                        <a class="dropdown-item" href="#" ng-click="routeassignOrderclick('orders_process',3,0,11)">Dispatch Ready</a>
                                        <a class="dropdown-item" href="#" ng-click="routeassignOrderclick('orders_process',3,0,12)">Dispatch Loaded</a>
                                        <a class="dropdown-item" href="#" ng-click="routeassignOrderclick('orders_process',3,0,13)">Partial Loaded</a>
                                        <a class="dropdown-item" href="#" ng-click="routeassignOrderclick('orders_process',3,0,1)">Driver Picked</a>
                                        <a class="dropdown-item" href="#" ng-click="routeassignOrderclick('orders_process',3,0,2)">Trip Started </a>
                                        <a class="dropdown-item" href="#" ng-click="routeassignOrderclick('orders_process',4,0,3)">Delivered</a>
                                        <a class="dropdown-item" href="#" ng-click="routeassignOrderclick('orders_process',5,0,3)">Reconciliation</a>
                                        <a class="dropdown-item" href="#" ng-click="routeassignOrderclick('orders_process',3,0,8)">Reschedule Orders</a>
                                       
                                    </div>
                                </div>
                                
                                </div>

                        </div>
                        
                        
                         <div class="pe-3 ps-3 pt-1 pb-1" style="margin:-21px 0px;">
                                    <div class="search-box position-relative">
                                        <input type="text" class="form-control rounded border" ng-change="searchTextChanged2()" ng-model="searchText2">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                         </div>


                        <div class="row" style="margin: 22px 0px;">
                           <div class="col-12">
                               
                               
                              <div class="active-trip-tracking p-3" ng-init="fetchRouteorderassignorder('orders_process',3,0,11,0,0,0,0)">

                                    <div class="card" ng-repeat="names in namesDataassign | filter:queryvv3">
                                          <div class="card-body">
                                              
                                             <h5 class="card-title font-size-13">  <input type="text" ng-keyup="saveSortid(names.id)" id="sort_no_{{names.id}}" value="{{names.sort_id}}" class="sortingInput ng-pristine ng-valid ng-touched">
                                                 Order ID : {{names.order_no}}  
                                                 <span class="badge rounded-pill badge-soft-secondary font-size-11" id="task-status">{{names.statusval}} 
                                                 </span>
                                                 
                                                 <span class="badge rounded-pill badge-soft-secondary font-size-11 float-end" ng-if="names.assign_status==11 || names.assign_status==12"><a href="#" ng-click="removeAssign(names.id)">Un-Assign</a></span>
                                                 <span class="badge rounded-pill badge-soft-secondary font-size-11 float-end" ng-if="names.assign_status==2 || names.assign_status==8"><a href="#" ng-click="removeAssignCallback(names.id)">Call Back</a></span>
                                             </h5>
                                             <p class="text-muted"><b>Assign Date : {{names.create_date}} {{names.create_time}}</b> </p>
                                             <p ng-if="names.route_name">Route : {{names.route_name}} </p>
                                             <p ng-if="names.loc_name">Locality  : {{names.loc_name}} </p>
                                             <p>Driver Name & Phone : {{names.driver_name}} - {{names.driver_phone}}</p>
                                             <p>Vehicle : {{names.vehicle_name}} | {{names.vehicle_number}}  </p>
                                          
                                             <p class="ng-binding"><b>Customer Details: </b></p>
                                             <p>Customer Name : {{names.name}}  {{names.phone}}</p>
                                             <p>Customer Address : {{names.address}} </p>
                                             
                                             <p class="ng-binding"><b>Sales Person: </b></p>
                                             <p>{{names.sales_name}} | {{names.sales_phone}}   <small class="text-truncate mb-0 midtext" style="text-transform: capitalize;">{{names.delivery_mode}} delivery</small>
                                                  
                                                 
                                                 </p>
                                             
                                             
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
                                                               
                                                                <div class="col-sm-12" >
                                                               
                                                                    <select class="form-control" required="" name="vehicle_id" ng-model="vehicle_id" >
                                    
                                                                 
                                                                   <option ng-repeat="namesvehicle in namesDatavehicle" value="{{namesvehicle.vehicle_id}}">{{namesvehicle.vehicle_number}} - Route : {{namesvehicle.route_name}}</option>
                                                                                                            
                                                                  
                                    
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




<div class="modal fade" id="producttype" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Order Product Types {{namesordernoVal}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                            
                                                            <div class="form-group row" ng-repeat="namesp in namesProducttype">
                                                                <label class="col-sm-12 col-form-label">{{namesp.no}}. {{namesp.categories_name}}</label>
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


   $('#route_id_set').val(0);
    var route_id=0;
    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 15;
    $scope.searchText = '';
    getData(0);
    
       
     $scope.searchText2 = '';
 
    
    
    
    
   $scope.searchTextChanged = function() {
        $scope.currentPage = 1;
        getData(0);
    }
    
    
    
    $scope.filter_date1 = "<?php echo date('Y-m-d'); ?>";
 $scope.filter_date2 = "<?php echo date('Y-m-d'); ?>";
$scope.filter_date3 = "<?php echo date('Y-m-d'); ?>";
 $scope.filter_date4 = "<?php echo date('Y-m-d'); ?>";
    function getData(route_id) {
        
        
         var fromdate= $('#filter-date1').val();
       var todate= $('#filter-date2').val();
        
     $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_by_server?page=' + $scope.currentPage + '&search=' + $scope.searchText + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=orders_process&order_base=2&route_id='+route_id+'&fromdate='+fromdate+'&todate='+todate)
        .success(function(data) {
            
            
               $scope.queryvv2 = {};
      $scope.queryByvv2 = '$';
            
            $scope.namesData = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = ($scope.currentPage - 1) * $scope.pageSize + 1;
            $scope.endItem = $scope.currentPage * $scope.pageSize;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
                $scope.namesData.push(temp);
                
                
            });
        });
        
       
    }
    
    
    $scope.pageChanged = function() {
        getData(0);
    }
    $scope.pageSizeChanged = function() {
        
        $scope.currentPage = 1;
        
        $('#pageSize').val($scope.pageSize);
        
        
        var routeid=$('#route_id_set').val();
        
        
        
        getData(routeid);
        
        
        
    }
    $scope.searchTextChanged = function() {
        $scope.currentPage = 1;
        getData(0);
    }
    
    
    
    
    



























  
  
  
  
  
  
  
  
  
  
  
  
  
  
$scope.searchTextChanged2 = function() {
       $scope.fetchRouteorderassignorder('orders_process',3,0,11,0,0,0,0);
}
$scope.getDriverOrder = function(driver_id) {
       $scope.fetchRouteorderassignorder('orders_process',3,0,11,0,0,driver_id,0);
}

  
  $scope.getDriverOrderData = function(vehicle_id,driver_id) 
{          
         
         
        
         $('#'+vehicle_id+'_datav').attr("checked", "checked");
         $scope.fetchRouteorderassignorder('orders_process',3,0,11,0,0,driver_id,vehicle_id);
    
}
  
  
  
  $scope.fetchRouteorderassignorder = function(tabelename,status,id,assaignstates,dateval,dateval2,driver_id,vehicle_id){

   
   var dateval=$('#filter_date_from').val();
    var dateval2=$('#filter_date_to').val();


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_assign_data?tablename='+tabelename+'&order_base='+status+'&route_id='+id+ '&search=' + $scope.searchText2 +'&assaignstates='+assaignstates+'&dateval='+dateval+'&dateval2='+dateval2+'&driver_id='+driver_id+'&vehicle_id='+vehicle_id).success(function(data){
     
      $scope.namesDataassign = data;
      
      $scope.queryvv3 = {};
      $scope.queryByvv3 = '$';
      
    });
  };
  
  
  
  
  
  
  
  
  $scope.fetchVehicle = function(id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle?orderset=1&route_id='+id).success(function(data){
        
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
 
   
   
   
   $('#route_id_set').val(id);
   
   $scope.currentPage = 1;
   getData(id);
   
   
   
   
   
   $scope.fetchRouteorderassignorder('orders_process',3,id,11,0,0,0,0);
   //$scope.fetchVehicle(id);
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
       $scope.statuslable="Trip Start Orders";
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
   var filter_date_from=$('#filter_date_from').val();
    var filter_date_to=$('#filter_date_to').val();
  
   $scope.fetchRouteorderassignorder(tablename,status1,status2,status3,filter_date_from,filter_date_to,0,0);

 }
  

 $scope.fetchRoute = function(){
     
     
     var filter_date_from=$('#filter-date3').val();
     var filter_date_to=$('#filter-date4').val();
     
    $http.get('<?php echo base_url() ?>index.php/order/group_gy_route?filter_date_from='+filter_date_from+'&filter_date_to='+filter_date_to).success(function(data){
        
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
        $scope.fetchRouteorderassignorder('orders_process',3,0,11,0,0,0,0);
      }); 
    }
};

$scope.cancelData = function(id){
    
   
    
    if(confirm("Are you sure you want to Cancel it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
         data:{'id':id, 'action':'Cancel','tablenamemain':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        getData(0);
      }); 
    }
};



$scope.removeAssign = function(id){
    if(confirm("Are you sure you want to unassign?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'removeassign','tablenamemain':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        
        
        
        
       $scope.currentPage = 1;
       
       
         var routeid=$('#route_id_set').val();
         getData(routeid);
        
        
        
        $scope.fetchRouteorderassignorder('orders_process',3,0,11,0,0,0,0);
        
      }); 
    }
};

$scope.removeAssignCallback = function(id){
    if(confirm("Are you sure you want to call back?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'removeAssignCallback','tablenamemain':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        $scope.fetchData('orders_process','3','1');
        
      }); 
    }
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
              data:{'sortingInput_data':sortingInput_data,'vehicle_id_data':vehicle_id_data,'trip_id':'0','orderid_data':orderid_data,'tablenamemain':'orders_process'}
            }).success(function(data){
               
              $scope.searchText="";
              $scope.searchText2="";
              $scope.currentPage = 1;
              
              var routeid=$('#route_id_set').val();
              getData(routeid);
              $scope.fetchRouteorderassignorder('orders_process',3,routeid,11,0,0,0,vehicle_id_data);
              
             
              
             
            });
             
        
        
    }
      
  
      
      
     
     
      

}














$scope.saveSortid = function (id) {



  
 
  var sort_no=$('#sort_no_'+id).val();
  
  


 if(sort_no!="")
 {
     


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/sort_no_update",
      data:{'sort_no':sort_no,'id':id,'action':'Save'}
    }).success(function(data){

      if(data.error != '1')
      {

        
        //$scope.discount = "";
           
        $scope.fetchSingleDatatotal('1');

      }

    });
    
    
 }
 
    



}









$scope.filterDate = function () {
    
    getData(0);
};


$scope.filterDateroute = function () {
    
    $scope.fetchRoute();
};




$scope.showProducttype = function (orderid,orderno) {
    
        $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/fetch_single_data_product_type",
        data:{'orderid':orderid}
        }).success(function(data){
    
          $scope.namesProducttype = data;
          $scope.namesordernoVal = orderno;
          $('#producttype').modal('toggle');
    
        });
    
};

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
  
  
  
  
  
  
  
  
  
  
  $('#exportdata').on('click', function() {
  
  
      
      var orderstatus= 1;
      var assign_status= 0;
      var finance_status=2;
      var fromdate= $('#filter-date1').val();
      var fromto= $('#filter-date2').val();
      var report_name='Un Assign Transport Orders Client Scope';
      var report_name1='Un_Assign_Transport_Orders_Client_Scope';
      url = '<?php echo base_url() ?>index.php/report/fetch_data_sales_report_daily_export_transport?limit=10&orderstatus='+orderstatus+'&formdate='+fromdate+'&todate='+fromto+'&report_name='+report_name+'&report_name1='+report_name1+'&assign_status='+assign_status+'&finance_status='+finance_status;
      location = url;

});

  
     $('#exportdata1').on('click', function() {
  
  
      
      var orderstatus= 2;
      var assign_status= 0;
      var finance_status=2;
      var fromdate= $('#filter-date1').val();
      var fromto= $('#filter-date2').val();
      var report_name='Assigned Transport Orders Own Scope';
      var report_name1='Assigned_Transport_Orders_Own_Scope';
      url = '<?php echo base_url() ?>index.php/report/fetch_data_sales_report_daily_export_transport_assign?limit=10&orderstatus='+orderstatus+'&formdate='+fromdate+'&todate='+fromto+'&report_name='+report_name+'&report_name1='+report_name1+'&assign_status='+assign_status+'&finance_status='+finance_status;
      location = url;

});
  
  
  
});
</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>



