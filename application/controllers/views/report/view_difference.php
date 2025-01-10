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
                                         $title="Trial Balance Difference";
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
                         
                     
                     
                     
                     
                  <div id="search-view" style="display:none;" >
                      
                                     <div class="card-header"  ng-init="fetchSingleData(0)">
                                      
                                          
                                            <h4 class="card-title"> Balance {{formdate}} To {{todate}}</h4>
                                      
                                    </div>
                   </div> 
                   
                   
                           
                           
                          <div class="row">
                              
                          
                   
                         <div class="col-md-12">
                        <input type="text" style="display:none;" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                    <div class="table-responsive">                
                   <table  border="yes" >
                      <thead>
                        
                        <tr>


                          <th ><b>Account Name</b></th>
                          
                        
                          
                          <th><b>Difference  </b></th>
                          
                          <!--<th><b>Balance  </b></th>-->
                          
                        </tr>
                       
                      </thead>
                        <tbody   ng-repeat="item in diffrence_datas track by $index">
                            
                            
                         <tr  class="trpoint" >
                          
                           <td><b><a href="#" style="color: #ef7b3f;font-weight: 800;">{{item.account_type_name}}</a></b> </td>
                           <td><b ><a href="#" >{{item.diffrence | number}}</a></b></td>

                            
                        </tr>    
                        
                       
                      </tbody>
                      <tr>
                        
                      </tr>
                      <tr > 
                          <th><b>Total : </b></th>
                          <th><b>{{total | number}}</b></th>
                       </tr>
                       
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

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;
  $scope.getproductval = 'ALL';
  $scope.diffrence_data="";
  $scope.total="";

    $scope.diffrence_datas = <?php echo $diffrence_data; ?>;
    var total_val =0;
    for(var i = 0; i < $scope.diffrence_datas.length; i++){
      var total_diff = Math.abs($scope.diffrence_datas[i].diffrence);
        total_val += total_diff;
    }
    $scope.total = total_val;

});

</script>

    <?php include ('footer.php'); ?>
</body>



