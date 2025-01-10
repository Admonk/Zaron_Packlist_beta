<?php include "header.php"; ?>
<style>
  .tooltip {
    position: relative;
    display: contents;
    border-bottom: 1px dotted black;
  }

  .tooltip .tooltiptext {
    visibility: hidden;

    /* width: 120px; */
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    /* left: 50%; */
    margin-left: -60px;
    opacity: 0;
    transition: opacity 0.3s;
    border: 1px solid;
  }

  table#datatable {
    font-size: 10px;
  }

  .tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 23%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
  }

  .tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
  }


  td input[type="text"] {
    display: block;
    border: 0;
    top: 0px;
    outline: none;
    position: relative;
    left: 0;
    width: 96%;
    padding: 10px 7px;
    height: 100%;
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
                <h4 class="mb-sm-0 font-size-18">Factory Inward</h4>

                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/products/productscreate">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Factory Inward</li>
                  </ol>
                </div>

              </div>
            </div>
          </div>
          <!-- end page title -->

          <div class="row">
            <div class="col-lg-12">
              <div class="card">

                <div class="card-header">
                  <h4 class="card-title">Factory Inward List</h4>

                </div>



                <div class="card-body">


                  <div ng-init="fetchDatapurchase()">

                    <table id="datatable" class="table table-bordered dt-responsive" datatable="ng" dt-options="vm.dtOptions">
                      <thead>
                        <tr>

                          <th>ID</th>
                          <th>Invoice No</th>
                          <th>PO No</th>
                          <th>Vehicle No</th>
                          <th style="width:200px;">Vendor Name</th>
                          <th style="width:200px;">Product Name</th>
                          <th>No. of Coils / Bundles / Sheets</th>
                          <th>Invoice QTY </th>
                          <th>UOM</th>
                          <th>Inward QTY </th>
                          <th>Inward Date</th>
                          <th>COIL NO</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in purchaseData">
                          <td>{{name.no}}</td>
                          <td>{{name.invoice_no}}</td>
                          <td>{{name.po_number}}</td>
                          <td>{{name.vehicle_no}}</td>
                          <td>{{name.vendor_name}}</td>
                          <td>{{name.product_name}}</td>
                          <th>{{name.coil_count}}</th>
                          <th>{{name.qty}}</th>
                          <th>{{name.unit}}</th>
                          <th>{{name.total_qty}}</th>
                          <td>{{name.inward_date}}</td>
                          <th>{{name.coil_no}}</th>
                          <td><a href="javascript:void(0)" ng-click="fetchSingleData(name.id,name.product_name,name.product_id,name.qty)" style="padding: 3px;font-size: 11px;" class="btn btn-outline-primary" title="Click to udpate the Coil no Bay and bin info"> <i class="fa fa-info-circle" data-placement="top"></i> UPDATE</a>
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
        <!-- container-fluid -->


      </div>
      <!-- End Page-content -->


      <?php

      foreach ($racksetup as $set) {
        $rack = $set->rack;
        $bin_col = $set->bin_col;
        $bin_row = $set->bin_row;
        $val = $bin_col * $bin_row;
        $alpha = explode(',', $rack);
      }

      ?>


      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modelid">
        <div class="modal-dialog modal-xl" style="max-width: 1440px; ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myLargeModalLabel">Update Product Coil Number</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


              <form id="pristine-valid-example" novalidate method="post"></form>

              <form id="pristine-valid-common" ng-submit="submitForm()" method="post" enctype="multipart/form-data">

                <div class="row">
                  <div class="col-sm-12">
                    <input type="hidden" class="form-control" id="get_invoice_id" value={{invoice_id}}>
                    <input type="hidden" class="form-control" id="get_purchase_id" value={{purchase_id}}>
                    <input type="hidden" class="form-control" id="get_invoice_no" value={{invoice_number}}>
                    <input type="hidden" class="form-control" id="get_po_no" value={{po_no}}>
                    <input type="hidden" class="form-control" id="get_product_name" value={{product_name}}>
                    <input type="hidden" class="form-control" id="get_vehicle_no" value={{vehicle_no}}>
                    <input type="hidden" class="form-control" id="get_vendor_name" value={{vendor_name}}>
                    <button type="button" class="btn btn-outline-danger btn-sm" id="add-row" style="float: right; padding: 9px; margin-bottom: 10px">Add New Row</button>
                    <table class="table table-border" id="data-table">
                      <thead>
                        <th>S. No</th>
                        <th>Invoice No</th>
                        <th>PO No</th>
                        <th>Vehicle No</th>
                        <th>Vendor Name</th>
                        <th>Product Name</th>
                        <th>Inward Qty({{unit}})({{total_qty_inward}})</th>
                        <th>Coil Number</th>
                        <th>Coil width(mm)</th>
                        <th>Length (R.Mtr)</th>
                        <th>KG per mtr</th>
                        <th>SQM</th>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in nameData">
                          <td><input type="text" class="form-control" name="no[]" ng-model="name.no"><input type="text" class="form-control" name="id[]" ng-model="name.id" style="display: none;">
                          </td>
                          <td><input type="text" class="form-control" readonly name="invoice_number[]" ng-model="name.invoice_number"></td>
                          <td><input type="text" class="form-control" readonly name="po_number[]" ng-model="name.po_number"></td>
                          <td>
                            <input type="text" class="form-control" readonly name="vehicle_no[]" ng-model="vehicle_no">
                          </td>
                          <td><input type="text" class="form-control" readonly name="vendor_name[]" ng-model="name.vendor_name"></td>
                          <td><input type="text" class="form-control" readonly name="product_name[]" ng-model="name.product_name"></td>
                          <td>
                            <input type="text" class="form-control kgmeter" name="qty[]" ng-model="name.qty">
                          </td>
                          <td><input type="text" class="form-control" name="coil_no[]" ng-model="name.coil_no"></td>
                          <td><input type="text" class="form-control coil_width" name="coil_width[]" ng-model="name.coil_width"></td>
                          <td><input type="text" class="form-control running_length" name="r_mtr_length[]" id='running_length1' ng-model="name.r_mtr_length"></td>
                          <td><input type="text" class="form-control " readonly name="kg_per_mtr[]" ng-model="name.kg_per_mtr"></td>
                          <td><input type="text" class="form-control" readonly name="sqm[]" ng-model="name.sqm"></td>

                        </tr>

                      </tbody>
                    </table>

                    <span style="float: left; padding: 9px;">Total SQM : {{tot_sqm}} </span>

                    <button type="button" class="btn btn-success btn-sm" id="save-all" style="float: right; padding: 9px;">Save All</button>

                  </div>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal -->
      </div>
    </div>


    <script>
      var row_id = 1;


      $(document).ready(function() {
        var product_id_update = 0;
        $("#price").on('input', function() {
          var price = parseInt($(this).val());
          var qty = parseInt($("#qty").val());
          $('#total_amount').val(qty * price);

        });
        $("#qty").on('input', function() {
          var qty = parseInt($(this).val());
          var price = parseInt($('#price').val());

          $('#total_amount').val(qty * price);
        });




        function sumQty(array) {
          let totalQty = 0;

          // Iterate through the array of objects and sum the "qty" values
          array.forEach(obj => {
            Object.keys(obj).forEach(key => {
              totalQty += parseInt(obj[key].qty, 10) || 0; // Convert qty to number and accumulate total
            });
          });

          return totalQty;
        }

        $('#add-row').on('click', function() {
          row_id = row_id + 1;
          var invoice = $('#get_invoice_id').val();          
          var purchse = $('#get_purchase_id').val();
          var invoice_no = $('#get_invoice_no').val();
          var po_no = $('#get_po_no').val();
          var Product_name = $('#get_product_name').val();
          var vendor_name = $('#get_vendor_name').val();
          var vehicle_no = $('#get_vehicle_no').val();

          var newRow = '<tr class="data-row">' +
            '<td><input type="text" class="form-control"  name="no[]" ><input type="text" class="form-control" name="id[]" value="" style="display: none;"></td>' +
            '<td><input type="text" class="form-control" readonly name="invoice_number[]" value="' + invoice_no + '" ></td>' +
            '<td><input type="text" class="form-control" readonly name="po_number[]" value="' + po_no + '" ></td>' +
            '<td><input type="text" class="form-control" readonly name="vehicle_no[]" value="' + vehicle_no + '" ></td>' +
            '<td><input type="text" class="form-control" readonly name="vendor_name[]" value="' + vendor_name + '" ></td>' +
            '<td><input type="text" class="form-control" readonly name="product_name[]" value="' + Product_name + '" ></td>' +
            '<td><input type="text" class="form-control kgmeter" id="kgmeter' + row_id + ' "  name="qty[]"></td>' +
            '<td><input type="text" class="form-control" name="coil_no[]"></td>' +
            '<td><input type="text" class="form-control coil_width"  id="coil_width' + row_id + '" name="coil_width[]"></td>' +
            '<td><input type="text" class="form-control runninglength"  id="runninglength' + row_id + ' "   name="r_mtr_length[]"></td>' +
            '<td><input type="text" class="form-control " readonly name="kg_per_mtr[]"></td>' +
            '<td><input type="text" class="form-control " readonly name="sqm[]"></td>' +
            '</tr>';
          $('#data-table tbody').append(newRow);
        });



        // Save all rows
        $('#save-all').on('click', function() {
          var rowData = [];
          $('#data-table tbody tr').each(function() {
            var currentRow = {};
            $(this).find('input').each(function() {
              currentRow[$(this).attr('name')] = $(this).val();
            });
            rowData.push(currentRow);
          });

          var invoice = $('#get_invoice_id').val();          
          var purchase = $('#get_purchase_id').val();


          // Do something with the rowData (e.g., send it via AJAX to PHP for processing)
          console.log(invoice);
          console.log(rowData);


          // Convert rowData to JSON
          const totalQuantity = sumQty(rowData);
          console.log("Total Quantity:", totalQuantity);
          var rowDataJSON = JSON.stringify(rowData);

          $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>index.php/purchase/insertandupdateinward_newrow",
            data: {
              rowData: rowDataJSON,
              invoice_id: invoice,
              purchase_id : purchase
            },
            success: function(response) {
              console.log("Data saved successfully:", response);
              // You can perform further actions upon successful save if needed
              // Remove appended rows
              $('#data-table tbody .data-row').remove();
              $('#modelid').modal('hide');
              // window.location.reload()


            },
            error: function(xhr, status, error) {
              console.error("Error saving data:", error);
            }
          });
        });

        $(document).on('keyup', 'input[name="coil_width[]"], input[name="r_mtr_length[]"]', function() {
          var currentRow = $(this).closest('tr');
          var qty = parseFloat(currentRow.find('input[name="qty[]"]').val()) || 0;
          var coilWidth = parseFloat(currentRow.find('input[name="coil_width[]"]').val()) || 0;
          var Length = parseFloat(currentRow.find('input[name="r_mtr_length[]"]').val()) || 0;

          var sqm = (coilWidth / 1000) * Length;
          currentRow.find('input[name="sqm[]"]').val(sqm.toFixed(2)); // Display sqm with 2 decimal places

          var kg_per_meter = (qty * 1000) / Length;
          currentRow.find('input[name="kg_per_mtr[]"]').val(kg_per_meter.toFixed(2)); // Display sqm with 2 decimal places
        });
      });

      var app = angular.module('crudApp', ['datatables']);
      app.controller('crudController', function($scope, $http, $timeout) {

        $scope.success = false;
        $scope.error = false;
        $scope.po_no = '<?php echo $po_number; ?>';


        $scope.submit_button = 'Save';



        $scope.fetchData = function() {
          $http.get('<?php echo base_url() ?>index.php/products/fetch_data').success(function(data) {
            $scope.namesData = data;
          });
        };




        $scope.fetchDatavendor = function() {
          $http.get('<?php echo base_url() ?>index.php/vendor/fetch_data').success(function(data) {
            $scope.vendorData = data;
          });
        };



        $scope.fetchDatapurchase = function() {
          $http.get('<?php echo base_url() ?>index.php/purchase/fetch_data').success(function(data) {
            $scope.purchaseData = data;
          });
        };



        $scope.deleteData = function(id) {
          if (confirm("Are you sure you want to remove it?")) {
            $http({
              method: "POST",
              url: "<?php echo base_url() ?>index.php/purchase/insertandupdate",
              data: {
                'id': id,
                'action': 'Delete',
                'tablename': 'purchase_order'
              }
            }).success(function(data) {
              $scope.success = false;
              $scope.error = false;
              $scope.fetchDatapurchase();
            });
          }
        };

        var modalElement = angular.element('#modelid');
        modalElement.on('hidden.bs.modal', function() {
          $scope.$apply(function() {
            // Set isNewRowVisible to false when the modal is dismissed
            $scope.isNewRowVisible = false;
          });
        });




        $scope.nameData = []; // Your existing data
        $scope.isNewRowVisible = false; // Flag to show/hide new row
        $scope.newRowData = {}; // Data for the new row
        $scope.total_qty_inward = 0;        
        $scope.unit = 'TON';



        $scope.fetchSingleData = function(id, product_name, product_id, total) {


          product_id_update = product_id



          //   setTimeout(() => {
          //     $("#data-table tbody tr").each(function() {
          //     var row = $(this);

          //     // row.find('input.kgmeter, input.running_length').on('input', function() {

          //     //   //console.log(row.find('input.kgmeter').val())
          //     //     var kgmeterValue = parseFloat(row.find('input.kgmeter').val()) || 0;
          //     //     var runningLengthValue = parseFloat(row.find('input.running_length').val()) || 1; 

          //     //     var result = (kgmeterValue * 1000) / runningLengthValue;

          //     //     row.find('input.kg_per_meter').val(result);

          //     // });

          //     row.find('input.coil_width, input.running_length').on('input', function() {

          //       //console.log(row.find('input.kgmeter').val())
          //         var coilWithValue = parseFloat(row.find('input.coil_width').val()) || 0;
          //         var runningLengthValue = parseFloat(row.find('input.running_length').val()) || 0; 

          //         var result1 = (coilWithValue * 1000) / runningLengthValue;

          //         row.find('input.kg_per_meter').val(result1.toFixed(2));

          //     });
          // });
          //   }, 1000);

          $('#modelid').modal('show');


          $('#product_id').html(product_name);

          $http({
            method: "POST",
            url: "<?php echo base_url() ?>index.php/purchase/fetch_single_data",
            data: {
              'id': id,
              'action': 'fetch_single_data',
              'tablename': 'purchase_order'
            }
          }).success(function(data) {


            $scope.invoice_id = data.invoice_id;            
            $scope.purchase_id = data.purchase_id;
            $scope.product_name = data.product_name;
            $scope.vehicle_no = data.vehicle_no;
            $scope.invoice_number = data.invoice_number;
            $scope.vendor_name = data.vendor_name;
            $scope.po_no = data.po_number;

            $scope.tot_sqm = data.tot_sqm;

          });


          $http({
            method: "POST",

            url: "<?php echo base_url() ?>index.php/purchase/fetch_single_data_new",
            data: {
              'id': id,
              'action': 'fetch_single_data',
              'tablename': 'purchase_order'
            }
          }).success(function(data) {
            console.log("data inward");
            console.log(data.unit);
            $timeout(function() {
              $scope.nameData = data.data;
              $scope.total_qty_inward = total;              
              $scope.unit = data.unit;

            });
            console.log($scope.nameData);

          });



        };

        $scope.$watch('nameData', function(newValue, oldValue) {
          console.log('nameData changed:', newValue);
        });



        $scope.newItems = [];

        $scope.addNewRow = function() {
          $scope.newItems.push({});
        };

        $scope.saveNewRow = function(newItem) {
          $scope.nameData.push(newItem);
          var index = $scope.newItems.indexOf(newItem);
          if (index !== -1) {
            $scope.newItems.splice(index, 1);
          }
        };

        $scope.saveAllRows = function(nameData) {
          $scope.nameData = nameData;
          console.log($scope.nameData);
        };


        $scope.submitForm1 = function() {

          var total_amount = 0;
          $scope.qty = $('#qty').val();
          $scope.coil_no = $('#coil_no').val();
          $scope.coil_width = $('#coil_width').val();
          $scope.r_mtr_length = $('#r_mtr_length').val();
          $scope.kg_per_mtr = $('#kg_per_mtr').val();
          $scope.sqm_val = $('#sqm_val').val();

          $http({
            method: "POST",
            url: "<?php echo base_url() ?>index.php/purchase/insertandupdateinward",
            data: {
              'total_amount': total_amount,
              'product_id': $scope.product_id,
              'vehicle_no': $scope.vehicle_no,
              'rack_info': $scope.rack_info,
              'coil_no': $scope.coil_no,
              'bin_info': $scope.bin_info,
              'inward_date': $scope.inward_date,
              'vendor_id': $scope.vendor_id,
              'po_number': $scope.po_no,
              'qty': $scope.qty,
              'kg_per_mtr': $scope.kg_per_mtr,
              'coil_width': $scope.coil_width,
              'sqm_val': $scope.sqm_val,
              'r_mtr_length': $scope.r_mtr_length,
              'price': $scope.price,
              'id': $scope.hidden_id,
              'coil_update_status_new': 1,
              'action': 'Inwardnewrow',
              'tablename': 'purchase_order'
            }
          }).success(function(data) {

            if (data.error != '1') {
              if (data.error == '3') {
                $scope.success = false;
                $scope.error = true;
                $scope.hidden_id = "";
                $scope.errorMessage = data.massage;
              } else {
                $scope.success = true;
                $scope.product_id = "";
                $scope.price = "";
                $scope.vendor_id = "";
                $scope.total_amount = "";
                $scope.po_no = "";
                $scope.inward_date = "";
                $scope.qty = "";
                $scope.fetchDatapurchase();
                $scope.successMessage = data.massage;
                $('#modelid').modal('hide');
                $(".alert-success").fadeTo(2000, 500).slideUp(500, function() {
                  $(".alert-success").slideUp(500);
                });

                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function() {
                  $(".alert-danger").slideUp(500);
                });
              }
            }
          });
        };












        $scope.submitForm = function() {




          var total_amount = $('#total_amount').val();





          $http({
            method: "POST",
            url: "<?php echo base_url() ?>index.php/purchase/insertandupdateinward",
            data: {
              'total_amount': total_amount,
              'product_id': $scope.product_id,
              'vehicle_no': $scope.vehicle_no,
              'rack_info': $scope.rack_info,
              'coil_no': $scope.coil_no,
              'bin_info': $scope.bin_info,
              'inward_date': $scope.inward_date,
              'vendor_id': $scope.vendor_id,
              'po_number': $scope.po_no,
              'qty': $scope.qty,
              'kg_per_mtr': $scope.kg_per_mtr,
              'coil_width': $scope.coil_width,
              'r_mtr_length': $scope.r_mtr_length,
              'price': $scope.price,
              'id': $scope.hidden_id,
              'action': 'Inward',
              'tablename': 'purchase_order'
            }
          }).success(function(data) {

            if (data.error != '1') {
              if (data.error == '3') {

                $scope.success = false;
                $scope.error = true;
                $scope.hidden_id = "";

                $scope.errorMessage = data.massage;

              } else {





                $scope.success = true;
                $scope.error = false;
                $scope.product_id = "";
                $scope.price = "";
                $scope.vendor_id = "";
                $scope.total_amount = "";
                $scope.po_no = "";
                $scope.inward_date = "";
                $scope.qty = "";
                $scope.fetchDatapurchase();

                $scope.successMessage = data.massage;
                $('#modelid').modal('hide');

                $(".alert-success").fadeTo(2000, 500).slideUp(500, function() {
                  $(".alert-success").slideUp(500);
                });

                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function() {
                  $(".alert-danger").slideUp(500);
                });


              }



            }


          });













        };






      });
    </script>
    <?php include('footer.php'); ?>
</body>