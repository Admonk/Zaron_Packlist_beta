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
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',0)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Yet To Start &nbsp;&nbsp;<span class="badge rounded-pill bg-success  float-end"> {{allprocess}} </span></span>   
                                                         </a>
                                                      </li> 
                                                      
                                                     
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Production Start &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{production_assign}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                         
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',2)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Production Inprogress &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{production_inprogress}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',3)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Production Completed &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{production_assign_completed}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',4)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">QC Verified &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{qc_verifived}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',5)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Stored Orders &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{moveto_transpot}} </span></span>   
                                                         </a>
                                                      </li>
                                                       
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',-1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Production Re-assign &nbsp;&nbsp;<span class="badge rounded-pill bg-danger float-end"> {{production_re_assign}} </span></span>   
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
                                                          

                                                          <div class="table-responsive" ng-init="fetchData('orders_process',0)">
                                                              <table class="table align-middle table-nowrap newBorderedTable" datatable="ng" dt-options="vm.dtOptions">
                                                                  <thead>
                                                                      <tr>
                                                                          <th>#</th>
                                                                          
                                                                          <th>Product Name</th>
                                                                          
                                                                          <th>Status</th>
                                                                          <th>Date</th>
                                                                          <th>Action</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData">
                                                                          <td>
                                                                              <div class="form-check font-size-12">
                                                                                  <input class="form-check-input" type="checkbox" id="customerlistcheck01">
                                                                                  <label class="form-check-label" for="customerlistcheck01"></label>
                                                                                   {{name.no}}
                                                                              </div>
                                                                              
                                                                             
                                                                          </td>
                                                                          <td>
                                                                                       <span ng-if="name.order_base=='-1'">
                                                                                          
                                                                                           <a href="<?php echo base_url(); ?>index.php/order/production_panel?product_id={{name.product_id}}" >{{name.product_name}}</a>
                                                                              
                                                                                      </span>
                                                                                     <span ng-if="name.order_base==0">
                                                                                          
                                                                                           <a href="<?php echo base_url(); ?>index.php/order/production?product_id={{name.product_id}}" >{{name.product_name}}</a>
                                                                              
                                                                                      </span>
                                                                                      
                                                                                      <span ng-if="name.order_base>0">
                                                                                          
                                                                                            <a href="<?php echo base_url(); ?>index.php/order/production_panel?product_id={{name.product_id}}" >{{name.product_name}}</a>
                                                                              
                                                                                      
                                                                                      </span>
                                                                              
                                                                             
                                                                              
                                                                              </td>
                                                                         
                                                                         
                                                                        
                                                                          <td>
                                                                              
                                                                              
                                                                              <span ng-if="name.order_base==0">
                                                                                  
                                                                                  <p style="color:red;margin:0;">Yet To Start</p>
                                                                                  
                                                                              </span>
                                                                              
                                                                               <span ng-if="name.order_base!=0">
                                                                                  
                                                                                  <p style="color:green;margin:0;">{{name.reason}}</p>
                                                                                  
                                                                              </span>
                                                                              
                                                                              
                                                                              
                                                                              
                                                                              </td>
                                                                          <td>{{name.create_date}} {{name.create_time}}</td>
                                                                          <td>
                                                                                       
                                                                                      <span ng-if="name.order_base=='-1'">
                                                                                          
                                                                                           <a href="<?php echo base_url(); ?>index.php/order/production_panel?product_id={{name.product_id}}" ><i class="mdi mdi-eye font-size-16 text-success me-1"></i> View</a>
                                                                                      
                                                                                      </span> 
                                                                                       
                                                                                      <span ng-if="name.order_base==0">
                                                                                          
                                                                                           <a href="<?php echo base_url(); ?>index.php/order/production?product_id={{name.product_id}}" ><i class="mdi mdi-eye font-size-16 text-success me-1"></i> View</a>
                                                                                      
                                                                                      </span>
                                                                                      
                                                                                      <span ng-if="name.order_base>0">
                                                                                          
                                                                                           <a href="<?php echo base_url(); ?>index.php/order/production_panel?product_id={{name.product_id}}" ><i class="mdi mdi-eye font-size-16 text-success me-1"></i> View</a>
                                                                                      
                                                                                      </span>
                                                                                     
                                                                                      <span ng-if="name.order_base==1">
                                                                                      <a href="#"   ng-click="cancelData(name.product_id)"><i class="mdi mdi-account-off font-size-16 text-danger me-1"></i> Cancel</a>
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
    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_production?tablename='+tabelename+'&order_base='+status).success(function(data){
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
        $scope.fetchData('orders_process','0');
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
        $scope.fetchData('orders_process','0');
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
      url:"<?php echo base_url() ?>index.php/order/getcount_production_start?tablename="+tabelename,
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.allprocess = data.allprocess;
            $scope.production_assign_completed =  data.production_assign_completed;
            $scope.production_assign =  data.production_assign;
            $scope.production_inprogress =  data.production_inprogress;
            $scope.production_re_assign =  data.production_re_assign;
            $scope.qc_verifived =  data.qc_verifived;
            $scope.moveto_transpot =  data.moveto_transpot;
             

    });



}




});

</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>


