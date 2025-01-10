<?php include "header.php";


$theads = ["S.NO", "NAME", "ACCESSORIES", "ALUMINIUM", "CLEAT & SAGROD & L ANGLE & Z ANGLE", "DECKING SHEET", "EXTRA SHEET & ARCH", "FAN & BASE", "SHEET", "MULTI WALL", "POLY CARBONATE", "POLYNUM & XLPE", "PROFILE RIDGE & ARCH", "PUFF PANELS", "PURLIN", "SCREW", "SCREWS ACCESSORIES", "TILE SHEETS", "UPVC ITEMS", "STANDING SEAM", "STANDING SEAM CLIPS", "ROCK WOOL", "CONVERSION", "RENT", "HR PLATE", "LINER SHEET", "WALL SHEET"];

$uoms = "R.FT, SQ.MTR, KG, SQ.MTR, SQ.MTR, NOS, SQ.MTR, SQ.MTR, SQ.MTR, SQ.FT, SQ.MTR, SQ.MTR, KG, NOS, NOS, SQ.MTR, NOS, SQ.MTR, NOS, SQ.MTR,, NOS, KG, SQ.MTR, SQ.MTR";
$uoms = explode(",", $uoms);

$lineData = array(
    array("field_name" => "accessories", "cat_id" => 1),
    array("field_name" => "aluminium", "cat_id" => 36),
    array("field_name" => "cleat", "cat_id" => 41),
    array("field_name" => "decking_sheet", "cat_id" => 34),
    array("field_name" => "extra_sheet_arch", "cat_id" => 582),
    array("field_name" => "fan_base", "cat_id" => 17),
    array("field_name" => "sheet", "cat_id" => 3),
    array("field_name" => "multi_wall", "cat_id" => 20),
    array("field_name" => "poly_corbonate", "cat_id" => 19),
    array("field_name" => "polynum", "cat_id" => 13),
    array("field_name" => "profile_ridge_arch", "cat_id" => 32),
    array("field_name" => "puff_panels", "cat_id" => 30),
    array("field_name" => "purlin", "cat_id" => 5),
    array("field_name" => "screw", "cat_id" => 7),
    array("field_name" => "screw_accessories", "cat_id" => 9),
    array("field_name" => "tile_sheet", "cat_id" => 26),
    array("field_name" => "upvc_item", "cat_id" => 15),
    array("field_name" => "standing_seam", "cat_id" => 603),
    array("field_name" => "standing_seam_clips", "cat_id" => 604),
    array("field_name" => "rock_wool", "cat_id" => 11),
    array("field_name" => "conversion", "cat_id" => 581),
    array("field_name" => "rent", "cat_id" => 584),
    array("field_name" => "hr_plate", "cat_id" => 631),
    array("field_name" => "liner_sheet", "cat_id" => 590),
    array("field_name" => "wall_sheet", "cat_id" => 20)
)
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

    td {
        display: table-cell;
        border: 1px solid #e0e0e0;
        padding: 0px 4.5px;
        line-height: 2.428571;
        margin-left: 0px;
        vertical-align: middle;
        font-size: 15px;
        text-align: center;
        /* height: 50px; */
    }


    .loading {
        text-align: center;
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
                                <h4 class="mb-sm-0 font-size-18"></h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Sale Product Report</li>
                                    </ol>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="container-fluid">

                                <div class="row" style="margin: 13px 0px;">
                                    <div class="col-6 mb-2">
                                        <div class="page-title-box d-sm-flex align-items-center justify-content-between p-0">
                                            <h4 class="mb-sm-0 font-size-18">Sale Product Report</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <form>
                                            <div class="row">

                                                <div class="col"> <!--data-trigger -->
                                                    <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                                                        <?php
                                                        if ($this->session->userdata['logged_in']['access'] != '12') {
                                                        ?>
                                                            <option value="ALL">All Sales Team</option>
                                                        <?php
                                                        }
                                                        ?>

                                                        <?php
                                                        foreach ($customers as $val) {
                                                            if ($val->status == 1) {
                                                                if ($this->session->userdata['logged_in']['access'] == '12') {
                                                                    if ($this->session->userdata['logged_in']['userid'] == $val->id) {

                                                        ?>
                                                                        <option value="<?php echo $val->id; ?>" seletced><?php echo $val->name; ?></option>
                                                                    <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                        <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col">
                                                    <select class="form-control" id="sales_group">
                                                        <option value="ALL">All Sales Group</option>
                                                        <?php
                                                        foreach ($sales_group as $vals) {
                                                        ?>
                                                            <option value="<?php echo $vals->id; ?>"><?php echo $vals->name; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col">
                                                    <input type="date" class="form-control" id="from-date" min="<?php echo date('2023-10-01'); ?>" value="<?php echo date('Y-m-01'); ?>">
                                                </div>
                                                <div class="col">
                                                    <input type="date" class="form-control" id="to-date" min="<?php echo date('2023-10-01'); ?>" value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                                <div class="col"  style="align-self: center;">
                                                <div class="form-check">
                                                        <input type="checkbox"   name="status" id="filterStatus" class="primary">
                                                      <label class="control-label" for="filterStatus">Show Inactive</label>

                                                        </div>
                                                </div>
                                                <div class="col">
                                                    <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>

                                                    <!-- <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata">Export</button> -->
                                                </div>
                                               
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card shadow-none">
                                                    <div class="card-body">

                                                        <div class="table-responsive table-container" style="height: 700px;" ng-init="fetchSalesProductReportData(0,0)">
                                                            <table>
                                                                <!-- tHead -->
                                                                <thead>
                                                                    <tr>
                                                                        <?php
                                                                        foreach ($theads as $key => $heading) {
                                                                            $styles = '';
                                                                            if ($key == 0) {
                                                                                $styles = "position: sticky; left: 0; z-index: 2; top: 0;";
                                                                            } elseif ($key == 1) {
                                                                                $styles = "padding: 0px 100px;position: sticky; left: 150px; z-index: 2;top: 0;";
                                                                            }
                                                                        ?>
                                                                            <th style="position: sticky;min-width: 150px;<?= $styles ?> top:0px;">
                                                                                <?php echo $heading; ?>
                                                                            </th>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </tr>
                                                                    <tr>
                                                                        <th style="position: sticky; left: 0; z-index: 3; top: 50px;"></th>
                                                                        <th style="min-width: 150px;position: sticky; left: 150px; z-index: 3;top: 50px;">Unit of Measures</th>
                                                                        <?php
                                                                        foreach ($uoms as $key => $item) {

                                                                        ?>
                                                                            <th style="position: sticky;min-width: 150px;white-space: nowrap;top: 50px;"><?= $item ?></th>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </tr>
                                                                </thead>
                                                                <!-- tHead -->
                                                                <!-- tbody All Sales Group -->
                                                                <tbody ng-repeat="entry in salesData" data-sales-id="{{entry['id']}}">
                                                                </tbody>

                                                                <tbody>

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
    </div>
    <script>
        $(document).ready(() => {


        })


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


        app.directive('salesBlock', function($parse) {

            console.log("$parse", $parse)

            return {
                // restrict: 'E',
                // replace: true,
                // transclude: true,
                template: component,
            }
        })


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

        app.controller('crudController', function($scope, $http) {
            $(document).on("dblclick", ".editable", function(e) {
                var $this = $(this);
                let prevVal = $this.text().trim();
                // Create an input element
                var $input = $('<input>', {
                    type: 'text',
                    value: $this.text().trim(),
                    style: 'width: 50px;margin: 5px;',
                    class: 'newIp form-control'
                });

                $this.html($input);

                $input.focus();

                $input.on('blur', function() {
                    var newValue = $input.val();
                    $this.text(newValue);

                    const formdata = {
                        salesman_id: $this.attr('data-sales-id'),
                        modified_value: newValue,
                        cate_id: $this.attr('data-field'),
                    }

                    console.log("formdata", formdata);
                    if (prevVal != newValue) {
                        $http.post('<?php echo base_url() ?>index.php/other_reports/changeReportValues', formdata)
                            .then(function(response) {
                                console.log('POST request successful:', response.data);
                                 $scope.search()
                            })
                            .catch(function(error) {
                                console.error('POST request error:', error);
                            });
                    }

                });




            });
            // $scope.salesData = ['TUP Team', 'Sales Team', 'Shop Team', 'Cbe Team', 'Project Team A', 'Project Team B'];
            $scope.salesData = [];
            $scope.search = function() {
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var status = $('#filterStatus') && $('#filterStatus').is(':checked') ?   $('#filterStatus').is(':checked') : false;

                $scope.formdate = fromdate;
                $scope.todate = fromto;

                // $('#search-view').show();
                // $('#search-view1').hide();
                // $('#exportdata').show();
                var cateid = $('#choices-single-default').val();
                var sales_group = $('#sales_group').val();



                $scope.fetchSalesProductReportData(cateid, sales_group,status);
            };

            $scope.fetchSalesProductReportData = function(cateid, sales_group,status) {

                // $('.setload').show();
                $scope.loading = true;
                var customer_id = '<?php echo $customer_id;  ?>';
                var order_status = 1;
                var payment_mode = 1;
                var productid = 1

                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();

                $http.get('<?php echo base_url() ?>index.php/other_reports/fetch_data_sales_product_report?limit=10&formdate=' + fromdate + '&todate=' + fromto + '&sales_group=' + sales_group + '&order_status=' + cateid+'&active_status=' + status).success(function(data) {

                    $('tbody[data-sales-id]').html('');
                    $('tbody').last().html('');
                    $scope.query = {}
                    $scope.queryBy = '$';
                    $scope.salesData = data[0];
                        function formatNumber(number) {
                            var result = number.toString().split('.');
                            var lastThree = result[0].substring(result[0].length - 3);
                            var otherNumbers = result[0].substring(0, result[0].length - 3);
                            if (otherNumbers != '')
                                lastThree = ',' + lastThree;
                            var output = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;

                            if (result.length > 1) {
                                output += "." + result[1];
                            }

                            return output;
                        }
                    let gTotalsData = data['totals'];
                    data[0].map((el) => {
                        let teamGroupId = el.sales_team_id;
                        let component = '';

                        component += `<tr class="primary" style="overflow:scroll;background-color:#FFD966;">
                                                                        <td colspan="2" style="position: sticky; left: 0; top: 0; z-index: 1;background-color:#FFD966;box-shadow: inset 1px 0px 0px 2px #e0e0e0;"><b>${el.sales_group_name}</b></td>
                                                                        <td colspan="<?= count($lineData) ?> ">
                                                                            
                                                                        </td>
                                                                    </tr>`



                        el.salesperson && el.salesperson.map((el1, i) => {
                            // console.log("el1: ",el1.sales_data.find((el) => { el.field_name == 'accessories' }).field_name);
                            component += `<tr>

<td class="bg-white" style="position: sticky; left: 0; z-index: 1;"></td>
<td class="bg-white text-danger text-bold" style="min-width: 150px;position: sticky; left: 150px; z-index: 1;">
    <b>  Target</b>
</td>
<?php
foreach ($lineData as $item) {

?>
     
    <td ><div data-sales-id="${el1.sales_team_id}" data-field="<?= $item['cat_id'] ?>" class="editable">${formatNumber(el1.sales_data.find(item => item.field_name == "<?= $item['field_name'] ?>" )['target'])}</div></td>
<?php
}
?>

</tr>
 <tr>
                                <td class="bg-white" style="position: sticky; left: 0; z-index: 1;"></td>
                                <td class="bg-white" style="min-width: 150px;position: sticky; left: 150px; z-index: 1;"> <b>${el1.sales_person_name}</b></td>
                                <?php
                                foreach ($lineData as $key => $item) {

                                ?>
                                    <td style="min-width: 150px;white-space: nowrap;">${formatNumber(el1.sales_data.find(item => item.field_name == '<?= $item['field_name'] ?>' )['actual'])}</td>
                                <?php
                                }
                                ?>

                                </tr>



                                <tr>
                                <td class="bg-white" style="position: sticky; left: 0; z-index: 1;"></td>
                                <td class="bg-white" style="min-width: 150px;position: sticky; left: 150px; z-index: 1;">Required Target</td>
                                <?php
                                foreach ($lineData as $key => $item) {

                                ?>
                                    <td class="text-info" style="min-width: 150px;white-space: nowrap;">${formatNumber(el1.sales_data.find(item => item.field_name == '<?= $item['field_name'] ?>' )['required_target'])}</td>
                                <?php
                                }
                                ?>

                                </tr>
                                <tr>
                                <td class="bg-white" style="position: sticky; left: 0; z-index: 1; border-bottom:1px solid #000;"></td>
                                <td class="bg-white" style="min-width: 150px;position: sticky; left: 150px; z-index: 1; border-bottom:1px solid #000;"></td>
                                <?php
                                foreach ($lineData as $key => $item) {
                                   
                                ?>
                                    <td class="${el1.sales_data.find(item => item.field_name == '<?= $item['field_name'] ?>' )['status'] ? 'text-success' : 'text-danger'}" style="min-width: 150px;white-space: nowrap; border-bottom:1px solid #000;">${el1.sales_data.find(item => item.field_name == '<?= $item['field_name'] ?>' )['status'] ? 'AHEAD' : 'UNDER TARGET'}</td>
                                <?php
                                }
                                ?>

                                </tr>`;


                            // console.log(el)

                        })




                        component += `<tr style="overflow:scroll;background-color:#cbffd3">
                                                                            <td style="position: sticky; left: 0; z-index: 1;background-color:#cbffd3"></td>
                                                                            <td style="min-width: 150px;position: sticky; left: 150px; z-index: 1;background-color:#cbffd3">TARGET TOTAL</td>
                                                                            <?php
                                                                            foreach ($lineData as $key => $item) {

                                                                            ?>
                                                                                <td class="text-dark" style="min-width: 150px;white-space: nowrap;">
                                                                                ${el.totals.find(item => item.cat_id == '<?= $item['cat_id'] ?>' )['target_total']}
                                                                                </td>
                                                                            <?php
                                                                            }
                                                                            ?>

                                                                        </tr>
                                                                        <tr style="overflow:scroll;background-color:#efefef">
                                                                            <td   style="background-color:#efefef;position: sticky; left: 0; z-index: 1; border-bottom:1px solid #000;"></td>
                                                                            <td  style="background-color:#efefef;min-width: 150px;position: sticky; left: 150px; z-index: 1; border-bottom:1px solid #000;">TOTAL</td>
                                                                            <?php
                                                                            foreach ($lineData as $key => $item) {
                                                                            ?>
                                                                                <td style="min-width: 150px;white-space: nowrap; border-bottom:1px solid #000;">
                                                                                ${el.totals.find(item => item.cat_id == '<?= $item['cat_id'] ?>' )['actual_total']}
                                                                                 </td>
                                                                            <?php
                                                                            }
                                                                            ?>

                                                                        </tr>`;

                        $('tbody').attr('data-sales-id', teamGroupId).append(component);


                    })

                    // }, 1000)
                    let gTotals = `<tr style="overflow:scroll;background-color:#efefef">
                                                                        <td style="background-color:#efefef;position: sticky; left: 0; z-index: 1; border-bottom:1px solid #000;"></td>
                                                                        <td style="background-color:#efefef;min-width: 150px;position: sticky; left: 150px; z-index: 1; border-bottom:1px solid #000;"><b>GRAND TOTAL</b></td>
                                                                        <?php
                                                                        foreach ($lineData as $key => $item) {
                                                                        ?>
                                                                            <td class="text-danger" style="min-width: 150px;white-space: nowrap; border-bottom:1px solid #000;"><b>
                                                                            ${gTotalsData.find(item => item.cat_id == '<?= $item['cat_id'] ?>' )['actual_total']}
                                                                            
                                                                            </b></td>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </tr>`;
                    $('tbody').last().append(gTotals);
                    $scope.loading = false;
                    $('.setload').hide();

                });

            }


        });
    </script>
  



    <?php include('footer.php'); ?>
</body>