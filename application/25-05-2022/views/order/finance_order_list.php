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
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',111)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Payment Pending Orders &nbsp;&nbsp;<span class="badge rounded-pill bg-success  float-end"> {{proceed}} </span></span>   
                                                         </a>
                                                      </li> 
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',5)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Payment Completed Orders &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{reconciliation}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',3)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Transported Order &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{transpot}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                     
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',4)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Delivery Completed &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{delivered}} </span></span>   
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
                                                            <input type="hidden" id="order_base" value="111">
                                                          
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

                                                          <div class="table-responsive">
                                                              <table class="table align-middle table-nowrap newBorderedTable" >
                                                                  <thead>
                                                                      <tr>
                                                                          <th>#</th>
                                                                          <th>Order No</th>
                                                                          <th>Name</th>
                                                                          <th>Phone</th>
                                                                          <th>Commission</th>
                                                                          <th>Total</th>
                                                                           <th>Delivery Charge</th>
                                                                          <!--<th>Status</th>-->
                                                                          <th>Status</th>
                                                                          <th>Order By</th>
                                                                          <th>Create Date</th>
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
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process_finance_verification?order_id={{name.base_id}}">{{name.order_no}}</a></td>
                                                                          <td>{{name.name}}</td>
                                                                          <td>
                                                                             {{name.phone}}
                                                                          </td>
                                                                          
                                                                          <td>{{name.commission}}</td>
                                                                           <td>{{name.totalamount}}</td>
                                                                           <td>{{name.delivery_charge}}</td>
                                                                       
                                                                        <!-- <td> 
                                                                         
                                                                         
                                                                         
                                                                         
                                                                         <span ng-if="name.order_base==1">
                                                                             
                                                                               <button type="button" class="btn btn-outline-warning waves-effect waves-light">Pending</button>
                                                                         
                                                                         </span>
                                                                         
                                                                         <span ng-if="name.order_base==0">
                                                                             
                                                                               <button type="button" class="btn btn-outline-success waves-effect waves-light">Approved</button>
                                                                         
                                                                         </span>
                                                                         
                                                                         <span ng-if="name.order_base==2">
                                                                             
                                                                               <button type="button" class="btn btn-outline-success waves-effect waves-light">Approved</button>
                                                                         
                                                                         </span>
                                                                         
                                                                      
                                                                         
                                                                         <span ng-if="name.order_base==-1">
                                                                             
                                                                               <button type="button" class="btn btn-outline-danger waves-effect waves-light">Disapproved</button>
                                                                         
                                                                         </span>
                                                                       
                                                                         
                                                                          <span ng-if="name.order_base==3">
                                                                             
                                                                               <button type="button" class="btn btn-outline-success waves-effect waves-light">Dispatched</button>
                                                                         
                                                                         </span>
                                                                         
                                                                         
                                                                         <span ng-if="name.order_base==4">
                                                                             
                                                                               <button type="button" class="btn btn-outline-success waves-effect waves-light">Delivered</button>
                                                                         
                                                                         </span>
                                                                         
                                                                         
                                                                          <span ng-if="name.order_base==5">
                                                                             
                                                                               <button type="button" class="btn btn-outline-success waves-effect waves-light">Payment received</button>
                                                                         
                                                                         </span>
                                                                         
                                                                         
                                                                         
                                                                         
                                                                         </td>-->
                                                                          <td>{{name.reason}} </td>
                                                                           <td>{{name.order_by}} </td>
                                                                          <td>{{name.create_date}} {{name.create_time}}</td>
                                                                          <td>
                                                                              
                                                                                     <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process_finance_verification?order_id={{name.base_id}}" ><i class="mdi mdi-eye font-size-16 text-success me-1"></i> View</a>
                                                                                      <!--<a href="#"   ng-click="deleteData(name.id)"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Delete</a>-->
                                                                                     
                                                                                      <span ng-if="name.order_base==1">
                                                                                      <a href="#"   ng-click="cancelData(name.id)"><i class="mdi mdi-account-off font-size-16 text-danger me-1"></i> Cancel</a>
                                                                                      </span>
                                                                                      
                                                                                  
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
      
      
     $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_finance?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base)
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
    
    
    
    
    
 
 
 $scope.pageTab = function(tabelename,status){
    
    
      $('#order_base').val(status);
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
        
        $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_finance?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base)
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
            $scope.transpot =  data.transpot;
            $scope.delivered =  data.delivered;
            $scope.reconciliation =  data.reconciliation;
             

    });



}




});

</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>


