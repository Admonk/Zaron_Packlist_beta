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

                                            <div id="progrss-wizard" class="twitter-bs-wizard"  ng-init="fetchSingleDatatotaldel()" >
                                                
                                                <div id="google_translate_element" style=></div>
                                                
                                                <ul class="twitter-bs-wizard-nav nav nav-pills nav-justified" style="display:none;">
                                                    <li class="nav-item">
                                                        <a href="#progress-seller-details" class="nav-link" data-toggle="tab">
                                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Seller Details">
                                                                <i class="bx bx-list-ul"></i>
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
                                                                  <span>Company : {{company_name_data}}</span>      
                                                                  <span>Contact Person : {{customername}}</span>
                                                                  <span>Contact Phone : {{customerphone}}</span>
                                                                  <span>Route: {{routename}}</span>
                                                                  <span>{{address}}</span></p>
                                                                  <p class=""> <span class="font-size-12">{{orderno}}</span><a href="tel::{{customerphone}}"><span><i class="mdi-phone mdi font-size-20 me-1"></i> Call Customer</span></a></p>
                                                               </div>
                                                               <div class="time">
                                                                  <p><span>ASSIEND Time</span><span>{{starttime}}</span></p>
                                                                  <!--<p><span>Est Arrival Time</span><span>1:05 p.m</span></p>-->
                                                               </div>
                                                               
                                                               
                                                               
                                                               
                                                               
                                                               
                                                             <div class="time">
                                                                  
                                                                  <p><span>Invoice</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span></p>
                                                                  <p><span>DC</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span></p>
                                                                  <p><span>SubTotal</span><span> Rs. {{fulltotaldel}}</span></p>
                                                                  <p><span>Delivery Charge</span><span> Rs. {{delivery_charge}}</span></p>
                                                                  <p><span>Total Amount</span><span> Rs. {{fulltotaldel+delivery_charge}}</span></p>
                                                               </div>
                                                               
                                                               <div class="accordion accordion-flush" id="accordionFlushExample">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header">
                                                                             Product List
                                                                        </h2>
                                                                        <div id="flush-collapseOne" >
                                                                            <div class="accordion-body p-1 text-muted">
                                                                                
                                                                                <div class="talbe-productList">
                                                                                          
                                                                                          <div class="table-responsive" >
                                                                                            <table class="table mb-0" ng-init="fetchData()">
                                                    
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                    <th>S No</th>
                                                                                                    <th>Product</th>
                                                                                                    <th >Basic Price (INR)</th>
                                                                                                    <th >Quantity</th>
                                                                                                    <th >Amount</th>
                                                                                                    <th >Load / Pickup </th>
                                                                                                   </tr>
                                                                                                </thead>
                                                                                                <tbody ng-init="fetchSingleDatatotal()">
                                                                                                 <tr ng-repeat="name in namesData|orderBy:column:reverse">
                                                                                                    <td >{{name.no}}</td>
                                                                                                    <td>
                                                                                                        <div class="item-desc-1">
                                                                                                            <span>{{name.product_name_tab}}</span>
                                                                                                            <small>{{name.description}}</small>
                                                                                                            
                                                                                                        </div>
                                                                                                    </td>
                                                                                                  
                                                                                                    <td >{{name.rate_tab}}  </td>
                                                                                                    <td >{{name.qty_tab}} 
                                                                                                   
                                                                                                    <small ng-if="approx_id==1">(approx.)</small>
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    </td>
                                                                                                    <td >Rs. {{name.amount_tab}}</td>
                                                                                                    <td  style="width:15%;" ng-if="name.paricel_mode==1" >{{name.addresstopariel}}</td>
                                                                                                    
                                                                                                    <td>
                                                                                                        
                                                                                                       
                                                                                                        <span ng-if="name.loadstatus==0">
                                                                                                            
                                                                                                            <label for="set_id{{name.id}}"><input type="checkbox" value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Load</span></label>
                                                                                                         
                                                                                                        </span>
                                                                                                        
                                                                                                        <span ng-if="name.loadstatus==1">
                                                                                                            
                                                                                                            <label for="set_id{{name.id}}"><input type="checkbox" checked value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Loaded</span></label>
                                                                                                         
                                                                                                        </span>
                                                                                                       
                                                                                                        
                                                                                                        </td>
                                                                                                    
                                                                                                </tr>
                                                                                                
                                                                                                <tr>
                                                                                                    <td colspan="4" class="text-end">SubTotal</td>
                                                                                                    <td class="text-right">Rs. {{fulltotal}} </td>
                                                                                                    <td></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td colspan="4" class="text-end">Discount</td>
                                                                                                    <td class="text-right">Rs. {{discounttotal}} </td>
                                                                                                    <td></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td colspan="4" class="text-end fw-bold">Grand Total</td>
                                                                                                    <td class="text-right fw-bold">Rs. {{discountfulltotal}} </td>
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
                                                       
                                                         <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                          <li class="float-end"><a href="javascript: void(0);" class="btn btn-primary"  ng-click="Proceedtocomplete()"   data-bs-toggle="modal"
                                                                    data-bs-target=".confirmModal"><i class="mdi mdi-thumb-up pe-1"></i>Load Proceed To Complete </a></li>
                                                        </ul>
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
  
  
   
   $scope.fetchRouteorderassignorder('orders_process',3,id,1);
   $scope.route_name = name;
  
  
 }
 
 
  $scope.loadProduct = function(id) {
  
  
  
   
    if($('#set_id'+id).is(':checked')) {
        var status=1;
        
        $('#textchange_'+id).text('Loaded');
    }
    else
    {
          var status=0;
          $('#textchange_'+id).text('Load');
    }
    
    $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id,'status':status, 'action':'loadstatus'}
      }).success(function(data){
       
       
      }); 
  
  
  
 };
 
 
 
 
  $scope.Proceedtocomplete = function() {
  
  
  
   
 var count=$('input[name="loaditems"]:checked').length;

  
  if(count==0)
  {
      alert('Select the checkbox..');
  }
  else
  {
        if(confirm("Are you sure you want to Complete?"))
        {
            
            
                 $http({
                 method:"POST",
                 url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                 data:{'status':0, 'order_id':'<?php echo $id; ?>','driver_pickip':'<?php echo $driver_pickip; ?>','action':'loadcompleted','tablenamemain':'orders_process'}
                 }).success(function(data){
                      
                         history.back();               
                 }); 
          
        
        }
  }
  
  
  
 };
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  
  
  
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
        data:{'id':id, 'action':'statuschange','tablenamemain':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
       
         $scope.fetchRouteorderassignorder('orders_process',3,0,1);
      }); 
    }
};









$scope.fetchData = function(){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_delivery_data?order_id=<?php echo $id; ?>&tablenamemain=<?php echo 'orders_process'; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert=1').success(function(data){
      $scope.namesData = data;
    });
    
   
  
   
};





$scope.fetchCustomerororderhistroy = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroy_driver",
      data:{'action':'fetch_single_data','order_id':'<?php echo $id; ?>','tablenamemain':'orders_process'}
    }).success(function(data){

        $scope.namesHistory = data;
          
    });
};

$scope.fetchCustomerororderhistroyorderlist = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroyorderlist_driver",
      data:{'action':'fetch_single_data','order_id':'<?php echo $id; ?>','tablenamemain':'orders_process','tablename_sub':'order_product_list_process'}
    }).success(function(data){

          $scope.namesHistoryorder = data;
          
         
    });
};






 





$scope.returnfinsh = function(){
   
        
              var returnid = $(".returnid");
              var order_product_id_set_value = [];
              var status = [];
               for(var i = 0; i < returnid.length; i++){
                  
                  if($(returnid[i]).is(':checked'))
                  {
                      
                   order_product_id_set_value.push($(returnid[i]).val());
                   status.push(2);
                   
                  }
                  else
                  {
                      order_product_id_set_value.push($(returnid[i]).val());
                      status.push(1);
                  }
                 
               }
            
               var order_product_id= order_product_id_set_value.join("|");
                var status_id= status.join("|");
      
        
                $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                    data:{'action':'returnproduct_driver','status':status_id,'order_product_id':order_product_id,'tablename_sub':'order_product_list_process '}
                  }).success(function(data){
                   
                }); 
         
};



$scope.fetchSingleDatatotal = function(){
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_totaldel?order_id=<?php echo $id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'orders_process','tablename_sub':'order_product_list_process'}
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
       
                               
      
       $scope.totalitems = data.totalitems;
       $scope.discounttotal = data.discount;
       $scope.discountfulltotal = data.discountfulltotal;
       $scope.Meter_to_Sqr_feet = data.Meter_to_Sqr_feet;
     
     
       $scope.fullqty = data.fullqty;
       $scope.FACT = data.FACT;
       $scope.UNIT = data.UNIT;
       $scope.NOS = data.NOS;
     
    });
};






$scope.fetchSingleDatatotaldel = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_totaldel?order_id=<?php echo $id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'orders_process','tablename_sub':'order_product_list_process','convert':'1'}
      }).success(function(data){

       $scope.fulltotaldel = data.fulltotal;
       
       $scope.commissiondel = data.commission;
       
       
       $scope.paricel_mode_del = data.paricel_mode;
       
       
       
       $scope.delivery_mode = data.delivery_mode;
      
       $scope.totalitemsdel = data.totalitems;
       $scope.discounttotaldel = data.discount;
       $scope.discountfulltotaldel = data.discountfulltotal;
      
     
       $scope.fullqtydel = data.fullqty;
      
    });
};

















$scope.fetchCustomerdetails = function () {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerdetails",
      data:{'id':'<?php echo $id; ?>','tablename':'orders_process'}
    }).success(function(data){
        
        
   
 $scope.company_name_data = data.company_name_data;
            $scope.customername = data.name;
            $scope.routename = data.route_name;
            
            
            
            $('#lat').val(data.lat);
            $('#laog').val(data.laog);
            
            
            $scope.address = data.address;
            $scope.orderno = data.order_no;
            $scope.customerphone = data.phone;
            $scope.starttime = data.assign_date;
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
     
     
    
     
     if(val=='NO')
     {
         
          $('#rescheduling_delivery_view').hide();
     }
     else
     {
         $('#rescheduling_delivery_view').show();
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
       
     var  amount_data= parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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
       
     var  amount_data= parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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
       
     var  amount_data= parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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
       
     var  amount_data= parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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
       
     var  amount_data= parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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
       
     var  amount_data= parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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
       
     var  amount_data= parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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


