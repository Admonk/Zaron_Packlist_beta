<?php  include "header.php"; ?>
<?php
                     $customer_id=0;
                     if(isset($_GET['customer_id']))
                     {
                        $customer_id= $_GET['customer_id'];
                     }
                     ?>
                     
<?php

$date=date("Y-m-d");
if(isset($_GET['months']))
{
   $mm= date('m',strtotime($_GET['months']));
   $date=date("Y-".$mm."-01");  
}

?>
                     
<style>
.trpoint {
    
    cursor: pointer;
   
}
.table>tbody {
    vertical-align: middle;
    font-size: 11px;
}

.trpoint:hover {
    background: antiquewhite;
}
.card-header {
    display: block;
    text-align: center;
}
.loading {
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
                                    <h4 class="mb-sm-0 font-size-18">Daily Sales Report </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Daily Sales Report !</li>
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
                              
                            
                             <div class="col" > <!--data-trigger -->
                              <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                                                            
                                                            <?php
                                                                 if($this->session->userdata['logged_in']['access']!='12')
                                                                 {
                                                                     
                                                                     ?>
                                                                      <option value="ALL">All Sales Team</option>
                                                                     <?php
                                                                     
                                                                 }
                                                            ?>
                                                            
                                                            <?php
                                                            
                                                            foreach($customers as $val)
                                                            {
                                                                
                                                                if($val->status==1)
                                                                {
                                                                    
                                                                
                                                                         if($this->session->userdata['logged_in']['access']=='12')
                                                                         {
                                                                             if($this->session->userdata['logged_in']['userid']==$val->id)
                                                                             {
                                                                                 
                                                                             ?>
                                                                             
                                                                             <option  value="<?php echo $val->id; ?>" seletced><?php echo $val->name; ?></option>
                                                                      
                                                                             <?php 
                                                                            
                                                                             }
                                                                             
                                                                         }
                                                                         else
                                                                         {
                                                                             ?>
                                                                             
                                                                             <option  value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                                  
                                                                             <?php
                                                                         }
                                                                         
                                                                 
                                                                }
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                            </div>
                            
                            <div class="col">
                              <input type="date" class="form-control" min="<?php echo date('Y-07-01'); ?>" id="from-date" value="<?php echo $date; ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" min="<?php echo date('Y-07-01'); ?>" id="to-date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col">
                             <select class="form-control" id="payment_status">
                                 <option value="ALL">All Orders</option>
                                 <option value="-1">Canceled </option>
                                 <option value="11">Deleted </option>
                             </select>
                            </div>
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata" >Export</button>
                            </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                <div ng-init="fetchDatagetlegderGroup(0)"></div> 
                    
                
                  <div id="search-view" style="display:none;" >
                      
                                     <div class="card-header"  ng-init="fetchSingleData(0)">
                                      
                                           <h4 class="card-title"> Sales Day  {{formdate}} To {{todate}}</h4>
                                             <h5>Total Sales : <b>{{totalamount | number  }}</b></h5>
                                        
                                    </div>
                   </div> 
                   
                   <?php
                   if($customer_id==0)
                   {
                       ?>
                       
                       <div id="search-view1"  >
                      
                                     <div class="card-header"   >
                                      
                                           <h4 class="card-title">Sales Book</h4>
                                           
                                           <h5>Today Total Sales : <b>{{totalamount | number  }}</b></h5>
                                       
                                    </div>
                   </div> 
                       
                       <?php
                   }
                   ?>
                   
                    
                   
                   
                   
                   <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"   >
                      <thead>
                        <tr>


                          <th>No</th>
                          <th>Bill No</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Customer_Name</th>
                          <th>Phone</th>
                          <th>Area</th>
                          <th>Net_Amount</th>
                          <th>Payment_Mode</th>
                          <th>Driver</th>
                          <!--<th>Sales Person</th>-->
                          <!--<th>Behalf of</th>-->
                          <th>Order By</th>
                          <th>Status</th>
                          <th>Action</th>
            
                        </tr>
                      </thead>
                       <tr><td colspan="10"><loading></loading></td></tr>
                        <tbody  ng-repeat="names in namesDataledgergroup | filter:query" >
                            
                            
                        <tr  class="trpoint">
                          
                           <td>{{names.no}}</td>
                           <td>{{names.order_no}}</td>
                           <td>{{names.create_date}} </td>
                           <td>{{names.create_time}} </td>
                           <td>{{names.customername}}</td>
                            <td>{{names.phone}}</td>
                           <td>{{names.route_name}}</td>
                           <td><b>{{names.total | number }}</b></td>
                             <td>{{names.payment_mode}}</td>
                             <td>{{names.driver}}</td>

                           <!--<td>{{names.sales_team}}</td>-->
                           <td>{{names.behalf_of}}</td>
                           <!--<td>{{names.order_by}}</td>-->
                           <td>{{names.reason}}</td>

                           <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{names.base_id}}" target="_blank" >VIEW</a></td>
                            
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
      url = '<?php echo base_url() ?>index.php/report/fetch_data_sales_report_daily_export?limit=10&sales_id='+cateid+'&productid='+productid+'&formdate='+fromdate+'&todate='+fromto+'&order_status='+order_status;
      location = url;

});


});
</script>
<script>

var app = angular.module('crudApp', ['datatables']);


app.directive('loading', function () {
      return {
        restrict: 'E',
        replace:true,
        template: '<div class="loading"><img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" width="20" height="20" /> LOADING...</div>',
        link: function (scope, element, attr) {
              scope.$watch('loading', function (val) {
                  if (val)
                      $(element).show();
                  else
                      $(element).hide();
              });
        }
      }
})


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
     
     //$scope.productlist(cate_id);
     
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
       $('#search-view1').hide();
      $('#exportdata').show();
      
      $scope.fetchDatagetlegderGroup(cateid,productid,fromdate,fromto,order_status);
    
    
    
};




$scope.fetchDatagetlegderGroup = function(cateid,productid,fromdate,fromto,order_status){
    
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
      var order_status= $('#payment_status').val();
     
    $scope.loading = true;
    $http.get('<?php echo base_url() ?>index.php/report/fetch_data_sales_report_daily?limit=10&customer_id=<?php echo $customer_id; ?>&formdate='+fromdate+'&todate='+fromto+'&order_status='+order_status+'&sales_id='+cateid).success(function(data){
      
      
      
      
       $scope.query = {}
      $scope.queryBy = '$';
      
      
      
      
      
      $scope.namesDataledgergroup = data;
      
      
      
       $scope.loading = false;
      
         var totalamount = 0;
        for(var i = 0; i < data.length; i++){
            var balance = parseInt(data[i].total);
            totalamount += balance;
        }
      
        $scope.totalamount = totalamount;
        
        
      
    });
    
    
  };
  
  
  
  
  

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>



