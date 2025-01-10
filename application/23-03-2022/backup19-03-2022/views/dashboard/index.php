<?php  include "header.php"; ?>
<style>
span.badge.bg-soft-success.text-danger 
{
    font-size: 11px;
    padding: 6px 9px;
}
canvas{
			margin:auto;
		}
canvas#dvCanvas {
    height: 340px !important;
}
canvas#dvCanvas2 {
    height: 270px;
    margin-bottom: 10.2%;
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
                                  

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Zaron</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                       <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Sales</span>
                                                <h4 class="mb-3">
                                                    Rs.<span class="counter-value" data-target="<?php echo round($toatalvalue,2); ?>"><?php echo round($toatalvalue,2); ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b><?php echo round($toatalvaluels,2); ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday  Sales</span>
                                                </div>
                                            </div>
        
                                            <div class="flex-shrink-0 text-end dash-widget">
                                                <div id="mini-chart1" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Orders</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo $totalcount; ?>"><?php echo $totalcount; ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b><?php echo $totalcountlastmonth-$totalcount; ?></b> </span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday Orders</span>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 text-end dash-widget">
                                                <div id="mini-chart2" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
        
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Delivery Sales</span>
                                                <h4 class="mb-3">
                                                    Rs. <span class="counter-value" data-target="<?php echo round($toatalvaluedd,2); ?>"><?php echo round($toatalvaluedd,2); ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b><?php echo round($toatalvaluelsdd,2); ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday Delivery Sales</span>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 text-end dash-widget">
                                                <div id="mini-chart3" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Delivery Orders </span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo $totalcountdd; ?>"><?php echo $totalcountdd; ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b><?php echo $totalcountlastmonthdd-$totalcountdd; ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday Delivery Orders</span>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 text-end dash-widget">
                                                <div id="mini-chart4" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->    
                        </div><!-- end row-->

                      
                      
                        
                        
                        
                        
                         
                        
                        
                         <div class="row">
                            <div class="col-xl-6">
                                <div class="card" ng-init="fetchsales()">
                                     <h3 class="page-header text-center mt-3">Monthly Sales Chart <?php echo date('Y'); ?></h3>
                                    <div class="card-body">
                                       
		                              	<canvas id="dvCanvas" height="200" width="300"></canvas>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                             <div class="col-xl-6">
                                <div class="card" ng-init="fetchsales2()">
                                    <h3 class="page-header text-center mt-3">Monthly Order Chart - <?php echo date('M'); ?></h3>
                                    <div class="card-body">
                                         
		                              	<canvas id="dvCanvas2" height="200" width="300"></canvas>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        
                        
                        
                          <div class="row">
                            <div class="col-xl-6">
                                <div class="card" ng-init="fetchData()">
                                     <h3 class="page-header text-center mt-3">Top Performing Locality</h3>
                                     
                                     <div class="pe-3 ps-3 pt-1 pb-1">
                                    <div class="search-box position-relative">
                                        <input type="text" class="form-control" placeholder="Search..." ng-model="query[queryBy]">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                                     </div>
                                    <div class="card-body" style="height: 450px;overflow: auto;">
                                        
                                        
                                        <table class="table align-middle table-nowrap">
                                                    <tbody>
                                                        <tr ng-repeat="name in namesData | orderBy:'count':true | filter:query">
                                                          

                                                            <td>
                                                                <div>
                                                                    <h5 class="font-size-15"><a href="#" class="text-dark">{{name.name}}</a></h5>
                                                                   
                                                                </div>
                                                            </td>

                                                            <td>
                                                                
                                                                <span class="text-muted"><b>{{name.count}}</b></span>
                                                            </td>

                                                            
                                                        </tr>


                                                    </tbody>
                                                </table>
                                       
		                              
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                             <div class="col-xl-6">
                                <div class="card" ng-init="fetchDataTopproduct()">
                                    <h3 class="page-header text-center mt-3">Top Selling Products</h3>
                                     <div class="pe-3 ps-3 pt-1 pb-1">
                                    <div class="search-box position-relative">
                                        <input type="text" class="form-control" placeholder="Search..." ng-model="queryv[queryByv]">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                                     </div>
                                    
                                    <div class="card-body" style="height: 450px;overflow: auto;">
                                           
                                        <table class="table align-middle table-nowrap">
                                                    <tbody>
                                                        <tr ng-repeat="names in namesDatatop | filter:queryv">
                                                          

                                                            <td>
                                                                <div>
                                                                    <h5 class="font-size-15"><a href="#" class="text-dark">{{names.name}}</a></h5>
                                                                   
                                                                </div>
                                                            </td>

                                                            <td>
                                                                
                                                                <span class="text-muted"><b>{{names.count}}</b></span>
                                                            </td>

                                                            
                                                        </tr>


                                                    </tbody>
                                                </table>
                                        
		                              
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        
                        
                        
                        
                        <!-- end row-->

                    </div>
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->

            







        </div>
    </div>
    
   <script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){
    
    
    
    
    
    
    
    
    $scope.fetchData = function(){
    $http.get('<?php echo base_url(); ?>index.php/dashboard/fetch_localitybase').success(function(data){
        
           $scope.query = {}
      $scope.queryBy = '$';
        
      $scope.namesData = data;
    });
  };

    
        $scope.fetchDataTopproduct = function(){
    $http.get('<?php echo base_url(); ?>index.php/dashboard/fetchDataTopproduct').success(function(data){
        
         $scope.queryv = {};
      $scope.queryByv = '$';
        
      $scope.namesDatatop = data;
    });
  };

    

 
    $scope.error = false;
    $scope.success = false;

    $scope.fetchsales = function(){
        $http.get('<?php echo base_url(); ?>index.php/dashboard/monthlysaleschart').success(function(data){

            var ctx = document.getElementById("dvCanvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: 'Total Sale',
                        data: data,
                        backgroundColor: ['gray', 'orange', 'green'],
                        borderWidth: 1
                    }],
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

        });
    }

 $scope.fetchsales2 = function(){
        $http.get('<?php echo base_url(); ?>index.php/dashboard/monthlysaleschartpie').success(function(data){
            var ctx = document.getElementById("dvCanvas2").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut', // change the value of pie to doughtnut for doughnut chart
                data: {
                    datasets: [{
                        data: data.total,
                        backgroundColor: ['gray', 'orange', 'green']
                    }],
                    labels: data.name
                },
                options: {
                    responsive: false
                }
            });

        });
    }




});

</script>
    <?php include ('footer.php'); ?>
</body>





