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
                                    <h4 class="mb-sm-0 font-size-18">Balance Report   <?php
                                 if($_GET['type']!=1)
                                 {
                                     ?>
                                 (Non Cash )
                                 <?php
                                 
                                 }
                                 else
                                 {
                                     ?>
                                    (Cash)
                                     <?php
                                 }
                                 ?></h4>

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


                <div class="row">
                   
                    
                    <div class="col-lg-12" >
                        <p class="mb-sm-0 font-size-18">Search</p>  
                      <form>
                          <div class="row">
                            
                            <div class="col">
                                  <lable>From date</lable>
                              <input type="date" class="form-control" id="from-date" value="<?php echo date('Y-m-01'); ?>">
                            </div>
                            <div class="col">
                                <lable>To date</lable>
                              <input type="date" class="form-control" id="to-date" value="<?php echo date('Y-m-t'); ?>">
                            </div>
                            <div class="col">
                                <lable>Payment Mode</lable>
                             
                             <?php
                             if($_GET['type']==1)
                             {
                                 ?>
                                 
                                  <select class="form-control" id="payment_status">
                                 <option value="All">All</option>
                                 <option value="1" selected>Cash</option>
                                 <option value="0">Online / Bank</option>
                                 <option value="2">Cheque</option>
                                 </select>
                                 
                                 <?php
                                 
                             }
                             else
                             {
                                 ?>
                                   <select class="form-control" id="payment_status">
                                   <option value="All">All</option>
                                   <option value="0">Online / Bank</option>
                                   <option value="2">Cheque</option>
                                   </select>
                                 <?php
                             }
                             
                             ?>
                             
                            
                             
                             
                             
                            </div>
                            <div class="col">
                             <lable>Party Type</lable>
                             
                             
                             
                             <select class="form-control" id="party_type">
                                 <option value="All">All</option>
                                 <option value="Customer">Customer</option>
                                 <option value="Driver">Driver</option>
                                 <option value="Vendor">Vendor</option>
                                 <option value="Employee">Employee</option>
                             </select>
                             
                             
                            </div>
                             <div class="col" style="margin: 20px 0px;">
                                 
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata" >Export</button>
                            </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     <br><br>
                     
                     <div class="row" ng-init="fetchDatagetlegderGroupTotal(0,'<?php echo date('Y-m-01'); ?>','<?php echo date('Y-m-t'); ?>','All','All')">
                         
                          
                            
                            <?php 
                            
                            if($_GET['type']==1)
                            {
                                ?>
                                
                                 
                            <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Cash In Hand</h3>
                                                <h4 class="mb-3">
                                                    Rs. <span >{{totalpayment}}</span>
                                                </h4>
                                               
                                            </div>
        
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            
                            
                                
                                <?php
                            }
                            
                            ?>
                           
                            
        
                            <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card card-h-50">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Total Credit</h3>
                                                <h4 class="mb-3">
                                                    Rs.  <span >{{totalcridit}}</span>
                                                </h4>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
                            
                            
                            
                                <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card card-h-50">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Total Debit</h3>
                                                <h4 class="mb-3">
                                                    Rs.  <span >{{totaldebit}}</span>
                                                </h4>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
                            
                            
                             <div class="col-xl-3 col-md-3" style="display:none;">
                                <!-- card -->
                                <div class="card card-h-50">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Balance</h3>
                                                <h4 class="mb-3">
                                                    Rs.  <span  >{{totalcridit-totaldebit}}</span>
                                                </h4>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
        
                            
        
                           
                        </div>
                     
                     
                     
                     
                     
                     
                  <div id="search-view" >
                      
                     
                  
                   
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"  ng-init="fetchDatagetlegderGroup(0,'<?php echo date('Y-m-01'); ?>','<?php echo date('Y-m-t'); ?>','All','All')" >
                      <thead>
                        <tr>


                          <th>No</th>
                          <th>Date</th>
                          <th>Party Name </th>
                          <th>Reference No </th>
                          <th>Bill Amount</th>
                          <th style="font-weight:800;text-align: right;">Debit</th>
                          <th style="font-weight:800;text-align: right;">Credit</th>
                         
                          <th>Payment Mode</th>
                          
                         
            
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup" >
                            
                            
                        <tr  class="trpoint" >
                          
                           <td>{{names.no}}</td>
                           <td>{{names.payment_date}} {{names.payment_time}}</td>
                           <td>{{names.party_name}}</td>
                           <td>{{names.reference_no}}</td>
                           <td>{{names.amount}}</td>
                           <td style="font-weight:800;text-align: right;">{{names.debits}}</td>
                           <td style="font-weight:800;text-align: right;">{{names.credits}}</td>
                           <td>{{names.payment_mode}}</td>
                          
                            
                        </tr>
                        
                      
                      </tbody>
                      
                      
                      
                      
                      
                      
                      
                      
                       
                        <tr>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td id="d_tot" style="font-weight:800;text-align: right;">{{totaldebit}}</td>
                                                                  <td id="c_tot" style="font-weight:800;text-align: right;">{{totalcridit}}</td>
                                                                  <td></td>
                                                                
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
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;


$scope.fetchSingleData = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'customers'}
    }).success(function(data){

          $scope.name = data.company_name;
          $scope.phone = data.phone;
          $scope.email = data.email;
          $scope.gst = data.gst;
          
          $scope.fulladdress = data.fulladdress;
        
         
     
    });
};



$scope.search = function(){
    
    var userid= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
     var party_type= $('#party_type').val();
   
      $('#search-view').show();
     $('#exportdatadata').show();
     $scope.fetchSingleData(userid);
   
     $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status,party_type);
     $scope.fetchDatagetlegderGroupTotal(userid,fromdate,fromto,payment_status,party_type);
    
    
    
    
};

$scope.onview = function(id,billno,pendingamount,resno){
     $('#firstmodalcommison').modal('toggle');
     
     
     $scope.bill_no=billno;
     $scope.payid=id;
     $scope.pendingamount=pendingamount;
     $scope.payamount=pendingamount;
     
     
     $('#reference_no').val(resno);
     
    
  
    
};



$scope.fetchDatagetlegderGroup = function(id,fromdate,fromto,payment_status,party_type){
    



     
    var payment_status='<?php echo $_GET['type']; ?>';  
    
    $http.get('<?php echo base_url() ?>index.php/report/fetch_data_get_ledger_view_all?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&party_type='+party_type+'&payment_status='+payment_status).success(function(data){
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
  
  
  
  
  
  
$scope.fetchDatagetlegderGroupTotal = function(id,fromdate,fromto,payment_status,party_type){
    

    var payment_status='<?php echo $_GET['type']; ?>';  
       
       
    $http.get('<?php echo base_url() ?>index.php/report/fetch_data_get_ledger_view_total_all?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&party_type='+party_type+'&payment_status='+payment_status).success(function(data){
      
      
      
      
        $scope.totalpayment = data.totalpayment;
        $scope.totaldebit = data.totaldebit;
        $scope.totalcridit = data.totalcridit;
        
       
    
      
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



