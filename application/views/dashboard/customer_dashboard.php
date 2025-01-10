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
                                                  Rs.<span>{{ toatalvalueenc | indianCurrency }}</span>
                                                    <!-- Rs.<span class="counter-value" data-target="toatalvalueenc">{{toatalvalueenc}}</span> -->
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-danger text-danger"><b>{{ toatalvaluelsenc | indianCurrency }}</b></span>
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
                                                 Rs.<span> {{toatalvalueqty | indianCurrency }} </span>
                                                    <!-- Rs.<span class="counter-value" data-target="<?php echo round($toatalvalueqty,2); ?>"><?php echo round($toatalvalueqty,2); ?></span> -->
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-danger text-danger"><b>{{toatalvaluelsqty | indianCurrency }}</b></span>
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
                                                Rs.<span> {{ toatalvalue | indianCurrency }} </span>
                                                    <!-- Rs.<span class="counter-value" data-target="<?php echo round($toatalvalue,2); ?>"><?php echo round($toatalvalue,2); ?></span> -->
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b>{{ toatalvaluels | indianCurrency }}</b></span>
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
                                                Rs.<span> {{ toatalvaluedd | indianCurrency }} </span>
                                                    <!-- Rs. <span class="counter-value" data-target="<?php echo round($toatalvaluedd,2); ?>"><?php echo round($toatalvaluedd,2); ?></span> -->
                                                </h4>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-soft-success text-danger"><b>{{ toatalvaluelsdd | indianCurrency }}</b></span>
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

                      
                      
                        
                        
                        











                        
                        
                        
                        <!-- end row-->

                    </div>
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->

            







        </div>
    </div>
        <script data-require="chartjs@*" data-semver="2.2.1" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/angular.chartjs/latest/angular-chart.min.js"></script>

   <script>


var app = angular.module('crudApp', ['datatables','chart.js']);

app.filter('indianCurrency', function () {
    return function (input) {
        if (isNaN(input)) return input;
        var formattedValue = parseFloat(input);
        // console.log(input.toLocaleString('en-IN').toFixed(2));
         var decimal =  formattedValue.toLocaleString('en-IN', {   minimumFractionDigits: 2, maximumFractionDigits: 2 });

        return decimal

    };
});

// app.filter('indianCurrency', function () {
//     return function (input) {
//         if (isNaN(input)) return input;

//         // Round the number to two decimal places
//         var roundedValue = parseFloat(input).toFixed(2);

//         // Convert the rounded value to a string and use toLocaleString for Indian numbering system
//         var formattedValue = parseFloat(roundedValue).toLocaleString('en-IN', { maximumFractionDigits: 2 });

//         return formattedValue;
//     };
// });


app.controller('crudController', function($scope, $http){
    
  

    $scope.toatalvalueenc = <?php echo json_encode(round($toatalvalueenc,2)); ?>;
    $scope.toatalvaluelsenc = <?php echo json_encode(round($toatalvaluelsenc,2)); ?>;
    $scope.toatalvalueqty = <?php echo json_encode(round($toatalvalueqty,2)); ?>;
    $scope.toatalvaluelsqty =  <?php echo json_encode(round($toatalvaluelsqty,2)); ?>;




    $scope.toatalvalue = <?php echo json_encode(round($toatalvalue,2)); ?>;
    $scope.toatalvaluels = <?php echo json_encode(round($toatalvaluels,2)); ?>;
    $scope.toatalvaluedd  =  <?php echo json_encode(round($toatalvaluedd,2)); ?>;
    $scope.toatalvaluelsdd  =  <?php echo json_encode(round($toatalvaluelsdd,2)); ?>;


   

    $scope.toatalvalue_1 = <?php echo json_encode(round($toatalvalue_1,2)); ?>;
    $scope.toatalvaluels_1 = <?php echo json_encode(round($toatalvaluels_1,2)); ?>;


    $scope.toatalvalue_z = <?php echo json_encode(round($toatalvalue_1+$toatalvalue_2,2)); ?>;
    $scope.toatalvaluels_z = <?php echo json_encode(round($toatalvaluels_1+$toatalvaluels_2,2)); ?>;


    $scope.toatalvalue_2 = <?php echo json_encode(round($toatalvalue_2,2)); ?>;
    $scope.toatalvaluels_2 = <?php echo json_encode(round($toatalvaluels_2,2)); ?>;


    



// console.log($scope.toatalvalueenc)
    $scope.txtdate_1=new Date("<?php echo $this->session->userdata['logged_in']['from_date']; ?>");
    $scope.txtdate_2=new Date("<?php echo $this->session->userdata['logged_in']['to_date']; ?>");
  

    var formattedValue = new Intl.NumberFormat('en-IN', {
    style: 'currency',
    currency: 'INR'
}).format($scope.toatalvalueenc);



    $scope.searchMonth = function(){
        
        const monthNames = ["January", "February", "March", "April", "May", "June",
          "July", "August", "September", "October", "November", "December"
        ];
        
        var month=$('#todate').val(); 
        var moonLanding= new Date(month);
        var datamonth=monthNames[moonLanding.getMonth()];
        $('.monthtxt').html(datamonth);

 $scope.fetchDataRemainder();
        
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
               
              var todate=$('#todate').val();   
            
               $http.get('<?php echo base_url(); ?>index.php/dashboard/fetchDataRemainder?todate='+todate).success(function(data){
                
                  $scope.queryv1 = {};
                  $scope.queryByv1 = '$';
                  $scope.namesRemailder = data;
              });
  };
  
    $scope.error = false;
    $scope.success = false;

    $scope.fetchsales = function(){


        $http.get('<?php echo base_url(); ?>index.php/dashboard/monthlysaleschart_main').success(function(datavalue){

           function formatIndianCurrency(number) {
   return number.toLocaleString('en-IN', {
    style: 'decimal',
    minimumFractionDigits: 2,
    maximumFractionDigits: 2,
  });
}
let formattedData = datavalue.map(row => row.map(formatIndianCurrency));



 $scope.labels = ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec","Jan", "Feb", "Mar"];
  $scope.type = "bar";
  $scope.series = ['TOTAL','ZARON', 'ARASFIRMA','TOPAAZ INDUSTRRIES'];
  $scope.options = {
   
     legend: {
      display: true,
      position: 'top'
    },
    title: {
      display: true,
    },
    tooltips: {
      intersect: true,
      callbacks: {
      label: function (tooltipItem, data) {
        // Format the tooltip content as needed
        let formattedValue = formatIndianCurrency(tooltipItem.yLabel);
        return data.datasets[tooltipItem.datasetIndex].label + ': ' + formattedValue;
      }
    },
    },
    responsive: true,
    scales: {
      xAxes: [{
        stacked: true,

      }],
      yAxes: [{
        stacked: false,
        ticks: {
        callback: function (value) {
          // Format the value without currency symbol
          return value.toLocaleString('en-IN', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
          });
        }
      }
      }]
    },
    cutoutPercentage: 60,
    tooltipEvents: [],
    tooltipCaretSize: 0,
    showTooltips: true,
    onAnimationComplete: function() {
      self.showTooltip(self.segments, true);
    }
  };
  $scope.data = datavalue;
  $scope.colors = ['#279f00','#ff5228','#FF0000','#000000'];

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




