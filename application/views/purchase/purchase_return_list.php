<?php  include "header.php"; ?>
<style>
table#datatable {
    font-size: 11px;
}
</style>
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
                                    <h4 class="mb-sm-0 font-size-18">Purchase Inward List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/products/productscreate">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Purchase Inward List</li>
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
                                        <h4 class="card-title">Purchase Inward List</h4>
                                        
                    </div>
                    
                                               

                  <div class="card-body" >
                      

                    <div  ng-init="fetchDatapurchase()">
                
                   <table id="datatable" class="table table-bordered dt-responsive" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>


                          <th>ID</th>
                          <th>Invoice NO</th>
                          <th>Po NO</th>
                          <th>Vendor Name</th>
                          <th style="width:170px;">Product Name</th>
                         
                          <!--<th>QTY  (KG)</th>-->
                          <th>Inward QTY </th>
                          <th>Price</th>
                          <th>Total Amount</th>
                          <th>Inward Date</th>
                          <th>Rack</th>
                          <th>Bin</th>
                        
                          <th style="width:70px;">Action</th>
                         
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in purchaseData">
                          
                          
                          <td>{{name.no}}</td>
                         
                          <td>{{name.invoice_no}}</td>
                          <td>{{name.po_number}}</td>
                          <td>{{name.vendor_name}}</td>
                          <td>{{name.product_name}}</td>
                          
                          <th>{{name.qty}}</th>
                          <!--<th>{{name.inward_qty}}</th>-->
                          <td>{{name.price | number}}</td>
                          <td>{{name.total_amount | number}}</td>
                          <td>{{name.inward_date}}</td>
                          <td>{{name.rack_info}}</td>
                          <td>{{name.bin_info}}</td>
                        
                          <td >
                              
                             <button type="button" ng-if="name.return_status==1"   ng-click="viewAddress(name.id)"  title="View" style="padding: 3px 3px;font-size:8px;"  class="btn btn-outline-primary"><i class="mdi mdi-eye menu-icon"></i> DC </button> 
                             <a href="javascript:void(0)" ng-click="fetchSingleData(name.id)"  style="padding: 3px 3px;font-size:8px;" class="btn btn-outline-primary" title="Click to enter the details of the purchase return" ng-if="name.return_status==0"> <i class="fa fa-info-circle"   data-placement="top" ></i> Purchase Return</a> 
                              
                              
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

            
                                                                            <?php
                                                                           
                                                                                foreach($racksetup as $set)
                                                                                {
                                                                                   $rack= $set->rack;
                                                                                   $bin_col= $set->bin_col;
                                                                                   $bin_row= $set->bin_row;
                                                                                   $val= $bin_col*$bin_row;
                                                                                   $alpha=explode(',',$rack);
                                                                                }
                                                                                
                                                                            ?>


 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Purchase Return</h5>
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
                               <select class="form-control product_id" required name="product_id" readonly ng-model="product_id">

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
                               <select class="form-control vendor_id" required name="vendor_id" readonly  ng-model="vendor_id">

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
                              <input id="po_no" class="form-control" required name="po_no" readonly ng-model="po_no" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Purchase Price <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="price" class="form-control" name="price" readonly  required ng-model="price" type="text">
                            </div>
                          </div>
                        </div>
                        
                          <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">QTY : <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="qty" class="form-control" name="qty"   ng-model="qty" type="text">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Amount <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="total_amount" class="form-control"  name="total_amount"   required ng-model="total_amount" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        
                      
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Return  Date <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="return_date" class="form-control"  name="return_date"   required ng-model="return_date" type="date">
                            </div>
                          </div>
                        </div>

                        
                       <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Remarks <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                                <textarea rows="4"  id="remarks" class="form-control"  name="remarks"   required ng-model="remarks"></textarea>
                            
                            </div>
                          </div>
                        </div>

                    
                      
                     
                        
                        

                        
                     
                  
                        
                     
                        
                               
                        
                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                              <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="Return">
                            </div>
                        </div>



                      </div>



                       






                      


                    </form>


                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->



        </div>
    </div>

































  <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Purchase Return Details</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                              
                                                                
                                                                
                                                                <div ng-init="fetchDataaddress()">
                                                                
                                                                <table class="table" ng-repeat="names in namesDataaddress">
                                                                    
                                                                     <tr>
                                                                         <th>{{names.no}}. PO</th>
                                                                         <th>:</th>
                                                                         <td>{{names.po_number}}</td>
                                                                     </tr>
                                                                     <tr>
                                                                         <th>Return QTY</th>
                                                                         <th>:</th>
                                                                         <td>{{names.return_qty}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <th>Return Date </th>
                                                                         <th>:</th>
                                                                         <td>{{names.return_date}} </td>
                                                                     </tr>
                                                                     
                                                                      <tr>
                                                                         <th>Amount  </th>
                                                                         <th>:</th>
                                                                         <td>{{names.total_amount | number }}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                      
                                                                     
                                                                     <tr>
                                                                         <th>Remarks   </th>
                                                                         <th>:</th>
                                                                         <td>{{names.remarks}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                    
                                                                     
                                                                     <tr>
                                                                         <th>DC   </th>
                                                                         <th>:</th>
                                                                         <td><a href="<?php echo base_url(); ?>index.php/purchase/dc?dc_id={{names.id}}" target="_blank" class="btn btn-primary">DC</a></td>
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                               
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                
                                                
                                                
      





















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
app.filter('number', function () {
    return function (input) {
        if (!isNaN(input)) {
            if (input != 0 && input != null) {
                if (isNaN(input)) return input;

                var isNegative = false;
                if (input < 0) {
                    isNegative = true;
                    input = Math.abs(input);
                }

                var formattedValue = parseFloat(input);
                var decimal = formattedValue.toLocaleString('en-IN', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                });

                if (isNegative) {
                    decimal = '-' + decimal;
                }

                return decimal;
            } else {
                return '0';
            }
        }
    };
});
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;
  $scope.po_no = '<?php echo $po_number; ?>';

 $scope.submit_button = 'Save';
 


 




 
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
            $scope.inward_date = new Date(data.inward_date);
            $scope.coil_no = data.coil_no;
            $scope.total_amount = data.total_amount;
            $scope.rack_info = data.rack_info;
            $scope.bin_info = data.bin_info;
            
            $scope.qty = data.qty;
            $scope.hidden_id = id;
            $scope.submit_button = 'Update';
            
            
            $scope.success = false;
            $scope.error = false;
     
    });
};



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


$scope.viewAddress = function(id){
    
    
   $('#exampleModalScrollable').modal('toggle');
    
 
   $scope.fetchDataaddress(id);
  
    
};


   $scope.fetchDataaddress = function(id){
      
     $http.get('<?php echo base_url() ?>index.php/purchase/purchase_fetch_return?id='+id).success(function(dataaddress){
      
      
       $scope.namesDataaddress = dataaddress;
      
       
     });
        
   };




  $scope.submitForm = function(){
      
      
      
        
    var total_amount=  $('#total_amount').val();
  
      

      
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/purchase_return_data",
      data:{'total_amount':total_amount,'return_date':$scope.return_date,'remarks':$scope.remarks,'product_id':$scope.product_id,'vendor_id':$scope.vendor_id,'po_number':$scope.po_no,'qty':$scope.qty,'price':$scope.price,'id':$scope.hidden_id,'action':'Inward','tablename':'purchase_order_return'}
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
            $scope.fetchDatapurchase();
           
            $scope.successMessage = data.massage;
           // $('#modelid').modal('hide');
           
             $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });
            

          }

          

      }

       
    });
   
 

      
      
      
      
      
  
      
      
      
    
  };






});

</script>
    <?php include ('footer.php'); ?>
</body>


