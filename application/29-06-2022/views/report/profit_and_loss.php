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
                                    <h5 class="mb-sm-0 mt-3 font-size-15">TRADING AND PROFIT OR LOSS ACCOUNT </h5>

                                  

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
                              
                          
                    <h5 class="mb-sm-0 mt-3 font-size-15">TRADING ACCOUNT </h5>
                         <div class="col-md-6" style="border-right: #919191 solid 1px;">
                         <div class="table-responsive">                
                 

                   
                   <table ng-init="fetchDatagetlegderGroup2(0)">
  <tr>
    <th>Particulars</th>
    <th> Amount </th>
   <th> Amount </th>
  </tr>
  
  <tbody ng-repeat="names in namesDataledgergroup2">
      
  
  
   
 
  <tr><td> <b > <a href="#"  style="color: #ef7b3f;font-weight: 800;">{{names.name}}</a> </b> </td> <td></td></tr>
    
    
   <tr ng-repeat="namesvv in names.resultsub">
       
       <td>  <a href="javascript:void(0);" >{{namesvv.name}}</a>  </td>
       <td> <span  ng-if="namesvv.viewstatus==1">{{namesvv.credit | number}} </span>
       
       
      
   
       
       </td>
       <td>
           
           <span  ng-if="namesvv.id==120">{{namesvv.credittot | number}} </span> 
           
           <span  ng-if="namesvv.viewstatus==0">{{namesvv.credit | number}}</span>
       
        
       
       </td>
   
   
   </tr>
    
  
    
  

 </tbody>
  
 
                        <tr ng-if='atotal<btotal'>
                          
                           <th><b>GROSS PROFIT (TRANSFER TO P & L A/C)</b></th>
                              <th></th>
                           <th><b>{{btotal-atotal | number}}</b></th>
                           
                           
                         
                       </tr>
                      
 
                       <tr>
                          
                           <th><b>Total </b></th>
                           <th></th>
                           <th>
                               <b ng-if='atotal==btotal'>{{atotal | number}}</b>
                               <b ng-if='atotal>btotal'>{{atotal | number}}</b>
                               <b ng-if='atotal<btotal'>{{btotal | number}}</b>
                           </th>
                           
                       </tr>
     
 
  
</table>
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                    </div>
                    </div>
                   
                   
                         <div class="col-md-6">
                        <div class="table-responsive">                
                   
                   
                
                   
           
           
           
                   <table ng-init="fetchDatagetlegderGroup3(0)">
  <tr>
    <th>Particulars</th>
    <th> Amount </th>
    <th> Amount </th>
  </tr>
    
  
  
    <tbody ng-repeat="names in namesDataledgergroup3 | filter:queryss">
      
   
 
  <tr><td> <b > <a href="#"  style="color: #ef7b3f;font-weight: 800;">{{names.name}}</a> </b> </td> <td></td></tr>
    
   <tr ng-repeat="namesvv in names.resultsub">
       
       <td>  <a href="javascript:void(0);" >{{namesvv.name}}</a>  </td>
   
   <td> <span  ng-if="namesvv.viewstatus==1">{{namesvv.credit | number}}</span> 
       
  
   
   
   </td>
   <td>
       
       
       <span  ng-if="namesvv.id==2">{{namesvv.credittot | number}} </span> 
           
          
       
       
       </td>
   
   </tr>
    
 
 
    
  

 </tbody>
    
     
                      <tr ng-if='atotal>btotal'>
                          
                           <th><b>GROSS LOSS (TRANSFER TO P & L A/C)</b></th>
                              <th></th>
                           <th><b>{{atotal-btotal | number}}</b></th>
                           
                           
                         
                       </tr>
                       
                      
                      <tr>
                          
                          <th><b>Total</b></th>
                          <th></th>
                          <th>
                              
                               <b ng-if='atotal==btotal'>{{btotal | number}}</b>
                              <b ng-if='atotal<btotal'>{{btotal | number}}</b>
                              <b ng-if='atotal>btotal'>{{atotal | number}}</b>
                              
                            
                              
                           </th>
                           
                      </tr>
     
                     
 
  
</table>
                   
                   
                   
                   
                   
                   
                    </div>
                    </div>
                   
                   
                        </div>
                   
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                           
                           
                          <div class="row" style="margin-bottom:50px;">
                              
                          
                    <h5 class="mb-sm-0 mt-3 font-size-15">PROFIT OR LOSS ACCOUNT </h5>
                         <div class="col-md-6" style="border-right: #919191 solid 1px;">
                         <div class="table-responsive">                
                 

                   
                   <table ng-init="fetchDatagetlegderGroup1(0)">
  <tr>
    <th>Particulars</th>
   
   <th> Amount </th>
  </tr>
    <tr ng-if='atotal>btotal'>
                          <td><b>GROSS LOSS (TRANSFER TO P & L A/C)</b> </td>
                          <td><b>{{atotal-btotal | number}}</b></td>
                         </tr>
  <tbody ng-repeat="names in namesDataledgergroup1">
      
  
  
   
 
  <tr><td> <b > <a href="#"  style="color: #ef7b3f;font-weight: 800;">{{names.name}}</a> </b> </td> <td></td></tr>
    
    
   <tr ng-repeat="namesvv in names.resultsub"><td>  <a href="javascript:void(0);" >{{namesvv.name}}</a>  </td> <td>{{namesvv.credit | number}}</td></tr>
    
  
    
  

 </tbody>
  
                     
  
                         <tr ng-if='atotal<btotal'>
                          
                           <th><b>NET PROFIT (TRANSFERRED TO CAPITAL A/C)</b></th>
                           <th><b>{{dtotal+btotal-atotal-ctotal| number}}</b></th> <!-- Change 1-->
                           
                         </tr>
                         
                          
                        <tr>
                          
                           <th><b>Total </b></th>
                           <th>
                               
                               <b ng-if='ctotal==dtotal'>{{ctotal+atotal-btotal | number}}</b>
                               <b ng-if='ctotal<dtotal'>{{ctotal+atotal-btotal | number}}</b>
                               <b ng-if='ctotal>dtotal'>{{dtotal+btotal-atotal | number}}</b> <!-- Change 1-->
                               
                           </th>
                           
                       </tr>
     
 
  
</table>
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                    </div>
                    </div>
                   
                   
                         <div class="col-md-6">
                        <div class="table-responsive">                
                   
                   
                
                   
           
           
           
                   <table ng-init="fetchDatagetlegderGroup(0)">
  <tr>
    <th>Particulars</th>
   
    <th> Amount </th>
  </tr>
  
  
                         <tr ng-if='atotal<btotal'>
                          <td><b>GROSS PROFIT (TRANSFERRED FROM TRADING A/C)</b> </td>
                          <td><b>{{btotal-atotal | number}}</b></td>
                         </tr>
                       
  
  
    <tbody ng-repeat="names in namesDataledgergroup | filter:queryss">
      
  
   
 
  <tr><td> <b > <a href="#"  style="color: #ef7b3f;font-weight: 800;">{{names.name}}</a> </b> </td> <td></td></tr>
    
    
   <tr ng-repeat="namesvv in names.resultsub"><td>  <a href="javascript:void(0);" >{{namesvv.name}}</a>  </td> <td>{{namesvv.credit | number}}</td></tr>
    
  
    
 
 
    
  

 </tbody>
    
     
                       
     
                        <tr ng-if='ctotal=>dtotal'>
                          
                           <th><b>NET LOSS (TRANSFER TO CAPITAL A/C)</b></th>
                             
                           <th><b>{{ctotal-dtotal+atotal-btotal | number}}</b></th>
                           
                           
                         
                       </tr>
                       
                       
                        <tr ng-if='ctotal==dtotal'>
                          
                           <th><b>NET LOSS (TRANSFER TO CAPITAL A/C)</b></th>
                             
                           <th><b>{{ctotal-dtotal+atotal-btotal | number}}</b></th>
                           
                           
                         
                       </tr>
                       
                       
                      <tr>
                          
                          <th><b>Total</b></th>
                          
                          <th>
                              
                                 <b ng-if='dtotal==ctotal'>{{dtotal+atotal-btotal | number}} </b>
                                 <b ng-if='ctotal<dtotal'>{{dtotal+btotal-atotal | number}} </b>
                                 <b ng-if='ctotal>dtotal'>{{dtotal+btotal-atotal | number}} </b> <!-- Change 1-->
                              
                           </th>
                           
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
            var currencySymbol = 'Rs ';
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
      
        $scope.dtotal = pendingamount;
        
        
        
        
        
      
    });
    
    
  };
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  $scope.fetchDatagetlegderGroup2 = function(fromdate,fromto){
    

    
    $http.get('<?php echo base_url() ?>index.php/report/trial_balance_report2?limit=10&formdate='+fromdate+'&todate='+fromto).success(function(data){
      
      
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
    

    
    $http.get('<?php echo base_url() ?>index.php/report/trial_balance_report3?limit=10&formdate='+fromdate+'&todate='+fromto).success(function(data){
      
      
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
  
  
  
  
  
$scope.fetchDatagetlegderGroup1 = function(fromdate,fromto){
    

    
    $http.get('<?php echo base_url() ?>index.php/report/trial_balance_report1?limit=10&formdate='+fromdate+'&todate='+fromto).success(function(data){
      
      
     $scope.queryss = {}
      $scope.queryByss = '$';
      
      
      $scope.namesDataledgergroup1 = data;
      
      
      
      
     
        
        
        var pendingamount = 0;
        for(var i = 0; i < data.length; i++){
            var pending_balance = parseInt(data[i].credit);
              pendingamount += pending_balance;
        }
      
        $scope.ctotal = pendingamount;
        
        
        
        
        
      
    });
    
    
  };
  
  
  
  

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>



