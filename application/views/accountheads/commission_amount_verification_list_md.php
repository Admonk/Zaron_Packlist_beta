<?php  include "header.php"; ?>

<style>
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
</style>
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>







  <?php
                     $customer_id=0;
                     if(isset($_GET['customer_id']))
                     {
                        $customer_id= $_GET['customer_id'];
                     }
                     ?>








 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between pb-2">
                                    <h4 class="mb-sm-0 font-size-14">Commission ledger verification List MD</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Commission ledger verification MD !</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card">

                  
                  <div class="card-body" >


                <div class="row">
                   
                    
                    <div class="col-lg-12" >
                      <form>
                          <div class="row" style="display:none;">
                              <div class="col-md-4" >
                              <select class="form-control" data-trigger name="choices-single-default"
                                                            id="choices-single-default"
                                                            placeholder="This is a search">
                                                            <option value="">Search Others Ledger</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($accountheads as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>" <?php if($customer_id==$val->id) { echo 'selected'; } ?>><?php echo $val->name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                                                        </select>
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="from-date" value="<?php echo $this->session->userdata['logged_in']['from_date']; ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" value="<?php echo $this->session->userdata['logged_in']['to_date']; ?>">
                            </div>
                            <div class="col" style="display:none;">
                             <select class="form-control" id="payment_status">
                                 <option value="All">All</option>
                                 <option value="Paid">Paid</option>
                                 <option value="Un-Paid">Un-Paid</option>
                             </select>
                            </div>
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" id="exportdata" class="btn btn-success waves-effect waves-light"  >Export</button>
                           
                            <a href="<?php echo base_url(); ?>index.php/accountheads/others_ledger_find_delete_log?customer_id={{customer_id_data}}" target="_blank">Delete Log</a>
                            
                           
                            </div>
                           
                          </div>
                      </form>
                         
                         
                     
         <div class="row" style="display:none;" ng-init="fetchDatagetlegderGroupTotal('<?php echo $customer_id; ?>')">
                         
                          
                            
                            <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Total Debit: <span >{{totaldebit | number}}</span></h3>
                                            </div>
        
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Total Credit: <span >{{totalcridit | number}}</span></h3>                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
                            
                       
        
                            <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Balance :
                                                     <span  ng-if="getstatus1==1" style="color:red">{{outstanding | number}}</span>
                                                     <span  ng-if="getstatus1==0" style="color:green">{{outstanding | number}}</span>
                                                </h3>
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
        
                           
        
                           
                        </div>
                     
                     
                     
               
                  <div id="search-view" >
                      
                     
                         
                                     <div  ng-init="fetchSingleData('<?php echo $customer_id; ?>')" >
                                         <button type="button" ng-click="onview()"  class="btn btn-soft-success  waves-effect waves-light"  style="display:none;">Payout</button>
          
                                        <h4 class="card-title">{{name}} <sapn ng-if="phone>0">| {{phone}}</sapn></h4>
                                    </div>
    <?php
  
   if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='14' || $this->session->userdata['logged_in']['access']=='2')
   {
       
       ?>
       
       <button type="button" ng-click="onviewparty()"  class="btn btn-soft-danger  waves-effect waves-light" style="float: right;margin: 4px 12px;display: none;">Internal Transaction</button>
  
       <?php
                                                
   }
  
  ?>
                       
                    <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                                        <!--<i class="bx bx-search search-icon"></i>-->
                    <div class="table-responsive">
                   
                    <table id="datatable"  class="table table-striped table-bordered" style="position: relative;" width="100%" ng-init="fetchDatagetlegderGroup('<?php echo $customer_id; ?>')" >
                      <thead>
                        <tr style="position: sticky;top: 0;background: #dfdfdf;">


                          <th style="width:50px;"><h5 class="font-size-12 mb-0">No</h5></th>
                          <th style="width:250px;"><h5 class="font-size-12 mb-0">Name</th>
                          <th style="width:180px;"><h5 class="font-size-12 mb-0">Create Date</h5></th>
                          <!--<th style="width:180px;"><h5 class="font-size-12 mb-0">Modified Date</h5></th>-->
                          <th style="width:100px;"><h5 class="font-size-12 mb-0">Ref.No</h5></th>
                                <th style="width:200px;"><h5 class="font-size-12 mb-0">C Name</h5></th>
                       
                         
                          <th style="width:100px;"><h5 class="font-size-12 mb-0">Debit</h5></th>
                          <th style="width:100px;"><h5 class="font-size-12 mb-0">Credit</h5></th>
                         
                           <th style="width:200px;"><h5 class="font-size-12 mb-0">Mode</h5></th>
                          <th style="width:200px;"><h5 class="font-size-12 mb-0">Narration</h5></th>
                          
                           <th style="width:180px;"><h5 class="font-size-12 mb-0">Action</h5></th>
            
                        </tr>
                      </thead>
                      
                      
                      
                      
                           <tr class="setload" ><td colspan="9"><loading></loading></td></tr>
                    
                      
                      
                        <tbody  ng-repeat="names in namesDataledgergroup | filter:query" >
                            
                            
                        <tr  class="trpoint {{names.addclass}}" ng-if="names.no!='#'">
                          
                           <td>{{names.no}}</td>
                           <td>
                               
                              
                            <a href="<?php echo base_url(); ?>index.php/purchase/po?order_id={{names.order_id}}&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process" ng-if="names.order_id!='#'" target="_blank">{{names.name}}</a>
                               
                               <a href="#" ng-if="names.order_id=='#'">{{names.name}}</a>
                                   
                               
                               
                               </td>
                           <td>{{names.payment_date}} {{names.payment_time}} </td>
                             <!--<td>{{names.update_date}} </td>-->
                        
                           <td>
                               
                               <a href="<?php echo base_url(); ?>index.php/purchase/po?order_id={{names.order_id}}&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process" ng-if="names.order_id!='#'" target="_blank">{{names.reference_no}}</a>
                               
                               <a href="#" ng-if="names.order_id=='#'">{{names.reference_no}}</a>
                           </td>
                        <td>{{names.cname}}</td>  
                           <td>
                               
                               <a href="<?php echo base_url(); ?>index.php/purchase/po?order_id={{names.order_id}}&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process" ng-if="names.order_id!='#'" target="_blank">
                                   
                                   <span ng-if="names.debits!=0">{{names.debits | number}}</span>
                                   
                                   </a>
                               
                               <a href="#" ng-if="names.order_id=='#'">
                                   
                                  <span ng-if="names.debits!=0">{{names.debits | number}}</span>
                                   
                                   </a>
                               
                               
                               
                               
                               </td>
                           <td >
                               
                                   <a href="<?php echo base_url(); ?>index.php/purchase/po?order_id={{names.order_id}}&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process" ng-if="names.order_id!='#'" target="_blank">
                                   
                                  <span ng-if="names.credits!=0">{{names.credits | number}}</span>
                               
                                   
                                   </a>
                               
                               <a href="#" ng-if="names.order_id=='#'">
                                   
                                   <span ng-if="names.credits!=0">{{names.credits | number}}</span>
                               
                                   
                                   </a>
                               
                             
                               
                               </td>
                          
                           <td>
                               
                               
                                  <a href="<?php echo base_url(); ?>index.php/purchase/po?order_id={{names.order_id}}&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process" ng-if="names.order_id!='#'" target="_blank">
                                   
                                   <span  ng-if="names.payment_mode=='Cash'">{{names.payment_mode}}</span>
                               
                                  <span  ng-if="names.payment_mode!='Cash'">
                                   {{names.payment_mode}}
                                   <br>
                                   <small>{{names.bank_name}}</small>
                                   </span>
                                   
                                   </a>
                               
                                  <a href="#" ng-if="names.order_id=='#'">
                                   
                                    <span  ng-if="names.payment_mode=='Cash'">{{names.payment_mode}}</span>
                               
                                  <span  ng-if="names.payment_mode!='Cash'">
                                   {{names.payment_mode}}
                                   <br>
                                   <small>{{names.bank_name}}</small>
                                   </span>
                                   
                                   </a>
                               
                               
                               </td>

                           <td>
                               
                               <a href="<?php echo base_url(); ?>index.php/purchase/po?order_id={{names.order_id}}&old_tablename_sub=0&tablename=purchase_orders_process&tablename_sub=purchase_product_list_process&movetablename=purchase_orders_process&movetablename_sub=purchase_product_list_process" ng-if="names.order_id!='#'" target="_blank">
                                   
                                  {{names.notes}}
                                   
                                   </a>
                               
                                  <a href="#" ng-if="names.order_id=='#'">
                                   {{names.notes}}
                                   </a>
                                <samll ng-if="names.org_amount!=0"><br>Changed By  : {{names.username}} {{names.org_amount}}</samll>
                               
                               
                               
                               </td>
                           
                       
                                    <td style="display:flex;">
                                   

                                 

                                           <button type="button" ng-if="names.commission_customer>0" ng-click="onviewparty_edit_new(names.id,names.customer_id,names.name,names.debits,names.credits)"  class="btn btn-outline-danger btn-sm">VIEW</button>


                                           

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
              </div>
            </div>

                        
                    </div>
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->

            







        </div>
    </div>

 








     <div class="modal fade" id="firstmodalcommisonparty" aria-hidden="true" aria-labelledby="exampleModalToggleLabelset" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabelset">Pay  commission</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                            
                                                              <div class="form-group row">
                                                                
                                                                
                                                                <div class="some-class1">
                                                                    <input type="radio" class="radio" name="Payer_1" ng-model="party_type1" value="1" id="Customer_1" />
                                                                    <label for="Customer_1">Customer</label>
                                                                    <input type="radio" class="radio" name="Payer_1" ng-model="party_type1" value="3" id="Vendor_1" />
                                                                    <label for="Vendor_1">Vendor</label>
                                                                    <input type="radio" class="radio" name="Payer_1" ng-model="party_type1" value="2" id="Driver_1" />
                                                                    <label for="Driver_1">Driver</label>
                                                                    <input type="radio" class="radio" name="Payer_1" ng-model="party_type1" value="5" id="Other_1" />
                                                                    <label for="Other_1">Others Ledger</label>
                                                                  </div>
                                                                    
                                                            <div class="col-md-3">
                                                                <label class="col-sm-12 col-form-label" style="font-weight: 600;">CASH </label>
                                                            </div>

                                                             <div class="col-md-3">
                                                               <div class="form-group row" >
                                                                
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="value1"  placeholder="Value" class="form-control sum">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                            </div>


                                                                <div class="col-md-6">



                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance11()"  ng-keyup="completeCustomer11()" placeholder="Search Names"  id="remarks1">
          
                                                                  
                                                                  <br>
                                                                  <span ng-if="opening_balance11"><b>Avilable Balance : {{opening_balance11 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                           




















  <div class="form-group row">
                                                               
                                                                
                                                                <div class="some-class1">
                                                                    <input type="radio" class="radio" name="Payer_2"  ng-model="party_type2" value="1" id="Customer_2" />
                                                                    <label for="Customer_2">Customer</label>
                                                                    <input type="radio" class="radio" name="Payer_2"  ng-model="party_type2" value="3" id="Vendor_2" />
                                                                    <label for="Vendor_2">Vendor</label>
                                                                    <input type="radio" class="radio" name="Payer_2" ng-model="party_type2" value="2" id="Driver_2" />
                                                                    <label for="Driver_2">Driver</label>
                                                                    <input type="radio" class="radio" name="Payer_2" ng-model="party_type2" value="5" id="Other_2" />
                                                                    <label for="Other_2">Others Ledger</label>
                                                                  </div>
                                                                    
                                                            <div class="col-md-3">
                                                                <label class="col-sm-12 col-form-label" style="font-weight: 600;">CASH  DEPOSIT</label>
                                                            </div>

                                                             <div class="col-md-3">
                                                               <div class="form-group row" >
                                                                
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="value2"   placeholder="Value" class="form-control sum">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                            </div>


                                                                <div class="col-md-6">



                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance222()"   ng-keyup="completeCustomer222()" placeholder="Search Names"  id="remarks2">
          
                                                                  
                                                                  <br>
                                                                  <span ng-if="opening_balance222"><b>Avilable Balance : {{opening_balance222 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              























                                                          <div class="form-group row">
                                                                
                                                                
                                                                <div class="some-class1">
                                                                    <input type="radio" class="radio" name="Payer_3"  ng-model="party_type3" value="1" id="Customer_3" />
                                                                    <label for="Customer_3">Customer</label>
                                                                    <input type="radio" class="radio" name="Payer_3"  ng-model="party_type3" value="3" id="Vendor_3" />
                                                                    <label for="Vendor_3">Vendor</label>
                                                                    <input type="radio" class="radio" name="Payer_3" ng-model="party_type3" value="2" id="Driver_3" />
                                                                    <label for="Driver_3">Driver</label>
                                                                    <input type="radio" class="radio" name="Payer_3" ng-model="party_type3" value="5" id="Other_3" />
                                                                    <label for="Other_3">Others Ledger</label>
                                                                  </div>
                                                                    
                                                            <div class="col-md-3">
                                                                <label class="col-sm-12 col-form-label" style="font-weight: 600;">LEDGER</label>
                                                            </div>

                                                             <div class="col-md-3">
                                                               <div class="form-group row" >
                                                                
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="value3"  placeholder="Value" class="form-control sum">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                            </div>


                                                                <div class="col-md-6">



                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance33()"  ng-keyup="completeCustomer33()" placeholder="Search Names"  id="remarks3">
          
                                                                  
                                                                  <br>
                                                                  <span ng-if="opening_balance33"><b>Avilable Balance : {{opening_balance33 | number}}</b></span>
                                                                </div>
                                                              </div>




















<div class="form-group row">
                                                                 
                                                                <div class="some-class1">
                                                                    <input type="radio" class="radio" name="Payer_4"  ng-model="party_type4" value="1" id="Customer_4" />
                                                                    <label for="Customer_4">Customer</label>
                                                                    <input type="radio" class="radio" name="Payer_4"  ng-model="party_type4" value="3" id="Vendor_4" />
                                                                    <label for="Vendor_4">Vendor</label>
                                                                    <input type="radio" class="radio" name="Payer_4"  ng-model="party_type4" value="2" id="Driver_4" />
                                                                    <label for="Driver_4">Driver</label>
                                                                    <input type="radio" class="radio" name="Payer_4"  ng-model="party_type4" value="5" id="Other_4" />
                                                                    <label for="Other_4">Others Ledger</label>
                                                                  </div>
                                                                    
                                                            <div class="col-md-3">
                                                                <label class="col-sm-12 col-form-label" style="font-weight: 600;">CNN</label>
                                                            </div>

                                                             <div class="col-md-3">
                                                               <div class="form-group row" >
                                                                
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="value4"  placeholder="Value" class="form-control sum">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                            </div>


                                                                <div class="col-md-6">



                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance44()"   ng-keyup="completeCustomer44()" placeholder="Search Names"  id="remarks4">
          
                                                                  
                                                                  <br>
                                                                  <span ng-if="opening_balance44"><b>Avilable Balance : {{opening_balance44 | number}}</b></span>
                                                                </div>

<div class="col-md-3">
                                                                <label class="col-sm-12 col-form-label" style="font-weight: 600;">GST</label>
                                                            </div>

                                                             <div class="col-md-3">
                                                               <div class="form-group row" >
                                                                
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  
                                                                  <input type="number" id="gst" class="form-control sum" placeholder="GST Amount">
                                                                  
                                                                </div>
                                                              </div>
                                                            </div>


                                                                <div class="col-md-6">


                                                                </div>




                                                              </div>
                                                              















                                                              







                                                                     <div class="row" >
                                                            
                                                            <div class="col-md-3">
                                                                <label class="col-sm-12 col-form-label" style="font-weight: 600;">Total</label>
                                                            </div>

                                                             <div class="col-md-3">
                                                               
                                                                <label class="col-sm-12 col-form-label"   style="font-weight: 600;"id="totalsum">0</label>
                                                               
                                                               
                                                             
                                                            </div>

                                                                 <div class="col-md-3">
                                                                <label class="col-sm-12 col-form-label" style="font-weight: 600;">Difference</label>
                                                            </div>

                                                             <div class="col-md-3">
                                                               
                                                                <label class="col-sm-12 col-form-label"   style="font-weight: 600;"id="Difference">0</label>
                                                               
                                                               
                                                             
                                                            </div>

                                                            </div>


                                                            <span ng-if="consider_gst==0"  style="display:none;">
                                                            
                                                           <label class="form-check-label" for="formrow-excess-val">Consider GST  &nbsp;&nbsp;</label>
                                                           <input type="checkbox" class="form-check-input"  name="consider_gst" value="0" id="formrow-excess-val"> 
                                                           
                                                        </span>



                                                        <span ng-if="consider_gst==1" style="display:none;">
                                                            
                                                           <label class="form-check-label" for="formrow-excess-val">Consider GST  &nbsp;&nbsp;</label>
                                                           <input type="checkbox" class="form-check-input" checked name="consider_gst" value="1" id="formrow-excess-val"> 
                                                           
                                                        </span>


                                                              
                                                              
                                                               <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label" id="aria-label-set">Commission Amount <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text"  min="0"  onkeypress="return isNumberKey(event)" id="amount_set" name="amount" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                          




                                                     


                                                              
                                                              
                                                               <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Payment Date </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="date" id="payment_date_2"  value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                            
                                                           
                                                            <div class="row" style="margin: 20px -9px;">
                                                          
                                                            
                                                            <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                     <input type="hidden" id="l_id" >
                                                                
<button type="submit" class="btn btn-success w-md" style="float: right;" id="UpdateCommsision" ng-click="UpdateCommsision()">Transfer Payment</button>



                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
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
      if(val=='Petty Cash')
      {
          
          $('#base_title').html('Cash Account');
          var data='<?php foreach($bankaccount as $val) { if($val->id==24) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
          $('#res_no').show();
          $('#bankaccountshow').show();
          
      }
      
  });
  
    
  
















  $('#payment_mode_payoff1').on('change',function(){
      
      var val=$(this).val();
      
      if(val=='NEFT/RTGS' ||  val=='Cheque')
      {
          
         
          $('#base_title').html('Bank Account');
          var data='<option value="0">Select Bank</option> <?php foreach($bankaccount as $val) { if($val->id!=25 && $val->id!=24) { ?> <option value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount1').html(data);
           $('#bankaccountshow1').show();
      }
      if(val=='Petty Cash')
      {
          
          $('#base_title').html('Cash Account');
          var data='<?php foreach($bankaccount as $val) { if($val->id==24) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount1').html(data);
         
          $('#bankaccountshow1').show();
          
      }
      
  });



                       $(".sum").on('input',function(){
                 
                                                                                      var sum = 0
                                                                                      $('.sum').each(function () {
                                                                                             
                                                                                                    
                                                                                                if($(this).val()=='')
                                                                                                {
                                                                                                    var combat = 0;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                     var combat = $(this).val();
                                                                                                }
                                                                                                    
                                                                                               sum += parseFloat(combat);
                                                                                               
                                                                                             
                                                                                      });
                 
                                                                                    var sumtot= parseFloat($('#amount_set').val());

                                                                                     var difference=sumtot-sum;
                                                                                      $('#Difference').html(difference);
                 
                                                                                      $('#totalsum').html(sum);
                                                                                        if(sumtot==sum)
                                                                                      {
                                                                                          //alert('Commission Amount : '+sumtot+' greater than total amount');
                                                                                          $('#UpdateCommsision').show();
                                                                                      }
                                                                                      else
                                                                                      {
                                                                                          $('#UpdateCommsision').hide();
                                                                                      }
                 
                });










    $('#payment_mode_payoff2').on('change',function(){
      
      
     
      var val=$(this).val();
      
      if(val=='NEFT/RTGS' ||  val=='Cheque')
      {
          
         
          $('#base_title2').html('Bank Account');
          var data='<option value="0">Select Bank</option> <?php foreach($bankaccount as $val) { if($val->id!=25 && $val->id!=24) { ?> <option value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount2').html(data);
          $('#res_no').show();
          $('#bankaccountshow2').show();
      }
      if(val=='Cash')
      {
          
          $('#base_title2').html('Cash Account');
          var data='<?php foreach($bankaccount as $val) { if($val->id==25) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount2').html(data);
          $('#res_no').show();
          $('#bankaccountshow2').show();
          
      }
      if(val=='Petty Cash')
      {
         
          $('#base_title2').html('Petty Cash Account');
          var data='<?php foreach($bankaccount as $val) { if($val->id==24) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount2').html(data);
          $('#reference_no').show();
          $('#bankaccountshow2').show();
          
          
          
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
  
    url = '<?php echo base_url() ?>index.php/accountheads/fetch_data_get_ledger_view_export_new?limit=10&deleteid=0&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status;

 
    location = url;

});


});
</script>
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

app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;


   $scope.customer_id_data= <?php echo $customer_id; ?>;
 
 $scope.getbank=0
    












$scope.completeCustomer44=function(){
       
         
      
        var search=  $('#remarks4').val();
        
        
        
       var party= $("input[name='Payer_4']:checked").val();
       
       
      
        
        $("#remarks4" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':party}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 




 $scope.Getbalance44 = function () {
      
        var l_id=  $('#l_id_1').val();
        var party=  $('#remarks4').val();
          var party_type= $("input[name='Payer_4']:checked").val();
      
           $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
              data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
            }).success(function(data){
                
                
              
                 $scope.opening_balance44 = data.opening_balance;
                 
                
             
            });
            
            
          if(party!='')
            {         
            $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
              data:{'id':party, 'action':'fetch_single_data','tablename':party_type}
             }).success(function(data){
                
                   if(data.error=='0')
                   {
                         
                          $('#remarks4').css("border-color", "red");
                   }
                   else
                   {
                           $scope.accountshead = data;

                           
                           $('#remarks4').css("border-color", "green");
                   }
                
                
             
            });
            
            }
      
      
      
};   










$scope.completeCustomer33=function(){
       
         
      
        var search=  $('#remarks3').val();
        
        
        
       var party= $("input[name='Payer_3']:checked").val();
       
       
      
        
        $( "#remarks3" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':party}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 




 $scope.Getbalance33 = function () {
      
        var l_id=  $('#l_id_1').val();
        var party=  $('#remarks3').val();
          var party_type= $("input[name='Payer_3']:checked").val();
      
           $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
              data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
            }).success(function(data){
                
                
              
                 $scope.opening_balance33 = data.opening_balance;
                 
                
             
            });
            
            
          if(party!='')
            {         
            $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
              data:{'id':party, 'action':'fetch_single_data','tablename':party_type}
             }).success(function(data){
                
                   if(data.error=='0')
                   {
                         
                          $('#remarks3').css("border-color", "red");
                   }
                   else
                   {
                           $scope.accountshead = data;

                           
                           $('#remarks3').css("border-color", "green");
                   }
                
                
             
            });
            
            }
      
      
      
};   






$scope.completeCustomer222=function(){
       
         
      
        var search=  $('#remarks2').val();
        
        
        
       var party= $("input[name='Payer_2']:checked").val();
       
       
      
        
        $( "#remarks2" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':party}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 




 $scope.Getbalance222 = function () {
      
        var l_id=  $('#l_id_1').val();
        var party=  $('#remarks2').val();
          var party_type= $("input[name='Payer_2']:checked").val();
      
           $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
              data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
            }).success(function(data){
                
                
              
                 $scope.opening_balance222 = data.opening_balance;
                 
                
             
            });
            
            
          if(party!='')
            {         
            $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
              data:{'id':party, 'action':'fetch_single_data','tablename':party_type}
             }).success(function(data){
                
                   if(data.error=='0')
                   {
                         
                          $('#remarks2').css("border-color", "red");
                   }
                   else
                   {
                           $scope.accountshead = data;

                           
                           $('#remarks2').css("border-color", "green");
                   }
                
                
             
            });
            
            }
      
      
      
};   


















$scope.completeCustomer11=function(){
       
         
      
        var search=  $('#remarks1').val();
        
        
        
       var party= $("input[name='Payer_1']:checked").val();
       
       
      
        
        $( "#remarks1" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':party}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 




 $scope.Getbalance11 = function () {
      
        var l_id=  $('#l_id_1').val();
        var party=  $('#remarks1').val();
       
         var party_type= $("input[name='Payer_1']:checked").val();
           $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
              data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
            }).success(function(data){
                
                
              
                 $scope.opening_balance11 = data.opening_balance;
                 
                
             
            });
            
            
          if(party!='')
            {         
            $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
              data:{'id':party, 'action':'fetch_single_data','tablename':party_type}
             }).success(function(data){
                
                   if(data.error=='0')
                   {
                         
                          $('#remarks1').css("border-color", "red");
                   }
                   else
                   {
                           $scope.accountshead = data;

                           
                           $('#remarks1').css("border-color", "green");
                   }
                
                
             
            });
            
            }
      
      
      
};   





























$scope.fetchSingleData = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/accountheads/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'accountheads'}
    }).success(function(data){

          $scope.name = data.name;
          $scope.phone = data.phone;
          $scope.email = data.email;
          $scope.gst = data.gst;
          
          $scope.fulladdress = data.fulladdress;
        
         
     
    });
};

 $scope.Getbankaccount = function () {
      
      
      
      
      
           $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/bankaccount/fetch_single_data",
              data:{'id':$scope.getbank, 'action':'fetch_single_data','tablename':'bankaccount'}
            }).success(function(data){
                
                
                 $scope.bank_name = data.bank_name;
                 $scope.type = data.type;
                 $scope.account_no = data.account_no;
                 $scope.ifsc_code = data.ifsc_code;
                 $scope.current_amount = data.current_amount;
                 
                
             
            });
      
      
       
};   


$scope.search = function(){
    
    var userid= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
     $scope.customer_id_data= userid;
     
     
      $('#search-view').show();
     $('#exportdatadata').show();
     $scope.fetchSingleData(userid);
   
     $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status);
     $scope.fetchDatagetlegderGroupTotal(userid,fromdate,fromto,payment_status);
    
    
    
    
};

$scope.onview = function(id,billno,pendingamount){
     $('#firstmodalcommison').modal('toggle');
     
     
     $scope.bill_no=billno;
     $scope.payid=id;
     $scope.pendingamount=pendingamount;
     $scope.payamount=pendingamount;
     
  
    
};


 $scope.pointtodriver = function () {
           
           
            var userid= $('#choices-single-default').val();
            var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();
            var payment_status= $('#payment_status').val();
            
            var payment_date= $('#payment_date').val();
            
            var payment_mode_payoff= $('#payment_mode_payoff').val();
            var reference_no= $('#reference_no').val();
            var notes= $('#notes').val();

            var enteramount= parseFloat($('#pendingamount').val());
            var vendor_id= $('#choices-single-default').val();
            var payamount= parseFloat($('#payamount').val());
            var bankaccount= $('#bankaccount').val();
            
           // if(enteramount>payamount)
            //{
                //alert('Your amount too high! change the amount');
            //}
            //else
           // {
                
                   var valuses=0;
                  var valuses1=0;
                  if(bankaccount!=0)
                  {
                       
                     
                    var valuses=1;
                        
                  } 
                  else
                  {
                      alert('Select Payment Account');
                  }
                  
                  
                   if(payment_mode_payoff!=0)
                   {
                       
                     var valuses1=1;
                   
                   } 
                   else
                   {
                      alert('Select Payment');
                   }
                
                
                
                     if(valuses1!=0 && valuses!=0)
                     {
                
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/vendor/save_to_pay",
                        data:{'enteramount':enteramount,'payment_date':payment_date,'account_head_id':$scope.account_head_id,'notes':notes,'bankaccount':bankaccount,'vendor_id':vendor_id,'payamount':payamount,'payment_mode_payoff':payment_mode_payoff,'reference_no':reference_no}
                        }).success(function(data){
                          
                          
                           
                           $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status);
                           $scope.fetchDatagetlegderGroupTotal(userid,fromdate,fromto,payment_status);
                           $('#firstmodalcommison').modal('toggle');
                           
                            $('#payment_mode_payoff').val('');
                               $('#reference_no').val('');
                               $('#pendingamount').val('');
                               $('#notes').val('');
                               $('#bankaccount').val('');
                           
                    
                        });
                        
                     }

                
            //}
           



}


$scope.fetchDatagetlegderGroup = function(id,fromdate,fromto,payment_status){
    $scope.loading = true;
  var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
  
    
    $http.get('<?php echo base_url() ?>index.php/accountheads/fetch_data_get_ledger_view_new_verification?limit=10&deleteid=0&customer_id=2&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status).success(function(data){
      
       $scope.query = {}
      $scope.queryBy = '$';
     
       $scope.loading = false;
      
      $scope.namesDataledgergroup = data;
      
      
      
        var amounttotal = 0;
        for(var i = 0; i < data.length; i++){
            var amount = parseFloat(data[i].amount);
            amounttotal += amount;
        }
      
      
      
        $scope.amounttotal = amounttotal;
      
      
      
      
      
         var payofftotal = 0;
        for(var i = 0; i < data.length; i++){
            var balance = parseFloat(data[i].balance);
            payofftotal += balance;
        }
      
      
      
     
      
        $scope.Payofftotal = payofftotal;
        
        
        
        
        var payouttotal = 0;
        for(var i = 0; i < data.length; i++){
            var Payout = parseFloat(data[i].Payout);
            payouttotal += Payout;
        }
      
      
      
        $scope.Payouttotal = payouttotal;
      
      
      
      
     
      
      
      
      
    });
  };
  
  
  

$scope.UpdateCommsision = function () {
           
            $('#UpdateCommsision').hide();  
            var party1= 1;
            var party2= 1;
            var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();
            var enteramount= parseFloat($('#amount_set').val());
            var totalsumget= parseFloat($('#totalsum').text());

             var payment_date= $('#payment_date_2').val();
            var id= $('#l_id').val();

                var remarks1= $('#remarks1').val();
                var remarks2= $('#remarks2').val();
                var remarks3= $('#remarks3').val();
                var remarks4= $('#remarks4').val();

                       var gst= $('#gst').val();

                       if($('input[name="consider_gst"]').prop("checked") == true){
                 
                         var consider_gst=1
                  
                        }
                        else
                        {
                              var consider_gst=0
                             
                        }


                var value1= $('#value1').val();
                var value2= $('#value2').val();
                var value3= $('#value3').val();
                var value4= $('#value4').val();
             
               
                var totalsum=$('#totalsum').text();

            
                var party_type1= $("input[name='Payer_1']:checked").val();
                var party_type2= $("input[name='Payer_2']:checked").val();
                var party_type3= $("input[name='Payer_3']:checked").val();
                var party_type4= $("input[name='Payer_4']:checked").val();



              
            
           if(party1!='' && party2!='')
           {        


                     


               
                     if(enteramount>0)
                     { 


                      var required1=1;
                      if(value1>0)
                      {
                         if(remarks1=='')
                         {
                            var required1=0;
                            var res="Select CASH  name";
                         }
                      }

                        if(value2>0)
                      {
                         if(remarks2=='')
                         {
                            var required1=0;
                            var res="Select CASH DEPOSIT name";
                         }
                      }


                        if(value3>0)
                      {
                         if(remarks3=='')
                         {
                            var required1=0;
                            var res="Select LEDGER name";
                         }
                      }

                       if(value4>0)
                      {
                         if(remarks4=='')
                         {
                            var required1=0;
                            var res="Select CNN name";
                         }
                      }     


                         if(enteramount!=totalsumget)
                      {


                            var required1=0;
                            var res="Commission Amount Difference";

                      }




                       if(required1==1)
                     { 


                       $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/accountheads/payment_transfer_by_commsison",
                        data:{

                            'id':id,
                            'payment_date':payment_date,
                            'party_type4':party_type4,
                            'party_type3':party_type3,
                            'party_type1':party_type1,
                            'party_type2':party_type2,
                            'consider_gst':consider_gst,
                            'gst':gst,
                            'value1':value1,
                            'value2':value2,
                            'value3':value3,
                            'value4':value4,
                            'remarks1':remarks1,
                            'remarks2':remarks2,
                            'remarks3':remarks3,
                            'remarks4':remarks4,
                            'totalsum':totalsum

                        }
                        }).success(function(data){
                          
                         $('#firstmodalcommisonparty').modal('toggle');
                         $scope.fetchDatagetlegderGroup(1);
                         alert('Payment Transferred');
                    
                        });


                          }
                        else
                        {
                             alert(res);
                             $('#UpdateCommsision').show();  
                        }



                         


                       
                              var customer_id1=remarks1.split("-")[0];
   

                               if(customer_id1>0)
                               {


                                  $http.get('https://erp.zaron.in/customer_balance_cron.php?customer_id='+customer_id1).success(function(datass){});

                              }


                              var customer_id2=remarks2.split("-")[0];
   

                               if(customer_id2>0)
                               {


                                  $http.get('https://erp.zaron.in/customer_balance_cron.php?customer_id='+customer_id2).success(function(datass){});

                              }


                              var customer_id3=remarks3.split("-")[0];
   

                              if(customer_id3>0)
                              {


                                  $http.get('https://erp.zaron.in/customer_balance_cron.php?customer_id='+customer_id3).success(function(datass){});

                              }



                               var customer_id4=remarks4.split("-")[0];
   

                               if(customer_id4>0)
                               {


                                  $http.get('https://erp.zaron.in/customer_balance_cron.php?customer_id='+customer_id4).success(function(datass){});

                               }







                      


                          
                     }
                     else
                     {
                         alert('Enther The Amount');
                     }
                      
           
           }
           else
           {
               
                   alert('Select The Names');
            
           }

                       
                
                
                
                
           
           


};




  
  
  
$scope.fetchDatagetlegderGroupTotal = function(id,fromdate,fromto,payment_status){
    

    var payment_status= $('#payment_status').val();
   $http.get('<?php echo base_url() ?>index.php/accountheads/fetch_data_get_ledger_view_total_new?limit=10&deleteid=0&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status).success(function(data){
      
      
      
      
        
        $scope.totalpayment = data.totalpayment;
        $scope.totalpaid = data.totalpaid;
        $scope.totalblance = data.totalblance;
        
       $scope.getstatus = data.getstatus;
       $scope.totaldebit = data.totaldebit;
        $scope.totalcridit = data.totalcridit;
        $scope.getstatus1 = data.getstatus1;
        $scope.outstanding = data.outstanding;
        
    });
  };
  
  
  
    
  $scope.deleteData = function(id)
  {
    if(confirm("Are you sure you want to remove it?"))
    {
        
   
     
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/products/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'all_ledgers'}
      }).success(function(data){
        
        
            var userid= <?php echo $customer_id; ?>;
            var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();
            var payment_status='<?php echo $_GET['type']; ?>';  
            var party_type= $('#party_type').val();
   
    
             $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status,party_type);
    
        
      }); 
    }
};



  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  $scope.convertData = function(id){
     
   
     $('#credit_data').show();
     
      $http({
      method:"POST",
      url:"<?php echo base_url(); ?>index.php/report/fetch_single_data_by",
      data:{'id':id, 'action':'fetch_single_data','tablename':'all_ledgers'}
      }).success(function(data){
      
      
      
      
       
      $('#customerdata_convert').val(data.party_name);
      $('#customer_id_convert').val(data.customer_id);
      
      $('#customerdata_convert2').val('');
      $('#customer_id_convert2').val('');
      
      
      $('#party_type_data_convert').val(data.party_type);
      $scope.credit_convert = data.credit; 
      $scope.payment_date = new Date(data.create_date); 
      $scope.hidden_id_convert = data.id;
      $scope.submit_button = 'Convert';
        
        
      
     
       });
    
       $('#convertData').modal('toggle');
       
       
       
       
    
};   
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  $scope.convertCommssion = function(){


                        var customerdata1=$('#customerdata_convert').val();
                        var customer_id1=$('#customer_id_convert').val();
                        
                        
                        var customerdata2=$('#customerdata_convert2').val();
                        var customer_id2=$('#customer_id_convert2').val();
                        
                        var notes=$('#notes_convert').val();
                         
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/report/commsionconvert",
                        data:{'credit':$scope.credit_convert,'customerdata1':customerdata1,'customer_id1':customer_id1,'customerdata2':customerdata2,'customer_id2':customer_id2,'notes':notes,'id':$scope.hidden_id_convert,'payment_date':new Date($scope.payment_date)}
                        }).success(function(data)
                        {
                          
                                    $('#convertData').modal('toggle');
                                    var userid= <?php echo $customer_id; ?>;
                                    var fromdate= $('#from-date').val();
                                    var fromto= $('#to-date').val();
                                    var payment_status='<?php echo $_GET['type']; ?>';  
                                    var party_type= $('#party_type').val();
                                    $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status,party_type);
                                                        
                    
                        });

};


  $scope.bankstatementupdate = function(){

    $('#editSave').hide();
                        var customerdata=$('#customerdata').val();
                        var customer_id=$('#customer_id').val();
                        var party_type_data=$('#party_type_data').val();
                        var bankaccount=$('#bankaccount2').val();
                        var payment_mode_payoff=$('#payment_mode_payoff2').val();
                         var notes=$('#name').val();
                         
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/report/updaterecord",
                        data:{'credit':$scope.credit,'customerdata':customerdata,'customer_id':customer_id,'bankaccount':bankaccount,'payment_mode_payoff':payment_mode_payoff,'party_type_data':party_type_data,'id':$scope.hidden_id,'debit':$scope.debit,'notes':notes,'create_date':new Date($scope.create_date)}
                        }).success(function(data)
                        {
                          
                                    $('#editdata').modal('toggle');
                                    var userid= <?php echo $customer_id; ?>;
                                    var fromdate= $('#from-date').val();
                                    var fromto= $('#to-date').val();
                                    var payment_status='<?php echo $_GET['type']; ?>';  
                                    var party_type= $('#party_type').val();
                                    $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status,party_type);
                                                        
                    
                        });

};





 $scope.onviewparty_edit = function(l_id,id,name,dc,cc)
{

    
 $('#savebutton').show();
      $('#UpdateCommsision').hide();
    $('#party1').val(id+'-'+name);
    $('#exampleModalToggleLabelset').html('Pay commission');
    $('#aria-label-set').html('Commission Amount <span style="color:red;">*</span>');
    if(dc>0)
    {
        var amount=dc;
    }
    else
    {
        var amount=cc;
    }
    $('#showfind').show();
    $('#showfind1').hide();
    $('#ordeget').show();
    $('#setc').hide();
    $('#amount').val(amount);
    $('#l_id').val(id);
    $('#getbankdata').show();  
    $('#firstmodalcommisonparty').modal('toggle');
    
};



 $scope.statusupdate = function(status,statusname)
{
             
             var l_id=$('#l_id').val();
               $http({
      method:"POST",
      url:"<?php echo base_url(); ?>index.php/accountheads/statusupdate",
      data:{'id':l_id,'status':status,'statusname':statusname, 'action':'fetch_single_data','tablename':'all_ledgers'}
      }).success(function(data){
                  
                  alert(statusname);
                  $('#firstmodalcommisonparty').modal('toggle');    
                  $scope.fetchDatagetlegderGroup(1);
  
             
         });

 }

 $scope.onviewparty_edit_new = function(l_id,id,name,dc,cc)
{
 

      $('#UpdateCommsision').show();
    
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
    
    $('#firstmodalcommisonparty').modal('toggle');



     $http({
      method:"POST",
      url:"<?php echo base_url(); ?>index.php/report/fetch_single_data_by",
      data:{'id':l_id, 'action':'fetch_single_data','tablename':'all_ledgers'}
      }).success(function(data){
      
     

     $('#payment_date_2').val(data.c_payment_date);
     
        
   $scope.party_type1=data.party_type1;
              $scope.party_type2=data.party_type2;
               $scope.party_type3=data.party_type3;
                $scope.party_type4=data.party_type4;
                $scope.consider_gst = data.consider_gst;

           $('#value1').val(data.value1);
           $('#value2').val(data.value2);
           $('#value3').val(data.value3);
           $('#value4').val(data.value4);
     $('#gst').val(data.gstamount);
           $('#remarks1').val(data.remarks1);
           $('#remarks3').val(data.remarks3);
           $('#remarks2').val(data.remarks2);
           $('#remarks4').val(data.remarks4);

           $('#totalsum').text(data.totalsum);

            var sumtot= parseFloat($('#amount_set').val());
          var totalsumval=parseFloat(data.totalsum);
          var totalset=sumtot-totalsumval;
          $('#Difference').text(totalset);


           if(data.totalsum!=amount)
           {
                 
                 $('#UpdateCommsision').hide();
           }
           else
           {
                $('#UpdateCommsision').show();
           }





      });



    
};



$scope.completeCustomer9=function(){
       
        
      
        var search=  $('#customerdata').val();
        
        var party_type_data=  $('#party_type_data').val();
        
        $("#customerdata" ).autocomplete({
        source: $scope.availableTags
        });
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':party_type_data}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 






  
    $scope.Getbalance9 = function () {
      
      
        var party=  $('#customerdata').val();
      
      
           $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/customer/fetch_balance_by_data",
              data:{'id':party, 'action':'fetch_single_data','tablename':'5'}
            }).success(function(data){
                
                
              
                 $scope.opening_balance9 = data.opening_balance;
                 
                
             
            });
            
              if(party!='')
            {
               $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
              data:{'id':party, 'action':'fetch_single_data','tablename':'5'}
             }).success(function(data){
                
                   if(data.error=='0')
                   {
                        $('#editSave').hide();
                        //alert('Name Not Found'); 
                          $('#UpdateCommsision').hide();
                         $('#savebutton').hide();
                        $('#customerdata').css("border-color", "red");
                   }
                   else
                   {
                        
                         $('#editSave').show();
                           $('#UpdateCommsision').show();
                         $('#savebutton').show();
                         $('#customerdata').css("border-color", "green");
                   }
                
                
             
            });
            
            }
            
            
            
      
      
      
};   

    
     $scope.completeCustomer2=function(){
       
        
      
        var search=  $('#customerdata_convert2').val();
        
           var party= 1;
        
        $( "#customerdata_convert2" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':party}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 
    
  
   $scope.Getbalance23 = function () {
      
      
        var party=  $('#customerdata_convert2').val();
        var party_type= 1;
      
     
           $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
              data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
            }).success(function(data){
                
                
              
                 $scope.opening_balance2 = data.opening_balance;
                 
                
             
            });
            
            
              if(party!='')
            {
            
               $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
              data:{'id':party, 'action':'fetch_single_data','tablename':party_type}
             }).success(function(data){
                
                   if(data.error=='0')
                   {
                        $('#convertSave').hide();
                        $('#UpdateCommsision').hide();
                         $('#savebutton').hide();
                        //alert('Name Not Found'); 
                        $('#customerdata_convert2').css("border-color", "red");
                   }
                   else
                   {
                        
                         $('#convertSave').show();
                         $('#UpdateCommsision').show();
                         $('#savebutton').show();
                         $('#customerdata_convert2').css("border-color", "green");
                   }
                
                
             
            });
            
            }
            
            
            
      
      
      
};  
  
  
  
  
  
  


$scope.Payee2 = function(){
    
    $('.show2').toggle();
};

$scope.onviewparty = function(){
     
     $('#l_id').val('0');
     $('#savebutton').show();  
     $('#getbankdata').hide(); 



      $('#showfind1').hide();
      $('#showfind').show();

      $('#savebutton').show();
      $('#UpdateCommsision').hide();
   
      $('#exampleModalToggleLabelset').html('Internal Transaction');
      $('#aria-label-set').html('Enter The Amount <span style="color:red;">*</span>');

     $('#firstmodalcommisonparty').modal('toggle');
    
};

$scope.completeCustomer1=function(){
       
        $('#savebutton').show(); 
      
        var search=  $('#party1').val();
        
        
        
       var party= $("input[name='Payer1']:checked").val();
       
       
      
        
        $( "#party1" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':party}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 
    
    
    
    
    
$scope.completeCustomer22=function(){
       
        
      
        var search=  $('#party2').val();
        
           var party= $("input[name='Payer2']:checked").val();
        
        $( "#party2" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':party}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 
    
    
    

 $scope.Getbalance1 = function () {
      
        var l_id=  $('#l_id').val();
        var party=  $('#party1').val();
        var party_type= $("input[name='Payer1']:checked").val();
      
           $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
              data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
            }).success(function(data){
                
                
              
                 $scope.opening_balance1 = data.opening_balance;
                 
                
             
            });
            
            
          if(party!='')
            {         
            $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
              data:{'id':party, 'action':'fetch_single_data','tablename':party_type}
             }).success(function(data){
                
                   if(data.error=='0')
                   {
                        $('#savebutton').hide();
                         $('#UpdateCommsision').hide();
                       // alert('Name Not Found'); 
                        $('#party1').css("border-color", "red");
                   }
                   else
                   {
                        $scope.accountshead = data;


                        if(l_id>0)
                        {
                             $('#UpdateCommsision').show();
                             $('#savebutton').hide();
                        }
                        else
                        {
                            $('#UpdateCommsision').hide();
                            $('#savebutton').show();
                        }


                         $('#party1').css("border-color", "green");
                   }
                
                
             
            });
            
            }
      
      
      
};   












 $scope.Getbalance2 = function () {
      
      
        var party=  $('#party2').val();
         var l_id=  $('#l_id').val();
        var party_type= $("input[name='Payer2']:checked").val();
      
           $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
              data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
            }).success(function(data){
                
                
              
                 $scope.opening_balance2 = data.opening_balance;
                 
                
             
            });
            
            
            
            
            
            if(party!='')
            {
                
            
             $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
              data:{'id':party, 'action':'fetch_single_data','tablename':party_type}
             }).success(function(data){
                
                   if(data.error=='0')
                   {
                        $('#savebutton').hide();
                        //alert('Name Not Found'); 
                          $('#UpdateCommsision').hide();
                         $('#savebutton').hide();
                        $('#party2').css("border-color", "red");
                   }
                   else
                   {
                          if(l_id>0)
                        {
                             $('#UpdateCommsision').show();
                             $('#savebutton').hide();
                        }
                        else
                        {
                            $('#UpdateCommsision').hide();
                            $('#savebutton').show();
                        }
                        


                         //$('#savebutton').show();
                         $('#party2').css("border-color", "green");
                   }
                
                
             
            });
            
            }
      
      
      
};   




 $scope.Getbalance3 = function () {
      
      
        var party=  $('#party3').val();
        var party_type= $("input[name='Payer3']:checked").val();
      
           $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
              data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
            }).success(function(data){
                
                
              
                 $scope.opening_balance3 = data.opening_balance;
                 
                
             
            });
            
            
            
            
            
            if(party!='')
            {
                
            
             $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
              data:{'id':party, 'action':'fetch_single_data','tablename':party_type}
             }).success(function(data){
                
                   if(data.error=='0')
                   {
                        $('#savebutton').hide();
                        //alert('Name Not Found'); 
                          $('#UpdateCommsision').hide();
                         $('#savebutton').hide();
                        $('#party3').css("border-color", "red");
                   }
                   else
                   {
                        
                         $('#savebutton').show();
                           $('#UpdateCommsision').show();
                         $('#savebutton').show();
                         $('#party3').css("border-color", "green");
                   }
                
                
             
            });
            
            }
      
      
      
};   




   

$scope.completeCustomer3=function(){
       
        
      
        var search=  $('#party3').val();
        
           var party= $("input[name='Payer3']:checked").val();
        
        $( "#party3" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':party}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 
    
































    
$scope.transfer = function () {
           
            $('#savebutton').hide();  
            var party1= $('#party1').val();
            var party2= $('#party2').val();
            var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();
            var enteramount= parseFloat($('#amount').val());
            var notes= $('#notes_r').val();
             
             var party_type1= $("input[name='Payer1']:checked").val();
             var party_type2= $("input[name='Payer2']:checked").val();
              
            
           if(party1!='' && party2!='')
           {        
               
                     if(enteramount>0)
                     {       
                          var enteramount2= parseFloat($('#amount2').val());
                          if(enteramount2>0)
                          {
                              var totalamount= enteramount+enteramount2;
                              
                          }
                          else
                          {
                              var totalamount= enteramount;
                          }
                           
                          
                          
                          
                          
                          
                          $scope.saveTransfer(party1,party2,fromdate,fromto,totalamount,notes,party_type1,party_type2);
                          $scope.saveTransfer1(party2,party1,fromdate,fromto,enteramount,notes,party_type2,party_type1);
                          
                          
                          var party3= $('#party3').val();
                          var enteramount2= parseFloat($('#amount2').val());
                          var party_type3= $("input[name='Payer3']:checked").val();
                          if(enteramount2>0)
                          {
                                $scope.saveTransfer1(party3,party1,fromdate,fromto,enteramount2,notes,party_type3,party_type1);
                          }
                         
                         
                        $('#party1').val('');
                        $('#party2').val('');
                        $('#party3').val('');
                        $('.show2').hide();
                        $('#amount2').val('');
                        $('#amount').val('');
                        $('#notes_r').val('');
                          
                     }
                     else
                     {
                         alert('Enther The Amount');
                     }
                      
           
           }
           else
           {
               
                   alert('Select The Names');
            
           }

                       
                
                
                
                
           
           


};


$scope.saveTransfer = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2){



 var payment_date= $('#payment_date_1').val();
  var l_id= $('#l_id').val();
 
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer",
                        data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'l_id':l_id,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2}
                        }).success(function(data){
                          
                         
                    
                        });

};



$scope.saveTransfer1 = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2){

var payment_date= $('#payment_date_1').val();
 var l_id= $('#l_id').val();

var bankaccount= $('#bankaccount1').val();

                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer1",
                        data:{'notes':notes,'payment_date':payment_date,'bankaccount':bankaccount,'enteramount':enteramount,'l_id':l_id,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2}
                        }).success(function(data){
                          
                          
                           
                         location.reload();

                    
                        });

};


  
  
  
  
  
  
  
  

});
 function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }



</script>
    <?php include ('footer.php'); ?>
</body>


