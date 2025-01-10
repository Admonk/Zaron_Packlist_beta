<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 


 ?>
<style>

.loading {
    text-align: center;
}
.main-content {
    background: #fff;
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
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Product List</h4>

                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/products/productscreate">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Product List</li>
                  </ol>
                </div>

              </div>
            </div>
          </div>
                   
                   
                         <div class="row">
                            <div class="col-12">
                                          <div class="row d-none">
                                       <div class="col-m-12 ">
                                          <div class="card">

 <div class="card-header">
                  <h4 class="card-title">Product List Table</h4>

                </div>




                                             <div class="card-header align-items-start  p-3">
                                                <div class="flex-shrink-md-0">
                                                   <div class="col-lg-12">


                  <button type="button" style="float: right;margin: 7px 20px;" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center2">Import Stock</button>

                  <button type="button" style="float: right;margin: 7px 20px;" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Import Products</button>

                </div>



                <div class="modal fade bs-example-modal-center2" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Import Stock</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form enctype='multipart/form-data' action="<?php echo base_url(); ?>product_import_stock.php" method="POST">
                        <div class="modal-body">

                          <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">File:</label>
                            <input type="file" class="form-control" required name="file" id="recipient-name">
                          </div>
                          <div class="mb-1">
                            <label for="message-text" class="col-form-label">Export : </label>
                            <a href="<?php echo base_url(); ?>export_product_stock.php">Download</a>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="sumnit" class="btn btn-primary">Import</button>
                        </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->





                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Import Products</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form enctype='multipart/form-data' action="<?php echo base_url(); ?>product_import.php" method="POST">
                        <div class="modal-body">

                          <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">File:</label>
                            <input type="file" class="form-control" required name="file" id="recipient-name">
                          </div>
                          <div class="mb-1">
                            <label for="message-text" class="col-form-label">Export : </label>
                            <a href="<?php echo base_url(); ?>export_product.php">Download</a>
                          </div>

                          <small style="color:red">If create new product mention the <b>PRODUCT ID 0</b></small>
                          <br>
                          <small style="color:red">If create new category mention the <b>CATEGORY ID 0</b></small>

                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="sumnit" class="btn btn-primary">Import</button>
                        </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->



                                                </div>
                                             </div>
                                             <!-- end card header -->
                                             <!-- end card-body -->
                                          </div>
                                       </div>
                                    </div>
                                          <div class="row mt-2 pt-2" style="background: transparent;">
                                              
                                              <div class="col-12">
                                                  <div class="card shadow-none" style="background: transparent;">
                                                      <div class="card-body p-0">
                                                          
                                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link s_1 active"  type="button" ng-click="pageTab('product_list',1)" aria-controls="pills-home" aria-selected="true">Products List</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link s_2" id="pills-profile-tab"  type="button" role="tab" ng-click="pageTab('product_list',-1)" aria-controls="pills-profile" aria-selected="false">Archived Products</button>
                      </li>

                    </ul>  
                                                          
                                                          
                                                          <!--datatable="ng" dt-options="vm.dtOptions"-->
                                                            <input type="hidden" id="nextnumber" value="0">   
                                                            <input type="hidden" id="prenumber" value="10">  
                                                            <input type="hidden" id="pageSize" value="10">  
                                                            <input type="hidden" id="order_base" value="1">
                                                          
                                                          
                                                          
                                                                  <div class="row" style="margin-bottom: 10px;">                                    
                            <div class="col-sm-8">
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
                           
                          
                           <div class="col-sm-2">
                           <label>Categories:</label>

                           <select name="example_length" aria-controls="example" class="form-control input-sm" ng-model="search_cat" ng-change="DateFilter()"  id="search_cat">
                                     <option value="">ALL</option> 
                           <?php
                           
                           foreach ($categories as  $value) {
                            ?>
 <option value="<?php echo $value->id; ?>"><?php echo $value->categories; ?></option>

                            <?php
                           }

                           ?>

                                </select>


                       
                           </div>
                           
                          <div class="col-sm-2">
                        <div id="example_filter" class="dataTables_filter">
                            <label>Search:</label><input type="search" class="form-control input-sm" placeholder="search" aria-controls="example" ng-model="searchText" ng-change="searchTextChanged()" id="search">
                        </div> 
                    </div>
                       </div>

                                                          <div class="table-responsive" >


                        
                                                              
                                                              
                                                              <table class="table align-middle table-nowrap newBorderedTable" >
                                                                  <thead >
                                                                      <tr>
                                                                           <th>ID</th>
                              <th>Categories</th>
                              <th style="width:150px;">Product Name</th>
                              <th>Fact</th>
                              <th>Price</th>
                              <!--<th>UOM</th>-->
                              <!--<th>Brand</th>-->
                              <th>GST</th>
                              <th>Actual_Stock</th>
                              <th>Stock_Hold</th>
                              <th>Stock_Production</th>
                              <th>MOS</th>
                              <th>Created_by</th>
                              <th>Edited_by</th>
                              <!--<th>Status</th>-->
                              <th>Attachment</th>
                              <th>Action</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      <tr><td colspan="10"><loading></loading></td></tr>
                                                                      <tr  ng-repeat="name in namesData" >


                                                                         <td>{{(currentPage - 1) * 10 + $index + 1}}</td>

                              <td>{{name.categories}}</td>
                              <td>{{name.product_name}}</td>
                              <th>{{name.formula}}</th>
                              <td>{{name.price}}</td>
                              <!--<td>{{name.uom}}</td>-->





                              <!--<td>{{name.brand}}</td>-->
                              <td>{{name.gst}} %</td>
                              <td>{{name.stock}}</td>

                              <td>{{name.optimal_stock}}</td>
                              <td>{{name.production_stock}}</td>
                              <td>{{name.min_order_stock}}</td>
                              <td>{{name.create_by}}</td>
                              <td>{{name.update_by}}</td>
                              <td>{{name.attachment}}</td>

                              <!-- <td>{{name.input_label}}</td><td>{{name.status}}</td>-->


                              <td style="display: contents;">
                                <a href="<?php echo base_url(); ?>index.php/products/product_edit/{{name.id}}" target="_blank" class="btn btn-outline-primary"><i class="mdi mdi-pencil menu-icon"></i></a>






                                <?php
                                // Shop Team
                                $usergroup = array(1, 2);
                                if (in_array($this->session->userdata['logged_in']['access'], $usergroup)) {

                                ?>

                                 <!--  <div data-id="{{  name.id  }}" ng-click="setStatus(name.id, $event)" title=" {{name.status == 'Archived' ? 'Retrive' : 'Archive'  }}" data-status=" {{name.status == 'Archived' ? -1 : 1 }}" class="archive_button btn {{name.status == 'Archived' ? 'btn-outline-success' : 'btn-outline-danger' }} "><i class="mdi {{name.status == 'Archived' ? 'mdi-inbox-arrow-up' : 'mdi-inbox-arrow-down' }} menu-icon"></i></div> -->
                                  <!-- <button type="button" 
                              ng-click="deleteData(name.id)"
                               class="btn btn-outline-danger"><i class="mdi {{name.status == 'Archived' ? 'mdi-inbox-arrow-up' : 'mdi-inbox-arrow-down' }} menu-icon"></i></button> -->


                                <?php
                                }
                                ?>


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



  $scope.from_date = new Date();
  $scope.to_date = new Date();


  


    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    
    $scope.tablename='product_list';
    getData();



   function getData() {
       $scope.loading = true;
      var search = $('#search').val();
      var search_cat = $('#search_cat').val();
      var order_base = $('#order_base').val();
      
      
       $http.get('<?php echo base_url() ?>index.php/products/fetch_data_report_product?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + search + '&tablename=' + $scope.tablename+'&search_cat='+search_cat+'&order_base='+order_base)
        .success(function(data) {
            $scope.namesData = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = ($scope.currentPage - 1) * $scope.pageSize + 1;
            $scope.endItem = $scope.currentPage * $scope.pageSize;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
            //   console.log(temp.order_no)
            //   var order_split=temp.order_no.split('/');
            //  order_split[0]=order_split[0]+'/E/O'
            //   temp.order_no=order_split.toString().replace(/,/g,'/')
            //   console.log(temp)
                $scope.namesData.push(temp);
                
                
            });

            $scope.loading = false;
        });
        
       
    }

 
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
         
         
         
        $scope.tablename='product_list';
      
$scope.loading = true;

 var search = $('#search').val();
      var search_cat = $('#search_cat').val();
      var order_base = $('#order_base').val();
      
      
       $http.get('<?php echo base_url() ?>index.php/products/fetch_data_report_product?page=' + currentPage + '&size=' + pageSize + '&search=' + search + '&tablename=' + $scope.tablename+'&search_cat='+search_cat+'&order_base='+order_base)
        .success(function(data) {


            $scope.namesData = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = currentPage-pageSize+1;
            $scope.endItem = currentPage;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
                $scope.namesData.push(temp);
                
                
            });
            $scope.loading = false;
        });
        
        
        
        
        
        
    }


$scope.pageTab = function(tabelename,status){
    
    $('.nav-link').removeClass('active');
    if(status==1)
    {
      $('.s_1').addClass('active');
    }
    else{
      $('.s_2').addClass('active');
    }
    
      $('#order_base').val(status);
      $scope.currentPage = 1;
      getData();
      

    
};
 

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
    
 

 
 
 
 
 
 






 
 



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'orders'}
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
        data:{'id':id, 'action':'Cancel','tablenamemain':'orders'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
         getData();
      }); 
    }
};

$scope.DateFilter = function(){
    
    getData();
    
};




$scope.getcount = function (tabelename) {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/getcount?tablename="+tabelename,
      data:{'pincode':$scope.pincode}
    }).success(function(data){


      $scope.totalenquiry=data.pending+data.proceed+data.cancel+data.archive+data.reassign+data.remainder+data.request;

            $scope.pending = data.pending;
            $scope.cancel =  data.cancel;
            $scope.missed =  data.reassign;
             $scope.archive =  data.archive;
            $scope.cancel =  data.cancel;
            $scope.proceed =  data.proceed;
            $scope.request =  data.request;
            $scope.purchase_team =   data.purchase_team;
            $scope.md_team =   data.md_team;
              $scope.requestp =  data.requestp;
$scope.remainder =  data.remainder;
    });



}




});



</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>



