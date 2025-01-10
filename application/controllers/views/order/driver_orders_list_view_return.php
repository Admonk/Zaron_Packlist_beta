<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
?>
 <style>
.page-content
{
     padding:0px !important;
     margin:0px !important;
}

#progrss-wizard {
    padding: 25px;
}
img.img-responsive {
    width: 100%;
}

button.accordion-button.fw-medium {
    padding: 10px 10px;
}
.card.flexHeightCard .twitter-bs-wizard-nav {
    display: flex; 
}
.goog-te-gadget-simple {
    border: none !important;
}
.goog-te-banner-frame {
    display: none !important;
}
#google_translate_element{
    
    float:right;
}
</style>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
        window.onload = function googleTranslateElementInit() {
         new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ta,en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
</script>
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>




  <div id="layout-wrapper">
         <div class="main-content">
            <div class="page-content">
                    <div class="container-fluid">
                        <div class="row driver-detail-page">
                                <div class="col-lg-12">
                                    <div class="card flexHeightCard">
                                        <div class="card-header">
                                            <h4 class="card-title mb-0">Wizard with Progressbar</h4>
                                        </div>
                                        <div class="card-body" ng-init="fetchCustomerdetails()" >

                                            <div id="progrss-wizard" class="twitter-bs-wizard"   >
                                                
                                                <div id="google_translate_element" style=></div>
                                                
                                                <ul class="twitter-bs-wizard-nav nav nav-pills nav-justified">
                                                    <li class="nav-item">
                                                        <a href="#progress-seller-details" class="nav-link" data-toggle="tab">
                                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Seller Details">
                                                                <i class="bx bx-list-ul"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                   
                                                    
                                                    <li class="nav-item">
                                                        <a href="#progress-bank-detail" class="nav-link" data-toggle="tab">
                                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Bank Details">
                                                                <i class="bx bxs-bank"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- wizard-nav -->

                                                <div id="bar" class="progress mt-4">
                                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                                                </div>
                                                <div class="tab-content twitter-bs-wizard-tab-content">
                                                    <div class="tab-pane" id="progress-seller-details">
                                                        <div class="text-start mb-4">
                                                            <h5>Customer Details  </h5>
                                                             <input type="hidden" id="lat" >
                                                             <input type="hidden" id="laog" >
                                                             <div class="ticket-inner">
                                                               <div class="route">
                                                                  <p class="">
                                                                    
                                                                  <span>Contact Person : {{customername}}</span>
                                                                  <span>Contact Phone : {{customerphone}}</span>
                                                                  <span>Route: {{routename}}</span>
                                                                  <span>{{address}}</span></p>
                                                                  <p class=""> <span class="font-size-12">{{orderno}}</span><a href="tel::{{customerphone}}"><span><i class="mdi-phone mdi font-size-20 me-1"></i> Call Customer</span></a>
                                                                  
                                                                   <span ng-if="lengeth>0"><b>Max Length : {{lengeth}}</b></span>
                                                                  
                                                                  </p>
                                                               </div>
                                                               <div class="time">
                                                                  <p><span>Started Time</span><span>{{starttime}}</span></p>
                                                                  <!--<p><span>Est Arrival Time</span><span>1:05 p.m</span></p>-->
                                                               </div>
                                                               <div class="flight">
                                                                  <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d250577.849036318!2d76.98661947811352!3d11.092579967087119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d11.0231552!2d76.96875519999999!4m5!1s0x3ba9038baebcbb59%3A0x65ea405423a60cf4!2szaron%20industries!3m2!1d11.185958!2d77.28320699999999!5e0!3m2!1sen!2sin!4v1638435938932!5m2!1sen!2sin" style="border:0;width:100%; height:30vh;" allowfullscreen="" loading="lazy"></iframe>
                                                               </div>
                                                              </div>
                                                        </div>
                                                        <div class="col-lg-12" ng-init="fetchSingleDatatotal()">
                                                            
                                                            
                                                                        <div class="mb-3">
                                                                        <label for="example-text-input" class="form-label">Start Reading  : </label>
                                                                        <b> {{start_reading}}</b>
                                                                       </div>
                                                                      
                                                                         <div class="mb-3">
                                                                        <label for="example-text-input" class="form-label">KM Reading End</label>
                                                                        <input class="form-control" type="text" id="km_reading_end">
                                                                       </div>
                                                                       
                                                        </div>
                                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            <li class="next"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()">Reached Location <i
                                                                        class="bx bx-chevron-right ms-1"></i></a></li>
                                                        </ul>
                                                    </div>
                                                   
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="tab-pane" id="progress-bank-detail">
                                                        <div>
                                                            <div class="text-start mb-2">
                                                                <h5>Drop Details</h5>
                                                                <div class="ticket-inner">
                                                               <div class="route">
                                                                  <p> 
                                                                    
                                                                  <span>Contact Person : {{customername}}</span>
                                                                  <span>Contact Phone : {{customerphone}}</span>
                                                                  
                                                                  <span>Route: {{routename}}</span>
                                                                  <span>{{address}}</span></p>
                                                                  <p class=""><span class="font-size-12">{{orderno}}</span><a href="tel::{{customerphone}}"><span><i class="mdi-phone mdi font-size-20 me-1"></i> Call Customer</span></a>
                                                                  
                                                                  
                                                                   <span ng-if="lengeth>0"><b>Max Length : {{lengeth}}</b></span>
                                                                  
                                                                  
                                                                  </p>
                                                               </div>
                                                              
                                                              </div>
                                                            </div>
                                                          <form>
                                                              <div class="row">
                                                                  
                                                                  
                                                                  
                                                                                         
<div class="alert alert-success alert-dismissible fade show" role="alert" ng-show="success">
                                            <i class="mdi mdi-check-all me-2"></i>
                                           {{successMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<div class="alert alert-danger alert-dismissible fade show" role="alert" ng-show="error">
                                            <i class="mdi mdi-block-helper me-2"></i>
                                            {{errorMessage}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>












                                                                       
                    
                                                                        <h4>Return Product Details</h4>
                    
                                                                       <div class="table-responsive">
                                                                           
                                                                      
                                                                       <table class="table" ng-init="getProductlistdata()">
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                         <tr>
                                                                                             <th>#</th>
                                                                                            
                                                                                             <th>Product Name</th>
                                                                                             <td>NOS</td>
                                                                                             <td>QTY</td>
                                                                                             <td>Rate</td>
                                                                                             <td>Total</td>
                                                                                             <!--<td>Sales Return Complaint</td>-->
                                                                                            
                                                                                         </tr>
                                                                                         <tr  ng-repeat="namesp in namesDataproduct">
                                                                                         
                                                                                             <td><input type="checkbox" checked class="purchase_order_product_id" name="purchase_order_product_id" value="{{namesp.id}}"></td>
                                                                                             
                                                                                             <td>{{namesp.product_name}}</td>
                                                                                             <td><input type="textt"  value="{{namesp.nos}}" data-nos="{{namesp.nos}}" ng-keyup="inputsave_1(namesp.id,'nos',namesp.categories_id,namesp.type,namesp.profile,namesp.crimp,namesp.fact,namesp.rate,namesp.uom)" id="nos_{{namesp.id}}" class="form-control order_nos" name="order_nos" ></td>
                                                                                             <td><input type="textt" readonly value="{{namesp.qty}}" class="form-control purchase_qty" id="qty_{{namesp.id}}" name="purchase_qty" ></td>
                                                                                             <td>{{namesp.rate}}</td>
                                                                                             <td id="amount_{{namesp.id}}" class="amount">{{namesp.total}} </td>
                                                                                                 
                                                                                             
                                                                                           
                                                                                         </tr>
                                                                                         
                                                                                         
                                                                                           <tr>
                                                                                                 <td></td>
                                                                                                 <td></td>
                                                                                                 <td></td>
                                                                                                 <td id="total_qty">{{total_qty}}</td>
                                                                                                 <td>Total </td>
                                                                                                 <td id="total_amount">{{total_amount}}</td>
                                                                                             </tr>
                                                                                         
                                                                                         
                                                                                     </table>  
                                                                                     
                                                                                     
                                                                         </div>             
                    
                     
                    




















                                                                  
                                                                <div class="row">
                                                                    <h4>OTP Password</h4>
                                                        <div class="col-3">
                                                            <div class="mb-3">
                                                                <label for="digit1-input" class="visually-hidden">Dight 1</label>
                                                                <input type="text" class="form-control form-control-lg text-center otpid" onkeyup="moveToNext(this, 2)"  maxlength="1" id="digit1-input">
                                                            </div>
                                                        </div>
                    
                                                        <div class="col-3">
                                                            <div class="mb-3">
                                                                <label for="digit2-input" class="visually-hidden">Dight 2</label>
                                                                <input type="text" class="form-control form-control-lg text-center otpid" onkeyup="moveToNext(this, 3)" maxlength="1" id="digit2-input">
                                                            </div>
                                                        </div>
                    
                                                        <div class="col-3">
                                                            <div class="mb-3">
                                                                <label for="digit3-input" class="visually-hidden">Dight 3</label>
                                                                <input type="text" class="form-control form-control-lg text-center otpid" onkeyup="moveToNext(this, 4)" maxlength="1" id="digit3-input">
                                                            </div>
                                                        </div>
                    
                                                        <div class="col-3">
                                                            <div class="mb-3">
                                                                <label for="digit4-input" class="visually-hidden">Dight 4</label>
                                                                <input type="text" class="form-control form-control-lg text-center otpid" onkeyup="moveToNext(this, 4)" maxlength="1" id="digit4-input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                               
                                                                
                                                                
                                                                
                                                                  <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Rescheduling in Recived / Return </label>
                                                                        <select class="form-select" id="rescheduling_delivery">
                                                                           
                                                                            
                                                                            <option value="YES">Returned</option>
                                                                            <option value="Rescheduling">Rescheduling</option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                   </div>
                                                                
                                                                
                                                                   <div class="col-lg-12" id="rescheduling_delivery_view" style="display:none">
                                                                        <div class="mb-3">
                                                                        <label for="example-text-input" class="form-label">Rescheduling Date</label>
                                                                        <input class="form-control"  type="datetime-local" id="rescheduling_date">
                                                                       </div>
                                                                       
                                                                         <div class="mb-3">
                                                                        <label for="example-text-input" class="form-label">Rescheduling Remarks</label>
                                                                        <input class="form-control" type="text"  id="rescheduling_remarks">
                                                                       </div>
                                                                       
                                                                   </div>
                                                                
                                                                
                                                                
                                                                
                                                              
                                                                
                                                                
                                                            </div>
                                                              
                                                            
                                                          </form>
                                                          <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i
                                                                        class="mdi mdi-arrow-left me-1"></i> Previous</a></li>
                                                                        
                                              
                                                            <li class="float-end">
                                                                           <a href="javascript: void(0);" class="btn btn-danger"  ng-click="tripcancel()"   data-bs-toggle="modal"
                                                                    >Cancel  </a>
                                                                        
                                                                
                                                                
                                                                <a href="javascript: void(0);" class="btn btn-primary"  ng-click="tripcomplete()"   data-bs-toggle="modal"
                                                                    data-bs-target=".confirmModal"><i class="mdi mdi-thumb-up pe-1"></i>Mark as Trip Complete </a></li>
                                                        </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->
                            </div>
                            
                            
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
            <!-- End Page-content -->
            <!-- Modal -->
         </div>
         <!-- end main content-->
      </div>
      <!-- END layout-wrapper -->
     
   


   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </div>

   
   
   
   
   
   
   
   
   
 <script>
 
 function moveToNext(t,e){
    
     0<t.value.length&&$("#digit"+e+"-input").focus()
     
     
 }

var app = angular.module('crudApp', ['datatables']);


app.directive("fileInput", function($parse){  
                    return{  
                         link: function($scope, element, attrs){  
                              element.on("change", function(event){  
                                   var files = event.target.files;  
                                   $parse(attrs.fileInput).assign($scope, element[0].files);  
                                   $scope.$apply();  
                              });  
                         }  
                    }  
});  

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;


 
  
   $scope.fetchRouteorderassignorder = function(tabelename,status,id,assaignstates){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_assign_data_driver_list?tablename='+tabelename+'&order_base='+status+'&route_id='+id+'&assaignstates='+assaignstates).success(function(data){
      $scope.namesDataassign = data;
    });
  };
  
  
  
 $scope.routeOrder = function(id,name) {
  
  
   
   $scope.fetchRouteorderassignorder('order_sales_return_complaints',3,id,1);
   $scope.route_name = name;
  
  
 }
  
  
  
  $scope.statuslable="Assigned Orders";
  
 $scope.routeassignOrderclick = function(tablename,status1,status2,status3) {
  
   
   
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
  
   $scope.fetchRouteorderassignorder(tablename,status1,status2,status3);

 }
  

 $scope.fetchRoute = function(){
    $http.get('<?php echo base_url() ?>index.php/order/group_gy_route').success(function(data){
      $scope.namesRoute = data;
    });
  };



$scope.statusChange = function(id){
    if(confirm("Are you sure you want to Start?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'statuschange','tablenamemain':'order_sales_return_complaints'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
       
         $scope.fetchRouteorderassignorder('order_sales_return_complaints',3,0,1);
      }); 
    }
};



$scope.tripcancel = function(){
    if(confirm("Are you sure you want to Revoke?"))
    {
        var km_reading_end= $('#km_reading_end').val();
       var id='<?php echo $id; ?>';
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'canceltrip','val':'0','km_reading_end':km_reading_end,'tablenamemain':'order_sales_return_complaints'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
         alert('Return Order Revoked');
         window.location.replace("<?php echo base_url(); ?>index.php/order/driver_orders_return_list");
      }); 
    }
};









$scope.fetchCustomerororderhistroy = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroy_driver",
      data:{'action':'fetch_single_data','order_id':'<?php echo $id; ?>','tablenamemain':'order_sales_return_complaints'}
    }).success(function(data){

        $scope.namesHistory = data;
          
    });
};

$scope.fetchCustomerororderhistroyorderlist = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroyorderlist_driver",
      data:{'action':'fetch_single_data','order_id':'<?php echo $id; ?>','tablenamemain':'order_sales_return_complaints','tablename_sub':'sales_return_products'}
    }).success(function(data){

          $scope.namesHistoryorder = data;
          
         
    });
};






$scope.create_date=new Date();
 
 $scope.tripcomplete = function () {


    
   
    
           var otpid = $(".otpid");
           var order_otp = [];
          
           for(var i = 0; i < otpid.length; i++){
                     order_otp.push($(otpid[i]).val());
                     
           }
                
            var otp= order_otp.join("|"); 
          
     
            var purchase_order_product_id = [];
      
             $('input[name="purchase_order_product_id"]:checked').each(function(){
               
                    purchase_order_product_id.push($(this).val()); 
                
            });
            
             var checkinsert= purchase_order_product_id.join("|");
      
      
          var validation=$('input[name="purchase_order_product_id"]:checked').val();
                
          if (typeof validation === "undefined") {
                   var validation=0;
          }
          
          
          
            var purchase_qty = [];
      
             $('input[name="purchase_qty"]').each(function(){
                    
                    if($(this).val()!="")
                    {
                        purchase_qty.push($(this).val()); 
                    }
                    
                
            });
            
             var purchase_qty_data= purchase_qty.join("|");
             
             var order_nos = [];
      
             $('input[name="order_nos"]').each(function(){
                    
                    if($(this).val()!="")
                    {
                        order_nos.push($(this).val()); 
                    }
                    
                
            });
            
             var order_nos_data= order_nos.join("|");
             
             
         
             
             var km_reading_end= $('#km_reading_end').val();
             var rescheduling_delivery= $('#rescheduling_delivery').val();
             var rescheduling_date= $('#rescheduling_date').val();
             var rescheduling_remarks= $('#rescheduling_remarks').val();
             
             

   
        if(validation!=0)
        {
            if(rescheduling_delivery=='Rescheduling')
            {
                
                
                 if(rescheduling_date!='')
                {
                
                         $http({
                            method:"POST",
                            url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                            data:{'action':'returnproduct_driver_trip_completed','id':'<?php echo $id; ?>','otp':otp,'order_nos_data':order_nos_data,'return_order_product_id':checkinsert,'purchase_qty_data':purchase_qty_data,'km_reading_end':km_reading_end,'rescheduling_delivery':rescheduling_delivery,'rescheduling_date':rescheduling_date,'rescheduling_remarks':rescheduling_remarks}
                           }).success(function(data){
                              
                              
                                    if(data.error == '1')
                                    {
                                          $scope.success = false;
                                          $scope.error = true;
                                          $scope.errorMessage = data.massage;
                                    }
                                    else
                                    {
                                        
                                          alert('Trip Completed.');
                                          window.location.replace("<?php echo base_url(); ?>index.php/order/driver_orders_return_list");
               
                                    }
                              
                                       
                              
                           
                          });
                  
                  
                }
                else
                {
                     alert('Select The Rescheduling Date');
                }
                
                
                
            }
            else
            {
                
                
                 $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                    data:{'action':'returnproduct_driver_trip_completed','id':'<?php echo $id; ?>','otp':otp,'order_nos_data':order_nos_data,'return_order_product_id':checkinsert,'purchase_qty_data':purchase_qty_data,'km_reading_end':km_reading_end,'rescheduling_delivery':rescheduling_delivery,'rescheduling_date':rescheduling_date,'rescheduling_remarks':rescheduling_remarks}
                   }).success(function(data){
                      
                      
                            if(data.error == '1')
                            {
                                  $scope.success = false;
                                  $scope.error = true;
                                  $scope.errorMessage = data.massage;
                            }
                            else
                            {
                                
                                  alert('Trip Completed.');
                                   window.location.replace("<?php echo base_url(); ?>index.php/order/driver_orders_return_list");
       
                            }
                      
                               
                      
                   
                  });
                
            }
                   
       
        }
        else
        {
            alert('Select Return Product..');
        }
      


}

 











$scope.fetchSingleDatatotal = function(){
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_totaldel_driver_return?order_id=<?php echo $id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'order_sales_return_complaints','tablename_sub':'sales_return_products'}
      }).success(function(data){

       $scope.fulltotal = data.fulltotal;
       
       
       $scope.order_no_id = data.order_no_id;
       $scope.start_reading = data.start_reading;
       
      
       
       if(data.user_id)
       {
            $scope.user_id = data.user_id;
       }
       if(data.reason)
       {
            $scope.reason = data.reason;
       }
       
       if(data.salesphone)
       {
            $scope.salesphone = data.salesphone;
       }
       
       
       if(data.salesname)
       {
            $scope.salesname = data.salesname;
       }
       
                               
      
     
    });
};









 









  
   $scope.getProductlistdata = function(){
      
      
   
     $http.get('<?php echo base_url() ?>index.php/order/get_purchase_product_list_by_return?id='+<?php echo $id; ?>).success(function(data){
      
      
       $scope.namesDataproduct = data;
       
                 var total_qty_val = 0;
                for(var i = 0; i < data.length; i++){
                    var qty = parseFloat(data[i].qty,2);
                  
                    total_qty_val += qty;
                }
                $scope.total_qty=total_qty_val.toFixed(2);
                
                
                
                 var total_amount_val = 0;
                for(var i = 0; i < data.length; i++){
                    var amount = parseFloat(data[i].total,2);
                  
                    total_amount_val += amount;
                }
                $scope.total_amount=total_amount_val.toFixed(2);
       
      
       
     });
        
   };
   

$scope.fetchCustomerdetails = function () {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerdetails_return",
      data:{'id':'<?php echo $id; ?>','tablename':'order_sales_return_complaints'}
    }).success(function(data){
        
          
   
           $scope.company_name_data = data.company_name_data;
            $scope.customername = data.name;
            $scope.routename = data.route_name;
            
             $scope.lengeth = data.lengeth;
            
            $('#lat').val(data.lat);
            $('#laog').val(data.laog);
            
            
            $scope.address = data.address;
            $scope.orderno = data.order_no;
            $scope.customerphone = data.phone;
            $scope.starttime = data.create_date;
            $scope.totalamount = data.totalamount;
            
            $scope.payment_image = data.payment_image;
            
            $('#reference_no').val(data.reference_no);
           
             $scope.map = data.map;
             $scope.delivery_mode=data.delivery_mode;
             $('#cashmode').val(data.payment_mode);
             
             if(data.payment_mode=="Cheque")
             {
                 $('#reference_no_view').show();
             }
             if(data.payment_mode=="Bank Transfer")
             {
                 $('#reference_no_view').show();
             }
            
            if(data.payment_mode=="Cash")
             {
                 $('#dinomainitionview').show();
             }
            
            
           
             
            $scope.payment_mode = data.payment_mode;
            $scope.deliverystatus = data.delivery_status;
            
             
             $scope.delivery_status_name = data.delivery_status_name;
            
             $scope.delivery_charge = data.delivery_charge;
            
            
            
            
            

    });



}










$scope.inputsave_1 = function (id,inputname,categories_id,type,profile,crimp,fact,rate,uom) {


                     
                        
                           var nos= parseFloat($('#nos_'+id).val());
                          var nosold= parseFloat($('#nos_'+id).data('nos'));
                       
                            
                          if(uom==3)
                          {
                                     
                                     
                                     
                              
                                      
                                       if(type==0)
                                       {
                                         var profile= parseFloat(profile)+parseFloat(crimp); 
                                         
                                       }
                                       else if(type==6)
                                       {
                                               var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       else if(type==15)
                                       {
                                          var profile= parseFloat(profile)*parseFloat(crimp); 
                                         
                                       }
                                       else if(type==13)
                                       {
                                               var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       else if(type==8)
                                       {
                                               var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       else
                                       {
                                         var profile= profile;  
                                       }
                                      
                                      
                                      
                                  
                                      
                                      var profile= parseFloat(profile*0.305);
                                    
                                      
                                  
                                       
                                      
                              
                          }
                         
                          if(uom==4)
                          {
                              
                                       if(type==0)
                                       {
                                         var profile= parseFloat(profile)+parseFloat(crimp); 
                                         
                                       }
                                       if(type==6)
                                       {
                                                 var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       if(type==15)
                                       {
                                          var profile= parseFloat(profile)*parseFloat(crimp); 
                                         
                                       }
                                       if(type==13)
                                       {
                                                 var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       if(type==8)
                                       {
                                                 var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       
                              
                                         var profile= parseFloat(profile/1000);
                                       
                              
                                          
                                     
                              
                              
                          }
                          if(uom==5)
                          {
                              
                                       if(type==0)
                                       {
                                          var profile= parseFloat(profile)+parseFloat(crimp); 
                                         
                                       }
                                       else if(type==6)
                                       {
                                                 var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       else if(type==15)
                                       {
                                          var profile= parseFloat(profile)*parseFloat(crimp); 
                                         
                                       }
                                       else if(type==13)
                                       {
                                                 var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       else if(type==8)
                                       {
                                                 var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       else
                                       {
                                          var profile= profile;
                                       }
                              
                            
                                       
                              
                              
                              
                          }
                          if(uom==6)
                          {
                              
                                        if(type==0)
                                       {
                                          var profile= parseFloat(profile)+parseFloat(crimp); 
                                         
                                       }
                                       if(type==6)
                                       {
                                          var profile= parseFloat(profile)+parseFloat(crimp); 
                                         
                                       }
                                       if(type==15)
                                       {
                                          var profile= parseFloat(profile)*parseFloat(crimp); 
                                         
                                       }
                                        if(type==13)
                                       {
                                          var profile= parseFloat(profile)+parseFloat(crimp); 
                                         
                                       }
                                       if(type==8)
                                       {
                                                 var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                              
                                       var profile= parseFloat(profile/39.37);
                                     
                                       
                                    
                              
                          }
                     
                      
                    
                        
                        
                           if(type==1)
                           {
                               
                               
                              
                               var sqt_qty=profile*nos;
                               var sqt_qty=sqt_qty.toFixed(3);
                               
                              
                               
                               
                           }
                           if(type==4)
                           {
                              
                               
                               var sqt_qty=profile*nos*fact;
                               var sqt_qty=sqt_qty.toFixed(3);
                              
                           }
                          
                           if(type==2)
                           {
                               
                             
                            
                               var sqt_qty=profile*nos*crimp;
                               var sqt_qty=sqt_qty.toFixed(3);
                               
                              
                           }
                             
                           if(type==3)
                           {
                                var sqt_qty=nos;
                                var sqt_qty=sqt_qty.toFixed(3);
                           }
                           
                           
                            if(type==14)
                           {
                               
                                var sqt_qty=nos*fact;
                                var sqt_qty=sqt_qty.toFixed(3);
                                
                           }
                           
                           if(type==9)
                           {
                               
                                
                                  var nos= parseFloat($('#qty_'+id).val());
                                  var sqt_qty=nos;
                                  var sqt_qty=sqt_qty.toFixed(3);
                                
                           }
                           
                           
                           if(type==19)
                           {
                                  var nos= parseFloat($('#qty_'+id).val());
                                  var sqt_qty=nos;
                                  var sqt_qty=sqt_qty.toFixed(3);
                                
                           }
                           
                           
                         
                           
                           
                           if(type==5)
                           {
                               
                               var sqt_qty=profile*nos*fact;
                               var sqt_qty=sqt_qty.toFixed(3);
                               
                              
                           }
                           if(type==8)
                           {
                              
                               var sqt_qty=profile*nos*fact;
                               var sqt_qty=sqt_qty.toFixed(3);
                               
                              
                           }
                           if(type==6)
                           {
                               
                               var subqty = parseFloat(profile);
                               var sqt=subqty*fact;
                               var sqt_qty=sqt*nos;
                               var sqt_qty = sqt_qty.toFixed(2);
                                
                              
                           }
                            if(type==15)
                           {
                               
                               
                                var subqty = parseFloat(profile);
                                var sqt=subqty;
                                if(uom==4)
                                {
                                   var sqtcell= sqt/1000;    
                                   var sqt_qty=sqtcell*nos/1000;
                               
                                }
                                else
                                {
                                  var sqt_qty=sqt*nos;
                                }
                               
                                var sqt_qty = sqt_qty.toFixed(2);
                             
                           }
                           
                           if(type==7)
                           {
                               
                                 var sqt_qty=profile*fact*nos;
                                 var sqt_qty=sqt_qty.toFixed(3);
                            
                               
                              
                           }
                           if(type==16 || type==17)
                           {
                               
                               var sqt_qty=profile*fact*nos;
                               var sqt_qty=sqt_qty.toFixed(3);
                               
                              
                           }
                           if(type==10)
                           {
                               
                               var sqt_qty=profile*fact*nos;
                               var sqt_qty=sqt_qty.toFixed(3);
                               
                              
                           }
                           
                           if(type==0)
                           {
                              
                               var subqty = parseFloat(profile);
                               var sqt=subqty*fact;
                               var sqt_qty=sqt*nos;
                               var sqt_qty = sqt_qty.toFixed(3);
                                        
                           }
                           
                           if(type==13)
                           {
                              
                               var subqty = parseFloat(profile);
                               var sqt=subqty*fact;
                               var sqt_qty=sqt*nos;
                               var sqt_qty = sqt_qty.toFixed(2);
                                        
                           }
                           
                           
                            if(type==11 || type==12)
                           {
                              
                               var subqty = parseFloat(profile);
                               var sqt=subqty*dim*crimp*fact;
                               var sqt_qty=sqt*nos;
                               var sqt_qty = sqt_qty.toFixed(2);
                                        
                           }
                           
                           
                     
                      $('#qty_'+id).val(sqt_qty);
                      
                      if(type==14)
                      {
                           var total=Math.round(rate*sqt_qty);
                           
                      }
                      else
                      {
                           var total=Math.round(rate*sqt_qty);
                      }
                      
                      
                         if(nos<=nosold)
                      {
                          
                            var totalammt=total.toFixed(2);
                            $('#amount_'+id).html(totalammt);
                          
                          
                            var cattotsum = 0;
                            $('.amount').each(function(){
                                cattotsum += parseFloat($(this).text());  
                            });
                            var alltotalcat=cattotsum.toFixed(2);
                            $('#total_amount').html(alltotalcat);
                            
                            
                            
                            var cattotqty = 0;
                            $('.purchase_qty').each(function(){
                                cattotqty += parseFloat($(this).val());  
                            });
                            var qty_total=cattotqty.toFixed(2);
                            $('#total_qty').html(qty_total);
                          
                      }
                      else
                      {
                          alert('Enter Value Below '+ nosold);
                          $('#nos_'+id).val(nosold);
                            var totalammt=total.toFixed(2);
                            $('#amount_'+id).html(totalammt);
                          
                          
                            var cattotsum = 0;
                            $('.amount').each(function(){
                                cattotsum += parseFloat($(this).text());  
                            });
                            var alltotalcat=cattotsum.toFixed(2);
                            $('#total_amount').html(alltotalcat);
                            
                            
                            
                            var cattotqty = 0;
                            $('.purchase_qty').each(function(){
                                cattotqty += parseFloat($(this).val());  
                            });
                            var qty_total=cattotqty.toFixed(2);
                            $('#total_qty').html(qty_total);
                          
                      }
                      
                        
  

      

}







});



$(document).ready(function(){
  $("#cashmode").change(function(){
   
   
     var val= $(this).val();
     
     
    
     
     if(val=='Cash')
     {
          $('#dinomainitionview').show();
          $('#reference_no_view').hide();
     }
     else
     {
          $('#dinomainitionview').hide();
          $('#reference_no_view').show();
     }
     
     
    
   
   
  });
  
  
    $("#rescheduling_delivery").change(function(){
   
   
     var val= $(this).val();
     
     
    
     
     if(val=='Rescheduling')
     {
           $('#rescheduling_delivery_view').show();
          
     }
     else 
     {
         $('#rescheduling_delivery_view').hide();
         $('#dinomainitionview').show();
          
     }
     
     
    
   
  });
  
  
  
  
  
  
  
  
  

 $('#1_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*1
       $('#1_total').val(tot);
       
       
       
       var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
      if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }

      
       
       
       
   });





 $('#2_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*2
       $('#2_total').val(tot);
       
       
       
       var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
      if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }

      
       
       
       
   });


 $('#5_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*5
       $('#5_total').val(tot);
       
       
       
       var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
      if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }

      
       
       
       
   });








   $('#10_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*10
       $('#10_total').val(tot);
       
       
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
                            var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }

      
       
       
       
   });
  
  $('#20_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*20
       $('#20_total').val(tot);
       
       
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
     
     
                              var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
     
     
     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }
       
       
   });
  
  $('#50_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*50
       $('#50_total').val(tot);
       
       
       
       
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
     
     

                              var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }





     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
        if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }
       
       
   });


   $('#100_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*100
       $('#100_total').val(tot);
       
       
        var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
     
                              var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }





     
     
      if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }
       
       
   });


   $('#200_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*200
       $('#200_total').val(tot);
       
       
       
       
 var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
      var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }

     
     
     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
            $('#return_excess').val('0');
            $('#return_excess1').val('0');
       }
       
       
       
   });

   $('#500_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*500
       $('#500_total').val(tot);
       
       
        var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
         var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
     
     
                              var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
     
       if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }
       
   });
   $('#2000_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*2000
       $('#2000_total').val(tot);
       
       
        var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
       var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
       if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       if(totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
            $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }
     
   });
   
   
   
   
   
  
  
  
  
  
  
  
});

</script>  
   
   
   
        <script src="<?php echo base_url(); ?>/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/feather-icons/feather.min.js"></script>
        
        <!-- Required datatable js -->
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        
        
        <!-- pace js -->
        <script src="<?php echo base_url(); ?>/assets/libs/pace-js/pace.min.js"></script>
        <!-- twitter-bootstrap-wizard js -->
        <script src="<?php echo base_url(); ?>/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/twitter-bootstrap-wizard/prettify.js"></script>
        <!-- form wizard init -->
        <script src="<?php echo base_url(); ?>/assets/js/pages/form-wizard.init.js"></script>
        <!-- Responsive examples -->
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="<?php echo base_url(); ?>/assets/js/pages/datatables.init.js"></script>   
        <script src="<?php echo base_url(); ?>/assets/js/app.js"></script>
</body>


