<?php 
include "table_header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
     .table-responsive {
    height: 500px;
    overflow: auto;
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
                                              <h3>OverAll List</h3>
                                              <div class="col-12">
                                                  <div class="card shadow-none">
                                                      <div class="card-body">
                                                          
                                                          
                                                           <form class="ng-pristine ng-valid">
                                              <div class="row">
                                                  
                                                
                                                
                                                
                                                <div class="col">
                                                  <input type="date" class="form-control" id="from-date" value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                                <div class="col">
                                                  <input type="date" class="form-control" id="to-date" value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                               
                                                 
                                                
                                                
                                                 <div class="col">
                                                 <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                                                 
                                            
                                                </div>
                                               
                                              </div>
                                          </form>
                                                          
                                                           <div class="row mt-4">
                                                          <div class="col-md-4" style="border: #e7e7e7 solid 1px;padding: 10px;">
                                                              <h5>Enquiry </h5>
                                                               <div class="table-responsive" ng-init="fetchData('orders','<?php echo date('Y-m-d'); ?>','<?php echo date('Y-m-d'); ?>')">
                                     <div class="search-box position-relative">
                                        <input type="text" class="form-control" placeholder="Search..." ng-model="queryv[queryByv]">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                                                                   <table class="table align-middle table-nowrap newBorderedTable">
                                                                  <thead>
                                                                      <tr>
                                                                          <th>#</th>
                                                                          <th>Order No</th>
                                                                          <th>Name</th>
                                                                          <th>Phone</th>
                                                                         
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData1 | filter:queryv">
                                                                          <td> {{name.no}}</td>
                                                                             
                                                                          
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.order_no}}</a></td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.name}}</a></td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.phone}}</a>
                                                                          </td>
                                                                          
                                                                         
                                                                      </tr>
                                                                     
                                                                  </tbody>
                                                                    </table>
                                                               </div>   
                                                              
                                                          </div>
                                                          
                                                          <div class="col-md-4" style="border: #e7e7e7 solid 1px;padding: 10px;">
                                                              <h5>Quotation </h5>
                                                              <div class="table-responsive" ng-init="fetchData2('orders_quotation','<?php echo  date('Y-m-d'); ?>','<?php echo date('Y-m-d'); ?>')">
                                                                   
                                                                    <div class="search-box position-relative">
                                        <input type="text" class="form-control" placeholder="Search..." ng-model="queryvv[queryByvv]">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                                                                    <table class="table align-middle table-nowrap newBorderedTable" >
                                                                  <thead>
                                                                      <tr>
                                                                          <th>#</th>
                                                                          <th>Order No</th>
                                                                          <th>Name</th>
                                                                          <th>Phone</th>
                                                                         
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData2 | filter:queryvv">
                                                                          <td> {{name.no}}</td>
                                                                             
                                                                          
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.order_no}}</a></td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.name}}</a></td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.phone}}</a>
                                                                          </td>
                                                                          
                                                                         
                                                                      </tr>
                                                                     
                                                                  </tbody>
                                                                    </table>
                                                                   
                                                               </div>
                                                               
                                                               
                                                          </div>
                                                          
                                                          
                                                           <div class="col-md-4" style="border: #e7e7e7 solid 1px;padding: 10px;">
                                                              <h5>Order</h5>
                                                              <div class="table-responsive" ng-init="fetchData3('orders_process','<?php echo  date('Y-m-d'); ?>','<?php echo date('Y-m-d'); ?>')">
                                                                   
                                                                                            <div class="search-box position-relative">
                                        <input type="text" class="form-control" placeholder="Search..." ng-model="queryvvv[queryByvvv]">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                                                                    <table class="table align-middle table-nowrap newBorderedTable" >
                                                                  <thead>
                                                                      <tr>
                                                                          <th>#</th>
                                                                          <th>Order No</th>
                                                                          <th>Name</th>
                                                                          <th>Phone</th>
                                                                         
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData3 | filter:queryvvv">
                                                                          <td> {{name.no}}</td>
                                                                             
                                                                          
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.order_no}}</a></td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.name}}</a></td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.phone}}</a>
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



  

  $scope.fetchData = function(tabelename,fromdate,todate){
    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_date_waise?tablename='+tabelename+'&formdate='+fromdate+'&todate='+todate).success(function(data){
        
         $scope.queryv = {};
         $scope.queryByv = '$';
        
      $scope.namesData1 = data;
    });
  };

  $scope.fetchData2 = function(tabelename,fromdate,todate){
    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_date_waise?tablename='+tabelename+'&formdate='+fromdate+'&todate='+todate).success(function(data){
        
        $scope.queryvv = {};
         $scope.queryByvv = '$';
        
      $scope.namesData2 = data;
    });
  };

 $scope.fetchData3 = function(tabelename,fromdate,todate){
    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_date_waise?tablename='+tabelename+'&formdate='+fromdate+'&todate='+todate).success(function(data){
        
        $scope.queryvvv = {};
         $scope.queryByvvv = '$';
        
      $scope.namesData3 = data;
    });
  };


$scope.search = function(){
    
     
   
      var  fromdate=$('#from-date').val();
      var  fromto=$('#to-date').val();
      
      $scope.fetchData('orders',fromdate,fromto);
      $scope.fetchData2('orders_quotation',fromdate,fromto);
      $scope.fetchData3('orders_process',fromdate,fromto);
    
    
};



});

</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>



