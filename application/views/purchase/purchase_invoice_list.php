<?php 
include "header.php"; 
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
                                            <h4 class="mb-sm-0 font-size-18">Purchase Invoice List</h4>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        
                                       
                            
                                            
                                        <div class="d-flex justify-content-end gap-2 flex-wrap">
                                            
                                            
                                          
                                            <div class="btn-group">
                                                <a href="javascript:void(0)" ng-click="newComplaintcreate()" class="btn btn-secondary dropdown-toggle"><i class="mdi mdi-plus"></i> Create Invoice</a>
                                                
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
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('purchase_invoice')">
                                                     
                                                      <li class="nav-item">
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('purchase_invoice',0)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">OPEN INVOICE<span class="badge rounded-pill bg-primary  float-end">  {{totalItems}} </span></span> 
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('purchase_invoice',1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">PAID INVOICE<span class="badge rounded-pill bg-success float-end"> {{proceed}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('purchase_invoice',4)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">PARTIAL INVOICE<span class="badge rounded-pill bg-success float-end"> {{partial}} </span></span>   
                                                         </a>
                                                      </li>
                                                     
                                                     
                                                       
                                                    <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('purchase_invoice',2)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">SCHEDULE INVOICE<span class="badge rounded-pill bg-primary float-end"> {{po}} </span></span>   
                                                         </a>
                                                      </li>
                                                        
                                                      <!--<li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('purchase_invoice',3)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">INWARD INVOICE<span class="badge rounded-pill bg-success float-end"> {{payment_vendor}} </span></span>   
                                                         </a>
                                                      </li>-->
                                                     
                                                      
                                                      
                                                      
                                                      
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
                                                                          <th>PO NO</th>
                                                                          <th>Invoice No</th>
                                                                          <th>Invoice Date</th>
                                                                          <th >Vendors</th>
                                                                          <th>QTY</th>
                                                                          <th>Invoice Amount</th>
                                                                          <th>Loading Charge</th>
                                                                          <th>Paid Amount</th>
                                                                          <th>Pending Amount</th>
                                                                          <th>Remarks</th>
                                                                          <th>Create By</th>
                                                                          <th>Create Date</th>
                                                                          <th>File</th>
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
                                                                              
                                                                             
                                                                               {{name.po_number}}
                                                                              
                                                                             
                                                                              
                                                                         </td>
                                                                          
                                                                          <td>
                                                                              
                                                                             
                                                                              {{name.invoice_no}}
                                                                              
                                                                             
                                                                              
                                                                         </td>
                                                                          
                                                                          
                                                                          
                                                                          <td>{{name.invoice_date}} </td>
                                                                            
                                                                          <td style="width:150px;font-size:10px;">{{name.vendor_id}}</td>
                                                                          <td>{{name.qty}}</td>
                                                                          <td>{{name.invoice_amount_data | number}}</td>


                                                                          <td>{{name.loading_charges}}</td>

                                                                          
                                                                          <td>{{name.payout_amount | number}}</td>
                                                                          
                                                                          <td>{{name.pending_amount | number}}</td>
                                                                          
                                                                          
                                                                          <td> 
                                                                          
                                                                          <span ng-if="name.order_base==1">
                                                                          {{name.delivery_status_row}}
                                                                          </span>
                                                                          <span ng-if="name.order_base!=1">
                                                                          {{name.remarks}}
                                                                          </span>
                                                                          
                                                                          </td>
                                                                          <td>{{name.order_by}}</td>
                                                                          <td>{{name.create_date}}</td>
                                                                          <td>
                                                                          <a href="{{name.attachment}}" ng-if="name.attachment!='#'" target="_blank" class="ng-scope"><i class="mdi mdi-download font-size-16 text-success me-1"></i> File</a>
                                                                          </td>
                                                                          <td>
                                                                              
                                                                              
                                                                              
                                                                              
                                                                               
                                                                             <a target="_blank"  ng-if="name.extra_invoice_status==0" href="<?php echo base_url(); ?>index.php/purchase/invoice?order_id={{name.order_id}}&invoice_id={{name.id}}&invoice_no={{name.invoice_no}}&old_tablename=0&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process"  ><i class="mdi mdi-map font-size-16 text-danger me-1"></i> Invoice</a>
                                                                               
                                                                             <a target="_blank" ng-if="name.extra_invoice_status==1" href="<?php echo base_url(); ?>index.php/purchase/invoice_extra?order_id={{name.order_id}}&invoice_id={{name.id}}&invoice_no={{name.invoice_no}}&old_tablename=0&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process"  ><i class="mdi mdi-map font-size-16 text-danger me-1"></i> Freight Invoice</a>
                                                                             
                                                                             <!-- <span ng-if="name.order_base==1">
                                                                              <a href="<?php echo base_url(); ?>index.php/purchase/po_inward?order_id={{name.id}}&old_tablename=0&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process"   target="_blank"><i class="mdi mdi-upload font-size-16 text-success me-1"></i> Inward</a>
                                                                              </span>-->
                                                                                
                                                                               <span ng-if="name.order_base==0 || name.order_base==2">


                                                                                    <a href="#"  ng-click="viewAddressUpdate(name.id,name.invoice_amount,name.invoice_no,name.invoice_date,name.remarks)"><i class="mdi mdi-pencil  font-size-16 text-danger me-1"></i> Edit</a>
                                                                               




                        <?php
                        // Shop Team
                        $usergroup=array(1,2); 
                        if(in_array($this->session->userdata['logged_in']['access'],$usergroup))
                        {
                                                        
                        ?> 
                                                                               
                                                                               <a href="#"  ng-click="deleteData(name.id)"><i class="mdi mdi-delete font-size-16 text-danger me-1"></i> Delete</a>




                        <?php
                        }
                        ?>










                                                                               <a href="#"  ng-click="viewAddress(name.id,name.invoice_amount)"><i class="mdi mdi-file font-size-16 text-success me-1"></i> Payout</a>
                                                                                
                                                                                </span>
                                                                                <span ng-if="name.order_base==4">
                                                                                   
                                                                               
                                                                               
                                                                               <a href="#"  ng-click="viewAddress(name.id,name.invoice_amount)"><i class="mdi mdi-file font-size-16 text-success me-1"></i> Payout</a>
                                                                                
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
   
   
   
   
   
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Create Invoice</h5>
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
                            <label class="col-sm-12 col-form-label">Search Vendor <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="autocomplete" class="form-control" required name="autocomplete" ng-keyup="completeProduct()" ng-blur="getPurchaseorderid()"  placeholder="Search Vendor"  type="text">
                            </div>
                          </div>
                        </div>
                      
            
                       
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">PO No <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                                
                                <select class="form-control"  id="po_no" required name="po_no" ng-change="getProductlist()" ng-model="po_no">
                                    <option value="">Select PO</option>
                                    <option ng-repeat="namesorder in namesDataproductorderno" value="{{namesorder.id}}"> {{namesorder.order_no}} </option>
                                </select>
                              
                            
                            
                            </div>
                          </div>
                        </div>
                      
                        
                      
                        
                          <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice No <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="inovice_no" class="form-control" ng-blur="invoiceNocheck()" plaseholder="Enter the invoice no"  name="inovice_no" required ng-model="inovice_no" type="test2">
                            </div>
                          </div>
                        </div>
                        
                        
                          <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice Attachment <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                            <input type="file" style="padding:9px;" file-input="files" required class="form-control"  id="fileupload2">
                            </div>
                          </div>
                        </div>
                      
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice Date <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="return_date" class="form-control"  name="create_date" required ng-model="create_date" type="date">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice Amount <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="invoice_amount" class="form-control"  readonly name="invoice_amount" required ng-model="invoice_amount" type="text">
                            </div>
                          </div>
                        </div>
                        
                         <div  class="col-md-12" id="showdata" ng-show="namesDataproduct.length>0">
                                                              
                                                                <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         <th>#</th>
                                                                        
                                                                         <th>Product Name</th>
                                                                         <td>UNIT</td>
                                                                         <td>QTY</td>
                                                                         <th>Base Price</th>
                                                                         <th>Total Amount
                                                                             <input type="hidden" id="totalextra" value="{{totalextra}}">
                                                                         </th>
                                                                     </tr>
                                                                     <tr  ng-repeat="namesp in namesDataproduct">
                                                                     
                                                                         <td><input type="checkbox" class="purchase_order_product_id" name="purchase_order_product_id" value="{{namesp.inward_id}}" data-set="{{namesp.inward_id}}" data-stock="{{namesp.id}}"></td>
                                                                         
                                                                         <td>{{namesp.product_name}}</td>
                                                                          <td>{{namesp.unit}}</td>
                                                                         <td><input type="textt" value="{{namesp.totalqty}}" id="qty_{{namesp.inward_id}}"  class="form-control purchase_qty" data-set="{{namesp.inward_id}}" name="purchase_qty" ></td>
                                                                        
                                                                        <td><input type="textt" value="{{namesp.rate}}" id="price_{{namesp.inward_id}}"  class="form-control price" data-set="{{namesp.inward_id}}" name="price" ></td>
                                                                        <td  class="totalv" id="dd_{{namesp.inward_id}}"> {{namesp.rowtotal}}</td>
                                     
                                     
                                     
                                      <script>
                                     $(document).ready(function()
                                     {
                                          
                                                           $('.price').on('input',function () {
          
                                                                                        var val= $(this).val();
                                                                                        var id= $(this).data('set');
                                                                                        var qty= $('#qty_'+id).val();
                                                                                        var totl=qty*val;
                                                                                        var totl=totl.toFixed(2);
                                                                                        $('#dd_'+id).html(totl);
                                                                                         var totalextra= 0;
                                                                                         var sum = 0
                                                                                         $('.totalv').each(function () {
                                                                                             
                                                                                                    
                                                                                                if($(this).html()=='')
                                                                                                {
                                                                                                    var combat = 0;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                     var combat = parseFloat($(this).html());
                                                                                                }
                                                                                                    
                                                                                               sum += parseFloat(combat);
                                                                                               
                                                                                             
                                                                                       });
                                                                                       
                                                                                        var totalsum=sum+totalextra;
                                                                                       var totalgst=totalsum*18/100;
                                                                                       var totalgst=totalgst;
                                                                                       var sumva=totalsum.toFixed(2);
                                                                                       $('#totalamount').html(sumva);
                                                                                       
                                                                                      
                                                                                       var Totalss=totalgst.toFixed(2);
                                                                                       
                                                                                       $('#gst').html(Totalss);
                                                                                       
                                                                                       
                                                                                     
                                                                                       
                                                                                       var Total=totalgst+totalsum;
                                                                                       
                                                                                       var Total=Total.toFixed(2);
                                                                                       
                                                                                       $('#totalamountgst').html(Total);
                                                                                        $('#invoice_amount').val(Total);
            
           
                                                                                    
                                                           });
                                                           
                                                           $('.purchase_qty').on('input',function () {
          
                                                                                        var val= $(this).val();
                                                                                        var id= $(this).data('set');
                                                                                        var qty= $('#price_'+id).val();
                                                                                        var totl=qty*val;
                                                                                        var totl=totl.toFixed(2);
                                                                                        $('#dd_'+id).html(totl);
                                                                                        var totalextra= 0;
                                                                                        
                                                                                         var sum = 0
                                                                                         $('.totalv').each(function () {
                                                                                             
                                                                                                    
                                                                                                if($(this).html()=='')
                                                                                                {
                                                                                                    var combat = 0;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                     var combat = parseFloat($(this).html());
                                                                                                }
                                                                                                    
                                                                                               sum += parseFloat(combat);
                                                                                               
                                                                                             
                                                                                       });
                                                                                       
                                                                                       var totalsum=sum+totalextra;
                                                                                       var totalgst=totalsum*18/100;
                                                                                       var totalgst=totalgst;
                                                                                       var sumva=totalsum.toFixed(2);
                                                                                       $('#totalamount').html(sumva);
                                                                                       
                                                                                      
                                                                                       var Totalss=totalgst.toFixed(2);
                                                                                       
                                                                                       $('#gst').html(Totalss);
                                                                                       
                                                                                       
                                                                                   
                                                                                       
                                                                                       var Total=totalgst+totalsum;
                                                                                       var Total=Total.toFixed(2);
                                                                                       
                                                                                       $('#totalamountgst').html(Total);
                                                                                       $('#invoice_amount').val(Total);
            
           
                                                                                    
                                                           });
                                                           
                                                           
                                    });
                                     </script>
                                                                     </tr>
                                                                     
                                                                     
                                                                     
                                                                      <tr ng-if="totalextra!=0" style="display:none;">
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Extra </td>
                                                                         <td>{{totalextra}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Sub Total </td>
                                                                         <td id="totalamount">{{subtotal}}</td>
                                                                     </tr>
                                                                     
                                                                    
                                                                     
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>GST 18 % </td>
                                                                         <td id="gst">{{gstamount}}</td>
                                                                     </tr>
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Total </td>
                                                                         <td id="totalamountgst">{{fulltotal}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>




                                          <div class="col-md-12" style="text-align: right;">
                                                <div class="d-flex align-items-center">
                                                   <div class="flex-grow-1">
                                                       <p>Round Off :<input type="text"  class="roundoff" id="roundoff" >
                                                                                    
                                                          <label for="set1"><input type="radio" name="convertPlus" checked value="1" id="set1"> <b style="font-size: 20px;">+</b> </label>
                                                          <label for="set2"><input type="radio" name="convertPlus" value="0" id="set2"> <b style="font-size: 20px;">-</b> </label>
                                                                                     
                                                      </p>
                                                   </div>
                                                </div>
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
                            
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" id="payment_create" value="CREATE">
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
                                                                <h5 class="modal-title" id="myLargeModalLabel">Invoice Payout</h5>
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

   <div ng-init="fetchDataaddress()" ng-show="namesDataaddress.length>0">
                                                      <h3>Product View</h3>
                                                                
                                                                <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         <th>No</th>
                                                                         <th>Product Name</th>
                                                                          <td>UNIT</td>
                                                                         <td>QTY</td>
                                                                         <td>Price</td>
                                                                         <td>Total Amount</td>
                                                                     </tr>
                                                                     <tr  ng-repeat="names in namesDataaddress">
                                                                         <th>{{names.no}}</th>
                                                                         <th>{{names.product_name}}</th>
                                                                         <th>{{names.unit}}</th>
                                                                         <td>{{names.qty}}</td>
                                                                         <td>{{names.price | number}}</td>
                                                                         <td>{{names.row_total  | number}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                     
                                                                      <tr ng-if="invoice_totalextra!=0" style="display:none;">
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Extra </td>
                                                                         <td> {{invoice_totalextra | number}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Sub Total </td>
                                                                         <td> {{invoice_subtotal | number}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr ng-if="loading_charges>0">
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Loading Charges </td>
                                                                         <td>{{loading_charges | number}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>GST 18 % </td>
                                                                         <td>{{invoice_gstamount | number}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr ng-if="invoice_tcsamount>0">
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>TCS </td>
                                                                         <td> {{invoice_tcsamount | number}}</td>
                                                                     </tr>

                                                                       <tr ng-if="roundoffset>0">
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Round Off </td>
                                                                         <td>{{roundoffset | number}} {{convert_status}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Total </td>
                                                                         <td> {{invoice_fulltotal | number}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>



                       <div class="row">
                           
                           
                        
            
                           <div class="form-group col-md-6">
                           <label class="col-sm-12 col-form-label">Amount <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                            <input type="text"   style="padding:9px;" class="form-control" required  id="vendor_amount">                            
                            </div>
                             </div>
                             
                             
                             <div class="form-group col-md-6">
                                   <label class="col-sm-12 col-form-label">Payment Type <span style="color:red;">*</span></label>
                                    <div class="col-sm-12">
                                     <select class="form-control" name="payment_type" required id="payment_type">
                                     <option value="Full">Full</option>
                                     <option value="Partial">Partial Payment</option>
                                     <option value="Schedule Payment">Schedule Payment</option>
                                     </select>                          
                                    </div>
                             </div>
                       
                           <div class="form-group col-md-6" id="displaySchedule" style="display:none;">
                           <label class="col-sm-12 col-form-label">Schedule Date <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                            <input type="date"   style="padding:9px;" class="form-control"   id="schedule_date">                            
                            </div>
                             </div>
                             
                             
                              <div class="form-group col-md-6 schedule">
                           <label class="col-sm-12 col-form-label">Payment Mode <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                           <select class="form-control" name="payment_mode_payoff"  id="payment_mode_payoff">
                                                                      
                                                                        <option value="">Select Mode</option>
                                                                       <option value="Petty Cash">Petty Cash</option>
                                                                       <option value="Cheque">Cheque</option>
                                                                       <option value="NEFT/RTGS">NEFT/RTGS</option>
                                                                      
                         </select>                   
                            </div>
                             </div>
                             
                             
                             
                               <div id="bankaccountshow" class="form-group col-md-6" style="display:none;">
                           <label class="col-sm-12 col-form-label" id="base_title">Bank Account <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             
                                                                  <select class="form-control" name="bankaccount"  ng-change="Getbankaccount()" ng-model="getbank" id="bankaccount">
                                                                      
                                                                      
                                                                      <option value="0">Select Account</option>
                                                                      
                                                                  </select>
                                                                  
                                                                   <span ng-if="account_no"> <b> Available Balance : {{current_amount | number}}</b></span>                    
                            </div>
                             </div>
                             
                             
                               <div class="form-group col-md-6 schedule">
                              <label class="col-sm-12 col-form-label">Delivery Status <span style="color:red;">*</span></label>
                              <div class="col-sm-12">
                              <select class="form-control" name="delivery_status"  id="delivery_status">
                                                             
                                         <option value="">Select</option>     
                                         <option value="3">Partial Dispatch</option>
                                         <option value="5">Dispatch</option>
                                         <option value="6">Delivered</option> 
                                        
                                                                              
                                </select>                          
                            </div>
                  </div>
                  
                  
                                <div class="form-group col-md-6 schedule">
                              <label class="col-sm-12 col-form-label">PayOut Date <span style="color:red;">*</span></label>
                              <div class="col-sm-12">
                                <input type="date" id="payout_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">                      
                            </div>
                   </div> 



                           <div class="form-group col-md-6" style="display:none;">
                                  <label class="col-sm-12 col-form-label">Coil Number </label>
                                  <div class="col-sm-12">
                                    <input type="text" id="coil_no" class="form-control">                      
                                </div>
                           </div> 

                        
                           <div class="col-md-12">
                              <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Narration <span style="color:red;">*</span></label>
                                <div class="col-sm-12">
                                    <textarea rows="4"  id="remarks_2" class="form-control"  name="remarks_2"   required ng-model="remarks_2"></textarea>
                                
                                </div>
                              </div>
                            </div>

                    
                      
                     
                        
                        

                        
                     
                  
                        
                     
                        
                               
                        
                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                              <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" id="payoutbutton" type="submit" value="PAYOUT">
                            </div>
                        </div>



                      </div>



                       



                                               
                      


                    </form>


                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->



        </div>
    </div>





<div class="modal fade" id="exampleModalScrollable_2" tabindex="-1" role="dialog"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Invoice Update</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               
                                                               
                                                              
                                                                
                                                                 <form  ng-submit="submitForm_2()" method="post" enctype="multipart/form-data">
                    
                    
                    
                    
                    
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
                            <label class="col-sm-12 col-form-label">Invoice No <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="inovice_no2" class="form-control"   name="inovice_no" required  type="test2">
                            </div>
                          </div>
                        </div>

                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice Attachment </label>
                            <div class="col-sm-12">
                            <input type="file" style="padding:9px;" file-input="files"  class="form-control"  id="fileupload3">
                             <a href="<?php echo base_url(); ?>{{attachment}}" ng-if="attachment" target="_blank">File</a>
                            </div>
                          </div>
                        </div>


                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice Date <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="invoice_date2" class="form-control"  name="create_date" required  type="date">
                            </div>
                          </div>
                        </div>
                        

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice Amount <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="invoice_amount2" class="form-control"  readonly name="invoice_amount"  type="text">
                            </div>
                          </div>
                        </div>


                          <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Loading Charges </label>
                            <div class="col-sm-12">
                             <input id="loading_charges" class="form-control"   name="loading_charges"  type="text">
                            </div>
                          </div>
                        </div>


                     <div ng-init="fetchDataaddress()" ng-show="namesDataaddress.length>0">



                           <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         <th>#</th>
                                                                        
                                                                         <th>Product Name</th>
                                                                         <td>UNIT</td>
                                                                         <td>QTY</td>
                                                                         <th>Base Price</th>
                                                                         <th>Total Amount
                                                                             <input type="hidden" id="totalextra" value="{{totalextra}}">
                                                                         </th>
                                                                     </tr>
                                                                     <tr  ng-repeat="names in namesDataaddress">
                                                                     
                                                                         <td><input type="checkbox" checked class="purchase_order_product_id2" name="purchase_order_product_id2" value="{{names.id}}" data-set="{{names.id}}" data-stock="{{names.id}}"></td>
                                                                         
                                                                         <td>{{names.product_name}}</td>
                                                                         <td>{{names.unit}}</td>
                                                                         <td><input type="textt" value="{{names.qty}}" id="qty2_{{names.id}}"  class="form-control purchase_qty2" data-set="{{names.id}}" name="purchase_qty" ></td>
                                                                        
                                                                        <td><input type="textt" value="{{names.price}}" id="price2_{{names.id}}"  class="form-control price2" data-set="{{names.id}}" name="price" ></td>
                                                                        <td  class="totalv2" id="dd2_{{names.id}}"> {{names.row_total | number}}</td>
                                     
                                     
                                           <script>
                                     $(document).ready(function()
                                     {
                                          
                                                           $('.price2').on('input',function () {



          
                                                                                        var val= $(this).val();
                                                                                        var id= $(this).data('set');


                                                                                        var qty= $('#qty2_'+id).val();




                                                                                        var totl=qty*val;
                                                                                        var totl=totl.toFixed(2);

  

                                                                                        $('#dd2_'+id).html(totl);
                                                                                         var totalextra= 0;
                                                                                         var sum = 0
                                                                                         $('.totalv2').each(function () {
                                                                                             
                                                                                                    
                                                                                                if($(this).html()=='')
                                                                                                {
                                                                                                    var combat = 0;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                     var combat = parseFloat($(this).html());
                                                                                                }
                                                                                                    
                                                                                               sum += parseFloat(combat);
                                                                                               
                                                                                             
                                                                                       });


                                                                                       
                                                                                        var totalsum=sum+totalextra;
                                                                                       var totalgst=totalsum*18/100;
                                                                                       var totalgst=totalgst;
                                                                                       var sumva=totalsum.toFixed(2);
                                                                                       $('#totalamount2').html(sumva);
                                                                                       
                                                                                      
                                                                                       var Totalss=totalgst.toFixed(2);
                                                                                       
                                                                                       $('#gst2').html(Totalss);
                                                                                       
                                                                                       
                                                                                     
                                                                                       
                                                                                       var Total=totalgst+totalsum;
                                                                                       
                                                                                       var Total=Total.toFixed(2);
                                                                                       
                                                                                        $('#totalamountgst2').html(Total);
                                                                                        $('#invoice_amount2').val(Total);
            
           
                                                                                    
                                                           });
                                                           
                                                           $('.purchase_qty2').on('input',function () {
          
                                                                                        var val= $(this).val();
                                                                                        var id= $(this).data('set');
                                                                                        var qty= $('#price2_'+id).val();
                                                                                        var totl=qty*val;
                                                                                        var totl=totl.toFixed(2);
                                                                                        $('#dd2_'+id).html(totl);
                                                                                        var totalextra= 0;
                                                                                        
                                                                                         var sum = 0
                                                                                         $('.totalv2').each(function () {
                                                                                             
                                                                                                    
                                                                                                if($(this).html()=='')
                                                                                                {
                                                                                                    var combat = 0;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                     var combat = parseFloat($(this).html());
                                                                                                }
                                                                                                    
                                                                                               sum += parseFloat(combat);
                                                                                               
                                                                                             
                                                                                       });
                                                                                       
                                                                                       var totalsum=sum+totalextra;
                                                                                       var totalgst=totalsum*18/100;
                                                                                       var totalgst=totalgst;
                                                                                       var sumva=totalsum.toFixed(2);
                                                                                       $('#totalamount2').html(sumva);
                                                                                       
                                                                                      
                                                                                       var Totalss=totalgst.toFixed(2);
                                                                                       
                                                                                       $('#gst2').html(Totalss);
                                                                                       
                                                                                       
                                                                                   
                                                                                       
                                                                                       var Total=totalgst+totalsum;
                                                                                       var Total=Total.toFixed(2);
                                                                                       
                                                                                       $('#totalamountgst2').html(Total);
                                                                                       $('#invoice_amount2').val(Total);
            
           
                                                                                    
                                                           });
                                                           
                                                           
                                    });
                                     </script>
                                
                                                                     </tr>
                                                                     
                                                                     
                                                                     
                                                                      <tr ng-if="invoice_totalextra!=0" style="display:none;">
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Extra </td>
                                                                         <td>{{invoice_totalextra  | number}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Sub Total </td>
                                                                         <td id="totalamount2">{{invoice_subtotal  | number}}</td>
                                                                     </tr>


                                                                    
                                                                     
                                                                    
                                                                     
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>GST 18 % </td>
                                                                         <td id="gst2">{{invoice_gstamount  | number}}</td>
                                                                     </tr>

                                                                       <tr ng-if="invoice_tcsamount>0">
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>TCS </td>
                                                                         <td> {{invoice_tcsamount  | number}}</td>
                                                                     </tr>
                                                                       <tr ng-if="loading_charges>0">
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Loading Charges </td>
                                                                         <td>{{loading_charges  | number}}</td>
                                                                     </tr>


                                                                   <tr ng-if="roundoffset>0">
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Round Off </td>
                                                                         <td> {{roundoffset}} {{convert_status}}</td>
                                                                     </tr>




                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Total </td>
                                                                         <td id="totalamountgst2">{{invoice_fulltotal  | number}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 

                     </div>
                             
                          
                      <div class="col-md-12" style="text-align: right;">
                                                <div class="d-flex align-items-center">
                                                   <div class="flex-grow-1">
                                                       <p>Round Off :<input type="text"  class="roundoff2" id="roundoff2" >
                                                                                    
                                                          <label for="set12"><input type="radio" name="convertPlus2" checked value="1" id="set12"> <b style="font-size: 20px;">+</b> </label>
                                                          <label for="set22"><input type="radio" name="convertPlus2" value="0" id="set22"> <b style="font-size: 20px;">-</b> </label>


                                                                                     
                                                      </p>
                                                   </div>
                                                </div>
                      </div>

                        
                     
                                
                       <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Remarks</label>
                            <div class="col-sm-12">
                                <textarea rows="4"  id="remarks2" class="form-control"  name="remarks2">  </textarea>
                            
                            </div>
                          </div>
                        </div>

                    
                      
                     
                               
                        
                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                              <input type="hidden" id="hidden_id2" value="{{hidden_id2}}" />
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" id="updatebutton" type="submit" value="UPDATE">
                            </div>
                        </div>



                      </div>



                       



                                               
                      


                    </form>


                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->



        </div>

































<script>
$(document).ready(function(){
    
    
    
    
    
    
    
    
    
    
    
    
    
      $('#payment_type').on('change',function(){
      
      var val=$(this).val();
      
      if(val=='Schedule Payment')
      {
          
          $('#displaySchedule').show();
          $('#rowdisplayset').hide();
          $('.schedule').hide();
          $('#payment_mode_payoff').prop('required',false);
          
          
      }
      else if(val=='Partial')
      {
          
            $('#displaySchedule').hide();
            $('#rowdisplayset').show();
            $('.schedule').show();
            $('#payment_mode_payoff').prop('required',true);
            $('#displayParicelqty').show();
          
      }
      else
      {
            $('#displaySchedule').hide();
            $('#rowdisplayset').show();
             $('.schedule').show();
            $('#payment_mode_payoff').prop('required',true);
      }

});
      



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
      if(val=='Petty Cash')
      {
          
          $('#base_title').html('Cash Account');
          var data='<?php foreach($bankaccount as $val) { if($val->id==24) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
          $('#res_no').show();
          $('#bankaccountshow').show();
          
      }
      
  });

    
    
    
    
    
    
    
    
    
    
    
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


app.directive("fileInput", function($parse){  
                    return{  
                         link: function($scope, element, attrs){  
                              element.on("change", function(event){  
                                   var files = event.target.files;  
                                   $parse(attrs.fileInput).assign($scope, element[0].files);  
                                   $scope.$apply();  
                              });  
                         }  
                    }  
});  




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
 $scope.getbank=0
    


$scope.create_date=new Date();


    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    
    $scope.tablename='purchase_invoice';
    getData();



   function getData() {
       
      var order_base = $('#order_base').val();
      
      
     $http.get('<?php echo base_url() ?>index.php/purchase/fetch_data_invoice_table?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base)
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

 
 
 
 
 
 
$scope.Getbankaccount = function () {
      
     
      
           var getbank=$('#bankaccount').val();
      
           $http({
		      method:"POST",
		      url:"<?php echo base_url() ?>index.php/bankaccount/fetch_single_data",
		      data:{'id':getbank, 'action':'fetch_single_data','tablename':'bankaccount'}
		    }).success(function(data){
		        
		        
		         $scope.bank_name = data.bank_name;
		         $scope.type = data.type;
		         $scope.account_no = data.account_no;
		         $scope.ifsc_code = data.ifsc_code;
		         $scope.current_amount = data.current_amount;
		         
		        
		     
		    });
      
      
       
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
         
         
         
        $scope.tablename='purchase_invoice';
        var order_base = $('#order_base').val();
        
        $http.get('<?php echo base_url() ?>index.php/purchase/fetch_data_invoice_table?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&order_base='+order_base)
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



   $scope.invoiceNocheck=function(){ 
           
                           var inovice_no = $('#inovice_no').val();


                          

                           if(inovice_no!='')
                           {


                                       $('#payment_create').show();

                                        $http({
                                        method:"POST",
                                        url:"<?php echo base_url() ?>index.php/purchase/checkIsExistPurchase_invoice_duplicate",
                                        data:{'inovice_no':inovice_no}
                                        }).success(function(data){
                                            
                                            
                                            if(data.status>0)
                                            {
                                                  $('#payment_create').hide();
                                                  alert('Invoice No: ' + inovice_no + ' already exists. Please change to a unique number.');
                                            } 
                                            else
                                            {
                                                  $('#payment_create').show();
                                            }
                                            
                                            
                                         
                                       }); 

                           }
                           else
                           {

                                                  $('#payment_create').hide();
                                                  //alert('Invoice No is required!');

                           }
                           
           
     };




 
 
 
 
 
 




$scope.viewAddressUpdate = function(id,amount,invoice_no,invoice_date,remarks)
{
    
    var invoice_date=  new Date(invoice_date);
    var year = invoice_date.toLocaleString("default", { year: "numeric" });
    var month = invoice_date.toLocaleString("default", { month: "2-digit" });
    var day = invoice_date.toLocaleString("default", { day: "2-digit" });

    // Generate yyyy-mm-dd date string
    var formattedDate = year + "-" + month + "-" + day;
       
   $scope.hidden_id2=id;
   $('#exampleModalScrollable_2').modal('toggle');
   $('#invoice_amount2').val(amount);
    $('#remarks2').val(remarks);
   $('#inovice_no2').val(invoice_no);
   $('#invoice_date2').val(formattedDate);
   $scope.fetchDataaddress(id);
   $scope.invoicepayment(id);
   $('#updatebutton').show();
  
    
};


   $scope.submitForm_2 = function()
{
      
            var purchase_order_product_id = [];
            var inward_id = [];
            var stock_id = [];
            var purchase_qty = [];
            var purchase_price = [];
             $('input[name="purchase_order_product_id2"]:checked').each(function(){
                 
                    
                     var id=$(this).val();
                     purchase_order_product_id.push($(this).val());
                     
                     inward_id.push($(this).data('set'));
                     stock_id.push($(this).data('stock'));
                     
                     purchase_qty.push($('#qty2_'+id).val()); 
                     purchase_price.push($('#price2_'+id).val()); 
                
            });


          
            
             var checkinsert= purchase_order_product_id.join("|");



             
           
            
             
             var purchase_qty_data= purchase_qty.join("|");
             
            
             
             var purchase_price_data= purchase_price.join("|");
      
          
              var validation=$('input[name="purchase_order_product_id2"]:checked').val();
                    
              if (typeof validation === "undefined") {
                       var validation=0;
              }
              
              
          
        
         
         var invoice_amount=$('#invoice_amount2').val();




         var create_date=$('#invoice_date2').val();
         var roundoff=$('#roundoff2').val();
         var convert=$('input[name="convertPlus2"]:checked').val();
         var loading_charges=$('#loading_charges').val();
         var inovice_no=$('#inovice_no2').val();
         var gst_amount=$('#gst2').text();
         var remarks2=$('#remarks2').val();
         var hidden_id2=$('#hidden_id2').val();
         var sub_total=$('#totalamount2').text();
         

    if(validation!=0)
    {
        
    
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/purchase_invoice_data_update",
      data:{'create_date':create_date,'gst_amount':gst_amount,'roundoff':roundoff,'convert':convert,'sub_total':sub_total,'loading_charges':loading_charges,'invoice_amount':invoice_amount,'remarks':remarks2,'order_id':hidden_id2,'inovice_no':inovice_no,'purchase_order_product_id':checkinsert,'purchase_qty_data':purchase_qty_data,'purchase_price_data':purchase_price_data,'action':'Inward','tablename':'purchase_invoice'}
    }).success(function(data)
    {
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

              $scope.success = false;
              $scope.error = true;
              $scope.errorMessage = data.massage;

          }
          else
          {
              
              
              
             $scope.remarks="";
             $scope.success = true;
             $scope.error = false;
             $scope.successMessage = data.massage;
             $('#updatebutton').hide();
            
                getData();
                $scope.getcount('purchase_invoice');
            
            
            
            
            
            
            
                               var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file', file);  
                               });  
                               
                               var filetype=0;
                               
                               $http.post('<?php echo base_url() ?>index.php/purchase/fileuplaodbyorder_invoice?id='+data.insert_id+'filetype='+filetype, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                    
                               });  
                               
            
            
            
            
            
            
            
            
            
            
            
            
            
                                                                $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });
                                                                
                                                                
                                                                 $('#exampleModalScrollable_2').modal('toggle');
            

          }

          

      }

       
    });
   
 

    }
    else
    {
        alert('Select Product..');
    }
      
      
      
      
  
      
      
      
    
  };


 
 



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/purchase/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'purchase_invoice'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
         getData();
         $scope.getcount('purchase_invoice');
      }); 
    }
};







$scope.cancelData = function(id){
    if(confirm("Are you sure you want to Cancel it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/purchase/insertandupdate",
        data:{'id':id, 'action':'Cancel','tablenamemain':'purchase_invoice'}
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
            $scope.partial =  data.payment_vendor_f;
            
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
          url:"<?php echo base_url() ?>index.php/purchase/fetch_product_get_vendor",
          data:{'search':search}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    
    }; 
    
    
    
    
    
    
    
    
    
    
     $scope.completePono=function(){
       
        
      
        var search=  $('#po_no').val();
        
        
        
        $("#po_no").autocomplete({
         
          source: $scope.availableTags2
          
          
        });
    
    
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/purchase/fetch_po_get",
          data:{'search':search}
        }).success(function(data){
    
              $scope.availableTags2= data;
         
        });
    
    
    
    
    
    };
                        
 












$scope.submitForm = function()
{
      
            var purchase_order_product_id = [];
            var purchase_qty = [];
            var purchase_price = [];
              var stock_id = [];
             $('input[name="purchase_order_product_id"]:checked').each(function(){
                 
                    
                     var id=$(this).val();
                     purchase_order_product_id.push($(this).val()); 
                     purchase_qty.push($('#qty_'+id).val()); 
                     stock_id.push($(this).data('stock'));
                     purchase_price.push($('#price_'+id).val()); 
                
            });
            
             var checkinsert= purchase_order_product_id.join("|");
             var purchase_qty_data= purchase_qty.join("|");
             var purchase_price_data= purchase_price.join("|");
             var stock_ids= stock_id.join("|");
          
              var validation=$('input[name="purchase_order_product_id"]:checked').val();
                    
              if (typeof validation === "undefined") {
                       var validation=0;
              }
              
              
          var roundoff=$('#roundoff').val();
          var convert=$('input[name="convertPlus"]:checked').val();
         
        
         var vendor_names=$('#autocomplete').val();
         var invoice_amount=$('#invoice_amount').val();
         var inovice_no=$('#inovice_no').val();
         var gst_amount=$('#gst').text();
     
    if(validation!=0)
    {
        
    
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/purchase_invoice_data",
      data:{'create_date':$scope.create_date,'stock_ids':stock_ids,'gst_amount':gst_amount,'roundoff':roundoff,'convert':convert,'invoice_amount':invoice_amount,'vendor_names':vendor_names,'remarks':$scope.remarks,'order_id':$scope.po_no,'inovice_no':inovice_no,'purchase_order_product_id':checkinsert,'purchase_qty_data':purchase_qty_data,'purchase_price_data':purchase_price_data,'action':'Inward','tablename':'purchase_invoice'}
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
             $scope.po_no="";
            
              
            $scope.success = true;
            $scope.error = false;
            
            $scope.successMessage = data.massage;
            getData();
            $scope.getcount('purchase_invoice');
           
            $('#showdata').hide();
            
            
            
            
            
            
            
            
            
                               var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file', file);  
                               });  
                               
                               var filetype=0;
                               
                               $http.post('<?php echo base_url() ?>index.php/purchase/fileuplaodbyorder_invoice?id='+data.insert_id+'filetype='+filetype, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                    
                               });  
                               
            
            
            
            
            
            
            
            
            
            
            
            
            
                                                                $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });
                                                                
                                                                
                                                                $('#exampleModalScrollable').modal('toggle');
            

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
      
      
      
        
       var invoice_amount=$('#vendor_amount').val();
       var payment_type=$('#payment_type').val();
       var schedule_date=$('#schedule_date').val();
       var payment_mode_payoff=$('#payment_mode_payoff').val();
      
       var bankaccount=$('#bankaccount').val();
       var delivery_status=$('#delivery_status').val();
       var payout_date=$('#payout_date').val();
       var coil_no=$('#coil_no').val();

      
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/purchase_invoice_payout",
      data:{'notes':$scope.remarks_2,'id':$scope.hidden_id,'invoice_amount':invoice_amount,'coil_no':coil_no,'payment_type':payment_type,'schedule_date':schedule_date,'payment_mode_payoff':payment_mode_payoff,'bankaccount':bankaccount,'delivery_status':delivery_status,'payout_date':payout_date}
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
           
            $scope.successMessage = data.massage;
            getData();
            $scope.getcount('purchase_invoice');
            $scope.fetchDataaddress($scope.hidden_id);
            
            
                                                                $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
                                                                
                                                                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                });
                                                                
                                                                
                                                                 $('#exampleModalScrollable_2').modal('toggle');


          }

          

      }

       
    });
   
 

      
      
      
      
      
  
      
      
      
    
  };



$scope.order_base=1;

$scope.viewAddress = function(id,amount){
    
   $scope.hidden_id=id;
   $('#exampleModalScrollable_1').modal('toggle');
   $('#vendor_amount').val(amount);
   $scope.fetchDataaddress(id);
   $scope.invoicepayment(id);
  
    
};


  

  $scope.fetchDataaddress = function(id){
      
     $http.get('<?php echo base_url() ?>index.php/purchase/purchase_fetch_cp_invoice_product?id='+id).success(function(dataaddress){
      
      
       $scope.namesDataaddress = dataaddress;
      
       
     });
        
   };
   
   
   
     $scope.invoicepayment = function(id){
      
     $http.get('<?php echo base_url() ?>index.php/purchase/fetch_invoicetotal?id='+id).success(function(dataaddress){
      
      
         $scope.invoice_totalextra = dataaddress.invoice_totalextra;
         $scope.invoice_gstamount = dataaddress.invoice_gstamount;
         $scope.invoice_subtotal = dataaddress.invoice_totalamount;
         $scope.invoice_fulltotal = dataaddress.invoice_fulltotal;
         $scope.invoice_tcsamount = dataaddress.tcsamount;


        // $scope.invoice_date = dataaddress.invoice_date;


         $('#invoice_date2').val(dataaddress.invoice_date);

 $scope.roundoffset = dataaddress.roundoffset;
           $scope.convert_status = dataaddress.convert_status;



              $scope.attachment = dataaddress.attachment;

           $scope.roundoffset = dataaddress.roundoffset;
           $scope.convert_status = dataaddress.convert_status;

         if(dataaddress.loading_charges>0)
         {
            $('#loading_charges').val(dataaddress.loading_charges);
         } 


          if(dataaddress.roundoffset>0)
         {
            $('#roundoff2').val(dataaddress.roundoffset);
         } 
         
         
         

         $scope.loading_charges = dataaddress.loading_charges;
         $('#vendor_amount').val(dataaddress.invoice_amount);
         
           
        if(dataaddress.invoice_amount>0)
        {
             $('#payoutbutton').show();
             $('#vendor_amount').attr('readonly', false);

        }
        else
        {
            $('#payoutbutton').hide();
            $('#vendor_amount').attr('readonly', true);
        }
         
         
      
       
     });
        
   };
   
   
    $scope.getProductlist = function()
    {
      
      
     var po_no= $('#po_no').val();
      
     $http.get('<?php echo base_url() ?>index.php/purchase/get_purchase_product_list_po_number?order_id='+po_no).success(function(data){
      
      
       $scope.namesDataproduct = data;
      
       
     });
     
     
       $http.get('<?php echo base_url() ?>index.php/purchase/get_purchase_product_list_po_number_gst_total?order_id='+po_no).success(function(data){
      
     
      
         $scope.totalextra = data.totalextra;
         $scope.gstamount = data.gstamount;
         $scope.subtotal = data.totalamount;
         $scope.fulltotal = data.fulltotal;
         $('#invoice_amount').val(data.fulltotal);
         
          if(data.fulltotal==0)
         {
             $('#payment_create').hide();
         }
         else
         {
             $('#payment_create').show();
         }
        
       
     });
     
     
        
   };
   
     $scope.getPurchaseorderid = function(){
      
      
     var autocomplete= $('#autocomplete').val();
      
     $http.get('<?php echo base_url() ?>index.php/purchase/fetch_product_get_vendor_po_no?search='+autocomplete).success(function(data){
      
      
       $scope.namesDataproductorderno = data;
      
        
     });
        
   };
   
   
   
   
   
   
    $scope.getProductlist = function(){
      
    $scope.getProductlistdata();
      
    };
    
    
    
    
  
   $scope.getProductlistdata = function(){
      
      
     var po_no= $('#po_no').val();
      
     $http.get('<?php echo base_url() ?>index.php/purchase/get_purchase_product_list_po_number?order_id='+po_no).success(function(data){
      
      
       $scope.namesDataproduct = data;
       
       
       $('#showdata').show();
      
       
     });
     
     
     
     
      $http.get('<?php echo base_url() ?>index.php/purchase/get_purchase_product_list_po_number_gst_total?order_id='+po_no).success(function(data){
      
     
         $scope.totalextra = data.totalextra;
         $scope.gstamount = data.gstamount;
         $scope.subtotal = data.totalamount;
         $scope.fulltotal = data.fulltotal;
         $('#invoice_amount').val(data.fulltotal);
         
           if(data.fulltotal==0)
         {
             $('#payment_create').hide();
         }
         else
         {
             $('#payment_create').show();
         }
         
       
     });
     
        
   };
   
  

});

</script>
         
<?php include ('footer.php'); ?>




</body>

 </html>

