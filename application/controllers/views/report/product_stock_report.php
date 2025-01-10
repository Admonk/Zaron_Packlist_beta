<?php  include "header.php"; ?>
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>
















 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Product Stock Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/products/productscreate">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Product Stock Report</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">
                                        <h4 class="card-title">Product Stock</h4>
                                        
                    </div>
                    
                    
                    
<div class="col-lg-12" style="display:none;">
    
    
      <button type="button" style="float: right;margin: 7px 20px;"  class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center2">Import Stock</button>
      <a href="<?php echo base_url(); ?>export_product_stock.php" style="float: right;margin: 7px 20px;"  class="btn btn-success waves-effect waves-light" >Export Stock</a>
      
              
</div>  













<div class="modal fade bs-example-modal-center2" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Import Stock</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                         <form enctype='multipart/form-data' action="<?php echo base_url(); ?>product_import_stock.php" method="POST" >
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










<div class="modal fade bs-example-modal-center" id="editdata" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Stock</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                 
                                                         <form  ng-submit="submitForm()" method="POST" >
                                                        <div class="modal-body">
                                                                  <h4 id="product_name"></h4>
                                                                <div class="mb-3">
                                                                    <label for="actual_stock" class="col-form-label">Actual Stock:</label>
                                                                    <input type="text" class="form-control" required name="actual_stock" id="actual_stock">
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <label for="stock_on_hold" class="col-form-label">Stock On Hold:</label>
                                                                    <input type="text" class="form-control" required name="stock_on_hold" id="stock_on_hold">
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <label for="stock_production" class="col-form-label">Stock Poduction:</label>
                                                                    <input type="text" class="form-control" required name="stock_production" id="stock_production">
                                                                </div>
                                                              
                                                            <input type="hidden" class="form-control"  name="hidden_id" id="hidden_id">
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="sumnit" class="btn btn-primary">Save</button>
                                                        </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->







                    
                    
                  <div class="card-body" >

                       


                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered dt-responsive  " datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>


                          <th>ID</th>
                          <th >Category</th>
                          <th style="width:450px;">Product Name</th>
                          <th>Actual Stock</th>
                          <th>Stock Hold</th>
                          <th>Stock Production</th>
                          
                         <th>Weight</th>
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          
                          
                          <td>{{name.no}}</td>
                           <td>{{name.categories}}</td>
                          <td>{{name.product_name}}</td>
                          <td>
                              
                            <input class="form-control" type="textt" value="{{name.stock}}" style="width: 150px;" ng-blur="changeopening_balance('stock',name.id)" id="stock_{{name.id}}">
                                   
                             
                              
                              </td>
                          <td>
                               <input class="form-control" type="textt" value="{{name.optimal_stock}}" style="width: 150px;" ng-blur="changeopening_balance('optimal_stock',name.id)" id="optimal_stock_{{name.id}}">
                           
                              
                             </td>
                          <td>
                              
                               <input class="form-control" type="textt" value="{{name.production_stock}}" style="width: 150px;" ng-blur="changeopening_balance('production_stock',name.id)" id="production_stock_{{name.id}}">
                            
                              
                          
                          
                          </td>
                          <td>
                              
                               <input class="form-control" type="textt" value="{{name.weight}}" style="width: 150px;" ng-blur="changeopening_balance('weight',name.id)" id="weight_{{name.id}}">
                            
                              
                          
                          
                          </td>
                          
                        
                        
                        </tr>
                        
                      
                      </tbody>
                    </table>
                 
                  </div>




                  </div>
                </div>
              </div>
            </div>

                        
                    </div>
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->

            







        </div>
    </div>




<script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



 


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/products/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };

  $scope.viewEdit = function(id){
   
   
   
   
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/products/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'product_list'}
    }).success(function(data){

        
        
        $('#product_name').html(data.product_name);
       
        $('#actual_stock').val(data.stock);
        $('#hidden_id').val(data.id);
        $('#stock_on_hold').val(data.optimal_stock);
        $('#stock_production').val(data.production_stock);
        
        
       
     
    });
   
   
   
   
   
   
   
   
   
   
   
   
  };
 
 
 
 $scope.submitForm = function(){
     
      var actual_stock=  $('#actual_stock').val();
       var hidden_id=  $('#hidden_id').val();
       var stock_on_hold=  $('#stock_on_hold').val();
       var stock_production=  $('#stock_production').val();
        
     
     
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/products/insertandupdate",
       data:{'actual_stock':actual_stock,'stock_on_hold':stock_on_hold,'stock_production':stock_production,'id':hidden_id,'action':'updatestock','tablename':'product_list'}
    }).success(function(data){
       
       
      if(data.error != '1')
      {
       
         $('#editdata').modal('toggle');
         alert('Updated');
         
          $scope.fetchData();
        
      }



    });
  };




$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/products/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'product_list'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        $scope.fetchData();
      }); 
    }
};


 
 $scope.changeopening_balance = function(name,id){
     
     
     
   
     var actual_stock=$('#stock_'+id).val();
     var stock_on_hold=$('#optimal_stock_'+id).val();
     var stock_production=$('#production_stock_'+id).val();
      var weight=$('#weight_'+id).val();
     
    
     
     $http({
        method:"POST",
       url:"<?php echo base_url() ?>index.php/products/insertandupdate",
       data:{'actual_stock':actual_stock,'stock_on_hold':stock_on_hold,'weight':weight,'stock_production':stock_production,'id':id,'action':'updatestock','tablename':'product_list'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };



});

</script>
    <?php include ('footer.php'); ?>
</body>


