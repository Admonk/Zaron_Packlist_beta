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
                                    
                                    <?php
                                    
                                    if(isset($_GET['accountstype']))
                                    {
                                        $title=$accountstypename;
                                        $accountstype=$_GET['accountstype'];
                                    }
                                    else
                                    {
                                         $title="Trial Balance";
                                         $accountstype=0;
                                    }
                                    
                                    ?>
                                    
                                    <h4 class="mb-sm-0 mt-3 font-size-18"><?php echo $title; ?> </h4>

                                 
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
                      <form class="ng-pristine ng-valid">
                          <div class="row">
                                
                            
                            
                             
                            
                            <div class="col">
                                <label>From date</label>
                              <input type="date" class="form-control" min="<?php echo date('2024-01-01'); ?>" id="from-date" value="<?php echo date('2024-01-01'); ?>">
                            </div>
                            <div class="col">
                                <label>To date</label>
                              <input type="date" class="form-control" min="<?php echo date('2024-01-01'); ?>" id="to-date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            
                           
                            
                            
                            
                             <div class="col">
                                 
                             <button type="button" style="margin: 27px 0px;" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                            
                             
                             </div>
                           
                          </div>
                      </form>
                         
                     
                     
                     
                     
                  <div id="search-view" style="display:none;" >
                      
                                     <div class="card-header"  ng-init="fetchSingleData(0)">
                                      
                                          
                                            <h4 class="card-title"> Balance {{formdate}} To {{todate}}</h4>
                                      
                                    </div>
                   </div> 
                   
                   
                           
                           
                          <div class="row">
                              
                          
                   
                         <div class="col-md-12">
                        <input type="text" style="display:none;" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                    <div class="table-responsive">                
                   <table  border="yes" ng-init="fetchDatagetlegderGroup(0)" >
                      <thead>
                           <tr>


                          <th></th>
                          <th ><b>   General Ledger A/c Bal.</b></th>
                     
                          
                          <th></th>
                          
                          <!--<th></th>-->
                          
                        </tr>
                        <tr>


                          <th ><b>Account Name</b></th>
                          
                        
                          
                          <th><b>Debit  </b></th>
                            <th><b>Credit </b></th>
                          
                          <!--<th><b>Balance  </b></th>-->
                          
                        </tr>
                       
                      </thead>
                        <tbody  ng-repeat="namesvv in namesDataledgergroup | filter:query" >
                            
                            
                         <tr  class="trpoint" ng-if="namesvv.set>0" ng-click="viewSub(namesvv.id)" >
                          
                           <td><b><a href="#" style="color: #ef7b3f;font-weight: 800;">{{namesvv.account_type_name}}</a></b> <i class="fa fa-angle-down" style="float:right;"></i></td>
                           <td><b ng-if="namesvv.debit!=0"><a href="#" >{{namesvv.debit | number}}</a></b></td>
                           <td><b ng-if="namesvv.credit!=0"><a href="#" >{{namesvv.credit | number}}</a></b></td>
                            
                        </tr>    
                            
                        <tr  class="trpoint dis_{{names.account_type}} d-none" ng-repeat="names in namesvv.sub" ng-if="names.set>0" >
                          
                           <td><a href="{{names.url}}" >{{names.name}}</a></td>
                           <td> <span  ng-if="names.trail_view_status==1"><a href="{{names.url}}" >{{names.debit | number}}</a></span></td>
                           <td><span ng-if="names.trail_view_status==0"><a href="{{names.url}}" >{{names.credit | number}}</a></span></td>
                            
                        </tr>
                        
                        
                        
                      
                      </tbody>
                      
                      
                       
                       
                         <tr ng-if='credittotalss<debitamountdata'>
                          
                           <th>DIFFERENCE AMOUNT</th>
                           <th></th>
                           <th>{{debitamountdata-credittotalss | number}}</th>
                           
                        </tr>


                        <tr ng-if='debitamountdata<credittotalss'>
                          
                           <th>DIFFERENCE AMOUNT</th>
                           <th>{{credittotalss-debitamountdata | number}}</th>
                           <th></th>
                           
                        </tr>




                       
                       
                     
                      
                       <tr ng-if='credittotalss<debitamountdata'> 
                          <th><b>Total : </b></th>
                          <th ><b>{{debitamountdata | number}}</b></th>
                          <th><b>{{debitamountdata-credittotalss+credittotalss | number}}</b></th>
                          
                       </tr>


                        <tr ng-if='debitamountdata<credittotalss'> 
                          <th><b>Total : </b></th>
                          <th ><b>{{credittotalss-debitamountdata+debitamountdata | number}}</b></th>
                          <th><b>{{credittotalss | number}}</b></th>
                          
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



$scope.search = function(){
    
    
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
    
      $scope.formdate = fromdate;
      $scope.todate = fromto;
   
      
      $scope.fetchDatagetlegderGroup(fromdate,fromto);
      
    
    
};

$scope.viewSub = function(id)
{
   
  $('.dis_'+id).toggle();
  $('.dis_'+id).removeClass('d-none');
  
};

$scope.fetchDatagetlegderGroup = function(fromdate,fromto){
    
  var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
    
    $http.get('<?php echo base_url() ?>index.php/report/trial_balance_report_full?limit=10&formdate='+fromdate+'&fromto='+fromto+'&accountstype=<?php echo $accountstype; ?>').success(function(data){
      
      
     $scope.query = {}
      $scope.queryBy = '$';
      
      
      $scope.namesDataledgergroup = data;
      
      
      
      

        
        
        var creditamount = 0;
        var debitamount = 0;
        
        for(var i = 0; i < data.length; i++){
            
            
            
                var creditbal = parseInt(data[i].credit);
             
            
           var debitbal = parseInt(data[i].debit);
             
           
            
              creditamount += creditbal;
              debitamount += debitbal;
        }
      
        $scope.credittotalss = creditamount;
        $scope.debitamountdata = debitamount;
        
        
        
        
     
      
       
        
        
        
      
    });
    
    
  };
  
  
 

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>



