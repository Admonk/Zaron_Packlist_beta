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
.sst {
    background: #d1d1d1 !important;
    /* font-family: 'Roboto', Arial, sans-serif; */
    font-weight: 600;
}
.modal-xl {
    max-width: 1395px;
}
.hidden{
    display: none;
}

#progrss-wizard {
    padding: 25px;
}
img.img-responsive {
    width: 100%;
}
th.table-width-3 {
    width: 5%;
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
/*#google_translate_element{
    
    float:right;
}*/
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
        
        /*header,.customize-table
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

        body[data-layout=horizontal] .page-content .container-fluid
        {
            padding: 0px;
        }
        #progrss-wizard {
            padding: 10px;
        }
        .route p span:first-child
        {
            font-size: 16px;
        }
        .time {
            
            width: 100%;
            flex-direction: column;
         }


         .time  p{

            text-align: center;
         }
         .time p span {
    text-align: center;
}
div#progress-company-document .time,#progress-bank-detail .time {
    flex-direction: row;
    flex-wrap: wrap;
}

div#progress-company-document .time > *,#progress-bank-detail .time > * {
    width: 50%;
    background: #f9f9f9;
    padding: 14px 0px;
    margin: 0px;
}

div#progress-company-document .time p:nth-child(1),#progress-bank-detail .time p:nth-child(1) {
    background: #ededed;
}

div#progress-company-document .time p:nth-child(2),#progress-bank-detail .time p:nth-child(2) {
    background: #e7e7e7;
}

div#progress-company-document .time p:nth-child(3),#progress-bank-detail .time p:nth-child(3) {
    background: #e3e3e3;
}

div#progress-company-document .time p:nth-child(4),#progress-bank-detail .time p:nth-child(4) {
    background: #eeee;
}
.tab-content>.active   h5 {
    border-bottom: 1px solid #eee;
    border-top: 1px solid #eee;
    padding-bottom: 10px;
    margin-bottom: 20px;
    padding-top: 12px;
    background: #1c84ee;
    color: #fff;
}
        }


        /* table design issue fixed */

td input[type="text"] {
    display: block;
    border: 0;
    top: 0px;
    outline: none;
    position: relative;
    left: 0;
    width: 100%;
    padding: 0px 3px;
    height: 100%;
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
                                                            <h5 class="text-center text-md-start">Customer Details  </h5>
                                                             <input type="hidden" class="hidden" id="lat" >
                                                             <input type="hidden" class="hidden" id="laog" >
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
                                                                        
                                                                        <input class="form-control" type="hidden" class="hidden" value="0" id="km_reading_end">
                                                                       </div>
                                                                       
                                                        </div>
                                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            <li class="next"><a href="javascript: void(0);" class="btn btn-primary" >Reached Location <i
                                                                        class="bx bx-chevron-right ms-1"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane" id="progress-company-document" >
                                                      <div>
                                                        <div class="text-start mb-2">
                                                            <h5 class="text-center text-md-start">Payment Details</h5>
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


                                                             
                                                                <?php
                                                                $i = 1;
                                                                $already_loaded_value=[];
                                                                
                                                                foreach ($DC_list as $dd) { 

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

                                                                    <p>DC ID <?php echo $i; ?> : <a
                                                                            href="<?php echo base_url(); ?>index.php/order/delivery_note?order_id=<?php echo base64_encode($dd->order_id); ?>&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process&viewstatus=1&DC_id=<?php echo $dd->randam_id; ?>&dc_count=<?php echo $i; ?>"
                                                                            target="_blank"><?php echo $dd->randam_id; ?></a>
                                                                </p>




                                                                    <?php
                                                                    $i++;
                                                                }

                                                                ?>
                                                        

                                                            </div>


                                                                <div class="time">
                                                                  
                                                                  <p><span>Invoice</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>
                                                                  <a  target="_blank" href="<?php echo base_url(); ?>index.php/order/overview?order_id=<?php echo base64_encode($id); ?>&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process" >Overview</a> 

                                                                  
                                                                  
                                                                      
                                                                  </span></p>
                                                                  <!--<p><span>DC</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span></p>-->
                                                                  <p><span> Bill Amount</span><span> Rs. {{fulltotaldel | indianCurrency }}</span></p>
                                                                   <!-- <p ng-if="tcsamount>0"><span>TCS (+)</span><span> Rs. {{tcsamount}}</span></p> -->
                                                                  

   <p ng-if="delivery_charge>0"><span>Delivery Charge</span><span> Rs. {{delivery_charge | indianCurrency }}</span></p>
                                                              

<p><span>SubTotal</span><span> Rs. {{collection_remarks | indianCurrency }}</span></p>

 <p ng-if="loading_status==0"><span>Amount to collect</span><span> Rs. {{collection_remarks | indianCurrency }}</span></p>
 <p ng-if="loading_status==1"><span>Amount to collect</span><span> Rs. {{collection_remarks | indianCurrency }}</span></p>






                                                               



<input type='hidden'  id='return_hidden_amount' value='{{return_amount}}'>
<input type="hidden" class="hidden" name="is_collection_remarks" value="{{is_collection_remarks}}" id="is_collection_remarks">
<p ng-if="return_amount>0"><span>Return</span><span> Rs. {{return_amount}}</span></p>
<p ng-if="return_amount>0"><span>Balance </span><span> Rs. {{collection_remarks-return_amount}}</span></p>




                                                    <!--   <p ng-if="collection_remarks"><span>Collect Amount</span><span> Rs. {{discountfulltotal-collection_remarks}}</span></p> -->
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
                                                                                
                                                                            

                                                                            <div class="order-summary">
              <div class="table-responsive" ng-init="fetchDataCategorybase(1)">

















                <div navigatable ng-init="fetchData('1')">
                  <div class="navclass">
                    <div ng-repeat="namecate in namesDatacate">




                      <h5 style="text-align: left; margin: 9px auto;">{{namecate.no}}. {{namecate.categories_name}}
                      </h5>

                      <div data-pattern="priority-columns">
                        <table id="datatable design_table" border="yes" style="width:100%;">







                          <thead class="bg-gray text-red" ng-if="namecate.categories_id==1">



                            <tr>


                              <th class="table-width-3" rowspan="2">S.No</th>
                              <th rowspan="2">Products </th>


                              <th class='sst' ng-if="namecate.labletype==2 || namecate.labletype==1" style="padding-bottom:0px">
                                {{namecate.lable}}</th>
                              <th class='sst' ng-if="namecate.labletype==2">Length </th>

<!-- hide by cleat -->

                              <th class='sst'  ng-if="namecate.labletype!=14">UOM<small>(Billing)</small></th>


                              <th ng-if="namecate.labletype==2 || namecate.labletype==1" style="padding-bottom:0px">
                                {{namecate.lable}}</th>
                              <th  ng-if="namecate.labletype==2">Length </th>

<!-- hide by cleat -->
                              <th ng-if="namecate.labletype!=14">UOM<small>(Default)</small></th>



                              <th class="table-width-6" ng-if="namecate.labletype==2 || namecate.labletype==1"
                                rowspan="2" style="padding-bottom:0px;text-align:left;">QTY ({{namecate.lablenos}})
                              </th>


                              <th class="table-width-10"  rowspan="2" >Net Rate </th>

                              <th style="text-align:left;">{{namecate.uom}} </th>


                              <th> Remarks</th>


                              <th ng-if="namecate.cate_status==1">Attachment</th>

                              <th>Amount</th>

                            </tr>



                          </thead>



                          <thead class="bg-gray text-red" ng-if="namecate.categories_id!=1">



                            <tr>
                              <th class="table-width-3" rowspan="2">S.No </th>
                              <th rowspan="2">Products </th>

                              <th class="table-width-18" ng-if="namecate.labletype==4"
                                rowspan="2">Tile Material </th>
                              <th class="table-width-18" ng-if="namecate.labletype==16 || namecate.labletype==19"
                                rowspan="2">Material Specfication </th>
                              <th class="table-width-18" ng-if="namecate.categories_id==592" rowspan="2"
                                data-priority="1">Description</th>

                              <th ng-if="namecate.labletype==19">Remarks
                              </th>


                              <th ng-if="namecate.labletype==19">Coil_no
                              </th>



                              <th ng-if="namecate.labletype==19">Coil_Status
                              </th>

                              <th ng-if="namecate.labletype==5 || namecate.labletype==6">Billing Option</th>
                              <th
                                ng-if="namecate.labletype==1 && namecate.categories_id==627 || namecate.categories_id==611">
                                Billing Option</th>

                              <th class='sst' ng-if="namecate.labletype==11 || namecate.labletype==12">Dim 1</th>
                              <th class='sst' ng-if="namecate.labletype==11 || namecate.labletype==12">Dim 2</th>
                              <th class='sst' ng-if="namecate.labletype==12">Dim 3</th>


                              <th class='sst'
                                ng-if="namecate.labletype==8 ||  namecate.labletype==1 || namecate.labletype==15 ||  namecate.labletype==4 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12"
                                style="padding-bottom:0px">{{namecate.lable}} </th>


                              <!-- <th class="table-width-10" ng-if="namecate.labletype==8" style="padding-bottom:0px">Extra {{namecate.lable}} </th> -->
                              <th ng-if="namecate.labletype==8" style="display:none;" style="padding-bottom:0px">Back
                                {{namecate.lable}} </th>
                              <th class='sst'
                                ng-if="namecate.labletype==6 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==15">
                                {{namecate.lable2}} </th>
                              <th class='sst' ng-if="namecate.labletype==1 && namecate.categories_id==30|| namecate.categories_id==3">
                                {{namecate.lable2}} </th>

                              <th class='sst' ng-if="namecate.labletype==7 && namecate.categories_id!=13 && namecate.categories_id!=5">
                                {{namecate.lable2}} </th>

                              <th class='sst' ng-if="namecate.labletype==7 && namecate.categories_id==40 || namecate.categories_id==608">
                                {{namecate.lable2}} </th>

                              <th class='sst' ng-if="namecate.labletype==7 && namecate.categories_id==582">
                                {{namecate.lable2}} </th>

<!-- hide by cleat -->

                              <th class='sst' ng-if="namecate.labletype!=9 && namecate.labletype!=14">UOM<small>(Billing)</small></th>
                              <th ng-if="namecate.labletype==14">UOM</th>


                              <th ng-if="namecate.labletype==11 || namecate.labletype==12">Dim 1</th>
                              <th ng-if="namecate.labletype==11 || namecate.labletype==12">Dim 2</th>
                              <th ng-if="namecate.labletype==12">Dim 3</th>

                              <th
                                ng-if="namecate.labletype==8 ||  namecate.labletype==1 || namecate.labletype==15 ||  namecate.labletype==4 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12"
                                style="padding-bottom:0px">{{namecate.lable}} </th>


                              <!-- <th class="table-width-10" ng-if="namecate.labletype==8" style="padding-bottom:0px">Extra {{namecate.lable}} </th> -->
                              <th ng-if="namecate.labletype==8" style="display:none;" style="padding-bottom:0px">Back
                                {{namecate.lable}} </th>
                              <th
                                ng-if="namecate.labletype==6 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==15">
                                {{namecate.lable2}} </th>
                              <th ng-if="namecate.labletype==1 && namecate.categories_id==30 || namecate.categories_id==3">{{namecate.lable2}} </th>
                              <th  ng-if="namecate.labletype==7 && namecate.categories_id!=13 && namecate.categories_id!=5">{{namecate.lable2}} </th>
                              <th  ng-if="namecate.labletype==7 && namecate.categories_id==40 || namecate.categories_id==608">{{namecate.lable2}} </th>
                              <th  ng-if="namecate.labletype==7 && namecate.categories_id==582">{{namecate.lable2}} </th>


<!-- hide by cleat -->

                              <th ng-if="namecate.labletype!=9 && namecate.labletype!=14 && namecate.categories_id!=593">UOM<small>(Default)</small></th>


                              <th class="table-width-6" ng-if="namecate.labletype!=9" rowspan="2"
                                ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'
                                style="text-align:left;">QTY ({{namecate.lablenos}}) </th>
                                
                                <th class="table-width-10"  rowspan="2" >Net Rate </th>

                              <th style="text-align:left;">{{namecate.uom}} </th>
                              <th> Remarks</th>
                              <th ng-if="namecate.cate_status==1">Attachment</th>
                              <th>Amount</th>

                            </tr>






                          </thead>






                          <tbody ng-repeat="name in namesData|orderBy:column:reverse" ng-if="namecate.categories_id==1">




                            <tr class="view"
                              ng-if="namecate.categories_id==name.categories_id_get && namecate.type==name.type">
                              <td style="text-align:center;">{{name.no}}</td>
                              <td title="{{name.categories}}">{{name.product_name_tab}} </td>







                              <td class='sst'>{{name.profile_tab}}</td>
                              <td class='sst' ng-if="namecate.labletype==2">{{name.crimp_tab}}</td>




                              <td class='sst'><select style='background: #d5d5d5;' class="selectbox" disabled>
                                  <option value="3" ng-selected="{{name.uom == 3}}">FEET</option>
                                  <option value="4" ng-selected="{{name.uom == 4}}">MM</option>
                                  <option value="5" ng-selected="{{name.uom == 5}}">MTR</option>
                                  <option value="6" ng-selected="{{name.uom == 6}}">INCH</option>
                                  <option value="2" ng-selected="{{name.uom == 2}}">SQMRT</option>
                                </select>
                              </td>


                              <td>{{name.profile_tab_convert}}</td>
                              <td ng-if="namecate.labletype==2">{{name.crimp_tab_convert}}</td>



                              <td>FEET</td>



                              <td style="text-align:left;">{{name.nos_tab}}</td>

                              <td id="amount_{{name.id}}" class="amount" >
                              {{name.rate_tab}}
                             </td>
                         



                              <td style="text-align:left;">{{name.qty_tab}}</td>
                              <td>{{name.remarks}}</td>


                              <td ng-if="namecate.cate_status==1">



                                {{name.sub_product_name_tab}}
                                <span ng-if="name.reference_image!=''">
                                  <br>
                                  <a href="{{name.reference_image}}" style="margin: 15px 5px;" target="_blank"> <img
                                      src="{{name.reference_image}}" style="width:200px;border: #4a4a4a solid 1px;">
                                  </a>
                                </span>



                              </td>

                              <td>
                                  <span >{{name.amount_tab}}</span>
                              </td>

                            </tr>





                          </tbody>
                           <!-- <tfoot>
                                            <tr ng-if="namecate.categories_id==1">





                                            <td></td>
                                            <td> </td>


                                            <td ng-if="namecate.labletype==2 || namecate.labletype==1"></td>
                                            <td ng-if="namecate.labletype==2"> </td>

                                            <td></td>
                                            <td ng-if="namecate.labletype==2 || namecate.labletype==1"></td>
                                            <td ng-if="namecate.labletype==2"> </td>
                                            <td>Total</td>




                                            <td ng-if="namecate.labletype==2 || namecate.labletype==1" style="padding-bottom:0px;text-align:left;">{{namecate.nos_total}}</td>
                                            <td> </td>
                                            <td> </td>
                                            <td ng-if="namecate.cate_status==1"></td>

                                            <td> </td>

                                            </tr>
                          </tfoot> -->



                          <tbody ng-repeat="name in namesData|orderBy:column:reverse" ng-if="namecate.categories_id!=1">




                            <tr class="view" ng-if="namecate.categories_id==name.categories_id_get">

                              <td style="text-align:center;">{{name.no}}</td>
                              <td title="{{name.categories}}">{{name.product_name_tab}}</td>
                              <td
                                ng-if="namecate.labletype==4 || namecate.labletype==16 || namecate.labletype==19 || namecate.categories_id==592">
                                {{name.tile_material_name}}</td>

                              <td ng-if="namecate.labletype==19">{{name.dim_one}}</td>
                              <td ng-if="namecate.labletype==19">{{name.dim_two}}</td>
                              <td ng-if="namecate.labletype==19">{{name.dim_three}}</td>

                              <td ng-if="namecate.labletype==5 || namecate.labletype==6">



                                <select class="selectbox" disabled ng-if="namecate.labletype==5">
                                  <option value="1" ng-selected="{{name.billing_options == 1}}">Running MTR</option>
                                  <option value="2" ng-selected="{{name.billing_options == 2}}">KG</option>
                                </select>
                                <select class="selectbox" disabled ng-if="namecate.labletype==6">
                                  <option value="1" ng-selected="{{name.billing_options == 1}}">SQM MTR</option>
                                  <option value="2" ng-selected="{{name.billing_options == 2}}">KG</option>
                                </select>




                              </td>

                              <!-- FOR gI GUTTER -->


                              <td
                                ng-if="namecate.labletype==1 && namecate.categories_id==627 || namecate.categories_id==611"
                                data-label="Billing Options">

                                <select disabled class="selectbox" ng-if="namecate.labletype==1">
                                  <option value="4" ng-if="namecate.categories_id==611 || namecate.categories_id==627"
                                    ng-selected="{{name.billing_options == 4}}">Running fT</option>
                                  <option value="2" ng-selected="{{name.billing_options == 2}}">KG</option>
                                  <option value="5" ng-if="namecate.categories_id==627"
                                    ng-selected="{{name.billing_options == 5}}">NOS</option>
                                </select>


                              </td>









                              <td class='sst' ng-if="namecate.labletype==11 || namecate.labletype==12">{{name.dim_one}}
                              </td>
                              <td class='sst' ng-if="namecate.labletype==11 || namecate.labletype==12">{{name.dim_two}}
                              </td>
                              <td class='sst' ng-if="namecate.labletype==12">{{name.dim_three}}</td>


                              <td  class='sst' ng-if="namecate.labletype==4"> {{name.profile_tab}}</td>


                              <td class='sst'
                                ng-if="namecate.labletype==8 || namecate.labletype==1 || namecate.labletype==15 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12">
                                {{name.profile_tab}}</td>
                              <td class='sst'
                                ng-if="namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==15">
                                {{name.crimp_tab}} </td>
                              <td ng-if="namecate.labletype==8" style="display:none;">{{name.back_crimp}}</td>
                              <td class='sst' ng-if="namecate.labletype==6">{{name.crimp_tab}}
                              </td>

                              <td class='sst' ng-if="namecate.labletype==7 && namecate.categories_id!=13 && namecate.categories_id!=5">{{name.crimp_tab}}</td>
                              <td class='sst' ng-if="namecate.labletype==7 && namecate.categories_id==582">{{name.crimp_tab}}</td>

                              <td class='sst' ng-if="namecate.labletype==7 && namecate.categories_id==40 || namecate.categories_id==608">{{name.crimp_tab}}
                              </td>





                              <td class='sst' ng-if="namecate.labletype==1 && namecate.categories_id==30|| namecate.categories_id==3">
                                {{name.crimp_tab}}</td>
<!-- hide by cleat -->
                              <td class='sst' ng-if="namecate.labletype!=9 && namecate.labletype!=14">


                                <span ng-if="namecate.labletype!=14">
                                  <select class="selectbox sst" disabled>
                                    <option value="3" ng-selected="{{name.uom == 3}}">FEET</option>
                                    <option value="4" ng-selected="{{name.uom == 4}}">MM</option>
                                    <option value="5" ng-selected="{{name.uom == 5}}">MTR</option>
                                    <option value="6" ng-selected="{{name.uom == 6}}">INCH</option>
                                    <option value="2" ng-selected="{{name.uom == 2}}">SQMRT</option>
                                  </select>
                                </span>
                                <!-- <span ng-if="namecate.labletype==14">
                                  NOS
                                </span> -->


                              </td>


                              <td ng-if="namecate.labletype==14">


                           
                                <span ng-if="namecate.labletype==14">
                                  NOS
                                </span>


                              </td>


                              <td ng-if="namecate.labletype==11 || namecate.labletype==12">{{name.dim_one_convert}}</td>
                              <td ng-if="namecate.labletype==11 || namecate.labletype==12">{{name.dim_two_convert}}</td>
                              <td ng-if="namecate.labletype==12">{{name.dim_three_convert}}</td>



                              <td ng-if="namecate.labletype==4"> {{name.profile_tab_convert}}</td>


                              <td
                                ng-if="namecate.labletype==8 || namecate.labletype==1 || namecate.labletype==15 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12">
                                {{name.profile_tab_convert}}</td>
                              <td ng-if=" namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==15">
                                {{name.crimp_tab_convert}} </td>
                              <td ng-if="namecate.labletype==8" style="display:none;">{{name.back_crimp}}</td>
                              <td ng-if="namecate.labletype==6">{{name.crimp_tab_convert}}</td>


                              <td  ng-if="namecate.labletype==7 && namecate.categories_id!=13 && namecate.categories_id!=5">{{name.crimp_tab_convert}}</td>
                              <td  ng-if="namecate.labletype==7 && namecate.categories_id==40 || namecate.categories_id==608">{{name.crimp_tab_convert}}</td>
                              <td  ng-if="namecate.labletype==7 && namecate.categories_id==582">{{name.crimp_tab_convert}}</td>



                              <td ng-if="namecate.labletype==1 && namecate.categories_id==30|| namecate.categories_id==3">{{name.crimp_tab_convert}}
                              </td>


                              <td ng-if="namecate.labletype!=9 && namecate.labletype!=14 && namecate.categories_id!=593">FEET</td>



                              <td ng-if="namecate.labletype!=9" style="text-align:left;">{{name.nos_tab}}</td>

                              <td id="amount_{{name.id}}" class="amount" >
                              {{name.rate_tab}}
                             </td>



                              <td style="text-align:left;">{{name.qty_tab}}</td>
                              <td>{{name.remarks}}</td>


                              <td ng-if="namecate.cate_status==1">



                                {{name.sub_product_name_tab}}
                                <span ng-if="name.reference_image!=''">
                                  <br>
                                  <a href="{{name.reference_image}}" style="margin: 15px 5px;" target="_blank"> <img
                                      src="{{name.reference_image}}" style="width:200px;border: #4a4a4a solid 1px;">
                                  </a>
                                </span>



                              </td>
                             

                              <td>
                                  <span >
                                    
                                  
                                  <!-- gg roundoff for delivery page -->
                                {{ (name.qty_tab * name.rate_tab).toFixed(2) }}
                               


                                  </span>
                              </td>

                            </tr>


                          </tbody>

                           <!--<tfoot>
                                            <tr ng-if="namecate.categories_id!=1">




                                            <td> </td>
                                            <td> </td>

                                            <td ng-if="namecate.labletype==4"> </td>
                                            <td ng-if="namecate.labletype==16 || namecate.labletype==19"></td>
                                            <td ng-if="namecate.categories_id==592"></td>

                                            <td ng-if="namecate.labletype==19">
                                            </td>


                                            <td ng-if="namecate.labletype==19">
                                            </td>



                                            <td ng-if="namecate.labletype==19">
                                            </td>

                                            <td ng-if="namecate.labletype==5 || namecate.labletype==6"></td>

                                            <td ng-if="namecate.labletype==11 || namecate.labletype==12"></td>
                                            <td ng-if="namecate.labletype==11 || namecate.labletype==12"></td>
                                            <td ng-if="namecate.labletype==12"></td>


                                            <td ng-if="namecate.labletype==8 ||  namecate.labletype==1 || namecate.labletype==15 ||  namecate.labletype==4 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12" style="padding-bottom:0px"> </td>


                                            <td class="table-widtd-10" ng-if="namecate.labletype==8" style="padding-bottom:0px"> </td>
                                            <td ng-if="namecate.labletype==8" style="display:none;" style="padding-bottom:0px"> </td>
                                            <td ng-if="namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==15"> </td>


                                            <td ng-if="namecate.labletype==1 || namecate.labletype==6" style="padding-bottom:0px"> </td>


                                            <td ng-if="namecate.labletype!=9"></td>



                                            <td ng-if="namecate.labletype==8 ||  namecate.labletype==1 || namecate.labletype==15 ||  namecate.labletype==4 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12" style="padding-bottom:0px"> </td>


                                            <td class="table-widtd-10" ng-if="namecate.labletype==8" style="padding-bottom:0px"> </td>
                                            <td ng-if="namecate.labletype==8" style="display:none;" style="padding-bottom:0px"> </td>
                                            <td ng-if="namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==15"> </td>


                                            <td ng-if="namecate.labletype==1 || namecate.labletype==6" style="padding-bottom:0px"> </td>



                                            <td>Total</td>
                                            <td ng-if="namecate.labletype!=9" style="text-align:left;">{{namecate.nos_total}}</td>
                                            <td style="text-align:left;" ng-if="namecate.labletype==9">{{namecate.activel_qty_total_set}}</td>


                                            <td> </td>
                                            <td ng-if="namecate.labletype!=9"> </td>
                                            <td ng-if="namecate.cate_status==1"></td>

                                            <td> </td>


                                            </tr>
                          </tfoot> -->

                        </table>

                      </div>








                    </div>



                  </div>
                </div>

                    <!-- <table id="datatable">
                    
                      
                      <tr ng-if="namesDatacate.length > 0 && namesDatacate[namesDatacate.length - 1].labletype != 9">
                          <td colspan="15" style="font-weight:bold;text-align:left;">Total:</td>
                          <td colspan="10" style="font-weight:bold;text-align:left;">{{namesDatacate[namesDatacate.length - 1].nos_total}}</td>

                        </tr>
                   </table> -->



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
                                                            <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" ><i
                                                                        class="bx bx-chevron-left me-1"></i> Previous</a></li>
                                                            <li class="next"><a href="javascript: void(0);" class="btn btn-primary"  ng-click='reachedlocation()'>Next <i
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
                                                            <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" ><i
                                                                        class="bx bx-chevron-left me-1"></i> Previous</a></li>
                                                            <li class="next"><a href="javascript: void(0);" class="btn btn-primary" ng-click='returnfinsh()'  >Return Picked and Next <i
                                                                        class="bx bx-chevron-right ms-1"></i></a></li>
                                                        </ul>
                                                      </div>
                                                    </div>-->
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="tab-pane" id="progress-bank-detail">
                                                        <div>
                                                            <div class="text-start mb-2">
                                                                <h5 class="text-center text-md-start">Drop Details</h5>
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
                                                                  
                                                                  <p><span>DC</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>
                                                                  
                                                                  
                                                                  
                                                       <a  target="_blank" href="<?php echo base_url(); ?>index.php/order/delivery_note?order_id=<?php echo base64_encode($id); ?>&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process&viewstatus=1&DC_id=<?php echo $DC_id; ?>" >Download / Print</a> 
                                                                      
                                                                  </span></p>
                                                                  <!--<p><span>DC</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span></p>-->
                                                                  <p><span> Bill Amount</span><span> Rs. {{fulltotaldel | indianCurrency}}</span></p>
                                                                   <!-- <p ng-if="tcsamount>0"><span>TCS (+)</span><span> Rs. {{tcsamount}}</span></p> -->
                                                                  <p ng-if="delivery_charge>0"><span>Delivery Charge</span><span> Rs. {{delivery_charge | indianCurrency}}</span></p>
 <p><span>SubTotal</span><span> Rs. {{collection_remarks | indianCurrency}}</span></p>
 <p ng-if="loading_status==0"><span>Amount to collect</span><span> Rs. {{collection_remarks | indianCurrency}}</span></p>
 <p ng-if="loading_status==1"><span>Amount to collect</span><span> Rs. {{collection_remarks | indianCurrency}}</span></p>


                                                                  

                                                                 
                                                                   
                                                                 
                                                                  <p ng-if="return_amount_show>0"><span>Return</span><span> Rs. {{return_amount_show}}</span></p>
<p ng-if="return_amount>0 && is_collection_remarks==0"><span>Balance </span><span> Rs. {{collection_remarks-return_amount}}</span></p>
                                                                  
                                                                <!--   <p ng-if="collection_remarks"><span>Collect Amount</span><span> Rs. {{discountfulltotal-collection_remarks}}</span></p> -->
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
                                                                        <input type="hidden"  id="utr_details" value="" >
                                                                        <select class="form-select" id="cashmode">
                                                                            <option value="">Select Mode</option>
                                                                            <option value="Cash">Cash</option>
                                                                            <option value="Cheque">Cheque</option>
                                                                            <option value="Bank Transfer">Bank Transfer / Online</option>
                                                                            <option  value="No Collection">No Collection</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                              
                                                                
                                                                
                                                                
                                                                
                                                                  <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Rescheduling in Delivery / Return </label>
                                                                        <select class="form-select" id="rescheduling_delivery">
                                                                           
                                                                            <option value="NO">NO Return</option>
                                                                            <option value="YES">YES Return</option>
                                                                           <option value="Re-Delivery">Re-Delivery (Same Day)</option>
                                                                           <!--  <option value="Rescheduling">Rescheduling</option> -->
                                                                            
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
                                                                <?php if($return_id<=0) { ?>
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
                           
                           
                           
 <tr><td>Total Amount </td><td>

  <span ng-if="collection_remarks>0">
  <input type="number" id="fulltotal" data-value="{{collection_remarks}}"  readonly style="width: 80px;border: none;">
  </span>

   <span ng-if="collection_remarks<=0">
  <input type="number" id="fulltotal" data-value="{{discountfulltotal}}"  readonly style="width: 80px;border: none;">
  </span>


</td>
  <td></td></tr>
                          
                          
                          <tr style="color: red;font-weight: 800;"><td>Balance Amount :</td> <td><span id="bal"></span></td><td></td></tr>
                          
                          <tr id="accessshow" style="display:none;"><td><label for="set1"><input type="radio" class="selectcollection" name="selectcollection" id="set1" value="1"> Return the excess :</label></td> <td><input type="number" readonly style="width: 80px;" value="0" id="return_excess" ></td><td></td></tr>
                          <tr id="accessshow1" style="display:none;"><td><label for="set2"><input type="radio" class="selectcollection" name="selectcollection" checked id="set2" value="2"> Collect the excess :</label></td> <td><input type="number" readonly style="width: 80px;" value="0" id="return_excess1" ></td><td></td></tr>
                          
                      </table>
                      <?php } ?>
                      
                      </div>
                     
                                                                
                                                                
                                                                
                                                                
                                                                
                                                               <div class="col-lg-12" id="reference_no_view" style="display:none">
                                                                   

                                                                    <div class="mb-3" >
                                                                        <label for="example-text-input" class="form-label">UTR details / Reference Number <span id='mandatory-star' style="color: red;font-weight:bold;">*</span></label>
                                                                        <input class="form-control" type="text"  id="reference_no" >
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


                                                                <div class="mb-3" id="reff" style="display: none;">
                                                                        <label for="example-text-input" class="form-label">Return Image Upload</label>
                                                                        <input type="file" file-input="files_1" class="form-control">
                                                                 </div>         
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                            </div>
                                                              
                                                            
                                                          </form>
                                                          <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" ><i
                                                                        class="mdi mdi-arrow-left me-1"></i> Previous</a></li>
                                                            <li class="float-end">








 <!-- gg chnages -->
 <!-- <a href="javascript: void(0);"  ng-if="return_amount>0"  ng-click="returnview()">View Return</a> -->
 <input type="hidden" class="hidden" name="return_id" value="{{return_id}}" id="return_id">










                                                              <a href="javascript: void(0);" class="btn btn-primary showss"  ng-click="tripcomplete()"   data-bs-toggle="modal"
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
                                                    <div class="modal-dialog modal-xl" >
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
                           
                       
            
                       
                        
                        <div class="col-md-6 returnclass">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Invoice No <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                                
                                <select class="form-control"  id="order_no" required name="order_no">
                                    
                                    <option  value="{{orderno}}"> {{orderno}} </option>
                                </select>
                              
                            
                            
                            </div>
                          </div>
                        </div>
                      
                        
                      
                        
                        
                      
                       <div class="col-md-6 returnclass">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Return Date <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="return_date" class="form-control"  name="create_date" required ng-model="create_date" type="date">
                            </div>
                          </div>
                        </div>

                        <div  class="col-md-12"  >

                         <table class="table mt-2 mb-2" >

                                    <thead class="bg-gray text-red" >
                                    
                                    <tr>
                                        <th class="">
                                        <input type="checkbox" class="checkall_overall" ng-click="loadProductAll_overall()">Select All</th>
                                    </tr>

                                    </thead>

                        </table>
                        </div>



                        
                                                             <div  class="col-md-12" id="showdata" ng-repeat="namecate in namesDatacate">



                                                                <table class="table" >

                                                           
                                    <thead class="bg-gray text-red" ng-if="namecate.categories_id==1">
                                                                   

<tr>


                                                                    <input type="checkbox" 
                                                                        id="checkall" 
                                                                        class="select_categoryall{{namecate.categories_id}}" 
                                                                        ng-click="loadProductAll(namecate.categories_id)"></th>
                                                                        <th class="table-width-3" rowspan="2">S.No </th>
                                             <th class="table-width-10" rowspan="2" data-priority="1" ng-click='sortColumn("product_name_tab")' ng-class='sortClass("product_name_tab")'>Products </th>
                                            
                                             
                                          
                                                                                       
                                            
                                           <th class="sst" style="width: 10px;" ng-if="namecate.labletype==2 || namecate.labletype==1"  style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("profile_tab")' ng-class='sortClass("profile_tab")'>{{namecate.lable}} </th>

                                             <th class="table-width-2 sst"  ng-if="namecate.labletype==2" data-priority="1" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>Length </th>
                                             <!-- hide by cleat -->
                                               <th class="table-width-2 sst" style="width: 40px;" data-priority="3" ng-if="namecate.labletype!=9 && namecate.labletype!=14">UOM (Billing)</th>
                                               <th class="table-width-2 " style="width: 40px;" data-priority="3" ng-if="namecate.labletype==14">UOM</th>


                                                  <th class="table-width-2" ng-if="namecate.labletype==2 || namecate.labletype==1"  style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("profile_tab")' ng-class='sortClass("profile_tab")'>{{namecate.lable}} </th>

                                             <th class="table-width-2" ng-if="namecate.labletype==2" data-priority="1" ng-click='sortColumn("crimp_tab")' ng-class='sortClass("crimp_tab")'>Length </th>

                                                <th class="table-width-2" data-priority="3" ng-if="namecate.labletype!=9 && namecate.labletype!=14">UOM (Default)</th>

                                             <th class="table-width-2" ng-if="namecate.labletype==2 || namecate.labletype==1" rowspan="2" style="padding-bottom:0px" data-priority="3" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'><?php echo $readdriverset;?>{{namecate.lablenos}} </th>
                                             


                                                                     





                                                                       <th class="table-width-10" rowspan="2" ng-if="base_check==1" > Basic Rate </th>
                                                          <th class="table-width-10" rowspan="2" ng-if="gst_check==1" > GST {{namecate. gst}} %  </th>
                                                                      
                                                                       
                                                                        <th class="table-width-10"  rowspan="2" ng-if='namecate.uom!="Kg"' >Rate </th>
                                                                       <th class="table-width-10 <?php echo $classdata; ?>"  rowspan="2" ng-if='namecate.uom=="Kg"' >Rate</th>
                                                                       
                                                            
                                                                       <th class="table-width-10"  rowspan="2" >{{namecate.uom}} </th>
                                                                       <th class="table-width-10">Weight</th>
                                                                       <th ng-if="namecate.cate_status==1">Attachment</th>
                                                                       <th class="table-width-10"  rowspan="2" >Amount </th> 

                                                                      
                                                                     
                                                                       
                                                                    </tr>
                                                                    
                                                                    
                                                                    
                                                                 </thead>
                                                                 
                                                                 
                                                                 
                                                                  <thead class="bg-gray text-red" ng-if="namecate.categories_id!=1">
                                                                   
                                                            
                                                                      
                                       
                                         
                                          <tr>
                                             

                                          <th class="table-width-3" rowspan="2">S.No </th>
                              <th rowspan="2">Products </th>

                              <th class="table-width-18" ng-if="namecate.labletype==4"
                                rowspan="2">Tile Material </th>
                              <th class="table-width-18" ng-if="namecate.labletype==16 || namecate.labletype==19"
                                rowspan="2">Material Specfication </th>
                              <th class="table-width-18" ng-if="namecate.categories_id==592" rowspan="2"
                                data-priority="1">Description</th>

                              <th ng-if="namecate.labletype==19">Remarks
                              </th>


                              <th ng-if="namecate.labletype==19">Coil_no
                              </th>



                              <th ng-if="namecate.labletype==19">Coil_Status
                              </th>

                              <th ng-if="namecate.labletype==5 || namecate.labletype==6">Billing Option</th>
                              <th
                                ng-if="namecate.labletype==1 && namecate.categories_id==627 || namecate.categories_id==611">
                                Billing Option</th>

                              <th class='sst' ng-if="namecate.labletype==11 || namecate.labletype==12">Dim 1</th>
                              <th class='sst' ng-if="namecate.labletype==11 || namecate.labletype==12">Dim 2</th>
                              <th class='sst' ng-if="namecate.labletype==12">Dim 3</th>


                              <th class='sst'
                                ng-if="namecate.labletype==8 ||  namecate.labletype==1 || namecate.labletype==15 ||  namecate.labletype==4 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12"
                                style="padding-bottom:0px">{{namecate.lable}} </th>


                              <!-- <th class="table-width-10" ng-if="namecate.labletype==8" style="padding-bottom:0px">Extra {{namecate.lable}} </th> -->
                              <th ng-if="namecate.labletype==8" style="display:none;" style="padding-bottom:0px">Back
                                {{namecate.lable}} </th>
                              <th class='sst'
                                ng-if="namecate.labletype==6 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==15">
                                {{namecate.lable2}} </th>
                              <th class='sst' ng-if="namecate.labletype==1 && namecate.categories_id==30|| namecate.categories_id==3">
                                {{namecate.lable2}} </th>

                              <th class='sst' ng-if="namecate.labletype==7 && namecate.categories_id==13">
                                {{namecate.lable2}} </th>

                              <th class='sst' ng-if="namecate.labletype==7 && namecate.categories_id==40 || namecate.categories_id==608">
                                {{namecate.lable2}} </th>

                              <th class='sst' ng-if="namecate.labletype==7 && namecate.categories_id==582">
                                {{namecate.lable2}} </th>


<!-- hide by cleat -->
                              <th class='sst' ng-if="namecate.labletype!=9 && namecate.labletype!=14 ">UOM<small>(Billing)</small></th>
                              <th  ng-if="namecate.labletype==14 ">UOM</th>


                              <th ng-if="namecate.labletype==11 || namecate.labletype==12">Dim 1</th>
                              <th ng-if="namecate.labletype==11 || namecate.labletype==12">Dim 2</th>
                              <th ng-if="namecate.labletype==12">Dim 3</th>

                              <th
                                ng-if="namecate.labletype==8 ||  namecate.labletype==1 || namecate.labletype==15 ||  namecate.labletype==4 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12"
                                style="padding-bottom:0px">{{namecate.lable}} </th>


                              <!-- <th class="table-width-10" ng-if="namecate.labletype==8" style="padding-bottom:0px">Extra {{namecate.lable}} </th> -->
                              <th ng-if="namecate.labletype==8" style="display:none;" style="padding-bottom:0px">Back
                                {{namecate.lable}} </th>
                              <th
                                ng-if="namecate.labletype==6 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==15">
                                {{namecate.lable2}} </th>
                              <th ng-if="namecate.labletype==1 && namecate.categories_id==30 || namecate.categories_id==3">{{namecate.lable2}} </th>
                              <th  ng-if="namecate.labletype==7 && namecate.categories_id==13">{{namecate.lable2}} </th>
                              <th  ng-if="namecate.labletype==7 && namecate.categories_id==40 || namecate.categories_id==608">{{namecate.lable2}} </th>
                              <th  ng-if="namecate.labletype==7 && namecate.categories_id==582">{{namecate.lable2}} </th>



<!-- hide by cleat -->
                              <th ng-if="namecate.labletype!=9 && namecate.labletype!=14">UOM<small>(Default)</small></th>









                                              <th class="table-width-2"  data-priority="3" rowspan="2" ng-click='sortColumn("nos_tab")' ng-class='sortClass("nos_tab")'><?php echo $readdriverset; ?>{{namecate.lablenos}}</th>

                                             
                                            
                                                                   








                                                                       <th class="table-width-6 d-none" ng-if="namecate.labletype==1 || namecate.labletype==2 || namecate.labletype==3 || namecate.labletype==4 || namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==8 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==13 || namecate.labletype==14" rowspan="2" ><small>{{namecate.lablefact1}} <br> {{namecate.lablefact2}} </small> </th>
                                                                      
                                                                      
                                                                      <th class="table-width-10" rowspan="2" ng-if="base_check==1" > Basic Rate </th>

                                                  <th class="table-width-10" rowspan="2" ng-if="gst_check==1" > GST {{namecate. gst}} % </th>
                                                                    
                                                                       
                                                                       
                                                                       
                                                                        <th class="table-width-10"  rowspan="2" ng-if='namecate.uom!="Kg"'>Rate </th>
                                                                       <th class="table-width-10 <?php echo $classdata; ?>"  rowspan="2" ng-if='namecate.uom=="Kg"'>Rate</th>
                                                                       
                                                                       
                                                                       <th class="table-width-10"  rowspan="2" >Qty	 </th>
                                                                       
                                                                       <th class="table-width-10">Weight</th>
                                                                       <th class="table-width-10"  rowspan="2"  ng-if="namecate.cate_status==1">Attachment </th> 
                                                                       <th class="table-width-10"  rowspan="2" >Amount </th>

                                                                     
                                                                       
                                                                    </tr>
                                                                    
                                                                    
                                                                    
                                                    
                                                                    
                                                                    
                                                                 </thead>
                                       
                                       




    <tbody  ng-repeat="name in namesData|orderBy:column:reverse" ng-if="namecate.categories_id==1">
                                           
                                           
                                           

                                          <tr class="view" ng-if="namecate.categories_id==name.categories_id_get">
                                             <td ><input type="checkbox" class="purchase_order_product_id load_categoryall{{namecate.categories_id}}"  name="purchase_order_product_id" value="{{name.id}}"> {{name.no}}</td>
                                            


                                           
                                           
                                           
                                            <input type="hidden" class="hidden"  value="{{namecate.categories_id}}"  id="cateid_{{name.id}}">
                                            <input type="hidden" class="hidden"  value="{{namecate.type}}"  id="cateidtype_{{name.id}}">
                                            <input type="hidden" class="hidden"  value="{{name.product_id}}"  id="ppid_{{name.id}}">
                                          
                                            
                                                 <td title="{{name.categories}}"  data-label="Products">
                                                {{name.product_name_tab}}
                                                       
                                                 </td>



                                         
                                             
                                             
                                           
                                           
                                             
                                      <td data-label="{{namecate.lable}}" class="sst"><input class="sst" type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}"  value="{{name.profile_tab}}"></td>
                                            
                                            
                                          <td ng-if="namecate.labletype==2" class="sst" data-label="Crimp"><input class="sst" type="text" <?php echo $read; ?> ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)" id="crimp_{{name.id}}" value="{{name.crimp_tab}}"></td>

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
                                                 
                                        

                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                             <td >


                                                 <input type="text" value="{{name.nos_tab}}" data-nos="{{name.nos_tab}}" ng-keyup="inputsave_1(name.id,'nos',name.categories_id,name.type,name.profile_tab,name.crimp_tab,name.fact_tab,name.rate_tab,name.uom,name.weight)" id="nos_{{name.id}}" class="form-control order_nos" name="order_nos" >



                                           </td>
                                             <td style="display:none;">{{name.fact_tab}}</td>
                                             <td ng-if="base_check==1" >{{name.base_rate}}</td>
                                              <th ng-if="gst_check==1" ><b  > {{name.gst_price}}</b></th>
                                             <td >{{name.rate_tab | number : 2}}</td>
                                            
                                            
                                            
                                            
                                            
                                             <td  class="qtyfind_{{namecate.type}}" ng-if='namecate.uom!="Kg"' >



<input type="textt" value="{{name.qty_tab}}" readonly class="form-control purchase_qty" id="qty_{{name.id}}" name="purchase_qty" >
                                              


                                             </td>
                                             <td class="qtyfind_{{namecate.type}} <?php echo $classdata; ?>" ng-if='namecate.uom=="Kg"' >

                                            
<input type="textt" value="{{name.qty_tab}}" readonly class="form-control purchase_qty" id="qty_{{name.id}}" name="purchase_qty" >
                                              


                                           </td>
                                             
                                             
                                             
                                            
                                             
                                                
                                                
                                                  <td class="weight_{{name.id}}">{{name.weight}} </td> 
                                                 
                                                  

                                                   <td ng-if="namecate.cate_status==1">



                                                   {{name.sub_product_name_tab}}
                                                    <span ng-if="name.reference_image!=''">
                                                    <br>
                                                    <a href="{{name.reference_image}}"  target="_blank"> <img src="{{name.reference_image}}" style="width: 200px;border: #4a4a4a solid 1px;"> </a>
                                                    </span>



                                                    </td>



                                               <td id="amount_{{name.id}}" class="amount">{{name.amount_tab}}</td>

                                                <span ng-if="name.return_status>0">Returned</span>

                                               </td>
                                            
                                             
                                            
                                             
                                       </tr>
                                        
                                       

                                          
                                          
                                       </tbody>
                                            
                                     
                                           <tr ng-if="namecate.categories_id==1">



                                             <th ></th>
                                             <th class="table-width-6 hidmob"><b>Table total</b></th>
                                             <th class="table-width-6 hidmob" > </th>
                                              <th class="table-width-6 hidmob" > </th>
                                                 
                                           
                                             <th class="hidmob" ng-if="namecate.labletype==2"><b></b></th>
                                             <th data-label="Toatl:" ><b  id="nostot_{{namecate.categories_id}}">{{namecate.nos_total}}</b></th>
                                             <th class="hidmob"><b></b></th>
                                             <th ng-if="commission_check==1" class="comdisplay"><b ></b></th>
                                              <th ng-if="gst_check==1"></th>
                                                <th ng-if="base_check==1"></th>
                                              <th ><b  id="fullqty_{{namecate.categories_id}}">{{namecate.qty_total}}</b></th>
                                             
                                             <th ><b  id="fulltotal_{{namecate.categories_id}}">{{namecate.amount_total}} </b></th>
                                             
                                             
                                           
                                             
 
                                          </tr>







  <tbody  ng-repeat="name in namesData|orderBy:column:reverse" ng-if="namecate.categories_id!=1">
                                           
                                           
                                           
                                          
                                          <tr   class="view" ng-if="namecate.categories_id==name.categories_id_get">
                                             
                                             <td><input type="checkbox" class="purchase_order_product_id load_categoryall{{namecate.categories_id}}" name="purchase_order_product_id" value="{{name.id}}"> {{name.no}}</td>
                                             


                                             
                                             
                              <td title="{{name.categories}}">{{name.product_name_tab}}</td>
                              <td
                                ng-if="namecate.labletype==4 || namecate.labletype==16 || namecate.labletype==19 || namecate.categories_id==592">
                                {{name.tile_material_name}}</td>

                              <td ng-if="namecate.labletype==19">{{name.dim_one}}</td>
                              <td ng-if="namecate.labletype==19">{{name.dim_two}}</td>
                              <td ng-if="namecate.labletype==19">{{name.dim_three}}</td>

                              <td ng-if="namecate.labletype==5 || namecate.labletype==6">



                                <select class="selectbox" disabled ng-if="namecate.labletype==5">
                                  <option value="1" ng-selected="{{name.billing_options == 1}}">Running MTR</option>
                                  <option value="2" ng-selected="{{name.billing_options == 2}}">KG</option>
                                </select>
                                <select class="selectbox" disabled ng-if="namecate.labletype==6">
                                  <option value="1" ng-selected="{{name.billing_options == 1}}">SQM MTR</option>
                                  <option value="2" ng-selected="{{name.billing_options == 2}}">KG</option>
                                </select>




                              </td>

                              <!-- FOR gI GUTTER -->


                              <td
                                ng-if="namecate.labletype==1 && namecate.categories_id==627 || namecate.categories_id==611"
                                data-label="Billing Options">

                                <select disabled class="selectbox" ng-if="namecate.labletype==1">
                                  <option value="4" ng-if="namecate.categories_id==611 || namecate.categories_id==627"
                                    ng-selected="{{name.billing_options == 4}}">Running fT</option>
                                  <option value="2" ng-selected="{{name.billing_options == 2}}">KG</option>
                                  <option value="5" ng-if="namecate.categories_id==627"
                                    ng-selected="{{name.billing_options == 5}}">NOS</option>
                                </select>


                              </td>









                              <td class='sst' ng-if="namecate.labletype==11 || namecate.labletype==12">{{name.dim_one}}
                              </td>
                              <td class='sst' ng-if="namecate.labletype==11 || namecate.labletype==12">{{name.dim_two}}
                              </td>
                              <td class='sst' ng-if="namecate.labletype==12">{{name.dim_three}}</td>


                              <td  class='sst' ng-if="namecate.labletype==4"> {{name.profile_tab}}</td>


                              <td class='sst'
                                ng-if="namecate.labletype==8 || namecate.labletype==1 || namecate.labletype==15 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12">
                                {{name.profile_tab}}</td>
                              <td class='sst'
                                ng-if="namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==15">
                                {{name.crimp_tab}} </td>
                              <td ng-if="namecate.labletype==8" style="display:none;">{{name.back_crimp}}</td>
                              <td class='sst' ng-if="namecate.labletype==6">{{name.crimp_tab}}
                              </td>

                              <td class='sst' ng-if="namecate.labletype==7 && namecate.categories_id==13">{{name.crimp_tab}}</td>
                              <td class='sst' ng-if="namecate.labletype==7 && namecate.categories_id==582">{{name.crimp_tab}}</td>

                              <td class='sst' ng-if="namecate.labletype==7 && namecate.categories_id==40 || namecate.categories_id==608">{{name.crimp_tab}}
                              </td>





                              <td class='sst' ng-if="namecate.labletype==1 && namecate.categories_id==30|| namecate.categories_id==3">
                                {{name.crimp_tab}}</td>
<!-- hide by cleat -->
                              <td class='sst' ng-if="namecate.labletype!=9 && namecate.labletype!=14">


                                <span ng-if="namecate.labletype!=14">
                                  <select class="selectbox sst" disabled>
                                    <option value="3" ng-selected="{{name.uom == 3}}">FEET</option>
                                    <option value="4" ng-selected="{{name.uom == 4}}">MM</option>
                                    <option value="5" ng-selected="{{name.uom == 5}}">MTR</option>
                                    <option value="6" ng-selected="{{name.uom == 6}}">INCH</option>
                                    <option value="2" ng-selected="{{name.uom == 2}}">SQMRT</option>
                                  </select>
                                </span>
                                <!-- <span ng-if="namecate.labletype==14">
                                  NOS
                                </span> -->


                              </td>


                              <td  ng-if="namecate.labletype==14">


                                <span ng-if="namecate.labletype==14">
                                  NOS
                                </span>


                              </td>


                              <td ng-if="namecate.labletype==11 || namecate.labletype==12">{{name.dim_one_convert}}</td>
                              <td ng-if="namecate.labletype==11 || namecate.labletype==12">{{name.dim_two_convert}}</td>
                              <td ng-if="namecate.labletype==12">{{name.dim_three_convert}}</td>



                              <td ng-if="namecate.labletype==4"> {{name.profile_tab_convert}}</td>


                              <td
                                ng-if="namecate.labletype==8 || namecate.labletype==1 || namecate.labletype==15 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12">
                                {{name.profile_tab_convert}}</td>
                              <td ng-if=" namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==15">
                                {{name.crimp_tab_convert}} </td>
                              <td ng-if="namecate.labletype==8" style="display:none;">{{name.back_crimp}}</td>
                              <td ng-if="namecate.labletype==6">{{name.crimp_tab_convert}}</td>


                              <td  ng-if="namecate.labletype==7 && namecate.categories_id==13">{{name.crimp_tab_convert}}</td>
                              <td  ng-if="namecate.labletype==7 && namecate.categories_id==40 || namecate.categories_id==608">{{name.crimp_tab_convert}}</td>
                              <td  ng-if="namecate.labletype==7 && namecate.categories_id==582">{{name.crimp_tab_convert}}</td>



                              <td ng-if="namecate.labletype==1 && namecate.categories_id==30|| namecate.categories_id==3">{{name.crimp_tab_convert}}
                              </td>


                              <td ng-if="namecate.labletype!=9 && namecate.labletype!=14">FEET</td>


                                             <td >


                                            <input type="text" value="{{name.nos_tab}}" data-nos="{{name.nos_tab}}" ng-keyup="inputsave_1(name.id,'nos',name.categories_id,name.type,name.profile_tab,name.crimp_tab,name.fact_tab,name.rate_tab,name.uom,name.weight)" id="nos_{{name.id}}" class="form-control order_nos" name="order_nos" >


                                           </td>
                                             <td style="display:none;" ng-if="namecate.labletype==1 || namecate.labletype==2 || namecate.labletype==3 || namecate.labletype==4 || namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==8 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==13 || namecate.labletype==14">{{name.fact_tab}}</td>

                                             <td ng-if="base_check==1" >{{name.base_rate}}</td>
                                                 <th  ng-if="gst_check==1"><b>{{name.gst_price}}</b></th>
                                          
                                             <td >{{name.rate_tab | number : 2}}</td>
                                             
                                             
                                              <td class="qtyfind_{{namecate.type}}" ng-if='namecate.uom!="Kg"'>

<input type="textt" value="{{name.qty_tab}}" readonly class="form-control purchase_qty" id="qty_{{name.id}}" name="purchase_qty" >



                                              </td>
                                             <td   class="qtyfind_{{namecate.type}} <?php echo $classdata; ?>" ng-if='namecate.uom=="Kg"'>


<input type="textt" value="{{name.qty_tab}}" readonly class="form-control purchase_qty" id="qty_{{name.id}}" name="purchase_qty" >
                                              


                                             </td>
                                             
                                             
                                             
                                          
                                            
                                            
                                             <td class="weight_{{name.id}}">{{name.weight}} </td>
                                           

                                             <td ng-if="namecate.cate_status==1">



                                                      {{name.sub_product_name_tab}}
                                                    <span ng-if="name.reference_image!=''">
                                                    <br>
                                                    <a href="{{name.reference_image}}"  target="_blank"> <img src="{{name.reference_image}}" style="width: 200px;border: #4a4a4a solid 1px;"> </a>
                                                    </span>



                                                    </td>

                                                    <td id="amount_{{name.id}}"   class="amount edit_amount_{{name.id}}">
                                                        <!-- gg roundoff for delivery page -->
                                                 {{ (name.qty_tab * name.rate_tab).toFixed(2) }}
                                              </td>
                                                 
                                                <span ng-if="name.return_status>0">Returned</span>

                                               </td>
                                            
                                             
          
                                             
                                          </tr>
                                        
                                     
                                          
                                          
                                          
                                       </tbody>
                                            
                                     
                                           <tr ng-if="namecate.categories_id!=1">
                                             <th></th>
                                             <th class="table-width-6" ng-if="namecate.labletype!=14"><b>Table total</b></th>
                                             <th class="table-width-6" ng-if="namecate.labletype==11 || namecate.labletype==12"></th>
                                             <th class="table-width-6" ng-if="namecate.labletype==11 || namecate.labletype==12"></th>
                                             <th class="table-width-6" ng-if="namecate.labletype==12"></th>
                                             
                                               <th class="table-width-6 hidmob" ng-if="namecate.labletype==9"></th>
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
                                             <th ng-if="namecate.labletype==1"></th>
                                             <th ng-if="namecate.labletype!=9" ><b  id="nostot_{{namecate.type}}" >{{namecate.nos_total}}</b></th>
                                             <th style="display:none;" ng-if="namecate.labletype==1 || namecate.labletype==2 || namecate.labletype==3 || namecate.labletype==4 || namecate.labletype==5 || namecate.labletype==6 || namecate.labletype==7 || namecate.labletype==16 || namecate.labletype==8 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==13 || namecate.labletype==14"><b  >{{namecate.fact_total}}</b></th>
                                            
                                            <th ></th>
                                             <th ng-if="gst_check==1"></th>
                                              <th ng-if="base_check==1"></th>
                                             <th ><b  id="fullqty_{{namecate.type}}" >{{namecate.qty_total}}</b></th>
                                            
                                             <th ><b  id="fulltotal_{{namecate.type}}">{{namecate.amount_total}} </b></th>
                                             
 
                                          </tr>
                                      
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       



























                                                                    
                                                                    
                                                                    
                                                                    
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
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
                            
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light returnclass" type="submit" value="CREATE">
                            </div>
                        </div>



                      </div>



                       






                      


                    </form>


                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
</div><!-- /.modal -->


        </div>
    </div>

   
   
   
   
   <br><br><br><br><br><br>
   
   <input type="hidden" class="hidden" id="vehicle_id" >
   
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





/*
  $scope.fetchDataCategorybase = function(id)
  {
   


     $http.get('<?php echo base_url() ?>index.php/Order_second/fetchDataCategorybase?attachment_status=0&order_id=<?php echo $id; ?>&DC_id=<?php echo $DC_id; ?>&tablenamemain=<?php echo 'orders_process'; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert='+id).success(function(data){
      
      
      $scope.namesDatacate = data;
      
      
      
    });
    
   
  };
*/




$scope.fetchDataCategorybase = function (id) {



$http.get('<?php echo base_url() ?>index.php/Order_second/fetchDataCategorybase_delevery_notes_dc?attachment_status=0&order_id=<?php echo $id; ?>&tablenamemain=<?php  echo 'orders_process'; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&DC_id=<?php echo $DC_id; ?>&convert=' + id).success(function (data) {




  $scope.namesDatacate = data;








});




};





$scope.fetchData = function (id) {



$http.get('<?php echo base_url() ?>index.php/Order_second/fetch_data_delivery_note_dc?attachment_status=0&order_id=<?php echo $id; ?>&tablenamemain=<?php  echo 'orders_process'; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&DC_id=<?php echo $DC_id; ?>&convert=' + id).success(function (data) {


  $scope.namesData = data;

});
};



// return purpose 


$scope.fetchDataCategorybase_return = function (id) {



$http.get('<?php echo base_url() ?>index.php/Order_second/fetchDataCategorybase_delevery_notes?attachment_status=0&order_id=<?php echo $id; ?>&tablenamemain=<?php  echo 'orders_process'; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&DC_id=<?php echo $DC_id; ?>&convert=' + id).success(function (data) {




  $scope.namesDatacate = data;








});




};





$scope.fetchData_return = function (id) {



$http.get('<?php echo base_url() ?>index.php/Order_second/fetch_data_delivery_note?attachment_status=0&order_id=<?php echo $id; ?>&tablenamemain=<?php  echo 'orders_process'; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&DC_id=<?php echo $DC_id; ?>&convert=' + id).success(function (data) {


  $scope.namesData = data;

});
};




















/*
$scope.fetchData = function()
{
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_delivery_data_driver?order_id=<?php echo $id; ?>&DC_id=<?php echo $DC_id; ?>&tablenamemain=<?php echo 'orders_process'; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert=1').success(function(data){
      $scope.namesData = data;
    });
    
   
  
   
};

*/



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


$scope.reachedlocation = function(){

var DC_id='<?php echo $DC_id; ?>';

    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/insertandupdate",
      data:{'action':'Reached_location','DC_id':DC_id,'order_id':'<?php echo $id; ?>','tablenamemain':'orders_process','tablename_sub':'order_product_list_process'}
    }).success(function(data){ });
};

$scope.returnview = function()
{

      $('#exampleModalScrollable').modal('toggle');
      //$scope.getProductlistdata();
      //$scope.fetchDataCategorybase(1);

      // for return purpose
      $scope.fetchDataCategorybase_return(1);
      $scope.fetchData_return();

     // $scope.fetchData();
      $('.returnclass').hide();
      $('#myLargeModalLabel').text('Return View');

      $('#reff').show();

};



 
 $scope.tripcomplete = function () {

    // gg changes for scope task
    var paymentmode= $('#cashmode').val();
    var utr_details= $('#utr_details').val();

    
    
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
    
    var DC_id='<?php echo $DC_id; ?>';

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

      //var vehicle_id= $('#vehicle_id').val();

      var vehicle_id='<?php echo $vehicle_id; ?>';
      var trip_id='<?php echo $trip_id; ?>';


      
      if(rescheduling_delivery=='Re-Delivery')
      {
          
             $('.showss').html('Please wait .....!');
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order_second/sales_return_driver_push_data",
                        data:{'km_reading_end':km_reading_end,'DC_id':DC_id,'order_id':'<?php echo $id; ?>'}
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
                                 //window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id="+vehicle_id+"&delivery_status=2");

  window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id="+vehicle_id+"&delivery_status=2&trip_id="+trip_id);

       
                            }
                               
                              
                        
                    
                        });
          
          
      }
      else if(rescheduling_delivery=='Rescheduling')
      {
          if(rescheduling_date!='')
          {
              
            
              
               $('.showss').html('Please wait .....!');
              
                $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/tripcomplete",
                        data:{'km_reading_end':km_reading_end,'DC_id':DC_id,'selectcollection_id_data':selectcollection_id_data,'return_excess1':return_excess1,'return_excess':return_excess,'c1_rs':c1_rs,'c2_rs':c2_rs,'c5_rs':c5_rs,'c10_rs':c10_rs,'c20_rs':c20_rs,'c50_rs':c50_rs,'otp':otp,'c100_rs':c100_rs,'c200_rs':c200_rs,'c500_rs':c500_rs,'c2000_rs':c2000_rs,'reference_no':reference_no,'paymentmode':paymentmode,'rescheduling_delivery':rescheduling_delivery,'rescheduling_date':rescheduling_date,'rescheduling_remarks':rescheduling_remarks,'order_id':'<?php echo $id; ?>'}
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
                               // window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id="+vehicle_id+"&delivery_status=2");

                                 window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id="+vehicle_id+"&delivery_status=2&trip_id="+trip_id);

                                
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

           // gg changes for scope task
           if(paymentmode =='Bank Transfer' && utr_details=='1'){

            if(reference_no == '') {

              alert('Please Enter Reference Number');
              return false;
            }
          }

 
                                $('.showss').html('Please wait .....!');
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



                                   var remarks=0;
                                   var return_id=$('#return_id').val();
                                   if(return_id>0)
                                   {


                                         var form_data = new FormData();  
                                         angular.forEach($scope.files_1, function(file){  
                                              form_data.append('file[]', file);  
                                         });  
                                         $http.post('<?php echo base_url() ?>index.php/products/fileuplaodimgsave_return_factory?id='+return_id+'&remarks='+remarks, form_data,  
                                         {  
                                              transformRequest: angular.identity,  
                                              headers: {'Content-Type': undefined,'Process-Data': false}  
                                         }).success(function(response){ 


                                       

                                         }); 


                                  }




                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/tripcomplete",
                        data:{'km_reading_end':km_reading_end,'DC_id':DC_id,'selectcollection_id_data':selectcollection_id_data,'return_excess1':return_excess1,'return_excess':return_excess,'c1_rs':c1_rs,'c2_rs':c2_rs,'c5_rs':c5_rs,'c10_rs':c10_rs,'c20_rs':c20_rs,'c50_rs':c50_rs,'otp':otp,'c100_rs':c100_rs,'c200_rs':c200_rs,'c500_rs':c500_rs,'c2000_rs':c2000_rs,'reference_no':reference_no,'paymentmode':paymentmode,'rescheduling_delivery':rescheduling_delivery,'rescheduling_date':rescheduling_date,'rescheduling_remarks':rescheduling_remarks,'order_id':'<?php echo $id; ?>'}
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
                                 //window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id="+vehicle_id+"&delivery_status=2");

                                   window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id="+vehicle_id+"&delivery_status=2&trip_id="+trip_id);


       
                            }
                               
                              
                        
                    
                        });
                        
                        
                        
                                
                        
          
      }
      else
      {
          
          
             $('.showss').html('Please wait .....!');
          
                                   var remarks=0;
                                   var return_id=$('#return_id').val();
                                   if(return_id>0)
                                   {


                                         var form_data = new FormData();  
                                         angular.forEach($scope.files_1, function(file){  
                                              form_data.append('file[]', file);  
                                         });  
                                         $http.post('<?php echo base_url() ?>index.php/products/fileuplaodimgsave_return_factory?id='+return_id+'&remarks='+remarks, form_data,  
                                         {  
                                              transformRequest: angular.identity,  
                                              headers: {'Content-Type': undefined,'Process-Data': false}  
                                         }).success(function(response){ 


                                       

                                         }); 


                                  }
          
          
             if(amount_data>0)
             {
                 
                      var getamount=$('#fulltotal').val();
                      var difference=$('#bal').text();
                      
                      //alert(difference+' '+getamount);
                       $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/tripcomplete",
                        data:{'getamount':getamount,'DC_id':DC_id,'difference':difference,'km_reading_end':km_reading_end,'selectcollection_id_data':selectcollection_id_data,'return_excess1':return_excess1,'return_excess':return_excess,'c1_rs':c1_rs,'c2_rs':c2_rs,'c5_rs':c5_rs,'c10_rs':c10_rs,'c20_rs':c20_rs,'c50_rs':c50_rs,'otp':otp,'c100_rs':c100_rs,'c200_rs':c200_rs,'c500_rs':c500_rs,'c2000_rs':c2000_rs,'reference_no':reference_no,'paymentmode':paymentmode,'rescheduling_delivery':rescheduling_delivery,'rescheduling_date':rescheduling_date,'rescheduling_remarks':rescheduling_remarks,'order_id':'<?php echo $id; ?>'}
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
                                 //window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id="+vehicle_id+"&delivery_status=2");

                                   window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id="+vehicle_id+"&delivery_status=2&trip_id="+trip_id);

                                
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


            var DC_id='<?php echo $DC_id; ?>';

      
      
          var validation=$('input[name="purchase_order_product_id"]:checked').val();
                
          if (typeof validation === "undefined") {
                   var validation=0;
          }
        
        
         
             var purchase_notes = [];
             var purchase_qty = [];
             var order_nos = [];


             $('input[name="purchase_order_product_id"]:checked').each(function(){
              
                 var pid=$(this).val();

                 purchase_notes.push($('#purchase_notes_'+pid).val()); 
                 purchase_qty.push($('#qty_'+pid).val()); 
                 order_nos.push($('#nos_'+pid).val()); 
                  
             });
      
             var purchase_notes_data= purchase_notes.join("|");
             var purchase_qty_data= purchase_qty.join("|");

             var order_nos_data= order_nos.join("|");
         
             var order_no= $('#order_no').val();
             var km_reading_end= $('#km_reading_end').val();
             //var vehicle_id= $('#vehicle_id').val();
var vehicle_id='<?php echo $vehicle_id; ?>';
 var trip_id='<?php echo $trip_id; ?>';
 
    if(validation!=0)
    {
        
    
 
  
    
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/sales_return_data_by_driver",
      data:{'order_id':'<?php echo $id; ?>','create_date':$scope.create_date,'DC_id':DC_id,'km_reading_end':km_reading_end,'remarks':$scope.remarks,'order_no':order_no,'order_nos_data':order_nos_data,'purchase_order_product_id':checkinsert,'purchase_qty_data':purchase_qty_data,'purchase_notes_data':purchase_notes_data,'action':'Inward','tablename':'order_sales_return_complaints'}
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

                                                                 $scope.fetchSingleDatatotaldel();

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
                                                                        //window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id="+vehicle_id+"&delivery_status=2");

                                                                          window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id="+vehicle_id+"&delivery_status=2&trip_id="+trip_id);




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
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_totaldel_driver?order_id=<?php echo $id; ?>&DC_id=<?php echo $DC_id; ?>",
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
       


       if(data.return_id>0)
       {
                $('#reff').show();
       }
       else
       {
               $('#reff').hide();
       }
     
       $scope.fullqty = data.fullqty;
       $scope.FACT = data.FACT;
       $scope.UNIT = data.UNIT;
       $scope.NOS = data.NOS;
     
    });
};






$scope.fetchSingleDatatotaldel = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_totaldel_driver?order_id=<?php echo $id; ?>&DC_id=<?php echo $DC_id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'orders_process','tablename_sub':'order_product_list_process','convert':'1'}
      }).success(function(data){

       $scope.fulltotaldel = data.discountfulltotal;
       $scope.tcsamount = data.tcsamount;
       
       $scope.commissiondel = data.commission;
       
       
       $scope.paricel_mode_del = data.paricel_mode;


       $scope.return_amount = data.return_amount;
       $scope.return_amount_show = data.return_amount;
       $scope.is_collection_remarks = data.is_collection_remarks;

       $('#is_collection_remarks').val(data.is_collection_remarks);
       // gg changes for return amount not included in amount to collect edit time
       var is_collection_remarks =data.is_collection_remarks;

        if(is_collection_remarks == 1){
          $scope.return_amount = 0;
        }



       $scope.return_id = data.return_id;
       
       $scope.delivery_mode = data.delivery_mode;

        $('#vehicle_id').val(data.vehicle_id);
      
       $scope.totalitemsdel = data.totalitems;
       $scope.discounttotaldel = data.discount;
       $scope.discountfulltotaldel = data.discountfulltotal;
      
     
       $scope.fullqtydel = data.fullqty;


       
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
       


       if(data.return_id>0)
       {
                $('#reff').show();
       }
       else
       {
               $('#reff').hide();
       }
     
       $scope.fullqty = data.fullqty;
       $scope.FACT = data.FACT;
       $scope.UNIT = data.UNIT;
       $scope.NOS = data.NOS;
     
      
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
          $scope.fetchDataCategorybase(1);

          $('.returnclass').show();
          $('#myLargeModalLabel').text('Create Return');
          
          
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
     var DC_id='<?php echo $DC_id; ?>';
      
     $http.get('<?php echo base_url() ?>index.php/order/get_purchase_product_list?order_no='+order_no+'&DC_id='+DC_id).success(function(data){
      
      
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
   




   
   
   $scope.loadProductAll = function(labletype) {
       
    
      
       if($('.select_categoryall'+labletype+'').is(':checked'))
       {
      
            $('.load_categoryall'+labletype+'').prop('checked',true);
             
        
       }
       else
       {
            $('.load_categoryall'+labletype+'').prop('checked',false);
        
        
           
       }
       
       
      
  };


  // gg chnages 
  $scope.loadProductAll_overall = function() {
    if ($('.checkall_overall').is(':checked')) {
        // Select all checkboxes of type checkbox
        $('input[type="checkbox"]').prop('checked', true);
    } else {
        // Uncheck all checkboxes
        $('input[type="checkbox"]').prop('checked', false);
    }
};


$scope.fetchCustomerdetails = function () {



 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchCustomerdetails_view",
      data:{'id':'<?php echo $id; ?>','DC_id':'<?php echo $DC_id; ?>','tablename':'orders_process'}
    }).success(function(data){
        
           //$scope.getPurchaseorderid(data.customer_id);
   
            $scope.company_name_data = data.company_name_data;
           
         
            
            $scope.localityname = data.localityname;
            $scope.delivery_date_time = data.delivery_date_time;
            $scope.SSD_check = data.SSD_check;
            $scope.excess_payment_status = data.excess_payment_status;
            $scope.sales_phone = data.sales_phone;
            $scope.sales_name = data.sales_name;
            $scope.loading_status = data.loading_status;

             
           
            $scope.customername = data.name;
            $scope.routename = data.route_name;
            
            $scope.lengeth = data.lengeth;
            $scope.collection_remarks = data.collection_remarks;
             
            
            $('#lat').val(data.lat);
            $('#laog').val(data.laog);
            
            
            $scope.address = data.address;
            $scope.orderno = data.order_no;
            
            
            $scope.customerphone = data.phone;
            $scope.starttime = data.create_date;
            $scope.totalamount = data.totalamount;
            
            $scope.payment_image = data.payment_image;
            // scope task for gg changes
            $('#reference_no').val(data.reference_no);

            $('#utr_details').val(data.utr_status);
           
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










































$scope.inputsave_1 = function (id,inputname,categories_id,type,profile,crimp,fact,rate,uom,weight) {


                     
                       
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
                               
                                
                              //    var nos= parseFloat($('#qty_'+id).val());
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
                           
                           
                     
                           // gg changes update for amount showing

                      $('#qty_'+id).val(sqt_qty);
                      var total=rate*sqt_qty;
                      var totalammt=total.toFixed(2);

                      $('.edit_amount_'+id).html(totalammt);


                      //AStockUpdate-live-01/07

                      var weg = weight;
                      var nos_c = nos;
                      var nos_old = nosold;

                        if(nos_c >0 ){
                            var singlewei = weg/nos_old;
                            return_val = (singlewei * nos_c).toFixed(3);
                        }else{
                            return_val = weg;
                        }

                      $('.weight_'+id).text(return_val);

                       //AStockUpdate-live-01/07
                      
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
        

        // gg changes for return afftect to balence
        var return_hidden_amount=$('#return_hidden_amount').val();
      
        // gg changes for return amount not included in amount to collect edit time
        var is_collection_remarks =$('#is_collection_remarks').val();

        if(is_collection_remarks == 1){
          var return_hidden_amount = 0;
        }

        if(return_hidden_amount != 0 && return_hidden_amount != '') {
          var allam=allam - return_hidden_amount;
        }

      
        var totbal=allam-amount_data;

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
        

        // gg changes for return afftect to balence
        var return_hidden_amount=$('#return_hidden_amount').val();
      
        // gg changes for return amount not included in amount to collect edit time
        var is_collection_remarks =$('#is_collection_remarks').val();

        if(is_collection_remarks == 1){
          var return_hidden_amount = 0;
        }

        if(return_hidden_amount != 0 && return_hidden_amount != '') {
          var allam=allam - return_hidden_amount;
        }

      
        var totbal=allam-amount_data;

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
        

        // gg changes for return afftect to balence
        var return_hidden_amount=$('#return_hidden_amount').val();
      
        // gg changes for return amount not included in amount to collect edit time
        var is_collection_remarks =$('#is_collection_remarks').val();

        if(is_collection_remarks == 1){
          var return_hidden_amount = 0;
        }

        if(return_hidden_amount != 0 && return_hidden_amount != '') {
          var allam=allam - return_hidden_amount;
        }

      
        var totbal=allam-amount_data;

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
        

        // gg changes for return afftect to balence
        var return_hidden_amount=$('#return_hidden_amount').val();
      
        // gg changes for return amount not included in amount to collect edit time
        var is_collection_remarks =$('#is_collection_remarks').val();

        if(is_collection_remarks == 1){
          var return_hidden_amount = 0;
        }

        if(return_hidden_amount != 0 && return_hidden_amount != '') {
          var allam=allam - return_hidden_amount;
        }

      
        var totbal=allam-amount_data;

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
        

        // gg changes for return afftect to balence
        var return_hidden_amount=$('#return_hidden_amount').val();
      
        // gg changes for return amount not included in amount to collect edit time
        var is_collection_remarks =$('#is_collection_remarks').val();

        if(is_collection_remarks == 1){
          var return_hidden_amount = 0;
        }

        if(return_hidden_amount != 0 && return_hidden_amount != '') {
          var allam=allam - return_hidden_amount;
        }

      
        var totbal=allam-amount_data;

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
        

        // gg changes for return afftect to balence
        var return_hidden_amount=$('#return_hidden_amount').val();
      
        // gg changes for return amount not included in amount to collect edit time
        var is_collection_remarks =$('#is_collection_remarks').val();

        if(is_collection_remarks == 1){
          var return_hidden_amount = 0;
        }

        if(return_hidden_amount != 0 && return_hidden_amount != '') {
          var allam=allam - return_hidden_amount;
        }

      
        var totbal=allam-amount_data;

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
        

        // gg changes for return afftect to balence
        var return_hidden_amount=$('#return_hidden_amount').val();
      
        // gg changes for return amount not included in amount to collect edit time
        var is_collection_remarks =$('#is_collection_remarks').val();

        if(is_collection_remarks == 1){
          var return_hidden_amount = 0;
        }

        if(return_hidden_amount != 0 && return_hidden_amount != '') {
          var allam=allam - return_hidden_amount;
        }

      
        var totbal=allam-amount_data;

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
        

        // gg changes for return afftect to balence
        var return_hidden_amount=$('#return_hidden_amount').val();
      
        // gg changes for return amount not included in amount to collect edit time
        var is_collection_remarks =$('#is_collection_remarks').val();

        if(is_collection_remarks == 1){
          var return_hidden_amount = 0;
        }

        if(return_hidden_amount != 0 && return_hidden_amount != '') {
          var allam=allam - return_hidden_amount;
        }

      
        var totbal=allam-amount_data;

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
        

        // gg changes for return afftect to balence
        var return_hidden_amount=$('#return_hidden_amount').val();
      
        // gg changes for return amount not included in amount to collect edit time
        var is_collection_remarks =$('#is_collection_remarks').val();

        if(is_collection_remarks == 1){
          var return_hidden_amount = 0;
        }

        if(return_hidden_amount != 0 && return_hidden_amount != '') {
          var allam=allam - return_hidden_amount;
        }

      
        var totbal=allam-amount_data;

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
        

        // gg changes for return afftect to balence
        var return_hidden_amount=$('#return_hidden_amount').val();
      
        // gg changes for return amount not included in amount to collect edit time
        var is_collection_remarks =$('#is_collection_remarks').val();

        if(is_collection_remarks == 1){
          var return_hidden_amount = 0;
        }

        if(return_hidden_amount != 0 && return_hidden_amount != '') {
          var allam=allam - return_hidden_amount;
        }

      
        var totbal=allam-amount_data;

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
   
<!-- gg changes for scope task  -->

<script>
    document.getElementById("cashmode").addEventListener("change", function() { 
        var paymentMode = this.value;
        var star = document.getElementById("mandatory-star");

        if (paymentMode === "Bank Transfer") {
            star.style.display = "inline"; // Show the star
        } else {
            star.style.display = "none"; // Hide the star
        }
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