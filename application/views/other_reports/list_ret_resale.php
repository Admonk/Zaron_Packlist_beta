<?php include "header.php"; ?>

<style>
  .trpoint {

    cursor: pointer;
    font-size: 10.5px;
  }
  .table th {
  font-weight: 500;
  font-size: larger;
  text-align: center;
}
  .trpoint:hover {
    background: antiquewhite;
  }

  .card-header {
    display: block;
    text-align: center;
  }

  .loading {
    text-align: center;
  }

  td a {
    color: black;
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


  .table>tbody {
    vertical-align: middle;
  }

  .bgcolorchange {
    background: #ededed;
  }
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

  <div id="layout-wrapper">
    <?php echo $top_nav; ?>











    <?php
    $formdate = $_GET["formdate"];
    // if($formdate == "") {
    //   $formdate = date('Y-m-d');
    // }
    $todate = $_GET["todate"];
    // if($todate == "") {
    //   $todate = date('Y-m-d');
    // }

    $customer_id = $_GET["customer_id"];
    if($customer_id == "") {
      $customer_id = 'All';
    }
    ?>




    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center mt-3 justify-content-between">
                <h4 class="mb-sm-0 font-size-18">



                  Customer Return to Sale Report

                </h4>

                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Customer Return to Sale Report</li>
                  </ol>
                </div>

              </div>
            </div>
          </div>
          <!-- end page title -->

          <div class="row">
            <div class="col-lg-12">
              <div class="card">


                <div class="card-body">


                  <div class="row">


                    <div class="col-lg-12">

                      <form>
                        <div class="row">

                          <div class="col">
                            <lable>From date</lable>


                            <input type="date" class="form-control"  id="from-date" value="<?php echo $formdate; ?>">



                          </div>
                          <div class="col">
                            <lable>To date</lable>
                            <input type="date" class="form-control"   id="to-date" value="<?php echo $todate; ?>">
                          </div>

                          <!-- <div class="col">
                            <lable>Customers </lable>



                            <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-model="customer" ng-keyup="completeCustomer()" placeholder="Search Customer Or Phone"  id="choices-single-default">
          


                          </div> -->
                          <div class="col" style="margin: 20px 0px;">

                            <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>

                            <button type="button" disabled class="btn btn-success waves-effect waves-light" id="exportdata">Export</button>


                            <?php
                            if ($accountshead != 0) {
                            ?>


                              <!-- <a href="<?php echo base_url(); ?>index.php/report/balancereport_base_ledger_delete_log?accountshead=<?php echo $accountshead; ?>" target="_blank">Delete Log</a> -->

                            <?php

                            } else {
                            ?>

                              <!-- <a href="<?php echo base_url(); ?>index.php/report/balancereport_base_ledger_delete_log" target="_blank">Delete Log</a> -->

                            <?php
                            }

                            ?>


                          </div>

                        </div>
                      </form>

















                      <br><br>





                      <div id="search-view" class="row">




<!-- 


                        <div class="col-xl-4 col-md-4" ng-init="fetchDatagetlegderGroup1()">
                          <div class="card card-h-100">
                            <div class="card-body">
                              <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                  <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Total Return Amount </h3>


                                  <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">
                                    <span>{{totals | indianCurrency}}</span>
                                  </h3>

                                </div>

                              </div>
                            </div> 
                          </div>
                        </div>  -->








                        <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                        <!--<i class="bx bx-search search-icon"></i>-->

                        <div class="table-responsive">
                          <table id="datatable" class="table table-striped table-bordered" style="position: relative;" width="100%" ng-init="fetchDatagetlegderGroup('<?php echo $accountshead; ?>','<?php echo $formdate; ?>','<?php echo date('Y-m-d'); ?>','All','All')">
                            <thead>
                              <tr style="position: sticky;top: 0;background: #dfdfdf;">

                                <th style="width:50px;">No</th>
                                <th style="width:100px;">Order Date</th>
                                <th style="width:100px;">Return Date</th>
                                <th style="width:100px;">Customer Name </th>
                                <th style="width:100px;">Order No </th>
                                <th style="width: 10%;">Bill Actual</th>
                                <th style="width: 10%;">Return Amount</th>
                                <th style="width: 10%;">Return Qty</th>
                                <th style="width:100px;">Payment Mode</th>

                                <th style="width:100px;">Remarks </th>

                              </tr>
                            </thead>

                            <tr class="setload">
                              <td colspan="12">
                                <loading></loading>
                              </td>
                            </tr>

                            <tbody ng-repeat="names in namesDataledgergroup | filter:query">


                              <tr class="trpoint {{names.addclass}}">

                                <td> {{$index + 1}}</td>
                                <td>{{names.create_date}}</td>
                                <td>{{names.return_date}}</td>
                                <td> {{names.company_name}} </td>
                                <td >{{names.order_no}}</td>
                                <td class="text-end">{{names.bill_actual | indianCurrency}}</td>
                                <td class="text-end">{{names.return_amount | indianCurrency}}</td>
                                <td class="text-end">{{names.return_qty }}</td>
                                <td> {{names.payment_mode}} </td>
                                <td> {{names.reason}} </td>
                            
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





























  <div class="modal fade" id="firstmodalcommisonparty" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Cash To Bank Payment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">






          <div class="form-group row">
            <label class="col-sm-12 col-form-label">Bank Account <span style="color:red;">*</span></label>

            <div class="col-sm-12">



              <select class="form-control" data-trigger name="party1" id="party1" placeholder="This is a search" ng-change="Getbankaccount1()" ng-model="getbank1">
                <option value="">Search Bank</option>

                <?php

                foreach ($bankaccount as $val) {
                ?>
                  <option value="<?php echo $val->id; ?>"><?php echo $val->bank_name; ?></option>

                <?php
                }

                ?>



              </select>


              <span ng-if="opening_balance1"><b>Current Balance : {{opening_balance1}}</b></span>
            </div>
          </div>




          <div class="form-group row">
            <label class="col-sm-12 col-form-label">Notes </label>

            <div class="col-sm-12">

              <input type="text" id="notes_r" class="form-control">


            </div>
          </div>


          <div class="form-group row">
            <label class="col-sm-12 col-form-label">Date <span style="color:red;">*</span></label>

            <div class="col-sm-12">

              <input type="date" value="<?php echo date('Y-m-d'); ?>" id="create_date" class="form-control">


            </div>
          </div>



          <div class="row" style="margin: 20px -9px;">


            <div class="col-md-12">
              <div class="form-group row">

                <div class="col-sm-12">

                  <button type="submit" class="btn btn-primary w-md" style="float: right;" ng-click="transfer()">Payment Transfer</button>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>







  <div class="modal fade" id="editdata" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Edit Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">



          <div class="form-group row">
            <label class="col-sm-12 col-form-label">{{lable}} <span style="color:red;">*</span></label>

            <div class="col-sm-12">

              <input type="text" class="form-control" ng-keyup="completeCustomer1()" id="customerdata" placeholder="Search {{lable}}" id="customerdata">



            </div>
          </div>






          <input type="hidden" id="customer_id" name="customer_id" class="form-control">
          <input type="hidden" id="party_type_data" name="party_type_data" class="form-control">
          <input type="hidden" ng-model="hidden_id">



          <div class="form-group row" id="credit_data">
            <label class="col-sm-12 col-form-label">Credit Amount </label>

            <div class="col-sm-12">

              <input type="text" id="credit" name="credit" ng-model="credit" class="form-control">


            </div>
          </div>


          <div class="form-group row" id="debit_data">
            <label class="col-sm-12 col-form-label">Debit Amount </label>

            <div class="col-sm-12">

              <input type="text" id="debit" name="debit" ng-model="debit" class="form-control">


            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-12 col-form-label">Payment Mode <span style="color:red;">*</span></label>

            <div class="col-sm-12">


              <select class="form-control" name="payment_mode_payoff" id="payment_mode_payoff">

                <option value="">Select Mode</option>
                <option value="Cash">Cash</option>
                <option value="Cheque">Cheque</option>
                <option value="NEFT/RTGS">NEFT/RTGS</option>
                <option value="Petty Cash">Petty Cash</option>


              </select>


            </div>
          </div>



          <div class="form-group row" id="bankaccountshow" style="display:none;">
            <label class="col-sm-12 col-form-label" id="base_title">Bank Account </label>

            <div class="col-sm-12">


              <select class="form-control" name="bankaccount" ng-change="Getbankaccount()" ng-model="getbank" id="bankaccount">


              </select>
              <span ng-if="account_no"> <b> Available Balance : {{current_amount | number}}</b></span>


            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-12 col-form-label">Notes</label>

            <div class="col-sm-12">

              <input type="text" id="name" ng-model="name" class="form-control">


            </div>
          </div>




          <div class="form-group row">
            <label class="col-sm-12 col-form-label">Payment Date</label>

            <div class="col-sm-12">

              <input type="date" id="date" ng-model="create_date" class="form-control">


            </div>
          </div>



          <div class="row" style="margin: 20px -9px;">


            <div class="col-md-12">
              <div class="form-group row">

                <div class="col-sm-12">

                  <button type="submit" class="btn btn-primary w-md" style="float: right;" ng-click="bankstatementupdate()">Update</button>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>






  <script>
    $(document).ready(function() {
      $("#exportdatadata").hide();



      $('#from-date').blur(function() {


        var date = $(this).val();

        var valdationdate = '<?php echo date("Y-07-01"); ?>';

        if (valdationdate > date) {
          $('#from-date').val(valdationdate);
        }

      });

      $('#to-date').blur(function() {



        var date = $(this).val();

        var valdationdate = '<?php echo date("Y-07-01"); ?>';
        var valdationdate1 = '<?php echo date("Y-m-d"); ?>';
        // if (valdationdate > date) {
        //   $('#to-date').val(valdationdate1);
        // }

      });




      $("#checkAll").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
      });

      $('#payment_mode_payoff').on('change', function() {

        var val = $(this).val();

        if (val == 'NEFT/RTGS' || val == 'Cheque') {


          $('#base_title').html('Bank Account');
          var data = '<option value="0">Select Bank</option> <?php foreach ($bankaccount as $val) {
                                                                if ($val->id != 25 && $val->id != 24) { ?> <option value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php }
                                                                                                                                                                                                                    } ?>';
          $('#bankaccount').html(data);
          $('#res_no').show();
          $('#bankaccountshow').show();
        }
        if (val == 'Cash') {

          $('#base_title').html('Cash Account');
          var data = '<?php foreach ($bankaccount as $val) {
                        if ($val->id == 25) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php }
                                                                                                                                                                    } ?>';
          $('#bankaccount').html(data);
          $('#res_no').show();
          $('#bankaccountshow').show();

        }
        if (val == 'Petty Cash') {

          $('#base_title').html('Petty Cash Account');
          var data = '<?php foreach ($bankaccount as $val) {
                        if ($val->id == 24) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php }
                                                                                                                                                                    } ?>';
          $('#bankaccount').html(data);
          $('#reference_no').show();
          $('#bankaccountshow').show();



        }

      });





      $('#choices-single-default').on('change', function() {




        $("#exportdatadata").show();


      });

      $('#exportdata').on('click', function() {


        var id = $('#choices-single-default').val();
        var fromdate = $('#from-date').val();
        var fromto = $('#to-date').val();
        var payment_status = '<?php echo $_GET['type']; ?>';
        var party_type = $('#party_type').val();

        var id = '<?php echo $accountshead; ?>';

        url = '<?php echo base_url() ?>index.php/report/fetch_data_get_ledger_view_export_all_base_by?limit=10&deleteid=0&accountshead=' + id + '&formdate=' + fromdate + '&todate=' + fromto + '&party_type=' + party_type + '&payment_status=' + payment_status;


        location = url;

      });


    });
  </script>
  <script>
    var app = angular.module('crudApp', ['datatables']);


    app.filter('indianCurrency', function() {
      return function(input) {
        if (isNaN(input)) return input;
        var formattedValue = parseFloat(input);
        // console.log(input.toLocaleString('en-IN').toFixed(2));
        var decimal = formattedValue.toLocaleString('en-IN', {
          minimumFractionDigits: 2,
          maximumFractionDigits: 2
        });

        return decimal

      };
    });


    app.directive('loading', function() {
      return {
        restrict: 'E',
        replace: true,
        template: '<div class="loading"><img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" width="20" height="20" /> LOADING...</div>',
        link: function(scope, element, attr) {
          scope.$watch('loading', function(val) {
            if (val)
              $(element).show();
            else
              $(element).hide();
          });
        }
      }
    })





    app.filter('number', function() {
      return function(input) {
        if (!isNaN(input)) {
          if (input != 0 && input != null) {
            if (isNaN(input)) return input;
            var formattedValue = parseFloat(input);
            // console.log(input.toLocaleString('en-IN').toFixed(2));
            var decimal = formattedValue.toLocaleString('en-IN', {
              minimumFractionDigits: 2,
              maximumFractionDigits: 2
            });

            return decimal
          } else {
            return '0';
          }


        }
      }
    });
    app.controller('crudController', function($scope, $http) {

      $scope.success = false;
      $scope.error = false;


      $scope.fetchSingleData = function(id) {
        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/customer/fetch_single_data",
          data: {
            'id': id,
            'action': 'fetch_single_data',
            'tablename': 'customers'
          }
        }).success(function(data) {

          $scope.name = data.company_name;
          $scope.phone = data.phone;
          $scope.email = data.email;
          $scope.gst = data.gst;

          $scope.fulladdress = data.fulladdress;



        });
      };



      $scope.search = function() {

        var userid = $('#choices-single-default').val();
        var fromdate = $('#from-date').val();
        var fromto = $('#to-date').val();
        var payment_status = '<?php echo $_GET['type']; ?>';
        var party_type = $('#party_type').val();

        $('#search-view').show();
        $('#exportdatadata').show();
        $('#dateview').text(fromdate);
        $scope.fetchSingleData(userid);

        $scope.fetchDatagetlegderGroup(userid, fromdate, fromto, payment_status, party_type);
   


      };

 

 
 



      $scope.fetchDatagetlegderGroup = function(id, fromdate, fromto, payment_status, party_type) {


        $scope.loading = true;


        var payment_status = '<?php echo $_GET['type']; ?>';

        var customer_id = "<?=$customer_id?>";
        var id = '<?php echo $accountshead; ?>';

        $http.get('<?php echo base_url() ?>index.php/other_reports/fetch_data_get_ret_resale?limit=10&deleteid=0&formdate=' + fromdate + '&todate=' + fromto + '&customer_id=' + customer_id).success(function(data) {


          $scope.query = {}
          $scope.queryBy = '$';

          $scope.loading = false;

          $scope.namesDataledgergroup = data['data'];
          $scope.totals = data['totals'];



         


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



<script type="text/javascript">
  $('#from-date').blur(function() {


    var date = $(this).val();

    var valdationdate = '<?php echo date("Y-07-01"); ?>';

    if (valdationdate > date) {
      $('#from-date').val(valdationdate);
    }

  });


  $('#to-date').blur(function() {


    var date = $(this).val();

    var valdationdate = '<?php echo date("Y-07-01"); ?>';

    if (valdationdate > date) {
      $('#to-date').val(valdationdate);
    }

  });
</script>