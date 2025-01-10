<?php 
include "table_header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
$status=0;
$text='';
if(isset($_GET['status_ssd']))
{
    $status=1;
    $text='SDP';
}
 ?>
<style type="text/css">
   div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
}
.loading {
    text-align: center;
}
tr {
    line-height: 28px;
}
.gray {
    background: #e3e3e3;
}
@media print {
    .no-print {
        display:none;
    }

    .loading {
    display:none;
}
td {
    font-size: 20px;
        color: black;
}

tbody, td, tfoot, th, thead, tr {
    border: #000000 solid 1px;
}

}

img.imh {
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
                             
                             
                              
      















<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Import Products</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                         <form enctype='multipart/form-data' action="<?php echo base_url(); ?>sale_import.php" method="POST" >
                                                        <div class="modal-body">
                                                           
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">File:</label>
                                                                    <input type="file" class="form-control" required name="file" id="recipient-name">
                                                                </div>
                                                                <div class="mb-1">
                                                                    <label for="message-text" class="col-form-label">Sample : </label>
                                                                    <a href="<?php echo base_url(); ?>sales_import.xlsx">Download</a>
                                                                </div>
                                                                
                                                                <!--<small style="color:red">If create new product mention the  <b>PRODUCT ID 0</b></small>
                                                                <br>
                                                                <small style="color:red">If create new category mention the <b>CATEGORY ID 0</b></small>-->
                                                            
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="sumnit" class="btn btn-primary">Import</button>
                                                        </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->














          
                            <div class="col-12">
                                
                      
                                          <div class="row no-print" >
                                       <div class="col-m-12">
                                          <div class="card mb-1">
                                             <div class="card-header align-items-start d-flex p-3">
                                                <div class="flex-shrink-0">
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('orders_process')">
                                                     
                                                        <li class="nav-item" >
                                                         <a class="nav-link active"  href="#" role="tab">
                                                         <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                         <span class="d-none d-sm-block">Attachement Production Print <?php echo $text; ?></span> 
                                                         </a>
                                              
                                                      
                                                      
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
                                                            <input type="hidden" id="order_base" value="1">
                                                          
                                 
                                                         
                          <div class="row no-print" style="margin-bottom: 10px;">                                    
                           
                          <div class="col-sm-2">
                          <label>From Date: </label><input type="date" class="form-control" id="from_date" ng-model="from_date" >
                          </div>
                          
                           <div class="col-sm-2">
                           <label>To Date:</label><input type="date" class="form-control" id="to_date" ng-model="to_date" >
                           </div>
                           
                         <div class="col-sm-2" >
                            <div id="example_filter" class="dataTables_filter">
                                <label>Order No From:</label><input type="number" class="form-control input-sm" placeholder="Order No From" aria-controls="example"  id="order_no1" >
                            </div>
                        </div>
                        
                        <div class="col-sm-2" >
                            <div id="example_filter" class="dataTables_filter">
                                <label>Order No To:</label><input type="number" class="form-control input-sm" placeholder="Order No To" aria-controls="example"  id="order_no2" >
                            </div>
                        </div>
                           
                              <div class="col-sm-4">
                          <input type="button" class="btn btn-success" value="search" ng-click="DateFilter()" style="margin: 25px 0px;">
                          
                          <button onclick="window.print()" class="btn btn-primary" ng-click="Print()" style="margin: 25px 0px;">Print</button>
                          
                           <a href="<?php echo base_url(); ?>index.php/order/production_print" class="btn btn-default" style="margin: 25px 0px;">All Orders</a>
                           
                           <?php
                           
                           if($status==1)
                           {
                               ?>
                             <a href="<?php echo base_url(); ?>index.php/order/production_print_attachement" class="btn btn-default" style="margin: 25px 0px;">Attachments</a>
                           
                               <?php
                           }
                           else
                           {
                               ?>
                               <a href="<?php echo base_url(); ?>index.php/order/production_print_attachement?status_ssd=1" class="btn btn-default" style="margin: 25px 0px;">SDP Attachments</a>
                           
                               <?php
                           }
                           
                           ?>
                           
                           
                           </div>
                           
                      
                       </div>
                                                <div class="table-responsive" >               
                                                              <table class="table align-middle table-nowrap newBorderedTable" >
                                                                  <thead>
                                                                      <tr>
                                                                                                   <th style="width:2%;">#</th>
                                                                                                      
                                                                                                        <th style="width:45%;">Products</th>
                                                                                                        <th style="width:10%;"><b>Conversion (MM)</b></th>
                                                                                                        
                                                                                                        <th style="width:45%;"><b>Attachment</b></th>                                                                
                                                                          
                                                                      </tr>
                                                                     
                                                                  </thead>
                                                                   <tr><td colspan="4"><loading></loading></td></tr>
                                                                  <tbody ng-repeat="name in namesData">
                                                                      
                                                                      
                                                                      <tr>
                                                                          <td>{{name.no}}</td>
                                                                              <td >
                                                                              <b ><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process?order_id={{name.base_id}}"  target="_blank">{{name.order_no}} | {{name.company_name}}  | {{name.create_date}}</a></b>
                                                                         
                                                                               <b ng-if="name.delivery_date_time" style="color:red;font-size: 11px;">Delivery Date Time: {{name.delivery_date_time}} </b>
                                           
                                           <b ng-if="name.SSD_check==1" style="color:red;">| SDP</b>
                                           <input type="hidden" class="valorder" value="{{name.order_id}}">
                                           
                                           
                                                                          </td>
                                                                          
                                                                          <td ></td>
                                                                              
                                                                                <td ></td>                        
                                                                                                      
                                                                      </tr>
                                                                      
                                                                       <tr>
                                                                          <td></td>
                                                                          <td> <b>Sales Person : {{name.sales_name}}  | {{name.sales_phone}}</b></td>
                                                                          <td></td>
                                                                          <td></td> 
                                                                      </tr>
                                                                      
                                                                      
                                                                      
                                                                       <tr ng-repeat="names in name.subarray" class="{{names.color_style}}">
                                                                          
                                                                          
                                                                          
                                                                      
                                                                                                              
                                                                                                             
                                                                                                         <td ></td>
                                                                                                       
                                                                                                        <td>{{names.no}}. {{names.product_name_tab}} <span style="color: #000;font-weight: 800;">{{names.colors}}</span> | <b> 
                                                                                                        
                                                                                                        <span ng-if="names.profile_tab>0">{{names.profile_tab}} </span>
                                                                                                        <span ng-if="names.crimp_tab>0">+ {{names.crimp_tab}} </span>
                                                                                                        <span ng-if="names.nos_tab>0"> ---->  {{names.nos_tab}} </span>
                                                                                                        
                                                                                                         
                                                                                                        </b> 
                                                                                                         <p ng-if="names.tile_material_name">Tile material  : {{names.tile_material_name}}</p>
                                                                                                       <p ng-if="names.subvalues">{{names.subvalues}}</p>
                                                                                                        
                                                                                                           <span ng-if="names.product_name_sub!=''"><br><b>Accessories Specification : {{names.product_name_sub}} </b></span>
                                                                                                        </td>
                                                                                                        
                                                                                                        <td > 
                                                                                                        
                                                                                                        
                                                                                                          
                                                                                                        MM - <b>{{names.conversion}}  <span ng-if="names.nos_tab>0"> ---->  {{names.nos_tab}} </span> </b>
                                                                                                       
                                                                                                        </td>
                                                                                                        
                                                                                                        
                                                                                                        <td > 
                                                                                                        
                                                                                                       
                                                                                                        
                                                                                                        <span ng-if="names.reference_image!=''">
                                                                                                            
                                                                                                          
                                                                                                             <br>
                                                                                                            <img src="{{names.reference_image}}" class="imh">
                                                                                                            
                                                                                                            <!--<a href="{{names.reference_image}}" style="color: blue;" target="_blank">Attachment</a>-->
                                                                                                            
                                                                                                            
                                                                                                            </span>
                                                                                                            
                                                                                                             <span ng-if="names.remarks"> <br> Remarks :{{names.remarks}}</span>       
                                                                                                        
                                                                                                        
                                                                                                        </td>
                                                                                                      
                                                                                                       
                                                                                                         
                                                                                                      
                                                                      </tr>
                                                                      
                                                                      
                                                                      <tr ng-show="namesData.length==0"><td style="text-align: center;" colspan="11">No Data Found..</td></tr>
                                                                     
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
            </div>
            <!-- End Page-content -->
         </div>
     
     
     
     
     
     



   </div>
   
   
   
   
   
 <script>

var app = angular.module('crudApp', ['datatables']);

app.directive('loading', function () {
      return {
        restrict: 'E',
        replace:true,
        template: '<div class="loading"><img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" width="20" height="20" /> LOADING...</div>',
        link: function (scope, element, attr) {
              scope.$watch('loading', function (val) {
                  if (val)
                      $(element).show();
                  else
                      $(element).hide();
              });
        }
      }
})

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;




   var date = new Date();

  //$scope.from_date = new Date(date.getFullYear(), date.getMonth(), 1);
  $scope.from_date = new Date();
  $scope.to_date = new Date();



    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    
    $scope.tablename='orders_process';
    getData();



   function getData() 
   {
       
       
        $scope.loading = true;
      var order_base = $('#order_base').val();
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      var search = $('#search').val();
       var order_no1 = $('#order_no1').val();
       var order_no2 = $('#order_no2').val();
      
     $http.get('<?php echo base_url() ?>index.php/order/fetch_data_production_order_by_print_files?order_id=0&cancelid=0&status_ssd=<?php echo $status; ?>&tablenamemain=<?php echo 'orders_process'; ?>&&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert=1&production_id=1&status=0&from_date='+from_date+'&to_date='+to_date+'&order_no1='+order_no1+'&order_no2='+order_no2)
        .success(function(data) {
            $scope.namesData = data;
             $scope.loading = false;
        });
        
       
    }

 
 

   $scope.searchTextChanged = function() {
     
        getData();
    }
    
    




$scope.DateFilter = function(){
    
    getData();
    
};

$scope.Print = function(){
    
    var order_no1=$('#order_no1').val();
    var order_no2=$('#order_no2').val();


     var order_id = [];
      
           $('.valorder').each(function(){
               
                    order_id.push($(this).val()); 
                
            });
    
    

     $http.get('<?php echo base_url() ?>index.php/order_second/production_print_log?order_no1='+order_no1+'&order_no2='+order_no2+'&order_ids='+order_id)
        .success(function(data) {
            
        });
    
    
};



});

</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>


