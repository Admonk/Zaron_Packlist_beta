<?php include "header.php"; ?>

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

  td {
    display: table-cell;
    border: 1px solid #e0e0e0;
    padding: 0px 4.5px;
    line-height: 2.428571;
    margin-left: 0px;
    vertical-align: middle;
    font-size: 15px;
    /* text-align: center; */
    /* height: 50px; */
  }


  .loading {
    text-align: center;
  }


  .filter-multi-select .dropdown-item .custom-checkbox:checked~.custom-control-label::after {
    background-color: #ff5e14 !important;
  }

  .filter-multi-select>.viewbar>.selected-items>.item {
    background-color: cadetblue;
  }

  .placeholder {
    /* display: inline-block; */
    /* min-height: 1em; */
    /* vertical-align: middle; */
    /* cursor: wait; */
    background-color: #fff !important;
    opacity: .5;
    cursor: pointer !important;
  }

  th {
    color: #000;
    height: 50px;
    font-weight: 500;
    font-size: 14px;
    background-color: #f2f2f2;
    text-align: center;
    /* border: 1px solid #ffffff; */
    /* backdrop-filter: blur(3px) brightness(0.5); */
    /* width: 80px; */
    /* backdrop-filter: blur(2px) brightness(1); */
    vertical-align: middle;
  }

  th.totals {
    display: table-cell;
    border: 1px solid #e0e0e0;
    padding: 0px 4.5px;
    line-height: 2;
    margin-left: 0px;
    vertical-align: middle;
    font-size: 11px;
    text-align: center;
    /* height: 50px;*/
  }

  .choices__list--dropdown {
    /* visibility: hidden; */
    z-index: 5 !important;
  }

  td input[type="text"] {
    position: inherit !important;
    text-align: right !important;
    border: 1px solid !important;
    /* width: 100%; */
    left: 0;
    height: 100%;
    float: right;
  }

  th.popup {
    font-size: 12px !important;
  }

  body::-webkit-scrollbar,
  div::-webkit-scrollbar {
    width: 0.2em;
    height: 1.4em !important;
  }

  thead tr:nth-child(2) th {
    background-color: lightgray;
    color: black;
  }

  .table-responsive {
    max-height: 680px;
    overflow-y: scroll !important;
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
              <div class="page-title-box d-sm-flex align-items-center mt-3 justify-content-between">
                <h4 class="mb-sm-0 font-size-18">
                  SMS Delivery Report
                </h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">SMS Delivery Report</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <form>
            <div class="row">
<div class="col" > <!--data-trigger -->
                              <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                                                            
                                                            
                                                          <?php
                                                                 if($this->session->userdata['logged_in']['access']!='12')
                                                                 {
                                                                     
                                                                     ?>
                                                                      <option value="ALL">All Sales Team</option>
                                                                     <?php
                                                                     
                                                                 }
                                                            ?>
                                                            
                                                            <?php
                                                            
                                                            foreach($customers as $val)
                                                            {
                                                                
                                                                 if($val->status==1)
                                                                {
                                                                    
                                                                
                                                                         if($this->session->userdata['logged_in']['access']=='12')
                                                                         {
                                                                             if($this->session->userdata['logged_in']['userid']==$val->id)
                                                                             {
                                                                                
                                                                             ?>
                                                                             
                                                                             <option   value="<?php echo $val->id; ?>" seletced><?php echo $val->name; ?></option>
                                                                      
                                                                             <?php 
                                                                            
                                                                             }
                                                                             
                                                                         }
                                                                         else
                                                                         {
                                                                             ?>
                                                                             
                                                                             <option <?= $val->id == $sales_team_id ? 'selected' : '' ?>  value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                                  
                                                                             <?php
                                                                         }
                                                                         
                                                                 
                                                                }
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                            </div>
                            
                            <div class="col">
                              <select class="form-control" id="sales_group"  >
                                                            <option value="ALL">All Sales Group</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($sales_group as $vals)
                                                            {
                                                                ?>
                                                                 <option <?= $vals->id == $sales_group_id ? 'selected' : '' ?> value="<?php echo $vals->id; ?>"><?php echo $vals->name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                         </div> 
                            
              <div class="col">
                <lable>From date</lable>


                <input type="date" class="form-control"  id="from-date" value="<?php echo date('Y-m-d'); ?>">



              </div>
              <div class="col">
                <lable>To date</lable>
                <input type="date" class="form-control"  id="to-date" value="<?php echo date('Y-m-d'); ?>">
              </div>

              <div class="col" style="margin: 20px 0px;">

                <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>

                <button type="button" class="btn btn-success waves-effect waves-light"   id="exportdata">Export</button>


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
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="table-responsive">
                      <table id="datatable" class="table table-striped table-bordered" style="position: relative;" width="100%" ng-init="fetchDatagetlegderGroup()">
                        <thead>
                          <tr style="position: sticky;top: 0;background: #dfdfdf;text-align:center;font-weight:bold;">
                          </tr>
                        </thead>
                        <tbody>
                          <tr ng-repeat="row in rows">
                            <td ng-repeat="cell in row track by $index" ng-if="$index < 10 && row[1] != null" >
                              {{ cell }}
                            </td>
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
  </div>

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

      $('#exportdata').on('click', function() {
        $scope.loading = true;

        let formdObj = new Date($('#from-date').val());
        let todObj = new Date($('#to-date').val());
        var fromdate = formdObj.toLocaleDateString('en-GB', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/\//g, '-') + ' 12:00 am';
        var fromto =  todObj.toLocaleDateString('en-GB', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/\//g, '-')+ ' 11:59 pm';

         var cateid= $('#choices-single-default').val();
      var sales_group= $('#sales_group').val();

        url = '<?php echo base_url() ?>index.php/other_reports/smsApiReport?limit=10&deleteid=0&formdate=' + fromdate + '&todate=' + fromto +'&sale_group=' + sales_group +'&id='+cateid+'&export=true';
        window.location.href = url;
      });




      $scope.search = function() {
        var userid = $('#choices-single-default').val();
        var fromdate = $('#from-date').val();
        var fromto = $('#to-date').val();
        var payment_status = '<?php echo $_GET['type']; ?>';
        var party_type = $('#party_type').val();
        $('#search-view').show();
        $('#exportdatadata').show();
        $('#dateview').text(fromdate);
        $scope.fetchDatagetlegderGroup();
      };

      $scope.fetchDatagetlegderGroup = function() {
        $scope.loading = true;

        let formdObj = new Date($('#from-date').val());
        let todObj = new Date($('#to-date').val());
        var fromdate = formdObj.toLocaleDateString('en-GB', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/\//g, '-') + ' 12:00 am';
        var fromto =  todObj.toLocaleDateString('en-GB', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/\//g, '-')+ ' 11:59 pm';

         var cateid= $('#choices-single-default').val();
      var sales_group= $('#sales_group').val();


        $http.get('<?php echo base_url() ?>index.php/other_reports/smsApiReport?limit=10&deleteid=0&formdate=' + fromdate + '&todate=' + fromto +'&sale_group=' + sales_group +'&id='+cateid).success(function(data) {
          $scope.query = {}
          $scope.queryBy = '$';
          $scope.loading = false;
          $('thead tr').empty();
          $('thead tr').append($('<td>').text('S.no'))
          data[3].forEach((el, i) => {
            if (i === 4) {
              $('thead tr').append($('<td style="width:20%;">').text('Delivered'));
            }else 

             if (i === 3) {
            $('thead tr').append($('<td style="width:20%;">').text('Requset Sent'))

             } else
             if (i === 9) {
            $('thead tr').append($('<td style="width:35%;">').text(el))

             }else{
            $('thead tr').append($('<td>').text(el))

             }
          })

          var clippedArray = data.slice(4);
          var index = 1;
          $scope.rows = clippedArray;
          $scope.rows.map((el, index) => {
            el.splice(0, 0, index + 1);
            let number;
            let nameFromDB;

            if (el[1] != null) {
              // console.log(el);
              el.map((el2, i) => {
                if (i === 3) {
                  number = el2;
                }
               

               

                if (i === 9) {
                  el[9] =  (el[9] || '') + (el[10] || '') +  (el[11] || '');
                }
                return el2;
              })
              index++;
            return el;
            } 
          })


          //  $scope.rows.map((el, index) => {
          //   if (el[1] != null) {
          //     // console.log(el);
          //     el.map((el2, i) => {
          //       if (i === 8) {
          //         el[8] =  (el[8] || '') + (el[9] || '') +  (el[10] || '');
          //       }
          //       return el2;
          //     })
          //   return el;
          //   } 
          // })


          console.log(" $scope.rows", $scope.rows);
          // $scope.rows = clippedArray;
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

 