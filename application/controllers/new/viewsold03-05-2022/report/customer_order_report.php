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
                                    <h4 class="mb-sm-0 font-size-18">Customer Order Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Customer Order Report !</li>
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
                              <div class="col-md-4" > <!--data-trigger -->
                              <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default"   ng-model="getproductval">
                                                            <option value="ALL">ALL Customers</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($customers as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->company_name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                            </div>
                            
                            
                            
                            
                            
                            
                            <div class="col">
                              <input type="date" class="form-control" id="from-date" value="<?php echo  date('Y-m-d',strtotime("-1 days")); ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                           
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata" >Export</button>
                            </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                     
                  <div id="search-view" >
                      
                     
                                    <div class="card-header"  ng-init="fetchSingleData(0)">
                                      
                                           <h4 class="card-title">Customer Order Report {{formdate}} To {{todate}}</h4>
                                           
                                        </p>
                                    </div>
                   
                     <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                   
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"  ng-init="fetchDatagetlegderGroup('ALL',formdate,todate)" >
                      <thead>
                        <tr>


                          <th>No</th>
                          <th>Customer Name</th>
                          <th>NO Of Orders</th>
                          <th>Order Value</th>
                          
                        </tr>
                      </thead>
                        <tbody   >
                            
                            
                        <tr  class="trpoint" ng-repeat="names in namesDataledgergroup | filter:query">
                          
                           <td>{{names.no}}</td>
                           <td>{{names.customername}}</td>
                           <td>{{names.no_of_orders}}</td>
                             <td>{{names.totalvalue}}</td>
                            
                        </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            
                            <td><b>{{totalqty}}</b></td>
                            <td><b>{{totalamount}}</b></td>
                            
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
      
      
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
      
      url = '<?php echo base_url() ?>index.php/report/fetch_data_get_customer_order_report_export?limit=10&cate_id='+cateid+'&formdate='+fromdate+'&todate='+fromto;
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
  $scope.formdate = '<?php  echo date('Y-m-d',strtotime("-1 days")); ?>';
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
     
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
    
   
      $scope.formdate = fromdate;
      $scope.todate = fromto;
   
      $('#search-view').show();
      $('#exportdata').show();
      
      $scope.fetchDatagetlegderGroup(cateid,fromdate,fromto);
    
    
    
};




$scope.fetchDatagetlegderGroup = function(cateid,fromdate,fromto){
    

    
    $http.get('<?php echo base_url() ?>index.php/report/fetch_data_get_customer_order_report?limit=10&cate_id='+cateid+'&formdate='+fromdate+'&todate='+fromto).success(function(data){
      
      $scope.query = {}
      $scope.queryBy = '$';
      
      
      $scope.namesDataledgergroup = data;
      
      
      
        var totalqty = 0;
        for(var i = 0; i < data.length; i++){
            var qty = parseInt(data[i].no_of_orders);
            totalqty += qty;
        }
      
      
      
        $scope.totalqty = totalqty;
      
      
      
      
      
         var totalamount = 0;
        for(var i = 0; i < data.length; i++){
            var balance = parseInt(data[i].totalvalue);
            totalamount += balance;
        }
      
        $scope.totalamount = totalamount;
        
        
     
        
      
    });
    
    
  };
  
  
  
  
  

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>




