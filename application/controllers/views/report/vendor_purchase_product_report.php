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
                                    <h4 class="mb-sm-0 font-size-18">Purchase Product Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Purchase Product Report !</li>
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
                              <input type="date" class="form-control" id="from-date" min="<?php echo date('Y-04-01'); ?>" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" min="<?php echo date('Y-04-01'); ?>" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            
                            
                              <div class="col">
                               <select class="form-control"   id="order_base"   >
                                                            
                                                            
                                                            <option value="ALL">ALL Status</option>
                                                           <option  value="0">Open Requisition</option>
                                                           <option  value="1">Enquiry  Request</option>
                                                           <option  value="2">PO</option>
                                                           <option  value="10">Invoice Created</option>
                                                           <option  value="9">Schedule Payment</option>
                                                           <option  value="3">Partial Payout</option>
                                                           <option  value="4">Full Payout</option>
                                                           <option  value="5">Dispatched</option>
                                                           <option  value="6">Delivered</option>
                                                           <option  value="8">Inward Complated</option>
                                                           <option  value="-1">Cancelled</option>
                                                           
                                                           
                                                            
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
                                      
                                           <h4 class="card-title">Purchase Product Report {{formdate}} To {{todate}}</h4>
                                           
                                        </p>
                                    </div>
                   
                   
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"  ng-init="fetchDatagetlegderGroup('ALL','ALL',formdate,todate,'ALL')" >
                      <thead>
                        <tr>


                          <th>No</th>
                          <th>Date</th>
                          <th>Order No</th>
                          <th>Product name</th>
                          <th>QTY</th>
                          <th>Price</th>
                          <th>GST</th>
                          <th>Total Amount</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup" >
                            
                            
                        <tr  class="trpoint" >
                          
                           <td>{{names.no}}</td>
                           <td>{{names.create_date}} </td>
                           <td>{{names.order_no}}</td>
                           <td>{{names.product_name}}</td>
                           <td>{{names.qty}}</td>
                           <td>{{names.rate}}</td>
                           <td>{{names.gst | number }}</td>
                           <td>{{names.totalamount | number }}</td>
                          <td>{{names.status}}</td>
                            
                        </tr>
                        
                        
                        
                        
                     
                        
                         
                        
                      
                      </tbody>
                      <tfoot>
                          <tr>
                          
                           <td></td>
                           <td> </td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td>Total</td>
                           <td>{{gstvalue | number }}</td>
                           <td>{{totalvalue | number }}</td>
                           <td></td>
                            
                        </tr>
                        
                      </tfoot>
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
        var order_base= $('#order_base').val();
     
      
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
     
      url = '<?php echo base_url() ?>index.php/report/fetch_data_vendor_purchase_product_export?limit=10&cate_id='+cateid+'&productid='+productid+'&formdate='+fromdate+'&todate='+fromto+'&order_base='+order_base;
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
  $scope.formdate = '<?php echo $this->session->userdata['logged_in']['from_date']; ?>';
  $scope.todate = '<?php echo $this->session->userdata['logged_in']['to_date']; ?>';

 
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
      var order_base= $('#order_base').val();
    
   
      $scope.formdate = fromdate;
      $scope.todate = fromto;
   
      $('#search-view').show();
      $('#exportdata').show();
      
      $scope.fetchDatagetlegderGroup(cateid,productid,fromdate,fromto,order_base);
    
    
    
};




$scope.fetchDatagetlegderGroup = function(cateid,productid,fromdate,fromto,order_base){
    

    
    $http.get('<?php echo base_url() ?>index.php/report/fetch_data_vendor_purchase_product_view?limit=10&cate_id='+cateid+'&productid='+productid+'&formdate='+fromdate+'&todate='+fromto+'&order_base='+order_base).success(function(data){
      $scope.namesDataledgergroup = data;
      
      
      
        var totalgst = 0;
        for(var i = 0; i < data.length; i++){
            var gst = parseInt(data[i].gst);
            totalgst += gst;
        }
      
      
      
        $scope.gstvalue = totalgst;
      
      
      
      
      
         var totalamount = 0;
        for(var i = 0; i < data.length; i++){
            var balance = parseInt(data[i].totalamount);
            totalamount += balance;
        }
      
        $scope.totalvalue = totalamount;
        
        
     
        
      
    });
    
    
  };
  
  
  
  
  

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>


