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
                                                                                <h4 style="text-align: center;">Customer Overview</h4>
                                                                                <input type="search" class="form-control" placeholder="Search Customer Name ,Customer Phone"  aria-controls="example" id="searchText" ng-keyup="completeCustomer()" ng-model="searchText" ng-keypress="searchTextChanged($event)">
                                                                            
                                                                            <div style="text-align: center;margin-top: 10px;display:none;" id="d-none" >
                                                                                
                                                                           
                                                                            <a href="#" class="btn btn-outline-primary waves-effect waves-light" ng-click="onGetdata('orders','order_product_list','Enquiry')">Enquiry  </a>
                                                                            <a href="#" class="btn btn-outline-primary waves-effect waves-light" ng-click="onGetdata('orders_quotation','order_product_list_quotation','Quotation')">Quotation  </a>
                                                                            <a href="#" class="btn btn-outline-primary waves-effect waves-light"  ng-click="onGetdata('orders_process','order_product_list_process','Orders')">Orders </a>
                                                                             </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                          
                                                                               
                                                                            </div>
                                                                           </div>
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
 <div class="row">
     
     


   <div class="col-md-8" style="height: 614px;overflow: auto;">
       
       
         <h2 ng-show="namesData.length>0"><span class="titleval">Order</span> Details</h2>  
<div class="col-xl-12 mb-4" ng-repeat="name in namesData">
    <div class="card">
      <div class="card-body">
      
          <div class="d-flex align-items-center">
            
            <div class="col-md-3" >
                <h4 style="color: #ff5e14;font-size: 12px;">{{name.no}} . Orders </h4>
                    
               
              <p class="fw-bold mb-1">{{name.order_no}}</p>    
              <p class="fw-bold mb-1">{{name.name}}</p>
              <p class="text-muted mb-0" ng-if="name.phone!=0">{{name.phone}}</p>
            </div>
            
             <div class="col-md-3">
                <h4 style="color: #ff5e14;font-size: 12px;">Order Value </h4>
                    
               
              <p class="fw-bold mb-1">Bill Amount : {{name.totalamount}}</p>    
              <p class="fw-bold mb-1" ng-if="name.tablename=='orders_process'">Bill Loaded  : {{name.loadamount}}</p>
               <p class="fw-bold mb-1">Payment Mode : {{name.payment_mode}}</p>
              <p class="text-muted mb-1">Delivery Scope :  {{name.delivery_status}} <span ng-if="name.delivery_charge!=0">Delivery Charges :  {{name.delivery_charge}}</span></p>
              
            </div>
            
            
            <div class="col-md-3" ng-if="name.tablename=='orders_process'">
                <h4 style="color: #ff5e14;font-size: 12px;">Vehicle Details </h4>
                    
               
              <p class="fw-bold mb-1" >Vehicle No : {{name.vehicle_number}}</p>    
              <p class="fw-bold mb-1">Driver  : {{name.order_byd}}</p>
              <p class="text-muted mb-1" ng-if="name.order_byd">Assiend Date & Tme :  {{name.assign_date}} {{name.assign_time}} </p>
              
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
                      <p><span class="titleval">Ordered</span> By : {{name.order_by}}  </p>
                      <p>Create Date : {{name.create_date}}  </p>
                 </div>
          </div>
          
      </div>
      <div
        class="card-footer border-0 bg-light p-2 d-flex justify-content-around"
      >
        
        
         <a
         
          ng-if="name.tablename=='orders_process'"
          target="_blank"
          class="btn btn-link m-0 text-reset Orders"
          href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}"
          role="button"
          data-ripple-color="primary"
          >View Order <i class="fas fa-eye ms-2"></i
         ></a>
        
          <a
          ng-if="name.tablename!='orders_process'"
          target="_blank"
          class="btn btn-link m-0 text-reset Quotation"
          href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}"
          role="button"
          data-ripple-color="primary"
          >View Order <i class="fas fa-eye ms-2"></i
         ></a>
        
      
       
       
       
        <span class="btn btn-outline-danger font-size-11" ng-if="name.assign_status==11"><a href="#" ng-click="removeAssign(name.id)">Un-Assign</a></span>
                            
                            
        <span class="btn btn-outline-danger font-size-11" ng-if="name.assign_status==2 || name.assign_status==8"><a href="#" ng-click="removeAssignCallback(name.id)">Call Back</a></span>
                                                                                                                                                                       
       
       <span class="btn btn-outline-primary font-size-11" ng-if="name.assign_status==11 || name.assign_status==1 || name.loading_status==1"><a href="<?php echo base_url(); ?>index.php/order/pickup_orders_list_view?id={{name.id}}&driver_pickip=0" target="_blank">Loading / Pickup </a></span>
                                                                                       
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
 
<div class="col-xl-12 mb-4" ng-show="namesData.length==0"><p style="text-align: center;" colspan="11">Orders Data Not Found..</p></div>




 <div class="row" ng-show="namesData.length>0" style="margin-top: 10px;">
                                                               <div class="col-md-6">
                                                                    <div class="dataTables_length" ole="alert" aria-live="polite" aria-relevant="all">Showing <b>{{startItem}}</b> to <b>{{endItem}}</b> of <b>{{totalItems}}</b> entries   </div>
                     
                                                               </div>
                                                               
                                                               <div class="col-md-6">
                                                                    <div class="dataTables_length" style="float: right;" ole="alert" aria-live="polite" aria-relevant="all"><button type="button" class="btn btn-outline-primary" ng-Click="onPre(1,10)">PRE</button><button type="button" class="btn btn-outline-primary" ng-Click="onNext(1,10)">NEXT</button></div>
                     
                                                               </div>
                                                               
                                                           </div>







</div>

<div class="col-md-4" style="height: 614px;overflow: auto;">

<div class="col-xl-12 mb-4" ng-repeat="names in Customerdetails">
           
           <h2>Customer Details</h2>
           <table class="table">
           
                    <tr><th style="width: 50%;">Name  </th><td>{{names.company_name}}</td></tr>
                   <tr><th>Phone  </th><td>{{names.phone}}</td></tr>
                   <tr ng-if="names.email!=''"><th>Email  </th><td>{{names.email}}</td></tr>
                   <tr ng-if="names.gst!='0'"><th>GST  </th><td>{{names.gst}}</td></tr>
                   <tr> <th>Address  </th><td>{{names.address}}</td></tr>
                   <tr> <th>Locality  </th><td>{{names.locality_name}}</td></tr>
                   <tr> <th>Route  </th><td>{{names.route}}</td></tr>
                   
                  <!-- <tr> <th>Opening Balance </th><td>{{names.opening_balance}}</td></tr>
                   <tr> <th>Credit Limit </th><td>{{names.credit_limit}}</td></tr>
                   <tr> <th>Credit Period </th><td>{{names.credit_period}}</td></tr>-->
                   <tr> <th>Sales Person</th><td>{{names.sales_team_name}}</td></tr>
                    <tr> <th>Sales Group</th><td>{{names.access}}</td></tr>
                    
               
                   <tr><th>Feedback   </th><td>{{names.feedback_details}}</td></tr>
                   <!--<tr><th>OverAll Ratings  </th><td>{{names.ratings}}</td></tr>-->
                   <tr> <th>Price Rating  </th><td>{{names.price_rateings}}</td></tr>
                   <tr> <th>Delivery Time Rating  </th><td>{{names.delivery_time_rateings}}</td></tr>
                   <tr> <th>Quality Rating  </th><td>{{names.quality_rateings}}</td></tr>
                   <tr> <th>Response  </th><td>{{names.response_commission}}</td></tr>
                   
                   
              
           </table>
                          <h6 class="mt-5"><i class="far fa-address-book pe-2"></i> Customer OverAll Rating</h6>
                           <hr class="m-1">
                           <div class="row mt-3">
                              <div class="col-xl-12 col-md-6">
                                 <div class="report-column tinycol fifty">
                                   <ul data-animate="colorScale" data-value="{{names.ratings}}" class="scaleColors">
                                     <li></li><li></li><li></li><li></li>
                                     <div class="scoreTick" style="left: {{names.ratings}}%;"></div>
                                   </ul>
                                   <ul class="scaleTicks">
                                     <li>Poor</li>
                                     <li>Not Bad</li>
                                     <li>Good</li>
                                     <li>Excellent</li>
                                   </ul>
                                 </div>
                              </div>
                           </div>
                           
                           <h6 class="mt-3"><i class="far fa-address-book pe-2"></i> Credits Limit <span class="float-end"><b>{{names.credit_limit}}</b></span></h6>
                           <h6 class="mt-3"><i class="far fa-address-book pe-2"></i> Opeing Balance <span class="float-end"><b>{{names.opening_balance}}</b></span></h6>
                           <h6 class="mt-3"><i class="far fa-address-book pe-2"></i> Usage <span class="float-end"><b>{{names.fulltotal_usage}}</b></span></h6>
                           <hr class="m-1">
                           <div class="row mt-3">
                              <div class="col-xl-12 col-md-6">
                                  <div class="skills">
                                     <div class="details">
                                         <span>0</span>
                                         <span>{{names.useage}}%</span>
                                     </div>
                                     <div class="bar">
                                         <div  style="width: {{names.useage}}%;"></div>
                                     </div>
                                 </div>
                              </div>
                              <div class="col-12">
                                  
                                  <p class="text-muted mt-3">Credits Period : <b>{{names.credit_period}}</b></p>
                                  
                              </div>
                           </div>
                           
                           
  
      </div>
     
<div class="col-xl-12 mb-4" ng-show="Customerdetails.length==0"><p style="text-align: center;">Customer Not Found..</p></di>
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
                                                <p>Delivery Charge  : <b style="font-size:12px;">{{namesorderid.delivery_charge}} </b></p>
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
   
   
   
   
   
   
   
   
   
   
   
   
   
   <input type="hidden" id="maintable" value="orders_process">
   <input type="hidden" id="tablesub" value="order_product_list_process">
 <script>

var app = angular.module('crudApp', ['datatables']);

app.directive('autoComplete', function($timeout) {
    return function(scope, iElement, iAttrs) {
            iElement.autocomplete({
                source: scope[iAttrs.uiItems],
                select: function() {
                    $timeout(function() {
                      iElement.trigger('input');
                    }, 0);
                }
            });
        };
    });

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



  
  
  
  
  
  
  
  
  
  
  
  


    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    
    $scope.tablename='orders_process';
    
    //getData();






$scope.onGetdata =function(table,tablesub,name)
{
    
    $('.titleval').html(name);
    $('#maintable').val(table);
    $('#tablesub').val(tablesub);
    
    
    
    getData();
    
}




   function getData() 
   {
       
          $('#showresult').show();
          var order_base = $('#order_base').val();
          var assign = $('#assign').val();
          var search=  $('#searchText').val();
        
         var tablename= $('#maintable').val();
         var tablesub= $('#tablesub').val();

      
           $http.get('<?php echo base_url() ?>index.php/customer/fetch_data_table_trasport_base_mass_search?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + search + '&tablename=' + tablename +'&tablesub=' + tablesub +'&order_base='+order_base+'&assign='+assign)
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
            
             $('#d-none').show();
        
       
    }
    
    
    
    
    function getDatacustomer() 
    {

         var search=  $('#searchText').val();
        

        
         $http.get('<?php echo base_url() ?>index.php/customer/fetch_data_search?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + search)
         .success(function(data) {
            
            $scope.Customerdetails = data;
            
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
    $scope.searchTextChanged = function(event) {


if(event.keyCode==13)
{


        getData();
        getDatacustomer();
        $scope.currentPage = 1;

}



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




    
  function getDataPage(currentPage,pageSize)
  {
         
         
         
        $scope.tablename='orders_process';
        var order_base = $('#order_base').val();
        var assign = $('#assign').val();
        var search=  $('#searchText').val();
        var tablename= $('#maintable').val();
        var tablesub= $('#tablesub').val();


        
        $http.get('<?php echo base_url() ?>index.php/customer/fetch_data_table_trasport_base_mass_search?page_next=' + currentPage + '&size=' + pageSize + '&search=' + search + '&tablename=' + tablename +'&tablesub=' + tablesub +'&order_base='+order_base+'&assign='+assign)
        .success(function(data) 
        {
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





$scope.removeAssign = function(id){
    if(confirm("Are you sure you want to unassign?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'removeassign','tablenamemain':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        getData();
        
      }); 
    }
};


$scope.removeAssignCallback = function(id){
    if(confirm("Are you sure you want to call back?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'removeAssignCallback','tablenamemain':'orders_process'}
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
  
  
  
   $scope.completeCustomer=function(){
       
        
      
        var search=  $('#searchText').val();
        
        
        
        $( "#searchText" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':'1'}
        }).success(function(data){
    
              $scope.availableTags = data;
         
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


