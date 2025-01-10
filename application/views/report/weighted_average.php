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
                                    
                                    <?php
                                    
                                    if(isset($_GET['accountstype']))
                                    {
                                        $title=$accountstypename;
                                        $accountstype=$_GET['accountstype'];
                                    }
                                    else
                                    {
                                         $title="Weighted Average List ";
                                         $accountstype=0;
                                    }
                                    
                                    if (isset($_POST['diffrence_data'])) {
                                        $diffrence_data = $_POST['diffrence_data'];
                                        
                                    } else {
                                        
                                    }
                                    ?>
                                    
                                    <h4 class="mb-sm-0 mt-3 font-size-18"><?php echo $title; ?> </h4>

                                 
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card" >

                  
                  <div class="card-body" >


                <div class="row" >
                   
                    
                    <div class="col-lg-12"  >
                        <!--<p class="mb-sm-0 font-size-18">Search</p>  -->
                      <!-- <form class="ng-pristine ng-valid">
                          <div class="row">
                                
                            
                            
                             
                            
                            <div class="col">
                                <label>From date</label>
                              <input type="date" class="form-control" min="<?php echo date('Y-07-01'); ?>" id="from-date" value="<?php echo date('Y-07-01'); ?>">
                            </div>
                            <div class="col">
                                <label>To date</label>
                              <input type="date" class="form-control" min="<?php echo date('Y-07-01'); ?>" id="to-date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            
                           
                            
                            
                            
                             <div class="col">
                                 
                             <button type="button" style="margin: 27px 0px;" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                            
                             
                             </div>
                           
                          </div>
                      </form> -->
                         
                     
                     
                     
            
                   
                           
                           
                          <div class="row">
                              
                          
                   
                         <div class="col-md-12">
                        <input type="text" style="display:none;" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                    <div class="table-responsive">                
                   <table  border="yes" >
                      <thead>
                        
                        <tr>

                        <th><b>No</b></th>         
                        <!-- <th><b>Categories</b></th> -->
                        <th><b>Product Name</b></th>
                        <th><b>Qty</b></th>
                        <th><b>Rate</b></th>
                        <th><b>Value</b></th>
                          
                        </tr>
                       
                      </thead>
                      <?php $totavg = 0; ?>
                      <!-- <tbody ng-repeat="item in namesDataledgergroup | orderBy:'no' track by $index"> -->
                        <tbody  ng-repeat="item in namesDataledgergroup | filter:query  track by $index" >
                            
                         <tr ng-if="item.product_name">
                            <td>{{item.no}}</td>
                           <!-- <td><a href="#">{{item.categories}}</a> </td> -->
                           <td><a href="<?php echo base_url(); ?>index.php/report_new/weighted_product_list/{{item.id}}" target="_blank">{{item.product_name}}</a></td>
                           <td>{{item.stock}} <span ng-if="item.stock != 0">{{item.uom}}</span></td>
                           <td>{{item.price}}</td>
                           <td>{{item.avg | indianCurrency}}</td>
                        </tr>    
                       
                      </tbody>
                     <tfoot>
                      <tr >
                          <td colspan="4" style="text-align: right;"><b>Total</b></td>
                          <td>{{gttotal | indianCurrency}}</td>
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
            </div>

                    </div>
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->

        </div>
    </div>


<script>
$(document).ready(function(){
 

  



});
</script>
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
        return input.toLocaleString('en-IN', { maximumFractionDigits: 0 });
    };
});

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;
  $scope.getproductval = 'ALL';
  $scope.diffrence_data="";
  $scope.total="";
  $scope.gttotal="";

  $scope.fetchDatagetlegderGroup = function(){
    
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    $scope.totavg = 0;
    $http.get('<?php echo base_url() ?>index.php/report_new/weighted_avg_list?limit=10&formdate='+fromdate+'&fromto='+fromto).success(function(data){
      
      
     $scope.query = {}
      $scope.queryBy = '$';
      console.log(data)
      
    //   if (angular.isDefined(data)) {
            $scope.namesDataledgergroup = data.list;
            $scope.gttotal = data.Gt_closing;
            // $scope.namesDataledgergroup.forEach(function(item) {
            //     item.no = parseInt(item.no);
            //     $scope.totavg += parseFloat(item.avg); // Calculate the total
            // });
        // }
    });
    
    
  };
  $scope.fetchDatagetlegderGroup();

});

</script>

    <?php include ('footer.php'); ?>
</body>



