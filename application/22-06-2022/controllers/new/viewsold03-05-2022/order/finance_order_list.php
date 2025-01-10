<?php 
include "table_header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
   

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
                                                         <span class="d-none d-sm-block">All Orders &nbsp;&nbsp;<span class="badge rounded-pill bg-success  float-end"> {{proceed}} </span></span>   
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
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',5)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Reconciliation Completed &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{reconciliation}} </span></span>   
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
                                                          

                                                          <div class="table-responsive" ng-init="fetchData('orders_process',111)">
                                                              <table class="table align-middle table-nowrap newBorderedTable" datatable="ng" dt-options="vm.dtOptions">
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
                                                                     
                                                                  </tbody>
                                                              </table>
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



  

  $scope.fetchData = function(tabelename,status){
    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_finance?tablename='+tabelename+'&order_base='+status).success(function(data){
      $scope.namesData = data;
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
        $scope.fetchData('orders_process','111');
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
        $scope.fetchData('orders_process','111');
      }); 
    }
};



$scope.pageTab = function(tabelename,status){
    
    
$scope.fetchData(tabelename,status);
$scope.getcount(tabelename);


    
    
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



