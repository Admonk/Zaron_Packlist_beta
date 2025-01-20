<?php 
include "table_header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
   div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
}
table.table.align-middle.table-nowrap.newBorderedTable {
    font-size: 11px;
}
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>
     
     
     
     
     
     
     
     
         
     
     
     
       <div class="main-content">
            <div class="page-content">
               <div class="container-fluid">
                   
                                      

                         <div class="row">
                             
                             
                              
      















<div class="modal fade bs-example-modal-center" id="re_date" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Reschedule Date</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                         <form   ng-submit="Dateupdate()" method="post">
                                                        <div class="modal-body">
                                                           
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">Delivery Date:</label>
                                                                    <input type="date" class="form-control" required name="date" id="delivery_date">
                                                                </div>
                                                               
                                                              
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="sumnit" class="btn btn-primary">Save</button>
                                                        </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->














          
                            <div class="col-12">
                                
                      
                                          <div class="row">
                                       <div class="col-m-12">
                                          <div class="card mb-1">
                                             <div class="card-header align-items-start d-flex p-3">
                                                <div class="flex-shrink-0">
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" >
                                                     
                                                    
                                                         
                                                       <li class="nav-item ">
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#messages2" role="tab"  ng-click="confirmedPage(false)"  >
                                                         <span class="d-sm-block">Yet to Confirm </span>   
                                                         </a>
                                                      </li> 
                                                      
                                                      <li class="nav-item" style="margin-left:10px;">
                                                         <a class="nav-link" href="#" data-bs-toggle="tab" ng-click="confirmedPage(true)" role="tab" ng-click="pageTab('orders_process',11)">
                                                         <span class="d-sm-block">Confirmed delivery </span>   
                                                         </a>
                                                      </li> 
                                                   </ul>
                               


                                                </div>
                                             </div>
                                             <!-- end card header -->
                                             <!-- end card-body -->
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tab-content">
    <div class="fade show" id="messages2" role="tabpanel">
    <div class="row">
                                              
                                              <div class="col-12">
                                                  <div class="card shadow-none">
                                                      <div class="card-body">
                                                          
                                                          
                                                          
                                                          <!--datatable="ng" dt-options="vm.dtOptions"-->
                                                            <input type="hidden" id="nextnumber" value="0">   
                                                            <input type="hidden" id="prenumber" value="10">  
                                                            <input type="hidden" id="pageSize" value="10">  
                                                            <input type="hidden" id="order_base" value="1">
                                                          
                                 
                                                         
                          <div class="row" style="margin-bottom: 10px;">                                    
                            <div class="col-sm-3">
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
                          <div class="col-sm-3">
                          <label>From Date: </label><input type="date" class="form-control" id="from_date" ng-model="from_date" ng-change="DateFilter()">
                          </div>
                          
                           <div class="col-sm-3">
                           <label>To Date:</label><input type="date" class="form-control" id="to_date" ng-model="to_date" ng-change="DateFilter()">
                           </div>
                           
                           
                         <div class="col-sm-3">
                        <div id="example_filter" class="dataTables_filter">
                            <label>Search:</label><input type="search" class="form-control input-sm" placeholder="Order No,Name,phone,Sales Person" aria-controls="example" ng-model="searchText" ng-change="searchTextChanged()">
                        </div>
                    </div>  
                       </div>
                                                <div class="table-responsive" >               
                                                              <table class="table align-middle table-nowrap newBorderedTable" >
                                                                  <thead>
                                                                      <tr>
                                                                          <th><input class="form-check-input " type="checkbox" id="checkall" ng-click="allCheck()" style="width: 16px;height: 16px;"> </th>
                                                                          <th>Order No</th>
                                                                          <th>Name</th>
                                                                          <th>Phone</th>
                                                                          <th>Commission</th>
                                                                          <th>Total</th>
                                                                         <!--  <th>Ledger </th> -->
                                                                          <!--<th>Delivery</th>-->
                                                                          <th>Delivery_Scope</th>
                                                                          <th>Payment_Mode</th>
                                                                          <th  style="width: 12%;">Amount to collect</th>
                                                                         
                                                                          <th>Status</th>
                                                                          <?php
                                                                          if($this->session->userdata['logged_in']['access']!='12')
                                                                          {
                                                                           ?>
                                                                           
                                                                           
                                                                           
                                                                          <th>Order By</th>
                                                                          
                                                                           
                                                                           <?php
                                                                              
                                                                          }
                                                                          
                                                                          ?>
                                                                          <th>Delivery Date</th>
                                                                          <th>Return Date</th>
                                                                          <th>Create Date</th>
                                                                          <th>Action</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData" >
                                                                          <td>
                                                                              <div class="form-check font-size-16">
                                                                                  <input class="form-check-input customerlistcheck" name="customerlistcheck" ng-disabled="name.disabled =='disabled'"  value="{{name.id}}" type="checkbox" id="customerlistcheck01">
                                                                                 
                                                                              </div>
                                                                          </td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.order_no}}</a></td>
                                                                          <td style="width: 150px;font-size: 11px;"><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.name}}</a></td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.phone}}</a>
                                                                          </td>
                                                                          
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                              
                                                                              <span ng-if="name.commission>0">{{name.commission}}</span>
                                                                              
                                                                          </a></td>
                                                                           <td>



<input type="hidden" id="click_to_pick_{{name.id}}" value="{{name.click_to_pick}}">
                                                                            <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.totalamount | indianCurrency }}</a></td>
                                                                        
                                                                        
                                                                       <!--  <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.le_amount | indianCurrency }}</a></td> -->
                                                                        
                                                                        <!--<td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                            {{name.delivery_charge}}
                                                                            
                                                                            </a></td>-->
                                                                            
                                                                             <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                              {{name.delivery_status}}
                                                                            </a></td>
                                                                        <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                              {{name.payment_mode}}
                                                                            </a></td>


                                                                         <td>


<span ng-if="name.collection_remarks>1">

 <input type="number" name="advance"  class="form-control" id="ad_{{name.id}}" data-mode="{{name.payment_mode}}" ng-blur="inputsave_1(name.id,$event)" ng-disabled="name.disabled =='disabled'"  value="{{name.collection_remarks}}">
                                 
    
</span>
                                                                         

<span ng-if="name.collection_remarks<1">

 <input type="number"   class="form-control"  disabled  value="{{ name.collection_remarks | number:2 }}">
                                 
    
</span>

                                                                         </td>
                                                                               
                                                                            
                                                                            
                                                                       
                                                                        
                                                                          <td style="font-size: 10px;"><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">
                                                                              
                                                                               <span ng-if="name.order_base==0">
                                                                             
                                                                               {{name.reason}}
                                                                         
                                                                               </span>
                                                                               
                                                                               <span ng-if="name.order_base==1">
                                                                             
                                                                               {{name.reason}}
                                                                         
                                                                               </span>
                                                                               
                                                                               <span ng-if="name.order_base>1" style="color:#008dc3;font-weight:600;">
                                                                              
                                                                               {{name.reason}}
                                                                         
                                                                               </span>
                                                                               
                                     <span ng-if="name.picked_status==1" style="color: green;font-weight: 700;"><br>Order Packed</span>
                                                                             <p ng-if="name.randam_id"> {{name.randam_id}}</p>
                                                                              
                                                                              </a></td>
                                                                          
                                                                           <?php
                                                                          if($this->session->userdata['logged_in']['access']!='12')
                                                                          {
                                                                           ?>
                                                                           
                                                                           
                                                                           
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.order_by}}</a></td>
                                                                          
                                                                           
                                                                           <?php
                                                                              
                                                                          }
                                                                          
                                                                          ?>
                                                                          
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}" style="color:#000;">
                                                                              
                                                                              <span ng-if="name.create_date=='01-01-1970'">NA</span>
                                                                              <span ng-if="name.create_date!='01-01-1970'">{{name.create_date}}</span>
                                                                              
                                                                              
                                                                              </td>

                                                                           <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.return_date}} </td>

                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.create_date_new}} {{name.create_time}}  </td>
                                                                          <td>


                                                                            <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}" ><i class="mdi mdi-eye font-size-16 text-success me-1"></i> View</a>


                                      <a ng-if="name.cMode=='1'" href="<?php echo base_url(); ?>index.php/order_second/pick_list_view?id={{name.id}}&confirmed=true&DC_id={{name.randam_id}}" target="_blank" ><i class="mdi mdi-plus font-size-16 text-success me-1"></i> Packlist </a>
                                      <a ng-if="name.cMode=='0'" href="<?php echo base_url(); ?>index.php/order_second/pick_list_view?id={{name.id}}&confirmed=false&DC_id={{name.randam_id}}" target="_blank" ><i class="mdi mdi-plus font-size-16 text-success me-1"></i> Packlist </a>
                                                                           
                                                                          </td>
                                                                      </tr>
                                                                      
                                                                      
                                                                      <tr ng-show="namesData.length==0"><td style="text-align: center;" colspan="11">No Data Found..</td></tr>
                                                                     
                                                                  </tbody>
                                                              </table>
                                                              
                                                                 
                       
                        
                                                              
                                                          </div>
                                                          
                                                           
                                                           
                                                           <div class="row" style="margin-top: 10px;">
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
                        
                        
                        
                        
                        
                        
                        
                        <button type="button"  ng-click="coniformDate()" class="btn btn-success waves-effect waves-light confirm" >Confirm</button>
                        <button type="button"  ng-click="rescheduleDate()" class="btn btn-primary waves-effect waves-light" >Reschedule</button>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                  
                        
                       
                        
                 
               </div>
            </div>
            <!-- End Page-content -->
         </div>
     
     
     
     
     
     



   </div>
   
   
   
   
   
 <script>

var app = angular.module('crudApp', ['datatables']);

app.filter('indianCurrency', function () {
    return function (input) {
        if (isNaN(input)) return input;
        var formattedValue = parseFloat(input);
        // console.log(input.toLocaleString('en-IN').toFixed(2));
         var decimal =  formattedValue.toLocaleString('en-IN', {   minimumFractionDigits: 2, maximumFractionDigits: 2 });

        return decimal

    };
});

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;




   var date = new Date();

  $scope.from_date = new Date();
  $scope.to_date = new Date();



    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    $scope.cMode = 0;
    $scope.tablename='orders_process';
    getData();

$scope.confirmedPage = (bool) => {
    $scope.cMode = bool ? 1 : 0;
    $scope.currentPage = 1;


    if(bool==true)
    {
         $('.confirm').hide();
    }
    else
    {
         $('.confirm').show();
    }

    getData();
}

   function getData() {
       
       
       
      var order_base = $('#order_base').val();
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      
        $http.get('<?php echo base_url() ?>index.php/order_check/fetch_data_table_delivery?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date+'&cMode='+$scope.cMode)
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

 
 
 
 
  $scope.inputsave_1= function(order_id,event) 
  {
    //if(event.keyCode==13)
    //{
                                 var inputvalue=$('#ad_'+order_id).val();


                                  $http({
                                  method:"POST",
                                  url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                                  data:{'advance':inputvalue,'id':order_id,'action':'Advance_remarks','tablenamemain':'orders_process','tablename_sub':'order_product_list_process'}
                                    }).success(function(data){
                                
                                      
                                         
                                   });
              //}

 }

  $scope.inputsave_1_set= function(order_id) 
  {

                                 var inputvalue=$('#ad_'+order_id).val();
                                 var check=$('#click_to_pick_'+order_id).val();

                                 if(check==0)
                                 {


                                  $http({
                                  method:"POST",
                                  url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                                  data:{'advance':inputvalue,'id':order_id,'action':'Advance_remarks_set','tablenamemain':'orders_process','tablename_sub':'order_product_list_process'}
                                    }).success(function(data){
                                
                                      
                                         
                                   });

                                    

                                 }
                                  




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
    
    
    
    
    
 
 
 $scope.pageTab = function(tabelename,status){
    
    
      $('#order_base').val(status);
      $scope.currentPage = 1;
      getData();
     

    
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
          
    
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      
        
        $http.get('<?php echo base_url() ?>index.php/order_check/fetch_data_table_delivery?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date+'&cMode='+$scope.cMode)
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



 

 
 
 
 
 
 





































$scope.DateFilter = function(){
    
    getData();
    
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
        data:{'id':id, 'action':'Cancel_by_order','tablenamemain':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
         getData();
      }); 
    }
};




  $scope.allCheck = function(){
      
       if ($('#checkall').is(':checked'))
       {
           
            $('.customerlistcheck').prop('checked',true);
        }
        else
        {
            $('.customerlistcheck').prop('checked',false);
            
        }
      
  };

  $scope.coniformDate = function(){
      
        if($('.customerlistcheck').is(':checked'))
        {


           
             var product_order_id = [];
             var check=0;
             var advance=0;
             $('input[name="customerlistcheck"]:checked').each(function(){
               
                      product_order_id.push($(this).val()); 


                          $scope.inputsave_1_set($(this).val()); 

                      $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order_second/setAllPicked",
                        data:{'orderId':$(this).val()}
                    }).success(function(data)
                    {
                        // $scope.success = false;
                        // $scope.error = false;
                        // getData();
                        if(data.access==-1)
                        {
                            alert('Partial Dispatch Order Confirmed the pacl list page');
                        }

                    }); 


                   


                      var ssd=$(this).val();

                      var payment_mode=$('#ad_'+ssd).data('mode');
                      var section_vlaue=$('#ad_'+ssd).val();

                      if(payment_mode=='Cash')
                      {
                           advance+=parseFloat($('#ad_'+ssd).val());
                      }

                       if(payment_mode!='Cash')
                      {
                           advance+=1;
                      }


                      if(section_vlaue=='')
                      {
                        $('#ad_'+ssd).css('border-color', 'red');
                      }

                
              });




               if(advance>0)
               {
                  var check=1;
               }

               if(advance==-1)
               {
                  var check=-1;
               }
            
                var checkinsert= product_order_id.join("|");
             
                if(check==1)
                {

                   $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/delivery_date_coniform",
                    data:{'order_id':checkinsert,'delivery_date':0}
                  }).success(function(data){
                     
                     
                    
                      //alert('Date Confirmed..');
                      //getData();

                      // gg changes for scope task

                        // gg changes for scope task
                        if(data == 'scope not defined'){

                        alert('Scope Not Defind..');
                        return false;
                        }else {
                        alert('Date Confirmed..');
                        getData();
                        }
                      
                      
                      
                  });


                }
                else if(check==-1)
                {
                     alert('Partial Dispatch Order Confirmed the pacl list page');
                }
                else
                {

                    alert('Fill Advance Amount for Cash');

                }
               





    
        }
        else
        {
             alert('Select the orders');
            
        }
      
  };
  $scope.rescheduleDate = function(){
      
        if($('.customerlistcheck').is(':checked'))
        {
            $('#re_date').modal('toggle');
           
        }
        else
        {
             alert('Select the orders');
            
        }
      
  };
  
  
  
 $scope.Dateupdate = function(){
      
      
      
          var product_order_id = [];
      
           $('input[name="customerlistcheck"]:checked').each(function(){
               
                    product_order_id.push($(this).val()); 
                
            });
            
             var checkinsert= product_order_id.join("|");
             var delivery_date= $('#delivery_date').val();
             
                $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order/delivery_date_update",
                  data:{'order_id':checkinsert,'delivery_date':delivery_date}
                }).success(function(data){
                   
                   
                    $('#re_date').modal('toggle');
                    alert('Date Updated..');
                    getData();
                    
                    
                    
                });
    
    
             
             
             
           
    
    
  };


});

</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>


