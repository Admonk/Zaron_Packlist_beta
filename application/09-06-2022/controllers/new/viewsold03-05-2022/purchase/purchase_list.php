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
                                    <h4 class="mb-sm-0 font-size-18">Purchase List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/products/productscreate">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Purchase List</li>
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
                                        <h4 class="card-title">Purchase List Table</h4>
                                        
                    </div>
                    
                      <div class="col-lg-12">
                         <button type="button" style="float: right;margin: 7px 20px;" class="btn btn-primary  waves-effect" data-bs-toggle="modal"  data-bs-target=".bs-example-modal-lg">Add Purchase</button>
                       </div>                           

                  <div class="card-body" >
                      

                    <div  ng-init="fetchDatapurchase()">
                
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>


                          <th>ID</th>
                          <th>Po Number</th>
                          <th>Vendor Name</th>
                          <th>Product Name</th>
                          <th>COIL NO</th>
                          <th>QTY  (KG)</th>
                          <th>Price</th>
                          <th>Total Amount</th>
                          <th>Order Date</th>
                         
                          <th>Action</th>
                         
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in purchaseData">
                          
                          
                          <td>{{name.no}}</td>
                         
                          <td>{{name.po_number}}</td>
                          <td>{{name.vendor_name}}</td>
                          <td>{{name.product_name}}</td>
                          <th>{{name.coil_no}}</th>
                          <th>{{name.qty}}</th>
                          <td>{{name.price}}</td>
                          <td>{{name.total_amount}}</td>
                          <td>{{name.order_date}}</td>
                         
                         <td><a href="javascript:void(0)" ng-click="fetchSingleData(name.id)" class="btn btn-outline-primary"><i class="mdi mdi-pencil menu-icon"></i></a>
                           <button type="button" ng-click="deleteData(name.id)" class="btn btn-outline-danger"><i class="mdi mdi-delete menu-icon"></i></button></td>
                          
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

            



 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Add Purchase Product</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               
                                                               
                                                                <form id="pristine-valid-example" novalidate method="post"></form>
                                                                
                                                                 <form id="pristine-valid-common" ng-submit="submitForm()" method="post" enctype="multipart/form-data">
                    
                    
                    
                    
                    
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



                       <div class="row">
                           
                           
                            <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Product Name <span style="color:red;">*</span></label>
                            <div class="col-sm-12" ng-init="fetchData()">
                               <select class="form-control product_id" required name="product_id"  ng-model="product_id">

                              <option value=""> Select Product</option>
                              
                              
                              
                                <option ng-repeat="name in namesData" value="{{name.id}}">{{name.product_name}}</option>

                            

                              </select>
                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Vendor Name <span style="color:red;">*</span></label>
                            <div class="col-sm-12" ng-init="fetchDatavendor()">
                               <select class="form-control vendor_id" required name="vendor_id"  ng-model="vendor_id">

                               <option value=""> Select Vendor</option>
                              
                              
                              
                                <option ng-repeat="namevendor in vendorData" value="{{namevendor.id}}">{{namevendor.name}}</option>

                            

                              </select>
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">PO Number <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="po_no" class="form-control" required name="po_no" ng-model="po_no" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Purchase Price <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="price" class="form-control" name="price"   required ng-model="price" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">QTY (KG): <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="qty" class="form-control" name="qty" required  ng-model="qty" type="text">
                            </div>
                          </div>
                        </div>
                      


                    
                           
                           
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Total Amount <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="total_amount" class="form-control" name="total_amount" required  ng-model="total_amount" type="text">
                            </div>
                          </div>
                        </div>
   
                           
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">COIL NO <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="coil_no" class="form-control" name="coil_no" required  ng-model="coil_no" type="text">
                            </div>
                          </div>
                        </div>


                        
                     
                        
                        
                        

                        
                          
                        
                        
                        
                        
              
                        
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Order Date</label>
                            <div class="col-sm-12">
                              <input id="order_date" class="form-control" name="order_date"  ng-model="order_date" type="date" >
                            </div>
                          </div>
                        </div>
                        
                        
                       
                               
                        
                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                              <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="{{submit_button}}">
                            </div>
                        </div>



                      </div>



                       






                      


                    </form>


                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->



        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </div>




<script>









$(document).ready(function(){
  
  $("#price").on('input',function(){
   var price=  parseInt($(this).val());
    var qty=  parseInt($("#qty").val());
     $('#total_amount').val(qty*price);
    
  });
   $("#qty").on('input',function(){
     var qty= parseInt($(this).val());
     var price=  parseInt($('#price').val());
     
     $('#total_amount').val(qty*price);
  });
  
});


var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;
  $scope.po_no = '<?php echo $po_number; ?>';

 $scope.submit_button = 'Save';
 


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/products/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };




  $scope.fetchDatavendor = function(){
    $http.get('<?php echo base_url() ?>index.php/vendor/fetch_data').success(function(data){
      $scope.vendorData = data;
    });
  };

 
 
  $scope.fetchDatapurchase= function(){
    $http.get('<?php echo base_url() ?>index.php/purchase/fetch_data').success(function(data){
      $scope.purchaseData = data;
    });
  };



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/purchase/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'purchase_order'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        $scope.fetchDatapurchase();
      }); 
    }
};







$scope.fetchSingleData = function(id){
    
    
     $('#modelid').modal('show');
    
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'purchase_order'}
    }).success(function(data){
        
           
            $scope.product_id = data.product_id;
            $scope.price =  data.price;
            $scope.vendor_id = data.vendor_id;
            $scope.po_no = data.po_number;
            $scope.order_date = new Date(data.order_date);
            $scope.coil_no = data.coil_no;
            $scope.total_amount = data.total_amount;
            
            $scope.qty = data.qty;
            $scope.hidden_id = id;
            $scope.submit_button = 'Update';
     
    });
};











  $scope.submitForm = function(){
      
      
      
      
      
      
      

      
      
      
      
    var total_amount=  $('#total_amount').val();
  
      
      
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/insertandupdate",
      data:{'total_amount':total_amount,'product_id':$scope.product_id,'vendor_id':$scope.vendor_id,'coil_no':$scope.coil_no,'po_number':$scope.po_no,'qty':$scope.qty,'price':$scope.price,'order_date':$scope.order_date,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'purchase_order'}
    }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

              $scope.success = false;
              $scope.error = true;
              $scope.hidden_id = "";
             
              $scope.errorMessage = data.massage;

          }
          else
          {
              
              
              
           
              
            $scope.success = true;
            $scope.error = false;
            $scope.product_id = "";
            $scope.price = "";
            $scope.vendor_id = "";
            $scope.po_no = "";
             $scope.total_amount="";
            $scope.coil_no = "";
            $scope.order_date = "";
            $scope.qty = "";
            $scope.fetchDatapurchase();
           
            $scope.successMessage = data.massage;
            
           
            

          }

          

      }

       
    });
  };






});

</script>
    <?php include ('footer.php'); ?>
</body>


