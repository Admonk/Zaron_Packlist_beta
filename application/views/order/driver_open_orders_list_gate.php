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
                            <div class="col-12">
                                          <div class="row">
                                       <div class="col-m-12">
                                          <div class="card mb-1">
                                             <div class="card-header align-items-start d-flex p-3">
                                                <div class="flex-shrink-0">
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('order_delivery_order_status')">
                                                    
                                                   
                                               
                                                   
                                                    
                                                    

                                                     <li class="nav-item ">
                                                         <a class="nav-link active"  data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('order_delivery_order_status',50)" >
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Weight Update Pending <span class="badge rounded-pill bg-danger  float-end"> {{w_update_pending}} </span></span>   
                                                         </a>
                                                      </li> 



                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('order_delivery_order_status',3)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">Weight Updated
                                                          <span class="badge rounded-pill bg-success  float-end"> {{w_update}} </span>
                                                         </a>
                                                      </li>




                                                      <li class="nav-item">
                                                         <a class="nav-link " data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('order_delivery_order_status',1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">Weight Approved

                                                           <span class="badge rounded-pill bg-success  float-end"> {{w_update_approved}} </span>
                                                         </a>
                                                      </li>



                                                       <li class="nav-item">
                                                         <a class="nav-link " data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('order_delivery_order_status',2)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">Weight Rejected 

                                                           <span class="badge rounded-pill bg-danger  float-end"> {{w_update_rejected}} </span>


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
                                          <div class="row">
                                              
                                              <div class="col-12">
                                                  <div class="card shadow-none">
                                                      <div class="card-body">
                                                          
                                                          
                                                            <!--datatable="ng" dt-options="vm.dtOptions"-->
                                                            <input type="hidden" id="nextnumber" value="0">   
                                                            <input type="hidden" id="prenumber" value="10">  
                                                            <input type="hidden" id="pageSize" value="10"> 
                                                            <input type="hidden" id="order_base" value="50"> 

                                                 
                                                      
                                                          
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

                           
                            <label>Search:</label> 
                                                    <a href="#" ng-click="withoutKG(1)" id="withoutkg" style="float: right;">View Orders WithOut Kg</a>
                                                    <a href="#" ng-click="withoutKG(0)" id="withkg" style="display:none;float: right;">View Orders With Kg</a>      
                                                    
                                                    <input type="hidden" id="getviewstatus" value="0">


<label for="lable2"> <input type="checkbox" value="1" name="checkinsert" class="checkall" id="lable2" title="Weightnm update filter"> Weight </label>
    <label for="lable3"> <input type="checkbox" value="1" name="checkinsert1" class="checkall" id="lable3" title="Partial Delivery filter"> Partial</label> 
                                                
                            
                            <input type="search" class="form-control input-sm" placeholder="Order No,Name,phone,Sales Person,Driver,Vehicle_No" aria-controls="example" ng-model="searchText" id="searchText" ng-change="searchTextChanged()">
                        </div>
                    </div>
                       </div>

                                                          <div class="table-responsive">
                                                              <table class="table align-middle table-nowrap newBorderedTable" >
                                                                  <thead>
                                                                      <tr>
                                                                          <th><input class="form-check-input " type="checkbox" id="checkall" ng-click="allCheck()" style="width: 16px;height: 16px;"></th>
                                                                          <th>Order No</th>
                                                                          <th style="width:200px;">Name</th>
                                                                        
                                                                          <!--<th>Commission</th>-->
                                                                          <th>Total</th>
                                                                          <th>Delivery_Charge</th>
                                                                          <!--<th>Status</th>-->
                                                                          <th style="width: 150px;">Status</th>
                                                                          <th>Order By</th>
                                                                           <th>Driver</th>
                                                                          <th>Vehicle_No</th>
                                                                          <th>Create Date</th>
                                                                          <th >Action</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData">
                                                                          <td>
                                                                              <div class="form-check font-size-16">
                                                                                  <input class="form-check-input customerlistcheck" name="customerlistcheck" value="{{name.id}}" type="checkbox" id="customerlistcheck01">
                                                                                 
                                                                              </div>
                                                                          </td>
                                                                          <td><a target='_blank' href="<?php echo base_url(); ?>index.php/order_second/pick_list_view?id={{name.id}}&confirmed=true&DC_id={{name.randam_id}}&convertion=2">{{name.order_no}}</a></td>
                                                                          <td>{{name.name}}
                                                                          <br>
                                                                          {{name.phone}}
                                                                          </td>
                                                                          
                                                                          
                                                                          <!--<td>{{name.commission}}</td>-->
                                                                           <td>{{name.collection_remarks  | number}}</td>
                                                                           <td>{{name.delivery_charge}}</td>
                                                                       
                                                                       
                                                                          <td>

                                                                            {{name.reason}}

                                                  <p ng-if="name.gate_login_view_status==0" style="color: red;">{{name.status}}</p>
                                                  <p ng-if="name.gate_login_view_status==1" style="color: green;">{{name.status}}</p>
                                                  <p ng-if="name.gate_login_view_status==2" style="color: red;">{{name.status}}</p>


                                                                           </td>
                                                                           <td>{{name.order_by}} </td>
                                                                            <td>{{name.order_byd}} </td>
                                                                            <td>{{name.vehicle_number}} </td>
                                                                          <td>{{name.create_date}} {{name.create_time}}</td>
                                                                          <td >
                                                                              
                                                                                    <!-- <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process_finance_verification?order_id={{name.base_id}}" ><i class="mdi mdi-eye font-size-16 text-success me-1"></i> Order View</a>
                                                                                      <a href="#"   ng-click="deleteData(name.id)"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Delete</a>-->
                                                                                     
                                                                       
                                                                  <?php 
                                                                   if($this->session->userdata['logged_in']['access']==14 || $this->session->userdata['logged_in']['access']==1)
                                                                   {

                                                                    ?>


                                                                      <span ng-if="name.convertion==2">
                                                                     <a target='_blank' href="<?php echo base_url(); ?>index.php/order_second/pick_list_view?id={{name.id}}&confirmed=true&DC_id={{name.randam_id}}&convertion=2" style="color: green;font-weight: 600;" target="_blank">Weight Updated</a>
                                                                  
                                                                  </span>                   
                                                                  <span ng-if="name.convertion!=2">
                                                                     <a target='_blank' href="<?php echo base_url(); ?>index.php/order_second/pick_list_view?id={{name.id}}&confirmed=true&DC_id={{name.randam_id}}&convertion=2" target="_blank">Weight Updated Pending</a>
                                                                  
                                                                  </span> 



                                                                    <?php

                                                                   }
                                                                   else
                                                                   {


                                                                    ?>


                                                                  <span ng-if="name.convertion==2">
                                                                     <a target='_blank' href="<?php echo base_url(); ?>index.php/order_second/pick_list_view?id={{name.id}}&confirmed=true&DC_id={{name.randam_id}}&convertion=2" style="color: green;font-weight: 600;" target="_blank">Weight Updated</a>
                                                                  
                                                                  </span>                   
                                                                  <span ng-if="name.convertion!=2">
                                                                     <a target='_blank' href="<?php echo base_url(); ?>index.php/order_second/pick_list_view?id={{name.id}}&confirmed=true&DC_id={{name.randam_id}}&convertion=2" target="_blank">Weight Updated Pending</a>
                                                                  
                                                                  </span> 


                                                                    <?php


                                                                   }
       
                                                                  ?>

                                                                  






                                                                 
                                                                 
                                                                                      
                                                                                  
                                                                              </div>
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

            
                         <?php 
                         if($this->session->userdata['logged_in']['access']==14)
                         {

                         ?>  
                        <div class="showbtn" ng-if="order_base==50">
                             
                             <button type="button"  ng-click="coniformed()" class="btn btn-success waves-effect waves-light" >Approve</button>
                           
                          
                        </div>  

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
                        </div>




       
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
    $scope.cMode = 1;
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
      var viewstatus= $('#getviewstatus').val();
    var searchText= $('#searchText').val();

         var order_base_id = [];
            $('input[name="checkinsert"]:checked').each(function(){
               
                    order_base_id.push($(this).val()); 
                
             });
            
             var order_base_data= order_base_id.join("|");
             

            var checkinsert1 = [];
            $('input[name="checkinsert1"]:checked').each(function(){
               
                    checkinsert1.push($(this).val()); 
                
             });
            
             var delivery_p= checkinsert1.join("|");
             












        $http.get('<?php echo base_url() ?>index.php/order_check/fetch_data_table_delivery_gate?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date+'&cMode='+$scope.cMode+'&viewstatus='+viewstatus+'&filter='+order_base_data+'&filter_parcel='+delivery_p)
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
    if(event.keyCode==13)
    {
                                 var inputvalue=$('#ad_'+order_id).val();


                                  $http({
                                  method:"POST",
                                  url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                                  data:{'advance':inputvalue,'id':order_id,'action':'Advance_remarks','tablenamemain':'orders_process','tablename_sub':'order_product_list_process'}
                                    }).success(function(data){
                                
                                      
                                         
                                   });
              }

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
         
         return false;
         
        $scope.tablename='orders_process';
        var order_base = $('#order_base').val();
          
    
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      
        
        $http.get('<?php echo base_url() ?>index.php/order_check/fetch_data_table_delivery_gate?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date+'&cMode='+$scope.cMode)
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
                     
                     
                    
                      alert('Date Confirmed..');
                      getData();
                      
                      
                      
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


  $scope.getcount = function (tabelename) {


$http({
     method:"POST",
     url:"<?php echo base_url() ?>index.php/order_check/gatelogin_count?tablename="+tabelename,
     data:{'pincode':$scope.pincode}
   }).success(function(data){

                                                       $scope.w_update_pending = data.w_update_pending;
                                                       $scope.w_update =  data.w_update;
                                                       $scope.w_update_approved =  data.w_update_approved;
                                                       $scope.w_update_rejected =  data.w_update_rejected;
          
                                               
  
   });




   $('.checkall').change(function() {
      
         
      getData();


});


$scope.withoutKG = function(viewstatus) {
  
$('#getviewstatus').val(viewstatus);


if(viewstatus==0)
{
  $('#withoutkg').show()
  $('#withkg').hide()
}
if(viewstatus==1)
{
  $('#withoutkg').hide()
  $('#withkg').show()
}
getData();

};


}


});

</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>


