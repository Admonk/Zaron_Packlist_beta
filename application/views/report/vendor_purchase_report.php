<?php  include "header.php"; ?>

<style>
.trpoint {
    
    cursor: pointer;
   
}
td.ng-binding {
    font-size: 11px;
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
                                    <h4 class="mb-sm-0 font-size-18">Purchase Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Purchase Report !</li>
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
                                                            <option value="ALL">ALL Vendors</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($vendor as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                            </div>
                            
                            
                            
                            
                            
                            
                            <div class="col">
                              <input type="date" class="form-control" id="from-date" value="<?php echo $this->session->userdata['logged_in']['from_date']; ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" value="<?php echo $this->session->userdata['logged_in']['to_date']; ?>">
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
                                      
                                           <h4 class="card-title">Purchase Report</h4>
                                           
                                        </p>
                                    </div>
                   
                   
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"  ng-init="fetchDatagetlegderGroup('ALL',formdate,todate,'ALL')" >
                      <thead>
                        <tr>


                          <th>No</th>
                          <th>Date</th>
                          <th>Order No</th>
                          <th>Vendor Name</th>
                          <th>GST</th>
                          <th>Purchase Value</th>
                          <th>Status</th>
                          
                          
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup" >
                            
                            
                        <tr  class="trpoint" >
                          
                           <td>{{names.no}}</td>
                           <td>{{names.order_date}}</td>
                           <td>{{names.order_no}}</td>
                           <td>{{names.customername}}</td>
                          <td>{{names.gst | number}}</td>
                           <td>{{names.totalvalue | number}}</td>
                            <td>{{names.status}}</td>
                        </tr>
                          <tfoot>
                            <td></td>
                           <td></td>
                           <td></td>
                           <th>Total</th>
                          <th>{{gstvalue | number}}</th>
                           <th>{{totalamount | number}}</th>
                            <th></th>
                      </tfoot>
                      
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
       var order_base= $('#order_base').val();
    
      
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
      
      url = '<?php echo base_url() ?>index.php/report/fetch_data_get_customer_vendor_purchase_export?limit=10&cate_id='+cateid+'&formdate='+fromdate+'&todate='+fromto+'&order_base='+order_base;
      location = url;

});


});
</script>
<script>

var app = angular.module('crudApp', ['datatables']);
 app.filter('number', function () {
    return function (input) {
        if (!isNaN(input)) {
            if (input != 0 && input != null) {
                if (isNaN(input)) return input;

                var isNegative = false;
                if (input < 0) {
                    isNegative = true;
                    input = Math.abs(input);
                }

                var formattedValue = parseFloat(input);
                var decimal = formattedValue.toLocaleString('en-IN', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                });

                if (isNegative) {
                    decimal = '-' + decimal;
                }

                return decimal;
            } else {
                return '0';
            }
        }
    };
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
     
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
      var order_base= $('#order_base').val();
    
   
      $scope.formdate = fromdate;
      $scope.todate = fromto;
   
      $('#search-view').show();
      $('#exportdata').show();
      
      $scope.fetchDatagetlegderGroup(cateid,fromdate,fromto,order_base);
    
    
    
};




$scope.fetchDatagetlegderGroup = function(cateid,fromdate,fromto,order_base){
    

    
    $http.get('<?php echo base_url() ?>index.php/report/fetch_data_get_vendor_purchase_report?limit=10&cate_id='+cateid+'&formdate='+fromdate+'&todate='+fromto+'&order_base='+order_base).success(function(data){
      $scope.namesDataledgergroup = data;
      
      
      
      var totalgst = 0;
        for(var i = 0; i < data.length; i++){
            var gst = parseInt(data[i].gst);

            totalgst += gst;
        }
      
      
      
        $scope.gstvalue= totalgst;
      
      
      
      
      
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



