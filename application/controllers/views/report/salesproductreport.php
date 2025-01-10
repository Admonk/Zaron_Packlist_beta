<?php
include "header.php";
$order_id=0;
if(isset(($_GET['order_id'])))
{
  $order_id=$_GET['order_id'];
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
                <h4 class="mb-sm-0 font-size-18">Sales Product Report</h4>

                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Sales Product Report !</li>
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
                      <div class="row">
                        <div class="col-md-3">
                          <!--data-trigger -->
                          <select class="form-control categories" name="choices-single-default" id="choices-single-default" ng-change='getProduct()' ng-model="getproductval">
                            <option value="ALL">All Category</option>

                            <?php

                            foreach ($categories as $val) {
                            ?>
                              <option value="<?php echo $val->id; ?>" data-id="<?php echo $value->id; ?>">
                                <?php echo $val->categories; ?></option>

                            <?php
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

                      <form id="searchForm">
                        <div class="row">
                          <div class="col-md-3" id="formula2" style="display:none">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label">Fact No 2 <span style="color:red;">*</span></label>
                              <div class="col-sm-12">
                                <input id="kg_formula" class="form-control" required name="formula2" ng-model="formula2" type="text">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label">UOM</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="uom" id="uom">
                                  <option value="ALL" selected>All</option>
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
                              <label class="col-sm-12 col-form-label">Categorie type</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="categorie_type" id="categorie_type">
                                  <option value="ALL">All </option>
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
                                  <option value="ALL">All </option>
                                  <?php
                                  foreach ($material_type->result_array() as $row) {

                                  ?>
                                    <option value="<?php echo $row['option']; ?>"><?php echo $row['option']; ?></option>
                                  <?php

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
                                  <option value="ALL">All </option>
                                  <?php
                                  foreach ($color as $value) {

                                  ?>
                                    <option  <?=$_GET['color'] == $value->name ? 'selected ' :''?>  value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
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
                                  <option value="ALL">All </option>
                                  <?php
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
                                  <option value="ALL">All </option>
                                  <?php
                                  foreach ($gsm as $value) {

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
                              <label class="col-sm-12 col-form-label">Yield strength</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="ys" id="ys">
                                  <option value="ALL">All </option>
                                  <?php
                                  foreach ($ys as $value) {

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
                              <label class="col-sm-12 col-form-label">Brand</label>
                              <div class="col-sm-12">
                                <select class="form-control" name="brand" id="brand">
                                  <option value="ALL">All </option>
                                  <?php
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

                          <div class="col-md-2">
                            <div class="form-group row">
                              <!-- <label class="col-sm-12 col-form-label">Start date</label> -->
                              <div class="col-sm-12" style="margin-top: 35px;">
                                <input type="date" class="form-control" id="from-date" min="<?= $_GET['fromdate'] ? $_GET['fromdate'] : date('Y-07-01'); ?>" value="<?=-$_GET['fromdate'] ? $_GET['fromdate'] : date('Y-07-01'); ?>">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group row">
                              <!-- <label class="col-sm-12 col-form-label">End date</label> -->
                              <div class="col-sm-12" style="margin-top: 35px;">
                                <input type="date" class="form-control" id="to-date" min="<?= $_GET['todate'] ? $_GET['todate'] : date('Y-07-01'); ?>" value="<?= $_GET['todate'] ? $_GET['todate'] : date('Y-07-01'); ?>">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group row">
                              <!-- <label class="col-sm-12 col-form-label">End date</label> -->
                              <div class="col-sm-12" style="margin-top: 35px;">
                                <select class="form-control" id="payment_status">
                                  <option value="ALL">All</option>
                                  <option value="3">Approved </option>
                                  <option value="4">Delivered </option>
                                  <option value="5">Reconciliation </option>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group row">
                              <div class="col-sm-12" style="margin-top: 35px;">
                                <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                                <button type="button" class="btn btn-success waves-effect waves-light disabled" id="exportdata">Export</button>

                              </div>
                            </div>
                          </div>

                          <div class="row" style="margin-top: 10px;">


                            <!-- <div class="col">
                              <input type="date" class="form-control" id="from-date"
                                min="<?php //echo date('Y-07-01'); 
                                      ?>" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" min="<?php echo date('Y-07-01'); ?>"
                                value="<?php //echo date('Y-m-d'); 
                                        ?>">
                            </div>
                            <div class="col">
                              <select class="form-control" id="payment_status">
                                <option value="ALL">All</option>
                                <option value="3">Approved </option>
                                <option value="4">Delivered </option>
                                <option value="5">Reconciliation </option>
                              </select>
                            </div>
                            <div class="col">
                              <button type="button" class="btn btn-secondary waves-effect waves-light"
                                ng-click="search()">Search</button>

                              <button type="button" class="btn btn-success waves-effect waves-light disabled"
                                id="exportdata">Export</button>
                            </div> -->
                          </div>
                        </div>
                      </form>
                      <div id="search-view">


                        <div class="card-header" ng-init="fetchSingleData(0)">

                          <h4 class="card-title">Sales Product Report {{ formdate }} To {{ todate }}</h4>

                          </p>
                        </div>


                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" ng-init="fetchDatagetlegderGroup('ALL','ALL',formdate,todate,'ALL')">
                          <thead>
                            <tr>


                              <th>No</th>
                              <th>Date</th>
                              <th>Order No</th>
                              <th>Category</th>
                              <th>Category Type</th>
                              <th>Metirial Type</th>
                              <th>Color</th>
                              <th>Thickness</th>
                              <th>Brand</th>
                              <th>Coating Mass</th>
                              <th>Yield strenth</th>
                              <th>QTY</th>
                              <th>UOM</th>
                              <th>Price</th>
                              <th>total</th>
                              <th>Fact</th>


                            </tr>
                          </thead>
                          <tbody ng-repeat="names in namesDataledgergroup | filter:query">
                            <tr ng-if="names.no" class="trpoint">
                              <td>{{ $index + 1 }}</td>
                              <td>{{ names.create_date || '' }}</td>
                              <td ><a href="<?=base_url()?>index.php/order/ordercreate_product_process?order_id={{names.id}}" target="_blank">{{ names.order_no || '' }}</a></td>
                              <td>{{ names.categories_name || '' }}</td>
                              <td>{{ names.categorie_type || '' }}</td>
                              <td>{{ names.materialtype || '' }}</td>
                              <td>{{ names.color || '' }}</td>
                              <td>{{ names.thickness || '' }}</td>
                              <td>{{ names.brand || '' }}</td>
                              <td>{{ names.gsm || '' }}</td>
                              <td>{{ names.ys || '' }}</td>
                              <td>{{ names.qty || '' }}</td>
                              <td>{{ names.uom || '' }}</td>
                              <td>{{ names.rate || '' }}</td>
                              <td>{{ names.total || '' | number }}</td>
                              <td>{{ names.fact || '' }}</td>
                            </tr>

                          </tbody>
                          <tfoot>
                            <!-- Place the corresponding values in their respective columns -->
                            <tr>
                              <td colspan="11" style=" text-align: right; padding-right: 20px;">Total</td> <!-- Empty columns for alignment -->
                              <td>{{ namesDataledgergroup.qty || '' }}</td> <!-- Quantity -->
                              <td colspan="2"></td> <!-- Empty columns for alignment -->
                              <td>{{ namesDataledgergroup.net_price || '' }}</td> <!-- Price -->
                              <td colspan="2"></td> <!-- Empty columns for alignment -->
                            </tr>
                          </tfoot>
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
    $(document).ready(function() {

      $('#payment_mode_payoff').on('change', function() {

        var val = $(this).val();

        if (val == 'Cash') {
          $('#res_no').hide();
        } else {
          $('#res_no').show();
        }

      });


      $('#exportdata').on('click', function() {


        var cateid = $('#choices-single-default').val();
        var productid = $('#choices-single-default-1').val();



        var fromdate = $('#from-date').val();
        var fromto = $('#to-date').val();
        var order_status = $('#payment_status').val();

        url = '<?php echo base_url() ?>index.php/report/fetch_data_get_ledger_view_export?limit=10&order_id=<?php echo $order_id; ?>&cate_id=' +
          cateid + '&productid=' + productid + '&formdate=' + fromdate + '&todate=' + fromto +
          '&order_status=' + order_status;
        location = url;

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



    var count_value_dyeing = 1;

    function add_rowprice() {


      $('#price_details').show();

      var all = count_value_dyeing++;

      var data =
        '<div class="row showdata"> <div class="col-md-5"> <div class="form-group row"> <div class="col-sm-12"> <input id="price" class="form-control price ng-pristine ng-invalid ng-invalid-required ng-touched" name="price" required="" ng-model="price" type="text"> </div> </div> </div> <div class="col-md-5"> <div class="form-group row"> <select class="form-control price_type ng-pristine ng-untouched ng-valid" name="price_type" ng-model="price_type"> <?php foreach ($price_master as $value) { ?> <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option> <?php } ?> </select> </div> </div><div class="col-md-2"> <div class="form-group row"> <div class="col-sm-12"> <button type="button" class="btn btn-outline-info btn-mini waves-effect waves-light addbutton" onclick="return add_rowprice();"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-outline-info btn-mini waves-effect waves-light addbutton" onclick="return remove();"><i class="fa fa-minus"></i></button> </div> </div> </div> </div>';

      $('#price_details').append(data);

    }

    function remove() {

      $('#price_details .showdata:last').remove();

    }





    function add_row_option() {

      var all = count_value_dyeing++;

      var data =
        '<div class="row showdata"> <div class="col-md-2"> <div class="form-group row"> <div class="col-sm-12"> <input id="product_name" class="form-control label_option1" placeholder="number" name="label_option1[]" ng-model="label_option1" type="number"> </div> </div> </div> <div class="col-md-1"> <div class="form-group row"> <div class="col-sm-12"> + </div> </div> </div> <div class="col-md-2"> <div class="form-group row"> <div class="col-sm-12"> <input id="product_name" class="form-control label_option2" placeholder="number" name="label_option2[]" ng-model="label_option2" type="number"> </div> </div> </div> <div class="col-md-1"> <div class="form-group row"> <div class="col-sm-12">  </div> </div> </div>  <div class="col-md-2"> <div class="form-group row"> <div class="col-sm-12"> <button type="button" class="btn btn-outline-info btn-mini waves-effect waves-light addbutton" onclick="return add_row_option();"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-outline-info btn-mini waves-effect waves-light addbutton" onclick="return remove_option();"><i class="fa fa-minus"></i></button> </div> </div> </div> </div>';

      $('#show_details2').append(data);

    }

    function remove_option() {

      $('#show_details2 .showdata:last').remove();

    }
  </script>
  <script>

    var app = angular.module('crudApp', ['datatables']);

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



      $scope.getProduct = function() {
        var cate_id = $('#choices-single-default').val();;

        $scope.productlist(cate_id);

      };

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

        var cateid = $('#choices-single-default').val();
        var productid = $('#choices-single-default-1').val();
        var fromdate = $('#from-date').val();
        var fromto = $('#to-date').val();
        var order_status = $('#payment_status').val();
        var uom = $('#uom').val();

        // Add your additional form data dynamically if available
        var categorie_type = $('#categorie_type').val();
        var material_type = $('#material_type').val();
        var color = $('#color').val();
        var thickness = $('#thickness').val();
        var coating_mass = $('#gsm').val();
        var yield_strength = $('#ys').val();
        var brand = $('#brand').val();


        // $scope.formdate = fromdate;
        // $scope.todate = fromto;

        $('#search-view').show();
        $('#exportdata').show();

        $scope.fetchDatagetlegderGroup(cateid, productid, fromdate, fromto, order_status, uom, categorie_type,
          material_type, color, thickness, coating_mass, yield_strength, brand);

      };

      $scope.fetchDatagetlegderGroup = function(cateid, productid, fromdate, fromto, order_status, uom,
        categorie_type, material_type, color, thickness, coating_mass, yield_strength, brand) {


        let type = '<?=$_GET['type']?>';
        $http.get('<?php echo base_url() ?>index.php/report/fetch_data_get_ledger_view?limit=10&order_id=<?php echo $order_id; ?>&cate_id=' +
          cateid + '&productid=' + productid + '&formdate=' + fromdate + '&todate=' + fromto +
          '&order_status=' + order_status + '&uom=' + uom + '&categorie_type=' + categorie_type +
          '&material_type=' + material_type + '&color=' + color + '&thickness=' + thickness + '&coating_mass=' +
          coating_mass + '&yield_strength=' + yield_strength + '&brand=' + brand + '&type=' + type).success(function(data) {

          $scope.query = {}
          $scope.queryBy = '$';

          $scope.namesDataledgergroup = data;
          

          var totalqty = 0;
          for (var i = 0; i < data.length; i++) {
            var qty = parseInt(data[i].qty);
            totalqty += qty;
          }

          $scope.totalqty = totalqty;

          var totalamount = 0;
          for (var i = 0; i < data.length; i++) {
            var balance = parseInt(data[i].totalamount);
            totalamount += totalamount;
          }

          $scope.totalamount = totalamount;

        });


      };
      
      $(document).ready(function() {
        $scope.search();
      })
      

    });
  </script>
  <?php include('footer.php'); ?>
</body>