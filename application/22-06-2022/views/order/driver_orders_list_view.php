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
img.img-responsive {
    width: 100%;
}

button.accordion-button.fw-medium {
    padding: 10px 10px;
}
.card.flexHeightCard .twitter-bs-wizard-nav {
    display: flex; 
}
.goog-te-gadget-simple {
    border: none !important;
}
.goog-te-banner-frame {
    display: none !important;
}
#google_translate_element{
    
    float:right;
}
</style>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
        window.onload = function googleTranslateElementInit() {
         new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ta,en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
</script>
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>




  <div id="layout-wrapper">
         <div class="main-content">
            <div class="page-content">
                    <div class="container-fluid">
                        <div class="row driver-detail-page">
                                <div class="col-lg-12">
                                    <div class="card flexHeightCard">
                                        <div class="card-header">
                                            <h4 class="card-title mb-0">Wizard with Progressbar</h4>
                                        </div>
                                        <div class="card-body" ng-init="fetchCustomerdetails()" >

                                            <div id="progrss-wizard" class="twitter-bs-wizard"  ng-init="fetchSingleDatatotaldel()" >
                                                
                                                <div id="google_translate_element" style=></div>
                                                
                                                <ul class="twitter-bs-wizard-nav nav nav-pills nav-justified">
                                                    <li class="nav-item">
                                                        <a href="#progress-seller-details" class="nav-link" data-toggle="tab">
                                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Seller Details">
                                                                <i class="bx bx-list-ul"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#progress-company-document" class="nav-link" data-toggle="tab">
                                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Company Document">
                                                                <i class="bx bx-book-bookmark"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    
                                                    <!-- <li class="nav-item">-->
                                                    <!--    <a href="#return-process-detail" class="nav-link" data-toggle="tab">-->
                                                    <!--        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Return Details">-->
                                                    <!--            <i class="fas fa-exchange-alt"></i>-->
                                                    <!--        </div>-->
                                                    <!--    </a>-->
                                                    <!--</li>-->
                                                    
                                                    
                                                    <li class="nav-item">
                                                        <a href="#progress-bank-detail" class="nav-link" data-toggle="tab">
                                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Bank Details">
                                                                <i class="bx bxs-bank"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- wizard-nav -->

                                                <div id="bar" class="progress mt-4">
                                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                                                </div>
                                                <div class="tab-content twitter-bs-wizard-tab-content">
                                                    <div class="tab-pane" id="progress-seller-details">
                                                        <div class="text-start mb-4">
                                                            <h5>Customer Details  </h5>
                                                             <input type="hidden" id="lat" >
                                                             <input type="hidden" id="laog" >
                                                             <div class="ticket-inner">
                                                               <div class="route">
                                                                  <p class="">
                                                                  <span>Company : {{company_name_data}}</span>      
                                                                  <span>Contact Person : {{customername}}</span>
                                                                  <span>Contact Phone : {{customerphone}}</span>
                                                                  <span>Route: {{routename}}</span>
                                                                  <span>{{address}}</span></p>
                                                                  <p class=""> <span class="font-size-12">{{orderno}}</span><a href="tel::{{customerphone}}"><span><i class="mdi-phone mdi font-size-20 me-1"></i> Call Customer</span></a></p>
                                                               </div>
                                                               <div class="time">
                                                                  <p><span>Started Time</span><span>{{starttime}}</span></p>
                                                                  <!--<p><span>Est Arrival Time</span><span>1:05 p.m</span></p>-->
                                                               </div>
                                                               <div class="flight">
                                                                  <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d250577.849036318!2d76.98661947811352!3d11.092579967087119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d11.0231552!2d76.96875519999999!4m5!1s0x3ba9038baebcbb59%3A0x65ea405423a60cf4!2szaron%20industries!3m2!1d11.185958!2d77.28320699999999!5e0!3m2!1sen!2sin!4v1638435938932!5m2!1sen!2sin" style="border:0;width:100%; height:30vh;" allowfullscreen="" loading="lazy"></iframe>
                                                               </div>
                                                              </div>
                                                        </div>
                                                        <div class="col-lg-12" >
                                                            
                                                            
                                                                        <div class="mb-3">
                                                                        <label for="example-text-input" class="form-label">Start Reading  : </label>
                                                                        <b> {{start_reading}}</b>
                                                                       </div>
                                                                      
                                                                         <div class="mb-3">
                                                                        <label for="example-text-input" class="form-label">KM Reading End</label>
                                                                        <input class="form-control" type="text" id="km_reading_end">
                                                                       </div>
                                                                       
                                                        </div>
                                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            <li class="next"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()">Reached Location <i
                                                                        class="bx bx-chevron-right ms-1"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane" id="progress-company-document" >
                                                      <div>
                                                        <div class="text-start mb-2">
                                                            <h5>Payment Details</h5>
                                                            <div class="ticket-inner">
                                                               <div class="route">
                                                                  <p> 
                                                                  
                                                                  <span>Company : {{company_name_data}}</span>      
                                                                  <span>Contact Person : {{customername}}</span>
                                                                  <span>Contact Phone : {{customerphone}}</span>
                                                                 
                                                                  <span>Route: {{routename}}</span>
                                                                  <span>{{address}}</span></p>
                                                                  <p class=""><span class="font-size-12">{{orderno}}</span><a href="tel::{{customerphone}}"><span><i class="mdi-phone mdi font-size-20 me-1"></i> Call Customer</span></a></p>
                                                               </div>
                                                                <div class="time">
                                                                  
                                                                  <p><span>Invoice</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span></p>
                                                                  <p><span>DC</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span></p>
                                                                  <p><span>SubTotal</span><span> Rs. {{fulltotaldel}}</span></p>
                                                                  <p><span>Delivery Charge</span><span> Rs. {{delivery_charge}}</span></p>
                                                                  <p><span>Total Amount</span><span> Rs. {{fulltotaldel+delivery_charge}}</span></p>
                                                               </div>
                                                               
                                                               <div class="accordion accordion-flush" id="accordionFlushExample">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="flush-headingOne">
                                                                            <button class="accordion-button fw-medium collapsed fw-medium" type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                                               Product List
                                                                            </button>
                                                                        </h2>
                                                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                                                            data-bs-parent="#accordionFlushExample">
                                                                            <div class="accordion-body p-1 text-muted">
                                                                                
                                                                                <div class="talbe-productList">
                                                                                          
                                                                                          <div class="table-responsive" >
                                                                                            <table class="table mb-0" ng-init="fetchData()">
                                                    
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                    <th>S No</th>
                                                                                                    <th>Product</th>
                                                                                                    <th >Basic Price (INR)</th>
                                                                                                    <th >Quantity</th>
                                                                                                    <th >Amount</th>
                                                                                                    
                                                                                                   </tr>
                                                                                                </thead>
                                                                                                <tbody ng-init="fetchSingleDatatotal()">
                                                                                                 <tr ng-repeat="name in namesData|orderBy:column:reverse">
                                                                                                    <td >{{name.no}}</td>
                                                                                                    <td>
                                                                                                        <div class="item-desc-1">
                                                                                                            <span>{{name.product_name_tab}}</span>
                                                                                                            <small>{{name.description}}</small>
                                                                                                            
                                                                                                        </div>
                                                                                                    </td>
                                                                                                  
                                                                                                    <td >{{name.rate_tab}}  </td>
                                                                                                    <td >{{name.qty_tab}} 
                                                                                                   
                                                                                                    <small ng-if="approx_id==1">(approx.)</small>
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    </td>
                                                                                                    <td >Rs. {{name.amount_tab}}</td>
                                                                                                    <td  style="width:15%;" ng-if="name.paricel_mode==1" >{{name.addresstopariel}}</td>
                                                                                                </tr>
                                                                                                
                                                                                                
                                                                                                <!--EDIT VAL-->
                                                                                                
                                                                                                
                                                                                                
                                                                                                <tr>
                                                                                                    <td colspan="4" class="text-end">SubTotal</td>
                                                                                                    <td class="text-right">Rs. {{fulltotal}} </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td colspan="4" class="text-end">Discount</td>
                                                                                                    <td class="text-right">Rs. {{discounttotal}} </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td colspan="4" class="text-end fw-bold">Grand Total</td>
                                                                                                    <td class="text-right fw-bold">Rs. {{discountfulltotal}} </td>
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
                                                        
                                                        <hr>
                                                        <form>
                                                            
                                                            
                                                            
                                                            
                                                              
                                                        </form>
                                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i
                                                                        class="bx bx-chevron-left me-1"></i> Previous</a></li>
                                                            <li class="next"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()">Next <i
                                                                        class="bx bx-chevron-right ms-1"></i></a></li>
                                                        </ul>
                                                      </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                   <!-- <div class="tab-pane" id="return-process-detail">
                                                      <div>
                                                       
                                                        
                                                         <div class="text-start mb-4">
                                                          
                                                            <div class="ticket-inner">
                                                                
                                                                <h5>Return Products</h5>
                                                                
                                                                  
                                                             
                                                              
                              <ul class="tl" ng-init="fetchCustomerororderhistroy()"  id="exitinforderview">
                                  
                                  
                              <li class="tl-item" ng-repeat="namesh in namesHistory">
                                 
                                 <div class="item-title">Order No : <b>{{namesh.order_no}}</b></div>
                                 <div class="item-detail">on {{namesh.create_date}} {{namesh.create_time}}</div>
                                 <br>
                                 
                                 
                                 
                                    <table class="table mb-0" >
                                                    
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                    <th>#</th>
                                                                                                    <th>S No</th>
                                                                                                    <th>Item Item</th>
                                                                                                    <th >Basic Price (INR)</th>
                                                                                                    <th >Quantity</th>
                                                                                                    <th >Amount</th>
                                                                                                    
                                                                                                   </tr>
                                                                                                </thead>
                                                                                                <tbody ng-init="fetchCustomerororderhistroyorderlist()">
                                                                                                 <tr ng-repeat="nameho in namesHistoryorder" ng-if="namesh.order_no==nameho.order_no">
                                                                                                     
                                                                                                     
                                                                                                     
                                                                                                       <td>
                                                                                                           
                                                                                                           <span ng-if="nameho.return_status==2">
                                                                                                               
                                                                                                                <input type="checkbox" checked value="{{nameho.id}}" class="returnid">
                                                                                                               
                                                                                                           </span>
                                                                                                           
                                                                                                           <span ng-if="nameho.return_status==1">
                                                                                                               
                                                                                                                <input type="checkbox"  value="{{nameho.id}}" class="returnid">
                                                                                                               
                                                                                                           </span>
                                                                                                        
                                                                                                       
                                                                                                        
                                                                                                        </td>
                                                                                                    
                                                                                                    
                                                                                                    <td>{{nameho.no}}</td>
                                                                                                    <td>{{nameho.product_name_tab}}</td>
                                                                                                    
                                                                                                   
                                                                                                   
                                                                                                    <td >{{nameho.rate_tab}}  </td>
                                                                                                    <td >{{nameho.qty_tab}} </td>
                                                                                                    <td >Rs. {{nameho.amount_tab}}</td>
                                                                                                    
                                                                                                   
                                                                                                
                                                                                                </tr>
                                                                                                
                                                                                              
                                                                                                
                                                                                                </tbody>
                                                                                            </table> 
                                 
                                  <br>
                               </li>
                               
                               <li class="tl-item" ng-show="namesHistory.length==0">
                                   
                                       <p class="text-muted pt-3">No Data Found</p>             
                                    
                                </li>
                                
                                
                                
                                 
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                               
                             </ul>
                             
                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                           
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                              
                                                            </div>
                                                            
                                                        </div>
                                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i
                                                                        class="bx bx-chevron-left me-1"></i> Previous</a></li>
                                                            <li class="next"><a href="javascript: void(0);" class="btn btn-primary" ng-click='returnfinsh()'  onclick="nextTab()">Return Picked and Next <i
                                                                        class="bx bx-chevron-right ms-1"></i></a></li>
                                                        </ul>
                                                      </div>
                                                    </div>-->
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="tab-pane" id="progress-bank-detail">
                                                        <div>
                                                            <div class="text-start mb-2">
                                                                <h5>Drop Details</h5>
                                                                <div class="ticket-inner">
                                                               <div class="route">
                                                                  <p> 
                                                                  <span>Company : {{company_name_data}}</span>      
                                                                  <span>Contact Person : {{customername}}</span>
                                                                  <span>Contact Phone : {{customerphone}}</span>
                                                                  
                                                                  <span>Route: {{routename}}</span>
                                                                  <span>{{address}}</span></p>
                                                                  <p class=""><span class="font-size-12">{{orderno}}</span><a href="tel::{{customerphone}}"><span><i class="mdi-phone mdi font-size-20 me-1"></i> Call Customer</span></a></p>
                                                               </div>
                                                                 <div class="time">
                                                                  
                                                                  <p><span>Invoice</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span></p>
                                                                  <p><span>DC</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span></p>
                                                                  <p><span>SubTotal</span><span> Rs. {{fulltotaldel}}</span></p>
                                                                  <p><span>Delivery Charge</span><span> Rs. {{delivery_charge}}</span></p>
                                                                  <p><span>Total Amount</span><span> Rs. {{fulltotaldel+delivery_charge}}</span></p>
                                                               </div>
                                                              </div>
                                                            </div>
                                                          <form>
                                                              <div class="row">
                                                                  
                                                                  
                                                                  
                                                                                         
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
                                                                    <h3>OTP Password</h3>
                                                        <div class="col-3">
                                                            <div class="mb-3">
                                                                <label for="digit1-input" class="visually-hidden">Dight 1</label>
                                                                <input type="text" class="form-control form-control-lg text-center otpid" onkeyup="moveToNext(this, 2)"  maxlength="1" id="digit1-input">
                                                            </div>
                                                        </div>
                    
                                                        <div class="col-3">
                                                            <div class="mb-3">
                                                                <label for="digit2-input" class="visually-hidden">Dight 2</label>
                                                                <input type="text" class="form-control form-control-lg text-center otpid" onkeyup="moveToNext(this, 3)" maxlength="1" id="digit2-input">
                                                            </div>
                                                        </div>
                    
                                                        <div class="col-3">
                                                            <div class="mb-3">
                                                                <label for="digit3-input" class="visually-hidden">Dight 3</label>
                                                                <input type="text" class="form-control form-control-lg text-center otpid" onkeyup="moveToNext(this, 4)" maxlength="1" id="digit3-input">
                                                            </div>
                                                        </div>
                    
                                                        <div class="col-3">
                                                            <div class="mb-3">
                                                                <label for="digit4-input" class="visually-hidden">Dight 4</label>
                                                                <input type="text" class="form-control form-control-lg text-center otpid" onkeyup="moveToNext(this, 4)" maxlength="1" id="digit4-input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Payment mode</label>
                                                                        <select class="form-select" id="cashmode">
                                                                            <option value="">Select Mode</option>
                                                                            <option value="Cash">Cash</option>
                                                                            <option value="Cheque">Cheque</option>
                                                                            <option value="Bank Transfer">Bank Transfer / Online</option>
                                                                            <option  value="No Collection">No Collection</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                <div class="col-lg-12" id="reference_no_view" style="display:none">
                                                                    <div class="mb-3">
                                                                        <label for="example-text-input" class="form-label">Reference No</label>
                                                                        <input class="form-control" type="text"  id="reference_no">
                                                                    </div>
                                                                    
                                                                    
                                                                     <div class="mb-3" ng-if="payment_image!=0">
                                                                           <div class="imageset" >
                                                                             <img src="{{payment_image}}" class="img-responsive">
                                                                             </div>
                                                                     </div>
                                                                     
                          
                                                                    
                                                                    <div class="mb-3">
                                                                        <label for="example-text-input" class="form-label">Image Upload</label>
                                                                        <input type="file" file-input="files" class="form-control">
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                
                                                                
                                                                
                                                                  <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Rescheduling in Delivery / Return </label>
                                                                        <select class="form-select" id="rescheduling_delivery">
                                                                           
                                                                            <option value="NO">NO</option>
                                                                            <option value="YES">YES</option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                   </div>
                                                                
                                                                
                                                                   <div class="col-lg-12" id="rescheduling_delivery_view" style="display:none">
                                                                        <div class="mb-3">
                                                                        <label for="example-text-input" class="form-label">Rescheduling Date</label>
                                                                        <input class="form-control" type="date"  id="rescheduling_date">
                                                                       </div>
                                                                       
                                                                         <div class="mb-3">
                                                                        <label for="example-text-input" class="form-label">Rescheduling Remarks</label>
                                                                        <input class="form-control" type="text"  id="rescheduling_remarks">
                                                                       </div>
                                                                       
                                                                   </div>
                                                                
                                                                
                                                                
                                                                
                                                                
                                                         <div class="col-lg-12" id="dinomainitionview" style="display:none">        
                                                                
                                                                 <table  class="table">
                          <tr><td><b>Denomination</b></td></tr>
                            
                            
                           <tr><td>10 * </td><td><input type="number"  style="width: 80px;" id="10_rs"></td><td><input type="number"      readonly style="width: 80px;border: none;" id="10_total"></td></tr>
                           <tr><td>20 * </td><td><input type="number"  style="width: 80px;" id="20_rs"></td><td><input type="number"      readonly style="width: 80px;border: none;" id="20_total"></td></tr>
                           
                           <tr><td>50 * </td><td><input type="number"  style="width: 80px;" id="50_rs"></td><td><input type="number"      readonly style="width: 80px;border: none;" id="50_total"></td></tr>
                           <tr><td>100 *</td><td> <input type="number"  style="width: 80px;" id="100_rs"></td><td><input type="number"    readonly style="width: 80px;border: none;" id="100_total"></td></tr>
                           <tr><td>200 * </td><td><input type="number"  style="width: 80px;" id="200_rs"></td><td><input type="number"    readonly style="width: 80px;border: none;" id="200_total"></td></tr>
                           <tr><td>500 * </td><td><input type="number"  style="width: 80px;" id="500_rs"></td><td><input type="number"    readonly style="width: 80px;border: none;" id="500_total"></td></tr>
                           <tr><td>2000 * </td><td><input type="number"  style="width: 80px;" id="2000_rs"></td><td><input type="number"  readonly style="width: 80px;border: none;" id="2000_total"></td></tr>
                           
                           
                           
 <tr><td>Total Amount </td><td><span  ><input type="number" id="fulltotal" data-value="{{fulltotaldel+delivery_charge}}"  readonly style="width: 80px;border: none;"></span></td><td></td></tr>
                          
                          
                          <tr style="color: red;font-weight: 800;"><td>Balance Amount :</td> <td><span id="bal"></span></td><td></td></tr>
                          
                          <tr id="accessshow" style="display:none;"><td><label for="set1"><input type="radio" class="selectcollection" name="selectcollection" id="set1" value="1"> Return the excess :</label></td> <td><input type="number" readonly style="width: 80px;" value="0" id="return_excess" ></td><td></td></tr>
                          <tr id="accessshow1" style="display:none;"><td><label for="set2"><input type="radio" class="selectcollection" name="selectcollection" checked id="set2" value="2"> Collect the excess :</label></td> <td><input type="number" readonly style="width: 80px;" value="0" id="return_excess1" ></td><td></td></tr>
                          
                      </table>
                      
                      </div>
                     
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                            </div>
                                                              
                                                            
                                                          </form>
                                                          <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i
                                                                        class="mdi mdi-arrow-left me-1"></i> Previous</a></li>
                                                            <li class="float-end"><a href="javascript: void(0);" class="btn btn-primary"  ng-click="tripcomplete()"   data-bs-toggle="modal"
                                                                    data-bs-target=".confirmModal"><i class="mdi mdi-thumb-up pe-1"></i>Mark as Trip Complete </a></li>
                                                        </ul>
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
     
   


   
 <script>
 
 function moveToNext(t,e){
    
     0<t.value.length&&$("#digit"+e+"-input").focus()
     
     
 }

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









$scope.fetchData = function(){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_delivery_data?order_id=<?php echo $id; ?>&tablenamemain=<?php echo 'orders_process'; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert=1').success(function(data){
      $scope.namesData = data;
    });
    
   
  
   
};





$scope.fetchCustomerororderhistroy = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroy_driver",
      data:{'action':'fetch_single_data','order_id':'<?php echo $id; ?>','tablenamemain':'orders_process'}
    }).success(function(data){

        $scope.namesHistory = data;
          
    });
};

$scope.fetchCustomerororderhistroyorderlist = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroyorderlist_driver",
      data:{'action':'fetch_single_data','order_id':'<?php echo $id; ?>','tablenamemain':'orders_process','tablename_sub':'order_product_list_process'}
    }).success(function(data){

          $scope.namesHistoryorder = data;
          
         
    });
};






 
 $scope.tripcomplete = function () {


    
    var paymentmode= $('#cashmode').val();
    
      var otpid = $(".otpid");
      var order_otp = [];
      
      for(var i = 0; i < otpid.length; i++){
                 order_otp.push($(otpid[i]).val());
                 
      }
            
       var otp= order_otp.join("|"); 
      
    
    
      var selectcollection_id_data=0;
      var selectcollection = $(".selectcollection");
      var selectcollection_id_value = [];
      for(var i = 0; i < selectcollection.length; i++){
          
          if($(selectcollection[i]).is(':checked')) {
              
           selectcollection_id_value.push($(selectcollection[i]).val());
           
          }
         
      }
      var selectcollection_id_data= selectcollection_id_value.join("|");
      
      if(selectcollection_id_data=="")
      {
        var selectcollection_id_data= 0;  
      }
    
    

    if(paymentmode!='')
    {
        
        
        
     
     var c10_rs= $('#10_rs').val();
     var c20_rs= $('#20_rs').val();
     
     var c50_rs= $('#50_rs').val();
     var c100_rs= $('#100_rs').val();
     var c200_rs= $('#200_rs').val();
     var c500_rs= $('#500_rs').val();
     var c2000_rs= $('#2000_rs').val();
     
     var validation_amount= $('#fulltotal').data('value');
     var amount_data= $('#fulltotal').val();
     var reference_no= $('#reference_no').val();
     var km_reading_end= $('#km_reading_end').val();
     
     var rescheduling_delivery= $('#rescheduling_delivery').val();
 
     
     var rescheduling_date= $('#rescheduling_date').val();
     var rescheduling_remarks= $('#rescheduling_remarks').val();


      var return_excess= $('#return_excess').val();
      var return_excess1= $('#return_excess1').val();

      
      
      if(paymentmode!='Cash')
      {
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/tripcomplete",
                        data:{'km_reading_end':km_reading_end,'selectcollection_id_data':selectcollection_id_data,'return_excess1':return_excess1,'return_excess':return_excess,'c10_rs':c10_rs,'c20_rs':c20_rs,'c50_rs':c50_rs,'otp':otp,'c100_rs':c100_rs,'c200_rs':c200_rs,'c500_rs':c500_rs,'c2000_rs':c2000_rs,'reference_no':reference_no,'paymentmode':paymentmode,'rescheduling_delivery':rescheduling_delivery,'rescheduling_date':rescheduling_date,'rescheduling_remarks':rescheduling_remarks,'order_id':'<?php echo $id; ?>'}
                        }).success(function(data){
                            
                            if(data.error == '1')
                            {
                                  $scope.success = false;
                                  $scope.error = true;
                                  $scope.errorMessage = data.massage;
                            }
                            else
                            {
                                
                                 alert('Trip Completed.');
                                 window.location.replace("<?php echo base_url(); ?>index.php/order/driver_orders_list");

       
                            }
                               
                              
                        
                    
                        });
                        
                        
                        
                                 var product_id='<?php echo $id; ?>';
              
                               var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file', file);  
                               });  
                               
                              
                               
                               $http.post('<?php echo base_url() ?>index.php/order/payment_image?id='+product_id, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                   
                                    
                               });  
                        
          
      }
      else
      {
          
          
             //if(validation_amount>=amount_data)
             //{
                 
    
                       $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/tripcomplete",
                        data:{'km_reading_end':km_reading_end,'selectcollection_id_data':selectcollection_id_data,'return_excess1':return_excess1,'return_excess':return_excess,'c10_rs':c10_rs,'c20_rs':c20_rs,'c50_rs':c50_rs,'otp':otp,'c100_rs':c100_rs,'c200_rs':c200_rs,'c500_rs':c500_rs,'c2000_rs':c2000_rs,'reference_no':reference_no,'paymentmode':paymentmode,'rescheduling_delivery':rescheduling_delivery,'rescheduling_date':rescheduling_date,'rescheduling_remarks':rescheduling_remarks,'order_id':'<?php echo $id; ?>'}
                        }).success(function(data){
                    
                            if(data.error == '1')
                            {
                                  $scope.success = false;
                                  $scope.error = true;
                                  $scope.errorMessage = data.massage;
                            }
                            else
                            {
                                
                                 alert('Trip Completed.');
                                 window.location.replace("<?php echo base_url(); ?>index.php/order/driver_orders_list");
                                
                            }
                    
                        });
                        
             //}
             //else
             //{
                   //alert('Value mismatche! Input amount '+ amount_data +' Bill Amount '+ validation_amount);
             //}
        
          
          
      }
        
        
        
        
    }
    else
    {
         alert('Select Payment Mode');
    }


     




}

 






$scope.returnfinsh = function(){
   
        
              var returnid = $(".returnid");
              var order_product_id_set_value = [];
              var status = [];
               for(var i = 0; i < returnid.length; i++){
                  
                  if($(returnid[i]).is(':checked'))
                  {
                      
                   order_product_id_set_value.push($(returnid[i]).val());
                   status.push(2);
                   
                  }
                  else
                  {
                      order_product_id_set_value.push($(returnid[i]).val());
                      status.push(1);
                  }
                 
               }
            
               var order_product_id= order_product_id_set_value.join("|");
                var status_id= status.join("|");
      
        
                $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                    data:{'action':'returnproduct_driver','status':status_id,'order_product_id':order_product_id,'tablename_sub':'order_product_list_process '}
                  }).success(function(data){
                   
                }); 
         
};



$scope.fetchSingleDatatotal = function(){
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_totaldel?order_id=<?php echo $id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'orders_process','tablename_sub':'order_product_list_process'}
      }).success(function(data){

       $scope.fulltotal = data.fulltotal;
       
       
       $scope.order_no_id = data.order_no_id;
       $scope.start_reading = data.start_reading;
       
      
       
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






$scope.fetchSingleDatatotaldel = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_totaldel?order_id=<?php echo $id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'orders_process','tablename_sub':'order_product_list_process','convert':'1'}
      }).success(function(data){

       $scope.fulltotaldel = data.fulltotal;
       
       $scope.commissiondel = data.commission;
       
       
       $scope.paricel_mode_del = data.paricel_mode;
       
       
       
       $scope.delivery_mode = data.delivery_mode;
      
       $scope.totalitemsdel = data.totalitems;
       $scope.discounttotaldel = data.discount;
       $scope.discountfulltotaldel = data.discountfulltotal;
      
     
       $scope.fullqtydel = data.fullqty;
      
    });
};

















$scope.fetchCustomerdetails = function () {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerdetails",
      data:{'id':'<?php echo $id; ?>','tablename':'orders_process'}
    }).success(function(data){
        
        
   
 $scope.company_name_data = data.company_name_data;
            $scope.customername = data.name;
            $scope.routename = data.route_name;
            
            
            
            $('#lat').val(data.lat);
            $('#laog').val(data.laog);
            
            
            $scope.address = data.address;
            $scope.orderno = data.order_no;
            $scope.customerphone = data.phone;
            $scope.starttime = data.create_date;
            $scope.totalamount = data.totalamount;
            
            $scope.payment_image = data.payment_image;
            
            $('#reference_no').val(data.reference_no);
           
             $scope.map = data.map;
             $scope.delivery_mode=data.delivery_mode;
             $('#cashmode').val(data.payment_mode);
             
             if(data.payment_mode=="Cheque")
             {
                 $('#reference_no_view').show();
             }
             if(data.payment_mode=="Bank Transfer")
             {
                 $('#reference_no_view').show();
             }
            
            if(data.payment_mode=="Cash")
             {
                 $('#dinomainitionview').show();
             }
            
            
           
             
            $scope.payment_mode = data.payment_mode;
            $scope.deliverystatus = data.delivery_status;
            
             
             $scope.delivery_status_name = data.delivery_status_name;
            
             $scope.delivery_charge = data.delivery_charge;
            
            
            
            
            

    });



}




});



$(document).ready(function(){
  $("#cashmode").change(function(){
   
   
     var val= $(this).val();
     
     
    
     
     if(val=='Cash')
     {
          $('#dinomainitionview').show();
          $('#reference_no_view').hide();
     }
     else
     {
          $('#dinomainitionview').hide();
          $('#reference_no_view').show();
     }
     
     
    
   
   
  });
  
  
    $("#rescheduling_delivery").change(function(){
   
   
     var val= $(this).val();
     
     
    
     
     if(val=='NO')
     {
         
          $('#rescheduling_delivery_view').hide();
     }
     else
     {
         $('#rescheduling_delivery_view').show();
     }
     
     
    
   
  });
  
  
  
  
  
  
  
  
   $('#10_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*10
       $('#10_total').val(tot);
       
       
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }

      
       
       
       
   });
  
  $('#20_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*20
       $('#20_total').val(tot);
       
       
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }
       
       
   });
  
  $('#50_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*50
       $('#50_total').val(tot);
       
       
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
        if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }
       
       
   });


   $('#100_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*100
       $('#100_total').val(tot);
       
       
        var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
      if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }
       
       
   });


   $('#200_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*200
       $('#200_total').val(tot);
       
       
       
       
 var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
     
     if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
            $('#return_excess').val('0');
            $('#return_excess1').val('0');
       }
       
       
       
   });

   $('#500_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*500
       $('#500_total').val(tot);
       
       
        var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
         var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
       if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       if (totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
             $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }
       
   });
   $('#2000_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*2000
       $('#2000_total').val(tot);
       
       
        var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
     
       if(c10_total=='')
     {
         var c10_total=0;
     }
     
      if(c20_total=='')
     {
         var c20_total=0;
     }
     
     
     if(c50_total=='')
     {
         var c50_total=0;
     }
     if(c100_total=='')
     {
         var c100_total=0;
     }
     if(c200_total=='')
     {
         var c200_total=0;
     }
     if(c500_total=='')
     {
         var c500_total=0;
     }
     
     if(c2000_total=='')
     {
         var c2000_total=0;
     }
       
     var  amount_data= parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
     $('#fulltotal').val(amount_data);
     
     
     
      var allam= parseInt($('#fulltotal').data('value'));
      var totbal=allam-amount_data
      $('#bal').text(totbal);
       
       if(totbal < 0) {
    
            $('#accessshow').show();
            $('#accessshow1').show();
            $('#return_excess1').val(Math.abs(totbal));
            $('#return_excess').val(totbal);
           
       }
       else
       {
            $('#accessshow').hide();
            $('#accessshow1').hide();
           $('#return_excess').val('0');
           $('#return_excess1').val('0');
       }
     
   });
  
  
  
  
  
  
  
});

</script>  
   
   
   
        <script src="<?php echo base_url(); ?>/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/feather-icons/feather.min.js"></script>
        
        <!-- Required datatable js -->
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        
        
        <!-- pace js -->
        <script src="<?php echo base_url(); ?>/assets/libs/pace-js/pace.min.js"></script>
        <!-- twitter-bootstrap-wizard js -->
        <script src="<?php echo base_url(); ?>/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/twitter-bootstrap-wizard/prettify.js"></script>
        <!-- form wizard init -->
        <script src="<?php echo base_url(); ?>/assets/js/pages/form-wizard.init.js"></script>
        <!-- Responsive examples -->
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="<?php echo base_url(); ?>/assets/js/pages/datatables.init.js"></script>   
        <script src="<?php echo base_url(); ?>/assets/js/app.js"></script>
</body>


