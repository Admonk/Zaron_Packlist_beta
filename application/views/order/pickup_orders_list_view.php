<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
?>
 <style>

.page-content 
{
      width: 1240px !important;
      margin: auto;
            /*  padding:0px !important;
              margin:0px !important;*/
}
.disabled-div {
  /*pointer-events: none;
  opacity: 0.5;*/
}
th.table-width-2 {
    width: 70px;
}
th.table-width-4 {
    width: 80px;
}
    body, td, th, input, p, span, button {
        /*text-align: center !important;*/
    }
td.sst {
    background:#e7e7e7;
   /* font-size: 8px !important;*/
}
th.sst {
    background: #e7e7e7;
   
   /* font-family: 'Roboto', Arial, sans-serif;*/
    font-weight: 600;

}

.table-rep-plugin tbody th, .table-rep-plugin tbody td{
    font-size: 10px;
}

.table th {
    font-weight: 700;
    font-size: 13px;
    /* width: 300px; */
    vertical-align: middle;
}
.customTableDesign thead tr th {
    /*padding: 4px 10px !important;*/
}
.sst input {
    background: #e7e7e7;
    
}

#progrss-wizard {
    padding: 25px;
}
img.img-responsive {
    width: 100%;
}
td input[type="text"] {
   
    width: 100%;
}
.hidden{
    display: none;
}


.last-colorchange span{
    /*padding: 8px 18px;*/
}
    
.loadamount
{
    color: green;
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

.bottom-nav,.profile-bottom-sheet {
    display: none;
}

@media screen and (max-width:767px)
          {

            div#layout-wrapper > .main-content {
    padding-top: 50px;
}
              .ost > tbody {
                border: none;
                background: #ffff;
                border-radius: 8px !important;
                padding: 10px !important;
                display: flex;
                margin-bottom:10px;
                margin-top: 10px;
                flex-wrap:wrap;
            }
            
            .ost > tbody tr {
                border: none;
            }
            
            .ost > tbody tr td {
                border: none !important;
                border-bottom: 1px solid #e6e6e6 !important;
            }
            .ost > tbody:first-child {
                border-radius: 0px !important;
            }
            .ost > tbody tr {
                border-radius: 0px;
                
            }

            /* CSS for the bottom sheet */
        .filter-bottom-sheet {
            display: none;
            position: fixed;
            bottom: -100%; /* Initially hidden */
            left: 0;
            width: 100%;
            height: auto;
            background-color: #fff;
            padding: 20px;
            border-top: 1px solid #ccc;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            transition: bottom 0.3s ease; /* Animation */
        }
        
        /* CSS for the profile bottom sheet */
        .profile-bottom-sheet {
            display: none;
            position: fixed;
            bottom: -100%; /* Initially hidden */
            left: 0;
            width: 100%;
            height: auto;
            background-color: #fff;
            padding: 20px;
            border-top: 1px solid #ccc;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            transition: bottom 0.3s ease; /* Animation */
        }


        
        /* Show the bottom sheet when it has the .active class */
        .filter-bottom-sheet.bactive {
            bottom: 50px !important;
            display: block !important;
            width: 100%;
            left: 0;
            margin: 0px !important;
        }
        
        .profile-bottom-sheet.bactive {
            bottom: 60px !important;
            display: block !important;
            width: 100%;
            left: 0;
            margin: 0px;
        }
        
        /* Backdrop overlay */
        .backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9998;
        }
        
        /* Show the backdrop when the bottom sheet is active */
        .backdrop.bactive {
            display: block;
        }

        .bottom-nav .icon {
            cursor: pointer;
        }
        
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            height: 60px;
            box-shadow: 2px 0px 10px 4px #dadada;
            padding: 0 10px;
            z-index: 999999;
        }
        
       /* header,.customize-table
        {
            display:none;
        }*/

       .totalWeightLabel, .trip-detail {
          text-align: left !important;
          width: 100%;
          background: #ffffff;
          padding: 10px 10px;
          margin: 0px;
          border: 1px solid #e6e6e6;
      }
        .main-content
        {
           padding-top: 20px !important
        }
        }




/* TO TABLE HEADER WIDTH AND LENGTH */
 /* th {
    white-space: nowrap; 
    overflow: hidden; 
    text-overflow: ellipsis;
    text-align: center; 
} */

/* Optional: For breaking specific headers like "Dispatch completed" */
/* .break-header {
    white-space: pre-wrap;
}  */



table {
    width: 100%;
    border-collapse: collapse;
}

th {
    word-wrap: break-word; /* Allow breaking of words */
    white-space: normal;   /* Allow normal wrapping */
    max-width: 100px;      /* Set a max width to trigger the break */
}




</style>




<!-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
        window.onload = function googleTranslateElementInit() {
         new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ta,en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
</script> -->
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; 
     
     $read="readonly";
     $readdriverset="Billed ";
     $readdriver="";
     $disabled="";
     if($driver_pickip=='1')
     {
         $readdriver="readonly";
         $disabled="disabled";
         $readdriverset="Billed ";
     }

     //   if($approved_view=='1')
     // {
         $readdriver="";
         
     //}
     
     
     ?>




  <div id="layout-wrapper">
         <div class="main-content">
            <div class="page-content1">
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
                                                             <input type="hidden" class="hidden" id="lat" >
                                                             <input type="hidden" class="hidden" id="laog" >
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
                                                                     
                                                                      <span>ASSIEND TIME : {{starttime}}</span>
                                                                  </p>
                                                                  <p class="">
                                                                       <span class="font-size-12">{{orderno}}</span><a href="tel::{{customerphone}}"><span><i class="mdi-phone mdi font-size-20 me-1"></i> Call Customer</span></a>
                                                                       
                                                                        <span ng-if="lengeth>0"><b>Max Length : {{lengeth}}</b></span>
                                                                          <b>Trip ID : {{trip_id}}</b>
                                                                            <span style="color:red;"><b>Status :{{reason}} </b></span>  

                                                                          <b>VEHICLE : {{vehicle_name}}</b>
                                                                          <b>DRIVER  : {{driver_name}}</b>

                                                                       </p>



                                                              
                                                              
                                                              
                                                               </div>
                                                              
                                                               
                                                               <ul>
                                                                   <?php
                                                                   $i=1;
                                                                   $already_loaded_value=[];
                                                                   foreach($DC_list as $dd)
                                                                   { 

                                                                 
                                                                    $this->db->select_sum('amount'); // This will sum the 'amount' field
                                                                    $this->db->where('sales_load_products.randam_id', $dd->randam_id);
                                                                    $this->db->where('sales_load_products.loadstatus', 1);
                                                                    $dc_amount_data = $this->db->get('sales_load_products');
                                                                    $dc_amount = $dc_amount_data->row();

                                                                    $dc_amount_get=$dc_amount->amount*0.18;
                                                                    $this->db->where('orders_process.id', $dd->order_id);
                                                                    $orders_process_tcs_check = $this->db->get('orders_process');
                                                                    $tcs_check = $orders_process_tcs_check->row();


                                                                    if($tcs_check->tcs_status == '1') {
                                                                        $tcsamount_picked=round(($dc_amount->amount+$dc_amount_get)*0.1/100);
                                                                        $already_loaded_value[]=round($dc_amount->amount+$dc_amount_get+$tcsamount_picked);
                                                                    }else {
                                                                        $already_loaded_value[]=round($dc_amount->amount+$dc_amount_get);
                                                                    }

                                                                   
                                                                   ?>

                                                                     <li>DC ID <?php echo $i; ?> : <a href="<?php echo base_url(); ?>index.php/order/delivery_note?order_id=<?php echo base64_encode($dd->order_id); ?>&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process&viewstatus=1&DC_id=<?php echo $dd->randam_id; ?>&dc_count=<?php echo $i; ?>" target="_blank"><?php echo $dd->randam_id; ?></a></li>




                                                                     <?php
                                                                     $i++;
                                                                   }

                                                                   ?>
                                                                   </ul> 
                                                               
                                                               
                                                               
                                                             <div class="time">
                                                                  
                                                                  <p><span>Invoice</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>
                                                                  
                                                                  
                                                                  
                                                       <a  target="_blank" href="<?php echo base_url(); ?>index.php/order/overview?order_id=<?php echo base64_encode($id); ?>&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process" >Overview</a> 
                                                                      
                                                                  </span></p>
                                                                  <!--<p><span>DC</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span></p>-->
                                                                  <p><span>SubTotal</span><span> Rs. {{ fulltotaldel | indianCurrency }}</span></p>
                                                                  <!-- <p ng-if="tcs_status==1"><span>TCS (+)</span><span> Rs. {{tcsamount}}</span></p> -->
                                                                  <p><span>Delivery Charge</span><span> Rs. {{ delivery_charge | indianCurrency }}</span></p>
                                                                  <p><span>Total Amount</span><span> Rs. {{ fulltotaldel | indianCurrency }}</span></p>
                                                                  <p><span>Loaded</span><span> Rs. {{ unbilledloadamount | indianCurrency }}</span></p>
                                                                  <p ng-if="deliveredamount>0"><span>Delivered</span><span> Rs. {{ deliveredamount| indianCurrency }}</span></p>
                                                                  
                                                                  <p><span>Balance </span><span> Rs. {{ finalbalnce | indianCurrency }} </span></p>
                                                               
                                                               
                                                               </div>
                                                               
                                                                
                                                               
                                                               <div class="accordion accordion-flush" id="accordionFlushExample">
                                                                    
                                                                    <div class="accordion-item">
                                                                       
                                                                       <?php if($approved_view=='0'){ ?>
                                                                       
     
                                                                        
                                                                       <p style="float:right;">
                                                                             <label for="checkall">
                                                                             <input type="checkbox" id="checkall" <?php echo $disabled; ?>  ng-click="loadProductAll()"> Load ALL
                                                                             </label>
                                                                        </p> 
                                                                      <?php } ?>


                                                                         
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
                                             <th class="table-width-10" rowspan="2" data-priority="1" ng-click='sortColumn("product_name_tab")' ng-class='sortClass("product_name_tab")'>Products </th>
                                            
                                             
                                          
                                                                                       
                                             
                                           <th class="sst" style="width: 10px;" ng-if="namecate.labletype==2 || namecate.labletype==1"  style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("profile_tab")' ng-class='sortClass("profile_tab")'>{{namecate.lable}} </th>

                                             <th class="table-width-2 sst"  ng-if="namecate.labletype==2" data-priority="1" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>Length </th>
                                               <!-- hide by cleat -->
                                               <th class="table-width-2 sst" style="width: 40px;" data-priority="3" ng-if="namecate.labletype!=9 && namecate.labletype!=14">UOM (Billing)</th>
                                               
                                               <th class="table-width-2 " style="width: 40px;" data-priority="3" ng-if="namecate.labletype==14">UOM</th>

                                               
                                               

                                                  <th class="table-width-2" ng-if="namecate.labletype==2 || namecate.labletype==1"  style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("profile_tab")' ng-class='sortClass("profile_tab")'>{{namecate.lable}} </th>

                                             <th class="table-width-2" ng-if="namecate.labletype==2" data-priority="1" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>Length </th>

                                                <th class="table-width-2" data-priority="3" ng-if="namecate.labletype!=9">UOM (Default)</th>

                                             <th class="table-width-2" ng-if="namecate.labletype==2 || namecate.labletype==1" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'><?php echo $readdriverset;?>{{namecate.lablenos}} </th>
                                             
                                             <?php
                                                 if($readdriver=='')
                                                 {if($driver_pickip != 1){
                                                     ?> 
                                             <th class="table-width-2" ng-if="namecate.labletype==2 || namecate.labletype==1" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>Packed {{namecate.lablenos}} </th>
                                             <?php 
                                                 }}
                                             ?>
                                             
                                             
                                             <th class="table-width-2" ng-if="namecate.labletype==2 || namecate.labletype==1" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>Loaded {{namecate.lablenos}} </th>
                                             
                                             
                                             <?php if($driver_pickip != 1){ ?>
                                             <th class="table-width-2" ng-if="namecate.labletype==2 || namecate.labletype==1" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>Old loaded Nos</th>
                                             <?php } ?>


                                              <?php
                                                 if($readdriver=='')
                                                 {
                                                     ?> 
                                             <th class="table-width-2" ng-if="namecate.labletype==9 || namecate.labletype==19" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>Packed Qty </th>
                                             <?php 
                                             }
                                             ?>
                                             
                                             
                                             <th class="table-width-6" ng-if="namecate.labletype==9 || namecate.labletype==19" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>Loaded  Qty</th>
                                             
                                             
                                            
                                             <!--<th class="table-width-6" data-priority="3">Unit</th>-->
                                             <!--<th class="table-width-8" data-priority="6"  ng-click='sortColumn("Meter_to_Sqr_feet")' ng-class='sortClass("Meter_to_Sqr_feet")'>Sqft </th>-->
                                             <th class="table-width-6" data-priority="6" rowspan="2" ng-click='sortColumn("rate_tab")' ng-class='sortClass("rate_tab")'>Rate </th>
                                             
                                              <th class="table-width-4" data-priority="6" rowspan="2" ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'>Billed Qty </th>
                                             
                                              <th class="table-width-4" data-priority="6" rowspan="2" ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'>Loaded Qty </th>
                                             
                                             <th class="table-width-4 comdisplay" rowspan="2" ng-if="commission_check==1" data-priority="6" ng-click='sortColumn("commission_tab")' ng-class='sortClass("commission_tab")'> Commission </th>
                                              <th class="table-width-4" data-priority="6" rowspan="2" ng-click='sortColumn("amount_tab")' ng-class='sortClass("amount_tab")'>Billed Amount </th>
                                             <th class="table-width-4" data-priority="6" rowspan="2" ng-click='sortColumn("amount_tab")' ng-class='sortClass("amount_tab")'>Loaded Amount </th>

                                             <th ng-if="namecate.cate_status==1">Attachment</th>
                                             <?php if($approved_view=='0'){ ?>
                                               <th class="table-width-10" data-priority="6" rowspan="2" >Status</th>
                                              <?php } ?>
                                             
                                          </tr>
                                          
                                          
                                          
                                       </thead>
                                       
                                       
                                       
                                        <thead class="bg-gray text-red" ng-if="namecate.categories_id!=1">
                                         
                                       
                                         
                                          <tr>
                                              <th class="table-width-3" rowspan="2">S.No</th>
                                             <th class="table-width-10" rowspan="2" data-priority="1" ng-click='sortColumn("product_name_tab")' ng-class='sortClass("product_name_tab")'>Products </th>
                                            
                                             <th class="table-width-10" ng-if="namecate.labletype==4" rowspan="2" data-priority="1" ng-click='sortColumn("product_name_tab")' ng-class='sortClass("product_name_tab")'>Tile Material </th>
                                            
                                            
                                            
                                            <th class="table-width-10" ng-if="namecate.labletype==16 || namecate.labletype==19" rowspan="2" data-priority="1">Material Specfication
 </th>
 
 
 
 <th class="table-width-15" ng-if="namecate.labletype==19" rowspan="2" data-priority="1" >Remarks
 </th>
 
 
  <th class="table-width-15" ng-if="namecate.labletype==19" rowspan="2" data-priority="1" >Coil_no 
 </th>
 
 
 
 
 
  <th class="table-width-10" ng-if="namecate.categories_id==592" rowspan="2" data-priority="1" >Description
 </th>
                                            
                                            
                                            
                                            
                                             
                                           
                                              
                                              
                                                <th class="table-width-10" ng-if="namecate.labletype==19" rowspan="2" data-priority="1" ng-click='sortColumn("product_name_tab")' ng-class='sortClass("product_name_tab")'>Coil_Status 
 </th>
                                              
                                             
                                              <th class="table-width-8 sst" ng-if="namecate.labletype==11 || namecate.labletype==12" >Dim 1</th>
                                              <th class="table-width-8 sst" ng-if="namecate.labletype==11 || namecate.labletype==12" >Dim 2</th>
                                              <th class="table-width-8 sst" ng-if="namecate.labletype==12" >Dim 3</th>
                                             
                                             
                                        
                                              <!-- gg changes commant for Arch Categories -->
                                            <!-- <th class="table-width-6" style="width: 5%;" ng-if="namecate.labletype==8" data-priority="3" style="padding-bottom:0px" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>Extra {{namecate.lable}} </th> 

                                             <th class="sst1" style="width: 70px;" ng-if="namecate.labletype==8" style="display:none;" data-priority="3" style="padding-bottom:0px" ng-click='sortColumn("back_crimp_tab")' ng-class='sortClass("back_crimp_tab")'>Back {{namecate.lable}} </th> 
                                             -->












                                             <th class="table-width-4" ng-if="namecate.labletype==5 || namecate.labletype==6" >Billing Option</th>
                                             <th class="table-width-4" ng-if="namecate.labletype==1 && namecate.categories_id!=30" >Billing Option</th>

                                             <th class="table-width-20 sst" style="width:6px;"  data-priority="3" ng-if="namecate.labletype==8 || namecate.labletype==1 ||  namecate.labletype==0 || namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==4 || namecate.labletype==15" style="padding-bottom:0px" ng-click='sortColumn("profile_tab")' ng-class='sortClass("profile_tab")'>{{namecate.lable}} </th> 
                                             <th class="table-width-15 sst" style="width: 6px;" ng-if="namecate.labletype==1 && namecate.categories_id!=627 && namecate.categories_id!=611" data-priority="1" style="padding-bottom:0px" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>{{namecate.lable2}} </th> 

                                            <th class="table-width-15 sst" style="width: 6px;" ng-if="namecate.labletype==11 || namecate.labletype==12 ||  namecate.labletype==0 || namecate.labletype==6 || namecate.labletype==15" data-priority="1" style="padding-bottom:0px" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>{{namecate.lable2}} </th> 
                                            <th class="table-width-15 sst" style="width: 6px;" ng-if="namecate.categories_id!=627 && namecate.categories_id!=620  && namecate.categories_id!=39  && namecate.categories_id!=41  && namecate.categories_id!=24 && namecate.categories_id!=626 && namecate.categories_id!=611 && namecate.categories_id!=590 && namecate.categories_id!=34 && namecate.categories_id!=19 && namecate.categories_id!=36 && namecate.categories_id!=7 && namecate.categories_id!=3 && namecate.categories_id!=17 &&   namecate.categories_id!=595 && namecate.categories_id!=9 && namecate.categories_id!=593  && namecate.categories_id!=13 && namecate.categories_id!=5 && namecate.categories_id!=613" data-priority="1" style="padding-bottom:0px" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>{{namecate.lable2}} </th> 

                                            <!-- hide by cleat -->
                                            <th class="table-width-2 sst "  style="width: 2%;" data-priority="3" ng-if="namecate.labletype!=9 && namecate.labletype!=14">UOM (Billing)</th> 

                                            <th class="table-width-2  "  style="width: 2%;" data-priority="3" ng-if="namecate.labletype==14">UOM</th> 

                                            <th class="table-width-8 " ng-if="namecate.labletype==11 || namecate.labletype==12" >Dim 1</th>
                                            <th class="table-width-8 " ng-if="namecate.labletype==11 || namecate.labletype==12" >Dim 2</th>
                                            <th class="table-width-8 " ng-if="namecate.labletype==12" >Dim 3</th>
                                            
                                            
                                            


  
                                             
                                              
                                             
                                             
                                              <th class="table-width-2"   data-priority="3" ng-if="namecate.labletype==8 ||namecate.labletype==0 || namecate.labletype==1 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==4 || namecate.labletype==15" style="padding-bottom:0px" ng-click='sortColumn("profile_tab")' ng-class='sortClass("profile_tab")'>{{namecate.lable}} </th>
                                              
                                              
                                              <th class="table-width-2 d-none" ng-if="namecate.labletype==8" data-priority="3" style="padding-bottom:0px" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>Extra<br> {{namecate.lable}} </th>
                                              <th class="table-width-8" ng-if="namecate.labletype==8" style="display:none;" data-priority="3" style="padding-bottom:0px" ng-click='sortColumn("back_crimp_tab")' ng-class='sortClass("back_crimp_tab")'>Back {{namecate.lable}} </th>
                                            



                                              <th class="table-width-2" ng-if="namecate.labletype==1 && namecate.categories_id!=627 && namecate.categories_id!=611" data-priority="1" style="padding-bottom:0px" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>{{namecate.lable2}} </th> 

                                               <th class="table-width-2" ng-if="namecate.labletype==0 || namecate.labletype==11 || namecate.labletype==12 ||namecate.labletype==0  || namecate.labletype==6 || namecate.labletype==15" data-priority="1" style="padding-bottom:0px" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>{{namecate.lable2}} </th> 
                                               <th class="table-width-2" ng-if="namecate.categories_id!=627 && namecate.categories_id!=620  && namecate.categories_id!=39 && namecate.categories_id!=41 && namecate.categories_id!=24 && namecate.categories_id!=626 && namecate.categories_id!=611 && namecate.categories_id!=590 && namecate.categories_id!=34 && namecate.categories_id!=19  && namecate.categories_id!=36 && namecate.categories_id!=7 && namecate.categories_id!=3 && namecate.categories_id!=17 && namecate.categories_id!=595 && namecate.categories_id!=9 && namecate.categories_id!=13 && namecate.categories_id!=5 && namecate.categories_id!=613" data-priority="1" style="padding-bottom:0px" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>{{namecate.lable2}} </th> 

                                               
                                               



                                                  <th class="table-width-2" data-priority="3" ng-if="namecate.labletype==11 ||  namecate.labletype==12" style='font-size:10px;'>UOM (Default)</th>

                                                  <th class="table-width-2" data-priority="3" ng-if="namecate.labletype!=19 && namecate.labletype!=9 && namecate.labletype!=14 &&  namecate.labletype!=11 &&  namecate.labletype!=12" >UOM (Default)</th>

                                            
                                              <th class="table-width-2"  data-priority="3" ng-if="namecate.labletype!=9" rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'><?php echo $readdriverset; ?>{{namecate.lablenos}}</th>

                                             
                                            
                                            
                                                 <?php
                                                 if($readdriver=='')
                                                 {

                                                    if($driver_pickip != 1){

                                                     ?> 
                                             <th class="table-width-2" ng-if="namecate.labletype!=9" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>Packed {{namecate.lablenos}} </th>

                                             <?php 
                                             }}
                                             ?>
                                             




                                            
                                             <th class="table-width-2"  data-priority="3" ng-if="namecate.labletype!=9" rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>Loaded {{namecate.lablenos}}</th>
                                            <?php if($driver_pickip != 1){ ?>
                                             <th class="table-width-2"  data-priority="3" ng-if="namecate.labletype!=9" rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>Old loaded Nos</th>
                                            <?php } ?>



                                             <th class="table-width-4" ng-if="namecate.labletype==9 || namecate.labletype==19" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>Billed QTY </th>


                              <?php
                                                 if($readdriver=='')
                                                 {
                                                    if($driver_pickip != 1){
                                                     ?> 
                                             <th class="table-width-4" ng-if="namecate.labletype==9 || namecate.labletype==19" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>Packed QTY </th>
                                             <?php 
                                                 }
                                                }
                                             ?>
                                             
                                             
                                             <th class="table-width-2" ng-if="namecate.labletype==9 || namecate.labletype==19" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>Loaded<br> QTY </th>
                                            
                                             <?php if($driver_pickip !=1) { ?>
                                                        <th class="table-width-2" ng-if="namecate.labletype==9 || namecate.labletype==19" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'>Old loaded QTY </th>
                                             <?php } ?>


                                            
                                             <!--<th class="table-width-6" data-priority="3">Unit</th>-->
                                            
                                            
                                            
                                             <!--<th class="table-width-8" data-priority="6"  ng-click='sortColumn("Meter_to_Sqr_feet")' ng-class='sortClass("Meter_to_Sqr_feet")'>Sqft </th>-->
                                             <th class="table-width-6" data-priority="6" rowspan="2" ng-click='sortColumn("rate_tab")' ng-class='sortClass("rate_tab")'>Rate </th>
                                             <th class="table-width-4 comdisplay"        rowspan="2" ng-if="commission_check==1" data-priority="6" ng-click='sortColumn("commission_tab")' ng-class='sortClass("commission_tab")'> Commission </th>
                                             
                                             <th ng-if="namecate.labletype!=9 && namecate.labletype!=11 && namecate.labletype!=12" class="table-width-4" data-priority="6" rowspan="2" ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'>Thoretical QTY </th>                            
                                             <th ng-if="namecate.labletype==11 || namecate.labletype==12" class="table-width-4" data-priority="6" rowspan="2" ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'>Th QTY </th>

                                            
                                             <th ng-if="namecate.labletype!=9" class="table-width-4" data-priority="6" rowspan="2" ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'>Billed Qty </th>
                                              <th ng-if="namecate.labletype!=9" class="table-width-4" data-priority="6" rowspan="2" ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'>Loaded  Qty </th>
                                            
                                              <th class="table-width-4" data-priority="6" rowspan="2" ng-click='sortColumn("amount_tab")' ng-class='sortClass("amount_tab")'>Billed Amount </th>
                                             
                                              <th class="table-width-4" data-priority="6" rowspan="2" ng-click='sortColumn("amount_tab")' ng-class='sortClass("amount_tab")'>Loaded Amount </th>
                                             
                                         <th ng-if="namecate.cate_status==1">Attachment</th>
                                               
                                               <?php if($approved_view=='0'){ ?>
                                               <th class="table-width-10" data-priority="6" rowspan="2" >Status</th>
                                              <?php } ?>
                                          
                                             
                                          </tr>
                                          
                                          
                                          
                          
                                          
                                          
                                       </thead>
                                       
                                       
                                       
                                       
                                       
                                       
                                    <tbody   ng-repeat="name in namesData|orderBy:column:reverse"  ng-if="namecate.categories_id==1">
                                           
                                           
                                           

                                          <tr  class="{{name.picked_status == 0 ? 'disabled-div' : ''}} view " ng-style="name.rate_edit == 1 && {'color':'red'}" ng-if="namecate.categories_id==name.categories_id_get && namecate.type==name.type">
                                           
                                           
                                             <td data-label="S No">{{name.no}}</span> 
                                             
                                             
                                             
                                             
                                               <i class="mdi mdi-check  font-size-16"  ng-if="name.purchase_request==1" ng-click="getPurchaserequest(name.purchase_id,name.product_name_tab)" title="Purchase requested" style="cursor: pointer;"></i>
                                             
                                             
                                             
                                             
                                             </td>
                                           
                                           
                                           
                                            <input type="hidden" class="hidden"  value="{{namecate.categories_id}}"  id="cateid_{{name.id}}">
                                            <input type="hidden" class="hidden"  value="{{namecate.type}}"  id="cateidtype_{{name.id}}">
                                            <input type="hidden" class="hidden"  value="{{name.product_id}}"  id="ppid_{{name.id}}">
                                          
                                            
                                                 <td title="{{name.categories}}"  data-label="Products">
                                                {{name.product_name_tab}}
                                                       
                                                 </td>



                                         
                                             
                                             
                                           
                                           
                                             
                                      <td data-label="{{namecate.lable}}" class="sst"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}"  value="{{name.profile_tab}}"></td>
                                            
                                            
                                          <td ng-if="namecate.labletype==2" class="sst" data-label="Crimp"><input type="text" <?php echo $read; ?> ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)" id="crimp_{{name.id}}" value="{{name.crimp_tab}}"></td>

                                              <td  data-priority="3" class="sst" data-label="UOM" ng-if="namecate.labletype!=9" >
                                                
                                                  <span value="3" ng-if="name.uom==3">FEET</span>
                                                  <span value="4" ng-if="name.uom==4">MM</span>
                                                  <span value="5" ng-if="name.uom==5">MTR</span>
                                                  <span value="6" ng-if="name.uom==6">INCH</span>
                                                   
                                            </td> 



                              <td >{{name.profile_tab_convert}}</td>
                              <td ng-if="namecate.labletype==2" >{{name.crimp_tab_convert}}</td>

                                            
                                             <td  data-priority="3" ng-if="namecate.labletype!=9" data-label="UOM" >

                                              <span ng-if='name.uom==2'>SQFT</span>
                                         <span ng-if='name.uom!=2'>FEET</span>

                                          <span ng-if="!name.uom || name.uom == 1">kg</span>
                                              


                                             </td>
                                                 
                                             <td data-label="Nos" ng-if="namecate.labletype!=9">
                                                 
                                                {{name.bill_nos}}
                                                
                                                
                                                 
                                                 </td>
                                                 
                                              <?php
                                                 if($readdriver=='')
                                                 {
                                                    if($driver_pickip != 1){
                                                     ?>     
                                            <td ng-if="namecate.labletype!=9">

                                                    <span  ng-if='name.dispatch_nos==0' >{{name.packed_nos_data}}</span>
                                                     <span  ng-if='name.dispatch_nos>0' >{{name.dispatch_nos}}</span>


                                           </td> 

                                             <?php
                                                    }}
                                                 
                                                 ?>

                                           <td ng-if="namecate.labletype!=9"> 



                                            <?php
                                                 if($readdriver=='')
                                                 {
                                                      if(count($DC_list)==0)
                                                    {
                                                     ?>
                                                      <span ng-if='name.dispatch_nos==0'>

                                                       <span ng-if='name.packed_nos>0'>
                                                       <input type="text" disabled ng-blur="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"    data-val="{{name.bill_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.packed_nos}}">
                                                       </span>
                                                    
                                                     </span>


                                                      <span ng-if='name.dispatch_nos>0'>
                                                       <input type="text" disabled ng-blur="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"    data-val="{{name.bill_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.packed_nos}}">
                                                    
                                                     </span>
                                                     
                                                     <?php
                                                     }
                                                     else
                                                     {
                                                        ?>


                                                         <span ng-if='name.dispatch_nos==0'>

                                                       <span ng-if='name.packed_nos>0'>
                                                       <input type="text" disabled ng-blur="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"    data-val="{{name.packed_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.packed_nos}}">
                                                       </span>
                                                    
                                                     </span>


                                                      <span ng-if='name.dispatch_nos>0'>
                                                       <input type="text" disabled ng-blur="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"    data-val="{{name.packed_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.packed_nos}}">
                                                    
                                                     </span>

                                                        <?php

                                                     }
                                                 }
                                                 else
                                                 {
                                                    ?>
                                                   <span  ng-if='name.packed_nos>0' >{{name.packed_nos}}</span>

                                                    <?php
                                                 }
                                                 
                                                 ?>

                                          

                                        </td>


                                         <?php
                                                 if($readdriver=='')
                                                 {
                                                     ?>     
                                            <td ng-if="namecate.labletype==19 || namecate.labletype==9">

                                                    <span  ng-if='name.dispatch_nos==0' >{{name.packed_nos_data}}</span>
                                                     <span  ng-if='name.dispatch_nos>0' >{{name.dispatch_nos}}</span>


                                           </td> 

                                             <?php
                                             }
                                             ?>
                                              <td ng-if="namecate.labletype==9 || namecate.labletype==19"> 

                                                 <?php
                                                 if($readdriver=='')
                                                 {

                                                    if(count($DC_list)==0)
                                                    {
                                                     ?>
                                                      <span ng-if='name.dispatch_nos==0'>

                                                       <span ng-if='name.packed_nos>0'>
                                                       <input type="text" disabled ng-blur="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"    data-val="{{name.bill_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.packed_nos}}">
                                                       </span>
                                                    
                                                     </span>


                                                      <span ng-if='name.dispatch_nos>0'>
                                                       <input type="text" disabled ng-blur="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"    data-val="{{name.bill_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.packed_nos}}">
                                                    
                                                     </span>
                                                     
                                                     <?php
                                                     }
                                                     else
                                                     {
                                                        ?>


                                                         <span ng-if='name.dispatch_nos==0'>

                                                       <span ng-if='name.packed_nos>0'>
                                                       <input type="text" disabled ng-blur="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"    data-val="{{name.packed_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.packed_nos}}">
                                                       </span>
                                                    
                                                     </span>


                                                      <span ng-if='name.dispatch_nos>0'>
                                                       <input type="text" disabled ng-blur="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"    data-val="{{name.packed_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.packed_nos}}">
                                                    
                                                     </span>

                                                        <?php

                                                     }

                                                 }
                                                 else
                                                 {
                                                    ?>
                                                   <span  ng-if='name.packed_nos>0' >{{name.packed_nos}}</span>

                                                    <?php
                                                 }
                                                 
                                                 ?>
                                               

                                            </td>
                                            
                                            <?php if($driver_pickip !=1) { ?>
                                                        <td ng-if="namecate.labletype!=9">

                                                    
                                                        
                                                        <span   >{{name.transit_delivered}}</span>



                                                        </td>
                                            <?php } ?>






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


                                                                                                        <!-- gg changes reference image -->
                                                                                                        <td ng-if="namecate.cate_status==1"> 
                                                                                                                                                                                                                        {{name.sub_product_name_tab}}

                                                                                                                     <br>
                                                                                                                     <span ng-if="name.reference_image != null && name.reference_image != ''"><br><br>
                                                                                                                        <a href="<?php echo base_url(); ?>{{ name.reference_image }}" style="margin: 15px 5px;" target="_blank"> 
                                                                                                                            <img src="<?php echo base_url(); ?>{{ name.reference_image }}" style="width: 200px; border: #4a4a4a solid 1px;" class="{{ name.attachment }}" data-attachment="{{ name.attachment }}">
                                                                                                                        </a>
                                                                                                                    </span>




                                                                                                        </td>

                                             
                                   
                                          
                                             
                                                                                 <!-- Status 2nd leg -->
                                             <?php 
     


                                                                                            if($approved_view==0)
                                                                                            {


                                                                                              ?>
                                          
                                             <td data-label="Action" class="last-colorchange" ng-style="{'background': (name.packed_nos>0 && name.dispatch_nos==0) ? '#fafafa' : ''}">
                                                 


                                                            <?php if($driver_pickip ==1) { ?>
                                                                <!-- <span ng-if="name.unlode_check_box==1 && name.loadstatus==1"> -->
                                                                    
                                                                                <!-- gg changes show load pending for only to driver -->

                                                                            <!-- <label ng-if="name.packed_nos_data!=0&&name.delivery_status==0&&name.loadstatus==0&&name.picked_status==0 && name.enable_load_pending==0" for="set_id{{name.id}}" >Pick Pending</label>
                                                                            <label ng-if="name.packed_nos_data!=0&&name.delivery_status==0&&name.loadstatus==0&&name.picked_status==0 && name.enable_load_pending==1" for="set_id{{name.id}}" >Load Pending</label>

                                                                            <label  ng-if="name.loadstatus==1 && name.packed_nos_data!=null"><input type="checkbox"   <?php //echo $disabled; ?>  checked   class="loaditems"> <span id="textchange_{{name.id}}">Loaded</span></label>
                                                                            -->
                                                                           
                                                                                         <!-- Check if the item is Loaded -->
                                                                                        <label ng-if="name.loadstatus == 1 && name.packed_nos_data != null">
                                                                                            <input type="checkbox" <?php echo $disabled; ?> checked class="loaditems"> 
                                                                                            <span id="textchange_{{name.id}}">Loaded</span>
                                                                                        </label>

                                                                                        <!-- Else, check for Load Pending or Pick Pending -->
                                                                                        <label ng-if="!(name.loadstatus == 1 && name.packed_nos_data != null) && name.loadstatus == 0 && name.packed_nos_data != 0 && name.picked_status == 0">
                                                                                            <span ng-if="name.enable_load_pending == 1">Load Pending</span>
                                                                                            <span ng-if="name.enable_load_pending == 0">Pick Pending</span>
                                                                                        </label>

                                                                           
                                                                           
                                                                           
                                                                           
                                                                           
                                                                           
                                                                            <!-- <label  ng-if="name.picked_status==1&&name.loadstatus==0 && name.packed_nos_data==null"><input type="checkbox"   <?php echo $disabled; ?>  checked   class="loaditems"> <span id="textchange_{{name.id}}">Loaded</span></label> -->

                                                                            

                                                                                                            
                                                                <!-- </span> -->
                                                            <?php }else { ?>

                                                                <label ng-if="name.picked_status==0&&name.loadstatus==0&&name.delivery_status==0" >Pick Pending</label>
                                                                <label ng-if="name.packed_nos_data==0&&name.picked_status==1&&name.loadstatus==0&&name.delivery_status==0" ><input type="checkbox" disabled checked  class="loaditems" > Loaded</label>



                                                                                        <span ng-if="name.unlode_check_box==1">
                                                                                            
                                                                                            <label for="set_id{{name.id}}" title="Delivered" ng-if="name.delivery_status==1"><input type="checkbox" disabled checked value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Loaded</span></label>

                                                                                           </span>
                                               

                                                                                                        <span ng-if="name.loadstatus==0 && name.unlode_check_box==0">
                                                                                                            
                                                                                                            <label for="set_id{{name.id}}" ng-if="name.delivery_status==0 && name.packed_nos_data!=null && name.packed_nos_data!=0"><input type="checkbox" value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" <?php echo $disabled; ?> class="loaditems"  name="loaditems"> <span id="textchange_{{name.id}}" >Load</span></label>
                                                                                                            <label for="set_id{{name.id}}" title="Delivered" ng-if="name.picked_status==1&&name.delivery_status==0&&name.packed_nos_data==null"><input type="checkbox" disabled checked  id="set_id{{name.id}}"  class="loaditems" > <span id="textchange_{{name.id}}">Loaded</span></label>
                                                                                                            <label for="set_id{{name.id}}" title="Delivered" ng-if="name.delivery_status==1"><input type="checkbox" disabled checked  id="set_id{{name.id}}"  class="loaditems" > <span id="textchange_{{name.id}}">Loaded</span></label>

                                                                                                        </span>
                                                                                                        
                                                                                                        <span ng-if="name.loadstatus==1 && name.unlode_check_box==0">


                                                                                                          
                                                                                                            
                                                                                                            <label for="set_id{{name.id}}" title="Delivered" ><input type="checkbox"  checked value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Loaded</span></label>
                                                                                                           

                                                                                                         
                                                                                                        </span>

                                                                                                        <span ng-if="name.loadstatus==1 && name.unlode_check_box==1">


                                                                                                          
                                                                                                            
                                                                                                            <label for="set_id{{name.id}}" title="Delivered" ><input type="checkbox" disabled checked  id="set_id{{name.id}}"  class="loaditems" > <span id="textchange_{{name.id}}">Loaded</span></label>
                                                                                                           

                                                                                                         
                                                                                                        </span>


                                                                                                          <span ng-if="name.loadstatus==1 && name.allreadyloaded==1">


                                                                                                          
                                                                                                            
                                                                                                            <label for="set_id{{name.id}}" title="Delivered" ng-if="name.delivery_status==1"><input type="checkbox" disabled checked  id="set_id{{name.id}}" class="loaditems" > <span id="textchange_{{name.id}}">Delivered</span></label>
                                                                                                           

                                                                                                            <label for="set_id{{name.id}}"   ng-if="name.delivery_status==0"><input type="checkbox"  disabled checked  id="set_id{{name.id}}"  class="loaditems" > <span id="textchange_{{name.id}}">Loaded</span></label>
                                                                                                         
                                                                                                        </span>


                                                                                                      
                                                                                                        <?php } ?>
                                                                                                        
                                                                                                        
                                                                                                      
                                             </td>


                                               <?php
                                                                                                    }
                                                                                                    ?>
                                             
                                             
                                             
                                          </tr>
                                        
                                       

                                          
                                          
                                       </tbody>
                                            
                                     
                                       
                                       <tbody  ng-repeat="name in namesData|orderBy:column:reverse" ng-if="namecate.categories_id!=1">
                                           
                                           
                                           
                                          
                                          <tr class="{{name.picked_status == 0 ? 'disabled-div' : ''}} view"  ng-style="name.rate_edit == 1 && {'color':'red'}"   ng-if="namecate.categories_id==name.categories_id_get">
                                             
                                             
                                            <td data-label="S No">{{name.no}}</span> 
                                             
                                          
                                             <td title="{{name.categories}}" data-label="Products">
                                                 {{name.product_name_tab}}
                                                  
                                                 </td>
                                                 
                                                 
                                                 
                                                 
                                             <td  ng-if="namecate.labletype==4" data-label="Sub Products" >{{name.tile_material_name}}</td>
                                        
                                        
                                        
                                         <td  ng-if="namecate.labletype==16" data-label="Sub Products" >{{name.tile_material_name}}</td>
                                        
                                        
                                         <td  ng-if="namecate.labletype==19" data-label="Sub Products" >{{name.tile_material_name}}</td>
                                        
                                         
                                        
                                        
                                             <td  ng-if="namecate.categories_id==592" data-label="Sub Products" >{{name.tile_material_name}}</td>
                                      
                                          <td  ng-if="namecate.labletype==19" data-label="Remarks" ><input type="text" <?php echo $read; ?>   ng-blur="inputsave_1(name.id,'dim_one',namecate.categories_id,namecate.type)"   id="dim_one_{{name.id}}" value="{{name.dim_one}}"></td>
                                          <td  ng-if="namecate.labletype==19" data-label="Coil No" ><input type="text" <?php echo $read; ?>   ng-blur="inputsave_1(name.id,'dim_two',namecate.categories_id,namecate.type)"   id="dim_two_{{name.id}}" value="{{name.dim_two}}"></td>
                                      

                  
                                            
                                        
                                         
                                            
                                            
                                            
                                            
                                            <td  ng-if="namecate.labletype==19" data-label="Coil No" >
                                                
                                                
                                                
                                                
                                                <select  disabled ng-change="inputsave_1(name.id,'dim_three',namecate.categories_id,namecate.type)"  ng-model="dim_three" style="padding: 0px 0px;border: none;"  id="dim_three_{{name.id}}">
                                                     
                                                      <option  value="OPEN COIL"     ng-selected="{{name.dim_three == 'OPEN COIL'}}" >OPEN COIL</option>
                                                      <option  value="CLOSED COIL"  ng-selected="{{name.dim_three == 'CLOSED COIL'}}" >CLOSED COIL</option>
                                                       
                                                   </select>
                                                
                                                </td>
                                      
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                             <td class="sst" ng-if="namecate.labletype==11 || namecate.labletype==12" data-label="Dim 1"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'dim_one',namecate.categories_id,namecate.type)"  id="dim_one_{{name.id}}" data-title="{{name.cul}}" value="{{name.dim_one}}"></td>
                                             <td class="sst" ng-if="namecate.labletype==11 || namecate.labletype==12" data-label="Dim 2"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'dim_two',namecate.categories_id,namecate.type)"  id="dim_two_{{name.id}}" data-title="{{name.cul}}" value="{{name.dim_two}}"></td>
                                             <td class="sst" ng-if="namecate.labletype==12" data-label="Dim 3"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'dim_three',namecate.categories_id,namecate.type)"  id="dim_three_{{name.id}}" data-title="{{name.cul}}" value="{{name.dim_three}}"></td>
                                            
                                        
                                            
                                             
                                        <!-- gg changes hide for tile sheet categories -->
                                             <!-- <td ng-if="namecate.labletype==4" ng-init="productMM(name.product_id,name.uom)" data-label="{{namecate.lable}}">
                                                 
                                                  
                                                      
                                                   <select disabled ng-change="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)" ng-model="mmt" style="padding: 0px 0px;border: none;"  id="profile_{{name.id}}">
                                                   <option  value="0" ng-if="name.profile_tab==0"> Select </option>
                                                   <option ng-repeat="mmset in availableProductsmm" value="{{mmset.length_mm}}"  ng-selected="{{mmset.length_mm == name.profile_tab}}"> {{mmset.length_mm}} </option>
                                                   </select>
                                                   
                                                   
                                               
                                                   
                                                
                                                 
                                            </td> -->
                                            
                                            
                                            
                                            
                                         <td ng-if="namecate.labletype==8" class="d-none sst" data-label="{{namecate.lable}}">
    <input type="text" <?php echo $read; ?> ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)" id="profile_{{name.id}}" data-title="{{name.cul}}" value="{{name.profile_tab}}">
</td>


                                     
                                             <!-- <td ng-if="namecate.labletype==8" data-label="{{namecate.lable2}}" class="sst"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"  id="crimp_{{name.id}}"  value="{{name.crimp_tab}}"></td>  -->
                                             



                                          



                                             
                                             
                                               



                                        

                                             
                                             
                                             <td ng-if="namecate.labletype==8" style="display:none;" data-label="Back {{namecate.lable2}}">
                                                 
                                                  <select disabled ng-change="inputsave_1(name.id,'back_crimp',namecate.categories_id,namecate.type)"  ng-model="backcripm" style="padding: 0px 0px;border: none;"  id="back_crimp_{{name.id}}">
                                                     <option  value="Yes" ng-selected="{{name.back_crimp == 'Yes'}}" > Yes </option>
                                                     <option  value="No"  ng-selected="{{name.back_crimp == 'No'}}" > No </option>
                                                   </select>
                                                
                                                 </td>
                                                 
                                                 
                                                  
                                                 
                                            
                                            
                                             <!-- loges1 -->
                                             <!-- <td ng-if="namecate.labletype==10 && namecate.categories_id==19" class="sst">{{name.profile_tab}}</td>  -->

                                              <!-- <td ng-if="namecate.labletype==8" data-label="{{namecate.lable2}}"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"  id="crimp_{{name.id}}"  value="{{name.crimp_tab}}"></td> -->

                                   
                                            
                                              <td class='sst' ng-if="namecate.labletype==1 && namecate.categories_id!=627 && namecate.categories_id!=611">
                                               
                                                 <input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}" value="{{name.profile_tab}}">
                                            
                                                </td>
                                             
                                               <td class='sst' ng-if="namecate.labletype==15">
                                            
                                                  <input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}" value="{{name.profile_tab}}">
                                          
                                                
                                                </td>

                                              
                                             
                                             <td ng-if="namecate.labletype==8" style="display:none;" data-label="Back {{namecate.lable2}}">
                                                 
                                                  <select disabled ng-change="inputsave_1(name.id,'back_crimp',namecate.categories_id,namecate.type)"  ng-model="backcripm" style="padding: 0px 0px;border: none;"  id="back_crimp_{{name.id}}">
                                                     <option  value="Yes" ng-selected="{{name.back_crimp == 'Yes'}}" > Yes </option>
                                                     <option  value="No"  ng-selected="{{name.back_crimp == 'No'}}" > No </option>
                                                   </select>
                                                
                                                 </td>
                                                 
                                                 
                                                  <!-- <td ng-if="namecate.labletype==15">
                                                 
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
                                                
                                                </td> -->
                                                <td class='sst' ng-if="namecate.labletype==15">{{name.crimp_tab_convert}}</td>

                                                


                                                <td  ng-if="namecate.labletype==5 || namecate.labletype==6" data-label="Billing Options">
                                                 
                                                 
                                                 
                                                 <select disabled class="selectbox" ng-if="namecate.labletype==5"  ng-change="inputsave_1(name.id,'billing_options',namecate.categories_id,namecate.type)" id="billing_options_{{name.id}}"  ng-model="billing_options">
                                                   <option value="1" ng-if="namecate.categories_id != 611 && namecate.categories_id != 627" ng-selected="{{name.billing_options == 1}}">Running  MTR</option>
                                                   <option value="2" ng-selected="{{name.billing_options == 2}}">KG</option>
                                                   <option value="3" ng-if="namecate.categories_id==34 ||  name.categories_id == 626" ng-selected="{{name.billing_options == 3}}">SQM MTR</option>
                                               </select>
                                               
                                                <select disabled class="selectbox" ng-if="namecate.labletype==6"  ng-change="inputsave_1(name.id,'billing_options',namecate.categories_id,namecate.type)" id="billing_options_{{name.id}}"  ng-model="billing_options">
                                                   <option value="2" ng-selected="{{name.billing_options == 2}}">KG</option>
                                                   <option value="3" ng-selected="{{name.billing_options == 3}}">SQM  MTR</option>
                                               </select>

                                                 <input type="hidden" class="hidden"  value="{{name.kg_price}}"  id="kg_price_{{name.id}}">
                                                 <input type="hidden" class="hidden"  value="{{name.og_price}}"  id="rate_tab_get_{{name.id}}">
                                                 
                                                 
                                                  <input type="hidden" class="hidden"  value="{{name.kg_formula2}}"  id="kg_formula_{{name.id}}">
                                                  <input type="hidden" class="hidden"  value="{{name.og_formula}}"  id="og_formula_get_{{name.id}}">
                                                  
                                                  
                                                  
                                            </td>




                                                                                                                    <!-- FOR gI GUTTER -->
                                                                                                                                                                                                    

                                                                                                                    <td  ng-if="namecate.labletype==1 && namecate.categories_id!=30" data-label="Billing Options">
                                                                                                                        
                                                                                                                        <select disabled class="selectbox" ng-if="namecate.labletype==1"  ng-change="inputsave_1(name.id,'billing_options',namecate.categories_id,namecate.type)" id="billing_options_{{name.id}}"  ng-model="billing_options">
                                                                                                                            <option value="4" ng-if="namecate.categories_id==611 || namecate.categories_id==627" ng-selected="{{name.billing_options == 4}}">Running  fT</option>
                                                                                                                            <option value="2" ng-selected="{{name.billing_options == 2}}">KG</option>
                                                                                                                            <option value="5" ng-if="namecate.categories_id==627" ng-selected="{{name.billing_options == 5}}">NOS</option>
                                                                                                                        </select>
                                                                                                                    
                                                                                                                     </td>


                                                                                                                     <td class='sst' ng-if="namecate.labletype==1 && namecate.categories_id==627 || namecate.categories_id==611">
                                                 
                                                  
                                                  
                                                  
                                                  
                                                                                                                           <input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}" value="{{name.profile_tab}}">
                                                  
                                                  
                                                 
                                                  
                                               
                                                                                                                     </td>




                                                                                                                     

<td ng-if="namecate.labletype==0  || namecate.labletype==6 || namecate.labletype==11 || namecate.labletype==12" data-label="{{namecate.lable}}" class="sst"><input type="text" <?php echo $read; ?>  value="{{name.profile_tab}}"></td>
<td ng-if="namecate.labletype==7 && namecate.categories_id!=5" data-label="{{namecate.lable}}" class="sst"><input type="text" <?php echo $read; ?>  value="{{name.profile_tab}}"></td>

<td ng-if="namecate.categories_id!=627 && namecate.categories_id!=620 && namecate.categories_id!=39 && namecate.categories_id!=41 && namecate.categories_id!=24 && namecate.categories_id!=626 && namecate.categories_id!=611 && namecate.categories_id!=590 && namecate.categories_id!=34 && namecate.categories_id!=19 && namecate.categories_id!=36 && namecate.categories_id!=7 && namecate.categories_id!=3 && namecate.categories_id!=17 && namecate.categories_id!=595 &&  namecate.categories_id!=9 && namecate.categories_id!=593 && namecate.categories_id!=13 && namecate.categories_id!=5 && namecate.categories_id!=613" data-label="{{namecate.lable2}}" data-label="{{namecate.lable2}}" class="sst"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)" id="crimp_{{name.id}}" value="{{name.crimp_tab}}"></td>

<td ng-if="namecate.labletype==0 || namecate.labletype==6 || namecate.labletype==11 || namecate.labletype==12" data-label="{{namecate.lable2}}" class="sst"><input type="text" <?php echo $read; ?>   value="{{name.crimp_tab}}"></td> 
<td ng-if="namecate.labletype==7 && namecate.categories_id==5" data-label="{{namecate.lable}}" class="sst"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)" id="profile_{{name.id}}" value="{{name.profile_tab}}"></td> 

<td ng-if="namecate.labletype==1 && namecate.categories_id!=627 && namecate.categories_id!=611" data-label="{{namecate.lable2}}" class="sst"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)" id="profile_{{name.id}}" value="{{name.crimp_tab}}"></td> 


   
                                            
                                                <!-- loges -->
<!-- loges -->
<td ng-if="namecate.categories_id==26" class="sst">{{name.profile_tab}}</td>

<td ng-if=" namecate.labletype==5 " class="sst"> {{name.profile_tab}}</td>
<td ng-if="namecate.labletype==8"  class="sst"> {{name.profile_tab}}</td>
<td ng-if="namecate.labletype==16 && namecate.categories_id==590" class="sst"> {{name.profile_tab}}</td>

<td ng-if="namecate.labletype==10 && namecate.categories_id==19" class="sst"> {{name.profile_tab}}</td>
<td ng-if="namecate.labletype==10 && namecate.categories_id==591" class="sst"> {{name.profile_tab}}</td>

<!-- hided by gg changes cleat -->
                                            <td   data-priority="3" class="sst" ng-if="namecate.labletype!=9 && namecate.labletype!=14" data-label="UOM">
                                                  
                                                  
                                                    <span ng-if="namecate.labletype!=14">


                                                  <span value="3" ng-if="name.uom==3">FEET</span>
                                                  <span value="4" ng-if="name.uom==4">MM</span>
                                                  <span value="5" ng-if="name.uom==5">MTR</span>
                                                  <span value="6" ng-if="name.uom==6">INCH</span>
                                                  <span value="2" ng-if="name.uom==2">SQMTR</span>
                                                  <span value="7" ng-if="name.uom==7">KG</span>

                                                 
                                                    </span>
                                                   
                                                   <!-- <span ng-if="namecate.labletype==14">
                                                         NOS
                                                    
                                                    </span> -->
                                                    
                                                    
                                                    
                                                    
                                                    
                                                   
                                            </td>

                                            <td   data-priority="3" ng-if="namecate.labletype==14" data-label="UOM">
                                                  
                                                
                                                   
                                                   <span ng-if="namecate.labletype==14">
                                                         NOS
                                                    
                                                    </span>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                   
                                            </td>



                                            <td ng-if="namecate.labletype==11 || namecate.labletype==12" data-label="Dim 1"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'dim_one',namecate.categories_id,namecate.type)"  id="dim_one_{{name.id}}" data-title="{{name.cul}}" value="{{name.dim_one_convert}}"></td>
                                             <td ng-if="namecate.labletype==11 || namecate.labletype==12" data-label="Dim 2"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'dim_two',namecate.categories_id,namecate.type)"  id="dim_two_{{name.id}}" data-title="{{name.cul}}" value="{{name.dim_two_convert}}"></td>
                                             <td ng-if="namecate.labletype==12" data-label="Dim 3"><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'dim_three',namecate.categories_id,namecate.type)"  id="dim_three_{{name.id}}" data-title="{{name.cul}}" value="{{name.dim_three_convert}}"></td>
                                            



                                                        





                            <td ng-if="namecate.labletype==15"> {{name.profile_tab_convert}}</td>
                            <td  ng-if="namecate.labletype==11 || namecate.labletype==12"> {{name.profile_tab_convert}}</td>

                           
                            <td  ng-if="namecate.categories_id!=627 && namecate.categories_id!=620 && namecate.categories_id!=39 && namecate.categories_id!=41 && namecate.categories_id!=24 && namecate.categories_id!=626 && namecate.categories_id!=611  && namecate.categories_id!=590 && namecate.categories_id!=34 && namecate.categories_id!=19  && namecate.categories_id!=7  && namecate.categories_id!=17 && namecate.categories_id!=595 && namecate.categories_id!=9 && namecate.categories_id!=13 && namecate.categories_id!=613"> {{name.profile_tab_convert}}</td>

                            <td ng-if="namecate.categories_id!=13 && namecate.labletype==7 && namecate.categories_id!=5">{{name.crimp_tab_convert}}</td>

                            <td ng-if="namecate.labletype==7 && namecate.categories_id==13">{{name.profile_tab_convert}}</td>


                                            

                            <td ng-if="namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12"> {{name.profile_tab_convert}}</td>


                            <td ng-if="namecate.labletype==6 && namecate.categories_id!=36" > {{name.profile_tab_convert}}</td>


                            <td ng-if="namecate.labletype==1  || namecate.labletype==4 " > {{name.profile_tab_convert}}</td>
                            
                            <td ng-if="namecate.labletype==5" > {{name.profile_tab_convert}}</td>

                            <td ng-if="namecate.labletype==1 && namecate.categories_id!=627 && namecate.categories_id!=611">{{name.crimp_tab_convert}} </td>

                              <td ng-if="namecate.labletype==15">{{name.crimp_tab_convert}} </td>
                             <!-- gg changes for Arch Categories -->
                              <td ng-if="namecate.labletype==8">{{name.profile_tab_convert}} </td>

                              <td ng-if="namecate.labletype==8" style="display:none;">{{name.back_crimp}}</td>
                              <td ng-if="namecate.labletype==6 || namecate.labletype==0">{{name.crimp_tab_convert}}</td>

                               <td  data-priority="3" ng-if="namecate.labletype!=19 && namecate.labletype!=9 && namecate.labletype!=14"  data-label="UOM">

                                         <span ng-if='name.uom==2'>SQFT</span>
                                         <span ng-if='name.uom!=2'>FEET</span>
                                              
                               </td>


 
                                            <!-- loges -->
                                                  
                                             <td data-label="Nos" ng-if="namecate.labletype!=9">
                                                 
                                                {{name.bill_nos}}
                                                
                                                
                                                 
                                            </td>
                                                 
                                                 
                                            <?php
                                                 if($readdriver=='')
                                                 {
                                                    if($driver_pickip != 1){ ?>
                                                        
                                                        <td ng-if="namecate.labletype!=9">

                                                                <span  ng-if='name.dispatch_nos==0' >{{name.packed_nos_data}}</span>
                                                                <span  ng-if='name.dispatch_nos>0' >{{name.dispatch_nos}}</span>


                                                        </td> 

                                             <?php
                                                 } }
                                                 
                                                 ?>



                                          


                                              <td ng-if="namecate.labletype!=9"> 

                                                 <?php
                                                 if($readdriver=='')
                                                 {

                                                    if(count($DC_list)==0)
                                                    {
                                                     ?>
                                                      <span ng-if='name.dispatch_nos==0'>

                                                       <span ng-if='name.packed_nos>0'>
                                                       <input type="text" disabled ng-blur="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"    data-val="{{name.bill_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.packed_nos}}">
                                                       </span>
                                                    
                                                     </span>


                                                      <span ng-if='name.dispatch_nos>0'>
                                                       <input type="text" disabled ng-blur="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"    data-val="{{name.bill_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.packed_nos}}">
                                                    
                                                     </span>
                                                     
                                                     <?php
                                                     }
                                                     else
                                                     {
                                                        ?>


                                                         <span ng-if='name.dispatch_nos==0'>

                                                       <span ng-if='name.packed_nos>0'>
                                                       <input type="text" disabled ng-blur="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"    data-val="{{name.packed_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.packed_nos}}">
                                                       </span>
                                                    
                                                     </span>


                                                      <span ng-if='name.dispatch_nos>0'>
                                                       <input type="text" disabled ng-blur="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"    data-val="{{name.packed_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.packed_nos}}">
                                                    
                                                     </span>

                                                        <?php

                                                     }

                                                 }
                                                 else
                                                 {
                                                    ?>
                                                   <span  ng-if='name.packed_nos>0' >{{name.packed_nos}}</span>

                                                    <?php
                                                 }
                                                 
                                                 ?>
                                              

                                            </td >

                                            <?php if($driver_pickip !=1) { ?>
                                                        <td ng-if="namecate.labletype!=9">

                                                    
                                                        
                                                        <span   >{{name.transit_delivered}}</span>



                                                        </td>
                                            <?php } ?>


                                            <td data-label="Nos" ng-if="namecate.labletype==9">
                                                 
                                                {{name.bill_nos}}
                                                
                                                
                                                 
                                            </td>

                                            <td data-label="Nos" ng-if="namecate.labletype==19 && namecate.categories_id==593">
                                                 
                                                {{name.bill_nos}}
                                                
                                                
                                                 
                                            </td>


                                              <?php
                                                 if($readdriver=='')
                                                 {
                                                    
                                                    if($driver_pickip !=1) { 
                                                     ?>     
                                            <td ng-if="namecate.labletype==19 || namecate.labletype==9">

                                                    <span  ng-if='name.dispatch_nos==0' >{{name.packed_nos_data}}</span>
                                                     <span  ng-if='name.dispatch_nos>0' >{{name.dispatch_nos}}</span>


                                           </td> 

                                             <?php
                                             } }
                                             ?>
                                              <td ng-if="namecate.labletype==9 || namecate.labletype==19"> 

                                                 <?php
                                                 if($readdriver=='')
                                                 {

                                                    if(count($DC_list)==0)
                                                    {
                                                     ?>
                                                      <span ng-if='name.dispatch_nos==0'>

                                                       <span ng-if='name.packed_nos>0'>
                                                       <input type="text" disabled ng-blur="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"    data-val="{{name.bill_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.packed_nos}}">
                                                       </span>
                                                    
                                                     </span>


                                                      <span ng-if='name.dispatch_nos>0'>
                                                       <input type="text" disabled ng-blur="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"    data-val="{{name.bill_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.packed_nos}}">
                                                    
                                                     </span>
                                                     
                                                     <?php
                                                     }
                                                     else
                                                     {
                                                        ?>


                                                         <span ng-if='name.dispatch_nos==0'>

                                                       <span ng-if='name.packed_nos>0'>
                                                       <input type="text" disabled ng-blur="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"    data-val="{{name.packed_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.packed_nos}}">
                                                       </span>
                                                    
                                                     </span>


                                                      <span ng-if='name.dispatch_nos>0'>
                                                       <input type="text" disabled ng-blur="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"    data-val="{{name.packed_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.packed_nos}}">
                                                    
                                                     </span>

                                                        <?php

                                                     }

                                                 }
                                                 else
                                                 {
                                                    ?>
                                                   <span  ng-if='name.packed_nos>0' >{{name.packed_nos}}</span>

                                                    <?php
                                                 }
                                                 
                                                 ?>
                                              

                                            </td>

                                            <?php if($driver_pickip !=1) { ?>
                                                    <td ng-if="namecate.labletype==9 || namecate.labletype==19"> 

                                                            <span   >{{name.transit_delivered}}</span>

                                                    </td>
                                            <?php  }  ?>


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
                                             
                                            
                                             <!-- Theoretical QTY -->

                                             <td  data-label="Qty"  ng-if="namecate.labletype!=9"  > 
                                            
                                            
                                              <span >{{name.activel_qty}}</span>
                                           
                                            
                                            
                                            
                                              </td>
                                            
                                             
                                               <td  data-label="Qty"  ng-if="namecate.labletype!=9"  > 
                                            
                                            
                                              <span >{{name.qty_tab}}</span>
                                           
                                            
                                            
                                            
                                              </td>
                                             
                                             <td ng-if="namecate.labletype!=9"><span class="loadamount"  id="qty_{{name.id}}">{{name.loadqty}}</span></td>
                                             
                                             
                                             <td  data-label="Amount" class="amounttot_{{namecate.categories_id}}">
                                                 
                                                 <span >{{name.amount_tab}}</span>
                                             
                                                
                                             
                                             
                                             </td>
                                             
                                              <td  >
                                                 
                                                 
                                             
                                                 <span class="loadamount"  id="amount_{{name.id}}">{{name.loadamount}}</span>
                                             
                                             </td>
                                                                                            <!-- gg changes reference image -->
                                                                                            <td ng-if="namecate.cate_status==1"> 
                                                                                                                     {{name.sub_product_name_tab}}

                                                                                                                     <br>
                                                                                                                     <span ng-if="name.reference_image != null && name.reference_image != ''"><br><br>
                                                                                                                        <a href="<?php echo base_url(); ?>{{ name.reference_image }}" style="margin: 15px 5px;" target="_blank"> 
                                                                                                                            <img src="<?php echo base_url(); ?>{{ name.reference_image }}" style="width: 200px; border: #4a4a4a solid 1px;" class="{{ name.attachment }}" data-attachment="{{ name.attachment }}">
                                                                                                                        </a>
                                                                                                                    </span>




                                                                                                        </td>


                                                                                 <!-- Status 1st leg -->
                                             <?php 
     


                                                                                            if($approved_view==0)
                                                                                            {


                                                                                              ?>
                                          
                                             <td data-label="Action" class="last-colorchange" ng-style="{'background': (name.packed_nos>0 && name.dispatch_nos==0) ? '#fafafa' : ''}">
                                                 


                                                            <?php if($driver_pickip ==1) { ?>
                                                                <!-- <span ng-if="name.unlode_check_box==1 && name.loadstatus==1"> -->

                                                                <!-- gg changes show load pending for only to driver -->

                                                                            <!-- <label ng-if="name.packed_nos_data!=0&&name.delivery_status==0&&name.loadstatus==0&&name.picked_status==0 && name.enable_load_pending==0"for="set_id{{name.id}}" >Pick Pending</label>

                                                                            <label ng-if="name.packed_nos_data!=0&&name.delivery_status==0&&name.loadstatus==0&&name.picked_status==0 && name.enable_load_pending==1"for="set_id{{name.id}}" >Load Pending</label>

                                                                            <label  ng-if="name.loadstatus==1 && name.packed_nos_data!=null"><input type="checkbox"   <?php //echo $disabled; ?>  checked   class="loaditems"> <span id="textchange_{{name.id}}">Loaded</span></label>
                                                                            <label  ng-if="name.picked_status==1&&name.loadstatus==0 && name.packed_nos_data==null"><input type="checkbox"   <?php //echo $disabled; ?>  checked   class="loaditems"> <span id="textchange_{{name.id}}">Loaded</span></label> -->


                                                                                        <!-- Check if the item is Loaded -->
                                                                                        <label ng-if="name.loadstatus == 1 && name.packed_nos_data != null">
                                                                                            <input type="checkbox" <?php echo $disabled; ?> checked class="loaditems"> 
                                                                                            <span id="textchange_{{name.id}}">Loaded</span>
                                                                                        </label>

                                                                                        <!-- Else, check for Load Pending or Pick Pending -->
                                                                                        <label ng-if="!(name.loadstatus == 1 && name.packed_nos_data != null) && name.loadstatus == 0 && name.packed_nos_data != 0 && name.picked_status == 0">
                                                                                            <span ng-if="name.enable_load_pending == 1">Load Pending</span>
                                                                                            <span ng-if="name.enable_load_pending == 0">Pick Pending</span>
                                                                                        </label>
                                                                            

                                                                                                            
                                                                <!-- </span> -->
                                                            <?php }else { ?>

                                                                <label ng-if="name.picked_status==0&&name.loadstatus==0&&name.delivery_status==0" >Pick Pending</label>
                                                                <label ng-if="name.packed_nos_data==0&&name.picked_status==1&&name.loadstatus==0&&name.delivery_status==0" ><input type="checkbox" disabled checked  class="loaditems" > Loaded</label>



                                                                                        <span ng-if="name.unlode_check_box==1">
                                                                                            
                                                                                            <label for="set_id{{name.id}}" title="Delivered" ng-if="name.delivery_status==1"><input type="checkbox" disabled checked value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Loaded</span></label>

                                                                                           </span>
                                               

                                                                                                        <span ng-if="name.loadstatus==0 && name.unlode_check_box==0">
                                                                                                            
                                                                                                            <label for="set_id{{name.id}}" ng-if="name.delivery_status==0 && name.packed_nos_data!=null && name.packed_nos_data!=0"><input type="checkbox" value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" <?php echo $disabled; ?> class="loaditems"  name="loaditems"> <span id="textchange_{{name.id}}" >Load</span></label>
                                                                                                            <label for="set_id{{name.id}}" title="Delivered" ng-if="name.picked_status==1&&name.delivery_status==0&&name.packed_nos_data==null"><input type="checkbox" disabled checked  id="set_id{{name.id}}"  class="loaditems" > <span id="textchange_{{name.id}}">Loaded</span></label>
                                                                                                            <label for="set_id{{name.id}}" title="Delivered" ng-if="name.delivery_status==1"><input type="checkbox" disabled checked  id="set_id{{name.id}}"  class="loaditems" > <span id="textchange_{{name.id}}">Loaded</span></label>

                                                                                                        </span>
                                                                                                        
                                                                                                        <span ng-if="name.loadstatus==1 && name.unlode_check_box==0">


                                                                                                          
                                                                                                            
                                                                                                            <label for="set_id{{name.id}}" title="Delivered" ><input type="checkbox"  checked value="{{name.id}}" id="set_id{{name.id}}" ng-click="loadProduct(name.id)" class="loaditems" name="loaditems"> <span id="textchange_{{name.id}}">Loaded</span></label>
                                                                                                           

                                                                                                         
                                                                                                        </span>

                                                                                                        <span ng-if="name.loadstatus==1 && name.unlode_check_box==1">


                                                                                                          
                                                                                                            
                                                                                                            <label for="set_id{{name.id}}" title="Delivered" ><input type="checkbox" disabled checked  id="set_id{{name.id}}"  class="loaditems" > <span id="textchange_{{name.id}}">Loaded</span></label>
                                                                                                           

                                                                                                         
                                                                                                        </span>


                                                                                                          <span ng-if="name.loadstatus==1 && name.allreadyloaded==1">


                                                                                                          
                                                                                                            
                                                                                                            <label for="set_id{{name.id}}" title="Delivered" ng-if="name.delivery_status==1"><input type="checkbox" disabled checked  id="set_id{{name.id}}" class="loaditems" > <span id="textchange_{{name.id}}">Delivered</span></label>
                                                                                                           

                                                                                                            <label for="set_id{{name.id}}"   ng-if="name.delivery_status==0"><input type="checkbox"  disabled checked  id="set_id{{name.id}}"  class="loaditems" > <span id="textchange_{{name.id}}">Loaded</span></label>
                                                                                                         
                                                                                                        </span>


                                                                                                      
                                                                                                        <?php } ?>
                                                                                                        
                                                                                                        
                                                                                                      
                                             </td>


                                               <?php
                                                                                                    }
                                                                                                    ?>
                                             
                                             
                                             
                                             
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

                                                                  <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                          <li class="float-end">

<?php 
     

        if($approved_view==1)
        {


          ?>

<!-- <input type="button"  value="Rejected" ng-click="approved('0','<?php echo $DC_id; ?>')" class="btn btn-danger"> -->

        <?php

        }
      else
      {

        ?>
<a href="javascript: void(0);" class="btn btn-primary"  ng-click="Proceedtocomplete_only_save()"   data-bs-toggle="modal"
                                                                    data-bs-target=".confirmModal"><i class="mdi mdi-thumb-up pe-1"></i>Save</a>



        <?php
      }
 
      ?>

                                                            


                                                                </li>
                                                        </ul>
                                                                
                                                            </div>

                                                           

                                                             <div class="col-md-2" style="float:right;">

                                                              <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                          <li class="float-end">
<?php 
     


            if($approved_view==1)
            {


              ?>
    <input type="button" style="float: right;" value="Approved" ng-click="approved('1','<?php echo $DC_id; ?>')" class="btn btn-success">


            <?php

            }
            else
          {

            ?>
     <a href="javascript: void(0);" class="btn btn-primary"  ng-click="Proceedtocomplete()"   id="Proceedtocomplete"><i class="mdi mdi-thumb-up pe-1"></i>Save & Complete  </a>


            <?php
          }


      
 
      ?>



                                                           </li>
                                                        </ul>
                                                            </div>


                                                        </div>

                                                          </div>

                                                        
                                                    </div>
                                                   
                                                    
                                                    
                                              <br><br><br><br> <br><br><br><br>       
                                                    
                                                    
                                                    
                                                    
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
     
       <!-- For one rupee issue -->
      <input type="hidden" id="sum_bill_nos" name='sum_bill_nos' value="">

 <div class="bottom-sheet profile-bottom-sheet">
            <p class="text-center">Are you sure you want to logout, <span id="customerName"><?php echo $this->session->userdata['logged_in']['username']; ?></span>?</p>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="<?php echo base_url(); ?>index.php/adminmain/transpotlogout" class="btn btn-danger mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="#ffffff">
                        <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 
                        102-102H360v-80h327L585-622l55-58 200 200-200 200Z" fill="#ffffff"/></svg>Yes,Logout</a>
                    <button type="button" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#ffffff">
                          <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" fill="#ffffff"/>
                        </svg>Cancel</button>
                </div>
            </div>
       </div>
      
      <div class="bottom-nav">
        <div class="icon" id="home">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
               <path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/>
            </svg>
            <a href="<?php echo base_url(); ?>">Home</a>
        </div>
       
       
        
        <div class="icon" id="profile">
            <!-- SVG icon for Profile -->
            <!-- Replace this with your Google icon SVG code for Profile -->
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 
                47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 
                18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58
                18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5
                15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm40-120q33 
                0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240ZM400-560q33
                0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Zm12 400Z"/></svg>
                Profile
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




            // gg chnages



            app.filter('indianCurrency', function () {
                return function (input) {
                    if (!isNaN(input)) {
                        if (input != 0 && input != null) {
                            if (isNaN(input)) return input;

                            var isNegative = false;
                            if (input < 0) {
                                isNegative = true;
                                input = Math.abs(input);
                            }

                            var formattedValue = parseFloat(input);
                            var decimal = formattedValue.toLocaleString('en-IN', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2,
                            });

                            if (isNegative) {
                                decimal = '-' + decimal;
                            }

                            return decimal;
                        } else {
                            return '0';
                        }
                    }
                };
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
 
 
 
 
 
 
 
 
 
 
 
 
$scope.approved = function(id,dc_id)
{
                if(confirm("Are you sure you want to proceed it?"))
                {
                  

                 $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/pack_approved_status",
                    data:{'id':id,'dc_id':dc_id}
                  }).success(function(data){
                   
                   if(id==1)
                   {
                      alert('Approved'); 
                      window.close();
                   }
                   else
                   {
                       alert('Rejected'); 
                       window.close();
                   }
                         
                    
                  });
               }

};

 
 
 
 
 
  $scope.loadProductAll = function() {
      
      
       if($('#checkall').is(':checked'))
       {
      
        var status=1;
          $('.loaditems').each(function () {
            
                var id= $(this).val();
               
                $('.loaditems').prop('checked',true);
                $('#textchange_'+id).text('Loaded');
           
              var DC_id='<?php echo $DC_id; ?>';
           
                 $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                    data:{'id':id,'status':status,'DC_id':DC_id,'driver_pickip':'<?php echo $driver_pickip; ?>', 'action':'loadstatus'}
                  }).success(function(data){
                   
                   $scope.fetchSingleDatatotaldel();
                    $scope.fetchData();
                   
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
           
             
            var DC_id='<?php echo $DC_id; ?>';
                 $http({
                    method:"POST",
                    url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                    data:{'id':id,'status':status,'DC_id':DC_id,'driver_pickip':'<?php echo $driver_pickip; ?>','action':'loadstatus'}
                  }).success(function(data){
                   $scope.fetchSingleDatatotaldel();
                    $scope.fetchData();
                   
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
   
    
     var DC_id='<?php echo $DC_id; ?>';
    
    $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id,'status':status,'DC_id':DC_id, 'driver_pickip':'<?php echo $driver_pickip; ?>','action':'loadstatus'}
      }).success(function(data){
       $scope.fetchSingleDatatotaldel();
        $scope.fetchData();
      }); 
  
  
  
 };
 
 
 
 
    $scope.Proceedtocomplete_only_save = function() {
  
  
 var driver_pickip='<?php echo $driver_pickip; ?>';
 var access='<?php echo $this->session->userdata['logged_in']['access']; ?>';
 var trip_id='<?php echo $trip_id; ?>'; 
  var vehicle_id='<?php echo $vehicle_id; ?>'; 
 var count=$('input[name="loaditems"]:checked').length;

   
 var DC_id='<?php echo $DC_id; ?>';

  if(count==0)
  {
      alert('Select All the checkbox..');
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

                        
       window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id="+vehicle_id+"&delivery_status=2&trip_id="+trip_id+"&DC_id="+DC_id);


                     }
                     else
                     {
                         
                         
                          if(driver_pickip==1)
                         {


        window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id="+vehicle_id+"&delivery_status=2&trip_id="+trip_id+"&DC_id="+DC_id);


                               //history.back();
                         }
                         else
                         {
                               window.location.replace("<?php echo base_url(); ?>index.php/order/vehicle_wise_assigned");
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
 var DC_id='<?php echo $DC_id; ?>';

 var access='<?php echo $this->session->userdata['logged_in']['access']; ?>';
   

 var total_count=$('input[name="loaditems"]').length;
 var count=$('input[name="loaditems"]:checked').length;


 if(count!=total_count && driver_pickip==0)
 {
      alert('Select All the checkbox..');
  }
  else
  {
        //if(confirm("Are you sure you want to Complete?"))
        //{


                  $('#Proceedtocomplete').hide();
            
            
                 $http({
                 method:"POST",
                 url:"<?php echo base_url() ?>index.php/order/insertandupdate",
                 data:{'status':0,'DC_id':'<?php echo $DC_id; ?>', 'order_id':'<?php echo $id; ?>','driver_pickip':'<?php echo $driver_pickip; ?>','action':'loadcompleted','tablenamemain':'orders_process'}
                 }).success(function(data)
                 {
                     
                     
                     if(access==13)
                     {
        window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id="+vehicle_id+"&delivery_status=2&trip_id="+trip_id+"&DC_id="+DC_id);
                     }
                     else
                     {
                         
                         
                         if(driver_pickip==1)
                         {


          window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id="+vehicle_id+"&delivery_status=2&trip_id="+trip_id+"&DC_id="+DC_id);


                               //history.back();
                         }
                         else
                         {
                                 window.location.replace("<?php echo base_url(); ?>index.php/order/vehicle_wise_assigned");
                         }
                          
                          
                     }
                     
                    
                     
                       //alert('success'); 
                       //history.back();
               
               
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

































































$scope.inputsave_1 = function (id,inputname,categories_id,type) {


                    
                     
                     
                          var fieds=inputname+'_'+id;
                          var values=$('#'+fieds).val();
                          
                          var checkval=$('#'+fieds).data('val');
                          var moveforwrd=1;
                          if(checkval<values)
                          {
                              alert('input max value of order nos');
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
                               
                               // var sqt_qty=profile*nos*fact;
                               // var sqt_qty=sqt_qty.toFixed(3);


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
                                                  // var old_sqt_qty=sqts*nos;


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
                      
                    
                      
                      
                      if(moveforwrd==1)
                      {


            
                       $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $id; ?>&DC_id=<?php echo $DC_id; ?>",
                          data:{'totalammt':totalammt,'DC_id':'<?php echo $DC_id; ?>','rate':rate,'qty':sqt_qty,'nos':values,'id':id,'action':'Loadinsertproductdata'}
                        }).success(function(data){
                    
                          if(data.error != '1')
                          {
                              
                              
                                  $scope.fetchSingleDatatotaldel();
                              
                               
                          }
                             
                       });
                       

                       }
           
           
  

      

}




























$scope.fetchDataCategorybase = function(id){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetchDataCategorybase_delivery?order_id=<?php echo $id; ?>&DC_id=<?php echo $DC_id; ?>&driver_pickip=<?php echo $driver_pickip; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert='+id).success(function(data){
      
      
      
      
      $scope.namesDatacate = data;
      
      
      
      
      
      
      
      
    });
    
   
  
   
  };







$scope.fetchData = function(){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_delivery_data_by_load?order_id=<?php echo $id; ?>&DC_id=<?php echo $DC_id; ?>&driver_pickip=<?php echo $driver_pickip; ?>&tablenamemain=<?php echo 'orders_process'; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert=1').success(function(data){
      $scope.namesData = data;

// For one rupee issue
      var pending_count = 0;
                            for(var i = 0; i < data.length; i++){
                                var amount = parseFloat(data[i].bill_nos-data[i].empty_loadnos);
                                pending_count += amount;
                            }
                       
                            $('#sum_bill_nos').val(pending_count);
                            $scope.fetchSingleDatatotaldel();





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
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_totaldel_pickup?order_id=<?php echo $id; ?>&DC_id=<?php echo $DC_id; ?>",
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
    // For one rupee issue
    var sum_bill_nos=$('#sum_bill_nos').val();
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_totaldel?order_id=<?php echo $id; ?>&DC_id=<?php echo $DC_id; ?>&DC_id=<?php echo $DC_id; ?>&sum_total_nos="+sum_bill_nos,
      data:{'action':'fetch_single_data','tablenamemain':'orders_process','driver_pickip':'<?php echo $driver_pickip; ?>','tablename_sub':'order_product_list_process','convert':'1'}
      }).success(function(data){

       $scope.fulltotaldel = data.fulltotal;
       $scope.tcsamount = data.tcsamount;
       $scope.tcs_status = data.tcs_status;
          

          if(data.loadtotalamount>0)
          {
              $scope.loadtotalamount = data.loadtotalamount;
          }
          else
          {
             $scope.loadtotalamount = 0;
          }

         
        $scope.unbilledloadamount = data.unbilledloadamount;
        $scope.deliveredamount = data.deliveredamount;

        // For one rupee issue

          //var already_loaded_dc_amount='<?php echo array_sum($already_loaded_value);  ?>';
         
          
        //   var picked_driver_panel="<?php echo $driver_pickip; ?>";
        //   if(picked_driver_panel !=1) {
        //     var   finalbalnce=data.fulltotal-data.picked_amount-already_loaded_dc_amount;
        //   }else {
        //     var   finalbalnce=data.fulltotal-already_loaded_dc_amount;
        //   }
      
        // if(finalbalnce>0)
        //  {
        //   $scope.finalbalnce=finalbalnce;
        //  }
        //  else
        //  {
        //   $scope.finalbalnce=0;
        //  }

 
         var picked_driver_panel="<?php echo $driver_pickip; ?>";
          if(picked_driver_panel !=1) {
            var   finalbalnce=data.fulltotal-data.picked_amount-data.already_loaded_value_onpage;
          }else {

         
            var   finalbalnce=data.fulltotal-data.already_loaded_value_onpage-data.finalbalnce_amount;
            //alert(data.fulltotal);
            //alert(data.already_loaded_value_onpage);
            //alert(data.finalbalnce_amount);
          }
      
        if(finalbalnce>0)
         {
          $scope.finalbalnce=finalbalnce;
         }
         else
         {
          $scope.finalbalnce=0;
         }






       
       $scope.commissiondel = data.commission;

        $scope.lengeth = data.lengeth;
         $scope.trip_id = data.trip_id;
$scope.reason = data.reason;

   

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


$(document).ready(function () {
    let filterActive = false;
    let profileActive = false;

    // Show/hide bottom sheet for Profile icon click
    $("#profile").on("click", function () {
        if (!profileActive) {
            $(".filter-bottom-sheet").removeClass("bactive").css("bottom", "-100%");
            $(".profile-bottom-sheet").addClass("bactive");
            profileActive = true;
            filterActive = false;
            $(".backdrop").fadeIn();
        } else {
            $(".profile-bottom-sheet").removeClass("bactive").css("bottom", "-100%");
            profileActive = false;
            if (!filterActive) $(".backdrop").fadeOut();
        }
    });

    // Show/hide bottom sheet for Filter icon click
    $("#filter").on("click", function () {
        if (!filterActive) {
            $(".profile-bottom-sheet").removeClass("bactive").css("bottom", "-100%");
            $(".filter-bottom-sheet").addClass("bactive");
            filterActive = true;
            profileActive = false;
            $(".backdrop").fadeIn();
        } else {
            $(".filter-bottom-sheet").removeClass("bactive").css("bottom", "-100%");
            filterActive = false;
            if (!profileActive) $(".backdrop").fadeOut();
        }
    });

    // Close bottom sheets and backdrop when clicking outside of them
    $(document).on("click", function (event) {
        if (!$(event.target).closest(".filter-bottom-sheet, #filter, .profile-bottom-sheet, #profile").length) {
            $(".filter-bottom-sheet, .profile-bottom-sheet").removeClass("bactive").css("bottom", "-100%");
            $(".backdrop").fadeOut();
            filterActive = false;
            profileActive = false;
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
element.style {
    width: !important 1240px;
    margin:0 auto;
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