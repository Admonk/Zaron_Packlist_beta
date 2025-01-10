<?php 
include "table_header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
.flex-grow-overflow-hidden {
    width: 100%;
}  
label {
    width: 100%;
}
.midtext{
    background: #ee5c17;
    color: #fff;
    padding: 3px 10px;
    border-radius: 11px;
    margin: 0px 6px;
    text-transform: capitalize;
}
.activess {
    background: aliceblue;
}
img.img-responsive {
    width: 100%;
}
p.ng-binding {
    margin-bottom: 4px;
}
p.text-muted {
    margin-bottom: 7px;
}
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     
     <?php echo $top_nav; ?>
     
     
     <div class="main-content">
            <div class="page-content pe-0 ps-0 pb-0">
                
                
                
                
                
                
                
                
                
                
                



     <div class="row">
                                       <div class="col-m-12">
                                          <div class="card mb-1">
                                             <div class="card-header align-items-start d-flex p-3">
                                                <div class="flex-shrink-0">
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('orders_process')">
                                                     
                                               
                                                            
                                                      <li class="nav-item">
                                                         <a class="nav-link "  href="<?php echo base_url(); ?>index.php/order/reconciliation_orders_list"  >
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">Reconciliation  &nbsp;&nbsp;<span class="badge rounded-pill bg-primary float-end"> {{delivered}} </span></span> 
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                        
                                                      <li class="nav-item ">
                                                         <a class="nav-link"  href="<?php echo base_url(); ?>index.php/order/reconciliation_orders_list_trip_group"  >
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Reconciliation Trip Group &nbsp;&nbsp;<span class="badge rounded-pill bg-primary float-end"> {{delivered}} </span></span>   
                                                         </a>
                                                      </li> 
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link active" href="<?php echo base_url(); ?>index.php/order/reconciliation_orders_list_self"  >
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Reconciliation Shop &nbsp;&nbsp;<span class="badge rounded-pill bg-primary float-end"> {{Self}} </span></span>   
                                                         </a>
                                                      </li> 
                                                      
                                                      
                                                         
                                                      <!-- <li class="nav-item">
                                                         <a class="nav-link" href="<?php echo base_url(); ?>index.php/order/finance_orders_list?status=6"  >
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Bank Transfer & Cheque Payment Pending  &nbsp;&nbsp;<span class="badge rounded-pill bg-danger float-end"> {{b_c_pending}} </span></span>   
                                                         </a>
                                                       </li>-->
                                                      
                                                      
                                                       <li class="nav-item ">
                                                         <a class="nav-link"  href="<?php echo base_url(); ?>index.php/order/finance_orders_list?status=5"  >
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Reconciliation Completed Orders &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{reconciliation}} </span></span>   
                                                         </a>
                                                      </li> 
                                                      
                                                      
                                                   
                                                 <li class="nav-item ">
                                                         <a class="nav-link"  href="<?php echo base_url(); ?>index.php/order/finance_reconciliation_orders_list"  >
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Weight update</span>   
                                                         </a>
                                                      </li> 
                                                      
                                                      
                                                   
      
                                                      
                                             
                                      
                                               </li>
                                                  
                                                      
                                                   </ul>
                               


                                                </div>
                                             </div>
                                             <!-- end card header -->
                                             <!-- end card-body -->
                                          </div>
                                       </div>
                                    </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
               <div class="flex-row-grow">
                   
             
                 
                  
                  
                  
                  
                  
                  
                  <input type="hidden" id="v_id">
                  
                  
                    <div class="col-md-6" ng-init="fetchRouteorder('orders_process',10000,45)">
                     <div class="active-order-sidebar h-100">
                        <div class="row">
                           
                           <div class="col-md-12">
                              <div class="px-3">
                               <input type="text" placeholder="search" class="form-control" ng-model="query[queryBy]">
                               </div>
                           </div>
                           
                           
                           
                        </div>


                        <div class="row">
                           <div class="col-12">
                              <div class="active-trip-tracking p-3" >

                                    <div class="card" ng-repeat="names in namesData | filter:query">
                                          <div class="card-body" ng-click="getorderid(names.order_id)" ng-class="{activess : activeMenu === names.order_id}">
                                              
                                              
                                             <a href="#">
                                              
                                              <h5 class="card-title font-size-13">{{names.no}} . Payment Mode : {{names.payment_mode}}  <small class="text-truncate mb-0 midtext"> {{names.delivery_mode}}</small>
                                               
                                             </h5>
                                             
                                           
                                              <p class="text-muted "><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Order Date : {{names.trip_end_date}}</b> </p>
                                            
                                             </a>
                                             
                                          </div>
                                    </div>

                              </div>
                           </div>
                        </div>
                     </div>
                   </div>
                 
                 
                 
                 <div class="col-md-6" >
                     
                      <div class="active-order-sidebar h-100">
                     

                        <div class="row">
                           <div class="col-12">
                              <div class="active-trip-tracking p-3" >

                                    <div class="card" >
                                          <div class="card-body" ng-repeat="namesorderid in namesDataorderid">
                                                 
                                                 
                                                <p><b style="font-size:12px;">Total Amount : {{namesorderid.totalamount}}</b></p>
                                                <p ng-if="namesorderid.tcsamounttotal>0"><b style="font-size:12px;" >Total TCS (+) : {{namesorderid.tcsamounttotal}}</b></p>
                                                <p><b style="font-size:12px;">Payment Mode : {{namesorderid.payment_mode}}</b></p>
                                                <p><b style="font-size:12px;">Order By : {{namesorderid.sales_name}}</b></p>
                                              
                                               <span ng-if="namesorderid.payment_mode=='Cash'">
                                                   
                                                       <table  class="table">
                                                       <tr><td><b>Denomination</b></td><td></td><td></td></tr>
                                                       
                                                       <tr><td>1 * </td><td>{{c1rs}}</td><td>{{c1rs_s}}</td></tr>
                                                       <tr><td>2 * </td><td>{{c2rs}}</td><td>{{c2rs_s}}</td></tr>
                                                       <tr><td>5 * </td><td>{{c5rs}}</td><td>{{c5rs_s}}</td></tr>
                                                       
                                                       <tr><td>10 * </td><td>{{c10rs}}</td><td>{{c10rs_s}}</td></tr>
                                                       <tr><td>20 * </td><td>{{c20rs}}</td><td>{{c20rs_s}}</td></tr>
                                                       <tr><td>50 * </td><td>{{c50rs}}</td><td>{{c50rs_s}}</td></tr>
                                                       <tr><td>100 *</td><td> {{c100rs}}</td><td>{{c100rs_s}}</td></tr>
                                                       <tr><td>200 * </td><td>{{c200rs}}</td><td>{{c200rs_s}}</td></tr>
                                                       <tr><td>500 * </td><td>{{c500rs}}</td><td>{{c500rs_s}}</td></tr>
                                                       <tr><td>2000 * </td><td>{{c2000rs}}</td><td>{{c2000rs_s}}</td></tr>
                                                       <tr><td>Denomination Total </td><td></td><td><span  >{{denomination_total}}</tr>
                                                       
                                                 </table>
                                                   
                                               </span>
                                               
                                             
                                              
                                             
                                              <div class="form-group row">
                                                  
                                                  
                                                <label class="col-sm-12 col-form-label">Date <span style="color:red;">*</span>
                                                <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="payment_date">
                                                </label>
                                                  
                                                  
                                                <label class="col-sm-12 col-form-label">Collected  Payment <span style="color:red;">*</span></label>
                                                <div class="col-sm-12">
                                                    
                                                    
                                                 <span ng-if="namesorderid.payment_mode=='Cheque'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="{{namesorderid.totalamount}}" readonly name="collectamount" id="collectamount" type="text">
                                                 </span>
                                                 
                                                 <span ng-if="namesorderid.payment_mode=='Bank Transfer'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="{{namesorderid.totalamount}}" readonly name="collectamount" id="collectamount" type="text">
                                                 </span>
                                                 
                                                 <span ng-if="namesorderid.payment_mode=='No Collection'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="0" name="collectamount"  readonlyid="collectamount" type="text">
                                                 </span>
                                                 
                                                 
                                                 <span ng-if="namesorderid.payment_mode=='Cash'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="{{denomination_total}}" readonly name="collectamount" id="collectamount" type="text">
                                                 </span>
                                                 
                                                </div>
                                              </div>
                                              
                                              
                                               <div class="form-group row" id="bankaccount_customer_view" style='display:none;'ng-if="namesorderid.payment_mode!='Cash'">
                                                                <label class="col-sm-12 col-form-label">Bank Account </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  
                                                                  <select class="form-control" name="bankaccount" id="bankaccount_customer">
                                                                      
                                                                      
                                                                      <option value="0">Select Bank</option>
                                                                       <?php
                                                                       
                                                                       foreach($bankaccount as $val)
                                                                       {
                                                                           ?>
                                                                           <option value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option>
                                                                           <?php
                                                                       }
                                                                       
                                                                       ?>
                                                                      
                                                                  </select>
                                                                  
                                                                  
                                                                </div>
                                                </div>
                                                        
                                              <br>
                                              <div class="form-group row" id="displayset">
                                                  
                                                  
                                                        <input type="hidden" name="hidden_id" id="hidden_id" value="{{namesorderid.order_id}}">
                                                  
                                                        <span ng-if="namesorderid.payment_mode=='Cash'">   
                                                        <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" style="width:100%;" id="paymentrecived" ng-click="paymentrecived()" type="submit" value="Reconcile Completed">
                                                        </span>
                                             
                                                        <span ng-if="namesorderid.payment_mode!='Cash'">   
                                                        <input class="btn btn-danger w-lg btn-rounded waves-effect waves-light" style="width:100%;" id="paymentrecived" ng-click="paymentrecived()" type="submit" value="Reconcile Pending">
                                                        </span>
                                             
                                             
                                             
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
            <!-- End Page-content -->
         </div>


   </div>
   
   
   
  

   
 <script>
 

 

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;


  $scope.modechangess='0';

   $scope.modechange = function() {
  
  
  
    var mode= $('#cashmode').val();
    
      if(mode=='NEFT/RTGS')
      {
          
         
          $('#base_title').html('Bank Account');
          var data='<option value="0">Select Bank</option> <?php foreach($bankaccount as $val) { if($val->id!=25 && $val->id!=24) { ?> <option value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
           $('#reference_no_view').show();
           $('#bankaccountshow').show();
      }
      if(mode=='Petty Cash')
      {
          
          $('#base_title').html('Cash Account');
          var data='<option value="0">Select Petty Cash</option> <?php foreach($bankaccount as $val) { if($val->id==24) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
          $('#reference_no_view').show();
          $('#bankaccountshow').show();
          
      }
    
  
  
   }
  

 $scope.routeOrder = function(id,name) {
  
   $scope.activeMenuf = id
   $scope.fetchRouteorder('orders_process',10000,id);
   $scope.vehicle_number = name;
   var v_id= $('#v_id').val(id);
  
 }
 
 
 $scope.checkDriverpay = function() {
     
         if($("#paid_driver").is(':checked')) {
              
                $('#showpaymentmode').show();
           
          }
          else
          {
                 $('#showpaymentmode').hide();
                 $('#reference_no_view').hide();
                 $('#bankaccountshow').hide();
                 
          }
          
          
          
 }

  
 $scope.checkCustomerpay = function() {
     
         if($("#paid_customer").is(':checked')) {
              
                $('#bankaccount_customer_view').show();
           
          }
          else
          {
                 $('#bankaccount_customer_view').hide();
                 
                 
          }
          
          
          
 }

 
 
 
   $scope.getorderid = function(id) {
  
     $('#displayset').show();
       $scope.activeMenu = id
       $scope.fetchorderidDetails('orders_process',10000,id);
       $scope.cashmode('orders_process',2,id);
     $('#paymentrecived').show();
  
  }
 


  $scope.fetchRouteorder = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_delivered_order_list_with_retail_shop?tablename='+tabelename+'&order_base='+status+'&vehicle_id='+id).success(function(data){
      
      
      $scope.query = {}
      $scope.queryBy = '$';
      $scope.namesData = data;
      
    });
  };
  
 
 
   $scope.fetchVehicle = function(id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_delivered?status='+id).success(function(data){
      
      $scope.queryv = {};
      $scope.queryByv = '$';
      
      $scope.namesDatavehicle = data;
    });
  };
  
  
  $scope.fetchDriver = function(){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_driver').success(function(data){
      $scope.namesDataDriver = data;
    });
  };
  
 

 
 
 
 
  $scope.fetchorderidDetails = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_delivered_order_list_by_id_retail?tablename='+tabelename+'&order_base='+status+'&order_id='+id).success(function(data){
      $scope.namesDataorderid = data;
    });
  };
  
  $scope.cashmode = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/cash_mode_retails?tablename='+tabelename+'&order_base='+status+'&order_id='+id).success(function(data){
     
         
     $scope.c1rs = data.c1rs;
  $scope.c2rs = data.c2rs;
  $scope.c5rs = data.c5rs;
  
  
     $scope.c10rs = data.c10rs;
     $scope.c20rs = data.c20rs;
     
      $scope.c50rs = data.c50rs;
      $scope.c100rs = data.c100rs;
      $scope.c200rs = data.c200rs;
      $scope.c500rs = data.c500rs;
      $scope.c2000rs = data.c2000rs;
      
        $scope.c1rs_s = data.c1rs_s;
       $scope.c2rs_s = data.c2rs_s;
       $scope.c5rs_s = data.c5rs_s;
      
      $scope.c10rs_s = data.c10rs_s;
      $scope.c20rs_s = data.c20rs_s;
      
      $scope.c50rs_s = data.c50rs_s;
      $scope.c100rs_s = data.c100rs_s;
      $scope.c200rs_s = data.c200rs_s;
      $scope.c500rs_s = data.c500rs_s;
      $scope.c2000rs_s = data.c2000rs_s;
      
      $scope.denomination_total = data.denomination_total;
      $scope.denomination_totalexe = data.denomination_totalexe;
      
      
    });
  };
  
 
 
 
 
 $scope.paymentrecived = function(){
     
     
     
     
    var v_id= $('#v_id').val();
    var collectamount= $('#collectamount').val();
    var order_id= $('#hidden_id').val();
    var driver_id= $('#driver_id').val();
    var customer_id= $('#customer_id').val();
    var fulltotal= $('#fulltotal').val();
   
    var payment_date= $('#payment_date').val();
    var payment_mode= $('#cashmode').val();
    var reference_no= $('#reference_no').val();
    var bankaccount= $('#bankaccount').val();
    var bankaccount_customer= $('#bankaccount_customer').val();
    if (bankaccount_customer == null){
           var bankaccount_customer=0;
    }
    
    
 
      var customer_paid=1;
    
   
      
      $('#paymentrecived').hide();
    
    
        $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/payment_collected_self",
        data:{'order_id':order_id,'payment_date':payment_date,'bankaccount_customer':bankaccount_customer,'collectamount':collectamount,'bankaccount':bankaccount,'reference_no':reference_no,'payment_mode':payment_mode}
        }).success(function(data){
    
          alert('Payment Collected');
          $scope.fetchRouteorder('orders_process',10000,v_id);
          $scope.fetchorderidDetails('orders_process',10000,v_id);
          $('#displayset').show();
    
        });

    
    
    
    
    
     
     
 };
   
     
     
 $scope.fetchRoute = function(){
    $http.get('<?php echo base_url() ?>index.php/order/group_gy_route').success(function(data){
      $scope.namesRoute = data;
    });
  };





$scope.getcount = function (tabelename) {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/getcount_finance?tablename="+tabelename,
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.pending = data.pending;
            $scope.cancel =  data.cancel;
            $scope.proceed =  data.proceed;
            $scope.request =  data.request;
            $scope.transpot =  data.transpot;
            $scope.delivered =  data.delivered;
            $scope.reconciliation =  data.reconciliation;
             $scope.b_c_pending =  data.b_c_pending;
             
              $scope.Self =  data.Self;
             
             
             

    });



}






});





</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>


