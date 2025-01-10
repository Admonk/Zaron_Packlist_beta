<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
      div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
}

.trpoint {
    
    cursor: pointer;
   
}
th {
    padding: 10px 5px;
}
.trpoint:hover {
    background: antiquewhite;
}
.card-header {
    display: block;
    text-align: center;
}


::-webkit-scrollbar {
    height: 10px !important;
    width: 10px !important;
    cursor: pointer;
}

div#showdata {
    margin-top: 25px;
    margin-bottom: 20px;
    display: none;
}
.ui-widget.ui-widget-content {
    border: 1px solid #d3d3d3;
    z-index: 999999;
}
.table-bordered {
    border: 1px solid #e9e9ef;
    table-layout: fixed;
}

.table>tbody {
    vertical-align: middle;
}
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>
     
     
     
     
     
     
     
     
     
     
     
     
       <div class="main-content">
            <div class="page-content">
               <div class="container-fluid">
                   
                   <div class="row">
                                    <div class="col-6">
                                         <div class="page-title-box d-sm-flex align-items-center justify-content-between p-0">
                                            <h4 class="mb-sm-0 font-size-18">Sales Complaints List</h4>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        
                                       
                            
                                            
                                        <div class="d-flex justify-content-end gap-2 flex-wrap">
                                            
                                            
                                          
                                            <div class="btn-group">
                                                <a href="javascript:void(0)" ng-click="newComplaintcreate()" class="btn btn-secondary dropdown-toggle"><i class="mdi mdi-plus"></i> Create Complaint</a>
                                                
                                            </div><!-- /btn-group -->
                                           
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                
                         <div class="row">
                            <div class="col-12">
                                          <div class="row">
                                       <div class="col-m-12">
                                          <div class="card mb-1">
                                             <div class="card-header align-items-start d-flex p-3">
                                                <div class="flex-shrink-0">
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('order_sales_complaints')">
                                                     
                                                      <li class="nav-item">
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('order_sales_complaints',0)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">OPEN <span class="badge rounded-pill bg-primary  float-end"> {{pending}} </span></span> 
                                                         </a>
                                                      </li>
                                                      
                                                        <li class="nav-item">
                                                         <a class="nav-link " data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('order_sales_complaints',1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">FOLLOW UP <span class="badge rounded-pill bg-warning  float-end"> {{proceed}} </span></span> 
                                                         </a>
                                                      </li>
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('order_sales_complaints',2)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">CLOSED<span class="badge rounded-pill bg-success float-end"> {{po}} </span></span>   
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
                                                            <input type="hidden" id="order_base" value="0">
                                                          
                                                          
                                                          
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
                          <div class="col-sm-7"></div>
                         <div class="col-sm-2">
                        <div id="example_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control input-sm" aria-controls="example" ng-model="searchText" ng-change="searchTextChanged()"></label>
                        </div>
                    </div>
                       </div>

                                                          <div class="table-responsive" >
                                                              
                                                              
                                                       
                                                              
                                                              
                                                              <table class="table align-middle table-nowrap newBorderedTable" >
                                                                  <thead>
                                                                      <tr>
                                                                          <th>#</th>
                                                                          <th>ID</th>
                                                                          <th>Order No</th>
                                                                          <th>Invoice Date</th>
                                                                         
                                                                          <th>Customer</th>
                                                                          
                                                                        
                                                                          <th>Net Weight</th>
                                                                          
                                                                          <th>Remarks</th>
                                                                          <th>Create By</th>
                                                                          <th>Create Date</th>
                                                                          <th>Action</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData">
                                                                          <td>
                                                                              <div class="form-check font-size-16">
                                                                                  <input class="form-check-input" type="checkbox" id="customerlistcheck01">
                                                                                  <label class="form-check-label" for="customerlistcheck01"></label>
                                                                              </div>
                                                                          </td>
                                                                          
                                                                          <td>
                                                                              
                                                                             
                                                                              S/CMP/{{name.id}}
                                                                              
                                                                             
                                                                              
                                                                         </td>
                                                                          
                                                                          <td>
                                                                              
                                                                             
                                                                              {{name.order_no}}
                                                                              
                                                                             
                                                                              
                                                                         </td>
                                                                          
                                                                          
                                                                          
                                                                           <td>{{name.invoice_date}} </td>
                                                                            
                                                                          <td>{{name.customer_id}}</td>
                                                                          <td>{{name.qty}}</td>
                                                                          <td> {{name.remarks}}</td>
                                                                          <td>{{name.order_by}}</td>
                                                                          <td>
                                                                          {{name.create_date}} 
                                                                          </td>
                                                                          <td>
                                                                               
                                                                               <a href="#"  ng-click="deleteData(name.id)"><i class="mdi mdi-delete font-size-16 text-danger me-1"></i> Delete</a>
                                                                               <a href="#"  ng-click="viewAddress(name.id)"><i class="mdi mdi-file font-size-16 text-success me-1"></i> Remarks Update</a>
                                                                                
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
   
   
   
   
   
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Create Complaint</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               
                                                               
                                                                <!--<form id="pristine-valid-example" novalidate method="post"></form>-->
                                                                
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
                            <label class="col-sm-12 col-form-label">Search Customer <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="autocomplete" class="form-control" required name="autocomplete" ng-keyup="completeProduct()" ng-blur="getPurchaseorderid()"  placeholder="Search Customer"  type="text">
                            </div>
                          </div>
                        </div>
                      
            
                       
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Sales Invoice No <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                                
                                <select class="form-control"  id="order_no" required name="order_no" ng-change="getProductlist()" ng-model="order_no">
                                    <option value="">Select Invoice No</option>
                                    <option ng-repeat="namesorder in namesDataproductorderno" value="{{namesorder.order_no}}"> {{namesorder.order_no}} </option>
                                </select>
                              
                            
                            
                            </div>
                          </div>
                        </div>
                      
                        
                      
                        
                        
                      
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Create Date <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="return_date" class="form-control"  name="create_date" required ng-model="create_date" type="date">
                            </div>
                          </div>
                        </div>
                        
                         <div  class="col-md-12" id="showdata" ng-show="namesDataproduct.length>0">
                                                              
                                                                <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         <th>#</th>
                                                                        
                                                                         <th>Product Name</th>
                                                                         <td>Net Weight</td>
                                                                         <!--<td>Rate</td>-->
                                                                         <td>Complaint</td>
                                                                        
                                                                     </tr>
                                                                     <tr  ng-repeat="namesp in namesDataproduct">
                                                                     
                                                                         <td><input type="checkbox" class="purchase_order_product_id" name="purchase_order_product_id" value="{{namesp.id}}"></td>
                                                                         
                                                                         <td>{{namesp.product_name}}</td>
                                                                         <td><input type="textt" value="{{namesp.qty}}" class="form-control purchase_qty" name="purchase_qty" ></td>
                                                                         <!--<td>{{namesp.rate}}</td>-->
                                                                         
                                                                          <td><input type="textt" class="form-control purchase_notes" name="purchase_notes" ></td>
                                                                         
                                                                       
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>

                        
                       <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Remarks</label>
                            <div class="col-sm-12">
                                <textarea rows="4"  id="remarks" class="form-control"  name="remarks"    ng-model="remarks"></textarea>
                            
                            </div>
                          </div>
                        </div>

                    
                      
                     
                        
                        

                        
                     
                  
                        
                     
                        
                               
                        
                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                            
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="CREATE">
                            </div>
                        </div>



                      </div>



                       






                      


                    </form>


                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->



        </div>
    </div>








  
    <div class="modal fade" id="exampleModalScrollable_1" tabindex="-1" role="dialog"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Update Remarks & Status</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               
                                                               
                                                              
                                                                
                                                                 <form  ng-submit="submitForm_1()" method="post" enctype="multipart/form-data">
                    
                    
                    
                    
                    
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
                           
                                  <div ng-init="fetchDataproducts()" ng-show="namesDataproducts.length>0">
                                                      <h3>Complaints Products</h3>
                                                                
                                                                <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         <th>No</th>
                                                                         <th>Product Name</th>
                                                                         <td>Net Weight</td>
                                                                         <td>Complaint</td>
                                                                       
                                                                        
                                                                     </tr>
                                                                     <tr  ng-repeat="names in namesDataproducts">
                                                                         <th>{{names.no}}</th>
                                                                         <th>{{names.product_name}}</th>
                                                                         <td>{{names.qty}}</td>
                                                                          <td>{{names.notes}}</td>
                                                                         
                                                                         
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>

                        
            
                         <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Complaint  Status <span style="color:red;">*</span></label>
                            <div class="col-sm-12" >
                               <select class="form-control order_base" required name="order_base"   ng-model="order_base">

                               <option value="1">FOLLOW UP</option>
                               <option value="2">CLOSED</option>
                              
                           

                              </select>
                              
                              
                            </div>
                          </div>
                        </div>
                        
                        
                       
                      

                        
                       <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Remarks <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                                <textarea rows="4"  id="remarks_2" class="form-control"  name="remarks_2"   required ng-model="remarks_2"></textarea>
                            
                            </div>
                          </div>
                        </div>

                    
                      
                     
                        
                        

                        
                     
                  
                        
                     
                        
                               
                        
                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                              <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="UPDATE">
                            </div>
                        </div>



                      </div>



                       



                                                  <div ng-init="fetchDataaddress()" ng-show="namesDataaddress.length>0">
                                                      <h3>Status History</h3>
                                                                
                                                                <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         <th>No</th>
                                                                         <th>Order No</th>
                                                                         <td>Status</td>
                                                                         <td>Remarks</td>
                                                                         <td>Update Date & Time</td>
                                                                     </tr>
                                                                     <tr  ng-repeat="names in namesDataaddress">
                                                                         <th>{{names.no}}</th>
                                                                         <th>{{names.order_no}}</th>
                                                                         <td>{{names.order_base}}</td>
                                                                          <td>{{names.remarks}}</td>
                                                                          <td>{{names.create_date}}  {{names.create_time}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>


                      


                    </form>


                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->



        </div>
    </div>









<script>
$(document).ready(function(){
  $("#exportdatadata").hide();
   
  $('#payment_mode_payoff').on('change',function(){
      
      var val=$(this).val();
      
      
      
      if(val=='NEFT/RTGS' ||  val=='Cheque')
      {
          
         
          $('#base_title').html('Bank Account');
          var data='<option value="0">Select Bank</option> <?php foreach($bankaccount as $val) { if($val->id!=25 && $val->id!=24) { ?> <option value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
           $('#res_no').show();
           $('#bankaccountshow').show();
      }
      if(val=='Cash')
      {
          
          $('#base_title').html('Cash Account');
          var data='<?php foreach($bankaccount as $val) { if($val->id==25) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
          $('#res_no').show();
          $('#bankaccountshow').show();
          
      }
      
      
      
      
  });
   
      
 
      
  $('#choices-single-default').on('change',function(){
      
      
      
      
       $("#exportdatadata").show();
        
      
  });
  
$('#exportdata').on('click', function() {
  
  
    var id= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
  
    url = '<?php echo base_url() ?>index.php/customer/fetch_data_get_ledger_view_export?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status;

 
    location = url;

});


});
</script>
<script>

var app = angular.module('crudApp', ['datatables']);

app.filter('number', function () {        
    return function (input) {
        if (! isNaN(input)) {
            var currencySymbol = 'Rs ';
            //var output = Number(input).toLocaleString('en-IN');   <-- This method is not working fine in all browsers!           
            var result = input.toString().split('.');

            var lastThree = result[0].substring(result[0].length - 3);
            var otherNumbers = result[0].substring(0, result[0].length - 3);
            if (otherNumbers != '')
                lastThree = ',' + lastThree;
            var output = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
            
            if (result.length > 1) {
                output += "." + result[1];
            }            

            return currencySymbol + output;
        }
    }
});

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;
 $scope.getbank=0
    


$scope.create_date=new Date();


    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    
    $scope.tablename='order_sales_complaints';
    getData();



   function getData() {
       
      var order_base = $('#order_base').val();
      
      
     $http.get('<?php echo base_url() ?>index.php/order/fetch_data_complaints_table?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base)
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
    
      if(status==9)
      {
           $('#distext').text('Schedule Date');
      }
      else
      {
          $('#distext').text('Create Date');
      }
     
     
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
         
         
         
        $scope.tablename='order_sales_complaints';
        var order_base = $('#order_base').val();
        
        $http.get('<?php echo base_url() ?>index.php/order/fetch_data_complaints_table?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base)
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



 

 
 
 
 
 
 






 
 



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/purchase/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'order_sales_complaints'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
         getData();
         $scope.getcount('order_sales_complaints');
      }); 
    }
};







$scope.cancelData = function(id){
    if(confirm("Are you sure you want to Cancel it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Cancel','tablenamemain':'order_sales_complaints'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
         getData();
      }); 
    }
};




    



$scope.newComplaintcreate = function(){
  
   $('#exampleModalScrollable').modal('toggle');
   
};

 $scope.fetchDatavendor = function(){
    $http.get('<?php echo base_url() ?>index.php/vendor/fetch_data').success(function(data){
      $scope.vendorData = data;
    });
  };



$scope.getcount = function (tabelename) {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/getcount?tablename="+tabelename,
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.pending = data.pending;
            $scope.cancel =  data.cancel;
            $scope.po =  data.po;
            $scope.proceed =  data.proceed;
            
            
            $scope.payment_vendor =  data.payment_vendor;
            $scope.payment_vendor_f =  data.payment_vendor_f;
            
            $scope.payment_vendor_res =  data.payment_vendor_res;
            
            $scope.archive =   data.$archive;
            
              $scope.dispath =  data.dispath;
            $scope.deliverd =  data.deliverd;
            
             $scope.deliverd =  data.deliverd;
            $scope.inward =  data.inward;

    });



}

                        

     $scope.completeProduct=function(){
       
        
      
        var search=  $('#autocomplete').val();
        
        
        
        $("#autocomplete").autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/order/fetch_product_get_customer",
          data:{'search':search}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    
    }; 
    
    
    
    
    
    
    
    
    
    
     $scope.completePono=function(){
       
        
      
        var search=  $('#order_no').val();
        
        
        
        $("#order_no").autocomplete({
         
          source: $scope.availableTags2
          
          
        });
    
    
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/order/fetch_po_get",
          data:{'search':search}
        }).success(function(data){
    
              $scope.availableTags2= data;
         
        });
    
    
    
    
    
    };
                        
 












$scope.submitForm = function(){
      
            var purchase_order_product_id = [];
      
             $('input[name="purchase_order_product_id"]:checked').each(function(){
               
                    purchase_order_product_id.push($(this).val()); 
                
            });
            
             var checkinsert= purchase_order_product_id.join("|");
      
      
          var validation=$('input[name="purchase_order_product_id"]:checked').val();
                
          if (typeof validation === "undefined") {
                   var validation=0;
          }
        
        
         
             var purchase_notes = [];
      
             $('input[name="purchase_notes"]').each(function(){
                    
                    if($(this).val()!="")
                    {
                        purchase_notes.push($(this).val()); 
                    }
                    
                
            });
            
             var purchase_notes_data= purchase_notes.join("|");
         
       
       
        var purchase_qty = [];
      
             $('input[name="purchase_qty"]').each(function(){
                    
                    if($(this).val()!="")
                    {
                        purchase_qty.push($(this).val()); 
                    }
                    
                
            });
            
             var purchase_qty_data= purchase_qty.join("|");
         

     
    if(validation!=0)
    {
        
    
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/purchase_complaints_data",
      data:{'create_date':$scope.create_date,'remarks':$scope.remarks,'order_no':$scope.order_no,'purchase_order_product_id':checkinsert,'purchase_qty_data':purchase_qty_data,'purchase_notes_data':purchase_notes_data,'action':'Inward','tablename':'order_sales_complaints'}
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
              
              
              
             $scope.remarks="";
             $scope.order_no="";
            
              
            $scope.success = true;
            $scope.error = false;
            //$('#exampleModalScrollable').modal('toggle');
            $scope.successMessage = data.massage;
            getData();
            $scope.getcount('order_sales_complaints');
            $('#showdata').hide();
            
              $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });
            

          }

          

      }

       
    });
   
 

    }
    else
    {
        alert('Select Product..');
    }
      
      
      
      
  
      
      
      
    
  };


$scope.submitForm_1 = function(){
      
      
      
        

  
      

      
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/purchase_complaints_data_remarks_update",
      data:{'remarks':$scope.remarks_2,'id':$scope.hidden_id,'order_base':$scope.order_base}
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
              
              
              
             $scope.remarks_2="";
             
              
            $scope.success = true;
            $scope.error = false;
            $('#exampleModalScrollable_2').modal('toggle');
            $scope.successMessage = data.massage;
            getData();
            $scope.getcount('order_sales_complaints');
            $scope.fetchDataaddress($scope.hidden_id);
            
            
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



$scope.order_base=1;

$scope.viewAddress = function(id){
    
   $scope.hidden_id=id;
   $('#exampleModalScrollable_1').modal('toggle');
    
 
   $scope.fetchDataaddress(id);
   $scope.fetchDataproducts(id);
  
    
};


  
 $scope.fetchDataproducts = function(id){
      
     $http.get('<?php echo base_url() ?>index.php/order/purchase_fetch_cp_products?id='+id).success(function(data){
      
      
       $scope.namesDataproducts = data;
      
       
     });
        
   };
  
     $scope.fetchDataaddress = function(id){
      
     $http.get('<?php echo base_url() ?>index.php/order/purchase_fetch_cp_remarks_fetch?id='+id).success(function(dataaddress){
      
      
       $scope.namesDataaddress = dataaddress;
      
       
     });
        
   };
   
   
    $scope.getProductlist = function(){
      
      
     var order_no= $('#order_no').val();
      
     $http.get('<?php echo base_url() ?>index.php/order/get_purchase_product_list?order_no='+order_no).success(function(data){
      
      
       $scope.namesDataproduct = data;
      
       
     });
        
   };
   
     $scope.getPurchaseorderid = function(){
      
      
      var autocomplete= $('#autocomplete').val();
     var name=autocomplete.split("-");
     var customerid= name[0];
      
     $http.get('<?php echo base_url() ?>index.php/order/fetch_product_get_vendor_order_no?search='+customerid).success(function(data){
      
      
       $scope.namesDataproductorderno = data;
      
        
     });
        
   };
   
   
   
   
   
   
    $scope.getProductlist = function(){
      
    $scope.getProductlistdata();
      
    };
  
   $scope.getProductlistdata = function(){
      
      
     var order_no= $('#order_no').val();
      
     $http.get('<?php echo base_url() ?>index.php/order/get_purchase_product_list?order_no='+order_no).success(function(data){
      
      
       $scope.namesDataproduct = data;
       
       $('#showdata').show();
      
       
     });
        
   };
   
  

});

</script>
         
<?php include ('footer.php'); ?>




</body>

 </html>

