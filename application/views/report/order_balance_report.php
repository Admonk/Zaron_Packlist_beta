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
.choices__inner {
     padding: 0px 9px;
    
    }
    .choices__input {
   
     background-color: #fff;
    
    
    }
    .choices__list--multiple .choices__item {
    display: inline-block;
    vertical-align: middle;
    border-radius: 20px;
    padding: 3px 8px;
    font-size: 12px;
    font-weight: 500;
    margin-right: 3.75px;
    margin-bottom: -2.25px;
    background-color: #00bcd4;
    border: 1px solid #fff;
    color: #fff;
    word-break: break-all;
    box-sizing: border-box;
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
                              <input type="date" class="form-control" id="from-date" min="<?php echo date('2023-10-01'); ?>" value="<?php echo  date('Y-m-d') ; ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" min="<?php echo date('2023-10-01'); ?>" value="<?php echo  date('Y-m-d') ; ?>">
                            </div>
                            
                            <div class="col">
                                                     
                                  <select class="form-control" id="payment_mode">
                                 <option value="ALL">Payment Mode All</option>
                                 <option value="Cash">Cash</option>
                                 <option value="Bank Transfer">Online / Bank</option>
                                 <option value="Cheque">Cheque</option>
                                 </select>
                                 
                                   
                             
                            </div>
                            
                             <div class="col">
                             <select class="form-control" placeholder="Select Status"  data-trigger multiple place  id="payment_status">
                                 <option value="ALL"  selected>All</option>
                                 <option value="11">UN Dispatched / Sheet In Factory</option>
                                 <option value="12">Driver UN-picked </option>
                                 <option value="1">Trip Not Started </option>
                                 <option value="2">Trip Started & Un-Delivered</option>
                                 <option value="3">Delivered & Pending collection </option>
                                
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
                                      
                                           <h4 class="card-title">Sales Balance Report <?php echo date('01-m-Y'); ?> To <?php echo date('d-m-Y'); ?></h4>
                                           
                                        </p>
                                    </div>
                   </div> 
                   <br><br>
                    <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
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
                          
                        
                          <th >Status</th>
                          <th>Payment Mode</th>
                          <!--<th >Payment Status</th>-->
            
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup | filter:query" >
                            
                            
                        <tr  class="trpoint">
                          
                           <td>{{names.no}}</td>
                           <td>{{names.create_date}} </td>
                           <td>{{names.order_no}}</td>
                           <td>{{names.customername}}</td>
                           <td><b>{{names.total | number}}</b></td>
                           <td><b>{{names.collectamount | number}}</b></td>
                           <td><b>{{names.pending_amount | number}}</b></td>
                           
                           <td >{{names.status}}</td>
                           <td>{{names.payment_mode}}</td>
                           <!--<td >{{names.payment_status}}</td>-->
                            
                        </tr>
                        
                        
                        
                      
                      </tbody>
                      
                      
                      <tr>
                          <td></td>
                           <td></td>
                            <td></td>
                          <td></td>
                          <td><b>{{totalamount | number}}</b></td>
                          <td><b>{{collectamountbalval | number}}</b></td>
                          <td><b>{{pendingamount | number}}</b></td>
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
app.filter('number', function () {        
    return function (input) {
        if (! isNaN(input)) {
            var currencySymbol = '';
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
   
   
    $scope.query = {}
      $scope.queryBy = '$';
      
   
   
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



