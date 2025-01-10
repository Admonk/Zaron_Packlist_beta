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
.card-header {
    display: block;
    text-align: center;
}
tbody, td, tfoot, th, thead, tr {
    
     border-width: inherit; 
}
table.table1 {
    width: 100%;
    /* padding: 17px; */
}
table.table1 th {
    padding: 3px 10px;
    text-align: center;
}
table.table1 td {
    padding: 5px 12px;
}
table.table1 tr {
    font-size: 10px;
}
.table-responsive {
    height: 420px;
    cursor: all-scroll;
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
                                    <h4 class="mb-sm-0 font-size-18">Customer  YES OR NO Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Customer  YES OR NO Report !</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card">

                  
                  <div class="card-body" >


                <div class="row">
                   
                    
                    <div class="col-lg-12" >
                        <p class="mb-sm-0 font-size-18">Search</p>  
                      <form>
                          <div class="row">
                              <div class="col-md-4" > <!--data-trigger -->
                              <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default"   ng-model="getproductval">
                                                          
                                                            <?php
                                                                 if($this->session->userdata['logged_in']['access']!='12')
                                                                 {
                                                                     
                                                                     ?>
                                                                      <option value="ALL">Select sales person</option>
                                                                     <?php
                                                                     
                                                                 }
                                                            ?>
                                                           
                                                            
                                                            <?php
                                                            
                                                            foreach($sales_team as $val)
                                                            {
                                                                
                                                                 if($this->session->userdata['logged_in']['access']=='12')
                                                                 {
                                                                     if($this->session->userdata['logged_in']['userid']==$val->id)
                                                                     {
                                                                         
                                                                    
                                                                    ?>
                                                                     <option  value="<?php echo $val->id; ?>" seletced><?php echo $val->name; ?></option>
                                                              
                                                                    <?php 
                                                                    
                                                                     }
                                                                     
                                                                 }
                                                                 else
                                                                 {
                                                                     ?>
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                          
                                                                    <?php
                                                                 }
                                                                
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                            </div>
                            
                            
                            
                            
                            
                            
                            <div class="col" style="display:none;">
                              <input type="date" class="form-control" id="from-date"  min="<?php echo date('Y-04-01'); ?>" value="<?php echo  date('Y-m-d',strtotime("-1 days"));?>">
                            </div>
                            <div class="col" style="display:none;">
                              <input type="date" class="form-control" id="to-date" min="<?php echo date('Y-04-01'); ?>" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                           
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata" >Export</button>
                            </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                     
                  <div id="search-view" >
                      
                     
                                    <div class="card-header"  ng-init="fetchSingleData(0)">
                                      
                                           <h4 class="card-title">Customer YES OR NO Report</h4>
                                           
                                        </p>
                                    </div>
                   
                     <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                   
                   <div class="table-responsive">
                       
                   
                   <table class="table1" border="1" ng-init="fetchDatagetlegderGroup('ALL',formdate,todate)" >
                      <thead>
                        <tr style="position: sticky;top: 0;background: #dfdfdf;">


                          <th>No</th>
                          <th>Sales_Member</th>
                          <th>Customer_Name</th>
                          <th>Phone</th>
                          <th>Area</th>
                          <th>Competitor</th>
                          <th>OPEN/CLOSE</th>
                          <th>C</th>
                          <th>Q</th>
                          <th>P</th>
                          <th>S</th>
                          <th>F</th>
                          
                          <th>APR</th>
                          <th>MAY</th>
                          <th>JUN</th>
                          <th>JUL</th>
                          <th>AUG</th>
                          <th>SEP</th>
                          <th>OCT</th>
                          <th>NOV</th>
                          <th>DEC</th>
                          <th>JAN</th>
                          <th>FEB</th>
                          <th>MAR</th>
                          <th>S.A</th>
                          <th>B.A</th>
                          
                        </tr>
                      </thead>
                        <tbody  >
                            
                            <tr>
                                <td colspan="26"><loading></loading></td>
                            </tr>
                            
                            
                        <tr  class="trpoint" ng-repeat="names in namesDataledgergroup | filter:query">
                          
                           <td>{{names.no}}</td>
                           <td>{{names.sales_member}}</td>
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{names.customer_id}}" target="_blank">{{names.customername}}</a></td>
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{names.customer_id}}" target="_blank">{{names.customerphone}}</a></td>
                          
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{names.customer_id}}" target="_blank">{{names.area}}</a></td>
                          
                            <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{names.customer_id}}" target="_blank">{{names.competitor}}</a></td>
                          
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{names.customer_id}}" target="_blank">{{names.factory_workshop}}</a></td>
                           
                          <td>{{names.cc}}</td>
                          <td>{{names.pp}}</td>
                          <td>{{names.dd}}</td>
                          <td>{{names.qq}}</td>
                          <td>{{names.rr}}</td>


                          <td>{{names.April}}</td>
                          <td>{{names.Map}}</td>
                          <td>{{names.June}}</td>
                          <td>{{names.July}}</td>
                          <td>{{names.August}}</td>
                          <td>{{names.September}}</td>
                          <td>{{names.October}}</td>
                          <td>{{names.November}}</td>
                          <td>{{names.December}}</td>
                          <td>{{names.January}}</td>
                          <td>{{names.February}}</td>
                          <td>{{names.March}}</td>

                        
                        
                          
                           <td>{{names.sa}}</td>
                           <td>{{names.ba}}</td>
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
  
  
$('#exportdata').on('click', function() {
  
  
      var cateid= $('#choices-single-default').val();
      var userid="<?php echo $this->session->userdata['logged_in']['userid']; ?>";
      var access="<?php echo $this->session->userdata['logged_in']['access']; ?>";
      
      if(access==12)
      {
      
      if(userid!=1)
      {
         cateid=userid;
      }
          
          
      }
      
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
      
      url = '<?php echo base_url() ?>index.php/report/fetch_data_get_customer_yes_no_order_report_export?limit=10&cate_id='+cateid+'&formdate='+fromdate+'&todate='+fromto;
      location = url;

});


});
</script>

<?php
                     if($this->session->userdata['logged_in']['access']=='12')
                    {
                                 
                         $userslog=$this->session->userdata['logged_in']['userid'];        
                                 
                    }
                    else
                    {
                        $userslog='ALL';
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
  if(!isDown) return;
  e.preventDefault();
  const x = e.pageX - slider.offsetLeft;
  const walk = (x - startX) * 3; //scroll-fast
  slider.scrollLeft = scrollLeft - walk;
  console.log(walk);
});

var app = angular.module('crudApp', ['datatables']);
app.filter('number', function () {        
    return function (input) {
        if (! isNaN(input)) {
            var currencySymbol = '₹ ';
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

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;
  $scope.getproductval = '<?php echo $userslog; ?>';
  $scope.formdate = '<?php  echo date('Y-m-d',strtotime("-1 days")); ?>';
  $scope.todate = '<?php  echo date('Y-m-d'); ?>';

 
 
 $scope.getProduct = function(){
     var cate_id= $('#choices-single-default').val();;
     
     $scope.productlist(cate_id);
     
 }; 

 $scope.productlist = function (cate_id) {
    
    
    
   
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/report/productlist",
          data:{'cate_id':cate_id}
          }).success(function(data){
    
             $scope.productlistdata = data;
         
          });
          
      
}



$scope.search = function(){
    
    
    
      var cateid= $('#choices-single-default').val();
     
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
    
   
      $scope.formdate = fromdate;
      $scope.todate = fromto;
   
      $('#search-view').show();
      $('#exportdata').show();
      
      $scope.fetchDatagetlegderGroup(cateid,fromdate,fromto);
    
    
    
};




$scope.fetchDatagetlegderGroup = function(cateid,fromdate,fromto){
    
     var userid="<?php echo $this->session->userdata['logged_in']['userid']; ?>";
     var access="<?php echo $this->session->userdata['logged_in']['access']; ?>";
      
      if(access==12)
      {
      
              if(userid!=1)
              {
                 cateid=userid;
              }
          
          
      }
    
    
    $scope.loading = true;
    
    $http.get('<?php echo base_url() ?>index.php/report/fetch_data_get_customer_yes_no_order_report?limit=10&cate_id='+cateid+'&formdate='+fromdate+'&todate='+fromto).success(function(data){
      
      
      $scope.query = {}
      $scope.queryBy = '$';
      
      
      $scope.namesDataledgergroup = data;
      
      $scope.loading = false;
      
        var totalqty = 0;
        for(var i = 0; i < data.length; i++){
            var qty = parseInt(data[i].no_of_orders);
            totalqty += qty;
        }
      
      
      
        $scope.totalqty = totalqty;
      
      
      
      
      
         var totalamount = 0;
        for(var i = 0; i < data.length; i++){
            var balance = parseInt(data[i].totalvalue);
            totalamount += balance;
        }
      
        $scope.totalamount = totalamount;
        
        
     
        
      
    });
    
    
  };
  
  
  
  
  

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>



