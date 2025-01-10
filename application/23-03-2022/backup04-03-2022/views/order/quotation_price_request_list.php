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
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('orders_quotation')">
                                                      
                                                    

                                                      <li class="nav-item">
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_quotation',3)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Price Requested<span class="badge rounded-pill bg-warning float-end"> {{request}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_quotation',1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Quotation To Order <span class="badge rounded-pill bg-success  float-end"> {{proceed}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                       
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_quotation',4)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Purchase Team Price requested<span class="badge rounded-pill bg-danger  float-end"> {{requestp}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_quotation',5)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">MD Price requested<span class="badge rounded-pill bg-danger  float-end"> {{requestmd}} </span></span>   
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
                                                          

                                                          <div class="table-responsive" ng-init="fetchData('orders_quotation',3)">
                                                              <table class="table align-middle table-nowrap newBorderedTable" datatable="ng" dt-options="vm.dtOptions">
                                                                  <thead>
                                                                      <tr>
                                                                          <th>#</th>
                                                                          <th>Quotation No</th>
                                                                          <th>Name</th>
                                                                          <th>Phone</th>
                                                                           <th>Commission</th>
                                                                          <th>Total</th>
                                                                          <!--<th>Status</th>-->
                                                                           <th>Queries</th>
                                                                           <th>Quotation By</th>
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
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_quotation_price_request?order_id={{name.base_id}}">{{name.order_no}}</a></td>
                                                                          <td>{{name.name}}</td>
                                                                          <td>
                                                                              {{name.phone}}
                                                                          </td>
                                                                          
                                                                        <td>{{name.commission}}</td>
                                                                           <td>{{name.totalamount}}</td>
                                                                       
                                                                         <!--<td> 
                                                                         
                                                                         
                                                                         
                                                                         
                                                                         <span ng-if="name.order_base==0">
                                                                             
                                                                               <button type="button" class="btn btn-outline-warning waves-effect waves-light">Pending</button>
                                                                         
                                                                         </span>
                                                                         
                                                                         <span ng-if="name.order_base==1">
                                                                             
                                                                               <button type="button" class="btn btn-outline-success waves-effect waves-light">Processed</button>
                                                                         
                                                                         </span>
                                                                         
                                                                         <span ng-if="name.order_base==-1">
                                                                             
                                                                               <button type="button" class="btn btn-outline-danger waves-effect waves-light">Canceled</button>
                                                                         
                                                                         </span>
                                                                       
                                                                         
                                                                         
                                                                         
                                                                         
                                                                         
                                                                         
                                                                         </td>-->
                                                                          <td>{{name.reason}} </td>
                                                                           <td>{{name.order_by}}</td>
                                                                          <td>{{name.create_date}} {{name.create_time}}</td>
                                                                          <td>
                                                                              
                                                                                
                                                                                     <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_quotation_price_request?order_id={{name.base_id}}" ><i class="mdi mdi-eye font-size-16 text-success me-1"></i> View</a>
                                                                                     <!--<a href="#"  ng-click="deleteData(name.id)"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Delete</a>-->
                                                                                     
                                                                                      <span ng-if="name.order_base==0">
                                                                                     <a href="#"  ng-click="cancelData(name.id)"><i class="mdi mdi-account-off font-size-16 text-danger me-1"></i> Cancel</a>
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
    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_tl_price_request?tablename='+tabelename+'&order_base='+status).success(function(data){
      $scope.namesData = data;
    });
  };

 
 



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'orders_quotation'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        $scope.fetchData('orders_quotation','3');
      }); 
    }
};

$scope.cancelData = function(id){
    if(confirm("Are you sure you want to Cancel it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Cancel','tablenamemain':'orders_quotation'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        $scope.fetchData('orders_quotation','3');
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
      url:"<?php echo base_url() ?>index.php/order/getcounttl_price_request?tablename="+tabelename,
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.pending = data.pending;
            $scope.cancel =  data.cancel;
            $scope.proceed =  data.proceed;
            $scope.reassign =  data.reassign;
             $scope.request =  data.request;
             $scope.requestp =  data.requestp;
             $scope.requestmd =  data.md_team;
           

    });



}




});

</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>


