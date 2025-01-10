<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
      div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
}

.trpoint {
    
    cursor: pointer;
   
}
th {
    padding: 10px 5px;
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

div#showdata {
    margin-top: 25px;
    margin-bottom: 20px;
    display: none;
}
.ui-widget.ui-widget-content {
    border: 1px solid #d3d3d3;
    z-index: 999999;
}
.table-bordered {
    border: 1px solid #e9e9ef;
    table-layout: fixed;
}

.table>tbody {
    vertical-align: middle;
}
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
        <?php echo $top_nav; ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <div class="row" style="margin: 10px;">
                        <div class="col-6">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between p-0">
                                <h4 class="mb-sm-0 font-size-18">Log details <?php echo $order_no; ?></h4>
                            </div>
                        </div>

                        <div class="col-6">
                            
                        </div>
                        <hr>
                    <div class="row">
                        <div class="col-12">
                            <!-- <div class="row">
                                <div class="col-m-12">
                                    <div class="card mb-1">
                                        <div class="card-header align-items-start d-flex p-3">
                                            <div class="flex-shrink-0">
                                                <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs"
                                                    role="tablist">

                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#profile2"
                                                            role="tab" ng-click="pageTab('order_sales_complaints',0)">
                                                            <span class="d-block d-sm-none"><i
                                                                    class="far fa-user"></i></span>
                                                            <span class="d-none d-sm-block"><?php echo $order_no; ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">

                                <div class="col-12">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="table-responsive">

                                                <table class="table align-middle table-nowrap newBorderedTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Order id</th>
                                                            <th>Order No</th>
                                                            <th>Version</th>
                                                            <th>Field</th>
                                                            <th>Old values</th>
                                                            <th>New values</th>
                                                            <th>Edited By</th>
                                                            <th>Update Date</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $i=1;
                                                            foreach ($version_logs as $value) 
                                                            {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $value->order_id; ?></td>
                                                            <td><?php echo $value->order_no; ?></td>
                                                            <td><?php echo $value->version; ?></td>
                                                            <td><?php echo $value->inputname; ?></td>
                                                            <td><?php echo $value->old_value; ?></td>
                                                            <td><?php echo $value->new_value; ?></td>
                                                            <td>
                                                                <?php $admin_users_name="";
                                                                    foreach($admin_users as $fl)
                                                                    {
                                                                        if($fl->id==$value->userid)
                                                                        {
                                                                            $admin_users_name=$fl->name;
                                                                        }

                                                                    }
                                                                echo $admin_users_name; ?>
                                                            </td>
                                                            <td><?php echo $value->create_date; ?></td>

                                                        </tr>

                                                        <?php
                                                            $i++;
                                                            }
                                                        ?>

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
            <!-- End Page-content -->
        </div>
    </div>


<script>

var app = angular.module('crudApp', ['datatables']);

app.filter('number', function () {        
    return function (input) {
        if (! isNaN(input)) {
            var currencySymbol = 'Rs ';
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

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;
 $scope.getbank=0
    


$scope.create_date=new Date();


    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    
    $scope.tablename='enquiry_version';
    getData();



   function getData() {
       
      var order_base = $('#order_base').val();
      
      
     $http.get('<?php echo base_url() ?>index.php/order/fetch_data_complaints_table?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base)
        .success(function(data) {
            $scope.namesData = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = ($scope.currentPage - 1) * $scope.pageSize + 1;
            $scope.endItem = $scope.currentPage * $scope.pageSize;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
                $scope.namesData.push(temp);
                
                
            });
        });
        
       
    }

    $scope.pageChanged = function() {
        getData();
    }

    $scope.pageSizeChanged = function() {
        
        $scope.currentPage = 1;
        
        $('#pageSize').val($scope.pageSize);
        
        getData();
    }

    $scope.searchTextChanged = function() {
        $scope.currentPage = 1;
        getData();
    }

    $scope.pageTab = function(tabelename,status){
        
        if(status==9)
        {
            $('#distext').text('Schedule Date');
        }
        else
        {
            $('#distext').text('Create Date');
        }
        
        
        $('#order_base').val(status);
        $scope.currentPage = 1;
        getData();
        $scope.getcount(tabelename);
    };
 
 
 
    $scope.onNext = function(currentPage,pageSize){
        
        
        var nextnumber= parseInt($('#nextnumber').val());
        var pageSize= parseInt($('#pageSize').val());
        
        var currentPage=nextnumber+pageSize;
        
        $('#nextnumber').val(currentPage);
        $('#prenumber').val(currentPage);
        
        getDataPage(currentPage,pageSize);
        
        
    };

    $scope.onPre = function(currentPage,pageSize){
        
        
        var nextnumber= parseInt($('#prenumber').val());
        var pageSize= parseInt($('#pageSize').val());
        var currentPage=nextnumber-pageSize;
        
        $('#prenumber').val(currentPage);
        $('#nextnumber').val(currentPage);
        getDataPage(currentPage,pageSize);
        
        
    };

  function getDataPage(currentPage,pageSize) {
         
        $scope.tablename='order_sales_complaints';
        var order_base = $('#order_base').val();
        
        $http.get('<?php echo base_url() ?>index.php/order/fetch_data_complaints_table?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base)
        .success(function(data) {
            $scope.namesData = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = currentPage-pageSize+1;
            $scope.endItem = currentPage;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
                $scope.namesData.push(temp);
                
                
            });
        });
        
    }

});

</script>
         
<?php include ('footer.php'); ?>

</body>

 </html>

