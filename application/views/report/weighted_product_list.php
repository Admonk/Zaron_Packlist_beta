<?php  include "header.php"; ?>

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

::-webkit-scrollbar {
    height: 10px !important;
    width: 10px !important;
    cursor: pointer;
}


.ui-widget.ui-widget-content {
    border: 1px solid #d3d3d3;
    z-index: 999999;
}
.table-bordered {
    border: 1px solid #e9e9ef;
    table-layout: fixed;
}


table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}


td{

  text-align: left;
  padding: 8px;
}

th {
  border-top: 1px solid #000;
   border-bottom: 1px solid #000;
  text-align: left;
  padding: 8px;
}

th.center {
        text-align: center;
    }
</style>
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp"
    ng-controller="crudController">
<div id="layout-wrapper">
    <?php echo $top_nav; ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                            <?php
                                $title="Weighted Product List";
                            ?>

                            <h4 class="mb-sm-0 mt-3 font-size-18"><?php echo $title; ?> </h4>


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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" style="display:none;"
                                                class="form-control rounded border ng-pristine ng-valid ng-touched"
                                                placeholder="Search..." ng-model="query[queryBy]">
                                            <div class="table-responsive">
                                                <table border="yes">
                                                    
                                                    <tbody
                                                        >
                                                        <tr>
                                                            <th class="center" rowspan="3" style="width: 400px;"><b>Particulars</b></th>
                                                            <th class="center" colspan="8" ><b><?php echo $fromdate; ?>  to  <?php echo $currentdate; ?></b></th>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th class="center" colspan="2" ><b>Opening Balance</b></th>
                                                            <th class="center" colspan="2" ><b>Inwards</b></th>
                                                            <th class="center" colspan="2"><b>Outwards</b></th>
                                                            <th class="center" colspan="2" ><b>Closing Balance</b></th>
                                                        </tr>
                                                        <tr>
                                                            <th><b>Qty</b></th>
                                                            <th><b>Value</b></th>
                                                            <th><b>Qty</b></th>
                                                            <th><b>Value</b></th>
                                                            <th><b>Qty</b></th>
                                                            <th><b>Value</b></th>
                                                            <th><b>Qty</b></th>
                                                            <th><b>Value</b></th>
                                                        </tr>
                                                        <tr >
                                                            <td><b>Opening Balance</b></td>
                                                            <td><b></b></td>
                                                            <td><b></b></td>
                                                            <td><b></b></td>
                                                            <td><b></b></td>
                                                            <td><b>{{opentotqty}}</b></td>
                                                            <td><b>{{opentotval}}</b></td>
                                                        </tr>
                                                        <tr ng-repeat="(month, monthData) in namesDataledgergroup" >
                                                            <td ng-if="monthData.name == 'grand_totals'" style="text-align: right;"><b>Grand total</b></td>
                                                            <td ng-if="monthData.name !== 'grand_totals'"><b>{{ monthData.name }}</b></td>
                                                            <td><b>{{ monthData.openqty }} </b> <b ng-if = " monthData.openqty != 0">{{ monthData.uom }}</b></td>
                                                            <td><b>{{ monthData.openvalue | indianCurrency}}</b></td>
                                                            <td><b>{{ monthData.inqty }}</b></td>
                                                            <td><b>{{ monthData.invalue  }}</b></td>
                                                            <td ng-if="monthData.name == 'grand_totals'">
                                                                <span><b>{{ monthData.outqty }} {{ monthData.uom }}</b></span>
                                                            </td>
                                                            <td ng-if="monthData.name !== 'grand_totals'">
                                                                <span><b>{{ monthData.outqty }} {{ monthData.uom }}</b></span>
                                                                <br>
                                                                <span ng-show="monthData.return_qty"><b>(-)</b><b>{{ monthData.return_qty }}</b> {{ monthData.uom }}</span>
                                                            </td>
                                                            <td ng-if="monthData.name == 'grand_totals'">
                                                                <span><b>{{ monthData.outvalue | indianCurrency}}</b></span>
                                                            </td>
                                                            <td ng-if="monthData.name !== 'grand_totals'">
                                                                <span><b>{{ monthData.outvalue | indianCurrency}}</b></span>
                                                                <br>
                                                                <span ng-show="monthData.return_value"><b>(-)</b><b>{{ monthData.return_value | indianCurrency}}</b> </span>
                                                            </td>

                                                            <td><b>{{ monthData.closing_qty }} {{ monthData.uom }}</b></td>
                                                            <td><b>{{ monthData.closing_value | indianCurrency}}</b></td>
                                                        
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
        </div>
    </div>
</div>

<script>
var app = angular.module('crudApp', ['datatables']);

app.filter('number', function () {        
    return function (input) {
        if (! isNaN(input)) {
            var currencySymbol = '';
            var absoluteValue = Math.abs(input);
            //var output = Number(input).toLocaleString('en-IN');   <-- This method is not working fine in all browsers!           
            var result = absoluteValue.toString().split('.');

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

app.filter('indianCurrency', function () {
    return function (input) {
        if (isNaN(input)) return input;
        return input.toLocaleString('en-IN', { maximumFractionDigits: 2 });
    };
});

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;
  $scope.getproductval = 'ALL';
  $scope.diffrence_data="";
  $scope.total="";

  $scope.fetchDatagetlegderGroup = function () {
    var id = <?php echo $id; ?>;
    var fromto = $('#to-date').val();
   
    $scope.opentotqty = 0;
    $scope.opentotval = 0;


    $http.get('<?php echo base_url() ?>index.php/report_new/weighted_product_list_val?id=' + id).success(function (data) {
        $scope.query = {}
        $scope.queryBy = '$';

        if (angular.isDefined(data) && typeof data === 'object') {
            // Convert the data object into an array for sorting
            var dataArray = [];
            for (var month in data) {
                if (data.hasOwnProperty(month)) {
                    var monthData = data[month];
                    monthData.name = month; // Add the month name to the data
                    dataArray.push(monthData);
                }
            }

            // Sort the dataArray
            dataArray.sort(function (a, b) {
                return a.order - b.order;
            });

            // Update your scope variable with the sorted data
            $scope.namesDataledgergroup = dataArray;
        }
    });
};

  $scope.fetchDatagetlegderGroup();

});

</script>

    <?php include ('footer.php'); ?>
</body>



