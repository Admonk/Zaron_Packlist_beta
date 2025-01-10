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
th.half {
    width: 50%;
}
tr.trpoint {
    line-height: 35px;
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
                                    <h4 class="mb-sm-0 font-size-18">Bank Accounts Report </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Bank Accounts Report !</li>
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
                   
                     
                  <div id="search-view" >
                      
                     
                     <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                                        <!--<i class="bx bx-search search-icon"></i>-->
                    <div class="table-responsive">
                   <table id="datatable" class="table table-bordered dt-responsive" width="100%"  ng-init="fetchDatagetlegderGroup(0,'<?php echo date('Y-m-01'); ?>','<?php echo date('Y-m-t'); ?>','All','All')" >
                      <thead>
                        <tr>


                       
                          <th class="half">Name </th>
                          <th class="half" style="text-align:right;font-weight:800;">#</th>
                          
                         
            
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup | filter:query" >
                            
                            
                        <tr  class="trpoint" >
                          
                           
                           <td><a href="{{names.ss}}" target="_blank">{{names.name}}</a></td>
                           <td style="text-align:right;font-weight:800;"><a href="{{names.ss}}" target="_blank">{{names.balance | number}}</a></td>
                          
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

                        
                    </div>
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->

            







        </div>
    </div>

 
   

<script>
$(document).ready(function(){
  $("#exportdatadata").hide();
   
  $('#payment_mode_payoff').on('change',function(){
      
      var val=$(this).val();
      
      if(val=='Cash')
      {
          $('#res_no').hide();
          $('#bankaccountshow').hide();
      }
      else
      {
          $('#res_no').show();
          $('#bankaccountshow').show();
      }
      
  });
   
      
 
      
  $('#choices-single-default').on('change',function(){
      
      
      
      
       $("#exportdatadata").show();
        
      
  });
  
$('#exportdata').on('click', function() {
  
  
    var id= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
    var party_type= $('#party_type').val();
  
    url = '<?php echo base_url() ?>index.php/report/fetch_data_get_ledger_view_export_all?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&party_type='+party_type+'&payment_status='+payment_status;

 
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






$scope.fetchDatagetlegderGroup = function(id,fromdate,fromto,payment_status,party_type){
    

    
    $http.get('<?php echo base_url() ?>index.php/report/fetch_data_get_ledger_view_all_accounts?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&party_type='+party_type+'&payment_status='+payment_status).success(function(data){
     
     
     $scope.query = {}
      $scope.queryBy = '$';
      
     
      $scope.namesDataledgergroup = data;
      
      
      
        var amounttotal = 0;
        for(var i = 0; i < data.length; i++){
            var amount = parseInt(data[i].amount);
            amounttotal += amount;
        }
      
      
      
        $scope.amounttotal = amounttotal;
      
      
      
      
      
         var payofftotal = 0;
        for(var i = 0; i < data.length; i++){
            var balance = parseInt(data[i].balance);
            payofftotal += balance;
        }
      
      
      
     
      
        $scope.Payofftotal = payofftotal;
        
        
        
        
        var payouttotal = 0;
        for(var i = 0; i < data.length; i++){
            var Payout = parseInt(data[i].Payout);
            payouttotal += Payout;
        }
      
      
      
        $scope.Payouttotal = payouttotal;
      
      
      
      
     
      
      
      
      
    });
  };
  
  
  
  
  
  
  
  
  
  

});

</script>
           <script src="<?php echo base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="<?php echo base_url(); ?>assets/libs/pace-js/pace.min.js"></script>

        <!-- Required datatable js -->
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
       
                 <script src="<?php echo base_url(); ?>assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

         <script src="<?php echo base_url(); ?>assets/libs/pristinejs/pristine.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/pages/form-validation.init.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/pages/form-advanced.init.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
 
    
 </html>



</body>



