<?php
include "header.php";
date_default_timezone_set("Asia/Kolkata");


// confimed page shown after assign the trip

if( $_GET['DC_id'] == '') {
    if($_GET['confirmed'] == 'true' ) {
           $this->db->select('sales_load_products.randam_id');
           $this->db->where('order_id',$_GET['id']);
        //    $this->db->where('randam_id !=','');
           $this->db->order_by('date_update','desc');
           $this->db->limit('1');
           $dc_details= $this->db->get('sales_load_products');
           $we12=$dc_details->row();
           $_GET['DC_id']=$we12->randam_id;
           $DC_id_data=$we12->randam_id;
}
}


$convertion=0;
$nnone="";
if(isset($_GET['convertion']))
{
        
     if($_GET['convertion']==2)
     {   
                 $read='disabled';
                 $read1='disabled';
                 $nnone='d-none';
                 $disabled='disabled';
                 $convertion=$_GET['convertion'];
     }
         
      
}

?>
<style>

    .salestable th {
        text-align:center!important;
    }
    .page-content {
        padding: 0px !important;
        margin: 0px !important;
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
    .last-colorchange span {
        padding: 8px 18px;
    }

    .setloadnos {
        margin: -4px 50px;
        position: absolute;
    }

    .loadamount {
        color: green;

        font-weight: 800;
    }

    .loadamountred {
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

    #google_translate_element {

        float: right;
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

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp"
    ng-controller="crudController">

    <div id="layout-wrapper">
        <?php echo $top_nav;

        $read = "readonly";
        $read1 = "readonly";
        //$readdriverset="Edit_";
        $readdriverset = "Billed ";
        $readdriver = "";
        if ($driver_pickip == '1') {
            //$readdriver="readonly";
            $readdriverset = "Actual_";
        }


        $inputboxread = "";
        $disabled = "";
        if ($DC_id_data != '') {


            $inputboxread = "disabled";
            $disabled = "disabled";

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
                                    <div class="card-body" ng-init="fetchCustomerdetails()">

                                        <div id="progrss-wizard" class="twitter-bs-wizard"
                                            ng-init="fetchSingleDatatotaldel()">

                                            <div id="google_translate_element" style=></div>

                                            <ul class="twitter-bs-wizard-nav nav nav-pills nav-justified"
                                                style="display:none;">
                                                <li class="nav-item">
                                                    <a href="#progress-seller-details" class="nav-link"
                                                        data-toggle="tab">
                                                        <div class="step-icon" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Seller Details">
                                                            <i class="bx bx-list-ul"></i>
                                                        </div>
                                                    </a>
                                                </li>




                                            </ul>
                                            <!-- wizard-nav -->

                                            <div id="bar" class="progress mt-4">
                                                <div
                                                    class="progress-bar bg-success progress-bar-striped progress-bar-animated">
                                                </div>
                                            </div>
                                            <div class="tab-content twitter-bs-wizard-tab-content">
                                                <div class="tab-pane" id="progress-seller-details">
                                                    <div class="text-start mb-4">
                                                        <h5>Customer Details </h5>
                                                        <input type="hidden" id="lat">
                                                        <input type="hidden" id="laog">
                                                        <div class="ticket-inner">
                                                            <div class="route">
                                                                <p class="">
                                                                    <span>Company : {{company_name_data}}</span>
                                                                    <span ng-if="customername">Contact Person :
                                                                        {{customername}}</span>
                                                                    <span>Contact Phone : {{customerphone}}</span>
                                                                    <span>{{address}}</span>


                                                                    <!--  <span><b>Locality: {{localityname}}</b></span>
                                                                  <span><b>Route: {{routename}}</b></span> -->


                                                                    <span>Delivery Date Time : {{delivery_date_time}} <b
                                                                            ng-if="SSD_check>0"
                                                                            style="color:red;">SDP</b> <b
                                                                            ng-if="excess_payment_status>0"
                                                                            style="color:black;">| Excess
                                                                            payment</b></span>



                                                                </p>
                                                                <p class="">
                                                                    <span class="font-size-12">{{orderno}}</span><a
                                                                        href="tel::{{customerphone}}"><span><i
                                                                                class="mdi-phone mdi font-size-20 me-1"></i>
                                                                            Call Customer</span></a>

                                                                    <span ng-if="lengeth>0"><b>Max Length :
                                                                            {{lengeth}}</b></span>


                                                                    <span style="color:red;"><b>Status :{{reason}}
                                                                        </b></span>



                                                                </p>








                                                            </div>


                                                            <ul>
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

                                                                    <li>DC ID <?php echo $i; ?> : <a
                                                                            href="<?php echo base_url(); ?>index.php/order/delivery_note?order_id=<?php echo base64_encode($dd->order_id); ?>&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process&viewstatus=1&DC_id=<?php echo $dd->randam_id; ?>&dc_count=<?php echo $i; ?>"
                                                                            target="_blank"><?php echo $dd->randam_id; ?></a>
                                                                    </li>




                                                                    <?php
                                                                    $i++;
                                                                }

                                                                ?>
                                                            </ul>


                                                            <div class="time">

                                                                <p><span>Invoice</span><span class="font-size-13"><i
                                                                            class="mdi-download mdi pe-1"></i>



                                                                        <a target="_blank"
                                                                            href="<?php echo base_url(); ?>index.php/order/overview?order_id=<?php echo base64_encode($id); ?>&old_tablename=orders_quotation&old_tablename_sub=order_product_list_quotation&tablename=orders_process&tablename_sub=order_product_list_process&movetablename=orders_process&movetablename_sub=order_product_list_process">Overview</a>

                                                                    </span></p>
                                                                <!--<p><span>DC</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span></p>-->
                                                                <p><span>SubTotal</span><span> Rs.
                                                                        {{fulltotaldel| indianCurrency}}</span></p>
                                                                <!-- <p ng-if="tcs_status==1"><span>TCS (+)</span><span> Rs.
                                                                        {{tcsamount_order}}</span></p> -->
                                                                <p><span>Delivery Charge</span><span> Rs.
                                                                        {{delivery_charge| indianCurrency}}</span></p>
                                                                <p><span>Bill Amount</span><span> Rs.
                                                                        {{fulltotaldel| indianCurrency}}</span></p>

                                                                <!-- gg changes -->
                                                                <?php if ($_GET['DC_id'] == "") { ?>
                                                                    <p><span>Packed</span><span> Rs.
                                                                            {{loadtotalamount| indianCurrency}}</span></p>
                                                                <?php } else { ?>
                                                                    <p ng-repeat="detail_packed in pickupDetails_data">
                                                                        <span>Packed</span><span> Rs.


                                                                        <?php if ($_GET['convertion'] == "2") { ?>

                                                                            {{detail_packed.total_picked_amount_summary_gate| indianCurrency}}

                                                                            <?php } else {?>

                                                                            {{detail_packed.total_picked_amount| indianCurrency}}

                                                                            <?php } ?>                                                                   
                                                                   
                                                                   
                                                                        </p>
                                                                <?php } ?>


                                                                <?php if ($_GET['convertion'] == "2") { ?>
                                                                    <p><span>LOADED</span><span> Rs.
                                                                            {{convertion_load_dc_amount| indianCurrency}}</span></p>
                                                                <?php } ?>


                                                                <p>
                                                                    <span>Return To Sale</span><span> Rs.
                                                                      
                                                                        {{ return_amount_return_to_sale | indianCurrency }}
                                                                    </span>
                                                                </p>

                                                                <input type="hidden" value="{{return_amount_return_to_sale}}" id="return_pick_up_value">


                                                               <p ng-if="return_amount_return_to_resale>0">
                                                                    <span>Return To Re-Sale</span><span> Rs.
                                                                      
                                                                        {{ return_amount_return_to_resale | indianCurrency }}
                                                                    </span>
                                                                </p>


                                                                <p ng-if="deliveredamount>0">
                                                                    <span>Delivered</span><span> Rs.
                                                                      
                                                                        {{ deliveredamount | indianCurrency }}
                                                                    </span>
                                                                </p>

                                                                <!-- gg changes -->
                                                               <!-- <?php if ($_GET['DC_id'] == "") { ?>
                                                                    <p><span>Balance </span><span> Rs.
                                                                            {{finalbalnce}}</span></p>
                                                                <?php } else { ?>
                                                                    <p ng-repeat="detail_packed in pickupDetails_data">

                                                                    
                                                                                    <?php if ($_GET['convertion'] == "2") { ?>

                                                                                        <span>Balance </span><span> Rs.
                                                                                            {{finalbalnce}}</span>


                                                                                    <?php } else {?>
                                                                                        
                                                                                        <span>Balance </span><span> Rs.
                                                                                        {{detail_packed.current_packed_balence}}</span>

                                                                                    <?php } ?>


                                                                    </p>
                                                                <?php } ?>-->


                                                                <p><span>Balance </span><span> Rs.
                                                                {{finalbalnce| indianCurrency}}</span></p>




<input type="hidden"  id="packed_balance" value="{{loadtotalamount}}">  
 <input type="hidden" id="finalbalnce" value="{{finalbalnce}}">  
 <input type="hidden" id="return_id" value="{{return_id}}"> 

                                                            </div>



                                                            <div class="accordion accordion-flush"
                                                                id="accordionFlushExample">

                                                                <div class="accordion-item">
                                                                <?php if($_GET['convertion'] !=2 ) { ?>
                                                                    <p style="float:right;">
                                                                        <label for="checkall">
                                                                            <input type="checkbox" id="checkall" <?php echo $disabled; ?>
                                                                                ng-click="loadProductAll()"> Pack ALL
                                                                        </label>
                                                                    </p>
                                                                <?php } ?>
                                                                    <h2 class="accordion-header">
                                                                        Product List

                                                                    </h2>

                                                                    <div id="flush-collapseOne">
                                                                        <div class="accordion-body p-1 text-muted">


                                                                            <div class="talbe-productList"
                                                                                ng-init="fetchDataCategorybase(1)">

                                                                                <div class="table-responsive_1"
                                                                                    ng-init="fetchData('1')">
                                                                                    <div class="table-rep-plugin"
                                                                                        ng-repeat="namecate in namesDatacate">


                                                                                        <h5 class="customTableHeading">
                                                                                            {{namecate.no}}.
                                                                                            {{namecate.categories_name}}
                                                                                        </h5>

                                                                                        <div class="customTableDesign mb-0"
                                                                                            data-pattern="priority-columns">
                                                                                            <table
                                                                                                id="datatable_{{namecate.categories_id}}"
                                                                                                class="table table-bordered dt-responsive  nowrap w-100 salestable">








                                                                                                <thead
                                                                                                    class="bg-gray text-red"
                                                                                                    ng-if="namecate.categories_id==1">



                                                                                                    <tr>
                                                                                                        <th class="table-width-3"
                                                                                                            rowspan="2">
                                                                                                            S.No</th>
                                                                                                        <th class="table-width-18"
                                                                                                            rowspan="2"
                                                                                                            data-priority="1"
                                                                                                            ng-click='sortColumn("product_name_tab")'
                                                                                                            ng-class='sortClass("product_name_tab")'>
                                                                                                            Products
                                                                                                        </th>

                                                                                                        <!--  <th class="table-width-8" data-priority="3">Default_UOM</th> -->
                                                                                                        <th class="table-width-8"
                                                                                                            data-priority="3">
                                                                                                            UOM</th>


                                                                                                        <th class="table-width-8"
                                                                                                            ng-if="namecate.labletype==2 || namecate.labletype==1"
                                                                                                            style="padding-bottom:0px"
                                                                                                            data-priority="3"
                                                                                                            ng-click='sortColumn("profile_tab")'
                                                                                                            ng-class='sortClass("profile_tab")'>
                                                                                                            {{namecate.lable}}
                                                                                                        </th>
                                                                                                        <th class="table-width-8"
                                                                                                            ng-if="namecate.labletype==2"
                                                                                                            data-priority="1"
                                                                                                            ng-click='sortColumn("crimp_tab")'
                                                                                                            ng-class='sortClass("crimp_tab")'>
                                                                                                            Length </th>



                                                                                                        <th class="table-width-6"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.labletype!=9"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("nos_tab")'
                                                                                                            ng-class='sortClass("nos_tab")'>
                                                                                                            Billing
                                                                                                            {{namecate.lablenos}}
                                                                                                        </th>


                                                                                                        <th class="table-width-6"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.labletype!=9"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("nos_tab")'
                                                                                                            ng-class='sortClass("nos_tab")'>
                                                                                                            Packing
                                                                                                            {{namecate.lablenos}}
                                                                                                        </th>


                                                                                                        <th class="table-width-6"
                                                                                                            ng-if="namecate.labletype!=9"
                                                                                                            rowspan="2"
                                                                                                            style="padding-bottom:0px"
                                                                                                            data-priority="3"
                                                                                                            ng-click='sortColumn("nos_tab")'
                                                                                                            ng-class='sortClass("nos_tab")'>
                                                                                                            Pending
                                                                                                            {{namecate.lablenos}}
                                                                                                        </th>


                                                                                                      




                                                                                                        <th class="table-width-10"
                                                                                                            ng-if="namecate.labletype!=9"
                                                                                                            rowspan="2"
                                                                                                            style="width:9%;padding-bottom:0px"
                                                                                                            data-priority="3"
                                                                                                            ng-click='sortColumn("nos_tab")'
                                                                                                            ng-class='sortClass("nos_tab")'>
                                                                                                            Dispatch completed
                                                                                                        </th>




                                                                                                        <!--<th class="table-width-6" data-priority="3">Unit</th>-->
                                                                                                        <!--<th class="table-width-8" data-priority="6"  ng-click='sortColumn("Meter_to_Sqr_feet")' ng-class='sortClass("Meter_to_Sqr_feet")'>Sqft </th>-->
                                                                                                        <th class="table-width-10"
                                                                                                            data-priority="6"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("rate_tab")'
                                                                                                            ng-class='sortClass("rate_tab")'>
                                                                                                            Rate </th>


                                                                                                        <th class="table-width-6"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.labletype==9"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("nos_tab")'
                                                                                                            ng-class='sortClass("nos_tab")'>
                                                                                                            Pending QTY
                                                                                                        </th>


                                                                                                        <th class="table-width-6"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.labletype==9"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("nos_tab")'
                                                                                                            ng-class='sortClass("nos_tab")'>
                                                                                                            Packing QTY
                                                                                                        </th>

                                                                                                        <th class="table-width-6"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.labletype==9"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("nos_tab")'
                                                                                                            ng-class='sortClass("nos_tab")'>
                                                                                                            Load QTY
                                                                                                        </th>

                                                                                                        <!-- <th class="table-width-10"
                                                                                                            data-priority="6"
                                                                                                            rowspan="2" style="width:5%;"
                                                                                                            ng-click='sortColumn("qty_tab")'
                                                                                                            ng-class='sortClass("qty_tab")'>
                                                                                                                Theoretical QTY
                                                                                                        </th> -->


                                                                                                        <th class="table-width-10"
                                                                                                            data-priority="6"
                                                                                                            rowspan="2" style="width:5%;"
                                                                                                            ng-click='sortColumn("qty_tab")'
                                                                                                            ng-class='sortClass("qty_tab")'>
                                                                                                            Billed QTY
                                                                                                        </th>

                                                                                                        <th class="table-width-10"
                                                                                                            data-priority="6"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("qty_tab")'
                                                                                                            ng-class='sortClass("qty_tab")'>

                                                                                                            <?php if($convertion!= 2) { ?> Packed <?php }else {  ?> Loaded<?php } ?>
                                                                                                            
                                                                                                           
                                                                                                           
                                                                                                           QTY </th>

                                                                                                           <!-- FOR DATE ORDER -->


                                                                                                        <?php if(isset($_GET['convertion'])) { ?>

                                                                                                        <th class="table-width-10" data-priority="6" ng-if="namecate.uom=='Kg' || namecate.uom=='Kg1'" rowspan="2"
                                                                                                        ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'>Actual Loaded QTY </th>

                                                                                                        <?php } ?>





                                                                                                        <th class="table-width-10 comdisplay"
                                                                                                            rowspan="2"
                                                                                                            ng-if="commission_check==1"
                                                                                                            data-priority="6"
                                                                                                            ng-click='sortColumn("commission_tab")'
                                                                                                            ng-class='sortClass("commission_tab")'>
                                                                                                            Commission
                                                                                                        </th>
                                                                                                        <th class="table-width-10"
                                                                                                            data-priority="6"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("amount_tab")'
                                                                                                            ng-class='sortClass("amount_tab")'>
                                                                                                            Billed Amount
                                                                                                        </th>
                                                                                                        <th class="table-width-10"
                                                                                                            data-priority="6"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("amount_tab")'
                                                                                                            ng-class='sortClass("amount_tab")'>
                                                                                                          
                                                                                                            <?php if($convertion!= 2) { ?> Packed <?php }else {  ?> Loaded <?php } ?> 
                                                                                                           
                                                                                                           Amount </th>

                                                                                                            <th class="table-width-10"
                                                                                                            data-priority="6"
                                                                                                            rowspan="2" ng-if="namecate.cate_status==1"
                                                                                                            ng-click='sortColumn("amount_tab")'
                                                                                                            ng-class='sortClass("amount_tab")'>
                                                                                                            Attachment</th>

                                                                                                            
                                                                                                            <?php if ($_GET['DC_id'] == "") { ?>

                                                                                                                            <th class="table-width-10"
                                                                                                                                data-priority="6"
                                                                                                                                rowspan="2">
                                                                                                                                Status
                                                                                                                            </th>
                                                                                                            <?php } ?>

                                                                                                    </tr>



                                                                                                </thead>



                                                                                                <thead
                                                                                                    class="bg-gray text-red"
                                                                                                    ng-if="namecate.categories_id!=1">



                                                                                                    <tr>
                                                                                                        <th class="table-width-3"
                                                                                                            rowspan="2">
                                                                                                            S.No</th>
                                                                                                        <th class="table-width-18"
                                                                                                            rowspan="2"
                                                                                                            data-priority="1"
                                                                                                            ng-click='sortColumn("product_name_tab")'
                                                                                                            ng-class='sortClass("product_name_tab")'>
                                                                                                            Products
                                                                                                        </th>

                                                                                                        <th class="table-width-18"
                                                                                                            ng-if="namecate.labletype==4"
                                                                                                            rowspan="2"
                                                                                                            data-priority="1"
                                                                                                            ng-click='sortColumn("product_name_tab")'
                                                                                                            ng-class='sortClass("product_name_tab")'>
                                                                                                            Tile
                                                                                                            Material
                                                                                                        </th>



                                                                                                        <th class="table-width-18"
                                                                                                            ng-if="namecate.labletype==16 || namecate.labletype==19"
                                                                                                            rowspan="2"
                                                                                                            data-priority="1">
                                                                                                            Material
                                                                                                            Specfication
                                                                                                        </th>



                                                                                                        <th class="table-width-15"
                                                                                                            ng-if="namecate.labletype==19"
                                                                                                            rowspan="2"
                                                                                                            data-priority="1">
                                                                                                            Remarks
                                                                                                        </th>


                                                                                                        <th class="table-width-15"
                                                                                                            ng-if="namecate.labletype==19"
                                                                                                            rowspan="2"
                                                                                                            data-priority="1">
                                                                                                            Coil_no
                                                                                                        </th>





                                                                                                        <th class="table-width-18"
                                                                                                            ng-if="namecate.categories_id==592"
                                                                                                            rowspan="2"
                                                                                                            data-priority="1">
                                                                                                            Description
                                                                                                        </th>

                                                                                                        <th class="table-width-8"
                                                                                                            ng-if="namecate.labletype==5 || namecate.labletype==6 || namecate.categories_id==611 || namecate.categories_id==627">
                                                                                                            Billing
                                                                                                            Option</th>



                                                                                                        <!-- <th class="table-width-8" data-priority="3" ng-if="namecate.labletype!=9">Default_UOM</th> -->
                                                                                                        <th class="table-width-8"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.labletype!=9">
                                                                                                            UOM</th>

                                                                                                       


                                                                                                        <th class="table-width-15"
                                                                                                            ng-if="namecate.labletype==19"
                                                                                                            rowspan="2"
                                                                                                            data-priority="1"
                                                                                                            ng-click='sortColumn("product_name_tab")'
                                                                                                            ng-class='sortClass("product_name_tab")'>
                                                                                                            Coil_Status
                                                                                                        </th>

                                                                                                        <!-- hided by gg changes -->

                                                                                                        <!-- <th class="table-width-15"
                                                                                                            ng-if="namecate.labletype==19"
                                                                                                            rowspan="2"
                                                                                                            data-priority="1"
                                                                                                            ng-click='sortColumn("product_name_tab")'
                                                                                                            ng-class='sortClass("product_name_tab")'>
                                                                                                            Nos
                                                                                                        </th> -->

                                                                                                       

                                                                                                        <th class="table-width-8"
                                                                                                            ng-if="namecate.labletype==11 || namecate.labletype==12">
                                                                                                            Dim 1</th>
                                                                                                        <th class="table-width-8"
                                                                                                            ng-if="namecate.labletype==11 || namecate.labletype==12">
                                                                                                            Dim 2</th>
                                                                                                        <th class="table-width-8"
                                                                                                            ng-if="namecate.labletype==12">
                                                                                                            Dim 3</th>


                                                                                                        <th class="table-width-4"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.labletype==7 || namecate.labletype==8 || namecate.labletype==0 || namecate.labletype==1 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.categories_id==611 || namecate.categories_id==627 ||  namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12 || namecate.labletype==4 || namecate.labletype==15"
                                                                                                            style="padding-bottom:0px"
                                                                                                            ng-click='sortColumn("profile_tab")'
                                                                                                            ng-class='sortClass("profile_tab")'>
                                                                                                            {{namecate.lable}}
                                                                                                        </th>

                                                                                                    
                                                                                                        <th class="table-width-4"
                                                                                                            ng-if=" namecate.labletype==1008 && namecate.categories_id ==13"
                                                                                                            data-priority="1"
                                                                                                            style="padding-bottom:0px"
                                                                                                            ng-click='sortColumn("crimp_tab")'
                                                                                                            ng-class='sortClass("crimp_tab")'>
                                                                                                            {{namecate.lable2}}
                                                                                                        </th>





                                                                                                        <th class="table-width-4"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.categories_id==13"
                                                                                                            style="padding-bottom:0px"
                                                                                                            ng-click='sortColumn("profile_tab")'
                                                                                                            ng-class='sortClass("profile_tab")'>
                                                                                                            Billing {{namecate.lable}}
                                                                                                        </th>


                                                                                                        <th class="table-width-4"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.categories_id==13"
                                                                                                            style="padding-bottom:0px"
                                                                                                            ng-click='sortColumn("profile_tab")'
                                                                                                            ng-class='sortClass("profile_tab")'>
                                                                                                            Packing {{namecate.lable}}
                                                                                                        </th>


                                                                                                        <?php if ($_GET['DC_id'] == "") { ?>



                                                                                                          <th class="table-width-4"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.categories_id==13"
                                                                                                            style="padding-bottom:0px"
                                                                                                            ng-click='sortColumn("profile_tab")'
                                                                                                            ng-class='sortClass("profile_tab")'>
                                                                                                            Pending {{namecate.lable}}
                                                                                                        </th>

                                                                                                        <?php 


                                                                                                    }


                                                                                                        ?>







                                                                                                        <th class="table-width-4"
                                                                                                        ng-if="namecate.labletype==8 && namecate.categories_id != 32" 
                                                                                                            data-priority="3"
                                                                                                            style="padding-bottom:0px"
                                                                                                            ng-click='sortColumn("crimp_tab")'
                                                                                                            ng-class='sortClass("crimp_tab")'>
                                                                                                            Extra
                                                                                                            {{namecate.lable}}
                                                                                                        </th>

                                                                                                        <th class="table-width-4"
                                                                                                            ng-if="namecate.labletype==8"
                                                                                                            style="display:none;"
                                                                                                            data-priority="3"
                                                                                                            style="padding-bottom:0px"
                                                                                                            ng-click='sortColumn("back_crimp_tab")'
                                                                                                            ng-class='sortClass("back_crimp_tab")'>
                                                                                                            Back
                                                                                                            {{namecate.lable}}
                                                                                                        </th>

                                                                                                        <th class="table-width-4"
                                                                                                            ng-if="(namecate.labletype==11 || namecate.labletype==7 || namecate.labletype==12 || namecate.labletype==0 || namecate.labletype==1 || namecate.labletype==6 || namecate.labletype==15) && namecate.categories_id !=5 && namecate.categories_id !=611 && namecate.categories_id !=627 && namecate.categories_id !=13 "
                                                                                                            data-priority="1"
                                                                                                            style="padding-bottom:0px"
                                                                                                            ng-click='sortColumn("crimp_tab")'
                                                                                                            ng-class='sortClass("crimp_tab")'>
                                                                                                            {{namecate.lable2}}
                                                                                                        </th>


                                                                                                        


                                                                                                         















                                                                                                        <th class="table-width-6"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.labletype!=9 && namecate.categories_id !=13"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("nos_tab")'
                                                                                                            ng-class='sortClass("nos_tab")'>
                                                                                                            Billing
                                                                                                            {{namecate.lablenos}}
                                                                                                        </th>



                                                                                                        <th class="table-width-6"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.labletype!=9 && namecate.categories_id !=13"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("nos_tab")'
                                                                                                            ng-class='sortClass("nos_tab")'>

                                                                                                            <?php if($convertion!= 2) { ?> Packing <?php }else {  ?> Loading<?php } ?>
                                                                                                            
                                                                                                            {{namecate.lablenos}}
                                                                                                        </th>
                                     

                                                                                                        <th class="table-width-6"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.categories_id ==13"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("nos_tab")'
                                                                                                            ng-class='sortClass("nos_tab")'>
                                                                                                            
                                                                                                            {{namecate.lablenos}}
                                                                                                        </th>


                                                                                                        <th class="table-width-6"
                                                                                                            data-priority="3"
                                                                                                            ng-if=" namecate.categories_id ==13"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("nos_tab")'
                                                                                                            ng-class='sortClass("nos_tab")'>
                                                                                                            
                                                                                                            {{ namecate.lablefact1 }} {{ namecate.lablefact2 }}
                                                                                                        </th>

                                                                                                         <?php if ($_GET['DC_id'] == "") { ?>





                                                                                                            <th class="table-width-6"
                                                                                                                ng-if="namecate.labletype!=9 && namecate.categories_id !=13"
                                                                                                                rowspan="2"
                                                                                                                style="padding-bottom:0px"
                                                                                                                data-priority="3"
                                                                                                                ng-click='sortColumn("nos_tab")'
                                                                                                                ng-class='sortClass("nos_tab")'>
                                                                                                                Pending
                                                                                                                {{namecate.lablenos}}
                                                                                                            </th>
                                                                                                        <?php } ?>

                                                                                                        <?php //if ($_GET['DC_id'] == "") { ?>


                                                                                                            <th class="table-width-6"
                                                                                                                ng-if="namecate.labletype!=9"
                                                                                                                rowspan="2"
                                                                                                                style="width:9%;padding-bottom:0px"
                                                                                                                data-priority="3"
                                                                                                                ng-click='sortColumn("nos_tab")'
                                                                                                                ng-class='sortClass("nos_tab")'>
                                                                                                                Dispatch completed
                                                                                                            </th>

                                                                                                        <?php //} ?>
                                                                                                        <!--<th class="table-width-6" data-priority="3">Unit</th>-->



                                                                                                        <!--<th class="table-width-8" data-priority="6"  ng-click='sortColumn("Meter_to_Sqr_feet")' ng-class='sortClass("Meter_to_Sqr_feet")'>Sqft </th>-->
                                                                                                        <th class="table-width-6"
                                                                                                            data-priority="6"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("rate_tab")'
                                                                                                            ng-class='sortClass("rate_tab")'>
                                                                                                            Rate </th>
                                                                                                        <th class="table-width-10 comdisplay"
                                                                                                            rowspan="2"
                                                                                                            ng-if="commission_check==1"
                                                                                                            data-priority="6"
                                                                                                            ng-click='sortColumn("commission_tab")'
                                                                                                            ng-class='sortClass("commission_tab")'>
                                                                                                            Commission
                                                                                                        </th>



                                                                                                        <th class="table-width-6"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.labletype==9"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("nos_tab")'
                                                                                                            ng-class='sortClass("nos_tab")'>
                                                                                                            Billing Nos
                                                                                                        </th>


                                                                                                        


                                                                                                        <th class="table-width-6"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.labletype==9"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("nos_tab")'
                                                                                                            ng-class='sortClass("nos_tab")'>
                                                                                                            Packing QTY
                                                                                                        </th>

                                                                                                        


                                                                                                        <th class="table-width-6"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.labletype==9"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("nos_tab")'
                                                                                                            ng-class='sortClass("nos_tab")'>
                                                                                                            Pending QTY
                                                                                                        </th>

                                                                                                        

                                                                                                        <th class="table-width-6"
                                                                                                            data-priority="3"
                                                                                                            ng-if="namecate.labletype==9"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("nos_tab")'
                                                                                                            ng-class='sortClass("nos_tab")'>
                                                                                                            Dispatch completed	
                                                                                                        </th>

                                                                                                        <th class="table-width-10"
                                                                                                            data-priority="6"
                                                                                                            rowspan="2" style="width:5%;"
                                                                                                            ng-click='sortColumn("qty_tab")'
                                                                                                            ng-class='sortClass("qty_tab")'>
                                                                                                                Theoretical QTY
                                                                                                        </th>


                                                                                                        <th class="table-width-10"
                                                                                                            ng-if="namecate.labletype!=9"
                                                                                                            data-priority="6"
                                                                                                            rowspan="2" style="width:5%;"
                                                                                                            ng-click='sortColumn("qty_tab")'
                                                                                                            ng-class='sortClass("qty_tab")'>
                                                                                                            Billed QTY
                                                                                                        </th>

                                                                                                        <th class="table-width-10"
                                                                                                            ng-if="namecate.labletype!=9"
                                                                                                            data-priority="6"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("qty_tab")'
                                                                                                            ng-class='sortClass("qty_tab")'>
                                                                                                            <?php if($convertion!= 2) { ?> Packed <?php }else {  ?> Loaded <?php } ?>  QTY
                                                                                                        </th>

                                                                                                        <!-- FOR GATE ORDERS -->

                                                                                                        <?php
                                                                                                            if(isset($_GET['convertion'])) {
                                                                                                            ?>

                                                                                                                    <th class="table-width-10" data-priority="6"  rowspan="2"  ng-if="namecate.uom=='Kg' || namecate.uom=='Kg1'" 
                                                                                                                    ng-click='sortColumn("qty_tab")' ng-class='sortClass("qty_tab")'>Actual Loaded QTY</th>

                                                                                                             <?php } ?>

                                                                                                        <th class="table-width-10"
                                                                                                            data-priority="6"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("amount_tab")'
                                                                                                            ng-class='sortClass("amount_tab")'>
                                                                                                            Billed Amount
                                                                                                        </th>

                                                                                                        <th class="table-width-10"
                                                                                                            data-priority="6"
                                                                                                            rowspan="2"
                                                                                                            ng-click='sortColumn("amount_tab")'
                                                                                                            ng-class='sortClass("amount_tab")'>

                                                                                                            <?php if($convertion!= 2) { ?> Packed <?php }else {  ?> Loaded <?php } ?>
                                                                                                           
                                                                                                            Amount </th>

                                                                                                            
                                                                                                            

                                                                                                            <th class="table-width-10" ng-if="namecate.cate_status==1"  data-priority="6"
                                                                                                           
                                                                                                            ng-click='sortColumn("amount_tab")'
                                                                                                            ng-class='sortClass("amount_tab")'
                                                                                                            >Attachment</th>


                                                                                                        <?php if ($_GET['DC_id'] == "") { ?>

                                                                                                            <th class="table-width-10"
                                                                                                                data-priority="6"
                                                                                                                rowspan="2">
                                                                                                                Status
                                                                                                            </th>
                                                                                                        <?php } ?>


                                                                                                    </tr>






                                                                                                </thead>






                                                                                                <tbody
                                                                                                    ng-repeat="name in namesData|orderBy:column:reverse"
                                                                                                    ng-if="namecate.categories_id==1">

                                                                                                    <input type="hidden" id="old_fact_{{name.id}}" value="{{ name.commission_fact }}">
                                                                                                    <!-- gg changes for crimp -->
                                                                                                    <input type="hidden" id="crimp_{{name.id}}" value="{{ name.crimp_tab }}">
                                                                                                    <input type="hidden" id="fact2_{{name.id}}" value="{{ name.fact2 }}">

                                                                                                 
                            <input type="hidden" id="default_weight_{{ name.id }}" value="{{ name.default_weight }}">
                            <input type="hidden" id="standard_weight_{{ name.id }}" value="{{ name.standard_weight }}">
                            <input type="hidden" id="default_fact_{{ name.id }}" value="{{ name.default_fact }}">
                            <input type="hidden" id="basefact_{{ name.id }}" value="{{ name.basefact }}">
                            <input type="hidden" id="basecat_{{ name.id }}" value="{{ name.basecat }}">
                            <input type="hidden" id="default_thickness_{{ name.id }}" value="{{ name.thickness }}">
                            <input type="hidden" id="thickness_tile_prod_{{ name.id }}" value="{{ name.thickness_tile_prod }}">
                            <input type="hidden" id="kg_rmtr_weight_{{ name.id }}" value="{{ name.kg_rmtr_weight }}">
                            <input type="hidden" id="standard_weight_{{ name.id }}" value="{{ name.standard_weight }}">
                            <input type="hidden" id="top_{{ name.id }}" value="{{ name.top }}">
                            <input type="hidden" id="bottom_{{ name.id }}" value="{{ name.bottom }}">
                            <input type="hidden" id="foarm_{{ name.id }}" value="{{ name.foarm }}">
                            <input type="hidden" id="product_name_sub_thick_{{ name.id }}" value="{{ name.product_name_sub_thick }}">

   
                            <input type="hidden" id="old_rate_{{name.id}}" value="{{ name.rate_tab_old }}">
                            <input type="hidden" id="img_width_{{ name.id }}" value="{{ name.img_width }}">
                            <input type="hidden" id="img_width_cl_{{ name.id }}" value="{{ name.img_width }}">
                            <input type="hidden" id="image_id_{{ name.id }}" value="{{ name.base_id }}">
                                                              
                            <input type="hidden" id="weight_{{ name.id }}" value="{{ name.weight }}">

                            <input type="hidden" id="profile_{{ name.id }}" value="{{ name.profile_tab }}">
                            <input type="hidden" id="total_bill_nos_{{ name.id }}" value="{{ name.bill_nos }}">



                                                                                                    <tr class="{{name.picked_status == 1 ? 'disabled-div' : ''}} view "
                                                                                                        ng-style="name.rate_edit == 1 && {'color':'red'}"
                                                                                                        ng-if="namecate.categories_id==name.categories_id_get && namecate.type==name.type">


                                                                                                       



                                                                                                        <td
                                                                                                            data-label="S No">
                                                                                                            {{name.no}}</span>




                                                                                                            <i class="mdi mdi-check  font-size-16"
                                                                                                                ng-if="name.purchase_request==1"
                                                                                                                ng-click="getPurchaserequest(name.purchase_id,name.product_name_tab)"
                                                                                                                title="Purchase requested"
                                                                                                                style="cursor: pointer;"></i>




                                                                                                        </td>



                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            value="{{namecate.categories_id}}"
                                                                                                            id="cateid_{{name.id}}">
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            value="{{namecate.type}}"
                                                                                                            id="cateidtype_{{name.id}}">
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            value="{{name.product_id}}"
                                                                                                            id="ppid_{{name.id}}">


                                                                                                        <td title="{{name.categories}}"
                                                                                                            data-label="Products">
                                                                                                            {{name.product_name_tab}}

                                                                                                        </td>

                                                                                                        <!-- <td  data-priority="3" ng-if="namecate.labletype!=9" data-label="UOM">FEET</td> -->
                                                                                                        <td data-priority="3"
                                                                                                            ng-if="namecate.labletype!=9"
                                                                                                            data-label="UOM">

                                                                                                            <select
                                                                                                                class="selectbox"
                                                                                                                disabled
                                                                                                                id="uom_{{name.id}}"
                                                                                                                ng-model="calulation">
                                                                                                                <option
                                                                                                                    value="3"
                                                                                                                    ng-selected="{{name.uom == 3}}">
                                                                                                                    FEET
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="4"
                                                                                                                    ng-selected="{{name.uom == 4}}">
                                                                                                                    MM
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="5"
                                                                                                                    ng-selected="{{name.uom == 5}}">
                                                                                                                    MTR
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="6"
                                                                                                                    ng-selected="{{name.uom == 6}}">
                                                                                                                    INCH
                                                                                                                </option>
                                                                                                            </select>






                                                                                                        </td>



                                                                                                        <td
                                                                                                            data-label="{{namecate.lable}}">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"
                                                                                                                id="profile_{{name.id}}"
                                                                                                                data-title="{{name.cul}}"
                                                                                                                value="{{name.profile_tab}}">
                                                                                                        </td>


                                                                                                        <td ng-if="namecate.labletype==2"
                                                                                                            data-label="Crimp">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"
                                                                                                                id="crimp_{{name.id}}"
                                                                                                                value="{{name.crimp_tab}}">
                                                                                                        </td>


                                                                                                        <td
                                                                                                            data-label="Nos">

                                                                                                            {{name.bill_nos}}



                                                                                                        </td>



                                                                                                        <td
                                                                                                            ng-if="namecate.labletype!=9">





                                                                                                            <?php
                                                                                                            if ($readdriver == '') {

                                                                                                                if ($_GET['DC_id'] == "") {


                                                                                                                    ?>
                                                                                                            


                                                                                                                <span
                                                                                                                    ng-if='name.empty_loadnos_input>0 && name.picked_status==0 && name.loadstatus==0'
                                                                                                                    class="loadamount">

                                                                                                                    <input
                                                                                                                        type="text"
                                                                                                                        <?php echo $readdriver; ?>
                                                                                                                        <?php echo $inputboxread; ?>
                                                                                                                        ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"
                                                                                                                        style="border: #bbbbbb solid 2px;"
                                                                                                                        data-val="{{name.bill_nos-name.edit_nos}}"
                                                                                                                        class="nos_{{namecate.categories_id}}"
                                                                                                                        id="nos_{{name.id}}"
                                                                                                                        value="{{name.empty_loadnos_input}}">

                                                                                                                </span>


                                                                                                                <span
                                                                                                                    ng-if='name.empty_loadnos_input>0 && name.picked_status==1 && name.loadstatus==0'
                                                                                                                    class="loadamount">

                                                                                                                    <input
                                                                                                                        type="text"
                                                                                                                        <?php echo $readdriver; ?>
                                                                                                                        <?php echo $inputboxread; ?>
                                                                                                                        ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"
                                                                                                                        style="border: #bbbbbb solid 2px;"
                                                                                                                        data-val="{{name.bill_nos-name.edit_nos}}"
                                                                                                                        class="nos_{{namecate.categories_id}}"
                                                                                                                        id="nos_{{name.id}}"
                                                                                                                        value="{{name.empty_loadnos_input}}">

                                                                                                                </span>



                                                                                                                <span
                                                                                                                    ng-if='name.empty_loadnos_input>0 && name.loadstatus==1'
                                                                                                                    class="loadamount">

                                                                                                                    <input
                                                                                                                        type="text"
                                                                                                                        <?php echo $readdriver; ?>
                                                                                                                        <?php echo $inputboxread; ?>
                                                                                                                        ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"
                                                                                                                        style="border: #bbbbbb solid 2px;"
                                                                                                                        data-val="{{name.bill_nos-name.dis_nos}}"
                                                                                                                        class="nos_{{namecate.categories_id}}"
                                                                                                                        id="nos_{{name.id}}"
                                                                                                                        value="{{name.empty_loadnos_input}}">

                                                                                                                </span>




                                                                                                                <span
                                                                                                                    ng-if='name.empty_loadnos==0 && name.picked_status==0'
                                                                                                                    class="loadamount">


                                                                                                                    <input
                                                                                                                        type="text"
                                                                                                                        <?php echo $readdriver; ?>
                                                                                                                        <?php echo $inputboxread; ?>
                                                                                                                        ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"
                                                                                                                        style="border: #bbbbbb solid 2px;"
                                                                                                                        data-val="{{name.bill_nos-name.edit_nos}}"
                                                                                                                        class="nos_{{namecate.categories_id}}"
                                                                                                                        id="nos_{{name.id}}"
                                                                                                                        value="{{name.bill_nos-name.edit_nos}}">

                                                                                                                </span>








                                                                                                                <span
                                                                                                                    ng-if="name.bill_nos==0">0</span>
                                                                                                                    <?php
                                                                                                                } else { ?>
                                                                                                                    <span>{{name.nos_tab_value}}</span>
                                                                                                                <?php }
                                                                                                            }
                                                                                                            ?>

                                                                                                        </td>



                                                                                                        <td
                                                                                                            ng-if="namecate.labletype!=9">


                                                                                                            <span
                                                                                                                ng-if='name.empty_loadnos>0'
                                                                                                                class="loadamountred">
                                                                                                                 <!-- {{name.bill_nos-name.empty_loadnos}} -->
                                                                                                                    {{ (name.bill_nos - name.empty_loadnos) < 0 ? 0 : (name.bill_nos - name.empty_loadnos) }}
                                                                                                            </span>

                                                                                                            <span
                                                                                                                ng-if='name.empty_loadnos==0'>

                                                                                                                <span
                                                                                                                    ng-if="name.dis_nos>0"
                                                                                                                    class="loadamountred">{{name.bill_nos-name.dis_nos}}</span>
                                                                                                                <span
                                                                                                                    ng-if="name.dis_nos==0"
                                                                                                                    class="loadamountred">{{name.empty_loadnos}}</span>

                                                                                                            </span>


                                                                                                        </td>

                                                                                                        <td data-label="Nos"
                                                                                                            ng-if="namecate.labletype!=9">



                                                                                                            <span
                                                                                                                ng-if='name.dis_nos>0'>{{name.dis_nos}}</span>


                                                                                                        </td>






                                                                                                        <!--<td><input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'unit',namecate.categories_id)"  id="unit_{{name.id}}" value="{{name.unit_tab}}"></td>-->
                                                                                                        <td
                                                                                                            style="display:none;">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                ng-keyup="inputsave_1(name.id,'fact',namecate.categories_id,namecate.type)"
                                                                                                                id="fact_{{name.id}}"
                                                                                                                value="{{name.fact_tab}}">
                                                                                                        </td>


                                                                                                        <!--<td><input type="text"  ng-keyup="inputsave_1(name.id,'Meter_to_Sqr_feet',namecate.categories_id)" id="Meter_to_Sqr_feet_{{name.id}}" value="{{name.Meter_to_Sqr_feet}}"></td>-->
                                                                                                        <td
                                                                                                            data-label="Rate">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                ng-keyup="inputsaverate_1(name.id,'rate',namecate.categories_id,namecate.type)"
                                                                                                                id="rate_{{name.id}}"
                                                                                                                value="{{name.rate_tab}}">

                                                                                                            <span
                                                                                                                class="td-info-icons td-competitor-price">


                                                                                                                <button
                                                                                                                    class="btn dropdown-toggle p-0 font-size-12"
                                                                                                                    type="button"
                                                                                                                    ng-click="pricelist(name.product_id,name.product_name_tab)"
                                                                                                                    data-bs-toggle="offcanvas"
                                                                                                                    data-bs-target="#offcanvasSpec-pricelist"
                                                                                                                    aria-controls="offcanvasSpec-pricelist">
                                                                                                                    <i
                                                                                                                        class="fas fa-rupee-sign"></i>
                                                                                                                </button>



                                                                                                            </span>
                                                                                                        </td>

                                                                                                        <td ng-if="commission_check==1"
                                                                                                            data-label="Commission"
                                                                                                            class="comdisplay">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                ng-keyup="inputsave_1(name.id,'commission',namecate.categories_id,namecate.type)"
                                                                                                                id="commission_{{name.id}}"
                                                                                                                value="{{name.commission_tab}}">
                                                                                                        </td>


                                                                                                        <td
                                                                                                            ng-if="namecate.labletype==9">


                                                                                                            <span
                                                                                                                ng-if='name.empty_loadqty>0'
                                                                                                                class="loadamountred">
                                                                                                                {{name.bill_qty-name.empty_loadqty}}
                                                                                                            </span>

                                                                                                            <span
                                                                                                                ng-if='name.empty_loadqty==0'>

                                                                                                                <span
                                                                                                                    ng-if="name.dispatch_qty>0"
                                                                                                                    class="loadamountred">{{name.bill_qty-name.dispatch_qty}}</span>
                                                                                                                <span
                                                                                                                    ng-if="name.dispatch_qty==0"
                                                                                                                    class="loadamountred">{{name.empty_loadqty}}</span>

                                                                                                            </span>


                                                                                                        </td>




                                                                                                        <td
                                                                                                            ng-if="namecate.labletype==9">


                                                                                                            <span
                                                                                                                ng-if='name.empty_loadqty_input>0 && name.picked_status==0 && name.loadstatus==0'
                                                                                                                class="loadamount">
                                                                                                                <?php if ($_GET['DC_id'] == "") { ?>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    <?php echo $readdriver; ?>
                                                                                                                    <?php echo $inputboxread; ?>
                                                                                                                    ng-keyup="inputsave_1(name.id,'qty',namecate.categories_id,namecate.type)"
                                                                                                                    style="border: #bbbbbb solid 2px;"
                                                                                                                    data-val="{{name.bill_qty-name.edit_qty}}"
                                                                                                                    class="nos_{{namecate.categories_id}}"
                                                                                                                    id="qty_{{name.id}}"
                                                                                                                    value="{{name.empty_loadqty_input}}">
                                                                                                                    <?php }else { ?>

                                                                                                                                    {{name.nos_tab_value}}

                                                                                                                                    <?php }?>
                                                                                                            </span>


                                                                                                            <span
                                                                                                                ng-if='name.empty_loadqty_input>0 && name.picked_status==1 && name.loadstatus==0'
                                                                                                                class="loadamount">
                                                                                                                <?php if ($_GET['DC_id'] == "") { ?>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    <?php echo $readdriver; ?>
                                                                                                                    <?php echo $inputboxread; ?>
                                                                                                                    ng-keyup="inputsave_1(name.id,'qty',namecate.categories_id,namecate.type)"
                                                                                                                    style="border: #bbbbbb solid 2px;"
                                                                                                                    data-val="{{name.bill_qty-name.edit_qty}}"
                                                                                                                    class="nos_{{namecate.categories_id}}"
                                                                                                                    id="qty_{{name.id}}"
                                                                                                                    value="{{name.empty_loadqty_input}}">

                                                                                                                    <?php }else { ?>

                                                                                                                            {{name.nos_tab_value}}

                                                                                                                    <?php }?>

                                                                                                            </span>



                                                                                                            <span
                                                                                                                ng-if='name.empty_loadqty_input>0 && name.loadstatus==1'
                                                                                                                class="loadamount">
                                                                                                                <?php if ($_GET['DC_id'] == "") { ?>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    <?php echo $readdriver; ?>
                                                                                                                    <?php echo $inputboxread; ?>
                                                                                                                    ng-keyup="inputsave_1(name.id,'qty',namecate.categories_id,namecate.type)"
                                                                                                                    style="border: #bbbbbb solid 2px;"
                                                                                                                    data-val="{{name.bill_qty-name.dis_nos}}"
                                                                                                                    class="nos_{{namecate.categories_id}}"
                                                                                                                    id="qty_{{name.id}}"
                                                                                                                    value="{{name.empty_loadqty_input}}">

                                                                                                                    <?php }else { ?>

                                                                                                                                {{name.nos_tab_value}}

                                                                                                                                <?php }?>

                                                                                                            </span>




                                                                                                            <span
                                                                                                                ng-if='name.empty_loadqty==0 && name.picked_status==0'
                                                                                                                class="loadamount">

                                                                                                                <?php if ($_GET['DC_id'] == "") { ?>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    <?php echo $readdriver; ?>
                                                                                                                    <?php echo $inputboxread; ?>
                                                                                                                    ng-keyup="inputsave_1(name.id,'qty',namecate.categories_id,namecate.type)"
                                                                                                                    style="border: #bbbbbb solid 2px;"
                                                                                                                    data-val="{{name.bill_qty-name.edit_qty}}"
                                                                                                                    class="nos_{{namecate.categories_id}}"
                                                                                                                    id="qty_{{name.id}}"
                                                                                                                    value="{{name.bill_qty-name.edit_qty}}">

                                                                                                                    <?php }else { ?>

                                                                                                                                    {{name.nos_tab_value}}

                                                                                                                                    <?php }?>

                                                                                                            </span>


                                                                                                            <span
                                                                                                                ng-if="name.bill_qty==0">0</span>




                                                                                                        </td>


                                                                                                        <td
                                                                                                            ng-if="namecate.labletype==9">


                                                                                                            <span
                                                                                                                ng-if='name.dispatch_qty>0'>{{name.dispatch_qty}}</span>




                                                                                                        </td>




                                                                                                        
                                                                                                         <!-- GG CHNAGES Theoretical QTY -->
                                                                                                        <!-- <td><span>{{name.activel_qty}}</span></td> -->



                                                                                                        <td
                                                                                                            data-label="Qty">


                                                                                                            <span>{{name.qty_tab}}</span>




                                                                                                        </td>




                                                                                                        <td><span
                                                                                                                ng-if='name.loadqty!=0'
                                                                                                                class="loadamount"
                                                                                                                id="qty_{{name.id}}">{{name.loadqty}}</span>
                                                                                                        </td>

                                                                                                       


                                                                                                        <td data-label="Amount"
                                                                                                            class="amounttot_{{namecate.categories_id}}">

                                                                                                            <span>{{name.amount_tab}}</span>



                                                                                                        </td>
                                                                                                        <td>



                                                

                                                                                                                 <!-- gg changes -->

                                                                                                            <?php if ($_GET['DC_id'] == "") { ?>

                                                                                                                <span
                                                                                                                    ng-if="name.bill_nos!=name.dis_nos"
                                                                                                                    class="loadamount"
                                                                                                                    id="amount_{{name.id}}">{{name.loadamount}}</span>
                                                                                                                <span
                                                                                                                    ng-if="name.bill_nos==name.dis_nos"
                                                                                                                    class="loadamount"
                                                                                                                    id="amount_{{name.id}}">{{name.loadamount}}</span>
                                                                                                            <?php } else { ?>

                                                                                                                <span>{{name.confirmed_amount}}</span>


                                                                                                            <?php } ?>

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

                                                                                                        <?php if ($_GET['DC_id'] == "") { ?>

                                                                                                        <td data-label="Action"
                                                                                                            class="last-colorchange">



                                                                                                            <span
                                                                                                                ng-if="name.picked_status==0">



                                                                                                                <label
                                                                                                                    for="set_id{{name.id}}"
                                                                                                                    ng-if="name.bill_nos!=name.dis_nos">
                                                                                                                    <input
                                                                                                                        type="checkbox"
                                                                                                                        value="{{name.id}}"
                                                                                                                        id="set_id{{name.id}}"
                                                                                                                        ng-click="loadProduct(name.id)"
                                                                                                                        <?php echo $disabled; ?>
                                                                                                                        class="loaditems"
                                                                                                                        name="loaditems">
                                                                                                                    <span
                                                                                                                        id="textchange_{{name.id}}">Pack</span>
                                                                                                                </label>


                                                                                                                <label
                                                                                                                    for="set_id{{name.id}}"
                                                                                                                    ng-if="name.bill_nos==name.dis_nos">
                                                                                                                    <input
                                                                                                                        type="checkbox"
                                                                                                                        checked
                                                                                                                        value="{{name.id}}"
                                                                                                                        id="set_id{{name.id}}"
                                                                                                                        ng-click="loadProduct(name.id)"
                                                                                                                        disabled
                                                                                                                        class="loaditems"
                                                                                                                        name="loaditems">
                                                                                                                    <span
                                                                                                                        id="textchange_{{name.id}}">Loaded</span>
                                                                                                                </label>

                                                                                                            </span>

                                                                                                            <span
                                                                                                                ng-if="name.picked_status==1">



                                                                                                                <!-- <label
                                                                                                                    for="set_id{{name.id}}"
                                                                                                                    title="Delivered"
                                                                                                                    ng-if="name.delivery_status==1"><input
                                                                                                                        type="checkbox"
                                                                                                                        disabled
                                                                                                                        checked
                                                                                                                        value="{{name.id}}"
                                                                                                                        id="set_id{{name.id}}"
                                                                                                                        ng-click="loadProduct(name.id)"
                                                                                                                        class="loaditems"
                                                                                                                        name="loaditems">
                                                                                                                    <span
                                                                                                                        id="textchange_{{name.id}}">Loaded</span></label> -->



                                                                                                                        <label
                                                                                                                        for="set_id{{name.id}}"
                                                                                                                        ng-if="name.delivery_status==1 || name.bill_nos==name.dis_nos">
                                                                                                                        <input
                                                                                                                            type="checkbox"
                                                                                                                            checked
                                                                                                                            disabled
                                                                                                                            class="loaditems"
                                                                                                                            name="loaditems">
                                                                                                                        <span
                                                                                                                            id="textchange_{{name.id}}">

                                                                                                                            Loaded


                                                                                                                        </span>
                                                                                                                    </label>











                                                                                                                <label
                                                                                                                    for="set_id{{name.id}}"
                                                                                                                    ng-if="name.dispatch_status==0">


                                                                                                                    <input
                                                                                                                        type="checkbox"
                                                                                                                        checked
                                                                                                                        value="{{name.id}}"
                                                                                                                        id="set_id{{name.id}}"
                                                                                                                        ng-click="loadProduct(name.id)"
                                                                                                                        class="loaditems"
                                                                                                                        <?php echo $disabled; ?>
                                                                                                                        name="loaditems">

                                                                                                                    <span
                                                                                                                        id="textchange_{{name.id}}">Packed</span>

                                                                                                                </label>


                                                                                                               



                                                                                                            </span>


                                                                                                        </td>
                                                                                                        
                                                                                                        <?php } ?>





                                                                                                    </tr>





                                                                                                </tbody>



                                                                                                <tbody
                                                                                                    ng-repeat="name in namesData|orderBy:column:reverse"
                                                                                                    ng-if="namecate.categories_id!=1">

                                                                                                    <input type="hidden" id="old_fact_{{name.id}}" value="{{ name.commission_fact }}">
                                                                                                   <!-- gg changes for crimp -->
                                                                                                    <input type="hidden" id="crimp_{{name.id}}" value="{{ name.crimp_tab }}">
                                                                                                    <input type="hidden" id="fact2_{{name.id}}" value="{{ name.fact2 }}">

                            <input type="hidden" id="default_weight_{{ name.id }}" value="{{ name.default_weight }}">
                            <input type="hidden" id="standard_weight_{{ name.id }}" value="{{ name.standard_weight }}">
                            <input type="hidden" id="default_fact_{{ name.id }}" value="{{ name.default_fact }}">
                            <input type="hidden" id="basefact_{{ name.id }}" value="{{ name.basefact }}">
                            <input type="hidden" id="basecat_{{ name.id }}" value="{{ name.basecat }}">
                            <input type="hidden" id="default_thickness_{{ name.id }}" value="{{ name.thickness }}">
                            <input type="hidden" id="thickness_tile_prod_{{ name.id }}" value="{{ name.thickness_tile_prod }}">
                            <input type="hidden" id="kg_rmtr_weight_{{ name.id }}" value="{{ name.kg_rmtr_weight }}">
                            <input type="hidden" id="standard_weight_{{ name.id }}" value="{{ name.standard_weight }}">
                            <input type="hidden" id="top_{{ name.id }}" value="{{ name.top }}">
                            <input type="hidden" id="bottom_{{ name.id }}" value="{{ name.bottom }}">
                            <input type="hidden" id="foarm_{{ name.id }}" value="{{ name.foarm }}">
                            <input type="hidden" id="product_name_sub_thick_{{ name.id }}" value="{{ name.product_name_sub_thick }}">


                            <input type="hidden" id="old_rate_{{name.id}}" value="{{ name.rate_tab_old }}">
                            <input type="hidden" id="img_width_{{ name.id }}" value="{{ name.img_width }}">
                            <input type="hidden" id="img_width_cl_{{ name.id }}" value="{{ name.img_width }}">
                            <input type="hidden" id="image_id_{{ name.id }}" value="{{ name.base_id }}">
                            <input type="hidden" id="weight_{{ name.id }}" value="{{ name.weight }}">
                            <input type="hidden" id="profile_{{ name.id }}" value="{{ name.profile_tab }}">
                            <input type="hidden" id="total_bill_nos_{{ name.id }}" value="{{ name.bill_nos }}">

                                                                                                    <tr class="{{name.picked_status == 1 ? 'disabled-div' : ''}} view"
                                                                                                        ng-style="name.rate_edit == 1 && {'color':'red'}"
                                                                                                        ng-if="namecate.categories_id==name.categories_id_get">

                                                                                                    


                                                                                                        <td
                                                                                                            data-label="S No">
                                                                                                            {{name.no}}</span>


                                                                                                        <td title="{{name.categories}}"
                                                                                                            data-label="Products">
                                                                                                            {{name.product_name_tab}}
                                                                                                            <input
                                                                                                                type="hidden"
                                                                                                                value="{{namecate.categories_id}}"
                                                                                                                id="cateid_{{name.id}}">
                                                                                                            <input
                                                                                                                type="hidden"
                                                                                                                value="{{namecate.type}}"
                                                                                                                id="cateidtype_{{name.id}}">
                                                                                                            <input
                                                                                                                type="hidden"
                                                                                                                value="{{name.product_id}}"
                                                                                                                id="ppid_{{name.id}}">
                                                                                                        </td>




                                                                                                        <td ng-if="namecate.labletype==4"
                                                                                                            data-label="Sub Products">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                placeholder="Search Product"
                                                                                                                ng-keyup="completeProductSUb(name.id)"
                                                                                                                ng-keyup="inputsave_1(name.id,'tile_material_name',namecate.categories_id,namecate.type)"
                                                                                                                id="tile_material_name_{{name.id}}"
                                                                                                                value="{{name.tile_material_name}}">
                                                                                                        </td>



                                                                                                        <td ng-if="namecate.labletype==16"
                                                                                                            data-label="Sub Products">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                placeholder="Search Product"
                                                                                                                ng-keyup="completeProductSUb(name.id)"
                                                                                                                ng-keyup="inputsave_1(name.id,'tile_material_name',namecate.categories_id,namecate.type)"
                                                                                                                id="tile_material_name_{{name.id}}"
                                                                                                                value="{{name.tile_material_name}}">
                                                                                                        </td>


                                                                                                        <td ng-if="namecate.labletype==19"
                                                                                                            data-label="Sub Products">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                placeholder="Search Product"
                                                                                                                ng-keyup="completeProductSUb3(name.id)"
                                                                                                                ng-keyup="inputsave_1(name.id,'tile_material_name',namecate.categories_id,namecate.type)"
                                                                                                                id="tile_material_name_{{name.id}}"
                                                                                                                value="{{name.tile_material_name}}">
                                                                                                        </td>




                                                                                                        <td ng-if="namecate.categories_id==592"
                                                                                                            data-label="Sub Products">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                ng-keyup="inputsave_1(name.id,'tile_material_name',namecate.categories_id,namecate.type)"
                                                                                                                id="tile_material_name_{{name.id}}"
                                                                                                                value="{{name.tile_material_name}}">
                                                                                                        </td>

                                                                                                        <td ng-if="namecate.labletype==19"
                                                                                                            data-label="Remarks">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                ng-keyup="inputsave_1(name.id,'dim_one',namecate.categories_id,namecate.type)"
                                                                                                                id="dim_one_{{name.id}}"
                                                                                                                value="{{name.dim_one}}">
                                                                                                        </td>
                                                                                                        <td ng-if="namecate.labletype==19"
                                                                                                            data-label="Coil No">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                ng-keyup="inputsave_1(name.id,'dim_two',namecate.categories_id,namecate.type)"
                                                                                                                id="dim_two_{{name.id}}"
                                                                                                                value="{{name.dim_two}}">
                                                                                                        </td>

                                                                                                        <!--  <td  data-priority="3" ng-if="namecate.labletype!=9" data-label="UOM">FEET</td> -->
                                                                                                          
                                                                                                        <td ng-if="namecate.labletype==5 || namecate.labletype==6 || namecate.categories_id==611 || namecate.categories_id==627"
                                                                                                            data-label="Billing Options">


                                                                                                            <!-- gg changes -->

                                                                                                            <select class="selectbox" disabled ng-if="namecate.labletype==5 || namecate.categories_id==611 || namecate.categories_id==627"
                                                                                                            ng-change="inputsave_1(name.id,'billing_options',namecate.categories_id,namecate.type)"
                                                                                                            id="billing_options_{{ name.id }}" ng-model="billing_options">
                                                                                                            <option value="1" ng-selected="{{ name.billing_options == 1 }}"  ng-if="namecate.categories_id==611 || namecate.categories_id != 627 && namecate.categories_id != 628">Running MTR</option>
                                                                                                                <option value="4" ng-selected="{{ name.billing_options == 4 }}" ng-if="namecate.categories_id==611 || namecate.categories_id==627">Running Ft</option>
                                                                                                            <option value="2" ng-selected="{{ name.billing_options == 2 }}">KG</option>
                                                                                                            <option value="3" ng-selected="name.billing_options == 3" ng-if="namecate.categories_id==34 ||  name.categories_id == 626">SQM MTR</option>
                                                                                                                <option value="5" ng-selected="{{ name.billing_options == 5 }}" ng-if="namecate.categories_id==627">NOS</option>
                                                                                                            
                                                                                                            </select>
                                                                                                            <select class="selectbox" disabled ng-if="namecate.labletype==6"
                                                                                                            ng-change="inputsave_1(name.id,'billing_options',namecate.categories_id,namecate.type)"
                                                                                                            id="billing_options_{{ name.id }}" ng-model="billing_options">
                                                                                                            <option value="2" ng-selected="{{ name.billing_options == 2 }}">KG</option>
                                                                                                            <option value="3" ng-selected="{{ name.billing_options == 3 }}">SQM MTR</option>
                                                                                                            </select>


                                                                                                            <!--                                                  
                                                  <select  class="selectbox" ng-if="namecate.labletype==5"  ng-change="inputsave_1(name.id,'billing_options',namecate.categories_id,namecate.type)" id="billing_options_{{name.id}}"  ng-model="billing_options"><option value="1" ng-selected="{{name.billing_options == 1}}">Running  MTR</option><option value="2" ng-selected="{{name.billing_options == 2}}">KG</option></select>
                                                  <select  class="selectbox" ng-if="namecate.labletype==6"  ng-change="inputsave_1(name.id,'billing_options',namecate.categories_id,namecate.type)" id="billing_options_{{name.id}}"  ng-model="billing_options"><option value="1" ng-selected="{{name.billing_options == 1}}">SQM  MTR</option><option value="2" ng-selected="{{name.billing_options == 2}}">KG</option></select>
                                                   -->
                                                                                                            <input
                                                                                                                type="hidden"
                                                                                                                value="{{name.kg_price}}"
                                                                                                                id="kg_price_{{name.id}}">
                                                                                                            <input
                                                                                                                type="hidden"
                                                                                                                value="{{name.og_price}}"
                                                                                                                id="rate_tab_get_{{name.id}}">


                                                                                                            <input
                                                                                                                type="hidden"
                                                                                                                value="{{name.kg_formula2}}"
                                                                                                                id="kg_formula_{{name.id}}">
                                                                                                            <input
                                                                                                                type="hidden"
                                                                                                                value="{{name.og_formula}}"
                                                                                                                id="og_formula_get_{{name.id}}">



                                                                                                        </td>

                                                                                                        <td data-priority="3"
                                                                                                            ng-if="namecate.labletype!=9"
                                                                                                            data-label="UOM">


                                                                                                            <span
                                                                                                                ng-if="namecate.labletype!=14">
                                                                                                                <select
                                                                                                                    class="selectbox"
                                                                                                                    disabled
                                                                                                                    id="uom_{{name.id}}"
                                                                                                                    ng-model="calulation">

                                                                                                                     <option value="7" ng-selected="{{ name.uom == 7 }}" ng-style="namecate.type != 19 && {'display':'none'}">KG</option>
                                                                                                                    <option
                                                                                                                        value="3"
                                                                                                                        ng-selected="{{name.uom == 3}}"
                                                                                                                        ng-style="namecate.categories_id == 13 && {'display':'none'}">
                                                                                                                        FEET
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        value="4"
                                                                                                                        ng-selected="{{name.uom == 4}}"
                                                                                                                        ng-style="namecate.categories_id == 13 && {'display':'none'}">
                                                                                                                        MM
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        value="2"
                                                                                                                        ng-selected="{{name.uom == 2}}"
                                                                                                                        ng-style="namecate.categories_id != 13 && {'display':'none'}">
                                                                                                                        SQMTR
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        value="5"
                                                                                                                        ng-selected="{{name.uom == 5}}">
                                                                                                                        MTR
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        value="6"
                                                                                                                        ng-selected="{{name.uom == 6}}"
                                                                                                                        ng-style="namecate.categories_id == 13 && {'display':'none'}">
                                                                                                                        INCH
                                                                                                                    </option>
                                                                                                                </select>

                                                                                                            </span>

                                                                                                            <span
                                                                                                                ng-if="namecate.labletype==14">
                                                                                                                NOS

                                                                                                            </span>


<input type="hidden" value="{{ name.uom }}" id="default_{{ name.id }}">
                              <input type="hidden" value="{{ name.profile_tab }}" id="profiless_{{ name.id }}">
                              <input type="hidden" value="{{ name.crimp_tab }}" id="crimpss_{{ name.id }}">
                              <input type="hidden" value="{{ name.uom }}" id="uomss_{{ name.id }}">

                              <input type="hidden" value="{{ name.dim_one }}" id="dim_oness_{{ name.id }}">
                              <input type="hidden" value="{{ name.dim_two }}" id="dim_twoss_{{ name.id }}">
                              <input type="hidden" value="{{ name.dim_three }}" id="dim_threess_{{ name.id }}">


                              <input type="hidden" value="{{ name.og_formula }}" id="formula_{{ name.id }}">
                              <input type="hidden" value="{{ name.kg_formula2 }}" id="formula2_{{ name.id }}">



                                                                                                        </td>

                                                                                                     


                                                                                                        <td ng-if="namecate.labletype==19"
                                                                                                            data-label="Coil No">




                                                                                                            <select
                                                                                                                disabled
                                                                                                                ng-change="inputsave_1(name.id,'dim_three',namecate.categories_id,namecate.type)"
                                                                                                                ng-model="dim_three"
                                                                                                                style="padding: 0px 0px;border: none;"
                                                                                                                id="dim_three_{{name.id}}">

                                                                                                                <option
                                                                                                                    value="OPEN COIL"
                                                                                                                    ng-selected="{{name.dim_three == 'OPEN COIL'}}">
                                                                                                                    OPEN
                                                                                                                    COIL
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="CLOSED COIL"
                                                                                                                    ng-selected="{{name.dim_three == 'CLOSED COIL'}}">
                                                                                                                    CLOSED
                                                                                                                    COIL
                                                                                                                </option>

                                                                                                            </select>

                                                                                                        </td>


<!-- gg changes hided -->
<!-- <td ng-if="namecate.labletype==19">{{name.nos_tab}}</td> -->




                                                                                                            

                                                                                                        















                                                                                                        <td ng-if="namecate.labletype==11 || namecate.labletype==12"
                                                                                                            data-label="Dim 1">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                ng-keyup="inputsave_1(name.id,'dim_one',namecate.categories_id,namecate.type)"
                                                                                                                id="dim_one_{{name.id}}"
                                                                                                                data-title="{{name.cul}}"
                                                                                                                value="{{name.dim_one}}">
                                                                                                        </td>
                                                                                                        <td ng-if="namecate.labletype==11 || namecate.labletype==12"
                                                                                                            data-label="Dim 2">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                ng-keyup="inputsave_1(name.id,'dim_two',namecate.categories_id,namecate.type)"
                                                                                                                id="dim_two_{{name.id}}"
                                                                                                                data-title="{{name.cul}}"
                                                                                                                value="{{name.dim_two}}">
                                                                                                        </td>
                                                                                                        <td ng-if="namecate.labletype==12"
                                                                                                            data-label="Dim 3">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                ng-keyup="inputsave_1(name.id,'dim_three',namecate.categories_id,namecate.type)"
                                                                                                                id="dim_three_{{name.id}}"
                                                                                                                data-title="{{name.cul}}"
                                                                                                                value="{{name.dim_three}}">
                                                                                                        </td>


                                                                                                        


                                                                                                        <td ng-if="namecate.labletype==4"
                                                                                                            ng-init="productMM(name.product_id,name.uom)"
                                                                                                            data-label="{{namecate.lable}}">



                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"
                                                                                                                id="profile_{{name.id}}"
                                                                                                                data-title="{{name.cul}}"
                                                                                                                value="{{name.profile_tab}}">






                                                                                                            <!--<input type="text" <?php echo $read; ?>  ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"  id="profile_{{name.id}}" data-title="{{name.cul}}"  value="{{name.profile_tab}}">-->




                                                                                                        </td>




                                                                                                        <td ng-if="namecate.labletype==8 || namecate.labletype==1 || namecate.labletype==0 ||  namecate.labletype==5 || namecate.labletype==6 || namecate.categories_id==611 || namecate.categories_id==627 || namecate.labletype==16 || namecate.labletype==10 || namecate.labletype==11 || namecate.labletype==12"
                                                                                                            data-label="{{namecate.lable}}">

                                                                                                                  <!-- width hide by gg changes -->

                                                                                                            <!-- <input
                                                                                                                type="text"
                                                                                                                <?php //echo $read; ?>
                                                                                                                ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"
                                                                                                                id="profile_{{name.id}}"
                                                                                                                data-title="{{name.cul}}"
                                                                                                                value="{{name.profile_tab}}"> -->

                                                                                                                {{name.profile_tab}}
                                                                                                        </td>









<!-- gg changes for extra crimp hide -->
                                                                                                        <td ng-if="namecate.labletype==8" style="display:none;"
                                                                                                            data-label="{{namecate.lable2}}">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"
                                                                                                                id="crimp_{{name.id}}"
                                                                                                                value="{{name.crimp_tab}}">
                                                                                                        </td>



                                                                                                  








                                                                                                        <td
                                                                                                            ng-if="namecate.labletype==15 || namecate.labletype==7">




                                                                                                            <!-- width hide by gg changes -->
                                                                                                            <!-- <input
                                                                                                                type="text"
                                                                                                                <?php //echo $read; ?>
                                                                                                                ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"
                                                                                                                id="profile_{{name.id}}"
                                                                                                                data-title="{{name.cul}}"
                                                                                                                value="{{name.profile_tab}}"> -->

                                                                                                                {{name.profile_tab}}











                                                                                                        </td>


                                                                                                        <td ng-if="namecate.labletype==8"
                                                                                                            style="display:none;"
                                                                                                            data-label="Back {{namecate.lable2}}">

                                                                                                            <select
                                                                                                                disabled
                                                                                                                ng-change="inputsave_1(name.id,'back_crimp',namecate.categories_id,namecate.type)"
                                                                                                                ng-model="backcripm"
                                                                                                                style="padding: 0px 0px;border: none;"
                                                                                                                id="back_crimp_{{name.id}}">
                                                                                                                <option
                                                                                                                    value="Yes"
                                                                                                                    ng-selected="{{name.back_crimp == 'Yes'}}">
                                                                                                                    Yes
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="No"
                                                                                                                    ng-selected="{{name.back_crimp == 'No'}}">
                                                                                                                    No
                                                                                                                </option>
                                                                                                            </select>

                                                                                                        </td>


                                                                                                        <!-- <td
                                                                                                            ng-if="namecate.labletype==15">

                                                                                                            <select
                                                                                                                disabled
                                                                                                                ng-if="name.uom==4 || name.uom==5"
                                                                                                                ng-change="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"
                                                                                                                ng-model="crimpwall"
                                                                                                                style="padding: 0px 0px;border: none;"
                                                                                                                id="crimp_{{name.id}}">

                                                                                                                <option
                                                                                                                    value="1220"
                                                                                                                    ng-selected="{{name.crimp_tab == '1220'}}">
                                                                                                                    1220
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="2100"
                                                                                                                    ng-selected="{{name.crimp_tab == '2100'}}">
                                                                                                                    2100
                                                                                                                </option>

                                                                                                                <option
                                                                                                                    value="1200"
                                                                                                                    ng-selected="{{name.crimp_tab == '1200'}}">
                                                                                                                    1200
                                                                                                                </option>


                                                                                                            </select>


                                                                                                            <select
                                                                                                                disabled
                                                                                                                ng-if="name.uom==3"
                                                                                                                ng-change="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"
                                                                                                                ng-model="crimpwall"
                                                                                                                style="padding: 0px 0px;border: none;"
                                                                                                                id="crimp_{{name.id}}">


                                                                                                                <option
                                                                                                                    value="7"
                                                                                                                    ng-selected="{{name.crimp_tab == '7'}}">
                                                                                                                    7
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="6.90"
                                                                                                                    ng-selected="{{name.crimp_tab == '6.90'}}">
                                                                                                                    6.90
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="4"
                                                                                                                    ng-selected="{{name.crimp_tab == '4'}}">
                                                                                                                    4
                                                                                                                </option>



                                                                                                            </select>


                                                                                                            <select
                                                                                                                disabled
                                                                                                                ng-if="name.uom==6"
                                                                                                                ng-change="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"
                                                                                                                ng-model="crimpwall"
                                                                                                                style="padding: 0px 0px;border: none;"
                                                                                                                id="crimp_{{name.id}}">

                                                                                                                <option
                                                                                                                    value="48"
                                                                                                                    ng-selected="{{name.crimp_tab == '48'}}">
                                                                                                                    48
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="82.80"
                                                                                                                    ng-selected="{{name.crimp_tab == '82.80'}}">
                                                                                                                    82.80
                                                                                                                </option>

                                                                                                            </select>

                                                                                                        </td> -->







                                                                                                        



                                                                                                        <td ng-if="(namecate.labletype==11 || namecate.labletype==7 || namecate.labletype==12 || namecate.labletype==1 ||  namecate.labletype==0 || namecate.labletype==6 || namecate.labletype==15 ) && namecate.categories_id !=5 && namecate.categories_id !=611 && namecate.categories_id !=627 && namecate.categories_id != 13"
                                                                                                            data-label="{{namecate.lable2}}">

                                                                                                            <!-- width hide by gg changes -->

                                                                                                        <!--                                                                                                             
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php //echo $read; ?>
                                                                                                                ng-keyup="inputsave_1(name.id,'crimp',namecate.categories_id,namecate.type)"
                                                                                                                id="crimp_{{name.id}}"
                                                                                                                value="{{name.crimp_tab}}"> -->

                                                                                                                {{name.crimp_tab}}
                                                                                                        </td>




                                                                                                        <td data-label="Nos"
                                                                                                            ng-if="namecate.labletype==7 && namecate.categories_id ==13">

                                                                                                            {{name.bill_qty}}


                                                                                                        </td>




                                                                                                                    <td ng-if="namecate.categories_id==13"

                                                                                                                                        <?php 
                                                                                                                                        $res="";
                                                                                                                                        if ($_GET['DC_id'] != "") { 
                                                                                                                                            $res="disabled";
                                                                                                                                        } ?>   


                                                                                                                                        data-label="{{namecate.lable}}">
                                                                                                                                        <input

                                                                                                                                            <?php echo  $res; ?>
                                                                                                                                            type="text"
                                                                                                                                            style="border: #bbbbbb solid 2px;"
                                                                                                                                            ng-keyup="inputsave_1(name.id,'profile',namecate.categories_id,namecate.type)"
                                                                                                                                            id="profile_nos_{{name.id}}"
                                                                                                                                            data-title="{{name.cul}}"
                                                                                                                                            value="{{name.profile_load}}">
                                                                                                                    </td>




                                                                                                                            <?php if ($_GET['DC_id'] == "") { ?>

                                                                                                                            <td
                                                                                                                                ng-if="namecate.categories_id==13">


                                                                                                                                <span
                                                                                                                                    
                                                                                                                                    class="loadamountred">
                                                                                                                                    {{name.ssload}}
                                                                                                                                </span>

                                                                                                                            

                                                                                                                            </td>
                                                                                                                            <?php } else { ?>
                                                                                                                            <!-- <td>
                                                                                                                            <span
                                                                                                                                    ng-if="name.nos_tab_value>0"
                                                                                                                                    class="loadamountred">{{name.bill_nos-name.dis_nos}}</span>
                                                                                                                                </td> -->
                                                                                                                            <?php } ?>














                                                                                                        

                                                                                                        <td data-label="Nos"
                                                                                                            ng-if="namecate.labletype!=9 && namecate.categories_id !=13">

                                                                                                            {{name.order_bill_no}}


                                                                                                        </td>

                           <td data-label="Nos" ng-if="namecate.categories_id==13">
                          <input type="hidden" value="{{ name.nos_tab }}" id="o_nos_{{ name.id }}">
                            
                            <input type="text" <?php echo $read1; ?> 
                              class="nos_{{ namecate.categories_id }}" 
                               ng-disabled="isDisabled[name.id]"
                              id="nos_{{ name.id }}" value="{{ name.nos_tab }}">
                            </td>

                             <td
                            ng-if="namecate.categories_id==13"
                            data-label="Fact">

                            <input type="hidden" id="old_fact_{{name.id}}" value="{{ name.commission_fact }}">

                           
                            

                              <input type="text" <?php echo $read1; ?>
                              ng-keyup="inputsave_1(name.id,'fact',namecate.categories_id,namecate.type)"
                              id="fact_{{ name.id }}" value="{{ name.fact_tab }}" >
                              <input type="hidden" id="fact_val_{{name.id}}" value="{{ name.fact_tab }}">

                            
                            </td>





















                                                                                                        <td
                                                                                                            ng-if="namecate.labletype!=9 && namecate.categories_id !=13">





                                                                                                            <?php
                                                                                                            if ($readdriver == '') {

                                                                                                                if ($_GET['DC_id'] == "") {


                                                                                                                    ?>


                                                                                                                    <span
                                                                                                                        ng-if='name.empty_loadnos_input>0 && name.picked_status==0 && name.loadstatus==0'
                                                                                                                        class="loadamount">

                                                                                                                        <input
                                                                                                                            type="text"
                                                                                                                            <?php echo $readdriver; ?>
                                                                                                                            <?php echo $inputboxread; ?>
                                                                                                                            ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"
                                                                                                                            style="border: #bbbbbb solid 2px;"
                                                                                                                            data-val="{{name.bill_nos-name.edit_nos}}"
                                                                                                                            class="nos_{{namecate.categories_id}}"
                                                                                                                            id="nos_{{name.id}}"
                                                                                                                            value="{{name.empty_loadnos_input}}">

                                                                                                                    </span>


                                                                                                                    <span
                                                                                                                        ng-if='name.empty_loadnos_input==0 && name.dis_nos>0 '
                                                                                                                        class="loadamount">

                                                                                                                        <input
                                                                                                                            type="text"
                                                                                                                            <?php echo $readdriver; ?>
                                                                                                                            <?php echo $inputboxread; ?>
                                                                                                                            ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"
                                                                                                                            style="border: #bbbbbb solid 2px;"
                                                                                                                            data-val="{{name.bill_nos-name.edit_nos}}"
                                                                                                                            class="nos_{{namecate.categories_id}}"
                                                                                                                            id="nos_{{name.id}}"
                                                                                                                            value="{{name.empty_loadnos_input}}">

                                                                                                                    </span>









                                                                                                                    

                                                                                                                    <!-- gg changes -->

                                                                                                                    <input
                                                                                                                            type="hidden"
                                                                                                                            id="nos_partialflow{{name.id}}"
                                                                                                                            value="{{name.empty_loadnos_input}}">



                                                                                                                    <span
                                                                                                                        ng-if='name.empty_loadnos_input>0 && name.picked_status==1 && name.loadstatus==0'
                                                                                                                        class="loadamount">

                                                                                                                        <input
                                                                                                                            type="text"
                                                                                                                            <?php echo $readdriver; ?>
                                                                                                                            <?php echo $inputboxread; ?>
                                                                                                                            ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"
                                                                                                                            style="border: #bbbbbb solid 2px;"
                                                                                                                            data-val="{{name.bill_nos-name.edit_nos}}"
                                                                                                                            class="nos_{{namecate.categories_id}}"
                                                                                                                            id="nos_{{name.id}}"
                                                                                                                            value="{{name.empty_loadnos_input}}">

                                                                                                                    </span>



                                                                                                                    <span
                                                                                                                        ng-if='name.empty_loadnos_input>0 && name.loadstatus==1'
                                                                                                                        class="loadamount">

                                                                                                                        <input
                                                                                                                            type="text"
                                                                                                                            <?php echo $readdriver; ?>
                                                                                                                            <?php echo $inputboxread; ?>
                                                                                                                            ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"
                                                                                                                            style="border: #bbbbbb solid 2px;"
                                                                                                                            data-val="{{name.bill_nos-name.dis_nos}}"
                                                                                                                            class="nos_{{namecate.categories_id}}"
                                                                                                                            id="nos_{{name.id}}"
                                                                                                                            value="{{name.empty_loadnos_input}}">

                                                                                                                    </span>



                                                                                                                    <!--<span  ng-if='name.loadstatus==1' class="loadamount">

                                               <input type="text" <?php echo $readdriver; ?> <?php echo $inputboxread; ?> ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)" style="border: #bbbbbb solid 2px;"   data-val="{{name.bill_nos-name.dis_nos}}" class="nos_{{namecate.categories_id}}" id="nos_{{name.id}}" value="{{name.bill_nos-name.dis_nos}}">

                                                </span>-->




                                                                                                                    <span
                                                                                                                        ng-if='name.empty_loadnos==0 && name.picked_status==0'
                                                                                                                        class="loadamount">


                                                                                                                        <input
                                                                                                                            type="text"
                                                                                                                            <?php echo $readdriver; ?>
                                                                                                                            <?php echo $inputboxread; ?>
                                                                                                                            ng-keyup="inputsave_1(name.id,'nos',namecate.categories_id,namecate.type)"
                                                                                                                            style="border: #bbbbbb solid 2px;"
                                                                                                                            data-val="{{name.bill_nos-name.edit_nos}}"
                                                                                                                            class="nos_{{namecate.categories_id}}"
                                                                                                                            id="nos_{{name.id}}"
                                                                                                                            value="{{name.bill_nos-name.edit_nos}}">

                                                                                                                    </span>


                                                                                                                    <span
                                                                                                                        ng-if="name.bill_nos==0">0</span>
                                                                                                                    <?php
                                                                                                                } else { ?>
                                                                                                                    <span>{{name.nos_tab_value}}</span>
                                                                                                                <?php }
                                                                                                            }
                                                                                                            ?>

                                                                                                        </td>







                                                                                      <?php if ($_GET['DC_id'] == "") { ?>

                                                                                                               <td
                                                                                                                ng-if="namecate.labletype!=9  && namecate.categories_id!=13">


                                                                                                                <span
                                                                                                                    ng-if='name.empty_loadnos>0'
                                                                                                                    class="loadamountred">
                                                                                                                    <!-- {{name.bill_nos-name.empty_loadnos}} -->
                                                                                                                    {{ (name.bill_nos - name.empty_loadnos) < 0 ? 0 : (name.bill_nos - name.empty_loadnos) }}

                                                                                                                </span>

                                                                                                                <span ng-if='name.empty_loadnos==0'>
                                                                                                                    

                                                                                                                    <span ng-if="name.dis_nos>0" class="loadamountred">{{name.bill_nos-name.dis_nos}}</span>
                                                                                                                        
                                                                                                                        
                                                                                                                    <span  ng-if="name.dis_nos==0"  class="loadamountred">{{name.empty_loadnos}}</span>

                                                                                                                       
                                                                                                                       
                                                                                                                </span>


                                                                                                            </td>
                                                                                                        <?php } else { ?>
                                                                                                            <!-- <td>
                                                                                                            <span
                                                                                                                    ng-if="name.nos_tab_value>0"
                                                                                                                    class="loadamountred">{{name.bill_nos-name.dis_nos}}</span>
                                                                                                                </td> -->
                                                                                                        <?php } ?>


























                                                                                                        <?php //if ($_GET['DC_id'] == "") { ?>

                                                                                                            <td data-label="Nos"
                                                                                                                ng-if="namecate.labletype!=9">



                                                                                                                <span
                                                                                                                    ng-if='name.dis_nos>0'>{{name.dis_nos}}</span>


                                                                                                            </td>
                                                                                                        <?php // } ?>

                                                                                                        <!--<td><input type="text"  ng-keyup="inputsave_1(name.id,'unit',namecate.categories_id)"  id="unit_{{name.id}}" value="{{name.unit_tab}}"></td>-->
                                                                                                        <td style="display:none;"
                                                                                                            data-label="Fact">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                ng-keyup="inputsave_1(name.id,'fact',namecate.categories_id,namecate.type)"
                                                                                                                id="fact_{{name.id}}"
                                                                                                                value="{{name.fact_tab}}">
                                                                                                        </td>

                                                                                                        <!--<td><input type="text"  ng-keyup="inputsave_1(name.id,'Meter_to_Sqr_feet'),namecate.categories_id" id="Meter_to_Sqr_feet_{{name.id}}" value="{{name.Meter_to_Sqr_feet}}"></td>-->
                                                                                                        <td
                                                                                                            data-label="Rate">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                <?php echo $read; ?>
                                                                                                                ng-keyup="inputsaverate_1(name.id,'rate',namecate.categories_id,namecate.type)"
                                                                                                                id="rate_{{name.id}}"
                                                                                                                value="{{name.rate_tab}}">

                                                                                                            <span
                                                                                                                class="td-info-icons td-competitor-price">
                                                                                                                <button
                                                                                                                    class="btn dropdown-toggle p-0 font-size-12"
                                                                                                                    type="button"
                                                                                                                    ng-click="pricelist(name.product_id,name.product_name_tab)"
                                                                                                                    data-bs-toggle="offcanvas"
                                                                                                                    data-bs-target="#offcanvasSpec-pricelist"
                                                                                                                    aria-controls="offcanvasSpec-pricelist">
                                                                                                                    <i
                                                                                                                        class="fas fa-rupee-sign"></i>
                                                                                                                </button>

                                                                                                            </span>
                                                                                                        </td>

                                                                                                        <td ng-if="commission_check==1"
                                                                                                            data-label="Commission"
                                                                                                            class="comdisplay">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                ng-keyup="inputsave_1(name.id,'commission',namecate.categories_id,namecate.type)"
                                                                                                                id="commission_{{name.id}}"
                                                                                                                value="{{name.commission_tab}}">
                                                                                                        </td>




                                                                                                        <td
                                                                                                        ng-if="namecate.labletype==9">
                                                                                                        {{name.bill_qty}}
                                                                                                        </td>



                                                                                                        <td
                                                                                                            ng-if="namecate.labletype==9">


                                                                                                            <span
                                                                                                                ng-if='name.empty_loadqty_input>0 && name.picked_status==0 && name.loadstatus==0'
                                                                                                                class="loadamount">
                                                                                                                <?php if ($_GET['DC_id'] == "") { ?>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    <?php echo $readdriver; ?>
                                                                                                                    <?php echo $inputboxread; ?>
                                                                                                                    ng-keyup="inputsave_1(name.id,'qty',namecate.categories_id,namecate.type)"
                                                                                                                    style="border: #bbbbbb solid 2px;"
                                                                                                                    data-val="{{name.bill_qty-name.edit_qty}}"
                                                                                                                    class="nos_{{namecate.categories_id}}"
                                                                                                                    id="qty_{{name.id}}"
                                                                                                                    value="{{name.empty_loadqty_input}}">
                                                                                                                    <?php }else { ?>

                                                                                                                            {{name.nos_tab_value}}

                                                                                                                    <?php }?>
                                                                                                            </span>

                                                                                                            <span
                                                                                                                ng-if='name.empty_loadqty_input>0 && name.picked_status==1 && name.loadstatus==0'
                                                                                                                class="loadamount">
                                                                                                                <?php if ($_GET['DC_id'] == "") { ?>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    <?php echo $readdriver; ?>
                                                                                                                    <?php echo $inputboxread; ?>
                                                                                                                    ng-keyup="inputsave_1(name.id,'qty',namecate.categories_id,namecate.type)"
                                                                                                                    style="border: #bbbbbb solid 2px;"
                                                                                                                    data-val="{{name.bill_qty-name.edit_qty}}"
                                                                                                                    class="nos_{{namecate.categories_id}}"
                                                                                                                    id="qty_{{name.id}}"
                                                                                                                    value="{{name.empty_loadqty_input}}">

                                                                                                                    <?php }else { ?>

                                                                                                                        {{name.nos_tab_value}}

                                                                                                                     <?php }?>

                                                                                                            </span>

                                   


                                                                                                            <!-- gg changes -->
                                                                                                            <span
                                                                                                                ng-if='name.empty_loadqty_input>0 && name.loadstatus==1'
                                                                                                                class="loadamount">
                                                                                                                <?php if ($_GET['DC_id'] == "") { ?>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    <?php echo $readdriver; ?>
                                                                                                                    <?php echo $inputboxread; ?>
                                                                                                                    ng-keyup="inputsave_1(name.id,'qty',namecate.categories_id,namecate.type)"
                                                                                                                    style="border: #bbbbbb solid 2px;"
                                                                                                                    data-val="{{name.bill_qty-name.dis_nos}}"
                                                                                                                    class="qty_{{namecate.categories_id}}"
                                                                                                                    id="qty_{{name.id}}"
                                                                                                                    value="{{name.empty_loadqty_input}}">
                                                                                                                    <?php }else { ?>

                                                                                                                    {{name.nos_tab_value}}

                                                                                                                    <?php }?>
                                                                                                            </span>




                                                                                                            <span
                                                                                                                ng-if='name.empty_loadqty==0 && name.picked_status==0'
                                                                                                                class="loadamount">

                                                                                                                <?php if ($_GET['DC_id'] == "") { ?>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    <?php echo $readdriver; ?>
                                                                                                                    <?php echo $inputboxread; ?>
                                                                                                                    ng-keyup="inputsave_1(name.id,'qty',namecate.categories_id,namecate.type)"
                                                                                                                    style="border: #bbbbbb solid 2px;"
                                                                                                                    data-val="{{name.bill_qty-name.edit_qty}}"
                                                                                                                    class="nos_{{namecate.categories_id}}"
                                                                                                                    id="qty_{{name.id}}"
                                                                                                                    value="{{name.bill_qty-name.edit_qty}}">

                                                                                                                    <?php }else { ?>

                                                                                                                                {{name.nos_tab_value}}

                                                                                                                                <?php }?>

                                                                                                            </span>


                                                                                                            <span
                                                                                                                ng-if="name.bill_qty==0">0</span>




                                                                                                        </td>



                                                                                                        <td
                                                                                                            ng-if="namecate.labletype==9">


                                                                                                            <span
                                                                                                                ng-if='name.empty_loadqty>0'
                                                                                                                class="loadamountred">
                                                                                                                {{name.bill_qty-name.empty_loadqty}}
                                                                                                            </span>

                                                                                                            <span
                                                                                                                ng-if='name.empty_loadqty==0'>

                                                                                                                <span
                                                                                                                    ng-if="name.dispatch_qty>0"
                                                                                                                    class="loadamountred">{{name.bill_qty-name.dispatch_qty}}</span>
                                                                                                                <span
                                                                                                                    ng-if="name.dispatch_qty==0"
                                                                                                                    class="loadamountred">{{name.empty_loadqty}}</span>

                                                                                                            </span>


                                                                                                        </td>


                                                                                                        <td
                                                                                                            ng-if="namecate.labletype==9">


                                                                                                            <span
                                                                                                                ng-if='name.dispatch_qty>0'>{{name.dispatch_qty}}</span>




                                                                                                        </td>


                                                                                                        <!-- GG CHNAGES Theoretical QTY -->

                                                                                                        <td><span>{{name.activel_qty}}</span></td>


                                                                                                       <td
                                                                                                            data-label="Qty" ng-if="namecate.labletype!=9">

                                                                                                            <input
                                                                                                                    type="hidden"
                                                                                                                    <?php echo $readdriver; ?>
                                                                                                                    <?php echo $inputboxread; ?>
                                                                                                                    style="border: #bbbbbb solid 2px;"
                                                                                                                    data-val="{{name.qty_tab}}"
                                                                                                                    class="nos_{{namecate.categories_id}}"
                                                                                                                    id="billed_qty_{{name.id}}"
                                                                                                                    value="{{name.qty_tab}}">

                                                                                                                <span>{{name.qty_tab}}</span>




                                                                                                        </td>




                                                                                                            <!-- FOR GATE ORDERS -->




                                                                                                       

                                                                                                        <?php
                                                                                                                        if(!isset($_GET['convertion']))
                                                                                                                        {
                                                                                                                        ?>

                                                                                                                                                    <!-- gg changes -->


                                                                                                                                                    <?php if ($_GET['DC_id'] == "") { ?>
                                                                                                                                                    <td
                                                                                                                                                        ng-if="name.bill_nos==name.dis_nos && namecate.labletype!=9">
                                                                                                                                                        <span
                                                                                                                                                            class="loadamount"
                                                                                                                                                            id="qty_{{name.id}}">



                                                                                                                                                            {{name.loadqty}}


                                                                                                                                                        </span>
                                                                                                                                                    </td>


                                                                                                                                                    <td
                                                                                                                                                        ng-if="name.bill_nos!=name.dis_nos && namecate.labletype!=9" >
                                                                                                                                                        
                                                                                                                                                        
                                                                                                                                                        
                                                                                                                                                        <input
                                                                                                                                                                    type="hidden"
                                                                                                                                                                    value="{{name.loadqty}}"
                                                                                                                                                                    id="load_partial{{name.id}}"
                                                                                                                                                                    
                                                                                                                                                                    class="loaditems"
                                                                                                                                                                    name="loaditems">
                                                                                                                                                        
                                                                                                                                                        
                                                                                                                                                        
                                                                                                                                                        
                                                                                                                                                        <span
                                                                                                                                                            class="loadamount"
                                                                                                                                                            id="qty_{{name.id}}">



                                                                                                                                                            {{name.loadqty}}


                                                                                                                                                        </span>
                                                                                                                                                    </td>
                                                                                                                                                <?php } else { ?>

                                                                                                                                                    <td ng-if="namecate.labletype!=9">{{name.nos_qty}}
                                                                                                                                                    </td>

                                                                                                                                                <?php } ?>



                                                                                                                                       

                                                                                                                    <?php }  else {   ?>



                                                                                                                        <td ng-if="namecate.labletype!=9">{{ name.activel_qty_packlist }}</td>

                                                                                                                        <td data-label="Qty" ng-if="namecate.uom=='Kg' || namecate.uom=='Kg1'">
                                                                                                                            <input 
                                                                                                                                ng-if="name.nos_qty && name.nos_qty > 0" 
                                                                                                                                style='width: 100%;' 
                                                                                                                                type="text"  
                                                                                                                                ng-disabled="name.uom_kg != 'Kg' || name.dispatch_status_load==0"
                                                                                                                                ng-blur="inputsaveqty_1(name.id, 'qty', namecate.categories_id, namecate.type)"
                                                                                                                                class="qtyfind_{{ namecate.categories_id }}" 
                                                                                                                                id="qty_{{ name.id }}"  
                                                                                                                                value="{{ name.nos_qty }}">
                                                                                                                        </td>

                                                                                                                        

                                                                                                                    <?php } ?>




                                                                                                        <td data-label="Amount"
                                                                                                            class="amounttot_{{namecate.categories_id}}">

                                                                                                            <span>{{name.amount_tab}}</span>




                                                                                                        </td>

                                                                                                        <td>


                                                                                                            <!-- gg changes -->

                                                                                                            <?php if ($_GET['DC_id'] == "") { ?>

                                                                                                                <span
                                                                                                                    ng-if="name.bill_nos!=name.dis_nos"
                                                                                                                    class="loadamount"
                                                                                                                    id="amount_{{name.id}}">{{name.loadamount}}</span>
                                                                                                                <span
                                                                                                                    ng-if="name.bill_nos==name.dis_nos"
                                                                                                                    class="loadamount"
                                                                                                                    id="amount_{{name.id}}">{{name.loadamount}}</span>
                                                                                                            <?php } else { ?>

                                                                                                                <span>{{name.confirmed_amount}}</span>


                                                                                                            <?php } ?>
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











                                                                                                        <?php if ($_GET['DC_id'] == "") { ?>
                                                                                                            <td data-label="Action"
                                                                                                                class="last-colorchange">




                                                                                                                <span
                                                                                                                    ng-if="name.picked_status==0">





                                                                                                                   



                                                                                                                        <label for="set_id{{name.id}}" ng-if="name.bill_nos!=name.dis_nos && namecate.labletype!=9">

                                                                                                                        
                                                                                                                        <input
                                                                                                                            type="checkbox"
                                                                                                                            value="{{name.id}}"
                                                                                                                            id="set_id{{name.id}}"
                                                                                                                            ng-click="loadProduct(name.id)"
                                                                                                                            <?php echo $disabled; ?>
                                                                                                                            class="loaditems"
                                                                                                                            name="loaditems" 
                                                                                                                            ng-disabled="(name.bill_nos - name.edit_nos) === 0"
                                                                                                                            ng-checked="(name.bill_nos - name.edit_nos) === 0"

                                                                                                                            >

                                                                                                                        <span
                                                                                                                            id="textchange_{{name.id}}">
                                                                                                                            Pack
                                                                                                                        </span>




                                                                                                                    </label>
                                                                                                                        



                                                                                                                    




                                                                                                                  



                                                                                                                    




                                                                                                          

                                                                                                                    <label
                                                                                                                        for="set_id{{name.id}}"
                                                                                                                        ng-if="name.bill_qty!=name.dispatch_qty && namecate.labletype==9">
                                                                                                                        <input
                                                                                                                            type="checkbox"
                                                                                                                            value="{{name.id}}"
                                                                                                                            id="set_id{{name.id}}"
                                                                                                                            ng-click="loadProduct(name.id)"
                                                                                                                            <?php echo $disabled; ?>
                                                                                                                            class="loaditems"
                                                                                                                            name="loaditems"
                                                                                                                            ng-disabled="(name.bill_qty - name.edit_qty) === 0"
                                                                                                                            ng-checked="(name.bill_qty - name.edit_qty) === 0"

                                                                                                                            >

                                                                                                                        <span
                                                                                                                            id="textchange_{{name.id}}">
                                                                                                                            Pack
                                                                                                                        </span>


                                                                                                                    </label>


                                                                                                                


                                                                                                                 





                                                                                                                    <label
                                                                                                                        for="set_id{{name.id}}"
                                                                                                                        ng-if="name.bill_nos==name.dis_nos && namecate.labletype!=9">
                                                                                                                        <input
                                                                                                                            type="checkbox"
                                                                                                                            checked
                                                                                                                            id="set_id{{name.id}}"
                                                                                                                            disabled
                                                                                                                            class="loaditems"
                                                                                                                            name="loaditems">
                                                                                                                        <span
                                                                                                                            id="textchange_{{name.id}}">

                                                                                                                            Loaded


                                                                                                                        </span>
                                                                                                                    </label>

                                                                                                                    <label
                                                                                                                        for="set_id{{name.id}}"
                                                                                                                        ng-if="name.bill_qty==name.dispatch_qty && namecate.labletype==9">
                                                                                                                        <input
                                                                                                                            type="checkbox"
                                                                                                                            checked
                                                                                                                            id="set_id{{name.id}}"
                                                                                                                            disabled
                                                                                                                            class="loaditems"
                                                                                                                            name="loaditems">
                                                                                                                        <span
                                                                                                                            id="textchange_{{name.id}}">

                                                                                                                            Loaded


                                                                                                                        </span>
                                                                                                                    </label>

                                                                                                                </span>

                                                                                                                <span
                                                                                                                    ng-if="name.picked_status==1">



                                                                                                                    <label
                                                                                                                        for="set_id{{name.id}}"
                                                                                                                        title="Delivered"
                                                                                                                        ng-if="name.delivery_status==1"><input
                                                                                                                            type="checkbox"
                                                                                                                            disabled
                                                                                                                            checked
                                                                                                                            id="set_id{{name.id}}"
                                                                                                                            class="loaditems"
                                                                                                                            name="loaditems">
                                                                                                                        <span
                                                                                                                            id="textchange_{{name.id}}">

                                                                                                                            Loaded

                                                                                                                        </span></label>

                                                                                                                    <label
                                                                                                                        for="set_id{{name.id}}"
                                                                                                                        ng-if="name.dispatch_status==0">


                                                                                                                        <input
                                                                                                                            type="checkbox"
                                                                                                                            checked
                                                                                                                            value="{{name.id}}"
                                                                                                                            id="set_id{{name.id}}"
                                                                                                                            ng-click="loadProduct(name.id)"
                                                                                                                            class="loaditems"
                                                                                                                            <?php echo $disabled; ?>
                                                                                                                            name="loaditems">

                                                                                                                        <span
                                                                                                                            id="textchange_{{name.id}}">

                                                                                                                            Packed


                                                                                                                        </span>

                                                                                                                    </label>


                                                                                                                    <label
                                                                                                                        for="set_id{{name.id}}"
                                                                                                                        ng-if="name.dispatch_status==1 && name.delivery_status==0">


                                                                                                                        <input
                                                                                                                            type="checkbox"
                                                                                                                            checked
                                                                                                                            id="set_id{{name.id}}"
                                                                                                                            disabled
                                                                                                                            class="loaditems"
                                                                                                                            name="loaditems">

                                                                                                                        <span
                                                                                                                            id="textchange_{{name.id}}">Loaded</span>

                                                                                                                    </label>


                                                                                                                </span>



                                                                                                            </td>
                                                                                                        <?php } ?>



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












                                                    <!-- gg changes -->


                                                    <div class="row">


                                                        <div class="col-md-2" style="margin: 5px 0px;">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-grow-1 settotal">

                                                                    <h3>Order Total</h3>
                                                                    <h5 class="ng-binding font-size-11">SubTotal : Rs.
                                                                        {{ fulltotal+DiscountAmount | indianCurrency }}
                                                                    </h5>


                                                                    <h5 class="ng-binding font-size-11"
                                                                        ng-if="DiscountAmount>0">Discount {{discount}} %
                                                                        :
                                                                        Rs.
                                                                        {{ DiscountAmount | indianCurrency }}</h5>

                                                                    <div ng-if="gsttotal>0">

                                                                        <h5 class="ng-binding font-size-11"
                                                                            ng-if="gst_check==1">CGST 9 % : Rs.
                                                                            {{gsttotal }}</h5>
                                                                        <h5 class="ng-binding font-size-11"
                                                                            ng-if="gst_check==1">SGST 9 % : Rs.
                                                                            {{gsttotal }}</h5>
                                                                    </div>


                                                                    <h5 class="ng-binding font-size-11"
                                                                        ng-if="tcsamount_order>0">
                                                                        TCS (+):
                                                                        {{ tcsamount_order | indianCurrency }} 

                                                                        <!-- | <a href="#"
                                                                            class="btn btn-danger font-size-12 py-0 <?php echo $nnone; ?>"
                                                                            ng-if="tcs_status==1" id="removeTCS"
                                                                            ng-click="removeTCS()">Remove TCS</a> -->

                                                                    </h5>

                                                                    <!-- <a href="#"
                                                                        class="btn btn-primary font-size-12 py-0 <?php echo $nnone; ?>"
                                                                        ng-if="tcs_status==2" id="removeTCS"
                                                                        ng-click="undoTCS()">Undo TCS</a> -->



                                                                    <h5 class="ng-binding font-size-11"
                                                                        ng-if="roundoffstatusval_data>0"><span
                                                                            class="ng-binding font-size-11">Round : Rs.
                                                                            ({{symble}}) {{ roundoffstatusval_data |
                                                                            number : 2}}</span>
                                                                    </h5>




                                                                    <h5 class="text-primary font-size-13"> TOTAL AMOUNT:
                                                                        Rs.
                                                                        {{discountfulltotal | indianCurrency
                                                                        }} </h5>

                                                                    <h5 class="text-danger font-size-11"
                                                                        style="margin: 10px 0px;"
                                                                        ng-if="commissiontotal>0">
                                                                        COMMISSION: Rs. {{commissiontotal |
                                                                        indianCurrency
                                                                        }} </h5>


                                                                </div>


                                                            </div>

                                                        </div>


                                                        <div class="col-md-7">

                                                               

                                                    
                                                                <!-- GG CHNAGES APPROVE REJECT CHANGES -->

                                                                                        <?php 
                                                                                        if($this->session->userdata['logged_in']['access']==14 || $this->session->userdata['logged_in']['access']==1)
                                                                                        {

                                                                                        if($_GET['convertion'] ==2 ) {
                                                                                    
                                                                                        ?>

                                                                                    
                                                                                                    <span ng-if="convertion==2">   
                                                                                                        <button type="button" ng-if="gate_login_view_status==0" ng-click="coniformed(<?php echo $id ?>)" class="btn btn-success waves-effect waves-light btn-sm" >Approve</button>
                                                                                            
                                                                                                    
                                                                                                        <button type="button" ng-if="gate_login_view_status==0" ng-click="coniformedRe(<?php echo $id ?>)" class="btn btn-danger waves-effect waves-light btn-sm" >Reject</button>
                                                                                                    </span>



                                                                                        
                                                                                        
                                                                                    

                                                                                        <?php    }  } ?>


                                                                                        <br>


                                                                                        <?php  

                                                        if($_GET['convertion'] ==2 ) { 
                                                                        if($status_base==1 || $status_base==6)
                                                                        {
                                                                            
                                                                            if($dispatch_status_upload->dispatch_load_status ==1){

                                                                                            if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='15' || $this->session->userdata['logged_in']['access']=='25')
                                                                                            {
                                                                                            
                                                                                            ?>

                                                                                            <span ng-init="imgpreviewimagesGate(<?php echo $id; ?>)"></span> <br>
                                                                                                                    
                                                                                            <a href="#"  class="btn btn-light" ng-if="namesDataoptonsimages_gate.length==0" ng-click="imgpreviewgate(<?php echo $id ?>)" >Upload Image</a>
                                                                                            <a href="#"  class="btn btn-outline-success btn-sm" ng-if="namesDataoptonsimages_gate.length>0" ng-click="imgpreviewgate(<?php echo $id ?>)" >View Image</a>

                                                                                                

                                                                                            <?php

                                                                                            }

                                                                                            if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                                                                                            {
                                                                                                ?>

                                                                                            <span ng-init="imgpreviewimagesGate(<?php echo $id; ?>)"></span><br>
                                                                                                                    
                                                                    
                                                                    <a href="#"  class="btn btn-outline-success btn-sm" ng-if="namesDataoptonsimages_gate.length>0" ng-click="imgpreviewgate(<?php echo $id ?>)" >View Image</a>

                                                                                                <?php
                                                                                            }





                                                                                            }
                                                                                            
                                                                                        }?>
                                                                    
                                                                   




<br><br>
                                                                                        <span ng-if="convertion==2">   
                                                                                        <span ng-if="gate_login_view_status==1" style="color: green;"> Weight Approved</span>
                                                                                        <span ng-if="gate_login_view_status==2" style="color: red;"> Weight Rejected</span>
                                                                                        <span ng-if="gate_login_view_status==0" style="color: green;"> Weight Updated</span>
                                                                                        </span>

                                                                                        <span ng-if="convertion==0">   
                                                                                        <span style="color: red;" ng-if="statusview==0"> Weight Update Pending</span>
                                                                                        </span>

                                                                                   <?php  }
                                                                                    ?>  

                                                        


                                                        </div>


                                                        <?php if ($_GET['DC_id'] == "") { ?>


                                                            <div class="col-md-3" style="margin: 5px 0px;">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-grow-1 settotal">

                                                                        <h3>Packed Total</h3>
                                                                        <h5 class="ng-binding font-size-11">SubTotal : Rs.
                                                                            {{ picked_amount_sub == 0 ? '0.00' :
                                                                            (picked_amount_sub | indianCurrency) }}
                                                                        </h5>


                                                                        <h5 class="ng-binding font-size-11"
                                                                            ng-if="discounttotaldel>0">Discount
                                                                            {{discounttotaldel}} %
                                                                            :
                                                                            Rs.
                                                                            {{ discountfulltotaldel | indianCurrency }}</h5>

                                                                        <div ng-if="picked_amount !==0">

                                                                            <h5 class=" font-size-11" ng-if="gst_check==1">
                                                                                CGST 9 % : Rs.
                                                                                {{gsttotal_picked | indianCurrency }}</h5>
                                                                            <h5 class="ng-binding font-size-11"
                                                                                ng-if="gst_check==1">SGST 9 % : Rs.
                                                                                {{gsttotal_picked | indianCurrency }}</h5>
                                                                        </div>


                                                                        <h5 class="ng-binding font-size-11"
                                                                            ng-if="tcs_status_picked==1 && tcs_status_amount!==0">
                                                                            TCS (+):
                                                                            {{ tcs_status_amount | indianCurrency }}



                                                                        </h5>





                                                                        <h5 class="ng-binding font-size-11"
                                                                            ng-if="roundoffstatusval_data_picked !==''">
                                                                            <span class="ng-binding font-size-11">Round :
                                                                                Rs.
                                                                                {{ roundoffstatusval_data_picked }}

                                                                            </span>
                                                                        </h5>

                                                                        <!-- Bill Roundoff -->
                                                                        <h5 class="ng-binding font-size-11" ng-if="bill_roundoff_show !== undefined && bill_roundoff_show !== ''">
                                                                                <span class="ng-binding font-size-11">Bill Round : Rs. {{ bill_roundoff_show }}</span>
                                                                        </h5>





                                                                        <h5 class="text-primary font-size-13"> TOTAL AMOUNT:
                                                                            Rs.
                                                                            <span ng-if="picked_amount !==0"> {{
                                                                                loadtotalamount == 0 ? '0.00' :
                                                                                (loadtotalamount
                                                                                | indianCurrency) }} </span>


                                                                        </h5>

                                                                        <h5 class="text-danger font-size-11"
                                                                            style="margin: 10px 0px;"
                                                                            ng-if="commissiondel>0">
                                                                            COMMISSION: Rs. {{commissiondel |
                                                                            indianCurrency
                                                                            }} </h5>


                                                                    </div>


                                                                </div>

                                                            </div>

                                                        <?php } else { ?>

                                                            <div class="col-3  mb-4"
                                                                ng-repeat="detail_packed in pickupDetails_data">

                                                                <div class="card h-100">
                                                                    <div class="card-body">
                                                                        <div class="row">

                                                                            <div class="col-12 mb-2">
                                                                                <h3 style="color:blue;font-weight:bold;">
                                                                                   

                                                                                <?php if ($_GET['convertion'] == "2") { ?>
                                                                                    Loaded Total
                                                                                <?php }else{?>
                                                                                    Packed Total
                                                                                <?php }?>

                                                                                   

                                                                                </h3>
                                                                            </div>

                                                                            <div class="col-12">
                                                                                <h5 class="card-title">

                                                                                    SubTotal : Rs.
                                                                                    {{ detail_packed.sub_total_pickup == 0 ?
                                                                                    '0.00' :
                                                                                    (detail_packed.sub_total_pickup |
                                                                                    indianCurrency) }}

                                                                                </h5>
                                                                            </div>

                                                                            <div class="col-12">
                                                                                <h5 class="card-title">

                                                                                    CGST 9 % : Rs.
                                                                                    {{detail_packed.total_gst_pickup |
                                                                                    indianCurrency }}

                                                                                </h5>
                                                                            </div>

                                                                            <div class="col-12">


                                                                                <h5 class="card-title">

                                                                                    SGST 9 % : Rs.
                                                                                    {{detail_packed.total_gst_pickup |
                                                                                    indianCurrency }}

                                                                                </h5>
                                                                            </div>

                                                                            <!-- gg changes -->
                                                                            <div class="col-12"
                                                                                ng-if="detail_packed.tcsamount_pickup_status === '1'">

                                                                                <h5 class="card-title">
                                                                                    TCS (+):
                                                                                    {{ detail_packed.tcsamount_pickup |
                                                                                    indianCurrency }}


                                                                                </h5>
                                                                            </div>

                                                                            <div class="col-12">
                                                                                <h5 class="card-title" ng-if="detail_packed.bill_roundoff !=''">
                                                                                    Bill Round : Rs.
                                                                                    {{ detail_packed.bill_roundoff }}

                                                                                </h5>
                                                                            </div>



                                                                            <div class="col-12">
                                                                                <h5 class="card-title" ng-if="detail_packed.roundoff_pickup !=''">
                                                                                    Round : Rs.
                                                                                    {{ detail_packed.roundoff_pickup }}

                                                                                </h5>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <h5 class="card-title">TOTAL AMOUNT:
                                                                                    Rs.
                                                                                    {{ detail_packed.total_picked_amount ==
                                                                                    0 ? '0.00' :
                                                                                    (detail_packed.total_picked_amount
                                                                                    | indianCurrency) }}</h5>
                                                                            </div>
                                                                            <div class="col-12">

                                                                                <span style="color:red;">
                                                                                    <b class="ng-binding">Status :{{
                                                                                        detail_packed.reason }} </b>
                                                                                </span>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>




                                                        <?php } ?>


                                                        





                                                    </div>


                                                    





                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <div class="col-md-2" style="float:left;">



                                                            </div>



                                                            <div class="col-md-2" style="float:right;">

                                                                <ul class="pager wizard twitter-bs-wizard-pager-link">

                                                                    <?php
                                                                    if ($DC_id_data == '') {

                                                                        ?>

                                                                        <li class="float-end">



                                                                            <!-- <a href="javascript: void(0);"
                                                                                class="btn btn-primary"
                                                                                ng-click="Proceedtocomplete()"
                                                                                id="Proceedtocomplete" <?php //echo $readdriver; ?>><i
                                                                                    class="mdi mdi-thumb-up pe-1"></i>Packed
                                                                                Complete </a> -->

                                                                                
                                                                                <!-- gg changes scope task -->


                                                                                <a href="javascript: void(0);" class="btn btn-primary" ng-click="openModal()" id="Proceedtocomplete">
                                                                                <?php echo $readdriver; ?><i class="mdi mdi-thumb-up pe-1"></i>Packed Complete
                                                                                </a>






                                                                        </li>
                                                                        <?php

                                                                    }
                                                                    ?>


                                                                </ul>
                                                            </div>

                                                        </div>

                                                    </div>


                                                </div>


                                                <!-- gg changes -->




                                                <br>
<!-- ng-if="pickupDetails !=''" -->
                                                <div class="row"  >
                                                    <h2>Pickup Summary</h2>


                                                    <div class="col-12  m-3">

                                                    <div class="card h-100" style="BACKGROUND: #ffeded;">
                                                            <div class="card-body" style='padding:0.25rem;text-align: center;position: relative;top: 15px;' >
                                                                <div class="row"  ng-repeat="weight_updates in weight_details">

                                                                <h5 class="card-title" >

                                                                        Theoritical weight : {{weight_updates.og_weight}} ( Kg Only )

                                                                </h5>

                                                                


                                                                </div>
                                                            </div>
                                                    
                                                        </div>

                                                    </div>


                                                    <div class="col-lg-3 col-md-6 mb-4"
                                                        ng-repeat="detail in pickupDetails">
                                                        <a target='_blank' href='<?php echo base_url(); ?>index.php/order_second/pick_list_view?id={{detail.id }}&confirmed=false&DC_id={{detail.dc_ids }}'>

                                                        <div class="card h-100" style="BACKGROUND: antiquewhite;">
                                                            <div class="card-body">
                                                                <div class="row">

                                                                    <div class="col-12 mb-2">
                                                                        <h3
                                                                            style="font-size: 16px;color:blue;font-weight:bold;">
                                                                            {{detail.pickup_message }}

                                                                        </h3>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <h5 class="card-title">

                                                                            SubTotal : Rs.
                                                                            {{ detail.sub_total_pickup == 0 ? '0.00' :
                                                                            (detail.sub_total_pickup | indianCurrency)
                                                                            }}

                                                                        </h5>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <h5 class="card-title">

                                                                            CGST 9 % : Rs.
                                                                            {{detail.total_gst_pickup | indianCurrency
                                                                            }}

                                                                        </h5>
                                                                    </div>

                                                                    <div class="col-12">


                                                                        <h5 class="card-title">

                                                                            SGST 9 % : Rs.
                                                                            {{detail.total_gst_pickup | indianCurrency
                                                                            }}

                                                                        </h5>
                                                                    </div>
                                                                    <div class="col-12"
                                                                        ng-if="detail.tcsamount_pickup_status === '1'">

                                                                        <h5 class="card-title">
                                                                            TCS (+):
                                                                            {{ detail.tcsamount_pickup | indianCurrency
                                                                            }}


                                                                        </h5>
                                                                    </div>



                                                                    <div class="col-12"
                                                                        ng-if="detail.roundoff_pickup !== ''">
                                                                        <h5 class="card-title">
                                                                            Round : Rs.
                                                                            {{ detail.roundoff_pickup }}

                                                                        </h5>
                                                                    </div>

                                                                    <div class="col-12"
                                                                        ng-if="detail.bill_roundoff !=''">
                                                                        <h5 class="card-title">
                                                                            Bill Round : Rs.
                                                                            {{ detail.bill_roundoff }}

                                                                        </h5>
                                                                    </div>



                                                                    <div class="col-12">
                                                                        <h5 class="card-title">TOTAL AMOUNT:
                                                                            Rs.
                                                                            {{ detail.total_picked_amount_summary == 0 ? '0.00'
                                                                            :
                                                                            (detail.total_picked_amount_summary
                                                                            | indianCurrency) }}</h5>
                                                                    </div>

                                                                     <div class="col-12 mt-2">
                                                                            <h5 class="card-title">

                                                                            Theoritical weight : {{ detail.packing_orignal_kg_weight }}
                                                                            ( Kg Only )

                                                                            </h5>

                                                                            <h5 class="card-title">

                                                                            Actual weight : {{ detail.packing_delivered_kg_weight }}
                                                                            ( Kg Only )

                                                                            </h5>

                                                                            <h5 class="card-title">

                                                                             weight Difference : {{ detail.packing_weight_difference }}
                                                                            ( Kg Only )

                                                                            </h5>
                                                                    </div>





                                                                    <div class="col-12">

                                                                        <span style="color:red;">
                                                                            <b class="ng-binding">Status :{{
                                                                                detail.reason }} </b>
                                                                        </span>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        </a>
                                                    </div>

                                                    <div class="col-12  m-3">

                                                    <div class="card h-100" style="BACKGROUND: #ffeded;">
                                                            <div class="card-body" style='padding:0.25rem;text-align: center;position: relative;top: 15px;' >
                                                                <div class="row"  ng-repeat="weight_updates in weight_details">

                                                                <h5 class="card-title">

                                                                        Actual weight :  {{weight_updates.delivered_weight}} ( Kg Only )

                                                                </h5>

                                                                <h5 class="card-title">

                                                                        Weight Difference :  {{weight_updates.weight_difference}} Kg

                                                                </h5>


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

         <!-- For one rupee issue -->
<input type="hidden" id="sum_bill_nos" name='sum_bill_nos' value="">
<input type="hidden" id="is_balence" name='is_balence' value="">

        
        
<!-- gg changes scope task Modal -->
<div class="modal fade" id="firstmodalcommison" tabindex="-1" aria-labelledby="exampleModalToggleLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Order Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5><i class="mdi mdi-arrow-right text-primary me-1"></i>Delivery Scope</h5>
                            <input type="hidden" name="update_id" id="update_id" value="{{update_id}}">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>
                                        <input type="radio" value="2" name="formRadios" id="formRadiosRight1" ng-model="delivery_status"> Zaron Scope
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="radio" value="1" name="formRadios" id="formRadios1" ng-model="delivery_status"> Client Scope
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5 class="font-size-14 mb-3"><i class="mdi mdi-arrow-right text-primary me-1"></i>Delivery Charge</h5>
                            <input class="form-control" type="number" value="{{ delivery_charge || 0 }}" id="delivery_charge" name="delivery_charge">
                        </div>

                        <div class="col-md-4">
                                                                        <div>
                                                                            <h5 class="font-size-14 mb-3"><i class="mdi mdi-arrow-right text-primary me-1"></i>Payment mode <span style="color:red;">*</span></h5>
                                                                            <div class="form-check mb-3">
                                                                            <select ng-model="payment_mode" class="form-select" id="cashmode" ng-init="payment_mode = payment_mode || ''"
                                                                            ng-change="updateUTRDetailsVisibility()">

                                                                            <option value="">Select Mode</option>
                                                                            <option  value="Cash">Cash</option>
                                                                            <option  value="Cheque">Cheque</option>
                                                                            <option  value="Bank Transfer">Bank Transfer / Online</option>
                                                                            <option  value="No Collection">No Collection</option>
                                                                        </select>
                                                                            </div>
                                                                            
                                                                        </div>
                        </div>
                        <hr>

                  <!-- General Remarks -->
                  <div class="row">
    <!-- General Remarks Heading -->
    <div class="col-6 mt-3 mb-2">
        <h4>General remarks</h4>
    </div>

    <!-- Acknowledge UTR Details -->
    <div class="col-md-6 mt-3 mb-3 text-center">
        <div ng-show="showUTRDetails">
            <img src="<?php echo base_url(); ?>assets/packlist_images/symbols.png" alt="UTR Icon" class="mb-2" style="width:60px; height: auto;">
            <h5 class="mb-2">Acknowledge UTR details</h5>
            <div class="form-check form-check-inline">
                <label>
                    <input type="checkbox" ng-model="utr_status" value='1' ng-true-value="'1'" ng-false-value="''" ng-change="utr_status == '1' ? utr_status = '1' : utr_status = ''" name="utr_status" class="form-check-input"> Yes
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label>
                    <input type="checkbox" ng-model="utr_status" value='0' ng-true-value="'0'" ng-false-value="''" ng-change="utr_status == '0' ? utr_status = '0' : utr_status = ''" name="utr_status" class="form-check-input"> No
                </label>
            </div>
        </div>
    </div>

    <!-- Sample to Load -->
    <div class="col-md-6 mt-3 mb-1 text-center">
        <img src="<?php echo base_url(); ?>assets/packlist_images/loading.png" alt="Sample Icon" class="mb-2" style="width: 60px; height: auto;">
        <h5 class="mb-2">Sample to load</h5>
        <div class="form-check form-check-inline">
            <label>
                <input type="checkbox" ng-model="sample_load_status" value='1' ng-true-value="'1'" ng-false-value="''" ng-change="sample_load_status == '1' ? sample_load_status = '1' : sample_load_status = ''" name="sample_load_status" class="form-check-input"> Yes
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label>
                <input type="checkbox" ng-model="sample_load_status" value='0' ng-true-value="'0'" ng-false-value="''" ng-change="sample_load_status == '0' ? sample_load_status = '0' : sample_load_status = ''" name="sample_load_status" class="form-check-input"> No
            </label>
        </div>
    </div>

    <!-- Need Tax Bill as Cash Bill -->
    <div class="col-md-6 mt-3 mb-1 text-center">
        <img src="<?php echo base_url(); ?>assets/packlist_images/payment.png" alt="Tax Bill Icon" class="mb-2" style="width: 60px; height: auto;">
        <h5 class="mb-2">Need tax bill as cash bill</h5>
        <div class="form-check form-check-inline">
            <label>
                <input type="checkbox" ng-model="cash_bill_status" value='1' ng-true-value="'1'" ng-false-value="''" ng-change="cash_bill_status == '1' ? cash_bill_status = '1' : cash_bill_status = ''" name="cash_bill_status" class="form-check-input"> Yes
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label>
                <input type="checkbox" ng-model="cash_bill_status" value='0' ng-true-value="'0'" ng-false-value="''" ng-change="cash_bill_status == '0' ? cash_bill_status = '0' : cash_bill_status = ''" name="cash_bill_status" class="form-check-input"> No
            </label>
        </div>
    </div>

    <!-- Do Not Handover Bill in Site -->
    <div class="col-md-6 mt-3 mb-1 text-center">
        <img src="<?php echo base_url(); ?>assets/packlist_images/receipt.png" alt="Handover Icon" class="mb-2" style="width: 60px; height: auto;">
        <h5 class="mb-2">Do not handover bill in site</h5>
        <div class="form-check form-check-inline">
            <label>
                <input type="checkbox" ng-model="site_status" value='1' ng-true-value="'1'" ng-false-value="''" ng-change="site_status == '1' ? site_status = '1' : site_status = ''" name="site_status" class="form-check-input"> Yes
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label>
                <input type="checkbox" ng-model="site_status" value='0' ng-true-value="'0'" ng-false-value="''" ng-change="site_status == '0' ? site_status = '0' : site_status = ''" name="site_status" class="form-check-input"> No
            </label>
        </div>
    </div>

    <!-- Call Before Tax Bill -->
    <div class="col-md-6 mt-3 mb-1 text-center">
        <img src="<?php echo base_url(); ?>assets/packlist_images/customer-service.png" alt="Call Icon" class="mb-2" style="width: 60px; height: auto;">
        <h5 class="mb-2">Call before tax bill</h5>
        <div class="form-check form-check-inline">
            <label>
                <input type="checkbox" ng-model="tax_status" value='1' ng-true-value="'1'" ng-false-value="''" ng-change="tax_status == '1' ? tax_status = '1' : tax_status = ''" name="tax_status" class="form-check-input"> Yes
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label>
                <input type="checkbox" ng-model="tax_status" value='0' ng-true-value="'0'" ng-false-value="''" ng-change="tax_status == '0' ? tax_status = '0' : tax_status = ''" name="tax_status" class="form-check-input"> No
            </label>
        </div>
    </div>
</div>






                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" ng-click="submitOrderDetails()">Save & Complete</button>
                </div>
            </div>
        </div>
    </div>
</div>


       


        
  <!-- Modal Draw Image-->
<div class="modal fade bs-example-modal-center"  id="imagesizemodel_gate" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" >Gate Image Upload</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body" style="height: 500px;overflow: auto;">
                                                                <?php
                                                                 if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='15' || $this->session->userdata['logged_in']['access']=='25')
                                                                 {
                                                                     ?>
                                                                <form  ng-submit="imageuploadInproduct_gate()" method="post" id="productupload" >
                                                                  <div class="row" style="margin-bottom: 10px;">
                                                                   
                                                                        
                                                                  
                                                                     
                                                                   <div class="col-md-4"><label>&nbsp;</label><input type="file" id="gate_file" file-input="files" multiple class="form-control"></div>
                                                                   <div class="col-md-4"><label>&nbsp;</label><input type="text" id="gate_remarks" placeholder="Remarks"  class="form-control"></div>
                                                                   <div class="col-md-2"><label><br></label><button  style="margin: 27px 0px;" class="btn btn-success" id="uploadbutton_gate">Upload</button></div>
                                                                   
                                                                   
                                                                   
                                                                   
                                                                   </div>
                                                                </form>
                                                                <?php

                                                              }

                                                              ?>
                                                                
                                                                 
                                                         
                                                            <div class="row">
                                                                
                                                                
                                                                <div class="col-md-3" ng-repeat="nameimage in namesDataoptonsimages_gate">
                                                                    
                                                                     <?php
                                                                     if($this->session->userdata['logged_in']['access']=='1')
                                                                     {
                                                                     ?>
                                                                     <button type="button"  ng-click="deleteDataimage_gate(nameimage.id)" class="btn btn-outline-danger buttonright"><i class="mdi mdi-delete menu-icon"></i></button>
                                                                     <?php
                                                                     }
                                                                     ?>


    


                                                                    <label> 
                                                                      <a href="{{nameimage.product_image}}" target="_blank">

                                                                        <span ng-if="nameimage.exe=='pdf'">
                                                                          

                                                      <img class="border-set img-responsive"  style="width: 70%"    src="<?php echo base_url(); ?>pdf.png" data-holder-rendered="true">

                                                      <p>Preview not available for PDF. Click to view the file.
</p>


                                                                        </span>
                                                                        <span ng-if="nameimage.exe!='pdf'">
                                                                          
                                                                          <img class="border-set img-responsive"     src="{{nameimage.product_image}}" data-holder-rendered="true">


                                                                        </span>


                                                    
                                                                     </a>
                                                                    </label>

                                                                    <p>{{nameimage.remarks}}</p>
                                                                  
                                                                    </div><!-- end col -->
                                                                
                                                                     <span ng-show="namesDataoptonsimages_gate.length==0">
                                                                     No Image Found 
                                                               </span>
                                                                
                                                               
                                                            </div>
                                                            
                                                                                   
                                                                
                                                                
                                                                
                                                                
                                                            </div>
                                                            
                                                          
                                                    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->











        <script>

            function moveToNext(t, e) {

                0 < t.value.length && $("#digit" + e + "-input").focus()


            }

            var app = angular.module('crudApp', ['datatables']);


            app.directive("fileInput", function ($parse) {
                return {
                    link: function ($scope, element, attrs) {
                        element.on("change", function (event) {
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


            app.directive('loading', function () {
                return {
                    restrict: 'E',
                    replace: true,
                    template: '<div class="loading"><img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" width="20" height="20" /> LOADING...</div>',
                    link: function (scope, element, attr) {
                        scope.$watch('loading', function (val) {
                            if (val)
                                $(element).show();
                            else
                                $(element).hide();
                        });
                    }
                }
            });


            app.directive('autoComplete', function ($timeout) {
                return function (scope, iElement, iAttrs) {
                    iElement.autocomplete({
                        source: scope[iAttrs.uiItems],
                        select: function () {
                            $timeout(function () {
                                iElement.trigger('input');
                            }, 0);
                        }
                    });
                };
            });


            app.controller('crudController', function ($scope, $http) {

                $scope.success = false;
                $scope.error = false;




                $scope.fetchRouteorderassignorder = function (tabelename, status, id, assaignstates) {

                    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_table_transpot_assign_data_driver_list?tablename=' + tabelename + '&order_base=' + status + '&route_id=' + id + '&assaignstates=' + assaignstates).success(function (data) {
                        $scope.namesDataassign = data;
                    });
                };



                $scope.routeOrder = function (id, name) {



                    $scope.fetchRouteorderassignorder('orders_process', 3, id, 1);
                    $scope.route_name = name;


                }

















                $scope.loadProductAll = function () {



var return_id=$('#return_id').val();



                    if ($('#checkall').is(':checked')) {

                        var status = 1;
                        $('.loaditems').each(function () {


                            var id = $(this).val();
                            var categories_id = $('#cateid_' + id).val();
                            var type = $('#cateidtype_' + id).val();
                            $scope.inputsave_1(id, 'nos', categories_id, type);



                        });



                    }
                    else 
                    {
                        var status = 0;

                        $('.loaditems').each(function () {

                            var id = $(this).val();

                            $('.loaditems').prop('checked', false);
                            $('#textchange_' + id).text('Pick');



                            $http({
                                method: "POST",
                                url: "<?php echo base_url() ?>index.php/order/insertandupdate",
                                data: { 'id': id, 'status': status, 'driver_pickip': '<?php echo $driver_pickip; ?>', 'action': 'pickedstatus' }
                            }).success(function (data) {
                                $scope.fetchSingleDatatotaldel();
                                $scope.fetchData();

                            });


                            
                           $http({
                            method: "POST",
                            url: "<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $id; ?>&DC_id=<?php echo $DC_id; ?>",
                            data: { 'return_id': return_id,  'qty': 0, 'nos': 0, 'id': id, 'action': 'return_pickup','status':0 }
                           }).success(function (data) {});
 




                        });



                    }









                };





                $scope.loadProduct = function (id) {



                    var status = 0;
                    $('#textchange_' + id).text('Pick');
                    if ($('#set_id' + id).is(':checked')) {
                        var status = 1;
                        $('#textchange_' + id).text('Picked');
                    }

                    var nos = $('#nos_' + id).val();
                    var return_id = $('#return_id').val();
                    var categories_id = $('#cateid_' + id).val();
                    var type = $('#cateidtype_' + id).val();


                    if (status == 0) 
                    {



                        $http({
                            method: "POST",
                            url: "<?php echo base_url() ?>index.php/order/insertandupdate",
                            data: { 'id': id, 'status': status, 'nos': nos, 'type': type, 'driver_pickip': '<?php echo $driver_pickip; ?>', 'action': 'pickedstatus' }
                        }).success(function (data) {
                            $scope.fetchSingleDatatotaldel();
                            $scope.fetchData();
                        });




                           $http({
                            method: "POST",
                            url: "<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $id; ?>&DC_id=<?php echo $DC_id; ?>",
                            data: { 'return_id': return_id,  'qty': 0, 'nos': 0, 'id': id, 'action': 'return_pickup','status':0 }
                           }).success(function (data) {});

                            
                           
                           


                    }
                    else {


                        if (type == 9) {

                            // $http({
                            //     method: "POST",
                            //     url: "<?php echo base_url() ?>index.php/order/insertandupdate",
                            //     data: { 'id': id, 'status': status, 'nos': nos, 'type': type, 'driver_pickip': '<?php echo $driver_pickip; ?>', 'action': 'pickedstatus' }
                            // }).success(function (data) {
                            //     $scope.fetchSingleDatatotaldel();
                            //     $scope.fetchData();
                            // });

                            // gg changes for nos category partial fix

                            $scope.inputsave_1(id, 'nos', categories_id, type);
                            $scope.fetchSingleDatatotaldel();
                            

                        }
                        else if (type == 19) {

                            $http({
                                method: "POST",
                                url: "<?php echo base_url() ?>index.php/order/insertandupdate",
                                data: { 'id': id, 'status': status, 'nos': nos, 'type': type, 'driver_pickip': '<?php echo $driver_pickip; ?>', 'action': 'pickedstatus' }
                            }).success(function (data) {
                                $scope.fetchSingleDatatotaldel();
                                $scope.fetchData();
                            });

                        }
                        else {
                            
                             // BABU UPDATE

                           $http({
                                method: "POST",
                                url: "<?php echo base_url() ?>index.php/order/insertandupdate",
                                data: { 'id': id, 'status': status, 'nos': nos, 'type': type, 'driver_pickip': '<?php echo $driver_pickip; ?>', 'action': 'pickedstatus' }
                            }).success(function (data) {
                               
                            });

                            // END

                            $scope.inputsave_1(id, 'nos', categories_id, type);
                            $scope.fetchSingleDatatotaldel();

                        }




                    }






                };




                $scope.Proceedtocomplete_only_save = function () {


                    var driver_pickip = '<?php echo $driver_pickip; ?>';
                    var access = '<?php echo $this->session->userdata['logged_in']['access']; ?>';
                    var trip_id = '<?php echo $trip_id; ?>';
                    var vehicle_id = '<?php echo $vehicle_id; ?>';
                    var count = $('input[name="loaditems"]:checked').length;


                    if (count == 0) {
                        alert('Select the checkbox..');
                    }
                    else {
                        //if(confirm("Are you sure you want to Complete?"))
                        //{


                        $http({
                            method: "POST",
                            url: "<?php echo base_url() ?>index.php/order/insertandupdate",
                            data: { 'status': 0, 'order_id': '<?php echo $id; ?>', 'driver_pickip': '<?php echo $driver_pickip; ?>', 'action': 'loadcompleted_save', 'tablenamemain': 'orders_process' }
                        }).success(function (data) {


                            if (access == 13) {
                                window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id=" + vehicle_id + "&delivery_status=2&trip_id=" + trip_id);
                            }
                            else {


                                if (driver_pickip == 1) {


                                    window.location.replace("<?php echo base_url(); ?>index.php/order_second/driver_orders_list_trip_order_base?vehicle_id=" + vehicle_id + "&delivery_status=2&trip_id=" + trip_id);


                                    //history.back();
                                }
                                else {
                                    history.back();
                                }



                            }



                            //alert('success'); 
                            //history.back();


                        });


                        //}
                    }



                };


                // gg changes for scope task

                  $scope.openModal = function () {


                    var count = $('input[name="loaditems"]:checked').length;


                    if (count == 0) {
                        alert('Select the checkbox..');
                        return false;
                    }

                    // Open the modal
                    $('#firstmodalcommison').modal('show');
                };



                $scope.submitOrderDetails = function () {
                        var delivery_charge = $('#delivery_charge').val();


var finalbalnce = $('#finalbalnce').val();
var return_id = $('#return_id').val();
var packed_balance = $('#packed_balance').val();
var return_pick_up_value = $('#return_pick_up_value').val();

                        var delivery_status = $('input[name="formRadios"]:checked').val();
                        var order_id = '<?php echo $id; ?>';
                        var update_id = $('#update_id').val();
                        var payment_mode = $('#cashmode').val();

                        var utr_status = $('input[name="utr_status"]:checked').val();
                        var sample_load_status = $('input[name="sample_load_status"]:checked').val();
                        var cash_bill_status = $('input[name="cash_bill_status"]:checked').val();
                        var site_status = $('input[name="site_status"]:checked').val();
                        var tax_status = $('input[name="tax_status"]:checked').val();
//alert(update_id);


                        if (delivery_status && delivery_charge && payment_mode) {
                            $http({
                                method: "POST",
                                url: "<?php echo base_url() ?>index.php/order/update_scope_details",
                                data: {
                                    order_id: order_id,
                                    delivery_charge: delivery_charge,
                                    delivery_status: delivery_status,
                                    payment_mode: payment_mode,
                                    utr_status: utr_status,
                                    sample_load_status: sample_load_status,
                                    finalbalnce:finalbalnce,
                                    packed_balance:packed_balance,
                                    return_id:return_id,
                                    return_pick_up_value:return_pick_up_value,
                                    cash_bill_status: cash_bill_status,
                                    site_status: site_status,
                                    tax_status: tax_status,



                                    update_id:update_id
                                }
                            }).then(
                                function success(response) {
                                    // Close modal

                                    $('#firstmodalcommison').modal('hide');

                                    // Call Proceedtocomplete
                                    $scope.Proceedtocomplete();


                                },
                                function error(response) {
                                    alert('An error occurred while saving the order. Please try again.');
                                }
                            );
                        } else {
                            alert('Please Choose mandatory details.');
                        }
                    };



                $scope.Proceedtocomplete = function () {


                    var driver_pickip = '<?php echo $driver_pickip; ?>';

                    var vehicle_id = '<?php echo $vehicle_id; ?>';
                    var trip_id = '<?php echo $trip_id; ?>';

                    var access = '<?php echo $this->session->userdata['logged_in']['access']; ?>';

                    var count = $('input[name="loaditems"]:checked').length;


                    if (count == 0) {
                        alert('Select the checkbox..');
                    }
                    else {
                        //if(confirm("Are you sure you want to Complete?"))
                        //{


                        $('#Proceedtocomplete').hide();


                        $http({
                            method: "POST",
                            url: "<?php echo base_url() ?>index.php/order/insertandupdate",
                            data: { 'status': 0, 'order_id': '<?php echo $id; ?>', 'driver_pickip': '<?php echo $driver_pickip; ?>', 'action': 'pickcompleted', 'tablenamemain': 'orders_process' }
                        }).success(function (data) {



                            window.location.replace("<?php echo base_url(); ?>index.php/order/delivery_orders_list");





                        });


                        //}
                    }



                };























                $scope.statuslable = "Assigned Orders";

                $scope.routeassignOrderclick = function (tablename, status1, status2, status3) {



                    if (status3 == 1) {
                        $scope.statuslable = "Assigned Orders";
                    }

                    if (status3 == 2) {
                        $scope.statuslable = "Pick Start Orders";
                    }
                    if (status3 == 3) {
                        $scope.statuslable = "Delivered Orders";
                    }

                    $scope.fetchRouteorderassignorder(tablename, status1, status2, status3);

                }


                $scope.fetchRoute = function () {
                    $http.get('<?php echo base_url() ?>index.php/order/group_gy_route').success(function (data) {
                        $scope.namesRoute = data;
                    });
                };



                $scope.statusChange = function (id) {
                    if (confirm("Are you sure you want to Start?")) {
                        $http({
                            method: "POST",
                            url: "<?php echo base_url() ?>index.php/order/insertandupdate",
                            data: { 'id': id, 'action': 'statuschange', 'tablenamemain': 'orders_process' }
                        }).success(function (data) {
                            $scope.success = false;
                            $scope.error = false;

                            $scope.fetchRouteorderassignorder('orders_process', 3, 0, 1);
                        });
                    }
                };




                $scope.fetchDataCategorybase = function (id) {



                    $http.get('<?php echo base_url() ?>index.php/order/fetchDataCategorybase_delivery?order_id=<?php echo $id; ?>&driver_pickip=<?php echo $driver_pickip; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&randam_id=<?php echo $_GET['DC_id'] ?>&convertion=<?php echo $_GET['convertion']; ?>&convert=' + id).success(function (data) {

                        $scope.namesDatacate = data;


                    });




                };







                $scope.fetchData = function () {



                    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_delivery_data_by_picklist?order_id=<?php echo $id; ?>&driver_pickip=<?php echo $driver_pickip; ?>&tablenamemain=<?php echo 'orders_process'; ?>&tablename_sub=<?php echo 'order_product_list_process'; ?>&convert=1&DC_id=<?php echo $_GET['DC_id'] ?>&convertion=<?php echo $_GET['convertion']; ?>').success(function (data) {
                        $scope.namesData = data;

                        // For one rupee issue

                    var pending_count = 0;
                  
                            for(var i = 0; i < data.length; i++){
                                
                                        var amount = parseFloat(data[i].bill_nos-data[i].empty_loadnos);

                                        // if return resale happen means we need to minus that qty or nos aswell
                                        var resale_nos=0;
                                        if(data[i].edit_nos !=0 || data[i].edit_nos !=''){
                                            var resale_nos=data[i].edit_nos;
                                        }else if(data[i].edit_qty !=0 || data[i].edit_qty !=''){
                                            var resale_nos=data[i].edit_qty;
                                        }
                                        pending_count += parseFloat(amount-resale_nos);

                            }
                            if(pending_count <=0){
                                pending_count=0;
                            }

                            $('#sum_bill_nos').val(pending_count);
                            $scope.fetchSingleDatatotaldel();
                            $scope.pickup_summary();
                            $scope.pickup_summary_previous();
                    });

                    


                };





                $scope.fetchCustomerororderhistroy = function () {
                    $http({
                        method: "POST",
                        url: "<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroy_driver",
                        data: { 'action': 'fetch_single_data', 'order_id': '<?php echo $id; ?>', 'tablenamemain': 'orders_process' }
                    }).success(function (data) {

                        $scope.namesHistory = data;

                    });
                };

                $scope.fetchCustomerororderhistroyorderlist = function () {
                    $http({
                        method: "POST",
                        url: "<?php echo base_url() ?>index.php/order/fetchCustomerororderhistroyorderlist_driver",
                        data: { 'action': 'fetch_single_data', 'order_id': '<?php echo $id; ?>', 'tablenamemain': 'orders_process', 'tablename_sub': 'order_product_list_process' }
                    }).success(function (data) {

                        $scope.namesHistoryorder = data;


                    });
                };




                $scope.storehistory = function (id,inputname,values,oldvalues) {
  
                            $http({
                                    method:"POST",
                                    url:"<?php echo base_url() ?>index.php/order/storehistory?order_id=<?php echo $id; ?>",
                                    data:{'inputname':inputname,'id':id,'values':values,'oldvalues':oldvalues,'order_id':'<?php echo $id; ?>','tablenamemain':'orders_process','tablename_sub':'order_product_list_process'}
                                }).success(function(data){
                            
                                    // alert(data.result);
                                    // $scope.fetchData('1'); 
                                    $scope.fetchSingleDatatotaldel('1');
                                });

                }



   


                $scope.inputsave_1 = function (id, inputname, categories_id, type) {

               

                    var return_id=$('#return_id').val();

                    var convertion_check='<?php echo $_GET['convertion']; ?>';

                    var fieds = inputname + '_' + id;
                    var values = $('#' + fieds).val();



                    var checkval = $('#' + fieds).data('val');
                    var moveforwrd = 1;
                    if (checkval < values) {
                        alert('input max value of order');
                        $('#' + fieds).val(checkval);
                        var moveforwrd = 0;
                    }

                         // copied from order_product and pasted here fro calculation purpose

                         var old_fact=parseFloat($('#old_fact_'+id).val());
                         var old_sqt_qty=0;

                         if(isNaN(old_fact)) 
                         {
                           var old_fact=0;
                         }

                         var lab_dropdown = '';
                        
                        if(inputname == 'dim_two_input'){
                          var inputname = 'dim_two';        
                          var lab_dropdown = 'other';

                        }

                     
                          var fieds=inputname+'_'+id;
                          var values=$('#'+fieds).val();

                          var oldfieds='o_'+inputname+'_'+id;
                          var oldvalues=$('#'+oldfieds).val();

                          var commission_rate=parseFloat($('#commission_'+id).val());
                          if(isNaN(commission_rate)) {

                          var commission_rate=0;

                          }


                          
                        // Make SQM MTR fact editable // fact2 changes
                          if (inputname == 'billing_options') { 
                            // alert(categories_id);                            
                            // alert(values);

                            if (categories_id == 34 || categories_id == 36 || categories_id == 591 || categories_id == 626) {
                                if (values == '3') {
                                    $('#fact2_' + id).show();
                                    $('#fact_' + id).hide();
                                } else {
                                    $('#fact_' + id).show();
                                    $('#fact2_' + id).hide();
                                }
                              }
                            } else {
                              var billing_options= parseFloat($('#billing_options_'+id).val());
                              // alert("billing_options"+billing_options);
                              if (billing_options == '3') {
                                    $('#fact2_' + id).show();
                                    $('#fact_' + id).hide();
                                } else {
                                    $('#fact_' + id).show();
                                    $('#fact2_' + id).hide();
                                }

                                  // $('#fact2_' + id).hide();
                                
                            }


                          $scope.storehistory(id,inputname,values,oldvalues);

                          if(inputname=='product_name' || inputname=='tile_material_name')
                          {

                            var label_cat = inputname=='tile_material_name' ? 'sub_material_cat' : '';


                                  $http({
                                  method:"POST",
                                  url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
                                  data:{'inputname':inputname,'values':values,'weight':weight,'sqt_qty':sqt_qty,'totalammt':totalammt,'ratechange':ratechange,'factchange':factchange,'id':id,'action':'InputUpdate','test':'test3','label_cat':label_cat,'tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                                    }).success(function(data){
                                
                                      if(data.error != '1')
                                      {
                                              
                                              if(data.factfinal>0)
                                              {

                                                 $('#fact_'+id).val(data.factfinal);
                                                 // $scope.inputsave_final_1(id,inputname,categories_id,type);


                                              }
                                             
                                              if(inputname == 'tile_material_name' || inputname == 'sub_product_id'){
                                              $scope.fetchData('1'); 
                                              }
                                              //$scope.fetchSingleDatatotal('1');

                                           
                                      }
                                      else
                                      {

                                            //alert('Please enter the product in this category');
                                      }

                                         
                                   });

                          }
                          else
                          {


                
                    var cul = $('#cal_' + categories_id + type).val();
                    var uom = $('#uom_' + id).val();
                    var profile = parseFloat($('#profile_' + id).val());
                    var old_fact=parseFloat($('#old_fact_'+id).val());


                    if (type == 11) {


                        var dim_one = parseFloat($('#dim_one_' + id).val());
                        var dim_two = parseFloat($('#dim_two_' + id).val());
                        var dim = parseFloat($('#dim_one_' + id).val()) + parseFloat($('#dim_two_' + id).val());
                        $('#dim_oness_' + id).val(dim_one);
                        $('#dim_twoss_' + id).val(dim_two);
                        


                    }
                    else if (type == 12) {


                        var dim_one = parseFloat($('#dim_one_' + id).val());
                        var dim_two = parseFloat($('#dim_two_' + id).val());
                        var dim_three = parseFloat($('#dim_two_' + id).val());
                        var dim = parseFloat($('#dim_one_' + id).val()) + parseFloat($('#dim_two_' + id).val()) + parseFloat($('#dim_three_' + id).val());
                        $('#dim_oness_' + id).val(dim_one);
                        $('#dim_twoss_' + id).val(dim_two);
                        $('#dim_threess_' + id).val(dim_three);


                    }
                    else {
                        var dim = 0;
                    }





                    var crimp = parseFloat($('#crimp_' + id).val());
                 
                    $('#profiless_' + id).val(profile);
                    $('#crimpss_' + id).val(crimp);
                    $('#uomss_' + id).val(uom);


                  

                    if (uom == 3) {
                        
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
                                                                    var profile = profile > 0 ? profile : 0; 
                                                                    var crimp = crimp > 0 ? crimp : 0; 
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
                                                          
                                                       
                                                           if(categories_id==40)
                                                           {
                                                          
                                                                  var profile= parseFloat(profile)+parseFloat(crimp); 
                                                           }
                                                          
                                                           if(categories_id==613)
                                                            {
                                                                   var pro = parseFloat(profile*0.305);
                                                                   var crimp = parseFloat(crimp*0.305);
                                                                   var profile = pro * crimp; 
                                                            }else{

                                                              var profile= parseFloat(profile*0.305);
                                                              var profile=profile;
                                                            }
                                                              
                                                              
                                                      
                                                          var dim= parseFloat(dim*0.305);
                                                          var dim=dim.toFixed(3);






                    }
                   
                    if (uom == 4) {

                        if (type == 0) {
                            var profile = (parseFloat(profile) + parseFloat(crimp)).toFixed(3); // gg changes 

                        }
                        if (type == 6) {
                            var profile = (parseFloat(profile) + parseFloat(crimp)).toFixed(3); // gg changes 
                        }
                        if (type == 15) {
                            var profile = parseFloat(profile) * parseFloat(crimp);

                        }
                        if (type == 13) {
                            var profile = (parseFloat(profile) + parseFloat(crimp)).toFixed(3); // gg changes 
                        }
                        if (type == 8) {
                            var profile = (parseFloat(profile) + parseFloat(crimp)).toFixed(3); // gg changes 
                        }

                            // gg changes
                        if(categories_id==40)
                                 {
                                                          
                                  var profile= parseFloat(profile)+parseFloat(crimp); 

                                 }
                                                          


                        if(categories_id==613)
                                                            {
                                                                   var pro = parseFloat(profile/1000);
                                                                   var crimp = parseFloat(crimp/1000);
                                                                   var profile = pro * crimp; 
                                                            }
                                                            else{
                                                  
                                                             var profile= parseFloat(profile/1000);
                                                             var profile=profile;
                                                           }

                        var dim = parseFloat(dim / 1000);
                        var dim = dim.toFixed(3);



                    }
                    if (uom == 5) {

                        if (type == 0) {
                            var profile = (parseFloat(profile) + parseFloat(crimp)).toFixed(3); // gg changes 

                        }
                        else if (type == 6) {
                            var profile = (parseFloat(profile) + parseFloat(crimp)).toFixed(3); // gg changes 
                        }
                        else if (type == 15) {
                            var profile = parseFloat(profile) * parseFloat(crimp);

                        }
                        else if (type == 13) {
                            var profile = (parseFloat(profile) + parseFloat(crimp)).toFixed(3); // gg changes 
                        }
                        else if (type == 8) {
                            var profile = (parseFloat(profile) + parseFloat(crimp)).toFixed(3); // gg changes 
                        }
                        else {
                            var profile = parseFloat($('#profile_' + id).val());
                        }

                                if(categories_id==40)
                                 {
                                                          
                                  var profile= parseFloat(profile)+parseFloat(crimp); 

                                 }

                                 if(categories_id==613)
                                                            {
                                                                   var pro = parseFloat(profile);
                                                                   var crimp = parseFloat(crimp);
                                                                   var profile = pro * crimp; 
                                                            }


                    }
                    if (uom == 6) {

                        if (type == 0) {
                            var profile = (parseFloat(profile) + parseFloat(crimp)).toFixed(3); // gg changes 

                        }
                        if (type == 6) {
                            var profile = (parseFloat(profile) + parseFloat(crimp)).toFixed(3); // gg changes 

                        }
                        if (type == 15) {
                            var profile = parseFloat(profile) * parseFloat(crimp);

                        }
                        if (type == 13) {
                            var profile = (parseFloat(profile) + parseFloat(crimp)).toFixed(3); // gg changes 

                        }
                        if (type == 8) {
                            var profile = (parseFloat(profile) + parseFloat(crimp)).toFixed(3); // gg changes 
                        }

                        if(categories_id==40)
                                 {
                                                          
                                  var profile= parseFloat(profile)+parseFloat(crimp); 

                                 }


                                 if(categories_id==613)
                                                            {
                                                                   var pro = parseFloat(profile/39.37);
                                                                   var crimp = parseFloat(crimp/39.37);
                                                                   var profile = pro * crimp; 
                                                            }else{
                                                  
                                                           var profile= parseFloat(profile/39.37);
                                                           var profile=profile;
                                                           }

                        var dim = parseFloat(dim / 39.37);
                        var dim = dim.toFixed(3); 



                    }






                    var fact = parseFloat($('#fact_' + id).val());

                    var nos = parseFloat($('#nos_' + id).val());






                    if (inputname == 'billing_options') {
                        if (values == '2') {
                            var rate = parseFloat($('#kg_price_' + id).val());
                            var ratechange = parseFloat($('#kg_price_' + id).val());
                            $('#rate_' + id).val(rate);


                            var fact = parseFloat($('#kg_formula_' + id).val());
                            var factchange = parseFloat($('#kg_formula_' + id).val());
                            $('#fact_' + id).val(fact);


                        }
                        else {

                            var rate = parseFloat($('#rate_tab_get_' + id).val());
                            var ratechange = parseFloat($('#rate_tab_get_' + id).val());
                            $('#rate_' + id).val(rate);


                            var fact = parseFloat($('#og_formula_get_' + id).val());
                            var factchange = parseFloat($('#og_formula_get_' + id).val());
                            $('#fact_' + id).val(fact);
                        }

                    }
                    else {
                        var rate = parseFloat($('#rate_' + id).val());
                        var ratechange = 0;
                        var factchange = 0;
                    }







                    if (categories_id == 1) {
                        var crimp = 0;
                    }


                    if (type == 1) {



                        var profile = parseFloat($('#profile_' + id).val());


                        if (uom == 4) {
                            var profile = parseFloat(profile / 304.8);
                        }
                        if (uom == 5) { 
                            // gg changes 
                             var profile = parseFloat(profile * 3.281);
                            
                        }
                        if (uom == 6) {   
                            var profile = parseFloat(profile / 12);
                        }
                      
                        
                        if(billing_options == 2){
                                                            var profile= parseFloat($('#profile_'+id).val());
                                                            var widthval = $('#img_width_'+id).val();     
                                                            if(widthval=='')
                                                            {
                                                               var widthval=0.410;
                                                            }             
                                                            var kg_rmtr_weight = parseFloat($("#kg_rmtr_weight_"+id).val());
                                                            var image_id=parseFloat($('#image_id_'+id).val());
                                                           
                                                             if(uom==3) 
                                                              { 
                                                                var profile=parseFloat($('#profile_'+id).val())*0.305 ;

                                                                 
                                                                if(image_id=='11229'){
                                                                  var width=0.410*0.305;
                                                                }
                                                                else{
                                                                  var width=widthval*0.305 ;
                                                                }
                                                             
                                                               
                                                              }else if (uom == 4){ 
                                                                var profile=parseFloat($('#profile_'+id).val())/1000;
                                                                if(image_id=='11229'){
                                                                  var width=125/1000;
                                                                }
                                                                else{
                                                                  var width=widthval/1000;
                                                                }
                                                                
                                                              }
                                                              else if (uom == 5){ 
                                                                var profile=parseFloat($('#profile_'+id).val());
                                                                if(image_id=='11229'){
                                                                  var width=0.125;
                                                                }
                                                                else{
                                                                  var width=widthval;
                                                                }
                                                                
                                                              }
                                                              else if (uom == 6){ //inch
                                                                var profile=parseFloat($('#profile_'+id).val())*0.0254;
                                                                if(image_id=='11229'){
                                                                  var width=4.921*0.0254;
                                                                }
                                                                else{
                                                                  var width=widthval*0.0254;
                                                                }
                                                                
                                                              }
                                                              console.log("width >" + width + " < kg_rmtr_weight >"+kg_rmtr_weight);
                                                        console.log("profile >" + profile + " < no >"+nos);

                                                         if(categories_id==627 || categories_id == 611)
                                                          {
                                                            
                                                              var basefact= $('#basefact_'+id).val();
                                                              var kg_rmtr_weight= basefact;
                                                            
                                                          }
                                                          
                                                             if (typeof width === 'number') {
                                                                  width = width.toFixed(2);
                                                              }
                                                              var r_mt = (width*profile)*nos;
                                                              var r_mt_val = r_mt/1.22;


                                                              

                                                              /*

if(convertion_check == 2){




                    var finalweight=parseFloat($('#weight_'+id).val());

                    var total_nos=parseFloat($('#total_bill_nos_'+id).val());

                    var single_quan=finalweight/total_nos;

                    if(finalweight>0)
                    {
                    var sqt_qty=single_quan*nos;
                    }
                    else
                    {
                    var sqt_qty=r_mt_val*kg_rmtr_weight;
                    }


}else {
 // changes */



var finalweight=parseFloat($('#load_partial'+id).val());

if(finalweight > 0 || finalweight != '0.00'){

    var finalweight=parseFloat($('#load_partial'+id).val());
    var total_nos=parseFloat($('#nos_partialflow'+id).val());
  
}else {

    var finalweight=parseFloat($('#weight_'+id).val());
    var total_nos=parseFloat($('#total_bill_nos_'+id).val());
}



var single_quan=finalweight/total_nos;

if(single_quan>0)
{
var sqt_qty=single_quan*nos;
}
else
{
var sqt_qty=r_mt_val*kg_rmtr_weight;
}


/*}*/

                                         










                                                        }else if(billing_options == 5){
                                                           console.log("billing_options >" + billing_options + " < no >"+nos);
                                                          var sqt_qty=nos;

                                                        }
                                                        else
                                                        {
                                                          
                                                           var sqt_qty=profile*nos;

                                                        }
                                                        var sqt_qty=sqt_qty.toFixed(3);

                                                     

                        // var sqt_qty = (profile * nos).toFixed(5);;
                        // // Check if the value has more than 3 decimal places
                        // if (sqt_qty.toString().indexOf('.') !== -1 && sqt_qty.toString().split('.')[1].length > 3) {
                        //     sqt_qty = Math.floor(sqt_qty * 1000) / 1000;  // Truncate to 3 decimal places
                        // }  // gg changes




                    }


                    if (type == 4) {


                   
                      /*  var subqty = parseFloat(profile);
                        var fact = parseFloat(fact);
                        var nos = parseFloat(nos);

                        // Multiply the values
                        var sqt = (subqty * fact).toFixed(5); // Use 5 decimal places to handle intermediate values
                        var sqt_qty = (sqt * nos).toFixed(5); // Same for this step
                        // Check if the value has more than 3 decimal places
                        if (sqt_qty.toString().indexOf('.') !== -1 && sqt_qty.toString().split('.')[1].length > 3) {
                            sqt_qty = Math.floor(sqt_qty * 1000) / 1000;  // Truncate to 3 decimal places
                        }  // gg changes*/


                        var sqt_qty=profile*nos*fact;
                                                   var old_sqt_qty=profile*nos*old_fact;
                                                   var sqt_qty=sqt_qty.toFixed(3);

                    }


                   

                    if (type == 2) {

                        var profile = parseFloat($('#profile_' + id).val());
                        var crimp = parseFloat($('#crimp_' + id).val());


                        if (uom == 4) {
                            var profile = parseFloat(profile / 304.8);
                        }
                        if (uom == 5) {
                            var profile = parseFloat(profile * 3.281);
                        }
                        if (uom == 6) {
                            var profile = parseFloat(profile / 12);
                        }




                        if (uom == 4) {

                            var crimp = parseFloat(crimp / 304.8);
                            var crimp = crimp.toFixed(3);




                        }
                        if (uom == 5) {
                            var crimp = parseFloat(crimp * 3.281);
                            var crimp = crimp.toFixed(3);



                        }
                        if (uom == 6) {
                            var crimp = parseFloat(crimp / 12);
                            var crimp = crimp.toFixed(3);


                        }


                        var subqty = parseFloat(profile);
                        var fact = parseFloat(fact);
                        var nos = parseFloat(nos);

                        // Multiply the values
                        // var sqt = (subqty * fact).toFixed(5); // Use 5 decimal places to handle intermediate values
                        // var sqt_qty = (sqt * nos).toFixed(5); // Same for this step

                        // gg changes calculation issue fixed
                        var sqt_qty=profile*nos*crimp;
                        var sqt_qty=sqt_qty.toFixed(5);
                        

                        if (sqt_qty.toString().indexOf('.') !== -1 && sqt_qty.toString().split('.')[1].length > 3) {
                            sqt_qty = Math.floor(sqt_qty * 1000) / 1000;  // Truncate to 3 decimal places
                        }



                    }

                    if (type == 3) {
                        var sqt_qty = (nos).toFixed(5);;
                        // Check if the value has more than 3 decimal places
                        if (sqt_qty.toString().indexOf('.') !== -1 && sqt_qty.toString().split('.')[1].length > 3) {
                            sqt_qty = Math.floor(sqt_qty * 1000) / 1000;  // Truncate to 3 decimal places
                        }  // gg changes
                    }


                    if (type == 14) {

                        var sqt_qty = (nos * fact).toFixed(5);;
                        // Check if the value has more than 3 decimal places
                        if (sqt_qty.toString().indexOf('.') !== -1 && sqt_qty.toString().split('.')[1].length > 3) {
                            sqt_qty = Math.floor(sqt_qty * 1000) / 1000;  // Truncate to 3 decimal places
                        }  // gg changes

                    }

                    if (type == 9) {
                       /* var nos = parseFloat($('#qty_' + id).val());
                        if (isNaN(nos)) {
                            var nos = parseFloat($('#qty_' + id).text());
                        }



                        var sqt_qty = (nos).toFixed(5);;
                        // Check if the value has more than 3 decimal places
                        if (sqt_qty.toString().indexOf('.') !== -1 && sqt_qty.toString().split('.')[1].length > 3) {
                            sqt_qty = Math.floor(sqt_qty * 1000) / 1000;  // Truncate to 3 decimal places
                        } */
                       
                        // gg changes

                        var nos= parseFloat($('#qty_'+id).val());
                                                      if(isNaN(nos)) {
                                                            var nos= parseFloat($('#qty_'+id).text());
                                                      }
                                           
                                                    
                                                    
                                                    var sqt_qty=nos;
                                                    var sqt_qty=sqt_qty.toFixed(3);



                    }


                    if (type == 19) {

                        var nos = parseFloat($('#qty_' + id).val());
                        if (isNaN(nos)) {
                            var nos = parseFloat($('#qty_' + id).text());
                        }



                        var sqt_qty = (nos).toFixed(5);;
                        // Check if the value has more than 3 decimal places
                        if (sqt_qty.toString().indexOf('.') !== -1 && sqt_qty.toString().split('.')[1].length > 3) {
                            sqt_qty = Math.floor(sqt_qty * 1000) / 1000;  // Truncate to 3 decimal places
                        }  // gg changes

                    }




                                    if(type==5)
                                               {

                                               
                                                    // AStockUpdate-live-01/07
                                                if(categories_id==34){
                                                  var profile= parseFloat($('#profile_'+id).val());
                                                  var fact2= parseFloat($('#fact2_'+id).val()); // fact2 changes
                                                  var uom=$('#uom_'+id).val();

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

                                                  if(billing_options == 2){
                                                      var sqt_qty=profile*0.305*nos*fact;
                                                   }else if(billing_options == 3){
                                                      var sqt_qty=profile*0.305*nos*fact2;
                                                   }else{
                                                    var sqt_qty=profile*0.305*nos;
                                                   }



                                                   var old_sqt_qty=profile*nos*old_fact;
                                                   var sqt_qty=sqt_qty.toFixed(3);

                                                }else{
                                                  var fact2= parseFloat($('#fact2_'+id).val()); // fact2 changes
                                                    var nos1= parseFloat($('#nos_'+id).val())

                                                   
                                                  
                                                    if(billing_options == 2){
                                                      // ength/1000*nos*fact
                                                      var sqt_qty=profile*nos*fact;
                                                  
                                                     }else if(billing_options == 3){
                                                      var sqt_qty=profile*nos*fact2;
                                                   }else{
                                                      var sqt_qty=profile*nos;
                                                     }
                                                   var old_sqt_qty=profile*nos*old_fact;
                                                   var sqt_qty=sqt_qty.toFixed(3);

                                                  }
                                 }
                                               
                    if (type == 8) {

                        var subqty = parseFloat(profile);
                        var fact = parseFloat(fact);
                        var nos = parseFloat(nos);

                        // Multiply the values
                        var sqt = (subqty * fact).toFixed(5); // Use 5 decimal places to handle intermediate values
                        var sqt_qty = (sqt * nos).toFixed(5); // Same for this step

                        // Check if the value has more than 3 decimal places
                        if (sqt_qty.toString().indexOf('.') !== -1 && sqt_qty.toString().split('.')[1].length > 3) {
                            sqt_qty = Math.floor(sqt_qty * 1000) / 1000;  // Truncate to 3 decimal places
                        }  // gg changes


                    }
                    if(type==6)
                                               {
                                                   
                                                   var subqty = parseFloat(profile);
                                                   
                                                 
                                                   
                                                   var sqt=subqty*fact;
                                                   // var sqt_qty=sqt*nos;

                                                  var fact2= parseFloat($('#fact2_'+id).val()); // fact2 changes
                                                   if(billing_options > 0){
                                                    if(billing_options == 3)
                                                    {
                                                      var sqt_qty=subqty*nos*fact2;
                                                    }else if(billing_options == 2){
                                                      var sqt_qty=subqty*nos*fact;
                                                    }else{
                                                      var sqt_qty=subqty*nos*fact;
                                                    }
                                                   }

                                                   var old_sqt_qty=profile*nos*old_fact;

                                                   var sqt_qty = sqt_qty.toFixed(3);
                                                    
                                                    
                                                    
                                                   
                                                  
                                               }
                    if (type == 15) {

                        var profile = parseFloat($('#profile_' + id).val()) * parseFloat($('#crimp_' + id).val());
                        var subqty = parseFloat(profile);
                        var sqt = subqty;
                        if (uom == 4) {
                            var sqtcell = sqt / 1000;
                            var sqt_qty = (sqtcell * nos / 1000).toFixed(5);;

                        }
                        else {
                            var sqt_qty = (sqt * nos).toFixed(5);;
                        }
                        // gg changes


                        // Check if the value has more than 3 decimal places
                        if (sqt_qty.toString().indexOf('.') !== -1 && sqt_qty.toString().split('.')[1].length > 3) {
                            sqt_qty = Math.floor(sqt_qty * 1000) / 1000;  // Truncate to 3 decimal places
                        }
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
                                                    console.log("profile7 >"+profile);

                                                          if(categories_id==613)
                                                           {   
                                                              let thicknessValue = $('#default_thickness_'+id).val(); 
                                                              let numericValue = parseFloat(thicknessValue.replace(/[^0-9.]/g, ''));  
                                                                console.log(numericValue);  

                                                                var sqt_qty=profile*fact*nos*numericValue;
                                                                var old_sqt_qty=profile*nos*old_fact;
                                                                var sqt_qty=sqt_qty.toFixed(3);

                                                           }else{

                                                                  var sqt_qty=profile*fact*nos;
                                                                    var old_sqt_qty=profile*nos*old_fact;
                                                                  var sqt_qty=sqt_qty.toFixed(3);
                                                           }
                                                   }
                                                   
                                                
                                                   
                                                  
                                               }



               
                                               



                    if (type == 16 || type == 17) {

                       /* // gg changes
                        var subqty = parseFloat(profile);
                        var fact = parseFloat(fact);
                        var nos = parseFloat(nos);

                        // Multiply the values
                        var sqt = (subqty * fact).toFixed(5); // Use 5 decimal places to handle intermediate values
                        var sqt_qty = (sqt * nos).toFixed(5); // Same for this step




                        // Check if the value has more than 3 decimal places
                        if (sqt_qty.toString().indexOf('.') !== -1 && sqt_qty.toString().split('.')[1].length > 3) {
                            sqt_qty = Math.floor(sqt_qty * 1000) / 1000;  // Truncate to 3 decimal places
                        }*/

                        var sqt_qty=profile*fact*nos;
                        var old_sqt_qty=profile*nos*old_fact;
                        var sqt_qty=sqt_qty.toFixed(3);



                    }
                    if (type == 10) {
                                                    // gg changes2
                                                     var sqt_qty=profile*fact*nos;
                                                     var old_sqt_qty=profile*nos*old_fact;
                                                     var sqt_qty=sqt_qty.toFixed(3);

                    }

                    if (type == 0) {


                        // gg changes
                        var subqty = parseFloat(profile);
                        var fact = parseFloat(fact);
                        var nos = parseFloat(nos);

                        // Multiply the values
                        var sqt = (subqty * fact).toFixed(5); // Use 5 decimal places to handle intermediate values
                        var sqt_qty = (sqt * nos).toFixed(5); // Same for this step


                        if (sqt_qty.toString().indexOf('.') !== -1 && sqt_qty.toString().split('.')[1].length > 3) {
                            sqt_qty = Math.floor(sqt_qty * 1000) / 1000;  // Truncate to 3 decimal places
                        }


                       

                    }

                    if (type == 13) {

                        // // gg changes
                        // var subqty = parseFloat(profile);
                        // var fact = parseFloat(fact);
                        // var nos = parseFloat(nos);

                        // // Multiply the values
                        // var sqt = (subqty * fact).toFixed(5); // Use 5 decimal places to handle intermediate values
                        // var sqt_qty = (sqt * nos).toFixed(5); // Same for this step



                        // if (sqt_qty.toString().indexOf('.') !== -1 && sqt_qty.toString().split('.')[1].length > 3) {
                        //     sqt_qty = Math.floor(sqt_qty * 1000) / 1000;  // Truncate to 3 decimal places
                        // }

                                                   var subqty = parseFloat(profile);
                                                   var sqt=subqty*fact;
                                                   var sqt_qty=sqt*nos;
                                                   var old_sqt_qty=profile*nos*old_fact;
                                                   var sqt_qty = sqt_qty.toFixed(3);

                    }


                    if (type == 11 || type == 12) {

                        // gg changes
                 
                                                   var subqty = parseFloat(profile);
                                                   var sqt=subqty*dim*crimp*fact;
                                                   var sqt_qty=sqt*nos;

                                                   var sqts=subqty*dim*crimp*old_fact;
                                                   var old_sqt_qty=sqts*nos;


                                                   var sqt_qty = sqt_qty.toFixed(3);

                    }

                    $('#qty_' + id).html(sqt_qty);

                    if (type == 14) {
                        var total = Math.round(rate * sqt_qty);




                    }
                    else {
                        var total = rate * sqt_qty;
                    }

                    var totalammt = total.toFixed(2);
                    $('#amount_' + id).html(totalammt);








                    var nostotsum = 0;
                    $('.nos_' + categories_id).each(function () {
                        nostotsum += parseFloat($(this).val());
                    });
                    var nostotsumtot = nostotsum.toFixed(2);
                    $('#nostot_' + categories_id).html(nostotsumtot);







                    var cattotsum = 0;
                    $('.amounttot_' + categories_id).each(function () {
                        cattotsum += parseFloat($(this).text());
                    });
                    var alltotalcat = cattotsum.toFixed(2);
                    $('#fulltotal_' + categories_id).html(alltotalcat);




                    var cattotsumqty = 0;
                    $('.qtyfind_' + categories_id).each(function () {
                        cattotsumqty += parseFloat($(this).text());
                    });
                    var alltotalcatqty = cattotsumqty.toFixed(2);
                    $('#fullqty_' + categories_id).html(alltotalcatqty);



                    if (inputname == 'qty') {
                        var fieds = inputname + '_' + id;



                        var values = $('#' + fieds).val();
                        var sqt_qty = values;


                    }



                 

                    if (moveforwrd == 1) 
                    {




                        $http({
                            method: "POST",
                            url: "<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $id; ?>&DC_id=<?php echo $DC_id; ?>",
                            data: { 'totalammt': totalammt,'return_id': return_id, 'categories_id': categories_id,'rate': rate, 'qty': sqt_qty, 'nos': values, 'id': id, 'action': 'Loadinsertproductdata_pack' }
                           }).success(function (data) {

                            if (data.error != '1') 
                            {

                                $scope.fetchData();
                                $scope.fetchSingleDatatotaldel();


                             }

                        });


                           $http({
                            method: "POST",
                            url: "<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $id; ?>&DC_id=<?php echo $DC_id; ?>",
                            data: {'return_id': return_id, 'qty': sqt_qty, 'nos': values, 'id': id, 'action': 'return_pickup','status':1 }
                           }).success(function (data) {

                            

                           });


                    }







                }

      }


                $scope.returnfinsh = function () {


                    var returnid = $(".returnid");
                    var order_product_id_set_value = [];
                    var status = [];
                    for (var i = 0; i < returnid.length; i++) {

                        if ($(returnid[i]).is(':checked')) {

                            order_product_id_set_value.push($(returnid[i]).val());
                            status.push(2);

                        }
                        else {
                            order_product_id_set_value.push($(returnid[i]).val());
                            status.push(1);
                        }

                    }

                    var order_product_id = order_product_id_set_value.join("|");
                    var status_id = status.join("|");


                    $http({
                        method: "POST",
                        url: "<?php echo base_url() ?>index.php/order/insertandupdate",
                        data: { 'action': 'returnproduct_driver', 'status': status_id, 'order_product_id': order_product_id, 'tablename_sub': 'order_product_list_process ' }
                    }).success(function (data) {

                    });

                };



                $scope.fetchSingleDatatotal = function () {

                    $http({
                        method: "POST",
                        url: "<?php echo base_url() ?>index.php/order/fetch_single_data_totaldel?order_id=<?php echo $id; ?>",
                        data: { 'action': 'fetch_single_data', 'tablenamemain': 'orders_process', 'driver_pickip': '<?php echo $driver_pickip; ?>', 'tablename_sub': 'order_product_list_process' }
                    }).success(function (data) {

                        $scope.fulltotal = data.fulltotal;


                        $scope.order_no_id = data.order_no_id;
                        $scope.start_reading = data.start_reading;



                        if (data.user_id) {
                            $scope.user_id = data.user_id;
                        }
                        if (data.reason) {
                            $scope.reason = data.reason;
                        }

                        if (data.salesphone) {
                            $scope.salesphone = data.salesphone;
                        }


                        if (data.salesname) {
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




// gg changes
/*
$scope.fetchSingleDatatotaldel = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php / order / fetch_single_data_totaldel_pickup ? order_id = <?php echo $id; ?>",
                data: { 'action': 'fetch_single_data', 'tablenamemain': 'orders_process', 'DC_id': '<?php echo $DC_id_data; ?>', 'driver_pickip': '<?php echo $driver_pickip; ?>', 'tablename_sub': 'order_product_list_process', 'convert': '1' }
            }).success(function (data) {

                $scope.fulltotaldel = data.fulltotal;
                $scope.tcsamount = data.tcsamount;


                if (data.pickedtotalamount > 0) {
                    $scope.loadtotalamount = data.pickedtotalamount;
                }
                else {
                    $scope.loadtotalamount = 0;
                }

                if (data.picked_amount > 0) {
                    $scope.unbilledloadamount = data.picked_amount + data.picked_amount_alreay_packed;
                    var setpickedamount = data.picked_amount + data.picked_amount_alreay_packed;
                }
                else {
                    $scope.unbilledloadamount = data.picked_amount_alreay_packed;
                    var setpickedamount = data.picked_amount_alreay_packed;
                }

                $scope.deliveredamount = data.deliveredamount;


                var finalbalnce = parseInt(data.fulltotal) - parseInt(setpickedamount) - parseInt(data.deliveredamount);


                if (finalbalnce > 0) {
                    $scope.finalbalnce = finalbalnce;
                }
                else {
                    $scope.finalbalnce = 0;
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
*/


            $scope.fetchSingleDatatotaldel = function () {
                // For one rupee issue
                var sum_bill_nos=$('#sum_bill_nos').val();
                $http({
                    method: "POST",
                    url: "<?php echo base_url() ?>index.php/order/fetch_single_data_totaldel_pickup_test?order_id=<?php echo $id; ?>&sum_total_nos="+sum_bill_nos+'&DC_id=<?php echo $_GET['DC_id'] ?>&convertion=<?php echo $_GET['convertion']; ?>',
                    data: { 'action': 'fetch_single_data', 'tablenamemain': 'orders_process', 'DC_id': '<?php echo $DC_id_data; ?>', 'driver_pickip': '<?php echo $driver_pickip; ?>', 'tablename_sub': 'order_product_list_process', 'convert': '1','convertion':'<?php echo $convertion; ?>' }
                }).success(function (data) {


                    $scope.fulltotaldel = data.fulltotal;
                    $scope.tcs_status_amount = data.tcs_status_amount;
                    $scope.tcs_status_picked = data.tcs_status_picked;
                    $scope.tcsamount_pickup_status = data.tcsamount_pickup_status;
                    $scope.reason = data.reason;

                    $scope.gate_login_view_status = data.gate_login_view_status;
                    $scope.convertion = data.convertion;
                    $scope.return_amount_return_to_sale = data.return_amount_return_to_sale;


                    
                    if (data.pickedtotalamount > 0) {
                        $scope.loadtotalamount = data.pickedtotalamount;
                    }
                    else {
                        $scope.loadtotalamount = 0;
                    }


                    if($scope.loadtotalamount==0)
                    {
                         $scope.fetchSingleDatatotaldelcheck_data($scope.loadtotalamount);
                    }


                    // gg changes
                    if (data.picked_amount > 0) 
                    {
                        $scope.unbilledloadamount = data.picked_amount + data.picked_amount_alreay_packed;
                        var setpickedamount = data.picked_amount + data.picked_amount_alreay_packed;
                    }
                    else 
                    {
                        $scope.unbilledloadamount = data.picked_amount_alreay_packed;
                        var setpickedamount = data.picked_amount_alreay_packed;
                    }

                    $scope.deliveredamount = data.deliveredamount;
                    $scope.return_id = data.return_id;



                     $scope.return_amount_return_to_resale = data.return_amount_return_to_resale;

                    //var already_loaded_dc_amount='<?php echo array_sum($already_loaded_value);  ?>';
                  




                   /* if(data.get_convertion == 2){

                        var finalbalnce = parseInt(data.fulltotal)  -  parseInt(already_loaded_dc_amount) - parseInt(data.total_picked_amount);

                    }else {*/
                        
                       var finalbalnce = parseInt(data.fulltotal) - parseInt(data.return_amount_return_to_resale_2) - parseInt(data.already_loaded_value_onpage) - parseInt(data.pickedtotalamount);

                   // }
                   
                   if(data.get_convertion == 2){

                        var convertion_load_dc_amount=parseInt(data.already_loaded_value_onpage_per);
                        if (convertion_load_dc_amount > 0) {
                                $scope.convertion_load_dc_amount = convertion_load_dc_amount;
                            }
                            else {
                                $scope.convertion_load_dc_amount = 0;
                            }
                    }


                    if (finalbalnce > 0) 
                    {
                         

                       /* if(finalbalnce==1)
                        {
                            $scope.finalbalnce =0;
                            var finalbalnce =0;
                        } 
                        else
                        {*/
                            $scope.finalbalnce = finalbalnce;
                        //}

                        


                    }
                    else {
                        $scope.finalbalnce = 0;
                    }



                    // For one rupee issue
                    $('#is_balence').val(finalbalnce);



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

                     // gg changes scope task
                    
                     $scope.delivery_charge = data.delivery_charge;
                    $scope.delivery_status = data.delivery_status;
                   // $scope.payment_mode = data.payment_mode;
                    $('#cashmode').val(data.payment_mode);

                    $scope.utr_status = data.utr_status;
                    $scope.sample_load_status = data.sample_load_status;
                    $scope.cash_bill_status = data.cash_bill_status;
                    $scope.site_status = data.site_status;
                    $scope.tax_status = data.tax_status;

                    
                    $scope.payment_mode = data.payment_mode; // Assign payment mode to scope
                    $scope.updateUTRDetailsVisibility(); // Update visibility based on payment mode


                    $scope.update_id = data.update_id;


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



                    //gg changes
                    $scope.picked_amount_sub = data.picked_amount_sub;
                    $scope.gsttotal_picked = data.picked_amount_gst;
                    $scope.roundoffstatusval_data_picked = data.roundoffstatusval_data_picked;
                    $scope.picked_amount = data.picked_amount;
                    $scope.bill_roundoff_show = data.bill_roundoff_show;
                });
            };













              




              $scope.fetchSingleDatatotaldelcheck_data = function (amount) {
                // For one rupee issue
                var sum_bill_nos=$('#sum_bill_nos').val();

                $http({
                    method: "POST",
                    url: "<?php echo base_url() ?>index.php/order_check/fetch_single_data_totaldel_pickup_test_val?order_id=<?php echo $id; ?>&sum_total_nos="+sum_bill_nos+'&DC_id=<?php echo $_GET['DC_id'] ?>&convertion=<?php echo $_GET['convertion']; ?>',
                    data: { 'action': 'fetch_single_data', 'tablenamemain': 'orders_process', 'DC_id': '<?php echo $DC_id_data; ?>', 'driver_pickip': '<?php echo $driver_pickip; ?>', 'tablename_sub': 'order_product_list_process','amount': amount, 'convert': '1','convertion':'<?php echo $convertion; ?>' }
                }).success(function (data) {


                  
                });
            };















            $scope.updateUTRDetailsVisibility = function () {
                if ($scope.payment_mode === 'Bank Transfer') {
                    $scope.showUTRDetails = true; // Show the UTR details section
                } else {
                    $scope.showUTRDetails = false; // Hide the UTR details section
                }
            };










            $scope.fetchCustomerdetails_1 = function () {



                $http({
                    method: "POST",
                    url: "<?php echo base_url() ?>index.php/order/fetchCustomerdetails_1",
                    data: { 'id': '<?php echo $id; ?>', 'tablename': 'orders_process' }
                }).success(function (data) {



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
                    $scope.delivery_mode = data.delivery_mode;
                    $('#cashmode').val(data.payment_mode);

                    if (data.payment_mode == "Cheque") {
                        $('#reference_no_view').show();
                    }
                    if (data.payment_mode == "Bank Transfer") {
                        $('#reference_no_view').show();
                    }

                    if (data.payment_mode == "Cash") {
                        $('#dinomainitionview').show();
                    }




                    $scope.payment_mode = data.payment_mode;
                    $scope.deliverystatus = data.delivery_status;


                    $scope.delivery_status_name = data.delivery_status_name;

                    $scope.delivery_charge = data.delivery_charge;






                });



            }


            // gg changes



            $scope.fetchSingleDatatotal_show = function (id) {
                $http({
                    method: "POST",
                    url: "<?php echo base_url() ?>index.php/order/fetch_single_data_total?order_id=<?php echo $id; ?>",
                    data: {
                        'action': 'fetch_single_data', 'tablenamemain': 'orders_process', 'tablename_sub':
                            'order_product_list_process', 'convert': id
                    }

                }).success(function (data) {

                    $scope.fulltotal = data.fulltotal;
                    $scope.org_fulltotal = data.org_fulltotal;
                    $scope.discount = data.discountPre;
                    //$scope.convertion = data.convertion;
                    $scope.gsttotal = data.gsttotal;
                    $scope.print_status = data.print_status;
                    $scope.commission = data.commission;
                    $scope.amounttotal_with_out_commission = data.amounttotal_with_out_commission;

                    $scope.credit_limit_status = data.credit_limit_status;

                   // $scope.gate_login_view_status = data.gate_login_view_status;

                    $('#gstview').val(data.gst_view);





                    if (!data.order_no_id) {
                        $scope.order_no_id = '<?php echo $order_no; ?>';
                        $scope.order_no_new = '<?php echo $order_no; ?>';
                        $scope.order_no_new_old = '<?php echo $order_no; ?>';
                        $scope.po_no = '<?php echo $order_no; ?>';
                    }
                    else {
                        $scope.order_no_id = data.order_no_id;
                        $scope.order_no_new = data.order_no_id;
                        $scope.order_no_new_old = data.order_no_id;
                        $scope.po_no = data.order_no_id;

                    }

                    if (!data.create_date) {
                        $scope.create_date = '<?php echo date('d/m/Y'); ?>';
                    }
                    else {
                        $scope.create_date = data.create_date;

                    }
                    //For GST Task, Creating SGST and CGST from july 1
                    if (!data.create_date_formatted) {
                        $scope.create_date_formatted = '<?php echo date('d/m/Y'); ?>';
                    }
                    else {
                        $scope.create_date_formatted = data.create_date_formatted;

                    }

                    console.log("data.create_date_formatted", data.create_date_formatted, '2024-05-31');
                    if ($scope.create_date_formatted > '2024-05-31') {
                        $scope.gst_input = 0;
                    } else {
                        $scope.gst_input = 1;

                    }



                    if (!data.create_time) {
                        $scope.create_time = '<?php echo date('h:i A'); ?>';
                    }
                    else {
                        $scope.create_time = data.create_time;

                    }


                    //For GST Task, Creating SGST and CGST from july 1
                    if (!data.create_time) {
                        $scope.create_time = '<?php echo date('h:i A'); ?>';
                    }
                    else {
                        $scope.create_time = data.create_time;

                    }
                    $scope.mark_date = data.mark_date;
                    if (data.user_id) {
                        $scope.user_id = data.user_id;
                    }
                    if (data.reason) {
                        $scope.reason = data.reason;
                    }


                    if (data.delivery_status_check == 1) {
                        // $('#client_scope').show();
                        // $('#own_scope').hide();
                        //$("#formRadios1").prop("checked", true);
                    }


                    if (data.delivery_status_check == 2) {
                        //$('#own_scope').show();
                        //$('#client_scope').hide();
                        // $("#formRadiosRight1").prop("checked", true);

                    }



                    $scope.paricel_mode = data.paricel_mode;

                    $scope.totalitems = data.totalitems;
                    $scope.discounttotal = data.discount;
                    $scope.DiscountAmount = data.discount;


                    $scope.tcsamount_order = data.tcsamount;
                    $scope.tcs_status = data.tcs_status;
                    $scope.discountfulltotal = data.discountfulltotal;

                    //for GST Subtotal
                    // $scope.discountfulltotaldel = data.discountfulltotal;

                    $scope.commissiontotal = data.commissiontotal;

                    if (data.minisroundoff > 0) {
                        $scope.minisroundoff = data.minisroundoff;
                    }
                    $scope.roundoff_val = data.roundoff_val;
                    $scope.Meter_to_Sqr_feet = data.Meter_to_Sqr_feet;

                    $scope.roundoffstatusval_data = data.roundoffstatusval_data;
                    $scope.symble = data.symble;

                    $scope.statusview = data.statusview;

                    $scope.fullqty = data.fullqty;
                    $scope.FACT = data.FACT;
                    $scope.UNIT = data.UNIT;
                    $scope.NOS = data.NOS;

                });
            };

            $scope.fetchSingleDatatotal_show(1);


            $scope.fetchCustomerorderdata = function () {
                $http({
                    method: "POST",
                    url: "<?php echo base_url() ?>index.php/order/fetchcustomerorderdata?order_id=<?php echo $id; ?>",
                    data: { 'action': 'fetch_single_data', 'tablenamemain': 'orders_process', 'tablename_sub': 'order_product_list_process' }
                }).success(function (data) {

                    $scope.customername = data.company_name;
                    $scope.customerphone = data.phone;


                    $scope.company_name_refer = data.company_name_refer;
                    $scope.phone_refer = data.phone_refer;


                    $scope.phone2 = data.landline;


                    $scope.route_name = data.route_name;
                    $scope.locality_name = data.locality_name;
                    $scope.customer_id = data.customer_id;


                    $scope.billing_address = data.billing_address;
                    $scope.shipping_address = data.shipping_address;


                    $scope.credit_limit = data.credit_limit;
                    $scope.fulltotal_usage = data.fulltotal_usage;
                    $scope.credit_period = data.credit_period;

                    $scope.ratings = data.ratings;
                    $scope.useage = data.useage;
                    $scope.approx_id = data.approx;




                    $scope.order_base = data.order_base;
                    $scope.finance_status = data.finance_status;

                    if (data.finance_status == 5) {
                        $('#showorderbase').show();
                    }


                    $scope.commission_check = data.commission_check;
                    $scope.commission_check_fact = data.commission_check_fact;


                    $scope.base_check_db = data.base_check;
                    $scope.base_check = 1;
                    $scope.gst_check = data.gst_check;



                    $scope.SSD_check = data.SSD_check;
                    $scope.excess_payment_status = data.excess_payment_status;
                    $('#delivery_date_time').val(data.delivery_date_time_mark);
                    $scope.delivery_date_time = data.delivery_date_time;
                    $scope.competitorname = data.competitorname;
                    $scope.details = data.details;

                    $scope.delivery_address = data.delivery_address;

                });
            };
            $scope.fetchCustomerorderdata();






            $scope.removeTCS = function () {


                $('#removeTCS').text('Loading...');
                //$('#ordercheck').text('Check');
                $('#removeTCS').text('Removed');

                $http({
                    method: "POST",
                    url: "<?php echo base_url() ?>index.php/order_check/removeTCS?order_id=<?php echo $id; ?>",
                    data: { 'order_id': '<?php echo $id; ?>', 'order_no': '<?php echo $order_no; ?>', 'action': 'Save', 'tablenamemain': 'orders_process', 'tablename_sub': 'order_product_list_process' }
                }).success(function (data) {

                    if (data.error != '1') {


                        $scope.fetchSingleDatatotal_show('1');
                        $scope.fetchSingleDatatotaldel('1');

                    }

                });




            }







            $scope.undoTCS = function () {


                $('#removeTCS').text('Loading...');
                //$('#ordercheck').text('Check');
                $('#removeTCS').text('Removed');

                $http({
                    method: "POST",
                    url: "<?php echo base_url() ?>index.php/order_check/undoTCS?order_id=<?php echo $id; ?>",
                    data: { 'order_id': '<?php echo $id; ?>', 'order_no': '<?php echo $order_no; ?>', 'action': 'Save', 'tablenamemain': 'orders_process', 'tablename_sub': 'order_product_list_process' }
                }).success(function (data) {

                    if (data.error != '1') {


                        $scope.fetchSingleDatatotal_show('1');
                        $scope.fetchSingleDatatotaldel('1');


                    }

                });




            }

            // pickup summary maintain

            $scope.pickup_summary = function () {

                // For one rupee issue
                var sum_bill_nos=$('#sum_bill_nos').val();
                var is_balence=$('#is_balence').val();
              

                $http({
                    method: "POST",
                    url: "<?php echo base_url() ?>index.php/order/pickup_summary?order_id=<?php echo $id; ?>&sum_total_nos="+sum_bill_nos+"&is_balence="+is_balence,
                    data: { 'tablenamemain': 'orders_process', 'DC_id': '<?php echo $DC_id_data; ?>', 'driver_pickip': '<?php echo $driver_pickip; ?>', 'tablename_sub': 'order_product_list_process', 'convert': '1' }

                }).success(function (data) {

                    $scope.pickupDetails = data.data;



                });
            };
            $scope.pickup_summary('1');

            //* START HERE TMRO ?

            // pickup previous summary maintain

            $scope.pickup_summary_previous = function () {
                // For one rupee issue
                var sum_bill_nos=$('#sum_bill_nos').val();
                var is_balence=$('#is_balence').val();
                $http({
                    method: "POST",
                    url: "<?php echo base_url() ?>index.php/order/pickup_summary_previous?order_id=<?php echo $id; ?>&sum_total_nos="+sum_bill_nos+"&is_balence="+is_balence,
                    data: { 'tablenamemain': 'orders_process', 'DC_id': '<?php echo $_GET['DC_id']; ?>', 'driver_pickip': '<?php echo $driver_pickip; ?>', 'tablename_sub': 'order_product_list_process', 'convert': '1','convertion':'<?php echo $convertion; ?>' }

                }).success(function (data) {

                    $scope.pickupDetails_data = data.data;



                });
            };
            $scope.pickup_summary_previous('1');


// FOR GATE ORDER PURPOSE


$scope.inputsaveqty_1 = function (id,inputname,categories_id,type) {

 $("#versionUpdateBtn").removeClass('disabled');

 $scope.isButtonDisabled1 = 1;
 localStorage.setItem('isButtonDisabled1', '1');
 <?php $button_dis = true; ?>

var convertion='<?php echo $convertion; ?>';

 var fieds=inputname+'_'+id;
  var values=$('#'+fieds).val();
 


  //var commission_rate=parseFloat($('#commission_'+id).val());
        //if(isNaN(commission_rate)) {

         var commission_rate=0;

  //}


 var rate= parseFloat($('#rate_'+id).val());
 var rate= rate+commission_rate;
 
 
 var toatlamt=rate*values;
 var toatlamtamm=toatlamt.toFixed(2);
 $('#amount_'+id).html(toatlamtamm);


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
   
   if($(this).val()>0)
   {
       cattotsumqty += parseFloat($(this).val());  
   }
   
   
});


var alltotalcatqty=cattotsumqty.toFixed(3);
$('#fullqty_'+categories_id).html(alltotalcatqty);
$('#saveactqty_'+categories_id).val(alltotalcatqty);


var weight=0;    
var default_weight= parseFloat($('#default_weight_'+id).val());
var default_billed_qty= parseFloat($('#billed_qty_'+id).val());


$http({
 method:"POST",
 url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $id; ?>",
 data:{'inputname':inputname,'default_qty':default_billed_qty,'values':values,'id':id,'action':'convertionqty_gate','convertion':'<?php echo $convertion; ?>','tablenamemain':'packed_details','tablename_sub':'order_product_list_process','dc_id': '<?php echo $_GET['DC_id']; ?>','rate':rate}
}).success(function(data){

 if(data.error != '1')
 {

          
          $scope.fetchSingleDatatotal_show('1');

          $scope.fetchData();
          $scope.pickup_summary('1');
          $scope.pickup_summary_previous('1');
          $scope.fetchSingleDatatotaldel('1');
     
      
 }
    
});

}





   
$scope.coniformed = function(order_id){
    if(confirm("Are you sure you want to Approved it?"))
    {
   
    var dc_id="<?php echo $_GET['DC_id']; ?>";
   
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order_check/gate_approved_for_finance_packlist",
        data:{'order_id':order_id,'dc_id':dc_id}
      }).success(function(data){
         
         
        
          alert('Approved success');
          //$scope.fetchSingleDatatotal('1');
          $scope.fetchSingleDatatotaldel('1');
          $scope.fetchSingleDatatotal_show('1');
          $scope.fetchData();
          $scope.pickup_summary('1');
          $scope.pickup_summary_previous('1');
         
          
      });

    }
};



$scope.coniformedRe = function(order_id){
if(confirm("Are you sure you want to Reject it?"))
    {
  
   var dc_id="<?php echo $_GET['DC_id']; ?>";
  

      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order_check/gate_approved_for_finance_re_packlist",
        data:{'order_id':order_id,'dc_id':dc_id}
      }).success(function(data){
         
         
        
          alert('Rejected');
          //$scope.fetchSingleDatatotal('1');
          $scope.fetchSingleDatatotaldel('1');
          $scope.fetchSingleDatatotal_show('1');
          $scope.fetchData();
          $scope.pickup_summary('1');
          $scope.pickup_summary_previous('1');
          
          
      });

    }
};


// image upload


$scope.imgpreviewgate = function(order_id)
{
        
        $('#imagesizemodel_gate').modal('toggle');
       
        $scope.imgpreviewimagesGate(order_id);

       
       
   
};

 $scope.imgpreviewimagesGate = function(order_id){
           
            
                              
            
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/products/findimages_gate",
                                data:{'order_id':order_id}
                                }).success(function(data){
                                  
                                   $scope.namesDataoptonsimages_gate = data;
                                  
                                 
                                 
                               }); 
            
            
 };


  $scope.deleteDataimage_gate = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
        
       var product_id=$('#order_product_id_base_define').val();   
       var cate_id= $('#clickcateid').val();
       var order_product_id=$('#product_id_base_define').val();
        
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/products/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'gate_order_images'}
      }).success(function(data){
         
          $scope.imgpreviewimagesGate(<?php echo $id; ?>);
          
      }); 
    }
};


$scope.imageuploadInproduct_gate = function(){
              
                
                      
                              
                              $('#uploadbutton_gate').html('Loading..');

                              var remarks=$('#gate_remarks').val();
              
                              var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file[]', file);  
                               });  
                               $http.post('<?php echo base_url() ?>index.php/products/fileuplaodimgsave_gate?id=<?php echo $id; ?>&remarks='+remarks, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   

                                   $('#gate_remarks').val('');
                                   $('#gate_file').val('');

                                   
                                  

                                   $scope.imgpreviewimagesGate(<?php echo $id; ?>);
                                 
                                  $('#uploadbutton_gate').html('Upload');
                                   
                                    
                               });  

     
};



       // show weight kg 

$scope.get_kg_weight = function () {
                $http({
                    method: "POST",
                    url: "<?php echo base_url() ?>index.php/order/get_kg_weight_data?order_id=<?php echo $id; ?>",
                    data: { 'tablenamemain': 'orders_process', 
                        'DC_id': '<?php echo $_GET['DC_id']; ?>', 
                        'driver_pickip': '<?php echo $driver_pickip; ?>', 
                        'tablename_sub': 'order_product_list_process',
                        'convert': '1' }

                }).success(function (data) {

                    $scope.weight_details = data;



                });
            };     

            $scope.get_kg_weight('1');















});



            $(document).ready(function () {
                $("#cashmode").change(function () {


                    var val = $(this).val();




                    if (val == 'Cash') {
                        $('#dinomainitionview').show();
                        $('#reference_no_view').hide();
                    }
                    else {
                        $('#dinomainitionview').hide();
                        $('#reference_no_view').show();
                    }





                });


                $("#rescheduling_delivery").change(function () {


                    var val = $(this).val();




                    if (val == 'NO') {

                        $('#rescheduling_delivery_view').hide();
                    }
                    else {
                        $('#rescheduling_delivery_view').show();
                    }




                });








                $('#10_rs').on('input', function () {

                    var input = parseInt($(this).val());
                    var tot = input * 10
                    $('#10_total').val(tot);



                    var c10_total = $('#10_total').val();
                    var c20_total = $('#20_total').val();

                    var c50_total = $('#50_total').val();
                    var c100_total = $('#100_total').val();
                    var c200_total = $('#200_total').val();
                    var c500_total = $('#500_total').val();
                    var c2000_total = $('#2000_total').val();

                    if (c10_total == '') {
                        var c10_total = 0;
                    }

                    if (c20_total == '') {
                        var c20_total = 0;
                    }


                    if (c50_total == '') {
                        var c50_total = 0;
                    }
                    if (c100_total == '') {
                        var c100_total = 0;
                    }
                    if (c200_total == '') {
                        var c200_total = 0;
                    }
                    if (c500_total == '') {
                        var c500_total = 0;
                    }

                    if (c2000_total == '') {
                        var c2000_total = 0;
                    }

                    var amount_data = parseInt(c10_total) + parseInt(c20_total) + parseInt(c50_total) + parseInt(c100_total) + parseInt(c200_total) + parseInt(c500_total) + parseInt(c2000_total);
                    $('#fulltotal').val(amount_data);


                    var allam = parseInt($('#fulltotal').data('value'));
                    var totbal = allam - amount_data
                    $('#bal').text(totbal);


                    if (totbal < 0) {

                        $('#accessshow').show();
                        $('#accessshow1').show();
                        $('#return_excess1').val(Math.abs(totbal));
                        $('#return_excess').val(totbal);

                    }
                    else {
                        $('#accessshow').hide();
                        $('#accessshow1').hide();
                        $('#return_excess').val('0');
                        $('#return_excess1').val('0');
                    }





                });

                $('#20_rs').on('input', function () {

                    var input = parseInt($(this).val());
                    var tot = input * 20
                    $('#20_total').val(tot);



                    var c10_total = $('#10_total').val();
                    var c20_total = $('#20_total').val();

                    var c50_total = $('#50_total').val();
                    var c100_total = $('#100_total').val();
                    var c200_total = $('#200_total').val();
                    var c500_total = $('#500_total').val();
                    var c2000_total = $('#2000_total').val();

                    if (c10_total == '') {
                        var c10_total = 0;
                    }

                    if (c20_total == '') {
                        var c20_total = 0;
                    }


                    if (c50_total == '') {
                        var c50_total = 0;
                    }
                    if (c100_total == '') {
                        var c100_total = 0;
                    }
                    if (c200_total == '') {
                        var c200_total = 0;
                    }
                    if (c500_total == '') {
                        var c500_total = 0;
                    }

                    if (c2000_total == '') {
                        var c2000_total = 0;
                    }

                    var amount_data = parseInt(c10_total) + parseInt(c20_total) + parseInt(c50_total) + parseInt(c100_total) + parseInt(c200_total) + parseInt(c500_total) + parseInt(c2000_total);
                    $('#fulltotal').val(amount_data);


                    var allam = parseInt($('#fulltotal').data('value'));
                    var totbal = allam - amount_data
                    $('#bal').text(totbal);

                    if (totbal < 0) {

                        $('#accessshow').show();
                        $('#accessshow1').show();
                        $('#return_excess1').val(Math.abs(totbal));
                        $('#return_excess').val(totbal);

                    }
                    else {
                        $('#accessshow').hide();
                        $('#accessshow1').hide();
                        $('#return_excess').val('0');
                        $('#return_excess1').val('0');
                    }


                });

                $('#50_rs').on('input', function () {

                    var input = parseInt($(this).val());
                    var tot = input * 50
                    $('#50_total').val(tot);



                    var c10_total = $('#10_total').val();
                    var c20_total = $('#20_total').val();

                    var c50_total = $('#50_total').val();
                    var c100_total = $('#100_total').val();
                    var c200_total = $('#200_total').val();
                    var c500_total = $('#500_total').val();
                    var c2000_total = $('#2000_total').val();

                    if (c10_total == '') {
                        var c10_total = 0;
                    }

                    if (c20_total == '') {
                        var c20_total = 0;
                    }


                    if (c50_total == '') {
                        var c50_total = 0;
                    }
                    if (c100_total == '') {
                        var c100_total = 0;
                    }
                    if (c200_total == '') {
                        var c200_total = 0;
                    }
                    if (c500_total == '') {
                        var c500_total = 0;
                    }

                    if (c2000_total == '') {
                        var c2000_total = 0;
                    }

                    var amount_data = parseInt(c10_total) + parseInt(c20_total) + parseInt(c50_total) + parseInt(c100_total) + parseInt(c200_total) + parseInt(c500_total) + parseInt(c2000_total);
                    $('#fulltotal').val(amount_data);


                    var allam = parseInt($('#fulltotal').data('value'));
                    var totbal = allam - amount_data
                    $('#bal').text(totbal);


                    if (totbal < 0) {

                        $('#accessshow').show();
                        $('#accessshow1').show();
                        $('#return_excess1').val(Math.abs(totbal));
                        $('#return_excess').val(totbal);

                    }
                    else {
                        $('#accessshow').hide();
                        $('#accessshow1').hide();
                        $('#return_excess').val('0');
                        $('#return_excess1').val('0');
                    }


                });


                $('#100_rs').on('input', function () {

                    var input = parseInt($(this).val());
                    var tot = input * 100
                    $('#100_total').val(tot);


                    var c10_total = $('#10_total').val();
                    var c20_total = $('#20_total').val();

                    var c50_total = $('#50_total').val();
                    var c100_total = $('#100_total').val();
                    var c200_total = $('#200_total').val();
                    var c500_total = $('#500_total').val();
                    var c2000_total = $('#2000_total').val();


                    if (c10_total == '') {
                        var c10_total = 0;
                    }

                    if (c20_total == '') {
                        var c20_total = 0;
                    }

                    if (c50_total == '') {
                        var c50_total = 0;
                    }
                    if (c100_total == '') {
                        var c100_total = 0;
                    }
                    if (c200_total == '') {
                        var c200_total = 0;
                    }
                    if (c500_total == '') {
                        var c500_total = 0;
                    }

                    if (c2000_total == '') {
                        var c2000_total = 0;
                    }

                    var amount_data = parseInt(c10_total) + parseInt(c20_total) + parseInt(c50_total) + parseInt(c100_total) + parseInt(c200_total) + parseInt(c500_total) + parseInt(c2000_total);
                    $('#fulltotal').val(amount_data);



                    var allam = parseInt($('#fulltotal').data('value'));
                    var totbal = allam - amount_data
                    $('#bal').text(totbal);



                    if (totbal < 0) {

                        $('#accessshow').show();
                        $('#accessshow1').show();
                        $('#return_excess1').val(Math.abs(totbal));
                        $('#return_excess').val(totbal);

                    }
                    else {
                        $('#accessshow').hide();
                        $('#accessshow1').hide();
                        $('#return_excess').val('0');
                        $('#return_excess1').val('0');
                    }


                });


                $('#200_rs').on('input', function () {

                    var input = parseInt($(this).val());
                    var tot = input * 200
                    $('#200_total').val(tot);




                    var c10_total = $('#10_total').val();
                    var c20_total = $('#20_total').val();

                    var c50_total = $('#50_total').val();
                    var c100_total = $('#100_total').val();
                    var c200_total = $('#200_total').val();
                    var c500_total = $('#500_total').val();
                    var c2000_total = $('#2000_total').val();



                    if (c10_total == '') {
                        var c10_total = 0;
                    }

                    if (c20_total == '') {
                        var c20_total = 0;
                    }


                    if (c50_total == '') {
                        var c50_total = 0;
                    }
                    if (c100_total == '') {
                        var c100_total = 0;
                    }
                    if (c200_total == '') {
                        var c200_total = 0;
                    }
                    if (c500_total == '') {
                        var c500_total = 0;
                    }

                    if (c2000_total == '') {
                        var c2000_total = 0;
                    }

                    var amount_data = parseInt(c10_total) + parseInt(c20_total) + parseInt(c50_total) + parseInt(c100_total) + parseInt(c200_total) + parseInt(c500_total) + parseInt(c2000_total);
                    $('#fulltotal').val(amount_data);



                    var allam = parseInt($('#fulltotal').data('value'));
                    var totbal = allam - amount_data
                    $('#bal').text(totbal);


                    if (totbal < 0) {

                        $('#accessshow').show();
                        $('#accessshow1').show();
                        $('#return_excess1').val(Math.abs(totbal));
                        $('#return_excess').val(totbal);

                    }
                    else {
                        $('#accessshow').hide();
                        $('#accessshow1').hide();
                        $('#return_excess').val('0');
                        $('#return_excess1').val('0');
                    }



                });

                $('#500_rs').on('input', function () {

                    var input = parseInt($(this).val());
                    var tot = input * 500
                    $('#500_total').val(tot);


                    var c10_total = $('#10_total').val();
                    var c20_total = $('#20_total').val();

                    var c50_total = $('#50_total').val();
                    var c100_total = $('#100_total').val();
                    var c200_total = $('#200_total').val();
                    var c500_total = $('#500_total').val();
                    var c2000_total = $('#2000_total').val();


                    if (c10_total == '') {
                        var c10_total = 0;
                    }

                    if (c20_total == '') {
                        var c20_total = 0;
                    }

                    if (c50_total == '') {
                        var c50_total = 0;
                    }
                    if (c100_total == '') {
                        var c100_total = 0;
                    }
                    if (c200_total == '') {
                        var c200_total = 0;
                    }
                    if (c500_total == '') {
                        var c500_total = 0;
                    }

                    if (c2000_total == '') {
                        var c2000_total = 0;
                    }

                    var amount_data = parseInt(c10_total) + parseInt(c20_total) + parseInt(c50_total) + parseInt(c100_total) + parseInt(c200_total) + parseInt(c500_total) + parseInt(c2000_total);
                    $('#fulltotal').val(amount_data);



                    var allam = parseInt($('#fulltotal').data('value'));
                    var totbal = allam - amount_data
                    $('#bal').text(totbal);

                    if (totbal < 0) {

                        $('#accessshow').show();
                        $('#accessshow1').show();
                        $('#return_excess1').val(Math.abs(totbal));
                        $('#return_excess').val(totbal);

                    }
                    else {
                        $('#accessshow').hide();
                        $('#accessshow1').hide();
                        $('#return_excess').val('0');
                        $('#return_excess1').val('0');
                    }

                });
                $('#2000_rs').on('input', function () {

                    var input = parseInt($(this).val());
                    var tot = input * 2000
                    $('#2000_total').val(tot);


                    var c10_total = $('#10_total').val();
                    var c20_total = $('#20_total').val();

                    var c50_total = $('#50_total').val();
                    var c100_total = $('#100_total').val();
                    var c200_total = $('#200_total').val();
                    var c500_total = $('#500_total').val();
                    var c2000_total = $('#2000_total').val();



                    if (c10_total == '') {
                        var c10_total = 0;
                    }

                    if (c20_total == '') {
                        var c20_total = 0;
                    }


                    if (c50_total == '') {
                        var c50_total = 0;
                    }
                    if (c100_total == '') {
                        var c100_total = 0;
                    }
                    if (c200_total == '') {
                        var c200_total = 0;
                    }
                    if (c500_total == '') {
                        var c500_total = 0;
                    }

                    if (c2000_total == '') {
                        var c2000_total = 0;
                    }

                    var amount_data = parseInt(c10_total) + parseInt(c20_total) + parseInt(c50_total) + parseInt(c100_total) + parseInt(c200_total) + parseInt(c500_total) + parseInt(c2000_total);
                    $('#fulltotal').val(amount_data);



                    var allam = parseInt($('#fulltotal').data('value'));
                    var totbal = allam - amount_data
                    $('#bal').text(totbal);

                    if (totbal < 0) {

                        $('#accessshow').show();
                        $('#accessshow1').show();
                        $('#return_excess1').val(Math.abs(totbal));
                        $('#return_excess').val(totbal);

                    }
                    else {
                        $('#accessshow').hide();
                        $('#accessshow1').hide();
                        $('#return_excess').val('0');
                        $('#return_excess1').val('0');
                    }

                });







            });

        </script>

        <style type="text/css">
            @media screen and (max-width: 767px) {
                .time p {
                    width: 50%;
                    border: 1px solid #f4f4f4;
                    margin: 0px;
                    font-size: 12px !important;
                    padding: 7px;
                }

                .time {
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
        <script
            src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script
            src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>


        <!-- pace js -->
        <script src="<?php echo base_url(); ?>/assets/libs/pace-js/pace.min.js"></script>
        <!-- twitter-bootstrap-wizard js -->
        <script
            src="<?php echo base_url(); ?>/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/twitter-bootstrap-wizard/prettify.js"></script>
        <!-- form wizard init -->
        <script src="<?php echo base_url(); ?>/assets/js/pages/form-wizard.init.js"></script>
        <!-- Responsive examples -->
        <script
            src="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script
            src="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="<?php echo base_url(); ?>/assets/js/pages/datatables.init.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/app.js"></script>
</body>
