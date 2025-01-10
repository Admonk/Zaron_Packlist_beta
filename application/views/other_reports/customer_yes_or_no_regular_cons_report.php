<?php include "header.php";

function getCurrentFinancialYear($add = false)
{
    $currentMonth = date('n');
    $currentYear = date('Y');
    $startMonth = 4;
    if ($currentMonth < $startMonth) {
        $financialYear = ($currentYear - 1) % 100;
    } else {
        $financialYear = $currentYear % 100;
    }
    if ($add) {
        return $financialYear;
    } else {
        return $financialYear;
    }
}

?>

<style>
    .trpoint {

        cursor: pointer;

    }
.pill {
            padding: 5px 10px;
    background-color: #ff5e14;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    width: max-content;
    margin: 5px;
    font-size: 11px;
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

    .loading {
        text-align: center;
    }

    .trpoint:hover {
        background: antiquewhite;
    }

    .card-header {
        display: block;
        text-align: center;
    }

    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {

        border-width: inherit;
    }

    table.table1 {
        width: 100%;
        /* padding: 17px; */
    }

    table.table1 th {
        padding: 5px 10px;
        text-align: center;
        font-size: small;
    }

    table.table1 td {
        padding: 5px 12px;
    }

    table.table1 tr {
        font-size: 10px;
    }

    .table-responsive {
        height: 750px;
        /*cursor: all-scroll;*/
    }

    [onclick] {
        cursor: pointer;
    }

    tbody tr :hover {
        background-color: #cfcfcf20;
    }

    .closed {
      display: none;
    }
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
        <?php echo $top_nav;






        $currentDateFin = new DateTime(date('Y-m-01', strtotime(date('Y-m-d'))));
        $currentMonth = (int)$currentDateFin->format('m');
        $currentYear = (int)$currentDateFin->format('Y');
        $financialYearStartMonth = 4;
        if ($currentMonth >= $financialYearStartMonth) {
            $startYear = $currentYear;
        } else {
            $startYear = $currentYear - 1;
        }

        ?>
















        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18"> Customer Area YES or NO Report</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active"> Customer Area YES or NO Report !</li>
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
                                           
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-4"> <!--data-trigger -->
                                                        <select class="filter-multi-select" name="states[]" multiple="multiple" id="sales_group_target">
                                                            <option value="All">All Areas</option>
                                                            <?php
                                                            function sortByName($a, $b)
                                                            {
                                                                return strcmp($a, $b);
                                                            }
                                                            usort($customers, 'sortByName');


                                                            foreach ($customers as $val) {
                                                            ?>
                                                                <option   value="<?php echo  ($val); ?>"><?php echo $val; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
 
<div class="col" style="align-self: center;">
                                                <div class="form-check">
                                                        <input type="checkbox" ng-click="search()" name="status" id="filterStatus" class="primary">
                                                      <label class="control-label" for="filterStatus">Show Zero Sales</label>

                                                        </div>
                                                </div>


                                                    <div class="col">
                                                        <!-- <label for="from-month" class="form-label">From : </label> -->
                                                        <input type="month" class="form-control exclude" id="from-date" value="<?= $startYear ?>-04">
                                                    </div>
                                                    <div class="col">
                                                        <!-- <label for="to-month" class="form-label">To : </label> -->
                                                        <input type="month" class="form-control exclude" id="to-date" value="<?= $startYear + 1 ?>-03" max="<?=date('Y-m')?>">
                                                    </div>

                                                    <div class="col">
                                                        <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>

                                                        <button type="button" class="btn btn-success waves-effect waves-light"   id="exportdata">Export</button>
                                                    </div>

                                                </div>
                                            </form>



<!-- 
 <p>Areas Shown :</p><b id="areasList" style="display:flex"></b>
  <nav aria-label="Page navigation"     style="margin-left: 5px;">
      <ul class="pagination" id="pagination"></ul>
    </nav> -->
<!-- <div class="btn-group" role="group" aria-label="Basic outlined example">
     <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
  <label class="btn btn-outline-primary" ng-click="areaMode=1" for="btnradio1">With Area</label>

  <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
  <label class="btn btn-outline-primary"  ng-click="areaMode=0"  for="btnradio2">Without Area</label>
    
 
</div> -->




                                            <div id="search-view">


                                                <div class="card-header" ng-init="fetchSingleData(0)">

                                                    <h4 class="card-title"> Customer Area YES or NO Report</h4>

                                                <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." id="searchBox">
                                                     
                                                </div>


                                                <div class="table-responsive">


                                                    <table class="table1" border="1" ng-init="fetchDatagetlegderGroup('ALL')">
                                                        <thead>
                                                            <tr style="position: sticky;top: 0;background: #dfdfdf;">


                                                                <th>No</th>
                                                                <th>Sales Person</th>

                                                                <th>Phone</th>
                                                                <th>Customer Name</th>

                                                                <th>Competitor</th>
                                                                <th>Open/Close</th>
                                                                <th>C</th>
                                                                <th>Q</th>
                                                                <th>P</th>
                                                                <th>S</th>
                                                                <th>F</th>

                                                               
                                                                <th>S.A</th>
                                                                <th>B.A</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr>
                                                                <td colspan="26">
                                                                    <loading></loading>
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
                <!-- container-fluid -->


            </div>
            <!-- End Page-content -->









        </div>
    </div>




    <script>
     
        $(document).ready(() => {
 


            $('#sales_group_target').on('click', () => {
                $('input.custom-control-input[value=""]').parent().remove();
            })
        })

        Date.prototype.getMonthDays = function() {
            return new Date(this.getFullYear(), this.getMonth() + 1, 0).getDate();
        };

        function showOrders(orderIds) {

            let fromDate = $('#from-date').val();
            let toDate = $('#to-date').val();
            let fromDateYMD = fromDate + '-01';
            let toDateYMD = toDate + '-01';

            let fromDateYMT = fromDate + '-' + new Date(fromDate + '-01').getMonthDays();
            let toDateYMT = toDate + '-' + new Date(toDate + '-01').getMonthDays();
            let path = '?base=0';

            orderIds = btoa(orderIds);
            path += '&orders=' + orderIds + '&fromDate=' + fromDateYMD + '&toDate=' + toDateYMT;
            if (orderIds !== null) {
                let url = 'index.php/order/orders_list' + path;
                window.open('<?= base_url() ?>' + url, '_blank');
            }


        }

           function showContent(head,sl) {
 
          // console.log(sl,head);
            // if(sl){
                if($(`tr[data-c-head="${head}"]`).attr('data-opened') == 0){
          $(`tr[data-c-head="${head}"]`).show();
          // $(`tr[data-c-head="${head}"]`).parent().('background-color','#cfcfcf');
          $(`tr[data-c-head="${head}"]`).attr('data-opened',1);

                }else{
                      $(`tr[data-c-head="${head}"]`).hide();
          $(`tr[data-c-head="${head}"]`).attr('data-opened',0);
                }

        // }else{
        //   $(`tr[data-c-head="${head}"]`).hide();

        // }
        }


        $(document).ready(function() {


            $('#payment_mode_payoff').on('change', function() {

                var val = $(this).val();

                if (val == 'Cash') {
                    $('#res_no').hide();
                } else {
                    $('#res_no').show();
                }

            });


       


        });
    </script>

    <?php
    if ($this->session->userdata['logged_in']['access'] == '12') {

        $userslog = $this->session->userdata['logged_in']['userid'];
    } else {
        $userslog = 'ALL';
    }

    ?>

    <script>
        const slider = document.querySelector('.table-responsive');
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.classList.add('active');
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });
        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.classList.remove('active');
        });
        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('active');
        });
        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 3; //scroll-fast
            slider.scrollLeft = scrollLeft - walk;
            console.log(walk);
        });

        var app = angular.module('crudApp', ['datatables']);
        app.filter('number', function() {
            return function(input) {
                if (!isNaN(input)) {
                    var currencySymbol = '? ';
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

        app.controller('crudController', function($scope, $http) {

            $scope.success = false;
            $scope.error = false;
            $scope.getproductval = '<?php echo $userslog; ?>';
            $scope.areaMode = 1;
            // $scope.formdate = '<?php echo date('Y-m-d', strtotime("-1 days")); ?>';
            // $scope.todate = '<?php echo date('Y-m-d'); ?>';



            $scope.getProduct = function() {
                var cate_id = $('#choices-single-default').val();;

                $scope.productlist(cate_id);

            };
     $('#exportdata').on('click', function() {


                var cateid = $('#choices-single-default').val();
                var userid = "<?php echo $this->session->userdata['logged_in']['userid']; ?>";
                var access = "<?php echo $this->session->userdata['logged_in']['access']; ?>";
 var status = $('#filterStatus') && $('#filterStatus').is(':checked') ?   $('#filterStatus').is(':checked') : false;
                if (access == 12) {

                    if (userid != 1) {
                        cateid = userid;
                    }


                }

               var getJson = function(b) {
                    var result = $.fn.filterMultiSelect.applied.map((e) => JSON.parse(e.getSelectedOptionsAsJson(b)));
                    if (result.length > 0) {
                        result.reduce((prev, curr) => {
                            prev = {
                                ...prev,
                                ...curr,
                            };
                            return prev;
                        });
                        return result;
                    } else {
                        let res;
                        res = [{
                            'states[]': ['All']
                        }];
                        return res;
                    }

                }

                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var sales_brand = getJson(true);
                if (sales_brand[0]['states[]'] && sales_brand[0]['states[]'].includes('All')) {
                    cateid = 'All';
                } else {
                    cateid = sales_brand[0]['states[]'] && sales_brand[0]['states[]'].map((el) => {
                        return '"' + encodeURIComponent(el) + '"';
                    }).join(',');
                }

                if (cateid == '') {
                    cateid = 'All';
                }
                var searchVal = $('#searchBox').val();

                url = '<?php echo base_url() ?>index.php/other_reports/fetch_data_get_customer_yes_no_cons_order_report_export?limit=10&cate_id=' + cateid + '&formdate=' + fromdate + '&todate=' + fromto + '&searchVal=' + searchVal  + '&status=' + status + '&areaMode=' + $scope.areaMode;
                location = url;

            });
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

                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();

  let dateData = fromdate.split('-')[0].slice(-2);
  let dateDataTo = fromto.split('-')[0].slice(-2);


     $('.first-year').text(Number(dateData));
     if(dateData == dateDataTo){
     $('.second-year').text(Number(dateData));

 }else{
     $('.second-year').text(Number(dateData) + 1);

 }

                $('#search-view').show();
                $('#exportdata').show();

                $scope.fetchDatagetlegderGroup(cateid);



            };

            let typingTimer;
            let isTimerActive = false;

            $('#searchBox').on('input', () => {
                $scope.search();
            })

            // $('#searchBox').on('keyup', () => {
            //   clearTimeout(typingTimer);
            //    isTimerActive = false;
            //    })

            function createDummyArray(n) {
    let dummyArray = [];
    for (let i = 0; i < n; i++) {
        dummyArray.push(i);
    }
    return dummyArray;
}

// Usage
let n = 5;
let dummyArray = createDummyArray(n);



  $scope.currentPage = 1;

//    $(document).ready(function() {
//   var content = $('#content');
//   var pagination = $('#pagination');
//   var items = createDummyArray(335); // Your array of items to paginate

//   $scope.currentPage = 1;
//   var itemsPerPage = 5;

//   function displayList(items, wrapper, itemsPerPage, page) {
//     wrapper.empty();
//     page--;

//     var start = itemsPerPage * page;
//     var end = start + itemsPerPage;
//     var paginatedItems = items.slice(start, end);

//     for (var i = 0; i < paginatedItems.length; i++) {
//       wrapper.append('<li class="list-group-item">' + paginatedItems[i] + '</li>');
//     }
//   }

//   function setupPagination(items, wrapper, itemsPerPage) {
//     wrapper.empty();
//     var pageCount = Math.ceil(items.length / itemsPerPage);

//     var startPage = Math.max($scope.currentPage - 2, 1);
//     var endPage = Math.min($scope.currentPage + 2, pageCount);

//     if (startPage > 1) {
//       wrapper.append('<li class="page-item"><a class="page-link" href="#" data-page="1">First</a></li>');
//       wrapper.append('<li class="page-item"><span class="page-link">...</span></li>');
//     }

//     for (var i = startPage; i <= endPage; i++) {
//       wrapper.append('<li class="page-item' + (i === $scope.currentPage ? ' active' : '') + '"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>');
//     }

//     if (endPage < pageCount) {
//       wrapper.append('<li class="page-item"><span class="page-link">...</span></li>');
//       wrapper.append('<li class="page-item"><a class="page-link" href="#" data-page="' + pageCount + '">Last</a></li>');
//     }

//     wrapper.find('a[data-page]').on('click', function(e) {
//       $scope.currentPage = parseInt($(this).data('page'));
//         var cateid = $('#choices-single-default').val();
//  $scope.fetchDatagetlegderGroup(cateid)

//       // displayList(items, content, itemsPerPage, currentPage);
//       setupPagination(items, pagination, itemsPerPage);
//       e.preventDefault();
//     });
//   }

//   // displayList(items, content, itemsPerPage, currentPage);
//   setupPagination(items, pagination, itemsPerPage);
// });

 $('.table').on('hover', function() {
        // Your scroll event handling logic here
        $('thead').css('visibility','');
    });


    $('.btn-check').on('click', function(e) {
            $scope.currentPage = parseInt($(this).data('page'));
            var cateid = $('#choices-single-default').val();
            $scope.fetchDatagetlegderGroup(cateid)
    });

function toIndi(input){
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
    
            $scope.fetchDatagetlegderGroup = function(cateid) {

                var userid = "<?php echo $this->session->userdata['logged_in']['userid']; ?>";
                var access = "<?php echo $this->session->userdata['logged_in']['access']; ?>";
                var searchVal = $('#searchBox').val();
                // var status = $('#filterStatus') && $('#filterStatus').is(':checked') ?   $('#filterStatus').is(':checked') : false;
                var status = $('#filterStatus') && $('#filterStatus').is(':checked') ?   $('#filterStatus').is(':checked') : false;


                var getJson = function(b) {
                    var result = $.fn.filterMultiSelect.applied.map((e) => JSON.parse(e.getSelectedOptionsAsJson(b)));
                    if (result.length > 0) {
                        result.reduce((prev, curr) => {
                            prev = {
                                ...prev,
                                ...curr,
                            };
                            return prev;
                        });
                        return result;
                    } else {
                        let res;
                        res = [{
                            'states[]': ['All']
                        }];
                        return res;
                    }

                }

                $scope.loading = true;
                var fromdate = $('#from-date').val();
                var fromto = $('#to-date').val();
                var sales_brand = getJson(true);
                if (sales_brand[0]['states[]'] && sales_brand[0]['states[]'].includes('All')) {
                    cateid = 'All';
                } else {
                    cateid = sales_brand[0]['states[]'] && sales_brand[0]['states[]'].map((el) => {
                        return '"' + encodeURIComponent(el) + '"';
                    }).join(',');
                }

                if (cateid == '') {
                    cateid = 'All';
                }
                $http.get('<?php echo base_url() ?>index.php/other_reports/fetch_data_get_customer_yes_no_cons_order_report?limit=10&cate_id=' + cateid + '&formdate=' + fromdate + '&todate=' + fromto + '&searchVal=' + searchVal + '&status=' + status + '&areaMode=' + $scope.areaMode).success(function(data) {
                    $('tbody').empty();

                    $scope.query = {}
                    $scope.queryBy = '$';

                    console.log(data);
                    // $scope.namesDataledgergroup = data;
                    $('#areasList').html('');
                    const areaList = $('#areasList');
    //                 if(data['ignore'] != null){
    //                      const areaListNow = data['ignore'].replace(/'/g, '');
                    

    //                 areaListNow.split(', ').forEach(area => {
    //                     const pill = document.createElement('div');
    //                     pill.classList.add('pill');
    //                      pill.addEventListener('click', () => {
    //     // Find the element with the corresponding id
    //     const element = document.getElementById(area);
    //     if (element) {
    //         // Scroll to the element
    //     // window.scrollBy(0, 100);
    //         element.scrollIntoView({ behavior: 'smooth' });
    //     }

    //         $('thead').css('visibility','hidden');

    //     // element.scrollBy(0, 100);
    // });
    //                     pill.textContent = area;
    //                     areaList.append(pill);
    //                 });

    //                 }
                     if(data['ignore'] != null){
                        let heads ;
                        $('.customerheads').remove()
                        data['ignore'].map((el) => {
                                heads+='<th class="customerheads">'+el.month+'<br/>'+el.year+'</th>';
                        });

                        console.log("heads",heads)

                        $('.table1 th:nth-child(11)').after(heads)
                     }



                   let i = 1;
                   Object.keys(data) && Object.keys(data).map((item, index) => {
                         if(item != 'ignore'){

                             let html = ` <tr id="${item}" onclick="showContent('${item}')">
                                <td colspan="11" class="text-start" style="font-size: larger;">    
                                <b>${item}</b> - ${data[item]['stats']['orders']} Order${data[item]['stats']['orders'] > 1 ? 's' : ''} from (${data[item]['stats']['customers']} Customer${data[item]['stats']['customers'] > 1 ? 's' : ''})</td>`;


 data['ignore'].map((el) => {
// console.log("data[item][names]",)
// if(data[item][names]  ){
    html+=`<td> <b>${data[item]['stats']['counts'][el.monthFull] ? 'YES ('+data[item]['stats']['counts'][el.monthFull]+')' : ''}</b></td>`;
// }else{
    // html+=`<td  > </td>`;
// }

                                
                        });

 html+=`<td  > <b>${toIndi(data[item]['stats']['sa']) }</b></td>`;
 html+=`<td  > <b>${(data[item]['stats']['ba']).toFixed(2) }</b></td>`;



                            html += `</tr>`;


                          Object.keys(data[item]).map((names, index) => {
if(names != 'stats'){
     html += ` <tr style="display: none;" data-opened="0" class="customers"  data-c-head="${item}"  >
                           <td>${i}</td>
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id=${data[item][names].customer_id}" target="_blank">${data[item][names].sales_member}</a></td>
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id=${data[item][names].customer_id}" target="_blank">${data[item][names].customerphone}</a></td>
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id=${data[item][names].customer_id}" target="_blank" >${data[item][names].customername}</a></td>
                            <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id=${data[item][names].customer_id}" target="_blank">${data[item][names].competitor}</a></td>
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id=${data[item][names].customer_id}" target="_blank">${data[item][names].factory_workshop}</a></td>
                          <td>${data[item][names].cc}</td>
                          <td>${data[item][names].pp}</td>
                          <td>${data[item][names].dd}</td>
                          <td>${data[item][names].qq}</td>
                          <td>${data[item][names].rr}</td>`;

                    if(data['ignore'] != null){
                        let bodies = '' ;
                        // $('.customerheads').remove()
                        // if()
                        data['ignore'].map((el) => {
// console.log("data[item][names]",)
if(data[item][names]  ){
    bodies+=`<td onclick="showOrders('${data[item][names][el.monthFull+'_orders']}')">${data[item][names][el.monthFull] ? data[item][names][el.monthFull] : ''}</td>`;
}else{
    bodies+=`<td  > </td>`;
}

                                
                        });

                        // console.log("heads",bodies)

                        html += bodies;
                     }
                        
                          html += `<td>${toIndi(data[item][names].sa)}</td>
                           <td>${data[item][names].ba}</td>
                          
                        </tr>`;
                        i++;
                            // })
}

                        //     html += ` <tr class="closed salespersons" data-sl-section="${item}" onclick="showContent('${item}','${names}')">
                        //    <td colspan="26" class="text-start" style="font-size: larger;">&nbsp;Sales Person - <b>${names}</b>
                        //     </td>
                        // </tr>`;

                            // Object.keys(data[item][names]).map((namesc, index) => {
                       

                        });
                        $('tbody').append(html);

                         }
 // $(`tr[data-c-head]`).hide();
                       
                    })



                    $scope.loading = false;


                });


            };











        });
    </script>
    <?php include('footer.php'); ?>
</body>