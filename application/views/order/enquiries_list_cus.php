<?php 
include "table_header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
$d_none_c="";
if($this->session->userdata['logged_in']['access']=='31') //Sales Head
{


$d_none_c="d-none";
   
                                                     
}

 ?>
<style type="text/css">
      div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
}
tr.Customer-bg {
    background: #ffca00;
}

table.table.align-middle.table-nowrap.newBorderedTable {
    font-size: 11px;
}

@media screen and (max-width: 767px)
{
  .newBorderedTable tr {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    margin-bottom: 10px;
    background: #fff;
    border-radius: 10px;
    border: 0px;
}
thead{
    display: none;
}
.newBorderedTable td:before {
        content: attr(data-label);
        font-size: .90em;
        text-align: left;
        font-weight: bold;
      
        max-width: 45%;
        color: #545454;
}
.newBorderedTable tr td {
    width: 50%;
    padding: 5px;
        border: none;
        border-bottom: 1px #ccc;
        border-bottom-style: dashed;
}

.newBorderedTable tbody {
    border: none;
}

.nav-tabs-custom .nav-item
{
  width: 50%;
}

li.nav-item .nav-link .badge {
    font-size: 10px;
}

li.nav-item .nav-link {
    font-size: 12px;
}

.newBorderedTable tr td:last-child {border-bottom: none;}

.nav-tabs-custom.card-header-tabs .nav-link {
    padding: 14px 10px;
    border-bottom: 1px solid #e0dbdb;
}
.ui-widget.ui-widget-content {
    width: 86% !important;
    grid-template-columns: unset !important;
}
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
                                          <div class="card shadow-none mb-1">
                                             <div class="card-header align-items-start d-flex p-3">
                                                <div class="flex-shrink-md-0">
                                                   <ul class="nav justify-content-md-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('orders')">
                                                      

                                                     <?php


                                                     if($this->session->userdata['logged_in']['access']=='31') //Sales Head
                                                     {

                                                      ?>

                                                       <li class="nav-item">
                                                         <a class="nav-link "  href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id=<?php echo $neworder_id; ?>" role="tab">
                                                         <span class="d-none d-sm-none"><i class="fas fa-home"></i></span>
                                                         <span class="d-sm-block">New Enquiry </span> 
                                                         </a>
                                                      </li>


                                                          <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders',121)">
                                                         <span class="d-none d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-sm-block">Total Enquiry<span class="badge rounded-pill bg-success float-end"> {{totalenquiry}} </span></span>   
                                                         </a>
                                                      </li>
                                                      

                                                      <li class="nav-item">
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('orders',0)">
                                                         <span class="d-none d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-sm-block">Open Enquiry <span class="badge rounded-pill bg-warning  float-end"> {{pending}} </span></span> 
                                                         </a>
                                                      </li>

                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders',1)">
                                                         <span class="d-none d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-sm-block">Quotations <span class="badge rounded-pill bg-success float-end"> {{proceed}} </span></span>   
                                                         </a>
                                                      </li>

                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders',-1)">
                                                         <span class="d-none d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-sm-block">Cancelled <span class="badge rounded-pill bg-danger  float-end"> {{cancel}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders',-2)">
                                                         <span class="d-none d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-sm-block">Missed Enquiry<span class="badge rounded-pill bg-danger  float-end"> {{missed}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                               



                                                      <?php



                                                     }
                                                     else
                                                     {
                                                       ?>

                                                       <li class="nav-item">
                                                         <a class="nav-link"  href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id=<?php echo $neworder_id; ?>" role="tab">
                                                         <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                         <span class="d-none d-sm-block">New Enquiry </span> 
                                                         </a>
                                                      </li>

                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders',121)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Total Enquiry<span class="badge rounded-pill bg-success float-end"> {{totalenquiry}} </span></span>   
                                                         </a>
                                                      </li>
                                                      

                                                     


                                                      <li class="nav-item">
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('orders',0)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">Open Enquiry <span class="badge rounded-pill bg-warning  float-end"> {{pending}} </span></span> 
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders',1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Quotations <span class="badge rounded-pill bg-success float-end"> {{proceed}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      <li class="nav-item" style="display:none;">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders',4)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Purchase Requisition Sent<span class="badge rounded-pill bg-success float-end"> {{requestp}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      <?php
                                                      if($this->session->userdata['logged_in']['access']!='11')
                                                      {
                                                       ?>
                                                       
                                                       
                                                       
                                                     <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders',3)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Price Requested TL<span class="badge rounded-pill bg-success float-end"> {{request}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      <!-- <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders',4)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Purchase Team Price Requested<span class="badge rounded-pill bg-success float-end"> {{purchase_team}} </span></span>   
                                                         </a>
                                                      </li>-->
                                                      
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders',5)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Request TO Price MD <span class="badge rounded-pill bg-success float-end"> {{md_team}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                       
                                                       <?php
                                                          
                                                      }
                                                      
                                                      ?>
                                                     
 
                                                     
                                                   
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders',-1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Cancelled <span class="badge rounded-pill bg-danger  float-end"> {{cancel}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders',-2)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Missed Enquiry<span class="badge rounded-pill bg-danger  float-end"> {{missed}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders',-4)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Remainder <span class="badge rounded-pill bg-danger  float-end"> {{remainder}} </span></span>   
                                                         </a>
                                                      </li>


                                                       <li class="nav-item" >
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders',-3)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Archive List<span class="badge rounded-pill bg-danger  float-end"> {{archive}} </span></span>   
                                                         </a>
                                                      </li>



                                                       <?php
                                                     }
                                                     ?>
                                                     

                                                     
                                                      
                                                      
                                                      
                                                      
                                                   </ul>



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
                           <div class="col-sm-3">
                          <label>From Date: </label><input type="date" class="form-control" id="from_date" ng-model="from_date" ng-change="DateFilter()">
                          </div>
                          
                           <div class="col-sm-3">
                           <label>To Date:</label><input type="date" class="form-control" id="to_date" ng-model="to_date" ng-change="DateFilter()">
                           </div>
                           
                          <div class="col-sm-3">
                        <div id="example_filter" class="dataTables_filter">
                            <label>Search:</label><input type="search" class="form-control input-sm" placeholder="Order No" aria-controls="example" ng-model="searchText" ng-change="searchTextChanged()">
                        </div> 
                    </div>
                       </div>

                                                          <div class="table-responsive" >


                        
                                                              
                                                              
                                                              <table class="table align-middle table-nowrap newBorderedTable" >
                                                                  <thead >
                                                                      <tr>
                                                                          <th>#</th>
                                                                          <th>Enquiry No</th>
                                                                          <th>Name</th>
                                                                          <th>Phone</th>
                                                                          <th class="<?php echo  $d_none_c; ?>">Commission</th>
                                                                          <th>Total</th>
                                                                          
                                                                          <th>Enquiry Date (Created)</th>
                                                                          <th class="<?php echo  $d_none_c; ?>">Quotation Date</th>
                                                                          <th>Action</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData" class="{{name.color}}">
                                                                          <td data-label="No : ">
                                                                              
                                                                                  {{name.no}}
                                                                              
                                                                          </td>
                                                                          
                                                                          
                                                                          <td data-label="Enquiry No : ">
                                                                              
                                                                             
                                                                              <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.order_no}}</a>
                                                                              
                                                                             
                                                                              
                                                                         </td>
                                                                          
                                                                          
                                                                          
                                                                          
                                                                          <td data-label="Name : "><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.name}}</a></td>
                                                                          <td data-label="Phone : ">
                                                                             <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1"> {{name.phone}}</a>
                                                                              <!--<p class="mb-0">{{name.email}}</p>-->
                                                                          </td>
                                                                          
                                                                          <td data-label="Commission : " class="<?php echo $d_none_c; ?>"><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">
                                                                              
                                                                            <span ng-if="name.commission>0">{{name.commission}}</span>
                                                                              
                                                                              </a></td>
                                                                           <td data-label="Bill Amount : "><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.totalamount | indianCurrency }}</a></td>
                                                                       
                                                                         <!--<td> 
                                                                         
                                                                         
                                                                         
                                                                         
                                                                         <span ng-if="name.order_base==0">
                                                                             
                                                                               <button type="button" class="btn btn-outline-warning waves-effect waves-light">Pending</button>
                                                                         
                                                                         </span>
                                                                         
                                                                         <span ng-if="name.order_base==1">
                                                                             
                                                                               <button type="button" class="btn btn-outline-success waves-effect waves-light">Processed</button>
                                                                         
                                                                         </span>
                                                                         
                                                                         <span ng-if="name.order_base==-1">
                                                                             
                                                                               <button type="button" class="btn btn-outline-danger waves-effect waves-light">Canceled</button>
                                                                         
                                                                         </span>
                                                                       
                                                                         
                                                                         
                                                                         
                                                                         
                                                                         
                                                                         
                                                                         </td>-->
                                                                           <td data-label="Status : " class="<?php echo $d_none_c; ?>"> <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">
                                                                               
                                                                               <span ng-if="name.order_base!=1">
                                                                             
                                                                                {{name.reason}}
                                                                         
                                                                               </span>

                                                                                <span ng-if="name.order_base==1">

                                                                                   Moved To quotation

                                                                                </span>
                                                                               
                                                                             
                                                                               
                                                                               </a></td>
                                                                           
                                                                           
                                                                               
                                                                               
                                                                              <td data-label="Enquiry By : " class="<?php echo $d_none_c; ?>"><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.order_by}}</a></td>
                                                                          
                                                                           
                                                                          <td data-label="Create Date : "><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.enquiry_date}} </a></td>
                                                                          <td class="<?php echo $d_none_c; ?>"><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1">{{name.quotation_date}}</a></td>
                                                                          <td data-label="Action : ">
                                                                             
                                                                              
                                                                             <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id={{name.base_id}}&viewbase=1" ><i class="mdi mdi-eye font-size-16 text-success me-1"></i> View</a>
                                                                                     
                                                                              
                                                                             
                                                                                      <!--<a href="#"   ng-click="deleteData(name.id)"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Delete</a>-->
                                                                                     
                                                                                      <span ng-if="name.order_base==0">
                                                                                     <!--<a href="#"  ng-click="cancelData(name.id)"><i class="mdi mdi-account-off font-size-16 text-danger me-1"></i> Cancel</a>-->
                                                                                      </span>
                                                                                      
                                                                                 
                                                                             
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
      $(document).ready(function(){


          $( "#from_date" ).datepicker({
    
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy-mm-dd'
    
    });

              $( "#to_date" ).datepicker({
    
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy-mm-dd'

    
    });
});
              

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



  $scope.from_date = new Date();
  $scope.to_date = new Date();


  


    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    
    $scope.tablename='orders';
    getData();



   function getData() {
       
      var order_base = $('#order_base').val();
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      
      
       $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date)
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
         
         
         
        $scope.tablename='orders';
        var order_base = $('#order_base').val();

      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      
        
        $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base+'&from_date='+from_date+'&to_date='+to_date)
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



