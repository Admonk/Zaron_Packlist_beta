<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
   

</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>






   <div id="layout-wrapper">
         
         <div class="main-content">
            <div class="page-content">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-9">

                        <div class="customer-bill-info mb-3">
                           <div class="row">
                              <div class="col-3">
                                 <label><?php echo $order_title; ?> <span class="badge bg-primary"><?php echo $order_lable; ?></span></label>
                                 <h4 class="mb-sm-0 font-size-18 text-primary"><?php echo $order_no; ?></h4>
                                 
                                 
                              </div>


                              <div class="col-3">
                                 <label>Date</label>
                                 <h4 class="mb-sm-0 font-size-18"><?php echo date('d/m/Y'); ?> <span class="text-muted font-size-14"><?php echo date('h:i A'); ?></span></h4>
                                 
                                  
                                                       
                              </div>
                              
                              <div class="col-3" ng-init="fetchCustomerorderdata()">
                                 <!--<label>Customer by</label>-->
                                 <h6 class="mb-sm-0 font-size-14">{{customername}} <br><span class="text-muted font-size-12">{{customerphone}}</span></h6>
                              </div>
                              
                              



                              <!--<div class="col-4 text-end">-->
                              <!--   <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2 right-bar-toggle"><i class="far fa-address-book me-1"></i> Add Customer</button>-->
                              <!--</div>-->
                              
                              <div class="col-3 text-start">
                                 <div class="dropdown float-end">
                                            <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item right-bar-toggle" ng-click="addon(name.id)" href="#">Create New Customer</a>
                                                <!--<a class="dropdown-item" href="#">Edit</a>-->
                                                <!--<a class="dropdown-item" href="#">View History</a>-->
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center ">
                                            
                                            <div class="flex-1 ms-3 d-none">
                                                <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">Vinayagam Traders</a></h5>
                                                <p class="text-muted mb-0">Locality, 641001, 9876543210</p>
                                            </div>


                                            <div class="d-flex align-items-center">
                                                <div class="mb-3">
                                                  <label class="form-label m-0" for="formrow-password-input">Enter Customer</label>
                                                  <input type="text" class="form-control border-bottom-input " ng-model="customer"  placeholder="Search phone" ng-blur="saveCustomer($event)" id="autocomplete_customer" id="autosearch">
                                                </div>
                                            </div>
                                        </div>
                              </div>


                           </div>
                        </div>

                        <div class="search-info mb-3">
                           <div class="row">
                              <div class="col-12">
                                    <div class="search-box position-relative">
                                          
                                       <input type="text" ng-model="profile" id="autocomplete"  ng-keypress="saveDetails($event)" name="profile" class="form-control rounded border autocomplete" placeholder="Product/Profile/Crimp/Nos/Unit">
                                        <i class="bx bx-subdirectory-right search-icon"></i>
                                         <select class="form-select form-inline border" style="display:none !important;">
                                             <option>Select</option>
                                             <option>Accessories</option>
                                             <option>Products</option>
                                         </select>
                                    </div>
                              </div>
                           </div>
                        </div>
                        <div class="card table-editable-info">
                           <div class="card-body p-0">
                              <div class="table-rep-plugin">
                                 <div class="table-responsive mb-0 table-scroll" data-pattern="priority-columns" ng-init="fetchData()">
                                    <table id="tech-companies-1" class="table">
                                       <thead class="bg-primary text-white">
                                          <tr>
                                             <th>S.No</th>
                                             <th class="table-width-18" data-priority="1">Products</th>
                                             <th class="table-width-8" data-priority="3">Profile</th>
                                             <th class="table-width-8" data-priority="1">Crimp</th>
                                             <th class="table-width-6" data-priority="3">Nos</th>
                                             <th class="table-width-6" data-priority="3">Unit</th>
                                             <th class="table-width-8" data-priority="6">Fact</th>
                                             <th class="table-width-8" data-priority="6">Rate</th>
                                             <th class="table-width-8" data-priority="6">QTY</th>
                                             <th class="table-width-8" data-priority="6">Amount</th>
                                             <th class="table-width-8" data-priority="6">Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>


                                          <tr ng-repeat="name in namesData" class="view">
                                             <th>{{name.no}}</th>
                                            
                                             <td><input type="text"  ng-keyup="inputsave_1(name.id,'product_name')"  readonly id="product_name_{{name.id}}" value="{{name.product_name_tab}}"></td>
                                             <td><input type="text"  ng-keyup="inputsave_1(name.id,'profile')"  id="profile_{{name.id}}" value="{{name.profile_tab}}"></td>
                                             <td><input type="text"  ng-keyup="inputsave_1(name.id,'crimp')" id="crimp_{{name.id}}" value="{{name.crimp_tab}}"></td>
                                             <td><input type="text"  ng-keyup="inputsave_1(name.id,'nos')" id="nos_{{name.id}}" value="{{name.nos_tab}}"></td>
                                             <td><input type="text"  ng-keyup="inputsave_1(name.id,'unit')"  id="unit_{{name.id}}" value="{{name.unit_tab}}"></td>
                                             <td><input type="text"  ng-keyup="inputsave_1(name.id,'fact')" id="fact_{{name.id}}" value="{{name.fact_tab}}"></td>
                                             <td><input type="text"  ng-keyup="inputsave_1(name.id,'rate')"  id="rate_{{name.id}}" value="{{name.rate_tab}}">
                                             <span class="td-info-icons td-competitor-price">
                                                 <button class="btn dropdown-toggle p-0 font-size-12" type="button">
                                                    <i class="fas fa-rupee-sign"></i>
                                                </button>
                                                <div class="dropdown-talbe-menu">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>First Name</th>
                                                                    <th>Last Name</th>
                                                                    <th>Username</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>Mark</td>
                                                                    <td>Otto</td>
                                                                    <td>@mdo</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>Jacob</td>
                                                                    <td>Thornton</td>
                                                                    <td>@fat</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">3</th>
                                                                    <td>Larry</td>
                                                                    <td>the Bird</td>
                                                                    <td>@twitter</td>
                                                                </tr>
                                                            </tbody>
                                        </table>
                                                    </div>
                                                </div>
                                             </span>
                                             </td>
                                             <td><input type="text"  ng-blur="inputsave_1(name.id,'qty')"   id="qty_{{name.id}}" value="{{name.qty_tab}}">
                                             <span class="td-info-icons td-qty-info"><i class="fas fa-info-circle"></i></span></td>
                                             <td id="amount_{{name.id}}">{{name.amount_tab}}</td>
                                             <td>


                                                <i class="bx bx-duplicate font-size-18" ng-click="copyData(name.id)" title="Copy" style="cursor: pointer;"></i>
                                                <i class="mdi mdi-delete font-size-18" ng-click="deleteData(name.id)" title="Delete" style="cursor: pointer;"></i>
                                                <i class="mdi mdi-plus-circle font-size-18"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasSpec" aria-controls="offcanvasSpec" title="Add-on"></i>
                                                <!--ng-click="addon(name.id)"-->
                                             </td>
                                          </tr>
                                        
                                       <!-- <tr class="view">
                                           <th class="">11 <span class="td-info-icons"><i class="mdi mdi-chevron-down"></i></span></th>
                                           <td><input type="text" readonly="" id="product_name_18" value="Ridge Ventilator"></td>
                                           <td><input type="text" id="profile_18" value=""></td>
                                           <td><input type="text" id="crimp_18" value="0"></td>
                                           <td><input type="text" id="nos_18" value="0"></td>
                                           <td><input type="text" id="unit_18" value="0"></td>
                                           <td><input type="text" id="fact_18" value="1.09"></td>
                                           <td><input type="text" id="rate_18" value="200"></td>
                                           <td><input type="text" id="qty_18" value="0"><span class="td-info-icons"><i class="fas fa-info-circle"></i></span></td>
                                           <td id="amount_18" class="ng-binding">0</td>
                                           <td>
                                              <i class="bx bx-duplicate font-size-18" ng-click="copyData(name.id)" title="Copy" style="cursor: pointer;"></i>
                                              <i class="mdi mdi-delete font-size-18" ng-click="deleteData(name.id)" title="Delete" style="cursor: pointer;"></i>
                                              <i class="mdi mdi-plus-circle font-size-18 right-bar-toggle" ng-click="addon(name.id)" title="Add-on"></i>
                                           </td>
                                        </tr>


                                           <tr class="fold">
                                               <td colspan="11">
                                                   <table>
                                                       <tr>
                                                           <th class="ng-binding">1</th>
                                                           <td class="table-width-18"><input type="text" ng-blur="inputsave_1(name.id,'product_name')" readonly="" id="product_name_1" value="ACC - DOWNTAP PIPE CLAMP"></td>
                                                           <td  class="table-width-8"><input type="text" ng-blur="inputsave_1(name.id,'profile')" id="profile_1" value="3"></td>
                                                           <td  class="table-width-8"><input type="text" ng-blur="inputsave_1(name.id,'crimp')" id="crimp_1" value="34"></td>
                                                           <td  class="table-width-8"><input type="text" ng-blur="inputsave_1(name.id,'nos')" id="nos_1" value="34"></td>
                                                           <td  class="table-width-8"><input type="text" ng-blur="inputsave_1(name.id,'unit')" id="unit_1" value="3"></td>
                                                           <td  class="table-width-8"><input type="text" ng-blur="inputsave_1(name.id,'fact')" id="fact_1" value="1.09"></td>
                                                           <td  class="table-width-8"><input type="text" ng-blur="inputsave_1(name.id,'rate')" id="rate_1" value="200"></td>
                                                           <td  class="table-width-8"><input type="text" ng-blur="inputsave_1(name.id,'qty')" id="qty_1" value="417.9256"></td>
                                                           <td id="amount_1" class="ng-binding">83585.12</td>
                                                       </tr>
                                                       
                                                       <tr>
                                                           <th class="ng-binding">1</th>
                                                           <td class="table-width-18"><input type="text" ng-blur="inputsave_1(name.id,'product_name')" readonly="" id="product_name_1" value="ACC - DOWNTAP PIPE CLAMP"></td>
                                                           <td  class="table-width-8"><input type="text" ng-blur="inputsave_1(name.id,'profile')" id="profile_1" value="3"></td>
                                                           <td  class="table-width-8"><input type="text" ng-blur="inputsave_1(name.id,'crimp')" id="crimp_1" value="34"></td>
                                                           <td  class="table-width-8"><input type="text" ng-blur="inputsave_1(name.id,'nos')" id="nos_1" value="34"></td>
                                                           <td  class="table-width-8"><input type="text" ng-blur="inputsave_1(name.id,'unit')" id="unit_1" value="3"></td>
                                                           <td  class="table-width-8"><input type="text" ng-blur="inputsave_1(name.id,'fact')" id="fact_1" value="1.09"></td>
                                                           <td  class="table-width-8"><input type="text" ng-blur="inputsave_1(name.id,'rate')" id="rate_1" value="200"></td>
                                                           <td  class="table-width-8"><input type="text" ng-blur="inputsave_1(name.id,'qty')" id="qty_1" value="417.9256"></td>
                                                           <td id="amount_1" class="ng-binding">83585.12</td>
                                                       </tr>
                                                   </table>
                                               </td>
                                            </tr>-->
                                          
                                          
                                          
                                       </tbody>
                                            
                                       <tfoot>
                                           <tr ng-init="fetchSingleDatatotal()">
                                               <th class="" colspan="5"></td>
                                             <th class="table-width-6"><b style="font-size:12px;">Discount : </b></th>
                                             <th class="table-width-6" colspan="2"><b style="font-size:12px;">
                                                 
                                                 <input type="text" ng-model="discount"  id="saveDiscount" ng-keyup="saveDiscount($event)" class="w-100"> 
                                                 
                                                 
                                                 </b></th>
                                                 
                                                 
                                             <!--<th class="table-width-8"><b style="font-size:12px;">Round Off : </b></th>
                                             <th class="table-width-8" colspan="2"><b style="font-size:12px;"><input type="text" id="" value="" class="w-100"> </b></th>-->
                                             
                                             
                                             <th ><b style="font-size:12px;">Total : </b></th>
                                             <th id="fulltotal"><b style="font-size:12px;">{{fulltotal}} </b></th>
                                             <th></th>
 
                                          </tr>
                                       </tfoot>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>


                        <div class="billing-summary-details w-100"  ng-init="fetchSingleDatatotal()">
                            <div class="row">
                                <div class="col-8 d-flex">
                                    <div class="d-inline pe-5">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Items</span>
                                                <h4 class="mb-2 text-primary">
                                                    {{totalitems}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-inline pe-5">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Total SQFT</span>
                                                <h4 class="mb-2 text-danger">
                                                    {{Meter_to_Sqr_feet}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-inline pe-5">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate"> Discount</span>
                                                <h4 class="mb-2 text-success">
                                                    &#8377; {{discounttotal}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-inline pe-5">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Round Off Total</span>
                                                <h4 class="mb-2">
                                                    &#8377; {{discountfulltotal}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-4">
                                     <div class="d-inline">
                                        <div class="form-group">                     
                                           <div class="form-check" ng-init="fetchCustomerorderdata()">
                                               
                                               
                                               <?php
                                               
                                               if($status_base==1)
                                               {
                                                   ?>
                                                      
                                                      <span ng-if="order_base==3">
                                               
                                                       <input type="checkbox" class="form-check-input" checked  ng-click='checkValRequiest()' name="checkapproved" value="1" id="formrow-customCheck">
                                                       <label class="form-check-label" for="formrow-customCheck">TL Approval Request</label>
                                                      
                                                       </span>
                                                       
                                                       
                                                       
                                                      
                                                       
                                                       
                                                       <span ng-if="order_base==0">
                                                       
                                                       <input type="checkbox" class="form-check-input"  ng-click='checkValRequiest()' name="checkapproved" value="0" id="formrow-customCheck">
                                                       <label class="form-check-label" for="formrow-customCheck">TL Approval Request</label>
                                                      
                                                       </span>
                                                   
                                                   
                                                   <?php
                                               }
                                               elseif($status_base==3)
                                               {
                                                   ?>
                                                   
                                                   <?php
                                               }
                                               elseif($status_base==4)
                                               {
                                                   ?>
                                                   
                                                   <?php
                                               }
                                               else
                                               {
                                                   ?>
                                                   <span ng-if="order_base==1">
                                               
                                                       <input type="checkbox" class="form-check-input" checked  ng-click='checkVal()' name="checkboxEl" value="1" id="formrow-customCheck">
                                                       <label class="form-check-label" for="formrow-customCheck">Move to <?php echo $move; ?></label>
                                                      
                                                       </span>
                                                       
                                                       <span ng-if="order_base==0">
                                                       
                                                       <input type="checkbox" class="form-check-input"  ng-click='checkVal()' name="checkboxEl" value="0" id="formrow-customCheck">
                                                       <label class="form-check-label" for="formrow-customCheck">Move to <?php echo $move; ?></label>
                                                      
                                                  </span>
                                               
                                                   <?php
                                               }
                                               
                                               ?>
                                               
                                               
                                               
                                           </div>
                                        </div>
                                        
                                        
                                               <?php
                                               if($status_base==3)
                                               {
                                                   ?>
                                                   
                                                   <div class="mt-3 hstack gap-3">
                                                    <button type="submit" class="btn btn-success w-md" ng-click="approved(<?php echo $order_id; ?>,1)" id="approved">Sales Approved</button>
                                                    <div class="vr"></div>
                                                    <button type="submit" class="btn btn-primary w-md" ng-click="approved(<?php echo $order_id; ?>,-1)">Sales Rejected</button>
                                                  </div>
                                                   
                                                   <?php
                                               }
                                               elseif($status_base==4)
                                               {
                                                   ?>
                                                   
                                                   <div class="mt-3 hstack gap-3">
                                                    <button type="submit" class="btn btn-success w-md" ng-click="approvedFinance(<?php echo $order_id; ?>,2)" id="approved">Finance Approved</button>
                                                    <div class="vr"></div>
                                                    <button type="submit" class="btn btn-primary w-md" ng-click="approvedFinance(<?php echo $order_id; ?>,-1)">Finance Rejected</button>
                                                  </div>
                                                   
                                                   <?php
                                               }
                                               else
                                               {
                                                   ?>
                                                   
                                                   <div class="mt-3 hstack gap-3">
                                          <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-primary w-md" >Save</a>
                                          <div class="vr"></div>
                                          <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-danger bordered">Cancel</a>
                                         </div>
                                                   
                                                   <?php
                                               }
                                               ?>
                                        
                                        
                                         
                                       
                                       
                                    </div>
                                </div>
                            </div>
                                    
                                    
                        </div>
                                    
                        </div>
                     
                     
                     <div class="col-3 bg-soft-light fixed-sidebar">
                        <!-- Settings -->
                        <div class="p-3">
                           <h5><i class="far fa-address-book pe-2"></i> History <span class="float-end font-size-12 text-success text-decoration-underline history-toggle-tab">Last 3 Quotes</span></h5>
                           <hr class="m-1">
                           
                           <div class="history-tl-container">
                             <ul class="tl d-none">
                               <li class="tl-item" >
                                 
                                 <div class="item-title">Never Enquired Before</div>
                                 <div class="item-detail">on 20/09/2021</div>
                               </li>
                               <li class="tl-item">
                                 
                                 <div class="item-title">New Enquiried received and attend by <a href="">Elakkiya</a>. Enquiry reference number <a href="">ENQ000OCT</a></div>
                                 <div class="item-detail">on 28/09/2021</div>
                               </li>
                               <li class="tl-item">
                                 
                                 <div class="item-title">Throw that goddamn ring in the lava</div>
                                 <div class="item-detail">Also, throw that Gollum too</div>
                               </li>
                             </ul>
                             
                             <p class="text-muted pt-3">No Data Found</p>
                           </div>

                           <div class="last-three-bills">

                              <ul class="nav nav-tabs nav-tabs-custom nav-justified mb-3" role="tablist">
                                   <li class="nav-item">
                                       <a class="nav-link" data-bs-toggle="tab" href="#home1" role="tab" aria-selected="false">
                                           <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                           <span class="d-none d-sm-block">Last Q1</span> 
                                       </a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab" aria-selected="false">
                                           <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                           <span class="d-none d-sm-block">Last Q2</span> 
                                       </a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab" aria-selected="false">
                                           <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                           <span class="d-none d-sm-block">Last Q3</span>   
                                       </a>
                                   </li>
                                   
                               </ul>

                              <div class="tab-content text-muted mb-5">
                                   <div class="tab-pane active" id="home1" role="tabpanel">
                                       <div class="table-responsive">
                                           <table class="table mb-0  table-bordered">
                                               <thead>
                                                   <tr>
                                                       <th>Product</th>
                                                       <th>Spec</th>
                                                       <th>Rate</th>
                                                   </tr>
                                               </thead>
                                               <tbody>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                               </tbody>

                                               <tfoot>
                                                <tr>
                                                <th>23/10/2021</th>
                                                <th><span>9 Items</span></th>
                                                <th class="text-success">39,122.00</th>
                                                </tr>
                                                </tfoot>
                                           </table>
                                       </div>
                                   </div>
                                   <div class="tab-pane" id="profile1" role="tabpanel">
                                       <div class="table-responsive">
                                           <table class="table mb-0  table-bordered">
                                               <thead>
                                                   <tr>
                                                       <th>Product</th>
                                                       <th>Spec</th>
                                                       <th>Rate</th>
                                                   </tr>
                                               </thead>
                                               <tbody>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>1280.00</td>
                                                   </tr>
                                                   
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>1280.00</td>
                                                   </tr>
                                               </tbody>

                                               <tfoot>
                                                <tr>
                                                <th>23/10/2021</th>
                                                <th><span>9 Items</span></th>
                                                <th class="text-danger">39,122.00</th>
                                                </tr>
                                                </tfoot>
                                           </table>
                                       </div>
                                   </div>
                                   <div class="tab-pane" id="messages1" role="tabpanel">
                                       <div class="table-responsive">
                                           <table class="table mb-0  table-bordered">
                                               <thead>
                                                   <tr>
                                                       <th>Product</th>
                                                       <th>Spec</th>
                                                       <th>Rate</th>
                                                   </tr>
                                               </thead>
                                               <tbody>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                                   <tr>
                                                       <td>Bare 0.50 (jsw)</td>
                                                       <td>23,19,78</td>
                                                       <td>5600.00</td>
                                                   </tr>
                                                   
                                               </tbody>

                                               <tfoot>
                                                <tr>
                                                <th>23/10/2021</th>
                                                <th><span>9 Items</span></th>
                                                <th class="text-success">39,122.00</th>
                                                </tr>
                                                </tfoot>
                                           </table>
                                       </div>
                                   </div>
                              </div>
                           </div>
                           
                           <div class="card-header align-items-center d-flex ps-0">
                               <h6 class="card-title mb-0 flex-grow-1"><i class="far fa-address-book pe-2"></i> Report</h6>
                               <div class="flex-shrink-0">
                                    <select class="form-select form-select-sm mb-0 my-n1">
                                        <option value="Oct 11 - Nov 11" selected="">Oct 11 - Nov 11</option>
                                        <option value="Yesterday">Last Month</option>
                                        <option value="Week">Last 3 Month</option>
                                        <option value="Month">Last 6 Month</option>
                                    </select>
                                </div>
                           </div>
                           
                           <p class="text-muted pt-3">No Data Found</p>
                           

                           <div class="row mt-3 d-none">
                              <div class="col-xl-6 col-md-6">
                                 <div class="card mb-3 bg-soft-danger">
                                    <div class="card-body pb-1">
                                       <div class="d-flex align-items-center">
                                          <div class="flex-grow-1">
                                             <span class="text-muted mb-2 lh-1 d-block text-truncate">Total Sales <span class="badge bg-soft-success text-success">+$20.9k</span></span>
                                             <h4 class="mb-1">
                                                $<span class="counter-value" data-target="354.5">354.5</span>k
                                             </h4>
                                             <div class="text-nowrap">
                                                
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-xl-6 col-md-6">
                                 <div class="card mb-3 bg-soft-success">
                                    <div class="card-body pb-1">
                                       <div class="d-flex align-items-center">
                                          <div class="flex-grow-1">
                                             <span class="text-muted mb-2 lh-1 d-block text-truncate">Total Sales <span class="badge bg-soft-success text-success">+$20.9k</span></span>
                                             <h4 class="mb-1">
                                                $<span class="counter-value" data-target="354.5">354.5</span>k
                                             </h4>
                                             <div class="text-nowrap">
                                                
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>


                              <div class="col-xl-6 col-md-6">
                                 <div class="card mb-3 bg-soft-secondary">
                                    <div class="card-body pb-1">
                                       <div class="d-flex align-items-center">
                                          <div class="flex-grow-1">
                                             <span class="text-muted mb-2 lh-1 d-block text-truncate">Total Sales <span class="badge bg-soft-success text-success">+$20.9k</span></span>
                                             <h4 class="mb-1">
                                                $<span class="counter-value" data-target="354.5">354.5</span>k
                                             </h4>
                                             <div class="text-nowrap">
                                                
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>


                           <h6 class="mt-5"><i class="far fa-address-book pe-2"></i> Customer Rating</h6>
                           <hr class="m-1">
                           <div class="row mt-3">
                              <div class="col-xl-12 col-md-6">
                                 <div class="report-column tinycol fifty">
                                   <ul data-animate="colorScale" data-value="55" class="scaleColors">
                                     <li></li><li></li><li></li><li></li>
                                     <div class="scoreTick" style="left: 55%;"></div>
                                   </ul>
                                   <ul class="scaleTicks">
                                     <li>Poor</li>
                                     <li>Not Bad</li>
                                     <li>Good</li>
                                     <li>Excellent</li>
                                   </ul>
                                 </div>
                              </div>
                           </div>


                           <h6 class="mt-3"><i class="far fa-address-book pe-2"></i> Credits Limit <span class="float-end badge bg-soft-success text-success">10K available out of 2L</span></h6>
                           <hr class="m-1">
                           <div class="row mt-3">
                              <div class="col-xl-12 col-md-6">
                                  <div class="skills">
                                     <div class="details">
                                         <span>0</span>
                                         <span>90%</span>
                                     </div>
                                     <div class="bar">
                                         <div id="html-bar"></div>
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
      <!-- END layout-wrapper -->
      <!-- Right Sidebar -->
      <div class="right-bar">
         <div data-simplebar class="h-100">
            <div class="rightbar-title d-flex align-items-center bg-dark p-3">
               <h5 class="m-0 me-2 text-white">Add Customer</h5>
               <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
               <i class="mdi mdi-close noti-icon closeaddon" ></i>
               </a>
            </div>
            <!-- Settings -->
            <hr class="m-0" />
            <div class="p-3">
                
                
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
                    
                    
                    <form id="pristine-valid-example" novalidate method="post"></form>
                
                
                
                           <h5><i class="far fa-address-book pe-2"></i> Add Customer</h5>
                           <hr>
                           
                           <form id="pristine-valid-common" ng-submit="submitForm()" method="post">
                                <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Company name <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="company_name" class="form-control" required name="company_name" ng-model="company_name" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">GST <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="gst" class="form-control" name="gst"   required ng-model="gst" type="gst">
                            </div>
                          </div>
                        </div>
                      
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Office Address line 1 <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="address1" class="form-control" name="address1" required ng-model="address1" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Office Address line 2</label>
                            <div class="col-sm-12">
                             <input id="address2" class="form-control" name="address2"   ng-model="address2" type="address2">
                            </div>
                          </div>
                        </div>
                      </div>
                                <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Pincode <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="pincode" class="form-control" ng-blur="getpencodeDetails($event)" name="pincode" required ng-model="pincode" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Landmark </label>
                            <div class="col-sm-12">
                             <input id="landmark" class="form-control" name="landmark"   ng-model="landmark" type="landmark">
                            </div>
                          </div>
                        </div>

                       
                     
                         

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Zone <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="locality" class="form-control" name="zone" required   ng-model="zone" type="zone">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">City <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="city" class="form-control" name="city" required ng-model="city" type="text">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Locality <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                                
                                <select class="form-control" name="locality" required ng-model="locality">

                              <option value=""> Select locality</option>

                              <?php
                                foreach ($locality as $value) {

                                  ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                                
                            
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">State <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="state" class="form-control" name="state"  required  ng-model="state" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                          <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Google Location Link </label>
                            <div class="col-sm-12">
                             <input id="google_map_link" class="form-control" name="google_map_link"    ng-model="google_map_link" type="text">
                            </div>
                          </div>
                        </div>

                        
                      </div>
                      
                      
                      
                      
                      
                      
                      <h4 class="card-title mt-3">Contact Details </h4>
                     <div class="row">


                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Sales Group <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <select class="form-control" name="sales_group" required ng-model="sales_group">

                              <option value=""> Select Sales Group</option>

                              <?php
                                foreach ($user_group as $value) {

                                  ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Sales Team <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <select class="form-control" name="sales_team_id" required ng-model="sales_team_id">

                              <option value=""> Select Sales Team</option>

                              <?php
                                foreach ($sales_team as $valued) {

                                  ?>
                                       <option value="<?php echo $valued->id; ?>"><?php echo $valued->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                        
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Phone <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="phone" class="form-control" name="phone" required ng-model="phone" type="number" >
                            </div>
                          </div>
                        </div>


                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Landline No</label>
                            <div class="col-sm-12">
                              <input id="landline" class="form-control" ng-model="landline" name="landline" type="number">
                            </div>
                          </div>
                        </div>


                           <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Email</label>
                            <div class="col-sm-12">
                              <input id="email" class="form-control" name="email" ng-model="email" type="email">
                            </div>
                          </div>
                        </div>
                        
                    


                        
                      </div>
                      
                      
                      
                      
                      
                      
                          
                       <div class="row" style="margin: 20px -9px;">
                        <div class="col-md-6">
                          <div class="form-group row">
                            
                            <div class="col-sm-12">
                                <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                             <button type="submit" class="btn btn-primary w-md">Add Customer</button>
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            
                            <div class="col-sm-12">
                              <button type="button" class="btn btn-outline-danger w-md ms-2">Reset</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      
                           
                           
                           </form>
                        </div>
         </div>
         <!-- end slimscroll-menu-->
      </div>



    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasSpec" aria-labelledby="offcanvasSpecLabel">
        <div class="offcanvas-header">
          <h5 id="offcanvasSpecLabel">Specifications</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <form>
               
               <div class="row">
                  <div class="col-md-4">
                      <label>A</label>
                      <div class="d-flex small-input-group">
                          <div class="form-floating form-floating-custom small-input-float mb-4">
                           <input type="email" class="form-control p-2" id="input-email" placeholder="Enter Email" required="">
                           <div class="invalid-feedback">
                              Please Enter Email
                           </div>
                           <label for="input-email" style="left:0">Size</label>
                        </div>
                          <div class="form-floating form-floating-custom small-input-float mb-4">
                           <input type="email" class="form-control p-2" id="input-email" placeholder="Enter Email" required="">
                           <div class="invalid-feedback">
                              Please Enter Email
                           </div>
                           <label for="input-email" style="left:0">Deg</label>
                        </div>
                      </div>
                     
                     
                  </div>
                  <div class="col-md-4">
                      <label>B</label>
                     <div class="d-flex small-input-group">
                          <div class="form-floating form-floating-custom small-input-float mb-4">
                           <input type="email" class="form-control p-2" id="input-email" placeholder="Enter Email" required="">
                           <div class="invalid-feedback">
                              Please Enter Email
                           </div>
                           <label for="input-email" style="left:0">Size</label>
                        </div>
                          <div class="form-floating form-floating-custom small-input-float mb-4">
                           <input type="email" class="form-control p-2" id="input-email" placeholder="Enter Email" required="">
                           <div class="invalid-feedback">
                              Please Enter Email
                           </div>
                           <label for="input-email" style="left:0">Deg</label>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <label>C</label>
                      <div class="d-flex small-input-group">
                          <div class="form-floating form-floating-custom small-input-float mb-4">
                           <input type="email" class="form-control p-2" id="input-email" placeholder="Enter Email" required="">
                           <div class="invalid-feedback">
                              Please Enter Email
                           </div>
                           <label for="input-email" style="left:0">Size</label>
                        </div>
                          <div class="form-floating form-floating-custom small-input-float mb-4">
                           <input type="email" class="form-control p-2" id="input-email" placeholder="Enter Email" required="">
                           <div class="invalid-feedback">
                              Please Enter Email
                           </div>
                           <label for="input-email" style="left:0">Deg</label>
                        </div>
                      </div>
                     
                     
                  </div>
                  <div class="col-md-4">
                      <label>D</label>
                     <div class="d-flex small-input-group">
                          <div class="form-floating form-floating-custom small-input-float mb-4">
                           <input type="email" class="form-control p-2" id="input-email" placeholder="Enter Email" required="">
                           <div class="invalid-feedback">
                              Please Enter Email
                           </div>
                           <label for="input-email" style="left:0">Size</label>
                        </div>
                          <div class="form-floating form-floating-custom small-input-float mb-4">
                           <input type="email" class="form-control p-2" id="input-email" placeholder="Enter Email" required="">
                           <div class="invalid-feedback">
                              Please Enter Email
                           </div>
                           <label for="input-email" style="left:0">Deg</label>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <label>E</label>
                      <div class="d-flex small-input-group">
                          <div class="form-floating form-floating-custom small-input-float mb-4">
                           <input type="email" class="form-control p-2" id="input-email" placeholder="Enter Email" required="">
                           <div class="invalid-feedback">
                              Please Enter Email
                           </div>
                           <label for="input-email" style="left:0">Size</label>
                        </div>
                          <div class="form-floating form-floating-custom small-input-float mb-4">
                           <input type="email" class="form-control p-2" id="input-email" placeholder="Enter Email" required="">
                           <div class="invalid-feedback">
                              Please Enter Email
                           </div>
                           <label for="input-email" style="left:0">Deg</label>
                        </div>
                      </div>
                     
                     
                  </div>
                  <div class="col-md-4">
                      <label>Add New</label>
                      <div class="d-flex small-input-group">
                          <button class="btn-primary add-size-deg w-100"><i class="mdi mdi-plus-circle font-size-18 me-1"></i>Size | Deg</button>
                      </div>
                     
                     
                  </div>
               </div>
               
               <div class="row">
                   <div class="col-md-12">
                       <canvas id="canvas2" class="w-100" height="300" style="border:1px solid #ccc;background:#fff"></canvas>
                   </div>
               </div>
              
               <div class="mt-4">
                  <button type="submit" class="btn btn-primary w-md">Submit</button>
               </div>
            </form>
        </div>
    </div>







 <div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Success</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?php echo $order_title; ?>  : <b><?php echo $order_no; ?> Move to <?php echo $move; ?> </b></p>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>



 <div class="modal fade" id="firstmodal3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Success</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?php echo $order_title; ?>  : <b><?php echo $order_no; ?> TL Request submitted </b></p>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>








 <div class="modal fade" id="firstmodal1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Success</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Approved <?php echo $order_title; ?>  : <b><?php echo $order_no; ?> </b></p>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>


 <div class="modal fade" id="firstmodal2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Success</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Rejected <?php echo $order_title; ?>  : <b><?php echo $order_no; ?> </b></p>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>


 <script type='text/javascript' >
    $( function() {
        
        
        
        $('#save').on('click',function(){
            
            $('#firstmodal').modal('toggle');
            
        });
  
        $( ".autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "<?php echo base_url() ?>index.php/order/fetchproduct",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                
                $('#autocomplete').val(ui.item.label+'/'); // display the selected text
               // save selected id to input
                return false;
            },
            focus: function(event, ui){
                $( "#autocomplete" ).val( ui.item.label );
                
                return false;
            },
        });
        
        
        $( "#autocomplete_customer" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "<?php echo base_url() ?>index.php/customer/customer_search",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                
                $('#autocomplete_customer').val(ui.item.label); // display the selected text
               // save selected id to input
                return false;
            },
            focus: function(event, ui){
                $( "#autocomplete_customer" ).val( ui.item.label );
                
                return false;
            },
        });
        
        
        

        
       
    });

   

</script>
    




<script>

$(document).ready(function(){
    
   $("#autocomplete").focus();
  
    
  $(".closeaddon").click(function(){
    $('.right-bar').css("right", "-395px");
  });
});

var app = angular.module('crudApp', ['datatables']);






app.controller('crudController', function($scope, $http){


               $scope.addon = function(id) {
                        $('.right-bar').css("right", "0px");
               }






               $scope.fetchUsers = function(){


                         var searchText_len = $scope.product_id.trim().length;

                         // Check search text length
                         if(searchText_len > 0){
                             $http({
                             method: 'post',
                             url: '<?php echo base_url() ?>index.php/order/fetchproduct',
                             data: {product_id:$scope.product_id}
                             }).then(function successCallback(response) {
                                 $scope.searchResult = response.data;
                             });
                         }else{
                             $scope.searchResult = {};
                         }
                         
             }

            $scope.setValue = function(index,$event){
                $scope.product_id = $scope.searchResult[index].name;
                $scope.searchResult = {};
                $event.stopPropagation();
            }

            $scope.searchboxClicked = function($event){
                $event.stopPropagation();
            }

            $scope.containerClicked = function(){
                $scope.searchResult = {};
            }


// search end


 

$scope.inputsave_1 = function (id,inputname) {




       var fieds=inputname+'_'+id;
       var values=$('#'+fieds).val();

       var rate= $('#rate_'+id).val();
       var qty= $('#qty_'+id).val();
       var total=rate*qty;
       //$('#amount_'+id).html(total);




   $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
      data:{'inputname':inputname,'values':values,'id':id,'action':'InputUpdate','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {
          
          
           //$scope.fetchData();
           $scope.fetchSingleDatatotal();
           
          
           
           
      }
         
   });

}
















$scope.saveDetails = function (event) {



if(event.keyCode==13)
{



    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
      data:{'product_id':$scope.product_id,'profile':$scope.profile,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {

        
      
        $scope.profile = "";
           
        $scope.fetchData();
        $scope.fetchSingleDatatotal();


      }

    });

}



}






$scope.saveCustomer = function (event) {



//if(event.keyCode==13)
//{
  
  
  var autocomplete_customer=$('#autocomplete_customer').val();
 

 if(autocomplete_customer!="")
 {
     


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/customerupdate?order_id=<?php echo $order_id; ?>",
      data:{'customer':$scope.customer,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {

        
        $scope.customer = "";
           
        $scope.fetchCustomerorderdata();

      }

    });
    
    
 }
 else
 {
     alert('Please fill Customer');
 }
    

//}



}











$scope.saveDiscount = function (event) {



//if(event.keyCode==13)
//{
  
 
  var saveDiscount=$('#saveDiscount').val();
  
  


 if(saveDiscount!="")
 {
     


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/discountupdate?order_id=<?php echo $order_id; ?>",
      data:{'discount':saveDiscount,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {

        
        //$scope.discount = "";
           
        $scope.fetchSingleDatatotal();

      }

    });
    
    
 }
 else
 {
     alert('Please input discount value');
 }
    

//}



}









  $scope.fetchData = function(){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data?order_id=<?php echo $order_id; ?>&tablename_sub=<?php echo $tablename_sub; ?>').success(function(data){
      $scope.namesData = data;
    });
    
   

   
  };

 
 
$scope.fetchSingleDatatotal = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_total?order_id=<?php echo $order_id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

       $scope.fulltotal = data.fulltotal;
       $scope.totalitems = data.totalitems;
       $scope.discounttotal = data.discount;
       $scope.discountfulltotal = data.discountfulltotal;
       $scope.Meter_to_Sqr_feet = data.Meter_to_Sqr_feet;
      
     
    });
};



$scope.fetchCustomerorderdata = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchcustomerorderdata?order_id=<?php echo $order_id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

       $scope.customername = data.company_name;
       $scope.customerphone = data.phone;
       $scope.order_base = data.order_base;
      
     
    });
};























$scope.submitForm = function(){
      
      
      
      
    var ratings=  $('.ratingnum').text();
    
  
      
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/customeradd",
      data:{'status':'1','sales_team_id':$scope.sales_team_id,'google_map_link':$scope.google_map_link,'order_id':'<?php echo $order_id; ?>','phone':$scope.phone,'zone':$scope.zone,'locality':$scope.locality,'city':$scope.city,'state':$scope.state,'pincode':$scope.pincode,'landmark':$scope.landmark,'address1':$scope.address1,'address2':$scope.address2,'company_name':$scope.company_name,'gst':$scope.gst,'landline':$scope.landline,'email':$scope.email,'sales_group':$scope.sales_group,'id':$scope.hidden_id,'action':'Save','tablename':'customers','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

              $scope.success = false;
              $scope.error = true;
              $scope.hidden_id = "";
               $scope.phone = "";
              $scope.errorMessage = data.massage;

          }
          else
          {
             
             
            $scope.fetchCustomerorderdata();
            $scope.success = true;
            $scope.error = false;
            $scope.name = "";
            $scope.email = "";
            $scope.phone = "";
            $scope.city = "";
            $scope.state = "";
            $scope.zone="";
            $scope.address1 = "";
            $scope.address2 = "";
            $scope.company_name = "";
            $scope.locality = "";
            $scope.sales_team_id="";
           
            $scope.google_map_link = "";
            $scope.gst = "";
            $scope.landline = "";
            $scope.landmark = "";

            $scope.pincode = "";


            $scope.sales_group = "";
            $scope.successMessage = data.massage;
          

          }

          

      }

       
    });
  };






    $scope.checkVal = function(){
        
        
         var status=$('input[name="checkboxEl"]:checked').val();
         
         
           if($('input[name="checkboxEl"]').prop("checked") == true){
                   if(confirm("Are you sure you want to move it?"))
                   {
                       var deleteid=0;
                       $('#firstmodal').modal('toggle');
                   }
                   else
                   {
                        var deleteid=1;
                   }
            }
            else
            {
                var deleteid=1;
            }


       
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_move",
              data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
               
               
             
              
               
            });
        
        
     
    }
    
    
    
    
    $scope.checkValRequiest = function(){
        
        
             var status=$('input[name="checkapproved"]:checked').val();
         
         
            if($('input[name="checkapproved"]').prop("checked") == true){
               
               if(confirm("Are you sure you want to move it?"))
               {
                   var deleteid=3;
                   $('#firstmodal3').modal('toggle');
               }
               else
               {
                    var deleteid=0;
               }
               
                
            }
            else
            {
                var deleteid=0;
            }


       
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_request",
              data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
            });
        
        
     
    }






















$scope.getpencodeDetails = function (event) {







 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/pincode",
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.city = data.city;
            $scope.state =  data.state;
            $scope.zone =  data.locality;

    });





}



$scope.deleteData = function(id){
    //if(confirm("Are you sure you want to remove it?"))
    //{
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Deletesub','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){
       
        $scope.fetchData();
         $scope.fetchSingleDatatotal();
         
      }); 
    //}
};





$scope.approvedFinance = function(id,status){
    
            
                    if(status==-1)
                    {
                        if(confirm("Are you sure you want to reject?"))
                        {
                            $('#firstmodal2').modal('toggle');
                            
                            
                            var result=1;
                        }
                        else
                        {
                            var result=0;
                        }
                        
                         
                    }
                    else
                    {
                        
                         if(confirm("Are you sure you want to approved?"))
                        {
                            $('#firstmodal1').modal('toggle');
                            
                            
                            
                           var result=1;
                        }
                        else
                        {
                            var result=0;
                        }
                        
                         
                    }
                    
                    
                    
                    if(result==1)
                    {
                        
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/order_quotation_request_finance",
                                data:{'order_id':id,'order_no':id,'deleteid':status, 'action':'Deletesub','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                               }).success(function(data){
                               
                                $scope.fetchData();
                                 $scope.fetchSingleDatatotal();
                                 
                              }); 
                        
                        
                    }
                    
                    
                    
                   
                    
                    
                      
          
};


$scope.approved = function(id,status){
    
    
                    if(status==-1)
                    {
                        if(confirm("Are you sure you want to reject?"))
                        {
                            $('#firstmodal2').modal('toggle');
                            
                            
                            var result=1;
                        }
                        else
                        {
                            var result=0;
                        }
                        
                         
                    }
                    else
                    {
                        
                         if(confirm("Are you sure you want to approved?"))
                        {
                            $('#firstmodal1').modal('toggle');
                            
                            
                            
                           var result=1;
                        }
                        else
                        {
                            var result=0;
                        }
                        
                         
                    }
    
                    if(result==1)
                   {
                      $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/order_quotation_request",
                        data:{'order_id':id,'order_no':id,'deleteid':status, 'action':'Deletesub','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                      }).success(function(data){
                       
                        $scope.fetchData();
                         $scope.fetchSingleDatatotal();
                         
                      }); 
                   }
};



$scope.copyData = function(id){
    //if(confirm("Are you sure you want to copy it?"))
    //{
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Copy','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){
       
         $scope.fetchData();
         $scope.fetchSingleDatatotal();

      }); 
    //}
};


});


var canvas = document.getElementById("canvas2");
var ctx = canvas.getContext("2d");
var canvasOffset = $("#canvas2").offset();
var offsetX = canvasOffset.left;
var offsetY = canvasOffset.top;
var storedLines = [];
var startX = 0;
var startY = 0;
var isDown;

ctx.strokeStyle = "orange";
ctx.lineWidth = 3;

$("#canvas2").mousedown(function(e) {
  handleMouseDown(e);
});
$("#canvas2").mousemove(function(e) {
  handleMouseMove(e);
});
$("#canvas2").mouseup(function(e) {
  handleMouseUp(e);
});
$("#clear").click(function() {
  storedLines.length = 0;
  redrawStoredLines();
});

function handleMouseDown(e) {
  var mouseX = parseInt(e.clientX - offsetX);
  var mouseY = parseInt(e.clientY - offsetY);
  isDown = true;
  startX = mouseX;
  startY = mouseY;
}

function handleMouseMove(e) {
  if (!isDown) {
    return;
  }
  redrawStoredLines();
  var mouseX = parseInt(e.clientX - offsetX);
  var mouseY = parseInt(e.clientY - offsetY);
  // draw the current line
  ctx.beginPath();
  ctx.moveTo(startX, startY);
  ctx.lineTo(mouseX, mouseY);
  ctx.stroke();
}


function handleMouseUp(e) {
  isDown = false;
  var mouseX = parseInt(e.clientX - offsetX);
  var mouseY = parseInt(e.clientY - offsetY);
  storedLines.push({
    x1: startX,
    y1: startY,
    x2: mouseX,
    y2: mouseY
  });
  redrawStoredLines();
}


function redrawStoredLines() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  if (storedLines.length == 0) {
    return;
  }
  // redraw each stored line
  for (var i = 0; i < storedLines.length; i++) {
    ctx.beginPath();
    ctx.moveTo(storedLines[i].x1, storedLines[i].y1);
    ctx.lineTo(storedLines[i].x2, storedLines[i].y2);
    ctx.stroke();
  }
}




</script>

    <?php include ('footer.php'); ?>
</body>
</html>
