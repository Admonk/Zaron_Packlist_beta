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

button.accordion-button.fw-medium {
    padding: 10px 10px;
}.trpoint {
    
    cursor: pointer;
   
}
.trpoint:hover {
    background: antiquewhite;
}
label {
    cursor: pointer;
    margin-bottom: 0;
}
      </style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>
  <div id="layout-wrapper">
         <div class="main-content">
            <div class="page-content">
                    <div class="">
                        <div class="row driver-detail-page" ng-init="fetchSingleDatatotal()">
                                <div class="col-lg-12">
                                    <div class="card flexHeightCard">
                                        <div class="card-header">
                                            <h4 class="card-title mb-0">Wizard with Progressbar</h4>
                                        </div>
                                        <div class="card-body" >

                                            <div id="progrss-wizard" class="twitter-bs-wizard">
                                                <ul class="twitter-bs-wizard-nav nav nav-pills nav-justified d-none">
                                                  
                                                    <li class="nav-item">
                                                        <a href="#progress-seller-details" class="nav-link" data-toggle="tab">
                                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Seller Details">
                                                                <i class="bx bx-list-ul"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                 
                                                   
                                                    
                                                   
                                                </ul>
                                                <!-- wizard-nav -->

                                                <div id="bar" class="progress mt-4 d-none">
                                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                                                </div>
                                                <div class="tab-content twitter-bs-wizard-tab-content">
                                                    
                                                    
                                                    <div class="tab-pane" id="progress-seller-details">
                                                         <div class="text-start mb-2">
                                                            <div class="row">
                                                                <div class="col-5 orderListWizardSideB">
                                                                    <div class="title p-3 pb-2 pt-2 justify-content-between">
                                                                        <h4 class="font-size-14 m-0">Order ID: {{order_no_id}}</h4>
                                                                        <span class="font-size-12">{{create_date}} {{create_time}}</span>
                                                                        
                                                                        <span class="badge bg-primary font-size-12 p-2 d-none"><i class="mdi mdi-location-enter font-size-16 pe-2"></i> Assign overall</span>
                                                                        
                                                                        
                                                                    </div>
                                                                    
                                                                    
                                                                   
                                                                    
                                                                   
                                                                    
                                                                    <div class="mt-3 ps-2">
                                                                        <h6>COIL Selection</h6>
                                                                        <label> Coil No :
                                                                         <select class="coil" id="coilid" style="width:230px;padding: 3px;margin: 0px 10px;">
                                                                            
                                                                            <option value="0">SELECT COIL</option>
                                                                            <?php
                                                                            foreach($purchase_order as $val)
                                                                            {
                                                                                ?>
                                                                                 <option value="<?php echo $val->id; ?>"><?php echo $val->po_number; ?> - QTY : <?php echo $val->inward_qty; ?></option>
                                                                                 
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                            
                                                                           
                                                                        </select>
                                                                         </label>
                                                                         
                                                                         <label> QTY :
                                                                        <input type="text" id="qty" style="width:100px">
                                                                         </label>
                                                                    </div>
                                                                    
                                                                    
                                                                   
                                                                    
                                                                    
                                                                    
                                                                    <div class="table-responsive tableAccesWizard" ng-init="fetchDataCategorybase(1)" style="height: 500px;overflow: auto;border-right: #cbcbcb solid 3px;">
                                                                        
                                                                        <div  ng-repeat="namecate in namesDatacate">
                                                                        
                                                                        
                                                                        <h5 class="mt-3 ">{{namecate.no}}. {{namecate.categories_name}} 
                                                                         <span class="pe-5 float-end"><button class="assignAccessAll btn btn-primary p-0 ps-2 pe-2"><i class="mdi mdi-location-enter font-size-16"></i> Assign all</button></span></h5>
                                                                        <hr>
                                                                        <table class="table mb-0" ng-init="fetchData('1')">
                                
                                                                            <thead>
                                                                                <tr style="background: #dddddd;">
                                                                                    
                                                                                    <th><input class="accCheckbox form-check-input" ng-click="viewClickcheck(namecate.categories_id,namecate.categories_name)" value="1" type="checkbox" ></th>
                                                                                    <th>#</th>
                                                                                    <th>Products</th>
                                                                                    <th>Length</th>
                                                                                    <th ng-if="namecate.categories_id!=1">Crimp</th>
                                                                                    <th>Nos</th>
                                                                                    
                                                                                </tr>
                                                                            </thead>
                                                                            
                                                                            
                                                                            
                                                                            <tbody  ng-repeat="name in namesData">
                                                                                  
                                                                                <tr ng-if="namecate.categories_id==name.categories_id_get"    ng-click="viewGetprocess(name.id,name.product_name_tab,name.product_id)" id="show_{{name.id}}" class="trpoint">
                                                                                  
                                                                                  
                                                                                  
                                                                                  
                                                                                    <td>
                                                                                        <span ng-if="name.checked==0">
                                                                                            
                                                                                            <input class="accCheckboxset form-check-input bs_{{namecate.categories_id}} ps_{{name.id}}" type="checkbox" value="{{name.id}}" id="check_{{name.id}}">
                                                                                        
                                                                                            
                                                                                        </span>
                                                                                        
                                                                                        <span ng-if="name.checked==1">
                                                                                            
                                                                                            <input class="accCheckboxset form-check-input bs_{{namecate.categories_id}} ps_{{name.id}}" checked type="checkbox" value="{{name.id}}" id="check_{{name.id}}">
                                                                                        
                                                                                            
                                                                                        </span>
                                                                                        
                                                                                        
                                                                                        </td>
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    <td scope="row"><label for="check_{{name.id}}">{{name.no}} </label></td>
                                                                                    <td><label for="check_{{name.id}}">{{name.product_name_tab}}</label></td>
                                                                                    <td><label for="check_{{name.id}}">{{name.profile_tab}} </label></td>
                                                                                    <td ng-if="namecate.categories_id!=1"><label for="check_{{name.id}}">{{name.crimp_tab}}</label></td>
                                                                                    <td><label for="check_{{name.id}}">{{name.nos_tab}}</label></td>
                                                                                   
                                                                                    
                                                                                </tr>
                                                                                
                                                                                
                                                                                
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                        
                                                                            
                                                                        </div>
                                                                        
                                                                       
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-7">
                                                                    <div class="text-start mb-2">
                                                                       <h5 class="wizard-title">Order Process Flow    <span ng-if="production_assign==0">
                                                                        <p style="text-align: right;color: red;font-weight: 800;">Production Not Start</p>
                                                                    </span>
                                                                    
                                                                    <span ng-if="production_assign==1">
                                                                        <p style="text-align: right;color: #41c100;font-weight: 800;">{{reason}}</p>
                                                                    </span>
                                                                    
                                                                    </h5>
                                                                        <div class="card-body p-0">
                                                                            
                                                                            <div class="tab-content p-3 text-muted">
                                                                                
                                                                                <h4>{{sname}}</h4>
                                                                                
                                                                                
                                                                                <input type="hidden" id="order_product_id" value="{{snameid}}">
                                                                                <input type="hidden" id="product_id" value="{{sproduct_id}}">
                                                                                
                                                                                <div class="tab-pane active" id="accessories" role="tabpanel" style="height:400px;overflow: auto;">
                                                                                   
                                                                                     <div class="selectBox_production">
                                                                                        <div class="selectBoxFlex" id="sortableProduction" ng-init="fetchSingleDatatotal()">
                                                                                            
                                                                                            
                                                                                            <div class="selectBoxInline checkedTrue" ng-repeat="nameprocess in fetchprocessproductdata">
                                                                                                
                                                                                                <a href="#" ng-click="viewProcessdelete(nameprocess.id,nameprocess.order_product_id)" style="position: absolute; margin-top: -73px;margin-left: 45px;color: white;font-size: 15px;"><i class="bx bx-trash label-icon"></i></a>
                                                                                                {{nameprocess.proudtcion_name}}
                                                                                            </div>
                                                                                            
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                   
                                                                                </div>
                                                                                
                                                                                
                                                                                
                                                                                                     
                                                                                     <div class="flex-wrap gap-2" id="showproductionoptions" style="margin: auto;line-height: 3;width: 50%;display:none;">
                                                                                         
                                                                                          <?php
                                                                                                foreach($production as $productionval)
                                                                                                {
                                                                                                    
                                                                                                    if($productionval->categories!='Gutter')
                                                                                                    {
                                                                                                        
                                                                                                    
                                                                                                    ?>
                                                                                                    
                                                                                                    
                                                                                               <button type="button" class="btn btn-success waves-effect btn-label waves-light"  ng-click="addProcess('<?php echo $productionval->categories; ?>','<?php echo $productionval->id; ?>')"><i class="bx bx-plus label-icon"></i> <?php echo $productionval->categories; ?></button>
                                                                           
                                                                                                    
                                                                                                    
                                                                                                    <?php
                                                                                                    }
                                                                                                    
                                                                                                    
                                                                                                }
                                                                                
                                                                                           ?>
                                                  
                                                    
                                                                                   
                                                                                     </div>
                                                                                      
                                                                                      
                                                                                      <div class="flex-wrap gap-2" id="showproductionoptionsgutton" style="margin: auto;line-height: 3;width: 50%;display:none;">
                                                                                         
                                                                                          <?php
                                                                                                foreach($production as $productionval)
                                                                                                {
                                                                                                    ?>
                                                                                                    
                                                                                                    
                                                                                               <button type="button" class="btn btn-success waves-effect btn-label waves-light"  ng-click="addProcess('<?php echo $productionval->categories; ?>','<?php echo $productionval->id; ?>')"><i class="bx bx-plus label-icon"></i> <?php echo $productionval->categories; ?></button>
                                                                           
                                                                                                    
                                                                                                    
                                                                                                    <?php
                                                                                                    
                                                                                                    
                                                                                                }
                                                                                
                                                                                           ?>
                                                  
                                                    
                                                                                   
                                                                                     </div> 
                                                                                      
                                                                                      
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        
                                                                   <span ng-if="production_assign==0">
                                                                        <ul class="pager wizard twitter-bs-wizard-pager-link production-link-wizard">
                                                                        <li class="next"><a href="javascript: void(0);" class="btn btn-primary w-md" onclick="nextTab()" ng-click="startProcess(1)">Start Process</a></li>
                                                                    </ul>
                                                                    </span>
                                                                    
                                                                    <span ng-if="production_assign==1">
                                                                         <ul class="pager wizard twitter-bs-wizard-pager-link production-link-wizard">
                                                                        <li class="next"><a href="javascript: void(0);" class="btn btn-success w-md" onclick="nextTab()" ng-click="startProcess(1)"> Process Started</a></li>
                                                                    </ul>
                                                                    </span>
                                                                   
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

var app = angular.module('crudApp', ['datatables']);
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










// New edit


$scope.viewGetprocess = function(id,name,product_id){
     $scope.sname=name;
     $scope.snameid=id;
     $scope.sproduct_id=product_id;
     
    $('.trpoint').css("background-color", "white");
    $('#show_'+id).css("background-color", "#f5b698");
    
    
    $('#showproductionoptions').show();
    
    
    $scope.fetchProcessproduct(id);
     
};
$scope.viewProcessdelete = function(id,order_product_id){
    
   $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id,'action':'addprocessdelete','tablenamemain':'proudtcion_order_products'}
      }).success(function(data){
          
           $scope.fetchProcessproduct(order_product_id);
      
    }); 
    
    
     
};

$scope.startProcess = function(status){
    
    
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'status':status,'reason':'Production Started','action':'process_status_assign','order_id':'<?php echo $id; ?>','tablenamemain':'orders_process'}
      }).success(function(data){
          
           
           alert('Production Started');
           $scope.fetchSingleDatatotal();
      
    }); 

};



$scope.viewClickcheck = function(id,name){
    
    
    
        if($('.accCheckbox').prop('checked') == true) 
        {
            
            if(id==1)
            {
                 $('#showproductionoptionsgutton').show();
                 $('#showproductionoptions').hide();
            }
            else
            {
                 $('#showproductionoptionsgutton').hide();
                 $('#showproductionoptions').show();
            }
           
           $('.bs_'+id).prop("checked", true);
           
           
           
        }
        else
        {
           
             $('.bs_'+id).prop("checked", false);
             $('#showproductionoptionsgutton').hide();
             $('#showproductionoptions').hide();
        }
    
    
    
    
}


$scope.addProcess = function(name,id){
    
    
    
    
        if($('.accCheckbox').prop('checked') == true) 
        {
              
               var spiltparicel = $(".accCheckboxset");
               var order_product_id_set_value = [];
               for(var i = 0; i < spiltparicel.length; i++){
                  
                  if($(spiltparicel[i]).is(':checked')) {
                   order_product_id_set_value.push($(spiltparicel[i]).val());
                   $scope.fetchProcessproduct(order_product_id_set_value);
                  }
                 
               }
            
               var order_product_id= order_product_id_set_value.join("|");
               
                 $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                    data:{'order_product_id':order_product_id,'name':name,'id':id,'order_id':'<?php echo $id; ?>', 'action':'addprocessloop','tablenamemain':'proudtcion_order_products'}
                  }).success(function(data){
                      
                      
                  
                 }); 
      
            
            
        }
        else
        {
            
                 var order_product_id=$('#order_product_id').val();
                 var product_id=$('#product_id').val();
                
                
                 $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                    data:{'order_product_id':order_product_id,'product_id':product_id,'name':name,'id':id,'order_id':'<?php echo $id; ?>', 'action':'addprocess','tablenamemain':'proudtcion_order_products'}
                  }).success(function(data){
                      
                       $scope.fetchProcessproduct(order_product_id);
                  
                 }); 
                        
        }
    
    
    
    
    
  
    
     
};



$scope.fetchProcessproduct = function(order_product_id){
      $http.get('<?php echo base_url() ?>index.php/order/fetch_data_order_process?tablename=proudtcion_order_products&order_product_id='+order_product_id+'&order_id=<?php echo $id; ?>').success(function(data){
      $scope.fetchprocessproductdata = data;
      
      
      
      
      
      
      
    });
};

//end

















  $scope.fetchDataCategorybase = function(id){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetchDataCategorybase?order_id=<?php echo $id; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert='+id).success(function(data){
      
      
      
      
      $scope.namesDatacate = data;
      
      
      
      
      
      
      
      
    });
    
   
  
   
  };


$scope.fetchData = function(){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data?order_id=<?php echo $id; ?>&tablenamemain=<?php echo 'orders_process'; ?>&&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert=1').success(function(data){
     
     
       
     
                 $scope.namesData = data;
                 var cheid=0;
                 for(var i = 0; i < data.length; i++)
                 {
                     var che= data[i].checked;
               
                     if(i==0)
                     {
                         var cheid= data[i].id;
                     }
                 
                 }
                 $scope.fetchProcessproduct(cheid);
               
      
    });
     
      
     
    
   
  
   
  };



$scope.fetchSingleDatatotal = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_total?order_id=<?php echo $id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'orders_process','tablename_sub':'order_product_list_process','convert':'1'}
    }).success(function(data){

       $scope.fulltotal = data.fulltotal;
       
       
       $scope.order_no_id = data.order_no_id;
       
       
       $scope.production_assign = data.production_assign;
       
      
       
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
       
             $scope.create_time = data.create_time;
             $scope.create_date = data.create_date;
      
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


});

</script>  
   
   <?php include ('footer.php'); ?>
        
        <style>
            .selectBoxInline {
                display: inline-flex;
                width: 120px;
                height: 120px;
                justify-content: center;
                align-items: center;
                text-align: center;
                color: #fff;
                margin: 0px;
                background-image: url(https://admonk.in/zaron_beta/assets/images/black-shape-27530.png) !important;
                background-size: cover;
                background-repeat: no-repeat;
            }
            
            .selectBoxInline.checkedTrue
            {
                background-image: url(https://admonk.in/zaron_beta/assets/images/orange-shape-27530.png) !important;
            }
            
            .selectBoxFlex {
                display: flex;
                justify-content: center;
                padding: 10px;
                width: 600px;
                margin: 0 auto;
                flex-wrap: wrap;
            }
            
            .production-link-wizard {
                width: 100% !important;
                text-align: right !important;
                float: right;
                justify-content: center !important;
                align-items: center !important;
            }
            
            .production-link-wizard li {
                width: 70% !important;
            }
            
            .ticket-inner .accordion-item {
                margin-bottom: 10px;
            }
            
            .ticket-inner .accordion-button:not(.collapsed)
            {
                background: #f6f6f6;
            }
            
            .accordion-flush .accordion-item .accordion-button.collapsed {
                border-radius: 0;
                border-bottom: 1px solid #000;
            }
            .ticket-inner .nav-pills .nav-link {
                border-bottom: 1px solid #ff5e14;
                border-radius: 0px !important;
            }
            
            .ticket-inner .leftPanelBar {
                border-right: 1px solid #ccc;
            }
            
            #progress-wizard .twitter-bs-wizard .twitter-bs-wizard-pager-link
            {
                padding-top:0px !important;
            }
            #progrss-wizard .tab-pane .text-start {
                min-height: 60vh;
            }
            
            .tab-pane .wizard-title
            {
                text-align: left;
                margin-bottom: 10px;
                padding-bottom: 6px;
            }
            
            .orderListWizardSideB .table-responsive {
                max-height: 72vh;
                overflow-y: scroll;
            }
            
            .orderListWizardSideB span.badge
            {
                color:#fff;
            }
            
            div#progress-seller-details ul li.nav-item {
                width: unset;
            }
            
            .gray
            {
               background-color: #f9f9f9;
            }
            
            .tab-pane  .card-header {
                display: unset;
            }
            .binItems,.bayColItem {
                background: #ebebeb;
                border-radius: .15rem;
                padding: 10px;
                width: 100%;
                min-height: 80px;
            }
            
            .binContent p, .bayContent p {
                background: #ffffff;
                max-width: 48%;
                padding: 3px;
                border-radius: 3px;
                width: 48%;
                margin-bottom: 8px;
                position:relative;
            }
            
            .binContent p a {
                color: #000;
                padding-left: 10px
            }
            
            .binContent,.bayContent {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                position:relative;
            }
            .binContent p:nth-child(odd) a {
                color: #000;
                padding-left: 10px;
            }
            .binContent p:nth-child(odd) {
                background: #ffffff;
            }
            
            
            .tooltipCol:hover span {
                opacity: 1;
                filter: alpha(opacity=100);
                left: 10px;
                top: -63px;
                z-index: 99;
                -webkit-transition: all 0.2s ease;
                -moz-transition: all 0.2s ease;
                -o-transition: all 0.2s ease;
                transition: all 0.2s ease;
                }
                
                .box b {
                  color: #fff;
                }
                
                .tooltipCol span {
                	background: none repeat scroll 0 0 #222; /*-- some basic styling */
                	color: #F0B015;
                	font-family: 'Helvetica';
                	font-size: 1em;
                	font-weight: normal;
                	line-height: 1.5em;
                	padding: 16px 15px;
                	width: 240px;
                	top: -20px;  /*-- this is the original position of the tooltip when it's hidden */
                	left: 0px;
                	margin-left: 0;	
                	/*-- set opacity to 0 otherwise our animations won't work */
                	opacity: 0;
                	filter: alpha(opacity=0);  	
                	position: absolute;
                	text-align: center;	
                	z-index: 2;
                	text-transform: none;
                	-webkit-transition: all 0.3s ease;
                	-moz-transition: all 0.3s ease-in-out;
                	-o-transition: all 0.3s ease;
                	transition: all 0.3s ease-in-out;
                }
                
                .tooltipCol span:after {
                	border-color: #222 rgba(0, 0, 0, 0);
                	border-style: solid;
                	border-width: 15px 15px 0;
                	bottom: -15px;
                	content: "";
                	display: block;
                	left: 31px;
                	position: absolute;
                	width: 0;
                }
        </style>
        
        <script type="text/javascript">
            jQuery(function() {
                jQuery("#sortableProduction").sortable();
              });
              
                 $('.selectBoxFlex .selectBoxInline').click(function(){
                    
                    $(this).toggleClass('checkedTrue');
                });
                
                 $('.assignAccessAll').hide();
               
                
               
                $(function () {
                   
                  $('[data-toggle="tooltip"]').tooltip();
                  
                });
        </script>
</body>
</html>

