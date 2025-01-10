<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 

$active1="active";
$active2="";
$active3="";
$active4="";
$active5="";
$active6="";
$active7="";
$active8="";
$order_base="0";
if(isset($_GET['view']))
{
$active1="";
$active2="";
$active3="";
$active4="";
$active5="";
$active6="active";
$order_base="5";
$active7="";
$active8="";  
}


 ?>
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
<style type="text/css">
      div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block;
}
table.table.align-middle.table-nowrap.newBorderedTable {
    font-size: 11px;
}
span#showcheck {
    display: inline-block;
}

.trpoint {
    
    cursor: pointer;
   
}
.nav-tabs-custom.card-header-tabs .nav-link {
    padding: 13px 10px;
    font-weight: 700;
    font-size: 11px;
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
.dropdown-menu
{
    min-width: 12rem;
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
                   
                   <div class="row" style="margin: 13px 0px;">
                                    <div class="col-6">
                                         <div class="page-title-box d-sm-flex align-items-center justify-content-between p-0">
                                            <h4 class="mb-sm-0 font-size-18">Material return List</h4>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        
                                       
                            
                                            
                                        <div class="d-flex justify-content-end gap-2 flex-wrap">
                                            
                                            
                                            
                                             <a class="btn btn-secondary dropdown-toggle" href="#" ng-click="newComplaintcreate()"  role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                               <i class="mdi mdi-plus"></i> Create Material Return
                                             </a>
                                            
                                            
                                            
                                            <!--<div class="dropdown-menu dropdown-menu-end">-->
                                            <!--     <a class="dropdown-item"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasSpec-address" aria-controls="offcanvasSpec-address" href="#"> Existing  Return Create</a>-->
                                            <!--     <a class="dropdown-item"   href="<?php echo base_url(); ?>">Old Return Create</a>-->
                                                
                                            <!--</div>-->
                                          
                                           
                                            
                                            
                                            
                                           
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
                                                   <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist" ng-init="getcount('order_sales_return_complaints')">
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     <?php
                                                        // Shop Team
                                                        if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                                                        {
                                                            
                                                            ?>
                                                            
                                                            
                                                      <!-- <li class="nav-item">
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('order_sales_return_complaints',10)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">MATERIAL RETURN &nbsp;&nbsp;<span class="badge rounded-pill bg-primary  float-end"> {{pending_driver}} </span></span> 
                                                         </a>
                                                      </li>-->
                                                      
                                                      
                                                       <li class="nav-item ">
                                                         <a class="nav-link active" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('order_sales_return_complaints',2)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">RETURN COMPLETED &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{po}} </span></span>   
                                                          (Return To sale)
                                                         </a>
                                                       </li>
                                                       <input type="hidden" id="order_base" value="10">
                                                       <?php
                                                            
                                                            
                                                        }
                                                        else
                                                        {
                                                             ?>
                                                             
                                                             
                                                         
                                                       <!-- <li class="nav-item">
                                                         <a class="nav-link " data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('order_sales_return_complaints',10)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">MATERIAL RETURN &nbsp;&nbsp;<span class="badge rounded-pill bg-primary  float-end"> {{pending_driver}} </span></span> 
                                                         </a>
                                                      </li>-->
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link <?php echo $active1; ?>" data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('order_sales_return_complaints',0)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">OPEN &nbsp;&nbsp;<span class="badge rounded-pill bg-primary  float-end"> {{pending}} </span></span> 
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link <?php echo $active2; ?>" data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('order_sales_return_complaints',1)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">DRIVER ASSIGEND &nbsp;&nbsp;<span class="badge rounded-pill bg-warning  float-end"> {{proceed}} </span></span> 
                                                         </a>
                                                      </li>
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link <?php echo $active3; ?>" data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('order_sales_return_complaints',4)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">TRIP STARTED  &nbsp;&nbsp;<span class="badge rounded-pill bg-success  float-end"> {{trip_started}} </span></span> 
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link <?php echo $active4; ?>" data-bs-toggle="tab" href="#profile2" role="tab" ng-click="pageTab('order_sales_return_complaints',6)">
                                                         <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                         <span class="d-none d-sm-block">RESCHEDULE  &nbsp;&nbsp;<span class="badge rounded-pill bg-warning  float-end"> {{re_sudule}} </span></span> 
                                                         </a>
                                                      </li>
                                                      
                                                      
                                                      
                                               
                                                      
                                                      <!--<li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('order_sales_return_complaints',8)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">PENDING APPROVED &nbsp;&nbsp;<span class="badge rounded-pill bg-danger float-end"> {{inward_pending}} </span></span>   
                                                         </a>
                                                      </li>-->
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link <?php echo $active5; ?>" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('order_sales_return_complaints',2)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">RETURN COMPLETED &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{po}} </span></span>   
                                                         (Return To sale)
                                                         </a>
                                                      </li>
                                                      
                                                     <li class="nav-item">
                                                         <a class="nav-link <?php echo $active6; ?>" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('order_sales_return_complaints',5)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">RETURN TO RE-SALE &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{factory_inward}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                      <li class="nav-item">
                                                         <a class="nav-link <?php echo $active7; ?>" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('order_sales_return_complaints',8)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">RETURN TO EXTRA SHEET &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{inward_pending}} </span></span>   
                                                         </a>
                                                      </li>
                                                      
                                                       <!--<li class="nav-item">
                                                         <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('order_sales_return_complaints',10)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">PENDING &nbsp;&nbsp;<span class="badge rounded-pill bg-success float-end"> {{pending_return}} </span></span>   
                                                         </a>
                                                      </li>-->
                                                      
                                                      
                                                       <li class="nav-item">
                                                         <a class="nav-link <?php echo $active8; ?>" data-bs-toggle="tab" href="#messages2" role="tab" ng-click="pageTab('order_sales_return_complaints',3)">
                                                         <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                         <span class="d-none d-sm-block">RETURN REVOKED &nbsp;&nbsp;<span class="badge rounded-pill bg-danger float-end"> {{payment_vendor}} </span></span>   
                                                         </a>
                                                      </li>
                                                     
                                                              <input type="hidden" id="order_base" value="<?php echo $order_base; ?>">
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
                                          <div class="row">
                                              
                                              <div class="col-12">
                                                  <div class="card shadow-none">
                                                      <div class="card-body">
                                                          
                                                          
                                                          
                                                          
                                                          <!--datatable="ng" dt-options="vm.dtOptions"-->
                                                            <input type="hidden" id="nextnumber" value="0">   
                                                            <input type="hidden" id="prenumber" value="10">  
                                                            <input type="hidden" id="pageSize" value="10">  
                                                         
                                                          
                                                          
                                                          
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
                                <button type="button" id="exportdata" class="btn btn-success waves-effect waves-light">Export</button>
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
                                                                          <th>Re-Order No</th>
                                                                          <th>Invoice No</th>
                                                                          <th>Invoice Date</th>
                                                                         
                                                                          <th>Customer</th>
                                                                          
                                                                        
                                                                          <th>Total QTY</th>
                                                                          <td>Total Amount</td>
                                                                          
                                                                          <th>Remarks</th>
                                                                          <th>Status</th>
                                                                         
                                                                          <th>Create By</th>
                                                                          <th>Sales Person</th>
                                                                          <th>Return Date</th>
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
                                                                              
                                                                             
                                                                              {{name.no}}
                                                                              
                                                                             
                                                                              
                                                                         </td>
                                                                          <td>
                                                                              
                                                                             
                                                                              {{name.re_order_no}}
                                                                              
                                                                             
                                                                              
                                                                         </td>
                                                                          
                                                                          <td>
                                                                              
                                                                             
                                                                              {{name.order_no}}
                                                                              
                                                                             
                                                                              
                                                                         </td>
                                                                          
                                                                          
                                                                          
                                                                           <td>{{name.invoice_date}} </td>
                                                                            
                                                                          <td>{{name.customer_id}}</td>
                                                                          <td>{{name.qty}}</td>
                                                                          <td>{{name.amount | number}}</td>
                                                                          <td> 
                                                                            {{name.remarks}}
                                                                            <br>
                                                                            <small>{{name.reason}}</small>
                                                                                
                                                                          </td>

                                                                          <td>
                                                                              
                                                                          <span ng-if="name.order_base==0"><a href="#">Open Order</a>  </span> 
                                                                          <span ng-if="name.order_base==1"><a href="#">Driver Assigend</a>  </span> 
                                                                          <span ng-if="name.order_base==4"><a href="#">Trip Started</a>  </span>
                                                                          <span ng-if="name.order_base==6"><a href="#">Reschedule</a>  </span>
                                                                          <span ng-if="name.order_base==2">
                                                                            

                                                                              <span ng-if="name.driver_delivery_status!='1'"><a href="#" >Return To Sale</a> </span>
                                                                              <span ng-if="name.driver_delivery_status=='1'"><a href="#" >Return Completed</a> </span>
 



                                                                             </span>
                                                                          <span ng-if="name.order_base==5"><a href="#">Return To Re-sale</a>  </span>
                                                                          <span ng-if="name.order_base==8"><a href="#">Return To Extra Sheet</a>  </span>   
                                                                          <span ng-if="name.order_base==3"><a href="#">Return Revoked  </a>  </span>    
                                                                       
                                                                          
                                                                          </td>

                                                                          <td>{{name.order_by}}</td>
                                                                           <td>{{name.sales_person}}</td>
                                                                          <td>
                                                                          {{name.create_date}} 
                                                                          </td>
                                                                          <td>
                                                                               
                                                                               
                                                                               <span ng-if="name.order_base==0">
                                                                                   <a href="#"  ng-click="deleteData(name.id)"><i class="mdi mdi-delete font-size-16 text-danger me-1"></i> Revoke</a>
                                                                               
                                                                               </span>
                                                                               
                                                                               <span ng-if="name.order_base==10">
                                                                                   
                                                                                   <a href="#"  ng-click="viewAddress_inward(name.id,name.driver_return,name.order_base)"><i class="mdi mdi-download font-size-16 text-success me-1"></i> Status View </a>
                                                                               
                                                                               </span>
                                                                               
                                                                                <span ng-if="name.order_base==0">
                                                                               <a href="#"  ng-click="viewAddress(name.id)"><i class="mdi mdi-file font-size-16 text-success me-1"></i> Status View</a>
                                                                               </span>
                                                                               
                                                                                 <span ng-if="name.order_base==2 || name.order_base==5 || name.order_base==8">
                                                                                    <a href="#"  ng-click="viewAddress_inward(name.id,name.driver_return,name.order_base)"><i class="mdi mdi-download font-size-16 text-success me-1"></i> Status View & Inward </a>
                                                                                </span>
                                                                               
                                                                              
                                                                                <?php
                                                        // Shop Team
                                                        if($this->session->userdata['logged_in']['access']=='1')
                                                        {
                                                            
                                                            ?>

   <span><a href="#"  ng-click="deleteDataRow(name.id)"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Delete</a> </span>
                                                                                    

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
   
   
   
   
   
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Create Material  Return</h5>
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
                           
                           
                           
                             <div style="display: flex;">
                                <label class="radio-inline">
                                  <input type="radio" name="optradio"  checked value="1" ng-click="changeConvert(1)">  Return Create &nbsp;&nbsp;&nbsp;&nbsp;
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="optradio"  value="2" ng-click="changeConvert(2)"> Old Return Create  &nbsp;&nbsp;&nbsp;&nbsp;
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="optradio"  value="3" ng-click="changeConvert(3)"> Long delivery pending sales return
                                </label>
                  
                           </div>
                           
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Search Customer <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="autocomplete" class="form-control" required name="autocomplete" ng-keyup="completeProduct()" ng-blur="getPurchaseorderid()"  placeholder="Search Customer"  type="text">
                            </div>
                          </div>
                        </div>
                      
            
                       
                        
                        <div class="col-md-6" id="displayset">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Sales Invoice No <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                                
                                
                                <input type="hidden" id="order_no_data">
                                
                                <select class="form-control"  id="order_no" required name="order_no" ng-change="getProductlist()" ng-model="order_no">
                                    <option value="">Select Invoice No</option>
                                    <option ng-repeat="namesorder in namesDataproductorderno" value="{{namesorder.order_no}}"> {{namesorder.order_no}} </option>
                                </select>


                              
                               <p id="msgdata" style="color: red;">{{reason}}</p>
                            
                            
                            </div>
                          </div>
                        </div>
                      
                        
                      
                        
                        
                      
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Return Date <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="return_date" class="form-control"  name="create_date" required ng-model="create_date" type="date">
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
                            
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" id="save" value="CREATE">
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
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Status History</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ng-click="modelClose()"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               
                                                               
                                                              
                                                                
                                                                
                    
         



                       <div class="row">
                           
                           <div ng-init="fetchDataproducts()" ng-show="namesDataproducts.length>0">
                              <h3>Return Products</h3>
                                                                  
                               <div class="card-body p-0"  >
                                  <div class="table-rep-plugin" ng-repeat="namecate in namesDatacate" >
                                    <h5 class="customTableHeading" >{{namecate.no}}. {{namecate.categories_name}}</h5>
                                                                
                                     <div class="table-responsive customTableDesign mb-0" data-pattern="priority-columns">
                                              <table id="datatable_{{namecate.categories_id}}" class="table table-bordered dt-responsive  nowrap w-100 salestable">
                                                 <thead class="bg-gray text-red" ng-if="namecate.categories_id==1">
                                                    <tr>
                                                          <th>S.No</th>
                                                          <th>Products</th>
                                                          <th>UOM</th>
                                                          <th ng-if="namecate.labletype==2 || namecate.labletype==1"  style="padding-bottom:0px">{{namecate.lable}}</th>
                                                          <th ng-if="namecate.labletype==2">Length</th>
                                                          <!-- <th>ORG NOS</th> -->
                                                           <th ng-if="namecate.labletype==2 || namecate.labletype==1" style="padding-bottom:0px">{{namecate.lablenos}}</th>
                                                          <th>Net Rate</th>
                                                          <th ng-if="commission_check==1"> Commission</th>
                                                          <th>{{namecate.uom}}</th>
                                                          <th ng-if="namecate.uom=='Kg' || namecate.categories_id==34 || namecate.categories_id==36 || namecate.categories_id==626">Actual Kg</th>
                                                          <th>Amount</th>
                                                          <th>Weight</th>
                                                          <th class="table-width-10"  colspan="2" style="text-align: center;">Attachment</th>
                                                           
                                                       
                                                    </tr>
                                                 </thead>

                                                  <thead class="bg-gray text-red" ng-if="namecate.categories_id!=1">
                                                    <tr>
                                                          <th>S.No</th>
                                                          <th style="display:none;">Return Status</th>
                                                          <th>Products</th>
                                                          <th ng-if="namecate.labletype==4">Tile Material</th>
                                                          <th ng-if="namecate.labletype==16 ||namecate.labletype==19">Material Specfication</th>
                                                          <th class="table-width-15" ng-if="namecate.labletype==19">Remarks</th>
                                                          <th class="table-width-15" ng-if="namecate.labletype==19">Coil_no </th>
                                                          <th ng-if="namecate.categories_id==592">Description</th>
                                                          <th ng-if="namecate.labletype!=9">UOM</th>
                                                          <th class="table-width-15" ng-if="namecate.labletype==19">Coil_Status </th>
                                                          <th ng-if="namecate.labletype==5 || namecate.labletype==6">Billing Option</th>
                                                          <th ng-if="namecate.labletype==11 || namecate.labletype==12">Dim 1</th>
                                                          <th ng-if="namecate.labletype==11 || namecate.labletype==12">Dim 2</th>
                                                          <th ng-if="namecate.labletype==12">Dim 3</th>
                                                          <th ng-if="namecate.labletype==8 || namecate.labletype==1 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==4 || namecate.labletype==15" style="padding-bottom:0px">{{namecate.lable}}</th>
                                                          <th ng-if="namecate.labletype==8 && namecate.categories_id != 32"  style="padding-bottom:0px">Extra {{namecate.lable}}</th>
                                                          <th ng-if="namecate.labletype==8" style="display:none;"  style="padding-bottom:0px">Back {{namecate.lable}}</th>
                                                          <th ng-if="(namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==1 || namecate.labletype==6 || namecate.labletype==15) && namecate.categories_id !=5 && namecate.categories_id !=611 && namecate.categories_id !=627"  style="padding-bottom:0px">{{namecate.lable2}}</th>
                                                          <!-- <th ng-if="namecate.labletype!=9">ORG NOS</th> -->
                                                          <th ng-if="namecate.labletype!=9">{{namecate.lablenos}}</th>
                                                          <th ng-if="namecate.labletype==1 || namecate.labletype==2 || namecate.labletype==3 || namecate.labletype==4 || namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==8 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==13 || namecate.labletype==14"> {{namecate.lablefact1}}  {{namecate.lablefact2}}</th>
                                                          <th>Net Rate</th>
                                                          <th class="table-width-10 comdisplay" ng-if="commission_check==1"> Commission</th>
                                                          <th>{{namecate.uom}}</th>
                                                          <th ng-if="namecate.uom=='Kg' || namecate.categories_id==34 || namecate.categories_id==36 || namecate.categories_id==626">Actual Kg</th>
                                                          <th>Amount</th>
                                                          <th>Weight</th>
                                                          <th ng-if="namecate.cate_status==1"  colspan="2" style="text-align: center;">Attachment</th>
                                                        
                                                    </tr>
                                                  </thead>

                                                 
                                                 <tbody  ng-repeat="name in namesDataInward|orderBy:column:reverse" ng-if="namecate.categories_id==1">
                                                    <tr  ng-style="name.rate_edit == 1 && {'color':'red'}"    class="view" ng-if="namecate.categories_id==name.categories_id_get && namecate.type==name.type">
                                                     
                                                     
                                                      <td data-label="S No"><label for="nn_{{name.id}}" style="margin-bottom:0px;">{{name.no}}</label></td>
                                                      <td title="{{name.categories}}"  data-label="Products">{{name.product_name_tab}}</td>
                                                      <td data-label="UOM">
                                                              <span ng-if="name.uom == '3'">FEET</span>
                                                              <span ng-if="name.uom == '4'">MM</span>
                                                              <span ng-if="name.uom == '5'">MTR</span>
                                                              <span ng-if="name.uom == '6'">INCH</span>
                                                      </td>
                                                      <td data-label="{{namecate.lable}}">{{name.profile_tab}}</td>
                                                      <td ng-if="namecate.labletype==2" data-label="Crimp">{{name.crimp_tab}}</td>
                                                      <!-- <td>{{name.reorg_orgnos}}</td> -->
                                                      <td data-label="Nos">{{name.nos_tab}}</td>
                                                      <td data-label="Rate">{{name.rate_tab}}</td>
                                                      <td ng-if="commission_check==1" data-label="Commission">{{name.commission_tab}}</td>
                                                      <td data-label="Qty" ng-if="namecate.uom=='Kg' || namecate.categories_id==34 || namecate.categories_id==36 || namecate.categories_id==626">{{name.activel_qty}}</td>
                                                      <td  data-label="Qty"> {{name.qty_tab}}</td>
                                                      <td id="amount_{{name.id}}" data-label="Amount" class="amounttot_{{namecate.categories_id}}">{{name.amount_tab}}</td>
                                                      <td class="sd ">{{name.weight}}</td>
                                                       <td ng-if="name.cate_status==1">{{name.sub_product_name_tab}}</td>
                                                      <td  ng-if="name.reference_image!=0">
                                                          <a href="{{name.reference_image}}" style="margin: 15px 5px;" target="_blank"> <img src="{{name.reference_image}}" style="width: 75%;border: #4a4a4a solid 1px;"> </a>
                                                       </td>
                                                     
                                                      
                                                     
                                                    </tr>
                                                 </tbody>
                                                 
                                                 <tbody  ng-repeat="name in namesDataInward|orderBy:column:reverse" ng-if="namecate.categories_id!=1">
                                                    <tr  ng-style="name.rate_edit == 1 && {'color':'red'}" class="view" ng-if="namecate.categories_id==name.categories_id_get">
                                                          <td data-label="S No"><label for="nn_{{name.id}}" style="margin-bottom:0px;"> {{name.no}}  </label></td>
                                                          <td title="{{name.categories}}" data-label="Products">{{name.product_name_tab}}</td>
                                                          <td  ng-if="namecate.labletype==4 || namecate.labletype==16 || namecate.labletype==19 || namecate.categories_id==592" data-label="Sub Products">{{name.tile_material_name}}</td>
                                                          <td  ng-if="namecate.labletype==19" data-label="Remarks">{{name.dim_one}}</td>
                                                          <td  ng-if="namecate.labletype==19" data-label="Coil No">{{name.dim_two}}</td>
                                                          <td  ng-if="namecate.labletype!=9" data-label="UOM">
                                                              <span ng-if="namecate.labletype!=14">
                                                                  <span ng-if="name.uom == '2'">SQMTR</span>
                                                                  <span ng-if="name.uom == '3'">FEET</span>
                                                                  <span ng-if="name.uom == '4'">MM</span>
                                                                  <span ng-if="name.uom == '5'">MTR</span>
                                                                  <span ng-if="name.uom == '6'">INCH</span>
                                                                  <span ng-if="name.uom == '7'">KG</span>
                                                                  <span ng-if="name.uom == '8'">SFT</span>
                                                              </span>
                                                             <span ng-if="namecate.labletype==14">
                                                                   NOS
                                                              </span>
                                                          </td>
                                                      
                                                          <td  ng-if="namecate.labletype==19" data-label="Coil No">
                                                                <span ng-if="name.dim_three == 'OPEN COIL'">OPEN COIL</span>
                                                                <span ng-if="name.dim_three == 'CLOSED COIL'">CLOSED COIL</span>
                                                          </td>
                                                      
                                                          <td ng-if="namecate.labletype==11 || namecate.labletype==12" data-label="Dim 1">{{name.dim_one}}</td>
                                                          <td ng-if="namecate.labletype==11 || namecate.labletype==12" data-label="Dim 2">{{name.dim_two}}</td>
                                                          <td ng-if="namecate.labletype==12" data-label="Dim 3">{{name.dim_three}}</td>
                                                          <td  ng-if="namecate.labletype==5 || namecate.labletype==6" data-label="Billing Options">
                                                              <span ng-if="name.billing_options == 1">Running MTR</span>
                                                              <span ng-if="name.billing_options == 2">KG</span>
                                                              <span ng-if="name.billing_options == 3">SQM MTR</span>
                                                              <span ng-if="name.billing_options == 4">Running Ft</span>
                                                              <span ng-if="name.billing_options == 5">Nos</span>
                                                          </td>
                                                          <td ng-if="namecate.labletype==8 || namecate.labletype==1 ||  namecate.labletype==5 || namecate.labletype==6  || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==15 || namecate.labletype==4" data-label="{{namecate.lable}}">{{name.profile_tab}}</td>
                                                          
                                                          <td ng-if="(namecate.labletype==1 || namecate.labletype==6 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==8) && namecate.categories_id !=5 && namecate.categories_id !=611 && namecate.categories_id !=627 && namecate.categories_id != 32"  data-label="{{namecate.lable2}}">{{name.crimp_tab}}</td>
                                                          <!-- <td ng-if="namecate.labletype!=9">{{name.reorg_orgnos}}</td> -->
                                                          <td data-label="Nos" ng-if="namecate.labletype!=9">{{name.nos_tab}}</td>
                                                          
                                                          <td   ng-if="namecate.labletype==1 || namecate.labletype==2 || namecate.labletype==3 || namecate.labletype==4 || namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==8 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==13 || namecate.labletype==14" data-label="Fact">{{name.fact_tab}}</td>

                                                          <td data-label="Rate">{{name.rate_tab}}</td>
                                                     
                                                          <td ng-if="commission_check==1" data-label="Commission" class="comdisplay">{{name.commission_tab}}</td>
                                                       
                                                          <td  data-label="Qty">{{name.qty_tab}}</td>

                                                          <td data-label="Qty" ng-if="namecate.uom=='Kg' || namecate.categories_id==34 || namecate.categories_id==36 || namecate.categories_id==626">{{name.activel_qty}}</td>
                                                       
                                                          <td id="amount_{{name.id}}" data-label="Amount" class="amounttot_{{namecate.categories_id}}">{{name.amount_tab}}</td>

                                                          <td class="sd ">{{name.weight}}</td>
                                                           <td ng-if="name.cate_status==1">{{name.sub_product_name_tab}}</td>
                                                          
                                                          <td ng-if="name.cate_status == 1">

                                                            <span ng-if="name.reference_image!=0" >
                                                              <a href="{{name.reference_image}}" style="margin: 15px 5px;" target="_blank"> <img src="{{name.reference_image}}" style="width: 75%;border: #4a4a4a solid 1px;"> </a></span>
                                                          </td>

                                                          

                                                         
                                                       
                                                       
                                                    </tr>
                                                 </tbody>
                                              </table>
                                      </div>

                              </div>
                            </div>  
                                                                   
                          </div>

                      </div>



                       



                                                  <div ng-init="fetchDataaddress()" ng-show="namesDataaddress.length>0" style="height: 200px;overflow: auto;">
                                                      <h3>History</h3>
                                                                
                                                                <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         <th>No</th>
                                                                         <th>Order No</th>
                                                                         <td>Status</td>
                                                                         <td>Remarks</td>
                                                                         <td>Update Date & Time</td>
                                                                         <td>Created By</td>
                                                                     </tr>
                                                                     <tr  ng-repeat="names in namesDataaddress">
                                                                         <th>{{names.no}}</th>
                                                                         <th>{{names.order_no}}</th>
                                                                         <td>{{names.order_base}}</td>
                                                                          <td>{{names.remarks}}</td>
                                                                          <td>{{names.create_date}}  {{names.create_time}}</td>
                                                                             <td>{{names.user_name}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>


                      



                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->



        </div>
        
        
        
        
        
         <div class="modal fade" id="exampleModalScrollable_2" tabindex="-1" role="dialog"
                                                    aria-hidden="true" id="modelid" >
                                                    <div class="modal-dialog modal-xl" >
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">FACTORY INWARD</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ng-click="modelClose()"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               
                                                               
                                                              
                                                                
                                                                 <form  ng-submit="submitForm_1()" method="post" enctype="multipart/form-data">
                    
                    
                    
         



                       <div class="row">
                           
                                  <div ng-init="fetchDataproducts()" ng-show="namesDataproducts.length>0">
                                                      <h3>Return Products</h3>

                  <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         <th>No</th>
                                                                         <th style="width: 215px;">Product Name</th>
                                                                         <td>ORG NOS</td>
                                                                         <td>NOS</td>
                                                                         <td>QTY</td>
                                                                         <td>Price</td>
                                                                         <td>Total</td>
                                                                         <td>Rack</td>
                                                                         <td>Bin</td>
                                                                         
                                                                     </tr>
                                                                     <tr  ng-repeat="names in namesDataproducts">
                                                                         <th>{{names.no}}</th>
                                                                         <th>{{names.product_name}}</th>
                                                                         <td>{{names.org_nos}}</td>
                                                                         <td>{{names.nos}}</td>
                                                                         <td>{{names.qty}}</td>
                                                                         <td>{{names.rate | number}}</td>
                                                                         <td>{{names.total | number}}</td>
                                                                         <td>
                                                                             
                                                                              <select class="form-control" id="rack_info_{{names.id}}" name="rack_info" ng-change="updateValue('rack_info',names.id)" ng-model="rack_info">
                                                                              <option value="">SELECT</option>
                                                                              <?php
                                                                                  for($i=0;$i<count($alpha);$i++)
                                                                                   {
                                                                                       ?>
                                                                                      
                                                                                             <option value="<?php echo $alpha[$i]; ?>" ng-selected="{{names.rack_info == '<?php echo $alpha[$i]; ?>'}}"><?php echo $alpha[$i]; ?></option>
                                                                                    
                                                                                       <?php
                                                                                    
                                                                                   }
                                                                              ?>
                                                                            </select>
                                                                             
                                                                             
                                                                         </td>
                                                                         <td>
                                                                             
                                                                             <select class="form-control" id="bin_info_{{names.id}}" name="bin_info" ng-change="updateValue('bin_info',names.id)" ng-model="bin_info">
                                                                             
                                                                             
                                                                              <option value="">SELECT</option>
                                                                              <?php
                                                                                  for($j=0;$j<$val;$j++)
                                                                                   {
                                                                                       $valset= $j+1;
                                                                                       ?>
                                                                                      
                                                                                             <option value="<?php echo $j+1; ?>" ng-selected="{{names.bin_info == '<?php echo $valset; ?>'}}"><?php echo $j+1; ?></option>
                                                                                    
                                                                                       <?php
                                                                                    
                                                                                   }
                                                                              ?>
                                                                            </select>
                                                                            </td>
                                                                            
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>
                                                                
                                                                
                      <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Return  Status <span style="color:red;">*</span></label>
                            <div class="col-sm-12" >
                              
                               <select class="form-control order_base" id="order_base_val" required name="order_base" >

                              
                               <option value="0">Return To Sale</option>
                               <option value="2">Return To Re-Sale</option>
                             
                                                                              
                           

                              </select>
                              
                              
                            </div>
                          </div>
                        </div>
                        
                        
                       
                      
                       <div class="col-md-12" style="display:none;" id="showdate">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Scheduled Date <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="return_date_new" class="form-control"   required ng-model="create_date" type="date">
                            </div>
                          </div>
                        </div>
                        
                        

                        
                       <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Remarks </label>
                            <div class="col-sm-12">
                                <textarea rows="4"  id="remarks_2" class="form-control"  name="remarks_2"    ng-model="remarks_2"></textarea>
                            
                            </div>
                          </div>
                        </div>

                    
                      
                     
                        
                        

                        
                     
                  
                        
                     
                        
                               
                        
                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                              <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                              
                              <span id="showcheck" style="display:none;">
                              <input type="checkbox" id="vehicle1" name="vehicle1" value="8">
                              <label for="vehicle1"> Return To Extra Sheet</label><br>
                              </span>
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="UPDATE">
                            </div>
                        </div>

                      </div>



                       



                                                


                      


                    </form>


                                                     <div ng-init="fetchDataaddress()" ng-show="namesDataaddress.length>0" style="height: 200px;overflow: auto;">
                                                      <h3>History</h3>
                                                                
                                                                <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         <th>No</th>
                                                                         <th>Order No</th>
                                                                         <td>Status</td>
                                                                         <td>Remarks</td>
                                                                         <td>Update Date & Time</td>
                                                                          <td>Created By</td>
                                                                     </tr>
                                                                     <tr  ng-repeat="names in namesDataaddress">
                                                                         <th>{{names.no}}</th>
                                                                         <th>{{names.order_no}}</th>
                                                                         <td>{{names.order_base}}</td>
                                                                          <td>{{names.remarks}}</td>
                                                                          <td>{{names.create_date}}  {{names.create_time}}</td>
<td>{{names.user_name}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>


                                      
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->



        </div>
      
        
        
        
        
        
        
    </div>









<script>
$(document).ready(function(){
  $("#exportdatadata").hide();
   
   
    $('#order_base_val').on('change',function()
    {
      
      
      
      
      var val=$(this).val();
      
      if(val==0)
      {
          $('#showdate').show();
      }
      else
      {
          $('#showdate').hide();
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
  
  var order_base = $('#order_base').val();

  
    url = '<?php echo base_url() ?>index.php/report/fetch_sales_return?order_base='+order_base;

 
    location = url;

     });


});
</script>
<script>

var app = angular.module('crudApp', ['datatables']);

app.filter('number', function () {        
    return function (input) {
        if (! isNaN(input)) {
          if(input != 0 && input != null){
              if (isNaN(input)) return input;
        var formattedValue = parseFloat(input);
        // console.log(input.toLocaleString('en-IN').toFixed(2));
         var decimal =  formattedValue.toLocaleString('en-IN', {   minimumFractionDigits: 2, maximumFractionDigits: 2 });

        return decimal
      }else{
        return '0';
      }
      

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
 $scope.getbank=0
    


$scope.create_date=new Date();


    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    
    $scope.tablename='order_sales_return_complaints';
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

 
 $scope.modelClose = function(){
   getData();
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
 
 $scope.getProductlist = function() {

        var order_no = $('#order_no').val();
        

        if (order_no != '') {

          $http.get('<?php echo base_url() ?>index.php/order_check/fetch_product_get_vendor_order_no?order_no=' +
            order_no).success(function(data) {

             $scope.reason=order_no+' -> '+data.reason;



             if(data.status==1)
             {
                   alert(data.msg);
                   $('#save').hide();
             }
             else
             {
                  $('#save').show();
             }

          });

        }

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
         
         
         
        $scope.tablename='order_sales_return_complaints';
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
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Returndelete','tablenamemain':'order_sales_return_complaints'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
         getData();
         $scope.getcount('order_sales_return_complaints');
      }); 
    }
};







$scope.cancelData = function(id){
    if(confirm("Are you sure you want to Cancel it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Cancel','tablenamemain':'order_sales_return_complaints'}
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
      url:"<?php echo base_url() ?>index.php/purchase/getcount_return?tablename="+tabelename,
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.pending = data.pending;
            $scope.pending_driver = data.payment_vendor_invoice;
            $scope.cancel =  data.cancel;
            $scope.po =  data.po;
            $scope.proceed =  data.proceed;
            
            $scope.trip_started =  data.payment_vendor_f;
            $scope.re_sudule =  data.deliverd;
            $scope.factory_inward =  data.dispath;
            
            $scope.payment_vendor =  data.payment_vendor;
            $scope.payment_vendor_f =  data.payment_vendor_f;
            
            $scope.payment_vendor_res =  data.payment_vendor_res;
            
            $scope.archive =   data.archive;
            
              $scope.dispath =  data.dispath;
            $scope.deliverd =  data.deliverd;
            
             $scope.deliverd =  data.deliverd;
            $scope.inward_pending =  data.inward;
             $scope.pending_return =  data.payment_vendor_invoice;

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
        
        
        
        
        
        
        
        
             if(search!='')
            {     
                $http({
                  method:"POST",
                  url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
                  data:{'id':search, 'action':'fetch_single_data','tablename':1}
                 }).success(function(data){
                    
                       if(data.error=='0')
                       {
                            //$('#save').hide();
                           // alert('Name Not Found'); 
                            $('#autocomplete').css("border-color", "red");
                       }
                       else
                       {
                            $scope.accountshead = data;
                             //$('#save').show();
                             $('#autocomplete').css("border-color", "green");
                       }
                    
                    
                 
                });
        
            }
        
        
    
    
    
    
    
    }; 
    
    
    
    
    
    
    
      $scope.completeProduct2=function(id){
    $("#autocompleteproduct").autocomplete({
      source: $scope.availableProducts2
    });
    
     $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchproduct_full2",
      data:{'action':'fetch_single_data'}
      }).success(function(data){

          $scope.availableProducts2 = data;
     
      });
    
    } 
    
    
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
                        
 












$scope.submitForm = function()
{
      
           
        
            var optradio=$('input[name="optradio"]:checked').val();
            
             
              
              if(optradio==1)
              {
            
              
                  $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order_second/sales_return_data_temp",
                  data:{'create_date':$scope.create_date,'remarks':$scope.remarks,'order_no':$scope.order_no}
                  }).success(function(data){
                   
                  if(data.error != '1')
                  {
                            //alert(data.insert_id);
                            window.location.replace("<?php echo base_url(); ?>index.php/order_second/sales_return_to_order?order_id="+data.insert_id+"&order_status=1&optionid=1");
            
                  }
            
                   
                  });
            
              }
               else if(optradio==3)
              {
            
              
                  $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order_second/sales_return_data_temp",
                  data:{'create_date':$scope.create_date,'remarks':$scope.remarks,'order_no':$scope.order_no}
                  }).success(function(data){
                   
                  if(data.error != '1')
                  {
                            //alert(data.insert_id);
                            window.location.replace("<?php echo base_url(); ?>index.php/order_second/sales_return_to_order?order_id="+data.insert_id+"&order_status=1&optionid=3");
            
                  }
            
                   
                  });
            
              }
              else
              {
                  
                  
                  
                   var customer =$('#autocomplete').val();
                  var order_no_data =$('#order_no_data').val();
                  

                  $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order_second/sales_return_data_temp_old",
                  data:{'create_date':$scope.create_date,'remarks':$scope.remarks,'customer':customer}
                  }).success(function(data){
                   
                  if(data.error != '1')
                  {
                            //alert(data.insert_id);
                            window.location.replace("<?php echo base_url(); ?>index.php/order_second/sales_return_to_order?order_id="+data.insert_id+"&order_status=0&optionid=2");
            
                  }
            
                   
                });

                  
                  
                  
                  
                  
                  
                  
                  
              }
            
             
            
      
      
    
  };




$scope.updateValue = function(name,id){
    
   var values=$('#'+name+'_'+id).val();
   
   
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/inward_bin_update",
      data:{'name':name,'id':id,'values':values}
    }).success(function(data){
       
        
    });

};
$scope.updateValueMd = function(name,id){
    
   var values=$('#md_'+name+'_'+id).val();
   
   
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/inward_bin_update",
      data:{'name':name,'id':id,'values':values}
    }).success(function(data){
       
        
    });

};





$scope.submitForm_1 = function(){
      
      
      
        
  
         var extrasheet=$('input[name="vehicle1"]:checked').val();
         
   
      
          var return_date_new=$('#return_date_new').val();
          var order_base=$('#order_base_val').val();
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order_second/sales_return_data_remarks_update",
      data:{'remarks':$scope.remarks_2,'id':$scope.hidden_id,'return_date_new':return_date_new,'extrasheet':extrasheet,'order_base':order_base}
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
            $scope.getcount('order_sales_return_complaints');
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
   $scope.fetchDataproducts(id,'old_return');
  
    
};


$scope.viewAddress_inward = function(id,driver_return,order_base){
    
   $scope.hidden_id=id;
   $('#exampleModalScrollable_2').modal('toggle');
    
    if(order_base==2)
    {
         $('#showcheck').hide();
         $('#showdate').show();
         $('#order_base_val').val('0');
        
    }
    else
    {
        $('#showdate').hide();
        $('#showcheck').show();
        $('#order_base_val').val('2');
         
    }
    
 
   $scope.fetchDataaddress(id);
   $scope.fetchDataproducts(id,'');
  
    
};










  
 // $scope.fetchDataproducts = function(id){
      
 //     $http.get('<?php echo base_url() ?>index.php/order/oder_return_fetch_cp_products?id='+id).success(function(data){
      
      
 //       $scope.namesDataproducts = data.PortalActivity;
 //       console.log("listing ytjhgj");
 //       console.log(data.orderno);
      

 //          $http.get('<?php echo base_url() ?>index.php/order_second/fetchDataCategorybase?order_id='+data.orderno+'&tablename_sub="order_product_list_process"').success(function(data){
 //            $scope.namesDatacate = data;
 //          });
        
 //         $http.get('<?php echo base_url() ?>index.php/order_second/fetch_data?order_id='+data.orderno+'&tablenamemain="orders_process"&tablename_sub="order_product_list_process"').success(function(data){
 //           $scope.namesData = data;
 //         });  

 //    });
        
 //   };
 var baseUrl = '<?php echo base_url(); ?>';

 $scope.fetchDataproducts = function(id,table) {
  $http.get(baseUrl + 'index.php/order/oder_return_fetch_cp_products?id=' + id)
        .then(function(response) {
          var data = response.data;
          $scope.namesDataproducts = data.PortalActivity;
          console.log("listing ytjhgj");
          console.log(data.orderno);
          console.log(data);

          var orderno = data.orderno;

          if(table == 'old_return'){
                var tablenameSub = 'order_product_list_process_return_temp';
                var tablenameMain = 'orders_process_return_temp';
          }else{
                var tablenameSub = 'order_product_list_process';
                var tablenameMain = 'orders_process';
          }
          
          

          // Fetch data by category
          $http.get(baseUrl + 'index.php/order_second/fetchDataCategorybase', {
            params: {
              order_id: orderno,
              fntype: "return",
              tablename_sub: tablenameSub
            }
          }).then(function(response) {
            $scope.namesDatacate = response.data;
          }).catch(function(error) {
            console.error('Error fetching category data:', error);
          });

          // Fetch main data
          $http.get(baseUrl + 'index.php/order_second/fetch_data_return_inward', {
            params: {
              order_id: orderno,
              tablenamemain: tablenameMain,
              tablename_sub: tablenameSub,
              c_id: id
            }
          }).then(function(response) {
            $scope.namesDataInward = response.data;
          }).catch(function(error) {
            console.error('Error fetching main data:', error);
          });

        }).catch(function(error) {
          console.error('Error fetching product data:', error);
        });
    };
  
     $scope.fetchDataaddress = function(id){
      
     $http.get('<?php echo base_url() ?>index.php/order/oder_return_fetch_cp_remarks_fetch?id='+id).success(function(dataaddress){
      
      
       $scope.namesDataaddress = dataaddress;
      
       
     });
        
   };
   
   
    
   
     $scope.getPurchaseorderid = function(){
      
      
     var autocomplete= $('#autocomplete').val();
     var name=autocomplete.split("-");
     var customerid= name[0];
  
     if(customerid!='') 
     {
         
     
     $http.get('<?php echo base_url() ?>index.php/order/fetch_product_get_vendor_order_no?search='+customerid).success(function(data){
      
      
       $scope.namesDataproductorderno = data;
      
        
     });
     
     }
        
   };
   
   
   
   $scope.changeConvert = function (status)
   {
    
         if(status==1)
         {
               $('#displayset').show();
               $('#normalview').hide();
               $('#order_no').prop('required',true);
         }
         else if(status==3)
         {
               $('#displayset').show();
               $('#normalview').hide();
               $('#order_no').prop('required',true);
         }
         else
         {
               $('#displayset').hide();
               $('#normalview').show();
               $('#order_no').prop('required',false);
             
         }
    
 }
   
   

    
$scope.saveDetails = function (event) {





if(event.keyCode==13)
{
   
      var product =$('#autocompleteproduct').val();
      var customer =$('#autocomplete').val();
      var create_date =$('#create_date').val();
       
        

    $http({
      method:"POST",
      url:"<?php echo base_url(); ?>index.php/order/sales_return_data_old_customer",
      data:{'product':product,'customer':customer,'create_date':create_date}
    }).success(function(data){

      if(data.error != '1')
      {
           
           
               $('#order_no_data').val(data.insert_id);
              
               $('#autocompleteproduct').val('');
              
              
      }

    });
    
    
    
    
    
     

}



}
    
    
    
    
    
    
    
$scope.deleteDataRow = function(id,cid){
    
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Returndeleterow','tablenamemain':'order_sales_return_complaints'}
      }).success(function(data){
           $scope.success = false;
           $scope.error = false;
           getData();
           $scope.getcount('order_sales_return_complaints');
      }); 
    
};
    
    
    
    
    
    
  
 
  

});

</script>
         
<?php include ('footer.php'); ?>




</body>

 </html>

