<?php  include "header.php"; ?>

<style>
.trpoint {
    
    cursor: pointer;
   
}
.loading {
    text-align: center;
}
.trpoint:hover {
    background: antiquewhite;
}
.setload {
    background: #fff1e7;
}
.card-header {
    display: block;
    text-align: center;
    border-bottom:none;
}

b.ng-binding.ng-scope {
    font-size: 11px;
}
.table-responsive {
    height: 500px;
    cursor: grab;
}
b.ng-binding {
    font-size: 11px;
}
td a {
    color: black;
}
.choices__inner {
     padding: 0px 9px;
    
    }
    .choices__input {
   
     background-color: #fff;
    
    
    }
    .choices__list--multiple .choices__item {
    display: inline-block;
    vertical-align: middle;
    border-radius: 20px;
    padding: 3px 8px;
    font-size: 12px;
    font-weight: 500;
    margin-right: 3.75px;
    margin-bottom: -2.25px;
    background-color: #00bcd4;
    border: 1px solid #fff;
    color: #fff;
    word-break: break-all;
    box-sizing: border-box;
}
.checkdata_1_hide,.checkdata_2_hide,.checkdata_3_hide,.checkdata_4_hide,.checkdata_5_hide,.checkdata_6_hide,.checkdata_7_hide,.checkdata_8_hide,.checkdata_9_hide,.checkdata_10_hide,.checkdata_11_hide,.checkdata_12_hide,.checkdata_13_hide
{
     display: none;
}

</style>









<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>






 <?php
 $customer_id=0;
 if(isset($_GET['customer_id']))
 {
     $customer_id=$_GET['customer_id'];
 }
 
 ?>









 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Enquiry report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Enquiry report !</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card1">

                  
                  <div class="card-body1" >


                <div class="row">
                   
                    
                    <div class="col-lg-12" >
                        
                      <form>
                          <div class="row">
                                
                            <div class="col" > <!--data-trigger -->
                              <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                                                            <option value="ALL">All Sales Team</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($sales_team as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                            </div>
                            
                             <div class="col">
                              <select class="form-control" id="sales_group" ng-model="sales_group" ng-change="salesgroupChanged()">
                                                            <option value="ALL">All Sales Group</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($sales_group as $vals)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $vals->id; ?>"><?php echo $vals->name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                         </div>
                            
                            <div class="col">
                              <input type="date" class="form-control" min="<?php echo date('Y-04-01'); ?>" id="from-date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col" style="display:none;">
                              <input type="date" class="form-control" min="<?php echo date('Y-04-01'); ?>" id="to-date" value="<?php echo $this->session->userdata['logged_in']['to_date']; ?>">
                            </div>
                            
                           
                            
                            
                            
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata" >Export</button>
                             
                             
                             </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                   
                
                      <div class="row" style="margin-bottom: 10px;">                                    
                            <div class="col-sm-4" style="display:none;">
                            <div class="dataTables_length" id="example_length">
                             
                                                             <input type="hidden" id="nextnumber" value="0">   
                                                            <input type="hidden" id="prenumber" value="1">  
                                                            <input type="hidden" id="pageSize" value="1">  
                                <select name="example_length" aria-controls="example" class="form-control input-sm" ng-model="pageSize" ng-change="pageSizeChanged()">
                                    <option value=""> Group Length</option>
                                    <option value="1">1</option>
                                    <option value="4">4</option>
                                    <option value="8">8</option>
                                    <option value="12">12</option>
                                    <option value="20"> 12 and above</option>
                                </select> 
                            </div>
                         </div>
                         
                        
                       </div>
                   
                  
                  
                  <div class="table-responsive" style="background: #fff;">
                      
   


                   
                   <table id="datatable" style="position: relative;" class="table table-bordered"  ng-init="fetchDatagetlegderGroup(0)" >
                           <thead style="background: #fff;">
                        
                       </thead>
                       
                       
                       <tr >


                          <th></th>
                          <th></th>
                          <th></th>
                         
                          
                          <th style="text-align: center;"  colspan="5">OLD TOTAL ENQUIRY</th>
                          
                          <th style="text-align: center;"  colspan="5">ENQUIRY {{formdate}}</th>
                          <th style="text-align: center;"  colspan="5">TOTAL ENQUIRY</th>
                          <th style="text-align: center;"  colspan="5">PERCENTAGE</th>
                         
                          
                         
                        </tr>
                   
                        <tr style="position: sticky;top: 0;background: #e4e9e9;font-size: 9.5px;">


                          <th>No</th>
                          <th style="width:10%;">Sales Group</th>
                          <th style="width:400px;">Sales Team</th>
                         
                          <th style="width:300px;" >Enquiry</th>
                          <th style="width:300px;" >Converted </th>
                          <th style="width:300px;" >Missing </th>
                          <th style="width:300px;" >Bills</th>
                          <th style="width:300px;" >Pending</th>
                          
                          
                          <th style="width:300px;" >Today</th>
                          <th style="width:300px;" >Converted  </th>
                          <th style="width:300px;" >Missing </th>
                          <th style="width:300px;" >Bills</th>
                          <th style="width:300px;" >Pending</th>
                          
                          
                          <th style="width:300px;" >Today</th>
                          <th style="width:300px;" >Converted  </th>
                          <th style="width:300px;" >Missing </th>
                          <th style="width:300px;" >Bills</th>
                          <th style="width:300px;" >Pending</th>
                          
                          
                          <th style="width:300px;" >Convertion %</th>
                          <th style="width:300px;" >Missed %</th>
                          <th style="width:300px;" >Pending  %</th>
                          <th style="width:300px;" >Billing %</th>
                     
                         
                        </tr>
                     
                      
                      
                             
                        <tbody  ng-repeat="names in namesDataledgergroup" >
                            
                            
                            <tr  class="trpoint" >
                          
                                <td>{{names.no}}</td>
                                <td><b style="color:#ff5e14;"> {{names.sales_group_name}}</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                     <td></td>
                                      <td></td>
                                       <td></td>
                                        <td></td>
                                         <td></td>
                                          <td></td>
                                           <td></td>
                                            <td></td>
                                             <td></td>
                                              <td></td>
                                              <td></td>
                                           <td></td>
                                            <td></td>
                                             <td></td>
                                              <td></td>
                                              
                            <tr>
                                
                                  <tr ng-repeat="namesvv in names.subarray">
                                    <td></td>
                                    <td></td>
                                    <td>{{namesvv.sales_team}}</td>
                                    <td><span ng-if="namesvv.totalcount!=0">{{namesvv.totalcount}}</span></td>
                                    <td><span ng-if="namesvv.totalconvert!=0">{{namesvv.totalconvert}}</span></td>
                                    <td><span ng-if="namesvv.totalmissing!=0">{{namesvv.totalmissing}}</span></td>
                                    <td><span ng-if="namesvv.totalbilling!=0">{{namesvv.totalbilling}}</span></td>
                                    <td><span ng-if="namesvv.totalbillingpending!=0">{{namesvv.totalbillingpending}}</span></td>
                                    <td><span ng-if="namesvv.today_totalcount!=0">{{namesvv.today_totalcount}}</span></td>
                                    <td><span ng-if="namesvv.today_totalconvert!=0">{{namesvv.today_totalconvert}}</span></td>
                                    <td><span ng-if="namesvv.today_totalmissing!=0">{{namesvv.today_totalmissing}}</span></td>
                                    <td><span ng-if="namesvv.today_totalbilling!=0">{{namesvv.today_totalbilling}}</span></td>
                                    <td><span ng-if="namesvv.today_totalbillingpending!=0">{{namesvv.today_totalbillingpending}}</span></td>
                                    
                                    <td><span ng-if="namesvv.total_totalcount!=0">{{namesvv.total_totalcount}}</span></td>
                                    <td><span ng-if="namesvv.total_totalconvert!=0">{{namesvv.total_totalconvert}}</span></td>
                                    <td><span ng-if="namesvv.total_totalmissing!=0">{{namesvv.total_totalmissing}}</span></td>
                                    <td><span ng-if="namesvv.total_totalbilling!=0">{{namesvv.total_totalbilling}}</span></td>
                                    <td><span ng-if="namesvv.total_totalbillingpending!=0">{{namesvv.total_totalbillingpending}}</span></td>
                                    
                                    
                                    <td><span ng-if="namesvv.convertion!=0">{{namesvv.convertion}}</span></td>
                                    <td><span ng-if="namesvv.missed!=0">{{namesvv.missed}}</span></td>
                                    <td><span ng-if="namesvv.pending!=0">{{namesvv.pending}}</span></span></td>
                                    <td><span ng-if="namesvv.billing!=0">{{namesvv.billing}}</span></td>
                                
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
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->

            







        </div>
    </div>

 
   
   



<script>
$(document).ready(function(){
 
  $('#payment_mode_payoff').on('change',function(){
      
      var val=$(this).val();
      
      if(val=='Cash')
      {
          $('#res_no').hide();
      }
      else
      {
          $('#res_no').show();
      }
      
  });
   $(".Uncheck").on('click',function(){
      
      
      var val=$(this).val();
      if($(this).is(':checked'))
      {
          $('.checkdata_'+val).show();
          var status=1;
      }
      else
      {
           $('.checkdata_'+val).hide();
           var status=0;
      }
      
      $.ajax({
      url: '<?php echo base_url() ?>index.php/report/table_customize',
      type: "get", //send it through get method
      data: { 
        status_id: status, 
        status_val: val
      }
    });
      
      
      
  });
  
$('#exportdata').on('click', function() {
  
      var payment_mode=1;
      var cateid= $('#choices-single-default').val();
      var customer_id= '0';
      var productid= 1;
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
      var order_status= 1;
      
      var sales_group= $('#sales_group').val();
      var payment_mode= 0;
      url = '<?php echo base_url() ?>index.php/report/enquiry_report_export?limit=10&customer_id='+customer_id+'&cate_id='+cateid+'&sales_group='+sales_group+'&productid='+productid+'&formdate='+fromdate+'&todate='+fromto+'&order_status='+order_status+'&payment_mode='+payment_mode;
      location = url;

});


});
</script>
<script>




var app = angular.module('crudApp', ['datatables']);

app.directive('loading', function () {
      return {
        restrict: 'E',
        replace:true,
        template: '<div class="loading"><img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" width="20" height="20" /> LOADING...</div>',
        link: function (scope, element, attr) {
              scope.$watch('loading', function (val) {
                  if (val)
                      $(element).show();
                  else
                      $(element).hide();
              });
        }
      }
})

app.filter('number', function () {        
    return function (input) {
        if (! isNaN(input)) {
            var currencySymbol = '';
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
  $scope.getproductval = 'ALL';
$scope.sales_group = 'ALL';

   $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 1;
    $scope.searchText = '';


$scope.formdate='<?php echo date('d-m-Y'); ?>';
$scope.pageSizeChanged = function() {
        
       
        $scope.fetchDatagetlegderGroup();
        
}

$scope.salesgroupChanged = function() {
      
        $scope.fetchDatagetlegderGroup();
}
   

$scope.search = function(){
    
       $scope.currentPage = 1;
       
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
       
      $scope.formdate = fromdate;
      $scope.todate = fromto;
   
      $('#search-view').show();
      $('#search-view1').hide();
    //   $('#exportdata').show();
      
      $scope.fetchDatagetlegderGroup();
    
    
    
};

 $scope.searchTextChanged = function() {
      
        $scope.fetchDatagetlegderGroup();
 }
    
    

$scope.onviewparty = function(){
     $('#firstmodalcommisonparty').modal('toggle');
    
};

$scope.fetchDatagetlegderGroup = function(){
    
       $scope.loading = true;
      var customer_id= '<?php echo $customer_id;  ?>';
      var order_status=1;
      var payment_mode=1;
      var productid=1
      var cateid= $('#choices-single-default').val();
      var productid= 1;
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
       var sales_group= $('#sales_group').val();
    
      $http.get('<?php echo base_url() ?>index.php/report/fetch_data_enquiry_report?limit=10&customer_id='+customer_id+'&formdate='+fromdate+'&page=' + $scope.currentPage +'&size=' + $scope.pageSize +'&search=' + $scope.searchText+'&todate='+fromto+'&sales_group='+sales_group+'&order_status='+cateid+'&payment_mode='+payment_mode).success(function(data)
      {
   
               $scope.namesDataledgergroup = data;
               $scope.loading = false;
      
      
     });
    
    
  };
  
  
  
  
  

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>



