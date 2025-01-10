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
     <?php echo $top_nav; 
     
     $read="readonly";
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
                                                                  <span>Contact Person : {{customername}}</span>
                                                                  <span>Contact Phone : {{customerphone}}</span>
                                                                  <span>Route: {{routename}}</span>
                                                                  <span>{{address}}</span></p>
                                                                  <p class=""> <span class="font-size-12">{{orderno}}</span><a href="tel::{{customerphone}}"><span><i class="mdi-phone mdi font-size-20 me-1"></i> Call Customer</span></a></p>
                                                               </div>
                                                               <div>
                                                                  <p><b>ASSIEND TIME : </b><b>{{starttime}}</b></p>
                                                                  <!--<p><span>Est Arrival Time</span><span>1:05 p.m</span></p>-->
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
                                                                        
                                                                       <p style="float:right;">
                                                                             <label for="checkall">
                                                                             <input type="checkbox" id="checkall"  ng-click="loadProductAll()"> Load ALL
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
                                            
                                            
                                             <th class="table-width-8" data-priority="3">UOM</th>
                                             
                                             
                                             <th class="table-width-8" ng-if="namecate.labletype==2 || namecate.labletype==1"  style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("profile_tab")' ng-class='sortClass("profile_tab")'>{{namecate.lable}} </th>
                                             <th class="table-width-8" ng-if="namecate.labletype==2" data-priority="1" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>Length </th>
                                             <th class="table-width-6" ng-if="namecate.labletype==2 || namecate.labletype==1" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>{{namecate.lablenos}} </th>
                                             
                                             
                                             
                                            
                                             <!--<th class="table-width-6" data-priority="3">Unit</th>-->
                                             <!--<th class="table-width-8" data-priority="6"  ng-click='sortColumn("Meter_to_Sqr_feet")' ng-class='sortClass("Meter_to_Sqr_feet")'>Sqft </th>-->
                                             <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("rate_tab")' ng-class='sortClass("rate_tab")'>Rate </th>
                                             <th class="table-width-10 comdisplay" rowspan="2" ng-if="commission_check==1" data-priority="6" ng-click='sortColumn("commission_tab")' ng-class='sortClass("commission_tab")'> Commission </th>
                                              <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("amount_tab")' ng-class='sortClass("amount_tab")'>Amount </th>
                                             
                                               <th class="table-width-10" data-priority="6" rowspan="2" ></th>
                                             
                                             
                                          </tr>
                                          
                                          
                                          
                                       </thead>
                                       
                                       
                                       
                                        <thead class="bg-gray text-red" ng-if="namecate.categories_id!=1">
                                         
                                       
                                         
                                          <tr>
                                              <th class="table-width-3" rowspan="2">S.No</th>
                                             <th class="table-width-18" rowspan="2" data-priority="1" ng-click='sortColumn("product_name_tab")' ng-class='sortClass("product_name_tab")'>Products </th>
                                            
                                             <th class="table-width-18" ng-if="namecate.labletype==4" rowspan="2" data-priority="1" ng-click='sortColumn("product_name_tab")' ng-class='sortClass("product_name_tab")'>Tile Material </th>
                                            
                                            
                                            
                                            <th class="table-width-18" ng-if="namecate.labletype==16 || namecate.labletype==19 || namecate.categories_id==591" rowspan="2" data-priority="1">Material Specfication
 </th>
 
 
 
 <th class="table-width-15" ng-if="namecate.labletype==19 || namecate.categories_id==591" rowspan="2" data-priority="1" >Remarks
 </th>
 
 
  <th class="table-width-15" ng-if="namecate.labletype==19" rowspan="2" data-priority="1" >Coil_no 
 </th>
 
 
 
 
 
  <th class="table-width-18" ng-if="namecate.categories_id==592" rowspan="2" data-priority="1" >Description
 </th>
                                            
                                            
                                            
                                            
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
                                             
                                            
                                              <th class="table-width-6"  data-priority="3" ng-if="namecate.labletype!=9" rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>{{namecate.lablenos}}</th>
                                            
                                            
                                            
                                            
                                             <!--<th class="table-width-6" data-priority="3">Unit</th>-->
                                            
                                            
                                            
                                             <!--<th class="table-width-8" data-priority="6"  ng-click='sortColumn("Meter_to_Sqr_feet")' ng-class='sortClass("Meter_to_Sqr_feet")'>Sqft </th>-->
                                             <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("rate_tab")' ng-class='sortClass("rate_tab")'>Rate </th>
                                             <th class="table-width-10 comdisplay"        rowspan="2" ng-if="commission_check==1" data-priority="6" ng-click='sortColumn("commission_tab")' ng-class='sortClass("commission_tab")'> Commission </th>
                                              <th class="table-width-10" data-priority="6" rowspan="2" ng-click='sortColumn("amount_tab")' ng-class='sortClass("amount_tab")'>Amount </th>
                                             
                                             
                                         
                                               
                                               <th class="table-width-10" data-priority="6" rowspan="2" ></th>
                                             
                                          
                                             
                                          </tr>
                                          
                                          
                                          
                          
                                          
                                          
                                       </thead>
                                       
                                       
                                       
                                       
                                       
                                       
                                       <tbody  ng-repeat="name in namesData|orderBy:column:reverse" ng-if="namecate.categories_id==1">
                                           
                                           
                                           

                                          <tr  ng-style="name.rate_edit == 1 && {'color':'red'}"    class="view" ng-if="namecate.categories_id==name.categories_id_get && namecate.type==name.type">
                                           
                                           
                                             <td data-label="S No">{{name.no}}</span> 
                                             
                                             
                                             
                                             
                                               <i class="mdi mdi-check  font-size-16"  ng-if="name.purchase_request==1" ng-click="getPurchaserequest(name.purchase_id,name.product_name_tab)" title="Purchase requested" style="cursor: pointer;"></i>
                                             
                                             
                                             
                                             
                                             </td>
                                           
                                           
                                           
                                            <input type="hidden"  value="{{namecate.categories_id}}"  id="cateid_{{name.id}}">
                                            <input type="hidden"  value="{{namecate.type}}"  id="cateidtype_{{name.id}}">
                                            <input type="hidden"  value="{{name.product_id}}"  id="ppid_{{name.id}}">
                                          
                                            
                                                 <td title="{{name.categories}}"  data-label="Products">
                                                {{name.product_name_tab}}
                                                       
                                                 </td>
                                             
                                             
                                              <td  data-priority="3" data-label="UOM" >
                                                
                                                  <select class="selectbox" disabled  id="uom_{{name.id}}"  ng-model="calulation"><option value="3" ng-selected="{{name.uom == 3}}">FEET</option><option value="4" ng-selected="{{name.uom == 4}}">MM</option><option value="5" ng-selected="{{name.uom == 5}}">MTR</option><option value="6" ng-selected="{{name.uom == 6}}">INCH</option></select>
                                                   
                                                  
                                                
                                                   
                                                   
                                                   
                                            </td>
                                            
                                           
                                             
                                             <td data-label="{{namecate.lable}}"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}"  value="{{name.profile_tab}}"></td>
                                            
                                            
                                             <td ng-if="namecate.labletype==2" data-label="Crimp"><input type="text" <?php echo $read; ?> ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)" id="crimp_{{name.id}}" value="{{name.crimp_tab}}"></td>
                                             
                                             
                                             <td data-label="Nos"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.nos_tab}}"></td>
                                             <!--<td><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'unit',namecate.categories_id)"  id="unit_{{name.id}}" value="{{name.unit_tab}}"></td>-->
                                            
                                            <!--<td><input type="text"  ng-keyup="inputsave_1(name.id,'Meter_to_Sqr_feet',namecate.categories_id)" id="Meter_to_Sqr_feet_{{name.id}}" value="{{name.Meter_to_Sqr_feet}}"></td>-->
                                             <td data-label="Rate"><input type="text" <?php echo $read; ?>  ng-keyup="inputsaverate_1(name.id,'rate',namecate.categories_id,namecate.type)"  id="rate_{{name.id}}" value="{{name.rate_tab}}">
                                            
                                             <span class="td-info-icons td-competitor-price" >
                                                 
                                                 
                                                 <button class="btn dropdown-toggle p-0 font-size-12" type="button" ng-click="pricelist(name.product_id,name.product_name_tab)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSpec-pricelist" aria-controls="offcanvasSpec-pricelist">
                                                    <i class="fas fa-rupee-sign"></i>
                                                </button>
                                                
                                                
                                                
                                             </span>
                                             </td>
                                           
                                             <td ng-if="commission_check==1" data-label="Commission" class="comdisplay"><input type="text"  ng-keyup="inputsave_1(name.id,'commission',namecate.categories_id,namecate.type)"  id="commission_{{name.id}}" value="{{name.commission_tab}}"></td>
                                             
                                            
                                        
                                             
                                             
                                             
                                             <td id="amount_{{name.id}}" data-label="Amount" class="amounttot_{{namecate.categories_id}}">{{name.amount_tab}}</td>
                                            
                                         
                                             <td data-label="Action" class="last-colorchange">
                                                
                                                 <span ng-if="name.loadstatus==0">
                                                                                                            
                                                                                                            <label for="set_id{{name.id}}"><input type="checkbox" value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Load</span></label>
                                                                                                         
                                                                                                        </span>
                                                                                                        
                                                                                                        <span ng-if="name.loadstatus==1">
                                                                                                            
                                                                                                            <label for="set_id{{name.id}}"><input type="checkbox" checked value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Loaded</span></label>
                                                                                                         
                                                                                                        </span>
                                             </td>
                                             
                                          
                                             
                                             
                                             
                                             
                                          </tr>
                                        
                                       

                                          
                                          
                                       </tbody>
                                            
                                     
                                       
                                       <tbody  ng-repeat="name in namesData|orderBy:column:reverse" ng-if="namecate.categories_id!=1">
                                           
                                           
                                           
                                          
                                          <tr  ng-style="name.rate_edit == 1 && {'color':'red'}" class="view" ng-if="namecate.categories_id==name.categories_id_get">
                                             
                                             
                                            <td data-label="S No">{{name.no}}</span> 
                                             
                                          
                                             <td title="{{name.categories}}" data-label="Products">
                                                 {{name.product_name_tab}}
                                                  
                                                 </td>
                                                 
                                                 
                                                 
                                                 
                                             <td  ng-if="namecate.labletype==4" data-label="Sub Products" ><input type="text" <?php echo $read; ?> placeholder="Search Product" ng-keyup="completeProductSUb(name.id)"  ng-blur="inputsave_1(name.id,'tile_material_name',namecate.categories_id,namecate.type)"   id="tile_material_name_{{name.id}}" value="{{name.tile_material_name}}"></td>
                                        
                                        
                                        
                                         <td  ng-if="namecate.labletype==16" data-label="Sub Products" ><input type="text" <?php echo $read; ?> placeholder="Search Product" ng-keyup="completeProductSUb(name.id)"  ng-blur="inputsave_1(name.id,'tile_material_name',namecate.categories_id,namecate.type)"   id="tile_material_name_{{name.id}}" value="{{name.tile_material_name}}"></td>
                                        
                                        
                                         <td  ng-if="namecate.labletype==19" data-label="Sub Products" ><input type="text" <?php echo $read; ?> placeholder="Search Product" ng-keyup="completeProductSUb3(name.id)"  ng-blur="inputsave_1(name.id,'tile_material_name',namecate.categories_id,namecate.type)"   id="tile_material_name_{{name.id}}" value="{{name.tile_material_name}}"></td>
                                        
                                         
                                        
                                        
                                             <td  ng-if="namecate.categories_id==592" data-label="Sub Products" ><input type="text" <?php echo $read; ?>    ng-blur="inputsave_1(name.id,'tile_material_name',namecate.categories_id,namecate.type)"   id="tile_material_name_{{name.id}}" value="{{name.tile_material_name}}"></td>
                                      
                                          <td  ng-if="namecate.labletype==19 || namecate.categories_id==591" data-label="Remarks" ><input type="text" <?php echo $read; ?>   ng-blur="inputsave_1(name.id,'dim_one',namecate.categories_id,namecate.type)"   id="dim_one_{{name.id}}" value="{{name.dim_one}}"></td>
                                          <td  ng-if="namecate.labletype==19" data-label="Coil No" ><input type="text" <?php echo $read; ?>   ng-blur="inputsave_1(name.id,'dim_two',namecate.categories_id,namecate.type)"   id="dim_two_{{name.id}}" value="{{name.dim_two}}"></td>
                                      
                                        
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
                                                 
                                                  
                                                      
                                                   <select disabled ng-change="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)" ng-model="mmt" style="padding: 0px 0px;border: none;"  id="profile_{{name.id}}">
                                                   <option  value="0" ng-if="name.profile_tab==0"> Select </option>
                                                   <option ng-repeat="mmset in availableProductsmm" value="{{mmset.length_mm}}"  ng-selected="{{mmset.length_mm == name.profile_tab}}"> {{mmset.length_mm}} </option>
                                                   </select>
                                                   
                                                   
                                                   <!--<input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}"  value="{{name.profile_tab}}">-->
                                               
                                                   
                                                
                                                 
                                            </td>
                                            
                                            
                                            
                                            
                                             <td ng-if="namecate.labletype==8 || namecate.labletype==1 ||  namecate.labletype==5 || namecate.labletype==6  || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12" data-label="{{namecate.lable}}"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}" value="{{name.profile_tab}}"></td>
                                            
                                             <td ng-if="namecate.labletype==8" data-label="{{namecate.lable2}}"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"  id="crimp_{{name.id}}"  value="{{name.crimp_tab}}"></td>
                                             
                                             
                                               <td ng-if="namecate.labletype==15">
                                                 
                                                  
                                                  
                                                  
                                                  
                                                  <select disabled ng-if="name.uom==4 || name.uom==5" ng-change="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  ng-model="profilewall" style="padding: 0px 0px;border: none;"  id="profile_{{name.id}}">
                                                     
                                                      <option  value="11800"   ng-selected="{{name.profile_tab == '11800'}}" >11800</option>
                                                      <option  value="5900"    ng-selected="{{name.profile_tab == '5900'}}" >5900</option>
                                                     
                                                     
                                                       
                                                   </select>
                                                   
                                                   
                                                   <select disabled ng-if="name.uom==3" ng-change="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  ng-model="profilewall" style="padding: 0px 0px;border: none;"  id="profile_{{name.id}}">
                                                     
                                                      <option  value="38.716"  ng-selected="{{name.profile_tab == '38.716'}}" >38.716</option>
                                                      <option  value="19.358"  ng-selected="{{name.profile_tab == '19.358'}}" >19.358</option>
                                                      
                                                     
                                                   </select>
                                                   
                                                   
                                                   
                                                   
                                                   
                                                     <select disabled ng-if="name.uom==6" ng-change="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  ng-model="profilewall" style="padding: 0px 0px;border: none;"  id="profile_{{name.id}}">
                                                     
                                                      
                                                      <option  value="464.60"  ng-selected="{{name.profile_tab == '464.60'}}" >464.60</option>
                                                      <option  value="232.30"  ng-selected="{{name.profile_tab == '232.30'}}" >232.30</option>
                                                       
                                                   </select>
                                                   
                                                   
                                                   
                                                   
                                                   
                                                
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
                                                     
                                                     
                                                    
                                                      <option  value="6.90"   ng-selected="{{name.crimp_tab == '6.90'}}" >6.90</option>
                                                      <option  value="4"      ng-selected="{{name.crimp_tab == '4'}}" >4</option>
                                                     
                                                     
                                                       
                                                   </select>
                                                   
                                                   
                                                    <select disabled ng-if="name.uom==6"  ng-change="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"  ng-model="crimpwall" style="padding: 0px 0px;border: none;"  id="crimp_{{name.id}}">
                                                     
                                                      <option  value="48"     ng-selected="{{name.crimp_tab == '48'}}" >48</option>
                                                      <option  value="82.80"  ng-selected="{{name.crimp_tab == '82.80'}}" >82.80</option>
                                                       
                                                   </select>
                                                
                                                </td>
                                                 
                                            
                                            
                                             <td ng-if="namecate.labletype==1 || namecate.labletype==6 || namecate.labletype==11 || namecate.labletype==12" data-label="{{namecate.lable2}}"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)" id="crimp_{{name.id}}" value="{{name.crimp_tab}}"></td>
                                            
                                             <td data-label="Nos" ng-if="namecate.labletype!=9"> <input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.nos_tab}}"></td>
                                             <!--<td><input type="text"  ng-keyup="inputsave_1(name.id,'unit',namecate.categories_id)"  id="unit_{{name.id}}" value="{{name.unit_tab}}"></td>-->
                                            
                                             <!--<td><input type="text"  ng-keyup="inputsave_1(name.id,'Meter_to_Sqr_feet'),namecate.categories_id" id="Meter_to_Sqr_feet_{{name.id}}" value="{{name.Meter_to_Sqr_feet}}"></td>-->
                                             <td data-label="Rate"><input type="text"   <?php echo $read; ?> ng-keyup="inputsaverate_1(name.id,'rate',namecate.categories_id,namecate.type)"  id="rate_{{name.id}}" value="{{name.rate_tab}}">
                                            
                                             <span class="td-info-icons td-competitor-price">
                                                 <button class="btn dropdown-toggle p-0 font-size-12" type="button" ng-click="pricelist(name.product_id,name.product_name_tab)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSpec-pricelist" aria-controls="offcanvasSpec-pricelist">
                                                    <i class="fas fa-rupee-sign"></i>
                                                </button>
                                                
                                             </span>
                                             </td>
                                           
                                             <td ng-if="commission_check==1" data-label="Commission" class="comdisplay"><input type="text"  ng-keyup="inputsave_1(name.id,'commission',namecate.categories_id,namecate.type)"  id="commission_{{name.id}}" value="{{name.commission_tab}}"></td>
                                             
                                            
                                            
                                             
                                             
                                             
                                             
                                             
                                             
                                             <td id="amount_{{name.id}}" data-label="Amount" class="amounttot_{{namecate.categories_id}}">{{name.amount_tab}}</td>
                                            
                                          
                                             <td data-label="Action" class="last-colorchange">
                                                
                                                 <span ng-if="name.loadstatus==0">
                                                                                                            
                                                                                                            <label for="set_id{{name.id}}"><input type="checkbox" value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Load</span></label>
                                                                                                         
                                                                                                        </span>
                                                                                                        
                                                                                                        <span ng-if="name.loadstatus==1">
                                                                                                            
                                                                                                            <label for="set_id{{name.id}}"><input type="checkbox" checked value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Loaded</span></label>
                                                                                                         
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
                                                       
                                                         <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                          <li class="float-end"><a href="javascript: void(0);" class="btn btn-primary"  ng-click="Proceedtocomplete()"   data-bs-toggle="modal"
                                                                    data-bs-target=".confirmModal"><i class="mdi mdi-thumb-up pe-1"></i>Load Proceed To Complete </a></li>
                                                        </ul>
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
          $('.loaditems').each(function () {
            
                var id= $(this).val();
               
                $('.loaditems').prop('checked',true);
                $('#textchange_'+id).text('Loaded');
           
             
           
                 $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                    data:{'id':id,'status':status, 'action':'loadstatus'}
                  }).success(function(data){
                   
                   
                  }); 
      
      
      
      
        });
        
        
        
       }
       else
       {
            var status=0;
            
              $('.loaditems').each(function () {
            
                var id= $(this).val();
               
                $('.loaditems').prop('checked',false);
                $('#textchange_'+id).text('Load');
           
             
           
                 $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                    data:{'id':id,'status':status, 'action':'loadstatus'}
                  }).success(function(data){
                   
                   
                  }); 
      
      
      
      
        });
        
        
           
       }
       
        
     
      
        
        
        
        
      
  };
 
 
 
 
 
  $scope.loadProduct = function(id) {
  
  
  
    var status=0;
    $('#textchange_'+id).text('Load');
    if($('#set_id'+id).is(':checked')) {
        var status=1;
        $('#textchange_'+id).text('Loaded');
    }
   
    
    
    
    $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id,'status':status, 'action':'loadstatus'}
      }).success(function(data){
       
       
      }); 
  
  
  
 };
 
 
 
 
 
 
 
 
  $scope.Proceedtocomplete = function() {
  
  
  
   
 var count=$('input[name="loaditems"]:checked').length;

  
  if(count==0)
  {
      alert('Select the checkbox..');
  }
  else
  {
        if(confirm("Are you sure you want to Complete?"))
        {
            
            
                 $http({
                 method:"POST",
                 url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                 data:{'status':0, 'order_id':'<?php echo $id; ?>','driver_pickip':'<?php echo $driver_pickip; ?>','action':'loadcompleted','tablenamemain':'orders_process'}
                 }).success(function(data){
                      
                          history.back();
               
                 }); 
          
        
        }
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
   


    $http.get('<?php echo base_url() ?>index.php/order/fetchDataCategorybase?order_id=<?php echo $id; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert='+id).success(function(data){
      
      
      
      
      $scope.namesDatacate = data;
      
      
      
      
      
      
      
      
    });
    
   
  
   
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


