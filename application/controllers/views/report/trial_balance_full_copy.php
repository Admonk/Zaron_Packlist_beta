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

/* div {
  border-top: 1px solid #000;
   border-bottom: 1px solid #000;
  text-align: left;
  padding: 8px;
} */
.table.nestedtable {
         width: 100%;
         border-collapse: collapse;
         margin-bottom: 20px;
         }
         .table.nestedtable>:not(caption)>*>*
         {
         padding: 0px;
         }
         .table.nestedtable .divead .row {
         background-color: #f5f5f5;
         font-weight: bold;
         }
         .table.nestedtable .tbody .row:ndiv-child(even) {
         background-color: #f9f9f9;
         }
         .table.nestedtable .tbody .row:hover {
         background-color: transparent;
         }
       

         .table .row .col, .table .row .col-2 {
          text-align: left !important;
    padding: 8px !important;
    margin: 0 !important;
    border: #e9e9e9 solid 1px;
         }

         .table.nestedtable .row {
    margin: 0px !important;
    padding: 0px !important;
}
    .divead .row .col,.divead .row .col-2 {
        background: #ff6017;
        border: none;
        color: #fff;
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
                                         $title="Trial Balance";
                                         $accountstype=0;
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
                      <form class="ng-pristine ng-valid">
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
                      </form>
                         
                     
                     
                     
                     
                  <div id="search-view" style="display:none;" >
                      
                                     <div class="card-header"  ng-init="fetchSingleData(0)">
                                      
                                          
                                            <h4 class="card-title"> Balance {{formdate}} To {{todate}}</h4>
                                      
                                    </div>
                   </div> 
                   
                   
                           
                           
                          <div class="row">
                              
                          
                   
                         <div class="col-md-12">
                        <input type="text" style="display:none;" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                    <div class="table-responsive">   

                    <div class="table nestedtable" border="yes" ng-init="fetchDatagetlegderGroup(0)" >
                    <div class="divead">
                    <div class="row" colspan="5"> 
                          <div class="col-2"></div>
                          <div class="col"><b>   General Ledger A/c Bal.</b></div>
                          <div class="col"></div>
                          <div class="col"></div>
                          <div class="col"></div>
                          <div class="col"></div>
                          <div class="col"></div>
                          <div class="col" ></div>
                    </div>

                        <div class="row">
                            <div class="col-2"><b>Account Name</b></div>
                            <div class="col"><b>Debit  </b></div>
                            <div class="col"><b>Credit </b></div>
                            <div class="col"><b>Diff  </b></div>
                            <div class="col"><b>Name</b></div>
                            <div class="col"><b>Debit</b></div>
                            <div class="col"><b>Credit</b></div>
                            <div class="col"><b>Diff  </b></div>
                        </div>
                      </div>
                      

                    <div class="tbody"  ng-repeat="namesvv in namesDataledgergroup | filter:query">
                    <div class="parenttable" >
                      <div class="row trpoint" ng-if="namesvv.set>0"   ng-click="viewSub(namesvv.id)" >    
                           <div class="col-2"><b><a href="#" style="color: #ef7b3f;font-weight: 800;">{{namesvv.account_type_name}}</a></b> <i class="fa fa-angle-down" style="float:right;"></i></div>
                           <div class="col"><b ng-if="namesvv.debit!=0"><a href="#" >{{namesvv.debit | number}}</a></b></div>
                           <div class="col"><b ng-if="namesvv.credit!=0"><a href="#" >{{namesvv.credit | number}}</a></b></div>
                           <div class="col"><b><a href="#" >{{namesvv.credit - namesvv.debit | number}}</a></b></div>
                           <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div> 
                          </div> 
                            
                      <div class="row d-none trpoint dis_{{names.account_type}}" ng-repeat="names in namesvv.sub | orderBy:'name'" ng-if="names.set>0" >
                          <div class="col-2"><a href="{{names.url}}" >{{names.name}}</a></div>
                          <div  class="col"> <span ng-if="names.debit>0" ><a href="{{names.url}}" >{{names.debit | number}}</a></span></div>
                          <div  class="col"><span ng-if="names.credit > 0 "><a href="{{names.url}}" >{{names.credit | number}}</a></span></div>
                          <div class="col"></div>
                          <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                   
                      <div class="row" ng-repeat="sub in names.sub_data" ng-if="sub.sub_name">
                        <div class="col-2"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                          <div class="col" style="color:#000">{{sub.sub_name}}</div>
                          <div class="col">{{sub.debit | number }}</div>
                          <div class="col">{{sub.credit | number }}</div>
                          <div class="col">{{sub.credit - sub.debit | number}}</div>
                      </div>
                      </div>
                     
                    </div>
                    </div>

                      <!-- <tbody ng-repeat="sub in sub_datas"  ng-if="sub.set">
                      <tr>
                          <td style="color:#000"><span><b>{{sub.name}}</b></span></td>
                          <td><span>{{sub.debit}}</span></td>
                          <td><span>{{sub.credit}}</span></td>
                          <td><span>{{sub.credit - sub.debit | number}}</span></td>
                       </tr>
                      <tr ng-repeat="subs in sub.sub_data">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>{{subs.sub_name}}</td>
                      <td>{{subs.debit | number}}</td>
                      <td>{{subs.credit | number}} </td>
                      <td>{{subs.credit - subs.debit | number}}</td>
                        </tr>
                      </tbody> -->
                      
                      
                       
                       
                          <div class="row" ng-if='credittotalss<debitamountdata' >
                          
                           <div class="col-2" > <b>DIFFERENCE AMOUNT </b></div>
                           <div class="col" ></div>
                           <div class="col" ><b>{{debitamountdata-credittotalss | number}} </b>

                            <!-- <span >
                           <form action="<?php echo base_url(); ?>index.php/report/view_diffrence" target="_blank" medivod="post" enctype="application/json">
                              <input type="hidden" name="diffrence_data" value="{{diffrence_data}}">
                                <input type="submit" value="View">
                              </form>
                          </span> -->
                           
                                  </div>
                          <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                          
                          </div>

                          <div class="row" ng-if='debitamountdata < credittotalss'>
                          
                           <div class="col-2"><b>DIFFERENCE AMOUNT </b></div>
                           <div class="col"><b>{{credittotalss-debitamountdata | number}} </b>
                            
                           <!-- <span >
                           <form action="<?php echo base_url(); ?>index.php/report/view_diffrence" target="_blank" medivod="post" enctype="application/json">
                              <input type="hidden" name="diffrence_data" value="{{diffrence_data}}">
                              <input type="submit" value="View">
                          </form>
                          </span> -->

                        </div>
                           <div class="col"></div>
                           <div class="col"></div>
                          <div class="col"></div>
                          <div class="col"></div>
                          <div class="col"></div>
                                  </div>




                       
                       
                     
                      
                        <div class="row"  ng-if='credittotalss<debitamountdata'> 
                          <div class="col-2"><b>Total : </b></div>
                          <div class="col"><b>{{debitamountdata | number}}</b></div>
                          <div class="col"><b>{{debitamountdata-credittotalss+credittotalss | number}}</b></div>
                          <div class="col"></div>
                          <div class="col"> </div>
                          <div class="col"></div>
                          <div class="col"></div>
                          <div class="col"></div>
                        </div>


                        <div class="row" ng-if='debitamountdata<credittotalss'> 
                          <div class="col-2"><b>Total : </b></div>
                          <div class="col"><b>{{credittotalss-debitamountdata+debitamountdata | number}}</b></div>
                          <div class="col"><b>{{credittotalss | number}}</b></div>
                          <div class="col"></div>
                          <div class="col"></div>
                          <div class="col"></div>
                          <div class="col"></div>
                          <div class="col"></div>
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
      
      var val=$(divis).val();
      
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
      var productid= $('#choices-single-default-1').val();
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
      var order_status= $('#payment_status').val();
      var payment_mode= $('#payment_mode').val();
      url = '<?php echo base_url() ?>index.php/report/fetch_data_sales_balance_report_export?limit=10&cate_id='+cateid+'&productid='+productid+'&formdate='+fromdate+'&todate='+fromto+'&order_status='+order_status+'&payment_mode='+payment_mode;
      location = url;

});


});
</script>
<script>

var app = angular.module('crudApp', ['datatables']);

app.filter('number', function () {
    return function (input) {
        if (!isNaN(input)) {
            var currencySymbol = ''; // You can add a currency symbol here if needed
            var result = input.toString().split('.');
            var integerPart = result[0];
            var decimalPart = result[1];

            // Format the integer part with commas as thousands separators
            var formattedIntegerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

            // Combine the formatted integer part and decimal part
            var formattedNumber = formattedIntegerPart;

            if (decimalPart !== undefined) {
                formattedNumber += "." + decimalPart;
            }

            return currencySymbol + formattedNumber;
        }

        return input; // Return the input as is if it's not a valid number
    };
});
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;
  $scope.getproductval = 'ALL';



$scope.search = function(){
    
    
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
    
      $scope.formdate = fromdate;
      $scope.todate = fromto;
   
      
      $scope.fetchDatagetlegderGroup(fromdate,fromto);
      
    
    
};

$scope.viewSub = function(id)
{
   
  $('.dis_'+id).toggleClass("d-flex d-none");
  //$('.dis_'+id).removeClass('d-none');
  
};

$scope.diffrence_data=[];
$scope.diff_val=0;
$scope.sub_datas = [];
$scope.fetchDatagetlegderGroup = function(fromdate,fromto){
    
  var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
    
    $http.get('<?php echo base_url() ?>index.php/report/trial_balance_report_full_copy?limit=10&formdate='+fromdate+'&fromto='+fromto+'&accountstype=<?php echo $accountstype; ?>').success(function(data){
      
      
     $scope.query = {}
      $scope.queryBy = '$';
      $scope.sub_data ={}
      
      $scope.namesDataledgergroup = data;

      angular.forEach(data,function(value){
        angular.forEach(value.sub,function(sub_val){
          $scope.sub_datas.push(sub_val);
          
          angular.forEach(sub_val.sub_data, function(sub){
            
            // console.log(sub)
          })
        })

      })

      for(var i=0; i < data.lengdiv; i++){
        // console.log(data[i])
      }
      

      // console.log($scope.sub_datas);

        var creditamount = 0;
        var debitamount = 0;
        var diff_data =[]

        for(var i = 0; i < data.length; i++){

          // $scope.sub_data =  data[i].sub;

            var creditbal = parseInt(data[i].credit);
            var debitbal = parseInt(data[i].debit);
            // $scope.diff_val = creditbal-debitbal;
            // console.log($scope.diff_val)
              creditamount += creditbal;
              debitamount += debitbal;
              // console.log(creditamount)
            // if(creditbal >0 || debitbal >0 ){
            //     diff_obj={
            //       'account_type_name':data[i].account_type_name,
            //       'diffrence' : creditbal -debitbal
            //     }
            //     diff_data.push(diff_obj)              
            // }
        }

        $scope.diffrence_data = diff_data;
       
        $scope.credittotalss = creditamount;
        $scope.debitamountdata = debitamount;
        
        
        
        
     
      

        
        
        
      
    });
    
    
  };
  
  
  
 

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>



