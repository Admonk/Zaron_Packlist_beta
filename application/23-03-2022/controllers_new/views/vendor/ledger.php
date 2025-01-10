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
                                    <h4 class="mb-sm-0 font-size-18">Vendor ledger</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Vendor ledger !</li>
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
                   
                    
                    <div class="col-lg-12" ng-init="fetchDatagetlegder(0)">
                        <p class="mb-sm-0 font-size-18">Search</p>  
                      <form>
                          <div class="row">
                              <div class="col" >
                              <select class="form-control" data-trigger name="choices-single-default"
                                                            id="choices-single-default"
                                                            placeholder="This is a search">
                                                            <option value="">Search Vendor</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($vendor as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                                                        </select>
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="from-date" value="<?php echo date('Y-m-01'); ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" value="<?php echo date('Y-m-t'); ?>">
                            </div>
                            <div class="col">
                             <select class="form-control" id="payment_status">
                                 <option value="All">All</option>
                                 <option value="Paid">Paid</option>
                                 <option value="Un-Paid">Un-Paid</option>
                             </select>
                            </div>
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata" >Export</button>
                            </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                  <div id="search-view">
                      
                     
                         
                                     <div class="card-header"  ng-init="fetchSingleData(0)">
                                        <h4 class="card-title">{{name}}</h4>
                                         <h4 class="card-title">{{phone}}</h4>
                                          <h4 class="card-title">{{gst}}</h4>
                                        <p class="card-title-desc">{{fulladdress}}
                                        </p>
                                    </div>
                  
                   
                   
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>


                          <th> No</th>
                          <th>Date</th>
                          <th>PO No</th>
                          <!--<th>PayRef</th>-->
                          <th>Charges</th>
                          <th>Payable</th>
                          <th>Paid</th>
                          <th>Status</th>
            
                        </tr>
                      </thead>
                        <tbody>
                        <tr ng-repeat="names in namesDataledger"   class="trpoint" >
                          
                          
                           <td>{{names.no}}</td>
                           <td>{{names.payment_date}} {{names.payment_time}}</td>
                           <td>{{names.order_no}}</td>
                           <!--<td>{{names.payment_mode}}</td>-->
                           <td>{{names.amount}}</td>
                           <td>{{names.Payoff}}</td>
                           <td>{{names.Payout}}</td>
                           <td>
                               
                               <span ng-if="names.paid_status=='Paid'">
                                   <span style="color:green">Paid</span>
                               </span>
                               
                               <span ng-if="names.paid_status=='Un-Paid'">
                                   <span style="color:red">Un-Paid</span>
                                   
                                   
                                   <button type="button" ng-click="onview(names.id,names.order_no,names.Payoff)" class="btn btn-soft-info btn-sm waves-effect waves-light" style="float: right;">Payout</button>
                               </span>
                               
                               
                               
                               
                            </td>
                          
                        </tr>
                        
                        
                       <tr>
                        <td ng-show="namesDataledger.length==0">
                            No data Found.                
                        </td>
                       </tr>
                        
                        <tr ng-show="namesDataledger.length>0">
                            <td>Total</td>
                            <td></td>
                            <td></td>
                            <td><b>{{amounttotal}}</b></td>
                            <td><b>{{Payofftotal}}</b></td>
                            <td><b>{{Payouttotal}}</b></td>
                            <td></td>
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

 
    <div class="modal fade" id="firstmodalcommison" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Payout To Driver</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                            
                                                            <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Bill NO <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12" >
                                                               
                                                                  
                                                                  {{bill_no}}
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                               <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Pending Amount <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                               
                                                                 <input type="text"   value="{{pendingamount}}" id="pendingamount" class="form-control">
                                                                 <input type="hidden"   value="{{payamount}}" id="payamount" class="form-control">
                                                                 <input type="hidden" value="{{payid}}" id="payid" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                            
                                                            
                                                            
                                                           
                                                            <div class="row" style="margin: 20px -9px;">
                                                          
                                                            
                                                            <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                    
                                                                 <button type="submit" class="btn btn-primary w-md" style="float: right;" ng-click="pointtodriver()">Payout Save</button>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>



<script>
$(document).ready(function(){
  $("#exportdata").hide();
});
</script>
<script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



 
 



$scope.fetchSingleData = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/vendor/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'vendor'}
    }).success(function(data){

          $scope.name = data.name;
          $scope.phone = data.phone;
          $scope.email = data.email;
          $scope.gst = data.gst;
          
          $scope.fulladdress = data.fulladdress;
        
         
     
    });
};



$scope.search = function(){
    
    var userid= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
    
    
     $('#exportdata').show();
     $scope.fetchSingleData(userid);
     $scope.fetchDatagetlegder(userid,fromdate,fromto,payment_status);
    
    
    
    
    
};

$scope.onview = function(id,billno,pendingamount){
     $('#firstmodalcommison').modal('toggle');
     
     
     $scope.bill_no=billno;
     $scope.payid=id;
     $scope.pendingamount=pendingamount;
     $scope.payamount=pendingamount;
     
  
    
};


 $scope.pointtodriver = function () {


             var enteramount= parseInt($('#pendingamount').val());
             var payid= $('#payid').val();
             var payamount= parseInt($('#payamount').val());

            
            if(enteramount>payamount)
            {
                alert('Your amount too high! change the amount');
            }
            else
            {
                
                
                
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/vendor/save_to_pay",
                        data:{'enteramount':enteramount,'payid':payid,'payamount':payamount}
                        }).success(function(data){
                          
                          
                           $scope.fetchDatagetlegder(0,0,0,0);
                           $('#firstmodalcommison').modal('toggle');
                    
                        });

                
            }
           



}





$scope.fetchDatagetlegder = function(id,fromdate,fromto,payment_status){
    

    
    $http.get('<?php echo base_url() ?>index.php/vendor/fetch_data_get_ledger_view?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status).success(function(data){
      $scope.namesDataledger = data;
      
      
      
        var amounttotal = 0;
        for(var i = 0; i < data.length; i++){
            var amount = parseInt(data[i].amount);
            amounttotal += amount;
        }
      
      
      
        $scope.amounttotal = amounttotal;
      
      
      
      
      
         var payofftotal = 0;
        for(var i = 0; i < data.length; i++){
            var Payoff = parseInt(data[i].Payoff);
            payofftotal += Payoff;
        }
      
      
      
     
      
        $scope.Payofftotal = payofftotal;
        
        
        
        
        var payouttotal = 0;
        for(var i = 0; i < data.length; i++){
            var Payout = parseInt(data[i].Payout);
            payouttotal += Payout;
        }
      
      
      
        $scope.Payouttotal = payouttotal;
      
      
      
      
     
      
      
      
      
    });
  };
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>


