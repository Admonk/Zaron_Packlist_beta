<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
 <style>
            .page-content
          {
              padding:0px !important;
              margin:0px !important;
          }
#progrss-wizard {
    padding: 25px;
}

button.accordion-button.fw-medium {
    padding: 10px 10px;
}.trpoint {
    
    cursor: pointer;
   
}
.trpoint:hover {
    background: antiquewhite;
}
label {
    cursor: pointer;
    margin-bottom: 0;
}
table.table.mb-4 {
    font-size: 12px;
}.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 0.3rem 1.25rem;
}
.form-check-input[type=checkbox] {
    border-radius: 0.25em;
    height: 15px;
    width: 15px;
}

.offcanvas-end {
    top: 0;
    right: 0;
    width: 700px;
    border-left: 1px solid #f6f6f6;
    -webkit-transform: translateX(100%);
    transform: translateX(100%);
}
      </style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>
  <div id="layout-wrapper">
         <div class="main-content">
            <div class="page-content">
                    <div class="">
                        <div class="row driver-detail-page" ng-init="fetchSingleDatatotal()">
                                <div class="col-lg-12">
                                    <div class="card flexHeightCard">
                                        <div class="card-header">
                                            <h4 class="card-title mb-0">Wizard with Progressbar</h4>
                                        </div>
                                        <div class="card-body" >

                                            <div id="progrss-wizard" class="twitter-bs-wizard">
                                                <ul class="twitter-bs-wizard-nav nav nav-pills nav-justified d-none">
                                                  
                                                    <li class="nav-item">
                                                        <a href="#progress-seller-details" class="nav-link" data-toggle="tab">
                                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Seller Details">
                                                                <i class="bx bx-list-ul"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                 
                                                   
                                                    
                                                   
                                                </ul>
                                                <!-- wizard-nav -->

                                                <div id="bar" class="progress mt-4 d-none">
                                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                                                </div>
                                                <div class="tab-content twitter-bs-wizard-tab-content">
                                                    
                                                    
                                                    <div class="tab-pane" id="progress-seller-details">
                                                         <div class="text-start mb-2">
                                                            <div class="row">
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                <div class="col-lg-6">
                                                                              <div class="border rounded gray p-2"  ng-init="procseeGroup(1)">
                                                                                 
                                                                                 <!-- end dropdown -->
                                                                                 <h4 class="card-title mb-4">Order ID: {{order_no_id}}</h4>
                                                                                 <div id="task-1">
                                                                                    <div id="upcoming-task" class="pb-1 task-list"   ng-init="fetchDataCategorybase(1)">
                                                                                       <div class="card task-box" id="uptask-1"  ng-init="fetchData('1')">
                                                                                         
                                                                                         
                                                                                         
                                                                                         
                                                                                         
                                                                                         <div class="row" style="padding: 5px 21px;"  >
                                                                                             
                                                                                             <div class="col-lg-6">
                                                                                             <div class="text-center d-grid">
                                                                                               <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light addtask-btn" ng-click="processStatuschages(2)"> Start</a>
                                                                                            </div>
                                                                                         </div>
                                                                                         
                                                                                        
                                                                                         <div class="col-lg-6">
                                                                                             <div class="text-center d-grid">
                                                                                               <a href="javascript: void(0);" class="btn btn-success waves-effect waves-light addtask-btn" ng-click="processStatuschages(3)"> Completed</a>
                                                                                            </div>
                                                                                         </div>
                                                                                         
                                                                                             
                                                                                             
                                                                                         </div>
                                                                                         
                                                                                     
                                                                                         
                                                                                          <div class="card-body" ng-repeat="namegroup in namesDatagroup">
                                                                                                   
                                                                                                  <h3 style="color: #ee5c17;">{{namegroup.proudtcion_name}} </h3>
                                                                                                  <div>
                                                                                                  <div  ng-repeat="namecate in namesDatacate"  ng-if="namecate.categories_id==namegroup.categories_id">     
                                                                                            
                                                                                             
                                                                                             <div>
                                                                                                <h5 class="font-size-14"><a href="javascript: void(0);" class="text-dark" id="task-name">{{namecate.categories_name}}</a></h5>
                                                                                                
                                                                                             </div>
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                         
                                                                                                                
                                                                                           <table class="table mb-0" >
                                                    
                                                                                                <thead>
                                                                                                    <tr style="background: #dddddd;">
                                                                                                        
                                                                                                        <th><input class="accCheckbox form-check-input" ng-click="viewClickcheck(namegroup.proudtcion_name,namecate.categories_name)" value="1" type="checkbox" ></th>
                                                                                                        <th>#</th>
                                                                                                        <!--<th>Order ID</th>-->
                                                                                                        <th>Products</th>
                                                                                                        <th>Length</th>
                                                                                                        <th ng-if="namecate.categories_id!=1">Crimp</th>
                                                                                                        <th>Act Nos</th>
                                                                                                        <th>P Nos</th>
                                                                                                       
                                                                                                        <th>Status</th>
                                                                                                        
                                                                                                        <th>Action</th>
                                                                                                     
                                                                                                        
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody  ng-repeat="name in namesData">
                                                                                                      
                                                                                                    <tr ng-if="namecate.categories_id==name.categories_id_get && namegroup.proudtcion_id==name.proudtcion_id"  id="show_{{name.labelid}}" class="trpoint">
                                                                                                      
                                                                                                        <td><input class="accCheckboxset form-check-input bs_{{namegroup.proudtcion_name}} ps_{{name.labelid}}"  type="checkbox" value="{{name.labelid}}" id="check_{{name.labelid}}"></td>
                                                                                                        <td scope="row"><label for="check_{{name.labelid}}">{{name.no}} </label></td>
                                                                                                      
                                                                                                        <td><label for="check_{{name.labelid}}">{{name.product_name_tab}}</label></td>
                                                                                                        <td><label for="check_{{name.labelid}}">{{name.profile_tab}} </label></td>
                                                                                                        <td ng-if="namecate.categories_id!=1"><label for="check_{{name.labelid}}">{{name.crimp_tab}}</label></td>
                                                                                                        <td><label for="check_{{name.labelid}}"><label for="check_{{name.labelid}}" style="color:green;" id="res_{{name.labelid}}">{{name.cmp_no}} / </label> {{name.nos_tab}}</label></td>
                                                                                                        
                                                                                                        
                                                                                                        
                                                                                                       <td>
                                                                                                           
                                                                                                          <input tyepe="text"  id="ss_{{name.labelid}}"  class="proudtcion_no_{{name.labelid}}" value="{{name.proudtcion_no}}" ng-blur="inputsave_1(name.labelid)" style="width:60px;" >
                                                                                                          <input type="hidden"  id="pp_{{name.labelid}}"    value="{{name.cmp_no}}" class="proudtcion_no_cmp{{name.labelid}}">
                                                                                                          <input type="hidden"  id="mm_{{name.labelid}}"    value="{{name.nos_tab}}">
                                                                                                          
                                                                                                      </td>
                                                                                                       
                                                                                                      
                                                                                                      
                                                                                                        
                                                                                                         <td>
                                                                                                             
                                                                                                             <span ng-if="name.production_status==1" style="color:red;">Yet To start</span>
                                                                                                             <span ng-if="name.production_status==2" style="color:orange;">Inprogress</span>
                                                                                                             <span ng-if="name.production_status==-1" style="color:red;">Re-assined</span>
                                                                                                             <i class="mdi mdi-paperclip font-size-16"
                                                data-bs-toggle="offcanvas" style="cursor: pointer;" data-bs-target="#offcanvasSpec" ng-click="sizedefind(name.id,name.product_id)"  ng-if="name.cate_status==1" aria-controls="offcanvasSpec" title="Image Source"></i>
                                                
                                                                                                         </td>
                                                                                                         
                                                                                                         
                                                                                                         <td>
                                                                                                             
                                                                                                              <span ng-if="name.production_status==1" style="color:red;"><a href="javascript: void(0);" class="btn btn-sm btn-outline-danger" ng-click="processStatuschagesSingle(2,name.labelid)"> Start</a></span>
                                                                                                              <span ng-if="name.production_status==2" style="color:red;"><a href="javascript: void(0);" class="btn  btn-sm btn-outline-success" ng-click="processStatuschagesSingle(3,name.labelid)"> Complete</a></span>
                                                                                                              <span ng-if="name.production_status==-1" style="color:red;"><a href="javascript: void(0);" class="btn  btn-sm btn-outline-success" ng-click="processStatuschagesSingle(3,name.labelid)"> Complete</a></span>
                                                                                                             
                                                                                                         </td>
                                                                                                         
                                                                                                      
                                                                                                         
                                                                                           
                                                                                                       
                                                                                                    </tr>
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                </tbody>
                                                                                            </table>
                                                                                                                
                                                                                            </div>                    
                                                                                                  </div>
                                                                                            
                                                                                          </div>
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                       </div>
                                                                                   
                                                                                       <!-- end task card -->
                                                                                    </div>
                                                                                    
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                           
                                                                           
                                                                           
                                                                 
                                                                 
                                                                 
                                                                 <div class="col-lg-6">
                                                                              <div class="border rounded gray p-2">
                                                                                 
                                                                                 <!-- end dropdown -->
                                                                                 <h4 class="card-title mb-4">Production Completed List</h4>
                                                                                 <div id="task-1">
                                                                                    <div id="upcoming-task" class="pb-1 task-list" ng-init="procseeGroupcompleted(3)">
                                                                                       <div class="card task-box" id="uptask-1"   ng-init="fetchDataCategorybasecompleted(3)" >
                                                                                         
                                                                                       <div class="row" style="padding: 5px 21px;"   ng-init="fetchDatacompleted('3')">
                                                                                             
                                                                                             <div class="col-lg-6">
                                                                                             <div class="text-center d-grid">
                                                                                               <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light addtask-btn" ng-click="processStatuschages(2)"> Undo </a>
                                                                                            </div>
                                                                                         </div>
                                                                                         
                                                                                             
                                                                                         </div>
                                                                                         
                                                                                     
                                                                                         
                                                                                          <div class="card-body" ng-repeat="namegroup in namesDatagroupcompleted">
                                                                                                   
                                                                                                  <h3>{{namegroup.proudtcion_name}} </h3>
                                                                                                  <div  >
                                                                                                  <div  ng-repeat="namecate in namesDatacatecompleted"  ng-if="namecate.categories_id==namegroup.categories_id">     
                                                                                            
                                                                                             
                                                                                             <div>
                                                                                                <h5 class="font-size-14"><a href="javascript: void(0);" class="text-dark" id="task-name">{{namecate.categories_name}}</a></h5>
                                                                                                
                                                                                             </div>
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                         
                                                                                                                
                                                                                           <table class="table mb-0" >
                                                    
                                                                                                <thead>
                                                                                                    <tr style="background: #dddddd;">
                                                                                                        
                                                                                                        <th><input checked class="accCheckbox form-check-input" ng-click="viewClickcheck(namegroup.proudtcion_name,namecate.categories_name)" value="1" type="checkbox" ></th>
                                                                                                        <th>#</th>
                                                                                                        <!--<th>Order ID</th>-->
                                                                                                        <th>Products</th>
                                                                                                        <th>Length</th>
                                                                                                        <th ng-if="namecate.categories_id!=1">Crimp</th>
                                                                                                        <th>Act Nos</th>
                                                                                                       
                                                                                                        <th>C Nos</th>
                                                                                                        <th>Status</th>
                                                                                                        
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody  ng-repeat="name in namesDatacompleted">
                                                                                                      
                                                                                                    <tr ng-if="namecate.categories_id==name.categories_id_get && namegroup.proudtcion_id==name.proudtcion_id"  id="show_{{name.labelid}}" class="trpoint">
                                                                                                      
                                                                                                        <td><input checked class="accCheckboxset form-check-input bs_{{namegroup.proudtcion_name}} ps_{{name.labelid}}"  type="checkbox" value="{{name.labelid}}" id="check_{{name.labelid}}"></td>
                                                                                                        <td scope="row"><label for="check_{{name.labelid}}">{{name.no}} </label></td>
                                                                                                        <!--<td><label for="check_{{name.labelid}}">{{name.order_no}}</label></td>-->
                                                                                                        <td><label for="check_{{name.labelid}}">{{name.product_name_tab}}</label></td>
                                                                                                        <td><label for="check_{{name.labelid}}">{{name.profile_tab}} </label></td>
                                                                                                        <td ng-if="namecate.categories_id!=1"><label for="check_{{name.labelid}}">{{name.crimp_tab}}</label></td>
                                                                                                        <td><label for="check_{{name.labelid}}">{{name.nos_tab}}</label></td>
                                                                                                        
                                                                                                     
                                                                                                        <td><label for="check_{{name.labelid}}">{{name.cmp_no}}</label></td>
                                                                                                        <td>
                                                                                                            
                                                                                                            <span ng-if="name.production_status==3" style="color:green;">Completed</span>
                                                                                                            <span ng-if="name.production_status==4" style="color:green;">QC Approved</span>
                                                                                                            <span ng-if="name.production_status==5" style="color:green;">Proceed to Delivered</span>
                                                                                                         <i class="mdi mdi-paperclip font-size-16"
                                                data-bs-toggle="offcanvas" style="cursor: pointer;" data-bs-target="#offcanvasSpec" ng-click="sizedefind(name.id,name.product_id)"  ng-if="name.cate_status==1" aria-controls="offcanvasSpec" title="Image Source"></i>
                                                
                                                                                                        
                                                                                                        
                                                                                                        </td>
                                                                                                        
                                                                                                        
                                                                                                        
                                                                                                             
                                                                                                         
                                                                                                       
                                                                                                    </tr>
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                </tbody>
                                                                                            </table>
                                                                                                                
                                                                                            </div>                    
                                                                                                  </div>
                                                                                            
                                                                                          </div>
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                       </div>
                                                                                   
                                                                                       <!-- end task card -->
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
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->
                            </div>
                            
                            
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
            <!-- End Page-content -->
            <!-- Modal -->
         </div>
         <!-- end main content-->
      </div>
      <!-- END layout-wrapper -->
     
     
     
     
     
     
     
     
     
 <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasSpec" aria-labelledby="offcanvasSpecLabel">
        <div class="offcanvas-header">
          <h5 id="offcanvasSpecLabel">Selected Base Product</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            
            
            
            
            
            
            
            
            
                
            
               <div class="row" style="display:none;">
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
                           
                           <div class="row" style="display:none;">
                               <div class="col-md-12">
                                   <canvas id="canvas2" class="w-100" height="300" style="border:1px solid #ccc;background:#fff"></canvas>
                               </div>
                           </div>
            
            
            
            
            
            
        <form  ng-submit="submitSizeguid()" method="post">
              
              
              
                <input type="hidden" id="order_product_id_base_define">
                <input type="hidden" id="product_id_base_define">
              
              
                        <div class="col-md-12">
                          <div class="form-group row">
                           
                            <div class="col-sm-12" ng-init="fetchiornproducts()">
                           
                                <select class="form-control" required name="sub_product" id="sub_product" >

                                   <option ng-repeat="nameiorn in namesfetchiornproducts" value="{{nameiorn.id}}">{{nameiorn.name}}</option>
                                   
                                </select>
                              
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                         <h5 class="card-title mt-3">Accesories	Size Image </h5>
                        
                          <div ng-if="imagestatus==1">
                              
                              <div class="imageset">
                             <img src="{{reference_image}}" class="img-responsive" style="width:100%">
                             </div>
                             
                          </div>
                          
                          
                       
                        
                        
                                     
                      <span  ng-init="fetchDatasizeoptionsvalue()" id="appendTwobox">            
                              
                        
                          <!--<h4 class="card-title mt-3">Sizes </h4>-->
                        
                       
                            
                        <div class="row twoBoxInput"  ng-repeat="nameoptionv in namesDataoptonsvalues" >


                        <div class="col-md-3">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                              <p>{{nameoptionv.section_lable}}</p>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-2">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                              +
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                             <p> {{nameoptionv.section_value}}</p>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-1">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                              =
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                                 <p> {{nameoptionv.degree_value}} Degree</p>
                              
                            </div>
                          </div>
                        </div>
                     
    </div>                   
                           
                             
                                   
                              
                              
                            <!--<div id="sizetotal"></div>   -->
                        
                        
                        
                        
                        
                         <div id="show_details"> </div>
                          
                          
                        </span>  
                          
                          
                          
                          
                          
                        
                        
                        
                        
               
               
          </form>
        </div>
    </div>
     
     
     
     
     
     
     
     
 
   
 <script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;


 
  
   $scope.fetchRouteorderassignorder = function(tabelename,status,id,assaignstates){

    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_assign_data_driver_list?tablename='+tabelename+'&order_base='+status+'&route_id='+id+'&assaignstates='+assaignstates).success(function(data){
      $scope.namesDataassign = data;
    });
  };
  
  
  
 $scope.routeOrder = function(id,name) {
  
  
   
   $scope.fetchRouteorderassignorder('orders_process',3,id,1);
   $scope.route_name = name;
  
  
 }
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
$scope.inputsave_1 = function (id) {

                        var values=parseFloat($('#ss_'+id).val());
                        var cmd_no=parseFloat($('#pp_'+id).val());
                        var org=parseFloat($('#mm_'+id).val());
                       
                      
                     
                        $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $id; ?>",
                          data:{'id':id,'action':'InputUpdateprocess','values':values}
                        }).success(function(data){
                    
                          $scope.procseeGroup(1);
                          $scope.fetchData(1);
                          $scope.fetchDataCategorybase(1);
                           
                             
                        });
                       
                        // $('#pp_'+id).val(cmd_no+values); 
                         //$('#res_'+id).html(cmd_no+values+'/'); 
                       

}



 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  
  
  
  $scope.statuslable="Assigned Orders";
  
 $scope.routeassignOrderclick = function(tablename,status1,status2,status3) {
  
   
   
   if(status3==1)
   {
       $scope.statuslable="Assigned Orders";
   }
  
   if(status3==2)
   {
       $scope.statuslable="Pick Start Orders";
   }
   if(status3==3)
   {
       $scope.statuslable="Delivered Orders";
   }
  
   $scope.fetchRouteorderassignorder(tablename,status1,status2,status3);

 }
  

 $scope.fetchRoute = function(){
    $http.get('<?php echo base_url() ?>index.php/order/group_gy_route').success(function(data){
      $scope.namesRoute = data;
    });
  };



$scope.statusChange = function(id){
    if(confirm("Are you sure you want to Start?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'statuschange','tablenamemain':'orders_process'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
       
         $scope.fetchRouteorderassignorder('orders_process',3,0,1);
      }); 
    }
};










// New edit


$scope.viewGetprocess = function(id,name,product_id){
     $scope.sname=name;
     $scope.snameid=id;
     $scope.sproduct_id=product_id;
     
    $('.trpoint').css("background-color", "white");
    $('#show_'+id).css("background-color", "#f5b698");
    
    
    $('#showproductionoptions').show();
    
    
    $scope.fetchProcessproduct(id);
     
};
$scope.viewProcessdelete = function(id,order_product_id){
    
   $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id,'action':'addprocessdelete','tablenamemain':'proudtcion_order_products'}
      }).success(function(data){
          
           $scope.fetchProcessproduct(order_product_id);
      
    }); 
    
    
     
};




$scope.viewClickcheck = function(id,name){
    
    
    
        if($('.accCheckbox').prop('checked') == true) 
        {
            
            
             $('.bs_'+id).prop("checked", true);
           
           
           
        }
        else
        {
           
             $('.bs_'+id).prop("checked", false);
            
        }
    
    
    
    
}




$scope.processStatuschagesSingle = function(status,rowid){
    
    
                        var values=$('#ss_'+rowid).val();
                        var cmd_no=$('#pp_'+rowid).val();
                        
                        
                       
                        
                       $http({
                                
                            method:"POST",
                            url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                            data:{'order_product_id':rowid,'status':status,'order_production_no':values,'order_production_no_cmd':cmd_no,'order_id':'<?php echo $id; ?>', 'action':'processStatuschages_single','tablenamemain':'proudtcion_order_products'}
                            }).success(function(data){
                              
                              $scope.procseeGroup(1);
                              $scope.procseeGroupcompleted(3);
                              
                              
                              $scope.fetchData(1);
                              $scope.fetchDatacompleted(3);
                              
                               $scope.fetchDataCategorybase(1);
                               $scope.fetchDataCategorybasecompleted(3);
                              
                              
        
                              
                          
                       }); 
                        
                        
                        
                       
                     
                       
    
}

$scope.processStatuschages = function(status){
    
    
 
         
               
              
                var spiltparicel = $(".accCheckboxset");
                var order_product_id_set_value = [];
                var order_product_id_set_value_no = [];
                var order_product_id_set_value_no_cmd = [];
                for(var i = 0; i < spiltparicel.length; i++){
                  
                  if($(spiltparicel[i]).is(':checked')) {
                   order_product_id_set_value.push($(spiltparicel[i]).val());
                   var setval= $(spiltparicel[i]).val();
                   order_product_id_set_value_no.push($('.proudtcion_no_'+setval).val());
                   order_product_id_set_value_no_cmd.push($('.proudtcion_no_cmp'+setval).val());
                   
                  }
                 
                }
            
                   var order_product_id= order_product_id_set_value.join("|");
                   var order_production_no= order_product_id_set_value_no.join("|");
                   var order_production_no_cmd= order_product_id_set_value_no_cmd.join("|");
                
               
                    $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                    data:{'order_product_id':order_product_id,'status':status,'order_production_no':order_production_no,'order_production_no_cmd':order_production_no_cmd,'order_id':'<?php echo $id; ?>', 'action':'processStatuschages','tablenamemain':'proudtcion_order_products'}
                    }).success(function(data){
                      
                      $scope.procseeGroup(1);
                      $scope.procseeGroupcompleted(3);
                      
                      
                      $scope.fetchData(1);
                      $scope.fetchDatacompleted(3);
                      
                       $scope.fetchDataCategorybase(1);
                       $scope.fetchDataCategorybasecompleted(3);
                      
                      

                      
                  
                  }); 
      
            
            
   
        
    
     
};



$scope.fetchProcessproduct = function(order_product_id){
      $http.get('<?php echo base_url() ?>index.php/order/fetch_data_order_process?tablename=proudtcion_order_products&order_product_id='+order_product_id+'&order_id=<?php echo $id; ?>').success(function(data){
      $scope.fetchprocessproductdata = data;
      
      
      
      
      
      
      
    });
};

//end












  $scope.procseeGroup = function(id){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetchDataCategorybase_order_process_group?order_id=<?php echo $id; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert='+id).success(function(data){
      
      
      
      
      $scope.namesDatagroup = data;
      
      
      
      
      
      
      
      
    });
    
};




 $scope.procseeGroupcompleted = function(id){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetchDataCategorybase_order_process_group?order_id=<?php echo $id; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert='+id).success(function(data){
      
      
      
      
      $scope.namesDatagroupcompleted = data;
      
      
      
      
      
      
      
      
    });
    
};




  $scope.fetchDataCategorybase = function(id){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetchDataCategorybase_order_process_panel?order_id=<?php echo $id; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert='+id).success(function(data){
      
      
      
      
      $scope.namesDatacate = data;
      
      
      
      
      
      
      
      
    });
    
   
  
   
  };
  
  
  
  
  
  
  $scope.fetchDataCategorybasecompleted = function(id){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetchDataCategorybase_order_process_panel?order_id=<?php echo $id; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert='+id).success(function(data){
      
      
      
      
      $scope.namesDatacatecompleted = data;
      
      
      
      
      
      
      
      
    });
    
   
  
   
  };





$scope.sizedefind = function(id,product_id){
    
        $('#product_id_base_define').val(id);
        $('#order_product_id_base_define').val(product_id);
        
      
        
         $scope.fetchDatasizeoptionsvalue(id,product_id);
         $scope.fetchDatasizeoptionsvalueTotal(id,product_id);
        
        $scope.fetch_single_data(id);
        
};


 
 
 $scope.fetch_single_data = function(id){



                              $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/fetch_single_data",
                                data:{'order_product_id':id,'tablenamemain':'order_product_list','tablename_sub':'order_product_list_process'}
                               }).success(function(data){
                                
                                    if(data.sub_product_id)
                                    {
                                        $('#sub_product').val(data.sub_product_id);
                                    }
                                 
                                
                                    $scope.imagestatus = data.imagestatus;
                                    $scope.reference_image = data.reference_image;
                                 
                              }); 

};



 $scope.fetchDatasizeoptionsvalue = function(id,product_id){
           
            
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/fetch_data_size_options_values",
                                data:{'product_id':product_id,'order_product_id':id,'tablenamemain':'order_product_list','tablename_sub':'order_product_list_process'}
                                }).success(function(data){
                               
                                  $scope.namesDataoptonsvalues = data;
                                 
                               }); 
            
            
 };

 $scope.fetchDatasizeoptionsvalueTotal = function(id,product_id){
           
            
                                $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/fetch_data_size_options_values_total",
                                data:{'product_id':product_id,'order_product_id':id,'tablenamemain':'order_product_list','tablename_sub':'order_product_list_process'}
                                }).success(function(data){
                               
                                 $('#sizetotal').html('Size Total : '+data.sizetotal);
                                 
                               }); 
            
            
 };
 $scope.fetchiornproducts = function(){
            $http.get('<?php echo base_url() ?>index.php/products/fetchiornproducts').success(function(data){
              $scope.namesfetchiornproducts = data;
            });
 };


$scope.fetchDatacompleted = function(status){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_production?order_id=<?php echo $id; ?>&tablenamemain=<?php echo 'orders_process'; ?>&&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert=1&production_id=1&status='+status).success(function(data){
     
     
                 $scope.namesDatacompleted = data;
                 
               
      
    });
     
   
   
  };


$scope.fetchData = function(status){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_production?order_id=<?php echo $id; ?>&tablenamemain=<?php echo 'orders_process'; ?>&&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert=1&production_id=1&status='+status).success(function(data){
     
     
                 $scope.namesData = data;
                 
               
      
    });
     
   
   
  };



$scope.fetchSingleDatatotal = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_total?order_id=<?php echo $id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'orders_process','tablename_sub':'order_product_list_process','convert':'1'}
    }).success(function(data){

       $scope.fulltotal = data.fulltotal;
       
       
       $scope.order_no_id = data.order_no_id;
       
       
       $scope.production_assign = data.production_assign;
       
      
       
       if(data.user_id)
       {
            $scope.user_id = data.user_id;
       }
       if(data.reason)
       {
            $scope.reason = data.reason;
       }
       
       if(data.salesphone)
       {
            $scope.salesphone = data.salesphone;
       }
       
       
       if(data.salesname)
       {
            $scope.salesname = data.salesname;
       }
       
             $scope.create_time = data.create_time;
             $scope.create_date = data.create_date;
      
       $scope.totalitems = data.totalitems;
       $scope.discounttotal = data.discount;
       $scope.discountfulltotal = data.discountfulltotal;
       $scope.Meter_to_Sqr_feet = data.Meter_to_Sqr_feet;
     
     
       $scope.fullqty = data.fullqty;
       $scope.FACT = data.FACT;
       $scope.UNIT = data.UNIT;
       $scope.NOS = data.NOS;
     
    });
};


});

</script>  
   
   <?php include ('footer.php'); ?>
        
        <style>
            .selectBoxInline {
                display: inline-flex;
                width: 120px;
                height: 120px;
                justify-content: center;
                align-items: center;
                text-align: center;
                color: #fff;
                margin: 0px;
                background-image: url(https://admonk.in/zaron_beta/assets/images/black-shape-27530.png) !important;
                background-size: cover;
                background-repeat: no-repeat;
            }
            
            .selectBoxInline.checkedTrue
            {
                background-image: url(https://admonk.in/zaron_beta/assets/images/orange-shape-27530.png) !important;
            }
            
            .selectBoxFlex {
                display: flex;
                justify-content: center;
                padding: 10px;
                width: 600px;
                margin: 0 auto;
                flex-wrap: wrap;
            }
            
            .production-link-wizard {
                width: 100% !important;
                text-align: right !important;
                float: right;
                justify-content: center !important;
                align-items: center !important;
            }
            
            .production-link-wizard li {
                width: 70% !important;
            }
            
            .ticket-inner .accordion-item {
                margin-bottom: 10px;
            }
            
            .ticket-inner .accordion-button:not(.collapsed)
            {
                background: #f6f6f6;
            }
            
            .accordion-flush .accordion-item .accordion-button.collapsed {
                border-radius: 0;
                border-bottom: 1px solid #000;
            }
            .ticket-inner .nav-pills .nav-link {
                border-bottom: 1px solid #ff5e14;
                border-radius: 0px !important;
            }
            
            .ticket-inner .leftPanelBar {
                border-right: 1px solid #ccc;
            }
            
            #progress-wizard .twitter-bs-wizard .twitter-bs-wizard-pager-link
            {
                padding-top:0px !important;
            }
            #progrss-wizard .tab-pane .text-start {
                min-height: 60vh;
            }
            
            .tab-pane .wizard-title
            {
                text-align: left;
                margin-bottom: 10px;
                padding-bottom: 6px;
            }
            
            .orderListWizardSideB .table-responsive {
                max-height: 72vh;
                overflow-y: scroll;
            }
            
            .orderListWizardSideB span.badge
            {
                color:#fff;
            }
            
            div#progress-seller-details ul li.nav-item {
                width: unset;
            }
            
            .gray
            {
               background-color: #f9f9f9;
            }
            
            .tab-pane  .card-header {
                display: unset;
            }
            .binItems,.bayColItem {
                background: #ebebeb;
                border-radius: .15rem;
                padding: 10px;
                width: 100%;
                min-height: 80px;
            }
            
            .binContent p, .bayContent p {
                background: #ffffff;
                max-width: 48%;
                padding: 3px;
                border-radius: 3px;
                width: 48%;
                margin-bottom: 8px;
                position:relative;
            }
            
            .binContent p a {
                color: #000;
                padding-left: 10px
            }
            
            .binContent,.bayContent {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                position:relative;
            }
            .binContent p:nth-child(odd) a {
                color: #000;
                padding-left: 10px;
            }
            .binContent p:nth-child(odd) {
                background: #ffffff;
            }
            
            
            .tooltipCol:hover span {
                opacity: 1;
                filter: alpha(opacity=100);
                left: 10px;
                top: -63px;
                z-index: 99;
                -webkit-transition: all 0.2s ease;
                -moz-transition: all 0.2s ease;
                -o-transition: all 0.2s ease;
                transition: all 0.2s ease;
                }
                
                .box b {
                  color: #fff;
                }
                
                .tooltipCol span {
                	background: none repeat scroll 0 0 #222; /*-- some basic styling */
                	color: #F0B015;
                	font-family: 'Helvetica';
                	font-size: 1em;
                	font-weight: normal;
                	line-height: 1.5em;
                	padding: 16px 15px;
                	width: 240px;
                	top: -20px;  /*-- this is the original position of the tooltip when it's hidden */
                	left: 0px;
                	margin-left: 0;	
                	/*-- set opacity to 0 otherwise our animations won't work */
                	opacity: 0;
                	filter: alpha(opacity=0);  	
                	position: absolute;
                	text-align: center;	
                	z-index: 2;
                	text-transform: none;
                	-webkit-transition: all 0.3s ease;
                	-moz-transition: all 0.3s ease-in-out;
                	-o-transition: all 0.3s ease;
                	transition: all 0.3s ease-in-out;
                }
                
                .tooltipCol span:after {
                	border-color: #222 rgba(0, 0, 0, 0);
                	border-style: solid;
                	border-width: 15px 15px 0;
                	bottom: -15px;
                	content: "";
                	display: block;
                	left: 31px;
                	position: absolute;
                	width: 0;
                }
        </style>
        
        <script type="text/javascript">
            jQuery(function() {
                jQuery("#sortableProduction").sortable();
              });
              
                 $('.selectBoxFlex .selectBoxInline').click(function(){
                    
                    $(this).toggleClass('checkedTrue');
                });
                
                 $('.assignAccessAll').hide();
               
                
               
                $(function () {
                   
                  $('[data-toggle="tooltip"]').tooltip();
                  
                });
        </script>
</body>
</html>

