<?php include "header.php"; ?>
<!DOCTYPE html>
<html ng-app="journal">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Voucher Entry Edit</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/journal/journal.css">
   <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark"  ng-controller="JournalController">
   <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/angular.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>

  
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.6/ui-bootstrap-tpls.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>




   <!-- <script src="<?php echo base_url(); ?>assets/js/journal/journal.js"></script> -->
   <div id="layout-wrapper">
      <?= $top_nav; ?>
      <div class="main-content">
         <div class="page-content">
            <div class="container-fluid">
            <form name="myForm" ng-submit="saveData()" novalidate>
               <div class="row">
                  <div class="col-12">
                     <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Voucher Entry Edit</h4>
                        <span ng-show="error_msg"><h5 style="color:red"><b>{{error_msg}}</b></h5></span>
                        <div class="page-title-right">
                           <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="<?= base_url('index.php/dashboard'); ?>">Dashboard</a>
                              </li>
                              <li class="breadcrumb-item active">
                                 <?= $title; ?>
                              </li>
                           </ol>
                        </div>
                     </div>
                     <div class="row align-items-start">
                        <div class="col-md-3">
                           <label for="vch_type">Voucher Type <span style="color: red;">*</span></label>
                           <select id="vch_type" name="selectedVoucherType" ng-model="selectedVoucherType" ng-options="value as label for (value, label) in voucherTypes" ng-change="onVoucherTypeChange()" class="form-control ">
                              <option value="">Select Voucher Type</option>
                           </select>
                           <span ng-show="myForm.selectedVoucherType.$dirty && myForm.selectedVoucherType.$error.required" style="color:red;"><b>Voucher type is required.</b></span>
                        </div>
                        <div class="col-md-3">
                           <label for="vch_no"> Voucher Number </label>
                           <div>
                           <span style="margin-left: -12px">{{voucher_base }}</span>
                           <input id="vch_no" type="number" name="voucherNumber"ng-model="voucherNumber" class="form-control no-spinner" readonly>

                           </div>
                           <!-- <span ng-show="myForm.voucherNumber.$dirty && myForm.voucherNumber.$error.required" style="color:red;"><b>voucher number is required.</b></span> -->
                        </div>
                        <div class="col-md-3">
                           <label for="upi_no"> Ref Number </label>
                           <div>
                           <!-- <span style="margin-left: -12px">{{voucher_base }}</span> -->
                           <input id="upi_no" type="text" name="upiNumber"ng-model="upiNumber" class="form-control no-spinner" style="margin-top: 0px;border: 1px solid;border-radius: 27px;padding: 5px 10px;max-width: 300px;border-color: rgb(206, 212, 218);">

                           </div>
                           <!-- <span ng-show="myForm.voucherNumber.$dirty && myForm.voucherNumber.$error.required" style="color:red;"><b>voucher number is required.</b></span> -->
                        </div>
                        <div class="col-md-3">
                           <label for="vch_date">Date</label>
                           <div class="input-group date">
                              <input id="vch_date" type="date" min="<?php echo date('2024-08-01'); ?>" name="selectedDateModels" ng-model="selectedDateModels" value="{{selectedDateModels}}"  class="form-control exc-admin" ng-model-options="{ getterSetter: true }">
                              <!-- <div class="row justify-content-end">
                                 <div class="col-md-auto">
                                    <div id="dayOfWeek">{{ dayOfWeek }}</div>
                                 </div>
                              </div> -->
                           </div>
                        </div>
                     </div>
                     <div class="col-12">
                        <!-- <button class="btn btn-success mt-2" ng-click="addRow()">Add Row</button> -->
                     </div>
                     <table id="dynamic-table" class="table table-striped table-bordered table-condensed">
                        <thead>
                           <tr class="dynamic-table-trs">
                              <th>Entry Type <span style="color: red;">*</span></th>
                              <th ng-show="VoucherTypeStatus != 'contra'">Ledger Type <span style="color: red;">*</span></th>
                              <th ng-show="VoucherTypeStatus != 'contra'" style="width:1em;">Particulars <span style="color: red;">*</span></th>
                              <th ng-show="VoucherTypeStatus == 'contra'">Transaction Mode <span style="color: red;">*</span></th>
                              <th ng-show="VoucherTypeStatus == 'contra'">Bank Account <span style="color: red;">*</span></th>
                              <!-- <th ng-show="VoucherTypeStatus == 'contra'">Reference No</th> -->
                              <th>Debit</th>
                              <th>Credit</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr class="trpoint" ng-repeat="row in tableRows track by $index">
                              <td>
                                 <div class="input-group">
                                 <input type="text" ng-model="row.id" name="row.id" hidden>

                                    <select class="form-control" name="row.selectedOption"  ng-model="row.selectedOption" ng-change="onTypeChange(row)" required>
                                       <option value="" disabled selected>Select Type</option>
                                       <option value="dr">Dr</option>
                                       <option value="cr">Cr</option>
                                    </select>
                                    <span ng-show="myForm.row.selectedOption.$dirty && myForm.row.selectedOption.$error.required"></span>

                                 </div>
                              </td>
                              <td ng-show="VoucherTypeStatus != 'contra'">
                                 <div class="input-group">
                                    <select name="row.selectedType" ng-model="row.selectedType"  ng-change="updateNames(row)" class="form-control" ng-required="VoucherTypeStatus !== 'contra'">
                                       <option value="" disabled selected>Select Customer Type</option>
                                       <option ng-show="ledger_type_cus_status" value="1">Customers</option>
                                       <option ng-show="ledger_type_cus_status" value="10">Cnn</option>
                                       <option ng-show="ledger_type_cus_status" value="3">Vendors</option>
                                       <option ng-show="ledger_type_cus_status" value="5">Others</option>
                                       <option ng-show="ledger_type_cus_status" value="2">Drivers Rent</option>
                                       <option ng-show="ledger_type_cus_status" value="22">Drivers Collection</option>
                                       <option ng-show="ledger_type_bnk_status" value="4">Bank Account</option>
                                       <option ng-show="ledger_type_bnk_status" value="9">Cash</option>
                                    </select>
                                    <span ng-show="myForm.row.selectedType.$dirty && myForm.row.selectedType.$error.required"></span>

                                 </div>
                              </td>

                              <td style="width: 100px; height:70px" ng-show="VoucherTypeStatus != 'contra'">
                              <div class="input-group" style="width: 400px; height: 35px;" id="show_{{$index}}">             
                              <input type="textt" class=" select2customername form-control border-bottom-input ng-pristine ng-valid ng-touched"                               
                                 
                              uib-typeahead="item for item in completeCustomer(row,index)" name="row.party"
                                    ng-model="row.party" placeholder="Search Names" id="party_{{$index}}" ng-blur="handleSelectedBalance(row,$index)" ng-required="VoucherTypeStatus !== 'contra'">
                                             <!-- <br> -->
                                            
                                 </div>
                                 <span style="margin-left: 14px;" ng-if="row.opening_balance"><b>Avilable Balance: {{row.opening_balance | number}}</b></span>
                                 <span ng-show="myForm.row.party.$dirty && myForm.row.party.$error.required"></span>

                              </td>

                              <td ng-show="VoucherTypeStatus == 'contra'" >
                                 <div class="input-group">
                                    <select ng-model="row.selectedTransactionType" name="row.selectedTransactionType" ng-change="onTransactionTypeChange(row)" class="form-control" ng-required="VoucherTypeStatus == 'contra'">
                                       <option value="" disabled selected>Select Transaction Mode</option>
                                       <option value="1">Bank Account</option>
                                       <!-- <option value="2">Cheque</option> -->
                                       <option value="3">Cash</option>
                                       <!-- <option value="4">Petty Cash</option> -->
                                    </select>
                                    <span ng-show="myForm.row.selectedTransactionType.$dirty && myForm.row.selectedTransactionType.$error.required"></span>

                                 </div>
                              </td>

                              <td ng-show="VoucherTypeStatus == 'contra'">
                                 <div class="input-group">
                                    <select ng-model="row.selectedbankType" name="row.selectedbankType" ng-change="Getbankaccount(row)" class="form-control" ng-required="VoucherTypeStatus == 'contra'">
                                       <option value="" disabled selected>Select Account</option>
                                       <option ng-repeat="name in row.names" value="{{ name.id }}">{{ name.bank_name }}</option>
                                    </select>
                                    <span ng-show="myForm.row.selectedbankType.$dirty && myForm.row.selectedbankType.$error.required"></span>

                                 </div>
                                 
                                 <span style="margin-left: 14px;"  ng-if="row.current_amount"><b>Avilable Balance: {{row.current_amount | number}}</b></span>

                              </td>

                              <!-- <td style="width: 100px; height:70px" ng-show="VoucherTypeStatus == 'contra'">
                                 <div class="input-group" style="width: 300px; height: 35px;">
                                 <input id="reference_no" type="text" ng-model="row.reference_no" class="form-control" placeholder="Enter Reference No">
                                 </div>
                              </td> -->

                             

                              <td style="width: 150px;">
                                 <div class="input-group">
                                    <input type="number" ng-model="row.debit" ng-enter="addRow()" class="form-control no-spinner" placeholder="₹" ng-disabled="row.credit !== null && row.credit !== '' || row.selectedOption === 'cr'">
                                 </div>
                              </td>
                              <td style="width: 150px;">
                                 <div class="input-group">
                                    <input type="number" ng-model="row.credit" ng-enter="addRow()" class="form-control no-spinner" placeholder="₹" ng-disabled="row.debit !== null && row.debit !== '' || row.selectedOption === 'dr'">
                                    <?php
if((!$_GET['voucher_type'] == 'journal') || ($this->session->userdata['logged_in']['userid']=='1541' || $this->session->userdata['logged_in']['userid']=='1910' || $this->session->userdata['logged_in']['userid']=='1911')){
   ?>

 
                                    <span class="btn btn-outline-danger miniesbtn" ng-if="$index > 0" ng-click="removeRow($index)">-</span>

<?php
}
?>

                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="row align-items-start">
                  <div class="col-md-6">
                  <h6>Narration</h6>
                     <textarea ng-model="narration" class="exc-admin" name="narration" cols="50" rows="5"></textarea>
                  </div>
                  
                  <div class="col-md-3">
                  </div>
                
                  <div class="col-md-3" style="width: 305px; margin-left:85px">
                  <hr>
                  <span ><b>{{ getTotalDebit()  }}</b></span>
                  
                  <span style="margin-left: 15px;"><b>{{ getTotalCredit() }}</b></span>
                  <hr>
                  </div>
               </div>
               <div class="row align-items-start">
                  <div class="col-md-6">
                     <!-- <h6>Narration</h6>
                     <textarea ng-model="narration" cols="50" rows="5"></textarea> -->
                  </div>
<?php
if(($_GET['voucher_type'] == 'journal') && ($this->session->userdata['logged_in']['userid']=='1910' || $this->session->userdata['logged_in']['userid']=='1911')){
   ?>

                  <div class="col-md-6 text-md-right">
                     <div class="row justify-content-end">
                        <div class="col-md-auto">
                        <button type="submit" class="btn btn-primary" id="savebutton">Submit</button>
                           <!-- <input type="button" class="btn btn-primary" value="Save"> -->
                        </div>
                     </div>
                  </div>
<?php
}


if($this->session->userdata['logged_in']['access']=='1'){
 ?>

                  <div class="col-md-6 text-md-right">
                     <div class="row justify-content-end">
                        <div class="col-md-auto">
                        <button type="submit" class="btn btn-primary" id="savebutton">Submit</button>
                           <!-- <input type="button" class="btn btn-primary" value="Save"> -->
                        </div>
                     </div>
                  </div>
<?php
}
?>

               </div>
            </form>   
            </div>
            
         </div>
         <!-- </div> -->
      </div>
      

<script>









$(document).ready(function () {
    // Attach a change event listener to the #vch_date input
    $('#vch_date').change(function () {
      // Get the selected date value
      var selectedDate = $(this).val();
      
      // Perform any custom logic here, e.g., date validation or updating other elements
      console.log("Date changed to: " + selectedDate);
      
      // Optional: Validate date against min and max
      var minDate = new Date("<?php echo date('2024-08-01'); ?>");
      var maxDate = new Date("<?php echo date('Y-m-d'); ?>");
      var inputDate = new Date(selectedDate);

      if (inputDate < minDate || inputDate > maxDate) {
        alert("Please select a date between " + minDate.toISOString().split('T')[0] + " and " + maxDate.toISOString().split('T')[0]);
        $(this).val(''); // Clear the input if validation fails
      } 
      else 
      {
        // Success logic here
        console.log("Valid date selected.");
      }
    });
  });


   
   var app = angular.module('journal', ['datatables','ui.bootstrap']);

   
app.directive('loading', function () {
      return {
        restrict: 'E',
        replace:true,
        template: '<div class="loading"><img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" width="20" height="20" /> LOADING...</div>',
        link: function (scope, element, attr) {
              scope.$watch('loading', function (val) {
               console.log(val)
                  if (val)
                      $(element).show();
                  else
                      $(element).hide();
              });
        }
      }
})

app.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if (event.which === 13) {
                scope.$apply(function () {
                    scope.$eval(attrs.ngEnter);
                });

                event.preventDefault();
            }
        });
    };
});

// app.directive('autoComplete', function($timeout) {
//     return function(scope, iElement, iAttrs) {
//             iElement.autocomplete({
//                 source: scope[iAttrs.uiItems],
//                 select: function() {
//                     $timeout(function() {
//                       iElement.trigger('input');
//                     }, 0);
//                 }
//             });
//         };
//     });

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


   app.controller('JournalController', ['$scope', '$http' ,'$q', function($scope, $http, $q) {

      var baseURL = '<?php echo base_url(); ?>';
      var url = new URL(window.location.href);
      var id = url.searchParams.get("id");
      var deletemod = url.searchParams.get("deletemod");
      var customer_id = url.searchParams.get("customer_id");
      var voucher_type = url.searchParams.get("voucher_type");
      var c_voucher_no=1;
      var j_voucher_no=1;
      var p_voucher_no=1;
      var r_voucher_no=1;
      var multipleRowCnt = 1;
      $scope.voucher_base = '';
      $scope.opening_balance_status=false;
      $scope.formData = {};
      $scope.error_msg = '';
      $scope.ledger_type_cus_status = true;
      $scope.ledger_type_bnk_status = true;
      $scope.addRowAllowed = true;
      $scope.selectedVoucherType = '';
      $scope.VoucherTypeStatus = '';
      $scope.voucherNumber = '';
      $scope.current_amount='';
      $scope.selectedDate = new Date();
      $scope.dayOfWeek = '';
      $scope.tableRows = [];
      $scope.payment_time='';
      $scope.dataObj={};
     
      // $scope.selectedDateModels = '2023-10-05'
 
      function convertDateFormat(inputDate) {
    // Split the input date into parts
    var parts = inputDate.split('-');

    // Rearrange the parts to form the new date format
    var newDateFormat = parts[2] + '-' + parts[1] + '-' + parts[0];

    return newDateFormat;
}
            
    $scope.getOldData = function() {

        var cr_dr_type = '';
        var dr_val = null;
        var cr_val = null;
        var party_type = "";

        // console.log(deletemod)
        $http({
		      method:"POST",
		      url:"<?php echo base_url(); ?>index.php/journal/get_edit_voucher_data",
		      data:{'id':id,'deletemod':deletemod,'voucher_type':voucher_type }
		    }).success(function(data){
            $scope.dataObj=data;
              angular.forEach(data, function(datas) {
            $scope.selectedVoucherType = datas.voucher_base;
           
           
            $scope.voucherNumber = parseInt(datas.voucher_no);
            $scope.party = datas.customer_id +'-'+ datas.party_name;

            $scope.upiNumber = datas.reference_no;
            $scope.narration = datas.notes;
            if(datas.customer_id == '25'){
               party_type = '9';
            }else{
               party_type = datas.party_type;
            }
            $scope.selectedDateModels = new Date(datas.payment_date);
            $scope.payment_time = datas.payment_time;
            $scope.id = datas.id;
                    if(datas.debits > 0){
                        cr_dr_type = 'dr';
                        cr_val = null;
                        dr_val =parseFloat(datas.debits);
                        
                        
                    }else{
                        cr_dr_type = 'cr';
                        dr_val = null;
                        cr_val = parseFloat(datas.credits);

                    }
                    
            var newRow = {
                id  : $scope.id,
                selectedid: '',
                selectedOption: cr_dr_type,
                debit: dr_val,
                credit: cr_val,
                party: $scope.party ,
                selectedType: party_type,
                selectedbankType : datas.customer_id
                };
      
            $scope.tableRows.push(newRow);

            // console.log($scope.voucherNumber)
        });
                
            })

            }

            $scope.getOldData();

    //   for(var i=0; i < multipleRowCnt; i++ ){
    //      var newRow = {
    //         selectedid: '',
    //         debit: null,
    //         credit: null
    //      };
      
    //   $scope.tableRows.push(newRow);
    //   }
      
      $scope.voucherTypes = {
         'contra': 'Contra',
         'payment': 'Payment',
         'receipt': 'Receipt',
         'journal': 'Journal',
         // 'bank-ex': 'Bank-ex',
         // 'purchase': 'Purchase',
         // 'memo': 'Memo'
      };
    
      $scope.updateDayOfWeek = function() {
         const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
         $scope.dayOfWeek = daysOfWeek[$scope.selectedDate.getDay()];
      };

      $scope.loadSelect2ForFormControl = function() {
         $timeout(function() {
            // Loop through each row and initialize Select2 for the respective particulars dropdown
            $scope.tableRows.forEach(function(row, index) {
               $('#selectParticulars' + index).select2();
            });
         });
      };

      $scope.onVoucherTypeChange = function() {
         
         $scope.VoucherTypeStatus = $scope.selectedVoucherType;  
         // console.log($scope.VoucherTypeStatus)
         $http({
		      method:"POST",
		      url:"<?php echo base_url(); ?>index.php/journal/get_voucher_sequence",
		      data:{'voucher_base':$scope.VoucherTypeStatus}
		    }).success(function(data){
           
         // console.log(data)
            for(var i=0; i < data.length; i++){
               var datas = data[i];
               if(datas.voucher_base == "contra"){
               c_voucher_no = parseInt(datas.voucher_no) +1;
               }
               else if(datas.voucher_base == "journal"){
                  j_voucher_no = parseInt(datas.voucher_no) +1;
               }
               else if(datas.voucher_base == "payment"){
                  p_voucher_no = parseInt(datas.voucher_no) +1;
               }
               else if(datas.voucher_base == "receipt"){
                  r_voucher_no = parseInt(datas.voucher_no) +1;
               }
            }

           
         if($scope.VoucherTypeStatus == 'contra'){
            $scope.voucherNumber = c_voucher_no;
            $scope.voucher_base = 'C';
            $scope.ledger_type_cus_status = true;
            $scope.ledger_type_bnk_status = true;
         }else if($scope.VoucherTypeStatus == 'journal'){
            $scope.voucherNumber = j_voucher_no;
            $scope.voucher_base = 'J';
            $scope.ledger_type_cus_status = true;
            $scope.ledger_type_bnk_status = true;
         }
         else if($scope.VoucherTypeStatus == 'payment'){
            $scope.tableRows =[];
            $scope.voucherNumber = p_voucher_no;
            $scope.voucher_base = 'P';
            angular.forEach($scope.dataObj, function(data) {
             $scope.id = data.id;
             $scope.payment_time = data.payment_time;
             $scope.party = data.dummy_customer_id +'-'+ data.dummy_customer_name;
             if(data.dummy_customer_id == '25'){
             party_type = '9';
             }else{
                party_type = data.dummy_party_type;
             }
             if(data.debits > 0){
                      cr_dr_type = 'dr';
                      cr_val = null;
                      dr_val =parseFloat(data.debits);
                      
                      
                  }else{
                      cr_dr_type = 'cr';
                      dr_val = null;
                      cr_val = parseFloat(data.credits);

                  }
         

          var newRow = {
              id  : $scope.id,
              selectedid: '',
              selectedOption: cr_dr_type,
              debit: dr_val,
              credit: cr_val,
              party: $scope.party,
              selectedType: party_type,
              selectedbankType : data.customer_id
              };

          $scope.tableRows.push(newRow);
       })
         }  
         else if($scope.VoucherTypeStatus == 'receipt'){
            $scope.tableRows =[];
            $scope.voucherNumber = r_voucher_no;
            $scope.voucher_base = 'R';

            // console.log($scope.dataObj)
            angular.forEach($scope.dataObj, function(data) {
               $scope.id = data.id;
               $scope.payment_time = data.payment_time;
               $scope.party = data.dummy_customer_id +'-'+ data.dummy_customer_name;
               
               if(data.dummy_customer_id == '25'){
               party_type = '9';
               }else{
                  party_type = data.dummy_party_type;
               }
               if(data.debits > 0){
                        cr_dr_type = 'dr';
                        cr_val = null;
                        dr_val =parseFloat(data.debits);
                        
                        
                    }else{
                        cr_dr_type = 'cr';
                        dr_val = null;
                        cr_val = parseFloat(data.credits);

                    }
           

            var newRow = {
                id  : $scope.id,
                selectedid: '',
                selectedOption: cr_dr_type,
                debit: dr_val,
                credit: cr_val,
                party: $scope.party,
                selectedType: party_type,
                selectedbankType : data.customer_id
                };

            $scope.tableRows.push(newRow);
         })
            // $scope.ledger_type_cus_status = false;
            // $scope.ledger_type_bnk_status = true;
        }
		         
		    });
    };
   //  $scope.tableRows.push({
   //          selectedid: '',
   //          selectedOption: '',
   //          debit: null,
   //          credit: null,
   //          selectedType: $scope.selectedType
   //       });
    $scope.onTypeChange = function(div){

      if($scope.VoucherTypeStatus == 'payment' && div.selectedOption =='dr'){
         $scope.ledger_type_cus_status = true;
         $scope.ledger_type_bnk_status = false;
      }
      else if($scope.VoucherTypeStatus == 'payment' && div.selectedOption =='cr'){
         // alert("gg")
         $scope.ledger_type_cus_status = false;
         $scope.ledger_type_bnk_status = true;
      }


      if($scope.VoucherTypeStatus == 'receipt' && div.selectedOption =='dr'){
         $scope.ledger_type_cus_status = false;
         $scope.ledger_type_bnk_status = true;
      }
      else if($scope.VoucherTypeStatus == 'receipt' && div.selectedOption =='cr'){
         $scope.ledger_type_cus_status = true;
         $scope.ledger_type_bnk_status = false;
      }

    }


      $scope.completeCustomer=function(div,index){
         // alert("FFF")
         // console.log($q)
       var deferred = $q.defer(); // Inject $q service
       var matchingItems = [];
       var type = 0;
       var search= div.party;
       
        var party = div.selectedType;

        if(party == 2){
         type = 1;
        }else if(party == 22){
         type = 0;
         party = 2;
        }

          if(party=='10')
        {
          var url='userget_cnn';
        }
        else
        {
          var url='userget';
        }

      //   console.log(party);
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/"+url,
          data:{'search':search,'party_type':party, 'type': type}
        }).success(function(data){
              // $scope.availableTags = data;
          for (var i = 0; i < data.length; i++) {
            var item = data[i].toLowerCase();      
            if (item.includes(search.toLowerCase())) {
              matchingItems.push(data[i]);
            }
          }

            deferred.resolve(matchingItems); 
            // console.log(matchingItems);
         }).error(function(error) {
                  deferred.reject(error); 
        });

          return deferred.promise;

  }; 


  $scope.handleSelectedBalance = function(div,nos) {
             $http({
		      method:"POST",
		      url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
		      data:{'id':div.party, 'action':'fetch_single_data','tablename':'customers','party_type':div.selectedType}
		    }).success(function(data){
            $scope.opening_balance_status=true;
            // console.log(data)
		         div.opening_balance = data.opening_balance;
		    });

          
       $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
              data:{'id':div.party, 'action':'fetch_single_data','tablename':div.selectedType}
             }).success(function(data){
                
                   if(data.error=='0')
                   {
                        $('#savebutton').hide();
                        $('#show_'+nos).css("border-color", "red");
                         $('#party_'+nos).css("border-color", "red");
                        
                   }
                   else
                   {
                       
                         $('#savebutton').show();
                           $('#show_'+nos).css("border-color", "green");
                         $('#party_'+nos).css("border-color", "green");
                        
                   }
                
                
             
            });


    };

    $scope.Getbankaccount = function (row) {
      $bank_id = row.selectedbankType;
      $http({
         method:"POST",
         url:"<?php echo base_url() ?>index.php/bankaccount/fetch_single_data",
         data:{'id':$bank_id, 'action':'fetch_single_data','tablename':'bankaccount'}
       }).success(function(data){

            // $scope.bank_name = data.bank_name;
            // $scope.type = data.type;
            // $scope.account_no = data.account_no;
            // $scope.ifsc_code = data.ifsc_code;
            row.current_amount = data.current_amount;
            // console.log($scope.current_amount)

       });
}; 

      $scope.loadSelect2 = function() {
         for (let i = 0; i < $scope.tableRows.length; i++) {
            const selectElement = $('#selectParticulars' + i);

            selectElement.select2();

            selectElement.on('change', function() {
               const selectedIndex = $(this).val();
               $scope.$apply(function() {
                  $scope.tableRows[i].selectedid = selectedIndex;
               });
            });
         }
      };

 
      $scope.getTotalCredit = function() {
        var total = 0;
        angular.forEach($scope.tableRows, function(row) {
            if (row.credit !== null && row.credit !== '') {
                total += parseFloat(row.credit);
               //  console.log(row.credit)
            }
        });
        return total.toFixed(2);
      };

      $scope.getTotalDebit = function() {
         var total = 0;
         angular.forEach($scope.tableRows, function(row) {
               if (row.debit !== null && row.debit !== '') {
                  total += parseFloat(row.debit);
                  // row.credit = total;
               }
         });
         return total.toFixed(2);
      };
      
      $scope.addRow = function() {
         var cr_dr_type = '';
         var cr_val = null;
         var dr_val = null;
         var totalDebit = $scope.getTotalDebit();
         var totalCredit  = $scope.getTotalCredit();

         if(totalDebit == totalCredit){
            $scope.addRowAllowed=false;
         }else{
            $scope.addRowAllowed=true;
         }

         
         if($scope.VoucherTypeStatus == 'journal'){
            if(totalDebit == totalCredit){
               cr_dr_type = '';
         }else{
         cr_val = parseFloat(totalDebit);
         cr_dr_type = 'cr';
         }
      }
      else if($scope.VoucherTypeStatus == 'payment'){
         if(totalDebit == totalCredit){
            cr_dr_type = '';
         }else{
         dr_val = parseFloat(totalCredit);
         cr_dr_type = 'dr';
         $scope.ledger_type_cus_status = true;
         $scope.ledger_type_bnk_status = false;
        
         }
      }
      else if($scope.VoucherTypeStatus == 'receipt'){
         if(totalDebit == totalCredit){
            cr_dr_type = '';
         }else{
         cr_val = parseFloat(totalDebit);
         cr_dr_type = 'cr';
         $scope.ledger_type_cus_status = true;
         $scope.ledger_type_bnk_status = false;
        
         }
      }
      else{
         cr_dr_type = '';
         }
         
      // console.log(cr_val)
      if ($scope.addRowAllowed) {
         $scope.tableRows.push({
            selectedid: '',
            selectedOption: cr_dr_type,
            debit: dr_val,
            credit: cr_val,
            selectedType: $scope.selectedType
         });

         // Reinitialize Select2 for the newly added row
         $timeout(function() {
            const newIndex = $scope.tableRows.length = 1;
            $('#selectParticulars' + newIndex).select2();
         });
      }
      };

      $scope.isOppositeOptionDisabled = function(selectedOption) {
         return selectedOption === 'dr' ? 'cr' : 'dr';
      };

      $scope.removeRow = function(index) {
         <?php
if((!$_GET['voucher_type'] == 'journal') || ($this->session->userdata['logged_in']['userid']=='1541' || $this->session->userdata['logged_in']['userid']=='1910' || $this->session->userdata['logged_in']['userid']=='1911')){
   ?>
return;

<?php
}
?>
         $scope.tableRows.splice(index, 1);
      };


      $scope.isDriverSelected = function(selectedid) {
         if (selectedid && $scope.selectedType === 'drivers') {
            const selectedCustomer = $scope.driverNames.find(driver => driver.id === selectedid);
            return !!selectedCustomer;
         }
         return false;
      };
console.log("$this->session->userdata['logged_in']['userid']",<?=$this->session->userdata['logged_in']['userid']?>);


<?php
if(($_GET['voucher_type'] == 'journal') && ($this->session->userdata['logged_in']['userid']=='1541' || $this->session->userdata['logged_in']['userid']=='1910' || $this->session->userdata['logged_in']['userid']=='1911')){
   ?>


setTimeout(() => {


   $('input, select, textarea, button').attr('disabled','disabled');
   $('.miniesbtn').hide();
   $('#savebutton').hide();

}, 1500);





<?php
}


if(($this->session->userdata['logged_in']['userid']==1541)){
   ?>
setTimeout(() => {
   $('.exc-admin').removeAttr('disabled');
   $('#savebutton').removeAttr('disabled');
},1600);

<?php
}
?>
      $scope.onTransactionTypeChange = function(row){
      // console.log(row.selectedTransactionType)

      $http.get(baseURL + 'index.php/journal/get_names')
         .then(function(response) {
            console.log(response)
            if (row.selectedTransactionType === '1') {
                  row.names = response.data.bankaccount;
               } else if (row.selectedTransactionType === '2') {
                  row.names = response.data.bankaccount;
               }else if(row.selectedTransactionType === '3'){
                  row.names = response.data.cash;
               }else if(row.selectedTransactionType === '4'){
                  row.names = [];
               }

         })
         .catch(function(error) {
            console.error('Error fetching names:', error);
         });
      // console.log($scope.selectedTransactionType)
    }

      $scope.formatDate = function(date) {
         const day = date.getDate().toString().padStart(2, '0');
         const month = (date.getMonth() + 1).toString().padStart(2, '0');
         const year = date.getFullYear();
         return day + '-' + month + '-' + year;
      };

      $scope.selectedDateModel = function(newDate) {
        var new_date =  $scope.selectedDateModels;
         if (new_date) {
            // $scope.updateDayOfWeek(newDate);
            return $scope.formatDate(new_date);
         } else {
            return $scope.formatDate($scope.selectedDate);
         }
      };

      // $scope.$watch('selectedDate', function(newDate) {
      //    $scope.updateDayOfWeek();
      // });



      // $('#vch_date').datepicker({
      //    format: 'dd-mm-yyyy',
      //    autoclose: true,
      //    todayHighlight: true,
      //    orientation: 'bottom'
      // }).on('changeDate', function(e) {
      //    $scope.selectedDate = e.date;
      //    $scope.$apply();
      //    // $scope.updateDayOfWeek();
      // });
      
      var endpoint = '';
      $scope.saveData = function() {
         // console.log(customer_id)
         // console.log($scope.myForm)
         // event.preventDefault();
         var vch_date=$('#vch_date').val();
         $scope.formData = {
            voucherType: $scope.selectedVoucherType,
            payment_time: $scope.payment_time,
            voucher_base : $scope.selectedVoucherType,
            voucherNumber: $scope.voucherNumber,
            upiNumber : $scope.upiNumber,
            selectedDate: vch_date,
            selectedType: $scope.selectedType,
            tableRows: $scope.tableRows,
            carryVoucher: $scope.carryVoucher,
            multiEntry: $scope.multiEntry,
            narration: $scope.narration
         };

         var cr_type=0;
         var cr_party='';
         angular.forEach($scope.formData.tableRows, function(row) {
            if(row.selectedOption == 'cr'){
              cr_type = row.selectedType;
              cr_party = row.party;
            }
         })

         // console.log($scope.selectedVoucherType);
         if($scope.selectedVoucherType == 'contra'){
            endpoint = 'index.php/journal/update_data_cantra?deletemod=' + deletemod;
         }else{
            endpoint = 'index.php/journal/update_data?cr_type=' + cr_type + '&cr_party=' + cr_party + '&deletemod=' + deletemod;
         }

      //   console.log(cr_type)
      var totalDebit = $scope.getTotalDebit();
      var totalCredit  = $scope.getTotalCredit();

        if(vch_date!='')
    {
         
      if ($scope.myForm.$valid) {



if(totalCredit>0 && totalCredit>0)
{




         if(endpoint !== '' && totalCredit == totalDebit){




            $('#savebutton').text('Please Wait...').prop('disabled', true);
            
            $http.post(baseURL + endpoint, $scope.formData)
               .then(function(response) {

                  if(response.data.status == "success"){
                     alert(response.data.message);
                     
                     window.close();



                  }
               })
               .catch(function(error) {
                  console.error('Error updating data:', error);
               });
   
            }
            else if(customer_id == '23100'){
               $http.post(baseURL + endpoint, $scope.formData)
               .then(function(response) {

                  if(response.data.status == "success"){
                     alert(response.data.message);
                     location.reload();
                  }
               })
               .catch(function(error) {
                  console.error('Error updating data:', error);
               });
            }
            else{
               $scope.error_msg="Please enter same values";
            }


  }
  else
  {

         $scope.error_msg="Please enter amount values";


  }  








            

      } else {

         $scope.error_msg='Form is invalid. Please fill required field.';

       

      }

  }
    else
    {
               $scope.error_msg='Form is invalid. Please fill Date.';
    }



      setTimeout(function() {
  $scope.$apply(function() {
    $scope.error_msg = ''; // Clear the error message
  });
}, 3000); 

      };
      
   }]);

</script>

<?php include('footer.php'); ?>
</body>