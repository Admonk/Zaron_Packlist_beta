<?php 

 include "header.php"; ?>

<style>

.table th {
    font-weight: 800;
    font-size: 9.5px;
}
.trpoint
{
    cursor: pointer;
}
.trpoint:hover {
    background: antiquewhite;
}
.card-header {
    display: block;
    text-align: center;
}
table#datatable {
    font-size: 11px;
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
                                    <h4 class="mb-sm-0 font-size-18">DELIVERY PENDING REPORT</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">DELIVERY PENDING REPORT !</li>
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
                            <div class="col-md-3" > <!--data-trigger -->
                              <input type="text" class="form-control" id="order_no" placeholder="Order No">
                            </div>
                            
                            
                            
                            
                            
                            <div class="col">
                              <input type="date" class="form-control" min="<?php echo date('2023-04-01'); ?>" id="from-date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" min="<?php echo date('2023-04-01'); ?>" id="to-date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                           
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata" >Export</button>
                            </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                     
                  <div id="search-view" >
                      
                     
                                    <div class="card-header"  ng-init="fetchSingleData(0)">
                                      
                                           <h4 class="card-title">DELIVERY PENDING REPORT {{formdate}} : Total Order : {{totalcount}}</h4>
                                           
                                        </p>
                                    </div>
                                    
                      <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                   
                   <table id="datatable" class="table table-bordered w-100"  ng-init="fetchDatagetlegderGroup()" >
                      <thead>
                        <tr>


                          <th>NO</th>
                          <th>BILL_DATE</th>
                          <th>MONTH</th>
                          <th>ORDER NO</th>
                          <th>CUSTOMER NAME</th>
                          <th>ITEMS</th>
                          <th>CATEGORY</th>

                          <th>COLOR</th>
                          <th>BRAND</th>
                          <th>THK</th>
                          <th>LENGTH</th>
                          <th>CRIMP</th>
                          <!-- <th>BILL NOS</th> -->

                          <th>PARTIAL PICK PENDING NOS</th>
                          <th>NOS</th>
                          <!--<th>RN MTR</th>-->
                          <!-- <th>BILL QTY</th> -->
           
                          <!-- <th>PARTIAL PICK PENDING QTY</th> -->
                          <th>QTY</th>
                          <th>TOTAL AMOUNT</th>
                          <th>AMOUNT W/O GST</th>
                          <th>UOM</th>
                          <th>SALES PERSON</th>
                          <th>GROUP</th>
                                      
                          <th>STATUS</th>
                          <th>REMARKS</th>
                        
                                        
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup | filter:query" >
                            
                            
                        <tr  class="trpoint" >
                          
                           <td>{{$index+1}}</td>
                           <td>{{names.create_date}} </td>
                           <td>{{names.month}}</td>
                           <td>{{names.order_no}}</td>
                           <td>{{names.company_name}}</td>
                           <td>{{names.product_name}}</td>
                           <td>{{names.categories_name}}</td>

                            <td>{{names.colors}}</td>
                            <td>{{names.brand}}</td>
                            <td>{{names.thickness}}</td>
                          
                              <td>{{names.profile}}</td>
                               <td>{{names.crimp}}</td>
                               <!-- <td>{{names.bill_nos}}</td> -->
                               
                                <td>
                                    <span ng-if="names.pending_nos>0" style="color:red;">{{names.pending_nos}}</span>
                                

                                </td>
                                 <td>{{names.nos}}</td>
                                 <!--<td>{{names.Sqr_feet_to_Meter}}</td>-->
                                 <!-- <td>{{names.bill_qty}}</td> 

                                 <td>
                                    <span ng-if="names.pending_qty>0.1" style="color:red;">{{names.pending_qty}}</span>
                                

                                </td>-->
                                  
                                 
                                  <td>{{names.qty}}</td>
                                <td style="text-align: right;">{{names.amount}}</td>

                                <td style="text-align: right;">{{names.price | number}}</td>

                                 <td>{{names.uom}}</td>

                                   <td>{{names.salesperson}}</td>
                                    <td>{{names.sales_group}}</td>
                                     
                                     
                          <td>{{names.status}}</td>
                          <td>{{names.remarks}}</td>
                            
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


  $('#from-date').blur(function() 
 {

    
    var date = $(this).val();
     
     var valdationdate='<?php echo date("2023-04-01"); ?>';

     if(valdationdate>date)
     {
         $('#from-date').val(valdationdate);
     }

});


  $('#to-date').blur(function() 
 {

    
    var date = $(this).val();
     
     var valdationdate='<?php echo date("2023-04-01"); ?>';

     if(valdationdate>date)
     {
         $('#to-date').val(valdationdate);
     }

});
  
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
  
  
$('#exportdata').on('click', function() 
{
  
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
      var cateid= $('#order_no').val();
      var productid= 0;
      var order_status= 0;
      
      url = '<?php echo base_url() ?>index.php/report/sheet_in_factory_report_data_export?limit=10&cate_id='+cateid+'&productid='+productid+'&formdate='+fromdate+'&todate='+fromto+'&order_status='+order_status;
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
  $scope.formdate = '<?php echo date('d-m-Y'); ?>';
  $scope.todate = '<?php echo date('Y-m-d'); ?>';

 
 
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
    
     
   
      $('#search-view').show();
      $('#exportdata').show();
      
      $scope.fetchDatagetlegderGroup();
    
    
    
};

<?php
if(isset($_GET['test']) &&  ($_GET['test'] = 'partial')){
  $url = 'sheet_in_factory_report_data_partial';
}else{
  $url = 'sheet_in_factory_report_data';

}
?>


$scope.fetchDatagetlegderGroup = function(){
    
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
      var cateid= $('#order_no').val();
      var productid= 0;
      var order_status= 0;
      $scope.totalcount= 0;
      $http.get('<?php echo base_url() ?>index.php/report/<?=$url?>?limit=10&cate_id='+cateid+'&productid='+productid+'&formdate='+fromdate+'&todate='+fromto+'&order_status='+order_status).success(function(data){
    
    
      $scope.query = {}
      $scope.queryBy = '$';
    
      $scope.namesDataledgergroup = data;
      
      $scope.totalcount= data[0].count;
      

        
      
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
           
    </body>
 </html>







