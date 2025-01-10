<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
 <style>
.driver-app-details p,.driver-app-details span
{
              font-size:13px;
              font-weight:600;
}
.formta {
    width: 100px;
    font-size: 12px;
    padding: 4px;
    float: right;
    margin: 4px;
}
 .card-footer-bigtext span
{
              font-size:18px;
              font-weight:bold;
              color: #ff6835;
 }
          
          .card-footer-bigtext i
          {
              padding-right:5px;
              font-size:18px;
          }
          .page-content
          {
              padding:0px !important;
              margin:0px !important;
          }
          
          .card-footer-bigtext button
          {
              font-size: 16px;
                font-weight: 500;
                padding: 5px 20px;
          }
          
          .card-footer-bigtext button span
          {
              
                font-size:16px;
                color:#fff;
                font-weight: 500;
          }
          
            @keyframes blink{
            0%{opacity: 0;}
            50%{opacity: .5;}
            100%{opacity: 1;}
            }

.goog-te-gadget-simple {
    border: none !important;
}
.goog-te-banner-frame {
    display: none !important;
}


@media screen and (min-device-width: 320px) and (max-device-width: 767px)  {
li.nav-item {
    width: 165px;
    float: left;
}

ul.nav.justify-content-end.nav-tabs-custom.rounded.card-header-tabs {
    display: block;
}

.card-header.align-items-center.d-flex {
    width: 100%;
    display: inline-block !important;
}    

ol.breadcrumb.m-0 {
margin-top: 30px !important;
}

}
      </style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>





  <div id="layout-wrapper">
     
         <div class="main-content">
            <div class="page-content">
               <div class="container-fluid">
                  <!-- start page title -->
                  <div class="row">
                     <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                           <h4 class="mb-sm-0 font-size-18">Trip Management</h4>
                           <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item"><a href="javascript: void(0);">Trips</a></li>
                                 <li class="breadcrumb-item active">Trip Orders </li>
                              </ol>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end page title -->
                  <div class="row ">
                     <div class="col-lg-12">
                        <div class="driver-app-details">
                           <div class="card-header align-items-center d-flex">
                              <div class="flex-shrink-0">
                                 <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('orders_process')">
                                
                                    
                                  
                                    
                                     <li class="nav-item">
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="routeassignOrderclick('orders_process',3,0,1,0)">
                                                         <span class="d-block d-sm-none">Open Trip &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{gate_status1}} </span></span>
                                                         <span class="d-none d-sm-block">Open Trip &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{gate_status1}} </span></span>   
                                                         </a>
                                     </li>
                                     
                                     
                                     
                                      
                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="routeassignOrderclick('orders_process',3,0,1,1)">
                                                         <span class="d-block d-sm-none">Gate Pass &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{gate_status2}} </span></span>
                                                         <span class="d-none d-sm-block">Gate Pass &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{gate_status2}} </span> </span>   
                                                         </a>
                                      </li> 
                                      
                                      
                                    
                                      
                                    
                                      
                                   
                                      
                                      <li class="nav-item"><span class="d-block nav-link"><div id="google_translate_element"></div></span></li>
                                      
                                      
                                      <li class="nav-item">
                                          
                                            
                                                <select name="example_length" aria-controls="example" style="margin: 13px 0px;" class="form-control input-sm" ng-model="pageSize" ng-change="pageSizeChanged()">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                     <option value="200">200</option>
                                                      <option value="500">500</option>
                                                    <option value="1000">1000</option>
                                                </select>
                                              
                                          
                                      </li>
                                    
                                   
                                 </ul>
                              </div>
                           </div>
                           <!-- end card header -->
                           <div class="mt-3">
                              <!-- Tab panes -->
                              
                              
                                                            <input type="hidden" id="nextnumber" value="0">   
                                                            <input type="hidden" id="prenumber" value="10">  
                                                            <input type="hidden" id="pageSize" value="10">  
                                                            <input type="hidden" id="order_base" value="3">
                                                            <input type="hidden" id="route_id" value="0">
                                                            <input type="hidden" id="assign" value="1">
                                                            <input type="hidden" id="gate_status" value="0">
                              
                            
                              
                              <div class="search-box position-relative">
                                        <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="searchText" ng-change="searchTextChanged()">
                                        <i class="bx bx-search search-icon"></i>
                                   </div>
                               <br>
                              <div class="tab-content text-muted" >
                                  
                                  
                                
                                    
                                    
                                    
                                    
                                    
                                    <div class="card" ng-repeat="names in namesDataassign">
                                       <div class="card-body">
                                          <h5 class="card-title font-size-16 ng-binding border-bottom pb-2"><i class="mdi mdi-order-bool-ascending-variant font-size-20 pe-2"></i><b>Order ID </b>:{{names.order_no}} 
                                             <span class="badge rounded-pill badge-soft-secondary font-size-11 float-end ng-binding" id="task-status">{{names.statusval}}</span>
                                          </h5>
                                         
                                           <p> <b ><i class="fas fa-user font-size-14 align-middle me-2"></i> Company Name : {{names.company_name}} </b></p>
                                          <p> <b ><i class="fas fa-phone font-size-14 align-middle me-2"></i> Contact Person : {{names.phone}} </b></p>
                                         
                                          <p class="mb-1 ng-binding"><i class="fas fa-map font-size-14 align-middle me-2"></i>  Address: {{names.address}} </p>
                                          <p> <b ><i class="mdi-road-variant mdi font-size-14"></i> &nbsp;&nbsp;Route Name : {{names.route_name}}  </b></p>
                                              <p ng-if="names.lengeth>0" style="color:#ff6835;">Max Length : {{names.lengeth}} &nbsp;&nbsp;&nbsp;<i class="fa fa-info-circle" aria-hidden="true" title="Max Length" ng-click="showProducttype(names.id,names.order_no)"></i></p>
                                             
                                              <p ng-if="names.weight>0" style="color:#ff6835;"> Weight : {{names.weight}} &nbsp;&nbsp;&nbsp;<i class="fa fa-info-circle" aria-hidden="true" title="Weight" ng-click="showProducttype(names.id,names.order_no)"></i></p>
                                              
                                              <p ng-if="names.gate_weight>0" style="color:#ff6835;">Gate Weight : {{names.gate_weight}}</p>
                                             
                                          
                                           <span ng-if="names.assign_status==2">
                                           <p class="mb-0"><a href="<?php echo base_url(); ?>index.php/order/driver_orders_list_view?id={{names.id}}"><u>View Map</u></a></p>
                                           </span>
                                           
                                           
                                                 <span ng-if="names.rescheduling_delivery=='Rescheduling'">
                                                  <small><b>Rescheduling Date : {{ names.rescheduling_date }}</b></small>
                                                  <br>
                                                  <small><b>Remarks : {{ names.rescheduling_remarks }}</b></small>
                                                 </span>
                                           
                                          
                                       </div>
                                       <div class="card-footer card-footer-bigtext">
                                           <p><b>Payment Mode :  {{names.payment_mode}} </b></p>
                                           <span>Bill Amount : <i class=" fas fa-rupee-sign"></i>{{names.totalamount}}</b></span>
                                            
                                          
                                          
                                           <span ng-if="names.assign_status==3"> 
                                          
                                           <p ng-if="names.denomination_total!=0"> Cash Collected : <i class=" fas fa-rupee-sign"></i>{{names.denomination_total}}</p>
                                           
                                           </span>
                                             
                                             
                                           
                                             
                                            <span ng-if="names.gate_status==0">
                                                 
                                                 
                                                 <button type="button" class="btn btn-primary waves-effect waves-light float-end" ng-click="statusChange(names.id)">
                                                <i class="fas fa-weight font-size-18 align-middle me-2"></i> <span>Generate </span>
                                                </button>
                                                 <input tepe="text"  id="start_reading_{{names.id}}" class="formta" placeholder="Weight">
                                                 
                                                
                                             
                                             </span>
                                             
                                             <span ng-if="names.gate_status==1">
                                                 
                                                 
                                                <a href="<?php echo base_url(); ?>index.php/order/overview?order_id={{names.base_id}}&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process"  target="_blank" class="btn btn-success  float-end" >
                                                    
                                                <i class="fas fa-truck font-size-18 align-middle me-2"></i> <span>DC </span>
                                                </a>
                                       
                                             
                                             </span>
                                             
                                             <span ng-if="names.assign_status==12">
                                                 
                                                 
                                                <a href="<?php echo base_url(); ?>index.php/order/pickup_orders_list_view?id={{names.id}}&driver_pickip=1" class="btn btn-success waves-effect waves-light float-end">
                                                <i class="fas fa-truck font-size-18 align-middle me-2"></i> <span>Pickup</span>
                                                </a>
                                                
                                             </button>
                                             
                                             </span>
                                             
                                            
                                            
                                            
                                            
                                            
                                       </div>
                                       <span class="badge bg-success card-badge-pos ms-1" style="position: absolute;top: -8px;left: 6px;">{{names.sort_id}}</span>
                                    </div>
                                    
                                  
                                    
                                    
                                            
                                 
                              </div>
                           </div>
                           <!-- end card-body -->
                        </div>
                        <!-- end card -->
                     </div>
                  </div>
                  <!-- end row -->
               </div>
               <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <!-- Modal -->
         </div>
         <!-- end main content-->
      </div>
      <!-- END layout-wrapper -->
     
   

<div class="modal fade" id="producttype" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Order Product Types {{namesordernoVal}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                            
                                                            <div class="form-group row" ng-repeat="namesp in namesProducttype">
                                                                <label class="col-sm-12 col-form-label">{{namesp.no}}. {{namesp.categories_name}}</label>
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
    getData();
    
    $scope.searchTextChanged = function() {
        $scope.currentPage = 1;
        getData();
    }
    
    
   function getData()
   {
       
      var order_base = $('#order_base').val();
      var route_id = $('#route_id').val();
      var assign = $('#assign').val();
      var gate_status = $('#gate_status').val();
      
      
     $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_assign_data_driver_list_limit?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&route_id='+route_id+'&assaignstates='+assign+'&gate_status='+gate_status)
        .success(function(data) {
            
             $scope.query = {}
             $scope.queryBy = '$';
            
            
            $scope.namesDataassign = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = ($scope.currentPage - 1) * $scope.pageSize + 1;
            $scope.endItem = $scope.currentPage * $scope.pageSize;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
             $scope.namesDataassign.push(temp);
                
                
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
  
  
  
  
  
  
  
  
  
  
  
 $scope.routeOrder = function(id,name) {
  
  
   
   $scope.fetchRouteorderassignorder('orders_process',3,id,1);
   $scope.route_name = name;
  
  
 }
  
  
  
  $scope.statuslable="Assigned Orders";
  
 $scope.routeassignOrderclick = function(tablename,status1,status2,status3,status4) {
  
   
   
   if(status3==1)
   {
       $scope.statuslable="Assigned Orders";
   }
  
   if(status3==2)
   {
       $scope.statuslable="Pick Start Orders";
   }
   if(status3==3)
   {
       $scope.statuslable="Delivered Orders";
   }
  
  
      $('#order_base').val(status1);
      $('#assign').val(status3);
      $('#gate_status').val(status4);
      
      $scope.currentPage = 1;
      getData();
      $scope.getcount(tablename);

 }
  

 $scope.fetchRoute = function(){
    $http.get('<?php echo base_url() ?>index.php/order/group_gy_route').success(function(data){
      $scope.namesRoute = data;
    });
  };


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
       
         $scope.fetchRouteorderassignorder('orders_process',3,0,1);
      }); 
    }
};

$scope.cancelData = function(id){
    if(confirm("Are you sure you want to Cancel it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Cancelfinance','tablename':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
       
         $scope.fetchRouteorderassignorder('orders_process',3,0,1);
      }); 
    }
};


$scope.statusChange = function(id){
    
    
    
    
    
    
    if(confirm("Are you sure you want to Weight Update?"))
    {
        
        
        var start_reading=$('#start_reading_'+id).val();
        
        
        if(start_reading!='')
        {
            
       
        
                      $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                        data:{'id':id, 'action':'weightupdate','gate_weight':start_reading,'tablenamemain':'orders_process'}
                      }).success(function(data){
                        $scope.success = false;
                        $scope.error = false;
                        
                        
                         getData();
                         
                         
                         
                         
                      }); 
      
        }
        else
        {
            alert('Please Fill Start Reading..');
        }
      
      
      
      
      
      
      
    }
    
    
    
};





$scope.assign = function () {


      var sortingInput = $(".sortingInput");
      var sortingInput_value = [];
      for(var i = 0; i < sortingInput.length; i++){
          
           sortingInput_value.push($(sortingInput[i]).val());
         
      }
      var sortingInput_data= sortingInput_value.join("|");
      
     
     
      var orderid = $(".orderid");
      var orderid_value = [];
      for(var i = 0; i < orderid.length; i++){
          
           orderid_value.push($(orderid[i]).val());
         
      }
      var orderid_data= orderid_value.join("|");
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/orderassign",
      data:{'sortingInput_data':sortingInput_data,'orderid_data':orderid_data,'tablenamemain':'orders_process'}
    }).success(function(data){
       
      alert('Order Assined');
      
      $scope.fetchRouteorderassignorder('orders_process',3,id,1);
     
    });
     
      

}


$scope.showProducttype = function (orderid,orderno) {
    
        $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/fetch_single_data_product_type",
        data:{'orderid':orderid}
        }).success(function(data){
    
          $scope.namesProducttype = data;
          $scope.namesordernoVal = orderno;
          $('#producttype').modal('toggle');
    
        });
    
};

$scope.getcount = function (tabelename) {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/getcount_transpotcount_driver?tablename="+tabelename,
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.pending = data.pending;
            $scope.cancel =  data.cancel;
            $scope.proceed =  data.proceed;
            $scope.request =  data.request;
            $scope.transpot =  data.transpot;
            $scope.opentrip =  data.opentrip;
            $scope.delivered =  data.delivered;
            $scope.reconciliation =  data.reconciliation;
            $scope.re_sudule =  data.re_sudule;
            $scope.tripstart =  data.tripstart;
            $scope.ready_for_delivery =  data.ready_for_delivery;
            $scope.ready_for_driver =  data.ready_for_driver;
            
            
              $scope.gate_status1 =  data.gate_status1;
              $scope.gate_status2 =  data.gate_status2;
            
            
             

    });



}




});

</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
        window.onload = function googleTranslateElementInit() {
         new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ta,en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
</script>

