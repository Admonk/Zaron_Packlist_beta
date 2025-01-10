<?php  include "header.php"; ?>

<style>
.trpoint {
    
    cursor: pointer;
   
}
.trpoint:hover {
    background: antiquewhite;
}
.card-header {
    display: block;
    text-align: center;
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
                                    <h4 class="mb-sm-0 font-size-18">Order Balance Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Order Balance Report !</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card">

                  
                  <div class="card-body" >


                <div class="row">
                   
                    
                    <div class="col-lg-12" >
                        <p class="mb-sm-0 font-size-18">Search</p>  
                      <form>
                          <div class="row">
                              
                            
                            
                            
                            <div class="col">
                              <input type="date" class="form-control" id="from-date" value="<?php echo date('Y-m-d',strtotime('-1 days')); ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" value="<?php echo date('Y-m-d',strtotime('-1 days')); ?>">
                            </div>
                            
                            <div class="col">
                                                     
                                  <select class="form-control" id="payment_mode">
                                 <option value="ALL">Payment Mode All</option>
                                 <option value="Cash">Cash</option>
                                 <option value="Bank Transfer">Online / Bank</option>
                                 <option value="Cheque">Cheque</option>
                                 </select>
                                 
                                   
                             
                            </div>
                            
                             <div class="col" style="display:none;">
                             <select class="form-control" id="payment_status">
                                 <option value="ALL">All</option>
                                 <option value="2">Order Completed</option>
                                   <!--<option value="3">Finance Approved </option>-->
                                 <option value="4">Delivered </option>
                                 <option value="5">Reconciliation </option>
                             </select>
                            </div>
                            
                            
                            
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata" >Export</button>
                            </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                     
                  <div id="search-view" style="display:none;" >
                      
                                     <div class="card-header"  ng-init="fetchSingleData(0)">
                                      
                                           <h4 class="card-title">Sales Balance Report {{formdate}} To {{todate}}</h4>
                                           
                                        </p>
                                    </div>
                   </div> 
                   
                   <div id="search-view1"  >
                      
                                     <div class="card-header"  ng-init="fetchSingleData(0)">
                                      
                                           <h4 class="card-title">Yesterday Sales Balance Report <?php echo date('d-m-Y',strtotime('-1 days')); ?></h4>
                                           
                                        </p>
                                    </div>
                   </div> 
                   <br><br>
                   
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"  ng-init="fetchDatagetlegderGroup(0)" >
                      <thead>
                        <tr>


                          <th>No</th>
                          <th>Date</th>
                          <th>Order No</th>
                          <th>Customer Name</th>
                          <th>Bill Amount</th>
                          <th>Collection</th>
                          <th>Pending Amount</th>
                          
                          <th>Payment Mode</th>
                          <th style="display:none;">Status</th>
                          <th style="display:none;">Payment Status</th>
            
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup" >
                            
                            
                        <tr  class="trpoint">
                          
                           <td>{{names.no}}</td>
                           <td>{{names.create_date}} </td>
                           <td>{{names.order_no}}</td>
                           <td>{{names.customername}}</td>
                           <td><b>{{names.total}}</b></td>
                           <td><b>{{names.collectamount}}</b></td>
                           <td><b>{{names.pending_amount}}</b></td>
                           <td>{{names.payment_mode}}</td>
                           <td style="display:none;">{{names.status}}</td>
                           <td style="display:none;">{{names.payment_status}}</td>
                            
                        </tr>
                        
                        
                        
                      
                      </tbody>
                      
                      
                      <tr>
                          <td></td>
                           <td></td>
                            <td></td>
                          <td></td>
                          <td><b>{{totalamount}}</b></td>
                          <td><b>{{collectamountbalval}}</b></td>
                          <td><b>{{pendingamount}}</b></td>
                           <td></td>
                      </tr>
                      
                    </table>
              
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                        
                    </div>
                    
                </div>




                  



                  </div>
                </div>
              </div>
            </div>

                        
                    </div>
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->

            







        </div>
    </div>

 
   

<script>
$(document).ready(function(){
 
  $('#payment_mode_payoff').on('change',function(){
      
      var val=$(this).val();
      
      if(val=='Cash')
      {
          $('#res_no').hide();
      }
      else
      {
          $('#res_no').show();
      }
      
  });
  
  
$('#exportdata').on('click', function() {
  
  
      var cateid= $('#choices-single-default').val();
      var productid= $('#choices-single-default-1').val();
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
      var order_status= $('#payment_status').val();
      var payment_mode= $('#payment_mode').val();
      url = '<?php echo base_url() ?>index.php/report/fetch_data_sales_balance_report_export?limit=10&cate_id='+cateid+'&productid='+productid+'&formdate='+fromdate+'&todate='+fromto+'&order_status='+order_status+'&payment_mode='+payment_mode;
      location = url;

});


});
</script>
<script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;
  $scope.getproductval = 'ALL';


 
 
 $scope.getProduct = function(){
     var cate_id= $('#choices-single-default').val();;
     
     $scope.productlist(cate_id);
     
 }; 

 $scope.productlist = function (cate_id) {
    
    
    
   
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/report/productlist",
          data:{'cate_id':cate_id}
          }).success(function(data){
    
             $scope.productlistdata = data;
         
          });
          
      
}



$scope.search = function(){
    
      var cateid= $('#choices-single-default').val();
      var productid= $('#choices-single-default-1').val();
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
      var order_status= $('#payment_status').val();
      var payment_mode= $('#payment_mode').val();
   
      $scope.formdate = fromdate;
      $scope.todate = fromto;
   
      $('#search-view').show();
      $('#search-view1').hide();
      $('#exportdata').show();
      
      $scope.fetchDatagetlegderGroup(cateid,productid,fromdate,fromto,order_status,payment_mode);
    
    
    
};




$scope.fetchDatagetlegderGroup = function(cateid,productid,fromdate,fromto,order_status,payment_mode){
    

    
    $http.get('<?php echo base_url() ?>index.php/report/fetch_data_sales_balance_report?limit=10&formdate='+fromdate+'&todate='+fromto+'&order_status='+order_status+'&payment_mode='+payment_mode).success(function(data){
      $scope.namesDataledgergroup = data;
      
      
      
      
      
         var totalamount = 0;
        for(var i = 0; i < data.length; i++){
            var balance = parseInt(data[i].total);
            totalamount += balance;
        }
      
        $scope.totalamount = totalamount;
        
        
        var pendingamount = 0;
        for(var i = 0; i < data.length; i++){
            var pending_balance = parseInt(data[i].pending_amount);
              pendingamount += pending_balance;
        }
      
        $scope.pendingamount = pendingamount;
        
        
        
          var collectamountbalval = 0;
        for(var i = 0; i < data.length; i++){
            var collectamountcc = parseInt(data[i].collectamount);
              collectamountbalval += collectamountcc;
        }
      
        $scope.collectamountbalval = collectamountbalval;
        
        
      
    });
    
    
  };
  
  
  
  
  

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>



