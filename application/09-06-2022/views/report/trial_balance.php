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

::-webkit-scrollbar {
    height: 10px !important;
    width: 10px !important;
    cursor: pointer;
}


.ui-widget.ui-widget-content {
    border: 1px solid #d3d3d3;
    z-index: 999999;
}
.table-bordered {
    border: 1px solid #e9e9ef;
    table-layout: fixed;
}


table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}


td{

  text-align: left;
  padding: 8px;
}

th {
  border-top: 1px solid #000;
   border-bottom: 1px solid #000;
  text-align: left;
  padding: 8px;
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
                                    <h5 class="mb-sm-0 mt-3 font-size-15">Balance Sheet </h5>

                                  

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card" style="background: #cfeecf;">

                  
                  <div class="card-body" >


                <div class="row" >
                   
                    
                    <div class="col-lg-12"  >
                        <!--<p class="mb-sm-0 font-size-18">Search</p>  -->
                      <form>
                          <div class="row" style="display:none;">
                              
                            
                            
                            
                            <div class="col">
                              <input type="date" class="form-control" id="from-date" value="<?php echo date('Y-m-01'); ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" value="<?php echo date('Y-m-t'); ?>">
                            </div>
                            
                          
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata" style="display:none;">Export</button>
                            </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                     
                  <div id="search-view" style="display:none;" >
                      
                                     <div class="card-header"  ng-init="fetchSingleData(0)">
                                      
                                          
                                            <h4 class="card-title"> Balance {{formdate}} To {{todate}}</h4>
                                      
                                    </div>
                   </div> 
                   
                  
                  
                           
                           
                          <div class="row">
                              
                          
                   
                         <div class="col-md-12" style="border-right: #919191 solid 1px;">
                        <input type="text" style="display:none;" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                    <div class="table-responsive">                
                 
                   
<p>Balance Sheet as at <?php echo date('d'); ?>  <?php echo date('M'); ?>  <?php echo date('Y'); ?></p>
<p> (All amounts are in Indian Rupees unless otherwise stated) </p>
                   
                 <h4>'Balance Sheet as at 31 March 2021</h4>
<h4> (All amounts are in Indian Rupees unless otherwise stated) </h4>

<table>
  <tr>
    <th>Particulars</th>
    <th> Note  </th>
    <th> 31 March 2021 </th>
    <th> 31 March 2020 </th>

  </tr>
 
 
 
  <tr>
    <td> <b> I. EQUITY AND LIABILITIES  </b> </td>
    <td> 2 </td>
  </tr>
 
  <tr>
    <td> (1) Shareholders’ funds </td>
    <td> 4 </td>
  </tr>  
 
  <tr>
  <td> (a) Share Capital  </td>
  </tr>
 
  <tr>
      <td> (b) Reserves and Surplus </td>
     </tr>
   <tr>
       <td> <b>Total </b> <td>
</tr>
   
   <tr colspan="4"> <td> &nbsp; </td> </tr>


   
   
   



   <tr>
    <td> <b> (2) Non-current liabilities
  </b> </td>

  </tr>
 
  <tr>
    <td> (a) Long-term Borrowings     </td>
    <td> 5 </td>
  </tr>  
 
  <tr>
  <td> (b) Deferred Tax Liabilities (net)</td>
  <td> 6 </td>
  </tr>
 
 
       <td> <b>Total </b> <td>
</tr>
   
 
   
<tr colspan="4"> <td> &nbsp; </td> </tr>







<tr>
    <td> <b> (3) Current liabilities

  </b> </td>

  </tr>
 
  <tr>
    <td>(a) Short-term Borrowings </td>
    <td> 7</td>
  </tr>  
 
  <tr>
  <td> (b) Trade Payables </td>
  <td>8</td>
 
  </tr>
 
  <tr>
  <td> -Due to Micro and Small Enterprises </td>
 
  </tr>
  <tr>
   <td> - Due to Others</td>

 
   </tr>
   
   
   <tr>
   <td>
   (c) Other Current Liabilities </td>
   <td>9</td>
   <tr>
   
   <tr>
   <td>
   (d) Short-term Provisions  </td>
   <td>10</td>
   <tr>
   
   
   
   
 
       <td> <b>Total </b> <td>
</tr>



<tr colspan="4"> <td>Total Equity and Liabilities </td> </tr>


     
<tr colspan="4"> <td>II. ASSETS </td> </tr>


<tr>
    <td> <b> (1) Non-current assets
  </b> </td>

  </tr>
 
  <tr>
    <td>(a) Property, Plant and Equipment
    </td>
    <td> 11 </td>
  </tr>  

  <tr> <td>(i) Tangible Assets </td> </tr>
 
  <tr>
  <td> (b) Long term Loans and Advances
</td>
  <td> 12 </td>
  </tr>



  <tr>
    <td> <b> (2) Current assets
  </b> </td>

  </tr>
 
  <tr>
    <td>(a) Inventories
    </td>
    <td> 13 </td>
  </tr>  

  <tr> <td>(b) Trade Receivables </td> <td> 14 </td> </tr>
 
  <tr>
  <td> (c) Cash and Cash Equivalents
</td>
  <td> 15 </td>
  </tr>



  <tr>
    <td> (d) Short-term Loans and Advances
  </td>
    <td> 16 </td>
    </tr>

   
    <tr>
        <td> (e) Other Current Assets
      </td>
        <td> 17 </td>
        </tr>
     

 
 
       <td> <b>Total </b> <td>
</tr>
   










<tr colspan="4"> <th>Total Assets </th> <th></th><th>0</th><th>0</th></tr>


                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
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



$scope.search = function(){
    
    
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
    
   
      $scope.formdate = fromdate;
      $scope.todate = fromto;
   
      
      $scope.fetchDatagetlegderGroup(fromdate,fromto);
      $scope.fetchDatagetlegderGroup1(fromdate,fromto);
    
    
    
};




$scope.fetchDatagetlegderGroup = function(fromdate,fromto){
    

    
    $http.get('<?php echo base_url() ?>index.php/report/trial_balance_report?limit=10&formdate='+fromdate+'&todate='+fromto).success(function(data){
      
      
     $scope.query = {}
      $scope.queryBy = '$';
      
      
      $scope.namesDataledgergroup = data;
      
      
      
      

        
        
        var pendingamount = 0;
        for(var i = 0; i < data.length; i++){
            var pending_balance = parseInt(data[i].credit);
              pendingamount += pending_balance;
        }
      
        $scope.credittotalss = pendingamount;
        
        
        
        
        
      
    });
    
    
  };
  
  
  
$scope.fetchDatagetlegderGroup1 = function(fromdate,fromto){
    

    
    $http.get('<?php echo base_url() ?>index.php/report/trial_balance_report1?limit=10&formdate='+fromdate+'&todate='+fromto).success(function(data){
      
      
     $scope.queryss = {}
      $scope.queryByss = '$';
      
      
      $scope.namesDataledgergroup1 = data;
      
      
      
      
      
         var totalamount = 0;
        for(var i = 0; i < data.length; i++){
            var balance = parseInt(data[i].debit);
            totalamount += balance;
        }
      
        $scope.debittotal = totalamount;
        
        
        var pendingamount = 0;
        for(var i = 0; i < data.length; i++){
            var pending_balance = parseInt(data[i].credit);
              pendingamount += pending_balance;
        }
      
        $scope.credittotal = pendingamount;
        
        
        
        
        
      
    });
    
    
  };
  
  
  
  

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>



