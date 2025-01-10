<?php  include "header.php"; ?>
<style>
.trpoint {
    
    cursor: pointer;
   
}
.trpoint:hover {
    background: antiquewhite;
}
</style>
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>
















 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Ledger</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/customer/customer_add">Customer Form</a></li>
                                            <li class="breadcrumb-item active">  Ledger List </li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">
                                        <h4 class="card-title">Customer List Table</h4>
                                        <br>
                                        
                    </div>
                  <div class="card-body" >

                     <div class="row">  
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                  
                   
                   <div class="col-lg-12">
                       
                        <p class="mb-sm-0 font-size-18">Search  Date</p>  
                      <form>
                          <div class="row">
                            <div class="col">
                              <input type="date" class="form-control" id="from-date" value="<?php echo date('Y-m-01'); ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" value="<?php echo date('Y-m-t'); ?>">
                            </div>
                           
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                            </div>
                          </div>
                      </form>
                         <br>
                               
                   <h4 class="mb-sm-0 font-size-18">Customer Name :  <?php echo $name; ?></h4>  
                   <br>

                    <div  ng-init="fetchDatagetlegder(<?php echo $customer_id; ?>)">
                
                   <table  class="table table-bordered dt-responsive  nowrap w-100" >
                      <thead>
                        <tr>
                          <th>No</th>
                         
                          <th>Date</th>
                         
                          <th>Bill No</th>
                          <th>PayRef</th>
                          <th>Amount</th>
                          <th>Payable</th>
                          <th>Paid</th>
                        
                         
            
                        </tr>
                        
                         <tbody>
                        <tr ng-repeat="names in namesDataledger"  id="show_{{name.id}}" class="trpoint" >
                          
                          
                           <td>{{names.no}}</td>
                           <td>{{names.payment_date}} {{names.payment_time}}</td>
                           <td>{{names.order_no}}</td>
                           <td>{{names.payment_mode}}  <span ng-if="names.reference_no!=''"><small>{{names.reference_no}}</small></span></td>
                           <td>{{names.amount}}</td>
                           <td>{{names.paid_status}}</td>
                           <td>{{names.collected_amount}}</td>
                          
                        </tr>
                        
                        <tr>
                        <td ng-show="namesDataledger.length==0">
                            No data Found.                
                        </td>
                       </tr>
                        
                        <tr ng-show="namesDataledger.length>0">
                            
                            <td>Total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>{{amounttotal}}</b></td>
                            <td><b>{{paid_statustotal}}</b></td>
                            <td><b>{{collected_amounttotal}}</b></td>
                            
                        </tr>
                        
                      
                      </tbody>
                      </thead>
                    
                    </table>
                 
                  </div>

                   </div>
                      </div>

                  </div>
                </div>
              </div>
            </div>

                        
                    </div>
                    <!-- container-fluid -->


                </div>
               





        </div>
    </div>




                       
                                                
                                                

<script>






var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



 


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/customer/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };

 
 








$scope.search = function(){
    
    
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
   
    
    
    $scope.fetchDatagetlegder(<?php echo $customer_id; ?>,fromdate,fromto);
    
    
    
    
    
};





 $scope.fetchDatagetlegder = function(id,fromdate,fromto){
    $http.get('<?php echo base_url() ?>index.php/customer/fetch_data_get_ledger_view?limit=0&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto).success(function(data){
      $scope.namesDataledger = data;
      
      
      
      
      
      
      
      
      
      
         var amounttotal = 0;
        for(var i = 0; i < data.length; i++){
            var amount = parseInt(data[i].amount);
            amounttotal += amount;
        }
      
      
      
        $scope.amounttotal = amounttotal;
      
      
      
      
      
         var paidstatustotal = 0;
        for(var i = 0; i < data.length; i++){
            var paid_status = parseInt(data[i].paid_status);
            paidstatustotal += paid_status;
        }
      
      
      
        $scope.paid_statustotal = paidstatustotal;
        
        
        
        
        var collectedamounttotal = 0;
        for(var i = 0; i < data.length; i++){
            var collected_amount = parseInt(data[i].collected_amount);
            collectedamounttotal += collected_amount;
        }
      
      
      
        $scope.collected_amounttotal = collectedamounttotal;
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
    });
  };

   
   
   
 
   
   
});









</script>
    <?php include ('footer.php'); ?>
</body>


