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
                                                    
                                                   
                                                     

                                                      <li class="nav-item">
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
                                                      
                                                       <!--<li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',25)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Driver return Order <span class="badge rounded-pill bg-danger  float-end"> {{driver_return}} </span></span>   
                                                         </a>
                                                       </li>-->
                                                  
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
                                                       </li>




                                                          <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('orders_process',1777,1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Super Admin 2 <span class="badge rounded-pill bg-danger  float-end"> {{super_admin}} </span></span>   
                                                         </a>
                                                       </li>


                                                        <li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('all_ledgers',0,'Discount')">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">Discount From Net BL <span class="badge rounded-pill bg-danger  float-end"> {{discount_form_nb}} </span></span>   
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
                                                                      <tr ng-if="pageTapName =='1'">
                                                                          <th><input class="form-check-input " type="checkbox" id="checkall" ng-click="allCheck()" style="width: 16px;height: 16px;"> </th>
                                                                          <th>Order No</th>
                                                                          <th>Name</th>
                                                                          <th>Phone</th>
                                                                          <th>Commission</th>
                                                                          <th>Bill_Total</th>
                                                                          <th>Collected_Amount</th>
                                                                          <th>Difference</th>
                                                                          <!--<th>Delivery Charge</th>-->
                                                                          
                                                                          <th >Status</th>
                                                                          <th>Created_Date</th>
                                                                          <th>Created_By</th>
                                                                          <th>Edited_By</th>
                                                                          <th>Edited_Date</th>
                                                                          <th>Approved_By</th>
                                                                          <th>Approved_Date</th>
                                                                         <th style="width: 200px;">Action</th>
                                                                      </tr>
                                                                       <tr ng-if="pageTapName == 'Discount'">
                                                                          <th><input class="form-check-input " type="checkbox" id="checkall" ng-click="allCheck()" style="width: 16px;height: 16px;"> </th>
                                                                          <th>No</th>
                                                                          <th>Customer Name</th>
                                                                          <th>Customer Phone</th>
                                                                          <th>Area</th>
                                                                  
                                                                          <th>Closing</th>
                                                                          <th>Net Balance</th>
                                                                          <th>Request Anount</th>
                                                                          <th>Request By</th>
                                                                          <th>Request Date</th>
                                                                          <th>Approved By</th>
                                                                          <th>Approved Date</th>
                                                                         
                                                                          
                                                                          <th>Action</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      
                                                                      
                                                      <tr  ng-repeat="name in namesData" ng-if="pageTapName =='1'">
                                                                          <td>
                                                                              <div class="form-check font-size-16">
                                                                                  <input class="form-check-input customerlistcheck" name="customerlistcheck" value="{{name.id}}" type="checkbox" id="customerlistcheck01">
                                                                                 
                                                                              </div>
                                                                          </td>
                                                                          <td><a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process_md_verification?order_id={{name.base_id}}">{{name.order_no}}</a></td>
                                                                          <td>{{name.name}}</td>
                                                                          <td>
                                                                             {{name.phone}}
                                                                          </td>
                                                                          
                                                                           <td>
                                                                          <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process_md_verification?order_id={{name.base_id}}">  <span ng-if="name.commission>0">{{name.commission}}</span></a>
                                                                           </td>
                                                                           <td>{{name.totalamount}}</td>
                                                                           <td>{{name.collectamount}}</td>
                                                                           <td>{{name.difference}}</td>
                                                                           <!--<td>{{name.delivery_charge}}</td>-->
                                                                       
                                                                        
                                                                             <td>{{name.reason}} </td>
                                                                          <td>
                                                                              
                                                                              {{name.create_date}} {{name.create_time}}
                                                                             
                                                                             
                                                                          </td>
                                                                            <td>{{name.created_by}} </td>
                                                                              <td>{{name.edited_by}} </td>
                                                                                <td>{{name.edit_date}} {{name.edit_time}}</td>

                                                                                 <td>{{name.approved_by_user}} </td>
                                                                                <td>{{name.approved_md_date}} {{name.approved_md_time}}</td>
                                                                          <td>
                                                                                     
                                                                                     <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product_process_md_verification?order_id={{name.base_id}}" ><i class="mdi mdi-eye font-size-16 text-success me-1"></i>Order View</a>
                                                                                     
                                                                                     
                                                                                     <span ng-if="name.order_base==24 || name.order_base==1">
                                                                                          <a href="#"  ng-click="getorderid(name.id,name.order_no,name.selforder,name.order_base)"><i class="mdi mdi-file font-size-16 text-success me-1"></i> View Payment</a>
                                                                                     </span>
                                                                                     
                                                                                     
                                                                                     <span ng-if="name.return_status==1">
                                                                                     <span ng-if="name.order_base==25 || name.order_base==1">
                                                                                          <a href="#"  ng-click="viewAddress(name.return_id)"><i class="mdi mdi-file font-size-16 text-success me-1"></i> Return Status</a>
                                                                                     </span>
                                                                                     </span>
                                                                                     
                                                                                      <!--<li><a href="#" class="dropdown-item"  ng-click="deleteData(name.id)"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Delete</a></li>-->
                                                                                     
                                                                                   
                                                                                      
                                                                                 
                                                                              </div>
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
                                                                          <td>{{name.closing_bal}}</td>
                                                                          <td>{{name.net_balance}} </td>
                                                                          
                                                                           <td>{{name.credit}}</td>
                                                                       
                                                                           <td>
                                                                            {{name.created_by}}
                                                                            <br>
                                                                             {{name.reference_no}} 
                                                                            </td>
                                                                           
                                                                          <td>{{name.payment_date}}</td>
                                                                            

                                                                          <td>{{name.approved_by}} </td>
                                                                          <td>{{name.approved_md_date}} {{name.approved_md_time}}</td>
                                                                         
                                                                          <td>


                                                                           <a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{name.customer_id}}" target="_blank"  class="btn btn-outline-danger btn-sm">Ledger View</a>
                                 
                                 

                                           <button type="button" ng-click="onviewparty_edit_new(name.id,name.customer_id,name.name,name.debit,name.credit)"  class="btn btn-outline-danger btn-sm" ng-if="name.reference_no!='Discount Approved'">VIEW</button>    
                                                                                 
                                                                              
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
                                                                  
                                                                  <input type="text"  min="0"  onkeypress="return isNumberKey(event)" id="amount_set" name="amount" class="form-control">
               

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
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                          




                                                     


                                                              
                                                              
                                                            
                                                           
                                                            <div class="row" style="margin: 20px -9px;">
                                                          
                                                            
                                                            <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                     <input type="hidden" id="l_id" >
                                                                

 <button type="submit" class="btn btn-success w-md"  id="approved" style="float: right;"  ng-click="statusupdate('0','Discount Approved')" id="UpdateCommsision">APPROVED</button>

 <button type="submit" class="btn btn-primary w-md"    ng-click="statusupdate('148','Discount Rejected')">REJECTED</button>



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
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;









    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    
    $scope.tablename='orders_process';
    $scope.discount_status = undefined;
    $scope.pageTapName='1';
    getData();











 $scope.getorderid = function(id,name,selforder,order_base) {
  
 
  

   if(selforder==1)
   {
       $scope.fetchorderidDetails('orders_process',10000,id);
   }
   else
   {
       $scope.fetchorderidDetails('orders_process',2,id);
   }
   
   
   $scope.cashmode('orders_process',2,id);
   $scope.orderno_number = name;
   $('#firstmodalcommison').modal('toggle');
  
 };


$scope.fetchorderidDetails = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_vehicle_delivered_order_list_by_id_by_view?tablename='+tabelename+'&order_base='+status+'&order_id='+id).success(function(data){
      $scope.namesDataorderid = data;
    });
  };
  
  
  $scope.cashmode = function(tabelename,status,id){

    $http.get('<?php echo base_url() ?>index.php/order/cash_mode?tablename='+tabelename+'&order_base='+status+'&order_id='+id).success(function(data){
     
     
    $scope.c1rs = data.c1rs;
  $scope.c2rs = data.c2rs;
  $scope.c5rs = data.c5rs;
  $scope.c1rs_s = data.c1rs_s;
  $scope.c2rs_s = data.c2rs_s;
  $scope.c5rs_s = data.c5rs_s;
  
      $scope.c10rs = data.c10rs;
      $scope.c20rs = data.c20rs;
     
      $scope.c50rs = data.c50rs;
      $scope.c100rs = data.c100rs;
      $scope.c200rs = data.c200rs;
      $scope.c500rs = data.c500rs;
      $scope.c2000rs = data.c2000rs;
      
      
      $scope.c10rs_s = data.c10rs_s;
      $scope.c20rs_s = data.c20rs_s;
      
      $scope.c50rs_s = data.c50rs_s;
      $scope.c100rs_s = data.c100rs_s;
      $scope.c200rs_s = data.c200rs_s;
      $scope.c500rs_s = data.c500rs_s;
      $scope.c2000rs_s = data.c2000rs_s;
      
      $scope.denomination_total = data.denomination_total;
      
      
      
    });
  };
 



 
   function getData() {
       
      var order_base = $('#order_base').val();
      var edit_by=$('#edit_by').val();
      
      
     $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_md_approved_request?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&edit_by=' + edit_by+'&order_base='+order_base + '&discount_status=' + $scope.discount_status)
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

 
 $scope.statusupdate = function(status,statusname)
{
          


                                  $('#UpdateCommsision').hide();  
                                  var id= $('#l_id').val();
                                  var amount_set= $('#amount_set').val();
            

                                   $http({
                                    method:"POST",
                                    url:"<?php echo base_url() ?>index.php/accountheads/statusupdate_discount",
                                    data:{

                                        'id':id,
                                        'status':status,
                                        'amount_set':amount_set,
                                        'statusname':statusname
                                       

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


    $('#amount_set').val(amount);
    $('#l_id').val(l_id);
    $('#getbankdata').show();  
    $('#firstmodalcommisonparty').modal('toggle');
    $('#exampleModalToggleLabelset').html(name);


     $http({
      method:"POST",
      url:"<?php echo base_url(); ?>index.php/report/fetch_single_data_by",
      data:{'id':l_id, 'action':'fetch_single_data','tablename':'all_ledgers'}
      }).success(function(data){
      
     

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



                     
  $scope.coniformed = function(){
      
        if($('.customerlistcheck').is(':checked'))
        {
           
             if (confirm("Are you sure confirm!") == true) 
             {
                 
                 
                   var product_order_id = [];
      
                   $('input[name="customerlistcheck"]:checked').each(function(){
                       
                            product_order_id.push($(this).val()); 
                        
                    });
                    
                     var checkinsert= product_order_id.join("|");
                   
                     
                        $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/order/discount_approved_for_md",
                          data:{'order_id':checkinsert}
                        }).success(function(data){
                           
                           
                          
                            alert('Approved success');
                            getData();
                            
                            
                            
                        });
    
    
                 
              
                
                
              } 
            
            
        }
        else
        {
             alert('Select the orders');
            
        }
      
  };
 $scope.rejected = function()
 {
      
        if($('.customerlistcheck').is(':checked'))
        {
           
             if (confirm("Are you sure confirm!") == true) 
             {
                 
                 
                   var product_order_id = [];
      
                   $('input[name="customerlistcheck"]:checked').each(function(){
                       
                            product_order_id.push($(this).val()); 
                        
                    });
                    
                     var checkinsert= product_order_id.join("|");
                   
                     
                        $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/order/discount_rejected_for_md",
                          data:{'order_id':checkinsert}
                        }).success(function(data){
                           
                           
                          
                            alert('Rejected the Orders');
                            getData();
                            
                            
                            
                        });
    
    
                 
              
                
                
              } 
            
            
        }
        else
        {
             alert('Select the orders');
            
        }
      
  };
 
 $scope.pageTab = function(tablename,status,name){
    
       $scope.pageTapName = name;
      $scope.discount_status = undefined;
      $scope.tablename = tablename;

      if(name =='Discount')
      {
        $scope.discount_status = 0;
         $('.disshowbtn').show();
      }else
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
        
        $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_md_approved_request?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&tablename=' + $scope.tablename+'&edit_by=' + edit_by +'&order_base='+order_base + '&discount_status=' + $scope.discount_status)
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









$scope.submitForm_1 = function(){
      
      
      
        

  
      

      
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/sales_return_data_remarks_update_md",
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
        data:{'id':id, 'action':'Cancel','tablenamemain':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
         getData();
      }); 
    }
};






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

    });



}




});

</script>  
   
   
   
<?php include ('table_footer.php'); ?>
</body>


