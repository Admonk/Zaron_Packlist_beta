<?php 
include "table_header.php"; 
date_default_timezone_set("Asia/Kolkata");

$view=11;
$active='active';
$active1='';
if(isset($_GET['view']))
{
    $view=12;
    $active='';
    $active1='active';
}

 ?>
<style type="text/css">
   
  
 div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
}
img.img-responsive {
    width: 100%;
}
p {
    margin-top: 0;
    margin-bottom: 5px;
}
table.table.align-middle.table-nowrap.newBorderedTable {
    font-size: 10.7px;
}
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>
     
     
     
     
     
     
     
     
     
     
     
     
       <div class="main-content">
            <div class="page-content">
               <div class="container-fluid">
                   
                   
                         <div class="row">
                            <div class="col-12">
                                          <div class="row">
                                       <div class="col-m-12">
                                          <div class="card mb-1">
                                             <div class="card-header align-items-start d-flex p-3">
                                                <div class="flex-shrink-0">
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('orders_process')">
                                                    
                                                   
                                                     

                                                     
                                                   
                                                  
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link  <?php echo $active; ?>" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',3,11)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Dispatch Ready &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{ready_for_delivery}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link <?php echo $active1; ?>" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',3,12)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Dispatch Loaded &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{ready_for_driver}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',3,13)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Partial Loaded &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end">   {{partialLoaded}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',3,1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Driver Picked &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end">   {{transpot}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',3,2)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Trip Started &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{tripstart}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',4,3)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Delivery Completed &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{delivered}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',5,3)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Reconciliation Completed &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{reconciliation}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',3,8)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Driver Reschedule Trips   &nbsp;&nbsp;<span class="badge rounded-pill bg-danger float-end"> {{re_sudule}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                   </ul>



                                                </div>
                                             </div>
                                             <!-- end card header -->
                                             <!-- end card-body -->
                                          </div>
                                       </div>
                                    </div>
                                          <div class="row">
                                              
                                              <div class="col-12">
                                                  <div class="card shadow-none">
                                                      <div class="card-body">
                                                             <!--datatable="ng" dt-options="vm.dtOptions"-->
                                                            <input type="hidden" id="nextnumber" value="0">   
                                                            <input type="hidden" id="prenumber" value="10">  
                                                            <input type="hidden" id="pageSize" value="10">  
                                                            <input type="hidden" id="order_base" value="3">
                                                            <input type="hidden" id="assign" value="<?php echo $view; ?>">
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
                          <div class="col-sm-7"></div>
                         <div class="col-sm-2">
                        <div id="example_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control input-sm" aria-controls="example" ng-model="searchText" ng-change="searchTextChanged()"></label>
                        </div>
                    </div>
                       </div>
                                                          <div class="table-responsive" >
                                                              <table class="table align-middle table-nowrap newBorderedTable">
                                                                  <thead>
                                                                      <tr>
                                                                          <th>#</th>
                                                                          <th>Order No</th>
                                                                          <th style="width:200px;">Name</th>
                                                                         
                                                                        
                                                                          <th>Order Amount</th>
                                                                          <th>Loaded Amount</th>
                                                                          <th>Delivery_Charge</th>
                                                                          <!--<th>Status</th>-->
                                                                          <th style="width:150px;">Status</th>
                                                                          <th>Order_By</th>
                                                                          <th>Driver</th>
                                                                          <th>Vehicle No</th>
                                                                          <th>Date</th>
                                                                          <th>Action</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData">
                                                                          <td>
                                                                              <div class="form-check font-size-16">
                                                                                  <input class="form-check-input" type="checkbox" id="customerlistcheck01">
                                                                                  <label class="form-check-label" for="customerlistcheck01"></label>
                                                                              </div>
                                                                          </td>
                                                                          <td>{{name.order_no}}</td>
                                                                          <td>{{name.name}} <br> {{name.phone}}</td>
                                                                         
                                                                         
                                                                           <td>{{name.totalamount}}</td>
                                                                           <td>{{name.loadamount}}</td>
                                                                           <td>{{name.delivery_charge}}</td>
                                                                       
                                                                      
                                                                          <td>{{name.reason}} <br><b>({{name.delivery_status}})</b></td>
                                                                           <td>{{name.order_by}} </td>
                                                                           <td>{{name.order_byd}} </td>
                                                                            <td>{{name.vehicle_number}} </td>
                                                                          <td>{{name.create_date}} {{name.create_time}}</td>
                                                                          <td style="display: flex;">
                                                                              
                                                                              
                                                                              
                                                                              
                                                                              
                                                                              
                                                                                      <?php
                                                                                       if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='6' || $this->session->userdata['logged_in']['access']=='21')
                                                                                       {
                                                                                           
                                                                                           
                                                                                        ?>
                                                                                        
                                                                                        
                                                                                       <!-- <span class="badge rounded-pill badge-soft-secondary font-size-11" ng-if="name.assign_status==11">
 <a href="#"  ng-click="cancelData(name.id)"><i class="mdi mdi-account-off font-size-16 text-danger me-1"></i> Cancel</a></span>-->
                                                                                       
                                                                                        
                                                                                        
                                                                                        
                                              <span class="badge rounded-pill badge-soft-secondary font-size-11" ng-if="name.assign_status==11 || name.assign_status==1"><a href="#" ng-click="removeAssign(name.id)"><i class="mdi mdi-key-remove font-size-16 text-danger me-1"></i> Un-Assign</a></span>
                                                                                       
                                                                                        
                                                                                        
                                                                                        <span class="badge rounded-pill badge-soft-secondary font-size-11" ng-if="name.assign_status==11 || name.assign_status==1 || name.loading_status==1"><a href="<?php echo base_url(); ?>index.php/order/pickup_orders_list_view?id={{name.id}}&driver_pickip=0" ><i class="mdi mdi-briefcase-upload font-size-16 text-danger me-1"></i>  Loading </a></span>
                                                                                       
                                                                                       
                                                                                       
                                                                                       
                                                                                       
                                                                                        <span class="badge rounded-pill badge-soft-secondary font-size-11" ng-if="name.assign_status==12"><a href="<?php echo base_url(); ?>index.php/order/pickup_orders_list_view?id={{name.id}}&driver_pickip=1" ><i class="mdi mdi-briefcase-upload font-size-16 text-danger me-1"></i> Driver Pickup </a></span>
                                                                                       
                                                                                       
                                                                                        <span class="badge rounded-pill badge-soft-secondary font-size-11" ng-if="name.assign_status==2 || name.assign_status==8"><a href="#" ng-click="removeAssignCallback(name.id)"><i class="mdi mdi-call-split font-size-16 text-danger me-1"></i>  Call Back</a></span>
                                                                                        
                                                                                        <?php
                                                                                       }
                       
                                                                                      
                                                                                      ?>
                                                                              
                                                                              
                                                                              
                                                                                      <span ng-if="name.assign_status==3 || name.assign_status==4"><a href="javascript:void(0);" ng-click="getorderid(name.id,name.order_no,name.selforder,name.order_byd,name.vehicle_number)" > View</a></span>
                                                                                      
                                                                                      <!--<a href="#"   ng-click="deleteData(name.id)"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Delete</a>-->
                                                                                   
                                                                                      
                                                                                  
                                                                              </div>
                                                                          </td>
                                                                      </tr>
                                                                     <tr ng-show="namesData.length==0"><td style="text-align: center;" colspan="11">No Data Found..</td></tr>
                                                                    
                                                                  </tbody>
                                                              </table>
                                                          </div>
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
                        
                        
                        
                 
               </div>
            </div>
            <!-- End Page-content -->
         </div>
     
     
     
     
     
     



   </div>
   
   
   
   
   
    <div class="modal fade" id="firstmodalcommison" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Orders Id: {{orderno_number}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body1">
                                                            
                                                            
                              
                                                            <div class="card1" >
                                          <div class="card-body" ng-repeat="namesorderid in namesDataorderid">
                                              
                                                <p><b>Customer name :</b> {{namesorderid.company_name}}</p>
                                                <p><b>Phone :</b> {{namesorderid.phone}}</p>
                                                <p><b> Address :</b>  {{namesorderid.address}}</p>
                                               
                                                <p>Total Bill Amount : <b style="font-size:18px;">{{namesorderid.totalamount}}</b></p>
                                                <p>Delivery Charge  : <b style="font-size:12px;">{{namesorderid.delivery_charge}} </b></p>
                                                <p>Customer Payment Mode : <b style="font-size:12px;">{{namesorderid.payment_mode}}</b></p>
                                                <p>Sales Person : <b style="font-size:12px;">{{namesorderid.sales_name}}</b></p>
                                                <p ng-if="drivename">Driver Name : {{drivename}} Vehicle No : {{vichalnumber}}</p>
                                                 <p ng-if="namesorderid.lengeth>0"><b>Max Length : {{namesorderid.lengeth}} </b></p>
                                                 <p ng-if="namesorderid.weight>0"><b>Weight : {{namesorderid.weight}}</p>
                                              
                                              
                                               <span ng-if="namesorderid.payment_mode=='Cash'">
                                                   
                                                       <table  class="table">
                                                       <tr><td><b>Denomination</b></td><td></td><td></td></tr>
                                                          <tr><td>1 * </td><td>{{c1rs}}</td><td>{{c1rs_s}}</td></tr>
                                                       <tr><td>2 * </td><td>{{c2rs}}</td><td>{{c2rs_s}}</td></tr>
                                                       <tr><td>5 * </td><td>{{c5rs}}</td><td>{{c5rs_s}}</td></tr>
                                                       
                                                       
                                                       <tr><td>10 * </td><td>{{c10rs}}</td><td>{{c10rs_s}}</td></tr>
                                                       <tr><td>20 * </td><td>{{c20rs}}</td><td>{{c20rs_s}}</td></tr>
                                                       <tr><td>50 * </td><td>{{c50rs}}</td><td>{{c50rs_s}}</td></tr>
                                                       <tr><td>100 *</td><td> {{c100rs}}</td><td>{{c100rs_s}}</td></tr>
                                                       <tr><td>200 * </td><td>{{c200rs}}</td><td>{{c200rs_s}}</td></tr>
                                                       <tr><td>500 * </td><td>{{c500rs}}</td><td>{{c500rs_s}}</td></tr>
                                                       <tr><td>2000 * </td><td>{{c2000rs}}</td><td>{{c2000rs_s}}</td></tr>
                                                       <tr><td>Denomination Total </td><td></td><td><span  >{{denomination_total}}</tr>
                                                       <tr style="color:red;font-weight:700;"><td>Difference  </td><td></td><td><span  >{{namesorderid.totalamount-denomination_total}}</tr>
                                                       
                                                       
                                                       
                                              <tr style="font-weight:700;" ng-if="namesorderid.return_excess!=0"><td>Return the excess  </td><td></td><td><span  >{{namesorderid.return_excess}}</tr>
                                                       
                                                       
                                                       <input type="hidden" value="{{namesorderid.totalamount-denomination_total}}" id="difference">
                                                      
                                                 </table>
                                                   
                                               </span>
                                               
                                               <span ng-if="namesorderid.payment_mode!='Cash'">
                                                   <p>Reference NO : {{namesorderid.reference_no}}</p>
                                               </span>
                                              
                                              <span ng-if="namesorderid.payment_mode!='Cash'">
                                                                             <div class="imageset" <div class="mb-3" ng-if="namesorderid.payment_image!=0">
                                                                             <img src="{{namesorderid.payment_image}}" class="img-responsive">
                                                                             </div>
                                               </span>
                                              
                                             
                                              <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">Collected  Payment <span style="color:red;">*</span></label>
                                                <div class="col-sm-12">
                                                    
                                                 <span ng-if="namesorderid.payment_mode!='Cash'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="{{namesorderid.creditsvalue}}" readonly name="collectamount" id="collectamount" type="text">
                                                 </span>
                                                 <span ng-if="namesorderid.payment_mode=='Cash'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="{{denomination_total}}" readonly name="collectamount" id="collectamount" type="text">
                                                 </span>
                                                 
                                                </div>
                                              </div>
                                              
                                              
                                               
                                              
                                              
                                              
                                            
                                              
                                              
                                                 
                                              
                                               
                                            
                                                          
                                             
                                          </div>
                                    </div>  
                                                            
                                                            
                                                           
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>
   
   
   
   
   
   
   
   
   
   
 <div class="modal fade" id="firstmodalcommison_assign" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Select reason</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            <lable>Reason</lable>
                                                           
                                                            <select class="form-control"  id="reason">
                                                                <option value="">Select reason</option>
                                                                <option value="Wrongly assigned">Wrongly assigned</option>
                                                                <option value="Material not ready">Material not ready</option>
                                                                <option value="No Production">No Production</option>
                                                            </select>
                                                            <input type="hidden" id="order_id_fetch">
                                                            
                                                            <div class="row" style="margin: 20px -9px;">
                                                             <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                     <input type="hidden" name="order_product_id" id="order_product_id" value="133">
                                                                 <button type="submit" class="btn btn-primary w-md" style="float: right;" ng-click="unassiendorder()">Save</button>
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



  
  
  
  
  
  
  
  
  
  
  
  


    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    
    $scope.tablename='orders_process';
    getData();



   function getData() {
       
      var order_base = $('#order_base').val();
      var assign = $('#assign').val();
      
      
     $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_trasport_base?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&assign='+assign)
        .success(function(data) {
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
    
    
    
    
    
 
 
 $scope.pageTab = function(tabelename,status,assign){
    
    
      $('#order_base').val(status);
      $('#assign').val(assign);
      
      $scope.currentPage = 1;
      getData();
      //$scope.getcount(tabelename);

    
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




    
  function getDataPage(currentPage,pageSize) {
         
         
         
        $scope.tablename='orders_process';
        var order_base = $('#order_base').val();
         var assign = $('#assign').val();
      
        
        
        $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_trasport_base?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&assign='+assign)
        .success(function(data) {
            $scope.namesData = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = currentPage-pageSize+1;
            $scope.endItem = currentPage;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
                $scope.namesData.push(temp);
                
                
            });
        });
        
        
        
        
        
        
    }



 

 
 
 
 
 
 

























  
  
 



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
         getData();
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
         getData();
      }); 
    }
};





$scope.removeAssign = function(id){
    
    
  $('#firstmodalcommison_assign').modal('toggle');
  $('#order_id_fetch').val(id);  
    
};

$scope.unassiendorder = function(){
    
  var id=$('#order_id_fetch').val();  
  var reason=$('#reason').val();
  
  if(reason!='')
  {
      
  
    if(confirm("Are you sure you want to unassign?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id,'reason':reason, 'action':'removeassign','tablenamemain':'orders_process'}
      }).success(function(data){
            $('#firstmodalcommison_assign').modal('toggle');
            $scope.success = false;
            $scope.error = false;
            getData();
        
      }); 
    }
    
  }
  else
  {
      alert('Select Reason');
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
        getData();
        
      }); 
    }
};







$scope.getcount = function (tabelename) {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/getcount_transpotcount?tablename="+tabelename,
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.pending = data.pending;
            $scope.cancel =  data.cancel;
            $scope.proceed =  data.proceed;
            $scope.request =  data.request;
            $scope.transpot =  data.transpot;
            
            
            $scope.partialLoaded =  data.partialLoaded;
            
            
            $scope.delivered =  data.delivered;
            $scope.reconciliation =  data.reconciliation;
            $scope.re_sudule =  data.re_sudule;
            $scope.tripstart =  data.tripstart;
            $scope.ready_for_delivery =  data.ready_for_delivery;
            
            $scope.ready_for_driver =  data.ready_for_driver;
             

    });



}

  $scope.getorderid = function(id,name,selforder,drivename,vichalnumber) {
  
  $scope.drivename = drivename;
   $scope.vichalnumber = vichalnumber;
 
  

   if(selforder==1)
   {
       $scope.fetchorderidDetails('orders_process',10000,id);
   }
   else
   {
       $scope.fetchorderidDetails('orders_process',2,id);
   }
   
   
   $scope.cashmode('orders_process',2,id);
   $scope.orderno_number = name;
   $('#firstmodalcommison').modal('toggle');
  
 };
 
 
  $scope.fetchorderidDetails = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_delivered_order_list_by_id_by_view?tablename='+tabelename+'&order_base='+status+'&order_id='+id).success(function(data){
      $scope.namesDataorderid = data;
    });
  };
  
  
  $scope.cashmode = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/cash_mode?tablename='+tabelename+'&order_base='+status+'&order_id='+id).success(function(data){
     
     
     
     
  $scope.c1rs = data.c1rs;
  $scope.c2rs = data.c2rs;
  $scope.c5rs = data.c5rs;
  $scope.c1rs_s = data.c1rs_s;
  $scope.c2rs_s = data.c2rs_s;
  $scope.c5rs_s = data.c5rs_s;
  
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
 


});

</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>


