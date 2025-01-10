<?php  include "header.php";

function getCurrentFinancialYear($add = false) {
    $currentMonth = date('n');
    $currentYear = date('Y');
    $startMonth = 4;
    if ($currentMonth < $startMonth) {
        $financialYear = ($currentYear - 1) % 100;
    } else {
        $financialYear = $currentYear % 100;
    }
    if($add){
    return $financialYear + 1;
    }else{
    return $financialYear;
    }
}

 ?>

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

[onclick]{
  cursor: pointer;
}
</style>
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; 

$testMode =($_GET['test'] && $_GET['test'] == 'true');




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
                                    <h4 class="mb-sm-0 font-size-18">Regular Customer YES or NO Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Regular Customer YES or NO Report !</li>
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
                            
                          <div class="col" style="align-self: center;">
                                                <div class="form-check">
                                                        <input type="checkbox" ng-click="search()" name="status" id="filterStatus" class="primary">
                                                      <label class="control-label" for="filterStatus">Show Zero Sales</label>

                                                        </div>
                                                </div>
                            
                            
                            
                            
                            <div class="col"  >
                              <label for="from-month" class="form-label">From :   </label>
                                        <input type="month" class="form-control exclude" min="2023-08"  max="<?=date('Y-m')?>" id="from-date" value="<?=date('Y-04')?>">
                             </div>
                            <div class="col"  >
                              <label for="to-month" class="form-label">To : </label>
                                        <input type="month"  class="form-control exclude"  max="<?=date('Y-m')?>" id="to-date" value="<?=date('Y')+1?>-03">
                             </div>
                           
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" <?=$_GET['test'] && $_GET['test'] == 'true' ? 'disabled' : '' ?> class="btn btn-success waves-effect waves-light" id="exportdata" >Export</button>
                            </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                     
                  <div id="search-view" >
                      
                     
                                    <div class="card-header"  ng-init="fetchSingleData(0)">
                                      
                                           <h4 class="card-title">Regular Customer YES or NO Report</h4>
                                           
                                        </p>
                                    </div>
                   
                     <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." id="searchBox">
                   
                   <div class="table-responsive">
                       
                   
                   <table class="table1" border="1" ng-init="fetchDatagetlegderGroup('ALL')" >
                      <thead>
                        <tr style="position: sticky;top: 0;background: #dfdfdf;">


                          <th>No</th>
                          <th>Customer Name</th>
                          <th>Phone</th>
                          <th>Area</th>
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
                        <tbody  >
                            
                            <tr>
                                <td colspan="26"><loading></loading></td>
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
        path += '&orders='+ orderIds+'&fromDate='+fromDateYMD+'&toDate='+toDateYMT;
        if(orderIds !== null){
           let url = 'index.php/order/orders_list'+path;
        window.open('<?=base_url()?>' + url, '_blank');
        }
       

      }
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
          var status = $('#filterStatus') && $('#filterStatus').is(':checked') ?   $('#filterStatus').is(':checked') : false;

      if(access==12)
      {
      
      if(userid!=1)
      {
         cateid=userid;
      }
          
          
      }
      
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
     var searchVal= $('#searchBox').val();
      
      url = '<?php echo base_url() ?>index.php/other_reports/fetch_data_get_customer_yes_no_order_report_export?limit=10&cate_id='+cateid+'&formdate='+fromdate+'&todate='+fromto+'&searchVal='+searchVal+'&status='+status+'&mode=regular';
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
  // $scope.formdate = '<?php  echo date('Y-m-d',strtotime("-1 days")); ?>';
  // $scope.todate = '<?php  echo date('Y-m-d'); ?>';

 
 
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
      

     let dateData = fromdate.split('-')[0].slice(-2);


     $('.first-year').text(Number(dateData));
     $('.second-year').text(Number(dateData) + 1);
    
   
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




$scope.fetchDatagetlegderGroup = function(cateid){
    
     var userid="<?php echo $this->session->userdata['logged_in']['userid']; ?>";
     var access="<?php echo $this->session->userdata['logged_in']['access']; ?>";
     var searchVal= $('#searchBox').val();
    var status = $('#filterStatus') && $('#filterStatus').is(':checked') ?   $('#filterStatus').is(':checked') : false;

      if(access==12)
      {
      
              if(userid!=1)
              {
                 cateid=userid;
              }
          
          
      }
    
    
    $scope.loading = true;
     var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
    <?php
      $url = $testMode ? 'fetch_data_get_customer_yes_no_order_report?test=true&' : 'fetch_data_get_customer_yes_no_order_report?';

    ?>
    $http.get('<?php echo base_url() ?>index.php/other_reports/<?=$url?>limit=10&cate_id='+cateid+'&formdate='+fromdate+'&todate='+fromto+'&searchVal=' + searchVal+ '&status=' + status).success(function(data){
       $('tbody').empty();
      
      $scope.query = {}
      $scope.queryBy = '$';
      
      
      $scope.namesDataledgergroup = data;
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
    
        if(data['ignore'] != null){
                        let heads ;
                        $('.customerheads').remove()
                        data['ignore'].map((el) => {
                                heads+='<th class="customerheads">'+el.month+'<br/>'+el.year+'</th>';
                        });

                        // console.log("heads",heads)

                        $('.table1 th:nth-child(11)').after(heads)
                     }

                     // console.log("data",data[0])
          data[0] && data[0].map((item) => {
              if(item != 'ignore'){
            let html = ` <tr>
                                <td colspan="26" class="text-start" style="font-size: larger;">Sales Member - <b>${item.key}</b> - <span>${item.orders_count} Order${item.orders_count > 1 ? 's' : ''}</span> from (${item.customers_count} Customer${item.customers_count > 1 ? 's' : ''})</td>
                            </tr>`

            item.data && item.data.map((names) => {
              html += ` <tr>
                          
                           <td>${names.no}</td>
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id=${names.customer_id}" target="_blank" >${names.customername}</a></td>
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id=${names.customer_id}" target="_blank">${names.customerphone}</a></td>
                          
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id=${names.customer_id}" target="_blank">${names.area}</a></td>
                          
                            <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id=${names.customer_id}" target="_blank">${names.competitor}</a></td>
                          
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id=${names.customer_id}" target="_blank">${names.factory_workshop}</a></td>
                           
                          <td>${names.cc}</td>
                          <td>${names.qq}</td>

                          <td>${names.pp}</td>
                          <td>${names.rr}</td>
                          <td>${names.dd}</td>`;


                        if(data['ignore'] != null){
                        let bodies = '' ;
                        // $('.customerheads').remove()
                        // if()
                        data['ignore'].map((el) => {
// console.log("data[0][item]",names)
if(names[el.monthFull]){
    bodies+=`<td onclick="showOrders('${names[el.monthFull+'_orders']}')">${names[el.monthFull] ? names[el.monthFull] : ''}</td>`;
}else{
    bodies+=`<td  > </td>`;
}

                                
                        });

                        // console.log("heads",bodies)

                        html += bodies;
                     }
                        


                        
                        
                          
                           html += `<td>${toIndi(names.sa)}</td>
                           <td>${names.ba}</td>
                        </tr>`;
            })
            $('tbody').append(html);
          }
          })

           
     
      $scope.loading = false;
        
      
    });
    
    
  };
  
  
  
  
  

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>



