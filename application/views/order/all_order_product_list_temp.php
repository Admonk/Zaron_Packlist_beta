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
@media print 
{
    .hideprint {
        display:none;
    }



}
#splitTable th {
  width: 200px;
  padding: 10px;
}

#splitTable td {
  width: 200px;
  padding: 10px;
  font-weight: bold;
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
                                       <div class="col-md-12 hideprint">
                                          <div class="card mb-1">
                                             <div class="card-header align-items-start d-flex p-3">
                                                <div class="flex-shrink-0">
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" >
                                                     
                                                    
                                                         
                                                       <li class="nav-item ">
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',1)">
                                                        
                                                         <span class="d-sm-block">Order Detailed View</span> 
                                                         </a>  
                                                         
                                                      </li> 
                                                      
                                         
                                                   </ul>
                               


                                                </div>

                                             <!-- end card header -->
                                             <!-- end card-body -->
                                          </div>
                                       </div>
                                    </div>
                                          
                                              <div class="col-12">
                                                  <div class="card shadow-none">
                                                      <div class="card-body">
                                                          
                                                          
                                                          
                                                          <!--datatable="ng" dt-options="vm.dtOptions"-->
                                                            <input type="hidden" id="nextnumber" value="0">   
                                                            <input type="hidden" id="prenumber" value="10">  
                                                            <input type="hidden" id="pageSize" value="10">  
                                                            <input type="hidden" id="order_base" value="1">
                                                          
                                 
                                                         
                          <div class="row hideprint" style="margin-bottom: 10px;">                                    
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
                                 <input type="button" onclick="window.print()" value="Print" class="btn btn-info">
                                 <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata">Export</button>
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
                      



                      <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button style="height: 33px;width:100%" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <div style="width:20%">Total : &nbsp;&nbsp;<b>{{ totalValue | indianCurrency}}</b></div>        
        <!-- <div style="width:20%">  TCS : &nbsp;&nbsp;<b>{{   tcsamounts | indianCurrency}}</b></div> -->
        <div style="width:20%">Daily Sales Report : &nbsp;&nbsp;<b>{{ dailySales | indianCurrency}}</b></div>

      </button>
    </h2>
   <!-- <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <table id="splitTable">
         <thead>
           <tr>
            <th>Commission Orders</th>
            <th>Commissions</th>
            <th><b>Total Value</b></th>

           </tr>
         </thead>
         <tbody>
          <tr>
            <td>{{comm_orders  }}</td>
            <td>{{comm_value | number }}</td>
            <td><b>{{grand_total | number }}</b></td>
          </tr>
          
         </tbody>
        </table>

      </div>
    </div>
  </div> -->




                                                <div class="table-responsive" >               
                                                              <table class="table align-middle table-nowrap newBorderedTable" >
                                                                  <thead>
                                                                      <tr>
                                                                         <th><input class="form-check-input " type="checkbox" id="checkall" ng-click="allCheck()" style="width: 16px;height: 16px;"> </th>
                                                                          <th>Order No</th>
                                                                          <th>Customer</th>
                                                                          <th>Category</th>
                                                                          <th>Product Name</th>
                                                                          <th>UOM</th>
                                                                          <th>Profile</th>
                                                                          <th>Crimp</th>
                                                                          <th>Nos</th>
                                                                          <th>Rate</th>
                                                                          <th>QTY</th>
                                                                          <th>Amount</th>
                                                                         
                                                                         
                                                                          <!-- <th>Tile Material</th> -->
                                                                          <th>Status</th>
                                                                          <th>Order By</th>
                                                                          <th>Delivery Date</th>
                                                                          <th>Create Date</th>
                                                                          <th>Action</th>
                                                                          
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData" >
                                                                          <td>
                                                                              <div class="form-check font-size-16">
                                                                                  <input class="form-check-input customerlistcheck" name="customerlistcheck" value="{{name.id}}" type="checkbox" id="customerlistcheck01">
                                                                                 
                                                                              </div>
                                                                          </td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}">{{name.order_no}}</a></td>
                                                                           <td>{{name.company_name}}</td>
                                                                          <td>{{name.categories_name}}</td>
                                                                      <td>{{name.product_name}}{{name.tile_material_name ? (' - (' + name.tile_material_name + ')') : ''}}{{name.sub_name ? (' - (' + name.sub_name + ')') : ''}}</td>

                                                                          <td>{{name.uom}}</td>
                                                                          <td>{{name.profile}}</td>
                                                                          <td>{{name.crimp}}</td>
                                                                          <td>{{name.nos}}</td>

                                                                          <td>{{name.rate}}</td>
                                                                          
                                                                       
                                                                          <td>{{name.qty}}</td>
                                                                          <td>{{name.amount | indianCurrency }}</td>
                                                                          <!-- <td>{{name.tile_material_name}}</td> -->
                                                                          <td style="font-size: 10px;"> {{name.reason}} </td>
                                                                          <td>{{name.order_by}}</td>
                                                                          
                                                                       
                                                                          
                                                                          <td>
                                                                              
                                                                              <span ng-if="name.create_date=='01-01-1970'">NA</span>
                                                                              <span ng-if="name.create_date!='01-01-1970'">{{name.create_date}}</span>
                                                                              
                                                                              
                                                                              </td>
                                                                          <td>{{name.create_date_new}} {{name.create_time}}  </td>
                                                                          <td>
                                                                                <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}" ><i class="mdi mdi-eye font-size-16 text-success me-1"></i> View</a>
                                                                          </td>
                                                                         
                                                                      </tr>
                                                                      
                                                                      
                                                                      <tr ng-show="namesData.length==0"><td style="text-align: center;" colspan="11">No Data Found..</td></tr>
                                                                     
                                                                  </tbody>
                                                              </table>
                                                              
                                                                 
                       
                        
                                                              
                                                          </div>
                                                          
                                                           
                                                           
                                                           <div class="row hideprint" style="margin-top: 10px;">
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
   
   
   
 <script>


    $('#exportdata').on('click', function()
    {
  
     
          
    
    var fromdate= $('#from_date').val();
    var fromto= $('#to_date').val();
   
  
    url = '<?php echo base_url() ?>index.php/order/all_order_product_list_get_export?from_date='+fromdate+'&to_date='+fromto;

 
    location = url;

   });

 </script>  
   
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
    
    $scope.tablename='orders_process';
    getData();



   function getData() {
       
       
       
      var order_base = $('#order_base').val();
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      
    
      
     $http.get('<?php echo base_url() ?>index.php/order/all_order_product_list_get?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date)
        .success(function(data) {
            $scope.namesData = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = ($scope.currentPage - 1) * $scope.pageSize + 1;
            $scope.endItem = $scope.currentPage * $scope.pageSize;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
                $scope.namesData.push(temp);
                
                
            });
            $scope.totalValue = data.totalValue;
            $scope.dailySales = data.dailySales;
            $scope.tcsamounts = data.tcsamounts;


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
      
        
        $http.get('<?php echo base_url() ?>index.php/order/all_order_product_list_get?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date)
        .success(function(data) {
            $scope.namesData = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = currentPage-pageSize+1;
            $scope.endItem = currentPage;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
                $scope.namesData.push(temp);
                
                
            });

            $scope.totalValue = data.totalValue;
            $scope.dailySales = data.dailySales;
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
      
             $('input[name="customerlistcheck"]:checked').each(function(){
               
                    product_order_id.push($(this).val()); 
                
              });
            
                var checkinsert= product_order_id.join("|");
             
             
                $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order/delivery_date_coniform",
                  data:{'order_id':checkinsert,'delivery_date':0}
                }).success(function(data){
                   
                   
                  
                    alert('Date Confirmed..');
                    getData();
                    
                    
                    
                });
    
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


