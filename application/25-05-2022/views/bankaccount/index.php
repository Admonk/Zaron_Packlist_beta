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
                                    <h4 class="mb-sm-0 font-size-18">Bank Account </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Bank Account</li>
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



    <a href="#" class="btn btn-success"  data-bs-toggle="modal" data-bs-target=".exampleModalToggleLabel" style="float:right;margin: 5px 10px;">Add New Bank Account</a>
  
 <div class="modal fade exampleModalToggleLabel" id="firstmodalcommison" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Add New Bank account</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                        

<form id="pristine-valid-example" novalidate method="post"></form>

                    <form id="pristine-valid-common" ng-submit="submitForm()" method="post">
                      



<div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="success">
                                            <i class="mdi mdi-check-all me-2"></i>
                                           {{successMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<div class="alert alert-danger alert-dismissible fade show" role="alert" ng-show="error">
                                            <i class="mdi mdi-block-helper me-2"></i>
                                            {{errorMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>




 <div class="row">

                         <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Bank name </label>
                            <div class="col-sm-7">
                              <input id="bank_name" class="form-control" required  ng-model="bank_name"  name="bank_name" type="text">

                            </div>
                          </div>
                        </div>
                        
                        
                          <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Account Number </label>
                            <div class="col-sm-7">
                              <input id="account_no" class="form-control" required  ng-model="account_no"  name="account_no" type="text">

                            </div>
                          </div>
                        </div>
                        
                           <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">IFSC CODE </label>
                            <div class="col-sm-7">
                              <input id="ifsc_code" class="form-control" required  ng-model="ifsc_code"  name="ifsc_code" type="text">

                            </div>
                          </div>
                        </div>
                        
                        
                        
                        
                          <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Type</label>
                            <div class="col-sm-7">
                            
                              <select class="form-control typeset" required  ng-model="type">
                                  <option value=""> Select Type</option>
                                  <option value="Personal Account">Personal Account</option>
                                  <option value="Corporate Account">Corporate Account</option>
                                  <option value="OD Account">OD Account</option>
                                  <option value="Loan Account">Loan Account</option>
                                 
                              </select>

                            </div>
                          </div>
                        </div>
                        
                        
                        
                        <div class="col-md-12" >
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Opeing Balance </label>
                            <div class="col-sm-7">
                              <input id="current_amount" class="form-control" required  ng-model="current_amount"  name="current_amount" type="text">

                            </div>
                          </div>
                        </div>
                        
                        
                         <div class="col-md-12" >
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Payment Status </label>
                            <div class="col-sm-7">
                                
                                
                              <select class="form-control typeset" required  ng-model="payment_status">
                                 
                                  <option value="1">Cr</option>
                                  <option value="2">Dr</option>
                                 
                              </select>
                              
                            

                            </div>
                          </div>
                        </div>
                        
                        
                         
                        

                       <div class="col-md-12">
                          <div class="form-group row">
                          
                            <div class="col-sm-12">
                                  
                                  <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                                  <input class="btn btn-success w-lg waves-effect waves-light" style="float: right;" type="submit" value="{{submit_button}}">

                            </div>
                          </div>
                        </div>
</div>
                        



            
                      
                      
                    
                    </form>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>















<div class="row my-5">
                            <div class="col-xl-12">
                                <div class="text-center">
                                    <h4 class="card-title font-size-18">Bank Accounts  {{bank_name}}</h4>
                                
                                </div>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                       
        <div class="row" ng-init="fetchData()">  
        
        
        <div class="col-lg-4 col-md-4" ng-repeat="name in namesData">
            <div class="nav flex-column nav-pills pricing-tab-box" id="v-pills-tab" role="tablist" aria-orientation="vertical" >
                                            
                                            
                                            
                                            
                                            
                                              <div class="d-flex align-items-center nav-link box-shadow mb-3 active">
                                                    <i class="bx bx-circle h3 mb-0 me-4"></i>
                                                    <div class="flex-1">
                                                        
                                                        <a  ng-click="onFetch(name.id,name.bank_name)"  href="<?php echo base_url(); ?>index.php/bankaccount/statement?bank_id={{name.id}}&name={{name.bank_name}}">
                                                        <h2 class="fw-medium"><span class="text-muted font-size-15">{{name.bank_name}}</span></h2>
                                                        <p  class="fw-normal mb-0 text-muted pt-1">{{name.account_no}}</p>
                                                        <p class="fw-normal mb-0 text-muted pt-1">{{name.ifsc_code}}</p>
                                                        <p class="fw-normal mb-0 text-muted pt-1">{{name.type}}</p>
                                                        </a>
                                            
                                                        <p class="fw-normal mb-0 text-muted pt-1">Available Balance: <b>{{name.current_amount | number}}</b>
                                                        
                                                        
                                                        <span ng-if='name.payment_status==1'>Cr</span>
                                                        <span ng-if='name.payment_status==2'>Dr</span>
                                                        
                                                        </p>
                                                        <button type="button" ng-click="fetchSingleData(name.id)" class="btn btn-outline-primary btn-sm">Edit</button>
                                                        <button type="button" ng-click="deleteData(name.id)" class="btn btn-outline-danger btn-sm">Delete</button></td>
                                                    
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

var app = angular.module('crudApp', ['datatables']);




app.filter('number', function () {        
    return function (input) {
        if (! isNaN(input)) {
            var currencySymbol = '₹';
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

  $scope.payment_status=1;

  $scope.submit_button = 'Create';


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/bankaccount/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };



 $scope.fetchDatadetails = function(id){
    $http.get('<?php echo base_url() ?>index.php/bankaccount/fetch_data_details?account_id='+id).success(function(data){
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
 
  $scope.onFetch = function(id,bank_name){
       
       $scope.fetchDatadetails(id);
       $scope.bank_name=bank_name;
  }
 
 
  $scope.submitForm = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/bankaccount/insertandupdate",
      data:{'bank_name':$scope.bank_name,'current_amount':$scope.current_amount,'payment_status':$scope.payment_status,'type':$scope.type,'account_no':$scope.account_no,'ifsc_code':$scope.ifsc_code,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'bankaccount'}
    }).success(function(data){
       
      if(data.error != '1')
      {
        $scope.success = true;
        $scope.error = false;
        $scope.bank_name = "";
        $scope.type = "";
        $scope.account_no = "";
        $scope.ifsc_code = "";
        $scope.current_amount = "";
        $scope.hidden_id = "";
        $scope.successMessage = "Bank Account successfully "+$scope.submit_button;
        $scope.fetchData();
      }



    });
  };


$scope.fetchSingleData = function(id){
    
    
     $('#firstmodalcommison').modal('toggle');
    
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/bankaccount/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'bankaccount'}
    }).success(function(data){
        
        
         $scope.bank_name = data.bank_name;
         $scope.type = data.type;
         $scope.account_no = data.account_no;
         $scope.ifsc_code = data.ifsc_code;
         $scope.current_amount = data.current_amount;
         $scope.payment_status = data.payment_status;
         
         $scope.hidden_id = id;
         $scope.submit_button = 'Update';
     
    });
};



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/bankaccount/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'bankaccount'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        $scope.fetchData();
      }); 
    }
};




});

</script>
    <?php include ('footer.php'); ?>
</body>



