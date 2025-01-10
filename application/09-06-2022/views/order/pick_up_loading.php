<?php 
include "table_header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
   
  
 div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
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
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',3,11)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Dispatch PickUP / loading &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{ready_for_delivery}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link " data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',3,12)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Driver PickUP / loading &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{ready_for_driver}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',3,1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Loaded &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end">   {{transpot}} </span></span>   
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
                                                            <input type="hidden" id="nextnumber" value="10">   
                                                            <input type="hidden" id="prenumber" value="10">  
                                                            <input type="hidden" id="pageSize" value="10">  
                                                            <input type="hidden" id="order_base" value="3">
                                                            <input type="hidden" id="assign" value="11">
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
                                                                          <th>Name</th>
                                                                         
                                                                        
                                                                          <th>Total</th>
                                                                          <th>Delivery_Charge</th>
                                                                          <!--<th>Status</th>-->
                                                                          <th>Status</th>
                                                                          <th>Order_By</th>
                                                                          <th>Driver</th>
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
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/pickup_orders_list_view?id={{name.id}}" >{{name.order_no}}</a></td>
                                                                          <td>{{name.name}} <br> {{name.phone}}</td>
                                                                         
                                                                         
                                                                           <td>{{name.totalamount}}</td>
                                                                           <td>{{name.delivery_charge}}</td>
                                                                       
                                                                      
                                                                          <td>{{name.reason}} </td>
                                                                           <td>{{name.order_by}} </td>
                                                                           <td>{{name.order_byd}} </td>
                                                                          <td>{{name.create_date}} {{name.create_time}}</td>
                                                                          <td>
                                                                              
                                                                              
                                                                              
                                                                              
                                                                              
                                                                              
                                                                                      <?php
                                                                                       if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='6')
                                                                                       {
                                                                                        ?>
                                                                                        
                                                                                        
                                                                                        <span class="badge rounded-pill badge-soft-secondary font-size-11" ng-if="name.assign_status==1"><a href="#" ng-click="removeAssign(name.id)">Un-Assign</a></span>
                                                                                       
                                                                                        
                                                                                        
                                                                                        <span class="btn btn-outline-primary font-size-11" ng-if="name.assign_status==11 || name.assign_status==1"><a href="<?php echo base_url(); ?>index.php/order/pickup_orders_list_view?id={{name.id}}&driver_pickip=0" >Loading / Pickup </a></span>
                                                                                       
                                                                                        <span class="btn btn-outline-primary font-size-11" ng-if="name.assign_status==12"><a href="<?php echo base_url(); ?>index.php/order/pickup_orders_list_view?id={{name.id}}&driver_pickip=1" >Driver Pickup </a></span>
                                                                                       
                                                                                       
                                                                                        <span class="badge rounded-pill badge-soft-secondary font-size-11" ng-if="name.assign_status==2 || name.assign_status==8"><a href="#" ng-click="removeAssignCallback(name.id)">Call Back</a></span>
                                                                                        
                                                                                        <?php
                                                                                       }
                       
                                                                                      
                                                                                      ?>
                                                                              
                                                                              
                                                                              
                                                                                     <span ng-if="name.assign_status==3 || name.assign_status==4"><a href="javascript:void(0);" ng-click="getorderid(name.id,name.order_no)" > View</a></span>
                                                                                      
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
                                              
                                               <span ng-if="namesorderid.payment_mode=='Cash'">
                                                   
                                                       <table  class="table">
                                                       <tr><td><b>Denomination</b></td><td></td><td></td></tr>
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
                                                 <input  class="form-control" placeholder="Enther The Amount" value="{{namesorderid.fulltotalamount}}" readonly name="collectamount" id="collectamount" type="text">
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
      $scope.getcount(tabelename);

    
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
        data:{'id':id, 'action':'Cancelfinance','tablenamemain':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
         getData();
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
        getData();
        
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
            $scope.delivered =  data.delivered;
            $scope.reconciliation =  data.reconciliation;
            $scope.re_sudule =  data.re_sudule;
            $scope.tripstart =  data.tripstart;
            $scope.ready_for_delivery =  data.ready_for_delivery;
            
            $scope.ready_for_driver =  data.ready_for_driver;
             

    });



}

  $scope.getorderid = function(id,name) {
  
 
 

   $scope.fetchorderidDetails('orders_process',2,id);
   $scope.cashmode('orders_process',2,id);
   $scope.orderno_number = name;
   $('#firstmodalcommison').modal('toggle');
  
 };
 
 
  $scope.fetchorderidDetails = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_delivered_order_list_by_id?tablename='+tabelename+'&order_base='+status+'&order_id='+id).success(function(data){
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
 


});

</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>


