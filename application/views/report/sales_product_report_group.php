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

  .chip {
    background-color: #007acc;
    color: #fff;
    border-radius: 20px;
    padding: 4px 8px;
    margin: 2px;
    display: inline-flex;
    align-items: center;
    cursor: pointer;
  }

  .chip-text {
    margin-right: 4px;
  }

  td {
    display: table-cell;
    border: 1px solid #e0e0e0;
    padding: 0px 4.5px;
    line-height: 2.428571;
    margin-left: 0px;
    vertical-align: middle;
    font-size: 12px;
    /* text-align: center; */
    /* height: 50px; */
  }

  .ui-autocomplete {
    max-height: 200px;
    overflow-y: auto;
    overflow-x: hidden;
  }

  .autocomplete-item {
    display: flex;
    align-items: center;
  }

  .checkbox {
    margin-right: 10px;
  }

  .loading {
    text-align: center;
  }




  th {
    color: #000;
    height: 50px;
    font-weight: 500;
    font-size: 12px;
    background-color: #f2f2f2;
    text-align: center;
    /* border: 1px solid #ffffff; */
    /* backdrop-filter: blur(3px) brightness(0.5); */
    width: 80px;
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

  .select2-container--default .select2-results__option--selected {
    background-color: #fb6226 !important;
    color: white !important;
  }

  .select2-container--default .select2-results__option[aria-selected=true]:hover {
    background-color: #cecece !important;
    color: #fff;
  }

  .select2-results__option {
    margin: 4px 0px !important;
  }

  .dt-responsive {
    max-height: 800px;
    overflow: scroll;
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
                <h4 class="mb-sm-0 font-size-18">Sales Product Base Report</h4>

                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Sales Product Base Report !</li>
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
                      <p class="mb-sm-0 font-size-18">Search</p>

                      <form id="searchForm">
                        <div class="row">
                          <div class="col-md-3">
                            <!--data-trigger -->
                            <select class="form-control categories" name="categoryType[]" multiple="multiple" id="categoryType">
                              <option selected value="ALL">All Category</option>

                              <?php

                              function sortbyCat($a, $b)
                              {
                                return strcmp($a->categories, $b->categories);
                              }
                              usort($categories, 'sortbyCat');
                              foreach ($categories as $val) {
                                if ($val->id != 1) {
                              ?>
                                  <option value="<?php echo $val->id; ?>" data-id="<?php echo $value->id; ?>">
                                    <?php echo $val->categories; ?></option>

                              <?php
                                }
                              }

                              ?>



                            </select>

                          </div>
                          <!-- <div class="col-md-2" >
                              <select class="form-control"  name="choices-single-default"  id="choices-single-default-1"  ng-init="productlist(0)">
                                               <option value="ALL">All Products</option>
                                               <option ng-repeat="namesp in productlistdata" value="{{ namesp.id }}"> {{ namesp.product_name }} </option>
                                                  
                             </select>
                            </div>

                           -->
                        </div>
                        <div class="row">



                          <div class="col-md-4">
                            <div class="form-group row">
                              <!-- <label class="col-sm-12 col-form-label">Start date</label> -->
                              <div class="col-sm-12" style="margin-top: 35px;">
                                <input type="text" id="autocomplete" value="All" ng-keyup="completeProduct()" class="form-control" placeholder="Product Name">
                              </div>
                              <div id="selected-items"></div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group row">
                              <!-- <label class="col-sm-12 col-form-label">Start date</label> -->
                              <div class="col-sm-12" style="margin-top: 35px;">
                                <input type="date" class="form-control" id="from-date" min="<?php echo date('2023-10-01'); ?>" value="<?php echo date('Y-m-d'); ?>">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group row">
                              <!-- <label class="col-sm-12 col-form-label">End date</label> -->
                              <div class="col-sm-12" style="margin-top: 35px;">
                                <input type="date" class="form-control" id="to-date" min="<?php echo date('2023-10-01'); ?>" value="<?php echo date('Y-m-d'); ?>">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label">UOM</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="uom" id="uom">
                                  <option value="" selected>All</option>
                                  <?php
                                  foreach ($uom as $value) {
                                  ?>
                                    <option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label">Category type</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="category_type" id="category_type">
                                  <option value="">All </option>
                                  <?php
                                  foreach ($categorie_type_options as $val) {


                                  ?>
                                    <option value="<?php echo $val;  ?>"><?php echo $val;  ?></option>
                                  <?php

                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label">Material type</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="material_type" id="material_type">
                                  <option value="">All </option>
                                  <?php
                                  function sortByOption($a, $b)
                                  {
                                    return strcmp($a['option'], $b['option']);
                                  }

                                  $matTypes = $material_type->result_array();
                                  usort($matTypes, 'sortByOption');

                                  $uniqueMatTypes = [];
                                  $seenOptions = [];

                                  foreach ($matTypes as $type) {
                                    if (!in_array($type['option'], $seenOptions)) {
                                      $uniqueMatTypes[] = $type;
                                      $seenOptions[] = $type['option'];
                                    }
                                  }

                                  foreach ($uniqueMatTypes as $row) {
                                    if ($row['option'] !== '') {
                                  ?>
                                      <option value="<?php echo $row['option']; ?>"><?php echo $row['option']; ?></option>
                                  <?php
                                    }
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label">Color</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="color" id="color">
                                  <option value="">All </option>
                                  <?php

                                  function sortByName($a, $b)
                                  {
                                    return strcmp($a->name, $b->name);
                                  }
                                  usort($color, 'sortByName');


                                  foreach ($color as $value) {

                                  ?>
                                    <option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                                  <?php

                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>


                          <div class="col-md-2">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label">Thickness</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="thickness" id="thickness">
                                  <option value="">All </option>
                                  <?php

                                  usort($thickness, 'sortByName');


                                  foreach ($thickness as $value) {

                                  ?>
                                    <option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                                  <?php

                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label">Coating mass</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="gsm" id="gsm">
                                  <option value="">All </option>
                                  <?php
                                  foreach ($gsm as $value) {

                                  ?>
                                    <option value="<?= preg_replace("/[^0-9]/", "", $value->name) ?>"><?php echo $value->name; ?></option>
                                  <?php

                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label">Yield strength</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="ys" id="ys">
                                  <option value="">All </option>
                                  <?php
                                  foreach ($ys as $value) {

                                  ?>
                                    <option value="<?php echo str_replace("YS ", '', str_replace("MPA", '', $value->name)); ?>"><?php echo $value->name; ?></option>
                                  <?php

                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label">Brand</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="brand" id="brand">
                                  <option value="">All </option>
                                  <?php

                                  function sortByCategories($a, $b)
                                  {
                                    return strcmp($a->categories, $b->categories);
                                  }
                                  usort($brand, 'sortByCategories');

                                  foreach ($brand as $value) {

                                  ?>
                                    <option value="<?php echo $value->categories; ?>"><?php echo $value->categories; ?>
                                    </option>
                                  <?php

                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <!-- <div class="col-md-2">
                            <div class="form-group row">
                              <div class="col-sm-12" style="margin-top: 35px;">
                                <select class="form-control" id="payment_status">
                                  <option value="ALL">All</option>
                                  <option value="3">Approved </option>
                                  <option value="4">Delivered </option>
                                  <option value="5">Reconciliation </option>
                                </select>
                              </div>
                            </div>
                          </div> -->
                          <div class="col-md-2">
                            <div class="form-group row">
                              <div class="col-sm-12" style="margin-top: 35px;">
                                <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                                <button type="button" class="btn btn-success waves-effect waves-light"   id="exportdata">Export</button>

                              </div>
                            </div>
                          </div>

                        </div>
                      </form>
                      <div id="search-view">


                        <div class="card-header" ng-init="fetchSingleData(0)">

                          <h4 class="card-title">Sales Product Base Report {{ formdate }} - {{ todate }}</h4>

                          </p>
                        </div>

                        <div class="table-container" style="max-height: 800px;overflow-y: auto;">
                          <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead style="position:sticky;top:0">
                              <tr>



                                <th style="width: 380px;height: 60px;"><b>Product Name</b></th>
                                <th><b>UOM</b></th>
                                <th style="width: 120px;"><b>Category Type</b></th>
                                <th><b>Material Type</b></th>
                                <th><b>Color</b></th>
                                <th><b>Thickness</b></th>
                                <th><b>Coating Mass</b></th>
                                <th><b>Yield Strength</b></th>
                                <th><b>Brand</b></th>
                                <th style="text-align: center;" ng-click="setSortKey('sq_mtr')"><b>Iron and Steel Corr. Sheet</b></th>
                                <th style="text-align: center;" ng-click="setSortKey('R_Ft1')"><b>Accessories</b></th>
                                <th style="text-align: center;" ng-click="setSortKey('kg1')"><b>Sheet Coil</b></th>
                                <th style="text-align: center;" ng-click="setSortKey('R_sq_mtr')"><b>Roll Sheet</b></th>
                                <th style="text-align: center;" ng-click="setSortKey('PRA_Ft')"><b>Profile Ridge & Arch</b></th>
                                <th style="text-align: center;" ng-click="setSortKey('TS_Ft')"><b>Tile Sheet</b></th>
                                <th style="text-align: center;" ng-click="setSortKey('LS_Ft')"><b>Liner Sheet</b></th>
                                <th style="text-align: center;" ng-click="setSortKey('Purlin_ton')"><b>Purlin</b></th>
                                <th style="text-align: center;" ng-click="setSortKey('DeckSh_ton')"><b>Decking Sheet</b></th>
                                <th style="text-align: center;" ng-click="setSortKey('others_qty')"><b>Others</b></th>
                                <th style="text-align: center;"><b>Total</b></th>

                              </tr>
                              <tr>


                                <th style="text-align: right;height: 60px;"><b>UOM</b></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th style="text-align: center;">Sq. Mtr</th>
                                <th style="text-align: center;">R.Ft</th>
                                <th style="text-align: center;">KG</th>
                                <th style="text-align: center;">Sq.Mtr</th>
                                <th style="text-align: center;">Sq.Mtr</th>
                                <th style="text-align: center;">Sq.Mtr</th>
                                <th style="text-align: center;">Sq.Mtr</th>
                                <th style="text-align: center;">KG</th>
                                <th style="text-align: center;">Sq. Mtr</th>
                                <th style="text-align: center;">UOM</th>
                                <th style="text-align: center;">KG</th>



                              </tr>
                              <tr class="totals">

                                <td style=" text-align: right; padding-right: 20px;width: 380px;height: 40px;"></td>
                                <td class="border-0"></td>
                                <td class="border-0"></td>
                                <td class="border-0"></td>
                                <td class="border-0"></td>
                                <td class="border-0"></td>
                                <td class="border-0"></td>
                                <td class="border-0"></td>
                                <td class="border-0"><b>Totals : </b></td>
                                <td style="text-align: center;"><b>{{ totals.sq_mtr}}</b></td> <!-- Quantity -->
                                <td style="text-align: center;"><b>{{ totals.R_Ft1}}</b></td> <!-- Price -->
                                <td style="text-align: center;"><b>{{ totals.kg1}}</b></td> <!-- Price -->
                                <td style="text-align: center;"><b>{{ totals.R_sq_mtr}}</b></td> <!-- Price -->
                                <td style="text-align: center;"><b>{{ totals.PRA_Ft}}</b></td> <!-- Price -->
                                <td style="text-align: center;"><b>{{ totals.TS_Ft}}</b></td> <!-- Price -->
                                <td style="text-align: center;"><b>{{ totals.LS_Ft}}</b></td> <!-- Price -->
                                <td style="text-align: center;"><b>{{ totals.Purlin_ton}}</b></td> <!-- Price -->
                                <td style="text-align: center;"><b>{{ totals.DeckSh_ton}}</b></td> <!-- Price -->
                                <td style="text-align: center;"><b>{{ totals.others_qty}}</b></td> <!-- Price -->
                                <td style="text-align: center;"><b>{{ }}</b></td> <!-- Price -->

                              </tr>
                            </thead>




                            <tbody>

                              <tr class="trpoint" ng-repeat="names in namesDataledgergroup">
                                <td>{{ names.product_name}}</a></td>
                                <td>{{ names.uom}}</a></td>
                                <td>{{ names.category_name}}</td>
                                <td>{{ names.material_type}}</td>
                                <td>{{ names.color}}</td>
                                <td>{{ names.thickness}}</td>
                                <td>{{ names.coating_mass}}</td>
                                <td>{{ names.yield_strength}}</td>
                                <td>{{names.brand}}</td>
                                <td style="text-align: center;"><a href="<?php echo base_url(); ?>index.php/report/sales_product_report?order_id={{names.sq_mtr_order_id}}&type=product_id&fromdate={{formdate}}&todate={{todate}}" target="_blank">{{ names.sq_mtr}}</a></td>
                                <td style="text-align: center;"><a href="<?php echo base_url(); ?>index.php/report/sales_product_report?order_id={{names.R_Ft1_order_id}}&type=sub_product_id&fromdate={{formdate}}&todate={{todate}}" target="_blank">{{ names.R_Ft1}}</a></td>
                                <td style="text-align: center;"><a href="<?php echo base_url(); ?>index.php/report/sales_product_report?order_id={{names.kg1_order_id}}&type=tile_material_id&fromdate={{formdate}}&todate={{todate}}" target="_blank">{{ names.kg1}}</a></td>
                                <td style="text-align: center;"><a href="<?php echo base_url(); ?>index.php/report/sales_product_report?order_id={{names.R_sq_mtr_order_id}}&type=sub_product_id&fromdate={{formdate}}&todate={{todate}}" target="_blank">{{ names.R_sq_mtr}}</a></td>
                                <td style="text-align: center;"><a href="<?php echo base_url(); ?>index.php/report/sales_product_report?order_id={{names.PRA_Ft_order_id}}&type=sub_product_id&fromdate={{formdate}}&todate={{todate}}" target="_blank">{{ names.PRA_Ft}}</a></td>
                                <td style="text-align: center;"><a href="<?php echo base_url(); ?>index.php/report/sales_product_report?order_id={{names.TS_Ft_order_id}}&type=tile_material_id&fromdate={{formdate}}&todate={{todate}}" target="_blank">{{ names.TS_Ft}}</a></td>
                                <td style="text-align: center;"><a href="<?php echo base_url(); ?>index.php/report/sales_product_report?order_id={{names.LS_Ft_order_id}}&type=tile_material_id&fromdate={{formdate}}&todate={{todate}}" target="_blank">{{ names.LS_Ft}}</a></td>
                                <td style="text-align: center;"><a href="<?php echo base_url(); ?>index.php/report/sales_product_report?order_id={{names.Purlin_ton_order_id}}&type=product_id&fromdate={{formdate}}&todate={{todate}}" target="_blank">{{ names.Purlin_ton}}</a></td>
                                <td style="text-align: center;"><a href="<?php echo base_url(); ?>index.php/report/sales_product_report?order_id={{names.DeckSh_ton_order_id}}&type=product_id&fromdate={{formdate}}&todate={{todate}}" target="_blank">{{ names.DeckSh_ton}}</a></td>
                                <td style="text-align: center;"><a href="<?php echo base_url(); ?>index.php/report/sales_product_report?order_id={{names.others_order_id}}&type=product_id&fromdate={{formdate}}&todate={{todate}}" target="_blank">{{ names.others_qty}}</a></td>
                                <td style="text-align: center;">{{ names.kg2}}</td>
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




  <script>
    $(document).ready(function() {
      $('#categoryType').select2();
      <?php
      foreach ($categories as $val) {
      ?>

      <?php
      }
      ?>
      $('#categoryType').on('change', function() {
        // Open the Select2 dropdown programmatically
        if ($(this).val() == ['All']) {
          $('#categoryType').find('option').prop('selected', true);
          $('#categoryType').trigger('change'); // Trigger the change
        }
        console.log($('#categoryType').val());
        $('#categoryType').select2('open');
      });


      $('#payment_mode_payoff').on('change', function() {

        var val = $(this).val();

        if (val == 'Cash') {
          $('#res_no').hide();
        } else {
          $('#res_no').show();
        }

      });


     
      $(".typeset").click(function() {

        var a = $(this).val();

        if (a == 'Multiple Options') {
          $('#optionset').show();

        } else {
          $('#optionset').hide();
        }


      });

      $("#back").click(function() {

        $('#productupload').show();
        $('#productupdate').hide();

      });

    });
  </script>
  <script>
    var app = angular.module('crudApp', []);

    app.directive("fileInput", function($parse) {
      return {
        link: function($scope, element, attrs) {
          element.on("change", function(event) {
            var files = event.target.files;
            $parse(attrs.fileInput).assign($scope, element[0].files);
            $scope.$apply();
          });
        }
      }
    });

    app.filter('number', function () {        
    return function (input) {
        if (! isNaN(input)) {
          if(input != 0 && input != null){
              if (isNaN(input)) return input;
        var formattedValue = parseFloat(input);
        // console.log(input.toLocaleString('en-IN').toFixed(2));
         var decimal =  formattedValue.toLocaleString('en-IN', {   minimumFractionDigits: 2, maximumFractionDigits: 2 });

        return decimal
      }else{
        return '0';
      }
      

        }
    }
});
    app.filter('transform', function() {
      return function(value) {
        encodeURIComponent(value);
      }
    })
    app.controller('crudController', function($scope, $http) {

      $scope.success = false;
      $scope.error = false;
      $scope.getproductval = 'ALL';
      $scope.formdate = '<?php echo $this->session->userdata['
      logged_in ']['
      from_date ']; ?>';
      $scope.todate = '<?php echo $this->session->userdata['
      logged_in ']['
      to_date ']; ?>';

      $scope.sortKey = '';

      $scope.setSortKey = function(key) {
        $scope.sortKey = key;
        console.log("key", key)
        $scope.namesDataledgergroup = $scope.namesDataledgergroup.sort(function(a, b) {
          return a[key] > b[key] ? 1 : -1;
        })

        $('th[ng-click=" "').trigger('click');


        $("[ng-click*='" + key + "')]").trigger('click');
      }

      $scope.getProduct = function() {
        var cate_id = $('#choices-single-default').val();;

        $scope.productlist(cate_id);

      };


      $scope.selectedProds = [];

      $scope.handleSelectedProds = function(key) {
        console.log("key", key)
        //Push if only not available
        if (!$scope.selectedProds.includes(key)) {
          $scope.selectedProds.push(key);
        } else {
          //Remove if already selected
          $scope.selectedProds.splice($scope.selectedProds.indexOf(key), 1);
        }
        console.log("$scope.selectedProds", $scope.selectedProds)

      }



      $('span.chip-close').on('click', function(e){
        console.log("$(this)",$(this))
        let spec = $(this).attr('data-product');
        $scope.handleSelectedProds(spec)
      })



      $scope.completeProduct = function() {
        $http({
          method: "POST",
          url: "<?php echo base_url(); ?>index.php/order/fetchproduct_full2_basecaetgary_3",
          data: {
            'action': 'fetch_single_data',
            'cateid': 0,
            'order_no': '4/0/1/2023',
            'tablename_sub': 'order_product_list'
          }
        }).success(function(data) {
          data.push("All");
          $scope.availableProducts = data;
          // console.log("data",data)

          $("#autocomplete").autocomplete({
            source: $scope.availableProducts,
            minLength: 1,
            select: function(event, ui) {
              var selectedValue = ui.item.value;
              var isChecked = ui.item.isChecked || false;
              if (isChecked) {
                
                // Uncheck the item
                ui.item.isChecked = false;
                $(this).val("");
                $("#selected-items .selected-item[data-value='" + selectedValue + "']").remove();
              } else {
                // Check the item
                ui.item.isChecked = true;
                $("<div>")
              .addClass("chip")
              .addClass("selected-item")
              .attr("data-value", selectedValue)
              .html(`<span class="chip-text">${selectedValue}</span><span data-product='`+selectedValue+`' class="chip-close">x</span>`)
              .appendTo("#selected-items")
              .on("click", function() {
                // Uncheck the item when the chip is clicked
                ui.item.isChecked = false;
                $(this).remove();
              });
              $(this).val("");
              $(this).open();
              }
              return false;
            },
            focus: function(event, ui) {
              event.preventDefault();
            },
            open: function(event, ui) {
              // Keep the dropdown open when it's opened
              $('.ui-autocomplete').on('menufocus hover mouseover');
            },
            create: function() {
              $(this).data('ui-autocomplete')._renderItem = function(ul, item) {
                var checkbox = $("<input  type='checkbox'>")
                  .addClass("checkbox")
                  .prop("checked", item.isChecked || false)
                  .append(item.value).on("click", function(e) {
                     $scope.handleSelectedProds(item.value);
                  });
                var listItem = $("<li>")
                  .addClass("autocomplete-item")
                  .append(checkbox)
                  .append(item.value).on("click", function(e) {
                    //  $scope.handleSelectedProds(item.value);
                     
                  });
                  
                return $("<li>")
                  .append(listItem)
                  .appendTo(ul);
              };
            }
          });
        });

      }

      $('li.autocomplete-item').on('click', function(e) {

      })

      $scope.productlist = function(cate_id) {

        $http({
          method: "POST",
          url: "<?php echo base_url() ?>index.php/report/productlist",
          data: {
            'cate_id': cate_id
          }
        }).success(function(data) {

          $scope.productlistdata = data;

        });


      }

      $scope.search = function() {

        var productid = $('#autocomplete').val();
        var fromdate = $('#from-date').val();
        var fromto = $('#to-date').val();
        if (productid !== 'All' && productid == '') {
          const myArray = $scope.selectedProds.map((el) => {
            return el.split('-')[0]
          });
          var productid = myArray.join(',');

        } else {

          productid = 'All';
        }


        $scope.formdate = fromdate;
        $scope.todate = fromto;


        $('#search-view').show();
        $('#exportdata').show();

        $scope.fetchDatagetlegderGroup(productid, fromdate, fromto);

      };

      $scope.fetchDatagetlegderGroup = function(productid, fromdate, fromto) {
        var brand = $('#brand').val();
        var ys = $('#ys').val();
        var uom = $('#uom').val();
        var color = $('#color').val();
        var thickness = $('#thickness').val();
        var categoryType = $('#category_type').val();
        var materialType = $('#material_type').val();
        var gsm = $('#gsm').val();
        var cateTypes = $('#categoryType').val();
        cateTypes = cateTypes.join(',');
        console.log(cateTypes);

        // return null;
        $http.get('<?php echo base_url() ?>index.php/report/gte_sale_grpup_products?limit=10&productid=' + encodeURIComponent(productid) + '&formdate=' +
          fromdate + '&todate=' + fromto + '&brand=' + brand + '&ys=' + ys + '&uom=' + uom + '&color=' + color + '&thickness=' + thickness +
          '&categoryType=' + categoryType + '&materialType=' + materialType + '&gsm=' + gsm + '&cateTypes=' + encodeURIComponent(cateTypes)
        ).success(function(data) {
          

          $scope.namesDataledgergroup = data[0];
          $scope.totals = data['totals']
        });


      };
      $('#exportdata').on('click', function() {
        var productid = $('#autocomplete').val();
        var fromdate = $('#from-date').val();
        var fromto = $('#to-date').val();
        if (productid !== 'All') {
          const myArray = $scope.selectedProds.map((el) => {
            return el.split('-')[0]
          });
          var productid = myArray.join(',');

        } else {

          productid = 'All';
        }
        var brand = $('#brand').val();
        var ys = $('#ys').val();
        var uom = $('#uom').val();
        var color = $('#color').val();
        var thickness = $('#thickness').val();
        var categoryType = $('#category_type').val();
        var materialType = $('#material_type').val();
        var gsm = $('#gsm').val();
        var cateTypes = $('#categoryType').val();
        cateTypes = cateTypes.join(',');
        console.log(cateTypes);


        url = '<?php echo base_url() ?>index.php/report/gte_sale_grpup_products_export?limit=10&productid=' + encodeURIComponent(productid) + '&formdate=' +
          fromdate + '&todate=' + fromto + '&brand=' + brand + '&ys=' + ys + '&uom=' + uom + '&color=' + color + '&thickness=' + thickness +
          '&categoryType=' + categoryType + '&materialType=' + materialType + '&gsm=' + gsm + '&cateTypes=' + encodeURIComponent(cateTypes)
        location = url;

        });


    });
  </script>
  <?php include('footer.php'); ?>
</body>