<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
   
  
 div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
}
img.img-responsive {
    width: 100%;
}
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>
     
     
     
     
     
     
     
     
     
     
     
     
       <div class="main-content">
            <div class="page-content">
               <div class="container-fluid">
                   
                   
                         <div class="row">
                            <div class="col-12">
                                          
                                          <div class="row">
                                              
                                              <div class="col-12">
                                                  <div class="card shadow-none">
                                                      <div class="card-body">
                                                             <!--datatable="ng" dt-options="vm.dtOptions"-->
                                                            <input type="hidden" id="nextnumber" value="0">   
                                                            <input type="hidden" id="prenumber" value="10">  
                                                            <input type="hidden" id="pageSize" value="10">  
                                                            <input type="hidden" id="order_base" value="3">
                                                            <input type="hidden" id="assign" value="11">
                                                           
                                                           
                                                                                <div class="row" style="margin-bottom: 10px;">                                    
                                                                                <div class="col-sm-3" style="display:none;">
                                                                                <div class="dataTables_length" id="example_length">
                                                                                    <label>
                                                                                        Records
                                                                                    <select name="example_length" aria-controls="example" class="form-control input-sm" ng-model="pageSize" ng-change="pageSizeChanged()">
                                                                                        <option value="10">10</option>
                                                                                        <option value="25">25</option>
                                                                                        <option value="50">50</option>
                                                                                        <option value="100">100</option>
                                                                                        <option value="1000">1000</option>
                                                                                    </select> </label>
                                                                                </div>
                                                                             </div>
                                                                            <div class="col-md-3">
                                                                          
                                                                                
                                                                            </div>
                                                                             <div class="col-md-6">
                                                                          
                                                                                <input type="search" class="form-control" placeholder="Search Order No , Customer Name ,Customer Phone, Vehicle No , Driver, Sales Person, Trip ID"  aria-controls="example" id="searchText" ng-model="searchText" ng-change="searchTextChanged()">
                                                                            
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                          
                                                                               
                                                                            </div>
                                                                           </div>
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
 <div class="row">
     
     
     
     
  <div class="col-xl-12 mb-4" ng-repeat="name in namesData">
    <div class="card">
      <div class="card-body">
      
          <div class="d-flex align-items-center">
            
            <div class="col-md-3" >
                <h4 style="color: #ff5e14;font-size: 12px;">Order Customer </h4>
                    
              <p class="fw-bold mb-1">DC ID : {{name.randam_id}}</p>
              <p class="fw-bold mb-1">{{name.order_no}}</p>    
              <p class="fw-bold mb-1">{{name.name}}</p>
              <p class="text-muted mb-0" ng-if="name.phone!=0">{{name.phone}}</p>
               

            </div>
            
             <div class="col-md-3">
                <h4 style="color: #ff5e14;font-size: 12px;">Order Value </h4>
                    
               
              <p class="fw-bold mb-1">Bill Amount : {{name.totalamount | number:2}}</p> 
              <p class="fw-bold mb-1">Amount to collect  : {{name.collection_remarks | number:2}}</p>   
              <p class="fw-bold mb-1">Delivery charges : {{name.delivery_charge | number:2}}</p>    
              <p class="fw-bold mb-1">Bill Loaded  : {{name.loadamount}}</p>
              <p class="fw-bold mb-1">Payment Mode : {{name.payment_mode}}</p>
              <p class="text-muted mb-1">Delivery Scope :  {{name.delivery_status}} <span ng-if="name.delivery_charge!=0">Delivery Charges :  {{name.delivery_charge}}</span></p>


            </div>
            
            
            <div class="col-md-3">
                <h4 style="color: #ff5e14;font-size: 12px;">Vehicle Details </h4>
                    
               
              <p class="fw-bold mb-1">Vehicle No : {{name.vehicle_number}}</p>    
              <p class="fw-bold mb-1">Driver  : {{name.order_byd}}</p>
               <p class="fw-bold mb-1">Trip ID  : {{name.trip_id}}</p>
              <p ng-if="name.gate_weight>0">Gate Weight  : {{name.gate_weight}}</p>
              <p class="text-muted mb-1" ng-if="name.assign_date!='01-01-1970'">Assigned Date & Tme :  {{name.assign_date}} {{name.assign_time}} </p>
              
            </div>
            
            
            
             <div class="col-md-3">
                 
                        <p style="font-weight:800;">
                            Status : 
                     <span ng-if="name.order_base==0">
                                                                             
                                                                               Open Order
                                                                         
                                                                               </span>
                                                                               
                                                                               <span ng-if="name.order_base!=0">
                                                                             
                                                                               {{name.reason}}
                                                                         
                                                                               </span>
                                                                               
                                                                               
                                                                               <span ng-if="name.order_base==-1">
                                                                             
                                                                                 Canceled
                                                                         
                                                                               </span>
                                                                               
                      </p>
                      <p>
                      <span ng-if="name.start_reading>0">Start Reading KM : {{name.start_reading}}</span>
                      <span> End Reading KM : {{name.km_reading_end}}</span>
                      </p>

                      <p ng-if="name.total_km>0">Total KM : {{name.total_km}}</p>
                      <p>Ordered By : {{name.order_by}}  </p>

                      <p>Create Date : {{name.create_date}}  </p>
                      <p>Delivery confirmed By : {{name.delivery_confirm_person}}  </p>
                      <p>Date & Time : {{name.delivery_confirm_date_time}}  </p>
                 </div>
          </div>
          
      </div>
      <div
        class="card-footer border-0 bg-light p-2 d-flex justify-content-around"
      >
       <!-- <a
          target="_blank"
          class="btn btn-link m-0 text-reset"
          href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}"
          role="button"
          data-ripple-color="primary"
          >View Order <i class="fas fa-eye ms-2"></i
        ></a>-->


        
        <a
          target="_blank"
          class="btn btn-link m-0 text-reset"
          href="<?php echo base_url(); ?>index.php/order/overview?order_id={{name.base_id}}&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process&viewstatus=0&order_no={{name.order_no}}"
          role="button"
          data-ripple-color="primary"
          >Overview <i class="fas fa-print ms-2"></i
        ></a>
       
       
       
       


<?php

 $access=array('1','10','6','21','15');
     if(in_array($this->session->userdata['logged_in']['access'], $access))
     {

        ?>



        <span class="btn btn-outline-danger font-size-11" ng-if="name.assign_status==11 || name.assign_status==12"><a href="#" ng-click="removeAssign(name.id,name.randam_id)">Un-Assign</a></span>
                            
                            
        <span class="btn btn-outline-danger font-size-11" ng-if="name.assign_status==11 || name.assign_status==12 || name.assign_status==1 || name.assign_status==2"><a href="#" ng-click="removeAssignCallback(name.id,name.randam_id)">Call Back</a></span>
                                                                                                                                                                       
       
       <span class="btn btn-outline-primary font-size-11" ng-if="name.assign_status==11 || name.assign_status==12 || name.assign_status==1"><a href="<?php echo base_url(); ?>index.php/order/pickup_orders_list_view?id={{name.id}}&driver_pickip=0&DC_id={{name.randam_id}}" target="_blank">Loading / Pickup </a></span>

<?php
       }
?>



                









        <span ng-if="name.assign_status==3 || name.assign_status==4"> <a
          href="javascript:void(0);" ng-click="getorderid(name.id,name.order_no,name.selforder)"
          class="btn btn-link m-0 text-reset"
         
          role="button"
          data-ripple-color="primary"
          >Payment View<i class="fa fa-money ms-2"></i
        ></a>
        </span>



      </div>
    </div>
  </div>
 
   <div class="col-xl-12 mb-4" ng-show="namesData.length==0"><p style="text-align: center;" colspan="11">No Data Found..</p></div>
  
</div>
                                                          
                                                          
                                                          
                                                          
                                                          
                                                          
                                                          
                                                          
                                                          
                                                          
                                                            <div class="row" id="showresult" style="margin-top: 10px;display:none;">
                                                               <div class="col-md-6">
                                                                    <div class="dataTables_length" ole="alert" aria-live="polite" aria-relevant="all">Showing <b>{{startItem}}</b> to <b>{{endItem}}</b> of <b>{{totalItems}}</b> entries   </div>
                     
                                                               </div>
                                                               
                                                               <div class="col-md-6">
                                                                    <div class="dataTables_length" style="float: right;" ole="alert" aria-live="polite" aria-relevant="all"><button type="button" class="btn btn-outline-primary" ng-Click="onPre(1,10)">PRE</button><button type="button" class="btn btn-outline-primary" ng-Click="onNext(1,10)">NEXT</button></div>
                     
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
   
   
   
   
   
    <div class="modal fade" id="firstmodalcommison" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Orders Id: {{orderno_number}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body1">
                                                            
                                                            
                              
                                                            <div class="card1" >
                                          <div class="card-body" ng-repeat="namesorderid in namesDataorderid">
                                              
                                                <p><b>Customer name :</b> {{namesorderid.company_name}}</p>
                                                <p><b>Phone :</b> {{namesorderid.phone}}</p>
                                                <p><b> Address :</b>  {{namesorderid.address}}</p>
                                               
                                                <p>Total Bill Amount : <b style="font-size:18px;">{{namesorderid.totalamount}}</b></p>
                                                <p ng-if="namesorderid.delivery_charge>0">Delivery Charge  : <b style="font-size:12px;">{{namesorderid.delivery_charge}} </b></p>
                                                <p>Customer Payment Mode : <b style="font-size:12px;">{{namesorderid.payment_mode}}</b></p>
                                                <p>Sales Person : <b style="font-size:12px;">{{namesorderid.sales_name}}</b></p>
                                              
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
                                                       <tr style="color:red;font-weight:700;"><td>Difference  </td><td></td><td><span  >{{namesorderid.totalamount-denomination_total | number : 0}}</tr>
                                                       
                                                       
                                                       
                                              <tr style="font-weight:700;" ng-if="namesorderid.return_excess!=0"><td>Return the excess  </td><td></td><td><span  >{{namesorderid.return_excess}}</tr>
                                                       
                                                       
                                                       <input type="hidden" value="{{namesorderid.totalamount-denomination_total}}" id="difference">
                                                      
                                                 </table>
                                                   
                                               </span>
                                               
                                               <span ng-if="namesorderid.payment_mode!='Cash'">
                                                   <p>Reference NO : {{namesorderid.reference_no}}</p>
                                               </span>
                                              
                                              <span ng-if="namesorderid.payment_mode!='Cash'">
                                                                             <div class="imageset" <div class="mb-3" ng-if="namesorderid.payment_image!=0">
                                                                             <img src="{{namesorderid.payment_image}}" class="img-responsive">
                                                                             </div>
                                               </span>
                                              
                                             
                                              <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">Collected  Payment <span style="color:red;">*</span></label>
                                                <div class="col-sm-12">
                                                    
                                                 <span ng-if="namesorderid.payment_mode!='Cash'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="{{namesorderid.creditsvalue}}" readonly name="collectamount" id="collectamount" type="text">
                                                 </span>
                                                 <span ng-if="namesorderid.payment_mode=='Cash'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="{{denomination_total}}" readonly name="collectamount" id="collectamount" type="text">
                                                 </span>
                                                 
                                                </div>
                                              </div>
                                              
                                              
                                               
                                              
                                              
                                              
                                            
                                              
                                              
                                                 
                                              
                                               
                                            
                                                          
                                             
                                          </div>
                                    </div>  
                                                            
                                                            
                                                           
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
 <script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



  
  
  
  
  
  
  
  
  
  
  
  


    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    
    $scope.tablename='orders_process';
    //getData();



   function getData() 
   {
       
      $('#showresult').show();
      var order_base = $('#order_base').val();
      var assign = $('#assign').val();
      
      
     $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_trasport_base_mass_search?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&assign='+assign)
        .success(function(data) {
            $scope.namesData = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = ($scope.currentPage - 1) * $scope.pageSize + 1;
            $scope.endItem = $scope.currentPage * $scope.pageSize;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
                $scope.namesData.push(temp);
                
                
            });
        });
        
       
    }

 
 
 
 
 
 
 
  $scope.pageChanged = function() {
        getData();
    }
    $scope.pageSizeChanged = function() {
        
        $scope.currentPage = 1;
        
        $('#pageSize').val($scope.pageSize);
        
        getData();
        
        
        
    }
    $scope.searchTextChanged = function() {
        $scope.currentPage = 1;
        getData();
    }
    
    
    
    
    
 
 
 $scope.pageTab = function(tabelename,status,assign){
    
    
      $('#order_base').val(status);
      $('#assign').val(assign);
      
      $scope.currentPage = 1;
      getData();
      $scope.getcount(tabelename);

    
};
 
 
 
$scope.onNext = function(currentPage,pageSize){
     
     
      var nextnumber= parseInt($('#nextnumber').val());
      var pageSize= parseInt($('#pageSize').val());
     
      var currentPage=nextnumber+pageSize;
      
       $('#nextnumber').val(currentPage);
       $('#prenumber').val(currentPage);
      
      getDataPage(currentPage,pageSize);
      
      
 };



$scope.onPre = function(currentPage,pageSize){
     
     
      var nextnumber= parseInt($('#prenumber').val());
      var pageSize= parseInt($('#pageSize').val());
      var currentPage=nextnumber-pageSize;
      
       $('#prenumber').val(currentPage);
       $('#nextnumber').val(currentPage);
       getDataPage(currentPage,pageSize);
      
      
 };




    
  function getDataPage(currentPage,pageSize) {
         
         
         
        $scope.tablename='orders_process';
        var order_base = $('#order_base').val();
         var assign = $('#assign').val();
      
        
        
        $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_trasport_base_mass_search?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&assign='+assign)
        .success(function(data) {
            $scope.namesData = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = currentPage-pageSize+1;
            $scope.endItem = currentPage;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
                $scope.namesData.push(temp);
                
                
            });
        });
        
        
        
        
        
        
    }



 

 
 
 
 
 
 

























  
  
 



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
         getData();
      }); 
    }
};

$scope.cancelData = function(id){
    if(confirm("Are you sure you want to Cancel it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Cancelfinance','tablenamemain':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
         getData();
      }); 
    }
};





$scope.removeAssign = function(id,randam_id){
    if(confirm("Are you sure you want to unassign?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id,'randam_id':randam_id, 'action':'removeassign','tablenamemain':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        getData();
        
      }); 
    }
};


$scope.removeAssignCallback = function(id,randam_id){
    if(confirm("Are you sure you want to call back?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id,'randam_id':randam_id, 'action':'removeAssignCallback','tablenamemain':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        getData();
        
      }); 
    }
};







$scope.getcount = function (tabelename) {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/getcount_transpotcount?tablename="+tabelename,
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.pending = data.pending;
            $scope.cancel =  data.cancel;
            $scope.proceed =  data.proceed;
            $scope.request =  data.request;
            $scope.transpot =  data.transpot;
            
            
            $scope.partialLoaded =  data.partialLoaded;
            
            
            $scope.delivered =  data.delivered;
            $scope.reconciliation =  data.reconciliation;
            $scope.re_sudule =  data.re_sudule;
            $scope.tripstart =  data.tripstart;
            $scope.ready_for_delivery =  data.ready_for_delivery;
            
            $scope.ready_for_driver =  data.ready_for_driver;
             

    });



}







  $scope.completeCustomer1=function(){
       
        
      
        var search=  $('#searchText').val();
        
        
        
        $("#searchText" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/order/serach_by_datas",
          data:{'search':search}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 
    
    


















  $scope.getorderid = function(id,name,selforder) {
  
 
  

   if(selforder==1)
   {
       $scope.fetchorderidDetails('orders_process',10000,id);
   }
   else
   {
       $scope.fetchorderidDetails('orders_process',2,id);
   }
   
   
   $scope.cashmode('orders_process',2,id);
   $scope.orderno_number = name;
   $('#firstmodalcommison').modal('toggle');
  
 };
 
 
  $scope.fetchorderidDetails = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_delivered_order_list_by_id_by_view?tablename='+tabelename+'&order_base='+status+'&order_id='+id).success(function(data){
      $scope.namesDataorderid = data;
    });
  };
  
  
  $scope.cashmode = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/cash_mode?tablename='+tabelename+'&order_base='+status+'&order_id='+id).success(function(data){
     
     
    $scope.c1rs = data.c1rs;
  $scope.c2rs = data.c2rs;
  $scope.c5rs = data.c5rs;
  $scope.c1rs_s = data.c1rs_s;
  $scope.c2rs_s = data.c2rs_s;
  $scope.c5rs_s = data.c5rs_s;
  
      $scope.c10rs = data.c10rs;
      $scope.c20rs = data.c20rs;
     
      $scope.c50rs = data.c50rs;
      $scope.c100rs = data.c100rs;
      $scope.c200rs = data.c200rs;
      $scope.c500rs = data.c500rs;
      $scope.c2000rs = data.c2000rs;
      
      
      $scope.c10rs_s = data.c10rs_s;
      $scope.c20rs_s = data.c20rs_s;
      
      $scope.c50rs_s = data.c50rs_s;
      $scope.c100rs_s = data.c100rs_s;
      $scope.c200rs_s = data.c200rs_s;
      $scope.c500rs_s = data.c500rs_s;
      $scope.c2000rs_s = data.c2000rs_s;
      
      $scope.denomination_total = data.denomination_total;
      
      
      
    });
  };
 


});

</script>  
   
   
   
<?php include ('footer.php'); ?>
</body>


