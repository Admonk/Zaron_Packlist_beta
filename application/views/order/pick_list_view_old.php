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
td input[type="text"] {
   
    width: 64%;
}
/*.disabled-div {
    pointer-events: none;
    opacity: 0.5;
}*/
.last-colorchange span{
    padding: 8px 18px;
}
.setloadnos
{
    margin: -4px 50px;
    position: absolute;
}
     
 .loadamount
{
color: green;

font-weight: 800;
}

 .loadamountred
{
color: red;

font-weight: 800;
}
     
.route p span:last-child {
    font-size: 12px;
    font-weight: 800;
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
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; 
     
     $read="readonly";
     //$readdriverset="Edit_";
     $readdriverset="Billed ";  
     $readdriver="";
     if($driver_pickip=='1')
     {
         //$readdriver="readonly";
         $readdriverset="Actual_";
     }
     

     $inputboxread="";
     $disabled="";
      if($DC_id_data!='')
     {   


          $inputboxread="disabled";
          $disabled="disabled";
         
     }
     
     ?>




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
                                                
                                                <ul class="twitter-bs-wizard-nav nav nav-pills nav-justified" style="display:none;">
                                                    <li class="nav-item">
                                                        <a href="#progress-seller-details" class="nav-link" data-toggle="tab">
                                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Seller Details">
                                                                <i class="bx bx-list-ul"></i>
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

                                                                  
                                                                 <!--  <span><b>Locality: {{localityname}}</b></span>
                                                                  <span><b>Route: {{routename}}</b></span> -->
                                                                  
                                                                  
                                                                     <span>Delivery Date Time : {{delivery_date_time}} <b ng-if="SSD_check>0" style="color:red;">SDP</b> <b ng-if="excess_payment_status>0" style="color:black;">| Excess payment</b></span>
                                                                    
                                                              
                                                                   
                                                                  </p>
                                                                  <p class="">
                                                                       <span class="font-size-12">{{orderno}}</span><a href="tel::{{customerphone}}"><span><i class="mdi-phone mdi font-size-20 me-1"></i> Call Customer</span></a>
                                                                       
                                                                        <span ng-if="lengeth>0"><b>Max Length : {{lengeth}}</b></span>


                                                                     <span style="color:red;"><b>Status :{{reason}} </b></span>    
                                                                         


                                                                   </p>





                                                              
                                                              
                                                              
                                                               </div>
                                                              
                                                               
                                                                   <ul>
                                                                   <?php
                                                                   $i=1;
                                                                   foreach($DC_list as $dd)
                                                                   {
                                                                     ?>

                                                                     <li>DC NO <?php echo $i; ?> : <a href="<?php echo base_url(); ?>index.php/order/delivery_note?order_id=<?php echo base64_encode($dd->order_id); ?>&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process&viewstatus=1&DC_id=<?php echo $dd->randam_id; ?>" target="_blank"><?php echo $dd->randam_id; ?></a></li>




                                                                     <?php
                                                                     $i++;
                                                                   }

                                                                   ?>
                                                                   </ul> 
                                                               
                                                               
                                                             <div class="time">
                                                                  
                                                                  <p><span>Invoice</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>
                                                                  
                                                                  
                                                                  
                                                       <a  target="_blank" href="<?php echo base_url(); ?>index.php/order/overview?order_id=<?php echo base64_encode($id); ?>&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process" >Download</a> 
                                                                      
                                                                  </span></p>
                                                                  <!--<p><span>DC</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span></p>-->
                                                                  <p><span>SubTotal</span><span> Rs. {{fulltotaldel-tcsamount}}</span></p>
                                                                  <p ng-if="tcsamount>0"><span>TCS (+)</span><span> Rs. {{tcsamount}}</span></p>
                                                                  <p><span>Delivery Charge</span><span> Rs. {{delivery_charge}}</span></p>
                                                                  <p><span>Bill Amount</span><span> Rs. {{fulltotaldel}}</span></p>

<p><span>Packed</span><span> Rs. {{unbilledloadamount}}</span></p>

                                                                   <p ng-if="deliveredamount>0"><span>Delivered</span><span> Rs. {{deliveredamount}}</span></p>
                                                                  
                                                                  <p ><span>Balance </span><span> Rs. {{finalbalnce}}</span></p>
                                                               
                                                               </div>
                                                               
                                                                
                                                               
                                                               <div class="accordion accordion-flush" id="accordionFlushExample">
                                                                    
                                                                    <div class="accordion-item">
                                                                        
                                                                       <p style="float:right;">
                                                                             <label for="checkall">
                                                                             <input type="checkbox" id="checkall" <?php echo $disabled; ?> ng-click="loadProductAll()"> Pack ALL
                                                                             </label>
                                                                </p> 
                                                                         
                                                                         <h2 class="accordion-header">
                                                                             Product List
                                                                            
                                                                         </h2>
                                                                               
                                                                        <div id="flush-collapseOne" >
                                                                            <div class="accordion-body p-1 text-muted">
                                                                                
                                                                               
                                                                                <div class="talbe-productList"   ng-init="fetchDataCategorybase(1)">
                                                                                          
                                                                                          <div class="table-responsive_1"  ng-init="fetchData('1')">
                                                                                          <div class="table-rep-plugin" ng-repeat="namecate in namesDatacate" >
                                  
                                
                                 <h5 class="customTableHeading" >  {{namecate.no}}. {{namecate.categories_name}}</h5>
                                 
                                  <div class="customTableDesign mb-0" data-pattern="priority-columns" >
                                    <table id="datatable_{{namecate.categories_id}}" class="table table-bordered dt-responsive  nowrap w-100 salestable" >
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                       <thead class="bg-gray text-red" ng-if="namecate.categories_id==1">
                                         
                                         
                                        
                                          <tr>
                                              <th class="table-width-3" rowspan="2">S.No</th>
                                             <th class="table-width-18" rowspan="2" data-priority="1" ng-click='sortColumn("product_name_tab")' ng-class='sortClass("product_name_tab")'>Products </th>
                                            
                                             <!--  <th class="table-width-8" data-priority="3">Default_UOM</th> -->
                                             <th class="table-width-8" data-priority="3">UOM</th>
                                             
                                             
                                             <th class="table-width-8" ng-if="namecate.labletype==2 || namecate.labletype==1"  style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("profile_tab")' ng-class='sortClass("profile_tab")'>{{namecate.lable}} </th>
                                             <th class="table-width-8" ng-if="namecate.labletype==2" data-priority="1" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>Length </th>
                                             
                                             
                                             
                                             <th class="table-width-6"  data-priority="3" ng-if="namecate.labletype!=9" rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>Billing {{namecate.lablenos}}</th>
                                            
                                            
                                 <th class="table-width-6" ng-if="namecate.labletype!=9" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>   Pending {{namecate.lablenos}} </th>


                                               <th class="table-width-6"  data-priority="3" ng-if="namecate.labletype!=9" rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'> Packing {{namecate.lablenos}}</th>




                                              <th class="table-width-10" ng-if="namecate.labletype!=9" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>Load Nos</th>
                                             
                                             
                                             
                                            
                                             <!--<th class="table-width-6" data-priority="3">Unit</th>-->
                                             <!--<th class="table-width-8" data-priority="6"  ng-click='sortColumn("Meter_to_Sqr_feet")' ng-class='sortClass("Meter_to_Sqr_feet")'>Sqft </th>-->
                                             <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("rate_tab")' ng-class='sortClass("rate_tab")'>Rate </th>
                                             
                                             
                                                <th class="table-width-6"  data-priority="3" ng-if="namecate.labletype==9 || namecate.labletype==19" rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'> Pending QTY</th>


                                               <th class="table-width-6"  data-priority="3" ng-if="namecate.labletype==9 || namecate.labletype==19" rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'> Packing QTY</th>

                                                <th class="table-width-6"  data-priority="3" ng-if="namecate.labletype==9 || namecate.labletype==19" rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'> Load QTY</th>


                                                 <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'>Billed_QTY </th>
                                             
                                              <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'> QTY </th>
                                             
                                             <th class="table-width-10 comdisplay" rowspan="2" ng-if="commission_check==1" data-priority="6" ng-click='sortColumn("commission_tab")' ng-class='sortClass("commission_tab")'> Commission </th>
                                              <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("amount_tab")' ng-class='sortClass("amount_tab")'>Billed_Amount </th>
                                             <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("amount_tab")' ng-class='sortClass("amount_tab")'> Amount </th>
                                             
                                               <th class="table-width-10" data-priority="6" rowspan="2" ></th>
                                             
                                             
                                          </tr>
                                          
                                          
                                          
                                       </thead>
                                       
                                       
                                       
                                        <thead class="bg-gray text-red" ng-if="namecate.categories_id!=1">
                                         
                                       
                                         
                                          <tr>
                                              <th class="table-width-3" rowspan="2">S.No</th>
                                             <th class="table-width-18" rowspan="2" data-priority="1" ng-click='sortColumn("product_name_tab")' ng-class='sortClass("product_name_tab")'>Products </th>
                                            
                                             <th class="table-width-18" ng-if="namecate.labletype==4" rowspan="2" data-priority="1" ng-click='sortColumn("product_name_tab")' ng-class='sortClass("product_name_tab")'>Tile Material </th>
                                            
                                            
                                            
                                            <th class="table-width-18" ng-if="namecate.labletype==16 || namecate.labletype==19" rowspan="2" data-priority="1">Material Specfication
 </th>
 
 
 
 <th class="table-width-15" ng-if="namecate.labletype==19" rowspan="2" data-priority="1" >Remarks
 </th>
 
 
  <th class="table-width-15" ng-if="namecate.labletype==19" rowspan="2" data-priority="1" >Coil_no 
 </th>
 
 
 
 
 
  <th class="table-width-18" ng-if="namecate.categories_id==592" rowspan="2" data-priority="1" >Description
 </th>
                                            
                                            
                                            
                                              <!-- <th class="table-width-8" data-priority="3" ng-if="namecate.labletype!=9">Default_UOM</th> -->
                                              <th class="table-width-8" data-priority="3" ng-if="namecate.labletype!=9">UOM</th>
                                              
                                              
                                                <th class="table-width-15" ng-if="namecate.labletype==19" rowspan="2" data-priority="1" ng-click='sortColumn("product_name_tab")' ng-class='sortClass("product_name_tab")'>Coil_Status 
 </th>
                                              
                                              <th class="table-width-8" ng-if="namecate.labletype==5 || namecate.labletype==6" >Billing Option</th>
                                             
                                              <th class="table-width-8" ng-if="namecate.labletype==11 || namecate.labletype==12" >Dim 1</th>
                                              <th class="table-width-8" ng-if="namecate.labletype==11 || namecate.labletype==12" >Dim 2</th>
                                              <th class="table-width-8" ng-if="namecate.labletype==12" >Dim 3</th>
                                             
                                             
                                              <th class="table-width-8"   data-priority="3" ng-if="namecate.labletype==8 || namecate.labletype==1 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==4 || namecate.labletype==15" style="padding-bottom:0px" ng-click='sortColumn("profile_tab")' ng-class='sortClass("profile_tab")'>{{namecate.lable}} </th>
                                              
                                              
                                              <th class="table-width-10" ng-if="namecate.labletype==8" data-priority="3" style="padding-bottom:0px" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>Extra {{namecate.lable}} </th>
                                              <th class="table-width-8" ng-if="namecate.labletype==8" style="display:none;" data-priority="3" style="padding-bottom:0px" ng-click='sortColumn("back_crimp_tab")' ng-class='sortClass("back_crimp_tab")'>Back {{namecate.lable}} </th>
                                            
                                              <th class="table-width-8" ng-if="namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==1 || namecate.labletype==6 || namecate.labletype==15" data-priority="1" style="padding-bottom:0px" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>{{namecate.lable2}} </th>
                                             
                                            
                                              <th class="table-width-6"  data-priority="3" ng-if="namecate.labletype!=9" rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>Billing {{namecate.lablenos}}</th>
                                            
                                              <th class="table-width-6" ng-if="namecate.labletype!=9" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>   Pending {{namecate.lablenos}} </th>


                                               <th class="table-width-6"  data-priority="3" ng-if="namecate.labletype!=9" rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'> Packing {{namecate.lablenos}}</th>


                                                <th class="table-width-10" ng-if="namecate.labletype!=9" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'> Load Nos</th>
                                            
                                             <!--<th class="table-width-6" data-priority="3">Unit</th>-->
                                            
                                            
                                            
                                             <!--<th class="table-width-8" data-priority="6"  ng-click='sortColumn("Meter_to_Sqr_feet")' ng-class='sortClass("Meter_to_Sqr_feet")'>Sqft </th>-->
                                             <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("rate_tab")' ng-class='sortClass("rate_tab")'>Rate </th>
                                             <th class="table-width-10 comdisplay"        rowspan="2" ng-if="commission_check==1" data-priority="6" ng-click='sortColumn("commission_tab")' ng-class='sortClass("commission_tab")'> Commission </th>
                                            
                                          
                                           <th class="table-width-6"  data-priority="3" ng-if="namecate.labletype==9 || namecate.labletype==19" rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'> Pending QTY</th>

                                           <th class="table-width-6"  data-priority="3" ng-if="namecate.labletype==9 || namecate.labletype==19" rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'> Packing QTY</th>

                                            <th class="table-width-6"  data-priority="3" ng-if="namecate.labletype==9 || namecate.labletype==19" rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'> Load QTY</th>


                                              <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'>Billed_QTY </th>

                                              <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'> QTY </th>
                                            
                                              <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("amount_tab")' ng-class='sortClass("amount_tab")'>Billed_Amount </th>
                                             
                                              <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("amount_tab")' ng-class='sortClass("amount_tab")'> Amount </th>
                                             
                                         
                                               
                                               <th class="table-width-10" data-priority="6" rowspan="2" ></th>
                                             
                                          
                                             
                                          </tr>
                                          
                                          
                                          
                          
                                          
                                          
                                       </thead>
                                       
                                       
                                       
                                       
                                       
                                       
                                       <tbody   ng-repeat="name in namesData|orderBy:column:reverse"  ng-if="namecate.categories_id==1">
                                           
                                           
                                           

                                          <tr  class="{{name.picked_status == 1 ? 'disabled-div' : ''}} view " ng-style="name.rate_edit == 1 && {'color':'red'}" ng-if="namecate.categories_id==name.categories_id_get && namecate.type==name.type">
                                           
                                           
                                             <td data-label="S No">{{name.no}}</span> 
                                             
                                             
                                             
                                             
                                               <i class="mdi mdi-check  font-size-16"  ng-if="name.purchase_request==1" ng-click="getPurchaserequest(name.purchase_id,name.product_name_tab)" title="Purchase requested" style="cursor: pointer;"></i>
                                             
                                             
                                             
                                             
                                             </td>
                                           
                                           
                                           
                                            <input type="hidden"  value="{{namecate.categories_id}}"  id="cateid_{{name.id}}">
                                            <input type="hidden"  value="{{namecate.type}}"  id="cateidtype_{{name.id}}">
                                            <input type="hidden"  value="{{name.product_id}}"  id="ppid_{{name.id}}">
                                          
                                            
                                                 <td title="{{name.categories}}"  data-label="Products">
                                                {{name.product_name_tab}}
                                                       
                                                 </td>
                                             
                                              <!-- <td  data-priority="3" ng-if="namecate.labletype!=9" data-label="UOM">FEET</td> -->
                                              <td  data-priority="3" ng-if="namecate.labletype!=9" data-label="UOM" >
                                                
                                                  <select class="selectbox" disabled  id="uom_{{name.id}}"  ng-model="calulation"><option value="3" ng-selected="{{name.uom == 3}}">FEET</option><option value="4" ng-selected="{{name.uom == 4}}">MM</option><option value="5" ng-selected="{{name.uom == 5}}">MTR</option><option value="6" ng-selected="{{name.uom == 6}}">INCH</option></select>
                                                   
                                                  
                                                
                                                   
                                                   
                                                   
                                            </td>
                                            
                                           
                                             
                                             <td data-label="{{namecate.lable}}"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}"  value="{{name.profile_tab}}"></td>
                                            
                                            
                                             <td ng-if="namecate.labletype==2" data-label="Crimp"><input type="text" <?php echo $read; ?> ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)" id="crimp_{{name.id}}" value="{{name.crimp_tab}}"></td>
                                             
                                             
                                             <td data-label="Nos">
                                                 
                                                {{name.bill_nos}}
                                                
                                                
                                                 
                                                 </td>
                                                 
                                                 
                                         

                                                 


                                                

                                             <td ng-if="namecate.labletype!=9">


                                                  <span  ng-if='name.empty_loadnos>0' class="loadamountred">
                                                  {{name.bill_nos-name.empty_loadnos}} 
                                                  </span>

                                                  <span  ng-if='name.empty_loadnos==0' >

                                                    <span ng-if="name.dis_nos>0" class="loadamountred">{{name.bill_nos-name.dis_nos}}</span>
                                                    <span ng-if="name.dis_nos==0" class="loadamountred">{{name.empty_loadnos}}</span>
                                                 
                                                  </span>


                                                 </td>


 
                                                      


                                                

                                                    <td ng-if="namecate.labletype!=9">



                                                  

                                                 <?php
                                                 if($readdriver=='')
                                                 {
                                                     ?>


                                               <span  ng-if='name.empty_loadnos_input>0 && name.picked_status==0 && name.loadstatus==0' class="loadamount">

                                               <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.empty_loadnos_input}}">

                                                 </span>


                                                   <span  ng-if='name.empty_loadnos_input>0 && name.picked_status==1 && name.loadstatus==0' class="loadamount">

                                               <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.empty_loadnos_input}}">

                                                 </span>


  
                                                <span  ng-if='name.empty_loadnos_input>0 && name.loadstatus==1' class="loadamount">

                                               <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_nos-name.dis_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.empty_loadnos_input}}">

                                                </span>




                                                  <span  ng-if='name.empty_loadnos==0 && name.picked_status==0' class="loadamount">


 <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.bill_nos}}">

                                                 </span>

  





                                                    
                                                     <span  ng-if="name.bill_nos==0">0</span>
                                                     <?php
                                                 }
                                                 
                                                 ?>

                                             </td> 

                                          <td data-label="Nos" ng-if="namecate.labletype!=9">


                                            
                                            <span ng-if='name.dis_nos>0'>{{name.dis_nos}}</span>


                                         </td>
                                                
                                                 
                                                 
                                                 

                                            
                                             <!--<td><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'unit',namecate.categories_id)"  id="unit_{{name.id}}" value="{{name.unit_tab}}"></td>-->
                                            <td style="display:none;"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'fact',namecate.categories_id,namecate.type)" id="fact_{{name.id}}" value="{{name.fact_tab}}"></td>
                                            
                                            
                                            <!--<td><input type="text"  ng-keyup="inputsave_1(name.id,'Meter_to_Sqr_feet',namecate.categories_id)" id="Meter_to_Sqr_feet_{{name.id}}" value="{{name.Meter_to_Sqr_feet}}"></td>-->
                                             <td data-label="Rate"><input type="text" <?php echo $read; ?>  ng-keyup="inputsaverate_1(name.id,'rate',namecate.categories_id,namecate.type)"  id="rate_{{name.id}}" value="{{name.rate_tab}}">
                                            
                                             <span class="td-info-icons td-competitor-price" >
                                                 
                                                 
                                                 <button class="btn dropdown-toggle p-0 font-size-12" type="button" ng-click="pricelist(name.product_id,name.product_name_tab)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSpec-pricelist" aria-controls="offcanvasSpec-pricelist">
                                                    <i class="fas fa-rupee-sign"></i>
                                                </button>
                                                
                                                
                                                
                                             </span>
                                             </td>
                                           
                                             <td ng-if="commission_check==1" data-label="Commission" class="comdisplay"><input type="text"  ng-keyup="inputsave_1(name.id,'commission',namecate.categories_id,namecate.type)"  id="commission_{{name.id}}" value="{{name.commission_tab}}"></td>
                                             
                                            
                                             <td ng-if="namecate.labletype==9 || namecate.labletype==19">


                                                  <span  ng-if='name.empty_loadqty>0' class="loadamountred">
                                                  {{name.bill_qty-name.empty_loadqty}} 
                                                  </span>

                                                  <span  ng-if='name.empty_loadqty==0' >

                                                    <span ng-if="name.dispatch_qty>0" class="loadamountred">{{name.bill_qty-name.dispatch_qty}}</span>
                                                    <span ng-if="name.dispatch_qty==0" class="loadamountred">{{name.empty_loadqty}}</span>
                                                 
                                                  </span>


                                                 </td>

                                        


                                                                                               <td   ng-if="namecate.labletype==9 || namecate.labletype==19" > 
                                            
                                            
                                              <span  ng-if='name.empty_loadqty_input>0 && name.picked_status==0 && name.loadstatus==0' class="loadamount">

                                               <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'qty',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_qty}}" class="nos_{{namecate.categories_id}}" id="qty_{{name.id}}" value="{{name.empty_loadqty_input}}">

                                                 </span>


                                                   <span  ng-if='name.empty_loadqty_input>0 && name.picked_status==1 && name.loadstatus==0' class="loadamount">

                                               <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'qty',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_qty}}" class="nos_{{namecate.categories_id}}" id="qty_{{name.id}}" value="{{name.empty_loadqty_input}}">

                                                 </span>


  
                                                <span  ng-if='name.empty_loadqty_input>0 && name.loadstatus==1' class="loadamount">

                                               <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'qty',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_qty-name.dis_nos}}" class="nos_{{namecate.categories_id}}" id="qty_{{name.id}}" value="{{name.empty_loadqty_input}}">

                                                </span>




                                                  <span  ng-if='name.empty_loadqty==0 && name.picked_status==0' class="loadamount">


 <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'qty',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_qty}}" class="nos_{{namecate.categories_id}}" id="qty_{{name.id}}" value="{{name.bill_qty}}">

                                                 </span>

                                                    
                                                     <span  ng-if="name.bill_qty==0">0</span>
                                           
                                            
                                         
                                            
                                              </td>

                                              
                                              <td      ng-if="namecate.labletype==9 || namecate.labletype==19"> 
                                            
                                            
                                                <span ng-if='name.dispatch_qty>0'>{{name.dispatch_qty}}</span>
                                           
                                            
                                         
                                            
                                              </td>



                                              <td  data-label="Qty"    > 
                                            
                                            
                                              <span >{{name.qty_tab}}</span>
                                           
                                            
                                         
                                            
                                              </td>

                                             
                                             <td><span ng-if='name.loadqty!=0' class="loadamount" id="qty_{{name.id}}">{{name.loadqty}}</span></td>
                                             
                                             
                                             <td  data-label="Amount" class="amounttot_{{namecate.categories_id}}">
                                                 
                                                 <span >{{name.amount_tab}}</span>
                                             
                                                 
                                             
                                             </td>
                                              <td>
                                                 
                                                 
                                             
                                                 <span class="loadamount"  id="amount_{{name.id}}">{{name.loadamount}}</span>
                                             
                                             </td>
                                         
                                             <td data-label="Action" class="last-colorchange">
                                                                                                         
                                                                                                         
                                                                                                        
                                                                                                          <span ng-if="name.picked_status==0">
                                                                                                            
                                                                                                           

                                                                                                            <label for="set_id{{name.id}}" ng-if="name.bill_nos!=name.dis_nos">
                                                                                                                <input type="checkbox" value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" <?php echo $disabled; ?> class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Pack</span>
                                                                                                            </label>


                                                                                                          <label for="set_id{{name.id}}" ng-if="name.bill_nos==name.dis_nos">
                                                                                                                <input type="checkbox" checked value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" disabled class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Deliverd</span>
                                                                                                            </label>
                                                                                                         
                                                                                                        </span>
                                                                                                        
                                                                                                         <span ng-if="name.picked_status==1">
                                                                                                             
                                                                                                             
                                                                                                            
                                                                                                           <label for="set_id{{name.id}}" title="Delivered" ng-if="name.delivery_status==1"><input type="checkbox" disabled checked value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" class="loaditems"  name="loaditems"> <span id="textchange_{{name.id}}">Deliverd</span></label>

                                                                                                            <label for="set_id{{name.id}}"  ng-if="name.dispatch_status==0">

                                                                                                                
                                                                                                                <input type="checkbox"  checked value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" class="loaditems" <?php echo $disabled; ?> name="loaditems">

                                                                                                                 <span id="textchange_{{name.id}}">Packed</span>

                                                                                                            </label>


                                                                                                            <label for="set_id{{name.id}}"  ng-if="name.dispatch_status==1 && name.delivery_status==0">

                                                                                                                
                                                                                                                <input type="checkbox"  checked value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" disabled class="loaditems" name="loaditems">

                                                                                                                 <span id="textchange_{{name.id}}">Trip Moved  </span>

                                                                                                            </label>


                                                                                                         
                                                                                                         </span>
                                                                                                        
                                                                                                        
                                             </td>
                                             
                                          
                                             
                                             
                                             
                                             
                                          </tr>
                                        
                                       

                                          
                                          
                                       </tbody>
                                            
                                     
                                       
                                       <tbody  ng-repeat="name in namesData|orderBy:column:reverse" ng-if="namecate.categories_id!=1">
                                           
                                           
                                           
                                          
                                          <tr class="{{name.picked_status == 1 ? 'disabled-div' : ''}} view"  ng-style="name.rate_edit == 1 && {'color':'red'}"   ng-if="namecate.categories_id==name.categories_id_get">
                                             
                                             
                                            <td data-label="S No">{{name.no}}</span> 
                                             
                                          
                                             <td title="{{name.categories}}" data-label="Products">
                                                 {{name.product_name_tab}}
                                                   <input type="hidden"  value="{{namecate.categories_id}}"  id="cateid_{{name.id}}">
                                            <input type="hidden"  value="{{namecate.type}}"  id="cateidtype_{{name.id}}">
                                            <input type="hidden"  value="{{name.product_id}}"  id="ppid_{{name.id}}">
                                                 </td>
                                                 
                                                 
                                                 
                                                 
                                             <td  ng-if="namecate.labletype==4" data-label="Sub Products" ><input type="text" <?php echo $read; ?> placeholder="Search Product" ng-keyup="completeProductSUb(name.id)"  ng-keyup="inputsave_1(name.id,'tile_material_name',namecate.categories_id,namecate.type)"   id="tile_material_name_{{name.id}}" value="{{name.tile_material_name}}"></td>
                                        
                                        
                                        
                                         <td  ng-if="namecate.labletype==16" data-label="Sub Products" ><input type="text" <?php echo $read; ?> placeholder="Search Product" ng-keyup="completeProductSUb(name.id)"  ng-keyup="inputsave_1(name.id,'tile_material_name',namecate.categories_id,namecate.type)"   id="tile_material_name_{{name.id}}" value="{{name.tile_material_name}}"></td>
                                        
                                        
                                         <td  ng-if="namecate.labletype==19" data-label="Sub Products" ><input type="text" <?php echo $read; ?> placeholder="Search Product" ng-keyup="completeProductSUb3(name.id)"  ng-keyup="inputsave_1(name.id,'tile_material_name',namecate.categories_id,namecate.type)"   id="tile_material_name_{{name.id}}" value="{{name.tile_material_name}}"></td>
                                        
                                         
                                        
                                        
                                             <td  ng-if="namecate.categories_id==592" data-label="Sub Products" ><input type="text" <?php echo $read; ?>    ng-keyup="inputsave_1(name.id,'tile_material_name',namecate.categories_id,namecate.type)"   id="tile_material_name_{{name.id}}" value="{{name.tile_material_name}}"></td>
                                      
                                          <td  ng-if="namecate.labletype==19" data-label="Remarks" ><input type="text" <?php echo $read; ?>   ng-keyup="inputsave_1(name.id,'dim_one',namecate.categories_id,namecate.type)"   id="dim_one_{{name.id}}" value="{{name.dim_one}}"></td>
                                          <td  ng-if="namecate.labletype==19" data-label="Coil No" ><input type="text" <?php echo $read; ?>   ng-keyup="inputsave_1(name.id,'dim_two',namecate.categories_id,namecate.type)"   id="dim_two_{{name.id}}" value="{{name.dim_two}}"></td>
                                      
                                       <!--  <td  data-priority="3" ng-if="namecate.labletype!=9" data-label="UOM">FEET</td> -->
                                            <td  data-priority="3" ng-if="namecate.labletype!=9" data-label="UOM">
                                                  
                                                  
                                                    <span ng-if="namecate.labletype!=14">
                                                  <select class="selectbox" disabled id="uom_{{name.id}}"  ng-model="calulation">
                                                      <option value="3" ng-selected="{{name.uom == 3}}" ng-style="namecate.categories_id == 13 && {'display':'none'}">FEET</option>
                                                      <option value="4" ng-selected="{{name.uom == 4}}" ng-style="namecate.categories_id == 13 && {'display':'none'}">MM</option>
                                                      <option value="2" ng-selected="{{name.uom == 2}}" ng-style="namecate.categories_id != 13 && {'display':'none'}" >SQMTR</option>
                                                      <option value="5" ng-selected="{{name.uom == 5}}">MTR</option>
                                                      <option value="6" ng-selected="{{name.uom == 6}}" ng-style="namecate.categories_id == 13 && {'display':'none'}">INCH</option>
                                                      </select>
                                                 
                                                    </span>
                                                   
                                                   <span ng-if="namecate.labletype==14">
                                                         NOS
                                                    
                                                    </span>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                   
                                            </td>
                                            
                                            
                                            
                                            
                                            <td  ng-if="namecate.labletype==19" data-label="Coil No" >
                                                
                                                
                                                
                                                
                                                <select  disabled ng-change="inputsave_1(name.id,'dim_three',namecate.categories_id,namecate.type)"  ng-model="dim_three" style="padding: 0px 0px;border: none;"  id="dim_three_{{name.id}}">
                                                     
                                                      <option  value="OPEN COIL"     ng-selected="{{name.dim_three == 'OPEN COIL'}}" >OPEN COIL</option>
                                                      <option  value="CLOSED COIL"  ng-selected="{{name.dim_three == 'CLOSED COIL'}}" >CLOSED COIL</option>
                                                       
                                                   </select>
                                                
                                                </td>
                                      
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                             <td ng-if="namecate.labletype==11 || namecate.labletype==12" data-label="Dim 1"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'dim_one',namecate.categories_id,namecate.type)"  id="dim_one_{{name.id}}" data-title="{{name.cul}}" value="{{name.dim_one}}"></td>
                                             <td ng-if="namecate.labletype==11 || namecate.labletype==12" data-label="Dim 2"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'dim_two',namecate.categories_id,namecate.type)"  id="dim_two_{{name.id}}" data-title="{{name.cul}}" value="{{name.dim_two}}"></td>
                                             <td ng-if="namecate.labletype==12" data-label="Dim 3"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'dim_three',namecate.categories_id,namecate.type)"  id="dim_three_{{name.id}}" data-title="{{name.cul}}" value="{{name.dim_three}}"></td>
                                            
                                        
                                             <td  ng-if="namecate.labletype==5 || namecate.labletype==6" data-label="Billing Options">
                                                 
                                                 
                                                 
                                                  <select disabled class="selectbox" ng-if="namecate.labletype==5"  ng-change="inputsave_1(name.id,'billing_options',namecate.categories_id,namecate.type)" id="billing_options_{{name.id}}"  ng-model="billing_options"><option value="1" ng-selected="{{name.billing_options == 1}}">Running  MTR</option><option value="2" ng-selected="{{name.billing_options == 2}}">KG</option></select>
                                                  <select disabled class="selectbox" ng-if="namecate.labletype==6"  ng-change="inputsave_1(name.id,'billing_options',namecate.categories_id,namecate.type)" id="billing_options_{{name.id}}"  ng-model="billing_options"><option value="1" ng-selected="{{name.billing_options == 1}}">SQM  MTR</option><option value="2" ng-selected="{{name.billing_options == 2}}">KG</option></select>
                                                  
                                                  <input type="hidden"  value="{{name.kg_price}}"  id="kg_price_{{name.id}}">
                                                  <input type="hidden"  value="{{name.og_price}}"  id="rate_tab_get_{{name.id}}">
                                                  
                                                  
                                                   <input type="hidden"  value="{{name.kg_formula2}}"  id="kg_formula_{{name.id}}">
                                                   <input type="hidden"  value="{{name.og_formula}}"  id="og_formula_get_{{name.id}}">
                                                   
                                                   
                                                   
                                             </td>
                                             
                                        
                                             <td ng-if="namecate.labletype==4" ng-init="productMM(name.product_id,name.uom)" data-label="{{namecate.lable}}">
                                                 
                                                  
                                                      
                                                     
                                                 <input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}"  value="{{name.profile_tab}}">
                                                   
                                               
                                                   
                                                   
                                                   
                                                   <!--<input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}"  value="{{name.profile_tab}}">-->
                                               
                                                   
                                                
                                                 
                                            </td>
                                            
                                            
                                            
                                            
                                             <td ng-if="namecate.labletype==8 || namecate.labletype==1 ||  namecate.labletype==5 || namecate.labletype==6  || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12" data-label="{{namecate.lable}}"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}" value="{{name.profile_tab}}"></td>
                                            
                                             <td ng-if="namecate.labletype==8" data-label="{{namecate.lable2}}"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"  id="crimp_{{name.id}}"  value="{{name.crimp_tab}}"></td>
                                             
                                             
                                               <td ng-if="namecate.labletype==15">
                                                 
                                                  
                                                  
                                                  
                                                  
                                                 <input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}" value="{{name.profile_tab}}">
                                                   
                                                   
                                                 
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   
                                                
                                                </td>
                                             
                                             
                                             <td ng-if="namecate.labletype==8" style="display:none;" data-label="Back {{namecate.lable2}}">
                                                 
                                                  <select disabled ng-change="inputsave_1(name.id,'back_crimp',namecate.categories_id,namecate.type)"  ng-model="backcripm" style="padding: 0px 0px;border: none;"  id="back_crimp_{{name.id}}">
                                                     <option  value="Yes" ng-selected="{{name.back_crimp == 'Yes'}}" > Yes </option>
                                                     <option  value="No"  ng-selected="{{name.back_crimp == 'No'}}" > No </option>
                                                   </select>
                                                
                                                 </td>
                                                 
                                                 
                                                  <td ng-if="namecate.labletype==15">
                                                 
                                                  <select disabled ng-if="name.uom==4 || name.uom==5"  ng-change="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"  ng-model="crimpwall" style="padding: 0px 0px;border: none;"  id="crimp_{{name.id}}">
                                                     
                                                      <option  value="1220"   ng-selected="{{name.crimp_tab == '1220'}}" >1220</option>
                                                      <option  value="2100"   ng-selected="{{name.crimp_tab == '2100'}}" >2100</option>
                                                     
                                                      <option  value="1200"   ng-selected="{{name.crimp_tab == '1200'}}" >1200</option>
                                                      
                                                       
                                                   </select>
                                                   
                                                   
                                                    <select disabled ng-if="name.uom==3"  ng-change="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"  ng-model="crimpwall" style="padding: 0px 0px;border: none;"  id="crimp_{{name.id}}">
                                                     
                                                     
                                                      <option  value="7"   ng-selected="{{name.crimp_tab == '7'}}" >7</option>
                                                      <option  value="6.90"   ng-selected="{{name.crimp_tab == '6.90'}}" >6.90</option>
                                                      <option  value="4"      ng-selected="{{name.crimp_tab == '4'}}" >4</option>
                                                     
                                                     
                                                       
                                                   </select>
                                                   
                                                   
                                                    <select disabled ng-if="name.uom==6"  ng-change="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"  ng-model="crimpwall" style="padding: 0px 0px;border: none;"  id="crimp_{{name.id}}">
                                                     
                                                      <option  value="48"     ng-selected="{{name.crimp_tab == '48'}}" >48</option>
                                                      <option  value="82.80"  ng-selected="{{name.crimp_tab == '82.80'}}" >82.80</option>
                                                       
                                                   </select>
                                                
                                                </td>
                                                 
                                            
                                            
                                             <td ng-if="namecate.labletype==1 || namecate.labletype==6 || namecate.labletype==11 || namecate.labletype==12" data-label="{{namecate.lable2}}"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)" id="crimp_{{name.id}}" value="{{name.crimp_tab}}"></td>
                                            
                                             <td data-label="Nos" ng-if="namecate.labletype!=9"> 

                                                {{name.bill_nos}}
                                           
                                              
                                             </td>
                                             

                                          
                                        



                                                  <td ng-if="namecate.labletype!=9">


                                                  <span  ng-if='name.empty_loadnos>0' class="loadamountred">
                                                  {{name.bill_nos-name.empty_loadnos}} 
                                                  </span>

                                                  <span  ng-if='name.empty_loadnos==0' >

                                                    <span ng-if="name.dis_nos>0" class="loadamountred">{{name.bill_nos-name.dis_nos}}</span>
                                                    <span ng-if="name.dis_nos==0" class="loadamountred">{{name.empty_loadnos}}</span>
                                                 
                                                  </span>


                                                 </td>


 
                                                      


                                                

                                                    <td ng-if="namecate.labletype!=9">



                                                  

                                                 <?php
                                                 if($readdriver=='')
                                                 {
                                                     ?>


                                                  <span  ng-if='name.empty_loadnos_input>0 && name.picked_status==0 && name.loadstatus==0' class="loadamount">

                                               <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.empty_loadnos_input}}">

                                                 </span>


                                                   <span  ng-if='name.empty_loadnos_input>0 && name.picked_status==1 && name.loadstatus==0' class="loadamount">

                                               <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.empty_loadnos_input}}">

                                                 </span>


  
                                                <span  ng-if='name.empty_loadnos_input>0 && name.loadstatus==1' class="loadamount">

                                               <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_nos-name.dis_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.empty_loadnos_input}}">

                                                </span>



                                                <!-- <span  ng-if='name.loadstatus==1' class="loadamount">

                                               <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_nos-name.dis_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.bill_nos-name.dis_nos}}">

                                                </span>-->




                                                  <span  ng-if='name.empty_loadnos==0 && name.picked_status==0' class="loadamount">


 <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.bill_nos}}">

                                                 </span>

                                                    
                                                     <span  ng-if="name.bill_nos==0">0</span>
                                                     <?php
                                                 }
                                                 
                                                 ?>

                                             </td> 

                                          <td data-label="Nos" ng-if="namecate.labletype!=9">


                                            
                                            <span ng-if='name.dis_nos>0'>{{name.dis_nos}}</span>


                                         </td>


                                             <!--<td><input type="text"  ng-keyup="inputsave_1(name.id,'unit',namecate.categories_id)"  id="unit_{{name.id}}" value="{{name.unit_tab}}"></td>-->
                                            <td   style="display:none;" data-label="Fact"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'fact',namecate.categories_id,namecate.type)" id="fact_{{name.id}}" value="{{name.fact_tab}}"></td>
                                             
                                             <!--<td><input type="text"  ng-keyup="inputsave_1(name.id,'Meter_to_Sqr_feet'),namecate.categories_id" id="Meter_to_Sqr_feet_{{name.id}}" value="{{name.Meter_to_Sqr_feet}}"></td>-->
                                             <td data-label="Rate"><input type="text"   <?php echo $read; ?> ng-keyup="inputsaverate_1(name.id,'rate',namecate.categories_id,namecate.type)"  id="rate_{{name.id}}" value="{{name.rate_tab}}">
                                            
                                             <span class="td-info-icons td-competitor-price">
                                                 <button class="btn dropdown-toggle p-0 font-size-12" type="button" ng-click="pricelist(name.product_id,name.product_name_tab)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSpec-pricelist" aria-controls="offcanvasSpec-pricelist">
                                                    <i class="fas fa-rupee-sign"></i>
                                                </button>
                                                
                                             </span>
                                             </td>
                                           
                                             <td ng-if="commission_check==1" data-label="Commission" class="comdisplay"><input type="text"  ng-keyup="inputsave_1(name.id,'commission',namecate.categories_id,namecate.type)"  id="commission_{{name.id}}" value="{{name.commission_tab}}"></td>
                                             
                                            
                                            
                                             
                                             <td ng-if="namecate.labletype==9 || namecate.labletype==19">


                                                  <span  ng-if='name.empty_loadqty>0' class="loadamountred">
                                                  {{name.bill_qty-name.empty_loadqty}} 
                                                  </span>

                                                  <span  ng-if='name.empty_loadqty==0' >

                                                    <span ng-if="name.dispatch_qty>0" class="loadamountred">{{name.bill_qty-name.dispatch_qty}}</span>
                                                    <span ng-if="name.dispatch_qty==0" class="loadamountred">{{name.empty_loadqty}}</span>
                                                 
                                                  </span>


                                                 </td>
                                              


                                                <td   ng-if="namecate.labletype==9 || namecate.labletype==19" > 
                                            
                                            
                                              <span  ng-if='name.empty_loadqty_input>0 && name.picked_status==0 && name.loadstatus==0' class="loadamount">

                                               <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'qty',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_qty}}" class="nos_{{namecate.categories_id}}" id="qty_{{name.id}}" value="{{name.empty_loadqty_input}}">

                                                 </span>


                                                   <span  ng-if='name.empty_loadqty_input>0 && name.picked_status==1 && name.loadstatus==0' class="loadamount">

                                               <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'qty',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_qty}}" class="nos_{{namecate.categories_id}}" id="qty_{{name.id}}" value="{{name.empty_loadqty_input}}">

                                                 </span>


  
                                                <span  ng-if='name.empty_loadqty_input>0 && name.loadstatus==1' class="loadamount">

                                               <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'qty',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_qty-name.dis_nos}}" class="qty_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.empty_loadqty_input}}">

                                                </span>




                                                  <span  ng-if='name.empty_loadqty==0 && name.picked_status==0' class="loadamount">


 <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'qty',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_qty}}" class="nos_{{namecate.categories_id}}" id="qty_{{name.id}}" value="{{name.bill_qty}}">

                                                 </span>

                                                    
                                                     <span  ng-if="name.bill_qty==0">0</span>
                                           
                                            
                                         
                                            
                                              </td>

                                              
                                              <td      ng-if="namecate.labletype==9 || namecate.labletype==19"> 
                                            
                                            
                                                <span ng-if='name.dispatch_qty>0'>{{name.dispatch_qty}}</span>
                                           
                                            
                                         
                                            
                                              </td>


                                             <td  data-label="Qty"    > 
                                            
                                            
                                              <span >{{name.qty_tab}}</span>
                                           
                                            
                                            
                                            
                                              </td>  

                                             
                                             <td><span class="loadamount"  id="qty_{{name.id}}">



                                             {{name.loadqty}}


                                            </span></td>
                                             
                                             
                                             <td  data-label="Amount" class="amounttot_{{namecate.categories_id}}">
                                                 
                                                 <span >{{name.amount_tab}}</span>
                                             
                                                
                                             
                                             
                                             </td>
                                             
                                              <td  >
                                                 
                                                 
                                             
                                                 <span class="loadamount"  id="amount_{{name.id}}">{{name.loadamount}}</span>
                                             
                                             </td>
                                            
                                          
                                             <td data-label="Action" class="last-colorchange">
                                                 
                                                 
                                                                                      
                                                
                                                                                                          <span ng-if="name.picked_status==0">
                                                                                                            
                                                                                                           

                                                                                                            <label for="set_id{{name.id}}" ng-if="name.bill_nos!=name.dis_nos">
                                                                                                                <input type="checkbox" value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" <?php echo $disabled; ?> class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Pack</span>
                                                                                                            </label>


                                                                                                         <label for="set_id{{name.id}}" ng-if="name.bill_nos==name.dis_nos">
                                                                                                                <input type="checkbox" checked value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" disabled class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Deliverd</span>
                                                                                                          </label>
                                                                                                         
                                                                                                        </span>
                                                                                                        
                                                                                                         <span ng-if="name.picked_status==1">
                                                                                                             
                                                                                                             
                                                                                                            
                                                                                                           <label for="set_id{{name.id}}" title="Delivered" ng-if="name.delivery_status==1"><input type="checkbox" disabled checked value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Deliverd</span></label>

                                                                                                            <label for="set_id{{name.id}}"  ng-if="name.dispatch_status==0">

                                                                                                                
                                                                                                                <input type="checkbox"  checked value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" class="loaditems" <?php echo $disabled; ?> name="loaditems">

                                                                                                                 <span id="textchange_{{name.id}}">Packed</span>

                                                                                                            </label>


                                                                                                            <label for="set_id{{name.id}}"  ng-if="name.dispatch_status==1 && name.delivery_status==0">

                                                                                                                
                                                                                                                <input type="checkbox"  checked value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" disabled class="loaditems" name="loaditems">

                                                                                                                 <span id="textchange_{{name.id}}">Trip Moved </span>

                                                                                                            </label>


                                                                                                         
                                                                                                         </span>
                                                                                                        
                                                                                                        
                                                                                                      
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
                                                        </div>
                                                       
                                                             <div class="row">

                                                        <div class="col-md-12">
                                                            <div class="col-md-2" style="float:left;">

                                                             
                                                                
                                                            </div>

                                                           

                                                             <div class="col-md-2" style="float:right;">

                                                              <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            
                                                            <?php
                                                             if($DC_id_data=='')
                                                             {

                                                                ?>

                                                            <li class="float-end">
                                                            <a href="javascript: void(0);" class="btn btn-primary"  ng-click="Proceedtocomplete()"   id="Proceedtocomplete" <?php echo $readdriver; ?> ><i class="mdi mdi-thumb-up pe-1"></i>Packed Complete  </a></li>
                                                                <?php
                        
                                                             }   
                                                            ?>

                                                          
                                                        </ul>
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
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  $scope.loadProductAll = function() {
      
      
       if($('#checkall').is(':checked'))
       {
      
         var status=1;
          $('.loaditems').each(function () 
          {

            
                   var id= $(this).val();
                   var categories_id=$('#cateid_'+id).val();
                   var type=$('#cateidtype_'+id).val();
                   $scope.inputsave_1(id,'nos',categories_id,type);
                 
      
      
         });
        
        
        
       }
       else
       {
            var status=0;
            
              $('.loaditems').each(function () {
            
                var id= $(this).val();
               
                $('.loaditems').prop('checked',false);
                $('#textchange_'+id).text('Pick');
           
             
           
                 $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                    data:{'id':id,'status':status, 'driver_pickip':'<?php echo $driver_pickip; ?>','action':'pickedstatus'}
                  }).success(function(data){
                   $scope.fetchSingleDatatotaldel();
                    $scope.fetchData();
                   
                  }); 
      
      
      
      
        });
        
        
           
       }
       
        
     
      
        
        
        
        
      
  };
 
 
 
 
 
  $scope.loadProduct = function(id) {
  
  
  
    var status=0;
    $('#textchange_'+id).text('Pick');
    if($('#set_id'+id).is(':checked')) {
        var status=1;
        $('#textchange_'+id).text('Picked');
    }
   
   var nos=$('#nos_'+id).val();
   var categories_id=$('#cateid_'+id).val();
   var type=$('#cateidtype_'+id).val();


   
     if(status==0)
     {

        $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id,'status':status,'nos':nos,'type':type, 'driver_pickip':'<?php echo $driver_pickip; ?>','action':'pickedstatus'}
          }).success(function(data){
            $scope.fetchSingleDatatotaldel();
            $scope.fetchData();
         }); 

     }
     else
     {
        

        if(type==9)
        {

            $http({
            method:"POST",
            url:"<?php echo base_url() ?>index.php/order/insertandupdate",
            data:{'id':id,'status':status,'nos':nos,'type':type, 'driver_pickip':'<?php echo $driver_pickip; ?>','action':'pickedstatus'}
              }).success(function(data){
                $scope.fetchSingleDatatotaldel();
                $scope.fetchData();
             }); 

        }
        else if(type==19)
        {

            $http({
            method:"POST",
            url:"<?php echo base_url() ?>index.php/order/insertandupdate",
            data:{'id':id,'status':status,'nos':nos,'type':type, 'driver_pickip':'<?php echo $driver_pickip; ?>','action':'pickedstatus'}
              }).success(function(data){
                $scope.fetchSingleDatatotaldel();
                $scope.fetchData();
             }); 

        }
        else
        {

              $scope.inputsave_1(id,'nos',categories_id,type);
              $scope.fetchSingleDatatotaldel();

        }

      
         

     }
    
    
  
     
  
  
 };
 
 
 
 
    $scope.Proceedtocomplete_only_save = function() {
  
  
 var driver_pickip='<?php echo $driver_pickip; ?>';
 var access='<?php echo $this->session->userdata['logged_in']['access']; ?>';
 var trip_id='<?php echo $trip_id; ?>'; 
  var vehicle_id='<?php echo $vehicle_id; ?>'; 
 var count=$('input[name="loaditems"]:checked').length;

  
  if(count==0)
  {
      alert('Select the checkbox..');
  }
  else
  {
        //if(confirm("Are you sure you want to Complete?"))
        //{
            
            
                 $http({
                 method:"POST",
                 url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                 data:{'status':0, 'order_id':'<?php echo $id; ?>','driver_pickip':'<?php echo $driver_pickip; ?>','action':'loadcompleted_save','tablenamemain':'orders_process'}
                 }).success(function(data)
                 {
                     
                     
                     if(access==13)
                     {
        window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id="+vehicle_id+"&delivery_status=2&trip_id="+trip_id);
                     }
                     else
                     {
                         
                         
                          if(driver_pickip==1)
                         {


          window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id="+vehicle_id+"&delivery_status=2&trip_id="+trip_id);


                               //history.back();
                         }
                         else
                         {
                              history.back();
                         }
                          
                          
                          
                     }
                     
                    
                     
                       //alert('success'); 
                       //history.back();
               
               
                 }); 
          
        
        //}
  }
  
  
  
 };
 
 
 
 
 
  $scope.Proceedtocomplete = function() {
  
  
 var driver_pickip='<?php echo $driver_pickip; ?>';

 var vehicle_id='<?php echo $vehicle_id; ?>';
 var trip_id='<?php echo $trip_id; ?>';

 var access='<?php echo $this->session->userdata['logged_in']['access']; ?>';
   
 var count=$('input[name="loaditems"]:checked').length;

  
  if(count==0)
  {
      alert('Select the checkbox..');
  }
  else
  {
        //if(confirm("Are you sure you want to Complete?"))
        //{


                  $('#Proceedtocomplete').hide();
            
            
                 $http({
                 method:"POST",
                 url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                 data:{'status':0, 'order_id':'<?php echo $id; ?>','driver_pickip':'<?php echo $driver_pickip; ?>','action':'pickcompleted','tablenamemain':'orders_process'}
                 }).success(function(data)
                 {
                     
                     
                    
                         window.location.replace("<?php echo base_url(); ?>index.php/order/delivery_orders_list");
                     
                     
                    
                     
               
                 }); 
          
        
        //}
  }
  
  
  
 };
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  
  
  
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




$scope.fetchDataCategorybase = function(id){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetchDataCategorybase_delivery?order_id=<?php echo $id; ?>&driver_pickip=<?php echo $driver_pickip; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert='+id).success(function(data){
      
      $scope.namesDatacate = data;
      
      
    });
    
   
  
   
  };







$scope.fetchData = function(){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_delivery_data_by_picklist?order_id=<?php echo $id; ?>&driver_pickip=<?php echo $driver_pickip; ?>&tablenamemain=<?php echo 'orders_process'; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert=1').success(function(data){
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






 




$scope.inputsave_1 = function (id,inputname,categories_id,type) {


                    
                     
                     
                          var fieds=inputname+'_'+id;
                          var values=$('#'+fieds).val();
                          
                          var checkval=$('#'+fieds).data('val');
                           var moveforwrd=1;
                          if(checkval<values)
                          {
                              alert('input max value of order');
                              $('#'+fieds).val(checkval);
                               var moveforwrd=0;
                          }
                          
                        
                         
                          var cul=$('#cal_'+categories_id+type).val();
                          var uom=$('#uom_'+id).val();
                          var profile= parseFloat($('#profile_'+id).val());
                          
                          
                                
                          
                          if(type==11)
                          {
                              
                          
                                  var dim_one= parseFloat($('#dim_one_'+id).val());
                                  var dim_two= parseFloat($('#dim_two_'+id).val());
                                  var dim= parseFloat($('#dim_one_'+id).val())+parseFloat($('#dim_two_'+id).val());
                                  $('#dim_oness_'+id).val(dim_one);
                                  $('#dim_twoss_'+id).val(dim_two);
                          
                          
                          }
                          else if(type==12)
                          {
                              
                          
                                  var dim_one= parseFloat($('#dim_one_'+id).val());
                                  var dim_two= parseFloat($('#dim_two_'+id).val());
                                  var dim_three= parseFloat($('#dim_two_'+id).val());
                                  var dim= parseFloat($('#dim_one_'+id).val())+parseFloat($('#dim_two_'+id).val())+parseFloat($('#dim_three_'+id).val());
                                  $('#dim_oness_'+id).val(dim_one);
                                  $('#dim_twoss_'+id).val(dim_two);
                                  $('#dim_threess_'+id).val(dim_three);
                          
                          
                          }
                          else
                          {
                                  var dim=0;
                          }
                          
                            
                      
                 
                          
                          var crimp= parseFloat($('#crimp_'+id).val());
                          
                          $('#profiless_'+id).val(profile);
                          $('#crimpss_'+id).val(crimp);
                          $('#uomss_'+id).val(uom);
                          
                         
                          
                          
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
                                       else if(type==4)
                                       {
                                               var profile= parseFloat(profile); 
                                       }
                                       else
                                       {
                                         var profile= parseFloat($('#profile_'+id).val());  
                                       }
                                      
                                      
                                      
                                  
                                      
                                      var profile= parseFloat(profile*0.305);
                                      var profile=profile.toFixed(3);
                                      
                                      
                                      var dim= parseFloat(dim*0.305);
                                      var dim=dim.toFixed(3);
                                      
                                      
                                      
                                       
                                      
                              
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
                                         var profile=profile.toFixed(3);
                              
                                          
                                          
                                        var dim= parseFloat(dim/1000);
                                        var dim=dim.toFixed(3);
                                      
                              
                              
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
                                          var profile= parseFloat($('#profile_'+id).val());
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
                                       var profile=profile.toFixed(3);
                                       
                                       
                                       
                                        var dim= parseFloat(dim/39.37);
                                        var dim=dim.toFixed(3);
                                      
                              
                              
                          }
                     
                     
                   
            
                    
                       
                        var fact= parseFloat($('#fact_'+id).val());
                        var nos= parseFloat($('#nos_'+id).val());
                        
                        
                     
                       
                        
                        
                        if(inputname=='billing_options')
                        {
                               if(values=='2')
                               {
                                    var rate= parseFloat($('#kg_price_'+id).val());
                                    var ratechange= parseFloat($('#kg_price_'+id).val());
                                    $('#rate_'+id).val(rate);
                                    
                                    
                                     var fact= parseFloat($('#kg_formula_'+id).val());
                                     var factchange= parseFloat($('#kg_formula_'+id).val());
                                     $('#fact_'+id).val(fact);
                                    
                                    
                               }
                               else
                               {
                                   
                                    var rate= parseFloat($('#rate_tab_get_'+id).val());
                                    var ratechange= parseFloat($('#rate_tab_get_'+id).val());
                                    $('#rate_'+id).val(rate);
                                    
                                    
                                     var fact= parseFloat($('#og_formula_get_'+id).val());
                                     var factchange= parseFloat($('#og_formula_get_'+id).val());
                                     $('#fact_'+id).val(fact);
                               }
                               
                        }
                        else
                        {
                             var rate= parseFloat($('#rate_'+id).val());
                             var ratechange=0;
                             var factchange=0;
                        }
                        
                        
                        
                        
                     
                     
                     
                          if(categories_id==1)
                          {
                              var crimp=0; 
                          }
                          
                        
                           if(type==1)
                           {
                               
                               
                               
                                                     var profile= parseFloat($('#profile_'+id).val());


                                                     if(uom==4)
                                                     {
                                                        var profile= parseFloat(profile / 304.8);
                                                     }
                                                      if(uom==5)
                                                     {
                                                        var profile= parseFloat(profile * 3.281);
                                                     }
                                                      if(uom==6)
                                                     {
                                                        var profile= parseFloat(profile / 12);
                                                     }


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
                               
                                        var profile= parseFloat($('#profile_'+id).val());
                                                               var crimp= parseFloat($('#crimp_'+id).val());


                                                                 if(uom==4)
                                                                 {
                                                                    var profile= parseFloat(profile / 304.8);
                                                                 }
                                                                  if(uom==5)
                                                                 {
                                                                    var profile= parseFloat(profile * 3.281);
                                                                 }
                                                                  if(uom==6)
                                                                 {
                                                                    var profile= parseFloat(profile / 12);
                                                                 }



                                                   
                                                               if(uom==4)
                                                              {

                                                                   var crimp= parseFloat(crimp/ 304.8);
                                                                   var crimp=crimp.toFixed(3);
                                                                  
                                                                  
                                                                  
                                                                  
                                                              }
                                                              if(uom==5)
                                                              {
                                                                   var crimp= parseFloat(crimp * 3.281);
                                                                   var crimp=crimp.toFixed(3);
                                                                  
                                                                  
                                                                  
                                                              }
                                                              if(uom==6)
                                                              {
                                                                  var crimp= parseFloat(crimp / 12);
                                                                  var crimp=crimp.toFixed(3);
                                                                  
                                                                  
                                                              }
                                                         
                                                   
                                                   
                                                 
                                                  // var crimp= parseFloat($('#crimp_'+id).val());
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
                                  if(isNaN(nos)) {
                                        var nos= parseFloat($('#qty_'+id).text());
                                  }
                       
                                
                                
                                var sqt_qty=nos;
                                var sqt_qty=sqt_qty.toFixed(3);
                                
                           }
                           
                           
                           if(type==19)
                           {
                               
                                  var nos= parseFloat($('#qty_'+id).val());
                                  if(isNaN(nos)) {
                                        var nos= parseFloat($('#qty_'+id).text());
                                  }
                       
                                
                                
                                var sqt_qty=nos;
                                var sqt_qty=sqt_qty.toFixed(3);
                                
                           }
                           
                           
                         
                           
                           
                           if(type==5)
                           {
                               
                                                   if(categories_id==34)
                                                   {
                                                    
                                                   var sqt_qty=profile*nos*fact;
                                                   
                                                   var sqt_qty=sqt_qty.toFixed(3);
                                                   
                                                  }
                                                  else
                                                  {
                                                    var nos1= parseFloat($('#nos_'+id).val())
                                                   
                                                    if(billing_options == 1){
                                                    // ength/1000*nos*fact
                                                    var sqt_qty=profile*0.305*nos*fact;
                                                    // if(uom == 3){
                                                    //   var sqt_qty=(profile)*nos*fact;
                                                    // }
                                                    // if(uom == 4){
                                                    //   var sqt_qty=(profile/1000)*nos*fact;
                                                    // }
                                                   }
                                                   else
                                                   {
                                                    var sqt_qty=profile*0.305*nos;
                                                   }
                                                   
                                                   var sqt_qty=sqt_qty.toFixed(3);

                                                  }
                               
                              
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
                               var sqt_qty = sqt_qty.toFixed(3);
                                
                                
                                                             
                              
                           }
                            if(type==15)
                           {
                               
                                var profile= parseFloat($('#profile_'+id).val())*parseFloat($('#crimp_'+id).val());
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
                               
                                var sqt_qty = sqt_qty.toFixed(3);
                             
                           }
                           
                           if(type==7)
                           {
                               
                                                                                 
                                                   if(categories_id==13)
                                                   {           
                                                            
                                                               var formula=parseFloat($('#formula_'+id).val());
                                                               var formula2= parseFloat($('#formula2_'+id).val());
                                                               var profile= parseFloat($('#profile_'+id).val());
                                                               var setformula=formula*formula2;
                                         
                                                               if(uom==2)
                                                               {
                                                                     var toat=profile/setformula;
 
                                                               }

                                                               if(uom==8)
                                                               {
                                                                     var toat=profile/10.765;
                                                                     var toat=toat/setformula;
                                                               }
                                                               var toatvalsetval= Math.floor(toat);
                                                             
                                                         
                                                           
                                                               if(uom==2)
                                                               {


                                                                     var p_roll=profile/formula2;

                                                                     var p_roll2=toatvalsetval*formula;
                                                                     var pp_roll_tot=p_roll-p_roll2;
                                                                     var pp_roll_tot=pp_roll_tot.toFixed(2);
                                                                     $('#fact_'+id).val(pp_roll_tot.replace("-", ""));
                                                                     $('#nos_'+id).val(toatvalsetval);
                                                                     var factval=1;
                                                                     
                                                               }

                                                                if(uom==8)
                                                               {
                                                                     var convert=profile/10.765;

                                                                     var p_roll=convert/formula2;
                                                                     var p_roll2=toatvalsetval*formula;
                                                                     var pp_roll_tot=p_roll-p_roll2;
                                                                     var pp_roll_tot=pp_roll_tot.toFixed(2);
                                                                     $('#fact_'+id).val(pp_roll_tot.replace("-", ""));
                                                                     $('#nos_'+id).val(toatvalsetval);
                                                                     var factval=1;

                                                               }
                                                               
                                                                 
                                                             
                                                             var sqt_qty=profile;
                                                   }
                                                   else
                                                   {
                                                          var sqt_qty=profile*fact*nos;
                                                          var sqt_qty=sqt_qty.toFixed(3);
                                                   }
                               
                            
                               
                              
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
                               var sqt_qty = sqt_qty.toFixed(3);
                                        
                           }
                           
                           
                            if(type==11 || type==12)
                           {
                              
                              
                                                    var subqty = parseFloat(profile);
                                                   var sqt=subqty*dim*crimp*fact;
                                                   var sqt_qty=sqt*nos;

                                                  // var sqts=subqty*dim*crimp*old_fact;
                                                   //var old_sqt_qty=sqts*nos;


                                                   var sqt_qty = sqt_qty.toFixed(2);
                                        
                           }
                           
                           
                     
                         
                         
                      
                      
                      
                      
                      
                      
                     
                      $('#qty_'+id).html(sqt_qty);
                      
                      if(type==14)
                      {
                           var total=Math.round(rate*sqt_qty);
                           
                           
                          
                           
                      }
                      else
                      {
                           var total=Math.round(rate*sqt_qty);
                      }
                      
                      
                      
                      
                       var totalammt=total.toFixed(2);
                       $('#amount_'+id).html(totalammt);
                      
                      
                      
                      
                      
                      
                      
                      
                       var nostotsum = 0;
                        $('.nos_'+categories_id).each(function(){
                            nostotsum += parseFloat($(this).val());  
                        });
                        var nostotsumtot=nostotsum.toFixed(2);
                        $('#nostot_'+categories_id).html(nostotsumtot);
                        
                        
                        
                        
                      
                      
                      
                        var cattotsum = 0;
                        $('.amounttot_'+categories_id).each(function(){
                            cattotsum += parseFloat($(this).text());  
                        });
                        var alltotalcat=cattotsum.toFixed(2);
                        $('#fulltotal_'+categories_id).html(alltotalcat);
                        
                        
                        
                        
                        var cattotsumqty = 0;
                        $('.qtyfind_'+categories_id).each(function(){
                            cattotsumqty += parseFloat($(this).text());  
                        });
                        var alltotalcatqty=cattotsumqty.toFixed(2);
                        $('#fullqty_'+categories_id).html(alltotalcatqty);
                      
                        
                      
                      if(inputname=='qty')
                      {
                            var fieds=inputname+'_'+id;

                          

                            var values=$('#'+fieds).val();
                            var sqt_qty=values;


                      }

                      
                      if(moveforwrd==1)
                      {
                    
                           $http({
                              method:"POST",
                              url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $id; ?>&DC_id=<?php echo $DC_id; ?>",
                              data:{'totalammt':totalammt,'rate':rate,'qty':sqt_qty,'nos':values,'id':id,'action':'Loadinsertproductdata_pack'}
                            }).success(function(data){
                        
                              if(data.error != '1')
                              {
                                  
                                      $scope.fetchData();
                                      $scope.fetchSingleDatatotaldel();
                                  
                                   
                              }
                                 
                           });

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
      data:{'action':'fetch_single_data','tablenamemain':'orders_process','driver_pickip':'<?php echo $driver_pickip; ?>','tablename_sub':'order_product_list_process'}
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
       
       $scope.assign_status = data.assign_status;

       $scope.discounttotal = data.discount;
       $scope.discountfulltotal = data.discountfulltotal;
       $scope.Meter_to_Sqr_feet = data.Meter_to_Sqr_feet;
     
       $scope.delivery_charge = data.delivery_charge;
       $scope.fullqty = data.fullqty;
       $scope.FACT = data.FACT;
       $scope.UNIT = data.UNIT;
       $scope.NOS = data.NOS;
     
    });
};






$scope.fetchSingleDatatotaldel = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_totaldel_pickup?order_id=<?php echo $id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'orders_process','DC_id':'<?php echo $DC_id_data; ?>','driver_pickip':'<?php echo $driver_pickip; ?>','tablename_sub':'order_product_list_process','convert':'1'}
      }).success(function(data){

       $scope.fulltotaldel = data.fulltotal;
        $scope.tcsamount = data.tcsamount;


        if(data.pickedtotalamount>0)
        {
                 $scope.loadtotalamount = data.pickedtotalamount;
        }
        else
        {
                   $scope.loadtotalamount = 0;
        }
        
        if(data.picked_amount>0)
        {
            $scope.unbilledloadamount = data.picked_amount+data.picked_amount_alreay_packed;
            var setpickedamount = data.picked_amount+data.picked_amount_alreay_packed;
        }
        else
        {
            $scope.unbilledloadamount = data.picked_amount_alreay_packed;
            var setpickedamount = data.picked_amount_alreay_packed;
        }
        
        $scope.deliveredamount = data.deliveredamount;





         var finalbalnce = parseInt(data.fulltotal)-parseInt(setpickedamount)-parseInt(data.deliveredamount);


       if(finalbalnce>0)
       {
        $scope.finalbalnce=finalbalnce;
       }
       else
       {
        $scope.finalbalnce=0;
       }




       
       $scope.commissiondel = data.commission;


       $scope.reason = data.reason;


       

        $scope.lengeth = data.lengeth;
         $scope.trip_id = data.trip_id;

   

$scope.vehicle_name = data.vehicle_name;
$scope.driver_name = data.driver_name;

       $scope.delivery_date_time = data.delivery_date_time;
            $scope.SSD_check = data.SSD_check;
            $scope.excess_payment_status = data.excess_payment_status;
       
       
       $scope.paricel_mode_del = data.paricel_mode;
        $scope.delivery_charge = data.delivery_charge;
            
            
       
       $scope.orderno = data.order_no;
       
       $scope.delivery_mode = data.delivery_mode;
      
       $scope.totalitemsdel = data.totalitems;
       $scope.discounttotaldel = data.discount;
       $scope.discountfulltotaldel = data.discountfulltotal;
      
        $scope.starttime = data.assign_date;
       $scope.fullqtydel = data.fullqty;

         $scope.company_name_data = data.company_name_data;
            $scope.customername = data.name;
              
            $scope.address = data.address;
            
            $scope.customerphone = data.phone;


      
    });
};















$scope.fetchCustomerdetails_1 = function () {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerdetails_1",
      data:{'id':'<?php echo $id; ?>','tablename':'orders_process'}
    }).success(function(data){
        
        
   
            $scope.company_name_data = data.company_name_data;
            $scope.customername = data.name;
            $scope.routename = data.route_name;
            
            $scope.localityname = data.localityname;
            $scope.delivery_date_time = data.delivery_date_time;
            $scope.SSD_check = data.SSD_check;
            $scope.excess_payment_status = data.excess_payment_status;
            
             $scope.lengeth = data.lengeth;
            
            $('#lat').val(data.lat);
            $('#laog').val(data.laog);
            
            
            $scope.address = data.address;
            
            $scope.customerphone = data.phone;
            $scope.starttime = data.assign_date;
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
   
      <style type="text/css">

        @media screen and (max-width: 767px)
        {
        .time p {
    width: 50%;
    border: 1px solid #f4f4f4;
    margin: 0px;
    font-size: 12px !important;
    padding: 7px;
}

.time
{
    flex-direction: row;
    flex-wrap: wrap;
}


.time p span:first-child {
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
    font-size: 12px;
    color: #777676;
}

.time p span:last-child {
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 500;
    color: #121212;
    padding: 5px 0px;
}
#progrss-wizard {
    padding: 10px;
}


td.last-colorchange:before {
    color: #fff;
}

td.last-colorchange {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.last-colorchange span {
    padding-left: 2px;
    padding-right: 2px;
}

td.last-colorchange label {
    margin: 0px;
}

td.last-colorchange {
    padding: 5px 10px;
    border-radius: 5px;
}
.route p span:first-child {
    font-size: 13px;
    }
.time p:nth-child(even) {
    text-align: right;
}
.route p span {
    margin-bottom: 10px;
}
.card.flexHeightCard {
    margin-top: 60px;
}
}
      </style>
   
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


