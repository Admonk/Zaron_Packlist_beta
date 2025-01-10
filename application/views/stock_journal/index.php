<?php include "header.php"; ?>
 

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

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="journal" ng-controller="JournalController">
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
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

   <style>
      td input[type="text"] {
         display: block;
         border: 0;
         top: 0px;
         outline: none;
         position: relative !important;
         left: 0;
         width: 96%;
         padding: 0px 7px;
         /* height: 100%; */
         height: 30px;
      }

      .navbar-light .navbar-nav .nav-link {
  color: rgba(0, 0, 0, 1);
}
.swal2-header {
  pointer-events: none;
}
      .form-control-dual {
         display: block !important;
         position: relative !important;
         width: 100%;
         padding: .47rem .75rem;
         font-size: 12px;
         font-weight: 400;
         line-height: 1.5;
         color: #495057;
         background-color: #fff;
         background-clip: padding-box;
         border: 1px solid #ced4da;
         -webkit-appearance: none;
         -moz-appearance: none;
         appearance: none;
         border-radius: .25rem;
         -webkit-transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
         transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
         transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
         transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out
      }

      .btn-link:hover {
         color: #166abe;
         text-decoration: none !important;
      }

      td {
         border: 2px solid #dfdfdf;
      }

      th {
         font-size: 13px;
         border: 2px solid #dfdfdf;
      }
   </style>


   <!-- <script src="<?php echo base_url(); ?>assets/js/journal/journal.js"></script> -->
   <div id="layout-wrapper" ng-init="getLatestStockNo()">
      <?= $top_nav; ?>
      <div class="main-content">
         <div class="page-content">
            <div class="container-fluid">
               <form name="myForm" ng-submit="saveData()" novalidate>
                  <div class="row">
                     <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                           <h4 class="mb-sm-0 font-size-18">Stock Journal</h4>
                           <span ng-show="error_msg">
                              <!-- <h5 style="color:red"><b>{{error_msg}}</b></h5> -->
                           </span>
                           <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item"><a href="<?= base_url('index.php/dashboard'); ?>">Dashboard</a></li>
                                 <li class="breadcrumb-item active"><?= $title; ?></li>
                              </ol>
                           </div>
                        </div>
                        <div class="row align-items-start">
                        <div class="col-md-2">
                              <label for="journal_no">Journal No</label>
                              <div class="input-group date " style="align-items: center;">
                              
                              SJ&nbsp;&nbsp;&nbsp;<input  id="journal_no" disabled type="text"  class="form-control" value="{{journalNo}}"  >

                              </div>
                           </div>
                           <div class="col-md-3">
                              <label for="vch_date">Date</label>
                              <div class="input-group date">

                                 <input id="vch_date" type="date" class="form-control" value="<?=date('Y-m-d')?>"  >

                              </div>
                           </div>

                          


                        </div>
                        <div class="row">
                           <!-- Left Table -->
                           <div class="col-md-6">
                              <!-- <h5>Debit</h5> -->
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th>Type</th>
                                       <th ng-show="select_type == '1'">Category</th>
                                       <th ng-show="select_type == '2'">Sub Category</th>
                                       <th>Product </th>
                                       <th>Quantity</th>
                                       <th>UOM</th>
                                       <th>Rate</th>
                                       <th>Coil Number</th>
                                       <th>Value (in INR)</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr ng-repeat="row in leftTableRows">

                                    <td>
                                       <select class="form-control" id="type_category_id_{{row.id}}" name="type_category_id" ng-change="onTypeCategoryChange(select_type)" ng-model="select_type">
                                          <option value=""> Select Type</option>
                                          <option value="1"> Categories</option>
                                          <option value="2"> Sub Categories</option>
                                       </select>
                                    </td>

                                       <td ng-show="select_type == '1'"> <select class="form-control" id="category_id_{{row.id}}" name="category_id" >

                                             <option value=""> Select Categories</option>

                                             <?php
                                             foreach ($Categories as $value) {

                                             ?>
                                                <option value="<?php echo $value->id; ?>"><?php echo $value->categories; ?></option>
                                             <?php

                                             }
                                             ?>



                                          </select></td>
                                          <td ng-show="select_type == '2'" > <select class="form-control" id="sub_category_id_{{row.id}}" name="sub_category_id" >

                                                   <option value=""> Select Sub Categories</option>

                                                   <?php
                                                   foreach ($Sub_Categories as $values) {

                                                   ?>
                                                      <option value="<?php echo $values->id; ?>"><?php echo $values->sub_categories; ?></option>
                                                   <?php

                                                   }
                                                   ?>



                                                   </select></td>
                                       <td> <input type="text" id="autocomplete_{{row.id}}" ng-keyup="completeProduct(row.id)" class="form-control rounded border autocomplete" placeholder="Product"></td>
                                       <td><input type="number" class="form-control-dual" ng-model="row.quantity" id="qty_{{row.id}}" ng-change="calculate_tot_value(row.quantity,'qty',row.id)" /></td>
                                       <td> <select   class="form-control" name="uom" ng-model="row.uom">
                                             <option disabled value="">Select</option>

                                            
                                             <?php
                                             foreach ($uom as $val) {

                                             ?>
                                                 <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                            
                                                <?php

                                                      }
                                                      ?>



                                          </select></td>
                                          <td><input type="text" class="form-control-dual" ng-model="row.rate"  id="rate_{{row.id}}" ng-change="calculate_tot_value(row.rate,'rate',row.id)" /></td>
                                       <td><input type="text" class="form-control-dual" ng-model="row.coilNumber" /></td>
                                       
                                       <td><input type="text" class="form-control-dual values-left"  id="value_{{row.id}}" ng-model="row.value" ng-change="getTotalDebitFun()" placeholder="₹" /></td>

                                       <td>
                                          <button type="button" class="btn btn-primary" ng-click="deleteLeftRow(row.id)">-</button>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                              <span class="btn btn-link btn-primary text-white" style="cursor:pointer;font-size:20px;float: right;" ng-click="addLeftRow()">+</span>
                           </div>
                           <!-- Right Table -->
                           <div class="col-md-6">
                              <!-- <h5>Credit</h5> -->
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th>Type</th>
                                       <th ng-show="select_type_r == '1'" >Category</th>
                                       <th ng-show="select_type_r == '2'" >Sub Category</th>
                                       <th>Product </th>
                                       <th>Quantity</th>
                                       <th>UOM</th>                                       
                                       <th>Rate</th>
                                       <th>Coil Number</th>
                                       <th>Value (in INR)</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr ng-repeat="row in rightTableRows">
                                       <td>
                                          <select class="form-control" id="type_category_id_r{{row.id}}" name="type_category_id" ng-change="onTypeCategoryChangeR(select_type_r)" ng-model="select_type_r">
                                             <option value=""> Select Type</option>
                                             <option value="1"> Categories</option>
                                             <option value="2"> Sub Categories</option>
                                          </select>
                                       </td>
                                       <td ng-show="select_type_r == '1'" > <select class="form-control" id="category_id_r{{row.id}}" name="category_id" >

                                             <option value=""> Select Categories</option>

                                             <?php
                                             foreach ($Categories as $value) {

                                             ?>
                                                <option value="<?php echo $value->id; ?>"><?php echo $value->categories; ?></option>
                                             <?php

                                             }
                                             ?>



                                          </select></td>

                                          <td ng-show="select_type_r == '2'" > <select class="form-control" id="sub_category_id_r{{row.id}}" name="sub_category_id_r" >

                                             <option value=""> Select Sub Categories</option>

                                             <?php
                                             foreach ($Sub_Categories as $values) {

                                             ?>
                                                <option value="<?php echo $values->id; ?>"><?php echo $values->sub_categories; ?></option>
                                             <?php

                                             }
                                             ?>



                                          </select></td>

                                       <td> <input type="text" id="autocomplete_r{{row.id}}" ng-keyup="completeProductR(row.id)" name="profile" class="form-control rounded border autocomplete" placeholder="Product"></td>
                                       <td><input type="number" class="form-control-dual" ng-model="row.quantity" id="qty_r{{row.id}}" ng-change="calculate_tot_value(row.quantity,'qty_r',row.id)" /></td>
                                       <td> <select   class="form-control" name="uom" ng-model="row.uom">

                                             <option disabled value="">Select </option>

                                             <?php
                                             foreach ($uom as $val) {

                                             ?>
                                                 <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                            
                                                <?php

                                                      }
                                                      ?>



                                          </select></td>
                                          <td><input type="text" class="form-control-dual" ng-model="row.rate" id="rate_r{{row.id}}" ng-change="calculate_tot_value(row.rate,'rate_r',row.id)" /></td>
                                       <td><input type="text" class="form-control-dual" ng-model="row.coilNumber" /></td>
                                       
                                       <td><input type="text" class="form-control-dual" id="value_r{{row.id}}" placeholder="₹" ng-model="row.value" ng-change="getTotalCreditFun()" /></td>
                                       <td>
                                          <button type="button" class="btn btn-primary" ng-click="deleteRightRow(row.id)">-</button>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>

                              <span class="btn btn-link btn-primary text-white" style="cursor:pointer;font-size:20px;float: right;" ng-click="addRightRow()">+</span>
                           </div>
                        </div>
                        <!-- Narration Field -->
                        <div class="row align-items-start">
                           <div class="col-md-6">
                              <h6>Narration</h6>
                              <textarea ng-model="narration" cols="50" rows="3"></textarea>
                           </div>
                           <!-- Total Debit and Credit -->
                           <div class="col-md-6 text-md-right">
                              <div class="row justify-content-end">
                                 <div class="col-md-auto">
                                    <hr>
                                    <span><b>{{ getTotalDebit }}</b></span>
                                    <span style="margin-left: 15px;"><b>{{ getTotalCredit }}</b></span>
                                    <hr>
                                 </div>
                              </div>
                              <!-- Submit Button -->
                              <div class="row justify-content-end">
                                 <div class="col-md-auto">
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>



   <script>

 
 
 

      var app = angular.module('journal', ['datatables', 'ui.bootstrap']);
      app.directive('loading', function() {
         return {
            restrict: 'E',
            replace: true,
            template: '<div class="loading"><img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" width="20" height="20" /> LOADING...</div>',
            link: function(scope, element, attr) {
               scope.$watch('loading', function(val) {
                  console.log(val)
                  if (val)
                     $(element).show();
                  else
                     $(element).hide();
               });
            }
         }
      })

      app.directive('ngEnter', function() {
         return function(scope, element, attrs) {
            element.bind("keydown keypress", function(event) {
               if (event.which === 13) {
                  scope.$apply(function() {
                     scope.$eval(attrs.ngEnter);
                  });

                  event.preventDefault();
               }
            });
         };
      });

      app.filter('number', function() {
         return function(input) {
            if (!isNaN(input)) {
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

      app.controller('JournalController', ['$scope', '$http', '$q', function($scope, $http, $q) {
         var baseURL = '<?php echo base_url(); ?>';
         $scope.journalNo = '';
         $scope.uom = 'Ton';
         $scope.addLeftRowNumber = 1;
         $scope.addRightRowNumber = 1;

         $scope.getLatestStockNo = function () {
            $http({
               method: "GET",
               url: "<?php echo base_url() ?>index.php/stock_journal/getLatestStockNo"
            }).success(function(data) {
               $scope.journalNo = data;
               
            });
         }

         $scope.completeProduct = function(id = 1) {
            let cateId = $('#category_id_' + id).val();
            let subcateId = $('#sub_category_id_' + id).val();
            let type = $('#type_category_id_' + id).val();
            $http({
               method: "POST",
               url: "<?php echo base_url() ?>index.php/stock_journal/fetchproduct_full_purchase_name",
               data: {
                  'action': 'fetch_single_data',
                  'cateid': cateId,
                  'subcateid': subcateId,
                  'type'  : type
               }
            }).success(function(data) {

               $("#autocomplete_" + id).autocomplete({
                  source: data
               });
            });
         };


         $scope.completeProductR = function(id = 1) {
            let cateId = $('#category_id_r' + id).val();
            let subcateId = $('#sub_category_id_r' + id).val();
            let type = $('#type_category_id_r' + id).val();
            $http({
               method: "POST",
               url: "<?php echo base_url() ?>index.php/stock_journal/fetchproduct_full_purchase_name",
               data: {
                  'action': 'fetch_single_data',
                  'cateid': cateId,
                  'subcateid': subcateId,
                  'type'  : type
               }
            }).success(function(data) {
               $("#autocomplete_r" + id).autocomplete({
                  source: data
               });
            });
         };
         $scope.leftTableRows = [{
            selectedid: '',
            product: '',
            productName: '',
            quantity: null,
             uom: '40',             
             rate: '',
            coilNumber: '',
            value: null,
            id: 1
         }];

         $scope.rightTableRows = [{
            selectedid: '',
            product: '',
            productName: '',
            quantity: null,
             uom: '40',
             rate: '',
            coilNumber: '',
            value: null,
            id: 1
         }];

       
         $scope.addLeftRow = function() {
            $scope.addLeftRowNumber = $scope.addLeftRowNumber + 1;

            var allInputsFilled = $scope.leftTableRows.every(function(row) {
               return (row.value || row.rate) && row.quantity && row.uom && row.coilNumber;
            });

            if (allInputsFilled) {
            $scope.leftTableRows.push({
               selectedid: '',
               product: '',
               productName: '',
               quantity: null,
                uom: '40',
                rate: '',
               coilNumber: '',
               value: null,
               id: $scope.addLeftRowNumber + 1
            });
         } else {
      Swal.fire({
        text: 'Please fill in all fields before adding a new row..',
        icon: 'error',
        confirmButtonText: 'Okay'
      });
        
    }

         };

         // Function to add a row to the right table
         $scope.addRightRow = function() {
            $scope.addRightRowNumber = $scope.addRightRowNumber + 1;

            var allInputsFilled = $scope.rightTableRows.every(function(row) {
               return (row.value || row.rate) && row.quantity && row.uom && row.coilNumber;
            });

            if (allInputsFilled) {

            $scope.rightTableRows.push({
               selectedid: '',
               product: '',
               productName: '',
               quantity: null,
                uom: '40',
                rate: '',
               coilNumber: '',
               value: null,
               id: $scope.addRightRowNumber + 1
            });

          

         } else {
            Swal.fire({
        text: 'Please fill in all fields before adding a new row..',
        icon: 'error',
        confirmButtonText: 'Okay'
      });
    }
         };

         $scope.toIndNum = function(input) {
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
         }
         $scope.getTotalDebit =  $scope.toIndNum(0);
         $scope.getTotalCredit = $scope.toIndNum(0);

         $scope.deleteLeftRow = function(id) {
            var index = -1;
            var comArr = eval($scope.leftTableRows);
            for (var i = 0; i < comArr.length; i++) {
               if (comArr[i].id === id) {
                     index = i;
                     break;
               }
            }
            if (index === -1) {
               alert("Something gone wrong");
            }
            $scope.leftTableRows.splice(index, 1);
            $scope.getTotalDebitFun();
         };

         $scope.deleteRightRow = function(id) {
            var index = -1;
            var comArr = eval($scope.rightTableRows);
            for (var i = 0; i < comArr.length; i++) {
               if (comArr[i].id === id) {
                     index = i;
                     break;
               }
            }
            if (index === -1) {
               alert("Something gone wrong");
            }
            $scope.rightTableRows.splice(index, 1);
            $scope.getTotalCreditFun();
         };

         // Function to calculate total debit
         $scope.getTotalDebitFun = function() {
            var total = 0;
            console.log("debit");
            angular.forEach($scope.leftTableRows, function(row) {
               if (row.value !== null && $scope.leftTableRows.find(r => r.id === row.id)) {
                     total += parseFloat(row.value);
                     var tot = parseFloat(row.value);
               } else {
                     var qty = parseFloat($('#qty_' + row.id).val());
                     var rate = parseFloat($('#rate_' + row.id).val());
                     var tot = parseFloat($('#value_' + row.id).val());
                     total += qty * rate;
               }
               var qty = parseFloat($('#qty_' + row.id).val());
               if(tot > 0 && qty > 0){
                  var rate_c = tot/qty;
                  $('#rate_' + row.id).val(rate_c);
               }
            });
            console.log("total" + total);
            $scope.getTotalDebit = $scope.toIndNum(total.toFixed(2));
         };


         // Function to calculate total credit
         $scope.getTotalCreditFun = function() {
            var total = 0;
            console.log("credit");
            angular.forEach($scope.rightTableRows, function(row) {
               if (row.value !== null && $scope.rightTableRows.find(r => r.id === row.id)) {
                     total += parseFloat(row.value);
                     var tot = parseFloat(row.value);
               } else {
                     var qty = parseFloat($('#qty_r' + row.id).val());
                     var rate = parseFloat($('#rate_r' + row.id).val());
                     var tot = parseFloat($('#value_r' + row.id).val());
                     total += qty * rate;
               }
               
               var qty = parseFloat($('#qty_r' + row.id).val());
               if(tot > 0 && qty > 0){
                  var rate_r = tot/qty;
                  $('#rate_r' + row.id).val(rate_r);
               }
            });
            console.log("total" + total);
            $scope.getTotalCredit = $scope.toIndNum(total.toFixed(2));
         };

         $scope.selectedType = ''; // Declare a variable to store the selected type
         $scope.selectedType_r = ''; // Declare a variable to store the selected type

         // Method to handle the change event of type_category_id
         $scope.onTypeCategoryChange = function(selectedValue) {
            $scope.select_type = selectedValue;
         };

         $scope.onTypeCategoryChangeR = function(selectedValueR) {
            $scope.select_type_r = selectedValueR;
         };

         $scope.calculate_tot_value = function(value,name,id) {
            

            if(name == 'qty_r' || name == 'rate_r'){
               console.log("if --> id-->"+id+" value--> "+value+" name --> "+name);
               var qty = $('#qty_r'+id).val();
               var rate = $('#rate_r'+id).val();

               var val = qty*rate;
               $('#value_r'+id).val(val);
               $scope.getTotalCreditFun();
            }else{
               console.log(" else ---> id-->"+id+" value--> "+value+" name --> "+name);
               var qty = $('#qty_'+id).val();
               var rate = $('#rate_'+id).val();

               var val = qty*rate;
               $('#value_'+id).val(val);
               $scope.getTotalDebitFun();
            
            }
            
            
         };


         // Function to submit the form
         $scope.saveData = function() {
            console.log("$scope.narration",$scope.narration);
            if($scope.getTotalDebit == 0 && $scope.getTotalCredit == 0){

               Swal.fire({
               text: 'Please Fill Details',
               icon: 'error',
               confirmButtonText: 'Okay'
               });
               
            }else if($scope.getTotalDebit == $scope.getTotalCredit){

               Swal.fire({
               text: 'Data submitted Successfully',
               icon: 'success',
               confirmButtonText: 'Okay'
               });

               angular.forEach($scope.leftTableRows, function(row) {
                  if ($('#value_'+row.id).val() !== null) {
                     let prodId = $('#autocomplete_'+row.id).val().split('-')[0];
                     let catId = $('#category_id_'+row.id).val();
                     let subcatId = $('#sub_category_id_'+row.id).val();
                     let type = $('#type_category_id_'+row.id).val();
                     let qty = row.quantity;
                     let value = $('#value_'+row.id).val();
                     let coilNumber = row.coilNumber;
                     let rate = $('#rate_'+row.id).val();

                     $http({
                        method: "POST",
                        url: "<?php echo base_url() ?>index.php/stock_journal/stock_insert",
                        data: {
                           'action': 'debit',
                           'catId' : catId,
                           'subcatId' : subcatId,
                           'type' : type,
                           'prodId': prodId,
                           'qty' : qty,
                           'value': value,
                           'date' : $('#vch_date').val(),
                           'journal_no' : $scope.journalNo,
                           'coil_no' : coilNumber,                           
                           'rate' : rate,
                           'narration' : $scope.narration
                        }
                     }).success(function(data) {
         
                              
                     })

                  }

               });
               angular.forEach($scope.rightTableRows, function(row) {
                  if ($('#value_r'+row.id).val() !== null) {
                     let prodId = $('#autocomplete_r'+row.id).val().split('-')[0];
                     let catId = $('#category_id_r'+row.id).val();
                     let subcatId = $('#sub_category_id_r'+row.id).val();
                     let type = $('#type_category_id_r'+row.id).val();
                     let qty = row.quantity;
                     let value = $('#value_r'+row.id).val();;
                     let coilNumber = row.coilNumber;                     
                     let rate = row.rate;


                     $http({
                        method: "POST",
                        url: "<?php echo base_url() ?>index.php/stock_journal/stock_insert",
                        data: {
                           'action': 'credit',
                           'catId' : catId,
                           'subcatId' : subcatId,
                           'type' : type,
                           'prodId': prodId,
                           'qty' : qty,
                           'value': value,
                           'date' : $('#vch_date').val(),
                           'journal_no' : $scope.journalNo,
                           'coil_no' : coilNumber,
                           'rate' : rate,
                           'narration' : $scope.narration
                        }
                     }).success(function(data) {
         
                              
                     })

                  }

               });

               setTimeout(() => {
                  location.reload();
               }, 2000);

            }else{

               Swal.fire({
               text: 'Please ensure Same Values',
               icon: 'error',
               confirmButtonText: 'Okay'
               });

            }
         };

        
      }]);
   </script>

   <?php include('footer.php'); ?>
</body>