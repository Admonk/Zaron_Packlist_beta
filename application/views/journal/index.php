<?php include "header.php"; ?>
<!DOCTYPE html>
<html ng-app="journal">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Voucher Entry</title>
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
                        <h4 class="mb-sm-0 font-size-18">Voucher Entry</h4>
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
                        <div class="col-md-4">
                           <label for="vch_type">Voucher Type <span style="color: red;">*</span></label>
                           <select id="vch_type" name="selectedVoucherType" ng-model="selectedVoucherType" ng-options="value as label for (value, label) in voucherTypes" ng-change="onVoucherTypeChange()" class="form-control " required>
                              <option value="">Select Voucher Type</option>
                           </select>
                           <span ng-show="myForm.selectedVoucherType.$dirty && myForm.selectedVoucherType.$error.required" style="color:red;"><b>Voucher type is required.</b></span>
                        </div>
                        <div class="col-md-4">
                           <label for="vch_no"> Voucher Number </label>
                           <div>
                           <span style="margin-left: -12px">{{voucher_base }}</span>
                           <input id="vch_no" type="number" name="voucherNumber"ng-model="voucherNumber" class="form-control no-spinner" readonly>

                           </div>
                           <!-- <span ng-show="myForm.voucherNumber.$dirty && myForm.voucherNumber.$error.required" style="color:red;"><b>voucher number is required.</b></span> -->
                        </div>
                        <div class="col-md-4">
                           <label for="vch_date">Date</label>
                           <div class="input-group date">
                              <input id="vch_date" type="text" ng-model="selectedDateModel" class="form-control" ng-model-options="{ getterSetter: true }">
                              <div class="row justify-content-end">
                                 <div class="col-md-auto">
                                    <div id="dayOfWeek">{{ dayOfWeek }}</div>
                                 </div>
                              </div>
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
                              <div class="input-group" style="width: 400px; height: 35px;">             
                              <input type="text" class=" select2customername form-control border-bottom-input ng-pristine ng-valid ng-touched"                               
                                 
                              uib-typeahead="item for item in completeCustomer(row,index)" name="row.party"
                                    ng-model="row.party" placeholder="Search Names" id="party_{{$index}}" ng-blur="handleSelectedBalance(row)" ng-required="VoucherTypeStatus !== 'contra'">
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

                             

                              <td style="width: 100px;">
                                 <div class="input-group">
                                    <input type="number" ng-model="row.debit" ng-enter="addRow()" class="form-control no-spinner" placeholder="₹" ng-disabled="row.credit !== null && row.credit !== '' || row.selectedOption === 'cr'">
                                 </div>
                              </td>
                              <td style="width: 100px;">
                                 <div class="input-group">
                                    <input type="number" ng-model="row.credit" ng-enter="addRow()" class="form-control no-spinner" placeholder="₹" ng-disabled="row.debit !== null && row.debit !== '' || row.selectedOption === 'dr'">
                                    <span class="btn btn-outline-danger" ng-if="$index > 0" ng-click="removeRow($index)">-</span>
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
                     <textarea ng-model="narration" cols="50" rows="5"></textarea>
                  </div>
                  
                  <div class="col-md-3">
                  </div>
                
                  <div class="col-md-3" style="width: 210px; margin-left:145px">
                  <hr>
                  <span style="margin-left: 30px;"><b>{{ getTotalDebit()  }}</b></span>
                  
                  <span style="margin-left: 50px;"><b>{{ getTotalCredit() }}</b></span>
                  <hr>
                  </div>
               </div>
               <div class="row align-items-start">
                  <div class="col-md-6">
                     <!-- <h6>Narration</h6>
                     <textarea ng-model="narration" cols="50" rows="5"></textarea> -->
                  </div>
                  <div class="col-md-6 text-md-right">
                     <div class="row justify-content-end">
                        <div class="col-md-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                           <!-- <input type="button" class="btn btn-primary" value="Save"> -->
                        </div>
                     </div>
                  </div>
               </div>
            </form>   
            </div>
            
         </div>
         <!-- </div> -->
      </div>
      

<script>
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
      var c_voucher_no=1;
      var j_voucher_no=1;
      var p_voucher_no=1;
      var r_voucher_no=1;
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
      $scope.tableRows = [{
         selectedid: '',
         debit: null,
         credit: null
      }];
      $scope.voucherTypes = {
         'contra': 'Contra',
         'payment': 'Payment',
         'receipt': 'Receipt',
         'journal': 'Journal',
         // 'sales': 'Sales',
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
         }else if($scope.VoucherTypeStatus == 'payment'){
            $scope.voucherNumber = p_voucher_no;
            $scope.voucher_base = 'P';
            $scope.tableRows = [{
               selectedid: '',
               selectedOption: 'cr',
               debit: null,
               credit: null
            }];
               $scope.ledger_type_cus_status = false;
               $scope.ledger_type_bnk_status = true;
         }else if($scope.VoucherTypeStatus == 'receipt'){
            $scope.voucherNumber = r_voucher_no;
            $scope.voucher_base = 'R';
            $scope.tableRows = [{
               selectedid: '',
               selectedOption: 'dr',
               debit: null,
               credit: null
            }];
            $scope.ledger_type_cus_status = false;
            $scope.ledger_type_bnk_status = true;
        }
               
          });
    };

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

      //   console.log(party);
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
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


  $scope.handleSelectedBalance = function(div) {
             $http({
            method:"POST",
            url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
            data:{'id':div.party, 'action':'fetch_single_data','tablename':'customers','party_type':div.selectedType}
          }).success(function(data){
            $scope.opening_balance_status=true;
            // console.log(data)
               div.opening_balance = data.opening_balance;
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
         cr_val = parseInt(totalDebit);
         cr_dr_type = 'cr';
         }
      }
      else if($scope.VoucherTypeStatus == 'payment'){
         if(totalDebit == totalCredit){
            cr_dr_type = '';
         }else{
         dr_val = parseInt(totalCredit);
         cr_dr_type = 'dr';
         $scope.ledger_type_cus_status = true;
         $scope.ledger_type_bnk_status = false;
        
         }
      }
      else if($scope.VoucherTypeStatus == 'receipt'){
         if(totalDebit == totalCredit){
            cr_dr_type = '';
         }else{
         cr_val = parseInt(totalDebit);
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
         $scope.tableRows.splice(index, 1);
      };


      $scope.isDriverSelected = function(selectedid) {
         if (selectedid && $scope.selectedType === 'drivers') {
            const selectedCustomer = $scope.driverNames.find(driver => driver.id === selectedid);
            return !!selectedCustomer;
         }
         return false;
      };


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
         if (newDate) {
            $scope.updateDayOfWeek(newDate);
            return newDate;
         } else {
            return $scope.formatDate($scope.selectedDate);
         }
      };

      $scope.$watch('selectedDate', function(newDate) {
         $scope.updateDayOfWeek();
      });



      $('#vch_date').datepicker({
         format: 'dd-mm-yyyy',
         autoclose: true,
         todayHighlight: true,
         orientation: 'bottom'
      }).on('changeDate', function(e) {
         $scope.selectedDate = e.date;
         $scope.$apply();
      });
      var endpoint = '';
      $scope.saveData = function() {

         // console.log($scope.myForm)
         // event.preventDefault();
         $scope.formData = {
            voucherType: $scope.selectedVoucherType,
            voucher_base : $scope.VoucherTypeStatus,
            voucherNumber: $scope.voucherNumber,
            selectedDate: $scope.selectedDateModel(),
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
            endpoint = 'index.php/journal/save_data_cantra';
         }else{
            endpoint = 'index.php/journal/save_data?cr_type=' + cr_type + '&cr_party=' + cr_party;
         }

      //   console.log(cr_type)
      var totalDebit = $scope.getTotalDebit();
      var totalCredit  = $scope.getTotalCredit();
         
      if ($scope.myForm.$valid) {

         if(endpoint !== '' && totalCredit == totalDebit){
            
            $http.post(baseURL + endpoint, $scope.formData)
               .then(function(response) {
                  if(response.data.status == "success"){
                     alert(response.data.message);
                     location.reload();
                  }else{
                     alert("An error occurred while saving the data");
                  }
               })
               .catch(function(error) {
                  console.error('Error saving data:', error);
               });
   
            }else{
               $scope.error_msg="Please enter same values";
            }

      } else {

         $scope.error_msg='Form is invalid. Please fill required field.';

       

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