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
                                                          
                                                          
                                                           <form class="ng-pristine ng-valid" style="display:none;">
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
                                        <input type="text" class="form-control" placeholder="Search..." ng-model="searchText1" ng-change="searchTextChanged1()">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                                                                   <table class="table align-middle table-nowrap newBorderedTable">
                                                                  <thead>
                                                                      <tr>
                                                                          <th>#</th>
                                                                          <th>Order No</th>
                                                                          <th>Name</th>
                                                                      
                                                                          <th>Status</th>
                                                                         
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData1">
                                                                          <td> {{name.no}}</td>
                                                                             
                                                                          
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}">{{name.order_no}}</a></td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}">{{name.name}} <br> {{name.phone}}</a></td>
                                                                         
                                                                           <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}">
                                                                              
                                                                                <span ng-if="name.order_base==0">
                                                                             
                                                                               Open Enquiry  
                                                                         
                                                                               </span>
                                                                               
                                                                               <span ng-if="name.order_base!=0">
                                                                             
                                                                               {{name.reason}}
                                                                         
                                                                               </span>
                                                                               
                                                                          
                                                                             
                                                                              
                                                                              
                                                                              </a></td>
                                                                         
                                                                      </tr>
                                                                     
                                                                  </tbody>
                                                                    </table>
                                                               </div>   
                                                              
                                                          </div>
                                                          
                                                          <div class="col-md-4" style="border: #e7e7e7 solid 1px;padding: 10px;">
                                                              <h5>Quotation </h5>
                                                              <div class="table-responsive" ng-init="fetchData2('orders_quotation','<?php echo  date('Y-m-d'); ?>','<?php echo date('Y-m-d'); ?>')">
                                                                   
                                                                    <div class="search-box position-relative">
                                        <input type="text" class="form-control" placeholder="Search..." ng-model="searchTex2t" ng-change="searchTextChanged2()">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                                                                    <table class="table align-middle table-nowrap newBorderedTable" >
                                                                  <thead>
                                                                      <tr>
                                                                          <th>#</th>
                                                                          <th>Order No</th>
                                                                          <th>Name</th>
                                                                        
                                                                          <th>status</th>
                                                                         
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData2">
                                                                          <td> {{name.no}}</td>
                                                                             
                                                                          
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_quotation?order_id={{name.base_id}}" ng-click="disable_load()">{{name.order_no}}</a></td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_quotation?order_id={{name.base_id}}" ng-click="disable_load()">{{name.name}} <br> {{name.phone}}</a></td>
                                                                          
                                                                          
                                                                          
                                                                           <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_quotation?order_id={{name.base_id}}" ng-click="disable_load()">
                                                                              
                                                                                <span ng-if="name.order_base==0">
                                                                             
                                                                               Open Quotation  
                                                                         
                                                                               </span>
                                                                               
                                                                               <span ng-if="name.order_base!=0">
                                                                             
                                                                               {{name.reason}}
                                                                         
                                                                               </span>
                                                                               
                                                                               
                                                                              
                                                                              
                                                                              </a></td>
                                                                         
                                                                      </tr>
                                                                     
                                                                  </tbody>
                                                                    </table>
                                                                   
                                                               </div>
                                                               
                                                               
                                                          </div>
                                                          
                                                          
                                                           <div class="col-md-4" style="border: #e7e7e7 solid 1px;padding: 10px;">
                                                              <h5>Order</h5>
                                                              <div class="table-responsive" ng-init="fetchData3('orders_process','<?php echo  date('Y-m-d'); ?>','<?php echo date('Y-m-d'); ?>')">
                                                                   
                                                                                            <div class="search-box position-relative">
                                        <input type="text" class="form-control" placeholder="Search..." ng-model="searchText3" ng-change="searchTextChanged3()">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                                                                    <table class="table align-middle table-nowrap newBorderedTable" >
                                                                  <thead>
                                                                      <tr>
                                                                          <th>#</th>
                                                                          <th>Order No</th>
                                                                          <th>Name</th>
                                                                        
                                                                          <th>Status</th>
                                                                         
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData3">
                                                                          <td> {{name.no}}</td>
                                                                             
                                                                          
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.order_no}}</a></td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.name}} <br> {{name.phone}}</a></td>
                                                                        
                                                                          </td>
                                                                          
                                                                          
                                                                           <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                              
                                                                                <span ng-if="name.order_base==0">
                                                                             
                                                                               Open Order  
                                                                         
                                                                               </span>
                                                                               
                                                                               <span ng-if="name.order_base!=0">
                                                                             
                                                                               {{name.reason}}
                                                                         
                                                                               </span>
                                                                               
                                                                              
                                                                             
                                                                              
                                                                              
                                                                              </a></td>
                                                                         
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
  $scope.searchText1 ="";

   $scope.searchText2 ="";
   $scope.searchText3 ="";
  

   $scope.searchTextChanged1 = function() {
      
        $scope.fetchData('orders','0','0');
    }
    
      $scope.searchTextChanged2= function() {
      
        $scope.fetchData2('orders_quotation','0','0');
    }
    
     $scope.searchTextChanged3= function() {
     
        $scope.fetchData3('orders_process','0','0');
    }
    
   $scope.disable_load = function() {
        localStorage.setItem('isButtonDisabled1', '0');
    }

  $scope.fetchData = function(tabelename,fromdate,todate){
      
      
      var  fromdate=$('#from-date').val();
      var  fromto=$('#to-date').val();
      var tabelename="orders";
    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_date_waise?tablename='+tabelename+ '&search=' + $scope.searchText1 +'&formdate='+fromdate+'&todate='+todate).success(function(data){
        
        
        
      $scope.namesData1 = data;
    });
  };

  $scope.fetchData2 = function(tabelename,fromdate,todate){
      
      
      var  fromdate=$('#from-date').val();
      var  fromto=$('#to-date').val();
       var tabelename="orders_quotation";
       $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_date_waise?tablename='+tabelename+ '&search=' + $scope.searchText2 +'&formdate='+fromdate+'&todate='+todate).success(function(data){
        
      
      $scope.namesData2 = data;
    });
  };

 $scope.fetchData3 = function(tabelename,fromdate,todate){
     
     
      var  fromdate=$('#from-date').val();
      var  fromto=$('#to-date').val();
      var tabelename="orders_process";
    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_date_waise?tablename='+tabelename+ '&search=' + $scope.searchText3 +'&formdate='+fromdate+'&todate='+todate).success(function(data){
        
    
        
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



