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
                                    <h4 class="mb-sm-0 font-size-18">Sales Product Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Sales Product Report !</li>
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
                              <div class="col-md-3" > <!--data-trigger -->
                              <select class="form-control" name="choices-single-default" id="choices-single-default" ng-change='getProduct()'  ng-model="getproductval">
                                                            <option value="ALL">ALL Category</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($categories as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->categories; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                            </div>
                            
                            
                            
                            
                             <div class="col-md-2" >
                              <select class="form-control"  name="choices-single-default"  id="choices-single-default-1"  ng-init="productlist(0)">
                                               <option value="ALL">ALL Products</option>
                                               <option ng-repeat="namesp in productlistdata" value="{{namesp.id}}"> {{namesp.product_name}} </option>
                                                  
                             </select>
                            </div>
                            
                            
                            <div class="col">
                              <input type="date" class="form-control" id="from-date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col">
                             <select class="form-control" id="payment_status">
                                 <option value="ALL">All</option>
                                 <option value="3">Approved </option>
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
                         
                         
                         
                     
                     
                     
                     
                  <div id="search-view" >
                      
                     
                                    <div class="card-header"  ng-init="fetchSingleData(0)">
                                      
                                           <h4 class="card-title">Sales Product Report {{formdate}} To {{todate}}</h4>
                                           
                                        </p>
                                    </div>
                                    
                      <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                   
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"  ng-init="fetchDatagetlegderGroup('ALL','ALL',formdate,todate,'ALL')" >
                      <thead>
                        <tr>


                          <th>No</th>
                          <th>Date</th>
                          <th>Order No</th>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>QTY</th>
                          <th>Amount</th>
                        
            
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup | filter:query" >
                            
                            
                        <tr  class="trpoint" >
                          
                           <td>{{names.no}}</td>
                           <td>{{names.create_date}} </td>
                           <td>{{names.order_no}}</td>
                           <td>{{names.product_name}}</td>
                           <td>{{names.rate}}</td>
                           <td>{{names.qty}}</td>
                           <td>{{names.total | number}}</td>
                          
                            
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
      url = '<?php echo base_url() ?>index.php/report/fetch_data_get_ledger_view_export?limit=10&cate_id='+cateid+'&productid='+productid+'&formdate='+fromdate+'&todate='+fromto+'&order_status='+order_status;
      location = url;

});


});
</script>
<script>

var app = angular.module('crudApp', ['datatables']);
app.filter('number', function () {        
    return function (input) {
        if (! isNaN(input)) {
            var currencySymbol = '₹ ';
            //var output = Number(input).toLocaleString('en-IN');   <-- This method is not working fine in all browsers!           
            var result = input.toString().split('.');

            var lastThree = result[0].substring(result[0].length - 3);
            var otherNumbers = result[0].substring(0, result[0].length - 3);
            if (otherNumbers != '')
                lastThree = ',' + lastThree;
            var output = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
            
            if (result.length > 1) {
                output += "." + result[1];
            }            

            return currencySymbol + output;
        }
    }
});
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;
  $scope.getproductval = 'ALL';
  $scope.formdate = '<?php  echo date('Y-m-d'); ?>';
  $scope.todate = '<?php  echo date('Y-m-d'); ?>';

 
 
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
   
   
      $scope.formdate = fromdate;
      $scope.todate = fromto;
   
      $('#search-view').show();
      $('#exportdata').show();
      
      $scope.fetchDatagetlegderGroup(cateid,productid,fromdate,fromto,order_status);
    
    
    
};




$scope.fetchDatagetlegderGroup = function(cateid,productid,fromdate,fromto,order_status){
    

    
    $http.get('<?php echo base_url() ?>index.php/report/fetch_data_get_ledger_view?limit=10&cate_id='+cateid+'&productid='+productid+'&formdate='+fromdate+'&todate='+fromto+'&order_status='+order_status).success(function(data){
    
    
      $scope.query = {}
      $scope.queryBy = '$';
    
      $scope.namesDataledgergroup = data;
      
      
      
        var totalqty = 0;
        for(var i = 0; i < data.length; i++){
            var qty = parseInt(data[i].qty);
            totalqty += qty;
        }
      
      
      
        $scope.totalqty = totalqty;
      
      
      
      
      
         var totalamount = 0;
        for(var i = 0; i < data.length; i++){
            var balance = parseInt(data[i].totalamount);
            totalamount += totalamount;
        }
      
        $scope.totalamount = totalamount;
        
        
     
        
      
    });
    
    
  };
  
  
  
  
  

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>



