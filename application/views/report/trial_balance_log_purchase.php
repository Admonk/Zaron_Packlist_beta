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
  .COLOR_color
  {
    color:red;
  }
.trpoint {
    
    cursor: pointer;
   
}
td {
    font-size: 9px;
    font-weight: 800;
}
th {
    font-size: 9px;
    font-weight: 800;
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
                                    <h4 class="mb-sm-0 font-size-18">Trial Balance Log Purchase Log</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Trial Balance Log Purchase Log!</li>
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
 <div class="col-md-8">
              <a href="<?php echo base_url(); ?>index.php/report_new/trial_balance_log_sales" class="btn btn-secondary">Sales</a>
              

           
              <a href="<?php echo base_url(); ?>index.php/report_new/trial_balance_log_return" class="btn btn-secondary">Sales Return</a>
             
              <a href="<?php echo base_url(); ?>index.php/report_new/trial_balance_log_manual_journal" class="btn btn-secondary">Journal</a>
             

              
              <a href="<?php echo base_url(); ?>index.php/report_new/trial_balance_log_Voucher" class="btn btn-secondary">Voucher</a>
             

              <a href="<?php echo base_url(); ?>index.php/report/trial_balance_log_purchase" class="btn btn-primary">Purchase</a>

              <a href="<?php echo base_url(); ?>index.php/report_new/trial_balance_log_commission" class="btn btn-secondary">Commission</a>
               <a href="<?php echo base_url(); ?>index.php/report_new/trial_balance_log_ex_return" class="btn btn-secondary">Ex-return</a>

                <a href="<?php echo base_url(); ?>index.php/report_new/trial_balance_log_bank_inter_transfer" class="btn btn-secondary">Bank Internel Transfer</a>

          <a href="<?php echo base_url(); ?>index.php/report_new/trial_balance_log_discount" class="btn btn-secondary">Discount</a>
              </div>
                 
                   <h5>Total DEBIT  : {{totaldebits}}</h5>
                     <h5>Total CREDIT  : {{totalcredits}}</h5>
                   <h5>Total  : {{total}}</h5>
                   
                    
                    <div class="col-lg-12" >
                        <p class="mb-sm-0 font-size-18">Search</p>  
                      <form>
                          <div class="row">
                              
                            
                            
                            
                            <div class="col">
                              <input type="date" class="form-control" id="from-date"  value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date"   value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                              <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata1" ng-click="exportToExcel()">Export</button>
                            
                            </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                <div ng-init="fetchDatagetlegderGroup(0)"></div> 
                    
                
                
                   
                   
                   <br><br>
                   <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                   <div class="table-responsive">
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"   >
                      <thead>
                        <tr>


                          <th>NO</th>
                          <th style="width: 120px;">DATE</th>
                          <th style="width: 150px;">REFERENECE NO</th>
                          <th>PURCHASE INVOICE</th>
                          <th>PARTY NAME</th>
                         
                          <th style="width: 100px;">DEBIT</th>
                           <th style="width: 100px;">CREDIT</th>
                          <th style="width: 200px;">NOTES</th>
                          <th>PAYMENT MODE</th>
                          <th>CREATED BY</th>
                          <th>EDITED BY</th>
                          <th>DELETED BY</th>
                          <!-- <th>STATUS</th> -->
            
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup" >
                            

                         <tr  class="trpoint" style="background: #efefef;">
                           <td>{{$index + 1}}</td>
                           <td style="width: 120px;">{{names.create_date}} </td>
                           <td style="width: 150px;"></td>
                           <td>{{names.order_no}}</td>
                           <td></td>
                           
                           
                           <td style="color: red;width: 100px;"><span ng-if="names.debitstot>0">{{names.debitstot }}</span></td>
                           <td style="color: green;width: 100px;"><span ng-if="names.creditstot>0">{{names.creditstot}}</span></td>
                           <td style="width: 200px;"></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <!-- <td>{{names.status}}</td> -->
                        </tr>
    
                            
                        <tr  class="trpoint {{namess.SS}}_color"  ng-repeat="namess in names.subarray">
                           <td></td>
                           <td style="width: 120px;">{{namess.create_date}} </td>
                           <td style="width: 150px;">{{namess.deletemod}} </td>
                            <td>{{namess.order_no}}</td>
                           <td>{{namess.party_name}}</td>
                           
                           
                           <td style="color: red;width: 100px;"><span ng-if="namess.debits>0">{{namess.debits }}</span></td>
                           <td style="color: green;width: 100px;"><span ng-if="namess.credits>0">{{namess.credits}}</span></td>
                           <td style="width: 200px;">{{namess.notes}}</td>
                           <td>{{namess.payment_mode}}</td>
                           <td>{{namess.created_by}}</td>
                           <td>{{namess.edited_by}}</td>
                           <td>{{namess.deleted_by}}</td>
                           <!-- <td>{{names.status}}</td> -->
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
  
  
  
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
   
      url = '<?php echo base_url() ?>index.php/report/trial_balance_log_export?formdate='+fromdate+'&todate='+fromto;
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


 
 
 $scope.getProduct = function(){
     var cate_id= $('#choices-single-default').val();;
     
     $scope.productlist(cate_id);
     
 }; 



  $scope.exportToExcel = function () {


                    

                var date=    $('#from-date').val();


                $("#datatable").table2excel({
                    filename: "TRAIL_BALANCE_LOG_BOOK_"+date+".xls"
                });
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
    
      
    
      
      $scope.fetchDatagetlegderGroup();
    
    
    
};




$scope.fetchDatagetlegderGroup = function(){
    
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
    
   
    $http.get('<?php echo base_url() ?>index.php/report/fetch_data_accounts_log_report_pursase?formdate='+fromdate+'&todate='+fromto).success(function(data){
      
      
      
      
      
      
      $scope.namesDataledgergroup = data;
      
      
      
      
      
         var totalcredits = 0;
         var totaldebits = 0;
        for(var i = 0; i < data.length; i++){
           var credits = parseInt(data[i].creditstot);
           var debits = parseInt(data[i].debitstot);
           totalcredits += credits;
           totaldebits += debits;
        }
      
        $scope.totalcredits = totalcredits;
        $scope.totaldebits = totaldebits;


        $scope.total = totalcredits-totaldebits;



        
        
        
      
    });
    
    
  };
  
  
  
  
  

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
     <script src="<?php echo base_url(); ?>assets/table2excel.js"></script>
</body>



