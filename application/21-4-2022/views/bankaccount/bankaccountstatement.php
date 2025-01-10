<?php  include "header.php"; ?>
<style>
     #pristine-valid-common .row .col-md-12 {
             /* line-height: 44px; */
             margin-bottom: 14px;
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
                                    <h4 class="mb-sm-0 font-size-18">Bank Account Statement </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Bank Account Statement</li>
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
                              <div class="col-md-4" >
                              <select class="form-control" data-trigger name="choices-single-default"
                                                            id="choices-single-default"
                                                            placeholder="This is a search">
                                                            <option value="">Search Bank</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($bankaccount as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->bank_name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                                                        </select>
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="from-date" value="<?php echo date('Y-m-01'); ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" value="<?php echo date('Y-m-t'); ?>">
                            </div>
                            
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" id="exportdata" class="btn btn-success waves-effect waves-light"  >Export</button>
                            </div>
                           
                          </div>
                      </form>
                       
                   
                   
                        
                    </div>
                    
                </div>








<div class="row my-5">
                            <div class="col-xl-12">
                                <div class="text-center">
                                    <h4 class="card-title font-size-18">Bank Accounts & Transactions <br> {{bank_name}}</h4>
                                
                                </div>
                                <div class="row">
                                    

                                    <div class="col-xl-12" ng-init="fetchDatadetails(<?php echo $bank_id; ?>)">
                                        
                                        
                                        <div class="tab-content text-muted mt-4 mt-xl-0" id="v-pills-tabContent">
                                            <div class="tab-pane fade active show" id="v-price-one" role="tabpanel" aria-labelledby="v-pills-tab-one">
                                                <div class="table-responsive text-center pricing-table-bg">
                                                    <table class="table table-bordered mb-0 table-centered align-middle" style="font-size:11.5px;">
                                                        <tbody>
                                                            <tr>
                                                                <td><b>Transactions</b></td>
                                                                <td style="width: 20%;">
                                                                    <div class="py-3">
                                                                        <h5 class="font-size-14 mb-0">Status By</h5>
                                                                    </div>
                                                                </td>
                                                                <td style="width: 20%;text-align: right;">
                                                                    <div class="py-3">
                                                                        <h5 class="font-size-14 mb-0">Debit</h5>
                                                                    </div>
                                                                </td>
                                                                <td style="width: 20%;text-align: right;">
                                                                    <div class="py-3">
                                                                        <h5 class="font-size-14 mb-0">Credit</h5>
                                                                    </div>
                                                                </td>
                                                                <td style="width: 20%;">
                                                                    <div class="py-3">
                                                                        <h5 class="font-size-14 mb-0">Date</h5>
                                                                    </div>
                                                                </td>
                                                               
                                                            </tr>
                                                            
                                                            <tr ng-repeat="namess in namesDatadetails">
                                                                <th scope="row" style="text-align: left;">
                                                                    {{namess.name}} {{namess.ex_code}}
                                                                  
                                                                
                                                                </th>
                                                                <td style="text-align: left;">
                                                                    {{namess.status_by}}
                                                                </td>
                                                                <td style="text-align: right;">
                                                                    {{namess.debit}}
                                                                </td>
                                                                <td style="text-align: right;">
                                                                    {{namess.credit}}
                                                                </td >
                                                                 <td>{{namess.create_date}}</td>
                                                                </tr>
                                                            
                                                              <tr ng-show="namesDatadetails.length==0">
                                                               <td colspan="4"> No Transactions </td>           
                                                             </tr>
                                                             
                                                             
                                                             
                                                             
                                                             <tr>
                                                                  <td></td>
                                                                  <td></td>
                                                                 <td id="d_tot" style="font-weight:800;text-align: right;"></td>
                                                                 <td id="c_tot" style="font-weight:800;text-align: right;"></td>
                                                                 <td></td>
                                                             </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                           
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <!-- end col -->
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
$('#exportdata').on('click', function() {
  
  
    var id= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
   
  
    url = '<?php echo base_url() ?>index.php/bankaccount/export_bank_statement?limit=10&account_id='+id+'&formdate='+fromdate+'&todate='+fromto;

 
    location = url;

});
});

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;

   $('#choices-single-default').val(<?php echo $bank_id; ?>);
   
   $scope.bank_name = '<?php echo $name; ?>';
   

  $scope.submit_button = 'Create';


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/bankaccount/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };
  
  
  
$scope.search = function(){
    
    var userid= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    
    
    var name=$("#choices-single-default option:selected"). text();
    
    $scope.bank_name = name;
    
    $scope.fetchDatadetails(userid,fromdate,fromto);
   
    
    
};



 $scope.fetchDatadetails = function(id,fromdate,fromto){
    $http.get('<?php echo base_url() ?>index.php/bankaccount/fetch_data_details?account_id='+id+'&fromdate='+fromdate+'&fromto='+fromto).success(function(data){
      $scope.namesDatadetails = data;
      
                var amounttotaldebits = 0;
                for(var i = 0; i < data.length; i++){
                    var debit = parseInt(data[i].debit);
                    amounttotaldebits += debit;
                }
                
                
               $("#d_tot").text(amounttotaldebits);
               
               
               
                var amounttotalcredits = 0;
                for(var i = 0; i < data.length; i++){
                    var credit = parseInt(data[i].credit);
                  
                    amounttotalcredits += credit;
                }
                
                
               $("#c_tot").text(amounttotalcredits);
      
      
      
    });
  };
 




});

</script>
    <?php include ('footer.php'); ?>
</body>



