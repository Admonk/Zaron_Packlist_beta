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
.table-responsive {
    height: 500px;
    cursor: grab;
}


.ui-widget.ui-widget-content {
    border: 1px solid #d3d3d3;
    z-index: 999999;
}
.table-bordered {
    border: 1px solid #e9e9ef;
    table-layout: fixed;
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
                                    <h4 class="mb-sm-0 font-size-18">Balance Sheet </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Balance Report !</li>
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
                                      
                                          
                                            <h4 class="card-title">Balance {{formdate}} To {{todate}}</h4>
                                      
                                    </div>
                   </div> 
                   
                   <div id="search-view1"  >
                      
                                     <div class="card-header"  ng-init="fetchSingleData(0)">
                                      
                                           <!--<h4 class="card-title"> Balance <?php echo date('01-m-Y'); ?> To <?php echo date('d-m-Y'); ?></h4>-->
                                             <h3 class="mb-sm-0 font-size-18">Balance Sheet</h3>
                                           
                                       
                                    </div>
                   </div> 
                  
                           
                           
                          <div class="row">
                              
                          
                   
                         <div class="col-md-6">
                        <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                    <div class="table-responsive">                
                   <table id="datatable" class="table table-bordered dt-responsive" width="100%"  ng-init="fetchDatagetlegderGroup(0)" >
                      <thead>
                        <tr>


                          <th><b>Assets</b></th>
                        
                          <th><b>Value</b></th>
                          
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup | filter:query" >
                            
                            
                        <tr  class="trpoint">
                          
                           <td>{{names.name}}</td>
                          
                           <td>{{names.credit}}</td>
                           
                        </tr>
                        
                        
                        
                      
                      </tbody>
                      
                      
                      <tr>
                          
                          <td><b>Total Assets</b></td>
                         
                          <td><b>{{credittotalss}}</b></td>
                           
                      </tr>
                      
                    </table>
              
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                    </div>
                    </div>
                   
                   
                         <div class="col-md-6">
                        <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="queryss[queryByss]">
                    <div class="table-responsive">                
                   <table id="datatable" class="table table-bordered dt-responsive" width="100%"  ng-init="fetchDatagetlegderGroup1(0)" >
                      <thead>
                        <tr>


                          <th><b>Liabilities</b></th>
                          <th><b>Value</b></th>
                         
                          
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup1 | filter:queryss" >
                            
                            
                        <tr  class="trpoint">
                          
                           <td>{{names.name}}</td>
                          
                           <td>{{names.credit}}</td>
                           
                        </tr>
                        
                        
                        
                      
                      </tbody>
                      
                      
                      <tr>
                          
                           <td><b>Total Liabilities</b></td>
                        
                          <td><b>{{credittotal}}</b></td>
                           
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




