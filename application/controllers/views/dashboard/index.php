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
    height: 270px !important;
}
span.badge.bg-soft-danger.text-danger {
    font-size: 11px;
    padding: 6px 9px;
}
#setheigt
{
   height: 357px !important;
    padding: 69px 0px;
}
canvas#dvCanvas2 {
   
        
    margin-bottom: 10.2%;
}
h3.test-color-1 {
    color: #008dc3;
    font-size: 40px;
}
span.make-color-up {
    font-size: 50px;
    color: green;
    font-weight: 800;
    margin: -1% 10%;
    position: absolute;
}
span.make-color-down {
    font-size: 50px;
    color: red;
    font-weight: 800;
    margin: -1% 10%;
    position: absolute;
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Enquiry Value</span>
                                                <h4 class="mb-3">
                                                    Rs.<span class="counter-value" data-target="<?php echo round($toatalvalueenc,2); ?>"><?php echo round($toatalvalueenc,2); ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-danger text-danger"><b><?php echo round($toatalvaluelsenc,2); ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday  Enquiry</span>
                                                </div>
                                            </div>
        
                                            <div class="flex-shrink-0 text-end dash-widget">
                                                <div id="mini-chart5" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Enquiry Count</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo round($totalcountenc,2); ?>"><?php echo round($totalcountenc,2); ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-danger text-danger"><b><?php echo $totalcountlastmonthenc; ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday  Enquiry</span>
                                                </div>
                                            </div>
        
                                            <div class="flex-shrink-0 text-end dash-widget">
                                                <div id="mini-chart6" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Quotation value</span>
                                                <h4 class="mb-3">
                                                    Rs.<span class="counter-value" data-target="<?php echo round($toatalvalueqty,2); ?>"><?php echo round($toatalvalueqty,2); ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-danger text-danger"><b><?php echo round($toatalvaluelsqty,2); ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday  Quotation </span>
                                                </div>
                                            </div>
        
                                            <div class="flex-shrink-0 text-end dash-widget">
                                                <div id="mini-chart7" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Quotation Count</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo round($totalcountqty,2); ?>"><?php echo round($totalcountqty,2); ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-danger text-danger"><b><?php echo round($totalcountlastmonthqty,2); ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday  Quotation </span>
                                                </div>
                                            </div>
        
                                            <div class="flex-shrink-0 text-end dash-widget">
                                                <div id="mini-chart8" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Sales Value</span>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Orders Count</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo $totalcount; ?>"><?php echo $totalcount; ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b><?php echo $totalcountlastmonth; ?></b> </span>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today Delivery</span>
                                                <h4 class="mb-3">
                                                    Rs. <span class="counter-value" data-target="<?php echo round($toatalvaluedd,2); ?>"><?php echo round($toatalvaluedd,2); ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b><?php echo round($toatalvaluelsdd,2); ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday Delivery</span>
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Today  Delivery Count</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo $totalcountdd; ?>"><?php echo $totalcountdd; ?></span>
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b><?php echo $totalcountlastmonthdd; ?></b></span>
                                                    <span class="ms-1 text-muted font-size-13">Yesterday Delivery Count</span>
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
                             <div class="col-xl-12" >
                                 <div class="col-xl-4" style="float:right;">
                            <input type="date"  class="form-control" id="todate" ng-model="txtdate_2" ng-change="searchMonth()">
                            </div>
                                 <div class="col-xl-4" style="float:right;">
                            <input type="date"  class="form-control" id="fromdate" ng-model="txtdate_1" ng-change="searchMonth()">
                            </div>
                            
                            </div>
                        </div>
                        <br>
                        
                         <div class="row">
                             
                          
                            <div class="col-xl-6">
                                <div class="card" ng-init="fetchsales()">
                                     <h5 class="page-header text-center mt-3">Monthly Sales Chart <?php echo date('Y'); ?></h5>
                                    <div class="card-body">
                                       
		                              	<canvas id="dvCanvas" height="200" width="300"></canvas>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            
                                 <!-- end col -->
                             <div class="col-xl-6">
                                <div class="card" ng-init="fetchsales2()">
                                    <h5 class="page-header text-center mt-3">Order Conversion Chart - <span class="monthtxt"><?php echo date('M'); ?></span></h5>
                                    <div class="card-body">
                                         
		                              	<canvas id="dvCanvas2" height="200" width="300"></canvas>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                           
                              
                          
                            <!-- end col -->
                        </div>
                        
                        
                        
                          <div class="row">
                            <div class="col-xl-4">
                                <!--<div class="card" ng-init="fetchData()">-->
                               
                                <div class="card" ng-init="fetchsales3()">
                                     <h5 class="page-header text-center mt-3">Top Performing Locality - <span class="monthtxt"><?php echo date('M'); ?></span></h5>
                                     
                                     <!--<div class="pe-3 ps-3 pt-1 pb-1">
                                    <div class="search-box position-relative">
                                        <input type="text" class="form-control" placeholder="Search..." ng-model="query[queryBy]">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                                     </div>-->
                                    <div class="card-body" style="height: 490px;overflow: auto;">
                                        
                                        
                                       <!-- <table class="table align-middle table-nowrap">
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
                                                </table>-->
                                                
                             
		                              	<canvas id="dvCanvas3" height="350" width="450"></canvas>
                                    
		                              
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                             <div class="col-xl-4">
                                <div class="card" ng-init="fetchDataTopproduct()">
                                    <h5 class="page-header text-center mt-3">Top Selling Products - <span class="monthtxt"><?php echo date('M'); ?></span></h5>
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
                            
                             <div class="col-xl-4">
                                <div class="card" ng-init="fetchDataRemainder()">
                                    <h5 class="page-header text-center mt-3">Remainder  <span class="monthtxt"><?php echo date('d-m-Y'); ?></span></h5>
                                     <div class="pe-3 ps-3 pt-1 pb-1">
                                    <div class="search-box position-relative">
                                        <input type="text" class="form-control" placeholder="Search..." ng-model="queryv1[queryByv1]">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                                     </div>
                                    
                                    <div class="card-body" style="height: 450px;overflow: auto;">
                                           
                                        <table class="table align-middle table-nowrap">
                                                    <tbody>
                                                        <tr ng-repeat="names in namesRemailder | filter:queryv1">
                                                           
                                                           
                                                           <td>
                                                               
                                                                    <a href="#" class="text-dark">{{names.lable}}</a>
                                                                
                                                            </td>

                                                            <td>
                                                               
                                                                    <a href="#" class="text-dark">{{names.order_no}}</a>
                                                                
                                                            </td>

                                                            <td>
                                                                
                                                                <span class="text-muted"><b>{{names.call_back_date}}</b></span>
                                                            </td>

                                                            
                                                        </tr>


                                                    </tbody>
                                                </table>
                                        
		                              
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
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
    
 
    $scope.txtdate_1=new Date("<?php echo $this->session->userdata['logged_in']['from_date']; ?>");
    $scope.txtdate_2=new Date("<?php echo $this->session->userdata['logged_in']['to_date']; ?>");
  
  



    $scope.searchMonth = function(){
        
        const monthNames = ["January", "February", "March", "April", "May", "June",
          "July", "August", "September", "October", "November", "December"
        ];
        
        var month=$('#todate').val(); 
        var moonLanding= new Date(month);
        var datamonth=monthNames[moonLanding.getMonth()];
        $('.monthtxt').html(datamonth);
        $scope.fetchsales2();
        $scope.fetchsales3();
        $scope.fetchDataTopproduct();
       
    };
    
    
    
    $scope.fetchData = function(){
    $http.get('<?php echo base_url(); ?>index.php/dashboard/fetch_localitybase').success(function(data){
        
           $scope.query = {}
      $scope.queryBy = '$';
        
      $scope.namesData = data;
    });
  };

    
        $scope.fetchDataTopproduct = function()
        {
               var todate=$('#todate').val(); 
               var fromdate=$('#fromdate').val(); 
               
                if(fromdate=='')
              {
                   
                   var fromdate="<?php echo $this->session->userdata['logged_in']['from_date']; ?>"; 
              }
              if(todate=='')
              {
                  var todate="<?php echo $this->session->userdata['logged_in']['to_date']; ?>"; 
              }
               
               $http.get('<?php echo base_url(); ?>index.php/dashboard/fetchDataTopproduct?todate='+todate+'&fromdate='+fromdate).success(function(data){
                
                 $scope.queryv = {};
              $scope.queryByv = '$';
                
              $scope.namesDatatop = data;
            });
  };

    
$scope.fetchDataRemainder = function()
        {
               
               
               $http.get('<?php echo base_url(); ?>index.php/dashboard/fetchDataRemainder').success(function(data){
                
                  $scope.queryv1 = {};
                  $scope.queryByv1 = '$';
                  $scope.namesRemailder = data;
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
                        borderWidth: 3
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

 $scope.fetchsales2 = function()
 {
        
        var todate=$('#todate').val(); 
               var fromdate=$('#fromdate').val(); 
               
                if(fromdate=='')
              {
                   
                   var fromdate="<?php echo $this->session->userdata['logged_in']['from_date']; ?>"; 
              }
              if(todate=='')
              {
                  var todate="<?php echo $this->session->userdata['logged_in']['to_date']; ?>"; 
              }
     
        $http.get('<?php echo base_url(); ?>index.php/dashboard/monthlysaleschartpie?todate='+todate+'&fromdate='+fromdate).success(function(data){
            var ctx = document.getElementById("dvCanvas2").getContext('2d');
            var myChart = new Chart(ctx, {
                
                type: 'pie', // change the value of pie to doughtnut for doughnut chart
                data: {
                    datasets: [{
                        data: data.total,
                        backgroundColor: ['red', 'blue', 'green']
                    }],
                    labels: data.name
                },
                options: {
                    responsive: false
                }
                
                
                
            });

        });
 }

 $scope.fetchsales3 = function()
 {
     
               var todate=$('#todate').val(); 
               var fromdate=$('#fromdate').val();
               
               
             
               if(fromdate=='')
              {
                   
                   var fromdate="<?php echo $this->session->userdata['logged_in']['from_date']; ?>"; 
              }
              if(todate=='')
              {
                  var todate="<?php echo $this->session->userdata['logged_in']['to_date']; ?>"; 
              }
              
        $http.get('<?php echo base_url(); ?>index.php/dashboard/fetch_localitybase_bychart?todate='+todate+'&fromdate='+fromdate).success(function(data){
            var ctx = document.getElementById("dvCanvas3").getContext('2d');
            var myChart = new Chart(ctx, {
                
                type: 'polarArea', // change the value of pie to doughtnut for doughnut chart
                data: {
                    datasets: [{
                        data: data.total,
                        backgroundColor: ['yellow', 'gray', 'green','red','black']
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




