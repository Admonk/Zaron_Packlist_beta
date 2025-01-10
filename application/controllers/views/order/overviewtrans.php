<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
th {
    cursor: pointer;
}
i.fa.fa-sort {
    float: right;
    font-size: 7px;
    color: #e1e1e1;
}
h6.mb-sm-0.font-size-12.ng-binding {
    line-height: 20px;
}
input.form-control.linetext {
    background: #fbf8f8;
    border: none;
    padding: 0px;
}
textarea.form-control.linetext {
    background: #fbf8f8;
    border: #fbf8f8;
    padding: 0px;
}
.invoice-6 .table td, .invoice-6 .table th {
    font-size: 12px;
    padding: 7px 5px !important;
    vertical-align: top;
    border-top: 1px solid #e9ecef;
    border-right: 1px solid #e9ecef;
    text-align: center;
}
td.text-right.bold {
    text-align: right !important;
    font-size: 14px;
    font-weight: 700;
}select.selectbox {
    border: none;
    -webkit-appearance: none;
}













.invoice-6 .invoice-top .logo img {

    height: 173px !important;
    width: 100%;
    padding: 20px;
}


.invoice-6 .invoice-inner-6 {

box-shadow: 0 0 0px rgb(0 0 0 / 0%) !important;
}

.inv-title-1{
    color: #ff5e14 !important;
}

.table>thead {
    vertical-align: bottom !important;
    color: #fff !important;
    background: #ee5c17;
}




.invoice-info {
    border-top: 1px solid #f3f3f3;
    border-bottom: 1px solid #f3f3f3;
    line-height: 1.8;
}



.invoice-6 .invoice-informeshon {
    padding: 50px 70px;
    background: none !Important;
}
.payment-info.row {
    background: #f9f9f9 ;
    padding: 10px ;
}

.payment-info.gray-dark.row {
    background: #f1f1f1;
    padding: 10px !important;
}



input.form-control.linetext {
    background: none !important;
}





textarea.form-control.linetext {
   background: none !Important;
}



td.text-right.bold.ng-binding {
    padding-right: 25px !important;
}


.invoice-6 .table td, .invoice-6 .table th {
   
    border-bottom: 1px solid #e9ecef;
  
}


.invoice-6 {
    background: #fff;
    min-height: 100vh;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0px !important;
    font-family: 'Poppins', sans-serif;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}


.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
   
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
    
    #footer .col {
    width: 160px;
}
#footer p {
    font-size: 11px;
}
div#invoice {
    padding: 0 !important;
}


}

</style>
<link href="<?php echo base_url(); ?>assets/css/style.css" id="app-style" rel="stylesheet" type="text/css" />


<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">





<div id="invoice" class="invoice-6 invoice-content" id="htmlContent">
    <div class="container invoice" >
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner-6" id="invoice_wrapper">
                    <div class="invoice-info">
                      
                                <div class="row">
                                    <div class="col">
                                        <a target="_blank" href="https://lobianijs.com">
                                            <img class="logo" src="<?php echo LOGO; ?>" alt="logo">
                                            </a>
                                    </div>
                                    <div class="col company-details" style="margin: auto;    background: #f9f9f9;    padding: 20px;">
                                       <p style="font-size: 16px;font-weight: 700; ">  <span style="    color: #ff5e14;">GST NO: </span> 33AAAFZ8146Q1ZI </p>
                                                   <p><b>Website:  </b>www.zaron.in | <b>Email:  </b>sales@zaron.in </p> 
                                    </div>
                                </div>
                            
                    </div>
                    
                   
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

                    <div class="order-summary">
                        <div class="table-responsive" ng-init="fetchDataCategorybase(1)">
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                      
                        <div  navigatable ng-init="fetchData('1')">
                           <div class="navclass">
                              <div ng-repeat="namecate in namesDatacate" >
                                  
                                
                                
                                
                                 <h5 style="font-size: 16px;    text-align: left;    background: #f3f3f3;    padding: 3px 6px;    margin: 9px auto;">{{namecate.no}}. {{namecate.categories_name}}  </h5>
                                 
                                 <div  data-pattern="priority-columns" >
                                    <table id="datatable" class="table invoice-table" >
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                       <thead class="bg-gray text-red" ng-if="namecate.categories_id==1">
                                         
                                         
                                        
                                          <tr>
                                              
                                              
                                             <th class="table-width-3" rowspan="2">S.No</th>
                                             <th class="table-width-18" rowspan="2"   >Products </th>
                                             <th class="table-width-8" >UOM</th>
                                             <th class="table-width-8" ng-if="namecate.labletype==2 || namecate.labletype==1"  style="padding-bottom:0px" >{{namecate.lable}} </th>
                                             <th class="table-width-8" ng-if="namecate.labletype==2"  >Length </th>
                                             <th class="table-width-6" ng-if="namecate.labletype==2 || namecate.labletype==1" rowspan="2" style="padding-bottom:0px" >{{namecate.lablenos}} </th>
                                             <th class="table-width-10"  rowspan="2" >Rate </th>
                                            
                                            
                                           
                                             <th class="table-width-10"  rowspan="2" >{{namecate.uom}} </th>
                                               <th class="table-width-10" rowspan="2" ng-if="gst_check==1" > GST % </th>
                                             <th class="table-width-10"  rowspan="2" >Amount </th>
                                             
                                              
                                           
                                             
                                          </tr>
                                          
                                          
                                          
                                       </thead>
                                       
                                       
                                       
                                        <thead class="bg-gray text-red" ng-if="namecate.categories_id!=1">
                                         
                                       
                                         
                                          <tr>
                                             <th class="table-width-3" rowspan="2">S.No </th>
                                             <th class="table-width-18" rowspan="2"  >Products </th>
                                            
                                             <th class="table-width-18" ng-if="namecate.labletype==4" rowspan="2"  >Tile Material </th>
                                             <th class="table-width-18" ng-if="namecate.labletype==16 || namecate.labletype==19" rowspan="2"  >Material Specfication </th>
                                             <th class="table-width-18" ng-if="namecate.categories_id==592" rowspan="2" data-priority="1" >Description</th>
                                             
                                            
                                                                         
 <th class="table-width-15" ng-if="namecate.labletype==19" >Remarks
 <i class="fa fa-sort" aria-hidden="true"></i></th>
 
 
  <th class="table-width-15" ng-if="namecate.labletype==19" >Coil_no 
 <i class="fa fa-sort" aria-hidden="true"></i></th> 
                                            
                                             <th class="table-width-8"  ng-if="namecate.labletype!=9">UOM</th>
                                              
                                               <th class="table-width-15" ng-if="namecate.labletype==19" >Coil_Status 
 <i class="fa fa-sort" aria-hidden="true"></i></th> 
                                              
                                             <th class="table-width-8" ng-if="namecate.labletype==5 || namecate.labletype==6" >Billing Option</th>
                                             
                                             <th class="table-width-8" ng-if="namecate.labletype==11 || namecate.labletype==12" >Dim 1</th>
                                             <th class="table-width-8" ng-if="namecate.labletype==11 || namecate.labletype==12" >Dim 2</th>
                                             <th class="table-width-8" ng-if="namecate.labletype==12" >Dim 2</th>
                                             
                                             
                                             <th class="table-width-8"  ng-if="namecate.labletype==8 ||  namecate.labletype==1 || namecate.labletype==15 ||  namecate.labletype==4 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12" style="padding-bottom:0px" >{{namecate.lable}} </th>
                                              
                                              
                                             <th class="table-width-10" ng-if="namecate.labletype==8"  style="padding-bottom:0px"  >Extra {{namecate.lable}} </th>
                                             <th class="table-width-8" ng-if="namecate.labletype==8" style="display:none;"  style="padding-bottom:0px" >Back {{namecate.lable}} </th>
                                             <th class="table-width-8" ng-if="namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==15" >{{namecate.lable2}} </th>
                                             
                                            
                                             <th class="table-width-8" ng-if="namecate.labletype==1 || namecate.labletype==6"  style="padding-bottom:0px" >{{namecate.lable2}} </th>
                                             <th class="table-width-6" ng-if="namecate.labletype!=9"  rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>{{namecate.lablenos}} </th>
                                             <th class="table-width-6" ng-if="namecate.labletype==1 || namecate.labletype==2 || namecate.labletype==3 || namecate.labletype==4 || namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==8 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==13 || namecate.labletype==14" rowspan="2" ><small>{{namecate.lablefact1}} <br> {{namecate.lablefact2}} </small> </th>
                                            
                                            
                                            
                                          
                                             <th class="table-width-10"  rowspan="2" >Rate </th>
                                             
                                             
                                             
                                             <th class="table-width-10"  rowspan="2" >{{namecate.uom}} </th>
                                              <th class="table-width-10" rowspan="2" ng-if="gst_check==1" > GST % </th>
                                             <th class="table-width-10"  rowspan="2" >Amount </th>
                                             
                                            
                                             
                                          </tr>
                                          
                                          
                                          
                          
                                          
                                          
                                       </thead>
                                       
                                       
                                       
                                       
                                       
                                       
                                       <tbody  ng-repeat="name in namesData|orderBy:column:reverse" ng-if="namecate.categories_id==1">
                                           
                                           
                                           

                                          <tr class="view" ng-if="namecate.categories_id==name.categories_id_get && namecate.type==name.type">
                                             <th>{{name.no}}</th>
                                             <td title="{{name.categories}}">{{name.product_name_tab}}  </td>
                                             <td><select class="selectbox"  disabled><option value="3" ng-selected="{{name.uom == 3}}">FEET</option><option value="4" ng-selected="{{name.uom == 4}}">MM</option><option value="5" ng-selected="{{name.uom == 5}}">MTR</option><option value="6" ng-selected="{{name.uom == 6}}">INCH</option><option value="2" ng-selected="{{name.uom == 2}}">SQMRT</option></select>
                                              </td>
                                             <td >{{name.profile_tab}}</td>
                                             <td ng-if="namecate.labletype==2">{{name.crimp_tab}}</td>
                                             <td>{{name.nos_tab}}</td>
                                             <td style="display:none;">{{name.fact_tab}}</td>
                                             <td>{{name.rate_tab}}</td>
                                            
                                             <td id="qty_{{name.id}}" class="qtyfind_{{namecate.type}}">{{name.qty_tab}}</td>
                                             
                                             <th ng-if="gst_check==1"><b style="font-size:12px;" >{{name.gst}}</b></th>
                                             
                                             <td id="amount_{{name.id}}" class="amounttot_{{namecate.type}}">{{name.amount_tab}}</td>
                                       </tr>
                                        
                                       

                                          
                                          
                                       </tbody>
                                            
                                       <tfoot ng-if="namecate.categories_id==1">
                                           <tr >
                                             <th ></th>
                                             <th class="table-width-6"></th>
                                             <th class="table-width-6" > </th>
                                             <th class="table-width-6" > </th>
                                             <th ng-if="namecate.labletype==2"><b style="font-size:12px;"></b></th>
                                             <th ><b style="font-size:12px;" id="nostot_{{namecate.type}}">{{namecate.nos_total}}</b></th>
                                             <th ><b style="font-size:12px;"></b></th>
                                            
                                             <th ><b style="font-size:12px;" id="fullqty_{{namecate.type}}">{{namecate.qty_total}}</b></th>
                                             <th ng-if="gst_check==1"></th>
                                             <th ><b style="font-size:12px;" id="fulltotal_{{namecate.type}}">{{namecate.amount_total}} </b></th>
                                             
                                          </tr>
                                       </tfoot>
                                       
                                       
                                       
                                       <tbody  ng-repeat="name in namesData|orderBy:column:reverse" ng-if="namecate.categories_id!=1">
                                           
                                           
                                           
                                          
                                          <tr   class="view" ng-if="namecate.categories_id==name.categories_id_get">
                                             
                                             <th>{{name.no}}</th>
                                             <td title="{{name.categories}}">{{name.product_name_tab}} </td>
                                               <td  ng-if="namecate.labletype==4 || namecate.labletype==16 || namecate.labletype==19 || namecate.categories_id==592">{{name.tile_material_name}}</td>
                                             <td  ng-if="namecate.labletype==19">{{name.dim_one}}</td>
                                         <td  ng-if="namecate.labletype==19">{{name.dim_two}}</td>  
                                        
                                            <td  ng-if="namecate.labletype!=9">
                                                
                                                
                                                <span ng-if="namecate.labletype!=14">
                                                <select class="selectbox"  disabled><option value="3" ng-selected="{{name.uom == 3}}">FEET</option><option value="4" ng-selected="{{name.uom == 4}}">MM</option><option value="5" ng-selected="{{name.uom == 5}}">MTR</option><option value="6" ng-selected="{{name.uom == 6}}">INCH</option><option value="2" ng-selected="{{name.uom == 2}}">SQMRT</option></select>
                                                </span>
                                                <span ng-if="namecate.labletype==14">
                                                    NOS
                                                </span>
                                             
                                             
                                              </td>
                                             <td  ng-if="namecate.labletype==19">{{name.dim_three}}</td> 
                                             <td  ng-if="namecate.labletype==5 || namecate.labletype==6">
                                                 
                                                 
                                                 
                                                  <select class="selectbox"  disabled ng-if="namecate.labletype==5"><option value="1" ng-selected="{{name.billing_options == 1}}">Running  MTR</option><option value="2" ng-selected="{{name.billing_options == 2}}">KG</option></select>
                                                  <select class="selectbox"  disabled ng-if="namecate.labletype==6"><option value="1" ng-selected="{{name.billing_options == 1}}">SQM  MTR</option><option value="2" ng-selected="{{name.billing_options == 2}}">KG</option></select>
                                                  
                                                 
                                                 
                                                   
                                             </td>
                                              <td ng-if="namecate.labletype==11 || namecate.labletype==12">{{name.dim_one}}</td>
                                              <td ng-if="namecate.labletype==11 || namecate.labletype==12">{{name.dim_two}}</td>
                                               <td ng-if="namecate.labletype==12">{{name.dim_two}}</td>
                                            
                                        
                                             <td ng-if="namecate.labletype==4"> {{name.profile_tab}}</td>
                                                 
                                               
                                             <td ng-if="namecate.labletype==8 || namecate.labletype==1 || namecate.labletype==15 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12">{{name.profile_tab}}</td>
                                             <td ng-if="namecate.labletype==8 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==15">{{name.crimp_tab}}</td>
                                             <td ng-if="namecate.labletype==8" style="display:none;">{{name.back_crimp}}</td>
                                             <td ng-if="namecate.labletype==1 || namecate.labletype==6">{{name.crimp_tab}}</td>
                                             <td ng-if="namecate.labletype!=9">{{name.nos_tab}}</td>
                                             <td ng-if="namecate.labletype==1 || namecate.labletype==2 || namecate.labletype==3 || namecate.labletype==4 || namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==8 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==13 || namecate.labletype==14">{{name.fact_tab}}</td>
                                             <td>{{name.rate_tab}}</td>
                                             
                                             <td id="qty_{{name.id}}" class="qtyfind_{{namecate.type}}">{{name.qty_tab}}</td>
                                              <th ng-if="gst_check==1"><b style="font-size:12px;" >{{name.gst}}</b></th>
                                             
                                             <td id="amount_{{name.id}}" class="amounttot_{{namecate.type}}">{{name.amount_tab}}</td>
                                            
          
                                             
                                          </tr>
                                        
                                     
                                          
                                          
                                          
                                       </tbody>
                                            
                                       <tfoot ng-if="namecate.categories_id!=1">
                                           <tr >
                                             <th ></th>
                                             <th class="table-width-6" ng-if="namecate.labletype!=14"></th>
                                             <th class="table-width-6" ng-if="namecate.labletype==11 || namecate.labletype==12"></th>
                                             <th class="table-width-6" ng-if="namecate.labletype==11 || namecate.labletype==12"></th>
                                             <th class="table-width-6" ng-if="namecate.labletype==12"></th>
                                             
                                            
                                               <th class="table-width-6" ng-if="namecate.labletype==19"></th>
                                                <th class="table-width-6" ng-if="namecate.labletype==19"></th>
                                                 <th class="table-width-6" ng-if="namecate.labletype==19"></th>
                                                  <th class="table-width-6" ng-if="namecate.labletype==19"></th>
                                             
                                             <th class="table-width-6" ng-if="namecate.labletype==6 || namecate.labletype==11 || namecate.labletype==12"> </th> 
                                             <th class="table-width-6 hidmob" ng-if="namecate.labletype==15"> </th>
                                             <th class="table-width-6" ng-if="namecate.labletype==1 || namecate.labletype==2 || namecate.labletype==3 || namecate.labletype==4 || namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==8 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==13 || namecate.labletype==14 || namecate.labletype==15"> </th>
                                             <th class="table-width-6" ng-if="namecate.labletype==1 || namecate.labletype==2 || namecate.labletype==3 || namecate.labletype==4 || namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==8 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==13 || namecate.labletype==14 || namecate.labletype==15"> </th>
                                             <th class="table-width-6" ng-if="namecate.labletype==8" style="display:none;"> </th>
                                             <th class="table-width-6" ng-if="namecate.labletype==8"> </th>
                                             <th class="table-width-6" ng-if="namecate.labletype==5 || namecate.labletype==6"> </th>    
                                              <th class="table-width-6" ng-if="namecate.labletype==4 || namecate.labletype==16 || namecate.labletype==19 || namecate.categories_id==592"> </th>   
                                             <th ng-if="namecate.labletype==1"><b style="font-size:12px;"></b></th>
                                             <th ng-if="namecate.labletype!=9" ><b style="font-size:12px;" id="nostot_{{namecate.type}}">{{namecate.nos_total}}</b></th>
                                             <th ng-if="namecate.labletype==1 || namecate.labletype==2 || namecate.labletype==3 || namecate.labletype==4 || namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==8 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==13 || namecate.labletype==14"><b style="font-size:12px;" >{{namecate.fact_total}}</b></th>
                                            <th ><b style="font-size:12px;" ></b></th>
                                            
                                             <th><b style="font-size:12px;" id="fullqty_{{namecate.type}}">{{namecate.qty_total}}</b></th>
                                             <th ng-if="gst_check==1"></th>
                                             <th><b style="font-size:12px;" id="fulltotal_{{namecate.type}}">{{namecate.amount_total}} </b></th>
                                             
 
                                          </tr>
                                       </tfoot>
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
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
</div>






 <script type='text/javascript' >
    $( function() {
        
        
        
        
        
        
        
        
        
        
              
        
        
        
        
        
        
        $('#call_status').on('change',function(){
            
            var data=$(this).val();
            
            if(data=='Call Back')
            {
                $('#showdate').show();
            }
            else
            {
                $('#showdate').hide();
            }
            
        });
        
        
        
        $('#save').on('click',function(){
            
            $('#firstmodal').modal('toggle');
            
        });
        
        
        $('#imagechange').on('click',function(){
            
            $('#showdraw').toggle();
            
        });
        
  
       $('#setbg1').on('click',function(){
            
             $('#setbg1').addClass('btn btn-danger');
             $('#setbg2').removeClass('btn btn-danger');
             $('#setbg1').removeClass('btn btn-outline-danger');
             $('#setbg2').addClass('btn btn-outline-danger');
            
        });
        
        
        $('#setbg2').on('click',function(){
            
             $('#setbg2').addClass('btn btn-danger');
             $('#setbg1').removeClass('btn btn-danger');
             $('#setbg2').removeClass('btn btn-outline-danger');
             $('#setbg1').addClass('btn btn-outline-danger');
            
        });
        

        
       
    });

   

</script>
    




<script>

$(document).ready(function(){
    
    
    
    
    
    
    
    
    
    
    
    $('.onclick').on('click',function(){
        
     var  val=  $(this).data('value'); 
     
     
     if(val=='Accesories1')
     {
          $('#autocomplete').attr("placeholder", "Product/Length/Nos");
     }
     if(val=='Accesories2')
     {
          $('#autocomplete').attr("placeholder", "Product/Height/Length/Nos");
     }
     if(val=='Accesories3')
     {
          $('#autocomplete').attr("placeholder", "Product/Length/Nos");
     }
     
      if(val=='Iron And Steel Gar Sheet-zaron')
     {
          $('#autocomplete').attr("placeholder", "Product/Profile/Crimp/Nos");
     }
     
     
      if(val=='Arch')
     {
          $('#autocomplete').attr("placeholder", "Product/Crimp/Nos");
     }
      if(val=='Decking sheet')
     {
          $('#autocomplete').attr("placeholder", "Product/Length/Nos");
     }
     
     if(val=='Tile sheet')
     {
          $('#tielview').show();
          $('#normalview').hide();
     }
     else
     {
         $('#tielview').hide();
         $('#normalview').show();
     }
    
    
     if(val=='Purlin')
     {
          $('#autocomplete').attr("placeholder", "Product/Length/Nos");
     }
      if(val=='Aluminium')
     {
          $('#autocomplete').attr("placeholder", "Product/Length/Crimp/Nos");
     }
      if(val=='Screw accesories')
     {
          $('#autocomplete').attr("placeholder", "Product/Nos");
     }
    
       
    });
    
    
    
   $("#autocomplete").focus();
  
    
  $(".closeaddon").click(function(){
    $('.right-bar').css("right", "-395px");
    $('.right-bar-2').css("right", "-395px");
  });
  
  
  
  $("#delivery_mode").on('change',function(){
    var val= $(this).val();
    
    if(val=='full')
    {
       $('.normal').show();
       $('.paricel').hide();
    }
    else 
    {
         $('.normal').hide();
       $('.paricel').show();
    }
   
    
    
  });
  
  
    $('input:radio[name="orderbase"]').change(function(){
   
   
  
        if ($(this).is(':checked') && $(this).val() == '1') {
             $('#exitinforderview').show();
             $('#currentorderview').hide();
        }
        else
        {
             $('#exitinforderview').hide();
             $('#currentorderview').show();
        }
    });


  
   $("#clikcustomerbox").click(function(){
    $('#showcustomeredit').toggle();
  });
  
  
   $("#addressclick").click(function(){
    $('#addaddress').toggle();
    
  });
  
  
  
});



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
    
    
    
    
    
   
    
    
    
  
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/customer_search_full",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

          $scope.availableTags = data;
     
    });
   
    
    
    
    $scope.completeCustomer=function(){
    $( "#autocomplete_customer" ).autocomplete({
      source: $scope.availableTags
    });
    } 
    
    
    
  
    
    
        
    $scope.oninputstatus=function(){
        
        
            var input=$('#number').val();
            $('#appendTwobox .twoBoxInput').empty();
            if(input!="")
            {
                
            $('#show_details').before(data);
            
            for (let i = 0; i < input; i++) {
                
             var datalt=  (i+10).toString(36);
                
            // var data='<div class="col-md-4 twoBoxInput" > <label style="text-transform: uppercase;">'+datalt+'</label> <div class="d-flex small-input-group"> <div class="form-floating form-floating-custom small-input-float mb-4"> <input type="text" class="form-control p-2 label1 totalget" id="input-email" > <div class="invalid-feedback"> Please Enter Email </div> <label for="input-email" style="left:0">Size</label> </div> <div class="form-floating form-floating-custom small-input-float mb-4"> <input type="text" class="form-control p-2 label2" id="input-email" > <div class="invalid-feedback"> Please Enter Email </div> <label for="input-email" style="left:0">Deg</label> </div> </div> </div>';
            
            
            var data='<div class="row twoBoxInput"> <div class="col-md-6"> <div class="form-group row"> <div class="col-sm-12"> <input class="form-control label1" placeholder="Size" name="label1[]" type="text"> </div> </div> </div>    <div class="col-md-6"> <div class="form-group row"> <div class="col-sm-12"> <input class="form-control degree" placeholder="Degree" name="degree[]" type="text"> </div> </div> </div> </div>';
            
             $('#show_details').append(data);
             
             
             
             
             
            }
            
            
            
            
            
            
            }
            
            
            
            
            
                $(".totalget").on('input',function(){
                 
                                                                                      var sum = 0
                                                                                      $('.totalget').each(function () {
                                                                                             
                                                                                                    
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
                 
                                                                                      $('#sizetotal').html('Size Total : '+sum);
                 
                });
        
    
    } 
    
    
    
    
    
    
    
    
    
     $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchproduct_full",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){

          $scope.availableProducts = data;
     
      });
      
      
        $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchproduct_full_tile_products",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){

          $scope.availableProducts3 = data;
     
      });
      
   
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchproduct_full2",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){

          $scope.availableProducts2 = data;
     
      });
   
   
   $scope.mmt = 0;
     $scope.mmt1 = 0;
    
    
    $scope.completeProduct=function(){
    $( "#autocomplete" ).autocomplete({
      source: $scope.availableProducts
    });
    } 
    
    
    
      $scope.completeProductNa=function(){
        $( "#autocomplete3" ).autocomplete({
          source: $scope.availableProducts3
        });
     } 
    
    
    
    $scope.completeProduct2=function(id){
    $( "#product_name_"+id ).autocomplete({
      source: $scope.availableProducts2
    });
    } 
    
    
    
    $scope.completeProductSUb=function(id){
    $( "#tile_material_name_"+id ).autocomplete({
      source: $scope.availableProductssub
    });
    } 
    
    
   $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchproduct_full2_basecaetgary",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){

          $scope.availableProductssub = data;
     
      });
    
    
     $scope.productMM = function (id,convert) {
    
    
    
   
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/order/fetchproduct_fullmm",
          data:{'action':'fetch_single_data','id':id,'convert':convert,'tablename_sub':'<?php echo $tablename_sub; ?>'}
          }).success(function(data){
    
              $scope.availableProductsmm = data;
         
          });
          
      
     }

    
    
    
  $scope.success = false;
  $scope.error = false;



     $scope.submit_button = 'Create';
     $scope.defaultvalue = '(MTR)';
     
      $scope.backcripm = 'Yes';
     
     
     
     
     
     
$scope.imageuploadInproduct = function(){
              
              
                               
                              var product_id=$('#order_product_id_base_define').val();
                              
                              $('#uploadbutton').html('Loading..');
              
                              var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file[]', file);  
                               });  
                               $http.post('<?php echo base_url() ?>index.php/products/fileuplaodimgsave?id='+product_id, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                 $scope.imgpreviewimages(product_id);
                                 
                                  $('#uploadbutton').html('Upload');
                                   
                                    
                               });  

     
 };
       
       
       
       
       

  $scope.submitCallBack = function(){


      



 $('#savecallback').html('Loading...');
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/callbacksave",
      data:{'audiolink':$scope.audiolink,'remarks':$scope.remarks,'call_status':$scope.call_status,'call_back_date':$scope.call_back_date,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','tablenamemain':'<?php echo $tablename; ?>'}
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


            
            $scope.success = true;
            $('#savecallback').html('Save');
            $scope.fetchCustomerorcallbackhistroy();
            $scope.error = false;
            $scope.title = "";
            $scope.message = "";
            $scope.audiolink = "";
            $scope.remarks = "";
            $scope.attachment = "";
            $scope.successMessage = data.massage;





           
                              
                               var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file', file);  
                               });  
                               $http.post('<?php echo base_url() ?>index.php/order/fileuplaod?id='+data.insert_id, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                    $scope.select();  
                                    
                                   
                                    
                               });  


          

          }

          

      }

       
    });
  };
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
 $scope.fetchCustomerdetails = function () {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerdetails_view_order",
      data:{'id':'<?php echo $order_id; ?>','tablename':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){
        
        
   

            $scope.customernamefinal = data.name;
            $scope.routenamefinal= data.route_name;
            $scope.address = data.address;
            $scope.orderno = data.order_no;
            $scope.customerphonefinal = data.phone;
            $scope.starttime = data.create_date;
            
            $scope.payment_mode = data.payment_mode;
            $scope.deliverystatus = data.delivery_status;
            
            
            
            
            $('#cashmode').val(data.payment_mode);
            
            
            
            
            $('input[name="formRadios"]').each(function(e){
                if($(this).val() == data.delivery_status){
                    $(this).attr("checked", "checked");
                }
            });
            
            
            
           
            
            if(data.delivery_mode!=null)
            {
                $('#delivery_mode').val(data.delivery_mode);
            }
            
            
            
            $scope.delivery_status_name = data.delivery_status_name;
            
            $scope.delivery_charge = data.delivery_charge;
            $scope.totalamount = data.totalamount;
            $scope.map = data.map;

    });



}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

 
 // column to sort
 $scope.column = 'sno';
 
 // sort ordering (Ascending or Descending). Set true for desending
 $scope.reverse = false; 
 
 // called on header click
 $scope.sortColumn = function(col){
  $scope.column = col;
  if($scope.reverse){
   $scope.reverse = false;
   $scope.reverseclass = 'arrow-up';
  }else{
   $scope.reverse = true;
   $scope.reverseclass = 'arrow-down';
  }
 };
 
 // remove and change class
 $scope.sortClass = function(col){
  if($scope.column == col ){
   if($scope.reverse){
    //return 'arrow-down'; 
   }else{
    //return 'arrow-up';
   }
  }else{
   return '';
  }
 } 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


               $scope.addon = function(id) {
                        $('.right-bar').css("right", "0px");
                        
                        
                         $scope.titleView = "Add Customer";
                         $scope.titleButton = "";
                         
                         $scope.mode = "1";
                        
                        
               }
               
               
               
               
               
            
               
               
               
               
                $scope.editcustomre = function(id) {
                        $('#showcustomeredit').toggle();
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

$scope.inputmodeifiy_qty = function (id,inputname) {
    
                               var fieds=inputname+'_'+id;
                               var values=parseFloat($('#'+fieds).val());
                              
                               var rate=parseFloat($('#modify_rate_'+id).text());
                               var Total=rate*values;
                               var Total=Total.toFixed(3);
                               
                               $('#modify_amount_'+id).text('Rs.'+ Total);
                          
                                $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                                data:{'id':id,'qty':values, 'action':'qtymodifiy','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                 }).success(function(data){
                           
                            
                                }); 
    
}
 
$scope.getproductbasefact = function () {
     
         var convert=$('input[name="checkboxformula"]:checked').val();
         
         
         var product_name=$('#autocomplete3').val();
         
        $scope.productMMbaseproduct(product_name,convert);
         
    
}
$scope.changeConvert = function () {
    
     var convert=$('input[name="checkboxformula"]:checked').val();
     var product_name=$('#autocomplete3').val();
     $scope.productMMbaseproduct(product_name,convert);
    
}


 $scope.productMMbaseproduct = function (id,convert) {
    
    
    
   
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/order/fetchproduct_fullmm_val",
          data:{'action':'fetch_single_data','id':id,'convert':convert,'tablename_sub':'<?php echo $tablename_sub; ?>'}
          }).success(function(data){
    
              $scope.availableProductsmmval = data;
         
          });
          
      
     }




$scope.inputsave_1 = function (id,inputname,categories_id,type) {


                     
                     
                     
                     
                          var fieds=inputname+'_'+id;
                          var values=$('#'+fieds).val();
                          
                         
                        
                         
                          var cul=$('#cal_'+categories_id+type).val();
                          var uom=$('#uom_'+id).val();
                          var profile= parseFloat($('#profile_'+id).val());
                          
                          
                          
                          if(uom==3)
                          {
                              
                          
                          
                                       if(categories_id=='26')
                                       {
                                           var values=$('#profilesst_'+id).val();
                                           var inputname='profile';
                                           var profile=values;
                                       }
                                       
                                       
                                         if(inputname=='profilesst')
                                       {
                                           var values=$('#profilesst_'+id).val();
                                           var inputname='profile';
                                           var profile=values;
                                       }
                           
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
                                      
                                      
                                      
                                      var profile= parseFloat(profile/3.281);
                                      var profile=profile.toFixed(3);
                                       
                                      
                              
                          }
                         
                          if(uom==4)
                          {
                              
                                       if(type==0)
                                       {
                                         var profile= parseFloat(profile)+parseFloat(crimp); 
                                         
                                       }
                                       if(type==8)
                                       {
                                                 var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                                       
                              
                                         var profile= parseFloat(profile/1000);
                                         var profile=profile.toFixed(3);
                              
                              
                              
                              
                          }
                          if(uom==5)
                          {
                              
                                       if(type==0)
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
                                       if(type==8)
                                       {
                                                 var profile= parseFloat(profile)+parseFloat(crimp); 
                                       }
                              
                                       var profile= parseFloat(profile/39.37);
                                       var profile=profile.toFixed(3);
                              
                              
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
                               
                                          if(uom==3)
                                          {
                                              
                                              
                                                     
                                                      var crimp= parseFloat(crimp/3.281);
                                                      var crimp=crimp.toFixed(3);
                                                      
                                                      
                                              
                                          }
                                         
                                          if(uom==4)
                                          {
                                               var crimp= parseFloat(crimp/1000);
                                               var crimp=crimp.toFixed(3);
                                              
                                              
                                              
                                              
                                          }
                                          if(uom==5)
                                          {
                                              var crimp= parseFloat($('#crimp_'+id).val());
                                              
                                              
                                              
                                              
                                          }
                                          if(uom==6)
                                          {
                                              var crimp= parseFloat(crimp/39.37);
                                              var crimp=crimp.toFixed(3);
                                              
                                              
                                          }
                                     
                               
                               
                             
                               
                               var sqt_qty=profile*nos*crimp;
                               
                               
                               
                               var sqt_qty=sqt_qty.toFixed(3);
                               
                              
                           }
                             
                           if(type==3)
                           {
                                var sqt_qty=nos;
                                var sqt_qty=sqt_qty.toFixed(3);
                           }
                           
                           
                            if(type==9)
                           {
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
                               
                                var sqt_qty=profile*fact*nos;
                                var sqt_qty=sqt_qty.toFixed(3);
                                
                                
                                if(crimp!=0)
                                {
                                     var rate=rate+15;
                                }
                              
                                $('#rate_'+id).val(rate);
                              
                           }
                           
                           if(type==7)
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
                           
                           
                           
                     
                         
                         
                      
                      
                      
                      
                      
                      
                     
                      $('#qty_'+id).html(sqt_qty+' <span class="td-info-icons td-qty-info"><i class="fas fa-info-circle"></i></span>');
                      var total=Math.round(rate*sqt_qty);
                      $('#amount_'+id).html(total);
                      
                      
                      
                      
                      
                      
                      
                      
                       var nostotsum = 0;
                        $('.nos_'+type).each(function(){
                            nostotsum += parseFloat($(this).val());  
                        });
                        var nostotsumtot=nostotsum.toFixed(2);
                        $('#nostot_'+type).html(nostotsumtot);
                        
                        
                        
                        
                      
                      
                      
                        var cattotsum = 0;
                        $('.amounttot_'+type).each(function(){
                            cattotsum += parseFloat($(this).text());  
                        });
                        var alltotalcat=cattotsum.toFixed(2);
                        $('#fulltotal_'+type).html(alltotalcat);
                        
                        
                        
                        
                        var cattotsumqty = 0;
                        $('.qtyfind_'+type).each(function(){
                            cattotsumqty += parseFloat($(this).text());  
                        });
                        var alltotalcatqty=cattotsumqty.toFixed(2);
                        $('#fullqty_'+type).html(alltotalcatqty);
                      
                    
                      
                      
                      
            
                       $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
                          data:{'inputname':inputname,'values':values,'ratechange':ratechange,'factchange':factchange,'id':id,'action':'InputUpdate','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                        }).success(function(data){
                    
                          if(data.error != '1')
                          {
                              
                              
                                  $scope.fetchSingleDatatotal('1');
                              
                               
                          }
                             
                       });
                       
           
           
  

      

}







$scope.inputsavecal_1 = function (id,uom,inputname,categories_id,type) {


                     
                     
                         
                     
                          var fieds=inputname+'_'+id;
                          var values=$('#'+fieds).val();
                          
                          
                        
                         
                         
                      
                          var crimp= parseFloat($('#crimpss_'+id).val());
                          var profile= parseFloat($('#profiless_'+id).val());
                          var uom= parseFloat($('#uomss_'+id).val());
                          
                         
                         if(categories_id==26)
                         {  
                             
                              var uomsss= parseFloat($('#uom_'+id).val());
                            
                             if(uomsss==3)
                             {
                                  $('#profilesst_'+id).show();
                                  $('#profile_'+id).hide();
                                  
                             }
                             
                             if(uomsss==4)
                             {
                                   $('#profilesst_'+id).hide();
                                   $('#profile_'+id).show();
                                 
                                  
                             }
                             
                         }
                        
                            
                         
                         
                         if(uom==3)
                         {
                             
                         
                         
                                      if(values==3)
                                      {
                                         var profile= parseFloat($('#profiless_'+id).val());
                                         var crimp= parseFloat($('#crimpss_'+id).val());
                                      }
                                      
                                      if(values==4)
                                      {
                                          var profile= parseFloat(profile*304.8);
                                          var profile=Math.round(profile);
                                          
                                          var crimp= parseFloat(crimp*304.8);
                                          var crimp=crimp.toFixed(3);
                                          
                                       
                                          if(categories_id==26)
                                          { 
                                             $('#profile_'+id).val(profile);
                                          }
                                          
                                         
                                      }
                                      if(values==5)
                                      {
                                          var profile= parseFloat(profile/3.281);
                                          var profile=profile.toFixed(3);
                                          
                                          
                                           var crimp= parseFloat(crimp/3.281);
                                           var crimp=crimp.toFixed(3);
                                          
                                         
                                      }
                                      if(values==6)
                                      {
                                          var profile= parseFloat(profile*12);
                                          var profile=profile.toFixed(3);
                                          
                                           var crimp= parseFloat(crimp*12);
                                           var crimp=crimp.toFixed(3);
                                         
                                      }
                          
                          
                         }
                         
                          
                          
                          
                          if(uom==4)
                         {
                             
                         
                        
                                      if(values==4)
                                      {
                                         var profile= parseFloat($('#profiless_'+id).val());
                                         var crimp= parseFloat($('#crimpss_'+id).val());
                                      }
                                      
                                      if(values==3)
                                      {
                                          var profile= parseFloat(profile/304.8);
                                          var profile=profile.toFixed(3);
                                          var crimp= parseFloat(crimp/304.8);
                                          var crimp=crimp.toFixed(3);
                                          
                                          if(categories_id==26)
                                          { 
                                              $('#profilesst_'+id).val(profile);
                                          }
                                          
                                      }
                                      if(values==5)
                                      {
                                          var profile= parseFloat(profile/1000);
                                          var profile=profile.toFixed(3);
                                          
                                          var crimp= parseFloat(crimp/1000);
                                          var crimp=crimp.toFixed(3);
                                      }
                                      if(values==6)
                                      {
                                          var profile= parseFloat(profile/25.4);
                                          var profile=profile.toFixed(3);
                                          
                                          var crimp= parseFloat(crimp/25.4);
                                          var crimp=crimp.toFixed(3);
                                        
                                      }
                          
                          
                         }
                         
                         
                         
                          if(uom==5)
                         {
                             
                         
                         
                                      if(values==5)
                                      {
                                         var profile= parseFloat($('#profiless_'+id).val());
                                         var crimp= parseFloat($('#crimpss_'+id).val());
                                      }
                                      
                                      if(values==3)
                                      {
                                          var profile= parseFloat(profile*3.281);
                                          var profile=profile.toFixed(3);
                                          var crimp= parseFloat(crimp*3.281);
                                          var crimp=crimp.toFixed(3);
                                      }
                                      if(values==4)
                                      {
                                          var profile= parseFloat(profile*1000);
                                          var profile=profile.toFixed(3);
                                          
                                          var crimp= parseFloat(crimp*1000);
                                          var crimp=crimp.toFixed(3);
                                      }
                                      if(values==6)
                                      {
                                          var profile= parseFloat(profile*39.37);
                                          var profile=profile.toFixed(3);
                                          
                                          var crimp= parseFloat(crimp*39.37);
                                          var crimp=crimp.toFixed(3);
                                        
                                      }
                          
                          
                         }
                         
                         
                          if(uom==6)
                         {
                             
                         
                         
                                      if(values==6)
                                      {
                                         var profile= parseFloat($('#profiless_'+id).val());
                                         var crimp= parseFloat($('#crimpss_'+id).val());
                                      }
                                      
                                      if(values==3)
                                      {
                                          var profile= parseFloat(profile/12);
                                          var profile=profile.toFixed(1);
                                          var crimp= parseFloat(crimp/12);
                                          var crimp=crimp.toFixed(3);
                                      }
                                      if(values==4)
                                      {
                                          var profile= parseFloat(profile*25.4);
                                          var profile=profile.toFixed(3);
                                          
                                          var crimp= parseFloat(crimp*25.4);
                                          var crimp=crimp.toFixed(3);
                                      }
                                      if(values==5)
                                      {
                                          var profile= parseFloat(profile/39.37);
                                          var profile=profile.toFixed(3);
                                          
                                          var crimp= parseFloat(crimp/39.37);
                                          var crimp=crimp.toFixed(3);
                                        
                                      }
                          
                          
                         }
                          
                          
                       
                         
                         
                         
                         
                         if(type==2)
                         {
                             $('#crimp_'+id).val(crimp);
                             var profile= parseFloat($('#profiless_'+id).val());
                         }
                         else
                         {
                               $('#crimp_'+id).val(crimp);
                               $('#profile_'+id).val(profile);
                         }
                         
                       
                         
                         
                         
                         $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
                          data:{'profile':profile,'crimp':crimp,'values':values,'id':id,'action':'actioncalculation','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                         }).success(function(data){
                    
                          if(data.error != '1')
                          {
                              
                               
                          }
                             
                       });
                       
       
  

      

}











$scope.saveDetails = function (event) {



if(event.keyCode==13)
{

         
         var checkboxformula=$('input[name="checkboxformula"]:checked').val();
         
         
         
        
         
         
         

    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
      data:{'product_id':$scope.product_id,'checkboxformula':checkboxformula,'profile':$scope.profile,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {

        
      
        $scope.profile = "";
        $scope.fetchDataCategorybase(1);
        $scope.fetchData('1');
        $scope.fetchSingleDatatotal('1');


      }

    });

}



}






$scope.saveDetails2 = function (event) {



if(event.keyCode==13)
{

         
         var checkboxformula=$('input[name="checkboxformula"]:checked').val();
         
         
         
        var product_name=$('#autocomplete3').val();
        var fact=$('#mmfact').val();
        
        
        var nos=$('#nnom').val();
        var profile=product_name+'/'+fact+'/'+nos;
        
        
        
        

    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
      data:{'product_id':$scope.product_id,'checkboxformula':checkboxformula,'profile':profile,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {

        
      
        $scope.profile = "";
        $scope.fetchDataCategorybase(1);
        $scope.fetchData('1');
        $scope.fetchSingleDatatotal('1');
        
        
        $('#autocomplete3').val('');
        $('#mmfact').val('');
        $('#nnom').val('');


      }

    });
         
      

}



}




$scope.savecommissionval = function () {





         $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
        data:{'commissionval':$scope.commissionval,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','action':'Commission','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
        }).success(function(data){
    
             
           location.reload();

    
    
    
        });




}


$scope.deliveryChareg = function () {

        
        
         $scope.fetchDataget();
         $scope.fetchSingleDatatotaldel('1');
        
        var deliverystatus=$('input[name="formRadios"]:checked').val();
        var delivery_charge=$('#delivery_charge').val();
        
         var delivery_mode=$('#delivery_mode').val();
         var cashmode=$('#cashmode').val();

        $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
        data:{'payment_mode':cashmode,'delivery_mode':delivery_mode,'deliverystatus':deliverystatus,'delivery_charge':delivery_charge,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','action':'deliverystatus','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
        }).success(function(data){
            
            
            $scope.fetchCustomerdetails();
    
        });


}









$scope.saveCustomer = function (event) {


if(event.keyCode==13)
{
  
  
  var autocomplete_customer=$('#autocomplete_customer').val();
 

 if(autocomplete_customer!="")
 {
     



    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/customerupdate?order_id=<?php echo $order_id; ?>",
      data:{'customer':autocomplete_customer,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {

         $('#showcustomeredit').hide();
         $scope.customer = "";
         
         $('#autocomplete_customer').val('');
           
         $scope.fetchCustomerorderdata();
         $scope.fetchCustomerorderdelevieryaddress();
         $scope.fetchCustomerorcallbackhistroy();
         
         
         $scope.fetchCustomerororderhistroy('orders');
         $scope.fetchCustomerororderhistroy_qq('orders_quotation');
         $scope.fetchCustomerororderhistroy_oo('orders_process');
                 
                 
         

      }

    });
    
    
 }
 else
 {
     alert('Please fill Customer');
 }
    

}



}




$scope.saveSales = function (event) {



 


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/salesteam?order_id=<?php echo $order_id; ?>",
      data:{'user_id':$scope.user_id,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {

        
     
           
        $scope.fetchSingleDatatotal('1');

      }

    });
    
    





}



$scope.saveReason = function (event) {


 var reasonset=$('.reasonset').val();


if(reasonset)
{
    


 if(reasonset==1)
 {
     
            <?php 
            
            if($status_base=='1')
            {
                ?>
                
                
                 $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order/order_quotation_request",
                  data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','status':'3','deleteid':'3','movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                 }).success(function(data){
                     
                      alert('Order Moved');  
                      $scope.fetchCustomerorderdata();
                      $scope.fetchSingleDatatotal('1');
                      $scope.fetchCustomerorderdelevieryaddress();
                      $scope.fetchCustomerorcallbackhistroy();
                     
                });
                
                
                <?php
            }
            else
            {
                ?>
                
                
                   $http({
                      method:"POST",
                      url:"<?php echo base_url() ?>index.php/order/order_quotation_move",
                      data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':'0','movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                     }).success(function(data){
                        
                     alert('Order Moved');      
                     $scope.fetchCustomerorderdata();
                     $scope.fetchSingleDatatotal('1');
                     $scope.fetchCustomerorderdelevieryaddress();
                     $scope.fetchCustomerorcallbackhistroy();
                       
                    });
            
            
                
                <?php
            } ?>
            
      
           
        
     
     
 }
 else if($scope.reason==5)
 {
     
     
     
     
     
     
     
         $('#competitorprice').modal('toggle');
     
     
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/order/savereason?order_id=<?php echo $order_id; ?>",
          data:{'reason':reasonset,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','movetablename':'<?php echo $movetablename; ?>','old_tablename':'<?php echo $old_tablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
         }).success(function(data){
    
          if(data.error != '1')
          {
    
            
             $scope.fetchSingleDatatotal('1');
             $scope.fetchCustomerorderdata();
             $scope.fetchCustomerorderdelevieryaddress();
             $scope.fetchCustomerorcallbackhistroy();
            
            
    
          }
    
        });
        
     
     
     
 }
 else
 {
     
     
     
     
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/order/savereason?order_id=<?php echo $order_id; ?>",
          data:{'reason':reasonset,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','movetablename':'<?php echo $movetablename; ?>','old_tablename':'<?php echo $old_tablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
        }).success(function(data){
    
          if(data.error != '1')
          {
    
            
         
             alert('Reason updated');   
             $scope.fetchSingleDatatotal('1');
             $scope.fetchCustomerorderdata();
             $scope.fetchCustomerorderdelevieryaddress();
             $scope.fetchCustomerorcallbackhistroy();
            
            
    
          }
    
        });
        
     
     
     
     
 }


 
    
    
    
    
    
    
    
    
} 





}

































$scope.saveRemarks = function (fieldset) {


               if(fieldset)
                {
                    
                    
                        var  order_product_id=$('#product_id_base_define').val();
                        var  fieldsetval=$('.'+fieldset).val();
                           
                        
                       $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/order/saveRemarks?order_id=<?php echo $order_id; ?>",
                          data:{'fieldset':fieldset,'fieldsetval':fieldsetval,'order_product_id':order_product_id,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','movetablename':'<?php echo $movetablename; ?>','old_tablename':'<?php echo $old_tablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                          }).success(function(data){
                    
                          
                    
                         });
                        
                
                    
                } 



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
           
        $scope.fetchSingleDatatotal('1');

      }

    });
    
    
 }
 else
 {
     alert('Please input discount value');
 }
    

//}



}




  $scope.fetchDatacalulation = function(id,type,convert){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_calculation?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&convert='+convert+'&type='+type+'&cid='+id).success(function(data){
      
      
      $scope.namesData = data;
      
      
      
    });
    
   
  
   
  };
  





  $scope.fetchDataget = function(id){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_get?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&convert='+id).success(function(data){
      
      
      $scope.namesDatadel = data;
      
      
      
    });
    
   
  
   
  };
  


  $scope.fetchData = function(id){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&convert='+id).success(function(data){
      
      
      $scope.namesData = data;
      
      
      
    });
    
   
  
   
  };
  
  
  
  
  
  
  
  
  
  
  
  
  
  $scope.fetchDataCategorybase = function(id){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetchDataCategorybase?order_id=<?php echo $order_id; ?>&tablename_sub=<?php echo $tablename_sub; ?>&convert='+id).success(function(data){
      
      
      
      
      $scope.namesDatacate = data;
      
      
      
      
      
      
      
      
    });
    
   
  
   
  };

  
  $scope.markDeliveryaddress = function()
  {
      
       $scope.fetchDataget();
       $scope.fetchSingleDatatotaldel('1');
      
      var delivery_mode= $('#delivery_mode').val();
      if(delivery_mode=='full')
      {
              
              var partial = 0;
              var address_set = $(".address_set option:selected");
              var address_set_value = [];
              var order_product_id_set_value = [];
              for(var i = 0; i < address_set.length; i++){
                  
                   address_set_value.push(0);
                   order_product_id_set_value.push($(address_set[i]).data('id'));
                 
              }
              var address_id= address_set_value.join("|");
              var order_product_id= order_product_id_set_value.join("|");
              
      
          
      }
      else
      {
          
               var partial = 1;
               
              
              var address_set = $(".address_set option:selected");
              var address_set_value = [];
              var order_product_id_set_value = [];
              for(var i = 0; i < address_set.length; i++){
                  
                   address_set_value.push($(address_set[i]).data('value'));
                   order_product_id_set_value.push($(address_set[i]).data('id'));
                 
              }
              var address_id= address_set_value.join("|");
              var order_product_id= order_product_id_set_value.join("|");
              
              
            
              
              
              var spiltparicel = $(".spiltparicel");
               var order_product_id_set_value = [];
               for(var i = 0; i < spiltparicel.length; i++){
                  
                  if($(spiltparicel[i]).is(':checked')) {
                     order_product_id_set_value.push($(spiltparicel[i]).val());
                  }
                  else
                  {
                    order_product_id_set_value.push(0);
                  }
                 
               }
            
               var order_product_id= order_product_id_set_value.join("|");
      
       
          
      }
      
      
    
     
        $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'delivery_mode':delivery_mode,'id':order_product_id,'address_id':address_id,'order_id':'<?php echo $order_id; ?>','partial':partial, 'action':'markDeliveryaddress','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
        }).success(function(data){
        
         $scope.fetchInvoiceloop();
         
      }); 
       
       
       
  
  };
  
  

 $scope.fetchInvoiceloop = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchInvoiceloop?order_id=<?php echo $order_id; ?>",
      data:{'action':'fetch_single_data','id':'<?php echo $order_id; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

          $scope.fetchInvoiceloopval = data;
     
    });
};



 
$scope.fetchSingleDatatotal = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_total?order_id=<?php echo $order_id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>','convert':id}
      }).success(function(data){

       $scope.fulltotal = data.fulltotal;
       
       $scope.commission = data.commission;
       if(!data.order_no_id)
       {
              $scope.order_no_id = '<?php echo $order_no; ?>';
              $scope.order_no_new = '<?php echo $order_no; ?>';
              $scope.order_no_new_old = '<?php echo $order_no; ?>';
       }
       else
       {
              $scope.order_no_id = data.order_no_id;
              $scope.order_no_new = data.order_no_id;
              $scope.order_no_new_old = data.order_no_id;
          
       }
       
       if(!data.create_date)
       {
             $scope.create_date = '<?php echo date('d/m/Y'); ?>';
       }
       else
       {
           $scope.create_date = data.create_date;
          
       }
       
       if(!data.create_time)
       {
             $scope.create_time = '<?php echo date('h:i A'); ?>';
       }
       else
       {
           $scope.create_time = data.create_time;
          
       }
       
       if(data.user_id)
       {
            $scope.user_id = data.user_id;
       }
       if(data.reason)
       {
            $scope.reason = data.reason;
       }
       
       $scope.paricel_mode = data.paricel_mode;
       
       
       
        if(data.salesphone)
       {
            $scope.salesphone = data.salesphone;
       }
       if(data.salesphone2)
       {
            $scope.salesphone = data.salesphone2;
       }
       
       if(data.salesname)
       {
            $scope.salesname = data.salesname;
       }
       
       
        
       $scope.totalitems = data.totalitems;
       $scope.discounttotal = data.discount;
        $scope.gsttotal = data.gsttotal;
       $scope.discountfulltotal = data.discountfulltotal;
       $scope.Meter_to_Sqr_feet = data.Meter_to_Sqr_feet;
     
     
       $scope.fullqty = data.fullqty;
       $scope.FACT = data.FACT;
       $scope.UNIT = data.UNIT;
       $scope.NOS = data.NOS;
     
    });
};
















$scope.fetchSingleDatatotaldel = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_totaldel?order_id=<?php echo $order_id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>','convert':id}
      }).success(function(data){

       $scope.fulltotaldel = data.fulltotal;
       
       $scope.commissiondel = data.commission;
       
       
       $scope.paricel_mode_del = data.paricel_mode;
       
       
       if(data.paricel_mode==1)
       {
           $('#delivery_mode').val('Partial/Spilt');
          
           $('.paricel').show();
            $('.normal').hide();
       }
       
      
       $scope.totalitemsdel = data.totalitems;
       $scope.discounttotaldel = data.discount;
       $scope.discountfulltotaldel = data.discountfulltotal;
      
     
       $scope.fullqtydel = data.fullqty;
      
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
       
       
       $scope.locality_name = data.locality_name;
       $scope.customer_id = data.customer_id;
       
       $scope.credit_limit = data.credit_limit;
       $scope.fulltotal_usage = data.fulltotal_usage;
       $scope.credit_period = data.credit_period;
       
       $scope.ratings = data.ratings;
       $scope.useage = data.useage;
       $scope.approx_id = data.approx;
       
       
      
       
       $scope.order_base = data.order_base;
       $scope.finance_status = data.finance_status;
       
       if(data.finance_status==5)
       {
            $('#showorderbase').show();
       }
      
       
       $scope.commission_check = data.commission_check;
       $scope.gst_check = data.gst_check;
       
       
       $scope.competitorname = data.competitorname;
       $scope.details = data.details;
       
       $scope.delivery_address = data.delivery_address;
     
    });
};



$scope.fetchCustomerorderdelevieryaddress = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerorderdelevieryaddress?order_id=<?php echo $order_id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

          $scope.namesDataaddress = data;
     
    });
};






$scope.fetchCustomerorcallbackhistroy = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerorcallbackhistroy",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

          $scope.namesCallback = data;
     
    });
};




$scope.fetchCustomerororderhistroy = function(table){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroy",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablenamemain':table}
    }).success(function(data){

                $scope.namesHistory = data;
          
    });
};



$scope.fetchCustomerororderhistroy_qq = function(table){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroy",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablenamemain':table}
    }).success(function(data){

                $scope.namesHistoryqq = data;
          
    });
};



$scope.fetchCustomerororderhistroy_oo = function(table){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroy",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablenamemain':table}
    }).success(function(data){

                $scope.namesHistoryoo = data;
          
    });
};



$scope.fetchCustomerororderhistroyorderlist = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroyorderlist",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablenamemain':'orders_process','tablename_sub':'order_product_list_process'}
    }).success(function(data){

          $scope.namesHistoryorder = data;
          
         
    });
};





$scope.billing_options=1;
$scope.calulation =3;
$scope.calulationmm =4;
$scope.changeCalulation = function(id,type){
   
   var convert=$('#cal_'+id+type).val();
   $scope.fetchDatacalulation(id,type,convert);

};





$scope.changeCalulationINC = function(id,type){
   
    var convert=$('#cal_'+id+type).val();
    
    $scope.fetchDatacalulation(id,type,convert);

};




$scope.changeCalulationMM = function(id,type){
   
    var convert=$('#cal_'+id+type).val();
    $scope.productMM(15,convert);
    $scope.fetchDatacalulation(id,type,convert);
 
};




$scope.fetchpricelist = function(id){
    

    
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchpricelist?order_id=<?php echo $order_id; ?>",
      data:{'product_id':id}
    }).success(function(data){

          $scope.namesDataprice= data;
          
     
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
            $scope.fetchCustomerorderdelevieryaddress();
            $scope.fetchCustomerorcallbackhistroy();
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



$scope.submitFormaddress = function(){
      
      
      
 
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/customeradd_address",
      data:{'status':'1','google_map_link':$scope.google_map_link,'order_id':'<?php echo $order_id; ?>','phone':$scope.phone,'zone':$scope.zone,'locality':$scope.locality,'city':$scope.city,'state':$scope.state,'pincode':$scope.pincode,'landmark':$scope.landmark,'address1':$scope.address1,'address2':$scope.address2,'name':$scope.name,'id':$scope.hidden_id,'action':'Save','tablename':'customers','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
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
             
            $('#addaddress').hide(); 
             
            $scope.fetchCustomerorderdata();
            $scope.fetchCustomerorderdelevieryaddress();
            $scope.fetchCustomerorcallbackhistroy();
            
            
            $scope.success = true;
            $scope.error = false;
            $scope.name = "";
         
            $scope.phone = "";
            $scope.city = "";
            $scope.state = "";
            $scope.zone="";
            $scope.address1 = "";
            $scope.address2 = "";
            $scope.name = "";
            $scope.locality = "";
            $scope.sales_team_id="";
           
            $scope.google_map_link = "";
            $scope.gst = "";
            $scope.landline = "";
            $scope.landmark = "";

            $scope.pincode = "";


            $scope.successMessage = data.massage;
          

          }

          

      }

       
    });
  };
  
  
  
  
  
  
  
  
  $scope.submitCompetitor = function(){
      
  
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/saveCompetitor",
      data:{'order_id':'<?php echo $order_id; ?>','competitorname':$scope.competitorname,'details':$scope.details,'tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){
       
              $scope.successcc = true;
            
             
              $scope.competitorname = "";
              $scope.details = "";
              $scope.successMessage_c = 'Competitor Details Updated';

       
    });
  };
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  $scope.addprice = function(){
      
      
      
   var product_id= $('#product_id').val();
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/addprice",
      data:{'product_id':product_id,'name':$scope.cname,'price':$scope.cprice,'sqft':$scope.csqft}
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
             
           
            $scope.success = true;
            $scope.error = false;
            $scope.cname = "";
         
            $scope.cprice = "";
            $scope.csqft = "";
        
            $scope.fetchpricelist(product_id);

            $scope.successMessage = data.massage;
          

          }

          

      }

       
    });
  };
  
  
  
$scope.savebutton = 'Saved';

   
   
   
   
   
   
   
   
   
    $scope.checkVal = function(){
        
        
         var status=$('input[name="checkboxEl"]:checked').val();
         
         
           if($('input[name="checkboxEl"]').prop("checked") == true)
           {
                        var deleteid=0;
                        $('#firstmodal').modal('toggle');
                        $scope.savebutton = 'Saved';
            }
            else
            {
                 var deleteid=1;
                 $scope.savebutton = 'Save';
            }


          if(deleteid==0)
          {
              
          
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_move",
              data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
               
               
            
              $scope.fetchCustomerorderdata();
              $scope.fetchSingleDatatotal('1');
              
             var orderstatustable='<?php echo $tablename; ?>';
              
              if(orderstatustable=='orders')
              {
                  window.location.replace("<?php echo base_url(); ?>index.php/order/quotation_list");
              }
              
              
              
               
            });
            
            
          }
        
        
     
    }
    
    
    
    
    
    
    
    
    
    
    
    $scope.saveArchive = function(){
        
        
       
           

          if($scope.order_no_new!='')
          {
              
          
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_archive",
              data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no_new':$scope.order_no_new,'order_no_old':$scope.order_no_old,'movetablename_sub':'<?php echo $tablename_sub; ?>','movetablename':'<?php echo $tablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
               
               
               
               alert('Save To Archive');
                $('#archiveOpen').modal('toggle');
             
               
            });
            
            
          }
        
        
     
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    $scope.checkValRequiestpurchaseteam = function(orderstatus,namestatus){
        
        
         
                 
                        var deleteid=0;
                        $('#firstmodal').modal('toggle');
                        $scope.savebutton = 'Saved';
                       
                       
                       $http({
                       method:"POST",
                       url:"<?php echo base_url() ?>index.php/order/order_quotation_move_status",
                       data:{'status':'1','orderstatus':orderstatus,'namestatus':namestatus,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                       }).success(function(data){
                       
                       
                    
                        $scope.fetchCustomerorderdata();
                        $scope.fetchSingleDatatotal('1');
                       
                        });
                 
        
     
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     $scope.checkfinishVal = function(){
        
        
         var status=$('input[name="checkboxEl"]:checked').val();
         
         
            if($('input[name="checkboxEl"]').prop("checked") == true)
            {
                        var deleteid=0;
                        $('#firstmodal').modal('toggle');
                        $scope.savebutton = 'Saved';
            }
            else
            {
                         var deleteid=1;
                         $scope.savebutton = 'Save';
            }


       
              $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_move_finish",
              data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
              }).success(function(data){
               
               
            
                  $scope.fetchCustomerorderdata();
                  $scope.fetchSingleDatatotal('1');
                 
                  var orderstatustable='<?php echo $tablename; ?>';
                  
                  if(orderstatustable=='orders_quotation')
                  {
                      window.location.replace("<?php echo base_url(); ?>index.php/order/orders_list");
                  }
                 
                 
               
            });
        
        
     
    }
    
    
    
        
     $scope.checkfinishValfinish = function(){
        
        
         var deleteid=0;
          

       
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_move_finish_by_deilvered",
              data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
               
               
            $scope.fetchCustomerorderdata();
             $scope.fetchSingleDatatotal('1');  
               
            });
        
        
     
    }
    
    
    
    
     $scope.checkfinishValff = function(){
        
        
         var status=$('input[name="checkboxEl"]:checked').val();
         
         
           if($('input[name="checkboxEl"]').prop("checked") == true)
           {
                        var deleteid=0;
                        $('#firstmodal').modal('toggle');
                        $scope.savebutton = 'Saved';
            }
            else
            {
                 var deleteid=1;
                 $scope.savebutton = 'Save';
            }


       
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_move_finish_sh",
              data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
               
               
              $scope.fetchCustomerorderdata();
               $scope.fetchSingleDatatotal('1');
               
            });
        
        
     
    }
    
    
    
    
    
     $scope.checkValset = function(){
        
        
         var status=$('input[name="checkValset"]:checked').val();
         
         
            if($('input[name="checkValset"]').prop("checked") == true)
            {
                        var deleteid=3;
                        $('#firstmodal_price_request').modal('toggle');
            }
            else
            {
                        var deleteid=0;
                        $scope.savebutton = 'Save';
            }


       
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_price_request",
              data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
               
               
               $scope.fetchCustomerorderdata();
               $scope.fetchSingleDatatotal('1');
               
            });
        
        
     
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     $scope.showCompetitor = function(){
    
    
         $('#competitorpriceview').modal('toggle');
    
     }
    
    
     $scope.checkValCommission = function(){
        
        
        
         
         
           if($('input[name="checkboxcommision"]').prop("checked") == true){
                  
                 
                 
                 
                  var value=1
                  
                  $('#firstmodalcommison').modal('toggle');
                  
                  
                  
            }
            else
            {
                  var value=0
                  $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order/checkValCommission",
                  data:{'status':value,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                  }).success(function(data){
                    
                    location.reload();
                    
                   
                 });
                  
            }

            
            
            
            
        


           
        
     
    }
    
    
    
    
    
    
    
    
    
    
    
    
     $scope.archiveOpen = function(){
        
        
        
         
                  
                  $('#archiveOpen').modal('toggle');
            
            
        
        
     
    }
    
    
    
    
    
    
    
    
    
    
    
    $scope.checkValRequiest = function(){
        
        
             var status=$('input[name="checkapproved"]:checked').val();
             
             
           
         
         
            if($('input[name="checkapproved"]').prop("checked") == true){
               
                   var deleteid=3;
                   $('#firstmodal3').modal('toggle');
                   $scope.savebutton = 'Saved';
               
                
            }
            else
            {
                var deleteid=0;
                $scope.savebutton = 'Save';
            }


       
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_request",
              data:{'status':status,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
                
                
                
            });
        
        
     
    }















$scope.checkValRequiesttl = function(){
        
           
           
           
           $scope.fetchDataget();
           $scope.fetchSingleDatatotaldel('1');
             
           $('#imagesizemodel-delivery-setup').modal('toggle');
       
            
     
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
       
         $scope.fetchData('1');
         $scope.fetchSingleDatatotal('1');
         $scope.fetchDataCategorybase('1');
         
         
      }); 
    //}
};


$scope.appprox = function(st){
    //if(confirm("Are you sure you want to remove it?"))
    //{
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'action':'appprox','appprox_status':st,'tablenamemain':'<?php echo $tablename; ?>','order_id':'<?php echo $order_id; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){
       
         $scope.fetchData('1');
         $scope.fetchSingleDatatotal('1');
         $scope.fetchCustomerorderdata();
         
      }); 
    //}
};






$scope.returnfinsh = function(){
   
        
              var returnid = $(".returnid");
              var order_product_id_set_value = [];
              var status = [];
               for(var i = 0; i < returnid.length; i++){
                  
                  if($(returnid[i]).is(':checked'))
                  {
                      
                   order_product_id_set_value.push($(returnid[i]).val());
                   status.push(1);
                   
                  }
                  else
                  {
                      order_product_id_set_value.push($(returnid[i]).val());
                      status.push(0);
                  }
                 
               }
            
               var order_product_id= order_product_id_set_value.join("|");
                var status_id= status.join("|");
      
        
                $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                    data:{'action':'returnproduct','status':status_id,'order_product_id':order_product_id,'tablename_sub':'order_product_list_process '}
                  }).success(function(data){
                   
                }); 
         
};





$scope.convert = function(id){
    
          $scope.fetchData(id);
          //$scope.fetchDataCategorybase(id);
          $scope.fetchSingleDatatotal(id);
         
         if(id==1)
         {
             $scope.defaultvalue = '(MTR)';
         }
         else
         {
             $scope.defaultvalue = '(SQFT)'; 
         }
        
};

$scope.sizedefind = function(id,product_id,cateid){
    
        $('#product_id_base_define').val(id);
        $('#order_product_id_base_define').val(product_id);
        
        
        if(cateid==32)
        {
             $('#defaultattacmentrow').hide();
             
             var data='<div class="row twoBoxInput"> <div class="col-md-4"> <div class="form-group row"> <div class="col-sm-12"> <input class="form-control label1" placeholder="Center" name="label1[]" type="text"> </div> </div> </div> <div class="col-md-4"> <div class="form-group row"> <div class="col-sm-12"> <input class="form-control label2" placeholder="Side Bottom" name="label2[]" type="text"> </div> </div> </div>   <div class="col-md-4"> <div class="form-group row"> <div class="col-sm-12"> <input class="form-control degree" placeholder="Degree" name="degree[]" type="text"> </div> </div> </div> </div>';
            
             $('#show_details2').html(data);
             $('#show_details').html('');
             
             
             
            
        }
        else
        {
             $('#defaultattacmentrow').show();
             
             $('#show_details2').html('');
            
        }
        
        
        $scope.fetchDatasizeoptions(id,product_id);
        $scope.fetchDatasizeoptionsvalue(id,product_id);
        $scope.fetchDatasizeoptionsvalueTotal(id,product_id);
        $scope.fetch_single_data(id);
        
};




$scope.specificationFind = function(id,product_id){
    
        $('#product_id_base_define').val(id);
        $('#order_product_id_base_define').val(product_id);
        
        $scope.specificationFinddata(id,product_id);
     
};




 $scope.specificationFinddata = function(id,product_id){
           
            
                                $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/specificationFind",
                                data:{'product_id':product_id,'order_product_id':id,'tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                }).success(function(data){
                                    
                                <?php
                                foreach($additional_information as $vl)
                     	        {
                     	             $label_name=strtolower($vl->label_name);
                     	            ?>
                     	              $scope.<?php echo $label_name; ?> = data.<?php echo $label_name; ?>;
                     	            <?php
                     	        }
                                
                                ?>
                                $scope.product_name_data = data.product_name;
                                 
                               }); 
            
            
 };



$scope.fetch_single_data = function(id){



                              $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/fetch_single_data",
                                data:{'order_product_id':id,'tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                               }).success(function(data){
                                
                                    if(data.sub_product_id)
                                    {
                                        $('#sub_product').val(data.sub_product_id);
                                    }
                                 
                                
                                    $scope.imagestatus = data.imagestatus;
                                    $scope.reference_image = data.reference_image;
                                 
                              }); 

};







$scope.imgpreview = function(){
    
      
        var product_id=$('#order_product_id_base_define').val();
        
        $scope.imgpreviewimages(product_id);
   
};


$scope.imgresult = '';

 $scope.imgpreviewimages = function(product_id){
           
            
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/products/findimages",
                                data:{'product_id':product_id}
                                }).success(function(data){
                                  
                                  
                                  var dataset=data.res;
                                  
                                  if(dataset=='No Image data')
                                  {
                                        $scope.imgresult = dataset;
                                  }
                                  else{
                                        $scope.namesDataoptonsimages = data;
                                        $scope.imgresult = '';
                                  }
                                  
                                  
                                 
                                 
                               }); 
            
            
 };


















 $scope.success1 = false;
 $scope.error1 = false;

  $scope.submitSizeguid = function(){
      
      
      
      
      
      
      
      var label1 = $(".label1");
      var label1_value = [];
      for(var i = 0; i < label1.length; i++){
          
           label1_value.push($(label1[i]).val());
         
      }
      var lab1= label1_value.join("|");
      
      
      
      
      
      
      var label2 = $(".label2");
      var label2_value = [];
      for(var i = 0; i < label2.length; i++){
          
           label2_value.push($(label2[i]).val());
         
      }
      var lab2= label2_value.join("|");
      
      
      
      
       var degree = $(".degree");
      var degree_value = [];
      for(var i = 0; i < degree.length; i++){
          
           degree_value.push($(degree[i]).val());
         
      }
      var degreeset= degree_value.join("|");
      
      
     
      
      
      var sub_product= $('#sub_product').val();
      
     
      
     var order_product_id=  $('#product_id_base_define').val();
    
      
      
      
      var label_option_id = $(".label_option_id:checked");
      var label_option_id_value = [];
      for(var i = 0; i < label_option_id.length; i++){
          
           label_option_id_value.push($(label_option_id[i]).val());
         
      }
      
      
      var value_id= label_option_id_value.join("|");
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/insertandupdate",
      data:{'action':'sizesave','lab1':lab1,'lab2':lab2,'degree':degreeset,'value_id':value_id,'sub_product':sub_product,'order_product_id':order_product_id,'tablenamemain':'<?php echo $tablename; ?>','order_id':'<?php echo $order_id; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){ 
       
                  
                  
             $scope.fetchDatasizeoptionsvalue(order_product_id,sub_product);      
             $('#show_details').hide();
                  
                  
            $scope.success1 = true;
            $scope.error1 = false;
            $scope.successMessage1 = 'Size Details Updated.';

       
    });
      
      
    
  };










 $scope.fetchDatasizeoptionsvalue = function(id,product_id){
           
            
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/fetch_data_size_options_values",
                                data:{'product_id':product_id,'order_product_id':id,'tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                }).success(function(data){
                               
                                  $scope.namesDataoptonsvalues = data;
                                 
                               }); 
            
            
 };

 $scope.fetchDatasizeoptionsvalueTotal = function(id,product_id){
           
            
                                $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/fetch_data_size_options_values_total",
                                data:{'product_id':product_id,'order_product_id':id,'tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                }).success(function(data){
                               
                                 $('#sizetotal').html('Size Total : '+data.sizetotal);
                                 
                               }); 
            
            
 };








 $scope.fetchDatasizeoptions = function(id,product_id){
           
            
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/products/fetch_data_size_options",
                                data:{'product_id':product_id,'order_product_id':id,'tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                }).success(function(data){
                               
                                  $scope.namesDataoptons = data;
                                 
                               }); 
            
            
 };





 $scope.fetchiornproducts = function(){
            $http.get('<?php echo base_url() ?>index.php/products/fetchiornproducts').success(function(data){
              $scope.namesfetchiornproducts = data;
            });
 };


$scope.grouping = function(id,product_name){
    
    
    $('#firstmodal4').modal('toggle');
    
    $('#order_product_id').val(id);
    
    $scope.grouping_title=product_name;
    
    
    
};

$scope.pricelist = function(id,product_name){
    
    
    
    $scope.pricelist_title=product_name;
    
    
    $('#product_id').val(id);
    $scope.fetchpricelist(id);
    
    
};




$scope.similarenq = function(id,product_name,categories_id){
    
    
 
     $scope.produttitleview=product_name;
     $scope.categories_idview=categories_id;
     $('#imagesizemodel-sqg').modal('toggle');
     
     
     
      $scope.fetchDatasimilerproduct(1,id);
     
     
    
};




  $scope.fetchDatasimilerproduct = function(id,product_id){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_similer?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&convert='+id+'&product_id='+product_id).success(function(data){
      $scope.namesDatasimile = data;
    });
    
   
  
   
  };
  





$scope.groupadd = function(){
    
    
   
    
    var order_product_id=$('#order_product_id').val();
    var rows_input=$('#rows_input').val();
   

   
   if(rows_input!="")
   {
       
   
    
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':order_product_id,'rows_input':rows_input, 'action':'Copygroup','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){
       
          $scope.fetchData('1');
          $scope.fetchSingleDatatotal('1');
         $('#firstmodal4').modal('toggle');

      }); 
   }
   else
   {
       alert('Please fill number');
   }
    
    
    
};






$scope.rowincress = function (event) {
    
    
if(event.keyCode==13)
{
               var rowincress=$('#rowincress').val();
              
               if(rowincress!="")
               {
                   
               
                
                 $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                    data:{'rows_input':rowincress,'order_id':'<?php echo $order_id ?>','order_no':'<?php echo $order_no ?>','action':'Copyempty','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                  }).success(function(data){
                   
                      $scope.fetchData('1');
                      $scope.fetchSingleDatatotal('1');
                     
            
                  }); 
               }
               else
               {
                   alert('Please fill number');
               }


}

};




$scope.approvedFinance = function(id,status,reason){
    
                    var result=0;
                    if(status==-1)
                    {
                             $('#firstmodal2').modal('toggle');
                            var result=1;
                         
                    }
                    else
                    {
                        
                            $('#firstmodal1').modal('toggle');
                            var result=1;
                        
                         
                    }
                    
                    
                    
                    if(result==1)
                    {
                        
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/order_quotation_request_finance",
                                data:{'order_id':id,'reason':reason,'order_no':id,'deleteid':status, 'action':'Deletesub','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                               }).success(function(data){
                               
                                $scope.fetchData('1');
                                 $scope.fetchSingleDatatotal('1');
                                 
                              }); 
                        
                        
                    }
                    
                    
                    
                   
                    
                    
                      
          
};


$scope.approved = function(id,status,reason){
    
    
                    if(status==-1)
                    {
                             $('#firstmodal2').modal('toggle');
                             var result=1;
                        
                         
                    }
                    else
                    {
                        
                            $('#firstmodal1').modal('toggle');
                            var result=1;
                           
                        
                         
                    }
    
                    if(result==1)
                   {
                      $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/order_quotation_request",
                        data:{'order_id':id,'reason':reason,'order_no':'<?php echo $order_no; ?>','status':status,'deleteid':status, 'action':'Deletesub','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                      }).success(function(data){
                       
                           $scope.fetchCustomerorderdata();
                           $scope.fetchData('1');
                           $scope.fetchSingleDatatotal('1');
                            
                         
                      }); 
                   }
};










$scope.saveImagesize = function () {



$('#saveServer').html('Loading...');


 var order_product_id=  $('#product_id_base_define').val();
  var product_id=   $('#order_product_id_base_define').val();

 html2canvas($("#canvas"), {
          onrendered: function(canvas) {
          var imgsrc = canvas.toDataURL("image/png");
          
          
                var dataURL = canvas.toDataURL();
                $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order/productimagesave",
                  data:{'order_product_id':order_product_id,'product_id':product_id,'order_no':'<?php echo $order_no; ?>','imgBase64':dataURL,'order_id':'<?php echo $order_id; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                }).success(function(data){
                    
                    // alert('Image Saved'); 
                    $('#imagesizemodel').modal('toggle');
                    
                    $('#saveServer').html('Select Image');
                   
                 
                    $scope.fetchDatasizeoptions(order_product_id,product_id);
                    $scope.fetch_single_data(order_product_id);
                 
            
                });

 }
});




}

























$scope.imgchoose = function () {



    $('#show_details2').show();


    var order_product_id=  $('#product_id_base_define').val();
    var product_id=   $('#order_product_id_base_define').val();
    var image_id=$('input[name="imageid"]:checked').val();
          
            
                $http({
                  method:"POST",
                  url:"<?php echo base_url() ?>index.php/order/productimagesavechoose",
                  data:{'order_product_id':order_product_id,'order_no':'<?php echo $order_no; ?>','image_id':image_id,'order_id':'<?php echo $order_id; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                }).success(function(data){
                    
                    alert('Image Selected'); 
                    $('#imagesizemodel1').modal('toggle'); 
                   
                    $scope.fetchDatasizeoptions(order_product_id,product_id);
                    $scope.fetch_single_data(order_product_id);
                 
            
                });






}





















$scope.copyData = function(id){
    //if(confirm("Are you sure you want to copy it?"))
    //{
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Copy','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){
       
         $scope.fetchData('1');
         $scope.fetchSingleDatatotal('1');

      }); 
    //}
};


$scope.pointDataaddress= function(id){
    if(confirm("Are you sure you want to update the address?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/addresspoint",
        data:{'address_id':id,'order_id':'<?php echo $order_id; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){
          
            $scope.fetchCustomerorderdata();
            $scope.fetchSingleDatatotal('1');
            
      }); 
    }
};

















});


app.directive('navigatable', function(){
        return function(scope, element, attr) {
			
			element.on('keydown', 'input[type="text"]', handleNavigation);
            
            
      function handleNavigation(e){
        
        var key = e.keyCode ? e.keyCode : e.which;
				if(key === 13){
					var focusedElement = $(e.target);
					var nextElement = focusedElement.parent().next();
					if (nextElement.find('input').length>0){
						nextElement.find('input').focus();
					}else{
						nextElement = nextElement.parent().next().find('input').first();
						nextElement.focus();
					}
				}
        
        var arrow = { left: 37, up: 38, right: 39, down: 40 };

        if ($.inArray(e.which, [arrow.left, arrow.up, arrow.right, arrow.down]) < 0) { return; }

        var input = e.target;
        var td = $(e.target).closest('td');
        var moveTo = null;

        switch (e.which) {

            case arrow.left: {
                if (input.selectionStart == 0) {
                    moveTo = td.prev('td:has(input,textarea)');
                }
                break;
            }
            case arrow.right: {
                if (input.selectionEnd == input.value.length) {
                    moveTo = td.next('td:has(input,textarea)');
                }
                break;
            }

            case arrow.up:
            case arrow.down: {
                
               

                var tr = td.closest('tr');
                var pos = td[0].cellIndex;
                
                
              

                var moveToRow = null;
                if (e.which == arrow.down) {
                    moveToRow = tr.next('tr');
                }
                else if (e.which == arrow.up) {
                    moveToRow = tr.prev('tr');
                }

                if (moveToRow.length) {
                    moveTo = $(moveToRow[0].cells[pos]);
                }

                break;
            }

        }

        if (moveTo && moveTo.length) {

            e.preventDefault();

            moveTo.find('input,textarea').each(function (i, input) {
                input.focus();
                input.select();
            });

        }

        
      }
        };
    });
    
    
    
    

    
    
</script>

    <?php include ('footer.php'); ?>
</body>
</html>

