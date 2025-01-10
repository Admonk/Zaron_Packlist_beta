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
.some-class1 {
    margin: 0 50%;
}
.trpoint {
    
    cursor: pointer;
   
}
.table>tbody {
    vertical-align: middle;
}
.trpoint:hover {
    background: antiquewhite;
}

         .loading {
    text-align: center;
}

td {
    font-size: 11px;
    color: black;
}
td a {
    color: black;
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
.table-responsive {
    height: 500px;
    cursor: grab;
}


.ui-widget.ui-widget-content {
    border: 1px solid #d3d3d3;
    z-index: 999999;
}
.table-bordered {
    border: 1px solid #e9e9ef;
   
}
.bgcolorchange {
    background: #ededed;
}
#balance_view
{
  color: blue;
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
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('orders_process')">
                                                    
                                                   
                                                     

                                                      <!-- <li class="nav-item">
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',20,1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Discount Order <span class="badge rounded-pill bg-danger  float-end"> {{discount}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',21,1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Commission Order <span class="badge rounded-pill bg-danger float-end"> {{commission}} </span></span>   
                                                         </a>
                                                      </li> 
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',22,1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Cancel a bill <span class="badge rounded-pill bg-danger float-end"> {{cancel}} </span></span>   
                                                         </a>
                                                      </li> 
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',23,1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Edit bill <span class="badge rounded-pill bg-danger float-end"> {{edit}} </span></span>   
                                                         </a>
                                                      </li> 
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',121,1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Collection verification <span class="badge rounded-pill bg-danger  float-end"> {{excess_payment}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',25)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Driver return Order <span class="badge rounded-pill bg-danger  float-end"> {{driver_return}} </span></span>   
                                                         </a>
                                                       </li>
                                                  
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',26,1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Order Approved List <span class="badge rounded-pill bg-success  float-end"> {{approvel_order}} </span></span>   
                                                         </a>
                                                       </li>
                                                  
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',27,1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Order Rejected List <span class="badge rounded-pill bg-danger  float-end"> {{rejected_order}} </span></span>   
                                                         </a>
                                                       </li> -->




                                                          <!-- <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',1777)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Super Admin 2 <span class="badge rounded-pill bg-danger  float-end"> {{super_admin}} </span></span>   
                                                         </a>
                                                       </li> -->

                                                       <li class="nav-item">
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('all_ledgers',0,'Discount')">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Discount From Net BL <span class="badge rounded-pill bg-primary  float-end"> {{discount_form_nb}} </span></span>   
                                                         </a>
                                                       </li>

                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('all_ledgers',0,'Excess')">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Excess Amount Refund<span class="badge rounded-pill bg-danger  float-end"> {{excess_return}} </span></span>   
                                                         </a>
                                                       </li>

                                                       
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('all_ledgers',148,'Discount')">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Discount/Excess Rejected<span class="badge rounded-pill bg-danger  float-end"> {{discount_form_rj}} </span></span>   
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
                                                            <input type="hidden" id="net_balance" > 
  <!--datatable="ng" dt-options="vm.dtOptions"-->
                                                            <input type="hidden" id="nextnumber" value="0">   
                                                            <input type="hidden" id="prenumber" value="10">  
                                                            <input type="hidden" id="pageSize" value="10">  
                                                            <input type="hidden" id="order_base" value="20">
                                                              <input type="hidden" id="edit_by" value="0">
                                                            
                                                            
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
                                                                      <tr ng-if="pageTapName == 1">
                                                                        <th><input class="form-check-input " type="checkbox" id="checkall" ng-click="allCheck()" style="width: 16px;height: 16px;"> </th>
                                                                          <th>No</th>
                                                                          <th>Customer Name</th>
                                                                          <th>Customer Phone</th>
                                                                          <th>Area</th>
                                                                  
                                                                          <th>Closing</th>
                                                                          <th>Net Balance</th>
                                                                          <th>Request Amount</th>
                                                                          <th>Request By</th>
                                                                          <th>Request Date</th>
                                                                          <th>Approved By</th>
                                                                          <th>Approved Date & TIme</th>
                                                                         
                                                                          
                                                                          <th>Action</th>
                                                                      </tr>

                                                                      <tr ng-if="pageTapName == 'Discount'">
                                                                          <th><input class="form-check-input " type="checkbox" id="checkall" ng-click="allCheck()" style="width: 16px;height: 16px;"> </th>
                                                                          <th>No</th>
                                                                          <th>Customer Name</th>
                                                                          <th>Customer Phone</th>
                                                                          <th>Area</th>
                                                                  
                                                                          <th>Closing</th>
                                                                          <th>Net Balance</th>
                                                                          <th>Request Amount</th>
                                                                          <th>Request By</th>
                                                                          <th>Request Date</th>
                                                                          <th>Approved By</th>
                                                                          <th>Approved Date & TIme</th>
                                                                         
                                                                          
                                                                          <th>Action</th>
                                                                      </tr>

                                                                      <tr ng-if="pageTapName == 'Excess'">
                                                                          <th><input class="form-check-input " type="checkbox" id="checkall" ng-click="allCheck()" style="width: 16px;height: 16px;"> </th>
                                                                          <th>No</th>
                                                                          <th>Customer Name</th>
                                                                          <th>Customer Phone</th>
                                                                          <th>Area</th>
                                                                  
                                                                          <th>Closing</th>
                                                                          <th>Net Balance</th>
                                                                          <th>Request Amount</th>
                                                                          <th>Request By</th>
                                                                          <th>Request Date</th>
                                                                          <th>Approved By</th>
                                                                          <th>Approved Date & TIme</th>
                                                                         
                                                                          
                                                                          <th>Action</th>
                                                                      </tr>
                                                                      <!-- $scope.pageTapName -->
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                                      <tr  ng-repeat="name in namesData" ng-if="pageTapName == 1">
                                                                      <td>
                                                                              <div class="form-check font-size-16">
                                                                                  <input class="form-check-input customerlistcheck" name="customerlistcheck" value="{{name.id}}" type="checkbox" id="customerlistcheck01">
                                                                                 
                                                                              </div>
                                                                          </td>
                                                                          <td>{{name.no}}</td>
                                                                          <td>{{name.name}}</td>
                                                                          <td>
                                                                             {{name.phone}}
                                                                          </td>
                                                                          <td>
                                                                             {{name.route_name}}
                                                                          </td>
                                                                          <td>{{name.closing_bal | indianCurrency}}</td>
                                                                          <td>{{name.net_balance | indianCurrency}} </td>
                                                                          
                                                                           <td>{{name.credit | indianCurrency }}</td>
                                                                          
                                                                           <td>
                                                                            {{name.created_by}}
                                                                            <br>
                                                                             {{name.reference_no}} 
                                                                            </td>
                                                                           
                                                                          <td>{{name.payment_date}}</td>
                                                                            

                                                                          <td>{{name.approved_by}} </td>
                                                                          <td>{{name.approved_md_date}} {{name.approved_md_time}}</td>
                                                                         
                                                                          <td>


                                                                           <!-- <a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{name.customer_id}}" target="_blank"  class="btn btn-outline-danger btn-sm">Ledger View</a> -->
                                 
                                 

                                           <button type="button" ng-click="onviewparty_edit_new(name.id,name.customer_id,name.name,name.debit,name.credit)"  class="btn btn-outline-danger btn-sm" ng-if="name.reference_no!='Discount Approved' && pageTapName != 'Excess'">VIEW</button>    
                                   
                                                                              
                                                                          </td>
                                                                      </tr>
                                                                      <tr  ng-repeat="name in namesData" ng-if="pageTapName == 'Discount'">
                                                                          <td>
                                                                              <div class="form-check font-size-16">
                                                                                  <input class="form-check-input customerlistcheck" name="customerlistcheck" value="{{name.id}}" type="checkbox" id="customerlistcheck01">
                                                                                 
                                                                              </div>
                                                                          </td>
                                                                          <td>{{name.no}}</td>
                                                                          <td>{{name.name}}</td>
                                                                          <td>
                                                                             {{name.phone}}
                                                                          </td>
                                                                          <td>
                                                                             {{name.route_name}}
                                                                          </td>
                                                                          <td>{{name.closing_bal | indianCurrency}}</td>
                                                                          <td>{{name.net_balance | indianCurrency}} </td>
                                                                          
                                                                           <td ng-if="pageTapName == 'Discount'">{{name.credit | indianCurrency }}</td>
                                                                          
                                                                           <td>
                                                                            {{name.created_by}}
                                                                            <br>
                                                                             {{name.reference_no}} 
                                                                            </td>
                                                                           
                                                                          <td>{{name.payment_date}}</td>
                                                                            

                                                                          <td>{{name.approved_by}} </td>
                                                                          <td>{{name.approved_md_date}} {{name.approved_md_time}}</td>
                                                                         
                                                                          <td>


                                                                           <!-- <a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{name.customer_id}}" target="_blank"  class="btn btn-outline-danger btn-sm">Ledger View</a> -->
                                 
                                 

                                           <button type="button" ng-click="onviewparty_edit_new(name.id,name.customer_id,name.name,name.debit,name.credit)"  class="btn btn-outline-danger btn-sm" ng-if="name.reference_no!='Discount Approved' && pageTapName != 'Excess'">VIEW</button>    
                                   
                                                                              
                                                                          </td>
                                                                      </tr>
                                                                      <tr  ng-repeat="name in namesData" ng-if="pageTapName == 'Excess'">
                                                                          <td ng-style="{'background-color': (name.md_verification == 150 ? '#c8e4f5' : (name.md_verification == 151 ? '#FFF8DC' : 'inherit'))}">
                                                                              <div class="form-check font-size-16">
                                                                                  <input class="form-check-input customerlistcheck" name="customerlistcheck" value="{{name.id}}" type="checkbox" id="customerlistcheck01">
                                                                                 
                                                                              </div>
                                                                          </td>
                                                                          <td ng-style="{'background-color': (name.md_verification == 150 ? '#c8e4f5' : (name.md_verification == 151 ? '#FFF8DC' : 'inherit'))}">
                                                                            {{name.no}}
                                                                          </td>
                                                                          <td ng-style="{'background-color': (name.md_verification == 150 ? '#c8e4f5' : (name.md_verification == 151 ? '#FFF8DC' : 'inherit'))}">
                                                                            {{name.name}}
                                                                          </td>
                                                                          <td ng-style="{'background-color': (name.md_verification == 150 ? '#c8e4f5' : (name.md_verification == 151 ? '#FFF8DC' : 'inherit'))}">
                                                                             {{name.phone}}
                                                                          </td>
                                                                          <td ng-style="{'background-color': (name.md_verification == 150 ? '#c8e4f5' : (name.md_verification == 151 ? '#FFF8DC' : 'inherit'))}">
                                                                             {{name.route_name}}
                                                                          </td>
                                                                          <td ng-style="{'background-color': (name.md_verification == 150 ? '#c8e4f5' : (name.md_verification == 151 ? '#FFF8DC' : 'inherit'))}">{{name.closing_bal | indianCurrency}}</td>
                                                                          <td ng-style="{'background-color': (name.md_verification == 150 ? '#c8e4f5' : (name.md_verification == 151 ? '#FFF8DC' : 'inherit'))}">{{name.net_balance | indianCurrency}} </td>
                                                                          
                                                                           <!-- <td ng-if="pageTapName == 'Discount'">{{name.credit}}</td> -->
                                                                           <td ng-style="{'background-color': (name.md_verification == 150 ? '#c8e4f5' : (name.md_verification == 151 ? '#FFF8DC' : 'inherit'))}" ng-if="pageTapName == 'Excess'">
                                                                            {{name.totalsum | indianCurrency}}
                                                                          </td>
                                                                           <td ng-style="{'background-color': (name.md_verification == 150 ? '#c8e4f5' : (name.md_verification == 151 ? '#FFF8DC' : 'inherit'))}">{{name.created_by}}
                                                                            <br>
                                                                             {{name.reference_no}} 
                                                                            </td>
                                                                           
                                                                          <td ng-style="{'background-color': (name.md_verification == 150 ? '#c8e4f5' : (name.md_verification == 151 ? '#FFF8DC' : 'inherit'))}">
                                                                            {{name.payment_date}}

                                                                          </td>
                                                                            

                                                                          <td ng-style="{'background-color': (name.md_verification == 150 ? '#c8e4f5' : (name.md_verification == 151 ? '#FFF8DC' : 'inherit'))}">
                                                                            {{name.approved_by}} 
                                                                          </td>
                                                                          <td ng-style="{'background-color': (name.md_verification == 150 ? '#c8e4f5' : (name.md_verification == 151 ? '#FFF8DC' : 'inherit'))}">
                                                                            {{name.approved_md_date}} {{name.approved_md_time}}
                                                                          </td>
                                                                         
                                                                          <td ng-style="{'background-color': (name.md_verification == 150 ? '#c8e4f5' : (name.md_verification == 151 ? '#FFF8DC' : 'inherit'))}">


                                                                           <!-- <a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{name.customer_id}}" target="_blank"  class="btn btn-outline-danger btn-sm">Ledger View</a> -->
                                 
                                 

                                           <!-- <button type="button" ng-click="onviewparty_edit_new(name.id,name.customer_id,name.name,name.debit,name.credit)"  class="btn btn-outline-danger btn-sm" ng-if="name.reference_no!='Discount Approved' && pageTapName != 'Excess'">VIEW</button>     -->
                                           <button  ng-if="pageTapName == 'Excess' && (name.md_verification ==='150' || name.md_verification ==='151' || name.md_verification ==='153')" type="button" ng-click="excess_edit_new(name.id,name.customer_id,name.name,name.totalsum,name.net_balance)"  class="btn btn-outline-danger btn-sm">VIEW</button>    
                                   
                                                                              
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
                        
                        
                        <div class="showbtn" style="display:none;">
                             
                             <button type="button"  ng-click="coniformed()" class="btn btn-success waves-effect waves-light" >Discount Approved</button>
                             <button type="button"  ng-click="rejected()" class="btn btn-primary waves-effect waves-light" >Rejected</button>
                        
                        </div>  
                       
                        
                        
                        
                 
               </div>
            </div>
            <!-- End Page-content -->
         </div>
     
     
     
     
     
     



   </div>
   
   
    
    <div class="modal fade" id="exampleModalScrollable_1" tabindex="-1" role="dialog"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-xl">
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
                                                      <h3>Return Products</h3>
                                                                
                                                                <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         <th>No</th>
                                                                         <th>Product Name</th>
                                                                         <td>QTY</td>
                                                                         <td>Return Complaint</td>
                                                                        <td>Driver Status</td>
                                                                          <td>Inward Status</td>
                                                                       
                                                                        
                                                                     </tr>
                                                                     <tr  ng-repeat="names in namesDataproducts">
                                                                         
                                                                         <th>{{names.no}}</th>
                                                                         <th>{{names.product_name}}</th>
                                                                         <td>{{names.qty}}</td>
                                                                         <td>{{names.notes}}</td>
                                                                         <td>{{names.status}}</td>
                                                                         <td>{{names.in_status}}</td>
                                                                         
                                                                         
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>

                        
            
                         <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Return  Status <span style="color:red;">*</span></label>
                            <div class="col-sm-12" >
                               <select class="form-control order_base" required name="order_base"   ng-model="order_base">

                               <option value="">SELECT STATUS</option>
                               <option value="2">APPROVED</option>
                               <option value="3">REJECTED</option>
                              
                           

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






























    <div class="modal fade" id="firstmodalcommison" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Orders Id: {{orderno_number}}</h5>
                                                            
                               
                                                    


                                                  
                                                   
                                                 
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                   
                                                   
                                                        </div>
                                                        <div class="modal-body1">
                                                            
                                                            
                              
                                                            <div class="card1" >
                                          <div class="card-body" ng-repeat="namesorderid in namesDataorderid">
                                              
                                                <p><b>Customer name :</b> {{namesorderid.company_name}} <span style="float: right;">Sales Person : <b style="font-size:12px;">{{namesorderid.sales_name}}</b></span></p>
                                                <p><b>Phone :</b> {{namesorderid.phone}}</p>
                                                <p><b> Address :</b>  {{namesorderid.address}}</p>
                                               <input type="hidden" id="payment_order_id" value="{{namesorderid.order_id}}">
                                                <p>Total Bill Amount : <b style="font-size:18px;">{{namesorderid.totalamount}}</b></p>
                                                <p ng-if="namesorderid.delivery_charge>0">Delivery Charge  : <b style="font-size:12px;">{{namesorderid.delivery_charge}} </b></p>
                                                <p>Customer Payment Mode : <b style="font-size:12px;">{{namesorderid.payment_mode}}</b></p>
                                              
                                               <span ng-if="namesorderid.payment_mode=='Cash'">
                                                   
                                                       <table  class="table">
                                                       <tr><td><b>Denomination</b></td><td></td><td></td></tr>
                                                       <tr><td>1 * </td><td>{{c1rs}}</td><td>{{c1rs_s}}</td></tr>
                                                       <tr><td>2 * </td><td>{{c2rs}}</td><td>{{c2rs_s}}</td></tr>
                                                       <tr><td>5 * </td><td>{{c5rs}}</td><td>{{c5rs_s}}</td></tr>
                                                       <tr><td>10 * </td><td>{{c10rs}}</td><td>{{c10rs_s}}</td></tr>
                                                       <tr><td>20 * </td><td>{{c20rs}}</td><td>{{c20rs_s}}</td></tr>
                                                       <tr><td>50 * </td><td>{{c50rs}}</td><td>{{c50rs_s}}</td></tr>
                                                       <tr><td>100 *</td><td> {{c100rs}}</td><td>{{c100rs_s}}</td></tr>
                                                       <tr><td>200 * </td><td>{{c200rs}}</td><td>{{c200rs_s}}</td></tr>
                                                       <tr><td>500 * </td><td>{{c500rs}}</td><td>{{c500rs_s}}</td></tr>
                                                       <tr><td>2000 * </td><td>{{c2000rs}}</td><td>{{c2000rs_s}}</td></tr>
                                                       <tr><td>Denomination Total </td><td></td><td><span  >{{denomination_total}}</tr>
                                                       <tr style="color:red;font-weight:700;"><td>Difference  </td><td></td><td><span  >{{namesorderid.totalamount-denomination_total}}</tr>
                                                       
                                                       
                                                       
                                              <tr style="font-weight:700;" ng-if="namesorderid.return_excess!=0"><td>Return the excess  </td><td></td><td><span  >{{namesorderid.return_excess}}</tr>
                                                       
                                                       
                                                       <input type="hidden" value="{{namesorderid.totalamount-denomination_total}}" id="difference">
                                                      
                                                 </table>
                                                   
                                               </span>
                                               
                                               <span ng-if="namesorderid.payment_mode!='Cash'">
                                                   <p>Reference NO : {{namesorderid.reference_no}}</p>
                                               </span>
                                              
                                              <span ng-if="namesorderid.payment_mode!='Cash'">
                                                                             <div class="imageset" <div class="mb-3" ng-if="namesorderid.payment_image!=0">
                                                                             <img src="{{namesorderid.payment_image}}" class="img-responsive">
                                                                             </div>
                                               </span>
                                              
                                             
                                              <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">Collected  Payment <span style="color:red;">*</span></label>
                                                <div class="col-sm-12">
                                                    
                                                 <span ng-if="namesorderid.payment_mode!='Cash'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="{{namesorderid.fulltotalamount}}" readonly name="collectamount" id="collectamount" type="text">
                                                 </span>
                                                 <span ng-if="namesorderid.payment_mode=='Cash'">    
                                                 <input  class="form-control" placeholder="Enther The Amount" value="{{denomination_total}}" readonly name="collectamount" id="collectamount" type="text">
                                                 </span>
                                                 
                                                </div>
                                              </div>
                                              
                                              
                                               
                                              <!--<br>
                                              
                                               <button type="button" class="btn btn-success w-md" ng-click="mdapproved(1,'Driver Excess payment Approved',1)" id="approved">Approve</button>
                                                   
                                                    <button type="button" class="btn btn-primary w-md" ng-click="mdapproved(1,'MD Driver Excess Request Rejected',2)" >Rejected</button>
                                            
                                              -->
                                              
                                                 
                                              
                                               
                                            
                                                          
                                             
                                          </div>
                                    </div>  
                                                            
                                                            
                                                           
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>
   
   
   
   
   




<div class="modal fade" id="excessEditData" aria-hidden="true" aria-labelledby="exampleModalToggleLabelset" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
    <form name="myForm" ng-submit="saveExcesData()" novalidate>    
    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{excessCusName}} | Net Balance: {{excessCusBalance}}</h5>
                <input type="hidden" ng-model="id" value="{{id}}">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <span ng-show="error_msg"><h4 style="color:red"><b>{{error_msg}}</b></h4></span>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" id="aria-label-set"><b>Excess Return Amount </b><span style="color:red;">*</span></label>

                    <div class="col-sm-3">

                        <input type="text" min="0" id="amount_set" ng-change="getBalance(excessCusBalance)" ng-model="amount_set" name="amount" class="form-control" ng-required="true" ng-disabled="true">

                        <!-- <br> -->
                        <span ng-show="excessBalanceAmd > 0"><b style="color: blue;">CURRENT NET BAL -{{excessBalanceAmd}}</b></span>
                    </div>
                    
                    <label class="col-sm-3 col-form-label">Payment Date </label>

                    <div class="col-sm-3">

                    <input type="date" id="payment_date" ng-model="payment_date" value="<?php echo date('Y-m-d'); ?>" class="form-control" ng-disabled="true">

                    </div>

                </div>
                    <br>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">Remarks </label>
                    </div>

                    <div class="col-md-9">
                        <div class="form-group row">


                            <div class="col-sm-12">

                            <input type="text" id="remarks" ng-model="remarks" class="form-control" ng-disabled="true">


                            </div>
                        </div>
                    </div>
                
                </div>

                <br>
                <div class="form-group row">
                    <!-- <div class="some-class1">
                        <input type="radio" class="radio" name="Payer_1" ng-model="party_type1" value="1" id="Customer_1" />
                        <label for="Customer_1">Customer</label>
                        <input type="radio" class="radio" name="Payer_1" ng-model="party_type1" value="3" id="Vendor_1" />
                        <label for="Vendor_1">Vendor</label>
                        <input type="radio" class="radio" name="Payer_1" ng-model="party_type1" value="2" id="Driver_1" />
                        <label for="Driver_1">Driver</label>
                        <input type="radio" class="radio" name="Payer_1" ng-model="party_type1" value="5" id="Other_1" />
                        <label for="Other_1">Others Ledger</label>
                    </div> -->

                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">CASH </label>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group row">


                            <div class="col-sm-12">

                                <input type="text" id="value1" ng-model="value1" placeholder="Value" class="form-control sum" ng-disabled="true">


                            </div>
                        </div>
                    </div>


                    <!-- <div class="col-md-6"> -->

                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">CASH DEPOSIT</label>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" id="value2" ng-model="value2" placeholder="Value" class="form-control sum" ng-disabled="true">
                            </div>
                        </div>
                    </div>
                        <!-- <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance1()" ng-keyup="completeCustomer1()" placeholder="Search Names" ng-model="party1"  id="party1">
                       
                        <br>
                        <span ng-if="opening_balance1"><b>Avilable Balance : {{opening_balance1 | number}}</b></span> -->
                    <!-- </div> -->
                </div>
                <br>

                <div class="form-group row">
                    <!-- <div class="some-class1">
                        <input type="radio" class="radio" name="Payer_5" ng-model="party_type5" value="4" id="Customer_5" />
                        <label for="Customer_2">NEFT/RTGS</label>
                        <input type="radio" class="radio" name="Payer_5" ng-model="party_type5" value="9" id="Customer_5" />
                        <label for="Customer_2">CASH</label>
                    </div> -->

                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">Online/BANK Transfer (Customer Acc Detail) <span style="color:red;">*</span></label>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" id="bank_amount" ng-model="bank_amount" placeholder="Amount" class="form-control sum" ng-required="true" ng-disabled="true">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">

                        <input type="text" class="form-control border-bottom-input" placeholder="Beneficiary Name" ng-model="party6" id="party6" ng-required="true" ng-disabled="true">
                    </div>
                    <br> <br> <br>
                    <div class="col-md-3">
                    <label class="col-sm-12 col-form-label" style="font-weight: 600;"></label>

                    </div>
                   
                    <div class="col-md-3">

                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched"  placeholder="Account No" ng-model="account_no" id="account_no" ng-required="true" ng-disabled="true">
                    </div>
                    <div class="col-md-3">

                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched"  placeholder="IFSC Code" ng-model="ifsc_code" id="ifsc_code" ng-required="true" ng-disabled="true">
                    </div>
                    <div class="col-md-3">

                    <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched"  placeholder="Branch" ng-model="notes" id="notes" ng-required="true" ng-disabled="true">
                    </div>
                    <br> <br> <br>

                  
                    <div class="col-md-6">

                    </div>
                </div>

                <?php
               if($this->session->userdata['logged_in']['access']=='12')
                {
                ?>
<!-- 
                <div class="form-group row">
                    <div class="some-class1">
                        <input type="radio" class="radio" name="Payer_5" ng-model="party_type5" value="4" id="Customer_5" />
                        <label for="Customer_5">Bank</label>
                    </div>
                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">BANK ACCOUNT</label>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group row">


                            <div class="col-sm-12">

                                <input type="text" id="value5" ng-model="value5" placeholder="Value" class="form-control sum">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">

                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance5()" ng-keyup="completeCustomer5()" placeholder="Search Names" ng-model="party5"  id="party5">
                        <br>
                        <span ng-if="opening_balance5"><b>Avilable Balance : {{opening_balance5 | number}}</b></span>
                    </div>


                 
                </div> -->

                <?php 
                } 
                ?>


     
                <div class="form-group row">
                    <div class="some-class1">
                        <input type="radio" class="radio" name="Payer_3" ng-model="party_type3" value="1" id="Customer_3" />
                        <label for="Customer_3">Customer</label>
                        <input type="radio" class="radio" name="Payer_3" ng-model="party_type3" value="3" id="Vendor_3" />
                        <label for="Vendor_3">Vendor</label>
                        <input type="radio" class="radio" name="Payer_3" ng-model="party_type3" value="2" id="Driver_3" />
                        <label for="Driver_3">Driver</label>
                        <input type="radio" class="radio" name="Payer_3" ng-model="party_type3" value="5" id="Other_3" />
                        <label for="Other_3">Others Ledger</label>
                    </div>

                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">LEDGER <span style="color:red;">*</span></label>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group row">
                            <div class="col-sm-12">

                                <input type="text" id="value3" ng-model="value3" placeholder="Value" class="form-control sum" ng-disabled="true">


                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance3()" ng-keyup="completeCustomer3()" placeholder="Search Names" ng-model="party3"  id="party3" ng-disabled="true">
                        <br>
                        <span ng-if="opening_balance3"><b>Avilable Balance : {{opening_balance3 | number}}</b></span>
                    </div>
                </div>



                <div class="form-group row">
                    <div class="some-class1">
                        <input type="radio" class="radio" name="Payer_4" ng-model="party_type4" value="1" id="Customer_4" />
                        <label for="Customer_4">Customer</label>
                        <input type="radio" class="radio" name="Payer_4" ng-model="party_type4" value="3" id="Vendor_4" />
                        <label for="Vendor_4">Vendor</label>
                        <input type="radio" class="radio" name="Payer_4" ng-model="party_type4" value="2" id="Driver_4" />
                        <label for="Driver_4">Driver</label>
                        <input type="radio" class="radio" name="Payer_4" ng-model="party_type4" value="5" id="Other_4" />
                        <label for="Other_4">Others Ledger</label>
                    </div>
                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">CNN <span style="color:red;">*</span></label>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group row">


                            <div class="col-sm-12">

                                <input type="text" id="value4" ng-model="value4" placeholder="Value" class="form-control sum" ng-disabled="true">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">

                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance4()" ng-keyup="completeCustomer4()" placeholder="Search Names" ng-model="party4"  id="party4" ng-disabled="true">
                        <br>
                        <span ng-if="opening_balance4"><b>Avilable Balance : {{opening_balance4 | number}}</b></span>
                    </div>

                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">GST</label>
                    </div>
                    <br> <br> <br>

                    <div class="col-md-3">
                        <div class="form-group row">


                            <div class="col-sm-12">


                                <input type="number" id="gst" ng-model="gst" class="form-control sum" placeholder="GST Amount" ng-disabled="true">

                            </div>
                        </div>
                    </div>


                 
                </div>

                <?php
               if($this->session->userdata['logged_in']['access']=='14' || $this->session->userdata['logged_in']['access']=='1')
                {
                ?>

                <div class="form-group row" ng-show="bank_amount > 0 && md_verification != 150 && md_verification != 151" >
                    <div class="some-class1">
                        <!-- <input type="radio" class="radio" name="Payer_5" ng-model="party_type5" value="4" id="Customer_5" />
                        <label for="Customer_5">Bank</label> -->
                    </div>
                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">SELECT BANK ACCOUNT <span style="color:red;">*</span></label>
                    </div>

                    <div class="col-md-9">
                        <div class="form-group row">


                            <div class="col-sm-12">
                            <select name="selectedBank" ng-model="selectedBank" ng-options="bank.id as bank.bank_name for bank in selectBanks" class="form-control" ng-disabled="true">
                              <option value="">Select Bank</option>
                           </select>
                                <!-- <input type="text" id="value5" ng-model="value5" placeholder="Value" class="form-control sum"> -->
                            </div>
                            
                        </div>
                    </div>


                    <div class="col-md-6">

                        <!-- <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance5()" ng-keyup="completeCustomer5()" placeholder="Search Names" ng-model="party5"  id="party5">
                        <br>
                        <span ng-if="opening_balance5"><b>Avilable Balance : {{opening_balance5 | number}}</b></span> -->
                    </div>


                 
                </div>
                
<br>
<?php
 } 
 ?>

              

                

                <div class="row">

                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">Total</label>
                    </div>

                    <div class="col-md-3">

                        <label class="col-sm-12 col-form-label" style="font-weight: 600;" id="totalsum">0</label>
                    </div>

                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">Difference</label>
                    </div>

                    <div class="col-md-3">

                        <label class="col-sm-12 col-form-label" style="font-weight: 600;" id="Difference">0</label>

                    </div>
                </div>

                <span ng-if="consider_gst==0" style="display:none;">

                    <label class="form-check-label" for="formrow-excess-val">Consider GST &nbsp;&nbsp;</label>
                    <input type="checkbox" class="form-check-input" name="consider_gst" value="0" id="formrow-excess-val">

                </span>

                <span ng-if="consider_gst==1" style="display:none;">

                    <label class="form-check-label" for="formrow-excess-val">Consider GST &nbsp;&nbsp;</label>
                    <input type="checkbox" class="form-check-input" checked name="consider_gst" value="1" id="formrow-excess-val">

                </span>


          


                <div class="row" style="margin: 20px -9px;">

                    <div class="col-md-12">
                        <div class="form-group row">

                            <div class="col-sm-12">
                                <input type="hidden" id="l_id">


                                <!-- <button ng-show="md_verification == 150" type="submit" class="btn btn-success w-md"  id="approved" style="float: right;"  ng-click="excessStatusUpdate('151','Excess Approved')" >APPROVED</button> -->

                                <!-- <button ng-show="md_verification == 150" type="submit" class="btn btn-primary w-md"    ng-click="excessStatusUpdate('152','Excess Rejected')">REJECTED</button> -->
                           </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </form>
    </div>
</div>









     <div class="modal fade" id="firstmodalcommisonparty" aria-hidden="true" aria-labelledby="exampleModalToggleLabelset" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabelset"></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                            
                                                        

                                                              
                                                              
                                                               <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label" id="aria-label-set">Discount Amount <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text"  min="0"  onkeypress="return isNumberKey(event)" id="amount_set_2" name="amount" class="form-control" ng-disabled="true">
               

               <br>
                <div class="form-group row" id="credit_data" style="display: none;">
                  
                  <div class="col-sm-12">
                    <div class="some-class">
                     <input type="radio" class="radio" name="amount"  value="500" id="500" >
                     <label for="500">500</label>
                     <input type="radio" class="radio" name="amount" value="1000" id="1000">
                     <label for="1000">1000</label>
                     <input type="radio" class="radio" name="amount" value="2000"  id="2000">
                     <label for="2000">2000</label>
                     <input type="radio" class="radio" name="amount" value="3000" id="3000">
                     <label for="3000">3000</label>
                     <input type="radio" class="radio" name="amount" value="4000" id="4000">
                     <label for="4000">4000</label>
                     
                     <input type="radio" class="radio" name="amount" value="5000" id="5000">
                     <label for="5000">5000</label>

                     <input type="radio" class="radio" name="amount" value="10000" id="10000">
                     <label for="10000">10000</label>

                  </div>
                  </div>
               </div>


                <p id="balance_view"></p>
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                          
                <div class="form-group row">
                  <label class="col-sm-12 col-form-label">Notes</label>
                  <div class="col-sm-12">
                    <textarea class="form-control" rows="4" id="notes" ng-disabled="true">{{notes}}</textarea>
                  </div>
               </div>



                                                     


                                                              
                                                              
                                                            
                                                           
                                                            <div class="row" style="margin: 20px -9px;">
                                                          
                                                            
                                                            <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                     <input type="hidden" id="l_id" >
                                                                

 <!-- <button type="submit" class="btn btn-success w-md"  id="approved" style="float: right;"  ng-click="statusupdate('0','Discount Approved')" id="UpdateCommsision">APPROVED</button> -->

 <!-- <button type="submit" class="btn btn-primary w-md"    ng-click="statusupdate('148','Discount Rejected')">REJECTED</button> -->



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

app.filter('indianCurrency', function () {
    return function (input) {
        if (isNaN(input)) return input;
        var formattedValue = parseFloat(input);
        // console.log(input.toLocaleString('en-IN').toFixed(2));
         var decimal =  formattedValue.toLocaleString('en-IN', {   minimumFractionDigits: 2, maximumFractionDigits: 2 });

        return decimal

    };
});

app.filter('number', function () {        
    return function (input) {
        if (! isNaN(input)) {
            var currencySymbol = '';
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

app.directive('autoComplete', function($timeout) {
    return function(scope, iElement, iAttrs) {
            iElement.autocomplete({
                source: scope[iAttrs.uiItems],
                select: function() {
                    $timeout(function() {
                      iElement.trigger('input');
                    }, 0);
                }
            });
        };
    });

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;

    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    
    $scope.tablename='orders_process';
    $scope.discount_status = undefined;
    $scope.pageTapName= 1;
    $scope.formData={};
    getData();




   function getData() {
       
      var order_base = $('#order_base').val();
      var edit_by=$('#edit_by').val();
      

     $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_md_approved_request?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=all_ledgers' + '&edit_by=' + edit_by+'&order_base=20' + '&discount_status=0' + '&excess_status=' + $scope.excess_status)
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
    
    
    
    
 $scope.pageTab = function(tablename,status,name){
// console.log(discount_status)
$scope.pageTapName = name;
$scope.discount_status = undefined;
$scope.excess_status  = undefined;
$scope.tablename = tablename;

      if(name =='Discount')
      {
        $scope.discount_status = 0;
         $('.disshowbtn').show();
      }
      else if(name =='Excess'){
        $scope.excess_status =1;
      }
      else
      {
        $('.disshowbtn').hide(); 
      }

      if(status==121)
      {
         $('.showbtn').show();
      }
      else
      {
        $('.showbtn').hide(); 
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
         
         
         
        //$scope.tablename='orders_process';
        var order_base = $('#order_base').val();
          var edit_by=$('#edit_by').val();
        
        $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_md_approved_request?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&edit_by=' + edit_by +'&order_base='+order_base+ '&discount_status=' + $scope.discount_status +'&excess_status=' + $scope.excess_status)
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






$scope.viewAddress = function(id){
    
   $scope.hidden_id=id;
   $('#exampleModalScrollable_1').modal('toggle');
    
 
   $scope.fetchDataaddress(id);
   $scope.fetchDataproducts(id);
  
    
};



 $scope.fetchDataproducts = function(id){
      
     $http.get('<?php echo base_url() ?>index.php/order/oder_return_fetch_cp_products?id='+id).success(function(data){
      
      
       $scope.namesDataproducts = data;
      
       
     });
        
   };
  
     $scope.fetchDataaddress = function(id){
      
     $http.get('<?php echo base_url() ?>index.php/order/oder_return_fetch_cp_remarks_fetch?id='+id).success(function(dataaddress){
      
      
       $scope.namesDataaddress = dataaddress;
      
       
     });
        
   };




$scope.mdapproved = function(status,reason,mdstatus){
    
    
                    var id=$('#payment_order_id').val();
                    var result=1;
                    
                   
                    if(result==1)
                   {
                      $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/order_md_approved",
                        data:{'order_id':id,'reason':reason,'status':status,'order_no':id,'mdstatus':mdstatus,'deleteid':status, 'action':'Deletesub','tablenamemain':'orders_process','tablename_sub':'order_product_list_process'}
                      }).success(function(data){
                       
                           getData();
                           
                           if(mdstatus==1)
                           {
                                alert('Approved');    
                           }
                           else
                           {
                                alert('Rejected');    
                           }
                          
                           $('#firstmodalcommison').modal('toggle');
                      }); 
                   }
};
  

 
 

 $scope.statusupdate = function(status,statusname)
{
          


                                  $('#UpdateCommsision').hide();  
                                  var id= $('#l_id').val();
                                  var amount_set= $('#amount_set_2').val();
                                  var notes= $('#notes').val();
                                  var net_balance= $('#net_balance').val();


            

                                   $http({
                                    method:"POST",
                                    url:"<?php echo base_url() ?>index.php/accountheads/statusupdate_discount",
                                    data:{

                                        'id':id,
                                        'status':status,
                                        'amount_set':amount_set,
                                        'notes':notes,
                                        'statusname':statusname,
                                        'net_balance':net_balance
                                       

                                    }
                                    }).success(function(data)
                                    {
                                      
                                  
                                          alert(statusname);
                                          $('#firstmodalcommisonparty').modal('toggle');    
                                          $scope.fetchDatagetlegderGroup(1);
                                
                                    });
                    











 }

 $scope.onviewparty_edit_new = function(l_id,id,name,dc,cc)
{
 

 
    
    if(dc>0)
    {
        var amount=dc;
    }
    else
    {
        var amount=cc;
    }



    $('#amount_set_2').val(amount);




    $('#l_id').val(l_id);
    $('#getbankdata').show();  
    $('#firstmodalcommisonparty').modal('toggle');
    


     $http({
      method:"POST",
      url:"<?php echo base_url(); ?>index.php/report/fetch_single_data_by",
      data:{'id':l_id, 'action':'fetch_single_data','tablename':'all_ledgers'}
      }).success(function(data){
      
     
           $scope.notes =data.notes;

           $('#net_balance').val(data.net_balance);
           if(data.blance_text!=null)
           {

              $('#balance_view').show();
              $('#balance_view').text('BALANCE : '+ data.blance_text);
              $('#exampleModalToggleLabelset').html(name+' | Net Balance : '+data.net_balance);

           }
           else
           {
             $('#balance_view').hide();
           }




           if(amount>0)
           {
                  $('#approved').show();
              
           }
           else
           {
                   $('#approved').hide();
           }





      });



    
};


$('#amount_set_2').on('input',function()
{
      
      var val=parseInt($(this).val());
      var net_balance=parseInt($('#net_balance').val());
      var net_balance=Math.abs(net_balance);
     

    
      if(val>net_balance)
      {
           
           alert('Value too high');
           $(this).val('');
      }
      else
      {
          if(val>0)
          {
              var total=net_balance-val;
              $('#balance_view').text('BALANCE : '+ total);
          }
      }
     

     
      
  });

  
$scope.excess_edit_new = function(id,customer_id,name,totalsum,net_balance){
  // name.id,name.customer_id,name.name,name.totalsum
  // console.log(id)
     $scope.excessCusName = name;
    $scope.excessCusBalance = net_balance;
    $scope.id = id;
  $('#excessEditData').modal('toggle');

  $http({
      method:"POST",
      url:"<?php echo base_url(); ?>index.php/report/fetch_single_data_by",
      data:{'id':id, 'action':'fetch_single_data','tablename':'all_ledgers'}
      }).success(function(data){


        // console.log(data.bank_details)

//         angular.forEach(data.bank_details, function(bank_data){
// console.log(bank_data)
//         })
            
             $scope.id = data.id;
             $scope.customer_id= data.customer_id;
             $scope.selectedBank = data.excess_bank_id;
             $scope.amount_set = data.totalsum;
             $scope.payment_date = new Date(data.c_payment_date);
              $scope.remarks = data.notes;
             $scope.party_type1 = data.party_type1;
             $scope.party_type2 = data.party_type2;
             $scope.party_type3 = data.party_type3;
             $scope.party_type4 = data.party_type4;
             $scope.party_type5 = data.party_type5;

             $scope.value1 = data.value1;
             $scope.value2 = data.value2;
             $scope.value3 = data.value3;
             $scope.value4 = data.value4;
             $scope.value5 = data.value5;
            $scope.gst     = parseInt(data.gstamount);
            $scope.party1 = data.remarks1;
            $scope.party2 = data.remarks2;
            $scope.party3 = data.remarks3;
            $scope.party4 = data.remarks4;
            $scope.party5 = data.remarks5;
            $scope.bank_amount = data.bank_amount;
            $scope.party6 = data.beneficiary_name;
            $scope.account_no       =  data.account_no;
            $scope.ifsc_code        =  data.ifsc_code;
            $scope.notes       = data.bank_notes;
            $scope.md_verification = data.md_verification

// console.log($scope.md_verification)


          
             $('#totalsum').text(data.totalsum);

               



        

      });
}

  $scope.getBalance = function(netbalance){
    // console.log(Math.abs(netbalance))



    if(Math.abs(netbalance)  >=  $scope.amount_set)
    {
        $scope.excessBalanceAmd =  Math.abs(netbalance) - $scope.amount_set;
        $('#approved').show();
    
    }
    else
    {
        alert("Please enter an amount that is lower than the net balance.");
        $('#amount_set').val('');
        $('#approved').hide();
    }
  
  }


$scope.getcount = function (tabelename) {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/getcounttl_md_approvel_request?tablename="+tabelename,
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.discount = data.discount;
            $scope.commission =  data.commission;
            $scope.cancel =  data.cancel;
            $scope.edit =  data.edit;
            $scope.excess_payment =  data.excess_payment;
            $scope.driver_return =  data.driver_return;
            $scope.approvel_order =  data.approvel_order;
            $scope.rejected_order =  data.rejected_order;
            $scope.super_admin =  data.super_admin;
            $scope.discount_form_nb =  data.discount_form_nb;
            $scope.discount_form_rj =  data.discount_form_rj;
            $scope.excess_return = data.excess_return;

    });



}

});

</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>


