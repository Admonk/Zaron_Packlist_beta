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
                                    <h4 class="mb-sm-0 font-size-18">Database Backup Clear </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Database Backup Clear!</li>
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
                       
                      <form>
                          <div class="row">
                              
                            <div class="col-md-4">
                              <input type="date" class="form-control" id="from-date" value="<?php echo date('Y-m-01'); ?>" >
                            </div>
                           
                          </div>
                      </form>
                         
                         
                         
                   <br><br>
                   <h3>Process  Details</h3>

                   <h5 style="color: red;">Please make sure you have obtained a complete backup of data from the Database before initiating the data removal process below. To remove the data specific to a date, choose a subsequent date in the below date picker. 
For eg: select 1st Nov if you want to remove data till 31st Oct.</h5>



                
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"   >
                      <thead>
                        <tr>


                          <th>NO</th>
                          
                          <td>PROCESS</td>
                          <th><button type="button" class="btn btn-outline-danger waves-effect waves-light" id="REMOVEALL" ng-click="REMOVEALL()">REMOVE ALL</button></th>
                          
                        
                        </tr>
                      </thead>
                        <tbody   >
                            
                            
                        <tr  class="trpoint">
                           <td>1</td>
                           <td>CAPITAL ACCOUNT</td>
                          
                     
            <td><a href="#"  id="btn1" ></a></td>
                            
                           
                        </tr>


 <tr  class="trpoint">
                           <td>2</td>
                           <td>CURRENT ASSETS</td>
                          
                     
            <td><a href="#"  id="btn10" ></a></td>
                            
                           
                          </tr>

                          <tr  class="trpoint">
                           <td>3</td>
                           <td>CURRENT LIABILITIES</td>
                          
                     
            <td><a href="#"  id="btn2" ></a></td>
                            
                           
                          </tr>


                             <tr  class="trpoint">
                           <td>4</td>
                           <td>DIRECT EXPENSES</td>
                          
                     
            <td><a href="#"  id="btn3" ></a></td>
                            
                           
                          </tr>



                          <tr  class="trpoint">
                           <td>5</td>
                           <td>FIXED ASSETS</td>
                          
                     
            <td><a href="#"  id="btn4" ></a></td>
                            
                           
                          </tr>


                          <tr  class="trpoint">
                           <td>6</td>
                           <td>IN DIRECT EXPENSES</td>
                          
                     
            <td><a href="#"  id="btn5" ></a></td>
                            
                           
                          </tr>


                <tr  class="trpoint">
                           <td>7</td>
                           <td>INDIRECT INCOME</td>
                          
                     
            <td><a href="#"  id="btn6"></a></td>
                            
                           
                          </tr>

                          <tr  class="trpoint">
                           <td>8</td>
                           <td>PURCHASE ACCOUNT</td>
                          
                     
            <td><a href="#"  id="btn7"></a></td>
                            
                           
                          </tr>


                         <tr  class="trpoint">
                           <td>9</td>
                           <td>SALES ACCOUNT</td>
                          
                     
            <td><a href="#"  id="btn8" ></a></td>
                            
                           
                          </tr> 


                          <tr  class="trpoint">
                           <td>10</td>
                           <td>ENQUIRY,QUOTATION</td>
                          
                     
            <td><a href="#"  id="btn9" ></a></td>
                            
                           
                          </tr> 


                          <tr  class="trpoint">
                           <td>11</td>
                           <td>Reports (Excluding Enquiry and Yes or no reports)</td>
                          
                     
            <td><a href="#"  id="btn11" ></a></td>
                            
                           
                          </tr> 


                      
                        
                      
                      </tbody>
                      
                      
                    </table>
              
                   
                     
                     
                <div ng-init="fetchDatagetlegderGroup(0)"></div> 
                    
                
                
                   
                   
                   <br><br>
                   <h3>Log Details</h3>
                
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"   >
                      <thead>
                        <tr>


                          <th>NO</th>
                          <th>DATE</th>
                          <td>PROCESS</td>
                          <th>CLEARD BY</th>
                          <th>CLEARD DATE & TIME</th>
                         
                        
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup" >
                            
                            
                        <tr  class="trpoint">
                           <td>{{$index + 1}}</td>
                           <td>{{names.from_date}} </td>
                          
                     
                           <td>{{names.process}}</td>
                           <td>{{names.username}}</td>
                           <td>{{names.date_time_clear}}</td>
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
      url = '<?php echo base_url() ?>index.php/report/fetch_data_sales_report_export?limit=10&cate_id='+cateid+'&productid='+productid+'&formdate='+fromdate+'&todate='+fromto+'&order_status='+order_status;
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

 $scope.productlist = function (cate_id) {
    
    
    
   
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/report/productlist",
          data:{'cate_id':cate_id}
          }).success(function(data){
    
             $scope.productlistdata = data;
         
          });
          
      
}


$scope.REMOVEALL =function()
{

   $scope.remove1();
   
}


 $scope.remove1 = function () {
    
    
         var fromdate= $('#from-date').val();

         if(fromdate!='')
         {

                  $('#btn1').html('Loading...');
                  $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/customer/order_data_clear",
                  data:{'fromdate':fromdate}
                  }).success(function(data)
                  {

                      $('#btn1').html('CAPITAL ACCOUNT REMOVED');
                      $('#btn1').removeClass('btn btn-outline-danger');
                      $('#btn1').addClass('btn btn-outline-success');




                      $('#btn10').html('CURRENT ASSETS REMOVED');
                      $('#btn10').removeClass('btn btn-outline-danger');
                      $('#btn10').addClass('btn btn-outline-success');
                     
                      $scope.fetchDatagetlegderGroup();

                      $scope.remove2();
                 
                  });

        }
        else
        {
            alert('Select the Date');
        }
          
      
}


 $scope.remove2 = function () {
    
    
         var fromdate= $('#from-date').val();

         if(fromdate!='')
         {

                  $('#btn2').html('Loading...');
                  $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/customer/dataclear_customer_without_cnn",
                  data:{'fromdate':fromdate}
                  }).success(function(data)
                  {

                      $('#btn2').html('CURRENT LIABILITIES REMOVED');
                      $('#btn2').removeClass('btn btn-outline-danger');
                      $('#btn2').addClass('btn btn-outline-success');
                      
                      $scope.fetchDatagetlegderGroup();

                       $scope.remove3();

                 
                  });

        }
        else
        {
            alert('Select the Date');
        }
          
      
}


 $scope.remove3 = function () 
 {
    
    
         var fromdate= $('#from-date').val();

         if(fromdate!='')
         {

                  $('#btn3').html('Loading...');
                  $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/customer/dataclear_customer_with_cnn",
                  data:{'fromdate':fromdate}
                  }).success(function(data)
                  {

                      $('#btn3').html('DIRECT EXPENSES REMOVED');
                      $('#btn3').removeClass('btn btn-outline-danger');
                      $('#btn3').addClass('btn btn-outline-success');
                      
                      
                      $scope.fetchDatagetlegderGroup();
                      $scope.remove4();

                 
                  });

        }
        else
        {
            alert('Select the Date');
        }
          
      
}

$scope.remove4 = function () 
 {
    
    
         var fromdate= $('#from-date').val();

         if(fromdate!='')
         {

                  $('#btn4').html('Loading...');
                  $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/customer/dataclear_driver1",
                  data:{'fromdate':fromdate}
                  }).success(function(data)
                  {

                      $('#btn4').html('FIXED ASSETS REMOVED');
                      $('#btn4').removeClass('btn btn-outline-danger');
                      $('#btn4').addClass('btn btn-outline-success');
                      
                      
                      $scope.fetchDatagetlegderGroup();
                      $scope.remove5();

                 
                  });

        }
        else
        {
            alert('Select the Date');
        }
          
      
}


$scope.remove5 = function () 
 {
    
    
         var fromdate= $('#from-date').val();

         if(fromdate!='')
         {

                  $('#btn5').html('Loading...');
                  $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/customer/dataclear_driver2",
                  data:{'fromdate':fromdate}
                  }).success(function(data)
                  {

                      
                      $('#btn5').html('IN DIRECT EXPENSES REMOVED');
                      $('#btn5').removeClass('btn btn-outline-danger');
                      $('#btn5').addClass('btn btn-outline-success');
                      
                      
                    
                      $scope.fetchDatagetlegderGroup();
                      $scope.remove6();

                 
                  });

        }
        else
        {
            alert('Select the Date');
        }
          
      
}



$scope.remove6 = function () 
 {
    
    
         var fromdate= $('#from-date').val();

         if(fromdate!='')
         {

                  $('#btn6').html('Loading...');
                  $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/customer/dataclear_vendor",
                  data:{'fromdate':fromdate}
                  }).success(function(data)
                  {

                      $('#btn6').html('INDIRECT INCOME  REMOVED');
                      $('#btn6').removeClass('btn btn-outline-danger');
                      $('#btn6').addClass('btn btn-outline-success');
                      
                      
                      $scope.fetchDatagetlegderGroup();
                        $scope.remove7();
                 
                  });

        }
        else
        {
            alert('Select the Date');
        }
          
      
}

$scope.remove7 = function () 
 {
    
    
         var fromdate= $('#from-date').val();

         if(fromdate!='')
         {

                  $('#btn7').html('Loading...');
                  $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/customer/dataclear_other",
                  data:{'fromdate':fromdate}
                  }).success(function(data)
                  {

                      
                      $('#btn7').html('PURCHASE ACCOUNT  REMOVED');
                      $('#btn7').removeClass('btn btn-outline-danger');
                      $('#btn7').addClass('btn btn-outline-success');

                     
                      $scope.fetchDatagetlegderGroup();
                         $scope.remove8();
                 
                  });

        }
        else
        {
            alert('Select the Date');
        }
          
      
}

$scope.remove8 = function () 
 {
    
    
         var fromdate= $('#from-date').val();

         if(fromdate!='')
         {

                  $('#btn8').html('Loading...');
                  $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/customer/advance_op_balance_zero",
                  data:{'fromdate':fromdate}
                  }).success(function(data)
                  {

                     

                      $('#btn8').html('SALES ACCOUNT REMOVED');
                      $('#btn8').removeClass('btn btn-outline-danger');
                      $('#btn8').addClass('btn btn-outline-success');
                      
                      $scope.fetchDatagetlegderGroup();
                         $scope.remove9();

                 
                  });

        }
        else
        {
            alert('Select the Date');
        }
          
      
}



$scope.remove9 = function () 
 {
    
    
         var fromdate= $('#from-date').val();

         if(fromdate!='')
         {

                  $('#btn9').html('Loading...');
                  $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/customer/dataclear_bank",
                  data:{'fromdate':fromdate}
                  }).success(function(data)
                  {

                      $('#btn9').html('ENQUIRY,QUOTATION REMOVED');
                      $('#btn9').removeClass('btn btn-outline-danger');
                      $('#btn9').addClass('btn btn-outline-success');
                      
                      $scope.fetchDatagetlegderGroup();

 $('#btn11').html('Reports (Excluding Enquiry and Yes or no reports)');
 $('#btn11').removeClass('btn btn-outline-danger');
 $('#btn11').addClass('btn btn-outline-success');




                 
                  });

        }
        else
        {
            alert('Select the Date');
        }
          
      
}


$scope.fetchDatagetlegderGroup = function(){
    
      var fromdate= $('#from-date').val();
     
    
   
     $http.get('<?php echo base_url() ?>index.php/customer/fetch_data_log_report?formdate='+fromdate).success(function(data){
      
      
      
      
      $scope.namesDataledgergroup = data;
      
      
      
      
        
        
      
    });
    
    
  };
  
  
  
  
  

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>



