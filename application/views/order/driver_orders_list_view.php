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
                                                                    <span ng-if="customername">Contact Person : {{customername}}</span>
                                                                  <span>Contact Phone : {{customerphone}}</span>
                                                                  <span>{{address}}</span>
                                                                  
                                                                  <span><b>Locality: {{localityname}}</b></span>
                                                                  <span><b>Route: {{routename}}</b></span>
                                                                  
                                                                  
                                                                   <span>Delivery Date Time : {{delivery_date_time}} <b ng-if="SSD_check>0" style="color:red;">SDP</b> <b ng-if="excess_payment_status>0" style="color:red;"> | Excess payment</b></span>

                                                                  </p>
                                                                  <p class=""> <span class="font-size-12">{{orderno}}</span><a href="tel::{{customerphone}}"><span><i class="mdi-phone mdi font-size-20 me-1"></i> Call Customer</span></a>
                                                                  
                                                                   <span ng-if="lengeth>0"><b>Max Length : {{lengeth}}</b></span>
                                                                   <br>
                                                                   <span>Sales Person: {{sales_name}} | {{sales_phone}}</span>
                                                                  </p>
                                                                  
                                                                 
                                                                  
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
                                                            
                                                                         
                                                                        <h4>Trip ID : {{trip_id}}</h4>
                                                                         
                                                                        <div class="mb-3" ng-if="start_reading>0">
                                                                        <label for="example-text-input" class="form-label">Trip Start Reading  : </label>
                                                                        <b> {{start_reading}}</b>
                                                                        </div>
                                                                      
                                                                        <div class="mb-3" ng-if="sort_id==last_trip_sort_id" style="display:none;">
                                                                        <label for="example-text-input" class="form-label">Trip Reading End</label>
                                                                        <input class="form-control" type="text" id="km_reading_end">
                                                                       </div>
                                                                       
                                                                       <div class="mb-3" ng-if="sort_id!=last_trip_sort_id">
                                                                        
                                                                        <input class="form-control" type="hidden" value="0" id="km_reading_end">
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
                                                                  
                                                                  <p class="">
                                                                  <span>Company : {{company_name_data}}</span>      
                                                                    <span ng-if="customername">Contact Person : {{customername}}</span>
                                                                  <span>Contact Phone : {{customerphone}}</span>
                                                                  <span>{{address}}</span>
                                                                  
                                                                  <span><b>Locality: {{localityname}}</b></span>
                                                                  <span><b>Route: {{routename}}</b></span>
                                                                  
                                                                  
                                                                   <span>Delivery Date Time : {{delivery_date_time}} <b ng-if="SSD_check>0" style="color:red;">SDP</b> <b ng-if="excess_payment_status>0" style="color:red;"> | Excess payment</b></span>

                                                                   
                                                                  </p>
                                                                  <p class=""><span class="font-size-12">{{orderno}}</span><a href="tel::{{customerphone}}"><span><i class="mdi-phone mdi font-size-20 me-1"></i> Call Customer</span></a>
                                                                  
                                                                  
                                                                   <span ng-if="lengeth>0"><b>Max Length : {{lengeth}}</b></span>
                                                                   <br>
                                                                   <span>Sales Person: {{sales_name}} | {{sales_phone}}</span>
                                                                  </p>
                                                                  
                                                                   
                                                               </div>
                                                                <div class="time">
                                                                  
                                                                  <p><span>Invoice</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>
                                                                  
                                                                  
                                                                  
                                                       <a  target="_blank" href="<?php echo base_url(); ?>index.php/order/overview?order_id=<?php echo base64_encode($id); ?>&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process" >Download</a> 
                                                                      
                                                                  </span></p>
                                                                  <!--<p><span>DC</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span></p>-->
                                                                  <p><span>SubTotal</span><span> Rs. {{fulltotaldel-tcsamount}}</span></p>
                                                                   <p ng-if="tcsamount>0"><span>TCS (+)</span><span> Rs. {{tcsamount}}</span></p>
                                                                  <p ng-if="delivery_charge>0"><span>Delivery Charge</span><span> Rs. {{delivery_charge}}</span></p>
                                                                  <p ng-if="return_amount>0"><span>Return</span><span> Rs. {{return_amount}}</span></p>
                                                                  <p><span>Bill Amount</span><span> Rs. {{discountfulltotal}}</span></p>
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
                                                                                                
                                                                                                  <tr ng-if="tcsamount>0">
                                                                                                    <td colspan="4" class="text-end">TCS (+)</td>
                                                                                                    <td class="text-right">Rs. {{tcsamount}} </td>
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
                                                                    <span ng-if="customername">Contact Person : {{customername}}</span>
                                                                  <span>Contact Phone : {{customerphone}}</span>
                                                                  <span>{{address}}</span>
                                                                  
                                                                  <span><b>Locality: {{localityname}}</b></span>
                                                                  <span><b>Route: {{routename}}</b></span>
                                                                  
                                                                  
                                                                 <span>Delivery Date Time : {{delivery_date_time}} <b ng-if="SSD_check>0" style="color:red;">SDP</b> <b ng-if="excess_payment_status>0" style="color:red;"> | Excess payment</b></span> 
                                                                  
                                                                  </p>
                                                                  <p class=""><span class="font-size-12">{{orderno}}</span><a href="tel::{{customerphone}}"><span><i class="mdi-phone mdi font-size-20 me-1"></i> Call Customer</span></a>
                                                                  
                                                                  
                                                                   <span ng-if="lengeth>0"><b>Max Length : {{lengeth}}</b></span>
                                                                  
                                                                   <br>
                                                                   <span>Sales Person: {{sales_name}} | {{sales_phone}}</span>
                                                                  </p>
                                                                  
                                                                  
                                                               </div>
                                                                 <div class="time">
                                                                  
                                                                  <p><span>Invoice</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>
                                                                  
                                                                  
                                                                  
                                                       <a  target="_blank" href="<?php echo base_url(); ?>index.php/order/overview?order_id=<?php echo base64_encode($id); ?>&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process" >Download</a> 
                                                                      
                                                                  </span></p>
                                                                  <!--<p><span>DC</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span></p>-->
                                                                  <p><span>SubTotal</span><span> Rs. {{fulltotaldel-tcsamount}}</span></p>
                                                                  <p ng-if="tcsamount>0"><span>TCS (+)</span><span> Rs. {{tcsamount}}</span></p>
                                                                  <p ng-if="delivery_charge>0"><span>Delivery Charge</span><span> Rs. {{delivery_charge}}</span></p>
                                                                   <p ng-if="return_amount>0"><span>Return</span><span> Rs. {{return_amount}}</span></p>
                                                                  <p><span>Bill Amount</span><span> Rs. {{discountfulltotal}}</span></p>
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
                                                                    
                                                                    
                                                                     <!--<div class="mb-3" ng-if="payment_image!=0">
                                                                           <div class="imageset" >
                                                                             <img src="{{payment_image}}" class="img-responsive">
                                                                             </div>
                                                                     </div>-->
                                                                     
                          
                                                                    
                                                                    <div class="mb-3">
                                                                        <label for="example-text-input" class="form-label">Image Upload</label>
                                                                        <input type="file" file-input="files" class="form-control">
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                
                                                                
                                                                
                                                                  <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Rescheduling in Delivery / Return </label>
                                                                        <select class="form-select" id="rescheduling_delivery">
                                                                           
                                                                            <option value="NO">NO Return</option>
                                                                            <option value="YES">YES Return</option>
                                                                            <option value="Re-Delivery">Re-Delivery</option>
                                                                            <option value="Rescheduling">Rescheduling</option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                   </div>
                                                                
                                                                
                                                                   <div class="col-lg-12" id="rescheduling_delivery_view" style="display:none">
                                                                        <div class="mb-3">
                                                                        <label for="example-text-input" class="form-label">Rescheduling Date</label>
                                                                        <input class="form-control" type="datetime-local"  id="rescheduling_date">
                                                                       </div>
                                                                       
                                                                         <div class="mb-3">
                                                                        <label for="example-text-input" class="form-label">Rescheduling Remarks</label>
                                                                        <input class="form-control" type="text"  id="rescheduling_remarks">
                                                                       </div>
                                                                       
                                                                   </div>
                                                                
                                                                
                                                                
                                                                
                                                                
                                                         <div class="col-lg-12" id="dinomainitionview" style="display:none">        
                                                                
                                                                 <table  class="table">
                          <tr><td><b>Denomination</b></td></tr>
                            
                            
                           <tr><td>1 * </td><td><input type="number"  style="width: 80px;" id="1_rs"></td><td><input type="number"      readonly style="width: 80px;border: none;" id="1_total"></td></tr>
                           <tr><td>2 * </td><td><input type="number"  style="width: 80px;" id="2_rs"></td><td><input type="number"      readonly style="width: 80px;border: none;" id="2_total"></td></tr>
                           <tr><td>5 * </td><td><input type="number"  style="width: 80px;" id="5_rs"></td><td><input type="number"      readonly style="width: 80px;border: none;" id="5_total"></td></tr>
                           
                            
                           <tr><td>10 * </td><td><input type="number"  style="width: 80px;" id="10_rs"></td><td><input type="number"      readonly style="width: 80px;border: none;" id="10_total"></td></tr>
                           <tr><td>20 * </td><td><input type="number"  style="width: 80px;" id="20_rs"></td><td><input type="number"      readonly style="width: 80px;border: none;" id="20_total"></td></tr>
                           
                           <tr><td>50 * </td><td><input type="number"  style="width: 80px;" id="50_rs"></td><td><input type="number"      readonly style="width: 80px;border: none;" id="50_total"></td></tr>
                           <tr><td>100 *</td><td> <input type="number"  style="width: 80px;" id="100_rs"></td><td><input type="number"    readonly style="width: 80px;border: none;" id="100_total"></td></tr>
                           <tr><td>200 * </td><td><input type="number"  style="width: 80px;" id="200_rs"></td><td><input type="number"    readonly style="width: 80px;border: none;" id="200_total"></td></tr>
                           <tr><td>500 * </td><td><input type="number"  style="width: 80px;" id="500_rs"></td><td><input type="number"    readonly style="width: 80px;border: none;" id="500_total"></td></tr>
                           <tr><td>2000 * </td><td><input type="number"  style="width: 80px;" id="2000_rs"></td><td><input type="number"  readonly style="width: 80px;border: none;" id="2000_total"></td></tr>
                           
                           
                           
 <tr><td>Total Amount </td><td><span  ><input type="number" id="fulltotal" data-value="{{discountfulltotal}}"  readonly style="width: 80px;border: none;"></span></td><td></td></tr>
                          
                          
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
     
   


   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
     <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                                    aria-hidden="true" id="modelid">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel">Create Return</h5>
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
                            <label class="col-sm-12 col-form-label">Invoice No <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                                
                                <select class="form-control"  id="order_no" required name="order_no">
                                    
                                    <option  value="{{orderno}}"> {{orderno}} </option>
                                </select>
                              
                            
                            
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
                        
                         <div  class="col-md-12" id="showdata" ng-show="namesDataproduct.length>0">
                                 <br>                          
                                                                <table class="table" >
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     <tr>
                                                                         <th><input type="checkbox" id="checkall" ng-click="loadProductAll()"></th>
                                                                        
                                                                         <th>Product Name</th>
                                                                         <td>NOS</td>
                                                                         <td>QTY</td>
                                                                         <td>Rate</td>
                                                                         <td>Amount</td>
                                                                         <td style="display:none;">Sales Return Complaint</td>
                                                                        
                                                                     </tr>
                                                                     <tr  ng-repeat="namesp in namesDataproduct">
                                                                     
                                                                         <td><input type="checkbox" class="purchase_order_product_id" name="purchase_order_product_id" value="{{namesp.id}}"></td>
                                                                         
                                                                         <td>{{namesp.product_name}}</td>
                                                                          <td><input type="textt" value="{{namesp.nos}}" data-nos="{{namesp.nos}}" ng-keyup="inputsave_1(namesp.id,'nos',namesp.categories_id,namesp.type,namesp.profile,namesp.crimp,namesp.fact,namesp.rate,namesp.uom)" id="nos_{{namesp.id}}" class="form-control order_nos" name="order_nos" ></td>
                                                                         <td><input type="textt" value="{{namesp.qty}}" readonly class="form-control purchase_qty" id="qty_{{namesp.id}}" name="purchase_qty" ></td>
                                                                         <td>{{namesp.rate}}</td>
                                                                         <td id="amount_{{namesp.id}}" class="amount">{{namesp.amount}}</td>
                                                                          <td style="display:none;">
                                                                              
                                                                              
                                                                              <select class="form-control purchase_notes" name="purchase_notes">
                                                                                  <option value="">Select Status</option>
                                                                                  <?php
                                                                                  $option=array();
                                                                                  foreach($additional_information as $vl)
                                                                                  {
                                                                                     $option=$vl->option; 
                                                                                     $option=explode(",",$option);
                                                                                  }
                                                                                    for($i=0;$i<count($option);$i++)
                                                                                    {
                                                                                        if($option[$i]!='')
                                                                                        {
                                                                                            ?>
                                                                                             <option value="<?php echo $option[$i]; ?>"><?php echo $option[$i]; ?></option>
                                                                                            <?php
                                                                                        }
                                                                                        
                                                                                    }
                                                                                  
                                                                                  
                                                                                  ?>
                                                                              </select>
                                                                              
                                                                             
                                                                              
                                                                              
                                                                              </td>
                                                                         
                                                                       
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td id="total_qty">{{total_qty}}</td>
                                                                         <td>Total </td>
                                                                         <td id="total_amount">{{total_amount}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>

                        
                       <div class="col-md-12" style="display:none;">
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
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_delivery_data_driver?order_id=<?php echo $id; ?>&tablenamemain=<?php echo 'orders_process'; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert=1').success(function(data){
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
        
        
        
       var c1_rs= $('#1_rs').val();
             var c2_rs= $('#2_rs').val();
             var c5_rs= $('#5_rs').val();
             
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

      
      
      if(rescheduling_delivery=='Re-Delivery')
      {
          
          
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order_second/sales_return_driver_push_data",
                        data:{'km_reading_end':km_reading_end,'order_id':'<?php echo $id; ?>'}
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
          
          
      }
      else if(rescheduling_delivery=='Rescheduling')
      {
          if(rescheduling_date!='')
          {
              
            
              
            
              
                $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/tripcomplete",
                        data:{'km_reading_end':km_reading_end,'selectcollection_id_data':selectcollection_id_data,'return_excess1':return_excess1,'return_excess':return_excess,'c1_rs':c1_rs,'c2_rs':c2_rs,'c5_rs':c5_rs,'c10_rs':c10_rs,'c20_rs':c20_rs,'c50_rs':c50_rs,'otp':otp,'c100_rs':c100_rs,'c200_rs':c200_rs,'c500_rs':c500_rs,'c2000_rs':c2000_rs,'reference_no':reference_no,'paymentmode':paymentmode,'rescheduling_delivery':rescheduling_delivery,'rescheduling_date':rescheduling_date,'rescheduling_remarks':rescheduling_remarks,'order_id':'<?php echo $id; ?>'}
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
              
          }
          else
          {
              alert('Select The Rescheduling Date');
          }
      }
      else
      {
          
          
      if(paymentmode!='Cash')
      {
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/tripcomplete",
                        data:{'km_reading_end':km_reading_end,'selectcollection_id_data':selectcollection_id_data,'return_excess1':return_excess1,'return_excess':return_excess,'c1_rs':c1_rs,'c2_rs':c2_rs,'c5_rs':c5_rs,'c10_rs':c10_rs,'c20_rs':c20_rs,'c50_rs':c50_rs,'otp':otp,'c100_rs':c100_rs,'c200_rs':c200_rs,'c500_rs':c500_rs,'c2000_rs':c2000_rs,'reference_no':reference_no,'paymentmode':paymentmode,'rescheduling_delivery':rescheduling_delivery,'rescheduling_date':rescheduling_date,'rescheduling_remarks':rescheduling_remarks,'order_id':'<?php echo $id; ?>'}
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
          
          
          
          
          
          
          
             if(amount_data>0)
             {
                 
                      var getamount=$('#fulltotal').val();
                      var difference=$('#bal').text();
                      
                      //alert(difference+' '+getamount);
                       $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/tripcomplete",
                        data:{'getamount':getamount,'difference':difference,'km_reading_end':km_reading_end,'selectcollection_id_data':selectcollection_id_data,'return_excess1':return_excess1,'return_excess':return_excess,'c1_rs':c1_rs,'c2_rs':c2_rs,'c5_rs':c5_rs,'c10_rs':c10_rs,'c20_rs':c20_rs,'c50_rs':c50_rs,'otp':otp,'c100_rs':c100_rs,'c200_rs':c200_rs,'c500_rs':c500_rs,'c2000_rs':c2000_rs,'reference_no':reference_no,'paymentmode':paymentmode,'rescheduling_delivery':rescheduling_delivery,'rescheduling_date':rescheduling_date,'rescheduling_remarks':rescheduling_remarks,'order_id':'<?php echo $id; ?>'}
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
                        
             }
             else
             {
                   alert('Fill The Denomination');
             }
        
          
          
      }
          
          
      }
      
    
        
        
        
        
    }
    else
    {
         alert('Select Payment Mode');
    }


     




}

 

$scope.create_date=new Date();


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
      
             $('.purchase_notes').each(function(){
                    
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
             
             
              var order_nos = [];
      
             $('input[name="order_nos"]').each(function(){
                    
                    if($(this).val()!="")
                    {
                        order_nos.push($(this).val()); 
                    }
                    
                
            });
            
             var order_nos_data= order_nos.join("|");
         
             var order_no= $('#order_no').val();
             var km_reading_end= $('#km_reading_end').val();
 
    if(validation!=0)
    {
        
    
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/sales_return_data_by_driver",
      data:{'create_date':$scope.create_date,'km_reading_end':km_reading_end,'remarks':$scope.remarks,'order_no':order_no,'order_nos_data':order_nos_data,'purchase_order_product_id':checkinsert,'purchase_qty_data':purchase_qty_data,'purchase_notes_data':purchase_notes_data,'action':'Inward','tablename':'order_sales_return_complaints'}
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
              
              
                                                                 $scope.fetchSingleDatatotal();
                                                                 $scope.remarks="";
                                                                 $scope.order_no="";
                                                                 $scope.success = true;
                                                                 $scope.error = false;
                                                                 //$('#exampleModalScrollable').modal('toggle');
                                                                 $scope.successMessage = data.massage;
                                                                 $('#showdata').hide();
            
                                                                $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                    
                                                                     if(data.st==1)
                                                                     {
                                                                        window.location.replace("<?php echo base_url(); ?>index.php/order/driver_orders_list");
                                                                     }
                                                                    
                                                                    
                                                                });
                                                                
                                                                $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-danger").slideUp(500);
                                                                    $('#exampleModalScrollable').modal('toggle');
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
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_totaldel_driver?order_id=<?php echo $id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'orders_process','tablename_sub':'order_product_list_process'}
      }).success(function(data){

       $scope.fulltotal = data.fulltotal;
       
       
       $scope.order_no_id = data.order_no_id;
       $scope.start_reading = data.start_reading;
       
      $scope.last_trip_sort_id = data.last_trip_sort_id;
      $scope.sort_id = data.sort_id;
      $scope.trip_id = data.trip_id;
      
       
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
       $scope.return_amount = data.return_amount;
     
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
       $scope.tcsamount = data.tcsamount;
       
       $scope.commissiondel = data.commission;
       
       
       $scope.paricel_mode_del = data.paricel_mode;
       
       
       
       $scope.delivery_mode = data.delivery_mode;
      
       $scope.totalitemsdel = data.totalitems;
       $scope.discounttotaldel = data.discount;
       $scope.discountfulltotaldel = data.discountfulltotal;
      
     
       $scope.fullqtydel = data.fullqty;
      
    });
};





 






   $scope.getPurchaseorderid = function(customer_id)
    {
      
      
             var autocomplete= customer_id;
             $http.get('<?php echo base_url() ?>index.php/order/fetch_product_get_vendor_order_no?search='+autocomplete).success(function(data){
              
              
              
              
               $scope.namesDataproductorderno = data;
              
                
            });
        
    };















$("#rescheduling_delivery").change(function(){
   
   
     var val= $(this).val();
     
     
    
     
     if(val=='Rescheduling')
     {
           $('#rescheduling_delivery_view').show();
           $('#dinomainitionview').hide();
          
     }
     else if(val=='YES')
     {
         $('#exampleModalScrollable').modal('toggle');
          $scope.getProductlistdata();
          
     }
     else if(val=='Re-Delivery')
     {
         $('#dinomainitionview').hide();
          
     }
     else
     {
        $('#rescheduling_delivery_view').hide();
         $('#dinomainitionview').show();
         
     }
     
     
    
   
  });

















  
   $scope.getProductlistdata = function(){
      
      
     var order_no= $('#order_no').val();
      
     $http.get('<?php echo base_url() ?>index.php/order/get_purchase_product_list?order_no='+order_no).success(function(data){
      
      
       $scope.namesDataproduct = data;
       
             
                var total_qty_val = 0;
                for(var i = 0; i < data.length; i++){
                    var qty = parseFloat(data[i].qty,2);
                  
                    total_qty_val += qty;
                }
                $scope.total_qty=total_qty_val.toFixed(2);
                
                
                
                 var total_amount_val = 0;
                for(var i = 0; i < data.length; i++){
                    var amount = parseFloat(data[i].amount,2);
                  
                    total_amount_val += amount;
                }
                $scope.total_amount=total_amount_val.toFixed(2);
       
       
       
       $('#showdata').show();
      
       
     });
        
   };
   
   
   
   $scope.loadProductAll = function() {
      
      
       if($('#checkall').is(':checked'))
       {
      
            $('.purchase_order_product_id').prop('checked',true);
             
        
       }
       else
       {
            $('.purchase_order_product_id').prop('checked',false);
        
        
           
       }
       
       
      
  };

$scope.fetchCustomerdetails = function () {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerdetails",
      data:{'id':'<?php echo $id; ?>','tablename':'orders_process'}
    }).success(function(data){
        
           //$scope.getPurchaseorderid(data.customer_id);
   
              $scope.company_name_data = data.company_name_data;
           
         
            
            $scope.localityname = data.localityname;
            $scope.delivery_date_time = data.delivery_date_time;
             $scope.SSD_check = data.SSD_check;
            $scope.excess_payment_status = data.excess_payment_status;
            $scope.sales_phone = data.sales_phone;
             $scope.sales_name = data.sales_name;
           
            $scope.customername = data.name;
            $scope.routename = data.route_name;
            
             $scope.lengeth = data.lengeth;
            
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










































$scope.inputsave_1 = function (id,inputname,categories_id,type,profile,crimp,fact,rate,uom) {


                     
                        
                           var nos= parseFloat($('#nos_'+id).val());
                           var nosold= parseFloat($('#nos_'+id).data('nos'));
                       
                            
                          if(uom==3)
                          {
                                     
                                     
                                     
                              
                                      
                                       if(type==0)
                                       {
                                         var profile= parseFloat(profile)+parseFloat(crimp); 
                                         
                                       }
                                       else if(type==6)
                                       {
                                               var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       else if(type==15)
                                       {
                                          var profile= parseFloat(profile)*parseFloat(crimp); 
                                         
                                       }
                                       else if(type==13)
                                       {
                                               var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       else if(type==8)
                                       {
                                               var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       else
                                       {
                                         var profile= profile;  
                                       }
                                      
                                      
                                      
                                  
                                      
                                      var profile= parseFloat(profile*0.305);
                                    
                                      
                                  
                                       
                                      
                              
                          }
                         
                          if(uom==4)
                          {
                              
                                       if(type==0)
                                       {
                                         var profile= parseFloat(profile)+parseFloat(crimp); 
                                         
                                       }
                                       if(type==6)
                                       {
                                                 var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       if(type==15)
                                       {
                                          var profile= parseFloat(profile)*parseFloat(crimp); 
                                         
                                       }
                                       if(type==13)
                                       {
                                                 var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       if(type==8)
                                       {
                                                 var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       
                              
                                         var profile= parseFloat(profile/1000);
                                       
                              
                                          
                                     
                              
                              
                          }
                          if(uom==5)
                          {
                              
                                       if(type==0)
                                       {
                                          var profile= parseFloat(profile)+parseFloat(crimp); 
                                         
                                       }
                                       else if(type==6)
                                       {
                                                 var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       else if(type==15)
                                       {
                                          var profile= parseFloat(profile)*parseFloat(crimp); 
                                         
                                       }
                                       else if(type==13)
                                       {
                                                 var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       else if(type==8)
                                       {
                                                 var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       else
                                       {
                                          var profile= profile;
                                       }
                              
                            
                                       
                              
                              
                              
                          }
                          if(uom==6)
                          {
                              
                                        if(type==0)
                                       {
                                          var profile= parseFloat(profile)+parseFloat(crimp); 
                                         
                                       }
                                       if(type==6)
                                       {
                                          var profile= parseFloat(profile)+parseFloat(crimp); 
                                         
                                       }
                                       if(type==15)
                                       {
                                          var profile= parseFloat(profile)*parseFloat(crimp); 
                                         
                                       }
                                        if(type==13)
                                       {
                                          var profile= parseFloat(profile)+parseFloat(crimp); 
                                         
                                       }
                                       if(type==8)
                                       {
                                                 var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                              
                                       var profile= parseFloat(profile/39.37);
                                     
                                       
                                    
                              
                          }
                     
                      
                    
                        
                        
                           if(type==1)
                           {
                               
                               
                              
                               var sqt_qty=profile*nos;
                               var sqt_qty=sqt_qty.toFixed(3);
                               
                              
                               
                               
                           }
                           if(type==4)
                           {
                              
                               
                               var sqt_qty=profile*nos*fact;
                               var sqt_qty=sqt_qty.toFixed(3);
                              
                           }
                          
                           if(type==2)
                           {
                               
                             
                            
                               var sqt_qty=profile*nos*crimp;
                               var sqt_qty=sqt_qty.toFixed(3);
                               
                              
                           }
                             
                           if(type==3)
                           {
                                var sqt_qty=nos;
                                var sqt_qty=sqt_qty.toFixed(3);
                           }
                           
                           
                            if(type==14)
                           {
                               
                                var sqt_qty=nos*fact;
                                var sqt_qty=sqt_qty.toFixed(3);
                                
                           }
                           
                           if(type==9)
                           {
                               
                                
                                  var nos= parseFloat($('#qty_'+id).val());
                                  var sqt_qty=nos;
                                  var sqt_qty=sqt_qty.toFixed(3);
                                
                           }
                           
                           
                           if(type==19)
                           {
                                  var nos= parseFloat($('#qty_'+id).val());
                                  var sqt_qty=nos;
                                  var sqt_qty=sqt_qty.toFixed(3);
                                
                           }
                           
                           
                         
                           
                           
                           if(type==5)
                           {
                               
                               var sqt_qty=profile*nos*fact;
                               var sqt_qty=sqt_qty.toFixed(3);
                               
                              
                           }
                           if(type==8)
                           {
                              
                               var sqt_qty=profile*nos*fact;
                               var sqt_qty=sqt_qty.toFixed(3);
                               
                              
                           }
                           if(type==6)
                           {
                               
                               var subqty = parseFloat(profile);
                               var sqt=subqty*fact;
                               var sqt_qty=sqt*nos;
                               var sqt_qty = sqt_qty.toFixed(2);
                                
                              
                           }
                            if(type==15)
                           {
                               
                               
                                var subqty = parseFloat(profile);
                                var sqt=subqty;
                                if(uom==4)
                                {
                                   var sqtcell= sqt/1000;    
                                   var sqt_qty=sqtcell*nos/1000;
                               
                                }
                                else
                                {
                                  var sqt_qty=sqt*nos;
                                }
                               
                                var sqt_qty = sqt_qty.toFixed(2);
                             
                           }
                           
                           if(type==7)
                           {
                               
                                 var sqt_qty=profile*fact*nos;
                                 var sqt_qty=sqt_qty.toFixed(3);
                            
                               
                              
                           }
                           if(type==16 || type==17)
                           {
                               
                               var sqt_qty=profile*fact*nos;
                               var sqt_qty=sqt_qty.toFixed(3);
                               
                              
                           }
                           if(type==10)
                           {
                               
                               var sqt_qty=profile*fact*nos;
                               var sqt_qty=sqt_qty.toFixed(3);
                               
                              
                           }
                           
                           if(type==0)
                           {
                              
                               var subqty = parseFloat(profile);
                               var sqt=subqty*fact;
                               var sqt_qty=sqt*nos;
                               var sqt_qty = sqt_qty.toFixed(3);
                                        
                           }
                           
                           if(type==13)
                           {
                              
                               var subqty = parseFloat(profile);
                               var sqt=subqty*fact;
                               var sqt_qty=sqt*nos;
                               var sqt_qty = sqt_qty.toFixed(2);
                                        
                           }
                           
                           
                            if(type==11 || type==12)
                           {
                              
                               var subqty = parseFloat(profile);
                               var sqt=subqty*dim*crimp*fact;
                               var sqt_qty=sqt*nos;
                               var sqt_qty = sqt_qty.toFixed(2);
                                        
                           }
                           
                           
                     
                      $('#qty_'+id).val(sqt_qty);
                      
                      if(type==14)
                      {
                           var total=Math.round(rate*sqt_qty);
                           
                      }
                      else
                      {
                           var total=Math.round(rate*sqt_qty);
                      }
                      
                      
                      if(nos<=nosold)
                      {
                          
                            var totalammt=total.toFixed(2);
                            $('#amount_'+id).html(totalammt);
                          
                          
                            var cattotsum = 0;
                            $('.amount').each(function(){
                                cattotsum += parseFloat($(this).text());  
                            });
                            var alltotalcat=cattotsum.toFixed(2);
                            $('#total_amount').html(alltotalcat);
                            
                            
                            
                            var cattotqty = 0;
                            $('.purchase_qty').each(function(){
                                cattotqty += parseFloat($(this).val());  
                            });
                            var qty_total=cattotqty.toFixed(2);
                            $('#total_qty').html(qty_total);
                          
                      }
                      else
                      {
                          alert('Enter Value Below '+ nosold);
                          $('#nos_'+id).val(nosold);
                            var totalammt=total.toFixed(2);
                            $('#amount_'+id).html(totalammt);
                          
                          
                            var cattotsum = 0;
                            $('.amount').each(function(){
                                cattotsum += parseFloat($(this).text());  
                            });
                            var alltotalcat=cattotsum.toFixed(2);
                            $('#total_amount').html(alltotalcat);
                            
                            
                            
                            var cattotqty = 0;
                            $('.purchase_qty').each(function(){
                                cattotqty += parseFloat($(this).val());  
                            });
                            var qty_total=cattotqty.toFixed(2);
                            $('#total_qty').html(qty_total);
                          
                      }
                      
                     
                        
                      
  

      

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
  
  
    
  
  
  
  
  
  
  
  
  

 $('#1_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*1
       $('#1_total').val(tot);
       
       
       
       var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
      if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
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
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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





 $('#2_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*2
       $('#2_total').val(tot);
       
       
       
       var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
      if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
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
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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


 $('#5_rs').on('input',function(){
      
       var input= parseInt($(this).val());
       var tot=  input*5
       $('#5_total').val(tot);
       
       
       
       var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();
     
     var c10_total= $('#10_total').val();
     var c20_total= $('#20_total').val();
       
     var c50_total= $('#50_total').val();
     var c100_total= $('#100_total').val();
     var c200_total= $('#200_total').val();
     var c500_total= $('#500_total').val();
     var c2000_total= $('#2000_total').val();
     
     
      if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
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
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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
     
                            var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
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
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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
     
     
     
     
                              var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
     
     
     
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
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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
     
     
     
     

                              var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }





     
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
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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
     
     
     
                              var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }





     
     
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
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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
     
     
      var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }

     
     
     
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
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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
     
     
     
     
                              var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
     
     
     
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
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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
     
       var c1_total= $('#1_total').val();
       var c2_total= $('#2_total').val();
       var c5_total= $('#5_total').val();



        if(c1_total=='')
     {
         var c1_total=0;
     }
     
     
      if(c2_total=='')
     {
         var c2_total=0;
     }
     
     
     if(c5_total=='')
     {
        var c5_total=0;
     }
     
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
       
     var  amount_data= parseInt(c1_total)+parseInt(c2_total)+parseInt(c5_total)+parseInt(c10_total)+parseInt(c20_total)+parseInt(c50_total)+ parseInt(c100_total)+ parseInt(c200_total)+parseInt(c500_total)+parseInt(c2000_total);
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


