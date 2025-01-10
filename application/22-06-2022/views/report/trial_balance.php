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
                                    <h5 class="mb-sm-0 mt-3 font-size-15">BALANCE SHEET</h5>

                                  

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card" >

                  
                  <div class="card-body" >


                <div class="row" >
                   
                    
                    <div class="col-lg-12"  >
                        <!--<p class="mb-sm-0 font-size-18">Search</p>  -->
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                          
                           
                          <div class="row" style="margin-bottom:50px;">
                              
                   
                         <div class="col-md-6" style="border-right: #919191 solid 1px;">
                         <div class="table-responsive">                
                 

                   
                   <table ng-init="fetchDatagetlegderGroup2(0)">
  <tr>
      <th>Liabilities</th>
    <th>Amount </th>
   <th>Amount </th>
  </tr>
  
  <tbody ng-repeat="names in namesDataledgergroup2">
      
  
  
  
  <tr><td> <b > <a href="#"  style="color: #ef7b3f;font-weight: 800;">{{names.name}}</a> </b> </td> <td></td></tr>
    
    
   <tr ng-repeat="namesvv in names.resultsub">
       
       <td>  <a href="{{namesvv.url}}" >{{namesvv.name}}</a>  </td>
       <td> <span  ng-if="namesvv.viewstatus==1">{{namesvv.credit | number}}</span></td>
       <td><span  ng-if="namesvv.viewstatus==0">{{namesvv.credit | number}}</span></td>
   
   
   </tr>
    
  
    
  

 </tbody>
  
 
               
 
                       <tr>
                          
                           <th><b>Total </b></th>
                            <th></th>
                           <th><b>{{atotal | number}}</b></th>
                           
                       </tr>
     
 
  
</table>
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                    </div>
                    </div>
                   
                   
                         <div class="col-md-6">
                        <div class="table-responsive">                
                   
                   
                
                   
           
           
           
                   <table ng-init="fetchDatagetlegderGroup3(0)">
  <tr>
    <th>Assets</th>
    <th> Amount </th>
    <th> Amount </th>
  </tr>
    
  
  
    <tbody ng-repeat="names in namesDataledgergroup3 | filter:queryss">
      
 
  <tr><td> <b > <a href="#"  style="color: #ef7b3f;font-weight: 800;">{{names.name}}</a> </b> </td> <td></td></tr>
    
     
   <tr ng-repeat="namesvv in names.resultsub">
       
       <td>  <a href="{{namesvv.url}}" >{{namesvv.name}}</a>  </td>
   
   <td> <span  ng-if="namesvv.viewstatus==1">{{namesvv.credit | number}}</span></td>
       <td><span  ng-if="namesvv.viewstatus==0">{{namesvv.credit | number}}</span></td>
   
   </tr>
    
 
 
    
  

 </tbody>
    
     
      
                      <tr>
                          
                          <th><b>Total</b></th>
                          <th></th>
                          <th><b>{{btotal | number}}</b></th>
                           
                      </tr>
     
                     
 
  
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







  
  
  
  
  
  
  
  
  
  
  
  
  $scope.fetchDatagetlegderGroup2 = function(fromdate,fromto){
    

    
    $http.get('<?php echo base_url() ?>index.php/report/trial_balance_report_balance1?limit=10&formdate='+fromdate+'&todate='+fromto).success(function(data){
      
      
     $scope.query = {}
      $scope.queryBy = '$';
      
      
      $scope.namesDataledgergroup2 = data;
      
      
      
      

        
        
        
        var pendingamount = 0;
        for(var i = 0; i < data.length; i++){
            var pending_balance = parseInt(data[i].credit);
              pendingamount += pending_balance;
        }
      
        $scope.atotal = pendingamount;
        
        
        
        
        
        
      
    });
    
    
  };
  
  
  
  
  $scope.fetchDatagetlegderGroup3 = function(fromdate,fromto){
    

    
    $http.get('<?php echo base_url() ?>index.php/report/trial_balance_report_balance2?limit=10&formdate='+fromdate+'&todate='+fromto).success(function(data){
      
      
     $scope.query = {}
      $scope.queryBy = '$';
      
      
      $scope.namesDataledgergroup3 = data;
      
      
      
      

        
        
        var pendingamount = 0;
        for(var i = 0; i < data.length; i++){
            var pending_balance = parseInt(data[i].credit);
              pendingamount += pending_balance;
        }
      
        $scope.btotal = pendingamount;
        
        
        
        
        
      
    });
    
    
  };
  
  
  
  
 
  
  

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>



