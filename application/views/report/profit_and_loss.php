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
                                    <h5 class="mb-sm-0 mt-3 font-size-15">TRADING AND PROFIT OR LOSS ACCOUNT </h5>

                                  

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
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                          
                           
                          <div class="row" style="margin-bottom:50px;">
                              
                          
                    <h5 class="mb-sm-0 mt-3 font-size-15">TRADING ACCOUNT </h5>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <form class="ng-pristine ng-valid">
                          <div class="row">
                                
                            
                            
                             
                            
                            <div class="col">
                                <label>From date</label>
                              <input type="date" class="form-control" min="<?php echo date('2023-10-01'); ?>" id="from-date" value="<?php echo date('2023-10-01'); ?>">
                            </div>
                            <div class="col">
                                <label>To date</label>
                              <input type="date" class="form-control" min="<?php echo date('2023-10-01'); ?>" id="to-date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            
                           
                            
                            
                            
                             <div class="col">
                                 
                             <button type="button" style="margin: 27px 0px;" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                            
                             
                             </div>
                           
                          </div>
                      </form>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                         <div class="col-md-6" style="border-right: #919191 solid 1px;">
                         <div class="table-responsive">                
                 

                   
                   <table ng-init="fetchDatagetlegderGroup2(0)" border="yes">
  <tr>
    <th>Particulars</th>
    <th> Amount </th>
   <!-- <th> Amount </th> -->
  </tr>
  
  <tbody ng-repeat="names in namesDataledgergroup2">
      
  
  
   
 
  <tr class="trpoint" ng-click="viewSub(names.id)" >

    <td> <b > <a href="#"  style="color: #ef7b3f;font-weight: 800;">{{names.name}}</a> </b> <i class="fa fa-angle-down" style="float:right;"></i></td> 

    <!-- <td></td> -->
    <td><b ng-if="names.debit!=0"><a href="#" >{{names.credit | number}}</a></b></td>
     
</tr>
    

   <tr class="trpoint dis_{{names.id}} d-none" ng-repeat="namesvv in names.resultsub | orderBy:'name' ">
       
       <td>  <a href="{{namesvv.url}}">{{namesvv.name}}</a>  </td>
       <!-- <td> <span  ng-if="namesvv.viewstatus==1">{{namesvv.credit | number}} </span> </td> -->
       <td>
           
           <span  ng-if="namesvv.id==120">{{namesvv.credittot | number}} </span> 
           
           <span  ng-if="namesvv.id !=120">{{namesvv.credit | number}}</span>
       
        
       
       </td>
   
   
   </tr>
    
  
    
  

 </tbody>
  
 
                        <tr ng-if='atotal<btotal'>
                          
                           <th><b>GROSS PROFIT C/F TO P&L ACCOUNT</b></th>
                           <!-- <th></th> -->
                           <th><b>{{btotal-atotal | number}}</b></th>
                           
                           
                         
                       </tr>
                      
 
                       <tr>
                          
                           <th><b>Total </b></th>
                           <!-- <th></th> -->
                           <th>
                              
                               
                               <b ng-if='atotal==btotal'>{{atotal | number}}</b>
                               <b ng-if='atotal>btotal'>{{atotal | number}}</b>
                               <b ng-if='atotal<btotal'>{{btotal | number}}</b>
                               
                           </th>
                           
                       </tr>
     
 
  
</table>
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                    </div>
                    </div>
                   
                   
                         <div class="col-md-6">
                        <div class="table-responsive">                
                   
                   
                
                   
           
           
           
                   <table ng-init="fetchDatagetlegderGroup3(0)" border="yes">
  <tr>
    <th>Particulars</th>
    <th> Amount </th>
    <!-- <th> Amount </th> -->
  </tr>
    
  
  
    <tbody ng-repeat="names in namesDataledgergroup3 | filter:queryss">
      
   
 
    <tr class="trpoint" ng-click="viewSub(names.id)" >
    <td> <b > <a href="#"  style="color: #ef7b3f;font-weight: 800;">{{names.name}}</a> </b> <i class="fa fa-angle-down" style="float:right;"></i></td> 

<!-- <td></td> -->
    <td><b ng-if="names.debit!=0"><a href="#" >{{names.credit | number}}</a></b></td>
     
</tr>
   <tr class="trpoint dis_{{names.id}} d-none" ng-repeat="namesvv in names.resultsub | orderBy:'name' ">
       
       <td>  <a href="{{namesvv.url}}" >{{namesvv.name}}</a>  </td>
   
   <!-- <td> <span  ng-if="namesvv.viewstatus==1">{{namesvv.credit | number}}</span> </td> -->
   <td>
       
       <span  ng-if="namesvv.viewstatus==0">{{namesvv.credit | number}} </span> 
       <!-- <span  ng-if="namesvv.id==2">{{namesvv.credittot | number}} </span>  -->
      
       
       </td>
   
   </tr>
    
 
 
    
  

 </tbody>
    
     
                      <tr ng-if='atotal>btotal'>
                          
                           <th><b>GROSS LOSS (TRANSFER TO P & L A/C)</b></th>
                           <!-- <th></th> -->
                           <th><b>{{atotal-btotal | number}}</b></th>
                           
                           
                         
                       </tr>
                       
                      
                      <tr>
                          
                          <th><b>Total</b></th>
                          <!-- <th></th> -->
                          <th>
                              
                               <b ng-if='atotal==btotal'>{{btotal | number}} </b>
                              <b ng-if='atotal<btotal'>{{btotal | number}} </b>
                              <b ng-if='atotal>btotal'>{{atotal | number}}</b>
                              
                            
                              
                           </th>
                           
                      </tr>
     
                     
 
  
</table>
                   
                   
                   
                   
                   
                   
                    </div>
                    </div>
                   
                   
                        </div>
                   
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                           
                           
                          <div class="row" style="margin-bottom:50px;">
                              
                          
                    <h5 class="mb-sm-0 mt-3 font-size-15">PROFIT OR LOSS ACCOUNT </h5>
                         <div class="col-md-6" style="border-right: #919191 solid 1px;">
                         <div class="table-responsive">                
                 

                   
                   <table ng-init="fetchDatagetlegderGroup1(0)" border="yes">
  <tr>
    <th>Particulars</th>
   
   <!-- <th> Amount </th> -->
      <th> Amount </th>

  </tr>
    <tr ng-if='atotal>btotal'>
                          <td><b>GROSS LOSS (TRANSFER TO P & L A/C)</b> </td>
                          <td><b>{{atotal-btotal | number}}</b></td>
                         </tr>
  <tbody ng-repeat="names in namesDataledgergroup1">
      
  
  
   
 
  <tr class="trpoint" ng-click="viewSub(names.id)" >
    <td> <b > <a href="#"  style="color: #ef7b3f;font-weight: 800;">{{names.name}}</a> </b> <i class="fa fa-angle-down" style="float:right;"></i></td> 

 <!-- <td> </td> -->
    <td><b ng-if="names.debit!=0"><a href="#" >{{ names.credit | number}}</a></b></td>
    
</tr>
    
   <tr class="trpoint dis_{{names.id}} d-none"  ng-repeat="namesvv in names.resultsub | orderBy:'name'">
    <td >  <a href="{{namesvv.url}}" >{{namesvv.name}}</a>  </td>

 <!-- <td>{{namesvv.credit > 0 ? namesvv.credit : ''  | number}}</td> -->
  <td>{{namesvv.debit ? namesvv.debit : '' | number}} </td>
 </tr>
    

    
  

 </tbody>
  
                     
                        <tr class="left">
                          
                           <th><b>NET PROFIT C/F FROM CAPITAL ACCOUNT</b></th>
                           
                          <!-- <th></th> -->
                           <th><b id="net_profit"></b></th>
                           
                       </tr>
                      
 
                       <tr>
                          
                           <th><b>Total </b></th>
                            <!-- <th></th> -->
                            <input type="hidden" id="left_val" value="{{atotal-btotal+ctotal}}">
                            <th> <b id="left_total">{{atotal-btotal+ctotal | number}}</b> </th>
                          
                           
                       </tr>
     
                       
     
 
  
</table>
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                    </div>
                    </div>
                   
                   
                         <div class="col-md-6">
                        <div class="table-responsive">                
                   
                   
                
                   
           
           
           
                   <table ng-init="fetchDatagetlegderGroup(0)" border="yes">
  <tr>
    <th>Particulars</th>
   
    <th> Amount </th>
  </tr>
  
  
                         <tr ng-if='atotal<btotal'>
                          <td><b>GROSS PROFIT B/F FROM TRADING ACCOUNT</b> </td>
                          <td><b>{{btotal-atotal | number}}</b></td>
                         </tr>
                       
  
  
    <tbody ng-repeat="names in namesDataledgergroup | filter:queryss">
      
  
   
 
  <tr ng-if="names.name!=0"><td><b><a href="#" ng-click="viewSub(names.id)"  style="color: #ef7b3f;font-weight: 800;">{{names.name}}</a> </b> </td> <td>{{ names.credit | number}}</td></tr>
    
    
   <tr ng-repeat="namesvv in names.resultsub" class="trpoint dis_{{names.id}} d-none">


    <td><a href="{{namesvv.url}}" >{{namesvv.name}}</a>  </td> <td>{{namesvv.credit | number}}</td>

  </tr>
    
  
    
 
 
    
  

 </tbody>
    
     
                       <tr class="right">
                          
                            <th><b>NET LOSS (TRANSFER TO CAPITAL A/C)</b></th>


                            <input type="hidden" id="last_total" value="{{dtotal}}">
                        
                            <th><b id="net_loss"></b></th>
                           
                           
                         
                       </tr>
                       
                      
                      <tr>
                          
                          <th><b>Total </b>


                        <input type="hidden" id="right_val" ng-if='atotal<btotal' value="{{btotal-atotal+dtotal}}">
                        <input type="hidden" id="right_val" ng-if='atotal>btotal' value="{{dtotal}}">

                          </th>
                        
                          <th>

                            <b id="last_total_right" ng-if='atotal<btotal'>{{btotal-atotal+dtotal | number}} </b>
                            <b id="last_total_right" ng-if='atotal>btotal'>{{dtotal | number}} </b>

                            
                              
                             <!--   <b ng-if='ctotal==dtotal'>{{dtotal | number}} </b>
                              <b ng-if='ctotal<dtotal'>{{dtotal | number}}</b>
                              <b ng-if='ctotal>dtotal'>{{ctotal | number}}</b> -->
                              
                            
                              
                           </th>
                           
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
        if (! isNaN(input)) {
          if(input != 0 && input != null){
              if (isNaN(input)) return input;
        var formattedValue = parseFloat(input);
        // console.log(input.toLocaleString('en-IN').toFixed(2));
         var decimal =  formattedValue.toLocaleString('en-IN', {   minimumFractionDigits: 2, maximumFractionDigits: 2 });

        return decimal
      }else{
        return '0';
      }
      

        }
    }
});

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;
  $scope.getproductval = 'ALL';


  $scope.viewSub = function(id)
{
  //  alert(id);
  $('.dis_'+id).toggle();
  $('.dis_'+id).removeClass('d-none');
  
};

$scope.search = function(){
    
      
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
       
      //$scope.formdate = fromdate;
     // $scope.todate = fromto;
     $scope.fetchDatagetlegderGroup(fromdate,fromto);
     $scope.fetchDatagetlegderGroup2(fromdate,fromto);
     $scope.fetchDatagetlegderGroup3(fromdate,fromto);
     $scope.fetchDatagetlegderGroup1(fromdate,fromto);
    
};
  

$scope.fetchDatagetlegderGroup = function(fromdate,fromto){
    
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    
    $http.get('<?php echo base_url() ?>index.php/report/trial_balance_report?limit=10&formdate='+fromdate+'&fromto='+fromto).success(function(data){
      
      
     $scope.query = {}
      $scope.queryBy = '$';
      
      
      $scope.namesDataledgergroup = data;
      
      
      
      

        
        
        var pendingamount = 0;
        for(var i = 0; i < data.length; i++){
            var pending_balance = parseInt(data[i].credit);
              pendingamount += pending_balance;
        }
      
        $scope.dtotal = pendingamount;
        
        
        
        
        
      
    });
    
    
  };
  
  
  
  
$scope.fetchDatagetlegderGroup2 = function(fromdate,fromto){
    
var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    
    $http.get('<?php echo base_url() ?>index.php/report/trial_balance_report2?limit=10&formdate='+fromdate+'&fromto='+fromto).success(function(data){
      
      
     $scope.query = {}
      $scope.queryBy = '$';
      
      
      $scope.namesDataledgergroup2 = data;
      
      
      // console.log(data)
      

        
       
        var pendingamount = 0;
        var total_credit=0;
        var total_debit=0;
        $scope.total_sum1=0;
        for(var i = 0; i < data.length; i++){
            var pending_balance = parseInt(data[i].credit);
            
             pendingamount += pending_balance;

             if(data[i] != 119){
               var sub_arr = data[i].resultsub;

               for(var l=0; l < sub_arr.length; l++){
                // console.log(sub_arr[l])
                if(sub_arr[l].credit > 0){
                   total_credit += parseInt(sub_arr[l].credit)
                    console.log(total_credit);
                 }else{

                   total_debit += parseInt(sub_arr[l].credit)
                 }
               
               
               }

             }
            
        }

        
        
       
        $scope.atotal = Math.abs(pendingamount);
        $scope.total_sum1 = Math.abs(total_credit - total_debit);
        
        
        
      
    });
    
    
  };
  
  
  
  
$scope.fetchDatagetlegderGroup3 = function(fromdate,fromto){
    
var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    
    $http.get('<?php echo base_url() ?>index.php/report/trial_balance_report3?limit=10&formdate='+fromdate+'&fromto='+fromto).success(function(data){
      
      
     $scope.query = {}
      $scope.queryBy = '$';
      
      
      $scope.namesDataledgergroup3 = data;
      
      
      
      

        
        
        var pendingamount = 0;
        for(var i = 0; i < data.length; i++){
            var pending_balance = parseInt(data[i].credit);
              pendingamount += pending_balance;
        }
      
        $scope.btotal = Math.abs(pendingamount);
        
        
        
        
        
      
    });
    
    
  };
  
  
  
  
  
$scope.fetchDatagetlegderGroup1 = function(fromdate,fromto){
    
var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    
    $http.get('<?php echo base_url() ?>index.php/report/trial_balance_report1?limit=10&formdate='+fromdate+'&fromto='+fromto).success(function(data){
      
      
     $scope.queryss = {}
      $scope.queryByss = '$';
      
      
      $scope.namesDataledgergroup1 = data;
      
      
      
      
     
        
        
        var pendingamount = 0;
        var total_credit= 0;
        var total_debit = 0;
        $scope.total_sum = 0;
        for(var i = 0; i < data.length; i++){
            var pending_balance = parseInt(data[i].credit);
              pendingamount += pending_balance;

               var sub_arr = data[i].resultsub;

               for(var l=0; l < sub_arr.length; l++){
                
                total_credit += parseInt(sub_arr[l].credit)
                total_debit += parseInt(sub_arr[l].debit)
               }
        
        }
      
      // console.log(total_credit);
        $scope.ctotal = pendingamount;
         $scope.total_sum = Math.abs(total_credit - total_debit);
        
        
        
        
      
    });
    
    
  };
  
  
  
  

  
  

});

$('.left').hide();
$('.right').hide();
function myFunction()
{

   let options = { minimumFractionDigits: 2, maximumFractionDigits: 2 };
   var right_val=$('#right_val').val();



   //console.log(right_val);


   var left_val=parseInt($('#left_val').val());
   var last_total=parseInt($('#last_total').val());

   
   var net_loss=left_val-last_total;
   var net_profit=right_val-left_val;
  






   if(left_val>right_val)
   {
      $('.left').hide();
      $('.right').show();


       var left_val = left_val.toLocaleString('en-IN', options);
   var net_loss = net_loss.toLocaleString('en-IN', options);

      $('#net_loss').text(net_loss);
       $('#last_total_right').text(left_val);


   }
   else
   {

    var net_profit = net_profit.toLocaleString('en-IN', options);
    var right_val = right_val.toLocaleString('en-IN', options);
    $('#net_profit').text(net_profit);
    $('#left_total').text(right_val);


      $('.right').hide();
      $('.left').show();
   }
  

}

setInterval(myFunction, 3000);
</script>
    <?php include ('footer.php'); ?>
</body>



